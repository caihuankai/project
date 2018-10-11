<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/3/30
 * Time: 14:46
 */

namespace app\wechat\controller;


class IntelligentStock extends App
{
//    protected $noLoginAction =[
//        'getIntelligentStock'
//    ];
    /**
     * 获取智能选股列表
     * @return \think\response\Json
     */
    public function getIntelligentStock()
    {
        $model = new \app\admin\model\IntelligentStock();
        $result = $model
            ->field('id,stock_name,stock_num,pricechangeratio,type')
            ->limit(0,4)
            ->select();
        if ($result){
            $data = [];
            foreach ($result as $key=>$item){
                $data[$key] = $item;
                $data[$key]['pricechangeratio'] = number_format($item['pricechangeratio'],2);
            }
            return $this->sucSysJson($data);
        }else{
            return $this->errSysJson('暂无数据！');
        }
    }
}