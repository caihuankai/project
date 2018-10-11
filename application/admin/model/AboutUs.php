<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/5/28
 * Time: 10:10
 */

namespace app\admin\model;


use app\common\model\ModelBs;

class AboutUs extends ModelBs
{
    protected $path = "http://oqt46pvmm.bkt.clouddn.com/";

    /**
     * 数据处理
     * @param $data
     * @return string
     */
    private function dataTrim($data)
    {
        return trim($data);
    }

    /**
     * 新增或更新数据
     * @param $data
     * @param bool $id
     * @param string $msg
     * @return array
     */
    public function disposeData($data,$id = false,$msg='更新')
    {
        // 启动事务
        self::startTrans();
        try{
            //公用参数
            $savedata = [
                'profile'=>$this->dataTrim($data['editorValue']),
                'QQ'=>$this->dataTrim($data['QQ']),
                'company_name'=>$this->dataTrim($data['company_name']),
                'address'=>$this->dataTrim($data['address']),
                'telephone'=>$this->dataTrim($data['telephone']),
                'update_time'=>date("Y-m-d H:i:s"),
            ];
            //获取非公用参数
            $development = $this->dataTrim($data['development']);
            $features = $this->dataTrim($data['features']);
            if (!empty($development)){
                //当有值时上传图片并且拼装保存数据
                $savedata['development'] = $this->uploadImg($development);
            }
            if (!empty($features)){
                //当有值时上传图片并且拼装保存数据
                $savedata['features'] = $this->uploadImg($features);
            }
            if ($id == false){
                //获取当前创建时间
                $savedata['create_time'] = date("Y-m-d H:i:s");
                $result = self::save($savedata);
            }else{
                //更新数据
                $result = self::save($savedata,['id'=>$id]);
            }
            // 提交事务
            self::commit();
            if ($result){
                return ['code'=>200,'msg'=>"{$msg}成功！"];
            }else{
                return ['code'=>400,'msg'=>"{$msg}失败！"];
            }
        } catch (\Exception $e) {
            // 回滚事务
            self::rollback();
        }
    }

    /**
     * 上传图片私有类
     * @param $img
     * @return string
     */
    private function uploadImg($img)
    {
        //实例化ads共有类
        $AdsC = new \app\admin\controller\Ads();
        $imgs = $AdsC->uploadImg($img);
        $imgs = json_decode($imgs,true);
        $img = $this->path.$imgs['key'];
        //返回上传成功后的图片地址
        $imgAddress = $img;
        return $imgAddress;
    }

}