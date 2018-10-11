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

<div id="table-button-html" class="btn-group">    
    <button id="table-button-add" type="button" class="btn btn-success" style="margin-right:10px;">　新增　</button>
    <button id="table-button-del" type="button" class="btn btn-danger" style="margin-right:10px;">　删除　</button>
</div>

<div id="table-search-html">
    <input type="text" class="input-text" placeholder="观点标题分类名称" id="search-name" name="name"/>
    
    <input type="submit" value="搜索" class="btn btn-success radius" onclick="adminTableRefresh()" />
</div>

<script>


    window['adminTableConfig'] = {
        onLoadSuccess: function (){

            // 编辑类别
            $('.edit-cate').click(function (){
                var e = $(this);

                layer_show('编辑观点类别', "<{:url('saveCate')}>" + "?id=" + e.data('id') +'&type=' + e.data('type'), 600, 400);
            });

            // 操作上的删除按钮
            $('.del-cate').click(function (){
                var id = $(this).data('id');
                delCate([id]);
            });



        }
    };
    window['adminTableQueryParams'] = function (){
        return {
            name: $('#search-name').val(),
            tabName1: "<{$Think.get.tabName1??''}>",
            tabName2: "<{$Think.get.tabName2??''}>"
        };
    };

    $(function () {

        // 添加类别按钮
        $('#table-button-add').click(function (){
            layer_show('新增', "<{:url('saveCate')}>", 600, 400)
        });

        // 删除按钮(多)
        $('#table-button-del').click(function () {
            var e = $(this),
                ids = [];

            adminTableGetSelections(function (data){
                if (data.id) {
                    ids.push(data.id);
                }
            });
            ids.length > 0 && delCate(ids);
        });

    });

    //删除类别(单)
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
