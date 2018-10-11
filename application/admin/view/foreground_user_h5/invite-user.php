<{// @see application/admin/view/foreground_user/details.php}>
<style>
    #invite-user-table{
        display: none;
        width: 60%;
        max-height: 600px;
        position: absolute;
        overflow: hidden;
        background: white;
        z-index: 20;
        left: 25%;
        top: 20%;
    }
    #invite-user-table.top-min{
        top: 250px;
    }
    #invite-user-table-shade{
        display: none;
        width: 100%;
        height: 100%;
        background: #efefef;
        opacity: 0.5;
        position: absolute;
        z-index: 10;
        left: 0;
        top: 0;
    }
    #invite-user-table-header{background: #cccccc; line-height: 39px;}
    #invite-user-table-header>input{
        width: 80%;
        border: 1px solid;
    }
    #invite-user-table-body{overflow-y: scroll; max-height: 400px}
</style>

<div id="invite-user-table-shade"></div>
<div id="invite-user-table">
    <div id="invite-user-table-header">
        <input type="text" title="搜索" placeholder="搜索" class="input-text loadingClass" />
        <i class="f-r f-26 icon Hui-iconfont Hui-iconfont-del pointer invite-user-table-close"></i>
    </div>
    <div id="invite-user-table-body"></div>
    <div id="invite-user-table-footer" class="text-c mt-20 mb-10">
        <button class="btn btn-primary" id="invite-user-table-submit">确定</button>
        <button class="btn btn-primary invite-user-table-close">取消</button>
    </div>
</div>


<script>
    [inviteUserTableShow, inviteUserTableHide] = (function () {
        var shade = $('#invite-user-table-shade'),
            div = $('#invite-user-table'),
            body = $('#invite-user-table-body'),
            userFunc = null,
            func = function (func, alias){
                if (typeof func === 'function'){
                    userFunc === null && (userFunc = func);
                }else if (func > 0 && typeof userFunc === 'function'){
                    userFunc(func, alias);
                }
            };
        
        function show(){
            shade.show();
            
            if ($(document.body).height() > 600){
                div.addClass('top-min');
            }
            
            div.show();
            
            return func;
        }
        function hide(){
            shade.hide();
            div.hide();
        }
        
        // 关闭窗口
        $('.invite-user-table-close').click(hide);
        
        // 提交
        $('#invite-user-table-submit').click(function () {
            var input = body.find('input[name="user"]:checked');

            func(input.val(), input.data('alias'));
            hide();
        });
        
        $('#invite-user-table-header').children('input').focusout(function () {
            requestAjax({
                search: $(this).val()
            }, {
                url: "<{:url('ForegroundUser/ajaxSearchUser')}>",
                localSuccess: function (data){
                    if (data){
                        var html = '';
                        
                        html += '<table class="table table-border table-bordered radius">';
                        html += '<thead><tr><th>选择</th><th>ID</th><th>昵称</th></tr></thead>';
                        html += '<tbody>';
                        
                        for (var i in data){
                            if (data.hasOwnProperty(i)) {
                                html += '<tr>';
                                html += '<td><input data-alias="'+data[i]['alias']+'" type="radio" name="user" value="'+data[i]['user_id']+'" /></td>';
                                html += '<td>'+data[i]['user_id']+'</td>';
                                html += '<td>'+data[i]['alias']+'</td>';
                                html += '</tr>';
                            }
                        }
                        
                        html += '</tbody>';
                        html += '</table>';
                        
                        body.html(html);
                        html = '';
                    }
                }
            })
        });
        
        return [
            show,hide
        ];
    })();
    
</script>



