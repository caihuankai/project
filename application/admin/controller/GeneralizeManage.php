<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/3/30
 * Time: 16:40
 */

namespace app\admin\controller;


class GeneralizeManage extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status,
        \app\admin\traits\ImgReset;
    public function index()
    {

        $this->setTableHeader([
            ['field' => 'sortnum', 'title' => '序号',],
            ['field' => 'id', 'title' => 'ID',],
            ['field' => 'ad_group_name', 'title' => '广告组合名称',],
            ['field' => 'ad_img1', 'title' => '广告1封面',],
            ['field' => 'ad_title1', 'title' => '广告1标题',],
            ['field' => 'ad_target_type_name1', 'title' => '广告1跳转类型',],
            ['field' => 'ad_img2', 'title' => '广告2封面',],
            ['field' => 'ad_title2', 'title' => '广告2标题',],
            ['field' => 'ad_target_type_name2', 'title' => '广告2跳转类型',],
            ['field' => 'affiliation_column', 'title' => '所属栏目',],
            ['field' => 'column_place', 'title' => '栏目位置',],
            ['field' => 'edit_time', 'title' => '编辑时间',],
            ['field' => 'status', 'title' => '状态',],
            ['field' => 'action', 'title' => '操作',],
            ['field' => 'action_name', 'title' => '操作人',],
        ])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');

        return $this->traitAdminTableList(function () {

            $model = new \app\admin\model\GeneralizeManage();
            $field = '*';
            if(input('dateMin')){
                $this->tableWhere['edit_time'] = [
                    '>=',input('dateMin')
                ];
            }
            if(input('dateMax')){
                $this->tableWhere['edit_time'] = [
                    '<=',input('dateMax')
                ];
            }
            $data = $this->traitAdminTableQuery([
                [['ad_group_name', ''], 'eq', 'ad_group_name'],
                [['affiliation_column_id', ''], 'eq', 'affiliation_column_id'],
                [['title', ''], 'eq', 'ad_title1'],
                [['status', ''], 'eq', 'status'],
                [['column_place', ''], 'eq', 'column_place'],
            ],$model, $field, 'id desc');
            $result = [];
            $action=[];
            foreach ($data['rows'] as $k =>$datum) {
                 $column = new \app\admin\model\Column();
                 $name = $column->where('id',$datum['affiliation_column'])->field('name')->find();
                 $datum['name'] = $name['name'];
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
                $img1 = $datum['ad_img1'];
                $img2 = $datum['ad_img2'];
                $result[] = [
                    'sortnum'=>$k+1,
                    'id' => $datum['id'],
                    'ad_group_name' => $datum['ad_group_name'],
                    'ad_img1' => "<img src='{$img1}'style='width: 80px;height: 80px;'>",
                    'ad_title1' => $datum['ad_title1'],
                    'ad_target_type_name1' => $datum['ad_target_type_name1'],
                    'ad_img2' => "<img src='{$img2}'style='width: 80px;height: 80px;'>",
                    'ad_title2' => $datum['ad_title2'],
                    'ad_target_type_name2' => $datum['ad_target_type_name2'],
                    'affiliation_column' => $datum['name'],
                    'column_place' => $datum['column_place'],
                    'edit_time' => $datum['edit_time'],
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
            $model = new \app\admin\model\Column();
            $column = $model->where('status',1)->field('id,name')->order('sort','asc')->select();
            $this->assign('column', $column);
        });
    }//end

    /**
     * 数据过滤空格
     * @param $data
     */
    private function trimdata($data)
    {
        $result = trim(request()->param($data,''));
        return $result;
    }
    /**
     * 新增导航
     * @return mixed|\think\response\Json
     */
    public function add()
    {
        if (request()->isPost()){
            $ad_img = $this->trimdata('ad_img1');
            $ad_img2 = $this->trimdata('ad_img2');
            $ad_target_type1 = $this->trimdata('ad_target_type1');
            $ad_target_type2 = $this->trimdata('ad_target_type2');
            $ad_target_id1 = $this->trimdata('ad_target_id1');
            $ad_target_id2 = $this->trimdata('ad_target_id2');
            $coutntype = $this->trimdata('typecount');
            $list = [];
            if (empty($ad_img) || empty($ad_img2))  return $this->errSysJson(['code'=>400,'msg'=>'未上传封面图']);
            if (empty($ad_target_id1)|| empty($ad_target_id2)) return $this->errSysJson(['code'=>400,'msg'=>'可不要忘记填跳转ID/链接']);
            $model = new \app\admin\model\GeneralizeManage();
            $AdsC = new Ads();
            $imgs = $AdsC->uploadImg($ad_img);
            $imgs = json_decode($imgs,true);
            $imgs2 = $AdsC->uploadImg($ad_img2);
            $imgs2 = json_decode($imgs2,true);
            $pathimg1 = "http://oqt46pvmm.bkt.clouddn.com/".$imgs['key'];
            $pathimg2 = "http://oqt46pvmm.bkt.clouddn.com/".$imgs2['key'];
            if ($ad_target_type1 == 9){
                $ad_targetid1 = 0;
                $ad_target_url1 = $ad_target_id1;
            }else{
                $ad_targetid1 = $ad_target_id1;
                $ad_target_url1 = null;
            }
            if ($ad_target_type2 == 9){
                $ad_targetid2 = 0;
                $ad_target_url2 = $ad_target_id2;
            }else{
                $ad_targetid2 = $ad_target_id2;
                $ad_target_url2= null;
            }
            $data = [
                'ad_group_name'=>$this->trimdata('ad_group_name'),
                'ad_title1'=>$this->trimdata('title1'),
                'ad_title2'=>$this->trimdata('title2'),
                'ad_img1'=>$pathimg1,
                'ad_img2'=>$pathimg2,
                'ad_target_type1'=>$ad_target_type1,
                'ad_target_type2'=>$ad_target_type2,
                'ad_target_type_name1'=>$this->trimdata('ad_target_type_name1'),
                'ad_target_type_name2'=>$this->trimdata('ad_target_type_name2'),
                'ad_target_id1'=>$ad_targetid1,
                'ad_target_id2'=>$ad_targetid2,
                'ad_target_url1'=>$ad_target_url1,
                'ad_target_url2'=>$ad_target_url2,
                'edit_time'=>date("Y-m-d H:i:s"),
                'status'=>$this->trimdata('status'),
                'action_name'=>$_SESSION['adminSess']['admin']['username'],
            ];
            if($coutntype>1){
                for ($i=0;$i<$coutntype;$i++){
                    if ($i == 0)
                    {
                        $list[$i] = $data;
                        $list[$i]['affiliation_column'] = $this->trimdata('affiliation_column');
                        $list[$i]['column_place'] = $this->trimdata('column_place');
                    }
                    else{
                        $s = $i+1;
                        $list[$i] = $data;
                        $list[$i]['affiliation_column'] = $this->trimdata('affiliation_column'.$s);
                        $list[$i]['column_place'] = $this->trimdata('column_place'.$s);
                    }
                }
                foreach ($list as $k => $item)
                {
                    $where = [
                        'affiliation_column'=>$item['affiliation_column'],
                        'column_place'=>$item['column_place'],
                    ];
                    $result = $model->where($where)->field('id')->find();
                    if ($result){
                        $key = $k+1;
                        return $this->errSysJson(['code'=>400,'msg'=>"您的第{$key}条数据与ID为{$result['id']}的广告位置冲突！"]);
                    }
                }
                $res = $model->saveAll($list);
                if ($res){
                    return $this->sucSysJson(['code'=>200,'msg'=>'新增成功']);
                }else{
                    return $this ->errSysJson(['code'=>400,'msg'=>'新增失败']);
                }
            }else{
                $list = $data;
                $list['affiliation_column'] = $this->trimdata('affiliation_column');
                $list['column_place'] = $this->trimdata('column_place');
                $where = [
                    'affiliation_column'=>$list['affiliation_column'],
                    'column_place'=>$list['column_place'],
                ];
                $result = $model->where($where)->field('id')->find();
                if ($result){
                    return $this->errSysJson(['code'=>400,'msg'=>"您的广告组与ID为{$result['id']}的广告位置冲突！"]);
                }
                $res = $model->save($list);
                if ($res){
                    return $this->sucSysJson(['code'=>200,'msg'=>'新增成功']);
                }else{
                    return $this ->errSysJson(['code'=>400,'msg'=>'新增失败']);
                }
            }

        }else{
            $model = new \app\admin\model\Column();
            $column = $model->where('status',1)->field('id,name')->order('sort','asc')->select();
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
            $this->assign('column', $column);
            $this->assign('type', $type);
            return $this->fetch();
        }
    }
    /**
     * 编辑栏目
     * @return mixed|\think\response\Json
     */
    public function edit()
    {
        $model = new \app\admin\model\GeneralizeManage();
        if (request()->isGet()) {
            $id = trim(request()->param('id'));
            $data = $model->getID($id);
            if (empty($data)) return $this->errSysJson(['code'=>400,'msg'=>'查找不到此数据']);
            $this->assign('info', $data);
        } elseif (request()->isPost()) {
            $id =$this->trimdata('id');
            $ad_img = $this->trimdata('ad_img1');
            $ad_img2 = $this->trimdata('ad_img2');
            $ad_target_type1 = $this->trimdata('ad_target_type1');
            $ad_target_type2 = $this->trimdata('ad_target_type2');
            $ad_target_id1 = $this->trimdata('ad_target_id1');
            $ad_target_id2 = $this->trimdata('ad_target_id2');
            if (empty($ad_target_id1)|| empty($ad_target_id2)) return $this->errSysJson(['code'=>400,'msg'=>'可不要忘记填跳转ID/链接']);
            if (empty($id)) return $this->errSysJson(['code'=>400,'msg'=>'ID不能为空']);
            if ($ad_target_type1 == 9){
                $ad_targetid1 = 0;
                $ad_target_url1 = $ad_target_id1;
            }else{
                $ad_targetid1 = $ad_target_id1;
                $ad_target_url1 = null;
            }
            if ($ad_target_type2 == 9){
                $ad_targetid2 = 0;
                $ad_target_url2 = $ad_target_id2;
            }else{
                $ad_targetid2 = $ad_target_id2;
                $ad_target_url2= null;
            }
            $data = [
                'ad_group_name'=>$this->trimdata('ad_group_name'),
                'ad_title1'=>$this->trimdata('title1'),
                'ad_title2'=>$this->trimdata('title2'),
                'ad_target_type1'=>$ad_target_type1,
                'ad_target_type2'=>$ad_target_type2,
                'ad_target_type_name1'=>$this->trimdata('ad_target_type_name1'),
                'ad_target_type_name2'=>$this->trimdata('ad_target_type_name2'),
                'ad_target_id1'=>$ad_targetid1,
                'ad_target_id2'=>$ad_targetid2,
                'ad_target_url1'=>$ad_target_url1,
                'ad_target_url2'=>$ad_target_url2,
                'edit_time'=>date("Y-m-d H:i:s"),
                'status'=>$this->trimdata('status'),
                'action_name'=>$_SESSION['adminSess']['admin']['username'],
                'affiliation_column'=>$this->trimdata('affiliation_column'),
                'column_place'=>$this->trimdata('column_place')
            ];

            if (!empty($ad_img)){
                $AdsC = new Ads();
                $imgs = $AdsC->uploadImg($ad_img);
                $imgs = json_decode($imgs,true);
                $pathimg1 = "http://oqt46pvmm.bkt.clouddn.com/".$imgs['key'];
                $data['ad_img1'] = $pathimg1;
            }
            if (!empty($ad_img2)){
                $AdsC = new Ads();
                $imgs2 = $AdsC->uploadImg($ad_img2);
                $imgs2 = json_decode($imgs2,true);
                $pathimg2 = "http://oqt46pvmm.bkt.clouddn.com/".$imgs2['key'];
                $data['ad_img2'] = $pathimg2;
            }
            $model = new \app\admin\model\GeneralizeManage();
            $where = [
                'affiliation_column'=>$data['affiliation_column'],
                'column_place'=>$data['column_place'],
            ];
            $result = $model->where($where)->where('id','<>',$id)->field('id')->find();
            if ($result){
                return $this->errSysJson(['code'=>400,'msg'=>"您的广告组与ID为{$result['id']}的广告位置冲突！"]);
            }
            $res = $model->updateData($id,$data);
            return $this->sucSysJson($res);
            }//
        $model = new \app\admin\model\Column();
        $column = $model->where('status',1)->field('id,name')->order('sort','asc')->select();
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
        $this->assign('column', $column);
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
            $model = new \app\admin\model\GeneralizeManage();
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
            $model = new \app\admin\model\GeneralizeManage();

            $result = $model::destroy($id);
            return $this->sucSysJson($result,'删除成功！');
        }else{
            return $this->errSysJson(['code'=>400,'msg'=>'提交方式错误']);
        }
    }

}