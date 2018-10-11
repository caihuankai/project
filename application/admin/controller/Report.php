<?php

namespace app\admin\controller;


/**
 * 举报管理
 *
 * @package app\admin\controller
 */
class Report extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable;
    
    public function index()
    {
    
        $this->setTableHeader([
            ['checkbox' => true, 'value' => 1,],
            ['field' =>'num', 'title' => '序号',],
            ['field' =>'ID', 'title' => 'ID',],
            ['field' =>'createTime', 'title' => '举报时间',],
            ['field' => 'informerName', 'title' => '举报人',],
            ['field' => 'defendantName', 'title' => '被举报对象'],
            ['field' => 'content', 'title' => '举报内容',],
            ['field' => 'status', 'title' => '状态',],
            ['field' => 'action', 'title' => '操作',],
        ])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');
    
    
        $model = new \app\admin\model\Report();
    
        return $this->traitAdminTableList(function ()use($model){
        
            $field = 'r.id, r.informer_id, r.defendant_id, r.content, r.status, r.create_time, u.alias name, c.class_name, 
                    CASE r.status WHEN 1 THEN 1 ELSE 0 END as untreated ';
        
            // 获取数据
            $data = $this->traitAdminTableQuery([
                [['informerName', ''], 'like', 'u.alias'],
                [['dateMin', ''], 'dateMin', 'r.create_time'],
                [['dateMax', ''], 'dateMax', 'r.create_time'],
                [['status/i', 0], 'eq', 'r.status'],
            ], function ()use ($model){
                return $model->alias('r')
                    ->join('user u', 'u.user_id = r.informer_id', 'left')
                    ->join('course c', 'c.id = r.defendant_id', 'left');
            }, $field, 'untreated desc, r.create_time desc');
        
        
            // 处理数据
            $result = $floorTemp = $twoTemp = [];
            $statusActionArr = $model->statusHtml;
            if (!empty($data['rows'])) {
                $i = 1;
                $CourseModel = new \app\admin\model\Course();
                foreach ($data['rows'] as $datum) {
                    if ($datum['status'] == 1){
                        $action = [
                            '处理' => $this->urlTab('客服管理', '举报管理', 'details', ['id' => $datum['id']]) . ' > 举报处理',
                            '忽略' => [
                                'class' => 'action-status-ignore',
                                'data-id' => $datum['id']
                            ],
                        ];
                    }else{
                        $action = [
                            '查看' => $this->urlTab('客服管理', '举报管理', 'details', ['id' => $datum['id']]) . ' > 举报查看',
                        ];
                    }
                    $action = self::showOperate($action);

                
                    $result[] = [
                        'num' => $i,
                        'ID' => $datum['id'],
                        'createTime' => $datum['create_time'],
                        'informerName' => \app\admin\model\UrlHtml::goUserDetailsUrl($datum['informer_id'], $datum['name']),
                        'defendantName' => \app\admin\model\UrlHtml::goCourseDetailsUrl($datum['defendant_id'], $datum['class_name']),
                        'content' => $datum['content'],
                        'status' => !empty($statusActionArr[$datum['status']]) ? $statusActionArr[$datum['status']] :
                            $statusActionArr[1],
                        'action' => $action,
                    ];
                
                    ++$i;
                }
            }
        
            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        }, function ()use($model){
            $statusHtml = ['状态', '未处理', '已忽略', '已处理'];
            $this->assign('statusHtml', $statusHtml);
        });
    }
    
    
    
    /**
     * 忽略
     *
     * @param $ids
     * @param $status
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function changeIgnoreStatus($ids)
    {
        $this->validateByName();
        
        $model = new \app\admin\model\Report();
        $model->update(['status' => 2], ['id' => is_array($ids) ? ['in', array_filter($ids)] : $ids]);
        
        return $this->sucSysJson(1);
    }
    
    
    /**
     * 举报处理和举报查看
     *
     * @param $id
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function details($id)
    {
        $this->validateByName('common.id', '', 'abortError');
        $id = (int)$id;
    
        $model = new \app\admin\model\Report();
        
        $request = $this->request;
        if ($request->isPost()){ // 保存
            $actionArr = $request->post('action/a', []);
            $actionSumArr = [];
            $result = $model->where(['id' => $id])->field('status, id, defendant_id')->find();
            if (!empty($result) && $result['status'] == 1){ // 未处理才保存
                /** @var \app\admin\model\Course $courseModel */
                $courseModel = model('admin/Course');
                // 执行操作
                foreach ($actionArr as &$item) {
                    if ($item == 1){ // 屏蔽该课程
                        $courseModel->closeStatus($result['defendant_id']);
                        
                        array_push($actionSumArr, 1);
                    }else if ($item == 2){ // 禁用直播间
                        $courseData = $courseModel->where(['id' => $result['defendant_id']])->field('live_id')->find();
                        !empty($courseData['live_id']) && (new \app\admin\model\Live())->closeStatus($courseData['live_id']);
                        
                        array_push($actionSumArr, 2);
                    }else if($item == 4){ // 禁用该用户
                        $courseData = $courseModel->where(['id' => $result['defendant_id']])->field('uid')->find();
                        !empty($courseData['uid']) && (new \app\admin\model\User())->closeStatus($courseData['uid']);
    
                        array_push($actionSumArr, 4);
                    }else{
                        unset($item);
                    }
                }
    
                $model->update(['status' => 3, 'result' => array_sum($actionSumArr), 'result_time' => date('Y-m-d H:i:s')], ['id' => $id]);
            }
            
            $this->redirect('index');
        }
        
    
        // 获取数据
        $data = $model->where(['r.id' => $id])
            ->field('r.id, r.informer_id, r.defendant_id, r.content, r.status, r.result, r.create_time, u.alias name, c.class_name')
            ->alias('r')
            ->join('user u', 'u.user_id = r.informer_id', 'left')
            ->join('course c', 'c.id = r.defendant_id', 'left')
            ->find();
    
        $tableHeader = '举报处理';
        if (!empty($data)) {
            $data['name'] = \app\admin\model\UrlHtml::goUserDetailsUrl($data['informer_id'], $data['name']);
            $data['class_name'] = \app\admin\model\UrlHtml::goCourseDetailsUrl($data['defendant_id'], $data['class_name']);
            $data['statusHtml'] = getDataByKey($model->statusHtml, $data['status'], 1);
            
            if ($data['status'] == 2 && empty($data['result'])){
                $tableHeader = '举报查看';
            }
        }else{
            $this->error('详情不存在');
        }
        
        
        $this->assign('tableHeader', $tableHeader);
        $this->assign('action', [
            1 => '屏蔽该课程',
            2 => '禁用直播间',
            4 => '禁用该用户',
        ]);
        $this->assign('data', $data);
        
        return $this->fetch();
    }
    
    
}