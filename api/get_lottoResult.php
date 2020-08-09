<?
require('../inc/conn.php');
// require('w1/inc/function.php');

//Detect special conditions devices
$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
$webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");

//do something with this information
if( $iPod || $iPhone ){
    //browser reported as an iPhone/iPod touch -- do something here
  $_GET[AGENT]=1;
}else if($iPad){
    //browser reported as an iPad -- do something here
  $_GET[AGENT]=1;
}else if($Android){
    //browser reported as an Android device -- do something here
  $_GET[AGENT]=2;
}else if($webOS){
    //browser reported as a webOS device -- do something here
  $_GET[AGENT]=3;
}else{
  // ไม่มี
  $_GET[AGENT]=3;
}
  
if($_GET[AGENT]==3){
 // exit();
    #echo'<center><h1>กรุณาเข้าผ่านมือถือ</h1></center>';
}

if($_GET["hidSelLang"]==""){
    if($_COOKIE["lang"]==""){
        $lang = "th";
    }else{
        $lang = $_COOKIE["lang"];
    }
}else{
    $lang = $_GET["hidSelLang"];
}
setcookie('lang', $lang);

$langList = array(
    "en" => "English",
    "th" => "ภาษาไทย",
    "la" => "ພາສາລາວ"
);
$_GET["hidSelLang"]=$langList[$lang];
$_SESSION['lang'] = $lang;
require("/home/ohoking/domains/wan1991.com/public_html/admin_lang/export/lang_member_".$lang.".php");
$lang_months = array($lang_member[1218], $lang_member[1219], $lang_member[1220], $lang_member[1221], $lang_member[1222], $lang_member[1223], $lang_member[1224], $lang_member[1225], $lang_member[1226], $lang_member[1227], $lang_member[1228], $lang_member[1229]);
$lang_months_short = array($lang_member[1230], $lang_member[1231], $lang_member[1232], $lang_member[1233], $lang_member[1234], $lang_member[1235], $lang_member[1236], $lang_member[1237], $lang_member[1238], $lang_member[1239], $lang_member[1240], $lang_member[1241]);
$lang_g['lotZone'][1] = $lang_member[568];
$lang_g['lotZone'][2] = $lang_member[1093];
$lang_g['lotZone'][3] = $lang_member[1094];
$lang_g['lotZone'][4] = $lang_member[1096];
$lang_g['lotZone'][5] = $lang_member[1097];
$lang_g['lotZone'][6] = $lang_member[1098];
$lang_g['lotZone'][7] = $lang_member[1099];
$lang_g['lotZone'][8] = $lang_member[1101];
$lang_g['lotZone'][9] = $lang_member[1102];
$lang_g['lotZone'][10] = $lang_member[1104];
$lang_g['lotZone'][11] = $lang_member[1105];
$lang_g['lotZone'][12] = $lang_member[1106];
$lang_g['lotZone'][13] = $lang_member[1108];
$lang_g['lotZone'][14] = $lang_member[1109];
$lang_g['lotZone'][15] = $lang_member[1110];
$lang_g['lotZone'][16] = $lang_member[1111];
$lang_g['lotZone'][17] = $lang_member[1112];
$lang_g['lotZone'][18] = $lang_member[686];
$lang_g['lotZone'][19] = $lang_member[683];

$lang_g['lotrob'][1] = $lang_member[689];
$lang_g['lotrob'][2] = $lang_member[691];
$lang_g['lotrob'][3] = $lang_member[692];
$lang_g['lotrob'][4] = $lang_member[694];
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
    case '1':     // วันที่ 12 เดือนสิงหาคม พ.ศ. 2550
      $thMonth = array_combine($month_key, $month_full);  
      $new_date = "วันที่ ".$dDay." เดือน".$thMonth[$dMonth]." พ.ศ.".$dYear ;
    break;
    case '2':     // วันที่ 12 เดือนสิงหาคม พ.ศ. 2550 เวลา 12.30
      $thMonth = array_combine($month_key, $month_full);  
      $new_date = "วันที่ ".$dDay." เดือน".$thMonth[$dMonth]." พ.ศ.".$dYear." เวลา ".$dTime ;
    break;
    
    
    case '3':     // 12 สิงหาคม พ.ศ. 2550
      $thMonth = array_combine($month_key, $month_full);  
      $new_date = $dDay." ".$thMonth[$dMonth]." ".$dYear ;
    break;
    case '4':     // 12 สิงหาคม พ.ศ. 2550 เวลา 12.30
      $thMonth = array_combine($month_key, $month_full);  
      $new_date = $dDay." ".$thMonth[$dMonth]." ".$dYear ." เวลา ".$dTime ;
    break;
    
    case '5':     // 12 ส.ค. 50
      $thMonth = array_combine($month_key, $month_short); 
      $new_date = $dDay." ".$thMonth[$dMonth]." ". substr($dYear,2,2);
    break;
    case '6':     // 12 ส.ค. 50 12.30
      $thMonth = array_combine($month_key, $month_short); 
      $new_date = $dDay." ".$thMonth[$dMonth]." ". substr($dYear,2,2)." ".$dTime;
    break;
    
    
    case '7':     // 12/08/2550
      $new_date = $dDay."/".$dMonth."/".$dYear;
    break;
    case '8':     // 12/08/2550 12.30
      $new_date = $dDay."/".$dMonth."/".$dYear." ".$dTime;
    break;
    
    case '9':     // 12-08-2550
      $new_date = $dDay."-".$dMonth."-".$dYear;
    break;
    case '10':      // 12-08-2550 12.30
      $new_date = $dDay."-".$dMonth."-".$dYear." ".$dTime;
    break;
    
    case '11':      // 12/08/2010
      $new_date = $dDay."/".$dMonth."/".substr($strDate,0,4);
    break;
    case '12':      // 12/08/2010 12.30
      $new_date = $dDay."/".$dMonth."/".substr($strDate,0,4)." ".$dTime;
    break;
    
    case '13':      // 12-08-2010
      $new_date = $dDay."-".$dMonth."-".substr($strDate,0,4);
    break;
    case '14':      // 12-08-2010 12.30
      $new_date = $dDay."-".$dMonth."-".substr($strDate,0,4)." ".$dTime;
    break;
    case '15':      // 12 สิงหาคม พ.ศ. 2550 เวลา 12.30
      $thMonth = array_combine($month_key, $month_full);  
      $new_date = $dDay." ".$thMonth[$dMonth]." ".$dYear ." เวลา ".$dTime.":".$dsecon ;
    break;
  } 
  
  return $new_date;
}
require "../inc/function.php";

$res_date = date("Y-m-d", time());
$_GET['d'] = date("d")."-".date("m")."-".date("Y");
$list = array();

$arr_ok = array();
$sql_arr=sql_query("select * from bom_tb_lotto_ok  where lot_zone!=1  and ok_date='$_GET[d]'");
while($rs_arr=sql_fetch($sql_arr)){
  $arr_ok[$rs_arr['lot_zone']][$rs_arr['lot_rob']] = $rs_arr;
}

$rs_last_18 = sql_array("select * from bom_tb_lotto_ok  where lot_zone=18 and o_number != ''  and ok_date='$_GET[d]' order by ok_id desc limit 1");
//print_r($rs_last_18);


$rs_lot1 = sql_array("select * from bom_tb_lotto_ok where lot_zone = 1 order by ok_id desc limit 1");

$ed_lot1=@explode(',',$rs_lot1['o_number']);
$ed_lot2_1=@explode(',',$rs_lot1['o_number']);
$ed_lot2_2=@explode(',',$rs_lot1['o_number']);
$ed_lot2_3=@explode(',',$rs_lot1['o_number']);
$ed_lot2_4=@explode(',',$rs_lot1['o_number']);

$list["ed_lot1"] = $ed_lot1;
$list["ed_lot2_1"] = $ed_lot2_1;
$list["ed_lot2_2"] = $ed_lot2_2;
$list["ed_lot2_3"] = $ed_lot2_3;
$list["ed_lot2_4"] = $ed_lot2_4;

$enum=explode(',',$rs[o_number]);

$list["arr_ok"] = $arr_ok;


echo json_encode($list);




?>