<?php

namespace app\admin\traits;

/**
 * 改变tinyint字段
 *
 * @property mixed $changeTinyintIdName = 'id';
 * @uses \app\admin\traits\Common   依赖\app\admin\traits\Common类
 * @package app\admin\traits
 */
trait changeTinyintController
{
    use \app\admin\traits\AdminTableToolbar;
    
    private function getChangeTinyintIdNameTrait()
    {
        return $this->getCurrentModelPk();
    }
    
    
    
    /**
     * 修改状态
     *
     * @param $ids
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    public function changeTinyint($ids)
    {
        $this->validateByName('common.ids');
        /** @var \think\Request $request */
        $request = $this->request;
        $field = $request->param('field');
        $value = $request->param('value');
    
        if (empty($field)) {
            return $this->errSysJson(\app\common\controller\JsonResult::ERR_PARAMETER);
        }
        
        /** @var \app\common\traits\MysqlTinyintModel|\app\common\model\ModelBase $model */
        $model = $this->getCurrentModel();
        $tinyint = $model->getMysqlTinyint($field);
    
        $model->startTrans();
        try{
            if (
                !empty($ids) &&
                $tinyint->ifActionTrue($value, 'changeTinyint') && // 正确请求
                $this->changeTinyintLocalFilterFunc($ids, $field, $value) // 自定义请求过滤
            ) { // 可设置的value
        
        
                $idName = $this->getChangeTinyintIdNameTrait();
                $ids = (array)$ids;
                if ($model->getLocalEvent() instanceof \app\admin\event\EventApp) { // 用于事件修改
                    $model->getLocalEvent()->$idName = $ids;
                }
        
                // 执行更新
                $where = [$idName => ['in', $ids]];
                $model->where($where); // 触发before_update事件，给event传参
                $model->update([
                    $field => $value,
                ], $where); // 避免出现内部select导致用掉where
        
            }
            $model->commit();
        }catch (\Exception $exception){
            \think\log::error('后台修改状态报错');
            $model->rollback();
        }
        $errorMsg = $model->getError();
    
        // 不过多提示错误
        return !$errorMsg ? $this->sucSysJson(1) : $this->errSysJson($errorMsg);
    }
    
    
    /**
     * 自定义过滤验证
     *
     * @param $ids
     * @param $field
     * @param $value
     * @return bool
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function changeTinyintLocalFilterFunc(&$ids = '', $field = '', $value = '')
    {
        return true;
    }
    
}