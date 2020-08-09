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
$tlink = $tlink."lang/en.php";
include $tlink;
$tlink2 = $tlink."lang/function_en.php";
include $tlink2;


	$lang_cancelAllMessage="*Warning : Cancel before 14.30";
	$lang_TangMessage="*Warning : This betting partner page will get you 100%";

	$lang_level[1] = $x_level[1];															//"Super";
	$lang_level[2] = $x_level[2];															//"Senior";
	$lang_level[3] = $x_level[3];															//"Master";
	$lang_level[4] = $x_level[4];															//"Agent";
	$lang_level[5] = $x_level[5];															//"Member";


	$lang_levelNew[1] 			="Super";
	$lang_levelNew[2] 			="Senior";
	$lang_levelNew[3] 			="Master";
	$lang_levelNew[4] 			="Agent";
	$lang_levelNew[5] 			="Member";

	$lang_levelList[1] 			="Super list";
	$lang_levelList[2] 			="Senior list";
	$lang_levelList[3] 			="Master list";
	$lang_levelList[4] 			="Agent list";
	$lang_levelList[5] 			="Member list";


	$lang_save 					= $lang_x[1];										//"Submit";
	$lang_back 					= $lang_x[16];										//"Back";
	$lang_add 					="Create";
	$lang_edit1	  				="Edit";
	$lang_saveMessage 			= $lang_x[6];										//"Succeed";
	$lang_createAccount 		="Create User";
	$lang_nameDuplicate 		="User Name is busy";
	$lang_passWrong 			="Passwords do not match";
	$lang_warningOver 			="Over";
	$lang_warningLessThan 		="Under";

	
//top
	$lang_logout 				= $lang_top[15];									//"Logout";

//l
	//สมาชิก
	$lang_Member 				="Member";
	$lang_NewM 					="New member";
	$lang_listM 				="Member list";
	$lang_SharedUser 			="Sub Agent";
	$lang_OnlineUser 			="User Online";
	//ข้อความ
	$lang_Message 				="Message";
	$lang_listMessage 			="Message list";
	//หวย
	$lang_lotMenu 				= $lang_top[2];										//"Lotto";
	$lang_lotShare 				="Lotto share";
	$lang_ForcedLotShare 		="Lotto forced share";
	$lang_lotPayoutRate 		="Lotto Pay";
	$lang_lotCom 				="Lotto Comm";
	$lang_MaxReceiveRate 		="Lotto Maximum";
	$lang_Closeloto 			="Close Lotto";
	$lang_buyByMember 			="Betting by member";
	$lang_buyByType 			="Betting by type";
	$lang_lotMonitor 			="Control panel";
	$lang_lottoCancel 			="Cancel Betting";
	$lang_lottoTua 				="Summary type";
	$lang_lotBet 				="Bet";
	$lang_lottoCancelAll 		="Cancel all betting";

	//หวยหุ้น
	$lang_lotHunShare 			="share Lotto";
	$lang_ForcedLotHunShare 	="Force Lotto";
	$lang_lotHun 				="Stock lotto";
	$lang_lotHunPayoutRate 		="Stock lotto pay";
	$lang_lotHunCom 			="Stock lotto comm";
	//คาดการรณ์ล่วงหน้า
	$lang_ForecastLot 			="Forecasts";
	//ชนะแพ้
	$lang_lotto_winloss 		="Winloss";
	$lang_lotto_winloss_wow 	="Lotto Win-loss";
	$lang_lotHun_winloss_wow 	="Stock lotto Win-loss";
	$lang_games_winloss_wow 	="Games Win-loss";
	//ฝากถอน
	$lang_payment 				= $lang_top[5];										//"Deposit-Withdraw";
	$lang_payTrans 				="Deposit";
	$lang_payDrawt 				="Withdrawal";
	$lang_paymentHistory 		="History";
	$lang_trans 				= $pay_mentr[1];									//"Deposit";
	$lang_drawt 				= $pay_mentr[2];									//"Withdraw";
	$lang_convertNumber 		= $lang_top[16];									//"Convert";

	//log
	$lang_LogList 				="Account login";
	$lang_LogAgentLogin 		="Agent login";
	$lang_LogMemberLogin 		="Member login";
	//ข้อมูลส่วนต_ัว
	$lang_userInFo 				="Profile";
	$lang_userProfile 			="My Profile";
	$lang_changePassword 		= $lang_top[14];									//"Change Password";
	//แจ้งเตือน
	$lang_alert 				="Warning";
	$lang_alertData['id'][1]="E51";
	$lang_alertData['id'][2]="E52";
	$lang_alertData['id'][3]="E53";
	$lang_alertData['id'][4]="E54";
	$lang_alertData['id'][5]="E55";

	$lang_alertData['message'][1]=$lang_lot[110];									//"Contact administrator";
	$lang_alertData['message'][2]=$lang_lot[110];									//"Contact administrator";
	$lang_alertData['message'][3]=$lang_lot[110];									//"Contact administrator";
	$lang_alertData['message'][4]=$lang_lot[110];									//"Contact administrator";
	$lang_alertData['message'][5]=$lang_lot[110];									//"Contact administrator";

	$lang_alertData['meaning'][1]="Super Clearing the Outstanding Balance";
	$lang_alertData['meaning'][2]="Senior Clearing the Outstanding Balance";
	$lang_alertData['meaning'][3]="Master Clearing the Outstanding Balance";
	$lang_alertData['meaning'][4]="Agent Clearing the Outstanding Balance";
	$lang_alertData['meaning'][5]="Member Clearing the Outstanding Balance";


//end l
	
//main
	//MyProfi_2le
	$lang_username 				="Username";	
	$lang_nickname 				="Nickname";	
	$lang_name 					= $lang_lot[122];									//"Name";
	$lang_myCradit 				="My balance";
	$lang_listOutstanding 		="Outstanding all"; 
	$lang_limiteCredit 			="My limit";
	$lang_maxLimit 				="Limit";
	$lang_open 					="Enable";
	$lang_all 					="All";
	$lang_open1 				="Turn on";
	$lang_withhold 				="Suspend";
	$lang_webAddress 			="Spare website";
	$lang_agent 				="Agent";
	$lang_member 				= $x_level[5];										//"Member";
	$lang_agentTOMobile 		="Agent - Mobile";
	$lang_refresh 				="Refresh";

	//สมาชิ_2ก 
	$lang_mnew 					="News";
	$lang_tel 					="Phone";
	$lang_ACCNumber 			="Account number";
	$lang_bank 					= $lang_tf[9];										//"Bank";
	$lang_nameAccount 			="Account name";
	$lang_withdrawalCode 		="Withdrawal code";
	$lang_4lugNumber 			="num 4 digit";
	$lang_football 				="Soccer";
	$lang_closeBet 				="Off to play";
	$lang_muayThai 				="Muay thai";
	$lang_football1 			= $lang_menu[108];									//"Step";
	$lang_otherSport 			="Sport";
	$lang_games 				= $lang_top[3];										//"Games";
	$lang_Casino 				= $lang_top[4];										//"Casino";
	$lang_password 				="Password";
	$lang_cPassword 			= $lang_x[5];										//"Confirm Password";
	$lang_financialAmount 		="Credit";
	$lang_typeMember 			="Member type";
	$lang_typeAgent 			="Agent type";
	$lang_craditBalance 		="Balance";
	$lang_share 				="Share";
	$lang_gebLive				="Keep Live";
	$lang_com 					= $lang_x[15];										//"Comm";
	$lang_mMin 					="Min";
	$lang_mMax 					= $lang_lot[8];										//"Max";
	$lang_mMaxPerMacth 			="Maximum per match";
	$lang_num 					="Odds. big";
	$lang_rong 					="Odds small";
	$lang_even 					="Couple";
	$lang_close 				=$lang_m[3];										//"Close";
	$lang_reward 				="Award";
	$lang_num 					="Number";
	$lang_bangSoo 				="Share";
	$lang_perTime 				= $lang_lot[107];									//"Episode";
	$lang_cash 					= $man_type[0];										//"Cash";
	$lang_cradit 				= $man_type[1];										//"Credit";
	$lang_force 				="Force";

	$lang_searchAccount 		="Search account"; 
	$lang_search 				= $lang_m[24];										//"Search";  
	$lang_degree 				="Level";
	$lang_under 				="Under";
	$lang_selectUnder 			="Select under";
	$lang_account 				="Account";
	$lang_type 					= $lang_lot[29];									//"Type";
	$lang_manage 				="Control";
	$lang_craditLimit 			="Limit credit";
	$lang_status 				= $lang_m[27];										//"Status";
	$lang_bet 					="Betting";
	$lang_listOutstanding1 		= $lang_menu[116];									//"Outstanding";
	$lang_locationOuts 			="Location";
	$lang_lastLoginTime 		="Last Login";
	$lang_sportSetting 			="Config Sport";
	$lang_lotSetting 			="Config Lotto";
	$lang_lotHunSetting 		="Config Stock lotto";
	$lang_gamesSetting 			="Config games";
	$lang_creditReceived 		= $lang_menu[117];									//"Get credit";
	$lang_creditBalance 		= $lang_menu[115];									//"Balance";
	$lang_language 				= $lang_x[27];										//"Language";
	$lang_priceType 			="Price type";
	$lang_betTou 				="E-san bet";
	$lang_editSr 				="Update senior";
	$lang_editMaster 			="Update master";
	$lang_editAgent 			="Update agent";
	$lang_editMember 			="Update member";
	$lang_edit 					="Update";
	$lang_cancelBil 			="Cancel bet";
	$lang_not 					="Can not";
	$lang_printSlip 			= $lang_lot[73];									//"Print slip";
	$lang_NotPrint 				="Do not print";
	$lang_closeNotCancle 		="Close not to cancel";
	$lang_buyTicketOnApp 		="Buy TS. on  App";
	$lang_buyTicket 			="Buy TS.";

	// คนที่ออนไลน_2์ 

	$lang_transfer 				="Transfer";
	$lang_winloss 				="Win-Loss";
	$lang_lastLoginDate 		="Login date";
	$lang_loginData 			="Login information";
	$lang_loginLocation 		="Login location";

	//ข้อคว_2าม
	$lang_data 					= $lang_m[23];										//"Date";
	$lang_news 					="News";
	$lang_messageType 			="Message Type";

// หวย หวยหุ_2้ม
	$lang_cycle 				= $lang_m[40];										//"Round";	
	$lang_list 					="List";
	$lang_MaxReceivePerNumber 	="Maximum / Number";
	$lang_Summary 				="Summary";
	$lang_forecasts 			="Forecasts";
	$lang_amRe0Tem 				="Bet ,  0=Limit";
	$lang_amount  				= $lang_lot[113];									//"Amount";
	$lang_dateTime 				="Date / Time";
	$lang_top_bot_switch 		="Up+Down+Switch";
	$lang_3bot_6switch 			="3Up+6S";

	$lang_buyBy 				="Bet by";
	$lang_buyByType 			="Betting by type";
	$lang_buyDate 				="Lesson date";
	$lang_win_lost 				="Win / Loss";
	$lang_hold 					="Share"; 
	$lang_discount 				= $lang_x[15];										//"Comm";
	$lang_total 				="Total";
	$lang_income 				="Win";
	$lang_total1 				= $lang_m[15];										//"Total";
	$lang_byLotResults 			="Win total";
	$lang_no 					="No. ";
	$lang_time 					="Time";
	$lang_number 				="Number";
	$lang_priceAmount 			="Amount of play";
	$lang_quantity 				="Number of times";
	$lang_ForecastLost 			="Guess the damage";
	$lang_holdResult 			="Shareholding";
	$lang_round 				= $lang_lot[119];									//"Lesson";

	$lang_special 				= $lang_lot[116];									//"Extra";
	$lang_yod 					="Stake";
	$lang_bilId 				= $lang_m[54];										//"Bill No. ";
	$lang_cancelThisSelect 		="Select cancel";
	$lang_confCalCel 			="Confirm cancel";
	$lang_closeBet1 			="Close bet";
	$lang_closeBet2 			="Bets closed";
	$lang_Maintenance 			="Maintenance";
	$lang_cancelTime 			="Cancel time";
	$lang_betResult 			="Betting";
	$lang_cancel 				= $lang_m[17];										//"Cancel";
	$lang_cancelList 			="Cancel list";
	$lang_cancelBy 				="Canceler";

	
	$lang_selectMember 			="Select member";
	$lang_members 				="Member";
	$lang_select 				=$lang_x[25];										//"Select";
	$lang_selectAgent 			="Select agent";
	$lang_agent 				="Agent";

	$lang_top 					=$lang_lot[43];										//"Up";
	$lang_bot 					=$lang_lot[44];										//"Down";
	$lang_Tod 					=$lang_lot[63];										//"Switch";

	$lang_allTua 				="All TS.";
	$lang_allBaht 				="All Baht";
	$lang_win1 					="Win";
	$lang_conclude 				= $lang_lot[104];									//"Total";
	$lang_tua 					= $lang_lot[103];									//"TS.";
	 //win lo_2st
	$lang_betDate 				="Date Bet";
	$lang_hun 					="Share";
	$lang_company 				="Company";
	$lang_saroob_result 		="Summary";
	$lang_jark 					="From";
	$lang_fetch 				="To";
	$lang_editAgentName 		="Edit nickname";
	$lang_data1 				="Data";

	// เปลี่ยนรหัสผ่า_2น 
	$lang_oldPassword 			="Current Password";
	$lang_newPassword 			= $lang_x[4];										//"New Password";
	$lang_confirmPassword 		= $lang_x[5];										//"Confirm Password";
	$lang_show 					= $lang_lot[77];									//"Show";

	//แจ้งเตื_2อน
	$lang_meaning 				="Meaning";
	$lang_MessId 				="No. ";

	//ฝาก-ถ_2อน
	$lang_bank 					=$lang_tf[9];										//"Bank";
	$lang_PreviousBalance 		="Previous Balance"; 
	$lang_PreviousBalance1 		="Previous Credit"; 
	$lang_Deposit 				="Deposit";
	$lang_Withdraw 				="Withdrawal";
	$lang_TotalBalance 			=$lang_x[18];										//"Balance";
	$lang_TotalBalance1 		="Yesterday's balance";
	$lang_note 					=$lang_x[23];										//"Note";
	$lang_updateBy 				="Updated by";
	$lang_financialAmount1 		="Credit line";
	$lang_payments 				="Payments";
	$lang_payments1 			="Pay";
	$lang_confirmPayments 		="Confirm payment";
	$lang_WinLostBalance 		="Win-loss total";
	$lang_currency 				="Currency";
	$lang_OpenTime 				="Transaction time";
	$lang_tel1 					="Tel";
	$lang_OverLimitCradit 		="Credit Limit Contact  Administrator";
	$lang_dateTimeSave 			= $lang_tf[11];										//"Date/Time Record";
	$lang_dateTimeTransfer 		= $lang_tf[10];										//"Date/Time Deposit"; 
	$lang_correct 				="Correct";
	$lang_incorrect				="Error";
	$lang_PayMentHis 			="Notification history";
	$lang_Listed 				="Listed";

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

	$rlang['view'] = "ดู_en";
	$rlang['sl_bank'] = "เลือกธนาคาร_en";
	$rlang['bank_account'] = "ชื่อบัญชี_en";
	$rlang['del'] = "ลบ";
	
$m_active= array(0 =>"<span class='red'>Suspend</span>" ,"Normal"); 
$active_bet= array(0 => "<span class='cr'>Suspend</span>","Normal"); 
$man_type= array(0 =>"Cash", "Credit"); 
$lot_open= array(0=>"Close","<span class='cr'>Open</span>"); 
$n_news= array(1 => "public","important"); 

$lot_type["th"]= array(1 =>"3D", 2 =>"Down3D", 3 =>"3S", 4 =>"2D", 5 =>"Down2D", 6 =>"1D", 7 =>"down1D"
, 8 =>"1D Over-Under" , 9 =>"2D Over-Under", 10 =>"3D Over-Under", 11 =>"Down2D Over-Under", 12 =>"Odd-Even", 13 =>"2in3", 14 =>"3in4", 15 =>"3in5", 16 =>"D3F", 17 =>"Down3F", 18 =>"D2F", 19 =>"D1F", 20 =>"S3F", 21 =>"Unit1", 22 =>"Unit2", 23 =>"Unit3", 24 =>"2S");

  	$rlang['na-top']          = $lang_lot[15];									//"หน้าบน";
    $rlang['3-bot']           = $lang_lot[45];									//"3ล่าง";
    $rlang['3-bot-na']        = "3ล่างหน้า_en";
    $rlang['3-bot-na']        = "3ล่างหน้า_en";
    $rlang['sort_by_yod']     = "เรียงตามยอด_en";
    $rlang['sort_by_num']     = "เรียงตามเลข_en";
    $rlang['wn_number']       = "เลขอันตราย_en";
    $rlang['Awards']          = $lang_lot[27];									//"ผลรางวัล";
    $rlang['6tua']            = "6ตัว_en";
    $rlang['monitor_menu3']   = "ตั้งสู้_en"; 

    
    $rlang['w_message'][1] = "กรุณากรอกข้อมูล";   
    $rlang['w_message'][2] = "ไม่พบข้อมูลที่บันทึก";
    $rlang['w_message'][3] = "เปลี่ยนรหัสผ่านสำเร็จ";
    $rlang['w_message'][4] = "รหัสผ่านเดิมไม่ถูกต้อง";

    $rlang['other'][1]     =  'คู่แข่งขัน';
    $rlang['other'][2]     =  'สต็อก';
    $rlang['other'][3]     =  'ปฏิเสธ';
    $rlang['other'][4]     =  'อันตราย';
    $rlang['other'][5]     =  'รันนิ่ง';
    $rlang['other'][6]     =  'แมตช์';
    $rlang['other'][7]     =  'เงินเดิมพัน';
    $rlang['other'][9]     =  'หุ้นส่วน';
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
	$rlang['other'][92]		=  "History";
	$rlang['other'][93]		=  "ราคาส่ง";		
	$rlang['other'][94]		=  "หวยชุด";			

 ?>