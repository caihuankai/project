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
<div class="form-group" style="width: 60%;margin:0 1rem;">
<!--    <input type="text" class="form-control input-text" placeholder="内容" id="content" name="content">-->
<!--    <span>-->
<!---->
<!--        </span>-->
<!--    <button type="submit" onclick="javascript:$('button[name=\'refresh\']').click();" class="btn btn-success radius" id="" name="">-->
<!--        <i class="Hui-iconfont">&#xe665;</i>搜索</button>-->
    <h3 style="padding: 0;margin: 0;font-size: 20px;font-weight: bold;">新增管理员</h3>
    <hr style="width: 100%;height: 1px;padding: 0;margin-left: 0.5rem;margin-top: 0.5rem;background-color: #222;">
    <p style="14px;display: inline-block;">请输入用户ID：</p>
        <input type="text"  placeholder="用户ID" id="userid" name="content" style="height: 2.3rem;border: 1px #222 solid;" >
        <button onclick="add()" type="button" class="btn btn-primary" style="margin-right:10px;">　设为管理员　</button>
    <div class="text_center" style="height: 4rem;margin: 3rem 0;font-size: 1.7rem;">
        <p>公共直播间管理员说明：</p>
        <p>管理员可删除公共直播间内用户的单条评论，可对单个用户禁言24小时。</p>
    </div>
</div>

<div class="form-inline" align="center">

    <div id="toolbar" class="btn-group">
        <button disabled id="btn_deit" type="button" class="btn btn-primary" style="margin-right:10px;">　禁用　</button>    
        <button disabled id="btn_delete" type="button" class="btn btn-primary" title="请先选中要删除的菜单" style="margin-right:10px;">　删除　</button>
    </div>
    <!--工具按钮结束-->
    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <p style="padding: 0;margin: 0;font-size: 20px;font-weight: bold;    text-align: left;">管理员列表</p>
        <hr style="width: 60%;height: 1px;padding: 0;margin-left: 0.5rem;margin-top: 0.5rem;background-color: #222;    position: absolute;">
        <div class="mt-20">
            <table id="userListTable">
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $table = $('#userListTable');
    var addUrl = './add';
    var g_delarray = './delarray';
    var g_deitarray = './deitarray';
    var editUrl = './adminedit';
    var deladmin = './deladmin';
    var url = './setadministrators';
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
        //修改
        $("#btn_deit").click(function () {
            $("#btn_deit").prop('disabled', true);
            var ids = getIdSelections();
            deit_array(ids)
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
                    value: 1,
                    width: '5%'
                },
                {
                    field: 'id',
                    title: 'ID',
                    width: '10%'
                },{
                    field: 'user_id',
                    title: '用户ID',
                    width: '10%'
                }, {
                    field: 'alias',
                    title: '用户昵称',
                    width: '20%'
                },{
                    field: 'status',
                    title: '状态',
                    width: '15%'
                },{
                    field: 'action',
                    title: '操作',
                    width: '15%'
                }, {
                    field: 'actionname',
                    title: '操作人',
                    width: '15%'
                }, ],
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


    function add() {
        if(($('#userid').val()).length > 1){
            $.ajax({
                type:"POST",
                url:addUrl,
                data:{
                    id:$('#userid').val(),
                },// 参数
                async: false,
                error: function(request) {
                    layer.close(jz);
                    layer.msg("网络错误!", "", "error");
                },
                success: function(data) {
                    layer.alert(data.msg, {
                        icon: 1,
                        skin: 'layer-ext-moon', //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                        time:5000,
                        btn: [ '知道了']
                    })
                    setTimeout(window.location.reload(),5000);
                }
            });
        }else{
            layer.alert('请输入用户ID', {
                icon: 1,
                skin: 'layer-ext-moon', //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                time:3000,
                btn: [ '知道了']
            })
        }
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
        layer.confirm('确认删除当前选择的所有数据吗?', {icon: 3, title: '提示'}, function (index) {
            $.ajax({
                type: 'POST',
                url: g_delarray,
                data:{
                    ids:idStr,
                },// 参数
                async: false,
                dataType: 'json',
                success: function(data){
                    layer.msg(data.msg,{icon:1,time:1000});
                    setTimeout(window.location.reload(),1500);
                },
                error:function(data) {
                    console.log(data.msg);
                    setTimeout(window.location.reload(),1500);
                },
            });
        })
    }
    /*批量修改*/
    function deit_array(ids) {
        id = ids;
        if (ids instanceof Array) {
            var idStr = id.join(',');
        } else {
            var idStr = id;
            ids = [parseInt(id, 10)];
        }
        layer.confirm('确认禁用当前选择的所有管理员吗?', {icon: 3, title: '提示'}, function (index) {
            $.ajax({
                type: 'POST',
                url: g_deitarray,
                data:{
                    ids:idStr,
                },// 参数
                async: false,
                dataType: 'json',
                success: function(data){
                    layer.msg(data.msg,{icon:1,time:1000});
                    setTimeout(window.location.reload(),1500);
                },
                error:function(data) {
                    console.log(data.msg);
                    setTimeout(window.location.reload(),1500);
                },
            });
        })
    }

    //编辑单个用户状态
    function admin_edit(id,status){
        layer.confirm('确认改变该用户当前状态？',function(index){
            $.ajax({
                type: 'POST',
                url: editUrl,
                data:{
                    id:id,
                    status:status
                },// 参数
                async: false,
                dataType: 'json',
                success: function(data){
                    layer.msg(data.msg,{icon:1,time:1000});
                    setTimeout(window.location.reload(),1500);
                },
                error:function(data) {
                    console.log(data.msg);
                    setTimeout(window.location.reload(),1500);
                },
            });
        });
    }
    //删除当前用户
    function admin_del(id) {
        layer.confirm('确认删除该用户？',function(index){
            $.ajax({
                type: 'POST',
                url: deladmin,
                data:{
                    id:id,
                },// 参数
                async: false,
                dataType: 'json',
                success: function(data){
                    layer.msg(data.msg,{icon:1,time:1000});
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
    $table.on('check.bs.table uncheck.bs.table ' +
        'check-all.bs.table uncheck-all.bs.table', function () {
        $("#btn_deit").prop('disabled', !$table.bootstrapTable('getSelections').length);
        selections = getIdSelections();
    });
</script>