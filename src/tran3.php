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

$xx=$_POST['推荐折旧度'];
$xxx="select * from information";
$ret=$conn->query($xxx);

/*$lngu=$_POST['经度u'];
$latu=$_POST['纬度u'];*/
$lngu=deg2rad($_POST['经度u']);
$latu=deg2rad($_POST['纬度u']);
/*echo $lngu."   ";
echo $lngr."   ";
echo $latu."   ";
echo $latr."   ";*/
while($row=$ret->fetch_assoc()){
    $x=60/(abs($xx-$row['elder'])+1);
    $y=$row['rate_avg']*0.2;
    $z=60/(sqrt($row['price']));
    $index=$x+$y+$z;
    $sent="update information set score='{$index}' where itemname='{$row['itemname']}' and soldername='{$row['soldername']}'";
    $conn->query($sent);
    $lng=deg2rad($row['inlng']);
    $lat=deg2rad($row['inlat']);
    $distance=6371*1000*acos(cos($lat)*cos($latu)*cos($lng-$lngu)+sin($lat)*sin($latu));
    $sent2="update information set distance='{$distance}' where itemname='{$row['itemname']}' and soldername='{$row['soldername']}'";
    $conn->query($sent2);
}

$sql = "select * from information ORDER BY score DESC";
$count = "select * from information ORDER BY score DESC";

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

