<?php   ob_start(); if (!isset($_SESSION)) { session_start(); } ?>














<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Baccarat</title>
<link href="../CSS/player/style_history_one.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/util/JSUtil.js?v=2019042409"></script>
<script type="text/JavaScript" src="../js/const/Const.js?v=2019042409"></script>
<script type="text/JavaScript" src="../js/player/currentTableInfo.js?v=2019042409"></script>
<script type="text/javascript">
var $j = jQuery.noConflict();
I18N.setResource({
	"form.text.member.balance"  : "ยอด",
	"form.text.road.askBanker1" : "เจ้ามือเรียก",
	"form.text.road.askPlayer1" : "ผู้เล่นเรียก",
	"form.text.road.askTiger1"  : "เสือเรียก",
	"form.text.road.askDragon1" : "มังกรเรียก",
	"form.text.road.word.banker": "B",
	"form.text.road.word.player": "P",
	"form.text.road.word.tie"   : "T",
	"form.text.road.word.dragon": "D",
	"form.text.road.word.tiger" : "T",
	"form.text.road.word.odd"   : "O",
	"form.text.road.word.even"  : "E",
	"form.text.road.word.big"   : "B",
	"form.text.road.word.small" : "S",
	"form.text.road.word.triple": "T"
});

if (typeof (PageConfig) == 'undefined') {
	PageConfig = {};
}
PageConfig.currencyId     = "9";
PageConfig.dealerDomain   = "1";
PageConfig.reverseBPColor = "0"
PageConfig.divTitles = [];


	PageConfig.divTitles.push('');

	PageConfig.divTitles.push('askBanker_');

	PageConfig.divTitles.push('askPlayer_');


$j(document).ready(function() {
	currentTableInfo.init(<?=$_SESSION["TableId"]?>);
	PageUtil.contentLock();
});
</script>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
</head>
<body>
	<div id="history" class="history">
	
		<div class="road_all" id="realTrend" style="">
			<ul name="changeMode" class="change_mode">
				<li name="showBPRoad" class="now"><p>เจ้ามือ<br />ผู้เล่น</p></li>
				<li name="showBSRoad"><p>ใหญ่<br />เล็ก</p></li>
			</ul>

			<div class="bead_road">
				<div class="go_left" id="beanRoadLeft">arrow</div>
				<div class="go_right" id="beanRoadRight">arrow</div>

				<!--請程式依照road_con內的table判斷road_con的寬度-->

				<div class="road_con">
					<table id="beadRoad" style="table-layout: fixed;">
					</table>
				</div>
			</div>

			<div class="big_road">
				<div class="go_left" id="bigRoadLeft">arrow</div>
				<div class="go_right" id="bigRoadRight">arrow</div>

				<!--請程式依照road_con內的table判斷road_con的寬度-->
				<div class="road_con">
					<table id="bigRoad" style="table-layout: fixed;">
					</table>
				</div>
			</div>

			<div class="road_set">
				<div class="bigeye_road">
					<div class="go_left" id="bigEyeLeft">arrow</div>
					<div class="go_right" id="bigEyeRight">arrow</div>

					<!--請程式依照road_con內的table判斷road_con的寬度-->
					<div class="road_con">
						<table id="bigEye" style="table-layout: fixed;">
						</table>
					</div>
				</div>

				<div class="small_road">
					<div class="go_left" id="smallLeft">arrow</div>
					<div class="go_right" id="smallRight">arrow</div>

					<!--請程式依照road_con內的table判斷road_con的寬度-->
					<div class="road_con">
						<table id="smalls" style="table-layout: fixed;">
						</table>
					</div>
				</div>

				<div class="cockroch_road">
					<div class="go_left" id="cockRochLeft">arrow</div>
					<div class="go_right" id="cockRochRight">arrow</div>

					<!--請程式依照road_con內的table判斷road_con的寬度-->
					<div class="road_con">
						<table id="cockroch" style="table-layout: fixed;">
						</table>
					</div>
				</div>
			</div>
		</div>
	
		<div class="road_all" id="askBanker_realTrend" style="display:none;">
			<ul name="changeMode" class="change_mode">
				<li name="showBPRoad" class="now"><p>เจ้ามือ<br />ผู้เล่น</p></li>
				<li name="showBSRoad"><p>ใหญ่<br />เล็ก</p></li>
			</ul>

			<div class="bead_road">
				<div class="go_left" id="askBanker_beanRoadLeft">arrow</div>
				<div class="go_right" id="askBanker_beanRoadRight">arrow</div>

				<!--請程式依照road_con內的table判斷road_con的寬度-->

				<div class="road_con">
					<table id="askBanker_beadRoad" style="table-layout: fixed;">
					</table>
				</div>
			</div>

			<div class="big_road">
				<div class="go_left" id="askBanker_bigRoadLeft">arrow</div>
				<div class="go_right" id="askBanker_bigRoadRight">arrow</div>

				<!--請程式依照road_con內的table判斷road_con的寬度-->
				<div class="road_con">
					<table id="askBanker_bigRoad" style="table-layout: fixed;">
					</table>
				</div>
			</div>

			<div class="road_set">
				<div class="bigeye_road">
					<div class="go_left" id="askBanker_bigEyeLeft">arrow</div>
					<div class="go_right" id="askBanker_bigEyeRight">arrow</div>

					<!--請程式依照road_con內的table判斷road_con的寬度-->
					<div class="road_con">
						<table id="askBanker_bigEye" style="table-layout: fixed;">
						</table>
					</div>
				</div>

				<div class="small_road">
					<div class="go_left" id="askBanker_smallLeft">arrow</div>
					<div class="go_right" id="askBanker_smallRight">arrow</div>

					<!--請程式依照road_con內的table判斷road_con的寬度-->
					<div class="road_con">
						<table id="askBanker_smalls" style="table-layout: fixed;">
						</table>
					</div>
				</div>

				<div class="cockroch_road">
					<div class="go_left" id="askBanker_cockRochLeft">arrow</div>
					<div class="go_right" id="askBanker_cockRochRight">arrow</div>

					<!--請程式依照road_con內的table判斷road_con的寬度-->
					<div class="road_con">
						<table id="askBanker_cockroch" style="table-layout: fixed;">
						</table>
					</div>
				</div>
			</div>
		</div>
	
		<div class="road_all" id="askPlayer_realTrend" style="display:none;">
			<ul name="changeMode" class="change_mode">
				<li name="showBPRoad" class="now"><p>เจ้ามือ<br />ผู้เล่น</p></li>
				<li name="showBSRoad"><p>ใหญ่<br />เล็ก</p></li>
			</ul>

			<div class="bead_road">
				<div class="go_left" id="askPlayer_beanRoadLeft">arrow</div>
				<div class="go_right" id="askPlayer_beanRoadRight">arrow</div>

				<!--請程式依照road_con內的table判斷road_con的寬度-->

				<div class="road_con">
					<table id="askPlayer_beadRoad" style="table-layout: fixed;">
					</table>
				</div>
			</div>

			<div class="big_road">
				<div class="go_left" id="askPlayer_bigRoadLeft">arrow</div>
				<div class="go_right" id="askPlayer_bigRoadRight">arrow</div>

				<!--請程式依照road_con內的table判斷road_con的寬度-->
				<div class="road_con">
					<table id="askPlayer_bigRoad" style="table-layout: fixed;">
					</table>
				</div>
			</div>

			<div class="road_set">
				<div class="bigeye_road">
					<div class="go_left" id="askPlayer_bigEyeLeft">arrow</div>
					<div class="go_right" id="askPlayer_bigEyeRight">arrow</div>

					<!--請程式依照road_con內的table判斷road_con的寬度-->
					<div class="road_con">
						<table id="askPlayer_bigEye" style="table-layout: fixed;">
						</table>
					</div>
				</div>

				<div class="small_road">
					<div class="go_left" id="askPlayer_smallLeft">arrow</div>
					<div class="go_right" id="askPlayer_smallRight">arrow</div>

					<!--請程式依照road_con內的table判斷road_con的寬度-->
					<div class="road_con">
						<table id="askPlayer_smalls" style="table-layout: fixed;">
						</table>
					</div>
				</div>

				<div class="cockroch_road">
					<div class="go_left" id="askPlayer_cockRochLeft">arrow</div>
					<div class="go_right" id="askPlayer_cockRochRight">arrow</div>

					<!--請程式依照road_con內的table判斷road_con的寬度-->
					<div class="road_con">
						<table id="askPlayer_cockroch" style="table-layout: fixed;">
						</table>
					</div>
				</div>
			</div>
		</div>
	

		<div class="info">
			<ul>
				
				<li class="ask_banker" id="askBankerBtn">
					<p id="askBanker"></p>
					<ol>
						<li id="askBigEyeBanker" class="none"></li>
						<li id="askSmallBanker" class="none"></li>
						<li id="askCockrochBanker" class="none"></li>
					</ol>
				</li>
				<li class="ask_player" id="askPlayerBtn">
					<p id="askPlayer">
					</p>
					<ol>
						<li id="askBigEyePlayer" class="none"></li>
						<li id="askSmallPlayer" class="none"></li>
						<li id="askCockrochPlayer" class="none"></li>
					</ol>
				</li>
			</ul>

			<dl id="infoBac1" style="display: none">
				<dt class="banker" style="font-size: 12px;">เจ้ามือ</dt>
				<dd class="banker" id="bankerCount">0</dd>

				<dt class="player" style="font-size: 12px;">ผู้เล่น</dt>
				<dd class="player" id="playerCount">0</dd>

				<dt class="tie" style="font-size: 12px;">เสมอ</dt>
				<dd class="tie" id="tieCount">0</dd>

				<dt class="other" style="font-size: 12px;">ฟีนิค</dt>
				<dd class="other" id="phoenixPairCount">0</dd>

				<dt class="other" style="font-size: 12px;">เต่า</dt>
				<dd class="other" id="turtlePairCount">0</dd>
			</dl>

			<dl id="infoBac2" style="display: none">
				<dt class="banker" style="font-size: 12px;">เจ้ามือคู่</dt>
				<dd class="banker" id="bankerPairCount">0</dd>

				<dt class="player" style="font-size: 12px;">ผู้เล่นคู่</dt>
				<dd class="player" id="playerPairCount">0</dd>

				<dt class="other" style="font-size: 12px;">ใหญ่</dt>
				<dd class="other" id="bigCount">0</dd>

				<dt class="other" style="font-size: 12px;">เล็ก</dt>
				<dd class="other" id="smallCount">0</dd>

				<dt style="font-size: 12px;">รวมทั้งหมด</dt>
				<dd id="totalCount">0</dd>
			</dl>

			<dl id="infoLongHu1" style="display: none">
				<dt class="banker" style="font-size: 12px;">เสือ</dt>
				<dd class="banker" id="tigerCount">0</dd>

				<dt class="player" style="font-size: 12px;">มังกร</dt>
				<dd class="player" id="dragonCount">0</dd>

				<dt class="tie" style="font-size: 12px;">เสมอ</dt>
				<dd class="tie" id="tieLongHuCount">0</dd>

				<dt>รวมทั้งหมด</dt>
				<dd id="totalLongHuCount">0</dd>
			</dl>
		</div>
	</div>
	<div style="display: none;">
		<table style="table-layout: fixed;">
			<tr id="beadTrTemplate">
			</tr>
			<tr>
				<td id="beadTdTemplate">
					<div style="display: none"></div>
					<div style="display: none"></div>
					<div style="display: none"></div>
				</td>
			</tr>
		</table>
		<table style="table-layout: fixed;">
			<tr id="bigRoadTrTemplate">
			</tr>
			<tr>
				 <!-- tie Number, tie tie_top, Tie_down, pair_banker, pair_player, banker/player -->
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
		<table style="table-layout: fixed;">
			<tr id="downRoadTrTemplate">
			</tr>
			<tr>
				<td id="downRoadTdTemplate">
					<div style="display: none"></div>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>
