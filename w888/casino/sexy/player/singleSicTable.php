<?php   ob_start(); if (!isset($_SESSION)) { session_start(); } ?>

<?

require("../../../lang/variable_lang.php");
require("../../../lang/function_array.php");

$_SESSION["time_sexy"] = 60;
$_SESSION["gameRound"] = 1;
$_SESSION["gameShoe"] = 12345;
$_SESSION["TableId"] = $_GET["t"];
?>

























<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Baccarat</title>
<link href="../CSS/player/style_top.css" rel="stylesheet" type="text/css" />
<link href="../CSS/player/resizerT.css" rel="stylesheet" type="text/css" />
<link href="../CSS/player/style_one.css" rel="stylesheet" type="text/css" />
<link href="../CSS/player/table_list.css" rel="stylesheet" type="text/css" />
<link href="../CSS/player/poker_card_one.css" rel="stylesheet" type="text/css" />
<link href="../CSS/shareSource/chips.css" rel="stylesheet" type="text/css" />
<link href="../CSS/share_source/commonResult.css" rel="stylesheet" type="text/css" />
<link href="../CSS/jquery-ui-themes-1.10.4/themes/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<link id="mainCSS" href="../CSS/sic_bo-web/sic_bo-web.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<script type="text/JavaScript" src="../js/const/Const.js?v=2019050611"></script>
<script type="text/JavaScript" src="../js/util/JSUtil.js?v=2019050611"></script>
<script type="text/JavaScript" src="../js/player/singleSicTable.js?v=2019050611"></script>
<script type="text/JavaScript" src="../js/player/goodRoadAndQuickBetWeb.js?v=2019050611"></script>
<script type="text/javascript" src="../js/swf/swfobject.js"></script>
<script type="text/JavaScript" src="../js/hls/hls.min.js?v=2019050611"></script>
<script type="text/JavaScript" src="../js/hls/HLSJSAPI.js?v=2019050611"></script>
<script type="text/javascript" src="../js/hls/streama.js"></script>
<script type="text/javascript" src="../js/jquery.nicescroll.min-3.7.6.js"></script>
<script type="text/javascript" src="../js/jquery-ui.1.12.1-min.js"></script>
<script type="text/javascript">
var $j = jQuery.noConflict();
I18N.setResource({
	"form.text.baccarat"                         : "<?=$lang_member[355]?>",
	"form.text.category.banker1"                 : "<?=$lang_member[361]?>",
	"form.text.category.player1"                 : "<?=$lang_member[359]?>",
	"form.text.category.tiger1"                  : "<?=$lang_member[1215]?>",
	"form.text.category.dragon1"                 : "<?=$lang_member[1216]?>",
	"form.text.chips.selectChips"                : "<?=$lang_member[1583]?>",
	"form.text.chips.selectChips1"               : "<?=$lang_member[1566]?>",
	"form.text.chips.selectChips2"               : "Chip",
	"form.text.click"                            : "<?=$lang_member[92]?>",
	"form.text.dealerName"                       : "<?=$lang_member[1571]?>",
	"form.text.dragonTiger"                      : "<?=$lang_member[1215]?> <?=$lang_member[1216]?>",
	"form.text.fishPrawnCrab"                    : "<?=$lang_g['game_zone'][5]?>",
	"form.text.game"                             : "<?=$lang_member[37]?>",
	
	"form.text.goodRoad.bac.1"              : "<?=$lang_member[1567]?>  1",
	"form.text.goodRoad.dra.1"              : "<?=$lang_member[1567]?>  1",
	
	"form.text.goodRoad.bac.2"              : "<?=$lang_member[1567]?>  2",
	"form.text.goodRoad.dra.2"              : "<?=$lang_member[1567]?>  2",
	
	"form.text.goodRoad.bac.3"              : "<?=$lang_member[1567]?>  3",
	"form.text.goodRoad.dra.3"              : "<?=$lang_member[1567]?>  3",
	
	"form.text.goodRoad.bac.4"              : "<?=$lang_member[1567]?>  4",
	"form.text.goodRoad.dra.4"              : "<?=$lang_member[1567]?>  4",
	
	"form.text.goodRoad.bac.5"              : "<?=$lang_member[1567]?>  5",
	"form.text.goodRoad.dra.5"              : "<?=$lang_member[1567]?>  5",
	
	"form.text.goodRoad.bac.6"              : "<?=$lang_member[1567]?>  6",
	"form.text.goodRoad.dra.6"              : "<?=$lang_member[1567]?>  6",
	
	"form.text.goodRoad.bac.7"              : "<?=$lang_member[1567]?>  7",
	"form.text.goodRoad.dra.7"              : "<?=$lang_member[1567]?>  7",
	
	"form.text.goodRoad.bac.8"              : "<?=$lang_member[1567]?>  8",
	"form.text.goodRoad.dra.8"              : "<?=$lang_member[1567]?>  8",
	
	"form.text.goodRoad.bac.9"              : "<?=$lang_member[1567]?>  9",
	"form.text.goodRoad.dra.9"              : "<?=$lang_member[1567]?>  9",
	
	"form.text.goodRoad.bac.10"              : "<?=$lang_member[1567]?>  10",
	"form.text.goodRoad.dra.10"              : "<?=$lang_member[1567]?>  10",
	
	"form.text.member.balance"                   : "<?=$lang_member[563]?>",
	"form.text.noMorebet"                        : "<?=$lang_member[1572]?>",
	
	"form.text.noBetOver1"                  : "<?=$lang_member[1573]?> 1 <?=$lang_member[643]?>",
	
	"form.text.noBetOver2"                  : "<?=$lang_member[1573]?> 2 <?=$lang_member[643]?>",
	
	"form.text.noBetOver3"                  : "<?=$lang_member[1573]?> 3 <?=$lang_member[643]?>",
	
	"form.text.noBetOver4"                  : "<?=$lang_member[1573]?> 4 <?=$lang_member[643]?>",
	
	"form.text.noBetOver5"                  : "<?=$lang_member[1573]?> 5 <?=$lang_member[643]?>",
	
	"form.text.noBetOver6"                  : "<?=$lang_member[1573]?> 6 <?=$lang_member[643]?>",
	
	"form.text.noBetOver7"                  : "<?=$lang_member[1573]?> 7 <?=$lang_member[643]?>",
	
	"form.text.noBetOver8"                  : "<?=$lang_member[1573]?> 8 <?=$lang_member[643]?>",
	
	"form.text.noBetOver9"                  : "<?=$lang_member[1573]?> 9 <?=$lang_member[643]?>",
	
	"form.text.noBetOver10"                  : "<?=$lang_member[1573]?> 10 <?=$lang_member[643]?>",
	
	"form.text.noBetOver11"                  : "<?=$lang_member[1573]?> 11 <?=$lang_member[643]?>",
	
	"form.text.noBetOver12"                  : "<?=$lang_member[1573]?> 12 <?=$lang_member[643]?>",
	
	"form.text.noBetOver13"                  : "<?=$lang_member[1573]?> 13 <?=$lang_member[643]?>",
	
	"form.text.noBetOver14"                  : "<?=$lang_member[1573]?> 14 <?=$lang_member[643]?>",
	
	"form.text.noBetOver15"                  : "<?=$lang_member[1573]?> 15 <?=$lang_member[643]?>",
	
	"form.text.noBetOver16"                  : "<?=$lang_member[1573]?> 16 <?=$lang_member[643]?>",
	
	"form.text.noBetOver17"                  : "<?=$lang_member[1573]?> 17 <?=$lang_member[643]?>",
	
	"form.text.noBetOver18"                  : "<?=$lang_member[1573]?> 18 <?=$lang_member[643]?>",
	
	"form.text.noBetOver19"                  : "<?=$lang_member[1573]?> 19 <?=$lang_member[643]?>",
	
	"form.text.noBetOver20"                  : "<?=$lang_member[1573]?> 20 <?=$lang_member[643]?>",
	
	"form.text.report.Total"                     : "<?=$lang_member[304]?>",
	"form.text.startBet"                         : "<?=$lang_member[1568]?>",
	"form.text.sicbo"                            : "<?=$lang_member[1217]?>",
	"form.text.sicCategory.big"                  : "<?=$lang_member[314]?>",
	"form.text.sicCategory.small"                : "<?=$lang_member[312]?>",
	"form.text.sicCategory.odd"                  : "<?=$lang_member[453]?>",
	"form.text.sicCategory.even"                 : "<?=$lang_member[459]?>",
	"form.text.swipeup"                          : "<?=$lang_member[1635]?>",
	"form.text.table"                            : "<?=$lang_member[1546]?>",
	"form.text.toStartBetting"                   : "<?=$lang_member[1636]?>",
	"form.text.totalPoint"                       : "<?=$lang_member[1637]?>",
	"form.text.winner"                           : "<?=$lang_member[1574]?>",
	"form.text.winner.banker"                    : "<?=$lang_member[196]?>",
	"form.text.winner.tiger"                     : "<?=$lang_member[1215]?><?=$lang_member[780]?>",
	"form.text.winner.player"                    : "<?=$lang_member[194]?>",
	"form.text.winner.dragon"                    : "<?=$lang_member[1216]?><?=$lang_member[780]?>",
	"form.text.winner.tie"                       : "<?=$lang_member[220]?>",
	"msg.error.bet.raceIsNotOpen"                : "<?=$lang_member[1592]?>",
	"msg.error.betTxns.betsPlacedSuccessfully"   : "<?=$lang_member[1589]?>",
	"msg.error.betTxns.betsPlacedUnsuccessfully" : "<?=$lang_member[1590]?>",
	"msg.error.betTxns.denyHedgeBetting"         : "<?=$lang_member[1585]?>",
	"msg.error.betTxns.maxBets"                  : "<?=$lang_member[1586]?> $",
	"msg.error.betTxns.minBets"                  : "<?=$lang_member[1587]?> $",
	"msg.error.chips.minChips"                   : "<?=$lang_member[1561]?>",
	"msg.error.chips.maxChips"                   : "<?=$lang_member[380]?>",
	"msg.error.chips.selectChips"                : "<?=$lang_member[1588]?>",
	"msg.error.info.insufficientBalance"         : "<?=$lang_member[1591]?>",
	"msg.error.validation.betLimit.empty"        : "<?=$lang_member[1593]?>",
	"msg.error.voidRound"                        : "<?=$lang_member[1594]?>",
	"msg.error.info.reachMaxWinLimit"            : "<?=$lang_member[1595]?>",
	"form.text.road.word.banker"                 : "B",
	"form.text.road.word.player"                 : "P",
	"form.text.road.word.tie"                    : "T",
	"form.text.road.word.dragon"                 : "D",
	"form.text.road.word.tiger"                  : "T",
	"form.text.road.word.odd"                    : "O",
	"form.text.road.word.even"                   : "E",
	"form.text.road.word.big"                    : "B",
	"form.text.road.word.small"                  : "S",
	"form.text.road.word.triple"                 : "T",
	"msg.info.sec"                               : "<?=$lang_member[1598]?>"
});

if (typeof (PageConfig) == "undefined") {
	PageConfig = {};
}

PageConfig.currencyName          = "THB";
PageConfig.dealerDomain          = "1";
PageConfig.website               = "57";
PageConfig.currencyId            = "9";
PageConfig.userBetLimitID        = 1;
PageConfig.userBetLimitIDCache   = null;
PageConfig.userSelectChips       = "[4,5,6,7,8,9]";
PageConfig.userCustomChip        = 10;
PageConfig.currentSingleTableId  = 51;
PageConfig.playerIndexPage       = "gamehall.php";
PageConfig.playerSinglePage      = "/casino/sexy/player/singleTable4.php";
PageConfig.playerSingleRouPage   = "/casino/sexy/player/singleRouTable.php";
PageConfig.playerMultiPage       = "/casino/sexy/player/multiTable4.php";
PageConfig.playerMaintenancePage = "/casino/sexy/player/gamehallMaintenance.php";
PageConfig.allowHedgeBetting     = "true";
PageConfig.guideBacPage          = "guide/bac/guideBac_th.php?dm=1";
PageConfig.guideBacPageReady     = "0";
PageConfig.guideDraPage          = "guide/dra/guideDra_th.php?dm=1";
PageConfig.guideDraPageReady     = "0";
PageConfig.guideSicPage          = "guide/sic/guideSic_th.php?dm=1";
PageConfig.guideSicPageReady     = "0";
PageConfig.guideFpcPage          = "guide/fpc/guideFpc_th.php?dm=1";
PageConfig.guideFpcPageReady     = "0";
PageConfig.addEventListenerReady = "0";
PageConfig.streamingLine         = ["1"];
PageConfig.enableSoundEffect     = "1";
PageConfig.streamingAudio        = "0";
PageConfig.resultSound           = "0";
PageConfig.bettingSound          = "0";
PageConfig.title                 = "1";
PageConfig.enableBackgroundMusic = "1";
PageConfig.hlsAdditionalBetTime  = 4;
PageConfig.enableMexicoWebHls    = "1";
PageConfig.eventDelayTime        = 9000;
PageConfig.lineStatus            = [1,1,1];
PageConfig.lineStatusJson        = $j.parseJSON('[1,1,1]');
PageConfig.eventStatus           = -1;

if (PageConfig.enableMexicoWebHls == "1") {
	//preload HLS class
	videoCanvas.preload();
}
$j(document).ready(function() {
	if (PageConfig.enableMexicoWebHls == "1") {
		videoCanvas.setEnableVideo();
	}
	LanguageUtil.init();
	singleSicTable.init();
	ResizeUtil.doResize();
	PageUtil.commonsScriptWeb();
	PageUtil.contentLock();
	JCache.get("#gameTableList").prop("src", "gameTableList.php?dm=1");
});
</script>
</head>
<body id="body" class="">
	<div id="scaleable-wrapper" class="scaleable-wrapper" style="overflow: hidden;">
		<div id="very-specific-design" class="very-specific-design">
			<div class="top">
				<div class="left_list">
					<!--<h1 id="lobby">LOGO</h1>-->
					<ol style="display: none;">
						<li>m92m001</li>
						<li class="credit">
							ยอด <span id="userBalance">0</span>
						</li>
					</ol>
				</div>

				<ul class="right_function">
					<!--<li id="language" class="language" style="display: ">
						<a href="javascript:void(0);">
						ไทย
						</a>
						<ul id="lg" class="lg_list" style="display: none; z-index: 999">
							<li><a id="langEN" href="javascript:void(0);">English</a></li>
							<li><a id="langCN" href="javascript:void(0);">简体中文</a></li>
							<li><a id="langJP" href="javascript:void(0);">日本語</a></li>
							<li><a id="langTH" href="javascript:void(0);">ไทย</a></li>
							<li><a id="langVN" href="javascript:void(0);">Việt Nam</a></li>
							
							
						</ul>
					</li>-->

					
					<li id="sound" class="sound">
						<a id="soundLink" href="javascript:void(0);">sound</a>
						<dl>
							
							<dt><?=$lang_member[1553]?></dt>
							<dd id="streamingAudio" class="switch_off">switch</dd>
							
							
							<dt><?=$lang_member[1555]?></dt>
							<dd id="bettingSound" class="switch_off">switch</dd>
						</dl>
					</li>

					<li id="goHome" class="home">
						<a href="#">home</a>
					</li>

					<li id="menu" class="nav">
						<a id="navLink" href="javascript:void(0);">nav</a>
						<ul id="nav" class="nav_list">
							
							<li><a href="javascript:void(0);" onclick="parent.rightx.location.href='/list_bet_casino.php?vx=1&vvw=&token=<?=$_SESSION["m_token"];?>'";><?=$lang_member[43]?></a></li>
							
							<li><a id="guideBacShow" href="javascript:void(0);"><?=$lang_member[1557]?></a></li>
							<li><a id="guideDraShow" href="javascript:void(0);"><?=$lang_member[1558]?></a></li>
							<li><a id="guideSicShow" href="javascript:void(0);"><?=$lang_member[1559]?></a></li>
							
						</ul>
					</li>

				</ul>
			</div>

			<article class="gameOne">
				<audio id="soundBet" preload>
					<source src="/casino/sexy/sound/sound_bet.opus" type="audio/wav">
				</audio>
				<audio id="soundButtonTap" preload>
					<source src="/casino/sexy/sound/sound_button_tap.opus" type="audio/wav">
				</audio>
				<audio id="soundCashIn" preload>
					<source src="/casino/sexy/sound/sound_cash_in.opus" type="audio/wav">
				</audio>
				<audio id="soundSwitchChips" preload>
					<source src="/casino/sexy/sound/sound_switch_chips.opus" type="audio/wav">
				</audio>
				<audio id="soundNoMoreBet" preload>
					<source src="/casino/sexy/sound/comm_th/no_more_bet_th.opus" type="audio/wav">
				</audio>
				<audio id="soundPlaceYourBet" preload>
					<source src="/casino/sexy/sound/comm_th/place_your_bet_please_th.opus" type="audio/wav">
				</audio>

				<iframe id="guideBac" name="guide" class="game_guide" scrolling="no" style="z-index: 350; border: 0; display: none;"></iframe>
				<iframe id="guideDra" name="guide" class="game_guide" scrolling="no" style="z-index: 350; border: 0; display: none;"></iframe>
				<iframe id="guideSic" name="guide" class="game_guide" scrolling="no" style="z-index: 350; border: 0; display: none;"></iframe>
				<iframe id="guideFpc" name="guide" class="game_guide" scrolling="no" style="z-index: 350; border: 0; display: none;"></iframe>
				
				<iframe id="transHistory" name="transHistory" class="trans_history" src="txnHistory.php?dm=1" style="visibility: hidden; z-index: 350; border: 0"></iframe>
				

				<section id="tableList" class="table_list_close" style="z-index: 400;">
					<ul>
						<li id="tableListOpen" class="open">open</li>
						<li id="bacTableTitle" class="title" style="display: none; font-size: 11px;"><?=$lang_member[355]?></li>
						<div id="bacTable"></div>

						<li id="draTableTitle" class="title" style="display: none; font-size: 11px;"><?=$lang_member[1215]?> <?=$lang_member[1216]?></li>
						<div id="draTable"></div>

						<li id="sicTableTitle" class="title" style="display: none; font-size: 11px;"><?=$lang_member[1217]?></li>
						<div id="sicTable"></div>

						<li id="fpcTableTitle" class="title" style="display: none; font-size: 11px;"><?=$lang_g['game_zone'][5]?></li>
						<div id="fpcTable"></div>

						<li id="rouTableTitle" class="title" style="display: none; font-size: 11px;"><?=$lang_member[1562]?></li>
						<div id="rouTable"></div>
					</ul>
				</section>

				
				<iframe id="gameTableList" class="tale_list_frame" src="" scrolling="no" style="z-index: 500; visibility: hidden"></iframe>	

				<div id="maintenanceDiv" class="video_box maintenance" style="z-index: 250; position: absolute; display: none">
					<p style="width: 200px"><?=$lang_member[1638]?></p>
				</div>

				<section id="betLimitBox" class="game_info_box" style="display: none; z-index: 260">
					<h3>
						<?=$lang_member[1563]?>
						<a id="closeLimit" href="javascript:void(0)">close</a>
					</h3>
					<ol id="betLimitSet" class="limit_set"></ol>
					<dl>
						<dt id="range_title_bigSmall"><?=$lang_member[314]?>/<?=$lang_member[312]?></dt>
						<dd id="range_bigSmall"></dd>

						<dt id="range_title_oddEven"><?=$lang_member[453]?>/<?=$lang_member[459]?></dt>
						<dd id="range_oddEven"></dd>

						<dt id="range_title_single"><?=$lang_member[1639]?></dt>
						<dd id="range_single"></dd>

						<dt id="range_title_twoDice"><?=$lang_member[1640]?></dt>
						<dd id="range_twoDice"></dd>

						<dt id="range_title_double"><?=$lang_member[1641]?></dt>
						<dd id="range_double"></dd>

						<dt id="range_title_anyTriple"><?=$lang_member[1269]?></dt>
						<dd id="range_anyTriple"></dd>

						<dt id="range_title_triple"><?=$lang_member[1642]?></dt>
						<dd id="range_triple"></dd>
					</dl>
					<dl>
						<dt id="range_title_4And17"><?=$lang_member[1584]?> 4/17</dt>
						<dd id="range_4And17"></dd>

						<dt id="range_title_5And16"><?=$lang_member[1584]?> 5/16</dt>
						<dd id="range_5And16"></dd>

						<dt id="range_title_6And15"><?=$lang_member[1584]?> 6/15</dt>
						<dd id="range_6And15"></dd>

						<dt id="range_title_7And14"><?=$lang_member[1584]?> 7/14</dt>
						<dd id="range_7And14"></dd>

						<dt id="range_title_8And13"><?=$lang_member[1584]?> 8/13</dt>
						<dd id="range_8And13"></dd>

						<dt id="range_title_9And12"><?=$lang_member[1584]?> 9/12</dt>
						<dd id="range_9And12"></dd>

						<dt id="range_title_10And11"><?=$lang_member[1584]?> 10/11</dt>
						<dd id="range_10And11"></dd>
					</dl>
				</section>

				<section id="gameArea" class="gameArea" style="display: flex; z-index: 260;">
					<div class="mainOne">
						<div class="videoArea">
							<div class="videoZone">
								
								<div id="video-canvas-box" class="video_box" style="overflow: hidden; display: flex; justify-content: normal; height: 351px; width: 680px">
									<div id="reloadVideo" style="position: absolute; left: 12%; top: 40%; z-index: 49; display: none;"><p><?=$lang_member[1608]?>... <?=$lang_member[1609]?>.</p></div>
									<div id="loading" class="abgne-loading" style="z-index: 45; top: 140px; left: 300px; display: none;">
										<div class="loading_text"><?=$lang_member[1560]?></div>
										<div class="loading"></div>
									</div>
									<video id="video" height="351px" width="680px" margin="0" padding="0" autoplay playsinline webkit-playsinline x5-playsinline></video>
								</div>
								
								<a id="zoomVideo" href="#" class="btnVideoZoom" style="display: none"></a>
								<div class="videoTool">
									<a id="refreshBtn" href="#" class="btnVideoRefresh">refresh</a>
									<a id="changeLine" href="#" class="btnVideoChange">1</a>
								</div>
								<p class="dealerName">
									<?=$lang_member[1571]?>
									<strong id="currentDealerID"></strong>
								</p>
							</div>
							<div class="resultZone">
								<div class="result">
									<ul id="lastResult">
										<li class=""></li>
										<li class=""></li>
										<li class=""></li>
									</ul>
									<div class="resultPoint">
										<dl>
											<dt><?=$lang_member[1637]?></dt>
											<dd id="totalPoint"></dd>
										</dl>
										<ul>
											<li id="warnBigSmall" class="textOutline"></li>
											<li id="warnOddEven" class="textOutline"></li>
										</ul>
									</div>
								</div>

								<div id="historyZone" class="historyList">
									<ul style="display: none">
										<li id="historyRound1" class="gameNo"></li>
										<li id="historyDices1" class="displayF">
											<span class=""></span>
											<span class=""></span>
											<span class=""></span>
										</li>
										<li id="historyPoint1" class="resultNo"></li>
										<li id="historyType1" class="displayF">
											<p class="textOutline"></p>
											<p class="textOutline"></p>
										</li>
									</ul>
									<ul style="display: none">
										<li id="historyRound2" class="gameNo"></li>
										<li id="historyDices2" class="displayF">
											<span class=""></span>
											<span class=""></span>
											<span class=""></span>
										</li>
										<li id="historyPoint2" class="resultNo"></li>
										<li id="historyType2" class="displayF">
											<p class="textOutline"></p>
											<p class="textOutline"></p>
										</li>
									</ul>
									<ul style="display: none">
										<li id="historyRound3" class="gameNo"></li>
										<li id="historyDices3" class="displayF">
											<span class=""></span>
											<span class=""></span>
											<span class=""></span>
										</li>
										<li id="historyPoint3" class="resultNo"></li>
										<li id="historyType3" class="displayF">
											<p class="textOutline"></p>
											<p class="textOutline"></p>
										</li>
									</ul>
									<ul style="display: none">
										<li id="historyRound4" class="gameNo"></li>
										<li id="historyDices4" class="displayF">
											<span class=""></span>
											<span class=""></span>
											<span class=""></span>
										</li>
										<li id="historyPoint4" class="resultNo"></li>
										<li id="historyType4" class="displayF">
											<p class="textOutline"></p>
											<p class="textOutline"></p>
										</li>
									</ul>
									<ul style="display: none">
										<li id="historyRound5" class="gameNo"></li>
										<li id="historyDices5" class="displayF">
											<span class=""></span>
											<span class=""></span>
											<span class=""></span>
										</li>
										<li id="historyPoint5" class="resultNo"></li>
										<li id="historyType5" class="displayF">
											<p class="textOutline"></p>
											<p class="textOutline"></p>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div id="betArea" class="betArea">
							<div id="betDice" class="betDice">
								<div class="betList-1">
									<div id="BetSmall" class="small betZone">
										<div class="betContent">
											<h2><?=$lang_member[312]?></h2>
											<h3>4~10</h3>
										</div>
										<p class="textOdds">1:1</p>
									</div>

									<div id="BetOdd" class="odd betZone">
										<div class="betContent">
											<h2><?=$lang_member[453]?></h2>
										</div>
										<p class="textOdds">1:1</p>
									</div>

									<div class="dicePair">
										<div class="betContent">
											<div id="BetD11" class="betZone">
												<div>
													<span class=""></span>
													<span class=""></span>
												</div>
											</div>
											<div id="BetD22" class="betZone">
												<div>
													<span class=""></span>
													<span class=""></span>
												</div>
											</div>
											<div id="BetD33" class="betZone">
												<div>
													<span class=""></span>
													<span class=""></span>
												</div>
											</div>
											<div id="BetD44" class="betZone">
												<div>
													<span class=""></span>
													<span class=""></span>
												</div>
											</div>
											<div id="BetD55" class="betZone">
												<div>
													<span class=""></span>
													<span class=""></span>
												</div>
											</div>
											<div id="BetD66" class="betZone">
												<div>
													<span class=""></span>
													<span class=""></span>
												</div>
											</div>
										</div>
										<p class="textOdds">1:8</p>
									</div>

									<div id="BetAnyTriple" class="diceAll betZone">
										<div class="betContent">
											<span class=""></span>
											<span class=""></span>
											<span class=""></span>
											<span class=""></span>
											<span class=""></span>
											<span class=""></span>

											<span class=""></span>
											<span class=""></span>
											<span class=""></span>
											<span class=""></span>
											<span class=""></span>
											<span class=""></span>

											<span class=""></span>
											<span class=""></span>
											<span class=""></span>
											<span class=""></span>
											<span class=""></span>
											<span class=""></span>
										</div>
										<p class="textOdds">1:24</p>
									</div>

									<div class="diceThree">
										<div class="betContent">
											<div id="BetT111" class="betZone">
												<div>
													<span class=""></span>
													<span class=""></span>
													<span class=""></span>
												</div>
											</div>
											<div id="BetT222" class="betZone">
												<div>
													<span class=""></span>
													<span class=""></span>
													<span class=""></span>
												</div>
											</div>
											<div id="BetT333" class="betZone">
												<div>
													<span class=""></span>
													<span class=""></span>
													<span class=""></span>
												</div>
											</div>
											<div id="BetT444" class="betZone">
												<div>
													<span class=""></span>
													<span class=""></span>
													<span class=""></span>
												</div>
											</div>
											<div id="BetT555" class="betZone">
												<div>
													<span class=""></span>
													<span class=""></span>
													<span class=""></span>
												</div>
											</div>
											<div id="BetT666" class="betZone">
												<div>
													<span class=""></span>
													<span class=""></span>
													<span class=""></span>
												</div>
											</div>
										</div>
										<p class="textOdds">1:150</p>
									</div>

									<div id="BetEven" class="even betZone">
										<div class="betContent">
											<h2><?=$lang_hun[49]?></h2>
										</div>
										<p class="textOdds">1:1</p>
									</div>

									<div id="BetBig" class="big betZone">
										<div class="betContent">
											<h2><?=$lang_game[71]?></h2>
											<h3>11~17</h3>
										</div>
										<p class="textOdds">1:1</p>
									</div>
								</div>

								<div class="betList-2">
									<div id="BetPt4" class="betZone">
										<h2>4</h2>
										<p class="textOdds">1:50</p>
									</div>
									<div id="BetPt5" class="betZone">
										<h2>5</h2>
										<p class="textOdds">1:18</p>
									</div>
									<div id="BetPt6" class="betZone">
										<h2>6</h2>
										<p class="textOdds">1:14</p>
									</div>
									<div id="BetPt7" class="betZone">
										<h2>7</h2>
										<div class="chips3dArea">
											<div id="BetPt7Chip" class="chips3dArea-in"></div>
										</div>
										<p class="textOdds">1:12</p>
									</div>
									<div id="BetPt8" class="betZone">
										<h2>8</h2>
										<div class="chips3dArea">
											<div id="BetPt8Chip" class="chips3dArea-in"></div>
										</div>
										<p class="textOdds">1:8</p>
									</div>
									<div id="BetPt9" class="betZone openZone">
										<h2>9</h2>
										<p class="textOdds">1:6</p>
									</div>
									<div id="BetPt10" class="betZone">
										<h2>10</h2>
										<p class="textOdds">1:6</p>
									</div>
									<div id="BetPt11" class="betZone">
										<h2>11</h2>
										<p class="textOdds">1:6</p>
									</div>
									<div id="BetPt12" class="betZone">
										<h2>12</h2>
										<p class="textOdds">1:6</p>
									</div>
									<div id="BetPt13" class="betZone">
										<h2>13</h2>
										<p class="textOdds">1:8</p>
									</div>
									<div id="BetPt14" class="betZone">
										<h2>14</h2>
										<p class="textOdds">1:12</p>
									</div>
									<div id="BetPt15" class="betZone">
										<h2>15</h2>
										<p class="textOdds">1:14</p>
									</div>
									<div id="BetPt16" class="betZone">
										<h2>16</h2>
										<p class="textOdds">1:18</p>
									</div>
									<div id="BetPt17" class="betZone">
										<h2>17</h2>
										<p class="textOdds">1:50</p>
									</div>
								</div>

								<div class="betList-3">
									<p class="textOdds">1:5</p>
									<div class="betContent">
										<div id="BetTd12" class="betZone">
											<div>
												<span class=""></span>
												<span class=""></span>
											</div>
										</div>
										<div id="BetTd13" class="betZone">
											<div>
												<span class=""></span>
												<span class=""></span>
											</div>
										</div>
										<div id="BetTd14" class="betZone">
											<div>
												<span class=""></span>
												<span class=""></span>
											</div>
										</div>
										<div id="BetTd15" class="betZone">
											<div>
												<span class=""></span>
												<span class=""></span>
											</div>
										</div>
										<div id="BetTd16" class="betZone">
											<div>
												<span class=""></span>
												<span class=""></span>
											</div>
										</div>
										<div id="BetTd23" class="betZone">
											<div>
												<span class=""></span>
												<span class=""></span>
											</div>
										</div>
										<div id="BetTd24" class="betZone">
											<div>
												<span class=""></span>
												<span class=""></span>
											</div>
										</div>
										<div id="BetTd25" class="betZone">
											<div>
												<span class=""></span>
												<span class=""></span>
											</div>
										</div>
										<div id="BetTd26" class="betZone">
											<div>
												<span class=""></span>
												<span class=""></span>
											</div>
										</div>
										<div id="BetTd34" class="betZone">
											<div>
												<span class=""></span>
												<span class=""></span>
											</div>
										</div>
										<div id="BetTd35" class="betZone">
											<div>
												<span class=""></span>
												<span class=""></span>
											</div>
										</div>
										<div id="BetTd36" class="betZone">
											<div>
												<span class=""></span>
												<span class=""></span>
											</div>
										</div>
										<div id="BetTd45" class="betZone">
											<div>
												<span class=""></span>
												<span class=""></span>
											</div>
										</div>
										<div id="BetTd46" class="betZone">
											<div>
												<span class=""></span>
												<span class=""></span>
											</div>
										</div>
										<div id="BetTd56" class="betZone">
											<div>
												<span class=""></span>
												<span class=""></span>
											</div>
										</div>
									</div>
									<p class="textOdds">1:5</p>
								</div>

								<div class="betList-4">
									<p class="textOdds">
										One 1:1<br />
										Two 1:2<br />
										Three 1:3
									</p>
									<div class="betContent">
										<div id="BetS1" class="betZone">
											<span class=""></span>
											<span><?=$lang_member[1643]?></span>
										</div>
										<div id="BetS2" class="betZone">
											<span class=""></span>
											<span><?=$lang_member[1644]?></span>
										</div>
										<div id="BetS3" class="betZone">
											<span class=""></span>
											<span><?=$lang_member[1645]?></span>
										</div>
										<div id="BetS4" class="betZone">
											<span class=""></span>
											<span><?=$lang_member[1646]?></span>
										</div>
										<div id="BetS5" class="betZone">
											<span class=""></span>
											<span><?=$lang_member[1647]?></span>
										</div>
										<div id="BetS6" class="betZone">
											<span class=""></span>
											<span><?=$lang_member[1648]?></span>
										</div>
									</div>
									<p class="textOdds">
										One 1:1<br />
										Two 1:2<br />
										Three 1:3
									</p>
								</div>
							</div>

							<div id="betChips" class="betChips">
								<div class="betList-1">
									<div class="small betZone">
										<div class="chips3dArea">
											<div id="chipBetSmall" class="chips3dArea-in"></div>
										</div>
									</div>

									<div class="odd betZone">
										<div class="chips3dArea">
											<div id="chipBetOdd" class="chips3dArea-in"></div>
										</div>
									</div>

									<div class="dicePair">
										<div class="betContent">
											<div class="betZone">
												<div class="chips3dArea">
													<div id="chipBetD11" class="chips3dArea-in"></div>
												</div>
											</div>
											<div class="betZone">
												<div class="chips3dArea">
													<div id="chipBetD22" class="chips3dArea-in"></div>
												</div>
											</div>
											<div class="betZone">
												<div class="chips3dArea">
													<div id="chipBetD33" class="chips3dArea-in"></div>
												</div>
											</div>

											<div class="betZone">
												<div class="chips3dArea">
													<div id="chipBetD44" class="chips3dArea-in"></div>
												</div>
											</div>

											<div class="betZone">
												<div class="chips3dArea">
													<div id="chipBetD55" class="chips3dArea-in"></div>
												</div>
											</div>

											<div class="betZone">
												<div class="chips3dArea">
													<div id="chipBetD66" class="chips3dArea-in"></div>
												</div>
											</div>
										</div>
									</div>

									<div class="diceAll betZone">
										<div class="chips3dArea">
											<div id="chipBetAnyTriple" class="chips3dArea-in"></div>
										</div>
									</div>

									<div class="diceThree">
										<div class="betContent">
											<div class="betZone">
												<div class="chips3dArea">
													<div id="chipBetT111" class="chips3dArea-in"></div>
												</div>
											</div>
											<div class="betZone">
												<div class="chips3dArea">
													<div id="chipBetT222" class="chips3dArea-in"></div>
												</div>
											</div>
											<div class="betZone">
												<div class="chips3dArea">
													<div id="chipBetT333" class="chips3dArea-in"></div>
												</div>
											</div>
											<div class="betZone">
												<div class="chips3dArea">
													<div id="chipBetT444" class="chips3dArea-in"></div>
												</div>
											</div>
											<div class="betZone">
												<div class="chips3dArea">
													<div id="chipBetT555" class="chips3dArea-in"></div>
												</div>
											</div>
											<div class="betZone">
												<div class="chips3dArea">
													<div id="chipBetT666" class="chips3dArea-in"></div>
												</div>
											</div>
										</div>
									</div>

									<div class="even betZone">
										<div class="chips3dArea">
											<div id="chipBetEven" class="chips3dArea-in"></div>
										</div>
									</div>

									<div class="big betZone">
										<div class="chips3dArea">
											<div id="chipBetBig" class="chips3dArea-in"></div>
										</div>
									</div>
								</div>

								<div class="betList-2">
									<div class="betZone">
										<div class="chips3dArea">
											<div id="chipBetPt4" class="chips3dArea-in"></div>
										</div>
									</div>
									<div class="betZone">
										<div class="chips3dArea">
											<div id="chipBetPt5" class="chips3dArea-in"></div>
										</div>
									</div>
									<div class="betZone">
										<div class="chips3dArea">
											<div id="chipBetPt6" class="chips3dArea-in"></div>
										</div>
									</div>
									<div class="betZone">
										<div class="chips3dArea">
											<div id="chipBetPt7" class="chips3dArea-in"></div>
										</div>
									</div>
									<div class="betZone">
										<div class="chips3dArea">
											<div id="chipBetPt8" class="chips3dArea-in"></div>
										</div>
									</div>
									<div class="betZone openZone">
										<div class="chips3dArea">
											<div id="chipBetPt9" class="chips3dArea-in"></div>
										</div>
									</div>
									<div class="betZone">
										<div class="chips3dArea">
											<div id="chipBetPt10" class="chips3dArea-in"></div>
										</div>
									</div>
									<div class="betZone">
										<div class="chips3dArea">
											<div id="chipBetPt11" class="chips3dArea-in"></div>
										</div>
									</div>
									<div class="betZone">
										<div class="chips3dArea">
											<div id="chipBetPt12" class="chips3dArea-in"></div>
										</div>
									</div>
									<div class="betZone">
										<div class="chips3dArea">
											<div id="chipBetPt13" class="chips3dArea-in"></div>
										</div>
									</div>
									<div class="betZone">
										<div class="chips3dArea">
											<div id="chipBetPt14" class="chips3dArea-in"></div>
										</div>
									</div>
									<div class="betZone">
										<div class="chips3dArea">
											<div id="chipBetPt15" class="chips3dArea-in"></div>
										</div>
									</div>
									<div class="betZone">
										<div class="chips3dArea">
											<div id="chipBetPt16" class="chips3dArea-in"></div>
										</div>
									</div>
									<div class="betZone">
										<div class="chips3dArea">
											<div id="chipBetPt17" class="chips3dArea-in"></div>
										</div>
									</div>
								</div>

								<div class="betList-3">
									<div class="betContent">
										<div class="betZone">
											<div class="chips3dArea" style="top: -25px">
												<div id="chipBetTd12" class="chips3dArea-in"></div>
											</div>
										</div>
										<div class="betZone">
											<div class="chips3dArea" style="top: -25px">
												<div id="chipBetTd13" class="chips3dArea-in"></div>
											</div>
										</div>
										<div class="betZone">
											<div class="chips3dArea" style="top: -25px">
												<div id="chipBetTd14" class="chips3dArea-in"></div>
											</div>
										</div>
										<div class="betZone">
											<div class="chips3dArea" style="top: -25px">
												<div id="chipBetTd15" class="chips3dArea-in"></div>
											</div>
										</div>
										<div class="betZone">
											<div class="chips3dArea" style="top: -25px">
												<div id="chipBetTd16" class="chips3dArea-in"></div>
											</div>
										</div>
										<div class="betZone">
											<div class="chips3dArea" style="top: -25px">
												<div id="chipBetTd23" class="chips3dArea-in"></div>
											</div>
										</div>
										<div class="betZone">
											<div class="chips3dArea" style="top: -25px">
												<div id="chipBetTd24" class="chips3dArea-in"></div>
											</div>
										</div>
										<div class="betZone">
											<div class="chips3dArea" style="top: -25px">
												<div id="chipBetTd25" class="chips3dArea-in"></div>
											</div>
										</div>
										<div class="betZone">
											<div class="chips3dArea" style="top: -25px">
												<div id="chipBetTd26" class="chips3dArea-in"></div>
											</div>
										</div>
										<div class="betZone">
											<div class="chips3dArea" style="top: -25px">
												<div id="chipBetTd34" class="chips3dArea-in"></div>
											</div>
										</div>
										<div class="betZone">
											<div class="chips3dArea" style="top: -25px">
												<div id="chipBetTd35" class="chips3dArea-in"></div>
											</div>
										</div>
										<div class="betZone">
											<div class="chips3dArea" style="top: -25px">
												<div id="chipBetTd36" class="chips3dArea-in"></div>
											</div>
										</div>
										<div class="betZone">
											<div class="chips3dArea" style="top: -25px">
												<div id="chipBetTd45" class="chips3dArea-in"></div>
											</div>
										</div>
										<div class="betZone">
											<div class="chips3dArea" style="top: -25px">
												<div id="chipBetTd46" class="chips3dArea-in"></div>
											</div>
										</div>
										<div class="betZone">
											<div class="chips3dArea" style="top: -25px">
												<div id="chipBetTd56" class="chips3dArea-in"></div>
											</div>
										</div>
									</div>
								</div>

								<div class="betList-4">
									<div class="betContent">
										<div class="betZone">
											<div class="chips3dArea">
												<div id="chipBetS1" class="chips3dArea-in"></div>
											</div>
										</div>
										<div class="betZone">
											<div class="chips3dArea">
												<div id="chipBetS2" class="chips3dArea-in"></div>
											</div>
										</div>
										<div class="betZone">
											<div class="chips3dArea">
												<div id="chipBetS3" class="chips3dArea-in"></div>
											</div>
										</div>
										<div class="betZone">
											<div class="chips3dArea">
												<div id="chipBetS4" class="chips3dArea-in"></div>
											</div>
										</div>
										<div class="betZone">
											<div class="chips3dArea">
												<div id="chipBetS5" class="chips3dArea-in"></div>
											</div>
										</div>
										<div class="betZone">
											<div class="chips3dArea">
												<div id="chipBetS6" class="chips3dArea-in"></div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div id="gameInfo" class="popBgColorless">
								<div class="infoBK">
									<p></p>
								</div>
							</div>

							<div class="popBgColorless">
								<div class="infoYellow">
									<p></p>
								</div>
							</div>

							<div id="gameInfoSuccess" class="popBgColorless">
								<div class="infoBet-success">
									<p>Bet has Been Successful</p>
								</div>
							</div>

							<div id="gameInfoUnsuccessful" class="popBgColorless">
								<div class="infoBet-fail">
									<p>Bet has Been failed</p>
								</div>
							</div>

							<div id="gameInfoRed" class="popBgColorless">
								<div class="infoRed">
									<p></p>
								</div>
							</div>

							<div id="gameInfoWin" class="popBgColorless">
								<div class="infoBet-youWin">
									<h3>คุณ ชนะ</h3>
									<p></p>
								</div>
							</div>
						</div>

						<div class="roadArea">
							<ul id="roadSelect" class="ulSelect">
								<li id="oddEvenRoadLi" style="display: none"><?=$lang_member[453]?> / <?=$lang_member[459]?></li>
								<li id="bigSmallRoadLi" style="display: none"><?=$lang_member[314]?> / <?=$lang_member[312]?></li>
								<li id="sumRoadLi" style="display: none"><?=$lang_member[1649]?></li>
								<li id="diceRoadLi" style="display: none"><?=$lang_member[1650]?></li>
							</ul>

							<div id="roadZone" class="roadZone">
								<ul class="ulArrowLR">
									<li id="roadLeft" class="btnArrow-L" style="z-index: 1;"></li>
									<li id="roadRight" class="btnArrow-R" style="z-index: 1;"></li>
								</ul>
								<div class="roadZoneWH">
									<div id="oddEvenRoadPositionDiv" style="position: relative;">
										<table id="oddEvenRoadCurrentTable" style="display: none;"></table>
									</div>
									<div id="bigSmallRoadPositionDiv" style="position: relative;">
										<table id="bigSmallRoadCurrentTable" style="display: none;"></table>
									</div>
									<div id="sumRoadPositionDiv" style="position: relative;">
										<table id="sumRoadCurrentTable" style="display: none;"></table>
									</div>
									<div id="diceRoadPositionDiv" style="position: relative;">
										<table id="diceRoadCurrentTable" style="display: none;"></table>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="infoArea">
						<div class="infoBasic">
							<p class="infoDate"></p>
							<div class="infoGame">
								<dl id="gameTitle" class="gameName">
									<dt></dt>
									<dd></dd>
								</dl>

								<dl class="gameLimit">
									<dt id="currentShoeRound"></dt>
									<dd class="ropdownLimit"><a id="betRange" href="javascript:void(0);"></a></dd>
								</dl>
							</div>

							<dl id="countdownDL" class="infoTime">
								<dt id="countdown"></dt>
								<dd><span id="countdownLength" style="width: 0%">timeBar</span></dd>
							</dl>
						</div>

						<div class="infoCount">
							<div class="infoCountIn">
								<dl id="BigCurrentBet">
									<dt><?=$lang_member[314]?></dt>
									<dd></dd>
								</dl>
								<dl id="SmallCurrentBet">
									<dt><?=$lang_member[312]?></dt>
									<dd></dd>
								</dl>
								<dl id="OddCurrentBet">
									<dt class="textOdd"><?=$lang_member[453]?></dt>
									<dd></dd>
								</dl>
								<dl id="EvenCurrentBet">
									<dt class="textEven"><?=$lang_member[459]?></dt>
									<dd></dd>
								</dl>
								<dl id="TripleCurrentBet">
									<dt><?=$lang_member[1651]?></dt>
									<dd></dd>
								</dl>
							</div>
						</div>

						<ul id="chips" class="selectChipsBox">
							<li><span class=""></span></li>
							<li><span class=""></span></li>
							<li><span class=""></span></li>
							<li><span class=""></span></li>
							<li><span class=""></span></li>
							<li><span class=""></span></li>
							<li id="chipsSetBtn"><a class="chips2d-set">set</a></li>
						</ul>

						<div class="infoFooter">
							<dl class="infoTotal">
								<dt><?=$lang_member[1599]?></dt>
								<dd id="playerTotalCurrentBet"></dd>
							</dl>

							<div class="infoConfirm">
								<a id="confirm" class="btnConfirm noWork" href="javascript:void(0);"><?=$lang_member[64]?></a>
								<a id="repeat" class="btnRepeat noWork" href="javascript:void(0);"><p><?=$lang_member[1560]?></p></a>
								<a id="cancel" class="btnCancel noWork" href="javascript:void(0);"><p><?=$lang_member[65]?></p></a>
							</div>

							
						</div>
					</div>
				</section>

				<section id="setChips" class="set_chips" style="display: none; z-index: 260;">
					<div class="con">
						<h3><?=$lang_member[1565]?></h3>
						<h4><?=$lang_member[1566]?><strong>6 loại chip</strong></h4>
						<ul id="setChipsUl"></ul>

						<div id="userSet" class="user_set">
							<dl>
								<dt><?=$lang_member[1583]?></dt>
								<dd>
									<input id="customChipSetting" type="text" name="text" value="0" maxlength="6" />
									<div id="chipsAmountUnit" class="note">
										<span>X</span><span id="currencyTypeUnit"></span>
										<p><?=$lang_member[1602]?></p>
									</div>
								</dd>
							</dl>
							<div id="userChip" class="user_chip"><p id="customChipShowAmount">0</p></div>
						</div>
						<div class="btn_con">
							<input type="button" id="chipsCancelBtn" name="cancel" value="<?=$lang_member[65]?>" />
							<input type="button" id="chipsSubmitBtn" name="submit" value="<?=$lang_member[64]?>" class="focus" />
						</div>
					</div>
				</section>

				<div id="chipInfoRed" class="popBgColorless" style="z-index: 270;">
					<div class="infoBet-fail">
						<p>Bet has Been failed</p>
					</div>
				</div>

				<div id="chipIdleRed" class="popBgColorless" style="z-index: 270;">
					<div class="infoBet-fail">
						<p>Bet has Been failed</p>
					</div>
				</div>
			</article>

			<div style="display: none">
				<div id="tempDivChips" class=""></div>
				<div id="templateDiv" class="add_chips" style="display: none"></div>
				<li id="templateLi"></li>
				<li id="templateLiChips"><span><p id="" class="" data-amount=""></p></span></li>
				<li id="templateLiBetLimit"><?=$lang_member[1566]?> <?=$lang_member[1563]?></li>
				<li id="templateLiSubmit"><?=$lang_member[64]?></li>
				<li id="templateLiTableID" class="">
					<div class="">
						<dl>
							<dt style="height: 100%">
								<p></p>
							</dt>
							<dd></dd>
						</dl>
						<h5></h5>
					</div>
					<div class="quick_bet" style="display: none">
						<div class="history">
							<h5>
								<font></font>
								<span></span>
							</h5>
							<div class="big_road">
								<div class="go_left" style="display: none">arrow</div>
								<div class="go_right" style="display: none">arrow</div>
								<div class="road_con">
									<table id="bigRoad" style="table-layout: fixed;">
									</table>
								</div>
							</div>
							<ul class="table_info">
								<li>
									<div class=""></div>
								</li>
								<li>
									<span>Banker</span><p>0</p>
									<span>Player</span><p>0</p>
									<span>Tie</span><p>0</p>
								</li>
							</ul>
							<section class="game_info_success" style="display: none"></section>
							<section class="game_info_unsuccessful" style="display: none"></section>
						</div>
						<div class="quick_card_zone" style="display: none">
							<h5>
								<font></font>
								<span></span>
							</h5>
							<div class="card_con">
								<div class="quick_player">
									<dl>
										<dt></dt>
										<dd>0</dd>
									</dl>
									<ul>
										<li id="player1stCardAnimeQuickBet">
											<p class="front none"></p>
											<p id="player1stCardQuickBet" class="back none"></p>
										</li>
										<li id="player2ndCardAnimeQuickBet">
											<p class="front none"></p>
											<p id="player2ndCardQuickBet" class="back none"></p>
										</li>
										<li id="player3rdCardAnimeQuickBet">
											<p class="front none"></p>
											<p id="player3rdCardQuickBet" class="back none"></p>
										</li>
									</ul>
								</div>
								<div class="quick_banker">
									<dl>
										<dt></dt>
										<dd>0</dd>
									</dl>
									<ul>
										<li id="banker2ndCardAnimeQuickBet">
											<p class="front none"></p>
											<p id="banker2ndCardQuickBet" class="back none"></p>
										</li>
										<li id="banker1stCardAnimeQuickBet">
											<p class="front none"></p>
											<p id="banker1stCardQuickBet" class="back none"></p>
										</li>
										<li id="banker3rdCardAnimeQuickBet">
											<p class="front none"></p>
											<p id="banker3rdCardQuickBet" class="back none"></p>
										</li>
									</ul>
								</div>
								<div class=""></div>
							</div>
						</div>
						<div class="bet_zone">
							<h5>
								<font>0</font>
								<span><?=$lang_member[1598]?></span>
								<a href="javascript:void(0)">เล่น</a>
							</h5>
							<ol>
								<li style="display: none"><ul></ul></li>
								<li style="display: none"><ul></ul></li>
								<li style="display: none"><ul></ul></li>
								<li style="display: none"><ul></ul></li>
								<li style="display: none"><ul></ul></li>
								<li style="display: none"><ul></ul></li>
							</ol>
							<ul class="bet_box">
								<li class="player no_win" style="display: none;">
									<?=$lang_member[359]?>
								</li>
								<li class="player no_win" style="display: none;">
									<?=$lang_member[1216]?>
								</li>
								<li class="tie no_win" style="display: none;">
									<?=$lang_member[220]?>
								</li>
								<li class="tie no_win" style="display: none;">
									<?=$lang_member[220]?>
								</li>
								<li class="banker no_win" style="display: none;">
									<?=$lang_member[361]?>
								</li>
								<li class="banker no_win" style="display: none;">
									<?=$lang_member[1215]?>
								</li>
							</ul>
							<div class="quick_btn_set">
								<a href="#" class="confirm no_work"><?=$lang_member[64]?></a>
								<a href="#" class="cancel no_work"></a>
							</div>
						</div>
					</div>
				</li>
				<table style="table-layout: fixed;">
					<tr id="roadTrTemplate">
					</tr>
					<tr>
						<td id="roadTdTemplate">
						</td>
					</tr>
				</table>
				<table style="table-layout: fixed;">
					<tr id="bigRoadTrTemplate">
					</tr>
					<tr>
						
						<td id="bigRoadTdTemplate">
							<p style="display: none"></p>
							<div style="display: none"></div>
							<div style="display: none"></div>
							<div style="display: none"></div>
							<div style="display: none"></div>
							<div style="display: none"></div>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>