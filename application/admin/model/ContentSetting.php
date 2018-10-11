<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/4/17
 * Time: 14:41
 */

namespace app\admin\model;


use app\common\model\ModelBs;

class ContentSetting extends ModelBs
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
            $savedata = [
                'title'=>$this->dataTrim($data['title']),
                'SEO_antistop'=>$this->dataTrim($data['SEO_antistop']),
                'describe'=>$this->dataTrim($data['describe']),
                'update_time'=>date("Y-m-d H:i:s"),
            ];
            $img = $this->dataTrim($data['logo_img']);
            if (!empty($img)){
                $AdsC = new \app\admin\controller\Ads();
                $imgs = $AdsC->uploadImg($img);
                $imgs = json_decode($imgs,true);
                $pathimg = $this->path.$imgs['key'];
                $savedata['logo_img'] = $pathimg;
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