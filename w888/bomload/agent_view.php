<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
require('../inc/function.php');


$url_file="../json/config/agent/*.json";		
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
	  # @unlink($file); // delete file 
################Config Admin
echo $file.'<br>';
$lot_js=file_get_contents2($file);
$hover = json_decode2($lot_js, true);
print_r($hover);
echo"<hr>";
  }}
	  
	
?>