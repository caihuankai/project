<?php
namespace app\wechat\model;

use think\Db;
use app\wechat\model\QiniuGallerys;
use app\admin\model\CourseVideo;

/**
 * 课程表
 * @author xiaok
 * $date 2017/06/05
 */
class Course extends \app\common\model\Course{
    
    use \app\wechat\traits\HelperCommon;
    
    
    protected $field_level = [
        0 => '免费',
        1 => '加密',
        2 => '收费',
    ];
    
    
    /**
     * 检测是否允许的level
     *
     * @param $level
     * @return bool
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function validateLevel($level)
    {
        return isset($this->field_level[$level]);
    }
    
    
    
    /**
     * 根据liveId获取最新一条课程数据
     *
     * @param array $liveIds
     * @param       $field
     * @return array
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function getNewCourseByLiveIds(array $liveIds, $field)
    {
        if (empty($liveIds)) {
            return [];
        }
        
        return $this->where(['c.live_id' => ['in', $liveIds]])->alias('c')
            ->join('(SELECT live_id, max(id) m_id from talk_course where status <> 5 GROUP BY live_id) b', 'c.id = b.m_id')
            ->order('c.id desc')->field($field)
            ->fetchClass('\CollectionBase')->select()->column(null, 'live_id');
    }
    
    
	//获取课程信息
	public function getCourseInfo($courseId,$user_id){
		$data = $this->alias('a')
		->field('a.id,a.uid,a.live_id,a.class_name,a.price,a.level,a.teacher_name,a.lecturers,a.info_video_qg_id, a.introduction_code_id,
		a.img,a.introduction_img_id,a.src_img,a.src_pc_img,a.begin_time,a.end_time,a.invite_code,a.brief,a.preview,a.review,a.tags,a.status,a.open_status,a.detail_status,a.study_num,a.password,a.pid,
		a.type,a.seriesType,a.plan_num,a.plan_num,a.form,a.begin_enroll_time,a.end_enroll_time,a.enroll_max_num,a.enroll_num,a.virtual_enroll_num,a.virtual_study_num,
		l.name, (l.focus_num + l.virtual_focus_num) as focus_num,l.open_status as live_open_status,
		l.img as live_img,c.name as cate_name,u.freeze,l.user_id as live_user_id,u.alias,u.head_add,k.user_id as collection,q.qiniuKey as video_pic,a.virtual_num,a.online_num,a.origin_price,l.popular')
		->join('live l','l.id = a.live_id','left')
		->join('live_cate c','a.cate_id = c.id','left')
		->join('user u','u.user_id = a.uid','left')
		->join('course_keep k','k.course_id = '.$courseId.' and k.user_id = '.$user_id,'left')
        ->join('course_video v','v.course_id ='.$courseId,'left')
        ->join('talk_qiniu_gallerys q','q.id = v.video_pic_id','left')
		->where('a.id',$courseId)
		->where('a.status','<>',5)
		->find();
		return $data;
	}
	
	
    
    /**
     * 获取课程列表
     * 控制器专用
     *
     * @param     $live_id
     * @param int $level
     * @param int $page
     * @param int $type
     * @return false|\PDOStatement|string|\think\Collection
     */
	public function getCourseListByLiveId($live_id, $level = -1, $page = 1, $type = 0, $perPage = 10){
	    $field = 'id, uid, cate_id,class_name,teacher_name,src_img,price,level, brief, top_sort,
			comment_count,study_num,like_num,begin_time,end_time,`status`,open_status,publish_time,create_time,update_time,type,plan_num,form';
        
        $this->whereShow();
        $where = [];
        if (!empty($live_id)) { // 可以为空
            $where['live_id'] = ['eq', $live_id];
        }
	    
	    if ($level >= 0){ // 指定课程等级
	        $where['level'] = $level;
        }
        
        //只取单节课和系列课，不取系列课子课程
        $where['pid'] = 0;
        if ($type > 0) {
        	$where['type'] = $type;
        }
	    
        $rs = $this->where($where)->field($field)->order(['top_sort desc','publish_time DESC'])->page($page, $perPage)->select();
	    $userIds = [];
        
        foreach ($rs as $item) {
            $userIds[] = $item['uid'];
	    }
        
        /** @var \app\wechat\model\User $userModel */
        $userModel = model('User');
	    $userData = $userModel->getUserColumn($userIds);
			
		foreach($rs as $key=>$value){
			$rs[$key]['publish_time'] = $this->disDate($rs[$key]['publish_time'], 2);
			$rs[$key]['price'] = (float)$rs[$key]['price'];
			$rs[$key]['process_src_img'] = \helper\UrlSys::handleIndexImg($rs[$key]['src_img']);
			$rs[$key]['topBool'] = !!$value['top_sort']; // 是否显示置顶标识
            $rs[$key]['lecturerName'] = getDataByKey($userData, $value['uid'], ''); // 讲师名，课程用户名
		}
		
		return $rs;
	}

	//获取课程相关话题
	public function RelevantCourse($live_id,$id){
		$data = $this->alias('c')->field('c.id,c.live_id,c.class_name,c.src_img,c.study_num,c.price,c.begin_time,c.level,c.form,c.type as class_type,c.plan_num,u.alias,(select count(*) from talk_course ca where ca.pid = c.id and ca.status <> 5 and ca.open_status = 1) as update_num')
        ->join('user u','u.user_id = c.uid')
		->where('c.live_id',$live_id)
		->where('c.status <> 5')
		->where('c.open_status = 1')
		->where('c.pid = 0')
		->where('c.id <>'.$id)
		->where('c.type', '<>', 3)//不取特训班课程
		->order('c.create_time','DESC')
		->limit(10)
		->select();
		if(!empty($data)){
			foreach ($data as $k => $v) {
				$v['src_img'] = \helper\UrlSys::handleIndexImg($v['src_img']);
				$v['begin_time'] = substr($v['begin_time'],0,-3);
				$v['price'] = floatval($v['price']);
			}
			return $data;
		}else{
			return array();
		}
	}

	//获取直播间其他课程数量
	public function relevantCourseCount($live_id, $level, $type = 0){
        if (empty($live_id)) {
            return 0;
        }
        
        if ($level != -1){
            $this->where(['level' => $level]);
        }
        
        //只取单节课和系列课，不取系列课子课程
        $this->where('pid', 0);
        if ($type > 0) {
        	$this->where('type', $type);
        }else {
        	$this->where('type', '<>', 3);//不取特训班课程
        }
        
		$count = $this->whereShow()
		->where('live_id',$live_id)->field('id')
		->count();
  
		return $count;
	}

	//编辑课程 
	public function edit($id,$data,$class_sort,$player_img,$user_id){

        $qiniuId = 0;
        if(!empty($player_img)){
            $QiniuGallerysModel = new QiniuGallerys();
            $qiniuData['userId'] = $user_id;
            $qiniuData['qiniuKey'] = substr(strstr($player_img, 'com/'),4);
            $qiniuData['positionType'] = 6;
            $qiniuData['imgUrlDisplay'] = $player_img;
            $qiniuId = $QiniuGallerysModel->db()->insertGetId($qiniuData);
        }
        
		$this->db()->startTrans();
		try{
			if(!empty($class_sort)){
				foreach ($class_sort as $k => $v) {
					if(!empty($v)){
						$save[] = ['id' => $v['id'],'sort' => $v['sort']];
					}
				}
				$this->saveAll($save);
			}
			$status = $this->db()
			->where('id',$id)
			->update($data);
            if($qiniuId > 0){
                $videoStatus = $this
                ->alias('c')
                ->field('v.id')
                ->join('course_video v','c.id = v.course_id')
                ->where('c.id',$id)
                ->find();
                //更新还是插入
                $CourseVideoModel = new CourseVideo();
                if(!empty($videoStatus)){
                    $CourseVideoModel->db()->where('course_id',$id)->update([
                        'video_pic_id' => $qiniuId,
                    ]);
                }else{
                    $videoData['course_id'] = $id;
                    $videoData['video_pic_id'] = $qiniuId;
                    $CourseVideoModel->db()->insert($videoData);
                }
            }
			$this->db()->commit();
		}catch(Exception $e){
			$this->db()->rollback();
		}
		if($status){
			return ['code' => 0, 'data' => '', 'msg' => '编辑成功'];
		}else{
			return ['code' => 1, 'data' => '', 'msg' => '编辑失败'];
		}
	}

	//删除课程
	public function deleteCourse($id){
		$status = $this->where('id',$id)
		->update([
			'status' => 5,
			'update_time' => date('Y-m-d H:i:s',time()),
			]);
		if($status){
			return ['code' => 0, 'data' => '', 'msg' => '删除成功'];
		}else{
			return ['code' => 1, 'data' => '', 'msg' => '删除失败'];
		}
	}

	//判读课程是否存在
	public function isExist($class_id, $userId = 0, $field = null){
		$where['id'] = $class_id;
        if (!empty($userId)) {
            $where['uid'] = ['eq', $userId];
        }
        if (!is_null($field)) {
            $this->where([])->field($field);
        }
		
		$data = $this->where($where)->find();
		return $data;
	}

	//获取直接中课程介绍 $id：课程id
	public function LiveIntroduce($id=1){
		$id = (int)$id;
		$data = $this->alias('c')->where('c.id',$id)
		->field('c.uid,c.teacher_name,c.class_name,c.src_img,c.status,c.open_status,c.live_id,c.talk_status,c.detail_status,c.study_num,c.form,c.type,t.head_add,t.freeze,t.alias,l.open_status as live_open_status,l.img as live_img,q.qiniuKey as video_pic,qa.qiniuKey as video_url,qa.videoTime,s.state as live_state,(l.focus_num + l.virtual_focus_num) as focus_num,l.popular')
		->join('user t','t.user_id = c.uid','left')
		->join('live l','l.id = c.live_id','left')
        ->join('course_video v','v.course_id ='.$id,'left')
        ->join('talk_qiniu_gallerys q','q.id = v.video_pic_id','left')
        ->join('talk_qiniu_gallerys qa','qa.id = v.video_url_id','left')
        ->join('talk_live_state s','s.groupid = c.id','left')
		->find();
		return $data;
	}
	
	/**
	 * 根据条件获取课程记录
	 * 1.$field默认为null，查询全部字段
	 * 2.$condition默认为null，查找全部
	 * 3.$pageNo默认为1
	 * 4.$perPage默认为20
	 * 5.$orderBy默认按id升序排列
	 * 6.$isUserInfo默认为false，不返回用户信息（头像和昵称）；为true时，与talk_user连表查询，返回用户信息（头像和昵称）
	 * @param unknown $field		查找字段
	 * @param unknown $condition	查询条件
	 * @param number $pageNo		页数
	 * @param number $perPage		每页记录数
	 * @param string $orderBy		排序方式
	 * @param string $isUserInfo	是否需要返回用户信息（头像和昵称）
	 * @return \think\Collection|\think\db\false|PDOStatement|string
	 * @author liujuneng
	 */
	public function getCourseListByCondition($field = null, $condition = null, $pageNo = 1, $perPage = 20, $orderBy = 'id asc', $isUserInfo = false)
	{
		$query = $this;
		//需要获取用户信息时，连表talk_user查询
		$query = $query->alias('c');
		$orderBy = 'c.' . $orderBy;
		$fieldList = [];
		if (!empty($field)) {
			//$field不为空，每个字段加上'c.'
			$fieldList = explode(',', $field);
			foreach ($fieldList as $key=>$fieldTmp){
				$fieldList[$key] = 'c.' . trim($fieldTmp);
			}
		}else {
			//$field不为空，手动加上条件'c.*'，以便获取课程表全部字段
			$fieldList[] = 'c.*';
		}
		//获取用户头像和昵称
		if ($isUserInfo) {
			$fieldList[] = 'tu.head_add';
			$fieldList[] = 'tu.alias';
		}
		$field = implode(',', $fieldList);
		//$condition也要加上'c.'
		$conditionNew = [];
		foreach ($condition as $key=>$value){
			$conditionNew['c.' . $key] = $value;
		}
		$condition = $conditionNew;
		$query = $query->join('talk_user tu', 'tu.user_id = c.uid')->where('tu.freeze', 0);
		if (!empty($condition)) {
			$query = $query->where($condition);
		}
		//执行查询
		$data = $query->field($field)
		->order($orderBy)
		->page($pageNo, $perPage)
		->select();
		
		return $data;
	}
    
    
    /**
     * 处理课程介绍音频链接的返回格式
     *
     * @param $id
     * @return array
     * @author aozhuochao
     */
    public function courseInfoVideoFormat($id)
    {
        if (empty($id)) {
            return [];
        }
    
        /** @var \app\wechat\model\QiniuGallerys $picModel */
        $picModel = model('QiniuGallerys');
        
        return $picModel->getVideoData($id);
    }
    
    
    
    /**
     * @inheritdoc
     */
    public function closeStatus($ids, $status = 2, $operateId = 0)
    {
        if (empty($operateId)) {
            /** @var \app\wechat\model\User $userModel */
            $userModel = model('User');
            $operateId = $userModel->getCurrentSessionUserId();
        }
        
        return parent::closeStatus($ids, $status, $operateId);
    }


    /**
     * 添加收藏课程（talk_course_keep）
     * @name  addKeepCourse
     * @param $userId   用户ID
     * @param $ids 课程ID
     * @return int 添加收藏成功的数量
     */
    public function addKeepCourse($userId, $ids){

        if(empty($userId) || empty($ids)){
            return '用户ID或课程ID为空';
        }

        $data = [];
        $nowTime = date('Y-m-d H:i:s', time());

        switch (is_array($ids)){
            case 1;//多个课程ID(系列课)
                foreach ($ids as $v){
                    //课程是否存在
                    $hasCourse = self::isExist($v);
                    if(!$hasCourse){
                        return '课程:'.$v.'不存在';
                    }

                    //是否已收藏
                    $has = Db::table('talk.talk_course_keep')->where(['user_id'=>$userId, 'course_id'=>$v])->count();
                    if(!$has){
                        $data[] = [
                            'user_id' => $userId,
                            'course_id' => $v,
                            'keep_time' => $nowTime
                        ];
                    }
                }
                break;
            default://单个课程ID
                //课程是否存在
                $hasCourse = self::isExist($ids);
                if(!$hasCourse){
                    return '课程:'.$ids.'不存在';
                }

                //是否已收藏
                $has = Db::table('talk.talk_course_keep')->where("user_id = {$userId} and course_id = {$ids}")->count('user_id');
                if(!$has){
                    $data[0] = [
                        'user_id' => $userId,
                        'course_id' => $ids,
                        'keep_time' => $nowTime
                    ];
                }
                break;
        }
        $res = $data? Db::table('talk.talk_course_keep')->insertAll($data):0;

        return $res;
    }

    /**
     * 删除收藏课程（talk_course_keep）
     * @name  delKeepCourse
     * @param $userId 用户ID
     * @param $ids  课程ID
     * @return int 删除收藏成功的数量
     */
    public function delKeepCourse($userId, $ids){
        if(empty($userId) || empty($ids)){
            return [];
        }

        if(is_array($ids)) $ids = implode(',', $ids);

        $res = Db::table('talk.talk_course_keep')->where("user_id={$userId} and course_id in({$ids})")->delete();

        return $res;
    }

    /**
     * 获取系列课程的子课程（pid = $courseId）、或同级课程（pid = $courseId 的 pid）
     * @name  getSeriesCourse
     * @param $courseId
     * @return array id集
     */
    public function getSeriesCourse($courseId){

        $pid = $this::where("id={$courseId}")->value('pid');//根据同级课程找出父ID
        if($pid){
            $where = "pid={$pid} or id = {$pid}";//找出所有系列课程ID
        }else {
            $where = "pid={$courseId} or id = {$courseId}";//本身是父课程
        }
        $res = $this::where($where)->column('id');

        return $res;
    }

    /**
     * 列表收藏课程（talk_course_keep）
     * @name  listKeepCourse
     * @param $userId   用户ID
     * @param $type 课程类型 1单节课 2系列课
     * @param int $page 页数
     * @param int $size 每页显示条数
     * @return array 用户的收藏课程列表
     */
    public function listKeepCourse($userId, $type = 1, $page = 1, $size = 10){

        if(empty($userId)){
            return [];
        }

        if($type == 1){
            $where = "k.user_id = {$userId} AND c.pid = 0 AND c.type = 1 AND c.open_status = 1";
        }else{
            $where = "k.user_id = {$userId} AND c.type = 2 AND c.open_status = 1";//父课程or子课程
        }

        $limit = ($page-1) * $size;
        $res = Db::connect('bs_db_config')
            ->table('talk_course_keep')
            ->alias('k')
            ->field('k.*, c.id, c.class_name, c.src_img, c.begin_time, c.publish_time, c.create_time, c.update_time, c.study_num, c.status, c.open_status, c.type, c.pid, c.form, c.level, c.price, u.alias')
            ->join('course c', 'k.course_id = c.id', 'left')
            ->join('user u', 'c.uid = u.user_id', 'left')
            ->where($where)
            ->limit($limit, $size)
            ->order('k.keep_time DESC')
            ->select();

        return $res;
    }
    
    public function checkPid($pid, $pidUserId = false, $field = 'id, uid, open_status')
    {
    
        $this->setError('不存在的系列课');
        if (empty($pid) || (empty($pidUserId) && $pidUserId !== false)){
            return false;
        }
        
        $pidData = $this->where(['id' => ['eq', $pid]])->field($field)->find();
    
        if (empty($pidData)) {
            return false;
        }
        
        if (isset($pidData['uid']) && $pidUserId !== false && $pidData['uid'] != $pidUserId){ // 这个pid不是当前用户的
            return false;
        }
    
        if (isset($pidData['open_status']) && $pidData['open_status'] == 2) {
            $this->setError('系列课已关闭');
            return false;
        }
        
        $this->setError('');
        
        return $pidData;
    }
    
    /**
     * 获取系列课子课程列表
     * @param  [type] $pid 系列课id
     * @param  [type] $childId 子课程id
     * @return [type]      [description]
     */
    public function getChildCourse($pid,$childId){
    	$data = $this->alias('c')->field('c.id,c.class_name,c.src_img,(c.study_num + c.virtual_study_num) as study_num,c.price,c.begin_time,c.level,c.form,c.sort,c.type as class_type,c.plan_num,u.alias')
        ->join('user u','u.user_id = c.uid')
		->where('c.pid',$pid)
		->where('c.status <> 5')
		->where('c.open_status = 1')
		->where('c.id <>'.$childId)
		->order('c.sort asc,c.id DESC')
		->select();
		if(!empty($data)){
			foreach ($data as $k => $v) {
				$v['src_img'] = \helper\UrlSys::handleIndexImg($v['src_img']);
				$v['begin_time'] = substr($v['begin_time'],0,-3);
				$v['price'] = floatval($v['price']);
			}
			return $data;
		}else{
			return array();
		}
    }

}