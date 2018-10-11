<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span>
    <script>document.write(getQueryString("tabName1"))</script> <span
      class="c-gray en">&gt;</span>
    <script>document.write(getQueryString("tabName2"))</script>  <a class="btn btn-success radius r" style="line-height:1em;height: 2em;"
                                                                                                               href="javascript:location.replace(location.href);" title="刷新"><i
        class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
  <!--工具按钮开始-->
  <div id="toolbar" class="btn-group">    
    <button id="btn_add" type="button" class="btn btn-success" style="margin-right:10px;">　新增　</button><button disabled id="btn_delete" type="button" class="btn btn-danger" title="请先选中要删除的菜单" style="margin-right:10px;">　删除　</button><button id="btn_build" type="button" class="btn btn-primary">　生成资源　</button>
  </div>
  <!--工具按钮结束-->
  <div class="mt-20">
    <table id="dataTable">
    </table>
  </div>
</div>
<script type="text/javascript">
  var url        = './index';
  var addUrl     = './add';
  var editUrl    = './edit';
  var delUrl     = './del';
  var bulidUrl     = './build';
  var $table     = $("#dataTable");
  function initTable() {
    //先销毁表格
    $table.bootstrapTable('destroy');
    //初始化表格,动态从服务器加载数据
    $table.bootstrapTable({
      method: "get",  //使用get请求到服务器获取数据
      url: url, //获取数据的地址
      striped: true,  //表格显示条纹
      pagination: false, //启动分页
      //search:true,
      showRefresh: true,     //是否显示刷新按钮
      sortable: true,      //是否启用排序
      sortOrder: "DESC",   //排序方式
      clickToSelect: true,  //是否启用点击选中行
      height: 700,   //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
      uniqueId: "id",   //每一行的唯一标识，一般为主键列
      cardView: false,   //是否显示详细视图
      toolbar:"#toolbar",
      showToggle:true,
      showColumns:true,
      columns: [{
        checkbox: true,
        value:1
      }, {
        field: 'id',
        sortable:true,
        sortName:'ID',
        title: 'ID'
      }, {
        field: 'name',
        title: '菜单名称'
      }, {
        field: 'url',
        title: 'url'
      }, {
        field: 'icon',
        title: '图标类名'
      },{
        field: 'sort',
        title: '排序',
				align:'center'
      }, {
        field: 'hide',
        //sortable:true,
        sortName:'hide',
        title: '状态',
				align:'center'
      },{
        field: 'operate',
        title: '操作',
				align:'center'
      } ],
      pageSize: 10,  //每页显示的记录数
      pageNumber:1, //当前第几页
      pageList: [5, 10, 15, 20, 25],  //记录数可选列表
      sidePagination: "server", //表示服务端请求
      //设置为undefined可以获取pageNumber，pageSize，searchText，sortName，sortOrder
      //设置为limit可以获取limit, offset, search, sort, order
      queryParamsType : "undefined",
      queryParams: function queryParams(params) {   //设置查询参数
        var param = {
          pageNumber: params.pageNumber,
          pageSize: params.pageSize,
          order: params.sortOrder,
          orderName: params.sortName,
          //searchText:$('#username').val()
        };
        return param;
      },
      onLoadSuccess: function(){  //加载成功时执行
        layer.msg("加载成功", {time : 1000});
      },
      onLoadError: function(){  //加载失败时执行
        layer.msg("加载数据失败");
      }
    });
  }
  $(function(){
    //调用函数，初始化表格
    initTable();

    //当点击查询按钮的时候执行
    //$("#search").bind("click", $table.bootstrapTable('refresh'));

    //点击新增
    $("#btn_add").click(function(){
      add();
    });
    //点击删除
    $("#btn_delete").click(function () {
      $("#btn_delete").prop('disabled', true);
      var ids = getIdSelections();
      del(ids);
    })
    //点击生成菜单资源
    $("#btn_build").click(function () {
      buildMenu();
    });
  });
  /*菜单-添加*/
  function add()
  {
    title = '添加菜单';
    url   = addUrl;
    w     = '';
    h     = '510';
    layer_show(title,url,w,h);
  }
  /*菜单-编辑*/
  function edit(id)
  {
    title = '编辑菜单';
    url   = editUrl+'?id='+id;
    w     = '';
    h     = '510';
    layer_show(title,url,w,h);
  }
  /*生成菜单资源*/
  function buildMenu()
  {
    id = getIdSelectionsInfo();
    row = id[0];
    console.log(row);
    if($table.bootstrapTable('getSelections').length != 1 || row['pid'] == 0)
    {
      layer.msg('必须选中一行要生成资源的二级菜单');
      return false;
    }

    console.log('@@@@@@@@@');
    console.log(id);
    $.getJSON(bulidUrl, {'id':row['id'],'url':row['url'],'pid':row['pid']}, function(res){
        layer.msg(res.msg);
        if(layer.code == 1)$table.bootstrapTable('refresh');
    });
  }
  /*菜单-删除*/
  function del(ids){
    id = ids;
    console.log(ids);
    if(ids instanceof Array){
      var idStr = id.join(',');
    }else{
      var idStr = id;
      ids = [id.toString()];
    }
    console.log('ids:@@@@@');
    console.log(ids);
    layer.confirm('确认删除数据吗?', {icon: 3, title:'提示'}, function(index){
      //do something
      $.getJSON(delUrl, {'id' : idStr}, function(res){
        if(res.code == 1){
          layer.msg('删除成功');
          $table.bootstrapTable('refresh');
          //$("#btn_delete").prop('disabled', false);
        }else{
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
  function getIdSelectionsInfo() {
    return $.map($table.bootstrapTable('getSelections'), function (row) {
      return row
    });
  }
  $table.on('check.bs.table uncheck.bs.table ' +
      'check-all.bs.table uncheck-all.bs.table', function () {
    $("#btn_delete").prop('disabled', !$table.bootstrapTable('getSelections').length);

    // save your data, here just save the current page
    selections = getIdSelections();
    // push or splice the selections if you want to save all data selections
  });
</script> 