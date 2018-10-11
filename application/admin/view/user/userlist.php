<nav class="breadcrumb">
  <i class="Hui-iconfont">&#xe67f;</i>首页
  <span class="c-gray en">&gt;</span><script>document.write(getQueryString('tabName1'))</script>
  <span class="c-gray en">&gt;</span><script>document.write(getQueryString('tabName2'))</script>
  <a class="btn btn-success radius r" style="line-height:1em;height: 2em;" href="javascript:location.replace(location.href);" title="刷新">
    <i class="Hui-iconfont">&#xe68f;</i></a>
</nav>


<style>
    .form-select{
        width: 250px;display: inline-block;height: 31px;line-height: 30px;font-size: 13px;padding: 0px 7px 3px 7px;
    }
</style>

<div class="page-container">
    <div class="text-c">日期范围：
        <input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}'})" id="datemin"
               class="input-text Wdate" style="width:120px;">-
        <input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d'})" id="datemax"
               class="input-text Wdate" style="width:120px;">
        <input type="text" class="input-text" style="width:250px" placeholder="输入用户名" id="search_name"
               name="search_name"/>
        <input type="text" class="input-text" style="width:250px" placeholder="输入邮箱" id="search_email"
               name="search_email"/>

        <select title="状态" name="" id="select-status" class="form-control form-select">
            <{option data="$statusArr" notHeader="true"}>
        </select>
        <span>
              <select title="选择人员组" class="form-control form-select" name="search_group" id="search_group">
                <option value="" selected>请选择人员组</option>
                <{volist name="groupInfo" id="vo" }>
                  <option value="<{$vo.id}>">
                    <{$vo.name}></option>
                  <{/volist}>
              </select>
        </span>
        <button type="submit" onclick="javascript:$('button[name=\'refresh\']').click();" class="btn btn-success radius"
                id="" name="">
              <i class="Hui-iconfont">&#xe665;</i>搜用户
        </button>
    </div>
  <div class="cl pd-5 bg-1 bk-gray mt-20">
      <div id="toolbar" class="btn-group">   
          <button onclick="member_add('添加用户',['/user/useradd','no'],'','510')" type="button" class="btn btn-success"
                  style="margin-right:10px;">　新增　
          </button>
          <button disabled id="btn_delete" type="button" class="btn btn-danger" title="请先选中要删除的菜单">　删除　</button>

          <button style="margin-left: 10px" id="btn-close" type="button" class="btn btn-primary" title="请先选中要禁用的菜单">　禁用　</button>
          <button id="btn-open" type="button" class="btn btn-primary" title="请先选中要启用的菜单">　启用　</button>
          
      </div>
      
    <div class="mt-20">
      <table id="userListTable"></table>
    </div>
  </div>
</div>

<script type="text/javascript">
    $table = $('#userListTable');
    var g_bindUrl = '/user/bind';
    var g_delUrl = '/user/del';
    var g_editUrl = '/user/useredit';
    var g_dealGroupUrl = '/user/dealGroup';
    var g_windowHight = '510';
    var actionStatusHtml = JSON.parse('<{$statusText|json_encode}>'),
        statusMap = [1, 0],
        columnStatusHtml = <{$statusHtmlJson}>;
    
    function statusClick(){
        $('.changeStatus').click(function (){
            var e = $(this);

            changeStatus([e.data('ids')]);
        });
    }
    
    
    function initTable() {
        //先销毁表格
        $table.bootstrapTable('destroy');
        //初始化表格,动态从服务器加载数据
        $table.bootstrapTable({
            method: "post",  //使用get请求到服务器获取数据
            contentType: "application/x-www-form-urlencoded",
            url: 'index', //获取数据的地址
            striped: true,  //表格显示条纹
            pagination: true, //启动分页
            //search:true,
            showRefresh: true,     //是否显示刷新按钮
            sortable: true,      //是否启用排序
            sortOrder: "DESC",   //排序方式
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
                field: 'num',
                title: '序号'
            }, {
                field: 'id',
                sortable: true,
                sortName: 'ID',
                title: 'ID'
            }, {
                field: 'username',
                title: '用户名'
            }, {
                field: 'date_time',
                title: '创建时间'
            },{
                field: 'group_name',
                title: '人员组名'
            }, {
                field: 'bindUserAlias',
                title: '前台用户绑定'
            }, {
                field: 'statusText',
                title: '状态',
                'class': 'status'
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
                    datemin:$('#datemin')[0].value,
                    datemax:$('#datemax')[0].value,
                    username:$('#search_name')[0].value,
                    email:$('#search_email')[0].value,
                    status: $('#select-status').val(),
                    groupId:$('#search_group')[0].value
                    //searchText:$('#username').val()
                };
                return param;
            },
            onLoadSuccess: function () {  //加载成功时执行
                layer.msg("加载成功", {time: 1000});

                statusClick();
            },
            onToggle: statusClick,
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
        member_del(ids);
    });
    
    $('#btn-close, #btn-open').click(function () {
        var status = $(this).is('#btn-close') ? 0 : 1,
            ids = [];

        $table.bootstrapTable('getSelections').map(function (data){
            ids.push(data['id']);
        });

        ids.length > 0 && changeStatus(ids, status);
    });

    /*用户-添加*/
    function changePassword(url) {
        layer_show('修改密码', url, 500, 250);
    }
    /*用户-添加*/
    function member_add(title, url, w, h) {
        layer_show(title, url, w, h);
    }
    /*用户-编辑*/
    function member_edit(id) {
        layer_show('编辑用户', g_editUrl + '?id=' + id, '', g_windowHight);
    }

    /*用户-删除*/
    function member_del(ids) {
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
                    $('button[name=\'refresh\']').click();
                } else {
                    layer.msg('删除失败');
                }
            });
            layer.close(index);
        })
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

    /*分配权限*/
    function dealGroup(type,ids)
    {
        var ids;
        if(type=="most"){
            ids = getIdSelections();
        }
        else
        {
            ids = ids;
        }
        if(ids==""||ids==undefined||ids==null)
        {
            layer.msg('请先选择人员');
            return;
        }
        layer_show('分配权限', [g_dealGroupUrl+"?ids="+ids,'no'],'350',200);
    }
    
    
    
    /* 修改用户状态 **/
    function changeStatus(ids, statusEle) {
        var table = $('#userListTable');

        $.map(ids, function (val, key){
            var data = table.bootstrapTable('getRowByUniqueId', val),
                status = statusEle == null ? (statusEle = statusMap[data['status']]) : statusEle,
                tempEle = $('<div>'+data['operate']+'</div>');

            tempEle.children('.changeStatus').html(actionStatusHtml[status]);
            data['operate'] = tempEle.html();
            data['statusText'] = columnStatusHtml[status];
            data['status'] = status;

            table.bootstrapTable('updateRow', {
                index: data['num'],
                data:data
            });
        });

        statusClick();
            
            
        requestAjax({
            ids: ids,
            status: statusEle
        }, {
            url: "<{:url('changeStatus')}>"
        })
    }

    /**
     * 绑定前台用户
     * @param id
     */
    function member_bind(id) {
        layer_show('绑定前台用户', [g_bindUrl+"?id="+id,'no'], 500,400);
    }

    //解除绑定
    function member_reset(id) {
    	requestAjax({
            id: id,
        }, {
        	url: "<{:url('bindReset')}>",
    		localSuccess: function(){
    			adminTableRefresh();
            }
        });
    }

    //刷新表格
    function adminTableRefresh(){
        $('#userListTable').bootstrapTable('refresh');
    }
</script>