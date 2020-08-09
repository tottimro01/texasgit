<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require("lang/variable_lang.php");
// require("lang/member_lang.php");
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CONFIG</title>
<link rel="stylesheet" type="text/css" href="css/style.css?v=2019">
<? if($_SESSION['lang']=="mm"){?><link rel="stylesheet" type="text/css" href="css/style_mm.css?v=2019"><? }?>
<link href="css/table_w.css" rel="stylesheet" type="text/css">
<link href="css/infocss.css" rel="stylesheet" type="text/css">
<link href="css/button.css" rel="stylesheet" type="text/css">
<link href="jsui/jquery-ui.css?v=0001" rel="stylesheet">
<script src="jsui/external/jquery/jquery.js?v=2019"></script>
<script src="jsui/jquery-ui.js?v=2019"></script>
<script>
$(function() {
    $( ".datepicker" ).datepicker({
      showOn: "button",
      buttonImage: "img/calendar.png",
      buttonImageOnly: true,
      buttonText: "Select date",
	  dateFormat:"dd/mm/yy"
    });
  });
  </script>
<script>
var fw;
$(document).ready(function() {
	 to_width(<?=$_GET["vvw"]?>);
});
function to_width(ty){
	if(ty==1){
		$("#main_left").width(975);
		fw = 1;
	}else{
		$("#main_left").width(770);
		fw = 0;
	}
}
</script>
</head>

<body>
<div id="main_left" style="overflow:visible;" class="df_grenralRules">
<div id="title_page">
    <div id="ic_title">&gt;</div>
    <span id="stitle">กฎกติกาและระเบียบข้อบังคับการเดิมพัน</span>
  </div>
  <div class="information_text termsList">
  <p>บางเหตุการณ์และตลาดมีกฎกติกาที่แตกต่างกันดังระบุระบุข้างล่างในกฎกติกาการเดิมพันในเหตุการณ์/ตลาดเฉพาะสำหรับแต่ละประเภทการเดิมพัน/เหตุการณ์หรือการตลาดเฉพาะในเว็บไซต์นี้ สิ่งต่อไปนี้คือกฎกติการเดิมพันทั่วไปที่ใช้กับเหตุการณ์และตลาด/ประเภทการเดิมพันทั้้งหมดและต้องปฏิบัติตามกฎอย่างเคร่งครัด เมื่อทำได้ิบทบัญญัติและคำจำกัดความที่กำหนดในข้อกำหนดและเงื่อนไขที่เผยแพร่ในเว็บไซต์จะบังคับใช้กับกฎกติกาและระเบียบข้อบังคับการเดิมพันเหล่านี้ </p>
  <h1><a name="R1" id="R1"></a>1. กฎกติกาและระเบียบข้อบังคับการเดิมพันทั่วไป</h1>
  <!-- 1.1 -->
  <h2><a name="R11" id="R11"></a>1.1. ทั่วไป</h2>
  <h3><strong>1.1.1.</strong><span>
  ข้อมูลการเดิมพันทั้งหมดที่จัดไว้ให้โดยบริษัทกระทำโดยสุจริต อย่างไรก็ตาม บริษัทไม่สามารถยอมรับผิดต่อข้อผิดพลาดหรือการละเว้นด้านวันที่ เวลา สถานที่ คู่แข่งขัน แต้มต่อ ผลลัพธ์ สถิติ ชุดแข่งขัน (ที่แสดงขณะถ่ายทอดสด) หรือข้อมูลการเดิมพันอื่นๆ บริษัทขอสงวนสิทธิ์ในการแก้ไขข้อผิดพลาดที่ชัดเจนใดๆ และจะดำเนินการตามขั้นตอนที่สมเหตุผลทั้งหมดเพื่อให้มั่นใจได้ว่าตลาดได้รับการจัดการด้วยความซื่อตรงและโปร่งใส  บริษัทขอสงวนสิทธิ์ในการทำการตัดสินใจขั้นสุดท้าย </span></h3>
  <h3><strong>1.1.2.</strong><span>
  ถ้าเหตุการณ์เริ่มต้นก่อนเวลาที่กำหนด เฉพาะการเดิมพันที่วางก่อนการเริ่มต้นเหตุการณ์ (ไม่รวมการเดิมพันสดที่ระบุ) เท่านั้นที่จะถือว่ามีผลสมบูรณ์ ถ้าตลาดไม่ปิดหรือถูกระงับตามเวลา ที่ถูกต้องแล้ว บริษัทขอสงวนสิทธิ์ที่จะ ยกเลิก การเดิมพันทั้งหมด ที่วางหลังจากเวลาเริ่มต้นจริง (ไม่รวมการเดิมพัน สดที่ระบุ)</span></h3>
  <h3><strong>1.1.3.</strong><span>
  ในกรณีที่ชื่อภาษาอังกฤษกับชื่อที่เป็นภาษาอื่นซึ่งใช้สำหรับการแข่งขันหรือทีมที่ปรากฏบนเว็บไซต์ไม่ตรงกัน ให้ยึดตามภาษาอังกฤษเป็นหลัก </span></h3>
  <h3><strong>1.1.4.</strong><span>
  At all times, it is the customer's responsibility to be aware about the match score and all relevant match information and it is advised that the customer verify match status before placing a bet. </span></h3>
  <h3><strong>1.1.5.</strong><span>
  บริษัทขอสงวนสิทธิ์ในการแก้ไขกฎกติกาเหล่านี้ได้ทุกเมื่อ การแก้ไขดังกล่าวจะผูกมัดและมีผลใช้ทันทีเมื่อลงประกาศในเว็บไซต์</span></h3>
  <h3><strong>1.1.6.</strong><span>
  The customer acknowledges that the current score, time elapsed and other data provided on this site, while coming from a "live" feed provided by a third party is subject to a time delay and/or may be inaccurate, and that any bet placed based on this data is entirely at the customer’s own risk. The Company provides this data as-is with no warranty as to the accuracy, completeness or timeliness of such data and accepts no responsibility for any loss (direct or indirect) suffered by the customer as a result of his reliance on it.</span></h3>
  <div id="1-1" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <!-- 1.2 -->
  <h2><a name="R12" id="R12"></a>1.2. การยกเลิกและการเลื่อนกำหนด</h2>
  <h3><strong>1.2.1.</strong><span>
  ถ้าเหตุการณ์ไม่ได้เริ่มต้นในวันที่เริ่มต้นที่กำหนดและไม่จบลงภายในสามวันของวันที่เสร็จสิ้นตามกำหนดเดิมแล้ว การเดิมพันทั้งหมดจะเป็นโมฆะ ยกเว้นสำหรับการเดิมพันในตลาดที่มีการกำหนดแบบไม่มีเงื่อนไข </span></h3>
  <h3><strong>1.2.2.</strong><span>
  ถ้าการแข่งขันเริ่มต้นแต่ถูกยกเลิกในภายหลัง และไม่จบลงภายในสามวัน ของวันที่เสร็จสิ้นตามกำหนดเดิมแล้ว การเดิมพันทั้งหมดจะเป็นโมฆะ ยกเว้นสำหรับการเดิมพันในตลาดที่มีการกำหนดแบบไม่มีเงื่อนไข </span></h3>
  <h3><strong>1.2.3.</strong><span>
  ถ้าการแข่งขันไม่เสร็จสิ้นภายในเวลาที่กำหนดไว้แต่แรก ดังที่ระบุไว้ในกติกาการแข่งขันกีฬาที่เฉพาะเจาะจง แต่ผลลัพธ์อย่างเป็นทางการได้ถูกประกาศหรือผลลัพธ์ได้ถูกประกาศโดยหน่วยงานควบคุมการแข่งขันนั้นๆ บริษัทขอสงวนสิทธิ์ที่จะพิจารณาว่าการแข่งขันนั้นมีผลสมบูรณ์อย่างเป็นทางการ  การตัดสินใจของบริษัทถือเป็นที่สุดและมีผลผูกพันตามนี้</span></h3>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <!-- 1.3 -->
  <h2><a name="R13" id="R13"></a>1.3. Change of Venue</h2>
  <h3><strong>1.3.1.</strong><span>
  ถ้านัดการแข่งขันถูกกำหนดไว้แล้วว่าจะเล่นบนสนามกลาง แต่เมื่อเล่นจริงเป็นสนามที่ไม่ใช่สนามกลาง หรือในกรณีกลับกันก็ตามแต่ จะถือว่าการเดิมพันยังคงความถูกต้องอยู่ ยกเว้นจะมีการระบุเป็นอย่างอื่น   ในกรณีที่มีการเปลี่ยนแปลงสถานที่แข่งขันซึ่งทีมเจ้าบ้านต้องไปเล่นในที่อื่น หรือในกรณีกลับกันก็ตามแต่ การเดิมพันทั้งหมดจะถือว่าเป็นโมฆะ การเดิมพันจะถือว่าเป็นโมฆะด้วยเช่นกัน ถ้าชื่อทีมเจ้าบ้านและทีมผู้มาเยือนถูกระบุสลับกัน</span></h3>
  <h3><strong>1.3.2.</strong><span>
  สำหรับเหตุการณ์ที่ไม่ใช่ทีม ถ้ามีการเปลี่ยนแปลงสถานที่ซึ่งได้กำหนดไว้ภายหลังจากที่เปิดตลาดแล้ว จะถือว่าการเดิมพันทั้งหมดยังคงถูกต้องอยู่</span></h3>
  <div id="1-3" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <!-- 1.4 -->
  <h2><a name="R14" id="R14"></a>1.4. ระยะเวลา</h2>
  <h3><strong>1.4.1.</strong><span>
  ระยะเวลาของกิจกรรมตามที่ระบุ มีไว้เพื่อจุดประสงค์การอ้างอิงเท่านั้น การเดิมพันจะยังใช้ได้อยู่ แม้ระยะเวลาที่กำหนดจะเปลี่ยนแปลงไป</span></h3>
  <h3><strong>1.4.2.</strong><span>
  สิ่งที่เกิดขึ้นระหว่างการบาดเจ็บหรือการหยุดเวลาเล่น ให้ถือว่าเกิดขึ้น เมื่อสิ้นสุดเวลาปกติ ตัวอย่างเช่น ประตูที่ยิงได้ในเวลาบาดเจ็บของครึ่งแรก ของการแข่งขันฟุตบอลให้ถือว่าทำ้ประตูได้ที่ 45 นาที</span></h3>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <!-- 1.5 -->
  <h2><a name="R15" id="R15"></a>1.5. ผลการแข่งขัน</h2>
  <h3><strong>1.5.1.</strong><span>
  เมื่อใช้ได้ ผู้ชนะบนแท่นจะถือว่าเป็นผลการแข่งขันอย่างเป็นทางการ โดยไม่คำนึงถึงการขาดคุณสมบัติหรือแก้ไขผลการแข่งขันในภายหลัง ถ้าไม่มีผู้ชนะบนแท่น ผลการแข่งขันจะเป็นไปตามผลการแข่งขัน อย่างเป็นทางการขององค์กรควบคุมที่เกี่ยวข้องเมื่อมีการตัดสินของตลาด โดยไม่คำนึงถึงการขาดคุณสมบัติหรือแก้ไขผลการแข่งขันในภายหลัง ถ้าไม่มีผลการแข่งขันอย่างเป็นทางการอยู่ ผลการแข่งขันจะถูกกำหนด โดยการอ้างอิงถึงหลักฐานที่มีซึ่งทราบได้เมื่อมีการยุติตลาด </span></h3>
  <h3><strong>1.5.2.</strong><span>
  โดยทั่วไปจะมีการยุติในไม่ช้าหลังจากจบเหตุการณ์ เพื่อเป็นการ บริการลูกค้า บางตลาดอาจจะยุติก่อนผลการแข่งขัน อย่างเป็นทางการ จะถูกประกาศ บริษัทขอสงวนสิทธิ์ที่จะกลับการยุติเหตุการณ์ของ ตลาดที่มีการตัดสินผิดพลาด</span></h3>
  <h3><strong>1.5.3.</strong><span>
  ในกรณีที่มีความไม่แน่นอนของผลลัพธ์ บริษัทฯ ขอสงวนสิทธิ์ในการระงับการจ่ายเงินของตลาดนั้น ๆ</span></h3>
  <h3><strong>1.5.4.</strong><span>
  บริษัทจะไม่รับรู้การแก้ไขหรือการเปลี่ยนแปลงใดๆ ที่มีต่อผล การแข่งขัน ที่เกิดขึ้น 72 ชั่วโมงหลังจากเวลาเริ่มต้นของเหตุการณ์ สำหรับการเดิมพัน ที่ได้ยุติแล้ว</span></h3>
  <h3><strong>1.5.5.</strong><span>
  หากมีความขัดแย้งระหว่างผลลัพธ์อย่างเป็นทางการกับผลลัพธ์ที่ประกาศบนส่วนผลลัพธ์ของเว็บไซต์ของบริษัท ให้ยุติความขัดแย้งนั้นโดยการอ้างอิงถึงวิดีโอที่บริษัทบันทึกไว้เกี่ยวกับการแข่งขันนั้นๆ เพื่อตัดสินผลลัพธ์ที่ถูกต้อง อย่างไรก็ตาม ถ้าไม่มีการบันทึกวิดีโอไว้ ให้ตัดสินผลลัพธ์ที่ถูกต้องตามผลลัพธ์การแข่งขันที่หน่วยงานซึ่งเป็นผู้ควบคุมการแข่งขันดังกล่าว ประกาศไว้บนเว็บไซต์อย่างเป็นทางการของตน  ถ้าเว็บไซต์อย่างเป็นทางการไม่สามารถแสดงผลลัพธ์ หรือผลลัพธ์ที่ประกาศไว้อย่างเป็นทางการไม่ถูกต้องอย่างชัดเจน บริษัทขอสงวนสิทธิ์ที่จะเป็นผู้ทำการตัดสินใจ/แก้ไขเพื่อตัดสินผลลัพธ์ขั้นสุดท้าย  การตัดสินใจของบริษัทถือเป็นที่สุดและมีผลผูกพันตามนี้</span></h3>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  
  <h2><a name="R16" id="R16"></a>1.6. Auto Timer Acceptance</h2>
  <h3><strong>1.6.1.</strong><span>
  For certain events as may be determined by the Company, a customer may place a bet using Timer Acceptance feature by selecting the “Timer Accept” button on the menu.  Each bet placed using timer acceptance will have its own countdown timer, the duration of which will be at the sole and exclusive determination of the Company.  At the end of the timer, without any of the disruptions mentioned in Section 1.6.2 below happening, the bet will be accepted.</span></h3>
  <h3><strong>1.6.2.</strong><span>
  If any of the disruptions mentioned in this Section happen before the countdown timer ends, all bets placed using Timer Acceptance are immediately void:</span></h3>
  <h4><strong>1.6.2.1.</strong><span>
  If there appears to be a possible red card or a red card is actually given;</span></h4>
  <h4><strong>1.6.2.2.</strong><span>
  If there is a possible penalty or a penalty is given;</span></h4>
  <h4><strong>1.6.2.3.</strong><span>
  If there appears to be a possible goal or a goal is scored by any team;</span></h4>
  <h4><strong>1.6.2.4.</strong><span>
  Fortuitous events including, but not limited to, failure in any equipment or telecommunication that prevents the correct placing, accepting, recording or notification of bets, delays or interruptions in operation or transmission, communication lines failure.</span></h4>
  <h3><strong>1.6.3.</strong><span>
  In using the Timer Acceptance feature, the customer acknowledges that the current score, time elapsed and other data provided on this site, while coming from a "live" feed provided by a third party is subject to a time delay and/or may be inaccurate, and that any bet placed based on this data is entirely at the customer’s own risk. The Company provides this data as-is with no warranty as to the accuracy, completeness or timeliness of such data and accepts no responsibility for any loss (direct or indirect) suffered by the customer as a result of his reliance on it.</span></h3>  
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  
  <h2><a name="R17" id="R17"></a>1.7. การจ่ายเงินรางวัลสูงสุดสำหรับการเล่นพนันชุด</h2>
  <h3><strong>1.7.1.</strong><span>
  การจ่ายเงินรางวัลสูงสุดต่อวันสำหรับการเล่นพนันชุดมีดังต่อไปนี้:</span></h3>
  <h4 class="style3">ฟุตบอล: 200,000 ริงกิตมาเลเซีย<br>
    บาสเกตบอล NBAl: 200,000 ริงกิตมาเลเซีย<br>
    เทนนิส: 100,000 ริงกิตมาเลเซีย<br>
    กีฬาอื่นๆ: 50,000 ริงกิตมาเลเซีย<br>
    ในกรณีที่มีการเล่นพนันชุดโดยที่ภายในชุดมีการทายผลกีฬาหลายประเภทที่มีขีดจำกัดการจ่ายเงินรางวัลสูงสุดต่อวันต่างกัน จะยึดเอาขีดจำกัดการจ่ายเงินรางวัลสูงสุดต่อวันที่ต่ำที่สุดเป็นหลัก<br>
  </h4>
  <h3><strong>1.7.2.</strong><span>
  ขีดจำกัดการจ่ายเงินรางวัลสูงสุดทั้งหมดยังมีผลต่อกลุ่มของลูกค้าที่มีพฤติกรรมการดำเนินการร่วมกัน มีการวางแผนการดำเนินการร่วมกัน หรือการรวมกลุ่มกัน และลูกค้าที่เลือกเดิมพันในชุดกีฬาที่ประกอบด้วยกีฬามีการแข่งขันในหลายวันด้วย</span></h3>
  <h3><strong>1.7.3.</strong><span>
  ในกรณีที่บริษัทมีเหตุผลที่น่าเชื่อถือว่ามีการวางเดิมพันในรูปแบบตามที่อธิบายในข้อที่ผ่านมา การจ่ายเงินรางวัลสุทธิสูงสุดจะจำกัดอยู่เพียงเทียบเท่ากับยอดการจ่ายเงินรางวัลสูงสุดสำหรับการวางเดิมพันหนึ่งครั้ง โดยจะจ่ายเงินรางวัลให้กับบัญชีของลูกค้าที่วางเดิมพันในชุดตัวเลือกการเล่นพนันชุดดังกล่าวเป็นคนแรก </span></h3>
  <div id="Div7" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  
  <h1><a name="R2" id="R2"></a>2. กฎกติกาของตลาด (ประเภทการเดิมพัน)  กฎกติกาทั่วไป</h1>
  <!-- 1.1 -->
  <h2><a name="R21" id="R21"></a>2.1. ทั่วไป</h2>
  <h3><strong>2.1.1.</strong><span>
  เอาท์ไรท์</span></h3>
  <h4><strong>2.1.1.1.</strong><span>
  เอาท์ไรท์ หมายถึง การเดิมพันผู้ชนะเหตุการณ์ การแข่งขัน หรือทัวร์นาเมนท์</span></h4>
  <h4><strong>2.1.1.2.</strong><span>
  การวางเอาท์ไรท์ หมายถึง การเดิมพันคู่แข่งขันที่ได้ตำแหน่ง ที่ระบุในเหตุการณ์ การแข่งขันหรือทัวร์นาเมนท์ ลำดับที่ของตำแหน่ง ที่ถูกจ่ายในฐานะของผู้ชนะจะระบุไว้ในหัวข้อเรื่องตลาด </span></h4>
  <h4><strong>2.1.1.3.</strong><span>
  ถ้าผู้แข่งขัน/ผู้เล่นไม่เริ่มต้นเหตุการณ์ การแข่งขัน หรือทัวร์นาเมนต์ การเดิมพันทั้งหมดที่ผู้แข่งขัน/ผู้เล่นดังกล่าวจะเป็นโมฆะ ยกเว้นในกรณีที่ได้มีการระบุไว้เป็นอย่างอื่นในกติกาการเดิมพันกีฬาที่เฉพาะเจาะจง</span></h4>
  <h4><strong>2.1.1.4.</strong><span>
  หากมีผู้ชนะตั้งแต่สองคนขึ้นไป หรือมีการประกาศ “เดดฮีท” ในตลาดเอาท์ไรท์ จำนวนเงินที่จะจ่าย (หลังหักเงินเดิมพัน) จะแบ่งตามจำนวนผู้ชนะและตัดสินตามเงินเดิมพันที่ได้รับคืน</span></h4>
  <h4><strong>2.1.1.5.</strong><span>
  คำว่า “ผู้เล่นอื่นใด” (เช่น ทีมใดก็ตาม) หมายถึง คู่แข่งทั้งหมดที่ไม่ได้ระบุชื่อไว้ในตลาด</span></h4>
  <h3><strong>2.1.2.</strong><span>
  มันนี่ไลน์</span></h3>
  <h4><strong>2.1.2.1</strong><span>
  มันนี่ไลน์ หมายถึง การเดิมพันคู่แข่งขันหนึ่งคนหรือหนึ่งทีมที่เอาชนะกันในเหตุการณ์ หรือเพื่อให้ได้ตำแหน่งสูงขึ้นในเหตุการณ์แข่งขันแบบจับคู่ กฎเกี่ยวกับ มันนี่ไลน์ที่เหลือระบุอยู่ในกฎกติกาการเดิมพันในเหตุการณ์เฉพาะ </span></h4>
  <h4><strong>2.1.2.2.</strong><span>
  คำว่า “สนาม” หมายถึง คู่แข่งทั้งหมดนอกเหนือจากคู่แข่งที่ได้ระบุชื่อไว้ในการจับคู่การแข่งขันบนมันนี่ไลน์ </span></h4>
  <h3><strong>2.1.3.</strong><span>
  แฮนดิแคป (HDP) และแฮนดิแคปครึ่งแรก</span> </h3>
  <h4><strong>2.1.3.1.</strong><span>
  แฮนดิแคป หมายถึง การเดิมพันเมื่อผู้แข่งขันหรือทีมได้รับแต้มต่อ (นำโดยแต้มต่อนั้นก่อนเหตุการณ์จะเริ่มต้น) ผู้ชนะคือคู่แข่งขัน หรือทีมที่มีคะแนนดีกว่าหลังจากรวมแฮนดิแคปที่ระบุในผลการแข่งขัน กฎแฮนดิแคปที่เหลือระบุอยู่ในกฎกติกาการเดิมพันเหตุการณ์เฉพาะ</span></h4>
  <h4><strong>2.1.3.2.</strong><span>
  แฮนดิแคปครึ่งแรก หมายถึง การเดิมพันว่าทีมใดจะมีคะแนนดีกว่า หลังจากที่เพิ่มแฮนดิแคปนั้นเข้าสู่ผลลัพธ์ในครึ่งแรกของการแข่งขัน</span></h4>
  <h3><strong>2.1.4.</strong><span>
  สูง/ตํ่า (OU) และสูง/ตํ่าครึ่งแรก</span></h3>
  <h4><strong>2.1.4.1.</strong><span>
  สูง/ต่ำ หมายถึง การเดิมพันที่กำหนดโดยผลคะแนนรวมทั้งหมด (ประตู เกมส์ เป็นต้น) ในผลการตัดสินสุดท้ายของเหตุการณ์ ถ้าผลรวมมากกว่า เส้นสูง/ต่ำที่กำหนดไว้ล่วงหน้า ผลชนะเลิศคือสูง ถ้าผลรวมน้อยกว่า เส้นสูง/ต่ำที่กำหนดไว้ล่วงหน้า ผลชนะเลิศคือต่ำ</span></h4>
  <h4><strong>2.1.4.2.</strong><span>
  สูง/ตํ่าครึ่งแรก หมายถึง การเดิมพันที่จำนวนคะแนนรวมจากผลลัพธ์ของการแข่งขันครึ่งแรก ถ้าจำนวนรวมมีมากกว่าค่าสูง/ตํ่าที่กำหนดไว้ ผลลัพธ์ที่ถือว่าชนะคือสูง (Over) แต่ถ้าจำนวนรวมมีน้อยกว่าค่าสูง/ตํ่าที่กำหนดไว้ ผลลัพธ์ที่ถือว่าชนะคือตํ่า (Under)</span></h4>
  <h3><strong>2.1.5.</strong><span>
  คี่/คู่ (OE) และคี่/คู่ครึ่งแรก</span></h3>
  <h4><strong>2.1.5.1.</strong><span>
  คี่/คู่ หมายถึง การเดิมพันที่กำหนดโดยผลคะแนนรวมทั้งหมด (ประตู เกมส์ เป็นต้น) ในผลการตัดสินสุดท้ายของเหตุการณ์ว่าเป็นคี่หรือคู่</span></h4>
  <h4><strong>2.1.5.2.</strong><span>
   คี่/คู่ครึ่งแรก หมายถึง การเดิมพันที่จำนวนคะแนนรวมเมื่อสิ้นสุดครึ่งแรกของการแข่งขัน ว่าเป็นจำนวนคี่หรือจำนวนคู่</span></h4>
  <h4><strong>2.1.5.3.</strong><span>
  การเดิมพันครึ่งแรกจะเป็นโมฆะหากการแข่งขันถูกยกเลิกก่อนที่ครึ่งแรกนั้นจะสิ้นสุดลง แต่ถ้าการแข่งขันถูกยกเลิกหลังจากที่ครึ่งแรกสิ้นสุดลงแล้ว การเดิมพันครึ่งแรกทั้งหมดจะยังใช้ได้อยู่</span></h4>
  <h3><strong>2.1.6.</strong><span>
  คู่/คี่ของทีมเดี่ยว</span></h3>
  <h4><strong>2.1.6.1.</strong><span>
  คู่/คี่ของทีมเดี่ยว หมายถึง การเดิมพันเพื่อทายว่าคะแนนเต็มเวลาของทีมใดทีมหนึ่งในนัดการแข่งขันจะเป็นเลขคู่หรือเลขคี่</span></h4>
  <h4><strong>2.1.6.2.</strong><span>
  การเพิ่มเวลาพิเศษของนัดการแข่งขันจะไม่ถูกนับรวมเพื่อใช้พิจารณาคะแนนเต็มเวลาของทีมใดทีมหนึ่ง</span></h4>
  <h3><strong>2.1.7.</strong><span>
  คู่/คี่ ครึ่งเวลา/เต็มเวลาของนัดการแข่งขัน</span></h3>
  <h4><strong>2.1.7.1.</strong><span>
  คู่/คี่ ครึ่งเวลา/เต็มเวลาของนัดการแข่งขัน หมายถึง การเดิมพันว่าผลลัพธ์ครึ่งเวลาและผลลัพธ์เต็มเวลาของนัดการแข่งขันจะเป็นแบบคี่และคี่ คี่และคู่ คู่และคี่ หรือคู่และคู่</span></h4>
  <h4><strong>2.1.7.2.</strong><span>
  สามารถเดิมพันได้สี่ (4) ทางเลือกคือ:</span></h4>
  <h5 class="style1">
  	<ol><li>คี่/คี่</li>
      <li>คี่/คู่</li>
      <li>คู่/คี่</li>
      <li>คู่/คู่</li>
  	</ol>
  </h5>	
  <h4><strong>2.1.7.3.</strong><span>
  สำหรับการเดิมพันประเภทนี้ เวลาพิเศษที่เพิ่มขึ้นจะไม่ถูกนับรวมเพื่อใช้พิจารณาผลลัพธ์เต็มเวลาของทีมใดทีมหนึ่ง</span></h4>  <h3><strong>2.1.8.</strong><span>
  พาร์เลย์</span></h3>
  <h4><strong>2.1.8.1.</strong><span>
  บอลชุด (Mix Parlay) หมายถึง การเดิมพันแบบผสมตั้งแต่สองตัวเลือกขึ้นไป วางไว้ด้วยกันเป็นการเดิมพันหนึ่งครั้ง ถ้าตัวเลือกทั้งหมดชนะ บอลชุดนั้นก็ชนะ และจะได้รับเงินจากการรวมเลขคี่ของตัวเลือกทั้งสอง  ถ้าตัวเลือกหนึ่งตัว (หรือมากกว่า) เดิมพันไม่สำเร็จ แปลว่าการแทงบอลชุดนั้นแพ้ ถ้าตัวเลือกหนึ่งตัว (หรือมากกว่า) มีการเลื่อนเวลา ผลเลขคี่ของตัวเลือกนั้นจะย้อนกลับมาที่ 1.00 คี่</span></h4>
  <h4><strong>2.1.8.2.</strong><span>
  During LIVE Mix Parlay, if any bet in the selection is REJECTED, then the Parlay will not be VALID.</span></h4>
  <h4><strong>2.1.8.3.</strong><span>
  โปรดดู “วิธีใช้” ในหน้าการเดิมพันแบบมิกซ์พาร์เลย์ สำหรับ รายละเอียดเพิ่มเติม </span></h4>
  <h4><strong>2.1.8.4.</strong><span>
  A trixie consists of 4 bets involving 3 selections in different events, 3 doubles and 1 treble. Any two winning selections guarantee a return. If any 2 of your selections win, 1 of the double bets gives a return. If all 3 of your selections win, all 3 of the doubles, and the treble give a return.  If one (or more) selections should be postponed then the odds for that selection will revert to 1.00 odds.</span></h4>
  <h4><strong>2.1.8.5.</strong><span>
  A yankee consists of 11 bets involving 4 selections in different events, 6 doubles, 4 trebles and 1 four-fold. Any two winning selections guarantee a return. If any 2 of your selections win, 1 of the doubles gives a return. If any 3 selections win, 3 of the double bets and 1 of the trebles give a return. If all 4 selections win, then all 6 doubles, 4 trebles and the four-fold give a return. If one (or more) selections should be postponed then the odds for that selection will revert to 1.00 odds.</span></h4>
  <h4><strong>2.1.8.6.</strong><span>
  A Canadian  consists of 26 bets involving 5 selections in different events, 10 doubles, 10 trebles, 5 four-folds and 1 five-fold. Any two winning selections guarantee a return. If any 2 of your selections win, 1 of the doubles gives a return. If any 4 selections win, 6 of the double bets, 4 trebles and the four-fold give a return. If all 5 selections win, then all 10 doubles, 10 trebles, 5  four-fold and the five-fold give a return. If one (or more) selections should be postponed then the odds for that selection will revert to 1.00 odds.</span></h4>
  <h4><strong>2.1.8.7.</strong><span>
  A heinz consists of 57 bets involving 6 selections in different events, 15 doubles, 20 trebles, 15 four-folds, 6 five-folds and 1 six-fold. Any two winning selections guarantee a return. If any 2 of your selections win, 1 of the double bets gives a return. If any 5 selections win, then all 10 doubles, 10 trebles, 5  four-fold and the five-fold give a return. If all 6 selections win, then all 15 doubles, 20 trebles, 15 four-fold, 6 five-fold and the six-fold give a return. If one (or more) selections should be postponed then the odds for that selection will revert to 1.00 odds.</span></h4>
  <h4><strong>2.1.8.8.</strong><span>
  A super heinz consists of 120 bets involving 7 selections in different events, 21 doubles, 35 trebles, 35 four-folds, 21 five-folds, 7 six-folds and 1 seven-fold. Any two winning selections guarantee a return. If any 2 of your selections win, 1 of the double bets gives a return. If any 6 selections win, then all 15 doubles, 20 trebles, 15 four-fold, 6 five-fold and the six-fold give a return. If all 7 selections win, then all 21 doubles, 35 trebles, 35 four-fold, 21 five-fold, 7 six-fold and the seven-fold give a return. If one (or more) selections should be postponed then the odds for that selection will revert to 1.00 odds.</span></h4>
  <h4><strong>2.1.8.9.</strong><span>
  A goliath consists of 247 bets involving 8 selections in different events, 28 doubles, 56 trebles, 70 four-folds, 56 five-folds, 28 six-folds, 8 seven-folds and 1 eight-fold. Any two winning selections guarantee a return. If any 2 of your selections win, 1 of the double bets gives a return. If any 7 selections win, then all 21 doubles, 35 trebles, 35 four-fold, 21 five-fold, 7 six-fold and the seven-fold give a return. If all 8 selections win, then all 28 doubles, 56 trebles, 70 four-fold, 56 five-fold, 28 six-fold, 8 seven-fold and the eight-fold give a return.If one (or more) selections should be postponed then the odds for that selection will revert to 1.00 odds.</span></h4>
  <h4><strong>2.1.8.10.</strong><span>
  LIVE events are not offered for selection in Trixie, Yankee, Canadian, Heinz, Super Heinz and Goliath.</span></h4>
  <h4><strong>2.1.8.11.</strong><span>
  Please refer to the “ <img src="img/spacer2.gif" width="13" height="13" style="background:url(img/icon_odds.png) -135px 0"> ” icon on the bet menu in the Mix Parlay betting page for further details. </span></h4>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R22" id="R22"></a>2.2. ประเภทการเดิมพันฟุตบอล</h2>
  <h3><strong>2.2.1.</strong><span>
  ถ้าไม่มีการระบุไว้ ผลการแข่งขันของประเภทการเดิมพันฟุตบอล ให้อ้างอิงคะแนน ณ เวลาสิ้นสุดของเวลาปกติ (รวมการทดเวลาจากการที่กรรมการสั่งให้หยุดเล่นด้วย) การต่อเวลาพิเศษจะไม่นำมานับรวม </span></h3>
  <h3><strong>2.2.2.</strong><span>
  1X2</span></h3>
  <h4><strong>2.2.2.1.</strong><span>
  1X2 หมายถึงการเดิมพันหนึ่งในสามของผลชนะสุดท้ายที่เป็นไปได้ใดๆ สำหรับเหตุการณ์ 1 หมายถึงทีมที่ได้รับการเรียกชื่อก่อน (โดยปกติคือทีมเจ้าบ้าน); X หมายถึงการแข่งขันที่ผลลัพธ์คือเสมอ; 2 หมายถึงทีมที่ได้รับการเรียกชื่อในอันดับที่สอง (โดยปกติคือทีมเยือน)</span></h4>
  <h3><strong>2.2.3.</strong><span>
  คะแนนถูกต้อง</span></h3>
  <h4><strong>2.2.3.1.</strong><span>
  คะแนนถูกต้อง หมายถึง การเดิมพันในการทำนายผลคะแนน สุดท้ายที่เวลาสิ้นสุดของเวลาเต็ม</span></h4>

  <h4><strong>2.2.3.2.</strong><span>
  คะแนนที่ถูกต้องเพื่อชนะ "5-0UP" (หรือ 0-5UP) หมายความว่าทีมที่เลือกต้องมีแต้มนำอย่างน้อยห้า (5) ประตูหรือมากกว่า</span></h4>
  <h5><strong>ตัวอย่าง </strong><br>
  <span>ผลลัพธ์สำหรับ 5-0UP คือ 5:1, 6:2 ... (แพ้) / 5:0, 6:1 ... (ชนะ)<br>
  ผลลัพธ์สำหรับ 0-5UP คือ 1:5, 2:6 ... (แพ้) / 0:5, 1:6 ... (ชนะ)</span>
  </h5>
  
  <h4><strong>2.2.3.3.</strong><span>
  การเดิมพันจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิก เว้นแต่ว่าได้มีการกำหนดผลลัพธ์การเดิมพันแล้ว</span></h4>


  <h3><strong>2.2.4.</strong><span>
  รวมประตู และ รวมประตูครึ่งแรก</span></h3>
  <h4><strong>2.2.4.1.</strong><span>
  ประตูรวม หมายถึง การเดิมพันที่กำหนดโดยผลรวมของจำนวนประตู ที่ได้คะแนนในเหตุการณ์</span></h4>
  <h4><strong>2.2.4.2.</strong><span>
  รวมประตูครึ่งแรก หมายถึง การเดิมพันซึ่งพิจารณาโดยผลรวมของจำนวนประตูที่ยิงเข้าในครึ่งแรกของนัดการแข่งขัน</span></h4>
  <h4><strong>2.2.4.3.</strong><span>
  การเดิมพันจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิก เว้นแต่ว่าได้มีการกำหนดผลลัพธ์การเดิมพันแล้ว</span></h4>
  <h3><strong>2.2.5.</strong><span>
  ครึ่งเวลา/เต็มเวลา (HT.FT)</span></h3>
  <h4><strong>2.2.5.1.</strong><span>
  ครึ่งแรก/ครึ่งหลัง หมายถึง  การเดิมพันในการทำนายผลทั้งผลลัพธ์ ครึ่งแรกและครึ่งหลังของเหตุการณ์ (การต่อเวลาพิเศษจะไม่นำมา นับรวม) สิ่งต่อไปนี้ซึ่งเกี่ยวกับตลาดนี้จะหมายถึง: H หมายถึงทีมที่ได้รับ การเรียกชื่อเป็นอันดับแรก (โดยปกติคือทีมเจ้าบ้าน); D หมายถึง การเสมอ; A หมายถึงทีมที่เรียกชื่อเป็นอันดับสอง (โดยปกติคือทีมเยือน)</span></h4>
  <h4><strong>2.2.5.2.</strong><span>
  ตัวอย่าง – HA หมายความว่าทีมที่ได้รับการเรียกชื่อเป็นอันดับแรก (ทีมเจ้าบ้าน) จะนำที่ครึ่งแรกและทีมที่เรียกชื่อเป็นอันดับสอง (ทีมเยือน) จะนำที่ครึ่งหลัง </span></h4>
  <h3><strong>2.2.6.</strong><span>
  ประตูแรก/ประตูสุดท้าย และ ประตูแรก/ประตูสุดท้ายครึ่งแรก</span></h3>
  <h4><strong>2.2.6.1.</strong><span>
  ประตูแรก/ประตูสุดท้าย หมายถึง การเดิมพันทีมที่ได้ประตูแรก หรือประตูสุดท้ายในการแข่งขัน โดยเกี่ยวกับตลาดนี้ สิ่งต่อไปนี้จะหมายถึง: HF หมายถึงทีมที่ได้รับการเรียกชื่อเป็นอันดับแรก (โดยปกติคือทีมเจ้าบ้าน) ที่ทำประตูแรก HL หมายถึง ทีมที่ได้รับการเรียกชื่อเป็นอันดับแรกที่ทำประตูสุดท้าย AF หมายถึง ทีมที่เรียกชื่อเป็นอันดับสอง (โดยปกติคือทีมเยือน) ที่ทำประตูแรก AL หมายถึงทีมที่ได้รับการเรียกชื่อเป็นอันดับสองที่ทำประตูสุดท้าย NG หมายถึง ไม่มีประตูที่ได้คะแนนในระหว่างการแข่งขัน </span></h4>
  <h4><strong>2.2.6.2.</strong><span>
  ประตูแรก/ประตูสุดท้ายครึ่งแรก หมายถึง การเดิมพันว่าทีมใดจะยิงประตูได้เป็นลูกแรกหรือลูกสุดท้าย ในครึ่งแรกของนัดการแข่งขัน เพื่อเป็นการเคารพต่อตลาดนี้ สิ่งต่อไปนี้ควรหมายความว่า: HF หมายถึง ทีมซึ่งมีการเอ่ยชื่อเป็นทีมแรก (โดยปกติคือทีมเจ้าบ้าน) และยิงประตูแรกได้ HL หมายถึง ทีมซึ่งมีการเอ่ยชื่อเป็นทีมแรกและยิงประตูสุดท้ายได้ AF หมายถึง ทีมซึ่งมีการเอ่ยชื่อเป็นทีมที่สอง (โดยปกติคือทีมเยือน) และยิงประตูแรกได้ AL หมายถึง ทีมซึ่งมีการเอ่ยชื่อเป็นทีมที่สองและยิงประตูสุดท้ายได้ NG หมายถึง ไม่มีทีมใดยิงประตูระหว่างนัดการแข่งขัน</span></h4>
  <h4><strong>2.2.6.3.</strong><span>
  ประตูตัวเองให้นับเป็นประตูของทีมที่ได้เพิ่มประตู</span></h4>
  <h4><strong>2.2.6.4.</strong><span>
  ถ้าเหตุการณ์ถูกยกเลิกหลังจากทำประตูได้ การเดิมพันทั้งหมด ในประตูแรก (และไม่ได้ประตู) จะยังคงมีอยู่ ขณะที่การเดิมพันในประตู สุดท้ายจะเป็นโมฆะ ถ้าเหตุการณ์ถูกยกเลิกโดยไม่มีการทำประตู การเดิมพันทั้งหมดในประตูแรก ประตูสุดท้ายและไม่ได้ประตูจะเป็นโมฆะ </span></h4>
  <h3><strong>2.2.7.</strong><span>
  ทีมใดเริ่มเล่นก่อน</span></h3>
  <h4><strong>2.2.7.1.</strong><span>
  ทีมใดเริ่มเล่นก่อน หมายถึง การเดิมพันว่าทีมใดจะเป็นฝ่่าย เริ่ม เขี่ยลูกก่อนในเหตุการณ์</span></h4>
  <h4><strong>2.2.7.2.</strong><span>
  ถ้าเหตุการณ์ถูกยกเลิกหลังจากเหตุการณ์ได้เริ่มขึ้น การเดิมพัน ทั้งหมดจะยังคงมีผลต่อไป</span></h4>
  <h3><strong>2.2.8.</strong><span>
  ยอดรวมทีมเหย้า เทียบกับ ยอดรวมทีมเยือน</span></h3>
  <h4><strong>2.2.8.1.</strong><span>
  ยอดรวมประตูทีมเหย้า เทียบกับ ยอดรวมประตูทีมเยือน</span></h4>
  <h5><strong>2.2.8.1.1.</strong><span>
 ยอดรวมประตูทีมเหย้า เทียบกับ ยอดรวมประตูทีมเยือน หมายถึง การเดิมพันเพื่อทายจำนวนประตูรวมทั้งหมดโดยทีมเจ้าบ้าน เมื่อเทียบกับจำนวนประตูรวมทั้งหมดโดยทีมที่มาเยือน สำหรับการแข่งขันในลีกที่เจาะจงซึ่งลงเล่นในวันใดวันหนึ่ง</span> </h5>
  <h4><strong>2.2.8.2.</strong><span>
  ยอดรวมการเตะมุมทีมเหย้า เทียบกับ ยอดรวมการเตะมุมทีมเยือน</span></h4>
   <h5><strong>2.2.8.2.1.</strong><span>
  ยอดรวมการเตะมุมทีมเหย้า เทียบกับ ยอดรวมการเตะมุมทีมเยือน หมายถึง การเดิมพันเพื่อทายจำนวนการเตะมุมรวมทั้งหมดโดยทีมเจ้าบ้าน เมื่อเทียบกับจำนวนการเตะมุมรวมทั้งหมดโดยทีมที่มาเยือน สำหรับการแข่งขันในลีกที่เจาะจงซึ่งเล่นในวันใดวันหนึ่ง</span> </h5>
  <h4><strong>2.2.8.3.</strong><span>
   ทีมเหย้า หมายถึงทีมที่ขานชื่อเป็นลำดับแรก และทีมเยือน หมายถึงทีมที่ขานชื่อเป็นลำดับที่สอง</span></h4>
   <h4><strong>2.2.8.4.</strong><span>
 ถ้าการแข่งขันหนึ่ง (หรือมากกว่า) นัดเลื่อนออกไปหรือถูกยกเลิก จะถือว่าการเดิมพันเป็นโมฆะ</span></h4>
  <h3><strong>2.2.9.</strong><span>
  สูง/ตํ่าทีมเดี่ยว และสูง/ตํ่าครึ่งแรกทีมเดี่ยว</span></h3>
  <h4><strong>2.2.9.1.</strong><span>
  ทีมเดียว สูง/ต่ำ หมายถึง ประตูที่ทีมใดทีมหนึ่งทำได้ในการแข่งขัน</span></h4>
  <h4><strong>2.2.9.2.</strong><span>
 สูง/ตํ่าครึ่งแรกทีมเดี่ยว หมายถึง การเดิมพันเพื่อคาดการณ์จำนวนประตูโดยทีมใดทีมหนึ่ง ในระหว่างครึ่งแรกของการแข่งขัน</span></h4>
  <h4><strong>2.2.9.3.</strong><span>
    ถ้าคะแนนรวมมากกว่าเส้นสูงต่ำ ผลชนะเลิศคือสูง ถ้าผลรวมน้อย กว่าเส้นสูงต่ำ ผลชนะเลิศคือต่ำ</span></h4>
  <h3><strong>2.2.10.</strong><span>
  ลูกเตะมุม</span></h3>
  <h4><strong>2.2.10.1.</strong><span>
  ไม่นับรวมลูกเตะมุมที่กรรมการให้แต่ไม่ได้เตะ</span></h4>
  <h4><strong>2.2.10.2.</strong><span>
  จำนวนลูกเตะมุม</span></h4>
  <h5><strong>2.2.10.2.1.</strong><span>
  แฮนดิแคป และแฮนดิแคปครึ่งแรก</span>
    <p class="h7"><strong class="style3">2.2.10.2.1.1.</strong><span>
  แฮนดิแคป หมายถึง การเดิมพันว่าทีมจะได้ลูกเตะมุม มาก ที่สุดระหว่างการแข่งขันที่รวมการแฮนดิแคปใดๆ</span></p>
    <p class="h7"><strong class="style3">2.2.10.2.1.2.</strong><span>
 แฮนดิแคปครึ่งแรก หมายถึง การเดิมพันว่าทีมใดจะมีการเตะมุมมากที่สุดระหว่างครึ่งแรกของนัดการแข่งขัน ซึ่งรวมแฮนดิแคปใด ๆ ด้วย</span></p>
    <p class="h7"><strong class="style3">2.2.10.2.1.3.</strong><span>
  การเดิมพันแฮนดิแคปครึ่งแรกจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิกในระหว่างครึ่งแรก การเดิมพันแฮนดิแคปครึ่งแรกจะยังคงใช้ได้อยู่ถ้านัดการแข่งขันถูกยกเลิกในระหว่างครึ่งที่สอง</span></p>
  </h5>
   <h5><strong>2.2.10.2.2.</strong><span>
  สูง/ตํ่า และสูง/ตํ่าครึ่งแรก</span>
    <p class="h7"><strong class="style3">2.2.10.2.2.1.</strong><span>
  สูง/ต่ำ หมายถึง การเดิมพันจำนวนลูกเตะมุมทั้งหมด ที่เกิดขึ้นจากทั้งสองทีมในระหว่างการแข่งขัน</span></p>
    <p class="h7"><strong class="style3">2.2.10.2.2.2.</strong><span>
  สูง/ตํ่าครึ่งแรก หมายถึง การเดิมพันที่จำนวนรวมของการเตะมุมโดยทั้งสองทีม ในระหว่างครึ่งแรกของนัดการแข่งขัน</span></p>
    <p class="h7"><strong class="style3">2.2.10.2.2.3.</strong><span>
  If the total is more than the OU line then the winning result is Over; if the total is less than the OU line then the winning result is Under.</span></p>
    <p class="h7"><strong class="style3">2.2.10.2.2.4.</strong><span>
  การเดิมพันจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิก เว้นแต่ว่าได้มีการกำหนดผลลัพธ์การเดิมพันแล้ว</span></p>
  </h5>
  <h4><strong>2.2.10.3.</strong><span>
  ลูกเตะมุมลูกแรก &amp; 2nd Half First Corner</span></h4>
  <h5><strong>2.2.10.3.1.</strong><span>
  การเตะมุมแรก หมายถึง การเดิมพันว่าทีมใดจะเป็นทีมแรกที่เตะมุม ในนัดการแข่งขัน</span></h5>
  <h5><strong>2.2.10.3.2.</strong><span>
  2nd Half First Corner means betting on which team will take the first corner in the 2nd half of a match.</span></h5>
  <h5><strong>2.2.10.3.3.</strong><span>
  ถ้าการแข่งขันถูกยกเลิกหลังจากลูกเตะมุมลูกแรกเกิดขึ้น การเดิมพันทั้งหมดจะยังมีผลต่อไป ถ้าการแข่งขันถูกยกเลิก ก่อนลูกเตะมุมลูกแรกเกิดขึ้น การเดิมพันทั้งหมดถือเป็นโมฆะ </span></h5>
  <h4><strong>2.2.10.4.</strong><span>
  ลูกเตะมุมลูกสุดท้าย</span></h4>
  <h5><strong>2.2.10.4.1.</strong><span>
  ลูกเตะมุมลูกสุดท้าย หมายถึง การเดิมพันว่าทีมใดจะได้ ลูกเตะมุมลูกสุดท้ายในการแข่งขัน</span></h5>
  <h5><strong>2.2.10.4.2.</strong><span>
  ถ้าการแข่งขันถูกยกเลิก การเดิมพันทั้งหมดถือเป็นโมฆะ </span></h5>
  <h3><strong>2.2.11.</strong><span>
  ใบเหลืองหรือใบแดง</span></h3>
  <h4><strong>2.2.11.1.</strong><span>
  ใบเหลืองนับเป็นหนึ่งคะแนนและใบแดงนับเป็นสองคะแนน จำนวนคะแนนสูงสุดที่ผู้เล่นจะได้ระหว่างการแข่งขันคือสาม (หนึ่งสำหรับใบเหลืองและสองสำหรับใบแดง ใบเหลืองที่สองจะไม่นำมานับรวม)</span></h4>
  <h4><strong>2.2.11.2.</strong><span>
  ใบเหลืองหรือใบแดงที่ให้กับบุคคลที่ไม่ใช่ผู้เล่น (ผู้จัดการ โค้ช ผู้เล่นสำรอง) ไม่นำมานับรวม </span></h4>
  <h4><strong>2.2.11.3.</strong><span>
  จำนวนใบเหลืองหรือใบแดง</span></h4>
  <h5><strong>2.2.11.3.1.</strong><span>
   แฮนดิแคป และแฮนดิแคปครึ่งแรก</span>
    <p class="h7"><strong class="style3">2.2.11.3.1.1.</strong><span>
  แฮนดิแคป หมายถึง การเดิมพันว่าทีมใดจะได้ ใบเหลือง หรือใบแดงมากที่สุดระหว่าง การแข่งขัน ที่รวมแฮนดิแคปใดๆ </span></p>
    <p class="h7"><strong class="style3">2.2.11.3.1.2.</strong><span>
 แฮนดิแคปครึ่งแรก หมายถึง การเดิมพันว่าทีมใดจะได้รับใบเตือนมากที่สุด ในระหว่างครึ่งแรกของนัดการแข่งขัน ซึ่งรวมแฮนดิแคปใด ๆ ด้วย</span></p>
    <p class="h7"><strong class="style3">2.2.11.3.1.3.</strong><span>
  การเดิมพันแฮนดิแคปครึ่งแรกจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิกในระหว่างครึ่งแรก อย่างไรก็ตาม การเดิมพันจะยังคงใช้ได้อยู่ถ้านัดการแข่งขันถูกยกเลิกในระหว่างครึ่งที่สอง</span></p>
  </h5>
  <h5><strong>2.2.11.3.2.</strong><span>
  สูง/ตํ่า และสูง/ตํ่าครึ่งแรก</span>
    <p class="h7"><strong class="style3">2.2.11.3.2.1.</strong><span>
  สูง/ต่ำ หมายถึง การเดิมพันจำนวนใบเหลือง หรือใบแดงทั้งหมดที่ทั้งสองทีมได้รับในระหว่างการแข่งขัน</span></p>
    <p class="h7"><strong class="style3">2.2.11.3.2.2.</strong><span>
 สูง/ตํ่าครึ่งแรก หมายถึง การเดิมพันที่จำนวนรวมของใบเตือนซึ่งทั้งสองทีมได้รับ ในระหว่างครึ่งแรกของนัดการแข่งขัน </span></p>
    <p class="h7"><strong class="style3">2.2.11.3.2.3.</strong><span>
  If the total is more than the OU line then the winning result is Over; if the total is less than the OU line then the winning result is Under.</span></p>
    <p class="h7"><strong class="style3">2.2.11.3.2.4.</strong><span>
  การเดิมพันจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิก เว้นแต่ว่าได้มีการกำหนดผลลัพธ์การเดิมพันแล้ว</span></p>  
  </h5>
  <h4><strong>2.2.11.4.</strong><span>
  ใบเหลืองหรือใบแดงใบแรก &amp; 2nd Half First Booking</span></h4>
  <h5><strong>2.2.11.4.1.</strong><span>
  ใบเหลืองหรือใบแดงใบแรก หมายถึง การเดิมพันว่าทีมใดจะถูกลงโทษ (ได้รับใบเหลืองหรือใบแดงใบแรก) ในการแข่งขัน</span></h5>
  <h5><strong>2.2.11.4.2.</strong><span>
  2nd Half First Booking means betting on which team will receive first booking (Yellow or Red) in the 2nd half of a match.</span></h5>
  <h5><strong>2.2.11.4.3.</strong><span>
  ถ้าผู้เล่นสองคนหรือมากกว่าได้ใบเหลืองหรือใบแดงสำหรับเหตุการณ์เดียวกัน ผู้เล่นที่ถูกผู้ตัดสินยื่นใบเหลือง/ใบแดงใบแรกจะถือว่าเป็นผู้ชนะ </span></h5>
  <h5><strong>2.2.11.4.4.</strong><span>
  ถ้าการแข่งขันถูกยกเลิกหลังจากใบแดงหรือใบเหลืองใบแรกถูกยื่น การเดิมพัน ทั้งหมดจะมีผลต่อไป ถ้าการแข่งขันถูกยกเลิกก่อนใบแดงหรือใบเหลืองใบแรกถูกยื่น การเดิมพัน ทั้งหมดถือเป็นโมฆะ </span></h5>
  <h4><strong>2.2.11.5.</strong><span>
  ใบเหลืองหรือใบแดงใบสุดท้าย</span></h4>
  <h5><strong>2.2.11.5.1.</strong><span>
  ใบเหลืองหรือใบแดงใบสุดท้าย หมายถึง การเดิมพันว่าทีมใดจะถูกลงโทษ (ได้รับใบเหลืองหรือใบแดงใบสุดท้าย) ในการแข่งขัน</span></h5>
  <h5><strong>2.2.11.5.2.</strong><span>
  ถ้าผู้เล่นสองคนหรือมากกว่าได้ใบเหลืองหรือใบแดงสำหรับเหตุการณ์เดียวกัน ผู้เล่นที่ถูกผู้ตัดสินยื่นใบเหลือง/ใบแดงใบสุดท้ายจะถือว่าเป็นผู้ชนะ</span></h5>
  <h5><strong>2.2.11.5.3.</strong><span>
  ถ้าการแข่งขันถูกยกเลิก การเดิมพันทั้งหมดถือเป็นโมฆะ</span></h5>
  <h4><strong>2.2.11.6.</strong><span>
  ใบเตือนครั้งต่อไป</span></h4>
  <h5><strong>2.2.11.6.1.</strong><span>
  ใบเตือนครั้งต่อไป หมายถึง การเดิมพันเพื่อทายว่าทีมใดจะได้รับใบเตือนใบต่อไป ไม่ว่าจะเป็นใบแดงและ/หรือใบเหลือง</span></h5>
  <h5><strong>2.2.11.7.2.</strong><span>
  การเดิมพันทั้งหมดจะถือว่าตรงถ้ามีการให้ใบเตือนตามที่คาดการณ์ไว้</span></h5>  
  <h3><strong>2.2.12.</strong><span>
  ลูกล้ำหน้า</span></h3>
  <h4><strong>2.2.12.1.</strong><span>
  จำนวนลูกล้ำหน้า </span></h4>
  <h5><strong>2.2.12.1.1.</strong><span>
  แฮนดิแคป และแฮนดิแคปครึ่งแรก</span>
    <p class="h7"><strong class="style3">2.2.12.1.1.1.</strong><span>
  แฮนดิแคป หมายถึง การเดิมพันว่าทีมใดได้ลูกล้ำหน้า มากที่สุด ในระหว่าง การแข่งขัน รวมถึงแฮนดิแคปใดๆ</span></p>
    <p class="h7"><strong class="style3">2.2.12.1.1.2.</strong><span>
   แฮนดิแคปครึ่งแรก หมายถึง การเดิมพันว่าทีมใดจะถูกเตือนการลํ้าหน้ามากที่สุด ในระหว่างครึ่งแรกของนัดการแข่งขัน ซึ่งรวมแฮนดิแคปใด ๆ ด้วย</span></p>
    <p class="h7"><strong class="style3">2.2.12.1.1.3.</strong><span>
  การเดิมพันแฮนดิแคปครึ่งแรกจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิกในระหว่างครึ่งแรก อย่างไรก็ตาม การเดิมพันจะยังคงใช้ได้อยู่ถ้านัดการแข่งขันถูกยกเลิกในระหว่างครึ่งที่สอง</span></p>
  </h5>
  <h5><strong>2.2.12.1.2.</strong><span>
  สูง/ตํ่า และสูง/ตํ่าครึ่งแรก</span>
    <p class="h7"><strong class="style3">2.2.12.1.2.1.</strong><span>
  สูง/ต่ำ หมายถึง การเดิมพันจำนวนการตัดสิน ลูกล้ำหน้า ทั้งหมดในระหว่างการแข่งขัน</span></p>
   <p class="h7"><strong class="style3">2.2.12.1.2.2.</strong><span>
   สูง/ตํ่าครึ่งแรก หมายถึง การเดิมพันที่จำนวนรวมของการถูกเตือนการลํ้าหน้า ในระหว่างครึ่งแรกของนัดการแข่งขัน</span></p>
    <p class="h7"><strong class="style3">2.2.12.1.2.3.</strong><span>
  ถ้าคะแนนรวมมากกว่าเส้นสูงต่ำ ผลชนะเลิศคือสูง ถ้าคะแนนรวมน้อยกว่าเส้นสูงต่ำ ผลชนะเลิศคือต่ำ</span></p>
    <p class="h7"><strong class="style3">2.2.12.1.2.4.</strong><span>
  การเดิมพันจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิก เว้นแต่ว่าได้มีการกำหนดผลลัพธ์การเดิมพันแล้ว</span></p>
  </h5>
  <h4><strong>2.2.12.2.</strong><span>
  ลูกล้ำหน้าลูกแรก &amp; 2nd Half First Offside</span></h4>
  <h5><strong>2.2.12.2.1.</strong><span>
  ลูกล้ำหน้าลูกแรก หมายถึง การเดิมพันว่าทีมใดจะได้ ลูกล้ำหน้าลูกแรกในการแข่งขัน</span></h5>
  <h5><strong>2.2.12.2.2.</strong><span>
  2nd Half First Offside means betting on which team will be caught offside first in the 2nd half of a match.</span></h5>
  <h5><strong>2.2.12.2.3.</strong><span>
  ถ้าการแข่งขันถูกยกเลิกหลังจากการตัดสินลูกล้ำหน้าลูกแรก การเดิมพันทั้งหมดจะยังมีผลต่อไป ถ้าการแข่งขันถูกยกเลิก ก่อนการตัดสินลูกล้ำหน้าลูกแรก การเดิมพันทั้งหมดถือเป็นโมฆะ</span></h5>
  <h4><strong>2.2.12.3.</strong><span>
  ลูกล้ำหน้าลูกสุดท้าย</span></h4>
  <h5><strong>2.2.12.3.1.</strong><span>
  ลูกล้ำหน้าลูกสุดท้าย หมายถึง การเดิมพันว่าทีมใดจะได้ ลูกล้ำหน้าลูกสุดท้ายในการแข่งขัน</span></h5>
  <h5><strong>2.2.12.3.2.</strong><span>
  ถ้าการแข่งขันถูกยกเลิก การเดิมพันทั้งหมดถือเป็นโมฆะ </span></h5>
  <h4><strong>2.2.12.4.</strong><span>
  การลํ้าหน้าครั้งต่อไป</span></h4>
  <h5><strong>2.2.12.4.1.</strong><span>
  การลํ้าหน้าครั้งต่อไป หมายถึง การเดิมพันเพื่อทายว่าทีมใดจะถูกเตือนการลํ้าหน้าครั้งต่อไป</span></h5>
  <h5><strong>2.2.12.4.2.</strong><span>
   การเดิมพันทั้งหมดจะถือว่าตรงถ้ามีการเตือนกรณีลํ้าหน้าตามที่คาดการณ์ไว้</span></h5>
  <h3><strong>2.2.13.</strong><span>
  การเปลี่ยนตัวผู้เล่น</span></h3>
  <h4><strong>2.2.13.1.</strong><span>
   จำนวนครั้งของการเปลี่ยนตัวผู้เล่น</span></h4>
  <h5><strong>2.2.13.1.1.</strong><span>
   แฮนดิแคป</span>
    <p class="h7"><strong class="style3">2.2.13.1.1.1.</strong><span>
    แฮนดิแคป หมายถึง การเดิมพันว่าทีมใดจะมีการ เปลี่ยนตัวผู้เล่นมากที่สุดระหว่างการแข่งขันที่รวมแฮนดิแคป ใดๆ</span></p>
    <p class="h7"><strong class="style3">2.2.13.1.1.2.</strong><span>
  ถ้าการแข่งขันถูกยกเลิก การเดิมพันทั้งหมด ถือเป็นโมฆะ</span></p>
  </h5>
  <h5><strong>2.2.13.1.2.</strong><span>
  สูง/ต่ำ</span>
    <p class="h7"><strong class="style3">2.2.13.1.2.1.</strong><span>
   สูง/ต่ำ หมายถึง การเดิมพันจำนวนทั้งหมดของ การเปลี่ยนตัวผู้เล่นในระหว่างการแข่งขัน</span></p>
    <p class="h7"><strong class="style3">2.2.13.1.2.2.</strong><span>
   ถ้าคะแนนรวมมากกว่าเส้นสูงต่ำ ผลชนะเลิศคือสูง ถ้าคะแนนรวมน้อยกว่าเส้นสูงต่ำ ผลชนะเลิศคือต่ำ</span></p>
    <p class="h7"><strong class="style3">2.2.13.1.2.3.</strong><span>
  การเดิมพันจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิก เว้นแต่ว่าได้มีการกำหนดผลลัพธ์การเดิมพันแล้ว</span></p>
  </h5>
  <h4><strong>2.2.13.2.</strong><span>
   การเปลี่ยนตัวผู้เล่นครั้งแรก</span></h4>
  <h5><strong>2.2.13.2.1.</strong><span>
  การเปลี่ยนตัวผู้เล่นครั้งแรก หมายถึง การเดิมพัน ว่าทีมใดจะทำการเปลี่ยนตัวผู้เล่นเป็นคนแรกระหว่างการแข่งขัน</span></h5>
  <h5><strong>2.2.13.2.2.</strong><span>
   ถ้าผู้เล่นสองคนหรือมากกว่าถูกเปลี่ยนตัวในเวลาเดียวกัน ผู้เล่นที่มีหมายเลขอันดับแรกจากสี่อันดับที่เป็นทางการจะถือว่าเป็นผู้ชนะ</span></h5>
  <h5><strong>2.2.13.2.3.</strong><span>
   ถ้าการแข่งขันถูกยกเลิกหลังจากการเปลี่ยนตัวผู้เล่นครั้งแรก เกิดขึ้น การเดิมพันทั้งหมดจะยังคงมีผลต่อไป ถ้าการแข่งขัน ถูกยกเลิกก่อนการเปลี่ยนตัวผู้เล่นครั้งแรกเกิดขึ้น การเดิมพัน ทั้งหมดถือเป็นโมฆะ </span></h5>
  <h4><strong>2.2.13.3.</strong><span>
  การเปลี่ยนตัวผู้เล่นครั้งสุดท้าย</span></h4>
  <h5><strong>2.2.13.3.1.</strong><span>
  การเปลี่ยนตัวผู้เล่นครั้งสุดท้าย หมายถึง การเดิมพัน ว่าทีมใดจะทำการเปลี่ยนตัวผู้เล่นเป็นคนสุดท้ายระหว่างการแข่งขัน</span></h5>
  <h5><strong>2.2.13.3.2.</strong><span>
   ถ้าผู้เล่นสองคนหรือมากกว่าถูกเปลี่ยนตัวในเวลาเดียวกัน ผู้เล่นที่มีหมายเลขอันดับสุดท้ายจากสี่อันดับที่เป็นทางการจะถือว่า เป็นผู้ชนะ</span></h5>
  <h5><strong>2.2.13.3.3.</strong><span>
  ถ้าการแข่งขันถูกยกเลิก การเดิมพันทั้งหมดถือเป็นโมฆะ</span></h5>
  <h3><strong>2.2.14.</strong><span>
  คลีนชีท</span></h3>
  <h4><strong>2.2.14.1.</strong><span>
  คลีนชีท หมายถึง "Yes"พนันทีมไม่ให้เสียประตู (ไม่มีการทำประตูเกิดขึ้น) หรือ "No"พนันทีมมีการทำประตู (มีการทำประตูเกิดขึ้น).</span></h4>
  <h4><strong>2.2.14.2.</strong><span>
  ถ้ามีการยกเลิกการแข่งขันหลังจากที่ได้ทำประตูแล้วโดยทีมเจ้าบ้านเท่านั้น การเดิมพัน "ทีมเยือน ใช่และไม่ใช่" (Away Yes &amp; No) จะยังใช้ได้อยู่ ส่วนการเดิมพัน "ทีมเจ้าบ้าน ใช่และไม่ใช่" (Home Yes &amp; No) จะเป็นโมฆะ ถ้ามีการยิงประตูเข้าโดยทีมผู้มาเยือนเท่านั้น การเดิมพัน "ทีมเจ้าบ้าน ใช่และไม่ใช่" (Home Yes &amp; No) จะยังใช้ได้อยู่ ส่วนการเดิมพัน "ทีมเยือน ใช่และไม่ใช่" (Away Yes &amp; No) จะเป็นโมฆะ ถ้ามีการยิงประตูเข้าโดยทั้งทีมเจ้าบ้านและทีมผู้มาเยือน การเดิมพันทั้งหมดจะคงอยู่ ในกรณีที่การแข่งขันถูกยกเลิกโดยไม่มีการยิงประตู การเดิมพันทั้งหมดจะเป็นโมฆะ </span></h4>
  <h5><strong>กติกาข้อที่ 1：</strong><span> <br>
  คะแนนเจ้าบ้าน ≥ 1, คะแนนทีมเยือน = 0  (1, 2..:0)	<br>
  เจ้าบ้าน ใช่ – คืนเงิน	　ทีมเยือน ใช่ – แพ้	<br>
  เจ้าบ้าน ไม่ – คืนเงิน	　ทีมเยือน ไม่ – ชนะ<br>
  </span></h5>
  <h5><strong>กติกาข้อที่ 2：</strong><span> <br>
  คะแนนเจ้าบ้าน ≥ 1, คะแนนทีมเยือน ≥ 1 (1, 2…: 1, 2…)<br>
  เจ้าบ้าน ใช่ – แพ้		　ทีมเยือน ใช่ – แพ้<br>
  เจ้าบ้าน ไม่ – ชนะ	　ทีมเยือน ไม่ - ชนะ<br>
  </span></h5>
  <h5><strong>กติกาข้อที่ 3：</strong><span> <br>
  คะแนนทีมเจ้าบ้าน = 0, คะแนนทีมเยือน ≥ 1  (0:1, 2…)	<br>
  เจ้าบ้าน ใช่ – แพ้		　ทีมเยือน ใช่ – คืนเงิน	<br>
  เจ้าบ้าน ไม่ – ชนะ	　ทีมเยือน ไม่ – คืนเงิน	<br>
  </span></h5>
  <h3><strong>2.2.15.</strong><span>
  ลูกโทษ</span></h3>
  <h4><strong>2.2.15.1.</strong><span>
  ลูกโทษ หมายถึง การเดิมพันลูกโทษที่ได้หรือเกิดขึ้น ระหว่างการแข่งขัน</span></h4>
  <h4><strong>2.2.15.2.</strong><span>
  ถ้าการแข่งขันถูกยกเลิกหลังจากได้ลูกโทษหรือมีลูกโทษเกิดขึ้น การเดิมพันทั้งหมดจะยังคงมีผลต่อไป</span></h4>
  <h4><strong>2.2.15.3.</strong><span>
  ถ้าการแข่งขันถูกยกเลิกก่อนได้ลูกโทษหรือมีลูกโทษเกิดขึ้น การเดิมพันทั้งหมดถือเป็นโมฆะ </span></h4>
  <h3><strong>2.2.16.</strong><span>
  การยิงลูกโทษ</span></h3>
  <h4><strong>2.2.16.1.</strong><span>
  การยิงลูกโทษ หมายถึง การเดิมพันว่าทีมใดจะชนะการยิงลูกโทษ</span></h4>
  <h4><strong>2.2.16.2.</strong><span>
  ในการเดิมพันแฮนดิแคป ผลการแข่งขันจะรวมลูกโทษทั้งหมด ที่เกิดขึ้นในการยิงลูกโทษรวมทั้งลูกตัดสินด้วย ในการเดิมพันสูง/ต่ำ ผลการแข่งขันจะรวมกฎการยิงสิบลูกโทษเท่านั้นโดยไม่รวมลูกตัดสิน </span></h4>
  <h3><strong>2.2.17.</strong><span>
  แฟนตาซีลีก</span></h3>
  <h4><strong>2.2.17.1.</strong><span>
  แฟนตาซีแมทช์คือการจับคู่ของทีมจากแมทช์ที่ต่างกัน</span></h4>
  <h4><strong>2.2.17.2.</strong><span>
  สถานที่ทั้งหมดใช้เพื่อจุดประสงค์ในการอ้างอิงอย่างเดียวเท่านั้น</span></h4>
  <h3><strong>2.2.18.</strong><span>
  Specific 15-Minute Over/Under (OU)</span></h3>
  <h4><strong>2.2.18.1.</strong><span>
  The Specific 15-Minute (OU) means betting that is determined by the total number of points (goals, corners, games, cards etc.) at the end of every 15th minute [INTERVAL OF] time of a match.</span></h4>
  <h4><strong>2.2.18.2.</strong><span>
  If the total is more than the Over/Under pre-designated line then the winning result is Over; if the total is less than the Over/Under pre-designated line then the winning result is Under.</span></h4>
  <h4><strong>2.2.18.3.</strong><span>
  For example:</span></h4>
  <h5 class="style1"><strong>15<sup>th</sup> Minute OU</strong><br>
    00:00 – 15:00 OU: Total number of points to be scored from 00:00 till 15:00.<br>
    All bets must be placed on or before the end of the 15th minute.</h5>
  <h5 class="style1"><strong>30<sup>th</sup> Minute OU</strong><br>
    15:01 – 30:00 OU: Total number of points to be scored from 15:01 till 30:00.<br>
    All bets must be placed on or before the end of the 30th minute.</h5>
  <h5 class="style1"><strong>45<sup>th</sup> Minute OU</strong><br>
    30:01- 45:00 OU: Total number of points to be scored from 30:01 - 45:00.<br>
    All bets must be placed on or before the end of 45th minute.</h5>
  <h5 class="style1"><strong>60<sup>th</sup> Minute OU</strong><br>
    45:01 – 60:00 OU: Total number of points to be scored from 45:01 till 60:00.<br>
    All bets must be placed on or before the end of the 60th minute.</h5>
  <h5 class="style1"><strong>75<sup>th</sup> Minute OU</strong><br>
    60:01 – 75:00 OU: Total number of points to be scored from 60:01 till 75:00.<br>
    All bets must be placed on or before the end of the 75th minute.</h5>
  <h5 class="style1"><strong>90<sup>th</sup> Minute OU</strong><br>
    75:01- 90:00 OU: Total number of points to be scored from 75:01 till 90:00.<br>
    All bets must be placed on or before the end of the 90th minute.</h5>
  <h4><strong>2.2.18.4.</strong><span>
  For the Specific 15-Minute OU, bets are settled on the exact time the goal is scored (ball crossing the goal line), number of corners (corners taken) and Total Bookings (cards given by the official referee) as shown by the clock as published in the live broadcast.</span></h4>
  <h4><strong>2.2.18.5.</strong><span>
  If a match is suspended or abandoned, then bets placed on unfinished Specific 15-Minute OU will be considered void. If the designated Specific 15-Minute OU are completed then bets will be valid.</span></h4>
  <h4><strong>2.2.18.6.</strong><span>
  ในสอง (2) นาทีสุดท้ายของการเดิมพันสดสูงตํ่า (O/U) เฉพาะ 15 นาที การดำเนินการใดซึ่งนอกเหนือจากที่ระบุไว้ด้านล่างนี้ จะถือว่าเป็นการเล่นที่ปลอดภัย (Safe Play) ดังนั้นการเดิมพันทั้งหมดที่ค้างไว้อยู่จะถือว่ายอมรับได้: ทำประตู ลูกโทษ และใบแดง</span></h4>
  
  <h4><strong>2.2.18.7.</strong><span>
  สำหรับสอง (2) นาทีสุดท้ายของการเดิมพันสดจำนวนลูกเตะมุมเฉพาะ 15 นาที การกระทำใด ๆ นอกเหนือจากที่ระบุไว้ด้านล่างนี้จะถือว่าเป็นการเล่นที่ปลอดภัย และทำให้การเดิมพันที่ค้างอยู่ทั้งหมดถูกต้อง ซึ่งได้แก่ ลูกตั้งเตะอันตรายจากสนามส่วนหน้า ฝ่ายโจมตีเลี้ยงลูกไปที่สนามด้านหน้า และลูกโทษ
  </span></h4>
  
  <h4><strong>2.2.18.8.</strong><span>
  สำหรับสอง (2) นาทีสุดท้ายของการเดิมพันสดจำนวนรวมใบเตือนเฉพาะ 15 นาที การกระทำใด ๆ นอกเหนือจากที่ระบุไว้ด้านล่างนี้จะถือว่าเป็นการเล่นที่ปลอดภัย และทำให้การเดิมพันที่ค้างอยู่ทั้งหมดถูกต้อง ซึ่งได้แก่ ลูกตั้งเตะอันตรายจากสนามส่วนหน้า ลูกโทษ ประตู ลูกเตะมุม ผู้เล่นได้รับบาดเจ็บและล้มลงโดยไม่ทราบสาเหตุ การถกเถียงกันของผู้เล่น และการปะทะกันของผู้เล่น
  </span></h4>  
  
  <h4><strong>2.2.18.9.</strong><span>
  For 30:01-45:00 &amp; 75:01 - 90:00, bets are settled on the exact time the goal is scored ( ball 	crossing the goal line) , number of corners (corners taken) and Total bookings (cards given by the official 	referee) as shown by the clock as published in the live broadcast excluding any additional time or injury time.</span></h4>
<h3><strong>2.2.19.</strong><span>
  ลูกฟรีคิคส์</span></h3>
  <h4><strong>2.2.19.1.</strong><span>
  ไม่นับรวมลูกฟรีคิคที่กรรมการสั่งให้แต่ไม่ได้เตะ</span></h4>
  <h4><strong>2.2.19.2.</strong><span>
  ลูกฟรีคิคส์ หมายถึง การเตะลูกฟรีคิคส์ทั้งแบบโดยตรงและโดยอ้อม (ยกเว้นการเตะลูกโทษและการเตะลูกเข้าประตู)</span></h4>
  <h4><strong>2.2.19.3.</strong><span>
  จำนวนลูกฟรีคิคส์</span></h4>
  <h5><strong>2.2.19.3.1.</strong><span>
  แฮนดิแคป และแฮนดิแคปครึ่งแรก</span>
    <p class="h7"><strong class="style3">2.2.19.3.1.1.</strong><span>
  แฮนดิแคป หมายถึง การเดิมพันว่าทีมใดจะได้ลูกฟรีคิคส์มากที่สุดระหว่าง การแข่งขันที่รวมการแฮนดิแคปใดๆ</span></p>
    <p class="h7"><strong class="style3">2.2.19.3.1.2.</strong><span>
แฮนดิแคปครึ่งแรก หมายถึง การเดิมพันว่าทีมใดจะยิงลูกโทษมากที่สุดระหว่างครึ่งแรกของนัดการแข่งขัน ซึ่งรวมแฮนดิแคปใด ๆ ด้วย</span></p>
  <p class="h7"><strong class="style3">2.2.19.3.1.3.</strong><span>
  การเดิมพันแฮนดิแคปครึ่งแรกจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิกในระหว่างครึ่งแรก อย่างไรก็ตาม การเดิมพันจะยังคงใช้ได้อยู่ถ้านัดการแข่งขันถูกยกเลิกในระหว่างครึ่งที่สอง</span></p>
  </h5>
  <h5><strong>2.2.19.3.2.</strong><span>
  สูง/ตํ่า และสูง/ตํ่าครึ่งแรก</span>
    <p class="h7"><strong class="style3">2.2.19.3.2.1.</strong><span>
  สูง/ต่ำ หมายถึง การเดิมพันจำนวนลูกฟรีคิคส์ทั้งหมดที่เกิดขึ้นจากทั้งสองทีม ในระหว่างการแข่งขัน</span></p>
    <p class="h7"><strong class="style3">2.2.19.3.2.2.</strong><span>
สูง/ตํ่าครึ่งแรก หมายถึง การเดิมพันที่จำนวนรวมของการยิงลูกโทษโดยทั้งสองทีม ในระหว่างครึ่งแรกของนัดการแข่งขัน</span></p>
  </h5>
  <h5>
    <p class="h7"><strong class="style3">2.2.19.3.2.3.</strong><span>
  ถ้าคะแนนรวมมากกว่าเส้นสูงต่ำ ผลชนะเลิศคือสูง ถ้าคะแนนรวมน้อยกว่าเส้นสูงต่ำ ผลชนะเลิศคือต่ำ</span></p></h5>
  <h5>
<p class="h7"><strong class="style3">2.2.19.3.2.4.</strong><span>
  การเดิมพันจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิก เว้นแต่ว่าได้มีการกำหนดผลลัพธ์การเดิมพันแล้ว</span></p>
  </h5>
  <h4><strong>2.2.19.4.</strong><span>
  ฟรีคิคส์ลูกแรก &amp; 2nd Half First Free kick</span></h4>
  <h5><strong>2.2.19.4.1</strong><span>
  ฟรีคิคส์ลูกแรก หมายถึง การเดิมพันว่าทีมใดจะได้ลูกเตะมุมลูกแรกในการแข่งขัน</span></h5>
  <h5><strong>2.2.19.4.2</strong><span>
  2nd Half First Free kick means betting on which team will take the first free kick in the 2nd half of a match.</span></h5>
  <h5><strong>2.2.19.4.3</strong><span>
   ถ้าการแข่งขันถูกยกเลิกหลังจากลูกฟรีคิคส์ลูกแรกเกิดขึ้น การเดิมพันทั้งหมด จะยังมีผลต่อไป ถ้าการแข่งขันถูกยกเลิกก่อนลูกฟรีคิคส์ลูกแรกเกิดขึ้น  การเดิมพันทั้งหมดถือเป็นโมฆะ</span></h5>
  <h4><strong>2.2.19.5.</strong><span>
  ฟรีคิคส์ลูกสุดท้าย</span></h4>
  <h5><strong>2.2.19.5.1</strong><span>
  ฟรีคิคส์ลูกสุดท้าย หมายถึง การเดิมพันว่าทีมใดจะได้ลูกฟรีคิคส์ลูกสุดท้าย ในการแข่งขัน</span></h5>
  <h5><strong>2.2.19.5.2</strong><span>
  ถ้าการแข่งขันถูกยกเลิก การเดิมพันทั้งหมดถือเป็นโมฆะ </span></h5>
  <h4><strong>2.2.19.6.</strong><span>
   ลูกโทษครั้งต่อไป</span></h4>
  <h5><strong>2.2.19.6.1.</strong><span>
  ลูกโทษครั้งต่อไป หมายถึง การเดิมพันเพื่อทายว่าทีมใดจะเป็นฝ่ายยิงลูกโทษครั้งต่อไป</span></h5>
  <h5><strong>2.2.19.6.2.</strong><span>
  การเดิมพันทั้งหมดจะถือว่าตรงถ้ามีการยิงลูกโทษตามที่คาดการณ์ไว้</span></h5>
  <h3><strong>2.2.20.</strong><span>
  การเตะลูกเข้าประตู</span></h3>
  <h4><strong>2.2.20.1.</strong><span>
  การเตะลูกเข้าประตูจะถูกตัดสินให้กับทีมรับ ถ้าลูกบอลข้ามพ้นเส้นหลัง ซึ่งเป็นผลมาจากการสัมผัสตัวผู้เล่นฝ่ายรุก</span></h4>
  <h4><strong>2.2.20.2.</strong><span>
  การเตะลูกโดยผู้รักษาประตูหลังจากทำการป้องกันประตูจะไม่นำมานับรวม</span></h4>
  <h4><strong>2.2.20.3.</strong><span>
  จำนวนลูกเตะเข้าประตู</span></h4>
  <h5><strong>2.2.20.3.1.</strong><span>
  แฮนดิแคป และแฮนดิแคปครึ่งแรก</span>
    <p class="h7"><strong class="style3">2.2.20.3.1.1.</strong><span>
  แฮนดิแคป หมายถึง การเดิมพันว่าทีมจะใดได้ลูกเตะเข้าประตูมากที่สุดระหว่าง การแข่งขันที่รวมการแฮนดิแคปใดๆ</span></p>
    <p class="h7"><strong class="style3">2.2.20.3.1.2.</strong><span>
 แฮนดิแคป และแฮนดิแคปครึ่งแรก</span></p>
  </h5>
  <h5>
    <p class="h7"><strong class="style3">2.2.20.3.1.3.</strong><span>
  การเดิมพันแฮนดิแคปครึ่งแรกจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิกในระหว่างครึ่งแรก อย่างไรก็ตาม การเดิมพันจะยังคงใช้ได้อยู่ถ้านัดการแข่งขันถูกยกเลิกในระหว่างครึ่งที่สอง</span></p>
  </h5>
 <h5><strong>2.2.20.3.2.</strong><span>
  สูง/ตํ่า และสูง/ตํ่าครึ่งแรก</span>
    <p class="h7"><strong class="style3">2.2.20.3.2.1.</strong><span>
  สูง/ต่ำ หมายถึง การเดิมพันจำนวนลูกเตะเข้าประตูทั้งหมดที่เกิดขึ้นจากทั้งสองทีม ในระหว่างการแข่งขัน</span></p>
    <p class="h7"><strong class="style3">2.2.20.3.2.2.</strong><span>
  สูง/ตํ่าครึ่งแรก หมายถึง การเดิมพันที่จำนวนรวมของการยิงประตูโดยทั้งสองทีม ในระหว่างครึ่งแรกของนัดการแข่งขัน</span></p>
  </h5>
  <h5>
    <p class="h7"><strong class="style3">2.2.20.3.2.3.</strong><span>
  ถ้าคะแนนรวมมากกว่าเส้นสูงต่ำ ผลชนะเลิศคือสูง ถ้าคะแนนรวมน้อยกว่าเส้นสูงต่ำ ผลชนะเลิศคือต่ำ</span></p>
  </h5>
  <h5>
  <p class="h7"><strong class="style3">2.2.20.3.2.4.</strong><span>
  การเดิมพันจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิก เว้นแต่ว่าได้มีการกำหนดผลลัพธ์การเดิมพันแล้ว</span></p>
  </h5>
  <h4><strong>2.2.20.4.</strong><span>
  ลูกเตะเข้าประตูลูกแรก &amp; 2nd Half First Goal kick</span></h4>
  <h5><strong>2.2.20.4.1.</strong><span>
  ลูกเตะเข้าประตูลูกแรก หมายถึง การเดิมพันว่าทีมใดจะได้ลูกเตะมุมลูกแรก ในการแข่งขัน</span></h5>
  <h5><strong>2.2.20.4.2.</strong><span>
  2nd Half First Goal kick means betting on which team will take the first goal kick in the 2nd half of a match.</span></h5>
  <h5><strong>2.2.20.4.3.</strong><span>
  ถ้าการแข่งขันถูกยกเลิกหลังจากลูกเตะเข้าประตูลูกแรกเกิดขึ้น การเดิมพันทั้งหมด จะยังมีผลต่อไป ถ้าการแข่งขันถูกยกเลิกก่อนลูกเตะเข้าประตูลูกแรกเกิดขึ้น การเดิมพันทั้งหมดถือเป็นโมฆะ</span></h5>
  <h4><strong>2.2.20.5.</strong><span>
  ลูกเตะเข้าประตูลูกสุดท้าย</span></h4>
  <h5><strong>2.2.20.5.1.</strong><span>
  ลูกเตะเข้าประตูลูกสุดท้าย หมายถึง การเดิมพันว่าทีมใดจะได้ลูกเตะเข้าประตู ลูกสุดท้ายในการแข่งขัน</span></h5>
  <h5><strong>2.2.20.5.2.</strong><span>
  ถ้าการแข่งขันถูกยกเลิก การเดิมพันทั้งหมดถือเป็นโมฆะ </span></h5>
  <h4><strong>2.2.20.6.</strong><span>
  การยิงประตูครั้งต่อไป</span></h4>
  <h5><strong>2.2.20.6.1.</strong><span>
  การยิงประตูครั้งต่อไป หมายถึง การเดิมพันว่าทีมใดจะเป็นทีมที่ยิงประตูครั้งต่อไป ในนัดการแข่งขัน</span></h5>
  <h5><strong>2.2.20.6.2.</strong><span>
   การเดิมพันทั้งหมดจะถือว่าตรงถ้ามีการยิงประตูตามที่คาดการณ์ไว้</span></h5>
  <h3><strong>2.2.21.</strong><span>
  การทุ่มลูก</span></h3>
  <h4><strong>2.2.21.1.</strong><span>
  การทุ่มลูกจะถูกตัดสินให้กับทีม ถ้าลูกบอลข้ามพ้นเส้นข้าง ซึ่งเป็นผลมาจาก การสัมผัสตัวผู้เล่นฝ่ายรุก</span></h4>
  <h4><strong>2.2.21.2.</strong><span>
  จำนวนลูกทุ่ม</span></h4>
  <h5><strong>2.2.21.2.1.</strong><span>
  แฮนดิแคป และแฮนดิแคปครึ่งแรก</span>
    <p class="h7"><strong class="style3">2.2.21.2.1.1.</strong><span>
  แฮนดิแคป หมายถึง การเดิมพันว่าทีมใดจะได้ลูกทุ่มมากที่สุดระหว่าง การแข่งขันที่รวมการแฮนดิแคปใดๆ</span></p>
    <p class="h7"><strong class="style3">2.2.21.2.1.2.</strong><span>
แฮนดิแคปครึ่งแรก หมายถึง การเดิมพันว่าทีมใดจะมีการทุ่มบอลมากที่สุด ระหว่างครึ่งแรกของนัดการแข่งขัน ซึ่งรวมแฮนดิแคปใด ๆ ด้วย</span></p>
  </h5>
  <h5>
    <p class="h7"><strong class="style3">2.2.21.2.1.3.</strong><span>
  การเดิมพันแฮนดิแคปครึ่งแรกจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิกในระหว่างครึ่งแรก อย่างไรก็ตาม การเดิมพันจะยังคงใช้ได้อยู่ถ้านัดการแข่งขันถูกยกเลิกในระหว่างครึ่งที่สอง</span></p>
  </h5>
  <h5><strong>2.2.21.2.2.</strong><span>
  สูง/ตํ่า และสูง/ตํ่าครึ่งแรก</span>
    <p class="h7"><strong class="style3">2.2.21.2.2.1.</strong><span>
  สูง/ต่ำ หมายถึง การเดิมพันจำนวนลูกทุ่มทั้งหมดที่เกิดขึ้นจากทั้งสองทีม ในระหว่างการแข่งขัน</span></p>
    <p class="h7"><strong class="style3">2.2.21.2.2.2.</strong><span>
   สูง/ตํ่าครึ่งแรก หมายถึง การเดิมพันที่จำนวนรวมของการทุ่มบอลโดยทั้งสองทีม ในระหว่างครึ่งแรกของนัดการแข่งขัน</span></p>
  </h5>
  <h5>
    <p class="h7"><strong class="style3">2.2.21.2.2.3.</strong><span>
  ถ้าคะแนนรวมมากกว่าเส้นสูงต่ำ ผลชนะเลิศคือสูง ถ้าคะแนนรวมน้อยกว่าเส้นสูงต่ำ ผลชนะเลิศคือต่ำ</span></p>
    <p class="h7"><strong class="style3">2.2.21.2.2.4.</strong><span>
   การเดิมพันจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิก เว้นแต่ว่าได้มีการกำหนดผลลัพธ์การเดิมพันแล้ว</span></p>
  </h5>
  <h4><strong>2.2.21.3.</strong><span>
  ลูกทุ่มลูกแรก &amp; 2nd Half First Throw-in</span></h4>
  <h5><strong>2.2.21.3.1.</strong><span>
  ลูกทุ่มลูกแรก หมายถึง การเดิมพันว่าทีมใดจะได้ลูกทุ่มลูกแรกในการแข่งขัน </span></h5>
  <h5><strong>2.2.21.3.2.</strong><span>
  2nd Half First throw-in means betting on which team will take the first throw-in in the 2nd half of a match.</span></h5>
  <h5><strong>2.2.21.3.3.</strong><span>
  ถ้าการแข่งขันถูกยกเลิกหลังจากลูกทุ่มลูกแรกเกิดขึ้น การเดิมพันทั้งหมด จะยังมีผลต่อไป ถ้าการแข่งขันถูกยกเลิกก่อนลูกทุ่มลูกแรกเกิดขึ้น การเดิมพันทั้งหมดถือเป็นโมฆะ </span></h5>
  <h4><strong>2.2.21.4.</strong><span>
  ลูกทุ่มลูกสุดท้าย </span></h4>
  <h5><strong>2.2.21.4.1.</strong><span>
  ลูกทุ่มลูกสุดท้าย หมายถึง การเดิมพันว่าทีมใดจะได้ลูกทุ่มลูกสุดท้ายในการแข่งขัน</span></h5>
  <h5><strong>2.2.21.4.2.</strong><span>
  ถ้าการแข่งขันถูกยกเลิก การเดิมพันทั้งหมดถือเป็นโมฆะ</span></h5>
  <h4><strong>2.2.21.5.</strong><span>
  การทุ่มบอลครั้งต่อไป</span></h4>
  <h5><strong>2.2.21.5.1.</strong><span>
  การทุ่มบอลครั้งต่อไป หมายถึง การเดิมพันว่าทีมใดจะเป็นทีมที่ทุ่มบอลครั้งต่อไป ในนัดการแข่งขัน</span></h5>
  <h5><strong>2.2.21.5.2.</strong><span>
  การเดิมพันทั้งหมดจะถือว่าตรงถ้ามีการทุ่มบอลตามที่คาดการณ์ไว้</span></h5>
  <h3><strong>2.2.22.</strong><span>
   สูง/ตํ่า (O/U) 10 นาทีเจาะจง</span></h3>
  <h4><strong>2.2.22.1.</strong><span>
  The Specific 10-Minute (OU) means betting that is determined by the total number of points (goals, corners, games, cards etc.) at the end of every 10th minute [INTERVAL OF] time of a match.</span></h4>
  <h4><strong>2.2.22.2.</strong><span>
  If the total is more than the Over/Under pre-designated line then the winning result is Over; if the total is less than the Over/Under pre-designated line then the winning result is Under.</span></h4>
  <h4><strong>2.2.22.3.</strong><span>
  For example:</span></h4>  
  <h5 class="style1"><strong>10<sup>th</sup> Minute OU</strong><br>
    00:00 – 10:00 O/U: Total number of points to be scored from 00:00 till 10:00.<br>
    All bets must be placed on or before the end of the 10th minute.</h5>
  <h5 class="style1"><strong>20<sup>th</sup> Minute OU</strong><br>
    10:01 – 20:00 O/U: Total number of points to be scored from 10:01 till 20:00.<br>
    All bets must be placed on or before the end of the 20th minute.</h5>
  <h5 class="style1"><strong>30<sup>th</sup> Minute OU</strong><br>
    20:01 – 30:00 O/U: Total number of points to be scored from 20:01 till 30:00.<br>
    All bets must be placed on or before the end of the 30th minute.</h5>
    <h5 class="style1"><strong>40<sup>th</sup> Minute OU</strong><br>
    30:01 – 40:00 O/U: Total number of points to be scored from 30:01 till 40:00.<br>
    All bets must be placed on or before the end of the 40th minute.</h5>
    <h5 class="style1"><strong>60<sup>th</sup> Minute OU</strong><br>
    50:01 – 60:00 O/U: Total number of points to be scored from 50:01 till 60:00.<br>
    All bets must be placed on or before the end of the 60th minute.</h5>
  <h5 class="style1"><strong>70<sup>th</sup> Minute OU</strong><br>
    60:01 – 70:00 O/U: Total number of points to be scored from 60:01 till 70:00.<br>
    All bets must be placed on or before the end of the 70th minute.</h5>
    <h5 class="style1"><strong>80<sup>th</sup> Minute OU</strong><br>
    70:01 – 80:00 O/U: Total number of points to be scored from 70:01 till 80:00.<br>
    All bets must be placed on or before the end of the 80th minute.</h5>
   <h5 class="style1"><strong>90<sup>th</sup> Minute OU</strong><br>
    80:01 - 90:00 O/U: Total number of points to be scored from 80:01 till 90:00.<br>
    All bets must be placed on or before the end of the 90th minute.</h5>
  <h4><strong>2.2.22.4.</strong><span>
  For the Specific 10-Minutes O/U, bets are settled on the exact time the goal is scored (ball crossing the goal line)  , number of corners (corners taken) and Total Bookings (cards given by the official referee) as shown by the clock as published in the live broadcast.</span></h4>
  <h4><strong>2.2.22.5.</strong><span>
  If a match is suspended or abandoned, then bets placed on unfinished Specific 10-Minute OU will be considered void. If the designated Specific 10-Minute O/U are completed then bets will be valid.</span></h4>
  <h4><strong>2.2.22.6.</strong><span>
  ในสอง (2) นาทีสุดท้ายของการเดิมพันสดสูงตํ่า (O/U) เฉพาะ 10 นาที การดำเนินการใดซึ่งนอกเหนือจากที่ระบุไว้ด้านล่างนี้ จะถือว่าเป็นการเล่นที่ปลอดภัย (Safe Play) ดังนั้นการเดิมพันทั้งหมดที่ค้างไว้อยู่จะถือว่ายอมรับได้: ทำประตู ลูกโทษ และใบแดง</span></h4>
   <h4><strong>2.2.22.7.</strong><span>
  For 80:01-90:00, bets are settled on the exact time the goal is scored ( ball crossing the goal line) , number of corners (corners taken) and Total bookings (cards given by the official referee) as shown by the clock as published in the live broadcast excluding any additional time or injury time.</span></h4>
  <h3><strong>2.2.23.</strong><span>
  Futsal Rules</span></h3>
  <h4><strong>2.2.23.1.</strong><span>
  All bets are based on the result at the end of the scheduled <strong>40 minutes (2 x 20 minutes)</strong> regulation time. Extra-time or penalties <strong>DOES NOT</strong> count. </span></h4>
  <h4><strong>2.2.23.2.</strong><span>
   If a match is postponed, or is suspended and is not resumed on the same day, then all bets will be considered void. </span></h4>
  <h4><strong>2.2.23.3.</strong><span>
   If a match begins before the scheduled time then only bets made before the actual kick-off will be considered valid. All bets placed after the starting time will be considered void, except for Live Betting.</span></h4>
  <h3><strong>2.2.24.</strong><span>
  Top Goal Scorer</span></h3>
  <h4><strong>2.2.24.1.</strong><span>
  ผู้ยิงประตูได้สูงสุดในลีก</span></h4>
  <h5><strong>2.2.24.1.1.</strong><span>
  ผู้ยิงประตูได้สูงสุดในลีก หมายถึงการเดิมพันเพื่อทำนายว่าผู้เล่นคนใดจะยิงประตูได้สูงสุดในฤดูการแข่งขันปกติของลีก</span></h5>
  <h5><strong>2.2.24.1.2.</strong><span>
  ในกรณีที่ผู้เล่นเข้าร่วมสโมสรอื่นในลีกเดียวกันระหว่างกลางฤดูการแข่งขัน ประตูทั้งหมดที่ยิงได้ขณะที่อยู่ในคลับต่าง ๆ จะนับรวมเข้าด้วยกัน แต่จะไม่นับรวมประตูซึ่งยิงเข้าโดยผู้เล่นในนัดการแข่งขันภายนอกลีก</span></h5>
  <h5><strong>2.2.24.1.3.</strong><span>
   ประตูซึ่งยิงเข้าระหว่างการแข่งขันรอบตัดเชือกและการยิงลูกโทษ จะไม่นับรวม</span></h5>
  <h5><strong>2.2.24.1.4.</strong><span>
  การยิงเข้าประตูฝ่ายตนเองจะไม่นับรวมในจำนวนประตูที่ผู้เล่นทำได้</span></h5>
  <h5><strong>2.2.24.1.5.</strong><span>
  การเดิมพันผู้เล่นซึ่งยังไม่ได้ลงแข่งจะยังคงใช้การได้อยู่ ผู้เล่นซึ่งยังไม่ได้ลงแข่งคือผู้เล่นซึ่งไม่มีการรวมชื่อไว้ในทีมรอบสุดท้าย สำหรับฤดูการแข่งขันปัจจุบันของลีก</span></h5>
  <h5><strong>2.2.24.1.6.</strong><span>
   ถ้าผู้เล่นถอนตัวหรือถูกโอนย้ายไปสโมสรอื่นในลีกที่แตกต่างกัน ก่อนเริ่มต้นฤดูการแข่งขัน จะมีการคืนเงินเดิมพันผู้เล่นที่ถอนตัวหรือถูกโอนย้าย</span></h5>
  <h5><strong>2.2.24.1.7.</strong><span>
   ในกรณีที่เสมอกัน เงินส่วนแบ่ง (หักเงินเดิมพัน) จะหารด้วยจำนวนผู้ชนะและจ่ายตามนั้น พร้อมคืนเงินเดิมพัน</span></h5>
  <h4><strong>2.2.24.2.</strong><span>
   ผู้ยิงประตูสูงสุดสำหรับการแข่งขันหรือเหตุการณ์</span></h4>
  <h5><strong>2.2.24.2.1.</strong><span>
  ผู้ยิงประตูได้สูงสุดสำหรับการแข่งขันหรือเหตุการณ์ หมายถึงการเดิมพันเพื่อทำนายว่าผู้เล่นคนใดจะยิงประตูได้สูงสุดในสำหรับการแข่งขันหรือเหตุการณ์</span></h5>
  <h5><strong>2.2.24.2.2.</strong><span>
  การยิงเข้าประตูฝ่ายตนเองและการยิงลูกโทษจะไม่นับรวมในจำนวนประตูที่ผู้เล่นทำได้ อย่างไรก็ตาม จะนับรวมประตูซึ่งยิงได้ระหว่างช่วงการต่อเวลา</span></h5>
  <h5><strong>2.2.24.2.3.</strong><span>
  การเดิมพันผู้เล่นซึ่งยังไม่ได้ลงแข่งจะยังคงใช้การได้อยู่ ผู้เล่นซึ่งยังไม่ได้ลงแข่งคือผู้เล่นซึ่งไม่มีการรวมชื่อไว้ในทีมรอบสุดท้าย สำหรับการแข่งขันหรือเหตุการณ์</span></h5>
  <h5><strong>2.2.24.2.4.</strong><span>
  ถ้าผู้เล่นถอนตัวหรือถูกโอนย้ายไปสโมสรอื่นในการแข่งขันหรือเหตุการณ์ที่แตกต่างกัน ก่อนเริ่มต้นฤดูการแข่งขัน จะมีการคืนเงินการเดิมพันผู้เล่นที่ถอนตัวหรือถูกโอนย้าย</span></h5>
  <h5><strong>2.2.24.2.5.</strong><span>
  ในกรณีที่เสมอกัน เงินส่วนแบ่ง (หักเงินเดิมพัน) จะหารด้วยจำนวนผู้ชนะและจ่ายตามนั้น พร้อมคืนเงินเดิมพัน</span></h5>
  <h4><strong>2.2.24.3.</strong><span>
  Players Head to Head Match Top Goal Scorer</span></h4>
  <h5><strong>2.2.24.3.1.</strong><span>
  ไม่่นับการยิงเข้าประตูตัวเองและประตูที่ทำได้ในการยิงลูกโทษ ไม่รวมการต่อเวลาพิเศษและไม่นำมานับสำหรับจุดประสงค์ของการเดิมพัน</span></h5>
  <h5><strong>2.2.24.3.2.</strong><span>
  If a player does not start/play in the match, all bets will be considered Void.</span></h5>
  <h5><strong>2.2.24.3.3.</strong><span>
  All results are taken when the official result is declared at the end of the match by the governing body.</span></h5>
  <h3><strong>2.2.25.</strong><span>
  Injury Time</span></h3>
  <h4><strong>2.2.25.1.</strong><span>
  Injury time means the extra playing time added on to compensate for time spent attending to injured players during the match. The injury time may be awarded during the end of the 1st half or the end of the 2nd half, and the duration may be as follows:</span></h4>
  <h5 class="style1"><strong>None</strong><br>
  </h5>
  <h5 class="style1"><strong>1 minute</strong><br>
  </h5>
  <h5 class="style1"><strong>2 minutes</strong><br>
  </h5>
  <h5 class="style1"><strong>3 minutes</strong><br>
  </h5>
  <h5 class="style1"><strong>4+ minutes</strong><br>
  </h5>
  <h4><strong>2.2.25.2.</strong><span>
  Injury Time Awarded at the End of 1st Half</span></h4> 
  <h5><strong>2.2.25.2.1.</strong><span>
  All bets placed are based on the full 45-minute play excluding extra time. Bets are settled on the Injury time awarded by the match fourth official referee after the full 45 minutes of play or at end of 1st half.</span></h5>
  <h5><strong>2.2.25.2.2.</strong><span>
   If a match is abandoned at any time during the 1st Half, all bets on Injury Time Awarded at the end of 1st Half will be considered void and bets will be refunded to the member’s accounts.</span></h5>
  <h4><strong>2.2.25.3.</strong><span>
  Injury Time awarded at the End of the 2nd Half	</span></h4> 
  <h5><strong>2.2.25.3.1.</strong><span>
   All bets placed are based on the full 90-minute play excluding extra time. Bets are settled on the Injury time awarded by the match fourth official referee after the full 90 minutes of play or at end of 2nd half.</span></h5>
  <h5><strong>2.2.25.3.2.</strong><span>
  If a match is abandoned at any time, all bets on Injury Time Awarded at the end of 2nd Half will be considered void and bets will be refunded to the member’s accounts.</span></h5>
  <h4><strong>2.2.25.4.</strong><span>
  The Company will settle bets according to the official results made available by the soccer authority responsible for organizing the match.</span></h4> 
  <h3><strong>2.2.26.</strong><span>
  โชคสองต่อ และโชคสองต่อครึ่งแรก</span></h3>
  <h4><strong>2.2.26.1.</strong><span>
  มีตัวเลือกดังต่อไปนี้</span></h4>
  <h4><strong>*</strong><span>
  1 หรือ X - ถ้าผลลัพธ์คือเจ้าบ้านหรือเสมอ หากวางเดิมพันตัวเลือกนี้ ก็จะชนะได้รับเงิน</span></h4>
  <h4><strong>*</strong><span>
  X หรือ 2 - ถ้าผลลัพธ์คือเสมอหรือเยือน หากวางเดิมพันตัวเลือกนี้ ก็จะชนะได้รับเงิน </span></h4>
  <h4><strong>*</strong><span>
  1 หรือ 2 - ถ้าผลลัพธ์คือเจ้าบ้านหรือเยือน หากวางเดิมพันตัวเลือกนี้ ก็จะชนะได้รับเงิน</span></h4>
  <h4><strong>*</strong><span>
  ถ้าแมทช์ใดแข่งขันในสนามแข่งที่เป็นกลาง ทีมที่ระบุชื่อก่อนถือว่าเป็นทีมเจ้าบ้านสำหรับจุดประสงค์ในการเดิมพัน </span></h4>
  <h3><strong>2.2.27.</strong><span>
  ได้เงินคืนหากเสมอ</span></h3>

  <h4><strong>2.2.27.1.</strong><span>
  ทายผลว่าทีมเหย้าหรือทีมเยือนจะชนะ หากผลการแข่งขันภายหลังจาก หมดเวลาการแข่งขันตามปกติ หรือตามกำหนดระยะเวลาการแข่งขันออกมาเป็นผลเสมอ เงินเดิมพันทั้งหมด จะจ่ายคืนให้ผู้เล่น </span></h4>

  <h3><strong>2.2.28.</strong><span>
  ทั้งสองทีม/หนึ่งทีม /ไม่มีทีมใดที่ทำคะแนนได้</span></h3>
  <h4><strong>*</strong><span>
  ทั้งสองทีม= ทั้งสองทีมทำคะแนนได้</span></h4>
  <h4><strong>*</strong><span>
  หนึ่งทีม= ทีมใดทีมหนึ่งทำคะแนนได้</span></h4>
  <h4><strong>*</strong><span>
  ไม่ทั้งสองทีม= ไม่มีทีมใดที่ทำคะแนนได้ </span></h4>
  <h4><strong>2.2.28.1.</strong><span>
  ถ้ามีการยกเลิกการแข่งขันหลังจากยิงประตูโดยทีมเจ้าบ้านเท่านั้น การเดิมพัน "ไม่มีทีมใด" (Neither) จะยังใช้ได้อยู่ ส่วนการเดิมพัน "ทั้งสอง" (Both) และ "ทีมเดียว" (One) จะเป็นโมฆะ  ถ้าการแข่งขันถูกยกเลิกหลังจากยิงประตูโดยทีมเยือนเท่านั้น การเดิมพัน "ไม่มีทีมใด" (Neither) จะยังใช้ได้อยู่ ส่วนการเดิมพัน "ทั้งสอง" (Both) และ "ทีมเดียว" (One) จะเป็นโมฆะ  ถ้าการแข่งขันถูกยกเลิกหลังจากยิงประตูโดยทั้งทีมเจ้าบ้านและทีมเยือน การเดิมพันทั้งหมดจะยังใช้ได้อยู่ ถ้าการแข่งขันถูกยกเลิกโดยไม่มีการยิงประตู การเดิมพันทั้งหมดจะเป็นโมฆะ</span></h4>
  <h5><strong>กติกาข้อที่1：</strong><span> <br>
  คะแนนเจ้าบ้าน ≥ 1, คะแนนทีมเยือน = 0  (1, 2..:0)<br>
  ทั้งสอง – คืนเงิน<br>
  ทีมเดียว – คืนเงิน<br>
  ไม่มีทีมใด - แพ้<br>
  </span></h5>
  <h5><strong>กติกาข้อที่2：</strong><span> <br>
  คะแนนเจ้าบ้าน ≥ 1, คะแนนทีมเยือน ≥ 1 (1, 2: 1, 2…)<br>
  ทั้งสอง – ชนะ<br>
  ทีมเดียว – แพ้<br>
  ไม่มีทีมใด - แพ้<br>
  </span></h5>
  <h5><strong>กติกาข้อที่3：</strong><span> <br>
  คะแนนทีมเจ้าบ้าน = 0, คะแนนทีมเยือน ≥ 1  (0:1, 2…)<br>
  ทั้งสอง – คืนเงิน<br>
  ทีมเดียว – คืนเงิน<br>
  ไม่มีทีมใด – แพ้<br>
  </span></h5>
  <h3><strong>2.2.29.</strong><span>
  ชนะโดยไม่เสียประตู </span></h3>
  <h4><strong>2.2.29.1.</strong><span>
  เดาว่าทีมที่คุณเลือกจะชนะโดยไม่เสียประตูหลังเล่นจบเวลาปกติหรือเมื่อสิ้นสุดเวลาตามที่กำหนดไว้ โดยไม่รวมการต่อเวลาพิเศษ หรือการยิงลูกโทษ </span></h4>
  <h4><strong>2.2.29.2.</strong><span>
   ถ้ามีการยกเลิกการแข่งขันหลังจากที่ได้ทำประตูแล้วโดยทีมเจ้าบ้านเท่านั้น การเดิมพัน "ทีมเยือน" (Away) จะยังใช้ได้อยู่ ส่วนการเดิมพัน "ทีมเจ้าบ้าน" (Home) จะเป็นโมฆะ ถ้ามีการยิงประตูเข้าโดยทีมผู้มาเยือนเท่านั้น การเดิมพัน "ทีมเจ้าบ้าน" (Home) จะยังใช้ได้อยู่ ส่วนการเดิมพัน "ทีมเยือน" (Away) จะเป็นโมฆะ ถ้ามีการยิงประตูเข้าโดยทั้งทีมเจ้าบ้านและทีมผู้มาเยือน การเดิมพันทั้งหมดจะคงอยู่ ในกรณีที่การแข่งขันถูกยกเลิกโดยไม่มีการยิงประตู การเดิมพันทั้งหมดจะเป็นโมฆะ</span></h4>
  <h5><strong>กติกาข้อที่1：</strong><span> <br>
  คะแนนเจ้าบ้าน ≥ 1, คะแนนทีมเยือน = 0  (1, 2..:0)<br>
  เจ้าบ้าน – คืนเงิน		　ทีมเยือน – แพ้<br>
  </span></h5>
  <h5><strong>กติกาข้อที่2：</strong><span> <br>
  คะแนนเจ้าบ้าน ≥ 1, คะแนนทีมเยือน ≥ 1 (1, 2…: 1, 2…)<br>
  เจ้าบ้าน – แพ้		　ทีมเยือน – แพ้	<br>
  </span></h5>
  <h5><strong>กติกาข้อที่3：</strong><span> <br>
  คะแนนทีมเจ้าบ้าน = 0, คะแนนทีมเยือน ≥ 1  (0:1, 2…)<br>
  เจ้าบ้าน – แพ้		　ทีมเยือน – คืนเงิน<br>
  </span></h5>
  <h3><strong>2.2.30.</strong><span>
  แฮนดิแคป 3 ทาง</span></h3>
  <h4><strong>2.2.30.1.</strong><span>
  จะตัดสินจากแต้มต่อที่แสดงโดยใช้คะแนนจริงในการแข่งขันที่ปรับสำหรับแฮนดิแคป </span></h4>
  <h3><strong>2.2.31.</strong><span>
  ชนะครึ่งแรกหรือครึ่งหลัง</span></h3>
  <h4><strong>2.2.31.1.</strong><span>
  เดาว่าทีมที่คุณเลือกจะทำประตูได้มากกว่าฝ่ายตรงข้ามในครึ่งใดครึ่งหนึ่งหรือไม่</span></h4>
  
<h4><strong>2.2.31.2.</strong><span> ทีมเจ้าบ้านชนะครึ่งใดครึ่งหนึ่ง</span></h4>
<h4><strong>2.2.31.2.1.</strong><span> ทีมเจ้าบ้านชนะครึ่งใดครึ่งหนึ่ง หมายถึง การเดิมพันเพื่อทายว่าทีมเจ้าบ้านจะสามารถทำประตูได้มากกว่าฝ่ายตรงข้ามในครึ่งใดครึ่งหนึ่งหรือไม่</span></h4>
<h4><strong>2.2.31.2.2.</strong><span> การเดิมพันจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิก เว้นแต่ว่าได้มีการกำหนดผลลัพธ์การเดิมพันแล้ว</span></h4>
<h4><strong>2.2.31.3.</strong><span> ทีมเยือนชนะครึ่งใดครึ่งหนึ่ง</span></h4>
<h4><strong>2.2.31.3.1.</strong><span> ทีมเยือนชนะครึ่งใดครึ่งหนึ่ง หมายถึง การเดิมพันเพื่อทายว่าทีมเยือนจะสามารถทำประตูได้มากกว่าฝ่ายตรงข้ามในครึ่งใดครึ่งหนึ่งหรือไม่</span></h4>
<h4><strong>2.2.31.3.2.</strong><span> การเดิมพันจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิก เว้นแต่ว่าได้มีการกำหนดผลลัพธ์การเดิมพันแล้ว</span></h4>
  
  <h3><strong>2.2.32.</strong><span>
  ชนะทั้งครึ่งแรกและครึ่งหลัง</span></h3>
  <h4><strong>2.2.32.1.</strong><span>
  เดาว่าทีมที่คุณเลือกจะทำประตูได้มากกว่าฝ่ายตรงข้ามในแต่ละครึ่งเวลาหรือไม่</span></h4>
  <h5><span>ตัวอย่างเช่น ถ้าทีมที่คุณเลือกทำคะแนนในครึ่งแรกของการแข่งขัน และการแข่งขันสิ้นสุดที่ 1-0 แม้ว่าในครึ่งแรกจะชนะ 1-0 แต่ถ้าคะแนนในช่วง 45 นาทีหลังเท่ากับ 0-0 ผลลัพธ์คือเสมอ ถ้าเกิดเหตุการณ์เช่นนี้ จะถือว่าครึ่งแรกเท่านั้นที่ชนะ และเงินเดิมพันทั้งหมดจะเสียไป</span></h5>
  
<h4><strong>2.2.32.2.</strong><span> ทีมเจ้าบ้านชนะทั้งสองครึ่ง</span></h4>
<h4><strong>2.2.32.2.1.</strong><span> ทีมเจ้าบ้านชนะทั้งสองครึ่ง หมายถึง การเดิมพันเพื่อทายว่าทีมเจ้าบ้านจะสามารถทำประตูได้มากกว่าฝ่ายตรงข้ามในแต่ละครึ่งหรือไม่</span></h4>
<h4><strong>2.2.32.2.2.</strong><span> การเดิมพันจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิก เว้นแต่ว่าได้มีการกำหนดผลลัพธ์การเดิมพันแล้ว</span></h4>
<h4><strong>2.2.32.3.</strong><span> ทีมเยือนชนะทั้งสองครึ่ง</span></h4>
<h4><strong>2.2.32.3.1.</strong><span> ทีมเยือนชนะทั้งสองครึ่ง หมายถึง การเดิมพันเพื่อทายว่าทีมเยือนจะสามารถทำประตูได้มากกว่าฝ่ายตรงข้ามในแต่ละครึ่งหรือไม่</span></h4>
<h4><strong>2.2.32.3.2.</strong><span> การเดิมพันจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิก เว้นแต่ว่าได้มีการกำหนดผลลัพธ์การเดิมพันแล้ว</span></h4>
  
  <h3><strong>2.2.33.</strong><span>
  ทีมที่ทำคะแนนสูงสุด</span></h3>
    <h4><strong>2.2.33.1.</strong><span>ทีมที่ทำคะแนนสูงสุดจะเป็นผู้ชนะ</span></h4>
    <h4><strong>2.2.33.2.</strong><span>จะไม่มีการนับรวมผลต่างประตู</span></h4>
    <h4><strong>2.2.33.3.</strong><span>หากทีมทั้งสองมีแต้มเสมอกัน จะใช้กฎการเสมอกัน (Dead Heat)</span></h4>
     <h5><strong>ตัวอย่าง :</strong><br>
    <span>แมนซิตี้ 4 สวอนซี 4</span><br>
    <span>ลิเวอร์พูล 4 ซันเดอร์แลนด์ 1 </span><br>
    <span>นั่นหมายความว่า ลิเวอร์พูล แมนซิตี้ และสวอนซีคือผู้ชนะ</span></h5>
    <h4><strong>2.2.33.4.</strong><span>การยกเลิกและการเลื่อนเวลา </span></h4>
    <h5><strong>2.2.33.4.1.</strong><span> การเดิมพันสำหรับทีมที่การแข่งขันถูกยกเลิกหรือเลื่อน (และไม่มีการจัดตารางใหม่ภายในระยะเวลาที่บริษัทกำหนด) จะถือว่าโมฆะ</span></h5>
    <h4><strong>2.2.33.5.</strong><span>จะไม่นับรวมการทำประตูระหว่างช่วงยิงลูกโทษ</span></h4>
    <h4><strong>2.2.33.6.</strong><span>สำหรับตลาดที่อ้างถึงการแข่งขัน จะนับรวมการทำประตูในช่วงต่อเวลาด้วย </span></h4>
    <h4><strong>2.2.33.7.</strong><span>สำหรับตลาดที่อ้างถึงการแข่งขันที่กำหนดเวลาและสถานที่เฉพาะ จะไม่นับรวมการทำประตูในช่วงต่อเวลา </span></h4>
  <h3><strong>2.2.34.</strong><span>
  Exact First Half Goals</span></h3>
  <h4><strong>2.2.34.1.</strong><span>
  Exact First Half Goal means betting to predict the total number of goals scored by both teams by the end of the first half.</span></h4>
  <h4><strong>2.2.34.2.</strong><span>
  If an event is abandoned before the end of the first half, all bets are considered void.</span></h4>
  <h3><strong>2.2.35.</strong><span>
  Exact Group Points:</span></h3>
  <h4><strong>2.2.35.1.</strong><span>
  Exact Group Points means betting on a team to get a specific number of total points at the end of the Group round.</span></h4>
  <h3><strong>2.2.36.</strong><span>
  ทายผลกลุ่มที่มีการทำประตูสูงที่สุด</span></h3>
  <h4><strong>2.2.36.1.</strong><span>
  เป็นการวางเดิมพันในการทายผลจำนวนการทำประตูรวมที่เกิดขึ้นในกลุ่ม ภายในวันที่กำหนด</span></h4>
  <h4><strong>2.2.36.2.</strong><span>
  ในกรณีที่กลุ่มที่มีคะแนนสูงสุดมีคะแนนเท่ากันมากกว่าหนึ่งกลุ่ม จะจ่ายเงินรางวัลตามกฎ Dead Heat rules</span></h4>
  <h4><strong>ตัวอย่าง:</strong><br>
  กลุ่ม A <br>
  <span> โปแลนด์ -vs- กรีก</span><span>2 - 1 = 3 ประตู</span><br>
  <span>รัสเซีย -vs- เช็ก</span><span>3 - 2 = 5 ประตู</span><br>
  ผลประตูรวมกลุ่ม A: 8ประตู<br>
  ผลประตูรวมกลุ่ม B: 7ประตู<br>
  ผลประตูรวมกลุ่ม C: 7ประตู<br>
  ผลประตูรวมกลุ่ม D: 6ประตู<br>
  <strong>กลุ่ม A เป็นผู้ชนะ</strong><br> </h4> 
  <h3><strong>2.2.37.</strong><span>
  ทายผลคะแนนรอบแบ่งกลุ่ม</span></h3>
  <h4><strong>2.2.37.1.</strong><span>
  เป็นการวางเดิมพันโดยทายผลคะแนนรวมของทีมเมื่อสิ้นสุดการแข่งขันรอบแบ่งกลุ่ม โดยจะต้องทายผลให้ตรงกับตัวเลือกดังต่อไปนี้ ได้แก่ "ต่ำกว่า", "ระหว่าง" และ "สูงกว่า" </span></h4>
  <h4><strong>ตัวอย่าง:</strong><br>
  คะแนนรวมของทีม X คือ5คะแนน<br>
  ในกรณีที่วางเดิมพันเป็น:<br>
  <span>ต่ำกว่า 3คะแนน – แพ้</span><br>
  <span>ระหว่าง 3-4 คะแนน – แพ้</span><br>
  <span>สูงกว่า 4 คะแนน – ชนะ</span><br></h4>
  <h3><strong>2.2.38.</strong><span>
   ทายอันดับของทีมในรอบแบ่งกลุ่ม</span></h3>
  <h4><strong>2.2.38.1.</strong><span>
   เป็นการวางเดิมพันในการทายว่าทีมใดจะเป็นอันดับที่หนึ่งและอันดับที่สองของกลุ่มเมื่อสิ้นสุดการแข่งขันรอบแบ่งกลุ่ม โดยจะต้องระบุชื่อทีมและอันดับให้ถูกต้อง  </span></h4>
  <h3><strong>2.2.39.</strong><span>
  Injury time awarded Over/Under</span></h3>
  <h4><strong>2.2.39.1.</strong><span>
  Injury time awarded at end of 1st half Over/Under:</span></h4>
  <h5><strong>2.2.39.1.1.</strong><span>
  1st Half Injury Time Over/Under means betting Over/Under on the injury time awarded at the end of 1st half.</span></h5>
  <h5><strong>2.2.39.1.2.</strong><span>
  If the total is more than the OU line then the winning result is Over; if the total is less than the OU line then the winning result is Under.</span></h5>
  <h5><strong>2.2.39.1.3.</strong><span>
  Bets are settled on the injury time awarded by the match fourth official referee after the full 45 minutes of play or at end of 1st half.</span></h5>
  <h4><strong>2.2.39.2.</strong><span>
  Injury time awarded at end of 2nd half Over/Under</span></h4>
  <h5><strong>2.2.39.2.1.</strong><span>
  2nd Half Injury Time Over/Under means betting Over/Under on the injury time awarded at the end of 2nd half.</span></h5>
  <h5><strong>2.2.39.2.2.</strong><span>
  If the total is more than the OU line then the winning result is Over; if the total is less than the OU line then the winning result is Under.</span></h5>
  <h5><strong>2.2.39.2.3.</strong><span>
  Bets are settled on the injury time awarded by the match fourth official referee after the full 90 minutes of play or at end of 2nd half.</span></h5>
  <h3><strong>2.2.40.</strong><span>
  First Goal Method</span></h3>
  <h4><strong>2.2.40.1.</strong><span>
  Means predicting the way the first goal of a match is scored by either team.</span></h4>
  <h5><strong>2.2.40.1.1.</strong><span>
  Free-kick - Goal must be scored directly from the free kick. Deflected shots count provided the free-kick taker is awarded the goal. Also includes goals scored directly from a corner kick.</span></h5>
  <h5><strong>2.2.40.1.2.</strong><span>
  Penalty - Goal must be scored directly from the penalty, with penalty taker as named scorer.</span></h5>
  <h5><strong>2.2.40.1.3.</strong><span>
  Own Goal - If goal is declared as an own goal.</span></h5>
  <h5><strong>2.2.40.1.4.</strong><span>
  Header - Last touch of the scorer must be with the head.</span></h5>
  <h5><strong>2.2.40.1.5.</strong><span>
  Shot - All other goal-types not included above.</span></h5>
  <h5><strong>2.2.40.1.6.</strong><span>
  No Goal</span></h5>
  <h4><strong>2.2.40.2.</strong><span>
  The Company will settle bets according to the official results made available by the soccer authority responsible for organizing the match.</span></h4>
  <h3><strong>2.2.41.</strong><span>
  Penalty Shootout – Will the Penalty be Scored?</span></h3>
  <h4><strong>2.2.41.1.</strong><span>
  Means betting to predict if a designated kick-taker will score or miss on penalty kick during penalty shooutout.</span></h4>
  <h4><strong>2.2.41.2.</strong><span>
  If penalty kick is not taken, then all bets will be considered void.</span></h4>
  <h3><strong>2.2.42.</strong><span>
  Dual Forecast</span></h3>
  <h4><strong>2.2.42.1.</strong><span>
  Dual Forecast means betting to predict the two (2) teams which must be in top 2 positions, in any order, at the end of the tournament.</span></h4>
  <h3><strong>2.2.43.</strong><span>
  การทายผลโดยตรง	</span></h3>
  <h4><strong>2.2.43.1.</strong><span>
  การทายผลโดยตรง เป็นการเดิมพันโดยเลือกทายผลของสอง  (2) ทีม ที่จะสิ้นสุดทัวร์นาเมนท์การแข่งขันในสองอันดับสูงสุด โดยที่จะต้องเลียงลำดับก่อนหลังให้ถูกต้องด้วย </span></h4>
  <h3><strong>2.2.44.</strong><span>
  ทีมใหม่อันดับสูงสุด (Top Newcomer)</span></h3>
  <h4><strong>2.2.44.1.</strong><span>
  ทีมใหม่อันดับสูงสุด หมายถึง การทายผลว่าทีมใดจะมีอันดับสูงสุดในฐานะทีมใหม่ เมื่อสิ้นสุดรายการแข่งขัน  </span></h4>
  <h4><strong>2.2.44.2.</strong><span>
  “ทีมใหม่” คือ ทีมที่เพิ่งได้รับการเลื่อนชั้นให้เข้าร่วมการแข่งขันหรือทัวร์นาเมนต์</span></h4>
  <h3><strong>2.2.45.</strong><span>
  ผู้ชนะระดับภูมิภาค (Regional Winner)</span></h3>
  <h4><strong>2.2.45.1.</strong><span>
  ผู้ชนะระดับภูมิภาค หมายถึง การวางเดิมพันโดยเลือกผู้ชนะของการแข่งขันหรือทัวร์นาเมนท์จากภูมิภาคที่เลือก</span></h4>
  <h4><strong>2.2.45.2.</strong><span>
  ผลการตัดสินจะถือตามผลที่ประกาศอย่างเป็นทางการเมื่อสิ้นสุดทัวร์นาเมนท์โดยองค์การกำกับดูแลที่เกี่ยวข้อง </span></h4>
  
  <h3><strong>2.2.46.</strong><span>
  ไม่มีการวางเดิมพันทีมเหย้า </span></h3>
  <h4><strong>2.2.46.1.</strong><span>
  ทายผลเสมอหรือทีมเยือนจะชนะ หากผลการแข่งขันภายหลังจาก หมดเวลาการแข่งขันตามปกติ หรือตามกำหนดระยะเวลาการแข่งขันออกมาโดยทีมเหย้าเป็นฝ่ายชนะ เงินเดิมพันทั้งหมด จะจ่ายคืนให้ผู้เล่น </span></h4>  
  <h3><strong>2.2.47.</strong><span>
  ไม่มีการวางเดิมพันทีมเยือน </span></h3>
  <h4><strong>2.2.47.1.</strong><span>
  ทายผลเสมอหรือทีมเหย้าจะชนะ หากผลการแข่งขันภายหลังจาก หมดเวลาการแข่งขันตามปกติ หรือตามกำหนดระยะเวลาการแข่งขันออกมาโดยทีมเยือนเป็นฝ่ายชนะ เงินเดิมพันทั้งหมดจะจ่ายคืนให้ผู้เล่น</span></h4>  
  <h3><strong>2.2.48.</strong><span>
  เสมอ / ไม่เสมอ</span></h3>
  <h4><strong>2.2.48.1.</strong><span>
  ทายผลเป็นเสมอหรือไม่เสมอจากผลการแข่งขันภายหลังจาก หมดเวลาการแข่งขันตามปกติ หรือตามกำหนดระยะเวลาการแข่งขัน</span></h4>
  <h3><strong>2.2.49.</strong><span>
  คะแนนถูกต้องในครึ่งแรก</span></h3>
  <h4><strong>2.2.49.1.</strong><span>
  คะแนนถูกต้องในครึ่งแรก หมายถึง การเดิมพันโดยทายผลคะแนนสุดท้ายเมื่อสิ้นสุดครึ่งแรกของการแข่งขัน</span></h4>
  <h4><strong>2.2.49.2.</strong><span>
  การเดิมพันจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิก เว้นแต่ว่าได้มีการกำหนดผลลัพธ์การเดิมพันแล้ว</span></h4>
  <h3><strong>2.2.50.</strong><span>
  Result/Total Goal</span></h3>
  <h4><strong>2.2.50.1.</strong><span>
   Result/Total Goal means betting to both predict:</span></h4>
  <h5><strong>(A)</strong><span>
  whether a match will result in Home win or Away win or Draw; and</span></h5>
  <h5><strong>(B)</strong><span>
  whether the total number of goals in the final result of an event will be Over or Under. </span></h5>
  <h4><strong>2.2.50.2.</strong><span>
  The following betting options are available:</span></h4>
  <h5 class="style1">
      <ol><li>Home &amp; Over – bet wins if home team wins and the total goals are above pre-designated line.</li>
          <li>Home &amp; Under – bet wins if home team wins and the total goals are below pre-designated line.</li>
          <li>Away &amp; Over – bet wins if away team wins and the total goals are above pre-designated line.</li>
          <li>Away &amp; Under - bet wins if away team wins and the total goals are below pre-designated line.</li>
          <li>Draw &amp; Over – bet wins if the match results in draw and the total goals are above pre-designated line.</li>
          <li>Draw &amp; Under – bet wins if the match results in draw and the total goals are below pre-designated line.</li>
       </ol>
  </h5> 
  <h3><strong>2.2.51.</strong><span>
  Team to Win From Behind</span></h3>
  <h4><strong>2.2.51.1.</strong><span>
  Team to Win From Behind means betting to predict the team that will be losing at any time in the match but eventually comes from behind and win at the end of 90 minutes.</span></h4>
  <h3><strong>2.2.52.</strong><span>
  ผู้ทำประตูแรก</span></h3>
  <h4><strong>2.2.52.1.</strong><span>
  ผู้ทำประตูแรก หมายถึง การเดิมพันเพื่อทายว่าผู้เล่นคนใดจะทำประตูได้เป็นคนแรกในการแข่งขัน</span></h4>
  <h4><strong>2.2.52.2.</strong><span>
  การเดิมพันผู้เล่นที่ไม่ได้ลงแข่งขัน ถือเป็นโมฆะและจะได้รับเงินคืน</span></h4>
  <h4><strong>2.2.52.3.</strong><span>
  การเดิมพันผู้เล่นที่เข้ามาเป็นตัวแทนเฉพาะหลังจากการทำคะแนนในประตูแรก ถือว่าเป็นโมฆะและจะได้รับเงินคืน</span></h4>
  <h4><strong>2.2.52.4.</strong><span>
  การเตะลูกเข้าประตูตัวเองไม่นับว่าเป็นประตูแรก ในกรณีนี้ ถือว่าผู้เล่นคนต่อไปที่ทำคะแนนคือผู้ทำประตูแรก</span></h4>
  <h4><strong>2.2.52.5.</strong><span>
  ถ้าผู้เล่นถูกเลือกหลังจากการทำคะแนนในประตูแรก การเดิมพันจะถือว่าเป็นโมฆะ นอกจากว่า ผู้ทำประตูแรกได้เตะลูกเข้าประตูตัวเอง ในกรณีนี้ การเดิมพันจะดำเนินต่อไป</span></h4>
  <h4><strong>2.2.52.6.</strong><span>
  การเดิมพันผู้เล่นที่ถูกเปลี่ยนตัวหรือออกจากสนามก่อนการทำประตูแรก จะถือว่าแพ้</span></h4>
  <h4><strong>2.2.52.7.</strong><span>
  การวางเดิมพัน “ไม่มีผู้ทำประตู” จะชนะถ้าไม่มีผู้ใดทำประตูในการแข่งขัน กรณีที่มีเฉพาะการเตะลูกเข้าประตูตัวเอง ถือว่าการเดิมพัน “ไม่มีผู้ทำประตู” ชนะ</span></h4>
   <h3><strong>2.2.53.</strong><span>
  First Team to Score 2 Goals</span></h3>
  <h4><strong>2.2.53.1.</strong><span>
  Means betting to predict which team will be the first to score two (2) goals in a match.</span></h4>
  <h5 class="style1">
      <ol><li>Home</li>
          <li>Away</li>
          <li>Neither</li></ol>
  </h5> 
  <h4><strong>2.2.53.2.</strong><span>
   If a match is abandoned after a team has scored two (2) goals, all bets will stand.</span></h4>
  <h4><strong>2.2.53.3.</strong><span>
  If a match is abandoned before any team has scored two (2) goals, all bets will be void.</span></h4>
  <h3><strong>2.2.54.</strong><span>
  First Team to Score 3 Goals</span></h3>
  <h4><strong>2.2.54.1.</strong><span>
  Means betting to predict which team will be the first to score three (3) goals in a match.</span></h4>
  <h5 class="style1">
      <ol><li>Home</li>
          <li>Away</li>
          <li>Neither</li></ol>
  </h5> 
  <h4><strong>2.2.54.2.</strong><span>
   If a match is abandoned after a team has scored three (3) goals, all bets will stand.</span></h4>
  <h4><strong>2.2.54.3.</strong><span>
  If a match is abandoned before any team has scored three (3) goals, all bets will be void.</span></h4>
  <h3><strong>2.2.55.</strong><span>
  Time of First Goal</span></h3>
  <h4><strong>2.2.55.1.</strong><span>
  Means betting to predict in which time bracket the first goal will be scored.</span></h4>
  <h4><strong>2.2.55.2.</strong><span>
  The following time brackets/betting options are available:</span></h4>
  <h5 class="style1">
      <ol><li>00:00 - 10:00</li>
          <li>10:01 - 20:00</li>
          <li>20:01 - 30:00</li>
          <li>30:01 - 40:00</li>
          <li>40:01 - 50:00</li>
          <li>50:01 - 60:00</li>
          <li>60:01 - 70:00</li>
          <li>70:01 - 80:00</li>
          <li>80:01 – Full Time</li>
          <li>No goal</li></ol>
  </h5>
  <h4><strong>2.2.55.3.</strong><span>
   If a match is abandoned after the first goal has been scored, all bets will stand.</span></h4>
  <h4><strong>2.2.55.4.</strong><span>
   If a match is abandoned before the first goal has been scored, all bets will be void. </span></h4>
   <h3><strong>2.2.56.</strong><span>
  Which Half Will Produce The First Goal</span></h3>
  <h4><strong>2.2.56.1.</strong><span>
  Means betting to predict on which half of the match the first goal will be scored.</span></h4>
  <h4><strong>2.2.56.2.</strong><span>
  The following betting options are available:</span></h4>
  <h5 class="style1">
      <ol><li>First half</li>
          <li>Second half</li>
          <li>No goal</li></ol>
  </h5>
  <h4><strong>2.2.56.3.</strong><span>
   If a match is subsequently abandoned after the first goal has been scored during the first half, all bets will stand.</span></h4>
  <h4><strong>2.2.56.4.</strong><span>
   If a match is abandoned at any time before the first goal has been scored, all bets will be void. " </span></h4>
  <h3><strong>2.2.57.</strong><span>
  ทั้งสองทีมทำคะแนน/ผลลัพธ์ และทั้งสองทีมทำคะแนน/ผลลัพธ์ครึ่งเวลา</span></h3>
  <h4><strong>2.2.57.1.</strong><span>
  Both teams to score / result means betting to both predict:</span></h4>
  <h5><strong>(A)</strong><span>
  whether a match will result in both teams scoring and;</span></h5>
  <h5><strong>(B)</strong><span>
  whether a match will result in Home Win or Away win or Draw.</span></h5>
  <h4><strong>2.2.57.2.</strong><span>
  The following betting options are available:</span></h4>
  <h5 class="style1">
      <ol><li>Yes &amp; Home - bet wins if both teams score and Home team wins.</li>
          <li>Yes &amp; Away - bet wins if both teams score and Away team wins.</li>
          <li>Yes &amp; Draw - bet wins if both teams score and the match results in Draw.</li>
      </ol>
  </h5>
  <h4><strong>2.2.57.3.</strong><span>
  ทั้งสองทีมทำคะแนน/ผลลัพธ์ครึ่งเวลา หมายถึง การเดิมพันเพื่อทายผลลัพธ์ของการแข่งขันครึ่งแรก และทายว่าทีมทั้งสองจะทำคะแนนในครึ่งแรกได้หรือไม่</span></h4>
  <h4><strong>2.2.57.4.</strong><span>
  การเดิมพันจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิก เว้นแต่ว่าได้มีการกำหนดผลลัพธ์การเดิมพันแล้ว</span></h4>
    <h3><strong>2.2.58.</strong><span>
   คู่/คี่ ครึ่งเวลา/เต็มเวลาของนัดการแข่งขัน</span></h3>
  <h4><strong>2.2.58.1.</strong><span>
  คู่/คี่ ครึ่งเวลา/เต็มเวลาของนัดการแข่งขัน หมายถึง การเดิมพันเพื่อทายว่าผลลัพธ์ครึ่งเวลาและผลลัพธ์เต็มเวลาของนัดการแข่งขันจะเป็นแบบคี่และคี่ คี่และคู่ คู่และคี่ หรือคู่และคู่</span></h4>
  <h4><strong>2.2.58.2.</strong><span>
  สามารถเดิมพันได้สี่ (4) ทางเลือกคือ</span></h4>
  <h5 class="style1">
      <ol><li>คี่/คี่</li>
          <li>คี่/คู่</li>
          <li>คู่/คี่</li>
          <li>คู่/คู่</li>
      </ol>
  </h5>
  <h4><strong>2.2.58.3.</strong><span>
   สำหรับการเดิมพันประเภทนี้ เวลาพิเศษที่เพิ่มขึ้นจะไม่นับรวมเพื่อจุดประสงค์ในการพิจารณาผลลัพธ์เต็มเวลาของการแข่งขันนัดใดนัดหนึ่ง</span></h4>
  <h4><strong>2.2.58.4.</strong><span>
การเดิมพันจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิก เว้นแต่ว่าได้มีการกำหนดผลลัพธ์การเดิมพันแล้ว</span></h4>
  <h3><strong>2.2.59.</strong><span>
  Half with Most Away Team Goal: </span></h3>
  <h4><strong>2.2.59.1.</strong><span>
  Means betting to predict in which half of the match the Away Team will score more goals.</span></h4>
  <h4><strong>2.2.59.2.</strong><span>
  The following options are available:</span></h4>
  <h5 class="style1">
      <ol><li>1st Half</li>
          <li>2nd Half</li>
          <li>Tie</li>
      </ol>
  </h5>
  <h3><strong>2.2.60.</strong><span>
  Half with Home Team Score the First Goal</span></h3>
  <h4><strong>2.2.60.1.</strong><span>
  Means betting to predict in which half of the match the Home Team will score the First Goal.</span></h4>
  <h4><strong>2.2.60.2.</strong><span>
  The following options are available:</span></h4>
  <h5 class="style1">
      <ol><li>1st Half</li>
          <li>2nd Half</li>
          <li>No Goal</li>
      </ol>
  </h5>
  <h3><strong>2.2.61.</strong><span>
  Half with Away Team Score the First Goal</span></h3>
  <h4><strong>2.2.61.1.</strong><span>
  Means betting to predict which half of the match the Away Team will score the First Goal.</span></h4>
  <h4><strong>2.2.61.2.</strong><span>
  The following options are available:</span></h4>
  <h5 class="style1">
      <ol><li>1st Half</li>
          <li>2nd Half</li>
          <li>No Goal</li>
      </ol>
  </h5>
   <h3><strong>2.2.62.</strong><span>
  Specific 15-Minute Handicap  (HDP)</span></h3>
  <h4><strong>2.2.62.1.</strong><span>
  The Specific  15-minute Handicap means betting when one competitor or team receives a virtual head start .The winner is the competitor or team with the better score after adding the given handicap to the result at the end of every 15th minute (INTERVAL OF) time of a match.</span></h4>
  <h4><strong>2.2.62.2.</strong><span>
  For example:</span></h4>
  <h5 class="style1"><strong>15th Minute HDP</strong><br>
  00:00 – 15:00 HDP: The winner is the competitor or team with the better score from 00:00 till 15:00.<br>
  All bets must be placed on or before the end of the 15th minute.</h5>
  <h5 class="style1"><strong>30th Minute HDP</strong><br>
  15:01 – 30:00 HDP: The winner is the competitor or team with the better score from 15:01 till 30:00.<br>
  All bets must be placed on or before the end of the 30th minute.</h5>
  <h5 class="style1"><strong>45th Minute HDP</strong><br>
  30:01- 45:00 HDP: The winner is the competitor or team with the better score from 30:01 - 45:00.<br>
  All bets must be placed on or before the end of 45th minute.</h5>
  <h5 class="style1"><strong>60th Minute HDP</strong><br>
  45:01 – 60:00 HDP: The winner is the competitor or team with the better score from 45:01 till 60:00.<br>
  All bets must be placed on or before the end of the 60th minute.</h5>
  <h5 class="style1"><strong>75th Minute HDP</strong><br>
  60:01 – 75:00 HDP: The winner is the competitor or team with the better score from 60:01 till 75:00.<br>
  All bets must be placed on or before the end of the 75th minute.</h5>
  <h5 class="style1"><strong>90th Minute HDP</strong><br>
  75:01- 90:00 HDP: The winner is the competitor or team with the better score from 75:01 till 90:00.<br>
  All bets must be placed on or before the end of the 90th minute.</h5>
  <h4><strong>2.2.62.3.</strong><span>
  For the Specific 15-Minute HDP, bets are settled on the exact time the goal is scored (ball crossing the goal line), number of corners (corners taken) and Total Bookings (cards given by the official referee) as shown by the clock as published in the live broadcast.</span></h4>
  <h4><strong>2.2.62.4.</strong><span>
  If a match is suspended or abandoned, then bets placed on unfinished Specific 15-Minute HDP will be considered void. If the designated Specific 15-Minute HDP are completed then bets will be valid.</span></h4>
  <h4><strong>2.2.62.5.</strong><span>
  ในสอง (2) นาทีสุดท้ายของการเดิมพันสดแฮนดิแคบ (HDP) เฉพาะ 15 นาที การดำเนินการใด ซึ่งนอกเหนือจากที่ระบุไว้ด้านล่างนี้ จะถือว่าเป็นการเล่นที่ปลอดภัย (Safe Play) ดังนั้นการเดิมพันทั้งหมดที่ค้างไว้อยู่จะถือว่ายอมรับได้: ทำประตู ลูกโทษ และใบแดง</span></h4>
  <h4><strong>2.2.62.6.</strong><span>
  For 30:01-45:00 &amp; 75:01 - 90:00, bets are settled on the exact time the goal is scored ( ball crossing the goal line) , number of corners (corners taken) and Total bookings (cards given by the official referee) as shown by the clock as published in the live broadcast excluding any additional time or injury time.</span></h4>
  <h3><strong>2.2.63.</strong><span>
  แฟนตาซีแมช: ทีมทำแต้มก่อน</span></h3>
  <h4><strong>2.2.63.1.</strong><span>
  แฟนตาซีแมช: ทีมทำแต้มก่อน หมายถึง การเดิมพันเพื่อทายว่าผู้เล่นคนใดจะทำประตูได้เป็นคนแรกในการแข่งขันแฟนตาซีแมช</span></h4>
  <h4><strong>ตัวอย่าง</strong></h4>
  <h5 class="style1">นัดการแข่งขัน: แมนฯ ซิตี้ กับ ลิเวอร์พูล; เชลซี กับ แมนฯ ยูไนเต็ด<br>
  แฟนตาซีแมช: แมนฯ ซิตี้ กับ เชลซี<br>
  แมนฯ ซิตี้ ทำประตูแรกได้ที่ 25:10<br>
  เชลซี ทำประตูแรกได้ที่ 25:48<br>
  เดิมพันที่ชนะ: แมนฯ ซิตี้<br></h5>
  <h4><strong>2.2.63.2.</strong><span>
  ถ้าทั้งสองนัดทำประตูได้ในเวลาเดียวกัน (นาทีและวินาที) หรือไม่มีการทำประตูจากทั้งสองนัด แฟนตาซีแมชนั้นจะถูกตัดสินโดยการจับฉลาก</span></h4>
  <h4><strong>2.2.63.3.</strong><span>
   ถ้านัดการแข่งขันหนึ่งถูกเลื่อนหรือยกเลิกหลังจากที่ได้มีการทำประตูแรกในการแข่งขันอีกนัดหนึ่ง การเดิมพันทั้งหมดจะยังคงอยู่ ถ้านัดการแข่งขันหนึ่งถูกเลื่อนหรือยกเลิกก่อนที่จะมีการทำประตูแรกในการแข่งขันอีกนัดหนึ่ง การเดิมพันทั้งหมดจะเป็นโมฆะ</span></h4>
  <h4><strong>ตัวอย่าง</strong></h4>
  <h5 class="style1">นัดการแข่งขัน: แมนฯ ซิตี้ กับ ลิเวอร์พูล; เชลซี กับ แมนฯ ยูไนเต็ด<br>
  แฟนตาซีแมช: แมนฯ ซิตี้ กับ เชลซี<br>
  แมนฯ ซิตี้ ทำประตูแรกได้ที่ 25:10<br>
  นัดการแข่งขันของเชลซีถูกเลือกหรือยกเลิกก่อนนาทีที่ 25:10 <br>
  ผลลัพธ์: การเดิมพันทั้งหมดจะเป็นโมฆะ<br></h5>  
  <h4><strong>2.2.63.4.</strong><span>
   ถ้านัดการแข่งขันทั้งสองถูกยกเลิกโดยไม่มีการทำประตู การเดิมพันทั้งหมดจะเป็นโมฆะ</span></h4>
  <h4><strong>2.2.63.5.</strong><span>
   จะไม่นับการทำประตูระหว่างการต่อเวลาพิเศษ</span></h4>
  <h3><strong>2.2.64.</strong><span>
  ทีมยุโรปอันดับสูงสุด</span></h3>
  <h4><strong>2.2.64.1.</strong><span>
  ทีมยุโรปอันดับสูงสุด หมายถึง การเดิมพันว่าทีมจากยุโรปทีมใดจะไปได้ไกลที่สุดในการแข่งขันฟุตบอลโลก FIFA</span></h4>
  <h4><strong>2.2.64.2.</strong><span>
  ถ้าทีมจากยุโรปสองทีมลงแข่งขันในรอบชิงชนะเลิศหรือรอบรองชนะเลิศ ผู้ชนะการแข่งขันจะได้ตำแหน่งทีมยุโรปอันดับสูงสุด </span></h4>
  <h4><strong>2.2.64.3.</strong><span>
  ในกรณีอื่น ๆ ซึ่งมีทีมจากยุโรปมากกว่าหนึ่งทีมออกจากการแข่งขันในรอบเดียวกันและไกลที่สุด จะปรับใช้กติกา "ร้อนระอุ" (Dead Heat) และรางวัลการเดิมพัน (ลบจำนวนเดิมพัน) จะหารด้วยจำนวนผู้ชนะแล้วจ่ายรางวัลตามนั้น พร้อมคืนเงินเดิมพัน</span></h4>
  <h4><strong>2.2.64.4.</strong><span>
  การเดิมพันทั้งหมดสำหรับทีมยุโรปอันดับสูงสุดจะจ่ายรางวัลหลังจากที่ได้มีการประกาศผู้ชนะอย่างเป็นทางการของรอบชิงชนะเลิศหรือรอบรองชนะเลิศโดย FIFA หรือเมื่อทีมสุดท้ายของยุโรปออกจากการแข่งขัน</span></h4>
  
  <h3><strong>2.2.65.</strong><span>
  ทีมอเมริกาใต้อันดับสูงสุด</span></h3>
  <h4><strong>2.2.65.1.</strong><span>
  ทีมอเมริกาใต้อันดับสูงสุด หมายถึง การเดิมพันว่าทีมจากอเมริกาใต้ทีมใดจะไปได้ไกลที่สุดในการแข่งขันฟุตบอลโลก FIFA</span></h4>
  <h4><strong>2.2.65.2.</strong><span>
   ถ้าทีมจากอเมริกาใต้สองทีมลงแข่งขันในรอบชิงชนะเลิศหรือรอบรองชนะเลิศ ผู้ชนะการแข่งขันจะได้ตำแหน่งทีมอเมริกาใต้อันดับสูงสุด </span></h4>
  <h4><strong>2.2.65.3.</strong><span>
  ในกรณีอื่น ๆ ซึ่งมีทีมจากอเมริกาใต้มากกว่าหนึ่งทีมออกจากการแข่งขันในรอบเดียวกันและไกลที่สุด จะปรับใช้กติกา "ร้อนระอุ" (Dead Heat) และรางวัลการเดิมพัน (ลบจำนวนเดิมพัน) จะหารด้วยจำนวนผู้ชนะแล้วจ่ายรางวัลตามนั้น พร้อมคืนเงินเดิมพัน</span></h4>
  <h4><strong>2.2.65.4.</strong><span>
  การเดิมพันทั้งหมดสำหรับทีมอเมริกาใต้อันดับสูงสุดจะจ่ายรางวัลหลังจากที่ได้มีการประกาศผู้ชนะอย่างเป็นทางการของรอบชิงชนะเลิศหรือรอบรองชนะเลิศโดย FIFA หรือเมื่อทีมสุดท้ายของอเมริกาใต้ออกจากการแข่งขัน</span></h4>
  
  <h3><strong>2.2.66.</strong><span>
  ทีมแอฟริกาอันดับสูงสุด</span></h3>
  <h4><strong>2.2.66.1.</strong><span>
  ทีมแอฟริกาอันดับสูงสุด หมายถึง การเดิมพันว่าทีมจากแอฟริกาทีมใดจะไปได้ไกลที่สุดในการแข่งขันฟุตบอลโลก FIFA</span></h4>
  <h4><strong>2.2.66.2.</strong><span>
  ถ้าทีมจากแอฟริกาสองทีมลงแข่งขันในรอบชิงชนะเลิศหรือรอบรองชนะเลิศ ผู้ชนะการแข่งขันจะได้ตำแหน่งทีมแอฟริกาอันดับสูงสุด  </span></h4>
  <h4><strong>2.2.66.3.</strong><span>
  ในกรณีอื่น ๆ ซึ่งมีทีมจากแอฟริกามากกว่าหนึ่งทีมออกจากการแข่งขันในรอบเดียวกันและไกลที่สุด จะปรับใช้กติกา "ร้อนระอุ" (Dead Heat) และรางวัลการเดิมพัน (ลบจำนวนเดิมพัน) จะหารด้วยจำนวนผู้ชนะแล้วจ่ายรางวัลตามนั้น พร้อมคืนเงินเดิมพัน</span></h4>
  <h4><strong>2.2.66.4.</strong><span>
  การเดิมพันทั้งหมดสำหรับทีมแอฟริกาอันดับสูงสุดจะจ่ายรางวัลหลังจากที่ได้มีการประกาศผู้ชนะอย่างเป็นทางการของรอบชิงชนะเลิศหรือรอบรองชนะเลิศโดย FIFA หรือเมื่อทีมสุดท้ายของแอฟริกาออกจากการแข่งขัน</span></h4>
  
  <h3><strong>2.2.67.</strong><span>
  ทั้งสองทีมทำคะแนน</span></h3>
  <h4><strong>2.2.67.1.</strong><span>
  ทีมทั้งสองทำคะแนน หมายถึง การเดิมพันเพื่อทายว่าผลลัพธ์การแข่งขันจะเป็นการทำคะแนนโดยทั้งสองทีมหรือไม่</span></h4>
  
  <h4><strong>2.2.67.2.</strong><span> การเดิมพันจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิก เว้นแต่ว่าได้มีการกำหนดผลลัพธ์การเดิมพันแล้ว</span></h4>
  
  <h3><strong>2.2.68.</strong><span>
  ทั้งสองทีมทำคะแนนในครึ่งแรก</span></h3>
  <h4><strong>2.2.68.1.</strong><span>
  ทั้งสองทีมทำคะแนนในครึ่งแรก หมายถึง การเดิมพันเพื่อทายว่าทั้งสองทีมจะทำคะแนนในการแข่งขันครึ่งแรกหรือไม่</span></h4>
  <h4><strong>2.2.68.2.</strong><span>
  ถ้าการแข่งขันถูกยกเลิกหลังจากที่ทั้งสองทีมได้ทำคะแนนในครึ่งแรกแล้ว กรณีเช่นนั้น การเดิมพันว่า "ใช่" จะเป็นฝ่ายชนะ และการเดิมพันว่า "ไม่" จะเป็นฝ่ายแพ้ ถ้าการแข่งขันถูกเลื่อนหรือยกเลิกก่อนสิ้นสุดครึ่งแรกโดยที่ไม่มีทีมใดทำคะแนน การเดิมพันทั้งหมดจะเป็นโมฆะ</span></h4>

  <h3><strong>2.2.69.</strong><span>
  ทั้งสองทีมทำคะแนนในครึ่งหลัง</span></h3>
  <h4><strong>2.2.69.1.</strong><span>
  ทั้งสองทีมทำคะแนนในครึ่งหลัง หมายถึง การเดิมพันเพื่อทายว่าทั้งสองทีมจะทำคะแนนในการแข่งขันครึ่งหลังหรือไม่</span></h4>
  <h4><strong>2.2.69.2.</strong><span>
  ถ้าการแข่งขันถูกยกเลิกหลังจากที่ทั้งสองทีมได้ทำคะแนนในครึ่งหลังแล้ว กรณีเช่นนั้น การเดิมพันว่า "ใช่" จะเป็นฝ่ายชนะ และการเดิมพันว่า "ไม่" จะเป็นฝ่ายแพ้ ถ้าการแข่งขันถูกเลื่อนหรือยกเลิกโดยที่ไม่มีทีมใดทำคะแนน การเดิมพันทั้งหมดจะเป็นโมฆะ</span></h4>


  <h3><strong>2.2.70.</strong><span>
  ทั้งสองทีมทำคะแนนในครึ่งแรก และ/หรือ ครึ่งหลัง</span></h3>
  <h4><strong>2.2.70.1.</strong><span>
  ทั้งสองทีมทำคะแนนในครึ่งแรก และ/หรือ ครึ่งหลัง หมายถึง การเดิมพันเพื่อทายว่าทั้งสองทีมจะทำคะแนนในครึ่งแรกของการแข่งขันหรือไม่ และทั้งสองทีมจะทำคะแนนในครึ่งหลังของการแข่งขันหรือไม่</span></h4>
  <h4><strong>2.2.70.2.</strong><span>
  การเดิมพันจะเป็นโมฆะถ้าการแข่งขันถูกยกเลิก เว้นแต่ว่าทั้งสองทีมทำคะแนนได้แล้วในครึ่งแรกและครึ่งหลังของการแข่งขัน</span></h4>

  <h3><strong>2.2.71.</strong><span>
  ทั้งสองทีมทำคะแนน/รวมจำนวนประตู</span></h3>
  <h4><strong>2.2.71.1.</strong><span>
  ทั้งสองทีมทำคะแนน/รวมจำนวนประตู หมายถึง การเดิมพันเพื่อทายจำนวนรวมของการยิงเข้าประตูในการแข่งขัน และทายว่าทั้งสองทีมจะทำคะแนนในการแข่งขันหรือไม่</span></h4>
  <h4><strong>2.2.71.2.</strong><span>
  การเดิมพันจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิก เว้นแต่ว่าได้มีการกำหนดผลลัพธ์การเดิมพันแล้ว</span></h4>

  <h3><strong>2.2.72.</strong><span>
  ผลลัพธ์ครึ่งเวลา/รวมจำนวนประตู</span></h3>
  <h4><strong>2.2.72.1.</strong><span>
  ผลลัพธ์ครึ่งเวลา/รวมจำนวนประตู หมายถึง การเดิมพันเพื่อทำนายทั้งผลลัพธ์ของการแข่งขันครึ่งแรก และจำนวนรวมของการยิงประตูได้ในครึ่งแรก</span></h4>
  <h4><strong>2.2.72.2.</strong><span>
  การเดิมพันจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิกในระหว่างครึ่งแรก การเดิมพันจะยังคงใช้ได้อยู่ถ้านัดการแข่งขันถูกยกเลิกในระหว่างครึ่งที่สอง</span></h4>
  
  <h3><strong>2.2.73.</strong><span>
  เจ้าบ้านทำคะแนนในครึ่งแรก/ทำคะแนนในครึ่งหลัง</span></h3>
  <h4><strong>2.2.73.1.</strong><span>
  เจ้าบ้านทำคะแนนในครึ่งแรก/ทำคะแนนในครึ่งหลัง หมายถึง การเดิมพันเพื่อทำนายว่าทีมเจ้าบ้านจะทำคะแนนในครึ่งแรกและครึ่งหลังของการแข่งขันหรือไม่</span></h4>
  <h4><strong>2.2.73.2.</strong><span>
  การเดิมพันจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิก เว้นแต่ว่าได้มีการกำหนดผลลัพธ์การเดิมพันแล้ว</span></h4>

  <h3><strong>2.2.74.</strong><span>
  ทีมเยือนทำคะแนนในครึ่งแรก/ทำคะแนนในครึ่งหลัง</span></h3>
  <h4><strong>2.2.74.1.</strong><span>
  ทีมเยือนทำคะแนนในครึ่งแรก/ทำคะแนนในครึ่งหลัง หมายถึง การเดิมพันเพื่อทำนายว่าทีมเยือนจะทำคะแนนในครึ่งแรกและครึ่งหลังของการแข่งขันหรือไม่</span></h4>
  <h4><strong>2.2.74.2.</strong><span>
  การเดิมพันจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิก เว้นแต่ว่าได้มีการกำหนดผลลัพธ์การเดิมพันแล้ว</span></h4>
  
  <h3><strong>2.2.75.</strong><span>
  Specific 15 Minutes 1X2</span></h3>
  <h4><strong>2.2.75.1.</strong><span>
  Specific 15 Minutes 1X2 means betting to predict any one of three possible winning outcomes at the end of every 15th minute (INTERVAL OF) time of a match. 1 refers to the team that is named first (usually the home team); X refer to the game resulting in a draw or tie; 2 refers to the team that is named second (usually away team).</span></h4>
  <h4><strong>2.2.75.2.</strong><span>
  For example:</span></h4>
  <h5 class="style1"><strong>15th Minute 1X2</strong><br>
  Predict any one of three possible winning outcomes which is 1X2 from 00:00 – 15:00. All bets must be placed on or before the end of the 15th minute.</h5>
  <h5 class="style1"><strong>30th Minute 1X2</strong><br>
  Predict any one of three possible winning outcomes which is 1X2 from 15:01 – 30:00. All bets must be placed on or before the end of the 30th minute.</h5>
  <h5 class="style1"><strong>45th Minute 1X2</strong><br>
  Predict any one of three possible winning outcomes which is 1X2 from 30:01 – 45:00. All bets must be placed on or before the end of the 45th minute.</h5>
  <h5 class="style1"><strong>60th Minute 1X2</strong><br>
  Predict any one of three possible winning outcomes which is 1X2 from 45:01 – 60:00. All bets must be placed on or before the end of the 60th minute.</h5>
  <h5 class="style1"><strong>75th Minute 1X2</strong><br>
  Predict any one of three possible winning outcomes which is 1X2 from 60:01 – 75:00. All bets must be placed on or before the end of the 75th minute.</h5>
  <h5 class="style1"><strong>90th Minute 1X2</strong><br>
  Predict any one of three possible winning outcomes which is 1X2 from 75:01 – 90:00. All bets must be placed on or before the end of the 90th minute.</h5>
  <h4><strong>2.2.75.3.</strong><span>
  For the Specific 15 Minutes 1X2, bets are settled on the exact time the goal is scored (ball crossing the goal line), number of corners (corners taken) and total bookings (cards given by the official referee) as shown by the clock as published in the live broadcast.</span></h4>
  <h4><strong>2.2.75.4.</strong><span>
  If a match is suspended or abandoned, then bets placed on unfinished Specific 15 Minutes 1X2 will be considered void. If the designated Specific 15 Minutes 1X2 are completed then bets will be valid.</span></h4>
  <h4><strong>2.2.75.5.</strong><span>
  For last two (2) minutes of any Specific 15 Minutes 1X2 live betting, any actions other than the one mentioned herein below, will be considered Safe Play and thus all pending bets placed may be considered for acceptance: a goal, a penalty and red card.</span></h4>
  <h4><strong>2.2.75.6.</strong><span>
  For 30:01 – 45:00 &amp; 75:01 – 90:00, bets are settled on the exact time the goal is scored (ball crossing the goal line), number of corners (corners taken) and total bookings (cards given by the official referee) as shown by the clock as published in the live broadcast excluding any additional time or injury time.</span></h4>
<h3><strong> 2.2.76. </strong><span>
  ทีมใดจะเข้าสู่รอบต่อไป</span></h3>
 <h4><strong> 2.2.76.1. </strong><span>
 ทีมใดจะเข้าสู่รอบต่อไป หมายถึง การเดิมพันเพื่อทายว่าทีมใดเข้าสู่รอบต่อไปของการแข่งขัน</span></h4>
 <h3><strong> 2.2.77. </strong><span>
  แฮนดิแคปเฉพาะ 10 นาที (HDP)</span></h3>
 <h4><strong>2.2.77.1. </strong><span>
  แฮนดิแคปเฉพาะ 10 นาที หมายถึง การเดิมพันเมื่อผู้แข่งขันหรือทีมได้รับโอกาสให้เริ่มก่อน ผู้ชนะคือผู้แข่งขันหรือทีมที่มีคะแนนเหนือกว่าหลังการเพิ่มแฮนดิแคปดังกล่าวในผลลัพธ์ ณ ตอนท้ายของทุก ๆ 10 นาที (ช่วงเวลา) ของการแข่งขัน</span></h4>
 <h4><strong>2.2.77.2. </strong><span>
  เช่น</span></h4>
 <h5 class="style1"><strong>HDP นาทีที่ 10</strong><br>
 00:00 – 10:00 HDP: ผู้ชนะคือผู้แข่งขันหรือทีมที่มีคะแนนเหนือกว่าจากนาทีที่ 00:00 ถึง 10:00 <br>
 การเดิมพันทั้งหมดต้องวางระหว่างหรือก่อนสิ้นสุดนาทีที่ 10</h5>
 <h5 class="style1"><strong>HDP นาทีที่ 20</strong><br>
 10:01 – 20:00 HDP: ผู้ชนะคือผู้แข่งขันหรือทีมที่มีคะแนนเหนือกว่าจาก 10:01 ถึง 20:00<br>
 การเดิมพันทั้งหมดต้องวางระหว่างหรือก่อนสิ้นสุดนาทีที่ 20</h5>
 <h5 class="style1"><strong>HDP นาทีที่ 30</strong><br>
 20:01 – 30:00 HDP: ผู้ชนะคือผู้แข่งขันหรือทีมที่มีคะแนนเหนือกว่าจากนาทีที่ 20:01 ถึง 30:00 <br>
 การเดิมพันทั้งหมดต้องวางระหว่างหรือก่อนสิ้นสุดนาทีที่ 30 </h5>
 <h5 class="style1"><strong>HDP นาทีที่ 40</strong><br>
 30:01 – 40:00 HDP: ผู้ชนะคือผู้แข่งขันหรือทีมที่มีคะแนนเหนือกว่าจาก 30:01 ถึง 40:00 <br>
 การเดิมพันทั้งหมดต้องวางระหว่างหรือก่อนสิ้นสุดนาทีที่ 40 </h5>
 <h5 class="style1"><strong>HDP นาทีที่ 60</strong><br>
 50:01- 60:00 HDP: ผู้ชนะคือผู้แข่งขันหรือทีมที่มีคะแนนเหนือกว่าจาก 50:01 ถึง 60:00 <br>
 การเดิมพันทั้งหมดต้องวางระหว่างหรือก่อนสิ้นสุดนาทีที่ 60</h5>
 <h5 class="style1"><strong>HDP นาทีที่ 70</strong><br>
 60:01- 70:00 HDP: ผู้ชนะคือผู้แข่งขันหรือทีมที่มีคะแนนเหนือกว่าจาก 60:01 ถึง 70:00 <br>
 การเดิมพันทั้งหมดต้องวางระหว่างหรือก่อนสิ้นสุดนาทีที่ 70</h5>
 <h5 class="style1"><strong>HDP นาทีที่ 80</strong><br>
 70:01- 80:00 HDP: ผู้ชนะคือผู้แข่งขันหรือทีมที่มีคะแนนเหนือกว่าจาก 70:01 ถึง 80:00<br>
 การเดิมพันทั้งหมดต้องวางระหว่างหรือก่อนสิ้นสุดนาทีที่ 80 </h5>
 <h5 class="style1"><strong>HDP นาทีที่ 90</strong><br>
 80:01- 90:00 HDP: ผู้ชนะคือผู้แข่งขันหรือทีมที่มีคะแนนเหนือกว่าจาก 80:01 ถึง 90:00 <br>
 การเดิมพันทั้งหมดต้องวางระหว่างหรือก่อนสิ้นสุดนาทีที่ 90 </h5>
 <h4><strong>2.2.77.3. </strong><span>
 สำหรับ HDP เฉพาะ 10 นาที การเดิมพันเกิดขึ้น ณ เวลาอันเฉพาะเจาะจงที่ได้มีการยิงประตู (ลูกบอลผ่านเส้นประตู) จำนวนมุม (การเตะมุม) และจำนวนรวมใบเตือน (ใบเตือนซึ่งให้โดยผู้ตัดสินอย่างเป็นทางการ) ตามที่แสดงบนนาฬิกาในการถ่ายทอดสด </span></h4>
 <h4><strong>2.2.77.4. </strong><span>
 ถ้านัดการแข่งขันถูกระงับหรือยกเลิก การเดิมพัน HDP เฉพาะ 10 นาทีที่ไม่สมบูรณ์นั้น จะถือว่าเป็นโมฆะ การเดิมพันจะถูกต้องถ้า HDP เฉพาะ 10 นาทีที่กำหนดไว้นั้นดำเนินไปอย่างสมบูรณ์ </span></h4>
 <h4><strong>2.2.77.5. </strong><span>
 ในสอง (2) นาทีสุดท้ายของการเดิมพันสดแฮนดิแคบ (HDP) เฉพาะ 10 นาที การดำเนินการใด  ซึ่งนอกเหนือจากที่ระบุไว้ด้านล่างนี้ จะถือว่าเป็นการเล่นที่ปลอดภัย (Safe Play) ดังนั้นการเดิมพันทั้งหมดที่ค้างไว้อยู่จะถือว่ายอมรับได้: ทำประตู ลูกโทษ และใบแดง </span></h4>
 <h4><strong>2.2.77.6. </strong><span>
 สำหรับนาทีที่ 80:01-90:00 การเดิมพันเกิดขึ้น ณ เวลาอันเฉพาะเจาะจงที่ได้มีการยิงประตู (ลูกบอลผ่านเส้นประตู) จำนวนมุม (การเตะมุม) และจำนวนรวมใบเตือน (ใบเตือนซึ่งให้โดยผู้ตัดสินอย่างเป็นทางการ) ตามที่แสดงบนนาฬิกาในการถ่ายทอดสด โดยไม่รวมการเพิ่มเวลาหรือเวลาการบาดเจ็บ</span></h4>
 <h3><strong> 2.2.78. </strong><span>
 ลูกโทษแรกเข้าหรือไม่เข้า</span></h3>
 <h4><strong>2.2.78.1. </strong><span>
  ลูกโทษแรกเข้าหรือไม่เข้า หมายถึง การเดิมพันเพื่อทายว่าการยิงลูกโทษครั้งแรกจะเข้าประตูหรือไม่ </span></h4>
 <h3><strong> 2.2.79. </strong><span>
 ผู้สนับสนุนเสื้อทีมบอลยอดเยี่ยม</span></h3>
 <h4><strong>2.2.79.1. </strong><span>
  ผู้สนับสนุนเสื้อทีมบอลยอดเยี่ยม หมายถึง การเดิมพันเพื่อคาดการณ์ว่าผู้สนับสนุนเสื้อทีมใด จะเป็นทีมที่ชนะการแข่งขัน </span></h4>
 <h3><strong> 2.2.80. </strong><span>
  ทวีปของโคชทีมที่ชนะ</span></h3>
 <h4><strong>2.2.80.1. </strong><span>
 ทวีปของโคชทีมที่ชนะ หมายถึง การเดิมพันเพื่อทายว่าโคชของทีมที่จะชนะการแข่งขัน มาจากทวีปใด </span></h4>
 <h3><strong> 2.2.81. </strong><span>
  ผลต่างการชนะ</span></h3>
 <h4><strong>2.2.81.1. </strong><span>
 ผลต่างการชนะ หมายถึง การเดิมพันเพื่อทายว่าใครจะเป็นผู้ชนะการแข่งขัน และผลต่างการยิงประตูระหว่างทีมเจ้าบ้านและทีมเยือน</span></h4>
 <h4><strong>2.2.81.2. </strong><span>
  ตัวเลือกสำหรับการเดิมพันประเภทนี้ระบุไว้ในเว็บไซต์ เช่น </span></h4>
 <h5 class="style1">
 <ol><li>ทีมเจ้าบ้านชนะ 1 ประตู</li>
 <li>ทีมเจ้าบ้านชนะ 2 ประตู</li>
 <li>ทีมเจ้าบ้านชนะ 3 ประตูหรือมากกว่า</li>
 <li>จำนวนประตูเสมอกัน</li>
 <li>ทีมเยือนชนะ 1 ประตู</li>
 <li>ทีมเยือนชนะ 2 ประตู</li>
 <li>ทีมเยือนชนะ 3 ประตูหรือมากกว่า</li></ol></h5>
 <h4><strong>2.2.81.3. </strong><span>
 สำหรับการเดิมพันประเภทนี้ ไม่นับรวมการต่อเวลาเมื่อคำนวณผลต่างการยิงประตู</span></h4>
 <h3><strong> 2.2.82. </strong><span>
 ยิงเข้าประตูครั้งต่อไป</span></h3>
 <h4><strong>2.2.82.1. </strong><span>
 ยิงเข้าประตูครั้งต่อไป หมายถึง การเดิมพันเพื่อทายว่าทีมใดจะทำประตูครั้งต่อไปในการแข่งขัน</span></h4>
  <h3><strong> 2.2.83. </strong><span>
 รางวัลลูกโทษ</span></h3>
 <h4><strong>2.2.83.1. </strong><span>
 รางวัลลูกโทษ หมายถึง การเดิมพันเพื่อทายว่าจะมีการยิงลูกโทษในการนัดแข่งขันหรือไม่</span></h4>
 <h4><strong>2.2.83.2. </strong><span>
 ตัวเลือกการเดิมพันคือ</span></h4>
 <h5 class="style1">
 <ol><li>มี</li>
 <li> ไม่มี</li></ol></h5>
 
<h3><strong>2.2.84.</strong><span> ครึ่งที่มีการทำคะแนนสูงสุด</span></h3>
<h4><strong>2.2.84.1.</strong><span> ครึ่งที่มีการทำคะแนนสูงสุด หมายถึง การเดิมพันเพื่อทำนายว่าจะมีจำนวนการยิงประตูได้มากสุดในครึ่งใดของการแข่งขัน</span></h4>
<h4><strong>2.2.84.2.</strong><span> ตัวเลือกการเดิมพันคือ</span></h4>
<h5 class="style1"><ol>
<li>  ครึ่งแรก</li>
<li>  ครึ่งที่สอง</li>
<li> เสมอ</li>
</ol></h5>
<h4><strong>2.2.84.3.</strong><span> การเดิมพันจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิก เว้นแต่ว่าได้มีการกำหนดผลลัพธ์การเดิมพันแล้ว</span></h4>
<h4><strong>2.2.84.4.</strong><span> ทีมเจ้าบ้านทำคะแนนสูงสุดในครึ่งใดครึ่งหนึ่ง</span></h4>
<h4><strong>2.2.84.4.1.</strong><span> ทีมเจ้าบ้านทำคะแนนสูงสุดในครึ่งใดครึ่งหนึ่ง หมายถึง การเดิมพันเพื่อทำนายว่าทีมเจ้าบ้านจะยิงประตูได้มากสุดในครึ่งใดของการแข่งขัน</span></h4>
<h4><strong>2.2.84.4.2.</strong><span> การเดิมพันจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิก เว้นแต่ว่าได้มีการกำหนดผลลัพธ์การเดิมพันแล้ว</span></h4>
<h4><strong>2.2.84.5.</strong><span> ทีมเยือนทำคะแนนสูงสุดในครึ่งใดครึ่งหนึ่ง</span></h4>
<h4><strong>2.2.84.5.1.</strong><span> ทีมเยือนทำคะแนนสูงสุดในครึ่งใดครึ่งหนึ่ง หมายถึง การเดิมพันเพื่อทำนายว่าทีมเยือนจะยิงประตูได้มากสุดในครึ่งใดของการแข่งขัน</span></h4>
<h4><strong>2.2.84.5.2.</strong><span> การเดิมพันจะเป็นโมฆะถ้านัดการแข่งขันถูกยกเลิก เว้นแต่ว่าได้มีการกำหนดผลลัพธ์การเดิมพันแล้ว</span></h4>

<h3><strong>2.2.85.</strong><span>คะแนนที่ถูกต้องครึ่งเวลา/เต็มเวลา</span></h3>
<h4><strong>2.2.85.1.</strong><span>คะแนนที่ถูกต้องครึ่งเวลา/เต็มเวลา หมายถึง การเดิมพันเพื่อทำนายทั้งคะแนนที่ถูกต้องในครึ่งแรก และคะแนนยอดรวมที่ถูกต้องในตอนท้ายของการแข่งขัน</span></h4>
<h4><strong>2.2.85.2.</strong><span>สำหรับประเภทการเดิมพันนี้ "4+" หมายถึง ตัวเลือกการเดิมพันที่จำนวนประตูรวมซึ่งทำได้หลังเวลาเต็มของการแข่งขัน ต้องมีอย่างน้อยสี่ (4) ประตูจึงจะชนะการเดิมพัน</span></h4>
<h4><strong>2.2.85.3.</strong><span>การเดิมพันจะเป็นโมฆะถ้าการแข่งขันถูกยกเลิก ยกเว้นว่าได้มีการกำหนดผลการเดิมพันแล้ว</span></h4>
 
  <div id="1-1" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h1><a name="R3" id="R3"></a>3. กฎกติกาการเดิมพันในเหตุการณ์เฉพาะ</h1>
  <!-- 3.1 -->
  <h2><a name="R31" id="R31"></a>3.1. กฎกติกาฟุตบอล</h2>
  <h3><strong>3.1.1.</strong><span>
  เมื่อกำหนดการแ่ข่งขันถูกจัดให้เล่นในเวลาอื่นนอกเหนือจากเวลาปกติ (เช่น ช่วงเวลาการเล่นพิเศษในหลายๆ ทัวร์นาเมนต์หรือนัดกระชับมิตร) การเดิมพันทั้งหมดจะถูกตัดสินเมื่อสิ้นสุดเวลาที่กำหนดไว้นั้น</span></h3>
  <h4><strong>3.1.1.1.</strong><span>
  กรณีมีการเล่นน้อยกว่าเวลาปกติ ผู้ดำเนินการขอสงวนสิทธิ์ที่จะระงับการตัดสินการเดิมพันทั้งหมดเพื่อรอผลอย่างเป็นทางการของการแข่งขันนั้น</span></h4>
  <h4><strong>3.1.1.2.</strong><span>
  ยกเว้นในกรณีที่ไม่มีการแจ้งการแข่งขันตามเวลาปกติไว้อย่างชัดเจนบนเว็บไซต์ก่อนการแข่งขันฟุตบอลทั้งหมด การเดิมพันที่รับไว้สำหรับการแข่งขันแมทช์ดังกล่าวจะถือเป็นโมฆะ</span></h4>
  <h3><strong>3.1.2.</strong><span>
  ถ้าการแข่งขันฟุตบอลถูกเลื่อนออกไป หรือถูกยกเลิกหรือระงับชั่วคราว และไม่ได้กลับมาแข่งขันต่อภายใน 12 ชั่วโมงนับจากเวลาเริ่มต้นที่กำหนดไว้ การแข่งขันนั้นจะถือเป็นโมฆะ (โดยไม่คำนึงว่าผลการตัดสินอย่างเป็นทางการจะเป็นเช่นไร) ผลของการเดิมพันทั้งหมดในกรณีของการแข่งขันที่ถูกยกเลิก หรือระงับชั่วคราวนั้นอยู่ในดุลยพินิจของทางบริษัทแต่เพียงผู้เดียว</span></h3>
  <h3><strong>3.1.3.</strong><span>
  การเดิมพันในครึ่งแรก (1H) จะนำไปใช้กับการแข่งขันในครึ่งแรกเท่านั้น ถ้าการแข่งขันถูกยกเลิกในช่วงระหว่างครึ่งแรก การเดิมพันทั้งหมด ถือเป็นโมฆะ ถ้าการแข่งขันถูกยกเลิกในช่วงระหว่างครึ่งหลัง การเดิมพันในครึ่งแรกนั้นยังคงสมบูรณ์</span></h3>
  <h3><strong>3.1.4.</strong><span>
  บริษัทให้ข้อมูลต่างๆ  (เช่น พื้นที่ที่เป็นกลาง ใบแดง เครื่องจับเวลา ข้อมูลสถิติ วันที่ เวลาเริ่มต้น ฯลฯ) เพื่อเป็นบริการและไม่รับผิดชอบต่อข้อมูลดังกล่าวไม่ว่ากรณีใด ลูกค้ามีหน้าที่ต้องทราบข้อมูลที่ถูกต้องสำหรับทุกการแข่งขัน</span></h3>
  <h3><strong>3.1.5.</strong><span>
  เว้นแต่กรณีที่ระบุไว้เป็นอย่างอื่น ถ้าการแข่งขันถูกกำหนดให้เล่นบนพื้นที่ที่เป็นกลาง (แต่ไม่ได้เล่นบนพื้นที่ที่เป็นกลาง หรือกลับกัน) การเดิมพันทั้งหมดจะถือว่ามีผลสมบูรณ์ในกรณีมีการเปลี่ยนสถานที่แข่ง (ทีมเจ้าบ้านเล่นในบ้านของทีมเยือน หรือกลับกัน) การเดิมพันทั้งหมดจะถือเป็นโมฆะ การเดิมพันจะยังคงถือเป็นโมฆะด้วยถ้าชื่อของทีมเจ้าบ้านและทีีมเยือนถูกกล่าวกลับกันอย่างไม่ถูกต้อง</span></h3>
  <h3><strong>3.1.6.</strong><span>
  คะแนนจะได้รับการอัพเดตสำหรับการเดิมพันฟุตบอลแบบสด และตลาดที่แสดงในระหว่างการซื้อขายสดอ้างอิงถึงคะแนนที่แสดงในเวลาที่มีการวางเดิมพันแล้ว นาฬิกาจับเวลา และการให้ใบแดงมีไว้เพื่อ การอ้างอิงของลูกค้าเท่านั้น</span></h3>
  <h3><strong>3.1.7.</strong><span>
  สำหรับการเดิมพันสด อันเกี่ยวกับการกระทำ ซึ่งในดุลยพินิจ เบ็ดเสร็จแต่เพียงผู้เดียวของบริษัท เห็นว่าเป็นอันตรายซึ่งคะแนน ผลการแข่งขัน การเล่นของทีมหรือผู้เล่นอาจจะได้รับผลกระทบ หรือทำให้เกิดการเปลี่ยนแปลงแต้มต่อ/ราคา หรือตลาด หรือข้อมูลการเดิมพัน ("การเล่นที่อันตราย") บริษัทขอสงวนสิทธิ์ในการระงับการรับเดิมพัน และอาจจะรับหรือปฏิเสธการเดิมพันภายหลังจากการเล่นที่อันตราย การกระทำอื่นๆ ทั้งหมดในเกมการแข่งขันถือว่าเป็นการเล่น ที่ปลอดภัยและจะถือว่าสามารถยอมรับเดิมพันได้ต่อไป </span></h3>
  <h3><strong>3.1.8.</strong><span>
   For live betting, bet placement is allowed up to the 90th minute in addition to any injury time for full time for most games (at the discretion of the Company). Any actions other than the ones mentioned in this section 3.1.8, will be considered Safe Play and thus all pending bets placed may be considered for acceptance: Play in or around the penalty spot area; a penalty; and free-kicks deemed by the Company as dangerous (possibility of goal).</span></h3>
  <h3><strong>3.1.9.</strong><span>
  สำหรับการเดิมพันแบบสด การวางเดิมพันที่ค้างอยู่ทั้งหมดจะถูก ปฏิเสธโดยอัตโนมัติตั้งแต่นาทีที่ผู้ตัดสินจบการแข่งขันในครึ่งเวลาแรกและ/ หรือครึ่งหลัง </span></h3>
  <h3><strong>3.1.10.</strong><span>
  สำหรับการเดิมพันสดแต่ไม่รวม 2 นาทีของสูงตํ่า (O/U) เฉพาะ 15 นาที, สูงตํ่า (O/U) เฉพาะ 10 นาที และแฮนดิแคบ (HDP) เฉพาะ 15 นาที การเดิมพันที่ค้างอยู่จะถูกปฏิเสธเมื่อมีการทำประตู ในทำนองเดียวกัน การเดิมพันจะได้รับการยอมรับภายใต้พื้นที่ซึ่งถือว่าปลอดภัยหากยิงลูกโทษไม่เข้า</span></h3>
  <h3><strong>3.1.11.</strong><span>
  For live fantasy match betting, bet placement is allowed up to the 90th minute in addition to any injury time for full time for most games (at the discretion of the Company). From kick off time (00:00) of play onwards until prior to the end of regulation time (90th minute), whichever is applicable in a game, any actions other than the ones mentioned in this section 3.1.8, will be considered Safe Play and thus all pending bets placed may be considered for acceptance: Play in or around the penalty spot area; a one to one counter attack situation; a penalty; and free-kicks deemed by the Company as dangerous (possibility of goal).</span></h3>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R32" id="R32"></a>3.2. บาสเกตบอล</h2>
  <h3><strong>3.2.1.</strong><span>
  ตลาดแบบเต็มเวลาทั้งหมดรวมถึงการเดิมพันแบบสดจะยุติตามผลการแข่ง ขันในขั้นสุดท้าย รวมถึง การต่อเวลา (เว้นแต่จะระบุไว้เป็นอย่างอื่น) </span></h3>
  <h3><strong>3.2.2.</strong><span>
  ถ้าการแข่งขันไม่ได้เริ่มต้นตามวันเริ่มต้นที่กำหนด การเดิมพันทั้งหมดจะเป็นโมฆะ (เว้นแต่จะระบุไว้เป็นอย่างอื่น)</span></h3>
  <h3><strong>3.2.3.</strong><span>
  ถ้าการแข่งขันเริ่มต้นขึ้นแต่ถูกหยุดชั่วคราวหรือยกเลิกภายใน 12 ชั่วโมงนับจากเวลาเริ่มเดิม การเดิมพันแบบเต็มเวลาจะยังถือว่ามีผล ถ้าการแข่งขันในระัดับ NBA ได้เสร็จสิ้นไปแล้วอย่างน้อย 43 นาที หรืออย่างน้อย 35 นาทีสำหรับการแข่งขันบาสเกตบอลประเภทอื่นๆ การเดิมพันจะยังถือว่ามีผลถ้าผลการแข่งขันอย่างเป็นทางการได้รับการประ กาศโดยองค์การกำกับดูแลที่เกี่ยวข้อง มิเช่นนั้น การเดิมพันของการแข่งขัน ที่ถูกหยุดชั่วคราวหรือยกเลิกจะเป็นโมฆะ ยกเว้นการเดิมพันบนตลาดที่มี การกำหนดอย่างไม่มีเงื่อนไข </span></h3>
  <h3><strong>3.2.4.</strong><span>
  ผลการแข่งขันในครึ่งแรกคือคะแนนรวมของควอเตอร์แรกและควอเตอร์ที่ สอง ผลการแข่งขันในครึ่งหลังคือคะแนนรวมของควอร์เตอร์ที่สาม และควอเตอร์ที่สี่ รวมถึง การต่อเวลาใดๆ ที่อาจจะเกิดขึ้น</span></h3>
  <h3><strong>3.2.5.</strong><span>
  ผลการแข่งขันของควอเตอร์ที่สี่ ไม่ รวมถึงการต่อเวลาใดๆ ที่อาจจะเกิดขึ้น </span></h3>
  <h3><strong>3.2.6.</strong><span>
  ถ้าการแข่งขันถูกหยุดชั่วคราวหรือยกเลิก การเดิมพันที่วางไว้ในครึ่งของ การแข่งขันหรือควอเตอร์ที่ไม่เสร็จสิ้นนั้นจะถือว่าเป็นโมฆะ ถ้าครึ่งของ การแข่งขันหรือควอเตอร์ที่ระบุไว้นั้นเสร็จสิ้น การเดิมพันจะมีผลต่อไป</span></h3>
  <h3><strong>3.2.7.</strong><span>
  คะแนนจะ ไม่ มีการอัพเดตสำหรับการเดิมพันบาสเกตบอลแบบสด และแฮนดิแคปที่แสดงในระหว่างการซื้อขายแบบสด หมายถึง คะแนนในตอนเริ่มต้นของการแข่งขัน เช่น 0-0 เวลาและคะแนนที่แสดง ใช้เพื่อจุดประสงค์ในการอ้างอิงอย่างเดียวเท่านั้น</span></h3>
  <h3><strong>3.2.8.</strong><span>
  ทีมใดทำแต้มในห่วงแรกได้นั้น ตลาดจะตัดสินกันที่ทีมที่ทำแต้มแรกได้ ถ้าการแข่งขันถูกหยุดชั่วคราวหรือยกเลิกภายหลังจากมีการทำแต้มแรกเกิดขึ้น การเดิมพันจะยังคงมีผล </span></h3>
  <h3><strong>3.2.9.</strong><span>
  Which Team to Score the Last Basket markets are settled on the team scoring the last points of a match (including overtime) or specified Half/Quarter (not including overtime). If a match is suspended or abandoned then all bets will be void, except for those on markets which have been unconditionally determined.</span></h3>
  <h3><strong>3.2.10.</strong><span>
  ตลาดพิเศษ (รวมถึง จำนวนแต้ม การรีบาวด์ การช่วยเหลือ การทำสามคะแนน การทุ่มลูกแบบได้เปล่า เป็นต้น) จะสมบูรณ์ ถ้าผู้เล่นทั้งสองเข้าร่วมในการแข่งขัน ถ้าผู้เล่นหนึ่งหรือทั้งสองไม่เข้าร่วม ในการแ่ข่งขัน การเดิมพันจะเป็นโมฆะ ผลการแข่งขันของตลาดพิเศษจะ รวมการต่อเวลาเอาไว้ด้วย เว้นแต่จะระบุไว้เป็นอย่างอื่น ผลการแข่งขัน ทั้งหมดจะเกิดขึ้นเมื่อผลการแข่งขันอย่างเป็นทางการได้รับการประกาศในตอนท้ายของการแข่งขันโดยองค์การกำกับดูแลที่เกี่ยวข้อง (NBA.com, FIBA.com เป็นต้น) และการเปลี่ยนแปลงภายหลังต่อสถิติจะไม่มีผลตามวัตถุประสงค์ ในการเดิมพัน </span></h3>
  <h3><strong>3.2.11.</strong><span>
  สถานที่แข่งขันของเจ้าบ้าน/ทีมเยือนสำหรับการแข่งขัน NCAA ระบุไว้เพื่อการอ้างอิงเท่านั้น</span></h3>
  <h3><strong>3.2.12.</strong><span>
  ตลาดบาสเกตบอลแฟนตาซีคือการจับคู่ของทีมจากการแข่งขันที่ ต่างกัน การแข่งขันที่เกี่ยวข้องกับทั้งสองทีมต้องเล่นในวันเดียวกัน มิฉะนั้นการเดิมพันจะถือเป็นโมฆะ  สถานที่สำหรับตลาดบาสเกตบอลแฟนตาซี ใช้เพื่อจุดประสงค์ในการอ้างอิง อย่างเดียวเท่านั้น</span></h3>
  <h3><strong>3.2.13.</strong><span>
  การชนะควอเตอร์ส่วนใหญ่
    ตลาดจะตัดสินกันที่ทีมที่เอาชนะจำนวนควอเตอร์มากที่สุดระหว่างการแข่งขันบาสเกตบอลถ้าผลของควอเตอร์ใดๆ เสมอกัน จะถือว่าไม่มีทีมใดชนะควอเตอร์นั้นการต่อเวลาจะไม่นำมารวมสำหรับตลาดนี้ ถ้าการแข่งขันถูกหยุดชั่วคราวหรือยกเลิก
    การพนันทั้งหมดจะเป็นโมฆะ</span></h3>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R33" id="R33"></a>3.3. อเมริกันฟุตบอล</h2>
  <h3><strong>3.3.1. </strong><span>
  ตลาดเต็มเวลา รวมถึงการเดิมพันแบบสดจะตัดสินตามผลการแข่งขันขั้น สุดท้ายรวมถึงในช่วงต่อเวลาด้วย (เว้นแต่จะระบุไว้เป็นอย่างอื่น) </span></h3>
  <h3><strong>3.3.2.</strong><span>
  ถ้าการแข่งขันไม่ได้เริ่มต้นตามวันเริ่มต้นที่กำหนด การเดิมพันทั้งหมด จะเป็นโมฆะ (เว้นแต่จะระบุไว้เป็นอย่างอื่น)</span></h3>
  <h3><strong>3.3.3.</strong><span>
  ถ้าการแข่งขันเริ่มต้นขึ้นแต่ถูกหยุดชั่วคราวหรือยกเลิกภายใน 12 ชั่วโมงนับจากเวลาเริ่มเดิม การเดิมพันแบบเต็มเวลาจะยัง ถือว่ามีผลถ้าการแข่งขัน ได้เสร็จสิ้นไปแล้วห้าสิบห้า (55) นาที การเดิมพันจะยังถือว่ามีผลถ้าผลการแข่งขันอย่างเป็นทางการได้รับการประกาศโดยองค์การกำกับดูแลที่เกี่ยวข้อง มิเช่นนั้น การเดิมพันของการแข่งขันที่ถูกหยุดชั่วคราวหรือยกเลิกจะเป็นโมฆะ ยกเว้นการเดิมพันบนตลาดที่มีการกำหนดอย่างไม่มีเงื่อนไข</span></h3>
  <h3><strong>3.3.4.</strong><span>
  ผลการแข่งขันในครึ่งแรกคือคะแนนรวมของควอเตอร์แรกและควอเตอร์ที่ สอง ผลการแข่งขันในครึ่งหลังคือคะแนนรวมของควอร์เตอร์ที่สาม และควอเตอร์ที่สี่ รวมถึง การต่อเวลาใดๆ ที่อาจจะเกิดขึ้น</span></h3>
  <h3><strong>3.3.5.</strong><span>
  ผลการแข่งขันของควอเตอร์ที่สี่ ไม่ รวมถึงการต่อเวลาใดๆ ที่อาจจะเกิดขึ้น </span></h3>
  <h3><strong>3.3.6.</strong><span>
  ถ้าการแข่งขันถูกหยุดชั่วคราวหรือยกเลิก การเดิมพันที่วางไว้ในครึ่งของ การแข่งขัน หรือควอเตอร์ที่ไม่เสร็จสิ้นนั้นจะถือว่าเป็นโมฆะ ถ้าครึ่งของ การแข่งขันหรือควอเตอร์ที่ระบุไว้นั้นเสร็จสิ้น การเดิมพันจะมีผล</span></h3>
  <h3><strong>3.3.7.</strong><span>
  คะแนนจะได้รับการอัพเดตสำหรับการเดิมพันอเมริักันฟุตบอลแบบสด และตลาดที่แสดงในระหว่างการซื้อขายสดอ้างอิงกับคะแนนที่แสดงในเวลาที่มีการวางเดิมพันแล้ว</span></h3>
  <h3> <strong>3.3.8.</strong><span>
  ทีมใดทำแต้มในห่วงแรกได้ ตลาดจะตัดสินกันที่ทีมที่ทำแต้มแรกได้ ถ้าการแข่งขันถูกหยุดชั่วคราวหรือยกเลิกภายหลังจากมีการทำแต้มแรกเกิดขึ้น การเดิมพันจะยังคงมีผล </span></h3>
  <h3><strong>3.3.9.</strong><span>
  ทีมใดที่ทำแต้มในห่วงสุดท้ายได้ ตลาดจะตัดสินกันที่ทีมที่ทำแต้ม สุดท้ายของการแข่งขันได้ (รวมถึงช่วงต่อเวลา) ถ้าการแข่งขัน ถูกหยุดชั่วคราวหรือยกเลิก การเดิมพันทั้งหมดจะเป็นโมฆะ </span></h3>
  <h3><strong>3.3.10.</strong><span>
  สถานที่แข่งขันของเจ้าบ้าน/ทีมเยือนสำหรับการแข่งขัน NCAA ระบุไว้เพื่อการอ้างอิงเท่านั้น</span></h3>
  <h3><strong>3.3.11.</strong><span>
   สำหรับการเดิมพันสด อันเกี่ยวกับการกระทำ ซึ่งในดุลยพินิจ เบ็ดเสร็จแต่เพียงผู้เดียวของบริษัท เห็นว่าเป็นอันตรายซึ่งคะแนน ผลการแข่งขัน การเล่นของทีมหรือผู้เล่นอาจจะได้รับผลกระทบ หรือทำให้เกิดการเปลี่ยนแปลงแต้มต่อ/ราคา หรือตลาด หรือข้อมูลการเดิมพัน ("การเล่นที่อันตราย") บริษัทขอสงวนสิทธิ์ในการระงับการรับเดิมพัน และอาจจะรับหรือปฏิเสธการเดิมพันภายหลังจากการเล่นที่อันตราย การกระทำอื่นๆ ทั้งหมดในเกมการแข่งขันถือว่าเป็นการเล่น ที่ปลอดภัยและจะถือว่าสามารถยอมรับเดิมพันได้ต่อไป</span></h3>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R34" id="R34"></a>3.4. เบสบอล</h2>
  <h3><strong>3.4.1.</strong><span>
  ชื่อของพิชเชอร์มีไว้เพื่อวัตถุประสงค์ของการอ้างอิงเท่านั้น การเดิมพัน เบสบอลทั้งหมดยังถือว่าสมบูรณ์ ไม่ว่าจะเป็นพิชเชอร์ที่เริ่มต้นคนใดก็ตาม </span></h3>
  <h3><strong>3.4.2.</strong><span>
  ตลาดแบบเต็มเวลา รวมถึงการเดิมพันแบบสดจะตัดสินตามผลการแข่งขัน ขั้นสุดท้ายรวมถึงอินนิงพิเศษด้วย (เว้นแต่จะระบุไว้เป็นอย่างอื่น ในกฎกติกาเหล่านี้) ในการเล่นเบสบอลของประเทศญี่ปุ่น การเสมอกันอาจจะได้รับการประกาศและในกรณีนี้การเดิมพันมันนี่ไลน์ จะได้รับเงินคืน</span></h3>
  <h3><strong>3.4.3.</strong><span>
  ถ้าการแข่งขันไม่ได้เริ่มต้นตามวันเริ่มที่กำหนด การเดิมพัน ทั้งหมดจะเป็นโมฆะ (เว้นแต่จะระบุไว้เป็นอย่างอื่น)</span></h3>
  <h3><strong>3.4.4.</strong><span>
  สำหรับเบสบอล การเดิมพันที่ได้รับการพิจารณาว่าสมบูรณ์นั้น เกมจะต้องดำเนินไป 9 อินนิง (หรือ 8.5 อินนิงถ้าทีมเจ้าบ้านเป็นผู้นำ) ถ้าเกมถูกหยุดชั่วคราวและเสร็จสิ้นในวันต่อมา การเดิมพันทั้งหมด (ยกเว้นการเดิมพันที่ได้รับการกำหนดโดยไม่มีเงื่อนไข) จะถือว่าเป็นโมฆะ </span></h3>
  <h3><strong>3.4.5.</strong><span>
  ถ้าเกมถูกหยุดชั่วคราวหรือถูกยกเลิกในช่วงอินนิงพิเศษ คะแนนจะได้รับการตัดสินภายหลังจากอินนิงแบบเต็มเวลาสุดท้าย ถ้าทีมเจ้าบ้านไม่สามารถทำคะแนนได้เสมอหรือนำในครึ่งหลังของการอินนิง ซึ่งในกรณีนี้ คะแนนจะถูกตัดสิน ณ เวลาที่เกมถูกยกเลิก </span> </h3>
  <h3><strong>3.4.6.</strong><span>
  ในช่วง 5 อินนิงแรก การเดิมพันจะตัดสินตามผลการแข่งขันในตอนท้าย ของช่วงทั้งห้าอินนิง ถ้าช่วงอินนิงทั้งห้าไม่เสร็จสิ้นไม่ว่าด้วยเหตุผลใดก็ตาม การเดิมพันทั้งหมดจะถือเป็นโมฆะ</span></h3>
  <h3><strong>3.4.7.</strong><span>
  คะแนนจะได้รับการอัพเดตสำหรับการเดิมพันอเมริักันฟุตบอลแบบสด และตลาดที่แสดงในระหว่างการซื้อขายสดอ้างอิงกับคะแนนที่แสดงในเวลาที่มีการวางเดิมพันแล้ว </span></h3>
  <h3><strong>3.4.8.</strong><span>
  การแข่งขันเวิร์ล เบสบอล คลาสสิค สามารถสิ้นสุดการแข่งขันได้ก่อนถ้าทีม กำลังนำอยู่สิบรันหรือมากกว่าภายหลังทีมคู่ต่อสู้ได้ทำการแข่งขันไปแล้วอย่างน้อย 7 อินนิง หรือถ้าทีมกำลังนำอยู่มากว่าสิบห้ารันภายหลังทีม คู่ต่อสู้ไ้ด้ทำการแข่งขันไปแล้วอย่างน้อย 5 อินนิง ถ้ากรณีนี้เกิดขึ้น การเดิมพันทั้งหมดจะถือว่าสมบูรณ์ </span></h3>
  <h3><strong>3.4.9.</strong><span>
  การแข่งขันเบสบอลนานาชาติ (เช่น การแข่งขันโอลิมปิก) อาจจะถูกยกเลิกได้ก่อนและสำหรับการเดิมพันที่สมบูรณ์นั้นต้องมีแข่งขันเสร็จสิ้นไปแล้ว 6.5 อินนิง </span></h3>
  <h3><strong>3.4.10.</strong><span>
  สำหรับการเดิมพันสด อันเกี่ยวกับการกระทำ ซึ่งในดุลยพินิจ เบ็ดเสร็จแต่เพียงผู้เดียวของบริษัท เห็นว่าเป็นอันตรายซึ่งคะแนน ผลการแข่งขัน การเล่นของทีมหรือผู้เล่นอาจจะได้รับผลกระทบ หรือทำให้เกิดการเปลี่ยนแปลงแต้มต่อ/ราคา หรือตลาด หรือข้อมูลการเดิมพัน ("การเล่นที่อันตราย") บริษัทขอสงวนสิทธิ์ในการระงับการรับเดิมพัน และอาจจะรับหรือปฏิเสธการเดิมพันภายหลังจากการเล่นที่อันตราย การกระทำอื่นๆ ทั้งหมดในเกมการแข่งขันถือว่าเป็นการเล่น ที่ปลอดภัยและจะถือว่าสามารถยอมรับเดิมพันได้ต่อไป</span></h3>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R35" id="R35"></a>3.5. Ice  ฮ็อกกี้น้ำแข็ง</h2>
  <h3><strong>3.5.1.</strong> <span>ตลาดเต็มเวลาอาจจะได้รับการเสนอ ในแบบ "เวลาปกติเท่านั้น" หรือ "รวมการต่อเวลาและการยิงจุดโทษ" หรือทั้งสองแบบ ลูกค้าโปรดดูจากชื่อของตลาดทุกครั้ง สำหรับการแข่งขันที่ตัดสินโดยการยิงจุดโทษ ทีมที่ชนะจะมีประตูเพิ่ม 1 ประตูเพิ่มจากคะแนนเดิมเพื่อตัดสินผลการแข่งขันในขั้นสุดท้าย</span> </h3>
  <h3><strong>3.5.2.</strong> <span>ถ้าการแข่งขันไม่ได้เริ่มต้นตามวันเริ่มต้นที่กำหนด การเดิมพันทั้งหมดจะเป็นโมฆะ (เว้นแต่จะระบุไว้เป็นอย่างอื่น)</span></h3>
  <h3><strong>3.5.3.</strong> <span>ถ้าการแข่งขันเริ่มต้นขึ้นแต่ถูกหยุดชั่วคราวหรือยกเลิกภายใน 12 ชั่วโมงนับจากเวลาเริ่มเดิม การเดิมพันแบบเต็มเวลาจะยังถือว่าสมบูรณ์ ถ้าการแข่งขันได้เสร็จสิ้นไปแล้ว 55 นาที การเดิมพันจะยังถือว่ามีผล ถ้าผลการแข่งขันอย่างเป็นทางการได้รับการประกาศโดยองค์การกำกับดูแลที่ เกี่ยวข้อง มิเช่นนั้น การเดิมพันของการแข่งขันที่ถูกหยุดชั่วคราวหรือยกเลิก จะเป็นโมฆะ ยกเว้นการเดิมพันบนตลาดที่มีการกำหนดอย่างไม่มีเงื่อนไข </span></h3>
  <h3><strong>3.5.4.</strong> <span>สำหรับการเดิมพันแบบช่วงเวลา ช่วงเวลานั้นจะต้องเสร็จสิ้นเพื่อ ให้การเดิมพันมีผล </span></h3>
  <h3><strong>3.5.5.</strong> <span>ผลของช่วงเวลาที่ 3 ไม่รวมการต่อเวลาหรือยิงลูกโทษที่อาจจะเกิดขึ้นได้ </span></h3>
  <h3><strong>3.5.6.</strong> <span>การเดิมพันฮ็อกกี้น้ำแข็งแบบสดจะตัดสินตามผลการแข่งขันในตอนท้ายของช่วงเวลาการแข่งขันปกติ (3 ช่วง) ผลการต่อเวลาพิเศษและการยิง ลูกจุดโทษจะไม่นำมานับรวม </span></h3>
  <h3><strong>3.5.7.</strong> <span>คะแนนจะได้รับการอัพเดตสำหรับการเดิมพันฮ็อกกี้น้ำแข็งแบบสด และตลาดที่แสดงในระหว่างการซื้อขายสดอ้างอิงกับคะแนนที่แสดงในเวลาที่มีการวางเดิมพันแล้ว </span> </h3>
  <h3><strong>3.5.8.</strong> <span>สำหรับการเดิมพันสด อันเกี่ยวกับการกระทำ ซึ่งในดุลยพินิจ เบ็ดเสร็จแต่เพียงผู้เดียวของบริษัท เห็นว่าเป็นอันตรายซึ่งคะแนน ผลการแข่งขัน การเล่นของทีมหรือผู้เล่นอาจจะได้รับผลกระทบ หรือทำให้เกิดการเปลี่ยนแปลงแต้มต่อ/ราคา หรือตลาด หรือข้อมูลการเดิมพัน ("การเล่นที่อันตราย") บริษัทขอสงวนสิทธิ์ในการระงับการรับเดิมพัน และอาจจะรับหรือปฏิเสธการเดิมพันภายหลังจากการเล่นที่อันตราย การกระทำอื่นๆ ทั้งหมดในเกมการแข่งขันถือว่าเป็นการเล่น ที่ปลอดภัยและจะถือว่าสามารถยอมรับเดิมพันได้ต่อไป</span> </h3>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R36" id="R36"></a>3.6. เทนนิส</h2>
  <h3><strong>3.6.1.</strong> <span>ตลาดมันนี่ไลน์อ้างอิงกับผู้ชนะของการแข่งขันหรือเซ็ตที่ระบุไว้ ตลาดแฮนดิแคปยึดตามทั้งเซ็ตและเกม (กรุณาดูชื่อของตลาด) ตลาดแบบสูง/ต่ำ และตลาดแบบคี่/คู่จะยึดตามเกม (เว้นแต่จะระบุ ไว้เป็นอย่างอื่น)</span></h3>
  <h3><strong>3.6.2.</strong> <span>ถ้าผู้เล่นไม่เริ่มต้นทัวร์นาเม้นท์หรือการแข่งขัน การเดิมพันทั้งหมด ในผู้เล่นนั้นจะเป็นโมฆะ </span></h3>
  <h3><strong>3.6.3.</strong><span>
  ถ้าผู้เล่นหนึ่งคน (หรือคู่) ถอนตัวหรือขาดคุณสมบัติในระหว่างการแข่งขัน การเดิมพันทั้งหมดจะเป็นโมฆะ ยกเว้นแต่การเดิมพันบนตลาด ที่มีการกำหนดโดยไม่มีเงื่อนไข </span></h3>
  <h3><strong>3.6.4.</strong><span>
  ถ้าการแข่งขันถูกเลื่อนหรือหยุดชั่วคราว การเดิมพันทั้งหมดยังถือ ว่ามีผลถ้าการแข่งขันเสร็จสิ้น</span></h3>
  <h3><strong>3.6.5.</strong><span>
  การเดิมพันทั้งหมดยังถือว่ามีผลไม่ว่าจะมีการเปลี่ยนแปลงของสถานที่แข่ง ขันหรือพื้นผิวของสนามแข่งขัน (รวมถึงการย้ายการแข่งขันจาก สนามกลางแจ้้งไปยังสนามในร่มหรือจากสนามในร่มไปยังสนามกลางแจ้ง)</span></h3>
  <h3><strong>3.6.6.</strong><span>
  ถ้าจำนวนของเซ็ตที่ำกำหนดไว้ซึ่งจำเป็นต่อการชนะการแข่งขันมีการเปลี่ยน แปลงจากที่กำหนดไว้เดิม การเดิมพันทั้งหมดจะเป็นโมฆะ ยกเว้นแต่การเดิมพันบนตลาดที่มีการกำหนดโดยไม่มีเงื่อนไข </span></h3>
  <h3> <strong>3.6.7.</strong><span>
  ผู้ชนะในเซ็ตแรก (ผู้ชนะในเซ็ตที่สอง ผู้ชนะในเซ็ตที่สาม หรืออื่นๆ) หมายถึง ผลของการแข่งขันในเซ็ตที่ระบุ การเดิมพันทั้งหมดจะถือ เป็นโมฆะถ้าการแข่งขันในเซ็ตที่ระบุไม่เสร็จสิ้น</span></h3>
  <h3><strong>3.6.8.</strong><span>
  การเดิมพันเทนนิสแบบสดจะตัดสินตามผลของการแข่งขัน (หรือเซ็ตที่ระบุ) คะแนนจะไม่มีการอัพเดตสำหรับการเดิมพันเทนนิสแบบสด</span></h3>
  <h3><strong>3.6.9.</strong><span>
  การเสิร์ฟเอสส่วนใหญ่ (ดับเบิ้ลฟอลท์ และอื่นๆ) ตลาดจะตัดสิน ตามสถิติของการแข่งขันอย่างเป็นทางการ ถ้าผู้เล่นจะถอนตัวหรือ ขาดคุณสมบัติก่อนการแข่งขันเสร็จสิ้น การเดิมพันทั้งหมดจะเป็นโมฆะ</span></h3>
  <h3><strong>3.6.10.</strong><span>
  ตลาดเอสลูกแรก (ดับเบิ้ลฟอลท์ และอื่นๆ) จะตัดสินตามสถิติของการแข่งขัน อย่างเป็นทางการ ถ้าตลาดเอสลูกแรก (ดับเบิ้ลฟอลท์ และอื่นๆ) ได้ถูกกำหนด การเดิมพันทั้งหมดจะยังถือว่ามีผล แม้เมื่อการแข่งขันจะไม่เสร็จสิ้นเนื่องจากผู้เล่น ถอนตัวหรือขาดคุณสมบัติ ถ้าไม่มีลูกเอส (ดับเบิ้ลฟอลท์ และอื่นๆ) ในขณะที่ผู้เล่นถอนตัว/ขาดคุณสมบัติ การเดิมพันทั้งหมดจะถือเป็นโมฆะ </span></h3>
  <h3><strong>3.6.11.</strong><span>
  ตลาดผู้ชนะเกม หมายถึง ผู้ชนะเกมใดเกมหนึ่ง เช่น เซต 1 เกม 1; เซต 1 เกม 2 เป็นต้น หากในเซตเล่นถึงไท-เบรก ตลาดจะถูกกำหนดเป็น เซต 1 TB; เซต 2 TB เป็นต้น หากผู้เล่นมีการถอนตัว/ขาดคุณสมบัติ ในระหว่างการเล่นเกมที่ยังไม่เสร็จสิ้น การเดิมพันทั้งหมดจะืถือเป็นโมฆะ ถ้าเกมเสร็จสิ้นแล้วโดยกรรมการตัดสินให้ "เกมถูกตัดแต้ม" การเดิมพันทั้งหมดในเกมนั้นจะถือเป็นโมฆะ (แต่ถ้าเกมเสร็จสิ้นโดย “ถูกตัดคะแนน” การเดิมพันทั้งหมดจะยังคงมีผล) ถ้าการแข่งขันในเกมถูกหยุดชั่วคราว การเดิมพันทั้งหมดยังถือว่ามีผลถ้าการแข่งขันในเกมนั้นเสร็จสิ้น </span></h3>
  <h3><strong>3.6.12.</strong><span>
  ตลาดคะแนนที่ถูกต้องของการแข่งขัน หมายถึง จำนวนเซตที่แน่นอนซึ่งผู้เล่นแต่ละคนชนะในการแข่งขัน ถ้าการแข่งขันไม่สมบูรณ์ การเดิมพันทั้งหมดจะถือเป็นโมฆะ และถ้ามีการเปลี่ยนแปลงจำนวนเซตที่กำหนดไว้เพื่อชนะการแข่งขัน การเดิมพันทั้งหมดจะถือเป็นโมฆะเช่นกัน</span></h3>
<h3><strong>3.6.13.</strong><span>
   ตลาดคะแนนที่ถูกต้องของเซต X หมายถึง จำนวนเกมที่แน่นอนซึ่งผู้เล่นแต่ละคนชนะในการแข่งขันเซตใดเซตหนึ่ง ถ้าการแข่งขันในเซตใดไม่สมบูรณ์ การเดิมพันทั้งหมดจะถือเป็นโมฆะ และถ้ามีการเปลี่ยนแปลงจำนวนเกมที่กำหนดไว้เพื่อชนะการแข่งขัน การเดิมพันทั้งหมดจะถือเป็นโมฆะเช่นกัน</span></h3>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R37" id="R37"></a>3.7. แบดมินตัน</h2>
  <h3><strong>3.7.1.</strong><span>
  ตลาดมันนี่ไลน์อ้างอิงกับผู้ชนะของการแข่งขันหรือเซ็ตที่ระบุไว้ ตลาดแฮนดิแคปขึ้นกับทั้งเซ็ตและเกม (กรุณาดูชื่อของตลาด) ตลาดแบบสูง/ต่ำ และตลาดแบบคี่/คู่จะขึ้นกับแต้ม (เว้นแต่จะระบุ ไว้เป็นอย่างอื่น)</span></h3>
  <h3> <strong>3.7.2.</strong><span>
  ถ้าผู้เล่นไม่เริ่มต้นทัวร์นาเม้นท์หรือการแข่งขัน การเดิมพันทั้งหมด ในผู้เล่นนั้นจะเป็นโมฆะ </span></h3>
  <h3><strong>3.7.3.</strong><span>
  ถ้าผู้เล่นหนึ่งคน (หรือคู่) ถอนตัวหรือขาดคุณสมบัติในระหว่างการแข่งขัน การเดิมพันทั้งหมดจะเป็นโมฆะ ยกเว้นแต่การเดิมพันบนตลาด ที่มีการกำหนดโดยไม่มีเงื่อนไข </span></h3>
  <h3> <strong>3.7.4.</strong><span>
  ถ้าการแข่งขันถูกเลื่อนหรือหยุดชั่วขณะ การเดิมพันทั้งหมดยังถือว่าสมบูรณ์ ถ้าการแข่งขันดำเนินต่อไปก่อนสิ้นสุดการแข่งขัน 12 ชั่วโมง</span></h3>
  <h3><strong>3.7.5.</strong><span>
  ผู้ชนะในเซ็ตแรก (ผู้ชนะในเซ็ตที่สอง ผู้ชนะในเซ็ตที่สาม หรืออื่นๆ) หมายถึง ผลของการแข่งขันในเซ็ตที่ระบุ การเดิมพันทั้งหมดจะถือ เป็นโมฆะถ้าการแข่งขันในเซ็ตที่ระบุไม่เสร็จสิ้น </span></h3>
  <h3> <strong>3.7.6. </strong><span>
  การเดิมพันแบดมินตันแบบสดจะตัดสินตามผลของการแข่งขัน (หรือเซ็ตที่ระบุ) คะแนนจะไม่มีการอัพเดตสำหรับการเดิมพัน แบดมินตันแบบสด</span> </h3>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R38" id="R38"></a>3.8. ปิงปอง</h2>
  <h3><strong>3.8.1.</strong><span>
  ตลาดมันนี่ไลน์อ้างอิงกับผู้ชนะของการแข่งขันหรือเซ็ตที่ระบุไว้ ตลาดแฮนดิแคปขึ้นกับทั้งเซ็ตและเกม (กรุณาดูชื่อของตลาด) ตลาดแบบสูง/ต่ำ และตลาดแบบคี่/คู่จะขึ้นกับแต้ม (เว้นแต่จะระบุไว้ เป็นอย่างอื่น)</span></h3>
  <h3><strong>3.8.2.</strong><span>
  ถ้าผู้เล่นไม่เริ่มต้นทัวร์นาเม้นท์หรือการแข่งขัน การเดิมพันทั้งหมด ในผู้เล่นนั้นจะเป็นโมฆะ </span></h3>
  <h3> <strong>3.8.3.</strong><span>
  ถ้าผู้เล่นหนึ่งคน (หรือคู่) ถอนตัวหรือขาดคุณสมบัติในระหว่างการแข่งขัน การเดิมพันทั้งหมดจะเป็นโมฆะ ยกเว้นแต่การเดิมพันบนตลาด ที่มีการกำหนดโดยไม่มีเงื่อนไข </span></h3>
  <h3> <strong>3.8.4. </strong><span>
  ถ้าการแข่งขันถูกเลื่อนหรือหยุดชั่วขณะ การเดิมพันทั้งหมดยังถือว่าสมบูรณ์ ถ้าการแข่งขันดำเนินต่อไปก่อนสิ้นสุดการแข่งขัน 12 ชั่วโมง </span></h3>
  <h3><strong>3.8.5.</strong><span>
  ผู้ชนะในเซ็ตแรก (ผู้ชนะในเซ็ตที่สอง ผู้ชนะในเซ็ตที่สาม หรืออื่นๆ) หมายถึง ผลของการแข่งขันในเซ็ตที่ระบุ การเดิมพันทั้งหมดจะถือเป็น โมฆะถ้าการแข่งขันในเซ็ตที่ระบุไม่เสร็จสิ้น </span></h3>
  <h3><strong>3.8.6.</strong><span>
  การเดิมพันปิงปองแบบสดจะตัดสินตามผลของการแข่งขัน (หรือเซ็ตที่ระบุ) คะแนนจะไม่มีการอัพเดตสำหรับการเดิมพันปิงปองแบบสด</span></h3>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R39" id="R39"></a>3.9.	วอลเลย์บอล และวอลเลย์บอลชายหาด</h2>
  <h3><strong>3.9.1.</strong><span>
  ตลาดมันนี่ไลน์อ้างอิงกับผู้ชนะของการแข่งขันหรือเซ็ตที่ระบุไว้ ตลาดแฮนดิแคปขึ้นกับทั้งเซ็ตและเกม (กรุณาดูชื่อของตลาด) ตลาดแบบสูง/ต่ำ และตลาดแบบคี่/คู่จะขึ้นกับแต้ม (เว้นแต่จะระบุไว้ เป็นอย่างอื่น) </span></h3>
  <h3><strong>3.9.2.</strong> <span>ถ้าทีมไม่เริ่มต้นทัวร์นาเม้นท์หรือการแข่งขัน การเดิมพันทั้งหมดใน ทีมนั้นจะเป็นโมฆะ </span></h3>
  <h3> <strong>3.9.3. </strong><span>
  ถ้าทีมถอนตัวหรือขาดคุณสมบัติในระหว่างการแข่งขัน การเดิมพัน ทั้งหมดจะเป็นโมฆะ ยกเว้นแต่การเดิมพันบนตลาดที่มีการกำหนด โดยไม่มีเงื่อนไข </span></h3>
  <h3><strong>3.9.4.</strong><span>
  ถ้าการแข่งขันถูกเลื่อนหรือหยุดชั่วขณะ การเดิมพันทั้งหมดยังถือว่าสมบูรณ์ ถ้าการแข่งขันดำเนินต่อไปก่อนสิ้นสุดการแข่งขัน 12 ชั่วโมง </span></h3>
  <h3><strong>3.9.5.</strong><span>
  ผู้ชนะในเซ็ตแรก (ผู้ชนะในเซ็ตที่สอง ผู้ชนะในเซ็ตที่สาม หรืออื่นๆ) หมายถึง ผลของการแข่งขันในเซ็ตที่ระบุ การเดิมพันทั้งหมดจะถือเป็น โมฆะถ้าการแข่งขันในเซ็ตที่ระบุไม่เสร็จสิ้น </span></h3>
  <h3><strong>3.9.6.</strong><span>
  การเดิมพันวอลเลย์บอลแบบสดจะตัดสินตามผลของการแข่งขัน (หรือเซ็ตที่ระบุ) คะแนนจะไม่มีการอัพเดตสำหรับการเดิมพัน วอลเลย์บอลแบบสด</span></h3>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R310" id="R310"></a>3.10.	ฮ็อกกี้สนาม</h2>
  <h3> <strong>3.10.1.</strong><span>
  ตลาดแบบเต็มเวลาทั้งหมด รวมถึงการเดิมพันแบบสดจะตัดสิน ตามผลการแข่งขันในขั้นสุดท้ายในตอนท้ายของช่วงเวลาการแข่งขันปกติ การต่อเวลาพิเศษ โกลเดนโกล และการยิงลูกโทษไม่ถือเป็นตลาด แบบเต็มเวลา (ตลาดพิเศษสำหรับการต่อเวลาพิเศษ (ET) และการยิงลูกจุดโทษ (PEN) อาจจะได้รับการเสนอสำหรับการเดิมพัน)</span></h3>
  <h3> <strong>3.10.2.</strong><span>
  ถ้าการแข่งขันถูกเลื่อนออกไป หยุดชั่วคราวหรือยกเลิกและไม่ได้ ดำเนินการแข่งขันต่อภายใน 12 ชั่วโมงนับจากเวลาเริ่มเดิม การเดิมพันทั้งหมดจะถือเป็นโมฆะ ยกเว้นการเดิมพันบนตลาดที่มี การกำหนดโดยไม่มีเงื่อนไข การเดิมพันจะยังถือว่ามีผลถ้าผลการแข่งขัน อย่างเป็นทางการได้รับการประกาศโดยองค์การกำกับดูแลที่เกี่ยวข้อง</span></h3>
  <h3><strong>3.10.3. </strong><span>
  ตลาดสำหรับครึ่งแรก หมายถึง ผลการแข่งขันของครึ่งแรก การเดิมพันทั้งหมดจะถือเป็นโมฆะถ้าการแข่งขันในครึ่งที่ระบุไม่เสร็จสิ้น</span></h3>
  <h3><strong>3.10.4. </strong><span>
  การเดิมพันฮ็อกกี้สนามแบบสดจะตัดสินตามผลของการแข่งขันใน ตอนท้ายของช่วงเวลาการแข่งขันปกติ </span></h3>
  <h3> <strong>3.10.5.</strong><span>
  คะแนนจะได้รับการอัพเดตสำหรับการเดิมพันฮ็อกกี้สนามแบบสด และตลาดที่แสดงในระหว่างการซื้อขายสดอ้างอิงกับคะแนนที่แสดงในเวลาที่มีการวางเดิมพันแล้ว </span></h3>
  <h3> <strong>3.10.6.</strong><span>
  สำหรับการเดิมพันสด อันเกี่ยวกับการกระทำ ซึ่งในดุลยพินิจ เบ็ดเสร็จแต่เพียงผู้เดียวของบริษัท เห็นว่าเป็นอันตรายซึ่งคะแนน ผลการแข่งขัน การเล่นของทีมหรือผู้เล่นอาจจะได้รับผลกระทบ หรือทำให้เกิดการเปลี่ยนแปลงแต้มต่อ/ราคา หรือตลาด หรือข้อมูลการเดิมพัน ("การเล่นที่อันตราย") บริษัทขอสงวนสิทธิ์ในการระงับการรับเดิมพัน และอาจจะรับหรือปฏิเสธการเดิมพันภายหลังจากการเล่นที่อันตราย การกระทำอื่นๆ ทั้งหมดในเกมการแข่งขันถือว่าเป็นการเล่น ที่ปลอดภัยและจะถือว่าสามารถยอมรับเดิมพันได้ต่อไป</span></h3>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R311" id="R311"></a>3.11.	สนุกเกอร์และบิลเลียด</h2>
  <h3><strong>3.11.1.</strong><span>
  ตลาดมันนี่ไลน์และแฮนดิแคปอ้างอิงกับผู้ชนะของการแข่งขัน ตลาดแบบสูง/ต่ำ และตลาดแบบคี่/คู่ จะขึ้นกับจำนวนของเฟรม/แรค (เว้นแต่จะระบุไว้เป็นอย่างอื่น)</span></h3>
  <h3> <strong>3.11.2.</strong><span>
  ถ้าผู้เล่นไม่เริ่มต้นทัวร์นาเม้นท์หรือการแข่งขัน การเดิมพันทั้งหมดใน ผู้เล่นนั้นจะเป็นโมฆะ</span></h3>
  <h3> <strong>3.11.3.</strong><span>
  3.11.3.	ถ้าการแข่งขันเริ่มขึ้นแต่ไม่เสร็จสิ้น การเดิมพันทั้งหมดจะถือว่าเป็นโมฆะ ยกเว้นการเดิมพันบนตลาดที่มีการกำหนดอย่างไม่มีเงื่อนไข</span></h3>
  <h3><strong>3.11.4.</strong><span>
  การเดิมพันสนุกเกอร์และบิลเลียดจะตัดสินตามผลของการแข่งขัน (หรือเฟรม/แรคที่ระบุ) คะแนนจะไม่มีการอัพเดทสำหรับการเดิมพัน สนุกเกอร์และบิลเลียดแบบสด</span></h3>
  <h3><strong>3.11.5.</strong><span>
  For individual frame markets Over/Under and Odd/Even markets refer to the total number of points scored in that frame.</span></h3>
  <h3><strong>3.11.6.</strong><span>
  ผู้เล่นคนใดจะแทงลูกแดงลูกแรกได้ หมายถึงผู้เล่นที่แทงลูกแดงแรกตามกำหนดได้ในนัดการแข่งขันหรือเฟรมที่เจาะจง นั่นคือ แทงลูกแดงได้โดยไม่ฟาวล์ (ถ้ามีการวางลูกใหม่ระหว่างเฟรม การเดิมพันทั้งหมดจะยังคงใช้ได้อยู่)</span></h3>
  <h3><strong>3.11.7.</strong><span>
  ผู้เล่นคนใดทำได้ถึง 30 แต้มก่อน หมายถึงผู้เล่นที่ทำคะแนนได้ถึงสามสิบแต้มเป็นคนแรกในเฟรมที่เจาะจง (ถ้ามีการวางลูกใหม่ระหว่างเฟรม การเดิมพันทั้งหมดจะยังคงใช้ได้อยู่)</span></h3>
  <h3><strong>3.11.8.</strong><span>
  เบรคสูงสุด หมายถึง จำนวนแต้มที่ทำได้ใน "เบรค" หนึ่งโดยผู้เล่นคนเดียวหรือหลายคนในเฟรม นัดการแข่งขัน หรือทัวร์นาเมนท์ที่เจาะจง </span></h3>
  <h3><strong>3.11.9.</strong><span>
  จำนวนรวมเซนจูรี่ หมายถึง จำนวน "เบรค" 100 แต้มหรือมากกว่าซึ่งทำได้ในนัดการแข่งขันหรือทัวร์นาเมนท์ที่เจาะจง </span></h3>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R312" id="R312"></a>3.12.	กอล์ฟ</h2>
  <h3> <strong>3.12.1.</strong><span>
  การเดิมพันกอล์ฟทั้งหมดจะตัดสินตามผลการแข่งขันของทัวร์นาเมนท์อย่างเป็นทางการ </span></h3>
  <h3> <strong>3.12.2.</strong><span>
  ถ้าผู้เล่นไม่เริ่มต้นทัวร์นาเม้นท์หรือรอบที่ระบุ การเดิมพันทั้งหมดใน ผู้เล่นนั้นจะเป็นโมฆะ ถ้านักกอล์ฟถอนตัวหรือขาดคุณสมบัติในระหว่าง ทัวร์นาเมนท์หรือรอบที่ระบุ การเดิมพันทั้งหมดจะสูญเปล่า</span></h3>
  <h3><strong>3.12.3.</strong><span>
   ถ้าทัวร์นาเมนท์หรือรอบที่ระบุถูกทำให้ล่าช้าหรือหยุดชั่วคราว การเดิมพันทั้งหมด ยังคงมีผลต่อไปอีก 48 ชั่วโมง หลังเวลาสิ้นสุดที่กำหนดไว้ </span></h3>
  <h3><strong>3.12.4.</strong><span>
  เอาท์ไรท์ (ผู้ชนะของทัวร์นาเมนท์)</span></h3>
  <h4><strong>3.12.4.1.</strong><span>
  “ผู้เล่นอื่นใด” หรือ “สนาม” หมายถึง นักกอล์ฟทั้งหมดที่ไม่ได้ มีชื่อในตลาดเอาท์ไรท์</span></h4>
  <h4><strong>3.12.4.2.</strong><span>
  ตลาดเอาท์ไรท์จะตัดสินตามผู้ชนะของทัวร์นาเมนท์และผลของการ เล่นเพลย์ออฟใดๆ จะนำมาพิจารณา </span></h4>
  <h4><strong>3.12.4.3.</strong><span>
  ถ้าทัวร์นาเมนท์ถูกทำให้สั้นลงโดยเจ้าหน้าที่ (เช่น จำนวนหลุมตาม ที่กำหนดไว้ไม่สมบูรณ์) การเดิมพันทั้งหมดยังคงสมบูรณ์อยู่ถ้า มีการประกาศผู้ชนะอย่างเป็นทางการ อย่างไรก็ตาม ถ้าไม่มีการ แข่งขันต่อ การเดิมพันที่ได้วางไว้นั้นจะเป็นโมฆะ ถ้าไม่มีการประกาศ ผู้ชนะอย่างเป็นทางการ การเดิมพันทั้งหมดจะถือเป็นโมฆะ </span></h4>
  <h3> <strong>3.12.5.</strong><span>
  การจับคู่ทัวร์นาเมนท์</span></h3>
  <h4><strong>3.12.5.1.</strong><span>
  การจับคู่้ทัวร์นาเมนท์ หมายถึง นักกอล์ฟที่มีคะแนนต่ำที่สุด ระหว่างทัวร์นาเมนท์ (โดยทั่วไปแล้ว 72 หลุม) ถ้าจำนวนของหลุม ที่ได้ทำการแข่งขันไปลดลงจากที่ได้กำหนดไว้ การเดิมพันจะยังคง สมบูรณ์ถ้ามีการประกาศผลการแข่งขันของทัวร์นาเมนท์อย่างเป็นทางการ</span></h4>
  <h4><strong>3.12.5.2.</strong><span>
  นักกอล์ฟทั้งสองจะต้องที-ออฟ การเดิมพันจึงจะยังคงสมบูรณ์ นักกอล์ฟที่ตีได้จำนวนหลุมมากที่สุด (ไม่รวมเพลย์-ออฟ) จะเป็นผู้ชนะ ถ้านักกอล์ฟตีได้จำนวนหลุมเท่ากัน (ไม่รวมเพลย์-ออฟ) ผู้เล่นที่มี คะแนนต่ำที่สุดจะเป็นผู้ชนะ </span></h4>
  <h4><strong>3.12.5.3.</strong><span>
  ถ้านักกอล์ฟถอนตัวหรือขาดคุณสมบัติภายหลังจากการที-ออฟ จะถือว่าผู้เล่นอีกคนหนึ่งเป็นผู้ชนะ อย่างไรก็ตาม ถ้าผู้เล่นถอนตัวหรือ ขาดคุณสมบัติและภายหลังจากมีผู้เล่นอีกคนหนึ่งทำแต้มได้สูง นักกอล์ฟที่ตีได้จำนวนหลุมมากที่สุดจะยังคงได้รับการประกาศเป็นผู้ชนะ </span></h4>
  <h4><strong>3.12.5.4.</strong><span>
  ถ้านักกอล์ฟทั้งสองถอนตัวหรือขาดคุณสมบัติในระหว่างรอบเดียวกัน การเดิมพันทั้งหมดจะเป็นโมฆะโดยไม่คำนึงถึงจำนวนหลุมที่นักกอล์ฟแต่ละคนตีได้ </span></h4>
  <h3> <strong>3.12.6.</strong><span>
  ราวน์แมตช์อัพ</span></h3>
  <h4><strong>3.12.6.1.</strong><span>
  ราวน์แมตช์อัพ หมายถึง นักกอล์ฟที่มีคะแนนต่ำที่สุดโดยมากกว่า 18 หลุมที่ได้ระบุไว้ และไม่รวมการเล่นเพลย์-ออฟ</span></h4>
  <h4> <strong>3.12.6.2.</strong><span>
  นักกอล์ฟทั้งสองจะต้องที-ออฟ การเดิมพันจึงจะยังคงสมบูรณ์ ถ้านักกอล์ฟถอนตัวหรือขาดคุณสมบัติภายหลังจากการที-ออฟ จะถือว่าผู้เล่นอีกคนหนึ่งเป็นผู้ชนะ อย่างไรก็ตาม ถ้าผู้เล่นที่ขาด คุณสมบัติได้เริ่มการแข่งขันในรอบถัดไป คะแนนที่มีอยู่เดิมจะยังคงมีผล </span></h4>
  <h3> <strong>3.12.7.</strong><span>
  รอบ สูง/ต่ำ</span></h3>
  <h4><strong>3.12.7.1.</strong><span>
  ตลาดรอบ สูง/ต่ำ หมายถึง คะแนนของนักกอล์ฟหนึ่งคน (หรือนักกอล์ฟหลายคน) ที่สูงกว่า 18 หลุมที่ได้ระบุไว้ และไม่รวม การเพลย์-ออฟ </span></h4>
  <h4><strong>3.12.7.2.</strong><span>
  นักกอล์ฟจะต้องที-ออฟ การเดิมพันจึงจะยังคงสมบูรณ์ ถ้านักกอล์ฟพลาดจากการตีใน 18 หลุมที่ได้ระบุไว้ การเดิมพัน ทั้งหมดจะถือเป็นโมฆะ </span></h4>
  <h3> <strong>3.12.8.</strong><span>
  หลุมแต่ละหลุม สูง/ต่ำ</span></h3>
  <h4><strong>3.12.8.1.</strong><span>
  ตลาดหลุมแต่ละหลุม สูง/ต่ำ หมายถึง คะแนนของนักกอล์ฟหนึ่งคน (หรือนักกอล์ฟหลายคน) ที่สูงกว่าหลุมแต่ละหลุมที่ระบุของรอบที่ระบุไว้ </span></h4>
  <h4><strong>3.12.8.2.</strong><span>
  ถ้านักกอล์ฟ (หรือนักกอล์ฟหลายคน) ไม่สามารถพิชิตหลุมได้ การเดิมพันจะเป็นโมฆะ </span></h4>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R313" id="R313"></a>3.13.	การแข่งรถ</h2>
  <h3><strong>3.13.1.</strong><span>
  การแข่งรถ รวมถึง แต่ไม่ข้อจำกัดเฉพาะ ฟอร์มูล่า วัน, โมโต จีพี และ A1GP</span></h3>
  <h3><strong>3.13.2.</strong><span>
  ผู้ชนะบนแท่นจะถือว่าเป็นผลการแข่งขันอย่างเป็นทางการ ไม่ว่าจะมีการขาดคุณสมบัติใดๆ หรือการแก้ไขผลการแข่งขันในภายหลัง ถ้าหากไม่มีผู้ชนะบนแท่น ผลของการแข่งขันคือผลที่ี่องค์การกำกับดูแล ที่เกี่ยวข้องประกาศในทันทีภายหลังจากเสร็จสิ้นการแข่งขันยึดตามตำแหน่งในการคัดเลือกรอบสุดท้ายที่ประกาศโดยองค์การกำกับดูแลในทันทีหลังจบรอบ คัดเลือก</span></h3>
  <h3><strong>3.13.3.</strong><span>
  ถ้าสนามแข่งขันที่กำหนดไว้เปลี่ยนแปลง การเดิมพันทั้งหมด จะถือเป็นโมฆะ</span></h3>
  <h3><strong>3.13.4.</strong><span>
  ถ้าการแข่งขันถูกเลื่อนออกไป การเดิมพันทั้งหมดยังถือว่าสมบูรณ์ ถ้าการแข่งขันนั้นเริ่มต้นก่อนสิ้นสุดการแข่งขันเป็นเวลา 48 ชั่วโมง มิฉะนั้นการเดิมพันทั้งหมดจะถือเป็นโมฆะ ถ้าการแข่งขันเริ่มต้นขึ้น แต่ไม่เสร็จสิ้น การเดิมพันทั้งหมดยังคงมีผลต่อไป ถ้ามีการประกาศผล การแข่งขันอย่างเป็นทางการ ถ้าไม่มีการประกาศผลการแข่งขัน อย่างเป็นทางการการเดิมพันทั้งหมดจะเป็นโมฆะ</span></h3>
  <h3> <strong>3.13.5.</strong><span>
  การแข่งรถถือว่าเริ่มต้นขึ้นเมื่อมีการให้สัญญาณเริ่มของรอบก่อนแข่งจริง ถ้าคู่แข่งไม่พร้อมเริ่มต้นจากตำแหน่งออกรถ (หรือเลนสำหรับเติมน้ำมัน) การเดิมพันในตัวผู้แข่งนั้นจะเป็นโมฆะ ถ้าคู่แข่งไม่สามารถเริ่ม แข่งรอบคัดเลือกอย่างเป็นทางการได้ การเดิมพันโพลโพสซิชั่นในตัว ผู้แข่งนั้นจะถือเป็นโมฆะ</span></h3>
  <h3><strong>3.13.6.</strong><span>
  ในตลาดแบบตัวต่อตัว ผู้แข่งขันทั้งสองจะต้องเริ่มการแข่งขัน (หรือรอบคัดเลือกอย่างเป็นทางการ) การเดิมจึงจะสมบูรณ์ ผู้แข่งขันที่มีตำแหน่งการเข้าเส้นชัยที่ดีกว่าจะได้รับการประกาศเป็นผู้ชนะ ถ้าผู้แข่งขันทั้งสองไม่สามารถเข้าเส้นชัยได้ คู่แข่งที่ทำรอบได้มากที่สุด จะถือว่าเป็นผู้ชนะ ถ้ามีการบันทึกจำนวนรอบของผู้แข่งขันทั้งสองคนไว้เท่ากัน การเดิมพันทั้งหมดจะถือเป็นโมฆะจนกว่าจะมีการประกาศผลการลำดับนักแข่งอย่างเป็นทางการ</span></h3>
  <h3> <strong>3.13.7.</strong><span>
  ตลาดรอบที่เร็วที่สุดตัดสินโดยผู้แข่งขันหรือทีมที่ทำีำเวลารอบได้เร็วที่สุดในระหว่างการแข่งขัน</span></h3>
  <h3><strong>3.13.8.</strong><span>
  จำนวนตลาดของผู้เข้าเส้นชัยที่ได้รับการจัดประเภทจะตัดสินโดยผลการแข่งขันอย่างเป็นทางการที่ประกาศโดยองค์การกำกับดูแล </span></h3>
  <h3><strong>3.13.9.</strong><span>
  การเดิมพันการแข่งรถแบบสดจะตัดสินตามผลของการแข่งขันอย่าง เป็นทางการของการแข่งขันที่ระบุไว้ </span></h3>
  <h3><strong>3.13.10.</strong><span>
  ตลาดแบบคี่/คู่ ยึดตามตำแหน่งการเข้าเส้นชัยการแข่งขันตามที่ประกาศโดยองค์กรกำกับดูแล ตัวอย่างเช่น ถ้าคนขับ A เข้าเส้นชัยในตำแหน่งที่ 1 ผลการแข่งขันจะเป็นคี่ ถ้าคนขับ B เข้าเส้นชัยในตำแหน่งที่ 2 ผลการแข่งขันจะเป็นคู่ เป็นต้น ถ้าคนขับไม่ได้รับการจัดอันดับอย่างเป็นทางการ การเดิมพันจะถือเป็นโมฆะ และจะได้รับเงินคืน </span></h3>
  <h3><strong>3.13.11.</strong><span>
  ตลาดผลต่างของการชนะ ยึดตามความแตกต่างของเวลา (เป็นวินาที) ระหว่างคนขับที่เลือกไว้ตามที่ประกาศโดยองค์กรกำกับดูแล สูง หมายความว่า ความแตกต่างของเวลาจะมากกว่าแฮนดิแคป ขณะที่ ต่ำ หมายความว่า ความแตกต่างของเวลาจะน้อยกว่าแฮนดิแคปที่เสนอ ถ้าความแตกต่างของเวลาเท่ากับแฮนดิแคป การเดิมพันจะถือเป็นโมฆะ และจะได้รับเงินคืน </span></h3>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R314" id="R314"></a>3.14.	แฮนด์บอล</h2>
  <h3><strong>3.14.1.</strong><span>
  ตลาดแบบเต็มเวลาทั้งหมด รวมถึงการเดิมพันแบบสดจะตัดสินตาม ผลการแข่งขันในขั้นสุดท้ายในตอนท้ายของช่วงเวลาการแข่งขันปกติ การต่อเวลาพิเศษ และการยิงลูกโทษไม่ถือเป็นตลาดแบบเต็มเวลา</span></h3>
  <h3><strong>3.14.2.</strong><span>
  ถ้าการแข่งขันถูกเลื่อนออกไป หยุดชั่วคราวหรือยกเลิกและไม่ได้ ดำเนินการแข่งขันต่อภายใน 12 ชั่วโมงนับจากเวลาเริ่มเดิม การเดิมพัน ทั้งหมดจะถือเป็นโมฆะ ยกเว้นการเดิมพันบนตลาดที่มีการกำหนด โดยไม่มีเงื่อนไข การเดิมพันจะยังถือว่ามีผลถ้าผลการแข่งขันอย่าง เป็นทางการได้รับการประกาศโดยองค์การกำกับดูแลที่เกี่ยวข้อง</span></h3>
  <h3><strong>3.14.3.</strong><span>
  การเดิมพันแฮนด์บอลแบบสดจะตัดสินตามผลของการแข่งขันใน ตอนท้ายของช่วงเวลาการแข่งขันปกติ </span></h3>
  <h3><strong>3.14.4.</strong><span>
  คะแนนจะไม่มีการอัพเดตสำหรับการเดิมพันแฮนด์บอลแบบสด</span></h3>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R315" id="R315"></a>3.15.	โปโลน้ำ</h2>
  <h3><strong>3.15.1.</strong><span>
  ตลาดแบบเต็มเวลาทั้งหมด รวมถึงการเดิมพันแบบสดจะตัดสินตาม ผลการแข่งขันในขั้นสุดท้ายในตอนท้ายของช่วงเวลาการแข่งขันปกติ (4 ควอเตอร์) การต่อเวลาพิเศษ และการยิงลูกโทษไม่ถือเป็นตลาดแบบเต็มเวลา </span></h3>
  <h3><strong>3.15.2.</strong><span>
  ถ้าการแข่งขันถูกเลื่อนออกไป หยุดชั่วคราวหรือยกเลิกและไม่ได้ ดำเนินการแข่งขันต่อภายใน 12 ชั่วโมงนับจากเวลาเริ่มเดิม การเดิมพันทั้งหมดจะถือเป็นโมฆะ ยกเว้นการเดิมพันบนตลาด ที่มีการกำหนดโดยไม่มีเงื่อนไข การเดิมพันจะยังถือว่ามีผลถ้าผลการ แข่งขันอย่างเป็นทางการได้รับการประกาศโดยองค์การกำกับดูแลที่เกี่ยวข้อง</span></h3>
  <h3><strong>3.15.3.</strong><span>
  ตลาดสำหรับครึ่งแรก หมายถึง ผลการแข่งขันของ ครึ่งแรก และควอเตอร์ที่สอง การเดิมพันทั้งหมดจะถือเป็นโมฆะถ้าการแข่งขัน ในครึ่งที่ระบุไม่เสร็จสิ้น </span></h3>
  <h3><strong>3.15.4.</strong><span>
  การเดิมพันโปโลน้ำแบบสดจะตัดสินตามผลของการแข่งขันในตอน ท้ายของช่วงเวลาการแข่งขันปกติ </span></h3>
  <h3><strong>3.15.5.</strong><span>
  คะแนนจะไม่มีการอัพเดตสำหรับการเดิมพันโปโลน้ำแบบสด </span></h3>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R316" id="R316"></a>3.16.	มวย</h2>
  <h3><strong>3.16.1.</strong><span>
  การเดิมพันในการชกที่ถูกเลื่อนออกไปจะยังคงถือว่าสมบูรณ์ถ้าการ ชกนั้นเกิดขึ้นภายใน 14 วันนับตั้งแต่วันเริ่มชกเดิม</span></h3>
  <h3><strong>3.16.2.</strong><span>
  สำหรับตลาดมันนี่ไลน์ (ที่ซึ่งไม่มีการเสนอตัวเลือก การเสมอกันในการเดิมพัน) การเดิมพันทั้งหมดจะเป็นโมฆะ ถ้าผลการแข่งขันออกมาเสมอกัน ถ้ามีการเสนอราคาต่อรอง เป็นทางเลือกที่สามในการเดิมพัน และการแข่งขันจบลงที่ผลเสมอกัน การเดิมพันตัวเลือกของการเสมอกันนั้นจะได้รับเงินในฐานะเป็นผู้ชนะและการเดิมพันในตัวนักชกทั้งสองนั้นจะสูญเปล่า</span></h3>
  <h3><strong>3.16.3.</strong><span>
  การแข่งขันจะเริ่มต้นขึ้นนับจากได้ยินสัญญาณกระดิ่งที่ข้างเวทีสำหรับการแข่งในยกแรกถ้าคู่แข่งขันคนหนึ่งคนใดหรือทั้งสองคนไม่ขึ้นเวทีในระยะเวลาที่กำหนดถือว่าการแข่งขันในแมตซ์นั้นยกเลิกไม่มีการคิดได้เสีย ถ้าผู้แข่งขันขึ้นเวทีไม่ทันตามกำหนดเวลาหรือถูกตัดสินให้แพ้ฟาว์ระหว่างยกจะถือว่าฝ่ายตรงข้ามเป็นผู้ชนะในยกก่อนหน้านี้ </span></h3>
  <h3><strong>3.16.4.</strong><span>
  การเดิมพันทั้งหมดจะตัดสินตามคำตัดสินอย่างเป็นทางการที่ได้รับจากเสียงระฆังโดยทันทีภายหลังจากการชก การเปลี่ยนแปลงภายหลังต่อ ผลของการชกจะไม่ได้รับการยอมรับตามวัตถุประสงค์ของการเดิมพัน</span></h3>
  <h3><strong>3.16.5.</strong><span>
  การชนะแบบน็อคเอาท์ (KO) จะรวมถึงการชนะแบบ เทคนิคัลน็อคเอาท์ (TKO) หรือการชนะโดยการขาดคุณสมบัติ (DSQ) การตัดสินคะแนน จะรวมถึงการตัดสินทางเทคนิค (TD) และการเสมอกัน จะรวมถึงการเสมอกันทางเทคนิค</span></h3>
  <h3><strong>3.16.6.</strong><span>
  การเดิมพัน สูง/ต่ำ หมายถึงจำนวนของยกที่เกิดขึ้นระหว่างการชก เช่น ต่ำกว่า 9.5 จะหมายถึงการชกจบลงก่อนที่เวลา 1 นาที 30 วินาที ของยกที่ 9 ในขณะที่ สูงกว่า 9.5 จะหมายถึงการชกจบลงภายหลังเวลา 1 นาที 30 วินาที ของยกที่ 9 (รวมถึงการตัดสินด้วยคะแนน)</span></h3>
  <h3><strong>3.16.7.</strong><span>
   UFC </span></h3>
  <h4><strong>3.16.7.1.</strong><span>
  กฎ UFC นำไปใช้กับการชกที่สนับสนุนโดยองค์กรศิลปะการต่อสู้ แบบผสมอื่นๆ (MMA)</span></h4>
  <h4><strong>3.16.7.2.</strong><span>
  การเดิมพันในการชกที่ถูกเลื่อนออกไปจะยังคงถือว่าสมบูรณ์ถ้าการ ชกนั้นเกิดขึ้นภายใน 14 วันนับตั้งแต่วันเริ่มชกเดิม</span></h4>
  <h4><strong>3.16.7.3.</strong><span>
  ถ้าการชกจบลงด้วยการเสมอกัน การเดิมพันทั้งหมดจะเป็นโมฆะ </span></h4>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R317" id="R317"></a>3.17.	เกมปาลูกดอก</h2>
  <h3><strong>3.17.1.</strong><span>
  มันนี่ไลน์และตลาด หมายถึง ผู้ชนะการแข่งขัน แฮนดิแคปและตลาด สูง/ต่ำ ยึดตามจำนวนของเซ็ต (เว้นแต่จะระบุไว้เป็นอย่างอื่น)</span></h3>
  <h3><strong>3.17.2.</strong><span>
  ถ้าการแข่งขันถูกเลื่อนออกไปและไม่ได้เริ่มแข่งขันภายใน 12 ชั่วโมงนับจากเวลาเริ่มเดิม การเดิมพันทั้งหมดจะถือเป็นโมฆะ</span></h3>
  <h3><strong>3.17.3.</strong><span>
  ถ้าผู้เล่นไม่เริ่มต้นทัวร์นาเม้นท์หรือการแข่งขัน การเดิมพันทั้งหมด ในผู้เล่นนั้นจะเป็นโมฆะ</span></h3>
  <h3><strong>3.17.4.</strong><span>
  ถ้าการแข่งขันเริ่มขึ้นแต่ไม่เสร็จสิ้น การเดิมพันทั้งหมดจะถือ เป็นโมฆะ</span></h3>
  <h3><strong>3.17.5.</strong><span>
  การเดิมพันเกมปาลูกดอกแบบสดจะตัดสินตามผลของการแข่งขัน คะแนนจะไม่มีการอัพเดตสำหรับการเดิมพันเกมปาลูกดอกแบบสด</span></h3>
  <h3><strong>3.17.6.</strong><span>
   “180s” markets refer to the number of maximum “180s” thrown in a match.</span></h3>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R318" id="R318"></a>3.18.	กีฬาคริกเกต</h2>
  <h3> <strong>3.18.1</strong>.<span>สำหรับการแข่งขันแบบ Limited Over (รวมทั้ง โอดีไอ และ ทเวนตี20)  การเดิมพันทั้งหมดจะตัดสินตามผลการแข่งขันอย่างเป็นทางการ ตามกฎของการแข่งขัน อย่างไรก็ตาม ถ้าผลถูกตัดสินโดย ซุปเปอร์-โอเวอร์ การออกจากการเล่น การโยนเหรียญ เป็นต้น การเดิมพันของการแข่งขันทั้งหมดจะถือเป็นโมฆะ</span></h3>
  <h3><strong>3.18.2.</strong><span>
  ถ้า “ไม่มีผลการแข่งขัน” คือผลการแข่งขันอย่างเป็นทางการ หรือกฎของการแข่งขันไม่ประกาศผู้ชนะ การเิดิมพันจะเป็นโมฆะ</span></h3>
  <h3> <strong>3.18.3.</strong><span>
  ถ้าการแข่งขันถูกเลื่อนหรือหยุดชั่วขณะ การเดิมพันทั้งหมด ยังถือว่าสมบูรณ์ ถ้าการแข่งขันดำเนินต่อไปก่อนสิ้นสุดการแข่งขันภายใน 48 ชั่วโมง </span></h3>
  <h3> <strong>3.18.4.</strong><span>
  ตลาดของแมทช์ทดสอบจะนำเสนอในรูปแบบ 1X2 1  หมายถึง   ทีมที่ได้รับ การเรียกชื่อก่อน (โดยปกติคือทีมเจ้าบ้าน);
    X  หมายถึง   การแข่งขันที่ผลลัพธ์คือเสมอ; 2  หมายถึง   ทีมที่ได้รับการเรียกชื่อในอันดับที่สอง (โดยปกติคือทีมเยือน) ถ้าแมทช์ทดสอบจบลงที่ “คะแนนเท่ากัน-Tie” (ไม่เหมือนกับ “การเสมอกัน-Draw”) การเดิมพันของการแข่งขันทั้งหมดจะถือเป็นโมฆะ ถ้าการแข่งขันถูกยกเลิก เนื่องจากการแทรกแซงจากภายนอก การเดิมพันทั้งหมด อาจถูกประกาศเป็นโมฆะ</span></h3>
  <h3> <strong>3.18.5.</strong><span>
  ตลาดการวิ่งสูงสุด (Most Runs) หมายถึง ผู้เล่นที่ทำแต้มการวิ่ง (รัน) ได้มากที่สุดในระหว่างการแข่งขันหรือการแข่งขันช่วงใดช่วงหนึ่ง ผู้เล่นทั้งสองฝ่ายต้องอยู่ที่เส้นระบุ (crease) สำหรับลูกบอลอย่างน้อยหนึ่งครั้ง การเดิมพันจึงจะใช้ได้ ถ้า "ไม่มีผลลัพธ์" คือผลการแข่งขันอย่างเป็นทางการ การเดิมพันทั้งหมดในตลาดนี้จะถือว่าเป็นโมฆะ ยกเว้นตลาดที่ได้มีการกำหนดไว้อย่างไม่มีเงื่อนไข </span></h3>
  <h3> <strong>3.18.6.</strong><span>
  ตลาดวิกเกตสูงสุด (Most Wickets) หมายถึง ผู้เล่นที่ทำแต้มวิกเกตได้มากที่สุดในระหว่างการแข่งขันหรือการแข่งขันช่วงใดช่วงหนึ่ง ผู้เล่นทั้งสองฝ่ายต้องขว้าง (bowl) ลูกบอลอย่างน้อยหนึ่งครั้ง การเดิมพันจึงจะใช้ได้ ถ้า "ไม่มีผลลัพธ์" คือผลการแข่งขันอย่างเป็นทางการ การเดิมพันทั้งหมดในตลาดนี้จะถือว่าเป็นโมฆะ ยกเว้นตลาดที่ได้มีการกำหนดไว้อย่างไม่มีเงื่อนไข</span></h3>
  <h3> <strong>3.18.7.</strong><span>
  ตลาดหกสูงสุด (Most Sixes) หมายถึง ทีมที่ทำแต้มในการส่งหกครั้งได้มากที่สุดในระหว่างการแข่งขันหรือการแข่งขันช่วงใดช่วงหนึ่ง การเดิมพันจะใช้ได้เมื่อมีการประกาศผลอย่างเป็นทางการ ถ้า "ไม่มีผลลัพธ์" คือผลการแข่งขันอย่างเป็นทางการ การเดิมพันทั้งหมดในตลาดนี้จะถือว่าเป็นโมฆะ ยกเว้นตลาดที่ได้มีการกำหนดไว้อย่างไม่มีเงื่อนไข</span></h3>
  <h3> <strong>3.18.8.</strong><span>
  ตลาดผู้เล่นที่ออกคนถัดไป หมายถึง ผู้เล่นที่ถูกไล่ออกเป็นคนแรกในการแข่งขันหรืออินนิงที่ระบุ ถ้าผู้เล่นหนึ่งคนถอนตัว การเดิมพันจะถือเป็นโมฆะ ถ้าผู้เล่นไม่ถูกไล่ออกทั้งสองฝ่าย การเดิมพันทั้งหมดจะถือเป็นโมฆะ การเดิมพันทั้งหมดบนตลาดที่กำหนดจะถือว่ามีผล แม้ว่า “ไม่มีผลการแข่งขัน” คือผลการแข่งขันอย่างเป็นทางการ</span></h3>
  
  <h3><strong>3.18.9.</strong><span>
  ตลาดรวมการวิ่ง (Total Runs) หมายถึง จำนวนการวิ่งทั้งหมดที่ทำแต้มได้โดยผู้เล่นหรือทีมในระหว่างการแข่งขันหรือการแข่งขันช่วงใดช่วงหนึ่ง ผู้เล่นต้องอยู่ที่เส้นระบุ (crease) สำหรับอย่างน้อยหนึ่งลูกการเดิมพันจึงจะใช้ได้ ถ้า "ไม่มีผลลัพธ์" คือผลการแข่งขันอย่างเป็นทางการ การเดิมพันทั้งหมดในตลาดนี้จะถือว่าเป็นโมฆะ ยกเว้นตลาดที่ได้มีการกำหนดไว้อย่างไม่มีเงื่อนไข</span></h3>
  
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R319" id="R319"></a>3.19.	รักบียูเนียน</h2>
  <h3> <strong>3.19.1.</strong><span>
  ตลาดเต็มเวลาทั้งหมด รวมทั้งการเดิมพันขณะแข่งขัน จะถูกตัดสิน ขั้นสุดท้ายเมื่อสิ้นสุดเวลาปกติ (80 นาที) การต่อเวลาพิเศษไม่นับรวม สำหรับตลาดเต็มเวลา ตลาดรักบี้เซเว่น (Rugby Sevens) จะได้รับการตัดสินในช่วงท้ายของเวลาปกติ (โดยปกติคือ 14 หรือ 20 นาที) ตลาดรักบี้เซเว่นจะไม่นับรวมเวลาพิเศษไว้ในเวลาเต็ม</span></h3>
  <h3><strong>3.19.2.</strong><span>
  ถ้าการแข่งขันถูกเลื่อนออกไป หยุดชั่วคราวหรือยกเลิก และไม่ได้ดำเนินการแข่งขันต่อภายใน 12 ชั่วโมงนับจากเวลาเริ่มเดิม การเดิมพันทั้งหมดจะถือเป็นโมฆะ ยกเว้นการเดิมพันบนตลาดที่มี การกำหนดโดยไม่มีเงื่อนไข การเดิมพันจะยังถือว่ามีผลถ้าผลการแข่งขัน อย่างเป็นทางการได้รับการประกาศโดยองค์การกำกับดูแลที่เกี่ยวข้อง</span></h3>
  <h3><strong>3.19.3.</strong><span>
  ตลาดครึ่งแรก หมายถึง ผลการตัดสินของครึ่งแรกเท่านั้น การเดิมพันทั้งหมดจะถือเป็นโมฆะถ้าการแข่งขันในครึ่งที่ระบุไม่เสร็จสิ้น </span></h3>
  <h3><strong>3.19.4.</strong><span>
  การเดิมพันขณะแข่งขันของรักบียูเนียนจะตัดสินผลการแข่งขันเมื่อ สิ้นสุดเวลาปกติ </span></h3>
  <h3><strong>3.19.5.</strong><span>
  คะแนนจะถูกอัพเดทสำหรับการเดิมพันขณะแข่งขันของรักบียูเนียน และตลาดที่แสดงระหว่างการเดิมพันขณะแข่งขันหมายถึงคะแนนที่แสดงเมื่อมี การวางเดิมพัน </span></h3>
  <h3><strong>3.19.6.</strong><span>
  สำหรับการเดิมพันสด อันเกี่ยวกับการกระทำ ซึ่งในดุลยพินิจ เบ็ดเสร็จแต่เพียงผู้เดียวของบริษัท เห็นว่าเป็นอันตรายซึ่งคะแนน ผลการแข่งขัน การเล่นของทีมหรือผู้เล่นอาจจะได้รับผลกระทบ หรือทำให้เกิดการเปลี่ยนแปลงแต้มต่อ/ราคา หรือตลาด หรือข้อมูลการเดิมพัน ("การเล่นที่อันตราย") บริษัทขอสงวนสิทธิ์ในการระงับการรับเดิมพัน และอาจจะรับหรือปฏิเสธการเดิมพันภายหลังจากการเล่นที่อันตราย การกระทำอื่นๆ ทั้งหมดในเกมการแข่งขันถือว่าเป็นการเล่น ที่ปลอดภัยและจะถือว่าสามารถยอมรับเดิมพันได้ต่อไป</span></h3>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R320" id="R320"></a>3.20.	ลีกกีฬารักบี้</h2>
  <h3><strong>3.20.1.</strong><span>
  ตลาดเต็มเวลาทั้งหมดรวมทั้งการเดิมพันขณะแข่งขันจะถูกตัดสินขั้นสุดท้ายเมื่อสิ้นสุดการแข่งขัน รวมการต่อเวลาพิเศษที่อาจมี</span></h3>
  <h3><strong>3.20.2.</strong><span>
  ถ้าการแข่งขันถูกเลื่อนออกไป หยุดชั่วคราวหรือยกเลิกและ ไม่ได้ดำเนินการแข่งขันต่อภายใน 12 ชั่วโมงนับจากเวลาเริ่มเดิม การเดิมพันทั้งหมดจะถือเป็นโมฆะ ยกเว้นการเดิมพันบนตลาด ที่มีการกำหนดโดยไม่มีเงื่อนไข การเดิมพันจะยังถือว่ามีผลถ้าผลการแข่งขัน อย่างเป็นทางการได้รับการประกาศโดยองค์การกำกับดูแลที่เกี่ยวข้อง</span></h3>
  <h3><strong>3.20.3.</strong><span>
  ตลาดครึ่งแรก หมายถึง ผลการตัดสินของครึ่งแรกเท่านั้น การเดิมพันทั้งหมดจะถือเป็นโมฆะถ้าการแข่งขันในครึ่งที่ระบุไม่เสร็จสิ้น</span></h3>
  <h3><strong>3.20.4.</strong><span>
  การเดิมพันขณะแข่งขันของรักบีลีกจะตัดสินตามผลการแข่งขัน รวมถึง การแข่งขันขณะที่มีการต่อเวลาิพิเศษ</span></h3>
  <h3><strong>3.20.5.</strong><span>
  คะแนนจะถูกอัพเดทสำหรับการเดิมพันขณะแข่งขันของรักบีลีกและตลาดที่แสดงระหว่างการเดิมพันขณะแข่งขันหมายถึงคะแนนที่แสดงเมื่อมีการวางเดิมพัน </span></h3>
  <h3><strong>3.20.6.</strong><span>
  สำหรับการเดิมพันสด อันเกี่ยวกับการกระทำ ซึ่งในดุลยพินิจ เบ็ดเสร็จแต่เพียงผู้เดียวของบริษัท เห็นว่าเป็นอันตรายซึ่งคะแนน ผลการแข่งขัน การเล่นของทีมหรือผู้เล่นอาจจะได้รับผลกระทบ หรือทำให้เกิดการเปลี่ยนแปลงแต้มต่อ/ราคา หรือตลาด หรือข้อมูลการเดิมพัน ("การเล่นที่อันตราย") บริษัทขอสงวนสิทธิ์ในการระงับการรับเดิมพัน และอาจจะรับหรือปฏิเสธการเดิมพันภายหลังจากการเล่นที่อันตราย การกระทำอื่นๆ ทั้งหมดในเกมการแข่งขันถือว่าเป็นการเล่น ที่ปลอดภัยและจะถือว่าสามารถยอมรับเดิมพันได้ต่อไป</span></h3>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R321" id="R321"></a>3.21.	กรีฑา</h2>
  <h3><strong>3.21.1.</strong><span>
  ตลาดเอาท์ไรท์ (ชนะเหรียญทอง) หมายถึง ผู้ชนะในการแข่งขัน กรีฑาแต่ละประเภท</span></h3>
  <h3><strong>3.21.2.</strong><span>
  ตลาดมันนี่ไลน์ หมายถึง คู่แข่งขันที่ได้อันดับที่ดีที่สุดในการแข่งขัน (หรือฮีตที่กำหนด) ถ้านักกรีฑาหนึ่งคนเท่านั้นที่เข้าถึงเส้นชัยการแข่งขัน การเดิมพันคู่แข่งขันนั้นคือการเดิมพันที่ชนะรางวัล ถ้านักกรีฑาทั้งคู่ ไม่สามารถถึงเส้นชัยของการแข่งขัน คู่แข่งขันที่ได้อันดับที่ดีกว่าระหว่าง การตัดสินจะถูกประกาศเป็นผู้ชนะ</span></h3>
  <h3> <strong>3.21.3.</strong><span>
  ผู้ชนะบนแท่นจะเป็นผลการแข่งขันอย่างเป็นทางการสำหรับทุกการ เดิมพันที่ถูกตัดสิน การขาดคุณสมบัติหรือการแก้ไขผลการตัดสินภายหลัง จะไม่ถูกนำมาพิจารณาสำหรับจุดประสงค์ในการเดิมพัน</span></h3>
  <h3><strong>3.21.4.</strong><span>
  ถ้าการแข่งขันถูกเลื่อน หยุดชั่วคราว หรือยกเลิกและไม่สามารถ ดำเนินต่อไปใหม่ภายในสิบสองชั่วโมงของเวลาเริ่มต้นที่กำหนด การเดิมพันทั้งหมดถือเป็นโมฆะ</span></h3>
  <h3><strong>3.21.5.</strong><span>
  ถ้านักกรีฑาไม่สามารถเริ่มต้นการแข่งขันได้ การเดิมพันทั้งหมด จะเป็นโมฆะ จะถือว่านักกรีฑาได้เริ่มต้นการแข่งขันแล้ว ถ้าได้เข้าร่วม ในขอบเขตที่จำเป็นในการบันทึกผลการตัดสินอย่างเป็นทางการหรือจัดแบ่ง ประเภท (รวม DSQ (ขาดคุณสมบัติ) แต่ไม่รวม DNS (ไม่ได้เริ่มต้น))</span></h3>
  <h3><strong>3.21.6.</strong><span>
  For live betting, during a game, with respect to actions which the Company in its sole and absolute discretion, deems as dangerous where the score, outcome, performance of one team or player may be affected; or warrant changing the odds/prices or Markets or Betting Information (“Danger Play”) the Company reserves the right to suspend acceptance of bets and may accept or reject bets after the Danger Play. All other actions in a game are deemed Safe Play and bets will continue to be considered for acceptance.</span></h3>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R322" id="R322"></a>3.22.	ว่ายน้ำ</h2>
  <h3><strong>3.22.1.</strong><span>
  ตลาดเอาท์ไรท์ (ชนะเหรียญทอง) หมายถึง ผู้ชนะในการแข่งขัน กรีฑาแต่ละประเภท</span></h3>
  <h3><strong>3.22.2.</strong><span>
  ตลาดมันนี่ไลน์ หมายถึง คู่แข่งขันที่ได้อันดับที่ดีที่สุดในการแข่งขัน (หรือฮีตที่กำหนด) ถ้านักว่ายน้ำเพียงหนึ่งคนเท่านั้นที่เข้าถึงเส้นชัยการแข่งขัน การเดิมพันคู่แข่งขันนั้นคือการเดิมพันที่ได้ชัยชนะ ถ้านักว่ายน้ำทั้งคู่ ไม่สามารถถึงเส้นชัยของการแข่งขัน คู่แข่งขันที่ได้อันดับที่ดีกว่า ระหว่างการตัดสินจะถูกประกาศเป็นผู้ชนะ</span></h3>
  <h3><strong>3.22.3.</strong><span>
  ผู้ชนะบนแท่นจะเป็นผลการแข่งขันอย่างเป็นทางการสำหรับทุกการ เดิมพันที่ถูกตัดสิน การขาดคุณสมบัติหรือการแก้ไขผลการตัดสิน ภายหลังจะไม่ถูกนำมาพิจารณาสำหรับจุดประสงค์ในการเดิมพัน </span></h3>
  <h3><strong>3.22.4.</strong><span>
  ถ้าการแข่งขันถูกเลื่อน หยุดชั่วคราว หรือยกเลิกและไม่สามารถ ดำเนินต่อไปใหม่ภายในสิบสองชั่วโมงของเวลาเริ่มต้นที่กำหนด การเดิมพันทั้งหมดถือเป็นโมฆะ</span></h3>
  <h3><strong>3.22.5.</strong><span>
  ถ้านักว่ายน้ำไม่สามารถเริ่มต้นแข่งขันได้ การเดิมพันทั้งหมด ถือเป็นโมฆะ</span></h3>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R323" id="R323"></a>3.23. ฟุตบอลชายหาด</h2>
  <h3><strong>3.23.1.</strong> <span>การเดิมพันทั้งหมดจะตัดสินหลังทราบผลการเล่นของทั้งสามช่วงเต็ม (ช่วงละ สิบสองนาที) เว้นแต่บริษัทจะระบุไว้เป็นลายลักษณ์อักษรว่าเป็นอย่างอื่น </span></h3>
  <h3><strong>3.23.2.</strong> <span>ถ้าการแข่งขันเริ่มต้นก่อนเวลาที่กำหนดไว้ การวางเดิมพันแบบไม่สดใดๆ ที่วางหลังการเริ่มก่อนเวลาแต่ก่อนการเริ่มตามกำหนดการจะถือว่าเป็นโมฆะ การวางเดิมพันแบบสดระหว่างการเดิมพันแบบสดจะถือว่ามีผลที่สมบูรณ์ และถือว่าได้เริ่มเมื่อการแข่งขันได้เริ่มต้นขึ้น แม้จะเร็วกว่าเวลาที่กำหนดไว้ก็ตาม </span></h3>
  <h3><strong>3.23.3.</strong> <span>การต่อเวลาพิเศษและการยิงลูกโทษไม่นับรวมสำหรับการเดิมพันและการตัดสินยุติ  เว้นแต่จะระบุไว้เป็นอย่างอื่น </span></h3>
  <h3><strong>3.23.4.</strong> <span>ถ้าการแข่งขัันถูกหยุดชั่วคราว ถูกยกเลิก หรือยุติ การแ้ข่งขันทั้งหมดจะถือ เป็นโมฆะ  การแข่งขันจะถูกประกาศเป็นโมฆะโดยไม่คำนึงถึงคำตัดสิน ที่เป็นทางการใดๆ ต่อผลการแข่งขัน  การตัดสินยุติของการเดิมพันทั้งหมด ในกรณีของการแข่งขันที่ถูกยกเลิก อยู่ในดุลยพินิจของทางบริษัทเพียงผู้เดียว </span></h3>
  <h3><strong>3.23.5.</strong> <span>บริษัทได้ให้ข้อมูลเกี่ยวกับสนามแข่ง (เช่น พื้นที่ที่เป็นกลาง) เพื่อเป็นข้อมูลที่เป็น ประโยชน์เท่านั้นและจะไม่รับผิดใดๆ ไม่ว่าสนามแข่งที่เป็นกลางดังกล่าวจะถูกต้อง หรือไม่ก็ตาม  ลูกค้ามีหน้าที่ต้องทราบสนามที่ถูกต้องสำหรับทุกการแข่งขัน </span></h3>
  <h3><strong>3.23.6.</strong> <span>สำหรับการเดิมพันสด ในระหว่างการแข่งขัน อันเกี่ยวกับการกระทำซึ่งใน ดุลยพินิจเบ็ดเสร็จแต่เพียงผู้เดียวของบริษัท เห็นว่าเป็นอันตรายซึ่งคะแนน ผลการแข่งขัน การเล่นของทีมหรือผู้เล่นอาจจะได้รับผลกระทบ หรือทำให้เกิด การเปลี่ยนแปลงแต้มต่อ/ราคา หรือตลาด หรือข้อมูลการเดิมพัน ("การเล่นที่อันตราย") บริษัทขอสงวนสิทธิ์ในการระงับการรับเดิมพัน และอาจจะรับ หรือปฏิเสธการเดิมพันภายหลังจากการเล่นที่อันตราย การกระทำอื่นๆ ทั้งหมดในเกมการแข่งขันถือว่าเป็นการเล่นที่ปลอดภัย และจะถือว่าสามารถ ยอมรับเดิมพันได้ต่อไป</span></h3>
  <h3><strong>3.23.7.</strong> <span>สำหรับการเดิมพันแบบสด การวางเดิมพันที่ค้างอยู่ทั้งหมดจะถูกปฏิเสธ โดยอัตโนมัติ ตั้งแต่นาทีที่ผู้ตัดสินจบการแข่งขันเมื่อสิ้นสุดแต่ละช่วง และ/หรือเต็มเวลา </span></h3>
  <h3><strong>3.23.8.</strong> <span>ประเภทการเดิมพันฟุตบอลชายหาด </span></h3>
  <h4><strong>3.23.8.1.</strong><span>
  บริษัทมีประเภทการเดิมพันดังต่อไปนี้ </span></h4>
  <h5><strong>3.23.8.1.1.</strong> <span>การเดิมพันแบบไม่สด</span></h5>
  <h5>
    <p class="h7"><strong class="style3">3.23.8.1.1.1.</strong><span>
  เอเชียนแฮนดิแคป หมายถึง การเดิมพันว่าทีมใดจะทำ ประตูได้มาก ที่สุดโดยยึดตามคะแนนขั้นสุดท้ายที่รวมแฮนดิแคปต่างๆ </span></p>
  </h5>
  <h5>
    <p class="h7"><strong class="style3">3.23.8.1.1.2.</strong><span>
  คี่/คู่ หมายถึง การเดิมพันที่กำหนดจากการตัดสินว่าจำนวน ประตูรวมเมื่อสิ้นสุดสามช่วงเวลาการเล่นเต็ม (ช่วงละสิบสองนาที) เป็นคี่หรือคู่ </span></p>
  </h5>
  <h5>
    <p class="h7"><strong class="style3">3.23.8.1.1.3.</strong><span>
  สูง/ต่ำหมายถึง การเดิมพันจำนวนรวมของประตูที่จะทำได้ใน สามช่วงเวลาเต็มปกติของการเล่น (ช่วงละสิบสองนาที) ไม่รวมการต่อเวลาพิเศษ </span></p>
  </h5>
  <h5><strong>3.23.8.1.2.</strong> <span>การเดิมพัน ("สด") ที่กำลังดำเนินอยู่</span></h5>
  <h5>
    <p class="h7"><strong class="style3">3.23.8.1.2.1.</strong><span>
  เอเชียนแฮนดิแคป หมายถึง การเดิมพันว่าทีมใดจะ ทำประตูได้มากที่สุดโดยยึดตามคะแนนขั้นสุดท้าย ที่รวมแฮนดิแคปต่างๆ </span></p>
  </h5>
  <h5>
    <p class="h7"><strong class="style3">3.23.8.1.2.2.</strong><span>
  สูง/ต่ำ หมายถึง การเดิมพันจำนวนรวมของประตูที่จะทำ ได้ในสามช่วงเวลาเต็มปกติของการเล่น (ช่วงละสิบสองนาที) ไม่รวมการต่อเวลาพิเศษ </span></p>
  </h5>
  <h4><strong>3.23.8.2.</strong><span>
  สำหรับรายละเอียดทั้งหมดของประเภทการเดิมพัน โปรดดูข้อ 2.2 ที่ระบุไว้ข้างต้น </span></h4>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R324" id="R324"></a>3.24.   สควอช</h2>
  <h3><strong>3.24.1.</strong> <span>ตลาดมันนี่ไลน์อ้างอิงถึงผู้ชนะของการแข่งขันหรือเกมที่ระบุไว้ ตลาดแฮนดิแคปขึ้นกับ ทั้งเกมและแต้ม (กรุณาดูชื่อของตลาด) ตลาดแบบสูง/ต่ำ และตลาดแบบ คี่/คู่จะขึ้นกับแต้ม (เว้นแต่จะระบุไว้เป็นอย่างอื่น) </span></h3>
  <h3><strong>3.24.2.</strong> <span>ถ้าผู้เล่นไม่เริ่มต้นทัวร์นาเม้นท์หรือการแข่งขัน การเดิมพันทั้งหมดในผู้เล่นนั้นจะเป็นโมฆะ </span></h3>
  <h3><strong>3.24.3.</strong> <span>ถ้าผู้เล่นหนึ่งคน (หรือคู่) ถอนตัวหรือขาดคุณสมบัติในระหว่างการแข่งขัน การเดิมพันทั้ง หมดจะเป็นโมฆะ ยกเว้นแต่การเดิมพันบนตลาดที่มีการกำหนดโดยไม่มีเงื่อนไข </span></h3>
  <h3><strong>3.24.4.</strong> <span>ถ้าการแข่งขันถูกเลื่อนหรือหยุดชั่วขณะ การเดิมพันทั้งหมดยังถือว่าสมบูรณ์ ถ้าการแข่งขัน ดำเนินต่อไปก่อนสิ้นสุดการแข่งขัน 12 ชั่วโมง </span></h3>
  <h3><strong>3.24.5.</strong> <span>ผู้ชนะในเกมแรก (ผู้ชนะในเกมที่สอง ผู้ชนะในเกมที่สาม หรืออื่นๆ) หมายถึง ผลของการ แข่งขันในเกมที่ระบุ การเดิมพันทั้งหมดจะถือเป็นโมฆะถ้าการแข่งขันในเกมที่ระบุ ไม่เสร็จสิ้น </span></h3>
  <h3><strong>3.24.6.</strong> <span>การเดิมพันสควอชแบบสดจะตัดสินตามผลของการแข่งขัน (หรือเกมที่ระบุ) คะแนนจะไม่มี การอัพเดตสำหรับการเดิมพันสควอชแบบสด</span></h3>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R325" id="R325"></a>3.25.	ข้อเสนอพิเศษสำหรับการแข่งม้า</h2>
  <h3><strong>3.25.1.</strong><span>
  ข้อเสนอพิเศษสำหรับการแข่งมาจะมีเฉพาะการแข่งขันใหญ่ๆ เช่น เมลเบิร์นคัพ</span></h3>
  <h3><strong>3.25.2.</strong><span>
  เอาท์ไรท์</span></h3>
  <h4><strong>3.25.2.1.</strong><span>
  การเดิมพันแบบเอาท์ไรท์ คือ การเดิมพันผู้ชนะในการแข่งม้า ผลการแข่งขันจะเป็นทางการเมื่อมีการประกาศ “เคลียร์ทั้งหมด” “เดิมพันใน” หรือ “เดิมพันที่ถูกต้อง” และมีการประกาศ “ผลการแข่งขันอย่างเป็นทางการ” ในสนามแข่ง การขาดคุณสมบัติหรือการแก้ไขผลการตัดสินภายหลังจะไม่ถูกนำมาพิจารณาสำหรับจุดประสงค์ในการเดิมพัน</span></h4>
  <h4><strong>3.25.2.2.</strong><span>
  การวางเดิมพันแบบเอาท์ไรท์ คือ การเดิมพันม้าที่ได้ตำแหน่งที่ระบุในการแข่งขัน ลำดับที่ของตำแหน่งที่ถูกจ่าย ในฐานะของผู้ชนะจะระบุไว้ในหัวข้อเรื่องตลาด </span></h4>
  <h4><strong>3.25.2.3.</strong><span>
  การถอนตัว/ไม่ได้ลงแข่ง – เมื่อใดที่ม้าถูกถอนจากการแข่งขันก่อนหรือหลังจากมาที่อันดับของการเริ่มต้น (หรือหนึ่งประตูเริ่มต้นหรือมากกว่าไม่เปิด ซึ่งทำให้การเริ่มต้นไม่ยุติธรรม) ม้าจะถูกถือว่าไม่ได้ ลงแข่ง/ถูก ถอนตัวและเงินที่พนันกับม้าตัวนั้นจะได้รับคืน </span></h4>
  <h4><strong>3.25.2.4.</strong><span>
  ถ้ามีการประกาศ “เดดฮีท” ในตลาดเอาท์ไรท์  ครึ่งหนึ่งของเงินเดิมพันจะถูกใช้ในการเลือกที่ราคาต่อรองเต็มจำนวน และอีกครึ่งหนึ่งของเงินเดิมพันจะสูญไป ถ้าม้าเกินกว่าสองตัวมี "เดดฮีท" เงินเดิมพันจะถูกแบ่งตามสัดส่วนเท่าๆ กัน </span></h4>
  <h3><strong>3.25.3.</strong><span>
  ตัวต่อตัว</span></h3>
  <h4><strong>3.25.3.1.</strong><span>
  การเดิมพันแบบตัวต่อตัว คือ การเดิมพันที่ม้าตัวหนึ่งมีตำแหน่งดีกว่าม้าอีกตัวหนึ่งในการแข่งขัน ถ้าม้าตัวหนึ่ง (หรือทั้งคู่) ถูกถอนตัว/ไม่ได้ลงแข่ง การเดิมพันทั้งหมดจะถือเป็นโมฆะและได้รับเงินคืน ถ้าม้าทั้งสองตัว "เดดฮีท" (เข้าเส้นชัยพร้อมกัน) เงินเดิมพันทั้งหมดจะถือเป็นโมฆะ </span></h4>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R326" id="R326"></a>3.26.กฎกติกาและระเบียบข้อบังคับการแข่งขันกีฬาโอลิมปิกฤดูหนาว</h2>
  <h3><strong>3.26.1.</strong><span>
  ทั่วไป</span></h3>
  <h4><strong>3.26.1.1.</strong><span>
  ตลาดทั้งหมดจะตัดสินตามผลอย่างเป็นทางการที่ประกาศโดย IOC </span></h4>
  <h4><strong>3.26.1.2.</strong><span>
  พิธีมอบเหรียญเริ่มแรกจะเป็นผลอย่างเป็นทางการสำหรับการตัดสินการเดิมพันทั้งหมด การขาดคุณสมบัติหรือการแก้ไขผลการตัดสินภายหลังจะไม่ถูกนำมาพิจารณาสำหรับ
    จุดประสงค์ในการเดิมพัน </span></h4>
  <h4><strong>3.26.1.3.</strong><span>
  การเดิมพันทั้งหมดจะถือว่ามีผลถ้าการแข่งขันเสร็จสิ้นภายในระยะเวลาการแข่งขันอย่างเป็นทางการของกีฬาโอลิมปิก โดยไม่คำนึงว่าเวลาเริ่มต้นจะเป็นเมื่อใด หากการแข่งขันไม่ เสร็จสิ้น และไม่มีการประกาศผลอย่างเป็นทางการ การเดิมพันทั้งหมดจะถือเป็นโมฆะ และจะได้รับเงินคืน </span></h4>
  <h4><strong>3.26.1.4.</strong><span>
  การเดิมพันใดที่ยอมรับด้วยความผิดพลาดหลังการแข่งขันได้เริ่มต้นขึ้นแล้วจริงๆ  (ยกเว้นการเดิมพันสด) จะถือเป็นโมฆะและจะได้รับเงินคืน </span></h4>
  <h4><strong>3.26.1.5.</strong><span>
  ถ้าทีมหรือผู้แข่งขันไม่เิริ่มการแข่งขัน การเดิมพันทั้งหมดที่วางไว้ในการเลือกนั้น (รวมทั้งตลาดเอาท์ไรท์ (ชนะเหรียญทอง) ) จะถือเป็นโมฆะและจะได้รับเงินคืน ถ้าทีมหรือผู้แข่งขันที่ได้รับการเสนอชื่อในตลาดมันนี่ไลน์ (ตัวต่อตัว) ไม่เริ่มการแข่งขัน การเดิมพันทั้งหมดในตลาดนั้นจะถือเป็นโมฆะและจะได้รับเงินคืน </span></h4>
  <h4><strong>3.26.1.6.</strong><span>
  ถ้ามีการแข่งขันเสมอกันเกิดขึ้นในตลาดเอาท์ไรท์ (ชนะเหรียญทอง) ครึ่งหนึ่งของเงินเดิมพันจะถูกใช้้กับการเลือกที่ราคาต่อรอง ขณะที่อีกครึ่งหนึ่งของ เงินเดิมพันจะสูญไป ถ้ามีการแข่งขันเสมอกันในตลาดมันนี่ไลน์ (ตัวต่อตัว) ผลลัพธ์คือคะแนนเท่ากัน และการเดิมพันผู้แข่งขันทั้งสองฝ่ายจะได้รับเงินคืน </span></h4>
  <h3><strong>3.26.2.</strong><span>
  เหรียญโอลิมปิก</span></h3>
  <h4><strong>3.26.2.1.</strong><span>
  ตลาดจะมีการเสนอเหรียญจำนวนต่างๆ ที่ผู้แข่งขันชนะเป็นรายบุคคลหรือรายประเทศ ในการแข่งขันกีฬาโอลิมปิก </span></h4>
  <h4><strong>3.26.2.2.</strong><span>
  ตลาดเหล่านี้จะหมายถึง เหรียญทองเท่านั้น หรือเหรียญทั้งหมด (เหรียญทอง เงิน ทองแดงรวมกัน) </span></h4>
  <h4><strong>3.26.2.3.</strong><span>
  ตลาดทั้งหมดจะตัดสินโดยตารางประกาศเหรียญอย่างเป็นทางการที่เผยแพร่โดย IOC ทันทีหลังจบการแข่งขันกีฬาโอลิมปิก การเปลี่ยนแปลงตารางประกาศเหรียญใดๆ ในภายหลังจะไม่นำมาพิจารณาสำหรับจุดประสงค์ของการเดิมพัน </span></h4>
  <h3><strong>3.26.3.</strong><span>
  มันนี่ไลน์ (ตัวต่อตัว)</span></h3>
  <h4><strong>3.26.3.1.</strong><span>
  ผู้แ่ข่งขันหรือทีมใดจะชนะการแข่งขันหรือถูกวางไว้สูงกว่าในการแข่งขัน?</span></h4>
  <h5><strong>3.26.3.1.1.</strong><span>
   การวางตำแหน่งขั้นสุดท้ายจะตัดสินโดยผู้แข่งขันที่ไปได้ไกลที่สุดในการแข่งขัน ถ้าผู้แข่งขั้นทั้งสองรายถูกกำจัดออกในระยะเดียวกัน ผู้แข่งขันที่มีอันดับทางการสูงกว่า จะถูกประกาศให้เป็นผู้ชนะ ถ้าผู้แข่งขันทั้งสองราย ถูกกำจัดออกในระยะเดียวกัน แต่ไม่มีรายใดได้รับอันดับอย่างเป็นทางการ การเดิมพันจะถือเป็นโมฆะ </span></h5>
  <h3><strong>3.26.4.</strong><span>
  ฮ็อกกี้น้ำแข็ง</span></h3>
  <h4><strong>3.26.4.1.</strong><span>
  ฮ็อกกี้น้ำแข็งโอลิมปิกจะยึดตามกฎกติกาการแข่งขันฮ็อกกี้น้ำแข็งตามปกติ (3.5.) ที่อยู่ด้านบน</span></h4>
  <h4><strong>3.26.4.2.</strong><span>
  ยกเว้นกฎกติกาข้อ 3.5.3 ซึ่งจะถูกแทนที่โดยกฎกติกาต่อไปนี้ – การเดิมพันทั้งหมด จะถือว่า มีผลถ้าการแข่งขันเสร็จสิ้นภายในระยะเวลาแข่งขันอย่างเป็นทางการ ของกีฬาโอลิมปิก โดยไม่คำนึงว่าเวลาเริ่มต้นจะเป็นเมื่อใด การเดิมพันจะยังถือ ว่ามีผลถ้าผลการแข่งขันอย่างเป็นทางการได้รับการประกาศโดย IOC หากการแข่งขันไม่เสร็จสิ้น และไม่มีการประกาศผลอย่างเป็นทางการ การเดิมพันทั้งหมดจะถือเป็นโมฆะและจะได้รับเงินคืน</span></h4>
  <h4><strong>3.27.4.3.</strong><span>
  อาจมีการเสนอตลาดเพิ่มเติม (เช่น รวมการต่อเวลา หรือผู้ชนะการยิงลูกจุดโทษ) และเงื่อนไขของตลาดเหล่านี้จะระบุไว้อย่างชัดเจนในหัวข้อเรื่อง </span></h4>
  <p class="h7"><strong class="style3">*</strong><span>
  หมายเหตุ: การต่อเวลาจะระหว่างรอบคัดเลือกเบื้องต้นของการแข่งขันเป็นกลุ่ม ฉะนั้น การได้คะแนนเท่ากันจึงเป็นไปได้ </span></p>
  <div id="1-2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R327" id="R327"></a>3.27. เน็ตบอล</h2>
  <h3><strong>3.27.1.</strong><span>
  ตลาดแบบเต็มเวลาทั้งหมดรวมถึงการเดิมพันแบบสดจะยุติตามผลการแข่งขันในขั้นสุดท้ายรวมถึงการต่อเวลา (เว้นแต่จะระบุไว้เป็นอย่างอื่น) </span></h3>
  <h3><strong>3.27.2.</strong><span>
  ถ้าการแข่งขันไม่ได้เริ่มต้นตามวันเริ่มต้นที่กำหนด การเดิมพันทั้งหมดจะเป็นโมฆะ (เว้นแต่จะระบุไว้เป็นอย่างอื่น) ถ้าการแข่งขันถูกหยุดชั่วคราวหรือยกเลิก การเดิมพันทั้งหมดที่วางไว้จะถือว่าเป็นโมฆะ ยกเว้นการเดิมพันบนตลาดที่มีการกำหนดอย่างไม่มีเงื่อนไข </span></h3>
  <h3><strong>3.27.3.</strong><span>
  ผลการแข่งขันในครึ่งแรกคือคะแนนรวมของควอเตอร์แรกและควอเตอร์ที่สอง ผลการแข่งขันในครึ่งหลังคือคะแนนรวมของควอร์เตอร์ที่สามและควอเตอร์ที่สี่รวมถึงการต่อเวลาใดๆ ที่อาจจะเกิดขึ้น ผลการแข่งขันของควอเตอร์ที่สี่ไม่รวมถึงการต่อเวลาใดๆ ที่อาจจะเกิดขึ้น </span></h3>
  <h3><strong>3.27.4.</strong><span>
  ถ้าการแข่งขันถูกหยุดชั่วคราวหรือยกเลิก การเดิมพันที่วางไว้ในครึ่งของการแข่งขันหรือควอเตอร์ที่ไม่เสร็จสิ้นนั้นจะถือว่าเป็นโมฆะ ถ้าครึ่งของการแข่งขันหรือควอเตอร์ที่ระบุไว้นั้นเสร็จสิ้น การเดิมพันจะมีผล</span></h3>
  <h3><strong>3.27.5.</strong><span>
  คะแนนจะไม่มีการอัพเดตสำหรับการเดิมพันเน็ตบอลแบบสด และแฮนดิแคปที่แสดงในระหว่างการซื้อขายแบบสด หมายถึงคะแนนในตอนเริ่มต้นของการแข่งขัน เช่น 0-0 เวลาและึคะแนนที่แสดงมีไว้เพื่อจุดประสงค์ในการอ้างอิงเท่านั้น</span></h3>
  <div id="Div3" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R328" id="R328"></a>3.28.กฎกติกาและระเบียบข้อบังคับการเดิมพันเกม Number Game</h2>
  <h3><strong>3.28.1.</strong><span>
  ข้อมูลทั่วไป</span></h3>
  <h4><strong>3.28.1.1.</strong><span>
  เกมนี้เล่นโดยการเดิมพันหมายเลขบนลูกบอลที่เครื่องบิงโกสุ่มจับออกมา  </span></h4>
  <h4><strong>3.28.1.2.</strong><span>
  บริษัทจะกำหนดแต้มต่อสำหรับการสุ่มจับลูกบอลแต่ละครั้งตามเวลาการเล่นจริง  คุณสามารถวางเดิมพันตามแต้มต่อนั้นได้ตามประเภทการเดิมพันต่างๆ ที่จะอธิบายต่อไปด้านล่าง </span></h4>
  <h3><strong>3.28.2.</strong><span>
  ประเภทการเดิมพัน</span></h3>
  <h4><strong>3.28.2.1.</strong><span>
  โดยทั่วไป Number Game จะมีการเดิมพันสองประเภท</span></h4>
  <h5><strong>(A)</strong><span>
  เดิมพันล่วงหน้า - ผู้เล่นสามารถวางเดิมพันได้ก่อนเกมเริ่ม แต่เมื่อเกมเริ่มต้นแล้วจะปิดรับการวางเดิมพันทั้งหมด</span></h5>
  <h5><strong>(B)</strong><span>
  เดิมพันระหว่างเกม -  ผู้เล่นสามารถวางเดิมพันได้ตลอดเวลาหลังเริ่มเกม โดยจะมีการกำหนดแต้มต่อสำหรับการสุ่มจับลูกบอลแต่ละครั้ง</span></h5>
  <h3><strong>3.28.3.</strong><span>
  เดิมพันล่วงหน้า</span></h3>
  <h4><strong>3.28.3.1.</strong><span>
  ประเภทของเดิมพันล่วงหน้ามีดังต่อไปนี้</span></h4>
  <h4><strong>(A)</strong><span>
  สูง/ต่ำ, บอลลูกแรกหรือลูกสุดท้ายที่จับขึ้นมา</span></h4>
  <h4><strong>(B)</strong><span>
  คี่/คู่, บอลลูกแรกหรือลูกสุดท้ายที่จับขึ้นมา</span></h4>
  <h4><strong>(C)</strong><span>
  คี่/คู่ (FT) (ผลรวมของลูกบอลสามลูกที่จับขึ้นมา)</span></h4>
  <h5><strong></strong><span>
  "คำว่า “บอลลูกสุดท้ายที่จับขึ้นมา” หมายถึงบอลลูกสุดท้ายที่ถูกจับขึ้นมาจากลูกบอลบิงโกจำนวนหนึ่งที่จัดเตรียมไว้ล่วงหน้า  ไม่ว่าด้วยเหตุผลใดก็ตาม หากไม่มีการจับบอลลูกสุดท้ายขึ้นมา เดิมพันทั้งหมดบนบอลลูกสุดท้ายจะถือเป็นโมฆะและได้รับเงินคืน </span></h5>
  <h5><strong></strong><span>
  การจ่ายเดิมพันจะจ่ายเฉพาะเกมที่สมบูรณ์เท่านั้น  เกมที่สมบูรณ์คือเกมที่บอลลูกสุดท้ายถูกจับขึ้นมาโดยไม่เคยเกิดข้อผิดพลาดใดๆ จนถึงขณะนั้น  ในกรณีที่เกิดข้อผิดพลาดขึ้น บริษัทขอสงวนสิทธิ์ที่จะยกเลิกเกมและคืนเงินเดิมพัน</span></h5>
  <h4><strong>3.28.3.2.</strong><span>
  สูง/ต่ำ, บอลลูกแรกหรือลูกสุดท้ายที่จับขึ้นมา</span></h4>
  <h4><strong></strong><span>
  บริษัทจะกำหนดแต้มต่อสำหรับหมายเลขบนบอลลูกแรกหรือบอลลูกสุดท้ายที่จับขึ้นมาว่ามีค่า "สูง" หรือ "ต่ำ"</span></h4>
  <h4><strong></strong><span>
  สูง บอลลูกแรก/ลูกสุดท้าย– ลูกบอลที่มีหมายเลขตั้งแต่ 38 ถึง 75 ถือเป็นบอลที่มีค่าสูง</span></h4>
  <h4><strong></strong><span>
  ต่ำ บอลลูกแรก/ลูกสุดท้าย–ลูกบอลที่มีหมายเลขตั้งแต่ 1 ถึง 37 ถือเป็นบอลที่มีค่าต่ำ</span></h4>
  <h5><strong></strong><span>
  ตัวอย่าง:  ลูกบอลหมายเลข 30 ถูกจับขึ้นมาเป็นลูกสุดท้ายระหว่างการเล่นเกม ดังนั้นเดิมพัน "ต่ำ" ชนะ</span></h5>
  <h4><strong>3.28.3.3.</strong><span>
  คี่/คู่, บอลลูกแรกหรือลูกสุดท้ายที่จับขึ้นมา</span></h4>
  <h4><strong></strong><span>
  บริษัทจะกำหนดแต้มต่อสำหรับหมายเลขบนบอลลูกแรกหรือบอลลูกสุดท้ายที่จับขึ้นมาว่ามีค่า "คี่" หรือ "คู่" </span></h4>
  <h4><strong></strong><span>
  คี่ – บอลบิงโกที่เป็นเลขคี่ถือว่าเป็นบอลคี่</span></h4>
  <h4><strong></strong><span>
  คู่ – บอลบิงโกที่เป็นเลขคู่ถือว่าเป็นบอลคู่</span></h4>
  <h5><strong></strong><span>
  ตัวอย่าง:  ลูกบอลหมายเลข 30 ถูกจับขึ้นมาเป็นลูกแรกระหว่างการเล่นเกม ดังนั้นเดิมพัน "คู่" ชนะ</span></h5>
  <h4><strong>3.28.3.4.</strong><span>
  คี่/คู่ FT (ผลรวมของลูกบอลสามลูกที่จับขึ้นมา) </span></h4>
  <h4><strong></strong><span>
  บริษัทจะกำหนดแต้มต่อการเดิมพันผลรวมของลูกบอลสามลูกที่จับขึ้นมาว่าเป็นเลขคู่หรือเลขคึ่</span></h4>
  <h4><strong></strong><span>
  คี่ (FT) – ผลรวมของลูกบอลสามลูกที่จับขึ้นมาเป็นเลขคี่</span></h4>
  <h4><strong></strong><span>
  คู่ (FT) – ผลรวมของลูกบอลสามลูกที่จับขึ้นมาเป็นเลขคู่</span></h4>
  <h5><strong></strong><span>
  ตัวอย่าง:  ลูกบอลหมายเลข 07, 13 และ 20 ถูกจับขึ้นมา และผลรวมของหมายเลขของลูกบอลเหล่านี้เท่ากับ 40  40 เป็นเลขคู่ ดังนั้นเดิมพัน "คู่ (FT)" ชนะ</span></h5>
  <h3><strong>3.28.4.</strong><span>
  เดิมพันระหว่างเกม</span></h3>
  <h4><strong>3.28.4.1.</strong><span>
   มีประเภทการเดิมพันห้า (5) ประเภทสำหรับการเดิมพันระหว่างเกม:</span></h4>
      <h5><span>A. คี่/คู่ ถัดไป<br>
      B. สูง/ต่ำ ถัดไป<br>
      C. สูงขึ้น/ต่ำลง ถัดไป<br>
      D. Warrior, เปรียบเทียบ กับบอลลูกที่สองที่ถูกสุ่มจับ หรือบอลลูกที่สามที่สุ่มจับ<br>
      E. จำนวนรอบ (Number Wheel) </span></h5>
  <h4><strong>3.28.4.2.</strong><span>
  คี่/คู่ ถัดไป</span></h4>
  <h5><strong>3.28.4.2.1.</strong><span>
  ภายหลังการจับลูกบอลแต่ละครั้ง บริษัทจะกำหนดแต้มต่อว่าบอลลูกต่อไปที่จับขึ้นมาจะเป็นเลข "คี่" หรือ "คู่" ผู้เล่นสามารถวางเดิมพันได้ตลอดเวลาหลังเริ่มเกม เกมจะจบลงเมื่อจับบอลขึ้นมาแล้วจำนวนหนึ่งซึ่งขึ้นอยู่กับดุลยพินิจของบริษัท</span></h5>
  <h4><strong>3.28.4.3.</strong><span>
  สูง/ต่ำ ถัดไป</span></h4>
  <h5><strong>3.28.4.3.1.</strong><span>
  ภายหลังการจับลูกบอลแต่ละครั้ง บริษัทจะกำหนดแต้มต่อว่าบอลลูกต่อไปที่จับขึ้นมาจะเป็น "สูง" หรือ "ต่ำ" <br>
  ผู้เล่นสามารถวางเดิมพันได้ตลอดเวลาหลังเริ่มเกม<br>
  ลูกบอลที่มีหมายเลขตั้งแต่ 1 ถึง 37 ถือเป็นบอลที่มีค่า "ต่ำ"<br>
  ลูกบอลที่มีหมายเลขตั้งแต่ 38 ถึง 75 ถือเป็นบอลที่มีค่า "สูง"<br>
  เกมจะจบลงเมื่อจับบอลขึ้นมาแล้วจำนวนหนึ่งซึ่งขึ้นอยู่กับดุลยพินิจของบริษัท</span></h5>
  <h4><strong>3.28.4.4.</strong><span>
  สูงขึ้น/ต่ำลง ถัดไป</span></h4>
  <h5><strong>3.28.4.4.1.</strong><span>
  ภายหลังการจับลูกบอลแต่ละครั้ง บริษัทจะกำหนดแต้มต่อว่าบอลลูกต่อไปที่จับขึ้นมาจะมีค่าสูงขึ้นหรือต่ำลง ผู้เล่นสามารถวางเดิมพันได้ตลอดเวลาหลังเริ่มเกม เกมจะจบลงเมื่อจับบอลขึ้นมาแล้วจำนวนหนึ่งซึ่งขึ้นอยู่กับดุลยพินิจของบริษัท</span></h5>
  <h3><strong>3.28.5.</strong><span>
  Warrior, เปรียบเทียบ กับบอลลูกที่สองที่ถูกสุ่มจับ หรือบอลลูกที่สามที่สุ่มจับ</span></h3>
  <h4><strong>3.28.5.1.</strong><span>
  สำหรับเกมส์นี้นั้นจะสุ่มจับลูกบอล 3 ลูก เริ่มด้วยการสุ่มจับบอลลูกที่ 1 ก่อน  และจะเล่นโดย เปรียบเทียบลูกบอลที่สุ่มจับลูกที่ 2 และลูกที่ 3 โดยลูกบอลที่ถูกสุ่มจับที่มีตัวเลขสูงสุด ถือว่าชนะ</span></h4>
  <h5><strong>3.28.5.1.1.</strong><span>
  เลข 1 จะเป็นหมายเลขที่มีค่าต่ำที่สุด และหมายเลข 75 จะเป็นหมายเลขที่มีค่าสูงสุด</span><br></h5>
  <h5><strong>3.28.5.1.2.</strong><span>
  ทางบริษัทจะเสนอราคา สำหรับการเดิมพันประเภทนี้ก่อนที่จะสุ่มจับบอลลูกแรก ผู้เล่น สามารถ ทายผลตอนไหนก็ได้ แต่ต้องทายผลก่อนที่ลูกบอลลูกแรกจะถูกสุ่มจับขึ้นมา</span><br></h5>
  <h5><span>ตัวอย่างเช่น : หากลูกบอลลูกที่ 2 คือหมายเลข 45 และ ลูกบอลบอลลูกที่ 3คือหมายเลข 60 ผู้เล่นที่ทายผลในบอลลูกที่ 3 ก็จะถือว่าชนะในเกมส์นี้</span></h5>
  <h3><strong>3.28.6.</strong><span>
  Next Combo</span></h3>
  <h4><strong>3.28.6.1.</strong><span>
   หลังจากที่ลูกบอลแต่ละลูกถูกสุ่มจับ ทางบริษัทจะทำการเปิดราคาว่า  ลูกบอลที่จะถูกสุ่มจับลูกต่อไปจะเป็น สูง/คี่, ต่ำคี่ ,สูง/คู่ ต่ำ/คู่  ผู้เล่นสามารถทายผลได้ตลอดเวลา หลังจากเริ่มเกมส์ เกมส์จะสิ้นสดเมื่อจำนวนของลูกบอลได้ถูกสุ่มจับ ซึ่งขึ้นอยู่กับดุลพินิจของทางบริษัท</span></h4>
  <h5><strong>ตัวอย่างที่ 1：</strong><span>
  หากลูกบอลที่ถูกสุ่มจับออกมาเป็นหมายเลข 30 ดังนั้นการทายผล "ต่ำ/คู่ ถัดไป" จะถือว่าชนะ</span><br></h5>
  <h5><strong>ตัวอย่างที่ 2：</strong><span>
  หากลูกบอลที่ถูกสุ่มจับออกมาเป็นหมายเลข 47 ดังนั้นการทายผล "สูง/คี่ ถัดไป" จะถือว่าชนะ</span><br></h5><h3><strong>3.28.7.</strong><span>
   กฎกติกาเพิ่มเติม</span></h3>
  <h3><strong>3.28.7.</strong><span>
  จำนวนรอบ</span></h3>
  <h4><strong>3.28.7.1.</strong><span>
  เกมนี้เล่นโดยการเดิมพันเลขเดี่ยวหรือเลขกลุ่ม บริษัทจะเสนอเลขคี่ก่อนที่จะมีการจับบอลลูกที่ 1 ผู้เล่นสามารถวางเดิมพันได้ทุกเมื่อหลังจากที่การแข่งขันเริ่มต้นขึ้น</span> </h4>
  <h4><strong>3.28.7.2.</strong><span>
  ผู้เล่นสามารถวางเดิมเลขเดี่ยวและเลขกลุ่มได้มากกว่าหนึ่งรายการ</span> </h4>
  <h4><strong>3.28.7.3.</strong><span>
  ผู้เล่นสามารถมองเห็นเลขคี่ที่นำเสนอในตัวเลขเดี่ยว ซึ่งวางไว้ข้างบอลแต่ละลูก</span> </h4>
  <h4><strong>3.28.7.4.</strong><span>
  ผู้เล่นยังสามารถเลือกวางเดิมพันได้หลายกลุ่มตัวเลข:</span> </h4>
  <h5><strong>3.28.7.4.1.</strong><span>
  ประเภทการเดิมพันแบบห้า (5) หมายเลข </span> </h5>
  <h5><span>เป็นแต้มต่อสำหรับการวางเดิมพันโดยเลือกกลุ่มตัวเลข หนึ่งกลุ่มประกอบด้วยตัวเลข 5 ตัว โดยจัดเรียงเป็นแถวตามแนวนอน ประกอบด้วยกลุ่มหมายเลขดังต่อไปนี้:</span> </h5>
  <h5><span>กลุ่ม 1-1 (หมายเลข 1-5)  กลุ่ม 1-2 (หมายเลข 6-10)  กลุ่ม 1-3 (หมายเลข 11-15)  กลุ่ม 1-4 (หมายเลข 16-20)  กลุ่ม 1-5 (หมายเลข 21-25)  กลุ่ม 1-6 (หมายเลข 26-30)  กลุ่ม 1-7 (หมายเลข 31-35)  กลุ่ม 1-8 (หมายเลข 36-40)  กลุ่ม 1-9 (หมายเลข 41-45)  กลุ่ม 1-10 (หมายเลข 46-50)  กลุ่ม 1-11 (หมายเลข 51-55)  กลุ่ม 1-12 (หมายเลข 56-60)  กลุ่ม 1-13 (หมายเลข 61-65)  กลุ่ม 1-14 (หมายเลข 66-70)  และ กลุ่ม 1-15 (หมายเลข 71-75)</span> </h5>
  <h5><strong>3.28.7.4.2.</strong><span>
   ประเภทการเดิมพันแบบสิบห้า (15) หมายเลข  </span> </h5>
  <h5><span>เป็นแต้มต่อสำหรับการวางเดิมพันโดยเลือกกลุ่มตัวเลข หนึ่งกลุ่มประกอบด้วยตัวเลข 15 ตัว โดยจัดเรียงเป็นแถวหรือคอลัมน์ตามแต่รูปแบบการจัดแสดง</span> </h5>
  <h5><strong>3.28.7.4.2.1</strong><span>
  ประเภทการเดิมพันแบบ 15 หมายเลขโดยจัดเรียงเป็นแถว:</span> </h5>
  <h5><span>กลุ่ม 2-1 (หมายเลข 1-15)  กลุ่ม 2-2 (หมายเลข 16-30)  กลุ่ม 2-3 (หมายเลข 31-45)  กลุ่ม 2-4 (หมายเลข 46-60)  และ กลุ่ม 2-5 (หมายเลข 61-75)</span> </h5>
  <h5><strong>3.28.7.4.2.2</strong><span>
   ประเภทการเดิมพันแบบ 15 หมายเลขโดยจัดเรียงเป็นคอลัมน์:</span> </h5>
  <h5><span>กลุ่ม 4-1 (หมายเลข 1,6, 11, 16, 21, 26, 31, 36, 41, 46, 51, 56, 61, 66, 71) กลุ่ม 4-2 (หมายเลข 2, 7, 12, 17, 22, 27, 32, 37, 42, 47, 52, 57, 62, 67, 72) กลุ่ม 4-3 (หมายเลข 3, 8, 13, 18, 23, 28, 33, 38, 43, 48, 53, 58, 63, 68, 73) กลุ่ม 4-4 (หมายเลข 4, 9, 14, 19, 24, 29, 34, 39, 44, 49, 54, 59, 64, 69, 74) และ กลุ่ม 4-5 (หมายเลข 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75)</span> </h5>
  <h5><strong>3.28.7.4.3.</strong><span>
  ประเภทการเดิมพันแบบยี่สิบห้า (25) หมายเลข </span> </h5>
  <h5><span>เป็นแต้มต่อสำหรับการวางเดิมพันโดยเลือกกลุ่มตัวเลขที่ประกอบด้วยตัวเลข 25 ตัว ได้แก่ กลุ่มตัวเลขดังต่อไปนี้:</span> </h5>
  <h5><span>กลุ่ม 3-1 (หมายเลข 1-25)  กลุ่ม 3-2 (หมายเลข 26-50) และ กลุ่ม 3-3 (หมายเลข 51-75)</span> </h5> 
  <h4><strong>3.28.8.1.</strong><span>
  ลูกบอลที่จับขึ้นมาจากเครื่องบิงโกจะอ่านโดยเครื่องสแกนอัตโนมัติ บริษัทได้ดำเนินขั้นตอนและการป้องกันอันสมควรที่เกี่ยวกับความถูกต้องแม่นยำของเครื่องสแกนแล้ว แม้ว่าจะมีขั้นตอนและการป้องกันเหล่านี้แล้วก็ตาม คุณรับทราบดีว่าธรรมชาติของเกมนี้มีจังหวะการเล่นที่กระชั้นและพึ่งพาผลลัพธ์ที่ประมวลขึ้นอย่างรวดเร็วจากเครื่องสแกนอัตโนมัติ ดังนั้น ในกรณีหายากที่เกิดความไม่สอดคล้องระหว่างหมายเลขของลูกบอลที่แสดงบน วิดีโอสตรีมมิ่งและหมายเลขของลููกบอลที่เครื่องสแกนอัตโนมัติอ่านได้ บริษัทขอสงวนสิทธิ์ในการยึดถือผลลัพธ์จากเครื่องสแกนอัตโนมัติเป็นข้อยุติ คุณยอมรับว่าการตัดสินใจของบริษัทถือเป็นที่สิ้นสุดและมีผลผูกพันในเรื่องที่เกี่ยวข้อง</span></h4>
  <h4><strong>3.28.8.2.</strong><span>
  เกมแบบเดิมพันระหว่างเกมทั้งหมดจะตัดสินภายหลังการจับบอลแต่ละครั้ง</span> </h4>
  <h4><strong>3.28.8.3.</strong><span>
  คุณรับทราบว่า ด้วยการตัดสินใจและดุลยพินิจแต่เพียงผู้เดียวของบริษัท บริษัทมีสิทธิ์เบ็ดเสร็จในการเปลี่ยนแปลง ยกเลิก ระงับ โยกย้าย แก้ไข หรือเริ่มต้นเกมใหม่ หรืออาจปฏิเสธหรือยกเลิกเงินเดิมพันใดๆ เพราะเหตุผลต่อไปนี้ เกิดเหตุที่ไม่อาจคาดได้ สงคราม ภัยพิบัติทางธรรมชาติ ไฟฟ้าดับ ข้อผิดพลาดที่เกิดจากมนุษย์ หรือความผิดพลาดหรือความประมาทเลินเล่อของพนักงานบริษัทในการฝ่าฝืนมาตรฐานการทำงาน การทำงานผิดปกติของซอฟต์แวร์ และเหตุอื่นใดในลักษณะใกล้เคียงกัน การตัดสินใจของบริษัทถือเป็นที่สิ้นสุดและมีผลผูกพัน</span> </h4>  
  <h3><strong>3.28.9.</strong><span>
   ตัวกำหนดเวลาการวางเดิมพัน </span></h3>
  <h4><strong>3.28.9.1.</strong><span>
  ตัวกำหนดเวลาการวางเดิมพันจะแสดงระยะเวลาที่ผู้เล่น สามารถวางเดิมพันได้  ตัว กำหนดเวลาการวางเดิมพันจะปรากฎ เป็นกราฟฟิคในเหตุการณ์ (event) ปัจจุบัน โดยที่ ระยะเวลาที่กำหนดในตัวกำหนดเวลาการวางเดิมพัน จะถูกกำหนดโดยบริษัทฯ แต่เพียงผู้เดียว  เฉพาะการเดิมพันที่วางก่อนสิ้นสุดระยะเวลาที่กำหนดในตัวกำหนดเวลาการวางเดิมพันเท่านั้นจึงจะถือว่ามีผลสมบูรณ์   ผู้เล่น ไม่สามารถ วางเดิมพัน ภายหลังจากสิ้นสุดระยะเวลาที่กำหนดในตัวกำหนดเวลาการวางเดิมพัน  เดิมพันที่วาง ภายหลังจาก สิ้นสุดระยะเวลาที่กำหนด สำหรับ การวางเดิมพัน จะถือว่าไม่มีผลหรือเป็นโมฆะ </span> </h4>
  <h4><strong>3.28.9.2.</strong><span>
  ผู้เล่นยอมรับว่าบริษัทฯ ได้พยายามอย่างเต็มความสามารถในการตรวจสอบความถูกต้องของตัวกำหนดเวลาการวางเดิมพันอยู่ตลอดเวลาอย่างไรก็ตาม มี ความเป็นไปได้ที่จะเกิดความผิดพลาดอันเนื่องมาจาก การถูกรบกวน  ความล่าช้า (lag) ในการเชื่อมต่อ และประเด็น ทางด้านเทคนิคอื่นๆ  การเดิมพันใดๆ โดยใช้ประโยชน์จากตัวกำหนดเวลาการวางเดิมพันถือเป็นการตัดสินใจของตัวผู้เล่น   เองทั้งสิ้น ทั้งนี้ ดุลยพินิจเบ็ดเสร็จในรับเดิมพันขึ้นอยู่กับการตัดสินใจของบริษัทฯ และถือเป็นการสิ้นสุด</span> </h4>
  <h3><strong>3.28.10.</strong><span>
  	คุณสมบัติบัตรคะแนน (Scorecard)</span></h3>
  <h4><strong>3.28.10.1.</strong><span>
  บัตรคะแนนเกมทายตัวเลข (number game scorecard) เป็นคุณสมบัติที่สามารถใช้งานได้ในรูปแบบไลฟ์สตรีมมิ่ง (live streaming) เปิดใช้งานด้วยปุ่ม บัตรคะแนน บัตรคะแนนเกมทายตัวเลขจะใช้งานแทนคุณสมบัติ ผลลัพธ์ของเกม (game results feature) ในแบบไลฟ์สตรีมมิ่ง </span> </h4>
  <h4><strong>3.28.10.2.</strong><span>
  บัตร คะแนนเกมทายตัวเลข จะแสดงผลลัพธ์ของลูกบอลที่จับจากเครื่อง สำหรับการเดิมพันทุกประเภทในบัตรคะแนน สำหรับผลลัพธ์จากลูกบอลลูกสุดท้าย o/u, o/e และ warrior หรือ FT o/e จะแสดงผลเมื่อลูกบอลลูกที่สามถูกจับออกมา เมื่อนำเมาส์ไปวางเหนือผลลัพธ์ของ “u” หรือ “o” ผลลัพธ์จะแสดงออกมาเป็นชุดตัวเลขระบุหมายเลขลูกบอลที่ถูกจับและลำดับที่ของเกม โดยคั่นด้วยเครื่องหมายจุลภาค ( , )</span> </h4>
  <h5><strong>ตัวอย่าง:</strong><span>
  ผลลัพธ์ของ “44,01234” หมายถึงลูกบอลหมายเลข “44” ที่จับออกมาในเกมที่ “01234”</span> </h5>
  <h4><span>คุณสมบัตินี้มีวัตถุประสงค์เพื่อให้ผู้เล่นใช้เป็นข้อมูลอ้างอิง เพื่อประกอบการคาดการณ์ผลลัพธ์ของการจับลูกบอลครั้งต่อไป โดยพิจารณาจากผลลัพธ์ของการจับลูกบอลครั้งก่อนๆ ที่ผ่านมา  </span> </h4>
  <div id="Div4" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div> 

  
  <!--  <h2><a name="R329" id="R329"></a>3.29. กฎกติกาและระเบียบข้อบังคับการเดิมพันเกม Bingo แบบดั้งเดิม</h2>
  <h3><strong>3.29.1.</strong><span>
  บัตรบิงโก</span></h3>
  <h4><strong>3.29.1.1.</strong><span>
  เกม Bingo แบบดั้งเดิม จะเล่นโดยใช้บัตรบิงโก บัตรแต่ละใบประกอบด้วยหมายเลข 24 ตัว แต่ละตัวอาจเป็นหมายเลขใดก็ได้ระหว่าง 1 - 75</span></h4>
  <h4><strong>3.29.1.2.</strong><span>
  บัตรบิงโกแต่ละใบประกอบด้วยตารางหมายเลขขนาด 5X5 แถว และมีตัวอักษร B-I-N-G-O อยู่ด้านบนสุดของแต่ละแถว แต่ละแถวของตารางประกอบด้วยหมายเลข 5 ตัว ระหว่าง 1-75 แถว “B” ประกอบด้วยหมายเลขระหว่าง 1 – 15, แถว “I” ประกอบด้วยตัวเลขระหว่าง 16 – 30, แถว “N“ ประกอบด้วยหมายเลขระหว่าง 31 – 45, แถว “G” ประกอบด้วยหมายเลขระหว่าง 46 – 60, แถว “O” ประกอบด้วยหมายเลขระหว่าง 61 – 75</span></h4>
  <h4><strong>3.29.1.3.</strong><span>
  ตรงกลางตารางในแถว N มีช่อง "ว่าง" ซึ่งอาจเรียกว่า พื้นที่ว่างหรือจัตุรัสว่าง ได้ด้วย ช่อง "ว่าง" ถูกเน้นสีโดยอัตโนมัติและถือเป็นช่องหนึ่งที่มีผลในรูปแบบการชนะเกม</span></h4>
  <h4><strong>3.29.1.4.</strong><span>
  เกมแต่ละรอบจะมีบัตรบิงโก 1 ชุด จำนวน 100 ใบ</span></h4>
  <h3><strong>3.29.2.</strong><span>
  วิธีเล่น</span></h3>
  <h4><strong>3.29.2.1.</strong><span>
  เครื่องบิงโกสุ่มจับลูกบอล 1 ลูก ซึ่งมีหมายเลขใดก็ได้ตั้งแต่ 1 - 75 เมื่อลูกบอลถูกจับแล้วจะถูกแยกเอาไว้ต่างหาก และจะไม่ถูกจับซ้ำอีกจนกว่าจะจบเกม</span></h4>
  <h4><strong>3.29.2.2.</strong><span>
  หากหมายเลขของลูกบอลที่ถูกสุ่มปรากฏบนบัตรบิงโก ให้ทำเครื่องหมายเลขนั้นบนบัตร หมายเลขต่างๆ ที่ถูกทำเครื่องหมายบนบัตรบิงโกจะต้องเรียงกันเป็นรูปแบบการชนะ (winning pattern) จึงจะชนะเกม</span></h4>
  <h4><strong>3.29.2.3.</strong><span>
  รูปแบบการชนะจะถูกกำหนดโดยวิธีสุ่มเมื่อเริ่มเกมแต่ละเกม ผู้เล่นคนแรกที่มีหมายเลขบนบัตรเรียงกันเป็นรูปแบบสมบูรณ์ถูกต้องตามที่กำหนด จะเป็นผู้ชนะ เมื่อเรียงหมายเลขบนบัตรได้สมบูรณ์ตามรูปแบบการชนะ ซึ่งเรียกอย่างไม่เป็นทางการว่า “การได้บิงโก!”</span></h4>
  <h3><strong>3.29.3.</strong><span>
  รูปแบบการชนะ</span></h3>
  <h4><strong>3.29.3.1.</strong><span>
  รูปแบบการชนะมีหลากหลายรูปแบบ รูปแบบพื้นฐาน เช่น เรียงแนวนอน แนวตั้ง ครบสี่มุม และแนวทแยง</span></h4>
  <h4><strong>3.29.3.2.</strong><span>
  หากต้องการทราบว่ากำลังเล่นรูปแบบใดอยู่  ให้ดูกระดานคะแนนเกมบิงโกเมื่อเริ่มเกม รูปแบบที่กำลังเล่นจะแสดงให้เห็นเพียงครั้งเดียวเมื่อเริ่มเกมเท่านั้น</span></h4>
  <h3><strong>3.29.4.</strong><span>
  การจ่ายเดิมพัน</span></h3>
  <h4><strong>3.29.4.1.</strong><span>
  การจ่ายเดิมพันคำนวณโดยราคาของบัตรคูณด้วย 75 หากมีบัตรมากกว่า 1 ใบที่ได้ “บิงโก” จะต้องหารเฉลี่ย 90 ด้วยจำนวนของบัตรที่ชนะ</span></h4>
  <h5><strong>ยกตัวอย่างเช่น:<br />
  *</strong><span>
  ผู้เล่น A ซึ่งมีบัตรหมายเลข 1 และผู้เล่น B ซึ่งมีบัตรหมายเลข 5 ได้ ‘บิงโก’ ดังนั้นจะต้องหาร 90 ดังนี้: 75/2 = 37.5.</span></h5>
  <h5><strong>*</strong><span>
  ผู้เล่น A ซื้อบัตรหมายเลข 1 ราคา 10 ดอลลาร์ ดังนั้นการจ่ายเดิมพันจะเท่ากับ 10 ดอลลาร์ x 37.5 = 375 ดอลลาร์</span></h5>
  <h5><strong>*</strong><span>
  ผู้เล่น B ซื้อบัตรหมายเลข 5 ราคา 5 ดอลลาร์ ดังนั้นการจ่ายเดิมพันจะเท่ากับ 5 ดอลลาร์ x 37.5 = 187.50 ดอลลาร์</span></h5>
  <h4><strong>3.29.4.2.</strong><span>
  การจ่ายเดิมพันจะจ่ายเฉพาะเกมที่สมบูรณ์เท่านั้น เกมที่สมบูรณ์คือ เกมที่มีบัตรได้บิงโกโดยไม่เกิดข้อผิดพลาดใดๆ ในกรณีที่เกิดข้อผิดพลาดขึ้นก่อนจะมีบัตรได้บิงโก บริษัทขอสงวนสิทธิ์ในการตัดสินว่าเกมเป็นโมฆะ</span></h4>
  <!-- <h4><a name="R334.43" id="R334.43"></a><strong>3.29.4.3.</strong><span>
  BONUS BINGO</span></h4>
  <h5><strong>3.29.4.3.1.</strong><span>
  Players have the chance to win a Bonus payout of US$50,000! </span></h5>
  <h5><strong>3.29.4.3.2.</strong><span>
  To win the Bonus, a card should hit 'Bingo' before 40 balls are drawn.</span></h5>
  <h5><strong>3.29.4.3.3.</strong><span>
  The Bonus only applies to Coverall pattern bingo game.  More than one card may win the Bonus.</span></h5>
  <h5><strong>3.29.4.3.4.</strong><span>
   If there is more than one winning card, the Bonus will be split equally among the winning cards.  </span></h5> 
  <h3><strong>3.29.5.</strong><span>
  เครื่องบิงโกและเครื่องสแกนอัตโนมัติ</span></h3>
  <h4><strong>3.29.5.1.</strong><span>
  ลูกบอลที่จับขึ้นมาจากเครื่องบิงโกจะอ่านโดยเครื่องสแกนอัตโนมัติ บริษัทมีการจัดสรรขั้นตอนและวิธีการป้องกันอันสมควรที่เกี่ยวกับความถูกต้องแม่นยำของเครื่องสแกน โดยไม่คำนึงว่ามีขั้นตอนและการป้องกันเหล่านี้อยู่แล้ว คุณรับทราบว่าโดยธรรมชาติของเกมจะมีจังหวะการเล่นที่กระชั้นและอ้างอิงผลลัพธ์ที่ประมวลขึ้นอย่างรวดเร็วจากเครื่องสแกนอัตโนมัติ ดังนั้น ในกรณีที่อาจเกิดการไม่สอดคล้องกันระหว่างหมายเลขของลูกบอลที่แสดงบน วิดีโอสตรีมมิ่งและหมายเลขของลูกบอลที่เครื่องสแกนอัตโนมัติอ่านได้ บริษัทขอสงวนสิทธิในการยึดถือผลลัพธ์จากเครื่องสแกนอัตโนมัติเป็นการสิ้นสุด คุณยอมรับว่าการตัดสินของบริษัทถือเป็นที่สิ้นสุดและมีผลผูกพันในกรณีนี้</span></h4>
  <h4><strong>3.29.5.2.</strong><span>
  ระบบเกมจะดำเนินการจ่ายเงินประจำวันโดยอัตโนมัติหลังสิ้นสุดชั่วโมงทำการของแต่ละวัน คุณรับทราบและยอมรับว่า ยอดเงินคงเหลือใน MAXBET Bingo e-wallet ของคุณ ณ เวลานี้ จะถูกโอนกลับไปที่ MAXBET e-wallet ของคุณโดยอัตโนมัติ</span></h4>
  <h4><strong>3.29.5.3.</strong><span>
  คุณรับทราบว่า บริษัทสามารถทำให้คุณล็อกเอาท์ออกจากเกมได้หากคุณไม่มีกิจกรรมใดๆ ในระยะเวลาที่บริษัทกำหนด</span></h4>
  <h4><strong>3.29.5.4.</strong><span>
  คุณรับทราบว่า ด้วยการตัดสินใจและดุลยพินิจแต่เพียงผู้เดียวของบริษัท บริษัทมีสิทธิ์เบ็ดเสร็จในการเปลี่ยนแปลง ยกเลิก ระงับ โยกย้าย แก้ไข หรือเริ่มต้นเกมใหม่ หรืออาจปฏิเสธหรือยกเลิกเงินเดิมพันใดๆ เพราะเหตุผลต่อไปนี้ เกิดเหตุที่ไม่อาจคาดได้ สงคราม ภัยพิบัติทางธรรมชาติ ไฟฟ้าดับ ข้อผิดพลาดที่เกิดจากมนุษย์ หรือความผิดพลาดหรือความประมาทเลินเล่อของพนักงานบริษัทในการฝ่าฝืนมาตรฐานการทำงาน การทำงานผิดปกติของซอฟต์แวร์ และเหตุอื่นใดในลักษณะใกล้เคียงกัน การตัดสินของบริษัทถือเป็นที่สิ้นสุดและมีผลผูกพัน</span></h4>
  <div id="Div2"align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div> -->
  

  <h2><a name="R329" id="R329"></a>3.29. Olympic Games</h2>
  <h3><strong>3.29.1.</strong><span>
  General</span></h3>
  <h4><strong>3.29.1.1.</strong><span>
  All markets will be settled on the official result declared by the IOC.</span></h4>
  <h4><strong>3.29.1.2.</strong><span>
  The original medal ceremony will be the official result for which all bets are settled. Any subsequent disqualifications or amendments to the result will not be considered for betting purposes.</span></h4>
  <h4><strong>3.29.1.3.</strong><span>
  All bets will be considered valid if the match or event is completed within the official period of the Olympic Games, irrespective of the actual start time (except Soccer). Should a match or event not be completed, and no official result is given, then all bets will be considered void and will be refunded.</span></h4>
  <h4><strong>3.29.1.4.</strong><span>
  Any bets that are accepted in error after an event has actually started (except for live betting) will be considered void and will be refunded.</span></h4>
  <h4><strong>3.29.1.5.</strong><span>
  If a team or competitor does not start an event then all bets placed on that selection (including outright (to win Gold Medal) markets) will be considered void and will be refunded. If a named team or competitor in a Money Line (head to head) market does not start an event then all bets on that market will be considered void and will be refunded.</span></h4>
  <h4><strong>3.29.1.6.</strong><span>
  Should a Dead Heat occur in outright (to win Gold Medal) markets then, half the stake is applied to the selection at the full odds, while the other half of the stake is lost. Should a Dead Heat occur in Money Line (head to head) markets then the result will be a tie and bets on both competitors will be refunded.</span></h4>
  <h3><strong>3.29.2.</strong><span>
  Olympic Medals</span></h3>
  <h4><strong>3.29.2.1.</strong><span>
  Markets will be offered on the number of medals won by individuals or countries at the 2012 Olympic Games.</span></h4>
  <h4><strong>3.29.2.2.</strong><span>
  These markets will refer to either Gold Medals only, or to Total Medals (Gold, Silver and Bronze medals combined).</span></h4>
  <h4><strong>3.29.2.3.</strong><span>
  All markets will be settled by the official medal tables released by the IOC immediately after the end of the Olympic Games. Any subsequent changes to the medal table will not be considered for betting purposes.</span></h4>
  <h3><strong>3.29.3.</strong><span>
  Moneyline (Head to Head)</span></h3>
  <h4><strong>3.29.3.1.</strong><span>
  Which competitor or team will win a match or be placed higher in an event?</span></h4>
  <h4><strong>3.29.3.2.</strong><span>
  The final placing is decided by the competitor who progresses furthest in the event. If both competitors are eliminated at the same stage then the competitor with the higher official ranking is declared the winner. Should both competitors be eliminated at the same stage but neither competitor is given an official ranking then bets will be considered void.</span></h4>
  <div id="Div1" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div> 
  <h2><a name="R331" id="R330"></a>3.30. Politics </h2>
  <h3><strong>3.30.1.</strong><span>
  US Presidential Election</span></h3>
  <h4><strong>3.30.1.1.</strong><span>
  Which Political Party will win the 2012 US Presidential Election? Candidate names are given for reference only. Should neither the Republicans nor Democrats win the election, then all bets will be void and will be refunded.</span></h4>
  <div id="Div5" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>  
  <h2><a name="R331" id="R331"></a>3.31. การเดินเรือ</h2>
  <h3><strong>3.31.1.</strong><span>
  America's Cup (รวม Louis Vuitton Cup)</span></h3>
  <h4><strong>3.31.1.1.</strong><span>
  ทุกตลาดจะได้รับการชำระเงินจากผลอย่างเป็นทางการ ซึ่งประกาศโดยเว็บไซต์ทางการภายหลังการแข่งขันแต่ละครั้ง การสูญเสียคุณสมบัติหรือเปลี่ยนแปลงผลลัพธ์ จะไม่ได้รับการพิจารณาเพื่อจุดประสงค์การเดิมพัน</span></h4>
  <h4><strong>3.31.1.2.</strong><span>
  ในกรณีที่การแข่งขันถูกเลื่อนหรือระงับ และถ้ามีการกลับมาแข่งขันภายใน 48 ชั่วโมงหลังกำหนดสิ้นสุด จะถือว่าการเดิมพันทั้งหมดยังคงใช้การได้อยู่</span></h4>
  <div id="Div9" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R332" id="A332"></a>3.32. ปั่นจักรยาน</h2>
  <h3><strong>3.32.1.</strong><span>
  ทุกตลาดจะได้รับการชำระเงินจากผลอย่างเป็นทางการ ซึ่งประกาศโดยเว็บไซต์ทางการภายหลังการแข่งขันแต่ละครั้ง การสูญเสียคุณสมบัติหรือเปลี่ยนแปลงผลลัพธ์ จะไม่ได้รับการพิจารณาเพื่อจุดประสงค์การเดิมพัน </span></h3>
  <h3><strong>3.32.2.</strong><span>
  ในกรณีที่การแข่งขันถูกเลื่อนหรือระงับ และถ้ามีการกลับมาแข่งขันภายใน 24 ชั่วโมงหลังกำหนดสิ้นสุด จะถือว่าการเดิมพันทั้งหมดยังคงใช้การได้อยู่ </span></h3>
  <h3><strong>3.32.3.</strong><span>
  ในตลาดการแข่งขันแบบสองทาง ผู้แข่งต้องเริ่มการแข่งขันก่อนจึงจะถือว่าการเดิมพันถูกต้อง ผู้แข่งซึ่งมีตำแหน่งสุดท้ายที่ดีกว่า คือผู้ชนะ ถ้าผู้แข่งทั้งสองคนไปไม่ถึงเส้นชัย จะถือว่าการแข่งขันเป็นโมฆะและจะได้รับเงินคืน</span></h3>
  <div id="Div10" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  <h2><a name="R333" id="A333"></a>3.33. เซปักตะกร้อ</h2>
  <h3><strong>3.33.1.</strong> <span>ตลาด Moneyline อ้างถึงผู้ชนะการแข่งขันหรือเซตที่เฉพาะเจาะจง ตลาดทุพพลภาพอิงจากเซตหรือคะแนน (กรุณาดูที่ชื่อตลาด), ตลาดสูง/ตํ่า และ คี่/คู่ อิงจากคะแนน (ยกเว้นกรณีที่ระบุเป็นอย่างอื่น)</span></h3>
  <h3><strong>3.33.2.</strong> <span>ถ้าทีมใดทีมหนึ่งถอนตัวหรือถูกตัดสิทธิ์ระหว่างการแข่งขัน การเดิมพันทั้งหมดจะถือว่าเป็นโมฆะ ยกเว้นในตลาดที่ได้มีการกำหนดละเว้นเงื่อนไข</span></h3>
  <h3><strong>3.33.3.</strong> <span>ในกรณีที่การแข่งขันถูกเลื่อนหรือระงับ และถ้ามีการกลับมาแข่งขันภายในสิบสองชั่วโมงก่อนกำหนดสิ้นสุด จะถือว่าการเดิมพันทั้งหมดยังคงใช้การได้อยู่</span></h3>
  <h3><strong>3.33.4.</strong> <span>ผู้ชนะเซตแรก (ผู้ชนะเซตที่สอง ที่สาม ฯลฯ) อ้างอิงถึงผลลัพธ์ของเชตที่เฉพาะเจาะจง ถ้าเซตที่ระบุแข่งขันอย่างไม่สมบูรณ์ จะถือว่าการเดิมพันทั้งหมดเป็นโมฆะ</span></h3>
  <h3><strong>3.33.5.</strong> <span>จะไม่มีการอัปเดตคะแนนสำหรับการเดิมพันสดเซปักตะกร้อ</span></h3>
  <div id="Div2" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>

<!-- BEGIN Live Casino -->
  <!-- <h2><a name="R334" id="R334"></a>3.34. Live Casino Games Rules & Regulations </h2>
  <h3><strong>3.34.1.</strong><span>
  General</span></h3>
  <h4><strong>3.34.1.1.</strong><span>
  All the games offered in Live Casino are played with live dealers and real casino tables.</span></h4>
  <h4><strong>3.34.1.2.</strong><span>
  Lobby view allows betting on multiple tables simultaneously or by clicking on the preferred table to swap from lobby view to the selected table betting interface.</span></h4>

  <h4><strong>3.34.1.3.</strong><span>
  Server time in game client is based on GMT – 4.</span></h4>
  <h4><strong>3.34.1.4.</strong><span>
  The win/loss amount of each involved game will be shown in the 'Messages' window, which may be slightly delayed after that hand/game is completed. However, you can always check your previous win/loss detail in Sportsbook > Statement – Bet List.</span></h4>
  <h4><strong>3.34.1.5.</strong><span>
  The betting timer shows the amount of time within which a player can place a bet. The betting timer will be displayed as a graphic in the current event, and the duration of the betting timer will be at the sole and exclusive determination of the Company. A player will not be allowed to place bets after the expiration of the betting timer. Bets place after the expiration of the betting duration shall be deemed invalid or void.</span></h4>
  <h4><strong>3.34.1.6.</strong><span>
  Player acknowledges that while the Company uses best efforts to ensure the accuracy of the betting timer at all times, the betting timer may still be subject to disruptions, connection lags, and other technical issues. Any and all bets placed using the betting timer is entirely at the player's own risk and the Company shall have the final decision to accept or reject such bets.</span></h4>
  <h4><strong>3.34.1.7.</strong><span>
  The virtual results (virtual cards on Live Baccarat and virtual ball dropped on pocket number of Live Roulette) for all live casino games are only for reference and will not be used to determine outcome of the live casino games.</span></h4>
  <h4><strong>3.34.1.8.</strong><span>
  The winning amount only shows with 2 decimal points, thus the round up rules apply during display.</span></h4>
  <h4><strong>3.34.1.9.</strong><span>
  The winning amount shows only calculated based on the bet type payout and amount of bet placed on it.</span></h4>
  <h4><strong>3.34.1.10.</strong><span>
  In some cases, the 'Balance' might be 1 cent less when adding the winning amount with balance after bet placed, which is due to the round up display in 'Win'.</span></h4>
  <h4><strong>3.34.1.11.</strong><span>
  Notwithstanding such steps and precautions, you accept that the nature of the game is such that it is very fast-paced and reliant on the quick results produced by our gaming system. Therefore, in the remote case of discrepancy between the result shown on streaming video and the result as shown in  the game , the Company reserves the right to rely on live result in the live gaming facility as the final result. You accept that the Company's decision is final and binding in this regard.</span></h4>
  <h4><strong>3.34.1.12.</strong><span>
  You acknowledge that at the sole determination and discretion of the Company, the Company has the absolute right to change, cancel, suspend, modify or restart any game, or refuse or cancel any wagers, by reason of fortuitous event, acts of war, natural disaster, power outage, network interruption or failure, human error or fault or negligence by Company employees in violation of the industry standards of work, software malfunction, and any other analogous event. The Company's decision is final and binding.</span></h4>
  
  <h3><strong>3.34.2.</strong><span>
  How to play</span></h3>
  <h4><strong>3.34.2.1.</strong><span>
  Click on a chip of desired value to select it. Move your cursor to any betting area on the table to place your bet. Every click on the area adds one chip to the bet.</span></h4>
  <h4><strong>3.34.2.2.</strong><span>
  Select another chip if you wish to increase the bet by some other amount.</span></h4>

  <h4><strong>3.34.2.3.</strong><span>
  There is a free text box to input your desired chip value.</span></h4>
  <h4><strong>3.34.2.4.</strong><span>
  Click 'X' button if you want to reset all your bets that yet to be confirmed.</span></h4>
  <h4><strong>3.34.2.5.</strong><span>
  Click '√' button to confirm your bets. Within the time open for betting, you may keep on placing bets and submit it multiple times. Bets that were not yet to be submitted within the betting time are rejected and returned to the player.</span></h4>
  <h4><strong>3.34.2.6.</strong><span>
  You have a limited amount of time to place a bet from the moment a round is stated. The round is dealt once the limited betting time ends.</span></h4>
  <h4><strong>3.34.2.7.</strong><span>
  The game supports multiple bets, which means you may place additional bets after your first or previous bet has been placed and confirmed. Multiple bets are accepted only if the betting round is still open. Remember to confirm each additional bet by clicking the '√' button.</span></h4>
  <h4><strong>3.34.2.8.</strong><span>
  Once a game is completed and your bet wins, you will receive your winnings.</span></h4>
  <h4><strong>3.34.2.9.</strong><span>
  Place your bets by following the steps above or you can click '<img src="img/imgRR33229_1.gif"/>' to place the same bet as in the previous round or '<img src="img/imgRR33229_2.gif"/>' to place the same location as previous round with double up the previous bets. If you did multiple bets on the previous round, the '<img src="img/imgRR33229_1.gif"/>' and '<img src="img/imgRR33229_2.gif"/>' follows the last multiple bets placed. You can skip a turn by simply not placing any bets on the table.</span></h4>
  
  <h3><strong>3.34.3.</strong><span>
  Live Baccarat</span></h3>
  <h4 class="style3">The game is offered  with 8 deck cards (52 cards without joker), and new shoe change when there is  about one to two decks left in the shoe (dealer dealt yellow cut card from  shoe). A standard Baccarat rule is used.</h4>
  <h4><strong>3.34.3.1.</strong><span>
  General</span></h4>

  <h5><strong>3.34.3.1.1.</strong><span>
  A new score card is started along with every shoe change.</span></h5>
  <h5><strong>3.34.3.1.2.</strong><span>
  Commencement – Every time a new shoe is introduced, the first card of the new shoe is showed, then first card face value will determine how many cards will be burned (J, Q, and K considered as 10, A valued as 1, and 2 to 10 are valued according to their face value).</span></h5>
  <h5><strong>3.34.3.1.3.</strong><span>
  Burn card – First card drawn from the shoe of each round face down and 'burned' (discarded).</span></h5>
  <h5><strong>3.34.3.1.4.</strong><span>
  Yellow card – Cut card by dealer, and it indicates the last hand of the shoe. If yellow card is drawn in between dealing or burn card of new round, the running game will be the last hand.</span></h5>

  <h4><strong>3.34.3.2.</strong><span>
  Baccarat Rules</span></h4>
  <h5 class="style1">The objective of the game is to bet on the hand that you predict will have the highest value, which is closest to 9. All cards, 2 to 9, are valued according to their face value; tens and face (picture) cards worth zero; and aces count as one. If the value of the hand over 10 or more, 10 must be subtracted and the remaining points is the hand value. The highest hand is nine. If both the player's hand and the banker's hand have equal totals, the game result is a tie or push.</h5>
  
  <h5 class="style3">Two cards are dealt  face up to each side (Banker or Player), starting from Player and alternating  between the hands. In certain cases, a third card is dealt to the Player or the  Banker or both (Baccarat Third Card Rules). The hand closest to 9, wins.
  </h5>
  <h5 class="style3">If both the player's  hand and the banker's hand have equal totals, the game result is a 'tie'.  Banker and Player bets are returned to you if a tie occurs.</h5>
  <h5 class="style3"><strong>Baccarat Third Card  Rules:</strong><br />
    If neither the Player  nor Banker is dealt a total of 8 or 9 in the first two cards (known as a 'natural'),  the table is consulted.</h5>
  <h5><p>Player's rule:</p>
<table width="100%" cellpadding="0" cellspacing="0" class="oddsTable info">
    <tr>
      <th width="44%" height="40" >Point value of first two cards</th>
      <th width="56%"  class="even" align="left">Action</th>
    </tr>
    <tr class="bgcpe">
      <td height="20" align="center" >0 – 5</td>
      <td >Draws a card</td>
      </tr>
    <tr class="bgcpelight">
      <td height="20" align="center" >6 – 7</td>
      <td >Stands</td>
      </tr>
    <tr class="bgcpe">
      <td height="20" align="center" >8 – 9</td>
      <td >Natural hand, no further cards drawn for Player and Banker</td>
      </tr>
  </table>
  <span>If the player stands  on 6 or 7, then the banker must hit with a score of 0 – 5, and stand with a  score of 6 – 7. If the player does hit then use the table below to determine if  the banker hits or stands.</span></h5>
  <h5><p>Banker's rule:</p>
<table width="100%" cellpadding="0" cellspacing="0" class="oddsTable info">
    <tr>
      <th width="44%" height="40" >Point value of first two cards</th>
      <th width="56%"  class="even" align="left">Action</th>
    </tr>
    <tr class="bgcpe">
      <td height="20" align="center" >0 – 2</td>
      <td >Always draws a card</td>
    </tr>
    <tr class="bgcpelight">
      <td height="20" align="center" >3</td>
      <td >Draw when the Player's third card is 0 – 7 or 9</td>
    </tr>
    <tr class="bgcpe">
      <td height="20" align="center" >4</td>
      <td >Draw when the Player's third card is 2 – 7</td>
    </tr>
    <tr class="bgcpelight">
      <td height="20" align="center" >5</td>
      <td >Draw when the Player's third card is 4 – 7</td>
    </tr>
    <tr class="bgcpe">
      <td height="20" align="center" >6</td>
      <td >Draw when the Player's third card is 6 – 7</td>
    </tr>
    <tr class="bgcpelight">
      <td height="20" align="center" >7</td>
      <td >Always stands</td>
    </tr>
    <tr class="bgcpe">
      <td height="20" align="center" >8 – 9</td>
      <td >Natural hand, and Player cannot draw</td>
    </tr>
  </table>
  <span>If either Player or/and Banker has a total face value of 8 or 9, they both stand. This rule overrides all other rules.</span></h5>
  <h4><strong>3.34.3.3.</strong><span>
  Payouts</span>
  <table width="100%" cellpadding="0" cellspacing="0" class="oddsTable info">
    
    <tr>
      <th width="77" height="40" >Bet type</th>
      <th width="259"  class="even" align="left">Description</th>
      <th width="87"  align="left">Pays</th>
    </tr>
    <tr class="bgcpe">
      <td align="center" >Banker</td>
      <td width="259" >Banker's hand wins</td>
      <td >1 to 1 less 5% bank commission</td>
    </tr>
    <tr class="bgcpelight">
      <td align="center" >Player</td>
      <td width="259" >Player's hand win</td>
      <td >1 to 1</td>
    </tr>
    <tr class="bgcpe">
      <td align="center" >Tie</td>
      <td width="259" >Player's hand and Banker's hand have equal totals</td>
      <td >8 to 1</td>
    </tr>
    <tr class="bgcpelight">
      <td align="center" >Big</td>
      <td width="259" >Total number of cards drawn is 5 or 6</td>
      <td >0.54 to 1</td>
    </tr>
    <tr class="bgcpe">
      <td align="center" >Small</td>
      <td width="259" >Total number of cards drawn is 4</td>
      <td >1.5 to 1</td>
    </tr>
    <tr class="bgcpelight">
      <td align="center" >Player Pair</td>
      <td width="259" >The first two cards drawn form a pair on Player's    hand</td>
      <td >11 to 1</td>
    </tr>
    <tr class="bgcpe">
      <td align="center" >Banker Pair</td>
      <td width="259" >The first two cards drawn form a pair on Banker's    hand</td>
      <td >11 to 1</td>
    </tr>
  </table>
  </h4>
  
  <h3><strong>3.34.4.</strong><span>
  Live Roulette</span></h3>

  <h4 class="style1">Live Roulette wheel has 37 pockets: a single zero (0) and the numbers 1 through 36. Each number is colored red or black (except for the zero). There are many  ways to place bets in Live Roulette. Each bet covers a different set of numbers and has a different distribution. The payouts for all bets are listed in the 'Payout' section. The House Edge on all bets is 2.7%.</h4>

  <h4><strong>3.34.4.1.</strong><span>
  General</span></h4>
  <h5><strong>3.34.4.1.1.</strong><span>
  The Live Roulette results are based on the result shown on the Live Roulette wheel used during live gaming in a live gaming facility. The Company takes all reasonable steps and precautions with respect to the fairness of the roulette wheel, making sure that the heel or balls used are not tampered with by any unauthorized personnel.</span></h5>

  <h5><strong>3.34.4.1.2.</strong><span>
  All wagers on each individual bet type must meet the required individual minimum bet before the table's minimum is considered.</span></h5>

  <h5><strong>3.34.4.1.3.</strong><span>
  Table minimum uses the value of minimum bet from the bet type of even payout, like Red/Black.</span></h5>
  <h5><strong>3.34.4.1.4.</strong><span>
  Table maximum is 5 times of the maximum bet from the bet type of even payout, like Red/Black.</span></h5>
  <h5><strong>3.34.4.1.5.</strong><span>
  Mishandling of roulette ball which resulted in unintentional dropping onto the wheel or outside the wheel will result in a re-spin.</span></h5>
  <h5><strong>3.34.4.1.6.</strong><span>
  Roulette ball must be rotated in reverse direction from the wheel. Otherwise, a re-spin will be called.</span></h5>
  <h5><strong>3.34.4.1.7.</strong><span>
  The Live Roulette results showing a wrong entry due to live facility errors will be corrected accordingly based on the Company's video log facility. The Company's decision is final and binding.</span></h5>

  <h4><strong>3.34.4.2.</strong><span>
  Roulette Rules</span></h4>
  <h5><span>The Live Roulette results are based on the result shown on the Live Roulette wheel used during live gaming in a live gaming facility. The Company takes all reasonable steps and precautions with respect to the fairness of the roulette wheel, making sure that the heel or balls used are not tampered with by any unauthorized personnel.</span></h5>
  <h5><span>The pockets of the roulette wheel are numbered from 0 to 36. In number ranges from 1 to 10 and 19 to 28, odd numbers are red and even are black. In ranges from 11 to 18 and 29 to 36, odd numbers are black and even are red. Pocket numbered 0 is green. Pocket number order on the roulette wheel adheres to the following clockwise sequence, 0-32-15-19-4-21-2-25-17-34-6-27-13-36-11-30-8-23-10-5-24-16-33-1-20-14-31-9-22-18-29-7-28-12-35-3-26.</span></h5>
  <h5><span>Announces Bets or Call Bets:<br />
This is an additional group betting in Roulette by selecting a chip and then clicking on the corresponding button of the number oval table located on top of the table.</span></h5>
  <h5><span>Voisins du zero (neighbours of zero):<br />
This is the name for the numbers which lie between 22 and 25 on the wheel including 22 and 25 themselves. 9 chips or multiples thereof are bet. 2 chips are placed on the 0/2/3 street; 1 on the 4/7 split; 1 on 12/15; 1 on 18/21; 1 on 19/22; 2 on 25/26/28/29 corner; and 1 on 32/35.</span></h5>
  <h5><span>Tiers (thirds of the wheel):<br />
The name for the twelve numbers which lie on the opposite side of the wheel between 27 and 33 including 27 and 33 themselves. 6 chips or multiples thereof are bet. 1 chip is placed on each of the following splits: 5/8; 10/11; 13/16; 23/24; 27/30; 33/36.</span></h5>
  <h5><span>Orphelins (orphans):<br />
The bet covers the two sections of the wheel not included in either the 'Voisins du zero' or 'Tiers'. 5 chips or multiples thereof are bet to cover a total of eight numbers. 1 chip is placed straight-up on 1 and 1 chip on each of the splits: 6/9; 14/17; 17/20 and 31/34. </span></h5>
  <h5><span>Zero (zero game):<br />
This is the name for the 7 numbers closest to zero, including zero. The bet consists of 4 chips or multiples thereof. 1 chip on 0/3 split, 1 on 12/15 split, 1 on 32/35 split and 1 on 26 straight up.</span></h5>
  <h5><span>Neighbors (Neighbours):<br />
Bet on number and neighbouring numbers on the right and on the left of this number. This bet is played with five chips, where 1 piece straight up on each number. For example, '8 and the neighbors' means that the player places a bet on five consecutive numbers 11-30-8-23-10 (8 is in the middle).</span></h5>
  <h5><span>Final Bet:<br />
You bet on all of the numbers that have the same last number. For example, 'final 3' means a bet on the numbers 3, 13, 23, and 33, where one chip on each number is a straight up bet.</span></h5>
  <h4><strong>3.34.4.3.</strong><span>
  Roulette Payouts</span>
  <table width="100%" cellpadding="0" cellspacing="0" class="oddsTable info">
    <tr>
      <th width="15%" height="40" align="left">Bet type</th>
      <th width="15%" class="even" align="left">Chip Covers</th>
      <th align="left">Description</th>
      <th width="10%" class="even" align="left">Pays</th>
    </tr>
    <tr>
      <td colspan="4" class="tabtitle">Inside Bets</td>
      </tr>
    <tr>
      <td >Straight Up</td>
      <td >1 number</td>
      <td >A bet placed directly on any single number</td>
      <td >35 to 1</td>
    </tr>
    <tr>
      <td >Split</td>
      <td >2 numbers</td>
      <td >Bet placed on the line between any two numbers</td>
      <td >17 to 1</td>
    </tr>
    <tr>
      <td >Street</td>
      <td >3 numbers</td>
      <td >A bet placed at the end of any row of numbers, covering three numbers. Bets placed on the intersecting point between 0,1 and 2 or 0, 2 and 3 are a special street bets (Trio)</td>
      <td >11 to 1</td>
    </tr>
    <tr>
      <td >Corner</td>
      <td >4 numbers</td>
      <td >Bet placed on the corner where any four numbers meet or on the lower intersection between 0 and 1 to covers all four numbers of 0,1,2 and 3 (Four)</td>
      <td >8 to 1</td>
    </tr>
    <tr>
      <td >Line</td>
      <td >6 numbers</td>
      <td >Cover 6 numbers with one chip placed at the corresponding intersection of two neighbouring streets</td>
      <td >5 to 1</td>
    </tr>
    <tr>
      <td colspan="4" class="tabtitle">Outside Bets</td>
      </tr>
    <tr>
      <td >Column</td>
      <td >12 numbers</td>
      <td >A bet placed in one of the boxes marked '2 to 1' at the bottom of the layout, each covering 12 numbers per column</td>
      <td >2 to 1</td>
    </tr>
    <tr>
      <td >Dozen</td>
      <td >12 numbers</td>
      <td >A bet on the first 1-12, second 13-24, or third group 25-36 of twelve numbers</td>
      <td >2 to 1</td>
    </tr>
    <tr>
      <td >Red/Black;<br />Odd/Even;<br />1-18/19-36 </td>
      <td >18 numbers</td>
      <td >A bet placed in one of the six boxes at the side of the layout covers half of the numbers on the board, as described in the box. The 0 is not covered by any of these boxes</td>
      <td >1 to 1</td>
    </tr>
  </table>
  </h4>
  
  <div id="Div6"align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>  -->

  
  <h2><a name="R334" id="R334"></a>3.34.	กฎกติกาการแข่งม้า</h2>
  <h3><strong>3.34.1.</strong><span>
  ทั่วไป</span></h3>
  <h4><strong>3.34.1.1.</strong><span>
  การถอนตัว/ไม่ได้ลงแข่ง – เมื่อใดที่ม้าถูกถอนจากการแข่งขัน ก่อนหรือหลังจากมาที่อันดับของการเริ่มต้น (หรือหนึ่งประตูเริ่มต้นหรือ มากกว่าไม่เปิด ซึ่งทำให้การเริ่มต้นไม่ยุติธรรม) ม้าจะถูกถือว่าไม่ได้ลงแข่ง/ถูกถอนตัวและเงินที่พนันกับม้าตัวนั้นจะได้รับคืน </span></h4>
  <h4><strong>3.34.1.2.</strong><span>
  เงินส่วนแบ่งรับประกันขั้นต่ำ – มีเงินส่วนแบ่งรับประกันขั้นต่ำ สำหรับประเภทการเดิมพันทั้งหมด โดยเท่ากับจำนวนเดิมพัน </span></h4>
  <h4> <strong>3.34.1.3.</strong><span>
  การเดิมพันล่าช้า – ถ้าการเดิมพันถูกรับไว้โดยผิดพลาด ภายหลังการแข่งขันเริ่มต้น การเดิมพันจะถูกประกาศ เป็นโมฆะและจะได้รับเงินคืน </span></h4>
  <h4><strong>3.34.1.4.</strong><span>
  การคัดค้าน – เมื่อมีการคัดค้านผลการตัดสิน การชำระเงินจะเป็น ไปตามการตัดสินของเจ้าหน้าที่ประชุมการแข่งขันหรือสจ๊วต </span></h4>
  <h4> <strong>3.34.1.5.</strong><span>
  ผลการตัดสินอย่างเป็นทางการ – ผลการตัดสินของการแข่งขัน จะเป็นทางการเมื่อ "เคลียร์ทั้งหมด" หรือ "เดิมพันใน" ถูกประกาศโดยสนามแข่งและ "ผลการตัดสินอย่างเป็นทางการ" ถูกประกาศโดยผู้ดำเนินการ </span></h4>
  <h4><strong>3.34.1.6.</strong><span>
  การจ่ายเงินส่วนแบ่ง – การจ่ายเงินส่วนแบ่งจะจ่ายทันทีที่เป็นไปได้ หลังจากตัดสินแต่ละการแข่งขัน มีการยืนยันผลการตัดสินและประกาศ "อย่างเป็นทางการ" แล้ว</span></h4>
  <h4><strong>3.34.1.7.</strong><span>
  บริษัทขอสงวนสิทธิ์ภายใต้วิจารณญาณเบ็ดเสร็จแต่เพียงผู้เดียวของบริษัท โดยไม่จำเป็นต้องมีคำอธิบาย หรือแจ้งให้ลูกค้าทราบล่วงหน้าในการปฏิเสธหรือไม่ยอมรับการเดิมพันใดๆ แม้ว่าจะทำการเดิมพันก่อนการเริ่มต้นการแข่งขัน หรืออยู่ภายในขีดจำกัดการเดิมพัน (เช่น การเดิมพันต่ำสุด/สูงสุด, การเดิมพันสูงสุดต่อการแข่งขัน)</span></h4>
  <h4><strong>3.34.1.8.</strong><span>
  ข้อนี้มีผลบังคับใช้สำหรับการแข่งม้า การแข่งรถม้าลากและการแข่งวิ่งสุนัขพันธุ์เกรย์ฮาวนด์ การเดิมพันที่ได้รับการยอมรับอย่างถูกต้องจะไม่ถือเป็นโมฆะ ในกรณีที่มีความขัดแย้งกันในการเขียนชื่อม้า สำหรับทุกการแข่งขันหรือการประชุมการแข่งขัน ถ้ามีการระบุชื่อม้าแข่งและหมายเลขไม่ตรงกัน หรือเมื่อใดก็ตามที่มีการระบุชื่อม้าแข่งไม่ถูกต้องหรือระบุชื่อไว้ผิดในทางกลับกัน ในทุกกรณี ให้แก้ไขโดยยึดตามหมายเลขม้าแข่งที่ระบุไว้ในระหว่างการแข่งขันในขณะกำลังวิ่งเป็นตัวชี้ขาด  เพื่อแก้ปัญหาความขัดแย้งนี้ ผลการแข่งขันจะตัดสินจากหมายเลขของม้าแข่ง</span></h4>
  <h4><strong>3.34.1.9.</strong><span>
  หมายเลขและชื่อม้า  ในกรณีที่มีการแปลชื่อม้าและหมายเลขม้าเป็นภาษาอื่น ให้ยึดตามภาษาอังกฤษเป็นหลัก</span></h4>
   <h4><strong>3.34.1.10.</strong><span>
  เงื่อนไขการจ่ายเงินสำหรับการแข่งขันประเภทต่าง ๆ มีดังนี้</span>
  <p>กติกาการจ่ายเงินสำหรับการแข่งม้าแบบอังกฤษและไอร์แลนด์<span class="style2"> (เงินส่วนแบ่งชนะและรอง)</span></p>
<table width="100%" cellpadding="0" cellspacing="0" class="oddsTable info">
    <tbody><tr>
      <th width="50" height="40" rowspan="2">ไม่</th>
      <th rowspan="2" class="even" align="left">การแข่งแบบแฮนดิแคป</th>
      <th width="30" rowspan="2">ชนะ</th>
      <th colspan="4" class="even">จ่ายเงินสำหรับอันดับที่</th>
    </tr>
    <tr>
      <th width="30" class="even">1</th>
      <th width="30" class="even">2</th>
      <th width="30" class="even">3</th>
      <th width="30" class="even">4</th>
    </tr>
    <tr>
      <td height="20" align="center">1</td>
      <td>จำนวนม้าแข่ง<span class="style2">4</span> ตัวหรือน้อยกว่า</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="liveligh" align="center">ไม่</td>
      <td class="liveligh" align="center">ไม่</td>
      <td class="liveligh" align="center">ไม่</td>
      <td class="liveligh" align="center">ไม่</td>
    </tr>
    <tr>
      <td height="20" align="center">2</td>
      <td>จำนวนม้าแข่ง<span class="style2">5</span>    ถึง <span class="style2">7</span> ตัว</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="liveligh" align="center">ไม่</td>
      <td class="liveligh" align="center">ไม่</td>
    </tr>
    <tr>
      <td height="20" align="center">3</td>
      <td>จำนวนม้าแข่ง<span class="style2">8</span> ถึง <span class="style2">15</span> ตัว</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="liveligh" align="center">ไม่</td>
    </tr>
    <tr>
      <td height="20" align="center">4</td>
      <td>จำนวนม้าแข่ง <span class="style2">16</span>    ตัวและมากกว่า</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
    </tr>
    <tr>
      <th height="40" rowspan="2">ไม่ใช่</th>
      <th rowspan="2" class="even" align="left">การแข่งแบบนันแฮนดิแคป</th>
      <th rowspan="2">ชนะ</th>
      <th colspan="4" class="even">จ่ายเงินสำหรับอันดับที่</th>
    </tr>
    <tr>
      <th height="20" class="even">1</th>
      <th class="even">2</th>
      <th class="even">3</th>
      <th class="even">4</th>
    </tr>
    <tr>
      <td height="20" align="center">1</td>
      <td>จำนวนม้าแข่ง<span class="style2">4</span> ตัวหรือน้อยกว่า</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="liveligh" align="center">ไม่</td>
      <td class="liveligh" align="center">ไม่</td>
      <td class="liveligh" align="center">ไม่</td>
      <td class="liveligh" align="center">ไม่</td>
    </tr>
    <tr>
      <td height="20" align="center">2</td>
      <td>จำนวนม้าแข่ง<span class="style2">5</span>    ถึง <span class="style2">7</span> ตัว</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="liveligh" align="center">ไม่</td>
      <td class="liveligh" align="center">ไม่</td>
    </tr>
    <tr>
      <td height="21" align="center">3</td>
      <td>จำนวนม้าแข่ง<span class="style2">8</span> ตัวและมากกว่า</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="liveligh" align="center">ไม่</td>
    </tr>
  </tbody></table>
  <br>
  <p>กติกาการจ่ายเงินสำหรับการแข่งม้าแบบแอฟริกาใต้  <span class="style2">(เงินส่วนแบ่งชนะและรอง SA)</span></p>
<table width="100%" cellpadding="0" cellspacing="0" class="oddsTable info">
    <tbody><tr>
      <th width="50" height="40" rowspan="2">ไม่ใช่</th>
      <th rowspan="2" class="even" align="left">การแข่งแบบแฮนดิแคปและนันแฮนดิแคป</th>
      <th width="30" rowspan="2">ชนะ</th>
      <th colspan="4" class="even">จ่ายเงินสำหรับอันดับที่</th>
    </tr>
    <tr>
      <th width="30" class="even">1</th>
      <th width="30" class="even">2</th>
      <th width="30" class="even">3</th>
      <th width="30" class="even">4</th>
    </tr>
    <tr>
      <td height="20" align="center">1</td>
      <td>จำนวนม้าแข่ง<span class="style2">5</span> ตัวหรือน้อยกว่า</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="liveligh" align="center">ไม่</td>
      <td class="liveligh" align="center">ไม่</td>
      <td class="liveligh" align="center">ไม่</td>
      <td class="liveligh" align="center">ไม่</td>
    </tr>
    <tr>
      <td height="20" align="center">2</td>
      <td>จำนวนม้าแข่ง<span class="style2">6</span>    ถึง <span class="style2">7</span> ตัว</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="liveligh" align="center">ไม่</td>
      <td class="liveligh" align="center">ไม่</td>
    </tr>
    <tr>
      <td height="20" align="center">3</td>
      <td>จำนวนม้าแข่ง<span class="style2">8</span> ถึง <span class="style2">15</span> ตัว</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="liveligh" align="center">ไม่</td>
    </tr>
    <tr>
      <td height="21" align="center">4</td>
      <td>จำนวนม้าแข่ง<span class="style2">16</span> ตัวและมากกว่า</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
    </tr>
  </tbody></table>
  <br>
  <p> กติกาการจ่ายเงินสำหรับการแข่งแบบดูไบ <span class="style2"> (เงินส่วนแบ่งชนะและรอง)</span></p>
<table width="100%" cellpadding="0" cellspacing="0" class="oddsTable info">
    <tbody><tr>
      <th width="50" height="40" rowspan="2">ไม่ใช่</th>
      <th rowspan="2" class="even" align="left">การแข่งแบบแฮนดิแคปและนันแฮนดิแคป</th>
      <th width="30" rowspan="2">ชนะ</th>
      <th colspan="3" class="even">จ่ายเงินสำหรับอันดับที่</th>
    </tr>
    <tr>
      <th width="30" class="even">1</th>
      <th width="30" class="even">2</th>
      <th width="30" class="even">3</th>
    </tr>
    <tr>
      <td height="20" align="center">1</td>
      <td>จำนวนม้าแข่ง<span class="style2">5</span> ตัวหรือน้อยกว่า</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="liveligh" align="center">ไม่</td>
      <td class="liveligh" align="center">ไม่</td>
      <td class="liveligh" align="center">ไม่</td>
    </tr>
    <tr>
      <td height="21" align="center">2</td>
      <td>จำนวนม้าแข่ง<span class="style2">6</span>    ตัวและมากกว่า</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
    </tr>
  </tbody></table><br>
  <p>กติกาการจ่ายเงินสำหรับการแข่งม้าแบบออสเตรเลียและนิวซีแลนด์ <span class="style2"> (เงินส่วนแบ่งชนะและรองออสเตรเลีย)</span></p>
<table width="100%" cellpadding="0" cellspacing="0" class="oddsTable info">
    <tbody><tr>
      <th width="50" height="40" rowspan="2">ไม่ใช่</th>
      <th rowspan="2" class="even" align="left">การแข่งแบบแฮนดิแคปและนันแฮนดิแคป</th>
      <th width="30" rowspan="2">ชนะ</th>
      <th colspan="3" class="even">จ่ายเงินสำหรับอันดับที่</th>
    </tr>
    <tr>
      <th width="30" class="even">1</th>
      <th width="30" class="even">2</th>
      <th width="30" class="even">3</th>
    </tr>
    <tr>
      <td height="20" align="center">1</td>
      <td>จำนวนม้าแข่ง <span class="style2">4</span> ตัวหรือน้อยกว่า</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="liveligh" align="center">ไม่</td>
      <td class="liveligh" align="center">ไม่</td>
      <td class="liveligh" align="center">ไม่</td>
    </tr>
    <tr>
      <td height="20" align="center">2</td>
      <td>จำนวนม้าแข่ง <span class="style2">5</span>    ถึง <span class="style2">7</span> ตัว</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="liveligh" align="center">ไม่</td>
    </tr>
    <tr>
      <td height="21" align="center">3</td>
      <td>จำนวนม้าแข่ง <span class="style2">8</span> ตัวและมากกว่า</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่*</td>
    </tr>
  </tbody></table><span class="style2">*</span> ข้อยกเว้น หากมีการถอนตัวออกจากการแข่งขันจนเหลือ 7 ตัว จะส่งผลให้มีการจ่ายเงินส่วนแบ่งแบบรองทั้งสามประเภท 
  <br>
  <p>กติกาการจ่ายเงินสำหรับการแข่งสุนัขแบบอังกฤษและไอร์แลนด์ <span class="style2"> (เงินส่วนแบ่งชนะและรอง)</span></p>
<table width="100%" cellpadding="0" cellspacing="0" class="oddsTable info">
    <tbody><tr>
      <th width="50" height="40" rowspan="2">ไม่ใช่</th>
      <th rowspan="2" class="even" align="left">การแข่งแบบแฮนดิแคปและนันแฮนดิแคป</th>
      <th width="30" rowspan="2">ชนะ</th>
      <th colspan="2" class="even">จ่ายเงินสำหรับอันดับที่</th>
    </tr>
    <tr>
      <th width="30" class="even">1</th>
      <th width="30" class="even">2</th>
    </tr>
    <tr>
      <td height="20" align="center">1</td>
      <td>จำนวนสุนัขแข่ง<span class="style2">3</span> ตัวหรือน้อยกว่า</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="liveligh" align="center">ไม่</td>
      <td class="liveligh" align="center">ไม่</td>
    </tr>
    <tr>
      <td height="21" align="center">2</td>
      <td>จำนวนสุนัขแข่ง<span class="style2">4</span>   ตัวและมากกว่า</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
      <td class="trbgov" align="center">ใช่</td>
    </tr>
  </tbody></table></h4><br>
  <h3><strong>3.34.2.1.</strong><span>
  การแข่งม้าแบบแอฟริกาใต้</span></h3>
  <h4><strong>3.34.2.1.1.</strong><span>
  เงินกองกลางสำหรับการชนะ</span></h4>
  <h5><strong>3.34.2.1.1.1.</strong><span>
  จุดประสงค์คือเพื่อเลือกผู้ชนะการแข่งขันที่ระบุ</span></h5>
  <h5><strong>3.34.2.1.1.2.</strong><span>
  เงินส่วนแบ่งจะกำหนดโดยการแบ่งเงินกองกลางสุทธิด้วยจำนวนหน่วยที่เดิมพันกับม้าที่ชนะ </span></h5>
  <h5><strong>3.34.2.1.1.3.</strong><span>
  เมื่อไรก็ตามที่ม้าสองตัวหรือมากกว่าเข้าเส้นชัยพร้อมกัน การจ่ายเงินส่วนแบ่งจะคำนวณดังนี้ เงินกองกลางสุทธิจะแบ่งเป็น หลายส่วนที่เท่ากันตามที่มีผู้เข้าเส้นชัยพร้อมกัน และแต่ละส่วน ที่ได้จะแบ่งตามจำนวนหน่วยที่เดิมพันกับผู้เข้าเส้นชัยพร้อมกันแต่ ละราย </span></h5>
  <h4><strong>3.34.2.1.2.</strong><span>
  เงินกองกลางสำหรับอันดับ</span></h4>
  <h5><strong>3.34.2.1.2.1.</strong><span>
  จุดประสงค์คือเพื่อเลือกม้าที่เข้าเส้นชัยเป็นที่หนึ่ง ที่สอง ที่สามหรือที่สี่ในการแข่งขันที่ระบุ </span></h5>
  <h5><strong>3.34.2.1.2.2.</strong><span>
  ถ้ามีม้าู้แข่งห้ารายหรือน้อยกว่า อาจจะไม่มีการเดิมพันอันดับและการเดิมพันทั้งหมดจะได้เงินคืน</span></h5>
  <h5><strong>3.34.2.1.2.3.</strong><span>
  ถ้ามีม้าแข่งหกหรือเจ็ดราย เงินส่วนแบ่งจะจ่ายตามม้าที่ได้อันดับหนึ่งและสอง (โดยไม่คำนึงถึงจำนวนทั้งหมดของม้าที่ได้หมายเลข)</span></h5>
  <h5><strong>3.34.2.1.2.4.</strong><span>
  ถ้ามีจำนวนม้าแข่งตั้งแต่แปดถึงสิบห้าตัว การจ่ายเงินส่วนแบ่งจะเป็นไปตามลำดับม้าที่ถึงลำดับแรก รองลงมา และลำดับสาม (ไม่ว่าจะมีจำนวนม้าแข่งกี่ตัวก็ตาม)</span></h5>
  <h5><strong>3.34.2.1.2.5.</strong><span>
  ถ้ามีม้าแข่งสิบหกรายหรือมากกว่า เงินส่วนแบ่งจะจ่ายตามม้า ที่ได้อันดับหนึ่ง สอง สาม และสี่ (โดยไม่คำนึงถึงจำนวนทั้งหมด ของม้าที่ได้หมายเลข) </span></h5>
  <h5><strong>3.34.2.1.2.6.</strong><span>
  เงินกองกลางสุทธิจะแบ่งเป็นหลายส่วนที่เท่ากันตามที่มีม้าที่ได้อันดับ ส่วนแบ่งจะแบ่งตามจำนวนหน่วยที่เดิมพันของม้าแต่ละตัวที่ได้อันดับและผลการตัดสินคือส่วนแบ่งเงินที่ต้องจ่าย </span></h5>
  <h5><strong>3.34.2.1.2.7.</strong><span>
  สำหรับจุดประสงค์ในการคำนวณเงินส่วนแบ่ง การแข่งม้าที่เสมอกันในอันดับแรกจะถือว่าได้ที่หนึ่งและสอง การแข่งม้าที่เสมอกันในอันดับสองจะถือว่าได้ที่สองและสาม การแข่งม้าที่เสมอกันในอันดับสามจะถือว่าได้ที่สามและสี่ การแข่งม้าที่เสมอกันในอันดับสี่จะถือว่าได้ที่สี่ร่วมกัน </span></h5>
  <h3><strong>3.34.2.2.</strong><span>
  การแข่งม้าแบบดูไบ</span></h3>
  <h4><strong>3.34.2.2.1.</strong><span>
   เงินกองกลางสำหรับการชนะ</span></h4>
  <h5><strong>3.34.2.2.1.1.</strong><span>
  จุดประสงค์คือเพื่อเลือกผู้ชนะการแข่งขันที่ระบุ</span></h5>
  <h5><strong>3.34.2.2.1.2.</strong><span>
   เงินส่วนแบ่งจะถูกกำหนดโดยการแบ่งเงินกองกลางสุทธิด้วยจำนวนหน่วยที่เดิมพันกับม้าที่ชนะ</span></h5>
  <h5><strong>3.34.2.2.1.3.</strong><span>
   เมื่อไรก็ตามที่ม้าสองตัวหรือมากกว่าเข้าเส้นชัยพร้อมกัน การจ่ายเงินส่วนแบ่งจะคำนวณดังนี้  เงินกองกลางสุทธิจะถูกแบ่งเป็นหลายส่วนที่เท่ากันตามที่มีผู้เข้าเส้นชัยพร้อมกันและแต่ละส่วนที่ได้จะถูกแบ่งตามจำนวนหน่วยที่เดิมพันกับผู้เข้าเส้นชัยพร้อมกันแต่ละราย</span></h5>
  <h4><strong>3.34.2.2.2.</strong><span>
   เงินกองกลางสำหรับอันดับ</span></h4>
  <h5><strong>3.34.2.2.2.1.</strong><span>
  จุดประสงค์คือเพื่อเลือกม้าที่เข้าเส้นชัยเป็นที่หนึ่ง ที่สอง หรือที่สามในการแข่งขันที่ระบุ</span></h5>
  <h5><strong>3.34.2.2.2.2.</strong><span>
  ถ้ามีม้าแข่งห้ารายหรือน้อยกว่าอาจจะไม่มีการเดิมพันอันดับและการเดิมพันทั้งหมดจะได้เงินคืน</span></h5>
  <h5><strong>3.34.2.2.2.3.</strong><span>
  ถ้ามีม้าแข่งมากกว่าห้าราย เงินส่วนแบ่งจะจ่ายตามม้าที่ได้อันดับหนึ่ง สอง สาม และสี่</span></h5>
  <h5><strong>3.34.2.2.2.4.</strong><span>
  เงินกองกลางสุทธิจะแบ่งเป็นหลายส่วนที่เท่ากันตามที่มีม้าที่ได้อันดับ  ส่วนแบ่งจะแบ่งตามจำนวนหน่วยที่เดิมพันของแต่ละม้าที่ได้อันดับและผลการตัดสินคือส่วนแบ่งเงินที่ต้องจ่าย </span></h5>
  <h5><strong>3.34.2.2.2.5.</strong><span>
  สำหรับจุดประสงค์ในการคำนวณเงินส่วนแบ่ง การแข่งม้าที่เสมอกันในอันดับแรกจะถือว่าได้ที่หนึ่งและสอง การแข่งม้าที่เสมอกันในอันดับสองจะถือว่าได้ที่สองและสาม การแข่งม้าที่เสมอกันในอันดับสามจะถือว่าได้ที่สามร่วมกัน</span></h5>
  <h3><strong>3.34.3.</strong><span>
  การแข่งม้าแบบสหราชอาณาจักร</span></h3>
  <h4><strong>3.34.3.1.</strong><span>
  การแข่งม้าแบบสหราชอาณาจักรจะอยู่ภายใต้กฎกติกาขององค์กร แข่งม้าแห่งสหราชอาณาจักร</span></h4>
  <h4><strong>3.34.3.2.</strong><span>
  เงินกองกลางสำหรับการชนะ</span></h4>
  <h5><strong>3.34.3.2.1.</strong><span>
  จุดประสงค์คือเพื่อเลือกผู้ชนะการแข่งขันที่ระบุ</span></h5>
  <h5><strong>3.34.3.2.2.</strong><span>
  เงินส่วนแบ่งจะถูกกำหนดโดยการแบ่งเงินกองกลางสุทธิด้วยจำนวนหน่วยที่เดิมพันกับม้าที่ชนะ</span></h5>
  <h5><strong>3.34.3.2.3.</strong><span>
  เมื่อไรก็ตามที่ม้าสองตัวหรือมากกว่าเข้าเส้นชัยพร้อมกัน การจ่ายเงินส่วนแบ่งจะคำนวณดังนี้ เงินกองกลางสุทธิจะถูก แบ่งเป็น หลายส่วนที่เท่ากันตามที่มีผู้เข้าเส้นชัยพร้อมกัน และแต่ละส่วนที่ได้จะถูกแบ่งตามจำนวนหน่วยที่เดิมพันกับผู้เข้าเส้นชัยพร้อมกันแต่ละราย</span></h5>
  <h4><strong>3.34.3.3.</strong><span>
  เงินกองกลางสำหรับอันดับ</span></h4>
  <h5><strong>3.34.3.3.1.</strong><span>
  จุดประสงค์คือเพื่อเลือกม้าที่เข้าเส้นชัยเป็นที่หนึ่ง ที่สอง ที่สามหรือที่สี่ในการแข่งขันที่ระบุ </span></h5>
  <h5><strong>3.34.3.3.2.</strong><span>
  มีกฎที่แตกต่างกันสำหรับการเดิมพันเงินกองกลางสำหรับอันดับขึ้นอยู่กับว่าการแข่งขันเป็นการต่อแต้มหรือไม่ต่อแต้ม</span></h5>
  <h4><strong>3.34.3.4.</strong><span>
  การแข่งขันไม่ต่อแต้ม</span></h4>
  <h5><strong>3.34.3.4.1.</strong><span>
  ถ้ามีม้าู้แข่งสี่รายหรือน้อยกว่า อาจจะไม่มีการเดิมพันอันดับ และการเดิมพันทั้งหมดจะได้เงินคืน </span></h5>
  <h5><strong>3.34.3.4.2.</strong><span>
  ถ้ามีม้าู้แข่งห้าถึงเจ็ดราย เงินส่วนแบ่งจะจ่ายตามม้าที่ได้ อันดับหนึ่งและสอง</span></h5>
  <h5><strong>3.34.3.4.3.</strong><span>
  ถ้ามีจำนวนม้าแข่งมากกว่า 7 ตัว,  ผู้ชนะลำดับที่ 1,2 และ 3 จะได้รับผลตอบแทน</span></h5>
  <h4><strong>3.34.3.5.</strong><span>
  การแข่งขันต่อแต้ม</span></h4>
  <h5><strong>3.34.3.5.1.</strong><span>
  ถ้ามีม้าู้แข่งสี่รายหรือน้อยกว่า อาจจะไม่มีการเดิมพันอันดับ และการเดิมพันทั้งหมดจะได้เงินคืน </span></h5>
  <h5><strong>3.34.3.5.2.</strong><span>
  ถ้ามีม้าู้แข่งห้าถึงเจ็ดราย เงินส่วนแบ่งจะจ่ายตาม ม้าที่ได้อันดับหนึ่งและสอง</span></h5>
  <h5><strong>3.34.3.5.3.</strong><span>
  ถ้ามีม้าู้แข่งแปดถึงสิบห้าราย เงินส่วนแบ่งจะจ่ายตามม้าที่ได้อันดับหนึ่ง สอง และสาม</span></h5>
  <h5><strong>3.34.3.5.4.</strong><span>
  ถ้ามีจำนวนม้าแข่งมากกว่า 15 ตัว,  ผู้ชนะลำดับที่ 1,2,3 และ 4 จะได้รับผลตอบแทน</span></h5>
  <h5><strong>3.34.3.5.5.</strong><span>
  เงินกองกลางสุทธิจะแบ่งเป็นหลายส่วนที่เท่ากันตามที่มีม้าที่ได้อันดับ ส่วนแบ่งจะแบ่งตามจำนวนหน่วย ที่เดิมพันของ ม้าแต่ละตัวที่ได้อันดับและผลการตัดสินคือส่วนแบ่งเงินที่ต้องจ่าย </span></h5>
  <h5><strong>3.34.3.5.6.</strong><span>
  สำหรับจุดประสงค์ในการคำนวณเงินส่วนแบ่ง การแข่งม้าที่เสมอกันในอันดับแรกจะถือว่าได้ที่หนึ่งและสอง การแข่งม้าที่เสมอกันในอันดับสองจะถือว่าได้ที่สองและสาม การแข่งม้าที่เสมอกันในอันดับสามจะถือว่าได้ที่สามและสี่ การแข่งม้าที่เสมอกันในอันดับสี่จะถือว่าได้ที่สี่ร่วมกัน</span></h5>
  <h3><strong>3.34.4.</strong><span>
  การแข่งม้าแบบไอร์แลนด์</span></h3>
  <h4><strong>3.34.4.1.</strong><span>
  การแข่งม้าแบบไอร์แลนด์จะอยู่ภายใต้กฎกติกาขององค์กรแข่งม้าแห่งไอร์แลนด์</span></h4>
  <h4><strong>3.34.4.2.</strong><span>
  เงินกองกลางสำหรับการชนะ</span></h4>
  <h5><strong>3.34.4.2.1.</strong><span>
  ดประสงค์คือเพื่อเลือกผู้ชนะการแข่งขันที่ระบุ</span></h5>
  <h5><strong>3.34.4.2.2.</strong><span>
  เงินส่วนแบ่งจะถูกกำหนดโดยการแบ่งเงินกองกลางสุทธิด้วยจำนวนหน่วยที่เดิมพันกับม้าที่ชนะ</span></h5>
  <h5><strong>3.34.4.2.3.</strong><span>
  เมื่อไรก็ตามที่ม้าสองตัวหรือมากกว่าเข้าเส้นชัยพร้อมกัน การจ่ายเงินส่วนแบ่งจะคำนวณโดยการแบ่งเงินกองกลางสุทธิเป็นหลายส่วนที่เท่ากันตามที่มีผู้เข้าเส้นชัยพร้อมกันและแต่ละส่วนที่ได้จะถูกแบ่งตามจำนวนหน่วยที่เดิมพันกับผู้เข้าเส้นชัยพร้อมกันแต่ละราย</span></h5>
  <h4><strong>3.34.4.3.</strong><span>
  เงินกองกลางสำหรับอันดับ</span></h4>
  <h5><strong>3.34.4.3.1.</strong><span>
  จุดประสงค์คือเพื่อเลือกม้าที่เข้าเส้นชัยเป็นที่หนึ่ง ที่สอง ที่สามหรือที่สี่ในการแข่งขันที่ระบุ</span></h5>
  <h5><strong>3.34.4.3.2.</strong><span>
  มีกฎที่แตกต่างกันสำหรับการเดิมพันเงินกองกลางสำหรับอันดับขึ้นอยู่กับว่าการแข่งขันเป็นการต่อแต้มหรือไม่ต่อแต้ม</span></h5>
  <h5><strong>3.34.4.3.3.</strong><span>
  การแข่งขันไม่ต่อแต้ม</span></h5>
  <h5><p class="h7"><strong class="style3">3.34.4.3.3.1.</strong><span>
  ถ้า มีม้าู้แข่งสี่รายหรือน้อยกว่า อาจจะไม่มีการเดิมพันอันดับและการเดิมพันทั้งหมดจะได้เงินคืน</span></p></h5>
  <h5><p class="h7"><strong class="style3">3.34.4.3.3.2.</strong><span>
  ถ้ามีม้าู้แข่งห้าถึงเจ็ดราย เงินส่วนแบ่งจะจ่ายตามม้าที่ได้อันดับหนึ่งและสอง</span></p></h5>
  <h5><p class="h7"><strong class="style3">3.34.4.3.3.3.</strong><span>
  ถ้ามีม้าแข่งมากกว่าเจ็ดราย เงินส่วนแบ่งจะจ่ายตามม้าที่ได้อันดับหนึ่ง สองและสาม</span></p></h5>
  <h5><strong>3.34.4.3.4.</strong><span>
  การแข่งขันต่อแต้ม</span></h5>
  <h5><p class="h7"><strong class="style3">3.34.4.3.4.1.</strong><span>
  ถ้า มีม้าู้แข่งสี่รายหรือน้อยกว่า อาจจะไม่มีการเดิมพันอันดับและการเดิมพันทั้งหมดจะได้เงินคืน</span></p></h5>
  <h5><p class="h7"><strong class="style3">3.34.4.3.4.2.</strong><span>
  ถ้ามีม้าู้แข่งห้าถึงเจ็ดราย เงินส่วนแบ่งจะจ่ายตามม้าที่ได้อันดับหนึ่งและสอง</span></p></h5>
  <h5><p class="h7"><strong class="style3">3.34.4.3.4.3.</strong><span>
  ถ้ามีม้าู้แข่งแปดถึงสิบห้าราย เงินส่วนแบ่งจะจ่ายตามม้าที่ได้อันดับหนึ่ง สอง และสาม</span></p></h5>
  <h5><p class="h7"><strong class="style3">3.34.4.3.4.4.</strong><span>
  ถ้ามีม้าู้แข่งสิบหกรายหรือมากกว่าี่สิบห้าราย เงินส่วนแบ่งจะจ่ายตามม้าที่ได้อันดับหนึ่ง สอง สาม และสี่</span></p></h5>
  <h5><p class="h7"><strong class="style3">3.34.4.3.4.5.</strong><span>
  เงินกองกลางสุทธิจะแบ่งเป็นหลายส่วนที่เท่ากันตามที่มีม้าที่ได้อันดับ  ส่วนแบ่งจะแบ่งตามจำนวนหน่วยที่เดิมพันของแต่ละม้าที่ได้อันดับและผลการตัดสินคือส่วนแบ่งเงินที่ต้องจ่าย </span></p></h5>
  <h5><p class="h7"><strong class="style3">3.34.4.3.4.6.</strong><span>
  สำหรับจุดประสงค์ในการคำนวณเงินส่วนแบ่ง การแข่งม้าที่เสมอกันในอันดับแรกจะถือว่าได้ที่หนึ่งและสอง การแข่งม้าที่เสมอกันในอันดับสองจะถือว่าได้ที่สองและสาม การแข่งม้าที่เสมอกันในอันดับสามจะถือว่าได้ที่สามและสี่ การแข่งม้าที่เสมอกันในอันดับสี่จะถือว่าได้ที่สี่ร่วมกัน</span></p></h5>
  <a name="R334.5" id="R334.5"></a>
  <h3><strong>3.34.5.</strong><span>
  กฎกติกาการแข่งม้า การแข่งรถม้าลากและการแข่งวิ่งสุนัขพันธุ์เกรย์ฮาวนด์แบบออสเตรเลีย</span></h3>
  <h4>คำจำกัดความ</h4>
  <h4>"การวางเดิมพัน" หมายถึง การเดิมพันที่วางข้างผู้เข้าแข่งขัน ผู้เข้าเส้นชัยหรือรวมกัน แล้วแต่กรณี</h4>
  <h4>"ผู้เข้าแข่งขัน" หมายถึัง (ในการแข่งขัน) ม้าหรือสุนัขพันธุ์เกรย์ฮาวนด์ที่ถูกนำมาเข้าร่วมการแข่งขันเมื่อมีการเปิดให้วางเดิมพันการแข่งขัน แต่ไม่รวมถึงม้าหรือเกรย์ฮาวนด์ที่มีการถอนตัวในภายหลัง </h4>
  <h4>"ผู้เข้าเส้นชัย" หมายถึง (ในการแข่งขัน) ผู้เข้าแข่งขันตั้งแต่ต้นที่แข่งขันจนจบ แต่ไม่รวมถึงผู้เข้าแข่งขันตั้งแต่ต้นที่ขาดคุณสมบัติหรือถูกประกาศว่าไม่ใช่ผู้เข้าแข่งขันตั้งแต่ต้นก่อนที่จะมีการประกาศเดิมพันที่ถูกต้องสำหรับการแข่งขัน </h4>
  <h4>"ผู้ถือต้นทุนในการพนัน" หมายถึง บุคคลที่จ่ายและวางเงินเดิมพันซึ่งยอมรับโดย TAB หรือสโมสรการแข่งขันที่จัดการระบบคำนวณและแสดงตัวเลขและจำนวนการวางเดิมพันในสนามแข่งขัน  </h4>
  <h4><strong>3.34.5.1.</strong><span>
  การแข่งม้า การแข่งรถม้า และแข่งวิ่งสุนัขแบบออสเตรเลีย กฎกติการะบบคำนวณและแสดงตัวเลขและจำนวนการวางเดิมพันในการแข่งขัน จะถูกควบคุมและบังคับใช้โดย TAB Limited. </span></h4>
  <h4><strong>3.34.5.2.</strong><span>
  เงินกองกลางสำหรับการชนะ</span></h4>
  <h5><strong>3.34.5.2.1.</strong><span>
  จุดประสงค์คือเพื่อเลือกผู้ชนะในการแข่งขันที่ระบุ </span></h5>
  <h5><strong>3.34.5.2.2.</strong><span>
  การเดิมพันจะถูกปฏิเสธถ้าจำนวนของผู้เข้าแข่งขันในการแข่งขันน้อยกว่า 2 ราย </span></h5>
  <h5><strong>3.34.5.2.3.</strong><span>
  ถ้าจำนวนของผู้เข้าแข่งขันในการแข่งขันลดลงเหลือน้อยกว่า 2 รายเมื่อใดก็ตาม หรือถ้าไม่มีผู้เข้าเส้นชัยในการแข่งขัน การวางเดิมพันเงินกองกลางสำหรับการชนะจะต้องยุติและการเดิมพันทั้งหมดจะได้เงินคืน  </span></h5>
  <h5><strong>3.34.5.2.4.</strong><span>
  เงินส่วนแบ่งกองกลางสำหรับการชนะ (หักจำนวนเงินอื่นใดที่ถูกหักออกตามกฎกติกา) จะุแบ่งให้ผู้ถือต้นทุนในการพนันแต่ละรายที่วางเดิมพันข้างผู้เข้าเส้นชัยเป็นที่หนึ่งในการแข่งขัน </span></h5>
  <h5><strong>3.34.5.2.5.</strong><span>
  ถ้ามีการเข้าเส้นชัยเป็นที่หนึ่งพร้อมกัน การจ่ายเงินส่วนแบ่งจะคำนวณดังนี้: เงินส่วนแบ่งกองกลางสำหรับการชนะจะแบ่งเป็นหลายส่วนที่เท่ากันตามที่มีผู้เข้าเส้นชัยพร้อมกันที่ได้รับการวางเดิมพัน และแต่ละส่วนจะแบ่งให้ผู้เข้าเส้นชัยที่ได้รับการวางเดิมพันแต่ละราย ซึ่งจะต้องแบ่งให้ผู้ถือต้นทุนในการพนันแต่ละรายที่วางเดิมพันข้างผู้เข้าเส้นชัยที่ได้รับส่วนแบ่ง </span></h5>
  <h4><strong>3.34.5.3.</strong><span>
  เงินกองกลางสำหรับอันดับ</span></h4>
  <h5><strong>3.34.5.3.1.</strong><span>
  จุดประสงค์คือเพื่อเลือกผู้เข้าเส้นชัยเป็นที่หนึ่ง ที่สอง หรือที่สาม แล้วแต่กรณี </span></h5>
  <h5><strong>3.34.5.3.2.</strong><span>
  การเดิมพันจะถูกปฏิเสธหากจำนวนของผู้เข้าแข่งขันในการแข่งขันน้อยกว่า 5 ราย </span></h5>
  <h5><strong>3.34.5.3.3.</strong><span>
  หากจำนวนของผู้เข้าแข่งขันในการแข่งขันลดลงเหลือน้อยกว่า 5 รายเมื่อใดก็ตาม หรือหากไม่มีผู้เข้าเส้นชัยในการแข่งขัน การวางเดิมพันเงินกองกลางสำหรับอันดับจะต้องยุติและการเดิมพันทั้งหมดจะได้เงินคืน </span></h5>
  <h5><strong>3.34.5.3.4.</strong><span>
  จะมีเงินกองกลางสำหรับอันดับสำหรับการแข่งขันที่มีเงินส่วนแบ่ง 2 ส่วน ถ้าจำนวนของผู้ที่เข้าแข่งขันที่ได้รับขณะครบกำหนดเวลาสำหรับการถอนตัว (ซึ่งกำหนดไว้โดยหน่วยงานที่ควบคุมดูแลหรือสโมสรการแข่งขันที่เป็นผู้รับผิดชอบการจัดการประชุมการแข่งขันที่เกี่ยวข้อง) มีน้อยกว่า 8 ราย </span></h5>
  <h5><strong>3.34.5.3.5.</strong><span>
  เงินส่วนแบ่งกองกลางสำหรับอันดับสำหรับการแข่งขันที่มีเงินส่วนแบ่ง 2 ส่วน (หักจำนวนเงินอื่นใดที่ถูกหักออกตามกฎกติกา) จะแบ่งเป็น 2 ส่วนที่เท่ากัน ส่วนที่หนึ่งจะแบ่งให้ผู้ถือต้นทุนในการพนันแต่ละรายที่วางเดิมพันข้างผู้เข้าเส้นชัยเป็นที่หนึ่งในการแข่งขัน และส่วนที่สองจะแบ่งให้ผู้ถือต้นทุนในการพนันแต่ละรายที่วางเดิมพันข้างผู้เข้าเส้นชัยเป็นที่สองในการแข่งขัน </span></h5>
  <h5><strong>3.34.5.3.6.</strong><span>
  ถ้ามีการเข้าเส้นชัยเป็นที่หนึ่งพร้อมกันในการแข่งขันที่มีเงินส่วนแบ่ง 2 ส่วน การจ่ายเงินส่วนแบ่งจะคำนวณดังนี้: เงินส่วนแบ่งกองกลางสำหรับการชนะจะแบ่งเป็นหลายส่วนที่เท่ากันตามที่มีผู้เข้าเส้นชัยพร้อมกันที่ได้รับการวางเดิมพัน และแต่ละส่วนจะแบ่งให้ผู้เข้าเส้นชัยที่ได้รับการวางเดิมพันแต่ละราย ซึ่งจะต้องแบ่งให้ผู้ถือต้นทุนในการพนันแต่ละรายที่วางเดิมพันข้างผู้เข้าเส้นชัยที่ได้รับส่วนแบ่ง </span></h5>
  <h5><strong>3.34.5.3.7.</strong><span>
  จะมีเงินกองกลางสำหรับอันดับสำหรับการแข่งขันที่มีเงินส่วนแบ่ง 3 ส่วน ถ้าจำนวนของผู้ที่เข้าแข่งขันที่ได้รับขณะครบกำหนดเวลาสำหรับการถอนตัว (ซึ่งกำหนดไว้โดยหน่วยงานที่ควบคุมดูแลหรือสโมสรการแข่งขันที่เป็นผู้รับผิดชอบการจัดการประชุมการแข่งขันที่เกี่ยวข้อง) มี 8 รายขึ้นไป </span></h5>
  <h5><strong>3.34.5.3.8.</strong><span>
  เงินส่วนแบ่งกองกลางสำหรับอันดับสำหรับการแข่งขันที่มีเงินส่วนแบ่ง 3 ส่วน (หักจำนวนเงินอื่นใดที่ถูกหักออกตามกฎกติกา) จะแบ่งเป็น 3 ส่วนที่เท่ากัน ซึ่งส่วนที่หนึ่งจะแบ่งให้ผู้ถือต้นทุนในการพนันที่วางเดิมพันข้างผู้เข้าเส้นชัยเป็นที่หนึ่ง ส่วนที่สองจะแบ่งให้ผู้ถือต้นทุนในการพนันที่วางเดิมพันข้างผู้เข้าเส้นชัยเป็นที่สอง และส่วนที่สามจะแบ่งให้ผู้ถือต้นทุนในการพนันที่วางเดิมพันข้างผู้เข้าเส้นชัยเป็นที่สาม </span></h5>
  <h5><strong>3.34.5.3.9.</strong><span>
  ุถ้ามีผู้เข้าเส้นชัยเป็นอันดับหนึ่งพร้อมกัน 2 รายในการแข่งขันที่มีเงินส่วนแบ่ง 3 ส่วน และผู้เข้าเส้นชัยทั้งคู่ได้รับการวางเดิมพัน สองในสามของเงินส่วนแบ่งกองกลางสำหรับอันดับจะแบ่งเป็น 2 ส่วนที่เท่ากัน  และแต่ละส่วนจะแบ่งให้ผู้ถือต้นทุนในการพนันแต่ละรายที่วางเดิมพันข้างผู้เข้าเส้นชัยพร้อมกันแต่ละรายที่ได้รับการวางเดิมพัน และหนึ่งในสามของเงินส่วนแบ่งกองกลางสำหรับอันดับจะแบ่งให้ผู้ถือต้นทุนในการพนันแต่ละรายที่วางเดิมพันข้างผู้เข้าเส้นชัยเป็นที่สาม </span></h5>
  <h5><strong>3.34.5.3.10.</strong><span>
  ุถ้ามีผู้เข้าเส้นชัยเป็นที่หนึ่งพร้อมกัน 2 รายในการแข่งขันที่มีเงินส่วนแบ่ง 3 ส่วน แต่มีผู้เข้าเส้นชัยรายเดียวเท่านั้นที่ได้รับการวางเดิมพัน เงินส่วนแบ่งกองกลางสำหรับอันดับทั้งหมดจะแบ่งเป็น 2 ส่วนที่เท่ากัน โดยส่วนที่หนึ่งจะแบ่งให้ผู้ถือต้นทุนในการพนันที่วางเดิมพันข้างผู้เข้าเส้นชัยรายที่ได้รับการวางเดิมมพัน และส่วนที่สองจะแบ่งให้ผู้ถือต้นทุนในการพนันที่วางเดิมพันข้างผู้ัเข้าเส้นชัยเป็นที่สาม </span></h5>
  <h5><strong>3.34.5.3.11.</strong><span>
  ถ้ามีผู้เข้าเส้นชัยเป็นที่หนึ่งพร้อมกัน 2 รายในการแข่งขันที่มีเงินส่วนแบ่ง 3 ส่วน แต่ผู้เข้าเส้นชัยทั้งคู่ไำม่ได้รับการวางเดิมพัน เงินส่วนแบ่งกองกลางสำหรับอันดับทั้งหมดจะแบ่งให้ผู้ถือต้นทุนในการพนันแต่ละรายที่วางเดิมพันข้างผู้เข้าเส้นชัยเป็นที่สาม </span></h5>
  <h5><strong>3.34.5.3.12.</strong><span>
  ถ้ามีผู้เข้าเส้นชัยเป็นที่หนึ่งพร้อมกัน 3 รายขึ้นไปในการแข่งขันที่มีเงินส่วนแบ่ง 3 ส่วน เงินส่วนแบ่งกองกลางสำหรับอันดับจะแบ่งเป็นหลายส่วนที่เท่ากันตามที่มีผู้เข้่าเส้นชัยพร้อมกันที่ได้รับการวางเดิมพัน และแต่ละส่วนจะแบ่งให้ผู้เข้าเส้นชัยที่ได้รับการวางเดิมพันแต่ละราย ซึ่งจะต้องแบ่งให้ผู้ถือต้นทุนในการพนันแต่ละรายที่วางเดิมพันข้างผู้เข้าเส้นชัยที่ได้รับส่วนแบ่ง </span></h5>
  <h5><strong>3.34.5.3.13.</strong><span>
  ุถ้าผู้เข้าเส้นชัยเป็นที่หนึ่งได้รับการวางเดิมพัน และมีผู้เข้าเส้นชัยเป็นที่สองพร้อมกัน 2 รายขึ้นไปที่ได้รับการวางเดิมพันในการแข่งขันที่มีเงินส่วนแบ่ง 3 ส่วน หนึ่งในสามของเงินส่วนแบ่งกองกลางสำหรับอันดับจะแบ่งให้ผู้ถือต้นทุนในการพนันแต่ละรายที่วางเดิมพันข้างผู้เข้าเส้นชัยเป็นที่หนึ่ง สองในสามของเิงินส่วนแบ่งกองกลางสำหรับอันดับจะแบ่งเป็นหลายส่วนที่เท่ากันตามที่มีผู้เข้าเส้นชัยพร้อมกันที่ได้รับการวางเดิมพัน โดยแต่ละส่วนจะแบ่งให้ผู้เข้าเส้นชัยเป็นที่สองพร้อมกันแต่ละรายในการแข่งขัน ซึ่งจะต้องแบ่งให้ผู้ถือต้นทุนในการพนันแต่ละรายที่วางเดิมพันข้างผู้เข้าเส้นชัยที่ได้รับส่วนแบ่ง </span></h5>
  <h5><strong>3.34.5.3.14.</strong><span>
  ถ้าผู้เข้าเส้นชัยเป็นที่สองพร้อมกัน 2 รายขึ้นไป แต่มีผู้เข้าเส้นชัยรายเดียวเท่านั้นที่ได้รับการวางเดิมพัน เงินส่วนแบ่งกองกลางสำหรับอันดับทั้งหมดจะแบ่งเป็นสองส่วนที่เท่้ากัน ส่วนที่หนึ่งจะแบ่งให้ผู้ถือต้นทุนในการพนันที่วางเดิมพันข้างผู้เข้าเส้นชัยเป็นที่หนึ่ง และส่วนที่สองจะแบ่งให้ผู้ถือต้นทุนในการพนันที่วางเดิมพันข้างผู้เข้าเส้นชัยเป็นที่สองพร้อมกันที่ได้รับการวางเดิมพัน </span></h5>
  <h5><strong>3.34.5.3.15.</strong><span>
  ถ้าผู้เข้าเส้นชัยเป็นที่หนึ่งและสองได้รับการวางเดิมพันและมีผู้เข้าเส้นชัยเป็นที่สามพร้อมกัน 2 รายขึ้นไปที่ได้รับการวางเดิมพันในการแข่งขันที่มีเงินส่วนแบ่ง 3 ส่วน หนึ่งในสามของเงินส่วนแบ่งกองกลางสำหรับอันดับจะแบ่งให้ผู้ถือต้นทุนในการพนันแต่ละรายที่วางเดิมพันข้างผู้เข้าเส้นชัยเป็นที่หนึ่ง และหนึ่งในสามของเงินส่วนแบ่งกองกลางสำหรับอันดับจะแบ่งให้ผู้ถือต้นทุนในการพนันแต่ละรายที่วางเดิมพันข้างผู้เข้าเส้นชัยเป็นที่สอง ส่วนหนึ่งในสามของเงินส่วนแบ่งกองกลางสำหรับอันดับจะแบ่งเป็นหลายส่วนที่เท่ากันตามที่มีผู้เข้าเส้นชัยพร้อมกันที่ได้รับการวางเดิมพัน โดยแต่ละส่วนจะแบ่งให้ผู้เข้าเส้นชัยพร้อมกันแต่ละราย ซึ่งจะนำไปแบ่งให้ผู้ถือต้นทุนในการพนันแต่ละรายที่วางเดิมพันข้างผู้เข้าเส้นชัยที่ไ้ด้รับส่วนแบ่ง</span></h5>
  <a name="R334.6" id="R334.6"></a>
  <h3><strong>3.34.6.</strong><span>
  กฎกติกาการแข่งวิ่งสุนัขพันธุ์เกรย์ฮาวนด์แบบสหราชอาณาจักร/ไอร์แลนด์</span></h3>
  <h4><strong>3.34.6.1.</strong><span>
  การแข่งวิ่งสุนัขพันธุ์เกรย์ฮาวนด์แบบสหราชอาณาจักร/ไอร์แลนด์จะถูกควบคุมโดยกฎกติการะบบคำนวณและแสดงตัวเลขและจำนวนการวางเดิมพันในการแข่งขัน (Totalisator Rules) ภายใต้เงื่อนไขของสนามแข่งขันแต่ละแห่ง</span></h4>

  <h4><strong>3.34.6.2.</strong><span>
  คำจำกัดความ</span></h4>  
  <h5><strong>3.34.6.2.1.</strong><span>
  "ผู้เข้าแข่งขัน" หมายถึง สุนัขพันธุ์เกรย์ฮาวนด์ที่ถูกนำมาเข้าร่วมการแข่งขันเมื่อมีการเปิดให้วางเดิมพันการแข่งขัน แต่ไม่รวมถึงสุนัขเกรย์ฮาวนด์ที่ขาดคุณสมบัติและถูกปรับออกจากการแข่งขันในภายหลัง</span></h5>
  <h5><strong>3.34.6.2.2.</strong><span>
  "ผู้เข้าเส้นชัย" หมายถึง ผู้เข้าแข่งขันที่แข่งขันจนจบรอบการแข่งขัน แต่ไม่รวมถึงผู้เข้าแข่งขันที่ขาดคุณสมบัติหรือถูกประกาศว่าไม่ใช่ผู้เข้าแข่งขัน ก่อนที่จะมีการประกาศเดิมพันที่ถูกต้องสำหรับการแข่งขัน</span></h5>

  <h4><strong>3.34.6.3.</strong><span>
  เงินกองกลางสำหรับการชนะ (Win Pool)</span></h4>
  <h5><strong>3.34.6.3.1.</strong><span>
  จุดประสงค์ของเงินกองกลางสำหรับการชนะคือ การเลือกผู้ชนะที่จะเข้าเส้นชัยเป็นที่หนึ่งในการแข่งขันที่ระบุ </span></h5>
  <h5><strong>3.34.6.3.2.</strong><span>
  การเดิมพันจะถูกปฏิเสธในกรณีที่มีจำนวนของสุนัขแข่งที่โฆษณาไว้ร่วมในการแข่งขันน้อยกว่า 2 ตัว </span></h5>
  <h5><strong>3.34.6.3.3.</strong><span>
  ถ้าจำนวนของสุนัขแข่งที่โฆษณาไว้ในการแข่งขันลดลงเหลือน้อยกว่า 2 ตัวเมื่อใดก็ตาม หรือถ้าไม่มีผู้เข้าเส้นชัยในการแข่งขัน การวางเดิมพันเงินกองกลางสำหรับการชนะจะถูกยกเลิกและเดิมพันทั้งหมดจะถูกจ่ายคืนให้เจ้าของ </span></h5>
  <h5><strong>3.34.6.3.4.</strong><span>
  เงินกองกลางสำหรับการชนะจะต้องคำนวณโดยการแบ่งเงินกองกลางสำหรับการชนะสุทธิด้วยจำนวนหน่วยที่เลือกวางเดิมพันกับสุนัขพันธุ์เกรย์ฮาวนด์ตัวที่ชนะ  เงินส่วนแบ่งขั้นต่ำเท่ากับ 1.10</span></h5>
  <h5><strong>3.34.6.3.5.</strong><span>
  ในกรณีที่มีการเข้าเส้นชัยเป็นที่หนึ่งพร้อมกัน เงินกองกลางสุทธิจะถูกหารเฉลี่ยตามจำนวนสุนัขพันธุ์เกรย์ฮาวนด์ที่วิ่งเข้าเส้นชัยพร้อมกันดังกล่าว เงินส่วนแบ่งจะถูกคำนวณโดยการหารเฉลี่ยเงินกองกลางสุทธิแต่ละกอง โดยใช้จำนวนหน่วยที่เลือกวางเดิมพันกับสุนัขพันธุ์เกรย์ฮาวนด์ที่วิ่งเข้าเส้นชัยพร้อมกันแต่ละตัว  ไม่มีเงินส่วนแบ่งขั้นต่ำสำหรับการเข้าเส้นชัยพร้อมกัน ดังนั้น อาจเป็นไปได้ที่เงินส่วนแบ่งที่ได้รับจะต่ำกว่าเงินที่วางเดิมพันในแต่ละหน่วย</span></h5>
  <h5><strong>3.34.6.3.6.</strong><span>
  ถ้าไม่มีหน่วยที่วางเดิมพันกับสุนัขพันธุ์เกรย์ฮาวนด์ที่ชนะ เงินกองกลางสำหรับการชนะจะถูกยกยอดบัญชีไปจ่ายในการแข่งขันที่โฆษณาไว้ครั้งถัดไป  </span></h5>
  <h5><strong>3.34.6.3.7.</strong><span>
  ถ้ามีคอกกั้นว่างเนื่องจากสุนัขไม่ได้ลงแข่งหรือถอนตัวล่าช้า เดิมพันทั้งหมดบนหมายเลขคอกกั้นนั้นจะถูกจ่ายคืนให้เจ้าของ</span></h5>
  <h5><strong>3.34.6.3.8.</strong><span>
  ในกรณีที่มีสุนัขสำรองวิ่งแทนสุนัขแข่งที่โฆษณาไว้ การเดิมพันทั้งหมดจะยังคงไว้ตามหมายเลขคอกกั้นที่มีอยู่  จะมีการจ่ายคืนเดิมพันในกรณีที่คอกกั้นนั้น ๆ ว่างเท่านั้น</span></h5>
  <h5><strong>3.34.6.3.9.</strong><span>
  ในกรณีที่ไม่มีการแข่งขัน (การแข่งขันเป็นโมฆะ) เดิมพันทั้งหมดจะถูกจ่ายคืนให้เจ้าของ</span></h5>
  <h4><strong>3.34.6.4.</strong><span>
  เงินกองกลางสำหรับอันดับ</span></h4>
  <h5><strong>3.34.6.4.1.</strong><span>
  จุดประสงค์ของเงินกองกลางสำหรับอันดับคือ เพื่อเลือกผู้เข้าเส้นชัยเป็นที่หนึ่งหรือสอง แล้วแต่กรณี</span></h5>
  <h5><strong>3.34.6.4.2.</strong><span>
  เงินกองกลางสำหรับอันดับจะเปิดรับเดิมพันในการแข่งขันที่มีสุนัขแข่งที่โฆษณาไว้อย่างน้อย 4 ตัวเท่านั้น การเดิมพันจะถูกปฏิเสธในกรณีที่มีจำนวนของสุนัขแข่งที่โฆษณาไว้ร่วมในการแข่งขันน้อยกว่า 4 ตัว</span></h5>
  <h5><strong>3.34.6.4.3.</strong><span>
  ถ้าจำนวนของสุนัขแข่งที่โฆษณาไว้ในการแข่งขันลดลงเหลือน้อยกว่า 4 ตัวเมื่อใดก็ตาม หรือถ้าไม่มีผู้เข้าเส้นชัยในการแข่งขัน การวางเดิมพันเงินกองกลางสำหรับอันดับจะถูกยกเลิกและเดิมพันทั้งหมดจะถูกจ่ายคืนให้เจ้าของ </span></h5>
  <h5><strong>3.34.6.4.4.</strong><span>
  เงินส่วนแบ่งในเงินกองกลางสำหรับอันดับจะถูกคำนวณโดย เริ่มจากการหักจำนวนหน่วยเดิมพันที่ชนะออกจากเงินกองกลางสุทธิ และนำกองเงินที่เหลือมาหารเฉลี่ยระหว่างอันดับต่าง ๆ ในการแข่งขัน  จากนั้น กองเงินที่หารเฉลี่ยแล้วแต่ละกองจะถูกแบ่งเฉลี่ยด้วยจำนวนของหน่วยที่ชนะสำหรับสุนัขแต่ละอันดับ และบวกด้วยเดิมพันที่ลงเอาไว้ในตอนต้น  เงินส่วนแบ่งขั้นต่ำจะต้องเท่ากับ 1.0</span></h5>
  <h5><strong>3.34.6.4.5.</strong><span>
  ในกรณีที่มีสุนัขพันธุ์เกรย์ฮาวนด์เข้าเส้นชัยเป็นที่หนึ่งหรือที่สองพร้อมกัน เงินส่วนแบ่งจะถูกคำนวณตามที่บรรยายไว้ข้างต้น ยกเว้นสำหรับสุนัขพันธุ์เกรย์ฮาวนด์ที่เข้าเส้นชัยพร้อมกันดังกล่าวจะต้องแบ่งเงินกองกลางส่วนนั้นเสมือนกับในกรณีที่ไม่มีการเข้าเส้นชัยพร้อมกันเกิดขึ้น ไม่มีเงินส่วนแบ่งขั้นต่ำสำหรับการเข้าเส้นชัยพร้อมกัน ดังนั้น อาจเป็นไปได้ที่เงินส่วนแบ่งที่ได้รับจะต่ำกว่าเงินที่วางเดิมพันในแต่ละหน่วย </span></h5>
  <h5><strong>3.34.6.4.6.</strong><span>
  ถ้ามีสุนัขพันธุ์เกรย์ฮาวนด์ตัวเดียวเข้าเส้นชัยในการแข่งขัน เงินกองกลางสำหรับอันดับสุทธิทั้งหมดจะถูกหารด้วยหน่วยที่เดิมพันกับสุนัขพันธุ์เกรย์ฮาวน์ตัวดังกล่าว และเงินส่วนแบ่งจะถูกคำนวณเสมือนเป็นเงินกองกลางสำหรับการชนะ</span></h5>
  <h5><strong>3.34.6.4.7.</strong><span>
  ถ้ามีคอกกั้นว่างเนื่องจากสุนัขที่ไม่ได้ลงแข่งหรือถอนตัวล่าช้า เดิมพันทั้งหมดบนหมายเลขคอกกั้นนั้นจะถูกจ่ายคืนให้เจ้าของ</span></h5>
  <h5><strong>3.34.6.4.8.</strong><span>
  ในกรณีที่สุนัขสำรองวิ่งแทนสุนัขแข่งที่โฆษณาไว้ การเดิมพันทั้งหมดจะยังคงไว้ตามหมายเลขคอกกั้นที่มีอยู่  จะมีการจ่ายคืนเดิมพันในกรณีที่คอกกั้นนั้น ๆ ว่างเท่านั้น</span></h5>
  <h5><strong>3.34.6.4.9.</strong><span>
  ในกรณีที่ไม่มีการแข่งขัน (การแข่งขันเป็นโมฆะ) เดิมพันทั้งหมดจะถูกจ่ายคืนให้เจ้าของ</span></h5>
  <a name="R334.7" id="R334.7"></a>
  <h3><strong>3.34.7.</strong><span>
  การแข่งขันตัวต่อตัวแบบฟิกซ์อ๊อดส์อังกฤษ/ไอร์แลนด์</span></h3>
  <h4><strong>3.34.7.1.</strong><span>
   ถ้าการแข่งขันไม่เริ่มตามวันที่กำหนดไว้ การเดินพันทั้งหมดจะเป็นโมฆะ </span></h4>
  <h4><strong>3.34.7.2.</strong><span>
  ม้าทั้งสองตัวต้องเริ่มการแข่งขัน ถ้าเห็นว่าม้าหนึ่งหรือทั้งสองตัวไม่วิ่งหรือตะกุยออก จะถือว่าการเดิมพันทั้งหมดเป็นโมฆะ และมีการคืนเงิน  </span></h4>
  <h4><strong>3.34.7.3.</strong><span>
  ถ้ายอมรับการเดิมพันเนื่องจากเหตุขัดข้องหลังจากที่การแข่งขั้นได้เริ่มขึ้นแล้ว การเดิมพันนั้นจะประกาศว่าเป็นโมฆะ และมีการคืนเงิน </span></h4>
  <h4><strong>3.34.7.4.</strong><span>
  ม้าตัวที่มีอันดับการแข่งขันดีกว่าคือฝ่ายชนะ ถ้าม้าตัวใดตัวหนึ่งวิ่งไม่ถึงเส้นชัย จะถือว่าม้าอีกตัวหนึ่งเป็นฝ่ายชนะ </span></h4>
  <h4><strong>3.34.7.5.</strong><span>
  ถ้าม้าทั้งสองตัววิ่งไม่ถึงเส้นชัย จะถือว่าการเดิมพันทั้งหมดเป็นโมฆะ </span></h4>
  <h4><strong>3.34.7.6.</strong><span>
  ในการแข่งขันแบบตัวต่อตัว ถ้าม้าสองตัวเข้าเส้นชัยพร้อมกัน (Dead Heat) เดิมพันทั้งหมดจะได้รับการคืนเงิน  </span></h4>
  <h4><strong>3.34.7.7.</strong><span>
  จะมีการตัดสินฝ่ายชนะเมื่อได้ประกาศ "เปรียบเทียบแล้ว" หรือ "เรียบร้อย" และมีการประกาศผลลัพธ์อย่างเป็นทางการ </span></h4>
  <h4><strong>3.34.7.8.</strong><span>
   คำว่า "สนาม" (The Field) หมายถึง ม้าทุกตัวนอกเหนือจากสองตัวที่แข่งขันกันแบบตัวต่อตัว</span></h4>
  <div id="Div6" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
  
   <!-- BEGIN Esports-->
  <h2><a name="R335" id="A335"></a>3.35. กีฬาอิเล็กทรอนิกส์ (Esports)</h2>
  <h3><strong>3.35.1.</strong> <span>มันนี่ไลน์ (Moneyline) หมายถึง ผู้ชนะการแข่งขันกีฬาอิเล็กทรอนิกส์ ซึ่งอาจเป็นทีมหรือผู้แข่งขันรายบุคคลที่เอาชนะทีมตรงข้ามหรือมีคะแนนสูงสุดในนัดการแข่งขัน</span></h3>
  <h3><strong>3.35.2.</strong> <span>ผู้ชนะการแข่งขัน หมายถึง ทีมหรือผู้เข้าแข่งขันรายบุคคลที่ชนะในรอบสุดท้ายของการแข่งขันกีฬาอิเล็กทรอนิกส์ </span></h3>
  <h3><strong>3.35.3.</strong> <span>ตลาดทั้งหมดจะได้รับการตัดสินตามผลอย่างเป็นทางการ ซึ่งประกาศโดยสมาคมกีฬาอิเล็กทรอนิกส์ที่เกี่ยวข้องหรือองค์ที่จัดการแข่งขัน โดยอาจเป็นการรายงานในเว็บไซต์อย่างเป็นทางการ การขาดคุณสมบัติในเวลาต่อมาหรือการเปลี่ยนแปลงเกี่ยวกับผลลัพธ์ จะไม่ได้รับการพิจารณาสำหรับวัตถุประสงค์ในการเดิมพัน</span></h3>
  <h3><strong>3.35.4.</strong> <span>ถ้าการแข่งขันถูกเลื่อนออกไป การเดิมพันทั้งหมดจะยังคงถือว่าใช้ได้อยู่ แต่การแข่งขันจะต้องจัดขึ้นภายใน 48 ชั่วโมงหลังจากกำหนดการเดิม</span></h3>
  <h3><strong>3.35.5.</strong> <span>ถ้าการแข่งขันเริ่มต้นขึ้นแต่ยังไม่เสร็จสมบูรณ์ เนื่องจากผู้เล่นขาดสัญญาณการติดต่อหรือไฟฟ้าขัดข้อง การเดิมพันทั้งหมดจะเป็นโมฆะ </span></h3>
  <h3><strong>3.35.6.</strong> <span>ถ้ามีการจัดการแข่งขันขึ้นใหม่สืบเนื่องจากการจับฉลาก ผู้เล่นขาดสัญญาณการติดต่อ หรือไฟฟ้าขัดข้อง การเดิมพันทั้งหมดจะเป็นโมฆะ ในกรณีการจัดการแข่งขันขึ้นใหม่ นัดการแข่งขั้นที่จัดขึ้นใหม่นั้นจะถือว่าเป็นตลาดใหม่และแยกต่างหาก</span></h3>
  <h3><strong>3.35.7.</strong> <span>ถ้าจำนวนรอบ/แผนที่เปลี่ยนแปลงไปจากกำหนดการเดิม จะถือว่าการเดิมพันแฮนดิแคปและสูง/ต่ำเป็นโมฆะ ส่วนการเดิมพันแบบมันนี่ไลน์ (Moneyline) จะยังคงถือว่าใช้ได้อยู่</span></h3>
  <div id="Div13" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>
   <!-- End Esports-->
  <!-- BEGIN Virtual Sports Rules -->
  <h1><a name="R4" id="R4"></a>4. กติกาการแข่งขันกีฬาทางออนไลน์</h1>
  <h2><a name="R41" id="R41"></a>4.1. ทั่วไป</h2>
  <h3><strong>4.1.1.</strong><span>
  เกมการเดิมพันกีฬาทางออนไลน์เป็นการนำเสนอผลลัพธ์การสุ่มเลือกตัวเลขโดยระบบคอมพิวเตอร์ ซึ่งตัดสินว่าทีมใดจะเป็นฝ่ายชนะการแข่งขันหรือการจัดงาน หรือทีมใดจะอยู่ในอันดับหนึ่ง สอง สาม เป็นต้น ในการแข่งขันหรือการจัดงาน ผลลัพธ์การแข่งขันหรือการจัดงานมีการควบคุมโดยเครื่องมือสุ่มเลือกตัวเลข (RNG) ซึ่งผ่านการทดสอบโดยบริษัทรับรองอย่างอิสระแล้ว</span></h3>
  <h3><strong>4.1.2.</strong><span>
   เมื่อเป็นไปได้ การเดิมพันกีฬาทางออนไลน์จะอยู่ภายใต้กฎกติกาเดียวกันกับการเดิมพันการแข่งขันกีฬาจริง </span></h3>
  <h3><strong>4.1.3.</strong><span>
   กีฬาทางออนไลน์เป็นเกมที่มีการถ่ายทอดสัญญาณ สมาชิกทุกคนที่เดิมพันในนัดการแข่งขันหรือการจัดงานเดียวกัน จะได้รับผลลัพธ์เดียวกัน</span></h3>
  <h3><strong>4.1.4.</strong><span>
  ในกรณีที่เกิดเหตุขัดข้องทางคอมพิวเตอร์ อิเล็กทรอนิกส์ หรือเหตุบกพร่องที่สำคัญอื่น ๆ อันส่งผลต่อการนำเสนอการแข่งขันหรือการจัดงาน การเดิมพันในนัดการแข่งขันหรือการจัดงานที่ได้รับผลกระทบนั้น จะถือว่าเป็นโมฆะและผู้เดิมพันจะได้รับเบี้ยคืน </span></h3>
  <h3><strong>4.1.5.</strong><span>
   แม้ในกรณีที่ข้อมูลความคิดเห็นเกี่ยวกับนัดการแข่งขันหรือการจัดงานจะไม่ประสานอย่างทันท่วงทีกับสตรีมมิ่งวิดีโอกีฬาทางออนไลน์ การเดิมพันทั้งหมดจะยังใช้การได้อยู่</span></h3>
  <h3><strong>4.1.6.</strong><span>
   ในกรณีที่การแข่งขันหรือการจัดงานมิได้เริ่มต้น หรือไม่เสร็จสมบูรณ์ และไม่สามารถตัดสินผลลัพธ์ได้ จะถือว่านัดการแข่งขันหรือการจัดงานนั้นเป็นโมฆะ จะมีการคืนเงินอย่างสอดคล้องกับระเบียบและกติกาการเดิมพัน</span></h3>
  <h3><strong>4.1.7.</strong><span>
  การเดิมพันนัดการแข่งขัน การจัดงาน สัปดาห์ หรือฤดูกาลในอนาคตที่ได้รับการตอบรับแล้ว จะยังใช้การได้อยู่แม้ว่าสมาชิกจะออกจากการใช้งานเว็บไซต์ </span></h3>
  <h2><a name="R42" id="R42"></a>4.2. ฟุตบอลออนไลน์</h2>
  <h3><strong>4.2.1.</strong><span>
  ฟุตบอลออนไลน์ หมายถึง การเดิมพันผลลัพธ์การแข่งขันฟุตบอลซึ่งมีการออกหมายเลขโดยวิธีสุ่ม RNG จะระบุผลลัพธ์การแข่งขันหรือการจัดงาน โดยใช้ฟังก์ชั่นการให้คะแนนของระบบสำหรับแต่ละทีม มีทีมต่าง ๆ ให้เลือกจำนวนห้า (5) ประเภท ไม่ว่าจะเป็นระดับสโมสรมาตรฐานจนถึงระดับสากล แต่ละนัดจะมีทีมสอง (2) ทีมแข่งขันกัน </span></h3>
  <h3><strong>4.2.2.</strong><span>
  การแข่งขันฟุตบอลทางออนไลน์ประกอบด้วยการเดิมพันหก (6) ประเภท:</span></h3>
  <h4><span>1. 1x2 <br>
  2. คะแนนถูกต้อง<br>
  3. จำนวนรวมประตู<br>
  4. โอกาสสองต่อ<br>
  5. จำนวนประตูตํ่า/เหนือ 2.5 ประตู<br>
  6. เอเชี่ยนแฮนดิแคป</span></h4>
  <h3><strong>4.2.3.</strong><span>
  การแข่งขันหรือการจัดงานแต่ละครั้งดำเนินไปในสภาวะอากาศที่ท้องฟ้าปลอดโปร่ง เป็นเวลาประมาณหกสิบ (60) วินาที การเดิมพันพิเศษประกอบด้วยการลองประตูสี่ (4) ครั้ง ซึ่งแสดงเป็นเข้า พลาด สกัดไว้ได้</span></h3>
  <h3><strong>4.2.4.</strong><span>
  การแข่งขันหรือการจัดงานแต่ละครั้งเริ่มต้นด้วยการแนะนำ ซึ่งเป็นการแสดงรายชื่อของทั้งสอง (2) ทีม และราคาของประเภทการเดิมพันที่นำเสนอ</span></h3>
  <h3><strong>4.2.5.</strong><span>
  ไม่มีการยอมรับเดิมพันภายหลังการเตะลูกแรก การเดิมพันโดยไม่เจตนาภายหลังการเตะลูกแรกจะถือว่าเป็นโมฆะและมีการคืนเงิน</span></h3>
  <h3><strong>4.2.6.</strong><span>
  เมื่อการแข่งขันหรือการจัดงานสิ้นสุดลงแล้ว จะปรากฎบัตรแสดงผลลัพธ์การแข่งขันพร้อมแต้มคะแนนและผลการแข่งขันสำหรับการเดิมพันแต่ละประเภท</span></h3>
  <h3><strong>4.2.7.</strong><span>
  หลังจากที่แสดงผลลัพธ์ของเหตุการณ์หรือการแข่งขันแล้ว จะมีการแนะนำเหตุการณ์หรือนัดการแข่งขันรอบต่อไป ผลลัพธ์การแข่งขันหรือเหตุการณ์จะแสดงบนเว็บไซต์เป็นเวลาระยะหนึ่ง</span></h3>
    <h2><a name="R43" id="R43"></a>4.3. แข่งม้าเสมือนจริง</h2>
  <h3><strong>4.3.1.</strong><span>
  แข่งม้าออนไลน์ หมายถึง การเดิมพันผลลัพธ์เหตุการณ์หรือการแข่งม้าซึ่งมีการออกหมายเลขโดยวิธีสุ่ม</span></h3>
  <h3><strong>4.3.2.</strong><span>
  การแข่งม้าทางออนไลน์ประกอบด้วยการเดิมพันห้า (5) ประเภท:</span></h3>
    <h4><span>
    1. ม้าชนะ<br>
    2. ม้ารอง<br>
    3. ม้าชนะ/ม้ารอง<br>
    4. คาดการณ์<br>
    5. ทรัยคาสต์<br>
    </span></h4>
  <h3><strong>4.3.3.</strong><span>
  จำนวนม้าอาจแตกต่างกันในเหตุการณ์หรือการแข่งขันแต่ละเที่ยว ซึ่งจัดขึ้นในลู่วิ่งแบบราบ แบบกระโดด หรือแบบวิ่งแข่งเต็มฝีเท้า ในสภาพอากาศที่มีแดดดี มืดครึ้ม หรือตอนกลางคืน</span></h3>
  <h3><strong>4.3.4.</strong><span>
  ขึ้นอยู่กับจำนวนม้าที่ลงแข่ง คำว่า "ม้าชนะ/ม้ารอง"สำหรับการแข่งม้าทางออนไลน์ เป็นดังนี้</span></h3>
  <h4><strong>4.3.4.1.</strong><span>
  เมื่อมีม้าลงแข่งจำนวน 8-11 ตัว: 1/5 เลขคี่ที่ 1, 2, 3</span></h4>
  <h4><strong>4.3.4.2.</strong><span>
  เมื่อมีม้าลงแข่งจำนวน 12-15 ตัว: 1/4 เลขคี่ที่ 1, 2, 3</span></h4>
  <h4><strong>4.3.4.3.</strong><span>
  เมื่อมีม้าลงแข่งจำนวน 16 ตัว: 1/4 เลขคี่ที่ 1, 2, 3</span></h4>
  <h3><strong>4.3.5.</strong><span>
  งานหรือการแข่งขันแต่ละครั้งเริ่มต้นด้วยการแนะนำ ซึ่งแสดงรายการม้าทั้งหมดรวมถึงหมายเลขและราคาของแต่ละตัว</span></h3>
  <h3><strong>4.3.6.</strong><span>
  เหตุการณ์หรือการแข่งขันแต่ละครั้งจะใช้เวลาประมาณ 30 ถึง 45 วินาที</span></h3>
  <h3><strong>4.3.7.</strong><span>
  เมื่อเหตุการณ์หรือการแข่งขันสิ้นสุดลง จะมีการฉายซํ้าภาพที่ม้าเข้าเส้นชัย ตามด้วยภาพของผู้ชนะจำนวน 3 หรือ 4 ลำดับ</span></h3>
  <h3><strong>4.3.8.</strong><span>
  หลังจากที่แสดงผลลัพธ์ของเหตุการณ์หรือการแข่งขันแล้ว จะมีการแนะนำเหตุการณ์หรือการแข่งขันรอบต่อไป ผลลัพธ์ของเหตุการณ์หรือการแข่งขันจะแสดงบนเว็บไซต์เป็นเวลาระยะหนึ่ง </span></h3>
  <h2><a name="R44" id="R44"></a>4.4. แข่งเกรย์ฮาวด์ออนไลน์</h2>
  <h3><strong>4.4.1.</strong><span>
  แข่งเกรย์ฮาวด์ออนไลน์ หมายถึง การเดิมพันผลลัพธ์เหตุการณ์หรือการแข่งสุนัขเกรย์ฮาวด์ซึ่งมีการออกหมายเลขโดยวิธีสุ่ม</span></h3>
  <h3><strong>4.4.2.</strong><span>
  การแข่งเกรย์ฮาวด์ทางออนไลน์ประกอบด้วยการเดิมพันห้า (5) ประเภท:</span></h3>
    <h4><span>
    1. ม้าชนะ<br>
    2. ม้ารอง<br>
    3. ม้าชนะ/ม้ารอง<br>
    4. คาดการณ์<br>
    5. ทรัยคาสต์<br>
    </span></h4>
  <h3><strong>4.4.3.</strong><span>
  เหตุการณ์หรือการแข่งขันแต่ละเที่ยวประกอบด้วยสุนัขเกรย์ฮาวด์จำนวนหก (6) ตัว ซึ่งจัดขึ้นในลู่วิ่งแบบราบ แบบกระโดด หรือแบบวิ่งแข่งเต็มฝีเท้า ในสภาพอากาศที่มีแดดดี มืดครึ้ม หรือตอนกลางคืน</span></h3>
  <h3><strong>4.4.4.</strong><span>
  เหตุการณ์หรือการแข่งขันแต่ละครั้งเริ่มต้นด้วยการแนะนำ ซึ่งแสดงสุนัขเกรย์ฮาวด์ทั้งหมดที่ลงแข่งขัน รวมถึงหมายเลขและราคาของแต่ละตัว</span></h3>
  <h3><strong>4.4.5.</strong><span>
  เหตุการณ์หรือการแข่งขันแต่ละครั้งจะใช้เวลาประมาณ 30 ถึง 45 วินาที</span></h3>
  <h3><strong>4.4.6.</strong><span>
  เมื่อเหตุการณ์หรือการแข่งขันสิ้นสุดลง จะมีการฉายซํ้าภาพที่เกรย์ฮาวด์เข้าเส้นชัย ตามด้วยภาพของตัวที่ชนะจำนวน 3 หรือ 4 ลำดับ</span></h3>
  <h3><strong>4.4.7.</strong><span>
  หลังจากที่แสดงผลลัพธ์ของเหตุการณ์หรือการแข่งขันแล้ว จะมีการแนะนำเหตุการณ์หรือการแข่งขันรอบต่อไป ผลลัพธ์ของเหตุการณ์หรือการแข่งขันจะแสดงบนเว็บไซต์เป็นเวลาระยะหนึ่ง</span></h3>
  <h2><a name="R45" id="R45"></a>4.5. เทนนิสเสมือนจริง</h2>
  <h3><strong>4.5.1.</strong><span>
  เทนนิสออนไลน์ หมายถึง การเดิมพันผลลัพธ์เหตุการณ์หรือการแข่งเทนนิสซึ่งมีการออกหมายเลขโดยวิธีสุ่ม</span></h3>
  <h3><strong>4.5.2.</strong><span>
  เหตุการณ์หรือการแข่งขันเทนนิสแต่ละนัดประกอบด้วยผู้เล่นสอง (2) คน ซึ่งจัดขึ้นในสนามแข่งพื้นหญ้าในวันที่อากาศสดใส </span></h3>
  <h3><strong>4.5.3.</strong><span>
  การแข่งเทนนิสทางออนไลน์ประกอบด้วยการเดิมพันห้า (3) ประเภท:</span></h3>
    <h4><span>
    1. ทายผลผู้ชนะหรือทีมที่ชนะ<br>
    2. ทายผลสกอร์<br>
    3. คะแนนรวม<br> </span></h4>
  <h3><strong>4.5.4.</strong><span>
  เหตุการณ์หรือการแข่งขันแต่ละครั้งเริ่มต้นด้วยการแนะนำ โดยแสดงผู้เล่นทั้งสองคนเสื้อและธงชาติของแต่ละฝ่าย รวมถึงตัวระบุฝ่ายเสิร์ฟ และราคาของการเดิมพันแต่ละประเภท</span></h3>
  <h3><strong>4.5.5.</strong><span>
  เหตุการณ์หรือการแข่งขันแต่ละครั้งจะประกอบด้วยเกมเดี่ยวที่มีได้มากถึงสิบสอง(12)แต้ม ใช้เวลา 30 ถึง 120 วินาที</span></h3>
  <h3><strong>4.5.6.</strong><span>
  หลังจากที่แสดงผลลัพธ์ของเหตุการณ์หรือการแข่งขันแล้ว จะมีการแนะนำเหตุการณ์หรือนัดการแข่งขันรอบต่อไป ผลลัพธ์ของเหตุการณ์หรือการแข่งขันจะแสดงบนเว็บไซต์เป็นเวลาระยะหนึ่ง</span></h3> 
  <h2><a name="R46" id="R46"></a>4.6. เวอร์ชวลมอเตอร์สปอร์ต (รถยนต์): การแข่งรถเสมือนจริง</h2>
  <h3><strong>4.6.1.</strong><span>
  เวอร์ชวลมอเตอร์สปอร์ต: การแข่งรถเสมือนจริง หมายถึงการลงเดิมพันกับผลของการสุ่มหมายเลขในการแข่งรถ</span></h3>
  <h3><strong>4.6.2.</strong><span>
   มีการเดิมพันห้า (5) ประเภทสำหรับการแข่งรถเสมือนจริง คือ:</span></h3>
  <h4><span>
    1. ม้าชนะ<br>
    2. ม้ารอง<br>
    3. ม้าชนะ/ม้ารอง<br>
    4. คาดการณ์<br>
    5. ทรัยคาสต์<br>
    </span></h4>
  <h3><strong>4.6.3.</strong><span>
  มีรถแข่งสิบสอง (12) คันในแต่ละการแข่งขันจัดแข่งบนถนนรูปวงรีในช่วงเวลาที่มีแดดออก</span></h3>
  <h3><strong>4.6.4.</strong><span>
  ในแต่ละการแข่งขันจะเริ่มต้นด้วยการแนะนำรายชื่อของรถยนต์ ข้อมูลราคา เส้นทาง นาฬิกานับถอยหลัง ระยะทางในการแข่งขันและประเภทของการแข่งขัน</span></h3>
  <h3><strong>4.6.5.</strong><span>
  ในแต่ละการแข่งขันใช้เวลา 60 วินาที</span></h3>
  <h3><strong>4.6.6.</strong><span>
  เมื่อการแข่งขันเสร็จสิ้นลง จะมีการฉายภาพรถที่เข้าเส้นชัยอีกครั้ง ตามด้วยผลการแข่งขันรวมทั้งรถคันแรกที่เข้าเส้นชัย</span></h3>
  <h3><strong>4.6.7.</strong><span>
  หลังจากที่แสดงผลของการแข่งขันแล้ว จะมีการแนะนำการแข่งขันในแมชต่อไป ผลการแข่งทั้งหมดจะแสดงบนเว็บไซต์ช่วงระยะหนึ่ง</span></h3>
  <h2><a name="R47" id="R47"></a>4.7. แข่งจักรยานออนไลน์</h2>
  <h3><strong>4.7.1.</strong><span>
  แข่งจักรยานออนไลน์ หมายถึง การเดิมพันผลลัพธ์กิจกรรมการปั่นจักรยานซึ่งมีการออกหมายเลขโดยวิธีสุ่ม</span></h3>
  <h3><strong>4.7.2.</strong><span>
  การแข่งขันจักรยานทางออนไลน์ประกอบด้วยการเดิมพันห้า (5) ประเภท:</span></h3>
  <h4><span>
    1. ชนะ<br>
    2. หนึ่งหรือสอง<br>
    3. ชนะ/หนึ่งหรือสอง<br>
    4. คาดการณ์<br>
    5. คาดการณ์สาม<br>
    </span></h4>
  <h3><strong>4.7.3.</strong><span>
  ในสนามแข่งจักรยานรูปวงรีและภายใต้แสงไฟที่สว่างจ้า จะมีนักปั่นจักรยานจำนวนหกถึงเก้า (6-9) คน</span></h3>
  <h3><strong>4.7.4.</strong><span>
  การแข่งขันแต่ละครั้งจะเริ่มต้นด้วยการแนะนำโดยแสดงรายชื่อนักปั่นจักรยาน สีเสื้อทีม ข้อมูลราคา ชื่อลู่แข่ง นาฬิกาจับเวลานับถอยหลัง และระยะทางการแข่งขัน</span></h3>
  <h3><strong>4.7.5.</strong><span>
  การแข่งขันแต่ละครั้งจะใช้เวลา 45 วินาที</span></h3>
  <h3><strong>4.7.6.</strong><span>
  เมื่อการแข่งขันสิ้นสุดลง จะมีการแสดงภาพเคลื่อนไหวบนหน้าจอขณะที่นักปั่นจักรยานกำลังเข้าเส้นชัย ตามด้วยภาพนิ่งขณะเข้าเส้นชัยและบัตรผลลัพธ์ซึ่งประกอบด้วยรายชื่อของผู้เข้าเส้นชัยสาม (3) คนแรก</span></h3>
  <h3><strong>4.7.7.</strong><span>
  หลังจากที่แสดงผลลัพธ์ของการแข่งขันแล้ว จะมีการแนะนำการแข่งขันรอบต่อไป ผลลัพธ์ทั้งหมดจะแสดงบนเว็บไซต์เป็นเวลาระยะหนึ่ง</span></h3>
  <h2><a name="R48" id="R48"></a>4.8. ถนนแข่งรถออนไลน์</h2>
  <h3><strong>4.8.1.</strong><span>
  ถนนแข่งรถออนไลน์ หมายถึง การเดิมพันผลลัพธ์การแข่งรถจักรยานยนต์ซึ่งมีการออกหมายเลขโดยวิธีสุ่ม</span></h3>
  <h3><strong>4.8.2.</strong><span>
  การแข่งรถทางออนไลน์ประกอบด้วยการเดิมพันสอง (2) ประเภท:</span></h3>
  <h4><span>
    1. ชนะ<br>
    2. คาดการณ์<br>
    </span></h4>
  <h3><strong>4.8.3.</strong><span>
  การแข่งขันแต่ละครั้งจะประกอบด้วยนักขับสี่ (4) คน เป็นการแข่งขันในตอนกลางคืนหรือภายใต้แสงไฟที่สว่างจ้า บนทางเรียบของสนามแข่งรูปวงรี</span></h3>
  <h3><strong>4.8.4.</strong><span>
  การแข่งขันแต่ละครั้งจะเริ่มต้นด้วยการแนะนำโดยแสดงรายชื่อนักขับ ข้อมูลราคา ชื่อลู่แข่ง นาฬิกาจับเวลานับถอยหลัง และระยะทางการแข่งขัน</span></h3>
  <h3><strong>4.8.5.</strong><span>
  การแข่งขันแต่ละครั้งจะใช้เวลา 30 วินาที</span></h3>
  <h3><strong>4.8.6.</strong><span>
  เมื่อการแข่งขันสิ้นสุดลง จะมีการแสดงภาพเคลื่อนไหวบนหน้าจอขณะที่นักขับกำลังเข้าเส้นชัย ตามด้วยภาพนิ่งขณะเข้าเส้นชัยและผลลัพธ์ซึ่งประกอบด้วยรายชื่อของผู้เข้าเส้นชัยสาม (3) คนแรก</span></h3>
  <h3><strong>4.8.7.</strong><span>
  หลังจากที่แสดงผลลัพธ์ของการแข่งขันแล้ว จะมีการแนะนำการแข่งขันรอบต่อไป ผลลัพธ์ทั้งหมดจะแสดงบนเว็บไซต์เป็นเวลาระยะหนึ่ง</span></h3>  
  <div id="Div4" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>

<h1><a name="R5" id="R5"></a>5.  คีโน (Keno) กฎ</h1>

<h2><strong>5.1.</strong><span> คีโน (Keno)</span></h2>

<h3><strong>5.1.1.</strong><span> การเล่นคีโนประกอบด้วยการสุ่มเลือกลูกบอลจำนวน 20 ลูกจากทั้งหมด 80 ลูก ซึ่งแต่ละลูกมีหมายเลขกำกับ (01 ถึง 80) ผลรวมตัวเลขทั้ง 20 จำนวนนี้จะถูกแบ่งและแยกออกเป็นหลากหลายรูปแบบและหลากหลายประเภทของการเดิมพัน การเดิมพันแต่ละประเภทมีการคำนวณและอัตราค่าตอบแทนที่แตกต่างกัน </span></h3>

<h3><strong>5.1.2.</strong><span> ประเภทการเดิมพัน</span></h3>
<h4><strong>5.1.2.1.</strong><span> การเดิมพันประเภทต่าง ๆ มีดังต่อไปนี้</span></h4>

<h5><strong>(A)</strong><span>	ใหญ่/เล็ก</span></h5>

<h5><strong>(B)</strong><span>	คี่/คู่</span></h5>

<h5><strong>(C)</strong><span>	มังกร/เสมอ/เสือ</span></h5>

<h5><strong>(D)</strong><span>	ขึ้น/เสมอ/ลง</span></h5>

<h5><strong>(E)</strong><span>	คี่ใหญ่/คี่เล็ก/เสมอใหญ่/เสมอเล็ก และ</span></h5>

<h5><strong>(F)</strong><span>	องค์ประกอบทั้งห้า (5) (ทอง/ไม้/นํ้า/ไฟ/ดิน)</span></h5>

<h4><strong>5.1.2.2.</strong><span> ผลลัพธ์จะอ้างอิงจากผลคีโนอย่างเป็นทางการของแคนาดา แคนาดาตะวันตก รัฐโอไฮโอ รัฐแมสซาชูเซตส์ มอลตา ออสเตรเลีย สโลวาเกีย มิชิแกน เคนทักกี และเกาหลี ช่วงเวลาของผลลัพธ์อย่างเป็นทางการจะเหมือนกันทุกอย่างกับแต่ละภูมิภาคที่ดึงข้อมูลการเดิมพันมา</span></h4>
<h4><strong>5.1.2.3.</strong><span> บริษัทฯ ขอสงวนสิทธิ์ในการยกเลิกหรือทำให้เป็นโมฆะ เมื่อการจับฉลากขัดข้องและไม่สามารถแสดงผลลัพธ์อย่างเป็นทางการได้เป็นระยะเวลานานเกินปกติ</span></h4>
<h4><strong>5.1.2.4.</strong><span> บริษัทฯ ขอสงวนสิทธิ์ในการยกเลิกหรือทำให้เป็นโมฆะ เมื่อมีการตีพิมพ์ผลลัพธ์อย่างเป็นทางการก่อนที่ระบบจะปิดการเดิมพัน</span></h4>
<h3><strong>5.1.3.</strong><span>	ใหญ่/เล็ก </span></h3>
<h4>บริษัทฯ จะเสนอความเป็นต่อในผลรวมของตัวเลขของลูกบอล 20 ลูกที่ดึงออกมาว่า "ใหญ่" หรือ "เล็ก"</h4>
<h4>ใหญ่ – ผลรวมของลูกบอลที่จับได้ทั้ง 20 ลูกมีมากกว่าหรือเท่ากับ 811</h4>
<h4>เล็ก – ผลรวมของลูกบอลที่จับได้ทั้ง 20 ลูกมีน้อยกว่าหรือเท่ากับ 810</h4>
<h4>ตัวอย่าง  จับลูกบอลได้หมายเลข 69, 42, 37, 8, 68, 74, 45, 71, 64, 16, 17, 19, 41, 39, 23, 61, 70, 51, 36 และ 72 ผลรวมของตัวเลขทั้งหมดคือ 923 923 มีค่ามากกว่าหรือเท่ากับ 811 ดังนั้นการเดิมพัน "ใหญ่" จึงชนะ</h4>
<h4><img src="img/Rules_Keno_01.jpg"></h4>

<h3><strong>5.1.4.</strong><span>	คี่/คู่ </span></h3>

<h4>บริษัทฯ จะเสนอความเป็นต่อในผลรวมของตัวเลขของลูกบอล 20 ลูกที่ดึงออกมาว่า "คี่" หรือ "คู่"</h4>

<h4>คี่ – ผลรวมของลูกบอล 20 ลูกที่จับได้ พิจารณาว่าเป็นเลขคี่</h4>

<h4>คู่ – ผลรวมของลูกบอล 20 ลูกที่จับได้ พิจารณาว่าเป็นเลขคู่</h4>

<h4>ตัวอย่าง  จับลูกบอลได้หมายเลข 69, 42, 37, 8, 68, 74, 45, 71, 64, 16, 17, 19, 41, 39, 23, 61, 70, 51, 36 และ 72 ผลรวมของตัวเลขทั้งหมดคือ 923 ซึ่ง 923 เป็นเลขคี่ ดังนั้นการเดิมพัน "คี่" จึงชนะ</h4>
<h4><img src="img/Rules_Keno_02.jpg"></h4>


<h3><strong>5.1.5.</strong><span>	มังกร/เสมอ/เสือ </span></h3>

<h4>บริษัทจะเสนอความเป็นต่อในผลรวมของลูกบอล 20 ลูกที่จับได้ว่าเป็น "มังกร" "เสมอ" และ "เสือ" จำนวนที่มากกว่าระหว่างมังกร (สิบ) หรือเสือ (หน่วย) จะเป็นตัวกำหนดผู้ชนะ ถ้ามังกรและเสือเท่ากัน เสมอชนะ</h4>
<h4>มังกร - ตัวเลขซึ่งอยู่ที่จุดสิบ (เลขท้ายสองตัว) ของผลรวมตัวเลขลูกบอล 20 ลูก</h4>
<h4>เสือ - ตัวเลขซึ่งอยู่ที่จุดหน่วย (เลขท้าย) ของผลรวมตัวเลขลูกบอล 20 ลูก</h4>
<h4>เสมอ – ถ้ามังกรและเสือเท่ากัน...</h4>
<h4>ตัวอย่าง จับลูกบอลได้หมายเลข 69, 42, 37, 8, 68, 74, 45, 71, 64, 16, 17, 19, 41, 39, 23, 61, 70, 51, 36 และ 72 ผลรวมของตัวเลขทั้งหมดคือ 923 ในการพิจารณาผู้ชนะ มังกร (สิบ) หรือเสือ (หน่วย) ที่มีตัวเลขสูงสุดคือผู้ชนะ มังกร (สิบ) คือ "2" ส่วนเสือ (หน่วย) คือ "3" ดังนั้น "3" มีค่ามากกว่า "2" และการเดิมพัน "เสือ" จึงชนะ</h4>
<h4>ถ้ามีการเสมอ การเดิมพัน "เสมอ" จะชนะ แต่จะมีการคืนจำนวนการเดิมพันทั้งหมดที่มังกรหรือเสือ</h4>
<h4>เงินรางวัลการชนะคือ 1.95 "ชนะ" และ 9 ในกรณี "เสมอ" (รวมจำนวนการเดิมพัน)</h4>
<h4><img src="img/Rules_Keno_03.jpg"></h4>
 
<h3><strong>5.1.6.</strong><span>	ขึ้น/เสมอ/ลง</span></h3>
<h4>บริษัทฯ จะเสนอความเป็นต่อในผลรวมของตัวเลขของลูกบอล 20 ลูกที่ดึงออกมาว่า "ขึ้น" "เสมอ" หรือ "ลง"</h4>
<h4>ขึ้น - มีตัวเลขมากกว่าสิบตัวซึ่งอยู่ระหว่าง 01 - 40 จากลูกบอล 20 ลูกที่จับได้ </h4>
<h4>เสมอ - มีตัวเลขจำนวนสิบตัวพอดีซึ่งอยู่ระหว่าง 01 - 40 และอีกสิบตัวระหว่าง 41 – 80 จากลูกบอล 20 ลูกที่จับได้</h4>
<h4>ลง - มีตัวเลขมากกว่าสิบตัวซึ่งอยู่ระหว่าง 41 - 80 จากลูกบอล 20 ลูกที่จับได้</h4>
<h4>ตัวอย่าง  จับได้ลูกบอลหมายเลข 69, 42, 37, 8, 68, 74, 45, 71, 64, 16, 17, 19, 41, 39, 23, 61, 70, 51, 36 และ 72 และมีเลข 8 ตัว (8 ,16 ,17 ,19 ,23 ,36 ,37 ,39) ที่อยู่ระหว่าง 01 – 40 และ 12 ตัว (41 ,42 ,45 ,51 ,61 ,64 ,68 ,69 ,70 ,71 ,72 ,74) ระหว่าง 41 - 80 ดังนั้น การเดิมพัน "ลง" จึงชนะ</h4>
<h4><img src="img/Rules_Keno_04.jpg"></h4>

<h3><strong>5.1.7.</strong><span>	คี่ใหญ่/คี่เล็ก/เสมอใหญ่/เสมอเล็ก </span></h3>
<h4>บริษัทฯ จะเสนอความเป็นต่อในผลรวมของตัวเลขของลูกบอล 20 ลูกที่ดึงออกมาว่า "คี่ใหญ่" "คี่เล็ก" "เสมอใหญ่" และ "เสมอเล็ก"</h4>
<h4>คี่ใหญ่ - ผลรวมลูกบอล 20 ลูกที่จับได้มีค่ามากกว่าหรือเท่ากับ 811 และเลขท้ายของจำนวนรวมเป็นเลขคี่</h4>
<h4>คี่เล็ก - ผลรวมลูกบอล 20 ลูกที่จับได้มีค่าน้อยกว่าหรือเท่ากับ 810 และเลขท้ายของจำนวนรวมเป็นเลขคี่ </h4>
<h4>คู่ใหญ่ - ผลรวมลูกบอล 20 ลูกที่จับได้มีค่ามากกว่าหรือเท่ากับ 811 และเลขท้ายของจำนวนรวมเป็นเลขคู่ </h4>
<h4>คู่เล็ก - ผลรวมลูกบอล 20 ลูกที่จับได้มีค่าน้อยกว่าหรือเท่ากับ 810 และเลขท้ายของจำนวนรวมเป็นเลขคู่ </h4>
<h4>ตัวอย่าง จับลูกบอลได้หมายเลข 69, 42, 37, 8, 68, 74, 45, 71, 64, 16, 17, 19, 41, 39, 23, 61, 70, 51, 36 และ 72 ผลรวมของตัวเลขทั้งหมดคือ 923 ซึ่ง 923 มีค่ามากกว่า 811 และเป็นเลขคี่ ดังนั้นการเดิมพัน "คี่ใหญ่" จึงชนะ</h4>
<h4><img src="img/Rules_Keno_05.jpg"></h4>


<h3><strong>5.1.8.</strong><span>	องค์ประกอบทั้งห้า (5) (ทอง/ไม้/นํ้า/ไฟ/ดิน) </span></h3>
<h4>บริษัทฯ จะเสนอความเป็นต่อในผลรวมของตัวเลขของลูกบอล 20 ลูกที่ดึงออกมาว่า "ทอง" "ไม้" "นํ้า" "ไฟ" และ "ดิน"</h4>
<h4>ทอง - ผลรวมลูกบอล 20 ลูกที่จับได้มีค่าระหว่าง 210-695</h4>
<h4>ไม้ - ผลรวมลูกบอล 20 ลูกที่จับได้มีค่าระหว่าง 696-763 </h4>
<h4>นํ้า - ผลรวมลูกบอล 20 ลูกที่จับได้มีค่าระหว่าง 764-855 </h4>
<h4>ไฟ - ผลรวมลูกบอล 20 ลูกที่จับได้มีค่าระหว่าง 856-923</h4>
<h4>ดิน - ผลรวมลูกบอล 20 ลูกที่จับได้มีค่าระหว่าง 924-1410</h4>
<h4>ตัวอย่าง จับลูกบอลได้หมายเลข 69, 42, 37, 8, 68, 74, 45, 71, 64, 16, 17, 19, 41, 39, 23, 61, 70, 51, 36 และ 72 ผลรวมของตัวเลขทั้งหมดคือ 923 923 อยู่ในระหว่างจำนวน 856 - 923 ดังนั้นการเดิมพัน "ไฟ" จึงชนะ</h4>
<h4><img src="img/Rules_Keno_06.jpg"></h4>
 
<div id="Div5" align="right"><a href="#top" class="button"><span>ด้านบนสุด</span></a></div>

  <!-- END Virtual Sports Rules -->
  
</div>
</div>
</body>
</html>