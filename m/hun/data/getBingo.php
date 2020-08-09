<? 
session_cache_limiter('private, must-revalidate');
session_cache_expire(60);
ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
header("Content-type:application/json");

$d = $_GET['d'];


$url ='http://ioshun.lotzx.com/getBingo.php?d='.$d.'';
$data = file_get_contents($url);
echo"$data";



