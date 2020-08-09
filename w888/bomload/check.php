<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
require('../inc/function.php');

$url_file="../json/lotto/lock/*_*_9.json";		
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
	  echo $file;
	   echo'<hr>';		
  }}
	

?>