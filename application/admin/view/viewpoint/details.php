
<{include file="include/nav"}>

<style>
    
    td{
        position: relative;
    }
    .table-header{
        background: #efefef;
    }
    #src-img>img{
        width: 290px;
        height: 141px;
    }
    .secondCateName{
    	margin-right: 20px;
    }
    .selectSecondCate{
    	height:15px; vertical-align:bottom; margin-bottom:3px; margin-top:-1px;
    }
    .deleteCate{
    	float: right;
    	margin-top:-8px;
    	margin-right:-18px;
    }
    .selectCateDiv{
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
    #edui1_elementpath{
    	display:none;
    }
    .short-input{
    	width: 150px;
    }
    .columnName{
    	margin-right: 20px;
    }

</style>

<form action="#" method="post" id="form">
    <table class="table table-border table-bordered radius">


        <tr class="table-header"><td colspan="4">编辑观点</td></tr>
        <tr>
            <td width="8%">作者：</td>
            <td width="15%"><{$data['alias']}></td>
            <td width="8%"></td>
            <td></td>
        </tr>
        <tr>
            <td>类型：</td>
            <td>
            	<div class="radio-box">
	                <input type="radio" class="level" name="level" value="0" <{eq name="data.level" value="0"}>checked<{/eq}> >
	                <label for="level">免费</label>
	            </div>
	            <div class="radio-box">
	                <input type="radio" class="level" name="level" value="1" <{eq name="data.level" value="1"}>checked<{/eq}> >
	                <label for="level">收费</label>
	            </div>
            </td>
            <td>优惠价（礼点）：</td>
            <td>
            	<input type="text" name="price"  id="price" class="c-red" value="<{$data['price']}>" autoComplete="Off" size=15 >
            	<span style="margin-left: 50px;">原价（礼点）：</span>
            	<input type="text" name="originalPrice"  id="original_price" class="c-red" value="<{$data['original_price']}>" autoComplete="Off" size=15 >
            </td>
        </tr>
        <tr>
            <td>购买量：</td>
            <td><span class="c-blue"><{$data['payNum']}></span></td>
            <td>编辑人：</td>
            <td>
            	<input type="text" name="author" id="author" class="input-text short-input" value="<{$data['author']}>" autoComplete="Off">
            </td>
        </tr>
        <tr>
            <td>阅读数：</td>
            <td><span class="c-blue"><{$data['study_num']}></span></td>
            <td>虚拟阅读数：</td>
            <td>
            	<input type="text" name="virtualStudyNum" id="virtual-study-num" class="input-text short-input" value="<{$data['virtual_study_num']}>" autoComplete="Off">
            </td>
        </tr>
        <tr>
            <td>有用/点赞数：</td>
            <td><span class="c-blue"><{$data['like_num']}></span></td>
            <td>虚拟有用/点赞数：</td>
            <td>
            	<input type="text" name="virtualLikeNum" id="virtual-like-num" class="input-text short-input" value="<{$data['virtual_like_num']}>" autoComplete="Off">
            </td>
        </tr>
        <tr>
            <td>分享数：</td>
            <td><span class="c-blue"><{$data['share_num']}></span></td>
            <td>虚拟分享数：</td>
            <td>
            	<input type="text" name="virtualShareNum" id="virtual-share-num" class="input-text short-input" value="<{$data['virtual_share_num']}>" autoComplete="Off">
            </td>
        </tr>
        
        <tr>
            <td>发布时间：</td>
            <td>
            	<input type="text" id="select-publish-time" name="publishTime" placeholder="年月日时分秒" value="<{$data['publish_time']??''}>" class="input-text Wdate" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss', maxDate:'#F{\'%y-%M-%d\'}'})" readonly style="width:170px;">
            </td>
            <td>所属栏目：</td>
            <td>
                <{foreach $selectColumnList as $columnId=>$columnName}>
                	<input type="checkbox" class="selectColumn" data-columnId="<{$columnId}>" data-name="<{$columnName}>" <{if condition="in_array($columnId, $columnViewpointList)"}>checked <{/if}> <{if condition="isset($unSelectColumn)"}>disabled <{/if}> >
                    <span class="columnName"><{$columnName}></span>
                <{/foreach}>
            </td>
        </tr>
        
        <tr>
            <td>封面图：</td>
<!--             <td> -->
<!--             	<span class="btn-upload form-group"> -->
<!--		            <input class="input-text upload-url" type="text" name="uploadfile" id="uploadfile" readonly  datatype="*" nullmsg="请添加附件！" style="width:200px"> -->
<!-- 		            <a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a> -->
<!-- 		            <input type="file" multiple name="file" id="file" class="input-file" onchange="imgChange(event)"> -->
<!-- 	            </span> -->
<!-- 	            <br> -->
<!-- 	            <small class="image-tips">（图片不能大于1024KB）</small> -->
<!--             </td> -->
            <td>
				<?php echo \qiNiu\QiNiuHtml::instance()->getQiNiuUploaderHtmlBeUploadAndDel('', '');?>
            </td>
            <td>原封面预览：</td>
            <td>
            	<img src="<{$data['coverPic']??''}>" id="showImage" name="showImage" alt="" height="100" width="100">
            </td>
        </tr>
        
        <!-- 暂不启用，统一上传
        <tr>
            <td>封面图(PC端)：</td>
            <td>
				<?php echo \qiNiu\QiNiuHtml::instance()->getQiNiuUploaderHtmlBeUploadAndDel('', '');?>
            </td>
            <td>原PC封面预览：</td>
            <td>
            	<img src="<{$data['pcCoverPic']??''}>" id="showImagePc" name="showImagePc" alt="" height="100" width="100">
            </td>
        </tr>
         -->
        
        <tr>
            <td>标题：</td>
            <td colspan="3">
            	<input type="text" name="title" id="title" class="input-text" value="<{$data['title']}>" autoComplete="Off" size=265>
			</td>
        </tr>
        <tr>
            <td>标题分类：</td>
            <td colspan="3">
                <input type="text" id="title_cate" name="titleCate" placeholder="限8字内" class="input-text" value="<{$data['title_cate']}>" autoComplete="Off" size=265 maxlength="8">
            </td>
        </tr>
        <tr>
            <td>导读：</td>
            <td colspan="3">
            	<textarea class="textarea radius" id="lead" name="lead"><{$data['lead']}></textarea>
			</td>
        </tr>
        <tr>
            <td>正文：</td>
            <td colspan="3">
            	<!-- 
            	<textarea class="textarea radius" id="content" name="content"><{$data['content']}></textarea>
            	-->
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
									'fontfamily', //字体
                                	'fontsize', //字号
                                	'paragraph', //段落格式
                                	'forecolor', //字体颜色
// 									'simpleupload',//单张图片上传
									'insertimage',//多张图片上传
// 									'insertvideo',//上传视频
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
        		<script id="editor" type="text/plain" style="width:100%;height:500px;"><{$data['content']}></script> 
			</td>
        </tr>

		<tr>
            <td>付费内容：</td>
            <td colspan="3">
            	<script type="text/javascript">
					var uePay = UE.getEditor('editorPay',{
						toolbars: [
							[        
                                    'source',
									'undo', //撤销
									'redo', //重做
									'bold',
									'italic', //斜体
									'underline', //下划线
									'strikethrough',
									'fontfamily', //字体
                                	'fontsize', //字号
                                	'paragraph', //段落格式
                                	'forecolor', //字体颜色
// 									'simpleupload',//单张图片上传
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
        		<script id="editorPay" type="text/plain" style="width:100%;height:500px;"><{$data['pay_content']}></script> 
			</td>
        </tr>

        <tr>
            <td>标签分类：</td>
            <td colspan="3">
                <select title="标签类别" name="firstCate" id="first-cate">
                	
                </select>
                <{notempty name="selectClassificationStr"}>
                <span>（已选分类：<{$selectClassificationStr}>）</span>
                <{/notempty}>
            </td>
        </tr>
        <tr>
            <td>关联标签：</td>
            <td id="second-cate" colspan="3">
            
            </td>
        </tr>
        <tr>
            <td>已选标签：</td>
            <td colspan="3">
            	<div class="selectCateListDiv">
            		<{volist name="$selectCateList" id="selectCate"}>
            			<div class="selectCateDiv">
            				<a class="deleteCate" data-cateId="<{$selectCate['cate_id']}>">X</a>
            				<{$selectCate['name']}>
            			</div>
            		<{/volist}>
            	</div>
            </td>
        </tr>
       
        <tr>
            <td>申请精选：</td>
            <td colspan="3">
            	<div class="radio-box">
	                <input type="radio" class="is-type-two" name="type" value="2" <{eq name="data.type" value="2"}>checked<{/eq}> >
	                <label for="level">是</label>
	            </div>
	            <div class="radio-box">
	                <input type="radio" class="is-type-two" name="type" value="0" <{neq name="data.type" value="2"}>checked<{/neq}> >
	                <label for="level">否</label>
	            </div>
            </td>
        </tr>
        
        <tr>
            <td>状态：</td>
            <td colspan="3">
                <select title="状态" name="status" id="select-status">
                	<{option data="$selectStatusList" notHeader="true" selected="$data['status']"}>
                </select>
            </td>
        </tr>
        
        
    </table>

    <div class="text-c">
        <input type="submit" class="btn btn-primary" value="保存" />
        <input type="reset" class="btn btn-primary" id="button-reset" value="返回" />
    </div>
</form>

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
    
    var allCate = JSON.parse('<{$allCate|json_encode}>'),
        firstCate = $('#first-cate'),
        secondCate = $('#second-cate');

    firstCate.html((function (){
        var html = '<option value="">选择标签</option><option value="-1">无标签</option>';
        for (var i in allCate){
            if (allCate.hasOwnProperty(i) && allCate[i]['name']){
                html += '<option value="'+allCate[i]['id']+'">'+allCate[i]['name']+'</option>';
            }
        }
        
        return html;
    })()).change(function (){

        secondCate.html(secondCateHtml($(this).val()));
        
    });

    
    
    function secondCateHtml(pid){
        var html = '';
        if (allCate.hasOwnProperty(pid) && allCate[pid]['children']) {
            var data = allCate[pid]['children'];
            for (var i in data){
                if (data.hasOwnProperty(i)){
                    html += '<input type="checkbox" class="selectSecondCate" data-cateid="'+data[i]['id']+'" data-name="'+data[i]['name']+'">' + 
                    		'<span class="secondCateName">'+data[i]['name']+'</span>';
                }
            }
        }
        
        return html;
    }

    jQuery.validator.addMethod("check-number", function(value, element, param) {
        return this.optional(element) || ( value >= 0 ? (value >= 0 && value <= 999999.99) : (false) );
    }, $.validator.format("限制6位整数，2位小数"));

    $('#form').validate({
        rules:{
            "title":{
                required:true,
            },
            "price":{
            	number: true,
            	'check-number': true
            },
            "original_price":{
            	number: true,
            	'check-number': true
            },
            "virtualStudyNum":{
            	digits: true
            },
            "virtualLikeNum":{
            	digits: true
            },
            "virtualShareNum":{
            	digits: true
            },
            "uploadfile":{
            	required:true,
            }
        },
        messages:{
            title: '标题不能为空',
        },
        onkeyup:false, // 在 keyup 时验证
        focusCleanup:false, // 如果是 true 那么当未通过验证的元素获得焦点时，移除错误提示。避免和 focusInvalid 一起用。
        submitHandler:function (form,event){
            event.preventDefault();
            
            var title = $('#title').val(),
                titleCate = $('#title_cate').val(),
            	lead = $('#lead').val(),
            	price = Number($('#price').val()),
            	originalPrice = Number($('#original_price').val()),
            	
            	author = $('#author').val();
            	virtualStudyNum = $('#virtual-study-num').val();
            	virtualLikeNum = $('#virtual-like-num').val();
            	virtualShareNum = $('#virtual-share-num').val();
            	columnId = $('#select-column').val();
            	publishTime = $('#select-publish-time').val();
            	coverUrl = $("#admin-qi-niu-upload-div-be-upload-del-1-img").attr("src");
            	coverUrlShow = $("#showImage").attr("src");
//             	pcCoverUrl = $("#admin-qi-niu-upload-div-be-upload-del-2-img").attr("src");
//             	coverUrlShowPc = $("#showImagePc").attr("src");
            	firstCateId  = $('#first-cate').val();
            	type = $('.is-type-two:checked').val();
            	status = $('#select-status').val();
            	level = $('.level:checked').val();
            	
        	ue.ready(function(){
        		content = ue.getContent();
            });
        	uePay.ready(function(){
        		payContent = uePay.getContent();
            });

            if (title == ""){
                layer.msg('标题不能为空');
                return;
//             }else if(title.length < 5 || title.length > 30){
//             	layer.msg('标题长度必须为5-30个字符');
//                 return;
            }else if(titleCate.length > 8){
            	layer.msg('标题分类不能超过8个字符');
                return;
            }else if(lead.length > 200){
            	layer.msg('导读长度不能超过200个字符');
                return;
            }else if(content == ""){
            	layer.msg('正文不能为空');
                return;
            }else if(level == 1 && price < 1){
            	layer.msg('优惠价最小金额不能低于1元');
                return;
            }else if(originalPrice > 0 && price >= originalPrice){
            	layer.msg('原价必须比优惠价高');
                return;
            }else if(coverUrlShow == '' && coverUrl == ''){
            	columnName = $('#select-column option:selected').html();
                if(columnName != "公告" && columnName != "盘前内参"){
                	layer.msg('请上传封面图');
                    return;
                }
//             }else if(coverUrlShowPc == '' && pcCoverUrl == ''){
//             	columnName = $('#select-column option:selected').html();
//                 if(columnName != "公告" && columnName != "盘前内参"){
//                 	layer.msg('请上传PC封面图');
//                     return;
//                 }
            }

            var selectCateList = {};
            $(".selectCateDiv a.deleteCate").map(function(){
            	var cateId = $(this).data('cateid');
            	selectCateList[cateId] = 2;
            });

            var selectColumnList = [];
            $(".selectColumn:checked").map(function(){
            	var columnId = $(this).data('columnid');
            	selectColumnList.push(columnId);
            });

            requestAjax({
            	title: title,
            	titleCate: titleCate,
            	lead: lead,
            	content: content,
            	selectCateList: selectCateList,
            	price: price,
            	originalPrice: originalPrice,
            	author: author,
            	virtualStudyNum: virtualStudyNum,
            	virtualLikeNum: virtualLikeNum,
            	virtualShareNum: virtualShareNum,
            	columnId: columnId,
            	publishTime: publishTime,
            	coverUrl: coverUrl,
//             	pcCoverUrl: pcCoverUrl,
            	payContent: payContent,
            	firstCateId: firstCateId,
            	type: type,
            	status: status,
            	level: level,
            	selectColumnList: selectColumnList
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

    $('#button-reset').click(function () {
        history.go(-1);
    });

    $(document).on("click", ".deleteCate", function(){
		$(this).parents(".selectCateDiv").remove();
    });

    $(document).on("click", ".selectSecondCate", function(){
		var isSelect = $(this).is(':checked');
		if(isSelect){
			var cateId = $(this).data('cateid');
			var cateName = $(this).data('name');
			if($(".deleteCate[data-cateid="+cateId+"]").length <= 0){
				var html = '<div class="selectCateDiv"><a class="deleteCate" data-cateid="'+cateId+'">X</a>'+cateName+'</div>';
				$(".selectCateListDiv").append(html);
			}
		}
    });
    
    
    
    
</script>

