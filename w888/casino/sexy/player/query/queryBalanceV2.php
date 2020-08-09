<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../../../inc/conn.php');
require('../../../inc/function.php');

$sql="select m_id,m_count from bom_tb_member where m_id='".$_SESSION['m_id']."'";
$re_m=sql_array($sql);

?>
{"status":"200","balance":"<?=$re_m["m_count"]?>","systemMaintain":"0"}