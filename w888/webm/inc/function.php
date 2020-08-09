<?php
date_default_timezone_set("Asia/Bangkok");
$timezone=0;
$time_stam=mktime(date("H")+$timezone,date("i"),date("s"),date("m"),date("d"),date("Y"));

$app_title = "TEXAS";
$app_name = "TEXAS";

$time_today=90;
$time_live=30;

$time_can_lotto=$time_stam - (60*30);   

$lothun_set=20; # 1 10 20

$price_laoset = 75; //ราคาหวยชุดลาว

$fstep_p=array(1=>"0.0","0-0.5","0.5","0.5-1","1","1-1.5","1.5","1.5-2","2","2-2.5","2.5","2.5-3","3","3-3.5","3.5","3.5-4","4"//17
,"4-4.5","4.5","4.5-5","5","5-5.5","5.5","5.5-6","6","6-6.5","6.5","6.5-7","7","7-7.5","7.5","7.5-8","8","8-8.5","8.5","8.5-9","9","9-9.5","9.5","9.5-10","10");

$email_lothun ="bomload@gmail.com"; 

$lot_rob= array(1 =>"เช้า","เที่ยง","บ่าย","เย็น"); 
$lot_rob2= array(0=>"ปิดรับ","เช้า","เที่ยง","บ่าย","เย็น"); 
#$arr_zone = array(1 =>"ช่อง9","MONEY","หวยรายวัน"); 
$arr_zone = array(1 =>"หวยไทย",2 =>"หวยหุ้นไทย",3 =>"หวยลาว" ,4=>"หวยมาเลเซีย",5=>"หวยเวียดนาม",6=>"หุ้นนิเคอิ",7=>"หุ้นฮั่งเส็ง",8=>"หุ้นดาวโจนส์",9=>"หุ้นสิงคโปร์",10=>"หุ้นอียิปต์",11=>"หุ้นรัสเซีย",12=>"หุ้นเยอรมัน",13=>"หุ้นอังกฤษ",14=>"หุ้นเกาหลี",15=>"หุ้นใต้หวัน",16=>"หุ้นจีน",17=>"หุ้นอินเดีย",18=>"จับยี่กี",19=>"หวยรายวัน"); 
$arr_zone_contry = array(1 =>"th",2 =>"th",3 =>"la" ,4=>"my",5=>"vn",6=>"jp",7=>"hk",8=>"us",9=>"sg",10=>"eg",11=>"ru",12=>"de",13=>"gb-eng",14=>"kr",15=>"tw",16=>"cn",17=>"in",18=>"cn",19=>"mm"); 
$lot_zone_bet= array(1 =>1,2 =>4,3 =>1 ,4=>1,5=>1,6=>2,7=>2,8=>1,9=>1,10=>1,11=>1,12=>1,13=>1,14=>1,15=>1,16=>2,17=>1,18=>96,19=>11); 

$arr_zone_pic = array(1 =>"20140905162045.png","mzl.xxqajpvj.png","lottery2.png"); 

$lot_robmun= array(1 =>"12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00"); 

$lot_open= array(0=>"ปิด","<span class='cr'>เปิด</span>"); 

$arr_sp_zone = array(1=>"มวยไทย" , 2=>"ไก่ชน"  , 3=>"วัวชน" , 4=>"วิ่งวัว" , 5=>"แข่งเรือ" , 6=>"บอล" , 7=>"บาสเก็ตบอล" , 8=>"ฮ๊อกกี้น้ำแข็ง" , 9=>"เทนนิส" , 10=>"แบตมินตัน" , 11=>"มวยสากล" , 12=>"แฮนด์บอล" , 13=>"โปโลน้ำ" , 14=>"วอลเลย์บอล" , 15=>"รถแข่ง" , 16=>"ฟุตซอล" , 17=>"เบสบอล" , 18=>"ปิงปอง" , 19=>"สนุกเกอร์" , 20=>"กอล์ฟ");
$arr_key_zone = array(1=>"muay_thai" , 2=>"fighting_cock"  , 3=>"bulls" , 4=>"running_cow" , 5=>"boat_racing" , 6=>"soccer" , 7=>"basketball" , 8=>"ice_hockey" , 9=>"tennis" , 10=>"badminton" , 11=>"boxing_mma" , 12=>"handball" , 13=>"water_polo" , 14=>"volleyball" , 15=>"motor" , 16=>"futsal" , 17=>"baseball" , 18=>"table_tennis" , 19=>"snook" , 20=>"golf");

$arr_sp = array(
	1=>  array("sp_key" => "muay_thai", 	"sp_name" => "มวยไทย"),
	2=>  array("sp_key" => "fighting_cock", "sp_name" => "ไก่ชน"),
	3=>  array("sp_key" => "bulls", 		"sp_name" => "วัวชน"),
	4=>  array("sp_key" => "running_cow", 	"sp_name" => "วิ่งวัว"),
	5=>  array("sp_key" => "boat_racing", 	"sp_name" => "แข่งเรือ"),
	6=>  array("sp_key" => "soccer", 		"sp_name" => "ฟุตบอล"),
	7=>  array("sp_key" => "basketball", 	"sp_name" => "บาสเก็ตบอล"),
	8=>  array("sp_key" => "ice_hockey", 	"sp_name" => "ฮ๊อกกี้น้ำแข็ง"),
	9=>  array("sp_key" => "tennis", 		"sp_name" => "เทนนิส"),
	10=> array("sp_key" => "badminton", 	"sp_name" => "แบตมินตัน"),
	11=> array("sp_key" => "boxing_mma", 	"sp_name" => "มวยสากล"),
	12=> array("sp_key" => "handball", 		"sp_name" => "แฮนด์บอล"),
	13=> array("sp_key" => "water_polo", 	"sp_name" => "โปโลน้ำ"),
	14=> array("sp_key" => "volleyball", 	"sp_name" => "วอลเลย์บอล"),
	15=> array("sp_key" => "motor", 		"sp_name" => "รถแข่ง"),
	16=> array("sp_key" => "futsal", 		"sp_name" => "ฟุตซอล"),
	17=> array("sp_key" => "baseball", 		"sp_name" => "เบสบอล"),
	18=> array("sp_key" => "table_tennis", 	"sp_name" => "ปิงปอง"),
	19=> array("sp_key" => "snook", 	    "sp_name" => "สนุกเกอร์"),
	20=> array("sp_key" => "golf", 	        "sp_name" => "กอล์ฟ"),
);

$arr_code_node = array(1=>"sc" , "oe" , "step"  , "my" , "bk" , "bad" , "bas" , "box" , "fut" , "hand" , "hock" , "motor" , "ten" , "vol" , "snook" , "golf");
$arr_code_zone_node = array("sc"=>6 , "oe"=>6 , "step"=>  6, "my"=>1 , "bk"=>7 , "bad"=>10 , "bas"=>17 , "box"=>11 , "fut"=>16 , "hand"=>12 , "hock"=>8 , "motor"=>15 , "ten"=>9 , "vol"=>14 , "snook"=>19 , "golf"=>20);
$arr_name_node = array(1=>"บอล HDC/OU/1X2" , "บอล OE" , "สเต๊ป"  , "มวยไทย" , "บาสเก็ตบอล" , "แบตมินตัน" , "เบสบอล" , "มวยสากล" , "ฟุตซอล" , "แฮนด์บอล" , "ฮ๊อกกี้น้ำแข็ง" , "รถแข่ง" , "เทนนิส" , "วอลเลย์บอล" , "สนุกเกอร์" , "กอล์ฟ");

$arr_province=array(1=>"กรุงเทพมหานคร " , "สมุทรปราการ " , "นนทบุรี " , "ปทุมธานี " , "พระนครศรีอยุธยา " , "อ่างทอง " , "ลพบุรี " , "สิงห์บุรี " , "ชัยนาท " , "สระบุรี" , "ชลบุรี " , "ระยอง " , "จันทบุรี " , "ตราด " , "ฉะเชิงเทรา " , "ปราจีนบุรี " , "นครนายก " , "สระแก้ว " , "นครราชสีมา " , "บุรีรัมย์ " , "สุรินทร์ " , "ศรีสะเกษ " , "อุบลราชธานี " , "ยโสธร " , "ชัยภูมิ " , "อำนาจเจริญ " , "หนองบัวลำภู " , "ขอนแก่น " , "อุดรธานี " , "เลย " , "หนองคาย " , "มหาสารคาม " , "ร้อยเอ็ด " , "กาฬสินธุ์ " , "สกลนคร " , "นครพนม " , "มุกดาหาร " , "เชียงใหม่ " , "ลำพูน " , "ลำปาง " , "อุตรดิตถ์ " , "แพร่ " , "น่าน " , "พะเยา " , "เชียงราย " , "แม่ฮ่องสอน " , "นครสวรรค์ " , "อุทัยธานี " , "กำแพงเพชร " , "ตาก " , "สุโขทัย " , "พิษณุโลก " , "พิจิตร " , "เพชรบูรณ์ " , "ราชบุรี " , "กาญจนบุรี " , "สุพรรณบุรี " , "นครปฐม " , "สมุทรสาคร " , "สมุทรสงคราม " , "เพชรบุรี " , "ประจวบคีรีขันธ์ " , "นครศรีธรรมราช " , "กระบี่ " , "พังงา " , "ภูเก็ต " , "สุราษฎร์ธานี " , "ระนอง " , "ชุมพร " , "สงขลา " , "สตูล " , "ตรัง " , "พัทลุง " , "ปัตตานี " , "ยะลา " , "นราธิวาส " , "บึงกาฬ");

#เลขพี่น้องมีดังนี้ (ไปกลับรวม 20 ตัว)
#01 12 23 34 45 56 67 78 89 90
#10 21 32 43 54 65 76 87 98 09

#เลขเบิ้ล
#00 11 22 33 44 55 66 77 88 99 

/*
3. เลขคู่คู่บน
4. เลขคู่คู่ล่าง
เลขคู่คู่มีดังนี้ (ไปกลับรวม 25 ตัว)
00 22 44 66 88
02 04 06 08 24 26 28 46 48 68

5. เลขคี่คี่บน
6. เลขคี่คี่ล่าง
เลขคี่คี่มีดังนี้ (ไปกลับรวม 25 ตัว)
11 33 55 77 99
13 15 17 19 35 37 39 57 59 79

*/
//$lot_zone["th"]= array(1 =>"หวยไทย",2 =>"หวยหุ้นไทย",3 =>"หวยลาว" ,4=>"หวยมาเลเซีย",5=>"หวยเวียดนาม",6=>"หุ้นนิเคอิ",7=>"หุ้นฮั่งเส็ง",8=>"หุ้นดาวโจนส์",9=>"หุ้นสิงคโปร์",10=>"หุ้นอียิปต์",11=>"หุ้นรัสเซีย",12=>"หุ้นเยอรมัน",13=>"หุ้นอังกฤษ",14=>"หวยเกาหลี",15=>"หวยใต้หวัน",16=>"หวยรายวัน",17=>"หวยรายวัน",18=>"หวยรายวัน",19=>"หวยรายวัน");

$lot_zone["th"]= array(1 =>"หวยไทย",2 =>"หวยหุ้นไทย",3 =>"หวยลาว" ,4=>"หวยมาเลเซีย",5=>"หวยเวียดนาม",6=>"หุ้นนิเคอิ",7=>"หุ้นฮั่งเส็ง",8=>"หุ้นดาวโจนส์",9=>"หุ้นสิงคโปร์",10=>"หุ้นอียิปต์",11=>"หุ้นรัสเซีย",12=>"หุ้นเยอรมัน",13=>"หุ้นอังกฤษ",14=>"หุ้นเกาหลี",15=>"หุ้นใต้หวัน",16=>"หุ้นจีน",17=>"หุ้นอินเดีย",18=>"จับยี่กี",19=>"หวยรายวัน"); 

$lot_zone_nrob= array(1 =>1,2 =>4,3 =>1 ,4=>1,5=>1,6=>2,7=>2,8=>1,9=>1,10=>1,11=>1,12=>1,13=>1,14=>1,15=>1,16=>2,17=>1,18=>96,19=>11);
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
*/
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย", 24 =>"2โต๊ดบน");

#$lot_type_not= array(0 =>"3บน", 1 =>"3ล่าง", 2 =>"3โต๊ด" , 3 =>"3ตัวบน สูง-ต่ำ", 4 =>"2ใน3", 5 =>"3ใน4", 6 =>"3ใน5", 7 =>"3ตัวหน้าบน", 8 =>"3ล่างหน้า", 9 =>"2ตัวหน้าบน", 10 =>"วิ่งหน้าบน", 11 =>"3 โต๊ดหน้าบน", 12 =>"ปักหลักร้อย", 13 =>"2โต๊ดบน");
$lot_type_not= array(  2 =>"3ล่าง"
, 3 =>"1ตัวบน สูง-ต่ำ" , 6 =>"2ตัวบน สูง-ต่ำ", 7 =>"3ตัวบน สูง-ต่ำ", 8 =>"2ตัวล่าง สูง-ต่ำ", 9 =>"คี่-คู่", 10 =>"2ใน3", 11 =>"3ใน4", 12 =>"3ใน5", 13 =>"3ตัวหัวบน", 14 =>"3ล่างหัว", 15 =>"2ตัวหัวบน", 16 =>"วิ่งหัวบน", 17 =>"3 โต๊ดหัวบน", 21 =>"2โต๊ดบน");

$cal_lothun_url = "cal_lothun.php";
$cal_lotto_url = "cal_lotto.php";

$m_price= array(1 => "MY","HK","EU"); 
$m_lang= array(1 => "English","简体中文","ภาษาไทย","Tiếng Việt","ພາສາລາວ","ភាសាខ្មែរ","မြန်မာ","Indonesian","日本語","한국어"); 
$arr_lang= array(1 => "en","cn","th","vn","la","km","mm","id", "jp","ko"); 
$txt_data= array("0","1","2","3","4","5","6","7","8","9","A","B","C","D","E","F","G","H","J","K","M","N","P","Q","R","S","T","U","V","W","X","Y","Z");

$ab_bank= array(1=>"กสิกรไทย","ไทยพาณิชย์","กรุงเทพ","กรุงไทย","ทหารไทย","กรุงศรีอยุธยา"); 
#$m_active= array(0 =>"<span class='red'>ระงับ</span>" ,"เปิดใช้งาน"); 
#$n_news= array(1 => "สาธารณะ","สำคัญ"); 
#$sport_type = array(1 =>"ฟุตบอล", 2 =>"มวยไทย", 3 =>"บาสเกตบอล", 4 =>"อเมริกันฟุตบอล", 5 =>"เบสบอล", 6 =>"ฮอกกี้", 7 =>"เทนนิส", 8 =>"วอลเลย์บอล", 9 =>"แบดมินตัน", 10 =>"สนุกเกอร์");
$sport_type = array(1 =>"มวยไทย", 2 =>"รถแข่ง", 3 =>"เรือแข่ง", 4 =>"ไก่ชน", 5 =>"ม้าแข่ง", 6 =>"ฟุตบอล", 7 =>"บาสเกตบอล", 8 =>"วอลเลย์บอล", 9 =>"แบดมินตัน", 10 =>"เทนนิส");

$sport_type_list = array(1=>"มวยไทย" , 6=>"ฟุตบอล" , 7=>"บาสเก็ตบอล" , 8=>"ฮ๊อกกี้น้ำแข็ง" , 9=>"เทนนิส" , 10=>"แบตมินตัน" , 11=>"มวย" , 12=>"แฮนด์บอล" , 13=>"โปโลน้ำ" , 14=>"วอลเลย์บอล");
$sport_type_img = array(
	1 =>"http://ohoking.com/template/sportsicon/muay_thai.png", 
	6 =>"http://ohoking.com/template/sportsicon/soccer.png", 
	7 =>"http://ohoking.com/template/sportsicon/basketball.png", 
	8 =>"http://ohoking.com/template/sportsicon/ice_hockey.png", 
	9 =>"http://ohoking.com/template/sportsicon/tennis.png",
	10 =>"http://ohoking.com/template/sportsicon/badminton.png", 
	11 =>"http://ohoking.com/template/sportsicon/boxing_mma.png", 
	12 =>"http://ohoking.com/template/sportsicon/handball.png", 
	13 =>"http://ohoking.com/template/sportsicon/water_polo.png", 
	14 =>"http://ohoking.com/template/sportsicon/volleyball.png", 
);


$arr["list_game"][0]["type"] = "1";
$arr["list_game"][0]["name"] = "มวยสด";
$arr["list_game"][1]["type"] = "2";
$arr["list_game"][1]["name"] = "ไก่ชน";
$arr["list_game"][2]["type"] = "3";
$arr["list_game"][2]["name"] = "วัวชน";
$arr["list_game"][3]["type"] = "4";
$arr["list_game"][3]["name"] = "วิ่งวัว";
$arr["list_game"][4]["type"] = "5";
$arr["list_game"][4]["name"] = "แข่งเรือ";
$arr["list_game"][5]["type"] = "6";
$arr["list_game"][5]["name"] = "บอล";

#$sport_zone = array(1 =>"ก่อนเวลา", 2 =>"สด");

$sport_man = array(
1 =>"FT.HDC[บ้าน]", 2 =>"FT.HDC[เยือน]", 3 =>"FT.GOAL[สูง]", 4 =>"FT.GOAL[ต่ำ]"
, 5 =>"FT.1X2[บ้านชนะ]", 6 =>"FT.1X2[เสมอ]", 7 =>"FT.1X2[เยือนชนะ]",8 =>"FT.ODD[คี่]", 9=>"FT.EVEN[คู่]"
,11 =>"1H.HDC[บ้าน]", 12 =>"1H.HDC[เยือน]", 13 =>"1H.GOAL[สูง]", 14 =>"1H.GOAL[ต่ำ]"
, 15 =>"1H.1X2[บ้านชนะ]", 16 =>"1H.1X2[เสมอ]", 17 =>"1H.1X2[เยือนชนะ]",18 =>"1H.ODD[คี่]", 19=>"1H.EVEN[คู่]"
);


#$sport_mix = array(1 =>"คู่เดียว", 2 =>"หลายคู่");
#$sc_lang= array(1 =>  "กำลังแข่งขัน","จบการแข่งขัน","ยกเลิกคืนเงิน"); 
#$ball_bill= array(1 =>"<span class='cg'>ชนะ</span>","<span class='cbu'>คืนทุน</span>", "<span class='cr'>แพ้</span>", "<span class='cr'>ยกเลิก</span>", "<span class='cb'>รอผล</span>"); 
#$ball_play= array(1 =>"<span class='cg'>ได้เต็ม</span>","<span class='cg'>ได้ครึ่ง</span>","<span class='cbu'>คืนทุน</span>", "<span class='cr'>เสียเต็ม</span>", "<span class='cr'>เสียครึ่ง</span>", "<span class='cr'>ยกเลิก</span>", "<span class='cb'>รอผล</span>"); 
$x_level= array(1 => "ซุปเปอร์","ซีเนียร์", "มาสเตอร์","เอเย่น","เมมเบอร์"); 
$x_name= array(1 => "SP","SN", "MT","AG",""); 
$m_payment= array(1 => "ชำระ","ถอน", "เปิดบัญชี","ปิดบัญชี"); 
$m_login= array(1 => "บัญชีไม่ได้มีอยู่แล้ว","รหัสผ่านไม่ถูกต้อง", "บัญชีถูกล็อค","ล็อคสกุลเงินประเทศ","ล็อคประเทศสกุลเงิน","โดเมนเริ่มต้นไม่ถูกต้อง","โดเมนเข้าสู่ระบบไม่ถูกต้อง","ไม่มีสมาชิกเข้าสู่ระบบ","ไม่มีเอเยนต์เข้าสู่ระบบ","คุณไม่ได้รับสิทธิในการเข้าสู่ระบบ","แบล็คลิส","รหัสรักษาความปลอดภัยผิดถูกล็อค"); 

// $timezoneArr = array('gmt', 'gmt+01:00', 'gmt+02:00', 'gmt+03:00', 'gmt+04:00', 'gmt+05:00', 'gmt+06:00', 'gmt+07:00', 'gmt+08:00', 'gmt+09:00', 'gmt+09:30', 'gmt+10:00', 'gmt+11:00', 'gmt+12:00', 'gmt-11:00', 'gmt-10:00', 'gmt-09:00', 'gmt-08:00', 'gmt-07:00', 'gmt-06:00', 'gmt-05:00', 'gmt-04:00', 'gmt-03:00', 'gmt-02:00', 'gmt-01:00');
$timezoneArr = array(
	'gmt' 		=> array('php_code' => 'Etc/GMT', 	  'city' => 'Belfast, Cardiff, Dublin, Edinburgh, Iceland, Rep. of Ireland, Lisbon, Monrovia, Morocco, Portugal') , 
	// 'gmt00:00'  => array('php_code' => 'Etc/GMT0' ,   'city' => '' ) , 
	// 'gmt+00:00' => array('php_code' => 'Etc/GMT-0',   'city' => '' ) , 
	'gmt+01:00' => array('php_code' => 'Etc/GMT-1',   'city' => 'Amsterdam, Berlin, Berne, Bratislava, Brussels, Budapest, European Union, Lagos, Madrid, Malta, Prague, Paris, Riga, Rome, Sarajevo, Valletta, Vienna, Warsaw, Zagreb' ) , 
	'gmt+02:00' => array('php_code' => 'Etc/GMT-2',   'city' => 'Athens, Bucharest, Cairo, Cape Town, Cyprus, Estonia, Finland, Greece, Harare, Helsinki, Israel, Istanbul, Latvia, Pretoria' ) , 
	'gmt+03:00' => array('php_code' => 'Etc/GMT-3',   'city' => 'Ankara, Aden, Amman, Baghdad, Bahrain, Beirut, Dammam, Kuwait, Moscow, Nairobi, Riyadh, St. Petersburg, Tehran, Iraq' ) , 
	'gmt+04:00' => array('php_code' => 'Etc/GMT-4',   'city' => 'Abu Dhabi, Baku, Kabul, Kazan, Muscat, Tehran, Tbilisi, Volgograd, Afghanistan' ) , 
	'gmt+05:00' => array('php_code' => 'Etc/GMT-5',   'city' => 'Calcutta, Colombo, Islamabad, Madras, New Dehli, India, Nepal' ) , 
	'gmt+06:00' => array('php_code' => 'Etc/GMT-6',   'city' => 'Almaty, Dhakar, Kathmandu, Colombo, Sri Lanka, Rangoon, Myanmar' ) , 
	'gmt+07:00' => array('php_code' => 'Etc/GMT-7',   'city' => 'Bangkok, Hanoi, Jakarta, Phnom Penh' ) , 
	'gmt+08:00' => array('php_code' => 'Etc/GMT-8',   'city' => 'Beijing, Chongqing, Hong Kong, Kuala Lumpur, Manila, Perth, Singapore, Taipei, Urumqi' ) , 
	'gmt+09:00' => array('php_code' => 'Etc/GMT-9',   'city' => 'Osaka, Seoul, Sapporo, Seoul, Tokyo, Yakutsk, Adelaide and Darwin, Central Australia' ) , 
	'gmt+09:30' => array('php_code' => 'Etc/GMT-9',   'city' => 'Brisbane, Canberra, Guam, Hobart, Melbourne, Port Moresby, Sydney, Vladivostok' ) , 
	'gmt+10:00' => array('php_code' => 'Etc/GMT-10',  'city' => 'Magadan, New Caledonia, Solomon Is') , 
	'gmt+11:00' => array('php_code' => 'Etc/GMT-11',  'city' => 'Auckland, Christchurch NZ., Fiji, Kamchatka, Marshall Is., Samoa, Wellington, Suva') , 
	'gmt+12:00' => array('php_code' => 'Etc/GMT-12',  'city' => 'Samoa') , 
	'gmt-12:00' => array('php_code' => 'Etc/GMT+12',  'city' => 'Eniwetok, Kwaialein') , 
	'gmt-11:00' => array('php_code' => 'Etc/GMT+11',  'city' => 'Midway Island') , 
	'gmt-10:00' => array('php_code' => 'Etc/GMT+10',  'city' => 'Hawaii, Honolulue') , 
	'gmt-09:00' => array('php_code' => 'Etc/GMT+9',   'city' => 'Alaska, French Polynesia' ) , 
	'gmt-08:00' => array('php_code' => 'Etc/GMT+8',   'city' => 'Anchorage, British Columbia Cent., Los Angeles, San Diego, San Francisco, Seattle, Tijuana, Vancouver, Yukon, Pitcairn Islands' ) , 
	'gmt-07:00' => array('php_code' => 'Etc/GMT+7',   'city' => 'British Columbia N.E., Denver, Edmonton, Phoenix, Salt Lake City, Santa Fe, Saskatchewan West' ) , 
	'gmt-06:00' => array('php_code' => 'Etc/GMT+6',   'city' => 'Chicago, Dallas, El Paso, Ft. Worth, Guatemala, Houston, Indiana [west], Manitoba, Memphis, New Orleans, 
Mexico City, Ontario N.W., San Antonio-Texas, Saskatchewan East, St. Louis, Winnipeg' ) , 
	'gmt-05:00' => array('php_code' => 'Etc/GMT+5',   'city' => 'Bogota, Boston, Indiana [east], Kingston, Lima, Miami, Montreal, New York, Ontario, Quebec, Washington' ) , 
	'gmt-04:00' => array('php_code' => 'Etc/GMT+4',   'city' => 'Caracas, Labrador, La Paz, Maritimes, Santiago' ) , 
	'gmt-03:00' => array('php_code' => 'Etc/GMT+3',   'city' => 'Brasilia, Buenos Aires, Georgetown, Montevideo, Rio de Janeiro' ) , 
	'gmt-02:00' => array('php_code' => 'Etc/GMT+2',   'city' => 'Mid-Atlantic' ) , 
	'gmt-01:00' => array('php_code' => 'Etc/GMT+1',   'city' => 'Azores, Cape Verde Is' ) ,
	// 'gmt-00:00' => array('php_code' => 'Etc/GMT+0',   'city' => '' ) ,
);

#$m_news= array(1=>"ฟุตบอล","หวย","เกมส์","คาสิโน"); 
#$ab_status= array(1 =>"สำเร็จ", "<span class='cr'>ผิดพลาด</span>", "รอ"); 
#$ab_bet= array(0 =>"สำเร็จ", "รอ", "<span class='cr'>ยกเลิก</span>"); 
#$ab_type= array(1 =>"ฝาก", "ถอน"); 


################### แปลงวันที่
###########################
// 	function _cvf($strDate, $mode , $lg="th"){

// 	$lang_post = trim($lg);
// 	if($lang_post==""){
// 		$lang_post = "th";
// 	}
//     require("../lang/".$lang_post.".php");	


// 	$month_key = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"); 
// 	$month_full_list["th"] = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
// 	$month_short_list["th"] = array("ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
// 	$month_full_list["en"] = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
// 	$month_short_list["en"] = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
// 	$month_full_list["mm"] = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
// 	$month_short_list["mm"] = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");

	
	
// 	$month_full = $month_full_list[$lg];
// 	$month_short = $month_short_list[$lg];
	
	
// 	if(!isset($month_full_list[$lg])){
// 		$month_full = $month_full_list["th"];
// 		$month_short = $month_short_list["th"];
// 	}
	
	
	
	
// 	$strDate=date("Y-m-d H:i:s",$strDate); // รูปแบบ Y-m-d H:i:s
// 	$dYear = substr($strDate,0,4);	
// 	$dMonth = substr($strDate,5,2);
// 	$dDay = substr($strDate,8,2);
// 	$dTime = substr($strDate,11,5); 
// 	$dsecon=substr($strDate,17,2); 
	
// 	if($dYear < 2550){ $dYear += 543; }
	
// 	switch($mode){
// 		case '1':			// วันที่ 12 เดือนสิงหาคม พ.ศ. 2550
// 			$thMonth = array_combine($month_key, $month_full);  
// 			$new_date = "".$lang_m[23]." ".$dDay." ".$lang_fn_g['month']."".$thMonth[$dMonth]." ".$lang_fn_g['BE']."".$dYear ;
// 		break;
// 		case '2':			// วันที่ 12 เดือนสิงหาคม พ.ศ. 2550 เวลา 12.30
// 			$thMonth = array_combine($month_key, $month_full);  
// 			$new_date = "".$lang_m[23]." ".$dDay." ".$lang_fn_g['month']."".$thMonth[$dMonth]." ".$lang_fn_g['BE']."".$dYear." ".$lang_m[9]." ".$dTime ;
// 		break;
		
		
// 		case '3':			// 12 สิงหาคม พ.ศ. 2550
// 			$thMonth = array_combine($month_key, $month_full);  
// 			$new_date = $dDay." ".$thMonth[$dMonth]." ".$dYear ;
// 		break;
// 		case '4':			// 12 สิงหาคม พ.ศ. 2550 เวลา 12.30
// 			$thMonth = array_combine($month_key, $month_full);  
// 			$new_date = $dDay." ".$thMonth[$dMonth]." ".$dYear ." ".$lang_m[9]." ".$dTime ;
// 		break;
		
// 		case '5':			// 12 ส.ค. 50
// 			$thMonth = array_combine($month_key, $month_short); 
// 			$new_date = $dDay." ".$thMonth[$dMonth]." ". substr($dYear,2,2);
// 		break;
// 		case '6':			// 12 ส.ค. 50 12.30
// 			$thMonth = array_combine($month_key, $month_short); 
// 			$new_date = $dDay." ".$thMonth[$dMonth]." ". substr($dYear,2,2)." ".$dTime;
// 		break;
		
		
// 		case '7':			// 12/08/2550
// 			$new_date = $dDay."/".$dMonth."/".$dYear;
// 		break;
// 		case '8':			// 12/08/2550 12.30
// 			$new_date = $dDay."/".$dMonth."/".$dYear." ".$dTime;
// 		break;
		
// 		case '9':			// 12-08-2550
// 			$new_date = $dDay."-".$dMonth."-".$dYear;
// 		break;
// 		case '10':			// 12-08-2550 12.30
// 			$new_date = $dDay."-".$dMonth."-".$dYear." ".$dTime;
// 		break;
		
// 		case '11':			// 12/08/2010
// 			$new_date = $dDay."/".$dMonth."/".substr($strDate,0,4);
// 		break;
// 		case '12':			// 12/08/2010 12.30
// 			$new_date = $dDay."/".$dMonth."/".substr($strDate,0,4)." ".$dTime;
// 		break;
		
// 		case '13':			// 12-08-2010
// 			$new_date = $dDay."-".$dMonth."-".substr($strDate,0,4);
// 		break;
// 		case '14':			// 12-08-2010 12.30
// 			$new_date = $dDay."-".$dMonth."-".substr($strDate,0,4)." ".$dTime;
// 		break;
// 		case '15':			// 12 สิงหาคม พ.ศ. 2550 เวลา 12.30
// 			$thMonth = array_combine($month_key, $month_full);  
// 			$new_date = $dDay." ".$thMonth[$dMonth]." ".$dYear ." ".$lang_m[9]."  ".$dTime.":".$dsecon ;
// 		break;
// 	}	
	
// 	return $new_date;
// }
	
function _cvf($strDate, $mode , $lg="th"){
	$month_key = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"); 
	$month_full_list["th"] = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
	$month_short_list["th"] = array("ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
	
    $month_full_list["la"] = array("ມັງກອນ", "ກຸມພາ", "ມີນາ", "ເມສາ", "ພຶດສະພາ", "ມິຖຸນາ", "ກໍລະກົດ", "ສິງຫາ", "ກັນຍາ", "ຕຸລາ", "ພະຈິກ", "ທັນວາ");
    $month_short_list["la"] = array("ມັງກອນ", "ກຸມພາ", "ມີນາ", "ເມສາ", "ພຶດສະພາ", "ມິຖຸນາ", "ກໍລະກົດ", "ສິງຫາ", "ກັນຍາ", "ຕຸລາ", "ພະຈິກ", "ທັນວາ");
	
	$month_full_list["en"] = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
	$month_short_list["en"] = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
	
	$month_full_list["mm"] = array("ဇန္နဝါရီလ", "ဖေဖေါ်ဝါရီလ", "မတ်လ", "ဧပြီလ", "မေ", "ဇွန်လ", "ဇူလိုင်လ", "သြဂုတ်လ", "စက်တင်ဘာလ", "အောက်တိုဘာလ", "နိုဝင်ဘာလ", "ဒီဇင်ဘာလ");
	$month_short_list["mm"] = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
	
	$month_full = $month_full_list[$lg];
	$month_short = $month_short_list[$lg];
	
	
	if(!isset($month_full_list[$lg])){
		$month_full = $month_full_list["th"];
		$month_short = $month_short_list["th"];
	}
	
	
	
	
	$strDate=date("Y-m-d H:i:s",$strDate); // รูปแบบ Y-m-d H:i:s
	$dYear = substr($strDate,0,4);	
	$dMonth = substr($strDate,5,2);
	$dDay = substr($strDate,8,2);
	$dTime = substr($strDate,11,5); 
	$dsecon=substr($strDate,17,2); 
	
	if($dYear < 2550){ $dYear += 543; }
	
	switch($mode){
		case '1':			// วันที่ 12 เดือนสิงหาคม พ.ศ. 2550
			$thMonth = array_combine($month_key, $month_full);  
			$new_date = "วันที่ ".$dDay." เดือน".$thMonth[$dMonth]." พ.ศ.".$dYear ;
		break;
		case '2':			// วันที่ 12 เดือนสิงหาคม พ.ศ. 2550 เวลา 12.30
			$thMonth = array_combine($month_key, $month_full);  
			$new_date = "วันที่ ".$dDay." เดือน".$thMonth[$dMonth]." พ.ศ.".$dYear." เวลา ".$dTime ;
		break;
		
		
		case '3':			// 12 สิงหาคม พ.ศ. 2550
			$thMonth = array_combine($month_key, $month_full);  
			$new_date = $dDay." ".$thMonth[$dMonth]." ".$dYear ;
		break;
		case '4':			// 12 สิงหาคม พ.ศ. 2550 เวลา 12.30
			$thMonth = array_combine($month_key, $month_full);  
			$new_date = $dDay." ".$thMonth[$dMonth]." ".$dYear ." เวลา ".$dTime ;
		break;
		
		case '5':			// 12 ส.ค. 50
			$thMonth = array_combine($month_key, $month_short); 
			$new_date = $dDay." ".$thMonth[$dMonth]." ". substr($dYear,2,2);
		break;
		case '6':			// 12 ส.ค. 50 12.30
			$thMonth = array_combine($month_key, $month_short); 
			$new_date = $dDay." ".$thMonth[$dMonth]." ". substr($dYear,2,2)." ".$dTime;
		break;
		
		
		case '7':			// 12/08/2550
			$new_date = $dDay."/".$dMonth."/".$dYear;
		break;
		case '8':			// 12/08/2550 12.30
			$new_date = $dDay."/".$dMonth."/".$dYear." ".$dTime;
		break;
		
		case '9':			// 12-08-2550
			$new_date = $dDay."-".$dMonth."-".$dYear;
		break;
		case '10':			// 12-08-2550 12.30
			$new_date = $dDay."-".$dMonth."-".$dYear." ".$dTime;
		break;
		
		case '11':			// 12/08/2010
			$new_date = $dDay."/".$dMonth."/".substr($strDate,0,4);
		break;
		case '12':			// 12/08/2010 12.30
			$new_date = $dDay."/".$dMonth."/".substr($strDate,0,4)." ".$dTime;
		break;
		
		case '13':			// 12-08-2010
			$new_date = $dDay."-".$dMonth."-".substr($strDate,0,4);
		break;
		case '14':			// 12-08-2010 12.30
			$new_date = $dDay."-".$dMonth."-".substr($strDate,0,4)." ".$dTime;
		break;
		case '15':			// 12 สิงหาคม พ.ศ. 2550 เวลา 12.30
			$thMonth = array_combine($month_key, $month_full);  
			$new_date = $dDay." ".$thMonth[$dMonth]." ".$dYear ." เวลา ".$dTime.":".$dsecon ;
		break;
	}	
	
	return $new_date;
}
	
function _i_iset($set){
	if($set==1){
		$txt="i1";
		}elseif($set==2){
		$txt="i2";
		}elseif($set==5){
		$txt="i3-i5";
		}elseif($set==10){
		$txt="i6-i10";
		}elseif($set==15){
		$txt="i11-i15";
		}elseif($set==20){
		$txt="i16-i20";	
		}
	
return $txt;	
}

function _cut_iset($rob, $set){
	global $time_stam;
	$dd=date("Hi",$time_stam);
	
	$set=$set.',';
	
	   if($rob==1){
		$set=$set;
		}elseif($rob==2){
			#x1,x2,x3,x4,x5,x6,x7,x8,x9,x10,x11,x12,x13,x14,x15,x16,x17,x18,x19,x20,
			if($dd>1224){
		     $set=str_replace(array('x2,','x3,','x4,','x5,','x6,','x7,','x8,','x9,','x10,','x11,','x12,','x13,','x14,','x15,','x16,','x17,','x18,','x19,','x20,'),array(''),$set);  
			  }elseif($dd>1219){
		     $set=str_replace(array('x3,','x4,','x5,','x6,','x7,','x8,','x9,','x10,','x11,','x12,','x13,','x14,','x15,','x16,','x17,','x18,','x19,','x20,'),array(''),$set);  
			  }elseif($dd>1214){
		     $set=str_replace(array('x6,','x7,','x8,','x9,','x10,','x11,','x12,','x13,','x14,','x15,','x16,','x17,','x18,','x19,','x20,'),array(''),$set);   
			 }elseif($dd>1209){
		     $set=str_replace(array('x11,','x12,','x13,','x14,','x15,','x16,','x17,','x18,','x19,','x20,'),array(''),$set);  
			 }elseif($dd>1204){ 
			 $set=str_replace(array('x16,','x17,','x18,','x19,','x20,'),array(''),$set);
			  }
						
		}elseif($rob==3){
		$set=$set;			
		}elseif($rob==4){
			#x1,x2,x3,x4,x5,x6,x7,x8,x9,x10,x11,x12,x13,x14,x15,x16,x17,x18,x19,x20,
			if($dd>1624){
		     $set=str_replace(array('x2,','x3,','x4,','x5,','x6,','x7,','x8,','x9,','x10,','x11,','x12,','x13,','x14,','x15,','x16,','x17,','x18,','x19,','x20,'),array(''),$set);  
			  }elseif($dd>1619){
		     $set=str_replace(array('x3,','x4,','x5,','x6,','x7,','x8,','x9,','x10,','x11,','x12,','x13,','x14,','x15,','x16,','x17,','x18,','x19,','x20,'),array(''),$set);  
			  }elseif($dd>1614){
		     $set=str_replace(array('x6,','x7,','x8,','x9,','x10,','x11,','x12,','x13,','x14,','x15,','x16,','x17,','x18,','x19,','x20,'),array(''),$set);   
			 }elseif($dd>1609){
		     $set=str_replace(array('x11,','x12,','x13,','x14,','x15,','x16,','x17,','x18,','x19,','x20,'),array(''),$set);  
			 }elseif($dd>1604){ 
			 $set=str_replace(array('x16,','x17,','x18,','x19,','x20,'),array(''),$set);
			  }
		}
	
return $set;	}
	
	
	function _rob_hun(){
	global $time_stam;
	$dd=date("Hi",$time_stam);
	
                        if($dd<600){ $xx=0; }
				        elseif($dd<950){ $xx=1; }
					    elseif($dd<1226){ $xx=2; }
						elseif($dd<1420){ $xx=3; }
						elseif($dd<1629){ $xx=4; }
						else{ $xx=0; }
			
	return $xx;}
	
	
	function _rob_hun_run(){
	global $time_stam;
	$dd=date("Hi",$time_stam);
	
                        if($dd<600){ $xx=0; }
				        elseif($dd<1000){ $xx=1; }
					    elseif($dd<1230){ $xx=2; }
						elseif($dd<1425){ $xx=3; }
						elseif($dd<1645){ $xx=4; }
						else{ $xx=0; }
			
	return $xx;}

		
function _close_hun($rob ){

				        if($rob==1){ $hh=9;   $mm=49;   }
					    elseif($rob==2){ $hh=12;   $mm=25;   }
						elseif($rob==3){ $hh=14;  $mm=19;   }
						elseif($rob==4){ $hh=16;   $mm=28;  }

			
	return array("hh"=>$hh,"mm"=>$mm);
	
	}
	
	
	function _checkbet_hun(){	
	global $time_stam;
	$dd=date("Hi",$time_stam);
$val=0;

$rob=_rob_hun();
if($rob==1 and $dd<950){ $val=1; }
elseif($rob==2 and $dd<1225){ $val=1; }
elseif($rob==3 and $dd<1420){ $val=1; }
elseif($rob==4 and $dd<1628){ $val=1; }

return $val;
}	
	

function _bdate(){
global $time_zone;	
global $time_stam;


if((date("His",$time_stam)>=0) and (date("His",$time_stam)<=80000)){
	$view_date=date("d-m-Y",mktime(date("H")+$time_zone,date("i"),date("s"),date("m"),date("d")-1,date("Y")));
	}else{
		$view_date=date("d-m-Y",$time_stam);
		}		

return $view_date;
	}
	
	function _ldate(){
global $timezone;	
global $time_stam;
global $num_rob;

/*
if((date("Hi", $time_stam)>=0) and (date("Hi", $time_stam)<=900)){
	$view_date=date("d-m-Y",mktime(date("H")+$timezone,date("i"),date("s"),date("m"),date("d")-1,date("Y")));
	}else{$view_date=date("d-m-Y",$time_stam);}		
*/
$view_date=date("d-m-Y",$time_stam);


return $view_date;
	}
	
	

	
	function _bdate2(){
global $timezone;	
global $time_stam;
global $num_rob;

if((date("Hi", $time_stam)>=0) and (date("Hi", $time_stam)<=1200)){
	$view_date=date("d-m-Y",mktime(date("H")+$timezone,date("i"),date("s"),date("m"),date("d")-1,date("Y")));
	}else{$view_date=date("d-m-Y",$time_stam);}		



return $view_date;
	}
	

	
function _zt($zone, $type){
/*
$sport_man = array(
1 =>"FT.HDC[บ้าน]", 2 =>"FT.HDC[เยือน]", 3 =>"FT.GOAL[สูง]", 4 =>"FT.GOAL[ต่ำ]"
, 5 =>"FT.1X2[บ้านชนะ]", 6 =>"FT.1X2[เสมอ]", 7 =>"FT.1X2[เยือนชนะ]",8 =>"FT.ODD[คี่]", 9=>"FT.EVEN[คู่]"
,11 =>"1H.HDC[บ้าน]", 12 =>"1H.HDC[เยือน]", 13 =>"1H.GOAL[สูง]", 14 =>"1H.GOAL[ต่ำ]"
, 15 =>"1H.1X2[บ้านชนะ]", 16 =>"1H.1X2[เสมอ]", 17 =>"1H.1X2[เยือนชนะ]",18 =>"1H.ODD[คี่]", 19=>"1H.EVEN[คู่]"
);
*/
		###########เต็มเวลา
	if($zone==1){
		if($type==1){ $nz=1;}
		elseif($type==2){ $nz=2;}
	}elseif($zone==2){
		if($type==1){ $nz=3;}
		elseif($type==2){ $nz=4;}
	}elseif($zone==5){
		if($type==1){ $nz=5;}
		elseif($type==2){ $nz=7;}
		elseif($type==3){ $nz=6;}
	}elseif($zone==7){
		if($type==1){ $nz=8;}
		elseif($type==2){ $nz=9;}
		
		
	############## ครึ่งแรก
	}elseif($zone==3){
		if($type==1){ $nz=11;}
		elseif($type==2){ $nz=12;}
	}elseif($zone==4){
		if($type==1){ $nz=13;}
		elseif($type==2){ $nz=14;}
	}elseif($zone==6){
		if($type==1){ $nz=15;}
		elseif($type==2){ $nz=17;}
		elseif($type==3){ $nz=16;}
	}elseif($zone==8){
		# คี่ คู่
		if($type==1){ $nz=18;}
		elseif($type==2){ $nz=19;}
	}
	
	return $nz;
	
	}
	
	
function _rob($xrob=null){
	
global $time_zone;	
global $time_stam;
if($xrob!=""){
$xx=$xrob;
	}else{
     $dd=date("His",$time_stam);	
	if($dd>=80000 and $dd<100000){$xx=1;}
	elseif($dd>=100000 and $dd<120000){$xx=2;}
	elseif($dd>=120000 and $dd<140000){$xx=3;}
	elseif($dd>=140000 and $dd<160000){$xx=4;}
	elseif($dd>=160000 and $dd<180000){$xx=5;}
	elseif($dd>=180000 and $dd<200000){$xx=6;}
	elseif($dd>=200000 and $dd<210000){$xx=7;}
	elseif($dd>=210000 and $dd<220000){$xx=8;}
	elseif($dd>=220000 and $dd<235959){$xx=9;}
	elseif($dd>=0 and $dd<20000){$xx=10;}
	elseif($dd>=20000 and $dd<40000){$xx=11;}
	else{$xx=12;}

	}
	
	return $xx;
	}
	
	function _r_t($id=null){
	global $num_rob;
	
	if($id!=""){$d=$id;}
	else{$d=_rob();}
	
	if($d==1){$xx=' 8.00-10.00';}
	elseif($d==2){$xx=' 10:00-12:00';}
	elseif($d==3){$xx=' 12:00-14:00';}
	elseif($d==4){$xx=' 14:00-16:00';}
	elseif($d==5){$xx=' 16:00-18:00';}
	elseif($d==6){$xx=' 18:00-20:00';}
	elseif($d==7){$xx=' 20:00-22:00';}
	elseif($d==8){$xx=' 22:00-24:00';}
	elseif($d==9){$xx=' 0:00-2:00';}
	elseif($d==10){$xx=' 2:00-4:00';}
	elseif($d==11){$xx=' 4:00-6:00';}
	else{$xx=' 6:00-8:00';}

	
	return $xx; }
	
	
	
	function _hdc_pay($hdc1 ,$percen ){
		$xx1=$hdc1-1;
		$xx2=$xx1+($percen / 100);
		$xx3=3-$xx2;

	return $xx3;
	}
	
	
function _hdca($hdc1 , $hdc2 , $big ){
	if($big=="a"){$big=2;}
	elseif($big=="h"){$big=1;}
	
	############################ บอล 20ตังค์
if($big==1){
		if($hdc1>(0.71) and $hdc1<(0.80)){
			    $h1=1.72;  $h2=2.10;
		 }elseif($hdc1>=(0.80) and $hdc1<(0.90)){
                $h1=1.80;  $h2=2.00;
		 }elseif($hdc1>=(0.90) and $hdc1<=(0.99)){
			   $h1=1.90;  $h2=1.90;
		 }elseif(($hdc1>=(-0.99) and $hdc1<=(-0.91)) or $hdc1==(1.00)  or $hdc1==(-1.00)){
		      $h1=2.00;  $h2=1.80;  
        }elseif($hdc1>=(-0.90) and $hdc1<=(-0.80)){
		      $h1=2.10;  $h2=1.72;  
		 }
	
	}else{

		if($hdc2>(0.71) and $hdc2<(0.80)){
			    $h2=1.72;  $h1=2.10;
		 }elseif($hdc2>=(0.80) and $hdc2<(0.90)){
                $h2=1.80;  $h1=2.00;
		 }elseif($hdc2>=(0.90) and $hdc2<=(0.99)){
			   $h2=1.90;  $h1=1.90;
			 }elseif(($hdc2>=(-0.99) and $hdc2<=(-0.91)) or $hdc2==(1.00)  or $hdc2==(-1.00)){
		      $h2=2.00;  $h1=1.80;  
        }elseif($hdc2>=(-0.90) and $hdc2<=(-0.80)){
		      $h2=2.10;  $h1=1.72;  
		 }
		  
		}

	
	return array("hdc1"=>$h1, "hdc2"=>$h2 );
	}
	
	
#print_r(_hdca(0.99 , 0 , 1 ));
	
	
function _hdcb($hdc1 , $hdc2 , $big ){
	if($big=="a"){$big=2;}
	elseif($big=="h"){$big=1;}
	
	############################ บอล 20ตังค์
if($big==1){
	   if($hdc1>(0.61) and $hdc1<(0.70)){
		         $h1=1.60;  $h2=2.20;
	   }elseif($hdc1>=(0.70) and $hdc1<(0.80)){
			    $h1=1.70;  $h2=2.10;
		 }elseif($hdc1>=(0.80) and $hdc1<(0.90)){
                $h1=1.80;  $h2=2.00;
		 }elseif($hdc1>=(0.90) and $hdc1<=(0.99)){
			   $h1=1.90;  $h2=1.90;
		 }elseif(($hdc1>=(-0.99) and $hdc1<=(-0.91)) or $hdc1==(1.00)  or $hdc1==(-1.00)){
		      $h1=2.00;  $h2=1.80;  
        }elseif($hdc1>=(-0.90) and $hdc1<=(-0.80)){
		      $h1=2.10;  $h2=1.70;  
		 }
	
	}else{

	   if($hdc2>(0.61) and $hdc2<(0.70)){
		         $h2=1.60;  $h1=2.20;
	   }elseif($hdc2>=(0.70) and $hdc2<(0.80)){
			    $h2=1.70;  $h1=2.10;
		 }elseif($hdc2>=(0.80) and $hdc2<(0.90)){
                $h2=1.80;  $h1=2.00;
		 }elseif($hdc2>=(0.90) and $hdc2<=(0.99)){
			   $h2=1.90;  $h1=1.90;
			 }elseif(($hdc2>=(-0.99) and $hdc2<=(-0.91)) or $hdc2==(1.00)  or $hdc2==(-1.00)){
		      $h2=2.00;  $h1=1.80;  
        }elseif($hdc2>=(-0.90) and $hdc2<=(-0.80)){
		      $h2=2.10;  $h1=1.70;  
		 }
		  
		}

	
	return array("hdc1"=>$h1, "hdc2"=>$h2 ,"play"=>$pp, "type"=>$type, "ohdc1"=>$hdc1, "ohdc2"=>$hdc2);
	}
	
	
	
	
		
	function _hdc($hdc1 , $hdc2 , $big){
	if($big=="a"){$big=2;}
	elseif($big=="h"){$big=1;}


	############################ บอล 20ตังค์
	if($hdc1>0.000 and $hdc2>0.000){
		$type="B1";
	 if($hdc1>=0.900 and $hdc2>=0.900){ $h1=1.90;  $h2=1.90; if($big==1){$pp=2;}else{$pp=2;} }
	 elseif($hdc1>0.990){ $h1=2.00;  $h2=1.80;   if($big==1){$pp=1;}else{$pp=4;}}
	 elseif($hdc1>0.950){ $h1=2.00;  $h2=1.80;   if($big==1){$pp=1;}else{$pp=4;} }
	 elseif($hdc1>=0.900){ $h1=1.90;  $h2=1.90;  if($big==1){$pp=2;}else{$pp=2;} }
	  elseif($hdc1>0.850){ $h1=1.80;  $h2=2.00; if($big==1){$pp=4;}else{$pp=1;}}
	  elseif($hdc1>=0.800){ $h1=1.80;  $h2=2.00;  if($big==1){$pp=4;}else{$pp=1;}}
	  elseif($hdc1>0.750){ $h1=1.80;  $h2=2.00;  if($big==1){$pp=4;}else{$pp=1;}}
	  elseif($hdc1>=0.700){ $h1=1.70;  $h2=2.10;   if($big==1){$pp=3;}else{$pp=3;} }
	  else{$h1='';  $h2='';  $pp=0; }
		  
		
	}elseif($hdc1>$hdc2){
		$type="B2";
	 if($hdc1<=0.650){ $h1=1.60;  $h2=2.20; $pp=0;}
     elseif($hdc1<=0.750){ $h1=1.70;  $h2=2.10;  if($big==1){$pp=3;}else{$pp=3;}}
	elseif($hdc1<=0.850){ $h1=1.80;  $h2=2.00;  if($big==1){$pp=4;}else{$pp=1;}}
	elseif($hdc1<=0.950){ $h1=1.90;  $h2=1.90;  if($big==1){$pp=2;}else{$pp=2;}}
	elseif($hdc1<=0.999){ $h1=2.00;  $h2=1.80;  if($big==1){$pp=1;}else{$pp=4;}}
	else{ $h1=1.80;  $h2=2.00;  if($big==1){$pp=1;}else{$pp=4;} }
		}else{
		$type="B3";
	 if($hdc2<=0.650){ $h2=1.60;  $h1=2.20; $pp=0;}
     elseif($hdc2<=0.750){ $h2=1.70;  $h1=2.10;  if($big==1){$pp=3;}else{$pp=3;}}
	elseif($hdc2<=0.850){ $h2=1.80;  $h1=2.00;  if($big==1){$pp=4;}else{$pp=1;}}
	elseif($hdc2<=0.950){ $h2=1.90;  $h1=1.90;  if($big==1){$pp=2;}else{$pp=2;}}
	elseif($hdc2<=0.999){ $h2=2.00;  $h1=1.80;  if($big==1){$pp=1;}else{$pp=4;}}
	else{ $h2=1.80;  $h1=2.00;  if($big==1){$pp=1;}else{$pp=4;} }
			}
			

	
	return array("hdc1"=>$h1, "hdc2"=>$h2 ,"play"=>$pp, "type"=>$type, "ohdc1"=>$hdc1, "ohdc2"=>$hdc2);
	}
	
		
function dd($eng , $thai ){
	$eng=trim($eng);
	$thai=trim($thai);
	
	if($thai!=""){return $thai;}
	else{return $eng;}
	}
	
	function _in_ar($txt , $array){
	$txt=trim(strtoupper($txt));
	if($txt==""){return 0;}
	foreach($array as $check){
		if($check!=""){
			if(strstr($txt, $check )){
				return 0;
				}
			}
		}
	return 1;
	}
	
	
	
	function _ok_ar($txt , $array){
	#	print_r($array);
	$txt=trim(strtoupper($txt));
	if($txt==""){return 0;}
	foreach($array as $check){
		if($check!=""){
			if(strstr($txt, $check )){
				return 1;
				}
			}
		}
	return 0;
	}
		
	

function _bIP()
					{
						if(getenv(HTTP_CLIENT_IP))
							{$ip_ccr=getenv(HTTP_CLIENT_IP);}
						else if(getenv(HTTP_CLIENTADDRESS))
								{$ip_ccr=getenv();}
						else if (getenv(HTTP_X_FORWARDED_FOR))
							 {$ip_ccr=getenv(HTTP_X_FORWARDED_FOR);}
						 else
							 {$ip_ccr=getenv(REMOTE_ADDR);}
						if((!$ip_ccr)||($ip_ccr=='unknow'))
					{$ip_ccr="0";}
			return $ip_ccr;}

		

############### แบ่งหน้า
function _page($doo,$totalpage) //(doo=learn,จำนวนหน้า)
{
//$doo="";
//$totalpage=50;

$pagenextbabk=4;

echo"<style type='text/css'>.bomloadpage a{text-decoration: none;border: 1px solid #000;background-color:#545454; color:#fff;}</style>";

$pageok="<div class='bomloadpage'>";
$pg=$_GET[pg];
if($doo==""){$doo="$PHP_SELF?pg=";}
else{$doo="?p=$doo&pg=";}	
$pageok.="หน้า&nbsp;";

if($pg>1)
{
$backf=$pg-1;
$pageok .="<a href=$doo".$backf." title='หน้าย้อนกลับ'> << </a>&nbsp;";
$pageok .="<a href=$doo"."1 title='หน้าแรก'> 1 </a>&nbsp; ";
}
if($pg==""){$pgb=1;}
else{$pgb=$pg;}

############# หน้าแรก
if($pgb==1){$start=1;}
elseif($pgb==$pagenextbabk+1){$start=2;}
elseif($pgb<=$pagenextbabk){$start=2;}
else{$start=$pgb-$pagenextbabk;}

######## หน้าสุดท้าย
if($pgb==$totalpage){$sum=$totalpage;}
elseif($pgb==$totalpage-$pagenextbabk){$sum=$totalpage-1;}
elseif($pgb>$totalpage-$pagenextbabk){$sum=$totalpage-1;}
else{$sum=$pgb+$pagenextbabk;}

for($i=$start;$i<=$sum;$i++)
{
	
if($i==$pg)
{
$pageok .="<b><font  title='หน้า$i' style='border: 1px solid #666;background-color:#545454; color:#f00;'> &nbsp;$i&nbsp; </font></b> ";
}
else{
$pageok .="<a href=$doo$i title=หน้า$i> &nbsp;$i&nbsp; </a>";
}

}





if(($pg<$totalpage) and ($totalpage!=1))
{
$nextf=$pg+1;
$pageok .="&nbsp;<a href=$doo".$totalpage." title='หน้าสุดท้าย'> $totalpage </a>";
$pageok .="&nbsp;<a href=$doo".$nextf." title='หน้าถัดไป'> >> </a>";
}
$pageok .="</div>";
//echo $pageok;
return $pageok;}
//echo _page("learn","5");
################# randdom







function _page2($doo,$totalpage, $rid) //(doo=learn,จำนวนหน้า)
{
//$doo="";
//$totalpage=50;

$pagenextbabk=4;

echo"<style type='text/css'>.bomloadpage a{text-decoration: none;border: 1px solid #000;background-color:#545454; color:#fff;}</style>";

$pageok="<div class='bomloadpage'>";
$pg=$_GET[pg];
if($doo==""){$doo="$PHP_SELF?pg=";}
else{$doo="?p=$doo&pg=";}	
$pageok.="หน้า&nbsp;";

if($pg>1)
{
$backf=$pg-1;
$pageok .="<a  title='หน้าย้อนกลับ' onclick='_wp($backf)'  style='cursor:pointer;'> << </a>&nbsp;";
$pageok .="<a  title='หน้าแรก' onclick='_wp(1)'  style='cursor:pointer;'> 1 </a>&nbsp; ";
}
if($pg==""){$pgb=1;}
else{$pgb=$pg;}

############# หน้าแรก
if($pgb==1){$start=1;}
elseif($pgb==$pagenextbabk+1){$start=2;}
elseif($pgb<=$pagenextbabk){$start=2;}
else{$start=$pgb-$pagenextbabk;}

######## หน้าสุดท้าย
if($pgb==$totalpage){$sum=$totalpage;}
elseif($pgb==$totalpage-$pagenextbabk){$sum=$totalpage-1;}
elseif($pgb>$totalpage-$pagenextbabk){$sum=$totalpage-1;}
else{$sum=$pgb+$pagenextbabk;}

for($i=$start;$i<=$sum;$i++)
{
	
if($i==$pg)
{
$pageok .="<b><font  title='หน้า$i' style='border: 1px solid #666;background-color:#545454; color:#f00;'> &nbsp;$i&nbsp; </font></b> ";
}
else{
$pageok .="<a  title='หน้า$i' onclick='_wp($i)'  style='cursor:pointer;'> &nbsp;$i&nbsp; </a>";
}

}





if(($pg<$totalpage) and ($totalpage!=1))
{
$nextf=$pg+1;
$pageok .="&nbsp;<a  title='หน้าสุดท้าย' onclick='_wp($totalpage)'  style='cursor:pointer;'> $totalpage </a>";
$pageok .="&nbsp;<a  title='หน้าถัดไป'  onclick='_wp($nextf)'  style='cursor:pointer;'> >> </a>";
}
$pageok .="</div>";
//echo $pageok;
return $pageok;}
//echo _page("learn","5");
################# randdom



	
function _cbn($sum ,$xx=null){
	if($sum==(-0)){$sum=0;}
		if($sum<0){ return '<span class="cr bb">'.number_format($sum,$xx).'</span>';}
		elseif($sum==0){ return '<span class="cb">'.number_format($sum).'</span>';}
	    else{  return '<span class="cbu bb">'.number_format($sum,$xx).'</span>';}
	}
		

function _cbp($sum ,$xx=null){
	if($sum==(-0)){$sum=0;}
		if($sum<0){ return '<span class="cr">'.number_format($sum,$xx).'</span>';}
		elseif($sum==0){ return '<span class="cb">'.number_format($sum).'</span>';}
	    else{  return '<span class="cb">'.number_format($sum,$xx).'</span>';}
	}
function _cbpcolor($sum ,$xx=null){
	if($sum==(-0)){$sum=0;}
		if($sum<0){ return '<span style="color: red;">'.number_format($sum,$xx).'</span>';}
		elseif($sum==0){ return '<span style="color: black;">'.number_format($sum).'</span>';}
	    else{  return '<span style="color: black;">'.number_format($sum,$xx).'</span>';}
	}

function write($path, $content, $mode="w+"){
	@unlink($path);
    if (file_exists($path) && !is_writeable($path)){ return false; }
    if ($fp = fopen($path, $mode)){
        fwrite($fp, $content);
        fclose($fp);
    }
    else { return false; }
    return true;
}

function _chdc($hdc1 , $hdc2 , $big){
	
	if($big=="a"){$big=2;}
	else{$big=1;}

	if($hdc1>0.000 and $hdc2>0.000){
		$type="B1";
	 if($hdc1>=0.900 and $hdc2>=0.900){ $h1=1.90;  $h2=1.90; if($big==1){$pp=2;}else{$pp=2;} }
	 elseif($hdc1>0.990){ $h1=2.00;  $h2=1.80;   if($big==1){$pp=1;}else{$pp=4;}}
	 elseif($hdc1>0.950){ $h1=2.00;  $h2=1.80;   if($big==1){$pp=1;}else{$pp=4;} }
	 elseif($hdc1>=0.900){ $h1=1.90;  $h2=1.90;  if($big==1){$pp=2;}else{$pp=2;} }
	  elseif($hdc1>0.850){ $h1=1.80;  $h2=2.00; if($big==1){$pp=4;}else{$pp=1;}}
	  elseif($hdc1>=0.800){ $h1=1.80;  $h2=2.00;  if($big==1){$pp=4;}else{$pp=1;}}
	  elseif($hdc1>0.750){ $h1=1.80;  $h2=2.00;  if($big==1){$pp=4;}else{$pp=1;}}
	  elseif($hdc1>=0.700){ $h1=1.72;  $h2=2.11;   if($big==1){$pp=3;}else{$pp=3;} }
	  else{$h1='';  $h2='';  $pp=0; }
		  
		
	}elseif($hdc1>$hdc2){
		$type="B2";
	 if($hdc1<=0.650){ $h1=1.60;  $h2=2.20; $pp=0;}
     elseif($hdc1<=0.750){ $h1=1.72;  $h2=2.11;  if($big==1){$pp=3;}else{$pp=3;}}
	elseif($hdc1<=0.850){ $h1=1.80;  $h2=2.00;  if($big==1){$pp=4;}else{$pp=1;}}
	elseif($hdc1<=0.950){ $h1=1.90;  $h2=1.90;  if($big==1){$pp=2;}else{$pp=2;}}
	elseif($hdc1<=0.999){ $h1=2.00;  $h2=1.80;  if($big==1){$pp=1;}else{$pp=4;}}
	else{ $h1=1.80;  $h2=2.00;  if($big==1){$pp=1;}else{$pp=4;} }
		}else{
		$type="B3";
	 if($hdc2<=0.650){ $h2=1.60;  $h1=2.20; $pp=0;}
     elseif($hdc2<=0.750){ $h2=1.72;  $h1=2.11;  if($big==1){$pp=3;}else{$pp=3;}}
	elseif($hdc2<=0.850){ $h2=1.80;  $h1=2.00;  if($big==1){$pp=4;}else{$pp=1;}}
	elseif($hdc2<=0.950){ $h2=1.90;  $h1=1.90;  if($big==1){$pp=2;}else{$pp=2;}}
	elseif($hdc2<=0.999){ $h2=2.00;  $h1=1.80;  if($big==1){$pp=1;}else{$pp=4;}}
	else{ $h2=1.80;  $h1=2.00;  if($big==1){$pp=1;}else{$pp=4;} }
			}

	
	return array("hdc1"=>number_format($h1,2), "hdc2"=>number_format( $h2,2) ,"play"=>$pp, "type"=>$type, "ohdc1"=>$hdc1, "ohdc2"=>$hdc2);
	//return array(number_format($h1,2),number_format( $h2,2) ,$pp, $type, $hdc1, $hdc2);
	}
	function _mix($hdc){
		return number_format($hdc,2);
	}
	function _red($hdc){
	if($hdc<-0.000){
		echo "red";
	}else{
		echo "black";
	}
}


function price_ball($val , $t){
	if($val!=""){
		if($t==1){
			return my($val);	
		}else if($t==2){
			return hk($val);	
		}else if($t==3){
			return eu($val);	
		}
	}else{
		return "";	
	}
}
function my($val){
	return $val;	
}
function hk($val){
	if($val<0){
		return (1+($val))+1;
	}else{
		return $val;	
	}
}
function eu($val){
	if($val<0){
		return (1+($val))+2;
	}else{
		return $val+1;	
	}
}
function _cg($val)
{

	if ($val == "0.0" ) {
		if($_SESSION["lang"]=="en"){
        return $val;
		}else{
		return "เสมอ";
			}
    }elseif ($val == "0+0.5" or $val == "0-0.5" ) {
		if($_SESSION["lang"]=="en"){
        return "0+½";
		}else{
		return "ปป.";
			}
    }elseif ($val == "0.5") {
        return "½";
    } elseif ($val == "0.5+1" or $val == "0.5-1") {
        return "½+1";
    } elseif ($val == "1+1.5" or $val == "1-1.5" ) {
        return "1+1½";
    } elseif ($val == "1.5") {
        return "1½";
    } elseif ($val == "1.5+2" or $val == "1.5-2") {
        return "1½+2";
    } elseif ($val == "2+2.5" or $val == "2-2.5") {
        return "2+2½";
    } elseif ($val == "2.5") {
        return "2½";
    } elseif ($val == "2.5+3" or $val == "2.5-3" ) {
        return "2½+3";
    } elseif ($val == "3+3.5" or $val == "3-3.5") {
        return "3+3½";
    } elseif ($val == "3.5") {
        return "3½";
    } elseif ($val == "3.5+4" or $val == "3.5-4") {
        return "3½+4";
    } elseif ($val == "4+4.5" or $val == "4-4.5" ) {
        return "4+4½";
    } elseif ($val == "4.5") {
        return "4½";
    } elseif ($val == "4.5+5" or $val == "4.5-5") {
        return "4½+5";
    } elseif ($val == "5+5.5" or $val == "5-5.5" ) {
        return "5+5½";
    } elseif ($val == "5.5") {
        return "5½";
    } elseif ($val == "5.5+6" or $val == "5.5-6") {
        return "5½+6";
    } elseif ($val == "6+6.5" or $val == "6-6.5") {
        return "6+6½";
    } elseif ($val == "6.5") {
        return "6½";
    } elseif ($val == "6.5+7" or $val == "6.5-7") {
        return "6½+7";
    } elseif ($val == "7+7.5" or $val == "7-7.5" ) {
        return "7+7½";
    } elseif ($val == "7.5") {
        return "7½";
    } elseif ($val == "7.5+8" or $val == "7.5-8") {
        return "7½+8";
    } elseif ($val == "8+8.5" or $val == "8-8.5"  ) {
        return "8+8½";
    } elseif ($val == "8.5") {
        return "8½";
    } elseif ($val == "8.5+9" or $val == "8.5-9") {
        return "8½+9";
    } elseif ($val == "9+9.5" or $val == "9-9.5") {
        return "9+9½";
    } elseif ($val == "9.5") {
        return "9½";
    } elseif ($val == "9.5+10" or $val == "9.5-10") {
        return "9½+10";
    } elseif ($val == "10+10.5" or  $val == "10-10.5") {
        return "10+10½";
    } else {
        return $val;
    }
}



function ttm($tm){
	$time=$tm;
$houra=substr($time,-7,2);
$mint=substr($time ,-4 ,2);
$ampm=substr($time,-2);

$time_in_24_hour_format  = date("H:i", strtotime("$houra:$mint $ampm"));

return $time_in_24_hour_format;	
	}
	
	
	function _ts($tm){
		return $xx=trim(str_replace('"' , '' , $tm));
	}
	function _tss($tm){
		return $xx=trim(str_replace("'", '' , $tm));
	}
	
		function _html($tm){
		$kk=trim(strip_tags($tm));
		$kk=str_replace(array('&nbsp;'),array(''),$kk);

		return $kk;
	}
	

	
function _wper($bet1,$bet2){
	
	if($bet1=="" and $bet2==""){
		return 0;
		}
	
	if($bet1>=(0.00)){
		$x1=1-$bet1;
		}else{
		$x1=1+$bet1;	
			}
#############################
	if($bet2>=(0.00)){
		$x2=1-$bet2;
		}else{
		$x2=1+$bet2;	
			}
			#####################################
    if($bet1>(-0.00) and $bet2>(-0.00)){
	          $x3=($x1+$x2)*100;
       }elseif($bet1>$bet2){
			$x3=($x1-$x2)*100;
		 }else{
			 $x3=($x2-$x1)*100;
			 }
	return $x3;
	
	}
	

function _wp2($bet1,$per){
	$p1=$per/100;
	################ สีแดง
	if($bet1<(0.00)){
		$x9=(-$bet1)-$p1;
		}else{
			############## สีดำ
			$x1=$bet1+$p1;
			if($x1>(1.00)){
			$x3=($x1-1.00);
			$x9=(1.00-$x3);
				}else{
			$x3=-($bet1+$p1);	
			 if($x3>(-1)){
				 $x9=$x3;
				 }else{
				 $x9=(-$x3);	 
					 }
					 
					}
			
		}
			return $x9;
}

function _sctxt($sc){
global $sc_lang;
#$sc_lang= array(1 =>  "กำลังแข่งขัน","จบการแข่งขัน","ยกเลิกคืนเงิน","เลื่อนแข่งขัน","ยกเลิก"); 
if($sc=='next'){
	return $sc_lang[4];
}elseif($sc=='can' ){
	return $sc_lang[3];
}elseif($sc!='' ){
	return $sc;
}elseif($sc==''  ){
	return '-';
	}
}
	
function _stsc($half,$full){
global $sc_lang;
#$sc_lang= array(1 =>  "กำลังแข่งขัน","จบการแข่งขัน","ยกเลิกคืนเงิน","เลื่อนแข่งขัน","ยกเลิก"); 
if($half=='next' or $full=='next'){
	return $sc_lang[4];
}elseif($half=='can' or $full=='can'){
	return $sc_lang[3];
}elseif($half!='' and $full!='' ){
	return $sc_lang[2];
}elseif($half!='' and $full=='' ){
	return $sc_lang[1];
	}

}


function _uname($zone,$team1,$team2,$sport){
	$sql="update bom_tb_lang_zone set xupdate='"._bdate()."' where en='$zone' and lang_sport='$sport'";
	sql_query($sql);
	$sql="update bom_tb_lang_team set xupdate='"._bdate()."' where en='$team1'  and lang_sport='$sport'";
	sql_query($sql);
	$sql="update bom_tb_lang_team set xupdate='"._bdate()."' where en='$team2'  and lang_sport='$sport'";
	sql_query($sql);
	
	}
	
	
function _lg($en,$th){
	if($th!=""){return $th;}
	else{ return $en;}
}

function _share($step , $share ,$share_live , $m_sport_type , $m_sport_zone){

#$sport_zone = array(1 =>"ก่อนเวลา", 2 =>"สด");
	######################SHARE
	if($m_sport_zone==1){
	$mshare=@explode(',',$share);
	}else{
	$mshare=@explode(',',$share_live);
	}
#$sport_type = array(1 =>"ฟุตบอล", 2 =>"มวยไทย", 3 =>"บาสเกตบอล", 4 =>"อเมริกันฟุตบอล", 5 =>"เบสบอล", 6 =>"ฮอกกี้", 7 =>"เทนนิส", 8 =>"วอลเลย์บอล", 9 =>"แบดมินตัน", 10 =>"สนุกเกอร์");
if($step>1){
	$x_share=$mshare[4];
}elseif($m_sport_type==1){
	$x_share=$mshare[1];
}elseif($m_sport_type==2){
	$x_share=$mshare[2];
}else{
	$x_share=$mshare[3];
	}		
	
	return $x_share;
}

function _dis($q_sum,   $mdis, $mcom , $step ,$m_sport_type ){
	######################COM
	$ucom=@explode(',',$mcom);
#	print_r($mcom);
if($m_sport_type==1){
	$m_com=$ucom[1];
}elseif($m_sport_type==2){
	$m_com=$ucom[2];
}else{
	$m_com=$ucom[3];
	}		
	
	if($step>1){
		$emdis=explode(',',$mdis);
		$okdis=($emdis[$step])/100;	
		$comt=$emdis[$step];
		}else{
		$okdis=$m_com/100;	
		$comt=$m_com;
		}

		$total=$q_sum-($q_sum*$okdis);

		return array("mpay"=>$total , "mcom"=>$comt);
}

#print_r( _dis(100,  "dis,0,2,3,4,5,6,7,8,9,10" ,"com,1,1,1", 1,1 ));

function _tlive($time){
	if($time=='!Live' or $time=='Live' or $time=='LIVE'){
		$nt=0;
		}elseif($time=='H.Time' or $time=='H.Time' or $time=='H.Time'){
		$nt=45;	
		}else{
				$cs=@explode('H ',$time);
				$xset=$cs[0];
				$xtime=intval($cs[1]);

					if($xtime>0){
						if($xset==1){
							$nt=$xtime;
							}else{
							$nt=45+$xtime;	
						}
					}
					}
					return $nt;

	}
	
	
	
	function _dt($num){
	global $lang_m;	
	$num2=str_replace(array('E','K','H','L'),array($lang_m[37],$lang_m[38],$lang_m[32],$lang_m[33]),$num);
	return $num2;
	}
	function _dtr($num){
	global $lang_m;	
	$num2=str_replace(array('คี่','คู่','สูง','ต่ำ'),array('E','K','H','L'),$num);
	return $num2;
	}
	
	
function _ntor($hdp1_1,$tor , $rong ){
#	echo"$hdp1_1<hr>";
if($hdp1_1==""){
	return "";
}else{
	if($hdp1_1>=0.000){
	$nt=$hdp1_1-$rong;
		}else{
	$nt=$hdp1_1-$tor;	
			}
			
			return $nt;
			}
	}
	
function _ntor_save($hdp1_1,$tor  ){

$nt=$hdp1_1-($tor/100);				
return $nt;
}
	


function _nam($step , $hdp1_1, $nam_tor ,$nam_tor_live , $nam_rong ,$nam_rong_live , $m_sport_type , $m_sport_zone){

#$sport_zone = array(1 =>"ก่อนเวลา", 2 =>"สด");
	######################SHARE
	if($m_sport_zone==1){
	$mtor=@explode(',',$nam_tor);
	$mrong=@explode(',',$nam_rong);
	}else{
	$mtor=@explode(',',$nam_tor_live);
	$mrong=@explode(',',$nam_rong_live);
	}
	
#$sport_type = array(1 =>"ฟุตบอล", 2 =>"มวยไทย", 3 =>"บาสเกตบอล", 4 =>"อเมริกันฟุตบอล", 5 =>"เบสบอล", 6 =>"ฮอกกี้", 7 =>"เทนนิส", 8 =>"วอลเลย์บอล", 9 =>"แบดมินตัน", 10 =>"สนุกเกอร์");
if($step>1){
	$tor=$mtor[4];
	$rong=$mrong[4];
}elseif($m_sport_type==1){
	$tor=$mtor[1];
	$rong=$mrong[1];
}elseif($m_sport_type==2){
	$tor=$mtor[2];
	$rong=$mrong[2];
}else{
	$tor=$mtor[3];
	$rong=$mrong[3];
	}		
	
	

	
	if($hdp1_1>=0.000){
		#$nam=$hdp1_1-$rong;
		$nam=$rong;
	}else{
	#	$nam=$hdp1_1-$tor;
	$nam=$tor;
		}
		
	return $nam;	

	

}

function _dislot($sum , $dis, $rid ){

	$mdis=($dis)/100;
	$xx=$sum-($sum*$mdis);
	if($rid=="" or $rid==0){ $xx=0;}
	return $xx;
	}



function lock_lotto($url ){
global $lot_type;
$js4=array();
for($xx=1;$xx<=count($lot_type["th"]);$xx++){
	$sql="select * from  bom_tb_lotto_lock_1 where lot_type='$xx' ";
	$re=sql_query($sql);
	while($rs=sql_fetch($re)){
           $js4[$xx][]="$rs[h_num]";
       }
}
$txt44=json_encode($js4);
@unlink($url);
write($url ,$txt44,"w+"); 
}

function _mkdir($url_file){
#######################เก็บถาวร
#$url_file4="json/sport/bet_date/".$_SESSION['m_id']."/".$view_date."/";	
@mkdir($url_file, 0777, true);
@chmod($url_file, 0777);
	}
	
	
		function _money($money , $share ){
              $txt=$money*($share/100);
	return $txt;
		}	
		



	function _wp20($bet1,$per){
	if($bet1<2){
		$xx=$bet1-1;
		}else{
		$xx=$bet1-3;	
			}
		return $xx;
}



function httpGet($url)
{
    $ch =@curl_init();  
 
    @curl_setopt($ch,CURLOPT_URL,$url);
    @curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//  curl_setopt($ch,CURLOPT_HEADER, false); 
    $output=@curl_exec($ch);
    @curl_close($ch);
    return $output;
}
 
#echo httpGet("http://www.bomload.com");


function httpPost($url,$params)
{
  $postData = '';
   //create name value pairs seperated by &
   foreach($params as $k => $v) 
   { 
      $postData .= $k . '='.$v.'&'; 
   }
   rtrim($postData, '&');
 
    $ch = @curl_init();  
 
    @curl_setopt($ch,CURLOPT_URL,$url);
    @curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    @curl_setopt($ch,CURLOPT_HEADER, false); 
    @curl_setopt($ch, CURLOPT_POST, count($postData));
    @curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    
    $output=@curl_exec($ch);
    @curl_close($ch);
    return $output;
 
}
/*
$params = array(
   "name" => "Ravishanker Kusuma",
   "age" => "32",
   "location" => "India"
);
echo httpPost("http://www.bomload.com/post.php",$params);
 */
 
 function write2($path, $content, $mode="w+"){
    if (file_exists($path) && !is_writeable($path)){ return false; }
    if ($fp = fopen($path, $mode)){
        fwrite($fp, $content);
        fclose($fp);
    }
    else { return false; }
    return true;
}
#write("code_bid.js",$txt18,"w+"); 

function live_write($url_file, $sport ){
$js1=array();
$js2=array();
$sql="select * from bom_tb_data_football_refresh where b_sport=$sport  ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
$js1[]=array("b_id"=>"$rs[b_id]","b_add"=>"$rs[b_add]","b_type"=>"$rs[b_type]","b_sport"=>"$rs[b_sport]","b_hdc"=>"$rs[b_hdc]","b_price_1"=>"$rs[b_price_1]","b_price_2"=>"$rs[b_price_2]","b_price_3"=>"$rs[b_price_3]","b_timestam"=>"$rs[b_timestam]","b_file"=>"$rs[b_file]","b_today"=>"$rs[b_today]");
}
$txt11=json_encode($js1);
write2($url_file.'live.json' ,$txt11,"w+"); 

$js2[]=array("time"=>"3");
$txt22=json_encode($js2);
write2($url_file.'refresh.json' ,$txt22,"w+"); 
}

function json_decode2($mm_js, $true){
$jscc =json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $mm_js), $true );
return $jscc;
}


function json_read($url_file){
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode2($date2_js, true);
return $date2_bet;
}

function jrlot($url_file){
$date2_js=file_get_contents3($url_file);
$date2_bet = json_decode2($date2_js, true);
return $date2_bet[0][sum];
}

function jwlot($url_file,$sum){
$js1=array();
#####################################Lock LOTTO
$js1[]=array("sum"=>"$sum");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 
}


function json_write($url_file, $arr ){
$txt11=json_encode($arr);
write($url_file ,$txt11,"w+"); 
}

			function file_get_contents2($url)
{
$context = stream_context_create(
    array(
        'http' => array(
            'max_redirects' => 101
        )
    )
);
$output=file_get_contents($url, false, $context);
    return $output;
}



			function file_get_contents3($url)
{
$fh = fopen($url, 'r'); 
$output = fread($fh, filesize($url)); 
fclose($fh);
    return $output;
}


function number_format2($num , $digit){
	$sum = sprintf("%.2f",$num);
	if($digit>0 || $digit!=""){
		return number_format($sum , $digit);
	}else{
		return number_format($sum);
	}
}




function _myshare( $exf1, $exf2, $exf3, $exf4  ,$exs1 ,$exs2 ,$exs3 ,$exs4 ){

############################Agent
if($exf4>=$exs4){
	$my4=intval($exf4);
	}else{
	$my4=intval($exs4);	
		}
		
	###########################Master	
if($exf3>=($exs3+$my4)){
	
		$my3=intval($exf3-($my4));	
	
	}else{
		
	$my3=intval($exs3);	
	
		}	
		
		###########################Senoir
if($exf2>=($exs2+$my3+$my4)){
	
		$my2=intval($exf2-($my3+$my4));	
	
	}else{
		
	$my2=intval($exs2);	
	
		}		
		
		
				###########################Senoir
if($exf1>=($exs1+$my2+$my3+$my4)){
	
		$my1=intval($exf1-($my2+$my3+$my4));	
	
	}else{
		
	$my1=intval($exs1);	
	
		}	
		
	return array("my1"=>$my1,"my2"=>$my2,"my3"=>$my3,"my4"=>$my4);	
}





function _bank4($txt){
	
return substr($txt, -4);
	}
	
function _bankok($txt){
	#7622508960
$b1=substr($txt, 0,3);
$b2=substr($txt, 3,1);
$b3=substr($txt,4,5);
$b4=substr($txt, 9,1);
return $data=$b1.'-'.$b2.'-'.$b3.'-'.$b4;
	}
	
	
	
	
	
function jstoplot($url_file , $ttype , $tnumber  ,$tsum , $ttime ){
	$xtime=time()+($ttime*60);
	$next=time()+($ttime*60);
	
$js1=array();
#####################################Lock LOTTO
$js1[]=array("type"=>"$ttype","number"=>"$tnumber","sum"=>"$tsum","desum"=>"$tsum","xtime"=>"$xtime","ttime"=>"$ttime","xnext"=>"$next","bom"=>"new");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 
}


function jstoplot_new($url_file , $ttype , $tnumber  ,$tsum , $ttime ){
	$xtime=time();
	$next=time()+($ttime*60);
$js1=array();
#####################################Lock LOTTO
$js1[]=array("type"=>"$ttype","number"=>"$tnumber","sum"=>"$tsum","desum"=>"$tsum","xtime"=>"$xtime","ttime"=>"$ttime","xnext"=>"$next","bom"=>"clear");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 
}

function jstoplotup($url_file , $ttype , $tnumber  ,$tsum , $ttime , $xtime ,$desum, $next ){
#	$xtime=time()+($ttime*60);
#$next=time()+($ttime*60);
	
$js1=array();
#####################################Lock LOTTO
$js1[]=array("type"=>"$ttype","number"=>"$tnumber","sum"=>"$tsum","desum"=>"$desum","xtime"=>"$xtime","ttime"=>"$ttime","xnext"=>"$next","bom"=>"up");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 
}


function _fbt($time){
	$xx=intval($time/60).':'.round($time%60,2);
	return $xx;
	}
function mysql_escape_mimic($inp) { 
    /*if(is_array($inp)) 
        return array_map(__METHOD__, $inp); 

    if(!empty($inp) && is_string($inp)) { 
        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a" ), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp); 
    } */
	
	$inp = str_replace(array("/\^/", "/%/", "/\)/", "/\(/", "/{/", "'", '"'),"", $inp);

    return $inp; 
}
function _edate(){
global $timezone; 

if((date("His", $time_stam)>=0) and (date("His", $time_stam)<90000)){
     $view_date=date("m/d/Y",$time_stam);
 }else{
  $view_date=date("m/d/Y",mktime(date("H")+$timezone,date("i"),date("s"),date("m"),date("d")+1,date("Y")));
  }  
return $view_date;
 }



function convert_nam($nam , $type){
	$ren = 0;
	if($type==1){
		if($nam<0){
			$ren = 3-((1-$nam)-1);
		}else{
			$ren = 1+$nam;
		}
	}else if($type==2){
		if($nam<0){
			//$ren = 1+((1-$nam)-1);
			$ren = 2-(0-($nam));
		}else{
			$ren = $nam;
		}
	}else{
		$ren = $nam;
	}
	return(number_format($ren , 2));
}



function numberFormat($number, $decimalPoint = 2, $decimalSeparater = ".", $thousandSeparater = ",") {
	// $number = (float)$number;
	$n = number_format($number, $decimalPoint, $decimalSeparater, $thousandSeparater);
	$p = preg_replace("/\.?0*$/",'',$n);
	return $p;
}

###########################
function _cwin($type){
		if($sum==""){ return '?';}
	    else{  return $type;}
	}
	
function _cbonus( $total , $bonus , $status ){
	global $ca_status;
		if($status==7){ $count='';  $color=''; }
		elseif($status==6){   $count=number_format($bonus , 2); $color='';  }
		elseif($status==3){   $count=number_format($bonus , 2); $color='';  }
		elseif($status==4){   $count='(-'.number_format($total , 2).')';  $color='banker'; }
		elseif($status==5){   $count='(-'.number_format($total , 2).')'; $color='banker'; }
	    elseif($status==1){   $count=number_format($bonus , 2); $color=''; }
		elseif($status==2){   $count=number_format($bonus , 2); $color=''; }
		return array("count"=>$count , "color"=>$color);
	}

	function getOkData2() {
        // $ok_url = $json_path."json/lotto/ok/ok_".$_SESSION["zone_hun"]."_".$_SESSION["rob_hun"].".json";
        $ok_url = __DIR__."/../json/lotto/ok/ok_".$_SESSION["zone_hun"]."_".$_SESSION["rob_hun"].".json";
        // $ok_url = "testZoneOk.json";
        $ok_data = file_get_contents($ok_url);

        $bom = pack('H*','EFBBBF');
        $ok_data = preg_replace("/^$bom/", '', $ok_data);
        $ok_data = json_decode($ok_data, true);
        $ok_data = $ok_data[0];
        return $ok_data;
        // $time_end = $ok_data["o_limit_time"];
        // $time_stam = time();
	}

function searchArrayByValue($arr, $k, $v, $typeCheck = false) {
  foreach($arr as $key => $val){
      if($val[$k]==$v){
        if($typeCheck===true){
          if(gettype($v) == gettype($val[$k]))
            return $val;
          else
            return false;
        }
        return $val;
      }
  }
  return null;
}


function _comm($num_s , $level , $comm , $zone){

	if($num_s==1){
	$c0=@explode(",",$comm[0]);
	$c1=@explode(",",$comm[1]);
	$c2=@explode(",",$comm[2]);
	$c3=@explode(",",$comm[3]);
	$c4=@explode(",",$comm[4]);
	$c5=@explode(",",$comm[5]);
	$c6=@explode(",",$comm[6]);
	$c7=@explode(",",$comm[7]);
	$c8=@explode(",",$comm[8]);
	if($zone==1){
		$at=3;
	}elseif($zone==6){
		$at=1;
	}else{
		 $at=2;
		}
		###################
	$ct0=$c0[$at];
	$ct1=$c1[$at];
	$ct2=$c2[$at];
	$ct3=$c3[$at];
	$ct4=$c4[$at];
	$ct5=$c5[$at];
	$ct6=$c6[$at];
	$ct7=$c7[$at];
	$ct8=$c8[$at];

	}else{
		##################Step
	$c0=@explode(",",$comm[0]);
	$c1=@explode(",",$comm[1]);
	$c2=@explode(",",$comm[2]);
	$c3=@explode(",",$comm[3]);
	$c4=@explode(",",$comm[4]);
	$c5=@explode(",",$comm[5]);
	$c6=@explode(",",$comm[6]);
	$c7=@explode(",",$comm[7]);
	$c8=@explode(",",$comm[8]);
		###################
	$ct0=$c0[$num_s];
	$ct1=$c1[$num_s];
	$ct2=$c2[$num_s];
	$ct3=$c3[$num_s];
	$ct4=$c4[$num_s];
	$ct5=$c5[$num_s];
	$ct6=$c6[$num_s];
	$ct7=$c7[$num_s];
	$ct8=$c8[$num_s];
	}
	
		if($level==2){
		$dis="$ct1,$ct0";
		}elseif($level==3){
		$dis="$ct1,$ct2,$ct0";	
		}elseif($level==4){
		$dis="$ct1,$ct2,$ct3,$ct0";	
		}elseif($level==5){
		$dis="$ct1,$ct2,$ct3,$ct4,$ct0";		
		}elseif($level==6){
		$dis="$ct1,$ct2,$ct3,$ct4,$ct5,$ct0";			
		}elseif($level==7){
		$dis="$ct1,$ct2,$ct3,$ct4,$ct5,$ct6,$ct0";				
		}elseif($level==8){
		$dis="$ct1,$ct2,$ct3,$ct4,$ct5,$ct6,$ct7,$ct0";		
		}elseif($level==9){
		$dis="$ct1,$ct2,$ct3,$ct4,$ct5,$ct6,$ct7,$ct8,$ct0";			
			}

return $dis;
	
	}
	
	
function _share_sport($num_s , $level , $share, $myshare , $zone   ){
	
	if($num_s==1){
#	$c0=@explode(",",$share[0]);
	$c1=@explode(",",$share[1]);
	$c2=@explode(",",$share[2]);
	$c3=@explode(",",$share[3]);
	$c4=@explode(",",$share[4]);
	$c5=@explode(",",$share[5]);
	$c6=@explode(",",$share[6]);
	$c7=@explode(",",$share[7]);
	$c8=@explode(",",$share[8]);
	
	#$cy0=@explode(",",$share[0]);
	$cy1=@explode(",",$myshare[2]);
	$cy2=@explode(",",$myshare[3]);
	$cy3=@explode(",",$myshare[4]);
	$cy4=@explode(",",$myshare[5]);
	$cy5=@explode(",",$myshare[6]);
	$cy6=@explode(",",$myshare[7]);
	$cy7=@explode(",",$myshare[8]);
	#$cy8=@explode(",",$myshare[8]);
	
	if($zone==1){
		$at=3;
	}elseif($zone==6){
		$at=1;
	}else{
		 $at=2;
		}
		###################
#	$ct0=$c0[$at];
	$ct1=$c1[$at];
	$ct2=$c2[$at];
	$ct3=$c3[$at];
	$ct4=$c4[$at];
	$ct5=$c5[$at];
	$ct6=$c6[$at];
	$ct7=$c7[$at];
	$ct8=$c8[$at];
	
	#$ct0=$c0[4];
	$cty1=$cy1[$at];
	$cty2=$cy2[$at];
	$cty3=$cy3[$at];
	$cty4=$cy4[$at];
	$cty5=$cy5[$at];
	$cty6=$cy6[$at];
	$cty7=$cy7[$at];
	#$cty8=$cy8[4];
	
	

	}else{
		##################Step
	#$c0=@explode(",",$share[0]);
	$c1=@explode(",",$share[1]);
	$c2=@explode(",",$share[2]);
	$c3=@explode(",",$share[3]);
	$c4=@explode(",",$share[4]);
	$c5=@explode(",",$share[5]);
	$c6=@explode(",",$share[6]);
	$c7=@explode(",",$share[7]);
	$c8=@explode(",",$share[8]);
	
	#$cy0=@explode(",",$share[0]);
	$cy1=@explode(",",$myshare[2]);
	$cy2=@explode(",",$myshare[3]);
	$cy3=@explode(",",$myshare[4]);
	$cy4=@explode(",",$myshare[5]);
	$cy5=@explode(",",$myshare[6]);
	$cy6=@explode(",",$myshare[7]);
	$cy7=@explode(",",$myshare[8]);
	#$cy8=@explode(",",$myshare[9]);
		###################
	#$ct0=$c0[4];
	$ct1=$c1[4];
	$ct2=$c2[4];
	$ct3=$c3[4];
	$ct4=$c4[4];
	$ct5=$c5[4];
	$ct6=$c6[4];
	$ct7=$c7[4];
	$ct8=$c8[4];
	
	#$ct0=$c0[4];
	$cty1=$cy1[4];
	$cty2=$cy2[4];
	$cty3=$cy3[4];
	$cty4=$cy4[4];
	$cty5=$cy5[4];
	$cty6=$cy6[4];
	$cty7=$cy7[4];
	#$cty8=$cy8[4];
	}
	
		if($level==2){
		return array("sm"=>"$ct1","s1"=>"0","s2"=>"0","s3"=>"0","s4"=>"0","s5"=>"0","s6"=>"0","s7"=>"0","s8"=>"0");
		}elseif($level==3){
		return array("sm"=>"$ct2","s1"=>"$cty1","s2"=>"0","s3"=>"0","s4"=>"0","s5"=>"0","s6"=>"0","s7"=>"0","s8"=>"0");
		}elseif($level==4){
		return array("sm"=>"$ct3","s1"=>"$cty1","s2"=>"$cty2","s3"=>"0","s4"=>"0","s5"=>"0","s6"=>"0","s7"=>"0","s8"=>"0");
		}elseif($level==5){
		return array("sm"=>"$ct4","s1"=>"$cty1","s2"=>"$cty2","s3"=>"$cty3","s4"=>"0","s5"=>"0","s6"=>"0","s7"=>"0","s8"=>"0");
		}elseif($level==6){
		return array("sm"=>"$ct5","s1"=>"$cty1","s2"=>"$cty2","s3"=>"$cty3","s4"=>"$cty4","s5"=>"0","s6"=>"0","s7"=>"0","s8"=>"0");
		}elseif($level==7){
		return array("sm"=>"$ct6","s1"=>"$cty1","s2"=>"$cty2","s3"=>"$cty3","s4"=>"$cty4","s5"=>"$cty5","s6"=>"0","s7"=>"0","s8"=>"0");
		}elseif($level==8){
		return array("sm"=>"$ct7","s1"=>"$cty1","s2"=>"$cty2","s3"=>"$cty3","s4"=>"$cty4","s5"=>"$cty5","s6"=>"$cty6","s7"=>"0","s8"=>"0");
		}elseif($level==9){
		return array("sm"=>"$ct8","s1"=>"$cty1","s2"=>"$cty2","s3"=>"$cty3","s4"=>"$cty4","s5"=>"$cty5","s6"=>"$cty6","s7"=>"$cty7","s8"=>"0");
			}


	
}
function permy($h,$p){
	if($h<0){
		$x=2+($h);
		$a=$x-($p/100);
	}else{
		$x=$h+($p/100);
		if($x<=1.00){
			$a=$x;
		}else{
			$a=$x-2;
		}
	}

	return $a;
}

function getMaintenance(){
	$path = getConfigMaintenancePath();
	include $path;
	return $config_maintenance;
}

function getConfigMaintenancePath(){
	return __DIR__.'/../../../w1/inc/config_maintenance.php';
}

function factorial($n){
	$number = $n;
	$a = substr("$number", -3, 1);   
$b = substr("$number", -2, 1);   
$c = substr("$number", -1); 
	
	$ret = array();
	
	 $n1 = $a.$b.$c;
	 $ret[] = $n1;
	 $n2 = $a.$c.$b;
	 $ret[] = $n2;
	 $n3 = $b.$a.$c; 
	 $ret[] = $n3;
	 $n4 = $b.$c.$a; 
	 $ret[] = $n4;
	 $n5 = $c.$a.$b; 
	 $ret[] = $n5;
	 $n6 = $c.$b.$a; 
	 $ret[] = $n6;
	 
	return array_unique($ret);
}

?>
