<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/3/29
 * Time: 15:02
 */

namespace app\admin\controller;


class Barrage extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status,
        \app\admin\traits\ImgReset;
        public function index()
    {

        $this->setTableHeader([
            ['field' => 'id', 'title' => 'ID',],
            ['field' => 'content', 'title' => '内容',],
            ['field' => 'create_time', 'title' => '时间',],
            ['field' => 'status', 'title' => '状态',],
            ['field' => 'type', 'title' => '分类',],
            ['field' => 'action', 'title' => '操作',],
            ['field' => 'action_name', 'title' => '操作人',],
        ])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');

        return $this->traitAdminTableList(function () {

            $model = new \app\admin\model\Barrage();
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
                if($datum['status'] == 1)
                {
                    $state = 2;
                    $action['action'] .= ' | <a href="javascript:_editstatus('.$datum['id'].",".$state.');">禁用</a>';
                }else{
                    $state = 1;
                    $action['action'] .= ' | <a href="javascript:_editstatus('.$datum['id'].",".$state.');">启用</a>';
                }
                $action['action'] .= ' | <a href="javascript:_del('.$datum['id'].');">删除</a>';
                $result[] = [
                    'id' => $datum['id'],
                    'content' => $datum['content'],
                    'create_time' => date('Y-m-d H:i',strtotime($datum['create_time'])),
                    'status' => $datum['status'] ==1 ? '启用':'禁用',
                    'type' => $datum['type'] == 1 ? '实盘':'行业',
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
     * 新增弹幕
     * @return mixed|\think\response\Json
     */
    public function add()
    {
        if (request()->isPost()){
            $content = trim(request()->param('content',''));
            $status = trim(request()->param('status',''));
            $type = trim(request()->param('type',''));
            if (!empty($content) && !empty($status) && !empty($type))
            {
                $model = new \app\admin\model\Barrage();
                $data = [
                    'content'=>$content,
                    'status'=>$status,
                    'type'=>$type,
                    'create_time'=>date('Y-m-d H:i'),
                    'action_name'=>$_SESSION['adminSess']['admin']['username'],
                ];
                $result = $model->addData($data);
                return $this->sucSysJson($result);
            }else{
                return $this->errSysJson(['code'=>400,'msg'=>'请填写弹幕内容！']);
            }
        }
        $type = [
            ['type'=>1,'name'=>'实盘'],
            ['type'=>2,'name'=>'行业焦点'],
        ];
        $this->assign('type', $type);
        return $this->fetch();
    }
    /**
     * 编辑栏目
     * @return mixed|\think\response\Json
     */
    public function edit()
    {
        $model = new \app\admin\model\Barrage();
        if (request()->isGet()) {
            $id = trim(request()->param('id'));
            $data = $model->getID($id,'id,content,type');
            if (empty($data)) return $this->errSysJson(['code'=>400,'msg'=>'查找不到此数据']);
            $this->assign('info', $data);
        } elseif (request()->isPost()) {
            $content = trim(request()->param('content',''));
            $status = trim(request()->param('status',''));
            $type = trim(request()->param('type',''));
            $id = trim(request()->param('id',''));
            if (!empty($content) && !empty($status) && !empty($type))
            {
                $model = new \app\admin\model\Barrage();
                $data = [
                    'content'=>$content,
                    'status'=>$status,
                    'type'=>$type,
                    'action_name'=>$_SESSION['adminSess']['admin']['username'],
                ];
                $result = $model->updateData($id,$data);
                return $this->sucSysJson($result);
            }else{
                return $this->errSysJson(['code'=>400,'msg'=>'请填写弹幕内容！']);
            }
        }
        $type = [
            ['type'=>1,'name'=>'实盘'],
            ['type'=>2,'name'=>'行业焦点'],
        ];
        $this->assign('type', $type);
        return $this->fetch();
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
            $model = new \app\admin\model\Barrage();
            $data = [
                'status'=>$status,
            ];
            $result = $model->updateData($id,$data);
            return $this->sucSysJson($result);
        }else{
            return $this->errSysJson(['code'=>400,'msg'=>'提交方式错误']);
        }
    }
    /**
     * 删除单条数据
     * @return \think\response\Json
     */
    public function del(){
        if (request()->isPost()) {
            $id = trim(request()->param('id'));
            if (empty($id)) return $this->errSysJson('','缺少必要参数！');
            $model = new \app\admin\model\Barrage();

            $result = $model::destroy($id);
            return $this->sucSysJson($result,'删除成功！');
        }else{
            return $this->errSysJson(['code'=>400,'msg'=>'提交方式错误']);
        }
    }
}