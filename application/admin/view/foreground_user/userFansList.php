
<style>
    .btn{
        margin: 0 10px;
    }
    .input-text{
        width: 200px;
    }

    #flow-user-div {
        background: #ccc;
        font-weight: bold;
        position: absolute;
        top : 55px;
        left: 20px;
    }
    .page-container{
        margin-top: 50px;
    }
</style>




<div id="flow-user-div">
    <{$userData['user_level'] ==  3?'流量主':'会员'}>：<{$userData['alias']??''}>（ID：<{$userData['user_id']??''}>）
    <{$Think.get.type == 2 ?'邀请粉丝':'关注'}>数据
</div>






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
