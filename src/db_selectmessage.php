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
else {
    $sql = "select * from message";
    $ret = $conn->query($sql);
    if($ret->num_rows >0){
        while ($row=$ret->fetch_assoc()){
            echo $row['sender']."发起求购 : ".$row['words']." ，联系方式为".$row['contact']."<br>\n";
        }
    }


}
?>