<?php
require('../../inc/conn.php');	
$ex_id = explode("_" , $_POST["id"]);
$id = $ex_id[0];
$add = $ex_id[1];
$type = $ex_id[2];
$ty = $_POST["ty"];
$val = $_POST["val"];
if($ty==1){
	$sql=sql_query("update bom_tb_data_sport_today set b_hdc_1 = '$val' where b_id = '$id' and b_add = '$add'");
}else if($ty==2){
	$sql=sql_query("update bom_tb_data_sport_today set b_goal_1 = '$val' where b_id = '$id' and b_add = '$add'");
}else if($ty==3){
	$sql=sql_query("update bom_tb_data_sport_today set b_1h_hdc_1 = '$val' where b_id = '$id' and b_add = '$add'");
}else if($ty==4){
	$sql=sql_query("update bom_tb_data_sport_today set b_1h_goal_1 = '$val' where b_id = '$id' and b_add = '$add'");
}else if($ty=="5h"){
	$sql=sql_query("update bom_tb_data_sport_today set b_1x2_1 = '$val' where b_id = '$id' and b_add = '$add'");
}else if($ty=="5x"){
	$sql=sql_query("update bom_tb_data_sport_today set b_1x2_draw = '$val' where b_id = '$id' and b_add = '$add'");
}else if($ty=="5a"){
	$sql=sql_query("update bom_tb_data_sport_today set b_1x2_2 = '$val' where b_id = '$id' and b_add = '$add'");
}else if($ty=="6h"){
	$sql=sql_query("update bom_tb_data_sport_today set b_1h_1x2_1 = '$val' where b_id = '$id' and b_add = '$add'");
}else if($ty=="6x"){
	$sql=sql_query("update bom_tb_data_sport_today set b_1h_1x2_draw = '$val' where b_id = '$id' and b_add = '$add'");
}else if($ty=="6a"){
	$sql=sql_query("update bom_tb_data_sport_today set b_1h_1x2_2 = '$val' where b_id = '$id' and b_add = '$add'");
}else if($ty==7){
	$sql=sql_query("update bom_tb_data_sport_today set b_odd = '$val' where b_id = '$id' and b_add = '$add'");
}

include "write_main.php";
?>