<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/4/17
 * Time: 9:05
 */

namespace app\admin\model;


use app\common\model\ModelBs;

class ContentList extends ModelBs
{
    protected $columns = [
        1 => ['name'=>'产品和服务'],
        2 => ['name'=>'帮助中心'],
        3 => ['name'=>'联系我们'],
        4 => ['name'=>'关于我们'],
    ];

    /**
     * 获取对应的栏目列别或者获取栏目select
     * @param $type
     * @param null $id
     * @return array
     */
    public function getDataArr($type,$id = null,$state=true)
    {
        $data = $this->$type;
        $result = [];
        if ($id == null&&$type == 'columns'&&$state){
            foreach ($data as $key =>$item){
                $result[$key] = $item['name'];
            }
            array_unshift($result,'所属列别');
        }elseif ($type == 'columns'&&$state){
            isset($data[$id]) ? $result = $data[$id]['name'] : $result = ['name'=>'暂无此列别'];
        }else{
            foreach ($data as $key =>$item){
                $result[] = ['key'=>$key,'name'=>$item['name']];
            }
            array_unshift($result,['key'=>0,'name'=>'所属列别']);
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
                'title'=>$this->trimData($data['title']),
                'content'=>$this->trimData($data['editorValue']),
                'update_name'=>$_SESSION['adminSess']['admin']['username'],
                'update_time'=>date("Y-m-d H:i:s"),
            ];
            if ($id != null){
                $result = self::save($savedata,['id'=>$id]);
            }else{
                $savedata['columns'] = $this->trimData($data['columns']);
                $savedata['create_name'] = $_SESSION['adminSess']['admin']['username'];
                $savedata['create_time'] = date("Y-m-d H:i:s");
                $result = self::data($savedata)->save();
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

}