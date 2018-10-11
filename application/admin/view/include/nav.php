<{neq name="isShowNav|default=''" value="hide"}>
<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i>首页
    <span class="c-gray en">&gt;</span>

    <?php
        $tabName1 = request()->param('tabName1');
        $tabName2 = request()->param('tabName2');
        if(isset($tabName1))
            echo request()->param('tabName1');
        else
            echo '<script>document.write(getQueryString(\'tabName1\'))</script>';

        if(isset($tabName2))
            echo '<span class="c-gray en">&gt;</span>'. request()->param('tabName2');
        else
            echo '<span class="c-gray en">&gt;</span><script>document.write(getQueryString(\'tabName2\'))</script>';
    ?>
    
    <{notempty name="$thirdlyTabName"}>
    <span class="c-gray en"><{$thirdlyTabName}></span>
    <{/notempty}>
    <a class="btn btn-success radius r" style="line-height:1em;height: 2em;" href="javascript:location.replace(location.href);" title="刷新">
        <i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<{/neq}>
