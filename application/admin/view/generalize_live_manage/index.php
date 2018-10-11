<style>
    .btn{
        margin: 0 10px;
    }
    .input-text{
        width: 200px;
    }
    #showbig{
        position: relative;
        top: calc(10rem - 7.6rem);
    }
</style>
<div id="table-button-html" class="hide">
    <button class="btn btn-primary" id="table-button-add">新增</button>
</div>



<script>
    var UoladUrl="./upload";
    function loadClick(){
        $('.recommend-user-flow').click(function (){
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

    
    $(function () {
        /**
         * 新增
         */
        $("#table-button-add").click(function () {
            add();
        })
    });
    //新增
    function add() {
        title = '新增';
        url = UoladUrl;
        w = '';
        h = '350';
        layer_show(title, url, w, h);
    }
    //编辑
    function _edit(id) {
        title = '上传';
        url = UoladUrl +"?id="+ id;
        w = '';
        h = '350';
        layer_show(title, url, w, h);
    }
    //删除数据
    function _delect(id) {
        layer.confirm('确认删除当前数据？',function(index){
            $.ajax({
                type: 'POST',
                url: "./delectDataByID",
                data:{
                    id:id,
                },// 参数
                async: false,
                dataType: 'json',
                success: function(data){
                    if (data.code == 200){
                        layer.msg(data.msg,{icon:1,time:1000});
                        setTimeout(window.location.reload(),1500);
                    }
                        layer.msg(data.msg,{icon:1,time:1000});
                },
                error:function(data) {
                    console.log(data.data.msg);
                    setTimeout(window.location.reload(),1500);
                },
            });
        });
    }
    //显示大图
    function _showBig(src) {
        layer.ready(function (){
            layer.photos({
                photos:{
                    "title": "图片展示", //相册标题
                    "data": [   //相册包含的图片，数组格式
                        {
                            "alt": "图片展示",
                            "src": src, //原图地址
                            "thumb": src //缩略图地址
                        }
                    ]
                },
                // shadeClose:false,
                closeBtn:2,
            });
        });
    }


</script>
