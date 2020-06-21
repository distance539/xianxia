<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title>北洋点评</title>
    <link rel="stylesheet" href="../layui/css/layui.css">
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
                        <a class="" href="javascript:;">商 家 操 作</a>
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
            <legend><span style="font-size: 25px; "><b>闲虾闲虾 - 宝贝下架</b></span></legend>
        </fieldset>

        <div class = "layui-row" style="text-align: right; margin-right: 20px">
            <FORM class="layui-form layui-form-pane" action="" method="POST">
                <div class="layui-inline">
                    <label class="layui-form-label">下架宝贝</label>
                    <div class="layui-input-block" style="width: 256px;">
                        <input type="text" name="删除" required  lay-verify="required" placeholder="请输入待下架宝贝名称" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">所属主人</label>
                    <div class="layui-input-block" style="width: 256px;">
                        <input type="text" name="商家" required  lay-verify="required" placeholder="请输入主人联系方式" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <button class="layui-btn layui-btn-normal" lay-submit lay-filter="dataSubmit">删除</button>
            </FORM>
        </div>
        <div class = "layui-row">
            <table class="layui-hide" id="rtable"></table>
        </div>
        <div class = "layui-row" style="display: none">
            <?php
            if($_POST['删除'])
                include_once ("../src/tran2.php");
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
                    , page: true
                    , cols: [[
                        {field: 'itemname', width: 200, title: '物品名称'}
                        , {field: 'soldername', width: 200, title: '简介'}
                        , {field: 'elder', width: 150, title: '折旧度'}
                        , {field: 'price', width: 150, title: '价格'}
                        , {field: 'catagory', width: 150, title: '分类'}
                        , {field: 'contact', width: 150, title: '联系方式'}
                        , {field: 'distance', width: 150, title: '买卖距离'}
                        , {field: 'score', width: 150, title: '总评'}
                    ]]
                });

            });

        </script>
    </div>
    <div class="layui-footer">
        <p align="right">闲   虾©Leisure Shrimp Beta 2020</p>
    </div>
</div>

</body>
</html>