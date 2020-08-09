<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Baccarat</title>
<link href="../CSS/player/style_top.css" rel="stylesheet" type="text/css" />
<link href="../CSS/player/resizer.css" rel="stylesheet" type="text/css" />
<link href="../CSS/player/table_list.css" rel="stylesheet" type="text/css" />
<link href="../CSS/player/style_one.css" rel="stylesheet" type="text/css" />
<link href="../CSS/share_source/commonResult.css" rel="stylesheet" type="text/css" />
<link href="../CSS/jquery-ui-themes-1.10.4/themes/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<script type="text/JavaScript" src="../js/const/Const.js?v=2019041710"></script>
<script type="text/JavaScript" src="../js/util/JSUtil.js?v=2019041710"></script>
<script type="text/JavaScript" src="../js/player/txnHistory.js?v=2019041710"></script>
<script type="text/javascript" src="../js/jquery.nicescroll.min-3.7.6.js"></script>
<script type="text/javascript" src="../js/jquery-ui.1.12.1-min.js"></script>
<script type="text/javascript">
var $j = jQuery.noConflict();
I18N.setResource({
	"form.text.baccarat"            : "บาคาร่า",
	"form.text.dragonTiger"         : "เสือ มังกร",
	"form.text.sicbo"               : "ซิคโบ",
	"form.text.fishPrawnCrab"       : "ปลา กุ้ง ปู",
	"form.text.roulette"            : "รูเล็ต",
	"form.text.report.Total"        : "ทั้งหมด",
	"form.text.report.banker"       : "แบงค์เกอร์",
	"form.text.report.player"       : "เพลเยอร์",
	"form.text.report.tie"          : "เสมอ",
	"form.text.report.bankerBonus"  : "โบนัส แบงค์เกอร์",
	"form.text.report.bankerPair"   : "แบงค์เกอร์ คู่",
	"form.text.report.playerBonus"  : "เพลเยอร์ โบนัส",
	"form.text.report.playerPair"   : "ผู้เล่นคู่",
	"form.text.report.big"          : "ใหญ่",
	"form.text.report.small"        : "เล็ก",
	"form.text.report.phoenix"      : "ฟีนิกซ์ คู่",
	"form.text.report.turtle"       : "เต่าคู่",
	"form.text.report.tiger"        : "เสือ",
	"form.text.report.dragon"       : "ดราก้อน",
	"form.text.report.sicAnyTriple" : "ออกตอง",
	"form.text.report.sicBig"       : "สูง",
	"form.text.report.sicD11"       : "คู่1",
	"form.text.report.sicD22"       : "คู่2",
	"form.text.report.sicD33"       : "คู่3",
	"form.text.report.sicD44"       : "คู่4",
	"form.text.report.sicD55"       : "คู่5",
	"form.text.report.sicD66"       : "คู่6",
	"form.text.report.sicEven"      : "คู่",
	"form.text.report.sicOdd"       : "คี่",
	"form.text.report.sicPt10"      : "รวม10",
	"form.text.report.sicPt11"      : "รวม11",
	"form.text.report.sicPt12"      : "รวม12",
	"form.text.report.sicPt13"      : "รวม13",
	"form.text.report.sicPt14"      : "รวม14",
	"form.text.report.sicPt15"      : "รวม15",
	"form.text.report.sicPt16"      : "รวม16",
	"form.text.report.sicPt17"      : "รวม17",
	"form.text.report.sicPt4"       : "รวม4",
	"form.text.report.sicPt5"       : "รวม5",
	"form.text.report.sicPt6"       : "รวม6",
	"form.text.report.sicPt7"       : "รวม7",
	"form.text.report.sicPt8"       : "รวม8",
	"form.text.report.sicPt9"       : "รวม9",
	"form.text.report.sicS1"        : "เต็ง1",
	"form.text.report.sicS2"        : "เต็ง2",
	"form.text.report.sicS3"        : "เต็ง3",
	"form.text.report.sicS4"        : "เต็ง4",
	"form.text.report.sicS5"        : "เต็ง5",
	"form.text.report.sicS6"        : "เต็ง6",
	"form.text.report.sicSmall"     : "ต่ำ",
	"form.text.report.sicT111"      : "ตอง1",
	"form.text.report.sicT222"      : "ตอง2",
	"form.text.report.sicT333"      : "ตอง3",
	"form.text.report.sicT444"      : "ตอง4",
	"form.text.report.sicT555"      : "ตอง5",
	"form.text.report.sicT666"      : "ตอง6",
	"form.text.report.sicTd12"      : "ผลรวม12",
	"form.text.report.sicTd13"      : "ผลรวม13",
	"form.text.report.sicTd14"      : "ผลรวม14",
	"form.text.report.sicTd15"      : "ผลรวม15",
	"form.text.report.sicTd16"      : "ผลรวม16",
	"form.text.report.sicTd23"      : "ผลรวม23",
	"form.text.report.sicTd24"      : "ผลรวม24",
	"form.text.report.sicTd25"      : "ผลรวม25",
	"form.text.report.sicTd26"      : "ผลรวม26",
	"form.text.report.sicTd34"      : "ผลรวม34",
	"form.text.report.sicTd35"      : "ผลรวม35",
	"form.text.report.sicTd36"      : "ผลรวม36",
	"form.text.report.sicTd45"      : "ผลรวม45",
	"form.text.report.sicTd46"      : "ผลรวม46",
	"form.text.report.sicTd56"      : "ผลรวม56",
	"msg.info.nodata"               : "ไม่มีข้อมูล...",
	"form.text.report.playerInsurance1"   : "ประกันเพลเยอร์ (พี 2 ใบแรก)",
	"form.text.report.playerInsurance2"   : "ประกันเพลเยอร์ (พี 3 ใบแรก)",
	"form.text.report.bankerInsurance1"   : "ประกันแบงค์เกอร์ (พี 2 ใบแรก)",
	"form.text.report.bankerInsurance2"   : "ประกันแบงค์เกอร์ (พี 3 ใบแรก)",
	"form.text.report.fpcDice1"     : "กวาง",
	"form.text.report.fpcDice2"     : "น้ำเต้า",
	"form.text.report.fpcDice3"     : "ไก่",
	"form.text.report.fpcDice4"     : "กุ้ง",
	"form.text.report.fpcDice5"     : "ปู",
	"form.text.report.fpcDice6"     : "หา",
	"form.text.report.fpcD11"       : "กวาง คู่",
	"form.text.report.fpcD22"       : "น้ำเต้า คู่",
	"form.text.report.fpcD33"       : "ไก่ คู่",
	"form.text.report.fpcD44"       : "กุ้ง คู่",
	"form.text.report.fpcD55"       : "ปู คู่",
	"form.text.report.fpcD66"       : "ปลา คู่",
	"form.text.report.fpcS1"        : "กวาง เดี่ยว        ",
	"form.text.report.fpcS2"        : "น้ำเต้า เดี่ยว      ",
	"form.text.report.fpcS3"        : "ไก่ เดี่ยว         ",
	"form.text.report.fpcS4"        : "กุ้ง เดี่ยว         ",
	"form.text.report.fpcS5"        : "ปู เดี่ยว         ",
	"form.text.report.fpcS6"        : "ปลา เดี่ยว        ",
	"form.text.report.fpcT111"      : "กวาง ตอง         ",
	"form.text.report.fpcT222"      : "น้ำเต้า ตอง        ",
	"form.text.report.fpcT333"      : "ไก่ ตอง         ",
	"form.text.report.fpcT444"      : "กุ้ง ตอง         ",
	"form.text.report.fpcT555"      : "ปู ตอง         ",
	"form.text.report.fpcT666"      : "ปลา ตอง         ",
	"form.text.report.fpcTd12"      : "กวาง กับ น้ำเต้า ",
	"form.text.report.fpcTd13"      : "กวาง กับ ไก่      ",
	"form.text.report.fpcTd14"      : "กวาง กับ กุ้ง      ",
	"form.text.report.fpcTd15"      : "กวาง กับ ปู       ",
	"form.text.report.fpcTd16"      : "กวาง กับ ปลา    ",
	"form.text.report.fpcTd23"      : "น้ำเต้า กับ ไก่    ",
	"form.text.report.fpcTd24"      : "น้ำเต้า กับ กุ้ง    ",
	"form.text.report.fpcTd25"      : "น้ำเต้า กับ ปู      ",
	"form.text.report.fpcTd26"      : "น้ำเต้า กับ ปลา  ",
	"form.text.report.fpcTd34"      : "ไก่ กับ กุ้ง         ",
	"form.text.report.fpcTd35"      : "ไก่ กับ ปู         ",
	"form.text.report.fpcTd36"      : "ไก่ กับ ปลา       ",
	"form.text.report.fpcTd45"      : "กุ้ง กับ ปู         ",
	"form.text.report.fpcTd46"      : "กุ้ง กับ ปลา       ",
	"form.text.report.fpcTd56"      : "ปู กับ ปลา        ",
	"form.text.report.fpcAnyTriple" : "สามเท่าแบบไหนก็ได้",
	"form.text.report.fpcBig"       : "ใหญ่",
	"form.text.report.fpcSmall"     : "เล็ก ",
	"form.text.report.fpcEven"      : "คู่",
	"form.text.report.fpcOdd"       : "คี่",
	"form.text.report.fpcPt10"      : "ผลรวม 10",
	"form.text.report.fpcPt11"      : "ผลรวม 11",
	"form.text.report.fpcPt12"      : "ผลรวม 12",
	"form.text.report.fpcPt13"      : "ผลรวม 13",
	"form.text.report.fpcPt14"      : "ผลรวม 14",
	"form.text.report.fpcPt15"      : "ผลรวม 15",
	"form.text.report.fpcPt16"      : "ผลรวม 16",
	"form.text.report.fpcPt17"      : "ผลรวม 17",
	"form.text.report.fpcPt4"       : "ผลรวม 4",
	"form.text.report.fpcPt5"       : "ผลรวม 5",
	"form.text.report.fpcPt6"       : "ผลรวม 6",
	"form.text.report.fpcPt7"       : "ผลรวม 7",
	"form.text.report.fpcPt8"       : "ผลรวม 8",
	"form.text.report.fpcPt9"       : "ผลรวม 9"
});

if (typeof (PageConfig) == "undefined") {
	PageConfig = {};
}

$j(document).ready(function() {
	txnHistory.init(1);
	ScrollBarHandler.init("#transHistoryList");
	PageUtil.contentLock();
});
</script>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
</head>
<body>
	<div class="trans_history">
		<div id="transHistoryVideo" class="popResultBK target" style="display: none">
			<div class="popResult">
				<div class="popResult-header">
					<h2>ผลลัพธ์<span id="txnCurrentGA"></span></h2>
					<a id="transHistoryVideoHide" class="btnResult-Close" href="javascript:void(0)">Close</a>
				</div>

				<div class="popResult-content">
					<div id="txnPopResult" class="">
						<div id="txnGameWinnerBac" class="popResult-pokerIn">
							<div class="boxBlue">
								<h3>ผู้เล่น</h3>
								<h4 id="txnPlayerHandValue"></h4>
								<ul>
									<li id="txnPlayer1stCard" class="">poker</li>
									<li id="txnPlayer2ndCard" class="">poker</li>
									<li id="txnPlayer3rdCard" class="">poker</li>
								</ul>
							</div>
							<div class="boxRed">
								<h3>เจ้ามือ</h3>
								<h4 id="txnBankerHandValue"></h4>
								<ul>
									<li id="txnBanker1stCard" class="">poker</li>
									<li id="txnBanker2ndCard" class="">poker</li>
									<li id="txnBanker3rdCard" class="">poker</li>
								</ul>
							</div>
						</div>

						<div id="txnGameWinnerDra" class="popResult-pokerIn">
							<div class="boxRed">
								<h3>มังกร</h3>
								<h4 id="txnDragonHandValue"></h4>
								<ul>
									<li id="txnDragon1stCard" class="">poker</li>
								</ul>
							</div>
							<div class="boxBlue">
								<h3>เสือ</h3>
								<h4 id="txnTigerHandValue"></h4>
								<ul>
									<li id="txnTiger1stCard" class="">poker</li>
								</ul>
							</div>
						</div>

						<div id="txnGameWinnerSic" class="">
							<div>
								<dl>
									<dt id="txnSicDiceTotal"></dt>
									<dd id="txnSicDiceBigSmall"></dd>
								</dl>
								<ul>
									<li id="txnSicDice1">poker</li>
									<li id="txnSicDice2">poker</li>
									<li id="txnSicDice3">poker</li>
								</ul>
							</div>
						</div>

						<p id="txnGameWinnerBANKER" class="boxRed" style="display: none; width: 200px; text-align:center; line-height: 39px; font-size: 20px;">เจ้ามือชนะ</p>
						<p id="txnGameWinnerPLAYER" class="boxBlue" style="display: none; width: 200px; text-align:center; line-height: 39px; font-size: 20px;">ผู้เล่นชนะ</p>
						<p id="txnGameWinnerTIGER" class="boxBlue" style="display: none; width: 200px; text-align:center; line-height: 39px; font-size: 20px;">เสือชนะ</p>
						<p id="txnGameWinnerDRAGON" class="boxRed" style="display: none; width: 200px; text-align:center; line-height: 39px; font-size: 20px;">มังกรชนะ</p>
						<p id="txnGameWinnerTIE" class="boxGreen" style="display: none; width: 200px; text-align:center; line-height: 39px; font-size: 20px;">เสมอ</p>
					</div>

					<div id="popResultVideoDIV" class="popResult-Video" style="overflow: hidden; display: none">
						<video id="transHistoryVideoReplay" autoplay="autoplay" name="media" muted style="margin-left: -150px; width: 980px">
							<source src="" type="video/mp4" />
							<source src="" type="video/mp4" />
						</video>
						<div id="transHistoryVideoReplayBtnDIV" class="boxVideoPlay" style="display: none;">
							<a id="transHistoryVideoReplayBtn" class="btnResult-VideoStop" href="javascript:void(0)">btnVideoStop</a>
						</div>
						<div id="transHistoryVideoReplayError" class="boxVideoNotice" style="display: none;">
							<p>กำลังอยู่ระหว่างการเตรียมวิดีโอ</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="con">
			<a id="transHistoryHide" href="javascript:void(0)" class="close">close</a>
			<h3>รายงานการทำธุรกรรม</h3>

			<ul class="seach_day">
				<li>
					From
					<input type="text" id="strDate" name="strDate" readonly="readonly"/>
					<select id="strHour" name="strHour"></select>
					<select id="strMin" name="strMin"></select>
				</li>

				<li>
					To
					<input type="text" id="endDate" name="endDate" readonly="readonly"/>
					<select id="endHour" name="endHour"></select>
					<select id="endMin" name="endMin"></select>
				</li>

				<li>
					<input type="button" class="btn" id="search" name="search" value="ค้นหา" />
				</li>

				<li>
					<input type="button" class="quick_btn" id="queryType1" name="queryType1" value="วันนี้" />
					<input type="button" class="quick_btn" id="queryType2" name="queryType2" value="เมื่อวานนี้" />
					<input type="button" class="quick_btn" id="queryType3" name="queryType3" value="อาทิตย์นี้" />
					<input type="button" class="quick_btn" id="queryType4" name="queryType4" value="สัปดาห์ที่แล้ว" />
				</li>
			</ul>

			<div id="transHistoryList" class="trans_liat" style="height: 600px">
				<table>
					<thead>
						<tr>
							<td>หมายเลข</td>
							<td>เวลา</td>
							<td>โต๊ะ</td>
							<td>ชื่อเกมส์</td>
							<td>เกือกม้า</td>
							<td>รอบ</td>
							<td>เดิมพัน</td>
							<td>จำนวน</td>
							<td>ยอดเดิมพันรวม ที่ถูกต้อง</td>
							<td>ชนะ / แพ้</td>
							<td>ผลลัพธ์</td>
							<td>เล่นซ้ำ</td>
						</tr>
						<tr id="transTemplate" style="display: none">
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
								<a></a>
							</td>
						</tr>
					</thead>
					<tbody id="transHistoryTBody">

					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div style="display: none">
		<p id="txnMoreTemplate"></p>
	</div>
</body>
</html>
