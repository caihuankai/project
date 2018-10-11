<?php

namespace app\admin\controller;


class UserAssistant extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\AdminTableToolbar,
    
        \app\admin\traits\UserController;
    
    public function index($userId)
    {
        $userId = intval($userId);
        $this->setTabNameThirdly('老师管理');
        
        $header = [
            ['checkbox' => true, 'value' => 1,],
            ['field' => 'num', 'title' => '序号',],
            ['field' =>'id', 'title' => 'ID',],
            ['field' => 'head_add', 'title' => '头像',],
            ['field' => 'alias', 'title' => '昵称（讲师）',],
            
            ['field' => 'statusText', 'title' => '状态',],
            'assistantUser' => '绑定者（助教）',
            ['field' => 'action', 'title' => '操作',],
        ];
        
        
        $search = [
            [['options' => ['placeholder' => '昵称（讲师）']], 'like', 'u.alias'],
            [['options' => ['placeholder' => 'ID']], 'eq', 'u.user_id'],
            [['options' => ['data' => ['状态', '绑定', '解绑']], 'name' => 'search-status'], 'select',],
        ];
        
        $this->setTableHeader($header)
            ->setSearch($search)
            ->addAdminTableToolbarButton('绑定', 'assistant-add', ['data-type' => 0, 'data-user-id' => $userId])
            ->addAdminTableToolbarButton('解除', 'assistant-del', ['data-type' => 1, 'data-user-id' => $userId]);
        
        
        return $this->traitAdminTableList(function ()use($userId){
            $searchStatus = $this->request->param('search-status', 0);
            $model = new \app\admin\model\User();
            $field = ['u.user_id', 'u.head_add', 'u.alias', 'uu.user_id assistantUserId', 'uu.alias assistantAlias', 'u.is_assistant'];

            
            $data = $this->traitAdminTableQuery([], function ()use($model, $userId, $searchStatus){
                $where = [
                    'u.user_level' => 2, 'u.freeze' => 0, 'u.user_id' => ['<>', $userId],
                ];
                if ($searchStatus == 1) { // 绑定
                    $where['ua.id'] = ['>', 0];
                } else if($searchStatus == 2) { // 解绑
                    $where['u.is_assistant'] = 2;
                    $model->where("not exists(select teacher_id from talk_user_assistant)");
                }
                
                $model->joinUserAssistant('ua', 'left');
                $model->join('user uu', 'uu.user_id = ua.user_id', 'left');
                
                return $model->where($where)->alias('u');
            }, $field, 'u.user_id desc');
            
            
            $result = $flowList = [];
            
            $i = 1;
            if (!empty($data['rows'])) {
                
                foreach ($data['rows'] as $datum) {
                    // 操作
                    $actionHtml = [
                        !empty($datum['assistantUserId']) ? $this->redSpan('解除') : ($datum['is_assistant'] ==  2 ? '绑定' : '') =>[
                            'class' => 'handle-assistant',
                            'data-type' => intval(!empty($datum['assistantUserId'])),
                            'data-user-id' => $userId,
                            'data-teacher-id' => $datum['user_id'],
                        ],
                    ];
                    $actionHtml = self::showOperate($actionHtml);
                    
                    $userHead = $model->disUserHead($datum['head_add']);
                    $result[] = [
                        'num' => $i,
                        'id' => $datum['user_id'],
                        'head_add' => "<img src='{$userHead}' title='{$datum['alias']}头像' style='width: 50px; height: 50px;' />",
                        'alias' => \app\admin\model\UrlHtml::goUserDetailsUrl($datum['user_id'], $datum['alias']),

                        'statusText' => !empty($datum['assistantUserId']) ? '绑定' : '解除',
                        'assistantUser' => !empty($datum['assistantUserId']) ?
                            \app\admin\model\UrlHtml::goUserDetailsUrl($datum['assistantUserId'], $datum['assistantAlias']) : '',
                        
                        'action' => $actionHtml,
                    ];
                    
                    ++$i;
                }
            }
            
            
            return $this->sucJson(['rows' => $result, 'total' => $data['total']]);
        });
    }
    

    
    
    /**
     * 处理绑定和解除
     * 1、只有老师才能成为助教
     * 2、助教不能被绑定
     * 3、被绑定的老师不能成为助教，即不能绑定其他老师
     * 4、老师只能被一个助教绑定
     *
     * @param int $type 0为绑定，1为解除
     * @param $userId
     * @param $teacherId
     * @return \think\response\Json
     * @author aozhuochao
     */
    public function handleAssistant($teacherIds)
    {
        $type = $this->request->post('type/i', 0); // 1为解绑，0为绑定
        $userId = $this->request->post('userId/i', 0);
        $this->validateByName('common.ids', '', 'errSysJson', ['ids' => $teacherIds]);
        $teacherIds = (array)$teacherIds;
        $teacherIds = array_diff($teacherIds, [$userId]);
        if (empty($userId) || empty($teacherIds)) {
            return $this->errSysJson(\app\common\controller\JsonResult::ERR_PARAMETER);
        }
    
        /** @var \app\admin\model\UserAssistant $model */
        $model = $this->getCurrentModel();
        $userModel = new \app\admin\model\User();
        
        // 当前用户
        $userData = getDataByKey($userModel->getUserColumn((array)$userId, 'user_id, freeze, is_assistant'), $userId, []);
    
        if (empty($userData)) { // 当前用户不存在
            return $this->errSysJson(\app\common\controller\JsonResult::ERR_USERINFO_NULL);
        }
        
        // 检测老师是否正确，是否是老师（只有绑定才要考虑用户状态）
        $teacherUserData = $userModel->alias('u')
            ->where(['user_id' => ['in', $teacherIds], 'user_level' => 2])
            ->field('user_id, is_assistant, freeze')->fetchClass('\CollectionBase')->select();
        $teacherIds = $teacherUserData->column('user_id');
        if (empty($teacherIds)) { // 被过滤
            return $this->sucSysJson(1);
        }
        
        $assistantData = $model->where(['teacher_id' => ['in', array_merge($teacherIds, [$userId])]])->field('id, teacher_id, user_id')->select();
    
        $assistantDataIds = $assistantDataUserIds = $assistantDataTeacherIds = $assistantDataTeacherData = [];
        foreach ($assistantData as $item) {
            if ($item['teacher_id'] != $userId){
                $assistantDataIds[] = $item['id'];
                $assistantDataUserIds[] = $item['user_id'];
            }
            
            $assistantDataTeacherIds[$item['teacher_id']] = $item['teacher_id'];
            $assistantDataTeacherData[$item['teacher_id']] = $item;
        }
        
        if ($type == 1 && !empty($assistantDataIds)){ // 解绑
            $model->where(['id' => ['in', $assistantDataIds]])->delete();
    
            // 更新所有被解绑讲师的用户的助教身份字段
            $diffNoAssistantUserIds = $model->diffNoAssistant($assistantDataUserIds);
    
            if (!empty($diffNoAssistantUserIds)) { // 取消助教身份
                $userModel->update(['is_assistant' => 2], ['user_id' => ['in', $diffNoAssistantUserIds]]);
                foreach ($diffNoAssistantUserIds as $item) { // 取消助教身份
                    $userModel->handleSessionUserDataKeyMap($item, true);
                }
            }

            
        }else{ // 绑定
            if (isset($assistantDataTeacherIds[$userId])){
//                return $this->errSysJson("当前用户已被助教ID：{$assistantDataTeacherData[$userId]['user_id']}绑定");
                return $this->errSysJson("你已被{$assistantDataTeacherData[$userId]['user_id']}（助教）绑定，无法绑定其他讲师");
            }
            
            $teacherIds = [];
            foreach ($teacherUserData as $teacherUserDatum) {
                if (
                    $teacherUserDatum['freeze'] == 0 &&
                    $teacherUserDatum['is_assistant'] == 2 && // 过滤掉已经是助教的老师
                    !isset($assistantDataTeacherIds[$teacherUserDatum['user_id']]) // 过滤已经被绑定的老师
                ){
                    $teacherIds[] = $teacherUserDatum['user_id'];
                }
            }
            if (empty($teacherIds)) {
                return $this->sucSysJson(1);
            }
            $save = [];
            foreach ($teacherIds as $item) {
                $save[] = [
                    'user_id' => $userId,
                    'teacher_id' => $item,
                ];
            }
            
            $model->insertAll($save);
            
            if ($userData['is_assistant'] == 2){
                $userModel->update(['is_assistant' => 1], ['user_id' => $userId]);
                $userModel->handleSessionUserDataKeyMap($userId, true);
            }
        }
    
        return $this->sucSysJson(1);
    }
    
}