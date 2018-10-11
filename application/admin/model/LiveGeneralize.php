<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/7/16
 * Time: 11:29
 */

namespace app\admin\model;


use app\common\model\ModelBs;

class LiveGeneralize extends ModelBs
{
    protected $path = "http://oqt46pvmm.bkt.clouddn.com/";
    const left = 1;
    const right = 2;
    const defaultplay = 3;
    /**
     * 获取分类
     * @param null $index
     * @return array
     */
    public function getType($index = null)
    {
        $arr = [
            self::left => ['text'=>'left','name'=>'课程详情'],
            self::right => ['text'=>'right','name'=>'火热报名'],
            self::defaultplay => ['text'=>'defaultplay','name'=>'播放默认图'],
        ];
        if (!empty($index)){
            $result[] = $arr[$index]['name'];
        }

        return empty($index)? $arr:$result;
    }
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
     * 二维码管理数据保存
     * @param $data
     * @param bool $id
     * @param string $msg
     * @return array
     */
    public function DataSave($data,$id = false,$msg='更新')
    {
        // 启动事务
        self::startTrans();
        try{
            $savedata = [
                'title'=>$this->dataTrim($data['title']),
                'type'=>$this->dataTrim($data['type']),
                'sort'=>!empty($data['sort'])&&$data['type']=='right'?intval($data['sort']):null,
                'update_time'=>date("Y-m-d H:i:s"),
            ];

            if (isset($data['src'])&& !empty($data['src'])){
                $savedata['src'] = $this->saveimg($this->dataTrim($data['src']));
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