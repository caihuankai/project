<?php

namespace app\admin\controller;


class CourseComment extends App
{
    
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable;
    
    /**
     * 课程评论列表
     *
     * @param int $id 课程id
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function index($id)
    {

        $this->validateByName('common.id');
        $reply = input('reply');

        $this->setTableHeader([
            ['checkbox' => true, 'value' => 1,],
            ['field' =>'num', 'title' => '序号',],
            ['field' =>'ID', 'title' => 'ID',],
            ['field' =>'courseName', 'title' => '课程名称',],
            ['field' => 'comment', 'title' => '讨论内容',],
            ['field' => 'reply', 'title' => '回复内容',],
            ['field' => 'commentUser', 'title' => '讨论人'],
            ['field' => 'liveName', 'title' => '所属直播间',],
            ['field' => 'createTime', 'title' => '发表时间',],
            ['field' => 'action', 'title' => '操作',],
        ])->setToolbarId('table-button-html')->setTableSearchId('table-search-html');
        $this->setTabNameThirdly('课程讨论');


        /** @var \think\mongo\Query $model */
        $model = new \app\admin\model\CourseComment();

        return $this->traitAdminTableList(function ()use($id, $reply, $model){

            $field = '_id, srcuid, msgtime, content, msgtype, master_msgid';

            //回复内容搜索
            if($reply) $this->tableWhere['content'] = ['like', $reply];

            $data = $this->traitAdminTableQuery([
                [['content', ''], 'like', 'content'],
                [['dateMin', ''], 'dateMin', 'msgtime'],
                [['dateMax', ''], 'dateMax', 'msgtime'],
            ], function () use ($model, $id){
                return $model->table($id);
            }, $field, ['_id', 'desc']);

            $result = $userIds = $liveData = $master_msgid = $userData1 = [];
            if (!empty($data['rows'])) {

                foreach ($data['rows'] as $row) {
                    $userIds[] = $row['srcuid'];
                    if(isset($row['master_msgid']) && $row['master_msgid']){
                        $master_msgid[] = $row['master_msgid'];
                    }
                }
                
                $courseData = \app\admin\model\Course::where(['id' => $id])->field('id, class_name, live_id')->find();
                if (!empty($courseData)) {
                    $liveData = \app\admin\model\Live::where(['id' => $courseData['live_id']])->field('id, name')->find();
                }
                $userData = (new \app\admin\model\User())->getUserColumn($userIds);
                //B的信息
                $masterData = $master_msgid? \think\Db::connect('mongo_course_msg')->table($id)->where('_id', 'in', $master_msgid)->select():[];
                foreach ($masterData as $k=>$v){
                    $userData1[$v['_id']] = $v;
                }
                
                $i = 1;
                $temUser = [];
                if($userData1){
                    $temIds = array_unique(array_column($userData1, 'srcuid'));
                    $temUser = (new \app\admin\model\User())->getUserColumn($temIds);
                }
                foreach ($data['rows'] as $datum) {

                    //讲师和助教master_msgid 获取回复讨论的内容
                    if(isset($datum['master_msgid']) && $datum['master_msgid'] && $userData1){//A回复B
                        //B讨论人
//                        $name = $userData1[$datum['master_msgid']]['userInfo']['is_assistant'] ==1? '(助教)':($userData1[$datum['master_msgid']]['userInfo']['user_level']==2? '(讲师)':'');//身份标识
                        $commentUser = !empty($userData1[$datum['master_msgid']]['srcuid']) ?
                            \app\admin\model\UrlHtml::goUserDetailsUrl($userData1[$datum['master_msgid']]['srcuid'], $temUser[$userData1[$datum['master_msgid']]['srcuid']]) : '';
                        $content = $userData1[$datum['master_msgid']]['content'];//B内容

                        $reply = $commentUser.'：'.$datum['content'];//A回复
                    }else{//A无回复
                        //A讨论人
                        $commentUser = !empty($userData[$datum['srcuid']]) ? \app\admin\model\UrlHtml::goUserDetailsUrl($datum['srcuid'], $userData[$datum['srcuid']]) : '';
                        $reply = '--';
                        $content = $datum['content'];
                    }
                    $result[] = [
                        'num' => $i,
                        'ID' => $datum['_id'],
                        'courseName' => $courseData['class_name'],
                        'comment' => $content,
                        'reply' => $reply,
                        'commentUser' => $commentUser,
                        'liveName' => !empty($liveData['name']) ? $liveData['name'] : '',
                        'createTime' => date('Y-m-d H:i:s', $datum['msgtime']),
                        'action' => self::showOperate([
                            '删除' => [
                                'class' => 'comment-del',
                                'data-id' => $datum['_id'],
                            ],
                        ]),
                    ];
                    
                    ++$i;
                }
            }
            

            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        }, function ()use ($id){
            $this->assign('courseId', $id);
        });
    }
    
    
    
    /**
     * 删除评论
     *
     * @param $ids
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function commentDel($ids, $id)
    {
        $this->validateByName('common.ids');
        $this->validateByName('common.id');

        config('mongo_course_msg.pk_type', ''); // 不转ObjectID
        $model = new \app\admin\model\CourseComment();
    
        if (is_array($ids)) {
            foreach ($ids as $idItem) { // 转整
                $model->where(['_id' => (int)$idItem])->table($id)->delete(); // 多条删除不知道为什么无法删除，只好单条删
            }
        } else {
            $model->where(['_id' => (int)$ids])->table($id)->delete();
        }
    
        return $this->sucSysJson(1);
    }
    
    
    /**
     * @inheritdoc
     */
    protected function disWhereLike($data)
    {
        return ['like', $data];
    }
    
    
}