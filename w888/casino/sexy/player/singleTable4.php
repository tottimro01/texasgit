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
<link href="../CSS/share_source/commonResult.css" rel="stylesheet" type="text/css" />
<link href="../CSS/jquery-ui-themes-1.10.4/themes/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<script type="text/JavaScript" src="../js/const/Const.js?v=2019041710"></script>
<script type="text/JavaScript" src="../js/util/JSUtil.js?v=2019041710"></script>
<script type="text/JavaScript" src="../js/player/singleTable4.js?v=2019041710"></script>
<script type="text/JavaScript" src="../js/player/goodRoadAndQuickBetWeb.js?v=2019041710"></script>
<script type="text/javascript" src="../js/swf/swfobject.js"></script>
<script type="text/JavaScript" src="../js/hls/hls.min.js?v=2019041710"></script>
<script type="text/JavaScript" src="../js/hls/HLSJSAPI.js?v=2019041710"></script>
<script type="text/javascript" src="../js/hls/streama.js"></script>
<script type="text/javascript" src="../js/jquery.nicescroll.min-3.7.6.js"></script>
<script type="text/javascript" src="../js/jquery-ui.1.12.1-min.js"></script>
<script type="text/javascript">
var $j = jQuery.noConflict();
I18N.setResource({
	"form.text.member.balance"                   : "<?=$lang_member[563]?>",
	"form.text.baccarat"                         : "<?=$lang_member[355]?>",
	"form.text.insBaccarat"                      : "<?=$lang_member[1214]?>",
	"form.text.dragonTiger"                      : "<?=$lang_member[1215]?> <?=$lang_member[1216]?>",
	"form.text.table"                            : "<?=$lang_member[1546]?>",
	"form.text.game"                             : "<?=$lang_member[37]?>",
	"form.text.startBet"                         : "<?=$lang_member[1568]?>",
	"form.text.dealerName"                       : "<?=$lang_member[1571]?>",
	"form.text.chips.selectChips1"               : "<?=$lang_member[1566]?>",
	"form.text.chips.selectChips2"               : "Chip",
	"form.text.noMorebet"                        : "<?=$lang_member[1572]?>",
	"form.text.shuffling"                        : "<?=$lang_member[1564]?>",
	"form.text.noBetOver1"                       : "<?=$lang_member[1573]?> 1 <?=$lang_member[643]?>",
	"form.text.noBetOver2"                       : "<?=$lang_member[1573]?> 2 <?=$lang_member[643]?>",
	"form.text.noBetOver3"                       : "<?=$lang_member[1573]?> 3 <?=$lang_member[643]?>",
	"form.text.noBetOver4"                       : "<?=$lang_member[1573]?> 4 <?=$lang_member[643]?>",
	"form.text.noBetOver5"                       : "<?=$lang_member[1573]?> 5 <?=$lang_member[643]?>",
	"form.text.noBetOver6"                       : "<?=$lang_member[1573]?> 6 <?=$lang_member[643]?>",
	"form.text.noBetOver7"                       : "<?=$lang_member[1573]?> 7 <?=$lang_member[643]?>",
	"form.text.noBetOver8"                       : "<?=$lang_member[1573]?> 8 <?=$lang_member[643]?>",
	"form.text.noBetOver9"                       : "<?=$lang_member[1573]?> 9 <?=$lang_member[643]?>",
	"form.text.noBetOver10"                      : "<?=$lang_member[1573]?> 10 <?=$lang_member[643]?>",
	"form.text.noBetOver11"                      : "<?=$lang_member[1573]?> 11 <?=$lang_member[643]?>",
	"form.text.noBetOver12"                      : "<?=$lang_member[1573]?> 12 <?=$lang_member[643]?>",
	"form.text.noBetOver13"                      : "<?=$lang_member[1573]?> 13 <?=$lang_member[643]?>",
	"form.text.noBetOver14"                      : "<?=$lang_member[1573]?> 14 <?=$lang_member[643]?>",
	"form.text.noBetOver15"                      : "<?=$lang_member[1573]?> 15 <?=$lang_member[643]?>",
	"form.text.noBetOver16"                      : "<?=$lang_member[1573]?> 16 <?=$lang_member[643]?>",
	"form.text.noBetOver17"                      : "<?=$lang_member[1573]?> 17 <?=$lang_member[643]?>",
	"form.text.noBetOver18"                      : "<?=$lang_member[1573]?> 18 <?=$lang_member[643]?>",
	"form.text.noBetOver19"                      : "<?=$lang_member[1573]?> 19 <?=$lang_member[643]?>",
	"form.text.noBetOver20"                      : "<?=$lang_member[1573]?> 20 <?=$lang_member[643]?>",
	"form.text.winner"                           : "<?=$lang_member[1574]?>",
	"form.text.winner.banker"                    : "<?=$lang_member[196]?>",
	"form.text.winner.tiger"                     : "<?=$lang_member[1215]?><?=$lang_member[780]?>",
	"form.text.winner.player"                    : "<?=$lang_member[194]?>",
	"form.text.winner.dragon"                    : "<?=$lang_member[1216]?><?=$lang_member[780]?>",
	"form.text.winner.tie"                       : "<?=$lang_member[220]?>",
	"form.text.category.banker1"                 : "<?=$lang_member[361]?>",
	"form.text.category.player1"                 : "<?=$lang_member[359]?>",
	"form.text.category.tiger1"                  : "<?=$lang_member[1215]?>",
	"form.text.category.dragon1"                 : "<?=$lang_member[1216]?>",
	"form.text.category.bankerPair1"             : "<?=$lang_member[1263]?>",
	"form.text.category.bankerPair4"             : "<?=$lang_member[1263]?>",
	"form.text.category.playerPair1"             : "<?=$lang_member[1264]?>",
	"form.text.category.playerPair4"             : "<?=$lang_member[1264]?>",
	"form.text.report.Total"                     : "<?=$lang_member[304]?>",
	"form.text.ins.bankerBet"                    : "<?=$lang_member[1575]?>",
	"form.text.ins.banker"                       : "<?=$lang_member[1576]?>",
	"form.text.ins.playerBet"                    : "<?=$lang_member[1577]?>",
	"form.text.ins.player"                       : "<?=$lang_member[1578]?>",
	"form.text.ins.bankerBetAmount"              : "<?=$lang_member[1579]?> +  <?=$lang_member[1580]?>",
	"form.text.ins.playerBetAmount"              : "<?=$lang_member[1581]?> ÷ <?=$lang_member[1582]?>",
	"form.text.goodRoad.bac.1"                   : "<?=$lang_member[1567]?>  1",
	"form.text.goodRoad.bac.2"                   : "<?=$lang_member[1567]?>  2",
	"form.text.goodRoad.bac.3"                   : "<?=$lang_member[1567]?>  3",
	"form.text.goodRoad.bac.4"                   : "<?=$lang_member[1567]?>  4",
	"form.text.goodRoad.bac.5"                   : "<?=$lang_member[1567]?>  5",
	"form.text.goodRoad.bac.6"                   : "<?=$lang_member[1567]?>  6",
	"form.text.goodRoad.bac.7"                   : "<?=$lang_member[1567]?>  7",
	"form.text.goodRoad.bac.8"                   : "<?=$lang_member[1567]?>  8",
	"form.text.goodRoad.bac.9"                   : "<?=$lang_member[1567]?>  9",
	"form.text.goodRoad.bac.10"                  : "<?=$lang_member[1567]?>  10",
	"form.text.goodRoad.dra.1"                   : "<?=$lang_member[1567]?>  1",
	"form.text.goodRoad.dra.2"                   : "<?=$lang_member[1567]?>  2",
	"form.text.goodRoad.dra.3"                   : "<?=$lang_member[1567]?>  3",
	"form.text.goodRoad.dra.4"                   : "<?=$lang_member[1567]?>  4",
	"form.text.goodRoad.dra.5"                   : "<?=$lang_member[1567]?>  5",
	"form.text.goodRoad.dra.6"                   : "<?=$lang_member[1567]?>  6",
	"form.text.goodRoad.dra.7"                   : "<?=$lang_member[1567]?>  7",
	"form.text.goodRoad.dra.8"                   : "<?=$lang_member[1567]?>  8",
	"form.text.goodRoad.dra.9"                   : "<?=$lang_member[1567]?>  9",
	"form.text.goodRoad.dra.10"                  : "<?=$lang_member[1567]?>  10",
	"msg.error.betTxns.denyHedgeBetting"         : "<?=$lang_member[1585]?>",
	"msg.error.betTxns.maxBets"                  : "<?=$lang_member[1586]?> $",
	"msg.error.betTxns.minBets"                  : "<?=$lang_member[1587]?> $",
	"msg.error.chips.minChips"                   : "<?=$lang_member[1561]?>",
	"msg.error.chips.maxChips"                   : "<?=$lang_member[380]?>",
	"msg.error.chips.selectChips"                : "<?=$lang_member[1588]?>",
	"msg.error.betTxns.betsPlacedSuccessfully"   : "<?=$lang_member[1589]?>",
	"msg.error.betTxns.betsPlacedUnsuccessfully" : "<?=$lang_member[1590]?>",
	"msg.error.info.insufficientBalance"         : "<?=$lang_member[1591]?>",
	"msg.error.bet.raceIsNotOpen"                : "<?=$lang_member[1592]?>",
	"msg.error.validation.betLimit.empty"        : "<?=$lang_member[1593]?>",
	"msg.error.voidRound"                        : "<?=$lang_member[1594]?>",
	"msg.error.info.reachMaxWinLimit"            : "<?=$lang_member[1595]?>",
	"msg.error.connectionTimeout"                : "<?=$lang_member[1596]?>",
	"msg.info.betBankerInsurance"                : "<?=$lang_member[1597]?>",
	"msg.info.betPlayerInsurance"                : "<?=$lang_member[1575]?>",
	"msg.info.sec"                               : "<?=$lang_member[1598]?>"
});
if (typeof (PageConfig) == "undefined") {
	PageConfig = {};
}
PageConfig.autoOpenInsDialog	 = "1";
PageConfig.currencyId            = "9";
PageConfig.dealerDomain          = "1";
PageConfig.currencyId            = "9";
PageConfig.userBetLimitID        = 1;
PageConfig.userBetLimitIDCache   = null;
PageConfig.userSelectChips       = "[4,5,6,7,8,9]";
PageConfig.userCustomChip        = 10;
PageConfig.playerIndexPage       = "gamehall.php";
PageConfig.playerSingleSicPage   = "/casino/sexy/player/singleSicTable.php";
PageConfig.playerSingleRouPage   = "/casino/sexy/player/singleRouTable.php";
PageConfig.playerMultiPage       = "/casino/sexy/player/multiTable4.php";
PageConfig.playerMaintenancePage = "/casino/sexy/player/gamehallMaintenance.php";
PageConfig.currentSingleTableId  = <?=$_GET["t"]?>;
PageConfig.cafeId                = "xxx";
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
PageConfig.isIE                  = "0";
PageConfig.isSafari              = "0";
PageConfig.streamingLine         = ["1"];
PageConfig.enableSoundEffect     = "1";
PageConfig.streamingAudio        = "1";
PageConfig.resultSound           = "1";
PageConfig.bettingSound          = "1";
PageConfig.streamingVideo        = "1";
PageConfig.backgroundMusic       = "1";
PageConfig.languageResourceKey   = "th";
PageConfig.userCountry           = "TH";
PageConfig.insuranceTableIDs     = "[21]";
PageConfig.speedTableIDs         = "[]";
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
	singleTable4.init();
	ResizeUtil.doResize();
	PageUtil.commonsScriptWeb();
	PageUtil.contentLock();
	JCache.get("#gameTableList").prop("src", "gameTableList.php?dm=1");
});
</script>
<style type="text/css">
	
	.scaleable-wrapper {
		    width: 980px !important;
	}
	body {
		background: #f5f1e5;
	}

</style>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
</head>
<body id="body" class=" " style="width: 980px;">
	<div id="scaleable-wrapper" class="scaleable-wrapper" style="overflow: hidden;">
		<div id="very-specific-design" class="very-specific-design">
			<div class="top">
				<div class="left_list">
					<!--<h1>SV388</h1>-->
					<ol style="display: none;">
						<li>m92m001</li>
						<li class="credit">
							<?=$lang_member[563]?> <span id='userBalance'>1,000.00</span>
						</li>
					</ol>
				</div>

				<ul class="right_function">
					<!--<<li id="language" class="language" style="display: ">
						<a href="javascript:void(0);">
						ไทย
						</a>
						<ul id="lg" class="lg_list" style="desplay: none; z-index: 999">
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
							
							<dt><?=$lang_member[1554]?></dt>
							<dd id="resultSound" class="switch_off">switch</dd>
							<dt><?=$lang_member[1555]?></dt>
							<dd id="bettingSound" class="switch_off">switch</dd>
							
							<dt><?=$lang_member[1556]?></dt>
							<dd id="backgroundMusic" class="switch_off">switch</dd>
							
						</dl>
					</li>
					<li class="home">
						<a id="goHome" href="javascript:void(0);">home</a>
					</li>
					<li id="menu" class="nav">
						<a id="navLink" href="javascript:void(0);">
							nav
						</a>
						<ul id="nav" class="nav_list" style="desplay: none; z-index: 999">
							
							<li><a href="javascript:void(0);" onclick="parent.rightx.location.href='/list_bet_casino.php?vx=1&vvw=&token=<?=$_SESSION["m_token"];?>'";><?=$lang_member[43]?></a></li>
							
							<li><a id="guideBacShow" href="javascript:void(0);"><?=$lang_member[1557]?></a></li>
							<li><a id="guideDraShow" href="javascript:void(0);"><?=$lang_member[1558]?></a></li>
							<li><a id="guideSicShow" href="javascript:void(0);"><?=$lang_member[1559]?></a></li>
							
						</ul>
					</li>
				</ul>
			</div>

			<article>
				<audio id="soundBet" preload>
					<source src="/casino/sexy/sound/sound_bet.opus" type="audio/wav" />
				</audio>
				<audio id="soundButtonTap" preload>
					<source src="/casino/sexy/sound/sound_button_tap.opus" type="audio/wav" />
				</audio>
				<audio id="soundCashIn" preload>
					<source src="/casino/sexy/sound/sound_cash_in.opus" type="audio/wav" />
				</audio>
				<audio id="soundSwitchChips" preload>
					<source src="/casino/sexy/sound/sound_switch_chips.opus" type="audio/wav" />
				</audio>
				<audio id="soundNoMoreBet" preload>
					<source src="/casino/sexy/sound/comm_th/no_more_bet_th.opus" type="audio/wav" />
				</audio>
				<audio id="soundPlaceYourBet" preload>
					<source src="/casino/sexy/sound/comm_th/place_your_bet_please_th.opus" type="audio/wav" />
				</audio>
				<audio id="soundWinner" autoplay>
					<source src="" type="audio/wav" />
				</audio>
				
				<audio id="soundBackGroundMusic" preload="none">
					<source src="" type="audio/mpeg" />
				</audio>
				

				<iframe id="guideBac" name="guide" class="game_guide" scrolling="no" style="z-index: 350; border: 0; display: none;"></iframe>
				<iframe id="guideDra" name="guide" class="game_guide" scrolling="no" style="z-index: 350; border: 0; display: none;"></iframe>
				<iframe id="guideSic" name="guide" class="game_guide" scrolling="no" style="z-index: 350; border: 0; display: none;"></iframe>
				<iframe id="guideFpc" name="guide" class="game_guide" scrolling="no" style="z-index: 350; border: 0; display: none;"></iframe>
				
				<iframe id="transHistory" name="transHistory" class="trans_history" src="txnHistory.php?dm=1" style="visibility: hidden; z-index: 350; border: 0"></iframe>
				

				<section id="setChips" class="set_chips" style="display: none; z-index: 260;">
					<div class="con">
						<h3><?=$lang_member[1565]?></h3>
						<h4><?=$lang_member[1566]?> <strong>6 loại chip</strong></h4>
						<ul id="setChipsUl"></ul>
						<div id="userSet" class="user_set ">
							<dl>
								<dt><?=$lang_member[1583]?></dt>
								<dd>
									<input id="customChipSetting" type="text" name="text" value="0" maxlength="6" />
									<div class="note" id="chipsAmountUnit">
										<span>X</span><span id="currencyTypeUnit"></span>
										<p><?=$lang_member[1602]?></p>
									</div>
								</dd>
							</dl>
							<div id="userChip" class="user_chip"><span><p id="customChipShowAmount">0</p></span></div>
						</div>
						<div class="btn_con">
							<input type="button" id="chipsCancelBtn" name="cancel" value="<?=$lang_member[65]?>" />
							<input type="button" id="chipsSubmitBtn" name="submit" value="<?=$lang_member[64]?>" class="focus" />
						</div>
					</div>
				</section>
				<div class="ins_bet" id="insBetZone" style="z-index: 201;display:none">
					<div class="main_con">
						<h3><span id="insBetZoneTitle"></span>
							<a id="closeInsBetZone" href="#">close</a>
						</h3>
						<dl class="amount">
							<dt><?=$lang_member[1603]?>
								<span>
									<?=$lang_member[1604]?> : 0-<font id="insBetLimit"></font>
									<a href="#">
										<p id="insBetZoneHint"></p>
									</a>
								</span>
							</dt>
							<dd>
								<input type="text" id="insBetAmount" />
							</dd>
						</dl>

						<ul class="chips" id="insChips">
						</ul>

						<dl id="insTotalBet" class="total_bet">
							<dd>
								<a href="#" id="insBetConfirm" class="confirm no_work"><?=$lang_member[64]?></a>
								<a href="#" id="insBetCancel" class="cancel no_work"><?=$lang_member[65]?></a>
							</dd>
						</dl>
					</div>

					<div class="right_con">
						<dl class="ins_info">
							<dt><?=$lang_member[1605]?></dt>
							<dd id="insMyBet">--</dd>
							<dt><?=$lang_member[955]?></dt>
							<dd id="insOdds">--</dd>
							<dt><?=$lang_member[1606]?></dt>
							<dd id="insPayout">--</dd>
						</dl>

						<ul class="ins_tip">
							
							<li id="insMsgAlert" class="type_check_off"><?=$lang_member[1607]?></li>
						</ul>
					</div>
				</div>
				<section id="switchTable" class="table_list_close" style="z-index: 400;">
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

				
				<iframe id="gameTableList" class="tale_list_frame" scrolling="no" style="z-index: 500; visibility: hidden"></iframe>

				<div id="maintenanceDiv" class="video_box maintenance" style="z-index: 275; display: none">
					<p style="width: 200px"><?=$lang_member[1638]?></p>
				</div>

				
				<div id="video-canvas-box" class="video_box" style="overflow: hidden; display: flex; justify-content: normal; width: 100%">
					<div id="reloadVideo" style="display:none;position:absolute;left:12%;top:40%;z-index: 49"><p><?=$lang_member[1608]?>... <?=$lang_member[1609]?>.</p></div>
					<div id="loading" class="abgne-loading" style="display: none;z-index: 45">
						<div class="loading_text"><?=$lang_member[1560]?></div>
						<div class="loading"></div>
					</div>
					<video id="video" width="1440px" height="900px" margin="0" padding="0" autoplay playsinline webkit-playsinline x5-playsinline></video>
				</div>
				

				<section id="infoLeft" class="info_left">
					<dl class="title">
						<dt>
							<font id="currentTableType"></font>
							<strong id="currentTableID"></strong>
						</dt>

						<dd>
							<p>
								<font id="currentShoeRound"></font>
								<span id="currentGA"></span>
							</p>
							<br />
							<a id="betLimitBoxShow" href="javascript:void(0)"><font id="minBet"></font>-<font id="maxBet"></font></a>
						</dd>
					</dl>
					<h5 id="dealerName">--</h5>
					<div id="gameInfoCard" style="display: none; height: auto" class="card_zone" >
						<div id="gameWinnerPlayer" class="player">
							<dl>
								<dt id="playerHandValueTitle"><?=$lang_member[359]?></dt>
								<dd id="playerHandValue">0</dd>
							</dl>

							<ul>
								<li id="player1stCardAnime">
									<p class="front none"></p>
									<p id="player1stCard" class="back none"></p>
								</li>

								<li id="player2ndCardAnime">
									<p class="front none"></p>
									<p id="player2ndCard" class="back none"></p>
								</li>

								<li id="player3rdCardAnime">
									<p class="front none"></p>
									<p id="player3rdCard" class="back none"></p>
								</li>
							</ul>
						</div>

						<div id="gameWinnerBanker" class="banker">
							<dl>
								<dt id="bankerHandValueTitle"><?=$lang_member[361]?></dt>
								<dd id="bankerHandValue">0</dd>
							</dl>

							<ul>
								<li id="banker1stCardAnime">
									<p class="front none"></p>
									<p id="banker1stCard" class="back none"></p>
								</li>

								<li id="banker2ndCardAnime">
									<p class="front none"></p>
									<p id="banker2ndCard" class="back none"></p>
								</li>

								<li id="banker3rdCardAnime">
									<p class="front none"></p>
									<p id="banker3rdCard" class="back none"></p>
								</li>
							</ul>
						</div>
						<div id="gameWinnerType" class=""></div>
					</div>
				</section>

				<section id="infoZone" class="info_zone">
					<div id="insMark" class="ins_mark" style="display: none"></div>
					<div id="speedIcon" class="speed_icon" style="display: none">speed</div>
					<dl id="countdownDL" class="time">
						<dt id="countdown">
							
						</dt>
						<dd><span id="countdownLength" style="width: 0%">time</span></dd>
					</dl>
					<table>
						<tbody>
							<tr name="currentBetOneBac" style="display: none">
								<th class="banker"><?=$lang_member[361]?></th>
								<td id="bankerCurrentBetRate">0%</td>
							</tr>
							<tr name="currentBetOneBac" style="display: none">
								<th class="player"><?=$lang_member[359]?></th>
								<td id="playerCurrentBetRate">0%</td>
							</tr>
							<tr name="currentBetOneBac" style="display: none">
								<th class="tie"><?=$lang_member[220]?></th>
								<td id="tieCurrentBetRate">0%</td>
							</tr>
							<tr name="currentBetOneLongHu" style="display: none">
								<th class="banker"><?=$lang_member[1215]?></th>
								<td id="tigerCurrentBetRate">0%</td>
							</tr>
							<tr name="currentBetOneLongHu" style="display: none">
								<th class="player"><?=$lang_member[1216]?></th>
								<td id="dragonCurrentBetRate">0%</td>
							</tr>
							<tr name="currentBetOneLongHu" style="display: none">
								<th class="tie"><?=$lang_member[220]?></th>
								<td id="dtTieCurrentBetRate">0%</td>
							</tr>
							<tr name="currentBetTwoBac" style="display: none">
								<th class="banker"><?=$lang_member[1263]?></th>
								<td id="bankerPairCurrentBetRate">0%</td>
							</tr>
							<tr name="currentBetTwoBac" style="display: none">
								<th class="banker"><?=$lang_member[1610]?></th>
								<td id="bankerBonusCurrentBetRate">0%</td>
							</tr>
							<tr name="currentBetTwoBac" style="display: none">
								<th class="banker"><?=$lang_member[1576]?></th>
								<td id="bankerInsCurrentBetRate">0%</td>
							</tr>
							<tr name="currentBetTwoBac" style="display: none">
								<th class="player"><?=$lang_member[1264]?></th>
								<td id="playerPairCurrentBetRate">0%</td>
							</tr>
							<tr name="currentBetTwoBac" style="display: none">
								<th class="player"><?=$lang_member[1611]?></th>
								<td id="playerBonusCurrentBetRate">0%</td>
							</tr>
							<tr name="currentBetTwoBac" style="display: none">
								<th class="player"><?=$lang_member[1578]?></th>
								<td id="playerInsCurrentBetRate">0%</td>
							</tr>
							<tr name="currentBetTwoBac" style="display: none">
								<th><?=$lang_member[363]?></th>
								<td id="bigCurrentBetRate">0%</td>
							</tr>
							<tr name="currentBetTwoBac" style="display: none">
								<th><?=$lang_member[364]?></th>
								<td id="smallCurrentBetRate">0%</td>
							</tr>
							<tr name="currentBetTwoBac" style="display: none">
								<th><?=$lang_member[1612]?></th>
								<td id="turtleCurrentBetRate">0%</td>
							</tr>
							<tr name="currentBetTwoBac" style="display: none">
								<th><?=$lang_member[1613]?></th>
								<td id="phoenixCurrentBetRate">0%</td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<td><?=$lang_member[1614]?></td>
								<td id="totalCurrentBetRate">0</td>
							</tr>
						</tfoot>
					</table>
					<a id="currentBetBtnBac" href="javascript:void(0)" class="open" style="display: none">open / close</a>
				</section>

				<section id="gameInfoWin" class="game_info_win" style="z-index: 200; display: none">
					<span><?=$lang_member[1615]?> <strong><?=$lang_member[780]?></strong></span>
					<p>0</p>
				</section>
				<section id="gameInfo" class="game_info" style="z-index: 200; display: none"></section>
				<section id="gameInfoRed" class="game_info_red" style="z-index: 270; display: none"></section>
				<section id="gameInfoSuccess" class="game_info_success" style="z-index: 200; display: none"></section>
				<section id="gameInfoUnsuccessful" class="game_info_unsuccessful" style="z-index: 265; display: none"></section>

				<section id="phoenixInfoBox" class="game_info_box" style="z-index: 100; display: none">
					<h3>
						<?=$lang_member[1613]?>
						<a id="phoenixInfoBoxHide" href="javascript:void(0)">close</a>
					</h3>
					<p><?=$lang_member[1616]?></p>
				</section>
				<section id="turtleInfoBox" class="game_info_box" style="z-index: 100; display: none">
					<h3>
						<?=$lang_member[1612]?>
						<a id="turtleInfoBoxHide" href="javascript:void(0)">close</a>
					</h3>
					<p><?=$lang_member[1617]?></p>
				</section>
				<section id="bonusInfoBox" class="game_info_box" style="z-index: 100; display: none">
					<h3>
						<?=$lang_member[1618]?>
						<a id="bonusInfoBoxHide" href="javascript:void(0)">close</a>
					</h3>
					<table>
						<thead>
							<tr>
								<td><?=$lang_member[1619]?></td>
								<td><?=$lang_member[1620]?></td>
								<td><?=$lang_member[1621]?></td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>9</td>
								<td><?=$lang_member[1622]?></td>
								<td>1:30</td>
							</tr>
							<tr>
								<td>8</td>
								<td><?=$lang_member[1622]?></td>
								<td>1:10</td>
							</tr>
							<tr>
								<td>7</td>
								<td><?=$lang_member[1622]?></td>
								<td>1:6</td>
							</tr>
							<tr>
								<td>6</td>
								<td><?=$lang_member[1622]?></td>
								<td>1:4</td>
							</tr>
							<tr>
								<td>5</td>
								<td><?=$lang_member[1622]?></td>
								<td>1:2</td>
							</tr>
							<tr>
								<td>4</td>
								<td><?=$lang_member[1622]?></td>
								<td>1:1</td>
							</tr>
							<tr>
								<td colspan="2"><?=$lang_member[1633]?></td>
								<td>1:1</td>
							</tr>
							<tr>
								<td colspan="2"><?=$lang_member[1624]?></td>
								<td><?=$lang_member[1625]?></td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="3">
									<?=$lang_member[1626]?>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<?=$lang_member[1627]?>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<?=$lang_member[1628]?>
								</td>
							</tr>
						</tfoot>
					</table>
				</section>
				
				<section id="playerInsBox" class="game_info_box" style="z-index: 100; display: none">
					<div style="padding-left: 20px;">
					<h3>
						<a id="playerInsBoxHide" href="javascript:void(0)">close</a>
					</h3>
					<div style="height:42px">
						<h3><?=$lang_member[1629]?> - <?=$lang_member[1578]?></h3>
					</div>
					<div style="clear:both">
						<div style="width:295px; float:left;">
						<?=$lang_member[1630]?>
						<table border="1">
							<thead>
								<tr>
									<td width="35%"><?=$lang_member[1631]?> <?=$lang_member[359]?> </td>
									<td width="35%"><?=$lang_member[1631]?> <?=$lang_member[361]?></td>
									<td width="30%"><?=$lang_member[955]?></td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>5</td>
									<td>4</td>
									<td>1:2</td>
								</tr>
								<tr>
									<td>6</td>
									<td>0~5</td>
									<td>1:3</td>
								</tr>
								<tr>
									<td>7</td>
									<td>0~5</td>
									<td>1:4</td>
								</tr>
							</tbody>
						</table>
						</div>
						<div style="width:295px; float:left;">
						<?=$lang_member[162]?>
						<table border="1">
							<thead>
								<tr>
									<td width="35%"><?=$lang_member[1549]?></td>
									<td width="35%"><?=$lang_member[1578]?></td>
									<td width="30%"><?=$lang_member[359]?></td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?=$lang_member[196]?></td>
									<td><?=$lang_member[780]?></td>
									<td><?=$lang_member[783]?></td>
								</tr>
								<tr>
									<td><?=$lang_member[194]?></td>
									<td><?=$lang_member[783]?></td>
									<td><?=$lang_member[780]?></td>
								</tr>
								<tr>
									<td><?=$lang_member[220]?></td>
									<td><?=$lang_member[220]?></td>
									<td><?=$lang_member[220]?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div style="clear:both;">
					<div style="width:295px; float:left;">
						<?=$lang_member[1632]?>
						<table border="1">
							<thead>
								<tr>
									<td width="35%"><?=$lang_member[1631]?> <?=$lang_member[359]?> </td>
									<td width="35%"><?=$lang_member[1631]?> <?=$lang_member[361]?></td>
									<td width="30%"><?=$lang_member[955]?></td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>5</td>
									<td>0~4</td>
									<td>1:2</td>
								</tr>
								<tr>
									<td>6</td>
									<td>0~5</td>
									<td>1:3</td>
								</tr>
								<tr>
									<td>7</td>
									<td>0~6</td>
									<td>1:4</td>
								</tr>
								<tr>
									<td>8</td>
									<td>0~6</td>
									<td>1:8</td>
								</tr>
								<tr>
									<td>9</td>
									<td>0~6</td>
									<td>1:9</td>
								</tr>
							</tbody>
						</table>
						</div>
						<div style="width:295px; float:left;">
						<?=$lang_member[162]?>
						<table border="1">
							<thead>
								<tr>
									<td width="35%"><?=$lang_member[1549]?></td>
									<td width="35%"><?=$lang_member[1578]?></td>
									<td width="30%"><?=$lang_member[359]?></td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?=$lang_member[196]?></td>
									<td><?=$lang_member[780]?></td>
									<td><?=$lang_member[783]?></td>
								</tr>
								<tr>
									<td><?=$lang_member[194]?></td>
									<td><?=$lang_member[783]?></td>
									<td><?=$lang_member[780]?></td>
								</tr>
								<tr>
									<td>9 <?=$lang_member[1631]?> <?=$lang_member[220]?></td>
									<td><?=$lang_member[780]?></td>
									<td><?=$lang_member[220]?></td>
								</tr>
								<tr>
									<td>&lt;= 8 <?=$lang_member[1631]?> <?=$lang_member[220]?></td>
									<td><?=$lang_member[220]?></td>
									<td><?=$lang_member[220]?></td>
								</tr>
							</tbody>
						</table>
						<?=$lang_member[1633]?>
						<br /><br /><br />
					</div>
				</div>
				</div>
				</section> 
				<section id="bankerInsBox" class="game_info_box" style="z-index: 100; display: none">
					<div style="padding-left: 20px;">
				<h3>
					<a id="bankerInsBoxHide" href="javascript:void(0)">close</a>
				</h3>
				<div style="height: 42px">
					<h3><?=$lang_member[1629]?>
						-
						<?=$lang_member[1576]?></h3>
				</div>
				<div style="clear: both">
					<div style="width: 295px; float: left;">
						<?=$lang_member[1630]?>
						<table border="1">
							<thead>
								<tr>
									<td width="35%"><?=$lang_member[1631]?> <?=$lang_member[361]?></td>
									<td width="35%"><?=$lang_member[1631]?> <?=$lang_member[359]?> </td>
									<td width="30%"><?=$lang_member[955]?></td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>5</td>
									<td>0~4</td>
									<td>1:2</td>
								</tr>
								<tr>
									<td>6</td>
									<td>0~5</td>
									<td>1:3</td>
								</tr>
								<tr>
									<td>7</td>
									<td>0~5</td>
									<td>1:4</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div style="width: 295px; float: left;">
						<?=$lang_member[162]?>
						<table border="1">
							<thead>
								<tr>
									<td width="35%"><?=$lang_member[1549]?></td>
									<td width="35%"><?=$lang_member[1576]?></td>
									<td width="30%"><?=$lang_member[361]?></td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?=$lang_member[194]?></td>
									<td><?=$lang_member[780]?></td>
									<td><?=$lang_member[783]?></td>
								</tr>
								<tr>
									<td><?=$lang_member[196]?></td>
									<td><?=$lang_member[783]?></td>
									<td><?=$lang_member[780]?></td>
								</tr>
								<tr>
									<td><?=$lang_member[220]?></td>
									<td><?=$lang_member[220]?></td>
									<td><?=$lang_member[220]?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div style="clear: both;">
					<div style="width: 295px; float: left;">
						<?=$lang_member[1632]?>
						<table border="1">
							<thead>
								<tr>
									<td width="35%"><?=$lang_member[1631]?> <?=$lang_member[361]?></td>
									<td width="35%"><?=$lang_member[1631]?> <?=$lang_member[359]?> </td>
									<td width="30%"><?=$lang_member[955]?></td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>1</td>
									<td>1:7</td>
								</tr>
								<tr>
									<td>1~6</td>
									<td>0</td>
									<td>1:9</td>
								</tr>
								<tr>
									<td>2~6</td>
									<td>1</td>
									<td>1:8</td>
								</tr>
								<tr>
									<td>3~6</td>
									<td>2</td>
									<td>1:4</td>
								</tr>
								<tr>
									<td>4</td>
									<td>3</td>
									<td>1:2</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div style="width: 295px; float: left;">
						<?=$lang_member[162]?>
						<table border="1">
							<thead>
								<tr>
									<td width="35%"><?=$lang_member[1549]?></td>
									<td width="35%"><?=$lang_member[1576]?></td>
									<td width="30%"><?=$lang_member[361]?></td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?=$lang_member[194]?></td>
									<td><?=$lang_member[780]?></td>
									<td><?=$lang_member[783]?></td>
								</tr>
								<tr>
									<td><?=$lang_member[196]?></td>
									<td><?=$lang_member[783]?></td>
									<td><?=$lang_member[780]?></td>
								</tr>
								<tr>
									<td>0 <?=$lang_member[1631]?> <?=$lang_member[220]?></td>
									<td><?=$lang_member[780]?></td>
									<td><?=$lang_member[220]?></td>
								</tr>
								<tr>
									<td>>= 1 <?=$lang_member[1631]?> <?=$$lang_member[220]?></td>
									<td><?=$lang_member[220]?></td>
									<td><?=$lang_member[220]?></td>
								</tr>
							</tbody>
						</table>
						<?=$lang_member[1633]?>
						<br />
						<br />
						<br />
					</div>
				</div>
			</div>
				</section>
				
				<section id="betLimitBox" class="game_info_box" style="z-index: 100; display: none">
					<h3>
						<?=$lang_member[1563]?>
						<a id="betLimitBoxHide" href="javascript:void(0)">close</a>
					</h3>
					<ol id="betLimitSet" class="limit_set"></ol>
					<dl>
						<dt name="betLimitBoxBac" class="banker"><?=$lang_member[361]?></dt>
						<dd name="betLimitBoxBac"><font id="bankerMinBet"></font> - <font id="bankerMaxBet"></font></dd>

						<dt name="betLimitBoxBac" class="banker"><?=$lang_member[1263]?></dt>
						<dd name="betLimitBoxBac"><font id="bankerPairMinBet"></font> - <font id="bankerPairMaxBet"></font></dd>

						<dt name="betLimitBoxBac" class="banker"><?=$lang_member[1610]?></dt>
						<dd name="betLimitBoxBac"><font id="bankerBonusMinBet"></font> - <font id="bankerBonusMaxBet"></font></dd>

						<dt name="betLimitBoxBac" class="player"><?=$lang_member[359]?></dt>
						<dd name="betLimitBoxBac"><font id="playerMinBet"></font> - <font id="playerMaxBet"></font></dd>

						<dt name="betLimitBoxBac" class="player"><?=$lang_member[1264]?></dt>
						<dd name="betLimitBoxBac"><font id="playerPairMinBet"></font> - <font id="playerPairMaxBet"></font></dd>

						<dt name="betLimitBoxBac" class="player"><?=$lang_member[1611]?></dt>
						<dd name="betLimitBoxBac"><font id="playerBonusMinBet"></font> - <font id="playerBonusMaxBet"></font></dd>

						<dt name="betLimitBoxLongHu" class="banker"><?=$lang_member[1215]?></dt>
						<dd name="betLimitBoxLongHu"><font id="tigerMinBet"></font> - <font id="tigerMaxBet"></font></dd>

						<dt name="betLimitBoxLongHu" class="player"><?=$lang_member[1216]?></dt>
						<dd name="betLimitBoxLongHu"><font id="dragonMinBet"></font> - <font id="dragonMaxBet"></font></dd>

						<dt name="betLimitBoxBoth" class="tie"><?=$lang_member[220]?></dt>
						<dd name="betLimitBoxBoth"><font id="tieMinBet"></font> - <font id="tieMaxBet"></font></dd>
					</dl>
					<dl>
						<dt name="betLimitBoxBac"><?=$lang_member[363]?></dt>
						<dd name="betLimitBoxBac"><font id="bigMinBet"></font> - <font id="bigMaxBet"></font></dd>

						<dt name="betLimitBoxBac"><?=$lang_member[364]?></dt>
						<dd name="betLimitBoxBac"><font id="smallMinBet"></font> - <font id="smallMaxBet"></font></dd>

						<dt name="betLimitBoxBac"><?=$lang_member[1612]?></dt>
						<dd name="betLimitBoxBac"><font id="turtleMinBet"></font> - <font id="turtleMaxBet"></font></dd>

						<dt name="betLimitBoxBac"><?=$lang_member[1613]?></dt>
						<dd name="betLimitBoxBac"><font id="phoenixMinBet"></font> - <font id="phoenixMaxBet"></font></dd>
					</dl>
				</section>

				<section id="betZoneChips" class="bet_zone bet_chips">
					<div class="chips_con_all">
						<div name="betZoneBac" id="drawChips_PlayerPair" class="chips_player_pair" style="display: none">
							<ul></ul>
						</div>
						<div name="betZoneBac" id="drawChips_BankerPair" class="chips_banker_pair" style="display: none">
							<ul></ul>
						</div>
						<div name="betZoneBac" class="up_set" style="display: none">
							<div id="drawChips_Phoenix" class="chips_phoenix">
								<ul></ul>
							</div>
							<div id="drawChips_Big" class="chips_big">
								<ul></ul>
							</div>
							<div id="drawChips_Small" class="chips_small">
								<ul></ul>
							</div>
							<div id="drawChips_Turtle" class="chips_turtle">
								<ul></ul>
							</div>
						</div>
						<div name="betZoneBac" class="down_set" style="display: none">
							<!-- ins -->
							<div id="drawChips_PlayerIns" class="chips_player_ins">
								<ul></ul>
							</div>
							<div id="drawChips_PlayerBonus" class="chips_player_bonus">
								<ul></ul>
							</div>
							<div id="drawChips_Player" class="chips_player">
								<ul></ul>
							</div>
							<div id="drawChips_Tie" class="chips_tie">
								<ul></ul>
							</div>
							<div id="drawChips_Banker" class="chips_banker">
								<ul></ul>
							</div>
							<div id="drawChips_BankerBonus" class="chips_banker_bonus">
								<ul></ul>
							</div>
							<!-- ins -->
							<div id="drawChips_BankerIns" class="chips_banker_ins">
								<ul></ul>
							</div>
						</div>

						<div name="betZoneLongHu" id="drawChips_Dragon" class="chips_banker" style="display: none">
							<ul></ul>
						</div>
						<div name="betZoneLongHu" id="drawChips_LongHuTie" class="chips_tie" style="display: none">
							<ul></ul>
						</div>
						<div name="betZoneLongHu" id="drawChips_Tiger" class="chips_player" style="display: none">
							<ul></ul>
						</div>
					</div>
				</section>

				<section id="betZone" class="bet_zone">
					
					<div name="betZoneBac" style="display: none">
					</div>
					

					
					<div name="betZoneLongHu" style="display: none">
					</div>
					

					<div name="betZoneBac" class="ask_con_all" style="display: none">
						<div class="chips_player_pair"></div>
						<div class="chips_banker_pair"></div>
						<div class="up_set">
							<div class="chips_phoenix">
								<a id="phoenixInfoBoxShow" href="javascript:void(0)"><span>?</span></a>
							</div>
							<div class="chips_big"></div>
							<div class="chips_small select"></div>
							<div class="chips_turtle">
								<a id="turtleInfoBoxShow" href="javascript:void(0)"><span>?</span></a>
							</div>
						</div>
						<div class="down_set">
							<div id="playerInsInfo" class="chips_player_ins" style="display:none">
								<a id="playerInsBoxShow" href="javascript:void(0)"><span>?</span></a>
							</div>
							<div class="chips_player_bonus">
								<a id="playerBonusInfoBoxShow" href="javascript:void(0)"><span>?</span></a>
							</div>
							<div class="chips_player"></div>
							<div class="chips_tie"></div>
							<div class="chips_banker"></div>
							<div class="chips_banker_bonus">
								<a id="bankerBonusInfoBoxShow" href="javascript:void(0)"><span>?</span></a>
							</div>
							<div id="bankerInsInfo" class="chips_banker_ins" style="display:none">
								<a id="bankerInsBoxShow" href="javascript:void(0)"><span>?</span></a>
							</div>
						</div>
					</div>

					<div class="box_con_all">
						<div name="betZoneBac" id="betBoxPlayerPair" class="box_player_pair no_win" style="display: none">
							<p id="playerPairCurrentBet">0</p>
							<h2><?=$lang_member[1264]?></h2>
							<h3 id="playerPairOdds">1:11</h3>
						</div>
						<div name="betZoneBac" id="betBoxBankerPair" class="box_banker_pair no_win" style="display: none">
							<p id="bankerPairCurrentBet">0</p>
							<h2><?=$lang_member[1263]?></h2>
							<h3 id="bankerPairOdds">1:11</h3>
						</div>
						<div name="betZoneBac" class="up_set" style="display: none">
							<div id="betBoxPhoenix" class="box_phoenix no_win">
								<p id="phoenixCurrentBet">0</p>
								<h2><?=$lang_member[1267]?></h2>
								<h3 id="phoenixOdds">1:25</h3>
							</div>
							<div id="betBoxBig" class="box_big no_win">
								<p id="bigCurrentBet">0</p>
								<h2><?=$lang_member[363]?></h2>
								<h3 id="smallOdds">1:0.5</h3>
							</div>
							<div id="betBoxSmall" class="box_small no_win">
								<p id="smallCurrentBet">0</p>
								<h2><?=$lang_member[364]?></h2>
								<h3 id="bigOdds">1:1.5</h3>
							</div>
							<div id="betBoxTurtle" class="box_turtle no_win">
								<p id="turtleCurrentBet">0</p>
								<h2><?=$lang_member[1268]?></h2>
								<h3 id="turtleOdds">1:5</h3>
							</div>
						</div>
						<div name="betZoneBac" class="down_set" style="display: none">
							<div name="betZoneBac" id="betBoxPlayerIns" class="box_player_ins no_win">
								<p id="playerInsCurrentBet">0</p>
								<h2>P INS</h2>
							</div>
							<div name="betZoneBac" id="betBoxPlayerBonus" class="box_player_bonus no_win">
								<p id="playerBonusCurrentBet">0</p>
								<h2><?=$lang_member[1634]?></h2>
							</div>
							<div name="betZoneBac" id="betBoxPlayer" class="box_player no_win">
								<p id="playerCurrentBet">0</p>
								<h2><?=$lang_member[359]?></h2>
								<h3 id="playerOdds">1:1</h3>
							</div>
							<div name="betZoneBac" id="betBoxTie" class="box_tie no_win">
								<p id="tieCurrentBet">0</p>
								<h2><?=$lang_member[220]?></h2>
								<h3 id="tiePairOdds">1:8</h3>
							</div>
							<div name="betZoneBac" id="betBoxBanker" class="box_banker no_win">
								<p id="bankerCurrentBet">0</p>
								<h2><?=$lang_member[361]?></h2>
								<h3 id="bankerOdds">1:0.95</h3>
							</div>
							<div name="betZoneBac" id="betBoxBankerBonus" class="box_banker_bonus no_win">
								<p id="bankerBonusCurrentBet">0</p>
								<h2><?=$lang_member[1634]?></h2>
							</div>
							<div name="betZoneBac" id="betBoxBankerIns" class="box_banker_ins no_win">
								<p id="bankerInsCurrentBet">0</p>
								<h2>B INS</h2>
							</div>
						</div>

						<div name="betZoneLongHu" id="betBoxDragon" class="box_player no_win" style="display: none">
							<p id="dragonCurrentBet">0</p>
							<h2><?=$lang_member[1216]?></h2>
							<h3 id="dragonOdds">1:1</h3>
						</div>
						<div name="betZoneLongHu" id="betBoxLongHuTie" class="box_tie no_win" style="display: none">
							<p id="dtTieCurrentBet">0</p>
							<h2><?=$lang_member[220]?></h2>
							<h3 id="tiePairOdds">1:8</h3>
						</div>
						<div name="betZoneLongHu" id="betBoxTiger" class="box_banker no_win" style="display: none">
							<p id="tigerCurrentBet">0</p>
							<h2><?=$lang_member[1215]?></h2>
							<h3 id="tigerOdds">1:1</h3>
						</div>
					</div>
				</section>

				<section id="functionZone" class="function_zone">
					<div class="tool_btn">
						<a href="javascript:void(0);" id="refreshBtn" class="desk_refresh">refresh</a>
						<a href="javascript:void(0);" id="changeLine" class="change_line">1</a>
					</div>

					<ul id="chips" class="chips">
						<li>
							<p></p>
							<span class="shadow">shadow</span>
							<span class="line">line</span>
							<span class="ring">ring</span>
						</li>
						<li>
							<p></p>
							<span class="shadow">shadow</span>
							<span class="line">line</span>
							<span class="ring">ring</span>
						</li><li>
							<p></p>
							<span class="shadow">shadow</span>
							<span class="line">line</span>
							<span class="ring">ring</span>
						</li><li>
							<p></p>
							<span class="shadow">shadow</span>
							<span class="line">line</span>
							<span class="ring">ring</span>
						</li><li>
							<p></p>
							<span class="shadow">shadow</span>
							<span class="line">line</span>
							<span class="ring">ring</span>
						</li><li>
							<p></p>
							<span class="shadow">shadow</span>
							<span class="line">line</span>
							<span class="ring">ring</span>
						</li>
						<li class="chips_set" id="chipsSetBtn">
							<span><?=$lang_member[1565]?></span>
						</li>
					</ul>

					<div id="goodRoad" class=""></div>

					<dl class="total_bet">
						<dt>
							<?=$lang_member[1599]?>
							<span id="playerTotalCurrentBet">0</span>
						</dt>
						<dd id="actionButtonBac" style="display: none;">
							<a href="javascript:void(0);" id="confirm" name="confirm" class="confirm no_work"><?=$lang_member[64]?></a>
							<a href="javascript:void(0);" id="repeat" name="repeat" class="repeat no_work"><p style="width: 120%"><?=$lang_member[1560]?></p></a>
							<a href="javascript:void(0);" id="cancel" name="cancel" class="cancel no_work"><p style="width: 120%"><?=$lang_member[65]?></p></a>
						</dd>
						<dd id="actionButtonLongHu" style="display: none;">
							<a href="javascript:void(0);" id="confirmLongHu" name="confirmLongHu" class="confirm no_work"><?=$lang_member[64]?></a>
							<a href="javascript:void(0);" id="repeatLongHu" name="repeatLongHu" class="repeat no_work"><p style="width: 120%"><?=$lang_member[1560]?></p></a>
							<a href="javascript:void(0);" id="cancelLongHu" name="cancelLongHu" class="cancel no_work"><p style="width: 120%"><?=$lang_member[65]?></p></a>
						</dd>
					</dl>
				</section>

				<iframe id="currentTableIframe" src="currentTableInfo.php?dm=1" class="history_frame" scrolling="no" style="z-index: 100;"></iframe>
			</article>

			<div style="display: none">
				<div id="templateInsBet" style="display: none">
				</div>
				<li id="templateInsChipLi">
					<p>user</p>
					<span class="shadow"></span>
					<span class="line"></span>
					<span class="ring"></span>
				</li>
				<li id="templateLi"></li>
				<li id="templateLiBetLimit"><?=$lang_member[1652]?></li>
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
								<div class="">

								</div>
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
				<li id="templateLiChips"><span><p id="" class="" data-amount=""></p></span></li>
			</div>
			<div id="templateDiv" class="add_chips" style="display: none"></div>

			<div style="display: none;">
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
