<?php
namespace app\admin\model;

use app\common\model\ModelBase;
//use app\admin\controller\App;
use think\Request;
use think\Db;

class ResourceClassification extends ModelBase{
	
	/* protected $connection = [
        // 数据库类型
        'type'        => 'mysql',
        // 服务器地址
        'hostname'    => '127.0.0.1',
        // 数据库名
        'database'    => 'talk',
        // 数据库用户名
        'username'    => 'root',
        // 数据库密码
        'password'    => 'root',
        // 数据库编码默认采用utf8
        'charset'     => 'utf8',
        // 数据库表前缀
        'prefix'      => 'talk_',
        // 数据库调试模式
        'debug'       => false,
    ]; */
	
	/**
	 * 分页
	 */
	public function pageQuery(){
		$where = [];
		$where['a.dataFlag'] = 1;
		
	    $resourceClassificationName = input('resourceClassificationName');
		if(!empty($resourceClassificationName))$where['a.resourceClassificationName'] = $resourceClassificationName;
		
		
		$CreateTimeMin = input('create_time_min');
		$CreateTimeMax = input('create_time_max');
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['a.createTime'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];
		
		return Db::name('resource_classification')->alias('a')
					->field('resourceClassificationId,resourceClassificationName,resourceClassificationDescription,dataFlag,resourceClassificationCode,resourceClassificationSort,operatorId,operatorName')
		            ->where($where)->order('resourceClassificationSort asc,resourceClassificationId asc')
					->paginate(input('DataTables_Table_0_length/d'));
	}
	
	public function getById($id){
		return $this->get(['resourceClassificationId'=>$id,'dataFlag'=>1]);
	}
	/**
	 * 新增
	 */
	public function add(){
		$data = input('post.');
		
		$data['operatorId'] = $_SESSION['adminSess']['admin']['id'];
		$data['operatorName'] = $_SESSION['adminSess']['admin']['username'];
		
		$result = $this->allowField(true)->save($data);
        if(false !== $result){
			return 1;
        }else{
			return -1;
        }
	}
    /**
	 * 编辑
	 */
	public function edit(){
		$Id = (int)input('post.Id');
		$data = input('post.');
		$data['operatorId'] = $_SESSION['adminSess']['admin']['id'];
		$data['operatorName'] = $_SESSION['adminSess']['admin']['username'];
	    //$result = $this->validate('resourceId.edit')->allowField(true)->save(input('post.'),['positionId'=>$Id]);
		//$result = $this->allowField(true)->save(input('post.'),['resourceClassificationId'=>$Id]);
		$result = $this->allowField(true)->save($data,['resourceClassificationId'=>$Id]);
        if(false !== $result){
			return 1;
        }else{
			return -1;
        }
	}
	/**
	 * 删除
	 */
    public function del(array $ids){
        if (empty($ids)) {
            return true;
        }
        
	    $result = $this->update(['dataFlag'=>-1], ['resourceClassificationId'=>['in', $ids]]);
        if(false !== $result){
			return true;
        }else{
			return false;
        }
	}
	
	/**
	* 获取资源分类
	*/
	public function getResourceClassification(){

        //检测是否已有首页-精品课程模块固定图
        $where = '';
        $has = $this->alias('rc')
                    ->join('talk_resource r', 'rc.resourceClassificationId = r.resourceClassificationId', 'right')
                    ->where(['rc.resourceClassificationName'=>['like', '%精品课程模块%'], 'r.dataFlag'=>['=', 1]])
                    ->count();
        if($has>0){
            $where = 'AND resourceClassificationName NOT LIKE \'%精品课程模块%\'';
        }

        $rs = Db::query('SELECT
				talk_resource_classification.resourceClassificationName,
				talk_resource_classification.resourceClassificationId
				FROM
				talk_resource_classification
				WHERE
				talk_resource_classification.dataFlag = ? '.$where.'
				ORDER BY
				talk_resource_classification.resourceClassificationSort ASC',[1]);

		return $rs;
	}
    
}
