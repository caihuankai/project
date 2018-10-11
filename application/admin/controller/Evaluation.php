<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/5/29
 * Time: 11:02
 */

namespace app\admin\controller;


class Evaluation extends App
{
    //默认图
    const em = "http://oqt46pvmm.bkt.clouddn.com/FhPDicPP90HTbLd_vgudvfBc2mpZ";
    protected $path = "http://oqt46pvmm.bkt.clouddn.com/";
    /**
     * 内容设置首页
     * @return mixed
     */
    public function index()
    {
        $model = new \app\admin\model\RelatedIntroduction();
        $info = $model->where('type',3)->field('id,qr_code')->find();
        if (count($info)<1){
            $redata = [
                'id'=>null,
                'qr_code'=>self::em,
            ];
        }else{
            $redata = $info;
            if (empty($redata['qr_code'])){
                $redata['qr_code']=$this->em;
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
     * 图片上传
     * @param $img
     * @return string
     */
    private function saveimg($img)
    {
        $AdsC = new \app\admin\controller\Ads();
        $imgs = $AdsC->uploadImg($img);
        $imgs = json_decode($imgs,true);
        return $this->path.$imgs['key'];
    }

    /**
     * 编辑
     * @return \think\response\Json
     */
    public function upload()
    {
        $model =new \app\admin\model\RelatedIntroduction();
        // 启动事务
        $model->startTrans();
        try{
            $id = $this->trimData('id');
            $qr_code = $this->trimData('qr_code');
            if (empty($qr_code))return $this->errSysJson(['code'=>400,'msg'=>'请选择需要上传的图片！']);
            $saveData = [
                'title'=>'学员管理',
                'qr_code'=>$this->saveimg($qr_code),
                'icon'=>'evaluation',
                'type'=>3,
            ];
            if (empty($id)){
                $savedata['create_time'] = date("Y-m-d H:i:s");
                $result = $model->save($saveData);
            }else{
                $result = $model->save($saveData,['id'=>$id]);
            }
            // 提交事务
            $model->commit();
            if ($result){
                return $this->sucSysJson(['code'=>200,'msg'=>"上传成功！"]);
            }else{
                return $this->errSysJson(['code'=>400,'msg'=>"上传失败！"]);
            }
        } catch (\Exception $e) {
            // 回滚事务
            $model->rollback();
        }
    }//end
}