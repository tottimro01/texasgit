<?
session_start();
// require("lang/member_lang.php");
require("lang/variable_lang.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Correct Score</title>
<link href="template/maxbet/public/css/table_w.css" rel="stylesheet" type="text/css" />
<link href="template/maxbet/public/css/button.css" rel="stylesheet" type="text/css" />
<link href="template/maxbet/public/css/oddsFamily.css" rel="stylesheet" type="text/css" />

<script language="JavaScript"  type="text/javascript">
var REFRESH_INTERVAL = 60000;
var REFRESH_COUNTDOWN = 720; //60;
var RES_REFRESH = '<?=$lang_member[769];?>';
var RES_PLEASE_WAIT = '<?=$lang_member[770];?>';
var RES_LIVE = '<?=$lang_member[772];?>';
var PAGE_MARKET = "t";
var RES_NormalSort='<?=$lang_member[774];?>';
var RES_SortByTime='<?=$lang_member[775];?>';
var RES_PageType;
var RES_VAR = "VAR";
var RES_PRC = "PRC";
var RES_PPen = "PPen.";
var RES_Pen = "Pen.";
var RES_Inj = "Inj.";
var RES_VAR_full = '<?=$lang_member[812];?>';
var RES_PRC_full = '<?=$lang_member[813];?>';
var RES_PPen_full = '<?=$lang_member[815];?>';
var RES_Pen_full = '<?=$lang_member[817];?>';
var RES_Inj_full = '<?=$lang_member[818];?>';
</script>
<script language="JavaScript" type="text/javascript" src="commJS/jquery.min.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/getDataClass.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/ajaxData.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/odds/MultiSport_Def.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/OddsUtils.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/OddsKeeper.js"></script>
<!--<script language="JavaScript" type="text/javascript" src="commJS/odds/CorrectScore_Def.js?v=201109160917"></script>-->
<script language="JavaScript" type="text/javascript" src="commJS/odds/CorrectScore.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/common.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/DivLauncher.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/streaming.js"></script>
<script type="text/javascript" src="commJS/js/trailblazerlib.js"></script>
<script language="JavaScript" type="text/javascript">
  SelMainMarket = parseInt("0", 10);
</script>
</head>

<body id="CS" onload="OverWriteFormSubmit();refreshAll();checkHasParlay('t','1');">
<iframe name='DataFrame_L' src="" style="display: none"></iframe>
<iframe name='DataFrame_D' src="" style="display: none"></iframe>

<div id="MainFly" class="MainFly">
<div class="titleBar">
    <div class="title"><?=$lang_member[890];?> <?=$lang_member[890];?></div>
    <div class="right">
        <a id="btnSwitchBack" href="javascript:LiveInfoBackButton();" class="button mark" style="display:none" title="<?=$lang_member[492];?>"><span><?=$lang_member[492];?></span></a> 
        <a id="b_SwitchToParlay" href="javascript:SwitchToParlay('1');" class="button mark" style="display:none" title="<?=$lang_member[767];?>"><span><?=$lang_member[767];?></span></a>
        <div id="selLeagueType_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('selLeagueType',event);return false;" onclick="onClickSelecter('selLeagueType');return false;" class="button select icon">
<input type="hidden" name="selLeagueType" id="selLeagueType" value="0" />
<span  id="selLeagueType_Txt" title='<?=$lang_member[823];?>'><div id="selLeagueType_Icon" class="icon_All"></div></span>
<ul id="selLeagueType_menu" class="submenu">
<li  title='<?=$lang_member[823];?>' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selLeagueType',this,'0',true);changeLeagueType(0);"><div class="icon_All"></div><?=$lang_member[823];?></li>
<li  title='<?=$lang_member[825];?>' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selLeagueType',this,'1',true);changeLeagueType(1);"><div class="icon_Main"></div><?=$lang_member[825];?></li>
</ul>
</div>

        <!--<a id="aSorter" href="javascript:setRefreshSort();" class="button"><span id="t_Order"><div id="aSorter_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('aSorter',event);return false;" onclick="onClickSelecter('aSorter');return false;" class="button select icon">
<input type="hidden" name="aSorter" id="aSorter" value="0" />
<span  id="aSorter_Txt" title='เรียงลำดับตามปกติ'><div id="aSorter_Icon" class="icon_NO"></div></span>
<ul id="aSorter_menu" class="submenu">
<li  title='เรียงตามเวลา' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('aSorter',this,'1',true);"><div class="icon_ST"></div>เรียงตามเวลา</li>
<li  title='เรียงลำดับตามปกติ' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('aSorter',this,'0',true);"><div class="icon_NO"></div>เรียงลำดับตามปกติ</li>
</ul>
</div>
</span></a>-->
        <div id="aSorter_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('aSorter',event);return false;" onclick="onClickSelecter('aSorter');return false;" class="button select icon">
<input type="hidden" name="aSorter" id="aSorter" value="0" />
<span  id="aSorter_Txt" title='<?=$lang_member[774];?>'><div id="aSorter_Icon" class="icon_NO"></div></span>
<ul id="aSorter_menu" class="submenu">
<li  title='<?=$lang_member[775];?>' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('aSorter',this,'1',true);"><div class="icon_ST"></div><?=$lang_member[775];?></li>
<li  title='<?=$lang_member[774];?>' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('aSorter',this,'0',true);"><div class="icon_NO"></div><?=$lang_member[774];?></li>
</ul>
</div>

	    <a href="javascript:openLeague(640,'<?=$lang_member[786];?>','t','1','4,30','0','CorrectScore');" class="button selectLeague" title="<?=$lang_member[786];?>">
        	<span>
            <div id="League_New" class="displayOff">
              <div id="SelLeagueIcon">
                <div class="icon">
                </div>
              </div>
              <div class="events">
                <div class="normal">(</div><div id="CustSelL" class="selected"></div><div id="AllSelL" class="normal"></div><div class="normal">/</div><div id="TotalLeagueCnt" class="normal"></div><div class="normal">)</div>
              </div>
              <?=$lang_member[788];?></div>
            <div id="League_Old">
              <?=$lang_member[786];?></div>
            </span>
        </a>
	    <div id="disstyle_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('disstyle',event);return false;" onclick="onClickSelecter('disstyle');return false;" class="button select icon">
<input type="hidden" name="disstyle" id="disstyle" value="F" />
<span  id="disstyle_Txt" title='เต็มเวลา'><div id="disstyle_Icon" class="icon_FT"></div></span>
<ul id="disstyle_menu" class="submenu">
<li  title='เต็มเวลา' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('disstyle',this,'F',true);changeDisplayMode('F','ohoking.com'); parent.focus();"><div class="icon_FT"></div>เต็มเวลา</li>
<li  title='ครึ่งแรก​' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('disstyle',this,'1H',true);changeDisplayMode('1H','ohoking.com'); parent.focus();"><div class="icon_HT"></div>ครึ่งแรก​</li>
<li  title='ครึ่งหลัง' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('disstyle',this,'2H',true);changeDisplayMode('2H','ohoking.com'); parent.focus();"><div class="icon_2HT"></div>ครึ่งหลัง</li>
</ul>
</div>

        <a href="javascript:refreshData_D();" id="btnRefresh_D" class="button disable">
        	<span>
            	<div class="icon-refresh" title="กรุณารอ"></div>
            </span>
        </a>
        <a href="javascript:refreshData_L();" id="btnRefresh_L" class="button disable" style="display:none"><span><div class="icon-refresh" title="กรุณารอ"></div></span></a>
    </div>
</div>
<div id ="MiddleLiveInfo" class="MainTVInfo" style="display: none; color:#e8eff5">
	<div class="loadiframe" ><iframe id="MiddleLiveInfoFrame" src="" height="417" scrolling="no" frameborder="0"></iframe></div>
</div>
</div>

	<div id='OddsTr' style="display:none">
		<div id="divSelectDate" class="board" style="display:none">
              <ul class="panelInfo">
                <li><span class="title" onclick="selectDate(this,'');" style="cursor:pointer;color:{{spnSelectDate_Color_0}}">{{lbl_all}}</span></li>
                <li><span class="title" onclick="selectDate(this,'{{date_1}}');" style="cursor:pointer;color:{{spnSelectDate_Color_1}}">{{day_1}} {{month_1}}({{week_1}})</span></li>
                <li><span class="title" onclick="selectDate(this,'{{date_2}}');" style="cursor:pointer;color:{{spnSelectDate_Color_2}}">{{day_2}} {{month_2}}({{week_2}})</span></li>
                <li><span class="title" onclick="selectDate(this,'{{date_3}}');" style="cursor:pointer;color:{{spnSelectDate_Color_3}}">{{day_3}} {{month_3}}({{week_3}})</span></li>
                <li><span class="title" onclick="selectDate(this,'{{date_4}}');" style="cursor:pointer;color:{{spnSelectDate_Color_4}}">{{day_4}} {{month_4}}({{week_4}})</span></li>
                <li><span class="title" onclick="selectDate(this,'{{date_5}}');" style="cursor:pointer;color:{{spnSelectDate_Color_5}}">{{day_5}} {{month_5}}({{week_5}})</span></li>
                <li><span class="title" onclick="selectDate(this,'{{date_6}}');" style="cursor:pointer;color:{{spnSelectDate_Color_6}}">{{day_6}} {{month_6}}({{week_6}})</span></li>
                <li><span class="title" onclick="selectDate(this,'{{date_7}}');" style="cursor:pointer;color:{{spnSelectDate_Color_7}}">{{day_7}} {{month_7}}({{week_7}})</span></li>
              </ul>
            </div>
			<div class="tabbox">
            <div class="{{tabbox_F}}" id="oTableContainer_L"></div>
            <div class="{{tabbox_F}}" id="oTableContainer_D"></div>
            </div>
		</div>
			<div id="TrNoInfo"  style="display: none">
            <table class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                	<td align="center" class="tabtitle" style="border-radius: 0;">ไม่มีการแข่งขันหรือเกมในขณะนี้ กรุณาเข้าชมการแข่งกีฬาหรือเกมอื่น ๆ แล้วกลับมาใหม่ภายหลัง</td>
                </tr>
            </table>
            </div>
			<div id="BetList" align="center"><img src="template/maxbet/public/images/layout/loading.gif" vspace="2" /></div>


<form action="CorrectScore_data.php" target="DataFrame_L" name="DataForm_L" style="display: none">
	<input type="hidden" name="Market" value="l"/>
	<input type="hidden" name="Sport" value="1">
	<input type="hidden" name="RT" value="W" />
	<input type="hidden" name="CT" value="" />
    <input type="hidden" name="DT" value="" />
	<input type="hidden" name="Game" value="0" />
    <input type="hidden" name="OrderBy" value="0" />
	<input type="hidden" name="key" value="" />
    <input type="hidden" name="MainLeague" value="0" />
    <input type="hidden" name="Page" value="CORRECTSCORE" />
</form>

<form action="CorrectScore_data.php" target="DataFrame_D" name="DataForm_D" style="display: none">
	<input type="hidden" name="Market" value="t"/>
	<input type="hidden" name="Sport" value="1">
	<input type="hidden" name="RT" value="W" />
	<input type="hidden" name="CT" value="" />
    <input type="hidden" name="DT" value="" />
	<input type="hidden" name="Game" value="0" />
    <input type="hidden" name="OrderBy" value="0" />
	<input type="hidden" name="key" value="" />
    <input type="hidden" name="MainLeague" value="0" />
    <input type="hidden" name="Page" value="CORRECTSCORE" />
</form>

<div id="PopDiv" style="display: none">
	<div class="popupW">
        <div id="PopTitle" class="popupWTitle">
        	<span>
                <div class="popWIcon"></div>
                <div id="PopTitleText" class="popWTitleContain"></div>
                <div id="PopCloser" class="popWClose" title="ปิด"></div>
            </span>
        </div>
        <div id="oPopContainer" class="popWContain">
        </div>
    </div>
</div>

<div id="LiveInfoMenu" style="display: none;">
    <ul class="cm-nav">
        <li><a onclick="JSF">Full View</a></li>
        <li><a onclick="JSS">Side View</a></li>
    </ul>
</div>

<iframe name='PopFrame' id='PopFrame' src="" style="display: none" onload="document.getElementById('oPopContainer').innerHTML=this.contentWindow.document.body.innerHTML;OverWriteFormSubmit();"></iframe>
<div id="cm-nav" style="display:none">
    <ul class="cm-nav">
        <li><a href="#L">Large View</a></li>
        <li><a href="#S">Small View</a></li>
    </ul>
</div>
</body>
</html> 