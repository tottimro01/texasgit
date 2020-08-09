<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
	require('../../inc/conn.php');
	require('../../inc/function.php');

$_val = $_POST['val'];
$_add = $_POST['add'];
$_bid = $_POST['acc'];

if($_add == 1 || $_add == 2 || $_add == 3){
	
		
	if(sql_query("UPDATE pha_tb_ball_list_live SET b_active = $_val WHERE b_id =$_bid AND b_add =$_add")){
		echo "<img src='img/inactive.png'>";	
	}

	
}
	
?>

