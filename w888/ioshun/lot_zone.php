<?php
require('../inc/conn.php');
require('../inc/function.php');


	
$arr = array();

$arr[0]["lot_name"]="หวยรายวัน";
$arr[0]["lot_pic"]="https://www.lotzx.com/images/home/lottery2.png";
$arr[0]["lot_zone"]="3";

$arr[1]["lot_name"]="หวยหุ้น ช่อง9";
$arr[1]["lot_pic"]="https://www.lotzx.com/images/home/20140905162045.png";
$arr[1]["lot_zone"]="1";


$arr[2]["lot_name"]="หวยหุ้น Money";
$arr[2]["lot_pic"]="https://www.lotzx.com/images/home/mzl.xxqajpvj.png";
$arr[2]["lot_zone"]="2";


	
echo json_encode($arr);
exit();
?>