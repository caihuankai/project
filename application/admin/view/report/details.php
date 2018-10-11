<{include file="include/nav"}>




<style>
    
    .table-header{
        background: #efefef;
    }

</style>

<form action="#" method="post">

    <table class="table table-border table-bordered radius">
        <tr class="table-header">
            <td colspan="4">基本资料</td>
        </tr>

        <tr>
            <td>举报人：</td>
            <td><{$data['name']}></td>
            <td>举报时间：</td>
            <td><{$data['create_time']}></td>
        </tr>


        <tr>
            <td>被举报对象：</td>
            <td><{$data['class_name']}></td>
            <td>举报内容：</td>
            <td><{$data['content']}></td>
        </tr>
        <tr>
            <td>状态：</td>
            <td colspan="3">
                <{$data['statusHtml']}>
                <span>
                    （处理结果：
                <?php
                    if (!empty($data['status']) && $data['status'] == 3) {
                        $echoHtml = [];
                        foreach ($action as $key =>$item) {
                            if (($key & $data['result']) == $key) {
                                $echoHtml[] = $item;
                            }
                        }
                        
                        if (!empty($echoHtml)){
                            echo join(' ', $echoHtml);
                        }else{
                            echo '无';
                        }
                    }
                
                ?>
                    ）
                </span>
            </td>
        </tr>
        
        <{eq name="$data['status']" value="1"}>
        <tr>
            <td>操作：</td>
            <td colspan="3"><{checkbox data="$action" name="action"}></td>
        </tr>
        <{/eq}>
        
    </table>



    <div class="text-c">
        <{eq name="$data['status']" value="1"}>
            <input type="submit" class="btn btn-primary" title="保存" value="保存" />
        <{else /}>
            <input type="submit" class="btn btn-primary" title="返回" value="返回" onclick="history.go(-1)" />
        <{/eq}>
    </div>

</form>






