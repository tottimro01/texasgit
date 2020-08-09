<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?

require('inc/conn.php');
require('inc/function.php');

  require("lang/variable_lang.php");
// require("lang/member_lang.php");
// require("/home/ohoking/domains/ohoking.com/public_html/admin_lang/export/lang_member_".$_SESSION['lang'].".php");
require("lang/function_array.php");

$xzone = $_GET['zone_send'];
$xrob = $_GET['rob_send'];

$clot = array_map('trim', explode(",", $_GET['clot']));
$clot = "'" . implode("','", $clot) . "'"; 

$view_date=$_GET['d'];

  if($_GET['r']==""){
$view_rob=$lang_member[304];
$q_rob = "";
}else{
$q_rob = " and lot_rob = '".$_GET['r']."'";
$view_rob=$lang_g['lotrob'][$_GET['r']];
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
    <td width="90%"><h3>User : <?=$_SESSION['m_user'];?>  <?=$lang_member[160];?> :<?=$lang_g['lotZone'][$xzone];?> <?=$lang_member[146];?> :<?=$_GET['d'];?> <?=$lang_member[643];?> :<?=$view_rob?></h3> </td>
    <td width="10%"><input type="button"  value="Print"  onclick="javascript:print();"/></td>
  </tr>
</table>
</div>
<div class="page-break-no">&nbsp;</div>
<div class="yes" style="font-size:16px">
<span style="float: right;">User : <?=$_SESSION['m_user'];?>  Channel :<?=$lang_g['lotZone'][$xzone];?> <?=$lang_member[48];?> :<?=$_GET['d'];?> <?=$lang_member[643];?> :<?=$view_rob?></span>
 </div>
<table width="750" border="0" cellspacing="0" cellpadding="0" class="ball txt10">
  <tbody>
    <tr align="center" class="tb_title_lotto">
      <td width="9%" bgcolor="#D6D6D6"><?=$lang_member[466];?></td>
      <td width="18%" height="25" bgcolor="#D6D6D6"><?=$lang_member[407];?></td>
      <td width="13%" bgcolor="#D6D6D6"><?=$lang_member[160];?></td>
      <td width="10%" bgcolor="#D6D6D6"><?=$lang_member[381];?></td>
      <td width="5%" bgcolor="#D6D6D6"><?=$lang_member[643];?></td>
      <td width="10%" bgcolor="#D6D6D6"><?=$lang_member[300];?></td>
      <td width="10%" bgcolor="#D6D6D6"><?=$lang_member[610];?></td>
    <td width="10%" bgcolor="#D6D6D6"><?=$lang_member[470];?></td>
      <td width="10%" bgcolor="#D6D6D6"><?=$lang_member[611];?></td>
    </tr>
    
    <? 
$x=1;	
$sum1=array();
$sum2=array();
$sum3=array();
	

$sql="select * from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."'  and b_accept=1 $q_rob  and lot_zone = '$xzone'  and b_date='$view_date' order by play_id desc  ";	
$re=sql_query($sql);
while($rs=sql_fetch($re)){
	
$sum1[]=-$rs["b_total"];

$sum2[]=$rs["b_total"]-$rs["b_pay"];
$sum3[]=$rs["b_bonus"];
$sum4[]=(-$rs["b_pay"])+$rs["b_bonus"];
	?>
                  <tr align="center" class="tr_lot">
                  <td><?=$rs['play_id']?></td>
     <td><?=date("d/m/Y H:i:s" , $rs["play_timestam"]);?></td>
      <td><?=$lot_type[$_SESSION['lang']][3][$rs["lot_type"]]?></td>
      <td><?=_dt($rs["play_number"])?></td>

      <td><?=$lot_rob[$rs["lot_rob"]]?></td>
      <td align="right"><?=number_format(-$rs["b_total"],2)?>&nbsp;</td>
      <td align="right"><?=_cbp($rs["b_total"]-$rs["b_pay"],2)?>&nbsp;</td>
          <td align="right"><?=_cbp($rs["b_bonus"],2)?>&nbsp;</td>
      <td align="right"><?=_cbp((-$rs["b_pay"])+$rs["b_bonus"],2)?>&nbsp;</td>
                  </tr>
                  <? $x++; } ?>
                  
                  
                  
                  
   <?               
$sql="select * from  bom_tb_lotto_bill_play where m_id='".$_SESSION['m_id']."'  and b_accept=1 $q_rob  and lot_zone = '$xzone'  and b_date='$view_date' and lot_type in ($clot) order by play_id desc  ";	
$re=sql_query($sql);
while($rs=sql_fetch($re)){
	
$sum1[]=-$rs["b_total"];

$sum2[]=$rs["b_total"]-$rs["b_pay"];
$sum3[]=$rs["b_bonus"];
$sum4[]=(-$rs["b_pay"])+$rs["b_bonus"];
	?>
                  <tr align="center" class="tr_lot">
                  <td><?=$rs['play_id']?></td>
     <td><?=date("d/m/Y H:i:s" , $rs["play_timestam"]);?></td>
      <td><?=$lot_type[$_SESSION['lang']][3][$rs["lot_type"]]?></td>
      <td><?=_dt($rs["play_number"])?></td>

      <td><?=$lot_rob[$rs["lot_rob"]]?></td>
      <td align="right"><?=number_format(-$rs["b_total"],2)?>&nbsp;</td>
      <td align="right"><?=_cbp($rs["b_total"]-$rs["b_pay"],2)?>&nbsp;</td>
          <td align="right"><?=_cbp($rs["b_bonus"],2)?>&nbsp;</td>
      <td align="right"><?=_cbp((-$rs["b_pay"])+$rs["b_bonus"],2)?>&nbsp;</td>
                  </tr>
                  <? $x++; } ?>
    
    <tr bgcolor="#CFDCFF">
      <td height="18" colspan="5" align="center"><?=$lang_member[611];?></td>
      <td align="right" class="txt_back11b"><?=number_format(@array_sum($sum1),2)?>&nbsp;</td>
      <td align="right" class="txt_back11b"><?=number_format(@array_sum($sum2),2)?>&nbsp;</td>
      <td align="right" class="txt_blue11b"><?=number_format(@array_sum($sum3),2)?>&nbsp;</td>
       <td align="right" class="txt_blue11b"><?=number_format(@array_sum($sum4),2)?>&nbsp;</td>
    </tr>
  </tbody>
</table>

							</div>
                            
			
		