<?php
namespace app\admin\controller;
use think\Db;
use think\Request;
use think\config;

class User extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status;

    public function _empty($name) 
    {
        echo '找不到对应方法:'.$name;
    }

    /**
     * 后台用户管理--人员列表
     * @return mixed|\think\response\Json
     */
    public function index()
    {
        $statusArr = [0 => '状态', 1 => '启用', 2 => '停用'];
        $statusText = ['启用', '停用'];
        $statusHtml = [
            '<font color="red">'. $statusText[1] .'</font>',
            '<font color="green">'. $statusText[0] .'</font>',
        ];
        if(request()->isPost())
        {
            $request = Request::instance();
            $page = $request->post("pageNumber");
            $pageSize = $request->post("pageSize");
            $order = $request->post("order");
            $status = $request->post('status');
            $orderName = $request->post("orderName",'id');

            $userName = "%".$request->post("username",'')."%";
            $email = "%".$request->post("email",'')."%";
            $datemin = $request->post("datemin");
            $datemax = $request->post("datemax");
            $groupId = $request->post("groupId",'');

            $groupSql = "";
            if($groupId!=null&&$groupId!='')
            {
                $groupSql = " and group_id = ".$groupId;
            }
            $statusSql = $status < 1 ? '' : ' and a.status = ' . ($status == 1 ? '1' : '0'); // 用户状态的搜索条件

            $datemin = ($datemin==""||$datemin==null)?strtotime("2000/1/1"):strtotime($datemin." 00:00:00");
            $datemax = ($datemax==""||$datemax==null)?strtotime("2030/1/1"):strtotime($datemax." 23:59:59");

            $where = 'date_time between '.$datemin .' and '. $datemax . ' and username like "'.$userName.'" and email like "'.$email.'"'.$groupSql . $statusSql;
            $countArr = Db::table(config('database.prefix').'admin')->alias('a')->join(config('database.prefix').'group b','b.id= a.group_id','left')
                ->where($where)
                ->count();

            $returnArr = Db::table(config('database.prefix').'admin')->field('a.id,a.username,a.email,a.date_time,a.status,a.bind_user_id,b.name as group_name')
                ->alias('a')->join(config('database.prefix').'group b','b.id= a.group_id','left')
                ->where($where)
                ->order($orderName.' '.$order)->limit((($page-1)*$pageSize),$pageSize)->select();
            $bindUserIdList = $userAliasList = [];
            foreach ($returnArr as $data) {
            	$bindUserIdList[] = $data['bind_user_id'];
            }
            if (!empty($bindUserIdList)) {
            	$model = new \app\admin\model\User();
            	$userAliasList = $model->where('user_id', 'in', $bindUserIdList)->column('alias', 'user_id');
            }

            $i = 1;
            foreach($returnArr as $key=>$data){
                $returnArr[$key]['num'] = $i;
                $returnArr[$key]['status'] = $data['status'];
                $returnArr[$key]['statusText'] = $data['status'] == 1 ? $statusHtml[1] : $statusHtml[0];

                $returnArr[$key]['date_time'] = date("Y-m-d H:i:s",$data['date_time']);
                
                $returnArr[$key]['bindUserAlias'] = isset($userAliasList[$data['bind_user_id']]) ? $userAliasList[$data['bind_user_id']] : '';

                $operate = [
                    '编辑' => "javascript:member_edit(".$data['id'].")",
                    '修改密码' => "javascript:changePassword('". url('changePwd', ['id' => $data['id']]) ."')",
//                    '分配组' => "javascript:dealGroup('single','".$data['id']."')",
                    getDataByKey($statusText, $data['status'], 1) => "javascript:changeStatus('".$data['id']."', ".intval(!$data['status']).", this)",
                    getDataByKey($statusText, $data['status'], 1) => [
                        'data-ids' => $data['id'],
                        'data-status' => intval(!$data['status']),
                        'class' => 'changeStatus',
                    ],
                    '删除' => "javascript:member_del('".$data['id']."')",
                ];
                
                if (!empty($data['bind_user_id'])) {
                	$operate = ['<span class=\'c-red\'>解除绑定</span>' => "javascript:member_reset(".$data['id'].")"] + $operate;
                }else {
                	$operate = ['绑定前台用户' => "javascript:member_bind(".$data['id'].")"] + $operate;
                }
                
                $returnArr[$key]['operate'] = self::showOperate($operate);
                ++$i;
            }

            $data = array('rows'=>$returnArr,'total'=>$countArr);
            return $this->ret($data,'',true);
        }
        $groupArr = Db::table(config('database.prefix').'group')->where('status = 1')->select();
        
        $this->assign('statusArr', $statusArr);
        $this->assign('statusText', $statusText);
        $this->assign('statusHtmlJson', json_encode($statusHtml));
        $this->assign('groupInfo',   $groupArr);
        
        return $this->fetch('userlist');
    }

    /**
     * 增加用户
     * @return mixed|\think\response\Json
     */
    public function useradd()
    {
        if(request()->isPost()){
            $param = input('post.');
            $param['status'] = isset($param['status']) ? 1 : 0;
            $param['date_time']=time();
            $param['key'] = rand(1,255);
            $param['password'] = md5($param['password'].App::PASSWORD_KEY.$param['key']);
            $objModel      = new \app\admin\model\Admin();
            $flag          = $objModel->insert($param);
            return $this->ret([],$flag['msg']);
        }
        $groupArr = Db::table(config('database.prefix').'group')->where('status = 1')->select();
        $this->assign('groupInfo',   $groupArr);
        return $this->fetch();
    }

    /**
     * 编辑用户
     * @return mixed|\think\response\Json
     * @hide
     */
    public function useredit()
    {
        if(request()->isPost()){
            $param = input('post.');
            $param['status'] = isset($param['status']) ? 1 : 0;
            $objModel      = new \app\admin\model\Admin();
            $flag          = $objModel->edit($param);
            return $this->ret([],$flag['msg']);
        }

        $groupArr = Db::table(config('database.prefix').'group')->where('status = 1')->select();
        $this->assign('groupInfo',   $groupArr);

        $id = input('param.id');
        $userInfo = \app\admin\model\Admin::getUserInfo($id);
        $this->assign('userInfo',   $userInfo);
        return $this->fetch();
    }

    /**
     * 删除用户 可批量
     * @return \think\response\Json
     * @hide
     */
    public function del()
    {
        $id = input('param.id');
        $objModel = new \app\admin\model\Admin();
        $flag = $objModel->del($id);
        return $this->ret([],$flag['msg']);
    }

    /**
     * 批量分配权限
     * @hide
     */
    public function dealGroup()
    {
        if(request()->isPost()){
            $param = input('post.');
            $ids = $param['ids'];
            $groupid = $param['group_id'];

            $objModel = new \app\admin\model\Admin();
            $flag = $objModel->dealGroup($ids,$groupid);
            return $this->ret([],$flag['msg']);
        }
        $groupArr = Db::table(config('database.prefix').'group')->where('status = 1')->select();
        $this->assign('groupInfo',   $groupArr);
        return $this->fetch();
    }

    /**
     * 绑定前台用户
     * @name  bind
     * @return mixed
     * @author Lizhijian
     */
    public function bind(){

        $id = input('id');

        if(request()->isPost()){

            $userid = input('userid');

            //检查用户ID是否正确
            $has = Db::table('talk.talk_user')->where('user_id', $userid)->where('user_level = 2 or is_assistant = 1')->value('user_id');
            if(!$has){
                return json([
                    'code' => 201,
                    'data' => '',
                    'msg'  => '用户不存在或用户不是讲师或助教',
                ]);
            }
            //入库
            $data = [
                'bind_user_id' => $userid
            ];
            $objModel = new \app\admin\model\Admin();
            $objModel->where('id', $id)->update($data);

            return $this->ret([],'绑定成功！');
        }else{
            $user_id = Db::table('talk_admin.talk_admin')->where('id', $id)->value('bind_user_id');

            $this->assign('id',   $id);
            $this->assign('user_id',   $user_id);
            return $this->fetch();
        }
    }
    
    public function bindReset(){
    	$id = input('id');
    	
    	$objModel = new \app\admin\model\Admin();
    	$objModel->where('id', $id)->update(['bind_user_id' => 0]);
    	return $this->sucSysJson('解除绑定成功');
    }


    /**
     * 修改密码
     * @hide
     */
    public function changePwd()
    {
        if(request()->isPost()){
            $param = input('post.');
            $newParam = array('id'=>$param['id'],'password'=>md5($param['password'].App::PASSWORD_KEY.$param['key']));
            $objModel      = new \app\admin\model\Admin();
            $flag          = $objModel->edit($newParam,false);
            return $this->ret([],'修改密码成功');
        }

        $id = input('param.id');
        $isShowCancelBtn = true;
        if (empty($id)) {
        	$id = $this->getAdminId();
        	$isShowCancelBtn = false;
        }
        $userInfo = \app\admin\model\Admin::getUserInfo($id);
        $this->assign('userInfo', $userInfo);
        $this->assign('isShowCancelBtn', $isShowCancelBtn);
        return $this->fetch();
    }
    
    
    /**
     * 修改用户状态
     *
     * @param $ids
     * @param $status
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function changeStatus($ids, $status)
    {
        $this->validateByName();
        
        $model = new \app\admin\model\Admin;
        $model->update(['status' => (int)$status], ['id' => is_array($ids) ? ['in', array_filter($ids)] : $ids]);
        
        return $this->sucSysJson(1);
    }


    /**
     * 用户的收藏列表
     * @name  keepList
     * @param int $userId
     * @return mixed
     * @author Lizhijian
     */
    public function keepList($userId){

        request()->route(['tabName1' => '用户管理 ', 'tabName2' => '用户列表 > 用户详情']);

        $this->setTabNameThirdly('收藏列表');//第三个导航栏名称

        //1. 设置表头
        $header = [//设置行信息
            ['checkbox' => true, 'value' => 1,],
            'num' => '序号',
            'id' => 'ID',
            'class_name' => '名称',
            'type' => '类型',
            'keep_time' => '收藏时间',
            'status' => '状态',
            'action' => '操作',
        ];
        $this->setToolbarId('table-button-html');
        $this->setTableHeader($header)->setStatusTitle('显示', '屏蔽');

        $model = new \app\admin\model\CourseKeep();
        return $this->traitAdminTableList(function () use ($userId, $model) {
            $field = 'k.*,c.id, c.class_name,c.begin_time,c.study_num,c.open_status,c.pid,c.type';

            //获取总数据
            $data = $this->traitAdminTableQuery([], function () use ($userId, $model) {//表单查询

                $model->alias('k');
                $model->join('course c', 'k.course_id = c.id', 'left');
                $model->where("user_id = {$userId}");
                return $model;
            }, $field, 'keep_time desc');

            //循环构造每一行的格式数据
            $result = [];
            $i = 1;
            $recommendModel = new \app\admin\model\IndexRecommend();

            foreach ($data['rows'] as $datum) {

                $action = self::showOperate([
                    '详情' => $this->urlTab('收藏列表', '单次课程详情', 'course/details',  ['id' => $datum['id']]),
                    $this->statusActionHtml($datum['open_status']) => [
                        'class'       => 'action-status',
                        'data-ids'    => $datum['id'],
                        'data-status' => $this->getStatusHtmlDataAttr($datum['open_status']),
                    ],
                    '推荐'  => [
                        'class'    => 'action-recommend',
                        'data-id' => $datum['id'],
                        'data-id-type' => 'courseList',
                        'data-disabled-list' => $recommendModel->getTypeSelectMap('courseList'),
                    ],
                    '评论列表' => $this->urlTab('课程管理', '单次课程列表', '/CourseComment/index', ['id' => $datum['id'],'courseName' => $datum['class_name']])
                ]);

                //一行数据
                $TEMP = [
                    'num' => $i,
                    'id' => $datum['id'],//课程ID
                    'class_name' => $datum['class_name'],//课程名称
                    'type' => ($datum['pid'] || 2 == $datum['type'])? '系列课':'单节课',//类型
                    'keep_time' => $datum['keep_time'],//创建时间
                    'status' => 1 == $datum['open_status']? '显示':'屏蔽',//状态
                    'action' => $action,
                ];

                $result[] = $TEMP;
                ++$i;
            }

            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        }, function (){

            $this->assign('tableOtherHtml', $this->tableOtherHtml); // 需要更新
            $this->assign('actionStatusHtml', $this->statusActionHtml(null));
        });
    }
}
