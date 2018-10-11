<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/6/6
 * Time: 10:47
 */

namespace app\admin\controller;



class GeneralizeLive extends App
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
            ['field' => 'qr_code', 'title' => '图片展示',],
            ['field' => 'action', 'title' => '操作',],
        ];
        $this->setTableHeader($header)
            ->setToolbarId('table-button-html')
            ->setTableSearchId('table-search-html');

        //查询数据表数据
        return $this->traitAdminTableList(function (){
            //当有搜索数据时执行
            $model = new \app\admin\model\RelatedIntroduction();
            $field = '*';
            //生成数据表
            $data = $this->traitAdminTableQuery([], function () use ($model) {
                $model->where('type',4);
                return $model;
            }, $field, 'create_time desc');

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
                $qr_code = $datum['qr_code'];
                //模板数据返回
                $result[] = [
                    'id' => $datum['id'],
                    'title' => $datum['title'],
                    'qr_code' => "<img src='$qr_code' style='height: 80px;width: 80px;' onclick=\"_showBig('{$qr_code}')\" >",
                    'action' => $action,
                ];
            }
            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        }, function () {
            $model = new \app\admin\model\RelatedIntroduction();
            $toaal = $model->where('type',4)->count();
            $this->assign('total',$toaal);
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
        $model = new \app\admin\model\RelatedIntroduction();
        //获取get过来的ID
        $id = trim(request()->param('id',null));
        //如果是get请求的
        if (request()->isGet()){
            //id不为空便是编辑需要获取用户数据
            if (!empty($id)){
                $info = $model::get($id);
                //如果没有用户数据的话便提示用户数据异常
                if (empty($info)) return $this->errSysJson(['code'=>400,'msg'=>'用户异常！']);
                $info['type'] = $model->getType();
                $info['content'] = json_decode($info['content'],true);
                //用户数据返回给前端
                $this->assign('info',$info);
            }else{
                //当id为空是添加返回id为null给前端做判断
                $data = [
                    'id'=>null,
                    'qr_code'=>self::em,
                    'type'  => $model->getType(),
                    'icon'=>null,
                    'content'=>null,
                ];

                $this->assign('info',$data);
            }
        }
        //post请求是执行数据库操作
        if (request()->isPost()){
            //组装保存数据
            $arr =[
                'title'=>trim(request()->param('title',null)),
                'qr_code'=>trim(request()->param('qr_code',null)),
                'icon'=>trim(request()->param('icon',null)),
                'starttime'=>trim(request()->param('starttime',null)),
                'endtime'=>trim(request()->param('endtime',null)),
                'sort'=>trim(intval(request()->param('sort',null))),
            ];
            //数据验证
            if (empty($arr['title'])) return $this->errSysJson(['code'=>400,'msg'=>'必填参数不能为空']);
            if ($arr['icon']=='endplay'){
                if (empty($arr['starttime'])&& empty($arr['endtime']))$this->errSysJson(['code'=>400,'msg'=>'请设置视频结束展示时间']);
                if (strtotime(date("Y-m-d {$arr['starttime']}:s"))>= strtotime(date("Y-m-d {$arr['endtime']}:s"))) return $this->errSysJson(['code'=>400,'msg'=>'开始时间必须小于结束时间']);
            }
            if ($arr['icon']=='right'){
                if (empty($arr['sort']))$this->errSysJson(['code'=>400,'msg'=>'请填写排序']);
            }
            //判断是更新还是新增
            if (!empty($id)){
                return $this->sucSysJson($model->QRCodeSave(request()->param(),$id,'更新',4));
            }else{
                //数据验证
                if (empty($arr['qr_code'])) return $this->errSysJson(['code'=>400,'msg'=>'请上传图片！']);
                return $this->sucSysJson($model->QRCodeSave($arr,false,'新增',4));
            }
        }
        return $this->fetch();
    }//
}