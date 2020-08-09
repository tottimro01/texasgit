<?php
require('../../inc/conn.php');	
$ex_id = explode("_" , $_POST["id"]);
$id = $ex_id[0];
$add = $ex_id[1];
$type = $ex_id[2];
$ty = $_POST["ty"];
$val = $_POST["val"];

if($ty==1){
	$sql=sql_query("update bom_tb_data_sport_today set b_hdc = '$val' where b_id = '$id' and b_add = '$add'");
}else if($ty==2){
	$sql=sql_query("update bom_tb_data_sport_today set b_goal = '$val' where b_id = '$id' and b_add = '$add'");
}else if($ty==3){
	$sql=sql_query("update bom_tb_data_sport_today set b_1h_hdc = '$val' where b_id = '$id' and b_add = '$add'");
}else if($ty==4){
	$sql=sql_query("update bom_tb_data_sport_today set b_1h_goal = '$val' where b_id = '$id' and b_add = '$add'");
}

include "write_main.php";
?>