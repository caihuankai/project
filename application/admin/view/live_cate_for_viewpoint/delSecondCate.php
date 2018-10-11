<style>
    .row{
        margin: 0;
    }
    .secondCateDiv{
    	float: left;
    	border: 1px solid #ddd;
    	margin-right: 20px;
    	margin-bottom: 5px;
    	padding:5px 20px 5px;
    	border-radius:5px;
    	vertical-align:middle;
    	text-align:center;
    	min-width:100px;
    }
    .deleteCate{
    	float: right;
    	margin-top:-8px;
    	margin-right:-18px;
    }
</style>


<form action="#" id="cate-form" method="post" class="form form-horizontal">
    <input type="hidden" name="id" id="cate-id" value="<{$Think.get.id??'0'}>" />
    
    <div class="row cl">
        <label class="form-label col-xs-3 col-sm-2">类别：</label>
        <div class="formControls col-xs-9 col-sm-10">
            <{$firstCate}>
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-3 col-sm-2">相关标签：</label>
        <div class="formControls col-xs-9 col-sm-10">
            <{volist name="$secondCateList" id="secondCate"}>
            	<div class="secondCateDiv">
            		<a class="deleteCate" data-cate-id="<{$secondCate['id']}>">X</a>
            		<{$secondCate['name']}>
            	</div>
            <{/volist}>
        </div>
    </div>

    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
            <input class="btn btn-primary radius" type="submit" value="提交">
        </div>
    </div>
    
</form>

<script>
    
    $(function () {
        $('#cate-form').validate({
            rules:{
                'cate-name':{
                    required:true
                }
            },
            messages:{
                'cate-name': '类别名称不能为空'
            },
            onkeyup:false, // 在 keyup 时验证
            submitHandler:function (form,event){
                event.preventDefault();

                var cateList = [];
                $(".secondCateDiv a.deleteCate").map(function(){
                	var cateId = $(this).data('cateId');
                	cateList.push(cateId);
                });

                requestAjax({
                    id: $('#cate-id').val(),
                    cateList: cateList,
                }, {
                    success: function(data){
                        jsonData = getJsonData(data);
                        if (jsonData) {
                            layer.msg('提交成功');

                            if (window.parent != window && window.parent.hasOwnProperty('adminTableRefresh')){ // 刷新表格
                                window.parent.adminTableRefresh();
                            }

                            layer_close();
                        }else if(data.msg){
                            layer.msg(data.msg);
                        }
                    }
                });
            }
        });

        $(".deleteCate").click(function(){
    		$(this).parents(".secondCateDiv").remove();
        });
        
    });
    
</script>