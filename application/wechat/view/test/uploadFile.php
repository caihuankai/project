<script src="https://cdn.bootcss.com/jquery/3.1.1/jquery.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">


<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
    wx.config($.extend(JSON.parse('<{$weChatConfig}>'), {debug: false}));
</script>


<script>
    wx.ready(function(){
        
        wx.checkJsApi({
            jsApiList: ['chooseImage'], // 需要检测的JS接口列表，所有JS接口列表见附录2,
            success: function(res) {
                // 以键值对的形式返回，可用的api值true，不可用为false
                // 如：{"checkResult":{"chooseImage":true},"errMsg":"checkJsApi:ok"}
                
                console.log(res);
            }
        });
        
        
        document.getElementById('upload').onclick = function () {
//            alert(typeof wx.chooseImage);
            
            
            
            
            
            
            var a = wx.chooseImage({
                count: 1, // 默认9
                sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
                sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
                success: function (res) {
                    var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
                    alert(res.tempFilePaths);
                    
//                    alert(localIds);
                    console.log(localIds);
                    for (var i in localIds){

                        wx.uploadImage({
                            localId: localIds[i], // 需要上传的图片的本地ID，由chooseImage接口获得
                            isShowProgressTips: 1, // 默认为1，显示进度提示
                            success: function (res) {
                                var serverId = res.serverId; // 返回图片的服务器端ID
                                
                                console.log(res);
                                $('#text').html(serverId);
                            }
                        });
                        
                        
                        
                        $('#img').attr('src', localIds[i]);
                    }
                }
            });
            
//            alert(a);
            
            console.log(11);
        }
    });
</script>




<div id="upload" style="font-size: 30px">上传</div>

<img id="img" src="" alt="" width="100%">

<div id="text"></div>

4a65sd3as1

a4sd6a5s

