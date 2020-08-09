<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
require('../inc/conn.php');
require('../inc/function.php');


#for($xx=1;$xx<=count($lot_type["th"]);$xx++){
$url_file="../json/lotto/lock/*.json";		
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
	   @unlink($file); // delete file 
  }}
#  }#for($xx=1;$xx<=count($lot_type["th"]);$xx++){
	  
$url_file="../json/lotto/number/*.json";		
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
	   @unlink($file); // delete file 
  }}
?>