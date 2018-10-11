<?php
namespace app\admin\controller;

use app\admin\model\Generalize as GeneralizeM;
use app\admin\model\Course;

class Generalize extends App{
	public function index(){
		$GeneralizeM = new GeneralizeM();
		if(request()->isPost()){
			$page = !isset($param['pageNumber']) ? 1 : $param['pageNumber'];
            $size = !isset($param['pageSize']) ? 10 : $param['pageSize'];
            $data = $GeneralizeM->getList($page,$size);
            if(!empty($data['list'])){
				foreach ($data['list'] as $k => $v) {
					switch ($v['target_type']) {
						case 1:
							$v['target_type_name'] = '课程';
							break;
						case 2:
							$v['target_type_name'] = '观点';
							break;
						case 3:
							$v['target_type_name'] = '外链';
							break;
						case 4:
							$v['target_type_name'] = '讲师介绍页';
							break;
					}
					$v['cover_img'] = '<img src="'.$v['cover_img'].'" style="width: 60px;">';
					$v['operate'] = '<a href="javascript:generalize_edit('.$v['id'].');">编辑</a>';
					switch ($v['status']) {
						case 1:
							$v['status_name'] = '启用';
                    		$v['operate'] .= ' | <a href="javascript:generalize_disable('.$v['id'].');">禁用</a>';
							break;
						
						case 2:
							$v['status_name'] = '禁用';
                    		$v['operate'] .= ' | <a href="javascript:generalize_enable('.$v['id'].');">启用</a>';
							break;
					}
                    $v['operate'] .= ' | <a href="javascript:generalize_del('.$v['id'].');">删除</a>';
				}
			}
            $list = ['rows' => $data['list'], 'total' => $data['count']];
            return $this->sucJson($list);
		}
		return $this->fetch();
	}
	public function addGeneralize(){
		if(request()->isPost()){
			$param = input('post.');
			if(empty($param['title'])){
				return $this->error('请填写标题');
			}
			if(empty($param['target_type'])){
				return $this->error('请选择跳转类型');
			}
			if(empty($param['type_id'])){
				return $this->error('请填写ID/链接');
			}
			if(empty($param['cover_img'])){
				return $this->error('请上传封面图片');
			}
			//处理url
			$data = $this->handleUrl($param['target_type'],$param['type_id']);
			$GeneralizeM = new GeneralizeM();
			$insertData['title'] = $param['title'];
			$insertData['cover_img'] = $param['cover_img'];
			$insertData['target_type'] = $param['target_type'];
			$insertData['type_id'] = $data['id'];
			$insertData['url'] = $data['url'];
			$insertData['status'] = $param['status'];
			$insertData['admin_id'] = $_SESSION['adminSess']['admin']['id'];
			$insertData['admin_name'] = $_SESSION['adminSess']['admin']['username'];
			$state = $GeneralizeM->insert($insertData);
			if($state){
				$rtd['status'] = 1;
                $rtd['msg'] = "新增成功";
                return $rtd;
			}else{
				$rtd['status'] = -1;
                $rtd['msg'] = "新增失败";
                return $rtd;
			}
		}
		return $this->fetch();
	}

	public function editGeneralize(){
		$GeneralizeM = new GeneralizeM();
		$id = (int)input('id');
		$data = $GeneralizeM->where('id',$id)->find();
		if(request()->isPost()){
			$param = input('post.');
			if(empty($param['title'])){
				return $this->error('请填写标题');
			}
			if(empty($param['target_type'])){
				return $this->error('请选择跳转类型');
			}
			if(empty($param['type_id'])){
				return $this->error('请填写ID/链接');
			}
			if(empty($param['cover_img'])){
				return $this->error('请上传封面图片');
			}
			//处理url
			$data = $this->handleUrl($param['target_type'],$param['type_id']);
			$GeneralizeM = new GeneralizeM();
			$updateData['title'] = $param['title'];
			$updateData['cover_img'] = $param['cover_img'];
			$updateData['target_type'] = $param['target_type'];
			$updateData['type_id'] = $data['id'];
			$updateData['url'] = $data['url'];
			$updateData['status'] = $param['status'];
			$updateData['update_time'] = date('Y-m-d H:i:s');
			$updateData['admin_id'] = $_SESSION['adminSess']['admin']['id'];
			$updateData['admin_name'] = $_SESSION['adminSess']['admin']['username'];
			$state = $GeneralizeM->where('id',$id)->update($updateData);
			if($state){
				$rtd['status'] = 1;
                $rtd['msg'] = "编辑成功";
                return $rtd;
			}else{
				$rtd['status'] = -1;
                $rtd['msg'] = "编辑失败";
                return $rtd;
			}
		}
		$this->assign('data',$data);
		return $this->fetch();
	}

	public function disableGeneralize(){
		$id = (int)input('id');
        $GeneralizeM = new GeneralizeM();
        $status = $GeneralizeM->where('id',$id)->update([
            'status' => 2,
            'update_time' => date('Y-m-d H:i:s'),
            'admin_id' => $_SESSION['adminSess']['admin']['id'],
            'admin_name' => $_SESSION['adminSess']['admin']['username'],
        ]);
        if($status){
            $rtd['status'] = 1;
            $rtd['msg'] = "禁用成功";
            return $rtd;
        }else{
            $rtd['status'] = -1;
            $rtd['msg'] = "禁用失败";
            return $rtd;
        }
	}

	public function enableGeneralize(){
		$id = (int)input('id');
        $GeneralizeM = new GeneralizeM();
        $status = $GeneralizeM->where('id',$id)->update([
            'status' => 1,
            'update_time' => date('Y-m-d H:i:s'),
            'admin_id' => $_SESSION['adminSess']['admin']['id'],
            'admin_name' => $_SESSION['adminSess']['admin']['username'],
        ]);
        if($status){
            $rtd['status'] = 1;
            $rtd['msg'] = "启用成功";
            return $rtd;
        }else{
            $rtd['status'] = -1;
            $rtd['msg'] = "启用失败";
            return $rtd;
        }
	}

	public function delGeneralize(){
		$id = (int)input('id');
        $GeneralizeM = new GeneralizeM();
        $status = $GeneralizeM->where('id',$id)->update([
            'status' => 0,
            'update_time' => date('Y-m-d H:i:s'),
            'admin_id' => $_SESSION['adminSess']['admin']['id'],
            'admin_name' => $_SESSION['adminSess']['admin']['username'],
        ]);
        if($status){
            $rtd['status'] = 1;
            $rtd['msg'] = "删除成功";
            return $rtd;
        }else{
            $rtd['status'] = -1;
            $rtd['msg'] = "删除失败";
            return $rtd;
        }
	}

	public function handleUrl($target_type,$type_id){
		switch ($target_type) {
			case 1:
				$data['id'] = $type_id;
				$CourseM = new Course();
				$CourseType = $CourseM->where('id',$type_id)->value('type');
				if($CourseType == 1){
					$data['url'] = config('WEB_DOMAIN').'/#/specialCourseDetail/'.$type_id;
				}elseif($CourseType == 2){
					$data['url'] = config('WEB_DOMAIN').'/#/seriesCourseDetail/'.$type_id;
				}elseif ($CourseType == 3) {
					$data['url'] = config('WEB_DOMAIN').'/#/trainingPrevue/'.$type_id;
				}else{
					$data['url'] = config('WEB_DOMAIN').'/#/specialCourseDetail/'.$type_id;
				}
				break;
			case 2:
				$data['id'] = $type_id;
				$data['url'] = config('WEB_DOMAIN').'/#/pointDetail/'.$type_id;
				break;
			case 3:
				$data['id'] = $type_id;
				$data['url'] = $type_id;
				break;
			case 4:
				$data['id'] = $type_id;
				$data['url'] = config('WEB_DOMAIN').'/#/teacherIntroduction/'.$type_id;
				break;
			default:
				$data['id'] = '';
				$data['url'] = '';
				break;
		}
		return $data;
	}
}