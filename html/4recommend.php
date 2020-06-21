<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title>闲 虾</title>
    <link rel="stylesheet" href="../layui/css/layui.css">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header layui-bg-cyan">
        <div class="layui-logo"><span style="color: white; "><b>闲 虾（买家端）</b></span></div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item"><a href="../index.html">欢 迎 页</a></li>
            <li class="layui-nav-item"><a href="0home_c.html">主 界 面</a></li>
            <li class="layui-nav-item"><a href="3coment.html">评 论</a></li-->
        </ul>
        <div class="layui-side layui-bg-blue">
            <div class="layui-side-scroll">
                <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
                <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                    <li class="layui-nav-item layui-nav-itemed">
                        <a class="" href="javascript:;">顾 客 操 作</a>
                        <dl class="layui-nav-child">
                            <dd><a href="1navi.html">&emsp;导 航</a></dd>
                            <dd><a href="2serch.html">&emsp;查 询</a></dd>
                            <dd><a href="4recommend.php">&emsp;闲 置 市 场</a></dd>
                            <dd><a href="9buymessage.html">&emsp;我 要 求 购</a></dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item layui-nav-itemed">
                        <a class="" href="javascript:;">关 于</a>
                        <dl class="layui-nav-child">
                            <dd><a href="5help.html">&emsp;帮 助</a></dd>
                            <dd><a href="6about.html">&emsp;关 于 我 们</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="layui-body" id="content">
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px; text-align:center">
            <legend><span style="font-size: 25px; "><b>欢迎来到 - 闲置市场</b></span></legend>
        </fieldset>
        <div class = "layui-row" style="font-size: 18px; text-align:center; margin-top: 25px;">
            <div class = "layui-col-md4">
                <FORM class="layui-form layui-form-pane" action="" method="POST">
                    <div class="layui-inline">
                        <label class="layui-form-label">最高预算</label>
                        <div class="layui-input-block" style="width: 200px;">
                            <input type="text" name="价格" placeholder="请输入您的最高预算" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <button class="layui-btn layui-btn-normal" lay-submit lay-filter="dataSubmit">查询</button>
                </FORM>
            </div>
            <div class = "layui-col-md4">
                <FORM class="layui-form layui-form-pane" action="" method="POST">
                    <div class="layui-inline">
                        <label class="layui-form-label">分类</label>
                        <div class="layui-input-block" style="width: 200px;">
                            <input type="text" name="分类" placeholder="请输入您想浏览的分类" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <button class="layui-btn layui-btn-normal" lay-submit lay-filter="dataSubmit">查询</button>
                </FORM>
            </div>
            <div class = "layui-col-md4">
                <FORM class="layui-form layui-form-pane" action="" method="POST">
                    <div class="layui-inline">
                        <label class="layui-form-label">折旧选择</label>
                        <div class="layui-input-block" style="width: 200px;">
                            <select name="折旧度">
                               <option value="">请选择折旧度</option>
                                <option value="1">1（99新）</option>
                                <option value="2">2（88新）</option>
                                <option value="3">3（77新）</option>
                                <option value="4">4（66新）</option>
                                <option value="5">5（55旧）</option>
                            </select>
                        </div>
                    </div>
                    <button class="layui-btn layui-btn-normal" lay-submit lay-filter="dataSubmit">查询</button>
                </FORM>
            </div>
		    <br><br><br><br>
            <div class = "layui-col-md4">
                <FORM class="layui-form layui-form-pane" action="" method="POST">
                    <div class="layui-inline">
                        <label class="layui-form-label">智能推荐</label>
                        <div class="layui-input-block" style="width: 200px;">
                            <select name="推荐折旧度" lay-verify="required">
                                <option value="">请选择折旧度</option>
                                <option value="1">1（99新）</option>
                                <option value="2">2（88新）</option>
                                <option value="3">3（77新）</option>
                                <option value="4">4（66新）</option>
                                <option value="5">5（55旧）</option>
                            </select>
                        </div>
                    </div>
                    <button class="layui-btn layui-btn-normal" lay-submit lay-filter="dataSubmit">查询</button>
                    <div class = "layui-row"  style="display: none" id="1">
                        <input type="text" readonly="true" id="lng" name="经度u">
                        <input type="text" readonly="true" id="lat" name="纬度u">
                    </div>
                    <script src="https://webapi.amap.com/maps?v=1.4.15&key=89a56839f9cd47a7715f04cdc795b740&plugin=AMap.Autocomplete,AMap.Walking"></script>
                    <script type="text/javascript">
                        var x,y;
                        var map = new AMap.Map("1", {
                            resizeEnable: true,
                            zoom:15
                        });
                        var Markers=[];
                        var options = {
                            'showButton': true,//是否显示定位按钮
                            'buttonPosition': 'LB',//定位按钮的位置
                            /* LT LB RT RB */
                            'buttonOffset': new AMap.Pixel(10, 20),//定位按钮距离对应角落的距离
                            'showMarker': true,//是否显示定位点
                            'markerOptions':{//自定义定位点样式，同Marker的Options
                                'offset': new AMap.Pixel(-18, -36),
                                'content':''
                            },
                            'showCircle': true,//是否显示定位精度圈
                            'circleOptions': {//定位精度圈的样式
                                'strokeColor': '#0093FF',
                                'noSelect': true,
                                'strokeOpacity': 0.5,
                                'strokeWeight': 1,
                                'fillColor': '#02B0FF',
                                'fillOpacity': 0.25
                            }
                        }
                        AMap.plugin(["AMap.Geolocation"], function(x,y) {
                            var geolocation = new AMap.Geolocation(options);
                            map.addControl(geolocation);
                            geolocation.getCurrentPosition(function (status,result){
                                if(status=='complete'){
                                    x=result.position.lng;
                                    y=result.position.lat;
                                    document.getElementById("lng").value=x;
                                    document.getElementById("lat").value=y;
                                }

                            })
                        });
                    </script>
                </FORM>
            </div>
        </div>
        <div class = "layui-row">
        <table class="layui-hide" id="rtable"></table></div>
        <div class = "layui-row" style="display: none">
            <?php
            if($_POST['价格'])
                include_once ("../src/tran.php");
            else if($_POST['折旧度']){
                include_once ("../src/tran1.php");
            }
            else if($_POST['推荐折旧度']){
                include_once ("../src/tran3.php");
            }
            else if($_POST['分类']){
                include_once ("../src/tran4.php");
            }
            else
                include_once ("../src/tran0.php");
            ?>
        </div>
        <!-- layui-table组件设定 -->

        <script src="../layui/layui.js" charset="utf-8"></script>
        <script>
            layui.use('table', function(){
                var table = layui.table;
                table.render({
                    elem: '#rtable'
                    , url: '../data/data.json'//,url:'../data/default.json'
                    , cols: [[
                        {field: 'itemname', width: 100, title: '物品名称'}
                        , {field: 'soldername', width: 100, title: '卖家'}
                        , {field: 'info', width: 275, title: '简介(点击单元格显示详细信息)'}
                        , {field: 'elder', width: 100, title: '折旧度'}
                        , {field: 'price', width: 100, title: '价格'}
                        , {field: 'catagory', width: 100, title: '分类'}
                        , {field: 'contact', width: 250, title: '联系方式(点击单元格展开详细信息)'}
                        , {field: 'distance', width: 150, title: '买卖距离'}
                        , {field: 'score', width: 150, title: '总评'}
                    ]]
                });
            });
        </script>
    </div>
    <div class="layui-footer">
        <p align="right">闲 虾©Leisure Shrimp Beta 2020</p>
    </div>
</div>
<!-- 看板娘显示
<script type="text/javascript" charset="utf-8"  src="../src/L2Dwidget.0.min.js"></script>
<script type="text/javascript" charset="utf-8"  src="../src/L2Dwidget.min.js"></script>
<script type="text/javascript" charset="utf-8"  src="../src/L2Dwidget.set.js"></script> -->
</body>
</html>