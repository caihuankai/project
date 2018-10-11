<?php
namespace app\admin\controller;

use think\Request;
use think\Session;
use think\App as Application;


/**
 * 日志管理控制器
 * Class Log
 * @package app\admin\controller
 * @author zhengkejian
 * @time 20161021 18:49
 */
class Log extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable;
    
    /**
     * 日志列表
     *
     */
    public function index()
    {
        if(request()->isAjax()){

            $param = input('param.');

            $limit = $param['pageSize'];
            $offset = ($param['pageNumber'] - 1) * $limit;

            $where = [];
            $order = 'id desc';
            if (isset($param['manager']) && !empty($param['manager'])) {
                $where['manager'] = ['like', '%' . $param['manager'] . '%'];
            }
            if (isset($param['orderName']) && isset($param['order'])) {
                $order = $param['orderName']." ".$param['order'];
            }
            $selectResult = \app\admin\model\LogManage::getList($where,$order,$offset,$limit);

            foreach($selectResult as $key=>$vo){

                $selectResult[$key]['datetime'] = date('Y-m-d H:i:s',$vo['datetime']);

                $selectResult[$key]['operate'] = '<a href="javascript:group_del('.$vo['id'].');">删除</a>';

            }

            $return['rows'] = $selectResult;
            $return['total'] = \app\admin\model\LogManage::getTotal($where);

            return json($return);
        }
        //;$this->assign('list',$menuList);
        return $this->fetch();
    }

    /**
     * 删除日志
     * @hide
     * @return \think\response\Json
     */
    public function del()
    {
        $id = input('param.id');

        $objModel = new \app\admin\model\LogManage();
        $flag = $objModel->del($id);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }
    
    
    
    
    public function login()
    {
    
        $this->setTableHeader([
            ['field' =>'num', 'title' => '序号',],
            ['field' =>'ID', 'title' => 'ID',],
            ['field' =>'username', 'title' => '用户名',],
            ['field' => 'group', 'title' => '角色',],
            ['field' => 'datetime', 'title' => '登录时间',],
            ['field' => 'ip', 'title' => 'IP',],
            ['field' => 'result', 'title' => '结果'],
        ])->setTableSearchId('table-search-html');
    
    
        /** @var \app\admin\model\LogManage $model */
        $model = $this->LogManage;
    
        return $this->traitAdminTableList(function ()use($model){
        
            $field = 'lm.id, lm.type, lm.admin_id, lm.datetime, lm.status, lm.ip, a.username';
        
            $data = $this->traitAdminTableQuery([
                [['username', ''], 'like', 'a.username'],
                [['dateMin', ''], 'dateMin-date', 'lm.datetime'],
                [['dateMax', ''], 'dateMax-date', 'lm.datetime'],
                [['status/i', 0], 'eq', 'lm.status', function ($arr){
                    if (isset($arr[1]) && $arr[1] == -1) { // -1为全部类型
                        return false;
                    }
                
                    return $arr;
                }],
            ], function ()use ($model){
                return $model->where(['lm.type' => 1])->alias('lm')->join('admin a', 'a.id = lm.admin_id', 'left');
            }, $field, 'lm.id desc');
        
        
            $result = $adminIds = [];
            if (!empty($data['rows'])) {
    
                foreach ($data['rows'] as $row) {
                    if (!empty($row['admin_id'])) {
                        $adminIds[] = $row['admin_id'];
                    }
                }
    
                $adminGroupData = (new \app\admin\model\Admin())->getAdminGroupName($adminIds);
            
                $i = 1;
                foreach ($data['rows'] as $datum) {
                    $result[] = [
                        'num'      => $i,
                        'ID'       => $datum['id'],
                        'username' => !empty($datum['username']) ? $datum['username'] : '',
                        'group'    => getDataByKey($adminGroupData, $datum['admin_id'], ''),
                        'datetime' => date('Y-m-d H:i:s', $datum['datetime']),
                        'ip'       => long2ip($datum['ip']),
                        'result'   => $model->getStatusTextArr($datum['status']),
                    ];
        
                    ++$i;
                }
            }
        
            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        }, function () use ($model){
            $this->assign('searchStatus', [-1 => '结果'] + $model->getStatusTextArr(null));
        });
    }
    
    
}
