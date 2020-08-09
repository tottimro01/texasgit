<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../../inc/conn.php');	
$fzone = $_POST["fzone"];
$rs=sql_array("select f_refresh from bom_tb_data_refresh where f_zone = '$fzone'");
$arr = array();
$arr["f_refresh"] = $rs["f_refresh"];
echo json_encode($arr);
?>