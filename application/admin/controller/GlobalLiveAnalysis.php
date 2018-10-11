<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/5/30
 * Time: 17:18
 */

namespace app\admin\controller;


use app\admin\model\BehaviorStatistics;

class GlobalLiveAnalysis extends App
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
            $dateMin=input('dateMin',null);
            $dateMax= input('dateMax',null);
            $field = 'bs.visitors_nun,bs.browse_nun,bs.total_time_len,bs.percapita_time_len,bs.gift_amount_nun,
            bs.jump_live_nun,bs.online_nun,bs.target_id,gl.teacher_name,gl.user_id,gl.set_start_time,gl.set_end_time';
            if (!empty($optionData)){
                $opt = $model->getOption($optionData);
                $where = [
                    'bs.type'=>1,
                    'bs.date'=>array('BETWEEN', array($opt['start'], $opt['end']))
                ];
            }elseif (!empty($dateMin)&&!empty($dateMax)){
                $where = [
                    'bs.type'=>1,
                    'bs.date'=>array('BETWEEN', array($dateMin, $dateMax))
                ];
            }else{
                $where = [
                    'bs.type'=>1,
                ];
            }
            $dataList = $model->getGlobalLiveData(function ($m)use($where){
                $m->where($where);
            },$field,['page'=>$page,'limit'=>$limit]);
            $count = count($model->getGlobalLiveData(function ($m)use($where){
                $m->where($where);
            },$field,false));
            foreach ($dataList as $key=>$item){
                $dataList[$key]['coursetime'] = date('H:i',strtotime($item['set_start_time']))."-".date('H:i',strtotime($item['set_end_time']));
                $dataList[$key]['courseday']=date('Y-m-d',strtotime($item['set_start_time']));
            }
            $data = ['code'=>0,'rows' => $dataList,'count' => $count];
            return $this->sucJson($data);
        }
        $sumField = 'SUM(visitors_nun) as visitors_nun,SUM(browse_nun) as browse_nun,AVG(percapita_time_len) as percapita_time_len,
           SUM(gift_amount_nun) as gift_amount_nun,SUM(jump_live_nun) as jump_live_nun,
           SUM(online_nun) as online_nun';
        $sumData = $model->where('type',1)->field($sumField)->find();
        if (!empty($sumData['percapita_time_len'])){
            $sumData['percapita_time_len'] = number_format($sumData['percapita_time_len'],2);
        }
        $option = $model->getOption();
        $this->assign('option',$option);
        $this->assign('sum',$sumData);
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
           SUM(gift_amount_nun) as gift_amount_nun,SUM(jump_live_nun) as jump_live_nun,
           SUM(online_nun) as online_nun';
        if (empty($tableDataWhere))
        {
            $dateMin=input('dateMin',null);
            $dateMax= input('dateMax',null);
            if (!empty($dateMin)&&!empty($dateMax)){
                $where = [
                    'type'=>1,
                    'date'=>array('BETWEEN', array($dateMin,$dateMax))
                ];
                $sumData = $model->where($where)->field($sumField)->find();
            }else{
                $sumData = $model->where('type',1)->field($sumField)->find();
            }
        }else{
            $opt = $model->getOption($tableDataWhere);
            $where = [
                'type'=>1,
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
        $optionData = trim(request()->param('tableDataWhere',null));
        $field = 'bs.visitors_nun,bs.browse_nun,bs.total_time_len,bs.percapita_time_len,bs.gift_amount_nun,
            bs.jump_live_nun,bs.online_nun,bs.target_id,gl.teacher_name,gl.user_id,gl.set_start_time,gl.set_end_time,bs.id';
        if (empty($optionData)){
            $dataList = $model->getGlobalLiveData(['type'=>1],$field,false);
        }else{
            $opt = $model->getOption($optionData);
            $where = [
                'bs.type'=>1,
                'bs.date'=>array('BETWEEN', array($opt['start'], $opt['end']))
            ];
            $dataList = $model->getGlobalLiveData(function ($m)use($where){
                $m->where($where);
            },$field,false);
        }
        $resutl = [];
        foreach ($dataList as $key=>$item){
            $resutl[$key]['coursetime'] = date('H:i',strtotime($item['set_start_time']))."-".date('H:i',strtotime($item['set_end_time']));
            $resutl[$key]['id'] = $item['id'];
            $resutl[$key]['courseday']=date('Y-m-d',strtotime($item['set_start_time']));
            $resutl[$key]['teacher_name']=$item['teacher_name'];
            $resutl[$key]['user_id']=$item['user_id'];
            $resutl[$key]['visitors_nun']=$item['visitors_nun'];
            $resutl[$key]['browse_nun']=$item['browse_nun'];
            $resutl[$key]['percapita_time_len']=$item['percapita_time_len'];
            $resutl[$key]['gift_amount_nun']=$item['gift_amount_nun'];
            $resutl[$key]['online_nun']=$item['online_nun'];
            $resutl[$key]['jump_live_nun']=$item['jump_live_nun'];
        }
        $excelName = '公共直播间数据统计';
        $titleArray = array('直播时间段','ID','时间','讲师名称','讲师ID','访客数','浏览量','人均停留时长（秒）','总送礼金额','真实总在线人数','跳转至老师个人Live直播间次数');
        $this->exportExcel($resutl,$excelName,$titleArray);
    }


}