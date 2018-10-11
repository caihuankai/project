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
    <button class="btn btn-primary" id="table-button-add">新增素材</button>
    <button disabled id="btn_deit" type="button" class="btn btn-primary" style="margin-right:10px;">　禁用　</button>    
    <button disabled id="btn_delete" type="button" class="btn btn-primary" title="请先选中要删除的菜单" style="margin-right:10px;">　移除　</button>
</div>



<script>
    $table = $('#userListTable');
    var positionType  = "<{$positionType}>",
    addUrl="<{:url('InstituteBanner/add')}>?positionType=" + positionType,
    changeStatusUrl = "<{:url('InstituteBanner/changeStatus')}>",
    delectUrl="<{:url('InstituteBanner/delete')}>",
    delarray = "<{:url('InstituteBanner/delarray')}>",
    editarray = "<{:url('InstituteBanner/editarray')}>";
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
        });
        //点击删除
        $("#btn_delete").click(function () {
            $("#btn_delete").prop('disabled', true);
            var ids = getIdSelections();
            delect_array(ids);
        });
        //修改
        $("#btn_deit").click(function () {
            $("#btn_deit").prop('disabled', true);
            var ids = getIdSelections();
            edit_array(ids)
        });
    });
    function add() {
        title = '新增/编辑';
        url = addUrl;
        w = '';
        h = '510';
        layer_show(title, url, w, h);
    }

    //显示大图
    function _showBig(src) {
        layer.ready(function (){
            layer.photos({
                photos:{
                    "title": "图片展示", //相册标题
                    "data": [   //相册包含的图片，数组格式
                        {
                            "alt": "图片展示",
                            "src": src, //原图地址
                            "thumb": src //缩略图地址
                        }
                    ]
                },
                closeBtn:2,
            });
        });
    }
    function _edit(id) {
        title = '编辑';
        url = addUrl +"&id="+ id;
        w = '';
        h = '700';
        layer_show(title, url, w, h);
    }
    //删除数据
    function _delete(id) {
        layer.confirm('确认移除该数据？',function(index){
            $.ajax({
                type: 'POST',
                url: delectUrl,
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
                    console.log(data.data);
                    setTimeout(window.location.reload(),1500);
                },
            });
        });
    }
    
    function _changeStatus(id,status){
        layer.confirm('确认修改该数据状态？',function(index){
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
                    layer.msg(data.msg,{icon:1,time:500});
                    setTimeout(window.location.reload(),1000);
                },
                error:function(data) {
                    console.log(data.data);
                    setTimeout(window.location.reload(),1000);
                },
            });
        });
    }

//批量操作

    /*批量删除*/
    function delect_array(ids) {
        id = ids;
        if (ids instanceof Array) {
            var idStr = id.join(',');
        } else {
            var idStr = id;
            ids = [parseInt(id, 10)];
        }
        layer.confirm('确认删除当前选择的所有数据吗?', {icon: 3, title: '提示'}, function (index) {
            $.ajax({
                type: 'POST',
                url: delarray,
                data:{
                    ids:idStr,
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
        })
    }
    /*批量修改*/
    function edit_array(ids) {
        id = ids;
        if (ids instanceof Array) {
            var idStr = id.join(',');
        } else {
            var idStr = id;
            ids = [parseInt(id, 10)];
        }
        layer.confirm('确认禁用当前选择的数据吗?', {icon: 3, title: '提示'}, function (index) {
            $.ajax({
                type: 'POST',
                url: editarray,
                data:{
                    ids:idStr,
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
        })
    }
    //
    function getIdSelections() {
        return $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.id
        });
    }
    $table.on('check.bs.table uncheck.bs.table ' +
        'check-all.bs.table uncheck-all.bs.table', function () {
        $("#btn_delete").prop('disabled', !$table.bootstrapTable('getSelections').length);
        selections = getIdSelections();
    });
    $table.on('check.bs.table uncheck.bs.table ' +
        'check-all.bs.table uncheck-all.bs.table', function () {
        $("#btn_deit").prop('disabled', !$table.bootstrapTable('getSelections').length);
        selections = getIdSelections();
    });


    
</script>
