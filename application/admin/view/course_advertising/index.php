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

<div id="table-button-html" class="hide">
    <button class="btn btn-primary" onclick="add()" > 新增 </button>
</div>

<script>
    $table = $('#userListTable');
    var addUrl = './add';
    var editUrl = './edit';
    var delUrl = './del';
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
    //增加禁言用户
    function add() {
        title = '新增';
        url = addUrl;
        w = '';
        h = '510';
        layer_show(title, url, w, h);
    }
    //编辑禁言用户
    function _edit(id) {
        title = '编辑';
        url = editUrl +"?id="+ id;
        w = '';
        h = '510';
        layer_show(title, url, w, h);
    }
    //编辑用户状态
    function _editstatus(id,status) {
        layer.confirm('确认改变该课程广告当前状态？',function(index){
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
    //删除数据
    function _del(id) {
        layer.confirm('确认删除该课程广告？',function(index){
            $.ajax({
                type: 'POST',
                url: delUrl,
                data:{
                    id:id,
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
