<?php
require('../inc/conn.php');	
include "../inc/function.php";
$ex_id = explode("_" , $_GET["id"]);
$id = $ex_id[0];
$add = $ex_id[1];
$type = $ex_id[2];
$ty = $_GET["ty"];
if($_POST["btn_save"]=="save"){
	/*$nzone = $_POST["txt_nzone"];
	for($i=0;$i<$nzone;$i++){
		$asc = $_POST["txt_asc".$i];	
		$zone = $_POST["txt_zone".$i];	
		$sql=sql_query("update bom_tb_data_sport_today set b_asc = '$asc' where b_zone_id = '$zone'");
	}*/
	
	$d = trim($_POST["txt_date"])." ".str_replace("." , ":" , trim($_POST["txt_time"]));
	$ds = strtotime($d);
	
	$s1h = $_POST["s1h_1"]."-".$_POST["s1h_2"];
	$sft = $_POST["sft_1"]."-".$_POST["sft_2"];
	if($type=="1h"){
		if($ty<=2){
			$ball = " , b_1h_hdc = '$_POST[txt_ball]'";
			$price = " , b_1h_hdc_1 = '$_POST[txt_price]'";
		}else{
			$ball = " , b_1h_goal = '$_POST[txt_ball]'";
			$price = " , b_1h_goal_1 = '$_POST[txt_price]'";
		}
	}else{
		if($ty<=2){
			$ball = " , b_hdc = '$_POST[txt_ball]'";
			$price = " , b_hdc_1 = '$_POST[txt_price]'";
		}else{
			$ball = " , b_goal = '$_POST[txt_ball]'";
			$price = " , b_goal_1 = '$_POST[txt_price]'";
		}
	}
	$sql=sql_query("update bom_tb_data_sport_today set b_big = '$_POST[txt_big]' $ball $price where b_id = '$id' and b_add = '$add'");
	$sql=sql_query("update bom_tb_data_sport_today set b_date_play = '$ds' where b_id = '$id'");
}


$rs=sql_array("select * from bom_tb_data_sport_today where b_id = '$id' and b_add = '$add'");
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<style>
body {
	margin:0px;
	padding:0px;
	background:#F7CDCD;
	font-size: 12px;
	font-family: tahoma, "Microsoft Sans Serif", Vanessa;
}
.red {
	color:#F00;
}
.blue {
	color:#00F;
}
.gray {
	color:#999;
}
#box_over {
	/*width:100%;*/
	height:125px;
	overflow-y:scroll;
	box-shadow: inset 0 0 2px #000000;
	border-right:2px solid #ECE9D7;
}
button {
	background: #C8C4BC;
	height: 18px;
	line-height: 10px;
	cursor: pointer;
	outline:none;
	min-width:50px;
}
</style>
<script src="jsui/external/jquery/jquery.js?v=2019"></script>
<script>
$(document).ready(function() {
	$("#box_over").height($( window ).height());
});
$( window ).resize(function() {
  $("#box_over").height($( window ).height());
});
function numberonly(event,el,ty_txt,ths,id){
	var e=window.event?window.event:event;
	var keyCode=e.keyCode?e.keyCode:e.which?e.which:e.charCode;   			
	
	//console.log(keyCode);
	//alert(keyCode);
	if(ty_txt!="ball" && ty_txt!="price"){
		if ((keyCode>=96 && keyCode<=105)||(keyCode>=48 && keyCode<=57)||keyCode==110||keyCode==109){ return true; }
		//backspace,delete,left,right,home,end
		if (',8,46,37,39,36,35,'.indexOf(','+keyCode+',')!=-1){ return true; }          
		return false;
	}else if(ty_txt=="price"){
		if ((keyCode>=96 && keyCode<=105)||(keyCode>=48 && keyCode<=57)||keyCode==110||keyCode==109){ return true; }
		//backspace,delete,left,right,home,end
		if (',8,46,37,39,36,35,190,110,189,'.indexOf(','+keyCode+',')!=-1){ return true; }          
		return false;
	}else{
		//alert(keyCode);
		if ((keyCode>=96 && keyCode<=105)||(keyCode>=48 && keyCode<=57)||keyCode==110||keyCode==109){ return true; }
		if (',8,190,110,107,187,'.indexOf(','+keyCode+',')!=-1){ return true; }          
		return false;
	}
}
</script>
</head>

<body>
<div id="box_over">
<?
$ex_score_1h = explode("-",$rs["b_score_1h"]);
$ex_score_ft = explode("-",$rs["b_score_ft"]);
?>
<form method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td>&nbsp;</td>
    <td align="center"><input name="txt_big" type="radio" <?=($rs['b_big'] == 1) ? 'checked' : ''?> value="1"><span class="<?=($rs['b_big'] == 1) ? 'red' : 'blue'?>"><strong><?=$rs["b_name_1"]?></strong></span>&nbsp;&nbsp;vs&nbsp;&nbsp;<span class="<?=($rs['b_big'] == 2) ? 'red' : 'blue'?>"><strong><?=$rs["b_name_2"]?></strong></span><input name="txt_big" type="radio" <?=($rs['b_big'] == 2) ? 'checked' : ''?> value="2"></td>
    <td>&nbsp;</td>
    <td align="center"><strong class="gray">สกอร์ 1H </strong><input name="s1h_1" type="text" id="s1h_1" value="<?=$ex_score_1h[0]?>" size="2">-<input name="s1h_2" type="text" id="s1h_2" value="<?=$ex_score_1h[1]?>" size="2"></td>
    <td align="center"><strong class="gray">สกอร์ FT </strong><input name="sft_1" type="text" id="sft_1" value="<?=$ex_score_ft[0]?>" size="2">-<input name="sft_2" type="text" id="sft_2" value="<?=$ex_score_ft[1]?>" size="2"></td>
  </tr>
  <tr>
    <td align="center"><strong>รหัส</strong></td>
    <td align="center"><strong>เลือก</strong></td>
    <td align="center"><strong>บอล</strong></td>
    <td align="center"><strong>ราคา</strong></td>
    <td align="center"><strong>จำนวน</strong></td>
  </tr>
  <tr>
    <td align="center"><input type="text" size="10" value="<?=$rs["b_id"]?>" style="text-align:center;"></td>
    <td align="center"><input type="text" size="30" value="<? if($ty==1 && $rs["b_big"]==1){ echo "ต่อ"; }else if($ty==2 && $rs["b_big"]==2){ echo "ต่อ"; }else if($ty==3){ echo "สูง"; }else if($ty==4){ echo "ต่ำ"; }else{ echo "รอง"; } ?> <? if($ty==1){ echo $rs["b_name_1"]; }else if($ty==2){ echo $rs["b_name_2"]; } ?>" style="text-align:center;" class="<? if($ty==1 && $rs["b_big"]==1){ echo "red"; }else if($ty==2 && $rs["b_big"]==2){ echo "red"; }else if($ty==3){ echo "red"; }else if($ty==4){ echo "blue"; }else{ echo "blue"; } ?>"></td>
    <? if($type=="1h"){ ?>
    <td align="center"><input name="txt_ball" type="text" id="txt_ball" style="text-align:center;" value="<?=($ty <= 2) ? $rs["b_1h_hdc"] : $rs["b_1h_goal"]?>" size="10" onkeydown="return numberonly(event,this,'ball','','')"></td>
    <td align="center"><input name="txt_price" type="text" id="txt_price" style="text-align:center;" value="<?=($ty <= 2) ? $rs["b_1h_hdc_1"] : $rs["b_1h_goal_1"]?>" size="10" onkeydown="return numberonly(event,this,'price','','')"></td>
    <? }else{ ?>
    <td align="center"><input name="txt_ball" type="text" id="txt_ball" style="text-align:center;" value="<?=($ty <= 2) ? $rs["b_hdc"] : $rs["b_goal"]?>" size="10" onkeydown="return numberonly(event,this,'ball','','')"></td>
    <td align="center"><input name="txt_price" type="text" id="txt_price" style="text-align:center;" value="<?=($ty <= 2) ? $rs["b_hdc_1"] : $rs["b_goal_1"]?>" size="10" onkeydown="return numberonly(event,this,'price','','')"></td>
    <? } ?>
    <td align="center"><input type="text" size="12" value="10,000" style="text-align:right;"></td>
  </tr>
  <tr>
    <td align="center"><strong class="blue">test</strong></td>
    <td align="center">เวลา : <input name="txt_time" type="text" id="txt_time" style="text-align:center;" value="<?=date("H.i" , $rs["b_date_play"])?>" size="5" > วันที่ : <input name="txt_date" type="text" id="txt_date" style="text-align:center;" value="<?=date("d-m-Y" , $rs["b_date_play"])?>" size="15" ></td>
    <td colspan="2" align="center">ทวนของ : <input type="text" size="10" value="" style="text-align:center; background:#FEFFA4;"></td>
    <td align="center"><button name="btn_save" id="btn_save" type="submit" value="save">บันทึก</button></td>
  </tr>
</table>
</form>
</div>
</body>
</html>