<?php
namespace app\admin\model;

use app\common\model\ModelBs;

class Message extends ModelBs{
	
	public function createMessage($userId, $type, $title, $lead, $content, $link){
		$data = [
				'user_id'=>$userId,
				'type'=>$type,
				'title'=>$title,
				'lead'=>$lead,
				'content'=>$content,
				'link'=>$link
		];
		$result = $this->insert($data);
		if ($result == 1) {
			return true;
		}else {
			return $result;
		}
	}
	
	public function createMessageBatch($datas){
		$result = $this->insertAll($datas);
		if ($result >= 1) {
			return true;
		}else {
			return $result;
		}
	}
	
}