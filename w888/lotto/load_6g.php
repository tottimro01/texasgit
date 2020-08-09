<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require("../lang/variable_lang.php");
require('../inc/conn.php');
require('../inc/function.php');
/*$url_file1="../json/lotto/ok/ok_1_1.json";	
$date_js=file_get_contents2($url_file1);
$date_bet = json_decode2($date_js, true);
$re_ok=$date_bet[0];
################Config Member
$url_file="../json/config/member/LottoConfig_".$_SESSION[mid].".json";	
$lot6_js=file_get_contents2($url_file);
$lot_m = json_decode2($lot6_js, true);

$lot_pay_big1=@explode(",",$lot_m['m_lotto_pay_super']);
$lot_pay_big2=@explode(",",$lot_m['m_lotto_pay_senior']);
$lot_pay_big3=@explode(",",$lot_m['m_lotto_pay_master']);
$lot_pay_big4=@explode(",",$lot_m['m_lotto_pay_agent']);
$lot_pay_big5=@explode(',',$lot_m['m_lotto_pay_member']); */

$zone=1;
$rob=1;
$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
$re_ok=sql_array($sql);

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
  <td align="center" class="bg_td"><input name="up6g<?=$i?>" type="text" class="txt_center12n input" id="up6g<?=$i?>" size="7" maxlength="6" onKeyDown="return numberonly(event,this)"></td>
  <td align="center" class="bg_td"><input name="down6g<?=$i?>" type="text" class="txt_center12n input" id="down6g<?=$i?>" size="7" maxlength="6" onKeyDown="return numberonly(event,this)" <?     if($re_ok['o_limit_time_lang']<$time_stam){echo' placeholder="'.$lang_member[612].'" disabled="disabled"'; }?>></td>
  <td align="center" class="bg_td"><? if($lot_pay_big5[16]>0){ ?><input name="upf6g<?=$i?>" type="text" class="txt_center12n input" id="upf6g<?=$i?>" size="7" maxlength="6" onKeyDown="return numberonly(event,this)"><? } ?></td>
</tr>
<? } ?>