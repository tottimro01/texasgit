<? 	
$sc_lang= array(1 =>  "กำลังแข่งขัน","จบการแข่งขัน","ยกเลิกคืนเงิน"); 
$ab_status= array(1 =>"สำเร็จ", "<span class='cr'>ผิดพลาด</span>", "รอ"); 
$ab_bet= array(0 =>"สำเร็จ", "รอ", "<span class='cr'>ยกเลิก</span>"); 
$ab_type= array(1 =>"ฝาก", "ถอน"); 
$man_type= array(0 =>"เงินสด", "เครดิต"); 
$active_bet= array(0 => "<span class='cr'>ระงับ</span>","ปกติ"); 

$sport_man = array(
1 =>"FT.HDC[บ้าน]", 2 =>"FT.HDC[เยือน]", 3 =>"FT.GOAL[สูง]", 4 =>"FT.GOAL[ต่ำ]"
, 5 =>"FT.1X2[บ้านชนะ]", 6 =>"FT.1X2[เสมอ]", 7 =>"FT.1X2[เยือนชนะ]",8 =>"FT.ODD[คี่]", 9=>"FT.EVEN[คู่]"
,11 =>"1H.HDC[บ้าน]", 12 =>"1H.HDC[เยือน]", 13 =>"1H.GOAL[สูง]", 14 =>"1H.GOAL[ต่ำ]"
, 15 =>"1H.1X2[บ้านชนะ]", 16 =>"1H.1X2[เสมอ]", 17 =>"1H.1X2[เยือนชนะ]",18 =>"1H.ODD[คี่]", 19=>"1H.EVEN[คู่]"
);

$sport_zone = array(1 =>"ก่อนเวลา", 2 =>"สด");

$ball_billb= array(1 =>"ชนะ","คืนทุน", "แพ้", "ยกเลิก", "รอผล"); 
$ball_playb= array(1 =>$ball_billb[1],"ได้ครึ่ง",$ball_billb[2], $ball_billb[3], "เสียครึ่ง", $ball_billb[4], $ball_billb[5]); 

$ball_bill= array(1 =>"<span class='cg'>".$ball_billb[1]."</span>","<span class='cbu'>".$ball_billb[2]."</span>", "<span class='cr'>".$ball_billb[3]."</span>", "<span class='cr'>".$ball_billb[4]."</span>", "<span class='cb'>".$ball_billb[5]."</span>"); 
$ball_play= array(1 =>"<span class='cg'>".$ball_billb[1]."</span>","<span class='cg'>".$ball_playb[2]."</span>","<span class='cbu'>".$ball_billb[2]."</span>", "<span class='cr'>".$ball_billb[3]."</span>", "<span class='cr'>".$ball_playb[5]."</span>", "<span class='cr'>".$ball_billb[4]."</span>", "<span class='cb'>".$ball_billb[5]."</span>"); 

$pay_mentr= array(1 =>"ฝาก","ถอน", "โอน", "ยกมา", "คงเหลือ"); 

$x_level= array(1 => "ซุปเปอร์","ซีเนียร์", "มาสเตอร์","เอเย่น","เมมเบอร์"); 
$n_news= array(1 => "สาธารณะ","สำคัญ"); 
$m_active= array(0 =>"<span class='red'>ระงับ</span>" ,"เปิดใช้งาน"); 
$sport_mix = array(1 =>"คู่เดียว", 2 =>"หลายคู่");
$ab_bank= array(1=>"กสิกรไทย","ไทยพาณิชย์","กรุงเทพ","กรุงไทย","ทหารไทย","กรุงศรีอยุธยา"); 
$n_date= array("Mon"=>"จันทร์","Tue"=>"อังคาร","Wed"=>"พุธ","Thu"=>"พฤหัสบดี","Fri"=>"ศุกร์","Sat"=>"เสาร์","Sun"=>"อาทิตย์"); 

$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย", 24 =>"2โต๊ดบน");

$lang_menu = array(1 =>"มวยไทย", 2 =>"รถแข่ง", 3 =>"เรือแข่ง", 4 =>"ไก่ชน", 5 =>"ม้าแข่ง", 6 =>"ฟุตบอล", 7 =>"บาสเกตบอล", 8 =>"วอลเลย์บอล", 9 =>"แบดมินตัน", 10 =>"เทนนิส");
/*
$lang_menu[1]="ฟุตบอล";
$lang_menu[2]="มวยไทย";
$lang_menu[3]="บาสเกตบอล";
$lang_menu[4]="อเมริกันฟุตบอล";
$lang_menu[5]="เบสบอล";
$lang_menu[6]="ฮอกกี้";
$lang_menu[7]="เทนนิส";
$lang_menu[8]="วอลเลย์บอล";
$lang_menu[9]="แบดมินตัน";
$lang_menu[10]="สนุกเกอร์";
*/

$sport_type = array(1 =>$lang_menu[1], 2 =>$lang_menu[2], 3 =>$lang_menu[3], 4 =>$lang_menu[4], 5 =>$lang_menu[5], 6 =>$lang_menu[6], 7 =>$lang_menu[7], 8 =>$lang_menu[8], 9 =>$lang_menu[9], 10 =>$lang_menu[10]);

$lang_menu[99]="รวมกีฬา";
$lang_menu[100]="เมนูกีฬา";
$lang_menu[101]="ล่วงหน้า";
$lang_menu[102]="วันนี้";
$lang_menu[103]="สด";

$lang_menu[104]="ราคาต่อรอง & สูงต่ำ";
$lang_menu[105]="มิกซ์พาเลย์";
$lang_menu[106]="คี่ / คู่";
$lang_menu[107]="ราคาพูล 1x2";
$lang_menu[108]="บอลชุด";

$lang_menu[109]="ขณะนี้อยู่ระหว่างการทดสอบระบบ";
$lang_menu[110]='"มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"';

$lang_menu[111]="รอการเดิมพัน";
$lang_menu[112]="เดิมพันล่าสุด";
$lang_menu[113]="รายการโปรด";

$lang_menu[114]="ชื่อใช้งาน";
$lang_menu[115]="เครดิตคงเหลือ";
$lang_menu[116]="รายการเล่นค้าง";
$lang_menu[117]="เครดิตที่ได้รับ";


$lang_top[1] = $lang_menu[6];
$lang_top[2] = "หวย";
$lang_top[3] = "เกมส์";
$lang_top[4] = "คาสิโน";
$lang_top[5] = "ฝาก-ถอน";
$m_news= array(1=>$lang_menu[6],$lang_top[2],$lang_top[3],$lang_top[4]); 


$lang_top[10] = "ตั้งค่าตัวเลือก";
$lang_top[11] = "กฎและกติกา";
$lang_top[12] = "รายการเล่น";
$lang_top[13] = "งบดุล";
$lang_top[14] = "เปลี่ยนรหัสผ่าน";
$lang_top[15] = "ออกจากระบบ";
$lang_top[16]="แปลงเลข";
$lang_top[17]="หวยหุ้น";

$lang_m[1] = "ผลการแข่งขัน";
$lang_m[2] = "เลือกลีก";
$lang_m[3] = "ปิด";
$lang_m[4] = "เลือกทั้งหมด";
$lang_m[5] = "แถวเดี่ยว";
$lang_m[6] = "แถวคู่";
$lang_m[7] = "เต็มเวลา";
$lang_m[8] = "ครึ่งแรก";
$lang_m[9] = "เวลา";
$lang_m[10] = "รายการ";
$lang_m[11] = "แต้มต่อ";
$lang_m[12] = "ประตู";
$lang_m[13] = "แทงด่วน";
$lang_m[14] = "รายการแทง";
$lang_m[15] = "รวม";
$lang_m[16] = "เดิมพัน";
$lang_m[17] = "ยกเลิก";
$lang_m[18] = "คั่นตัวเลขด้วย + และ กดส่งเดิมพัน F9";
$lang_m[19] = "วงเงินจ่ายสูงสุด";
$lang_m[20] = "วงเงินเดิมพัน";
$lang_m[21] = "สำเร็จ";
$lang_m[22] = "รอ";

$lang_m[23] = "วันที่";
$lang_m[24] = "ค้นหา";
$lang_m[25] = "กีฬา";
$lang_m[26] = "เรียง";
$lang_m[27] = "สถานะ";
$lang_m[28] = "ตามลีก";
$lang_m[29] = "ตามเวลา";

$lang_m[30] = "เจ้าบ้าน";
$lang_m[31] = "ทีมเยือน";
$lang_m[32] = "สูง";
$lang_m[33] = "ต่ำ";
$lang_m[34] = "เจ้าบ้านชนะ";
$lang_m[35] = "เสมอ";
$lang_m[36] = "ทีมเยือนชนะ";
$lang_m[37] = "คี่";
$lang_m[38] = "คู่";
$lang_m[39] = "รหัส";

$lang_m[40] = "รอบ";
$lang_m[41] = "พิมพ์ผลแข่งขัน";
$lang_m[42] = "พิมพ์ตาราง";
$lang_m[43] = "แสดงราคา";
$lang_m[44] = "ปป";
$lang_m[45] = "เจ้าบ้านชนะ";
$lang_m[46] = "เสมอ";
$lang_m[47] = "ทีมเยือนชนะ";
$lang_m[48] = "จ่าย";
$lang_m[49] = "อัตราจ่าย";
$lang_m[50] = "เดิมพันสูงสุดต่อคู่";
$lang_m[51] = "พิมพ์ทั้งหมด";
$lang_m[52] = "สเต็ป";
$lang_m[53] = "ยอดเข้าเต็ม";
$lang_m[54] = "รหัสบิล";
$lang_m[55] = "เดิมพันสูงสุดต่อคู่";
$lang_m[56] = "เดิมพันสูงสุดต่อคู่";
$lang_m[57] = "เดิมพันสูงสุดต่อคู่";
$lang_m[58] = "เดิมพันสูงสุดต่อคู่";
$lang_m[59] = "เดิมพันสูงสุดต่อคู่";



###########################################BET

    $lang_b[1] = "กรุณากรอกยอดเล่น";
	$lang_b[2] = "ยืนยันการแทง";
	$lang_b[3] = "บันทึกข้อมูลสำเร็จ";
	$lang_b[4] = "เดิมพันขั้นต่ำ";
    $lang_b[5] = "เดิมพันไม่เกิน";
	$lang_b[6] = "ยอดเงินไม่พอ";
	$lang_b[7] = "ไม่สำเร็จ !!!";
	
	
	$lang_x[1] = "บันทึก";
	$lang_x[2] = "ยกเลิก";
	$lang_x[3] = "รหัสผ่านปัจจุบัน";
	$lang_x[4] = "รหัสผ่านใหม่";
	$lang_x[5] = "ยืนยันรหัสผ่าน";
	$lang_x[6] = "บันทึกสำเร็จ";
	$lang_x[7] = "รหัสผ่านปัจจุบัน ไม่ถูกต้อง";
	$lang_x[8] = "ยืนยันรหัสผ่าน ไม่ตรงกัน";
	$lang_x[9] = "บันทึก";
	
	$lang_x[10] = "ข้อมูล";
	$lang_x[11] = "ยอดเดิมพัน";
	$lang_x[12] = "ราคาน้ำ";
	$lang_x[13] = "รวม";
	$lang_x[14] = "ยอดรวม";
	$lang_x[15] = "ส่วนลด";
	$lang_x[16] = "กลับ";
	$lang_x[17] = "ยอดยกมา";
	$lang_x[18] = "ยอดคงเหลือ";
	$lang_x[19] = "สัปดาห์นี้";
		$lang_x[20] = "สัปดาห์ก่อน";
	$lang_x[21] = "ผู้ดำเนินการ";
	$lang_x[22] = "จำนวนเงิน";
	$lang_x[23] = "หมายเหตุ";
	$lang_x[24] = "รายละเอียด";
	$lang_x[25] = "เลือก";
	$lang_x[26] = "สกอร์";
	$lang_x[27] = "ภาษา";
	$lang_x[28] = "ชนิดราคาต่อรอง";
	$lang_x[29] = "ชนิดหน้า";
	
	################LOTTO
	$lang_lot[1] = "กลับ";
	$lang_lot[2] = "คัดลอก";
	$lang_lot[3] = "บันทึก";
	$lang_lot[4] = "ล้าง";
	$lang_lot[5] = "ค้นหา";
	$lang_lot[6] = "พิมพ์รายการ";
	$lang_lot[7] = "ขั้นต่ำ";
	$lang_lot[8] = "สูงสุด";
	$lang_lot[9] = "เลข";
	
	$lang_lot[10] = "3 ตัวบน";
	$lang_lot[11] = "3 ตัวโต๊ด";
	
	$lang_lot[12] = "3 ตัวล่าง";
    $lang_lot[13] = "2 ตัวบน";
    $lang_lot[14] = "2 ตัวล่าง";
    $lang_lot[15] = "หน้าบน";
    $lang_lot[16] = "หน้าโต๊ด";
    $lang_lot[17] = "วิ่งบน";
    $lang_lot[18] = "วิ่งล่าง";
	
	$lang_lot[19] = "ปิดเดิมพัน";
	$lang_lot[20] = "วันที่-เวลา";
	//เมนูหวย
	$lang_lot[21] = "3 ตัว บน-ล่าง";
	$lang_lot[22] = "ตัวหน้าบน";
	$lang_lot[23] = "2ตัว บน-ล่าง";
	$lang_lot[24] = "เลขวิ่ง";
	$lang_lot[25] = "เลขเต็ม";
	$lang_lot[26] = "รายการเล่น";
	$lang_lot[27] = "ผลรางวัล";
	$lang_lot[28] = "ลำดับ";
	$lang_lot[29] = "ประเภท";
	$lang_lot[30] = "แสดง 15 รายการล่าสุดเท่านั้น";
	$lang_lot[31] = "รายการทั้งหมด";
	$lang_lot[32] = "ไฟล์รูป";
	$lang_lot[33] = "BetID";
	$lang_lot[34] = "ดูรูป";
	$lang_lot[35] = "พิมพ์รายการเล่น";
	$lang_lot[36] = "ข้อมูลไม่ถูกต้อง";
	$lang_lot[37] = "กรุณากรอกข้อมูลให้ครบ";
	$lang_lot[38] = "ข่าวสาร";
	$lang_lot[39] = "ทั้งหมด";
	$lang_lot[40] = "เลขเต็ม";
	$lang_lot[41] = "คงเหลือ";
	$lang_lot[42] = "แบบพิเศษ";
	$lang_lot[43] = "บน";
	$lang_lot[44] = "ล่าง";
	$lang_lot[45] = "3ล่าง";
	$lang_lot[46] = "สูง";
	$lang_lot[47] = "ต่ำ";
	$lang_lot[48] = "คี่";
	$lang_lot[49] = "คู่";
	$lang_lot[50] = "3หน้าล่าง";
	$lang_lot[51] = "เลขบิล";
	$lang_lot[52] = "ถูกรางวัล";
	$lang_lot[53] = "2 ตัวโต๊ดบน";
	$lang_lot[54] = "จำกัดเลข";
	
$lang_lot[55] = "2 ตัว";
$lang_lot[56] = "2ตัวแบบตัว";
$lang_lot[57] = "3ตัวแบบตัว";


$lang_lot[58] = "แทงด่วน";
$lang_lot[59] = "เลขปักหลัก";
$lang_lot[60] = "6 กลับกดปุ่ม +";
$lang_lot[61] = "แทง 100 รายการ";
$lang_lot[62] = "ประเภทที่สามารถแทงได้";
$lang_lot[63] = "โต๊ด";
$lang_lot[64] = "กลับ";
$lang_lot[65] = "รายการล่าสุดเท่านั้น";
$lang_lot[66] = "ลูกค้า";
$lang_lot[67] = "ใบโพย";
$lang_lot[68] = "ประวัติเลขแทงไม่เข้า";
$lang_lot[69] = "คลิก";
$lang_lot[70] = "แทงเลขนี้";
$lang_lot[71] = "ยอดรวมสำเร็จ";
$lang_lot[72] = "บาท";
$lang_lot[73] = "พิมพ์สลิป";
$lang_lot[74] = "รางวัล";
$lang_lot[75] = "ยอมรับอัตรานี้";
$lang_lot[76] = "6 กลับหน้า";
$lang_lot[77] = "แสดง";
$lang_lot[78] = "แสดงตามลำดับ";
$lang_lot[79] = "แสดงตามยอด";
$lang_lot[80] = "แสดงตามเลข";
$lang_lot[81] = "แสดงแบบตัว";
$lang_lot[82] = "แทง 20 รายการ";
$lang_lot[83] = "สร้างเลข";
$lang_lot[84] = "1ตัว";
$lang_lot[85] = "ยอดซื้อ";
$lang_lot[86] = "เหมือนเดิม";
$lang_lot[87] = "แถว";
$lang_lot[88] = "หน้า";
$lang_lot[89] = "หลักหน่วย";
$lang_lot[90] = "หลักสิบ";
$lang_lot[91] = "หลักร้อย";
$lang_lot[92] = "เต็ง";
$lang_lot[93] = "กลับบน";
$lang_lot[94] = "กลับล่าง";
$lang_lot[95] = "เลขพี่น้อง";
$lang_lot[96] = "เลขเบิ้ล";
$lang_lot[97] = "1ตัวบน";
$lang_lot[98] = "1ตัวล่าง";
$lang_lot[99] = "1ตัวปักหลัก 1";
$lang_lot[100] = "1ตัวปักหลัก 2";
$lang_lot[101] = "1ตัวปักหลัก 3";
$lang_lot[102] = "3ตัว บน-โต๊ด";
$lang_lot[103] = "ตัว";
$lang_lot[104] = "สรุป";
$lang_lot[105] = "19หาง";
$lang_lot[106] = "เหลือแทง";
$lang_lot[107] = "ครั้ง";
$lang_lot[108] = "รอ";
$lang_lot[109] = "นาที";
$lang_lot[110] = "ติดต่อผู้ดูแล";
$lang_lot[111] = "กรุณาเลือกรายการ";
$lang_lot[112] = "ขั้นที่";
$lang_lot[113] = "จำนวน";
$lang_lot[114] = "รวมเงิน";
$lang_lot[115] = "ยอด";
$lang_lot[116] = "พิเศษ";
$lang_lot[117] = "2ตัวบน-ล่าง";
$lang_lot[118] = "หวยไทย";
$lang_lot[119] = "งวด";
$lang_lot[120] = "สาขา";
$lang_lot[121] = "ผู้ขาย";
$lang_lot[122] = "ชื่อ";
$lang_lot[123] = "โพยที่";


######################ฝาก ถอน
$lang_tf[1] = "*กรุณารอ แจ้งได้ทีละครั้ง !";
$lang_tf[2] = "*เครดิตน้อยกว่า จำนวนเงิน ที่ถอน";
$lang_tf[3] = "*ถอนขั้นต่ำ 100 บาท";
$lang_tf[4] = "ฝากเงิน";
$lang_tf[5] = "ถอนเงิน";
$lang_tf[6] = "แจ้ง โอนเงิน";
$lang_tf[7] = "แจ้ง ถอนเงิน";
$lang_tf[8] = "ยอดเงิน";
$lang_tf[9] = "ธนาคาร";
$lang_tf[10] = "วัน/เวลา โอนเงิน";
$lang_tf[11] = "วัน/เวลา บันทึก";
$lang_tf[12] = "ธนาคาร ผู้ถอน";
$lang_tf[13] = "เลขบัญชี ผู้ถอน";
$lang_tf[14] = "รหัสถอน 4 หลัก";
$lang_tf[15] = "ฝากเข้าธนาคาร";
$lang_tf[16] = "ฝากเข้าเลขที่บัญชี ลงท้าย 4 ตัว";
$lang_tf[17] = "บันทึก";
$lang_tf[18] = "BetID";
$lang_tf[19] = "BetID";
$lang_tf[20] = "BetID";

	####################Games
$lang_g[1] = "กำลังซ่อมบำรุง";
$lang_g[2] = "กำลังซ่อมบำรุง";
$lang_g[3] = "กำลังซ่อมบำรุง";
$lang_g[4] = "กำลังซ่อมบำรุง";
$lang_g[5] = "กำลังซ่อมบำรุง";
$lang_g[6] = "กำลังซ่อมบำรุง";
$lang_g[7] = "กำลังซ่อมบำรุง";
$lang_g[8] = "กำลังซ่อมบำรุง";
$lang_g[9] = "กำลังซ่อมบำรุง";
$lang_g[10] = "กำลังซ่อมบำรุง";

$lang_g['lotZone'][1] = "หวยไทย";
$lang_g['lotZone'][2] = "หวยหุ้นไทย";
$lang_g['lotZone'][3] = "หวยลาว";
$lang_g['lotZone'][4] = "หวยมาเลเซีย";
$lang_g['lotZone'][5] = "หวยเวียดนาม";
$lang_g['lotZone'][6] = "หุ้นนิเคอิ";
$lang_g['lotZone'][7] = "หุ้นฮั่งเส็ง";
$lang_g['lotZone'][8] = "หุ้นดาวโจนส์";
$lang_g['lotZone'][9] = "หุ้นสิงคโปร์";
$lang_g['lotZone'][10] = "หุ้นอียิปต์";
$lang_g['lotZone'][11] = "หุ้นรัสเซีย";
$lang_g['lotZone'][12] = "หุ้นเยอรมัน";
$lang_g['lotZone'][13] = "หุ้นอังกฤษ";
$lang_g['lotZone'][14] = "หุ้นเกาหลี";
$lang_g['lotZone'][15] = "หุ้นใต้หวัน";
$lang_g['lotZone'][16] = "หุ้นจีน";
$lang_g['lotZone'][17] = "หุ้นอินเดีย";
$lang_g['lotZone'][18] = "จับยี่กี";
$lang_g['lotZone'][19] = "หวยรายวัน";

$lang_g['_lotZone'][3] = "หวยหุ้นต่างประเทศ";
$lang_g['_rob']        = "รอบที่";

$lang_g['lottype'][1] = "หวยไทย";
$lang_g['getZone'][1] = "แทงหวย";

$lang_g['sendAlert_sl'][0] = "อุปกรณ์ทั้งหมด";
$lang_g['sendAlert_sl'][1] = "อุปกรณ์ IOS";
$lang_g['sendAlert_sl'][2] = "อุปกรณ์ Andorid";

$lang_g['sendAlert'][1] = "ส่งผลรางวัล";
$lang_g['sendAlert'][2] = "ส่งเลขเต็ม";
$lang_g['sendAlert'][3] = "ส่งข่าวสาร";

$lang_fn_g['month'] = "เดือน";
$lang_fn_g['BE'] = "พ.ศ.";

$lang_g['lotrob'][1] = "เช้า";
$lang_g['lotrob'][2] = "เที่ยง";
$lang_g['lotrob'][3] = "บ่าย";
$lang_g['lotrob'][4] = "เย็น";

$pay_mentr= array(1 =>"ฝาก","ถอน", "โอน", "ยกมา", "คงเหลือ", "แก้ไข");

$lang_g['Msg'][1]   = "กำลังอยู่ในการ ซ่อมบำรุง ประมาน 45 นาที";
$lang_g['Msg'][2]   = "ปิดรับพนัน";
$lang_g['Msg'][3]   = "E1-คุณถูกระงับการใช้งานกรุณาติดต่อผู้ดูแล";
$lang_g['Msg'][4]   = "เกิดข้อผิดพลาดที่ไม่รู้จัก";
$lang_g['Msg'][5]   = "ปิดรับพนัน\nกลางเดือน เปิดรับวันที่ 10-16\nปลายเดือน เปิดรับวันที่ 25-01\nเวลาปิดรับ 15:20";
$lang_g['Msg'][6]   = "E55-ติดต่อผู้ดูแล";
$lang_g['Msg'][7]   = "E54-ติดต่อผู้ดูแล";
$lang_g['Msg'][8]   = "E53-ติดต่อผู้ดูแล";
$lang_g['Msg'][9]   = "E52-ติดต่อผู้ดูแล";
$lang_g['Msg'][10]  = "E51-ติดต่อผู้ดูแล";
$lang_g['Msg'][11]  = "E302 !!!ผิดพลาดไม่มีการบันทึก";

$lang_g['game'][1]  = "เลือกเดิมพันเกม";
$lang_g['game'][2]  = "ยอดเล่น";
$lang_g['game'][3]  = "รับสูงสุด";
$lang_g['game'][4]  = "เล่นต่ำสุด";
$lang_g['game'][5]  = "เล่นสูงสุด";

$lang_g['game_zone'][1] = "2ฮิต";
$lang_g['game_zone'][2] = "ดราก้อน-ไทเกอร์";
$lang_g['game_zone'][3] = "บาคาร่า";
$lang_g['game_zone'][4] = "ไฮโล";
$lang_g['game_zone'][5] = "น้ำเต้าปูปลา";

$lang_g['game_Msg'][1]  = "กรุณาเลือกเดิมพัน";
$lang_g['game_Msg'][2]  = "กรุณากรอกราคา";
$lang_g['game_Msg'][3]  = "ราคาต่ำสุด";
$lang_g['game_Msg'][4]  = "ราคาสูงสุด";


$lang_g['ok']  = "ตกลง";
$lang_g['mobile_game_menu'][1]  = "หน้าหลัก";

$lang_g["laoset"] ="เลขชุด";
/*
########################เลขชุด
$lang_g["settext"][1] ="*** ลุ้นได้ถึง 7 ประตู";
$lang_g["settext"][2] ="1 เลข รับรางวัลสูงสุด 1 รางวัล";
$lang_g["settext"][3] ="ถูก 4 ตัวตรง รับเงิน : 100,000";
$lang_g["settext"][4] ="ถูก 4 ตัวโต๊ด รับเงิน : 4,500";
$lang_g["settext"][5] ="ถูก 3 ตัวตรง(หลัง) รับเงิน : 40,000";
$lang_g["settext"][6] ="ถูก 3 ตัวหน้าตรง รับเงิน : 2,000";
$lang_g["settext"][7] ="ถูก 3 ตัวโต๊ด(หลัง) รับเงิน : 3,500";
$lang_g["settext"][8] ="ถูก 2 ตัวหน้า(2ล่าง) รับเงิน : 1,500";
$lang_g["settext"][9] ="ถูก 2 ตัวหลัง รับเงิน : 1,500";
*/
########################เลขชุด
$lang_g["settext"][1] ="*** ลุ้นได้ถึง 7 ประตู";
$lang_g["settext"][2] ="1 เลข รับรางวัลสูงสุด 1 รางวัล";
$lang_g["settext"][3] ="ถูก 4 ตัวตรง รับเงิน : ตามตัวแทน";
$lang_g["settext"][4] ="ถูก 4 ตัวโต๊ด รับเงิน : ตามตัวแทน";
$lang_g["settext"][5] ="ถูก 3 ตัวตรง(หลัง) รับเงิน : ตามตัวแทน";
$lang_g["settext"][6] ="ถูก 3 ตัวหน้าตรง รับเงิน : ตามตัวแทน";
$lang_g["settext"][7] ="ถูก 3 ตัวโต๊ด(หลัง) รับเงิน : ตามตัวแทน";
$lang_g["settext"][8] ="ถูก 2 ตัวหน้า(2ล่าง) รับเงิน : ตามตัวแทน";
$lang_g["settext"][9] ="ถูก 2 ตัวตรง รับเงิน : ตามตัวแทน";



$lang_g["setpay"][0] ="4 ตัวตรง";
$lang_g["setpay"][1] ="4 ตัวโต๊ด";
$lang_g["setpay"][2] ="3 ตัวตรง(หลัง)";
$lang_g["setpay"][3] ="3 ตัวหน้าตรง";
$lang_g["setpay"][4] ="3 ตัวโต๊ด(หลัง)";
$lang_g["setpay"][5] ="2 ตัวหน้า(2ล่าง)";
$lang_g["setpay"][6] ="2 ตัวตรง";

$lang_g["setwin"][0] ="100,000";
$lang_g["setwin"][1] ="4,500";
$lang_g["setwin"][2] ="40,000";
$lang_g["setwin"][3] ="2,000";
$lang_g["setwin"][4] ="3,500";
$lang_g["setwin"][5] ="1,500";
$lang_g["setwin"][6] ="1,500";

$lang_g["text"]["count"] ="ชุด";
?>