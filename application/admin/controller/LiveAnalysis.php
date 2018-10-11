<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/5/30
 * Time: 17:24
 */

namespace app\admin\controller;

use app\admin\model\BehaviorStatistics;
class LiveAnalysis extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status,
        \app\admin\traits\ImgReset,
        \app\admin\traits\BaseExcel;
    const em = 'http://oqt46pvmm.bkt.clouddn.com/Ft56ta8EDC03VFYIHzFuSjcv5E5_';
    /**
     * 主页
     * @return mixed
     */
    public function index()
    {
        $model = new BehaviorStatistics();
        if(request()->isPost()){
            $page = request()->param('page',0);
            $limit = request()->param('limit',10);
            $optionData = trim(request()->param('optionData',null));
            $teacherName = trim(input('teacherName',null));
            $dateMin=input('dateMin',null);
            $dateMax= input('dateMax',null);
            $field = 'bs.visitors_nun,bs.browse_nun,bs.total_time_len,bs.percapita_time_len,
            bs.gift_amount_nun,bs.online_nun,l.id,u.head_add,u.alias,bs.date';
            if (empty($teacherName)){
                if (!empty($optionData))
                {
                    $opt = $model->getOption($optionData);
                    $where = [
                        'bs.type'=>2,
                        'bs.date'=>array('BETWEEN', array($opt['start'], $opt['end']))
                    ];
                }elseif (!empty($dateMin)&&!empty($dateMax)){
                    $where = [
                        'bs.type'=>2,
                        'bs.date'=>array('BETWEEN', array($dateMin, $dateMax))
                    ];
                }else{
                    $where = [
                        'bs.type'=>2,
                    ];
                }
                $dataList = $model->getLiveData(function ($m)use($where){
                    $m->where($where);
                },$field,['page'=>$page,'limit'=>$limit]);
                $count = count($model->getLiveData(function ($m)use($where){
                    $m->where($where);
                },$field,false));
            }else{
                if (!empty($dateMin)&&!empty($dateMax)){
                    $where = [
                        'bs.type'=>2,
                        'bs.date'=>array('BETWEEN', array($dateMin, $dateMax))
                    ];
                }else{
                    $where = [
                        'bs.type'=>2,
                    ];
                }
                $userModel = new \app\admin\model\User();
                $dataList = $userModel->where(['u.alias'=>['like',"%$teacherName%"]])->alias('u')
                    ->join('talk_live l', 'l.user_id = u.user_id')
                    ->join('talk_behavior_statistics bs','bs.target_id = l.id','left')
                    ->where($where)
                    ->field($field)
                    ->limit(($page - 1) * $limit, $limit)
                    ->order('bs.visitors_nun desc')
                    ->select();
                $count = $userModel->where(['u.alias'=>['like',"%$teacherName%"]])->alias('u')
                    ->join('talk_live l', 'l.user_id = u.user_id')
                    ->join('talk_behavior_statistics bs','bs.target_id = l.id','left')
                    ->where($where)
                    ->field('bs.visitors_nun')
                    ->order('bs.visitors_nun desc')
                    ->count();
            }
            $data = ['code'=>0,'rows' => $dataList,'count' => $count];
            return $this->sucJson($data);
        }
        $sumField = 'SUM(visitors_nun) as visitors_nun,SUM(browse_nun) as browse_nun,AVG(percapita_time_len) as percapita_time_len,
           SUM(gift_amount_nun) as gift_amount_nun,SUM(online_nun) as online_nun';
        $sumData = $model->where('type',2)->field($sumField)->find();
        if (!empty($sumData['percapita_time_len'])){
            $sumData['percapita_time_len'] = number_format($sumData['percapita_time_len'],2);
        }
        $option = $model->getOption();
        $this->assign('sum',$sumData);
        $this->assign('option',$option);
        return $this->fetch();
    }//end

    /**
     * 刷新直播间数据
     * @return \think\response\Json
     */
    public function getAjaxReload()
    {
        $model = new BehaviorStatistics();
        $tableDataWhere = trim(request()->param('tableDataWhere',null));
        $sumField = 'SUM(visitors_nun) as visitors_nun,SUM(browse_nun) as browse_nun,AVG(percapita_time_len) as percapita_time_len,
           SUM(gift_amount_nun) as gift_amount_nun,SUM(online_nun) as online_nun';
        if (empty($tableDataWhere))
        {
            $dateMin=input('dateMin',null);
            $dateMax= input('dateMax',null);
            if (!empty($dateMin)&&!empty($dateMax)){
                $where = [
                    'type'=>2,
                    'date'=>array('BETWEEN', array($dateMin,$dateMax))
                ];
                $sumData = $model->where($where)->field($sumField)->find();
            }else{
                $sumData = $model->where('type',2)->field($sumField)->find();
            }
        }else{
            $opt = $model->getOption($tableDataWhere);
            $where = [
                'type'=>2,
                'date'=>array('BETWEEN', array($opt['start'], $opt['end']))
            ];
            $sumData = $model->where($where)->field($sumField)->find();
        }
        if (!empty($sumData['percapita_time_len'])){
            $sumData['percapita_time_len'] = number_format($sumData['percapita_time_len'],2);
        }
        return $this->sucSysJson($sumData);
    }

    /**
     * 导出EXCEL
     */
    public function dataExportExcel()
    {
        $model = new BehaviorStatistics();
        $optionData = trim(request()->param('optionData',null));
        $field = 'bs.visitors_nun,bs.browse_nun,bs.total_time_len,bs.percapita_time_len,
            bs.gift_amount_nun,bs.online_nun,l.id,u.head_add,u.alias,bs.create_time';
        if (empty($optionData)){
            $dataList = $model->getLiveData(['type'=>2],$field,false);
        }else{
            $opt = $model->getOption($optionData);
            $where = [
                'bs.type'=>2,
                'bs.date'=>array('BETWEEN', array($opt['start'], $opt['end']))
            ];
            $dataList = $model->getLiveData(function ($m)use($where){
                $m->where($where);
            },$field,false);
        }
        $resutl = [];
        foreach ($dataList as $key=>$item){
            $resutl[$key]['alias']=$item['alias'];
            $resutl[$key]['id']=$item['id'];
            $resutl[$key]['visitors_nun']=$item['visitors_nun'];
            $resutl[$key]['browse_nun']=$item['browse_nun'];
            $resutl[$key]['percapita_time_len']=$item['percapita_time_len'];
            $resutl[$key]['gift_amount_nun']=$item['gift_amount_nun'];
            $resutl[$key]['online_nun']=$item['online_nun'];
            $resutl[$key]['create_time']=date('Y-m-d',strtotime($item['create_time']));
            $resutl[$key]['head_add']=$item['head_add'];
        }
        $excelName = 'Live直播间数据统计';
        $titleArray = array('讲师昵称','Live直播间ID','访客数','浏览量','人均停留时长（秒）','总送礼金额','真实总在线人数','创建时间','头像地址');
        $this->exportExcel($resutl,$excelName,$titleArray);
    }
}