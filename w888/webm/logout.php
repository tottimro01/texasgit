<?
include 'inc/conn.php';
	session_start();
	session_destroy();
	header("Location: ". $hostserver);
	exit();
?>