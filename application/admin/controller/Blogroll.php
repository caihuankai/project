<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/4/18
 * Time: 9:15
 */

namespace app\admin\controller;


class Blogroll extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status,
        \app\admin\traits\ImgReset;

    /**
     * 主页
     * @return mixed
     */
    public function index()
    {
        $header = [
            ['field' =>'id', 'title' => 'ID',],
            ['field' => 'media_name', 'title' => '名称',],
            ['field' => 'path_url', 'title' => 'URL',],
            ['field' => 'action', 'title' => '操作',],
        ];
        $this->setTableHeader($header)
            ->setToolbarId('table-button-html')
            ->setTableSearchId('table-search-html');;

        return $this->traitAdminTableList(function () {
            //当有搜索数据时执行
            $model = new \app\admin\model\MediaPartners();
            $field = '*';
            //生成数据表
            $data = $this->traitAdminTableQuery([],function () use ($model) {
                $model->where('type',2);
                return $model;
            }, $field, 'create_time desc');

            $result = [];
            foreach ($data['rows'] as $k => $datum) {
                //生成操作按钮
                $action = self::showOperate([
                    '编辑' =>  [
                        'id' => $datum['id'],
                        'src' => "javascript:_edit('{$datum['id']}');"
                    ],
                    '删除' =>  [
                        'id' => $datum['id'],
                        'src' => "javascript:_delect('{$datum['id']}');"
                    ],
                ]);
                //模板数据返回
                $result[] = [
                    'id' => $datum['id'],
                    'media_name' => $datum['media_name'],
                    'path_url' => $datum['path_url'],
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
        $model = new \app\admin\model\MediaPartners();

        if (request()->isPost()){
            $mmedia_name = trim(request()->param('media_name',null));
            $img = trim(request()->param('path_url',null));
            if (empty($mmedia_name)||empty($img)) return $this->errSysJson(['code'=>400,'msg'=>'必填参数不能为空']);
            return $this->sucSysJson($model->disposeData(request()->param(),false,'新增',2));
        }
        return $this->fetch();
    }

    /**
     * 编辑
     * @return mixed|\think\response\Json
     * @throws \think\Exception\DbException
     */
    public function edit()
    {
        $model = new \app\admin\model\MediaPartners();
        $id = trim(request()->param('id',null));
        if (request()->isGet()){
            $info = $model::get($id);
            if (empty($info)) return $this->errSysJson(['code'=>400,'msg'=>'用户异常！']);
            $this->assign('info',$info);
        }
        if (request()->isPost()){
            $mmedia_name = trim(request()->param('media_name',null));
            if (empty($mmedia_name) && empty($id) ) return $this->errSysJson(['code'=>400,'msg'=>'必填参数不能为空']);
            return $this->sucSysJson($model->disposeData(request()->param(),$id,'更新',2));
        }
        return $this->fetch();
    }
    /**
     * 删除
     * @return \think\response\Json
     */
    public function delect()
    {
        $id = trim(request()->param('id',null));
        if (empty($id)) return $this->errSysJson(['code'=>400,'msg'=>'数据异常！']);
        $model = new \app\admin\model\MediaPartners();
        $result = $model::destroy($id);
        if ($result){
            return $this->sucSysJson(['code'=>200,'msg'=>'删除成功']);
        }else{
            return $this->sucSysJson(['code'=>400,'msg'=>'删除失败']);
        }
    }

}