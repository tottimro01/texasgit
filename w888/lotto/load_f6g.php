<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
// require("../lang/member_lang.php");
require("../lang/variable_lang.php");
require('../inc/conn.php');
require('../inc/function.php');



$zone=1;
$rob=1;
$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
$re_ok=sql_array($sql);



 ################Config Member

 $emax=@explode(',',$_SESSION['m1']['m_lotto_max']); 
 $emin=@explode(',',$_SESSION['m1']['m_lotto_min']); 
 

    if($_SESSION['m1']['m_lotto_setbet']==1){
$lot_pay_big5=@explode(',',$_SESSION['m1']['m_lotto_pay1']); 	
	}elseif($_SESSION['m1']['m_lotto_setbet']==2){
$lot_pay_big5=@explode(',',$_SESSION['m1']['m_lotto_pay2']); 	
	}else{
$lot_pay_big5=@explode(',',$_SESSION['m1']['m_lotto_pay3']); 	
	}
?>
<? for($i=1;$i<=$_POST["num"];$i++){ ?>
<tr>
  <td height="22" align="center" class="bg_td"><input name="num6g<?=$i?>" type="text" class="txt_center12b input" id="num6g<?=$i?>" size="6" maxlength="3" onKeyDown="return numberonly(event,this)"></td>
  <td align="center" class="bg_td"><? if($lot_pay_big5[16]>0){ ?><input name="up6g<?=$i?>" type="text" class="txt_center12n input" id="up6g<?=$i?>" size="7" maxlength="6" onKeyDown="return numberonly(event,this)"><? } ?></td>
  <td align="center" class="bg_td"><? if( $lot_pay_big5[17]>0){ ?><input name="down6g<?=$i?>" type="text" class="txt_center12n input" id="down6g<?=$i?>" size="7" maxlength="6" onKeyDown="return numberonly(event,this)" <?     if($re_ok['o_limit_time_lang']<$time_stam){echo' placeholder="'.$lang_member[612].'" disabled="disabled"'; }?>><? } ?></td>
  <td align="center" class="bg_td">&nbsp;</td>
</tr>
<? } ?>