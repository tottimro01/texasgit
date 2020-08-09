<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
require('../inc/function.php');
require("../lang/th.php");
?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<TITLE>::: OHOBET :::</TITLE>
</head>

<body>
<?


$sql="select * from bom_tb_member  where   m_active=1 and m_count>0 order by m_id asc ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){	



######################รายการเคลื่อนไหว
$by='AUTO';
	
	$p_comment='ยกมา';
	$ptype=4;

$from=$rs[m_count];	
$bet=0;
$pay=$rs[m_count];
$sql="INSERT IGNORE INTO bom_tb_payment (p_date, p_from,	p_bet	,p_pay	,p_type,	r_id,	r_level,	r_agent_id, p_by, p_comment , p_datename) values(now(),'$from', '$bet', '$pay','$ptype','$rs[m_id]',5,'$rs[r_agent_id]','$by' ,'$p_comment' ,'".date("D")."') ";
sql_query($sql);

######################รายการเคลื่อนไหว



}
?>

</body>
</html>