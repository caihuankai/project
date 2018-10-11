<?php

namespace app\admin\traits;

/**
 * 后台列表页的table的工具按钮（toolbar）
 *
 * @uses \app\admin\traits\Common   依赖\app\admin\traits\Common类
 * @uses \app\admin\traits\changeTinyintController
 * @uses \app\admin\traits\AdminTable
 * @package app\admin\traits
 */
trait AdminTableToolbar
{
    
    
    /**
     * button的id
     *
     * @return string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function getAdminTableToolbarButtonId($key = '')
    {
        static $num = 0;
    
        return 'admin-table-toolbar-' . (empty($key) ? ++$num : $key);
    }
    
    
    /**
     * 获取toolbar的div
     *
     * @return \HtmlGenerator\HtmlTag|null
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function getAdminTableToolbarDiv()
    {
        static $div = null;
        /** @var \app\admin\traits\AdminTable $this */
    
        if (is_null($div)){
            $id = 'table-button-html';
            $div = \helper\Html::createElement('div')->id($id);
            $this->setToolbarId($id);
    
    
            \think\Hook::add(\app\common\HookList::TRAIT_ADMIN_TABLE_LIST_END, [
                '_overlay' => true,
                function () use($div) {
                    // 加到主html中
                    $this->addTableOtherHtml($div);
                }
            ]);
        }
        
        return $div;
    }
    
    
    protected function addAdminTableToolbarButton($text, $id = '', array $attribute = [])
    {
        $button = $this->getAdminTableToolbarButton($text);
        if (!empty($id)) {
            $button->id($this->getAdminTableToolbarButtonId($id))->set($attribute);
        }
        
        $this->getAdminTableToolbarDiv()->addElement($button);
        
        return $this;
    }
    
    
    /**
     * 获取统一的toolbar的按钮
     *
     * @param $text
     * @return \HtmlGenerator\Markup|\helper\Html
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function getAdminTableToolbarButton($text)
    {
        return \helper\Html::createElement('button')->addClass('btn btn-primary mr-10')
            ->id($this->getAdminTableToolbarButtonId())->text($text);
    }
    
    
    /**
     * 用于\app\admin\traits\changeTinyintController::changeTinyint请求
     * 如：添加启用和禁用的两个按钮
     *
     * @return $this
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function addChangeTinyintToolbarBtn($field, $fieldIdKey = '')
    {
        /** @var \app\admin\controller\App|\app\admin\traits\Common|\app\admin\traits\AdminTable|self $this */
        /** @var \app\common\traits\MysqlTinyintModel|\app\common\model\ModelBase $model */
        
        $model = $this->getCurrentModel();
        if (!method_exists($model, 'getMysqlTinyint')) {
            $this->abortError('model未use类：\app\admin\traits\MysqlTinyintModel');
        }
        
    
        $tinyint = $model->getMysqlTinyint($field);
        $list = $tinyint->getList('changeTinyintTitle');
        if (empty($list)) {
            $this->abortError('model未定义changeTinyintTitle');
        }
    
        $div = $this->getAdminTableToolbarDiv();
        $fieldIdKey = empty($fieldIdKey) ? $this->getChangeTinyintIdNameTrait() : $fieldIdKey;
        
        foreach ($list as $val => $item) {
            $id = $this->getAdminTableToolbarButtonId();
            $div->addElement($this->getAdminTableToolbarButton($item));
            
            $this->addChangeTinyintToolbarJs($id, $field, $fieldIdKey, $val);
        }
        
        
        return $this;
    }
    
    
    /**
     * addChangeTinyintToolbarBtn方法下处理的js
     *
     * @param $id
     * @param $field
     * @param $fieldIdKey
     * @param $value
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    private function addChangeTinyintToolbarJs($id, $field, $fieldIdKey, $value)
    {
        /** @var \app\admin\controller\App|\app\admin\traits\Common|\app\admin\traits\AdminTable|self $this */
        
        $url = url('changeTinyint');
        $js = <<<JS
    $(function (){
        // 禁用和启用按钮
        $('#{$id}').click(function () {
            var ids = [];

            adminTableGetSelections(function (data){
                ids.push(data['{$fieldIdKey}']);
            });

            if (ids.length > 0) {
                requestAjax({
                    ids: ids,
                    field: "{$field}",
                    value: "$value"
                }, {
                    url: "{$url}",
                    localSuccess: function (){
                        adminTableRefresh();
                    }
                });
            }
        });
    });
JS;
        $script = \helper\Html::createElement('script')->text($js);
        $this->addTableOtherHtml($script);
    }
    
}