<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    // 数据库类型
    'type'           => 'mysql',
    // 服务器地址


    //测试库 -----------------------------开始
    'hostname'       => '123.103.74.8',
    // 数据库名
    'database'       => 'talk_admin',
    // 用户名
    'username'       => 'talk_rw',
    // 密码
    'password'       => 'm7ZokXmoLAk8yQ13',
    // 端口
    'hostport'       => '3308',
    //测试库 -----------------------------结束


//    //正式库 -----------------------------开始
//    // 服务器地址
//    'hostname'       => '121.46.0.125',
//    // 数据库名
//    'database'       => 'dks_admin',
//    // 用户名
//    'username'       => 'dks_rw',
//    // 密码
//    'password'       => 'HtIITtMWsBzp#aDYK2V8DSiwEKMTcRGg',
//    // 端口
//    'hostport'       => '3306',
//    //正式库 -----------------------------结束

    // 连接dsn
    'dsn'            => '',
    //开启自动写入时间戳字段
    'auto_timestamp' => true,
    // 数据库连接参数
    'params'         => [],
    // 数据库编码默认采用utf8
    'charset'        => 'utf8',
    // 数据库表前缀

    'prefix'         => 'talk_',
    // 数据库调试模式
    'debug'          => true,
    // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'deploy'         => 0,
    // 数据库读写是否分离 主从式有效
    'rw_separate'    => false,
    // 读写分离后 主服务器数量
    'master_num'     => 1,
    // 指定从服务器序号
    'slave_no'       => '',
    // 是否严格检查字段是否存在
    'fields_strict'  => true,
    // 数据集返回类型 array 数组 collection Collection对象
    'resultset_type' => 'array',
    // 是否自动写入时间戳字段
    'auto_timestamp' => false,
    // 是否需要进行SQL性能分析
    'sql_explain'    => false,
    
    // Query类
    'query'          => \ThinkPHP\Query::class,
    // 是否开启慢查询记录
    'slow_log'       => true,
    // 开启慢查询时的基准值
    'slow_time'      => 0.5
];
