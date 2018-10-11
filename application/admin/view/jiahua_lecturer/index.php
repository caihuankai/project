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

<div id="table-button-html" class="hide">
    <button class="btn btn-primary" id="table-button-add">新增</button>
</div>


<script>
    var addUrl="./add";
    var changeStatusUrl="./changeStatus";
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

    $(function () {
        /**
         * 新增表情
         */
        $("#table-button-add").click(function () {
            add();
        })
    });
    function add() {
        title = '新增/编辑';
        url = addUrl;
        w = '';
        h = '510';
        layer_show(title, url, w, h);
    }

    function _showBig(src) {
        var content = '<img src="' + src + '" height="' + 100% + '" width="' + 100% + '"/>';
            layer.open({
            type: 1,
            title: false,
            shadeClose: true,
            closeBtn: 0,
            skin: 'layui-layer-nobg', //没有背景色
            content: content,
        });
    }
    //删除数据
    function _changeStatus(id,status) {
        layer.confirm('确认要将该讲师设置为直播状态？',function(index){
            $.ajax({
                type: 'POST',
                url: changeStatusUrl,
                data:{
                    id:id,
                    status:status
                },// 参数
                async: false,
                dataType: 'json',
                success: function(data){
                    layer.msg(data.msg,{icon:1,time:1000});
                    setTimeout(window.location.reload(),1500);
                },
                error:function(data) {
                    console.log(data.msg);
                    setTimeout(window.location.reload(),1500);
                },
            });
        });
    }


    
</script>
