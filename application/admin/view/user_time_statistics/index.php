<style>
    .btn{
        margin: 0 10px;
    }
    .input-text{
        width: 200px;
    }
    #showbig{
        position: relative;
        top: calc(10rem - 7.6rem);
    }
</style>

<!--<div id="table-button-html" class="hide">-->
<!--    <button class="btn btn-primary" id="table-button-add">新增</button>-->
<!--</div>-->



<script>;
    function loadClick(){
        $('.recommend-user-flow').click(function (){
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
</script>
