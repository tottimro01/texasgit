<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>การดูภาพการแข่งขันสดผ่านเวปไซค์</title>
    
    <link href="template/maxbet/public/css/oddsFamily.css?v=<?=date("YmdHis");?>" rel="stylesheet" type="text/css" />
    <link href="template/maxbet/public/css/menu.css?v=<?=date("YmdHis");?>" rel="stylesheet" type="text/css" />
    <link href="template/maxbet/public/css/table_w.css?v=<?=date("YmdHis");?>" rel="stylesheet" type="text/css" />
    <link href="template/maxbet/public/css/global.css?v=<?=date("YmdHis");?>" rel="stylesheet" type="text/css" />
    <link href="template/maxbet/public/css/button.css?v=<?=date("YmdHis");?>" rel="stylesheet" type="text/css" />    
    <link href="template/maxbet/public/css/TVstreaming.css?v=<?=date("YmdHis");?>" rel="stylesheet" type="text/css" />

    
    <script language="javascript" type="text/javascript">
<!--
var err_mainWindowClosed='You have loged out!! Please login and try again!!';
var SkinPath='template/maxbet/th/';
var isHorseStreaming=false;
var parentUrl="http://www.ohoking.com/StreamingFrame.php";
var lng="th";
var ScheduleType="1";
var showSubMenuLinkTimer=null;
var lastScheduleSport = null;
var lastScheduleDate = null;
function ShowSubMenu()
{
	var obj = document.getElementById("sublink");
	if (obj != null)
	{
		if (typeof(showSubMenuLinkTimer) != "undefined")
			clearTimeout(showSubMenuLinkTimer);
		obj.style.display="block";
		showSubMenuLinkTimer=setTimeout("HideSubMenuLink()",3000);
	}
}


function HideSubMenuLink()
{
	var obj = document.getElementById("sublink");
	if (obj != null)
	{
		obj.style.display="none";
		showSubMenuLinkTimer = null;
	}
}

function ShowSportSchule()
{
    SetTitle('0','กำหนดการล่าสุด');
    ShowSportContainer();
    document.getElementById("leftcont").src="StreamingSchedule.php?Type=1"; 
    ScheduleType = "1";   
    isHorseStreaming = false;
    SwitchTopButton(1);
}

function ShowHorseRacingSchule(type)
{
    SetTitle('0','กำหนดการล่าสุด');
    ShowSportContainer();    
    document.getElementById("leftcont").src="StreamingSchedule.php?Type=" + type;
    ScheduleType = type;
    isHorseStreaming = true;
    HideSubMenuLink(); 
    SwitchTopButton(type);
}

function ShowNumberGameSchule()
{
    SetTitle('0','กำหนดการล่าสุด');
    ShowSportContainer();
    document.getElementById("leftcont").src="StreamingSchedule.php?Type=161";
    ScheduleType = "161"; 
    isHorseStreaming = false;
    SwitchTopButton(161);
}

function ShowSportContainer()
{
    document.getElementById("GreyhoundsContainer").style.display="none";
    document.getElementById("fgreyhounds").src="";
    document.getElementById("SportsContainer").style.display="block";
}

function ShowGreyhoundsContainer()
{
    SetTitle('0','กำหนดการล่าสุด');
    document.getElementById("fgreyhounds").src="http://www.e-tote.com/24dogs/video.php?sessid=35349218&skin=acqua";
    document.getElementById("GreyhoundsContainer").style.display="block";
    document.getElementById("SportsContainer").style.display="none"; 
    document.getElementById("StreamingSrc").value = "7";
    document.getElementById("HorseChannelID").value = "6";
    document.getElementById("Matchid").value = "";
    document.getElementById("DataForm").submit();
    $("body").removeClass('double');
    window.resizeTo(820, 710)
    window.outerWidth = 825;
    window.outerHeight = 710;
    SwitchTopButton(152);
}

function SetDefaultValue()
{
    document.getElementById("Matchid").value = "";
    document.getElementById("StreamingSrc").value = "1";
    document.getElementById("HorseChannelID").value = "0";
    document.getElementById("DataForm").submit(); 
}

function SetReflashIcon(TargetID,Type)
{
    var classname="";
    var temp;
    temp = document.getElementById(TargetID).className.split(" ");
    if (Type==0)
    {
        for(i=0; i <temp.length;i++)
        {
            if (temp[i] != "disable")     
                classname+=temp[i] + " ";
        }
       document.getElementById(TargetID).className  =  classname;
    }
    else
    {
        document.getElementById(TargetID).className = document.getElementById(TargetID).className + " disable";
    }
}

function GetProtocolType()
{
    if (location.protocol === 'https:') {
        document.getElementById('ProtocolType').value = "S";
    }
    else
    {
        document.getElementById('ProtocolType').value = "N";
    }
}
-->
    </script>
   <script language="JavaScript" type="text/javascript" src="commJS/jquery.min.js?v=<?=date("YmdHis");?>"></script>
   <script language="JavaScript" type="text/javascript" src="commJS/streaming.js?v=<?=date("YmdHis");?>"></script>
   <script language="javascript" type="text/javascript">
   
   window.onbeforeunload = sendMatchid;
   function sendMatchid() {
       $.ajax({
           url: '/StreamingFrame.aspx',
           data: {
               'Subtract': '<?=$_GET['Matchid'];?>'
           },
           async: false,
           cache: false,
           type: "GET",
           dataType: 'text'
       });
   }
   </script>


</head>
<body class="" lang=th; onload="ChkOpener(); GetProtocolType(); Resize('none' != 'block'); setInterval(AutoRefreshLoginCheckin, 60000);" oncontextmenu='return false' ondragstart='return false'
    onselectstart='return false' onbeforecopy='return false'>

    <div id="containerMain">
    	<div id="containerhead" style="display: none; visibility: hidden">  
        	<div class="streamingHeadArea">    
                <div class="streamingLogoArea" style="padding-top: 6px; padding-left: 6px;">
                    <!-- <img src="template/maxbet/public/images/layout/transparent.gif"/> -->
                    <img src="http://ohoking.com/img/ohoking_logo.png"/ style="width: 200px;">
                    <div class="TVLogo"></div>
                </div>
                <div class="topMenuArea">
					<ul class="streamingtopMenu">
                    	<li><a href="javascript:SetTitle('0','กำหนดการล่าสุด');Refresh_List();"><span>กำหนดการล่าสุด</span></a></li>
                        <li>|</li>
                        <li><a href="DF_tvStreaming.aspx" target="leftcont" onclick="SetTitle('1','คำถามคำตอบที่พบบ่อย');"><span>คำถามคำตอบที่พบบ่อย</span></a></li>
                        <li style="display:none"><span>|</span></li>
                        <li style="display:none"> <a href="StreamingLv2.php" target="FrameValidation"><span>ทดสอบ</span></a>
                    </ul>
                </div>
                <div class="StreamingMenuArea">
                	<!-- Start:  -->
                    <ul class="mainMenu">
                        <li><a href="javascript:ShowSportSchule();" class="current" id="sportbutton"><span>Sports</span></a></li>
                        <li>
                            <div class="SubSiteNav p02" id="sublink" name="sublink" style="display: none">
                                <div class="SubSiteNavArrow SubSiteNavDiamond"></div>
                                <ul>
                                  
                                  
                                  
                                                                                                      
                                </ul>
                            </div>
                        </li> 
                        <li><a href="javascript:ShowNumberGameSchule();" id="numbergamebutton"><span>เกมหมายเลข</span></a></li>
                    </ul>
                    <!-- End: SiteNav -->
                </div>
    		</div>
        </div>
        <div class="blueArea" id="blueArea">
    	</div>
    </div>
    <div id="GreyhoundsContainer" class="RacingFrame" style="display: none">
        <iframe src="" width="776" height="515" scrolling="no" frameborder="0" id="fgreyhounds" name="fgreyhounds" style="margin: 7px;"></iframe> 
    </div>
    <div id="SportsContainer">
    	<div id="containerleft" style="display: none; visibility: hidden"> 
			
            <div class="streamingLeftTitle">
            	<span>
            	    <div id="Button1" class="btnIcon mark right" onclick="SetReflashIcon('Button1',1);Refresh_List()" title="รีเฟรช"><span class="icon-refresh"></span></div>
					<div class="iconLeft arrowDown"></div>
                    <span id="left_title">กำหนดการล่าสุด</span>                    
                </span>
            </div>          
            <div class="leftBoxbody">
				<div class="leftbox">
            		<iframe src="StreamingSchedule.php?Type=1" width="252" height="455" scrolling="no" frameborder="0" id="leftcont" name="leftcont" onload ="SetReflashIcon('Button1',0);"></iframe>
            	</div>
            </div>
        </div>
        <div class="containerRight">
        	<div class="titleBar">
                <div class="title">การดูภาพการแข่งขันสดผ่านเวปไซค์</div>
                <div class="right">
                    <div class="left" id="minimgdiv" style="display: none; visibility: hidden">
                        <a href="#" class="button" id="mintxtdiv" onclick="StandalonePlayer();" style="display: none; visibility: hidden">
                            <span title="ผู้เล่นที่น่าจับตามอง" >ผู้เล่นที่น่าจับตามอง</span>
                        </a>
                    </div>
                    <div class="left" id="maximgdiv" style="display: block; visibility: visible">
                        <a href="#" class="button" id="maxtxtdiv" onclick="StandalonePlayer();" style="display: block; visibility: visible">
                            <span title="ผู้เล่นหลัก">ผู้เล่นหลัก</span>
                        </a>
                    </div>
                    <a href="#" id="btnRefresh_D" class="button" onclick="CheckLogin();SetReflashIcon('btnRefresh_D',1);document.DataForm.submit();" style="display: block; cursor:pointer" title="รีเฟรช">
                        <span>
                        	<div id="reflashicon" class="icon-refresh"></div>
                        </span>
                    </a>
                </div>
        	</div>

			<iframe width="452" height="452" scrolling="no" frameborder="0" id="FrameValidation" name="FrameValidation" onload="SetReflashIcon('btnRefresh_D',0);"></iframe>

        </div>        
	</div>        
    <div id="footer" style="white-space: nowrap; display: none; visibility: hidden">
        <div class="footerContainer">
            <span style="padding-right:15px;">Customer Service:<a href='mailto:help@ohoking.com'>help@ohoking.com</a></span>
            <span>©Copyright 2019.  OHOKING. All Rights Reserved.</span>
        </div>
    </div>

    <form action="StreamingLv2.php" target="FrameValidation" id="DataForm" name="DataForm" style="display: none" method="post">
	    <input type="hidden" name="Matchid" id="Matchid" value="<?=$_GET['Matchid'];?>"/>
	    <input type="hidden" name="StreamingSrc" id="StreamingSrc" value="1"/>
	    <input type="hidden" name="HorseChannelID" id="HorseChannelID" value="0"/>
        <input type="hidden" name="RacingLeagueID" id="RacingLeagueID" value="0"/>
        <input type="hidden" name="RacingRaceNumber" id="RacingRaceNumber" value="0"/>
        <input type="hidden" name="ProtocolType" id="ProtocolType" />  
        <input type="hidden" name="bingoMode" id="bingoMode" value="true" /> 
    </form>    
</body>
</html>