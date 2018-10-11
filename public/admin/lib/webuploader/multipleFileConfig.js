var userInfo = {userId:"kazaff", md5:""};   //用户会话信息
            var chunkSize = 1000 * 1024;        //分块大小
            var uniqueFileName = null;          //文件唯一标识符
            var md5Mark = null;
            WebUploader.Uploader.register({
                "before-send-file": "beforeSendFile"
                , "before-send": "beforeSend"
                , "after-send-file": "afterSendFile"
            }, {
                beforeSendFile: function(file){
                    //秒传验证
                    var task = new $.Deferred();
                    var start = new Date().getTime();
                    (new WebUploader.Uploader()).md5File(file, 0, 1024*1024*1024).progress(function(percentage){
                    }).then(function(val){
                        md5Mark = val;
                        userInfo.md5 = val;

                        $.ajax({
                            type: "POST"
                            , url: backEndUrl
                            , data: {
                                status: "md5Check"
                                , md5: val
                                // , is_thum:1
                                // , width:320
                                // , height:320
                            }
                            , cache: false
                            , timeout: 1000 //todo 超时的话，只能认为该文件不曾上传过
                            , dataType: "json"
                        }).then(function(data, textStatus, jqXHR){

                            if(data.ifExist){   //若存在，这返回失败给WebUploader，表明该文件不需要上传
                                task.reject();

                                g_currentUploader.skipFile(file);
                                file.path = data.path;
                                UploadComplete(file,data);
                            }else{
                                task.resolve();
                                //拿到上传文件的唯一名称，用于断点续传
                                uniqueFileName = md5(''+userInfo.userId+file.name+file.type+file.lastModifiedDate+file.size);
                            }
                        }, function(jqXHR, textStatus, errorThrown){    //任何形式的验证失败，都触发重新上传
                            task.resolve();
                            //拿到上传文件的唯一名称，用于断点续传
                            uniqueFileName = md5(''+userInfo.userId+file.name+file.type+file.lastModifiedDate+file.size);
                        });
                    });
                    return $.when(task);
                }
                , beforeSend: function(block){
                    //分片验证是否已传过，用于断点续传
                    var task = new $.Deferred();
                    $.ajax({
                        type: "POST"
                        , url: backEndUrl
                        , data: {
                            status: "chunkCheck"
                            , name: uniqueFileName
							, md5: md5Mark
                            // , is_thum:1
                            // , width:320
                            // , height:320
                            , chunkIndex: block.chunk
                            , size: block.end - block.start
                        }
                        , cache: false
                        , timeout: 1000 //todo 超时的话，只能认为该分片未上传过
                        , dataType: "json"
                    }).then(function(data, textStatus, jqXHR){
                        if(data.ifExist){   //若存在，返回失败给WebUploader，表明该分块不需要上传
                            task.reject();
                        }else{
                            task.resolve();
                        }
                    }, function(jqXHR, textStatus, errorThrown){    //任何形式的验证失败，都触发重新上传
                        task.resolve();
                    });

                    return $.when(task);
                }
                , afterSendFile: function(file,data){
                    var chunksTotal = 0;
                    if((chunksTotal = Math.ceil(file.size/chunkSize)) > 1){
                        //合并请求
                        var task = new $.Deferred();
                        $.ajax({
                            type: "POST"
                            , url: backEndUrl
                            , data: {
                                status: "chunksMerge"
                                , name: uniqueFileName
                                , chunks: chunksTotal
                                , ext: file.ext
                                , md5: md5Mark
                                // , is_thum:1
                                // , width:320
                                // , height:320
                            }
                            , cache: false
                            , dataType: "json"
                        }).then(function(data, textStatus, jqXHR){
                            //todo 检查响应是否正常
                            task.resolve();
                            file.path = data.path;
                            UploadComplete(file,data);

                        }, function(jqXHR, textStatus, errorThrown){
                            task.reject();
                        });

                        return $.when(task);
                    }else{
                        UploadComplete(file,data);
                    }
                }
            });

            var g_currentUploader;
            var g_currentTheList;
            var g_fileDataArr = [];
            var g_fileData = {};
            var g_fileDomain;

            //初始化数据，用于将这些数据放到对应的框中，双引号部分指对应的input框的主键
            var initData = function(dataArr,name)//name填写对应picker的值
            {
                g_fileData = {file_name: "",group_name: "",md5: "",path: "",realname: "",size: "",};
                var size = dataArr.size;
                g_fileData.file_name = dataArr.file_name != undefined ? dataArr.file_name : "";
                g_fileData.group_name = dataArr.group_name != undefined ? dataArr.group_name : "";
                g_fileData.md5 = dataArr.md5 != undefined ? dataArr.md5 : "";
                g_fileData.path = dataArr.path != undefined ? dataArr.path : "";
                g_fileData.realname = dataArr.realname != undefined ? dataArr.realname : "";
                g_fileData.size = dataArr.size != undefined ? dataArr.size : "";
                g_fileDataArr[name] = g_fileData;
            }

            //初始化上传控件
            var initUploader = function(fileDomain,backEndUrl,extensions,theListArr,pickerArr)
            {
                g_fileDomain = fileDomain;
                var uploader = new Array();
                var size = theListArr.length;

                var uploadArr = [];
                for(var i=0;i<size;i++)
                {
                    uploadArr[theListArr[i]] = [];
                }

                for(var i=0;i<size;i++)
                {
                    uploadArr[theListArr[i]] = uploader[i] = WebUploader.create({
                        swf: "Uploader.swf"
                        , server: backEndUrl
                        , pick: "#"+pickerArr[i]
                        , resize: false
                        , dnd: "#"+theListArr[i]
                        , paste: document.body
                        , disableGlobalDnd: true
                        , thumb: {
                            width: 100
                            , height: 100
                            , quality: 70
                            , allowMagnify: true
                            , crop: true
                            //, type: "image/jpeg"
                        }
                        , compress: false
                        , prepareNextFile: true
                        , chunked: true
                        , chunkSize: chunkSize
                        , threads: true
                        , formData: function(){return $.extend(true, {}, userInfo);}
                        , fileNumLimit: 1
                        , accept:{
                            title:'234234',
                            extensions: extensions,
                        }
                        , fileSingleSizeLimit: 1000 * 1024 * 1024
                        , duplicate: true
                    });

                    uploader[i].on("fileQueued", function(file){
                        g_currentUploader = $(this).get(0);
                        g_currentTheList = $(this).get(0).options.dnd.substring(1);

                        //隐藏并清空所有的上传框的，以及上传队列，防止多框同时选择文件上传导致用户误会
                        for(var j=0;j<size;j++)
                        {
                            if(uploadArr[theListArr[j]].getFiles()[0]!=undefined)
                            {
                                if(theListArr[j] != g_currentTheList)
                                {
                                    uploadArr[theListArr[j]].removeFile(uploadArr[theListArr[j]].getFiles()[0].id);
                                }
                            }
                            $("#"+theListArr[j]).hide();
                            $("#"+theListArr[j]).empty();
                        }

                        //显示上传框并且将文件加入上传队列
                        $("#"+$(this).get(0).options.dnd.substring(1)).show();
                        $($(this).get(0).options.dnd).append('<li id="'+file.id+'">' +
                            '<img /><span>'+file.name+'</span><span class="itemUpload">上传</span><span class="itemStop">暂停</span><span class="itemDel">删除</span>' +
                            '<div class="percentage"></div>' +
                            '</li>');

                        var $img = $("#" + file.id).find("img");

                        $(this).get(0).makeThumb(file, function(error, src){
                             if(error){
                                 $img.replaceWith("<span>不能预览</span>");
                             }

                            $img.attr("src", src);
                         });
                    });

                    //监听点击上传按钮
                    $("#"+theListArr[i]).on("click", ".itemUpload", function(){

                        g_currentUploader = uploadArr[$(this).parent().parent().get(0).id];
                        g_currentTheList = $(this).parent().parent().get(0).id;

                        if($(this).parent().parent().get(0).id == g_currentTheList)
                        {
                            console.log($(this).parent().parent().get(0).id);
                            console.log(uploadArr[$(this).parent().parent().get(0).id]);
                            uploadArr[$(this).parent().parent().get(0).id].upload();
                            //"上传"-->"暂停"
                            $(this).hide();
                            $(".itemStop").show();
                        }
                    });

                    //监听点击停止按钮
                    $("#"+theListArr[i]).on("click", ".itemStop", function(){
                        g_currentUploader = uploadArr[$(this).parent().parent().get(0).id];
                        g_currentTheList = $(this).parent().parent().get(0).id;
                        if($(this).parent().parent().get(0).id == g_currentTheList)
                        {
                            uploadArr[$(this).parent().parent().get(0).id].stop(true);

                            //"暂停"-->"上传"
                            $(this).hide();
                            $(".itemUpload").show();
                        }
                    });

                    //监听停止删除按钮
                    //todo 如果要删除的文件正在上传（包括暂停），则需要发送给后端一个请求用来清除服务器端的缓存文件
                    $("#"+theListArr[i]).on("click", ".itemDel", function(){
                        g_currentUploader = uploadArr[$(this).parent().parent().get(0).id];
                        g_currentTheList = $(this).parent().parent().get(0).id;
                        if($(this).parent().parent().get(0).id == g_currentTheList)
                        {
                            uploadArr[$(this).parent().parent().get(0).id].removeFile($(this).parent().attr("id"));	//从上传文件列表中删除
                            $(this).parent().remove();	//从上传列表dom中删除
                        }
                    });

                    //显示上传进度
                    uploader[i].on("uploadProgress", function(file, percentage){
                        $("#" + file.id + " .percentage").text((parseInt(percentage * 100)) + "%");
                    });

                }
            }

            //上传完成时，将文件信息写入到对应的控件中
            function UploadComplete(file,data){
                var size = theListArr.length;
                for(var i=0;i<size;i++)
                {
                    console.log("#"+theListArr[i]);
                    $("#"+theListArr[i]).hide();
                    $("#"+theListArr[i]).empty();
                }
                g_currentUploader.removeFile(g_currentUploader.getFiles()[0].id);

                $("#" + file.id + " .percentage").text("上传完毕");
                $(".itemStop").hide();
                $(".itemUpload").hide();
                $(".itemDel").show();

                if(data==undefined){return;}
                $("#"+g_fileDataArr[g_currentTheList].file_name).val(data.file_name);
                $("#"+g_fileDataArr[g_currentTheList].group_name).val(data.group_name);
                $("#"+g_fileDataArr[g_currentTheList].md5).val(data.md5);
                $("#"+g_fileDataArr[g_currentTheList].path).val(g_fileDomain+data.path);
                $("#"+g_fileDataArr[g_currentTheList].realname).val(data.realname);
                $("#"+g_fileDataArr[g_currentTheList].size).val(data.size);
            }