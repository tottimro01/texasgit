<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
require('../inc/function.php');

?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<TITLE>::: OHOBET :::</TITLE>
</head>

<body>
<?
$x_del=(60*60);	
$url_file="../json/login/check_on/*.php";		
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
$ct=@filemtime($file);
$nt=$time_stam-$ct;
if($nt>($x_del)){
	   @unlink($file); // delete file 
  }}}
  
$url_file="../json/login/token_bet/*.php";		
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
$ct=@filemtime($file);
$nt=$time_stam-$ct;
if($nt>($x_del)){
	#   @unlink($file); // delete file 
write($file,'<? $bet_token="'.$token.'"; ?>',"w+"); 
  }}}
  
$x_del=(60*60*6);	
  $url_file="../json/login/*.php";		
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
$ct=@filemtime($file);
$nt=$time_stam-$ct;
if($nt>($x_del)){
	#   @unlink($file); // delete file 
	write($file,'<? $m_token="0"; ?>',"w+"); 
  }}}
?>

</body>
</html>