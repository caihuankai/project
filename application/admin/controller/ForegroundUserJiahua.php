<?php

namespace app\admin\controller;


class ForegroundUserJiahua extends App
{
    
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\ImgReset,
        \app\admin\traits\Status,
        \app\admin\traits\userNav;
    
    
    /**
     * @param int $type 1为用户列表，2为流量主列表
     * @param int $action 1为普通列表，2为新增列表（有用于首页推荐新增）
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     * @internal $actionParam 给action的get参数
     */
    public function index()
    {
        $this->setStatusValue(0, 1);
        
        $model = new \app\admin\model\UserJiahua();
        $header = [
            ['checkbox' => true, 'value' => 1,],
            ['field' => 'num', 'title' => '序号',],
            ['field' =>'id', 'title' => 'ID',],
            ['field' => 'head_add', 'title' => '头像',],
            ['field' => 'alias', 'title' => '昵称',],
        	['field' => 'user_level', 'title' => '角色',],
        	['field' => 'last_login_time', 'title' => '登录时间',],
            ['field' => 'statusText', 'title' => '状态',],
            ['field' => 'action', 'title' => '操作',],
        ];
        $search = [
            [['options' => ['placeholder' => '昵称']], 'like', 'alias'],
            [['options' => ['placeholder' => '用户ID']], 'eq', 'user_id'],
            [['options' => ['placeholder' => '开始时间']], 'dateMin-date', 'last_login_time '],
            [['options' => ['placeholder' => '结束时间']], 'dateMax-date', 'last_login_time'],
        		[['options' => ['data' => ['角色', '学生', '讲师', '助教']], 'name' => 'table-search-role'], 'select', 'user_level'],
            [['options' => ['data' => ['-1' => '状态'] + $this->searchStatusArr()]], 'select-zero', 'freeze', 'intval'],
        ];
        
        $this->setTableHeader($header)->setSearch($search)->setToolbarId('table-button-html');
        
        
        return $this->traitAdminTableList(function ()use($model){
            $field = 'user_id, head_add, alias, user_level, last_login_time, freeze';
            $order = 'last_login_time desc, user_id desc';
            
            $data = $this->traitAdminTableQuery([], function ()use($model){
                return $model->where(['user_id' => ['>', 0]]);
//                 ->where('groupid', 0)
            }, $field, $order, 'DISTINCT user_id');

            
            $result = $flowList = [];
            
            $i = 1;
            if (!empty($data['rows'])) {
                
                foreach ($data['rows'] as $datum) {
                	$actionHtml = [
                			'设置' => [
                					'class' => 'set-user-role',
                					'data-id' => $datum['user_id'],
                			],
                			$this->statusActionHtml($datum['freeze']) => [
                					'class' => 'changeFreeze',
                					'data-ids' => $datum['user_id'],
                					'data-status' => intval(!$datum['freeze'])
                			],
                	];
                    $actionHtml = self::showOperate($actionHtml);
                    
                    $userHead = $model->disUserHead($datum['head_add']);
                    $result[] = [
                        'num' => $i,
                        'id' => $datum['user_id'],
                        'head_add' => "<img src='{$userHead}' title='{$datum['alias']}头像' style='width: 50px;' />",
                        'alias' => $datum['alias'],
                        'user_level' => $model->getUserLevelText($datum['user_level']),
                        'last_login_time' => $datum['last_login_time'], // 关注时间
                        'statusText' => $this->statusColumnHtml($datum['freeze']),
                        'freeze' => $datum['freeze'],
                        'action' => $actionHtml,
                    ];
                    
                    ++$i;
                }
            }
            
            
            return $this->sucJson(['rows' => $result, 'total' => $data['total']]);
        }, function (){
            $this->assign('freezeHtml', $this->statusActionHtml(null));
        });
    }
    
    /**
     * 修改用户角色
     * @param unknown $userId
     * @param unknown $userLevel
     * @return \think\response\Json
     */
    public function changeUserLevel($userId, $userLevel = 1)
    {
    	$request = $this->request;
    	$model = new \app\admin\model\UserJiahua();
    	if ($request->isPost()) {
    		if (!empty($userId)) {
    			$model->where('user_id', $userId)->update(['user_level'=>$userLevel]);
    		}
    		
    		return $this->sucSysJson('修改成功');
    	}else {
    		$userInfo = $model->get(['user_id'=>$userId]);
    		$this->assign('userLevel', $userInfo['user_level']);
    		$this->assign('userLevelArr', $model->getUserLevelText(null));
    	}
    	
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
    public function changeFreeze($ids, $status)
    {
        if (!empty($ids)) {
            $status = (int)$status;
            $ids = (array)$ids;
            $model = new \app\admin\model\UserJiahua();
            $model->closeStatus($ids, $status);
            
            // 处理前台的用户登录状态
            foreach ($ids as $id) {
                $model->handleWeChatCheckUserStatus($id, $status);
            }
        }
        
        return $this->sucSysJson(1);
    }
    
}