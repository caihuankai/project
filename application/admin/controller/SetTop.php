<?php
namespace app\admin\controller;

use app\admin\model\SetTop as SetTopM;
use app\admin\model\PayOrder;

//可用于各种置顶需求
class SetTop extends App{
	/**
	 * 99学院首页-精品课程
	 */
	public function index($formtype=1){
		$SetTopM = new SetTopM();
		$PayOrderM = new PayOrder();
		if(request()->isPost()){
			$param = input('param.');
			$page = !isset($param['pageNumber']) ? 1 : $param['pageNumber'];
            $size = !isset($param['pageSize']) ? 10 : $param['pageSize'];
            $data = $SetTopM->dataList($page,$size,$param['courseName'],$param['teacherName'],$param['type'],$param['level'],$param['isTop'],$param['logmin'],$param['logmax'],$formtype);
            foreach ($data['list'] as $k => $v) {
            	if($v['type'] == 1){
            		$v['type_name'] = '专题课';
            	}else{
            		$v['type_name'] = '系列课';
            	}
            	if($v['level'] == 0 || $v['level'] == 1){
            		$v['level_name'] = '免费';
            	}else{
            		$v['level_name'] = '付费';
            	}
            	$v['bugNum'] = $PayOrderM->field('id')->where('state',1)->where('class_id',$v['course_id'])->where('type',1)->count();
            	$v['num'] = $v['bugNum'] .'/'.$v['study_num'];
            	$v['operate'] = '<a href="/Course/details/id/'.$v['course_id'].'">详情</a>';
            	if(!empty($v['operatorName'])){
            		$v['operate'] .= ' | <a href="javascript:recomment_stop('.$v['id'].');">取消置顶</a>';
                	$v['operate'] .= ' | <a href="javascript:recomment_edit('.$v['id'].');">排序</a>';
            	}else{
            		$v['operate'] .= ' | <a href="javascript:recomment_start('.$v['course_id'].','.$formtype.');">置顶</a>';
            		if($formtype == 1){
            			if(!empty($v['ta_operatorName'])){
            				$v['operate'] .= ' | <a href="javascript:recomment_edit('.$v['ta_id'].');">排序</a>';
            				$v['operatorName'] = $v['ta_operatorName'];
            				$v['sort'] = $v['ta_sort'];
            			}else{
            				$v['operate'] .= ' | <a href="javascript:recomment_start_ta('.$v['course_id'].');">排序</a>';
            			}
            		}
            	}
            }
            $dataList = ['rows' => $data['list'], 'total' => $data['count']];
            return $this->sucJson($dataList);
		}
		return $this->fetch();
	}
	/**
	 * 置顶
	 * @param  [type] $id 课程id
	 * @return [type]     [description]
	 */
	public function recomment_start($id,$type){
		$SetTopM = new SetTopM();
		if($type == 1){
			$SetTopM->where('target_id',$id)->where('type',4)->delete();
		}
		if(empty($id)){
			$rtd['status'] = -1;
            $rtd['msg'] = "置顶失败";
			return $rtd;
		}
		$insertData['type'] = $type;
		$insertData['target_id'] = $id;
		$insertData['operatorId'] = $_SESSION['adminSess']['admin']['id'];
        $insertData['operatorName'] = $_SESSION['adminSess']['admin']['username'];
        $state = $SetTopM->insert($insertData);
        if($state){
        	$rtd['status'] = 1;
            $rtd['msg'] = "置顶成功";
            return $rtd;
        }

	}
	/**
	 * 置顶
	 * @param  [type] $id 课程id
	 * @return [type]     [description]
	 */
	public function recommentStartTa($id){
		$SetTopM = new SetTopM();
		if(request()->isPost()){
			$param = input('post.');
			if(empty($param['id'])){
				$rtd['status'] = -1;
	            $rtd['msg'] = "排序失败";
				return $rtd;
			}
			$insertData['type'] = 4;
			$insertData['target_id'] = $param['id'];
			$insertData['sort'] = $param['sort'];
			$insertData['operatorId'] = $_SESSION['adminSess']['admin']['id'];
	        $insertData['operatorName'] = $_SESSION['adminSess']['admin']['username'];
	        $state = $SetTopM->insert($insertData);
	        if($state){
	        	$rtd['status'] = 1;
	            $rtd['msg'] = "排序成功";
	            return $rtd;
	        }
		}
		$this->assign('id',$id);
        return $this->fetch();

	}
	/**
	 * 取消置顶
	 * @param  [type] $id talk_set_top表id
	 * @return [type]     [description]
	 */
	public function recomment_stop($id){
		$SetTopM = new SetTopM();
		$state = $SetTopM->where('id',$id)->delete();
		$rtd['status'] = 1;
        $rtd['msg'] = "取消成功";
        return $rtd;
	}
	/**
	 * 修改排序
	 * @return [type] [description]
	 */
	public function recommentEdit(){
		$SetTopM = new SetTopM();
		$id = (int)input('id');
		$data = $SetTopM->where('id',$id)->find();
		if(request()->isPost()){
			$param = input('post.');
			$updateData['sort'] = $param['sort'];
			$updateData['update_time'] = date('Y-m-d H:i:s');
			$updateData['operatorId'] = $_SESSION['adminSess']['admin']['id'];
            $updateData['operatorName'] = $_SESSION['adminSess']['admin']['username'];
            $state = $SetTopM->where('id',$param['id'])->update($updateData);
            if($state){
                $rtd['status'] = 1;
                $rtd['msg'] = "修改成功";
                return $rtd;
            }else{
                $rtd['status'] = -1;
                $rtd['msg'] = "修改失败";
                return $rtd;
            }
		}
		$this->assign('data',$data);
        return $this->fetch();
	}

}