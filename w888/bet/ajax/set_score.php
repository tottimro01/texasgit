<?php
require('../../inc/conn.php');	
$ex_id = explode("_" , $_POST["id"]);
$id = $ex_id[0];
$add = $ex_id[1];
$ty = $_POST["ty"];
$val = $_POST["val"];
$rs=sql_array("select * from bom_tb_data_sport_today where b_id = '$id'");
$ex_score = explode("-",$rs["b_score_live"]);
if($ty==1){
	$val = $val."-".$ex_score[1];
}else{
	$val = $ex_score[0]."-".$val;
}
$sql=sql_query("update bom_tb_data_sport_today set b_score_live = '$val' where b_id = '$id'");

include "write_main.php";
?>