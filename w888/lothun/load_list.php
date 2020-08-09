<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php   
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);       
require('../inc/conn.php');
require('../inc/function.php');

// require("../lang/member_lang.php");
require("../lang/variable_lang.php");
require("../lang/function_array.php");

if(($_SESSION['m_id'] == '') || (!isset($_SESSION['m_id']))){  exit();}
//if( !strstr($_SERVER['HTTP_REFERER'],$url)){exit();}
//if(_mt()==1){exit();}

//$sql="select m_lotto_hun_set_pay , m_lotto_hun_set_price from bom_tb_member where m_id='".$_SESSION['m_id']."'";
//$re_m=sql_array($sql);
$ex_set_price = explode(",", $_SESSION['m1']["m_lotto_hun_set_price"]);

$zone=$_SESSION["zone_hun"];
$rob=$_SESSION["rob_hun"];
$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
$ok_data=sql_array($sql);

 
$type_lot = $_POST['tlot']; 
if($type_lot==1){

	$sql="select bill_id from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."'  and play_status=7    and lot_zone = '$_SESSION[zone_hun]' and lot_rob = '$_SESSION[rob_hun]'  order by play_id desc limit 1 ";	
	$rebb=sql_array($sql);
	$sql="select * from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."'   and b_accept=1    and  bill_id='$rebb[bill_id]'   and play_status=7   order by play_id desc";	
}else if($type_lot==2){

  $sql="select bill_id from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."'   and lot_zone = '$_SESSION[zone_hun]' and lot_rob = '$_SESSION[rob_hun]'  and play_status=7 and (lot_type = 16 or lot_type = 19 or lot_type = 17 or lot_type = 18 or lot_type = 20)   order by play_id desc limit 1 "; 
  $rebb=sql_array($sql);
$sql="select * from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."'   and b_accept=1  and  bill_id='$rebb[bill_id]'      order by play_id desc";	
}else if($type_lot==3){

$sql="select bill_id from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."'  and lot_zone = '$_SESSION[zone_hun]' and lot_rob = '$_SESSION[rob_hun]'    and play_status=7    order by play_id desc limit 1 "; 
  $rebb=sql_array($sql);
$sql="select * from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."'  and b_accept=1   and  bill_id='$rebb[bill_id]'     order by play_id desc"; 
}else if($type_lot==4){

  $sql="select bill_id from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."'    and play_status=7 and (lot_type = 6 or lot_type = 7)   and lot_zone = '$_SESSION[zone_hun]'  and lot_rob = '$_SESSION[rob_hun]' order by play_id desc limit 1 "; 
  $rebb=sql_array($sql);
	$sql="select * from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."'   and b_accept=1   and  bill_id='$rebb[bill_id]'       order by play_id desc"; 
}else if($type_lot==5){

 // $sql="select bill_id from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."'    and play_status=7 and (lot_type = 8 or lot_type = 9 or lot_type = 10 or lot_type = 11 or lot_type = 12 or lot_type = 13 or lot_type = 14 or lot_type = 15)   and lot_zone = '$_SESSION[zone_hun]' and lot_rob = '$_SESSION[rob_hun]'   order by play_id desc limit 1 "; 
  $sql="select bill_id from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."'    and play_status=7 and (lot_type = 4 or lot_type = 5)   and lot_zone = '$_SESSION[zone_hun]' and lot_rob = '$_SESSION[rob_hun]'   order by play_id desc limit 1 "; 
  $rebb=sql_array($sql);
$sql="select * from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."'  and b_accept=1    and  bill_id='$rebb[bill_id]'      order by play_id desc"; 
}else if($type_lot==6){

}else if($type_lot==7){

  $sql="select bill_id from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."'   and play_status=7 and (lot_type = 21 or lot_type =22 or lot_type = 23)   and lot_zone = '$_SESSION[zone_hun]'  and lot_rob = '$_SESSION[rob_hun]'  order by play_id desc limit 1 "; 
  $rebb=sql_array($sql);
	$sql="select * from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."'   and b_accept=1   and  bill_id='$rebb[bill_id]'   order by play_id desc ";	
}else if($type_lot==10){
	$sql="select bill_id from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."'  and play_status=7 and lot_type = 31   and lot_zone = '$_SESSION[zone_hun]' and lot_rob = '$_SESSION[rob_hun]'  order by play_id desc limit 1 ";	
	$rebb=sql_array($sql);
	$sql="select * from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."'   and b_accept=1    and  bill_id='$rebb[bill_id]'   and play_status=7   order by play_id desc";	
}
################Config Member
    if($_SESSION['m1']['m_lotto_hun_setbet']==1){
$lot_pay_big5=@explode(',',$_SESSION['m1']['m_lotto_hun_pay1']); 	
	}elseif($_SESSION['m1']['m_lotto_hun_setbet']==2){
$lot_pay_big5=@explode(',',$_SESSION['m1']['m_lotto_hun_pay2']); 	
	}else{
$lot_pay_big5=@explode(',',$_SESSION['m1']['m_lotto_hun_pay3']); 	
	}
?>
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="txt_back11n bg_table">
  <tbody>
    <tr>
<td height="25" colspan="8" align="center" class="txt_white12btitle bg_table">
<? if($type_lot==1){ 
		echo $lang_member[493]; 
	}else{ 
    echo $lang_member[493]; 
   } ?>
<span class="txt_back12b" style="cursor:pointer" onclick="window.location.href = 'main_lothun.php?tlot=list&last=<?=$_GET[last];?>&zone_send=<?=$_SESSION["zone_hun"];?>&rob_send=<?=$_SESSION["rob_hun"];?>&name_send=<?=$_SESSION[name_hun];?>&vvw='+fw"><u><?=$lang_member[430];?></u></span></td>
    </tr>
    <tr align="center" class="tb_title_lotto">
      <td width="26%" height="25"><?=$lang_member[407];?></td>

      <td width="18%"><?=$lang_member[160];?></td>
      <td width="12%"><?=$lang_member[381];?></td>
<!--
      <td width="5%">รอบ</td>-->
      <td width="12%"><?=$lang_member[300];?></td>
      <td width="10%"><?=$lang_member[610];?></td>
      <td width="12%"><?=$lang_member[611];?></td>
    </tr>
    <? 

$re=sql_query($sql);
while($rs=sql_fetch($re)){

    
	?>
    <tr align="center" class="tr_lot">
       <td><?=date("d/m/Y H:i" , $rs["play_timestam"])?></td>

      <td><?=$lot_type[$_SESSION['lang']][$_SESSION['zone_hun']][$rs["lot_type"]]?></td>
      <td><?=_dt($rs["play_number"])?></td>
<!--
      <td><?=$lot_rob[$rs["lot_rob"]]?></td>-->

      <td align="right"><?=number_format(-$rs["b_total"],2)?></td>
      

      <td align="right"><?=number_format($rs["b_total"]-$rs["b_pay"],2)?></td>
      <td align="right"><?=number_format(-$rs["b_pay"],2)?></td>
      
    </tr>
   <? } //} ?>

  </tbody>
</table>
<? if($_SESSION['zone_hun']==3){ ?>
<br>
<br>
<br>
<style type="text/css">
  
.pay_set {
  color: red;
  font-size: 14px;
  font-weight: bold;
}
</style>
<center>

  <b><?=$lang_g["price"]?></b> <span class="pay_set"><?=number_format($ex_set_price[1])?></span> <b>THB / <?=$lang_g["text"]["count"]?></b>
  <br>
 <p style="text-align: left; display: block; width: 251px;">
    <?

    $ex_set_pay = explode(",", $_SESSION['m1']["m_lotto_hun_set_pay"]);
  foreach ($lang_g["settext"] as $key => $value) {

echo "<b>".$value."</b>";
if($key>=3){
  echo " <span class='pay_set'>".number_format($ex_set_pay[($key-2)])."</span> <b>THB</b>";
}
echo "<br>";


}
  ?>
  <!--*** ลุ้นได้ถึง 7 ประตู<br>1 เลข รับรางวัลสูงสุด 1 รางวัล<br>ถูก 4 ตัวตรง รับเงิน : ตามตัวแทน<br>ถูก 4 ตัวโต๊ด รับเงิน : ตามตัวแทน<br>ถูก 3 ตัวตรง(หลัง) รับเงิน : ตามตัวแทน<br>ถูก 3 ตัวหน้าตรง รับเงิน : ตามตัวแทน<br>ถูก 3 ตัวโต๊ด(หลัง) รับเงิน : ตามตัวแทน<br>ถูก 2 ตัวหน้า(2ล่าง) รับเงิน : ตามตัวแทน<br>ถูก 2 ตัวตรง รับเงิน : ตามตัวแทน<br>--></p>
</center>
<? } ?>
