

<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
$url_file="../json/online/m/".$_SESSION[mid].".json";
@unlink($url_file); // delete file 

if(isset($_SESSION['signin_site'])) {
	$url = $_SESSION['signin_site'];
}else if($_SESSION['HTTP_REFERER']!="") {
	$url = $_SESSION['HTTP_REFERER'];
}else {
	$url = 'login.php';
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