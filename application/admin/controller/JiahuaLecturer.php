<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/8/24
 * Time: 14:06
 */

namespace app\admin\controller;


use think\Exception;

class JiahuaLecturer extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status,
        \app\admin\traits\ImgReset;
    public function index()
    {
        $header = [
            ['checkbox' => true, 'value' =>1],
            ['field' =>'user_id', 'title' => 'ID',],
            ['field' => 'alias', 'title' => '讲师昵称',],
            ['field' => 'live_status', 'title' => '状态',],
            ['field' => 'action', 'title' => '操作',],
        ];

        $this->setTableHeader($header)
            ->setToolbarId('table-button-html')
            ->setTableSearchId('table-search-html');

        return $this->traitAdminTableList(function () {
            //当有搜索数据时执行
            $model = new \app\admin\model\TeachJiahua();
            $field = '*';
            //生成数据表
            $data = $this->traitAdminTableQuery([], function () use ($model) {
                $model->where(['status'=>1]);
                return $model;
            }, $field, 'live_status desc,user_id desc');

            $result = [];
            foreach ($data['rows'] as $k => $datum) {
                $btn = $datum['live_status'] == 1 ? ['title'=>'取消','status'=>'0'] : ['title'=>'直播','status'=>1];
                //生成操作按钮
                $action = self::showOperate([
                   "{$btn['title']}" =>  [
                        'id' => $datum['user_id'],
                        'src' => "javascript:_changeStatus({$datum['user_id']},{$btn['status']});"
                    ],
                ]);
                //模板数据返回
                $result[] = [
                    'user_id' => $datum['user_id'],
                    'alias' => $datum['alias'],
                    'live_status' => $datum['live_status']==1?'直播中':'未直播',
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
     * 添加banner
     * @return mixed|\think\response\Json
     */
    public function add()
    {
        $model = new \app\admin\model\TeachJiahua();
        if (request()->isPost())
        {
            $image = $this->trimdata('image');
            $alias = $this->trimdata('alias');
            $gender = $this->trimdata('gender');
            $create_time = date('Y-m-d H:i:s');
            //数据校验
            if (empty($alias)||empty($gender)){
                return $this->errSysJson(['code'=>5400],'必要参数不能为空');
            }
            if (empty($image)) return $this->errSysJson(['code'=>5400],'请上传图片');
            //保存的数据
            $savedata = compact('alias','gender','create_time');
            //处理有图片的情况
            if (!empty($image)){
                $AdsC = new Ads();
                $imgs = $AdsC->uploadImg($image);
                $imgs = json_decode($imgs,true);
                $pathimg = "http://oqt46pvmm.bkt.clouddn.com/".$imgs['key'];
                $savedata['head_add'] = $pathimg;
            }
            //保存
            $result = $model->save($savedata);
            //返回提示
            if ($result){
                return $this->sucSysJson(['code'=>200],'success');
            }else{
                $this->errSysJson(['code'=>5400],'error');
            }
        }
        return $this->fetch();
    }//end

    /**
     * 编辑用户当前状态
     */
    public function changeStatus()
    {
        //验证
        if (request()->isPost()){
            $id = $this->trimdata('id');
            $status = $this->trimdata('status');
            if (empty($id)|| $status === null) return $this -> errSysJson('缺少必填参数！');
            //检查是否有已经在直播的讲师有则替换
            $model = new \app\admin\model\TeachJiahua();
            if ($status == 1){
                $checkStatus = $model->where(['status'=>1,'live_status'=>1])->field('user_id')->find();
            }else{
                $checkStatus = false;
            }
            $model->db()->startTrans();
            try{
                if (!$checkStatus){
                    $model->save(['live_status'=>$status],['user_id'=>$id]);
                    $msg = ['changeStatus'=>1,'msg'=>'设置成功'];//状态一 只修改提交的用户
                }else{
                    $changeData = [
                        ['user_id'=>$id,'live_status'=>$status],
                        ['user_id'=>$checkStatus['user_id'],'live_status'=>0]
                    ];
                    $model->isUpdate()->saveAll($changeData);
                    $msg = ['changeStatus'=>2,'msg'=>'设置成功'];//状态二 替换原来的直播用户
                }
                $model->db()->commit();
                return $this->sucSysJson($msg['changeStatus'],$msg['msg']);
            }catch (Exception $e){
                $model->db()->rollback();
            }

        }else{
            return $this->errSysJson('提交方式错误！');
        }
    }
    //格式化数据
    private function trimdata($key)
    {
        return trim(request()->param($key,null));
    }
}