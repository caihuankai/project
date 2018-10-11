<?php

namespace app\wechat\model;

use app\common\model\ModelBs;
use think\Db;

/**
 * 留言模型
 * Class Leave
 * @package app\wechat\model
 * Fashion:
 */
class Leave extends ModelBs
{
    /**
     * 获取某个课程或者观点的留言列表
     * @name  getLeaveMsgListByType
     * @param $type $type=1时取课程留言，type=2时取观点留言
     * @param $id $type=1时为课程ID，type=2时为观点ID
     * @param int $userId 用户ID
     * @param int $pageNo 页数
     * @return array
     * @author Lizhijian
     */
    public function getLeaveMsgListByType($type, $id, $userId = 0, $pageNo, $perPage = 20)
    {
        //初始化
        $where = [];
        if ($type == 1) {
            $id += 1000000000;
            //课程所属
            $CourseModel = new Course();
            $teacherId = $CourseModel->where('id', $id - 1000000000)->value('uid');
            //当前助教信息
            $assistantId = Db::table('talk.talk_user_assistant')->where('teacher_id', $teacherId)->value('user_id');
        } else {
            //观点所属
            $viewModel = new Viewpoint();
            $teacherId = $viewModel->where('id', $id)->value('uid');
            //当前助教信息
            $assistantId = Db::table('talk.talk_user_assistant')->where('teacher_id', $teacherId)->value('user_id');
        }

        $where['groupid'] = $id;
        //是否个人留言
        $pwhere = [];
        if ($userId) {
            $where['uid'] = $userId;
        } else {
            $where['l.state'] = 1;
            $pwhere['l.pid'] = 0;
        }
        //查询
        $master = $this
            ->alias('l')
            ->join('talk_user u', 'l.uid = u.user_id')
            ->page($pageNo, $perPage)
            ->where($where)->where($pwhere)
            ->order('l.updatetime', 'desc')
            ->field('l.*, u.alias, u.vip_level, u.head_add, u.user_level, u.user_type, u.is_assistant, from_unixtime(l.createtime) as createtime, from_unixtime(l.updatetime) as updatetime')
            ->fetchClass('\CollectionBase')->select();
        //回复列表
        foreach ($master as $k => $v) {
            $master[$k]['replyList'] = $this
                ->alias('l')
                ->join('talk_user u', 'l.uid = u.user_id')
                ->order('l.updatetime', 'desc')
                ->where(['groupid' => $id, 'state' => 1, 'pid' => $v['id']])
                ->field('l.*, u.alias, u.vip_level, u.head_add, u.user_level, u.user_type, u.is_assistant, from_unixtime(l.createtime) as createtime, from_unixtime(l.updatetime) as updatetime')
                ->fetchClass('\CollectionBase')->select();
        }

        //是否嘉宾
        if ($master) {
            foreach ($master as $k => $v) {
                $isInvitation = Db::table('talk.talk_invitationcard_user')->where([
                    'user_id' => $v['uid'],
                    'create_time' => ['>=', date('Y-m-d', time())],
                    'create_card_class' => $id - 1000000000,
                    'type' => 2
                ])->value('id') ? 1 : 0;

                //是否邀请嘉宾
                $master[$k]['is_invitation'] = $isInvitation;
                //是否当前课程或直播间讲师
                $master[$k]['is_master'] = ($teacherId == $v['uid']) ? 1 : 0;
                //是否当前课程助教
                $master[$k]['is_course_assistant'] = ($assistantId == $v['uid']) ? 1 : 0;
                //回复
                if ($v['replyList']) {
                    foreach ($v['replyList'] as $kk => $vv) {
                        $isInvitation = Db::table('talk.talk_invitationcard_user')->where([
                            'user_id' => $vv['uid'],
                            'create_time' => ['>=', date('Y-m-d', time())],
                            'create_card_class' => $id - 1000000000,
                            'type' => 2
                        ])->value('id') ? 1 : 0;
                        //是否邀请嘉宾
                        $master[$k]['replyList'][$kk]['is_invitation'] = $isInvitation;
                        //是否当前课程或直播间讲师
                        $master[$k]['replyList'][$kk]['is_master'] = ($teacherId == $vv['uid']) ? 1 : 0;
                        //是否当前课程助教
                        $master[$k]['replyList'][$kk]['is_course_assistant'] = ($assistantId == $vv['uid']) ? 1 : 0;
                    }
                }
            }
        }
        return $master;
    }

    /**
     * 添加留言
     * @name  addLeaveMsg
     * @param array $data ——入库数据
     * @return int|string
     * @author Lizhijian
     */
    public function addLeaveMsg(array $data)
    {
        $res = $this->insert($data);
        return $res;
    }

    /**
     * 修改留言
     * @name  editLeaveMsg
     * @param int $leaveId ——留言ID
     * @param string $content ——留言内容
     * @return false|int|string
     * @author Lizhijian
     */
    public function editLeaveMsg($leaveId, $content)
    {
        $res = $this->where('id', $leaveId)->update(['content' => $content, 'updatetime' => time()]);
        return $res >= 0 ? 1 : 0;
    }

    /**
     * 删除留言
     * @name  delLeaveMsg
     * @param $leaveId
     * @return bool
     * @author Lizhijian
     */
    public function delLeaveMsg($leaveId)
    {
        $info = $this->where('id', $leaveId)->field('id, pid, state')->find();
        //判断是留言还是回复
        if ($info['pid'] == 0) {//如果是父留言则把其下所有回复都一起删除
            $ids = $this->where('pid', $info['id'])->whereOr('id', $info['id'])->column('id', 'id');
        } else {
            $ids = $info['id'];
        }
        //删除
        $res = $this->where('id', 'in', $ids)->delete();
        return $res >= 0 ? 1 : 0;
    }

    /**
     * 检查父留言ID是否正确
     * @name  checkPid
     * @param $type ——1为课程，2为观点
     * @param $pid  ——type=1时为课程ID，type=2时为观点ID
     * @return bool|mixed
     * @author Lizhijian
     */
    public function checkPid($type, $pid)
    {
        $groupid = $this->where('id', $pid)->value('groupid');

        if (!$groupid) {
            return false;
        }
        if ($type == 1 && $groupid < 1000000000) {
            return false;
        }
        return $groupid;
    }

    /**
     * 检查留言是否空
     * @name  checkNull
     * @param $leaveId
     * @return bool
     * @author Lizhijian
     */
    public function checkNull($leaveId)
    {
        $res = $this->where('id', $leaveId)->value('id');
        if (empty($res)) {
            return false;
        }
        return true;
    }

    /**
     * 更新父留言的时间
     * @name  updatePTime
     * @param $leaveId
     * @return int
     * @author Lizhijian
     */
    public function updatePTime($leaveId)
    {
        //查找父ID
        $hasPid = $this->where('id', $leaveId)->value('pid');
        if ($hasPid) {
            $leaveId = $hasPid;
        }
        //更新时间
        $res = $leaveId ? $this->where('id', $leaveId)->update(['updatetime' => time()]) : 0;
        return $res >= 0 ? 1 : 0;
    }
}
