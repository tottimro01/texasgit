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
if($val!=""){
$sql="update pha_tb_ball_list_live set   set_new='$val'  where b_id='$id' and b_add='$add'";
sql_query($sql);	
httpGet($hostserver."now/save.php");
live_write("../");
}
?>