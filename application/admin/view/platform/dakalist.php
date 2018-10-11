<div class="page-container">
  <div class="text-c">
       <input type="text" class="input-text" style="width:140px" placeholder="请输入昵称" id="alias" name="alias">
    <input type="text" class="input-text" style="width:140px" placeholder="请输入邮箱" id="email" name="email">
    <input type="text" class="input-text" style="width:140px" placeholder="请输入手机号码" id="tel" name="tel">

    <button type="submit" onclick="javascript:$('button[name=\'refresh\']').click();" class="btn btn-success radius" id="" name="">
      <i class="Hui-iconfont">&#xe665;</i>搜服务号</button></div>
  <div class="cl pd-5 bg-1 bk-gray mt-20">
    <div id="toolbar" class="btn-group">   
      <button onclick="dealDaka()" type="button" class="btn btn-success" style="margin-right:10px;">　确定　</button>>
    </div>

    <div class="mt-20">
      <table id="userListTable"></table>
    </div>
  </div>
</div>

<script type="text/javascript">
    $table = $('#userListTable');
    var url = './dakalist';

    $(function(){
      //调用函数，初始化表格
      initTable();
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
                field: 'user_id',
                sortable: true,
                sortName: 'ID',
                title: 'ID'
            }, {
                field: 'alias',
                title: '昵称'
            },{
              field: 'age',
              title: '年龄'
            }, {
                field: 'gender',
                title: '性别'
            },{
              field: 'email',
              title: '邮箱'
            },{
                field: 'tel',
                title: '手机'
            }],
            pageSize: 1000,  //每页显示的记录数
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
                    alias:$('#alias').val(),
                    email:$('#email').val(),
                    tel:$('#tel').val(),
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

    function getIdSelections() {
        return $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.user_id
        });
    }

    function dealDaka()
    {
      console.log(getIdSelections().join(','));
        $.ajax({
          type:"POST",
          url:'./dealPlatformDaka',
          data:{platformId:getQueryString('platformId'),daka_ids:getIdSelections().join(',')},
          async: false,
          beforeSend:function(){
            jz = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
          },
          error: function(request) {
            layer.close(jz);
            layer.msg("网络错误!", "", "error");
          },
          success: function(data) {
            //关闭加载层
            layer.close(jz);
            if(data.code == 200){
              layer.msg(data.msg, "", "success");
              var index = parent.layer.getFrameIndex(window.name);
              parent.$table.bootstrapTable('refresh');
              parent.layer.close(index);
            }else{
              layer.msg(data.msg, "", "error");
            }
          }
        });
    }

</script>