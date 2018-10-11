<{if !empty($data['content'])}>
<{/if}>
<link rel="stylesheet" href="/lib/webuploader/webuploader.css" />
<script type="text/javascript" src="/lib/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/lib/webuploader/webuploader.js"></script>
<script type="text/javascript" src="/lib/My97DatePicker/WdatePicker.js"></script>
<article class="page-container">
    <form class="form form-horizontal" id="form-admin-add">

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>推送类型：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <label><input name="type" type="radio" value="0" style="width:30px;"/>文字消息 </label> 
                <label><input name="type" type="radio" value="1" style="width:30px;"/>图片消息 </label> 
                <label><input name="type" type="radio" value="2" style="width:30px;"/>图文消息(单篇) </label> 
                <label><input name="type" type="radio" value="3" style="width:30px;"/>图文消息(多篇) </label> 
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>目标用户：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <label onclick="click_push_target(0)"><input name="push_target" type="radio" value="0" style="width:30px;"/>全部用户 </label> 

                <label><input name="push_target" type="radio" value="1" style="width:30px;" onclick="click_push_target(1)"/>局部用户 </label> 

                <label id="push_target_c" >
                <p><input type="radio" value="1" name="push_target_c"/>付费</p>
                <p><input type="radio" value="2" name="push_target_c"/>未付费</p></label> 

                <label  onclick="click_push_target(0)"><input name="push_target" type="radio" value="3" style="width:30px;"/>独立用户 </label> 
                <label><input type="text" class="input-text" value="<{$data['user_id']}>" placeholder="用户id" id="user_id" name="user_id"></label> 
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>推送时间：</label>
                <label><input name="push_type" type="radio" value="1" style="width:30px;" onclick="click_push_type(0)"/>立即推送 </label> 
                <label><input name="push_type" type="radio" value="2" style="width:30px;" onclick="click_push_type(1)"/>定时推送 </label>
            </div>
        </div>

        <div class="row cl" id="push_time_div" style="display:none">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>选择推送时间：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss'})" id="push_time" name="push_time" class="input-text Wdate" value="<{$data['push_time']}>" style="width:200px;">
            </div>
        </div>

        <div class="row cl" id="title_div" >
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>标题：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<{$data['title']}>" placeholder="" id="title" name="title" maxlength="20">
            </div>
        </div>

        <div class="row cl" id="img_div" >
            <label class="form-label col-xs-4 col-sm-3">上传图片（图片不能大于1024KB）：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span class="btn-upload form-group">
                <input class="input-text upload-url" type="text" name="uploadfile" id="uploadfile" readonly  datatype="*" nullmsg="请添加附件！" style="width:200px">
                <a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
                <input type="file" multiple name="file" id="file" class="input-file" onchange="imgChange(event)">
                </span>
            </div>
        </div>

        <div class="row cl" id="showImage_div" >
            <label class="form-label col-xs-4 col-sm-3">图片预览：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <img src="<{$data['image']}>" id="showImage" name="showImage" alt="" height="200" width="200">
                <br>
            </div>
        </div>

        <div class="row cl" id="content_div" style="display:">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>内容：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea class="textarea" name="content" maxlength="500"><{$data['content']}></textarea>
            </div>
        </div>

        <div class="row cl" id="jump_type_id" >
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>url：</label>
                <label><input name="jump_type" type="radio" value="0" style="width:30px;" onclick="click_jump_type()"/>链接 </label> 
                <label><input name="jump_type" type="radio" value="1" style="width:30px;" onclick="click_jump_type()"/>课程ID </label> 
                <label><input name="jump_type" type="radio" value="2" style="width:30px;" onclick="click_jump_type()"/>观点ID </label> 
            </div>
        </div>

        <div class="row cl" id="jump_text" >
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span></label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<{$data['jump_url']}>" placeholder="请输入跳转的链接或ID" id="jump_url" name="jump_url">
            </div>
        </div>

        <div class="row cl" id="content_list" style="display:none">
            
        </div>
    </form>
</article>
<script type="text/javascript">
	$(function(){
		var type = "<{$data['type']}>";
		var push_target = "<{$data['push_target']}>";
		var push_type = "<{$data['push_type']}>";
		var jump_type = "<{$data['jump_type']}>";
		//处理推送类型
		$("input[name='type']").eq(type).attr("checked","checked");
		//处理div
		if(type == 0){
			$("#title_div").css('display','none');
            $("#img_div").css('display','none');
            $("#showImage_div").css('display','none');
            $("#jump_type_id").css('display','none');
            $("#jump_text").css('display','none');
            $("#content_div").css('display','');
		}
		if(type == 1){
            $("#title_div").css('display','none');
            $("#img_div").css('display','none');
            $("#showImage_div").css('display','');
            $("#jump_type_id").css('display','none');
            $("#jump_text").css('display','none');
            $("#content_div").css('display','none');
        }
        if(type == 2){
            $("#title_div").css('display','');
            $("#img_div").css('display','none');
            $("#showImage_div").css('display','');
            $("#jump_type_id").css('display','');
            $("#jump_text").css('display','');
            $("#content_div").css('display','');
        }
        if(type == 3){
            $("#title_div").css('display','none');
            $("#img_div").css('display','none');
            $("#showImage_div").css('display','none');
            $("#jump_type_id").css('display','none');
            $("#jump_text").css('display','none');
            $("#content_div").css('display','none'); 
        }
		//处理推送目标
		if(push_target == 0){
			$("input[name='push_target']").eq(0).attr("checked","checked");
		}
		if(push_target == 1 || push_target == 2){
			$("input[name='push_target']").eq(1).attr("checked","checked");
			$("input[name='push_target_c']").eq(push_target-1).attr("checked","checked");
		}
		if(push_target == 3){
			$("input[name='push_target']").eq(2).attr("checked","checked");
		}
		//处理推送时间
		if(push_type == 1){
			$("input[name='push_type']").eq(0).attr("checked","checked");
		}
		if(push_type == 2){
			$("input[name='push_type']").eq(1).attr("checked","checked");
			$("#push_time_div").css('display','');
		}
		//处理url类型
		$("input[name='jump_type']").eq(jump_type).attr("checked","checked");
        //处理多篇图文
        if(type == 3){
            $("#content_list").css('display',''); 
            <?php
                $html = '';
                if(isset($data['contentArray'])){
                    for ($i = 1; $i <= $data['count']; $i++) {
                        $html = $html.'<div class=\"row cl\"><label class=\"form-label col-xs-4 col-sm-3\"><span class=\"c-red\"></span>图文'.$i.'：</label></div>';
                        $html = $html.'<div class=\"row cl\" id=\"title_div'.$i.'\"><label class=\"form-label col-xs-4 col-sm-3\"><span class=\"c-red\"></span>标题：</label><div class=\"formControls col-xs-8 col-sm-9\"><input type=\"text\" class=\"input-text\" value=\"'.$data['contentArray'][$i]['title'].'\" placeholder=\"\" id=\"title'.$i.'\" name=\"title'.$i.'\" maxlength=\"20\"></div></div>';
                        $html = $html.'<div class=\"row cl\" id=\"showImage_div'.$i.'\" ><label class=\"form-label col-xs-4 col-sm-3\">图片预览：</label><div class=\"formControls col-xs-8 col-sm-9\"><img src=\"'.$data['contentArray'][$i]['image'].'\" id=\"showImage'.$i.'\" name=\"showImage'.$i.'\" alt=\"\" height=\"200\" width=\"200\"><br></div></div>';
                        $html = $html.'<div class=\"row cl\" id=\"jump_text'.$i.'\" ><label class=\"form-label col-xs-4 col-sm-3\"><span class=\"c-red\"></span>跳转链接：</label><div class=\"formControls col-xs-8 col-sm-9\"><input type=\"text\" class=\"input-text\" value=\"'.$data['contentArray'][$i]['jump_url'].'\" placeholder=\"请输入跳转的链接或ID\" id=\"jump_url'.$i.'\" name=\"jump_url'.$i.'\"></div></div>';
            
                    }
                }
            ?>
            html = "<{$html}>";
            $('#content_list').append(html); 
        }
	});
</script>
