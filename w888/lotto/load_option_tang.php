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

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="txt_back11n bg_table">
  <tbody>
    <tr class="tb_title_lotto" height="25">
      <td align="center"><?=$lang_member[160]?></td>
      <td align="center" width="40"><?=$lang_member[537]?> x <?=$lang_member[209]?></td>
      <td align="center" width="66"><?=$lang_member[381]?></td>
      <td align="center" width="66"><?=$lang_member[615]?></td>
      <td align="center" width="66"><?=$lang_member[615]?><?=$lang_member[209]?></td>
      <td width="20">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="center"><input name="col1money" type="button" class="btn_le" id="col1money" value="<?=$lang_member[371];?>" onClick="fcopymoney(1,'tab1')" style="width:60px;height:20px;cursor:pointer; margin-top:2px; margin-bottom:2px; line-height:10px; background:#f7c63c;"></td>
      <td align="center"><input name="col2money" type="button" class="btn_le" id="col2money" value="<?=$lang_member[371];?>" onClick="fcopymoney(2,'tab2')" style="width:60px;height:20px;cursor:pointer; margin-top:2px; margin-bottom:2px; line-height:10px; background:#f7c63c;"></td>
      <td>&nbsp;</td>
    </tr>
    <? 
	$tab = 0;
	for($i=0;$i<$_POST["rows"];$i++){ ?>
    <tr align="center" bgcolor="#F3E5E5">
      <td valign="top" align="center"><? if($_POST["lot"]==3){ ?>
        <span style="color:Olive;">
        <input id="radi3up<?=$i?>" type="radio" name="g<?=$i?>" value="3up" onClick="fshow('col2<?=$i?>'); chk_num();"<? if($_POST["g".$i]=="3up"){ ?> checked<? } ?>>
        <label for="radi3up<?=$i?>"><?=$lang_member[385]?></label>
        </span><? if($re_ok['o_limit_time_lang']>$time_stam){ ?><span style="color:Green;">
        <input id="radi3down<?=$i?>" type="radio" name="g<?=$i?>" value="3down" onClick="fdisabled('col2<?=$i?>'); chk_num();"<? if($_POST["g".$i]=="3down"){ ?> checked<? } ?>>
        <label for="radi3down<?=$i?>"><?=$lang_member[388]?></label>
        </span><? } ?><span style="color:Teal;">
        <input id="radi3tod<?=$i?>" type="radio" name="g<?=$i?>" value="3tod" onClick="fdisabled('col2<?=$i?>'); chk_num();"<? if($_POST["g".$i]=="3tod"){ ?> checked<? } ?>>
        <label for="radi3tod<?=$i?>"><?=$lang_member[386]?></label>
        </span> <span style="color:Purple;">
        <input id="radi6gup<?=$i?>" type="radio" name="g<?=$i?>" value="6gup" onClick="fdisabled('col2<?=$i?>'); chk_num();"<? if($_POST["g".$i]=="6gup"){ ?> checked<? } ?>>
        <label for="radi6gup<?=$i?>">6 <?=$lang_member[538]?></label>
        </span><? if($re_ok['o_limit_time_lang']>$time_stam){ ?> <span style="color:Purple;">
        <input id="radi6gdown<?=$i?>" type="radio" name="g<?=$i?>" value="6gdown" onClick="fdisabled('col2<?=$i?>'); chk_num();"<? if($_POST["g".$i]=="6gdown"){ ?> checked<? } ?>>
        <label for="radi6gdown<?=$i?>">6 <?=$lang_member[539]?></label>
        </span><? } ?>
        <? }else if($_POST["lot"]==2){ ?>
        <span style="color:Olive;">
        <input id="radi2up<?=$i?>" type="radio" name="g<?=$i?>" value="2up" onClick="fshow('col2<?=$i?>');fshow('num<?=$i?>');"<? if($_POST["g".$i]=="2up"){ ?> checked<? } ?>>
        <label for="radi2up<?=$i?>"><?=$lang_member[390]?></label>
        </span>
		<? if($re_ok['o_limit_time_lang']>$time_stam){ ?>
        <span style="color:Green;">
        <input id="radi2down<?=$i?>" type="radio" name="g<?=$i?>" value="2down" onClick="fdisabled('col2<?=$i?>');fshow('num<?=$i?>'); chk_num();"<? if($_POST["g".$i]=="2down"){ ?> checked<? } ?>>
        <label for="radi2down<?=$i?>"><?=$lang_member[393]?></label>
        </span>
		<? } ?>
		
		<? if($lot_pay_big5[24]>0){ ?>
        <span style="color:Teal;">
        <input id="radi2tod<?=$i?>" type="radio" name="g<?=$i?>" value="2tod" onClick="fdisabled('col2<?=$i?>');fshow('num<?=$i?>'); chk_num();"<? if($_POST["g".$i]=="2tod"){ ?> checked<? } ?>>
        <label for="radi2tod<?=$i?>"><?=$lang_member[471]?></label>
        </span>
		<? } ?>
        
        <br>
        <span style="color:Olive;">
        <input id="radip2up<?=$i?>" type="radio" name="g<?=$i?>" value="p2up" onClick="fdisabled('col2<?=$i?>');fdisabled('num<?=$i?>');"<? if($_POST["g".$i]=="p2up"){ ?> checked<? } ?>>
        <label for="radip2up<?=$i?>"><?=$lang_member[540]?> <?=$lang_member[448]?></label>
        </span>
		<? if($re_ok['o_limit_time_lang']>$time_stam){ ?>
        <span style="color:Green;">
        <input id="radip2down<?=$i?>" type="radio" name="g<?=$i?>" value="p2down" onClick="fdisabled('col2<?=$i?>');fdisabled('num<?=$i?>'); chk_num();"<? if($_POST["g".$i]=="p2down"){ ?> checked<? } ?>>
        <label for="radip2down<?=$i?>"><?=$lang_member[540]?> <?=$lang_member[450]?></label>
        </span>
		<? } ?>
        
        <span style="color:Olive;">
        <input id="radib2up<?=$i?>" type="radio" name="g<?=$i?>" value="b2up" onClick="fdisabled('col2<?=$i?>');fdisabled('num<?=$i?>');"<? if($_POST["g".$i]=="b2up"){ ?> checked<? } ?>>
        <label for="radib2up<?=$i?>"><?=$lang_member[541]?> <?=$lang_member[448]?></label>
        </span>
		<? if($re_ok['o_limit_time_lang']>$time_stam){ ?>
        <span style="color:Green;">
        <input id="radib2down<?=$i?>" type="radio" name="g<?=$i?>" value="b2down" onClick="fdisabled('col2<?=$i?>');fdisabled('num<?=$i?>'); chk_num();"<? if($_POST["g".$i]=="b2down"){ ?> checked<? } ?>>
        <label for="radib2down<?=$i?>"><?=$lang_member[541]?> <?=$lang_member[450]?></label>
        </span>
		<? } ?>
        
        
        
        <? }else if($_POST["lot"]==1){ ?>
        
        <span style="color:Purple;">
        <input id="radi19up<?=$i?>" type="radio" name="g<?=$i?>" value="19up" onClick="fdisabled('col2<?=$i?>'); chk_num();"<? if($_POST["g".$i]=="19up"){ ?> checked<? } ?>>
        <label for="radi19up<?=$i?>">19 <?=$lang_member[538]?></label>
        </span>
		
		<? if($re_ok['o_limit_time_lang']>$time_stam){ ?>
         <span style="color:Purple;">
        <input id="radi19down<?=$i?>" type="radio" name="g<?=$i?>" value="19down" onClick="fdisabled('col2<?=$i?>'); chk_num();"<? if($_POST["g".$i]=="19down"){ ?> checked<? } ?>>
        <label for="radi19down<?=$i?>">19 <?=$lang_member[539]?><br>
        </label>
        </span>
		<? } ?>
		
		<? if($lot_pay_big5[6]>0){ ?> <span style="color:Olive;">
        <input id="radi1up<?=$i?>" type="radio" name="g<?=$i?>" value="1up" onClick="fdisabled('col2<?=$i?>'); chk_num();"<? if($_POST["g".$i]=="1up"){ ?> checked<? } ?>>
        <label for="radi1up<?=$i?>"><?=$lang_member[542]?></label>
        </span><? } ?><? if($lot_pay_big5[7]>0){ ?><? if($re_ok['o_limit_time_lang']>$time_stam){ ?> <span style="color:Green;">
        <input id="radi1down<?=$i?>" type="radio" name="g<?=$i?>" value="1down" onClick="fdisabled('col2<?=$i?>'); chk_num();"<? if($_POST["g".$i]=="1down"){ ?> checked<? } ?>>
        <label for="radi1down<?=$i?>"><?=$lang_member[543]?></label>
        </span><? } ?><? } ?><? if($lot_pay_big5[21]>0){ ?><span style="color:Teal;">
        <input id="radi1pug<?=$i?>" type="radio" name="g<?=$i?>" value="1pug" onClick="fdisabled('col2<?=$i?>'); chk_num();"<? if($_POST["g".$i]=="1pug"){ ?> checked<? } ?>>
        <label for="radi1pug<?=$i?>"><?=$lang_member[544]?></label>
        </span><? } ?><? if($lot_pay_big5[22]>0){ ?><span style="color:Navy;">
        <input id="radi2pug<?=$i?>" type="radio" name="g<?=$i?>" value="2pug" onClick="fdisabled('col2<?=$i?>'); chk_num();"<? if($_POST["g".$i]=="2pug"){ ?> checked<? } ?>>
        <label for="radi2pug<?=$i?>"><?=$lang_member[545]?></label>
        </span><? } ?><? if($lot_pay_big5[23]>0){ ?><span style="color:Purple;">
        <input id="radi3pug<?=$i?>" type="radio" name="g<?=$i?>" value="3pug" onClick="fdisabled('col2<?=$i?>'); chk_num();"<? if($_POST["g".$i]=="3pug"){ ?> checked<? } ?>>
        <label for="radi3pug<?=$i?>"><?=$lang_member[546]?></label>
        </span><? } ?>
        <? } ?></td>
      <td align="center"><input name="chktr_td<?=$i?>" type="checkbox" id="chktr_td<?=$i?>"></td>
      <td style="overflow:hidden;"><input name="num<?=$i?>" type="text" class="txt_center12n input" id="tab<?=$tab?>" maxlength="<?=$_POST["lot"]?>" onKeyDown="return numberonly(event,this)" style="width:60px; height:100%;<? if(($_POST["g".$i]=="p2up" || $_POST["g".$i]=="p2down" || $_POST["g".$i]=="b2up" || $_POST["g".$i]=="b2down") and $_POST["lot_old"]==$_POST["lot"]){ ?> display:none;<? } ?>" value="<? if($_POST["lot_old"]==$_POST["lot"]){ ?><?=$_POST["num".$i]?><? } ?>" onKeyUp="chk_num();"></td>
      <td style="overflow:hidden;"><input name="col1<?=$i?>" type="text" class="txt_center12n input" id="tab<?=$tab=$tab+1?>" maxlength="6" onKeyDown="return numberonly(event,this)" style="width:60px; height:100%;" value="<?=$_POST["col1".$i]?>" onKeyUp="chk_num();"></td>
      <td style="overflow:hidden;"><input name="col2<?=$i?>" type="text" class="txt_center12n input" id="tab<?=$tab=$tab+1?>" maxlength="6" onKeyDown="return numberonly(event,this)" style="width:60px; height:100%;<? if(($_POST["g".$i]!="3up" and $_POST["g".$i]!="2up" and $_POST["g".$i]!="") and $_POST["lot_old"]==$_POST["lot"]){ ?> display:none;<? } ?>" value="<?=$_POST["col2".$i]?>" onKeyUp="chk_num();"></td>
      <td align="center"><img src="img/delete.png" width="15" style="cursor:pointer;" onClick="clear_txt2(<?=$i?>); chk_num();"></td>
    </tr>
    <? $tab=$tab+1; } ?>
  </tbody>
</table>
<input name="lot_old" type="hidden" id="lot_old" value="<?=$_POST["lot"]?>">