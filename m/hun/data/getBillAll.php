<? 
session_cache_limiter('private, must-revalidate');
session_cache_expire(60);
ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
header("Content-type:application/json");

$d = $_GET['d'];
$zone = $_GET['zone'];
$mid = $_GET['mid'];


$url ='http://ioshun.lotzx.com/getBillAll.php?d='.$d.'&zone='.$zone.'&mid='.$mid.'';
// $url ='http://m.lotzx.com/hun/testData/getBillAll.php?d='.$d.'&zone='.$zone.'&mid='.$mid.'';
$data = file_get_contents($url);
echo"$data";

