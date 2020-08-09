

















<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
<title>Baccarat</title>
<link href="../CSS/player/table_list.css" rel="stylesheet" type="text/css" />
<link href="../CSS/player/poker_card_one.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/jquery.nicescroll.min-3.7.6.js"></script>
<script type="text/javascript" src="../js/util/JSUtil.js?v=2019042409"></script>
<script type="text/JavaScript" src="../js/const/Const.js?v=2019042409"></script>
<script type="text/JavaScript" src="../js/player/gameTableList.js?v=2019042409"></script>
<script type="text/javascript">
var $j = jQuery.noConflict();
I18N.setResource({
	"form.text.member.balance"   : "ยอด",
	"form.text.speed"            : "ความเร็ว",
	"form.text.table"            : "โต๊ะ",
	"form.text.game"             : "เกมส์",
	"form.text.limit"            : "จำกัด",
	"form.text.shuffling"        : "กำลังสับไพ่",
	"form.text.winner.banker"    : "เจ้ามือชนะ",
	"form.text.winner.tiger"     : "เสือชนะ",
	"form.text.winner.player"    : "ผู้เล่นชนะ",
	"form.text.winner.dragon"    : "มังกรชนะ",
	"form.text.winner.tie"       : "เสมอ",
	"form.text.category.banker1" : "เจ้ามือ",
	"form.text.category.player1" : "ผู้เล่น",
	"form.text.category.tiger1"  : "เสือ",
	"form.text.category.dragon1" : "มังกร",
	"form.text.goodRoad.bac.1"   : "ถนน  1",
	"form.text.goodRoad.bac.2"   : "ถนน  2",
	"form.text.goodRoad.bac.3"   : "ถนน  3",
	"form.text.goodRoad.bac.4"   : "ถนน  4",
	"form.text.goodRoad.bac.5"   : "ถนน  5",
	"form.text.goodRoad.bac.6"   : "ถนน  6",
	"form.text.goodRoad.bac.7"   : "ถนน  7",
	"form.text.goodRoad.bac.8"   : "ถนน  8",
	"form.text.goodRoad.bac.9"   : "ถนน  9",
	"form.text.goodRoad.bac.10"  : "ถนน  10",
	"form.text.goodRoad.dra.1"   : "ถนน  1",
	"form.text.goodRoad.dra.2"   : "ถนน  2",
	"form.text.goodRoad.dra.3"   : "ถนน  3",
	"form.text.goodRoad.dra.4"   : "ถนน  4",
	"form.text.goodRoad.dra.5"   : "ถนน  5",
	"form.text.goodRoad.dra.6"   : "ถนน  6",
	"form.text.goodRoad.dra.7"   : "ถนน  7",
	"form.text.goodRoad.dra.8"   : "ถนน  8",
	"form.text.goodRoad.dra.9"   : "ถนน  9",
	"form.text.goodRoad.dra.10"  : "ถนน  10",
	"form.text.road.word.banker" : "B",
	"form.text.road.word.player" : "P",
	"form.text.road.word.tie"    : "T",
	"form.text.road.word.dragon" : "D",
	"form.text.road.word.tiger"  : "T",
	"form.text.road.word.odd"    : "O",
	"form.text.road.word.even"   : "E",
	"form.text.road.word.big"    : "B",
	"form.text.road.word.small"  : "S",
	"form.text.road.word.triple" : "T",
	"form.text.insurance"        : "ประกัน",
	"msg.info.sec"               : "วินาที"
});

if (typeof (PageConfig) == 'undefined') {
	PageConfig = {};
}
PageConfig.currencyId            = "9";
PageConfig.dealerDomain          = 1;
PageConfig.userBetLimitID        = 1;
PageConfig.userBetLimitIDCache   = null;
PageConfig.isIE                  = "0";
PageConfig.insuranceTableIDs     = "[21]";
PageConfig.speedTableIDs         = "[]";
PageConfig.hlsAdditionalBetTime  = 4;
PageConfig.enableMexicoWebHls    = "1";

$j(document).ready(function() {
	gameTableList.init();
	ScrollBarHandler.init("#tableList");
	PageUtil.contentLock();
});
</script>
</head>
<body class="">
	<section class="table_list_open">
		<div class="con" id="tableList" style="height: 850px;">
			<div class="list">
				<h4 style="border-bottom: 0px">
					<a id="close" href="javascript:void(0)">close</a>
				</h4>
				<h4 id="bacTableTitle" style="display: none">
					บาคาร่า
				</h4>
				<div id="bacTable"></div>

				<h4 id="draTableTitle" style="display: none">เสือ มังกร</h4>
				<div id="draTable"></div>

				<h4 id="sicTableTitle" style="display: none">ซิคโบ</h4>
				<div id="sicTable"></div>

				<h4 id="fpcTableTitle" style="display: none">ปลา กุ้ง ปู</h4>
				<div id="fpcTable"></div>

				<h4 id="rouTableTitle" style="display: none">รูเล็ต</h4>
				<div id="rouTable"></div>
			</div>
		</div>
	</section>

	
	<div id="bigRoadTemplate" style="display: none">
		<dl>
			<dt>
				<font id="tableID"></font>
				<p id="showRound"></p>
			</dt>
			<dd class="on">
				<p id="tableBetLimit">จำกัด : --</p>
				<span>icon</span>
				<ul id="betLimits" style="display: none"></ul>
			</dd>
		</dl>

		<div class="table_set">
			<div id="playMask" class="play_mask">
				<p>เล่น</p>
			</div>

			<div class="table_list_info">
				<p id="countdown"><span></span></p>
				<a href="javascript:void(0)"><span>เดิมพันแบบเร็ว</span></a>
			</div>

			<div class="photo">
				<img id="dealerImage" src="" alt="" onerror="this.src='/casino/sexy/images/player/dealer.jpg'" />
				<p id="dealerID"></p>
			</div>
			<div class="game_info" style="left:180px;display:none">กำลังสับไพ่</div>
			<div class="history">
				<div class=""></div>
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
						<div id="goodRoad" class=""></div>
					</li>
					<li>
						<span>Banker</span><p id="bankerCounts">0</p>
						<span>Player</span><p id="playerCounts">0</p>
						<span>Tie</span><p id="tieCounts">0</p>
					</li>
				</ul>
			</div>

			<div class="quick_card_zone" style="display: none">
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
			<div class="bet_zone" style="display: none">
				<ol>
					<li style="display: none"><ul></ul></li>
					<li style="display: none"><ul></ul></li>
					<li style="display: none"><ul></ul></li>
					<li style="display: none"><ul></ul></li>
					<li style="display: none"><ul></ul></li>
					<li style="display: none"><ul></ul></li>
				</ol>
				<ul class="bet_box">
					<li class="player no_win" style="display: none">
						ผู้เล่น
					</li>
					<li class="player no_win" style="display: none">
						มังกร
					</li>
					<li class="tie no_win" style="display: none">
						เสมอ
					</li>
					<li class="tie no_win" style="display: none">
						เสมอ
					</li>
					<li class="banker no_win" style="display: none">
						เจ้ามือ
					</li>
					<li class="banker no_win" style="display: none">
						เสือ
					</li>
				</ul>
				<div class="quick_btn_set">
					<a href="javascript:void(0)" class="confirm no_work"></a>
					<a href="javascript:void(0)" class="cancel no_work"></a>
				</div>
			</div>

			<section class="game_info_success" style="display: none"></section>
			<section class="game_info_unsuccessful" style="display: none"></section>
		</div>
	</div>

	<div style="display: none;">
		<table id="bigRoadTableTemplate"></table>
		<table id="sicBigRoadTableTemplate"></table>
		<table style="table-layout: fixed;">
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
		<li id="liCloseTemplate" class="close">ปิด</li>
		<li id="templateLi"></li>
		<div id="templateDiv" class="add_chips" style="display: none"></div>
	</div>
</body>
</html>