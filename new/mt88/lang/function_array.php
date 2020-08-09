<? 	

$casino_status_color = array( 1 => "bet_win",3 => "bet_draw", 4 => "bet_lose" );
// $casino_status = array( 1 => "เพลเยอร์",3 => "เสมอ", 4 => "แบงค์เกอร์" );
$casino_status = array( 1 => $lang_ag[1703],3 => $lang_ag[1749], 4 => $lang_ag[2371] );


$lot_zone_bet= array(1 =>1,2 =>4,3 =>1 ,4=>1,5=>1,6=>2,7=>2,8=>1,9=>1,10=>1,11=>1,12=>1,13=>1,14=>1,15=>1,16=>2,17=>1,18=>96,19=>11
,20=>1,21=>1,22=>1,23=>1,24=>1,25=>1,26=>1,27=>1,28=>1,29=>1,30=>1,31=>1,32=>1,33=>1,34=>1,35=>1); 
/*
$lot_zone[$sx_file]= array(1 =>"หวยไทย",2 =>"หวยหุ้นไทย",3 =>"หวยลาว" ,4=>"หวยมาเลเซีย",5=>"หวยเวียดนาม",6=>"หุ้นนิเคอิ",7=>"หุ้นฮั่งเส็ง",8=>"หุ้นดาวโจนส์",9=>"หุ้นสิงคโปร์",10=>"หุ้นอียิปต์",11=>"หุ้นรัสเซีย",12=>"หุ้นเยอรมัน",13=>"หุ้นอังกฤษ",14=>"หุ้นเกาหลี",15=>"หุ้นใต้หวัน",16=>"หุ้นจีน",17=>"หุ้นอินเดีย",18=>"จับยี่กี",19=>"หวยรายวัน"); 
*/
$lot_zone[$sx_file]["zone"]= array(1 =>$lang_member[568],2 =>$lang_member[1093],3 =>$lang_member[1094] ,4=>$lang_member[1096],5=>$lang_member[1097],6=>$lang_member[1098],7=>$lang_member[1099],8=>$lang_member[1101],9=>$lang_member[1102],10=>$lang_member[1104],11=>$lang_member[1105],12=>$lang_member[1106],13=>$lang_member[1108],14=>$lang_member[1109],15=>$lang_member[1369],16=>$lang_member[1111],17=>$lang_member[1112],18=>$lang_member[686],19=>$lang_member[683]); 

##################หวยหุ้นไทย
$lot_type[$sx_file][1]= array(1 =>$lang_member[1337], 2 =>$lang_member[451], 3 =>$lang_member[1338], 4 =>$lang_member[1339], 5 =>$lang_member[1340], 6 =>$lang_member[399], 7 =>$lang_member[401]
, 8 =>$lang_member[1341] , 9 =>$lang_member[1342], 10 =>$lang_member[1343], 11 =>$lang_member[1344], 12 =>$lang_member[453]."-".$lang_member[459], 13 =>$lang_member[1370], 14 =>$lang_member[1346], 15 =>$lang_member[1348], 16 =>$lang_member[1349], 17 =>$lang_member[1350], 18 =>$lang_member[1351], 19 =>$lang_member[1352], 20 =>$lang_member[1353], 21 =>$lang_member[1354], 22 =>$lang_member[1355], 23 =>$lang_member[1356]
 );


##################หุ้นไทย
$lot_type[$sx_file][2]= array(1 =>$lang_member[1337], 3 =>$lang_member[1338],4 =>$lang_member[1339], 5 =>$lang_member[1340], 6 =>$lang_member[399], 7 =>$lang_member[401]
, 21 =>$lang_member[1354], 22 =>$lang_member[1355], 23 =>$lang_member[1356]
 );
 
##################หวยลาว
$lot_type[$sx_file][3]= array(1 =>$lang_member[1337], 3 =>$lang_member[1338], 4 =>$lang_member[1339], 5 =>$lang_member[1340], 6 =>$lang_member[399], 7 =>$lang_member[401]
, 21 =>$lang_member[1354], 22 =>$lang_member[1355], 23 =>$lang_member[1356]
,25 =>$lang_member[1382], 26 =>$lang_member[1383], 31 =>$lang_member[640]
#
);



##################หวยมาเลเซีย
$lot_type[$sx_file][4]= array(1 =>$lang_member[1337], 3 =>$lang_member[1338], 4 =>$lang_member[1339], 5 =>$lang_member[1340], 6 =>$lang_member[399], 7 =>$lang_member[401]
, 21 =>$lang_member[1354], 22 =>$lang_member[1355], 23 =>$lang_member[1356]
,25 =>$lang_member[1382], 26 =>$lang_member[1383], 27 =>$lang_member[640]
);


############5######หวยเวียดนาม
$lot_type[$sx_file][5]= array(1 =>$lang_member[1337], 3 =>$lang_member[1338], 4 =>$lang_member[1339], 5 =>$lang_member[1340], 6 =>$lang_member[399], 7 =>$lang_member[401]
, 21 =>$lang_member[1354], 22 =>$lang_member[1355], 23 =>$lang_member[1356]
);
############6######หุ้นนิเคอิ
$lot_type[$sx_file][6]= array(1 =>$lang_member[1337], 3 =>$lang_member[1338], 4 =>$lang_member[1339], 5 =>$lang_member[1340], 6 =>$lang_member[399], 7 =>$lang_member[401]
, 21 =>$lang_member[1354], 22 =>$lang_member[1355], 23 =>$lang_member[1356]
);
############7######หุ้นฮั่งเส็ง
$lot_type[$sx_file][7]= array(1 =>$lang_member[1337], 3 =>$lang_member[1338], 4 =>$lang_member[1339], 5 =>$lang_member[1340], 6 =>$lang_member[399], 7 =>$lang_member[401]
, 21 =>$lang_member[1354], 22 =>$lang_member[1355], 23 =>$lang_member[1356]
);
############8######หุ้นดาวโจนส์
$lot_type[$sx_file][8]= array(1 =>$lang_member[1337], 3 =>$lang_member[1338], 4 =>$lang_member[1339], 5 =>$lang_member[1340], 6 =>$lang_member[399], 7 =>$lang_member[401]
, 21 =>$lang_member[1354], 22 =>$lang_member[1355], 23 =>$lang_member[1356]
);

############9######หุ้นสิงคโปร์
$lot_type[$sx_file][9]= array(1 =>$lang_member[1337], 3 =>$lang_member[1338], 4 =>$lang_member[1339], 5 =>$lang_member[1340], 6 =>$lang_member[399], 7 =>$lang_member[401]
, 21 =>$lang_member[1354], 22 =>$lang_member[1355], 23 =>$lang_member[1356]
);

############10######หุ้นอียิปต์
$lot_type[$sx_file][10]= array(1 =>$lang_member[1337], 3 =>$lang_member[1338], 4 =>$lang_member[1339], 5 =>$lang_member[1340], 6 =>$lang_member[399], 7 =>$lang_member[401]
, 21 =>$lang_member[1354], 22 =>$lang_member[1355], 23 =>$lang_member[1356]
);

############11######หุ้นรัสเซีย
$lot_type[$sx_file][11]= array(1 =>$lang_member[1337], 3 =>$lang_member[1338], 4 =>$lang_member[1339], 5 =>$lang_member[1340], 6 =>$lang_member[399], 7 =>$lang_member[401]
, 21 =>$lang_member[1354], 22 =>$lang_member[1355], 23 =>$lang_member[1356]
);

############12######หุ้นเยอรมัน
$lot_type[$sx_file][12]= array(1 =>$lang_member[1337], 3 =>$lang_member[1338], 4 =>$lang_member[1339], 5 =>$lang_member[1340], 6 =>$lang_member[399], 7 =>$lang_member[401]
, 21 =>$lang_member[1354], 22 =>$lang_member[1355], 23 =>$lang_member[1356]
);

############13######หุ้นอังกฤษ
$lot_type[$sx_file][13]= array(1 =>$lang_member[1337], 3 =>$lang_member[1338], 4 =>$lang_member[1339], 5 =>$lang_member[1340], 6 =>$lang_member[399], 7 =>$lang_member[401]
, 21 =>$lang_member[1354], 22 =>$lang_member[1355], 23 =>$lang_member[1356]
);

############14######หุ้นเกาหลี
$lot_type[$sx_file][14]= array(1 =>$lang_member[1337], 3 =>$lang_member[1338], 4 =>$lang_member[1339], 5 =>$lang_member[1340], 6 =>$lang_member[399], 7 =>$lang_member[401]
, 21 =>$lang_member[1354], 22 =>$lang_member[1355], 23 =>$lang_member[1356]
);

############15######หุ้นใต้หวัน
$lot_type[$sx_file][15]= array(1 =>$lang_member[1337], 3 =>$lang_member[1338], 4 =>$lang_member[1339], 5 =>$lang_member[1340], 6 =>$lang_member[399], 7 =>$lang_member[401]
, 21 =>$lang_member[1354], 22 =>$lang_member[1355], 23 =>$lang_member[1356]
);

############16######หุ้นจีน
$lot_type[$sx_file][16]= array(1 =>$lang_member[1337], 3 =>$lang_member[1338], 4 =>$lang_member[1339], 5 =>$lang_member[1340], 6 =>$lang_member[399], 7 =>$lang_member[401]
, 21 =>$lang_member[1354], 22 =>$lang_member[1355], 23 =>$lang_member[1356]
);

############17######หุ้นอินเดีย
$lot_type[$sx_file][17]= array(1 =>$lang_member[1337], 3 =>$lang_member[1338], 4 =>$lang_member[1339], 5 =>$lang_member[1340], 6 =>$lang_member[399], 7 =>$lang_member[401]
, 21 =>$lang_member[1354], 22 =>$lang_member[1355], 23 =>$lang_member[1356]
);

############18######จับยี่กี
$lot_type[$sx_file][18]= array( 1 =>$lang_member[1337], 3 =>$lang_member[1338], 4 =>$lang_member[1339], 5 =>$lang_member[1340], 6 =>$lang_member[399], 7 =>$lang_member[401]
, 21 =>$lang_member[1354], 22 =>$lang_member[1355], 23 =>$lang_member[1356]
);

############19######หวยรายวัน
$lot_type[$sx_file][19]= array(1 =>$lang_member[1337], 3 =>$lang_member[1338], 4 =>$lang_member[1339], 6 =>$lang_member[399]
, 21 =>$lang_member[1354], 22 =>$lang_member[1355], 23 =>$lang_member[1356]
);

##########################Function

function _cvf2($strDate, $mode , $lg="th"){

	$month_key = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"); 

	global $lang_months, $lang_months_short;

	$month_full = $lang_months;
	$month_short = $lang_months_short;
	
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
	

?>