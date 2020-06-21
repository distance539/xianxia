<?php
error_reporting(0);
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
if ($_POST['userName']!=NULL && $_POST['iName']!=NULL && $_POST['contact']!=NULL )
{
    $sql="insert into message values('{$_POST['userName']}','{$_POST['iName']}','求购','{$_POST['contact']}')";
    //$sql="insert into information values('godo','godo','godo',1,90,119.08,119.00)";

    if($ret=$conn->query($sql)){
        echo "{".'"code": 0,'.  '"msg": "数据保存成功"'."}";  //这个用来返回成功数据给layui
    }
    else{
        echo "数据保存失败".$db->error;
    }
}
?>
