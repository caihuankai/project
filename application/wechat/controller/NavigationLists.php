<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/3/30
 * Time: 12:04
 */

namespace app\wechat\controller;
use think\Validate;

class NavigationLists extends App
{
    /**
     * 获取有效的导航栏目
     * @return \think\response\Json
     */
	public function getNavigationLists($navigationId = 2)//默认为2：公众号首页导航栏
    {
        $model = new \app\wechat\model\NavigationLists();
        $data = $model::getValidDatas($navigationId);
        if ($data != false)
        {
            return $this->sucSysJson($data);
        }else{
            return $this->errSysJson('暂无数据!');
        }
    }//
    /**
     * 获取有效的导航栏目
     * @return \think\response\Json
     */
    public function getNavigationById()
    {
        $validate = new Validate([
            'id'  => 'require|number',
        ]);
        $data = request()->param();
        if (!$validate->batch()->check($data)) {
            $errtips =  $validate->getError();
            $errtips['errcode'] = 400;
            return $this->errSysJson($errtips);
        }else{
            $model = new \app\wechat\model\NavigationLists();
            $result = $model->getNavition($data['id']);
            if (count($result)>0)
            {
                return $this->sucSysJson($result);
            }else{
                return $this->errSysJson('暂无数据!');
            }
        }
    }//
}