<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?


require('../../inc/conn.php');
require('../../inc/function.php');

$view_date = _bdate();

$sql="select * from bom_tb_data_sport_today";
$num=sql_num($sql);
if($num==""){
$sql="TRUNCATE TABLE bom_tb_data_sport_today";
sql_query($sql);
$sql="TRUNCATE TABLE bom_tb_data_football_refresh";
sql_query($sql);
}
?>