<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/7/10
 * Time: 14:53
 */

namespace app\admin\controller;


use app\admin\service\Redis;

class GeneralizeInfo extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status,
        \app\admin\traits\userNav,
        \app\admin\traits\BaseExcel;

    public function index()
    {
//        表头
        $this->setTableHeader([
            ['field' =>'ID', 'title' => 'ID',],
            ['field' =>'address_ip', 'title' => 'IP地址',],
            ['field' =>'create_time', 'title' => '创建时间',],
            ['field' =>'count', 'title' => 'ip出现次数',],
//            搜索
        ])->setSearch([
//            [['options' => ['placeholder' => 'ID']], 'eq', 'id'],
            ['', 'dateMin-date', 'create_time'],
            ['', 'dateMax-date', 'create_time '],
        ])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');

        $model = new \app\admin\model\GeneralizeInfo();

        return $this->traitAdminTableList(function () use ($model){
            $this->adminTablePage['pageSize']=10000;
            $field = 'id,address_ip,MAX(create_time) AS create_time,count(*) AS count';

            $data = $this->traitAdminTableQuery([], function ()use ($model){

                $model->group('address_ip')
                    ->having('count(*) >= 1');
                return $model;
            }, $field, 'create_time desc');
//            结果集展示
            $result = [];
            if (!empty($data['rows'])) {
                $userName = $_SESSION['adminSess']['admin']['username'];
                Redis::hashSet('address_ip_data',$userName.'address_ip_data',json_encode($data['rows']));
                foreach ($data['rows'] as $datum) {
                    $result[] = [
                        'ID'=>$datum['id'],
                        'address_ip'=>$datum['address_ip'],
                        'create_time'=>$datum['create_time'],
                        'count'=>$datum['count'],
                    ];
                }
            }
            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        }, function () use ($model){

        });
    }//end
    /**
     * 导出EXCEL
     */
    public function IPExcel()
    {
        $userName = $_SESSION['adminSess']['admin']['username'];
        $addressIpData = json_decode(Redis::hashGet('address_ip_data',$userName.'address_ip_data'),true);
        $excelName = '公共直播间推广信息表';
        $titleArray = array('ID','IP地址','最近访问时间','访问次数');
        $this->exportExcel($addressIpData,$excelName,$titleArray);
    }//end

}