<?
date_default_timezone_set("Asia/Bangkok");
$timezone=0;
$num_rob=1;




$time_stam=mktime(date("H")+$timezone,date("i"),date("s"),date("m"),date("d"),date("Y"));
#$fstep=array("เสมอ","ปป","0.5","0.5+1","1","1+1.5","1.5","1.5+2","2","2+2.5","2.5","2.5+3","3","3+3.5","3.5","3.5+4","4","4+4.5","4.5","4.5+5","5","5+5.5","5.5","5.5+6","6","6+6.5","6.5","6.5+7","7","7+7.5","7.5","7.5+8","8","*ปิด*");

#$f_payn= array( "1.60","1.70",  "1.80", "1.90", "2.0", "2.10", "2.20"); 
$f_active= array("<span class='cr'>ระงับ</span>", "ปกติ","<span class='cbu'>ปิดพนัน</span>" );
$f_agent= array("<span class='cr'>โต๊ะ</span>", "<span class='cbu'>เอเย่น</span>");
$f_status= array(1 =>"ได้", "คืนทุน", "เสีย", "ยกเลิก", "รอ"); 
$f_tang= array("<span class='cr'>แทงไม่ได้</span>", "แทงได้");
$f_price= array("<span class='cr'>แก้ไม่ได้</span>", "แก้ได้");
$f_del= array("<span class='cr'>ลบไม่ได้</span>", "ลบได้");
$f_news= array(1 =>"ประกาศ", "ยกเลิกบอล", "อื่นๆ"); 
$ball_type2= array(1 =>"<span class='cg'>ได้เต็ม</span>","<span class='cg'>ได้ครึ่ง</span>","<span class='cbu'>คืนทุน</span>", "<span class='cr'>เสียเต็ม</span>", "<span class='cr'>เสียครึ่ง</span>", "<span class='cr'>ปฏิเสธคู่นี้</span>", "<span class='cb'>รอผล</span>"); 
$f_p_agent= array("โต๊ะบอล", "เอเย่น เล่นออนไลน์"); 
$f_accept= array("<span class='cg'>รอยืนยัน</span>", "อัตโนมัติ","<span class='cr'>ปฏิเสธ</span>","<span class='cg'>รอยืนยัน</span>","<span class='cg'>รอยืนยัน Live</span>"); 
$ball_type3= array(1 =>"ได้เต็ม","ได้ครึ่ง","คืนทุน", "เสียเต็ม", "เสียครึ่ง", "ปฏิเสธคู่นี้", "รอผล"); 

$ball_currency= array(1 =>"บาทไทย","ดอลลาร์สหรัฐ","กีบลาว", "จ๊าตพม่า"); 
$ball_currencyx= array(1 =>"THB","USD","LAK", "MMK"); 

$ab_status= array(1 =>"สำเร็จ", "<span class='cr'>ผิดพลาด</span>", "รอ"); 

$lot_zone["th"]= array(1 =>"หวยไทย",2 =>"หวยหุ้นไทย",3 =>"หวยลาว" ,4=>"หวยมาเลเซีย",5=>"หวยเวียดนาม",6=>"หุ้นนิเคอิ",7=>"หุ้นฮั่งเส็ง",8=>"หุ้นดาวโจนส์",9=>"หุ้นสิงคโปร์",10=>"หุ้นอียิปต์",11=>"หุ้นรัสเซีย",12=>"หุ้นเยอรมัน",13=>"หุ้นอังกฤษ",14=>"หวยรายวัน");


$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง", 8 =>"ปักหลักหน่วย", 9 =>"ปักหลักสิบ", 10 =>"ปักหลักร้อย", 11 =>"2โต๊ด", 12 =>"3ใน4", 13 =>"3ใน5" , 14 =>"1ตัวบน สูง-ต่ำ" , 15 =>"2ตัวบน สูง-ต่ำ", 16 =>"3ตัวบน สูง-ต่ำ", 17 =>"2ตัวล่าง สูง-ต่ำ", 19 =>"คี่-คู่");
$arr_bank = array(1=> "กสิกรไทย" , "ไทยพาณิชย์" , "กรุงเทพ" , "กรุงไทย"  ,"ทหารไทย"  , "กรุงศรีอยุธยา");
$arr_province=array(1=>"กรุงเทพมหานคร " , "สมุทรปราการ " , "นนทบุรี " , "ปทุมธานี " , "พระนครศรีอยุธยา " , "อ่างทอง " , "ลพบุรี " , "สิงห์บุรี " , "ชัยนาท " , "สระบุรี" , "ชลบุรี " , "ระยอง " , "จันทบุรี " , "ตราด " , "ฉะเชิงเทรา " , "ปราจีนบุรี " , "นครนายก " , "สระแก้ว " , "นครราชสีมา " , "บุรีรัมย์ " , "สุรินทร์ " , "ศรีสะเกษ " , "อุบลราชธานี " , "ยโสธร " , "ชัยภูมิ " , "อำนาจเจริญ " , "หนองบัวลำภู " , "ขอนแก่น " , "อุดรธานี " , "เลย " , "หนองคาย " , "มหาสารคาม " , "ร้อยเอ็ด " , "กาฬสินธุ์ " , "สกลนคร " , "นครพนม " , "มุกดาหาร " , "เชียงใหม่ " , "ลำพูน " , "ลำปาง " , "อุตรดิตถ์ " , "แพร่ " , "น่าน " , "พะเยา " , "เชียงราย " , "แม่ฮ่องสอน " , "นครสวรรค์ " , "อุทัยธานี " , "กำแพงเพชร " , "ตาก " , "สุโขทัย " , "พิษณุโลก " , "พิจิตร " , "เพชรบูรณ์ " , "ราชบุรี " , "กาญจนบุรี " , "สุพรรณบุรี " , "นครปฐม " , "สมุทรสาคร " , "สมุทรสงคราม " , "เพชรบุรี " , "ประจวบคีรีขันธ์ " , "นครศรีธรรมราช " , "กระบี่ " , "พังงา " , "ภูเก็ต " , "สุราษฎร์ธานี " , "ระนอง " , "ชุมพร " , "สงขลา " , "สตูล " , "ตรัง " , "พัทลุง " , "ปัตตานี " , "ยะลา " , "นราธิวาส " , "บึงกาฬ");
function slaap($seconds) 
{ 
    $seconds = abs($seconds); 
    if ($seconds < 1): 
       usleep($seconds*1000000); 
    else: 
       sleep($seconds); 
    endif;    
} 

################### แปลงวันที่
###########################
	function _cvf($strDate, $mode){
	$month_key = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"); 
	$month_full = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
	$month_short = array("ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
	
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
	

	
	

	

	
	
function _bdate(){
global $timezone;	
global $time_stam;
global $num_rob;

if((date("Hi", $time_stam)>=0) and (date("Hi", $time_stam)<=900)){
	$view_date=date("d-m-Y",mktime(date("H")+$timezone,date("i"),date("s"),date("m"),date("d")-1,date("Y")));
	}else{$view_date=date("d-m-Y",$time_stam);}		



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
	


		

		
	############### แบ่งหน้า
############################
############################
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
#$pageok.="หน้า&nbsp;";
$pageok.="Page&nbsp;";
if($pg>1)
{
$backf=$pg-1;
#$pageok .="<a href=$doo".$backf." title='หน้าย้อนกลับ'> << </a>&nbsp;";
$pageok .="<a href=$doo".$backf." title='Previous'> << </a>&nbsp;";
$pageok .="<a href=$doo"."1 title='First'> 1 </a>&nbsp; ";
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
$pageok .="<b><font  title='Page $i' style='border: 1px solid #666;background-color:#545454; color:#f00;'> &nbsp;$i&nbsp; </font></b> ";
}
else{
$pageok .="<a href=$doo$i title=Page$i> &nbsp;$i&nbsp; </a>";
}

}





if(($pg<$totalpage) and ($totalpage!=1))
{
$nextf=$pg+1;
$pageok .="&nbsp;<a href=$doo".$totalpage." title='Last'> $totalpage </a>";
$pageok .="&nbsp;<a href=$doo".$nextf." title='Next'> >> </a>";
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
$pageok .="<a  title='หน้าย้อนกลับ' onclick='_pg($backf,$rid)'  style='cursor:pointer;'> << </a>&nbsp;";
$pageok .="<a  title='หน้าแรก' onclick='_pg(1,$rid)'  style='cursor:pointer;'> 1 </a>&nbsp; ";
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
$pageok .="<a  title='หน้า$i' onclick='_pg($i,$rid)'  style='cursor:pointer;'> &nbsp;$i&nbsp; </a>";
}

}





if(($pg<$totalpage) and ($totalpage!=1))
{
$nextf=$pg+1;
$pageok .="&nbsp;<a  title='หน้าสุดท้าย' onclick='_pg($totalpage,$rid)'  style='cursor:pointer;'> $totalpage </a>";
$pageok .="&nbsp;<a  title='หน้าถัดไป'  onclick='_pg($nextf,$rid)'  style='cursor:pointer;'> >> </a>";
}
$pageok .="</div>";
//echo $pageok;
return $pageok;}
//echo _page("learn","5");
################# randdom

	
function _type_ball($type,$bet,$sf,$sh){
 
 global $lang;
	if($lang==""){
	if($type==1){ $txt='FT เจ้าบ้าน';$bet_a=$bet;$score=$sf;}
	elseif($type==2){$txt='FT ทีมเยือน';$bet_a=$bet;$score=$sf;}
	elseif($type==3){$txt='FT สูง';$bet_a=$bet;$score=$sf;}
	elseif($type==4){$txt='FT ต่ำ';$bet_a=$bet;$score=$sf;}
	elseif($type==5){$txt='FT เจ้าบ้านชนะ';$score=$sf;}
	elseif($type==6){$txt='FT เสมอ';$score=$sf;}
	elseif($type==7){$txt='FT ทีมเยือนชนะ';$score=$sf;}
	elseif($type==8){$txt='FT คี่';$score=$sf;}
	elseif($type==9){$txt='FT คู่';$score=$sf;}
	
	elseif($type==11){ $txt='1H เจ้าบ้าน';$bet_a=$bet;$score=$sh;}
	elseif($type==12){$txt='1H ทีมเยือน';$bet_a=$bet;$score=$sh;}
	elseif($type==13){$txt='1H สูง';$bet_a=$bet;$score=$sh;}
	elseif($type==14){$txt='1H ต่ำ';$bet_a=$bet;$score=$sh;}
	elseif($type==15){$txt='1H เจ้าบ้านชนะ';$score=$sh;}
	elseif($type==16){$txt='1H เสมอ';$score=$sh;}
	elseif($type==17){$txt='1H ทีมเยือนชนะ';$score=$sh;}
	elseif($type==18){$txt='1H คี่';$score=$sh;}
	elseif($type==19){$txt='1H คู่';$score=$sh;}
	
	}else{
		
	if($type==1){ $txt='FT Home';$bet_a=$bet;$score=$sf;}
	elseif($type==2){$txt='FT Away';$bet_a=$bet;$score=$sf;}
	elseif($type==3){$txt='FT Over';$bet_a=$bet;$score=$sf;}
	elseif($type==4){$txt='FT Under';$bet_a=$bet;$score=$sf;}
	elseif($type==5){$txt='FT Home Win';$score=$sf;}
	elseif($type==6){$txt='FT Peer';$score=$sf;}
	elseif($type==7){$txt='FT Away Win';$score=$sf;}
	elseif($type==8){$txt='FT Odd';$score=$sf;}
	elseif($type==9){$txt='FT Even';$score=$sf;}
	
	elseif($type==11){ $txt='1H Home';$bet_a=$bet;$score=$sh;}
	elseif($type==12){$txt='1H  Away';$bet_a=$bet;$score=$sh;}
	elseif($type==13){$txt='1H  Over';$bet_a=$bet;$score=$sh;}
	elseif($type==14){$txt='1H  Under';$bet_a=$bet;$score=$sh;}
	elseif($type==15){$txt='1H  Home Win';$score=$sh;}
	elseif($type==16){$txt='1H  Peer';$score=$sh;}
	elseif($type==17){$txt='1H  Away Win';$score=$sh;}
	elseif($type==18){$txt='1H Odd';$score=$sh;}
	elseif($type==19){$txt='1H Even';$score=$sh;}
	
		}

if($score==""){$score='?-?';}

	
	return array(1=>$txt,$bet_a,$score);
	
	}	
	
	
	function _no0($val){
		if($val>0){return  number_format($val, 2, '.', '');}
		}	
		
	function _bu($id, $out){
		if($out!=""){return $out;}
		else{return $id;}
		}	
		
		
function _dis($m_level , $num_s ,$exd1 , $exd2 , $exd3 , $exd4 , $exd5 , $exd6 , $exd7 , $exd8 , $exdm  , $exd1d5){
$stepdis=$num_s-1;

if($num_s==1){
if($exd1d5[1]>0.00){ $exd1[$stepdis]=$exd1d5[1]; } 
if($exd1d5[2]>0.00){ $exd2[$stepdis]=$exd1d5[2]; } 
if($exd1d5[3]>0.00){ $exd3[$stepdis]=$exd1d5[3]; } 
if($exd1d5[4]>0.00){ $exd4[$stepdis]=$exd1d5[4]; } 
if($exd1d5[5]>0.00){ $exd5[$stepdis]=$exd1d5[5]; } 
if($exd1d5[6]>0.00){ $exd6[$stepdis]=$exd1d5[6]; } 
if($exd1d5[7]>0.00){ $exd7[$stepdis]=$exd1d5[7]; } 
if($exd1d5[8]>0.00){ $exd8[$stepdis]=$exd1d5[8]; } 
if($exd1d5[m]>0.00){ $exdm[$stepdis]=$exd1d5[m]; } 
	}

if($m_level==2){
$dis_arr=$exd1[$stepdis].','.$exdm[$stepdis];
}elseif($m_level==3){
$dis_arr=$exd1[$stepdis].','.$exd2[$stepdis].','.$exdm[$stepdis];
}elseif($m_level==4){
$dis_arr=$exd1[$stepdis].','.$exd2[$stepdis].','.$exd3[$stepdis].','.$exdm[$stepdis];
}elseif($m_level==5){
$dis_arr=$exd1[$stepdis].','.$exd2[$stepdis].','.$exd3[$stepdis].','.$exd4[$stepdis].','.$exdm[$stepdis];
}elseif($m_level==6){
$dis_arr=$exd1[$stepdis].','.$exd2[$stepdis].','.$exd3[$stepdis].','.$exd4[$stepdis].','.$exd5[$stepdis].','.$exdm[$stepdis];
}elseif($m_level==7){
$dis_arr=$exd1[$stepdis].','.$exd2[$stepdis].','.$exd3[$stepdis].','.$exd4[$stepdis].','.$exd5[$stepdis].','.$exd6[$stepdis].','.$exdm[$stepdis];
}elseif($m_level==8){
$dis_arr=$exd1[$stepdis].','.$exd2[$stepdis].','.$exd3[$stepdis].','.$exd4[$stepdis].','.$exd5[$stepdis].','.$exd6[$stepdis].','.$exd7[$stepdis].','.$exdm[$stepdis];
}elseif($m_level==9){
$dis_arr=$exd1[$stepdis].','.$exd2[$stepdis].','.$exd3[$stepdis].','.$exd4[$stepdis].','.$exd5[$stepdis].','.$exd6[$stepdis].','.$exd7[$stepdis].','.$exd8[$stepdis].','.$exdm[$stepdis];
}
	return $dis_arr;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
function _nam($m_level , $big , $type , $hdc ,$exn1 , $exn2 , $exn3 , $exn4 , $exn5 , $exn6 , $exn7 , $exn8 , $mxn ){

if($m_level==2){

if(($big==1 and $type==1) or  ($big==2 and $type==2)  or  ($big==1 and $type==11)  or  ($big==2 and $type==12) or    $type==3 or $type==5 or $type==6 or $type==7 or $type==8 or $type==9  or $type==13 or $type==15 or $type==16 or $type==17 or $type==18 or $type==19 ){
	

	$namm=$hdc-((($mxn[0])/100));
	$nam8=0;
	$nam7=0;
	$nam6=0;
	$nam5=0;
	$nam4=0;
	$nam3=0;
	$nam2=0;
	$nam1=$namm+(($mxn[0]/100));
	

	}else{
		
	$namm=$hdc-((($mxn[1])/100));
	$nam8=0;
	$nam7=0;
	$nam6=0;
	$nam5=0;
	$nam4=0;
	$nam3=0;
	$nam2=0;
	$nam1=$namm+(($mxn[1]/100));
	
		}
return array("r1"=>$nam1,"mm"=>$namm);
		
}elseif($m_level==3){

if(($big==1 and $type==1) or  ($big==2 and $type==2)  or  ($big==1 and $type==11)  or  ($big==2 and $type==12) or    $type==3 or $type==5 or $type==6 or $type==7 or $type==8 or $type==9  or $type==13 or $type==15 or $type==16 or $type==17 or $type==18 or $type==19 ){
	
	$namm=$hdc-((($exn1[0]+$mxn[0])/100));
	$nam8=0;
	$nam7=0;
	$nam6=0;
	$nam5=0;
	$nam4=0;
	$nam3=0;
	$nam2=$namm+((($mxn[0])/100));
	$nam1=$nam2+((($exn1[0])/100));
	
	}else{
	
	$namm=$hdc-((($exn1[1]+$mxn[1])/100));
	$nam8=0;
	$nam7=0;
	$nam6=0;
	$nam5=0;
	$nam4=0;
	$nam3=0;
	$nam2=$namm+((($mxn[1])/100));
	$nam1=$nam2+((($exn1[1])/100));
	
		}
return array("r1"=>$nam1,"r2"=>$nam2,"mm"=>$namm);

}elseif($m_level==4){

if(($big==1 and $type==1) or  ($big==2 and $type==2)  or  ($big==1 and $type==11)  or  ($big==2 and $type==12) or    $type==3 or $type==5 or $type==6 or $type==7 or $type==8 or $type==9  or $type==13 or $type==15 or $type==16 or $type==17 or $type==18 or $type==19 ){
	
	$namm=$hdc-((($exn1[0]+$exn2[0]+$mxn[0])/100));
	$nam8=0;
	$nam7=0;
	$nam6=0;
	$nam5=0;
	$nam4=0;
	$nam3=$namm+((($mxn[0])/100));
	$nam2=$nam3+((($exn2[0])/100));
	$nam1=$nam2+((($exn1[0])/100));
	
	}else{
	
	$namm=$hdc-((($exn1[1]+$exn2[1]+$mxn[1])/100));
	$nam8=0;
	$nam7=0;
	$nam6=0;
	$nam5=0;
	$nam4=0;
	$nam3=$namm+((($mxn[1])/100));
	$nam2=$nam3+((($exn2[1])/100));
	$nam1=$nam2+((($exn1[1])/100));
		}
return array("r1"=>$nam1,"r2"=>$nam2,"r3"=>$nam3,"mm"=>$namm);

}elseif($m_level==5){

if(($big==1 and $type==1) or  ($big==2 and $type==2)  or  ($big==1 and $type==11)  or  ($big==2 and $type==12) or    $type==3 or $type==5 or $type==6 or $type==7 or $type==8 or $type==9  or $type==13 or $type==15 or $type==16 or $type==17 or $type==18 or $type==19 ){
	
	$namm=$hdc-((($exn1[0]+$exn2[0]+$exn3[0]+$mxn[0])/100));
	$nam8=0;
	$nam7=0;
	$nam6=0;
	$nam5=0;
	$nam4=$namm+((($mxn[0])/100));
	$nam3=$nam4+((($exn3[0])/100));
	$nam2=$nam3+((($exn2[0])/100));
	$nam1=$nam2+((($exn1[0])/100));
	
	}else{
	
	$namm=$hdc-((($exn1[1]+$exn2[1]+$exn3[1]+$mxn[1])/100));
	$nam8=0;
	$nam7=0;
	$nam6=0;
	$nam5=0;
	$nam4=$namm+((($mxn[1])/100));
	$nam3=$nam4+((($exn3[1])/100));
	$nam2=$nam3+((($exn2[1])/100));
	$nam1=$nam2+((($exn1[1])/100));
	
		}
return array("r1"=>$nam1,"r2"=>$nam2,"r3"=>$nam3,"r4"=>$nam4,"mm"=>$namm);

}elseif($m_level==6){

if(($big==1 and $type==1) or  ($big==2 and $type==2)  or  ($big==1 and $type==11)  or  ($big==2 and $type==12) or    $type==3 or $type==5 or $type==6 or $type==7 or $type==8 or $type==9  or $type==13 or $type==15 or $type==16 or $type==17 or $type==18 or $type==19 ){
	
	$namm=$hdc-((($exn1[0]+$exn2[0]+$exn3[0]+$exn4[0]+$mxn[0])/100));
	$nam8=0;
	$nam7=0;
	$nam6=0;
	$nam5=$namm+((($mxn[0])/100));
	$nam4=$nam5+((($exn4[0])/100));
	$nam3=$nam4+((($exn3[0])/100));
	$nam2=$nam3+((($exn2[0])/100));
	$nam1=$nam2+((($exn1[0])/100));
	
	}else{
	
	$namm=$hdc-((($exn1[1]+$exn2[1]+$exn3[1]+$exn4[1]+$mxn[1])/100));
	$nam8=0;
	$nam7=0;
	$nam6=0;
	$nam5=$namm+((($mxn[1])/100));
	$nam4=$nam5+((($exn4[1])/100));
	$nam3=$nam4+((($exn3[1])/100));
	$nam2=$nam3+((($exn2[1])/100));
	$nam1=$nam2+((($exn1[1])/100));
	
		}
return array("r1"=>$nam1,"r2"=>$nam2,"r3"=>$nam3,"r4"=>$nam4,"r5"=>$nam5,"mm"=>$namm);

}elseif($m_level==7){

if(($big==1 and $type==1) or  ($big==2 and $type==2)  or  ($big==1 and $type==11)  or  ($big==2 and $type==12) or    $type==3 or $type==5 or $type==6 or $type==7 or $type==8 or $type==9  or $type==13 or $type==15 or $type==16 or $type==17 or $type==18 or $type==19 ){
	
	$namm=$hdc-((($exn1[0]+$exn2[0]+$exn3[0]+$exn4[0]+$exn5[0]+$mxn[0])/100));
	$nam8=0;
	$nam7=0;
	$nam6=$namm+((($mxn[0])/100));
	$nam5=$nam6+((($exn5[0])/100));
	$nam4=$nam5+((($exn4[0])/100));
	$nam3=$nam4+((($exn3[0])/100));
	$nam2=$nam3+((($exn2[0])/100));
	$nam1=$nam2+((($exn1[0])/100));
	
	}else{
	
	$namm=$hdc-((($exn1[1]+$exn2[1]+$exn3[1]+$exn4[1]+$exn5[1]+$mxn[1])/100));
	$nam8=0;
	$nam7=0;
	$nam6=$namm+((($mxn[1])/100));
	$nam5=$nam6+((($exn5[1])/100));
	$nam4=$nam5+((($exn4[1])/100));
	$nam3=$nam4+((($exn3[1])/100));
	$nam2=$nam3+((($exn2[1])/100));
	$nam1=$nam2+((($exn1[1])/100));
	
		}
return array("r1"=>$nam1,"r2"=>$nam2,"r3"=>$nam3,"r4"=>$nam4,"r5"=>$nam5,"r6"=>$nam6,"mm"=>$namm);

}elseif($m_level==8){

if(($big==1 and $type==1) or  ($big==2 and $type==2)  or  ($big==1 and $type==11)  or  ($big==2 and $type==12) or    $type==3 or $type==5 or $type==6 or $type==7 or $type==8 or $type==9  or $type==13 or $type==15 or $type==16 or $type==17 or $type==18 or $type==19 ){
	
	$namm=$hdc-((($exn1[0]+$exn2[0]+$exn3[0]+$exn4[0]+$exn5[0]+$exn6[0]+$mxn[0])/100));
	$nam8=0;
	$nam7=$namm+((($mxn[0])/100));
	$nam6=$nam7+((($exn6[0])/100));
	$nam5=$nam6+((($exn5[0])/100));
	$nam4=$nam5+((($exn4[0])/100));
	$nam3=$nam4+((($exn3[0])/100));
	$nam2=$nam3+((($exn2[0])/100));
	$nam1=$nam2+((($exn1[0])/100));
	
	}else{
	
	$namm=$hdc-((($exn1[1]+$exn2[1]+$exn3[1]+$exn4[1]+$exn5[1]+$exn6[1]+$mxn[1])/100));
	$nam8=0;
	$nam7=$namm+((($mxn[1])/100));
	$nam6=$nam7+((($exn6[1])/100));
	$nam5=$nam6+((($exn5[1])/100));
	$nam4=$nam5+((($exn4[1])/100));
	$nam3=$nam4+((($exn3[1])/100));
	$nam2=$nam3+((($exn2[1])/100));
	$nam1=$nam2+((($exn1[1])/100));
	
		}
return array("r1"=>$nam1,"r2"=>$nam2,"r3"=>$nam3,"r4"=>$nam4,"r5"=>$nam5,"r6"=>$nam6,"r7"=>$nam7,"mm"=>$namm);

}elseif($m_level==9){
	
	
if(($big==1 and $type==1) or  ($big==2 and $type==2)  or  ($big==1 and $type==11)  or  ($big==2 and $type==12) or    $type==3 or $type==5 or $type==6 or $type==7 or $type==8 or $type==9  or $type==13 or $type==15 or $type==16 or $type==17 or $type==18 or $type==19 ){
	
	$namm=$hdc-((($exn1[0]+$exn2[0]+$exn3[0]+$exn4[0]+$exn5[0]+$exn6[0]+$exn7[0]+$mxn[0])/100));
	$nam8=$namm+((($mxn[0])/100));
	$nam7=$nam8+((($exn7[0])/100));
	$nam6=$nam7+((($exn6[0])/100));
	$nam5=$nam6+((($exn5[0])/100));
	$nam4=$nam5+((($exn4[0])/100));
	$nam3=$nam4+((($exn3[0])/100));
	$nam2=$nam3+((($exn2[0])/100));
	$nam1=$nam2+((($exn1[0])/100));
	
	}else{
	
	$namm=$hdc-((($exn1[1]+$exn2[1]+$exn3[1]+$exn4[1]+$exn5[1]+$exn6[1]+$exn7[1]+$mxn[1])/100));
	$nam8=$namm+((($mxn[1])/100));
	$nam7=$nam8+((($exn7[1])/100));
	$nam6=$nam7+((($exn6[1])/100));
	$nam5=$nam6+((($exn5[1])/100));
	$nam4=$nam5+((($exn4[1])/100));
	$nam3=$nam4+((($exn3[1])/100));
	$nam2=$nam3+((($exn2[1])/100));
	$nam1=$nam2+((($exn1[1])/100));
	
		}
return array("r1"=>$nam1,"r2"=>$nam2,"r3"=>$nam3,"r4"=>$nam4,"r5"=>$nam5,"r6"=>$nam6,"r7"=>$nam7,"r8"=>$nam8,"mm"=>$namm);



}



	
	}
	
	
function _cbn($sum ,$xx=null){
		if($sum<0){ return '<span class="cr bb">'.number_format($sum,$xx).'</span>';}
		elseif($sum==0){ return '<span class="cb">'.number_format($sum).'</span>';}
	    else{  return '<span class="cbu bb">'.number_format($sum,$xx).'</span>';}
	}
	
	function _cbnn($sum ,$xx=null){
		if($sum<0){ return '<span class="cr">'.number_format($sum,$xx).'</span>';}
		elseif($sum==0){ return '<span class="">'.number_format($sum).'</span>';}
	    else{  return '<span class="cbu">'.number_format($sum,$xx).'</span>';}
	}
		
		
	function _cg($val){
	//$fstep_p=array(1=>"เสมอ","ปป","0.5","0.5+1","1","1+1.5","1.5","1.5+2","2","2+2.5","2.5","2.5+3","3","3+3.5","3.5","3.5+4","4","ใครต่อ");
/*	if($val=="0.5"){return "½";}
    elseif($val=="0.5+1"){return "½+1";}
	 elseif($val=="1+1.5"){return "1+1½";}
	  elseif($val=="1.5"){return "1½";}
	   elseif($val=="1.5+2"){return "1½+2";}
	    elseif($val=="2+2.5"){return "2+2½";}
		 elseif($val=="2.5"){return "2½";}
		  elseif($val=="2.5+3"){return "2½+3";}
		   elseif($val=="3+3.5"){return "3+3½";}
		     elseif($val=="3.5"){return "3½";}
			   elseif($val=="3.5+4"){return "3½+4";}
			    elseif($val=="4+4.5"){return "4+4½";}
	  elseif($val=="4.5"){return "4½";}
	   elseif($val=="4.5+5"){return "4½+5";}
	    elseif($val=="5+5.5"){return "5+5½";}
	  elseif($val=="5.5"){return "5½";}
	   elseif($val=="5.5+6"){return "5½+6";}
	    elseif($val=="6+6.5"){return "6+6½";}
	  elseif($val=="6.5"){return "6½";}
	   elseif($val=="6.5+7"){return "6½+7";}
	    elseif($val=="7+7.5"){return "7+7½";}
	  elseif($val=="7.5"){return "7½";}
	   elseif($val=="7.5+8"){return "7½+8";}
	    elseif($val=="8+8.5"){return "8+8½";}
	  elseif($val=="8.5"){return "8½";}
	   elseif($val=="8.5+9"){return "8½+9";}
	    elseif($val=="9+9.5"){return "9+9½";}
	  elseif($val=="9.5"){return "9½";}
	   elseif($val=="9.5+10"){return "9½+10";}
	    elseif($val=="10+10.5"){return "10+10½";}
	else{return $val;}*/
	return $val;
	
	}	
	
if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false)
{
 #   echo'User agent is Google Chrome';
 $keyboard='9';
}else{
 $keyboard='12';
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
 
 function set($ok , $new, $hdc=null)
{
	if($hdc==1){
		if($new!=""){
			$ox=$new;
			}else{
				$ox=$ok;
			          }
		}else{
		if($new>0.00){
			$ox=$new;
			}else{
				$ox=$ok;
		  }
			}
	return $ox;
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


###########Price EU
 function peu($val)
{
	if($val!=""){
	if($val>=0.00){
       $val=1+$val;
		}else{
   $val=3+$val;
			}
			
	return round($val , 2);
	}
}


###########Price EU
 function pereu($val,$per )
{

if($val!=""){
	 $val1=3-($val+($per/100));		
	 $val2=1+$val1;
	return round($val2 , 2);
}
}


 function hapereu($p1,$p2 )
{
if($p1!=""){
	 $val1=$p1+$p2;		
	 $val2=(4-$val1)*100;
	return ($val2 );
}
}


###########1000
 function _bp($val)
{
	/*
	if($val>=0.00){
       $val=($val/100);
		}else{
     $val=$val;
			}
		*/
			
	return number_format($val );
}


 function _cg2($val, $type)
{
	if($type==1 or $type==2 or $type==3 or $type==4 or $type==11 or $type==12 or $type==13 or $type==14){
	$txt=$val;	
	}
			
	return $txt;
}

 function _cg3($val)
{

	return $val;
}

 function _share($level , $arshare1 ,$arshare2 , $arshare3 , $arshare4, $arshare5, $arshare6, $arshare7, $arshare8, $m_share)
{
	
$share1=$arshare1-$arshare2;
$share2=$arshare2-$arshare3;
$share3=$arshare3-$arshare4;
$share4=$arshare4-$arshare5;
$share5=$arshare5-$arshare6;
$share6=$arshare6-$arshare7;
$share7=$arshare7-$arshare8;
$share8=$m_share;


	if($level==2){
		return array("sm"=>$m_share);
	}elseif($level==3){
		return array("s1"=>$share1,"sm"=>$m_share);
			}elseif($level==4){
	return array("s1"=>$share1,"s2"=>$share2,"sm"=>$m_share);
			}elseif($level==5){
	return array("s1"=>$share1,"s2"=>$share2,"s3"=>$share3,"sm"=>$m_share);
			}elseif($level==6){
		return array("s1"=>$share1,"s2"=>$share2,"s3"=>$share3,"s4"=>$share4,"sm"=>$m_share);
			}elseif($level==7){
		return array("s1"=>$share1,"s2"=>$share2,"s3"=>$share3,"s4"=>$share4,"s5"=>$share5,"sm"=>$m_share);
			}elseif($level==8){
		return array("s1"=>$share1,"s2"=>$share2,"s3"=>$share3,"s4"=>$share4,"s5"=>$share5,"s6"=>$share6,"sm"=>$m_share);
			}elseif($level==9){
	return array("s1"=>$share1,"s2"=>$share2,"s3"=>$share3,"s4"=>$share4,"s5"=>$share5,"s6"=>$share6,"s7"=>$share7,"sm"=>$m_share);
		
		}


}



 function _share2($level  ,$arshare2 , $arshare3 , $arshare4, $arshare5, $arshare6, $arshare7, $arshare8, $m_share, $harshare1, $harshare2, $harshare3, $harshare4, $harshare5, $harshare6, $harshare7, $harshare8)
{
	
$share1=$arshare2;
$share2=$arshare3;
$share3=$arshare4;
$share4=$arshare5;
$share5=$arshare6;
$share6=$arshare7;
$share7=$arshare8;
$share8=$m_share;

#$share2=10;

#$m_share=10;


#echo"$arshare2 , $arshare3 , $arshare4, $arshare5, $arshare6, $arshare7, $arshare8, $m_share, $harshare1, $harshare2, $harshare3, $harshare4, $harshare5, $harshare6, $harshare7, $harshare8";

if($level==2){
		return array("sm"=>$m_share);
		
}elseif($level==3){
		
if($arshare2==0){
	$share1=0;
}elseif($harshare2 > ($m_share) ){
	$add1=$harshare2 - ($m_share);
	$share1=$share1+$add1;
}
	
		return array("s1"=>$share1,"sm"=>$m_share);
	}elseif($level==4){
				
if($arshare3==0){
	$share2=0;
}elseif( $harshare3>$m_share ){
	$add2=$harshare3- ($m_share);
	$share2=$share2+$add2;
}
		
if($arshare2==0){
	$share1=0;
}elseif($harshare2 > ($share2+$m_share) ){
	$add1=$harshare2 - ($share2+$m_share);
	$share1=$share1+$add1;
}


#,"web1"=>$harshare1,"web2"=>$harshare2,"web3"=>$harshare3 ,"add1"=>$add1,"add2"=>$add2				
	return array("s1"=>$share1,"s2"=>$share2,"sm"=>$m_share);
			}elseif($level==5){
				
				
if($arshare4==0){
	$share3=0;
}elseif( $harshare4>  ($m_share) ){
	$add3=$harshare4-($m_share);
	$share3=$share3+$add3;
}
				
if($arshare3==0){
	$share2=0;
}elseif( $harshare3>  ($share3+$m_share) ){
	$add2=$harshare3-($share3+$m_share);
	$share2=$share2+$add2;
}
		
if($arshare2==0){
	$share1=0;
}else	if($harshare2 > ($share2+$share3+$m_share) ){
	$add1=$harshare2 - ($share2+$share3+$m_share);
	$share1=$share1+$add1;
}
				
				
	return array("s1"=>$share1,"s2"=>$share2,"s3"=>$share3,"sm"=>$m_share);
			}elseif($level==6){
				

if($arshare5==0){
	$share4=0;
}elseif( $harshare5>  ($m_share) ){
	$add4=$harshare5-($m_share);
	$share4=$share4+$add4;
}
				
if($arshare4==0){
	$share3=0;
}elseif( $harshare4>  ($share4+$m_share) ){
	$add3=$harshare4-($share4+$m_share);
	$share3=$share3+$add3;
}
				
if($arshare3==0){
	$share2=0;
}elseif( $harshare3>  ($share3+$share4+$m_share) ){
	$add2=$harshare3-($share3+$share4+$m_share);
	$share2=$share2+$add2;
}
		
if($arshare2==0){
	$share1=0;
}else	if($harshare2 > ($share2+$share3+$share4+$m_share) ){
	$add1=$harshare2 - ($share2+$share3+$share4+$m_share);
	$share1=$share1+$add1;
}
				
		return array("s1"=>$share1,"s2"=>$share2,"s3"=>$share3,"s4"=>$share4,"sm"=>$m_share);
			}elseif($level==7){
				

if($arshare6==0){
	$share5=0;
}elseif( $harshare6>  ($m_share) ){
	$add5=$harshare6-($m_share);
	$share5=$share5+$add5;
}

if($arshare5==0){
	$share4=0;
}elseif( $harshare5>  ($share5+$m_share) ){
	$add4=$harshare5-($share5+$m_share);
	$share4=$share4+$add4;
}
			
if($arshare4==0){
	$share3=0;
}elseif( $harshare4>  ($share4+$share5+$m_share) ){
	$add3=$harshare4-($share4+$share5+$m_share);
	$share3=$share3+$add3;
}
				
if($arshare3==0){
	$share2=0;
}else	if( $harshare3>  ($share3+$share4+$share5+$m_share) ){
	$add2=$harshare3-($share3+$share4+$share5+$m_share);
	$share2=$share2+$add2;
}
		
if($arshare2==0){
	$share1=0;
}elseif($harshare2 > ($share2+$share3+$share4+$share5+$m_share) ){
	$add1=$harshare2 - ($share2+$share3+$share4+$share5+$m_share);
	$share1=$share1+$add1;
}

		return array("s1"=>$share1,"s2"=>$share2,"s3"=>$share3,"s4"=>$share4,"s5"=>$share5,"sm"=>$m_share);
			}elseif($level==8){
				
if($arshare7==0){
	$share6=0;
}elseif( $harshare7>  ($m_share) ){
	$add6=$harshare7-($m_share);
	$share6=$share6+$add6;
}

if($arshare6==0){
	$share5=0;
}elseif( $harshare6>  ($share6+$m_share) ){
	$add5=$harshare6-($share6+$m_share);
	$share5=$share5+$add5;
}

if($arshare5==0){
	$share4=0;
}elseif( $harshare5>  ($share5+$share6+$m_share) ){
	$add4=$harshare5-($share5+$share6+$m_share);
	$share4=$share4+$add4;
}
				
if($arshare4==0){
	$share3=0;
}elseif( $harshare4>  ($share4+$share5+$share6+$m_share) ){
	$add3=$harshare4-($share4+$share5+$share6+$m_share);
	$share3=$share3+$add3;
}
				
if($arshare3==0){
	$share2=0;
}elseif( $harshare3>  ($share3+$share4+$share5+$share6+$m_share) ){
	$add2=$harshare3-($share3+$share4+$share5+$share6+$m_share);
	$share2=$share2+$add2;
}
		
if($arshare2==0){
	$share1=0;
}elseif($harshare2 > ($share2+$share3+$share4+$share5+$share6+$m_share) ){
	$add1=$harshare2 - ($share2+$share3+$share4+$share5+$share6+$m_share);
	$share1=$share1+$add1;
}
				
		return array("s1"=>$share1,"s2"=>$share2,"s3"=>$share3,"s4"=>$share4,"s5"=>$share5,"s6"=>$share6,"sm"=>$m_share);
			}elseif($level==9){
				
if($arshare8==0){
	$share7=0;
}elseif( $harshare8>  ($m_share) ){
	$add7=$harshare8-($m_share);
	$share7=$share7+$add7;
}
				
if($arshare7==0){
	$share6=0;
}elseif( $harshare7>  ($share7+$m_share) ){
	$add6=$harshare7-($share7+$m_share);
	$share6=$share6+$add6;
}
if($arshare6==0){
	$share5=0;
}elseif( $harshare6>  ($share6+$share7+$m_share) ){
	$add5=$harshare6-($share6+$share7+$m_share);
	$share5=$share5+$add5;
}

if($arshare5==0){
	$share4=0;
}elseif( $harshare5>  ($share5+$share6+$share7+$m_share) ){
	$add4=$harshare5-($share5+$share6+$share7+$m_share);
	$share4=$share4+$add4;
}
			
if($arshare4==0){
	$share3=0;
}elseif( $harshare4>  ($share4+$share5+$share6+$share7+$m_share) ){
	$add3=$harshare4-($share4+$share5+$share6+$share7+$m_share);
	$share3=$share3+$add3;
}
				
if($arshare3==0){
	$share2=0;
}elseif( $harshare3>  ($share3+$share4+$share5+$share6+$share7+$m_share) ){
	$add2=$harshare3-($share3+$share4+$share5+$share6+$share7+$m_share);
	$share2=$share2+$add2;
}
		
if($arshare2==0){
	$share1=0;
}elseif($harshare2 > ($share2+$share3+$share4+$share5+$share6+$share7+$m_share) ){
	$add1=$harshare2 - ($share2+$share3+$share4+$share5+$share6+$share7+$m_share);
	$share1=$share1+$add1;
}
				
	return array("s1"=>$share1,"s2"=>$share2,"s3"=>$share3,"s4"=>$share4,"s5"=>$share5,"s6"=>$share6,"s7"=>$share7,"sm"=>$m_share);
		
		}


}











 function _share3($level   , $myshare2 , $myshare3 , $myshare4, $myshare5, $myshare6, $myshare7, $myshare8, $m_share , $r_share1, $r_share2, $r_share3, $r_share4, $r_share5, $r_share6, $r_share7, $r_share8 ){
	 
$share1=$myshare2;
$share2=$myshare3;
$share3=$myshare4;
$share4=$myshare5;
$share5=$myshare6;
$share6=$myshare7;
$share7=$myshare8;
$share8=$m_share;
	
if($level==2){
		return array("sm"=>$m_share);
	#echo"$arshare2 , $arshare3 , $arshare4, $arshare5, $arshare6, $arshare7, $arshare8, $m_share, $harshare1, $harshare2, $harshare3, $harshare4, $harshare5, $harshare6, $harshare7, $harshare8";
	
}elseif($level==3){
#################
if($myshare2==0){
	$share1=0;
}elseif($r_share2 > ($myshare2+$m_share) ){
	$add1=$r_share2 - ($myshare2+$m_share);
	$share1=$share1+$add1;
}
	
		return array("s1"=>$share1,"sm"=>$m_share);
#################
	}elseif($level==4){
		
#################		
if($myshare3==0){
	$share2=0;
}elseif( $r_share3>($myshare3+$myshare2+$m_share) ){
	$add2=$r_share3- ($myshare3+$myshare2+$m_share);
	$share2=$share2+$add2;
}
		
if($myshare2==0){
	$share1=0;
}elseif($r_share2 > ($share2+$m_share) ){
	$add1=$r_share2 - ($share2+$m_share);
	$share1=$share1+$add1;
}

	return array("s1"=>$share1,"s2"=>$share2,"sm"=>$m_share);
#################
}elseif($level==5){
#################				

if($myshare4==0){
	$share3=0;
}elseif($myshare4>0){
	$share3=$myshare4;
}elseif( $r_share4>($myshare4+$myshare3+$myshare2+$m_share) ){
	$add3=$r_share4 - ($myshare4+$myshare3+$myshare2+$m_share);
	$share3=$add3;
}else{
	$share3=0;
	}
	
if($myshare3==0){
	$share2=0;
}elseif( $r_share3>($myshare3+$myshare2+$m_share) ){
	$add2 = $r_share3 - ($myshare3+$myshare2+$m_share);
	$share2=$add2;
}else{
	$share2=0;
	}

		
if($myshare2==0){
	$share1=0;
}elseif($r_share2 > ($share2+$m_share) ){
	$add1=$r_share2 - ($share2+$m_share);
	$share1=$add1;
}else{
	$share1=0;
	}
				
	return array("s1"=>$share1,"s2"=>$share2,"s3"=>$share3,"sm"=>$m_share);
#################
			}elseif($level==6){
				
#################
if($myshare5==0){
	$share4=0;
}elseif( $harshare5>  ($m_share) ){
	$add4=$harshare5-($m_share);
	$share4=$share4+$add4;
}
				
if($myshare4==0){
	$share3=0;
}elseif( $harshare4>  ($share4+$m_share) ){
	$add3=$harshare4-($share4+$m_share);
	$share3=$share3+$add3;
}
				
if($myshare3==0){
	$share2=0;
}elseif( $harshare3>  ($share3+$share4+$m_share) ){
	$add2=$harshare3-($share3+$share4+$m_share);
	$share2=$share2+$add2;
}
		
if($myshare2==0){
	$share1=0;
}else	if($harshare2 > ($share2+$share3+$share4+$m_share) ){
	$add1=$harshare2 - ($share2+$share3+$share4+$m_share);
	$share1=$share1+$add1;
}
				
		return array("s1"=>$share1,"s2"=>$share2,"s3"=>$share3,"s4"=>$share4,"sm"=>$m_share);
#################
			}elseif($level==7){
				
#################
if($myshare6==0){
	$share5=0;
}elseif( $harshare6>  ($m_share) ){
	$add5=$harshare6-($m_share);
	$share5=$share5+$add5;
}

if($myshare5==0){
	$share4=0;
}elseif( $harshare5>  ($share5+$m_share) ){
	$add4=$harshare5-($share5+$m_share);
	$share4=$share4+$add4;
}
			
if($myshare4==0){
	$share3=0;
}elseif( $harshare4>  ($share4+$share5+$m_share) ){
	$add3=$harshare4-($share4+$share5+$m_share);
	$share3=$share3+$add3;
}
				
if($myshare3==0){
	$share2=0;
}else	if( $harshare3>  ($share3+$share4+$share5+$m_share) ){
	$add2=$harshare3-($share3+$share4+$share5+$m_share);
	$share2=$share2+$add2;
}
		
if($myshare2==0){
	$share1=0;
}elseif($harshare2 > ($share2+$share3+$share4+$share5+$m_share) ){
	$add1=$harshare2 - ($share2+$share3+$share4+$share5+$m_share);
	$share1=$share1+$add1;
}

		return array("s1"=>$share1,"s2"=>$share2,"s3"=>$share3,"s4"=>$share4,"s5"=>$share5,"sm"=>$m_share);
#################
			}elseif($level==8){
	#################			
if($myshare7==0){
	$share6=0;
}elseif( $harshare7>  ($m_share) ){
	$add6=$harshare7-($m_share);
	$share6=$share6+$add6;
}

if($myshare6==0){
	$share5=0;
}elseif( $harshare6>  ($share6+$m_share) ){
	$add5=$harshare6-($share6+$m_share);
	$share5=$share5+$add5;
}

if($myshare5==0){
	$share4=0;
}elseif( $harshare5>  ($share5+$share6+$m_share) ){
	$add4=$harshare5-($share5+$share6+$m_share);
	$share4=$share4+$add4;
}
				
if($myshare4==0){
	$share3=0;
}elseif( $harshare4>  ($share4+$share5+$share6+$m_share) ){
	$add3=$harshare4-($share4+$share5+$share6+$m_share);
	$share3=$share3+$add3;
}
				
if($myshare3==0){
	$share2=0;
}elseif( $harshare3>  ($share3+$share4+$share5+$share6+$m_share) ){
	$add2=$harshare3-($share3+$share4+$share5+$share6+$m_share);
	$share2=$share2+$add2;
}
		
if($myshare2==0){
	$share1=0;
}elseif($harshare2 > ($share2+$share3+$share4+$share5+$share6+$m_share) ){
	$add1=$harshare2 - ($share2+$share3+$share4+$share5+$share6+$m_share);
	$share1=$share1+$add1;
}
				
		return array("s1"=>$share1,"s2"=>$share2,"s3"=>$share3,"s4"=>$share4,"s5"=>$share5,"s6"=>$share6,"sm"=>$m_share);
#################
			}elseif($level==9){
#################				
if($myshare8==0){
	$share7=0;
}elseif( $harshare8>  ($m_share) ){
	$add7=$harshare8-($m_share);
	$share7=$share7+$add7;
}
				
if($myshare7==0){
	$share6=0;
}elseif( $harshare7>  ($share7+$m_share) ){
	$add6=$harshare7-($share7+$m_share);
	$share6=$share6+$add6;
}
if($myshare6==0){
	$share5=0;
}elseif( $harshare6>  ($share6+$share7+$m_share) ){
	$add5=$harshare6-($share6+$share7+$m_share);
	$share5=$share5+$add5;
}

if($myshare5==0){
	$share4=0;
}elseif( $harshare5>  ($share5+$share6+$share7+$m_share) ){
	$add4=$harshare5-($share5+$share6+$share7+$m_share);
	$share4=$share4+$add4;
}
			
if($myshare4==0){
	$share3=0;
}elseif( $harshare4>  ($share4+$share5+$share6+$share7+$m_share) ){
	$add3=$harshare4-($share4+$share5+$share6+$share7+$m_share);
	$share3=$share3+$add3;
}
				
if($myshare3==0){
	$share2=0;
}elseif( $harshare3>  ($share3+$share4+$share5+$share6+$share7+$m_share) ){
	$add2=$harshare3-($share3+$share4+$share5+$share6+$share7+$m_share);
	$share2=$share2+$add2;
}
		
if($myshare2==0){
	$share1=0;
}elseif($harshare2 > ($share2+$share3+$share4+$share5+$share6+$share7+$m_share) ){
	$add1=$harshare2 - ($share2+$share3+$share4+$share5+$share6+$share7+$m_share);
	$share1=$share1+$add1;
}
				
	return array("s1"=>$share1,"s2"=>$share2,"s3"=>$share3,"s4"=>$share4,"s5"=>$share5,"s6"=>$share6,"s7"=>$share7,"sm"=>$m_share);
#################
		}


}



	
 function _mtr($level , $val ,$type ,$big,$tnam)
{
	$n1=$tnam[0];
	$n2=$tnam[1];
	$n3=$tnam[2];
	$n4=$tnam[3];
	$n5=$tnam[4];
	$n6=$tnam[5];
	$n7=$tnam[6];
	$nm=$tnam[7];
	
	
$exn1=@explode(",",$n1);
$exn2=@explode(",",$n2);
$exn3=@explode(",",$n3);
$exn4=@explode(",",$n4);
$exn5=@explode(",",$n5);
$exn6=@explode(",",$n6);
$exn7=@explode(",",$n7);
#$exn8=@explode(",",$arnam8);
$mxn=@explode(",",$nm);

	
#$ex=@explode(',',$nam);
if(($big==1 and $type==1) or  ($big==2 and $type==2)  or  ($big==1 and $type==11)  or  ($big==2 and $type==12) or    $type==3 or $type==5 or $type==6 or $type==7 or $type==8 or $type==9  or $type==13 or $type==15 or $type==16 or $type==17 or $type==18 or $type==19 ){
	
	if($level==2){
		$val2=$val-($mxn[0]/100);
	}elseif($level==3){
		$val2=$val-(($mxn[0]+$exn1[0])/100);
			}elseif($level==4){
		$val2=$val-(($mxn[0]+$exn1[0]+$exn2[0])/100);
			}elseif($level==5){
		$val2=$val-(($mxn[0]+$exn1[0]+$exn2[0]+$exn3[0])/100);
			}elseif($level==6){
		$val2=$val-(($mxn[0]+$exn1[0]+$exn2[0]+$exn3[0]+$exn4[0])/100);
			}elseif($level==7){
		$val2=$val-(($mxn[0]+$exn1[0]+$exn2[0]+$exn3[0]+$exn4[0]+$exn5[0])/100);
			}elseif($level==8){
		$val2=$val-(($mxn[0]+$exn1[0]+$exn2[0]+$exn3[0]+$exn4[0]+$exn5[0]+$exn6[0])/100);
			}elseif($level==9){
		$val2=$val-(($mxn[0]+$exn1[0]+$exn2[0]+$exn3[0]+$exn4[0]+$exn5[0]+$exn6[0]+$exn7[0])/100);
		
		}

	}else{


	if($level==2){
		$val2=$val-($mxn[1]/100);
	}elseif($level==3){
		$val2=$val-(($mxn[1]+$exn1[1])/100);
			}elseif($level==4){
		$val2=$val-(($mxn[1]+$exn1[1]+$exn2[1])/100);
			}elseif($level==5){
		$val2=$val-(($mxn[1]+$exn1[1]+$exn2[1]+$exn3[1])/100);
			}elseif($level==6){
		$val2=$val-(($mxn[1]+$exn1[1]+$exn2[1]+$exn3[1]+$exn4[1])/100);
			}elseif($level==7){
		$val2=$val-(($mxn[1]+$exn1[1]+$exn2[1]+$exn3[1]+$exn4[1]+$exn5[1])/100);
			}elseif($level==8){
		$val2=$val-(($mxn[1]+$exn1[1]+$exn2[1]+$exn3[1]+$exn4[1]+$exn5[1]+$exn6[1])/100);
			}elseif($level==9){
		$val2=$val-(($mxn[1]+$exn1[1]+$exn2[1]+$exn3[1]+$exn4[1]+$exn5[1]+$exn6[1]+$exn7[1])/100);
		
		}

		
	}

	return _no0($val2);
}



function nlog($val){
	if($val>0){
	$val2=number_format($val,2);	
	}
	return $val2;
	}
	
	
	  function _hdc20($hdc1 , $hdc2 ){
 
        if($hdc1>0.00 and $hdc2>0.00){
     
 
     if($hdc1>=1.90 and $hdc2>=1.90){ $h1=1.90;  $h2=1.90;  }
        # elseif($hdc1>2.75){ $h1=2.72;  $h2=1.11;    }
		  elseif($hdc1>2.75){ $h1=0;  $h2=0;    }
        # elseif($hdc1>=2.70){ $h1=2.70;  $h2=1.10;   }
		 elseif($hdc1>=2.70){ $h1=0;  $h2=0;   }
         elseif($hdc1>2.65){ $h1=2.62;  $h2=1.21;    }
         elseif($hdc1>=2.60){ $h1=2.60;  $h2=1.20;   }
         elseif($hdc1>2.55){ $h1=2.52;  $h2=1.31;    }
         elseif($hdc1>=2.50){ $h1=2.50;  $h2=1.30;   }
         elseif($hdc1>2.45){ $h1=2.42;  $h2=1.41;    }
         elseif($hdc1>=2.40){ $h1=2.40;  $h2=1.40;   }
         elseif($hdc1>2.35){ $h1=2.32;  $h2=1.51;    }
         elseif($hdc1>=2.30){ $h1=2.30;  $h2=1.50;   }
         elseif($hdc1>2.25){ $h1=2.21;  $h2=1.62;    }
         elseif($hdc1>=2.20){ $h1=2.20;  $h2=1.60;   }
         elseif($hdc1>2.15){ $h1=2.11;  $h2=1.72;    }
         elseif($hdc1>=2.10){ $h1=2.10;  $h2=1.70;   }
         elseif($hdc1>2.05){ $h1=2.00;  $h2=1.80;    }
         elseif($hdc1>=2.00){ $h1=1.90;  $h2=1.90;   }
      
      
     elseif($hdc1>1.99){ $h1=2.00;  $h2=1.80;   }
     elseif($hdc1>1.95){ $h1=2.00;  $h2=1.80;    }
     elseif($hdc1>=1.90){ $h1=1.90;  $h2=1.90;   }
      elseif($hdc1>1.85){ $h1=1.80;  $h2=2.00; }
      elseif($hdc1>=1.80){ $h1=1.80;  $h2=2.00;  }
      elseif($hdc1>1.75){ $h1=1.72;  $h2=2.11;  }
      elseif($hdc1>=1.70){ $h1=1.70;  $h2=2.10;    }
      elseif($hdc1>1.65){ $h1=1.62;  $h2=2.21;  }
      elseif($hdc1>=1.60){ $h1=1.60;  $h2=2.20;    }
      elseif($hdc1>1.55){ $h1=1.52;  $h2=2.31;  }
      elseif($hdc1>=1.50){ $h1=1.50;  $h2=2.30;    }
      elseif($hdc1>1.45){ $h1=1.42;  $h2=2.41;  }
      elseif($hdc1>=1.40){ $h1=1.40;  $h2=2.40;    }
      elseif($hdc1>1.35){ $h1=1.32;  $h2=2.51;  }
      elseif($hdc1>=1.30){ $h1=1.30;  $h2=2.50;    }
      elseif($hdc1>1.25){ $h1=1.22;  $h2=2.61;  }
      elseif($hdc1>=1.20){ $h1=1.20;  $h2=2.60;    }
     # elseif($hdc1>1.15){ $h1=1.12;  $h2=2.71;  }
	   elseif($hdc1>1.15){ $h1=0;  $h2=0;  }
     # elseif($hdc1>=1.10){ $h1=1.10;  $h2=2.70;    }
	    elseif($hdc1>=1.10){ $h1=0;  $h2=0;    }
       
      else{$h1='';  $h2='';  $pp=0; }
         
         
    }
 
 
     
    return array("hdc1"=>$h1, "hdc2"=>$h2 );
    }
	
	
	
	function slug($str){
$txt = trim(str_replace(array("'", "\"", "&quot;"), "", htmlspecialchars($str)));
return $txt;
}


			  function _paydis($bet , $pay ){
			  if($pay>0){
				 return  number_format($bet -$pay);
				  }else{
					return 0;  
				}
			  
		  }
		  
		  
	function smuay($str){
$txt = trim(str_replace(array("R 1", "R 2", "R 3", "R 4", "R 5", "!S.1", "!S.2", "!S.3", "!S.4", "!S.5"), array('ยก1','ยก2','ยก3','ยก4','ยก5','!ยก1','!ยก2','!ยก3','!ยก4','!ยก5'), htmlspecialchars($str)));
return $txt;
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
function json_decode2($mm_js, $true){
$jscc =json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $mm_js), $true );
return $jscc;
}
?>