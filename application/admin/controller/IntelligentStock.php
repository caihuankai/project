<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/3/29
 * Time: 16:26
 */

namespace app\admin\controller;


class IntelligentStock extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status,
        \app\admin\traits\ImgReset;
    public function index()
    {

        $this->setTableHeader([
            ['field' => 'id', 'title' => 'ID',],
            ['field' => 'stock_name', 'title' => '股票名',],
            ['field' => 'stock_num', 'title' => '股票编号',],
            ['field' => 'pricechangeratio', 'title' => '涨跌幅',],
            ['field' => 'type', 'title' => '类型',],
            ['field' => 'action_name', 'title' => '操作人',],
            ['field' => 'action', 'title' => '操作',],
        ])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');

        return $this->traitAdminTableList(function () {

            $model = new \app\admin\model\IntelligentStock();
            $field = '*';
            if(input('dateMin')){
                $this->tableWhere['shutup_start_time'] = [
                    '>=',input('dateMin')
                ];
            }
            if(input('dateMax')){
                $this->tableWhere['shutup_end_time'] = [
                    '<=',input('dateMax')
                ];
            }
            $data = $this->traitAdminTableQuery([
                [['user_id', ''], 'eq', 'user_id'],
                [['alias', ''], 'likeAll', 'alias']
            ], function () use ($model) {
                $model->select();
                return $model;
            }, $field, 'id desc');


            $result = [];
            $action=[];
            foreach ($data['rows'] as $datum) {
                $action['action'] = '<a href="javascript:_edit('.$datum['id'].');">编辑</a>';
                $result[] = [
                    'id' => $datum['id'],
                    'stock_name' => $datum['stock_name'],
                    'stock_num' => $datum['stock_num'],
                    'pricechangeratio' => $datum['pricechangeratio']."%",
                    'type' =>$datum['pricechangeratio'] > 0 ?"<span style='color: red;font-weight: bold'>上涨</span>":"<span style='color: #4BBD00;font-weight: bold;'>下跌</span>",
                    'action_name' => $datum['action_name'],
                    'action'=>$action['action'],
                ];
            }
            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        }, function () {
            $model = new \app\admin\model\IntelligentStock();
            $count = $model->count();
            $this->assign('count',$count);
        });
    }//end
    /**
     * 新增弹幕
     * @return mixed|\think\response\Json
     */
    public function add()
    {
        if (request()->isPost()){
            $model = new \app\admin\model\IntelligentStock();
            $check = $model::all();
            if (count($check) >= 4){
                return $this->errSysJson(['code'=>400,'msg'=>'智能选股最多只能添加四条哦！']);
            }
            $stock_name = trim(request()->param('stock_name',''));
            $stock_num = trim(request()->param('stock_num',''));
            $pricechangeratio = trim(request()->param('pricechangeratio',''));
            if (!empty($stock_name) && !empty($stock_num)&& !empty($pricechangeratio))
            {
                $check = $model->where('stock_num',$stock_num)->whereOr('stock_name',$stock_name)->find();
                if (count($check)>0){
                    return $this->errSysJson(['code'=>400,'msg'=>'股票名称或者股票编号重复！']);
                }else{
                    $data = [
                        'stock_name'=>$stock_name,
                        'stock_num'=>$stock_num,
                        'create_time'=>date('Y-m-d H:i'),
                        'pricechangeratio'=>$pricechangeratio,
                        'type'=>$pricechangeratio>0 ? 1:2,
                        'action_name'=>$_SESSION['adminSess']['admin']['username'],
                    ];
                    $result = $model->addData($data);
                    return $this->sucSysJson($result);
                }
            }else{
                return $this->errSysJson(['code'=>400,'msg'=>'请填上必填参数！']);
            }
        }
        return $this->fetch();
    }
    /**
     * 编辑栏目
     * @return mixed|\think\response\Json
     */
    public function edit()
    {
        $model = new \app\admin\model\IntelligentStock();
        if (request()->isGet()) {
            $id = trim(request()->param('id'));
            $data = $model->getID($id);
            if (empty($data)) return $this->errSysJson(['code'=>400,'msg'=>'查找不到此数据']);
            $this->assign('info', $data);
        } elseif (request()->isPost()) {
            $id = trim(request()->param('id'));
            $stock_name = trim(request()->param('stock_name',''));
            $stock_num = trim(request()->param('stock_num',''));
            $pricechangeratio = request()->param('pricechangeratio','');

            if (!empty($stock_name) && !empty($stock_num)&& !empty($pricechangeratio)&& !empty($id))
            {
                $model = new \app\admin\model\IntelligentStock();
                $check = $model->where('id',"<>",$id)
                    ->where('stock_num',$stock_num)
                    ->find();
                $check2 = $model->where('id',"<>",$id)
                    ->where('stock_name',$stock_name)
                    ->find();
                if (count($check)>0 ||count($check2)){
                    return $this->errSysJson(['code'=>400,'msg'=>'股票名称或者股票编号重复！']);
                }else {
                    $data = [
                        'stock_name' => $stock_name,
                        'stock_num' => $stock_num,
                        'create_time' => date('Y-m-d H:i'),
                        'pricechangeratio' => $pricechangeratio,
                        'type' => $pricechangeratio > 0 ? 1 : 2,
                        'action_name' => $_SESSION['adminSess']['admin']['username'],
                    ];
                    $result = $model->updateData($id, $data);
                    return $this->sucSysJson($result);
                }
            }else{
                return $this->errSysJson(['code'=>400,'msg'=>'请填上必填参数！']);
            }
        }
        return $this->fetch();
    }//end


}