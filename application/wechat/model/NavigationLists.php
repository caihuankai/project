<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/3/29
 * Time: 10:41
 */

namespace app\wechat\model;


use app\api\controller\App;
use app\common\model\ModelBs;

class NavigationLists extends ModelBs
{
    /**
     * 获取有效数据并以sort排序
     * @return bool|false|\PDOStatement|string|\think\Collection
     */
	public static function getValidDatas($navigationId)
    {
    	if (!empty($navigationId)) {
    		self::where('navigation_id', $navigationId);
		}
        $result = self::where('status',1)
            ->order('sort','dsc')
            ->field('id,navigation_name,logo_img,target_type,target_id,target_url,target_type_name,sort')
            ->select();
        if ($result)
        {
            return $result;
        }else{
            return false;
        }
    }
    public function getNavition($id)
    {
        $resutl = self::get($id);
        return $resutl;
    }
}