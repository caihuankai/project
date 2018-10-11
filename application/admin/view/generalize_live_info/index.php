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
	<button class="btn btn-primary" onclick="exportExcel()" id="table-button-Excel"> 导出Excel </button>
</div>



<script>
    function exportExcel(){
        var url = './IPExcel';
        layer.confirm('导出数据统计表格到本地',function(index){
            layer.close(index);
            window.open(url);
        });
    }

    $(function () {

    });


</script>
