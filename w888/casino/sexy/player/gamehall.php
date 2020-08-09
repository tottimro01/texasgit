<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../../../inc/conn.php');
require('../../../inc/function.php');

require("../../../lang/variable_lang.php");
require("../../../lang/function_array.php");



$rec = sql_array("select * from bom_tb_config where con_id = 1;");

if($rec["con_open_casino"]==0){ 
  include '../../../sa_close.php'; 
  exit(); 
} 

foreach($_SESSION['arid'] as $rid){

  $r_open_page = explode(",", $_SESSION['ardata'][$rid]["r_open"]);
  
  if($r_open_page[12]==0){ 
    include '../../../ag_close.php'; 
    exit(); 
  } 
}

$m_open_page = explode(",", $_SESSION["m1"]["m_open"]);

if($m_open_page[12]==0){ 
  include '../../../ag_close.php'; 
  exit(); 
} 


?>



















<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?=$lang_g['game_zone'][3]?></title>
<link href="../CSS/player/gamehall.css" rel="stylesheet" type="text/css" />
<link href="../CSS/player/style_top.css" rel="stylesheet" type="text/css" />
<link href="../CSS/player/resizer.css" rel="stylesheet" type="text/css" />
<link href="../CSS/share_source/commonResult.css" rel="stylesheet" type="text/css" />
<link href="../CSS/jquery-ui-themes-1.10.4/themes/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<link href="../CSS/jquery-perfect-scrollbar-0.6.10/jquery-perfect-scrollbar.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/css/style.css?v=0003">
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/jquery-perfect-scrollbar-0.6.10.js"></script>
<script type="text/JavaScript" src="../js/const/Const.js?v=2019041710"></script>
<script type="text/javascript" src="../js/LineHandler.js?v=2019041710"></script>
<script type="text/JavaScript" src="../js/player/gamehall.js?v=2019041710"></script>
<script type="text/JavaScript" src="../js/util/JSUtil.js?v=2019041710"></script>
<script type="text/javascript" src="../js/swf/swfobject.js"></script>
<script type="text/JavaScript" src="../js/hls/hls.min.js?v=2019041710"></script>
<script type="text/JavaScript" src="../js/hls/HLSJSAPI.js?v=2019041710"></script>
<script type="text/javascript" src="../js/hls/streama.js"></script>
<script type="text/javascript" src="../js/jquery.nicescroll.min-3.7.6.js"></script>
<script type="text/javascript" src="../js/jquery-ui.1.12.1-min.js"></script>

<script type="text/javascript">
var $j = jQuery.noConflict();
I18N.setResource({
	"form.text.chips.selectChips1" : "<?=$lang_member[1566]?>",
	"form.text.chips.selectChips2" : "Chip",
	"form.text.member.balance"     : "<?=$lang_member[563]?>",
	"form.text.table"              : "<?=$lang_member[1546]?>",
	"form.text.limit"              : "<?=$lang_member[1563]?>",
	"form.text.shuffling"          : "<?=$lang_member[1564]?>",
	"form.text.report.Total"       : "<?=$lang_member[304]?>",
	"form.text.goodRoad.bac.1"     : "<?=$lang_member[1567]?>  1",
	"form.text.goodRoad.bac.2"     : "<?=$lang_member[1567]?>  2",
	"form.text.goodRoad.bac.3"     : "<?=$lang_member[1567]?>  3",
	"form.text.goodRoad.bac.4"     : "<?=$lang_member[1567]?>  4",
	"form.text.goodRoad.bac.5"     : "<?=$lang_member[1567]?>  5",
	"form.text.goodRoad.bac.6"     : "<?=$lang_member[1567]?>  6",
	"form.text.goodRoad.bac.7"     : "<?=$lang_member[1567]?>  7",
	"form.text.goodRoad.bac.8"     : "<?=$lang_member[1567]?>  8",
	"form.text.goodRoad.bac.9"     : "<?=$lang_member[1567]?>  9",
	"form.text.goodRoad.bac.10"    : "<?=$lang_member[1567]?>  10",
	"form.text.goodRoad.dra.1"     : "<?=$lang_member[1567]?>  1",
	"form.text.goodRoad.dra.2"     : "<?=$lang_member[1567]?>  2",
	"form.text.goodRoad.dra.3"     : "<?=$lang_member[1567]?>  3",
	"form.text.goodRoad.dra.4"     : "<?=$lang_member[1567]?>  4",
	"form.text.goodRoad.dra.5"     : "<?=$lang_member[1567]?>  5",
	"form.text.goodRoad.dra.6"     : "<?=$lang_member[1567]?>  6",
	"form.text.goodRoad.dra.7"     : "<?=$lang_member[1567]?>  7",
	"form.text.goodRoad.dra.8"     : "<?=$lang_member[1567]?>  8",
	"form.text.goodRoad.dra.9"     : "<?=$lang_member[1567]?>  9",
	"form.text.goodRoad.dra.10"    : "<?=$lang_member[1567]?>  10",
	"form.text.road.word.banker"   : "B",
	"form.text.road.word.player"   : "P",
	"form.text.road.word.tie"      : "T",
	"form.text.road.word.dragon"   : "D",
	"form.text.road.word.tiger"    : "T",
	"form.text.road.word.odd"      : "O",
	"form.text.road.word.even"     : "E",
	"form.text.road.word.big"      : "B",
	"form.text.road.word.small"    : "S",
	"form.text.road.word.triple"   : "T"
});

if (typeof (PageConfig) == 'undefined') {
	PageConfig = {};
}
PageConfig.currencyId            = "9";
PageConfig.dealerDomain          = "1";
PageConfig.userBetLimitID        = 1;
PageConfig.userChips             = "[4,5,6,7,8,9]";
PageConfig.userCustomChip        = 10;
PageConfig.playerSinglePage      = "singleTable4.php";
PageConfig.playerSingleSicPage   = "singleSicTable.php";
PageConfig.playerSingleRouPage   = "singleRouTable.php";
PageConfig.playerMultiPage       = "multiTable4.php";
PageConfig.playerMaintenancePage = "gamehallMaintenance.jsp";
PageConfig.guideBacPage          = "guide/bac/guideBac_th.php?dm=1";
PageConfig.guideBacPageReady     = "0";
PageConfig.guideDraPage          = "guide/dra/guideDra_th.php?dm=1";
PageConfig.guideDraPageReady     = "0";
PageConfig.guideSicPage          = "guide/sic/guideSic_th.php?dm=1";
PageConfig.guideSicPageReady     = "0";
PageConfig.guideFpcPage          = "guide/fpc/guideFpc_th.php?dm=1";
PageConfig.guideFpcPageReady     = "0";
PageConfig.streamingAudio        = "1";
PageConfig.resultSound           = "1";
PageConfig.bettingSound          = "1";
PageConfig.backgroundMusic       = "1";
PageConfig.userCountry           = "TH";
PageConfig.insuranceTableIDs     = "[21]";
PageConfig.speedTableIDs         = "[]";
PageConfig.title                 = "1";
PageConfig.enableBackgroundMusic = "1";
PageConfig.hlsAdditionalBetTime  = 4;
PageConfig.enableMexicoWebHls	 = "1";

if (PageConfig.enableMexicoWebHls == "1") {
	//preload HLS class
	videoCanvas.preload();
}
$j(document).ready(function() {
	if (true) {
		LineHandler.init({"goTo":"/player/gamehall.php?dm=1&title=1","z":".bikimex.com","e":["QUE=","QkI="],"eDefault":"AA","port":80});
	}
	if (PageConfig.enableMexicoWebHls == "1") {
		videoCanvas.setEnableVideo();
	}
	LanguageUtil.init();
	gamehall.init();
	//ResizeUtil.doResize();
	PageUtil.commonsScriptWeb();
	PageUtil.contentLock();
	$j("#tableAll").perfectScrollbar();
	
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
<body class="cafe " style="width: 980px;">

<div id="">
<div id="title_page">
    <div id="ic_title">&gt;</div>
    <span id="stitle"><?=$lang_member[958]?></span>
    
  </div>




	<div id="scaleable-wrapper" class="scaleable-wrapper">
		<div id="very-specific-design" class="very-specific-design">
			<div class="top">
				<div class="left_list">
				</div>

				<ul class="right_function">
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
					<li class="nav" id="menu">
						<a id="navLink" href="javascript:void(0);">
							nav
						</a>
						<ul id="nav" class="nav_list" style="desplay: none; z-index: 999">
							
							<li><a id="chipsSet" href="javascript:void(0);"><?=$lang_member[1565]?></a></li>
							
							
							<li><a href="javascript:void(0);" onclick="parent.rightx.location.href='/list_bet_casino.php?vx=1&vvw=&token=<?=$_SESSION["m_token"];?>'";><?=$lang_member[43]?></a></li>
							
							<li><a id="guideBacShow" href="javascript:void(0);"><?=$lang_member[1557]?></a></li>
							<li><a id="guideDraShow" href="javascript:void(0);"><?=$lang_member[1558]?></a></li>
							<li><a id="guideSicShow" href="javascript:void(0);"><?=$lang_member[1559]?></a></li>
							
						</ul>
					</li>

					
					<!--<li class="baccarat_mode">
						<strong>โหมดเกมส์</strong>
						<p class="multi_mode" id="gameMode">
							<span>หลายโต๊ะ</span>
						</p>
					</li>-->
				</ul>
			</div>

			<div id="gamehallLimitChips" class="popup_set" style="z-index: 400; display: none;">
				<div class="con_all">
					<h3><?=$lang_member[1563]?> ＆ Chip <?=$lang_member[1565]?></h3>
					<div class="set_box">
						<div class="set_limit">
							<h4><?=$lang_member[1566]?> <strong><?=$lang_member[1563]?></strong></h4>
							<div id="limitBox" class="limit_box">
								
							</div>
						</div>

						<div class="set_chips_half">
							<h4><?=$lang_member[1566]?> <strong>6 loại chip</strong></h4>
							<ul id="setChipsUl"></ul>
						</div>
					</div>

					<div id="errorLimitChips" class="error_message">&nbsp;</div>

					<div class="btn_con">
						
						<input type="button" id="cancelBtn" name="cancel" value="<?=$lang_member[65]?>" />
						
						<input type="button" id="submitBtn" name="submit" value="<?=$lang_member[64]?>" class="focus" />
					</div>
				</div>
			</div>

			<div id="gamehallPopupLimit" class="popup_set set_limit" style="display: none">
				<div class="con_all">
					<h3><?=$lang_member[1566]?> <?=$lang_member[1563]?> </h3>
					<div class="set_box">
						<div class="set_limit">
							<div id="popupLimitBox" class="limit_box">
								
							</div>
						</div>
					</div>

					<div id="popupErrorLimit" class="error_message">&nbsp;</div>

					<div class="btn_con">
						<input type="button" id="popupCancelBtn" name="cancel" value="<?=$lang_member[65]?>" />
						<input type="button" id="popupSubmitBtn" name="submit" value="<?=$lang_member[64]?>" class="focus" />
					</div>
				</div>
			</div>
			<!--<div class="top_message" style="display:none">
				<strong>Big298 เหมาะและเข้ากันได้กับเบราว์เซอร์ที่ระบุไว้ด้านล่าง</strong>
				<p>Chrome 60+</p>
				<p>Safari</p>
				<p>Firefox</p>
				<div class="btn_con">
					<input type="text" name="submit" value="ยืนยัน" class="focus" onclick='$j("div.top_message").fadeOut();' />
				</div>
				<a href="#" id="noshowalert">ไม่ต้องแสดงอีก</a>
			</div>-->

			<article>
				
				<audio id="soundBackGroundMusic" preload="none">
					<source src="" type="audio/mpeg">
				</audio>
				
				<iframe id="guideBac" name="guide" class="game_guide" scrolling="no" style="z-index: 350; border: 0; display: none;"></iframe>
				<iframe id="guideDra" name="guide" class="game_guide" scrolling="no" style="z-index: 350; border: 0; display: none;"></iframe>
				<iframe id="guideSic" name="guide" class="game_guide" scrolling="no" style="z-index: 350; border: 0; display: none;"></iframe>
				<iframe id="guideFpc" name="guide" class="game_guide" scrolling="no" style="z-index: 350; border: 0; display: none;"></iframe>
				
				<iframe id="transHistory" name="transHistory" class="trans_history" src="txnHistory.php?dm=1" style="visibility: hidden; z-index: 350; border: 0"></iframe>
				

				<div class="aside_box">
					<ul class="game_box">
						<li>
							<a href="">Live casino<span></span></a>
						</li>
						<li class="cock">
							<a href="">Cockfighting<span></span></a>
						</li>
						<li class="fish">
							<a href="">Fishing<span></span></a>
						</li>
						<li class="horse">
							<a href="">Horse racing<span></span></a>
						</li>
						<li class="slot">
							<a href="">Slot game<span></span></a>
						</li>
						<li class="ball">
							<a href="">3D<span></span></a>
						</li>
					</ul>
				</div>

				<div class="contant">
					<div class="kv_box">
						<div class="kv_banner">
							<ul>
								<li class="on"></li>
								<li></li>
								<li></li>
								<li></li>
							</ul>
							
							<img src="../images/player/gamehall_kv/th/1/banner01_1045x220.jpg" alt="" height="149" />
						</div>
						
						<div id="video-canvas-box" class="video_box" style="overflow: hidden; align-items:inherit; height: 149px; width: 270px;">
							<div id="loading" class="abgne-loading" style="display: none;z-index: 45;left:90px;top:30px">
								<div class="loading_text"><?=$lang_member[1560]?></div>
								<div class="loading"></div>
							</div>
							<video id="video" height="169px" width="270px" margin="0" padding="0" autoplay playsinline webkit-playsinline x5-playsinline></video>
						</div>
						
					</div>

					<div id="tableAll" class="table_all" style="/*max-height: 700px; height: 700px; position: relative; overflow: auto;*/">
						<div>
							<h2 id="bacTableSpdTitle" class="speed_mode" style="display: none"><span><?=$lang_member[1561]?></span> <?=$lang_g['game_zone'][3]?></h2>
							<div id="bacTableSpd"></div>

							<h2 id="bacTableTitle" style="display: none"><?=$lang_g['game_zone'][3]?></h2>
							<div id="bacTable"></div>

							<h2 id="bacTableInsTitle" style="display: none"><?=$lang_member[1214]?></h2>
							<div id="bacTableIns"></div>

							<h2 id="draTableTitle" style="display: none"><?=$lang_member[1215]?> <?=$lang_member[1216]?></h2>
							<div id="draTable"></div>

							<h2 id="sicTableTitle" style="display: none"><?=$lang_member[1217]?></h2>
							<div id="sicTable"></div>

							<h2 id="fpcTableTitle" style="display: none"><?=$lang_g['game_zone'][5]?></h2>
							<div id="fpcTable"></div>

							<h2 id="rouTableTitle" style="display: none"><?=$lang_member[1562]?></h2>
							<div id="rouTable"></div>
						</div>
					</div>

					<div id="tempTableBox" class="table_box" style="display:none">
						<div class="photo">
							<img id="dealerImage" src="../images/player/dealer.jpg" alt="" onerror="this.src='../images/player/dealer.jpg'" />
							<p id="dealerID"></p>
						</div>
						<div class="table_con">
							<dl>
								<dt id="tableID"></dt>
								<dd>
									<a href="javascript:void(0)" id="tableBetLimit"><?=$lang_member[1563]?> : --</a>
									<ul id="betLimits" class="limit_list" style="z-index: 250; display: none;"></ul>
								</dd>
							</dl>

							<div class="road_frame">
								<div id="divBigRoad" class="gamehall_road">
									<div style="position:relative">
										<div class="game_info" style="display:none;z-index:200;top:30px;left:80px;"><?=$lang_member[1564]?></div>
									</div>
									<div class="history">
										<div class="road_all">
											<div class="big_road">
												<div class="road_con">
													<table id="bigRoad" >

													</table>
												</div>
											</div>
										</div>	
									</div>
								</div>
							</div>

							<ul class="road_play">
								<li>
									<span>Banker</span><p id="bankerCounts">0</p>
									<span>Player</span><p id="playerCounts">0</p>
									<span>Tie</span><p id="tieCounts">0</p>
								</li>
								<li id="goodRoad" class="" style="display: none"></li>
								<li>
									<a id="redirect" href="javascript:void(0)"><?=$lang_member[728]?></a>
								</li>
							</ul>
						</div>
					</div>

					<div style="display:none;">
						<table>
							<tr id="bigRoadTrTemplate"></tr>
							<tr>
								
								<td id="bigRoadTdTemplate">
									<p style="display: none"></p>
									<div style="display: none"></div>
									<div style="display: none"></div>
									<div style="display: none"></div>
									<div style="display: none"></div>
									<div style="display: none"></div>
								</td>
								<td id="sicBigRoadTdTemplate1"><p></p></td>
								<td id="sicBigRoadTdTemplate2"></td>
							</tr>
						</table>
						<li id="liCloseTemplate" class="close"><?=$lang_member[612]?></li>
						<li id="liTemplate"><a href="javascript:void(0)"></a></li>
						<li id="templateLiChips"><span><p id="" class="" data-amount=""></p></span></li>
						<dl id="betLimitTemplate">
							<dt><?=$lang_member[1563]?></dt>
							<dd></dd>
						</dl>
					</div>
				</div>
			</article>
		</div>
	</div>
</div>
</body>
</html>
