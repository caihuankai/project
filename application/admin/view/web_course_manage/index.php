<style>
    .btn{
        margin: 0 10px;
    }
    .input-text{
        width: 200px;
    }
    .form-select{
        width: 250px;display: inline-block;height: 31px;line-height: 30px;font-size: 13px;padding: 0px 7px 3px 7px;
    }
</style>
<!--<div id="table-button-html" class="hide">-->
<!--    <button class="btn btn-primary" id="table-button-dis"> 屏蔽 </button>-->
<!--    <button class="btn btn-primary" id="table-button-open"> 显示 </button>-->
<!--    <{eq name="$check['type']" value="1"}>-->
<!--    <button class="btn btn-primary" id="create_course" data-type="<{$check['type']}>" data-userid="<{$check['userid']}>" data-pid="<{$check['pid']}>" data-datas="<{$check['data']}>"> 创建 </button>-->
<!--    <{else/}>-->
<!--    <button class="btn btn-primary" id="create_course" data-type="<{$check['type']}>" data-datas="<{$check['data']}>"> 创建 </button>-->
<!--    <{/eq}>-->
<!--</div>-->



<script>

    var addUrl='<{:url("CourseManage/add")}>', cc = $("#create_course"),
        dataUserid = cc.data('userid'),
        dataType = cc.data('type'),
        dataAlias = cc.data('datas'),
        dataPid = cc.data('pid');
        if(dataType == 1)
        {
           var AddUrl = addUrl+"?type="+dataType+"&user_id="+dataUserid+"&alias="+dataAlias+"&pid="+dataPid;
         }else{
           var AddUrl = addUrl+"?type="+dataType+"&alias="+dataAlias;
         }


    var actionStatusHtml = <{$actionStatusHtml|json_encode}>;
    var statusMap = {1: 2, 2: 1};
    window['adminTableConfig'] = {
        onLoadSuccess: function (){

            // 操作上的状态按钮
            $('.action-status').click(function (){
                var e = $(this),
                    status = e.data('status');

                try{
                    e.data('status', statusMap[status]);
                    e.html(actionStatusHtml[status]);

                    changeStatus(e.data('ids'), status);
                }catch (e){}
            });

            $(function () {
                /**
                 * 新增
                 */
                $("#create_course").click(function () {
                    add();
                })
            });
            function add() {
                title = '新增/编辑';
                url = AddUrl;
                w = '';
                h = '710';
                layer_show(title, url, w, h);
            }

            $('.action-recommend').click(function (){
                var e = $(this),
                    disabledListStr = '',
                    id = e.data('id'),
                    disabledList = e.data('disabled-list');

                for (var i in disabledList){
                    if (disabledList.hasOwnProperty(i)){
                        disabledListStr += '&disabledList[]=' + disabledList[i];
                    }
                }

                layer_show('推荐', '<{:url("CourseManage/recommend")}>' + '?id=' + id + '&idType=' + e.data('id-type') + disabledListStr, 500, 350)
            });

            $('.action-refund').click(function (){
                var e = $(this),
                order_no = e.data('id');
                layer.confirm('确认屏蔽吗?', {icon: 3, title:'提示'},
                    function(index){
                        $.ajax({
                            type: 'POST',
                            url: '/PayOrder/refund?order_no='+order_no,
                            dataType: 'json',
                            success: function(data){
                                console.log(data);
                                if(data){
                                    layer.msg('屏蔽成功!');
                                    adminTableRefresh();
                                }else{
                                    layer.msg('屏蔽失败');
                                }
                            },
                            error:function(data) {
                                console.log(data.msg);
                            },
                        }); 
                    }
                );
            });

        }
    };

    $(function () {
        // 禁用和启用按钮
        $('#table-button-dis, #table-button-open').click(function () {
            var tr = $('input[name="btSelectItem"]:checked').parent().parent(),
                changeStatusEle = tr.find('.action-status'),
                status = $(this).is('#table-button-open') ? 1 : 2,
                ids = [];

            changeStatusEle.map(function (){
                var e = $(this);

                ids.push(e.data('ids'));
                e.data('status', statusMap[status]);
                e.html(actionStatusHtml[status]);
            });

            ids.length > 0 && changeStatus(ids, status);
        });
        
        
        
        
        
    });

    function changeStatus(ids, status){
        requestAjax({
            ids: ids,
            status: status
        }, {
            url: "<{:url('changeStatus')}>",
            localSuccess: function (){
                adminTableRefresh();
            }
        })
    }


</script>
