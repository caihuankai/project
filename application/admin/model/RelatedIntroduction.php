<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/4/18
 * Time: 13:56
 */

namespace app\admin\model;


use app\common\model\ModelBs;

class RelatedIntroduction extends ModelBs
{
    protected $path = "http://oqt46pvmm.bkt.clouddn.com/";
    const weixin = 1;
    const applet = 2;
    const mobile = 3;
    const left = 1;
    const right = 2;
    const defaultplay = 3;
    const endplay = 4;
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
     * 当type4时获取分类
     * @param null $index
     * @return array
     */
    public function getType($index = null)
    {
        $arr = [
            self::left => ['text'=>'left','name'=>'课程详情'],
            self::right => ['text'=>'right','name'=>'火热报名'],
            self::defaultplay => ['text'=>'defaultplay','name'=>'播放默认图'],
            self::endplay => ['text'=>'endplay','name'=>'播放结束图'],
        ];
        if (!empty($index)){
            $result[] = $arr[$index]['name'];
        }

        return empty($index)? $arr:$result;
    }
    /**
     * 当type2时获取分类
     * @param null $index
     * @return array
     */
    public function getIcon($index = null)
    {
        $arr = [
            self::weixin => ['text'=>'weixin','name'=>'公众号'],
            self::applet => ['text'=>'applet','name'=>'小程序'],
            self::mobile => ['text'=>'mobile','name'=>'APP'],
        ];
        if (!empty($index)){
            $result[] = $arr[$index]['name'];
        }

        return empty($index)? $arr:$result;
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
                'content'=>$this->dataTrim($data['editorValue']),
                'type'=>1,
            ];
            $icon = $this->dataTrim($data['icon']);
            $qrcode = $this->dataTrim($data['qr_code']);
            if (!empty($icon)){
                $savedata['icon'] = $this->saveimg($icon);
            }
            if (!empty($qrcode)){
                $savedata['qr_code'] = $this->saveimg($qrcode);
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
    /**
     * 二维码管理数据保存
     * @param $data
     * @param bool $id
     * @param string $msg
     * @return array
     */
    public function QRCodeSave($data,$id = false,$msg='更新',$saveType=2)
    {
        // 启动事务
        self::startTrans();
        try{
            $savedata = [
                'title'=>$this->dataTrim($data['title']),
                'icon'=>$this->dataTrim($data['icon']),
                'type'=>$saveType,
                'content'=>(isset($data['endtime'])&&isset($data['starttime'])) &&
                (!empty($data['endtime'])&&!empty($data['starttime']))? json_encode([
                    'starttime'=>$this->dataTrim($data['starttime']),
                    'endtime'=>$this->dataTrim($data['endtime']),
                ]):null,
            ];
            if($data['icon'] == 'right'&& !empty(intval($data['sort']))){
                $savedata['content'] = intval($data['sort']);
            }
            if (isset($data['qr_code'])&& !empty($data['qr_code'])){
                $savedata['qr_code'] = $this->saveimg($this->dataTrim($data['qr_code']));
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
}