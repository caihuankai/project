<style>
    #main-edit{padding: 0 5%;}
    .form-label{text-align: right;}
    fieldset{border: 1px solid black;padding: 2%;}
    .row.cl{margin-bottom: 1%;}
</style>

<div id="main-edit">
    <dl>
        <dt>注意事项：</dt>
        <dd>
            &emsp;&emsp;请开号的管理人员自己做好开号记录，包括对方信息，开号时间，所开号码，便于以后确认！！
        </dd>
    </dl>

    
    
    <form id="main-form" action="" method="post" >
        <fieldset>
            <input type="hidden"  name="userId" value="<{$data['user_id']??0}>" />
            <div class="row cl">
                <label for="tel" class="form-label col-xs-3 col-sm-2">手机号：</label>
                <div class="formControls col-xs-9 col-sm-10">
                    <input type="text" title="手机号必填" name="tel" class="input-text" id="tel" value="<{$data['tel']??''}>"
                        <{$data['tel']?'disabled':''}>
                    />
                </div>
            </div>
            <div class="row cl">
                <label for="alias" class="form-label col-xs-3 col-sm-2">用户昵称：</label>
                <div class="formControls col-xs-9 col-sm-10">
                    <input type="text" class="input-text" id="alias" name="alias" value="<{$data['alias']??''}>" />
                </div>
            </div>
            <div class="row cl">
                <label for="grade" class="form-label col-xs-3 col-sm-2">用户等级：</label>
                <div class="formControls col-xs-9 col-sm-10">
                <span class="select-box">
                    <select class="select" name="grade" id="grade">
                        <{foreach name="liveGrade" item="grade" key="val"}>
                            <option value="<{$val}>"
                                <{if isset($data['user_level']) && $data['user_level'] eq $val || (empty($data) && $val == 2)}>
                                    selected
                                <{/if}>
                            >
                                <{$grade}>
                            </option>
                        <{/foreach}>
                    </select>
                </span>
                </div>
            </div>
            <div class="row cl">
                <label for="password" class="form-label col-xs-3 col-sm-2">密码：</label>
                <div class="formControls col-xs-9 col-sm-10">
                    <input type="text" class="input-text" id="password" name="password"
                           value="<{$password}>" />
                </div>
            </div>
            <div class="row cl">
                <label for="name" class="form-label col-xs-3 col-sm-2">姓名：</label>
                <div class="formControls col-xs-9 col-sm-10">
                    <input type="text" class="input-text" id="name" name="name" value="<{$data['adminManageName']??''}>" />
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-3 col-sm-2">性别：</label>
                <div class="formControls col-xs-9 col-sm-10" id="gender">
                    <div class="radio-box">
                        <input type="radio" id="radio-1" class="" name="gender"
                        <{$data['gender'] == 1 ?'checked':''}>
                        value="1" />
                        <label for="radio-1">男</label>
                    </div>
                    <div class="radio-box">
                        <input type="radio" id="radio-2" class="" name="gender"
                        <{php}>echo isset($data['gender']) && $data['gender'] == 2?'checked':''<{/php}>
                        value="2" />
                        <label for="radio-2">女</label>
                    </div>
                    <div class="radio-box">
                        <input type="radio" id="radio-3" class="" name="gender" <{$data['gender'] == 0 || empty($data) ?'checked':''}> value="0" />
                        <label for="radio-3">未知</label>
                    </div>
                </div>
            </div>
            <div class="row cl">
                <label for="reason" class="form-label col-xs-3 col-sm-2">操作原因：</label>
                <div class="formControls col-xs-9 col-sm-10">
                    <input type="text" class="input-text" id="reason" name="reason" value="<{$data['reason']??''}>" />
                </div>
            </div>
    
            <br />
            <div class="row cl">
                <div class="col-xs-9 col-sm-10 col-xs-offset-3 col-sm-offset-2">
                    <input class="btn btn-primary radius button" type="submit" value="提交">
                </div>
            </div>
        </fieldset>
    </form>
    
    
</div>


<script>

    $(function(){
        var form = $('#main-form'),
            passwordLength = [6, 16];

        var formValidate = form.validate({
            onsubmit: true,// 是否在提交是验证
            onkeyup: false,
            focusCleanup: true,
            focusInvalid: false,
            rules: {
                userId: {
                    digits: true
                },
                tel: {
                    required: true,
                    number: true,
                    rangelength: [11, 11],
                    remote: { // addMethod失败
                        url: '/Member/checkExistTel', // url函数失败， url('/Member/checkExistTel')
                        data: {                     //要传递的数据
                            tel: function () {
                                return $("#tel").val();
                            }
                        }
                    }
                },
                alias: {
                    required: true,
                    maxlength: 30
                },
                grade: {
                    required: true,
                    digits: true
                },
                password: {
                    required: true,
                    rangelength: passwordLength
                },
                name: {
                    maxlength: 30
                },
                reason: {
                    required: true,
                    maxlength: 250
                }
            },
            messages: {
                tel: {
                    number: '手机号必须为数字',
                    rangelength: '<{$Think.lang.err_tel}>',
                    addCheckExistsUserId: '已存在'
                },
                alias: {
                    maxlength: '昵称最长30'
                },
                password: '<{$Think.lang.err_pwd_fail}>',
                name: '姓名最长30',
                reason: '操作原因最长250'
            },
            submitHandler: function (form) {
                console.log(11111);
                var param = $("#main-form").serialize();
                $.ajax({
                    url: "./edit",
                    type: "post",
                    dataType: "json",
                    data: param,
                    success: function (result) {
                        var index = parent.layer.getFrameIndex(window.name);
                        parent.$table.bootstrapTable('refresh');
                        parent.layer.close(index);
                    }
                });
            },
            invalidHandler: function (form, validator) {  //不通过回调
                return false;
            }
        });

    });
    
</script>






















