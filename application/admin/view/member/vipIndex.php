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
<div class="page-container">
    <div class="text-c">
        <input type="text" class="input-text" style="width:250px" placeholder="输入手机" id="tel" name="tel">
        <span>
<!--      <select class="form-control" name="search_group" id="search_group" style="width: 250px;display: inline-block;height: 31px;line-height: 30px;font-size: 13px;padding: 0px 7px 3px 7px;">-->
            <!--        <option value="" selected>请选择人员组</option>-->
            <!--        <{volist name="groupInfo" id="vo" }>-->
            <!--          <option value="<{$vo.id}>">-->
            <!--            <{$vo.name}></option>-->
            <!--          <{/volist}>-->
            <!--      </select>-->
    </span>
        <button type="submit" onclick="javascript:$('button[name=\'refresh\']').click();" class="btn btn-success radius"
                id="" name="">
            <i class="Hui-iconfont">&#xe665;</i>搜用户
        </button>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <div id="toolbar" class="btn-group">   
            <button id="btn_add" type="button" class="btn btn-success">开通会员</button>
            &nbsp;
            <!--            <button disabled id="btn_delete" type="button" class="btn btn-danger" title="请先选中要删除的菜单">　删除　</button>-->
        </div>
        <div class="mt-20">
            <table id="userListTable"></table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $table = $('#userListTable');
    //    var g_delUrl = './del';
    var g_editUrl = './editVip';
    var addUrl = './addVip';
    var g_dealGroupUrl = './dealGroup';
    var g_windowHight = '510';
    function initTable() {
        //先销毁表格
        $table.bootstrapTable('destroy');
        //初始化表格,动态从服务器加载数据
        $table.bootstrapTable({
            method: "post",  //使用get请求到服务器获取数据
            contentType: "application/x-www-form-urlencoded",
            url: './vipIndex', //获取数据的地址
            striped: true,  //表格显示条纹
            pagination: true, //启动分页
            //search:true,
            showRefresh: true,     //是否显示刷新按钮
            sortable: true,      //是否启用排序
            sortOrder: "DESC",   //排序方式
            sortName: 'id',
            clickToSelect: true,  //是否启用点击选中行
            height: 550,   //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
            uniqueId: "id",   //每一行的唯一标识，一般为主键列
            cardView: false,   //是否显示详细视图
            toolbar: "#toolbar",
            showToggle: true,
            showColumns: true,
            columns: [{
                checkbox: true,
                value: 1
            }, {
                field: 'id',
                sortable: true,
                title: 'ID'
            }, {
                field: 'user_id',
                title: '用户账号'
            }, {
                field: 'tel',
                title: '手机'
            }, {
                field: 'alias',
                title: '昵称'
            }, {
                field: 'name',
                title: '会员组名'
            }, {
                field: 'dead_time',
                title: '过期时间'
            }, {
                field: 'operate',
                title: '操作'
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
                    order: params.sortOrder,
                    orderName: params.sortName,
                    tel: $('#tel').val(),
                    groupId: $('#search_group').val(),
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
    initTable();

    //点击删除
    $("#btn_delete").click(function () {
        $("#btn_delete").prop('disabled', true);
        var ids = getIdSelections();
        del(ids);
    });
    $("#btn_add").click(function () {
        member_add('新增会员', addUrl, g_windowHight, 550)
    })

    /*用户-添加*/
    function member_add(title, url, w, h) {
        layer_show(title, url, w, h);
    }
    /*用户-编辑*/
    function member_edit(id) {
        layer_show('编辑用户', g_editUrl + '?id=' + id, '', g_windowHight);
    }

    //    /*用户-删除*/
    //    function del(ids) {
    //        id = ids;
    //        if (ids instanceof Array) {
    //            var idStr = id.join(',');
    //        } else {
    //            var idStr = id;
    //            ids = [parseInt(id, 10)];
    //        }
    //        layer.confirm('确认删除数据吗?', {icon: 3, title: '提示'}, function (index) {
    //            //do something
    //            $.getJSON(g_delUrl, {'id': idStr}, function (res) {
    //                if (res.code == 1) {
    //                    layer.msg('删除成功');
    //                    $('button[name=\'refresh\']').click();
    //                } else {
    //                    layer.msg('删除失败');
    //                }
    //            });
    //            layer.close(index);
    //        })
    //    }

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

    /*分配权限*/
    function dealGroup(type, ids) {
        var ids;
        if (type == "most") {
            ids = getIdSelections();
        }
        else {
            ids = ids;
        }
        if (ids == "" || ids == undefined || ids == null) {
            layer.msg('请先选择人员');
            return;
        }
        layer_show('分配权限', [g_dealGroupUrl + "?ids=" + ids, 'no'], '350', 200);
    }

</script>