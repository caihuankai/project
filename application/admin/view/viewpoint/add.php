
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


        <tr class="table-header"><td colspan="4">新建观点</td></tr>
        <tr>
            <td>类型：</td>
            <td>
            	<div class="radio-box">
	                <input type="radio" class="level" name="level" value="0" checked>
	                <label for="level">免费</label>
	            </div>
	            <div class="radio-box">
	                <input type="radio" class="level" name="level" value="1">
	                <label for="level">收费</label>
	            </div>
            </td>
            <td>优惠价（礼点）：</td>
            <td>
            	<input type="text" name="price"  id="price" class="c-red" value="" autoComplete="Off" size=15 >
            	<span style="margin-left: 50px;">原价（礼点）：</span>
            	<input type="text" name="originalPrice"  id="original_price" class="c-red" value="" autoComplete="Off" size=15 >
            </td>
        </tr>
        <tr>
            <td>编辑人：</td>
            <td>
            	<input type="text" name="author" id="author" class="input-text short-input" value="<{$alias??'大策略'}>" autoComplete="Off" <{neq  name="alias" value=""}>disabled<{/neq}> >
            </td>
            <td>所属栏目：</td>
            <td>
<!--                 <select title="所属栏目" name="columnId" id="select-column"> -->
<!--                 	<{option data="$selectColumnList" notHeader="true" }> -->
<!--                 </select> -->
                <{foreach $selectColumnList as $columnId=>$columnName}>
                	<input type="checkbox" class="selectColumn" data-columnId="<{$columnId}>" data-name="<{$columnName}>" <{neq  name="alias" value=""}>checked disabled<{/neq}> >
                    <span class="columnName"><{$columnName}></span>
                <{/foreach}>
            </td>
            
        </tr>
        <tr>
            <td>虚拟阅读数：</td>
            <td>
            	<input type="text" name="virtualStudyNum" id="virtual-study-num" class="input-text short-input" value="" autoComplete="Off">
            </td>
            <td>虚拟有用/点赞数：</td>
            <td>
            	<input type="text" name="virtualLikeNum" id="virtual-like-num" class="input-text short-input" value="" autoComplete="Off">
            </td>
        </tr>
        <tr>
            <td>虚拟分享数：</td>
            <td>
            	<input type="text" name="virtualShareNum" id="virtual-share-num" class="input-text short-input" value="" autoComplete="Off">
            </td>
            <td>发布时间：</td>
            <td>
            	<input type="text" id="select-publish-time" name="publishTime" placeholder="年月日时分秒" value="" class="input-text Wdate" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss', maxDate:'#F{\'%y-%M-%d\'}'})" readonly style="width:170px;">
            </td>
        </tr>        
        <tr>
            <td>封面图：</td>
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
            	<input type="text" name="title" id="title" class="input-text" value="" autoComplete="Off" size=265>
			</td>
        </tr>
        <tr>
            <td>标题分类：</td>
            <td colspan="3">
                <input type="text" id="title_cate" name="titleCate" placeholder="限8字内" class="input-text" value="" autoComplete="Off" size=265 maxlength="8">
            </td>
        </tr>
        <tr>
            <td>导读：</td>
            <td colspan="3">
            	<textarea class="textarea radius" id="lead" name="lead"></textarea>
			</td>
        </tr>
        <tr>
            <td>正文：</td>
            <td colspan="3">
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
        		<script id="editor" type="text/plain" style="width:100%;height:500px;"></script> 
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
        		<script id="editorPay" type="text/plain" style="width:100%;height:500px;"></script> 
			</td>
        </tr>

        <tr>
            <td>标签分类：</td>
            <td colspan="3">
                <select title="标签类别" name="firstCate" id="first-cate">
                	
                </select>
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
            	</div>
            </td>
        </tr>
       
        <tr>
            <td>申请精选：</td>
            <td colspan="3">
            	<div class="radio-box">
	                <input type="radio" class="is-type-two" name="type" value="2" >
	                <label for="level">是</label>
	            </div>
	            <div class="radio-box">
	                <input type="radio" class="is-type-two" name="type" value="0" checked >
	                <label for="level">否</label>
	            </div>
            </td>
        </tr>
        
        <tr>
            <td>状态：</td>
            <td colspan="3">
                <select title="状态" name="status" id="select-status">
                	<{option data="$selectStatusList" notHeader="true" }>
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
    
    var allCate = JSON.parse('<{$allCate|json_encode}>'),
        firstCate = $('#first-cate'),
        secondCate = $('#second-cate');

    firstCate.html((function (){
        var html = '<option value="">标签类别</option>';
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
//             	pcCoverUrl = $("#admin-qi-niu-upload-div-be-upload-del-2-img").attr("src");
            	firstCateId  = $('#first-cate').val();
            	type = $('.is-type-two:checked').val();
            	status = $('#select-status').val();
            	level = $('.level:checked').val();

            	columnName = $('#select-column option:selected').html();
            	
        	ue.ready(function(){
        		content = ue.getContent();
            });
        	uePay.ready(function(){
        		payContent = uePay.getContent();
            });

            if (title == ""){
                layer.msg('标题不能为空');
                return;
            // }else if(title.length < 5 || title.length > 30){
            // 	layer.msg('标题长度必须为5-30个字符');
            //     return;
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
            }else if(level == 1 && payContent == ""){
            	layer.msg('付费内容');
                return;
            }else if(originalPrice > 0 && price >= originalPrice){
            	layer.msg('原价必须比优惠价高');
                return;
            }else if(coverUrl == '' && columnName != "公告" && columnName != "盘前内参"){
            	layer.msg('请上传封面图');
                return;
//             }else if(pcCoverUrl == '' && columnName != "公告" && columnName != "盘前内参"){
//             	layer.msg('请上传PC封面图');
//                 return;
            }else if(publishTime == ""){
            	layer.msg('请选择发布时间');
                return;
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

