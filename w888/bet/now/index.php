<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
require('../inc/function.php');

if($_GET[p]=="logout"){
		@session_start(); 
		@session_destroy();
		@header('Location: login.php');
		exit();
}
if($_SESSION[admin]==""){@header('Location: login.php');exit();}
$view_date = _bdate();
#$sql="delete from pha_tb_ball_list_live where  b_date!='$view_date'   ";
#sql_query($sql);

#$rob = _rob();
#
httpGet($hostserver."now/save.php");
live_write("/");	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Live</title>
<style>
body{
	font-size:14px;
	}
.codebb{
	 font-weight:bold; background:#000; color:#FFF;
	}
.hdcgoal{
		 font-weight:bold; color:#F00;
		 }
 .cu{ 
 cursor:pointer;
 }
.bred{
	 border-bottom:5px #F00 solid;
 }
.txt_none {
	width:95%;
	outline:none;
	border:none;
	background:none;
	font-size: 12px;
}
.acenter {
	text-align:center;
}
.aright {
	text-align:right;
}
#tmtoday{
	position:absolute;
	margin-left:10px;
	margin-top:5px;
	color:#FFF;
	}
a{
	text-decoration:none;
	}
	a:hover{
		text-decoration:underline;
		}
.cr{ color:#F00;}
.bb{ font-weight:bold;}
.b10{ font-size:10px;}
table{border-collapse:collapse;}

.ball td{border:1px  solid #262929; height:25px;	 font-family: Tahoma, Geneva, Arial, Helvetica, sans-serif;}
.ball tr:hover td,.ball tr:hover th{

border-top:2px #ec0000 dotted;
border-bottom:2px #ec0000 dotted;
border-left:2px #ec0000 dotted;
border-right:2px #ec0000 dotted;
}
#view_alert{
width:100%;
border:1px red solid;
background-color:red;
height:60px;
overflow:hidden;
position:fixed;
bottom:0;
left:0;
z-index:5;
display:block;
}
</style>
<script src="<?=$hostserver;?>js/jquery-1.9.1.js"></script>
<link href="<?=$hostserver;?>css/main2.css" rel="stylesheet" type="text/css">
<script>

function _w(url){
	window.location=url;
	}
	
function _wc(txt,url){
var rc = confirm(txt);
if (rc == true) {
	window.location=url;
}
}
	
	
function _o(url){
	window.open(url);
	}
	
	
	

 $(document).ready(function() {
/*
$("#token").load('save.php');
   var refreshId = setInterval(function() {
 $("#token").load('save.php?randval='+ Math.random());
   }, 15000);
   $.ajaxSetup({ cache: false });
   */
  }); 
   

$("document").ready(function(){
	Reft();
//    $(".xxt").css("background" , "url('images/sbg.gif')");
});



    var h1;
	var h2;
	var h3;
	var h4;
	var hh1=200;
	var hh2=200;
	var tt = -15;



	
function ShowBetListStep(Nt){
	Nt2=Nt;
	if(Nt2.length>0){
		send_today();
		$("#nbt").val("1");
	}else{
		$("#nbt").val("0");
		$("#datatoday").html("");
	}
}
function send_today(){
	var url;
	url = "ball_today_single.php";	
	$.post( url , { 'ball[]': Nt2 , 't': "today" , 'p':'<?=$_GET["p"]?>'})
	  .done(function( data ) {
		$("#datatoday").html(data);
		tmtodaycount();
  }).fail(function() {
    send_today();
  });
}
function Reft(){

view_alert();
	//$("#datatoday").html("<img src='http://www.laosoccerlottery.com/img/ajax-loader.gif' style='opacity:1; margin:50px auto; display:block;' id='loding-f'>");
	RefreshToday.location="step.php?t="+Math.random();
	document.getElementById('tmtoday').innerHTML = 15;
	myStopFunction(2)
	//console.log("bomload" ); // John
}

function RefreshDifToday(){}

var c_percen_hdc = 1;
var c_percen_goal = 1;
var c_hdc = 1;
var c_goal = 1;
var c_price_hdc = 1;
var c_price_goal = 1;
var c_price_hdc2 = 1;
var c_price_goal2 = 1;
var c_smax = 1;
var c_s002 = 1;
var c_snew = 1;

function numberonly(event,el,ty_txt,ths,id,per,pold){
	var e=window.event?window.event:event;
	var keyCode=e.keyCode?e.keyCode:e.which?e.which:e.charCode;   			
	
	//console.log(keyCode);
	
	//alert(keyCode);
	     
	//0-9 (numpad,keyboard)
	if(ty_txt=="%"){
		if(c_percen_hdc==1){
			$(el).val("");
			c_percen_hdc=0;
		}
	}else if(ty_txt=="%%"){
		if(c_percen_goal==1){
			$(el).val("");
			c_percen_goal=0;
		}
	}else if(ty_txt=="hdc"){
		if(c_hdc==1){
			$(el).val("");
			c_hdc=0;
		}
	}else if(ty_txt=="goal"){
		if(c_goal==1){
			$(el).val("");
			c_goal=0;
		}
	}else if(ty_txt=="price1"){
		if(c_price_hdc==1){
			$(el).val("");
			c_price_hdc=0;
		}
	}else if(ty_txt=="price3"){
		if(c_price_hdc2==1){
			$(el).val("");
			c_price_hdc2=0;
		}
	}else if(ty_txt=="price4"){
		if(c_price_goal2==1){
			$(el).val("");
			c_price_goal2=0;
		}
	}else if(ty_txt=="price2"){
		if(c_price_goal==1){
			$(el).val("");
			c_price_goal=0;
		}
	}else if(ty_txt=="smax"){
		if(c_smax==1){
			$(el).val("");
			c_smax=0;
		}
	}else if(ty_txt=="s002"){
		if(c_s002==1){
			$(el).val("");
			c_s002=0;
		}
	}else if(ty_txt=="snew"){
		if(c_snew==1){
			$(el).val("");
			c_snew=0;
		}
	}
	
	if(keyCode==13){ 
		if(ty_txt=="goal"){
			set_goal(ths,$(el).val(),id,pold);
			c_goal=1;
		}else if(ty_txt=="%"){
			set_percen_hdc(ths,$(el).val(),id,pold);
			c_percen_hdc=1;
					}else if(ty_txt=="%%"){
			set_percen_goal(ths,$(el).val(),id,pold);
			c_percen_goal=1;
		}else if(ty_txt=="hdc"){
			set_hdc(ths,$(el).val(),id,pold);
			c_hdc=1;
		}else if(ty_txt=="price1"){
			set_price_hdc(ths,$(el).val(),id,per,pold);
			c_price_hdc=1;
		}else if(ty_txt=="price3"){
			set_price_hdc2(ths,$(el).val(),id,per,pold);
			c_price_hdc2=1;
		}else if(ty_txt=="price4"){
			set_price_goal2(ths,$(el).val(),id,per,pold);
			c_price_goal2=1;
		}else if(ty_txt=="price2"){
			set_price_goal(ths,$(el).val(),id,per,pold);
			c_price_goal=1;
		}else if(ty_txt=="smax"){
			set_max(ths,TrimComma($(el).val()),id,per,pold);
			c_smax=1;
		}else if(ty_txt=="s002"){
			set_002(ths,TrimComma($(el).val()),id,per,pold);
			c_s002=1;
		}else if(ty_txt=="snew"){
			set_new(ths,TrimComma($(el).val()),id,per,pold);
			c_snew=1;
		}
	}
	if(ty_txt!="hdc"){
		if ((keyCode>=96 && keyCode<=105)||(keyCode>=48 && keyCode<=57)||keyCode==110||keyCode==109||keyCode==190){ return true; }
		//backspace,delete,left,right,home,end
		if (',8,46,37,39,36,35,'.indexOf(','+keyCode+',')!=-1){ return true; }          
		return false;
	}
}






function set_percen_hdc(add , val , id , pold){
	$.post("ajax/set_percen_hdc.php" , { 'add': add , 'val': val , "id" : id, "old" : pold },
		function(data){
			//save success;
	});	
}
function set_percen_goal(add , val , id, pold){
	$.post("ajax/set_percen_goal.php" , { 'add': add , 'val': val , "id" : id, "old" : pold },
		function(data){
			//save success;
	});	
}
function set_hdc(add , val , id, pold){
	$.post("ajax/set_hdc.php" , { 'add': add , 'val': val , "id" : id, "old" : pold },
		function(data){
			//save success;
	});	
}
function set_goal(add , val , id, pold){
	$.post("ajax/set_goal.php" , { 'add': add , 'val': val , "id" : id , "old" : pold},
		function(data){
			//save success;
	});	
}

function set_price_hdc(add , val , id, per, pold){
	$.post("ajax/set_price_hdc.php" , { 'add': add , 'val': val , "id" : id , "per" : per, "old" : pold},
		function(data){
			//save success;
	});	
}
function set_price_hdc2(add , val , id, per, pold){
	$.post("ajax/set_price_hdc2.php" , { 'add': add , 'val': val , "id" : id , "per" : per, "old" : pold},
		function(data){
			//save success;
	});	
}

function set_price_goal(add , val , id, per, pold){
	$.post("ajax/set_price_goal.php" , { 'add': add , 'val': val , "id" : id, "per" : per, "old" : pold },
		function(data){
			//save success;
	});	
}

function set_price_goal2(add , val , id, per, pold){
	$.post("ajax/set_price_goal2.php" , { 'add': add , 'val': val , "id" : id, "per" : per, "old" : pold },
		function(data){
			//save success;
	});	
}

function set_max(add , val , id, per, pold){
	$.post("ajax/set_max.php" , { 'add': add , 'val': val , "id" : id, "per" : per, "old" : pold },
		function(data){
			//save success;
	});	
}
function set_002(add , val , id, per, pold){
	$.post("ajax/set_002.php" , { 'add': add , 'val': val , "id" : id, "per" : per, "old" : pold },
		function(data){
			//save success;
	});	
}
function set_new(add , val , id, per, pold){
	$.post("ajax/set_new.php" , { 'add': add , 'val': val , "id" : id, "per" : per, "old" : pold },
		function(data){
			//save success;
	});	
}

function set_active(val,acc,add){
	$.post("ajax/set_active.php" , {'val': val, 'acc': acc, 'add': add },
		function(data){

			$("#active_check"+acc+add).html(data);
	});	
}

function _view(type , id , add,name1,name2){
	if(type==1 || type==2){
	var url_set="ajax/view_hdc.php";
	}else if(type==3){
		var url_set="ajax/view_hdc.php";
		}else if(type==4){
		var url_set="ajax/view_score_hdc.php";
			}else if(type==11 || type==12){
					var url_set="ajax/view_goal.php";
					}else if(type==13){
							var url_set="ajax/view_goal.php";
						}else if(type==14){
		                        	var url_set="ajax/view_score_goal.php";
		}
	
	$.post(  url_set , { 'url_set': type , 'id': id , "add" : add, 'name1':name1,'name2':name2 },
		function(data){
			//save success;
			$("#a_view").html(data);
	});	
}

/** SHOW ALERT **/


function view_alert(){
	
	var url_set ="alert/5_status.php";
	var url_show ="alert/view_status.php";
	
	
	$.post(  url_set , { 'url_set': 1 },
		function(data){
			//save success;
			
			if(data=="1"){
            //$("#view_alert").html("yes");
            $.post(  url_show , { 'url_show': 1 },
                    function(data2){
                                     
                                  $("#view_alert").html(data2).show();;         
			
                                });	
			}else{
			
            $("#view_alert").hide();
			
			}
	});	
}

/** END SHOW ALERT **/


function _cc(){
		$("#a_view").html("");
	}
	
	
	function _hit(id , add,zone,val){
 	var url_set="ajax/set_hit.php";
			$.post(  url_set , {  'id': id , "add" : add, "zone" : zone , "val" : val },
		function(data){
			//save success;
	});	
		}
function csetfocus(v,e){
	$(v).val(addCommas(TrimComma($(v).val())));
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
</head>
<body>
<? #print_r($_SESSION[hit]);?>

<?
/*
function _wp20($bet1,$per){
	if($bet1<=2){
		$xx=$bet1-1;
		}else{
		$xx=$bet1-3;	
			}
		return $xx;
}

function _wp2($bet1,$per){
	$p1=$per/100;
	################ สีแดง
	if($bet1<(0.00)){
		$x9=(-$bet1)-$p1;
		}else{
			############## สีดำ
			$x1=$bet1+$p1;
			if($x1>(1.00)){
			$x3=($x1-1.00);
			$x9=(1.00-$x3);
				}else{
			$x3=-($bet1+$p1);	
			 if($x3>(-1)){
				 $x9=$x3;
				 }else{
				 $x9=(-$x3);	 
					 }
					 
					}
			
		}
			return $x9;
}




$val=1.83;
$per=8;
$val20= number_format(_wp20( $val , $per ),2);
$val30= number_format(_wp2( $val20 , $per ),2);

echo $sql="update pha_tb_ball_list_live set   b_hdc_1='$val20' ,  b_hdc_2='$val30'  where b_id='$id' and b_add='$add'";
*/
?>
<div>
[ <a href="index.php">Home</a> ]
&nbsp;&nbsp;[ <a href="hit.php">Hit</a> ]
&nbsp;&nbsp;[ <a href="index.php?p=config">Config</a> ]
&nbsp;&nbsp;[ <a href="viewer/view.php?zday=<?php echo date("Y-m-d");?>" target="_blank">View Change</a> ]
&nbsp;&nbsp;[ <a href="stock.php?zday=<?php echo date("Y-m-d");?>" target="_blank">Stock</a> ]
&nbsp;&nbsp;[ <a href="index.php?p=logout">Logout</a> ]
<!--<input type="button" value="Home" style="padding:5px 10px; margin:0px 10px" onClick="_w('index.php');">
<input type="button" value="Config" style="padding:5px 10px; margin:0px 10px" onClick="_w('?p=config');"> -->
<div>
<? if($_GET[p]=="config"){?>
<?
if(isset($_POST[b_up])){
	$_POST[tmax]=intval(str_replace(",","",trim($_POST[tmax])));
	$_POST[t002]=intval(str_replace(",","",trim($_POST[t002])));
	$_POST[tnew]=intval($_POST[tnew]);
	
	$sql="update pha_tb_config set  live_max='$_POST[tmax]',  live_price='$_POST[t002]',  live_hdc='$_POST[tnew]' where con_id=1";
	sql_query($sql);
	
	$sql="update pha_tb_ball_list_live set  set_max='$_POST[tmax]',  set_002='$_POST[t002]',  set_new='$_POST[tnew]' where 1";
	sql_query($sql);
#	$sql="update pha_tb_ball_list_live set   auto_price='$_POST[t002]' where 1";
#	sql_query($sql);
httpGet($hostserver."now/save.php");
live_write("/");
	}
	
	
$sql="select live_max,live_price,live_hdc from pha_tb_config where con_id=1";
$re=sql_array($sql);
?>
<form action="" method="post">
<table width="30%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="30%" align="center">Max</td>
    <td width="70%">
      <input name="tmax" type="text" id="tmax" value="<?=number_format($re[live_max]);?>"></td>
  </tr>
  <tr>
    <td align="center">Set 0.02</td>
    <td><input name="t002" type="text" id="t002" value="<?=number_format($re[live_price]);?>"></td>
  </tr>
  <tr>
    <td align="center">Set New ແຕ້ມຕໍ່</td>
    <td><input name="tnew" type="text" id="tnew" value="<?=$re[live_hdc];?>" size="10" maxlength="3">
      %</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td><input type="submit" name="b_up" id="b_up" value="Reset"></td>
    </tr>
</table>

</form>
</div>
<? }?>
</div>

<div id="view_alert">Alert</div>
<div id="a_view"></div>
<div id="in_top">

<b id="tmtoday">15</b>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:none !important; padding:0px !important;">
  <tr style="border:none !important; padding:0px !important;">
    <td width="100%" style="border:none !important; padding:0px !important;"><div id="datatoday"></div></td>
  </tr>
</table>

<input name="nbt" id="nbt" type="hidden" value="1">
<iframe name="RefreshToday" id="RefreshToday" src="" style="display: none;"></iframe>
<iframe name="DifToday" id="DifToday" src="" style="display: none;"></iframe>
<script src="time_count.js?nocache=<?=date("Y-m-d H:i:s")?>"></script> 
<span id="token"></span>
</div>
</body>
</html>