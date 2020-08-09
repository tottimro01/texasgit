<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
//Step & YODAY
require('../../inc/conn.php');
require('../../inc/function.php');

if($_SESSION[admin]!=1){exit();}



$id = $_POST["id"];
$add = $_POST["add"];
$val = $_POST["val"];
$per = $_POST["per"];
$old = $_POST["old"];
if( $val>$old){
	$updown=1;
	}else{
		$updown=2;
		}

$val20= number_format(_wp20( $val , $per ),2);
$val30= number_format(_wp2( $val20 , $per ),2);

$sql="update pha_tb_ball_list_live set   b_goal_1='$val20' ,  b_goal_2='$val30'  where b_id='$id' and b_add='$add'";
sql_query($sql);
$sql="delete from pha_tb_ball_list_live_bb  where b_id='$id' and b_add='$add' and  b_type=2 ";
sql_query($sql);		
$sql="insert into  pha_tb_ball_list_live_bb  (b_id, b_add,b_type,b_time,b_updown) values ('$id','$add','2','$time_stam','$updown') ";
sql_query($sql);		


############# set log user
$old = $_POST["old"];
$_date = date("d-m-Y");
$_time = date("H:i:s");
$sql2="INSERT INTO z_live_log (`id_log`,`id_usr`,`id_ball`,`add`,`type`,`old`,`new`,`zdate`,`ztime`) VALUES (NULL,'".$_SESSION['usr_id_live']."','$id','$add','3','$old','$val','$_date','$_time');";
sql_query($sql2); 

##############

httpGet($hostserver."now/save.php");
live_write("../");
?>