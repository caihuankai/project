<?php
/**
 * @author: zhengkejian
 * @Date: 2016/11/3
 * @Time: 18:54
 */

namespace app\admin\service;


/**
 * redis操作
 * Class Redis
 * @package app\admin\service
 * @author: zhengkejian
 * @Date: 20161103
 * @Time: 19:00
 */
/**
 * Class Redis
 * @package app\admin\service
 * @author: zhengkejian
 * @Date: 20161114
 * @Time: ${TIME}
 */
class Redis
{

    /**
     * @var \Redis
     */
    protected static $redis;

    /**
     * Redis constructor.
     */
    public function __construct()
    {
        return self::init();
    }

    /**
     * redis链接
     * @return \Redis
     * @author: zhengkejian
     * @Date: 20161103
     * @Time: 19:36
     */
    public static function init()
    {
        self::$redis = new \Redis;
        self::$redis->connect(config('cache.host'), config('cache.port'));
        self::$redis->auth(config('cache.password'));
        return self::$redis;
    }

    /**
     * 设置key
     * @param $key
     * @param $val
     * @author: zhengkejian
     * @Date: 20161103
     * @Time: 19:00
     */
    public static function set($key, $val, $time = 0)
    {
        self::init();
        self::$redis->select(1);
        $time > 0 ? self::$redis->setex($key, $time, $val) : self::$redis->set($key, $val);
    }

    /**
     * 取key
     * @param $key
     * @return bool|string
     * @author: zhengkejian
     * @Date: 20161103
     * @Time:19:00
     */
    public static function get($key)
    {
        self::init();
        self::$redis->select(1);
        return self::$redis->get($key);
    }

    /**
     * 删除key
     * @param $key
     * @return int
     * @author: zhengkejian
     * @Date: 20161114
     * @Time: ${TIME}
     */
    public static function del($key, $flag = true)
    {
        self::init();
        if ($flag) self::$redis->select(1);
        return self::$redis->del($key);
    }

    /**
     * 搜索ey
     * @param $key
     * @return int
     * @author: zhengkejian
     * @Date: 20161114
     * @Time: ${TIME}
     */
    public static function keys($key)
    {
        self::init();
        self::$redis->select(1);
        return self::$redis->keys($key);
    }

    /**
     * 设置key
     * @author: zhengkejian
     * @Date: 20161114
     * @Time: 19:04
     */
    public static function sSet($key, $val, $time = 0)
    {
        $redis = new \Redis;
        $redis->connect(config('cache.host'), config('cache.port'));
        $redis->auth(config('cache.password'));
        $redis->select(1);
        $redis->set($key, $val, $time);
    }

    /**
     * redis队列 入队
     * @param $key
     * @param $value1
     * @param null $value2
     * @param null $valueN
     * @author: zhengkejian
     * @Date: 20161207
     * @Time: 09:01
     */
    public static function lPush($key, $value1)
    {
        self::init();
        self::$redis->select(1);
        return self::$redis->lPush($key, $value1);
    }

    /**
     * redis队列 入队
     * @param $key
     * @param $value1
     * @param null $value2
     * @param null $valueN
     * @author: zhengkejian
     * @Date: 20161207
     * @Time: 09:01
     */
    public static function rPush($key, $value1)
    {
        self::init();
        self::$redis->select(1);
        return self::$redis->rPush($key, $value1);
    }

    /**
     * redis队列 出队
     * @param $key
     * @author: zhengkejian
     * @Date: 20161207
     * @Time: 11:07
     */
    public static function rPop($key)
    {
        self::init();
        self::$redis->select(1);
        return self::$redis->rPop($key);
    }

    /**
     * redis队列 出队
     * @param $key
     * @author: zhengkejian
     * @Date: 20161207
     * @Time: 11:07
     */
    public static function lPop($key)
    {
        self::init();
        self::$redis->select(1);
        return self::$redis->lPop($key);
    }

    /**
     * 添加集合
     * @param $key
     * @param $value1
     * @param null $value2
     * @param null $valueN
     * @return int
     * @author: zhengkejian
     * @Date: 20161114
     * @Time: ${TIME}
     */
    public static function sAdd($key, $value1)
    {
        self::init();
        self::$redis->select(1);
        return self::$redis->sAdd($key, $value1);
    }

    /**
     * 移除集合元素
     * @param $key
     * @param $member1
     * @param null $member2
     * @param null $memberN
     * @return int
     * @author: zhengkejian
     * @Date: 20161114
     * @Time: ${TIME}
     */
    public static function sRem($key, $member1)
    {
        self::init();
        self::$redis->select(1);
        return self::$redis->sRem($key, $member1);
    }

    /**
     * 获取集合所有成员
     * @param $key
     * @return array
     * @author: zhengkejian
     * @Date: 20161114
     * @Time: ${TIME}
     */
    public static function sMembers($key)
    {
        self::init();
        self::$redis->select(1);
        return self::$redis->sMembers($key);
    }

    /**
     * 设置哈希表内容
     * @name  hashSet
     * @param $key
     * @param $hashKey
     * @param $value
     * @author Lizhijian
     * @example hashSet('user', 'info', array('name' => 'Joe', 'salary' => 8000));
     */
    public static function hashSet($key, $hashKey, $value, $dbindex = 1, $time = 0){
        self::init();
        self::$redis->select($dbindex);
        self::$redis->hSet($key, $hashKey, $value);
        if($time > 0) self::$redis->expire($key, $time);
    }

    /**
     * 获取哈希表内容
     * @name  hashGet
     * @param $key
     * @param string $hashKeys  无hashKeys时取所有域的值
     * @return array|string
     * @author Lizhijian
     * @example hashGet('user', 'info');  or  hashGet('user');
     */
    public static function hashGet($key, $hashKeys = '', $dbindex = 1){
        self::init();
        self::$redis->select($dbindex);
        if($hashKeys){
            return self::$redis->hGet($key, $hashKeys);
        }else{
            return self::$redis->hGetAll($key);
        }
    }
    /**
     * 获取set表内容
     * @param [type]  $key     [description]
     * @param integer $dbindex [description]
     */
    public static function setValueGet($key,$dbindex = 0)
    {
        self::init();
        self::$redis->select($dbindex);
        return self::$redis->sMembers($key);
    }
}