<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/4/17
 * Time: 17:17
 */

namespace app\admin\model;


use app\common\model\ModelBs;

class MediaPartners extends ModelBs
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
     * @param $type = 1 媒体合作，type=2 友情链接
     * @param $data
     * @param bool $id
     * @param string $msg
     * @return array
     */
    public function disposeData($data,$id = false,$msg='更新',$type=1)
    {
        // 启动事务
        self::startTrans();
        try{
            $savedata = [
                'media_name'=>$this->dataTrim($data['media_name']),
                'type'=>$type,
            ];
            $img = $this->dataTrim($data['path_url']);
            if ($type==1){
                $savedata['url'] = $this->dataTrim($data['url']);
            }
            if (!empty($img) && $type==1){
                $AdsC = new \app\admin\controller\Ads();
                $imgs = $AdsC->uploadImg($img);
                $imgs = json_decode($imgs,true);
                $pathimg = $this->path.$imgs['key'];
                $savedata['path_url'] = $pathimg;
            }elseif($type==2){
                $savedata['path_url'] = $img;
            }
            if ($id == false){
                $savedata['create_time'] = date("Y-m-d H:i:s");
                $result = self::save($savedata);
            }else{
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

}