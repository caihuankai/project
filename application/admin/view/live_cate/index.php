<style>
    .btn{
        margin: 0 10px;
    }
    .input-text{
        width: 200px;
    }
    .form-select{
        width: 250px;display: inline-block;height: 31px;line-height: 30px;font-size: 13px;padding: 0px 7px 3px 7px;
    }
</style>

<div id="table-button-html" class="hide">
    <button class="btn btn-primary" id="table-button-add"> 新增一级分类 </button>
    <button class="btn btn-primary" id="table-button-dis"> 禁用 </button>
    <button class="btn btn-primary" id="table-button-open"> 启用 </button>
    <button class="btn btn-primary" id="table-button-all" data-all="false"> 展开/隐藏所有子分类 </button>
</div>




<div id="table-search-html">
    <input type="text" class="input-text" placeholder="名称" id="search-name" name="name"/>

    
    <select title="直播间分类" name="" id="search-floor-cate" class="form-control form-select">
        <{option data="$floorCate"}>
    </select>
    <select title="状态" name="" id="search-status" class="form-control form-select">
        <{option data="$searchStatusArr" notHeader="true"}>
    </select>
    
    <input type="submit" value="搜索" class="btn btn-success radius" onclick="adminTableRefresh()" />
</div>


<script>

    var actionStatusHtml = <{$actionStatusHtml|json_encode}>;
    var columnStatusHtml = <{$columnStatusHtml|json_encode}>;
    var statusMap = {1: 2, 2: 1};
    
    
    
    
    function loadClick(){
        // 操作上的删除按钮
        $('.del-cate').click(function (){
            var e = $(this),
                id = e.data('id');

            delCate(id, e);
        });
        
        
        // 操作上的状态按钮
        $('.action-status').click(function (){
            var e = $(this);

            changeStatus([e.data('ids')]);
        });


        // 编辑子分类
        $('.edit-cate').click(function (){
            var e = $(this);
            
            layer_show('编辑' + (e.data('pid')>0?'子分类':'一级分类'), "<{:url('saveCate')}>" + "?id=" + e.data('id'), 600, 450)
        });


        // 删除按钮
        $('#table-button-delete').click(function () {
            var e = $(this),
                ids = [];

            adminTableGetSelections(function (data){
                if (data.ID) {
                    ids.push(data.ID)
                }
            });

            delCate(ids)
        });
        
        
        // 添加子分类
        $('.add-cate').click(function (){
            layer_show('新增子分类', "<{:url('saveCate')}>" + '?floorSelected=' + $(this).data('id'), 600, 450)
        });
    }
    
    
    
    
    window['adminTableConfig'] = {
        pagination: false, // 不分页
        onLoadSuccess: loadClick,
        onToggle: loadClick
    };
    window['adminTableQueryParams'] = function (){
        return {
            name: $('#search-name').val(),
            floorCate: $('#search-floor-cate').val(),
            status: $('#search-status').val(),
            tabName1: "<{$Think.get.tabName1??''}>",
            tabName2: "<{$Think.get.tabName2??''}>"
        };
    };

    $(function () {
        // 禁用和启用按钮
        $('#table-button-dis, #table-button-open').click(function () {
            var status = $(this).is('#table-button-open') ? 1 : 2,
                ids = [];


            adminTableGetSelections(function (data){
                ids.push(data.id);
            });

            ids.length > 0 && changeStatus(ids, status);
        });
        
        
        



        // 展开/隐藏所有子分类
        $('#table-button-all').click(function () {
            var e = $(this),
                bool = e.data('all');
            if (bool) {
                $('#search-floor-cate').val(0);
            }else{
                $('#search-floor-cate').val(-1);
            }
            e.data('all', !bool);
            
            adminTableRefresh();
        });


        // 添加分类
        $('#table-button-add').click(function (){
            layer_show('新增一级分类', "<{:url('saveCate')}>", 600, 450)
        });
        
    });

    function changeStatus(ids, statusEle){
        var table = $('#userListTable');

        $.map(ids, function (val, key){
            var data = table.bootstrapTable('getRowByUniqueId', val),
                status = statusEle == null ? (statusEle = statusMap[data['status']]) : statusEle,
                tempEle = $('<div>'+data['action']+'</div>');

            tempEle.children('.action-status').html(actionStatusHtml[status]);
            data['statusText'] = columnStatusHtml[status];
            data['action'] = tempEle.html();
            data['status'] = status;

            table.bootstrapTable('updateRow', {
                index: data['no'],
                data:data
            });
        });

        loadClick();
        
        
        requestAjax({
            ids: ids,
            status: statusEle
        }, {
            url: "<{:url('changeStatus')}>",
            complete: function () {
                layer.close(jz);
                adminTableRefresh();
            }
        })
    }



    function delCate(ids){
        
        layer.confirm('确认删除', function (){
            return requestAjax({
                ids: ids
            }, {
                url: "<{:url('delCate')}>",
                success: function () {
                    adminTableRefresh();
                }
            })
        })
        
    }

</script>
