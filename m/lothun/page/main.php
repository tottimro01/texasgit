<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<? 
if($_GET["cmd"]=="logout" || $_SESSION['m_user']==""){ 

$url_file="../../../json/online/m/".$_SESSION[mid].".json";
@unlink($url_file); // delete file 

@session_start(); 
@session_destroy();

@header('Location: ../index.php');
exit();
} 

require("../../../inc/conn.php"); 
require('../../../inc/function.php');
require "../inc/data.php";

if(isset($_POST['lang']))
{
  setcookie( "Language", ''.$_POST['lang'].'', time()+31104000, "/");
  header("location: http://www.oho88.com/m/lothun/page/main.php");
}

$url_file1="../../../json/lotto_hun/ok.json";	
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
$url_file="../../../json/config/admin/Lotto_hunMaxReceive.json";	
$lot_js=file_get_contents2($url_file);
$hover = json_decode2($lot_js, true);


################Config Member
$url_file="../../../json/config/member/LottoConfig_".$_SESSION[mid].".json";	
$lot6_js=file_get_contents2($url_file);
$lot_m = json_decode2($lot6_js, true);



$lot_pay_big1=@explode(",",$lot_m['m_lotto_hun_pay_super']);
$lot_pay_big2=@explode(",",$lot_m['m_lotto_hun_pay_senior']);
$lot_pay_big3=@explode(",",$lot_m['m_lotto_hun_pay_master']);
$lot_pay_big4=@explode(",",$lot_m['m_lotto_hun_pay_agent']);
$lot_pay_big5=@explode(',',$lot_m['m_lotto_hun_pay_member']); 


if($_SESSION["lotset"]==""){
  $_SESSION["lotset"] = "x1";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/logo.ico">
   
    <TITLE><?=$app_title;?></TITLE>

<link rel="shortcut icon" href="../favicon.ico?v=000001" type="image/x-icon">
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
.tb_title_set {
    background-image: linear-gradient(top, #d92e37, #8b1c22);
    background-image: -moz-linear-gradient(top, #d92e37, #8b1c22);
    background-image: -webkit-linear-gradient(top, #d92e37, #8b1c22);
    background-image: -o-linear-gradient(top, #d92e37, #8b1c22);
    background-image: -ms-linear-gradient(top, #d92e37, #8b1c22);
    color: #fff;
    font-weight: bold;
    text-shadow: 1px 1px 1px #000;
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
<? if($_SESSION["lotset"]!="x1" and $_SESSION["lotset"]!="x1,x2,x3,x4,x5,x6,x7,x8,x9,x10" and $_SESSION["lotset"]!="x1,x2,x3,x4,x5,x6,x7,x8,x9,x10,x11,x12,x13,x14,x15,x16,x17,x18,x19,x20"){ ?>
//set_seti('','box');
  <? } ?>

  function set_seti(val,tp){

    if(tp=="all"){
            $.ajax({
              type: "POST",
              url: "../ajax/set_seti.php",
              data: { "val": val , "all": tp },
              timeout: 15000,
              cache: false, // Clear cache IE
              beforeSend: function(){
              },
              success: function(data){
                $("#box_seti").hide();
              }
          }); 
      }else if(tp=="box"){
        $.ajax({
        type: "POST",
        url: "../ajax/box_seti.php",
        data: { "val": val , "all": tp },
        timeout: 15000,
        cache: false, // Clear cache IE
        beforeSend: function(){
        },
        success: function(data){
          $("#box_seti").html(data);
          $("#box_seti").show();
        }
      }); 
    }else{
      $.ajax({
        type: "POST",
        url: "../ajax/set_seti.php",
        data: { "val": val , "all": tp },
        timeout: 15000,
        cache: false, // Clear cache IE
        beforeSend: function(){
        },
        success: function(data){
          if(data=="NO"){

            set_seti('','box');
          }
         $("#box_seti").show();
        }
      }); 
        
    }
  }
  function countdownComplete(){
      location.reload();
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

/*
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
}*/

$dw = date( "w", time());

if($re_ok[o_limit_time]<$time_stam || $dw==0 || $dw==6){ 
  $time_end = 0;
  $profile["user_stab"] = 0;
  }else{
    $rob_d = _rob_hun();
    if($rob_d==1){
        $time_start = strtotime(date("d-m-Y 06:00" , time()));
        $time_end = strtotime(date("d-m-Y 09:50" , time()));
        if(time()>=$time_start and time()<=$time_end){
          $time_end = $time_end;
          $profile["user_stab"] = 1;
          $profile["user_stabdown"] = 1;
        }else{
          $time_end = 0;
          $profile["user_stab"] = 0;
        }
    }else if($rob_d==2){
        $time_start = strtotime(date("d-m-Y 10:00" , time()));
        $time_end = strtotime(date("d-m-Y 12:26" , time()));
        if(time()>=$time_start and time()<=$time_end){
          $time_end = $time_end;
          $profile["user_stab"] = 1;
          $profile["user_stabdown"] = 1;
        }else{
          $time_end = 0;
          $profile["user_stab"] = 0;
        }
      }else if($rob_d==3){
        $time_start = strtotime(date("d-m-Y 12:30" , time()));
        $time_end = strtotime(date("d-m-Y 14:20" , time()));
        if(time()>=$time_start and time()<=$time_end){
          $time_end = $time_end;
          $profile["user_stab"] = 1;
          $profile["user_stabdown"] = 1;
        }else{
          $time_end = 0;
          $profile["user_stab"] = 0;
        }
        }else if($rob_d==4){
          $time_start = strtotime(date("d-m-Y 14:25" , time()));
        $time_end = strtotime(date("d-m-Y 16:29" , time()));
        if(time()>=$time_start and time()<=$time_end){
          $time_end = $time_end;
          $profile["user_stab"] = 1;
          $profile["user_stabdown"] = 1;
        }else{
          $time_end = 0;
          $profile["user_stab"] = 0;
        }
    }else{
      $time_end = 0;
      $profile["user_stab"] = 0;
    }
  }
?>

    <nav>
        <ul class="list-unstyled main-menu">
          
          <!--Include your navigation here-->
          
          <li class="text-right"><a href="#" id="nav-close"><i class="fa fa-list white"></i></a></li>
          <li>
          <center><span class="thaisan" style="color: #fff"><strong><?=$lang_member[2186];?></strong></span></center>
          <span class="thaisan" style="color: #fff"><?=$lang_member[95];?></span><span class="thaisan" style="float:right; color:#0099FF"><?=number_format($_SESSION['mcount'],2);?> <?=$lang_member[325];?></span><br>
          <span class="thaisan" style="color: #fff"><?=$lang_member[53];?></span><span class="thaisan" style="float:right; color:#FF0000"><?=number_format($_SESSION['mnot'],2);?> <?=$lang_member[325];?></span><br>
          <span class="thaisan" style="color: #fff"><?=$lang_member[97];?></span><span class="thaisan" style="float:right; color:#66CC00"><?=number_format($_SESSION['mcredit']);?> <?=$lang_member[325];?></span><br>
          
          </li>
          <li class="thaisan"><a href="main.php?cmd=pay"><?=$lang_member[580];?> <span class="icon"></span></a></li>
          <li class="thaisan"><a href="main.php?cmd=fullnumber"><?=$lang_member[414];?> <span class="icon"></span></a></li>
          <li class="thaisan"><a href="main.php"><?=$lang_member[2295];?> <span class="icon"></span></a></li>
          <li class="thaisan"><a href="main.php?cmd=news"><?=$lang_member[441];?> <span class="icon"></span></a></li>
          <li class="thaisan"><a href="main.php?cmd=changepsw"><?=$lang_member[45];?> <span class="icon"></span></a></li>

          <li class="thaisan"><a href="main.php?cmd=logout"><?=$lang_member[46];?> <span class="glyphicon glyphicon-log-out"></span></a></li>
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



<div class="container-fluid" style="margin-top:50px; color: #fff">
     
<? 
  if($_GET["cmd"]=="" || $_GET["cmd"]=="main"){ 
?>
<div class="row">

            
<div class="panel panel-default">
	<div class="panel-heading">
    	<h1 class="panel-title thaisan" align="center" style="font-size:32px; color:#000"><strong><?=$lang_member[2357];?></strong></h1>
    </div>
    
    <div class="form-group col-xs-12">
    	<select name="jumpMenu" id="jumpMenu" onChange="MM_jumpMenu('parent',this,0)" class="form-control thaisan" style="background-color:goldenrod;color: #6A4806; height:38px; font-size:15px; margin-top:15px">
        	<?
			$url_file9="../../../json/lotto_hun/date.json";		
			$d_bet=file_get_contents2($url_file9);
			$k_bet = json_decode2($d_bet, true);
			
			foreach($k_bet  as $date ){
			?>
            <option value="main.php?lotto_date=<?=$date;?>" <? if($_GET[lotto_date]==$date){ ?> selected <? } ?>><?=$date;?></option>
            <?
			}

			?>
     	</select>
  	</div>
    
    <?
	if($_GET["lotto_date"]==""){
	$sqlQuery = sql_array("select * from bom_tb_lotto_hun_ok where lot_zone = 1 group by ok_date order by o_limit_time desc"); 
	}elseif($_GET["lotto_date"]!=""){
	$sqlQuery = sql_array("select * from bom_tb_lotto_hun_ok where lot_zone = 1 and ok_date = '$_GET[lotto_date]' group by ok_date order by o_limit_time desc");
	}
	//$ex = explode("," , $sqlQuery["o_number"]);
      $lot_is=json_decode($sqlQuery["o_number"]);
	?>
                 
	<div class="panel-body">
        <div class="row">
        <? for($setr=4;$setr>=1;$setr--){ ?>
        <div class="col-xs-12">
          <table class="table" cellpadding="5" border="1" style="border:1px solid gold">
            <tr>
              <td colspan="8" style="background-color:goldenrod; color: #6A4806"><h3 class="panel-title thaisan" style="font-size:20px" align="center"><?=$lang_member[643];?><?=$lot_rob[$setr]?></h3></td>
            </tr>
            <tr>
            <td width="10%" style="background-color:#333333; color: #fff; border:1px solid gold; vertical-align: middle;" rowspan="2"><h3 class="panel-title thaisan" style="font-size:20px" align="center">SET</h3></td>
            <td width="45%" style="background-color:goldenrod; color: #6A4806; border:1px solid gold" colspan="4"><h3 class="panel-title thaisan" style="font-size:20px" align="center">MCOT Channel 9</h3></td>
              <td width="45%" style="background-color:goldenrod; color: #6A4806; border:1px solid gold" colspan="4"><h3 class="panel-title thaisan" style="font-size:20px" align="center">MONEY</h3></td>
            </tr>
            <tr>
            <td width="25%" style="background-color:goldenrod; color: #6A4806; border:1px solid gold" colspan="2"><h3 class="panel-title thaisan" style="font-size:20px" align="center"><?=$lang_member[448];?></h3></td>
              <td width="25%" style="background-color:goldenrod; color: #6A4806; border:1px solid gold" colspan="2"><h3 class="panel-title thaisan" style="font-size:20px" align="center"><?=$lang_member[450];?></h3></td>
              <td width="25%" style="background-color:goldenrod; color: #6A4806; border:1px solid gold" colspan="2"><h3 class="panel-title thaisan" style="font-size:20px" align="center"><?=$lang_member[448];?></h3></td>
              <td width="25%" style="background-color:goldenrod; color: #6A4806; border:1px solid gold" colspan="2"><h3 class="panel-title thaisan" style="font-size:20px" align="center"><?=$lang_member[450];?></h3></td>
            </tr>
            <? for($seti=1;$seti<=$lothun_set;$seti++){ 
                    $n1 = $lot_is->{"z1_r".$setr."_t2u".$seti."i"};
                    $n2 = $lot_is->{"z1_r".$setr."_t2d".$seti."i"};
                    $n3 = $lot_is->{"z2_r".$setr."_t2u".$seti."i"};
                    $n4 = $lot_is->{"z2_r".$setr."_t2d".$seti."i"};
                    if($n1!="" or $n2!="" or $n3!="" or $n4!=""){
              ?>

            <tr>
            <td width="10%" style="background-color:#333333; color: #fff; border:1px solid gold" align="center"><span class="label" style="font-size:20px"><?=$seti?>i</span></td>
            <td width="20%" style="background-color:#ffffff; color: green; border:1px solid gold" colspan="2" align="center"><span class="label label-success" style="font-size:20px"><?=(isset($n1)) ? $n1 : '';?></span></td>
              <td width="20%" style="background-color:#ffffff; color: red; border:1px solid gold" colspan="2" align="center"><span class="label label-danger" style="font-size:20px"><?=(isset($n2)) ? $n2 : '';?></span></td>
              <td width="20%" style="background-color:#ffffff; color: green; border:1px solid gold" colspan="2" align="center"><span class="label label-success" style="font-size:20px"><?=(isset($n3)) ? $n3 : '';?></span></td>
              <td width="20%" style="background-color:#ffffff; color: red; border:1px solid gold" colspan="2" align="center"><span class="label label-danger" style="font-size:20px"><?=(isset($n4)) ? $n4 : '';?></span></td>
            </tr>
            <? } } ?>
          </table>
          </div>
            <? } ?>
</div>
            
</div></div>                            

</div>
<? 
  }elseif($_GET["cmd"]=="fullnumber"){ 
    require("../page/fullnumber.php"); 
  }elseif($_GET["cmd"]=="pay"){ 
    require("../page/pay.php");
  }elseif($_GET["cmd"]=="changepsw"){
    require("../page/changepsw.php");
  }elseif($_GET["cmd"]=="news"){ 
    require("../page/news.php");
  }elseif($_GET["cmd"]=="lot2"){
    if($profile["user_stab"]=="1"){
      require("../page/lot2.php");
    }else{ 
?>
    	<h1 class="thaisan" style="color:#FF0000; margin-top:150px" align="center"><i class="fa fa-thumbs-down"></i><br><?=$lang_member[2200];?></h1>
<? } 
  }elseif($_GET["cmd"]=="lot3f"){
    if($profile["user_stab"]=="1"){
      if(($lot_pay_big5[16]>0) or ($lot_pay_big5[17]>0) or ($lot_pay_big5[18]>0) or ($lot_pay_big5[19]>0) or ($lot_pay_big5[20]>0)){
        require("lot3f.php"); 
      }else{ 
?>
        <h1 class="thaisan" style="color:#FF0000; margin-top:150px" align="center"><i class="fa fa-ban"></i><br><?=$lang_member[612];?></h1>
<?    } 
    }else{ 
?>
    	<h1 class="thaisan" style="color:#FF0000; margin-top:150px" align="center"><i class="fa fa-thumbs-down"></i><br><?=$lang_member[2200];?></h1>
<?  } 
  }elseif($_GET["cmd"]=="lot3"){
    if($profile["user_stab"]=="1"){
      require("lot3.php");
    }else{ 
?>
    	<h1 class="thaisan" style="color:#FF0000; margin-top:150px" align="center"><i class="fa fa-thumbs-down"></i><br><?=$lang_member[2200];?></h1>
<?  }
  }elseif($_GET["cmd"]=="lotex"){ 
    if($profile["user_stab"]=="1"){
      require("lotex.php");
    }else{ ?>
    	<h1 class="thaisan" style="color:#FF0000; margin-top:150px" align="center"><i class="fa fa-thumbs-down"></i><br><?=$lang_member[2200];?></h1>
<?  } 
  }elseif($_GET["cmd"]=="playlist"){ 
    require("../page/playlist.php");
  } 
?>
</div> <!-- /container -->
  	<footer id="colophon" style="z-index:9999">
            <a href="main.php?cmd=lot2" style="cursor:pointer; color: #fff"><div class="col-xs-4 thaisan" style="font-size:10px; border-right:1px solid #999999"><span style="font-size:25px; font-weight:bolder; font-family:Verdana, Arial, Helvetica, sans-serif;-kit-border-radius: 100px;
-moz-border-radius: 100px; border-radius: 100px; padding-left:6px; padding-right:6px; border:2px dotted #FFF">T</span><br>
<?=$lang_member[483];?></div></a>
            <a href="main.php?cmd=lotex" style="cursor:pointer; color: #fff"><div class="col-xs-4 thaisan" style="font-size:10px; border-right:1px solid #999999"><i class="fa fa-star fa-3x" style="margin-top:5px"></i><br>
<?=$lang_member[564];?></div></a>
            <a href="main.php?cmd=playlist" style="cursor:pointer; color: #fff"><div class="col-xs-4 thaisan" style="font-size:10px"><i class="fa fa-print fa-3x" style="margin-top:5px"></i><br>
<?=$lang_member[708];?></div></a>

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