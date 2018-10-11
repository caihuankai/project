<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/5/31
 * Time: 12:45
 */

namespace app\admin\model;


use app\common\model\ModelBs;

class BehaviorStatistics extends ModelBs
{
    const day = 1;
    const week = 2;
    const month = 3;
    const calendar_month = 4;

    private static function getTime($dateString)
    {
        return date("Y-m-d",strtotime($dateString));
    }

    /**
     * 获取数据分类
     * 数据时统计昨天的选择近一天应该是获取-2天，以此类推
     * @param null $ids
     * @return array|mixed
     */
    public function getOption($ids=null)
    {
        $BeginDate=date('Y-m-01', strtotime(date("Y-m-d")));
        $EndDate = date('Y-m-d', strtotime("$BeginDate + 1 month -1 day"));
        $arr = [
            0 => ['text'=>"请选择","value"=>null],
            self::day =>['text'=>"最近1天","value"=>1,
                'start'=>self::getTime("-2 day"),
                'end'=>self::getTime("-2 day")],
            self::week =>['text'=>"最近7天","value"=>2,
                'start'=>self::getTime("-1 week -1 day"),
                'end'=>self::getTime("-1 day"),
                ],
            self::month =>['text'=>"最近30天","value"=>3,
                'start'=>self::getTime("-1 month"),
                'end'=>self::getTime("-1 day"),
                ],
            self::calendar_month =>['text'=>"自然月","value"=>4,
                'start'=>$BeginDate,
                'end'=>$EndDate,
                ],
        ];
        $data = !empty($ids)?$arr[$ids]:$arr;
        return $data;
    }

    /**
     * 获取公共直播间数据
     * @param $where
     * @param $field
     * @param $paging ARRAY/boolean
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getGlobalLiveData($where,$field,$paging = ['limit'=>10,'page'=>1])
    {
        if (is_array($paging)){
            $dataList = $this->where($where)->alias('bs')
                ->join('talk_global_live gl','bs.target_id = gl.id','left')
                ->field($field)
                ->limit(($paging['page']-1)*$paging['limit'],$paging['limit'])
                ->order('bs.visitors_nun desc')
                ->select();
        }else{
            $dataList = $this->where($where)->alias('bs')
                ->join('talk_global_live gl','bs.target_id = gl.id','left')
                ->field($field)
                ->order('bs.visitors_nun desc')
                ->select();
        }
        return $dataList;
    }


    /**
     * 获取Live直播间数据
     * @param $where
     * @param $field
     * @param $paging ARRAY/boolean
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getLiveData($where,$field,$paging = ['limit'=>10,'page'=>1])
    {
        if (is_array($paging)) {
            $dataList = $this->where($where)->alias('bs')
                ->join('talk_live l', 'bs.target_id = l.id', 'left')
                ->join('talk_user u', 'l.user_id = u.user_id')
                ->field($field)
                ->limit(($paging['page'] - 1) * $paging['limit'], $paging['limit'])
                ->order('bs.visitors_nun desc')
                ->select();
        }else{
            $dataList = $this->where($where)->alias('bs')
                ->join('talk_live l', 'bs.target_id = l.id', 'left')
                ->join('talk_user u', 'l.user_id = u.user_id')
                ->field($field)
                ->order('bs.visitors_nun desc')
                ->select();
        }
        return $dataList;
    }

}