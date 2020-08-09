<?php   ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
if(($_SESSION['m_id'] == '') || (!isset($_SESSION['m_id']))){
exit();
}
require('inc/conn.php');
require('inc/function.php');

require("lang/variable_lang.php");
// require("lang/member_lang.php");
// require("/home/ohoking/domains/ohoking.com/public_html/admin_lang/export/lang_member_".$_SESSION['lang'].".php");
require("lang/function_array.php");

$rs_mem = sql_array("select * from bom_tb_member where m_id = '$_SESSION[m_id]'");
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<TITLE><?=$app_title;?></TITLE>
<link rel="stylesheet" type="text/css" href="css/style.css?v=<?=$cache_css;?>">
<? if($_SESSION['lang']=="mm"){?><link rel="stylesheet" type="text/css" href="css/style_mm.css?v=2019"><? }?>
<style>
.cu{ cursor:pointer;}
</style>
<script src="js/jquery-1.9.1.min.js?v=2019"></script>
<script>
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}


function load_can(bid){
	$.ajax({
		type: "POST",
		url: "lotto/load_can.php",
		data: { "bid": bid },
	/*	timeout: 15000,*/
		cache: false,	// Clear cache IE
		beforeSend: function(){
			$("#box_canlist").html("<img src='img/loding.gif' style='opacity:1; margin:auto; display:block;' id='loding-f'>");
		},
		success: function(data){
			$("#box_canlist").html(data);
			//$("#vdata3").hide();
			//parent.parent.leftx.location.href='betform.php';
		}
	});	
}

function load_lotfree(){
	 $("#box_canlist").html("");
	 }

var load_frist = 1;
var ele_c = "1_0";
var box_c = 1;

//นับเวลารอเดิมพัน
var tmc_wait;
//นับเวลาเดิมพันล่าสุด
var tmc_last;

$(document).ready(function() {
	// get_credit();
	loadNowPlaying();
	 //menu_sport(2);
	menu_bet(2,1);
	flbet(1);
});
// function get_credit(){
// 	$.ajax({
// 		type: "POST",
// 		url: "inc/get_credit.php",
// 		//data: { "sum": $("#mbet").val() },
// 	/*	timeout: 15000,*/
// 		dataType:"json",
// 		cache: false,	// Clear cache IE
// 		beforeSend: function(){
// 			$("#res_cre").html("<img src='img/loding.gif' style='opacity:1; margin:7px auto; display:block;' id='loding-f'>");
// 			$("#res_incre").html("<img src='img/loding.gif' style='opacity:1; margin:7px auto; display:block;' id='loding-f'>");
// 			$("#res_bal").html("<img src='img/loding.gif' style='opacity:1; margin:7px auto; display:block;' id='loding-f'>");
// 		},
// 		success: function(data){
// 			$("#res_cre").html(data.cre);
// 			$("#res_incre").html(data.incre);
// 			$("#res_bal").html(data.wincre);
// 		}
// 	});	
// }
var elo = 0;
function show_box(ele){
	box_c = ele;
	//console.log(elo,ele);
	if(elo!=ele){
		elo = ele;
		$(".bm_head").removeClass("open_h");
		$(".bt1").removeClass("red");
		$("#bm"+ele).addClass("open_h");
		$("#bm"+ele+" .bt1").addClass("red");
		
		$( ".bm_box" ).slideUp( "fast", function() {
		});
		if(load_frist==1){
			//$("#td_mr"+ele+"_0").click();
			go_mr(ele+"_0");
			load_frist = 0;
		}else if(load_frist==2){
			$("#td_mr"+ele+"_0").click();
			load_frist = 0;
		}else{
			go_mr(ele_c);
		}
		$( "#bbm"+ele ).slideDown( "fast", function() {
			// Animation complete.
			//go_mr(ele+"_0");
			//$("#td_mr"+ele+"_0").click();
		});
	}
}
function menu_sport(ele){
	elo = 0;
	$(".img_active2").hide();
	$("#msp"+ele).css('display' , 'block');
	var url;
	if(ele==1){
		url = "inc/menu_tomorow.php";
	}else if(ele==2){
		url = "inc/menu_today.php";
	}else if(ele==3){
		url = "inc/menu_live.php";
	}
	$.ajax({
		type: "POST",
		url: url,
		//data: { "sum": $("#mbet").val() },
	/*	timeout: 15000,*/
		cache: false,	// Clear cache IE
		beforeSend: function(){
			$("#box_menu").html("<img src='img/loding.gif' style='opacity:1; margin:7px auto; display:block;' id='loding-f'>");
		},
		success: function(data){
			$("#box_menu").html(data);
			show_box(box_c);
		}
	});	
}
function go_mr(ele){
	$(".link_mr").removeClass("red");
	$("#td_mr"+ele).addClass("red");
	ele_c = ele;
	//console.log($(elm).attr('contextmenu'));
	//parent.topx.goMain(link_to);
}
function menu_bet(ele,tl){
	$(".mb").removeClass('mb_ac');
	$("#mb"+ele).addClass('mb_ac');
	
	$(".img_active3").hide();
	$("#mbl"+ele).css('display' , 'block');
	
	var url;
	if(ele==1){
		url = "inc/bet_wait.php";
	}else if(ele==2){
		url = "inc/bet_last.php";
	}
	$.ajax({
		type: "POST",
		url: url,
		//data: { "sum": $("#mbet").val() },
	/*	timeout: 15000,*/
		cache: false,	// Clear cache IE
		beforeSend: function(){
			if(tl==1){
				$("#box_betlist").html("<img src='img/loding.gif' style='opacity:1; margin:auto; display:block;' id='loding-f'>");
			}
		},
		success: function(data){
			$("#box_betlist").html(data);
		},error: function(data, errorThrown) {
			//alert('request failed :'+errorThrown);
		}
	});	
}
function numberonly(event,el){
	var e=window.event?window.event:event;
	var keyCode=e.keyCode?e.keyCode:e.which?e.which:e.charCode;   			     
	//0-9 (numpad,keyboard)
	if ((keyCode>=96 && keyCode<=105)||(keyCode>=48 && keyCode<=57)){ return true; }
	//backspace,delete,left,right,home,end
	if (',8,46,37,39,36,35,'.indexOf(','+keyCode+',')!=-1){ return true; }          
	return false;
}
function load_bet(tprice_ball , ns , sport_type){
	if(ns>0){
		$.ajax({
			type: "POST",
			url: "bet_football.php#toppage",
			data: { 'tprice_ball': tprice_ball , "sport_type" : sport_type },
		/*	timeout: 15000,*/
			cache: false,	// Clear cache IE
			beforeSend: function(){
				$("#box_bet").html("<img src='img/loding.gif' style='opacity:1; margin:auto; display:block;' id='loding-f'>");
			},
			success: function(data){
				$("#box_bet").html(data);
				//$("#mbet").focus();
			}
		});	
	}else{
		clear_step();
	}
}
function removeRow1(id,arr){ 
	if(parent.rightx.delselect){ 
		parent.rightx.delselect(id,arr); 
	}else{ 
		clear_step();
	 }
}
function clear_step(){
	$.post("del_step.php" , { 'ddd': '0'  , 'ty' : 1},
		function(data){
			if(parent.rightx.pagenones){
				parent.rightx.pagenones();
			}
			$("#box_bet").html("");
	});
}
function cal_price(price,stp,nstp){
	if(price==""){
		price = 0;
	}
	var sprice = price * stp;	
	if(stp<-0.000){
		$("#win").html(addCommas(price));
		sprice = sprice-sprice-sprice;
		//$("#lost").val(addCommas(sprice));
	}else{
		$("#win").html(addCommas(sprice));
		//$("#lost").val(addCommas(price));
	}
}
function addCommas(nStr){
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1].substr(0,2) : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}
function flbet(fl){
	if(fl==1){
		$("#bfootball").hide();	
		$("#blotto").show();	
	}else{
		$("#blotto").hide();	
		$("#bfootball").show();	
	}
}
function loadNowPlaying(){
  $("#tb_flotto").load("getFullLotto.php");
}
setInterval(function(){loadNowPlaying()}, 60000);

function result_save(data){
	$("#box_bet").html("<table width=\"185\" border=\"0\" cellspacing=\"1\" cellpadding=\"5\" style=\"margin: auto; box-shadow: #000 0px 0px 1px; color: #FFF;\" bgcolor=\"#6b4f11\"><tr><td valign=\"top\" bgcolor=\"#FEFFFF\">"+data+"</td></tr></table>");
}

function billPrintPopup(id) {
       newwindow=window.open("http://www.ohoking.com/print_bill_lotto.php?id="+id,"Lothun bill",'width=300,height=200');
    if (window.focus) {newwindow.focus()}
       return false;
}
</script>
</head>

<body>
<?
    include 'left_account.php';
?>
<!-- <div id="box_user">
  <div id="buser">
  	<div>
  	<?=$lang_member[71];?> : <strong><?=$_SESSION['m_user'];?></strong>
  	</div>
  	<div style="margin-top: 6px;">
		<?=$lang_member[93];?>: 
  		<?if($_SESSION['m_user_set']!=""){?>
  			<strong>
            <span id="txt_nickname" class="member_nickname"><?=$_SESSION['m_user_set'];?></span>
  			</strong>
            <?}else{?>
			<strong>
            <span id="txt_nickname" class="member_nickname"><?=$lang_member[98];?></span>
			</strong>
            <?}?>
  	</div>
  	<span class="ref_user" onClick="get_credit();"></span></div>
    <div id="bcredit" style="font-size:11px !important;">
  <?=$lang_member[95];?><span style="float:right;"><strong style="color:#203A79;" id="res_cre"></strong></span>
   <br>
  <?=$lang_member[53];?><span style="float:right;"><strong style="color:#203A79;" id="res_incre"></strong></span>
  <br>
  <?=$lang_member[94];?><span style="float:right;"><strong style="color:#203A79;" id="res_bal"></strong></span>
  <br>
  <?=$lang_member[97];?><span style="float:right;"><strong style="color:#203A79;"><?=$_SESSION['m_currency'];?> <?=number_format($_SESSION['m_count_de'],2);?></strong></span>
  </div>
</div> -->


<? #if($_SESSION['crid1']==1){?>
<!--<div id="maxlotto">
<table width="185" border="0" cellspacing="1" cellpadding="5" style="margin: auto; box-shadow: #000 0px 0px 1px; color: #FFF;" bgcolor="#6b4f11">
  <tr>
    <td colspan="3" align="center" class="bg_table" style="cursor:pointer;" onClick="parent.rightx.location.href='main_lotto.php?tlot=lottofalse&vvw=0'; "><strong><?=$lang_lot[68]?> <img src="img/new.gif"></strong></td>
  </tr>
  </table>
</div>
<br> -->
<? #}?>

<!-- <div id="blotto">
<table width="185" border="0" cellspacing="1" cellpadding="5" >
  <tr class="cw bg_table">
    <td colspan="3" align="center" style="cursor:pointer; border: 0!important;" onClick="$('#tb_blotto').toggle();"><strong><?=$lang_member[580];?></strong> [<?=$lang_member[92]?>]</td>
  </tr>
  <tbody style="display:none;" id="tb_blotto">
    <tr class="cw" style="font-size:11px;">
      <td width="40%" align="center" valign="top" class="bg_table"><strong><?=$lang_member[160];?></strong></td>
      <td width="30%" align="center" valign="top" class="bg_table"><strong><?=$lang_member[162];?></strong></td>
      <td width="30%" align="center" valign="top" class="bg_table"><strong><?=$lang_member[610];?></strong></td>
    </tr>
  
  <?

    if($_SESSION['m1']['m_lotto_setbet']==1){
$empay=@explode(',',$_SESSION['m1']['m_lotto_pay1']); 	
$emdis=@explode(',',$_SESSION['m1']['m_lotto_dis1']); 	
	}elseif($_SESSION['m1']['m_lotto_setbet']==2){
$empay=@explode(',',$_SESSION['m1']['m_lotto_pay2']); 	
$emdis=@explode(',',$_SESSION['m1']['m_lotto_dis2']); 	
	}else{
$empay=@explode(',',$_SESSION['m1']['m_lotto_pay3']); 	
$emdis=@explode(',',$_SESSION['m1']['m_lotto_dis3']); 	
	}
  
  
 ################Config Member

  foreach ($lot_type[$_SESSION['lang']][1] as $x => $value) {
  	if($empay[$x]>0){ ?>
		<tr style="color:#000;">
		  <td align="center" valign="top" bgcolor="#FEFFFF"  style="font-size:10px; "><?=$lot_type[$_SESSION['lang']][1][$x];?></td>
		  <td align="center" valign="top" bgcolor="#FEFFFF"><?=$empay[$x];?></td>
		  <td align="center" valign="top" bgcolor="#FEFFFF"><?=$emdis[$x];?>%</td>
		</tr>
  <? } } ?>
  </tbody>
</table>
</div> -->
<!-- <br> -->

<div id="flotto">
<table width="185" border="0" cellspacing="1" cellpadding="5">
    <tr>
    <td align="center" class="cw bg_table" style="cursor:pointer;"><strong><?=$lang_member[414];?></strong></td>
    </tr>
    <tbody id="tb_flotto" >
    
    </tbody>
    <tbody>
    	<tr>
    		<td colspan="100%">
    	<div id="box_canlist"></div>
    			
    		</td>
    	</tr>
    </tbody>
</table>
</div>

<!-- <br> -->
<div id="box_bet"></div>

<!-- <br> -->
<?php  include "left_agent_contact.php"; ?>



</body>
</html>