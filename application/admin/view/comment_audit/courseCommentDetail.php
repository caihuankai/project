
<style>
    .input-text{
        width: 200px
    }
    .panel-collapse{
        padding-left: 55px;
    }
    a:hover{
       text-decoration: none;
    }

</style>

<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i>
    首页 <span class="c-gray en">&gt;</span>
    课程聊天室评论列表
    <span class="c-gray en">&gt;</span>
    评论详情
    <a class="btn btn-success radius r" style="line-height:1em;height: 2em;" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>

<div class="page-container">
<div class="text-c" id="table-search">
    <form class="form form-horizontal" id="form-search" action="/CommentAudit/courseCommentDetail" method="post">

    <input type="hidden" name="msgid" value="<{$msgid}>">
        <input type="hidden" name="groupid" value="<{$groupid}>">
    <input type="text" class="input-text" placeholder="用户昵称" name="username" value="<{$search['username']}>">
    <input type="text" class="input-text" placeholder="内容" name="content" value="<{$search['content']}>">

    <input type="text" name="dateMin" value="<{$search['dateMin']}>" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'dateMax\')||\'%y-%M-%d\'}'})" id="dateMin" placeholder="开始时间" class="input-text Wdate" style="width:120px;">-
    <input type="text" name="dateMax" value="<{$search['dateMax']}>" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'dateMin\')}'})" id="dateMax" placeholder="结束时间" class="input-text Wdate" style="width:120px;">

<!--    <input type="submit" value="搜索" class="btn btn-success radius" onclick="javascript:location.replace(location.href)">-->
    <input type="submit" value="搜索" class="btn btn-success radius">
    </form>
</div>
</div>

<br/>
<br/>
<div style="width: 1200px;padding-left: 25%;">

<div class="panel panel-default">
    <div class="panel-heading" id="1">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="text-decoration: none;">
                <div>
                    <img style="width: 50px;height: 50px;" src="<{$master['head_add']}>" class="img-circle">
                    <span style="color: #66CCFF"><{$master.alias}></span>&nbsp;&nbsp;&nbsp;
                    <span><{$master['createtime']|date="y-m-d H:i:s",###}></span>
                    <a onclick="actionType(<?=$master['groupid']?>, 'gossip', <?=$master['user_id']?>, 1, 1)">禁言</a>
                    <a onclick="actionType(<?=$master['id']?>, 'changeStatus', <?=$master['state']?>, 2, 1)"><{if condition="$master.state == 1"}><span style="color: red">屏蔽</span><{else /}>显示<{/if}></a>
                    <a onclick="actionType(<?=$master['msgid']?>, 'reply', <?=$master['groupid']?>, <?=$master['user_id']?>, 1)">回复</a>
                    <a onclick="actionType(<?=$master['id']?>, 'del', 0, 1, 1)">删除</a>
                </div>
                <div style="padding-left: 56px;"><{$master['content']}></div>
            </a>
        </h4>
    </div>

    <div id="collapseOne" class="panel-collapse collapse in">

        <{volist name="reply" id="v"}>
        <div class="panel-body">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                <div>
                    <span style="color: #66CCFF"><{$v.alias}></span>&nbsp;&nbsp;&nbsp;
                    <span><{$v.createtime|date="y-m-d H:i:s",###}></span>
                    <a onclick="actionType(<?=$v['groupid']?>, 'gossip', <?=$v['user_id']?>, 1, 1)">禁言</a>
                    <a onclick="actionType(<?=$v['id']?>, 'changeStatus', <?=$v['state']?>, 2, 2)"><{if condition="$v.state == 1"}><span style="color: red">屏蔽</span><{else /}>显示<{/if}></a>
                    <a onclick="layer.msg('前端暂不支持对回复再做回复')">回复</a>
                    <a onclick="actionType(<?=$v['id']?>, 'del', 0, 1, 1)">删除</a>
                </div>
                <div style="padding-left: 56px;"><{$v.content}></div>
            </a>
        </div>
        <{/volist}>

    </div>

</div>

</div>


<script>

    /**
     * 操作栏
     * @param id
     * @param url 禁言，屏蔽，回复，删除
     * @param typeId
     * @param live
     * @param parent
     */
    function actionType(id, url, typeId, live, parent) {
        var postUrl = '/CommentAudit/'+url;

        switch (url){
            case 'reply':
                layer_show('回复', postUrl + '?pid='+id + '&groupid=' + typeId + '&uid=' + live, 600,400);
                break;
            case 'del':
                layer.confirm('确认删除？', function (){
                    requestAjax({
                        ids: [id]
                    }, {
                        url: postUrl,
                        success: function(data){
                            if(data.code == 0){
                                layer.msg(data.msg);
                                location.replace(location.href);
                            }else{
                                layer.msg('失败');
                            }
                        }
                    });
                });
                break;
            case 'changeStatus':
                if(typeId == 1){
                    typeId = 2;
                }else{
                    typeId = 1;
                }
                requestAjax({
                    ids: [id],
                    status: typeId,
                    live: live,
                    parent: parent
                }, {
                    url: "<{:url('changeStatus')}>",
                    success: function (json){
                        if(json.code == 200){
                            layer.msg('成功');
                            location.replace(location.href);
                        }else{
                            layer.msg(json.msg);
                        }
                    }
                });
                break;
            case 'gossip':
                requestAjax({
                    room_id: id,
                    user_id: typeId,
                    live: 2
                }, {
                    url: postUrl,
                    success: function (json){
                        if(json.code == 200){
                            layer.msg(json.msg);
                        }else{
                            layer.msg('失败');
                        }

                    }
                });
                break;
        }

    }
</script>




