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
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>栏目名称：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text valid" placeholder="" autoComplete="Off" name="columnName" value="" id="column-name">
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>图片封面：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <span class="btn-upload form-group">
            <input class="input-text upload-url" type="text" name="uploadfile" id="uploadfile" readonly  datatype="*" nullmsg="请添加附件！" style="width:200px">
            <a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
            <input type="file" multiple name="file" id="file" class="input-file" onchange="imgChange(event)">
            </span>
            <small class="image-tips">（图片不能大于1024KB）</small>
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">图片预览：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <img src="" id="showImage" name="showImage" alt="" height="200" width="200">
            <br>
        </div>
    </div>
    <br>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>栏目介绍：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <textarea class="textarea radius" id="lead"></textarea>
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">虚拟阅读数：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text valid input-short" placeholder="" autoComplete="Off" name="virtualReadNum" value="0" id="virtual-read-num">
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">虚拟关注数：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text valid input-short" placeholder="" autoComplete="Off" name="virtualFocusNum" value="0" id="virtual-focus-num">
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">排序：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" title="排序" name="sort" id="sort" value="<{$data['sort']??'1'}>" />
            <br>
            <small>数值越小，越靠前</small>
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-3"><span class="c-red">*</span>是否收费：</label>
        <div class="formControls col-xs-8">
            <div class="radio-box">
                <input type="radio" id="level" name="level" value="0" checked>
                <label for="level">免费</label>
            </div>
            <div class="radio-box">
                <input type="radio" id="level" name="level" value="1">
                <label for="level">收费</label>
            </div>
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">单天价格：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text valid input-short" placeholder="" autoComplete="Off" name="price" value="" id="price">
            <small>（精确到小数点后两位）</small>
            <br>
        </div>
    </div>
    
    <div class="row cl">
    	<label class="form-label col-xs-4 col-sm-3">周期价格：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <table id="cycle-price-info">
            	<thead>
            		<tr>
            			<th>时长（天）</th>
            			<th>总价格</th>
            			<th style="width:150px">折扣</th>
            			<th>实际价格</th>
            			<th>立省</th>
            			<th>操作</th>
            		</tr>
            	</thead>
            	<tbody>
            		<{volist name="$cyclePriceInfo" id="cyclePrice"}>
	            		<tr class="<{$cyclePrice.days}>days">
		            		<td class="days" data-days="<{$cyclePrice.days}>"><{$cyclePrice.days}>天</td>
		            		<td class="total"><{$cyclePrice.total}></td>
		            		<td>
		            			<input type="text" class="discount input-text valid input-short" autoComplete="Off" name="discount" value="<{$cyclePrice.discount}>" >
		            		</td>
		            		<td class="cost"><{$cyclePrice.cost}></td>
		            		<td class="save"><{$cyclePrice.save}></td>
		            		<td>
		            			<select title="状态" name="cycleStatus" class="form-control form-select cycle-status">
			        				<option value="1" <{eq name="cyclePrice.status" value="1"}>selected<{/eq}> >启用</option>
			        				<option value="0" <{eq name="cyclePrice.status" value="0"}>selected<{/eq}> >禁用</option>
			        			</select>
		            		</td>
		            	</tr>
		            <{/volist}>
            	</tbody>
            </table>
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-3"><span class="c-red">*</span>状态：</label>
        <div class="formControls col-xs-8">
            <div class="radio-box">
                <input name="status" type="radio" id="status" value="1" >
                <label for="status">启用</label>
            </div>
            <div class="radio-box">
                <input type="radio" id="status" name="status" value="2" checked>
                <label for="status">停用</label>
            </div>
        </div>
    </div>
    
    <br>
    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
            <input class="btn btn-primary" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
        </div>
    </div>
    
</form>

<script type="text/javascript" src="__ROOT__/static/h-ui/js/H-ui.min.js"></script> 
<script>

    function imgChange(e) {
    	var tip = "仅支持jpg/png/gif的文件";
    	var filters = {
    	    "jpeg": "/9j/4",
    	    "gif": "R0lGOD",
    	    "png": "iVBORw"
    	};
    	var size = e.target.files[0].size/1024;//单位KB
    	if(size > 1024) {
    		alert("上传的文件大小不能超过1024KB！");
    	}
    	if (window.FileReader) { // html5方案 
            var fr = new FileReader();
            fr.onload = function(e) {
                var src = e.target.result;
                if (!validateImg(src)) {
                    alert(tip)
                } else {
                   	$("#showImage")[0].src = src;
                }
            }
            fr.readAsDataURL(e.target.files[0]);
        } else { // 降级处理
            if (!/\.jpg$|\.png$|\.gif$/i.test(e.target.value)) {
                alert(tip);
            } else {
            	$("#showImage")[0].src = getImgSrc();
            }
        }

    	function validateImg(data) {
            var pos = data.indexOf(",") + 1;
            for (var e in filters) {
                if (data.indexOf(filters[e]) === pos) {
                    return e;
                }
            }
            return null;
        }

    	function getImgSrc() {
    		var url;
    		if (navigator.userAgent.indexOf("MSIE")>=1) { // IE
    			url = e.target.value;
    		} else if(navigator.userAgent.indexOf("Firefox")>0) { // Firefox
    			url = window.URL.createObjectURL(e.target.files.item(0));
    		} else if(navigator.userAgent.indexOf("Chrome")>0) { // Chrome
    			url = window.URL.createObjectURL(e.target.files.item(0));
    		}else {
    			url = window.URL.createObjectURL(e.target.files.item(0));
    		}
    		return url; 
    	}
        
    }


    $(function(){

        Math.formatFloat = function (f, digit) {
            var m = Math.pow(10, digit);
            return Math.round(f * m, 10) / m;
        }

        $("#price,.discount").change(function(){
        	var price = $("#price").val();
			$("#cycle-price-info tbody tr").each(function(){
				var days = $(this).find(".days").data("days");
				var discount = $(this).find(".discount").val();
				var total = Math.formatFloat(price * days, 2);
				var cost = Math.formatFloat(total * discount * 0.1, 2);
				var save = Math.formatFloat(total - cost, 2);
				$(this).find(".total").html(total);
				$(this).find(".cost").html(cost);
				$(this).find(".save").html(save);
			});
			
        });

		jQuery.validator.addMethod("check-number", function(value, element, param) {
	        return this.optional(element) || ( value > 0 ? (value >= 1 && value <= 999999.99) : (false) );
	    }, $.validator.format("限制6位整数，2位小数且大于等于1"));
		
        $("#form-admin-add").validate({
            rules:{
                "columnName":{
                	required:true,
                },
                "uploadfile":{
                	required:true,
                },
                "lead":{
                	required:true,
                },
                "sort":{
                	required:true,
                    digits: true
                },
                "virtualReadNum":{
                    digits: true
                },
                "virtualFocusNum":{
                    digits: true
                },
            },
            onkeyup:false,
            success:"valid",
            submitHandler:function(form){
            	var size = document.getElementById("file").files[0].size/1024;//单位KB
            	if(size > 1024) {
            		alert("上传的文件大小不能超过1024KB！");
            		return false;
            	}

            	var cyclePriceInfo = new Array();
            	var price = $("#price").val();
            	$("#cycle-price-info tbody tr").each(function(index){
    				var days = $(this).find(".days").data("days");
    				var discount = $(this).find(".discount").val();
    				var total = Math.formatFloat(price * days, 2);
    				var cost = Math.formatFloat(total * discount * 0.1, 2);
    				var save = Math.formatFloat(total - cost, 2);
    				var cycleStatus = $(this).find(".cycle-status").val();
    				var infos = {};
    				infos.days = days;
    				infos.discount = discount;
    				infos.total = total;
    				infos.cost = cost;
    				infos.save = save;
    				infos.status = cycleStatus;
    				cyclePriceInfo.push(infos);
    			});
            	var lead = $("#lead").val();

            	$(form).ajaxSubmit({
            		type:"POST",
            		url:"./add",
            		data:{cyclePriceInfo:cyclePriceInfo, lead:lead},
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