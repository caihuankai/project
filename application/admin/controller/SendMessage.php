<?php
namespace app\admin\controller;

use app\admin\controller\Ads;
use app\common\model\PushMessage;
use app\wechat\controller\SendChatMessage;

class SendMessage extends App{
	public function messageList(){
		$model = new PushMessage();
		if(request()->isPost()){
			$param = input('param.');
			$list = $model->getList($param);
			foreach ($list as $k => $v) {
				if($v['type'] == 0){
					$v['type_name'] = '文字消息';
				}elseif ($v['type'] == 1) {
					$v['type_name'] = '图片消息';
				}elseif($v['type'] == 3){
					$v['type_name'] = '图文消息(多篇)';
				}else{
					$v['type_name'] = '图文消息(单篇)';
				}
				if($v['push_target'] == 0){
					$v['push_target_name'] = '所有用户';
				}elseif ($v['push_target'] == 1) {
					$v['push_target_name'] = '付费用户';
				}elseif ($v['push_target'] == 2) {
					$v['push_target_name'] = '未付费用户';
				}elseif ($v['push_target'] == 3) {
					$v['push_target_name'] = '独立用户';
				}
				$v['operate'] = '<a href="javascript:message_detail('.$v['id'].');">详情</a>';
				if($v['status'] == 0){
					$v['operate'] .= ' | <a href="javascript:message_del('.$v['id'].');">删除</a>';
				}
			}
			$data = ['rows' => $list, 'total' => $model->getCount($param)];
			return $this->sucJson($data);
		}
		return $this->fetch();
	}
	//添加推送内容
	public function addMessage(){
		if(request()->isPost()){
			$type = input('type');//'消息类型 3:文字消息；1:图片消息；2:图文消息'
			$send_count = input('send_count');//图文篇数
			$title = input('title');//标题
			$baseFile = input('baseFile');//图片
			$content = input('content');//内容
			$jump_type = input('jump_type');//跳转链接类型 0:链接,1:课程id,2:观点id
			$jump_url = input('jump_url');//跳转链接
			$push_target = input('push_target');//目标用户 0：所有人；1: 局部用户；3：指定用户'
			$push_target_c = input('push_target_c');//目标用户 1：付费用户，2：未付费用户
			$user_id = input('user_id');//指定用户id
			$push_type = input('push_type');//1:立即推送，2：定时推送
			$push_time = input('push_time');//推送时间
			$file = request()->file('file');
			if(!isset($type)){
				return $this->error('请选择消息类型');
			}
			if(!isset($push_target)){
				return $this->error('请选择推送用户');
			}
			if($push_target == 1 && empty($push_target_c)){
				return $this->error('请选择局部用户类型');
			}
			if($push_target == 3 && empty($user_id)){
				return $this->error('请填写指定用户ID');
			}
			if(empty($push_type)){
				return $this->error('请选择推送时间');
			}
			if($push_type == 2 && empty($push_time)){
				return $this->error('请选择定时推送时间');
			}
			//文字消息和单篇图文
			if($type == 0 || ($type == 2 && $send_count == 1)){
				if($type == 0){
					if(empty($content)){
						return $this->error('请输入内容');
					}
				}
				elseif($type == 1){
					if(empty($baseFile)){
						return $this->error('请上传图片');
					}
				}
				elseif($type == 2){
					if(empty($title)){
						return $this->error('请输入标题');
					}
					if(empty($baseFile)){
						return $this->error('请上传图片');
					}
					if(empty($content)){
						return $this->error('请输入内容');
					}
					if(!isset($jump_type)){
						return $this->error('请选择跳转类型');
					}
					if(empty($jump_url)){
						return $this->error('请填写跳转url');
					}
					//拼接跳转url
					if($jump_type == 1){
						$jump_url = config('WX_DOMAIN').'/#/personalCenter/course/'.$jump_url.'&0';
					}
					if($jump_type == 2){
						$jump_url = config('WX_DOMAIN').'/#/personalSpace/viewpointDetail/'.$jump_url.'&0';
					}
				}
				//上传图片
				// if($type == 1 || $type == 2){
				// 	$AdsC = new Ads();
				// 	$baseFile = $AdsC->uploadImg($baseFile);
				// 	$baseFile = json_decode($baseFile,true);
				// 	if(empty($baseFile['key'])){
				// 		return $this->error('图片上传失败');
				// 	}
				// 	$baseFile = $baseFile['key'];
				// }
				$json['jump_type'] = $jump_type;
				$json['jump_url'] = $jump_url;
				$json['title'] = $title;
				$json['content'] = $content;
				$json['image'] = $baseFile;

			}else{//多篇图文
				$count = input('count');//图文篇数
				$json = array();
				for ($i=1; $i <= $count; $i++) { 
					$jump_type = input('jump_type'.$i.'');//跳转链接类型 0:链接,1:课程id,2:观点id
					if(!isset($jump_type)){
						return $this->error('请选择图文'.$i.'跳转类型');
					}
					$jump_url = input('jump_url'.$i.'');//跳转链接
					if(empty($jump_url)){
						return $this->error('请填写图文'.$i.'跳转url');
					}
					//拼接跳转url
					if($jump_type == 1){
						$jump_url = config('WX_DOMAIN').'/#/personalCenter/course/'.$jump_url.'&0';
					}
					if($jump_type == 2){
						$jump_url = config('WX_DOMAIN').'/#/personalSpace/viewpointDetail/'.$jump_url.'&0';
					}
					$title = input('title'.$i.'');//标题
					if(empty($title)){
						return $this->error('请输入图文'.$i.'标题');
					}
					$baseFile = input('baseFile'.$i.'');//图片
					if(empty($baseFile)){
						return $this->error('请上传图文'.$i.'图片');
					}
					$json[$i]['jump_type'] = $jump_type;
					$json[$i]['jump_url'] = $jump_url;
					$json[$i]['title'] = $title;
					$json[$i]['content'] = '';
					$json[$i]['image'] = $baseFile;
				}
				$type = 3;
			}
			//需要保存数据
			$data['type'] = $type;
			$data['push_type'] = $push_type;
			$data['push_target'] = $push_target;
			if($push_target == 1){
				$data['push_target'] = $push_target_c;
			}
			$data['user_id'] = $user_id;
			$data['content'] = json_encode($json);
			if($push_type == 2){
				$data['push_time'] = $push_time;
			}
			$data['operatorId'] = $_SESSION['adminSess']['admin']['id'];
            $data['operatorName'] = $_SESSION['adminSess']['admin']['username'];
            $model = new PushMessage();
			$SendChatMessageC = new SendChatMessage();
            $state = $model->insertGetId($data);
            if($push_type == 1){
	            $SendChatMessageC->pushMsg($state);
            }
            if($state > 0){
				$rtd['status'] = 1;
				$rtd['msg'] = "推送成功";
	        	return $rtd;
			}else{
				$rtd['status'] = -1;
				$rtd['msg'] = "推送失败";
	        	return $rtd;
			}
		}
		return $this->fetch();
	}
	//删除数据
	public function data_del($id){
		$id = (int)$id;
		$model = new PushMessage();
		$status = $model->where('id',$id)->update([
			'status' => 2,
			'update_time' => date('Y-m-d H:i:s'),
			'operatorId' => $_SESSION['adminSess']['admin']['id'],
			'operatorName' => $_SESSION['adminSess']['admin']['username'],
		]);
		if($status){
			return 1;
		}
	}
	/**
	 * 查看详情
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function detail(){
		$model = new PushMessage();
		$id = (int)input('id');
		$data = $model->where('id',$id)->find();
		if(!empty($data)){
			if($data['type'] == 0 || $data['type'] == 2){
				$content = json_decode($data['content'],true);
				$data['jump_type'] = $content['jump_type'];
				$data['jump_url'] = $content['jump_url'];
				$data['title'] = $content['title'];
				$data['content'] = $content['content'];
				$data['image'] = $content['image'];
			}elseif($data['type'] == 3){
				$content = json_decode($data['content'],true);
				$data['jump_type'] = '';
				$data['jump_url'] = '';
				$data['title'] = '';
				$data['contentArray'] = $content;
				$data['content'] = '';
				$data['image'] = '';
				$data['count'] = count($content);
			}
		}
		$this->assign('data',$data);
		return $this->fetch();
	}





	//test
	public function yulan(){
		$model = new PushMessage();
		if(request()->isPost()){
			$type = input('type');//'消息类型 3:文字消息；1:图片消息；2:图文消息'
			$send_count = input('send_count');//图文篇数
			$title = input('title');//标题
			$baseFile = input('baseFile');//图片
			$content = input('content');//内容
			$jump_type = input('jump_type');//跳转链接类型 0:链接,1:课程id,2:观点id
			$jump_url = input('jump_url');//跳转链接
			$push_target = input('push_target');//目标用户 0：所有人；1: 局部用户；3：指定用户'
			$push_target_c = input('push_target_c');//目标用户 1：付费用户，2：未付费用户
			$user_id = input('user_id');//指定用户id
			$push_type = input('push_type');//1:立即推送，2：定时推送
			$push_time = input('push_time');//推送时间
			$file = request()->file('file');
			if(!isset($type)){
				return $this->error('请选择消息类型');
			}
			if(!isset($push_target)){
				return $this->error('请选择推送用户');
			}
			if($push_target == 1 && empty($push_target_c)){
				return $this->error('请选择局部用户类型');
			}
			if($push_target == 3 && empty($user_id)){
				return $this->error('请填写指定用户ID');
			}
			if(empty($push_type)){
				return $this->error('请选择推送时间');
			}
			if($push_type == 2 && empty($push_time)){
				return $this->error('请选择定时推送时间');
			}
			//文字消息和单篇图文
			if($type == 0 || ($type == 2 && $send_count == 1)){
				if($type == 0){
					if(empty($content)){
						return $this->error('请输入内容');
					}
				}
				elseif($type == 1){
					if(empty($baseFile)){
						return $this->error('请上传图片');
					}
				}
				elseif($type == 2){
					if(empty($title)){
						return $this->error('请输入标题');
					}
					if(empty($baseFile)){
						return $this->error('请上传图片');
					}
					if(empty($content)){
						return $this->error('请输入内容');
					}
					if(!isset($jump_type)){
						return $this->error('请选择跳转类型');
					}
					if(empty($jump_url)){
						return $this->error('请填写跳转url');
					}
					//拼接跳转url
					if($jump_type == 1){
						$jump_url = config('WX_DOMAIN').'/#/personalCenter/course/'.$jump_url.'&0';
					}
					if($jump_type == 2){
						$jump_url = config('WX_DOMAIN').'/#/personalSpace/viewpointDetail/'.$jump_url.'&0';
					}
				}
				//上传图片
				// if($type == 1 || $type == 2){
				// 	$AdsC = new Ads();
				// 	$baseFile = $AdsC->uploadImg($baseFile);
				// 	$baseFile = json_decode($baseFile,true);
				// 	if(empty($baseFile['key'])){
				// 		return $this->error('图片上传失败');
				// 	}
				// 	$baseFile = $baseFile['key'];
				// }
				$json['jump_type'] = $jump_type;
				$json['jump_url'] = $jump_url;
				$json['title'] = $title;
				$json['content'] = $content;
				$json['image'] = $baseFile;

			}else{//多篇图文
				$count = input('count');//图文篇数
				$json = array();
				for ($i=1; $i <= $count; $i++) { 
					$jump_type = input('jump_type'.$i.'');//跳转链接类型 0:链接,1:课程id,2:观点id
					if(!isset($jump_type)){
						return $this->error('请选择图文'.$i.'跳转类型');
					}
					$jump_url = input('jump_url'.$i.'');//跳转链接
					if(empty($jump_url)){
						return $this->error('请填写图文'.$i.'跳转url');
					}
					//拼接跳转url
					if($jump_type == 1){
						$jump_url = config('WX_DOMAIN').'/#/personalCenter/course/'.$jump_url.'&0';
					}
					if($jump_type == 2){
						$jump_url = config('WX_DOMAIN').'/#/personalSpace/viewpointDetail/'.$jump_url.'&0';
					}
					$title = input('title'.$i.'');//标题
					if(empty($title)){
						return $this->error('请输入图文'.$i.'标题');
					}
					$baseFile = input('baseFile'.$i.'');//图片
					if(empty($baseFile)){
						return $this->error('请上传图文'.$i.'图片');
					}
					$json[$i]['jump_type'] = $jump_type;
					$json[$i]['jump_url'] = $jump_url;
					$json[$i]['title'] = $title;
					$json[$i]['content'] = '';
					$json[$i]['image'] = $baseFile;
				}
				$type = 3;
			}
			//需要保存数据
			$data['type'] = $type;
			$data['push_type'] = $push_type;
			$data['push_target'] = $push_target;
			$data['status'] = 3;
			if($push_target == 1){
				$data['push_target'] = $push_target_c;
			}
			$data['user_id'] = $user_id;
			$data['content'] = json_encode($json);
			if($push_type == 2){
				$data['push_time'] = $push_time;
			}
			$data['operatorId'] = $_SESSION['adminSess']['admin']['id'];
            $data['operatorName'] = $_SESSION['adminSess']['admin']['username'];
            $state = $model->insertGetId($data);
            if($state > 0){
				$rtd['status'] = 1;
				$rtd['msg'] = $state;
	        	return $rtd;
			}
		}
		return $this->fetch();
	}
	public function sendYulan(){
		$id = (int)input('id');
		$this->assign('id',$id);
		if(request()->isPost()){
			$user_id = input('user_id');
			if(empty($user_id)){
				return $this->error('请填写用户ID');
			}
			$SendChatMessageC = new SendChatMessage();
			$SendChatMessageC->pushMsgForUser(input('id'),$user_id);
			$rtd['status'] = 1;
			$rtd['msg'] = '发送成功';
	        return $rtd;
		}
		return $this->fetch();
	}
	/**
	 * 上传图片
	 * @return [type] [description]
	 */
	public function upImg(){
		$baseFile = input('baseFile');
		$AdsC = new Ads();
		$baseFile = $AdsC->uploadImg($baseFile);
		$baseFile = json_decode($baseFile,true);
		if(empty($baseFile['key'])){
			return $this->error('图片上传失败');
		}
		$baseFile = 'http://oqt46pvmm.bkt.clouddn.com/'.$baseFile['key'];
		return $baseFile;
	}
	/**
	 * 添加超链接
	 * @param [type] $url_type  跳转类型
	 * @param [type] $url_id    ID/链接
	 * @param [type] $url_title 链接标题
	 */
	public function addUrl($url_type,$url_id,$url_title){
		switch ($url_type) {
			case 1:
				$url = $url_id;
				break;
			case 2:
				$url = config('WX_DOMAIN').'/#/personalCenter/course/'.$url_id;
				break;
			case 3:
				$url = config('WX_DOMAIN').'/#/specialTrainAdvance/'.$url_id;
				break;
			case 4:
				$url = config('WX_DOMAIN').'/#/periodical/'.$url_id;
				break;
			case 5:
				$url = config('WX_DOMAIN').'/#/column/detail/'.$url_id;
				break;
			case 6:
				$url = config('WX_DOMAIN').'/#/live/'.$url_id;
				break;
			case 7:
				$url = config('WX_DOMAIN').'/#/publicOnlive';
				break;
			
			default:
				# code...
				break;
		}
		return "<a href='".$url."'>".$url_title."</a>";
	}

}

