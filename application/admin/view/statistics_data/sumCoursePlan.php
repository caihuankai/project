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
        <a class="btn" style="margin-right:10px;">系列课：<{$courseName}></a>
        <button onclick="exportExcel()" type="button" class="btn btn-success" style="margin-right:10px;">　导出　</button>
    </div>
    <div class="form-group">
        <input type="hidden" id="liveId" value="<{$liveId}>">
        <input type="text" placeholder="子课程名称" id="class_name" class="form-control input-text Wdate" name="create_time_min">
        <input type="text" placeholder="创建人" id="alias" class="form-control input-text Wdate" name="create_time_min">
        <input type="text" placeholder="开始时间(默认当天)"  value="<{$logmin}>" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="form-control input-text Wdate" name="create_time_min">
        -
        <input type="text" placeholder="结束时间" value="<{$logmax}>" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="form-control input-text Wdate" name="create_time_max">

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
    var url = './sumCoursePlan';
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

    });
    function initTable() {
        //先销毁表格
        //$table.bootstrapTable('destroy');
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
            uniqueId: "id",   //每一行的唯一标识，一般为主键列
            cardView: false,   //是否显示详细视图
            toolbar: "#toolbar",
            showColumns: true,
            columns: [
            {
                field: 'id',
                title: 'ID'
            },{
                field: 'class_name',
                title: '子课程名称'
            }, {
                field: 'alias',
                title: '创建人'
            },{
                field: 'history_total',
                title: '历史人数'
            },{
                field: 'total',
                title: '总停留时长（分）'
            },{
                field: 'speak_total',
                title: '总发言次数'
            },{
                field: 'ave_total',
                title: '人均停留时长（分）'
            },{
                field: 'ave_speak_total',
                title: '人均发言次数'
            }],
            pageSize: 10,  //每页显示的记录数
            pageNumber: 1, //当前第几页
            pageList: [5, 10, 15, 20, 25],  //记录数可选列表
            sidePagination: "server", //表示服务端请求
            //设置为undefined可以获取pageNumber，pageSize，searchText，sortName，sortOrder
            //设置为limit可以获取limit, offset, search, sort, order
            queryParamsType: "undefined",
            queryParams: function queryParams(params) {   //设置查询参数
                var param = {
                    pageNumber: params.pageNumber,
                    pageSize: params.pageSize,
                    liveId: $.trim($('#liveId').val()),
                    class_name: $.trim($('#class_name').val()),
                    alias: $.trim($('#alias').val()),
                    course_type: $.trim($('#course_type').val()),
                    logmin: $.trim($('#logmin').val()),
                    logmax: $.trim($('#logmax').val()),
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

    function exportExcel(){
        var class_name = $.trim($('#class_name').val());
        var liveId = $.trim($('#liveId').val());
        var alias = $.trim($('#alias').val());
        var logmin = $.trim($('#logmin').val());
        var logmax = $.trim($('#logmax').val());
        var url = '/StatisticsData/sumCoursePlanExcel?logmin='+logmin+'&logmax='+logmax+'&liveId='+liveId+'&class_name='+class_name+'&alias='+alias;
        layer.confirm('导出表格到本地',function(index){
            window.open(url);  
        });
    }

    function getIdSelections() {
        return $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.id
        });
    }
    $table.on('check.bs.table uncheck.bs.table ' +
        'check-all.bs.table uncheck-all.bs.table', function () {
        $("#btn_delete").prop('disabled', !$table.bootstrapTable('getSelections').length);
        selections = getIdSelections();
    });

</script>