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

</div>

<div id="table-search-html">

</div>


<script>
    window['adminTableConfig'] = {
        onLoadSuccess: function (){

         	// 操作上的编辑按钮
            $('.action-edit-for-viewpoint').click(function (){
                var e = $(this);

                layer_show('编辑-观点', '<{:url("editForViewpoint")}>' + '?indexRecommendId=' + e.data('id') + '&viewpointId=' + e.data('viewpointId'), 1300, 700);
            });
            $('.action-edit-for-course').click(function (){
                var e = $(this);

                layer_show('编辑-观点', '<{:url("editForCourse")}>' + '?indexRecommendId=' + e.data('id') + '&courseId=' + e.data('courseId'), 1300, 700);
            });

        }
    };
    
    window['adminTableQueryParams'] = function (){
        return {
            tabName1: "<{$Think.get.tabName1??''}>",
            tabName2: "<{$Think.get.tabName2??''}>"
        };
    };

</script>
