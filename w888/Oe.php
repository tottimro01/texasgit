<?
session_start();
require('inc/conn.php');
require('inc/function.php');
$url_op=$json_path."/json/sport.json"; 
$op_js=file_get_contents2($url_op);
$jsop = json_decode($op_js, true);

if($jsop["open"]==0){ 
  include 'sa_close.php'; 
  exit(); 
} 

// require("lang/member_lang.php");
  require("lang/variable_lang.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Odd Even</title>
<link href="template/maxbet/public/css/table_w.css" rel="stylesheet" type="text/css" />
<link href="template/maxbet/public/css/button.css" rel="stylesheet" type="text/css" />
<link href="template/maxbet/public/css/oddsFamily.css" rel="stylesheet" type="text/css" />
<?
  $_resDayFormat_dt_arr = array();
  for ($i=0; $i < 7; $i++) { 
    $_resDayFormat_dt = new DateTime();
    $_resDayFormat_dt->setTimezone(new DateTimeZone('Asia/Singapore'));
    $_resDayFormat_dt->setTimestamp(strtotime("now"));
    $_resDayFormat_dt->modify('+'.(($i+1)*24).' hours');
    $_resDayFormat_dt_arr[] = $_resDayFormat_dt->format('n/j/Y');

    $_resDay[] = e_formatDate($_resDayFormat_dt->getTimestamp());
  }

  function e_formatDate($tstamp){
    $m = intval(date("m", $tstamp));
    $d = (date("d", $tstamp));
    $l = strtolower((date("l", $tstamp)));
    switch ($m) {
      case 1:  $m_name = $lang_months_short[0]; break;
      case 2:  $m_name = $lang_months_short[1]; break;
      case 3:  $m_name = $lang_months_short[2]; break;
      case 4:  $m_name = $lang_months_short[3]; break;
      case 5:  $m_name = $lang_months_short[4]; break;
      case 6:  $m_name = $lang_months_short[5]; break;
      case 7:  $m_name = $lang_months_short[6]; break;
      case 8:  $m_name = $lang_months_short[7]; break;
      case 9:  $m_name = $lang_months_short[8]; break;
      case 10: $m_name = $lang_months_short[9]; break;
      case 11: $m_name = $lang_months_short[10]; break;
      case 12: $m_name = $lang_months_short[11]; break;
      default: $m_name = "";     break;
    }

    switch ($l) {
      case 'sunday':    $l_name = $lang_days[0]; break;
      case 'monday':    $l_name = $lang_days[1]; break;
      case 'tuesday':   $l_name = $lang_days[2]; break;
      case 'wednesday': $l_name = $lang_days[3]; break;
      case 'thursday':  $l_name = $lang_days[4]; break;
      case 'friday':    $l_name = $lang_days[5]; break;
      case 'saturday':  $l_name = $lang_days[6]; break;
      default:          $l_name = ""; break;
    }
    return $d . " " . $m_name . "(" . $l_name . ")";
  }
?>
<?  
    $_sportMarket = $_GET['Market'];
    switch (strtolower($_sportMarket)) {
        case 'e': $_sportTitle = $lang_sport[64];   break;
        case 't': $_sportTitle = $lang_sport[65];break;
        default:  $_sportTitle = "";         break;
    }
?>
<script language="JavaScript" type="text/javascript">
var REFRESH_INTERVAL = 60000;
var REFRESH_COUNTDOWN = 720; //60;
var RES_REFRESH = '<?=$lang_sport[17];?>';
var RES_PLEASE_WAIT = '<?=$lang_sport[18];?>';
var PAGE_MARKET = "t";
var RES_LIVE = '<?=$lang_sport[23];?>';
var RES_NormalSort = '<?=$lang_sport[24];?>';
var RES_SortByTime='<?=$lang_sport[25];?>';
var RES_PageType;
var RES_VAR = "VAR";
var RES_PRC = "PRC";
var RES_PPen = "PPen.";
var RES_Pen = "Pen.";
var RES_Inj = "Inj.";
var RES_VAR_full = '<?=$lang_sport[53];?>';
var RES_PRC_full = '<?=$lang_sport[54];?>';
var RES_PPen_full = '<?=$lang_sport[55];?>';
var RES_Pen_full = '<?=$lang_sport[56];?>';
var RES_Inj_full = '<?=$lang_sport[57];?>';
</script>
<script language="JavaScript" type="text/javascript" src="commJS/jquery.min.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/getDataClass.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/ajaxData.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/odds/MultiSport_Def.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/OddsUtils.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/OddsKeeper.js"></script>
<!--<script language="JavaScript" type="text/javascript" src="commJS/odds/OeTg_Def.js?v=201109271047"></script>-->
<script language="JavaScript" type="text/javascript" src="commJS/odds/Oe.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/DivLauncher.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/streaming.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/common.js"></script>
<script type="text/javascript" src="commJS/trailblazerlib.js"></script>
<script language="JavaScript" type="text/javascript">
      SelMainMarket = parseInt("0", 10);
</script>

</head>
<body id="Oe" onload="OverWriteFormSubmit();refreshAll();checkHasParlay('t','1'); fFrame.leftx._setDefaultOddsType();">
<? if($_SESSION['m_name']==""){ include 'mname_tmpl.php'; } ?>

<iframe name='DataFrame_L' src="" style="display: none"></iframe>
<iframe name='DataFrame_D' src="" style="display: none"></iframe>

<div id="MainFly" class="MainFly">
<div class="titleBar">
    <div class="title"><?=$lang_sport[111];?> <?=$lang_sport[19];?>/<?=$lang_sport[20];?></div>
    <div class="right">
        <a id="btnSwitchBack" href="javascript:LiveInfoBackButton();" class="button mark" style="display:none" title="<?=$lang_sport[59];?>"><span><?=$lang_sport[59];?></span></a> 
        <a id="b_SwitchToParlay" href="javascript:SwitchToParlay('1');" class="button mark" style="display:none" title="<?=$lang_sport[60];?>"><span><?=$lang_sport[60];?></span></a>
        <div id="selLeagueType_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('selLeagueType',event);return false;" onclick="onClickSelecter('selLeagueType');return false;" class="button select icon">
<input type="hidden" name="selLeagueType" id="selLeagueType" value="0" />
<span  id="selLeagueType_Txt" title='<?=$lang_sport[61];?>'><div id="selLeagueType_Icon" class="icon_All"></div></span>
<ul id="selLeagueType_menu" class="submenu">
<li  title='<?=$lang_sport[61];?>' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selLeagueType',this,'0',true);changeLeagueType(0);"><div class="icon_All"></div><?=$lang_sport[61];?></li>
<li  title='<?=$lang_sport[62];?>' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selLeagueType',this,'1',true);changeLeagueType(1);"><div class="icon_Main"></div><?=$lang_sport[62];?></li>
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
<span  id="aSorter_Txt" title='<?=$lang_sport[24];?>'><div id="aSorter_Icon" class="icon_NO"></div></span>
<ul id="aSorter_menu" class="submenu">
<li  title='<?=$lang_sport[25];?>' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('aSorter',this,'1',true);"><div class="icon_ST"></div><?=$lang_sport[25];?></li>
<li  title='<?=$lang_sport[24];?>' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('aSorter',this,'0',true);"><div class="icon_NO"></div><?=$lang_sport[24];?></li>
</ul>

</div>
        <a href="javascript:openLeague(640,'<?=$lang_sport[31];?>','t','1','2,12','0','Oe');" class="button selectLeague" title="<?=$lang_sport[31];?>">
        	<span>
            <div id="League_New" class="displayOff">
              <div id="SelLeagueIcon">
                <div class="icon">
                </div>
              </div>
              <div class="events">
                <div class="normal">(</div><div id="CustSelL" class="selected"></div><div id="AllSelL" class="normal"></div><div class="normal">/</div><div id="TotalLeagueCnt" class="normal"></div><div class="normal">)</div>
              </div>
              <?=$lang_sport[32];?></div>
            <div id="League_Old">
              <?=$lang_sport[31];?></div>
            </span>
        </a>
     

            <div id="selOddsType_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('selOddsType',event);return false;" onclick="onClickSelecter('selOddsType');return false;" class="button select icon">

<input type="hidden" name="selOddsType" id="selOddsType" value="4" />
<span  id="selOddsType_Txt" title='<?=$lang_sport[105];?>'><div id="selOddsType_Icon" class="icon_MY"></div></span>
<ul id="selOddsType_menu" class="submenu">
<li  title='<?=$lang_sport[107];?>' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selOddsType',this,'2',true);changeOddsType(2);"><div class="icon_HK"></div><?=$lang_sport[107];?></li>
<li  title='<?=$lang_sport[106];?>' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selOddsType',this,'1',true);changeOddsType(1);"><div class="icon_Dec"></div><?=$lang_sport[106];?></li>
<li  title='<?=$lang_sport[105];?>' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selOddsType',this,'4',true);changeOddsType(4);"><div class="icon_MY"></div><?=$lang_sport[105];?></li>
</ul>
</div>       

    <a href="javascript:refreshData_D();" id="btnRefresh_D" class="button disable"><span><div class="icon-refresh" title="<?=$lang_sport[18];?>"></div></span></a>
    <a href="javascript:refreshData_L();" id="btnRefresh_L" class="button disable" style="display:none"><span><div class="icon-refresh" title="<?=$lang_sport[18];?>"></div></span></a>
    </div>
</div>

<div id ="MiddleLiveInfo" class="MainTVInfo" style="display: none; color:#e8eff5">
	<div class="loadiframe" ><iframe id="MiddleLiveInfoFrame" src="" height="417" scrolling="no" frameborder="0"></iframe></div>
</div>
</div>

	<div id='OddsTr' style="display: none">
    <?if(strtolower($_sportMarket)=='e'){?>
        <div id="divSelectDate" class="board" style="display:block">
              <ul class="panelInfo">
                <li><span class="title" onclick="selectDate(this,'');" style="cursor:pointer;color:#003399"><?=$lang_sport[63];?></span></li>
                <li><span class="title" onclick="selectDate(this,'<?=$_resDayFormat_dt_arr[0];?>');" style="cursor:pointer;color:#9f0915"><?=$_resDay[0];?></span></li>
                <li><span class="title" onclick="selectDate(this,'<?=$_resDayFormat_dt_arr[1];?>');" style="cursor:pointer;color:#003399"><?=$_resDay[1];?></span></li>
                <li><span class="title" onclick="selectDate(this,'<?=$_resDayFormat_dt_arr[2];?>');" style="cursor:pointer;color:#003399"><?=$_resDay[2];?></span></li>
                <li><span class="title" onclick="selectDate(this,'<?=$_resDayFormat_dt_arr[3];?>');" style="cursor:pointer;color:#003399"><?=$_resDay[3];?></span></li>
                <li><span class="title" onclick="selectDate(this,'<?=$_resDayFormat_dt_arr[4];?>');" style="cursor:pointer;color:#003399"><?=$_resDay[4];?></span></li>
                <li><span class="title" onclick="selectDate(this,'<?=$_resDayFormat_dt_arr[5];?>');" style="cursor:pointer;color:#003399"><?=$_resDay[5];?></span></li>
                <li><span class="title" onclick="selectDate(this,'<?=$_resDayFormat_dt_arr[6];?>');" style="cursor:pointer;color:#003399"><?=$_resDay[6];?></span></li>
              </ul>
            </div>
    <?}else{?>

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
    <?}?>
			<div class="tabbox">
                <div class="tabbox_F" id="oTableContainer_L"></div>
                <div class="tabbox_F" id="oTableContainer_D"></div>
            </div>
</div>

			<div id="TrNoInfo"  style="display: none">
            <table class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                	<td align="center" class="tabtitle" style="border-radius: 0;"><?=$lang_sport[38];?></td>
                </tr>
            </table>
            </div>
			<div id="BetList" align="center"><img src="template/maxbet/public/images/layout/loading.gif" vspace="2" /></div>

<form action="Oe_data.php" target="DataFrame_L" name="DataForm_L" style="display: none">
    <input type="hidden" name="Market" value="l" />
	<input type="hidden" name="Sport" value="1" />
	<input type="hidden" name="RT" value="W" />
	<input type="hidden" name="CT" value="" />
    <input type="hidden" name="DT" value="" />
	<input type="hidden" name="Game" value="0" />
    <input type="hidden" name="OrderBy" value="0" />
	<input type="hidden" name="OddsType" value="4" />
    <input type="hidden" name="MainLeague" value="0" />
    <input type="hidden" name="Page" value="OE" />
	<input type="hidden" name="key" value="" />
    <input type="hidden" name="SelectLeague" value="0" />
</form>

<form action="Oe_data.php" target="DataFrame_D" name="DataForm_D" style="display: none">
	<input type="hidden" name="Market" value="t" />
	<input type="hidden" name="Sport" value="1" />
	<input type="hidden" name="RT" value="W" />
	<input type="hidden" name="CT" value="" />
    <input type="hidden" name="DT" value="" />
	<input type="hidden" name="Game" value="0" />
    <input type="hidden" name="OrderBy" value="0" />
	<input type="hidden" name="OddsType" value="4" />
    <input type="hidden" name="MainLeague" value="0" />
    <input type="hidden" name="Page" value="OE" />
	<input type="hidden" name="key" value="" />
    <input type="hidden" name="SelectLeague" value="0" />
</form>

<div id="PopDiv" style="display: none">
	<div class="popupW">
        <div id="PopTitle" class="popupWTitle">
        	<span>
                <div class="popWIcon"></div>
                <div id="PopTitleText" class="popWTitleContain"></div>
                <div id="PopCloser" class="popWClose" title="<?=$lang_sport[30];?>"></div>
            </span>
        </div>
        <div id="oPopContainer" class="popWContain">
        </div>
    </div>
</div>

<iframe name='PopFrame' id='PopFrame' src="" style="display: none" onload="document.getElementById('oPopContainer').innerHTML=this.contentWindow.document.body.innerHTML;"></iframe>
<div id="LiveInfoMenu" style="display: none;">
    <ul class="cm-nav">
        <li><a onclick="JSF">Full View</a></li>
        <li><a onclick="JSS">Side View</a></li>
    </ul>
</div>


<div id="cm-nav" style="display:none">
    <ul class="cm-nav">
        <li><a href="#L">Large View</a></li>
        <li><a href="#S">Small View</a></li>
    </ul>
</div>
</body>
</html>

