<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/3/28
 * Time: 16:25
 */

namespace app\admin\controller;


class Navigationlists extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status,
        \app\admin\traits\ImgReset;
    
    public function index($navigationId = 2)//默认为2：公众号首页导航栏
    {

        $this->setTableHeader([
            ['field' => 'sortnum', 'title' => '序号',],
            ['field' => 'id', 'title' => 'ID',],
            ['field' => 'navigation_name', 'title' => '导航名',],
            ['field' => 'logo_img', 'title' => '图标',],
            ['field' => 'target_type', 'title' => '跳转类型',],
            ['field' => 'target_id', 'title' => '跳转目标ID',],
            ['field' => 'target_type_name', 'title' => '跳转类型名',],
            ['field' => 'status', 'title' => '状态',],
            ['field' => 'sort', 'title' => '排序',],
            ['field' => 'create_time', 'title' => '创建时间',],
            ['field' => 'action', 'title' => '操作',],
        ])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');

        return $this->traitAdminTableList(function () use($navigationId) {

            $model = new \app\admin\model\NavigationLists();
            $field = '*';
            if(input('dateMin')){
                $this->tableWhere['create_time'] = [
                    '>=',input('dateMin')
                ];
            }
            if(input('dateMax')){
                $this->tableWhere['create_time'] = [
                    '<=',input('dateMax')
                ];
            }
            //指定导航栏
            if ($navigationId > 0) {
            	$this->tableWhere['navigation_id'] = [
            			'=', $navigationId
            	];
            }
            $data = $this->traitAdminTableQuery([
                [['user_id', ''], 'eq', 'user_id'],
                [['alias', ''], 'likeAll', 'alias']
            ], function () use ($model) {
                $model->select();
                return $model;
            }, $field, 'sort asc');


            $result = [];
            $action=[];
            foreach ($data['rows'] as $k => $datum) {
                $action['action'] = '<a href="javascript:_edit('.$datum['id'].');">编辑</a>';
                if($datum['status'] ==1)
                {
                    $state = 2;
                    $action['action'] .= ' | <a href="javascript:_editstatus('.$datum['id'].",".$state.');">停用</a>';
                }else{
                    $state = 1;
                    $action['action'] .= ' | <a href="javascript:_editstatus('.$datum['id'].",".$state.');">启用</a>';
                }
                $img = $datum['logo_img'];
                $result[] = [
                    'sortnum'=> $k+1,
                    'id' => $datum['id'],
                    'navigation_name' => $datum['navigation_name'],
                    'logo_img' => "<img src='{$img}'style='width: 80px;height: 80px;'>",
                    'target_type' => $datum['target_type'],
                    'target_id' => $datum['target_id'] == 0 ? $datum['target_url'] : $datum['target_id'] ,
                    'target_type_name' => $datum['target_type_name'],
                    'status' => $datum['status']!=1?'禁用':'启用',
                    'sort' => $datum['sort'],
                    'create_time' => $datum['create_time'],
                    'action' => $action['action'],
                ];
            }
            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        }, function () use($navigationId) {
        	$this->assign('navigationId', $navigationId);
        });
    }//end
    /**
     * 新增导航
     * @return mixed|\think\response\Json
     */
    public function add($navigationId = 2)
    {
        if (request()->isPost()){
            $navigation_name = trim(request()->param('navigation_name',null));
            $target_type = trim(request()->param('target_type',null));
            $target_id = trim(request()->param('target_id',null));
            $img = trim(request()->param('img',null));
            if ($navigationId == 2 && empty($img)) {
            	return $this->errSysJson(['code'=>400,'msg'=>'未选择上传图片']);
            }
            if (!empty($navigation_name) && !empty($target_type) && !empty($target_id))
            {
                $model = new \app\admin\model\NavigationLists();
                $AdsC = new Ads();
                $imgs = $AdsC->uploadImg($img);
                $imgs = json_decode($imgs,true);
                $pathimg = "http://oqt46pvmm.bkt.clouddn.com/".$imgs['key'];
                if ($target_type == 9){
                    $target_url = $target_id;
                    $targetid = 0;
                }else{
                    $target_url = null;
                    $targetid = $target_id;
                }
                $data = [
                	'navigation_id'=>$navigationId,
                    'create_time'=>date('Y-m-d H:i'),
                    'navigation_name'=>$navigation_name,
                    'target_type'=>$target_type,
                    'target_id'=>$targetid,
                    'target_url' => $target_url,
                    'target_type_name'=>trim(request()->param('target_type_name')),
                    'sort'=>rtrim(request()->param('sort')),
                    'logo_img'=>$pathimg,
                ];
                $result = $model->addData($data);
                return $this->sucSysJson($result);
            }else{
                return $this->errSysJson(['code'=>400,'msg'=>'参数未填']);
            }
        }
        $model = new \app\admin\model\Column();
        $column = $model->where('status',1)->field('id,name')->order('sort','dsc')->select();
        $cloumns = [];
        foreach ($column as $item){
            $cloumns[] = ['type'=>1,'name'=>$item['name']];
        }
        $array = array(['type'=>1,'name'=>'-------------栏目-------------']);
        $arrcolumn = array_merge($array,$cloumns);
        $diy = [
            ['type'=>2,'name'=>'-------------直播间-------------'],
            ['type'=>2,'name'=>'公共直播间'],
            ['type'=>3,'name'=>'-------------课程-------------'],
            ['type'=>3,'name'=>'全部课程'],
            ['type'=>4,'name'=>'免费课程'],
            ['type'=>5,'name'=>'收费课程'],
            ['type'=>6,'name'=>'单次课程介绍页'],
            ['type'=>7,'name'=>'系列课程介绍页'],
            ['type'=>8,'name'=>'-------------讲师-------------'],
            ['type'=>8,'name'=>'讲师介绍页'],
            ['type'=>9,'name'=>'-------------其他-------------'],
            ['type'=>9,'name'=>'外部Url'],
        ];
        $type = array_merge($arrcolumn,$diy);
        $this->assign('type', $type);
        return $this->fetch();
    }
    /**
     * 编辑栏目
     * @return mixed|\think\response\Json
     */
    public function edit()
    {
        $model = new \app\admin\model\NavigationLists();
        if (request()->isGet()) {
            $id = trim(request()->param('id'));
            $data = $model->getID($id);
            if (empty($data)) return $this->errSysJson(['code'=>400,'msg'=>'查找不到此数据']);
            $this->assign('info', $data);
        } elseif (request()->isPost()) {
            $navigation_name = trim(request()->param('navigation_name', ''));
            $target_type = trim(request()->param('target_type',null));
            $target_id = trim(request()->param('target_id',null));
            $img = trim(request()->param('img', ''));
            $id = trim(request()->param('id', ''));
            if (!empty($navigation_name) && !empty($target_type) && !empty($id) && !empty($target_id)) {
                $model = new \app\admin\model\NavigationLists();
                if ($target_type == 9){
                    $target_url = $target_id;
                    $targetid = 0;
                }else{
                    $target_url = null;
                    $targetid = $target_id;
                }
                $data = [
                    'create_time'=>date('Y-m-d H:i'),
                    'navigation_name'=>$navigation_name,
                    'target_type'=>$target_type,
                    'target_id'=>$targetid,
                    'target_url'=>$target_url,
                    'target_type_name'=>trim(request()->param('target_type_name')),
                    'sort'=>rtrim(request()->param('sort')),
                ];
                if (!empty($img)){
                    $AdsC = new Ads();
                    $imgs = $AdsC->uploadImg($img);
                    $imgs = json_decode($imgs, true);
                    $pathimg = "http://oqt46pvmm.bkt.clouddn.com/" . $imgs['key'];
                    $data['logo_img'] = $pathimg;
                }
                $result = $model->updateData($id, $data);
                return $this->sucSysJson($result);
            }else{
                return $this->errSysJson(['code'=>400,'msg'=>'参数未填']);
            }
        }
        $model = new \app\admin\model\Column();
        $column = $model->where('status',1)->field('id,name')->order('sort','dsc')->select();
        $cloumns = [];
        foreach ($column as $item){
            $cloumns[] = ['type'=>1,'name'=>$item['name']];
        }
        $array = array(['type'=>1,'name'=>'-------------栏目-------------']);
        $arrcolumn = array_merge($array,$cloumns);
        $diy = [
            ['type'=>2,'name'=>'-------------直播间-------------'],
            ['type'=>2,'name'=>'公共直播间'],
            ['type'=>3,'name'=>'-------------课程-------------'],
            ['type'=>3,'name'=>'全部课程'],
            ['type'=>4,'name'=>'免费课程'],
            ['type'=>5,'name'=>'收费课程'],
            ['type'=>6,'name'=>'单次课程介绍页'],
            ['type'=>7,'name'=>'系列课程介绍页'],
            ['type'=>8,'name'=>'-------------讲师-------------'],
            ['type'=>8,'name'=>'讲师介绍页'],
            ['type'=>9,'name'=>'-------------其他-------------'],
            ['type'=>9,'name'=>'外部Url'],
        ];
        $type = array_merge($arrcolumn,$diy);
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
            $model = new \app\admin\model\NavigationLists();
            $data = [
                'status'=>$status,
            ];
            $result = $model->updateData($id,$data);
            return $this->sucSysJson($result);
        }else{
            return $this->errSysJson(['code'=>400,'msg'=>'提交方式错误']);
        }
    }

}