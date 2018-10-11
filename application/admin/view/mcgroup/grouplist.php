<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span>
  <script>document.write(getQueryString("tabName1"))</script>
  <span
      class="c-gray en">&gt;</span>
  <script>document.write(getQueryString("tabName2"))</script>
  <a class="btn btn-success radius r" style="line-height:1em;height: 2em;"
     href="javascript:location.replace(location.href);" title="刷新"><i
        class="Hui-iconfont">&#xe68f;</i></a></nav>

<div class="page-container">
  <div class="text-c">
    <input type="text" id="keywords" class="input-text" style="width:250px" placeholder="输入标题/内容关键字" id="search_content" name="search_content">
    <button type="submit" onclick="javascript:$('button[name=\'refresh\']').click();" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜索 </button>
  </div>

  <div class="cl pd-5 bg-1 bk-gray mt-20">
    <div id="toolbar" class="btn-group">    
      <button onclick="add()" type="button" class="btn btn-success" style="margin-right:10px;">　新增　</button>
      <button disabled id="btn_delete" type="button" class="btn btn-danger" title="请先选中要删除的群">　删除　</button>
    </div>
    <div class="mt-20">
      <table id="groupListTable">
      </table>
    </div>
  </div>
</div>


<script type="text/javascript">
  $table = $('#groupListTable');

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
      },{
        field: 'id',
        sortable: true,
        sortName: 'ID',
        title: 'ID',
        width: '5%'
      },{
          field: 'showid',
          title: '群显示ID',
          width: '5%'
      },{
        field: 'name',
        title: '群名',
        width: '5%',
        formatter:function(value,row,index){
          if(!value){
            value = '-';
          }
          return value;
        }
      },{
        field: 'group_master_id',
        title: '群主主键',
        width: '5%'
      },{
        field: 'alias',
        title: '群主名',
        width: '5%'
      },{
        field: 'user_num',
        title: '成员数',
        sortable: true,
        sortName: 'ID',
        width: '5%'
      },{
        field: 'male_num',
        title: '男成员数',
        sortable: true,
        sortName: 'ID',
        width: '5%'
      },{
        field: 'female_num',
        title: '女成员数',
        sortable: true,
        sortName: 'ID',
        width: '5%'
      },{
        field: 'status',
        title: '状态',
        width: '5%'
      },{
        field: 'icon',
        title: '图标',
        formatter:function(value,row,index){
          var str = "";
          if(value){
            // str = str + '<img width="100" src="<{:config('PIC_DOMAIN')}>'+value+'"/>';
        	  str = str + '<img width="100" src="'+value+'"/>';
          }
          else
          {
            str='-';
          }
          return str;
        },
        width: '20%'
      },{
        field: 'desc',
        title: '群说明',
        width: '30%',
        formatter:function(value,row,index){
          if(!value){
            value = '-';
          }
          return value;
        }
      }
      ,{
        field: 'operate',
        title: '操作',
        width: '20%'
      }
      ],
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
            keywords:$("#keywords").val()
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

  $(function () {
    initTable();

    $table.on('check.bs.table uncheck.bs.table ' +
        'check-all.bs.table uncheck-all.bs.table', function () {
      $("#btn_delete").prop('disabled', !$table.bootstrapTable('getSelections').length);
    });
  });

  //创建
  function add()
  {
    layer_show('添加',['./add'],'800');
  }

  //编辑
  function edit(id)
  {
    layer_show('添加',['./edit?id='+id],'800');
  }

  /*删除   ****************开始*/
   $("#btn_delete").click(function () {
    $("#btn_delete").prop('disabled', true);
    var ids = getIdSelections();
    del(ids);
  })

  function del(ids) {
    var id = ids;
    var idStr;
    if (ids instanceof Array) {
      idStr = id.join(',');
    } else {
      idStr = id;
      ids = [parseInt(id, 10)];
    }
    layer.confirm('确认删除数据吗?', {icon: 3, title: '提示'}, function (index) {
      //do something
      $.post('./del', {'id': idStr}, function (res) {
        if (res.code == 0) {
          layer.msg('删除成功');
          $('button[name=\'refresh\']').click();
        } else {
          layer.msg(res.msg);
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
  /*删除   ****************结尾*/

//  //设置群是否显示在广场
//  function setShowSquare()
//  {
//    layer_show('设置显示在广场', [g_dealGroupUrl+"?ids="+ids,'no'],'350',200);
//  }
</script>
