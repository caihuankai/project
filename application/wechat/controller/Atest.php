<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/4/3
 * Time: 15:02
 */

namespace app\wechat\controller;


class Atest extends App
{
        protected $noLoginAction =['test','phpinfo'];

        public function test()
        {
//            $m = new \MongoClient('123.103.74.8:27019'); // 连接默认主机和端口为：mongodb://localhost:27017
//            $db = $m->online_room_info_stat; // 获取名称为 "test" 的数据库
//            $data = 1000009999;
//            $collection = $db->$data;
////            $document = array(
////                "title" => "MongoDB",
////                "description" => "database",
////                "likes" => 100,
////                "url" => "http://www.runoob.com/mongodb/",
////                "by", "菜鸟教程"
////            );
////            $collection->insert($document);
//            $result = $collection->find();
//            $datalist = [];
//            foreach ($result as $k => $document) {
//                $datalist[$k]['date'] = $document["date"];
//                $datalist[$k]['type'] = $document["type"];
//                $datalist[$k]['value'] = $document["value"];
//            }
//            return json($datalist);

            //获取正确的统计日期，默认前一天，排除法定假期和周末
//            $onlineRoomInfoStatModel = new \app\admin\model\OnlineRoomInfoStat();
//            $result = $onlineRoomInfoStatModel->db()->table('1000009999')->select();
//            $datalist = [];
//            foreach ($result as $k => $document) {
//                $datalist[$k]['date'] = $document["date"];
//                $datalist[$k]['type'] = $document["type"];
//                $datalist[$k]['value'] = $document["value"];
//            }
//            return json($datalist);
//            $onlineRoomInfoList = $this->db()->table($liveId)->where('date', $date)->select();
//            $statisticsDate = $onlineRoomInfoStatModel->getStatisticsDate();
//
////            $liveModel = new \app\admin\model\Live();
//            //获取 日均在线用户、最高在线用户、人均在线时长
//            $onlineRoomInfo = $onlineRoomInfoStatModel->getOnlineRoomInfoByLiveIdAndDate(9999, $statisticsDate);
//            $liveNumber = $liveModel->where('id', 9999)->field('online_num, virtual_num')->find();
//            return $this->sucSysJson($onlineRoomInfo);
//            return $this->sucSysJson($liveNumber.'++++++++'.$onlineRoomInfo);
        }
        public function phpinfo()
        {
            phpinfo();
        }
}