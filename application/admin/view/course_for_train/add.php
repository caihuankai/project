<style>
    .row{
        margin: 8px 0;
        padding: 0;
    }
    .info-show{
    	margin-right:20px;
    }
    .input-text{
    	width:170px;
    }
</style>


<form action="#" method="post" id="form">
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>特训班名称：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-class-name input-text valid" name="className" value="" id="class-name">
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>讲师：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-teacher input-text valid" name="teacherId" value="" id="input-teacher" placeholder="请输入讲师ID，关联讲师">
            <small class="teacher-name info-show"></small>
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>报名开始时间：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" id="beginEnrollTime" name="beginEnrollTime" placeholder="年月日时分秒" class="input-text Wdate" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss', maxDate:'#F{$dp.$D(\'endEnrollTime\')}'})" readonly style="width:170px;">
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>报名截止时间：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" id="endEnrollTime" name="endEnrollTime" placeholder="年月日时分秒" class="input-text Wdate" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss', minDate:'#F{$dp.$D(\'beginEnrollTime\')}'})" readonly style="width:170px;">
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程开始时间：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" id="beginTime" name="beginTime" placeholder="年月日时分秒" class="input-text Wdate" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss', maxDate:'#F{$dp.$D(\'endTime\')}'})" readonly style="width:170px;">
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程截止时间：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" id="endTime" name="endTime" placeholder="年月日时分秒" class="input-text Wdate" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss', minDate:'#F{$dp.$D(\'beginTime\')}'})" readonly style="width:170px;">
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>预计招生人数：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-enroll-max-num input-text valid" name="enrollMaxNum" value="" id="enroll-max-num">
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>付费类型：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <select title="付费类型" name="level" id="select-level" class="form-control form-select input-text">
		        <{option data="$searchLevelArr" notHeader="true" selected="2" }>
		    </select>
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>优惠价(礼点)：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-price input-text valid" name="price" value="" id="price" placeholder="最多保留小数点后2位">
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">原价(礼点)：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-origin-price input-text valid" name="originPrice" value="" id="originPrice" placeholder="最多保留小数点后2位">
        </div>
    </div>
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>上传封面（移动端）：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <?php echo \qiNiu\QiNiuHtml::instance()->getQiNiuUploaderHtmlBeUploadAndDel('', '');?>
        </div>
    </div>
    
    <!-- 暂不启用，统一上传
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>上传封面（PC端）：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <?php echo \qiNiu\QiNiuHtml::instance()->getQiNiuUploaderHtmlBeUploadAndDel('', '');?>
        </div>
    </div>
     -->
    
    <div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>状态：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<div class="radio-box">
				<input type="radio" id="status-1" name="status" value="1" checked>
				<label for="status-1">启用</label>
			</div>
			<div class="radio-box">
				<input type="radio" id="status-2" name="status" value="2">
				<label for="status-2">停用</label>
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

<script>

	$('#input-teacher').change(function(e){
		var teacherInfo = $(this).val();
		if(teacherInfo == "") {
			$('#input-teacher').val("");
        	$('.teacher-name').html("");
			return;
		}

		requestAjax({
			teacherInfo: teacherInfo,
        }, {
        	url: '<{:url("searchUser")}>',
            success: function(e){
                if (e.code == 200) {
                	$('#input-teacher').val(e.data.userId);
                	$('.teacher-name').html(e.data.alias);
                }else {
                	layer.msg(e.msg);
                	$('#input-teacher').val("");
                	$('.teacher-name').html("");
                }
            }
        });
	});

	jQuery.validator.addMethod("check-number", function(value, element, param) {
        return this.optional(element) || ( value >= 0 ? (value >= 0 && value <= 999999.99) : (false) );
    }, $.validator.format("限制6位整数，2位小数"));

    $('#form').validate({
        rules:{
        	className:{
        		required:true
        	},
        	teacherId:{
        		required:true,
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
            enrollMaxNum:{
                required:true,
                digits: true
            },
            level:{
            	required:true,
            },
            price:{
            	number: true,
            	'check-number': true,
            },
            originPrice:{
            	number: true,
            	'check-number': true,
            },
            status: {
            	required:true,
            }
        },
        messages:{
            
        },
        onkeyup:false, // 在 keyup 时验证
        focusCleanup:false, // 如果是 true 那么当未通过验证的元素获得焦点时，移除错误提示。避免和 focusInvalid 一起用。
        submitHandler:function (form, event){
            event.preventDefault();

            level = parseFloat($('#select-level').val());
            price = parseFloat($('#price').val());
            originPrice = $('#originPrice').val();
            coverUrl = $("#admin-qi-niu-upload-div-be-upload-del-1-img").attr("src");
//             pcCoverUrl = $("#admin-qi-niu-upload-div-be-upload-del-2-img").attr("src");
            beginEnrollTime = $('#beginEnrollTime').val();
            endEnrollTime = $('#endEnrollTime').val();
            beginTime = $('#beginTime').val();
            endTime = $('#endTime').val();

            if(beginEnrollTime >= endEnrollTime) {
            	layer.msg('报名开始时间必须小于报名截止时间');
                return;
            }else if(beginTime >= endTime) {
            	layer.msg('课程开始时间必须小于课程截止时间');
                return;
            }else if(beginTime <= endEnrollTime) {
            	layer.msg('课程开始时间必须大于报名截止时间');
                return;
            }else if(level == 2 && price < 1) {
				layer.msg('收费课程优惠价最少为1');
                return;
			}else if(originPrice > 0 && price > originPrice){
				layer.msg('原价必须大于优惠价');
                return;
			}else if(coverUrl == ''){
            	layer.msg('请上传封面（移动端）');
                return;
//             }else if(pcCoverUrl == ''){
//             	layer.msg('请上传封面（PC端）');
//                 return;
            }

            requestAjax({
            	className: $('#class-name').val(),
            	teacherId: $('#input-teacher').val(),
            	beginEnrollTime: beginEnrollTime,
            	endEnrollTime: endEnrollTime,
            	beginTime: beginTime,
            	endTime: endTime,
            	enrollMaxNum: $('#enroll-max-num').val(),
            	level: level,
            	price: price,
            	originPrice: originPrice,
            	coverUrl: coverUrl,
//             	pcCoverUrl: pcCoverUrl,
                openStatus: $('input[name=status]:checked').val()
            }, {
                success: function(e){
                	if (e.code == 200) {
		                url = "./copy?linkUrl=" + encodeURIComponent(e.data);
		                layer_show("直播流地址", url, 500, 300);
                    }else {
                    	layer.msg(e.msg);
                    }
                }
            });
        }
    });

</script>