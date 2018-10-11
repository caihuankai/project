<?php

namespace app\wechat\model;


use think\Db;

class LiveCate extends \app\common\model\LiveCate
{
	/**
	 * 迭代获取下级
	 * 获取一个分类下的所有子级分类id
	 */
	public function getChild($pid=0){
		
		// $data = $this->where("dataFlag=1")->select();
		//我的直播间数据
		$data = Db::connect('bs_db_config')->query('SELECT
			talk_live_cate.pid,
			talk_live_cate.`name`,
			talk_live_cate.`code`,
			talk_live_cate.brief,
			talk_live_cate.sort,
			talk_live_cate.`status`,
			talk_live_cate.`dataFlag`,
			talk_live_cate.id
			FROM
			talk_live_cate
			WHERE
			talk_live_cate.pid=? and talk_live_cate.dataFlag = ? and talk_live_cate.status = ?',[0,1,1]);
		
		//获取该分类id下的所有子级分类id
		$ids = $this->_getChild($data, $pid, true);//每次调用都清空一次数组
		
		//把自己也放进来
		array_unshift($ids, $pid);
		
		//return $ids;
		return $data;
	}
	public function _getChild($data, $pid, $isClear=false){
		static $ids = array();
		if($isClear)//是否清空数组
			$ids = array();
		foreach($data as $k=>$v)
		{
			if($v['pid']==$pid && $v['dataFlag']==1)
			{
				$ids[] = $v['id'];//将找到的下级分类id放入静态数组
				//再找下当前id是否还存在下级id
				$this->_getChild($data, $v['id']);
			}
		}
		return $ids;
	}


    /**
     * 创建分类接口(目前用于前端创建固定/自定义分类)
     * @name  createLiveCate
     * @param $userId 用户ID
     * @param $name 分类名
     * @param int $type 类型 1：课程；2：观点；3:固定观点标题；4:自定义观点标题
     * @return int|string
     */
	public function createLiveCate($userId, $name){
	    $hasId = $this->where('name',$name)->value('id');
	    if(!$hasId){
            $createId = $this->insertGetId([
                'status' => 1,
                'name' => $name,
                'type' => 4,
                'user_id' => $userId
            ]);
        }else{
            $createId = 0;
        }
	    return $createId;
    }

    /**
     * 修改分类
     * @name  editLiveCate
     * @param $cateId 分类ID
     * @param $name 分类名
     * @return int|string
     */
    public function editLiveCate($cateId, $name){
        $res = $this->where('id', $cateId)->update(['name'=>$name]);
        return $res;
    }

    /**
     * 删除分类
     * @name  delLiveCate
     * @param $cateId
     * @return int 分类ID
     */
    public function delLiveCate($cateId){
        $res = $this->where('id', $cateId)->delete();
        return $res;
    }

    /**
     * 获取标题分类的创建人
     * @name  hasPermissions
     * @param $cateId
     * @return mixed
     */
    public function hasPermissions($cateId){
        $hasPermissionsUserId = $this->where(['id'=>$cateId, 'type'=>4])->value('user_id');
        return $hasPermissionsUserId;
    }

    /**
     * 获取观点标题分类列表
     * @name  getTitleCateList
     * @param string $field 查询字段
     * @param int $status   状态
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getTitleCateList($field = '*', $status){

        $where = [//所有固定分类、自定义分类
            'type' => 3,
            'status' => $status
        ];

        return $this::where($where)->field($field)->order('sort asc')->select();
    }

    /**
     * 获取某个观点标题分类名称
     * @name  getTitleCateByViewpointId
     * @param $viewpointId  观点ID
     * @return mixed
     */
    public function getTitleCateByViewpointId($viewpointId)
    {

        $data = $this::alias('lc')
            ->join('talk_viewpoint_cate vc', 'lc.id=vc.cate_id', 'right')
            ->field('lc.id, lc.name')->where('vc.viewpoint_id', $viewpointId)->select();

        return $data;
    }

    /**
     * @name  bingViewpointTitleCate
     * @param $viewpointId  观点ID
     * @param $cateId   标题分类ID
     * @return int  提示 1：修改成功，2：重复不修改
     */
    public function bindTitleCate($viewpointId, $cateId){
        $data = ['grade'=>3, 'viewpoint_id'=>$viewpointId];
        $has = $this::table('talk_viewpoint_cate')->field('viewpoint_id, cate_id')->where($data)->find();
        if(!$has){//绑定
            $data['cate_id'] = $cateId;
            $res = $this::table('talk_viewpoint_cate')->insert($data);
        }else{//修改
            if($has['cate_id'] == $cateId){//重复修改
                $res = 2;
            }else{
                $res = $this::table('talk_viewpoint_cate')->where('viewpoint_id',$has['viewpoint_id'])->setField('cate_id',$cateId);
            }
        }
        return $res;
    }
}