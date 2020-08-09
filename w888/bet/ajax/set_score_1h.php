<?php
require('../../inc/conn.php');	
$ex_id = explode("_" , $_POST["id"]);
$id = $ex_id[0];
$add = $ex_id[1];
$ty = $_POST["ty"];
$val = $_POST["val"];

$sql=sql_query("update bom_tb_data_sport_today set b_score_1h = '$val' where b_id = '$id'");

include "write_main.php";
?>