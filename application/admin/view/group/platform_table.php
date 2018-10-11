<div id="toolbar" class="btn-group">
  <button onclick="dealPlatform()" type="button" class="btn btn-success"
          style="margin-right: 10px">
        分配服务号
  </button>

  <button onclick="dealPlatform('clear')" type="button" class="btn btn-success"
          style="margin-right: 10px">
        清空服务号
  </button>
     &nbsp;
</div>

<{include file="group/dataTable" /}>
<script type="text/javascript">
  //  alert(getIdSelections())
  var dealPlatformUrl = '/group/dealPlatform';
  function dealPlatform(type) {
    var PlatformIds = getIdSelections();
    var res;
    if(type!="clear")
    {
      if(PlatformIds==""||PlatformIds==null||PlatformIds==undefined)
      {
        layer.msg("请选择服务号");
        return;
      }
      postDealPlatform(PlatformIds);
    }
    else
    {
      PlatformIds = [];
      layer.confirm('确认清空服务号吗?', {icon: 3, title: '提示'}, function (index) {
        layer.close(index);
        postDealPlatform(PlatformIds);
      });
    }
  }

  function postDealPlatform(PlatformIds)
  {
    $.post(dealPlatformUrl, {'id': '<{$Request.get.id}>' ,'platformIds':PlatformIds}, function (res) {
      if (res.code == 1) {
        layer.msg(res.msg, "", "success");
        var index = parent.layer.getFrameIndex(window.name);
        window.setTimeout(function(){
          parent.$("button[name='refresh']").click();
          parent.layer.close(index);
        },1000);
      } else {
        layer.msg(res.msg, "", "error");
      }
    });
  }
</script>