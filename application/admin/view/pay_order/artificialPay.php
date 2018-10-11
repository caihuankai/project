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
        <button onclick="add()" type="button" class="btn btn-success" style="margin-right:10px;">　新增　</button>
    </div>
    <div class="form-group">
        <input type="text" class="form-control input-text" placeholder="订单流水号" id="order_number" name="order_number">
        <input type="text" class="form-control input-text" placeholder="用户ID" id="user_id" name="user_id">
        <input type="text" class="form-control input-text" placeholder="用户昵称" id="alias" name="alias">
        <input type="text" class="form-control input-text" placeholder="课程ID" id="class_id" name="class_id">
        <input type="text" class="form-control input-text" placeholder="课程名称" id="classname" name="classname">
        <select name="class_type" id="class_type" class="form-control form-select" >
            <option value="">课程类型</option>
            <option value="1">单节课</option>
            <option value="2">系列课</option>
        </select>
        <input type="text" placeholder="开始时间" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="form-control input-text Wdate" name="create_time_min">
        -
        <input type="text" placeholder="结束时间" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="form-control input-text Wdate" name="create_time_max">

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
    var addUrl = './addArtificialPay';
    var g_delUrl = './del';
    var g_editUrl = './editArtificialPay';
    var url = './artificialPay';
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
            del(ids);
        })
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
                field: 'order_no',
                title: '订单流水号'
            }, {
                field: 'user_id',
                title: '用户ID'
            }, {
                field: 'alias',
                title: '用户昵称'
            }, {
                field: 'class_id',
                title: '课程ID'
            }, {
                field: 'class_name',
                title: '课程名称'
            },  {
                field: 'classTypeName',
                title: '课程类型'
            },  {
                field: 'pay_time',
                title: '购买时间'
            }, {
                field: 'pay_type',
                title: '支付方式'
            }, {
                field: 'pay_type_name',
                title: '支付方式'
            }, {
                field: 'total_fee',
                title: '价格（元）'
            }, {
                field: 'remark',
                title: '备注'
            }, {
                field: 'operate',
                title: '操作'
            }, {
                field: 'adminName',
                title: '操作人'
            }, ],
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
                    order: params.sortOrder,
                    orderName: params.sortName,
                    order_number: $.trim($('#order_number').val()),
                    class_id: $.trim($('#class_id').val()),
                    classname: $.trim($('#classname').val()),
                    class_type: $.trim($('#class_type').val()),
                    user_id: $.trim($('#user_id').val()),
                    alias: $.trim($('#alias').val()),
                    logmin: $.trim($('#logmin').val()),
                    logmax: $.trim($('#logmax').val()),
                    // datemax:$('#datemax')[0].value,
                    // username:$('#search_name')[0].value,
                    // email:$('#search_email')[0].value,
                    // groupId:$('#search_group')[0].value,
                    //searchText:$('#username').val()
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
    $("#btn_delete").click(function () {
        $("#btn_delete").prop('disabled', true);
        var ids = getIdSelections();
        del(ids);
    })

    //新增
    function add() {
        title = '新增订单';
        url = addUrl;
        w = '';
        h = '510';
        layer_show(title, url, w, h);
    }
    /*用户-编辑*/
    function edit(id) {
        layer_show('编辑订单', g_editUrl + '?id=' + id, '', g_windowHight);
    }

    /*用户-删除*/
    function del(ids) {
        id = ids;
        if (ids instanceof Array) {
            var idStr = id.join(',');
        } else {
            var idStr = id;
            ids = [parseInt(id, 10)];
        }
        layer.confirm('确认删除数据吗?', {icon: 3, title: '提示'}, function (index) {
            //do something
            $.getJSON(g_delUrl, {'id': idStr}, function (res) {
                if (res.code == 1) {
                    layer.msg('删除成功');
                    $table.bootstrapTable('refresh');
                } else {
                    layer.msg('删除失败');
                }
            });
            layer.close(index);
        })
    }

    //删除
    function record_del(id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '/PayOrder/recordDel?id='+id,
                dataType: 'json',
                success: function(data){
                    layer.msg('已删除!',{icon:1,time:1000});
                    setTimeout(window.location.reload(),1500);
                },
                error:function(data) {
                    console.log(data.msg);
                    setTimeout(window.location.reload(),1500);
                },
            });     
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