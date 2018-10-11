<?php

namespace app\admin\controller;


class LiveCate extends App
{
    use \app\admin\traits\Common,
        \app\admin\traits\AdminTable,
        \app\admin\traits\Status;
    
    
    /**
     * 列表页
     * 
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function index()
    {
    
        $this->setTableHeader([
            ['checkbox' => true, 'value' => 1,],
            ['field' =>'id', 'title' => 'ID',],
            ['field' =>'name', 'title' => '一级分类',],
            ['field' => 'pic', 'title' => '图标',],
            ['field' => 'statusText', 'title' => '状态', 'class' => 'column-status'],
            ['field' => 'sort', 'title' => '排序',],
            ['field' => 'action', 'title' => '操作', 'class' => 'action-action'],
        ])->setToolbarId('table-button-html')->setTableSearchId('table-search-html')->setNoPage();
    

        $floorCate = [-1 => '一级分类'];
        $model = new \app\admin\model\LiveCate();
    
        return $this->traitAdminTableList(function ()use($model){
        
            $field = 'lc.id, lc.pid, lc.name, lc.sort, lc.status';
        
            $data = $this->traitAdminTableQuery([
                [['name', ''], 'like', 'lc.name'],
                [['floorCate', ''], 'eq', 'lc.pid', function ($arr){ // 将1级分类的-1改为0
                    if (isset($arr[1]) && $arr[1] == -1) {
                        $arr[1] = 0;
                    }
                    
                    return $arr;
                }],
                [['status/i', 0], 'eq', 'lc.status'],
            ], function ()use ($model){
                return $model->alias('lc')->where('type', 1);
            }, $field, 'lc.sort asc, lc.id asc');
    
    
            $result = $floorTemp = $twoTemp = [];
            if (!empty($data['rows'])) {
                $picDomain = config('QnPIC_DOMAIN');
                
                $i = 0;
                foreach ($data['rows'] as $datum) {
                    $name = $datum['name'];
                    $action = self::showOperate($this->indexActionArr($datum));
    
                    if (!empty($datum['pid'])) {
                        $name = '----' . $name;
                    }
                    
                    $temp = [
                        'no' => $i,
                        'id' => $datum['id'],
                        'pid' => $datum['pid'],
                        'name' => $name,
                        'pic' => !empty($datum['icon']) ?
                            '<img src="' . url_join($picDomain, $datum['icon']) . '" alt="分类图片" />' : '',
                        'statusText' => $this->statusColumnHtml($datum['status']),
                        'sort' => $datum['sort'],
                        'action' => $action,
                        
                        'status' => $datum['status']
                    ];
                    
                    if (empty($datum['pid'])) { // 一级分类
                        $floorTemp[] = $temp;
                    }else{ // 二级分类
                        $twoTemp[$datum['pid']][] = $temp;
                    }
                
                    ++$i;
                }
    
    
                if (!empty($floorTemp)) {
                    foreach ($floorTemp as $item) {
                        $result[] = $item;
                        
                        if (array_key_exists($item['id'], $twoTemp)){
                            $result = array_merge($result, $twoTemp[$item['id']]);
                        }
                    }
                }else{ // 没有一层
                    $result = array_merge(...$twoTemp);
                }
                
            }
        
            return $this->sucJson([
                'rows' => $result,
                'total' => $data['total'],
            ]);
        }, function ()use($floorCate, $model){
        
            $this->assign('floorCate', $floorCate + $model->getFloorCate());
            $this->assign('searchStatusArr', $this->searchStatusArr('状态'));
            $this->assign('columnStatusHtml', $this->statusColumnHtml(null));
            $this->assign('actionStatusHtml', $this->statusActionHtml(null));
        });
    }
    
    
    /**
     * @param $datum
     * @param $statusHtml
     * @return array
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function indexActionArr($datum)
    {
        $actionArr = [];
        $actionArr['编辑'] = [
            'class'   => 'edit-cate',
            'data-id' => $datum['id'],
            'data-pid' => $datum['pid'],
        ];
        
        if (empty($datum['pid'])) { // 一级分类
            $actionArr['添加子分类'] = [
                'class'   => 'add-cate',
                'data-id' => $datum['id'],
            ];
        }
        $actionArr[$this->statusActionHtml($datum['status'])] = [
            'class'       => 'action-status',
            'data-ids'     => $datum['id'],
            'data-status' => $this->getStatusHtmlDataAttr($datum['status']),
            'data-pid' => $datum['pid'],
        ];
//        $actionArr['删除'] = [
//            'class'   => 'del-cate',
//            'data-id' => $datum['id'],
//        ];
        
        return $actionArr;
    }
    
    
    /**
     * 删除分类
     *
     * @param $ids
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function delCate($ids)
    {
        $this->error('已关闭此功能');
        $this->validateByName();
        $model = new \app\admin\model\LiveCate();
        $ids = array_filter((array)$ids);
        if (empty($ids)) {
            return $this->sucSysJson(1);
        }
        $deleteFunc = function ($id) use ($model) {
            !empty($id) && $model->where(['id' => ['in', $id]])->delete();
        };
        
        $data = $model->where(['id' => ['in', $ids]])->field('pid, id')->select();
    
        $floorId = $deleteId = [];
        foreach ($data as $datum) {
            if (empty($datum['pid'])){ // 一级
                $floorId[] = $datum['id'];
            }else{
                $deleteId[] = $datum['id'];
            }
        }
    
        // 检测一级
        $deleteFloorId = $model->checkFloorCate($floorId);
    
        $deleteFunc($deleteId);
        $deleteFunc($deleteFloorId);
        
        return $this->sucSysJson(1);
    }
    
    
    /**
     * 新增/编辑子分类
     *
     * @param int $id
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function saveCate($id = 0)
    {
        $id = (int)$id;
        $request = $this->request;
        $model = new \app\admin\model\LiveCate();
        
        // 文案处理
        $childrenCateText = '分类名称';
        $postPid = $request->post('parentCate/i');
        $floorSelected = input('floorSelected/i', 0);
        $floorCate = ['顶级分类'] + (new \app\admin\model\LiveCate())->getFloorCate(null);
        $notHide = true;
        if (empty($id)) { // 新增
            $data = [];
            $second = false;
            $func = 'insert';
    
            if (empty($floorSelected)) {
                $floorSelected = -1;
            }
            
        }else { // 编辑
            $data = [];
            $assign = $model->where(['id' => $id])->find();
    
            if (empty($assign)) {
                return $this->errSysJson('不存在的分类');
            }
            
            $this->assign('data', $assign);
            $func = 'update';
            $second = ['id' => $id];
            
            if (empty($assign['pid'])) { // 一级分类
                $postPid = 0; // 一级分类不允许修改为二级
                $floorSelected = -1;
            }else{ // 二级分类
                $childrenCateText = '子分类名称';
                $notHide = false;
                $floorSelected = $assign['pid'];
            }
        }
        $this->assign('floorCateSelected', $floorSelected);
    
    
        if ($request->isPost()) { // 保存
            $data['pid'] = $postPid;
            $data['name'] = $request->post('cateName', '');
            $data['status'] = $request->post('status/i');
            $data['sort'] = $request->post('sort/i');
            $data['type'] = 1;
    
            if (empty($data['name'])) {
                return $this->errSysJson(\app\common\controller\JsonResult::ERR_CATE_NAME_NOT_EMPTY);
            }
            
            $model->$func($data, $second);
    
            if ($data['status'] == 1 && !empty($data['pid'])) { // 检测上级
                $model->update(['status' => 1], ['id' => $data['pid']]);
            }
            
            return $this->sucSysJson(1);
        }
        
        
        $this->assign('childrenCateText', $childrenCateText);
        $this->assign('floorCate', $floorCate);
        $this->assign('notHide', $notHide);
        
        return $this->fetch();
    }
    
    
    /**
     * 修改分类状态
     *
     * @param $ids
     * @param $status
     * @return \think\response\Json
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function changeStatus($ids, $status)
    {
        $this->validateByName();
        
        $model = new \app\admin\model\LiveCate;
        $ids = array_filter((array)$ids);
        if (!empty($ids)) {
            $model->update(['status' => (int)$status], ['id' => ['in', $ids]]);
            $model->update(['status' => (int)$status], ['pid' => ['in', $ids]]);
        }
        
        return $this->sucSysJson(1);
    }
    
    
}