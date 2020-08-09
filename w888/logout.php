<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
require('inc/conn.php');
require('inc/function.php');

#################API

 $url=$x_process.'api/getBalance2.php?user='.$_SESSION['m_user'];
  file_get_contents8($url);

  
  
  
$lang = $_SESSION['lang']!=""?$_SESSION['lang']:"en";
$url_file="json/online/m/".$_SESSION['m_id'].".json";
@unlink($url_file); // delete file 

if(isset($_SESSION['signin_site']) and $_SESSION['signin_site'] != "") {
	$url = $_SESSION['signin_site'];
	// $url = 'http://www.'.$check_url;
}else if($_SESSION['HTTP_REFERER']!="") {
	#$url = $_SESSION['HTTP_REFERER'];
	$url = 'http://www.'.$check_url;
}else {
	// $url = 'login.php?hidSelLang='.$lang;
	$url = 'http://www.'.$check_url;
}
@session_start(); 
@session_destroy();


// if(isset($url)) {
// @header('Location: '.$url);
// }
// else if($_SESSION['HTTP_REFERER']!=""){
// @header('Location: '.$_SESSION['HTTP_REFERER'].'');
// }else{
// @header('Location: login.html');	
// 	}
@header('Location: '.$url);	

exit();

?>