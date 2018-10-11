<?php

namespace app\admin\controller;

use app\admin\model\DataStatistics;
use app\admin\model\LiveStatistics;
use think\Db;
use app\admin\controller\ExcelExport;
use app\wechat\model\User;

/**
* 运营需要统计数据
* @author xiaokai
*/
class StatisticsData extends App{
	/**
	 * 有效用户统计
	 * @return [type] [description]
	 */
	public function sum(){
		if(request()->isPost()){
			$page = input('param.pageNumber');
			$logmin = input('param.logmin');
			$logmax = input('param.logmax');
			$limitNumber = empty($page) ? 0 : ($page-1)*10;
			$startTime = empty($logmin) ? date('Y-m-d') : $logmin;
			$endTime = empty($logmax) ? date('Y-m-d') : $logmax;
			$ExcelExportC = new ExcelExport();
			$procedure = "CALL sum1Table ('".$startTime."','".$endTime."',".$limitNumber.")";
			$model = Db::connect(config('bs_db_config'));
      		$rows = $model->query($procedure);
      		$UserModel = new User();
			$data = ['rows' => $rows[0], 'total' => $UserModel->count()];
			return $this->sucJson($data);
		    
		}
		return $this->fetch();
	}
    /**
     * 有效用户统计
     * @return [type] [description]
     */
    public function sumDataStatistics(){
        if(request()->isPost()){
            $page = input('param.pageNumber');
            $logmin = input('param.logmin');
            $logmax = input('param.logmax');
            $limitNumber = empty($page) ? 0 : ($page-1)*10;
            $startTime = empty($logmin) ? date('Y-1-1') : $logmin;
            $endTime = empty($logmax) ? date('Y-12-31') : $logmax;
            $procedure = "CALL sumDataStatistics ('".$startTime."','".$endTime."',".$limitNumber.")";
            $model = Db::connect(config('bs_db_config'));
            $rows = $model->query($procedure);
            $UserModel = new DataStatistics();
            $data = ['rows' => count($rows)<1 ? []:$rows[0], 'total' => $UserModel->count()];
            return $this->sucJson($data);

        }
        return $this->fetch();
    }
    public function sumDataExportExcel($logmin,$logmax){
        $startTime = empty($logmin) ? date('Y-1-1') : $logmin;
        $endTime = empty($logmax) ? date('Y-12-31') : $logmax;
        $ExcelExportC = new ExcelExport();
        $procedure = "CALL sumData('".$startTime."','".$endTime."')";
        $excelName = '用户统计';
        $titleArray = array('ID','平台总用户量','日活跃用户','月活跃用户','日新增用户数','日用户流失量','日用户流失率','日公共直播间在线人数','统计时间');
        $columnArray = array('id','user_total','day_total','month_total','subscribe_total','unsubscribe_total','unsubscribe_ratio','live_total','create_time');
        $sqlType = 1;
        $ExcelExportC->buildExcel($procedure,$excelName,$titleArray,$columnArray,$sqlType);
    }

	public function sumExportExcel($logmin,$logmax){
		$startTime = empty($logmin) ? date('Y-m-d') : $logmin;
		$endTime = empty($logmax) ? date('Y-m-d') : $logmax;
		$ExcelExportC = new ExcelExport();
		$procedure = "CALL sum1 ('".$startTime."','".$endTime."')";
		$excelName = '有效用户';
	    $titleArray = array('用户id','用户昵称','用户微信openid','充值次数（次）','充值金额（元）','购买课程（次）','课程消费（元）','购买观点（次）','观点消费（元）','Live直播送礼（次）','Live直播送礼消费（元）');
	    $columnArray = array('user_id','alias','open_id','inpour','inpour_consumpt','course','course_consumpt','viewpoint','viewpoint_consumpt','admire','admire_consumpt');
	    $sqlType = 1;
	    $ExcelExportC->buildExcel($procedure,$excelName,$titleArray,$columnArray,$sqlType);
	}

	/**
	 * 讲师每日新增关注人数统计
	 * @return [type] [description]
	 */
	public function sumFocus(){
		if(request()->isPost()){
			$page = input('param.pageNumber');
			$logmin = input('param.logmin');
			$logmax = input('param.logmax');
			$limitNumber = empty($page) ? 0 : ($page-1)*10;
			$startTime = empty($logmin) ? date('Y-m-d') : $logmin;
			$endTime = empty($logmax) ? date('Y-m-d') : $logmax;
			$ExcelExportC = new ExcelExport();
			$procedure = "CALL sumFocusTable ('".$startTime."','".$endTime."',".$limitNumber.")";
			$model = Db::connect(config('bs_db_config'));
      		$rows = $model->query($procedure);
			$data = ['rows' => $rows[0], 'total' => count($model->query("CALL sumFocus ('".$startTime."','".$endTime."')")[0])];
			return $this->sucJson($data);
		    
		}
		return $this->fetch();
	}

    /**
     * 导出excel
     * @param $logmin
     * @param $logmax
     */
	public function sumFocusExcel($logmin,$logmax){
		$startTime = empty($logmin) ? date('Y-m-d') : $logmin;
		$endTime = empty($logmax) ? date('Y-m-d') : $logmax;
		$ExcelExportC = new ExcelExport();
		$procedure = "CALL sumFocus ('".$startTime."','".$endTime."')";
		$excelName = '讲师每日新增关注人数';
	    $titleArray = array('讲师id','讲师昵称','新增人数');
	    $columnArray = array('user_id','alias','count');
	    $sqlType = 1;
	    $ExcelExportC->buildExcel($procedure,$excelName,$titleArray,$columnArray,$sqlType);
	}
	/**
	 * live直播间发言次数统计sql
	 * @return [type] [description]
	 */
	public function sumLiveSpeak(){
		if(request()->isPost()){
			$page = input('param.pageNumber');
			$logmin = input('param.logmin');
			$logmax = input('param.logmax');
			$limitNumber = empty($page) ? 0 : ($page-1)*10;
			$startTime = empty($logmin) ? date('Y-m-d') : $logmin;
			$endTime = empty($logmax) ? date('Y-m-d') : $logmax;
			$ExcelExportC = new ExcelExport();
			$procedure = "CALL sumLiveSpeakTable ('".$startTime."','".$endTime."',".$limitNumber.")";
			$model = Db::connect(config('bs_db_config'));
      		$rows = $model->query($procedure);
			$data = ['rows' => !empty($rows) ? $rows[0] : null, 'total' => count($model->query("CALL sumLiveSpeak ('".$startTime."','".$endTime."')")[0])];
			return $this->sucJson($data);
		    
		}
		return $this->fetch();
	}
	public function sumLiveSpeakExcel($logmin,$logmax){
		$startTime = empty($logmin) ? date('Y-m-d') : $logmin;
		$endTime = empty($logmax) ? date('Y-m-d') : $logmax;
		$ExcelExportC = new ExcelExport();
		$procedure = "CALL sumLiveSpeak ('".$startTime."','".$endTime."')";
		$excelName = 'live直播间发言次数统计';
	    $titleArray = array('用户id','用户昵称','用户微信open_id','直播间名称','发言次数','日期');
	    $columnArray = array('user_id','alias','open_id','live_name','total','statistics_time');
	    $sqlType = 1;
	    $ExcelExportC->buildExcel($procedure,$excelName,$titleArray,$columnArray,$sqlType);
	}
	/**
	 * live直播间停留时长
	 * @return [type] [description]
	 */
	public function sumLiveTime(){
		if(request()->isPost()){
			$page = input('param.pageNumber');
			$logmin = input('param.logmin');
			$logmax = input('param.logmax');
			$limitNumber = empty($page) ? 0 : ($page-1)*10;
			$startTime = empty($logmin) ? date('Y-m-d') : $logmin;
			$endTime = empty($logmax) ? date('Y-m-d') : $logmax;
			$ExcelExportC = new ExcelExport();
			$procedure = "CALL sumLiveTimeTable ('".$startTime."','".$endTime."',".$limitNumber.")";
			$model = Db::connect(config('bs_db_config'));
      		$rows = $model->query($procedure);
			$data = ['rows' => !empty($rows) ? $rows[0] : null, 'total' => count($model->query("CALL sumLiveTime ('".$startTime."','".$endTime."')")[0])];
			return $this->sucJson($data);
		    
		}
		return $this->fetch();
	}
	public function sumLiveTimeExcel($logmin,$logmax){
		$startTime = empty($logmin) ? date('Y-m-d') : $logmin;
		$endTime = empty($logmax) ? date('Y-m-d') : $logmax;
		$ExcelExportC = new ExcelExport();
		$procedure = "CALL sumLiveTime ('".$startTime."','".$endTime."')";
		$excelName = 'live直播间停留时长';
	    $titleArray = array('用户id','用户昵称','用户微信open_id','直播间名称','停留时长（分）','日期');
	    $columnArray = array('user_id','alias','open_id','live_name','total','statistics_time');
	    $sqlType = 1;
	    $ExcelExportC->buildExcel($procedure,$excelName,$titleArray,$columnArray,$sqlType);
	}
	/**
	 * 课程直播发言次数统计
	 * @return [type] [description]
	 */
	public function sumCourseSpeak(){
		if(request()->isPost()){
			$page = input('param.pageNumber');
			$logmin = input('param.logmin');
			$logmax = input('param.logmax');
			$limitNumber = empty($page) ? 0 : ($page-1)*10;
			$startTime = empty($logmin) ? date('Y-m-d') : $logmin;
			$endTime = empty($logmax) ? date('Y-m-d') : $logmax;
			$ExcelExportC = new ExcelExport();
			$procedure = "CALL sumCourseSpeakTable ('".$startTime."','".$endTime."',".$limitNumber.")";
			$model = Db::connect(config('bs_db_config'));
      		$rows = $model->query($procedure);
			$data = ['rows' => !empty($rows) ? $rows[0] : null, 'total' => count($model->query("CALL sumCourseSpeak ('".$startTime."','".$endTime."')")[0])];
			return $this->sucJson($data);
		    
		}
		return $this->fetch();
	}
	public function sumCourseSpeakExcel($logmin,$logmax){
		$startTime = empty($logmin) ? date('Y-m-d') : $logmin;
		$endTime = empty($logmax) ? date('Y-m-d') : $logmax;
		$ExcelExportC = new ExcelExport();
		$procedure = "CALL sumCourseSpeak ('".$startTime."','".$endTime."')";
		$excelName = '课程直播发言次数统计';
	    $titleArray = array('用户id','用户昵称','用户微信open_id','课程id','课程名称','发言次数','日期');
	    $columnArray = array('user_id','alias','open_id','live_id','class_name','total','statistics_time');
	    $sqlType = 1;
	    $ExcelExportC->buildExcel($procedure,$excelName,$titleArray,$columnArray,$sqlType);
	}
	/**
	 * 课程直播停留时长
	 * @return [type] [description]
	 */
	public function sumCourseTime(){
		if(request()->isPost()){
			$page = input('param.pageNumber');
			$logmin = input('param.logmin');
			$logmax = input('param.logmax');
			$limitNumber = empty($page) ? 0 : ($page-1)*10;
			$startTime = empty($logmin) ? date('Y-m-d') : $logmin;
			$endTime = empty($logmax) ? date('Y-m-d') : $logmax;
			$ExcelExportC = new ExcelExport();
			$procedure = "CALL sumCourseTimeTable ('".$startTime."','".$endTime."',".$limitNumber.")";
			$model = Db::connect(config('bs_db_config'));
      		$rows = $model->query($procedure);
			$data = ['rows' => !empty($rows) ? $rows[0] : null, 'total' => count($model->query("CALL sumCourseTime ('".$startTime."','".$endTime."')")[0])];
			return $this->sucJson($data);
		    
		}
		return $this->fetch();
	}
	public function sumCourseTimeExcel($logmin,$logmax){
		$startTime = empty($logmin) ? date('Y-m-d') : $logmin;
		$endTime = empty($logmax) ? date('Y-m-d') : $logmax;
		$ExcelExportC = new ExcelExport();
		$procedure = "CALL sumCourseTime ('".$startTime."','".$endTime."')";
		$excelName = '课程直播停留时长';
	    $titleArray = array('用户id','用户昵称','用户微信open_id','课程id','课程名称','停留时长（分）','日期');
	    $columnArray = array('user_id','alias','open_id','live_id','class_name','total','statistics_time');
	    $sqlType = 1;
	    $ExcelExportC->buildExcel($procedure,$excelName,$titleArray,$columnArray,$sqlType);
	}

    /**
     * 运营监控数据--课程直播间列表页
     * @return mixed|\think\response\Json
     * @author Lizhijian
     */
    public function sumCourseLive(){
        if(request()->isPost()){
            $rows = LiveStatistics::sumCourseLiveTable()?:[];
            //返回数据
            $data = ['rows' => !empty($rows) ? $rows : [], 'total' => LiveStatistics::$count];
            return $this->sucJson($data);
        }
        return $this->fetch();
    }

    /**
     * 课程直播间列表页导出excel
     * @param $logmin
     * @param $logmax
     * @author Lizhijian
     */
    public function sumCourseLiveExcel(){
        $data = LiveStatistics::sumCourseLiveTable(false);
        $excelData = [
            'fileName' => '课程直播间监控数据',
            'data' => [
                'id' => 'ID',
                'class_name' => '课程名称',
                'type' => '课程类型',
                'plan_num' => '课程安排',
                'alias' => '创建人',
                'study_num' => '历史人数',
                'total' => '总停留时长（分）',
                'ave_total' => '总发言次数',
                'speak_total' => '人均停留时长（分）',
                'ave_speak_total' => '人均发言次数'
            ],
        ];
        ExcelExport::buildExcelByData($data, $excelData);
    }

    /**
     * 运营监控数据--课程直播间列表页--历史人数
     * @return mixed|\think\response\Json
     * @author Lizhijian
     */
    public function sumCourseHistory(){
        if(request()->isPost()){
            $rows = LiveStatistics::sumCourseHistorTable()?:[];
            $data = ['rows' => !empty($rows) ? $rows : [], 'total' => LiveStatistics::$count];
            return $this->sucJson($data);
        }
        $liveId = input('liveId');
        $type = input('type', 0);
        $logMin = input('dateMin')? :date('Y-m-d',time());
        $logMax = input('dateMax')? :date('Y-m-d',time());
        $tabName1 = input('tabName1');
        $tabName2 = input('tabName2');
        $courseName = '';
        if ($type == 0) {
        	$courseM = new \app\admin\model\Course();
        	$res = $courseM->getCourseInfo($liveId,'type,class_name');
        	$courseName = $res['class_name'];
        }else {
        	$userModel = new User();
        	$teacherInfo = $userModel->alias('u')->where('l.id', $liveId - 1000000000)
        	->field('u.alias')
        	->join('live l', 'u.user_id = l.user_id')
        	->find();
        	$courseName = "{$teacherInfo['alias']}的直播间";
        }

        $this->assign('liveId', $liveId);
        $this->assign('type', $type);
        $this->assign('logMin', $logMin);
        $this->assign('logMax', $logMax);
        $this->assign('tabName1', $tabName1);
        $this->assign('tabName2', $tabName2);
        $this->assign('courseName', $courseName);
        
        return $this->fetch();
    }

    /**
     * 课程直播间列表页--历史人数导出excel
     * @author Lizhijian
     */
    public function sumCourseHistoryExcel(){

        $data = LiveStatistics::sumCourseHistorTable(0, false);
        $excelData = [
            'fileName' => '课程直播间监控数据_历史人数',
            'data' => [
                'id' => 'ID',
                'head_add' => '头像',
                'alias' => '昵称',
                'time_total' => '停留时长(分)',
                'speak_total' => '发言次数'
            ],
        ];
        ExcelExport::buildExcelByData($data, $excelData);
    }

    /**
     * 运营监控数据--课程直播间列表页--课程安排
     * @return mixed|\think\response\Json
     * @author Lizhijian
     */
    public function sumCoursePlan(){

        if(request()->isPost()){
            $rows = LiveStatistics::sumCoursePlanTable()?:[];
            //返回数据
            $data = ['rows' => !empty($rows) ? $rows : [], 'total' => LiveStatistics::$count];
            return $this->sucJson($data);
        }
        $liveId = input('liveId');
        $courseM = new \app\admin\model\Course();
        $res = $courseM->getCourseInfo($liveId,'type,class_name');

        $this->assign('logmin', input('logmin'));
        $this->assign('logmax', input('logmax'));
        $this->assign('liveId', $liveId);
        $this->assign('courseName', $res['class_name']);
        return $this->fetch();
    }

    /**
     * 课程直播间列表页--课程安排导出excel
     * @author Lizhijian
     */
    public function sumCoursePlanExcel(){
        $data = LiveStatistics::sumCoursePlanTable(false);
        $excelData = [
            'fileName' => '课程直播间监控数据_课程安排',
            'data' => [
                'id' => 'ID',
                'class_name' => '子课程名称',
                'alias' => '创建人',
                'history_total' => '历史人数',
                'total' => '总停留时长(分)',
                'speak_total' => '总发言次数',
                'ave_total' => '人均停留次数(分)',
                'ave_speak_total' => '人均发言次数',
            ],
        ];
        ExcelExport::buildExcelByData($data, $excelData);
    }
}