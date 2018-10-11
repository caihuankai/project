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
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>名称：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input type="hidden"  name="positionType" value="<{$positionType}>">
                <input type="hidden"  name="adId" value="<{if condition="isset($info)"}> <{$info['adId']}> <{/if}>">
                <input type="text" class="input-text" required="required" value="<{if condition="isset($info)"}> <{$info['adName']}> <{/if}>" placeholder="名称" id="adName" name="adName" maxlength="30">
            </div>
        </div>
        <{if condition="$positionType == 24"}>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>ID/链接：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input type="text" class="input-text" required="required" value="<{if condition="isset($info)"}><{$info['relevanceId']}><{/if}>" placeholder="ID/链接" id="relevanceId" name="relevanceId">
            </div>
        </div>
        <{else /}>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>讲师ID：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input type="number" class="input-text" required="required" value="<{if condition="isset($info)"}><{$info['relevanceId']}><{/if}>" placeholder="讲师ID" id="relevanceId" name="relevanceId" style="width:100%;">
            </div>
        </div>
        <{/if}>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>跳转类型：</label>
            <div class="formControls col-xs-4 col-sm-4">
                <select id="relevanceType" name="relevanceType">
                    <{volist name="type" id="vo"}>
                        <{if condition="isset($info) AND $info['relevanceType'] == $vo.value"}>
                            <option value="<{$vo.value}>" selected="selected"><{$vo.name}></option>
                        <{else /}>
                            <option value="<{$vo.value}>"><{$vo.name}></option>
                        <{/if}>
                    <{/volist}>
                </select>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>上传图片：</label>
                <div class="formControls col-xs-4 col-sm-2">
                    <{if condition = "isset($info)"}>
                    <img src="<{$info['adFile']}>" id="showimg"style="width: 80px;height: 80px;border: 0 solid #000">
                    <{else /}>
                    <img src="http://oqt46pvmm.bkt.clouddn.com/Ft56ta8EDC03VFYIHzFuSjcv5E5_" id="showimg"style="width: 80px;height: 80px;border: 0 solid #000">
                    <{/if}>
                </div>
            <div class="formControls col-xs-4 col-sm-2">
                <a class="upload">选择文件
                    <input type="file" multiple  name="file" id="file" style="color: #0e90d2"   onchange="imgChange(event)">
                </a>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span></label>
            <div class="formControls col-xs-4 col-sm-8">
                <span>(图片不能大于1024KB)</span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>排序：</label>
            <div class="formControls col-xs-4 col-sm-6">
                <input type="text" class="input-text" required="required" value="<{if condition="isset($info)"}> <{$info['adSort']}> <{/if}>" placeholder="排序" id="adSort" name="adSort" maxlength="30">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span></label>
            <div class="formControls col-xs-4 col-sm-8">
                <span>(数值越小排越前)</span>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>状态：</label>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="radio"  value="1" <{if condition="(isset($info) AND $info['adStatus'] == 1) OR !isset($info)"}> checked="checked" <{/if}> id="status" name="status">启用
            </div>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="radio"  value="-1" <{if condition="isset($info) AND $info['adStatus'] == -1"}> checked="checked" <{/if}> id="status" name="status">禁用
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" style="margin: auto" type="submit" value="&nbsp;&nbsp;确定&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
    var postimg = null;
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
                postdata.push({name: "image", value:postimg});
                var url = "<{:url('InstituteBanner/add')}>";
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
                        layer.close(jz);
                        if(data.data.code == 200){
                            layer.msg(data.msg, "", "success");
                            setTimeout(function(){
                                if (window.parent != window && window.parent.hasOwnProperty('adminTableRefresh')){ // 刷新表格
                                    window.parent.adminTableRefresh();
                                }
                                layer_close();
                            },500)
                        }else{
                            layer.alert(data.msg, {
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
