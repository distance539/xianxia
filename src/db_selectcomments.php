<?php
$servername = 'localhost';
$username = 'zzj';
$password = '119104';
$dbname = 'sold';
$conn = new mysqli($servername,$username,$password,$dbname);
$conn -> set_charset('utf-8');
if($conn->connect_error){
  die("连接失败".$conn->connect_error);
} else {
    if($_POST['sname']) {
        echo "<div style='text-align: right'><b>商家名称【" . $_POST['sname'] . "】</b></div><br/>\n";
        $sql = "SELECT username,itemname,grade,review,soldername FROM remark where soldername='{$_POST['sname']}'";
        $ret = $conn->query($sql);
        if ($ret->num_rows > 0)
            while ($row = $ret->fetch_assoc()) {
                echo "用户 “" . $row['username'] . "” 对商家 “" . $row['soldername'] . "” 的评价：" . "<br/>\n";;
                echo "&emsp;&emsp;" . $row['grade'] . " 分";
                echo "&emsp;&emsp;“" . $row['review'] . "” " . "<br/>\n";
                echo "<br/>\n";
            }
        else{
            echo "<div style='text-align: right'>无该商家信息</div>";
        }
    }
    else{
      echo "<div style='text-align: right'>评论查询状态：未提交，请填写商家名称并点击“提交”和“显示”</div>";
    }
  }
?>



        

