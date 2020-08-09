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

#print_r($lot_pay_big5);
 
$mo_array=array();
$num_array=array();


if($_POST['qq']!=""){
	$qq=" and  bill_id='".$_POST['qq']."'";
	}
$sql="select * from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."' and b_date='$view_date'  and b_accept=1  $qq  order by lot_type asc , play_number asc ";	
 $num=sql_num($sql);
 if($num==0){
   $sql="select * from  bom_tb_lotto_bill_play where m_id='".$_SESSION['m_id']."' and b_date='$view_date'  and b_accept=1  $qq  order by lot_type asc , play_number asc ";	
 }
	$re=sql_query($sql);
	while($rs=sql_fetch($re)){

	$mo_array[$rs['lot_type']][$rs['play_number']][]=	($rs['b_total']);
	$num_array[$rs['lot_type']][]=$rs['play_number'];
}
 #print_r($mo_array[13][45]); 

#}
############ หาเลข
$s_num=array();
// for($x=1;$x<=count($lot_type[$_SESSION['lang']][1]);$x++){	
foreach ($lot_type[$_SESSION['lang']][1] as $x => $value) {
	if(count($num_array[$x])>0){
$s_num[$x] = @array_unique($num_array[$x]);
}
}
################# รวมยอด
$asum=array();
#$x_cut=$_GET[tcut];


	// for($x=1;$x<=count($lot_type[$_SESSION['lang']][1]);$x++){	
foreach ($lot_type[$_SESSION['lang']][1] as $x => $value) {  	
		if(count($s_num[$x])>0){
foreach($s_num[$x] as $num){
$sum=@array_sum($mo_array[$x][$num]);

$sum_cut=$sum;					
$asum['sum'][$x][$num]=$sum_cut;
$asum['num'][$x][$sum_cut]=$num;
	}
	}
}
#arsort()
#rsort()
#ksort()
#krsort() 
#sort ()
#rsort()
#uasort 
#uksort 
#usort 


#print_r($asum[num][1]);
#echo'<br>';
for($x=1;$x<=count($lot_type[$_SESSION['lang']][1]);$x++){
if(count($asum['num'][$x])>0){	
arsort($asum['sum'][$x]);###มาก หา น้อย	
}
}

#print_r($asum[num][1]);
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
    <td width="90%"><h3>User : <?=$_SESSION['m_user'];?>  Date :<?=$_GET['d'];?></h3> </td>
    <td width="10%"><input type="button"  value="Print"  onclick="javascript:print();"/></td>
  </tr>
</table>
</div>
<div class="page-break-no">&nbsp;</div>
<div class="yes" style="font-size:16px">
<span style="float: right;">User : <?=$_SESSION['m_user'];?> Date :<?=$_GET['d'];?></span>
 </div>
<table width="750" border="0" cellspacing="0" cellpadding="0" class="ball txt10">
  
    <tr align="center" >
    <? if($mpay[1]>0){ ?>
    <td width="14%" align="center" >
      <?=$lot_type[$_SESSION['lang']][1][1];?>
      </td>
      <? }?>
      
      <? if($mpay[2]>0){ ?>
    <td width="14%"  align="center" >
      <?=$lot_type[$_SESSION['lang']][1][2];?>
      </td>
      <? }?>
      
      <? if($mpay[3]>0){ ?>
    <td width="14%"  align="center" >
      <?=$lot_type[$_SESSION['lang']][1][3];?>
      </td>
      <? }?>
      
      <? if($mpay[4]>0){ ?>
    <td width="14%"  align="center" >
      <?=$lot_type[$_SESSION['lang']][1][4];?>
      </td>
      <? }?>
      
      <? if($mpay[5]>0){ ?>
    <td width="14%"  align="center" >
      <?=$lot_type[$_SESSION['lang']][1][5];?>
      </td>
      <? }?>
      
       <? if($mpay[24]>0){ ?>
     <td width="14%"  align="center" >
      <?=$lot_type[$_SESSION['lang']][1][24];?>
      </td>
      <? }?>
      
    <td width="16%"  align="center" ><?=$lang_member[564];?></td>
  </tr>
  <tr >
  
  <? if($mpay[1]>0){ ?>
    <td  align="center" valign="top" bgcolor="#FFFFFF">
<table width="100%" border="0" cellpadding="5" cellspacing="1" class=" txt10">
    
       <tr align="center" >
          <td width="30%" align="center" ><?=$lang_member[381];?></td>
          <td width="70%" align="center" ><?=$lang_member[563];?> <img src="img/arrow-up.png" height="14" ></td>
        </tr>
        
        
        <?


$type=1;
$sum_total=array();

$bom_asc=$asum['sum'][$type];	


if(count($bom_asc)>0){
	
foreach(array_keys($bom_asc) as $c_num){  

$g_sum=$asum['sum'][$type][$c_num];
$sum_total[]=$g_sum;
###############################

?>
        <tr align="center" class="tr_lot" >
          <td align="center" bgcolor="#f0f0f0" class="sa num"><?=$c_num;?></td>
          <td align="center" class="sa sum" ><?=number_format(round($g_sum));?></td>
        </tr>
        <? }}?>
        
        
         <tr class="bg_td">
          <td align="center" ><?=$lang_member[611];?></td>
          <td align="center"   ><?=_cbn(round(@array_sum($sum_total)),2);?></td>
        </tr>
        
      </table></td>
       <? }?>
    <? if($mpay[2]>0){ ?>  
    <td  align="center" valign="top" bgcolor="#FFFFFF">
   <table width="100%" border="0" cellpadding="5" cellspacing="1" class=" txt10">
        <tr align="center" >
          <td width="30%" align="center" ><?=$lang_member[381];?></td>
          <td width="70%" align="center" ><?=$lang_member[563];?> <img src="img/arrow-up.png" height="14" ></td>
        </tr>
        
         
        <?


$type=2;
$sum_total=array();

$bom_asc=$asum['sum'][$type];	


if(count($bom_asc)>0){
	
foreach(array_keys($bom_asc) as $c_num){  

$g_sum=$asum['sum'][$type][$c_num];
$sum_total[]=$g_sum;
###############################

?>
        <tr align="center" class="tr_lot" >
          <td align="center" bgcolor="#f0f0f0" class="sa num"><?=$c_num;?></td>
          <td align="center" class="sa sum" ><?=number_format(round($g_sum));?></td>
        </tr>
        <? }}?>
        
        
         <tr class="bg_td">
          <td align="center" ><?=$lang_member[611];?></td>
          <td align="center"   ><?=_cbn(round(@array_sum($sum_total)),2);?></td>
        </tr>
        
      </table></td>
       <? }?>
       <? if($mpay[3]>0){ ?>
    <td  align="center" valign="top" bgcolor="#FFFFFF">
<table width="100%" border="0" cellpadding="5" cellspacing="1" class=" txt10">
    <tr align="center" >
          <td width="30%" align="center" ><?=$lang_member[381];?></td>
          <td width="70%" align="center" ><?=$lang_member[563];?> <img src="img/arrow-up.png" height="14" ></td>
        </tr>
        
        
        <?


$type=3;
$sum_total=array();

$bom_asc=$asum['sum'][$type];	


if(count($bom_asc)>0){
	
foreach(array_keys($bom_asc) as $c_num){  

$g_sum=$asum['sum'][$type][$c_num];
$sum_total[]=$g_sum;
###############################

?>
        <tr align="center" class="tr_lot" >
          <td align="center" bgcolor="#f0f0f0" class="sa num"><?=$c_num;?></td>
          <td align="center" class="sa sum" ><?=number_format(round($g_sum));?></td>
        </tr>
        <? }}?>
        
        
        <tr class="bg_td">
          <td align="center" ><?=$lang_member[611];?></td>
          <td align="center"   ><?=_cbn(round(@array_sum($sum_total)),2);?></td>
        </tr>
        
      </table></td>
       <? }?>
      <? if($mpay[4]>0){ ?> 
    <td align="center" valign="top" bgcolor="#FFFFFF">
  <table width="100%" border="0" cellpadding="5" cellspacing="1" class=" txt10">
    <tr align="center" >
          <td width="30%" align="center" ><?=$lang_member[381];?></td>
          <td width="70%" align="center" ><?=$lang_member[563];?> <img src="img/arrow-up.png" height="14" ></td>
        </tr>
        
        
        <?


$type=4;
$sum_total=array();

$bom_asc=$asum['sum'][$type];	


if(count($bom_asc)>0){
	
foreach(array_keys($bom_asc) as $c_num){  

$g_sum=$asum['sum'][$type][$c_num];
$sum_total[]=$g_sum;
###############################

?>
        <tr align="center" class="tr_lot" >
          <td align="center" bgcolor="#f0f0f0" class="sa num"><?=$c_num;?></td>
          <td align="center" class="sa sum" ><?=number_format(round($g_sum));?></td>
        </tr>
        <? }}?>
        
        
        <tr class="bg_td">
          <td align="center" ><?=$lang_member[611];?></td>
          <td align="center"   ><?=_cbn(round(@array_sum($sum_total)),2);?></td>
        </tr>
        
      </table></td>
       <? }?>
       <? if($mpay[5]>0){ ?>
    <td  align="center" valign="top" bgcolor="#FFFFFF">
   <table width="100%" border="0" cellpadding="5" cellspacing="1" class=" txt10">
    <tr align="center" >
          <td width="30%" align="center" ><?=$lang_member[381];?></td>
          <td width="70%" align="center" ><?=$lang_member[563];?> <img src="img/arrow-up.png" height="14" ></td>
        </tr>
        
        
        <?


$type=5;
$sum_total=array();

$bom_asc=$asum['sum'][$type];	


if(count($bom_asc)>0){
	
foreach(array_keys($bom_asc) as $c_num){  

$g_sum=$asum['sum'][$type][$c_num];
$sum_total[]=$g_sum;
###############################

?>
        <tr align="center" class="tr_lot" >
          <td align="center" bgcolor="#f0f0f0" class="sa num"><?=$c_num;?></td>
          <td align="center" class="sa sum" ><?=number_format(round($g_sum));?></td>
        </tr>
        <? }}?>
        
        
         <tr class="bg_td">
          <td align="center" ><?=$lang_member[611];?></td>
          <td align="center"   ><?=_cbn(round(@array_sum($sum_total)),2);?></td>
        </tr>
        
      </table></td>
       <? }?>
       
        <? if($mpay[24]>0){ ?>
    <td  align="center" valign="top" bgcolor="#FFFFFF">
    <table width="100%" border="0" cellpadding="5" cellspacing="1" class=" txt10">
    <tr align="center" >
          <td width="30%" align="center" ><?=$lang_member[381];?></td>
          <td width="70%" align="center" ><?=$lang_member[563];?> <img src="img/arrow-up.png" height="14" ></td>
        </tr>
        
        
        <?


$type=24;
$sum_total=array();

$bom_asc=$asum['sum'][$type];	

if(count($bom_asc)>0){
	
foreach(array_keys($bom_asc) as $c_num){  

$g_sum=$asum['sum'][$type][$c_num];
$sum_total[]=$g_sum;
###############################

?>
        <tr align="center" class="tr_lot" >
          <td align="center" bgcolor="#f0f0f0" class="sa num"><?=$c_num;?></td>
          <td align="center" class="sa sum" ><?=number_format(round($g_sum));?></td>
        </tr>
        <? }}?>
        
        
         <tr class="bg_td">
          <td align="center" ><?=$lang_member[611];?></td>
          <td align="center"   ><?=_cbn(round(@array_sum($sum_total)),2);?></td>
        </tr>
        
      </table></td>
      <? }?>
      
      
      
    <td  align="center" valign="top" bgcolor="#FFFFFF"><?

	 for($x_type=6;$x_type<=23;$x_type++){
		 	 if($mpay[$x_type]>0){ 
$bom_asc=$asum['sum'][$x_type];	
if(count($bom_asc)>0){
		?>
    <table width="100%" border="0" cellpadding="5" cellspacing="1" class=" txt10">
      
        <tr align="center" >
          <td colspan="2" align="center" >
            <?=$lot_type[$_SESSION['lang']][1][$x_type];?>
            </td>
        </tr><tr align="center" >
          <td width="30%" align="center" ><?=$lang_member[381];?></td>
          <td width="70%" align="center" ><?=$lang_member[563];?> <img src="img/arrow-up.png" height="14" ></td>
        </tr>
        
        
        <?


$type=$x_type;
$sum_total=array();

$bom_asc=$asum['sum'][$type];	


if(count($bom_asc)>0){
	
foreach(array_keys($bom_asc) as $c_num){  

$g_sum=$asum['sum'][$type][$c_num];
$sum_total[]=$g_sum;
###############################

?>
        <tr align="center" class="tr_lot" >
          <td align="center" bgcolor="#f0f0f0" class="sa num"><?=_dt($c_num);?></td>
          <td align="center" class="sa sum" ><?=number_format(round($g_sum));?></td>
        </tr>
        
        <? }}?>
        
        
         <tr class="bg_td">
          <td align="center" ><?=$lang_member[611];?></td>
          <td align="center"   ><?=_cbn(round(@array_sum($sum_total)),2);?></td>
        </tr>
        
      </table>
      <br>
      <? }}}?></td>
  </tr>
  </tr>
</table>

							</div>
                            
			
		