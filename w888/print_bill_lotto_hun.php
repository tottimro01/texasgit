<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');

// require("lang/member_lang.php");
  require("lang/variable_lang.php");
require("lang/function_array.php");



$sql="select * from bom_tb_lotto_bill_live where bill_id='".$_GET['id']."' and m_id='".$_SESSION['m_id']."'  and b_accept=1 ";
$ree=sql_array($sql);


$zone=$ree['lot_zone'];
$rob=$ree['lot_rob'];
$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
$ok_date=sql_array($sql);

$view_date=$ok_date['ok_date'];

$sql="select *  from bom_tb_member where m_id='".$ree['m_id']."'";
$re_m=sql_array($sql);


$sql="select * from bom_tb_agent where r_id='".$re_m['r_id']."'";
$re_r=sql_array($sql);
	 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?=$lang_member[607];?>:<?=$ree['bill_id'];?></title>
<style type="text/css">

.sbt{border-bottom:1px dashed #999999;}
.sb2{border-bottom:1px dashed #999999;}
.win{ text-decoration:underline; color:#F00;}


@media screen
  {
.yes{ display:none;}
body{ font-size:14px;}
  }
  
@media print
  {
.no{ display:none;}
body{ font-size:14px;
color:#000;}
.txt10{ font-size:14px;}
  }
  
@media screen,print
  {
.cr {color: #000000;}
.cbu {color: #000000;}
.cb {color: #000000;}
.cw {color: #000000;}

.ball td{border:1px  solid #000000;	}
.r12{ font-size:14px;}
.bb{ font-weight:bold;}
.tcr{ text-decoration:underline; color:#000000;}

  }

</style>
</head>

<body>




<table width="100%" border="0" cellpadding="0" cellspacing="0"     >
  <tr>
    <td colspan="2" align="center" class="cb">
    <b><?=$lang_g['lotZone'][$ree['lot_zone']];?> <?=$lang_member[607];?>  <?=$ree['bill_id'];?></b>
     <br><b><?=$lang_member[569];?> <?=_cvf2($ok_date['o_limit_time'],5 ,$_SESSION['lang']);?> 
		<? if($lot_zone_bet[$ree['lot_zone']]>1){ ?>
		<? if($ree['lot_zone']==18){ ?>
  <?=$lang_member[688];?> <?=$ree['lot_rob'];?>
		<? }else if($ree['lot_zone']==19){ ?>
		<?=$lang_member[643];?> <?=$lot_robmun[$ree['lot_rob']];?>
		<? }else{ ?>
		<?=$lang_member[643];?><?=$lang_g['lotrob'][$ree['lot_rob']];?>
		<? } } ?>
     <br><?=$lang_member[146];?> <span class="cr"><?=_cvf2($ree['b_timestam'],4,$_SESSION['lang']);?></span>
    
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center" class="cbu">
<!--  ยอดเต็ม <span class="cr"> <?=number_format($ree[b_total]);?></span> บาท   : ส่วนลด   <span class="cr"> <?=number_format($ree[b_total]-$ree[b_pay]);?></span>
    <? if($ree[b_status]==1 or $ree[b_status]==2){?>
     รับเงิน <span class="cr"><?=number_format($ree[b_bonus]);?></span> บาท
    <? }?>  -->
    <hr>
    <?
echo $lang_member[571].' :  ['.$re_r['r_user'].']';
echo '<br>'.$lang_member[573].' :  ['.$re_m['m_user'].']';
?>

    <hr>
    </td>
  </tr>

  <?
  $sum=array();
  $c_num=array();
   $xss=0;
 $sql="select * from bom_tb_lotto_bill_play_live where bill_id='".$ree['bill_id']."'   and b_accept=1  order by play_id asc ";
  $re=sql_query($sql);
  while($rs=sql_fetch($re)){
	  
   	
	
$sum[]=ceil( $rs['b_total']); 
  ?>
  <tr <?  //$bgc = ($bgc=="#fff") ? "#e3e3e3" : "#fff"; {echo"style='background:$bgc'";}?> class="cb" <? if($rs["play_status"]==1){ echo "bgcolor='#FF9900'";} ?>>
    <td class="sb2">
      <b>*<?=_dt($rs['play_number']);?>*</b>&nbsp;[  <?=$lot_type[$_SESSION['lang']][3][$rs['lot_type']];?> ]
      
      
    <b style="float:right;">--<?=number_format(ceil( $rs['b_total']));?>--</b>    </td>
  </tr>
  <? 
  $c_num[]=$xss;
   $xss++; } ?>
</table>
<br style="clear:both;">
<br>
<b style=" float:right;"><?=$lang_member[701];?> <span class="cr"> <?=number_format(ceil(@array_sum($sum) ));?></span> <?=$_SESSION['m_currency'];?></b>
<br>
<br style="clear:both;">
<br>
<div class="sb2" ></div>
<hr style="clear:both;">
<div  style="color:#000000;" align="center">
<?
$sql="select r_mes_bin from pha_tb_agent where r_id='".$_SESSION['crid']."'";
$rem=sql_array($sql);
echo $rem['r_mes_bin'];
$barcode=$ree['bill_id'];
?>
</div>
<center><img src="barcode.php?barcode=<?php echo $barcode.'&width=250&height=50';?>" /></center>


<p>&nbsp;</p>
<div align="center"  class="no">
<input type="button"  value="<?=$lang_member[703];?>"  onclick="javascript:window.print();window.close();"/>&nbsp;&nbsp;|&nbsp;&nbsp;
<input type="button"  value="<?=$lang_member[704];?>"  onclick="javascript:window.close();"/>
</div>
</body>
</html>