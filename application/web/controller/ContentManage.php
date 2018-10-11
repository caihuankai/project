<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/4/19
 * Time: 9:06
 */

namespace app\web\controller;


use app\admin\model\AboutUs;
use app\admin\model\ContentList;
use app\admin\model\ContentSetting;
use app\admin\model\Recruitment;
use app\admin\model\RelatedIntroduction;
use app\web\model\MediaPartners;

class ContentManage extends App
{

    /**
     * 获取合作媒体数据/或者友情链接数据
     * 参数：type=>1  获取合作媒体数据,type=>2 获取友情链接数据,
     * 注意事项：当type为空或者不传时默认type=1
     * @return \think\response\Json
     */
    public function getMediaData()
    {
        $type = request()->param('type',1);
        if (empty($type)) $type=1;
        $model = new MediaPartners();
        if ($type==1){
            $field = 'id,media_name,path_url,url';
        }else{
            $field = 'id,media_name,path_url';
        }
        $result = $model->getBlogrollData($type,$field);
        return $this->sucSysJson($result);
    }
    /**
     * 获取内容列表
     * 参数columns （当columns为null或者不传时获取全部底部栏目，当columns有值时获取对应的底部栏目）
     * id (当id为null或者不传时获取全部底部栏目，当id有值时获取对应的底部栏目 )
     * @return \think\response\Json
     */
    public function getContentList()
    {
        $model = new ContentList();
        $columns = request()->param('columns',null);
        $id = request()->param('id',null);
        if (empty($columns) && empty($id)){
            $result = $model
                ->where('id>0')
                ->field('id,title,content,columns')
                ->select();
        }elseif (!empty($columns) && empty($id)){
            $result = $model
                ->where('columns',$columns)
                ->field('id,title,content,columns')
                ->select();
        }else {
            $result = $model
                ->where('id',$id)
                ->field('id,title,content,columns,create_time,update_time')
                ->find();
        }
        if (count($result)>0){
            return $this->sucSysJson($result);
        }else{
            return $this->errSysJson('暂无数据');
        }
    }
    /**
     * 获取相关介绍
     * @return \think\response\Json
     */
    public function getRelatedIntroduction()
    {
        $model = new RelatedIntroduction();
        $result = $model->where('type',1)->field('id,title,icon,content,qr_code')->select();
        if (count($result)>0){
            return $this->sucSysJson($result);
        }else{
            return $this->errSysJson('暂无数据');
        }
    }
    /**
     * 获取在招职位
     * （id为null时获取全部在招职位，id有值时获取对应id的职位）
     * @return \think\response\Json
     */
    public function getRecruitment()
    {
        $model = new Recruitment();
        $id = request()->param('id',null);
        if (empty($id)){
            $data = $model
                ->where('id>0')
                ->field('id,position_name,posttion_category,education,create_time,
                address,content,working_years,recruitment_num,working_category')
                ->select();
            $result = [];
            foreach ($data as $k => $item)
            {
                $result[$k] = $item;
                $result[$k]['education'] = $model->getEducation(false,$item['education']);
            }
        }else{
            $data = $model
                ->where('id',$id)
                ->field('id,position_name,posttion_category,education,create_time,
                address,content,working_years,recruitment_num,working_category')
                ->select();
            $result = [];
            foreach ($data as $k => $item)
            {
                $result[$k] = $item;
                $result[$k]['education'] = $model->getEducation(false,$item['education']);
            }
        }
        if (count($result)>0){
            return $this->sucSysJson($result);
        }else{
            return $this->errSysJson('暂无此数据');
        }
    }

    /**
     * 获取网站内容设置
     * @return \think\response\Json
     */
    public function getContentSetting()
    {
        $model = new ContentSetting();
        $result = $model->where('id>0')->field('id,title,SEO_antistop,logo_img,describe')->select();
        if (count($result)>0){
            return $this->sucSysJson($result);
        }else{
            return $this->errSysJson('暂无数据');
        }
    }
    /**
     * 获取网站内容设置
     * @return \think\response\Json
     */
    public function getWebColumns()
    {
        $type = trim(request()->param('type',false));
        if ($type){
        	$navigationId = 6;//官网大策略观点栏目导航
        }else{
        	$navigationId = 4;//官网首页栏目导航
        }
        $model = new \app\admin\model\NavigationLists();
        $data = $model->alias('nl')
        ->join('talk_column c', 'nl.target_id = c.id')
        ->join('talk_navigation n', 'nl.navigation_id = n.id')
        ->where('nl.target_type', 1)
        ->where('nl.navigation_id', $navigationId)
        ->where('nl.status', 1)
        ->where('c.status', 1)
        ->where('n.status', 1)
        ->field('c.id,c.name,c.level')
        ->order('nl.sort','asc')
        ->select();
        
        if (count($data)>0){
        	return $this->sucSysJson($data);
        }else{
            return $this->errSysJson('暂无数据');
        }
    }

    /**
     * 关于我们
     * @return \think\response\Json
     */
    public function getAboutUs()
    {
        $model = new AboutUs();
        $data = $model->where('status',1)
            ->field('id,profile,development,features,QQ,company_name,address,telephone')
            ->find();
        if (!empty($data)){
            return $this->sucSysJson($data);
        }else{
            return $this->errSysJson('暂未无数据');
        }
    }
    /**
     * 获取二维码
     * @return \think\response\Json
     */
    public function getQRCode()
    {
        $model = new RelatedIntroduction();
        $AboutUs = new AboutUs();
        $dataList = $model->where('type','in',[2,3])->field('id,title,qr_code,icon')->select();
        $dataUs = $AboutUs->where('status',1)->field('features')->find();
        $result['index'] = [
            'id'=>999,
            'title'=>'平台特色',
            'qr_code'=> empty($dataUs) ? null:$dataUs['features'],
        ];
        foreach ($dataList as $item){
            $result[$item['icon']] = $item;
            unset($item['icon']);
        }

        if (count($result)>0){
            return $this->sucSysJson($result);
        }else{
            return $this->errSysJson('暂无数据');
        }
    }//end

}