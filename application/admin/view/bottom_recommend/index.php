<style>
    .btn{
        margin: 0 10px;
    }
    .input-text{
        width: 200px;
    }
    .top-table{
        position: absolute;
        top: 45px;
        width: 800px;
        left: 21px;
    }
</style>

<!--<div id="table-button-html" class="hide">-->
<!--    <button class="btn btn-primary" onclick="add()" > 新增 </button>-->
<!--</div>-->

<script>
    $table = $('#userListTable');
    function loadClick(){
        $('.recommend-html').click(function () {
            var e = $(this),
                disabledListStr = '',
                id = e.data('id'),
                disabledList = e.data('disabled-list');

            for (var i in disabledList){
                if (disabledList.hasOwnProperty(i)){
                    disabledListStr += '&disabledList[]=' + disabledList[i];
                }
            }

        });
    }

    window['adminTableConfig'] = {
        onLoadSuccess: loadClick,
        onToggle: loadClick
    };

    //编辑栏目状态
    function _editstatus(id,status) {
        layer.confirm('确认改变该栏目当前状态？',function(index){
            $.ajax({
                type: 'POST',
                url: "./editstatus",
                data:{
                    id:id,
                    status:status,
                },// 参数
                async: false,
                dataType: 'json',
                success: function(data){
                    layer.msg(data.data.msg,{icon:1,time:1000});
                    setTimeout(window.location.reload(),1500);
                },
                error:function(data) {
                    console.log(data.data.msg);
                    setTimeout(window.location.reload(),1500);
                },
            });
        });
    }

</script>
