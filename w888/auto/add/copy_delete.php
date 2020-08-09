<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?


require('../../inc/conn.php');
require('../../inc/function.php');

$view_date = _bdate();


$sql="INSERT IGNORE INTO  bom_tb_data_sport_end  select * from bom_tb_data_sport_today where b_process=1 ";
sql_query($sql);

$sql="delete from bom_tb_data_sport_today where  b_process=1 ";
sql_query($sql);
?>