<?php
if($_SESSION["AGlang"]==""){
	
	if($_POST["session"]["AGlang"]==""){
		$sx_file = "th";
	}else{
		$sx_file = $_POST["session"]["AGlang"];
	}
}else{
	$sx_file = $_SESSION["AGlang"];
}


require("/home/ohoking/domains/texasbetx.com/public_html/admin_lang/export/lang_ag_".$sx_file.".php");
require("/home/ohoking/domains/texasbetx.com/public_html/admin_lang/export/lang_member_".$sx_file.".php");

$lang_g["setpay"][0] ="4 ตัวตรง";
$lang_g["setpay"][1] ="4 ตัวโต๊ด";
$lang_g["setpay"][2] ="3 ตัวตรง(หลัง)";
$lang_g["setpay"][3] ="3 ตัวหน้าตรง";
$lang_g["setpay"][4] ="3 ตัวโต๊ด(หลัง)";
$lang_g["setpay"][5] ="2 ตัวหน้า(2ล่าง)";
$lang_g["setpay"][6] ="2 ตัวตรง";


$lang_g["casino_share"][1] = "SA Gaming";
$lang_g["casino_share"][2] = "Sexy Gaming";
$lang_g["casino_share"][3] = "Joker Slot";
$lang_g["casino_share"][4] = "PG SLOT";
$lang_g["casino_share"][5] = "918 Kiss";
$lang_g["casino_share"][6] = "RED 365";
$lang_g["casino_share"][7] = "EPIC WIN";

$lang_g["bet_type"]["sc"] = "ฟุตบอล";
$lang_g["bet_type"]["sp"] = "กีฬา";
$lang_g["bet_type"]["bx"] = "มวยไทย";
$lang_g["bet_type"]["st"] = "สเต็ป";
$lang_g["bet_type"]["lg"] = "หวย";
$lang_g["bet_type"]["ls"] = "หวยหุ้น";
$lang_g["bet_type"]["ll"] = "หวยชุด";
$lang_g["bet_type"]["gm"] = "เกมส์";
$lang_g["bet_type"]["cn"] = "คาสิโน";
$lang_g["bet_type"]["suggest"] = "แนะนำเพื่อน";

$lang_lotHun['rob'][4] = array(1 =>"เช้า" , "เที่ยง" , "บ่าย" , "เย็น");
$lang_lotHun['rob'][2] = array(1 =>"เช้า" , "เที่ยง");

$ca_status= array(1 =>  "ชนะ","ชนะ"."½","คืนทุน","แพ้","แพ้"."½","ยกเลิก","รอ" ); 

$ca_type= array(1 =>  "บาคาร่า","บาคาร่า","บาคาร่า","บาคาร่า","บาคาร่า","บาคาร่า","บาคาร่า"
 ,21 =>  "ประกันบาคาร่า","ประกันบาคาร่า","ประกันบาคาร่า"
 ,31 =>  "เสือ".' '."มังกร","เสือ".' '."มังกร","เสือ".' '."มังกร"
 ,51 =>  " ไฮโล"," ไฮโล"," ไฮโล" ); 

 $ca_id= array(1 =>  "BAC","BAC","BAC","BAC","BAC","BAC","BAC"
 ,21 =>  "InsBAC","InsBAC","InsBAC"
 ,31 =>  "DT","DT","DT"
 ,51 =>  "SIC","SIC","SIC" ); 
  $ca_bet[1]= array(1 =>  "BAC","BAC","BAC","BAC","BAC","BAC","BAC"
 ,21 =>  "InsBAC","InsBAC","InsBAC"
 ,31 =>  "DT","DT","DT"
 ,51 =>  "Sic Bo","Sic Bo","Sic Bo" ); 

 $ca_txt[1] = array(1=>"เจ้ามือ" , 2=>"ผู้เล่น"  , 3=>"เสมอ" , 4=>"เจ้ามือคู่" , 5=>"ผู้เล่นคู่" , 6=>"โบนัส เจ้ามือ" , 7=>"โบนัส ผู้เล่น" , 8=>"ใหญ่" , 9=>"เล็ก" , 10=>"ฟีนิค" , 11=>"เต๋า");
 $ca_txt[2] = array(1=>"เจ้ามือ" , 2=>"ผู้เล่น"  , 3=>"เสมอ" , 4=>"เจ้ามือคู่" , 5=>"ผู้เล่นคู่" , 6=>"โบนัส เจ้ามือ" , 7=>"โบนัส ผู้เล่น" , 8=>"ใหญ่" , 9=>"เล็ก" , 10=>"ฟีนิค" , 11=>"เต๋า");
 $ca_txt[3] = array(1=>"เจ้ามือ" , 2=>"ผู้เล่น"  , 3=>"เสมอ" , 4=>"เจ้ามือคู่" , 5=>"ผู้เล่นคู่" , 6=>"โบนัส เจ้ามือ" , 7=>"โบนัส ผู้เล่น" , 8=>"ใหญ่" , 9=>"เล็ก" , 10=>"ฟีนิค" , 11=>"เต๋า");
 $ca_txt[4] = array(1=>"เจ้ามือ" , 2=>"ผู้เล่น"  , 3=>"เสมอ" , 4=>"เจ้ามือคู่" , 5=>"ผู้เล่นคู่" , 6=>"โบนัส เจ้ามือ" , 7=>"โบนัส ผู้เล่น" , 8=>"ใหญ่" , 9=>"เล็ก" , 10=>"ฟีนิค" , 11=>"เต๋า");
 $ca_txt[5] = array(1=>"เจ้ามือ" , 2=>"ผู้เล่น"  , 3=>"เสมอ" , 4=>"เจ้ามือคู่" , 5=>"ผู้เล่นคู่" , 6=>"โบนัส เจ้ามือ" , 7=>"โบนัส ผู้เล่น" , 8=>"ใหญ่" , 9=>"เล็ก" , 10=>"ฟีนิค" , 11=>"เต๋า");
 $ca_txt[6] = array(1=>"เจ้ามือ" , 2=>"ผู้เล่น"  , 3=>"เสมอ" , 4=>"เจ้ามือคู่" , 5=>"ผู้เล่นคู่" , 6=>"โบนัส เจ้ามือ" , 7=>"โบนัส ผู้เล่น" , 8=>"ใหญ่" , 9=>"เล็ก" , 10=>"ฟีนิค" , 11=>"เต๋า");
 $ca_txt[7] = array(1=>"เจ้ามือ" , 2=>"ผู้เล่น"  , 3=>"เสมอ" , 4=>"เจ้ามือคู่" , 5=>"ผู้เล่นคู่" , 6=>"โบนัส เจ้ามือ" , 7=>"โบนัส ผู้เล่น" , 8=>"ใหญ่" , 9=>"เล็ก" , 10=>"ฟีนิค" , 11=>"เต๋า");
 
 $ca_txt[21] = array(1=>"เจ้ามือ" , 2=>"ผู้เล่น"  , 3=>"เสมอ" , 4=>"เจ้ามือคู่" , 5=>"ผู้เล่นคู่" , 6=>"โบนัส เจ้ามือ" , 7=>"โบนัส ผู้เล่น" , 8=>"ใหญ่" , 9=>"เล็ก" , 10=>"ฟีนิค" , 11=>"เต๋า");
 $ca_txt[22] = array(1=>"เจ้ามือ" , 2=>"ผู้เล่น"  , 3=>"เสมอ" , 4=>"เจ้ามือคู่" , 5=>"ผู้เล่นคู่" , 6=>"โบนัส เจ้ามือ" , 7=>"โบนัส ผู้เล่น" , 8=>"ใหญ่" , 9=>"เล็ก" , 10=>"ฟีนิค" , 11=>"เต๋า");
 
 $ca_txt[31] = array(1=>"มังกร" , 2=>"เสือ"  , 3=>"เสมอ");
 $ca_txt[32] = array(1=>"มังกร" , 2=>"เสือ"  , 3=>"เสมอ");
 $ca_txt[33] = array(1=>"มังกร" , 2=>"เสือ"  , 3=>"เสมอ");
 
 $ca_txt[51] = array(1=>"ออกตอง" , 2=>"คี่"  , 3=>"คู่" , 4=>"ต่ำ" , 5=>"สูง" , 6=>"ตอง1" , 7=>"ตอง2" , 8=>"ตอง3" , 9=>"ตอง4" , 10=>"ตอง5" , 11=>"ตอง6" , 12=>"คู่1" , 13=>"คู่2" , 14=>"คู่3" , 15=>"คู่4" , 16=>"คู่5" , 17=>"คู่6" , 18=>"รวม4" , 19=>"รวม5" , 20=>"รวม6" , 21=>"รวม7" , 22=>"รวม8" , 23=>"รวม9" , 24=>"รวม10" , 25=>"รวม11" , 26=>"รวม12" , 27=>"รวม13" , 28=>"รวม14" , 29=>"รวม15" , 30=>"รวม16" , 31=>"รวม17" , 32=>"ผลรวม12" , 33=>"ผลรวม13" , 34=>"ผลรวม14" , 35=>"ผลรวม15" , 36=>"ผลรวม16" , 37=>"ผลรวม23" , 38=>"ผลรวม24" , 39=>"ผลรวม25" , 40=>"ผลรวม26" , 41=>"ผลรวม34" , 42=>"ผลรวม35" , 43=>"ผลรวม36" , 44=>"ผลรวม45" , 45=>"ผลรวม46" , 46=>"ผลรวม56" , 47=>"เต็ง1" , 48=>"เต็ง2" , 49=>"เต็ง3" , 50=>"เต็ง4" , 51=>"เต็ง5" , 52=>"เต็ง6");
 $ca_txt[52] = array(1=>"ออกตอง" , 2=>"คี่"  , 3=>"คู่" , 4=>"ต่ำ" , 5=>"สูง" , 6=>"ตอง1" , 7=>"ตอง2" , 8=>"ตอง3" , 9=>"ตอง4" , 10=>"ตอง5" , 11=>"ตอง6" , 12=>"คู่1" , 13=>"คู่2" , 14=>"คู่3" , 15=>"คู่4" , 16=>"คู่5" , 17=>"คู่6" , 18=>"รวม4" , 19=>"รวม5" , 20=>"รวม6" , 21=>"รวม7" , 22=>"รวม8" , 23=>"รวม9" , 24=>"รวม10" , 25=>"รวม11" , 26=>"รวม12" , 27=>"รวม13" , 28=>"รวม14" , 29=>"รวม15" , 30=>"รวม16" , 31=>"รวม17" , 32=>"ผลรวม12" , 33=>"ผลรวม13" , 34=>"ผลรวม14" , 35=>"ผลรวม15" , 36=>"ผลรวม16" , 37=>"ผลรวม23" , 38=>"ผลรวม24" , 39=>"ผลรวม25" , 40=>"ผลรวม26" , 41=>"ผลรวม34" , 42=>"ผลรวม35" , 43=>"ผลรวม36" , 44=>"ผลรวม45" , 45=>"ผลรวม46" , 46=>"ผลรวม56" , 47=>"เต็ง1" , 48=>"เต็ง2" , 49=>"เต็ง3" , 50=>"เต็ง4" , 51=>"เต็ง5" , 52=>"เต็ง6");
 $ca_txt[53] = array(1=>"ออกตอง" , 2=>"คี่"  , 3=>"คู่" , 4=>"ต่ำ" , 5=>"สูง" , 6=>"ตอง1" , 7=>"ตอง2" , 8=>"ตอง3" , 9=>"ตอง4" , 10=>"ตอง5" , 11=>"ตอง6" , 12=>"คู่1" , 13=>"คู่2" , 14=>"คู่3" , 15=>"คู่4" , 16=>"คู่5" , 17=>"คู่6" , 18=>"รวม4" , 19=>"รวม5" , 20=>"รวม6" , 21=>"รวม7" , 22=>"รวม8" , 23=>"รวม9" , 24=>"รวม10" , 25=>"รวม11" , 26=>"รวม12" , 27=>"รวม13" , 28=>"รวม14" , 29=>"รวม15" , 30=>"รวม16" , 31=>"รวม17" , 32=>"ผลรวม12" , 33=>"ผลรวม13" , 34=>"ผลรวม14" , 35=>"ผลรวม15" , 36=>"ผลรวม16" , 37=>"ผลรวม23" , 38=>"ผลรวม24" , 39=>"ผลรวม25" , 40=>"ผลรวม26" , 41=>"ผลรวม34" , 42=>"ผลรวม35" , 43=>"ผลรวม36" , 44=>"ผลรวม45" , 45=>"ผลรวม46" , 46=>"ผลรวม56" , 47=>"เต็ง1" , 48=>"เต็ง2" , 49=>"เต็ง3" , 50=>"เต็ง4" , 51=>"เต็ง5" , 52=>"เต็ง6");
 

$ca_color[1] = array(1=>"banker" , 2=>"player"  , 3=>"tie" , 4=>"banker" , 5=>"player" , 6=>"banker" , 7=>"player" , 8=>"other" , 9=>"other" , 10=>"other" , 11=>"other");
$ca_color[2] = array(1=>"banker" , 2=>"player"  , 3=>"tie" , 4=>"banker" , 5=>"player" , 6=>"banker" , 7=>"player" , 8=>"other" , 9=>"other" , 10=>"other" , 11=>"other");
$ca_color[3] = array(1=>"banker" , 2=>"player"  , 3=>"tie" , 4=>"banker" , 5=>"player" , 6=>"banker" , 7=>"player" , 8=>"other" , 9=>"other" , 10=>"other" , 11=>"other");
$ca_color[4] = array(1=>"banker" , 2=>"player"  , 3=>"tie" , 4=>"banker" , 5=>"player" , 6=>"banker" , 7=>"player" , 8=>"other" , 9=>"other" , 10=>"other" , 11=>"other");
$ca_color[5] = array(1=>"banker" , 2=>"player"  , 3=>"tie" , 4=>"banker" , 5=>"player" , 6=>"banker" , 7=>"player" , 8=>"other" , 9=>"other" , 10=>"other" , 11=>"other");
$ca_color[6] = array(1=>"banker" , 2=>"player"  , 3=>"tie" , 4=>"banker" , 5=>"player" , 6=>"banker" , 7=>"player" , 8=>"other" , 9=>"other" , 10=>"other" , 11=>"other");
$ca_color[7] = array(1=>"banker" , 2=>"player"  , 3=>"tie" , 4=>"banker" , 5=>"player" , 6=>"banker" , 7=>"player" , 8=>"other" , 9=>"other" , 10=>"other" , 11=>"other");

$ca_color[21] = array(1=>"banker" , 2=>"player"  , 3=>"tie" , 4=>"banker" , 5=>"player" , 6=>"banker" , 7=>"player" , 8=>"other" , 9=>"other" , 10=>"other" , 11=>"other");
$ca_color[22] = array(1=>"banker" , 2=>"player"  , 3=>"tie" , 4=>"banker" , 5=>"player" , 6=>"banker" , 7=>"player" , 8=>"other" , 9=>"other" , 10=>"other" , 11=>"other");

$ca_color[31] = array(1=>"banker" , 2=>"player"  , 3=>"tie");
$ca_color[32] = array(1=>"banker" , 2=>"player"  , 3=>"tie");
$ca_color[33] = array(1=>"banker" , 2=>"player"  , 3=>"tie");



$arr_bank = array(1=>"กสิกรไทย", "ไทยพาณิชย์", "กรุงเทพ", "กรุงไทย", "ทหารไทย", "กรุงศรีอยุธยา");

$arr_province=array(1=>"กรุงเทพมหานคร " , "สมุทรปราการ " , "นนทบุรี " , "ปทุมธานี " , "พระนครศรีอยุธยา " , "อ่างทอง " , "ลพบุรี " , "สิงห์บุรี " , "ชัยนาท " , "สระบุรี" , "ชลบุรี " , "ระยอง " , "จันทบุรี " , "ตราด " , "ฉะเชิงเทรา " , "ปราจีนบุรี " , "นครนายก " , "สระแก้ว " , "นครราชสีมา " , "บุรีรัมย์ " , "สุรินทร์ " , "ศรีสะเกษ " , "อุบลราชธานี " , "ยโสธร " , "ชัยภูมิ " , "อำนาจเจริญ " , "หนองบัวลำภู " , "ขอนแก่น " , "อุดรธานี " , "เลย " , "หนองคาย " , "มหาสารคาม " , "ร้อยเอ็ด " , "กาฬสินธุ์ " , "สกลนคร " , "นครพนม " , "มุกดาหาร " , "เชียงใหม่ " , "ลำพูน " , "ลำปาง " , "อุตรดิตถ์ " , "แพร่ " , "น่าน " , "พะเยา " , "เชียงราย " , "แม่ฮ่องสอน " , "นครสวรรค์ " , "อุทัยธานี " , "กำแพงเพชร " , "ตาก " , "สุโขทัย " , "พิษณุโลก " , "พิจิตร " , "เพชรบูรณ์ " , "ราชบุรี " , "กาญจนบุรี " , "สุพรรณบุรี " , "นครปฐม " , "สมุทรสาคร " , "สมุทรสงคราม " , "เพชรบุรี " , "ประจวบคีรีขันธ์ " , "นครศรีธรรมราช " , "กระบี่ " , "พังงา " , "ภูเก็ต " , "สุราษฎร์ธานี " , "ระนอง " , "ชุมพร " , "สงขลา " , "สตูล " , "ตรัง " , "พัทลุง " , "ปัตตานี " , "ยะลา " , "นราธิวาส " , "บึงกาฬ");

$normal_list = array("3 บน","3ล่าง","3โต๊ด","2บน","2ล่าง");
$extra_list = array("วิ่งบน","วิ่งล่าง","ปักหลักหน่วย"); 


$lang_lotHun['rob'][4] = array(1 =>"เช้า" , "เที่ยง" , "บ่าย" , "เย็น");
$lang_lotHun['rob'][2] = array(1 =>"เช้า" , "เที่ยง");
$ab_status= array(1 =>"สำเร็จ", "<span class='cr'> ผิดพลาด </span>", "รอ"); 

$sport_type = array(1=>"มวยไทย" , 2=>"ไก่ชน"  , 3=>"วัวชน" , 4=>"วิ่งวัว" , 5=>"แข่งเรือ" , 6=>"บอล" , 7=>"บาสเก็ตบอล" , 8=>"ฮ๊อกกี้น้ำแข็ง" , 9=>"เทนนิส" , 10=>"แบตมินตัน" , 11=>"มวยสากล" , 12=>"แฮนด์บอล" , 13=>"โปโลน้ำ" , 14=>"วอลเลย์บอล" , 15=>"รถแข่ง" , 16=>"ฟุตซอล" , 17=>"เบสบอล" , 18=>"ปิงปอง" , 19=>"สนุกเกอร์" , 20=>"กอล์ฟ");

$lang_g['game_zone'][1] = "2ฮิต";
$lang_g['game_zone'][2] = "ดราก้อน-ไทเกอร์";
$lang_g['game_zone'][3] = "บาคาร่า";
$lang_g['game_zone'][4] = "ไฮโล";
$lang_g['game_zone'][5] = "น้ำเต้าปูปล";

?> 