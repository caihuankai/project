<div class="page-container" id="subscribe_toolbar">
  <!--工具按钮结束-->
  <div class="mt-20">
    <table id="dataTable">
    </table>
  </div>
</div>

<script type="text/javascript">
  $table = $('#dataTable');
  var g_delUrl = './del';
  var g_editUrl = './edit';
  var url = './index';
  var g_windowHight = '510';

  $(function(){
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
    $table.bootstrapTable('destroy');
    //初始化表格,动态从服务器加载数据
    $table.bootstrapTable({
      method: "post",  //使用get请求到服务器获取数据
      contentType: "application/x-www-form-urlencoded",
      url: url, //获取数据的地址
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
        title: '名称'
      }, {
        field: 'app_id',
        title: 'AppId'
      },{
        field: 'app_secret',
        title: 'AppSectet'
      }, {
        field: 'source_id',
        title: '原始ID'
      }, {
        field: 'status',
        title: '状态'
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
          name:$('#name').val(),
          app_id:$('#app_id').val(),
          type:getQueryString("type"),
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

  //点击删除
  $("#btn_delete").click(function () {
    $("#btn_delete").prop('disabled', true);
    var ids = getIdSelections();
    del(ids);
  })

  /*用户-添加*/
  function member_add(title, url, w, h) {
    layer_show(title, url, w, h);
  }
  /*用户-编辑*/
  function edit(id) {
    layer_show('编辑服务号', g_editUrl + '?id=' + id, '', g_windowHight);
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