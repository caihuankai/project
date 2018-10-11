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
<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i>首页
    <span class="c-gray en">&gt;</span>
    <script>document.write('首页管理（网站）')</script>
    <span class="c-gray en">&gt;</span>
    <script>document.write(getQueryString('tabName2'))</script>
    <a class="btn btn-success radius r" style="line-height:1em;height: 2em;"
       href="javascript:location.replace(location.href);" title="刷新">
        <i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<article class="page-container">
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><h3 style="font-weight: bold;">学员评价</h3>
    </div>
    <form class="form form-horizontal" id="form-admin-add" style="border-radius:2em;box-shadow: 3px 0px 7px #3BABD4;padding-top: 3em;padding-bottom: 6rem;">

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>学员评价：</label>
            <input type="hidden" name="id" value="<{$info.id}>" id="uid">
            <div class="col-xs-6 col-sm-3">
                <div id="layer-photos-demo" class="layer-photos-demo">
                    <img src="<{$info.qr_code}>" layer-src="<{$info.qr_code}>"onclick="_showBig('<{$info.qr_code}>')"alt="会员评价" id="qr_code" style="width: 100%;height: 200px;">
                </div>
            </div>
            <a class="upload">&nbsp;&nbsp;上传&nbsp;&nbsp;
                <input type="file" multiple  id="file" style="color: #0e90d2"   onchange="imgChange(event)">
            </a>
        </div>

    </form>
</article>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
    //公司历程
    function imgChange(e) {
        var dom =$("input[id^='file']")[0];
        var reader = new FileReader();
        reader.onload = (function (file) {
            return function (e) {
                $("#qr_code").attr("src",this.result);
                uploadAjax(this.result);
            };
        })(e.target.files[0]);
        reader.readAsDataURL(e.target.files[0]);
    }
   layer.ready(function (){
       layer.photos({
           photos: '#layer-photos-demo',
           shadeClose:false,
           closeBtn:2,
       });
   });
    //提交数据
   function uploadAjax(src) {
       layer.confirm('确认上传该图片?', {icon: 3, title:'提示'},
           function(index){
               $.ajax({
                   type:"POST",
                   url:'<{:url("upload")}>',
                   data:{
                       id:$("#uid").val(),
                       qr_code:src,
                   },// 你的formid
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
                               location.reload();
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
       );
   }
</script>
