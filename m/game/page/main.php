<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<? if($_GET["cmd"]=="logout" || $_SESSION['m_user']==""){ 

$url_file="../../../json/online/m/".$_SESSION[mid].".json";
@unlink($url_file); // delete file 

@session_start(); 
@session_destroy();

@header('Location: ../index.php');
exit();
} 

require("../../../inc/conn.php"); 
require('../../../inc/function.php');
require("../../../lang/th.php");
require('games/function.php');



$url_file1="../../../json/lotto/ok/ok_1_1.json";	
$date_js=file_get_contents2($url_file1);
$date_bet = json_decode2($date_js, true);

$re_ok=$date_bet[0];


$ok_id=$re_ok[ok_id];
$o_limit_time=$re_ok[o_limit_time];
$o_limit_time_lang=$re_ok[o_limit_time_lang];
$ok_date=$re_ok[ok_date];

$token = md5(uniqid(rand(),1));
$_SESSION['bettoken']=$token;
$fo="../../../json/login/token_bet/$_SESSION[mid].php";
write($fo,'<? $bet_token="'.$token.'"; ?>',"w+"); 


################Config Admin
$url_file="../../../json/config/admin/LottoMaxReceive.json";	
$lot_js=file_get_contents2($url_file);
$hover = json_decode2($lot_js, true);


################Config Member
$url_file="../../../json/config/member/LottoConfig_".$_SESSION[mid].".json";	
$lot6_js=file_get_contents2($url_file);
$lot_m = json_decode2($lot6_js, true);


$type_games=1;
$mmin=@explode(',',$lot_m['m_min']); 
$mmax=@explode(',',$lot_m['m_max']); 
$maxmatch=@explode(',',$lot_m['m_max_match']); 


$_SESSION[mmin] = $mmin[$type_games];
$_SESSION[mmax] = $mmax[$type_games];
$_SESSION[mxmax] = $maxmatch[$type_games];

unset($_SESSION['hilo_ok']); 
unset($_SESSION['fish_ok']); 


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/logo.ico">

    <TITLE>::: OHOBET :::</TITLE>


    <link href="../dist/css/bootstrap.min.css?v=001" rel="stylesheet">
    <link href="../dist/css/theme.css?v=001" rel="stylesheet">
    <link href="../dist/css/font-awesome.min.css?v=001" rel="stylesheet" type="text/css" />
    <link href="../dist/css/main.css?v=001" rel="stylesheet">
    <link rel="stylesheet" href="../plugin/validate/dist/css/bootstrapValidator.css?v=001"/>
    <style type="text/css">
	.loader {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('../img/FhHRx.gif') 50% 50% no-repeat rgb(255,255,255); }
.disRed {
	background:red !important;
}
.txt_disabled {
	background:#eee !important;
}
input[type='tel'] {
	text-align:center;
}
#box_bet {
  z-index: 9999;
    position: fixed;
    bottom: 50px;
    background-color: #ffffff;
    width: 100%;
    height: 100px;
    box-shadow: blue 0px -3px 3px;
}
	</style>  
    <script src="../dist/js/jquery.min.js?v=001"></script>
    <script src="../dist/js/bootstrap.js?v=001"></script>
	<script type="text/javascript" src="../plugin/validate/dist/js/bootstrapValidator.js?v=001"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			var bodyHeight = $("body").height();
			var vwptHeight = $(window).height();
				if (vwptHeight > bodyHeight) {
					$("footer#colophon").css("position","fixed").css("bottom",0);
				}
				else if (vwptHeight < bodyHeight) {
					$("footer#colophon").css("position","fixed").css("bottom",0);
				}
		});
	</script>
    
<script type="text/javascript">
$(window).load(function() {
	$(".loader").fadeOut("slow");
})

 $(document).ready(function() {

 	$("#token").load('token.php');
   var refreshId = setInterval(function() {
 	 $("#token").load('token.php?randval='+ Math.random());
   }, 10000);
   $.ajaxSetup({ cache: false });
     });  	 

</script>
<?php /*?><script>
	$(document).ready(function(){
    // to fade in on page load
    $("body").css("display", "none");
    $("body").fadeToggle( "slow", "linear" );
    // to fade out before redirect

})
</script><?php */?>
<!--.delay("fast").fadeIn();
.show( "slow" );-->

<script type="text/javaScript">
//เติม , (คอมมา)
function dokeyup( obj )
{
  var key = event.keyCode;
  if( key != 37 & key != 39 & key != 110 )
  {
    var value = obj.value;
    var svals = value.split( "." ); //แยกทศนิยมออก
    var sval = svals[0]; //ตัวเลขจำนวนเต็ม
  
    var n = 0;
    var result = "";
    var c = "";
    for ( a = sval.length - 1; a >= 0 ; a-- )
    {
      c = sval.charAt(a);
      if ( c != ',' )
      {
        n++;
        if ( n == 4 )
        {
          result = "," + result;
          n = 1;
        };
        result = c + result;
      };
    };
  
    if ( svals[1] )
    {
      result = result + '.' + svals[1];
    };
  
    obj.value = result;
  };
};

//ให้ text รับค่าเป็นตัวเลขอย่างเดียว
function checknumber()
{
  key = event.keyCode;
  if (  key < 48 || key > 57  )
  {
    event.returnValue = false;
  };
  if (  key == 42  )
  {
    event.returnValue = true;
  };
};
</script>
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
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
   $("#box_bet").load('games/bacarat/cion_bet.php',{"ok":val});
   $("#box_bet").show();
   $("#congame").css("margin-bottom" , "150px");
  }
  }
function _bet2(val,ty){
  var ck=  $( "#bet_time2" ).html();
  if(isInt(ck)==true){
    $("#box_bet").load('games/hilo/cion_bet.php',{"ok":val,"ty":ty});
    $("#box_bet").show();
   $("#congame").css("margin-bottom" , "150px");
  }
  }
function _bet3(val){
  var ck=  $( "#bet_time3" ).html();
  if(isInt(ck)==true){
   $("#box_bet").load('games/fish/cion_bet.php',{"ok":val});
   $("#box_bet").show();
   $("#congame").css("margin-bottom" , "150px");
  }
  }
function _bet4(val){
  var ck=  $( "#bet_time4" ).html();
    if(isInt(ck)==true){
   $("#box_bet").load('games/2hit/cion_bet.php',{"ok":val});
   $("#box_bet").show();
   $("#congame").css("margin-bottom" , "150px");
  }
  }
function _bet5(val){
  var ck=  $( "#bet_time5" ).html();
    if(isInt(ck)==true){
   $("#box_bet").load('games/dragon/cion_bet.php',{"ok":val});
   $("#box_bet").show();
   $("#congame").css("margin-bottom" , "150px");
  }
  }
  
  function isInt(value) {
  return !isNaN(value) && (function(x) { return (x | 0) === x; })(parseFloat(value))
}
  
 $(document).ready(function() {



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
    //parent.leftx.gameslistmini2();
  }


  
  $("#view_count1").load('games/bacarat/bet_count.php');
  $("#view_count2").load('games/hilo/bet_count.php');
  $("#view_count3").load('games/fish/bet_count.php');
  $("#view_count4").load('games/2hit/bet_count.php');
  $("#view_count5").load('games/dragon/bet_count.php');
  
   }, 1000);
   $.ajaxSetup({ cache: false });
   

   
   

});

function _vvxx1(){
    $( "#box_bet" ).html("");
    $( "#box_bet" ).hide();
    $("#congame").css("margin-bottom" , "50px");
    $("#statussave").load("games/view_last.php");
    $('#lot3success').modal('show');
  /* $(document).ready(function() {
      
     });*/
  }
  
//_vvxx1();

function gameslistmini(vt){
    $( "#box_bet" ).html("");
    $( "#box_bet" ).hide();
    if(vt==1){
      $.post( "games/hilo/clear_ok.php", function( data ) {
    //$( ".result" ).html( data );
  });
    }else if(vt==2){
  $.post( "games/fish/clear_ok.php", function( data ) {
    //$( ".result" ).html( data );
  });
    }
    $("#congame").css("margin-bottom" , "50px");
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
  
  if(sumx><?=$_SESSION[mmax];?>){
    $( "#txt_bet" ).val(<?=$_SESSION[mmax];?>);
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
function _set(val){
  $( "#txt_bet" ).val( val );
}
function _betok1(){
  var sumx=TrimComma($( "#txt_bet" ).val());
  if(sumx >=<?=$_SESSION[mmin];?>){

  var type=$( "#typebet" ).val();
  $("#statussave").load('games/bacarat/save_ok.php',{"bet":sumx,"type":type});

  }

  }
function _betok2(){
  var sumx=TrimComma($( "#txt_bet" ).val());
  if(sumx >=<?=$_SESSION[mmin];?>){

  var type=$( "#typebet" ).val();
  $("#statussave").load('games/hilo/save_ok.php',{"bet":sumx,"type":type});

  
  }

  }
function _betok3(){
  var sumx=TrimComma($( "#txt_bet" ).val());

  if(sumx >=<?=$_SESSION[mmin];?>){

  var type=$( "#typebet" ).val();
  $("#statussave").load('games/fish/save_ok.php',{"bet":sumx,"type":type});

  }

  }
function _betok4(){
  var sumx=TrimComma($( "#txt_bet" ).val());
  if(sumx >=<?=$_SESSION[mmin];?>){

  var type=$( "#typebet" ).val();
  $("#statussave").load('games/2hit/save_ok.php',{"bet":sumx,"type":type});

  }

  }
function _betok5(){
  var sumx=TrimComma($( "#txt_bet" ).val());
  if(sumx >=<?=$_SESSION[mmin];?>){

  var type=$( "#typebet" ).val();
  $("#statussave").load('games/dragon/save_ok.php',{"bet":sumx,"type":type});

  }

  }
</script>
  </head>

<body style="background-color:#EFEFEF">
  <div class="loader"></div>
<? 

#$profile = sql_array("SELECT * FROM bom_tb_member WHERE m_id	= '$_SESSION[mid]'"); 

#$rs_date=sql_array("select * from bom_tb_lotto_ok where lot_zone = 1 group by ok_date order by o_limit_time desc limit 1");
#$sql="select sum(b_total) as btotal from bom_tb_football_bill where m_id='$_SESSION[mid]'  and b_status=5";
#$reb1=sql_array($sql);
#$sql="select sum(b_total) as btotal from bom_tb_lotto_bill where m_id='$_SESSION[mid]'  and b_status=5";
#$reb2=sql_array($sql);


if($re_ok[o_limit_time]<$time_stam){ 
	$profile["user_stab"] = 0;
}else{
	$profile["user_stab"] = 1;
	$dat_s = date("d-m-Y H:i:s" , $rs_date["o_limit_time"]);
	if($re_ok[o_limit_time_lang]<$time_stam){ 
		$profile["user_stabdown"] = 0;
	}else{
		$profile["user_stabdown"] = 1;
	}
}
?>

    <nav>
        <ul class="list-unstyled main-menu">
          
          <!--Include your navigation here-->
          
          <li class="text-right"><a href="#" id="nav-close"><i class="fa fa-list white"></i></a></li>
          <li>
          <center><span class="thaisan" style="color: #fff"><strong>ข้อมูลส่วนตัว</strong></span></center>
          <span class="thaisan" style="color: #fff">เครดิตคงเหลือ</span><span class="thaisan" style="float:right; color:#0099FF"><?=number_format($_SESSION['mcount'],2);?> บาท</span><br>
          <span class="thaisan" style="color: #fff">รายการเล่นค้าง</span><span class="thaisan" style="float:right; color:#FF0000"><?=number_format($_SESSION['mnot'],2);?> บาท</span><br>
          <span class="thaisan" style="color: #fff">เครดิตที่ได้รับ</span><span class="thaisan" style="float:right; color:#66CC00"><?=number_format($_SESSION['mcredit']);?> บาท</span><br>
          
          </li>
          <li class="thaisan"><a href="main.php?cmd=news">ข่าวสาร <span class="icon"></span></a></li>
          <li class="thaisan"><a href="main.php?cmd=changepsw">เปลี่ยนรหัสผ่าน <span class="icon"></span></a></li>

          <li class="thaisan"><a href="main.php?cmd=logout">ออกจากระบบ <span class="glyphicon glyphicon-log-out"></span></a></li>
        </ul>
      </nav>
          
    <div class="navbar navbar-inverse navbar-fixed-top" style="background-color:goldenrod;">      
        
        <!--Include your brand here-->
       
        <a class="navbar-brand" href="main.php"><span style="background-color:#333333;-kit-border-radius: 100px;
-moz-border-radius: 100px; border-radius: 100px; padding:5px; border:2px dotted #FFF"><i class="fa fa-home fa-lg" style="color: #fff"></i></span></a>
		<center><span class="thaisan" style="color: #6A4806; font-size:32px"><strong><?=$_SESSION['m_user'];?></strong>&nbsp;&nbsp;&nbsp;&nbsp;</span></center>

        <div class="navbar-header pull-right">
          <a id="nav-expander" class="nav-expander fixed">
            &nbsp;<i class="fa fa-list fa-lg white"></i>
          </a>
        </div>
    </div>



<div class="container-fluid" style="margin-top:50px; color: #fff; margin-bottom:50px;<? if($_GET["cmd"]=="playlist" || $_GET["cmd"]=="result"){ ?> padding:0px 2px;<? } ?>" id="congame">
     
<? if($_GET["cmd"]=="" || $_GET["cmd"]=="main"){ ?>
<div class="row">
<style>
  .bg_games {
    background-image: linear-gradient(top, #d9a52e, #8b691c);
    background-image: -moz-linear-gradient(top, #d9a52e, #8b691c);
    background-image: -webkit-linear-gradient(top, #d9a52e, #8b691c);
    background-image: -o-linear-gradient(top, #d9a52e, #8b691c);
    background-image: -ms-linear-gradient(top, #d9a52e, #8b691c);
  }
</style>

<div class="modal fade" id="lot3success" tabindex="-1" role="dialog" aria-labelledby="lot3successLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="max-height:80vh; overflow-y:scroll;">
    <div class="modal-content">
      <div class="modal-header" style="background-color:goldenrod">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title thaisan" id="lot3successLabel">บันทึกเสร็จสิ้น</h4>
      </div>
      <div class="modal-body" style="color:#333333">
          <div class="row" id="statussave">
          
          </div>
      </div>
    </div>
  </div>
</div>
            
<div class="panel panel-default bg_games" style="margin-bottom:0px; border-radius:0px; margin-top: 2px;">          
	<div class="panel-body">
  <? include "games/2hit.php"; ?>
       </div>
  </div>          
<div class="panel panel-default bg_games" style="margin-bottom:0px; border-radius:0px;">              
  <div class="panel-body">
      <? include "games/dragon.php"; ?>
  </div>
</div>
<div class="panel panel-default bg_games" style="margin-bottom:0px; border-radius:0px;">              
  <div class="panel-body">
      <? include "games/bacarat.php"; ?>
  </div>
</div>
<div class="panel panel-default bg_games" style="margin-bottom:0px; border-radius:0px;">              
  <div class="panel-body">
      <? include "games/hilo.php"; ?>
  </div>
</div>      
<div class="panel panel-default bg_games" style="margin-bottom:0px; border-radius:0px;">              
  <div class="panel-body">
      <? include "games/fish.php"; ?>
  </div>
</div>     
                    
</div>
</div>
<? }elseif($_GET["cmd"]=="fullnumber"){ ?>
<? require("../page/fullnumber.php"); ?> 
<? }elseif($_GET["cmd"]=="pay"){ ?>
<? require("../page/pay.php"); ?> 
<? }elseif($_GET["cmd"]=="changepsw"){ ?>
<? require("../page/changepsw.php"); ?>   
<? }elseif($_GET["cmd"]=="news"){ ?>
<? require("../page/news.php"); ?>       
<? }elseif($_GET["cmd"]=="lot2"){ ?>
	<? if($profile["user_stab"]=="1"){?>
		<? require("../page/lot2.php"); ?> 
    <? }else{ ?>
    	<h1 class="thaisan" style="color:#FF0000; margin-top:150px" align="center"><i class="fa fa-thumbs-down"></i><br>ปิดรับแทงแล้ว</h1>
    <? } ?>    
<? }elseif($_GET["cmd"]=="lot3f"){ ?>
	<? if($profile["user_stab"]=="1"){?>
    <? if(($lot_pay_big5[16]>0) or ( $lot_pay_big5[17]>0) or ($lot_pay_big5[18]>0) or ($lot_pay_big5[19]>0) or ($lot_pay_big5[20]>0)){ ?>
		<? require("lot3f.php"); ?> 
        <? }else{ ?>
        <h1 class="thaisan" style="color:#FF0000; margin-top:150px" align="center"><i class="fa fa-ban"></i><br>ปิด</h1>
        <? } ?>
    <? }else{ ?>
    	<h1 class="thaisan" style="color:#FF0000; margin-top:150px" align="center"><i class="fa fa-thumbs-down"></i><br>ปิดรับแทงแล้ว</h1>
    <? } ?>  
<? }elseif($_GET["cmd"]=="lot3"){ ?>
	<? if($profile["user_stab"]=="1"){?>
		<? require("lot3.php"); ?>  
    <? }else{ ?>
    	<h1 class="thaisan" style="color:#FF0000; margin-top:150px" align="center"><i class="fa fa-thumbs-down"></i><br>ปิดรับแทงแล้ว</h1>
    <? } ?>  
<? }elseif($_GET["cmd"]=="lotex"){ ?>
	<? if($profile["user_stab"]=="1"){?>
		<? require("lotex.php"); ?>  
    <? }else{ ?>
    	<h1 class="thaisan" style="color:#FF0000; margin-top:150px" align="center"><i class="fa fa-thumbs-down"></i><br>ปิดรับแทงแล้ว</h1>
    <? } ?>  
<? }elseif($_GET["cmd"]=="playlist"){ ?>
<? require("../page/playlist.php"); ?> 
<? }elseif($_GET["cmd"]=="result"){ ?>
<? require("../page/result.php"); ?> 
<? } ?>

</div> <!-- /container -->
    
    
<div id="box_bet" style="display:none;">



</div>


  	<footer id="colophon" style="z-index:9999">

        	<a href="main.php" style="cursor:pointer; color: #fff"><div class="col-xs-4" style="font-size:10px; border-right:1px solid #999999"><span style="font-size:25px; font-weight:bolder; font-family:Verdana, Arial, Helvetica, sans-serif;-kit-border-radius: 100px;
-moz-border-radius: 100px; border-radius: 100px; padding-left:6px; padding-right:6px; border:2px dotted #FFF">T</span><br>
หน้าแทง</div></a>
<a href="main.php?cmd=playlist" style="cursor:pointer; color: #fff"><div class="col-xs-4" style="font-size:10px;border-right:1px solid #999999"><i class="fa fa-print fa-3x" style="margin-top:5px"></i><br>
รายการ</div></a>
            <a href="main.php?cmd=result" style="cursor:pointer; color: #fff"><div class="col-xs-4" style="font-size:10px; "><i class="fa fa-star fa-3x" style="margin-top:5px"></i><br>
ผลรางวัล</div></a>
	</footer> 
    
    
    
        <script>
    $(document).ready(function(){												
       
       //Navigation Menu Slider
        $('#nav-expander').on('click',function(e){
      		e.preventDefault();
      		$('body').toggleClass('nav-expanded');
      	});
      	$('#nav-close').on('click',function(e){
      		e.preventDefault();
      		$('body').removeClass('nav-expanded');
      	});
      	
      	
      	// Initialize navgoco with default options
        $(".main-menu").navgoco({
            caret: '<span class="caret"></span>',
            accordion: false,
            openClass: 'open',
            save: true,
            cookie: {
                name: 'navgoco',
                expires: false,
                path: '/'
            },
            slide: {
                duration: 300,
                easing: 'swing'
            }
        });
  
        	
      });
      </script>
          <span id="token"></span>
    </body>
</html>
