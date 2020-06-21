<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>frame_c</title>
    <link rel="stylesheet" href="../layui/css/layui.css"  media="all">
    <style>
        *{
            margin:0;
            padding: 0;
        }
        .outer{
            width: 600px;
            margin:20px auto 0px;
            padding:20px 40px;
            background-color: #fff;
            border-radius:8px;
        }
        .head{
            font-size: 20px;
            margin-bottom: 20px;
        }
        #userName{
            font-size: 18px;
            outline:none;
            padding: 0px 0px;
        }
        #cName{
            font-size: 18px;
            outline:none;
            padding: 0px 0px;
        }
        #rName{
            font-size: 18px;
            outline:none;
            padding: 0px 0px;
        }
        #userWords{
            width: 100%;
            height: 120px;
            outline: none;
            resize: none;
            font-size: 14px;
            padding: 10px;
        }
        #userWordsbar{
            width: 100%;
        }
        #foodshow{
            display:none
        }
        #comment{
            display:none
        }
        #word_footer{
            margin-top: 0px;
            /*line-height: 30px;*/
            font-size: 20px;
        }
        #wordsNum{
            margin-top: 8px;
        }
        #forma{
            margin-top: 20px;
        }
        /*#showcomm{
            margin-top: 15px;
        }*/
        #btn{
            width: 90px;
            height: 70px;
            background: #ccc;
            color:#fff;
        }
        #btn2{
            width: 90px;
            height: 70px;
        }
    </style>
</head>
<body>
<div class="layui-col-md3"><br><br></div>
<div class="layui-col-md6" id="maindiv">
    <br><br>
    <div class="layui-row" style="font-size: 18px">
        <div class="layui-row">
            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                <legend><span style="font-size: 20px; "><b>消息列表</b></span></legend>
            </fieldset>
            <div id="foodshow">
                <?php
                include_once ('../src/db_selectmessage.php');
                ?>
            </div>
        </div>
    </div>



    <div class="layui-row layui-col-space5" id="word_footer" >
        <fieldset class="layui-elem-field layui-field-title">
            <legend><span style="font-size: 20px; "><b> 发起求购 </b></span></legend>
        </fieldset>
        <FORM class="layui-form layui-form-pane" action="" method="POST">
            <div class="layui-col-md10">
                <label class="layui-form-label" style="font-size: 18px">用户</label>
                <div class="layui-input-block" style="width: 400px;">
                    <input type="text" id="userName" name="userName"  required lay-verify="required"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
                </div>
                <label class="layui-form-label" style="font-size: 18px">求购物品名称</label>
                <div class="layui-input-block" style="width: 400px;">
                    <input type="text" id="sName" name="iName" required lay-verify="required" placeholder="请输入物品名称" autocomplete="off" class="layui-input">
                </div>
                <label class="layui-form-label" style="font-size: 18px">联系方式</label>
                <div class="layui-input-block" style="width: 400px;">
                    <input type="text" id="cName" name="contact" required lay-verify="required" placeholder="请输入联系方式(注明形式)" autocomplete="off" class="layui-input">
                </div>
                <!--评分--><input type="hidden" id="review" name="rate">

            </div>
            <div class="layui-col-md2" style="font-size: medium; " id="forma">
                <button id="btn" data-method="offset" data-type="auto" class="layui-btn layui-btn-normal">
                    <b>提交</b></button>
            </div>
        </FORM>
    </div>
    <br>

    <div class="layui-row" style="text-align: right"><!--style="display:none"-->
        <?php   include_once ('../src/db_insertmessage.php');  ?>
    </div>

</div>
<div class="layui-col-md3"><br><br></div>

<script src="../layui/layui.js" charset="utf-8"></script>

<script>
    layui.use('layer', function(){
        var $ = layui.jquery, layer = layui.layer;

        //触发事件
        /*var active = {
            offset: function(othis){
                var type = othis.data('type')
                    ,text = othis.text();

                layer.open({
                    type: 1
                    ,offset: type
                    ,id: 'layerDemo'+type
                    ,area: ['100px', '50px']
                    ,content:'评论发布成功！感谢您的评价！'
                    ,btn: '关闭全部'
                    ,btnAlign: 'c' //按钮居中
                    ,shade: 0 //不显示遮罩
                    ,yes: function(){
                        layer.closeAll();
                    }
                });
            }
        };

        $('#maindiv .layui-btn').on('click', function(){
            var othis = $(this), method = othis.data('method');
            active[method] ? active[method].call(this, othis) : '';
            //$('#foodshow').show();
        });*/


            $('#foodshow').show();
    });
</script>

<!-- 评论区相关组件 -->
<script>
    function getId(str){
        return document.getElementById(str);
    }
    var userName = getId('userName');
    var contact = getId('contact');
    var iname = getId('iName');
    var wordsNum = getId('wordsNum');
    var btn = getId('btn');
    //var myList = getId('myList');
    userName.oninput = function(){
        judge();
    }
    cName.oninput = function(){
        judge();
    }
    userWords.oninput = function(){
        // 当两个输入框内容都不为空时，改变按钮颜色，可以点击
        judge();
        // 每次输入都获取内容长度，并计算剩余可输入字数
        var wLength = 100 - userWords.value.length;
        if(wLength <= 0){
            wLength = 0;
            // userWords.disabled = true;
            userWords.value.innerHTML = userWords.value.substring(0,140);
        }
        wordsNum.innerHTML = '还可以输入' + wLength + '个字';
    }
    function judge(){
        if(userWords.value && userName.value && cName.value){
            btn.style.backgroundColor = '#1E9FFF';
        }else{
            btn.style.backgroundColor = '#ccc';
            //btn.onclick = null;
        }
    }
</script>
</body>
</html>