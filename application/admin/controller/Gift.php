<?php
/**
 * 礼物列表，删除修改
 * @author wenfeng <admin@wen0.cn>
 *
 */
namespace app\admin\controller;
use app\common\model\Gift as M;
use think\Request;


/**
 * 礼物相关
 *
 *
 */
class Gift extends App{

    /**
     * 礼物列表页面
     *
     *
     * @return html
     *
     */
    public function index(){
        if (Request::instance()->isAjax()) {
            $model = new M();
            $page = input('pageNumber', 1, 'intval');
            $size = input('pageSize', 2, 'intval');

            $map = [];
            $map['status'] = ['neq', 0];
            $map['type'] = ['in', [1]];

            $total = $model->where($map)->count();

            $list = [];
            if ($total > 0) {
                $list = $model->where($map)->page($page, $size)->order('sort', 'asc')->select();
            }
            foreach ($list as $val) {
                $val->admin_name = $this->getAdminNameById($val->admin_id);
            }
            return $this->sucJson([
                                'rows' => $list,
                                'total' => $total,
                    ]);
        }

        $type = M::giftType();
        $position = M::giftPosition();
        $status = M::giftStatus();

        $this->assign('gift_position', $position);
        $this->assign('gift_type', $type);
        $this->assign('gift_status', $status);
    	return $this->fetch("index");
    }


    protected function getAdminNameById($admin_id) {
        static $_admin_name_arr = [];
        if (!isset($_admin_name_arr[$admin_id])) {
            $admin_model = new \app\admin\model\Admin();
            $user_name = $admin_model->where(['id' => $admin_id])->value('username');
            if (!$user_name) {
                return null;
            }
            $_admin_name_arr[$admin_id] = $user_name;
        }
        return $_admin_name_arr[$admin_id];
    }


    public function del($gift_id = "") {
        $gift_id = intval($gift_id);
        if ($gift_id < 1) {
            return $this->errSysJson('参数错误');
        }
        $model = new M();
        $status = $model->where(['id' => $gift_id])->update(['status' => 0]);
        return $this->sucSysJson($status);
    }




    public function add($gift_id = 0){

        $model = new M();

        if (Request::instance()->isPost()) {
            $gift_data = [];
            $gift_data['name'] = input('name');
            $gift_data['type'] = input('type');
            $gift_data['status'] = input('status');
            $gift_data['money'] = input('money');
            $gift_data['img'] = input('img');
            $gift_data['position'] = input('position');
			$gift_data['sort'] = input('sort');
            if ($gift_id > 0) {
                $status = $model->where(['id' => $gift_id])->update($gift_data);
            } else {
                $gift_data['admin_id'] = $this->getAdminId();
                $status = $model->insert($gift_data);
            }
            return $this->sucJson(['status' => 1]);
        }

        $type = M::giftType();
        $position = M::giftPosition();
        $status = M::giftStatus();

        $this->assign('gift_position', $position);
        $this->assign('gift_type', $type);
        $this->assign('gift_status', $status);

        if ($gift_id) {
            $gift_data = $model->where(['id' => $gift_id])->find();
        }
        if (empty($gift_data)) {
            $gift_data = [];
        }

        $this->assign('gift_data', $gift_data);
        return $this->fetch('add');
    }


    public function img() {
        $file = request()->file('img');
        if (!$file) {
            return $this->error('获取上传信息失败');
        }
        $error = $file->getError();
        if ($error) {
            return $this->error($error);
        }
        $key  = md5(time().uniqid());
        $file_path =  $file->getPathname();


        $token = \Qiniu::instance()->getUploadToken();

        $uploadMgr = new \Qiniu\Storage\UploadManager();
        list($ret, $err) = $uploadMgr->putFile($token, $key, $file_path);
        if ($err !== null) {
            return $this->error('上传失败');
            return false;
        } else {
            $url = \Qiniu::instance()->handleQiNiuResultUrl($ret['key']);
            return $this->sucJson(['code'=>1, 'key' => $url]);
        }
    }


    /**
     * 支付礼物列表页面
     * @name  payIndex
     * @return mixed|\think\response\Json
     * @author Lizhijian
     */
    public function payIndex(){
        if (Request::instance()->isAjax()) {
            $model = new M();
            $page = input('pageNumber', 1, 'intval');
            $size = input('pageSize', 2, 'intval');

            $map = [];
            $map['status'] = ['neq', 0];
            $map['type'] = 2;

            $total = $model->where($map)->count();

            $list = $gift_money_max = [];
            if ($total > 0) {
                $list = $model->where($map)->page($page, $size)->select();
            }

            foreach ($list as $val) {
                $val->admin_name = $this->getAdminNameById($val->admin_id);
            }

            return $this->sucJson([
                'rows' => $list,
                'total' => $total,
            ]);
        }

        $type = M::giftType();
        $position = M::giftPosition();
        $status = M::giftStatus();

        $this->assign('gift_position', $position);
        $this->assign('gift_type', $type);
        $this->assign('gift_status', $status);

        return $this->fetch("payIndex");
    }


    /**
     * 支付礼物列表-添加/编辑记录方法
     * @name  payAdd
     * @param int $gift_id 礼物ID，大于0时为编辑方法
     * @return mixed|\think\response\Json
     * @author Lizhijian
     */
    public function payAdd($gift_id = 0){
        $model = new M();

        if (Request::instance()->isPost()) {
            $gift_data = [];
            $gift_data['name'] = input('name');
            $gift_data['type'] = input('type');
            $gift_data['status'] = input('status');
            $gift_data['money'] = input('money');
            $gift_data['money_max'] = input('money_max');
            $gift_data['img'] = input('img');

            if($gift_data['money'] > $gift_data['money_max']) return $this->sucJson(['status' => 0, 'msg' => '价格范围错误！']);

            if ($gift_id > 0) {
                $status = $model->where(['id' => $gift_id])->update($gift_data);
            } else {
                $gift_data['admin_id'] = $this->getAdminId();
                $status = $model->insert($gift_data);
            }
            return $this->sucJson(['status' => 1]);
        }

        $type = [2 => '支付兑换礼物'];
        $position = M::giftPosition();
        $status = M::giftStatus();

        $this->assign('gift_position', $position);
        $this->assign('gift_type', $type);
        $this->assign('gift_status', $status);

        if ($gift_id) {
            $gift_data = $model->where(['id' => $gift_id])->find();
        }
        if (empty($gift_data)) {
            $gift_data = [];
        }

        $this->assign('gift_data', $gift_data);
        return $this->fetch('payAdd');
    }

    /**
     * 支付礼物列表-删除记录方法
     * @name  payDel
     * @param string $gift_id
     * @return \think\response\Json
     * @author Lizhijian
     */
    public function payDel($gift_id = ""){
        $gift_id = intval($gift_id);
        if ($gift_id < 1) {
            return $this->errSysJson('参数错误');
        }
        $model = new M();
        $status = $model->where(['id' => $gift_id])->update(['status' => 0]);
        return $this->sucSysJson($status);
    }
 }



