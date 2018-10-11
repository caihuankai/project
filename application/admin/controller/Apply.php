<?php

namespace app\admin\controller;


class Apply extends App
{
    
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\changeTinyintController;
    
    
    /**
     * 待审核空间
     *
     * @param int $type 1为流量主， 2为空间
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function index($type = 1)
    {
        $type = intval($type);
        $model = new \app\admin\model\Apply();
        $list = $model->getStatusList();
        
        $this->setTableHeader([
                ['checkbox' => true, 'value' => 1,],
                'num' => '序号',
                'id' => 'ID',
                'pic' => '头像',
                'alias' => '昵称',
                'phone' => '手机',
                'updateTime' => '申请时间',
                'content' => '申请资料',
                'remark' => '备注',
                'status' => '状态',
                'action' => '操作',
            ])
            ->addChangeTinyintToolbarBtn('status')
            ->setSearch([
                [['options' => ['placeholder' => '昵称']], 'like', 'u.alias'],
                [['options' => ['placeholder' => '手机']], 'eq', 'a.phone'],
                [['options' => ['placeholder' => '开始时间']], 'dateMin-date', 'a.update_time'],
                [['options' => ['placeholder' => '结束时间']], 'dateMax-date', 'a.update_time '],
                [['options' => ['data' => array_merge(['0' => '状态'], $list)]], 'select', 'a.status', 'intval'],
            ]);
        
        
        return $this->traitAdminTableList(function ()use($model, $type){
            
            $field = 'a.id, a.status, a.phone, a.content, a.update_time, a.remark, u.user_id, u.alias, u.head_add';
                        
            $data = $this->traitAdminTableQuery([], function ()use ($model, $type){
                $model->alias('a');
                
                $model->join('user u', 'u.user_id = a.type_id and a.type = ' . $type);
                
                return $model;
            }, $field, 'a.update_time desc');
            
            $result = [];
            $i = 1;
            $tinyint = $model->getMysqlTinyint('status');
            $checkValue = $tinyint->getValueByActionValue('check');
            $ableValue = $tinyint->getValueByActionValue('able');
            $disableValue = $tinyint->getValueByActionValue('disable');
            
            foreach ($data['rows'] as $datum) {
                if ($datum['status'] == $checkValue){ // 待审核
                    $action = self::showOperate([
                        '通过' => [
                            'class' => $this->tableChangeTinyint,
                            'data-data' => ['ids' => $datum['id'], 'field' => 'status', 'value' => $ableValue],
                            'data-id' => $datum['id'],
                        ],
                        '拒绝' => [
                            'class' => $this->tableChangeTinyint,
                            'data-data' => ['ids' => $datum['id'], 'field' => 'status', 'value' => $disableValue],
                            'data-id' => $datum['id'],
                        ],
                    ]);
                }else{ // 不可修改状态
                    $action = self::showOperate([
                        '通过' => \helper\Html::createElement('span')->text('通过'),
                        '拒绝' => \helper\Html::createElement('span')->text('拒绝'),
                    ]);
                }
                
                $temp = [
                    'num'            => $i,
                    'id'             => $datum['id'],
                    'pic' => "<img width='90px' height='90px' src='{$datum['head_add']}' />",
                    'alias' => $datum['alias'],
                    'phone' => $datum['phone'],
                    'updateTime' => $datum['update_time'],
                    'content' => $datum['content'],
                    'remark' => "<pre>{$datum['remark']}</pre>",
                    'status' => $model->getStatusText($datum['status']),
                    'action'         => $action,
                ];
                
                if ($datum['status'] == 1){
                    $temp['status'] = $this->redSpan($temp['status']);
                }
                
                $result[] = $temp;
                
                ++$i;
            }
            
            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        });
    }
    
    
    /**
     * 不允许修改非待审核的
     *
     * @param $ids
     * @return bool
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function changeTinyintLocalFilterFunc(&$ids, $field, $value)
    {
        if ($field != 'status'){
            return false;
        }
        
        $model = $this->getCurrentModel();
        $data = $model->where(['id' => ['in', (array)$ids]])->field('id, type, type_id, status, phone')->select();
    
        /** @var \app\admin\model\User $userModel */
        $userModel = model('User');
        $typeTinyint = $model->getMysqlTinyint('type');
        $typeFlow = $typeTinyint->getValueByActionValue('flow');
        $typeLive = $typeTinyint->getValueByActionValue('live');
        $statusAble = $model->getMysqlTinyint('status')->getValueByActionValue('able');
        
        $filterIds = $flowUserIds = $liveUserIds = $liveUserData = [];
        foreach ($data as $item) {
            if ($item['status'] != 1){
                continue;
            }
            
            $filterIds[] = $item['id'];
            
            if ($item['type'] == $typeFlow){
                $flowUserIds[] = $item['type_id'];
                $userModel->handleSessionUserDataKeyMap($item['type_id'], true); // 只要改变状态都提示更新session
            }else if ($item['type'] == $typeLive){
                $liveUserIds[] = $item['type_id'];
                $liveUserData[$item['type_id']] = $item['phone'];
                $userModel->handleSessionUserDataKeyMap($item['type_id'], true);
            }
        }
        $ids = $filterIds;
    
        if (!empty($flowUserIds) && $statusAble == $value){ // 修改为流量主身份
            $userModel->update(['user_level' => 3], ['user_id' => ['in', $flowUserIds]]);
        }
        
        
        // 创建直播间
        if (!empty($liveUserIds) && $statusAble == $value){
            /** @var \app\admin\model\Live $liveModel */
            $liveModel = model('Live');
    
            // 第一个直播间分类
            $firstCateData = (new \app\admin\model\LiveCate())->getFirstFloorCate('id');
    
            if (empty($firstCateData['id'])) {
                $model->setError('直播间分类不存在');
                return false; // 不需要rollback，上面修改流量主依然执行
            }
            
            // 修改身份
            $userModel->update(['user_level' => 2], ['user_id' => ['in', $liveUserIds]]);
            
            // 创建直播间
            $liveUserIds = $liveModel->diffLiveUserIds($liveUserIds);
            $insertAll = [];
            $date = date('Y-m-d H:i:s');
            
    
            foreach ($liveUserIds as $userId) {
                $insertAll[] = [
                    'cid' => (int)$firstCateData['id'],
                    'user_id' => $userId,
                    'mobile_phone' => !empty($liveUserData[$userId]) ? $liveUserData[$userId] : '',
                    'create_time' => $date,
                ];
            }
    
            if (!empty($liveUserIds)) {
                // 创建
                $liveModel->insertAll($insertAll);
            }
        }
        
        return true;
    }
    
    
    /**
     * 保存备注
     *
     * @param $id
     * @param $remark
     * @return \think\response\Json
     * @author aozhuochao
     */
    public function saveRemark($id, $remark)
    {
        $model = $this->getCurrentModel();
        
        $remark = (new \voku\helper\AntiXSS())->xss_clean($remark);
        $model->update(['remark' => $remark], ['id' => $id]);
        
        return $this->sucSysJson(1);
    }
    
}