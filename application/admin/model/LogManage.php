<?php
namespace app\admin\model;

use app\common\model\ModelBase;
use app\admin\controller\App;
use think\Request;
use think\Session;


/**
 * 日志模型
 * Class LogManage
 * @package app\admin\model
 * @author zhengkejian
 * @time 20161021 18:49
 */
class LogManage extends ModelBase
{
    protected $name = 'log_manage';
    
    
    protected $logTypeArr = [
        1 => 'login', // 登录日志
    ];
    
    
    /**
     * status字段对应的文案
     *
     * @var array
     */
    protected $statusTextArr = [
        '成功',
        '失败'
    ];
    
    
    /**
     * write方法的最大次数
     * @see application/admin/controller/Login.php:83
     *
     * @var int
     */
    protected $maxWrite = 1;
    
    
    public function write($msg='', $status=0, $type = 0, $adminId = 0)
    {
        static $i = 1;
        if ($i > $this->maxWrite){ // 防止多次调用
            return false;
        }
        ++$i;
        
        $request = Request::instance();
        
        $controller = $request->controller();
        $action = $controller .'/'.$request->action();
        $manager = Session::get('admin.username');
        $adminId = empty($adminId) ? Session::get('admin.id') : $adminId;
        $log = [];
        $log['admin_id'] = !empty($adminId) ? $adminId : 0;
        $log['datetime'] = time();
        $log['type'] = isset($this->logTypeArr[$type]) ? $type : 0;
        $log['action'] = $action;
        $log['param'] = json_encode(Request::instance()->param());
        $log['comment'] = $msg;
        $log['status'] = $status;
        $log['ip'] = $request->ip(0,true);
        return $this->save($log);
    }

    

    /**
     * 获取日志列表
     * @param $where
     * @param $order
     */
    public static function getList($where="", $order="",$offer,$limit)
    {
        $result = db('log_manage')->field("id,manager,datetime,comment,action,status")->where($where)->order($order)->limit($offer,$limit)->select();
        return $result;
    }

    /**
     * 获取总数
     * @param string $where
     * @return false|\PDOStatement|string|\think\Collection
     */
    public static function getTotal($where="")
    {
        $result = db('log_manage')->where($where)->count();
        return $result;
    }
    /**
     * 删除日志
     * @param $id array|int
     * @return array
     */
    public function del($id)
    {
        try{
            $this->where("id in (".$id.")")->delete();
            return ['code' => 1, 'data' => '', 'msg' => '删除日志成功'];

        }catch( \PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
    
    /**
     * @return array
     */
    public function getStatusTextArr($key)
    {
        return !is_null($key) ? getDataByKey($this->statusTextArr, $key, 0) : $this->statusTextArr;
    }
}
