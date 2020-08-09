<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');

require("lang/variable_lang.php");
// require("lang/member_lang.php");
// require("/home/ohoking/domains/ohoking.com/public_html/admin_lang/export/lang_member_".$_SESSION['lang'].".php");
require("lang/function_array.php");


if($_POST["zone_send"] !=""){ 
    $_SESSION["zone_hun"] = $_POST["zone_send"];
    $_SESSION["rob_hun"] = $_POST["rob_send"];
  	$_SESSION["name_hun"] = $_POST["name_send"];
}elseif($_GET["zone_send"] !=""){ 
    $_SESSION["zone_hun"] = $_GET["zone_send"];
    $_SESSION["rob_hun"] = $_GET["rob_send"];
  	$_SESSION["name_hun"] = $_GET["name_send"];
}else{
    /*$_SESSION["zone_hun"] = 0;
	$_SESSION["rob_hun"] = 0;
	$_SESSION["name_hun"] ;*/
}



   	function CalRemainTime($end) {
   	  $now = new DateTime();
   	  $now->setTimestamp(strtotime('now'));
   	  $future_date = new DateTime();
   	  $future_date->setTimestamp($end);
   	  $interval = $future_date->diff($now);
   	  return array('d' => $interval->format("%a"), 'h' => $interval->format("%h"), 'm' => $interval->format("%i"), 's' => $interval->format("%s"));
   	}
	
   	function ConvTo2Digit($txt) {
   	    if(strlen($txt) < 2) {
   	      return "0".$txt;
   	    }
   	    return $txt;
   	}


//$streaming = "rtmp://202.162.78.181/live/myd";


$dw = date( "w", time());

$token = md5(uniqid(rand(),1));
$_SESSION['bettoken']=$token;
$fo="json/login/token_bet/".$_SESSION['m_id'].".php";
write($fo,'<? $bet_token="'.$token.'"; ?>',"w+"); 


$rec = sql_array("select * from bom_tb_config where con_id = 1;");

if($rec["con_open_lotto_hun"]==0){ 
  include 'sa_close.php'; 
  exit(); 
} 

foreach($_SESSION['arid'] as $rid){

  $r_open_page = explode(",", $_SESSION['ardata'][$rid]["r_open"]);
  
  if($r_open_page[9]==0){ 
    include 'ag_close.php'; 
    exit(); 
  } 
}

$m_open_page = explode(",", $_SESSION["m1"]["m_open"]);

if($m_open_page[9]==0){ 
  include 'ag_close.php'; 
  exit(); 
}  

if( $_SESSION["zone_hun"]>1){
$zone=$_SESSION["zone_hun"];
$rob=$_SESSION["rob_hun"];
if($rob=="" || $rob==0){
	$rob = 1;
}
$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
$ok_data=sql_array($sql);
}

################Config Member
 $emax=@explode(',',$_SESSION['m1']['m_lotto_hun_max']); 
 $emin=@explode(',',$_SESSION['m1']['m_lotto_hun_min']); 
  $eset=@explode(',',$_SESSION['m1']['m_lotto_hun_set_price']); 
 

             if($_SESSION['m1']['m_lotto_hun_setbet']==1){
$lot_pay_big5=@explode(',',$_SESSION['m1']['m_lotto_hun_pay1']); 	
	}elseif($_SESSION['m1']['m_lotto_hun_setbet']==2){
$lot_pay_big5=@explode(',',$_SESSION['m1']['m_lotto_hun_pay2']); 	
	}else{
$lot_pay_big5=@explode(',',$_SESSION['m1']['m_lotto_hun_pay3']); 	
	}

//print_r($lot_pay_big5);
/*
$day_open = "15/06/2562";
$day_mid_open = 11;
$day_last_open = 25;
$time_close1 = "15:20";
$time_close2 = "15:00";
*/
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<TITLE><?=$app_title;?></TITLE>
<link rel="stylesheet" type="text/css" href="css/style.css?v=<?=$cache_css;?>" >
<link rel="stylesheet" type="text/css" href="css/style3.css?v=<?=$cache_css;?>" >

<link rel="stylesheet" href="css/m_lothun.css?v=<?=$time_stam;?>" >
<link rel="stylesheet" href="css/flag-icon/css/flag-icon.min.css" >
<? if($_SESSION['lang']=="mm"){ ?>
	<link rel="stylesheet" type="text/css" href="css/style_mm.css?v=2019">
<? } ?>
<!-- <style>
#menu_lotto {
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
  font-size: 12px;
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
.tb_title_set {
  background-image: linear-gradient(top, #d92e37,  #8b1c22);
  background-image: -moz-linear-gradient(top, #d92e37, #8b1c22);
  background-image: -webkit-linear-gradient(top, #d92e37, #8b1c22);
  background-image: -o-linear-gradient(top, #d92e37, #8b1c22);
  background-image: -ms-linear-gradient(top, #d92e37, #8b1c22);
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
  width: 100%;
  font-size: 12px;
  color: #333333;
  font-weight: bold;
  text-align: center;
  background-color: #eeeeee;
  text-shadow: 1px 1px 1px #ffffff;
}
.txt_center12n {
  width: 100%;
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
  width: 100%;
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
.bg_td {
  /*padding: 0 2px;*/
}
</style> -->
<script src="js/jquery-1.9.1.min.js?v=2019"></script>
<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
<script src="js/countdown_th.js" type="text/javascript"></script>
<script type="text/javascript">

var CountdownLabels = {
	second 	: "<?=$lang_member[1598]?>",
	minute 	: "<?=$lang_member[554]?>",
	hour	: "<?=$lang_member[1437]?>",
	day 	: "<?=$lang_member[2129]?>",
	month 	: "<?=$lang_member[1120]?>",
	year 	: "<?=$lang_member[2128]?>"	
};

</script>
<script>
function countdown_time(key, time_id, now, end) {
  var date_now = new Date(now*1000);
  var date_end = new Date(end*1000);
  var time_left = (date_end - date_now)-1000;

  var countdown = setInterval(function(){
  let seconds = Math.floor((time_left)/1000);
  let minutes = Math.floor(seconds/60);
  let hours = Math.floor(minutes/60);
  let days = Math.floor(hours/24);
  
  hours = hours-(days*24);
  minutes = minutes-(days*24*60)-(hours*60);
  seconds = seconds-(days*24*60*60)-(hours*60*60)-(minutes*60);

  let _d = days > 0 ? ConTo2Digit(days)+' วัน ' : "";
  let time = _d+ConTo2Digit(hours)+' : '+ConTo2Digit(minutes)+' : '+ConTo2Digit(seconds);
  $('#'+time_id).html(time)
  time_left = time_left - 1000;

  if(time_left < 0) {
    clearInterval(countdown);
    $('#'+key).addClass('dis');
    $('#'+key).removeAttr('onclick');
    $('#'+time_id).html('<span style="color: #e01a1a;"><?=$lang_member[1435]?></span>')
    let parent = $('#'+key).parent('.hun-selector');
    if($(parent).hasClass('zone_18'))
    {
    	let grandParent = $(parent).parent('.group');
    	$(grandParent).append(parent);
    }
   }
  }, 1000);
}

function ConTo2Digit(val) {
    val = ("0" + val).slice(-2);
    return val;
}

function SelectLottoZone(zone, rob, name) {
  $('#zone_send').val(zone);
  $('#rob_send').val(rob);
  $('#name_send').val(name);
  $('#form_send').submit();
  parent.leftx.location.href="left_hun.php?hun_zone="+zone+"&hun_rob="+rob; 
}

function Select24HrZone(file) {
  $('#o_file').val(file);
  $('#_24form').submit();
}
</script>
<script src="js/watchjs/watch.js"></script>
<script src="js/lot_ctrl.js"></script>
<?
		$tz = $timezoneArr[strtolower($_SESSION['m_timezone'])]['php_code'];
		try {
		    $date = new DateTime("now", new DateTimeZone($tz));
		    $userDateTimeNow = strtotime($date->format('Y-m-d H:i:s'));
		}catch (Exception $e) {
		    echo $e->getMessage();
		    exit(1);
		}

	?>
<script>

var fw;
$(document).ready(function() {
	 to_width(<?=$_GET["vvw"]?>);
	 <?
	if($_GET["tlot"]=="3fu"){
		echo "load_list(2);";
	}else if($_GET["tlot"]=="2ud" || $_GET["tlot"]=="2ud50"  || $_GET["tlot"]=="2ud100"){
		echo "load_list(3);";
	}else if($_GET["tlot"]=="run"){
		echo "load_list(4);";
	}else if($_GET["tlot"]=="kk"){
		echo "load_list(5);";
	}else if($_GET["tlot"]=="upfax"){
		echo "load_list(6);";
	}else if($_GET["tlot"]=="pug"){
		echo "load_list(7);";
	}else if($_GET["tlot"]=="laoset"){
		echo "load_list(10);";
	}else if($_GET["tlot"]==""){
		echo "load_list(1);";
	}
	 ?>
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
function load_list(tlot){
	$.ajax({
		type: "POST",
		url: "lothun/load_list.php",
		data: { "tlot": tlot },
		timeout: 15000,
		cache: false,	// Clear cache IE
		beforeSend: function(){
			$("#vdata2").html("<img src='img/loding.gif' style='opacity:1; margin:auto; display:block;' id='loding-f'>");
		},
		success: function(data){
			$("#vdata2").html(data);
			//parent.parent.leftx.location.href='betform.php';
		}
	});	
}
function _w(url){
	window.location=url;
	}
function _o(url){
	window.open(url);
	}
	function _r(){
	window.location.reload()
	}
	function csetfocus(v,n,e){
	
   var keycode;
   if (window.event) { keycode = window.event.keyCode; }  // IE
   else{ keycode = e.which; } //FireFox

  var num_1=$("input[name='num"+n+"']").val();
//  if( num_1.length<3 && num_1.length>0){
	  if( num_1.length==1 ){	 
		  if($("#col3c").prop("checked") == true){
		  $("input[name='col3"+n+"']").attr('disabled','disabled');
		  $("input[name='col3"+n+"']").addClass('disRed');
		  $("input[name='col3"+n+"']").val('');
		  }
		  
		  $("#lbl_chk6g"+n).html("<?=$lang_member[618]?>");
		  $("#chk6g"+n).data('cross-value', 6);  
		  $("#chk6g"+n).trigger('change');
		  if(document.getElementById('chk6g'+n)){
		  document.getElementById('chk6g'+n).disabled = true;
		  }
		  $("#chk6g"+n).prop("checked", false);
		  $("#ngub"+n).val(1);
	  }		
	
	if( num_1.length==2 ){	
		
		var fnum = num_1;
				var vu = [];
				var org_vu = [];	
				var txtv0=fnum.substr(0,1);	
				var txtv1=fnum.substr(1,1);
				
			if(txtv0!="*" && txtv1!="*"){
		
				var val1 = txtv1+txtv0;
				
				vu[0] = fnum;
				org_vu[0] = fnum;
				org_vu[1] = val1;
				
				var x=1;
				for(i=1;i<2;i++){
					var ck='Y';
					for(s=0;s<i;s++){ if(vu[s]==org_vu[i]){ ck='N'; } }
					if(ck=='Y'){ vu[x]=org_vu[i]; x++; }
				}
		
		//console.log(vu);
		$("#ngub"+n).val(vu.length);
	  if(vu.length==1){
		  $("#lbl_chk6g"+n).html("<?=$lang_member[618]?>");
		  $("#chk6g"+n).data('cross-value', 6);  
		  $("#chk6g"+n).trigger('change');
		  if(document.getElementById('chk6g'+n)){
			document.getElementById('chk6g'+n).disabled = true;
		  }
		  $("#chk6g"+n).prop("checked", false);
	  }else{
		  //nuu = vu.length;
		  $("#lbl_chk6g"+n).html(vu.length+" <?=$lang_member[492]?>");
		  $("#chk6g"+n).data('cross-value', vu.length);  
		  $("#chk6g"+n).trigger('change');
		  if(document.getElementById('chk6g'+n)){
			document.getElementById('chk6g'+n).disabled = false;
		  }
	  }
	}else{
		if($("#col3c").prop("checked") == true){
		$("input[name='col3"+n+"']").attr('disabled','disabled');
		  $("input[name='col3"+n+"']").addClass('disRed');
		  $("input[name='col3"+n+"']").val('');
		}
		
		$("#lbl_chk6g"+n).html("<?=$lang_member[618]?>");
		$("#chk6g"+n).data('cross-value', 6);  
		$("#chk6g"+n).trigger('change');
		if(document.getElementById('chk6g'+n)){
			document.getElementById('chk6g'+n).disabled = true;
		}
		$("#chk6g"+n).prop("checked", false);
	}
		
		
	}
	  
  if( num_1.length==3 ){
	var fnum = num_1;
	var vu = [];
	var org_vu = [];	
	var txtv0=fnum.substr(0,1);	
	var txtv1=fnum.substr(1,1);
	var txtv2=fnum.substr(2,1);
	
	var val1 = txtv0+txtv2+txtv1;
	var val2 = txtv1+txtv2+txtv0;	
	var val3 = txtv1+txtv0+txtv2;
	var val4 = txtv2+txtv0+txtv1;
	var val5 = txtv2+txtv1+txtv0;
	
	vu[0] = fnum;
	org_vu[0] = fnum;
	org_vu[1] = val1;
	org_vu[2] = val2;
	org_vu[3] = val3;
	org_vu[4] = val4;
	org_vu[5] = val5;
	
	var x=1;
	for(i=1;i<6;i++){
		var ck='Y';
		for(s=0;s<i;s++){ if(vu[s]==org_vu[i]){ ck='N'; } }
		if(ck=='Y'){ vu[x]=org_vu[i]; x++; }
	}
	  //var nuu = 1;
	  $("#ngub"+n).val(vu.length);
	  if(vu.length==1){
		  $("#lbl_chk6g"+n).html("<?=$lang_member[618]?>");
		  $("#chk6g"+n).data('cross-value', 6);  
		  $("#chk6g"+n).trigger('change');
		  if(document.getElementById('chk6g'+n)){
			document.getElementById('chk6g'+n).disabled = true;
		  }
		  $("#chk6g"+n).prop("checked", false);
	  }else{
		  //nuu = vu.length;
		   $("#lbl_chk6g"+n).html(vu.length+" <?=$lang_member[492]?>");
		   $("#chk6g"+n).data('cross-value', vu.length);  
		   $("#chk6g"+n).trigger('change');
		  if(document.getElementById('chk6g'+n)){
			document.getElementById('chk6g'+n).disabled = false;
		  }
	  }
  }else if(num_1.length==4){
		   var fnum = num_1;
				var vu = [];
				var org_vu = [];	
				var txtv0=fnum.substr(0,1);	
				var txtv1=fnum.substr(1,1);
				var txtv2=fnum.substr(2,1);
				var txtv3=fnum.substr(3,1);

				var val1 = txtv0+txtv1+txtv3+txtv2;
				var val2 = txtv0+txtv2+txtv1+txtv3;	
				var val3 = txtv0+txtv2+txtv3+txtv1;
				var val4 = txtv0+txtv3+txtv1+txtv2;
				var val5 = txtv0+txtv3+txtv2+txtv1;

				var val6 = txtv1+txtv0+txtv2+txtv3;
				var val7 = txtv1+txtv0+txtv3+txtv2;	
				var val8 = txtv1+txtv2+txtv0+txtv3;
				var val9 = txtv1+txtv2+txtv3+txtv0;
				var val10 = txtv1+txtv3+txtv0+txtv2;
				var val11 = txtv1+txtv3+txtv2+txtv0;

				var val12 = txtv2+txtv0+txtv1+txtv3;
				var val13 = txtv2+txtv0+txtv3+txtv1;	
				var val14 = txtv2+txtv1+txtv0+txtv3;
				var val15 = txtv2+txtv1+txtv3+txtv0;
				var val16 = txtv2+txtv3+txtv0+txtv1;
				var val17 = txtv2+txtv3+txtv1+txtv0;

				var val18 = txtv3+txtv0+txtv1+txtv2;
				var val19 = txtv3+txtv0+txtv2+txtv1;	
				var val20 = txtv3+txtv1+txtv0+txtv2;
				var val21 = txtv3+txtv1+txtv2+txtv0;
				var val22 = txtv3+txtv2+txtv0+txtv1;
				var val23 = txtv3+txtv2+txtv1+txtv0;

				vu[0] = fnum;
				org_vu[0] = fnum;
				org_vu[1] = val1;
				org_vu[2] = val2;
				org_vu[3] = val3;
				org_vu[4] = val4;
				org_vu[5] = val5;
				org_vu[6] = val6;
				org_vu[7] = val7;
				org_vu[8] = val8;
				org_vu[9] = val9;
				org_vu[10] = val10;
				org_vu[11] = val11;
				org_vu[12] = val12;
				org_vu[13] = val13;
				org_vu[14] = val14;
				org_vu[15] = val15;
				org_vu[16] = val16;
				org_vu[17] = val17;
				org_vu[18] = val18;
				org_vu[19] = val19;
				org_vu[20] = val20;
				org_vu[21] = val21;
				org_vu[22] = val22;
				org_vu[23] = val23;
				
				var x=1;
				for(i=1;i<24;i++){
					var ck='Y';
					for(s=0;s<i;s++){ if(vu[s]==org_vu[i]){ ck='N'; } }
					if(ck=='Y'){ vu[x]=org_vu[i]; x++; }
				}
	  //var nuu = 1;
	  $("#ngub"+n).val(vu.length);
	  if(vu.length==1){
		  $("#lbl_chk6g"+n).html("<?=$lang_member[618]?>");
		  $("#chk6g"+n).data('cross-value', 6);  
		  $("#chk6g"+n).trigger('change');
		  if(document.getElementById('chk6g'+n)){
		document.getElementById('chk6g'+n).disabled = true;
		  }
		  $("#chk6g"+n).prop("checked", false);
	  }else{
		  //nuu = vu.length;
		   $("#lbl_chk6g"+n).html(vu.length+" <?=$lang_member[492]?>");
		   $("#chk6g"+n).data('cross-value', vu.length);  
		   $("#chk6g"+n).trigger('change');
		  if(document.getElementById('chk6g'+n)){
		document.getElementById('chk6g'+n).disabled = false;
		  }
	  }
  }
	 // console.log(keycode);
if(keycode==107 && v==1){
	if($("#chk6g"+n).prop("checked")==false && document.getElementById('chk6g'+n).disabled==false){
		$("#chk6g"+n).prop("checked" , true);
	}else if($("#chk6g"+n).prop("checked")==true && document.getElementById('chk6g'+n).disabled==false){
		$("#chk6g"+n).prop("checked" , false);
	}
}
	
	if((num_1.length==3 || num_1.length==2 || num_1.length==4) && $("#col3c").prop("checked") == true){
	if($("#chk6g"+n).prop("checked")==true && document.getElementById('chk6g'+n).disabled==false){
		$("input[name='col3"+n+"']").attr('disabled','disabled');
		  $("input[name='col3"+n+"']").addClass('disRed');
		  $("input[name='col3"+n+"']").val('');
	}else{
		$("input[name='col3"+n+"']").removeAttr('disabled');
		$("input[name='col3"+n+"']").removeClass('disRed');
		chtype(n);
	}
	}
	
	
}
function call_sum_check(et){
	if($("#chk6g"+et).prop("checked")==true && document.getElementById('chk6g'+et).disabled==false){
	if($("#col3c").prop("checked") == true){
		$("input[name='col3"+et+"']").attr('disabled','disabled');
		  $("input[name='col3"+et+"']").addClass('disRed');
		  $("input[name='col3"+et+"']").val('');
		}
	}else{
		if($("#col3c").prop("checked") == true){
		$("input[name='col3"+et+"']").removeAttr('disabled');
		$("input[name='col3"+et+"']").removeClass('disRed');
		chtype(et);
		}
		//document.getElementById('atxt4'+n).value = "";
	}
	
	
	}
  	function countdownComplete(){
      	location.reload();
	}
</script>
</head>

<body>
  <? 
	include 'mname_tmpl.php'; 
	include 'mtimezone_tmpl.php';

if($_SESSION["zone_hun"]!="19"){	
   //include("popvdo.php");
}

?>
<div id="main_left">
<? if($_GET["tlot"]==""){ 

	$_SESSION["zone_hun"] = 0;
	$_SESSION["rob_hun"] = 0;
	$_SESSION["name_hun"] = "" ;

	?>
    <style type="text/css">
        #outer {
            font-size: 1.1em;
            font-family: Tahoma;
            color: #2A2A2A;
            width: 100%;
            /*height: 100%;*/
            /*background: #f8f0d5;*/
          	display: flex;
          	align-items: center;
          	justify-content: center;
        }
        .blueDiv {
            width: 170px;
            height: 170px;
            background-color: #3399FF;
            margin: 50px 50px;
            cursor: pointer;
        }
    </style>

<div class="" id="outer">
        <? 
		$tz = $timezoneArr[strtolower($_SESSION['m_timezone'])]['php_code'];

          if(isset($_POST['o_file'])){
			  
			  	$arr = array();
				$i=0;
				$arr[$i]["block_name"] = "<?=$lang_member[686]?>";
				$arr[$i]["block_list"] = array();
				$zone_i = 18;
				$rob_i = 1;
				for($y=0;$y<$lot_zone_nrob[$zone_i];$y++){

					$zone=$zone_i;
					$rob=$rob_i;
					$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
					$rs=sql_array($sql);
					
					// ปรับเวลาปิดรับ ตาม timezone ของ user
					$olt = new DateTime(date("Y-m-d H:i:s",$rs["o_limit_time"]));
					$olt->setTimezone(new DateTimeZone($tz));
		    		$rs["o_limit_time"] = strtotime($olt->format('Y-m-d H:i:s'));

					$arr[$i]["block_list"][$y]["z_name"] = $lang_g['lotZone'][$zone_i]." ".$lang_member[688]." ".$rob_i;
					$arr[$i]["block_list"][$y]["z_status"] = $rs["o_status"];
					$arr[$i]["block_list"][$y]["z_close"] = $rs["o_limit_time"];
					$arr[$i]["block_list"][$y]["z_close_date"] = _cvf($rs["o_limit_time"] , 7);
					$arr[$i]["block_list"][$y]["z_close_time"] = date("H:i:s" , $rs["o_limit_time"]);
					$arr[$i]["block_list"][$y]["z_zone"] = $zone_i;
					$arr[$i]["block_list"][$y]["z_rob"] = $rob_i;
					$arr[$i]["block_list"][$y]["z_data"] = $rs;
					$rob_i++;
				}

				$lotzone  = json_encode($arr);
			  
        		$zone_url = $_POST['o_file']."?mid=".$_SESSION["mid"]."&lang=".$_SESSION['lang'];
        		unset($_POST['o_file']);
        		$_24hr = true;
        		$_showLottoLink = false;
          } else {
			  $arr = array();

			// --------------------- query หวยไทย
			  	$arr_lotto = array();
				
				$arr_lotto["block_name"] = $lang_member[568];
				$arr_lotto["block_show"] = 1;
				$arr_lotto["block_list"] = array();
				$zone_i = 1;
				$rob_i = 1;
				for($y=0;$y<$lot_zone_nrob[$zone_i];$y++){
				
					$zone=$zone_i;
					$rob=$rob_i;
					$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
					$rs=sql_array($sql);
				
					// ปรับเวลาปิดรับ ตาม timezone ของ user
					$olt = new DateTime(date("Y-m-d H:i:s",$rs["o_limit_time"]));
					$olt->setTimezone(new DateTimeZone($tz));
		    		$rs["o_limit_time"] = strtotime($olt->format('Y-m-d H:i:s'));

					$arr_lotto["block_list"][$y]["z_name"] = $lang_g['lotZone'][$zone_i].$lang_g['lotrob'][$rob_i];
					$arr_lotto["block_list"][$y]["z_status"] = $rs["o_status"];
					$arr_lotto["block_list"][$y]["z_close"] = $rs["o_limit_time"];
					$arr_lotto["block_list"][$y]["z_close_date"] = _cvf($rs["o_limit_time"] , 7);
					$arr_lotto["block_list"][$y]["z_close_time"] = date("H:i:s" , $rs["o_limit_time"]);
					$arr_lotto["block_list"][$y]["z_zone"] = $zone_i;
					$arr_lotto["block_list"][$y]["z_rob"] = $rob_i;
					$arr_lotto["block_list"][$y]["z_data"] = $rs;
				}

			// --------------------- end query หวยไทย

			$i=0;				
			$arr[$i]["block_name"] = $lang_g['lotZone'][2];
			$arr[$i]["block_show"] = 1;
			$arr[$i]["block_list"] = array();
			$zone_i = 2;
			$rob_i = 1;
			for($y=0;$y<$lot_zone_nrob[$zone_i];$y++){

				$zone=$zone_i;
				$rob=$rob_i;
				$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
				$rs=sql_array($sql);
				
				// ปรับเวลาปิดรับ ตาม timezone ของ user
				$olt = new DateTime(date("Y-m-d H:i:s",$rs["o_limit_time"]));
				$olt->setTimezone(new DateTimeZone($tz));
		    	$rs["o_limit_time"] = strtotime($olt->format('Y-m-d H:i:s'));

				$arr[$i]["block_list"][$y]["z_name"] = $lang_g['lotZone'][$zone_i].$lang_g['lotrob'][$rob_i];
				$arr[$i]["block_list"][$y]["z_status"] = $rs["o_status"];
				$arr[$i]["block_list"][$y]["z_close"] = $rs["o_limit_time"];
				$arr[$i]["block_list"][$y]["z_close_date"] = _cvf($rs["o_limit_time"] , 7);
				$arr[$i]["block_list"][$y]["z_close_time"] = date("H:i:s" , $rs["o_limit_time"]);
				$arr[$i]["block_list"][$y]["z_zone"] = $zone_i;
				$arr[$i]["block_list"][$y]["z_rob"] = $rob_i;
				$arr[$i]["block_list"][$y]["z_data"] = $rs;
				$rob_i++;
			}
			
			$zone_i = 19;
			$rob_i = 1;
			for($yx=0;$yx<$lot_zone_nrob[$zone_i];$yx++){
				
				$zone=$zone_i;
				$rob=$rob_i;
				$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
				$rs=sql_array($sql);
				
				// ปรับเวลาปิดรับ ตาม timezone ของ user
				$olt = new DateTime(date("Y-m-d H:i:s",$rs["o_limit_time"]));
				$olt->setTimezone(new DateTimeZone($tz));
		    	$rs["o_limit_time"] = strtotime($olt->format('Y-m-d H:i:s'));

				$arr[$i]["block_list"][$y]["z_name"] = $lang_g['lotZone'][$zone_i]." ".$lang_member[643]." ".$lot_robmun[$rob_i];
				$arr[$i]["block_list"][$y]["z_status"] = $rs["o_status"];
				$arr[$i]["block_list"][$y]["z_close"] = $rs["o_limit_time"];
				$arr[$i]["block_list"][$y]["z_close_date"] = _cvf($rs["o_limit_time"] , 7);
				$arr[$i]["block_list"][$y]["z_close_time"] = date("H:i:s" , $rs["o_limit_time"]);
				$arr[$i]["block_list"][$y]["z_zone"] = $zone_i;
				$arr[$i]["block_list"][$y]["z_rob"] = $rob_i;
				$arr[$i]["block_list"][$y]["z_data"] = $rs;
				$rob_i++;
				$y++;
			}

			$i=1;
			$arr[$i]["block_name"] = $lang_member[684];
			$arr[$i]["block_show"] = 1;
			$arr[$i]["block_list"] = array();
			$nr=0;
			for($x=3;$x<18;$x++){
				$zone_i = $x;
				$rob_i = 1;
				for($y=0;$y<$lot_zone_nrob[$zone_i];$y++){
					
					$zone=$zone_i;
					$rob=$rob_i;
					$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
					$rs=sql_array($sql);
					
					// ปรับเวลาปิดรับ ตาม timezone ของ user
					$olt = new DateTime(date("Y-m-d H:i:s",$rs["o_limit_time"]));
					$olt->setTimezone(new DateTimeZone($tz));
		    		$rs["o_limit_time"] = strtotime($olt->format('Y-m-d H:i:s'));
					

					$arr[$i]["block_list"][$nr]["z_name"] = $lang_g['lotZone'][$zone_i].($lot_zone_nrob[$zone_i] > 1 ? $lang_g['lotrob'][$rob_i] : '');
					$arr[$i]["block_list"][$nr]["z_status"] = $rs["o_status"];
					$arr[$i]["block_list"][$nr]["z_close"] = $rs["o_limit_time"];
					$arr[$i]["block_list"][$nr]["z_close_date"] = _cvf($rs["o_limit_time"] , 7);
					$arr[$i]["block_list"][$nr]["z_close_time"] = date("H:i:s" , $rs["o_limit_time"]);
					$arr[$i]["block_list"][$nr]["z_zone"] = $zone_i;
					$arr[$i]["block_list"][$nr]["z_rob"] = $rob_i;
					$arr[$i]["block_list"][$nr]["z_data"] = $rs;
					$rob_i++;
					$nr++;
				}
			}

			$lotzone = json_encode($arr);
            $_24hr = false;
        	$_showLottoLink = true;

          }
			
			$lotzone_open = explode(",", $rec["con_open_lotto_hun_new"]);
          	$lotzone = json_decode($lotzone,true);
			// var_dump($lotzone);
    ?>
<div class="hun-container">

  <? foreach($lotzone as $key => $value){ ?>

    <div class="hun-group" <? if($_24hr){?> style="width: 100%;" <? }?>>
    	<? 	if($key==0 && $_showLottoLink === true){ #แทรกหวยไทยไว้ด้านบนสุด # ใช้เขียนแบบนี้เพราะ ไม่ได้ query ใส่ array เหมือนหวยหุ้นอื่น 
    			$sql = "SELECT n_note FROM bom_tb_news WHERE b_zone = 2 ORDER BY n_date DESC"; 
  				$resNews = sql_array($sql);
  				$lotNote = htmlspecialchars($resNews['n_note']);
    	?>
      		<div class="group">
    		<h1 class="hun-title"><span><?=$arr_lotto["block_name"];?></span></h1>
    		<div class="hun-selector single">
    		  <div id="lotto_1_0" class="selector-wrapper" onclick="parent.topx.goMain('main_lotto.php',parent.topx.lotto_menu_btn,'<?=$lang_member[36];?> : <?=$lotNote;?>','message_lotto.php'); parent.leftx.flbet(1);">
				<div class="hun-header th">
					<!-- <span class="flag-icon flag-icon-th"></span> -->
    		    		<h1 class="hun-name"><?=$arr_lotto["block_name"];?></h1>
    				</div>
    		      <hr>
    		      <div class="close-time-group">
    		        <p class="close-time"><b><span><?=$arr_lotto['block_list'][0]["z_close_date"]." ".$arr_lotto['block_list'][0]["z_close_time"];?></span></b></p>
    		        <p class="close-count">
    		        	<span id="lotto_1_countdown_0">-- : --</span>
    		        </p> 
    		      </div>

                    <script>
                  	countdown_time('lotto_1_0', 'lotto_1_countdown_0', '<?=$userDateTimeNow;?>', '<?=$arr_lotto['block_list'][0]["z_close"];?>');
                    </script> 
    		    </div>
    		  </div>
    		</div>
      	<?  } #แทรกหวยไทยไว้ด้านบนสุด ?>

      <? if($key===(count($lotzone)-1) && $_24hr===false && $lotzone_open[18]=="1"){ ?> <!-- เมนูยี่กี่  -->
      <div class="group">
        <h1 class="hun-title"><span><?=$lang_member[686]?></span></h1>
          <div class="hun-selector zone_<?=$key;?> single" <? if($_24hr){?> style="width: 25%;" <? }?>>
            <div id="" class="selector-wrapper _24" onclick="Select24HrZone('lotto/getRob18.php');">
				<div class="hun-header cn">
					<!-- <span class="flag-icon flag-icon-cn"></span> -->
              		<h1 class="hun-name"><?=$lang_member[686]?></h1>
          		</div>
                <hr>
    		      <div class="close-time-group">
                  <p class="close-time"><b><?=$lang_member[1431]?> 88 <?=$lang_member[643]?></b>
                  </p>
                  <p class="close-count"><span id="">24 <?=$lang_member[1437]?></span></p>
              	  </div>
              </div>
            </div>
          </div>
      <? } ?>

      <div class="group">
<?
if($value["block_list"][0]["z_zone"] != 18){ // หน้ารอบยี่กี่ไม่ต้องแสดง 
?>
      	<h1 class="hun-title"><span><?=$value["block_name"];?></span></h1>
<?
}
    	// สำหรับยี่กี่ ดึงเอารอบที่ปิดแล้วออกมา แล้วใส่กลับเข้าไปต่อท้าย เพื่อให้อยู่ด้านล่าง
    	$tmpLothunList = [];
    	foreach ($value["block_list"] as $k => $v) { 
    		if($v["z_zone"] == 18){
    			if($userDateTimeNow>$v["z_close"] && $v["z_status"]==1){
    				$tmpLothunList[] = $v;
    				unset($value["block_list"][$k]);
    			}
    		}
		}
		$value["block_list"] = array_merge($value["block_list"], $tmpLothunList );
    	// สำหรับยี่กี่ ดึงเอารอบที่ปิดแล้วออกมา แล้วใส่กลับเข้าไปต่อท้าย เพื่อให้อยู่ด้านล่าง

    	foreach ($value["block_list"] as $k => $v) { 
    		if($lotzone_open[$v["z_zone"]]!="1" && $v["z_zone"] != "1"){ 
    			continue;
    		}

    		if($v["z_zone"] == 18 && $v["z_rob"] > 88){ // ยี่กี่ เอาแค่ 88 รอบ
    			continue;
    		}

    		if($v["z_zone"] == 19) // ซ่อนหวยรายวัน
    			continue;

        $s_cls = count($value["block_list"]) > 1 ? "" : "single";
    ?>
            <div class="hun-selector zone_<?=$v["z_zone"];?> <?=$s_cls;?>" <?if($_24hr){?> style="width: 25%;" <?}?>>
              <div id="<?=$key.$v["z_zone"]."_".$k;?>"
                <? if($userDateTimeNow>$v["z_close"] && $v["z_status"]==1){?> 
                  onclick="SelectLottoZone('<?=$v["z_zone"];?>', '<?=$v["z_rob"];?>', '<?=$v["z_name"];?>');"
                  class="selector-wrapper dis" 
                <? }else if($v["z_status"]==0){?>
                  class="selector-wrapper close" 
                <? }else if($v["z_status"]==24){?>
                  class="selector-wrapper _24" 
                  onclick="Select24HrZone('<?=$v["z_data"]["o_file"];?>');"
                <? }else{?> 
                  class="selector-wrapper" 
                  onclick="SelectLottoZone('<?=$v["z_zone"];?>', '<?=$v["z_rob"];?>', '<?=$v["z_name"];?>');"
                <? }?>>
				<div class="hun-header <?=$arr_zone_contry[$v["z_zone"]];?>">
					<!-- <span class="flag-icon flag-icon-<?=$arr_zone_contry[$v["z_zone"]];?>"></span> -->
                	<h1 class="hun-name"><?=$v["z_name"];?></h1>
				</div>
                <hr>
    		      <div class="close-time-group">

                  <?if($v["z_status"]==24){?> 
                    <p class="close-time">
                      	<b><?=$lang_member[1436]?> <?=$v["z_rob"];?> <?=$lang_member[643]?></b>
                    </p>
                  <?}else{?>
                    <p class="close-time">
                    	<b><?=$lang_member[1436]?> : </b>
                    	<span><?=$v["z_close_date"]." ".$v["z_close_time"];?></span>
                    </p>
                  <?}?>
                <p class="close-count">
                    <? if($userDateTimeNow>$v["z_close"] && $v["z_status"]==1){?> 
                      <span style="color: #e01a1a;"><?=$lang_member[1435]?></span>
                    <? }else if($v["z_status"]==0){?> 
                      <span><?=$lang_member[1435]?></span>
                    <? }else if($v["z_status"]==24){?> 
                      <i class="fa fa-clock-o"></i>
                      <span>  24 ชั่วโมง</span>
                    <? }else{?> 
                      <span id="<?=$key.$v["z_zone"]."_countdown_".$k;?>">
                      	-- : --
                          <script>
                          	countdown_time('<?=$key.$v["z_zone"]."_".$k;?>', '<?=$key.$v["z_zone"]."_countdown_".$k;?>', '<?=$userDateTimeNow;?>', '<?=$v["z_close"];?>');
                          </script> 
                          <?
                            // $r = CalRemainTime($v["z_close"]);
                          	// $d = (intval($r["d"]) > 0) ? ConvTo2Digit($r["d"])." วัน " : "";
                            // echo $d.ConvTo2Digit($r["h"])." : ".ConvTo2Digit($r["m"])." : ".ConvTo2Digit($r["s"]);
                          ?>
                    </span> 
                    <?}?>
                </p>
            </div>
              </div>
            </div>
        <? }  ?>
        </div>
    </div>
  <? } ?>
  </div>

        </div>
            
            
        </div>

        <form action="main_lothun.php?vvw=<?=$_GET["vvw"]?>&tlot=2ud" method="post" id="form_send">
          <input type="hidden" id="zone_send" name="zone_send">
          <input type="hidden" id="rob_send" name="rob_send">
          <input type="hidden" id="name_send" name="name_send">
        </form>

        <form action="main_lothun.php" hidden="true" method="post" id="_24form">
          <input type="hidden" name="o_file" id="o_file">
        </form>

<? }else{ ?>
  <div id="menu_lotto">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
      <tbody>
        <tr align="center" height="32">

          <? if(($lot_pay_big5[4]>0) or ($lot_pay_big5[5]>0)){ ?>
          <td class="mlotto<? if($_GET["tlot"]=="2ud" || $_GET["tlot"]=="2ud50" || $_GET["tlot"]=="2ud100"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lothun.php?tlot=2ud&vvw='+fw"><?=$lang_member[483];?></a></td>
          <td width="4"><!-- <img src="img/spacer.gif" width="2" height="32"> --></td>
          <? } ?>
			
          <? #($lot_pay_big5[27]>0) and 
		   if($_SESSION["zone_hun"]==3){ # เลขชุด ?> 
          <td class="mlotto<? if($_GET["tlot"]=="laoset"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lothun.php?tlot=laoset&vvw='+fw"><?=$lang_member[640];?></a></td>
          <td width="4"><!-- <img src="img/spacer.gif" width="2" height="32"> --></td>
			<?}?>

          <? if(($lot_pay_big5[4]>0) or ($lot_pay_big5[5]>0)){ ?>
         <td class="mlotto<? if($_GET["tlot"]=="run"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lothun.php?tlot=run&vvw='+fw"><?=$lang_member[412];?></a></td>
          <td width="4"><!-- <img src="img/spacer.gif" width="2" height="32"> --></td>
          <? } ?>
          <? if(($lot_pay_big5[21]>0) or ($lot_pay_big5[22]>0) or ($lot_pay_big5[23]>0)){ ?>
          <td class="mlotto<? if($_GET["tlot"]=="pug"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lothun.php?tlot=pug&vvw='+fw"><?=$lang_member[484];?></a></td>
          <td width="4"><!-- <img src="img/spacer.gif" width="2" height="32"> --></td>
          <? } ?>
          <? if(($lot_pay_big5[6]>0) or ($lot_pay_big5[7]>0)){ ?>
          <td class="mlotto<? if($_GET["tlot"]=="kk"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lothun.php?tlot=kk&vvw='+fw"><?=$lang_member[446];?></a></td>
          <td width="4"><!-- <img src="img/spacer.gif" width="2" height="32"> --></td>
          <? } ?>
					
		  

          <td class="mlotto<? if($_GET["tlot"]=="full"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lothun.php?tlot=full&vvw='+fw"><?=$lang_member[414];?></a></td>

          <td width="4"><!-- <img src="img/spacer.gif" width="2" height="32"> --></td>
          <td class="mlotto<? if($_GET["tlot"]=="pay"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lothun.php?tlot=pay&vvw='+fw"><?=$lang_member[580]?></a></td>
          
          <td width="4"><!-- <img src="img/spacer.gif" width="2" height="32"> --></td>
          <td class="mlotto<? if($_GET["tlot"]=="list"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lothun.php?tlot=list&vvw='+fw"><?=$lang_member[43];?></a></td>

           

          <td width="4"><!-- <img src="img/spacer.gif" width="2" height="32"> --></td>
          <td class="mlotto<? if($_GET["tlot"]=="result"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lothun.php?tlot=result&vvw='+fw"><?=$lang_member[50];?></a></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div id="lotto_content">
  <? 
  ################OPEN BET LOTTO 
if($_GET["tlot"]=="3fu"){
if($_SESSION["rob_hun"]=="" || $_SESSION["rob_hun"]==0){$_SESSION["rob_hun"] = 1;}
	include "lothun/3fu.php"; 
}else if($_GET["tlot"]=="2ud"){
	if($_SESSION["rob_hun"]=="" || $_SESSION["rob_hun"]==0){$_SESSION["rob_hun"] = 1;}
		include "lothun/3ud.php"; 
}else if($_GET["tlot"]=="2ud50"){
	if($_SESSION["rob_hun"]=="" || $_SESSION["rob_hun"]==0){$_SESSION["rob_hun"] = 1;}
		include "lothun/3ud50.php"; 
}else if($_GET["tlot"]=="2ud100"){
	if($_SESSION["rob_hun"]=="" || $_SESSION["rob_hun"]==0){$_SESSION["rob_hun"] = 1;}
		include "lothun/3ud100.php"; 
}else if($_GET["tlot"]=="laoset"){
	foreach($_SESSION['arid'] as $rid){

	  $r_open_page = explode(",", $_SESSION['ardata'][$rid]["r_open"]);
	  
	  if($r_open_page[10]==0){ 
	    include 'ag_close.php'; 
	    exit(); 
	  } 
	}

	if($m_open_page[10]==0){ 
	  include 'ag_close.php'; 
	  exit(); 
	}
	if($_SESSION["rob_hun"]=="" || $_SESSION["rob_hun"]==0){$_SESSION["rob_hun"] = 1;}
	include "lothun/laoset.php"; 
}else if($_GET["tlot"]=="run"){
	if($_SESSION["rob_hun"]=="" || $_SESSION["rob_hun"]==0){$_SESSION["rob_hun"] = 1;}
	include "lothun/run.php"; 
}else if($_GET["tlot"]=="pug"){
	if($_SESSION["rob_hun"]=="" || $_SESSION["rob_hun"]==0){$_SESSION["rob_hun"] = 1;}
	include "lothun/pug.php"; 
}else if($_GET["tlot"]=="kk"){
	if($_SESSION["rob_hun"]=="" || $_SESSION["rob_hun"]==0){$_SESSION["rob_hun"] = 1;}
	include "lothun/kk.php"; 
}else if($_GET["tlot"]=="upfax"){
#	include "lothun/fax.php"; 
}else if($_GET["tlot"]=="full"){
	include "lothun/full.php"; 
}else if($_GET["tlot"]=="pay"){
	include "lothun/pay.php"; 
}else if($_GET["tlot"]=="list"){
	include "lothun/list.php"; 
}else if($_GET["tlot"]=="result"){
	include "lothun/result.php"; 
}else if($_GET["tlot"]=="home"){
	include "lothun/home.php"; 
}else{
	#include "lothun/3ud.php"; 
}
$_SESSION['cklock']=array();
	?>
  </div>
  <? } ?>
</div>

</body>
</html>

