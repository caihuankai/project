<style>
    .slimg_log{max-width: 30px;max-height: 30px;display:block;}
</style>
<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 
    <script>document.write(decodeURI(getQueryString("tabName1")))</script> 
    <span class="c-gray en">&gt;
    </span> 
    <script>document.write(decodeURI(getQueryString("tabName2")))</script>  
    <a class="btn btn-success radius r" style="line-height:1em;height: 2em;" href="javascript:location.replace(location.href);" title="刷新">
        <i class="Hui-iconfont">&#xe68f;</i>
    </a>
</nav>
<div class="page-container">
  <!--工具按钮开始-->
  <div id="toolbar" class="btn-group">    
    <button id="btn_add" type="button" class="btn btn-success" style="margin-right:10px;">　新增　</button>
    <!--<button disabled id="btn_delete" type="button" class="btn btn-danger" title="请先选中要删除的菜单" style="margin-right:10px;">　删除　</button>-->
  </div>
  <!--工具按钮结束-->
  <div class="mt-20">
    <table id="dataTable">
    </table>
  </div>
</div>
<script type="text/javascript">
	var gift_position = <?=json_encode($gift_position);?>;
	var gift_type = <?=json_encode($gift_type);?>;
	var gift_status = <?=json_encode($gift_status);?>;


  var url        = './index';
  var addUrl     = './add';
  var delUrl     = './del';
  var $table     = $("#dataTable");
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
      sortOrder: "DESC",   //排序方式
      clickToSelect: true,  //是否启用点击选中行
      //height: 700,   //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
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
        title: '序号',
		formatter:function(val, rows, i){
			return parseInt(i)+1;
		}
      }, {
        field: 'id',
        sortable:true,
        sortName:'id',
        title: 'ID'
      }, {
            field: 'img',
            title: '缩略图',
            formatter:function(val, rows) {
                return "<div><img src='"+val+"' class='slimg_log' /><a class='slimg_a' href=\"javascript:kandatu('"+val+"');\">查看大图</a></div>";
            }    
        }, {
            field: 'name',
            title: '礼物名称'
            }, {
            field: 'position',
            title: '所属位置',
            formatter:function(val) {
                for (var i in gift_position) {
                    if (i == val) {
                        return gift_position[i];
                    }
                }
            }
	}, {
            field: 'money',
            title: '价值（礼点）'
	}, {
            field: 'type',
            title: '类型',
            formatter:function(val) {
                for (var i in gift_type) {
                    if (i == val) {
                        return gift_type[i];
                    }
                }
            }		
	}, {
            field: 'status',
            title: '状态',
            formatter:function(val) {
                if (val == 2) {
                        return "<span style='color:red;'>下架</span>";
                }	
                for (var i in gift_status) {
                    if (i == val) {
                        return gift_status[i];
                    }
                }
            }
	}, {
            field: 'create_time',
            title: '创建时间'	
        },{
            field: 'admin_name',
            title: '操作人'		
        }, {
            field: 'sort',
            title: '排序'    
        },{
            field: 'id',
            title: '操作',
            align:'center',
            formatter:function(val) {
                return "<a href=\"javascript:add("+val+");\">编辑</a>|<a href=\"javascript:del("+val+");\">删除</a>";
            }
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
    //点击新增
    $("#btn_add").click(function(){
      add();
    });
  });
  /*菜单-添加*/
  function add(gift_id)
  {
    title = '添加礼物';
    url   = addUrl;
    if (gift_id) {
        title = "编辑礼物";
        url   = addUrl+"?gift_id="+gift_id;
    }
    w     = '';
    h     = '510';
    layer_show(title,url,w,h);
  }
  
  
  function kandatu(val) {
	layer.open({
		type: 1,
		title: false,
		shadeClose: true,
		closeBtn: 0,
		skin: 'layui-layer-nobg', //没有背景色
		content: '<img src="'+val+'" />'
	});
  }
  
  
 
 
 
  /*菜单-删除*/
  function del(gift_id){
    if (!gift_id) {
        return null;
    }
    var data = {gift_id:gift_id};
    
    layer.confirm("确定删除吗？", {icon: 3, title:'提示'}, function(index){
      //do something
      $.getJSON(delUrl, data, function(res){
        if(res.code == 200){
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
  
  
  
  
  $table.on('check.bs.table uncheck.bs.table ' +
      'check-all.bs.table uncheck-all.bs.table', function () {
    $("#btn_delete").prop('disabled', !$table.bootstrapTable('getSelections').length);

    // save your data, here just save the current page
    //selections = getIdSelections();
    // push or splice the selections if you want to save all data selections
  });
</script> 