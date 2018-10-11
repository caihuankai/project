<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/5/28
 * Time: 9:52
 */

namespace app\admin\controller;


class AboutUs extends App
{
    //默认图
    private $em = "http://oqt46pvmm.bkt.clouddn.com/FhPDicPP90HTbLd_vgudvfBc2mpZ";

    /**
     * 内容设置首页
     * @return mixed
     */
    public function index()
    {
        $model = new \app\admin\model\AboutUs();
        $info = $model->find();
        if (count($info)<1){
            $redata = [
                'id'=>null,
                'profile'=>null,
                'development'=>$this->em,
                'features'=>$this->em,
                'QQ'=>null,
                'company_name'=>null,
                'address'=>null,
                'telephone'=>null,
            ];
        }else{
            $redata = $info;
            if (empty($redata['development'])){
                $redata['development']=$this->em;
            }
            if (empty($redata['features'])){
                $redata['features']=$this->em;
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
        $model =new \app\admin\model\AboutUs();
        $profile = $this->trimData('editorValue');
        $development = $this->trimData('development');
        $features = $this->trimData('features');
        $QQ = $this->trimData('QQ');
        $company_name = $this->trimData('company_name');
        $address = $this->trimData('address');
        $telephone = $this->trimData('telephone');
        $id = $this->trimData('id');
        if (empty($profile)||empty($QQ)||empty($company_name)||empty($address)||empty($telephone))return $this->errSysJson(['code'=>400,'msg'=>'必填参数不能为空！']);
        if (empty($id)){
            if (empty($development)||empty($features))return $this->errSysJson(['code'=>400,'msg'=>'请上传图片！']);
            return $this->sucSysJson($model->disposeData(request()->param(),false,'保存'));
        }else{
            return $this->sucSysJson($model->disposeData(request()->param(),$id));
        }
    }//end

}