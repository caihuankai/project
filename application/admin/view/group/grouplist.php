<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span>
    <script>document.write(getQueryString("tabName1"))</script> <span
      class="c-gray en">&gt;</span>
    <script>document.write(getQueryString("tabName2"))</script> <a class="btn btn-success radius r" style="line-height:1em;height: 2em;"
                                                                                                              href="javascript:location.replace(location.href);" title="刷新"><i
        class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
  <div class="text-c">
    <input type="text" class="input-text" style="width:250px" placeholder="输入人员组名" id="name" name="name">
    <button type="submit" onclick="javascript:$('button[name=\'refresh\']').click();" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜人员组 </button>
  </div>
  <div class="cl pd-5 bg-1 bk-gray mt-20">
    <div id="toolbar" class="btn-group">    
      <button onclick="group_add('添加人员组',['/group/groupadd','no'],'350','250')" type="button" class="btn btn-success" style="margin-right:10px;">　新增　</button><button disabled id="btn_delete" type="button" class="btn btn-danger" title="请先选中要删除的菜单">　删除　</button>
      &nbsp; </div>
    <div class="mt-20">
      <table id="groupListTable">
      </table>
    </div>
  </div>
</div>
<script type="text/javascript">
  $table = $('#groupListTable');
  var g_delUrl = '/group/del';
  var g_editUrl = '/group/groupedit';
  var g_menuEditUrl = '/group/menuedit';
  var g_platformEditUrl = '/platform/index';
  var g_windowHight = '510';
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
        field: 'id',
        sortable: true,
        sortName: 'ID',
        title: 'ID'
      }, {
        field: 'name',
        title: '用户组名'
      },{
        field: 'status',
        title: '状态'
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
          name:$('#name')[0].value,
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
    group_del(ids);
  })

  /*人员组-添加*/
  function group_add(title, url, w, h) {
    layer_show(title, url, w, h);
  }
  /*人员组-编辑*/
  function group_edit(id) {
    layer_show('编辑人员组', g_editUrl + '?id=' + id, '350', '250');
  }

  /*人员组-删除*/
  function group_del(ids) {
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
        if (res.code == 0) {
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

  /**人员组-权限分配*/
  function menu_edit(id)
  {
    layer_show('权限分配', g_menuEditUrl+"?id="+id,'', g_windowHight);
  }

  /**人员组-订阅号分配*/
  function platform_edit(id)
  {
    layer_show('订阅号分配', g_platformEditUrl+"?templateName=/group/platform_table&type=platform&id="+id,'', g_windowHight);
  }

</script>