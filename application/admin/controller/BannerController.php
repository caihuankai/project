<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/8/9
 * Time: 10:43
 */

namespace app\admin\controller;


class BannerController extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status,
        \app\admin\traits\ImgReset;
    public function index()
    {
        $model = new \app\admin\model\Banner();
        $header = [
            ['checkbox' => true, 'value' =>1],
            ['field' =>'id', 'title' => 'ID',],
            ['field' => 'image', 'title' => '缩略图',],
            ['field' => 'name', 'title' => '名称',],
            ['field' => 'status', 'title' => '状态',],
            ['field' => 'create_time', 'title' => '创建时间',],
            ['field' => 'action_name', 'title' => '操作人',],
            ['field' => 'action', 'title' => '操作',],
        ];

        $this->setTableHeader($header)
            ->setToolbarId('table-button-html')
            ->setTableSearchId('table-search-html');;

        return $this->traitAdminTableList(function () {
            //当有搜索数据时执行
            $model = new \app\admin\model\Banner();
            $field = '*';

            //生成数据表
            $data = $this->traitAdminTableQuery([], function () use ($model) {
                return $model;
            }, $field, 'create_time desc');

            $result = [];
            foreach ($data['rows'] as $k => $datum) {
                $status = $datum['status'] == 1 ? 2 : 1;
                $title = $datum['status'] == 1 ? '禁用' : '启用';
                //生成操作按钮
                $action = self::showOperate([
                    '编辑' =>  [
                        'id' => $datum['id'],
                        'src' => "javascript:_edit('{$datum['id']}');"
                    ],
                    '移除' =>  [
                        'id' => $datum['id'],
                        'src' => "javascript:_delect('{$datum['id']}');"
                    ],
                    "{$title}" =>  [
                        'id' => $datum['id'],
                        'src' => "javascript:_changeStatus({$datum['id']},{$status});"
                    ],
                ]);
                $img = $model::makeImg($datum['image']);
                //模板数据返回
                $result[] = [
                    'id' => $datum['id'],
                    'image' => $img,
                    'name' => $datum['name'],
                    'status' =>$model->getDataStatus('status',$datum['status']),
                    'create_time' => $datum['create_time'],
                    'action_name' => $datum['action_name'],
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

    //格式化数据
    private function trimdata($key)
    {
        return trim(request()->param($key,''));
    }

    /**
     * 添加banner
     * @return mixed|\think\response\Json
     */
    public function add()
    {
        $model = new \app\admin\model\Banner();
        if (request()->isGet()){
            $ids = request()->param('id',null);
            if (!empty($ids)) {
                $info = $model::get($ids);
                $this->assign('id',$info['id']);
                $this->assign('info',$info);
            }
        }
        if (request()->isPost())
        {
            $file = $this->trimdata('image');
            $name = $this->trimdata('name');
            $id = $this->trimdata('id');
            //数据校验
            if (empty($name)) return $this->errSysJson(['code'=>400,'msg'=>"请检查是否输入banner名称！"]);
            if (empty($id) and empty($file) ) return $this->errSysJson(['code'=>400,'msg'=>"请上传图片文件！"]);
            //保存的数据
            $savedata = [
                'name'=>$name,
                'status' =>$this->trimdata('status'),
                'create_time'=>date('Y-m-d H:i:s'),
                'action_name'=>$_SESSION['adminSess']['admin']['username'],
            ];
            //处理有图片的情况
            if (!empty($file)){
                $AdsC = new Ads();
                $imgs = $AdsC->uploadImg($file);
                $imgs = json_decode($imgs,true);
                $pathimg = "http://oqt46pvmm.bkt.clouddn.com/".$imgs['key'];
                $savedata['image'] = $pathimg;
            }
            //根据提交类型判断是更新还是创建
            if (empty($id)){
                $result = $model->save($savedata);
            }else{
                $result = $model->save($savedata,['id'=>$id]);
            }
            //返回提示
            if ($result){
                $request = [
                    'code'=>200,
                    'msg'=> 'success'
                ];
            }else{
                $request = [
                    'error'=>400,
                    'msg'=> 'error'
                ];
            }
            return $this->sucSysJson($request);

        }
        return $this->fetch();
    }//end

    /**
     * 删除
     * @return \think\response\Json
     */
    public function delect()
    {
        $id = $this->trimdata('id');
        if (empty($id)) return $this->errSysJson(['code'=>400,'msg'=>'数据异常！']);
        $model = new \app\admin\model\Banner();
        $result = $model::destroy($id);
        if ($result){
            return $this->sucSysJson('','DELETE SUCCESS');
        }else{
            return $this->errSysJson('DELETE ERROR');
        }
    }
    /**
     * 删除
     * @return \think\response\Json
     */
    public function changeStatus()
    {
        $id = $this->trimdata('id');
        $status = $this->trimdata('status');
        if (empty($id)) return $this->errSysJson(['code'=>400,'msg'=>'数据异常！']);
        $model = new \app\admin\model\Banner();
        $result = $model->save(['status'=>$status],['id'=>$id]);
        if ($result){
            return $this->sucSysJson('','STATUS SUCCESS');
        }else{
            return $this->errSysJson('STATUS ERROR');
        }
    }

}