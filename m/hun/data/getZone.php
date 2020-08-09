<? 
session_cache_limiter('private, must-revalidate');
session_cache_expire(60);
ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
header("Content-type:application/json");
$url ='http://ioshun.lotzx.com/lot_zone.php';
$data = file_get_contents($url);
echo"$data";

?>

