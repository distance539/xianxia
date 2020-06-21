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
$sql = "SELECT * FROM information where itemname like '%{$_POST['food']}%'";
$ret=$conn->query($sql);
while($row=$ret->fetch_assoc()){
    echo "物品名称： ".$row['itemname']."<br/>\n";
    echo "卖家信息： ".$row['soldername']."<br/>\n";
    echo "折旧度： ".$row['elder']."<br/>\n";
    echo "价格：".$row['price']."<br/>\n";
    echo "评价人数：".$row['re_num']."<br/>\n";
    echo "平均评分：".$row['rate_avg']."<br/>\n";
}
?>