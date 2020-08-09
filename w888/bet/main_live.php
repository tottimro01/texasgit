<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');	
require('function.php');	
$arr_league = array();
$arr_list = array();
$sql=sql_query("select * from bom_tb_data_sport_today order by b_asc asc , b_date_play asc");
while($rs=sql_fetch($sql)){
	$arr_league[] = $rs["b_zone_id"]."*-*".$rs["b_zone"];
	$arr_list[$rs["b_zone_id"]][] = $rs;
}
$arr_league = array_unique($arr_league);
//print_r($arr_list[1]);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<script src="jsui/external/jquery/jquery.js?v=2019"></script>
<style>
body {
	margin:0px;
	padding:0px;
	background:#FFF;
	font-size: 12px;
	font-family: tahoma, "Microsoft Sans Serif", Vanessa;
}
.title_tb {
	height:0px;
}
title_tb td {
	height:0px;
	overflow:hidden;
}
.tdle {
	background-image: linear-gradient(top, #DE7D79, #CA3527);
	background-image: -moz-linear-gradient(top, #DE7D79, #CA3527);
	background-image: -webkit-linear-gradient(top, #DE7D79, #CA3527);
	background-image: -o-linear-gradient(top, #DE7D79, #CA3527);
	background-image: -ms-linear-gradient(top, #DE7D79, #CA3527);
	height:20px;
	border-top:1px solid #6694b8;
	border-bottom:1px solid #6694b8;
}
.td_bd_right {
	border-right:1px solid #6694b8;
}
.td_bd_bottom {
	border-bottom:1px solid #6694b8;
}
.td_bd_top {
	border-top:1px solid #6694b8;
}
.tr_data {
	background:#B7FCBE;
}
.tr_data_1h {
	background:#EED4D4;
}

.tr_data td , .tr_data_1h:td {
	height:20px;
	padding:0px 2px;
}
.td_bg_white {
	background:#FFF !important;
}
.td_bg_yellow {
	background:#FFFCAD !important;
}
.td_bg_red {
	background:#F1CACC !important;
}
.red {
	color:#F00;
}
.blue {
	color:#00F;
}
.gray {
	color:#CCC;
}
.gray2 {
	color:#999;
}
.hand_hover {
	cursor:pointer;
}
.lk_hover:hover {
	text-decoration:underline;
}
.txt_none {
	width:95%;
	outline:none;
	border:none;
	background:none;
	font-size: 12px;
  	font-family: tahoma, "Microsoft Sans Serif", Vanessa;
}
.acenter {
	text-align:center;
}
.aright {
	text-align:right;
}

</style>
<script>
/*var refp;
refp=setTimeout("ref_page()",1000);
 $(document).ready(function() {
   $.ajaxSetup({ cache: false });
 });
function ref_page(){
	$.post( 'refresh_page/token.php?randval='+ Math.random(), { "fzone": 1}, function( data ) {
	  console.log( data.f_refresh );
	  if(data.f_refresh==1){
		  location.reload();
	  }else{
	  	refp=setTimeout("ref_page()",1000);
	  }
	}, "json");
}*/
function edit_list(){
	parent.document.getElementById("frameset2").rows="24,*,120";  
	parent.footx.location.href="edit_list.php";
}
function open_1(id,ty){
	parent.document.getElementById("frameset2").rows="24,*,120";  
	parent.footx.location.href="open_1.php?id="+id+"&ty="+ty;
}
var c_percen = 1;
var c_ball = 1;
var c_L = 1;
var c_price = 1;
var c_score = 1;
function numberonly(event,el,ty_txt,ths,id){
	var e=window.event?window.event:event;
	var keyCode=e.keyCode?e.keyCode:e.which?e.which:e.charCode;   			
	
	//console.log(keyCode);
	     
	//0-9 (numpad,keyboard)
	if(ty_txt=="%"){
		if(c_percen==1){
			$(el).val("");
			c_percen=0;
		}
	}else if(ty_txt=="ball"){
		if(c_ball==1){
			$(el).val("");
			c_ball=0;
		}
	}else if(ty_txt=="score"){
		if(c_score==1){
			$(el).val("");
			c_score=0;
		}
	}else if(ty_txt=="score_1h"){
		if(c_score_1h==1){
			$(el).val("");
			c_score_1h=0;
		}
	}else if(ty_txt=="score_ft"){
		if(c_score_ft==1){
			$(el).val("");
			c_score_ft=0;
		}
	}else if(ty_txt=="L"){
		if(c_L==1){
			$(el).val("");
			c_L=0;
		}
	}else if(ty_txt=="price"){
		if(c_price==1){
			$(el).val("");
			c_price=0;
		}
	}
	
	if(keyCode==13){ 
		if(ty_txt=="score"){
			set_score(ths,$(el).val(),id);
			c_score=1;
		}else if(ty_txt=="score_1h"){
			set_score_1h(ths,$(el).val(),id);
			c_score_1h=1;
		}else if(ty_txt=="score_ft"){
			set_score_ft(ths,$(el).val(),id);
			c_score_ft=1;
		}else if(ty_txt=="%"){
			set_percen(ths,$(el).val(),id);
			c_percen=1;
		}else if(ty_txt=="ball"){
			set_ball(ths,$(el).val(),id);
			c_ball=1;
		}else if(ty_txt=="L"){
			set_L(ths,$(el).val(),id);
			c_L=1;
		}else if(ty_txt=="price"){
			set_price(ths,$(el).val(),id);
			c_price=1;
		}
	}
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
function set_score(ty , val , id){
	$.post("ajax/set_score.php" , { 'ty': ty , 'val': val , "id" : id },
		function(data){
			//save success;
	});	
}
function set_percen(ty , val , id){
	$.post("ajax/set_percen.php" , { 'ty': ty , 'val': val , "id" : id },
		function(data){
			//save success;
	});	
}
function set_ball(ty , val , id){
	$.post("ajax/set_ball.php" , { 'ty': ty , 'val': val , "id" : id },
		function(data){
			//save success;
	});	
}
function set_L(ty , val , id){
	$.post("ajax/set_L.php" , { 'ty': ty , 'val': val , "id" : id },
		function(data){
			//save success;
	});	
}
function set_score_1h(ty , val , id){
	$.post("ajax/set_score_1h.php" , { 'ty': ty , 'val': val , "id" : id },
		function(data){
			//save success;
	});	
}
function set_score_ft(ty , val , id){
	$.post("ajax/set_score_ft.php" , { 'ty': ty , 'val': val , "id" : id },
		function(data){
			//save success;
	});	
}
function set_price(ty , val , id){
	$.post("ajax/set_price.php" , { 'ty': ty , 'val': val , "id" : id },
		function(data){
			//save success;
			if(parseFloat(val)<0){
				$("#price"+ty+"_"+id).addClass("red");
			}else{
				$("#price"+ty+"_"+id).removeClass("red");
			}
	});	
}
function set_X(ele , id){
	var val = $(ele).html();
	$.post("ajax/set_X.php" , { 'val': val , "id" : id },
		function(data){
			//save success;
			if(val=="O"){
				$(ele).html("X");
				$(ele).removeClass("gray");
				$(ele).addClass("red");
			}else{
				$(ele).html("O");
				$(ele).removeClass("red");
				$(ele).addClass("gray");
			}
	});	
}
function set_W(ele , id){
	var val = $(ele).html();
	$.post("ajax/set_W.php" , { 'val': val , "id" : id },
		function(data){
			//save success;
			if(val=="O"){
				$(ele).html("X");
				$(ele).removeClass("gray");
				$(ele).addClass("red");
			}else{
				$(ele).html("O");
				$(ele).removeClass("red");
				$(ele).addClass("gray");
			}
	});	
}
function set_B(ele , id){
	var val = $(ele).html();
	$.post("ajax/set_B.php" , { 'val': val , "id" : id },
		function(data){
			//save success;
			if(val=="O"){
				$(ele).html("X");
				$(ele).removeClass("gray");
				$(ele).addClass("red");
			}else{
				$(ele).html("O");
				$(ele).removeClass("red");
				$(ele).addClass("gray");
			}
	});	
}
function set_key(ele , id){
	var val = $(ele).html();
	$.post("ajax/set_key.php" , { 'val': val , "id" : id },
		function(data){
			//save success;
			if(val=="O"){
				$(ele).html("X");
				$(ele).removeClass("gray");
				$(ele).addClass("red");
			}else{
				$(ele).html("O");
				$(ele).removeClass("red");
				$(ele).addClass("gray");
			}
	});	
}
<? if($_GET["fev"]==1){ ?>
function save_fev(e,val){
	$.post("ajax/set_fev.php" , { 'val': val },
		function(data){
			//save success;
			$(".fev_id_"+val).remove();
	});	
}
<? }else{ ?>
function save_fev(e,val){
	$.post("ajax/set_fev.php" , { 'val': val },
		function(data){
			//save success;
			if(data=="FEV"){
				$(e).attr("src" , "../img/star2.png");
			}else{
				$(e).attr("src" , "../img/star1.png");
			}
	});	
}
<? } ?>
</script>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <? foreach ($arr_league as &$value_league) { $ex_league = explode("*-*" , $value_league); 
  
  if($_GET["fev"]==1){
	 // print_r( $_SESSION["fev_ball"]);
	 // echo in_array($ex_league[0], $_SESSION["fev_ball"]);
	  if (in_array($ex_league[0], $_SESSION["fev_ball"])) {
		  //echo "sssss";
	  }else{
		  continue;
		 }
	}
  ?>
  <tr class="fev_id_<?=$ex_league[0]?>">
  	<td width="1%" align="center" class="tdle">O</td>
    <td width="1%" align="center" class="tdle">X</td>
    <td width="1%" align="center" class="tdle">O</td>
    <td width="1%" align="center" class="tdle">X</td>
    <td width="1%" align="center" class="tdle">O</td>
    <td width="1%" align="center" class="tdle">X</td>
    <td class="tdle">&nbsp;</td>
    <td colspan="2" align="center" class="tdle"><strong><?=$ex_league[1]?></strong></td>
    <td colspan="15" class="tdle td_bd_right" align="right"><img src="../img/star<? if (in_array($ex_league[0], $_SESSION["fev_ball"])) { echo "2"; }else{ echo "1"; } ?>.png" style="vertical-align: middle; cursor:pointer;" onClick="save_fev(this , '<?=$ex_league[0]?>');">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <? foreach ($arr_list[$ex_league[0]] as &$value_list) { $id = $value_list["b_id"]."_".$value_list["b_add"]."_ft"; ?>
  <tr class="tr_data fev_id_<?=$ex_league[0]?>">
    <td align="right" class="td_bd_right td_bd_bottom td_bg_white td_bd_top" colspan="15">&nbsp;</td>
    
    <td width="7%" align="center" class="td_bd_right td_bd_bottom td_bg_white td_bd_top">2 - 0</td>
    <td width="7%" align="center" class="td_bd_right td_bd_bottom td_bg_white td_bd_top">1 - 0</td>
    <td width="7%" align="center" class="td_bd_right td_bd_bottom td_bg_white td_bd_top">0 - 0</td>
    <td width="7%" align="center" class="td_bd_right td_bd_bottom td_bg_white td_bd_top">0 - 1</td>
    <td width="7%" align="center" class="td_bd_right td_bd_bottom td_bg_white td_bd_top">0 - 2</td>
    
    <td colspan="4" align="center" class="td_bd_right td_bd_bottom td_bg_white td_bd_top">&nbsp;</td>
    <td width="4%" class="td_bg_white">&nbsp;</td>
  </tr>
  <tr class="tr_data fev_id_<?=$ex_league[0]?>">
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white"><span class="<? if($value_list["b_close"]==1){ echo "gray"; }else{ echo "red"; } ?> hand_hover" onClick="set_X(this,'<?=$id?>');" id="X_<?=$id?>"><? if($value_list["b_close"]==1){ echo "O"; }else{ echo "X"; } ?></span></td>
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white"><span class="<? if($value_list["b_view"]==1){ echo "gray"; }else{ echo "red"; } ?> hand_hover" onClick="set_W(this,'<?=$id?>');" id="W_<?=$id?>"><? if($value_list["b_view"]==1){ echo "O"; }else{ echo "X"; } ?></span></td>
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white"><span class="<? if($value_list["b_bet"]==1){ echo "gray"; }else{ echo "red"; } ?> hand_hover" onClick="set_B(this,'<?=$id?>');" id="B_<?=$id?>"><? if($value_list["b_bet"]==1){ echo "O"; }else{ echo "X"; } ?></span></td>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom td_bg_white"><span class="<? if($value_list["b_accept"]==1){ echo "gray"; }else{ echo "red"; } ?> hand_hover" onClick="set_key(this,'<?=$id?>');" id="key_<?=$id?>"><? if($value_list["b_accept"]==1){ echo "O"; }else{ echo "X"; } ?></span></td>
    <td width="9%" align="center" class="td_bd_right td_bd_bottom hand_hover lk_hover <?=($value_list['b_big'] == 1) ? 'red' : 'blue'?>" onClick="parent.leftx.location.href='drop_list.php?id=<?=$id?>&ty=1';"><strong><?=$value_list["b_name_1"]?></strong></td>
    <td width="9%" align="center" class="td_bd_right td_bd_bottom hand_hover lk_hover <?=($value_list['b_big'] == 2) ? 'red' : 'blue'?>" onClick="parent.leftx.location.href='drop_list.php?id=<?=$id?>&ty=2';"><strong><?=$value_list["b_name_2"]?></strong></td>
    <td width="3%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none acenter" onClick="c_percen=1;" onKeyDown="return numberonly(event,this,'%','1','<?=$id?>')" id="percen1_<?=$id?>" value="<?=$value_list["b_percent_hdc"]?>"></td>
    <td width="5%" align="left" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none" onClick="c_ball=1;" onKeyDown="return numberonly(event,this,'ball','1','<?=$id?>')" id="ball1_<?=$id?>" value="<?=$value_list["b_hdc"]?>"></td>
    <td width="2%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none acenter" maxlength="1" onClick="c_L=1;" onKeyDown="return numberonly(event,this,'L','1','<?=$id?>')" id="L1_<?=$id?>" value="<?=$value_list["b_auto_hdc"]?>"></td>
    <td width="5%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none aright<? if($value_list["b_hdc_1"]<0){ echo " red"; } ?>" onClick="c_price=1;" onKeyDown="return numberonly(event,this,'price','1','<?=$id?>')" id="price1_<?=$id?>" value="<?=$value_list["b_hdc_1"]?>"></td>
    <td width="8%" align="center" class="td_bd_right td_bd_bottom td_bg_yellow hand_hover lk_hover" onClick="parent.rightx.location.href='box_right2.php?id=<?=$id?>&ty=1';"><?=_harn($value_list["b_count_1"])?> - <?=_harn($value_list["b_count_2"])?></td>
    <td width="4%" align="right" class="td_bd_right td_bd_bottom td_bg_white<? if(($value_list["b_count_1"]-$value_list["b_count_2"])<0){ echo " red"; } ?> hand_hover lk_hover" onClick="open_1('<?=$id?>' , '1');"><?=_harn($value_list["b_count_1"]-$value_list["b_count_2"])?></td>
    
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red">-10,911</td>
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red">-10,911</td>
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red">-10,911</td>
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red">-10,911</td>
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red">-10,911</td>
    <?
    $ex_score = explode("-",$value_list["b_score_live"]);
	?>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom td_bg_red" rowspan="5"><input type="text" class="txt_none acenter" onClick="c_score=1;" onKeyDown="return numberonly(event,this,'score','1','<?=$id?>')" id="score1_<?=$id?>" value="<?=$ex_score[0]?>"></td>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom td_bg_red" rowspan="5"><input type="text" class="txt_none acenter" onClick="c_score=1;" onKeyDown="return numberonly(event,this,'score','2','<?=$id?>')" id="score2_<?=$id?>" value="<?=$ex_score[1]?>"></td>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom td_bg_white" rowspan="5"><input type="text" class="txt_none acenter" onClick="c_score_1h=1;" onKeyDown="return numberonly(event,this,'score_1h','1','<?=$id?>')" id="score_1h_<?=$id?>" value="<?=$value_list["b_score_1h"]?>"></td>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom td_bg_white" rowspan="5"><input type="text" class="txt_none acenter" onClick="c_score_ft=1;" onKeyDown="return numberonly(event,this,'score_ft','1','<?=$id?>')" id="score_ft_<?=$id?>" value="<?=$value_list["b_score_ft"]?>"></td>
    <td width="4%" class="td_bg_white">&nbsp;</td>
  </tr>
  <tr class="tr_data fev_id_<?=$ex_league[0]?>">
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white gray">&nbsp;</td>
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white red">&nbsp;</td>
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white red">&nbsp;</td>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom td_bg_white gray">&nbsp;</td>
    <td width="9%" align="center" class="td_bd_right td_bd_bottom hand_hover lk_hover red" onClick="parent.leftx.location.href='drop_list.php?id=<?=$id?>&ty=3';"><strong>สูง</strong></td>
    <td width="9%" align="center" class="td_bd_right td_bd_bottom hand_hover lk_hover blue" onClick="parent.leftx.location.href='drop_list.php?id=<?=$id?>&ty=4';"><strong>ต่ำ</strong></td>
    <td width="3%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none acenter" onClick="c_percen=1;" onKeyDown="return numberonly(event,this,'%','2','<?=$id?>')" id="percen2_<?=$id?>" value="<?=$value_list["b_percent_goal"]?>"></td>
    <td width="5%" align="left" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none" onClick="c_ball=1;" onKeyDown="return numberonly(event,this,'ball','2','<?=$id?>')" id="ball2_<?=$id?>" value="<?=$value_list["b_goal"]?>"></td>
    <td width="2%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none acenter" maxlength="1" onClick="c_L=1;" onKeyDown="return numberonly(event,this,'L','2','<?=$id?>')" id="L2_<?=$id?>" value="<?=$value_list["b_auto_goal"]?>"></td>
    <td width="5%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none aright<? if($value_list["b_goal_1"]<0){ echo " red"; } ?>" onClick="c_price=1;" onKeyDown="return numberonly(event,this,'price','2','<?=$id?>')" id="price2_<?=$id?>" value="<?=$value_list["b_goal_1"]?>"></td>
    <td width="8%" align="center" class="td_bd_right td_bd_bottom td_bg_yellow hand_hover lk_hover" onClick="parent.rightx.location.href='box_right2.php?id=<?=$id?>&ty=1';"><?=_harn($value_list["b_count_3"])?> - <?=_harn($value_list["b_count_4"])?></td>
    <td width="4%" align="right" class="td_bd_right td_bd_bottom td_bg_white<? if(($value_list["b_count_3"]-$value_list["b_count_4"])<0){ echo " red"; } ?> hand_hover lk_hover" onClick="open_1('<?=$id?>' , '2');"><?=_harn($value_list["b_count_3"]-$value_list["b_count_4"])?></td>
    
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red">-10,911</td>
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red">-10,911</td>
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red">-10,911</td>
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red">-10,911</td>
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red">-10,911</td>
    <td width="4%" class="td_bg_white">&nbsp;</td>
  </tr>
  
  <tr class="tr_data fev_id_<?=$ex_league[0]?>">
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white gray">&nbsp;</td>
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white red">&nbsp;</td>
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white red">&nbsp;</td>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom td_bg_white gray">&nbsp;</td>
    <td width="18%" align="center" class="td_bd_right td_bd_bottom hand_hover lk_hover red" colspan="2" onClick="parent.leftx.location.href='drop_list.php?id=<?=$id?>&ty=9';"><strong>เจ้าบ้าน</strong></td>
    <td width="8%" align="right" class="td_bd_right td_bd_bottom" colspan="2" rowspan="3">&nbsp;</td>
    <td width="2%" align="right" class="td_bd_right td_bd_bottom" rowspan="3"><input type="text" class="txt_none acenter" maxlength="1" onClick="c_L=1;" onKeyDown="return numberonly(event,this,'L','5','<?=$id?>')" id="L5_<?=$id?>" value="<?=$value_list["b_auto_1x2"]?>"></td>
    <td width="5%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none aright" onClick="c_price=1;" onKeyDown="return numberonly(event,this,'price','5h','<?=$id?>')" id="price5h_<?=$id?>" value="<?=$value_list["b_1x2_1"]?>"></td>
    <td width="8%" align="center" class="td_bd_right td_bd_bottom td_bg_yellow hand_hover lk_hover" rowspan="3" onClick="parent.rightx.location.href='box_right2.php?id=<?=$id?>&ty=5';"><?=_harn($value_list["b_count_5"])?><br><?=_harn($value_list["b_count_6"])?><br><?=_harn($value_list["b_count_7"])?></td>
    <td width="4%" align="right" class="td_bd_right td_bd_bottom td_bg_white<? if(($value_list["b_count_5"]-$value_list["b_count_6"]-$value_list["b_count_7"])<0){ echo " red"; } ?> hand_hover lk_hover" rowspan="3" onClick="open_1('<?=$id?>' , '5');"><?=_harn($value_list["b_count_5"]-$value_list["b_count_6"]-$value_list["b_count_7"])?></td>
    
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red" rowspan="3">-10,911</td>
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red" rowspan="3">-10,911</td>
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red" rowspan="3">-10,911</td>
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red" rowspan="3">-10,911</td>
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red" rowspan="3">-10,911</td>
    <td width="4%" class="td_bg_white">&nbsp;</td>
  </tr>
  <tr class="tr_data fev_id_<?=$ex_league[0]?>">
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white gray">&nbsp;</td>
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white red">&nbsp;</td>
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white red">&nbsp;</td>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom td_bg_white gray">&nbsp;</td>
    <td width="18%" align="center" class="td_bd_right td_bd_bottom hand_hover lk_hover gray2" colspan="2" onClick="parent.leftx.location.href='drop_list.php?id=<?=$id?>&ty=10';"><strong>เสมอ</strong></td>
    <td width="5%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none aright" onClick="c_price=1;" onKeyDown="return numberonly(event,this,'price','5x','<?=$id?>')" id="price5x_<?=$id?>" value="<?=$value_list["b_1x2_draw"]?>"></td>
    <td width="4%" class="td_bg_white">&nbsp;</td>
  </tr>
  <tr class="tr_data fev_id_<?=$ex_league[0]?>">
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white gray">&nbsp;</td>
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white red">&nbsp;</td>
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white red">&nbsp;</td>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom td_bg_white gray">&nbsp;</td>
    <td width="18%" align="center" class="td_bd_right td_bd_bottom hand_hover lk_hover blue" colspan="2"><strong>ทีมเยือน</strong></td>
    <td width="5%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none aright" onClick="c_price=1;" onKeyDown="return numberonly(event,this,'price','5a','<?=$id?>')" id="price5a_<?=$id?>" value="<?=$value_list["b_1x2_2"]?>"></td>
    <td width="4%" class="td_bg_white">&nbsp;</td>
  </tr>
  
  
  <tr class="tr_data fev_id_<?=$ex_league[0]?>">
    <td align="right" class="td_bd_right td_bd_bottom td_bg_white" colspan="15">&nbsp;</td>
    
    <td width="7%" align="center" class="td_bd_right td_bd_bottom td_bg_white">0</td>
    <td width="7%" align="center" class="td_bd_right td_bd_bottom td_bg_white">1</td>
    <td width="7%" align="center" class="td_bd_right td_bd_bottom td_bg_white">2</td>
    <td width="7%" align="center" class="td_bd_right td_bd_bottom td_bg_white">3</td>
    <td width="7%" align="center" class="td_bd_right td_bd_bottom td_bg_white">4</td>
    
    <td colspan="4" align="center" class="td_bd_right td_bd_bottom td_bg_white">&nbsp;</td>
    <td width="4%" class="td_bg_white">&nbsp;</td>
  </tr>
  <? } ?>
  <tr class="fev_id_<?=$ex_league[0]?>">
  	<td width="1%" align="center" class="tdle">O</td>
    <td width="1%" align="center" class="tdle">X</td>
    <td width="1%" align="center" class="tdle">O</td>
    <td width="1%" align="center" class="tdle">X</td>
    <td width="1%" align="center" class="tdle">O</td>
    <td width="1%" align="center" class="tdle">X</td>
    <td class="tdle">&nbsp;</td>
    <td colspan="2" align="center" class="tdle"><strong><?=$ex_league[1]?> (ครึ่งแรก)</strong></td>
    <td colspan="15" class="tdle td_bd_right">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <? foreach ($arr_list[$ex_league[0]] as &$value_list) { $id = $value_list["b_id"]."_".$value_list["b_add"]."_1h"; ?>
  <tr class="tr_data_1h fev_id_<?=$ex_league[0]?>">
    <td align="right" class="td_bd_right td_bd_bottom td_bg_white td_bd_top" colspan="15">&nbsp;</td>
    
    <td width="7%" align="center" class="td_bd_right td_bd_bottom td_bg_white td_bd_top">2 - 0</td>
    <td width="7%" align="center" class="td_bd_right td_bd_bottom td_bg_white td_bd_top">1 - 0</td>
    <td width="7%" align="center" class="td_bd_right td_bd_bottom td_bg_white td_bd_top">0 - 0</td>
    <td width="7%" align="center" class="td_bd_right td_bd_bottom td_bg_white td_bd_top">0 - 1</td>
    <td width="7%" align="center" class="td_bd_right td_bd_bottom td_bg_white td_bd_top">0 - 2</td>
    
    <td colspan="4" align="center" class="td_bd_right td_bd_bottom td_bg_white td_bd_top">&nbsp;</td>
    <td width="4%" class="td_bg_white">&nbsp;</td>
  </tr>
  <tr class="tr_data_1h fev_id_<?=$ex_league[0]?>">
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white"><span class="<? if($value_list["b_1h_close"]==1){ echo "gray"; }else{ echo "red"; } ?> hand_hover" onClick="set_X(this,'<?=$id?>');" id="X_<?=$id?>"><? if($value_list["b_1h_close"]==1){ echo "O"; }else{ echo "X"; } ?></span></td>
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white"><span class="<? if($value_list["b_1h_view"]==1){ echo "gray"; }else{ echo "red"; } ?> hand_hover" onClick="set_W(this,'<?=$id?>');" id="W_<?=$id?>"><? if($value_list["b_1h_view"]==1){ echo "O"; }else{ echo "X"; } ?></span></td>
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white"><span class="<? if($value_list["b_1h_bet"]==1){ echo "gray"; }else{ echo "red"; } ?> hand_hover" onClick="set_B(this,'<?=$id?>');" id="B_<?=$id?>"><? if($value_list["b_1h_bet"]==1){ echo "O"; }else{ echo "X"; } ?></span></td>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom td_bg_white"><span class="<? if($value_list["b_1h_accept"]==1){ echo "gray"; }else{ echo "red"; } ?> hand_hover" onClick="set_key(this,'<?=$id?>');" id="key_<?=$id?>"><? if($value_list["b_1h_accept"]==1){ echo "O"; }else{ echo "X"; } ?></span></td>
    <td width="9%" align="center" class="td_bd_right td_bd_bottom hand_hover lk_hover <?=($value_list['b_big'] == 1) ? 'red' : 'blue'?>" onClick="parent.leftx.location.href='drop_list.php?id=<?=$id?>&ty=1';"><strong><?=$value_list["b_name_1"]?></strong></td>
    <td width="9%" align="center" class="td_bd_right td_bd_bottom hand_hover lk_hover <?=($value_list['b_big'] == 2) ? 'red' : 'blue'?>" onClick="parent.leftx.location.href='drop_list.php?id=<?=$id?>&ty=2';"><strong><?=$value_list["b_name_2"]?></strong></td>
    <td width="3%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none acenter" onClick="c_percen=1;" onKeyDown="return numberonly(event,this,'%','3','<?=$id?>')" id="percen3_<?=$id?>" value="<?=$value_list["b_1h_percent_hdc"]?>"></td>
    <td width="5%" align="left" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none" onClick="c_ball=1;" onKeyDown="return numberonly(event,this,'ball','3','<?=$id?>')" id="ball3_<?=$id?>" value="<?=$value_list["b_1h_hdc"]?>"></td>
    <td width="2%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none acenter" maxlength="1" onClick="c_L=1;" onKeyDown="return numberonly(event,this,'L','3','<?=$id?>')" id="L3_<?=$id?>" value="<?=$value_list["b_1h_auto_hdc"]?>"></td>
    <td width="5%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none aright<? if($value_list["b_1h_hdc_1"]<0){ echo " red"; } ?>" onClick="c_price=1;" onKeyDown="return numberonly(event,this,'price','3','<?=$id?>')" id="price3_<?=$id?>" value="<?=$value_list["b_1h_hdc_1"]?>"></td>
    <td width="8%" align="center" class="td_bd_right td_bd_bottom td_bg_yellow hand_hover lk_hover" onClick="parent.rightx.location.href='box_right2.php?id=<?=$id?>&ty=1';"><?=_harn($value_list["b_1h_count_1"])?> - <?=_harn($value_list["b_1h_count_2"])?></td>
    <td width="4%" align="right" class="td_bd_right td_bd_bottom td_bg_white<? if(($value_list["b_1h_count_1"]-$value_list["b_1h_count_2"])<0){ echo " red"; } ?> hand_hover lk_hover" onClick="open_1('<?=$id?>' , '3');"><?=_harn($value_list["b_1h_count_1"]-$value_list["b_1h_count_2"])?></td>
    
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red">-10,911</td>
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red">-10,911</td>
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red">-10,911</td>
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red">-10,911</td>
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red">-10,911</td>
    <?
    $ex_score = explode("-",$value_list["b_score_live"]);
	?>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom td_bg_red" rowspan="5"><input type="text" class="txt_none acenter" onClick="c_score=1;" onKeyDown="return numberonly(event,this,'score','1','<?=$id?>')" id="score1_<?=$id?>" value="<?=$ex_score[0]?>"></td>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom td_bg_red" rowspan="5"><input type="text" class="txt_none acenter" onClick="c_score=1;" onKeyDown="return numberonly(event,this,'score','2','<?=$id?>')" id="score2_<?=$id?>" value="<?=$ex_score[1]?>"></td>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom td_bg_white" rowspan="5"><input type="text" class="txt_none acenter" onClick="c_score_1h=1;" onKeyDown="return numberonly(event,this,'score_1h','1','<?=$id?>')" id="score_1h_<?=$id?>" value="<?=$value_list["b_score_1h"]?>"></td>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom td_bg_white" rowspan="5"><input type="text" class="txt_none acenter" onClick="c_score_ft=1;" onKeyDown="return numberonly(event,this,'score_ft','1','<?=$id?>')" id="score_ft_<?=$id?>" value="<?=$value_list["b_score_ft"]?>"></td>
    <td width="4%" class="td_bg_white">&nbsp;</td>
  </tr>
  <tr class="tr_data_1h fev_id_<?=$ex_league[0]?>">
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white gray">&nbsp;</td>
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white red">&nbsp;</td>
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white red">&nbsp;</td>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom td_bg_white gray">&nbsp;</td>
    <td width="9%" align="center" class="td_bd_right td_bd_bottom hand_hover lk_hover red" onClick="parent.leftx.location.href='drop_list.php?id=<?=$id?>&ty=3';"><strong>สูง</strong></td>
    <td width="9%" align="center" class="td_bd_right td_bd_bottom hand_hover lk_hover blue" onClick="parent.leftx.location.href='drop_list.php?id=<?=$id?>&ty=4';"><strong>ต่ำ</strong></td>
    <td width="3%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none acenter" onClick="c_percen=1;" onKeyDown="return numberonly(event,this,'%','4','<?=$id?>')" id="percen4_<?=$id?>" value="<?=$value_list["b_1h_percent_goal"]?>"></td>
    <td width="5%" align="left" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none" onClick="c_ball=1;" onKeyDown="return numberonly(event,this,'ball','4','<?=$id?>')" id="ball4_<?=$id?>" value="<?=$value_list["b_1h_goal"]?>"></td>
    <td width="2%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none acenter" maxlength="1" onClick="c_L=1;" onKeyDown="return numberonly(event,this,'L','4','<?=$id?>')" id="L4_<?=$id?>" value="<?=$value_list["b_1h_auto_goal"]?>"></td>
    <td width="5%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none aright<? if($value_list["b_1h_goal_1"]<0){ echo " red"; } ?>" onClick="c_price=1;" onKeyDown="return numberonly(event,this,'price','4','<?=$id?>')" id="price4_<?=$id?>" value="<?=$value_list["b_1h_goal_1"]?>"></td>
    <td width="8%" align="center" class="td_bd_right td_bd_bottom td_bg_yellow hand_hover lk_hover" onClick="parent.rightx.location.href='box_right2.php?id=<?=$id?>&ty=1';"><?=_harn($value_list["b_1h_count_3"])?> - <?=_harn($value_list["b_1h_count_4"])?></td>
    <td width="4%" align="right" class="td_bd_right td_bd_bottom td_bg_white<? if(($value_list["b_1h_count_3"]-$value_list["b_1h_count_4"])<0){ echo " red"; } ?> hand_hover lk_hover" onClick="open_1('<?=$id?>' , '4');"><?=_harn($value_list["b_1h_count_3"]-$value_list["b_1h_count_4"])?></td>
    
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red">-10,911</td>
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red">-10,911</td>
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red">-10,911</td>
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red">-10,911</td>
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red">-10,911</td>
    <td width="4%" class="td_bg_white">&nbsp;</td>
  </tr>
  
  <tr class="tr_data_1h fev_id_<?=$ex_league[0]?>">
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white gray">&nbsp;</td>
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white red">&nbsp;</td>
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white red">&nbsp;</td>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom td_bg_white gray">&nbsp;</td>
    <td width="18%" align="center" class="td_bd_right td_bd_bottom hand_hover lk_hover red" colspan="2" onClick="parent.leftx.location.href='drop_list.php?id=<?=$id?>&ty=9';"><strong>เจ้าบ้าน</strong></td>
    <td width="8%" align="right" class="td_bd_right td_bd_bottom" colspan="2" rowspan="3">&nbsp;</td>
    <td width="2%" align="right" class="td_bd_right td_bd_bottom" rowspan="3"><input type="text" class="txt_none acenter" maxlength="1" onClick="c_L=1;" onKeyDown="return numberonly(event,this,'L','6','<?=$id?>')" id="L6_<?=$id?>" value="<?=$value_list["b_1h_auto_1x2"]?>"></td>
    <td width="5%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none aright" onClick="c_price=1;" onKeyDown="return numberonly(event,this,'price','6h','<?=$id?>')" id="price6h_<?=$id?>" value="<?=$value_list["b_1h_1x2_1"]?>"></td>
    <td width="8%" align="center" class="td_bd_right td_bd_bottom td_bg_yellow hand_hover lk_hover" rowspan="3" onClick="parent.rightx.location.href='box_right2.php?id=<?=$id?>&ty=6';"><?=_harn($value_list["b_1h_count_5"])?><br><?=_harn($value_list["b_1h_count_6"])?><br><?=_harn($value_list["b_1h_count_7"])?></td>
    <td width="4%" align="right" class="td_bd_right td_bd_bottom td_bg_white<? if(($value_list["b_1h_count_5"]-$value_list["b_1h_count_6"]-$value_list["b_1h_count_7"])<0){ echo " red"; } ?> hand_hover lk_hover" rowspan="3" onClick="open_1('<?=$id?>' , '6');"><?=_harn($value_list["b_1h_count_5"]-$value_list["b_1h_count_6"]-$value_list["b_1h_count_7"])?></td>
    
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red" rowspan="3">-10,911</td>
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red" rowspan="3">-10,911</td>
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red" rowspan="3">-10,911</td>
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red" rowspan="3">-10,911</td>
    <td width="7%" align="right" class="td_bd_right td_bd_bottom red" rowspan="3">-10,911</td>
    <td width="4%" class="td_bg_white">&nbsp;</td>
  </tr>
  <tr class="tr_data_1h fev_id_<?=$ex_league[0]?>">
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white gray">&nbsp;</td>
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white red">&nbsp;</td>
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white red">&nbsp;</td>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom td_bg_white gray">&nbsp;</td>
    <td width="18%" align="center" class="td_bd_right td_bd_bottom hand_hover lk_hover gray2" colspan="2" onClick="parent.leftx.location.href='drop_list.php?id=<?=$id?>&ty=10';"><strong>เสมอ</strong></td>
    <td width="5%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none aright" onClick="c_price=1;" onKeyDown="return numberonly(event,this,'price','6x','<?=$id?>')" id="price6x_<?=$id?>" value="<?=$value_list["b_1h_1x2_draw"]?>"></td>
    <td width="4%" class="td_bg_white">&nbsp;</td>
  </tr>
  <tr class="tr_data_1h fev_id_<?=$ex_league[0]?>">
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white gray">&nbsp;</td>
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white red">&nbsp;</td>
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white red">&nbsp;</td>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom td_bg_white gray">&nbsp;</td>
    <td width="18%" align="center" class="td_bd_right td_bd_bottom hand_hover lk_hover blue" colspan="2"><strong>ทีมเยือน</strong></td>
    <td width="5%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none aright" onClick="c_price=1;" onKeyDown="return numberonly(event,this,'price','6a','<?=$id?>')" id="price6a_<?=$id?>" value="<?=$value_list["b_1h_1x2_2"]?>"></td>
    <td width="4%" class="td_bg_white">&nbsp;</td>
  </tr>
  
  
  <tr class="tr_data_1h fev_id_<?=$ex_league[0]?>">
    <td align="right" class="td_bd_right td_bd_bottom td_bg_white" colspan="15">&nbsp;</td>
    
    <td width="7%" align="center" class="td_bd_right td_bd_bottom td_bg_white">0</td>
    <td width="7%" align="center" class="td_bd_right td_bd_bottom td_bg_white">1</td>
    <td width="7%" align="center" class="td_bd_right td_bd_bottom td_bg_white">2</td>
    <td width="7%" align="center" class="td_bd_right td_bd_bottom td_bg_white">3</td>
    <td width="7%" align="center" class="td_bd_right td_bd_bottom td_bg_white">4</td>
    
    <td colspan="4" align="center" class="td_bd_right td_bd_bottom td_bg_white">&nbsp;</td>
    <td width="4%" class="td_bg_white">&nbsp;</td>
  </tr>
  <? } ?>
  <? } ?>
</table>
</body>
</html>