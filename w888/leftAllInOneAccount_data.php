<?php   ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
if($_SESSION['mid']==""){
exit();
}
require('inc/conn.php');
require('inc/function.php');

require("lang/variable_lang.php");
// require("lang/member_lang.php");
// require("/home/ohoking/domains/ohoking.com/public_html/admin_lang/export/lang_member_".$_SESSION['lang'].".php");
require("lang/function_array.php");

if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}

$sql="select m_count ,m_bet_date from bom_tb_member where m_id='".$_SESSION['mid']."'";
$re_m=sql_array($sql);
if($re_m[m_count]<=0){$re_m[m_count]=0;}
$_SESSION['mcount'] = $re_m[m_count];

$sql="select sum(b_total) as btotal from bom_tb_football_bill where m_id='$_SESSION[mid]'  and b_status=5";
$reb1=sql_array($sql);
$sql="select sum(b_total) as btotal from bom_tb_lotto_bill_play where m_id='$_SESSION[mid]'  and play_status=7";
$reb2=sql_array($sql);
$sql="select sum(b_total) as btotal from bom_tb_games_bill_play where m_id='$_SESSION[mid]'  and play_status=7";
$reb3=sql_array($sql);
$_SESSION['mnot']=$reb1[btotal]+$reb2[btotal]+$reb3[btotal];

$txt = array();
$txt["cre"] = $_SESSION['m_currency']." ".number_format($re_m['m_count'],2);
$txt["incre"] = number_format($_SESSION['mnot'],2);


?>
<script>
var cashClass = "UdrDogOddsClass";
var txt_cash= "<?=number_format(floatval($re_m['m_count']-floatval($_SESSION['mcredit'])), 2);?>";
var txt_outstanding = "<?=number_format($_SESSION['mnot'],2)?>";
var txt_netposition = "3.00";
var txt_betcredit= "<?=number_format($re_m['m_count'],2)?>";
var txt_credit= "<?=number_format($_SESSION['mcredit'] , 2)?>";
var txt_login= "<?=$_SESSION['m_login']?>";
var txt_transaction= "<?=$re_m['m_bet_date'];?>";
var txt_expassword= "4/2/2019 7:42:18 PM";
var doupdate = '<?=$_POST['accountUpdate'];?>';
var txt_cashNoDec = "0";
parent.loadAccountData(doupdate);
</script>