<?php
require('../../inc/conn.php');	
$ex_id = explode("_" , $_POST["id"]);
$id = $ex_id[0];
$add = $ex_id[1];
$type = $ex_id[2];
$val = ($_POST['val'] == 'X') ? 1 : 0;
if($type=="1h"){
	$sql=sql_query("update bom_tb_data_sport_today set b_1h_accept = '$val' where b_id = '$id' and b_add = '$add'");
}else{
	$sql=sql_query("update bom_tb_data_sport_today set b_accept = '$val' where b_id = '$id' and b_add = '$add'");
}

include "write_main.php";
?>