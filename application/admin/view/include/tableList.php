
<div class="page-container">
    <div class="text-c" id="table-search">
    </div>
    <{replace_html id="$tableSearchId" replace="table-search"}>
    
    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <div id="toolbar" class="btn-group">
            <{// 这里的button必须在class带有btn属性}>
        </div>
        <{replace_html id="$toolbarId" replace="toolbar"}>
        
        <div class="mt-20">
            <table id="userListTable"></table>
        </div>
    </div>
</div>


<script>
    /**
     * 显示后台表格
     *
     * @param columns 显示字段
     * @param config  额外的配置
     * @param queryParams 请求参数
     */
    function adminTable(columns, config, queryParams){
        var table = $('#userListTable'),
            onLoadSuccessLocal = null,
            defaultConfig = {
                method: 'get', // 请求类型
                url:'#', // 获取数据的地址， 请求当前地址


                striped: true,  //表格显示条纹
                pagination: true, //启动分页
                //search:true,
                showRefresh: true,     //是否显示刷新按钮
                sortable: true,      //是否启用排序
                sortOrder: "DESC",   //排序方式
                clickToSelect: true,  //是否启用点击选中行
//            height: 550,   //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
                uniqueId: "id",   //每一行的唯一标识，一般为主键列
                cardView: false,   //是否显示详细视图
                toolbar: "#toolbar",
                showToggle: true, // 是否显示 切换试图（table/card）按钮
                showColumns: true, // 是否显示 内容列下拉框
                columns: columns,
                pageSize: 10,  //每页显示的记录数
                pageNumber: 1, //当前第几页
                pageList: [5, 10, 15, 20, 25],  //记录数可选列表
                sidePagination: "server", // 设置去哪里进行分页，可选值为 'client' 或者 'server'。
                //设置为undefined可以获取pageNumber，pageSize，searchText，sortName，sortOrder
                //设置为limit可以获取limit, offset, search, sort, order
                queryParamsType: "undefined",
                queryParams: function (params) {   //设置查询参数
                    return $.extend(params?{
                        pageNumber: params.pageNumber,
                        pageSize: params.pageSize,
                        order: params.sortOrder,
                        orderName: params.sortName,
                        table: 1 // 区分是否是获取表格数据
                    }:{}, typeof queryParams === 'function' ? queryParams() : queryParams);
                },
                onLoadSuccessAfterFunc: function (){
                    /**
                     * 改变状态的接口
                     */
                    $('.<{$tableChangeTinyint}>').click(this.onChangeStatusClickFunc);
                },
                onChangeStatusClickFunc: function (){
                    var e = $(this),
                        data = {};

                    try{
                        data = e.data('data') || {};
                    }catch (e){
                        data = {};
                    }

                    requestAjax(data, {
                        url: "<{:url('changeTinyint')}>",
                        localSuccess: function (){
                            adminTableRefresh();
                        }
                    })
                },
                onLoadSuccessAfterFuncName: 'onLoadSuccessAfterFunc',
                onLoadSuccess: function () {  //加载成功时执行，不会被覆盖
                    layer.msg("加载完毕", {time: 1000});

                    this[this['onLoadSuccessAfterFuncName']].apply(this, []);

                    if (onLoadSuccessLocal != null && typeof onLoadSuccessLocal === 'function') {
                        onLoadSuccessLocal();
                    }
                },
                onRefresh: function () {
                    // console.log(222);
                },
                onLoadError: function () {  //加载失败时执行
                    layer.msg("加载数据失败");
                }
            };
        table.bootstrapTable('destroy');

        if (config && config.hasOwnProperty('onLoadSuccess')){ // 复用公共的onLoadSuccess事件
            onLoadSuccessLocal = config.onLoadSuccess;
            defaultConfig.onToggle = onLoadSuccessLocal; // 切换时就重新绑定
            delete config.onLoadSuccess;
        }

        return table.bootstrapTable($.extend(defaultConfig, config));
    }


    /**
     * 刷新表格
     */
    function adminTableRefresh(){
        $('#userListTable').bootstrapTable('refresh');
    }
    
    
    function adminTableExport(){
        var a = document.createElement('a');
        a.href='?' + $.param($.extend($('table').bootstrapTable('getOptions').queryParams(),{
            export:1,

            // 公共参数，和上面一样
            table: 1 // 区分是否是获取表格数据
        }));
        console.log(a);
        a.click();
    }
    
    
    function adminTableGetSelections(func) {
        return $('#userListTable').bootstrapTable('getSelections').map(func);
    }

</script>