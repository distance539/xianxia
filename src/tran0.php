<?php
//header("Content-type:text/html;charset=utf-8");

//$conn = mysql_connect("localhost","root","");

//mysql_select_db("test", $conn);

//mysql_query("SET NAMES utf8");*/
//<?php
$servername = 'localhost';
$username = 'zzj';
$password = '119104';
$dbname = 'sold';
$conn = new mysqli($servername,$username,$password,$dbname);
$conn -> set_charset('utf-8');
if($conn->connect_error){
    die("连接失败".$conn->connect_error);
} //else {
//echo "Opened database successfully <br/>";
//}


$sql = "select * from information ";
$count = "select * from information ";

$check_quary = $conn->query($sql);
$result = $conn->query($count);

//$num = count(*);

$jarr = array();

while($rows=$check_quary->fetch_assoc()){

    $count=count($rows);//不能在循环语句中，由于每次删除 row数组长度都减小
    for($i=0;$i<$count;$i++){
        unset($rows[$i]);//删除冗余数据
    }

    array_push($jarr,$rows);
}
$jobj = new stdclass();
foreach($jarr as $key => $value) {
    $jobj->$key = $value;
}

// print_r($jobj);

$json = json_encode($jobj);

$temp=array();

$temp['code']=0;
$temp['msg']='';
//$temp['count']= $num;
$temp['data']=$jobj;

$fina = json_encode($temp,JSON_UNESCAPED_UNICODE);
echo $fina;
//echo json_encode($fina,JSON_UNESCAPED_UNICODE);
file_put_contents('../data/data.json', print_r($fina, true));
//return $fina;
?>

