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
</style>

<div id="table-button-html" class="hide">
	<button class="btn btn-primary" id="table-button-export"> 导出 </button>
</div>

<div id="table-search-html">
	<!-- 
    <input type="text" class="input-text" placeholder="Live直播间名称" id="search-liveName" name="liveName"/>
     -->
    <input type="text" class="input-text" placeholder="创建人" id="search-teacherName" name="teacherName"/>
    <input type="text" onfocus="WdatePicker({maxDate:'#F{\$dp.\$D(\'search-dateMax\')||\'%y-%M-%d\'}'})" id="search-dateMin" placeholder="开始时间(默认当天)"
           class="input-text Wdate" value="<?=date('Y-m-d',time())?>">-
    <input type="text" onfocus="WdatePicker({minDate:'#F{\$dp.\$D(\'search-dateMin\')}',maxDate:'%y-%M-%d'})" id="search-dateMax" placeholder="结束时间"
           class="input-text Wdate" value="<?=date('Y-m-d',time())?>">
    <input type="submit" value="搜索" class="btn btn-success radius" onclick="adminTableRefresh()" />
</div>


<script>
	
    window['adminTableConfig'] = {
        onLoadSuccess: function (){
         	// 操作上的编辑按钮
            $('.action-remark').click(function (){
                var e = $(this);

                layer_show('备注', '<{:url("editRemark")}>' + '?id=' + e.data('id'), 780, 350);
            });

        }
    };
    window['adminTableQueryParams'] = function (){
        return {
        	liveName: $('#search-liveName').val(),
        	teacherName: $('#search-teacherName').val(),
            dateMin: $('#search-dateMin').val(),
            dateMax: $('#search-dateMax').val(),
            tabName1: "<{$Think.get.tabName1??''}>",
            tabName2: "<{$Think.get.tabName2??''}>"
        };
    };

    $(function () {
        $('#table-button-export').click(function (){
            var e = $(this);
            var liveName = $('#search-liveName').val();
        	var teacherName = $('#search-teacherName').val();
            var dateMin = $('#search-dateMin').val();
            var dateMax = $('#search-dateMax').val();
            var url = '/SumLive/exportExcel?liveName='+liveName+'&teacherName='+teacherName+'&dateMin='+dateMin+'&dateMax='+dateMax;
            layer.confirm('导出表格到本地',function(index){
                window.open(url);  
                layer.close(index);
            });
        });
        
    });

</script>
