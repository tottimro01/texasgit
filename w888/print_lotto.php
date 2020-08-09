<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?

require('inc/conn.php');
require('inc/function.php');

// require("lang/member_lang.php");
  require("lang/variable_lang.php");
require("lang/function_array.php");

$clot = array_map('trim', explode(",", $_GET['clot']));
$clot = "'" . implode("','", $clot) . "'"; 

$zone=1;
$rob=1;
$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
$ok_date=sql_array($sql);
#print_r($date_bet);
if($_GET['d']==""){
$view_date=$ok_date['ok_date'];
}else{
$view_date=$_GET['d'];
	}
	

?>
<meta charset="UTF-8">
<style type="text/css">
@media all
{
	.page-break	{ display:none; }
	.page-break-no{ display:none; }
}

@media screen
  {
.yes{ display:none;}
.ball{ font-size:12px;}
.r12{ font-size:12px;}
.tcr{ text-decoration:underline; color:#F00; }
.ball td{border: 1px dotted black;}
.bb{ font-weight:bold;}
.txt10{ font-size:12px; font-weight:100; }
table{border-collapse:collapse; }

  }
  
@media print
  {
.no{ display:none;}
.ball{ font-size:12px;}
.r12{ font-size:12px;}
.tcr{ text-decoration:underline; color:#000;}
.ball td{border: 1px solid black;}
.bb{ font-weight:bold;}
.txt10{ font-size:12px; font-weight:100; }
table{border-collapse:collapse; }
	.page-break	{ display:block;height:1px; page-break-before:always; }
	.page-break-no{ display:block;height:1px; page-break-after:avoid; }	
  }

</style>
	

<title>Date :
<?=$_GET['d'];?>
</title>
<script src="js/jquery-1.9.1.min.js?v=2019"></script>
<div align="center">

<div class="no">
<table width="750" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="90%"><h3>User : <?=$_SESSION['m_user'];?>   Date :<?=$_GET['d'];?></h3> </td>
    <td width="10%"><input type="button"  value="Print"  onclick="javascript:print();"/></td>
  </tr>
</table>
</div>
<div class="page-break-no">&nbsp;</div>
<div class="yes" style="font-size:16px">
<span style="float: right;">User : <?=$_SESSION['m_user'];?>  Date :<?=$_GET['d'];?></span>
 </div>
<table width="750" border="0" cellspacing="0" cellpadding="0" class="ball txt10">
  <tbody>
    <tr align="center" class="tb_title_lotto">
      <td width="9%" bgcolor="#D6D6D6"><?=$lang_member[466];?></td>
      <td width="18%" height="25" bgcolor="#D6D6D6"><?=$lang_member[407];?></td>
      <td width="13%" bgcolor="#D6D6D6"><?=$lang_member[160];?></td>
      <td width="12%" bgcolor="#D6D6D6"><?=$lang_member[381];?></td>
      <td width="12%" bgcolor="#D6D6D6"><?=$lang_member[300];?></td>
      <td width="12%" bgcolor="#D6D6D6"><?=$lang_member[610];?></td>
    <td width="12%" bgcolor="#D6D6D6"><?=$lang_member[470];?></td>
      <td width="12%" bgcolor="#D6D6D6"><?=$lang_member[611];?></td>
    </tr>
    
    <? 
$x=1;	
$sum1=array();
$sum2=array();
$sum3=array();
	
	/*
$url_file3="json/lotto/betting/sum/".$_SESSION['m_id']."/".$view_date.".json";	
$ok_js=file_get_contents2($url_file3);
$ok_bet = json_decode2($ok_js, true);
#print_r($ok_bet);
foreach($ok_bet as $rs){
	
	*/
$sql="select * from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."'  and b_accept=1    and b_date='$view_date' and lot_type in ($clot) order by play_timestam desc , play_id asc  ";	
 $num=sql_num($sql);
 if($num==0){
$sql="select * from  bom_tb_lotto_bill_play where m_id='".$_SESSION['m_id']."'  and b_accept=1    and b_date='$view_date' order by play_timestam desc , play_id asc  ";	
 }
$re=sql_query($sql);
while($rs=sql_fetch($re)){
	
$sum1[]=-$rs["b_total"];

#$sum2[]=$rs["b_total"]-$rs["play_pay"];
#$sum3[]=-$rs["play_pay"];


$sum2[]=$rs["b_total"]-$rs["b_pay"];
$sum3[]=$rs["b_bonus"];
$sum4[]=(-$rs["b_pay"])+$rs["b_bonus"];
	?>
                  <tr align="center" class="tr_lot">
                  <td><?=$rs['play_id']?></td>
                    <td><?=date("d/m/Y H:i:s" , $rs["play_timestam"]);?></td>
      <td><?=$lot_type[$_SESSION['lang']][1][$rs["lot_type"]]?></td>
      <td><?=_dt($rs["play_number"])?></td>
      <td><?=number_format(-$rs["b_total"],2)?></td>
      
<!-- JSON     <td><?=_cbp($rs["b_total"]-$rs["play_pay"],2)?></td>
      <td><?=_cbp((-$rs["play_pay"])+$rs["b_bonus"],2)?></td> -->
      
      <td><?=_cbp($rs["b_total"]-$rs["b_pay"],2)?></td>
          <td><?=_cbp($rs["b_bonus"],2)?></td>
      <td><?=_cbp((-$rs["b_pay"])+$rs["b_bonus"],2)?></td>
                  </tr>
                  <? $x++; } ?>
    
    <tr bgcolor="#CFDCFF">
      <td height="18" colspan="4" align="center"><?=$lang_member[611];?></td>
      <td align="center" class="txt_back11b"><?=number_format(@array_sum($sum1),2)?></td>
      <td align="center" class="txt_back11b"><?=number_format(@array_sum($sum2),2)?></td>
      <td align="center" class="txt_blue11b"><?=number_format(@array_sum($sum3),2)?></td>
       <td align="center" class="txt_blue11b"><?=number_format(@array_sum($sum4),2)?></td>
    </tr>
  </tbody>
</table>

							</div>
                            
			
