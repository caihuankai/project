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
    .top-div{
        position: absolute;
        top: 120px;
        left: 25px;
    }
</style>

<div id="auditStatusDiv" class="top-div">
	<span>是否需要审核：</span>
    <div class="radio-box">
        <input type="radio" class="auditStatus" name="auditStatus" value="1" <{eq name="auditStatus" value="1"}>checked<{/eq}> >
        <label for="auditStatus">是</label>
    </div>
	<div class="radio-box">
    	<input type="radio" class="auditStatus" name="auditStatus" value="0" <{eq name="auditStatus" value="0"}>checked<{/eq}> >
        <label for="auditStatus">否</label>
    </div>
    <span>（说明：是，本特训班评论不直接展示到前端互动模块；否，直接展示在前端。）</span>
</div>

<div id="table-search-html">
    <input type="text" class="input-text" placeholder="评论内容" id="search-content" name="search-content"/>
    <input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'dateMax\')||\'%y-%M-%d\'}'})" id="dateMin" placeholder="创建开始时间"
           class="input-text Wdate" style="width:120px;">-
    <input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'dateMin\')}'})" id="dateMax" placeholder="创建结束时间"
           class="input-text Wdate" style="width:120px;">

    <select title="状态" name="" id="search-state" class="form-control form-select">
        <option value="">全部</option>
        <option value="1">显示</option>
        <option value="2">屏蔽</option>
    </select>
    <!--工具按钮开始-->
    <div id="toolbar" class="btn-group">  
         
        <button id="btn_hide" type="button" class="btn btn-success" style="margin-right:10px;">　屏蔽　</button>
        <button id="btn_show" type="button" class="btn btn-success" style="margin-right:10px;">　显示　</button>
        <button id="btn_del" type="button" class="btn btn-success" style="margin-right:10px;">　删除　</button>
    </div>
    <!--工具按钮结束-->

    <input type="submit" value="搜索" class="btn btn-success radius" onclick="adminTableRefresh()" />
</div>


<script>
    $(function () {

        //审核开关
        var auditStatusOri = <{$auditStatus}>;
        $(".auditStatus").click(function() {
        	checkAuditstatus = $(".auditStatus:checked").val();
        	if(auditStatusOri != checkAuditstatus){
        		auditStatusOri = checkAuditstatus;
        		requestAjax({
        			courseId:<{$courseId}>, 
        			auditStatus: checkAuditstatus,
                }, {
                    url: "<{:url('changeAuditStatus')}>",
                    success: function (e){
                    	if (e.code == 200) {
                            layer.msg("修改成功");
                        }else {
                            layer.msg(e.msg);
                        }
                    }
                })
        	}
        });

        // 禁用和启用按钮
        $('#btn_hide, #btn_show').click(function () {
            var status = $(this).is('#btn_show') ? 1 : 2,
                ids = [];

            adminTableGetSelections(function (data){
                ids.push(data['id']);
            });

            if (ids.length > 0) {
                changeStatus(ids, status);
            }
        });

        // 删除按钮
        $('#btn_del').click(function () {
            var ids = [];

            adminTableGetSelections(function (data){
                ids.push(data['id']);
            });

            if (ids.length > 0) {
                del(ids);
            }
        });

    });

    function loadClick(){

        //操作栏上的删除按钮
        $('.del-html').click(function () {
            var e = $(this),
                id = e.data('id');

            del(id);
        });

        // 操作栏上的状态按钮
        $('.state').click(function (){
            var e = $(this);

            try{
                changeStatus([e.data('ids')]);
            }catch (e){}
        });


    }


    var actionStatusHtml = {"1":"显示","2":"屏蔽"};
    var statusMap = {1: 2, 2: 1};
    window['adminTableConfig'] = {
        onLoadSuccess: loadClick,
        onToggle: loadClick
    };
    window['adminTableQueryParams'] = function (){
        return {
            content: $('#search-content').val(),
            dateMin: $('#dateMin').val(),
            dateMax: $('#dateMax').val(),
            state: $('#search-state').val(),
            tabName1: "<{$Think.get.tabName1??''}>",
            tabName2: "<{$Think.get.tabName2??''}>"
        };
    };

    /**
     * 切换状态
     * @param ids
     * @param statusEle
     */
    function changeStatus(ids, statusEle){
        var table = $('#userListTable');

        $.map(ids, function (val, key){
            var data = table.bootstrapTable('getRowByUniqueId', val),
                status = statusEle == null ? (statusEle = statusMap[data['status']]) : statusEle,
                tempEle = $('<div>'+data['action']+'</div>');

            tempEle.children('.state').html(actionStatusHtml[status]);
            data['action'] = tempEle.html();
            if(status == 1){
                data['status'] = status;
            }
            table.bootstrapTable('updateRow', {
                index: data['num'],
                data:data
            });
        });

        loadClick();

        requestAjax({
            ids: ids,
            status: statusEle,
            live: 2,
            parent: 1
        }, {
            url: "<{:url('changeStatus')}>",
            localSuccess: function (){
                adminTableRefresh();
            }
        })
    }

    //删除函数
    function del(ids) {

        layer.confirm('确认删除？', function (){
            requestAjax({
                ids: ids
            }, {
                url: "<{:url('del')}>",
                success: function (json){
                    if (json.status == 1) {
                        layer.msg('成功', "", "success");
                        adminTableRefresh();
                    } else {
                        layer.msg(json.msg, "", "error");
                    }
                }
            })
        });
    }

</script>
