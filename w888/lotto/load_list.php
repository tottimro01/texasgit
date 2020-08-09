<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php   
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);       
require('../inc/conn.php');
require('../inc/function.php');

require("../lang/variable_lang.php");
// require("../lang/member_lang.php");
// require("/home/ohoking/domains/ohoking.com/public_html/admin_lang/export/lang_member_".$_SESSION['lang'].".php");
require("../lang/function_array.php");

if(($_SESSION['m_id'] == '') || (!isset($_SESSION['m_id']))){  exit();}

$sql="select * from bom_tb_lotto_ok  where lot_zone=1 and  lot_rob=1  order by ok_id desc limit 1";
$red=sql_array($sql);


    if($_SESSION['m1']['m_lotto_setbet']==1){
$lot_pay_big5=@explode(',',$_SESSION['m1']['m_lotto_pay1']); 	
	}elseif($_SESSION['m1']['m_lotto_setbet']==2){
$lot_pay_big5=@explode(',',$_SESSION['m1']['m_lotto_pay2']); 	
	}else{
$lot_pay_big5=@explode(',',$_SESSION['m1']['m_lotto_pay3']); 	
	}


$type_lot = $_POST['tlot']; 
if($type_lot==1){


    $sql="select bill_id from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."' and lot_zone = 1 and b_date = '$red[ok_date]'  and play_status=7     order by play_id desc limit 1 ";	
	$rebb=sql_array($sql);
	
	$sql="select * from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."' and lot_zone = 1 and b_date = '$red[ok_date]'   and b_accept=1    and  bill_id='$rebb[bill_id]'   and play_status=7   order by play_id asc";	
}else if($type_lot==2){
	$sql="select bill_id from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."' and lot_zone = 1 and b_date = '$red[ok_date]'  and play_status=7     order by play_id desc limit 1 ";	
	$rebb=sql_array($sql);
	

$sql="select * from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."' and lot_zone = 1 and b_date = '$red[ok_date]'   and b_accept=1   and play_status=7 and (lot_type = 16 or lot_type = 19 or lot_type = 17 or lot_type = 18 or lot_type = 20)   and  bill_id='$rebb[bill_id]'     order by play_id asc ";	
}else if($type_lot==3){
	$sql="select bill_id from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."' and lot_zone = 1 and b_date = '$red[ok_date]'  and play_status=7     order by play_id desc limit 1 ";	
	$rebb=sql_array($sql);
	


$sql="select * from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."' and lot_zone = 1 and b_date = '$red[ok_date]'  and b_accept=1    and play_status=7 and (lot_type = 4 or lot_type = 5  or lot_type = 24)   and  bill_id='$rebb[bill_id]'     order by play_id asc ";	
}else if($type_lot==4){
	$sql="select bill_id from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."' and lot_zone = 1 and b_date = '$red[ok_date]'  and play_status=7 and (lot_type = 6 or lot_type = 7)     order by play_id desc limit 1 ";	
	$rebb=sql_array($sql);


	$sql="select * from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."' and lot_zone = 1 and b_date = '$red[ok_date]'   and b_accept=1   and play_status=7 and (lot_type = 6 or lot_type = 7)    and  bill_id='$rebb[bill_id]'      order by play_id asc ";	
}else if($type_lot==5){


$sql="select * from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."' and lot_zone = 1 and b_date = '$red[ok_date]'  and b_accept=1    and play_status=7 and (lot_type = 8 or lot_type = 9 or lot_type = 10 or lot_type = 11 or lot_type = 12 or lot_type = 13 or lot_type = 14 or lot_type = 15)    order by play_id asc ";	
}else if($type_lot==6){


}else if($type_lot==7){
	$sql="select bill_id from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."' and lot_zone = 1 and b_date = '$red[ok_date]'  and play_status=7 and (lot_type = 21 or lot_type =22 or lot_type = 23)     order by play_id desc limit 1 ";	
	$rebb=sql_array($sql);
	

	$sql="select * from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."' and lot_zone = 1 and b_date = '$red[ok_date]'   and b_accept=1    and play_status=7 and (lot_type = 21 or lot_type =22 or lot_type = 23)    and  bill_id='$rebb[bill_id]'     order by play_id asc ";	
}else if($type_lot==8){
	$sql="select bill_id from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."' and lot_zone = 1 and b_date = '$red[ok_date]'  and play_status=7     order by play_id desc limit 1 ";	
	$rebb=sql_array($sql);
	

$sql="select * from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."' and lot_zone = 1 and b_date = '$red[ok_date]'  and b_accept=1    and play_status=7 and (lot_type = 4 or lot_type = 5 )   and  bill_id='$rebb[bill_id]'     order by play_id asc ";	
}else if($type_lot==9){
	
	$sql="select bill_id from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."' and lot_zone = 1 and b_date = '$red[ok_date]'  and play_status=7     order by play_id desc limit 1 ";	
	$rebb=sql_array($sql);
	

$sql="select * from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."' and lot_zone = 1 and b_date = '$red[ok_date]'  and b_accept=1    and play_status=7 and (lot_type = 1 or lot_type = 3 )    and  bill_id='$rebb[bill_id]'    order by play_id asc  ";	
}




?>
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="txt_back11n bg_table">
  <tbody>
    <tr>
<td height="25" colspan="6" align="center" class="txt_white12btitle bg_table">
<? if($type_lot==1   or $type_lot==2 or $type_lot==8  or $type_lot==9){ 
		echo $lang_member[493].' '; 
	}else{ ?>
	<?=$lang_member[428];?> 
<? } ?>
<span class="txt_back12b" style="cursor:pointer" onclick="window.location.href = 'main_lotto.php?tlot=list&vvw='+fw"><u><?=$lang_member[430];?></u></span></td>
    </tr>
    <tr align="center" class="tb_title_lotto">
      <td width="29%" height="25"><?=$lang_member[407];?></td>

      <td width="17%"><?=$lang_member[160];?></td>
      <td width="12%"><?=$lang_member[381];?></td>

      <td width="14%"><?=$lang_member[300];?></td>
      <td width="12%"><?=$lang_member[610];?></td>
      <td width="16%"><?=$lang_member[611];?></td>
    </tr>
    <? 

$re=sql_query($sql);
while($rs=sql_fetch($re)){

	?>
    <tr align="center" class="tr_lot">
       <td><?=date("d/m/Y H:i" , $rs["play_timestam"])?>
       <? if($rs["b_no"]!=""){?><span class="poy"><?=$rs["b_no"];?></span><? }?>
       </td>

      <td><?=$lot_type[$_SESSION['lang']][1][$rs["lot_type"]]?></td>
      <td><?=_dt($rs["play_number"])?></td>


      <td align="right"><?=number_format(-$rs["b_total"],2)?></td>
      

      <td align="right"><?=number_format($rs["b_total"]-$rs["b_pay"],2)?></td>
      <td align="right"><?=number_format(-$rs["b_pay"],2)?></td>
      
    </tr>
   <? } ?>
   <? if($_POST["tlot"]==5){ ?>
   <? if(($lot_pay_big5[4]>0) or ($lot_pay_big5[5]>0)){ ?>
   <tr>
<td height="25" colspan="6" align="center" class="txt_white12btitle bg_table"><?=$lang_member[518]?> <span class="txt_back12b" style="cursor:pointer" onclick="window.location.href = 'main_lotto.php?tlot=2ud&vvw='+fw"><u><?=$lang_member[613]?> <?=$lang_member[550]?></u></span></td>
    </tr>
    <? }  ?>
    <tr>
<td height="25" colspan="6" align="center" class="txt_white12btitle bg_table"><?=$lang_member[518]?> <span class="txt_back12b" style="cursor:pointer" onclick="window.location.href = 'main_lotto.php?tlot=&vvw='+fw"><u><?=$lang_member[613]?> 6 <?=$lang_member[492]?></u></span></td>
    </tr>
    <? if(($lot_pay_big5[16]>0)){ ?>
   <tr>
<td height="25" colspan="6" align="center" class="txt_white12btitle bg_table"><?=$lang_member[518]?> <span class="txt_back12b" style="cursor:pointer" onclick="window.location.href = 'main_lotto.php?tlot=3fu&vvw='+fw"><u><?=$lang_member[613]?> <?=$lang_member[517]?></u></span></td>
    </tr>
    <? }  ?>
    <? }  ?>

  </tbody>
</table>
