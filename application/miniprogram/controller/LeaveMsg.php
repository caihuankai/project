<?php

namespace app\miniprogram\controller;

use app\wechat\model\Leave;

/**
 * 留言
 * Class LeaveMsg
 * @package app\wechat\controller
 * Fashion:
 */
class LeaveMsg extends App
{
    /**
     * @var array
     */
    protected $noLoginAction = [
        'getLeaveMsgListByType'
        , 'addLeaveMsg'
        , 'editLeaveMsg'
        , 'delLeaveMsg'
        , 'getLeaveMsgStatus'
    ];

    /**
     * 获取某个课程或者观点的留言列表
     * @name  getLeaveMsgListByType
     * @param string $type ——$type=1时取课程留言，type=2时取观点留言
     * @param string $id ——$type=1时为课程ID，type=2时为观点ID
     * @param int $userId ——用户ID
     * @return \think\response\Json
     * @author Lizhijian
     */
    public function getLeaveMsgListByType($type = '', $id = '', $userId = 0, $pageNo, $perPage = 20)
    {
        //验证参数
        $this->validateByName();
        //取课程/观点留言列表
        $list = (new Leave())->getLeaveMsgListByType($type, $id, $userId, $pageNo, $perPage);
        return $this->successJson($list);
    }

    /**
     * 添加留言
     * @name  addLeaveMsg
     * @param int $userId 用户ID
     * @param int $type $type=1时取课程留言，type=2时取观点留言
     * @param int $id $type=1时为课程ID，type=2时为观点ID
     * @param string $content 内容
     * @param int $pid 父留言ID
     * @param int $teacherId 讲师ID
     * @return \think\response\Json
     * @author Lizhijian
     */
    public function addLeaveMsg($userId = 0, $type = 1, $id = 0, $content = '', $pid = 0, $teacherId = 0)
    {
        //判断是否禁言
        $res = \app\admin\service\Redis::hashGet("room_user_setting:leave:$teacherId:$userId", 'forbitchat', 0);
        if ($res) {
            return $this->errSysJson([], '您已被禁言!');
        }
        //验证参数
        $this->validateByName();
        $content = filterKeyWord($content);
        $data = [
            'uid' => $userId,
            'groupid' => $type == 1 ? ($id + 1000000000) : $id,
            'content' => $content,
            'state' => 1,
            'pid' => $pid,
            'createtime' => time(),
            'updatetime' => time()
        ];
        //pid是否正确
        $LeaveModel = new Leave();
        if ($pid) {
            $res = $LeaveModel->checkPid($type, $pid);
            if (!$res) {
                return $this->errSysJson([], '父留言id不正确');
            }
        }
        //当前助教信息
        $assistantId = \think\Db::table('talk.talk_user_assistant')->where('teacher_id', $teacherId)->value('user_id');
        //更新父留言时间
        $LeaveModel->updatePTime($pid);
        //是否需要审核(检查后台设置的审核开关状态)
        $res = \app\admin\service\Redis::hashGet('comment_audit_status');
        $m = new \app\wechat\model\User();
        if ($type == 1) {//课程详情留言
            if ($res['courseDetailStatus'] == true) {
                //学生、流量主、非当前课程助教需要审核
                $userInfo = $m->getIdentityInfo($userId, $id);
                if ($userInfo['student'] == 1 || $userInfo['flower'] == 1 || ($assistantId != $userId && $userInfo['guest'] != 1)) {
                    $data['state'] = 2;
                }
            }
        } else {
            if ($res['viewPointStatus'] == true) {
                //学生、流量主、非当前课程助教需要审核
                $userInfo = $m->getIdentityInfo($userId, $id);
                if ($userInfo['student'] == 1 || $userInfo['flower'] == 1 || ($assistantId != $userId)) {
                    $data['state'] = 2;
                }
            }
        }
        //留言用户是否当前课程讲师
        if($teacherId == $userId){
            $data['state'] = 1;
        }
        //马甲
        if(!empty($userInfo['vest'])){
            $data['state'] = 1;
        }
        //提交
        $res = (new Leave())->addLeaveMsg($data);
        //通知消息中心
        if($data['state'] == 1 && $pid){
            $userInfo = $m->getInfoById($userId);
            $courseModel = new \app\admin\model\Course();
            $courseInfo = $courseModel->getCourseInfo($id, 'id, pid,uid,class_name');
            $content_old = (new Leave())->where('id', $pid)->field('content, id')->find();
            if($type == 1){//课程留言
                if($courseInfo['pid']){
                    $const = 'ANSWER_COURSE_SERIES_QUESTION';
                    $linkfos = ['courseId' => $id];
                    $replaceArray = [
                        'lead' => [$userInfo['alias']],
                        'content' => [$userInfo['alias'], $content, $content_old['content']]
                    ];
                }else{
                    $const = 'ANSWER_COURSE_QUESTION';
                    $linkfos = ['courseId' => $id];
                    $replaceArray = [
                        'lead' => [$userInfo['alias']],
                        'content' => [$userInfo['alias'], $content, $content_old['content']]
                    ];
                }
            }else{
                $const = 'ANSWER_VIEWPOINT_QUESTION';
                $linkfos = ['viewpointId' => $id];
                $replaceArray = [
                    'lead' => [$userInfo['alias']],
                    'content' => [$userInfo['alias'], $content, $content_old['content']]
                ];
            }
            $userIdList = [$userId];
            if($linkfos) \MessageCenter::instance()->createMessageRecords($const, $linkfos, $replaceArray, $userIdList);
        }
        return $this->successJson($res);
    }

    /**
     * 修改留言
     * @name  editLeaveMsg
     * @param string $leaveId 留言ID
     * @param string $content 留言内容
     * @param string $teacherId 讲师ID
     * @return \think\response\Json
     * @author Lizhijian
     */
    public function editLeaveMsg($leaveId = '', $content = '', $teacherId = '')
    {
        //判断是否禁言
        $userId = $this->getUserId();
        if ($userId) {
            $res = \app\admin\service\Redis::hashGet("room_user_setting:leave:$teacherId:$userId", 'forbitchat', 0);
            if ($res) {
                return $this->errSysJson([], '您已被禁言!');
            }
        }
        //验证参数
        $this->validateByName();
        $LeaveModel = new Leave();
        //检查空ID
        $res = $LeaveModel->checkNull($leaveId);
        if (empty($res)) {
            return $this->errSysJson([], '查询不到该留言');
        }
        //更新父留言时间
        $LeaveModel->updatePTime($leaveId);
        //提交
        $res = $LeaveModel->editLeaveMsg($leaveId, $content);
        return $this->successJson($res);
    }

    /**
     * 删除留言
     * @name  delLeaveMsg
     * @param string $leaveId 留言ID
     * @return \think\response\Json
     * @author Lizhijian
     */
    public function delLeaveMsg($leaveId = '')
    {
        //验证参数
        $this->validateByName();
        $LeaveModel = new Leave();
        //检查空ID
        $res = $LeaveModel->checkNull($leaveId);
        if (empty($res)) {
            return $this->errSysJson([], '查询不到该留言');
        }
        //提交
        $res = $LeaveModel->delLeaveMsg($leaveId);
        return $this->successJson($res);
    }

    /**
     * 获取后台留言审核开关状态
     * @name  getLeaveMsgStatus
     * @return array|string
     * @author Lizhijian
     */
    public function getLeaveMsgStatus()
    {
        return $this->sucSysJson(\app\admin\service\Redis::hashGet('comment_audit_status'));
    }
}

