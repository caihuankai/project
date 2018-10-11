<?php
namespace app\wechat\controller;

use app\common\model\User;
use app\common\model\Gift as GiftModel;
/**
 * 礼物列表
 *
 * @package app\wechat\controller
 */
class Gift extends App
{
//    protected $noLoginAction = [
//        'lists'
//    ];

    /**
     * 礼物额礼拜
     *
     * @return \think\response\Json
     * @author wenfeng<admin@wen0.cn>
     */
    public function lists($user_id = '')
    {
        $user_model  = new User();

        if(!$user_id) $user_id = $this->getUserId();

        $userInfo = $user_model->where(['user_id' => $user_id])->column('account_balance, vip_level', 'user_id')[$user_id];

        $gif_mode = new GiftModel();
        
        $field = "id gift_id,img gift_img,name gift_name,money gift_money, type gift_type";
        
        $order = "sort asc";
        
        $map['status'] = 1;
        $map['position'] = 1;
        if($userInfo['vip_level'] >= 1){
            $type = [1];
        }else{
            $type = [1];
        }
        $map['type'] = ['in', $type];
        
        $datas = $gif_mode->field($field)->where($map)->order($order)->select();
        $result = [];
        foreach ($datas as $k => $data)
        {
            $result[$k] = $data;
            $result[$k]['gift_money'] = floatval($data['gift_money']);
        }
        $return['account_balance'] = $userInfo['account_balance'];
        $return['list'] = $result;

        return $this->successJson($return);
    }


    /**
     * 获取支付兑换礼物列表
     * @name  payLists
     * @param int $price  筛选礼物的价格
     * @$field int $user_id  额外查询字段
     * @return \think\response\Json
     * @author Lizhijian
     */
    public function payLists($price = 0, $field = ''){

        //获取礼物列表
        $gif_mode = new GiftModel();
        $order = "money ASC";
        $map['status'] = 1;
        $map['position'] = 1;
        $map['type'] = 2;
        $fields = 'id, img, name';
        if($price){
            $map['money'] = ['<=', $price];
            $map['money_max'] = ['>=', $price];
        }
        if($field){
            $fields .= ','. $field;
        }
        $data = $gif_mode->field($fields)->where($map)->order($order)->select();

        //返回数据
        return $this->successJson($data);
    }
    
    
}