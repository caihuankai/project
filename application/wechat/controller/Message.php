<?php
namespace app\wechat\controller;

use app\wechat\model\Message as MMessage;

class Message extends App
{
	protected $noLoginAction = [
			'createMessageRecords',
			'createMessageRecordsJson',
	];
	
	/**
	 * 查询消息中心统计信息,只统计未读信息
	 * ps：查询前会先删除30天前的消息
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function getMessageStatistics()
	{
		$userId = $this->getUserId();
		$messageModel = new MMessage();
		$result = $messageModel->getMessageStatisticsByUserId($userId);
		$existType = [];
		foreach ($result as $info){
			$existType[] = $info['type'];
		}
		//没有对应类型消息时，获取最新一条导语返回
		$typeList = [0,1];//0:系统消息；1:互动消息
		foreach ($typeList as $type){
			if (!in_array($type, $existType)) {
				$result[] = $messageModel->where('type', $type)->where('user_id', $userId)->field('type,lead')->order('id desc')->find();
			}
		}
		
		return $this->sucSysJson($result);
	}
	
	/**
	 * 查询公众号H5消息中心统计信息,只统计未读信息
	 * ps：查询前会先删除30天前的消息
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function getH5MessageStatistics()
	{
		$userId = $this->getUserId();
		$messageModel = new MMessage();
		$result = $messageModel->getMessageStatisticsByUserId($userId);
		$existType = [];
		foreach ($result as $info){
			$existType[] = $info['type'];
		}
		//没有对应类型消息时，获取最新一条导语返回
		$typeList = [3];//系统消息（公众号H5）
		foreach ($typeList as $type){
			if (!in_array($type, $existType)) {
				$result[] = $messageModel->where('type', $type)->where('user_id', $userId)->field('type,lead')->order('id desc')->find();
			}
		}
		
		return $this->sucSysJson($result);
	}
	
	/**
	 * 根据type查询消息列表
	 * ps：会自动把对应类型的消息标记为已读
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function getMessageListByType()
	{
		$userId = $this->getUserId();
		$request = $this->request;
		$type = $request->param('type/i', -1);
		$page = $request->param('page/i', 1);
		$perPage = $request->param('perPage/i', 20);
		if (!in_array($type, [0,1,3])) {
			return $this->errSysJson('无效的参数');
		}
		
		$messageModel = new MMessage();
		$field = 'title,content,link,link_info,create_time';
		$where = [
				'user_id'=>$userId,
				'type'=>$type
		];
		//标记所有信息为已读
		$messageModel->where($where)->update(['status'=>1]);
		//查询数据
		$data = $messageModel->where($where)->field($field)->order('create_time desc,id desc')->page($page, $perPage)->select();
		
		return $this->sucSysJson($data);
	}
	
	/**
	 * 创建消息中心记录，供C++调用
	 * 主要用于：
	 * LIVE_ROOM_UPDATE（学生/流量主/嘉宾	Live直播间有新更新）
	 * ANSWER_LIVE_ROOM_QUESTION（学生/流量主/嘉宾	Live直播间聊天室评论被回复）
	 * ANSWER_COURSE_ROOM_QUESTION（学生/流量主/嘉宾	课程直播间聊天室评论被回复）
	 * @param unknown $const		定义的文案模板名或具体文案数组
	 * @param array $linkInfos		着陆页额外参数
	 * @param array $replaceArray	文案中要替换的内容，按键名和替换内容拼接数组
	 * @param array $userIdList		消息的所有者
	 * @return \think\response\Json
	 */
	public function createMessageRecords($const, array $linkInfos, array $replaceArray, array $userIdList)
	{
		$result = \MessageCenter::instance()->createMessageRecords($const, $linkInfos, $replaceArray, $userIdList);
		if ($result === true){
			return $this->sucSysJson('创建成功');
		}else {
			return $this->errSysJson($result);
		}
	}

    /**
     * 创建消息中心记录，供C++调用
     * 主要用于：
     * LIVE_ROOM_UPDATE（学生/流量主/嘉宾	Live直播间有新更新）
     * ANSWER_LIVE_ROOM_QUESTION（学生/流量主/嘉宾	Live直播间聊天室评论被回复）
     * ANSWER_COURSE_ROOM_QUESTION（学生/流量主/嘉宾	课程直播间聊天室评论被回复）
     * @return \think\response\Json
     */
    public function createMessageRecordsJson()
    {
        $data = json_decode(request()->getContent(),true);
        $const = $data['const'];
        $linkInfos = $data['linkInfos'];
        $replaceArray = $data['replaceArray'];
        $userIdList = $data['userIdList'];
        $result = \MessageCenter::instance()->createMessageRecords($const, $linkInfos, $replaceArray, $userIdList);
        if ($result === true){
            return $this->sucSysJson('创建成功');
        }else {
            return $this->errSysJson($result);
        }
    }
	
	
}