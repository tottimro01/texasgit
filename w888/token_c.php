<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
$del_over=time()-(60*2);

$url_file="json/online/m/*.json";		
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files

$file_time=filemtime($file);
if($file_time<$del_over){
	
  if(@is_file($file)){
	   @unlink($file); // delete file 
 }
 
}else{
	/*
echo  date ("d-m-Y H:i:s.", filemtime($file));
echo'<br>';
echo filemtime($file);
 echo'<hr>';
 */
}
  }  
  

?>