<?php

namespace app\admin\model;



/**
 * 分类表
 *
 * @package app\admin\model
 */
class LiveCate extends \app\common\model\LiveCate
{
    
    /**
     * 后台不考虑分类状态
     *
     * @param int $status
     * @return false|\PDOStatement|string|\think\Collection
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
	public function getAllCateData($status = 0, $type = 1)
    {
    	return parent::getAllCateData($status, $type);
    }
    
    
    /**
     * 获取一级分类
     *
     * @return false|\PDOStatement|string|\think\Collection
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function getFloorCate($status = 1, $type = 1)
    {
    	$where = ['pid'=>0, 'type'=>$type];
        if (!empty($status)) {
            $where['status'] = $status;
        }
        
        return $this->where($where)->order('sort asc')->column('name', 'id');
    }
    
    

    
    
    /**
     * 检测一级分类是否存在二级分类
     *
     * @param array $ids
     * @return array
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function checkFloorCate(array $ids)
    {
        $data = $this->where(['pid' => ['in', $ids]])->group('pid')->column('pid');
    
        return array_diff($ids, $data);
    }
    
    

    
}