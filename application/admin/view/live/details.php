
<{include file="include/nav"}>


<style>
    
    .table-header{
        background: #efefef;
    }
    #live-img>img{
        width: 90px;
        height: 90px;
    }
    #live-back-img>img{
        width: 290px;
        height: 112px;
    }
    #live-pass{
        width: 180px;
    }
</style>

<form action="<{:url('saveData')}>" method="post" id="form">

    <table class="table table-border table-bordered radius">

        <tr class="table-header">
            <td colspan="4">
                直播间资料
            </td>
        </tr>

        <tr>
            <td>创建人：</td>
            <td><{$data['username']}></td>
            <td>创建时间：</td>
            <td><{$data['create_time']}></td>
        </tr>
        <tr>
            <td>日均在线用户：</td>
            <td><{$data['dayCount']}></td>
            <td>最高在线用户：</td>
            <td><{$data['maxCount']}></td>
        </tr>
        <tr>
            <td>人均在线时长（分钟）：</td>
            <td><{$data['avgTime']}></td>
            <td>点赞（人气值）：</td>
            <td><{$data['likedNum']}></td>
        </tr>
        <tr>
            <td>礼点：</td>
            <td><{$data['admireMoney']}></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>直播间链接：</td>
            <td><{$data['liveUrl']}></td>
            <td><label for="virtual-num">聊天室在线人数（虚拟）：</label></td>
            <td><input id="virtual-num" name="virtual-num" class="c-red" type="text" value="<{$data['virtual_num']}>"></td>
        </tr>
        <tr>
            <td rowspan="2">Live直播间主题：</td>
            <td rowspan="2"><input id="live-theme" type="text" class="input-text" value="<{$data['theme']}>" maxlength="60"></td>
            <td rowspan="1">Live直播间密码：</td>
            <td rowspan="1">

                <input type="radio"  name="pass" <{if condition="$data['password'] == ''"}>checked="checked"<{/if}>  value="1"><label style="width:3.5rem;">无</label>

                <input type="radio"  name="pass" <{if condition="$data['password'] != ''"}>checked="checked"<{/if}>  value="2"><label style="width:3.5rem;">有</label>
                <input id="live-pass" type="number" class="input-text" name="live-pass" placeholder="live直播间密码" maxlength="4" <{if condition="$data['password'] == ''"}> value=""  style="display: none;"<{else\}>value="<{$data['password']}>"<{/if}>>

            </td>
        </tr>

        <tr class="adaptbox" <{if condition="$data['password'] == ''"}>style="display: none;"<{/if}>>
            <td >密码适用的平台：</td>
        <{if condition="$data['password'] == ''"}>
        <td>
            <label ><input type="checkbox"  checked="checked" name="adapt" value="1"><label>公众号</label></label>
            <label ><input type="checkbox"  checked="checked" name="adapt" value="2"><label >小程序</label></label>
            <label ><input type="checkbox"  checked="checked" name="adapt" value="3"><label >移动端（IOS/Android）</label></label>
        </td>
        <{else\}>
        <td>
        <label ><input type="checkbox" <{if condition="$data['adaptData']['weixin'] == true"}>checked="checked"<{/if}> name="adapt" value="1"><label>公众号</label></label>
        <label ><input type="checkbox" <{if condition="$data['adaptData']['applet'] == true"}>checked="checked"<{/if}> name="adapt" value="2"><label >小程序</label></label>
        <label ><input type="checkbox" <{if condition="$data['adaptData']['mobile'] == true"}>checked="checked"<{/if}> name="adapt" value="3"><label >移动端（IOS/Android）</label></label>
        </td>
        <{/if}>
        </tr>
    </table>

    <table class="table table-border table-bordered radius">

        <tr class="table-header">
            <td colspan="4">
                Live直播课程数据
            </td>
        </tr>


        <tr>
            <td>推荐课程：</td>
            <td><{$data['courseRecommendNum']}></td>
            <td>推荐课程总点击量：</td>
            <td><{$data['courseRecommendInNum']}></td>
        </tr>
        <tr>
            <td>推荐课程购买：</td>
            <td><{$data['courseRecommendBuyNum']}></td>
            <td>推荐课程成交总金额：</td>
            <td><{$data['courseRecommendMoneyNum']}></td>
        </tr>
    </table>



    <table class="table table-border table-bordered radius">

        <tr class="table-header">
            <td colspan="4">
                Live直播观点数据
            </td>
        </tr>


        <tr>
            <td>推荐观点：</td>
            <td><{$data['viewpointRecommendNum']}></td>
            <td>推荐观点总点击量：</td>
            <td><{$data['viewpointRecommendInNum']}></td>
        </tr>
        <tr>
            <td>推荐观点购买：</td>
            <td><{$data['viewpointRecommendBuyNum']}></td>
            <td>推荐观点成交总金额：</td>
            <td><{$data['viewpointRecommendMoneyNum']}></td>
        </tr>
    </table>

    <div class="text-c">
        <input type="submit" class="btn btn-primary" value="保存" />
        <input type="reset" class="btn btn-primary" id="button-reset" value="返回" />
    </div>
</form>

<script>

    var checkbox = $("input:checkbox[name='adapt']:checked").map(function(index,elem) {
        return $(elem).val();
    }).get().join(','),
        passstatus=$('input:radio[name="pass"]:checked').val(),
        pass = $("#live-pass").val();//参数

    $('#form').validate({
        rules:{
            'virtual-num':{
                digits:true,
                min:0
            }
        },
        onkeyup:false, // 在 keyup 时验证
        focusCleanup:true, // 如果是 true 那么当未通过验证的元素获得焦点时，移除错误提示。避免和 focusInvalid 一起用。
        submitHandler:function (form,event){
            passstatus=$('input:radio[name="pass"]:checked').val(), pass = $("#live-pass").val();
            if (passstatus == 2){
                if (pass.length != 4){
                    layer.msg('密码位数为4位!');
                    return;
                }
                if (checkbox.length < 1){
                    layer.msg('至少选择一个适用平台!');
                    return;
                }
            }

            requestAjax({
                id: '<{$data["id"]}>',
                virtualNum: $('#virtual-num').val(),
                theme: $('#live-theme').val(),
                pass:pass,
                passstatus:passstatus,
                adapt:checkbox,
            },{
                url: "<{:url('saveData')}>",
                localSuccess: function (e){
                    if(e == 2) {
                        $("#account-balance").html("0.00");
                    }
                    layer.msg('提交成功');
                }
            });
        }
    });

    $('#button-reset').click(function () {
        history.go(-1);
    });

    $(function (){
        $('input[type=radio][name=pass]').change(function() {
            if (this.value == '1') {
                $(".adaptbox").hide();
                $("#live-pass").hide();
            }
            else if (this.value == '2') {
                $(".adaptbox").show();
                $("#live-pass").show();
            }
        });
        $("input:checkbox[name='adapt']").change(function (){
            checkbox = $("input:checkbox[name='adapt']:checked").map(function(index,elem) {
                return $(elem).val();
            }).get().join(',');
        })
    })
    
</script>


