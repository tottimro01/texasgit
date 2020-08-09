








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../../../CSS/player/style_one.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../../../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../../js/jquery-ui.1.12.1-min.js"></script>
<script type="text/JavaScript" src="../../../js/util/JSUtil.js?v=2019041710"></script>
<script type="text/JavaScript" src="../../../js/const/Const.js?v=2019041710"></script>
<script type="text/JavaScript" src="../../../js/player/guide.js?v=2019041710"></script>
<script type="text/javascript" src="../../../js/jquery.nicescroll.min-3.7.6.js"></script>
<script type="text/javascript">
var $j = jQuery.noConflict();

$j(document).ready(function() {
	ScrollBarHandler.init("#guide");
	guide.init();
	PageUtil.contentLock();
});
</script>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
</head>
<body>
	<div class="game_guide" style="">
		<ul class="tag">
			<li id="guideTabGame">เสือ มังกร</li>
			<li id="guideTabRoad">ทางแม็พที่สวย</li>
		</ul>

		<div class="con">
			<a id="guideClose" href="javascript:void(0)" class="close">close</a>
			<h2>คู่มือ</h2>
			<div id="guide" class="con_inside">
				<div id="guideGame" style="display: none">
					<h3>วิธีการชนะ</h3>
					<p>
						คุณสามารถเดิมพันได้ว่ามือของเสือหรือมือของมังกรมีแต้มที่สูงขึ้นหรือไม่
					</p>

					<h3>คำแนะนำในการเข้าร่วมและตัวเลือกเดิมพัน</h3>
					<p>
						เลือกจำนวนเงินที่คุณต้องการเดิมพันและลากไปที่ส่วน <span class="banker">Dragon</span> <span class="player">Tiger</span> หรือ 'Tie' ของตารางเกม
					</p>
					<p>
						เจ้ามือจะแจกไพ่2ใบ. ไพ่ทั้ง2ใบจะถูกแจกหน้าหงาย. ใบแรกจะแจกที่<span class="banker">Dragon</span>และใบที่2จะแจกที่<span class="player">Tiger</span>. ด้านไหนที่มีแต้มสูงกว่าชนะ.
					</p>

					<h3>กฎของเกม</h3>
					<ol>
						<li>
							KING แต้มสูงสุด. A แต้มต่ำสุด
						</li>
						<li>
							วัดกันที่แต้มไพ่. แต้มเท่ากันคือ "tie".
						</li>
						<li>
							เจ้ามือจะแจกไพ่ที่ 'Dragon' ก่อนแล้วจะแจกใบที่2ที่ 'Tiger' ด้านไหนที่มีแต้มสูงกว่าชนะ.
						</li>
					</ol>

					<h3>การจ่าย</h3>
					<table>
						<thead>
							<tr>
								<td>เดิมพัน</td>
								<td>การจ่าย</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="banker">Dragon</td>
								<td>1 : 1 (คุณจะเสียเงินครึ่งหนึ่งถ้าแต้มเท่ากัน)</td>
							</tr>
							<tr>
								<td class="player">Tiger</td>
								<td>1 : 1 (คุณจะเสียเงินครึ่งหนึ่งถ้าแต้มเท่ากัน)</td>
							</tr>
							<tr>
								<td class="tie">Tie</td>
								<td>1 : 8</td>
							</tr>
						</tbody>
					</table>

					<h3>เรียน</h3>
					<ol>
						<li>
							การเดิมพันต่ำสุดและสูงสุดจะขึ้นอยู่กับขีดจำกัดของแต่ละโต๊ะ. ผ้เล่นสามารถวางเดิมพันระหวังช่วงเดิมพันที่รวมกันของวงเงินการเล่นต่อโต๊ะและวงเงินเดิมพันส่วนบุคคลของผู้เล่น.กรุณาติดต่อฝ่ายบริการลูกค้าหากคุณต้องการปรับวงเงินเดิมพันส่วนตัวของคุณ.
						</li>
						<li>
							ระบบอาจจะอ่านไพ่ที่แจกออก.ถ้าระบบอ่านไม่ออกเป็นไพ่อะไร เจ้ามือจะทำการสแกนอีกทีเพื่อให้ระบบอ่านไพ่. ถ้าระบบยังไม่สามารถอ่านก็จะยุบการเล่นรอบนี้แล้วเงินเดิมพันจะคืนไปให้ทุกท่าน.
						</li>
						<li>
							ในกรณีที่มีการชำระเงินไม่ถูกต้องการชำระเงินจะได้รับการชำระเงินใหม่ตามผลวิดีโอปัจจุบัน
						</li>
					</ol>
				</div>

				<div id="guideRoad" style="display: none">
					<p>
						"เค้า" คือฟังค์ชั่นใหม่ที่จะคอยแจ้งเตือนผู้เล่นเมื่อ "เค้า"นั้นได้แสดงขึ้นมาในตารางบาคาร่า ทุกๆการแจ้งเตือนนั้นจะแสดงขึ้นตามเวลาจริงและจะทำให้ผู้เล่นสามารถที่จะวางเดิมพันในหน้าจอเกมเดียวกันซึ่งจะช่วยประหยัดเวลาในการเปลี่ยนโต๊ะและป้องกันการเสียโอกาศในการวางเดิมพัน
					</p>

					<h4>โปรดอ่าน</h4>
					<p>
						เมื่อมีการแจ้งเตือน เค้า นั้นจะไม่มีผลกระทบโดยเค้าหลักหรือผลเสมอใดๆที่แสดงขึ้นบนโร๊ดแมพ ฉะนั้นผลเสมอใดๆจะไม่มีผลต่อการแจ้งเตือนเค้า
					</p>

					<div class="good_road_list">
						<dl>
							<dt>เค้าหลัก1</dt>
							<dd>
								ความหมาย: เมื่อมีวงกลมสีน้ำเงินติดกัน4ครั้งหรือมากกว่า
								<img src="../../../images/player/good_road_1_jp.jpg" alt="img" />
							</dd>
						</dl>
						<dl>
							<dt>เค้าหลัก2</dt>
							<dd>
								ความหมาย: เมื่อมีวงกลมสีแดงติดกัน4ครั้งหรือมากกว่า
								<img src="../../../images/player/good_road_2_jp.jpg" alt="img" />
							</dd>
						</dl>
						<dl>
							<dt>เค้าหลัก3</dt>
							<dd>
								ความหมาย: เมื่อแถวที่ติดกันมีวงกลมแดงหรือน้ำเงิน2ครั้งหรือมากกว่า
								<img src="../../../images/player/good_road_3_jp.jpg" alt="img" />
							</dd>
						</dl>
						<dl>
							<dt>เค้าหลัก4</dt>
							<dd>
								แต่ละแถวมี วงกลมสีน้ำเงิน1สีแดง1หรือน้ำเงิน1แดง1เท่ากัน
								<img src="../../../images/player/good_road_4_jp.jpg" alt="img" />
							</dd>
						</dl>
						<dl>
							<dt>เค้าหลัก5</dt>
							<dd>
								มีสีน้ำเงิน1สีแดง2ติดต่อกัน
								<img src="../../../images/player/good_road_5_jp.jpg" alt="img" />
							</dd>
						</dl>
						<dl>
							<dt>เค้าหลัก6</dt>
							<dd>
								มี สำน้ำเงิน1สีน้ำเงิน2ติดต่อกัน
								<img src="../../../images/player/good_road_6_jp.jpg" alt="img" />
							</dd>
						</dl>
						<dl>
							<dt>เค้าหลัก7</dt>
							<dd>
								มีสีน้ำเงิน,สีแดง,สีน้ำเงิน2,จากนั้นสีแดง1ติดต่อกัน
								<img src="../../../images/player/good_road_7_jp.jpg" alt="img" />
							</dd>
						</dl>
						<dl>
							<dt>เค้าหลัก8</dt>
							<dd>
								มีสีแดง2,สีน้ำเงิน1สีน้ำจากนั้นสีน้ำเงิน2ติดต่อกัน
								<img src="../../../images/player/good_road_8_jp.jpg" alt="img" />
							</dd>
						</dl>
						<dl>
							<dt>เค้าหลัก9</dt>
							<dd>
								สีน้ำเงิน1ถูกแยกโดยสีแดงแบบสุ่มจากนั้นก็มีสีน้ำเงินขึ้นมาอีก2ครั้งหรือมากกว่า โดยต้องเกิดขึ้นสองครั้งเป็นอย่างน้อย
								<img src="../../../images/player/good_road_9_jp.jpg" alt="img" />
							</dd>
						</dl>
						<dl>
							<dt>เค้าหลัก10</dt>
							<dd>
								สีแดง1ถูกแยกโดยสีน้ำเงินแบบสุ่มจากนั้นก็มีสีแดง2ครั้งหรือมากกว่า, โดยที่ต้องมีแบบอย่างน้อย2ครั้ง
								<img src="../../../images/player/good_road_10_jp.jpg" alt="img" />
							</dd>
						</dl>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

