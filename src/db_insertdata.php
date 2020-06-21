<?php
$servername = 'localhost';
$username = 'zzj';
$password = '119104';
$dbname = 'sold';
$conn = new mysqli($servername,$username,$password,$dbname);
$conn -> set_charset('utf-8');
if($conn->connect_error){
    die("连接失败".$conn->connect_error);
}

//$_POST['宝贝名称']=1;
//$_POST['简介']=1;
if ($_POST['宝贝名称']!=NULL && $_POST['简介']!=NULL )
{
    $sql="insert into information values('{$_POST['宝贝名称']}','{$_POST['卖家名称']}','{$_POST['简介']}','{$_POST['折旧度']}','{$_POST['价格']}','{$_POST['经度']}','{$_POST['纬度']}','0','0.0000','0.0000','0.0000','{$_POST['联系方式']}','{$_POST['宝贝类别']}')";
    //$sql="insert into information values('godo','godo','godo',1,90,119.08,119.00)";

    if($ret=$conn->query($sql)){
        echo "{".'"code": 0,'.  '"msg": "数据保存成功"'."}";  //这个用来返回成功数据给layui
    }
    else{
        echo "数据保存失败".$db->error;
    }
}
?>