








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
			<li id="guideTabGame">ปลา-กุ้ง-ปู คลาสสิก</li>
			<li id="guideTabRoad" style="display: none;">Good Road</li>
		</ul>

		<div class="con">
			<a id="guideClose" href="javascript:void(0)" class="close">close</a>
			<h2>คู่มือ</h2>
			<div id="guide" class="con_inside">
				<div id="guideGame" style="display: none">
					<h3>รายละเอียดเกม</h3>
					<p>
						น้ำเต้าปูปลาคือเกมคาสิโนที่เป็นที่คุ้นเคยในทางตอนใต้ของประเทศจีน 
						หลักๆแล้วกประเภทการเดิมพันและราคานั้นจะเหมือนกับเกมไฮโล แต่จะใช้เป็นสัญลักษณ์ ของ 
						ปลา,กุ้ง,ปู,กวาง,ไก่,และน้ำเต้าแทนที่ตัวเลขบนลูกเต๋า แต้มของแต่ลสัญลักษณ์นั้นได้ถูกอธิบายไว้ตามตารางด่านล่างนี้
					</p>

					<table>
						<thead>
							<tr>
								<td>สัญลักษณ์</td>
								<td>แต้ม</td>
								<td>สัญลักษณ์</td>
								<td>แต้ม</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td align="center"><img src="../../../images/fish_prawn_crab-web/dice-deer.png" style="width: 70px; height: 70px" alt="img" /></td>
								<td>1</td>
								<td align="center"><img src="../../../images/fish_prawn_crab-web/dice-gourd.png" style="width: 70px; height: 70px" alt="img" /></td>
								<td>2</td>
							</tr>
							<tr>
								<td align="center"><img src="../../../images/fish_prawn_crab-web/dice-chicken.png" style="width: 70px; height: 70px" alt="img" /></td>
								<td>3</td>
								<td align="center"><img src="../../../images/fish_prawn_crab-web/dice-prawn.png" style="width: 70px; height: 70px" alt="img" /></td>
								<td>4</td>
							</tr>
							<tr>
								<td align="center"><img src="../../../images/fish_prawn_crab-web/dice-crab.png" style="width: 70px; height: 70px" alt="img" /></td>
								<td>5</td>
								<td align="center"><img src="../../../images/fish_prawn_crab-web/dice-fish.png" style="width: 70px; height: 70px" alt="img" /></td>
								<td>6</td>
							</tr>
						</tbody>
					</table>
					<p>การเดิมพันมีหลากหลายรูปแบบ และ ผู้เล่นสามารถที่จะวางเดิมพันได้หลายแบบในรอบเดียว</p>

					<h3>สูงต่ำ</h3>
					<p>
						การแทงสูงนั้นจะต้องมีจำนวนแต้มรวมกันเป็น 11 ถึง 17 
						การแทงต่ำนั้นจะต้องมีจำนวนแต้มรวมกันเป็น 4 ถึง 10
						ทั้งหมดนี้จะไม่รวมผลที่ออกรวมเป็น 3 หรือ 18 แต้ม และ ในกรณีที่ลูกเต๋าทั้ง 3 ออกมาเป็นเลขเดียวกันทั้งหมด การแทงสูงและต่ำเจ้ามือจะถือเป็นผู้ชนะ
					</p>

					<h3>เลขเดียว</h3>
					<p>
						เต๋าหนึ่งลูก
						การแทงเต๋าหนึ่งลูกคือการทายเลขที่จะออกมาบนลูกเต๋าหนึ่งลูก
					</p>

					<h3>ออกแต้มสองในสาม</h3>
					<p>
						โต๊ดเลข
						ผู้เล่นสามารถเลือกแทงแต้มรวมของลูกเต๋า2ลูกได้ทั้งหมดกว่า15ผลรวม ผลของการแทงจะถูกนับจากลูกเต๋า 2ลูกไหนก็ได้ใน3ลูก
					</p>

					<h3>รวมแต้ม</h3>
					<p>
						ผู้เล่นสามารถเลือกแทงเป็นแต้มรวมของลูกเต๋าทั้ง3ลูกได้ โดยที่ไม่รวมเลขตอง
					</p>

					<h3>คู่เฉพาะ</h3>
					<p>
						ผู้เล่นจะชนะเมื่อลูกเต๋าสองลูกมีเลขตรงเหมือนกับที่ผู้เล่นแทง
					</p>

					<h3>ตองรวม</h3>
					<p>
						ผู้เล่นจะชนะการเดิมพันนี้ ถ้าลูกเต๋าทั้ง3ลูกออกเลขเดียวกันไม่ว่าจะเป็นเลขใดก็ตาม
					</p>

					<h3>ตองเฉพาะ</h3>
					<p>
						ผู้เล่นสามารถเดิมพันเลขตองได้ เช่นถ้าแทงตอง 5  ผู้เล่นจะชนะการเดิมพันเมื่อลูกเต๋าออก 5 ทั้ง 3ลูก
					</p>

					<h3>การจ่ายเงินเกม</h3>
					<table>
						<thead>
							<tr>
								<td>ประเภท</td>
								<td>รายละเอียด</td>
								<td>อัตราจ่าย</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="3">การจ่ายผลรวมแต้ม</td>
							</tr>
							<tr>
								<td>สู</td>
								<td>แต้มรวม 11ถึง17ไม่รับเลขตอง</td>
								<td>1:1</td>
							</tr>
							<tr>
								<td>ต่ำ</td>
								<td>แต้มรวม4ถึง10ไม่นับเลขตอง</td>
								<td>1:1</td>
							</tr>
							<tr>
								<td>4 หรือ 17</td>
								<td>แต้มรวม 4 หรือ17</td>
								<td>1:50</td>
							</tr>
							<tr>
								<td>5 หรือ 16</td>
								<td>แต้มรวม  5 หรือ16</td>
								<td>1:18</td>
							</tr>
							<tr>
								<td>6 หรือ 15</td>
								<td>แต้มรวม  6 หรือ15</td>
								<td>1:14</td>
							</tr>
							<tr>
								<td>7 หรือ 14</td>
								<td>แต้มรวม 7 หรือ 14</td>
								<td>1:12</td>
							</tr>
							<tr>
								<td>8 หรือ 13</td>
								<td>แต้มรวม 8 หรือ 13</td>
								<td>1:8</td>
							</tr>
							<tr>
								<td>9 / 10 / 11 / 12</td>
								<td>แต้มรวม 9 หรือ 10 หรือ 11 หรือ 12</td>
								<td>1:6</td>
							</tr>
							<tr>
								<td colspan="3">การจ่ายแบบกลุ่ม</td>
							</tr>
							<tr>
								<td>ตองเฉพาะ</td>
								<td>ผลลูกเต๋าออกเป็นเลขตองที่ผู้เล่นเลือกโดยเฉพาะ</td>
								<td>1:150</td>
							</tr>
							<tr>
								<td>ตองรวม</td>
								<td>ผลลูกเต๋าออกเป็นเลขตองเลขใดก็ได้</td>
								<td>1:24</td>
							</tr>
							<tr>
								<td>คู่เฉพาะ</td>
								<td>ผลลูกเต๋าสองลูกออกมามีเลขเหมือนกันตามที่ผู้เล่นเลือกโดยเฉพาะ</td>
								<td>1:8</td>
							</tr>
							<tr>
								<td>โต๊ดเลข</td>
								<td>ผู้เล่นสามารถเลือกได้สองตัวเลขโดยที่ลูกเต๋าสองลูกต้องออกเป็นเลขนี้</td>
								<td>1:5</td>
							</tr>
							<tr>
								<td>เต๋าเดียว</td>
								<td>เต๋าเดียวผลออกเลขที่ผู้เล่นเลือก</td>
								<td>1:1</td>
							</tr>
							<tr>
								<td>สองเต๋า</td>
								<td>เต๋าสองลูกผลออกเลขที่ผู้เล่นเลือก</td>
								<td>1:2</td>
							</tr>
							<tr>
								<td>สามเต๋า </td>
								<td>เต๋าสามลูกผลออกเลขที่ผู้เล่นเลือก</td>
								<td>1:3</td>
							</tr>
						</tbody>
					</table>

					<h3>กฎของเกม</h3>
					<ol>
						<li>
							ในกรณีที่ลูกเต๋าเกิดทับซ้อนกันหรือไม่หงายหลังอยู่บนพื้นของที่เขย่า, เกมนั้นจะถูกถือว่าเป็นโมฆะและเกมใหม่จะถูกเริ่มต้นขึ้นแทน
						</li>
						<li>
							ในกรณีที่เครื่องมืออุปกรณ์ขัดข้อง,เกมนั้นจะถูกถือให้เป็นโมฆะ
						</li>
						<li>
							เนื่องจากเกมนี้จะถูกถ่ายทอดสดเอาไว้ , โปรดให้อภัยในความผิดพลาดใดๆที่อาจเกิดขึ้น
						</li>
					</ol>
				</div>

				<div id="guideRoad" style="display: none">
				</div>
			</div>
		</div>
	</div>
</body>
</html>

