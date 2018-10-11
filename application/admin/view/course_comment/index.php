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
    <button class="btn btn-primary" id="table-button-del"> 删除 </button>
</div>




<div id="table-search-html">
    <input type="text" class="input-text" placeholder="回复内容" id="search-reply" name="reply"/>

    <input type="text" class="input-text" placeholder="内容" id="search-content" name="content"/>
    
    <{date_range title=""}>
    
    <input type="submit" value="搜索" class="btn btn-success radius" onclick="adminTableRefresh()" />
</div>


<script>

    window['adminTableConfig'] = {
        onLoadSuccess: function (){
            
            // 忽略
            $('.comment-del').click(function (){
                commentDel($(this).data('id'));
            });
            
        }
    };
    window['adminTableQueryParams'] = function (){
        return {
            reply: $('#search-reply').val(),
            content: $('#search-content').val(),
            dateMin: $('#search-dateMin').val(),
            dateMax: $('#search-dateMax').val(),
            tabName1: "<{$Think.get.tabName1??''}>",
            tabName2: "<{$Think.get.tabName2??''}>"
        };
    };

    $(function () {
        // 多个忽略
        $('#table-button-del').click(function (){
            var ids = [];
            adminTableGetSelections(function (data){
                ids.push(data.ID);
            });

            commentDel(ids);
        });

    });

    /**
     * 删除课程
     *
     * @param ids
     */
    function commentDel(ids){
        
        layer.confirm('确认删除', function (index){
            requestAjax({
                id: "<{$courseId}>",
                ids: ids
            }, {
                url: "<{:url('commentDel')}>",
                complete: function (){
                    adminTableRefresh();
                    layer.close(jz);
                }
            });
            
            layer.close(index);
        })
        
    }



</script>
