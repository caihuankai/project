<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/4/17
 * Time: 13:43
 */

namespace app\admin\controller;


class ContentSetting extends App
{
    //默认图
    private $em = "http://oqt46pvmm.bkt.clouddn.com/Ft56ta8EDC03VFYIHzFuSjcv5E5_";

    /**
     * 内容设置首页
     * @return mixed
     */
    public function index()
    {
        $model = new \app\admin\model\ContentSetting();
        $info = $model->find();
        if (count($info)<1){
            $redata = [
                'id'=>null,
                'title'=>null,
                'SEO_antistop'=>null,
                'logo_img'=>$this->em,
                'describe'=>null,
            ];
        }else{
            $redata = $info;
            if (empty($redata['logo_img'])){
                $redata['logo_img']=$this->em;
            }
        }
        $this->assign('info',$redata);
        return $this->fetch();
    }//

    /**
     * 数据格式化
     * @param $name
     * @param null $default
     * @return string
     */
    private function trimData($name,$default=null)
    {
        return trim(request()->param($name,$default));
    }

    /**
     * 编辑
     * @return \think\response\Json
     */
    public function edit()
    {
        $model =new \app\admin\model\ContentSetting();
        $title = $this->trimData('title');
        $describe = $this->trimData('describe');
        $img = $this->trimData('logo_img');
        $id = $this->trimData('id');
        if (empty($title)||empty($describe))return $this->errSysJson(['code'=>400,'msg'=>'必填参数不能为空！']);
        if (empty($this->trimData('id'))){
            if (empty($img))return $this->errSysJson(['code'=>400,'msg'=>'网站logo不能为空！']);
            return $this->sucSysJson($model->disposeData(request()->param(),false,'新增'));
        }else{
            return $this->sucSysJson($model->disposeData(request()->param(),$id));
        }
    }//end
}