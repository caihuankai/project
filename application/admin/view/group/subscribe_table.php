<div id="toolbar" class="btn-group">
  <button onclick="dealSubscribe()" type="button" class="btn btn-success"
          style="margin-right: 10px">
        分配订阅号
  </button>

  <button onclick="dealSubscribe('clear')" type="button" class="btn btn-success"
          style="margin-right: 10px">
        清空订阅号
  </button>
     &nbsp;
</div>

<{include file="subscribe/dataTable" /}>
<script type="text/javascript">
//  alert(getIdSelections())
  var dealSubscribeUrl = '/group/dealSubscribe';
  function dealSubscribe(type) {
    var subscribeIds = getIdSelections();
    var res;
    if(type!="clear")
    {
      if(subscribeIds==""||subscribeIds==null||subscribeIds==undefined)
      {
        layer.msg("请选择订阅号");
        return;
      }
      postDealSubscribe(subscribeIds);
    }
    else
    {
      subscribeIds = [];
      layer.confirm('确认清空订阅号吗?', {icon: 3, title: '提示'}, function (index) {
        layer.close(index);
        postDealSubscribe(subscribeIds);
      });
    }
  }

  function postDealSubscribe(subscribeIds)
  {
    $.post(dealSubscribeUrl, {'id': '<{$Request.get.id}>' ,'subscribeIds':subscribeIds}, function (res) {
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