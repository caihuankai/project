<?php

namespace app\admin\traits;


use think\Config;
use think\Response;


/**
 * 后台列表页
 *
 * @property \think\Request $request
 * @uses \app\admin\traits\Common   依赖\app\admin\traits\Common类
 * @package app\admin\traits
 */
trait AdminTable
{
    
    
    /**
     * 表格头部
     *
     * @var array
     */
    private $tableHeader = [];
    
    /**
     * 工具栏的id
     *
     * @var string
     */
    private $toolbarId = '';
    
    
    /**
     * 搜索框html的id
     *
     * @var string
     */
    private $tableSearchId = '';
    
    
    /**
     * 表格请求参数
     *
     * @var array
     */
    private $adminTableQueryParams = [];
    
    
    /**
     * 额外的html
     *
     * @var string
     */
    private $tableOtherHtml = '';
    
    
    /**
     * 定义改变状态的class
     *
     * @var string
     */
    protected $tableChangeTinyint = 'admin-table-change-tinyint';
    
    
    
    /**
     * 是否有分页
     *
     * @var bool
     */
    protected $noPage = false;
    
    /**
     * 是否有导出功能
     *
     * @var bool|string
     */
    protected $export = false;
    
    
    /**
     * 分页数据
     *
     * @var array
     */
    protected $adminTablePage = [
        'pageNumber' => 0,
        'pageSize' => 0,
        'order' => '',
        'orderName' => '',
    ];
    
    
    /**
     * 表格搜索条件
     *
     * @var array
     */
    protected $tableWhere = [];
    

    
    
    /**
     * 后台表格列表
     *
     * @param          $dataFunc
     * @param callable $assignFunc
     * @param string   $fetch
     * @return mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function traitAdminTableList($dataFunc, $assignFunc = null){
        // $table = 0, $pageNumber = 1, $pageSize = 10
        if(input('get.table')) { // 表单
            $this->validateByName('common.adminTable', '', 'errSysJson');
            // 复制分页数据
            $this->adminTablePage = [
                'pageNumber' => input('get.pageNumber', 1),
                'pageSize' => input('get.pageSize', 10),
                'order' => '',
                'orderName' => '',
                'export' => $this->isExport(),
            ];
            
            // 获取数据
            $data = $dataFunc($this->adminTablePage['pageNumber'], $this->adminTablePage['pageSize']);
            
            if ($data instanceof Response){
                // getData获取，就不会产生临时变量
                if (isset($data->getData()['code']) && $data->getData()['code'] === $this->success) {
                    // 导出
                    $this->tableExport($data->getData()['data']);
    
    
                    return Response::create(
                        $data->getData()['data'],
                        input('request.' . Config::get('var_JSONP_handler'), '') ? 'jsonp' : 'json'
                    );
                }else if (isset($data->getData()['rows'])){ // 表单数据
                    $this->tableExport($data->getData()['rows']);
    
                    return $data;
                }else{
                    $this->tableExport($data);
    
                    return $data;
                }
            }else{
                unset($data);
            }
        }
        
        // assign
        /** @var \app\admin\controller\App|$this $this */
        $this->setHeaderBody('include/traitAdminTableList');
        $this->assign([
            'tableHeader' => $this->tableHeader,
            'toolbarId' => $this->getToolbarId(),
            'tableSearchId' => $this->tableSearchId,
            'tableOtherHtml' => $this->tableOtherHtml,
            'tableChangeTinyint' => $this->tableChangeTinyint,
        ]);
        !empty($this->adminTableQueryParams) && $this->assign('adminTableQueryParams', $this->adminTableQueryParams);
        if ($assignFunc){
            $data = $assignFunc();
            
            if ($data instanceof Response){
                return $data;
            }else{
                unset($data);
            }
        }
    
        \think\Hook::listen(\app\common\HookList::TRAIT_ADMIN_TABLE_LIST_END);//好像没有用的！
        
        return $this->fetch();
    }
    
    
    /**
     * 表单查询
     * 示例：\app\admin\controller\Live::index
     *
     * @param \Closure|array     $whereData
     * @param \think\Model|\Closure $model
     * @param              $field
     * @param string|array $order
     * @param string       $countFieldName
     * @return array
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function traitAdminTableQuery($whereData, $model, $field, $order = '', $countFieldName = '*',$isNoPage=true)
    {
        $where = [];
        if (is_callable($whereData)) {
            $where = $whereData();
        }else if (is_array($whereData)){
            foreach ($whereData as $whereDatum) {
                $this->disWhere(...$whereDatum);
            }
            $where = $this->tableWhere;
        }
        /** @var \ThinkPHP\Query $modelFunc */
        $modelFunc = function ($model, $noPage = true) use ($where,$isNoPage){
            /** @var \ThinkPHP\Query|\Closure $model */
            $model = is_callable($model) ? $model() : $model;
            $model->where($where);

            if ($isNoPage || $noPage){
                if ((!$this->noPage && $noPage) ||!($this->export && $this->adminTablePage['export']) )
                {
                    $model->page($this->adminTablePage['pageNumber'], $this->adminTablePage['pageSize']);
                }
            }
            
            return $model;
        };
        
        return [
            'rows' => $modelFunc($model)
                ->field($field)
                ->order(...(array)$order)
                ->select(),
            'total' => $isNoPage==true? ($countFieldName === false || $this->adminTablePage['export'] ? 0 : $modelFunc($model, false)->count($countFieldName)):count($modelFunc($model, false)->select()),
        ];

    }

    /**
     * 生成表单查询的sql语句，多用于作为子查询
     * @param unknown $whereData
     * @param unknown $model
     * @param unknown $field
     * @param string $order
     * @param string $countFieldName
     * @return unknown
     * @author liujuneng
     */
    protected function traitAdminTableQueryBuildSql($whereData, $model, $field, $order = '', $countFieldName = '*')
    {
    	$where = [];
    	if (is_callable($whereData)) {
    		$where = $whereData();
    	}else if (is_array($whereData)){

    		foreach ($whereData as $whereDatum) {
    			$this->disWhere(...$whereDatum);
    		}
    		$where = $this->tableWhere;
    	}
    	/** @var \ThinkPHP\Query $modelFunc */
    	$modelFunc = function ($model) use ($where){
    		/** @var \ThinkPHP\Query|\Closure $model */
    		$model = is_callable($model) ? $model() : $model;
    		
    		$model->where($where);
    		
    		return $model;
    	};
    	
    	return $modelFunc($model)
    	->field($field)
    	->order(...(array)$order)
    	->buildSql();
    }
    
    /**
     * 处理where数据
     *
     * @param array         $postArgs  $this->request->param的参数
     * @param               $type
     * @param               $fieldKey
     * @param \Closure|null|string $handleFieldValue 处理get的值的回调
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function disWhere($postArgs, $type, $fieldKey = '', $handleFieldValue = null, $filterFunc = null)
    {
        $where = &$this->tableWhere;
        $data = $this->disWhereData($postArgs);

        $func = function ($val)use($handleFieldValue, &$where, $fieldKey, &$filterFunc, $data){
            if (
                (is_callable($filterFunc) && !$filterFunc($data)) ||
                (is_null($filterFunc) && empty($data))
            ) { // 过滤$data
                return;
            }
            $val = $this->handleFieldValue($handleFieldValue, $val);

            if ($val === false) { // false就不处理
                return;
            }
            //如果有重复字段，转为between搜索
            if(isset($where[$fieldKey]) && $where[$fieldKey][0] == '>='){//>= and <=

                if($where[$fieldKey][1] == $val[1]){
                    $val[1] = strtotime('+10 year');
                }
                $where[$fieldKey] = [
                    'between', [$where[$fieldKey][1], $val[1]]
                ];
            }elseif (!empty($fieldKey)){
                $where[$fieldKey] = $val;
            }
        };

        switch ($type){
            case 'dateMin': // 时间戳
                $data && $func(['>=', $this->getSearchDate($data, 'start')]);
                break;
            case 'dateMax':
                $data && $func(['<=', $this->getSearchDate($data, 'end')]);
                break;
            case 'dateMin-date': // 2017-8-11 17:58:56
                $data && $func(['>=', $this->getSearchDate($data, 'start', 'Y-m-d', false)]);
                break;
            case 'dateMax-date':
                $data && $func(['<=', $this->getSearchDate($data, 'end', 'Y-m-d', false)]);
                break;
            case 'dateMin-date-abbreviation': // 20170811
            	$data && $func(['>=', date('Ymd', strtotime($data))]);
            	break;
            case 'dateMax-date-abbreviation':
            	$data && $func(['<=', date('Ymd', strtotime($data))]);
            	break;
            case 'likeSingle':
                $data && $func(['like', $data]);
                break;
            case 'like':
                $data && $func($this->disWhereLike($data));
                break;
            case 'likeAll':
            	$data && $func($this->getWhereLike($data));
            	break;
            case 'eq':
                $func(['eq', $data]);
                break;
            case 'zero': // 如搜索状态，状态的值从0开始
                if (is_null($filterFunc)) { // 默认处理0的回调
                    $filterFunc = function ($data) { // 引用use
                        if ($data < 0) { // 小于0的都是不搜索
                            return false;
                        }
                        
                        return true;
                    };
                }
                $func(['eq', $data]);
                break;
            case 'in':
                $func(['in', (array)$data]);
                break;
            default:
                $where = array_merge($where, (array)$data);
                break;
        }

    }

    
    /**
     * 处理get值
     *
     * @param $handle
     * @param $val
     * @return int
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    private function handleFieldValue($handle, $val)
    {
        if (is_callable($handle)) {
            if (is_string($handle) && isset($val[1])) { // 字符串的回调函数则直接处理$val[1]（值）
                $val[1] = $handle($val[1]);
            } else {
                $val = $handle($val);
            }
        }
        
        return $val;
    }
    
    
    /**
     * 获取和保存disWhere的postArgs参数
     *
     * @param array $postArgs
     * @return array|mixed
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    private function disWhereData(array $postArgs = [])
    {
        static $data = [];
        if (!empty($postArgs)) {
            /** @var \think\Request $request */
            $request = $this->request;
            $data = $request->param(...$postArgs);
        }
        
        return $data;
    }
    
    
    
    /**
     * 处理where的like搜索
     *
     * @param $data
     * @return array
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function disWhereLike($data)
    {
        $data = trim($data, " ");
        return ['like', "{$data}%"];
    }
    
    protected  function  getWhereLike($data)
    {
        $data = trim($data, " ");
    	return ['like', "%{$data}%"];
    }
    
    protected function getSearchDiv()
    {
        static $div = null;
        if (is_null($div)) {
            $id = 'table-search-html';
            $div = \helper\Html::createElement('div')->set([
                'id' => $id
            ]);
            $this->setTableSearchId($id);
        }
        
        return $div;
    }

    /**
     * 设置搜索
     *
     * @param array $data
     * @return $this
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function setSearch(array $data)
    {
        if (empty($data)) {
            return $this;
        }
        
        
        $div = $this->getSearchDiv();
        $this->addTableOtherHtml($div);
        
        foreach ($data as $key => $item) {
            $options = [];
            if (is_callable($item)){ // 自定义，记得加js，最好别用，要加很多东西
                $item($div);
                continue;
            }if (!is_array($item)) {
                continue;
            }
            
            $name = '';
            if (is_array($item[0])){ // 数组
                $name = isset($item[0]['name']) ? $item[0]['name'] :
                    (isset($item[0]['options']) && isset($item[0]['options']['name'])?$item[0]['options']['name']:'');
                $options = isset($item[0]['options']) ? (array)$item[0]['options'] : [];
            }else if (!empty($item[0])){ // 字符串
                $name = $item[0];
            }
            
            if (empty($name)) {
                $name = "table-search-{$key}";
            }
            
            // html
            $this->addSearchInnerHtml($div, $item[1], $name, $options);
            
            if (isset($item[1])) { // 转为正确thinkphp的查询
                switch ($item[1]){
                    case 'select':
                        $item[1] = 'eq';
                        break;
                    case 'select-zero':
                        $item[1] = 'zero';
                        break;
                    default:
                        break;
                }
            }
            
            $item[0] = [$name, ''];
            $this->disWhere(...$item);
        }
        
        // 添加搜索按钮
        $temp = '';
        $this->addSearchInnerHtml($div, 'submit', $temp);
        
        return $this;
    }
    
    
    /**
     * 处理搜索内部input
     *
     * @param \helper\Html|\HtmlGenerator\Markup $div
     * @param                                    $type
     * @param                                    $name
     * @return \helper\Html|string
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    private function addSearchInnerHtml($div, $type, &$name, array $options = [])
    {
        $ele = 'input';
        $arr = [
            'id' => !empty($options['id']) ? $options['id'] : $name,
            'name' => $name,
            'class' => 'input-text admin-table-search-input-text admin-table-search-ele',
            'type' => 'text',
        ];
        $addClass = '';
    
        // css样式还没调整
        if (!empty($options['label'])) {
            $div->addElement(\helper\Html::createElement('label')->attr(['for' => $arr['id']])->text($options['label']));
        }
        
        switch ($type){
            case 'dateMin':
            case 'dateMin-date':
                $arr['id'] = $arr['name'] = 'dateMin';
                $script = \helper\Html::createElement('script')
                    ->text("$(function(){\$('#{$arr['id']}').focus(function (){WdatePicker({maxDate:'#F{\$dp.\$D(\\'dateMax\\')||\\'%y-%M-%d\\'}'})})})");
                $this->addTableOtherHtml($script);
                $addClass .= ' Wdate';
    
                if (!isset($options['placeholder'])) {
                    $options['placeholder'] = '开始时间';
                }
                
                break;
            case 'dateMax':
            case 'dateMax-date':
                $arr['id'] = $arr['name'] = 'dateMax';
                $script = \helper\Html::createElement('script')
                    ->text("$(function(){\$('#{$arr['id']}').focus(function (){WdatePicker({minDate:'#F{\$dp.\$D(\\'dateMin\\')}'})})})");
                $this->addTableOtherHtml($script);
                $addClass .= ' Wdate';
    
            if (!isset($options['placeholder'])) {
                $options['placeholder'] = '结束时间';
            }
                
                break;
            case 'select':
            case 'select-zero':
                $ele = 'select';
                $arr['class'] = 'form-control form-select admin-table-search-input-select admin-table-search-ele';
                
                if (isset($options['data']) && is_array($options['data'])) {
                    $ele = \helper\Html::select($options['data']);
                }
                
                break;
            case 'submit':
                $arr['type'] = 'submit';
                $arr['class'] = 'btn btn-success radius admin-table-search-ele';
                $arr['onclick'] = 'adminTableRefresh()';
                break;
            case 'export':
                $arr['type'] = 'submit';
                $arr['class'] = 'btn btn-success radius admin-table-search-ele'; // 和submit保持一致的class
                $arr['value'] = '导出';
                $arr['onclick'] = "adminTableExport()";
                break;
            default:
                break;
        }
        
        /** @var \helper\Html $ele */
        $ele = $div->addElement($ele)->set(array_merge($arr, $options));
        if (!empty($addClass)) {
            $ele->addClass($addClass);
        }
    
        // js
        $this->addAdminTableQueryParams("'{$arr['name']}'", "$('#{$arr['id']}').val()");
        
        // 处理引用问题
        $name = $arr['name'];
        
        return $ele;
    }
    
    
    
    /**
     * 添加额外元素
     *
     * @param \helper\Html|\HtmlGenerator\Markup $html
     * @return \helper\Html|string
     */
    protected function addTableOtherHtml(\HtmlGenerator\Markup $html)
    {
        if (empty($this->tableOtherHtml)){
            $this->tableOtherHtml = \helper\Html::createElement('div');
        }
        
        $this->tableOtherHtml->addElement($html);
        
        return $this->tableOtherHtml;
    }
    
    
    /**
     * 添加搜索请求参数
     *
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    protected function addAdminTableQueryParams($key, $value)
    {
        $this->adminTableQueryParams[$key] = $value;
        
        return $this;
    }
    
    
    
    
    /**
     * 设置表头，最终转为json
     *
     * @param array $data
     * @return $this
     * @author aozhuochao<aozhuochao@99cj.com.cn>
     */
    protected function setTableHeader(array $data)
    {
        $header = [];
        foreach ($data as $key => $item) {
            $temp = [];
            if (is_array($item) && !(isset($item['field']) || isset($item['checkbox'])) && !is_numeric($key)){ // key为field
                $temp['field'] = $key;
            }else if (is_string($item)){ // 简单方式
                $temp = ['field' => $key, 'title' => $item];
            }else{ // 默认
                $temp = $item;
            }
            
            $header[] = $temp;
        }
        
        $this->tableHeader = $header;
        
        return $this;
    }
    
    /**
     * @return string
     */
    protected function getToolbarId()
    {
        return $this->toolbarId;
    }
    
    
    /**
     * @param string $toolbarId
     * @return $this
     */
    protected function setToolbarId($toolbarId)
    {
        $this->toolbarId = $toolbarId;
        
        return $this;
    }
    
    /**
     * @param string $tableSearchId
     * @return $this
     */
    protected function setTableSearchId($tableSearchId)
    {
        $this->tableSearchId = $tableSearchId;
        
        return $this;
    }
    
    
    /**
     * @param bool $noPage
     * @return $this
     */
    protected function setNoPage($noPage = true)
    {
        $this->noPage = $noPage;
        
        return $this;
    }
    
    
    
    /**
     * 有导出功能
     * 注意调用顺序，要在setSearch后
     *
     * @param bool|string $export
     * @return AdminTable
     */
    protected function setExport($export)
    {
        $this->export = $export;
        $exportName = 'export';
        $this->addSearchInnerHtml($this->getSearchDiv(), 'export', $exportName);
        
        return $this;
    }
    
    
    /**
     * @inheritdoc
     * @author aozhuochao
     */
    protected function tableExport($data)
    {
        if ($this->adminTablePage['export']){
            /** @var \Box\Spout\Writer\CSV\Writer $csv */
            $csv = \Box\Spout\Writer\WriterFactory::create(\Box\Spout\Common\Type::CSV);
            // basename对中文支持不好，在部分系统
            $csv->openToBrowser($this->export === true || !is_string($this->export) ? 'csv.csv' : $this->export);
            if (!empty($this->tableHeader)) {
                $csv->addRow(array_column($this->tableHeader, 'title'));
            }
        
            foreach ($data as $item) {
                $csv->addRow($item);
            }
        
            abort(\think\Response::create());
            // 结束
        }
    }
    
    
    protected function isExport()
    {
        return intval(input('get.export', 0));
    }
    
    
    /**
     * 处理导出时的html和普通文案处理
     *
     * @param       $format
     * @param array ...$args
     * @return string
     * @author aozhuochao
     */
    protected function htmlHackExport($format, $exportText)
    {
        if ($this->isExport()) {
            return $exportText;
        }
        
        return sprintf($format, $exportText);
    }
    
}