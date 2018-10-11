<?php
namespace app\admin\model;

use app\common\controller\JsonResult;
use app\common\model\ModelBase;
use think\Request;
use think\Db;
use think\config;

use Qiniu\Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;

use think\Loader;
use Thrift\Protocol\TBinaryProtocol;
//use Thrift\ThriftStub\RPC_Group_Push\TChatSvrClient;
use Thrift\Transport\THttpClient;

class Badword extends ModelBase{
	/**
	 * 分页
	 */
	public function pageQuery(){
		$where = [];
		$where['a.dataFlag'] = 1;
		
		$CreateTimeMin = input('create_time_min');
		$CreateTimeMax = input('create_time_max');
		if(!empty($CreateTimeMax) && !empty($CreateTimeMin))$where['a.createTime'] = ['between time',array($CreateTimeMin,$CreateTimeMax)];
		
		return Db::connect('bs_db_config')->name('badword')->alias('a')
					->field('id,replacement,findpattern,status,sort,createTime,remark')
		            ->where($where)->order('id desc')
		            ->order('id','asc')
		            ->paginate(input('DataTables_Table_0_length/d'));
	}
	
	public function getById($id){
		//return $this->get(['id'=>$id,'dataFlag'=>1]);
		return Db::connect('bs_db_config')->table('talk_badword')->where('id',$id)->where('dataFlag',1)->find();
	}
	
	/**
	 * 新增
	 */
	public function add(){
		$data = input('post.');
		$data['createTime'] = date('Y-m-d H:i:s');	
		$data['operatorId'] = $_SESSION['adminSess']['admin']['id'];
		$data['operatorName'] = $_SESSION['adminSess']['admin']['username'];
		
		Db::startTrans();
		try{
			// $result = $this->allowField(true)->save($data);
			$result = Db::connect('bs_db_config')->table('talk_badword')->insert($data);
			$action = 1;
			$value = $data['findpattern'];
			$replace = $data['replacement'];
			$this->censorRPC($action, $value, $replace);
			Db::commit();
		} catch (\Exception $e) {
			Db::rollback();
		}
		
		if($result){
			return 1;
		}else{
			return -1;
		}
	}
	
    /**
	 * 编辑
	 */
	public function edit(){	
		$data = input('post.');
		$data['createTime'] = date('Y-m-d H:i:s');
		$data['operatorId'] = $_SESSION['adminSess']['admin']['id'];
		$data['operatorName'] = $_SESSION['adminSess']['admin']['username'];
		//$result = $this->allowField(true)->save($data,['id'=>(int)$data['id']]);
		
		Db::startTrans();
		try{
			$result = Db::connect('bs_db_config')->table('talk_badword')->update($data);
	
			$action = 2;
			$value = $data['findpattern'];
			$replace = $data['replacement'];
			$this->censorRPC($action, $value, $replace);
			Db::commit();
		} catch (\Exception $e) {
			Db::rollback();
		}
			
		if($result){
			return 1;
		}else{
			return -1;
		}
	}
	
	/**
	 * 删除
	 */
    public function del(){
		$id = (int)input('get.id/d');
		//$result = Db::name('badword')->setField(['id'=>$id,'dataFlag'=>-1]);
		
		Db::startTrans();
		try{	
			$result = Db::connect('bs_db_config')->name('badword')->setField(['id'=>$id,'dataFlag'=>-1]);
			
			$findpattern = Db::connect('bs_db_config')->table('talk_badword')->where('id',$id)->value('findpattern');
			$replacement = Db::connect('bs_db_config')->table('talk_badword')->where('id',$id)->value('replacement');
	
			$action = 3;
			$value = $findpattern;
			$replace = $replacement;
			$this->censorRPC($action, $value, $replace);
			Db::commit();
		} catch (\Exception $e) {
			Db::rollback();
			$result = false;
		}
		
		if(false !== $result){
			return 1;
        }else{
			return -1;
			$result = false;
        }	
	}
	
	/**
	 * 停用
	 */
    public function adStop(){
		$id = (int)input('get.id/d');
		
		Db::startTrans();
		try{
			$result = Db::connect('bs_db_config')->name('badword')->setField(['id'=>$id,'status'=>-1]);
		
			$findpattern = Db::connect('bs_db_config')->table('talk_badword')->where('id',$id)->value('findpattern');
			$replacement = Db::connect('bs_db_config')->table('talk_badword')->where('id',$id)->value('replacement');
			
			$action = 3;
			$value = $findpattern;
			$replace = $replacement;
			$this->censorRPC($action, $value, $replace);
			Db::commit();
		} catch (\Exception $e) {
			Db::rollback();
			$result = false;
		}
		
		if(false !== $result){
			return 1;
		}else{
			return -1;
		}	
}
	
	/**
	 *启用
	 */
    public function adStart(){
		$id = (int)input('get.id/d');
		
		Db::startTrans();
		try{
			$result = Db::connect('bs_db_config')->name('badword')->setField(['id'=>$id,'status'=>1]);
			
			$findpattern = Db::connect('bs_db_config')->table('talk_badword')->where('id',$id)->value('findpattern');
			$replacement = Db::connect('bs_db_config')->table('talk_badword')->where('id',$id)->value('replacement');
			
			$action = 1;
			$value = $findpattern;
			$replace = $replacement;
			$this->censorRPC($action, $value, $replace);
			Db::commit();
		} catch (\Exception $e) {
			Db::rollback();
			$result = false;
		}
		
		if(false !== $result){
			return 1;
        }else{
			return -1;
        }	
	}
	
	/**
	* 修改排序
	*/
	public function changeSort(){
		$id = (int)input('id');
		$sort = (int)input('sort');
		$result = $this->setField(['id'=>$id,'sort'=>$sort]);
		if(false !== $result){
        	return 1;
        }else{
        	return -1;
        }
	}

   /**
	*敏感词过滤[审查]
	*@param string $content
	*@param array $badwords
	*return mixed
	*/
	//function censor($content,$badwords){
	function censor($content){
		$where['status'] =  1;
		$where['dataFlag'] =  1;
		$badwords = Db::name('badword')
					->field('replacement,findpattern')
		            ->where($where)
		            ->select();
		
		$rt_content = '';
		if(is_array($badwords)){
			for($i=0;$i<count($badwords);$i++){//应用For循环语句对敏感词进行判断
				$rt_content=preg_replace($badwords[$i]['findpattern'],$badwords[$i]['replacement'],$content);
				$content = $rt_content;
				//if($i%9==0)
				//{
				//usleep(1000);
				//}
			}
		}
		return $rt_content;
	}
	
	//action 1:add 2:modify 3:del
	//更新RPC库
	function censorRPC($action, $value, $replace){
		//require_once ROOT_PATH.'/extend/Thrift/ThriftStub/RPC_Group_Push/TPushMsg.php';
		
		require_once ROOT_PATH.'/extend/Thrift/ChatSvr/TChatSvr.php';
		//require_once ROOT_PATH.'/extend/Thrift/ChatSvr/Types.php';
		
		// Loader::import('Thrift.ChatSvr.TChatSvr');
		// Loader::import('Thrift.ChatSvr.Types');
		
		//调用RPC通知c++     -开始
		try {
			//210.56.212.27:16050
			// $transport = new THttpClient(config('RPC_IP'), config('RPC_PORT'));
			//$transport = new THttpClient("210.56.212.27", "16050"); //测试环境
			$transport = new THttpClient(config('RPC_IP'), config('RPC_PORT'));
			$transport->setTimeoutSecs(30);
			$protocol = new TBinaryProtocol($transport);
			// $client = new TChatSvrClient($protocol);
			$client = new \TChatSvrClient($protocol);

			$transport->open();//建立连接
			//$client->handle_voice_callback($inputKey,$code,$key); //调用通知
			$client->handle_keyword_action($action, $value, $replace);

			$transport->close();
		} catch (\Exception $e) {
			\think\Log::write('调用RPC失败:' . $e->getMessage(),'rpc');
			return $this->errorJson(JsonResult::ERR_RPC_ERROR);
			// return $this->errJson(['code' => 0, 'msg' => '调用RPC更新敏感词失败']);
		}

	}
	
}
