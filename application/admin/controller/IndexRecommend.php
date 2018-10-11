<?php

namespace app\admin\controller;


use app\common\controller\JsonResult;

class IndexRecommend extends App
{
    
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\changeTinyintController;
    
    
    
    /**
     * 首页推荐列表
     *
     * @param int $type 1为明星流量主（用户id），2为精品课程（课程id），3为名师推荐（空间id），4为深度阅读（观点id），5为人气直播（用户id）
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function index($type = 1)
    {
        $type = intval($type);
        $model = new \app\admin\model\IndexRecommend();
        $statusTinyint = $model->getMysqlTinyint('status');
        $typeTinyint = $model->getMysqlTinyint('type');
        if (!$typeTinyint->existsValue($type)) {
            $type = 1;
        }
        
        $statusList = $statusTinyint->getList();
        $thName = $typeTinyint->get($type, '', 'th_name');
        // todo 待优化   改到model中
        $header = [
            ['checkbox' => true, 'value' => 1,],
            'num' => '序号',
            'id' => 'ID',
            'th_pic' => $typeTinyint->get($type, '', 'th_pic'), // 图片
            'th_name' => $thName,
            'th_theme' => '主题',
            'th_inc' => $typeTinyint->get($type, '', 'th_inc'), // 收益百分比
            'th_recommendNum' => '（推荐／总）点击量',
            'th_createTime' => '添加时间',
            'th_status' => '状态',
            'th_adminName' => '操作人',
            'th_sort' => '排序',
            'th_action' => '操作',
        ];
        $addButton = true;
        $addButtonUrl = $field = '';
        switch ($type){
            case 1:
                $field .= ', u.alias name';
                break;
            case 2: // 精品课程
                unset($header['th_pic']);
                $field .= ', c.class_name name, c.id courseId, c.study_num allClick';
                $addButtonUrl = url('Course/index', ['action' => 2, 'actionParam' => 2]);
                break;
            case 3: // 名师推荐
                $field .= ', u.alias name, u.user_id userId';
                $addButtonUrl = url('ForegroundUser/index', ['action' => 2, 'actionParam' => 3]) . '?table-search-exists-live=1';
                break;
            case 4:
                $field .= ', v.title name';
                break;
            case 5:
                $addButton = false;
                unset($header['th_inc']);
                break;
        }
    
        $addButton && $this->addAdminTableToolbarButton('新增', 'add');
        $this->setTableHeader($header)
            ->addAdminTableToolbarButton('移除', 'del')
            ->addChangeTinyintToolbarBtn('status')
            ->setSearch([
                [['options' => ['placeholder' => $thName]], 'like', 'ir.name'],
                [['options' => ['placeholder' => '开始时间']], 'dateMin-date', 'ir.create_time'],
                [['options' => ['placeholder' => '结束时间']], 'dateMax-date', 'ir.create_time '],
                [['options' => ['data' => array_merge(['0' => '状态'], $statusList)]], 'select', 'ir.status', 'intval'],
            ]);
        
        
        return $this->traitAdminTableList(function ()use($model, $type, $field){
            
            $field = 'ir.id, ir.type, ir.type_id, ir.type_inc, ir.click_num, ir.status, ir.pic, ir.admin_id, ir.sort, ir.name, ir.create_time, ir.theme' . $field;
            
            $data = $this->traitAdminTableQuery([], function ()use ($model, $type){
                $model->alias('ir');
                $model->where(['ir.type' => ['eq', $type]]);

                $model->joinSwitch($type);

                
                return $model;
            }, $field, 'ir.sort asc, ir.id desc');
            
            $result = $adminIds = $userIds = [];
            $i = 1;
            $statusTinyint = $model->getMysqlTinyint('status');
            $typeTinyint = $model->getMysqlTinyint('type');
    
            foreach ($data['rows'] as $row) {
                if ($typeTinyint->ifActionTrue($row['type'], 'ifUserId')) { // 手机用户id
                    $userIds[] = $row['type_id'];
                }
                $adminIds[] = $row['admin_id'];
            }
    
            $adminData = (new \app\admin\model\Admin())->getAdminName($adminIds);
            if ($type == 3){
                $liveClickMap = (new \app\common\model\HitRecord())->countLiveByUserId($userIds);
            }
            
            
            foreach ($data['rows'] as $datum) {
                $picHtml = $this->getTableColumnImgHtml($datum['pic']);
                // 总点击量
                $allClick = 0;
                if ($type == 2){ // 精品课程
                    $datum['name'] = !empty($datum['name']) ? \app\admin\model\UrlHtml::goCourseDetailsUrl($datum['courseId'], $datum['name']) : '';
                    $allClick = (int)$datum['allClick'];
                }else if ($type == 3){ // 名师推荐
                    $allClick = !empty($liveClickMap[$datum['type_id']]) ? $liveClickMap[$datum['type_id']] : 0;
                    $picHtml = $this->getTableColumnImgHtml($datum['pic'], $datum['name'], '120px');
                    $datum['name'] = \app\admin\model\UrlHtml::goUserDetailsUrl($datum['userId'], $datum['name']);
                }
                
                
                $action = self::showOperate([
                    '编辑' => [
                        'class' => 'action-edit',
                        'data-id' => $datum['id'],
                        'data-theme' => $datum['theme'],
                    ],
                    '移除' => [
                        'data-ids' => $datum['id'],
                        'class' => 'action-del',
                    ],
                    $statusTinyint->getNextValueByValue($datum['status'], 'next', 'columnHtml') => [
                        // todo 待将当期数组封装为方法
                        'class' => $this->tableChangeTinyint,
                        'data-data' => [
                            'ids' => $datum['id'], 'field' => 'status', 'value' => $statusTinyint->getNextValueByValue($datum['status'])
                        ],
                    ],
                ]);
                /** @var \helper\Html $input */
                $input = \helper\Html::createElement('input')->set('type', 'text')->setData('id', $datum['id']);
                $incInput = clone $input;
                $sortInput = clone $input;
                
                $temp = [
                    'num' => $i,
                    'id' => $datum['id'],
                    'th_pic' => $picHtml, // 图片
                    'th_name' => $datum['name'],
                    'th_theme' => isset($datum['theme'])? $datum['theme']:'',
                    'th_inc' => $incInput->addClass('edit-inc')->set('value', $datum['type_inc'] . '%')->setData('field', 'type_inc'), // 收益百分比
                    'th_recommendNum' => $datum['click_num'] . '/' . $allClick,
                    'th_createTime' => $datum['create_time'],
                    'th_status' => $statusTinyint->get($datum['status'], '', 'columnHtml'),
                    'th_adminName' => getDataByKey($adminData, $datum['admin_id'], ''),
                    'th_sort' => $sortInput->addClass('edit-sort')->set(['value' => $datum['sort'], 'size' => 10])->setData('field', 'sort'),
                    'th_action' => $action,
                ];
                
                $result[] = $temp;
                
                ++$i;
            }
            
            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        }, function ()use($type, $addButtonUrl){
            $this->assign('getType', $type);
            $this->assign('addButtonUrl', $addButtonUrl);
        });
    }
    
    
    /**
     * 编辑和新增
     *
     * @param     $type
     * @param int $id
     * @return mixed|\think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function edit($type, $id = 0, $theme = '')
    {
        $id = intval($id);

        $data = [];
        $model = new \app\admin\model\IndexRecommend();
        $statusTinyint = $model->getMysqlTinyint('status');
        JsonResult::setMsgArgs(JsonResult::ERR_MSG_NOT_EXISTS, '数据');
        $errMsg = JsonResult::getMsg(JsonResult::ERR_MSG_NOT_EXISTS);
        $nameHtmlType = $linkHtmlType = 'input';
        $nameBool = $linkBool = $typeIncBool = $picBool = $textBool = true;
    
    
        if (empty($id)) { // 没有新增这个功能
            $this->abortError($errMsg);
        }
        
        if ($id){
            $data = $model->where(['id' => ['eq', $id]])->find();
        
            if (empty($data)) {
                $this->abortError($errMsg);
            }
        

            switch ($data['type']){
                case 1:
                    $textBool = false;
                    break;
                case 2: // 精品课程
                    $courseData = $this->getCourseResultAutoThrow($data['type_id'], 'id, class_name, uid, status, open_status');
                    $data['name'] = $courseData['class_name'];
                    $data['link'] = \app\common\model\RedirectUrl::getCourseUrl($courseData['id']);
                    $nameHtmlType = $linkHtmlType = 'text';
                    $picBool = $textBool = false;
                    
                    break;
                case 3: // 名师推荐
                    $liveModel = new \app\admin\model\Live();
                    $liveData = $liveModel->joinUser()->alias('l')->field('u.alias, u.user_id')->where(['l.id' => $data['type_id']])->find();
                    if (empty($liveData)) {
                        $this->abortError($errMsg);
                    }
                    $data['name'] = $liveData['alias'];
                    $data['link'] = \app\common\model\RedirectUrl::getMyInfoUrl($liveData['user_id']);
                    $nameHtmlType = $linkHtmlType = 'text';
                    $textBool = false;
                
                    break;
                case 4: // 深度阅读
                    $textBool = false;
                    break;
                case 5: // 人气直播
                    $typeIncBool = false;
                    break;
                default:
                    $this->abortError(JsonResult::ERR_PARAMETER);
                    break;
            }
        }
        
        $this->addQiNiuWebUploader();
        
        $request = $this->request;
        if ($request->isPost()){
            $xss = new \voku\helper\AntiXSS();
            $typeId = $request->post('typeId/i', 0);
            $typeInc = number_format((float)$request->post('typeInc', 0), 2, '.', '');
            $name = $xss->xss_clean($request->post('name', ''));
            $theme = $xss->xss_clean($request->post('theme', ''));
            $link = $xss->xss_clean($request->post('link', ''));
            $pic = $xss->xss_clean($request->post('pic', ''));
            $sort = $request->post('sort/i', '1');
            $status = $request->post('status/i', '1');

            if ($sort < 1 || !$statusTinyint->existsValue($status)){
                return $this->errSysJson(JsonResult::ERR_PARAMETER);
            }
            $save = [
                'type' => $type,
                'type_id' => $typeId,
                'admin_id' => $this->getAdminId(),
            ];
            !empty($typeInc) && $save['type_inc'] = $typeInc;
            !empty($sort) && $save['sort'] = $sort;
            !empty($theme) && $save['theme'] = $theme;
            !empty($link) && $save['link'] = $link;
            !empty($name) && $save['name'] = $name;
            !empty($pic) && $save['pic'] = $pic;
            
            if (empty($data)){ // 插入
                if ($model->addData($type, $typeId, $save) !== false) {
                    $this->abortError($model->getError());
                }
                
            }else{ // 更新
                $save['status'] = $status;
                unset($save['type'], $save['type_id']);
                $model->update($save, ['id' => $data['id']]);
            }
            
            return $this->sucSysJson(1);
        }
    

        $form = \helper\FormHtml::instance();
        $nameBool && $form->addChildren(['type' => $nameHtmlType, 'id' => 'name'], '名称：', !empty($data['name']) ? $data['name'] : '');
        $linkBool && $form->addChildren(['type' => $linkHtmlType, 'id' => 'link'], '链接：', !empty($data['link']) ? $data['link'] : '');
        $textBool && $form->addChildren(['type' => 'input', 'id' => 'theme'], 'Live直播间主题：', !empty($theme) ? $theme : '');
        $typeIncBool && $form->addChildren(['type' => 'input', 'id' => 'inc'], '人气增长率：', (!empty($data['type_inc']) ? $data['type_inc'] : '0') . '%');
        $picBool && $form->addChildren(['type' => 'upload-pic', 'id' => 'pic'], '图片：', !empty($data['pic']) ? $data['pic'] : '');
        $form->addChildren(['type' => 'input', 'small' => '数值越小，越靠前', 'id' => 'sort'], '排序：', !empty($data['sort']) ? $data['sort'] : '1');
        $form->addChildren(
                ['type' => 'radio', 'data' => $statusTinyint->getList(), 'id' => 'status'],
                '状态：', !empty($data['status']) ? $data['status'] : '1'
            );
        $form->addChildren(['type' => 'hidden', 'id' => 'type'], '', $type)
            ->addChildren(['type' => 'hidden', 'id' => 'type-id'], '', !empty($data['type_id'])?$data['type_id']:0)
            ->addChildren(['type' => 'hidden', 'id' => 'id'], '', $id)
            ->addChildren('submit');
        

        
        $this->assign('formHtml', $form->getForm());
        
        return $this->fetch();
    }
    
    
    /**
     * 添加选择
     *
     * @param $id
     * @param $type
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function addSelect($id, $type)
    {
        $id = intval($id);
        $type = intval($type);
        $errorMsg = '';
        JsonResult::setMsgArgs(JsonResult::ERR_MSG_NOT_EXISTS, '数据');
        $model = new \app\admin\model\IndexRecommend();
        $save = [];
    
        switch ($type){
            case 1: // 明星流量主
                break;
            case 2: // 精品课程
                $courseModel = new \app\admin\model\Course();
                $courseData = getDataByKey($courseModel->getCourseColumn((array)$id), $id, []);
                if (empty($courseData)) $errorMsg = JsonResult::getMsg(JsonResult::ERR_MSG_NOT_EXISTS);
                break;
            case 3: // 名师推荐
                $userModel = new \app\admin\model\User();
                $userData = getDataByKey($userModel->getUserColumn((array)$id), $id, []);
                if (empty($userData)) $errorMsg = JsonResult::getMsg(JsonResult::ERR_MSG_NOT_EXISTS);
                $liveModel = new \app\admin\model\Live();
                $liveData = $liveModel->getLiveDataByUserId($id);
                if (empty($liveData)) $errorMsg = JsonResult::getMsg(JsonResult::ERR_MSG_NOT_EXISTS);
                $id = $liveData['id'];
                
                $save['pic'] = \helper\UrlSys::handleIndexTeacherBack();
                break;
            case 4: // 深度阅读
                break;
            case 5: // 人气直播
                // 没有
                break;
            default:
                $this->abortError(JsonResult::ERR_PARAMETER);
                break;
        }
        if (empty($errorMsg) && $model->addData($type, $id, $save) !== false) {
            $errorMsg = $model->getError();
        }
        $this->assign('errorMsg', $errorMsg);
    
        return $this->fetch();
    }
    
    
    
    
    
    /**
     * 修改增长率和排序
     *
     * @param $id
     * @param $field
     * @param $value
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function changeField($id, $field, $value)
    {
        $fieldMap = ['type_inc', 'sort'];
        if (in_array($field, $fieldMap)){
            $model = new \app\admin\model\IndexRecommend();
            $value = intval($value);
            
            if ($value < 1){
                return $this->errSysJson('必须大于0');
            }
            
            $model->update([$field => $value], ['id' => $id]);
        }
        
        
        return $this->sucSysJson(1);
    }
    
    
    public function del($ids)
    {
        $this->validateByName('common.ids');
        
        $model = new \app\admin\model\IndexRecommend();
        $model->where(['id' => ['in', (array)$ids]])->delete();
        
        return $this->sucSysJson(1);
    }
    
    
}