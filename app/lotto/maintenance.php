<?
	session_start();
	
	// require('inc/conn.php');	
	require('../inc/function.php');	
	echo $date2_js=file_get_contents2("http://w1.wan1991.com/maintenance.php?f=app");
?>