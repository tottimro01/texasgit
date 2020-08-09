<?php   ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
if($_SESSION['mid']==""){
exit();
}
require('inc/conn.php');
require('inc/function.php');

require("lang/variable_lang.php");
// require("lang/member_lang.php");
// require("/home/ohoking/domains/ohoking.com/public_html/admin_lang/export/lang_member_".$_SESSION['lang'].".php");
require("lang/function_array.php");


$sql="select m_count , m_bet_date from bom_tb_member where m_id='".$_SESSION['mid']."'";
$re_m=sql_array($sql);

if($re_m[m_count]<=0){$re_m[m_count]=0;}
$_SESSION['mcount'] = $re_m[m_count];

$sql="select sum(b_total) as btotal from bom_tb_football_bill where m_id='$_SESSION[mid]'  and b_status=5";
$reb1=sql_array($sql);
$sql="select sum(b_total) as btotal from bom_tb_lotto_bill_play where m_id='$_SESSION[mid]'  and play_status=7";
$reb2=sql_array($sql);
$sql="select sum(b_total) as btotal from bom_tb_games_bill_play where m_id='$_SESSION[mid]'  and play_status=7";
$reb3=sql_array($sql);
$_SESSION['mnot']=$reb1[btotal]+$reb2[btotal]+$reb3[btotal];


$txt = array();
$txt["cre"] = $_SESSION['m_currency']." ".number_format($re_m['m_count'],2);
$txt["incre"] = number_format($_SESSION['mnot'],2);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="overflow-x: hidden; overflow-y: auto">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
    <link href="template/maxbet/public/css/M_LeftAllInOne.css" rel="stylesheet" type="text/css" />

    <link href="template/maxbet/public/css/oddsFamily.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	width:173px;
	height:132px;
	z-index:10;
}
-->
</style>
<script type="text/javascript" src="commJS/jquery.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="commJS/M_Util.js"></script><script language="JavaScript" type="text/javascript" src="commJS/M_LeftFrame.js"></script>


<script type="text/javascript">
var userlang='th';
var OddsKeepREFRESH = 10000;
var RES_KeepOdds = "โหลดข้อมูลออโต้";
var RES_FncOddsChangeMsg = "";
var RES_FncIndexChangeMsg = "";
var RES_yousuretobetmesg = "คุณแน่ใจที่จะทำการร่วมสนุกหรือไม่";
var RES_yousuretobetmesg1 = "Your previous bet is still processing, are you sure you want to bet ?";
var RES_morethan2 = "บันทึกรายการเดิมพันต้องมีมากกว่า 2";
var RES_lowermin = "จำนวนเงินที่คุณต้องการเล่นน้อยกว่าจำนวนเงินขั้นต่ำที่สามารถเล่นได้!";
var RES_highermax = "จำนวนการร่วมสนุกของคุณมากกว่าที่กำหนดไว้!";
var RES_oddsover200000 = "Payout odds have exceeded Max Odds (200,000). Please make adjustments to the selection before placing bet.";
var RES_Open_Multi = false;
var RES_Open_Multi_Parlay = true;
var RES_Add_To_Parlay = "เพิ่มบอลชุด";
var RES_Cancel_From_Parlay = "ลบจากบอลชุด";
//-- casino --
var RngSingleLobbyWebURL = "http://ohoking.com/SingleLobbyWebPortal/account/index?o=";
var CasinoWebURL = "http://ohoking.com";
var LiveCasinoWebURL = "http://ohoking.com";
var BingoWebURL = "http://ohoking.com"; 

var SizeX = "1024";
var SizeY = "706";
var winLobby;
var winLiveLobby;
var winBingoLobby;
var FavCnt = "9999";

function GetKenoURL(page,date,detail){
  var time = "";
  var param = "";
  var d = "";
  var kstyle = "" + "B";

  if(typeof date != "undefined")
  {
      time = "&date=" + date;
  }
  if(typeof detail != "undefined")
  {
      d = "&detail=" + detail.toUpperCase();
  }
  if (kstyle!="")
  {
      kstyle = "&st=" + kstyle;
  }
  param = "action=" + page + "&siteID=" + 4100200 + "&lang=" + fFrame.UserLang + time +d + kstyle;

  var url = location.href;  
  var ary = url.split("/");
  var redirectURL = "http://" + ary[2] + "/AuthorizationCustomer.ashx?cust=keno&" + param;

  return "AuthorizationCustomer.ashx?cust=keno&" + param + "&redirectURL=" + encodeURIComponent(redirectURL)
}

function GetKenoLotteryURL(page,date,detail){
  var time = "";
  var param = "";
  var d = "";
  var kstyle = "" + "B";

  if(typeof date != "undefined")
  {
      time = "&date=" + date;
  }
  if(typeof detail != "undefined")
  {
      d = "&detail=" + detail.toUpperCase();
  }
  if (kstyle!="")
  {
      kstyle = "&st=" + kstyle;
  }
  param = "action=" + page + "&siteID=" + 4100200 + "&lang=" + fFrame.UserLang + time +d + kstyle;

  var url = location.href;  
  var ary = url.split("/");
  var redirectURL = "http://" + ary[2] + "/AuthorizationCustomer.ashx?cust=kenolottery&" + param;

  return "AuthorizationCustomer.ashx?cust=kenolottery&" + param + "&redirectURL=" + encodeURIComponent(redirectURL)
}

function GetVendorURL(cust,page,date,detail){
  var time = "";
  var param = "";
  var d = "";

  if(typeof date != "undefined")
  {
      time = "&date=" + date;
  }

  if(typeof detail != "undefined")
  {
      d = "&detail=" + detail.toUpperCase();
  }

  param = "action=" + page + "&v=1&siteID=" + 4100200 + "&lang=" + fFrame.UserLang + time +d ;

  var url = location.href;  
  var ary = url.split("/");
  var redirectURL = "http://" + ary[2] + "/AuthorizationCustomer.ashx?cust=" + cust + "&" + param;
  return "AuthorizationCustomer.ashx?cust=" + cust + "&" + param + "&redirectURL=" + encodeURIComponent(redirectURL);
}

function OpenColossusBet(ref)
{
    var url = location.href;
    var ary = url.split("/");
    var redirectURL = "http://" + ary[2] + "/AuthorizationCustomer.ashx?cust=colossusbet";
    var callback = function (Handle, isNewOpen)
    {
        if (!isNewOpen)
        {
            //Handle.location = "AuthorizationCustomer.ashx?cust=colossusbet&redirectURL=" + encodeURIComponent(redirectURL);
            Handle.location = "CBFramePage.php?ref=" + ref;
            if (userBrowser() == "Chrome")
                Handle.blur();
            else
                Handle.focus();
        }
    }
    fFrame.openWindowsHandle("ColossusBet",
                                true,
                                null,
                                //"AuthorizationCustomer.ashx?cust=colossusbet&redirectURL=" + encodeURIComponent(redirectURL),
                                "CBFramePage.php?ref=" + ref,
                                "scrollbars=yes,resizable=yes,top=0,left=0,width=1045,Height=" + (window.screen.availHeight - 68), false, callback);
}

function OpenKeno(page,date,detail){
  var time = "";
  var param = "";
  var d="";
  var kstyle = "" + "B";

  if(typeof date != "undefined")
  {
      time = "&date=" + date;
  }
  if(typeof detail != "undefined")
  {
      d = "&detail=" + detail.toUpperCase();
  }
  
  if (kstyle!="")
  {
      kstyle = "&st=" + kstyle;
  }
  param = "action=" + page + "&siteID=" + 4100200 + "&lang=" + fFrame.UserLang + time+d + kstyle;

  var url = location.href;  
  var ary = url.split("/");
  var redirectURL = "http://" + ary[2] + "/AuthorizationCustomer.ashx?cust=keno&" + param;

  if(page!="M"){
       var callback =  function(Handle,isNewOpen)
       {
           if(!isNewOpen){
              Handle.location="AuthorizationCustomer.ashx?cust=keno&" + param + "&redirectURL=" + encodeURIComponent(redirectURL);
             }
       }

       fFrame.openWindowsHandle("keno"+page,
                                fFrame.CanBetKeno,
                                "Your account is not able to play Keno game, please contact your upline to enable Keno for you.",
                                "AuthorizationCustomer.ashx?cust=keno&" + param +
                                "&redirectURL=" + encodeURIComponent(redirectURL),
                                "fullscreen=1,scrollbars=yes,resizable=yes",
                                false,
                                callback);
   }
   else
   {
       fFrame.openWindowsHandle("keno"+page,
                                fFrame.CanBetKeno,
                                "Your account is not able to play Keno game, please contact your upline to enable Keno for you.",
                                "AuthorizationCustomer.ashx?cust=keno&" + param +
                                "&redirectURL=" + encodeURIComponent(redirectURL),
                                "scrollbars=yes,resizable=yes,top=0,left=0,width=1045,Height="+(window.screen.availHeight-68));
   }
}

function OpenKenoLottery(page,date,detail){
  var time = "";
  var param = "";
  var d="";
  var kstyle = "" + "B";

  if(typeof date != "undefined")
  {
      time = "&date=" + date;
  }
  if(typeof detail != "undefined")
  {
      d = "&detail=" + detail.toUpperCase();
  }
  
  if (kstyle!="")
  {
      kstyle = "&st=" + kstyle;
  }
  param = "action=" + page + "&siteID=" + 4100200 + "&lang=" + fFrame.UserLang + time+d + kstyle;

  var url = location.href;  
  var ary = url.split("/");
  var redirectURL = "http://" + ary[2] + "/AuthorizationCustomer.ashx?cust=kenolottery&" + param;

  if(page!="M"){
       var callback =  function(Handle,isNewOpen)
       {
           if(!isNewOpen){
              Handle.location="AuthorizationCustomer.ashx?cust=kenolottery&" + param + "&redirectURL=" + encodeURIComponent(redirectURL);
             }
       }

       fFrame.openWindowsHandle("kenolottery"+page,
                                fFrame.CanSeeLottery,
                                "Your account is not able to play Lottery game, please contact your upline to enable Lottery for you.",
                                "AuthorizationCustomer.ashx?cust=kenolottery&" + param +
                                "&redirectURL=" + encodeURIComponent(redirectURL),
                                "fullscreen=1,scrollbars=yes,resizable=yes",
                                false,
                                callback);
   }
   else
   {
       fFrame.openWindowsHandle("kenolottery"+page,
                                fFrame.CanSeeLottery,
                                "Your account is not able to play Lottery game, please contact your upline to enable Lottery for you.",
                                "AuthorizationCustomer.ashx?cust=kenolottery&" + param +
                                "&redirectURL=" + encodeURIComponent(redirectURL),
                                "scrollbars=yes,resizable=yes,top=0,left=0,width=1320,Height=827"); //+(window.screen.availHeight-68));
   }
}

function OpenCF(page,date,detail){
  var time = "";
  var param = "";
  var d="";

  if(typeof date != "undefined")
  {
      time = "&date=" + date;
  }
  if(typeof detail != "undefined")
  {
      d = "&detail=" + detail.toUpperCase();
  }
  
  param = "action=" + page + "&siteID=" + 4100200 + "&lang=" + fFrame.UserLang + time+d ;

  var url = location.href;  
  var ary = url.split("/");
  var redirectURL = "http://" + ary[2] + "/AuthorizationCustomer.ashx?cust=cf&" + param;

  if(page!="M"){
       var callback =  function(Handle,isNewOpen)
       {
           if(!isNewOpen){
              Handle.location="AuthorizationCustomer.ashx?cust=cf&" + param + "&redirectURL=" + encodeURIComponent(redirectURL);
             }
       }

       fFrame.openWindowsHandle("cf"+page,
                                fFrame.CanBetCockFighting,
                                "Your account is not able to play Cock Fighting game, please contact your upline to enable Cock Fighting for you.",
                                "AuthorizationCustomer.ashx?cust=cf&" + param +
                                "&redirectURL=" + encodeURIComponent(redirectURL),
                                "fullscreen=1,scrollbars=yes,resizable=yes",
                                false,
                                callback);
   }
   else
   {
       fFrame.openWindowsHandle("cf"+page,
                                fFrame.CanBetCockFighting,
                                "{{CockFightFlashMsg}}",
                                "AuthorizationCustomer.ashx?cust=cf&" + param +
                                "&redirectURL=" + encodeURIComponent(redirectURL),
                                "scrollbars=yes,resizable=yes,top=0,left=0,width=1045,Height="+(window.screen.availHeight-68));
   }
}

function OpenAllBet(){
 fFrame.openWindowsHandle("winLobby" ,
                           fFrame.CanSeeAllBet ,
                           "Your account is not able to play Allbet Casino Live game, please contact your upline to enable Allbet Casino Live for you.",
                           "AuthorizationCustomer.ashx?cust=allbet",
                           "height=" + SizeY + ", width=" + SizeX + ", top=0, left=0, toolbar=no, menubar=no, scrollbars=no, resizable=yes, location=no, status=no"                           
                            );
}

function OpenGG(refer){

        var Sys = {};
       	var ua = navigator.userAgent.toLowerCase();
        var s;
		var checkV = false;
        (s = ua.match(/edge\/([\d.]+)/)) ? Sys.edge = s[1] :
		(s = ua.match(/rv:([\d.]+)\) like gecko/)) ? Sys.ie = s[1] :
        (s = ua.match(/msie ([\d.]+)/)) ? Sys.ie = s[1] :
        (s = ua.match(/firefox\/([\d.]+)/)) ? Sys.firefox = s[1] :
        (s = ua.match(/chrome\/([\d.]+)/)) ? Sys.chrome = s[1] :
        (s = ua.match(/opera.([\d.]+)/)) ? Sys.opera = s[1] :
        (s = ua.match(/version\/([\d.]+).*safari/)) ? Sys.safari = s[1] : 0;
		
        if(Sys.edge){
            checkV = true;
        }
        else if (Sys.ie) {
		    var ver = Sys.ie.split(".");
		    if(parseInt(ver[0]) >= 11){
			    checkV = true;			
			}
		}
        else if (Sys.firefox) {
		    var ver = Sys.firefox.split(".");
		    if(parseInt(ver[0]) >= 40){
			    checkV = true;
			}
		}
        else if (Sys.chrome) {
		    var ver = Sys.chrome.split(".");
		    if(parseInt(ver[0]) >= 51){
			    checkV = true;
			}
		}        
        else if (Sys.safari) {
            var ver = Sys.safari.split(".");
            if(parseInt(ver[0]) >= 9){
			    checkV = true;
			}
        }
		else if (Sys.opera) {}

		if(checkV){
            var height = window.screen.availHeight-64;
	        var width = height*1.3333;
            if (window.screen.availWidth >= 1440)
            {
                width = 1440;
                height=900;
            }
		    fFrame.openWindowsHandle("GGLobby" ,
                           fFrame.CanSeeGG ,
                           "Your account is not able to play Fishing World, please contact your upline to enable Fishing World for you.",
                           "AuthorizationCustomer.ashx?cust=gg&refer=" + refer,
                           "height=" + height + ", width=" + width + ", top=0, left=0, toolbar=no, menubar=no, scrollbars=no, resizable=yes, location=no, status=no"                           
                            );
		}else{
            window.open("single_browser.php");
		} 
}

function OpenN7(){
    
    var height = window.screen.availHeight-64;
	var width = height*1.3333;
    if (window.screen.availWidth >= 1280)
    {
        width = 1280;
        height=762;
    }
    fFrame.openWindowsHandle("N7Lobby" ,
                           fFrame.CanSeeN7 ,
                           "Your account is not able to play Lotto game, please contact your upline to enable Lotto for you.",
                           "AuthorizationCustomer.ashx?cust=n7",
                           "height=" + height + ", width=" + width + ", top=0, left=0, toolbar=no, menubar=no, scrollbars=yes, resizable=yes, location=no, status=no"                           
                            );
}

function OpenBullFighting(){

    var param = "";
    param = "action=M&siteID=" + 4100200 + "&lang=" + fFrame.UserLang
    var url = location.href;  
    var ary = url.split("/");
    var redirectURL = "http://" + ary[2] + "/AuthorizationCustomer.ashx?cust=bf&" + param;

    var height = window.screen.availHeight-64;
	var width = height*1.3333;
    if (window.screen.availWidth >= 1280)
    {
        width = 1280;
        height=812;
    }
    fFrame.openWindowsHandle("BFLobby" ,
                           fFrame.CanSeeBullfighting ,
                           "Your account is not able to play Bullfighting game, please contact your upline to enable Bullfighting for you.",
                           "AuthorizationCustomer.ashx?cust=bf" + "&redirectURL=" + encodeURIComponent(redirectURL),
                           "height=" + height + ", width=" + width + ", top=0, left=0, toolbar=no, menubar=no, scrollbars=yes, resizable=yes, location=no, status=no"                           
                            );
}

function OpenCardClub(){
    var checkV = true;
    var Sys = {};
    var ua = navigator.userAgent.toLowerCase();
    var s;
    var left_sl=window.screen.availWidth-495;
    (s = ua.match(/edge\/([\d.]+)/)) ? Sys.edge = s[1] :
	(s = ua.match(/rv:([\d.]+)\) like gecko/)) ? Sys.ie = s[1] :
    (s = ua.match(/msie ([\d.]+)/)) ? Sys.ie = s[1] :
    (s = ua.match(/firefox\/([\d.]+)/)) ? Sys.firefox = s[1] :
    (s = ua.match(/chrome\/([\d.]+)/)) ? Sys.chrome = s[1] :
    (s = ua.match(/opera.([\d.]+)/)) ? Sys.opera = s[1] :
    (s = ua.match(/version\/([\d.]+).*safari/)) ? Sys.safari = s[1] : 0;

	if (Sys.edge) {
		checkV = false;
	}
	if (Sys.ie) {
		checkV = false;
	}
	if (Sys.firefox) {
		checkV = false;
	}

	if (checkV) {
		fFrame.openWindowsHandle("CardClubLobby",
			fFrame.CanSeeCardClub,
			"{{CardClubFlashMsg}}",
			"AuthorizationCustomer.ashx?cust=cardclub",
			"height=660, width=480, top=0, left=" + left_sl + ", toolbar=no, menubar=no, scrollbars=yes, resizable=yes, location=no, status=no"
		);
	} else {
		window.open("single_browser_CardClub.php");
	} 
    
}

function OpenGDLiveCasino(){

  fFrame.openWindowsHandle("GDLiveCasino",
                                fFrame.CanSeeGD,
                                "Your account is not able to play Casino Live game, please contact your upline to enable Casino Live for you.",
                                "GDFramePage.php",
                                "scrollbars=yes,resizable=yes,top=0,left=0,width=1057,Height=805");

}

function OpenCasino(para){
 
 var h = window.screen.availHeight*0.8;
 var w = window.screen.availWidth*0.8;
 
 fFrame.openWindowsHandle("winLobby" ,
                           window.top.CanSeeRng || fFrame.IsRngPlayForFun || fFrame.CanSeeRngVB,
                           "Your account is not able to play Casino, please contact your upline to enable Casino for you.",
                           "AuthorizationCustomer.ashx?cust=onerng&casinourl=" + RngSingleLobbyWebURL+"&istablet=" + CheckIsIpadForCasino(),
                            "height=" + h + ", width=" + w + ", top=0, left=0, toolbar=no, menubar=no, scrollbars=yes, resizable=yes, location=no, status=no"                           
                            );
}

function OpenLiveCasino(para){
    if (!fFrame.ShowUpGradeMsgForNG)
    {
        var height = window.screen.availHeight-64;
		var width = height*1.3333;

        fFrame.openWindowsHandle("LiveLobby" ,
                           window.top.DisableLiveCasino == "false" && window.top.SyncLiveCasino == "true" ,
                           "Your account is not able to play Casino Live game, please contact your upline to enable Casino Live for you.",
                           LiveCasinoWebURL + "/LiveCasinoWebPortal/CasinoLobby.php?o=" + para ,
                           "height=" + height + ", width=" + width + ", top=0, left=0, toolbar=no, menubar=no, scrollbars=no, resizable=yes, location=no, status=no"                           
                            );
      }
      else
     {
        OpenMessageForLC();
     }
}

function OpenTraditionalBingo(para){
    if (!fFrame.ShowUpGradeMsgForNG)
    {
        var SizeY=680;
        var SizeX=910;

        fFrame.openWindowsHandle("BingoLobby" ,
                           fFrame.CanBetBingo==true ,
                           "Your account is not able to play Bingo, please contact your upline to enable Bingo for you.",
                           BingoWebURL+"/BingoWebPortal/BingoFrame.php?o="+para ,
                           "height=" + SizeY + ", width=" + SizeX + ", top=0, left=0, toolbar=no, menubar=no, scrollbars=no, resizable=yes, location=no, status=no"                           
                            );
    }
    else
    {
        OpenMessageForBG();
    }
}

function OpenMessageForLC()
{
    fFrame.openWindowsHandle("MessageLC" ,
                           "true"=="true"  ,
                           "Show Message Error!",
                           "/UpGradeMsg.php?MsgType=LC" ,
                           "height=514, width=788, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, resizable=yes, location=no, status=no"                           
                            );
}

function OpenMessageForBG()
{
    fFrame.openWindowsHandle("MessageBG" ,
                          "true"=="true"  ,
                           "Show Message Error!",
                           "/UpGradeMsg.php?MsgType=BG" ,
                           "height=514, width=788, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, resizable=yes, location=no, status=no"                           
                            );
}

function OpenMessageForNG()
{
    fFrame.openWindowsHandle("MessageNG" ,
                          "true"=="true"  ,
                           "Show Message Error!",
                           "/UpGradeMsg.php?MsgType=NG" ,
                           "height=514, width=788, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, resizable=yes, location=no, status=no"                           
                            );
}


function CheckLoadIPad(){
  if(CheckIsIpad()){SetIpad();}
}
function SetIpad()
{
   if(typeof this.isPad_loadend == "undefined"){
      importJS('commJS/isPad.js','this.isPad_loadend',function(){this.chkChangeIpad();},this);
   }
}
function ConfirmCallMiniGame()
{
   if (fFrame.CanSeeMiniGame)
   {
        window.addEventListener("message", messageHandler, false);
		$('#MiniGame_iframe').attr("src","AuthorizationCustomer.ashx?cust=minigame");
        $('#minigameheader').toggleClass('collapse');
   }
}

function CallMiniGame()
{
	$('#minigameheader').removeClass('collapse');
}

var messageHandler = function(e) {
        var msg = e.data;
        if (typeof msg == "object" && msg["TimeStamp"] && msg["Call"]) {
            /*console.log('receive miniRNG message');
            console.log('miniRNG msg.TimeStamp = ' + msg.TimeStamp);
            console.log('miniRNG msg.Call.TitleTypeNo = ' + msg.Call.TitleTypeNo);
            console.log('miniRNG msg.Call.TitleName = ' + msg.Call.TitleName);
            console.log('miniRNG msg.Call.TitleIconName = ' + msg.Call.TitleIconName);
            console.log('miniRNG msg.Call.Height = ' + msg.Call.Height);*/
            switch (msg.Call.TitleTypeNo)
            {
            case "DesktopLobby":
                OpenCasino();
                return;
                break;
            case "MiniLobby":
                $("#minigametitle").text(msg.Call.TitleName);
                $("#minigametitle").attr('title',msg.Call.TitleName);
			    $("#minigameicon").attr('class', '');
			    $("#minigameicon").attr('class', 'heading');
				$("#minigameContent").height(102);
                return;
                break;
            default:
                $("#minigametitle").text(msg.Call.TitleName);
                $("#minigametitle").attr('title',msg.Call.TitleName);
			    $("#minigameicon").attr('class', '');
				var iconname='heading ' + msg.Call.TitleIconName;
			    $("#minigameicon").attr('class', iconname);
				$("#minigameContent").height(msg.Call.Height);
			    $("#miniGame_CloseBT").show();
                break;
            }            
        }

        if (typeof msg == "object" && msg["TimeStamp"] && msg["Reload"]) {
            $('#MiniGame_iframe').attr("src","AuthorizationCustomer.ashx?cust=minigame");
			$("#minigameicon").attr('class', '');
			$("#minigameicon").attr('class', 'heading');
			$("#minigameContent").height(102);
        }
    }
	
function BackToMiniGameLobby()
{
	$("#miniGame_CloseBT").hide();
	$("#MiniGame_iframe").attr("src","AuthorizationCustomer.ashx?cust=minigame");
	$('#minigameheader').attr('class', 'miniCasino');
}


function checkBrowserVer(idx){

        var Sys = {};
       	var ua = navigator.userAgent.toLowerCase();
        var s;
		var checkV = true;
        (s = ua.match(/edge\/([\d.]+)/)) ? Sys.edge = s[1] :
        (s = ua.match(/samsungbrowser.([\d.]+)/)) ? Sys.samsung = s[1] :
		(s = ua.match(/rv:([\d.]+)\) like gecko/)) ? Sys.ie = s[1] :
        (s = ua.match(/msie ([\d.]+)/)) ? Sys.ie = s[1] :
        (s = ua.match(/firefox\/([\d.]+)/)) ? Sys.firefox = s[1] :
        (s = ua.match(/fxios\/([\d.]+)/)) ? Sys.firefoxIOS = s[1] :
        (s = ua.match(/chrome\/([\d.]+)/)) ? Sys.chrome = s[1] :
        (s = ua.match(/crios\/([\d.]+)/)) ? Sys.chrome = s[1] :
        (s = ua.match(/opera.([\d.]+)/)) ? Sys.opera = s[1] :        
        (s = ua.match(/version\/([\d.]+).*safari/)) ? Sys.safari = s[1] : 0;
        if(Sys.edge){
            checkV = true;
        }
        else if (Sys.ie) {
		    var ver = Sys.ie.split(".");
		    if(parseInt(ver[0]) >= 10){
			    checkV = true;			
			}
            else{
                checkV = false;
            }
		}
        else if (Sys.samsung) {
            var ver = Sys.samsung.split(".");
            if(parseInt(ver[0]) >= 3){
			    checkV = true;
			}
            else{
                checkV = false;
            }
        }
        else if (Sys.firefox) {
		    var ver = Sys.firefox.split(".");
		    if(parseInt(ver[0]) >= 45){
			    checkV = true;
			}else{
                checkV = false;
            }
		}
        else if (Sys.firefoxIOS) {
		    var ver = Sys.firefoxIOS.split(".");
		    if(parseInt(ver[0]) >= 5){
			    checkV = true;
			}else{
                checkV = false;
            }
		}
        else if (Sys.chrome) {
		    var ver = Sys.chrome.split(".");
		    if(parseInt(ver[0]) >= 51){
			    checkV = true;
			}else{
                checkV = false;
            }
		}        
        else if (Sys.safari) {
            var ver = Sys.safari.split(".");
            if(parseInt(ver[0]) >= 8){
			    checkV = true;
			}else{
                checkV = false;
            }
        }
		else if (Sys.opera) {}

        if(checkV){
            if (idx != 0)
            {
                idx = fFrame.promotionKey;
            }
		    switchToV2(idx);
		}else{
            window.open("single_browser.php");
		}
}
$(document).ready(function() {
	$('input.deletable').wrap('<span class="deleteicon" />').after($('<span/>').click(function() {
		$(this).prev('input').val('').focus();
		$('#payOut').html('');
		$('#VRPayout').html('');
        $('#payOut_P').html('');
        $('#Bingo_payOut').html('');
        $('#TotalStakeValue').html('');
        $('#txtPayOut').html('');
        $('#BPMinMaxBetAlert').css('display', 'none');
        $('#HRBPMinMaxBetAlert').css('display', 'none');
        $('#ParlayBPMinMaxBetAlert').css('display', 'none');
        $('#Bingo_BPMinMaxBetAlert').css('display', 'none');
        if (document.getElementById("parlay_bet_info").style.display!="none")
        {
            clearStake("");
        }
    }));

    $('#minigametitle').hover(function() {
        $(this).css('cursor','pointer');
    });
});
</script>
</head>
<body lang="th" id="LeftAllInOne" onload="OverWriteFormSubmit();CheckLoadIPad();initialMenu();changeFavStyle(FavCnt);InitBetslip(false);setTimeout(function(){ ConfirmCallMiniGame(); }, 10000);">
<div> 
  
  <!-- <div class='leftSwitchVer' onclick='javascript:checkBrowserVer(0);'></div> -->
  
  <!--BEGIN MessageDisplay-->  
  <div id="MessageDisplayContainer" style="display:none">
    <div class="leftBoxTitle"><span class="icon-arrow"></span><span id="spSubTitle" class="titleTxt"></span></div>
    <div class="leftBoxbody">
      <div class="boxbg reSet errorlogon" style="width:auto"> <span id="spTitle"></span> <em id="spContent"></em> </div>
    </div>
    <div class="leftBoxFoot"></div>
    <div class="Backmenu"><span class="icon-arrow"></span><a href="javascript:ReloadWaitingBetList('yes','no','1');">กลับไปที่เมนูหลัก</a></div>
    <iframe name="ifmMessageDisplay" id="ifmMessageDisplay" src="" style="display:none"></iframe>
    <form name="fomMessageDisplay" action ="MessageDisplay_Data.php"  method="post"  target="ifmMessageDisplay" style="display:none">
      <input type="hidden" id="msg_type" name="msg_type" value="" />
      <input type="hidden" id="msg_u_title" name="msg_u_title" value="" />
      <input type="hidden" id="msg_u_msg" name="msg_u_msg" value="" />
    </form>
  </div>
  <!--END Message Display-->
  <!-- account info full -->
  <div id="div_accountInfoFull"> 
    <!--account information-->
    <div id="account_allhard">
      <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td class="Tcolor01" height="20" style="cursor: pointer;" onclick="javascript:refreshAccountInfo('mini')"><div id="divFullUserName"><?=$_SESSION['m_user'];?></div></td>
          <td valign="top"  nowrap="nowrap" style="cursor: pointer;" onclick="javascript:refreshAccountInfo('mini')"><a href="#" target="leftx"  class="btnIcon right balance-open" title="บัญชีของฉัน"><span class="icon-arrow"></span></a></td>
          <td valign="top"  nowrap="nowrap" width="20"><a name="btnRefresh" href="javascript:refreshAccountInfo('full');"  class="btnIcon right" title="รีเฟรช"><span class="icon-refresh"></span></a></td>
        </tr>
      </table>
      <div class="line"></div>
      <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
        
        <tr>
          <td height="20" align="left" title="ชื่อเล่น"><div class="text-ellipsis" style="max-width:80px;">ชื่อเล่น</div></td>
          <td align="right">
            <?if($_SESSION['m_name']!=""){?>
            <span id="txt_nickname" class="member_nickname"><?=$_SESSION['m_name'];?></span>
            <?}else{?>
            <span id="txt_nickname" class="member_nickname">Set name</span>
            <?}?>
          </td>
        </tr>
         
        
      </table>
    </div>
    <div class="account_body">
      <table width="100%" border="0" cellpadding="0" cellspacing="0"  class="tabstyle01">
        <tr>
          <th align="left" nowrap="nowrap" title="เงิน ได้/เสีย"><div class="text-ellipsis" style="width:70px;">เงิน ได้/เสีย</div></th>
          <td id="cashBalance" align="right" class="UdrDogOddsClass"><span id="txt_cash"<? if((floatval($re_m['m_count'])-floatval($_SESSION['mcredit']))<0){ ?> style="color: red;"<? } ?>><?=number_format(floatval($re_m['m_count'])-floatval($_SESSION['mcredit']), 2);?></span></td>
        </tr>        
        
        <!-- <tr>
          <th align="left" nowrap="nowrap" title="Net Position"><div class="text-ellipsis" style="width:60px;">Net Position</div></th>
          <td align="right"><span id="txt_netposition">0.00</span><a href="Net_Position_Help.php" target="_blank" title="Net Position Help"><span class="iconOdds help right" style="margin-top: 3px;"></span></a></td>                    
        </tr> -->
        <tr>
          <th align="left" nowrap="nowrap" title="เครดิตคงเหลือ"><div class="text-ellipsis" style="width:70px;">เครดิตคงเหลือ</div></th>
          <td align="right"><span id="txt_betcredit"><?=number_format($re_m['m_count'],2)?></span></td>
        </tr>
        <tr>
          <th align="left" nowrap="nowrap" title="รายการเล่นค้าง"><div class="text-ellipsis" style="width:70px;">รายการเล่นค้าง</div></th>
          <td align="right"><span id="txt_outstanding"><?=number_format($_SESSION['mnot'],2)?></span></td>
        </tr>
        <tr>
          <th align="left" nowrap="nowrap" title="เครดิตที่ได้รับ"><div class="text-ellipsis" style="width:70px;">เครดิตที่ได้รับ</div></th>
          <td align="right"><span id="txt_credit"><?=number_format($_SESSION['mcredit'] , 2)?></span></td>
        </tr>
        <tr>
          <th colspan="2" align="left" title="การเข้าระบบครั้งสุดท้าย"><div class="text-ellipsis" style="width:160px;">การเข้าระบบครั้งสุดท้าย</div></th>
        </tr>
        <tr>
          <td colspan="2"><span id="txt_login"><?=$_SESSION['m_login']?></span></td>
        </tr>
        <tr>
          <th colspan="2" align="left" title="รายการเล่นสุดท้าย"><div class="text-ellipsis" style="width:160px;">รายการเล่นสุดท้าย</div></th>
        </tr>
        <tr>
          <td colspan="2"><span id="txt_transaction"><?=$re_m['m_bet_date'];?></span></td>
        </tr>
        <!-- <tr>
          <th colspan="2" align="left" title="วันหมดอายุของรหัส"><div class="text-ellipsis" style="width:160px;">วันหมดอายุของรหัส</div></th>
        </tr>
        <tr>
          <td colspan="2"><span id="txt_expassword">4/2/2019 7:42:18 PM</span></td>
        </tr> -->
      </table>
    </div>
    <div class="account_foot"></div>
    <iframe name="iFrameAllAccount" id="iFrameAllAccount" src="" style="display: none"></iframe>
    <form id="FrameAllAccount" name="FrameAllAccount" action="leftAllInOneAccount_data.php" method="post" target="iFrameAllAccount">
      <input type="hidden" id="accountUpdate" name="accountUpdate" value="full"/>
    </form>
  </div>
  <!-- account info mini -->
  <div id="div_accountInfoMini" style="display:none;"> <span id="account_info"></span>
    <div id="account_hard">
      <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="30" valign="top" class="Tcolor01" style="cursor: pointer;" onclick="javascript:refreshAccountInfo('full')"><div id="divMiniUserName"><?=$_SESSION['m_user'];?><br />
            <? if($_SESSION['m_name']!=""){?>
              <span class="member_nickname"><?=$_SESSION['m_name'];?></span></div></td>
            <? }else{?>
              <span class="member_nickname">Set name</span></div></td>
            <? }?>
          <td valign="top"  nowrap="nowrap" style="cursor: pointer;" onclick="javascript:refreshAccountInfo('full')"><a href="#" target="leftx"  class="btnIcon right balance" title="บัญชีของฉัน"><span class="icon-arrow"></span></a></td>
          <td valign="top"  nowrap="nowrap" width="20"><a name="btnRefresh" href="javascript:refreshAccountInfo('mini');"  class="btnIcon right" title="รีเฟรช"><span class="icon-refresh"></span></a></td>
        </tr>
      </table>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabstyle01" style="cursor: pointer;" onclick="javascript:refreshAccountInfo('full')">
        <tbody>
          <tr>
            <th height="20" valign="top" title="เครดิตเดิมพัน">
              <span class="icon-credit"></span>
            </th>
            <td align="right" nowrap="nowrap">
              <span id="AccCurrency_P">THB </span>
			  <span id="txt_betcreditInfo"><?=number_format($re_m['m_count'])?></span>
            </td>
          </tr>
          <tr>
            <th height="20" valign="top" title="เงิน ได้/เสีย">
              <span class="icon-cash"></span>
            </th>
            <td align="right" nowrap="nowrap">
              <span id="AccCurrency_P">THB </span>
			  <span id="txt_cashInfo" class="UdrDogOddsClass"<? if((floatval($re_m['m_count'])-floatval($_SESSION['mcredit']))<0){ ?> style="color: red;"<? } ?>><?=number_format(floatval($re_m['m_count'])-floatval($_SESSION['mcredit']), 2);?></span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <!-- Back to menu picture --> 
</div>
<div style="height:1px; width:1px; overflow:hidden;">
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
			id="encrypt" width="1px" height="1px"
			codebase="http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab">
    <param name="movie" value="template/public/images/encrypt.swf" />
    <param name="quality" value="high" />
    <param name="wmode" value="transparent" />
    <param name="allowScriptAccess" value="sameDomain" />
    <embed src="template/public/images/encrypt.swf" wmode="transparent"
				width="1px" height="1px" name="encrypt" align="middle"
				play="true"
				loop="false"
				quality="high"
				allowscriptaccess="sameDomain"
				type="application/x-shockwave-flash"
				pluginspage="http://www.adobe.com/go/getflashplayer">
    </embed>
  </object>
</div>
<!-- BEGIN small TV -->
<div id="TVBox" style="display:none;">
  <div class="leftBoxTitle" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"><span class="icon-arrow"></span>
    <div class="btnIcon mark right" onclick="CloseTVBox()"><span class="icon-close" title="ปิด"></span></div>
    <div id="sTVReflash" class="btnIcon mark right" onclick="this.className='btnIcon mark right disable';ReflashSingleStreaming();" title="รีเฟรช"><span class="icon-refresh"></span></div>
    <a href="javascript:SwitchSingleStreaming();" class="btnIcon mark right"><span class="icon-zoom"></span></a>
    <span class="titleTxt">การดูภาพการแข่งขันสดผ่านเวปไซค์</span></div>
  <div class="leftBoxbody">
    <div class="boxbg">
      <iframe id="iTV" scrolling="no" src="" onload="document.getElementById('sTVReflash').className='btnIcon mark right';" frameborder="0" allowtransparency height="185" width="164"></iframe>
    </div>
  </div>
  <div class="leftBoxFoot"></div>
</div>
<div>
   
  <!-- My Favorite menu -->
  <div id="div_favorite" class="favoritemenu" style="display:none;"><span id="Favorite" class="icon-favorite"></span><a href="javascript:ShowOdds('F','1',fFrame.DisplayMode);">รายการโปรดของฉัน</a></div>
  <!-- END My Favorite menu -->
  <div id="div_menu" class="hidemenu" style=""><span class="icon-arrow"></span><a href="javascript:SwitchMenu('th');"><span id="lblShowSportsMenu">แสดงเมนูกีฬา</span><span id="lblHideSportsMenu">ซ่อนเมนูกีฬา</span></a></div>
  <!--sport menu--> 
  <span id="MenuContainer" style="display:block;" ></span>
  <iframe name="ifmMenu" id="ifmMenu" src="" style="display:none"></iframe>
  <form id="frmMenuData" name="frmMenuData" action="menu/Menu_Data.php" method="get" target="ifmMenu">
    <input type="hidden" id="hidMenuType" name="hidMenuType" value=""/>
    <input type="hidden" id="hidForce" name="hidForce" value=""/>
    <input type="hidden" id="hidCanSeeVirtualSports" name="hidCanSeeVirtualSports" value=""/>
    <input type="hidden" id="hidMenuMainSportKey" name="hidMenuMainSportKey" value=""/>
    <input type="hidden" id="hidMenuOtherSportKey" name="hidMenuOtherSportKey" value=""/>
    <input type="hidden" id="hidMenuVerifyKey" name="hidMenuVerifyKey" value=""/>
  </form>
  <!-- BEGIN Betting Mode-->
  <div id="BettingModeContainer" class="TabBox" style="display:none">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tbody>
        <tr>
          <td id="div_menu_single" class="R_menu_R current" title="เต็ง"><span class="icon-arrow"></span><a href="JavaScript:SwitchBettingMode(0,'1')"><span class="subTitle">เต็ง</span></a></td>
          <td id="div_menu_multiple" class="R_menu_gr" title="Multi-single"><span class="icon-arrow"></span><a href="JavaScript:SwitchBettingMode(1)"><span class="subTitle">Multi-single</span></a></td>
          <td id="div_menu_parlay" class="R_menu_gr" title="สเต็ป"><span class="icon-arrow"></span><a href="JavaScript:SwitchBettingMode(2,'1')"><span class="subTitle">สเต็ป</span><span class="numSelections" id="mparlay_cnt"></span></a></td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- END Betting Mode--> 
   <div id="MessageAlertContainer" style="display:none;">
	<div class="leftBoxbody">
	  <div class="boxbg">
		<div class="tips box">
		  <div class="content info"></div>
		</div>
	  </div>
	</div>
	<div class="leftBoxFoot"></div>
	<div class="Backmenu"><span class="icon-arrow"></span><a href="javascript:ReloadWaitingBetList('yes','no','1');">กลับไปที่เมนูหลัก</a></div>
</div>
  <!-- BEGIN Bet Multiple-->
  <div id="Betslip" style="display:none"></div>
  <!-- END Bet Multiple--> 
  <!-- BEGIN Bet Process-->
  <div id="BetProcessContainer" style="display:none">
    <iframe name="ifmConfirmBet" id="ifmConfirmBet" src="" style="display:none"></iframe>
    <form name="fomConfirmBet" method="post"  target="ifmConfirmBet" autocomplete="off">
      <div id="BP_SPORT" style="display:none">
        <div class="leftBoxbody">
          <div class="boxbg">
            <div id="BetInfo" class="BetInfo">
              <div class="TextStyle01 pad"><span id="menuTitle"></span> <span id="menuTitleOT">เอาท์ไรท์</span> <span id="tdBetKind"></span></div>
              <div id="trOddsInfo">
                <div id="tdLiveBgColor">
                  <div class="pad"><span id="spChoiceClass" class="TextStyle02"></span><br/>
                    <span id="sbBetKindValue" class="TextStyle03"></span> <span id="spScoreValue" class="TextStyle01"></span> <span class="TextStyle03">@</span> <span id="bodds"></span></div>
                    <div id="sbBetAOSValue" class="TextStyle04"></div>
                </div>
                <div id="divKeepBetProcess" class="checkbox">
                    <input id="chKeepBet" name="chKeepBet" type="checkbox" checked onclick="OddsKeepCountTime(this);"/>                    
                    <span id="KeepOdds"></span></div>
              </div>

              <!--<div class="line_divR"><img src ="/template/public/images/space.gif" name="imgHorseJockey" width="28" height="30" id="imgHorseJockey" onerror="this.style.display='none'"/></div>-->
              <div class="TextStyle04 pad"><div id="spHome_id"><span id="spHome"></span></div> <div id="spAway_id"><span id="spAway"></span></div><div id="spMatchCode_id"><span id="spMatchCode"></span></div>
                <div id="ot_dvChoiceValue_id"><span id="ot_dvChoiceValue"></span></div>
                <div id="spLeaguename_id" class="TextStyle07"><span id="spLeaguename"></span></div>
              </div>
              <div id="div_addparlay" class="checkbox txtleft addToParlay"><input type="checkbox" id="chk_addToParlay" onclick="SingleToParlay();"><div id="icon_addParlay">Add to Parlay</div></div>
              <div class="Currency pad mag">THB
                <input id="BPstake" name="BPstake" type="text" size="10" class="deletable" style="ime-mode:disabled" onkeydown="return(validateOnKD(this, event));" onkeypress="return(validateOnKP(this, event,this.selectionStart));" onkeyup="return(payOutOnKU(this, event));" autocomplete="off" onpaste="return false;"/>
                <input id="BPBetKey" name="BPBetKey" type="hidden" />
                <div id="BPMinMaxBetAlert" class="tips" style="display:none">
                <div class="content info"></div>
                </div>
              </div>
              <div id="tr_StakeMultiples"><span id="sp_stakeMultiples" class="TextStyle05"></span></div>
              <div class="numberPad-wrap" style="display:none">
	<ul class="numberPad" id="BPstake_numberPad">
    	<li><a href="javascript:void(0);" class="iNumber">1</a></li>
        <li><a href="javascript:void(0);" class="iNumber">2</a></li>
        <li><a href="javascript:void(0);" class="iNumber">3</a></li>
        <li><a href="javascript:void(0);" class="iNumber">4</a></li>
        <li><a href="javascript:void(0);" class="iNumber">5</a></li>
        <li><a href="javascript:void(0);" class="iNumber">6</a></li>
        <li><a href="javascript:void(0);" class="iNumber">7</a></li>
        <li><a href="javascript:void(0);" class="iNumber">8</a></li>
        <li><a href="javascript:void(0);" class="iNumber">9</a></li>
        <li><a href="javascript:void(0);" class="clear">clear</a></li>
        <li><a href="javascript:void(0);" class="iNumber">0</a></li>
        <li><a href="javascript:void(0);" class="enter">enter</a></li>
    </ul>
</div>
              <div id="divAcceptBetterOdds" class="checkbox txtleft" style="display: none;">
                <input id="cbAcceptBetterOdds" style="display: none;" name="cbAcceptBetterOdds" type="checkbox" checked value="1" onchange="SyncAcceptBetterOddsCheck(this);" />
                <div style="display: none;">ยอมรับราคาต่อรองที่ดีกว่า</div>
              </div>
              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabstyle02">
                <tr id="trlPayOut">
                  <th nowrap="nowrap" width="10px">การจ่ายเงิน</th>
                  <td >&nbsp;<span id="payOut" ></span><span id="scoremap" class="iconOdds scoreMap right" title="Score Map"></span></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">ขั้นต่ำ</th>
                  <td id="tdBetprocessMinBet" class="MinBet">THB&nbsp;<span id="spMinBetValue"></span></td>
                </tr>
                <tr>
                  <th nowrap="nowrap">มากที่สุด</th>
                  <td id="tdBetprocessMaxBet" nowrap="nowrap" class="MaxBet">THB&nbsp;<span id="spMaxBetValue"></span></td>
                </tr>
              </table>
            </div>
            <div class="BetProcessBtnBox">
              <div id="divAutoAccept" class="mag"><span id="btnAutoAccept"><span name="btnAutoAccept"></span></span>
                <input id="cbAutoAccept" name="cbAutoAccept" type="checkbox" value="1" style="display:none"/>
              </div>
              <div style="display:none"><input name="btnBPSubmit" type="text" class="Graybutton" value="ทำรายการ"/></div>
              <a id="btnBPSubmit" style="cursor:pointer;" type="submit" class="button mark" title="ทำรายการ"><span onclick="betSubmit('click');">ทำรายการ</span></a> 
              <a style="cursor:pointer;" type="button" onclick="javascript:ReloadWaitingBetList('yes','no','1');" class="button" title="ยกเลิก"><span>ยกเลิก</span></a> </div>
                <div id="BPOddsChangeAlert" class="tips box" style="display:none;">
                <div class="content info"></div>
                </div>
          </div>
        </div>
	<div class="leftBoxFoot"></div>
      <div class="Backmenu"><span class="icon-arrow"></span><a href="javascript:ReloadWaitingBetList('yes','no','1');">กลับไปที่เมนูหลัก</a></div>
      </div>
      <!-- BEGIN Horse Bet Process-->
      <div id="BP_RACE" style="display:none">
          <div class="leftBoxbody">
            <div class="boxbg">
              <div class="BetInfo">
                <div class="TextStyle01 pad"><span id="hrmenuTitle">เอาท์ไรท์</span><span id="hrtdBetKind"></span></div>
                <div id="">
                <div class="pad">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td id="hrChoiceClass" class="TextStyle02"><span id="hrspHome"></span></td>
                       <td align="right" valign="top"><img src ="template/public/images/space.gif" name="imgHorseJockey" width="21" height="21" id="imgHorseJockey" onerror="this.style.display='none'"/></td>
                    </tr>
              </table>
              </div>
                <div class="TextStyle04 pad"><span id="hrspAway"></span><br />
                <span id="hrspLeaguename" class="TextStyle07"></span><span id="VRaceOddsDisp1" class="TextStyle03">@ </span><span id="VRaceOddsDisp2" class="UdrDogOddsClassBetProcess"></span></div>
                </div>
                <div id="trOddsHorseFixedInfo">
                  <div id="tdHorseFixedBgColor">
                    <div id="HorseType41" style="display:none"><span>@</span> <span id="HFixedbodds1" style="display:none"></span></div>
                    <div id="HorseType43" style="display:none"><span>@</span> <span id="HFixedbodds2" style="display:none"></span> <span >@</span> <span id="HFixedbodds3" style="display:none"></span></div>
                    <div id="divHorseFixKeepBetProcess" class="checkbox mag">
                      <input id="HorseFixchKeepBet" name="HorseFixchKeepBet" type="checkbox" checked onclick="OddsKeepCountTime(this);"/>
                      <span id="HorseFixKeep"></span><a href="#" class="btnIcon right" title="รีเฟรช"><span class="icon-refresh"></span></a></div>
                  </div>
                </div>
                <div id="trHorseTotoKeep" class="checkbox txtleft" style="display:none">
                  <input id="FScreen" name="FScreen" type="checkbox" value="" checked onclick="FreezeScreen(this)"/>
                  <div>Freeze</div>
                </div>
                <div class="Currency pad mag">THB
                  <input id="HorseBPstake" name="HorseBPstake" type="text" size="10" class="deletable" style="ime-mode:disabled" onkeydown="return(validateOnKD(this, event));" onkeypress="return(validateOnKP(this, event,this.selectionStart));" onkeyup="payOutOnKU(this, event);" autocomplete="off" onpaste="return false;"/>
                <input id="HorseBPBetKey" name="HorseBPBetKey" type="hidden" />
                <div id="HRBPMinMaxBetAlert" class="tips" style="display:none;">
                <div class="content info"></div>
                </div>
                </div>
                <div id="hrtr_StakeMultiples"><span id="hrsp_stakeMultiples" class="TextStyle05"></span></div>
<div class="numberPad-wrap" style="display:none">
	<ul class="numberPad" id="HorseBPstake_numberPad">
    	<li><a href="javascript:void(0);" class="iNumber">1</a></li>
        <li><a href="javascript:void(0);" class="iNumber">2</a></li>
        <li><a href="javascript:void(0);" class="iNumber">3</a></li>
        <li><a href="javascript:void(0);" class="iNumber">4</a></li>
        <li><a href="javascript:void(0);" class="iNumber">5</a></li>
        <li><a href="javascript:void(0);" class="iNumber">6</a></li>
        <li><a href="javascript:void(0);" class="iNumber">7</a></li>
        <li><a href="javascript:void(0);" class="iNumber">8</a></li>
        <li><a href="javascript:void(0);" class="iNumber">9</a></li>
        <li><a href="javascript:void(0);" class="clear">clear</a></li>
        <li><a href="javascript:void(0);" class="iNumber">0</a></li>
        <li><a href="javascript:void(0);" class="enter">enter</a></li>
    </ul>
</div>
                <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabstyle02">
                <tr id="VR_tr1">
                  <th nowrap="nowrap">การจ่ายเงิน</th>
                  <td id="VRPayout"></td>
                </tr>
                  <tr id="VR_tr2" style="display:none">
                    <th nowrap="nowrap">อัตราจ่ายมากที่สุด</th>
                    <td><span id="VRMaxPayout"></span></td>
                  </tr>
                  <tr>
                    <th nowrap="nowrap">ขั้นต่ำ</th>
                    <td id="hrtdBetprocessMinBet" class="MinBet">THB&nbsp;<span id="hrspMinBetValue"></span></td>
                  </tr>
                  <tr>
                    <th nowrap="nowrap">มากที่สุด</th>
                    <td id="hrtdBetprocessMaxBet" nowrap="nowrap" class="MaxBet">THB&nbsp;<span id="hrspMaxBetValue"></span></td>
                  </tr>
                </table>
              </div>              
              <div class="BetProcessBtnBox">
                <a id='Race_btnBPSubmit' style="cursor:pointer" type="submit" class="button mark" title="ทำรายการ"><span onclick="betSubmit('click');">ทำรายการ</span></a> 
                <a style="cursor:pointer" type="button" onclick="javascript:ReloadWaitingBetList('yes','no','1');" class="button" title="ยกเลิก"><span>ยกเลิก</span></a> </div>
                <div id="HRBPOddsChangeAlert" class="tips box" style="display:none;">
                <div class="content info"></div>
                </div>
            </div>
          </div>
          <div class="leftBoxFoot"></div>
          <div class="Backmenu"><span class="icon-arrow"></span><a href="javascript:ReloadWaitingBetList('yes','no','1');">กลับไปที่เมนูหลัก</a></div>
      </div>
      <!-- END Horse Bet Process--> 

      <input type="hidden" id="stakeRequest" name="stakeRequest" />
      <input type="hidden" id="oddsRequest" name="oddsRequest"  />
      <input type="hidden" id="oddChange1" name="oddChange1" value="ราคาได้เปลี่ยนจาก" />
      <input type="hidden" id="oddChange2" name="oddChange2" value="ถึง" />
      <input type="hidden" id="MINBET" name="MINBET"  />
      <input type="hidden" id="MAXBET" name="MAXBET"  />
      <input type="hidden" id="bettype" name="bettype"  />
      <input type="hidden" id="lowerminmesg" name="lowerminmesg" value="จำนวนเงินที่คุณต้องการเล่นน้อยกว่าจำนวนเงินขั้นต่ำที่สามารถเล่นได้!" />
      <input type="hidden" id="highermaxmesg" name="highermaxmesg" value="จำนวนการร่วมสนุกของคุณมากกว่าที่กำหนดไว้!" />
      <input type="hidden" id="areyousuremesg" name="areyousuremesg" value="คุณแน่ใจที่จะทำการร่วมสนุกหรือไม่" />
      <input type="hidden" id="areyousuremesg1" name="areyousuremesg1" value="Your previous bet is still processing, are you sure you want to bet ?" />
      <input type="hidden" id="incorrectStakeMesg" name="incorrectStakeMesg" value="ไม่ถูกต้องเดิมพัน" />
      <input type="hidden" id="oddsWarning" name="oddsWarning" value="ข้อควรระวัง ! เราได้ปรับเปลี่ยนราคาใหม่ และ เงินที่สามารถเล่นได้ใหม่" />
      <input type="hidden" id="betconfirmmesg" name="betconfirmmesg" value="กรุณาคลิ๊กที่ปุ่ม OK เพื่อยืนยันการเดิมพัน" />
      <input type="hidden" id="siteType" name="siteType" value="" />
      <input type="hidden" id="hidStake10" name="hidStake10" value="Stake must be in multiples of 10" />
      <input type="hidden" id="hidStake20" name="hidStake20" value="Stake must be in multiples of 20" />
      <input type="hidden" id="hidStake2" name="hidStake2" value="Stake must be in multiples of 2" />
      <input type="hidden" id="sporttype" name="sporttype"  />
      <input type="hidden" name="username" value="B24T6099005" />
      <input type="hidden" id="oddsType" name="oddsType" />
    </form>
   </div> 
    <iframe name="ifmBetProcess_Data" id="ifmBetProcess_Data" src="" style="display:none"></iframe>
    <form name="fomBetProcess_Data" id="fomBetProcess_Data" action ="BetProcess_Data.php"  method="get"  target="ifmBetProcess_Data" autocomplete="off">
      <input type="hidden" id="bp_Match" name="bp_Match" value="" />
      <input type="hidden" id="UN" name="UN" value="" />
      <input type="hidden" id="bp_ssport" name="bp_ssport" value="" />
      <input type="hidden" id="chk_BettingChange" name="chk_BettingChange" value="" />
      <input type="hidden" name="k197183245" value="v197183445" />
      <input type="hidden" name="username" value="B24T6099005" />
      <input type="hidden" id="bp_key" name="bp_key" value="" />
      <input type="hidden" id="OddsType" name="OddsType" value="4" />
    </form>
    <iframe name="ifmBetProcess_Data_OT" id="ifmBetProcess_Data_OT" src="" style="display:none"></iframe>
    <form name="fomBetProcess_Data_OT" id="fomBetProcess_Data_OT" action ="outright/BetProcess_Data.php"  method="post"  target="ifmBetProcess_Data_OT" autocomplete="off">
      <input type="hidden" id="otbp_Match" name="otbp_Match" value="" />
      <input type="hidden" name="username" value="B24T6099005" />
      <input type="hidden" id="OddsType" name="OddsType" value="4" />
    </form>
  </div>
  <!-- END Bet Process--> 
  <!-- BEGIN Phone Bet Process-->
  <div id="BetProcessPhoneContainer" style="display:none">
    <iframe name="ifmConfirmBetPhone" id="ifmConfirmBetPhone" src="" style="display:none"></iframe>
    <form name="fomConfirmBetPhone" onsubmit="return formvalidationP('fomConfirmBetPhone');" method="post"  target="ifmConfirmBetPhone" autocomplete="off">
      <div id="BetProcessPhoneData" class="REFRESH_menu"></div>
      <div id="BetProcessPhoneDataOT" class="REFRESH_menu"><span>เอาท์ไรท์</span></div>
      <div class="account_body">
        <table width="95%" border="0" align="center" cellpadding="5" cellspacing="3" class="tab_border">
          <tr>
            <td id="PhoneBetKind" colspan="2" align="center"><span id="spBetKind_P" class="text_black12B"></span><br />
              <span id="spOddsStatus_P"></span> 
              <!-- Add class {{oddsStatusClass}} --></td>
          </tr>
          <tr>
            <td id="tdLiveBgColor_P" colspan="2" align="center" class="bet"><span id="spChoiceClass_P"></span> <span id="sbBetKindValue_P" class="HdpGoalClass"></span>
              <div id="phoneOutright" style="display:none"> <b><span class="FavTeamClass" id="ot_p_spChoiceValue"></span><br/>
                <input type="hidden" name="ot_hdp1Value" id="ot_hdp1Value" onclick="select();" style="ime-mode:disabled" onkeydown="onKeyDownFunc('odds',event);" class="style_14BG" />
                <input type="hidden"  name="ot_hdp2Value"  id="ot_hdp2Value" />
                @
                <input name="odds" id="odds" type="text" size="5" onclick="select();" style="ime-mode:disabled" onkeydown="onKeyDownFunc('BPstake_P',event);" onkeypress="return(validateOnKPPhone(this, event,'oddsField'));" value="" class="" />
                </b> </div>
              <div id="phoneInputBox1" style="display:none">
                <input name="bp_hdp1Value_1" id="bp_hdp1Value_1" type="hidden" size="0" style="ime-mode:disabled" onclick="select();" onkeydown="return(validateOnKPPhone(this, event,'hdpField'));" class="style_14BG" />
                <input type="hidden" size="0" name="bp_hdp2Value_1"  id="bp_hdp2Value_1" />
                @
                <input name="bp_odds1" id="bp_odds1" type="text" size="5" onclick="select();" style="ime-mode:disabled" onkeydown="onKeyDownFunc('BPstake_P',event);" onkeypress="return(validateOnKPPhone(this, event,'oddsField'));" />
              </div>
              <div id="phoneInputBox2" style="display:none">
                <input name="bp_hdp1Value_2" id="bp_hdp1Value_2" type="text" size="3" style="ime-mode:disabled" onclick="select();" onkeydown="onKeyDownFunc('bp_odds2',event);" onkeypress="return(validateOnKPPhone(this, event,'hdpField'));" class="style_14BG" />
                <input type="hidden" size="1" onclick="select();" style="ime-mode:disabled" onkeydown="return(validateOnKPPhone(this, event,'hdpField'));" name="bp_hdp2Value_2"  id="bp_hdp2Value_2" />
                @
                <input name="bp_odds2" id="bp_odds2" type="text" size="5" onclick="select();" style="ime-mode:disabled" onkeydown="onKeyDownFunc('BPstake_P',event);" onkeypress="return(validateOnKPPhone(this, event,'oddsField'));" />
              </div>
              <div id="phoneInputBox3" style="display:none"> <span id="BetKindValue"></span>
                <input name="bp_hdp1Value_3" id="bp_hdp1Value_3" size="2" onclick="select();" style="ime-mode:disabled" onkeydown="onKeyDownFunc('bp_hdp2Value_3',event);" onkeypress="return(validateOnKPPhone(this, event,'hdpField'));" type="text" class="style_14BG" />
                <input name="bp_hdp2Value_3" id="bp_hdp2Value_3" size="2" onclick="select();" style="ime-mode:disabled" onkeydown="onKeyDownFunc('bp_odds3',event)" onkeypress="return(validateOnKPPhone(this, event,'hdpField'));" type="text" class="style_14BG" />
                <br />
                @
                <input name="bp_odds3" id="bp_odds3" type="text" size="5" onclick="select();" style="ime-mode:disabled" onkeydown="onKeyDownFunc('BPstake_P',event);" onkeypress="return(validateOnKPPhone(this, event,'oddsField'));" />
              </div></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><div align="left" class="betlist_B"><span id="spHome_P"></span></div></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><div align="left" class="betlist_B"><span id="spAway_P"></span></div></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><div align="left" class="betlist_B"><span class="betlist_BL" id="spLeaguename_P"></span></div></td>
          </tr>
          <tr>
            <td height="36" colspan="2" align="center"><span class="text_blue12B" id="BetCurrency_P">THB</span>
              <input id="BPstake_P" name="BPstake_P" type="text" autocomplete="off" size="10" class="deletable" style="ime-mode:disabled" onkeydown="onKeyDownFunc('liveScoreH',event);" onkeypress="return(validateOnKPPhone(this, event,'stakeField'));" onkeyup="payOutOnKU(this, event);" onpaste="return false;"/></td>
              <input id="BPBetKey_P" name="BPBetKey_P" type="hidden" />
          </tr>
          <tr>
            <td colspan="2"  align="center"><div id="liveScoreContainer" style="display:none"> [
                <input name="liveScoreH" id="liveScoreH" size="1" onclick="select();" style="ime-mode:disabled" onkeydown="onKeyDownFunc('liveScoreA',event);" onkeypress="return(validateOnKPPhone(this, event,'scoreField'));" type="text" class="style_14BG" />
                :
                <input name="liveScoreA" id="liveScoreA" size= "1" onclick="select();" style="ime-mode:disabled" onkeydown="onKeyDownFunc('BPstake_P',event);" onkeypress="return(validateOnKPPhone(this, event,'scoreField'));" type="text" class="style_14BG" />
                ] </div></td>
          </tr>
          <tr id="trlPayOut_P" bordercolor="#ECECEC">
            <td nowrap="nowrap">การจ่ายเงิน</td>
            <td bordercolor="#FBFFFF" class="text_black11" align="right" id="payOut_P"></td>
          </tr>
          <tr bordercolor="#ECECEC">
            <td nowrap="nowrap">ขั้นต่ำ</td>
            <td align="right" bordercolor="#FBFFFF" class="BetprocessMinBet">THB&nbsp; <span id="spMinBetValue_P"></span></td>
          </tr>
          <tr bordercolor="#ECECEC">
            <td height="22" class="td" nowrap="nowrap">มากที่สุด</td>
            <td align="right" bordercolor="#FBFFFF" class="BetprocessMaxBet">THB&nbsp; <span id="spMaxBetValue_P"></span></td>
          </tr>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center"><input id="btnBPSubmit_P" name="btnBPSubmit_P" type="submit" class="font11" value="ทำรายการ" />
              <input type="button" class="font11" value="ยกเลิก" onclick="javascript:ReloadWaitingBetList('yes','no');" /></td>
          </tr>
          <tr id="tr1X2AsiaHdp" style="display:none">
            <td align="center"><input id="btnBPSubmit_P1" name="btnBPSubmit_P1" type="button" class="font11" style="width:135px;" onclick="Using1X2AsiaHdp();" value="1X2AHDP" />
              <input id="cb1X2AsiaHdp" name="cb1X2AsiaHdp" type="checkbox" value="1" style="display:none"/></td>
          </tr>
        </table>
        <table>
          <tr>
            <td><div id="RemarkContainer" style="display:none">Remark:<br />
                <input name="bettingGraphRemark" id= "bettingGraphRemark" type="text" />
                <font class="style_14BG"><br />
                <input name="bettingGraphButton" id="bettingGraphButton" type="submit" class="style_10B" value="Submit Remark" />
                </font> </div></td>
          </tr>
        </table>
      </div>
      <div class="account_foot"></div>
      <div class="Backmenu"><span class="icon-arrow"></span><a href="javascript:ReloadWaitingBetList('yes','no','1');">กลับไปที่เมนูหลัก</a></div>
      <input type="hidden" id="stakeRequest_P" name="stakeRequest_P" />
      <input type="hidden" id="oddsRequest_P" name="oddsRequest_P"  />
      <input type="hidden" id="oddChange1_P" name="oddChange1_P" value="ราคาได้เปลี่ยนจาก" />
      <input type="hidden" id="oddChange2_P" name="oddChange2_P" value="ถึง" />
      <input type="hidden" id="MINBET_P" name="MINBET_P"  />
      <input type="hidden" id="MAXBET_P" name="MAXBET_P"  />
      <input type="hidden" id="bettype_P" name="bettype_P"  />
      <input type="hidden" value="10" id="ot_p_hidBettype" name="ot_p_hidBettype" />
      <input type="hidden" id="lowerminmesg_P" name="lowerminmesg_P" value="จำนวนเงินที่คุณต้องการเล่นน้อยกว่าจำนวนเงินขั้นต่ำที่สามารถเล่นได้!" />
      <input type="hidden" id="highermaxmesg_P" name="highermaxmesg_P" value="จำนวนการร่วมสนุกของคุณมากกว่าที่กำหนดไว้!" />
      <input type="hidden" id="areyousuremesg_P" name="areyousuremesg_P" value="คุณแน่ใจที่จะทำการร่วมสนุกหรือไม่" />
      <input type="hidden" id="areyousuremesg_P1" name="areyousuremesg_P1" value="Your previous bet is still processing, are you sure you want to bet ?" />
      <input type="hidden" id="oddsWarning_P" name="oddsWarning_P" value="ข้อควรระวัง ! เราได้ปรับเปลี่ยนราคาใหม่ และ เงินที่สามารถเล่นได้ใหม่" />
      <input type="hidden" id="betconfirmmesg_P" name="betconfirmmesg_P" value="กรุณาคลิ๊กที่ปุ่ม OK เพื่อยืนยันการเดิมพัน" />
      <input type="hidden" id="liveIndicator_P" name="liveIndicator_P" />
      <input type="hidden" id="siteType_P" name="siteType_P" value="" />
      <input type="hidden" name="username" value="B24T6099005" />
      <input type="hidden" id="oddsType_P" name="oddsType_P" />
    </form>
    <iframe name="ifmBetProcessPhone_Data" id="ifmBetProcessPhone_Data" src="" style="display:none"></iframe>
    <form name="fomBetProcessPhone_Data" id="fomBetProcessPhone_Data" action ="BetProcess_Data.php"  method="post"  target="ifmBetProcessPhone_Data" autocomplete="off">
      <input type="hidden" id="bp_p_Match" name="bp_p_Match" value="" />
      <input type="hidden" id="bp_p_ssport" name="bp_p_ssport" value="" />
      <input type="hidden" name="k197183245" value="v197183445" />
      <input type="hidden" name="username" value="B24T6099005" />
      <input type="hidden" id="bp_p_key" name="bp_p_key" value="" />
      <input type="hidden" id="OddsType" name="OddsType" value="4" />
    </form>
    <iframe name="ifmBetProcess_Data_OTP" id="ifmBetProcess_Data_OTP" src="" style="display:none"></iframe>
    <form name="fomBetProcess_Data_OTP" id="fomBetProcess_Data_OTP" action ="outright/BetProcess_Data.php"  method="post"  target="ifmBetProcess_Data_OTP" autocomplete="off">
      <input type="hidden" id="otpbp_Match" name="otpbp_Match" value="" />
      <input type="hidden" name="username" value="B24T6099005" />
      <input type="hidden" id="OddsType" name="OddsType" value="4" />
    </form>
  </div>
  <!-- END Phone Bet Process--> 
  <!-- BEGIN Success Bet-->
  <div id="SuccessBetContainer" style="display:none">
    <div class="leftBoxTitle"><span class="icon-arrow"></span><span class="titleTxt">Success Bet</span></div>
    <div class="leftBoxbody">
      <div class="boxbg">
        <div class="BetInfo">
          <div class="TextStyle01 pad">หมายเลขอ้างอิง : <span id="su_spRefnoValue"></span><br />
            <span id="su_spTypeName"></span></div>
          <div class="TextStyle04 pad"><span id="su_spHome" class="FavTeamClass"></span><span id="su_spvs"> -vs- </span><span id="su_spAway" class="UdrDogTeamClass"></span>
            <div id="su_tdLeaguename"></div><div id="su_Aos" class="TextStyle04"></div>
          </div>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabstyle02">
            <tr>
              <th id="su_tdBetKind" nowrap="nowrap"></th>
              <td id=""><b id="su_spBetKindValue"></b></td>
            </tr>
            <tr>
              <th title="ราคาน้ำ">ราคาน้ำ</th>
              <td><b id="su_spOddsValue"></b></td>
            </tr>
            <tr>
              <th title="รายการ">รายการ</th>
              <td class="MaxBet"><b id="su_spChoiceValue"></b></td>
            </tr>
            <tr>
              <th title="เงินที่วางเดิมพัน">เงินที่วางเดิมพัน</th>
              <td class="TextStyle07">THB&nbsp;<span id="su_spStakeValue"></span></td>
            </tr>
            <tr>
              <th title="สถานะ">สถานะ</th>
              <td id="su_spStatusValue" class="MaxBet"></td>
            </tr>
            <tr>
              <th title="กำลังปรับสถานะ ในการชนะ">กำลังปรับสถานะ ในการชนะ</th>
              <td class="MaxBet">THB&nbsp;<span id="su_spPwinningValue"></span></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="leftBoxFoot"></div>
    <input type='hidden' name='liveindicator' id='liveindicator'  />
    <input type='hidden' name='successInfo1' id='successInfo1' value='การวางเดิมพันสด
สถานะที่แสดงว่าให้รอ Waiting หมายถึง การวางเดิมพันของท่านกำลังดำเนินการอยู่
สถานะที่แสดงว่า Running หมายถีง การวางเดพิมพันของท่านได้รับการยอมรับแล้ว
กรุณารอซัก 2-3 วินาที การวางเดิมพันของท่านกำลังถูกดำเนินการ
กรุณาคลิ๊กที่ปุ่ม Refresh Status เพื่อตรวจสอบสถานะของท่าน ขอบคุณคะ' />
    <input type='hidden' name='successInfo2' id='successInfo2' value='การวางเดิมพันสมบูรณ์แล้ว กรุณาคลิ๊กที่ปุ่ม BET LIST เพื่อตรวจสอบรายการที่เล่น
คุณอาจจะทำการถ่ายสำเนารายการที่คุณเล่นเพื่อใช้อ้างอิง' />
    <iframe name="ifmSuccessBet" id="ifmSuccessBet" src="" style="display:none"></iframe>
    <form name="fomSuccessBet" action ="underover/successbet_data.php"  method="post"  target="ifmSuccessBet">
    </form>
  </div>
  <!-- END Success Bet--> 
  <!-- MixParlay Session -->
  <div id="div_MixParlay"  style="display:none">
    <form name="betform" id="betform" method="post" target="iframMixParlay" autocomplete="off">
      <div id="ParlayTitle" class="leftBoxTitle current"><span class="icon-arrow"></span><span  class="titleTxt">บอลชุด</span></div>
      <div class="leftBoxbody">
        <div class="boxbg multiple">
        <div id="noparlayinfo" style="background-color:#FFFFFF" class="BetInfo">
            <div class="TextStyle04">จำนวนทีมที่เลือกไม่เพียงพอ ( ต้องอย่างน้อย2คู่ ) เพื่อจะเล่นบอลชุด</div>	
        </div>
          <div id="ParlayDetail"></div>
          <div id="divKeepOdds">
            <!-- <div class="checkbox txtleft">
              <input id="cbKeepOdds" name="cbKeepOdds" type="checkbox"  value="1" />
              <div> Auto accept any odds</div>
            </div> -->
            <div class="line mag"></div>
            </div>
            <div class="combo-item displayOff" id="combo_t">
              <!-- <div class="helpbox">Parlay Tutorial <a href="Sys_Parlay_Help.php" target="sys_parlay_help" title="ช่วยเหลือ"><span class="iconOdds help"></span></a></div> -->
              <!-- <div id="ComboAllSwitch" class="checkbox txtleft" onclick="ComboSwitch(this);">
                <input id="ComboAllSwitchfromCkB" name="cbCombiOdds" type="checkbox" value="1" onclick="this.checked=!this.checked"/>
                <div><span>เลือกทั้งหมด</span></div>
              </div> -->
        	</div>
            <div class="combo-list">
              <ul id="ComboStakeList">
              </ul>
            </div>
            <div id="Div_Over100" class="tips box" style="display:none">
                <div class="content info"> Selection limit for parlay had been exceeded. Maximum <em>100</em> selections are allowed. Please reduce the selections.</div>
            </div>
            <div id="Div_Over8" class="tips box" style="display:none">
                <div class="content info"> Selection limit for parlay had been exceeded. Maximum <em>8</em> selections are allowed. Please reduce the selections.</div>
            </div>
          <div id="parlay_bet_info">
          <div id="ParlayBPMinMaxBetAlert" class="tips" style="display:none;">
                <div class="content info"></div>
                </div>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabstyle02">
          
            <tr id="tr_mixparlay_odds" style="display:none;">
              <th>ราคาน้ำ</th>
              <td><span id="TotalOdds" style="display:none;"> </span><span id="CombiOdds" style="display:none;"> </span></td>
            </tr>
            
            <tr id="spb" class="stakePerBet">
            <th colspan="2">
                  <div class="stakePerBetTitle"><strong>เงินเดิมพันต่อครั้ง</strong></div>
                  <!-- <div class="stakePerBetTitle" onclick="ComboSwitch(this);"><strong>เงินเดิมพันต่อครั้ง</strong></div> -->
                  <div class="Currency pad mag">THB
                    <input id="stake" name="stake" autocomplete="off" type="text" size="10" class="deletable" style="ime-mode:disabled"  onkeypress="return checkKeyPress(this,event,this.selectionStart)" onkeyup="checkCombiValue(this,event)"  onpaste="return false" />
                    <span></span></div>
                  <input id="BetKey" name="BetKey" type="hidden" />
             </th>
            <!--<th colspan="2"><strong>เงินเดิมพันต่อครั้ง</strong>
                  <div class="Currency pad mag">THB
                    <input id="stake" name="stake" autocomplete="off" type="text" size="10" class="deletable" style="ime-mode:disabled"  onkeypress="return checkKeyPress(this,event,this.selectionStart)" onkeyup="checkCombiValue(this,event)"  onpaste="return false" />
                    <span></span></div>
                  <input id="BetKey" name="BetKey" type="hidden" />
             </th>-->
            </tr>
<tr id="numberPad_tr" style="display:none">
<td colspan="2"><div class="numberPad-wrap" style="display:none">
	<ul class="numberPad" id="stake_numberPad">
    	<li><a href="javascript:void(0);" class="iNumber">1</a></li>
        <li><a href="javascript:void(0);" class="iNumber">2</a></li>
        <li><a href="javascript:void(0);" class="iNumber">3</a></li>
        <li><a href="javascript:void(0);" class="iNumber">4</a></li>
        <li><a href="javascript:void(0);" class="iNumber">5</a></li>
        <li><a href="javascript:void(0);" class="iNumber">6</a></li>
        <li><a href="javascript:void(0);" class="iNumber">7</a></li>
        <li><a href="javascript:void(0);" class="iNumber">8</a></li>
        <li><a href="javascript:void(0);" class="iNumber">9</a></li>
        <li><a href="javascript:void(0);" class="clear">clear</a></li>
        <li><a href="javascript:void(0);" class="iNumber">0</a></li>
        <li><a href="javascript:void(0);" class="enter">enter</a></li>
    </ul>
</div> </td>
</tr>
            <!-- <tr>
              <th id="Th1"><span class="wrap">เดิมพันรวม</span></th>
              <td>&nbsp;<span id="TotalBetsValue"></span></td>
            </tr>
            <tr>
              <th id="TotalStakeName"><span class="wrap">เงินวางเดิมพันทั้งหมด</span></th>
              <td>&nbsp;<span id="TotalStakeValue"></span></td>
            </tr> -->
            <tr>
              <th><span class="wrap">อัตราจ่ายมากที่สุด</span></th>
              <td>&nbsp;<span id="txtPayOut"></span></td>
            </tr>
            <tr>
              <th><span class="wrap">ขั้นต่ำ</span></th>
              <td id="tdMixParlayMinBet" class="MinBet"><span id="mincurrency">Currency</span> &nbsp;<span id="MPMinBet"></span></td>
            </tr>
            <!--備註移除
            <tr>
              <th>มากที่สุด</th>
              <td id="tdMixParlayMaxBet" class="MaxBet"><span id="maxcurrency">Currency</span> &nbsp;<span id="MPMaxBet"></span></td>
            </tr>-->
          </table>
          </div>
          <div id="parlay_bet_info2">
            <div class="BetProcessBtnBox">
              <div style="display:none"><input name="btnMPSubmit" type="text" value="ทำรายการ" class="Graybutton"/></div>
              <a id="btnMPSubmit" style="cursor:pointer" type="submit" class="button mark" title="ทำรายการ"><span onclick="betSubmitMP('click');">ทำรายการ</span></a> 
              <a style="cursor:pointer" type="button" onclick="ClearParlay();" class="button" title="ยกเลิก"><span>ยกเลิก</span></a></div>
              <div id="ParlayOddsChangeAlert" class="tips box" style="display:none;">
                <div class="content info"></div>
                </div>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td ><div id="PhoneRemarkContainer" style="display:none">Remark:<br />
                    <input name="bettingGraphRemark" id= "Text1" type="text" />
                    <font class="style_14BG"><br />
                    <!--<input name="phonebettingGraphButton" id="phonebettingGraphButton" type="submit" class="style_10B" value="Submit Remark" />-->
                    </font> </div></td>
              </tr>
            </table>
            <input type="hidden" value="1" name="LOGIN" />
            <input type="hidden" name="BALANCE" />
            <input type="hidden" name="PLAFOND" />
            <input type='hidden' name='count' value='' />
            <input type="hidden" name="sport" value="1" />
            <input type='hidden' name='MAXBET' value='' />
            <input type='hidden' name='MINBET' value='' />
            <input type='hidden' name='AdminLevel' value='' />
            <input type="hidden" name="yousuretobetmesg" value="คุณแน่ใจที่จะทำการร่วมสนุกหรือไม่" />
            <input type="hidden" name="yousuretobetmesg1" value="Your previous bet is still processing, are you sure you want to bet ?" />
            <input type="hidden" name="morethan2" value="บันทึกรายการเดิมพันต้องมีมากกว่า 2" />
            <input type="hidden" name="lowermin" value="จำนวนเงินที่คุณต้องการเล่นน้อยกว่าจำนวนเงินขั้นต่ำที่สามารถเล่นได้!" />
            <input type="hidden" name="highermax" value="จำนวนการร่วมสนุกของคุณมากกว่าที่กำหนดไว้!" />
            <input type="hidden" name="username"  />
          </div>
        </div>
      </div>
      <div class="account_foot"></div>
      <div class="Backmenu"><span class="icon-arrow"></span><a href="javascript:ReloadWaitingBetList('yes','no');">กลับไปที่เมนูหลัก</a></div>
    </form>
  </div>
  <!-- End of MixParlay Session --> 
  <!-- BEGIN Bingo Bet Process-->
  <div id="BingoBetProcessContainer" style="display:none">
    <iframe name="ifmBingoConfirmBet" id="Iframe1" src="" style="display:none"></iframe>
    <form name="fomBingoConfirmBet" method="post"  target="ifmBingoConfirmBet" autocomplete="off">
      <div class="leftBoxbody">
        <div class="boxbg">
          <div id="Bingo_BetInfo" class="BetInfo">
            <div class="TextStyle01 pad"><span id="Bingo_menuTitle"></span> <span id="Bingo_tdBetKind"></span></div>
            <div id="Bingo_trOddsInfo">
              <div id="Bingo_tdLiveBgColor">
                <div class="pad"> <span id="Bingo_spChoiceClass" onmousemove="NumberGroupTitle(this);" class="TextStyle02"></span><br/>
                  <span id="Bingo_sbBetKindValue" class="TextStyle03"></span><span id="Bingo_spScoreValue" class="TextStyle01"></span><span class="TextStyle03">@</span> <span id="Bingo_bodds"></span></div>
              </div>
              <div id="Bingo_divKeepBetProcess" class="checkbox">
                  <input id="Bingo_chKeepBet" name="Bingo_chKeepBet" type="checkbox" checked onclick="OddsKeepCountTime(this);"/>
                  <span id="Bingo_KeepOdds"></span></div>
            </div>
            <div class="TextStyle04 pad"><span id="Bingo_spGameNo"></span></div>
            <div id="Bingo_LeagueName_id" class="TextStyle07"><span id="Bingo_LeagueName"></span></div>
            <div class="Currency pad mag">THB
              <input id="Bingo_BPstake" name="Bingo_BPstake" type="text" size="10" class="deletable" style="ime-mode:disabled" onkeydown="return(validateOnKD(this, event));" onkeypress="return(validateOnKP(this, event,this.selectionStart));" onkeyup="payOutOnKU(this, event);" onpaste="return false;" />
                <input id="Bingo_BPBetKey" name="Bingo_BPBetKey" type="hidden" />
                <div id="Bingo_BPMinMaxBetAlert" class="tips" style="display:none;">
                <div class="content info"></div>
                </div>
            </div>
            <div id="Bingo_tr_StakeMultiples"><span id="Bingo_sp_stakeMultiples" class="TextStyle05"></span></div>
<div class="numberPad-wrap" style="display:none">
	<ul class="numberPad" id="Bingo_BPstake_numberPad">
    	<li><a href="javascript:void(0);" class="iNumber">1</a></li>
        <li><a href="javascript:void(0);" class="iNumber">2</a></li>
        <li><a href="javascript:void(0);" class="iNumber">3</a></li>
        <li><a href="javascript:void(0);" class="iNumber">4</a></li>
        <li><a href="javascript:void(0);" class="iNumber">5</a></li>
        <li><a href="javascript:void(0);" class="iNumber">6</a></li>
        <li><a href="javascript:void(0);" class="iNumber">7</a></li>
        <li><a href="javascript:void(0);" class="iNumber">8</a></li>
        <li><a href="javascript:void(0);" class="iNumber">9</a></li>
        <li><a href="javascript:void(0);" class="clear">clear</a></li>
        <li><a href="javascript:void(0);" class="iNumber">0</a></li>
        <li><a href="javascript:void(0);" class="enter">enter</a></li>
    </ul>
</div>
            <div id="Bingo_divAcceptBetterOdds" class="checkbox txtleft">
              <input id="Bingo_cbAcceptBetterOdds" name="Bingo_cbAcceptBetterOdds" type="checkbox" checked value="1" onchange="SyncAcceptBetterOddsCheck(this);" />
              <div>ยอมรับราคาต่อรองที่ดีกว่า</div>
            </div>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabstyle02">
              <tr id="Bingo_trlPayOut">
                <th nowrap="nowrap" width="10px">การจ่ายเงิน</th>
                <td >&nbsp;<span id="Bingo_payOut" ></span></td>
              </tr>
              <tr>
                <th nowrap="nowrap">ขั้นต่ำ</th>
                <td id="Bingo_tdBetprocessMinBet" class="MinBet">THB&nbsp; <span id="Bingo_spMinBetValue"></span></td>
              </tr>
              <tr>
                <th nowrap="nowrap">มากที่สุด</th>
                <td id="Bingo_tdBetprocessMaxBet" nowrap="nowrap" class="MaxBet">THB&nbsp; <span id="Bingo_spMaxBetValue"></span></td>
              </tr>
            </table>
          </div>
          <div class="BetProcessBtnBox">
            <div style="display:none"><input name="Bingo_btnBPSubmit" type="text" value="ทำรายการ" class="Graybutton"/></div>
            <a id="Bingo_btnBPSubmit" style="cursor:pointer" type="submit" class="button mark" title="ทำรายการ"><span onclick="betSubmitBingo('click');">ทำรายการ</span></a> 
            <a style="cursor:pointer" type="button" onclick="javascript:ReloadWaitingBetList('yes','no','1');" class="button" title="ยกเลิก"><span>ยกเลิก</span></a> </div>
            <div id="Bingo_BPOddsChangeAlert" class="tips box" style="display:none;">
                <div class="content info"></div>
                </div>
        </div>
      </div>
      <div class="leftBoxFoot"></div>
      <div class="Backmenu"><span class="icon-arrow"></span><a href="javascript:ReloadWaitingBetList('yes','no','1');">กลับไปที่เมนูหลัก</a></div>
      <input type="hidden" id="Bingo_stakeRequest" name="Bingo_stakeRequest" />
      <input type="hidden" id="Bingo_oddsRequest" name="Bingo_oddsRequest"  />
      <input type="hidden" id="Bingo_oddChange1" name="Bingo_oddChange1" value="ราคาได้เปลี่ยนจาก" />
      <input type="hidden" id="Bingo_oddChange2" name="Bingo_oddChange2" value="ถึง" />
      <input type="hidden" id="Bingo_MINBET" name="Bingo_MINBET"  />
      <input type="hidden" id="Bingo_MAXBET" name="Bingo_MAXBET"  />
      <input type="hidden" id="Bingo_bettype" name="Bingo_bettype"  />
      <input type="hidden" id="Bingo_lowerminmesg" name="Bingo_lowerminmesg" value="จำนวนเงินที่คุณต้องการเล่นน้อยกว่าจำนวนเงินขั้นต่ำที่สามารถเล่นได้!" />
      <input type="hidden" id="Bingo_highermaxmesg" name="Bingo_highermaxmesg" value="จำนวนการร่วมสนุกของคุณมากกว่าที่กำหนดไว้!" />
      <input type="hidden" id="Bingo_areyousuremesg" name="Bingo_areyousuremesg" value="คุณแน่ใจที่จะทำการร่วมสนุกหรือไม่" />
      <input type="hidden" id="Bingo_areyousuremesg1" name="Bingo_areyousuremesg1" value="Your previous bet is still processing, are you sure you want to bet ?" />
      <input type="hidden" id="Bingo_incorrectStakeMesg" name="Bingo_incorrectStakeMesg" value="ไม่ถูกต้องเดิมพัน" />
      <input type="hidden" id="Bingo_oddsWarning" name="Bingo_oddsWarning" value="ข้อควรระวัง ! เราได้ปรับเปลี่ยนราคาใหม่ และ เงินที่สามารถเล่นได้ใหม่" />
      <input type="hidden" id="Bingo_betconfirmmesg" name="Bingo_betconfirmmesg" value="กรุณาคลิ๊กที่ปุ่ม OK เพื่อยืนยันการเดิมพัน" />
      <input type="hidden" id="Bingo_siteType" name="Bingo_siteType" value="" />
      <input type="hidden" id="Bingo_hidStake10" name="Bingo_hidStake10" value="Stake must be in multiples of 10" />
      <input type="hidden" id="Bingo_hidStake20" name="Bingo_hidStake20" value="Stake must be in multiples of 20" />
      <input type="hidden" id="Bingo_sporttype" name="Bingo_sporttype"  />
      <input type="hidden" name="Bingo_username"  />
      <input type="hidden" id="Bingo_oddsType" name="Bingo_oddsType" />
    </form>
    <iframe name="Bingo_ifmBetProcess_Data" id="Bingo_ifmBetProcess_Data" src="" style="display:none"></iframe>
    <form name="Bingo_fomBetProcess_Data" id="Bingo_fomBetProcess_Data" action ="bingo/BetProcess_Data.php"  method="post"  target="Bingo_ifmBetProcess_Data" autocomplete="off">
      <input type="hidden" id="Bingo_bp_Match" name="Bingo_bp_Match" value="" />
      <input type="hidden" id="Bingo_bp_ssport" name="Bingo_bp_ssport" value="" />
      <input type="hidden" id="Bingo_chk_BettingChange" name="Bingo_chk_BettingChange" value="" />
      <input type="hidden" name="username" value="B24T6099005" />
      <input type="hidden" id="Bingo_bp_key" name="Bingo_bp_key"  />
      <input type="hidden" id="OddsType" name="OddsType" value="4" />
    </form>
  </div>
  <!-- END Bingo Bet Process--> 



    <!-- BEGIN Lucky3 Bet Process-->
    <div id="Lucky3BetProcessContainer" style="display:none">
        <iframe name="ifmLucky3ConfirmBet" id="Iframe1" src="" style="display:none"></iframe>
        <form name="fomLucky3ConfirmBet" method="post" target="ifmLucky3ConfirmBet" autocomplete="off" action="/lucky3/confirm_bet_data.php">
            <div class="leftBoxbody">
                <div class="boxbg">
                    <div id="Lucky3_BetInfo" class="BetInfo liveligh">
                        <div class="TextStyle01 pad">
                            <span>{{SportTypeName}}</span>
                            <div id="Lucky3_trOddsInfo">
                                <div id="Lucky3_tdLiveBgColor" class="bet">
                                    <div class="pad">
                                        <span id="Lucky3_spChoiceClass" class="TextStyle02">
                                            <span class="lottoBall red">29</span>
                                            <span class="lottoBall red">45</span>
                                            <span class="lottoBall blue">7</span>
                                        </span><br />
                                        <span class="UdrDogOddsClassBetProcess">1</span> <span class="TextStyle01">{{Combinations}}</span><br />
                                        <span class="UdrDogOddsClassBetProcess">10</span> <span class="TextStyle01">{{Draws}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="TextStyle07"><span id="Lucky3_LeagueName">{{SportTypeName}}</span></div>
                            <div class="Currency pad mag">
                                THB
                                <span class="right" id="unitPrice"></span>
                                <br clear="all" />
                            </div>
                            <div class="Currency pad mag">
                                {{Bets}}
                                <div class="right lotto-bets">
                                    <a href="#" class="button mark"><span><i class="min"></i></span></a>
                                    <a href="#" class="button mark"><span><i class="minus"></i></span></a>
                                    <input id="Lucky3_Bets" type="text" value="1" />
                                    <a href="#" class="button mark"><span><i class="plus"></i></span></a>
                                    <a href="#" class="button mark"><span><i class="max"></i></span></a>
                                </div>
                                <br clear="all" />
                            </div>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabstyle02">
                                <tbody>
                                    <tr>
                                        <th nowrap="nowrap">เงินวางเดิมพันทั้งหมด</th>
                                        <td id="Lucky3_TotalStakes"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="BetProcessBtnBox">
                            <div style="display:none"><input name="Lucky3_btnBPSubmit" type="text" value="Process Bet" class="Graybutton" /></div>
                            <a id="Lucky3_btnBPSubmit" style="cursor:pointer" type="submit" class="button mark" title="Process Bet"><span onclick="betSubmitLucky3('click');">Process Bet</span></a>
                            <a style="cursor:pointer" type="button" onclick="javascript:ReloadWaitingBetList('yes','no','1');" class="button" title="Cancel"><span>Cancel</span></a>
                        </div>
                        <div class="tips box">
                            <div id="Lucky3_Msg" class="content info"></div>
                        </div>
                    </div>
                </div>
                <div class="leftBoxFoot"></div>
                <div class="Backmenu"><span class="icon-arrow"></span><a href="javascript:ReloadWaitingBetList('yes','no','1');">Back to Menu</a></div>
                <input type="hidden" id="Lucky3_stakeRequest" name="Lucky3_stakeRequest" value="" />
                <input type="hidden" id="Lucky3_oddsRequest" name="Lucky3_oddsRequest" value="69.52" />
                <input type="hidden" id="Lucky3_oddChange1" name="Lucky3_oddChange1" value="Odds has changed from" />
                <input type="hidden" id="Lucky3_oddChange2" name="Lucky3_oddChange2" value="to" />
                <input type="hidden" id="Lucky3_MINBET" name="Lucky3_MINBET" value="1" />
                <input type="hidden" id="Lucky3_MAXBET" name="Lucky3_MAXBET" value="5" />
                <input type="hidden" id="Lucky3_bettype" name="Lucky3_bettype" value="1600" />
                <input type="hidden" id="Bingo_lowerminmesg" name="Lucky3_lowerminmesg" value="จำนวนเงินที่คุณต้องการเล่นน้อยกว่าจำนวนเงินขั้นต่ำที่สามารถเล่นได้!" />
                <input type="hidden" id="Bingo_highermaxmesg" name="Lucky3_highermaxmesg" value="จำนวนการร่วมสนุกของคุณมากกว่าที่กำหนดไว้!" />
                <input type="hidden" id="Bingo_areyousuremesg" name="Lucky3_areyousuremesg" value="คุณแน่ใจที่จะทำการร่วมสนุกหรือไม่" />
                <input type="hidden" id="Bingo_areyousuremesg1" name="Lucky3_areyousuremesg1" value="Your previous bet is still processing, are you sure you want to bet ?" />
                <input type="hidden" id="Bingo_betconfirmmesg" name="Lucky3_betconfirmmesg" value="กรุณาคลิ๊กที่ปุ่ม OK เพื่อยืนยันการเดิมพัน" />
                <input type="hidden" id="Bingo_siteType" name="Lucky3_siteType" value="" />
            </div>
        </form>
    </div>
    <!-- END Lucky3 Bet Process-->



  <!-- BetListMini Session -->
  <div id="div_BetListMini" style="display:none">
    <div class="leftBoxTitle" title="รายการ (แบบย่อ)"><span class="icon-arrow"></span>
      <div id="BetListMiniRefreshIcon" class="btnIcon mark right" name="btnRefresh_BetListMini" onclick="ReloadBetListMini('no','no');" title="รีเฟรช"><span class="icon-refresh"></span></div>
      <span class="titleTxt">รายการ (แบบย่อ)</span></div>
    <div class="leftBoxbody">
      <div class="boxbg">
        <div class="reSet">
            <a style="cursor:pointer" onclick="ReloadWaitingBetList('no','no')" class="button" title="รอ"><span>รอ</span></a> 
            <a style="cursor:pointer" onclick="ReloadVoidTicket('no')" class="button" title="โมฆะ"><span>โมฆะ</span></a></div>
        <span id="BetListMiniContainer"></span></div>
    </div>
    <div class="leftBoxFoot"></div>
  </div>
  <!-- END BetListMini Session --> 
  <!-- WaitingBets Session -->
  <div id="div_WaitingBets" style="">
    <div class="leftBoxTitle" title="รอ และ ยกเลิก"><span class="icon-arrow"></span>
      <div id="WaitingBetRefreshIcon" class="btnIcon mark right" name="btnRefresh_WaitingBets" onclick="ReloadWaitingBetList('','no');" title="รีเฟรช"><span class="icon-refresh"></span></div>
      <span class="titleTxt">รอ และ ยกเลิก</span></div>
    <div class="leftBoxbody">
      <div class="boxbg">
        <div id="account" class="reSet"> 
            <a style="cursor:pointer" onclick="ReloadBetListMini('no','no')" class="button" title="รายการ (แบบย่อ)"><span>รายการ (แบบย่อ)</span></a> 
            <a style="cursor:pointer" onclick="ReloadVoidTicket('no');" class="button" title="โมฆะ"><span>โมฆะ</span></a></div>
        <span id="WaitingBetsSpan"></span></div>
    </div>
    <div class="leftBoxFoot"></div>
  </div>
  <!-- End Of WaitingBets Session --> 
  <!-- VoidTicket Session -->
  <div id="div_VoidTicket" style="display:none">
    <div class="leftBoxTitle" title="การเล่นที่โมฆะ/ถูกยกเลิก"><span class="icon-arrow"></span>
      <div id="VoidTicketRefreshIcon" class="btnIcon mark right" name="btnRefresh_VoidTicket" onclick="ReloadVoidTicket('no');" title="รีเฟรช"><span class="icon-refresh"></span></div>
      <span class="titleTxt">การเล่นที่โมฆะ/ถูกยกเลิก</span></div>
    <div class="leftBoxbody">
      <div class="boxbg">
        <div id="account" class="reSet"> 
        <a style="cursor:pointer" onclick="ReloadBetListMini('no','no');" class="button" title="รายการ (แบบย่อ)"><span>รายการ (แบบย่อ)</span></a> 
        <a style="cursor:pointer" onclick="ReloadWaitingBetList('no','no');" class="button" title="รอ"><span>รอ</span></a></div>
        <span id="VoidTicketSpan"></span></div>
    </div>
    <div class="leftBoxFoot"></div>
  </div>
  <!-- End Of VoidTicket Session -->
  
  
  
  <form name="frmWaitingBets" id="frmWaitingBets" action="WaitingBets_Data.php" target="WaitingBets" method="post" style="display:none">
  </form>
  <iframe name="WaitingBets" id="WaitingBets" src="" width="0" height="0" frameborder="0" onload="disableMiniRefresh('WaitingBetRefreshIcon',false);disableMiniRefresh('VoidTicketRefreshIcon',false);"></iframe>
  <form action="mixcom/BetProcess_data.php" target="iframMixParlay" method="post" name="ParlayBetForm" id="ParlayBetForm" style="display: none" autocomplete="off">
    <input type="hidden" name="MId" value="" />
    <input type="hidden" name="OddsId" value="" />
    <input type="hidden" name="Team" value="" />
    <input type="hidden" name="Odds" value="" />
    <input type="hidden" name="Sport" value="1" />
    <input type="hidden" name="del" value="" />
    <input type="hidden" name="mode" value="" />
    <input type="hidden" name="count" value="" />
    <input type="hidden" name="hdp1" value="" />
    <input type="hidden" name="hdp2" value="" />
    <input type="hidden" name="updatevalue" value="" />
    <input type="hidden" name="key" value="" />
    <input type="hidden" name="username" value="B24T6099005" />
    <input type="hidden" name="k197183245" value="v197183445" />
    <input type="hidden" id="OddsType" name="OddsType" value="4" />
  </form>
  <iframe name="iframMixParlay" id="iframMixParlay" src="" width="0" height="0" frameborder="0"></iframe>
  <iframe name="ifrmBetListMiniData" id="ifrmBetListMiniData" onload="disableMiniRefresh('BetListMiniRefreshIcon',false);" style="display: none" width="100" height="1000" frameborder="0"></iframe>
  <form name="frmBetListMini" action="BetListMini_data.php" target="ifrmBetListMiniData" style="display:none">
    <input type="hidden" name="showBetAcceptedMsg" value="" />
    <input type="hidden" name="from" value="" />
  </form>
  
  <div id="PageLoadCompleted"></div>
</body>
</html>