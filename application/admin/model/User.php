<?php

namespace app\admin\model;


/**
 * 前台用户表
 *
 * @package app\common\model
 */
class User extends \app\common\model\User
{
    use \traits\DataPage;

	
	
	protected static $mysqlTinyintMap = [
	    'user_type' => [
	        1 => [
	            'title' => '正式用户',
                'search-attr' => 1,
            ],
	        2 => [
	            'title' => '马甲',
                'search-attr' => 2,
            ],
        ],
	    'vip_level' => [
            3 => [
                'title' => 'VIP会员',
                'search-attr' => 3,
            ],
        ],
    ];
	
	
	/**
	 * 获取用户类型的文案
	 *
	 * @return array|string
	 * @author liujuneng
	 */
	public function getUserTypeText($userType, $vipLevel = null)
	{
	    if (!empty($vipLevel)){
	        return $this->getMysqlTinyint('vip_level')->get(3);
        }else if (!empty($userType)) {
            return $this->getMysqlTinyint('user_type')->get($userType);
        }else if (is_null($userType) && is_null($vipLevel)){
	        return $this->getMysqlTinyint('user_type')->getList();
        }else {
	        return '';
        }
	}
    
    /**
     * 后台课程详情页
     *
     * @param $userId
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public static function adminForegroundUserDetailsUrlHtml($userId, $userName = null)
    {
        $url = url('ForegroundUser/details', ['userId' => $userId]);
    
        if ($userName === null) {
            return $url;
        }
        
        return "<a href='{$url}'>{$userName}</a>";
    }
    
    
    /**
     * 获取所有老师
     *
     * @author aozhuochao
     */
    public function getAllTeacher(callable $func, $field = 'user_id', array $extendWhere = [])
    {
        $this->dataPageTrait(function ($page, $num)use($func, $field, $extendWhere){
            $this->where($extendWhere);
            $data = $this->whereShow()->where(['user_level' => 2])->page($page, $num)->field($field)->select();
            $func(
                $data, $page, $num
            );
        });
    }


    
    

    
    
    /**
     * 改变直播间状态，默认屏蔽
     *
     * @param     $ids
     * @param int $status
     * @return $this
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function closeStatus($ids, $status = 1)
    {
        $ids = array_filter((array)$ids);
        if (empty($ids)) {
            return $this;
        }
    
        /** @var \app\admin\event\User $event */
        $event = $this->getLocalEvent();
        !is_null($event) && ($event->userIds = $ids);
        
        return $this->update(['freeze' => $status], ['user_id' => ['in', $ids]]);
    }
    
    
    /**
     * 统计用户的课程数
     *
     * @param array $userIds
     * @return array
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function countUserBeCourseNum(array $userIds)
    {
        if (empty($userIds)) {
            return [];
        }
        /** @var \app\admin\model\Live $model */
        $model = model('live');
    
        return $model->where(['l.user_id' => ['in', $userIds]])->alias('l')->group('l.user_id')
            ->join('course c', 'l.id = c.live_id and c.`status` <> 5')
            ->field('count(c.id) num, l.user_id')
            ->fetchClass('\CollectionBase')->select()->column('num', 'user_id');
    }
    
    
    /**
     * 检测手机号
     *
     * @param     $tel
     * @param int $userId
     * @return int
     * @author aozhuochao
     */
    public function checkUserTel($tel, $userId = 0)
    {
        if (empty($tel)) {
            return 0;
        }
        
        if (!is_phone($tel)){ // 错误手机号
            return 4;
        }
        
        $data = $this->where(['tel' => $tel])->field('user_id, tel')->find();
        
        if (empty($data)){ // 不存在
            return 1;
        }
        
        if ($userId && $data['user_id'] == $userId){ // 当前用户
            return 2;
        }
        
        return 3;
    }
}