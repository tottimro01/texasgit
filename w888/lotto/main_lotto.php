<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');
// require("lang/member_lang.php");
require("../lang/variable_lang.php");


#if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}d
$token = md5(uniqid(rand(),1));
$_SESSION['bettoken']=$token;
$fo=$json_file_main."json/login/token_bet/$_SESSION[mid].php";
write($fo,'<? $bet_token="'.$token.'"; ?>',"w+"); 

#echo mktime(15,20,0,7,16,2015);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<TITLE>::: OHOKING :::</TITLE>
<link rel="stylesheet" type="text/css" href="css/style.css?v=2019">
<? if($_SESSION['lang']=="mm"){?><link rel="stylesheet" type="text/css" href="css/style_mm.css?v=2019"><? }?>
<style>
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
</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="js/countdown_<?=$_SESSION['lang'];?>.js" type="text/javascript"></script>
<script>
var fw;
$(document).ready(function() {
	 to_width(<?=$_GET["vvw"]?>);
	 <?
	# echo $_GET["tlot"];
	# echo"bom";
	 if($_GET["tlot"]=="3fu"){
		echo "load_list(2);";
	}else if($_GET["tlot"]=="2ud"  || $_GET["tlot"]=="2ud100"){
		echo "load_list(3);";
	}else if($_GET["tlot"]=="2udt"   || $_GET["tlot"]=="2udt100"){
		echo "load_list(8);";
	}else if($_GET["tlot"]=="3udt"){
		echo "load_list(9);";
	}else if($_GET["tlot"]=="run"){
		echo "load_list(4);";
	}else if($_GET["tlot"]=="kk"){
		echo "load_list(5);";
	}else if($_GET["tlot"]=="upfax"){
		echo "load_list(6);";
	}else if($_GET["tlot"]=="pug"){
		echo "load_list(7);";
	}else if($_GET["tlot"]==""  || $_GET["tlot"]=="3ud100"){
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
		url: "lotto/load_list.php",
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
    function countdownComplete(){
      location.reload();
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
		  
		  $("#lbl_chk6g"+n).html("<?=$lang_member[618];?>");
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
		  $("#lbl_chk6g"+n).html("<?=$lang_member[618];?>");
		  if(document.getElementById('chk6g'+n)){
		document.getElementById('chk6g'+n).disabled = true;
		  }
		  $("#chk6g"+n).prop("checked", false);
	  }else{
		  //nuu = vu.length;
		   $("#lbl_chk6g"+n).html(vu.length+" <?=$lang_member[492];?>");
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
		
		$("#lbl_chk6g"+n).html("<?=$lang_member[618];?>");
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
		  $("#lbl_chk6g"+n).html("<?=$lang_member[618];?>");
		  if(document.getElementById('chk6g'+n)){
		document.getElementById('chk6g'+n).disabled = true;
		  }
		  $("#chk6g"+n).prop("checked", false);
	  }else{
		  //nuu = vu.length;
		   $("#lbl_chk6g"+n).html(vu.length+" กลับ");
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
	
	if((num_1.length==3 || num_1.length==2) && $("#col3c").prop("checked") == true){
	if($("#chk6g"+n).prop("checked")==true && document.getElementById('chk6g'+n).disabled==false){
		$("input[name='col3"+n+"']").attr('disabled','disabled');
		  $("input[name='col3"+n+"']").addClass('disRed');
		  $("input[name='col3"+n+"']").val('');
	}else{
		$("input[name='col3"+n+"']").removeAttr('disabled');
		$("input[name='col3"+n+"']").removeClass('disRed');
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
		}
		//document.getElementById('atxt4'+n).value = "";
	}
	}
</script>
</head>
<?
################Config Member
$url_file=$json_file_main."json/config/member/LottoConfig_".$_SESSION[mid].".json";	
$lot6_js=file_get_contents2($url_file);
$lot_m = json_decode2($lot6_js, true);

$lot_pay_big1=@explode(",",$lot_m['m_lotto_pay_super']);
$lot_pay_big2=@explode(",",$lot_m['m_lotto_pay_senior']);
$lot_pay_big3=@explode(",",$lot_m['m_lotto_pay_master']);
$lot_pay_big4=@explode(",",$lot_m['m_lotto_pay_agent']);
  
 $lot_pay_big5=@explode(',',$lot_m['m_lotto_pay_member']); 


?>
<body>
<div id="main_left">
  <div id="menu_lotto">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
      <tbody>
        <tr align="center" height="32">
       <!-- <td class="mlotto<? if($_GET["tlot"]=="home"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lotto.php?tlot=home&vvw='+fw">หน้าแทงหลัก</a></td>
          <td width="2"><img src="img/spacer.gif" width="2" height="32"></td> -->
          <td class="mlotto<? if($_GET["tlot"]=="" || $_GET["tlot"]=="3ud100"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lotto.php?tlot=&vvw='+fw"><?=$lang_member[483]?></a></td>
          <td width="2"><img src="img/spacer.gif" width="2" height="32"></td>
          <? if(($lot_pay_big5[16]>0) or ($lot_pay_big5[17]>0) or ($lot_pay_big5[18]>0) or ($lot_pay_big5[19]>0) or ($lot_pay_big5[20]>0)){ ?>
          <td class="mlotto<? if($_GET["tlot"]=="3fu"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lotto.php?tlot=3fu&vvw='+fw"><?=$lang_member[410];?></a></td>
          <td width="2"><img src="img/spacer.gif" width="2" height="32"></td>
          <? } ?>
          <? if(($lot_pay_big5[4]>0) or ($lot_pay_big5[5]>0)){ ?>
          <td class="mlotto<? if($_GET["tlot"]=="2ud" || $_GET["tlot"]=="2ud100"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lotto.php?tlot=2ud&vvw='+fw"><?=$lang_member[411];?></a></td>
          <td width="2"><img src="img/spacer.gif" width="2" height="32"></td>
          
          <? if($_SESSION['m_bet_tou']==1){?>
           <td class="mlotto<? if($_GET["tlot"]=="2udt" || $_GET["tlot"]=="2udt100"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lotto.php?tlot=2udt&vvw='+fw"><?=$lang_member[480];?></a></td>
          <td width="2"><img src="img/spacer.gif" width="2" height="32"></td>
          
              <td class="mlotto<? if($_GET["tlot"]=="3udt"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lotto.php?tlot=3udt&vvw='+fw"><?=$lang_member[481];?></a></td>
          <td width="2"><img src="img/spacer.gif" width="2" height="32"></td>
          <? }?>
          
          <? } ?>
          <? if(($lot_pay_big5[6]>0) or ($lot_pay_big5[7]>0)){ ?>
          <td class="mlotto<? if($_GET["tlot"]=="run"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lotto.php?tlot=run&vvw='+fw"><?=$lang_member[412];?></a></td>
          <td width="2"><img src="img/spacer.gif" width="2" height="32"></td>
          <? } ?>
          <? if(($lot_pay_big5[21]>0) or ($lot_pay_big5[22]>0) or ($lot_pay_big5[23]>0)){ ?>
          <td class="mlotto<? if($_GET["tlot"]=="pug"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lotto.php?tlot=pug&vvw='+fw"><?=$lang_member[484]?></a></td>
          <td width="2"><img src="img/spacer.gif" width="2" height="32"></td>
          <? } ?>
          <? if(($lot_pay_big5[8]>0) or ($lot_pay_big5[9]>0) or ($lot_pay_big5[10]>0) or ($lot_pay_big5[11]>0) or ($lot_pay_big5[12]>0) or ($lot_pay_big5[13]>0) or ( $lot_pay_big5[14]>0) or ($lot_pay_big5[15]>0)){ ?>
          <td class="mlotto<? if($_GET["tlot"]=="kk"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lotto.php?tlot=kk&vvw='+fw"><?=$lang_member[446];?></a></td>
          <td width="2"><img src="img/spacer.gif" width="2" height="32"></td>
          <? } ?>
             <!--<td class="mlotto<? if($_GET["tlot"]=="upfax"){ ?> mactive<? } ?>" width="11%" align="center"><a onClick="window.location.href = 'main_lotto.php?tlot=upfax&vvw='+fw">ส่งFax</a></td>
          <td width="2"><img src="img/spacer.gif" width="2" height="32"></td>-->
          <td class="mlotto<? if($_GET["tlot"]=="full"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lotto.php?tlot=full&vvw='+fw"><?=$lang_member[414];?></a></td>
          <td width="2"><img src="img/spacer.gif" width="2" height="32"></td>
          <td class="mlotto<? if($_GET["tlot"]=="list"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lotto.php?tlot=list&vvw='+fw"><?=$lang_member[43];?></a></td>
          <td width="2"><img src="img/spacer.gif" width="2" height="32"></td>
          <td class="mlotto<? if($_GET["tlot"]=="result"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lotto.php?tlot=result&vvw='+fw"><?=$lang_member[50];?></a></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div id="lotto_content">
  <? 
if($_GET["tlot"]=="3fu"){
	include "lotto/3fu.php"; 
}else if($_GET["tlot"]=="2ud"){
	include "lotto/2ud.php"; 
}else if($_GET["tlot"]=="2ud100"){
  include "lotto/2ud100.php"; 
}else if($_GET["tlot"]=="2udt"){
	include "lotto/2udt.php"; 
}else if($_GET["tlot"]=="2udt100"){
  include "lotto/2udt100.php"; 
}else if($_GET["tlot"]=="3udt"){
	include "lotto/3udt.php"; 
}else if($_GET["tlot"]=="run"){
	include "lotto/run.php"; 
}else if($_GET["tlot"]=="pug"){
	include "lotto/pug.php"; 
}else if($_GET["tlot"]=="kk"){
	include "lotto/kk.php"; 
}else if($_GET["tlot"]=="upfax"){
	include "lotto/fax.php"; 
#	echo"bom<hr>";
}else if($_GET["tlot"]=="full"){
	include "lotto/full.php"; 
}else if($_GET["tlot"]=="list"){
	include "lotto/list.php"; 
}else if($_GET["tlot"]=="result"){
	include "lotto/result.php"; 
}else if($_GET["tlot"]=="home"){
	include "lotto/home.php"; 
}else if($_GET["tlot"]=="3ud100"){
	include "lotto/3ud_100.php"; 
}else{
	include "lotto/3ud.php"; 
}

$_SESSION[cklock]=array();
	?>
  </div>
</div>

</body>
</html>