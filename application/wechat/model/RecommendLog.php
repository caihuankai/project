<?php
namespace app\wechat\model;

use app\common\model\ModelBs;

class RecommendLog  extends ModelBs
{
	/**
	 * 获取直播间推荐过的课程/观点
	 * @param unknown $userId
	 * @param unknown $type
	 * @param unknown $condition
	 * @param number $pageNo
	 * @param number $perPage
	 * @param string $orderBy
	 * @param string $isUserInfo
	 * @return NULL|array|\think\Collection|\think\db\false|PDOStatement|string
	 * @author liujuneng
	 */
	public function getRecommendLogByType($userId, $receiverType, $receiverId, $type, $condition = null, $pageNo = 1, $perPage = 20, $orderBy = 'id asc', $isUserInfo = false)
	{
		$targetTableName = '';
		$targetModel = null;
		switch ($type){
			case 1:
				$targetTableName = 'talk_course'; 
				$targetModel = new \app\wechat\model\Course();
				break;
			case 2:
				$targetTableName = 'talk_viewpoint';
				$targetModel = new \app\wechat\model\Viewpoint();
				break;
			default:
				return null;
		}
		
		if (!empty($receiverType)) {
			$this->where('receiver_type', $receiverType);
		}
		if (!empty($receiverId)) {
			$this->where('receiver_id', $receiverId);
		}
		
		//根据条件查询targetId列表
		$targetIdList = $this->where('type', $type)
			->where($condition)
			->where('user_id', $userId)
			->order($orderBy)->page($pageNo, $perPage)
			->fetchClass('\CollectionBase')
			->select()
			->column('target_id');
		
		$data = [];
		if (!empty($targetIdList)) {
			//查询推荐内容
			$query = $targetModel;
			//需要获取用户信息时，连表talk_user查询
			$field = null;
			if ($isUserInfo) {
				$field = 't.*,tu.head_add,tu.alias';
				$query = $query->alias('t')->join('talk_user tu', 'tu.user_id = t.uid')->where('t.id', 'in', $targetIdList);
				if ($type == 1) {
					//课程已删除和屏蔽的不显示
					$query = $query->where('t.status', '<>', 5)->where('t.open_status', 1);
				}elseif ($type == 2) {
					//观点已删除的不显示
					$query = $query->where('t.status', '<>', 2);
				}
			}else {
				$query = $query->where('id', 'in', $targetIdList);
			}
			
			//执行查询
			$dataList = $query->field($field)->fetchClass('\CollectionBase')->select()->column(null, 'id');
			
			//按照原来的排序返回
			foreach ($targetIdList as $targetId) {
				if (isset($dataList[$targetId])) {
					if (isset($dataList[$targetId]['price'])) {
						$dataList[$targetId]['price'] = (float)$dataList[$targetId]['price'];
					}
					if (isset($dataList[$targetId]['original_price'])) {
						$dataList[$targetId]['original_price'] = (float)$dataList[$targetId]['original_price'];
					}
					if (isset($dataList[$targetId]['src_img'])) {
						$dataList[$targetId]['process_src_img'] = \helper\UrlSys::handleIndexImg($dataList[$targetId]['src_img']);
					}
					$data[] = $dataList[$targetId];
				}
			}
			
		}
		
		return $data;
	}
	
	
}