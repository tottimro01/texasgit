<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php       
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);      


require('inc/conn.php');
require('inc/function.php');
require("lang/variable_lang.php");
// require("lang/member_lang.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Pragma" content="no-cache" />
<title>OHObet</title>
<? if($_SESSION['lang']=="mm"){?><link rel="stylesheet" type="text/css" href="css/style_mm.css?v=2019"><? }?>
<script src="jsui/external/jquery/jquery.js?v=2019"></script>

<script>

var step_ball=[];
$("document").ready(function(){
	Refs();
});

function Refs(){
//	$("#datatodaystep").html("<img src='<?=$hostserver;?>img/ajax-loader.gif' style='opacity:1; margin:50px auto; display:block;' id='loding-s'>");
	RefreshStep.location="data/football_step.php?t="+Math.random();
}



function ShowBetListStep(Ns){
	Ns2=Ns;
	if(Ns2.length>0){
		send_step();
		$("#nbs").val("1");
	}else{
		$("#nbs").val("0");
		$("#datatodaystep").html("");
	}
}


function send_step(){
	var url;
	url = "inc/ball_step_fullTime_print.php";	
	$.post( url , { 'ball[]': Ns2 , 't': "step" , 'rob': "<?=$_GET['rob'];?>" , 'tprice': "<?=$_GET['view'];?>"})
	  .done(function( data ) {
		$("#datatodaystep").html(data);
		for(var po=0;po<step_ball.length;po++){
					//alert("dd")
					if(step_ball[po]!=null){
						var tid = step_ball[po][0];
						$(".tr"+tid).css("background" , "url(img/bgro.png)");
					}	
				}
  }).fail(function() {
    send_step();
  });
}

</script>
<style type="text/css">
body {
	font-size:12px;
	background:#FFF !important;
}

@media all
{
	.page-break	{ display:none; }
	.page-break-no{ display:none; }
}

@media screen
  {
.yes{ display:none;}
.ball{ font-size:12px;}
.r12{ font-size:12px;}
.tcr{ text-decoration:underline; color:#F00; }
.ball td{border: 1px dotted black;}
.bb{ font-weight:bold;}
.txt10{ font-size:12px; font-weight:100; }
table{border-collapse:collapse; }

  }
  
@media print
  {
.no{ display:none;}
.ball{ font-size:12px;}
.r12{ font-size:12px;}
.tcr{ text-decoration:underline; color:#000;}
.ball td{border: 1px solid black;}
.bb{ font-weight:bold;}
.txt10{ font-size:12px; font-weight:100; }
table{border-collapse:collapse; }
	.page-break	{ display:block;height:1px; page-break-before:always; }
	.page-break-no{ display:block;height:1px; page-break-after:avoid; }	
  }

</style>
</head>

<body>


<div align="center">
 <span class="yes"><? include("head_en.php");?></span>
<div >

<table width="750" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td width="57%" align="center">
 
    
<h3  class="h3_bt">
<?=$lang_member[755];?>  <?=$lang_member[146];?> <?=$_GET['d'];?> <?=$lang_member[643];?> <?=_rob();?> <?=$lang_member[303];?> <?=_r_t();?>
 </h3>
 </td>
    <td width="43%" align="right" class="no"><input type="button"  value="Print"  onclick="javascript:print();"/> 
</td>
  </tr>
</table>
</div>

<div id="datatodaystep">
    
  </div>


<iframe name="RefreshStep" id="RefreshToday" src="" style="display: none; "></iframe>
</div>

</body>
</html>