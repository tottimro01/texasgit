<?php   ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');
require('inc/function2.php');
	

if(($_SESSION['m_id'] == '') || (!isset($_SESSION['m_id']))){
     if(isMobile()){
        // header("Location: MobileSelect.php");
        header("Location: login.php");
    }
}

if(($_SESSION['m_id'] == '') || (!isset($_SESSION['m_id']))){
@session_start(); 
@session_destroy();
echo"<script language='JavaScript'> top.document.location='login.php';</script>";
exit();
	}

 if($_GET['lang']!=""){
	$_SESSION['lang']=$_GET['lang'];
	echo'<script language="JavaScript">top.document.location="index.php";</script>';
}


$sql="select con_soccer_MenuKey from bom_tb_config where con_id=1;";
$rec=sql_array($sql);


?>

<script>
    // console.log('9999')

    // console.log('<?=$_SESSION["signin_site"];?>')

        // console.log('<?=$_GET['p'];?>')

    <?
        if($_GET['p'] != ""){
            switch ($_GET['p']) {
                case 'sport':
                    $url_tang = 'main_sport_new.php';
                    $url_msg = 'message_football.php?s=6';
                    $m_id = 'sport_menu_btn';
                    break;

                case 'lotto':
                    $url_tang = 'main_lotto.php';
                    $url_msg = 'message_lotto.php';
                    $m_id = 'lotto_menu_btn';
                    break;

                case 'lothun':
                    $url_tang = 'main_lothun.php';
                    $url_msg = 'message_lotto.php';
                    $m_id = 'lothun_menu_btn';
                    break;

                case 'games':
                    $url_tang = 'main_game.php';
                    $url_msg = 'message_game.php';
                    $m_id = 'games_menu_btn';
                    break;

                case 'sa':
                    $url_tang = 'main_casino_list.php';
                    $url_msg = 'message_casino.php';
                    $m_id = 'casino_menu_btn';
                    $casino_id = 1;
                    break;

                case 'joker':
                    $url_tang = 'main_casino_list.php';
                    $url_msg = 'message_casino.php';
                    $m_id = 'casino_menu_btn';
                    $casino_id = 11;
                    break;

                case 'sexy':
                    $url_tang = 'main_casino_list.php';
                    $url_msg = 'message_casino.php';
                    $m_id = 'casino_menu_btn';
                    $casino_id = 2;
                    break;

                case 'pgslot':
                    $url_tang = 'main_casino_list.php';
                    $url_msg = 'message_casino.php';
                    $m_id = 'casino_menu_btn';
                    $casino_id = 13;
                    break;
                
                default:
                    # code...
                    break;
            }
    ?>
        window.onload = function(){
            var e_menu = topx.document.getElementById('<?=$m_id;?>');
            topx.goMain('<?=$url_tang;?>',e_menu,' ','<?=$url_msg;?>');
            <?if($casino_id != ""){?>
            window.open('casino_popup.php?id=<?=$casino_id;?>','Popup_Window','scrollbars=yes,resizable=yes,width=1024,height=600');
            <?}?>
        }
    <?}?>
</script>
<!DOCTYPE html>
<html>
<head>

<TITLE><?=$app_title;?></TITLE>
<meta charset="utf-8">
 <!-- <link rel="icon" href="img/logo.ico"> -->
 <link rel="icon" href="img/favicon.ico?v=000001">
<script language="JavaScript" type="text/javascript" src="commJS/jquery.min.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/M_Util.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/M_Main.js"></script>

<script language="JavaScript" type="text/javascript" src="commJS/ShowHideFrame.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/cookie.js"></script>
<script type="text/javascript">
//--------Site Const---------------
var SiteMode = 0;
var Deposit_SiteMode = 0;
var DomainName = "ohoking.com";
var IsLogin = true;
var UserLang = "<?=$_SESSION['lang'];?>";
var SkinRootPath = "template/maxbet/";
var UserName = "<?=$_SESSION['m_user'];?>";
var imgServerURL = "";
var SiteId = "1";
var IsEuro = false;
//var Group = "a";
var OddsType = "4";
var FSiteSpread = 0;
//--------Odds Display---------------
var DisplayMode    = '3';
var PopupAD = false;
var PopupNews = true;
var PopupHAD = false;
var PopupFAD = true;
var hash_TmplLoaded = new Array(); // hashtable for keeping template loaded flag (value: true / false)
//--------Streaming ---------------
var StreamingFrame = null; //streaming window handle
var IsUserStreaming = true;
//--------Menu---------------
var LastSelectedSport=-1;
var LastSelectedMArket;
var LastSelectedBettype;
var LastSelectedLeagueGroup;
var isFavFirstLoad = false;
var isAllSingleFirstLoad = false;
var LastSelectedMenu=0; // Default All
var CanSeeNumberGame=true;
var CanBetNumberGame=true;
var CanBetOutright=true;
var CanSeeHorse=false;
var CanSeeGreyhounds=false;
var CanSeeHarness=false;
var MiniGameServerMode =true;
var CanSeeVirtualSports=true;
var CanBetVirtualSports=true;
var CanSeeKeno=true;
var CanBetKeno=true;
var CanSeeESport=true;
var CanBetESport=true;
var CanSeeLiveInfo=true;
var CanSeeSuperLive=true;
var CanSeeCrossSelling=true;
var CanSeeCrossSellingSettingPT=10;
var CanSeeCrossSellingPT=3;
var IsRngPlayForFun=false;
var CanSeeRngVB=true;
var CanSeeRngJackpot=true;
var CanSeeMiniGame=true;
var SelectRacingCountry;
//--------Betting------------
var LastBettingMode=0; // 0 : single , 1 : multiple
var LastSingleType=0; // 0 : underover/horse/outright , 1 : number game
//--------Casino-------------
var DisableCasino = "false";
var SyncCasino = "true";
var DisableLiveCasino = "false";
var SyncLiveCasino = "true";
var CanSeeBingo=true;
var CanBetBingo=false;
var CanSeeLiveCasino = true;
var CanSeeGD = true;
var CanSeeAllBet = true;
var CanSeeN7 = false;
var CanSeeGG = false;
var CanSeeRng = true;
var CanSeeColossusBet = false;
var CanSeeLottery=true;
var CanBetLottery=true;
var CanSeeBullfighting=false;
var CanBetBullfighting=false;
var CanSeeBRVS=true;
var CanSeeBRVSWC=true;
var CanSeeBRVSAC=true;
var CanSeeBRVSBasketball=true;
var ShowUpGradeMsgForNG = false;
var CanSeeCardClub=false;
var CanBetCardClub=false;
var CanSeeHappy5=true;
var IsPA = false;
//--------GameVisualization--------
var dispatcherkey = "<?=$rec['con_soccer_MenuKey'];?>";
//--------AccountInfo--------
var AccountInfoData = "";
var ScoreMsg='{{ScoreDiv}}';
//--------Racing FormGuide---------
var popFormGuideWindow = null;
var popDogFormGuideWindow = null;
var popHarnessFormGuideWindow = null;
var fFrame=this;
var RES_ScoreMap="Score Map";
var RES_LiveInfo="Match Information";
var RES_LiveChart="Live Chart";
var RES_StatisticInfo="Statistic Information";
var RES_AddFavorite="เพิ่มในรายการโปรด";
var RES_RemoveFavorite="Remove My Favorite";
var RES_LiveStreaming="การดูภาพการแข่งขันสดผ่านเวปไซค์";

var promotionKey = 0;
var ShowPromotion1=true;
var ShowPromotion2=true;
var ShowPromotion3=true;
var ShowPromotion4=true;
var ShowPromotion5=true;
var RES_promotion_button="ลองเลยตอนนี้";
var RES_promotion_title1="อัปเดตการเดิมพันแบบทันที";
var RES_promotion_title2="วางเดิมพันแบบด่วน";
var RES_promotion_title3="การออกแบบเว็บไซต์ให้โต้ตอบได้อย่างรวดเร็ว";
var RES_promotion_title4="ดูแบบสด ๆ วางเดิมพันแบบสด ๆ";
var RES_promotion_content1="คุณคลิกปุ่มรีเฟรชหลายครั้ง<br/>ลองใช้อัปเดตการเดิมพันแบบทันทีในเวอร์ชันใหม่";
var RES_promotion_content2="วางเดิมพันได้หลายครั้งในระยะเวลาสั้น ๆ<br/>วางเดิมพันได้เร็วขึ้นและง่ายขึ้น ด้วยระบบวางเดิมพันแบบด่วนในเวอร์ชันใหม่";
var RES_promotion_content3="สัมผัสประสบการณ์ความยืดหยุ่นสูงในการจัดรูปแบบหน้าจอ เพื่อให้เหมาะกับขนาดความละเอียดของหน้าจอเบราว์เซอร์ที่คุณต้องการ";
var RES_promotion_content4="ระบบดูและเดิมพันพร้อมให้บริการในเวอร์ชันใหม่";

var RES_GV_MatchInfo = "Live Match";

var tmplHeader = null;
var tmplEvent = null;
var tmplHeader193 = null;
var tmplEvent193 = null;
var NowSportPage = "164";

var FlashSupport=null;
var RES_popAD = "&lt;div id=&quot;AcgDiv&quot; style=&quot;display:none&quot;&gt;  &lt;table border=&quot;1&quot; width=&quot;506&quot; height=&quot;337&quot; bgcolor=&quot;#423e3f&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; &gt;    &lt;tr&gt;      &lt;td width=&quot;100%&quot;&gt;&lt;table border=&quot;0&quot; width=&quot;100%&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; height=&quot;30&quot;&gt;          &lt;tr&gt;            &lt;td id=&quot;AcgTitleBar&quot; width=&quot;96%&quot;&gt;&lt;/td&gt;            &lt;td id=&quot;AcgCloser&quot; width=&quot;4%&quot; align=&quot;center&quot; valign=&quot;top&quot; bgcolor=&quot;#CC6666&quot; style=&quot;cursor:hand&quot;&gt;&lt;a href=&quot;#&quot; class=&quot;more&quot;&gt;&lt;strong&gt;&lt;font color=#ffffff size=3 face=arial style=&quot;text-decoration:none&quot;&gt;X&lt;/font&gt;&lt;/strong&gt;&lt;/a&gt; &lt;/td&gt;          &lt;/tr&gt;          &lt;tr&gt;            &lt;td bgcolor=&quot;#000000&quot; colspan=&quot;2&quot;&gt;&lt;div id=&quot;Layer1&quot;&gt; &lt;a href=&quot;http://www.acg123.com/_eng/index.htm&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;template/public/acg/bg.gif&quot; width=&quot;506&quot; height=&quot;337&quot; border=&quot;0&quot; /&gt;&lt;/a&gt; &lt;/div&gt;              &lt;object classid=&quot;clsid:D27CDB6E-AE6D-11cf-96B8-444553540000&quot; codebase=&quot;https://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0&quot; width=&quot;506&quot; height=&quot;337&quot;&gt;                &lt;param name=&quot;movie&quot; value=&quot;template/public/acg/th/BANNER_RE_20090116.swf?v=20090116&quot;&gt;                &lt;param name=&quot;quality&quot; value=&quot;high&quot;&gt;                &lt;param name=&quot;wmode&quot; value=&quot;transparent&quot;&gt;                &lt;embed src=&quot;template/public/acg/th/BANNER_RE_20090116.swf?v=20090116&quot; quality=&quot;high&quot; pluginspage=&quot;https://www.macromedia.com/go/getflashplayer&quot; type=&quot;application/x-shockwave-flash&quot; width=&quot;506&quot; height=&quot;337&quot; wmode=&quot;transparent&quot;&gt;&lt;/embed&gt;              &lt;/object&gt;            &lt;/td&gt;          &lt;/tr&gt;        &lt;/table&gt;&lt;/td&gt;    &lt;/tr&gt;  &lt;/table&gt;&lt;/div&gt;";
var RES_BlockPopMsg ="Window blocked! Please check \"Block Pop-Up Windows\" setting.";
var ADLauncher=null;
var IsShowLiveInfoSideView =  false;
var userSite = '';
var RES_SPORTS = new Array(162);
var IsShowPromoNewVersion=true;
RES_SPORTS[0] = "ทั้งหมด";
RES_SPORTS[1] = "ฟุตบอล";
RES_SPORTS[2] = "บาสเก็ตบอล";
RES_SPORTS[3] = "อเมริกันฟุตบอล";
RES_SPORTS[4] = "ฮ๊อกกี้น้ำแข็ง";
RES_SPORTS[5] = "เทนนิส";
RES_SPORTS[6] = "วอลเลย์บอล";
RES_SPORTS[7] = "สนุกเกอร์ / พูล";
RES_SPORTS[8] = "เบสบอล";
RES_SPORTS[9] = "แบตมินตัน";
RES_SPORTS[10] = "กอล์ฟ";
RES_SPORTS[11] = "กีฬายานยนต์";
RES_SPORTS[12] = "ว่ายน้ำ";
RES_SPORTS[13] = "การเมือง";
RES_SPORTS[14] = "โปโลน้ำ";
RES_SPORTS[15] = "ดำน้ำ";
RES_SPORTS[16] = "มวย";
RES_SPORTS[17] = "ยิงธนู";
RES_SPORTS[18] = "ปิงปอง";
RES_SPORTS[19] = "ยกน้ำหนัก";
RES_SPORTS[20] = "เรือแคนู";
RES_SPORTS[21] = "ยิมนาสติก";
RES_SPORTS[22] = "กรีฑา";
RES_SPORTS[23] = "ขี่ม้า";
RES_SPORTS[24] = "แฮนด์บอล";
RES_SPORTS[25] = "ปาเป้า";
RES_SPORTS[26] = "รักบี้";
RES_SPORTS[27] = "คริกเก็ต";
RES_SPORTS[28] = "ฟิลด์ฮอกกี้";
RES_SPORTS[29] = "Winter Sports";
RES_SPORTS[30] = "Squash";
RES_SPORTS[31] = "ความบันเทิง";
RES_SPORTS[32] = "Netball";
RES_SPORTS[33] = "กีฬาขี่จักรยาน";
RES_SPORTS[34] = "Fencing";
RES_SPORTS[35] = "Judo";
RES_SPORTS[36] = "M. Pentathlon";
RES_SPORTS[37] = "Rowing";
RES_SPORTS[38] = "Sailing";
RES_SPORTS[39] = "Shooting";
RES_SPORTS[40] = "Taekwondo";
RES_SPORTS[41] = "Triathlon";
RES_SPORTS[42] = "มวยปล้ำ";
RES_SPORTS[43] = "อีสปอร์ต";
RES_SPORTS[44] = "มวยไทย";
RES_SPORTS[47] = "Kabaddi";
RES_SPORTS[48] = "เซปักตะกร้อ";
RES_SPORTS[49] = "ฟุตซอล";
RES_SPORTS[50] = "คริกเก็ต";
RES_SPORTS[51] = "ฟุตบอลชายหาด";
RES_SPORTS[52] = "Upcoming Sport 52";
RES_SPORTS[53] = "Upcoming Sport 53";
RES_SPORTS[54] = "Upcoming Sport 54";
RES_SPORTS[55] = "Upcoming Sport 55";
RES_SPORTS[56] = "Upcoming Sport 56";
RES_SPORTS[99] = "กีฬาอื่นๆ";
RES_SPORTS[154] = "Horse Racing Fixed Odds";
RES_SPORTS[161] = "เกมหมายเลข";


//--------Rules & Regulations ---------------
var RuleInfo = null; //Rules & Regulations window handle for Bing Flash
function MainLoad()
{
    console.log(rightx.document.body.innerHTML.length);
    if(rightx.document.body.innerHTML.length >0)
    {
        // console.log('main load')
        //loadPopAD();
        
        /*if(CheckIsIpad())
        {
            SetIpad();
            var loadMiniOddsForIPad = function()
            {
                //topx.miniOddsObj.InitForIPad();
            }
            loadMiniOddsForIPad();
        }else{*/
            var loadMiniOdds = function()
            {
                //             if(topx.miniOddsObj == null)
                //             {
                //               setTimeout(loadMiniOdds,1000);
                //               return ;
                //             }
                //topx.miniOddsObj.Init();
            }
            loadMiniOdds();
            loadFooter();
            CrossSelling();
        //}
        //loadBetRadarVSTmpl();
        //loadLucky3Tmpl();
        //Promo New Version
        /*if (IsShowPromoNewVersion && !getCookie(UserName + "_v1promo") && topx.miniOddsObj != null) {
            topx.miniOddsObj.ShowPromoNewVersionPopup();
        }
        else
        {
            CallSwitchNewVersionTip();
        }*/
        /*if (ShowPromotion5 == true && !getCookie(UserName + "_v1promo"))
        {
            ShowPromotion5 = true;
            FreezeHandle=window.setInterval(function(){CheckFreezeTime()},1000);
        }
        else
        {
            ShowPromotion5 = false;
        }*/
    }
    /*if (ShowPromotion5)
    {
        rightx.document.onmousemove=RecordControl;
        topx.document.onmousemove=RecordControl;
        leftx.document.onmousemove=RecordControl;
        
        rightx.document.onmousedown=RecordControl;
        topx.document.onmousedown=RecordControl;
        leftx.document.onmousedown=RecordControl;
        
        rightx.document.onkeydown=RecordControl;
        topx.document.onkeydown=RecordControl;
        leftx.document.onkeydown=RecordControl;
        
        rightx.document.onscroll=RecordControl;
        topx.document.onscroll=RecordControl;
        leftx.document.onscroll=RecordControl;
    }*/
    rightx.document.body.lang=UserLang;
}

function loadBetRadarVSTmpl()
{
    /*if (!initialTmpl("BetRadarVirtualSport_tmpl", "BetRadarVirtualSport_tmpl.php", "loadBetRadarVSTmpl();")) {
        return;
    }
    tmplHeader = fFrame.document.getElementById("BetRadarVirtualSport_tmpl").contentWindow.document.getElementById("tmplHeader").innerHTML;
    tmplEvent = fFrame.document.getElementById("BetRadarVirtualSport_tmpl").contentWindow.document.getElementById("tmplEvent").innerHTML;
    tmplHeader193 = fFrame.document.getElementById("BetRadarVirtualSport_tmpl").contentWindow.document.getElementById("tmplHeader193").innerHTML;
    tmplEvent193 = fFrame.document.getElementById("BetRadarVirtualSport_tmpl").contentWindow.document.getElementById("tmplEvent193").innerHTML;*/
}

function initialTmpl(frameId, url, TimeoutFunc) {
    
    if (fFrame.hash_TmplLoaded[frameId] == null) {
        fFrame.document.getElementById(frameId).contentWindow.location.href = url;
        fFrame.hash_TmplLoaded[frameId] = true;
        window.setTimeout(TimeoutFunc, 500);
        return false;
    }
    
    if (fFrame.document.getElementById(frameId).contentWindow.document.getElementById("tmplEnd") == null) {
        window.setTimeout(TimeoutFunc, 500);
        return false;
    }
    
    return true;
}

function loadFooter()
{
    /*var obj=document.createElement("div");
    obj.innerHTML=BuildFooterHTML();
    //rightx.document.body.appendChild(obj);
    if(rightx.document.getElementById("sidebar")!=null)
    {
        rightx.document.getElementById("sidebar").appendChild(obj);
    }else{
        rightx.document.body.appendChild(obj);
    }*/
    //rightx.chkChangeIpad();
    
}
function SetIpad()
{
    /*if(typeof rightx.isPad_loadend == "undefined"){
        importJS('commJS/isPad.js??v=201806131017','rightx.isPad_loadend',function(){rightx.chkChangeIpad();loadFooter();},rightx);
    }*/
}
function loadPopAD()
{
    
    
   /* if(RES_popAD.length>0 && rightx.document.body.innerHTML.length >0)
    {
        var decoded = $("<div/>").html(RES_popAD).text();
        $(decoded).appendTo(rightx.document.body);
        
        var showPopAD = function()
        {
            var oDiv = rightx.document.getElementById("NewsDiv");
            var oDragger = rightx.document.getElementById("NewsTitleBar");
            var oCloser = rightx.document.getElementById("NewsCloser");
            if (oDiv != null) {
                ADLauncher = new rightx.DivLauncher(oDiv, oDragger, oCloser);
                ADLauncher.open();
            }
            RES_popAD="";
        }
        
        if(typeof rightx.DivLauncher == "undefined")
        {
            importJS('commJs/DivLauncher.js','rightx.DivLauncher',showPopAD,rightx);
        }else{
            showPopAD();
        }
        
        
    }*/
}

function BuildFooterHTML()
{
    /*var aTmpl=document.getElementById("bottomFrame");
    var TemplateFrame;
    if (aTmpl.contentDocument) { //ff
        TemplateFrame = aTmpl.contentDocument;
    }else if (aTmpl.contentWindow) {
        TemplateFrame = aTmpl.contentWindow.document;
    }else{  //ie
        TemplateFrame = aTmpl.document;
    }
    if(TemplateFrame == null || TemplateFrame.body == null) return "";
    return TemplateFrame.body.innerHTML;*/
}
var windowsHandle = new Array();
function openWindowsHandle(winName ,Condition,msg, url , winpara ,iscallback,callbackfunc)
{
    if(!iscallback && userBrowser() == "Firefox")
    {
        setTimeout(function(){openWindowsHandle(winName,Condition,msg,url,winpara,true,callbackfunc)} ,1 );
        return ;
    }
    
    if (Condition) {
        var isNewOpen=false;
        if (windowsHandle[winName] == null || windowsHandle[winName].closed
            || (userBrowser()=="Safari" && windowsHandle[winName].length ==0)) {
            var strURL = url;
            if(winpara==null) winpara="";
            windowsHandle[winName] = window.open(strURL , winName, winpara);
            isNewOpen=true;
            if(windowsHandle[winName] ==null) alert(RES_BlockPopMsg);
        } else {
            windowsHandle[winName].focus();
        }
        if(callbackfunc!=null) callbackfunc(windowsHandle[winName],isNewOpen);
        
    } else {
        alert(msg);
    }
}
function closeAllWindows()
{
    for(var key in windowsHandle)
    {
        if(windowsHandle[key]!=null)
        {
            windowsHandle[key].close();
        }
    }
}

function getOpenWindowsHandle(key)
{
    return windowsHandle[key];
}

function UpdateSetting(Refresh,OddsType,PageType,SortType,AcceptBetter,MarketType)
{
    if(Refresh!=null)
    {
        Refresh = Refresh=="1"?true:false;
        var sportchk = leftx.document.getElementById("chKeepBet");
        var bingochk = leftx.document.getElementById("Bingo_chKeepBet");
        var horsechk = leftx.document.getElementById("FScreen");
        
        if(leftx.document.getElementById('BingoBetProcessContainer').style.display!="none")
        {
            if(bingochk.checked != Refresh) bingochk.click();
        }
        
        if(leftx.document.getElementById('BP_SPORT').style.display!="none")
        {
            if(sportchk.checked != Refresh) sportchk.click();
        }
        if(leftx.document.getElementById('BP_RACE').style.display!="none")
        {
            if(horsechk.checked != Refresh) horsechk.click();
        }
        sportchk.checked=Refresh;
        bingochk.checked=Refresh;
        horsechk.checked=Refresh;
        
    }
    if(AcceptBetter!=null)
    {
        AcceptBetter = AcceptBetter=="1"?true:false;
        $(leftx.document.getElementById("cbAcceptBetterOdds")).attr("checked", AcceptBetter);
        $(leftx.document.getElementById("Bingo_cbAcceptBetterOdds")).attr("checked", AcceptBetter);
        
    }
    
    
    var pageurl=[];
    var FrameUrl = rightx.document.location.pathname;
    if(PageType!=null )
    {
        fFrame.DisplayMode = PageType;
        pageurl =['underover.php','allsingleodds.php','live.php'];
    }
    if(OddsType!=null && fFrame.topx.miniOddsObj!=null) fFrame.topx.miniOddsObj.Refresh(OddsType);
    if(OddsType!=null|| SortType!=null)
    {
        if(OddsType!=null) this.OddsType=OddsType;
        pageurl =['underover.php','allsingleodds.php','live.php','oe.php','tg.php','nba.php','tennis.php','baseball.php','cricket.php','bingo.php'];
    }
    
    if (MarketType != null)
    {
        pageurl =['underover.php','1X2.php','live.php','oe.php','tg.php','correctscore.php','fglg.php','htft.php'];
    }
    
    for(var i=0;i<pageurl.length;i++)
    {
        if(FrameUrl.toLowerCase().indexOf(pageurl[i]) > -1)
        {
            var waitingArea = leftx.document.getElementById("div_WaitingBets");
            
            if(waitingArea.style.display == "block") {
                leftx.ReloadWaitingBetList('','no');
            }
            rightx.location.reload(true);
            return ;
        }
    }
    
}


function Loadframe()
{
    //loadBetRadarVSTmpl();
    // $('#leftx').load(function(){
    //                      $('#rightx').unbind('load');
    //                      $('#rightx').bind('load',function(){MainLoad(); console.log(rightx.location)});
    //                      var mainurl = "";
    //                      if(mainurl.length > 0) {
    //                      rightx.location = mainurl;
    //                      }
    //                      });
    //fFrame.hash_TmplLoaded["Menu_tmpl"] = null;
    // leftx.location ="LeftAllInOne.php";
    //leftx.location ="left_sport.php";
    // rightx.document.body.innerHTML = ""
    //rightx.location ="Tennis.php";
    //console.log("sssss");
    leftx.location.href="left_sport2.php?token=<?=$_SESSION['m_token'];?>"; 
    
}

function CrossSelling()
{
    var script = document.createElement('script');
    script.type="text/javascript";
    script.src = "commJS/idangerous.swiper.min.js?v=201804260448";
    rightx.document.getElementsByTagName('head')[0].appendChild(script);
    
    var css = document.createElement('LINK');
    css.onload = function() {
    };
    css.rel="stylesheet";
    css.type="text/css";
    css.href = "template/maxbet/public/css/idangerous.swiper.css?v=201603290207";
    rightx.document.getElementsByTagName('head')[0].appendChild(css);
    script.onload = function() {
        rightx.CrossSellingRun(CanSeeRngJackpot,CanSeeColossusBet);
    };
}
var FreezeTime=0;
var FreezeHandle;
//if (ShowPromotion5)
//{
//    FreezeHandle=window.setInterval(function(){CheckFreezeTime()},1000);
//}
function CheckFreezeTime()
{
    if (fFrame.rightx.PromoNewVersionPopup!=null && fFrame.rightx.PromoNewVersionPopup.style.display!="none") return;
    if (fFrame.ShowPromotion5)
    {
        FreezeTime++;
        if (FreezeTime>=180)
        {
            
            FreezeTime=0;
            if (fFrame.rightx.PromoNewVersionPopup==null)
            {
                if (IsShowPromoNewVersion)
                {
                    fFrame.topx.miniOddsObj.ShowPromoNewVersionPopup();
                }
            }
            fFrame.rightx.poptoms2_DoNotShowAgain.style.display="none";
            //fFrame.rightx.poptoms2_DoNotShowAgainInThisSession.style.display="";
            fFrame.rightx.PromoNewVersionPopup.style.display="";
            fFrame.promotionKey = 5;
            fFrame.rightx.DoNotShowAgainInThisSession(fFrame.promotionKey);
            clearInterval(FreezeHandle);
            //fFrame.rightx.genGotoMS2HTML(3);
            //fFrame.rightx.PopToMS2(3);
        }
    }
}
function RecordControl()
{
    parent.FreezeTime=0;
}
</script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-138627226-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-138627226-1');
</script>




</head>

<frameset rows="99, *" border=0 frameborder=no id="frameset2">
	<frame src="top.php" name=topx id="topx" framespacing=0 marginwidth=0 marginheight=0 scrolling=no noresize onload="Loadframe();">
	<frameset cols="205, *" border=0 frameborder=no id="frameset1">
		<frame src="about:blank" name=leftx id="leftx" framespacing=0 marginwidth=0 marginheight=0 scrolling=auto noresize onload="">
		<frame src="about:blank" name=rightx id="rightx" framespacing=0 marginwidth=0 marginheight=0 scrolling=auto>
<!-- Template Frame for Odds Display -->
<frameset rows="0,0,0,0, 0,0,0,0,0,0,0,0, 0,0,0,0,0,0,0,0, 0,0,0,0,0,0,0,0,0,0,0, 0,0,0">

<frame id='UnderOver_tmpl_1' />
<frame id='UnderOver_tmpl_3' src="UnderOver_tmpl.php?form=3" />
<frame id='UnderOver_tmpl_1F' />
<frame id='UnderOver_tmpl_1H' />

<frame id='1X2_tmpl' />
<frame id='CorrectScore_tmpl' />
<frame id='CorrectScore_tmpl_H' />
<frame id='HTFTOE_tmpl' />
<frame id='Oe_tmpl' />
<frame id='Tg_tmpl' />
<frame id='HTFT_tmpl' />
<frame id='FGLG_tmpl' />
<frame id='Outright_tmpl' />

<frame id='MorePop_tmpl' src="MorePop_tmpl.php" onLoad="window.top.hash_TmplLoaded['MorePop_tmpl']=true"/>

<frame id='ESports_tmpl' />
<frame id='NBA_tmpl' />
<frame id='Tennis_tmpl' />
<frame id='Baseball_tmpl' />
<frame id='Cricket_tmpl' />

    <frame id='League_tmpl' />


	</frameset>

</frameset><noframes></noframes>
</html>

