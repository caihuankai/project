
<{include file="include/nav"}>

<style>
    
    .table-header{
        background: #efefef;
    }
    #live-img>img{
        width: 90px;
        height: 90px;
    }
    #live-back-img>img{
        width: 290px;
        height: 84px;
    }
    
    .img-list-img{
        max-width: 1000px;
    }
    /*上传*/
    .upload {
        padding: 5px 8px;
        height: 30px;
        line-height: 30px;
        position: relative;
        text-decoration: none;
        color: #fff;
        border-radius: 0.5rem;
        background-color: #428bca;
    }
    .upload:hover{
        text-decoration: none;
        color: #fffdef;
    }
    #file{
        position: absolute;
        overflow: hidden;
        right: 0;
        top: 0;
        opacity: 0;
        width: 6.5rem;
    }
    #virtual_focus_num{
    	 width: 80px;
    }
    .inner-span{
    	margin-left: 50px;
    }
    div.upload-img-div{
    	width:60px;
    	height:34px;
    	border: 1px solid #ccc;
    	color: #999; 
    	text-align: center;
    	font-weight: bold;
    	font-size: 30px;
    	line-height: 34px;
    }
    
</style>


<table class="table table-border table-bordered radius">
    <tr class="table-header">
        <td colspan="4">基本资料</td>
    </tr>
    <tr>
        <td>会员ID：</td>
        <td width="30%"><{$data['user_id']}></td>
        <td rowspan="3">头像：</td>
        <td rowspan="3"><img style="width: 90px;height: 90px;" src="<{$data['head_add']??''}>" alt="" /></td>
    </tr>
    <tr>
        <td>昵称：</td>
        <td>
        	<{$data['alias']}>
        </td>
    </tr>
    <tr>
        <td><label for="user-tel">手机：</label></td>
        <td><input type="number" id="user-tel" name="user-tel" value="<{$data['phone']}>" maxlength="11" /></td>
    </tr>
    <tr>
        <td><label for="user-type">属性：</label></td>
        <td>
            <select name="user-type" id="user-type">
                <{option data="$userTypeArr" notHeader="true" selected="$data['user_type']"}>
            </select>
        </td>
    </tr>
    <tr>
        <td>注册手机号：</td>
        <td><{$data['login_tel']}></td>
        <td><label for="change-login-password">注册密码：</label></td>
        <td><input id="change-login-password" type="text" value="<{$data['password']?'***':''}>"></td>
    </tr>
    <tr>
        <td>邀请人：</td>
        <td id="invite-edit" data-id="<{$data['inviteUserId']}>" class="c-blue pointer"><span><{$data['inviteAlias']??''}></span>&emsp;修改</td>
        <td>地区：</td>
        <td>
            <{$data['addr']}>
        </td>
    </tr>
    <tr>
        <td>关注时间：</td>
        <td><{$data['weChatDate']}></td>


        <{if $data['user_level'] != 3}>
        
        <td>注册时间：</td>
        <td><{$data['register_date']}></td>
        
        <{else}>

        <td>审核时间：</td>
        <td><{$data['applyTime']}></td>
        
        <{/if}>
    </tr>
    <tr>
        <td>邀请粉丝：</td>
        <td><{$data['inviteNum']}></td>
        <td>收益：</td>
        <td>
            <span class="c-red"><{$data['income_total']}></span>
            <span><{$data['liveMoneyText']}></span>
        </td>
    </tr>
    <tr>
        <td>人气值</td>
        <td><{$data['popular']}></td>
        <td>直播课程：</td>
        <td><span class="c-blue"><{$data['courseNum']}></span></td>
    </tr>
    
    
    <tr>
        <td>关注：</td>
        <td>
        	<span><{$data['focus_num'] + $data['virtual_focus_num']}></span>
        	<span class="inner-span">真实粉丝数:  <{$data['real_focus_num']}>
        	<span class="inner-span">虚拟粉丝数:</span><input id="virtual_focus_num" class="input-text" value="<{$data['virtual_focus_num']}>" type="text">
        </td>
        <td>发布观点</td>
        <td>
            <span class="l"><{$data['viewpointNum']}></span>

            <!-- <{if $data['user_level'] == 2}>
            <span class="r">
                <label for="user-viewpoint-week-price">收费观点包周价格(礼点)：</label>
                <input size="8" id="user-viewpoint-week-price" type="number" value="<{$data['viewpoint_week_price']}>" />
                <span> <a href="<{$data['userViewpointWeekPriceUrl']}>">查看列表</a></span>
            </span>
            <{/if}> -->
        </td>
    </tr>
    <tr>
        <td>Live直播链接：</td>
        <td><span class="c-blue"><{$data['liveUrl']}></span></td>
        <td>收藏：</td>
        <td><span class="c-blue"><{$data['keepCourse']}></span></td>
    </tr>

    <{// 老师}>
    <{if $data['user_level'] != 3}>

    <{if $data['user_level'] == 2}>
    <tr>
        <td>助教微信：</td>
        <td colspan="3">
            <?php echo \qiNiu\QiNiuHtml::instance()->getImgBeUploadAndDel($data['assistantWeChatImg'], '目前暂未上传助教微信二维码图片')?>
        </td>
    </tr>
    <{/if}>

    <tr>
        <td><label for="intro">介绍页封面图：</label></td>
        <td colspan="1">
            <{if condition="($data['lobby_img'] == '')"}>
            <img src="http://oqt46pvmm.bkt.clouddn.com/Ft56ta8EDC03VFYIHzFuSjcv5E5_" id="showimg"style="width: 60px;height: 60px;border: 0 solid #000">
            <{else /}>
            <img src="<{$data.lobby_img}>" id="showimg"style="width: 60px;height: 60px;border: 0 solid #000">
            <{/if}>

            <a class="upload">上传
                <input type="file" multiple  name="file" id="file" style="color: #0e90d2"   onchange="imgChange(event)">
            </a>
        </td>
        <td><label for="intro">公共直播间头像：</label></td>
        <td colspan="2">
            <{if condition="($data['live_head_add'] == '')"}>
            <img src="http://oqt46pvmm.bkt.clouddn.com/Ft56ta8EDC03VFYIHzFuSjcv5E5_" id="showimg"style="width: 60px;height: 60px;border: 0 solid #000">
            <{else /}>
            <img src="<{$data.live_head_add}>" id="showimg"style="width: 60px;height: 60px;border: 0 solid #000">
            <{/if}>

            <a class="upload">上传
                <input type="file" multiple  name="file" id="file" style="color: #0e90d2"   onchange="imgChange2(event)">
            </a>
        </td>
    </tr>
    
    <tr>
        <td><label for="intro">个人介绍：</label></td>
        <td colspan="3">
            <textarea class="textarea radius" id="intro"><{$data['intro']}></textarea>
        </td>
    </tr>

    <tr>
        <td>个人介绍图片：</td>
        <td id="img-list" colspan="3">
            <{volist name="$data['imgList']" id="list"}>
            <div class="img-list-div">
                <div>
                    <span><img class="img-list-img" src="<{$list['src']}>" alt="<{$list['explain']}>" /></span>
                    <span class="c-blue pointer img-list-del">删除</span>
                </div>
                <input title="<{$list['explain']}>" type="text" value="<{$list['explain']}>" />
            </div>
            <{/volist}>
            <br>
			<div class="upload-img-div">+</div>
        </td>
    </tr>


    <tr>
        <td>个人介绍视频：</td>
        <td colspan="1"><?php echo \qiNiu\QiNiuHtml::instance()->getVideoHtmlById($data['introduction_code_id'], 8)?></td>
        <td>介绍视频封面图：</td>
        <td>
            <?php echo \qiNiu\QiNiuHtml::instance()->getImgBeUploadAndDel(
                $data['introduction_img_url'], '介绍视频封面图', 6, ['data-id' => $data['introduction_img_id']]
            );?>
        </td>
    </tr>
    
    <{/if}>


    <tr>
        <td><label for="user-text-forte">擅长：</label></td>
        <td><input id="user-text-forte" class="input-text" type="text" value="<{$data['userTextForte']}>" /></td>
        <td><label for="user-text-brief">简介：</label></td>
        <td><input id="user-text-brief" class="input-text" type="text" value="<{$data['userTextBrief']}>" /></td>
    </tr>
    
<!--
    <tr>
        <td>购买课程：</td>
        <td><span class="c-blue"><{$data['courseBuyNum']}></span></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>参与课程：</td>
        <td><span class="c-blue"><{$data['courseUserNum']??'0'}></span></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
-->
</table>

<{if $data['user_level'] != 3}>

<table class="table table-border table-bordered radius">
    <tr class="table-header">
        <td colspan="4">购买记录</td>
    </tr>

    <tr>
        <td class="col-2">购买的课程：</td>
        <td colspan="1"><{$data['courseBuyNum']}></td>
        <td class="col-2">购买的特训班：</td>
        <td colspan="1"><{$data['courseBuySpecialNum']}></td>
    </tr>
    <tr>
        <td>购买的观点：</td>
        <td colspan="3"><{$data['viewpointBuyNum']}></td>
    </tr>
    <tr>
        <td class="col-2">购买系列课：</td>
        <td colspan="3"><{$data['seriesCourseBuyNum']}></td>
    </tr>
    <!-- <tr>
        <td class="col-2">购买包周：</td>
        <td colspan="3"><{$data['viewpointServiceBuyNum']}></td>
    </tr> -->
    <tr>
        <td>Live赞赏：</td>
        <td colspan="3"><{$data['admireBuyNum']}></td>
    </tr>

    <tr>
        <td>剩余礼点：</td>
        <td width="20%">
        	<span id="account-balance"><{$data['account_balance']}></span>
        	<input type="button" class="modify-virtual-account-balance" value="设置虚拟礼点">
        </td>
        <td>礼物消费量：</td>
        <td><{$data['consume_total']}></td>
    </tr>
</table>

<{/if}>


<br>
<div id="button-action" class="text-c">
    <button class="btn btn-primary" id="save">保存</button>
    <button class="btn btn-primary" onclick="history.go(-1)">返回</button>
</div>

<script>
    
    var inviteEditDiv = $('#invite-edit'),
        imgListDiv = $('#img-list');

    //图片上传
    function imgChange(e) {
        //console.info(e.target.files[0]);//图片文件
        var dom =$("input[id^='file']")[0];
       // console.info(dom.value);//这个是文件的路径 C:\fakepath\icon (5).png
        var reader = new FileReader();
        reader.onload = (function (file) {
            return function (e) {
                // $("#showimgpath").attr("value",dom.value);
                $("#showimg").attr("src",this.result);
                var postimg = this.result;
                uploadImg(postimg,'lobby_img');
            };
        })(e.target.files[0]);
        reader.readAsDataURL(e.target.files[0]);
    }
    //图片上传
    function imgChange2(e) {
        //console.info(e.target.files[0]);//图片文件
        var dom =$("input[id^='file']")[0];
        // console.info(dom.value);//这个是文件的路径 C:\fakepath\icon (5).png
        var reader = new FileReader();
        reader.onload = (function (file) {
            return function (e) {
                // $("#showimgpath").attr("value",dom.value);
                $("#showimg2").attr("src",this.result);
                var postimg = this.result;
                uploadImg(postimg,'live_head_add');
            };
        })(e.target.files[0]);
        reader.readAsDataURL(e.target.files[0]);
    }

    function uploadImg(img,param) {
        var id = "<{$data['user_id']}>";
        layer.confirm('确认上传该图片吗？',function(index){
            $.ajax({
                type: 'POST',
                url: "<{:url('uploadUserImg')}>",
                data:{
                    id:id,
                    img:img,
                    param:param
                },// 参数
                async: false,
                dataType: 'json',
                success: function(data){
                    layer.msg(data.msg,{icon:1,time:1000});
                    setTimeout(window.location.reload(),1500);
                },
                error:function(data) {
                    console.log(data.data.msg);
                    setTimeout(window.location.reload(),1500);
                },
            });
            layer.closeAll('dialog');
        });
    }
    
    $('#save').click(function () {
        
        requestAjax({
            id: "<{$data['user_id']}>",
            userId: inviteEditDiv.data('id')
        }, {
            url: "<{:url('changeInviteUserId')}>"
        }, true);

        var newUserType = $('#user-type').val(),
            vipLevelSelect = $('#vip-level');
        
        requestAjax({
            userId: "<{$data['user_id']}>",
            intro: $('#intro').val(),
            imgList: (function (){
                var list = [];
                imgListDiv.children('.img-list-div').map(function (){
                    var e = $(this);
                    list.push({
                        src: e.find('.img-list-img').attr('src'),
                        explain: e.children('input').val(),
                        type: 3  // @see \app\common\model\LiveImg::saveImg
                    });
                });

                return list;
            })(),
            vipLevel: vipLevelSelect.length ? vipLevelSelect.val() : -1,
            password: $('#change-login-password').val(),
            userType: newUserType,
            tel: $('#user-tel').val(),
            viewpointWeekPrice:$('#user-viewpoint-week-price').val(),
            userText:{
                forte: $('#user-text-forte').val(),
                brief: $('#user-text-brief').val()
            },
            virtualFocusNum:$('#virtual_focus_num').val(),
            introductionCodeId: $('#admin-qi-niu-upload-div-be-upload-del-2-video').data('id'),
            introductionImgId: $('#admin-qi-niu-upload-div-be-upload-del-3-img').data('id'),
            assistantWeChatImg: $('#admin-qi-niu-upload-div-be-upload-del-1-img').attr('src')
        }, {
            url: "<{:url('saveData')}>",
            localSuccess: function (e){
                if(e == 2) {
                	$("#account-balance").html("0.00");
                }
                layer.msg('提交成功');
            }
        })
        
    });


    // 介绍图片删除
    imgListDiv.on("click", '.img-list-del', function (){
        $(this).parents('.img-list-div').remove();
    });


    inviteEditDiv.click(function (){
        var e = $(this);
        inviteUserTableShow()(function(id, alias){
            e.find('.invite-alias').text(alias);
            e.find('.invite-user-id').text(id);
            e.data('id', id);
        });
    });

    $(".modify-virtual-account-balance").click(function(){
    	layer.open({
    		type: 2,
    		area: ['500px', '300px'],
    		title: false,
    		shadeClose: true,
    		shade:0.4,
    		closeBtn: 0,
    		scrollbar: false,
            content: "<{:url('setVirtualAccountBalance')}>?userId=<{$data['user_id']}>"
        });
    });

    $(".upload-img-div").click(function(){
        var addHtml = '<div class="img-list-div"><div class="uploader"><div class="upload_div">个人介绍图 <span class="c-blue pointer upload-a-btn">上传</span></div><div class="upload_img  hidden"><img class="img-list-img" src=""/><span class="c-blue pointer upload-a-btn">点击修改</span></div><input style="display:none;" type="file" class="input-text" name="" id="upload_img" /></div><input title="" type="text" value="" /><span class="c-blue pointer img-list-del">取消</span><br><br></div>';
		$(this).before(addHtml);
    });

    imgListDiv.on('click', '.upload-a-btn', function(){
        $(this).parents('div.uploader').find('#upload_img').trigger('click');
    });

    imgListDiv.on('change', '#upload_img', function(){
        if (typeof this.files[0] == undefined) {
            console.log('file undefined');
            return null;
        }
        console.log(this.files[0]);
        var formData = new FormData();
        formData.append("img",$(this)[0].files[0]);
        var link = $(this);
        $.ajax({  
             url: '/Gift/img' ,  
             type: 'POST',  
             data: formData,  
             async: false,  
             cache: false,  
             contentType: false,  
             processData: false,  
             success: function (returndata) {
                if (returndata.code == 1) {
                	link.parent('div').find('.upload_div').addClass('hidden');
                    return link.parent('div').find('.upload_img').removeClass('hidden').find('img').attr('src', returndata.key);
                }  else {
                    return layer.msg(returndata.msg);
                }
             },  
             error: function (errdata) {  
                 layer.msg(errdata);
             }  
        });  
        
    });
    
</script>

<{include file="foreground_user/invite-user"}>

