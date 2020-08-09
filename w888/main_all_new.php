<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
require("lang/variable_lang.php");
// require("lang/member_lang.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>Tennis</title>

	<link href="template/maxbet/public/css/table_w.css" rel="stylesheet" type="text/css"/>

	<link href="template/maxbet/public/css/button.css" rel="stylesheet" type="text/css"/>

	<link href="template/maxbet/public/css/oddsFamily.css" rel="stylesheet" type="text/css"/>

	<script language="JavaScript" type="text/javascript">
		console.log('main page')
		var REFRESH_INTERVAL_L = 20000;

		var REFRESH_INTERVAL_D = 60000;

		var REFRESH_COUNTDOWN = 720; //60;

		var RES_REFRESH = "<?=$lang_member[769];?>";

		var RES_PLEASE_WAIT = "<?=$lang_member[770];?>";

		var RES_ODD = "<?=$lang_member[453];?>";

		var RES_EVEN = "<?=$lang_member[459];?>";

		var RES_UNDER = "<?=$lang_member[312];?>";

		var RES_LIVE = "<?=$lang_member[772];?>";

		var PAGE_MARKET = "t";

		var RES_POINTS3 = "Pts";

		var RES_TIEBREAK3 = "Tiebreak";

		var RES_POINTS5 = "Pts";

		var RES_TIEBREAK5 = "Tiebreak";

		var RES_ADVANTAGE_HINT = "Advantage";

		var RES_POINTS_HINT = "Points";

		var RES_TIEBREAK_HINT = "Tiebreak";

		var RES_NormalSort = "<?=$lang_member[774];?>";

		var RES_SortByTime = "<?=$lang_member[775];?>";

		var RES_MORE_UNDER = "<?=$lang_member[312];?>";

		var RES_MORE_OVER = "<?=$lang_member[314];?>";

		var RES_MORE_ODD = "<?=$lang_member[453];?>";

		var RES_MORE_EVEN = "<?=$lang_member[459];?>";

		var RES_MORE_YES = "Yes";

		var RES_MORE_NO = "No";

		var RES_MORE_NOTIEBREAK = "No Tiebreak";

		var RES_MORE_NEITHER = "<?=$lang_member[777];?>";

		var RES_MORE_EXACTLY = "Exactly";

		var RES_MORE_TIE = "Tie";

		var RES_ROUND = "Round";

		var RES_PageType;

		var RES_DRAW = "<?=$lang_member[220];?>";

		var RES_Esport_Game = "Game";

		var RES_Esport_Tournament = "Tournament";

		var RES_Esport_StartDate = "Start Date";

		var RES_Esport_EndDate = "End Date";

		var RES_CloseBanner = "<?=$lang_member[612];?>";
	</script>

	<script language="JavaScript" type="text/javascript" src="commJS/jquery.min.js"></script>

	<script language="JavaScript" type="text/javascript" src="commJS/getDataClass.js"></script>

	<script language="JavaScript" type="text/javascript" src="commJS/ajaxData.js"></script>

	<script language="JavaScript" type="text/javascript" src="commJS/odds/MultiSport_Def.js"></script>

	<script language="JavaScript" type="text/javascript" src="commJS/OddsUtils.js"></script>

	<script language="JavaScript" type="text/javascript" src="commJS/OddsKeeper.js"></script>

	<!--<script language="JavaScript" type="text/javascript" src="commJS/odds/Tennis_Def.js?v=201205311342"></script>-->

	<script language="JavaScript" type="text/javascript" src="commJS/odds/Tennis.js"></script>

	<script language="JavaScript" type="text/javascript" src="commJS/DivLauncher.js"></script>

	<script language="JavaScript" type="text/javascript" src="commJS/LiveScore.js"></script>

	<script language="JavaScript" type="text/javascript" src="commJS/streaming.js"></script>

	<script language="JavaScript" type="text/javascript" src="commJS/common.js"></script>

	<script language="JavaScript" type="text/javascript" src="commJS/odds/more.js"></script>

	<script language="JavaScript" type="text/javascript" src="commJS/jquery.mCustomScrollbar.js"></script>



</head>

<?
    $sportID = ($_GET['Sport']=="") ? 44 : $_GET['Sport'];
    switch ($sportID) {
        case 44:
            $sportName = $lang_member[747];
            break;
        case 5:
            $sportName = $lang_member[749];
            break;
        case 9:
            $sportName = $lang_member[750];
            break;
        case 6:
            $sportName = $lang_member[752];
            break;
        case 24:
            $sportName = $lang_member[754];
            break;
        default:
            $sportName = "";
            break;
    }
?>

<body id="Tennis" class="dummy" onload="OverWriteFormSubmit();refreshAll();checkHasParlay('t','<?=$sportID;?>');">

	<iframe name='DataFrame_L' src="" style="display: none"></iframe>

	<iframe name='DataFrame_D' src="" style="display: none"></iframe>

	<div class="titleBar">

		<div class="title"><?=$sportName;?></div>

		<div class="right">

			<a id="b_SwitchToParlay" href="javascript:SwitchToParlay('<?=$sportID;?>');" class="button mark" style="display:none" title="<?=$lang_member[767];?>"><span><?=$lang_member[767];?></span></a>

			<!--<div id="selLeagueType_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('selLeagueType',event);return false;" onclick="onClickSelecter('selLeagueType');return false;" class="button select icon">

<input type="hidden" name="selLeagueType" id="selLeagueType" value="0" />

<span  id="selLeagueType_Txt" title='ตลาดทั้งหมด'><div id="selLeagueType_Icon" class="icon_All"></div></span>

<ul id="selLeagueType_menu" class="submenu">

<li  title='ตลาดทั้งหมด' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selLeagueType',this,'0',true);changeLeagueType(0);"><div class="icon_All"></div>ตลาดทั้งหมด</li>

<li  title='ตลาดหลัก' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selLeagueType',this,'1',true);changeLeagueType(1);"><div class="icon_Main"></div>ตลาดหลัก</li>

</ul>

</div>

-->

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

				<input type="hidden" name="aSorter" id="aSorter" value="0"/>

				<span id="aSorter_Txt" title='<?=$lang_member[774];?>'>
					<div id="aSorter_Icon" class="icon_NO"></div>
				</span>

				<ul id="aSorter_menu" class="submenu">

					<li title='<?=$lang_member[775];?>' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('aSorter',this,'1',true);">
						<div class="icon_ST"></div><?=$lang_member[775];?></li>

					<li title='<?=$lang_member[774];?>' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('aSorter',this,'0',true);">
						<div class="icon_NO"></div><?=$lang_member[774];?></li>

				</ul>

			</div>



			<a href="javascript:openLeague(640,'<?=$lang_member[786];?>','t','<?=$sportID;?>','1,2,3,20','0','Tennis');" class="button selectLeague" title="<?=$lang_member[786];?>">

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

		



			<div id="selOddsType_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('selOddsType',event);return false;" onclick="onClickSelecter('selOddsType');return false;" class="button select icon">

				<input type="hidden" name="selOddsType" id="selOddsType" value="4"/>

				<span id="selOddsType_Txt" title='<?=$lang_member[790];?>'>
					<div id="selOddsType_Icon" class="icon_MY"></div>
				</span>

				<ul id="selOddsType_menu" class="submenu">

					<li title='<?=$lang_member[791];?>' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selOddsType',this,'2',true);changeOddsType(2);">
						<div class="icon_HK"></div><?=$lang_member[791];?></li>

					<li title='<?=$lang_member[793];?>' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selOddsType',this,'1',true);changeOddsType(1);">
						<div class="icon_Dec"></div><?=$lang_member[793];?></li>

					<li title='<?=$lang_member[790];?>' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selOddsType',this,'4',true);changeOddsType(4);">
						<div class="icon_MY"></div><?=$lang_member[790];?></li>

				</ul>

			</div>





			<a href="javascript:refreshData_D();" id="btnRefresh_D" class="button disable"><span><div class="icon-refresh" title="<?=$lang_member[770];?>"></div></span></a>

			<a href="javascript:refreshData_L();" id="btnRefresh_L" class="button disable" style="display:none"><span><div class="icon-refresh" title="<?=$lang_member[770];?>"></div></span></a>

		</div>

	</div>

	<div id="ESportBanner" style="display:none"></div>







	<div id='OddsTr' Class="" style="display: none">

		<div id="divSelectDate" class="board" style="display:none">

			<ul class="panelInfo">

				<li><span class="title" onclick="selectDate(this,'');" style="cursor:pointer;color:{{spnSelectDate_Color_0}}">{{lbl_all}}</span>
				</li>

				<li><span class="title" onclick="selectDate(this,'{{date_1}}');" style="cursor:pointer;color:{{spnSelectDate_Color_1}}">{{day_1}} {{month_1}}({{week_1}})</span>
				</li>

				<li><span class="title" onclick="selectDate(this,'{{date_2}}');" style="cursor:pointer;color:{{spnSelectDate_Color_2}}">{{day_2}} {{month_2}}({{week_2}})</span>
				</li>

				<li><span class="title" onclick="selectDate(this,'{{date_3}}');" style="cursor:pointer;color:{{spnSelectDate_Color_3}}">{{day_3}} {{month_3}}({{week_3}})</span>
				</li>

				<li><span class="title" onclick="selectDate(this,'{{date_4}}');" style="cursor:pointer;color:{{spnSelectDate_Color_4}}">{{day_4}} {{month_4}}({{week_4}})</span>
				</li>

				<li><span class="title" onclick="selectDate(this,'{{date_5}}');" style="cursor:pointer;color:{{spnSelectDate_Color_5}}">{{day_5}} {{month_5}}({{week_5}})</span>
				</li>

				<li><span class="title" onclick="selectDate(this,'{{date_6}}');" style="cursor:pointer;color:{{spnSelectDate_Color_6}}">{{day_6}} {{month_6}}({{week_6}})</span>
				</li>

				<li><span class="title" onclick="selectDate(this,'{{date_7}}');" style="cursor:pointer;color:{{spnSelectDate_Color_7}}">{{day_7}} {{month_7}}({{week_7}})</span>
				</li>

			</ul>

		</div>

		<div class="tabbox">

			<div class="tabbox_F" id="oTableContainer_L"></div>

			<div class="tabbox_F" id="oTableContainer_D"></div>

		</div>

	</div>

	<div id="TrNoInfo" style="display: none">

		<table class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">

			<tr>

				<td align="center" class="tabtitle" style="border-radius: 0;"><?=$lang_member[795];?></td>

			</tr>

		</table>

	</div>

	<div id="BetList" align="center"><img src="http://i.mbxcdn.com/template/maxbet/public/images/layout/loading.gif" vspace="2"/>
	</div>

	</td>





	<form action="Tennis_data.aspx" target="DataFrame_L" name="DataForm_L" style="display: none">

		<input type="hidden" name="Sport" value="<?=$sportID;?>"/>

		<input type="hidden" name="Market" value="l"/>

		<input type="hidden" name="DT" value=""/>

		<input type="hidden" name="RT" value="W"/>

		<input type="hidden" name="CT" value=""/>

		<input type="hidden" name="Game" value="0"/>

		<input type="hidden" name="OrderBy" value="0"/>

		<input type="hidden" name="OddsType" value="4"/>

		<input type="hidden" name="MainLeague" value="0"/>

		<input type="hidden" name="key" value=""/>

	</form>



	<form action="Tennis_data.aspx" target="DataFrame_D" name="DataForm_D" style="display: none">

		<input type="hidden" name="Sport" value="<?=$sportID;?>"/>

		<input type="hidden" name="Market" value="t"/>

		<input type="hidden" name="DT" value=""/>

		<input type="hidden" name="RT" value="W"/>

		<input type="hidden" name="CT" value=""/>

		<input type="hidden" name="Game" value="0"/>

		<input type="hidden" name="OrderBy" value="0"/>

		<input type="hidden" name="OddsType" value="4"/>

		<input type="hidden" name="MainLeague" value="0"/>

		<input type="hidden" name="key" value=""/>

	</form>



	<div id="PopDiv" style="display: none">

		<div class="popupW">

			<div id="PopTitle" class="popupWTitle">

				<span>

					<div class="popWIcon"></div>

					<div id="PopTitleText" class="popWTitleContain"></div>

					<div id="PopCloser" class="popWClose" title="<?=$lang_member[612];?>"></div>

				</span>

			</div>

			<div id="oPopContainer" class="popWContain">

			</div>

		</div>

	</div>



	<iframe name='PopFrame' id='PopFrame' src="" style="display: none" onload="document.getElementById('oPopContainer').innerHTML=this.contentWindow.document.body.innerHTML;"></iframe>

	<div id="cm-nav" style="display:none">

		<ul class="cm-nav">

			<li><a href="#L">Large View</a>
			</li>

			<li><a href="#S">Small View</a>
			</li>

		</ul>

	</div>

	<div id="Tennis_More" style="display:none"></div>

</body>

</html>