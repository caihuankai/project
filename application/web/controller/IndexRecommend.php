<?php
namespace app\web\controller;

class IndexRecommend extends App
{
	/**
	 * 获取首页每日精选
	 * @return \think\response\Json
	 * @author liujuneng
	 */
	public function getChoiceList()
	{
		$data = \CacheBase::cacheData([__METHOD__, $this->request->param()], function () {
			$request = $this->request;
			$orderBy = $request->param('orderBy', 'id desc');
			
			$model = new \app\web\model\IndexRecommend();
			
			$dataList = $model->where('type', 'in', '12,13')
			->where('status', 1)
			->order($orderBy)
			->select();

			$viewpointIdList = $viewpointInfoList = $courseIdList = $courseInfoList = [];
			foreach ($dataList as $data) {
				if ($data['type'] == 12) {
					$viewpointIdList[] = $data['type_id'];
				}elseif ($data['type'] == 13) {
					$courseIdList[] = $data['type_id'];
				}
			}
			
			//查询观点
			if (!empty($viewpointIdList)) {
				$model = new \app\web\model\Viewpoint();
				$viewpointInfoList = $model->alias('v')
				->join('talk_qiniu_gallerys qg','v.cover_qiniu_id = qg.id','left')
				->where('v.id', 'in', $viewpointIdList)
				->where('v.status', 1)
				->column('v.id as viewpointId,v.title,qg.qiniuImg as coverPic');
			}
			//查询课程
			if (!empty($courseIdList)) {
				$courseModel = new \app\web\model\Course();
				$courseInfoList = $courseModel
				->where('id', 'in', $courseIdList)
				->column('id,class_name,src_img,src_pc_img,type');
			}
			
			$result = [];
			foreach ($dataList as $data){
				if ($data['type'] == 12) {//观点
					if (isset($viewpointInfoList[$data['type_id']])) {
						$result[] = [
								'type'=>$data['type'],
								'type_id'=>$data['type_id'],
								'title'=>$viewpointInfoList[$data['type_id']]['title'],
								'coverPic'=>$viewpointInfoList[$data['type_id']]['coverPic'],
						];
					}
				}elseif ($data['type'] == 13) {//课程
					if (isset($courseInfoList[$data['type_id']])) {
						$result[] = [
								'type'=>$data['type'],
								'type_id'=>$data['type_id'],
								'title'=>$courseInfoList[$data['type_id']]['class_name'],
								'courseType'=>$courseInfoList[$data['type_id']]['type'],
								'coverPic'=>!empty($courseInfoList[$data['type_id']]['src_pc_img']) ? $courseInfoList[$data['type_id']]['src_pc_img'] : $courseInfoList[$data['type_id']]['src_img'],
						];
					}
				}
			}
			
			return $result;
		});
			
		return $this->sucSysJson($data);
	}
	
	
	
}