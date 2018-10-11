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
<style>
    #flow-user-div {
        text-align: left;
        background: #ccc;
        font-weight: bold;
    }
</style>


<div class="form-inline" align="center">

    <{if $userNav}>
        <{$userNav}>
    <{else}>
    <div class="form-group">
        <select name="data_type" id="data_type" class="form-control form-select" >
            <option value="">业务类别</option>
            <option value="1">购买单次课程</option>
            <option value="2">单次课程分销</option>
            <option value="3">单次课程售出</option>
            <option value="4">提现</option>
            <option value="5">购买观点</option>
            <option value="6">观点分销</option>
            <option value="7">观点售出</option>
            <option value="8">礼物收入</option>
            <option value="9">礼物分销</option>
            <option value="10">礼物支出</option>
            <!-- <option value="11">购买观点包周</option>
            <option value="12">观点包周分销</option>
            <option value="13">观点包周售出</option> -->
            <!-- <option value="14">VIP会员礼物支出</option>
            <option value="15">VIP会员礼物分销</option>
            <option value="16">VIP会员礼物收入</option> -->
        </select>
        <input type="text" placeholder="开始时间" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="form-control input-text Wdate" name="create_time_min">
        -
        <input type="text" placeholder="结束时间" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="form-control input-text Wdate" name="create_time_max">
        <input type="text" class="form-control input-text" placeholder="用户昵称" id="username" name="username">
        <span>

        </span>
        <button type="submit" onclick="javascript:$('button[name=\'refresh\']').click();" class="btn btn-success radius" id="" name="">
        <i class="Hui-iconfont">&#xe665;</i>搜索</button>
    </div>

    <{/if}>
    
    
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
    var g_delUrl = './del';
    var g_editUrl = './edit';
    var url = '<{:url("new_index")}>';
    var g_windowHight = '510';
    var g_edit_remark = './edit_remark';

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
                title: '流水号'
            }, {
                field: 'add_time',
                title: '创建时间'
            },
            <?php if (empty($user_id)) {?>
                {
                field: 'alias',
                title: '用户昵称'
            },
            <?php }?>
                {
                field: 'opType',
                title: '业务名称'
                // formatter:function(value, row, index){
                //     if (value == 'order_pay') {return "下单使用";}
                //     else if(value == 'commission') {return "课程提成";}
                //     else if(value == 'withdraw') {return "资金提现";}
                //     else if(value == 'withdraw_freeze') {return "提现冻结";}
                //     else if(value == 'recharge') {return "充值金额";}
                //     else if(value == 'class_income') {return "课程收益";}
                //     else return "其他";
                // }
            }, {
                field: 'op_name',
                title: '业务详情'
            },{
                field: 'class_amount',
                title: '收入金额(单位:礼点)'
            }, {
                field: 'class_withdraw',
                title: '支出金额(单位:礼点)'
            }, {
                field: 'income_total',
                title: '总收益(单位:礼点)'
            }, {
                field: 'income',
                title: '可提现金额(单位:礼点)'
            }, {
                field: 'admin_description',
                title: '备注'
            }, {
                field: 'operate',
                title: '操作'
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
                    username: $.trim($('#username').val()),
                    data_type: $.trim($('#data_type').val()),
                    logmin: $.trim($('#logmin').val()),
                    logmax: $.trim($('#logmax').val()),
                    user_id:'<{$user_id}>',
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

    //点击删除
    $("#btn_delete").click(function () {
        $("#btn_delete").prop('disabled', true);
        var ids = getIdSelections();
        del(ids);
    })

    function add() {
        title = '添加文章';
        url = addUrl;
        w = '';
        h = '510';
        layer_show(title, url, w, h);
    }
    /*用户-编辑*/
    function edit(id) {
        layer_show('编辑观点', g_editUrl + '?id=' + id, '', g_windowHight);
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
    /*修改用户备注*/
    function remark(id) {
        layer_show('备注', g_edit_remark + '?id=' + id, '', g_windowHight);
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