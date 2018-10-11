<script src="/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/lib/My97DatePicker/WdatePicker.js"></script>
<link rel="stylesheet" href="/lib/layui/css/layui.css" type="text/css">

<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i>首页
    <span class="c-gray en">&gt;</span>
    <script>document.write(getQueryString('tabName1'))</script>
    <span class="c-gray en">&gt;</span>
    <script>document.write(getQueryString('tabName2'))</script>
    <a class="btn btn-success radius r" style="line-height:1em;height: 2em;"
       href="javascript:location.replace(location.href);" title="刷新">
        <i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<style>
    #num_size{
        font-size: 2rem;
        font-weight: bold;
    }
    .text-c {
        text-align: center;
    }
    .input-text {
        width: 200px;
    }
</style>
<div class="form-inline" align="center">
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class="layui-this">公共直播间概况</li>
            <li>公共直播间效果</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show layui-anim layui-anim-scale">
                <div class="layui-elem-quote layui-row">
                    <div class="layui-col-md4">
                        <h3 style="padding-top: 0.5rem;">公共直播间概况</h3>
                    </div>
                    <div class="layui-col-md4 layui-col-md-offset4 layui-form">
                            <div class="layui-input-block">
                                <select id="tableSumData" name="tableData" lay-filter="tableSumData" lay-verify="required">
                                    <{volist name="option" id="vo"}>
                                    <option value="<{$vo.value}>"><{$vo.text}></option>
                                    <{/volist}>
                                </select>
                            </div>
                    </div>
                </div>
                <form class="layui-form" action="" style="padding: 0.5rem;">
                    <div id="table-search-html" class="text-c">
                        <input type="text" onfocus="WdatePicker({maxDate:'#F{\$dp.\$D(\'search-dateMax\')||\'%y-%M-%d\'}'})" name="dateMin" id="search-dateMin" placeholder="开始时间"
                               class="input-text Wdate">-
                        <input type="text" onfocus="WdatePicker({minDate:'#F{\$dp.\$D(\'search-dateMin\')}',maxDate:'%y-%M-%d'})" name="dateMax" id="search-dateMax" placeholder="结束时间"
                               class="input-text Wdate">
                        <input type="button" value="搜索" class="btn btn-success radius" lay-submit lay-filter="sumFormSearch"/>
                    </div>
                </form>
                <div class="layui-collapse">
                    <div class="layui-colla-item">
                        <h2 class="layui-colla-title">直播间访问</h2>
                        <div class="layui-colla-content layui-show">
                            <div style="padding: 20px; background-color: #F2F2F2;">
                                <div class="layui-row layui-col-space15">
                                    <div class="layui-col-md5">
                                        <div class="layui-card">
                                            <div class="layui-card-header layui-bg-black">访客数（直播间UV）</div>
                                            <div class="layui-card-body layui-bg-blue">
                                                <span id="num_size" class="visitors_nun"><{$sum['visitors_nun']}></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layui-col-md5">
                                        <div class="layui-card">
                                            <div class="layui-card-header layui-bg-black">浏览量（直播间UV）</div>
                                            <div class="layui-card-body layui-bg-blue">
                                                <span id="num_size" class="browse_nun"><{$sum['browse_nun']}></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="layui-colla-item">
                        <h2 class="layui-colla-title">直播间活跃</h2>
                        <div class="layui-colla-content layui-show">
                            <div style="padding: 20px; background-color: #F2F2F2;">
                                <div class="layui-row layui-col-space15">
                                    <div class="layui-col-md5">
                                        <div class="layui-card">
                                            <div class="layui-card-header layui-bg-black">人均停留时长（秒）</div>
                                            <div class="layui-card-body layui-bg-orange">
                                                <span id="num_size" class="percapita_time_len"><{$sum['percapita_time_len']}></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layui-col-md5">
                                        <div class="layui-card">
                                            <div class="layui-card-header layui-bg-black">总送礼金额</div>
                                            <div class="layui-card-body layui-bg-orange">
                                                <span id="num_size" class="gift_amount_nun"><{$sum['gift_amount_nun']}></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><div style="padding: 20px; background-color: #F2F2F2;">
                                <div class="layui-row layui-col-space15">
                                    <div class="layui-col-md5">
                                        <div class="layui-card">
                                            <div class="layui-card-header layui-bg-black">真实总在线人数</div>
                                            <div class="layui-card-body layui-bg-orange">
                                                <span id="num_size" class="online_nun"><{$sum['online_nun']}></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layui-col-md5">
                                        <div class="layui-card">
                                            <div class="layui-card-header layui-bg-black">跳转至老师个人Live直播间次数</div>
                                            <div class="layui-card-body layui-bg-orange">
                                                <span id="num_size"  class="jump_live_nun"><{$sum['jump_live_nun']}></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="layui-tab-item layui-anim layui-anim-scale">
                <div class="layui-elem-quote layui-row">
                    <div class="layui-col-md4">
                        <h3 class="layui-col-md6" style="padding-top: 0.5rem;">公共直播间概况</h3>
                        <button onclick="exportExcel()" type="button" class="btn btn-primary layui-col-md3" style="margin-right:10px;">　导出　</button>
                    </div>
                    <div class="layui-col-md4 layui-col-md-offset4 layui-form">
                        <div class="layui-input-block">
                            <select id="tableData" name="tableData" lay-filter="tableData" lay-verify="required">
                                <{volist name="option" id="vo"}>
                                <option value="<{$vo.value}>"><{$vo.text}></option>
                                <{/volist}>
                            </select>
                        </div>
                    </div>
                </div>
                <form class="layui-form" action="">
                    <div id="table-search-html" class="text-c">
                        <input type="text" onfocus="WdatePicker({maxDate:'#F{\$dp.\$D(\'search-dateMax\')||\'%y-%M-%d\'}'})" name="dateMin" id="search-dateMin" placeholder="开始时间"
                               class="input-text Wdate">-
                        <input type="text" onfocus="WdatePicker({minDate:'#F{\$dp.\$D(\'search-dateMin\')}',maxDate:'%y-%M-%d'})" name="dateMax" id="search-dateMax" placeholder="结束时间"
                               class="input-text Wdate">
                        <input type="button" value="搜索" class="btn btn-success radius" lay-submit lay-filter="formSearch"/>
                    </div>
                </form>
                <table id="ListTable" lay-filter="userListTable"></table>
            </div>
        </div>
    </div>
</div>

<script>
    layui.use(['layer', 'form','table','element'], function(){
        //element选项卡切换,折叠事件
        var form = layui.form,table = layui.table,
            ListTableWhere= $("select#tableData").val(),
            tableDataWhere= $("select#tableSumData").val(),
            element = layui.element;
            console.log(ListTableWhere);
        //执行select选择后重新加载表格
            form.on('select(tableData)', function(data){
            var opt = (data.value);
                ListTableWhere=$("select#tableData").val();
                //执行重载
                table.reload('ListTable', {
                    page: {
                        curr: 1 //重新从第 1 页开始
                    }
                    ,where: {
                        optionData: opt //时间段key
                    }
                });
        });
        //监听搜索事件提交
        form.on('submit(formSearch)', function(data){
            // console.log(JSON.stringify(data.field));
            // console.log(data);
            //执行重载
            table.reload('ListTable', {
                page: {
                    curr: 1 //重新从第 1 页开始
                }
                ,where: {
                    dateMin:data.field.dateMin,
                    dateMax:data.field.dateMax,
                }
            });
        });
        //执行select选择后刷新数据
        form.on('select(tableSumData)', function(data){
            var opt = (data.value),//跟tableDataWhere是一样的
                tableDataWhere= $("select#tableSumData").val(),
                ajaxData ={tableDataWhere:tableDataWhere,opt:opt};
                ajaxFun(ajaxData);
        });//end
        //监听搜索事件提交
        form.on('submit(sumFormSearch)', function(data){
           var ajaxData = {
               tableDataWhere:null,
               dateMin:data.field.dateMin,
               dateMax:data.field.dateMax
           };
            ajaxFun(ajaxData);
        });
        function ajaxFun(ajaxData){
            layer.confirm('确认刷新数据吗?', {icon: 3, title:'提示'},
                function(index){
                    layer.close(index);
                    $.ajax({
                        type: 'POST',
                        url: './getAjaxReload',
                        data:ajaxData,
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
                            $.each(data.data,function (i,vo){
                                if (vo == null){
                                    vo = 0;
                                }
                                $("."+ i).html(vo);
                            });
                            layer.msg('数据已刷新!');
                        },
                        error:function(data) {
                            layer.msg('数据异常!');
                            console.log(data.msg);
                        },
                    });
                }
            );
        }
        //第一次进来的时候加载数据表格
        table.render({
            elem: '#ListTable'
            ,url: '#' //数据接口
            ,method: 'POST'
            ,page:true //开启分页
            ,limits:[10,20,30]
            ,skin: 'row'
            ,even: true
            ,loading:true
            ,response: {
                dataName: 'rows' ,//数据列表的字段名称，默认：data
            }
            ,cols: [[ //表头
                {field: 'coursetime', title: '直播时间段', fixed: 'left'}
                ,{field: 'target_id', title: 'ID'}
                ,{field: 'courseday', title: '时间'}
                ,{field: 'teacher_name', title: '讲师名称'}
                ,{field: 'user_id', title: '讲师ID'}
                ,{field: 'visitors_nun', title: '访客数',sort: true}
                ,{field: 'browse_nun', title: '浏览量', sort: true}
                ,{field: 'percapita_time_len', title: '人均停留时长（秒）',sort: true}
                ,{field: 'gift_amount_nun', title: '总送礼金额',sort: true}
                ,{field: 'online_nun', title: '真实总在线人数'}
                ,{field: 'jump_live_nun', title: '<a title="跳转至老师个人Live直播间次数" style="text-decoration: none;">' +
                    '跳转至老师个人Live直播间次数</a>',sort: true}
            ]]
            ,id: 'ListTable'
            ,where: {
                optionData: ListTableWhere //不为空是的操作
            }
        });//end
    });

    function exportExcel(){
        var ListTableWhere = $("select#tableData").val();
        console.log(ListTableWhere);
        var url = '/GlobalLiveAnalysis/dataExportExcel?optionData='+ ListTableWhere;
        layer.confirm('导出数据统计表格到本地',function(index){
            layer.close(index);
            window.open(url);
        });
    }

    //显示大图
    function _showBig(src) {
        layer.ready(function (){
            layer.photos({
                photos:{
                    "title": "二维码管理", //相册标题
                    "data": [   //相册包含的图片，数组格式
                        {
                            "alt": "二维码管理",
                            "src": src, //原图地址
                            "thumb": src //缩略图地址
                        }
                    ]
                },
                shadeClose:false,
                closeBtn:2,
            });
        });
    }


</script>
