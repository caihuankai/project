<style>
    .formpos{
        padding: 9% 0px 0px 11%;
    }
    .ppos{
        padding: 8% 0px 0px 9%;
    }
</style>
<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i>
    首页 <span class="c-gray en">&gt;</span>
    评论审核开关管理
    <a class="btn btn-success radius r" style="line-height:1em;height: 2em;" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>

<form action="#" method="post" id="form" class="form-horizontal formpos">
    <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-1">评论审核开关：</div><br>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">课程聊天室：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <label><input type="radio" name="courseStatus" value="1" <{eq name="$courseStatus" value="1"}>checked<{/eq}>>开启</label>
            &nbsp;
            <label><input type="radio" name="courseStatus" value="0" <{eq name="$courseStatus" value="0"}>checked<{/eq}>>关闭</label>
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">Live直播聊天室：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <label><input type="radio" name="liveStatus" value="1" <{eq name="$liveStatus" value="1"}>checked<{/eq}>>开启</label>
            &nbsp;
            <label><input type="radio" name="liveStatus" value="0" <{eq name="$liveStatus" value="0"}>checked<{/eq}>>关闭</label>
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">课程详情页：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <label><input type="radio" name="courseDetailStatus" value="1" <{eq name="$courseDetailStatus" value="1"}>checked<{/eq}>>开启</label>
            &nbsp;
            <label><input type="radio" name="courseDetailStatus" value="0" <{eq name="$courseDetailStatus" value="0"}>checked<{/eq}>>关闭</label>
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">观点详情页：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <label><input type="radio" name="viewPointStatus" value="1" <{eq name="$viewPointStatus" value="1"}>checked<{/eq}>>开启</label>
            &nbsp;
            <label><input type="radio" name="viewPointStatus" value="0" <{eq name="$viewPointStatus" value="0"}>checked<{/eq}>>关闭</label>
        </div>
    </div>
    <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
        <input class="btn btn-primary" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
    </div>
</form>


<div class="ppos">
    <p>1.评论审核开关为“<span style="color: green">开</span>”，<span style="color: red">老师、助教、嘉宾、马甲</span>的留言评论或者回复均不用审核可直接显示至前台；学生、流量主的留言评论回复均需要审核后显示。</p>

    <p>2.评论审核开关为“<span style="color: red">关</span>”，留言评论或者回复发表后直接可以显示至聊天室的墙上</p>
</div>