<?php
namespace app\wechat\controller;

use think\Config;
use think\Request;
use app\common\controller\ControllerBase;
use think\Db;

use think\controller\Rest;
use think\db\Query;

/**
 * 首页（优课推荐）
 *
 * @package app\wechat\controller
 */
class Index extends App
//class Index extends Rest
{
    
    protected $noLoginAction = [
        'index',
        'test',
        'getBoutiqueCoursesModuleFixedMapList',
    ];
    
    
    /**
     * 首页（优课推荐）的banner
     *
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function banner()
    {
        $model = new \app\wechat\model\Ads();
        
        $field = 'adId,adFile,adName,adURL,adSort,relevanceType,relevanceId';
        $data = $model->where([
        		'adId' => ['>', 0], 'dataFlag' => 1, 'adStatus' => 1, 'positionType'=>7, 'relevanceType' => ['in', [3,4,5,6,7,8,9]]
        ])->field($field)->limit(8)->order('adSort asc, adId desc')->select();
    
        $result = [];
        foreach ($data as $datum) {
            $result[] = [
                'id' => $datum['adId'],
                'url' => $datum['adURL'],
                'img' => $datum['adFile'],
            	'sort' => $datum['adSort'],
            	'relevanceType' => $datum['relevanceType'],
            	'relevanceId' => $datum['relevanceId'],
            ];
        }
        
        return $this->sucSysJson($result);
    }
    
    
    /**
     * banner的点击数增加
     *
     * @param $id
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function addBannerNum($id)
    {
        $this->validateByName('common.id');
        $this->filterRepeatPost();
        
        $model = new \app\wechat\model\Ads();
        $model->where(['adId' => $id])->setInc('adClickNum');
        
        return $this->sucSysJson(1);
    }
    
    
    
    /**
     * 热门精选|最新直播
     *
     * @param int $type 1为热门精选， 2为最新直播
     * @param int $lastId 最后的id  type=2用
     * @param int $page 第几页  type=1用
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function courseList($type = 1, $lastId = 0, $page = 1)
    {
        $this->validateByName();

        $data = \CacheBase::cacheData([__METHOD__, $this->request->get()], function ()use($type, $lastId, $page){
            $limit = 10;
            $model = new \app\wechat\model\Course();
            $model->whereShow()->joinUser();
            $where = ['u.freeze' => 0];
            if ($type == 2) { // 最新直播
                $where['c.id'] = [$lastId == 0 ? '>' : '<', $lastId];
                $order = 'c.id desc';
                $model->where([])->limit($limit);
            } else {
                $model->where([])->page($page, $limit);
                $order = 'c.study_num desc, c.id desc';
            }
    
            $field = 'c.id, c.live_id, c.uid, c.level, c.class_name, c.study_num, c.price, c.begin_time, c.src_img, c.type, c.plan_num, c.form';
            $data = $model->where($where)->alias('c')
                ->field($field)->fetchClass('\CollectionBase')
                ->order($order)->select();
    
            $result = [];
            if (!empty($data)) {
                $userIds = $data->column('uid');
        
                $userData = (new \app\wechat\model\User())->getUserColumn($userIds);
                
                //检查是否为系列课
                $pidList = [];
                foreach ($data as $item) {
                	if ($item['type'] == 2) {
	                	$pidList[] = $item['id'];
                	}
                }
                //查询系列课现有子课程数量
                if (!empty($pidList)) {
                	$childCourseNumList = $model->getChildCourseNum($pidList);
                }
        
                foreach ($data as $item) {
                	$tmp = [
                			'id' => $item['id'],
                			'img' => \helper\UrlSys::handleIndexImg($item['src_img']),
                			'name' => $item['class_name'],
                			'liveName' => !empty($userData[$item['uid']]) ? $userData[$item['uid']] : '', // v2.0改为用户名
                			'num' => $item['study_num'],
                			'date' => $this->disDate($item['begin_time'], 2),
                			'price' => $item['level'] == 2 ? (float)$this->disPrice($item['price']) : '',
                			'type' => $item['type'],
                			'planNum' => $item['plan_num'],
                			'form' => $item['form'],
                			'level' => $item['level'],
                	];
                	if ($item['type'] == 2) {
                		$tmp['childCourseNum'] = isset($childCourseNumList[$item['id']]) ? $childCourseNumList[$item['id']] : 0;
                	}
                	$result[] = $tmp;
                }
            }
    
    
            return $result;
        });
        
        return $this->sucSysJson($data);
    }
    
    /**
     * 课程推荐页获取推荐内容
     * 免费试听：type=6
     * 精选好课：type=7
     * @return \think\response\Json
     */
    public function getIndexRecommendForCourseTab()
    {
    	$this->validateByName();
    	$type = $this->request->param('type/i');
    	$model = new \app\wechat\model\IndexRecommend();
    	$maxNum = 3;
    	$totalCount = $model->where('type', $type)->where('status', 1)->count('1');
    	$randNumMax = $totalCount - 101;
    	if ($randNumMax < 10) {
    		$randNumMax = 0;
    	}
    	$offset = rand(0, $randNumMax);
    	$indexRecommendIdList = $model->where('type', $type)->where('status', 1)->field('id')->limit($offset, 100)->select();
    	$total = count($indexRecommendIdList);
    	$idList = [];
    	if ($total > 0) {
    		$maxNum = $maxNum < $total ? $maxNum : $total;
    		$randKeys = array_rand($indexRecommendIdList, $maxNum);
    		foreach ($randKeys as $randKey) {
    			$idList[] = $indexRecommendIdList[$randKey]['id'];
    		}
    	}
    	
    	$data = [];
    	if (!empty($idList)) {
	    	$field = null;
	    	if ($type == 6) {
	    		$field = 'c.id, c.class_name,c.type';
	    	}elseif ($type == 7) {
	    		$field = 'c.id, c.uid, c.level, c.class_name, c.study_num, c.price, c.src_img, c.type, c.plan_num, c.form';
	    	}
	    	$data = $model->alias('i')->where('i.id', 'in', $idList)->join('talk_course c', 'i.type_id = c.id')->field($field)->select();
    	}
    	
    	$result = [];
    	if (!empty($data)) {
    		if ($type == 6) {
    			$result = $data;
    		}elseif ($type == 7) {
    			
    			//检查是否为系列课
    			$pidList = $userIds = [];
    			foreach ($data as $item) {
    				$userIds[] = $item['uid'];
    				if ($item['type'] == 2) {
    					$pidList[] = $item['id'];
    				}
    			}
    			//查询系列课现有子课程数量
    			if (!empty($pidList)) {
    				$childCourseNumList = (new \app\wechat\model\Course())->getChildCourseNum($pidList);
    			}
    			
    			$userData = (new \app\wechat\model\User())->getUserColumn($userIds);
    			
    			foreach ($data as $item) {
    				$tmp = [
    						'id' => $item['id'],
    						'img' => \helper\UrlSys::handleIndexImg($item['src_img']),
    						'name' => $item['class_name'],
    						'liveName' => !empty($userData[$item['uid']]) ? $userData[$item['uid']] : '', // v2.0改为用户名
    						'num' => $item['study_num'],
    						'price' => $item['level'] == 2 ? (float)$this->disPrice($item['price']) : '',
    						'type' => $item['type'],
    						'planNum' => $item['plan_num'],
    						'form' => $item['form'],
    						'level' => $item['level'],
    				];
    				if ($item['type'] == 2) {
    					$tmp['childCourseNum'] = isset($childCourseNumList[$item['id']]) ? $childCourseNumList[$item['id']] : 0;
    				}
    				$result[] = $tmp;
    			}
    		}
    	}
    	
    	$return = [
    			'total'=>$totalCount,
    			'result'=>$result
    	];
    	
    	return $this->sucSysJson($return);
    }
    
    /**
     * 课程推荐页获取用户课程表
     * @return \think\response\Json
     */
    public function getUserSyllabus()
    {
    	$userId = $this->getUserId();
    	$liveIds = (new \app\wechat\model\LiveFocus())->where('user_id', $userId)->where('robot', 2)->column('live_id');
    	
    	$result = [];
    	if (!empty($liveIds)) {
    		$field = 'id,class_name,type';
    		$model = new \app\wechat\model\Course();
    		$sql = $model->whereOr(function ($query) use ($liveIds) {
    			$query->where('live_id', 'in', $liveIds)->where('type', 2)->where('publish_time', '>', date('Y-m-d'));
    		})->whereOr(function ($query) use ($liveIds) {
    			$query->where('live_id', 'in', $liveIds)->where('type', 1)->where('begin_time', '>', date('Y-m-d H:i:s'));
    		})->field($field)->limit(3)->fetchSql(true)->select();
    		//上面的查询直接执行报错，用原生查询正常
    		$result = $model->db()->query($sql);
    	}
    	
    	return $this->sucSysJson($result);
    }
    
    
    
    public function _empty($name) 
    {
        echo 'cant found method: '.$name;
    }
    
    
    /**
     * 首页
     *
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function index()
    {
        return $this->fetch('/index');
    }
    
    
    /**
     * 优课推荐
     *
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function weChatIndex()
    {
        echo '优课推荐';
    }
    
    
    
    
    /**
     * 获取七牛上传token
     *
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function getUploadToken()
    {
        $class = new \Qiniu();
        $token = $class->getUploadToken();
        
        return $this->sucSysJson($token);
    }
    
    
    /**
     * ajax获取七牛bucket的域名
     *
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function getBucketDomain()
    {
        return $this->sucSysJson(\Qiniu::instance()->getBucketDomain());
    }


    /**
     * 返回首页-精品课程模块固定图
     * @name  getBoutiqueCoursesModuleFixedMapList
     * @param int $resourceClassificationId
     * @return \think\response\Json
     */
    public function getBoutiqueCoursesModuleFixedMapList(){
        $res = Db::table('talk_admin.talk_resource')
            ->alias('r')
            ->field('r.resourceId, r.resourceClassificationId, r.resourceURL, r.resourceTip, r.dataFlag, r.createTime, r.remark')
            ->join('talk_admin.talk_resource_classification rc','r.resourceClassificationId = rc.resourceClassificationId', 'left')
            ->where(['rc.resourceClassificationName'=>['like','%精品课程模块%'], 'r.dataFlag'=>1, 'rc.dataFlag'=>1])
            ->select();
        
        if($res){
            foreach ($res as $k => $v){
                $data[$v['remark']][] = $v;
            }
            return $this->sucJson(['code'=>200, 'mag'=>'', 'data'=>$data]);
        }else{
            return $this->sucJson(['code'=>200, 'mag'=>'', 'data'=>'']);
        }
    }
}
