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
    <button class="btn btn-primary" id="table-button-dis"> 屏蔽 </button>
    <button class="btn btn-primary" id="table-button-open"> 显示 </button>
</div>



<script>

    var actionStatusHtml = <{$actionStatusHtml|json_encode}>;
    var statusMap = {1: 2, 2: 1};
    window['adminTableConfig'] = {
        onLoadSuccess: function (){
            // 操作上的状态按钮
            $('.action-status').click(function (){
                var e = $(this),
                    status = e.data('status');
                try{
                    e.data('status', statusMap[status]);
                    e.html(actionStatusHtml[status]);
                    changeStatus(e.data('ids'), status);
                }catch (e){}
            });


            $('.action-recommend').click(function (){
                var e = $(this),
                    disabledListStr = '',
                    id = e.data('id'),
                    disabledList = e.data('disabled-list');

                for (var i in disabledList){
                    if (disabledList.hasOwnProperty(i)){
                        disabledListStr += '&disabledList[]=' + disabledList[i];
                    }
                }

                layer_show('推荐', '<{:url("Course/recommend")}>' + '?id=' + id + '&idType=' + e.data('id-type') + disabledListStr, 500, 350)
            });

        }
    };

    $(function () {
        // 禁用和启用按钮
        $('#table-button-dis, #table-button-open').click(function () {
            var tr = $('input[name="btSelectItem"]:checked').parent().parent(),
                changeStatusEle = tr.find('.action-status'),
                status = $(this).is('#table-button-open') ? 1 : 2,
                ids = [];

            changeStatusEle.map(function (){
                var e = $(this);

                ids.push(e.data('ids'));
                e.data('status', statusMap[status]);
                e.html(actionStatusHtml[status]);
            });

            ids.length > 0 && changeStatus(ids, status);
        });
    });

    function changeStatus(ids, status){
        requestAjax({
            ids: ids,
            status: status
        }, {
            url: "<{:url('Course/changeStatus')}>",
            localSuccess: function (){
                adminTableRefresh();
            }
        })
    }


</script>
