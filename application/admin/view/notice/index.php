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
    <button disabled id="btn_delete" type="button" class="btn btn-danger" title="请先选中要删除的菜单" style="margin-right:10px;">　删除　</button>
  </div>
  <!--工具按钮结束-->
    <div class="form-group">
        <input type="text" class="form-control input-text" placeholder="内容" id="content" name="content">
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
    var addUrl = './add';
    var g_delarray = './del_array';
    var g_editUrl = './notice_edit';
    var url = './index';
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
            console.log(ids);
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
            height: 550,   //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
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
                field: 'id',
                title: 'ID',
                width: '5%'
            },{
                field: 'title',
                title: '公告标题',
                width: '10%'
            }, {
                field: 'content',
                title: '公告内容',
                width: '32%'
            },{
                field: 'create_time',
                title: '发布时间',
                width: '15%'
            },{
                field: 'endtime',
                title: '失效时间',
                width: '15%'
            }, {
                field: 'status',
                title: '状态',
                width: '10%'
            }, {
                field: 'operate',
                title: '操作',
                width: '10%'
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
                    content: $.trim($('#content').val()),
                    admire_type: $.trim($('#admire_type').val()),
                    open_status: $.trim($('#open_status').val()),
                    logmin: $.trim($('#logmin').val()),
                    logmax: $.trim($('#logmax').val()),
                    order_number: $.trim($('#order_number').val()),
                    // datemax:$('#datemax')[0].value,
                    // username:$('#search_name')[0].value,
                    // email:$('#search_email')[0].value,
                    // groupId:$('#search_group')[0].value,
                    //username:$('#username').val()
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

    function add() {
        title = '添加公告';
        url = addUrl;
        w = '';
        h = '510';
        layer_show(title, url, w, h);
    }
    /*用户-编辑*/
    function edit(id) {
        layer_show('编辑观点', g_editUrl + '?id=' + id, '', g_windowHight);
    }

    //审核通过
    function req_pass(id){
        layer.confirm('确认汇款吗?', {icon: 3, title:'提示'},
            function(index){
                $.ajax({
                    type: 'POST',
                    url: '/PdCash/changePaymentState?id='+id,
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                        if(data.status == 1){
                            layer.msg('已汇款!',{icon: 6,time:1000});
                        }else{
                            layer.msg('汇款失败', {icon:5,time:1000});
                        }
                    },
                    error:function(data) {
                        console.log(data.msg);
                    },
                }); 
            }
        );
    }
    //审核驳回
    function req_refuse(id){
        title = '提现驳回';
        url   = '/PdCash/req_refuse?id='+id;
        w     = '';
        h     = '250';
        layer_show(title,url,w,h);
        // layer.confirm('确认驳回申请吗?', {icon: 2, title:'提示'},
        //     function(index){
        //         $.ajax({
        //             type: 'POST',
        //             url: '/PdCash/req_refuse?id='+id,
        //             dataType: 'json',
        //             success: function(data){
        //                 console.log(data);
        //                 if(data.status == 1){
        //                     layer.msg('已驳回!',{icon: 6,time:1000});
        //                 }else{
        //                     layer.msg('驳回失败', {icon:5,time:1000});
        //                 }
        //             },
        //             error:function(data) {
        //                 console.log(data.msg);
        //             },
        //         }); 
        //     }
        // );
    }

    /*批量删除*/
    function delect_array(ids) {
        id = ids;
        if (ids instanceof Array) {
            var idStr = id.join(',');
        } else {
            var idStr = id;
            ids = [parseInt(id, 10)];
        }
        console.log('id',idStr);
        layer.confirm('确认删除数据吗?', {icon: 3, title: '提示'}, function (index) {
            //do something
            $.getJSON(g_delarray, {'id': idStr}, function (res) {
                if (res.status == 1) {
                    layer.msg('操作成功');
                    $table.bootstrapTable('refresh');
                } else {
                    layer.msg('操作失败');
                }
            });
            layer.close(index);
        })
    }

    //删除单条公告
    function notice_del(id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '/Notice/notice_del?id='+id,
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
    //编辑公告
    function notice_edit(id) {
        layer_show('编辑公告', g_editUrl + '?id=' + id, '', g_windowHight);
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