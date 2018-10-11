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
    <button onclick="generalize_add()" type="button" class="btn btn-success" style="margin-right:10px;">　新增　</button>  
  </div>
  <!--工具按钮结束-->
    <div class="form-group">
        
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
    var addUrl = '/Generalize/addGeneralize';
    var g_delarray = '/Generalize/delGeneralize';
    var g_editUrl = '/Generalize/editGeneralize';
    var g_disable = '/Generalize/disableGeneralize';
    var g_enable = '/Generalize/enableGeneralize';
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
                field: 'id',
                title: 'ID'
            },{
                field: 'title',
                title: '广告标题'
            }, {
                field: 'cover_img',
                title: '广告封面'
            }, {
                field: 'target_type_name',
                title: '广告跳转类型'
            }, {
                field: 'url',
                title: '广告跳转地址'
            }, {
                field: 'update_time',
                title: '编辑时间'
            }, {
                field: 'status_name',
                title: '状态'
            }, {
                field: 'operate',
                title: '操作'
            },{
                field: 'admin_name',
                title: '操作人'
            },   ],
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

    function generalize_add() {
        title = '新增推广内容';
        url = addUrl;
        w = '';
        h = '510';
        layer_show(title, url, w, h);
    }
    function generalize_edit(id) {
        title = '编辑推广内容';
        url = g_editUrl;
        w = '';
        h = '510';
        layer_show(title, url + '?id=' + id, w, h);
    }

    //禁用单条
    function generalize_disable(id){
        layer.confirm('确认要禁用该推广吗？',function(index){
            $.ajax({
                type: 'POST',
                url: g_disable+'?id='+id,
                dataType: 'json',
                success: function(data){
                    layer.msg(data.msg, "", "success");
                    setTimeout(window.location.reload(),1500);
                },
                error:function(data) {
                    setTimeout(window.location.reload(),1500);
                },
            });     
        });
    }

    //启用单条
    function generalize_enable(id){
        layer.confirm('确认要启用该推广吗？',function(index){
            $.ajax({
                type: 'POST',
                url: g_enable+'?id='+id,
                dataType: 'json',
                success: function(data){
                    layer.msg(data.msg, "", "success");
                    setTimeout(window.location.reload(),1500);
                },
                error:function(data) {
                    setTimeout(window.location.reload(),1500);
                },
            });     
        });
    }


    //删除单条
    function generalize_del(id){
        layer.confirm('确认要删除该推广吗？',function(index){
            $.ajax({
                type: 'POST',
                url: g_delarray+'?id='+id,
                dataType: 'json',
                success: function(data){
                    layer.msg(data.msg, "", "success");
                    setTimeout(window.location.reload(),1500);
                },
                error:function(data) {
                    setTimeout(window.location.reload(),1500);
                },
            });     
        });
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