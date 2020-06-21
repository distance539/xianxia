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
else{
    if($_POST['sname']){
        $sql = "SELECT soldername,rate_avg,contact FROM information where soldername like '%{$_POST['sname']}%'";
        $ret=$conn->query($sql);
        if ($ret->num_rows > 0) {
            while ($row = $ret->fetch_assoc()) {
                echo "卖家名称：&emsp;" . $row['soldername'] ."&emsp;"."综合评分：&emsp;" . $row['rate_avg'] ."&emsp;"."联系方式：&emsp;". $row['contact'] ."<br/>\n";
            }
        }
        else {
            echo "没有相关卖家哦！！";
        }
    }else{
        echo "<div style='text-align: right'>菜单查询状态：未提交，请填写商家名称并点击“提交”和“显示”</div>";
    }
}
?>