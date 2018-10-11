<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/4/10
 * Time: 16:38
 */

namespace app\admin\model;


use app\admin\service\Redis;
use app\common\model\ModelBs;

class Expression extends ModelBs
{
    protected $msg = '未定义类型';

    protected $extype = [
        ['type'=>1,'name'=>'平台通用表情'],
        ['type'=>2,'name'=>'家华课堂专用'],
    ];
    protected $datatype = [
        '0' => ['name'=>'类型'],
        '1' => ['name'=>'平台通用表情'],
    ];
    protected $datajtype = [
        '0' => ['name'=>'类型'],
        '2' => ['name'=>'家华课堂专用'],
    ];
    protected $datastatus = [
        '0' => ['name'=>'状态'],
        '1' => ['name'=>'上架'],
        '2' => ['name'=>'下架']
    ];

    /**
     * 获取自定义类型
     * @return array
     */
    public  function getType()
    {
        return $this->extype;
    }

    /**
     * 获取$type类型数据的状态类型
     * @param $type
     * @param $key
     * @return string
     */
    public function getDataStatus($type,$key)
    {
        $type = "data".$type;
        $data = $this->$type;
        return isset($data[$key]) ? $data[$key]['name'] : $this->msg;
    }

    /**
     * 获取自定义类型的数据以数组格式返回
     * @param $type
     * @return array
     */
    public function getDataArr($type)
    {
        $type = "data".$type;
        $data = $this->$type;
        $result = [];
        foreach ($data as $item){
            $result[] = $item['name'];
        }
        return $result;
    }

    /**
     * 生成IMG表情内容
     * @param $src
     * @return string
     */
    public static function makeImg($src)
    {
        return "<img src='{$src}' style='width: 80px;height: 80px;'>".
                "<a id='showbig' href='javascript:_showBig(\"{$src}\");'>点击查看大图</a>";
    }

    /**
     * 前端接口获取表情数据
     * @param $field
     * @param $status
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getExpressionData($field,$status,$id=null,$type=1)
    {
        if (!empty($id)){
            $result = self::where('e.status','<',$status)
                ->where('type',$type)
                ->where('e.id',$id)->alias('e')
                ->join('qiniu_gallerys qi','e.pic_id = qi.id')
                ->where('qi.positionType',9)
                ->field($field)
                ->find();
        }else{
            $result = self::where('e.status','<',$status)->where('type',$type)->alias('e')
                ->join('qiniu_gallerys qi','e.pic_id = qi.id')
                ->where('qi.positionType',9)
                ->field($field)
                ->order('sort','asc')
                ->select();
        }
        return $result;
    }

    /**
     * 保存图片进图片数据库
     * @param $key
     * @param $data
     * @return array|mixed
     */
    public function savePic($key,$data)
    {
        $qiniu = new QiniuGallerys();
        $qiniuKey = Redis::hashGet('checkqiniu',$key);
        if ($qiniuKey && !empty($key)) {
            $result =$qiniu->where('qiniuKey',$qiniuKey)->field('id')->find();
            return $result['id'];
        }else{
            Redis::hashSet('checkqiniu',$key,$key);
            $result = $qiniu->data($data)->save();
            if ($result){
                return $qiniu->id;
            }else{
                return ['code'=>400,'msg'=>'储存失败！'];
            }
        }
    }

    /**
     * 保存数据
     * @param $data
     * @return array
     */
    public function saveData($data)
    {
        $result = self::save($data);
        if ($result){
            return ['code'=>200,'msg'=>'保存成功！'];
        }else{
            return ['code'=>400,'msg'=>'保存失败！'];
        }
    }

    /**
     * 更新获取软删除数据
     * @param $data
     * @param $id
     * @param string $msg
     * @return array
     */
    public function updateEx($data,$id,$msg='更新')
    {
        $result = self::save($data,['id'=>$id]);
        if ($result){
            return ['code'=>200,'msg'=>$msg.'成功！'];
        }else{
            return ['code'=>400,'msg'=>$msg.'失败！'];
        }
    }

}