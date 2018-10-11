<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/5/24
 * Time: 14:22
 */

namespace app\web\controller;


class Test
{

    /**
     * 获取查询特定表的所有数据
     * @param $model //闭包/变量
     * @param array $where //可以传入模型变量跟条件直接获取数据/闭包是无需传
     * @param string $order
     * @param string $field
     * @param null $page 页码
     * @param null $limit 显示条数
     * @return false|\PDOStatement|string|\think\Collection
     */
    public static function QueryDataAll($model,$where=[],$order="",$field="*",$page=null,$limit=null)
    {
        //是否limit开关
        $flg = empty($page) && empty($limit) ? false:true;
        /** @var \ThinkPHP\Query $modelFunc */
        $modelFunc = function ($model) use ($where){
            /** @var \ThinkPHP\Query|\Closure $model */
            $model = is_callable($model) ? $model() : $model;
            $where = is_callable($model) ? [] : $where;
            $model->where($where);
            return $model;
        };
        //执行查询
        if ($flg){
           $dataList = $modelFunc($model)
                ->field($field)
                ->order(...(array)$order)
                ->limit($page * $limit, $limit)
                ->select();
        }else{
            $dataList = $modelFunc($model)
                ->field($field)
                ->order($order)
                ->select();
        }
        //返回结果集
        return $dataList;
    }

    /**
     * 调用事例
     * @return \think\response\Json
     */
    public function getTest()
    {
        $userM = new \app\web\model\User();
        /**
         * 闭包的方式调用
         */
//        $data = self::QueryDataAll(function ()use($userM){
//            $userM ->where('user_id','>',170700);
//            return $userM;
//        },[],'user_id asc','user_id,alias',0,6);
        /**
         * 变量方式调用
         */
        $data = self::QueryDataAll($userM,
            ['alias'=>['like','%你%']],
            'user_id desc',
            '*');
        return json($data);
    }

}