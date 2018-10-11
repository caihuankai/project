<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/7/16
 * Time: 17:05
 */

namespace app\admin\controller;

use app\admin\service\Redis;
class GeneralizeLiveInfo extends App
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
            ['field' =>'create_time', 'title' => '日期',],
            ['field' =>'count', 'title' => '总IP访问数（去重）',],
//            搜索
        ])->setSearch([
            ['', 'dateMin-date', 'create_time'],
            ['', 'dateMax-date', 'create_time '],
        ])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');

        $model = new \app\admin\model\LiveGeneralizeInfo();

        return $this->traitAdminTableList(function () use ($model){
            $field = "create_time,COUNT(create_time) as count";

            $data = $this->traitAdminTableQuery([], function ()use ($model){

                $model->group('create_time');
                return $model;
            }, $field, 'create_time DESC');
//            结果集展示
            $result = [];
            if (!empty($data['rows'])) {
                $userName = $_SESSION['adminSess']['admin']['username'];
                Redis::hashSet('H5_address_ip_data',$userName.'H5_address_ip_data',json_encode($data['rows']));
                foreach ($data['rows'] as $datum) {
                    $result[] = [
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
        $addressIpData = json_decode(Redis::hashGet('H5_address_ip_data',$userName.'H5_address_ip_data'),true);
        $excelName = 'H5推广数据表';
        $titleArray = array('IP地址','访问次数(去重)');
        $this->exportExcel($addressIpData,$excelName,$titleArray);
    }//end

}