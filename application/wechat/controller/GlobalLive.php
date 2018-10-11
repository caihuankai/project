<?php
namespace app\wechat\controller;

use app\admin\service\Redis;
use app\wechat\model\GlobalLive as MGlobalLive;
use app\wechat\model\LiveFocus;
use app\wechat\model\LiveState;
use think\db\Query;
use think\Request;

class GlobalLive extends App
{
    protected $noLoginAction = ['getBackgroundImg','getBackgroundImg2','checktime'];


    /**
	 * 获取当天公共直播间课程安排
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function getGlobalLiveToday()
	{
		$model = new MGlobalLive();
		$request = $this->request;
		$isOnlineHeadAdd = $request->param('isOnlineHeadAdd/b', false);
		$liveId = input('liveId', 9999);
		
		$currentDate = date('Y-m-d');
		$dataList = $model->alias('gl')
		->join('talk_user u', 'u.user_id = gl.user_id')
		->join('talk_live l', "l.id = gl.pid and gl.pid={$liveId}")
		->where('gl.set_end_time', 'like', "{$currentDate}%")
		->where('gl.open_status', 1)
		->field('gl.id,gl.classification,gl.cate_name,gl.class_name,gl.set_start_time,gl.set_end_time,gl.user_id,l.virtual_num + l.online_num as online_num,u.alias,u.head_add,u.live_head_add')
		->order('set_start_time asc')
		->select();
		
		$result = [];
		
		foreach ($dataList as $data) {
			if ($isOnlineHeadAdd) {
				//随机头像
				$model = new \app\wechat\model\LiveFocus();
				$userTotalNum = $model->where('robot', 1)->count();
				$randNumMax = $userTotalNum - 101;
				if ($randNumMax < 10) {
					$randNumMax = 1;
				}
				$data['onlineHeadAddList'] = \CacheBase::cacheData([__METHOD__, ['onlineHeadAdd']], function () use ($model, $randNumMax){
					$maxNum = 6;
					$headAddlist = [];
					$offset = rand(0, $randNumMax);
					$teacherHeadAddList = $model->where('robot', 1)->field('name')->limit($offset, 100)->select();
					$total = count($teacherHeadAddList);
					$existRandNumArray = [];
					if ($total > 0) {
						while (count($existRandNumArray) < $maxNum && count($existRandNumArray) != $total){
							$randNum = rand(0, $total-1);
							if (!in_array($randNum, $existRandNumArray)) {
								$existRandNumArray[] = $randNum;
								$headAddlist[] = $model->handleRobotPic($teacherHeadAddList[$randNum]['name']);
							}
						}
					}
					return $headAddlist;
				});
			}
			if (empty($data['live_head_add'])){
                $data['live_head_add']=$data['head_add'];
            }
			$result[] = $data;
		}

		return $this->sucSysJson($result);
	}
	
	/**
	 * 显示我的课程安排，只显示未开始的课程安排
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function getMyGlobalLive()
	{
		$model = new MGlobalLive();
		$userId = $this->getUserId();
		$request = $this->request;
		$pageNo = $request->param('pageNo/i', 1);
		$perPage = $request->param('perPage/i', 5);
		$liveId = input('liveId', 9999);
		
		$dataList = $model->where('set_start_time', '>=', date('Y-m-d'))
		->where('pid', $liveId)
		->where('open_status', 1)
		->where('user_id', $userId)
		->field('id,classification,cate_name,class_name,set_start_time,set_end_time,user_id')
		->order('set_start_time asc')
		->page($pageNo, $perPage)
		->select();
		
		$result = [];
		
		foreach ($dataList as $data) {
			$result[] = $data;
		}
		
		return $this->sucSysJson($result);
	}
	
	/**
	 * 创建公共直播间课程安排
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function create()
	{
		$this->validateByName();
		$model = new MGlobalLive();
		$request = $this->request;
		$classification = $request->param('classification');
		$cateName = $request->param('cateName');
		$className = $request->param('className');
		$startTime = $request->param('startTime');
		$endTime = $request->param('endTime');
		$userData = $this->getSessionUserData();
		$liveId = input('liveId', 9999);
		
		//时间范围验证
		if ($startTime >= $endTime) {
			return $this->errSysJson('结束时间必须大于开始时间');
		}elseif (date('Y-m-d', strtotime($startTime)) != date('Y-m-d', strtotime($endTime))) {
			return $this->errSysJson('开始时间和结束时间必须是同一天');
		}
		
		//验证时间可否预定
		$sql = "SELECT count(1) as num FROM `talk_global_live` WHERE pid = $liveId AND open_status = 1 AND ( ( `set_start_time` <= '$startTime' AND `set_end_time` > '$startTime' ) OR ( `set_start_time` < '$endTime' AND `set_end_time` >= '$endTime' ) OR ( `set_start_time` >= '$startTime' AND `set_end_time` <= '$endTime' ) )";
		$dataList = $model->db()->query($sql);
		if (!empty($dataList) && $dataList[0]['num'] > 0) {
			return $this->errSysJson('开课时间段已被预定');
		}
		
		$insertData = [
				'teacher_name'=>!empty($userData['alias']) ? $userData['alias'] : '',
				'classification'=>$classification,
				'cate_name'=>$cateName,
				'class_name'=>$className,
				'set_start_time'=>date('c', strtotime($startTime)),
				'set_end_time'=>date('c', strtotime($endTime)),
				'user_id'=>!empty($userData['user_id']) ? $userData['user_id'] : 0
		];
		$result = $model->insert($insertData);
		if ($result > 0) {
			return $this->sucSysJson('创建成功');
		}else {
			return $this->errSysJson('创建失败');
		}
	}
	
	/**
	 * 修改公共直播间课程安排
	 * @param number $id
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function edit($id = 0)
	{
		$this->validateByName();
		$model = new MGlobalLive();
		$request = $this->request;
		$classification = $request->param('classification');
		$cateName = $request->param('cateName');
		$className = $request->param('className');
		$startTime = $request->param('startTime');
		$endTime = $request->param('endTime');
		
		//时间范围验证
		if ($startTime >= $endTime) {
			return $this->errSysJson('结束时间必须大于开始时间');
		}elseif (date('Y-m-d', strtotime($startTime)) != date('Y-m-d', strtotime($endTime))) {
			return $this->errSysJson('开始时间和结束时间必须是同一天');
		}
		
		//验证时间可否预定
		$sql = "SELECT count(1) as num FROM `talk_global_live` WHERE id != $id AND open_status = 1 AND ( ( `set_start_time` <= '$startTime' AND `set_end_time` > '$startTime' ) OR ( `set_start_time` < '$endTime' AND `set_end_time` >= '$endTime' ) OR ( `set_start_time` >= '$startTime' AND `set_end_time` <= '$endTime' ) )";
		$dataList = $model->db()->query($sql);
		if (!empty($dataList) && $dataList[0]['num'] > 0) {
			return $this->errSysJson('开课时间段已被预定');
		}
		
		$updateData = [
				'classification'=>$classification,
				'cate_name'=>$cateName,
				'class_name'=>$className,
				'set_start_time'=>date('c', strtotime($startTime)),
				'set_end_time'=>date('c', strtotime($endTime)),
		];
		$result = $model->where('id', $id)->update($updateData);
		if ($result >= 0) {
			return $this->sucSysJson('修改成功');
		}else {
			return $this->errSysJson('修改失败');
		}
	}
	
	/**
	 * 根据id获取公共直播间课程安排
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function getGlobalLiveById()
	{
		$request = $this->request;
		$id = $request->param('id/i');
		
		$model = new MGlobalLive();
		$result = $model->where('id', $id)->find();
		
		return $this->sucSysJson($result);
	}
	
	/**
	 * 互动课堂视频
	 * @return \think\response\Json
	 */
	public function getBackgroundImg()
	{
		$model = new MGlobalLive();
        $qiNiuModel = new \app\wechat\model\QiniuGallerys();
        $startTime = date('Y-m-d 8:00:00');
        $MorningEndTime = date('Y-m-d 9:10:00');//早上结束时间
        $NoonStartTime = date('Y-m-d 11:30:00');//中午开始时间
        $NoonEndTime = date('Y-m-d 12:50:00');//中午结束时间
        $NightStartTime = date('Y-m-d 16:00:00');//晚上开始时间
        $NightEndTime = date('Y-m-d 19:00:00');//晚上结束时间
        $currenttime = date('Y-m-d H:i:s');//当前时间
        $currentDate = date('Y-m-d');//今天的日期
        $liveId = input('id', 9999);
        $checkCourse = false;

        //获取今天课程的开始时间跟结束时间
        $checktime = $model
            ->where('open_status', 1)
            ->where('set_end_time', 'like', "{$currentDate}%")
            ->field('set_start_time,set_end_time')
            ->select();
        //获取公共直播间背景图（时间表）
        $backgroundImg = $model->alias('gl')
            ->join('talk_live l', "l.id = gl.pid and gl.pid={$liveId}")
            ->field('background_img')
            ->find();
//        $dataList = $backgroundImg;
        //获取视频视频跟视频封面
        $LiveDate = $model->alias('gl')
            ->join('talk_live l', "l.id = gl.pid and gl.pid={$liveId}")
            ->field('l.video_pic_id,l.video_id')
            ->find();
        //判断课程是否都是今天的并且只取结束时间！
        $isToday = $this->isToday($checktime);
        if(!empty($checktime)){
            $courseEndTime = max($isToday[1]);//获取最后结束的课程时间
            $courseStartTime = min($isToday[0]);//获取最早开始的课程时间
        }else{
            $courseEndTime = 'Y-m-d 12:20:00';//获取最后结束的课程时间
            $courseStartTime = 'Y-m-d 12:19:00';//获取最早开始的课程时间
        }

        $startwhere = [
            'open_status'=>1,
            'pid'=>9999,
            'set_start_time'=>array('between', array($NightStartTime, $NightEndTime)),
        ];
        $endwhere = [
            'open_status'=>1,
            'pid'=>9999,
            'set_end_time'=>array('between', array($NightStartTime, $NightEndTime)),
        ];
        $returntime = $model
            ->where($startwhere)
            ->whereOr(function ($m)use($endwhere){
                $m->where($endwhere);
            })
            ->field('set_start_time,set_end_time')
            ->select();

        if (!empty($returntime)){
            $checkCourse = true;
        }
        //当前时间 > $NoonEndTime（今天中午的12：50）或者当前时间小于今天早上的$startTime（早上的8：00）
        if (strtotime($currenttime)>strtotime($NoonEndTime)|| strtotime($currenttime)<= strtotime($startTime))
        {
            //当前时间是否大于最后一节课程的结束时间+30分钟
            if ((strtotime($currenttime)< strtotime($courseStartTime))|| strtotime($currenttime)>=(strtotime($courseEndTime)+60*30)||
                (strtotime($currenttime)>= strtotime($NightStartTime) && strtotime($currenttime)<= strtotime($NightEndTime))//16-19点这个时间有课
            ){
                //16-19点这个时间有课
                if ((strtotime($currenttime)>= strtotime($NightStartTime) && strtotime($currenttime)<= strtotime($NightEndTime))&& $checkCourse == true){
                    $dataList = [
                        'type'=>5,//展示类型 1：课程表，2：视频及封面，3：展示预告，4：课程结束时间小于30分钟，5：课程直播中
                        'msg' =>'课程直播中!',
                    ];
                }else{
                    //true的话就判断是否上传视频如果有的话优先展示视频，没有就展示课程表
                    if ($LiveDate['video_pic_id'] != 0 && !empty($LiveDate['video_id'])){
                        //视频及封面
                        $dataList = [
                            'type'=>2,//展示类型 1：课程表，2：视频及封面，3：展示预告，4：课程结束时间小于30分钟，5：课程直播中
                            'picUrl' =>$qiNiuModel->getQiNiuUrl($LiveDate['video_pic_id']),
                            'videoUrl'=>$qiNiuModel->getQiNiuUrl($LiveDate['video_id']),
                        ];
                    }else{
                        //课程表
                        $dataList = [
                            'type'=>1,//展示类型 1：课程表，2：视频及封面，3：展示预告，4：课程结束时间小于30分钟，5：课程直播中
                            'picUrl' =>$backgroundImg['background_img'],
                        ];
                    }
                }
            }else{
                //课程刚刚结束
                if (strtotime($currenttime)>=(strtotime($courseEndTime)) && strtotime($currenttime)<=(strtotime($courseEndTime)+60*30)){
                    //false表示课程结束时间未大于30分钟
                    $dataList = [
                        'type'=>4,//展示类型 1：课程表，2：视频及封面，3：展示预告，4：课程结束时间小于30分钟，5：课程直播中
                        'picUrl' =>$backgroundImg['background_img'],
                        'msg' =>'课程结束时间没有大于半小时!',
                    ];
                }else{
                    $dataList = [
                        'type'=>5,//展示类型 1：课程表，2：视频及封面，3：展示预告，4：课程结束时间小于30分钟，5：课程直播中
                        'msg' =>'课程直播中!',
                    ];
                }
            }
            //当前时间>$startTime(8点) 并 小于等于$MorningEndTime（920）展示课程表
        }elseif (strtotime($currenttime)>strtotime($startTime) && strtotime($currenttime)<= strtotime($MorningEndTime)){
            $dataList = [
                'type'=>1,//展示类型 1：课程表，2：视频及封面，3：展示预告，4：课程结束时间小于30分钟，5：课程直播中
                'picUrl' =>$backgroundImg['background_img'],
            ];
            //当前时间>$NoonStartTime (11:30) 并小于等于$NoonEndTime（中午12：50）优先展示视频否则展示预告
        }elseif (strtotime($currenttime)>= strtotime($NoonStartTime) && strtotime($currenttime)<= strtotime($NoonEndTime)){
            //true的话就判断是否上传视频如果有的话优先展示视频，没有就展示课程表
            if ($LiveDate['video_pic_id'] != 0 && !empty($LiveDate['video_id'])){
                //视频及封面
                $dataList = [
                    'type'=>2,//展示类型 1：课程表，2：视频及封面，3：展示预告，4：课程结束时间小于30分钟，5：课程直播中
                    'picUrl' =>$qiNiuModel->getQiNiuUrl($LiveDate['video_pic_id']),
                    'videoUrl'=>$qiNiuModel->getQiNiuUrl($LiveDate['video_id']),
                ];
            }else{
                //课程表
                $dataList = [
                    'type'=>3,//展示类型 1：课程表，2：视频及封面，3：展示预告，4：课程结束时间小于30分钟，5：课程直播中
                ];
            }
        }else{
            $Nstime = date('Y-m-d 9:20:00');
            $Netime = date('Y-m-d 11:30:00');
            //获取今天课程的开始时间跟结束时间
            $NData = $model
                ->where('open_status', 1)
                ->where('set_start_time', '>=', "{$Nstime}")
                ->where('set_end_time', '<=', "{$Netime}")
                ->field('id,set_start_time,set_end_time')
                ->select();
            if (!empty($NData)){//该时间段内有课程
                $dataList = [
                    'type'=>5,//展示类型 1：课程表，2：视频及封面，3：展示预告，4：课程结束时间小于30分钟，5：课程直播中
                    'msg' =>'课程直播中!',
                    'data'=>$NData,
                ];
            }else{//没有课程
                //true的话就判断是否上传视频如果有的话优先展示视频，没有就展示课程表
                if ($LiveDate['video_pic_id'] != 0 && !empty($LiveDate['video_id'])){
                    //视频及封面
                    $dataList = [
                        'type'=>2,//展示类型 1：课程表，2：视频及封面，3：展示预告，4：课程结束时间小于30分钟，5：课程直播中
                        'picUrl' =>$qiNiuModel->getQiNiuUrl($LiveDate['video_pic_id']),
                        'videoUrl'=>$qiNiuModel->getQiNiuUrl($LiveDate['video_id']),
                    ];
                }else{
                    //课程表
                    $dataList = [
                        'type'=>1,//展示类型 1：课程表，2：视频及封面，3：展示预告，4：课程结束时间小于30分钟，5：课程直播中
                        'picUrl' =>$backgroundImg['background_img'],
                    ];
                }//if
            }//id

        }
		return $this->sucSysJson($dataList);
	}//


    /**
     * 互动课堂视频
     * @return \think\response\Json
     */
    public function getBackgroundImg2()
    {
        $model = new MGlobalLive();
        $qiNiuModel = new \app\wechat\model\QiniuGallerys();
        $currenttime = date('Y-m-d H:i:s');//当前时间
        $liveId = input('id', 9999);
        $checkCourse = false;

        //获取公共直播间背景图（时间表）
        $backgroundImg = $model->alias('gl')
            ->join('talk_live l', "l.id = gl.pid and gl.pid={$liveId}")
            ->field('background_img')
            ->find();
//        $dataList = $backgroundImg;
        //获取视频视频跟视频封面
        $LiveDate = $model->alias('gl')
            ->join('talk_live l', "l.id = gl.pid and gl.pid={$liveId}")
            ->field('l.video_pic_id,l.video_id')
            ->find();


        $startwhere = [
            'open_status'=>1,
            'pid'=>9999,
            'set_start_time'=>array('<=',$currenttime),
        ];
        $endwhere = [
            'open_status'=>1,
            'pid'=>9999,
            'set_end_time'=>array('>=',$currenttime),
        ];
        $returntime = $model
            ->where($startwhere)
            ->where($endwhere)
            ->field('set_start_time,set_end_time')
            ->select();

        if (!empty($returntime)){
            $checkCourse = true;
        }

        if ($checkCourse){
            $dataList = [
                'type'=>5,//展示类型 1：课程表，2：视频及封面，3：展示预告，4：课程结束时间小于30分钟，5：课程直播中
                'picUrl' =>$backgroundImg['background_img'],
                'msg' =>'课程直播中!',
            ];
        }else{
            //true的话就判断是否上传视频如果有的话优先展示视频，没有就展示课程表
            if ($LiveDate['video_pic_id'] != 0 && !empty($LiveDate['video_id'])){
                //视频及封面
                $dataList = [
                    'type'=>2,//展示类型 1：课程表，2：视频及封面，3：展示预告，4：课程结束时间小于30分钟，5：课程直播中
                    'picUrl' =>$qiNiuModel->getQiNiuUrl($LiveDate['video_pic_id']),
                    'videoUrl'=>$qiNiuModel->getQiNiuUrl($LiveDate['video_id']),
                ];
            }else{
                //课程表
                $dataList = [
                    'type'=>1,//展示类型 1：课程表，2：视频及封面，3：展示预告，4：课程结束时间小于30分钟，5：课程直播中
                    'picUrl' =>$backgroundImg['background_img'],
                ];
            }
        }
        return $this->sucSysJson($dataList);
    }//

    /*
* 检测是不是post方法，否则不允许请求！
*/
    private function ispost()
    {
        $request = Request::instance();
        if ($request->isPost()){
            return true;
        }else{
            return false;
        }
    }
    /**
      * 查询时间段是否被占用1已经使用，0未使用
      */
    public function checktime($checkday = null){
            $model = new MGlobalLive();
            $currentDate = empty($checkday) ? date('Y-m-d'):date('Y-m-d',strtotime($checkday));
            $liveId = input('liveId', 9999);
            $result = $model
            	->where('pid', $liveId)
                ->where('open_status', 1)
                ->where('set_end_time', 'like', "{$currentDate}%")
                ->field('set_start_time,set_end_time')
                ->select();
            $date = $this->isToday($result);
            $timearr = $this ->maketime();
            $arrstart = [];
            $arrend = [];
            for ($i = 0 ; $i<count($date[0]);$i++){
                $start = date("H:i",strtotime($date[0][$i]));
                array_push($arrstart,$start);
                $end = date("H:i",strtotime($date[1][$i]));
                array_push($arrend,$end);
            }
            $flg = true;
            $sucdata = [];
            if (strtotime($currentDate) > strtotime(date('Y-m-d'))){
                $flg = false;
                for ($k=0;$k<count($timearr);$k++){
                    $sucdata[$k] = [
                        'time'=> $timearr[$k],
                        'state' => 0,
                    ];
                }
            }else{
                if (strtotime($currentDate) == strtotime(date('Y-m-d')))
                {
                    $flg = true;
                    for ($k=0;$k<count($timearr);$k++){
                        $sucdata[$k] = [
                            'time'=> $timearr[$k],
                            'state' => 0,
                        ];
                    }
                }else{
                    for ($k=0;$k<count($timearr);$k++){
                        $sucdata[$k] = [
                            'time'=> $timearr[$k],
                            'state' => 1,
                        ];
                    }
                }
            }
            $sucdatas = $sucdata;
            $currenttime = date('H:i');
            for ($s =0 ;$s < count($arrstart);$s++){
                for ($j = 0 ; $j<count($timearr);$j++){
                    if (strtotime($timearr[$j]) <= strtotime($currenttime) && $flg == true){
                        $sucdatas[$j] = [
                            'time'=> $timearr[$j],
                            'state' => 1,
                        ];
                    }else{
                        if (strtotime($timearr[$j]) >= strtotime($arrstart[$s]) && strtotime($timearr[$j]) <= strtotime($arrend[$s])){
                            if (strtotime($timearr[$j]) == strtotime($arrend[$s]) || strtotime($timearr[$j]) == strtotime($arrstart[$s]))
                            {
                                $sucdatas[$j] = [
                                    'time'=> $timearr[$j],
                                    'state' => 0,
                                ];
                            }else{
                                $sucdatas[$j] = [
                                    'time'=> $timearr[$j],
                                    'state' => 1,
                                ];
                            }
                        }else{
                            if ($sucdatas[$j]['state'] != 1){
                                $sucdatas[$j] = [
                                    'time'=> $timearr[$j],
                                    'state' => 0,
                                ];
                            }
                        }
                    }
                }
            }
            return $this->sucSysJson($sucdatas);
    }//end

    /**
     * 验证公共直播间密码
     * @param null $courseId
     * @param null $password
     * @return \think\response\Json
     */
    public function checkPassword($courseId = null,$password = null)
    {
        $model = new MGlobalLive();
        $userid = $this->getUserId();
        if (empty(trim($password))) return $this->errSysJson('请输入密码');
        $checkData = $model->where(['id'=>$courseId,'password'=>$password])->field('id,password')->find();
        if (!empty($checkData)){
            $baseval = base64_encode("course".$courseId."currUser".$userid)."pass".$password;
            Redis::hashSet('CheckPasswordMGlobalLive',$baseval,$baseval);
            return $this->sucSysJson(['returnCode'=>4200,'returnStatus'=>true,'courseId'=>$checkData['id']],'验证通过！');
        }else{
            return $this->sucSysJson(['returnCode'=>4400,'returnStatus'=>false,'courseId'=>$courseId],'验证不通过！');
        }
    }

    /**
     * 获取当前讲师信息
     */
    public function getCurrentTeachInfo()
    {
        $model = new MGlobalLive();
        $userid = $this->getUserId();
        $liveId = input('liveId', 9999);
        //用户行为记录
        (new \app\wechat\model\BehaviorRecord)->record($user_id=$userid,$type=11,$target_id=9999);

        $datelists = $model ->alias('gl')
            ->where('gl.set_start_time','<=',date('Y-m-d H:i:s'))
            ->where('gl.set_end_time','>=',date('Y-m-d H:i:s'))
            ->join('talk_live l','l.user_id = gl.user_id')
            ->join('talk_user u','gl.user_id = u.user_id')
            ->join('talk_live li',"gl.pid = li.id and gl.pid={$liveId}")
            ->field('gl.id as courseId,l.id,gl.teacher_name,u.alias,gl.user_id,gl.pid,gl.classification,gl.class_name,gl.cate_name,li.online_num,li.virtual_num,l.focus_num,l.virtual_focus_num,u.head_add,gl.password,gl.adapt')
            ->select();
        if (!empty($datelists) && count($datelists)){
            $focusmodel =  new LiveFocus();
            foreach ($datelists as $datelist){
                //判断该直播间是否设置密码以及适用平台
                $adapt = ['weixin'=>false,'applet'=>false,'mobile'=>false];
                $result = [
                    'id'  => $datelist['id'],
                    'teacher_name' => $datelist['teacher_name'],
                    'alias' => $datelist['alias'],
                    'user_id'=> $datelist['user_id'],
                    'adapt'=>$adapt,
                    'classification'=> $datelist['classification'],
                    'class_name' => $datelist['class_name'],
                    'cate_name' => $datelist['cate_name'],
                    'online_num' => $datelist['online_num'] + $datelist['virtual_num'],
                    'focus_num'=> $datelist['focus_num'] + $datelist['virtual_focus_num'],
                    'head_add' => $datelist['head_add'],
                    'courseId' => $datelist['courseId'],
                ];
            }

            $checkadmin = $model->db()->table('talk_admin_live') ->where('user_id',$userid)->field('id,alias,status')->find();
            if (!empty($checkadmin)|| count($checkadmin)>0)
            {
                if ($checkadmin['status'] == 1){
                    $result['isadmin'] = 1;
                }else{
                    $result['isadmin'] = 0;
                }
            }else{
                $result['isadmin'] = 0;
            }
            $focus = $focusmodel->isFocus($result['id'],$userid);
            $result['isFocus'] = $focus;
            return $this -> sucSysJson($result);
        }else{
            return $this ->errSysJson('暂无直播课程！');
        }
    }
    /*
     * 生成144个时间段
     */
    private function maketime(){
        $mtime = date( "00:00");
        $timearr = [];
        $Tomorrow = date('23:59');
        for ($i =0 ;$i< 144;$i++){
            if ($mtime<$Tomorrow){
                if ($i==0){
                    $newmtime = date("H:i",strtotime($mtime));
                    array_push($timearr,$newmtime);
                    $mtime = $newmtime;
                }else{
                    $newmtime = date("H:i",strtotime($mtime)+60*10);
                    array_push($timearr,$newmtime);
                    $mtime = $newmtime;
                }
            }
        }

        return $timearr;
    }
    //判断日期是否在今天
    private function isToday($result,$flg=true){
        if ($flg){
            $starttime = [];
            $endttime = [];
            for ($i = 0 ;$i < count($result);$i++){
                array_push($starttime,$result[$i]['set_start_time']);
                array_push($endttime,$result[$i]['set_end_time']);
            }
            $data = array($starttime,$endttime);
            return $data;
        }else{
            $today =  date('Y-m-d 00:00:00');
            $Tomorrow = date('Y-m-d 23:59:59');
            if (strtotime($result['set_start_time']) >= strtotime($today) && strtotime($result['set_end_time']) >= strtotime($today) && strtotime($result['set_end_time']) <= strtotime($Tomorrow)){
                return true;
            }else{
                return false;
            }
        }
    }

    /**
     * 用户行为记录
     * @return [type] [description]
     */
    public function behaviorRecord(){
        (new \app\wechat\model\BehaviorRecord)->record($user_id=$this->getUserId(),$type=15,$target_id=9999);
    }
}