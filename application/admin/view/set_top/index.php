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
        <input type="text" class="form-control input-text" placeholder="课程名称" id="courseName" name="courseName">
        <input type="text" class="form-control input-text" placeholder="创建人" id="teacherName" name="teacherName">
        <select name="type" id="type" class="form-control form-select" >
            <option value="-1">课程类型</option>
            <option value="1">专题课</option>
            <option value="2">系列课</option>
        </select>
        <select name="level" id="level" class="form-control form-select" >
            <option value="-1">收费类型</option>
            <option value="0">免费</option>
            <option value="2">收费</option>
        </select>
        <!-- <select name="isTop" id="isTop" class="form-control form-select" >
            <option value="-1">是否置顶</option>
            <option value="1">是</option>
            <option value="2">否</option>
        </select> -->
        <input type="text" placeholder="开始时间" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="form-control input-text Wdate" name="create_time_min">
        -
        <input type="text" placeholder="结束时间" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="form-control input-text Wdate" name="create_time_max">
        <span>
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
    var g_editUrl = '/SetTop/recommentEdit';
    var g_editUrl_ta = '/SetTop/recommentEditTa';
    var url = '#';
    var g_windowHight = '510';
    var g_addUrl_ta = '/SetTop/recommentStartTa';

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
            uniqueId: "id",   //每一行的唯一标识，一般为主键列
            cardView: false,   //是否显示详细视图
            toolbar: "#toolbar",
            showColumns: true,
            columns: [
            {
                checkbox: true,
                value: 1
            },
            {
                field: 'course_id',
                title: 'ID'
            },{
                field: 'class_name',
                title: '课程名称'
            }, {
                field: 'alias',
                title: '创建人'
            }, {
                field: 'type_name',
                title: '课程类型'
            }, {
                field: 'level_name',
                title: '收费类型'
            },
            {
                field: 'price',
                title: '费用（礼点）'
            },{
                field: 'num',
                title: '购买/浏览人数'
            },{
                field: 'create_time',
                title: '创建时间'
            }, {
                field: 'sort',
                title: '序号'
            }, {
                field: 'operate',
                title: '操作'
            },{
                field: 'operatorName',
                title: '操作人'
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
                    type: $.trim($('#type').val()),
                    courseName: $.trim($('#courseName').val()),
                    level: $.trim($('#level').val()),
                    logmin: $.trim($('#logmin').val()),
                    logmax: $.trim($('#logmax').val()),
                    isTop: $.trim($('#isTop').val()),
                    teacherName: $.trim($('#teacherName').val()),
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
        title = '修改排序';
        url = g_editUrl;
        w = '';
        h = '300';
        layer_show(title, url + '/id/' + id, w, h);
    }
    //停用单条推荐
    function recomment_stop(id){
        layer.confirm('确认要取消置顶吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '/SetTop/recomment_stop?id='+id,
                dataType: 'json',
                success: function(data){
                    if (data.status == 1) {
                        layer.msg('取消成功');
                        $table.bootstrapTable('refresh');
                    } else {
                        layer.msg('取消失败');
                    }
                    // setTimeout(window.location.reload(),1500);
                },
                error:function(data) {
                    setTimeout(window.location.reload(),1500);
                },
            });     
        });
    }
    //启用单条推荐
    function recomment_start(id,type){
        layer.confirm('确认要置顶吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '/SetTop/recomment_start/id/'+id+'/type/'+type,
                dataType: 'json',
                success: function(data){
                    if (data.status == 1) {
                        layer.msg('置顶成功');
                        $table.bootstrapTable('refresh');
                    } else {
                        layer.msg(data.msg);
                    }
                },
                error:function(data) {
                    setTimeout(window.location.reload(),1500);
                },
            });     
        });
    }

    //启用单条排序
    function recomment_start_ta(id){
        title = '添加排序';
        url = g_addUrl_ta;
        w = '';
        h = '300';
        layer_show(title, url + '/id/' + id, w, h);
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