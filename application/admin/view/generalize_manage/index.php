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

<div id="table-search-html">
    <input type="text" class="input-text" placeholder="广告组合名称" id="ad_group_name" name="ad_group_name"/>
    <select class="input-text" id="affiliation_column_id" name="affiliation_column_id">
        <{volist name="column" id="vo"}>
        <option value="">栏目归属</option>
        <option value="<{$vo.id}>"><{$vo.name}></option>
        <{/volist}>
    </select>
    <input type="text" class="input-text" placeholder="请输入栏目位置" id="column_place" name="column_place"/>
    <select class="input-text" id="status" name="status">
        <option value="0">全部状态</option>
        <option value="1">开启</option>
        <option value="2">禁用</option>
    </select>
    <input type="text" class="input-text" placeholder="标题（全部元素）" id="title" name="title"/>
    <input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'dateMax\')||\'%y-%M-%d\'}',dateFmt: 'yyyy-MM-dd HH:mm'})" id="dateMin" placeholder="创建开始时间"
           class="input-text Wdate" style="width:120px;">-
    <input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'dateMin\')}',dateFmt: 'yyyy-MM-dd HH:mm'})" id="dateMax" placeholder="创建结束时间"
           class="input-text Wdate" style="width:120px;">

    <input type="submit" value="搜索" class="btn btn-success radius" onclick="adminTableRefresh()" />
</div>

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
    window['adminTableQueryParams'] = function (){
        return {
            ad_group_name: $('#ad_group_name').val(),
            title: $('#title').val(),
            column_place: $('#column_place').val(),
            status:$('#status option:selected').val(),
            affiliation_column:$('#affiliation_column_id option:selected').val(),
            dateMin: $('#dateMin').val(),
            dateMax: $('#dateMax').val(),
            tabName1: "<{$Think.get.tabName1??''}>",
            tabName2: "<{$Think.get.tabName2??''}>"
        };
    };
    //增加禁言用户
    function add() {
        title = '新增';
        url = addUrl;
        w = '';
        h = '700';
        layer_show(title, url, w, h);
    }
    //编辑禁言用户
    function _edit(id) {
        title = '编辑';
        url = editUrl +"?id="+ id;
        w = '';
        h = '700';
        layer_show(title, url, w, h);
    }
    //编辑用户状态
    function _editstatus(id,status) {
        layer.confirm('确认改变该广告当前状态？',function(index){
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
        layer.confirm('确认删除该广告？',function(index){
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
