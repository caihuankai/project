;(function ($) {
    $(document).ready(function () {
        $('#consult-form form').submit(function () {
            var consulting = false;
            $submitField = $('#consult-form .message-submit')
            $.ajax({
                url: '/consult',
                data: $('#consult-form form').serialize(),
                type: 'post',
                dataType: 'json',
                beforeSend: function () {
                    if (consulting == true)
                        return;
                    consulting = true;
                    $submitField.val('提交中...');
                },
                complete: function () {
                    consulting = false;
                    $submitField.val('提交留言');
                },
                success: function (result) {
                    if (result.state == 1) {
                        $.scojs_message('留言成功！', $.scojs_message.TYPE_OK);
                        $('#consult-form form')[0].reset()
                    } else if (result.state == 0) {
                        $.scojs_message(result.msg, $.scojs_message.TYPE_ERROR);
                    }
                }
            })
            return false;
        })
    })
})(jQuery)


