<?php

namespace app\admin\controller;

use app\admin\model\IndexRecommend as MIndexRecommend;
use app\admin\model\Viewpoint as MViewpoint;
use app\admin\model\ViewpointCate as MViewpointCate;
use app\admin\model\LiveCate as MLiveCate;
use app\common\model\PayOrder as MPayOrder;
use app\common\model\User as UserModel;
use app\common\controller\JsonResult;

class IndexRecommendForStarOwners extends App {

    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status,
        \app\admin\traits\userNav;

    /**
     *  明星流量主列表
     * @return mixed|\think\Response|\think\response\Json|\think\response\View|\think\response\Xml|\think\response\Redirect|\think\response\Jsonp|string
     * @author liujuneng
     */
    public function index() {
        $header = [
                ['checkbox' => true, 'value' => 1,],
                ['field' => 'num', 'title' => '序号',],
                ['field' => 'id', 'title' => 'ID',],
                ['field' => 'head_add', 'title' => '头像',],
                ['field' => 'alias', 'title' => '昵称',],
                ['field' => 'type_inc', 'title' => '本周收益提升',],
                ['field' => 'clickNum', 'title' => '推荐点击量',],
                ['field' => 'createTime', 'title' => '添加时间',],
                ['field' => 'status', 'title' => '状态',],
                ['field' => 'adminName', 'title' => '操作人',],
                ['field' => 'sort', 'title' => '排序',],
                ['field' => 'action', 'title' => '操作',],
        ];



        $this->setTableHeader($header)->setToolbarId('table-button-html')->setTableSearchId('table-search-html')->setStatusTitle('启用', '停用');


        $model = new MIndexRecommend();

        return $this->traitAdminTableList(function () use ($model) {
                    $field = 'ir.id,ir.click_num,ir.type_inc,ir.create_time,ir.status,ir.admin_id,ir.sort,u.user_id,u.alias,u.head_add';

                    $data = $this->traitAdminTableQuery([
                            [['alias', ''], 'likeAll', 'u.alias'],
                            [['dateMin', ''], 'dateMin-date', 'ir.create_time'],
                            [['dateMax', ''], 'dateMax-date', 'ir.create_time '],
                            [['status/i', '-1'], 'zero', 'ir.status'],
                            ], function () use ($model) {
                        $model->where('ir.type', 1)
                                ->alias('ir')
                                ->join('user u', 'ir.type_id = u.user_id', 'left');
                        return $model;
                    }, $field, 'ir.id desc');

                    $result = [];

                    if (!empty($data['rows'])) {

                        $user_model = new \app\admin\model\User();
                        $adminIdList = $adminNameList = [];
                        foreach ($data['rows'] as $datum) {
                                $adminIdList[] = $datum['admin_id'];
                                $adminModel = new \app\admin\model\Admin();
                                $adminNameList = $adminModel->getAdminName($adminIdList);
                        }

                        $i = 1;
                        foreach ($data['rows'] as $datum) {
                            
                            $actionList = [
                                '编辑' => [
                                    'class' => 'action-edit',
                                    'data-id' => $datum['id'],
                                ],
                                '移除' => [
                                    'class' => 'action-delete',
                                    'data-id' => $datum['id'],
                                ],
                                $this->statusActionHtml($datum['status']) => [
                                    'class' => 'open-status',
                                    'data-id' => $datum['id'],
                                    'data-status' => $this->getStatusHtmlDataAttr($datum['status']),
                                ]
                            ];
                            $action = self::showOperate($actionList);
                            $userHead = $user_model->disUserHead($datum['head_add']);
                            $result[] = [
                                'num' => $i,
                                'id' => $datum['user_id'],
                                'type_inc' => $datum['type_inc'],
                                'alias' => \app\admin\model\UrlHtml::goUserDetailsUrl($datum['user_id'], $datum['alias']),
                                'clickNum' => $datum['click_num'],
                                'head_add' => "<img src='{$userHead}' title='{$datum['alias']}头像' style='width: 50px;' />",
                                'createTime' => $datum['create_time'],
                                'status' => $this->statusColumnHtml($datum['status']),
                                'adminName' => $adminNameList[$datum['admin_id']],
                                'sort' => $datum['sort'],
                                'action' => $action
                            ];

                            $i++;
                        }
                    }

                    return $this->sucJson([
                                'rows' => $result,
                                'total' => $data['total'],
                    ]);
                }, function () {
                    $this->assign('columnStatusHtml', $this->statusColumnHtml(null));
                    $this->assign('actionStatusHtml', $this->statusActionHtml(null));
                    $this->assign('searchStatusArr', [-1 => '状态'] + $this->searchStatusArr());
                });
    }

    /**
     * 删除明星流量主记录
     * @param unknown $ids
     * @return \think\response\Json
     * @author liujuneng
     */
    public function deleteIndexRecommend($ids) {
        $this->validateByName('common.ids');

        $model = new MIndexRecommend();
        $successCount = $model->where('id', 'in', $ids)->where('type = 1')->delete();
        if ($successCount > 0) {
            return $this->sucSysJson("移除成功");
        } else {
            return $this->errSysJson("移除失败");
        }
    }

    /**
     * 修改明星流量主记录
     * @param unknown $id
     * @return \think\response\Json|mixed|string
     * @author liujuneng
     */
    public function edit($id) {
        $this->validateByName('common.id');
        $model = new MIndexRecommend();
        $request = $this->request;

        if ($request->isPost()) {
            $sort = $request->param('sort');
            $status = $request->param('status');
            $type_inc = $request->param('type_inc/i', 0);
            $updateData = [
                'sort' => $sort,
                'status' => $status,
                'type_inc' => $type_inc,
            ];
            $successCount = $model->where('id', $id)->update($updateData);
            if ($successCount > 0) {
                return $this->sucSysJson("更新成功");
            } else {
                return $this->errSysJson("更新失败");
            }
        } else {
            $data = $model->alias('ir')
                    ->field('v.title, ir.link, ir.type_inc,ir.sort, ir.status, ir.name')
                    ->where('ir.id', $id)
                    ->where('ir.type', 1)
                    ->join('viewpoint v', 'ir.type_id = v.id', 'left')
                    ->find();
            $this->assign('data', $data);
        }
        return $this->fetch();
    }

    /**
     * 修改明星流量主的状态（启用/停用）
     * @param unknown $ids
     * @param unknown $status
     * @return \think\response\Json
     * @author liujuneng
     */
    public function changeStatus($ids, $status) {
        $this->validateByName();

        $model = new MIndexRecommend();

        $result = $model->where('id', 'in', $ids)->update(['status' => $status]);
        if ($result > 0) {
            return $this->sucSysJson("修改成功");
        } else {
            return $this->errSysJson("修改失败");
        }
    }

    /**
     *  明星流量主阅读功能，此处仅做调用观点列表
     * @return mixed|\think\Response|\think\response\Json|\think\response\View|\think\response\Xml|\think\response\Redirect|\think\response\Jsonp|string
     * @author liujuneng
     */
    public function add() {
        $this->setTableHeader([
                ['field' => 'num', 'title' => '序号',],
                ['field' => 'user_id', 'title' => 'ID',],
                ['field' => 'head_add', 'title' => '头像',],
                ['field' => 'alias', 'title' => '昵称',],
                ['field' => 'tel', 'title' => '手机',],
                ['field' => 'create_time', 'title' => '申请时间',],
                ['field' => 'fan_num', 'title' => '邀请粉丝',],
                ['field' => 'money', 'title' => '收益                 单位：元',],
                ['field' => 'status', 'title' => '状态',],
                ['field' => 'action', 'title' => '操作',],
        ])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');

        $model = new UserModel();

        return $this->traitAdminTableList(function () use ($model) {

                    $field = 'u.user_id,u.alias,u.income_total,u.head_add,u.tel,u.register_date,c.status';

                    $data = $this->traitAdminTableQuery([], function () use ($model) {
                        $model->where(['u.`user_level`' => "3"])
                                ->alias('u')
                                ->join('index_recommend c', 'u.user_id = c.type_id and c.type = 1', 'left');
                        return $model;
                    }, $field, 'u.user_id desc');

                    $result = $viewpointIds = [];
                    
                    if (!empty($data['rows'])) {
                        $i = 1;
                        
                        $user_model = new \app\admin\model\User();
                        
                        foreach ($data['rows'] as $datum) {
                            $actionList = [
                                '选择' => [
                                    'class' => 'action-select-deep-reading',
                                    'data-id' => $datum['user_id'],
                                ],
                            ];

                            $action = self::showOperate($actionList);
                            $userHead = $user_model->disUserHead($datum['head_add']);
                            $fansData = (new \app\admin\model\Fans())->getFansNumByUserId([$datum['user_id']]);
                            
//                            $datum['status']
                            
                            if ($datum['status'] == null) {
                                $status_html = "<span>正常</span>";
                            } elseif ($datum['status'] == 2) {
                                $status_html = "<span  class='c-red'>已禁用</span>";
                            } else {
                                $status_html = "<span>已添加</span>";
                            }

                            $item = [
                                'num' => $i,
                                'user_id' => $datum['user_id'],
                                'alias' => \app\admin\model\UrlHtml::goUserDetailsUrl($datum['user_id'], $datum['alias']),
                                'create_time' => $datum['register_date'],
                                'tel' => $datum['tel'],
                                'fan_num' => getDataByKey($fansData, $datum['user_id'], 0),
                                'head_add' => "<img src='{$userHead}' title='{$datum['alias']}头像' style='width: 50px;' />",
                                'money' => "<span class='c-red'>{$datum['income_total']}</span>",   
                                'status' => $status_html,        
                                'action' => $action,
                            ];
                                
                            if ($datum['status'] != null) {
                                unset($item['action']);
                            }    

                            $result[] = $item;    
                            $i++;
                        }
                    }

                    return $this->sucJson([
                                'rows' => $result,
                                'total' => $data['total'],
                    ]);
                }, function () {
                    $this->assign('tableOtherHtml', $this->tableOtherHtml);
                    $this->assign('isShowNav', 'hide');
                });
    }

    /**
     * 添加明星流量主记录
     * @return \think\response\Json
     * @author liujuneng
     */
    public function addData() {
        $request = $this->request;
        $viewpointId = $request->post('viewpointId/i', 0);

        $user_model = new UserModel();
        
        $map['a.`user_id`'] = $viewpointId;
        $map['a.`user_level`'] = 3;
        
        $user_data = $user_model->alias('a')->where($map)->find();
        
        
        if (empty($user_data)) {
            return $this->errSysJson(JsonResult::ERR_VIEWPOINT_NOT_EXIST);
        } else {
            $indexRecommendModel = new MIndexRecommend();
            $condition = [
                'type' => 1,
                'type_id' => $viewpointId,
                'status' => 1,
            ];
            $count = $indexRecommendModel->where($condition)->count();
            if ($count > 0) {
                return $this->errSysJson(JsonResult::ERR_VIEWPOINT_RECOMMEND);
            }

            $data = [
                'type' => 1,
                'type_id' => $viewpointId,
                'admin_id' => $this->getAdminId(),
                'sort' => 1,
                'name' => $user_data['alias'],
            ];
            $result = $indexRecommendModel->insert($data);
            if ($result > 0) {
                return $this->sucSysJson("添加成功");
            } else {
                return $this->errSysJson("添加失败");
            }
        }
    }

}
