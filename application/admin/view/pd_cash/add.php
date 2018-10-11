<form id="adsForm" action="/ads/add" enctype="multipart/form-data" method="post">
<table class='talk-form talk-box-top'>   
       <tr>
          <th>广告标题<font color='red'>*</font>：</th>
          <td>
            <input type="text" id="adName" name="adName" value='' class="ipt" />
          </td>
       </tr>
	   
	   <tr>
          <th>广告图片<font color='red'>*</font>：</th>
          <td>
			 <input id="files" type="file" name="file" onchange="previewImage(this, 'prvid')" multiple="multiple">
			<!--
　　         <div id="prvid">预览</div>
			-->
          </td>
       </tr>
	   
	   <tr>
          <th>图片预览：</th>
          <td>
　　         <div id="prvid"></div> 
          </td>
       </tr>
	   
	   <tr>
          <th>广告网址<font color='red'>*</font>：</th>
          <td>
            <input type="text" id="adURL" name="adURL" value='' class="ipt" />
          </td>
       </tr>
	   
	   <tr>
          <th>广告开始时间<font color='red'>*</font>：</th>
          <td>
            <input type="text" id="adStartDate" name="adStartDate" value='' class="ipt" />
          </td>
       </tr>
	   
       <tr>
          <th>广告结束时间<font color='red'>*</font>：</th>
          <td>
            <input type="text" id="adEndDate" name="adEndDate" value='' class="ipt" />
          </td>
       </tr>
	   
       <tr>
          <th>广告排序号<font color='red'> </font>：</th>
          <td>
            <input type='text' id='adSort' name="adSort" value='' class='ipt' maxLength='10'/>
          </td>
       </tr>
	      
  <tr>
     <td colspan='2' align='center'>
       <input type="hidden" name="Id" id="adId" class="ipt" value="" />
       <input type="submit" value="提交" class='btn btn-blue' />
       <input type="button" onclick="javascript:history.go(-1)" class='btn' value="返回" />
     </td>
  </tr>
</table>
</form>

<script>
function previewImage(file, prvid) {
   /* file：file控件 
	* prvid: 图片预览容器 
	*/
    var tip = "Expect jpg or png or gif!"; // 设定提示信息 
    var filters = {
        "jpeg": "/9j/4",
        "gif": "R0lGOD",
        "png": "iVBORw"
    }
    var prvbox = document.getElementById(prvid);
    prvbox.innerHTML = "";
    if (window.FileReader) { // html5方案 
        for (var i = 0,
        f; f = file.files[i]; i++) {
            var fr = new FileReader();
            fr.onload = function(e) {
                var src = e.target.result;
                if (!validateImg(src)) {
                    alert(tip)
                } else {
                    showPrvImg(src);
                }
            }
            fr.readAsDataURL(f);
        }
    } else { // 降级处理
        if (!/\.jpg$|\.png$|\.gif$/i.test(file.value)) {
            alert(tip);
        } else {
            showPrvImg(file.value);
        }
    }

    function validateImg(data) {
        var pos = data.indexOf(",") + 1;
        for (var e in filters) {
            if (data.indexOf(filters[e]) === pos) {
                return e;
            }
        }
        return null;
    }

    function showPrvImg(src) {
        var img = document.createElement("img");
        img.src = src;
        prvbox.appendChild(img);
    }
}
</script>
