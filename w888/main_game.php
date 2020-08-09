<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

/*if(isMobile()){
        ?>
        	<script>
        		parent.document.location.href = "mobile_game/index.php";
        	</script>
 <?
        exit();
}*/

require("lang/variable_lang.php");
// require("lang/member_lang.php");
// require("/home/ohoking/domains/ohoking.com/public_html/admin_lang/export/lang_member_".$_SESSION['lang'].".php");
require("lang/function_array.php");

require('inc/conn.php');
require('inc/function.php');
require('games/function.php');



################Config Member


$type_games=1;
$mmin=@explode(',',$_SESSION['m1']['m_games_min']); 
$mmax=@explode(',',$_SESSION['m1']['m_games_max']); 
$maxmatch=@explode(',',$_SESSION['m1']['m_games_over']); 


$_SESSION['mmin'] = $mmin[$type_games];
$_SESSION['mmax'] = $mmax[$type_games];
$_SESSION['mxmax'] = $maxmatch[$type_games];

unset($_SESSION['hilo_ok']); 
unset($_SESSION['fish_ok']); 


$rec = sql_array("select * from bom_tb_config where con_id = 1;");

if($rec["con_open_games"]==0){ 
  include 'sa_close.php'; 
  exit(); 
} 

foreach($_SESSION['arid'] as $rid){

  $r_open_page = explode(",", $_SESSION['ardata'][$rid]["r_open"]);
  
  if($r_open_page[11]==0){ 
    include 'ag_close.php'; 
    exit(); 
  } 
}

$m_open_page = explode(",", $_SESSION["m1"]["m_open"]);

if($m_open_page[11]==0){ 
  include 'ag_close.php'; 
  exit(); 
} 



function createStatsTable($rows, $cols, $skey) {
	$str = "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"ball st_tb\">";
	for ($i=0; $i < $rows; $i++) { 
      $str.= "<tr>";
        for ($j=0; $j < $cols; $j++) { 
          $str.= "<td id=\"st_{$skey}_{$i}_{$j}\">-</td>";
        }
      $str.= "</tr>";
    } 
	$str.= "</table>";
    
    return $str;
}
#$re_m = sql_array("select * from bom_tb_member where m_id = '$_SESSION[mid]'");

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<TITLE><?=$app_name;?></TITLE>
<link rel="stylesheet" type="text/css" href="css/style.css?v=<?=$cache_css;?>">
<link rel="stylesheet" type="text/css" href="css/style3.css?v=<?=$cache_css;?>">
<script src="js/socket.io.js"></script>
<style>
/*#menu_lotto {
	width: 100%;
	height: 33px;
	background: #fff;
	box-shadow: #000 0px 2px 5px;
	border-top-left-radius: 10px;
	border-top-right-radius: 10px;
	overflow: hidden;
	position:relative;
	z-index:2;
}
#menu_lotto a {
	text-decoration: none;
	color: #6A4806;
	font-weight:bold;
	cursor:pointer;
}
#lotto_content {
	width:100%;
	background:#FFF;
}
.tb_title_lotto {
	background-image: linear-gradient(top, #d9a52e,  #8b691c);
	background-image: -moz-linear-gradient(top, #d9a52e, #8b691c);
	background-image: -webkit-linear-gradient(top, #d9a52e, #8b691c);
	background-image: -o-linear-gradient(top, #d9a52e, #8b691c);
	background-image: -ms-linear-gradient(top, #d9a52e, #8b691c);
	font-size: 12px;
	  color: #fff;
	  font-weight: bold;
	  text-shadow: 1px 1px 1px #000;
}
.input{
  font-size: 10pt;
  font-style: normal;
  font-weight: normal;
  height: 18px;
  color: #000000;
}
.txt_red12b {
  font-size: 12px;
  font-family: Tahoma, Geneva, Arial, Helvetica, sans-serif;
  color: #b50000;
  font-weight: bold;
}
.txt_back11b {
  font-size: 11px;
  font-family: Tahoma, Geneva, Arial, Helvetica, sans-serif;
  color: #000000;
  font-weight: bold;
}
.txt_blue11b {
  font-size: 11px;
  font-family: Tahoma, Geneva, Arial, Helvetica, sans-serif;
  color: #0000ff;
  font-weight: bold;
}
.txt_blue12ntitle {
  font-size: 12px;
  font-family: Tahoma, Geneva, Arial, Helvetica, sans-serif;
  color: #0000ff;
  text-shadow: 1px 1px 1px #cccccc;
}
.txt_white12btitle {
  font-size: 12px;
  color: #fff;
  font-weight: bold;
  text-shadow: 1px 1px 1px #000;
}
.txt_center12b {
  font-size: 12px;
  color: #333333;
  font-weight: bold;
  text-align: center;
  text-shadow: 1px 1px 1px #ffffff;
}
.txt_center12br {
  font-size: 12px;
  color: #333333;
  font-weight: bold;
  text-align: center;
  background-color: #eeeeee;
  text-shadow: 1px 1px 1px #ffffff;
}
.txt_center12n {
  font-size: 12px;
  color: #333333;
  text-align: center;
  text-shadow: 1px 1px 1px #ffffff;
  height:18px;
}
.txt_blue12n {
  font-size: 12px;
  font-family: Tahoma, Geneva, Arial, Helvetica, sans-serif;
  color: #0000ff;
}
.txt_disabled {
  font-size: 12px;
  color: #8C8C8C;
  text-shadow: 1px 1px 1px #FFFFFF;
  text-align: center;
  background-color: #cccccc;
  text-shadow: 1px 1px 1px #cccccc;
}
.tr_lot:nth-child(even) {
  background: #fff7d9;
}
.tr_lot:nth-child(odd) {
  background: white;
}
.mlotto {
	background-image:url(img/bg_menu.gif);
	background-position: 50% 50%;
}
.mlotto:hover {
	background-image: url(img/bg_menu_over.gif); 
}
.mactive {
	background-image: url(img/bg_menu_over.gif); 
}
.cr {
	color:#F00;
}

.bttn_container {
	position:absolute;
	bottom: 20px;
	right: 70px;
	padding: 1px;
	font-size: 16px;
	font-weight: bold;
}

.bttn_container button {
    cursor: pointer;
    min-width: 70px;
    font-size: 14px;
    border-radius: 4px;
    border: 0;
    height: 22px;

    background: #f5f6f6;
background: -moz-linear-gradient(top, #f5f6f6 0%, #dbdce2 50%, #b8bac6 93%);
background: -webkit-linear-gradient(top, #f5f6f6 0%,#dbdce2 50%,#b8bac6 93%);
background: linear-gradient(to bottom, #f5f6f6 0%,#dbdce2 50%,#b8bac6 93%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f5f6f6', endColorstr='#b8bac6',GradientType=0 );
}

.ht_st_container {
	display: none;
}

.ht_tb {
	width: 55%;
}

.ht_tb td {
	padding-right: 4px;
	padding-left: 4px;
}

.st_tb {
	width: auto;
}

.st_tb td {
	width: 30px;
	height: 30px;
	text-align: center;
	vertical-align: middle;
}

img.stats_res {
	display: block;
    width: 26px;
    height: 26px;
    margin: 0 auto;
}

span.stats_res {
	font-weight: bold;
}
span.stats_res._red {
	color: #E53935;
}
span.stats_res._blue {
	color: #3949AB;
}
span.stats_res._green {
	color: #388E3C;;
}*/
</style>
<? if($_SESSION['lang']=="mm"){?><link rel="stylesheet" type="text/css" href="css/style_mm.css?v=2019"><? }?>
<script src="js/jquery-1.9.1.min.js?v=2019"></script>
<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
<script>
var fw;
$(document).ready(function() {
	 to_width(<?=$_GET["vvw"]?>);
});
function to_width(ty){
	if(ty==1){
		$("#main_left").width(975);
		fw = 1;
	}else{
		$("#main_left").width(770);
		fw = 0;
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
function TrimComma(currentTags) {  
	var currentTagTokens = currentTags.split(",");
	var existingTags = "";

	for ( var i = 0; i < currentTagTokens.length; i++ ) { 
		existingTags = existingTags + currentTagTokens[i];
	}
	return existingTags;
}
</script>
<script type="application/javascript">
function _bet1(val){
	var ck=  $( "#bet_time1" ).html();
		if(isInt(ck)==true){
	 $("#box_bet",window.parent.frames["leftx"].document).load('games/bacarat/cion_bet.php',{"ok":val});
	}
	}
function _bet2(val,ty){
	var ck=  $( "#bet_time2" ).html();
	if(isInt(ck)==true){
	  $("#box_bet",window.parent.frames["leftx"].document).load('games/hilo/cion_bet.php',{"ok":val,"ty":ty});
	}
	}
function _bet3(val){
	var ck=  $( "#bet_time3" ).html();
	if(isInt(ck)==true){
	 $("#box_bet",window.parent.frames["leftx"].document).load('games/fish/cion_bet.php',{"ok":val});
	}
	}
function _bet4(val){
	var ck=  $( "#bet_time4" ).html();
		if(isInt(ck)==true){
	 $("#box_bet",window.parent.frames["leftx"].document).load('games/2hit/cion_bet.php',{"ok":val});
	}
	}
function _bet5(val){
	var ck=  $( "#bet_time5" ).html();
		if(isInt(ck)==true){
	 $("#box_bet",window.parent.frames["leftx"].document).load('games/dragon/cion_bet.php',{"ok":val});
	}
	}
	
	function isInt(value) {
  return !isNaN(value) && (function(x) { return (x | 0) === x; })(parseFloat(value))
}
	
 $(document).ready(function() {

var refreshId = setInterval(function() {

	  	$.post("games/time.php", {"games":1 },
				  function(data){
					$( "#bet_time1" ).html(data.time1);
					$( "#bet_time2" ).html(data.time2);
					$( "#bet_time3" ).html(data.time3);
					$( "#bet_time4" ).html(data.time4);
					$( "#bet_time5" ).html(data.time5);

					$( "#bc-1" ).html(data.time1a);
					$( "#bc-2" ).html(data.time1b);
					$( "#bc-3" ).html(data.time1c);
					$( "#bc-4" ).html(data.time1d);
					
					$( "#dt-1" ).html(data.time5a);
					$( "#dt-2" ).html(data.time5b);
					
				  }, "json");

	 var ckx=  $( "#bet_time1" ).html();
	 if(isInt(ckx)==false){
	 	parent.leftx.gameslistmini2();
	 }

	 if(ckx>=80 && ckx<=90) {
	 	getStats();
	 }
	
	 $("#view_count1").load('games/bacarat/bet_count.php');
	 $("#view_count2").load('games/hilo/bet_count.php');
	 $("#view_count3").load('games/fish/bet_count.php');
	 $("#view_count4").load('games/2hit/bet_count.php');
	 $("#view_count5").load('games/dragon/bet_count.php');


}, 1000);

// $("#view_count1").load('games/bacarat/bet_count.php');
// 	$("#view_count2").load('games/hilo/bet_count.php');
// 	$("#view_count3").load('games/fish/bet_count.php');
// 	$("#view_count4").load('games/2hit/bet_count.php');
// 	$("#view_count5").load('games/dragon/bet_count.php');


 //   var refreshId = setInterval(function() {

	 
	//   	$.post("games/time.php", {"games":1 },
	// 			  function(data){
	// 				$( "#bet_time1" ).html(data.time1);
	// 				$( "#bet_time2" ).html(data.time2);
	// 				$( "#bet_time3" ).html(data.time3);
	// 				$( "#bet_time4" ).html(data.time4);
	// 				$( "#bet_time5" ).html(data.time5);

	// 				$( "#bc-1" ).html(data.time1a);
	// 				$( "#bc-2" ).html(data.time1b);
	// 				$( "#bc-3" ).html(data.time1c);
	// 				$( "#bc-4" ).html(data.time1d);
					
	// 			    $( "#dt-1" ).html(data.time5a);
	// 				$( "#dt-2" ).html(data.time5b);
					
	// 			  }, "json");
				  
		
	// var ckx=  $( "#bet_time1" ).html();
	// if(isInt(ckx)==false){
	// 	parent.leftx.gameslistmini2();
	// }

	// if(ckx>=80 && ckx<=90) {
	// 	getStats();
	// }
	
	// $("#view_count1").load('games/bacarat/bet_count.php');
	// $("#view_count2").load('games/hilo/bet_count.php');
	// $("#view_count3").load('games/fish/bet_count.php');
	// $("#view_count4").load('games/2hit/bet_count.php');
	// $("#view_count5").load('games/dragon/bet_count.php');
	
 //   }, 1000);
   $.ajaxSetup({ cache: false });
   
getStats();

});

function _vvxx1(){
	 $(document).ready(function() {
		  $("#list_bet_games",window.parent.frames["leftx"].document).load("games/view_last.php");
		 });
	}
	

_vvxx1();

function getStats() {
	// 2hit game
	$.ajax({
		url: 'games/json/2hit_stats.json',
		type: 'get',
		dataType: 'json',
		cache: false,
	})
	.done(function(data) {
		// console.log(data)
		let _row = 6;
		let _col = 10;
		let current_row = 1;
		let current_col = (_col);
		let prevRes = 0;
		// let runOut = false;
		// clear result
		for (var x = 0; x < _row; x++) {
			for (var y = 0; y < _col; y++) {
				$("#st_color_"+x+"_"+y).html("");
			}
		}

		let z = []; // array result
		let zg = -1; // index to group result
		// z[zg] = [];
		for (var i = (data.length-1); i > 0; i--) {
			let res = data[i]["win"];
			if(res!==null) {
				if(res!=prevRes) {
					zg++;
					z[zg] = [];
				}
				z[zg].push(res);
				prevRes = res;
			}
			
			// if(runOut===false) {
			// 	let res = data[i]["win"];
			// 	if(res!==null) {
			// 		if(res!=prevRes) {
			// 			current_col-=1;
			// 			current_row = 0;
			// 			zg++;
			// 			z[zg] = [];
			// 		}
			// 		prevRes = res;
			// 		current_row++;
			// 		if(current_row>=_row) {
			// 			current_col-=1;
			// 			current_row = 0;
			// 		}
			// 		if(current_col<-1) {
			// 			runOut=true;
			// 		} else {
			// 			z[zg].push(res);
			// 		}
			// 	}
			// } else {
			// 	break;
			// }
		}

		let count_col = _col;
		for (var k = 0; k < z.length; k++) {
			let iCol = Math.ceil(z[k].length/_row);
			count_col -= iCol;
			current_col = count_col;
			current_row = 0;
			for (var l = 0; l < z[k].length; l++) {
				let resWin = resultHTML("color", z[k][l]);
				$("#st_color_"+current_row+"_"+current_col).html(resWin);
				current_row++;
				if(current_row>=_row){
					current_row=0;
					current_col++;
				}
			}
			if(count_col<0) { break; }
		}

		// current_row = 0;
		// current_col = 0;
		// for (var k = (z.length-1); k >= 0; k--) {
		// 	if(z[k].length>0) {
		// 		for (var l = 0; l < z[k].length; l++) {
		// 			let resWin = resultHTML("color", z[k][l]);
		// 			$("#st_color_"+current_row+"_"+current_col).html(resWin);
		// 			current_row++;
		// 			if(current_row>=_row) {
		// 				current_col++;
		// 				current_row = 0;
		// 			}
		// 		}
		// 		if(current_row>0){
		// 			current_row = 0;
		// 			current_col++;
		// 		}
		// 	}
		// }
		// console.log(z)
	});

	// dragon game
	$.ajax({
		url: 'games/json/dragon_stats.json',
		type: 'get',
		dataType: 'json',
		cache: false,
	})
	.done(function(data) {
		// console.log(data)
		let _row = 6;
		let _col = 10;
		let current_row = 1;
		let current_col = (_col);
		let prevRes = 0;
		// let runOut = false;
		// clear result
		for (var x = 0; x < _row; x++) {
			for (var y = 0; y < _col; y++) {
				$("#st_dt_"+x+"_"+y).html("");
			}
		}

		let z = []; // array result
		let zg = -1; // index to group result
		for (var i = (data.length-1); i > 0; i--) {
			let res = data[i]["win"];
			if(res!==null) {
				if(res!=prevRes) {
					zg++;
					z[zg] = [];
				}
				z[zg].push(res);
				prevRes = res;
			}
			
		}

		let count_col = _col;
		for (var k = 0; k < z.length; k++) {
			let iCol = Math.ceil(z[k].length/_row);
			count_col -= iCol;
			current_col = count_col;
			current_row = 0;
			for (var l = 0; l < z[k].length; l++) {
				let resWin = resultHTML("dragon", z[k][l]);
				$("#st_dt_"+current_row+"_"+current_col).html(resWin);
				current_row++;
				if(current_row>=_row){
					current_row=0;
					current_col++;
				}
			}
			if(count_col<0) { break; }
		}

		// console.log(data)
		// let _row = 6;
		// let _col = 10;
		// let current_row = 1;
		// let current_col = (_col);
		// let prevRes = 0;
		// let runOut = false;
		// // clear result
		// for (var x = 0; x < _row; x++) {
		// 	for (var y = 0; y < _col; y++) {
		// 		$("#st_dt_"+x+"_"+y).html("");
		// 	}
		// }

		// let z = []; // array result
		// let zg = -1; // index to group result
		// // z[zg] = [];
		// for (var i = (data.length-1); i > 0; i--) {
		// 	if(runOut===false) {
		// 		let res = data[i]["win"];
		// 		if(res!==null) {
		// 			if(res!=prevRes) {
		// 				current_col-=1;
		// 				current_row = 0;
		// 				zg++;
		// 				z[zg] = [];
		// 			}
		// 			prevRes = res;
		// 			current_row++;
		// 			if(current_row>=_row) {
		// 				current_col-=1;
		// 				current_row = 0;
		// 			}
		// 			if(current_col<-1) {
		// 				runOut=true;
		// 			} else {
		// 				z[zg].push(res);
		// 			}
		// 		}
		// 	} else {
		// 		break;
		// 	}
		// }

		// current_row = 0;
		// current_col = 0;
		// for (var k = (z.length-1); k >= 0; k--) {
		// 	if(z[k].length>0) {
		// 		for (var l = 0; l < z[k].length; l++) {
		// 			let resWin = resultHTML("dragon", z[k][l]);
		// 			$("#st_dt_"+current_row+"_"+current_col).html(resWin);
		// 			current_row++;
		// 			if(current_row>=_row) {
		// 				current_col++;
		// 				current_row = 0;
		// 			}
		// 		}
		// 		if(current_row>0){
		// 			current_row = 0;
		// 			current_col++;
		// 		}
		// 	}
		// }
		// console.log(z)
	});

	// bacarat game
	$.ajax({
		url: 'games/json/bacarat_stats.json',
		type: 'get',
		dataType: 'json',
		cache: false,
	})
	.done(function(data) {
		// console.log(data)
		let _row = 6;
		let _col = 10;
		let current_row = 1;
		let current_col = (_col);
		let prevRes = 0;
		// let runOut = false;
		// clear result
		for (var x = 0; x < _row; x++) {
			for (var y = 0; y < _col; y++) {
				$("#st_bacara_"+x+"_"+y).html("");
			}
		}

		let z = []; // array result
		let zg = -1; // index to group result
		for (var i = (data.length-1); i > 0; i--) {
			let res = data[i]["win"];
			if(res!==null) {
				if(res!=prevRes) {
					zg++;
					z[zg] = [];
				}
				z[zg].push(res);
				prevRes = res;
			}
			
		}

		let count_col = _col;
		for (var k = 0; k < z.length; k++) {
			let iCol = Math.ceil(z[k].length/_row);
			count_col -= iCol;
			current_col = count_col;
			current_row = 0;
			for (var l = 0; l < z[k].length; l++) {
				let resWin = resultHTML("bacarat", z[k][l]);
				$("#st_bacara_"+current_row+"_"+current_col).html(resWin);
				current_row++;
				if(current_row>=_row){
					current_row=0;
					current_col++;
				}
			}
			if(count_col<0) { break; }
		}
		// // console.log(data)
		// let _row = 6;
		// let _col = 10;
		// let current_row = 1;
		// let current_col = (_col);
		// let prevRes = 0;
		// let runOut = false;
		// // clear result
		// for (var x = 0; x < _row; x++) {
		// 	for (var y = 0; y < _col; y++) {
		// 		$("#st_bacara_"+x+"_"+y).html("");
		// 	}
		// }

		// let z = []; // array result
		// let zg = -1; // index to group result
		// // z[zg] = [];
		// for (var i = (data.length-1); i > 0; i--) {
		// 	if(runOut===false) {
		// 		let res = data[i]["win"];
		// 		if(res!==null) {
		// 			if(res!=prevRes) {
		// 				current_col-=1;
		// 				current_row = 0;
		// 				zg++;
		// 				z[zg] = [];
		// 			}
		// 			prevRes = res;
		// 			current_row++;
		// 			if(current_row>=_row) {
		// 				current_col-=1;
		// 				current_row = 0;
		// 			}
		// 			if(current_col<-1) {
		// 				runOut=true;
		// 			} else {
		// 				z[zg].push(res);
		// 			}
		// 		}
		// 	} else {
		// 		break;
		// 	}
		// }

		// current_row = 0;
		// current_col = 0;
		// for (var k = (z.length-1); k >= 0; k--) {
		// 	if(z[k].length>0) {
		// 		for (var l = 0; l < z[k].length; l++) {
		// 			let resWin = resultHTML("bacarat", z[k][l]);
		// 			$("#st_bacara_"+current_row+"_"+current_col).html(resWin);
		// 			current_row++;
		// 			if(current_row>=_row) {
		// 				current_col++;
		// 				current_row = 0;
		// 			}
		// 		}
		// 		if(current_row>0){
		// 			current_row = 0;
		// 			current_col++;
		// 		}
		// 	}
		// }
		// console.log(z)
	});

	// hilo game
	$.ajax({
		url: 'games/json/hilo_stats.json',
		type: 'get',
		dataType: 'json',
		cache: false,
	})
	.done(function(data) {
		// console.log(data)
		// clear result
		for (var x = 0; x < 4; x++) {
			for (var y = 0; y < 10; y++) {
				$("#st_hilo_"+x+"_"+y).html("");
			}
		}

		for (var i = 0; i < data.length; i++) {
			let res1 = data[i]["b1"]===null ? "" : resultHTML("hilo", data[i]["b1"]);
			let res2 = data[i]["b2"]===null ? "" : resultHTML("hilo", data[i]["b2"]);
			let res3 = data[i]["b3"]===null ? "" : resultHTML("hilo", data[i]["b3"]);

			if(data[i]["win"]!==null) {
				if(parseInt(data[i]["win"])>11) {
					var resWin = "H";
				} else if(parseInt(data[i]["win"])<11) { 
					var resWin = "L";
				} else if(parseInt(data[i]["win"])==11) {
					var resWin = "11";
				}
				resWin = resultHTML("hilo", resWin);
			} else {
				var resWin = "";
			}

			$("#st_hilo_0_"+i).html(res1);
			$("#st_hilo_1_"+i).html(res2);
			$("#st_hilo_2_"+i).html(res3);
			$("#st_hilo_3_"+i).html(resWin);
		}
	});

	// fish game
	$.ajax({
		url: 'games/json/fish_stats.json',
		type: 'get',
		dataType: 'json',
		cache: false,
	})
	.done(function(data) {
		// console.log(data);
		for (var i = 0; i < data.length; i++) {
			let res1 = data[i]["b1"]===null ? "" : resultHTML("fish", data[i]["b1"]);
			let res2 = data[i]["b2"]===null ? "" : resultHTML("fish", data[i]["b2"]);
			let res3 = data[i]["b3"]===null ? "" : resultHTML("fish", data[i]["b3"]);
			
			$("#st_fish_0_"+i).html(res1);
			$("#st_fish_1_"+i).html(res2);
			$("#st_fish_2_"+i).html(res3);
		}
	});
}

function resultHTML(g, r) {
	let h = "";
	switch (g) {
		case "fish":
			h = r+".png"
			h = "<img src=\"games/img/fish/" + h + "\" class=\"stats_res\">";
			break;
		case "hilo":
			h = "hilo" + r + ".png"
			h = "<img src=\"games/img/hilo/" + h + "\" class=\"stats_res\">";
			break;
		case "bacarat":
			if(r==1) {
				h = "<span class=\"stats_res _blue\">P</span>";
			} else if(r==2) {
				h = "<span class=\"stats_res _red\">B</span>";
			} else if(r==3) {
				h = "<span class=\"stats_res _green\">D</span>";
			}
			break;
		case "dragon":
			h = r+".jpg"
			h = "<img src=\"games/img/dragon/" + h + "\" class=\"stats_res\">";
			break;
		case "color":
			h = r+".png"
			h = "<img src=\"games/img/2hit/" + h + "\" class=\"stats_res\">";
			break;
		default:
			// statements_def
			break;
	}

	return h;
}

// var GamesLiveStats;
// $(() => {
//     var socket = io.connect('<?=$nodejs_ip;?>', { secure: true });
//     //socket.emit('check_user', { "token": "<?=$_SESSION[m_tokenx]?>", "mid": "<?=$_SESSION[mid]?>" , "site":document });
//     socket.on('dataGamesLive', function (data) {
//         GamesLiveStats = JSON.parse(data);
//         DisplayGamesStat(GamesLiveStats)
//     });
// });

function DisplayGamesStat(stats){
	for(var i = 0; i < stats.length; i++){
		var view = document.getElementById('game_stat_' + stats[i].game_zone);
		for(var j = 0; j < 9; j++){
			var betCount = $(view).find('.bet_count.' + (j+1));
			$(betCount).html(stats[i]['bet_count_' + (j+1)]);
		}
	}
}

</script>
</head>

<body>
	<? 
	include 'mname_tmpl.php'; 
	include 'mtimezone_tmpl.php';
  ?>

<div id="main_left">
<div id="menu_lotto">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
      <tbody>
        <tr align="center" height="32">

          <td class="mlotto<? if($_GET["tlot"]==""){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_game.php?tlot=&vvw='+fw">&nbsp;&nbsp;<?=$lang_member[151];?>&nbsp;&nbsp;</a></td>
          <td width="4"><!-- <img src="img/spacer.gif" width="2" height="32"> --></td>
          <td class="mlotto<? if($_GET["tlot"]=="list"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_game.php?tlot=list&vvw='+fw"><?=$lang_member[43];?></a></td>
          <td width="4"><!-- <img src="img/spacer.gif" width="2" height="32"> --></td>
          <td class="mlotto<? if($_GET["tlot"]=="result"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_game.php?tlot=result&vvw='+fw">&nbsp;&nbsp;<?=$lang_member[52];?>&nbsp;&nbsp;</a></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div id="lotto_content" align="center">
<?
if($_GET["tlot"]=="list"){
	include "games/list.php"; 
}else if($_GET["tlot"]=="result"){
	include "games/result.php"; 
}else{
	include "games/2hit.php";
	include "games/dragon.php";
	include "games/bacarat.php";
	include "games/hilo.php";
	include "games/fish.php";
	echo "<br />";
} 
?>
</div>
</div>
</body>
</html>