<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/3/23
 * Time: 9:38
 */

namespace app\admin\controller;


use Monolog\Handler\IFTTTHandler;

class DarkRoom extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status,
        \app\admin\traits\ImgReset;
    public function index()
    {

        $this->setTableHeader([
            ['checkbox' => true, 'value' => 1,],
            ['field' => 'id', 'title' => 'ID',],
            ['field' => 'user_id', 'title' => '用户ID',],
            ['field' => 'alias', 'title' => '用户昵称',],
            ['field' => 'shutup_time', 'title' => '禁言时间',],
            ['field' => 'shutup_start_time', 'title' => '起始时间',],
            ['field' => 'shutup_end_time', 'title' => '结束时间',],
            ['field' => 'action', 'title' => '操作',],
            ['field' => 'action_name', 'title' => '操作人',],
        ])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');

        return $this->traitAdminTableList(function () {

            $model = new \app\admin\model\DarkRoom();
            $field = '*';
            if(input('dateMin')){
                $this->tableWhere['shutup_start_time'] = [
                    '>=',input('dateMin')
                ];
            }
            if(input('dateMax')){
                $this->tableWhere['shutup_end_time'] = [
                    '<=',input('dateMax')
                ];
            }
            $data = $this->traitAdminTableQuery([
                [['user_id', ''], 'eq', 'user_id'],
                [['alias', ''], 'likeAll', 'alias']
            ], function () use ($model) {
                $this->checkEndTimeData();
                $model ->where('status',1)->where('shutup_end_time','>=',date('Y-m-d H:i:s'),time());
                return $model;
            }, $field, 'id desc');

            // 处理数据
            $userIds = $liveIds = [];
            foreach ($data['rows'] as $item) {
                $userIds[] = $item['user_id'];
                $liveIds[] = $item['id'];
            }

            $result = [];
            $action=[];
            foreach ($data['rows'] as $datum) {
                $action['action'] = '<a href="javascript:_edit('.$datum['id'].');">编辑</a>';
                $action['action'] .= ' | <a href="javascript:_del('.$datum['id'].');">删除</a>';

                $result[] = [
                    'id' => $datum['id'],
                    'user_id' => $datum['user_id'],
                    'alias' => $datum['alias'],
                    'shutup_time' => $datum['shutup_time'],
                    'shutup_start_time' => $datum['shutup_start_time'],
                    'shutup_end_time' => $datum['shutup_end_time'],
                    'action' => $action['action'],
                    'action_name' => $datum['action_name'],
                ];
            }

            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        }, function () {
//            $this->assign('openStatus', $openStatus);
//            $this->assign('statusHtml', $this->statusActionHtml(null));
        });
    }//

    public function checkEndTimeData(){
        $usermodel = new \app\admin\model\DarkRoom();
        $result = $usermodel
            ->where('status',1)
            ->where('shutup_end_time','<=',date('Y-m-d H:i:s',time()))
            ->field('id')
            ->select();
        if (count($result)>0){
            $item = [];
            foreach ($result as $k => $v){
                $item[] = $v['id'];
            }
            $del = $usermodel::destroy($item);
            if ($del){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    /**
     * 新增用户
     * @return mixed|\think\response\Json
     */
    public function add()
    {
        if (request()->isPost()){
            $model = new \app\admin\model\DarkRoom();
            $UserID = request()->param('UserID');
            $time = request()->param('time');
            $wtime = request()->param('wtime');
            $alias = request()->param('alias');
            request()->param('user_type') == '正式用户' ? $user_type = 1: $user_type = 2;

            $checkuser = $model -> where('user_id',$UserID)->field('user_id')->find();
            if (count($checkuser)>0) return $this -> errSysJson(['code'=>400],'用户已经存在');
            if (!empty($UserID) && !empty($time) && !empty($alias)){
                if ($time == 'dufault'){
                    if (empty($wtime)) return $this ->errSysJson(['code'=>400],'输入的时间不能为空！');
                    $shutupdata = [
                        'alias'=>$alias,
                        'user_id' =>$UserID,
                        'shutup_time'=> $wtime.'小时',
                        'shutup_start_time'=>date('Y-m-d H:i',time()),
                        'shutup_end_time'=>date('Y-m-d H:i',time()+60*60*$wtime),
                        'action_name' => $_SESSION['adminSess']['admin']['username'],
                        'status' => 1,
                        'user_type' =>$user_type,
                    ];
                }else{
                    $shutupdata = [
                        'alias'=>$alias,
                        'user_id' =>$UserID,
                        'shutup_time'=>$time>=100000 ? '永久':$time.'天',
                        'shutup_start_time'=>date('Y-m-d H:i',time()),
                        'shutup_end_time'=>date('Y-m-d H:i',time()+60*60*24*$time),
                        'action_name' => $_SESSION['adminSess']['admin']['username'],
                        'status' => 1,
                        'user_type' =>$user_type,
                    ];
                }

                $result = $model ->save($shutupdata);
                if ($result){
                    return $this ->sucSysJson(['code'=>200,'data'=>$result],'新增成功！');
                }else{
                    return $this ->errSysJson(['code'=>400],'新增失败！');
                }
            }
        }
        return $this->fetch();
    }

    /**
     * 检查是否有该用户并返回信息
     * @return \think\response\Json
     */
    public function checkUser()
    {
        if (request()->isPost())
        {
            $userid = request()->param('userid',null);
            if (empty($userid)||$userid==null)return $this -> errSysJson('请输入用户ID');
            $model = new \app\admin\model\User();
            $result = $model->where('user_id',$userid)->field('user_id,alias,user_type')->find();
            if (!empty($result) && count($result)>0)
            {
                $data = $result;
                $result['user_type'] != 1 ? $data['user_type'] = '马甲': $data['user_type'] = '正式用户';
                return $this ->sucSysJson($data,200);
            }else{
                return $this ->errSysJson('该用户不存在，请检查用户ID是否正确！');
            }
        }else{
            return $this -> errSysJson('提交方式错误');
        }
    }

    /**
     * 编辑用户
     * @return mixed|\think\response\Json
     */
    public function edit()
    {
        $midel = new \app\admin\model\DarkRoom();
        if (request()->isGet()){
            $id = trim(request()->param('id'));
            $result = $midel ->where('id',$id)->where('status',1)->find();
            $this->assign('info',$result);
        }elseif (request()->isPost()){
            $model = new \app\admin\model\DarkRoom();
            $UserID = request()->param('UserID');
            $time = request()->param('time');
            $wtime = request()->param('wtime');
            $alias = request()->param('alias');
            $user_type = request()->param('user_type',1);
            $checkuser = $model -> where('user_id',$UserID)->field('user_id')->find();
            if (count($checkuser)>0){
                if (!empty($UserID) && !empty($time) && !empty($alias)){
                    if ($time == 'dufault'){
                        if (empty($wtime)) return $this ->errSysJson(['code'=>400],'输入的时间不能为空！');
                        $shutupdata = [
                            'alias'=>$alias,
                            'shutup_time'=> $wtime.'小时',
                            'shutup_start_time'=>date('Y-m-d H:i',time()),
                            'shutup_end_time'=>date('Y-m-d H:i',time()+60*60*$wtime),
                            'action_name' => $_SESSION['adminSess']['admin']['username'],
                            'status' => 1,
                            'user_type' =>$user_type,
                        ];
                    }else{
                        $shutupdata = [
                            'alias'=>$alias,
                            'shutup_time'=>$time>=100000 ? '永久':$time.'天',
                            'shutup_start_time'=>date('Y-m-d H:i',time()),
                            'shutup_end_time'=>date('Y-m-d H:i',time()+60*60*24*$time),
                            'action_name' => $_SESSION['adminSess']['admin']['username'],
                            'status' => 1,
                            'user_type' =>$user_type,
                        ];
                    }
                    $result = $model ->save($shutupdata,['user_id'=>$UserID]);
                    if ($result){
                        return $this ->sucSysJson(['code'=>200,'data'=>$result],'修改成功！');
                    }else{
                        return $this ->errSysJson(['code'=>400],'修改失败！');
                    }
                }
            }else{
                return $this ->errSysJson(['code'=>400,'data'=>$checkuser],'无效用户！');
            }
        }
        return $this->fetch();
    }

    /**
     * 删除单个用户
     * @return \think\response\Json
     * @throws \think\Exception\DbException
     */
    public function del()
    {
        if (request()->isPost()){
            $id = trim(request()->param('id',null));
            if (empty($id)) return $this -> errSysJson('用户数据异常！');
            $model = new \app\admin\model\DarkRoom();
            $check = $model::get($id);
            if (empty($check) || count($check)<1) return $this -> errSysJson('该用户不存在！');
            $result = $model::destroy($id);
            if ($result){
                return $this->sucSysJson('','删除成功！');
            }else{
                return $this->errSysJson('删除失败请重新提交！');
            }
        }else{
            return $this->errSysJson('提交方式错误！');
        }
    }

    /**
     * 批量删除
     * @return \think\response\Json
     */
    public function arrayDel()
    {
        if (request()->isPost()){
            $ids = trim(request()-> param('ids',null));
            if (empty($ids)) return $this ->errSysJson('参数错误！');
            $model = new \app\admin\model\DarkRoom();
            if ($_SESSION['adminSess']['admin']['status'] == 1){
                $result = $model::destroy($ids);
                if ($result){
                    return $this->sucSysJson($result,'批量删除成功！');
                }else{
                    return $this->errSysJson('批量删除失败');
                }
            }else{
                return $this->errSysJson('管理员身份已失效');
            }
        }else{
            return $this->errSysJson('提交方式错误！');
        }
    }
}