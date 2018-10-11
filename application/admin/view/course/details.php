
<{include file="include/nav"}>

<style>
    
    td{
        position: relative;
    }
    .table-header{
        background: #efefef;
    }
    #src-img img{
        width: 290px;
        height: 141px;
    }
    #src-img input{
        cursor: pointer;
    }

</style>

<form action="#" method="post" id="form" data-pid="<{$data['pid']}>">
    <table class="table table-border table-bordered radius">


        <tr class="table-header"><td colspan="4">单次课程资料</td></tr>

        <tr>
            <td><label for="name">课程名称：</label></td>
            <td><input type="text" name="name" id="name" value="<{$data['class_name']}>"></td>
            <td rowspan="5">
                课程海报：
            </td>
            <td rowspan="5"><div id="src-img"><{$srcImgHtml}></div></td>
        </tr>


        <tr>
            <td>一级分类：</td>
            <td>
                <select title="一级分类" name="first-cate" id="first-cate">
                </select>
            </td>
        </tr>
        <tr>
            <td>
                二级分类：
            </td>
            <td>
                <select title="二级分类" name="second-cate" id="second-cate">
                </select>
            </td>
        </tr>
        <tr>
            <td>直播类型：</td>
            <td>
                <select title="直播类型" name="live-level" id="live-level">
                    <{option data="$levelArr" selected="$data['level']" notHeader="true"}>
                </select>
            </td>
        </tr>
        <tr>
            <td>主讲人：</td>
            <td><{$data['alias']}></td>
        </tr>
        <tr>
            <{if $data['pid'] <= 0}>
            <td><label for="price">优惠价(礼点)：</label></td>
            <td style="white-space:nowrap;display: flex;">
                <input id="price" name="price" class="c-red" type="text" value="<{$data['price']}>">
                <span style="flex-grow: 1;">&emsp;</span>
                <span>
                    <label for="origin-price">原价(礼点)</label>
                    <input type="number" id="origin-price" name="origin-price" class="c-red" value="<{$data['origin_price']}>" />
                </span>
            </td>
            <{else}>
            <td></td>
            <td></td>
            <{/if}>
            
            <{if $data['type'] != 2}>
            <td><label for="virtual-num">课程聊天室在线人数（虚拟）：</label></td>
            <td><input id="virtual-num" name="virtual-num" class="c-red" type="text" value="<{$data['virtual_num']}>"></td>
            <{else /}>
            <td>课程安排：</td>
            <td><{$data['planHtml']}></td>
            <{/if}>
        </tr>
        <tr>
            <td>购买人数：</td>
            <td><{$data['buyNum']}></td>
            <td>浏览人数：</td>
            <td><{$data['study_num']}></td>
        </tr>
        <tr>
            <td>创建时间：</td>
            <td><{$data['create_time']}></td>
            <td>直播时间：</td>
            <td><{$data['begin_time']}></td>
        </tr>
        <tr>
            <td>嘉宾：</td>
            <td colspan="3"><{$data['teacher_name']}></td>
        </tr>
        <tr>
            <td><label for="password">课程密码：</label></td>
            <td colspan="2">
                <input type="text" id="password" name="password" value="<{$data['password']}>" />
                &emsp;
                <span class="c-blue pointer" id="reset-password">重置</span>
            </td>
        </tr>
        <tr>
            <td><label for="lecturers">主讲人介绍：</label></td>
            <td colspan="3">
                <textarea class="textarea radius" id="lecturers"><{$data['lecturers']}></textarea>
            </td>
        </tr>
        <tr>
            <td><label for="brief">课程介绍：</label></td>
            <td colspan="3">
                <textarea class="textarea radius" id="brief"><{$data['brief']}></textarea>
            </td>
        </tr>

        <tr>
            <td>课程介绍图片：</td>
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

            </td>
        </tr>

        <tr>
            <td>语音介绍：</td>
            <td colspan="3">
                <div id="course-audio" data-id="<{$data['info_video_qg_id']}>" data-src="<{$data['audioSrc']}>">
                
                <{notempty name="$data['audioSrc']"}>
                    <audio id="course-audio-ele" controls preload="metadata" src="<{$data['audioSrc']}>">
                        您的浏览器不支持 audio播放音频 元素。
                    </audio>
                    &emsp;
                    <span class="c-blue pointer audio-del">删除</span>
                <{elseif $data['info_video_qg_id'] /}>
                    <span>七牛正在下载中，暂时无法播放</span>
                    &emsp;
                    <span class="c-blue pointer audio-del">删除</span>
                <{/notempty}>
                
                </div>
            </td>
        </tr>


        <tr>
            <td>介绍视频：</td>
            <td colspan="3"><?php echo \qiNiu\QiNiuHtml::instance()->getVideoHtmlById($data['introduction_code_id'], 8)?></td>
        </tr>
        
        
        <{notempty name="$data['videoData']"}>

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
        
        <{/notempty}>
        
        <{if $data['form'] == 3}>

        <tr class="table-header"><td colspan="4">PPT直播详情</td></tr>


        <tr>
            <td colspan="4">
                <{$data['pptUploadHtml']}>
            </td>
        </tr>
        
        <{/if}>
        
    </table>

    <div class="text-c">
        <input type="submit" class="btn btn-primary" value="保存" />
        <input type="reset" class="btn btn-primary" id="button-reset" value="返回" />
    </div>
</form>

<script>
    
    var allCate = JSON.parse('<{$allCate|json_encode}>'),
        firstSelected = "<{$data['firstCate']}>",
        secondSelected = "<{$data['secondCate']}>",
        firstCate = $('#first-cate'),
        secondCate = $('#second-cate');

    firstCate.html((function (){
        var html = '',
            selected = firstSelected;
        for (var i in allCate){
            if (allCate.hasOwnProperty(i) && allCate[i]['name']){
                html += '<option '+(selected == allCate[i]['id']?'selected':'')+' value="'+allCate[i]['id']+'">'+allCate[i]['name']+'</option>';
            }
        }

        secondCate.html(secondCateHtml(selected));
        
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
                    html += '<option '+(secondSelected == data[i]['id']?'selected':'')+' value="'+data[i]['id']+'">'+data[i]['name']+'</option>';
                }
            }
        }
        
        return html;
    }



    var imgListDiv = $('#img-list'),
        form = $('#form');

    jQuery.validator.addMethod("check-price", function(value, element, param) {
        return this.optional(element) || ( value > 0 ? (value >= 1 && value <= 999999.99) : (true) );
    }, $.validator.format("价格限制6位整数，2位小数且大于等于1"));
    
    jQuery.validator.addMethod("check-password", function(value, element, param) {
        return this.optional(element) || ( value && value.length === 4 && /^\w+$/.test(value) );
    }, $.validator.format("密码为4位数字、字母，或字母数字"));

    form.validate({
        rules:{
            name:{
                required:true
            },
            "first-cate":{
                required:true
            },
            "second-cate":{
                required:true
            },
            'virtual-num':{
                digits:true,
                min:0
            },
            password:{
                'check-password': true
            },
            price: {
                number: true,
                min: 0,
                'check-price': true
            },
            'origin-price': {
                number: true,
                min: 0,
                'check-price': true
            }
        },
        messages:{
            name: '课程名称不能为空',
            'price': false,
            'origin-price': false
        },
        onkeyup:false, // 在 keyup 时验证
        focusCleanup:true, // 如果是 true 那么当未通过验证的元素获得焦点时，移除错误提示。避免和 focusInvalid 一起用。
        submitHandler:function (form,event){
            event.preventDefault();
            
            var level = $('#live-level').val(),
                password = $('#password').val(),
                originPrice = parseFloat($('#origin-price').val()),
                price = parseFloat($('#price').val());
            
            if (level == 2 && price == 0 && form.data('pid') <= 0){
                layer.msg('收费课程必须设置价格');
                return;
            }else if (level == 3 && !password){
                layer.msg('加密课程必须设置密码');
                return;
            }
            
            if (originPrice > 0 && price > originPrice){
                layer.msg('原价不能比优惠价低。');
                return;
            }
            
            var audioDiv = $('#course-audio'),
                audioSrc = '';
            if (audioDiv.length){
                audioSrc = audioDiv.data('src') ? audioDiv.data('src') : audioDiv.data('id');
            }

            requestAjax({
                name: $('#name').val(),
                firstCate: $('#first-cate').val(),
                secondCate: $('#second-cate').val(),
                liveLevel: level,
                password: password,
                lecturers: $('#lecturers').val(),
                price: price,
                originPrice: originPrice, // 原价
                virtualNum: $('#virtual-num').val(),
                srcImg: $('#src-img').find('img').attr('src'),
                brief: $('#brief').val(),
                // 音频
                audioSrc: audioSrc,
                videoPicId: $('#admin-qi-niu-upload-div-be-upload-del-2-img').data('id'),
                videoUrlId: $('#admin-qi-niu-upload-div-be-upload-del-3-video').data('id'),
                introductionCodeId: $('#admin-qi-niu-upload-div-be-upload-del-1-video').data('id'),
                pptImgList: (function (){
                    var list = [],
                        div = $('.admin-qi-niu-upload-multi-div-1-item-div');
                    
                    div.each(function (item){
                        var ele = div.eq(item),
                            main = ele.find('img');
                        
                        list.push({
                            src: main.attr('src'),
                            sort: ele.find('.none-sort').children('input').val(),
                            hash: main.data('hash')
                        });
                    });
                    
                    return list;
                })(),
                // 课程介绍图
                imgList: (function (){
                    var list = [];
                    imgListDiv.children('.img-list-div').map(function (){
                        var e = $(this);
                        list.push({
                            src: e.find('.img-list-img').attr('src'),
                            explain: e.children('input').val(),
                            type: 2  // @see \app\common\model\LiveImg::saveImg
                        });
                    });
                    
                    return list;
                })()
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
    
    
    // 重置密码
    $('#reset-password').click(function (){
        $('#password').val('0000');
    });

    imgListDiv.find('.img-list-del').click(function (){
        $(this).parents('.img-list-div').remove();
    });
    
    
    $('.audio-del').click(function (){
        $('#course-audio').remove();
    });
    
</script>

