<?php

namespace app\admin\controller;

use app\wechat\controller\AdmireRpc;

class CommentAudit extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status,
        \app\admin\traits\ImgReset;

    /**
     * 课程评论首页
     * @name  courseIndex
     * @return mixed
     * @author Lizhijian
     */
    public function courseIndex()
    {
        $this->setTableHeader([
            ['checkbox' => true, 'value' => 1,],
            ['field' => 'num', 'title' => '序号',],
            ['field' => 'id', 'title' => 'ID',],
            ['field' => 'series_course_name', 'title' => '系列课名称',],
            ['field' => 'course_name', 'title' => '课程名称',],
            ['field' => 'teacher_name', 'title' => '所属老师',],
            ['field' => 'msgtype', 'title' => '评论类型',],
            ['field' => 'content_user', 'title' => '评论人',],
            'content' => '评论内容',
            'createtime' => '评论时间',
            'reply_num' => '回复数量',
            'state' => '状态',
            ['field' => 'action', 'title' => '操作',],
        ])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');
        return $this->traitAdminTableList(function () {
            //初始化
            $model = new \app\admin\model\CommentAudi();
            $field = 'c.id, u.alias content_user, c.content, c.createtime, c.state, c.msgid, c.pmsgid, c.msgtype, c.groupid, c.uid, co.class_name, co.teacher_name, co.id course_id, co.pid, co.uid course_user_id';
            $where = ['c.pmsgid' => ['=', 0]];
            //搜索回复时
            $scourse_name = input('scourse_name');
            $replyUser = input('replyuser');
            $teacher = input('teacher');
            //搜索父系列课时
            if (!empty($scourse_name)) {
//                $coursePids = $model->alias('c')->join('course co', 'c.groupid = co.id')->column('co.pid', 'c.id');
//                if($coursePids) $coursePids = array_filter($coursePids);

//                $where = ['co.id' => ['in', $coursePids]];
            }
            //搜索回复人时
            if (!empty($replyUser)) {
                //查询相应的父评论（用户名->user_id->pmsgid）
                $pmsgids = $model->alias('c')
                    ->where(['u.alias' => ['like', "%{$replyUser}%"], 'c.pmsgid' => ['>', 0]])//属于回复的部分
                    ->join('user u', 'c.uid = u.user_id')->column('c.pmsgid');
                //查询pmsgid
                if ($pmsgids) {
                    $where = ['c.msgid' => ['in', array_unique($pmsgids)]];
                } else {
                    $where['c.msgid'] = ['in', 0];
                }
            }
            //搜索所属老师时
            if (!empty($teacher)) {
                //（用户名->user_id->直播间ID->groupid）
                $UserModel = new \app\admin\model\User();
                $course_id = $UserModel->alias('u')
                    ->join('course c', 'u.user_id = c.uid')
                    ->where(['u.alias' => ['like', "%{$teacher}%"]])->value('c.id');
                if ($course_id) {
                    $where['c.groupid'] = ['=', $course_id];
                }
            }
            $data = $this->traitAdminTableQuery([
                [['course_name', ''], 'like', 'co.class_name'],
//                [['series_course_name', ''], 'like', 'u.alias'],
                [['content', ''], 'likeAll', 'c.content'],
                [['content_user', ''], 'likeAll', 'u.alias'],
                [['dateMin', ''], 'dateMin', 'c.createtime'],
                [['dateMax', ''], 'dateMax', 'c.createtime'],
                [['state', ''], 'eq', 'c.state'],
            ], function () use ($model, $where) {
                $model->alias('c');
                $model->where($where);
                $model->join('user u', 'c.uid = u.user_id');
                $model->join('course co', 'c.groupid = co.id');
                return $model;
            }, $field, 'c.id desc');
            // 处理数据
            $userIds = $pmsgids = $pids = [];
            foreach ($data['rows'] as $item) {
                $userIds[] = $item['course_user_id'];
                $pmsgids[] = $item['msgid'];
                $ids[] = $item['id'];
                $pids[] = $item['pid'];
            }
            //获取课程直播间所属用户名(用户ID->用户名)
            $UserModel = new \app\admin\model\User();
            $userInfo = $userIds ? $UserModel->where(['user_id' => ['in', $userIds]])->column('alias', 'user_id') : [];
            //获取系列课名（单节课pid->父系列课名）
            $CourseModel = new \app\admin\model\Course();
            $courseInfo = $pids ? $CourseModel->where('id', 'in', $pids)->column('class_name', 'id') : [];
            $result = [];
            $i = 1;
            //状态
            $this->setStatusTitle('显示', '屏蔽');
            foreach ($data['rows'] as $datum) {
                //回复数量
                $replyNum = $model::where(['pmsgid' => $datum['msgid'], 'groupid' => $datum['groupid']])->value('count(1) as num');
                //是否有回复
                $href = '';
                if ($replyNum) {
                    $href = $this->urlTab('Live聊天室评论列表', '评论详情', 'courseCommentDetail', [
                        'id' => $datum['id'],
                        'msgid' => $datum['msgid'],
                        'groupid' => $datum['groupid']
                    ]);
                }
                $action = self::showOperate([
                    $this->statusActionHtml($datum['state']) => [//审核状态
                        'class' => 'state',
                        'data-ids' => $datum['id'],
                        'data-status' => $this->getStatusHtmlDataAttr($datum['state'])
                    ],
                    '回复' => [
                        'class' => 'reply-html',
                        'data-uid' => $datum['uid'],
                        'data-pid' => $datum['msgid'],
                        'data-groupid' => $datum['groupid']
                    ],
                    '删除' => [
                        'class' => 'del-html',
                        'data-id' => $datum['id']
                    ],
                ]);
                if(!$href){
                    $action = "评论详情 | ". $action;
                }else{
                    $action = "<a href='$href'>评论详情</a> | ". $action;
                }
                //是否上墙的回复
                if ($datum['msgtype'] == 14 && is_json($datum['content'])) {
                    $tem = json_decode($datum['content'], true);
                    $content = $tem['answerText'] ?: '';
                } else {
                    $content = $datum['content'];
                }
                $result[] = [
                    'num' => $i,
                    'id' => $datum['id'],
                    'series_course_name' => $datum['pid'] ? $courseInfo[$datum['pid']] : '',//系列课程名称
                    'course_name' => $datum['class_name'],//课程名称
                    'teacher_name' => $userInfo[$datum['course_user_id']],//直播间所属老师
                    'msgtype' => $datum['msgtype'] == 14 ? '上墙' : '',//评论类型
                    'content_user' => $datum['content_user'],//评论人
                    'content' => $content,//评论内容
                    'createtime' => date('Y-m-d H:i:s', $datum['createtime']),//评论时间
                    'reply_num' => $replyNum ?: 0,//回复数量
                    'state' => $this->statusColumnHtml($datum['state']),//状态
                    'status' => $datum['state'],//状态
                    'action' => $action,
                ];
                ++$i;
            }
            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        }, function () {
            $this->assign('statusHtml', $this->statusActionHtml(null));
        });
    }
    
    /**
     * 特训课评论列表
     * @param number $id
     * @return mixed|\think\Response|\think\response\Json|\think\response\View|\think\response\Xml|\think\response\Redirect|\think\response\Jsonp|string
     * @author liujuneng
     */
    public function courseIndexForTrain($courseId = 0)
    {
    	$this->setTabNameThirdly('评论列表');
    	$this->setTableHeader([
    			['checkbox' => true, 'value' => 1,],
    			['field' => 'num', 'title' => '序号',],
    			['field' => 'id', 'title' => 'ID',],
    			['field' => 'course_name', 'title' => '特训班名称',],
    			['field' => 'teacher_name', 'title' => '该时段主讲人',],
    			['field' => 'content', 'title' => '评论内容',],
    			['field' => 'content_user', 'title' => '评论人',],
    			['field' => 'createtime', 'title' => '发表时间',],
    			['field' => 'state', 'title' => '状态',],
    			['field' => 'action', 'title' => '操作',],
    	])->setToolbarId('table-button-html')->setTableSearchId('table-search-html')->setStatusTitle('显示', '屏蔽');
    	
    	return $this->traitAdminTableList(function () use ($courseId) {
    		//初始化
    		$model = new \app\admin\model\CommentAudi();
    		$field = 'ca.id, u.alias content_user, ca.content, ca.createtime, ca.state, ca.msgid, ca.msgtype, ca.groupid, ca.uid, c.class_name';
    		$data = $this->traitAdminTableQuery([
    				[['content', ''], 'likeAll', 'ca.content'],
    				[['dateMin', ''], 'dateMin', 'ca.createtime'],
    				[['dateMax', ''], 'dateMax', 'ca.createtime '],
    				[['state', ''], 'eq', 'ca.state'],
    		], function () use ($model, $courseId) {
    			$model->alias('ca')
    				->join('user u', 'ca.uid = u.user_id')
    				->join('course c', 'ca.groupid = c.id');
    			
    			if ($courseId > 0) {
    				$model->where('ca.groupid', $courseId);
    			}
    				
    			return $model;
    		}, $field, 'ca.id desc');
    		// 处理数据
    		$courseIds = [];
    		foreach ($data['rows'] as $item) {
    			if (!in_array($item['groupid'], $courseIds)) {
    				$courseIds[] = $item['groupid'];
    			}
    		}
    		//获取时段主讲人
    		$courseScheduleModel = new \app\admin\model\CourseSchedule();
    		$teacherInfoList = [];
    		if (!empty($courseIds)) {
    			$teacherInfoList =  $courseScheduleModel->alias('cs')
    								->join('user u', 'cs.teacher_id = u.user_id')
    								->field('u.alias as teacherName,cs.begin_time,cs.end_time')
    								->where('course_id', 'in', $courseIds)
    								->select();
    		}
    		
    		$result = [];
    		$i = 1;
    		foreach ($data['rows'] as $datum) {
    			$action = self::showOperate([
    					'删除' => [
    							'class' => 'del-html',
    							'data-id' => $datum['id']
    					],
    					$this->statusActionHtml($datum['state']) => [//审核状态
    							'class' => 'state',
    							'data-ids' => $datum['id'],
    							'data-status' => $this->getStatusHtmlDataAttr($datum['state'])
    					],
    			]);
    			
    			$teacherName = '';
    			$createtime = date('Y-m-d H:i:s', $datum['createtime']);
    			foreach ($teacherInfoList as $teacherInfo) {
    				if ($teacherInfo['begin_time'] < $createtime && $createtime < $teacherInfo['end_time']) {
    					$teacherName = $teacherInfo['teacherName'];
    					break;
    				}
    			}
    			
    			$result[] = [
    					'num' => $i,
    					'id' => $datum['id'],
    					'course_name' => $datum['class_name'],//课程名称
    					'teacher_name' => $teacherName,//该时段主讲人
    					'content' => $datum['content'],//评论内容
    					'content_user' => $datum['content_user'],//评论人
    					'createtime' => $createtime,//评论时间
    					'state' => $this->statusColumnHtml($datum['state']),//状态
    					'status' => $datum['state'],//状态
    					'action' => $action,
    			];
    			$i++;
    		}
    		return $this->sucJson([
    				'rows' => $result,
    				'total' => $data['total'],
    		]);
    	}, function () use ($courseId) {
    		if ($courseId > 0) {
    			$courseModel = new \app\admin\model\Course();
    			$courseInfo = $courseModel->where('id', $courseId)->find();
    			if (!empty($courseInfo)) {
    				$this->assign('auditStatus', $courseInfo['audit_status']);
    			}
    		}
    		$this->assign('statusHtml', $this->statusActionHtml(null));
    		$this->assign('courseId', $courseId);
    	});
    		
    }
    
    public function changeAuditStatus($courseId, $auditStatus)
    {
    	if (empty($courseId)) {
    		return $this->errSysJson("课程id有误");
    	}elseif (!in_array((int)$auditStatus, [0, 1])) {
    		return $this->errSysJson("无效的审核状态");
    	}
    	$courseModel = new \app\admin\model\Course();
    	$result = $courseModel->where('id', $courseId)->update(['audit_status'=>$auditStatus]);
    	if (is_numeric($result)) {
    		return $this->sucSysJson("修改成功");
    	}else {
    		return $this->errSysJson($result);
    	}
    }

    /**
     * 直播间评论列表页
     * @name  liveIndex
     * @return mixed
     * @author Lizhijian3
     */
    public function liveIndex()
    {
        $this->setTableHeader([
            ['checkbox' => true, 'value' => 1,],
            ['field' => 'num', 'title' => '序号',],
            ['field' => 'id', 'title' => 'ID',],
            ['field' => 'live_name', 'title' => 'Live直播间名称',],
            ['field' => 'teacher_name', 'title' => '所属老师',],
            ['field' => 'msgtype', 'title' => '评论类型',],
            ['field' => 'content_user', 'title' => '评论人',],
            'content' => '评论内容',
            'createtime' => '评论时间',
            'reply_num' => '回复数量',
            'state' => '状态',
            ['field' => 'action', 'title' => '操作',],
        ])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');
        return $this->traitAdminTableList(function () {
            //初始化
            $model = new \app\admin\model\CommentAudi();
            $field = 'c.id, u.alias content_user, c.content, c.createtime, c.msgtype, c.state, c.msgid, c.pmsgid, l.id live_id, l.user_id live_user_id, c.groupid, c.uid';
            $where = ['c.pmsgid' => ['=', 0]];
            //搜索回复时
            $reply = input('reply');
            $replyUser = input('replyuser');
            $teacher = input('teacher');
            if (!empty($reply)) {
                $msgids = $model->where(['content' => ['like', "%$reply%"]])->column('pmsgid');//查询符合条件的主评论
                if ($msgids) {
                    $where['c.msgid'] = ['in', array_unique($msgids)];
                } else {
                    $where['c.msgid'] = ['in', 0];
                }
            }
            //搜索回复人时
            if (!empty($replyUser)) {
                //查询相应的父评论（用户名->user_id->pmsgid）
                $pmsgids = $model->alias('c')
                    ->where(['u.alias' => ['like', "%{$replyUser}%"], 'c.pmsgid' => ['>', 0]])//属于回复的部分
                    ->join('user u', 'c.uid = u.user_id')->column('c.pmsgid');
                //查询pmsgid
                if ($pmsgids) {
                    $where = ['c.msgid' => ['in', array_unique($pmsgids)]];
                } else {
                    $where['c.msgid'] = ['in', 0];
                }
            }
            //搜索所属老师时
            if (!empty($teacher)) {
                //（用户名->user_id->直播间ID->groupid）
                $UserModel = new \app\admin\model\User();
                $live_id = $UserModel->alias('u')
                        ->join('live l', 'u.user_id = l.user_id')
                        ->where(['u.alias' => ['like', "%{$teacher}%"]])->value('l.id') + 1000000000;
                if ($live_id) {
                    $where['c.groupid'] = ['=', $live_id];
                }
            }
            $data = $this->traitAdminTableQuery([
                [['live_name', ''], 'like', 'u.alias'],
                [['content', ''], 'likeAll', 'c.content'],
                [['content_user', ''], 'likeAll', 'u.alias'],
                [['dateMin', ''], 'dateMin', 'c.createtime'],
                [['dateMax', ''], 'dateMax', 'c.createtime'],
                [['state', ''], 'eq', 'c.state'],
            ], function () use ($model, $where) {
                $model->alias('c');
                $model->where($where);
                $model->join('user u', 'c.uid = u.user_id');
                $model->join('live l', 'c.groupid-1000000000 = l.id');
                return $model;
            }, $field, 'c.id desc');
            // 处理数据
            $userIds = $pmsgids = [];
            foreach ($data['rows'] as $item) {
                $userIds[] = $item['live_user_id'];
                $pmsgids[] = $item['msgid'];
                $ids[] = $item['id'];
            }
            //获取直播间名(直播间ID->用户ID->用户名)
            $UserModel = new \app\admin\model\User();
            $UserInfo = $userIds ? $UserModel->where(['user_id' => ['in', $userIds]])->column('alias', 'user_id') : [];
            $result = [];
            $i = 1;
            //状态
            $this->setStatusTitle('显示', '屏蔽');
            foreach ($data['rows'] as $datum) {
                //回复数量
                $replyNum = $model::where(['pmsgid' => $datum['msgid'], 'groupid' => $datum['groupid']])->value('count(1) as num');
                //是否有回复
                $href = '';
                if ($replyNum) {
                    $href = $this->urlTab('Live聊天室评论列表', '评论详情', 'liveCommentDetail', [
                        'id' => $datum['id'],
                        'msgid' => $datum['msgid'],
                        'groupid' => $datum['groupid']
                    ]);
                }
                $action = self::showOperate([
                    $this->statusActionHtml($datum['state']) => [//审核状态
                        'class' => 'state',
                        'data-ids' => $datum['id'],
                        'data-status' => $this->getStatusHtmlDataAttr($datum['state'])
                    ],
                    '回复' => [
                        'class' => 'reply-html',
                        'data-uid' => $datum['uid'],
                        'data-pid' => $datum['msgid'],
                        'data-groupid' => $datum['groupid']
                    ],
                    '删除' => [
                        'class' => 'del-html',
                        'data-id' => $datum['id']
                    ],
                ]);

                if(!$href){
                    $action = "评论详情 | ". $action;
                }else{
                    $action = "<a href='$href'>评论详情</a> | ". $action;
                }
                //是否上墙的回复
                if ($datum['msgtype'] == 14 && is_json($datum['content'])) {
                    $tem = json_decode($datum['content'], true);
                    $content = $tem['answerText'] ?: '';
                } else {
                    $content = $datum['content'];
                }
                $result[] = [
                    'num' => $i,
                    'id' => $datum['id'],
                    'live_name' => $UserInfo[$datum['live_user_id']] . '的直播间',//直播间名称
                    'teacher_name' => $UserInfo[$datum['live_user_id']],//直播间所属老师
                    'msgtype' => $datum['msgtype'] == 14 ? '上墙' : '',//评论类型
                    'content_user' => $datum['content_user'],//评论人
                    'content' => $content,//评论内容
                    'createtime' => date('Y-m-d H:i:s', $datum['createtime']),//评论时间
                    'reply_num' => $replyNum ?: 0,//回复数量
                    'state' => $this->statusColumnHtml($datum['state']),//状态
                    'status' => $datum['state'],//状态
                    'action' => $action,
                ];
                ++$i;
            }
            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        }, function () {
            $this->assign('statusHtml', $this->statusActionHtml(null));
        });
    }

    /**
     * 直播间评论列表详情页
     * @name  liveCommentDetail
     * @param $msgid
     * @param $groupid
     * @return mixed
     * @author Lizhijian
     */
    public function liveCommentDetail($msgid, $groupid)
    {
        $model = new \app\admin\model\CommentAudi();
        $where = "c.groupid={$groupid} and  (c.msgid=$msgid or c.pmsgid=$msgid) ";
        $whereSearch = [];
        $param = [
            'username' => '',
            'content' => '',
            'dateMin' => '',
            'dateMax' => '',
        ];
        //搜索
        if (request()->isPost()) {
            $param = input('post.');
            if ($param['username']) {
                $whereSearch['u.alias'] = ['like', "%{$param['username']}%"];
            }
            if ($param['content']) {
                $whereSearch['c.content'] = ['like', "%{$param['content']}%"];
            }
            if ($param['dateMin']) {
                $time = strtotime($param['dateMin']);
                $whereSearch['c.createtime'] = ['>=', $time];
            }
            if ($param['dateMax']) {
                $time = strtotime($param['dateMin']);
                $whereSearch['c.createtime'] = ['<=', $time];
            }
        }
        //获取数据
        $data = $model
            ->alias('c')
            ->field('u.head_add, u.user_id, u.alias, c.msgtype, c.id, c.msgtype, c.createtime, c.content, c.msgid, c.pmsgid, c.groupid, c.state')
            ->join('user u', 'c.uid = u.user_id', 'left')
            ->where($where)
            ->where($whereSearch)
            ->select();
        $master = $reply = [];
        foreach ($data as $v) {
            if ($v['pmsgid'] == 0) {
                if ($v['msgtype'] == 14 && is_json($v['content'])) {
                    $v['content'] = json_decode($v['content'], true)['answerText'];
                }
                $master = $v;
            } else {
                $reply[] = $v;
            }
        }
        if (!$master) {
            $master = $model
                ->alias('c')
                ->field('u.head_add, u.alias, u.user_id, c.id, c.createtime, c.content, c.msgid, c.pmsgid, c.groupid, c.state')
                ->join('user u', 'c.uid = u.user_id', 'left')
                ->where("(c.msgid=$msgid and c.pmsgid=0) ")
                ->find();
        }
        $this->assign('master', $master);
        $this->assign('reply', $reply);
        $this->assign('msgid', $msgid);
        $this->assign('search', $param);
        return $this->fetch();
    }

    /**
     * 课程直播间评论列表详情页
     * @name  courseCommentDetail
     * @param $msgid
     * @return mixed
     * @author Lizhijian
     */
    public function courseCommentDetail($msgid, $groupid)
    {
        $model = new \app\admin\model\CommentAudi();
        $where = "c.groupid={$groupid} and  (c.msgid={$msgid} or c.pmsgid={$msgid}) ";
        $whereSearch = [];
        $param = [
            'username' => '',
            'content' => '',
            'dateMin' => '',
            'dateMax' => '',
        ];
        //搜索
        if (request()->isPost()) {
            $param = input('post.');
            if ($param['username']) {
                $whereSearch['u.alias'] = ['like', "%{$param['username']}%"];
            }
            if ($param['content']) {
                $whereSearch['c.content'] = ['like', "%{$param['content']}%"];
            }
            if ($param['dateMin']) {
                $time = strtotime($param['dateMin']);
                $whereSearch['c.createtime'] = ['>=', $time];
            }
            if ($param['dateMax']) {
                $time = strtotime($param['dateMin']);
                $whereSearch['c.createtime'] = ['<=', $time];
            }
        }
        //获取数据
        $data = $model
            ->alias('c')
            ->field('u.head_add, u.user_id, u.alias, c.id, c.createtime, c.msgtype, c.content, c.msgid, c.pmsgid, c.groupid, c.state')
            ->join('user u', 'c.uid = u.user_id', 'left')
            ->where($where)
            ->where($whereSearch)
            ->select();
        $master = $reply = [];
        foreach ($data as $v) {
            if ($v['pmsgid'] == 0) {
                if ($v['msgtype'] == 14 && is_json($v['content'])) {
                    $v['content'] = json_decode($v['content'], true)['answerText'];
                }
                $master = $v;
            } else {
                $reply[] = $v;
            }
        }
        if (!$master) {
            $master = $model
                ->alias('c')
                ->field('u.head_add, u.alias, u.user_id, c.id, c.msgtype, c.createtime, c.content, c.msgid, c.pmsgid, c.groupid, c.state')
                ->join('user u', 'c.uid = u.user_id', 'left')
                ->where("(c.msgid=$msgid and c.pmsgid=0) ")
                ->find();
        }
        $this->assign('master', $master);
        $this->assign('reply', $reply);
        $this->assign('msgid', $msgid);
        $this->assign('search', $param);
        $this->assign('groupid', $groupid);
        return $this->fetch();
    }

    /**
     * 课程详情留言列表详情页
     * @name  courseLeaveDetail
     * @param $id
     * @return mixed
     * @author Lizhijian
     */
    public function courseLeaveDetail($id, $groupid)
    {
        //获取讲师ID
        $teacherId = \think\Db::table('talk.talk_course')->where('id',$groupid-1000000000)->value('uid');
        $model = new \app\admin\model\Leave();
        $where = "l.groupid={$groupid} and  (l.id={$id} or l.pid={$id}) ";
        $whereSearch = [];
        $param = [
            'username' => '',
            'content' => '',
            'dateMin' => '',
            'dateMax' => '',
        ];
        //搜索
        if (request()->isPost()) {
            $param = input('post.');
            if ($param['username']) {
                $whereSearch['u.alias'] = ['like', "%{$param['username']}%"];
            }
            if ($param['content']) {
                $whereSearch['l.content'] = ['like', "%{$param['content']}%"];
            }
            if ($param['dateMin']) {
                $time = strtotime($param['dateMin']);
                $whereSearch['l.createtime'] = ['>=', $time];
            }
            if ($param['dateMax']) {
                $time = strtotime($param['dateMin']);
                $whereSearch['l.createtime'] = ['<=', $time];
            }
        }
        //获取数据
        $data = $model
            ->alias('l')
            ->field('u.head_add, u.user_id, u.alias, l.*')
            ->join('user u', 'l.uid = u.user_id', 'left')
            ->where($where)
            ->where($whereSearch)
            ->select();
        $master = $reply = [];
        foreach ($data as $v) {
            if ($v['pid'] == 0) {
                $master = $v;
            } else {
                $reply[] = $v;
            }
        }
        if (!$master) {
            $master = $model
                ->alias('l')
                ->field('u.head_add, u.alias, u.user_id, l.*')
                ->join('user u', 'l.uid = u.user_id', 'left')
                ->where("(l.id=$id and l.pid=0) ")
                ->find();
        }
        $this->assign('teacherId', $teacherId);
        $this->assign('master', $master);
        $this->assign('reply', $reply);
        $this->assign('id', $id);
        $this->assign('search', $param);
        $this->assign('groupid', $groupid);
        return $this->fetch();
    }

    /**
     * 观点详情留言列表详情页
     * @name  viewPointLeaveDetail
     * @param $id
     * @return mixed
     * @author Lizhijian
     */
    public function viewPointLeaveDetail($id, $groupid)
    {
        //获取讲师ID
        $liveId = \think\Db::table('talk.talk_viewpoint')->where('id',$groupid)->value('live_id');
        $teacherId = \think\Db::table('talk.talk_live')->where('id',$liveId)->value('user_id');
        $model = new \app\admin\model\Leave();
        $where = "l.groupid={$groupid} and  (l.id={$id} or l.pid={$id}) ";
        $whereSearch = [];
        $param = [
            'username' => '',
            'content' => '',
            'dateMin' => '',
            'dateMax' => '',
        ];
        //搜索
        if (request()->isPost()) {
            $param = input('post.');
            if ($param['username']) {
                $whereSearch['u.alias'] = ['like', "%{$param['username']}%"];
            }
            if ($param['content']) {
                $whereSearch['l.content'] = ['like', "%{$param['content']}%"];
            }
            if ($param['dateMin']) {
                $time = strtotime($param['dateMin']);
                $whereSearch['l.createtime'] = ['>=', $time];
            }
            if ($param['dateMax']) {
                $time = strtotime($param['dateMin']);
                $whereSearch['l.createtime'] = ['<=', $time];
            }
        }
        //获取数据
        $data = $model
            ->alias('l')
            ->field('u.head_add, u.user_id, u.alias, l.*')
            ->join('user u', 'l.uid = u.user_id', 'left')
            ->where($where)
            ->where($whereSearch)
            ->select();
        $master = $reply = [];
        foreach ($data as $v) {
            if ($v['pid'] == 0) {
                $master = $v;
            } else {
                $reply[] = $v;
            }
        }
        if (!$master) {
            $master = $model
                ->alias('l')
                ->field('u.head_add, u.alias, u.user_id, l.*')
                ->join('user u', 'l.uid = u.user_id', 'left')
                ->where("(l.id=$id and l.pid=0) ")
                ->find();
        }
        $this->assign('teacherId', $teacherId);
        $this->assign('master', $master);
        $this->assign('reply', $reply);
        $this->assign('id', $id);
        $this->assign('search', $param);
        $this->assign('groupid', $groupid);
        return $this->fetch();
    }

    /**
     * 留言禁言
     * @name  leaveGossip
     * @param $teacherId 讲师ID
     * @param $userId 用户ID
     * @return \think\response\Json
     * @author Lizhijian
     */
    public function leaveGossip($teacherId, $userId)
    {
        $res = \app\admin\service\Redis::hashGet("room_user_setting:leave:$teacherId:$userId", 'forbitchat', 0);
        if (!$res) {//禁言
            \app\admin\service\Redis::hashSet("room_user_setting:leave:$teacherId:$userId", 'forbitchat', 1, 0, 60*60*24);
            $msg = '禁言成功！';
        } else {
            \app\admin\service\Redis::hashSet("room_user_setting:leave:$teacherId:$userId", 'forbitchat', 0, 0, 60*60*24);
            $msg = '解除成功！';
        }
        \app\admin\service\Redis::hashSet("room_user_setting:leave:$teacherId:$userId", 'datetime', time(), 0);
        return $this->sucSysJson(1, $msg);
    }

    /**
     * 禁言
     * @name  gossip
     * @param $room_id 直播间ID
     * @param $user_id 用户ID
     * @return \think\response\Json
     * @author Lizhijian
     */
    public function gossip($room_id, $user_id)
    {
        $res = \app\admin\service\Redis::hashGet("room_user_setting:$room_id:$user_id", 'forbitchat', 0);
        if (!$res) {//禁言
            \app\admin\service\Redis::hashSet("room_user_setting:$room_id:$user_id", 'forbitchat', 1, 0, 60*60*24);
            $msg = '禁言成功！';
        } else {
            \app\admin\service\Redis::hashSet("room_user_setting:$room_id:$user_id", 'forbitchat', 0, 60*60*24);
            $msg = '解除成功！';
        }
        \app\admin\service\Redis::hashSet("room_user_setting:$room_id:$user_id", 'datetime', time(), 0);
        return $this->sucSysJson(1, $msg);
    }

    /**
     * 评论的屏蔽/显示审核状态
     * @name  changeStatus
     * @param $ids
     * @param $status
     * @param $live
     * @return \think\response\Json
     * @author Lizhijian
     */
    public function changeStatus($ids, $status, $live, $parent)
    {
        $model = new \app\admin\model\CommentAudi();
        if ($parent == 1) {//这里是单条或多条评论
            foreach ($ids as $v) {
                $pingInfo = $model->where('id', $v)->column('groupid, uid, msgid', 'id');
                if ($status == 2) {
                    return $this->sucSysJson(1, '暂不支持撤回已审核操作', 201);
                    $replysIds = $model->where('pmsgid', $pingInfo[$v]['msgid'])->column('id');
                    $ids = array_merge($ids, $replysIds);
                } else {
                    //通过审核时,通知消息中心
                    self::sendToMsg($live, $pingInfo, $v, '');
                }
            }
        } else {//这里是单条回复
            if ($status == 2) {
                return $this->sucSysJson(1, '暂不支持撤回已审核操作', 201);
            }
            //检查父评论是否审核
            $info = $model->where('id', $ids[0])->column('pmsgid, uid, groupid, state', 'id');//当条评论信息
            $pingInfo = $model->where(['msgid' => $info[$ids[0]]['pmsgid'], 'groupid' => $info[$ids[0]]['groupid']])->column('groupid, uid, msgid, state', 'id');
            $keyId = array_keys($pingInfo)[0];
            if ($pingInfo[$keyId]['state'] == 2) {
                return $this->sucSysJson(1, '请先通过评论的审核！', 201);
            }
            //通过审核时,通知消息中心
            if ($status == 1) {
                self::sendToMsg($live, $pingInfo, $keyId, $info[$ids[0]]['uid']);
            }
        }
        //改变状态时通知C++
        self::sendToRpc($model, $ids, $pingInfo);
        $model->closeStatus($ids, (int)$status);
        return $this->sucSysJson(1);

    }

    /**
     * 评论审核通过创建消息
     * @name  sendToMsg
     * @param $live 是否在live直播间
     * @param $pingInfo 父评论信息
     * @param $pid   父评论ID
     * @param $uid   目的用户
     * @author Lizhijian
     */
    public function sendToMsg($live, $pingInfo, $pid, $uid)
    {
        if ($live == 1) {
            $const = 'REVIEW_LIVE_ROOM_MESSAGE_PASS';
            $liveModel = new \app\admin\model\Live();

            $userId = $liveModel->where('id', $pingInfo[$pid]['groupid'] - 1000000000)->value('user_id');
            $linkfos = ['teacherId' => $userId];

            $userModel = new \app\admin\model\User();
            $userName = $userModel->where('user_id', $userId)->value('alias');
            $replaceArray = [
                'content' => [$userName]
            ];
        } else {
            $const = 'REVIEW_COURSE_ROOM_MESSAGE_PASS';
            $linkfos = ['courseId' => $pingInfo[$pid]['groupid']];

            $courseModel = new \app\admin\model\Course();
            $class = $courseModel->where('id', $linkfos['courseId'])->field('class_name, uid')->find();

            $userModel = new \app\admin\model\User();
            $userName = $userModel->where('user_id', $class['uid'])->value('alias');

            $replaceArray = [
                'content' => [$userName, $class['class_name']]
            ];
        }
        $userIdList = [$uid ?: $pingInfo[$pid]['uid']];
        \MessageCenter::instance()->createMessageRecords($const, $linkfos, $replaceArray, $userIdList);
    }

    /**
     * 审核状态通知C++
     * @name  sendToRpc
     * @param $model 评论模型
     * @param $ids 评论IDS
     * @param array $pingInfo 评论信息
     * @author Lizhijian
     */
    public function sendToRpc(&$model, $ids, array $pingInfo = [])
    {
        $admireRpcC = new AdmireRpc();
        $comments = $model->where('id', 'in', $ids)->column('content, msgid, pmsgid, uid, groupid, roomtype', 'id');
        foreach ($ids as $v) {
            if ($pingInfo) {//本身是回复
                $srcUid = end($pingInfo)['uid'];
            } else {//本身是评论
                $srcUid = $comments[$v]['uid'];
            }
            $msg = array(
                'srcUId' => $srcUid,//消息发起者userid
                'dstUId' => $comments[$v]['uid'],//聊天对象userid
                'msgType' => 0,//消息类型 0文字, 1图片, 2语音, 3视频, 4红包, 5群助手，6OGod团队，7提示消息 0
                'content' => $comments[$v]['content'],//聊天内容
                'msgId' => $comments[$v]['msgid'],//msgid
                'groupId' => $comments[$v]['groupid'],//房间id
                'mastermsgId' => $comments[$v]['pmsgid'],//父评论id
                'notifyType' => 1,//通知类型 1 审核通过;2 回复评论
                'updateId' => '',//如果是在管理后台回复评论需要填该字段 id
                'roomType' => $comments[$v]['roomtype'],
            );
            $admireRpcC->sendCommentAudit($msg);
        }
    }

    /**
     * 回复评论
     * @name  reply
     * @param $pid
     * @param $groupid
     * @param $uid
     * @return mixed|\think\response\Json
     * @author Lizhijian
     */
    public function reply($pid, $groupid, $uid)
    {
        if (request()->isPost()) {
            $pid = input('pid');
            $uid = input('uid');
            $groupid = input('groupid');
            $content = input('content');
            //获取当前用户绑定的前台用户ID
            $adminId = $this->getAdminId();//当前登录后台用户
            $objModel = new \app\admin\model\Admin();
            $bind_user_id = $objModel->where('id', $adminId)->value('bind_user_id');
            //是否已绑定前台用户
            if (!$bind_user_id) {
                return $this->sucJson(['status' => 0, 'msg' => '请先到后台用户列表绑定作回复的前台用户！']);
            }
            //入库
            $model = new \app\admin\model\CommentAudi();
            //检查回复的评论是否通过
            $pindState = $model->where(['msgid' => $pid, 'groupid' => $groupid])->value('state');
            if ($pindState == 2) {
                return $this->sucJson(['status' => 0, 'msg' => '请先通过评论的审核！']);
            }
            //使用当前登录后台用户回复
            $data = [
                'uid' => $bind_user_id,
                'groupid' => $groupid,
                'state' => $pindState,
                'content' => $content,
                'msgid' => 0,
                'pmsgid' => $pid,
                'createtime' => time(),
                'updatetime' => time(),
            ];
            $res = $model->insert($data);
            //通知消息中心
            if ($groupid > 1000000000) {
                $userModel = new \app\admin\model\User();
                $userName = $userModel->where('user_id', $bind_user_id)->value('alias');
                $content_old = $model->where('msgid', $pid)->field('content, id')->find();
                $const = 'ANSWER_LIVE_ROOM_QUESTION';
                $linkfos = ['teacherId' => $bind_user_id];
                $replaceArray = [
                    'lead' => [$userName],
                    'content' => [$userName, $content, $content_old['content']]
                ];
            } else {
                $userModel = new \app\admin\model\User();
                $userName = $userModel->where('user_id', $bind_user_id)->value('alias');
                $content_old = $model->where('msgid', $pid)->field('content, id')->find();
                $const = 'ANSWER_COURSE_ROOM_QUESTION';
                $linkfos = ['courseId' => $groupid];
                $replaceArray = [
                    'lead' => [$userName],
                    'content' => [$userName, $content, $content_old['content']]
                ];
            }
            $userIdList = [$uid];
            \MessageCenter::instance()->createMessageRecords($const, $linkfos, $replaceArray, $userIdList);
            //通知C++（C++自动更新msgid）
            $admireRpcC = new AdmireRpc();
            $msg = array(
                'srcUId' => $bind_user_id,//消息发起者userid
                'dstUId' => $uid,//聊天对象userid
                'msgType' => 0,//消息类型 0文字, 1图片, 2语音, 3视频, 4红包, 5群助手，6OGod团队，7提示消息 0
                'content' => $content,//聊天内容
                'msgId' => $content_old['id'],//msgid
                'groupId' => $groupid,//房间id
                'mastermsgId' => $pid,//父评论id
                'notifyType' => 2,//通知类型 1 审核通过;2 回复评论
                'updateId' => $content_old['id'],//如果是在管理后台回复评论需要填该字段 id
            );
            $admireRpcC->sendCommentAudit($msg);
            return $this->sucJson(['status' => $res]);
        } else {
            $this->assign('uid', $uid);
            $this->assign('pid', $pid);
            $this->assign('groupid', $groupid);
            return $this->fetch();
        }
    }

    /**
     * 删除评论
     * @name  del
     * @param $ids
     * @return \think\response\Json
     * @author Lizhijian
     */
    public function del($ids)
    {
        //删除前端相应评论
        $model = new \app\admin\model\CommentAudi();
        $rows = $model->where('id', 'in', $ids)->column('groupid, msgid');
        foreach ($rows as $k => $v) {
            \think\Db::connect(config('mongo_course_msg'))->table($k)->where('_id', $v)->delete();
        }
        //删除后端相应评论
        $res = $model->where('id', 'in', $ids)->delete();
        return $this->sucJson(['status' => $res, 'msg' => '成功', 'code' => 0]);
    }

    /**
     * 设置评论审核开关
     * @name  status
     * @return mixed
     * @author Lizhijian
     */
    public function status()
    {
        if (request()->isPost()) {
            \app\admin\service\Redis::hashSet('comment_audit_status', 'course_comment_status', input('courseStatus'));
            \app\admin\service\Redis::hashSet('comment_audit_status', 'live_comment_status', input('liveStatus'));
            \app\admin\service\Redis::hashSet('comment_audit_status', 'courseDetailStatus', input('courseDetailStatus'));
            \app\admin\service\Redis::hashSet('comment_audit_status', 'viewPointStatus', input('viewPointStatus'));
            $this->success('设置成功', 'CommentAudit/status', '', 1);
        } else {
            $res = \app\admin\service\Redis::hashGet('comment_audit_status');
            $this->assign('courseStatus', isset($res['course_comment_status']) ? $res['course_comment_status'] : 0);
            $this->assign('liveStatus', isset($res['live_comment_status']) ? $res['live_comment_status'] : 0);
            $this->assign('courseDetailStatus', isset($res['courseDetailStatus']) ? $res['courseDetailStatus'] : 0);
            $this->assign('viewPointStatus', isset($res['viewPointStatus']) ? $res['viewPointStatus'] : 0);
            return $this->fetch();
        }
    }
//--------------------------------------------------------------------------//

    /**
     * 课程详情留言列表
     * @name  courseDetailList
     * @return mixed
     * @author Lizhijian
     */
    public function courseLeaveList()
    {
        $this->setTableHeader([
            ['checkbox' => true, 'value' => 1,],
            ['field' => 'num', 'title' => '序号',],
            ['field' => 'id', 'title' => 'ID',],
            ['field' => 'series_course_name', 'title' => '系列课名称',],
            ['field' => 'course_name', 'title' => '课程名称',],
            ['field' => 'teacher_name', 'title' => '所属老师',],
            ['field' => 'content_user', 'title' => '留言人',],
            'content' => '留言内容',
            'createtime' => '留言时间',
            'reply_num' => '回复数量',
            'state' => '状态',
            ['field' => 'action', 'title' => '操作',],
        ])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');
        return $this->traitAdminTableList(function () {
            //初始化
            $model = new \app\admin\model\Leave();
            $field = 'l.*, co.class_name, co.teacher_name, co.id course_id, co.pid, co.uid course_user_id, u.alias content_user';
            $where = ['l.pid' => ['=', 0], 'l.groupid' => ['>', 1000000000]];
            //搜索回复时
            $teacher = input('teacher');
            //搜索所属老师时
            if (!empty($teacher)) {
                //（用户名->user_id->课程ID->groupid）
                $UserModel = new \app\admin\model\User();
                $temCourseId = $UserModel->alias('u')
                    ->join('course c', 'u.user_id = c.uid')
                    ->where(['u.alias' => ['like', "%{$teacher}%"]])->column('c.id');
                if ($temCourseId) {
                    foreach ($temCourseId as $v) {
                        $CourseId[] = $v + 1000000000;
                    }
                    $where['l.groupid'] = ['in', $CourseId];
                }
            }
            $data = $this->traitAdminTableQuery([
                [['course_name', ''], 'like', 'co.class_name'],
                [['content', ''], 'likeAll', 'l.content'],
                [['content_user', ''], 'likeAll', 'u.alias'],
                [['dateMin', ''], 'dateMin', 'l.createtime'],
                [['dateMax', ''], 'dateMax', 'l.createtime'],
                [['state', ''], 'eq', 'l.state'],
            ], function () use ($model, $where) {
                $model->alias('l');
                $model->where($where);
                $model->join('user u', 'l.uid = u.user_id');
                $model->join('course co', 'l.groupid-1000000000 = co.id');
                return $model;
            }, $field, 'l.id desc');
            // 处理数据
            $userIds = $pids = [];
            foreach ($data['rows'] as $item) {
                $userIds[] = $item['course_user_id'];
                $ids[] = $item['id'];
                $pids[] = $item['pid'];
            }
            //获取课程直播间所属用户名(用户ID->用户名)
            $UserModel = new \app\admin\model\User();
            $userInfo = $userIds ? $UserModel->where(['user_id' => ['in', $userIds]])->column('alias', 'user_id') : [];
            //获取系列课名（单节课pid->父系列课名）
            $CourseModel = new \app\admin\model\Course();
            $courseInfo = $pids ? $CourseModel->where('id', 'in', $pids)->column('class_name', 'id') : [];
            $result = [];
            $i = 1;
            //状态
            $this->setStatusTitle('显示', '屏蔽');
            foreach ($data['rows'] as $datum) {
                //回复数量
                $replyNum = $model::where(['pid' => $datum['id'], 'groupid' => $datum['groupid']])->value('count(1) as num');
                //是否有回复
                $href = '';
                if ($replyNum) {
                    $href = $this->urlTab('课程详情留言列表', '留言详情', 'courseLeaveDetail', [
                        'id' => $datum['id'],
                        'groupid' => $datum['groupid']
                    ]);
                }
                $action = self::showOperate([
                    $this->statusActionHtml($datum['state']) => [//审核状态
                        'class' => 'state',
                        'data-ids' => $datum['id'],
                        'data-status' => $this->getStatusHtmlDataAttr($datum['state'])
                    ],
                    '回复' => [
                        'class' => 'reply-html',
                        'data-uid' => $datum['uid'],
                        'data-pid' => $datum['id'],
                        'data-groupid' => $datum['groupid']
                    ],
                    '删除' => [
                        'class' => 'del-html',
                        'data-id' => $datum['id']
                    ],
                ]);
                if(!$href){
                    $action = "留言详情 | ". $action;
                }else{
                    $action = "<a href='$href'>留言详情</a> | ". $action;
                }
                $result[] = [
                    'num' => $i,
                    'id' => $datum['id'],
                    'series_course_name' => $datum['pid'] ? $courseInfo[$datum['pid']] : '',//系列课程名称
                    'course_name' => $datum['class_name'],//课程名称
                    'teacher_name' => $userInfo[$datum['course_user_id']],//直播间所属老师
                    'content_user' => $datum['content_user'],//留言人
                    'content' => $datum['content'],//留言内容
                    'createtime' => date('Y-m-d H:i:s', $datum['createtime']),//留言时间
                    'reply_num' => $replyNum ?: 0,//回复数量
                    'state' => $this->statusColumnHtml($datum['state']),//状态
                    'status' => $datum['state'],//状态
                    'action' => $action,
                ];
                ++$i;
            }
            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        }, function () {
            $this->assign('statusHtml', $this->statusActionHtml(null));
        });
    }

    /**
     * 观点详情留言列表
     * @name  viewPointDetailList
     * @return mixed
     * @author Lizhijian
     */
    public function viewPointLeaveList()
    {
        $this->setTableHeader([
            ['checkbox' => true, 'value' => 1,],
            ['field' => 'num', 'title' => '序号',],
            ['field' => 'id', 'title' => 'ID',],
            ['field' => 'title', 'title' => '观点名称',],
            ['field' => 'teacher_name', 'title' => '所属老师',],
            ['field' => 'content_user', 'title' => '留言人',],
            'content' => '留言内容',
            'createtime' => '留言时间',
            'reply_num' => '回复数量',
            'state' => '状态',
            ['field' => 'action', 'title' => '操作',],
        ])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');
        return $this->traitAdminTableList(function () {
            //初始化
            $model = new \app\admin\model\Leave();
            $userModel = new \app\admin\model\User();
            $field = 'l.*, v.title, v.uid view_user_id, u.alias content_user';
            $where = ['l.pid' => ['=', 0], 'l.groupid' => ['<', 1000000000]];
            //搜索时参数
            $replyUser = input('replyuser');
            $teacher = input('teacher');
            //搜索回复人时
            if (!empty($replyUser)) {
                //查询相应的父留言（用户名->user_id->groupid）
                $viewPointIds = $model->alias('l')
                    ->where(['u.alias' => ['like', "%{$replyUser}%"], 'l.pid' => ['>', 0]])//属于回复的部分
                    ->join('user u', 'l.uid = u.user_id')->column('l.groupid');
                //查询groupid in  $viewPointIds
                if ($viewPointIds) {
                    $where['l.groupid'] = ['in', array_unique($viewPointIds)];
                } else {
                    $where['l.groupid'] = ['in', 0];
                }
            }
            //搜索所属老师时
            if (!empty($teacher)) {
                //（用户名->user_id->观点ID->groupid）
                $UserModel = new \app\admin\model\User();
                $viewPointIds = $UserModel->alias('u')
                    ->join('viewpoint v', 'u.user_id = v.uid')
                    ->where(['u.alias' => ['like', "%{$teacher}%"]])->column('v.id');
                if ($viewPointIds) {
                    $where['l.groupid'] = ['in', $viewPointIds];
                }
            }
            $data = $this->traitAdminTableQuery([
                [['title', ''], 'like', 'v.title'],
                [['content', ''], 'likeAll', 'l.content'],
                [['content_user', ''], 'likeAll', 'u.alias'],
                [['dateMin', ''], 'dateMin', 'l.createtime'],
                [['dateMax', ''], 'dateMax', 'l.createtime'],
                [['state', ''], 'eq', 'l.state'],
            ], function () use ($model, $where) {
                $model->alias('l');
                $model->where($where);
                $model->join('user u', 'l.uid = u.user_id');
                $model->join('viewpoint v', 'l.groupid = v.id');
                return $model;
            }, $field, 'l.id desc');
            // 处理数据
            $viewUserIds = [];
            foreach ($data['rows'] as $item) {
                $viewUserIds[] = $item['view_user_id'];
            }
            //获取观点所属用户信息（uid->username）
            $viewUserInfo = $viewUserIds ? $userModel->where('user_id', 'in', $viewUserIds)->column('alias', 'user_id') : [];
            $result = [];
            $i = 1;
            //状态
            $this->setStatusTitle('显示', '屏蔽');
            foreach ($data['rows'] as $datum) {
                //回复数量
                $replyNum = $model::where(['pid' => $datum['id'], 'groupid' => $datum['groupid']])->value('count(1) as num');
                //是否有回复
                $href = '';
                if ($replyNum) {
                    $href = $this->urlTab('观点详情留言列表', '留言详情', 'viewPointLeaveDetail', [
                        'id' => $datum['id'],
                        'groupid' => $datum['groupid']
                    ]);
                }
                $action = self::showOperate([
                    $this->statusActionHtml($datum['state']) => [//审核状态
                        'class' => 'state',
                        'data-ids' => $datum['id'],
                        'data-status' => $this->getStatusHtmlDataAttr($datum['state'])
                    ],
                    '回复' => [
                        'class' => 'reply-html',
                        'data-uid' => $datum['uid'],
                        'data-pid' => $datum['id'],
                        'data-groupid' => $datum['groupid']
                    ],
                    '删除' => [
                        'class' => 'del-html',
                        'data-id' => $datum['id']
                    ],
                ]);
                if(!$href){
                    $action = "留言详情 | ". $action;
                }else{
                    $action = "<a href='$href'>留言详情</a> | ". $action;
                }
                $result[] = [
                    'num' => $i,
                    'id' => $datum['id'],
                    'title' => $datum['title'],//观点名称
                    'teacher_name' => $viewUserInfo[$datum['view_user_id']],//观点所属老师
                    'content_user' => $datum['content_user'],//留言人
                    'content' => $datum['content'],//留言内容
                    'createtime' => date('Y-m-d H:i:s', $datum['createtime']),//留言时间
                    'reply_num' => $replyNum ?: 0,//回复数量
                    'state' => $this->statusColumnHtml($datum['state']),//状态
                    'status' => $datum['state'],//状态
                    'action' => $action,
                ];
                ++$i;
            }
            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        }, function () {
            $this->assign('statusHtml', $this->statusActionHtml(null));
        });
    }

    /**
     * 回复留言
     * @name  replyLeave
     * @param $pid
     * @param $groupid
     * @param $uid
     * @return mixed|\think\response\Json
     * @author Lizhijian
     */
    public function replyLeave($pid, $groupid, $uid)
    {
        if (request()->isPost()) {
            $pid = input('pid');
            $uid = input('uid');
            $groupid = input('groupid');
            $content = input('content');
            //获取当前用户绑定的前台用户ID
            $adminId = $this->getAdminId();//当前登录后台用户
            $objModel = new \app\admin\model\Admin();
            $bind_user_id = $objModel->where('id', $adminId)->value('bind_user_id');
            //是否已绑定前台用户
            if (!$bind_user_id) {
                return $this->sucJson(['status' => 0, 'msg' => '请先到后台用户列表绑定作回复的前台用户！']);
            }
            //入库
            $model = new \app\admin\model\Leave();
            //检查回复的留言是否通过
            $pindState = $model->where(['id' => $pid, 'groupid' => $groupid])->value('state');
            if ($pindState == 2) {
                return $this->sucJson(['status' => 0, 'msg' => '请先通过评论的审核！']);
            }
            //使用当前登录后台用户回复
            $data = [
                'uid' => $bind_user_id,
                'groupid' => $groupid,
                'state' => $pindState,
                'content' => $content,
                'pid' => $pid,
                'createtime' => time()
            ];
            $newId = $model->insertGetId($data);
            //通知消息中心
            if ($groupid > 1000000000) {//课程
                $pInfo = $model->where(['id' => $newId, 'groupid' => $groupid])->column('groupid, uid, state', 'id');
                self::sendLeaveToMsg(1, $pInfo, $newId, $uid);
            } else {//观点
                $pInfo = $model->where(['id' => $newId, 'groupid' => $groupid])->column('groupid, uid, state', 'id');
                self::sendLeaveToMsg(2, $pInfo, $newId, $uid);
            }
            return $this->sucJson(['status' => 1]);
        } else {
            $this->assign('uid', $uid);
            $this->assign('pid', $pid);
            $this->assign('groupid', $groupid);
            return $this->fetch();
        }
    }

    /**
     * 删除留言
     * @name  delLeave
     * @param $ids
     * @return \think\response\Json
     * @author Lizhijian
     */
    public function delLeave($ids)
    {
        $model = new \app\admin\model\Leave();
        $res = $model->where('id', 'in', $ids)->delete();
        return $this->sucJson(['status' => $res, 'msg' => '成功', 'code' => 0]);
    }

    /**
     * 留言的屏蔽/显示审核状态
     * @name  changeLeaveStatus
     * @param $ids
     * @param $status
     * @param $isCourseDetail
     * @return \think\response\Json
     * @author Lizhijian
     */
    public function changeLeaveStatus($ids, $status, $isCourseDetail, $parent)
    {
        $model = new \app\admin\model\Leave();
        if ($parent == 1) {//这里是单条或多条留言
            foreach ($ids as $v) {
                $pInfo = $model->where('id', $v)->column('groupid, uid', 'id');
                if ($status == 2) {
                    return $this->sucSysJson(1, '暂不支持撤回已审核操作', 201);
                    $replysIds = $model->where('id', 'in', $ids)->column('id');
                    $ids = array_merge($ids, $replysIds);
                } else {
                    //通过审核时,通知消息中心
                    self::sendLeaveToMsg($isCourseDetail, $pInfo, $v, '');
                }
            }
        } else {//这里是单条回复
            if ($status == 2) {
                return $this->sucSysJson(1, '暂不支持撤回已审核操作', 201);
            }
            //检查父评论是否审核
            $info = $model->where('id', $ids[0])->column('pid, uid, groupid, state', 'id');//当条评论信息
            $pInfo = $model->where(['id' => $info[$ids[0]]['pid'], 'groupid' => $info[$ids[0]]['groupid']])->column('groupid, uid, state', 'id');
            $keyId = array_keys($pInfo)[0];
            if ($pInfo[$keyId]['state'] == 2) {
                return $this->sucSysJson(1, '请先通过评论的审核！', 201);
            }
            //通过审核时,通知消息中心
            if ($status == 1) {
                self::sendLeaveToMsg($isCourseDetail, $pInfo, $keyId, $info[$ids[0]]['uid']);
            }
        }
        //修改状态
        $model->closeStatus($ids, (int)$status);
        return $this->sucSysJson(1);
    }

    /**
     * 留言审核通过创建消息
     * @name  sendLeaveToMsg
     * @param $courseDetail 是否课程详情
     * @param $pingInfo 父评论信息
     * @param $pid 父评论ID
     * @param $uid 目的用户
     * @return bool
     * @author Lizhijian
     */
    public function sendLeaveToMsg($courseDetail, $pingInfo, $pid, $uid)
    {
        if ($courseDetail == 1) {//课程留言
            //获取课程信息
            $courseModel = new \app\admin\model\Course();
            $courseInfo = $courseModel->getCourseInfo($pingInfo[$pid]['groupid'] - 1000000000, 'id, pid,uid,class_name');
            //系列课还是单节课
            if ($courseInfo['pid'] != 0) {
                $pCourseInfo = $courseModel->getCourseInfo($courseInfo['pid'], 'id, class_name');
                $const = 'REVIEW_COURSE_SERIES_MESSAGE_PASS';
                $linkfos = ['courseId' => $pCourseInfo['id']];
                $replaceArray = [
                    'content' => [$pCourseInfo['class_name']]
                ];
            } else {
                $const = 'REVIEW_COURSE_MESSAGE_PASS';
                $linkfos = ['courseId' => $courseInfo['id']];
                $replaceArray = [
                    'content' => [$courseInfo['class_name']]
                ];
            }
        } else {//观点
            $const = 'REVIEW_VIEWPOINT_MESSAGE_PASS';
            $linkfos = ['viewpointId' => $pingInfo[$pid]['groupid']];
            $viewPointModel = new \app\admin\model\Viewpoint();
            $viewPointInfo = $viewPointModel->getViewPointInfo($pingInfo[$pid]['groupid'], 'title');
            $replaceArray = [
                'content' => [$viewPointInfo['title']]
            ];
        }
        $userIdList = [$uid ?: $pingInfo[$pid]['uid']];
        //创建消息
        \MessageCenter::instance()->createMessageRecords($const, $linkfos, $replaceArray, $userIdList);
    }

}