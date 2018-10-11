<{include file="include/nav"}>
<style>
    .tab-pane{
        padding: 20px;
    }
    .text-c{
    	margin-top:10px;
    }
    .schedule input,.teacher-name{
    	margin-right:10px;
    }
    .input-text{
    	width:170px;
    }
    .input-long{
    	width:500px;
    }
    .schedule,.scheduleAdd{
    	margin-bottom:10px;
    }
    .table-header{
        background: #efefef;
    }

</style>

<ul id="myTab" class="nav nav-tabs">
	<li class="active">
		<a href="#details" data-toggle="tab">详情</a>
	</li>
	<li>
		<a href="#preview" data-toggle="tab">预告</a>
	</li>
	<li>
		<a href="#review" data-toggle="tab">回顾</a>
	</li>
	<li>
		<a href="#schedule" data-toggle="tab">课程表</a>
	</li>
</ul>
<div id="myTabContent" class="tab-content">
	<div class="tab-pane fade in active" id="details">
		<div>
			<div id="course-open-close" style="float:left;">
				<{if condition="$data.detail_status == 1"}>
					<input type="button" class="btn btn-success" value="开启->关闭" data-status="2"/>
				<{else /}>
					<input type="button" class="btn btn-danger" value="关闭->开启" data-status="1"/>
				<{/if}>
			</div>
			<div style="float:left;margin-left:20px;">
				开关使用说明：<br>
				开启：点击开启本培训班详情页，同时发送消息给已购买此课程的用户，即时生效；<br>
				关闭：点击关闭本培训班详情页，并清空互动模块聊天数据，即时生效。
			</div>
		</div>
		<div>
			<form action="#" method="post" id="form">
				<table class="table table-border table-bordered radius">
			        <tr class="table-header"><td colspan="4">单次课程资料</td></tr>
			        <tr>
			            <td width="200"><label for="name">特训班名称：</label></td>
			            <td>
			            	<input type="text" name="name" id="name" class="input-text valid input-long" value="<{$data.class_name}>">
			            </td>
			            <td rowspan="3"> 封面海报（移动端）：</td>
			            <td rowspan="3"><div id="src-img"><{$srcImgHtml}></div></td>
			        </tr>
			        <tr>
			            <td>报名开始时间：</td>
			            <td>
			                <input type="text" id="beginEnrollTime" name="beginEnrollTime" value="<{$data.begin_enroll_time}>" placeholder="年月日时分秒" class="input-text Wdate" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss', maxDate:'#F{$dp.$D(\'endEnrollTime\')}'})" readonly style="width:170px;">
			            </td>
			        </tr>
			        <tr>
			            <td>报名结束时间：</td>
			            <td>
			                <input type="text" id="endEnrollTime" name="endEnrollTime" value="<{$data.end_enroll_time}>" placeholder="年月日时分秒" class="input-text Wdate" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss', minDate:'#F{$dp.$D(\'beginEnrollTime\')}'})" readonly style="width:170px;">
			            </td>
			        </tr>
			        <tr>
			            <td>课程开始时间：</td>
			            <td>
			                <input type="text" id="beginTime" name="beginTime" value="<{$data.begin_time}>" placeholder="年月日时分秒" class="input-text Wdate" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss', maxDate:'#F{$dp.$D(\'endTime\')}'})" readonly style="width:170px;">
		        		</td>
		        		<td rowspan="2">封面海报（PC端）：</td>
			            <td rowspan="2"><div id="src-img-pc"><{$srcImgHtmlPc}></div></td>
			        </tr>
			        <tr>
			            <td>课程结束时间：</td>
			            <td>
			                <input type="text" id="endTime" name="endTime" value="<{$data.end_time}>" placeholder="年月日时分秒" class="input-text Wdate" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss', minDate:'#F{$dp.$D(\'beginTime\')}'})" readonly style="width:170px;">
		        		</td>
			        </tr>
			        <tr>
			        	<td>直播类型：</td>
			            <td>
			                <select title="直播类型" name="live-level" id="live-level" class="input-text valid">
			                    <{option data="$levelArr" selected="$data['level']" notHeader="true"}>
			                </select>
			            </td>
			            <td>
			            	<label for="origin-price">原价(礼点)</label>
			            </td>
			            <td style="white-space:nowrap;display: flex;">
		                    <span id="originPrice"><{$data.origin_price}></span>
			                <span style="flex-grow: 1;">&emsp;</span>
			                <span>
			                    <label for="price">优惠价(礼点)：</label>
				                <input id="price" name="price" class="c-red input-text valid" type="text" value="<{$data['price']}>">
			                </span>
			            </td>
			        </tr>
			        <tr>
			            <td>报名（购买）人数：</td>
			            <td><{$data.enroll_num}></td>
			            <td>虚拟报名人数：</td>
			            <td>
			            	<input type="text" class="input-virtual-enroll-num input-text valid" name="virtualEnrollNum" value="<{$data.virtual_enroll_num}>">
						</td>
			        </tr>
			        <tr>
			            <td>预计招募人数：</td>
			            <td>
			            	<input type="text" class="input-enroll-max-num input-text valid" name="enrollMaxNum" value="<{$data.enroll_max_num}>">
			            </td>
			            <td>创建时间：</td>
			            <td><{$data.create_time}></td>
			        </tr>
			        <tr>
			        	<td>摘要：</td>
			        	<td colspan="3">
			        		<textarea class="textarea radius" id="goal" name="goal"><{$data.goal}></textarea>
			        	</td>
			        </tr>
			        <tr>
			            <td>课程介绍：</td>
			            <td colspan="3">
							<link href="__ROOT__/lib/qiniu_ueditor_1.4.3-master/themes/default/css/ueditor.css" type="text/css" rel="stylesheet">
					        <script type="text/javascript" charset="utf-8" src="__ROOT__/lib/qiniu_ueditor_1.4.3-master/ueditor.config.js"></script> 
							<script type="text/javascript" charset="utf-8" src="__ROOT__/lib/qiniu_ueditor_1.4.3-master/ueditor.all.js"> </script> 
							<script type="text/javascript" charset="utf-8" src="__ROOT__/lib/qiniu_ueditor_1.4.3-master/lang/zh-cn/zh-cn.js"></script>
							<script type="text/javascript" charset="utf-8" src="__ROOT__/lib/qiniu_ueditor_1.4.3-master/lang/en/en.js"></script> 
					        <script type="text/javascript">
								var ueBrief = UE.getEditor('briefEditor',{
									toolbars: [
										[		
												'source',
												'undo', //撤销
												'redo', //重做
												'bold',
												'italic', //斜体
												'underline', //下划线
												'strikethrough',
		// 										'simpleupload',//单张图片上传
												'insertimage',//多张图片上传
												'insertvideo',//上传视频
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
					       	<script id="briefEditor" type="text/plain" style="width:100%;height:500px;"><{$data.brief}></script>
			            </td>
			        </tr>
			        <tr>
			            <td>课程安排：</td>
			            <td colspan="3">
					        <script type="text/javascript">
								var ueContent = UE.getEditor('contentEditor',{
									toolbars: [
										[		
												'source',
												'undo', //撤销
												'redo', //重做
												'bold',
												'italic', //斜体
												'underline', //下划线
												'strikethrough',
		// 										'simpleupload',//单张图片上传
												'insertimage',//多张图片上传
												'insertvideo',//上传视频
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
					       	<script id="contentEditor" type="text/plain" style="width:100%;height:500px;"><{$data.content}></script>
			            </td>
			        </tr>
			        <tr class="table-header"><td colspan="4">视频直播详情</td></tr>
			        <tr>
			            <td>直播流地址：<br />（将复制本直播流地址配置到PC录屏软件即可实现在线直播）</td>
			            <td><{$data['videoData']['pushSteam']}></td>
			            <td>播放器默认图：</td>
			            <td>
			                <?php echo \qiNiu\QiNiuHtml::instance()->getImgBeUploadAndDel(
			                        $data['videoData']['videoPicUrl'], '没有播放器默认图', 6, ['data-id' => $data['videoData']['video_pic_id']]
			                );?>
			            </td>
			        </tr>
			        <tr>
			            <td>上传视频：</td>
			            <td colspan="3">
			                <?php echo \qiNiu\QiNiuHtml::instance()->getVideoHtml(
			                        $data['videoData']['videoUrl'], 7, '没有视频上传', ['data-id' => $data['videoData']['video_url_id']]
			                );?>
			            </td>
			        </tr>
			    </table>
				<hr>
			    <div class="text-c">
			        <input type="submit" class="btn btn-primary save" value="保存" />
			        <input type="reset" class="btn btn-primary button-reset" value="返回" />
			    </div> 
			</form>
	    </div>
	</div>
	<div class="tab-pane fade" id="preview">
		<h4>特训班名称：<{$data.class_name}></h4>
        <script type="text/javascript">
			var uePreview = UE.getEditor('previewEditor',{
				toolbars: [
					[
							'undo', //撤销
							'redo', //重做
							'bold',
							'italic', //斜体
							'underline', //下划线
							'strikethrough',
// 							'simpleupload',//单张图片上传
							'insertimage',//多张图片上传
							'insertvideo',//上传视频
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
       	<script id="previewEditor" type="text/plain" style="width:100%;height:500px;"><{$data.preview}></script>
       	<hr>
       	<div class="text-c">
	        <input type="submit" class="btn btn-primary save" value="保存" />
	        <input type="reset" class="btn btn-primary button-reset" value="返回" />
	    </div> 
	</div>
	<div class="tab-pane fade" id="review">
		<h4>特训班名称：<{$data.class_name}></h4>
        <script type="text/javascript">
			var ueReview = UE.getEditor('reviewEditor',{
				toolbars: [
					[
							'undo', //撤销
							'redo', //重做
							'bold',
							'italic', //斜体
							'underline', //下划线
							'strikethrough',
// 							'simpleupload',//单张图片上传
							'insertimage',//多张图片上传
							'insertvideo',//上传视频
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
       	<script id="reviewEditor" type="text/plain" style="width:100%;height:500px;"><{$data.review}></script>
       	<hr>
       	<div class="text-c">
	        <input type="submit" class="btn btn-primary save" value="保存" />
	        <input type="reset" class="btn btn-primary button-reset" value="返回" />
	    </div> 
	</div>
	<div class="tab-pane fade" id="schedule">
		<h4>特训班名称：<{$data.class_name}></h4>
		<br>
		<div class="scheduleList" data-delete-id-list="">
			<{foreach $courseScheduleList as $key=>$courseSchedule}>
				<div class="schedule scheduleEdit" data-id="<{$courseSchedule.id}>">
					<span class="c-red">*</span>课程开始时间：
					<input type="text" id="beginTime<{$key}>" name="beginTime" placeholder="年月日时分秒" value="<{$courseSchedule.begin_time}>" class="beginTime input-text Wdate" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss', maxDate:'#F{$dp.$D(\'endTime<{$key}>\')}'})" readonly >
					
					<span class="c-red">*</span>课程结束时间：
					<input type="text" id="endTime<{$key}>" name="endTime" placeholder="年月日时分秒" value="<{$courseSchedule.end_time}>" class="endTime input-text Wdate" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss', minDate:'#F{$dp.$D(\'beginTime<{$key}>\')}'})" readonly >
					
					<span class="c-red">*</span>主讲人：
					<input type="text" class="input-teacher input-text valid" name="teacherId" value="<{$courseSchedule.teacher_id}>" placeholder="请输入讲师ID，关联讲师">
		            <small class="teacher-name info-show"><{$courseSchedule.alias}></small>
					
		            <input type="button" class="btn btn-primary delete-schedule" value="删除" />
	            </div>
	        <{/foreach}>
        </div>
        
        <input type="button" class="btn btn-primary add-schedule" value="新增" />
        <hr>
		<div class="text-c">
	        <input type="submit" class="btn btn-primary save" value="保存" />
	        <input type="reset" class="btn btn-primary button-reset" value="返回" />
	    </div> 
	</div>
</div>
<script>
$(function(){

	//切换标签提示信息
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		// 获取已激活的标签页的名称
		var activeTab = $(e.target).text(); 
		// 获取前一个激活的标签页的名称
		var previousTab = $(e.relatedTarget).text(); 
		layer.msg("你从\""+previousTab+"\"切换到\""+activeTab+"\"，注意保存信息哦！！");
	});

	//返回按钮
	$('.button-reset').click(function () {
        history.go(-1);
    });
	
	/* 课程表   */
	var addNum = 0;
	$("#schedule .add-schedule").click(function(){
		var appendHtml = "<div class=\"schedule scheduleAdd\"><span class=\"c-red\">*</span>课程开始时间： <input type=\"text\" id=\"beginTimeAdd" + addNum + "\" name=\"beginTime\" placeholder=\"年月日时分秒\" class=\"beginTime input-text Wdate\" onfocus=\"WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss', maxDate:'#F{$dp.$D(\\'endTimeAdd" + addNum + "\\')}'})\" readonly style=\"margin-right:10px;\" > <span class=\"c-red\">*</span>课程结束时间： <input type=\"text\" id=\"endTimeAdd" + addNum + "\" name=\"endTime\" placeholder=\"年月日时分秒\" class=\"endTime input-text Wdate\" onfocus=\"WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss', minDate:'#F{$dp.$D(\\'beginTimeAdd" + addNum + "\\')}'})\" readonly style=\"margin-right:10px;\" > <span class=\"c-red\">*</span>主讲人： <input type=\"text\" class=\"input-teacher input-text valid\" name=\"teacherId\" value=\"\" placeholder=\"请输入讲师ID，关联讲师\" style=\"margin-right:10px;\"> <small class=\"teacher-name info-show\" style=\"margin-right:10px;\"></small> <input type=\"button\" class=\"btn btn-primary delete-schedule\" value=\"删除\" /></div>";
		$(".scheduleList").append(appendHtml);
		addNum++;
	});

	$(document).on("change", "#schedule .input-teacher", function(){
		var teacherInfo = $(this).val();
		var link = $(this);
		if(teacherInfo == "") {
			link.val("");
			link.next('.teacher-name').html("");
			return;
		}

		requestAjax({
			teacherInfo: teacherInfo,
        }, {
        	url: '<{:url("searchUser")}>',
            success: function(e){
                if (e.code == 200) {
                	link.val(e.data.userId);
        			link.next('.teacher-name').html(e.data.alias);
                }else {
                	layer.msg(e.msg);
                	link.val("");
        			link.next('.teacher-name').html("");
                }
            }
        });
	});

	var deleteIdList = "";
	$(document).on("click", "#schedule .delete-schedule", function(){
		var deleteId = $(this).parent(".schedule").data("id");
		if(typeof deleteId != "undefined") {
			if(deleteIdList != ""){
				deleteIdList += ',' + deleteId;
			}else{
				deleteIdList = deleteId;
			}
		}
		
		$(this).parent(".schedule").remove();

	});

	$("#schedule .save").click(function(){
		var addList = [];
		var editList = [];
		var isOk = true;

		//新增
		$("#schedule .scheduleAdd").each(function(){
			var beginTime = $(this).find(".beginTime").val();
			var endTime = $(this).find(".endTime").val();
			var teacherId = $(this).find(".input-teacher").val();
			if(beginTime == "" || endTime == "" || teacherId == ""){
				alert("还有信息未完善，请继续填写");
				isOk = false;
				return false;
			}
			addInfo = {
					beginTime:beginTime,
					endTime:endTime,
					teacherId:teacherId
			};
			addList.push(addInfo);
        });

		if(!isOk){
			return;
		}

		//修改
		$("#schedule .scheduleEdit").each(function(){
			var id = $(this).data("id");
			var beginTime = $(this).find(".beginTime").val();
			var endTime = $(this).find(".endTime").val();
			var teacherId = $(this).find(".input-teacher").val();
			if(beginTime == "" || endTime == "" || teacherId == ""){
				alert("还有信息未完善，请继续填写");
				isOk = false;
				return false;
			}
			editInfo = {
					id:id,
					beginTime:beginTime,
					endTime:endTime,
					teacherId:teacherId
			};
			editList.push(editInfo);
		});	

		if(!isOk){
			return;
		}
        
		requestAjax({
			type: "schedule",
			deleteIdList: deleteIdList,
			addList: addList,
			editList: editList
        }, {
            success: function(e){
                if (e.code == 200) {
                	layer.msg("保存成功");
                }else {
                	layer.msg(e.msg);
                }
            }
        });

	});

	/* 预告 */
	$("#preview .save").click(function(){
		var preview = uePreview.getContent();
        
		requestAjax({
			type: "preview",
			preview: preview
        }, {
            success: function(e){
                if (e.code == 200) {
                	layer.msg("保存成功");
                }else {
                	layer.msg(e.msg);
                }
            }
        });
	});

	/* 回顾 */
	$("#review .save").click(function(){
		var review = ueReview.getContent();
        
		requestAjax({
			type: "review",
			review: review
        }, {
            success: function(e){
                if (e.code == 200) {
                	layer.msg("保存成功");
                }else {
                	layer.msg(e.msg);
                }
            }
        });
	});

	/* 详情  */
	jQuery.validator.addMethod("check-price", function(value, element, param) {
        return this.optional(element) || ( value > 0 ? (value >= 1 && value <= 999999.99) : (true) );
    }, $.validator.format("价格限制6位整数，2位小数且大于等于1"));


	$("#details .save").click(function(){
		$('#form').validate({
	        rules:{
	            name:{
	                required:true
	            },
	            beginEnrollTime:{
	                required:true
	            },
	            endEnrollTime:{
	                required:true
	            },
	            beginTime:{
	                required:true
	            },
	            endTime:{
	                required:true
	            },
	            price: {
	                number: true,
	                min: 0,
	                'check-price':true
	            },
	            virtualEnrollNum:{
	            	required:true,
	                digits:true,
	                min:0
	            },
	            enrollMaxNum:{
	            	required:true,
	                digits:true,
	                min:0
	            },
	            goal:{
	                required:true
	            }
	        },
	        messages:{
	            name: '课程名称不能为空',
	            beginEnrollTime: '请选择报名开始时间',
	            endEnrollTime: '请选择报名结束时间',
	            beginTime: '请选择课程开始时间',
	            endTime: '请选择课程结束时间',
	            price: '优惠价(礼点)格式不正确',
	            virtualEnrollNum: '虚拟报名人数格式不正确',
	            enrollMaxNum: '预计招募人数格式不正确'
	        },
	        onkeyup:false, // 在 keyup 时验证
	        focusCleanup:true, // 如果是 true 那么当未通过验证的元素获得焦点时，移除错误提示。避免和 focusInvalid 一起用。
	        submitHandler:function (form,event){
	            event.preventDefault();
	
	            var name = $('#name').val(),
	            	beginEnrollTime = $('#beginEnrollTime').val(),
	            	endEnrollTime = $('#endEnrollTime').val(),
	            	beginTime = $('#beginTime').val(),
	            	endTime = $('#endTime').val(),
	            	level = $('#live-level').val(),
	            	originPrice = parseFloat($('#originPrice').val()),
	            	price = parseFloat($('#price').val()),
	            	virtualEnrollNum = $('.input-virtual-enroll-num').val(),
	                enrollMaxNum = $('.input-enroll-max-num').val();
	            	goal = $('#goal').val();

	            if(beginEnrollTime >= endEnrollTime) {
	            	layer.msg('报名开始时间必须小于报名截止时间');
	                return;
	            }else if(beginTime >= endTime) {
	            	layer.msg('课程开始时间必须小于课程截止时间');
	                return;
	            }else if(beginTime <= endEnrollTime) {
	            	layer.msg('课程开始时间必须大于报名截止时间');
	                return;
	            }else if (level == 2 && price < 1){
	            	layer.msg('收费课程优惠价最少为1');
	                return;
	            }else if (originPrice > 0 && price > originPrice){
	                layer.msg('原价不能比优惠价低。');
	                return;
	            }
	            
	            requestAjax({
	            	type: "details",
	                name: name,
	                beginEnrollTime: beginEnrollTime,
	                endEnrollTime: endEnrollTime,
	                beginTime: beginTime,
	                endTime: endTime,
	                level: level,
	                price: price,
	                virtualEnrollNum: virtualEnrollNum,
	                enrollMaxNum: enrollMaxNum,
	                srcImg: $('#src-img').find('img').attr('src'),//封面海报（移动端）
	                srcImgPc: $('#src-img-pc').find('img').attr('src'),//封面海报（PC端）
	                goal: goal,//摘要
	                brief: ueBrief.getContent(),//课程介绍
	                content: ueContent.getContent(),//课程安排
	                videoPicId: $('#admin-qi-niu-upload-div-be-upload-del-1-img').data('id'),
	                videoUrlId: $('#admin-qi-niu-upload-div-be-upload-del-2-video').data('id')
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
	        },
	        errorPlacement: function (error,element) {
	            layer.msg(error.html());
	        }
	    });
	});	
	
	$("#course-open-close .btn").click(function(){
		var detailStatus = $(this).data("status");
		var link = $(this);
        requestAjax({
        	type: "changeDetailStatus",
        	detailStatus: detailStatus
        }, {
            success: function(e){
            	if (e.code == 200) {
                	if(detailStatus == 1){
	            		layer.msg("本课程已开启");
                		link.data("status", 2).val("开启->关闭").removeClass("btn-danger").addClass("btn-success");
                    }else if(detailStatus == 2){
                    	layer.msg("本课程已关闭");
                    	link.data("status", 1).val("关闭->开启").removeClass("btn-success").addClass("btn-danger");
                    }
                }else {
                	layer.msg(e.msg);
                }
            }
        });
	});
	
});
</script>