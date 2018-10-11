<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/4/10
 * Time: 16:36
 */

namespace app\admin\controller;


use app\admin\model\QiniuGallerys;

class Expression extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status,
        \app\admin\traits\ImgReset;
    public function index()
    {
        $model = new \app\admin\model\Expression();
        $header = [
            ['checkbox' => true, 'value' =>1],
            ['field' => 'num', 'title' => '序号',],
            ['field' =>'id', 'title' => 'ID',],
            ['field' => 'img', 'title' => '缩略图',],
            ['field' => 'name', 'title' => '表情名称',],
            ['field' => 'expression_number', 'title' => '表情编码',],
            ['field' => 'type', 'title' => '类型',],
            ['field' => 'sort', 'title' => '排序',],
            ['field' => 'status', 'title' => '状态',],
            ['field' => 'create_time', 'title' => '创建时间',],
            ['field' => 'action_name', 'title' => '操作人',],
            ['field' => 'action', 'title' => '操作',],
        ];
        $search = [
            [['options' => ['placeholder' => '表情名称']], 'like', 'e.name'],
            [['options' => ['data' => $model->getDataArr('type')], 'name' => 'table-search-type'], 'select', ],
            [['options' => ['data' => $model->getDataArr('status')], 'name' => 'table-search-status'], 'select', ],
            [['options' => ['placeholder' => '开始时间']], 'dateMin-date', 'e.create_time '],
            [['options' => ['placeholder' => '结束时间']], 'dateMax-date', 'e.create_time'],
        ];

        $this->setTableHeader($header)
            ->setSearch($search)
            ->setToolbarId('table-button-html')
            ->setTableSearchId('table-search-html');;

        return $this->traitAdminTableList(function () {
            //当有搜索数据时执行
            $model = new \app\admin\model\Expression();
            $field = 'e.id,e.expression_number,e.name,e.type,e.sort,e.status,e.create_time,e.action_name,e.pic_id,qi.qiniuImg';
            if(input('table-search-type')){
                $this->tableWhere['e.type'] = [
                    '=',input('table-search-type')
                ];
            }
            if(input('table-search-status')){
                $this->tableWhere['e.status'] = [
                    '=',input('table-search-status')
                ];
            }
            //生成数据表
            $data = $this->traitAdminTableQuery([], function () use ($model) {
                $model->where(['e.status'=>['in', [1,2]],'type'=>1])
                    ->alias('e')
                    ->join('qiniu_gallerys qi','e.pic_id = qi.id')
                    ->where('qi.positionType',9);
                return $model;
            }, $field, 'e.sort asc');

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
                $img = $model::makeImg($datum['qiniuImg']);
                //模板数据返回
                $result[] = [
                    'num'=> $k+1,
                    'id' => $datum['id'],
                    'img' => $img,
                    'name' => $datum['name'],
                    'expression_number' => $datum['expression_number'],
                    'type' =>$model->getDataStatus('type',$datum['type']),
                    'sort' => $datum['sort'],
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

    /**
     * 添加表情
     * @return mixed|\think\response\Json
     */
    public function add()
    {
        if (request()->isPost())
        {
            $model = new \app\admin\model\Expression();
            $file = $this->trimdata('image');
            $name = $this->trimdata('name');
            $checkname = $model->where(['name'=>$name,'type'=>1,'status'=>['in',[1,2]]])->find();
            if (count($checkname)>0) return $this->errSysJson(['code'=>400,'msg'=>"该表情名已存在！"]);
            if (empty($file) || empty($name)) return $this->errSysJson(['code'=>400,'msg'=>"请检查是否输入表情名称或未选择图片！"]);
            //匹配出图片的格式
            if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $file, $result)){
                $type = $result[2];
                if (strtolower($type) != 'png' && strtolower($type) != "gif") return $this->errSysJson(['code'=>400,'msg'=>"图片格式错误！"]);
                $AdsC = new Ads();
                $imgs = $AdsC->uploadImg($file);
                $imgs = json_decode($imgs,true);
                $pathimg = "http://oqt46pvmm.bkt.clouddn.com/".$imgs['key'];
                $qiniudata = [
                    'qiniuKey'=>$imgs['key'],
                    'positionType'=>9,
                    'qiniuImg'=>$pathimg,
                    'imgUrlDisplay'=>$pathimg,
                    'create_time'=>date('Y-m-d H:i:s'),
                ];
                $id = $model ->savePic($imgs['key'],$qiniudata);
                if (is_array($id))return $this->sucSysJson($id);
                $basename = base64_encode($name);
                $savedata = [
                    'name'=>$name,
                    'pic_id'=>$id,
                    'status' =>$this->trimdata('status'),
                    'type'=>$this->trimdata('type'),
                    'sort'=>$this->trimdata('sort'),
                    'expression_number'=>"[-".$basename."-]",
                    'create_time'=>date('Y-m-d H:i:s'),
                    'action_name'=>$_SESSION['adminSess']['admin']['username'],
                ];
                return $this->sucSysJson($model->saveData($savedata));
            }
        }
        $type = [
            ['type'=>1,'name'=>'平台通用表情'],
        ];
        $this->assign('type',$type);
        return $this->fetch();
    }//end
    /**
     * 编辑表情信息
     * @return mixed|\think\response\Json
     */
    public function edit()
    {
        $model = new \app\admin\model\Expression();
        if (request()->isGet())
        {
            $id = $this->trimdata('id');
            $field = 'e.id,e.expression_number,e.name,e.type,e.sort,e.status,e.create_time,e.action_name,e.pic_id,qi.qiniuImg';
            $info = $model->getExpressionData($field,3,$id);
            if (empty($info)||count($info)<0) return $this->errSysJson(['code'=>400,'msg'=>'暂无数据！']);
            $this->assign('info',$info);
        }
        if (request()->isPost())
        {

            $file = $this->trimdata('image');
            $name = $this->trimdata('name');
            $uid = $this->trimdata('id');
            $checkname = $model->where(['name'=>$name,'type'=>1,'status'=>['in',[1,2]]])->where('id','<>',$uid)->find();
            if (count($checkname)>0) return $this->errSysJson(['code'=>400,'msg'=>"该表情名已存在！"]);
            if (empty($name)) return $this->errSysJson(['code'=>400,'msg'=>"确实必要参数"]);
            if (!empty($file)){
                //匹配出图片的格式
                if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $file, $result)){
                    $type = $result[2];
                    if (strtolower($type) != 'png' && strtolower($type) != "gif") return $this->errSysJson(['code'=>400,'msg'=>"图片格式错误！"]);
                    $AdsC = new Ads();
                    $imgs = $AdsC->uploadImg($file);
                    $imgs = json_decode($imgs,true);
                    $pathimg = "http://oqt46pvmm.bkt.clouddn.com/".$imgs['key'];
                    $qiniudata = [
                        'qiniuKey'=>$imgs['key'],
                        'positionType'=>9,
                        'qiniuImg'=>$pathimg,
                        'imgUrlDisplay'=>$pathimg,
                        'create_time'=>date('Y-m-d H:i:s'),
                    ];
                    $id = $model ->savePic($imgs['key'],$qiniudata);
                    if (is_array($id))return $this->sucSysJson($id);
                    $savedata = [
                        'name'=>$name,
                        'pic_id'=>$id,
                        'status' =>$this->trimdata('status'),
                        'type'=>$this->trimdata('type'),
                        'sort'=>$this->trimdata('sort'),
                        'action_name'=>$_SESSION['adminSess']['admin']['username'],
                    ];
                    return $this->sucSysJson($model->updateEx($savedata,$uid));
                }
            }else{
                $savedata = [
                    'name'=>$name,
                    'status' =>$this->trimdata('status'),
                    'type'=>$this->trimdata('type'),
                    'sort'=>$this->trimdata('sort'),
                    'action_name'=>$_SESSION['adminSess']['admin']['username'],
                ];
                return $this->sucSysJson($model->updateEx($savedata,$uid));
            }

        }
        $type = [
            ['type'=>1,'name'=>'平台通用表情'],
        ];
        $this->assign('type',$type);
        return $this->fetch();
    }

    /**
     * 删除
     * @return \think\response\Json
     */
    public function delect()
    {
        $id = $this->trimdata('id');
        if (empty($id)) return $this->errSysJson(['code'=>400,'msg'=>'数据异常！']);
        $model = new \app\admin\model\Expression();
        $data=[
            'status'=>3,
        ];
        return $this->sucSysJson($model->updateEx($data,$id,'删除'));
    }
    //格式化数据
    private function trimdata($key)
    {
        return trim(request()->param($key,''));
    }


}