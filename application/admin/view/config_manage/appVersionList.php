<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> <script>document.write(getQueryString("tabName1"))</script> <span
            class="c-gray en">&gt;</span> <script>document.write(getQueryString("tabName2"))</script>  <a class="btn btn-success radius r" style="line-height:1em;height: 2em;"
                                                                                                                     href="javascript:location.replace(location.href);" title="刷新"><i
                class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <div id="toolbar" class="btn-group">    
            <button onclick="add()" type="button" class="btn btn-success" style="margin-right:10px;">　新建　</button><button disabled id="btn_delete" type="button" class="btn btn-danger" title="请先选中要删除的菜单">　删除　</button>
            &nbsp; </div>
        <div class="mt-20">
            <table id="dataTable">
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    var url        = './appVersionList';
    var $table     = $("#dataTable");
    function initTable() {
        //先销毁表格
        $table.bootstrapTable('destroy');
        //初始化表格,动态从服务器加载数据
        $table.bootstrapTable({
            method: "get",  //使用get请求到服务器获取数据
            url: url, //获取数据的地址
            striped: true,  //表格显示条纹
            pagination: true, //启动分页
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
                field: 'version_code',
                title: '版本号'
            }, {
                field: 'version_name',
                title: '版本名称'
            },{
                field: 'is_force',
                title: 'Android强制升级',
                align:'center',
                formatter:function(value,row,index){
                    if(value == 1){
                        value = '开启';
                    }else{
                        value = '不开启';
                    }
                    return value;
                }
            }, {
                field: 'upload_time',
                title: '上传时间',
                align:'center'
            }, {
                field: 'description',
                title: '文案'
            }, {
                field: 'ios_is_force',
                title: 'IOS强制升级',
                align:'center',
                formatter:function(value,row,index){
                    if(value == 1){
                        value = '开启';
                    }else{
                        value = '不开启';
                    }
                    return value;
                }
            }, {
                field: 'ios_is_ignore',
                title: 'IOS忽略当前版本',
                align:'center',
                formatter:function(value,row,index){
                    if(value == 1){
                        value = '忽略';
                    }else{
                        value = '不忽略';
                    }
                    return value;
                }
            }, {
                field: 'ios_is_test',
                title: 'IOS测试版|正式版',
                align:'center',
                formatter:function(value,row,index){
                    if(value == 1){
                        value = '测试版';
                    }else{
                        value = '正式版';
                    }
                    return value;
                }
            }, {
                field: 'ios_is_effective',
                title: 'IOS是否生效',
                align:'center',
                formatter:function(value,row,index){
                    if(value == 1){
                        value = '生效';
                    }else{
                        value = '不生效';
                    }
                    return value;
                }
            }, {
                field: 'url',
                title: '下载地址',
                align:'center'
            }, {
                field: 'size',
                title: '文件大小',
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
    });

    /*菜单-添加*/
    function add() {
        layer_show('新建版本信息',['./appVersionAdd'],'','600');
    }

    /*菜单-编辑*/
    function edit(id)
    {
        title = '编辑版本信息';
        url   = './appVersionEdit'+'?id='+id;
        w     = '';
        h     = '600';
        layer_show(title,url,w,h);
    }

    /*菜单-删除*/
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
            $.getJSON('./appVersionDel', {'id': idStr}, function (res) {
                if (res.code === 0) {
                    layer.msg('删除成功');
                    $('button[name=\'refresh\']').click();
                } else {
                    layer.msg('删除失败');
                }
            });
            layer.close(index);
        })
    }

    function uploadApk(id){
        url   = './uploadApk'+'?id='+id;
        w     = '';
        h     = '200';
        layer_show('上传安装包',url,w,h);
    }
</script>