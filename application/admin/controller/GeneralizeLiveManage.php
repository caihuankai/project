<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/7/16
 * Time: 11:04
 */

namespace app\admin\controller;


use app\admin\model\LiveGeneralize;

class GeneralizeLiveManage extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status,
        \app\admin\traits\ImgReset;
    const em = 'http://oqt46pvmm.bkt.clouddn.com/Ft56ta8EDC03VFYIHzFuSjcv5E5_';
    /**
     * 主页
     * @return mixed
     */
    public function index()
    {
        //设置表头
        $header = [
            ['field' =>'id', 'title' => 'ID',],
            ['field' => 'title', 'title' => '名称',],
            ['field' => 'src', 'title' => '图片展示',],
            ['field' => 'action', 'title' => '操作',],
        ];
        $this->setTableHeader($header)
            ->setToolbarId('table-button-html')
            ->setTableSearchId('table-search-html');

        //查询数据表数据
        return $this->traitAdminTableList(function (){
            //当有搜索数据时执行
            $model = new \app\admin\model\LiveGeneralize();
            $field = '*';
            //生成数据表
            $data = $this->traitAdminTableQuery([], function () use ($model) {
                return $model;
            }, $field, 'create_time desc,sort asc');

            $result = [];
            //处理数据
            foreach ($data['rows'] as $k => $datum) {
                //生成操作按钮
                $action = self::showOperate([
                    '编辑' =>  [
                        'id' => $datum['id'],
                        'src' => "javascript:_edit('{$datum['id']}');"
                    ],
                    '删除' =>  [
                        'id' => $datum['id'],
                        'src' => "javascript:_delect('{$datum['id']}');"
                    ],
                ]);
                $qr_code = $datum['src'];
                //模板数据返回
                $result[] = [
                    'id' => $datum['id'],
                    'title' => $datum['title'],
                    'src' => "<img src='$qr_code' style='height: 80px;width: 80px;' onclick=\"_showBig('{$qr_code}')\" >",
                    'action' => $action,
                ];
            }
            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        }, function () {
        });
    }//end

    /**
     * 主页
     * @return mixed
     */
    public function live()
    {
        //设置表头
        $header = [
            ['field' =>'id', 'title' => 'ID',],
            ['field' => 'title', 'title' => '名称',],
            ['field' => 'password', 'title' => '密码',],
            ['field' => 'action', 'title' => '操作',],
        ];
        $this->setTableHeader($header)
            ->setToolbarId('table-button-html')
            ->setTableSearchId('table-search-html');

        //查询数据表数据
        return $this->traitAdminTableList(function (){
            //当有搜索数据时执行
            $model = new \app\admin\model\Live();
            $field = 'id,name,password,adapt';
            //生成数据表
            $data = $this->traitAdminTableQuery([], function () use ($model) {
                $model->where('id',10000);
                return $model;
            }, $field, 'id desc');

            $result = [];
            //处理数据
            foreach ($data['rows'] as $k => $datum) {
                //生成操作按钮
                $action = self::showOperate([
                    '编辑' =>  [
                        'id' => $datum['id'],
                        'src' => "javascript:_edit('{$datum['id']}');"
                    ],
                ]);

                //模板数据返回
                $result[] = [
                    'id' => $datum['id'],
                    'title' => empty($datum['name'])? '推广直播间':$datum['name'],
                    'password' => empty($datum['password'])? '未加密':$datum['password'],
                    'action' => $action,
                ];
            }
            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        }, function () {

        });
    }//end

    /**
     * 添加或者编辑二维码
     * @return mixed|\think\response\Json
     * @throws \think\Exception\DbException
     */
    public function upload()
    {
        //实例化数据库
        $model = new \app\admin\model\LiveGeneralize();
        //获取get过来的ID
        $id = trim(request()->param('id',null));
        //如果是get请求的
        if (request()->isGet()){
            //id不为空便是编辑需要获取用户数据
            if (!empty($id)){
                $info = $model::get($id);
                //如果没有用户数据的话便提示用户数据异常
                if (empty($info)) return $this->errSysJson(['code'=>400,'msg'=>'用户异常！']);
                $info['select']= $model->getType();
                //用户数据返回给前端
                $this->assign('info',$info);
            }else{
                //当id为空是添加返回id为null给前端做判断
                $data = [
                    'id'=>null,
                    'src'=>self::em,
                    'select'=>$model->getType(),
                    'type'=>null,
                    'sort'=>null,
                ];

                $this->assign('info',$data);
            }
        }
        //post请求是执行数据库操作
        if (request()->isPost()){
            //组装保存数据
            $arr =[
                'title'=>trim(request()->param('title',null)),
                'src'=>trim(request()->param('src',null)),
                'type'=>trim(request()->param('type',null)),
                'sort'=>trim(intval(request()->param('sort',null))),
            ];
            //数据验证
            if (empty($arr['title'])) return $this->errSysJson(['code'=>400,'msg'=>'必填参数不能为空']);

            if ($arr['type']=='right'){
                if (empty($arr['sort']))$this->errSysJson(['code'=>400,'msg'=>'请填写排序']);
            }
            //判断是更新还是新增
            if (!empty($id)){
                return $this->sucSysJson($model->DataSave(request()->param(),$id,'更新'));
            }else{
                //数据验证
                if (empty($arr['src'])) return $this->errSysJson(['code'=>400,'msg'=>'请上传图片！']);
                return $this->sucSysJson($model->DataSave($arr,false,'新增'));
            }
        }
        return $this->fetch();
    }//

    /**
     * 删除
     * @return \think\response\Json
     */
    public function delectDataByID()
    {
        if(request()->isPost()){
            $model = new LiveGeneralize();
            $id = request()->param('id',null);
            if (empty($id))  return $this->errSysJson('数据异常！');
            // 启动事务
            $model->db()->startTrans();
            try{
                $result = $model::destroy($id);
                // 提交事务
                $model->db()->commit();
                if ($result){
                    return $this->sucSysJson('','删除成功');
                }else{
                    return $this->errSysJson('删除失败！');
                }
            } catch (\Exception $e) {
                // 回滚事务
                $model->db()->rollback();
            }
        }else{
            return $this->errSysJson('非法请求');
        }
    }//

    public function editPassword()
    {
        $id = request()->param('id',10000);
        $model = new \app\admin\model\Live();
        if (request()->isGet()){
            $data = $model->where('id',$id)->field('id,password,adapt')->find();
            $this->assign('info',$data);
        }
        if(request()->isPost()){
            $pass = request()->param('password',null);
            $adapt = request()->param('adapt',false);
            if (strlen($pass)>4)  return $this->errSysJson('密码不能超个四位数！');
            // 启动事务
            $model->db()->startTrans();
            try{
                $updatedata = [
                    'adapt' => $adapt == intval(1)?$adapt:intval(2),
                    'password'=>$adapt == true?$pass:null,
                ];
                $result = $model
                        ->where('id',$id)
                        ->update($updatedata);

                // 提交事务
                $model->db()->commit();
                if ($result){
                    return $this->sucSysJson($updatedata,'编辑成功');
                }else{
                    return $this->errSysJson('编辑失败！');
                }
            } catch (\Exception $e) {
                // 回滚事务
                $model->db()->rollback();
            }
        }
        return $this->fetch();
    }//
}