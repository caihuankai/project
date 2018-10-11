<?php

namespace app\admin\model;





class IndexRecommend extends \app\common\model\IndexRecommend
{
	
	
	protected static $mysqlTinyintMap = [
			'status' => [
					1 => [
							'title' => '启用',
							'next' => 2,
							'changeTinyint' => true,
							'changeTinyintTitle' => '{{title}}',
							'columnHtml' => '{{title}}',
					],
					2 => [
                            'title' => '停用',
							'next' => 1,
							'changeTinyint' => true,
							'changeTinyintTitle' => '{{title}}',
							'columnHtml' => '<span class="c-red">{{title}}</span>',
					],
			],
			'type' => [ // 1为明星流量主（用户id），2为精品课程（课程id），3为名师推荐（空间id），4为深度阅读（观点id），5为人气直播（用户id）
					1 => [ // 明显流量主
							'key' => 'userFlow',
							'th_pic' => '头像',
							'th_name' => '昵称',
							'th_inc' => '本周收益提升',
							'ifUserId' => true,
					],
					2 => [
							'key' => 'course',
							'th_name' => '课程标题',
							'th_inc' => '本周增长率',
					],
					3 => [
							'key' => 'live',
							'th_pic' => '背景图',
							'th_name' => '昵称',
							'th_inc' => '人气增长率',
					],
					4 => [
							'key' => 'viewpoint',
							'th_name' => '观点标题',
					],
					5 => [ // 人气直播
							'key' => 'userHot',
							'th_pic' => '缩略图',
							'th_name' => '名称',
							'ifUserId' => true,
					],
			],
			'type-select' => [
					1 => [
							'title' => '首页焦点图',
					],
					2 => [
							'title' => '人气直播',
					],
					3 => [
							'title' => '名师推荐',
					],
					4 => [
							'title' => '精品课程',
					],
					5 => [
							'title' => '明星流量主',
					],
					6 => [
							'title' => '深度阅读',
					],
					7 => [
							'title' => '课程推荐页-焦点图',
					],
					8 => [
							'title' => '课程推荐页-免费试听',
					],
					9 => [
							'title' => '课程推荐页-精选好课',
					],
			],
	];
	
	
	protected $typeSelectMap = [
			'userList' => [4,5,6,7,8,9], // 用户列表
			'userListNoLive' => [2,3,4,5,6,7,8,9], // 用户列表  没有直播间  通过字符串拼接
			'userListFlow' => [4,6,7,8,9], // 用户列表的流量主用户
			'userListFlowNoLive' => [2,3,4,6,7,8,9], // 用户列表的流量主用户   没有直播间  通过字符串拼接
			'flowList' => [2,3,4,6,7,8,9], // 流量主列表
			'liveList' => [4,5,6,7,8,9], // 空间列表
			'courseList' => [2,3,5,6], // 课程列表
			'viewpointList' => [2,3,4,5,7,8,9], //观点列表
	];
	
	
	
	/**
	 * @return array
	 */
	public function getTypeSelectMap($key)
	{
		return isset($this->typeSelectMap[$key]) ? $this->typeSelectMap[$key] : [];
	}
    
    
    /**
     * 添加数据
     *
     * @param $type
     * @param $typeId
     * @param $save
     * @return bool|false|int|string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function addData($type, $typeId, $save = [])
    {
        if (empty($type) || empty($typeId)) {
            return false;
        }
        if ($this->where(['type' => $type, 'type_id' => $typeId])->find()) {
            return $this->setError('重复推荐');
        }
        
        $save['type'] = $type;
        $save['type_id'] = $typeId;
        $save['admin_id'] = \app\admin\model\Admin::getCurrentAdminId();
        
        return $this->insertGetId($save);
	}
	
	
}