<{include file="include/nav"}>
<style>
    .tab-pane{
        padding: 20px;
    }
    .text-c{
    	margin-top:10px;
    }
    .scheduleInfo{
    	margin-right:50px;
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
			<form action="#" method="post" id="form">
				<table class="table table-border table-bordered radius">
			        <tr class="table-header"><td colspan="4">单次课程资料</td></tr>
			        <tr>
			            <td width="200"><label for="name">特训班名称：</label></td>
			            <td>
			            	<{$data.class_name}>
			            </td>
			            <td rowspan="3"> 封面海报（移动端）：</td>
			            <td rowspan="3">
			            	<div id="src-img">
			            		<img src="<{$data.src_img}>" height='112' width='200'>
			            	</div>
			            </td>
			        </tr>
			        <tr>
			            <td>报名开始时间：</td>
			            <td>
			            	<{$data.begin_enroll_time}>
			            </td>
			        </tr>
			        <tr>
			            <td>报名结束时间：</td>
			            <td>
			            	<{$data.end_enroll_time}>
			            </td>
			        </tr>
			        <tr>
			            <td>课程开始时间：</td>
			            <td>
			            	<{$data.begin_time}>
		        		</td>
		        		<td rowspan="2"> 封面海报（PC端）：</td>
			            <td rowspan="2">
			            	<div id="src-img">
			            		<img src="<{$data.src_pc_img}>" height='112' width='200'>
			            	</div>
			            </td>
			        </tr>
			        <tr>
			            <td>课程结束时间：</td>
			            <td>
			            	<{$data.end_time}>
		        		</td>
			        </tr>
			        <tr>
			        	<td>直播类型：</td>
			            <td>
			            	<{$levelArr[$data['level']]}>
			            </td>
			            <td>
			            	<label for="origin-price">原价(礼点)</label>
			            </td>
			            <td style="white-space:nowrap;display: flex;">
		                    <span id="originPrice"><{$data.origin_price??0}></span>
			                <span style="flex-grow: 1;">&emsp;</span>
			                <span>
			                    <label for="price">优惠价(礼点)：</label>
				                <{$data['price']??0}>
			                </span>
			            </td>
			        </tr>
			        <tr>
			            <td>报名（购买）人数：</td>
			            <td><{$data.enroll_num}></td>
			            <td>虚拟报名人数：</td>
			            <td>
			            	<{$data.virtual_enroll_num??0}>
						</td>
			        </tr>
			        <tr>
			            <td>预计招募人数：</td>
			            <td>
			            	<{$data.enroll_max_num??0}>
			            </td>
			            <td>创建时间：</td>
			            <td><{$data.create_time}></td>
			        </tr>
			        <tr>
			        	<td>摘要：</td>
			        	<td colspan="3">
			        		<textarea class="textarea radius" id="goal" name="goal" readonly><{$data.goal}></textarea>
			        	</td>
			        </tr>
			        <tr>
			            <td>课程介绍：</td>
			            <td colspan="3">
			            	<div style="width:100%;height:500px;overflow:auto;">
			            		<{$data.brief}>
			            	</div>
			            </td>
			        </tr>
			        <tr>
			            <td>课程安排：</td>
			            <td colspan="3">
			            	<div style="width:100%;height:500px;overflow:auto;">
			            		<{$data.content}>
			            	</div>
			            </td>
			        </tr>
			        <tr class="table-header"><td colspan="4">视频直播详情</td></tr>
			        <tr>
			            <td>直播流地址：<br />（将复制本直播流地址配置到PC录屏软件即可实现在线直播）</td>
			            <td><{$data['videoData']['pushSteam']}></td>
			            <td>播放器默认图：</td>
			            <td>
			            	<img src="<{$data['videoData']['videoPicUrl']}>" height='112' width='200'>
			            </td>
			        </tr>
			        <tr>
			            <td>上传视频：</td>
			            <td colspan="3">
			            	<video src="<{$data['videoData']['videoUrl']}>" preload="meta" controls="controls" width="150px" height="100px"></video>
			            </td>
			        </tr>
			    </table>
				<hr>
			    <div class="text-c">
			        <input type="reset" class="btn btn-primary button-reset" value="返回" />
			    </div> 
			</form>
	    </div>
	</div>
	<div class="tab-pane fade" id="preview">
		<h4>特训班名称：<{$data.class_name}></h4>
		<hr>
       	<div style="width:100%;height:500px;overflow:auto;">
            <{$data.preview}>
        </div>
       	<hr>
       	<div class="text-c">
	        <input type="reset" class="btn btn-primary button-reset" value="返回" />
	    </div> 
	</div>
	<div class="tab-pane fade" id="review">
		<h4>特训班名称：<{$data.class_name}></h4>
		<hr>
		<div style="width:100%;height:500px;overflow:auto;">
            <{$data.review}>
        </div>
       	<hr>
       	<div class="text-c">
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
					<span class="scheduleInfo">
						<{$courseSchedule.begin_time}>
					</span>
					
					<span class="c-red">*</span>课程结束时间：
					<span class="scheduleInfo">
						<{$courseSchedule.end_time}>
					</span>
					
					<span class="c-red">*</span>主讲人：
					<span class="scheduleInfo">
						<{$courseSchedule.teacher_id}>
					</span>
		            <small class="teacher-name info-show"><{$courseSchedule.alias}></small>
	            </div>
	        <{/foreach}>
        </div>
        
        <hr>
		<div class="text-c">
	        <input type="reset" class="btn btn-primary button-reset" value="返回" />
	    </div> 
	</div>
</div>
<script>
$(function(){

	//返回按钮
	$('.button-reset').click(function () {
        history.go(-1);
    });
	
});
</script>