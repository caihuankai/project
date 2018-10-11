<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/8/15
 * Time: 11:06
 */

namespace app\admin\controller;


class UserTimeStatistics extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status,
        \app\admin\traits\ImgReset;
    public function index()
    {
        $model = new \app\admin\model\UserJiahua();
        $header = [
            ['checkbox' => true, 'value' =>1],
            ['field' =>'id', 'title' => 'ID',],
            ['field' => 'daytime', 'title' => '日听课时长（分钟）',],
            ['field' => 'alltime', 'title' => '总听课时长（分钟）',],
            ['field' => 'groupid', 'title' => '所属团队',],
            ['field' => 'last_login_time', 'title' => '登录时间',],
        ];
        $search = [
            [['options' => ['placeholder' => '用户ID']], 'eq', 'uj.user_id'],
            ['', 'dateMin-date','uj.last_login_time'],
            ['', 'dateMax-date','uj.last_login_time'],
            [['options' => ['placeholder' => '所属团队','data' => $model->getDataStatus('Team') ]], 'select', 'uj.groupid', 'intval'],
        ];
        $this->setTableHeader($header)
            ->setSearch($search)
            ->setToolbarId('table-button-html')
            ->setTableSearchId('table-search-html');

        return $this->traitAdminTableList(function () {
            //当有搜索数据时执行
            $model = new \app\admin\model\UserJiahua();
            $datetime = date('Ymd');
            $field =   "uj.user_id,
                      (
                        SELECT
                          sum(la.total)
                        FROM
                          talk_live_statistics la
                        WHERE
                          la.user_id = uj.user_id
                        AND la.statistics_time = {$datetime}
                          AND la.live_id = 1000010029
                            AND la.statistics_type = 1
                      ) AS dayTotal,
                      (
                        SELECT
                          sum(la.total) as alltime
                        FROM
                          talk_live_statistics la
                        WHERE
                          la.user_id = uj.user_id
                                AND la.live_id = 1000010029
                                AND la.statistics_type = 1
                      ) AS allTotal,
                      uj.last_login_time,
                      uj.groupid";
            //生成数据表
            $data = $this->traitAdminTableQuery([], function () use ($model) {
                return $model->alias('uj')
                    ->join('talk_live_statistics ls','uj.user_id = ls.user_id AND ls.live_id = 1000010029 AND ls.global_id IN (1, 2, 3, 4, 5, 6,7) AND ls.statistics_type = 1 AND ls.live_id = 1000010029')
                    ->group('ls.user_id');
            }, $field, '','*',false);
            $result = [];
            foreach ($data['rows'] as $k => $datum) {
                //模板数据返回
                $result[] = [
                    'id' => $datum['user_id'],
                    'daytime'=>empty($datum['dayTotal'])?0:$datum['dayTotal'],
                    'alltime'=>empty($datum['allTotal'])?0:$datum['allTotal'],
                    'groupid'=>$model->getDataStatus('Team',$datum['groupid']),
                    'last_login_time' => empty($datum['last_login_time'])?0:$datum['last_login_time'],
                ];
            }
            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        }, function () {
        });
    }//end

}