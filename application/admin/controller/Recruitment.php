<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/4/16
 * Time: 10:14
 */

namespace app\admin\controller;


class Recruitment extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status,
        \app\admin\traits\ImgReset;
    public function index()
    {
        $header = [
            ['field' => 'id', 'title' => 'ID',],
            ['field' => 'position_name', 'title' => '招聘职位',],
            ['field' => 'create_time', 'title' => '发布时间',],
            ['field' => 'action', 'title' => '操作',],
        ];

        //生成数据列表
        $this->setTableHeader($header)
            ->setToolbarId('table-button-html')
            ->setTableSearchId('table-search-html');

        return $this->traitAdminTableList(function () {
            //当有搜索数据时执行
            $model = new \app\admin\model\Recruitment();
            $field = 'id,position_name,create_time';
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
                    '删除' => [
                        'id' => $datum['id'],
                        'src' => "javascript:_delect('{$datum['id']}');"
                    ],
                ]);
                //模板数据返回
                $result[] = [
                    'id' => $datum['id'],
                    'position_name' => $datum['position_name'],
                    'create_time' => $datum['create_time'],
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
        $model = new \app\admin\model\Recruitment();
        if (request()->isPost()){
            $position_name = trim(request()->param('position_name',null));
            if (empty($position_name)) return $this->errSysJson(['code'=>400,'msg'=>'必填参数不能为空']);
            return $this->sucSysJson($model->editData(request()->param()));
        }
        $education = $model->getEducation(true);
        $this->assign('education',$education);
        return $this->fetch();
    }

    /**
     * 编辑
     * @return mixed|\think\response\Json
     * @throws \think\Exception\DbException
     */
    public function edit()
    {
        $model = new \app\admin\model\Recruitment();
        $id = trim(request()->param('id',null));
        if (request()->isGet()){
            $info = $model::get($id);
            if (empty($info)) return $this->errSysJson(['code'=>400,'msg'=>'用户异常！']);
            $this->assign('info',$info);
        }
        if (request()->isPost()){
            $position_name = trim(request()->param('position_name',null));
            if (empty($position_name) && empty($id) ) return $this->errSysJson(['code'=>400,'msg'=>'必填参数不能为空']);
            return $this->sucSysJson($model->editData(request()->param(),'更新',$id));
        }
        $education = $model->getEducation(true);
        $this->assign('education',$education);
        return $this->fetch();
    }

    /**
     * 删除
     * @return \think\response\Json
     */
    public function delect(){
        return $this->sucSysJson(\app\admin\model\Recruitment::del());
    }

}