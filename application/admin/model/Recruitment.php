<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/4/16
 * Time: 10:52
 */

namespace app\admin\model;


use app\common\model\ModelBs;

class Recruitment extends ModelBs
{
    protected $education = [
        '1' =>['name'=>'学历不限'],
        '2' =>['name'=>'专科'],
        '3' =>['name'=>'本科'],
        '4' =>['name'=>'硕士'],
        '5' =>['name'=>'博士'],
        '6' =>['name'=>'其他'],
    ];

    /**
     * 自定义学历类型
     * @param bool $type
     * @param null $sub
     * @return array|mixed
     */
    public function getEducation($type=true,$sub=null)
    {
        if ($type ==true && $sub == null){
            $result = [];
            $data = $this->education;
            $result[0] = ['type'=>0,'name'=>"选择学历"];
            foreach ($data as $k => $key)
            {
                $result[$k] = ['type'=>$k,'name'=>$key['name']];
            }
        }elseif ($type == false && $sub != null){
            $data = $this->education;
            $result = isset($data[$sub]) ? $data[$sub]['name'] : $data[6];
        }
        return $result;
    }

    /**
     * 数据处理
     * @param $data
     * @param null $default
     * @return string
     */
    private function trimData($data,$default=null)
    {
        return trim($data,$default);
    }

    /**
     * 更新或新增
     * @param $data
     * @param string $msg
     * @param null $id
     * @return array
     */
    public function editData($data,$msg= '保存',$id=null)
    {
        // 启动事务
        self::startTrans();
        try{
            $savedata = [
                'position_name'=>$this->trimData($data['position_name']),
                'posttion_category'=>$this->trimData($data['posttion_category']),
                'education'=>$this->trimData($data['education']),
                'content'=>$this->trimData($data['editorValue']),
                'address'=>$this->trimData($data['address']),
                'recruitment_num'=>$this->trimData($data['recruitment_num']),
                'working_category'=>$this->trimData($data['working_category']),
                'working_years'=>$this->trimData($data['working_years']),
            ];
            if ($id == null){
                $savedata['create_time']=$this->trimData(date("Y-m-d H:i:s"));
                $result = self::data($savedata)->save();
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
    }//

    public static function del()
    {
        $id = trim(request()->param('id'),null);
        if (empty($id)) return ['code'=>400,'msg'=>'数据异常！'];
        // 启动事务
        self::startTrans();
        try{
            $result =  self::destroy($id);
            // 提交事务
            self::commit();
            if ($result){
                return ['code'=>200,'msg'=>"删除成功！"];
            }else{
                return ['code'=>400,'msg'=>"删除失败！"];
            }
        } catch (\Exception $e) {
            // 回滚事务
            self::rollback();
        }

    }//

}