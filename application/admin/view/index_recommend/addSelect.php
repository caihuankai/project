


<script>
    var errorMsg = "<{$errorMsg}>";
    if (errorMsg) {
        layer.msg(errorMsg);
        history.go(-1);
    }else{
        parent.location.reload();
        layer_close();
    }
    
    
</script>