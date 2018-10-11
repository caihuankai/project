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

<!--<div id="table-search-html">-->
<!--    <input type="text" class="input-text" placeholder="用户ID" id="search-userid" name="search-userid"/>-->
<!--    <input type="text" class="input-text" placeholder="用户昵称" id="search-username" name="search-username"/>-->
<!---->
<!--    <input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'dateMax\')||\'%y-%M-%d\'}',dateFmt: 'yyyy-MM-dd HH:mm'})" id="dateMin" placeholder="创建开始时间"-->
<!--           class="input-text Wdate" style="width:120px;">--->
<!--    <input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'dateMin\')}',dateFmt: 'yyyy-MM-dd HH:mm'})" id="dateMax" placeholder="创建结束时间"-->
<!--           class="input-text Wdate" style="width:120px;">-->
<!---->
<!--    <input type="submit" value="搜索" class="btn btn-success radius" onclick="adminTableRefresh()" />-->
<!--</div>-->

<div id="table-button-html" class="hide">
    <button class="btn btn-primary" onclick="add()" > 新增 </button>
</div>

<script>
    $table = $('#userListTable');
    var addUrl = './add';
    var editUrl = './edit';
    var editstatusUrl = './editstatus';
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
    // window['adminTableQueryParams'] = function (){
    //     return {
    //         user_id: $('#search-userid').val(),
    //         alias: $('#search-username').val(),
    //         dateMin: $('#dateMin').val(),
    //         dateMax: $('#dateMax').val(),
    //         tabName1: "<{$Think.get.tabName1??''}>",
    //         tabName2: "<{$Think.get.tabName2??''}>"
    //     };
    // };
    //增加禁言用户
    function add() {
        title = '新增';
        url = addUrl;
        w = '';
        h = '250';
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
        layer.confirm('确认改变该弹幕当前状态？',function(index){
            $.ajax({
                type: 'POST',
                url: editstatusUrl,
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
    //编辑用户状态
    function _del(id) {
        layer.confirm('确认删除该弹幕？',function(index){
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
    //事件执行方法
    // $(function () {
    //     //批量删除
    //     $("#but_del").click(function () {
    //         $("#but_del").prop('disabled', true);
    //         var ids = getIdSelections();
    //         del_array(ids)
    //     })
    // });
    // /*批量修改*/
    // function del_array(ids) {
    //     id = ids;
    //     if (ids instanceof Array) {
    //         var idStr = id.join(',');
    //     } else {
    //         var idStr = id;
    //         ids = [parseInt(id, 10)];
    //     }
    //     // console.log(idStr);
    //     layer.confirm('确认删除当前选择的所有用户吗?', {icon: 3, title: '提示'}, function (index) {
    //         $.ajax({
    //             type: 'POST',
    //             url: "./arraydel",
    //             data:{
    //                 ids:idStr,
    //             },// 参数
    //             async: false,
    //             dataType: 'json',
    //             success: function(data){
    //                 layer.msg(data.msg,{icon:1,time:1000});
    //                 setTimeout(window.location.reload(),1500);
    //             },
    //             error:function(data) {
    //                 console.log(data.msg);
    //                 setTimeout(window.location.reload(),1500);
    //             },
    //         });
    //     })
    // }
    // //用户批量删除是最佳row ID
    // function getIdSelections() {
    //     return $.map($table.bootstrapTable('getSelections'), function (row) {
    //         return row.id
    //     });
    // }
    // //有选择时开启按钮
    // $table.on('check.bs.table uncheck.bs.table ' +
    //     'check-all.bs.table uncheck-all.bs.table', function () {
    //     $("#but_del").prop('disabled', !$table.bootstrapTable('getSelections').length);
    //     selections = getIdSelections();
    // });


</script>
