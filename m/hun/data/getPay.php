<? 
session_cache_limiter('private, must-revalidate');
session_cache_expire(60);
ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
header("Content-type:application/json");

$mid =$_SESSION["mid"];
$url ='http://ioshun.lotzx.com/getPay.php?mid='.$mid.'';
$data = file_get_contents($url);
echo"$data";

?>

