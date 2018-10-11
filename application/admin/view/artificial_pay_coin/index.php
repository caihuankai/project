<style>
    .btn{
        margin: 0 10px;
    }
    .input-text{
        width: 200px;
    }
    .form-select{
        width: 250px;display: inline-block;height: 31px;line-height: 30px;font-size: 13px;padding: 0px 7px 3px 7px;
    }
</style>

<div id="table-button-html" class="hide">
    <button class="btn btn-primary" id="table-button-add"> 充值 </button>
</div>



<script>
    var addUrl="./payCoin";//礼点充值地址
    $(function () {
        /**
         * 充值
         */
        $("#table-button-add").click(function () {
            add();
        })
    });

    function add() {
        title = '礼点充值';
        url = addUrl;
        w = '';
        h = '510';
        layer_show(title, url, w, h);
    }


</script>
