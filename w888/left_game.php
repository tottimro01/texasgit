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

$hmax=@explode(',',$_SESSION['m1']['m_games_max']); 
$hmin=@explode(',',$_SESSION['m1']['m_games_min']); 

$max=$hmax[1]; 
$min=$hmin[1]; 
$over=$_SESSION['m1']['m_games_over'];
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

var load_frist = 1;
var ele_c = "1_0";
var box_c = 1;

//นับเวลารอเดิมพัน
var tmc_wait;
//นับเวลาเดิมพันล่าสุด
var tmc_last;

$(document).ready(function() {
	 // get_credit();
	 //loadNowPlaying();
	 menu_sport(2);
	 menu_bet(2,1);
	  <? if(($_SESSION['open_sc']==1) or ($_SESSION['open_mu']==1) or ($_SESSION['open_st']==1) or ($_SESSION['open_sp']==1)){?>
	  flbet(0);
	 <? }elseif($_SESSION['open_lo']==1){?>
	  flbet(1);
	 <? }?>


	 $("#list_bet_games").load("games/view_last.php");


});

function TrimComma(currentTags) {  
	var currentTagTokens = currentTags.split(",");
	var existingTags = "";

	for ( var i = 0; i < currentTagTokens.length; i++ ) { 
		existingTags = existingTags + currentTagTokens[i];
	}
	return existingTags;
}
// function get_credit(){
// 	$.ajax({
// 		type: "POST",
// 		url: "inc/get_credit.php",
// 		dataType:"json",
// 		cache: false,	// Clear cache IE
// 		beforeSend: function(){
// 			$("#res_cre").html("<img src='img/loding.gif' style='opacity:1; margin:7px auto; display:block;' id='loding-f'>");
// 			$("#res_incre").html("<img src='img/loding.gif' style='opacity:1; margin:7px auto; display:block;' id='loding-f'>");
// 				$("#res_bal").html("<img src='img/loding.gif' style='opacity:1; margin:7px auto; display:block;' id='loding-f'>");
// 		},
// 		success: function(data){
// 			$("#res_cre").html(data.cre);
// 			$("#res_incre").html(data.incre);
// 				$("#res_bal").html(data.wincre);
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

function numberonly(event,el){
	var e=window.event?window.event:event;
	var keyCode=e.keyCode?e.keyCode:e.which?e.which:e.charCode;   			     
	//0-9 (numpad,keyboard)
	if ((keyCode>=96 && keyCode<=105)||(keyCode>=48 && keyCode<=57)){ return true; }
	//backspace,delete,left,right,home,end
	if (',8,46,37,39,36,35,'.indexOf(','+keyCode+',')!=-1){ return true; }          
	return false;
}

function _sumx(){
	var sumx=TrimComma($( "#txt_bet" ).val());
	var pricex=TrimComma($( "#price" ).html());
	//var maxx=TrimComma($( "#mmax" ).html());
	
	if(sumx><?=($max!="" ? $max : 0);?>){
		$( "#txt_bet" ).val(<?=($max!="" ? $max : 0);?>);
		var sumx=TrimComma($( "#txt_bet" ).val());
		}
		
	$( "#bmax" ).html(addCommas(sumx*pricex));
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


 function numberonly2(event){
  	var e=window.event?window.event:event;
   	var keycode=e.keyCode?e.keyCode:e.which?e.which:e.charCode;

	if ((keycode>=96 && keycode<=105)||(keycode>=48 && keycode<=57)||(keycode==106 )||(keycode==8 )){
    return true;
   }else{
	   return false;
	   }
}

function _set(val){
	$( "#txt_bet" ).val( val );
}
function _betok1(){
	var sumx=TrimComma($( "#txt_bet" ).val());
	if(sumx >=<?=($min!="" ? $min : 0);?>){

	var type=$( "#typebet" ).val();
	$("#list_bet_games").load('games/bacarat/save_ok.php',{"bet":sumx,"type":type});
	$( "#box_bet" ).html("");
	}

	}
function _betok2(){
	var sumx=TrimComma($( "#txt_bet" ).val());
	if(sumx >=<?=($min!="" ? $min : 0);?>){

	var type=$( "#typebet" ).val();
	$("#list_bet_games").load('games/hilo/save_ok.php',{"bet":sumx,"type":type});
	$( "#box_bet" ).html("");
	
	}

	}
function _betok3(){
	var sumx=TrimComma($( "#txt_bet" ).val());

	if(sumx >=<?=($min!="" ? $min : 0);?>){

	var type=$( "#typebet" ).val();
	$("#list_bet_games").load('games/fish/save_ok.php',{"bet":sumx,"type":type});
	$( "#box_bet" ).html("");
	}

	}
function _betok4(){
	var sumx=TrimComma($( "#txt_bet" ).val());
	if(sumx >=<?=($min!="" ? $min : 0);?>){

	var type=$( "#typebet" ).val();
	$("#list_bet_games").load('games/2hit/save_ok.php',{"bet":sumx,"type":type});
	$( "#box_bet" ).html("");
	}

	}
function _betok5(){
	var sumx=TrimComma($( "#txt_bet" ).val());
	if(sumx >=<?=($min!="" ? $min : 0);?>){

	var type=$( "#typebet" ).val();
	$("#list_bet_games").load('games/dragon/save_ok.php',{"bet":sumx,"type":type});
	$( "#box_bet" ).html("");
	}

	}
  function gameslistmini(vt){
    $( "#box_bet" ).html("");
    if(vt==1){
    	$.post( "hilo/clear_ok.php", function( data ) {
	  //$( ".result" ).html( data );
	});
    }else if(vt==2){
	$.post( "fish/clear_ok.php", function( data ) {
	  //$( ".result" ).html( data );
	});
    }
  }
    function gameslistmini2(){
    $( "#box_bet" ).html("");
	 $("#list_bet_games").load("games/view_last.php");
    	$.post( "games/clear_ok.php", function( data ) {
		});
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
  	<span class="ref_user" onClick="get_credit();"></span>
  </div>
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

<center>
<? if($_SESSION['crid2']==109){?>
<!--<img src="img/bum88.jpg" > -->
<? }?>

<? if($_SESSION['crid2']==112){?>
<!--<img src="img/bum88.jpg" > -->
<? }?>
</center>
<!-- <br> -->


<style type="text/css">
	#bet_id {
		border: 1px solid #25367C;
   	 box-shadow: inset 0 0 5px #000;
   	 text-align: center;
   	     height: 30px;
    margin: 5px auto;
    width: 185px;
    line-height: 30px;
    background-color: #8b691c;
	}
</style>


<div id="box_bet">
	
</div>
<div id="list_bet">
<div id="list_bet_games"></div>
</div>

<!-- <br> -->
<?php  include "left_agent_contact.php"; ?>


</body>
</html>