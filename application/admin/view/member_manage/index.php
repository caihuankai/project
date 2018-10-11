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
    <button onclick="enabledel()" type="button" class="btn btn-success" style="margin-right:10px;">　启用　</button>    
    <button disabled id="btn_delete" type="button" class="btn btn-danger" title="请先选中要删除的菜单" style="margin-right:10px;">　禁用　</button>
  </div>
  <!--工具按钮结束-->
    <div class="form-group">
        <input type="text" class="form-control input-text" placeholder="用户ID" id="user_id" name="user_id">
        <input type="text" class="form-control input-text" placeholder="昵称" id="alias" name="alias">
        <!-- <input type="text" class="form-control input-text" placeholder="手机号" id="phone" name="phone"> -->
        <!-- <select name="property" id="property" class="form-control form-select" >
            <option value="">属性</option>
            <option value="1">微信用户</option>
            <option value="2">PC用户</option>
        </select> -->
        <select name="freeze" id="freeze" class="form-control form-select" >
            <option value="">状态</option>
            <option value="1">启用</option>
            <option value="2">禁用</option>
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
    var g_editUrl = './edit_password';
    var url = './index';
    var g_windowHight = '510';
    var g_delarray = './disable_array';
    var g_enabledelarray = './enabledel_array';

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
            //height: 550,   //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
            uniqueId: "user_id",   //每一行的唯一标识，一般为主键列
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
                title: '序号',
                formatter:function(value,row,index){
                    return index + 1;
                }
            },
            {
                field: 'user_id',
                title: 'ID'
            },{
                field: 'head_add',
                title: '头像'
            }, {
                field: 'alias',
                title: '昵称'
            },
            // {
            //     field: '',
            //     title: '属性'
            // },{
            //     field: '',
            //     title: '手机'
            // }, {
            //     field: '',
            //     title: '关注时间'
            // },  
            {
                field: 'freeze_name',
                title: '状态'
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
                    user_id: $.trim($('#user_id').val()),
                    alias: $.trim($('#alias').val()),
                    phone: $.trim($('#phone').val()),
                    property: $.trim($('#property').val()),
                    freeze: $.trim($('#freeze').val()),
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
    /*批量启用*/
    function enabledel(){
        var ids = getIdSelections();
        id = ids;
        if (ids instanceof Array) {
            var idStr = id.join(',');
        } else {
            var idStr = id;
            ids = [parseInt(id, 10)];
        }
        console.log('id',idStr);
        layer.confirm('确认启用该会员吗?', {icon: 3, title: '提示'}, function (index) {
            //do something
            $.getJSON(g_enabledelarray, {'id': idStr}, function (res) {
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
    /*批量禁用*/
    function delect_array(ids) {
        id = ids;
        if (ids instanceof Array) {
            var idStr = id.join(',');
        } else {
            var idStr = id;
            ids = [parseInt(id, 10)];
        }
        console.log('id',idStr);
        layer.confirm('确认禁用该会员吗?', {icon: 3, title: '提示'}, function (index) {
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
    //重置密码
    function edit_password(id,password) {
        layer.open({
            offset: 'auto',
            title: '重置密码',
            content: '<tr>\
        <td width="25%" height="30" align="right"><span class="c-red">*</span>原密码：</td>\
        <td width="75%"><div class="formControls"><input type="text" class="input-text" placeholder="" value="'+password+'" readonly></div></td>\
      </tr>\
      <tr>\
        <td height="20" colspan="2"></td>\
      </tr>\
      <tr>\
        <td height="30" align="right"><span class="c-red">*</span>新密码：</td>\
        <td><div class="formControls"><input type="text" class="input-text" placeholder="请输入四位数字密码" name="password" id="password" maxlength="4" oninput="value=value.replace(/[^\\d]/g,\'\')"></div></td>\
      </tr>',
            yes:function(index, layero){
                var password = document.getElementById("password").value;
                if(password.length != 4){
                    alert('请输入正确密码');
                    return;
                }
                //do something
                $.ajax({  
                     url: g_editUrl + '?id=' + id + '&password=' + password,  
                     type: 'Get',  
                     async: false,  
                     cache: false,  
                     contentType: false,  
                     processData: false,  
                     success: function (data) { 
                        layer.msg('重置成功');
                        layer.close(index); //如果设定了yes回调，需进行手工关闭
                        $table.bootstrapTable('refresh');
                     },  
                     error: function (errdata) {  
                         layer.msg('重置失败');
                     }  
                });
            }
        }); 
    }

    function getIdSelections() {
        return $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.user_id
        });
    }
    $table.on('check.bs.table uncheck.bs.table ' +
        'check-all.bs.table uncheck-all.bs.table', function () {
        $("#btn_delete").prop('disabled', !$table.bootstrapTable('getSelections').length);
        selections = getIdSelections();
    });
</script>