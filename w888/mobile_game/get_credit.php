<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}

$sql="select m_count from bom_tb_member where m_id='".$_SESSION['m_id']."'";
$re_m=sql_array($sql);
if($re_m[m_count]<=0){$re_m[m_count]=0;}
$_SESSION['m_count'] = $re_m[m_count];

$sql="select sum(b_total) as btotal from bom_tb_football_bill where m_id='$_SESSION[mid]'  and b_status=5";
$reb1=sql_array($sql);
$sql="select sum(b_total) as btotal from bom_tb_lotto_bill_live where m_id='$_SESSION[mid]'  and b_status=5";
$reb2=sql_array($sql);
$sql="select sum(b_total) as btotal from bom_tb_lotto_hun_bill where m_id='$_SESSION[mid]'  and b_status=5";
$reb3=sql_array($sql);

$sql="select sum(b_total) as btotal from bom_tb_games_bill_play_live where m_id='$_SESSION[mid]'  and play_status=7";
$reb4=sql_array($sql);

$_SESSION['mnot']=$reb1[btotal]+$reb2[btotal]+$reb3[btotal]+$reb4[btotal];

$txt = array();
$txt["cre"] = $_SESSION['m_currency']." ".number_format($re_m['m_count'],2);
$txt["incre"] = number_format($_SESSION['mnot'],2);
$txt["cre1"] = number_format($re_m['m_count'],2);
echo json_encode($txt);
?>