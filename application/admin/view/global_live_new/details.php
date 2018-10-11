<style>
    .btn{
        margin: 0 10px;
    }
    .input-text{
        width: 200px;
    }
    .top-table{
        position: absolute;
        top: 45px;
        width: 800px;
        left: 21px;
    }
    .page-container{
        padding: 180px 20px;
    }
    .text-c {
        text-align: center;
        margin-top: 15rem;
    }
    .table tbody tr.warning, .table tbody tr.warning > td, .table tbody tr.warning > th, .table tbody tr .warning  {
        border-top-color: #fcf8e3 !important;
    }
    .table tbody tr.success, .table tbody tr.success > td, .table tbody tr.success > th, .table tbody tr .success{
        border-bottom: 1px solid #ddd;
    }
</style>

<table class="table top-table">
    <caption>直播间资料</caption>
    <tbody>
    <tr class="active">
        <td>日均在线用户</td>
        <td><{$info.day_ave}></td>
        <td>最高在线用户</td>
        <td><{$info.max}></td>
    </tr>
    <tr class="success">
        <td>人均在线时长（分钟）</td>
        <td><{$info.ave}></td>
        <td>聊天室在线人数（虚拟）</td>
        <td><input id="vir_num" value="<{$info.vir}>" onchange="editVir()"></td>
    </tr>
    <tr class="warning">
        <td colspan="3">直播间链接</td>
        <td><{$url}></td>
    </tr>
    <tr class="success">
        <td>直播背景图</td>
        <td colspan="2">
            <img src="<{$imgvalue}>" id="showImage" name="showImage" alt="" height="20" width="20" onclick ="enlargeImg('<{$imgvalue}>')" >
        </td>
        <td  style="position: relative;height: 50px;">
        	<a href="javascript:void();" style="float: left" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 上传图片</a>
            <input type="file" multiple name="file" id="file"  style="left:0; width:150px;height: 40px;float:left;opacity: 0;position: absolute;left"  onchange="imgChange(event)">
        </td>
    </tr>
    <tr class="warning">
            <td>视频：</td>
            <td><?php echo \qiNiu\QiNiuHtml::instance()->getVideoHtmlById($data['videoID'], 8)?></td>
            <td>视频封面图：</td>
            <td>
                <?php echo \qiNiu\QiNiuHtml::instance()->getImgBeUploadAndDel(
                    $data['picUrl'], '没有播放器默认图', 6, ['data-id' => $data['picID']]
                );?>
            </td>
    </tr>
    <tr class="warning">
        <td colspan="4">
            <div style="width: 100%;margin: auto;text-align: center;">
                <button onclick="ajaxupload()" type="button" class="btn btn-primary" style="margin-right:10px;">　确认上传　</button>
            </div>
        </td>
    </tr>
    </tbody>
</table>


<div id="table-search-html">
    <input type="text" class="input-text" placeholder="老师ID" id="search-userid" name="search-userid"/>
    <input type="text" class="input-text" placeholder="老师名称" id="search-username" name="search-username"/>

    <input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'dateMax\')||\'%y-%M-%d\'}',dateFmt: 'yyyy-MM-dd HH:mm'})" id="dateMin" placeholder="创建开始时间"
           class="input-text Wdate" style="width:120px;">-
    <input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'dateMin\')}',dateFmt: 'yyyy-MM-dd HH:mm'})" id="dateMax" placeholder="创建结束时间"
           class="input-text Wdate" style="width:120px;">

    <input type="submit" value="搜索" class="btn btn-success radius" onclick="adminTableRefresh()" />
</div>

<div id="table-button-html" class="hide">
    <button class="btn btn-primary" id="create_course" onclick="add(null)"> 新增 </button>
</div>

<script>

    var showImg = '',ajaxuploadUrl="/GlobalLive/ajaxUploadVideo";
    
    function loadClick(){
        $('.recommend-html').click(function () {
            var e = $(this),
                disabledListStr = '',
                id = e.data('id'),
                disabledList = e.data('disabled-list');

            for (var i in disabledList){
                if (disabledList.hasOwnProperty(i)){
                    disabledListStr += '&disabledList[]=' + disabledList[i];
                }
            }

        });

    }
    

    window['adminTableConfig'] = {
        onLoadSuccess: loadClick,
        onToggle: loadClick
    };
    window['adminTableQueryParams'] = function (){
        return {
            user_id: $('#search-userid').val(),
            teacher_name: $('#search-username').val(),
            dateMin: $('#dateMin').val(),
            dateMax: $('#dateMax').val(),
            tabName1: "<{$Think.get.tabName1??''}>",
            tabName2: "<{$Think.get.tabName2??''}>"
        };
    };

    function ajaxupload() {
        layer.confirm('确认上传已修改的视频及视频默认图？',function(index){
            $.ajax({
                type: 'POST',
                url: ajaxuploadUrl,
                data:{
                    videoPicId: $('#admin-qi-niu-upload-div-be-upload-del-2-img').data('id'),
                    videoId: $('#admin-qi-niu-upload-div-be-upload-del-1-video').data('id'),
                },// 参数
                async: false,
                dataType: 'json',
                success: function(data){
                    layer.msg(data.msg,{icon:1,time:1000});
                    setTimeout(window.location.reload(),1500);
                },
                error:function(data) {
                    console.log(data.msg);
                    setTimeout(window.location.reload(),1500);
                },
            });
        });
    }

    function editVir() {
        var v = $('#vir_num').val();
        $.ajax({
            type:"POST",
            url:'/GlobalLive/editVir',
            data:{
                id: <?=$info['id']?>,
                vir_num: v
            },// 你的formid
            async: false,
            success: function(data) {
                layer.alert('修改人数成功,返回列表后刷新数据！');
//                window.location.href = '/GlobalLive/index';
            }
        });
    }

    function imgChange(e) {
        console.info(e.target.files[0]);//图片文件
        var dom =$("input[id^='file']")[0];
        console.info(dom.value);//这个是文件的路径 C:\fakepath\icon (5).png
        console.log(e.target.value);//这个也是文件的路径和上面的dom.value是一样的
        var reader = new FileReader();
        var imgv = '';
        reader.onload = (function (file) {
            return function (e) {
               console.info(this.result); //这个就是base64的数据了
                var sss=$("#showImage");
                $("#showImage")[0].src=this.result;
                imgv = this.result;
                showImg = this.result;
                $.ajax({
                    type:"POST",
                    url:'/GlobalLive/editImg',
                    data:{
                        img: imgv
                    },
                    async: false,
                    success: function(data) {
                        // alert(data);
                        layer.alert('修改图片成功！');
        //                window.location.href = '/GlobalLive/index';
                    }
                });
                // $("#baseFile")[0].value=this.result;
            };
        })(e.target.files[0]);
        reader.readAsDataURL(e.target.files[0]);
    }

    function enlargeImg(img){
        if(showImg != ''){
            img = showImg;
        }
        layer.open({
            type: 1,
            title: false,
            shadeClose: true,
            closeBtn: 0,
            skin: 'layui-layer-nobg', //没有背景色
            content: '<img width="200" height="200" src="'+img+'" />'
        });
    }
    //新增
    function add(id) {
        title = '新增/编辑';
        url = "<{:url('detailsadd')}>?id="+id;
        w = '';
        h = '720';
        layer_show(title, url, w, h);
    }
    //删除
    function _del(id) {
        layer.confirm('确认删除该该数据？',function(index){
            $.ajax({
                type: 'POST',
                url: "<{:url('delData')}>",
                data:{
                    id:id,
                },// 参数
                async: false,
                dataType: 'json',
                success: function(data){
                    layer.msg(data.msg,{icon:1,time:1000});
                    setTimeout(window.location.reload(),1500);
                },
                error:function(data) {
                    console.log(data.msg);
                    setTimeout(window.location.reload(),1500);
                },
            });
        });
    }


</script>
