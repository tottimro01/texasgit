<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?

require('inc/conn.php');
require('inc/function.php');

// require("lang/member_lang.php");
  require("lang/variable_lang.php");
require("lang/function_array.php");

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
	


$mo_array=array();
$num_array=array();

$sql="select *  from bom_tb_member where m_id='".$_SESSION['m_id']."'";
$re_m=sql_array($sql);
/*
$emconpay=@explode(',',$re_m['m_lotto_convert_pay']); 
$hpay=@explode(',',$re_m['m_lotto_pay_member']); 
$hdis=@explode(',',$re_m['m_lotto_dis_member']); 
*/
  if($_SESSION['m1']['m_lotto_setbet']==1){
			$mpay=@explode(',',$_SESSION['m1']['m_lotto_pay1']); 
			$mdis=@explode(',',$_SESSION['m1']['m_lotto_dis1']); 
	}elseif($_SESSION['m1']['m_lotto_setbet']==2){
			$mpay=@explode(',',$_SESSION['m1']['m_lotto_pay2']); 
			$mdis=@explode(',',$_SESSION['m1']['m_lotto_dis2']); 
	}else{
			$mpay=@explode(',',$_SESSION['m1']['m_lotto_pay3']); 
			$mdis=@explode(',',$_SESSION['m1']['m_lotto_dis3']); 
	}


$set_sum=array();
$set_sum2=array();
$sql="select  * from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."' and b_date='$view_date'  and b_accept=1   and (lot_type=4 or lot_type=5  or lot_type=18)     order by lot_type asc , play_number asc ";	
 $num=sql_num($sql);
 if($num==0){
$sql="select  * from  bom_tb_lotto_bill_play where m_id='".$_SESSION['m_id']."' and b_date='$view_date'  and b_accept=1   and (lot_type=4 or lot_type=5  or lot_type=18)     order by lot_type asc , play_number asc ";	
 }
$re=sql_query($sql);
while($rs=sql_fetch($re)){
	


##############ซื้อแบบตัว
 if($_SESSION['m1']['m_lotto_convert']==1){
	if($type_lot==4 or $type_lot==5 or $type_lot==18){
$bet_new=round(1000/$mpay[$type_lot],2);
	}
}
##############ซื้อแบบตัว

$totalt=number_format($rs['b_total']/$bet_new).' '.$lang_member[548];
$totalx=(( ($rs['b_total']/$bet_new)*$emconpay[$rs['lot_type']]));

$set_sum[$rs['play_number']][$rs['lot_type']][]=$totalt;	
$set_sum2[$rs['play_number']][$rs['lot_type']][]=$totalx;	


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
	

<title>
<?=$re_m['m_user'];?>
Date :
<?=$_GET['d'];?>
</title>
<script src="js/jquery-1.9.1.min.js?v=2019"></script>
<div align="center">

<div class="no">
<table width="750" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="90%"><h3>User : <?=$_SESSION['m_user'];?> Date :<?=$_GET['d'];?></h3> </td>
    <td width="10%"><input type="button"  value="Print"  onclick="javascript:print();"/></td>
  </tr>
</table>
</div>
<div class="page-break-no">&nbsp;</div>
<div class="yes" style="font-size:16px">
<span style="float: right;">User : <?=$_SESSION['m_user'];?> Date :<?=$_GET['d'];?></span>
 </div>
 <table width="750" border="0" cellspacing="0" cellpadding="0" class="ball txt10">
 <tr> <td>
 <table  border="0" cellpadding="5" cellspacing="1" class="ball txt10" style="float:right; width:48%;">
  <tbody>
 <tr align="center" class="tb_title_lotto">
      <td width="22%" ><?=$lang_member[160];?></td>
      <td width="14%" ><?=$lang_member[381];?></td>

      <td width="16%" ><?=$lang_member[728];?></td>
      <td width="16%" ><?=$lang_member[610];?></td>
      <td width="16%" ><?=$lang_member[729];?></td>
      <td width="16%" ><?=$lang_member[611];?></td>
    </tr>
    <? 
$sum3t=array();
$sum3p=array();
$sum3k=array();

 $sql="select  *  from  bom_tb_lotto_bill_play_live where    m_id='".$_SESSION['m_id']."' and b_date='$view_date'  and b_accept=1    and (lot_type!=4 and lot_type!=5  and lot_type!=18)     order by lot_type asc , play_number asc ";	
  $num=sql_num($sql);
 if($num==0){
 $sql="select  *  from  bom_tb_lotto_bill_play where    m_id='".$_SESSION['m_id']."' and b_date='$view_date'  and b_accept=1    and (lot_type!=4 and lot_type!=5  and lot_type!=18)     order by lot_type asc , play_number asc ";	
 }
$re3=sql_query($sql);
while($rs3=sql_fetch($re3)){

$sum3t[]=$rs3["b_total"];
$sum3p[]=-($rs3["b_total"]-$rs3["b_pay"]);
$sum3k[]=($rs3["b_pay"])+(-$rs3["b_bonus"]);
$sum3b[]=(-$rs3["b_bonus"]);
	?>
<tr align="center" class="tr_lot" >

      <td><?=$lot_type[$_SESSION['lang']][1][$rs3["lot_type"]]?></td>
      <td><?=_dt($rs3["play_number"])?></td>
      <td align="right"><?=number_format($rs3["b_total"],2)?></td>
      <td align="right"><?=number_format(-($rs3["b_total"]-$rs3["b_pay"]),2)?></td>
        <td align="right"><?=number_format(-$rs3["b_bonus"],2)?></td>
      <td align="right"><?=number_format(($rs3["b_pay"])+(-$rs3["b_bonus"]),2)?></td>
      
    </tr>
   <? } ?>

 <tr align="center" class="tr_lot">

      <td>&nbsp;</td>
      <td bgcolor="#D6D6D6"><?=$lang_member[611];?></td>
      <td align="right"><?=_cbn(@array_sum($sum3t),2);?></td>
      <td align="right"><?=_cbn(@array_sum($sum3p),2);?></td>
      <td align="right"><?=_cbn(@array_sum($sum3b),2);?></td>
      <td align="right"><?=_cbn(@array_sum($sum3k),2);?></td>
      
    </tr>
  </tbody>
</table>


<table  border="0" cellpadding="5" cellspacing="1" class="ball txt10" style="float: left; width:50%;">
  <tbody>
    <tr align="center" class="tb_title_lotto">
<td width="10%" align="center" ><?=$lang_member[381];?></td>
 <td width="20%"  align="center" ><?=$lang_member[448];?></td>
 <td width="20%"  align="center" ><?=$lang_member[450];?></td>
 <td width="10%" align="center" ><?=$lang_member[381];?></td>
 <td width="20%"  align="center" ><?=$lang_member[448];?></td>
 <td width="20%"  align="center" ><?=$lang_member[450];?></td>

  </tr>
  <?
  $ss_s1=array();
   $ss_s2=array();
    $ss_s3=array();
	 $ss_s4=array();
  
  
	for($i=0;$i<=49;$i++){
		$num =sprintf("%02d",$i);
		$num2=$num+50;
		
		$sum1=array_sum($set_sum[$num][4]);
		$sum2=array_sum($set_sum[$num][5]);
		$sum3=array_sum($set_sum[$num2][4]);
		$sum4=array_sum($set_sum[$num2][5]);
		
  $ss_s1[]=$sum1;
   $ss_s2[]=$sum2;
    $ss_s3[]=$sum3;
	 $ss_s4[]=$sum4;
	 
	 
if($sum1>0){$sum1c=number_format($sum1);}else{ $sum1c='';}
if($sum2>0){$sum2c=number_format($sum2);}else{ $sum2c='';}
if($sum3>0){$sum3c=number_format($sum3);}else{ $sum3c='';}
if($sum4>0){$sum4c=number_format($sum4);}else{ $sum4c='';}
?>
<tr align="center" class="tr_lot" >
    <td  align="center" bgcolor="#D6D6D6"><b><?=$num;?></b></td>
  <td  align="right"><strong><?=$sum1c;?></strong>&nbsp;&nbsp;</td>
  <td  align="right"><strong><?=$sum2c;?></strong>&nbsp;&nbsp;</td>
       <td  align="center" bgcolor="#D6D6D6"><b><?=$num2;?></b></td>
  <td  align="right"><strong><?=$sum3c;?></strong>&nbsp;&nbsp;</td>
  <td  align="right"><strong><?=$sum4c;?></strong>&nbsp;&nbsp;</td>
  </tr>
  <? }?>
  </tbody>  
  
  <?
		$sum1x=array_sum($ss_s1);
		$sum2x=array_sum($ss_s2);
		$sum3x=array_sum($ss_s3);
		$sum4x=array_sum($ss_s4);
  ?>
    <tfoot>
  <tr class="bg_td">
    <td  align="center"><b><?=$lang_member[611];?></b></td>
  <td  align="right"><strong><?=number_format($sum1x);?></strong>&nbsp;<?=$lang_member[548];?>&nbsp;</td>
 <td  align="right"><strong><?=number_format($sum2x);?></strong>&nbsp;<?=$lang_member[548];?>&nbsp;</td>
     <td  align="center"><b><?=$lang_member[611];?></b></td>
     <td  align="right"><strong><?=number_format($sum3x);?></strong>&nbsp;<?=$lang_member[548];?>&nbsp;</td>
   <td  align="right"><strong><?=number_format($sum4x);?></strong>&nbsp;<?=$lang_member[548];?>&nbsp;</td>
  </tr>
 
         <tr class="bg_td">
    <td  align="center" bgcolor="#D6D6D6"><b><?=$lang_member[549];?></b></td>
  <td  align="right"><?=$lang_member[448];?> : <strong><?=number_format($sum1x+$sum3x);?></strong>&nbsp;<?=$lang_member[548];?>&nbsp;</td>
 <td  align="right"><?=$lang_member[450];?> : <strong><?=number_format($sum2x+$sum4x);?></strong>&nbsp;<?=$lang_member[548];?>&nbsp;</td>
     <td colspan="3"  align="center"><?=$lang_member[304];?> : <strong><?=number_format($sum1x+$sum3x+$sum2x+$sum4x);?></strong>  <?=$lang_member[548];?></td>
       </tr>
  </tfoot>
</table>



</td></tr></table>

							</div>
                            
			
		