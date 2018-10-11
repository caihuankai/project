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
    var addUrl="./add";
    var changeStatusUrl="./changeStatus";
    var delectUrl="./delect";
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

    
    $(function(){
        /**
         * 新增表情
         */
        $("#table-button-add").click(function () {
            add();
        });
    });
    function add() {
        title = '新增/编辑';
        url = addUrl;
        w = '';
        h = '510';
        layer_show(title, url, w, h);
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
                closeBtn:2,
            });
        });
    }
    function _edit(id) {
        title = '编辑';
        url = addUrl +"?id="+ id;
        w = '';
        h = '510';
        layer_show(title, url, w, h);
    }
    //删除数据
    function _delect(id) {
        layer.confirm('确认需要删除？',function(index){
            $.ajax({
                type: 'POST',
                url: delectUrl,
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
    //更改状态
    function _changeStatus(id,status) {
        layer.confirm('确认需要更改该状态？',function(index){
            $.ajax({
                type: 'POST',
                url: changeStatusUrl,
                data:{
                    id:id,
                    status:status
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
