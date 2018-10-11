<style>
    #main-edit {
        padding: 0 5%;
    }

    .form-label {
        text-align: right;
    }

    fieldset {
        border: 1px solid black;
        padding: 2%;
    }

    .row.cl {
        margin-bottom: 1%;
    }
</style>
<script type="text/javascript" src="/lib/My97DatePicker/WdatePicker.js"></script>


<div id="main-edit">
    <dl>
        <dt>注意事项：</dt>
        <dd>
            &emsp;&emsp;请开通服务的管理人员校验转账记录，便于以后确认！！
        </dd>
    </dl>
    <fieldset>
        <input type="hidden" id="id" name="id" value="<{$id??0}>"/>
        <div class="row cl">
            <label for="alias" class="form-label col-xs-3 col-sm-2">用户ID：</label>
            <div class="formControls col-xs-9 col-sm-10">
                <input <{notempty name="data['user_id']"}>readonly<{/notempty}> type="text" class="input-text"
                id="user_id" name="user_id" value="<{$data['user_id']??0}>"/>
            </div>
        </div>
        <div class="row cl">
            <label for="grade" class="form-label col-xs-3 col-sm-2">开通服务：</label>
            <div class="formControls col-xs-9 col-sm-10">
                <span class="select-box">
                    <select class="select" name="grade" id="group_vip_id">
                        <{foreach name="groupVip" item="grade" key="val"}>
                            <option value="<{$grade.id}>"
                                <{if isset($data['user_level']) && $data['user_level'] eq $val || (empty($data) && $val == 2)}>
                                    selected
                                <{/if}>
                            >
                           <{$grade.name}>(<{$grade.deadline}>天)
                        </option>
                        <{/foreach}>
                    </select>
                </span>
            </div>
        </div>
        <{notempty name="data['user_id']"}>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>到期日期：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" onfocus="WdatePicker({skin:'whyGreen',dateFmt:'yyyy-MM-dd'})" id="dead_time"
                       name="dead_time" class="input-text Wdate" style="width:120px;"
                       value="<{$data['dead_time']??''}>">
            </div>
        </div>
        <{/notempty}>
        <div class="row cl">
            <label for="reason" class="form-label col-xs-3 col-sm-2">操作原因：</label>
            <div class="formControls col-xs-9 col-sm-10">
                <input type="text" class="input-text" id="reason" name="reason" value="<{$data['reason']??''}>"/>
            </div>
        </div>

        <br/>
        <div class="row cl">
            <div class="col-xs-9 col-sm-10 col-xs-offset-3 col-sm-offset-2">
                <input id="submit-btn" class="btn btn-primary radius button" type="submit" value="提交">
            </div>
        </div>
    </fieldset>
</div>
<script>
    var action = "<{$action}>";
    $("#submit-btn").click(function () {

        $.ajax({
            url: "./" + action,
            type: "post",
            dataType: "json",
            data: {
                user_id: $("#user_id").val(),
                group_vip_id: $("#group_vip_id").val(),
                reason: $("#reason").val(),
                amount: $("#amount").val(),
                dead_time: $("#dead_time").val(),
                id: $("#id").val()
            },
            success: function (data) {
                layer.msg(data.msg);
                if (data.code == 1) {
                    var index = parent.layer.getFrameIndex(window.name);
                    parent.$table.bootstrapTable('refresh');
                    parent.layer.close(index);
                }
            }
        });
    });
</script>






















