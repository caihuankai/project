<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/4/17
 * Time: 9:05
 */

namespace app\admin\controller;


class ContentList extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status,
        \app\admin\traits\ImgReset;

    /**
     * 首页
     * @return mixed
     */
    public function index()
    {
        $model = new \app\admin\model\ContentList();
        $header = [
            ['field' => 'id', 'title' => 'ID',],
            ['field' => 'title', 'title' => '帮助标题',],
            ['field' => 'columns', 'title' => '所属列别',],
            ['field' => 'create_name', 'title' => '添加人',],
            ['field' => 'create_time', 'title' => '添加时间',],
            ['field' => 'update_name', 'title' => '最后修改人',],
            ['field' => 'update_time', 'title' => '最后修改时间',],
            ['field' => 'action', 'title' => '操作',],
        ];
        $search = [
            [['options' => ['placeholder' => '标题']], 'like', 'title'],
            [['options' => ['data' => $model->getDataArr('columns')], 'name' => 'table-search-columns'], 'select', ],
        ];

        //生成数据列表
        $this->setTableHeader($header)
            ->setSearch($search)
            ->setToolbarId('table-button-html')
            ->setTableSearchId('table-search-html');

        return $this->traitAdminTableList(function () {
            //当有搜索数据时执行
            $model = new \app\admin\model\ContentList();
            $field = '*';
            if(input('table-search-columns')){
                $this->tableWhere['columns'] = [
                    '=',input('table-search-columns')
                ];
            }
            //生成数据表
            $data = $this->traitAdminTableQuery([], function () use ($model) {
                $model->select();
                return $model;
            }, $field, 'create_time desc');

            $result = [];
            foreach ($data['rows'] as $datum) {
                //生成操作按钮
                $action = self::showOperate([
                    '编辑' => [
                        'id' => $datum['id'],
                        'src' => "javascript:_edit('{$datum['id']}');"
                    ],
                ]);
                //模板数据返回
                $result[] = [
                    'id' => $datum['id'],
                    'title' => $datum['title'],
                    'columns' => $model->getDataArr('columns',$datum['columns']),
                    'create_name' => $datum['create_name'],
                    'create_time' => $datum['create_time'],
                    'update_name' => $datum['update_name'],
                    'update_time' => $datum['update_time'],
                    'action' => $action,
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
     * 添加
     * @return mixed|\think\response\Json
     */
    public function add()
    {
        $model = new \app\admin\model\ContentList();

        if (request()->isPost()){
            $title = trim(request()->param('title',null));
            if (empty($title)) return $this->errSysJson(['code'=>400,'msg'=>'必填参数不能为空']);
            return $this->sucSysJson($model->editData(request()->param()));
        }
        $columns = $model->getDataArr('columns',null,false);
        $this->assign('columns',$columns);
        return $this->fetch();
    }

    /**
     * 编辑
     * @return mixed|\think\response\Json
     * @throws \think\Exception\DbException
     */
    public function edit()
    {
        $model = new \app\admin\model\ContentList();
        $id = trim(request()->param('id',null));
        if (request()->isGet()){
            $info = $model::get($id);
            if (empty($info)) return $this->errSysJson(['code'=>400,'msg'=>'用户异常！']);
            $this->assign('info',$info);
        }
        if (request()->isPost()){
            $title = trim(request()->param('position_name',null));
            if (empty($title) && empty($id) ) return $this->errSysJson(['code'=>400,'msg'=>'必填参数不能为空']);
            return $this->sucSysJson($model->editData(request()->param(),'更新',$id));
        }
        return $this->fetch();
    }


}