<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/3/30
 * Time: 8:36
 */

namespace app\admin\controller;


class CourseAdvertising extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status,
        \app\admin\traits\ImgReset;
    public function index()
    {

        $this->setTableHeader([
            ['field' => 'id', 'title' => 'ID',],
            ['field' => 'cover_img', 'title' => '封面',],
            ['field' => 'advertising_name', 'title' => '广告名称',],
            ['field' => 'target_type', 'title' => '跳转类型',],
            ['field' => 'type_id', 'title' => 'ID',],
            ['field' => 'type_cover_name', 'title' => '名称',],
            ['field' => 'status', 'title' => '状态',],
            ['field' => 'action', 'title' => '操作',],
            ['field' => 'action_name', 'title' => '操作人',],
        ])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');

        return $this->traitAdminTableList(function () {

            $model = new \app\admin\model\CourseAdvertising();
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
                if ($datum['target_type'] == 3)
                {
                    $Nmodel = new \app\admin\model\User();
                    $name = $Nmodel->where('user_id',$datum['type_id'])->field('user_id,alias')->find();
                    $course_name = $name['alias'];
                }else{
                    $Nmodel = new \app\admin\model\Course();
                    $name = $Nmodel->where('id',$datum['type_id'])->find();
                    $course_name = $name['class_name'];
                }
                $action['action'] = '<a href="javascript:_edit('.$datum['id'].');">编辑</a>';
                if($datum['status'] ==1)
                {
                    $state = 2;
                    $action['action'] .= ' | <a href="javascript:_editstatus('.$datum['id'].",".$state.');">禁用</a>';
                }else{
                    $state = 1;
                    $action['action'] .= ' | <a href="javascript:_editstatus('.$datum['id'].",".$state.');">启用</a>';
                }
                $action['action'] .= ' | <a href="javascript:_del('.$datum['id'].');">删除</a>';
                switch ($datum['target_type']){
                    case 1;
                        $datum['target_type'] = '单次课';
                    break;
                    case 2;
                        $datum['target_type'] = '系列课';
                    break;
                    case 3;
                        $datum['target_type'] = '讲师';
                    break;
                    default;
                        $datum['target_type'] = '未定义类型';
                }

                $img = $datum['cover_img'];
                $result[] = [
                    'id' => $datum['id'],
                    'cover_img' => "<img src='{$img}'style='width: 80px;height: 80px;'>",
                    'advertising_name' => $datum['advertising_name'],
                    'target_type' => $datum['target_type'],
                    'type_id' => $datum['type_id'],
                    'type_cover_name' =>$course_name,
                    'status' => $datum['status']!=1?'禁用':'启用',
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
     * 新增导航
     * @return mixed|\think\response\Json
     */
    public function add()
    {
        if (request()->isPost()){
            $advertising_name = trim(request()->param('advertising_name',''));
            $target_type = trim(request()->param('target_type',''));
            $img = trim(request()->param('img',''));
            $type_id = trim(request()->param('type_id',''));
            if (!empty($advertising_name) && !empty($target_type) && !empty($img)&& !empty($type_id))
            {
                $model = new \app\admin\model\CourseAdvertising();
                $AdsC = new Ads();
                $imgs = $AdsC->uploadImg($img);
                $imgs = json_decode($imgs,true);
                $pathimg = "http://oqt46pvmm.bkt.clouddn.com/".$imgs['key'];
                $data = [
                    'advertising_name'=>$advertising_name,
                    'target_type'=>$target_type,
                    'type_id'=>$type_id,
                    'status'=>trim(request()->param('status')),
                    'cover_img'=>$pathimg,
                    'action_name'=>$_SESSION['adminSess']['admin']['username'],
                ];
                $result = $model->addData($data);
                return $this->sucSysJson($result);
            }else{
                return $this->errSysJson(['code'=>400,'msg'=>'参数未填，或者未选择上传图片']);
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
        $model = new \app\admin\model\CourseAdvertising();
        if (request()->isGet()) {
            $id = trim(request()->param('id'));
            $data = $model->getID($id);
            if (empty($data)) return $this->errSysJson(['code'=>400,'msg'=>'查找不到此数据']);
            $this->assign('info', $data);
        } elseif (request()->isPost()) {
            $id = trim(request()->param('id',''));
            $advertising_name = trim(request()->param('advertising_name',''));
            $target_type = trim(request()->param('target_type',''));
            $img = trim(request()->param('img',''));
            $type_id = trim(request()->param('type_id',''));
            if (!empty($advertising_name) && !empty($target_type) && !empty($id) && !empty($type_id))
            {
                $data = [
                    'advertising_name'=>$advertising_name,
                    'target_type'=>$target_type,
                    'type_id'=>$type_id,
                    'status'=>trim(request()->param('status')),
                    'action_name'=>$_SESSION['adminSess']['admin']['username'],
                ];
                if (!empty($img)){
                    $AdsC = new Ads();
                    $imgs = $AdsC->uploadImg($img);
                    $imgs = json_decode($imgs,true);
                    $pathimg = "http://oqt46pvmm.bkt.clouddn.com/".$imgs['key'];
                    $data['cover_img'] = $pathimg;
                }
                $result = $model->updateData($id,$data);
                return $this->sucSysJson($result);
            }else{
                return $this->errSysJson(['code'=>400,'msg'=>'必要参数未填！']);
            }
        }
        $option = [
            ['type'=>1,'name'=>'单次课'],
            ['type'=>2,'name'=>'系列课'],
            ['type'=>3,'name'=>'讲师']
        ];
        $this->assign('option', $option);
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
            $model = new \app\admin\model\CourseAdvertising();
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
            $model = new \app\admin\model\CourseAdvertising();

            $result = $model::destroy($id);
            return $this->sucSysJson($result,'删除成功！');
        }else{
            return $this->errSysJson(['code'=>400,'msg'=>'提交方式错误']);
        }
    }
}