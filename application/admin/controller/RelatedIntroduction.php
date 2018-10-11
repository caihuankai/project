<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/4/18
 * Time: 12:41
 */

namespace app\admin\controller;


class RelatedIntroduction extends App
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
            ['field' => 'title', 'title' => '标题',],
            ['field' => 'icon', 'title' => 'Icon缩略图',],
            ['field' => 'content', 'title' => '内容详情',],
            ['field' => 'qr_code', 'title' => '二维码',],
            ['field' => 'action', 'title' => '操作',],
        ];
        $this->setTableHeader($header)
            ->setToolbarId('table-button-html')
            ->setTableSearchId('table-search-html');

        return $this->traitAdminTableList(function (){
            //当有搜索数据时执行
            $model = new \app\admin\model\RelatedIntroduction();
            $field = '*';
            //生成数据表
            $data = $this->traitAdminTableQuery([], function () use ($model) {
                $model->where('type',1);
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
                ]);
                $icon = $datum['icon'];
                $qr_code = $datum['qr_code'];
                //模板数据返回
                $result[] = [
                    'id' => $datum['id'],
                    'title' => $datum['title'],
                    'icon' => "<img src='$icon' style='height: 80px;width: 80px;'>",
                    'content' => $datum['content'],
                    'qr_code' => "<img src='$qr_code' style='height: 80px;width: 80px;'>",
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
        $model = new \app\admin\model\RelatedIntroduction();
        if (request()->isPost()){
            $arr =[
                'title'=>trim(request()->param('title',null)),
                'icon'=>trim(request()->param('icon',null)),
                'qr_code'=>trim(request()->param('qr_code',null)),
                'editorValue'=>trim(request()->param('editorValue',null)),
            ];
            if (empty($arr['title'])||empty($arr['icon'])||empty($arr['qr_code'])||empty($arr['editorValue'])) return $this->errSysJson(['code'=>400,'msg'=>'必填参数不能为空']);
            return $this->sucSysJson($model->disposeData($arr,false,'新增'));
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
        $model = new \app\admin\model\RelatedIntroduction();
        $id = trim(request()->param('id',null));
        if (request()->isGet()){
            $info = $model::get($id);
            if (empty($info)) return $this->errSysJson(['code'=>400,'msg'=>'用户异常！']);
            $this->assign('info',$info);
        }
        if (request()->isPost()){
            $arr =[
                'title'=>trim(request()->param('title',null)),
                'content'=>trim(request()->param('editorValue',null)),
            ];
            if (empty($arr['title'])||empty($id)|| empty($arr['content']) ) return $this->errSysJson(['code'=>400,'msg'=>'必填参数不能为空']);
            return $this->sucSysJson($model->disposeData(request()->param(),$id,'更新'));
        }
        return $this->fetch();
    }//
}