<style>
    .btn{
        margin: 0 10px;
    }
    .input-text{
        width: 200px;
    }
</style>


<div id="table-button-html" class="hide">
    <button class="btn btn-primary" id="table-button-dis"> 禁用 </button>
    <button class="btn btn-primary" id="table-button-open"> 启用 </button>
</div>


<script>

    function loadClick(){
        $('.changeFreeze').click(function (){
            var e = $(this);


            changeFreeze([e.data('ids')], e.data('status'));
        });
    }

    window['adminTableConfig'] = {
        onLoadSuccess: loadClick,
        onToggle: loadClick
    };
    
    
    $(function () {
        $('#table-button-dis, #table-button-open').click(function () {
            var status = $(this).is('#table-button-open') ? 0 : 1,
                ids = [];

            adminTableGetSelections(function (data){
                ids.push(data['id']);
            });

            ids.length > 0 && changeFreeze(ids, status);
        });

    });


    function changeFreeze(ids, statusEle){



        requestAjax({
            ids: ids,
            status: statusEle
        }, {
            url: "<{:url('changeFreeze')}>",
            localSuccess: function (){
                adminTableRefresh();
            }
        });


    }
    
</script>
