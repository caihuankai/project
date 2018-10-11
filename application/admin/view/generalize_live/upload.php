<link rel="stylesheet" href="/lib/webuploader/webuploader.css" />
<script type="text/javascript" src="/lib/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/lib/webuploader/webuploader.js"></script>
<script type="text/javascript" src="/lib/My97DatePicker/WdatePicker.js"></script>
<style>
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
</style>
<article class="page-container">
    <form class="form form-horizontal" id="form-admin-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>标题：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <{eq name="$info['id']" value=""}>
                <input type="text" class="input-text" value="" placeholder="标题" id="title" name="title" maxlength="30">
                <{else/}>
                <input type="hidden" value="<{$info['id']}>" name="id">
                <input type="text" class="input-text" value="<{$info['title']}>" placeholder="标题" id="title" name="title" maxlength="30">
                <{/eq}>

            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>展示区域：</label>
            <div class="formControls col-xs-3 col-sm-4">
                <select id="icon" name="icon">
                    <{volist name="$info['type']" id="vo"}>
                    <{if condition="$vo.text == $info['icon']"}>
                    <option value="<{$vo.text}>"  selected = "selected"><{$vo.name}></option>
                    <{else /}>
                     <option value="<{$vo.text}>"><{$vo.name}></option>
                    <{/if}>
                    <{/volist}>
                </select>
            </div>
        </div>
        <div id="datebox">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>开始时间：</label>
                <div class="formControls col-xs-4 col-sm-6">
                    <input class="Wdate" type="text"  id="time"  required="required" name="starttime" <{if condition="$info['content'] != ''|| $info['content'] != null"}> value="<{$info['content']['starttime']}>"<{/if}>  placeholder="直播时间" onfocus="WdatePicker({minDate: 'dateMin',dateFmt: 'HH:mm' })" style="width:180px;"/>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>结束时间：</label>
                <div class="formControls col-xs-4 col-sm-6">
                    <input class="Wdate" type="text"  id="time"  required="required" name="endtime" <{if condition="$info['content'] != ''|| $info['content'] != null"}> value="<{$info['content']['endtime']}>"<{/if}>  placeholder="直播时间" onfocus="WdatePicker({minDate: 'dateMin',dateFmt: 'HH:mm' })" style="width:180px;"/>
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>图片：</label>
            <div class="formControls col-xs-4 col-sm-2">
                <img src="<{$info['qr_code']}>" id="showimg"style="width: 60px;height: 60px;border: 0 solid #000">
            </div>
            <div class="formControls col-xs-4 col-sm-2">
                <a class="upload">上传
                    <input type="file" multiple  name="file" id="file" style="color: #0e90d2"   onchange="imgChange(event)">
                </a>
            </div>
        </div>
        <div class="row cl" id="sortbox" <{if condition="$info['icon'] != 'right'"}> style="display: none"<{/if}> data-show"<{$info['icon']}>">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>排序：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input type="number" class="input-text" placeholder="排序" id="sort" name="sort" <{if condition="($info['content'] != null) AND ($info['icon'] eq 'right')"}> value="<{$info['content']}>"<{/if}> maxlength="30">
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-3 col-xs-offset-3 col-sm-offset-3">
                <input class="btn btn-primary radius" style="margin: auto" type="submit" value="&nbsp;&nbsp;保存&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
    var postimg = null,iconType=$("select#icon").val();
    ElementIsShow($("#datebox"),iconType,'endplay');
    $("select#icon").change(function (){
        iconType=$("select#icon").val();
        ElementIsShow($("#datebox"),iconType,'endplay');
        ElementIsShow($("#sortbox"),iconType,'right',false);
    });
    function ElementIsShow(el,type,condition,flg=true) {
        console.log(type);
        if(iconType == condition){
            el.show();
        }else{
            el.hide();
            if (flg==true){
                $("#time").val(null);
            }
        }
    }
    //图片上传
    function imgChange(e) {
        console.info(e.target.files[0]);//图片文件
        var dom =$("input[id^='file']")[0];
        console.info(dom.value);//这个是文件的路径 C:\fakepath\icon (5).png
        var reader = new FileReader();
        reader.onload = (function (file) {
            return function (e) {
                // $("#showimgpath").attr("value",dom.value);
                $("#showimg").attr("src",this.result);
                postimg = this.result;
            };
        })(e.target.files[0]);
        reader.readAsDataURL(e.target.files[0]);
    }
    //提交数据
    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });
        $("#form-admin-add").validate({
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                var postdata = $('#form-admin-add').serializeArray();
                postdata.push({name: "qr_code", value:postimg});
                var url = "./upload";
                var jz;
                $.ajax({
                    type:"POST",
                    url:url,
                    data:postdata,// 你的formid
                    async: false,
                    error: function(request) {
                        layer.close(jz);
                        layer.msg("网络错误!", "", "error");
                    },
                    success: function(data) {
                        //关闭加载层
                        //layer.close(jz);
                        if(data.data.code == 200){
                            layer.msg(data.data.msg, "", "success");
                            setTimeout(function(){
                                if (window.parent != window && window.parent.hasOwnProperty('adminTableRefresh')){ // 刷新表格
                                    window.parent.adminTableRefresh();
                                }
                                layer_close();
                            },500)
                        }else{
                            layer.alert(data.data.msg, {
                                icon: 1,
                                skin: 'layer-ext-moon', //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                                time:2000,
                                btn: [ '知道了']
                            })
                        }//end
                    }
                });
            }
        });
    });
</script>
