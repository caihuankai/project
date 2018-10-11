<script src="/lib/bootstrap-datetime/js/bootstrap-datetimepicker.min.js"></script>
<script src="/lib/bootstrap-datetime/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
<link rel="stylesheet" href="/lib/bootstrap-datetime/css/datetimepicker_blue.css" type="text/css">
<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i>首页
    <span class="c-gray en">&gt;</span>
    <script>document.write(getQueryString('tabName1'))</script>
    <span class="c-gray en">&gt;</span>
    <script>document.write(getQueryString('tabName2'))</script>
    <a class="btn btn-success radius r" style="line-height:1em;height: 2em;"
       href="javascript:location.replace(location.href);" title="刷新">
        <i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<style>
    #flow-user-div {
        text-align: left;
        background: #ccc;
        font-weight: bold;
    }
</style>


<div class="form-inline" align="center">
    <div class="form-group">
        <input type="text" class="form-control input-text" placeholder="讲师id" id="teacherId" name="teacherId">
        <input type="text" class="form-control input-text" placeholder="讲师昵称" id="teacherName" name="teacherName">
        <input type="text" placeholder="迁移时间段" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="form-control input-text Wdate" name="create_time_min">
        -
        <input type="text" placeholder="迁移时间段" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="form-control input-text Wdate" name="create_time_max">
        <span>

        </span>
        <button type="submit" onclick="javascript:$('button[name=\'refresh\']').click();" class="btn btn-success radius" id="" name="">
        <i class="Hui-iconfont">&#xe665;</i>搜索</button>
    </div>
    </br></br></br>
    <div  style=" border-bottom:solid 1px blue; border-left:solid 1px blue; border-right:solid 1px blue; border-top:solid 1px blue">
	</div>

	<div class="form-add">
		</br><i class="Hui-iconfont"></i>请输入讲师ID：
	    <input type="text" class="form-control input-text" placeholder="请输入讲师id" id="teacher_id" name="teacher_id">
	    <button onclick="add()" type="button" class="btn btn-success" style="margin-right:10px;">　添加　</button> 
        </br>
        <i class="Hui-iconfont" style="color: #FF0000">输入讲师ID将把讲师历来发布的所有课程、观点都迁移到大策略官方账号下，此操作不可逆，请谨慎操作！</i>
	</div>


    
    
    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <div class="mt-20">
            <table id="userListTable">
            </table>
        </div>
    </div>
</div>


<script type="text/javascript">
    $table = $('#userListTable');
    var addUrl = './add';
    var teacherInfoUrl = './getTeacherInfo';
    var url = './index';
    var g_windowHight = '510';

    $(function () {
        $('#time').datetimepicker({
            minView: "month", //选择日期后，不会再跳转去选择时分秒
            format: "yyyy-mm-dd", //选择日期后，文本框显示的日期格式
            language: 'zh-CN', //汉化
            autoclose: true //选择日期后自动关闭
        });

        //调用函数，初始化表格
        initTable();

        //点击删除
        $("#btn_delete").click(function () {
            $("#btn_delete").prop('disabled', true);
            var ids = getIdSelections();
            del(ids);
        })
    });
    function initTable() {
        //先销毁表格
        //$table.bootstrapTable('destroy');
        //初始化表格,动态从服务器加载数据
        $table.bootstrapTable({
            url: url,
            method: 'POST',
            contentType: "application/x-www-form-urlencoded",
            striped: true,  //表格显示条纹
            pagination: true, //启动分页
            showRefresh: true,     //是否显示刷新按钮
            sortable: true,      //是否启用排序
            sortOrder: "DESC",   //排序方式
            clickToSelect: true,  //是否启用点击选中行
            // height: 550,   //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
            uniqueId: "id",   //每一行的唯一标识，一般为主键列
            cardView: false,   //是否显示详细视图
            toolbar: "#toolbar",
            showColumns: true,
            columns: [
            {
                field: 'sort',
                title: '序号'
            },{
                field: 'id',
                title: 'ID'
            },{
                field: 'teacher_id',
                title: '讲师ID'
            }, {
                field: 'teacher_name',
                title: '讲师昵称'
            }, {
                field: 'finish_time',
                title: '迁移时间'
            },{
                field: 'migration_type',
                title: '迁移状态'
            },{
                field: 'admin_name',
                title: '操作人'
            },  ],
            pageSize: 10,  //每页显示的记录数
            pageNumber: 1, //当前第几页
            pageList: [5, 10, 15, 20, 25],  //记录数可选列表
            sidePagination: "server", //表示服务端请求
            //设置为undefined可以获取pageNumber，pageSize，username，sortName，sortOrder
            //设置为limit可以获取limit, offset, search, sort, order
            queryParamsType: "undefined",
            queryParams: function queryParams(params) {   //设置查询参数
                var param = {
                    pageNumber: params.pageNumber,
                    pageSize: params.pageSize,
                    order: params.sortOrder,
                    teacherId: $.trim($('#teacherId').val()),
                    teacherName: $.trim($('#teacherName').val()),
                    logmin: $.trim($('#logmin').val()),
                    logmax: $.trim($('#logmax').val()),
                };
                return param;
            },
            onLoadSuccess: function () {  //加载成功时执行
                layer.msg("加载成功", {time: 1000});
            },
            onLoadError: function () {  //加载失败时执行
                layer.msg("加载数据失败");
            }
        });
    }
    //点击删除
    $("#btn_delete").click(function () {
        $("#btn_delete").prop('disabled', true);
        var ids = getIdSelections();
        del(ids);
    })

    function add() {
    	var teacher_id = $.trim($('#teacher_id').val());
    	$.ajax({
    		type:"POST",
    		url:teacherInfoUrl,
    		data:{
    			teacher_id:teacher_id
    		},
    		async: false,
    		beforeSend:function(){
                jz = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
            },
            error: function(request) {
                layer.close(jz);
                layer.msg("网络错误!", "", "error");
            },
            success: function(data) {
                //关闭加载层
                layer.close(jz);
                if(data.status == 1){
                    layer.confirm(data.msg, {icon: 7, title: '提示'}, function (index) {
            			//do something
			            $.ajax({
				    		type:"POST",
				    		url:addUrl,
				    		data:{
				    			teacher_id:teacher_id
				    		},
				    		async: false,
				    		beforeSend:function(){
				                jz = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
				            },
				            error: function(request) {
				                layer.close(jz);
				                layer.msg("网络错误!", "", "error");
				            },
				            success: function(data) {
				                //关闭加载层
				                layer.close(jz);
				                layer.msg(data.msg, "", "success");
				                setTimeout(function(){
	                                var index = parent.layer.getFrameIndex(window.name);
	                                $table.bootstrapTable('refresh');
	                                parent.layer.close(index);
	                            },500)
				            }
				    	});
			            layer.close(index);
			        })
                }else{
                    layer.msg(data.msg, "", "error");
                }
            }
    	});
    	
    	
    }

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

</script>