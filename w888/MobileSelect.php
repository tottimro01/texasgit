<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
if($_SESSION['lang']=="")
	$_SESSION['lang'] = "en";

require('inc/conn.php');
require('inc/function.php');
#require("lang/member_lang.php");
require("lang/variable_lang.php");
// require("/home/ohoking/domains/ohoking.com/public_html/admin_lang/export/lang_member_th.php");
//Detect special conditions devices

$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
$webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");

//do something with this information
if( $iPod || $iPhone ){
    //browser reported as an iPhone/iPod touch -- do something here
	$_GET['AGENT']=1;
}else if($iPad){
    //browser reported as an iPad -- do something here
	$_GET['AGENT']=1;
}else if($Android){
    //browser reported as an Android device -- do something here
	$_GET['AGENT']=2;
}else if($webOS){
    //browser reported as a webOS device -- do something here
	$_GET['AGENT']=3;
}else{
	// ไม่มี
	$_GET['AGENT']=3;
	}
	
	if($_GET['AGENT']==3){
		exit();
		#echo'<center><h1>กรุณาเข้าผ่านมือถือ</h1></center>';
		}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Mobile Select</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<style>
	img {
		max-width: 100%;
		height:auto;
		
	}
	font {
		font-size: 9px;
		font-weight:100%;
		font:Verdana, Geneva, sans-serif;
		margin-bottom:auto;
	}
	.position{
		position: fixed;
	}
	@media screen and (max-width: 980px){
		#pagewrap {
			width: 94%;
		}
		#content{
			width: 65%;
			}
		#sideber {
			width:30%;
		}    
	}
	
	@media screen and (max-width: 700px){
		
		#content{
			width: auto;
			float:none;
			}
		#sideber {
			width:auto;
			float:none;
		}    
	}
	@media screen and (max-width: 480px){
		#header{
			height: auto;
		}
		h1{
			font-size:24px;
		}
		#sideber {
			display: none;
		}    
	}
</style>
</head>
<body background="mobile/previewMobile.jpg" onload="checkCookie(); getMobileOperatingSystem();">

<center>
    <img src="mobile/logo.png?v=3" style="height: 90px; padding: 25px 0px;">
    <br>
    <br>
    <img src="mobile/text.png" width="173" height="45">
    <br>
    <br>
    <? if($_GET['AGENT']==1){ ?>
    <!-- <a id="hf11"><img src="http://www.855-bet.com/resources/web/images/main/logo.png" width="129" height="50"></a> -->
    <a id="hf1"><img src="mobile/appstore1.png?v=1" width="129" height="50"></a>
    <a id="hf2"><img src="mobile/appstore_ball.png" width="129" height="50"></a>
     <br>
     <? }else if($_GET['AGENT']==2){ ?>
     <a id="hf1"><img src="mobile/android1.png" width="129" height="50"></a>
    <!--<a id="hf2"><img src="mobile/android2.png" width="131" height="46"></a> href="install.html" -->
     <? } ?>
     <br>
     <a><img src="mobile/install.png" width="133" height="47"></a>
     <br><br>
    <img src="mobile/text2.png" width="222" height="81">
    <br>
    <br>
    <a href="javascript:SclectVersion(2)"><img src="mobile/web.png" width="262" height="79"></a>
    <!--<br>
    <a id="hf1" href="javascript:SclectVersion(1)"><img src="mobile/web2.png" width="129" height="55"></a>-->
  <!--  <a href="javascript:SclectVersion(3)"><img src="mobile/web3.png" width="131" height="51"></a> -->
    <!-- <br> -->
     <!--<a id="hf1" href="javascript:SclectVersion(4)"><img src="mobile/web4.png" width="129" height="55"></a>-->
  <!--  <a href="javascript:SclectVersion(3)"><img src="mobile/web3.png" width="131" height="51"></a> -->
    <br>
    <br>
    <div style="color: white;">
  <input class="select" type="checkbox" name="checkbox" id="cbbStore" /><?=$lang_member[1040];?>
</div>
    
    
    <br><br>
    
<font color="#FFFFFF">
         	Copyright©BIG289.All rights reserved.v1.0
</font>
 
         
        
<center>
<script type="text/javascript">
function getMobileOperatingSystem() {
  var userAgent = navigator.userAgent || navigator.vendor || window.opera;
  if( userAgent.match( /iPad/i ) || userAgent.match( /iPhone/i ) || userAgent.match( /iPod/i ) ){
	 // document.getElementById("hf11").setAttribute("href" , "mobile/checkApp.php?app=firebet");
	document.getElementById("hf1").setAttribute("href" , "mobile/checkApp.php?app=BIG289");
	document.getElementById("hf2").setAttribute("href" , "mobile/checkApp.php?app=BIGLive");
  }else if( userAgent.match( /Android/i ) ){
    document.getElementById("hf1").setAttribute("href" , "mobile/checkApp.php?app=OHO99");
	document.getElementById("hf2").setAttribute("href" , "mobile/checkApp.php?app=Hzx");
  }else{
  }
}
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {
    var opt=getCookie("opt");
    if (opt != "") {
        //alert("Welcome again " + user);
		console.log(opt);
		document.getElementById("cbbStore").checked = true;
    }
}

    function SclectVersion(opt) {
        var toURL = "";
        if(opt == 1){//mobile
		   toURL = "http://m.<?=$check_url;?>/lot99/";
		}else  if(opt == 3){//mobile
		   toURL = "http://m.<?=$check_url;?>/lothun/";
        }if(opt == 4){//mobile
		   toURL = "http://<?=$check_url;?>/mobile_game/login.php";
		}else{ //pc
            toURL = "login.html";
        }

        if (document.getElementById("cbbStore").checked) {
            if (opt == 0){ 
				setCookie("opt", 1);
			}else if(opt == 4)
			{
				setCookie("opt", 4);
			}else{ 
				setCookie("opt", 2);
			}
        }else{
			document.cookie = "opt=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
		}

        window.location.href = toURL;
    }
</script>


</body>
</html>