<?
 header ("Expires: Mon, 26 Jul 2012 05:00:00 GMT"); // Date in the past
  header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
  //always modified
  header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header ("Pragma: no-cache"); // HTTP/1.0
  header("content-type: application/x-javascript; charset=utf-8");
  
//echo 'TH: '.date("d/m/Y, H:i:s");
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

echo _cvf(time(),4).date(":s");
?>