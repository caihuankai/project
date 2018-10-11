<script src="https://cdn.bootcss.com/jquery/3.1.1/jquery.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">

<input style="width: 100%" type="text" value="http://test.talk.99cj.com.cn/" id="url" />
<br />
<textarea style="width: 100%;height: 40%" id="json"></textarea>



<button id="submit">提交</button>


<div id="error"></div>

<div id="success"></div>

<script>
    
    
    try{
        document.getElementById('submit').onclick = function (){
            
            $.ajax({
                type: "POST",
                url: document.getElementById('url').value,
                data: JSON.parse(document.getElementById('json').value.trim()),
                success: function (){
                    document.getElementById('success').innerHTML = 'aaaa';
                }
            });
        };
    }catch (e){
        console.log(e);
        var html = '';
        for (var i in e ){
            html +='<div>' + e[i] + '</div>';
        }

        document.getElementById('error').html(html);
    }
    
</script>
