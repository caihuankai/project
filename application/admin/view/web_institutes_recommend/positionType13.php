<script src="/lib/bootstrap-datetime/js/bootstrap-datetimepicker.min.js"></script>
<script src="/lib/bootstrap-datetime/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
<link rel="stylesheet" href="/lib/bootstrap-datetime/css/datetimepicker_blue.css" type="text/css">
<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i>首页
    <span class="c-gray en">&gt;</span>
    <script>document.write(getQueryString('tabName1'))</script>
    <span class="c-gray en">&gt;</span>
    <script>document.write(getQueryString('tabName2'))</script>
    <a class="btn btn-success radius r" style="line-height:1em;height: 2em;"
       href="javascript:location.replace(location.href);" title="刷新">
        <i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="form-inline" align="center">
    <div id="toolbar" class="btn-group">
  </div>
  <!--工具按钮结束-->
    <div class="form-group">
        <input type="text" class="form-control input-text" placeholder="名称" id="name" name="name">
        <input type="text" placeholder="开始时间" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="form-control input-text Wdate" name="create_time_min">
        -
        <input type="text" placeholder="结束时间" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="form-control input-text Wdate" name="create_time_max">
        <span>
        <select name="relevanceType" id="relevanceType" class="form-control form-select" >
            <{if $positionType eq 10 || $positionType eq 15 || $positionType eq 16 || $positionType eq 18 || $positionType eq 23}>
                <option value="0">跳转类型</option>
                <option value="4">专题课介绍页</option>
                <option value="9">系列课介绍页</option>
                <option value="10">特训班预告页</option>
            <{elseif $positionType eq 12}>
                <option value="0">跳转类型</option>
                <option value="10">特训班预告页</option>
            <{elseif $positionType eq 21}>
                <option value="0">跳转类型</option>
                <option value="7">外链</option>
                <option value="10">特训班预告页</option>
            <{elseif $positionType eq 22}>
                <option value="0">跳转类型</option>
            <{else /}>
                <option value="0">跳转类型</option>
                <option value="7">外链</option>
                <option value="4">专题课介绍页</option>
                <option value="9">系列课介绍页</option>
                <option value="10">特训班预告页</option>
                <option value="6">讲师介绍页</option>
            <{/if}>
        </select>
        <select name="adStatus" id="adStatus" class="form-control form-select" >
            <option value="">状态</option>
            <option value="1">正常</option>
            <option value="-1">已停用</option>
        </select>
        <span>

        </span>
        <button type="submit" onclick="javascript:$('button[name=\'refresh\']').click();" class="btn btn-success radius" id="" name="">
        <i class="Hui-iconfont">&#xe665;</i>搜索</button>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <div class="mt-20">
            <table id="userListTable">
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $table = $('#userListTable');
    var g_editUrl = '/WebInstitutesRecommend/editPositionType13';
    var url = '#';
    var g_windowHight = '510';

    $(function () {
        $('#time').datetimepicker({
            minView: "month", //选择日期后，不会再跳转去选择时分秒
            format: "yyyy-mm-dd", //选择日期后，文本框显示的日期格式
            language: 'zh-CN', //汉化
            autoclose: true //选择日期后自动关闭
        });

        //调用函数，初始化表格
        initTable();

        //点击删除
        $("#btn_delete").click(function () {
            $("#btn_delete").prop('disabled', true);
            var ids = getIdSelections();
            delect_array(ids);
        })
    });
    function initTable() {
        //先销毁表格
        $table.bootstrapTable('destroy');
        //初始化表格,动态从服务器加载数据
        $table.bootstrapTable({
            url: url,
            method: 'POST',
            contentType: "application/x-www-form-urlencoded",
            striped: true,  //表格显示条纹
            pagination: true, //启动分页
            showRefresh: true,     //是否显示刷新按钮
            sortable: true,      //是否启用排序
            sortOrder: "DESC",   //排序方式
            clickToSelect: true,  //是否启用点击选中行
            // height: 550,   //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
            uniqueId: "adId",   //每一行的唯一标识，一般为主键列
            cardView: false,   //是否显示详细视图
            toolbar: "#toolbar",
            showColumns: true,
            columns: [
            {
                checkbox: true,
                value: 1
            },
            {
                field: 'adId',
                title: 'ID'
            },{
                field: 'remark',
                title: 'PC缩略图'
            }, {
                field: 'adName',
                title: '名称'
            }, 
            <{if $positionType neq 22}>
            {
                field: 'target_type_name',
                title: '广告跳转类型'
            }, {
                field: 'adURL',
                title: '跳转地址'
            },
            {
                field: 'clickNum',
                title: '（推荐／总）  点击量'
            },
            <{/if}>
            {
                field: 'createTime',
                title: '添加时间'
            },{
                field: 'adStatusInfo',
                title: '状态'
            }, {
                field: 'operatorName',
                title: '操作人'
            },{
                field: 'adSort',
                title: '排序'
            }, {
                field: 'operate',
                title: '操作'
            },  ],
            pageSize: 10,  //每页显示的记录数
            pageNumber: 1, //当前第几页
            pageList: [5, 10, 15, 20, 25],  //记录数可选列表
            sidePagination: "server", //表示服务端请求
            //设置为undefined可以获取pageNumber，pageSize，username，sortName，sortOrder
            //设置为limit可以获取limit, offset, search, sort, order
            queryParamsType: "undefined",
            queryParams: function queryParams(params) {   //设置查询参数
                var param = {
                    pageNumber: params.pageNumber,
                    pageSize: params.pageSize,
                    order: params.sortOrder,
                    orderName: params.sortName,
                    name: $.trim($('#name').val()),
                    adStatus: $.trim($('#adStatus').val()),
                    open_status: $.trim($('#open_status').val()),
                    logmin: $.trim($('#logmin').val()),
                    logmax: $.trim($('#logmax').val()),
                    order_number: $.trim($('#order_number').val()),
                    relevanceType: $.trim($('#relevanceType').val()),
                };
                return param;
            },
            onLoadSuccess: function () {  //加载成功时执行
                layer.msg("加载成功", {time: 1000});
            },
            onLoadError: function () {  //加载失败时执行
                layer.msg("加载数据失败");
            }
        });
    }

    //点击删除
    $("#btn_add").click(function () {
        add();
    })
    function recomment_edit(id) {
        title = '编辑素材';
        url = g_editUrl;
        w = '';
        h = '510';
        layer_show(title, url + '/id/' + id + '/positionType/'+'<{$positionType}>', w, h);
    }

    function getIdSelections() {
        return $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.adId
        });
    }
    $table.on('check.bs.table uncheck.bs.table ' +
        'check-all.bs.table uncheck-all.bs.table', function () {
        $("#btn_delete").prop('disabled', !$table.bootstrapTable('getSelections').length);
        selections = getIdSelections();
    });
</script>