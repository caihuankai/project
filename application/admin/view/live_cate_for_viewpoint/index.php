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
    <button class="btn btn-primary" id="table-button-add"> 新增类别 </button>
    <button class="btn btn-primary" id="table-button-delete"> 删除 </button>
</div>




<div id="table-search-html">
    <input type="text" class="input-text" placeholder="标签名称" id="search-name" name="name"/>

    
    <select title="标签类别" name="" id="search-floor-cate" class="form-control form-select">
        <{option data="$floorCate"}>
    </select>
    
    <input type="submit" value="搜索" class="btn btn-success radius" onclick="adminTableRefresh()" />
</div>


<script>

    
    function loadClick(){
        
        // 操作上的删除按钮
        $('.del-cate').click(function (){
            var id = $(this).data('id');
            delCate([id]);
        });

        // 编辑类别
        $('.edit-cate').click(function (){
            var e = $(this);
            
            layer_show('编辑观点类别', "<{:url('saveCate')}>" + "?id=" + e.data('id'), 600, 400);
        });

        //添加相关标签
        $('.add-second-cate').click(function(){
        	var e = $(this);
        	layer_show('添加相关标签', "<{:url('addSecondCate')}>" + "?id=" + e.data('id') + "&firstCate=" + e.data('firstCate'), 600, 400)
        });

        //删除相关标签
        $('.del-second-cate').click(function(){
        	var e = $(this);
        	layer_show('删除相关标签', "<{:url('delSecondCate')}>" + "?id=" + e.data('id') + "&firstCate=" + e.data('firstCate'), 600, 400)
        });


        // 删除按钮
        $('#table-button-delete').click(function () {
            var e = $(this),
                ids = [];

            adminTableGetSelections(function (data){
                if (data.id) {
                    ids.push(data.id);
                }
            });

            ids.length > 0 && delCate(ids);
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
            tabName1: "<{$Think.get.tabName1??''}>",
            tabName2: "<{$Think.get.tabName2??''}>"
        };
    };

    $(function () {
        // 添加类别
        $('#table-button-add').click(function (){
            layer_show('新增类别', "<{:url('saveCate')}>", 600, 400)
        });
        
    });

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
