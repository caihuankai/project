<?php
namespace app\admin\model;

use app\common\model\ModelBs;

//公告表
class Notice extends ModelBs{
	//获取公告列表
	public function dataList($page,$limit,$content){
		$offset = ($page - 1) * $limit;
		$where['status'] = 1;
		if (!empty($content)) {
            $where['content'] = ['like', '%'.$content.'%'];
        }
        $data = $this->where($where)->order('endtime desc')->limit($offset, $limit)->select();
        return $data;
	}
	//获取公告总数
	public function count($content){
		$where['status'] = 1;
		if (!empty($content)) {
            $where['content'] = ['like', '%'.$content.'%'];
        }
        $number = $this->where($where)->count();
        return $number;
	}
}