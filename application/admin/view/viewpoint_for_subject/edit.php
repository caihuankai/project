<style>
    .row{
        margin: 8px 0;
        padding: 0;
    }
    .input-short{
    	width: 120px;
    }
    .form-select{
    	width: auto;
    }
    .image-tips{
    	margin: 15px;
    	color: red;
    }
</style>


<form class="form form-horizontal" id="form-admin-add">
    
    <div class="row cl">
        <label class="form-label col-xs-2 col-sm-1"><span class="c-red">*</span>主题名称：</label>
        <div class="formControls col-xs-10 col-sm-11">
            <input type="text" class="input-text valid" placeholder="" autoComplete="Off" name="title" value="<{$data['title']??''}>" id="title">
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-2 col-sm-1"><span class="c-red">*</span>栏目名称：</label>
        <div class="formControls col-xs-10 col-sm-11">
            <select title="所属栏目" name="columnId" id="select-column">
                <{option data="$selectColumnList" notHeader="true"}>
            </select>
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-2 col-sm-1"><span class="c-red">*</span>举办时间：</label>
        <div class="formControls col-xs-10 col-sm-11">
        	<input type="text" id="select-start-time" name="startTime" placeholder="年月日" value="<{$data['start_time']??''}>" class="input-text Wdate" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd 00:00:00', maxDate:'#F{\$dp.\$D(\'select-end-time\')}'})" readonly style="width:170px;">
        	
        	-
        	<input type="text" id="select-end-time" name="endTime" placeholder="年月日" value="<{$data['end_time']??''}>" class="input-text Wdate" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd 23:59:59', minDate:'#F{\$dp.\$D(\'select-start-time\')}'})" readonly style="width:170px;">
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-2 col-sm-1"><span class="c-red">*</span>相关事件：</label>
        <div class="formControls col-xs-10 col-sm-11">
            <input type="text" class="input-text valid" placeholder="" autoComplete="Off" name="lead" value="<{$data['lead']??''}>" id="lead">
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-2 col-sm-1"><span class="c-red">*</span>作者：</label>
        <div class="formControls col-xs-10 col-sm-11">
            <input type="text" class="input-text valid input-short" placeholder="" autoComplete="Off" name="author" value="<{$data['author']??''}>" id="author">
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-2 col-sm-1">文章内容：</label>
        <div class="formControls col-xs-10 col-sm-11">
        	<link href="__ROOT__/lib/qiniu_ueditor_1.4.3-master/themes/default/css/ueditor.css" type="text/css" rel="stylesheet">
            <script type="text/javascript" charset="utf-8" src="__ROOT__/lib/qiniu_ueditor_1.4.3-master/ueditor.config.js"></script> 
			<script type="text/javascript" charset="utf-8" src="__ROOT__/lib/qiniu_ueditor_1.4.3-master/ueditor.all.min.js"> </script> 
			<script type="text/javascript" charset="utf-8" src="__ROOT__/lib/qiniu_ueditor_1.4.3-master/lang/zh-cn/zh-cn.js"></script>
			<script type="text/javascript" charset="utf-8" src="__ROOT__/lib/qiniu_ueditor_1.4.3-master/lang/en/en.js"></script> 
            <script type="text/javascript">
				var ue = UE.getEditor('editor',{
					toolbars: [
						[
                                'source',
								'undo', //撤销
								'redo', //重做
								'bold',
								'italic', //斜体
								'underline', //下划线
								'strikethrough',
// 								'simpleupload',//单张图片上传
								'insertimage',//多张图片上传
								'justifyleft', //居左对齐
								'justifyright', //居右对齐
								'justifycenter', //居中对齐
								'justifyjustify'
						]
					],
					autoHeightEnabled: false,
					autoFloatEnabled: true
				});
			</script>
        	<script id="editor" type="text/plain" style="width:100%;height:500px;"><{$data['content']??''}></script> 
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-2 col-sm-1"><span class="c-red">*</span>状态：</label>
        <div class="formControls col-xs-10 col-sm-11">
            <div class="radio-box">
                <input name="status" type="radio" id="status" value="0" <{eq name="data.status" value="0"}>checked<{/eq}> >
                <label for="status">草稿</label>
            </div>
            <div class="radio-box">
                <input type="radio" id="status" name="status" value="1" <{eq name="data.status" value="1"}>checked<{/eq}> >
                <label for="status">发布</label>
            </div>
        </div>
    </div>
    
    <br>
    <div class="row cl">
        <div class="col-xs-10 col-sm-11 col-xs-offset-4 col-sm-offset-3">
            <input class="btn btn-primary" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
        </div>
    </div>
    
</form>

<script type="text/javascript" src="__ROOT__/static/h-ui/js/H-ui.min.js"></script> 
<script>

    $(function(){

        $("#form-admin-add").validate({
            rules:{
                "title":{
                	required:true,
                },
                "columnId":{
                	required:true,
                	digits: true,
                	min:1
                },
                "startTime":{
                	required:true,
                },
                "endTime":{
                	required:true,
                },
                "lead":{
                	required:true,
                },
                "author":{
                	required:true,
                },
            },
            onkeyup:false,
            success:"valid",
            submitHandler:function(form){

            	ue.ready(function(){
            		content = ue.getContent();
                });
                
            	if(content == ""){
                	layer.msg('文章内容不能为空');
                    return;
                }
            	
            	$(form).ajaxSubmit({
            		type:"POST",
            		beforeSend:function(){
	                    jz = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
	                },
	                error: function(request) {
	                    layer.close(jz);
	                    layer.msg("网络错误!", "", "error");
	                },
            		success: function(e) {
            			//关闭加载层
            			layer.close(jz);
            			if (e.code == 200) {
                            layer.msg(e.data);
                            setTimeout(function(){
                            	window.parent.adminTableRefresh();
                            	layer_close();
	                         }, 1000);
                        }else {
                            layer.msg(e.msg);
                        }
	                }
                });
            }
        });
    });
</script>