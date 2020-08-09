<?php 

$actual_link = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$exc1 = explode("?" , $actual_link);
$exc = explode("/" , $exc1[0]);
$tlink = "";
for($tl=1;$tl<count($exc);$tl++){
	if($tlink==""){
		$tlink = "../";
	}else{
		$tlink = $tlink."../";
	}
}
$tlink = $tlink."lang/ch.php";
include $tlink;
$tlink2 = $tlink."lang/function_ch.php";
include $tlink2;

	$lang_cancelAllMessage 		="*คำเตือน : ยกเลิกก่อน 14.30";
	$lang_TangMessage 			="*คำเตือน : แทงหน้านี้หุ้นส่วน จะเข้าคุณ 100% คนเดียว";

	$lang_level[1]= $x_level[1];                                                            //"ซุปเปอร์";
	$lang_level[2]= $x_level[2];															//"ซีเนียร์";
	$lang_level[3]= $x_level[3];															//"มาสเตอร์";
	$lang_level[4]= $x_level[4];															//"เอเย่น";
	$lang_level[5]= $x_level[5];															//"เมมเบอร์";


	$lang_levelNew[1] 			="ซุปเปอร์ใหม่";
	$lang_levelNew[2] 			="ซีเนียร์ใหม่";
	$lang_levelNew[3] 			="มาสเตอร์ใหม่";
	$lang_levelNew[4] 			="เอเย่นใหม่";
	$lang_levelNew[5] 			="เมมเบอร์ใหม่";

	$lang_levelList[1] 			="รายการซุปเปอร์";
	$lang_levelList[2] 			="รายการซีเนียร์";
	$lang_levelList[3] 			="รายการมาสเตอร์";
	$lang_levelList[4] 			="รายการเอเย่น";
	$lang_levelList[5] 			="รายการเมมเบอร์";


	$lang_save 					= $lang_x[1];												//"บันทึก";
	$lang_back 					= $lang_x[16];												//"กลับ";
	$lang_add 					="เพิ่ม";
	$lang_edit1 				="แก้ไข";
	$lang_saveMessage 			= $lang_x[6]; 												//"บันทึกสำเร็จ";
	$lang_createAccount 		="เปิดบัญชี";
	$lang_nameDuplicate 		="ชื่อผู้ใช้ ไม่ว่าง";
	$lang_passWrong 			="รหัสผ่านไม่ตรงกัน";
	$lang_warningOver 			="มากกว่า";
	$lang_warningLessThan 		="น้อยกว่า";

	
//top
	$lang_logout 				= $lang_top[15];											//"ออกจากระบบ";

//l
	//สมาชิก
	$lang_Member  				="สมาชิก";
	$lang_NewM 					="สมาชิกใหม่";
	$lang_listM 				="รายการสมาชิก";
	$lang_SharedUser 			="ผู้ใช้ร่วม";
	$lang_OnlineUser 			="คนที่ออนไลน์";
	//ข้อความ
	$lang_Message    			="ข้อความ";
	$lang_listMessage 			="รายการข้อความ";
	//หวย
	$lang_lotMenu 				=$lang_top[2];												//"หวย";
	$lang_lotShare 				="การถือหุ้น หวย";
	$lang_ForcedLotShare  		="การบังคับถือหุ้น หวย";
	$lang_lotPayoutRate 		="อัตราจ่าย หวย";
	$lang_lotCom 				="ส่วนลด หวย";
	$lang_MaxReceiveRate 		="อัตรารับสูงสุด";
	$lang_Closeloto 			="ปิดรับเลข";
	$lang_buyByMember 			="ยอดซื้อตามสมาชิก";
	$lang_buyByType 			="ยอดซื้อตามประเภท";
	$lang_lotMonitor 			="จอควบคุมงาน";
	$lang_lottoCancel 			="ยกเลิกตั๋ว";
	$lang_lottoTua 				="สรุปซื้อ แบบตัว";
	$lang_lotBet 				="แทง";
	$lang_lottoCancelAll 		="ยกเลิกตั๋วทั้งระบบ";

	//หวยหุ้น
	$lang_lotHunShare 			="การถือหุ้น หวย";
	$lang_ForcedLotHunShare  	="การบังคับถือหุ้น หวย";
	$lang_lotHun 				="หวยหุ้น";
	$lang_lotHunPayoutRate 		="อัตราจ่าย หวยหุ้น";
	$lang_lotHunCom 			="ส่วนลด หวยหุ้น";
	//คาดการรณ์ล่วงหน้า
	$lang_ForecastLot 			="คาดการณ์ล่วงหน้า";
	//ชนะแพ้
	$lang_lotto_winloss 		="ชนะแพ้";
	$lang_lotto_winloss_wow 	="หวย ชนะ-แพ้";
	$lang_lotHun_winloss_wow 	="หวยหุ้น ชนะ-แพ้";
	$lang_games_winloss_wow 	="เกมส์ ชนะ-แพ้";
	//ฝากถอน
	$lang_payment 			= $lang_top[5];														//"ฝาก-ถอน";
	$lang_payTrans 			="แจ้งฝาก";
	$lang_payDrawt 			="แจ้งถอน";
	$lang_paymentHistory 	="ประวัติ";
	$lang_trans 			= $pay_mentr[1];													//"ฝาก";
	$lang_drawt 			= $pay_mentr[2];													//"ถอน";
	$lang_convertNumber 	= $lang_top[16]; 													//"แปลงเลข";

	//log
	$lang_LogList			="บัญชีเข้าสู่ระบบ";
	$lang_LogAgentLogin		="ตัวแทนเข้าสู่ระบบ";
	$lang_LogMemberLogin	="เมมเบอร์เข้าสู่ระบบ";
	//ข้อมูลส่วนต_ัว
	$lang_userInFo 			="ข้อมูลส่วนตัว";
	$lang_userProfile 		="โปรไพล์ของฉัน";
	$lang_changePassword 	= $lang_top[14]; 													//"เปลี่ยนรหัสผ่าน";
	//แจ้งเตือน
	$lang_alert 			="แจ้งเตือน";
	$lang_alertData['id'][1]="E51";
	$lang_alertData['id'][2]="E52";
	$lang_alertData['id'][3]="E53";
	$lang_alertData['id'][4]="E54";
	$lang_alertData['id'][5]="E55";

	$lang_alertData['message'][1]= $lang_lot[110];												//"ติดต่อผู้ดูแล";
	$lang_alertData['message'][2]= $lang_lot[110];												//"ติดต่อผู้ดูแล";
	$lang_alertData['message'][3]= $lang_lot[110];												//"ติดต่อผู้ดูแล";
	$lang_alertData['message'][4]= $lang_lot[110];												//"ติดต่อผู้ดูแล";
	$lang_alertData['message'][5]= $lang_lot[110];												//"ติดต่อผู้ดูแล";

	$lang_alertData['meaning'][1]="ซุปเปอร์ เคลียร์หนี้ค้าง ระงับการพนันงวดใหม่";
	$lang_alertData['meaning'][2]="ซีเนียร์ เคลียร์หนี้ค้าง ระงับการพนันงวดใหม่";
	$lang_alertData['meaning'][3]="มาสเตอร์ เคลียร์หนี้ค้าง ระงับการพนันงวดใหม่";
	$lang_alertData['meaning'][4]="เอเย่น เคลียร์หนี้ค้าง ระงับการพนันงวดใหม่";
	$lang_alertData['meaning'][5]="เมมเบอร์ เคลียร์หนี้ค้าง ระงับการพนันงวดใหม่";


//end l
	
//main
	//MyProfile
	$lang_username 			="ชื่อผู้ใช้";	
	$lang_nickname 			="ชื่อเล่น";	
	$lang_name 				= $lang_lot[122]; 					 		// "ชื่อ";
	$lang_myCradit 			="ยอดเงินคงเหลือของฉัน";
	$lang_listOutstanding 	="รายการที่ค้างทั้งหมด"; 
	$lang_limiteCredit 		="วงเงินจำกัดของฉัน";
	$lang_maxLimit 			="วงเงินจำกัด";
	$lang_open 				="เปิดใช้งาน";
	$lang_all 				="ทั้งหมด";
	$lang_open1 			="เปิด";
	$lang_withhold 			="ระงับชั่วคราว";
	$lang_webAddress 		="ที่อยู่เว็บไซต์สำรอง";
	$lang_agent 			="เอเยนต์";
	$lang_member 			= $x_level[5];								//"เมมเบอร์";
	$lang_agentTOMobile 	="เอเยนต์ เติม-ถอน มือถือ";
	$lang_refresh 			="รีเฟรช";

	//สมาชิก 
	$lang_mnew 				="ใหม่";
	$lang_tel 				="โทรศัพท์";
	$lang_ACCNumber 		="หมายเลขบัญชี";
	$lang_bank 				= $lang_tf[9]; 								//"ธนาคาร";
	$lang_nameAccount 		="ชื่อบัญชี";
	$lang_withdrawalCode 	="รหัสถอนเงิน";
	$lang_4lugNumber 		="เลข 4 หลัก";
	$lang_football 			="ฟุตบอล";
	$lang_closeBet 			="ปิดไม่ให้เล่น";
	$lang_muayThai 			="มวยไทย";
	$lang_football1 		= $lang_menu[108];                          // "บอลชุด";
	$lang_otherSport 		="กีฬาอื่น ๆ";
	$lang_games 			= $lang_top[3];      						//"เกมส์";
	$lang_Casino 			= $lang_top[4];								//"คาสิโน";
	$lang_password 			="รหัสผ่าน";
	$lang_cPassword 		= $lang_x[5];								//"ยืนยันรหัสผ่าน";
	$lang_financialAmount 	="วงเงิน";
	$lang_typeMember 		="ประเภท เมเเบอร์";
	$lang_typeAgent 		="ประเภท เอเย่น";
	$lang_craditBalance 	="วงเงินคงเหลือ";
	$lang_share 			="ถือหุ้น";
	$lang_gebLive 			="เก็บ Live";
	$lang_com 				= $lang_x[15];								//"ส่วนลด";
	$lang_mMin 				="ต่ำสุด";
	$lang_mMax 				= $lang_lot[8];								//"สูงสุด";
	$lang_mMaxPerMacth 		="สูงสุดต่อแมตช์";
	$lang_num 				="น้ำ";
	$lang_rong 				="รอง";
	$lang_even 				= "คู่";
	$lang_close 			= $lang_m[3];								//"ปิด";
	$lang_reward 			= "รางวัล";
	$lang_num 				= "เลข";
	$lang_bangSoo 			= "แบ่งสู้";
	$lang_perTime 			= $lang_lot[107];							//"ครั้ง";
	$lang_cash 				= $man_type[0];								//"เงินสด";
	$lang_cradit 			= $man_type[1];								//"เครดิต";
	$lang_force 			="บังคับ";

	$lang_searchAccount 	="ค้นหาบัญชี"; 
	$lang_search 			= $lang_m[24];								//"ค้นหา";  
	$lang_degree 			="ระดับ";
	$lang_under 			="ภายใต้";
	$lang_selectUnder 		="เลือกภายใต้";
	$lang_account 			="บัญชี";
	$lang_type 				= $lang_lot[29];							//"ประเภท";
	$lang_manage 			="จัดการ";
	$lang_craditLimit 		="จำกัดวงเงิน";
	$lang_status 			= $lang_m[27];								//"สถานะ";
	$lang_bet 				="พนัน";
	$lang_listOutstanding1  = $lang_menu[116];							//"รายการเล่นค้าง";
	$lang_locationOuts 		="ตำแหน่งที่ตั้ง";
	$lang_lastLoginTime 	="ล็อกอินล่าสุด";
	$lang_sportSetting 		="ตั้งค่ากีฬา";
	$lang_lotSetting 		="ตั้งค่าหวย";
	$lang_lotHunSetting 	="ตั้งค่าหวยหุ้น";
	$lang_gamesSetting 		="ตั้งค่าเกมส์";
	$lang_creditReceived 	= $lang_menu[117];							//"เครดิตที่ได้รับ";
	$lang_creditBalance     = $lang_menu[115];							//"เครดิตคงเหลือ";
	$lang_language 			= $lang_x[27];								//"ภาษา";
	$lang_priceType 		="ประเภทราคา";
	$lang_betTou 			="ซื้อแบบตัว";
	$lang_editSr 			="ปรับปรุง ซีเนียร์";
	$lang_editMaster 		="ปรับปรุง มาสเตอร์";
	$lang_editAgent 		="ปรับปรุง เอเย่น";
	$lang_editMember 		="ปรับปรุง เมเเบอร์";
	$lang_edit 				="ปรับปรุง";
	$lang_cancelBil 		="ยกเลิกบิล";
	$lang_not 				="ไมได้";
	$lang_printSlip 		= $lang_lot[73];							//"พิมพ์สลิป";
	$lang_NotPrint 			="ไม่ให้พิมพ์";
	$lang_closeNotCancle 	="ปิด ไม่ให้ยกเลิก";
	$lang_buyTicketOnApp 	="ซื้อแบบตั๋ว บน App";
	$lang_buyTicket 		="ซื้อ แบบตั๋ว";

	// คนที่ออนไลน์ 

	$lang_transfer 			="โอนเงิน";
	$lang_winloss 			="ชนะ-แพ้";
	$lang_lastLoginDate 	="วันที่เข้าสู่ระบบ";
	$lang_loginData 		="ข้อมูลการเข้าสู่ระบบ";
	$lang_loginLocation 	="สถานที่เข้าสู่ระบบ";

	//ข้อความ
	$lang_data 				= $lang_m[23];								//"วันที่";
	$lang_news 				="ข่าว";
	$lang_messageType 		="ประเภทข้อความ";

// หวย หวยหุ้ม
	$lang_cycle 			= $lang_m[40];								//"รอบ";	
	$lang_list 				="รายการ";
	$lang_MaxReceivePerNumber ="รับสูงสุด / เลข";
	$lang_Summary 			="สรุปรวม";
	$lang_forecasts 		="คาดการณ์";
	$lang_amRe0Tem 			="จำนวนเงินที่รับ ,  0=เต็ม";
	$lang_amount 			= $lang_lot[113]; 							//"จำนวน";
	$lang_dateTime 			="วัน / เวลา";
	$lang_top_bot_switch 	="บน+ล่าง+กลับ";
	$lang_3bot_6switch 		="3ตัว+6กลับ";

	$lang_buyBy 			="ยอดซื้อตาม";
	$lang_buyByType 		="ยอดซื้อตามประเภท";
	$lang_buyDate 			="งวดวันที่";
	$lang_win_lost 			="ได้ / เสีย";
	$lang_hold 				="ถือสู้"; 
	$lang_discount 			= $lang_x[15]; 								//"ส่วนลด";
	$lang_total 			="ยอดสุทธิ";
	$lang_income 			="ยอดถูก";
	$lang_total1 			= $lang_m[15];								//"รวม";
	$lang_byLotResults 		="เลขที่ถูก";
	$lang_no 				= $lang_lot[28];							//"ลำดับ";
	$lang_time 				= $lang_m[9];								//"เวลา";
	$lang_number 			="หมายเลข";
	$lang_priceAmount 		="จำนวนเงินที่เล่น";
	$lang_quantity 			="จำนวนครั้ง";
	$lang_ForecastLost 		="คาดเดาเสีย";
	$lang_holdResult 		="สรุปถือ";
	$lang_round 			= $lang_lot[119];							//"งวด";

	$lang_special 			= $lang_lot[116];							//"พิเศษ";
	$lang_yod 				= "ยอด";
	$lang_bilId 			= $lang_m[54];								//"รหัสบิล";
	$lang_cancelThisSelect  ="ยกเลิกที่เลือก";
	$lang_confCalCel 		="ยืนยันการยกเลิก";
	$lang_closeBet1 		="ปิดพนัน";
	$lang_closeBet2 		="ปิดรับแทงแล้ว";
	$lang_Maintenance 		="บำรุงรักษา";
	$lang_cancelTime 		="เวลายกเลิก";
	$lang_betResult 		="ยอดเล่น";
	$lang_cancel 			= $lang_m[17];								//"ยกเลิก";
	$lang_cancelList 		="รายการยกเลิก";
	$lang_cancelBy 			="ผู้ยกเลิก";

	
	$lang_selectMember 		="เลือกสมาชิก";
	$lang_members 			="สมาชิก";
	$lang_select 			= $lang_x[25]; 								//"เลือก";
	$lang_selectAgent 		="เลือกเอเย่นต์";
	$lang_agent 			="เอเย่นต์";

	$lang_top 				= $lang_lot[43];							//"บน";
	$lang_bot 				= $lang_lot[44];							//"ล่าง";
	$lang_Tod 				= $lang_lot[63];							//"โต๊ด";

	$lang_allTua 			="ทั้งหมด ตัว";
	$lang_allBaht 			="ทั้งหมด บาท";
	$lang_win1 				="ถูก";
	$lang_conclude 			= $lang_lot[104]; 							//"สรุป";
	$lang_tua 				= $lang_lot[103];							//"ตัว";
	 //win lost
	$lang_betDate 			="วันที่แทง";
	$lang_hun 				="หุ้น";
	$lang_company 			="บริษัท";
	$lang_saroob_result 	="สรุปสุทธิ";
	$lang_jark 				="จาก";
	$lang_fetch				="ถึง";
	$lang_editAgentName 	="แก้ไขชื่อเล่น";
	$lang_data1 			="ข้อมูล";

	// เปลี่ยนรหัสผ่าน 
	$lang_oldPassword 		="รหัสผ่านเก่า";
	$lang_newPassword 		=$lang_x[4];								//"รหัสผ่านใหม่";
	$lang_confirmPassword   =$lang_x[5];								//"ยืนยันรหัสผ่าน";
	$lang_show 				=$lang_lot[77]; 							//"แสดง";

	//แจ้งเตือน
	$lang_meaning 			="ความหมาย";
	$lang_MessId 			="รหัส";

	//ฝาก-ถอน
	$lang_bank 				= $lang_tf[9];								//"ธนาคาร";
	$lang_PreviousBalance 	="คงเหลือก่อนหน้า"; 
	$lang_PreviousBalance1 	="วงเงินคงเหลือก่อนหน้า"; 
	$lang_Deposit 			="ยอดฝาก";
	$lang_Withdraw 			="ยอดถอน";
	$lang_TotalBalance 		= $lang_x[18];								//"ยอดคงเหลือ";
	$lang_TotalBalance1 	="ยอดคงเหลือเมื่อวาน";
	$lang_note 				= $lang_x[23];								//"หมายเหตุ";
	$lang_updateBy 			="อัพเดทโดย";
	$lang_financialAmount1  ="วงเงินที่ได้รับ";
	$lang_payments 			="ยอดชำระ";
	$lang_payments1 		="ชำระ";
	$lang_confirmPayments	="ยืนยันการชำระ";
	$lang_WinLostBalance 	="ยอดได้-เสีย";
	$lang_currency 			="สกุลเงิน";
	$lang_OpenTime 			="เวลา ทำการ";
	$lang_tel1 				="โทร";
	$lang_OverLimitCradit 	="เครดิตเกินติดต่อ ผู้ดูแล";
	$lang_dateTimeSave 		=$lang_tf[11];								//"วัน/เวลา บันทึก";
	$lang_dateTimeTransfer  =$lang_tf[10];								//"วัน/เวลา โอนเงิน"; 
	$lang_correct 			="ถูกต้อง";
	$lang_incorrect 		="ผิดพลาด";
	$lang_PayMentHis 		="ประวัติการแจ้ง";
	$lang_Listed 			="ทำรายการแล้ว";

	$rlang['lotZone'][1]	= 	$lang_g['lotZone'][1];							//"หวยไทย";
	$rlang['lotZone'][2]	= 	$lang_g['lotZone'][2];							//"หวยหุ้นไทย";
	$rlang['lotZone'][3]	= 	$lang_g['lotZone'][3];							//"หวยลาว";
	$rlang['lotZone'][4]	= 	$lang_g['lotZone'][4];							//"หวยมาเลเซีย";
	$rlang['lotZone'][5]	= 	$lang_g['lotZone'][5];							//"หวยเวียดนาม";
	$rlang['lotZone'][6]	= 	$lang_g['lotZone'][6];							//"หุ้นนิเคอิ";
	$rlang['lotZone'][7]	= 	$lang_g['lotZone'][7];							//"หุ้นฮั่งเส็ง";
	$rlang['lotZone'][8]	= 	$lang_g['lotZone'][8];							//"หุ้นดาวโจนส์";
	$rlang['lotZone'][9]	= 	$lang_g['lotZone'][9];							//"หุ้นสิงคโปร์";
	$rlang['lotZone'][10] 	= 	$lang_g['lotZone'][10];							//"หุ้นอียิปต์";
	$rlang['lotZone'][11] 	= 	$lang_g['lotZone'][11];							//"หุ้นรัสเซีย";
	$rlang['lotZone'][12] 	= 	$lang_g['lotZone'][12];							//"หุ้นเยอรมัน";
	$rlang['lotZone'][13] 	= 	$lang_g['lotZone'][13];							//"หุ้นอังกฤษ";
	$rlang['lotZone'][14] 	= 	$lang_g['lotZone'][14];							//"หุ้นเกาหลี";
	$rlang['lotZone'][15] 	= 	$lang_g['lotZone'][15];							//"หุ้นใต้หวัน";
	$rlang['lotZone'][16] 	= 	$lang_g['lotZone'][16];							//"หุ้นจีน";
	$rlang['lotZone'][17] 	= 	$lang_g['lotZone'][17];							//"หุ้นอินเดีย";
	$rlang['lotZone'][18] 	= 	$lang_g['lotZone'][18];							//"จับยี่กี";
	$rlang['lotZone'][19] 	= 	$lang_g['lotZone'][19];							//"หวยรายวัน";

	$rlang['lotrob'][1] = 	$lang_g['lotrob'][1];									//"เช้า";
	$rlang['lotrob'][2] = 	$lang_g['lotrob'][2];									//"เที่ยง";
	$rlang['lotrob'][3] = 	$lang_g['lotrob'][3];									//"บ่าย";
	$rlang['lotrob'][4] = 	$lang_g['lotrob'][4];									//"เย็น";

	$rlang['view']				 = "ดู";
	$rlang['sl_bank']			 = "เลือกธนาคาร";
	$rlang['bank_account']		 = "ชื่อบัญชี";
	$rlang['del'] 				= "ลบ";

$m_active= array(0 =>"<span class='red'>ระงับ</span>" ,"เปิดใช้งาน"); 
$active_bet= array(0 => "<span class='cr'>ระงับ</span>","ปกติ"); 
$man_type= array(0 =>"เงินสด", "เคดิต"); 
$lot_open= array(0=>"ปิด","<span class='cr'>เปิด</span>"); 
$n_news= array(1 => "สาธารณะ","สำคัญ"); 

$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่างหลัง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย", 24 =>"2โต๊ดบน");


	$rlang['na-top']          = $lang_lot[15];									//"หน้าบน";
    $rlang['3-bot']           = $lang_lot[45];									//"3ล่าง";
    $rlang['3-bot-na']        = "3ล่างหน้า";
    $rlang['3-bot-na']        = "3ล่างหน้า";
    $rlang['sort_by_yod']     = "เรียงตามยอด";
    $rlang['sort_by_num']     = "เรียงตามเลข";
    $rlang['wn_number']       = "เลขอันตราย";
    $rlang['Awards']          = $lang_lot[27];									//"ผลรางวัล";
    $rlang['6tua']            = "6ตัว";
    $rlang['monitor_menu3']   = "ตั้งสู้";    


    $rlang['w_message'][1] 	 = "กรุณากรอกข้อมูล";   
    $rlang['w_message'][2] 	 = "ไม่พบข้อมูลที่บันทึก";
    $rlang['w_message'][3] 	 = "เปลี่ยนรหัสผ่านสำเร็จ";
    $rlang['w_message'][4] 	 = "รหัสผ่านเดิมไม่ถูกต้อง";

    $rlang['other'][1]      =  'คู่แข่งขัน';
    $rlang['other'][2]      =  'สต็อก';
    $rlang['other'][3]      =  'ปฏิเสธ';
    $rlang['other'][4]      =  'อันตราย';
    $rlang['other'][5]      =  'รันนิ่ง';
    $rlang['other'][6]      =  'แมตช์';
    $rlang['other'][7]      =  'เงินเดิมพัน';
    $rlang['other'][9]      =  'หุ้นส่วน';
    $rlang['other'][10]     =  'รายการฝาก';
    $rlang['other'][11]     =  'รายการถอน';
    $rlang['other'][12]     =  'เอเย่นต์ - ฝาก';
	$rlang['other'][13]     =  'เอเย่นต์ - ถอน';
	$rlang['other'][14]     =  $lang_m[7];											// เต็มเวลา
	$rlang['other'][15]     =  $lang_m[8];											// ครึ่งแรก
	$rlang['other'][16]     =  $lang_m[25];											// กีฬา
	$rlang['other'][17]     =  "ราคาค่าน้ำทั้งหมด";											
	$rlang['other'][18]     =  'ครึ่งเวลา/เต็มเวลา';
	$rlang['other'][19]     =  'เจ้าบ้าน เจ้าบ้านชนะ';
	$rlang['other'][20]     =  'เจ้าบ้าน ทีมเยือนชนะ';
	$rlang['other'][21]     =  'เสมอ เจ้าบ้านชนะ';
	$rlang['other'][22]     =  'เสมอ เสมอ';
	$rlang['other'][23]     =  'เสมอ ทีมเยือนชนะ';
	$rlang['other'][24]     =  'ทีมเยือน เจ้าบ้านชนะ';
	$rlang['other'][25]     =  'ทีมเยือน เสมอ';
	$rlang['other'][26]     =  'ทีมเยือน ทีมเยือนชนะ';
	$rlang['other'][27]     =  'เจ้าบ้าน เจ้าบ้านเสมอ';

	$rlang['other'][28]     =  'แฮนดิแคป';
	$rlang['other'][29]     =  'วินาที';
	$rlang['other'][30]     =  'ไม่เคย';
	$rlang['other'][31]     =  'สูง/ต่ำ';

	$rlang['other'][31]     =  'กีฬาแพ้ชนะ';
	$rlang['other'][32]     =  'เทิร์นโอเวอร์';
	$rlang['other'][33]     =  'เบื้องต้นเ';
	$rlang['other'][34]     =  'แพ้ชนะ';
	$rlang['other'][35]     =  'คอพพ์ทั้งหมด';
	$rlang['other'][36]     =  'คอมม์';

	$rlang['other'][37]     =  'นำออก';
	$rlang['other'][38]     =  'รายการที่ค้าง';

	$rlang['other'][39]     =  'กรองบัญชี';
	$rlang['other'][40]     =  'บัญชีย่อย';
	$rlang['other'][41]     =  'ค้นหาชื่อผู้ใช้';
	$rlang['other'][42]     =  'เสนอ';
	$rlang['other'][43]     =  'กรุณาเลือกหนึ่ง';
	$rlang['other'][44]     =  'ลีก';	

	$rlang['other'][45]     =  'ประเภทการเปลี่ยแปลง';
	$rlang['other'][46]     =  'ประเภทเกม';
	$rlang['other'][47]     =  'ไม่เข้าร่วม';
	$rlang['other'][48]     =  'เข้าร่วม';
	$rlang['other'][49]     =  'ทีมเจ้าบ้าน';
	$rlang['other'][50]     =  'ทีมเยือน';
	$rlang['other'][51]     =  'ครึ่งเวลา';
	$rlang['other'][52]     =  'เต็มเวลา';	
	$rlang['other'][53]     =  $lang_m[1];								//ผลการแข่งขัน
	$rlang['other'][54]     =  'ประเทศ';	
	$rlang['other'][55]     =  'จำนวนผู้ใช้งาน';
	$rlang['other'][56]     =  'ประเภทการบันทึก';
	$rlang['other'][57]     =  'รหัสเหตุผล';
	$rlang['other'][58]     =  'เวลาเข้าสู่ระบบ';
	$rlang['other'][59]     =  'โดเมน';
	$rlang['other'][60]     =  'เบราว์เซอร์';
	$rlang['other'][61]     =  'ลีกแพ้ชนะ';
	$rlang['other'][62]     =  'ข้อมูลเก่า(ก่อน 50 วัน)';
	$rlang['other'][63]     =  'ยกเลิกการเดิมพัน';
	$rlang['other'][64]     =  $lang_x[24];							//รายละเอียด		
	$rlang['other'][65]     =  'ยอดเล่นค้างสมาชิก';
	$rlang['other'][66]     =  'รหัสสมาชิก';
	$rlang['other'][67]     =  'เก็บ';
	$rlang['other'][68]     =  'บอล';
	$rlang['other'][69]     =  "หวย";						
	$rlang['other'][70]     =  "กีฬาแพ้/ชนะ";
	$rlang['other'][71]     =  "เกมส์ แพ้/ชนะ";
	$rlang['other'][72]     =  "คาสิโน แพ้/ชนะ";
	$rlang['other'][73]     =  "คอพพ์";
	$rlang['other'][74]     =  "แจ็คพอต";
	$rlang['other'][75]     =  "เพิ่มใหม่";
	$rlang['other'][76]     =  "วงเงินที่วางเดิมพันได้";
	$rlang['other'][77]     =  "ตั้งค่าบอล";
	$rlang['other'][78]     =  "ฟุตบอล สเต็ป รอบ";
	$rlang['other'][79]     =  "ประเภทสมาชิก";
	$rlang['other'][80]     =  "คอมมิชชั่น";
	$rlang['other'][81]     =  "น้ำ";
	$rlang['other'][82]     =  "ฟุตบอล มิกพาร์เลย์";
	$rlang['other'][83]     =  "ฟุตบอล สเต็ป รอบ";
	$rlang['other'][84][1]     =  "คอมมิชชั่น 2 คู่";
	$rlang['other'][84][2]     =  "คอมมิชชั่น 3 คู่";
	$rlang['other'][84][3]     =  "คอมมิชชั่น 4 คู่";
	$rlang['other'][84][4]     =  "คอมมิชชั่น 5 คู่";
	$rlang['other'][84][5]     =  "คอมมิชชั่น 6 คู่";
	$rlang['other'][84][6]     =  "คอมมิชชั่น 7-10 คู่";
	$rlang['other'][85]     =  "วันที่ซื้อ";
	$rlang['other'][86]     =  "รอบ / set";
	$rlang['other'][87]     =  "มวย";
	$rlang['other'][88]		=  $sport_zone[1];												//ก่อนเวลา
	$rlang['other'][89]		=  $lang_m[32];													// สูง		
	$rlang['other'][90]		=  $lang_m[33];													// ต่ำ	
	$rlang['other'][91]		=  $lang_m[37];													// คี่		
	$rlang['other'][92]		=  "ประวัติ";	
    $rlang['other'][93]		=  "ราคาส่ง";		
	$rlang['other'][94]		=  "หวยชุด";	
 ?>