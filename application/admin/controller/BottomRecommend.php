<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/3/30
 * Time: 10:40
 */

namespace app\admin\controller;


class BottomRecommend extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status,
        \app\admin\traits\ImgReset;
    public function index()
    {

        $this->setTableHeader([
            ['field' => 'xid', 'title' => 'ID',],
            ['field' => 'id', 'title' => '栏目ID',],
            ['field' => 'name', 'title' => '栏目名',],
            ['field' => 'sort', 'title' => '排序',],
            ['field' => 'recommend_status', 'title' => '状态',],
            ['field' => 'action', 'title' => '操作',],
            ['field' => 'action_name', 'title' => '操作人',],
        ])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');

        return $this->traitAdminTableList(function () {

            $model = new \app\admin\model\Column();
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
                $model->field('id,name,sort,recommend_status,action_name')
                    ->select();
                return $model;
            }, $field, 'id desc');


            $result = [];
            $action=[];
            foreach ($data['rows'] as $k=>$datum) {
                if($datum['recommend_status'] == 1)
                {
                    $state = 2;
                    $action['action'] = '<a href="javascript:_editstatus('.$datum['id'].",".$state.');" style="color: red">禁用</a>';
                }else{
                    $state = 1;
                    $action['action'] = '<a href="javascript:_editstatus('.$datum['id'].",".$state.');">启用</a>';
                }

                $result[] = [
                    'xid'=>$k + 1,
                    'id' => $datum['id'],
                    'name' => $datum['name'],
                    'sort' => $datum['sort'],
                    'recommend_status' => $datum['recommend_status']!=1?'禁用':'启用',
                    'action' => $action['action'],
                    'action_name' => $datum['action_name'],
                ];
            }
            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        }, function () {
        });
    }//end
    /**
     * 编辑当前状态
     * @return \think\response\Json
     */
    public function editStatus(){
        if (request()->isPost()) {
            $id = trim(request()->param('id'));
            $status = trim(request()->param('status'));
            if (empty($id)||empty($status)) return $this->errSysJson(['code'=>400,'msg'=>'缺少必要参数！']);
            $model = new \app\admin\model\Column();
            $data = [
                'recommend_status'=>$status,
                'action_name'=>$_SESSION['adminSess']['admin']['username'],
            ];
            $result = $model->save($data,['id'=>$id]);
            if ($result){
                return $this->sucSysJson(['code'=>200,'msg'=>'状态修改成功']);
            }else{
                return $this->sucSysJson(['code'=>400,'msg'=>'状态修改失败']);
            }
            return $this->sucSysJson($result);
        }else{
            return $this->errSysJson(['code'=>400,'msg'=>'提交方式错误']);
        }
    }
}