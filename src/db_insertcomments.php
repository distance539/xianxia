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
} else {
    if ($_POST['userName']!=NULL && $_POST['cName']!=NULL && $_POST['sName']!=NULL && $_POST['rate']!=NULL && $_POST['usercomment']!=NULL)
    {
        $user=$_POST['userName'];
        $item=$_POST['cName'];
        $seller=$_POST['sName'];
        $rate=$_POST['rate'];
        $comments=$_POST['usercomment'];
        $sql="insert into remark values('{$user}','{$item}','{$seller}','{$rate}','{$comments}')";
        $ret=$conn->query($sql);
        $sql = "SELECT count(*) as amount ,avg(grade) as avgs FROM remark where soldername='{$seller}' group by soldername";
        $ret=$conn->query($sql);
        if ($ret->num_rows >0) {
            $row = $ret->fetch_assoc();
            $sql = "update information set re_num='{$row['amount']}' ,rate_avg='{$row['avgs']}' where soldername='{$seller}'";
            $rst = $conn->query($sql);
            echo "评价提交状态：提交成功！";
        }
        else {
            echo "没有相关信息";
        }
    }
    else{
        echo "评价提交状态：未提交，请完整填写表单";
    }
}
?>
