<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');

require("lang/variable_lang.php");
require("lang/function_array.php");


$cookie_name = "ip_alert";
$cookie_value = _bIP()."_".$_SESSION['m_id'];


$token = md5(uniqid(rand(),1));
$_SESSION['bettoken']=$token;
$fo="json/login/token_bet/".$_SESSION['m_id'].".php";
write($fo,'<? $bet_token="'.$token.'"; ?>',"w+"); 



$rec = sql_array("select * from bom_tb_config where con_id = 1;");

if($rec["con_open_lotto"]==0){ 
  include 'sa_close.php'; 
  exit(); 
} 

foreach($_SESSION['arid'] as $rid){

  $r_open_page = explode(",", $_SESSION['ardata'][$rid]["r_open"]);
  
  if($r_open_page[8]==0){ 
    include 'ag_close.php'; 
    exit(); 
  } 
}

$m_open_page = explode(",", $_SESSION["m1"]["m_open"]);

if($m_open_page[8]==0){ 
  include 'ag_close.php'; 
  exit(); 
}  




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




$day_open = "15/06/2562";
$day_mid_open = 15;
$day_last_open = 30;
$time_close1 = "15:20";
$time_close2 = "15:00";

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<TITLE><?=$app_name;?></TITLE>
<link rel="stylesheet" type="text/css" href="css/style.css?v=<?=$cache_css;?>">
<link rel="stylesheet" type="text/css" href="css/style3.css?v=<?=$cache_css;?>">

<? if($_SESSION['lang']=="mm"){?><link rel="stylesheet" type="text/css" href="css/style_mm.css?v=2019"><? }?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <script src="js/jquery.js"></script>
	
<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
<!--	<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />-->
	
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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


<script src="js/watchjs/watch.js"></script>
<script src="js/lot_ctrl.js"></script>
<script>
var fw;
$(document).ready(function() {
	 to_width(<?=$_GET["vvw"]?>);
	/*$("a.goalert").fancybox({
		'titleShow'     : false
	});*/
	<?
	
 if(($lot_pay_big5[2]>0) or ($lot_pay_big5[17]>0)){
	
	if(!isset($_COOKIE[$cookie_name])) {
				setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // 86400 = 1 day
				?>
				$(".goalert").click();
				<?
			}else{
				if($_COOKIE[$cookie_name]!=$cookie_value){
					setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // 86400 = 1 day
					?>
					$(".goalert").click();
					<?
				}
			}
 }
	?>
	
	 <?

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
		  $("#lbl_chk6g"+n).html("<?=$lang_member[618];?>");
		  $("#chk6g"+n).data('cross-value', 6);  
		  $("#chk6g"+n).trigger('change');
		  if(document.getElementById('chk6g'+n)){
		document.getElementById('chk6g'+n).disabled = true;
		  }
		  $("#chk6g"+n).prop("checked", false);
	  }else{
		  //nuu = vu.length;
		   $("#lbl_chk6g"+n).html(vu.length+" <?=$lang_member[492];?>");
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
		
		$("#lbl_chk6g"+n).html("<?=$lang_member[618];?>");
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
		  $("#lbl_chk6g"+n).html("<?=$lang_member[618];?>");
		  $("#chk6g"+n).data('cross-value', 6);  
		  $("#chk6g"+n).trigger('change');
		  if(document.getElementById('chk6g'+n)){
		document.getElementById('chk6g'+n).disabled = true;
		  }
		  $("#chk6g"+n).prop("checked", false);
	  }else{
		  //nuu = vu.length;
		   $("#lbl_chk6g"+n).html(vu.length+" <?=$lang_member[492];?>");
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
	
	if((num_1.length==3 || num_1.length==2) && $("#col3c").prop("checked") == true){
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
		}
		//document.getElementById('atxt4'+n).value = "";
	}
	}
</script>
</head>

<body>
	<?
	include 'mname_tmpl.php'; 
	include 'mtimezone_tmpl.php';

	$new_betset_type = 1;
	$new_betset_type_name = 'A';

	$mem = sql_array("SELECT m_lotto_setbet, m_accept_new_set, m_lotto_open FROM bom_tb_member WHERE m_id = '{$_SESSION['m_id']}'");
	?>
	<!-- <button id="dddd" style="background-color: transparent; color: transparent; border: 0;" onclick="openAcceptBet()">XXX</button> -->
	<!-- <div id="dddd"><?=$mem['m_lotto_setbet'] . " " . $mem['m_accept_new_set'];?></div> -->
	<?
    $p_open = explode(",", $mem["m_lotto_open"]);
	if($mem['m_lotto_setbet'] == $new_betset_type && $mem['m_accept_new_set'] != 1 && $p_open[$new_betset_type] == 1){
	?>
<script>
	function openAcceptBet(){
		$.confirm({
		    title: '<?=$lang_member[2254];?>',
		    content: 'url:lotto/pay_table.php?betset=<?=$new_betset_type;?>',
		    useBootstrap: false,
		    theme: "oho",
		    closeIcon: false,
		    animation: 'none',
		    closeAnimation: 'none',
		    backgroundDismiss: false,
    		boxWidth: '500px',
		    onContentReady: function(){
		      var self = this;
		      self.setContentPrepend('<b><?=parseTemplate($lang_member[2344], array('{n1}'=>$new_betset_type_name));?></b><br><br>');
		    },
		    onClose: function(){
		    },
		    buttons: {
		    	accept: {
		    		text: '<?=$lang_member[2343];?>',
		    		btnClass: 'oho-btn',
		    		action: function(){
		    			$.ajax({
		    				url: 'lotto/accept_betset.php',
		    				type: 'POST',
		    				dataType: 'html',
		    			})
		    			.done(function(res){
		    			});
		    		}
		    	}
		    }
		});
	}
	openAcceptBet();
</script>
	<?
	}
  ?>
	

	

<div id="main_left">
  <div id="menu_lotto">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
      <tbody>
        <tr align="center" height="32">

          <td class="mlotto<? if($_GET["tlot"]=="" || $_GET["tlot"]=="3ud100"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lotto.php?tlot=&vvw='+fw"><?=$lang_member[483]?></a></td>
          <td width="4"><!-- <img src="img/spacer.gif" width="2" height="32"> --></td>
          <? if(($lot_pay_big5[16]>0) or ($lot_pay_big5[17]>0) or ($lot_pay_big5[18]>0) or ($lot_pay_big5[19]>0) or ($lot_pay_big5[20]>0)){ ?>
<td class="mlotto<? if($_GET["tlot"]=="3fu"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lotto.php?tlot=3fu&vvw='+fw"><?=$lang_member[410];?></a></td>
          <td width="4"><!-- <img src="img/spacer.gif" width="2" height="32"> --></td>
          <? } ?>

          <? if(($lot_pay_big5[6]>0) or ($lot_pay_big5[7]>0)){ ?>
<td class="mlotto<? if($_GET["tlot"]=="run"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lotto.php?tlot=run&vvw='+fw"><?=$lang_member[412];?></a></td>
          <td width="4"><!-- <img src="img/spacer.gif" width="2" height="32"> --></td>
          <? } ?>
          <? if(($lot_pay_big5[21]>0) or ($lot_pay_big5[22]>0) or ($lot_pay_big5[23]>0)){ ?>
<td class="mlotto<? if($_GET["tlot"]=="pug"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lotto.php?tlot=pug&vvw='+fw"><?=$lang_member[484]?></a></td>
          <td width="4"><!-- <img src="img/spacer.gif" width="2" height="32"> --></td>
          <? } ?>
          <? if(($lot_pay_big5[8]>0) or ($lot_pay_big5[9]>0) or ($lot_pay_big5[10]>0) or ($lot_pay_big5[11]>0) or ($lot_pay_big5[12]>0) or ($lot_pay_big5[13]>0) or ( $lot_pay_big5[14]>0) or ($lot_pay_big5[15]>0)){ ?>
<td class="mlotto<? if($_GET["tlot"]=="kk"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lotto.php?tlot=kk&vvw='+fw"><?=$lang_member[446];?></a></td>
<td width="4"><!-- <img src="img/spacer.gif" width="2" height="32"> --></td>
          <? } ?>

  
<td class="mlotto<? if($_GET["tlot"]=="pay"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lotto.php?tlot=pay&vvw='+fw"><?=$lang_member[580];?></a></td>
   <td width="4"><!-- <img src="img/spacer.gif" width="2" height="32"> --></td>
<td class="mlotto<? if($_GET["tlot"]=="full"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lotto.php?tlot=full&vvw='+fw"><?=$lang_member[414];?></a></td>
          <td width="4"><!-- <img src="img/spacer.gif" width="2" height="32"> --></td>
<td class="mlotto<? if($_GET["tlot"]=="list"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_lotto.php?tlot=list&vvw='+fw"><?=$lang_member[43];?></a></td>
          <td width="4"><!-- <img src="img/spacer.gif" width="2" height="32"> --></td>
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
#	include "lotto/2udt.php"; 
}else if($_GET["tlot"]=="2udt100"){
#  include "lotto/2udt100.php"; 
}else if($_GET["tlot"]=="3udt"){
#	include "lotto/3udt.php"; 
}else if($_GET["tlot"]=="run"){
	include "lotto/run.php"; 
}else if($_GET["tlot"]=="pug"){
	include "lotto/pug.php"; 
}else if($_GET["tlot"]=="kk"){
	include "lotto/kk.php"; 
}else if($_GET["tlot"]=="upfax"){
#	include "lotto/fax.php"; 
}else if($_GET["tlot"]=="full"){
	include "lotto/full.php"; 
}else if($_GET["tlot"]=="pay"){
	include "lotto/pay.php"; 
}else if($_GET["tlot"]=="list"){
	include "lotto/list.php"; 
}else if($_GET["tlot"]=="result"){
	include "lotto/result.php"; 
}else if($_GET["tlot"]=="home"){
	include "lotto/home.php"; 
}else if($_GET["tlot"]=="3ud100"){
	include "lotto/3ud_100.php"; 
}else if($_GET["tlot"]=="lottofalse"){
	include "lotto/lottofalse.php"; 
}else{
	include "lotto/3ud.php"; 
}

$_SESSION['cklock']=array();
	?>
  </div>
</div>

</body>
</html>