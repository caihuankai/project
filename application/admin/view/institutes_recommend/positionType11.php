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
    <button onclick="recomment_add()" type="button" class="btn btn-success" style="margin-right:10px;">　新增素材　</button>     
    <button disabled id="btn_delete" type="button" class="btn btn-danger" title="请先选中要删除的菜单" style="margin-right:10px;">　移除　</button>

    <button onclick="stop_array()" type="button" class="btn btn-success" style="margin-right:10px;">　停用　</button>  <button onclick="start_array()" type="button" class="btn btn-success" style="margin-right:10px;">　启用　</button> 
  </div>
  <!--工具按钮结束-->
    <div class="form-group">
        <input type="text" class="form-control input-text" placeholder="名称" id="name" name="name">
        <input type="text" placeholder="开始时间" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="form-control input-text Wdate" name="create_time_min">
        -
        <input type="text" placeholder="结束时间" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="form-control input-text Wdate" name="create_time_max">
        <span>
        <select name="relevanceType" id="relevanceType" class="form-control form-select" >
            <option value="0">跳转类型</option>
            <option value="4">专题课介绍页</option>
            <option value="9">系列课介绍页</option>
            <option value="10">特训班预告页</option>
            <option value="11">特训班详情页</option>
            <option value="12">特训班回顾页</option>
            <option value="13">视频</option>
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
    var addUrl = '/InstitutesRecommend/addPositionType11/positionType/<{$positionType}>';
    var g_delarray = '/InstitutesRecommend/del_array';
    var g_editUrl = '/InstitutesRecommend/ediePositionType11';
    var url = '#';
    var g_windowHight = '510';
    var g_start_array = '/InstitutesRecommend/recomment_start_array';
    var g_stop_array = '/InstitutesRecommend/recomment_stop_array';

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
                field: 'adFile',
                title: '缩略图'
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

    function recomment_add() {
        title = '新增素材';
        url = addUrl;
        w = '';
        h = '510';
        layer_show(title, url, w, h);
    }
    function recomment_edit(id) {
        title = '编辑素材';
        url = g_editUrl;
        w = '';
        h = '510';
        layer_show(title, url + '/id/' + id + '/positionType/'+'<{$positionType}>', w, h);
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

    /*批量停用*/
    function stop_array() {
        var ids = getIdSelections();
        id = ids;
        if (ids instanceof Array) {
            var idStr = id.join(',');
        } else {
            var idStr = id;
            ids = [parseInt(id, 10)];
        }
        
        layer.confirm('确认停用数据吗?', {icon: 3, title: '提示'}, function (index) {
            //do something
            $.getJSON(g_stop_array, {'id': idStr}, function (res) {
                if (res.status == 1) {
                    layer.msg('停用成功');
                    $table.bootstrapTable('refresh');
                } else {
                    layer.msg('停用失败');
                }
            });
            layer.close(index);
        })
    }

    /*批量启用*/
    function start_array() {
        var ids = getIdSelections();
        id = ids;
        if (ids instanceof Array) {
            var idStr = id.join(',');
        } else {
            var idStr = id;
            ids = [parseInt(id, 10)];
        }
        
        layer.confirm('确认启用数据吗?', {icon: 3, title: '提示'}, function (index) {
            //do something
            $.getJSON(g_start_array, {'id': idStr}, function (res) {
                if (res.status == 1) {
                    layer.msg('启用成功');
                    $table.bootstrapTable('refresh');
                } else {
                    layer.msg('启用失败');
                }
            });
            layer.close(index);
        })
    }


    //删除单条推荐
    function recomment_del(id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '/InstitutesRecommend/recomment_del?id='+id,
                dataType: 'json',
                success: function(data){
                    layer.msg('已删除!',{icon:1,time:1000});
                    setTimeout(window.location.reload(),1500);
                },
                error:function(data) {
                    setTimeout(window.location.reload(),1500);
                },
            });     
        });
    }
    //停用单条推荐
    function recomment_stop(id){
        layer.confirm('确认要停用吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '/InstitutesRecommend/recomment_stop?id='+id,
                dataType: 'json',
                success: function(data){
                    if (data.status == 1) {
                        layer.msg('停用成功');
                        $table.bootstrapTable('refresh');
                    } else {
                        layer.msg('停用失败');
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
    function recomment_start(id){
        layer.confirm('确认要启用吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '/InstitutesRecommend/recomment_start?id='+id,
                dataType: 'json',
                success: function(data){
                    if (data.status == 1) {
                        layer.msg('启用成功');
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