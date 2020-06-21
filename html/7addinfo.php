<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title>闲 虾</title>
    <link rel="stylesheet" href="../layui/css/layui.css" media="all">
    <script src="http://cdn.bootcss.com/jquery/1.12.3/jquery.min.js"></script>
    <script src="../layui/layui.js" charset="utf-8"></script>
</head>

<body class="layui-layout-body">
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header layui-bg-cyan">
            <div class="layui-logo"><span style="color: white; "><b>闲虾（卖家端）</b></span></div>
            <!-- 头部区域（可配合layui已有的水平导航） -->
            <ul class="layui-nav layui-layout-left">
                <li class="layui-nav-item"><a href="../index.html">欢 迎 页</a></li>
                <li class="layui-nav-item"><a href="0home_r.html">主 界 面</a></li>
            </ul>
            <div class="layui-side layui-bg-blue">
                <div class="layui-side-scroll">
                    <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
                    <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                        <li class="layui-nav-item layui-nav-itemed">
                            <a class="" href="javascript:;">卖 家 操 作</a>
                            <dl class="layui-nav-child">
                                <dd><a href="7addinfo.php">&emsp;宝 贝 添 加</a></dd>
                                <dd><a href="8delinfo.php">&emsp;宝 贝 删 除</a></dd>
                            </dl>
                        </li>
                        <li class="layui-nav-item layui-nav-itemed">
                            <a class="" href="javascript:;">关 于</a>
                            <dl class="layui-nav-child">
                                <dd><a href="5help_r.html">&emsp;帮 助</a></dd>
                                <dd><a href="6about_r.html">&emsp;关 于 我 们</a></dd>
                            </dl>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="layui-body" id="content">
            <!-- 内容主体区域 -->
            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px; text-align:center">
                <legend><span style="font-size: 25px; "><b>闲虾闲虾 - 宝贝添加</b></span></legend>
            </fieldset>
            <div class="layui-row ">
                <div class="layui-col-md4"><br></div>
                <div class="layui-col-md4" id="mainframe">
                    <br><br><br>
                    <form class="layui-form layui-form-pane" action="" method="POST">
                        <div class="layui-form-item">
                            <label class="layui-form-label">宝贝名称</label>
                            <div class="layui-input-block" >
                                <input type="text" name="宝贝名称" required  lay-verify="required" placeholder="请输入宝贝名称" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">宝贝类别</label>
                            <div class="layui-input-block" >
                                <input type="text" name="宝贝类别" required  lay-verify="required" placeholder="请写上相应类别" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">卖家名称</label>
                            <div class="layui-input-block" >
                                <input type="text" name="卖家名称" required  lay-verify="required" placeholder="请输入自己的昵称" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">联系方式</label>
                            <div class="layui-input-block" >
                                <input type="text" name="联系方式" required  lay-verify="required" placeholder="请注明qq/微信/手机号" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">简介</label>
                            <div class="layui-input-block">
                                <input type="text" name="简介" required  lay-verify="required" placeholder="请输入宝贝简介" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">经度</label>
                            <div class="layui-input-block" >
                                <input type="text" id="inlng" name="经度" required  lay-verify="required|number" placeholder="可点击下方“选择地理位置”获取" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">纬度</label>
                            <div class="layui-input-block">
                                <input type="text" id="inlat" name="纬度" required  lay-verify="required|number" placeholder="可点击下方“选择地理位置”获取" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">折旧度</label>
                            <div class="layui-input-block" style="width: 187px;">
                                <select name="折旧度" lay-verify="required">
                               <option value="">请选择折旧度</option>
                                <option value="1">1（99新）</option>
                                <option value="2">2（88新）</option>
                                <option value="3">3（77新）</option>
                                <option value="4">4（66新）</option>
                                <option value="5">5（55旧）</option>
                                </select>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">价格</label>
                            <div class="layui-input-block" style="width: 187px;">
                                <input type="text" name="价格" required  lay-verify="required|number" placeholder="￥" autocomplete="off" class="layui-input">
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button class="layui-btn layui-btn-normal" lay-submit lay-filter="dataSubmit">立即提交</button>
                                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                            </div>
                        </div>
                    </form>

                    <div class="layui-row" id="showmap" >
                        <a class="layui-btn layui-btn-primary layer-demolist" href="javascript:;" id="mapbtn" style="width: 175px; margin-left: 108px">
                            选择地理位置</a>
                    </div>
                </div>
                <div class="layui-col-md2"><br></div>
            </div>
            <div class="layui-row">

            </div>
        </div>
        <div class="layui-footer">
            <p align="right">闲   虾©Leisure Shrimp Beta 2020</p>
        </div>
    </div>

    <!--表单事务-->
    <script>
        layui.use('form', function(){
            var form = layui.form;
            var $ = layui.jquery;
            //提交
            form.on('submit(dataSubmit)', function(data){
                $.ajax({
                    url:'../src/db_insertdata.php',
                    method:'post',
                    data:data.field,
                    dataType:'JSON',
                    success:function(res){
                        if(res.code=='0'){
                            layer.msg("数据保存成功",{icon: 1, time: 3000},function(){location.reload();}); //提交成功后刷新页面
                        }
                        else
                            alert(res.msg);
                    },
                    error:function (data) {
                        alert("数据提交失败");
                    }
                });
                return false;
            });
        });
    </script>

    <!--地图选点-->
    <script>
        $('#mapbtn').on('click', function(){
            layer.ready(function(){
                layer.open({
                    type: 2,
                    title: '经纬度选择',
                    maxmin: true,
                    area: ['1024px', '700px'],
                    content: '7locationmap.html',
                    end: function(){
                        layer.tips('Hi', '#about', {tips: 1})
                    }
                });
            });
        });
    </script>
</body>
</html>