<?php
namespace app\web\controller;

class User extends App
{
	/**
	 * 检查用户是否已登录
	 */
	public function checkWechatLoginIn()
	{
		$app = $this->getWeChatClass();
		$app->getOauthData();//内部检查是否登录，未登录抛出错误
		$userData = $this->getSessionUserData();
		$result = [
				'userId'=>$userData['user_id'],
				'alias'=>$userData['alias'],
				'head_add'=>$userData['head_add'],
				'isRegister'=>!empty($userData['register_time']) && $userData['register_time'] != '0000-00-00 00:00:00' ? true : false,//是否关注
		];
		return $this->sucSysJson($result);
	}
	
	/**
	 * 获取用户介绍页顶部数据
	 *
	 * @author aozhuochao<aozhuochao@99cj.com.cn>
	 */
	public function getUserLiveInfoByUserId($userId)
	{
		$userId = intval($userId);
		$userData = $this->user->getInfoById($userId, 'user_id, head_add, alias, intro, freeze, introduction_code_id,lobby_img');
		if (empty($userData)) {
			return $this->errSysJson(\app\common\controller\JsonResult::ERR_USER_NOT_EXISTS);
		}
		
		$liveData = (new \app\wechat\model\Live())->getDataByLiveIdAndUser('id, focus_num, popular, open_status, theme', $userData['user_id']);
		$liveData = !empty($liveData) ? $liveData : [];
		$liveId = getDataByKey($liveData, 'id', 0);
		
		return $this->sucSysJson([
				'userId' => $userData['user_id'],
				'theme' => getDataByKey($liveData, 'theme', 0),
				'freeze' => $userData['freeze'], // 用户状态
				'liveId' => $liveId,
				'pic' => $userData['head_add'],
				'username' => $userData['alias'],
				'focusNum' => getDataByKey($liveData, 'focus_num', 0), // 关注数
				'popular' => getDataByKey($liveData, 'popular', 0), // 人气值
				'liveStatus' => getDataByKey($liveData, 'open_status', 0), // 直播间状态
				'content' => $userData['intro'], // 用户介绍
				'imgList' => (new \app\common\model\LiveImg())->getImgList($userData['user_id'], 3),
				'introductionUrl' => (new \app\wechat\model\QiniuGallerys())->getVideoData($userData['introduction_code_id']), // 介绍视频
				'lobby_img' => $userData['lobby_img'],//介绍页封面图
		]);
	}
	
	
	
}