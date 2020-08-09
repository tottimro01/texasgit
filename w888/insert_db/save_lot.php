<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
use ElephantIO\Client,
    ElephantIO\Engine\SocketIO\Version1X;
	
header("Content-type:text/html; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);

require("../lang/th.php");
require('../inc/conn.php');
require('../inc/function.php');

$datetimexx           = date("Y-m-d H:i:s", $time_stam);
$date_timestam=$time_stam;

$mid           = trim($_POST["mid"]);
$bf            = trim($_POST["bf"]);
$lat           = trim($_POST["lat"]);
$lon           = trim($_POST["lon"]);
$strNum        = trim($_POST["txt"]);
$lat = trim($_POST["lat"]);
$lon = trim($_POST["lon"]);
$_POST["zone"] = trim($_POST["zone"]);
$_POST["rob"]  = 1;
require('get_mem.php');
$url_file1 = "../json/lotto/ok/ok_1_1.json";
$date_js   = file_get_contents2($url_file1);
$date_bet  = json_decode2($date_js, true);
$re_ok     = $date_bet[0];
if ($re_ok[o_limit_time] < $time_stam) {
    $arr["Status"]     = "2";
    $arr["Msg"]        = $lang_lot[19];
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
    echo json_encode($arr);
}
if ($_SESSION['mid'] == "") {
    $arr["Status"]     = "2";
    $arr["Msg"]        = "เกิดข้อผิดพลาดที่ไม่รู้จัก";
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
    echo json_encode($arr);
}
if ($uuid_mem != $uuid) {
    $arr["Status"]     = "2";
    $arr["Msg"]        = "เกิดข้อผิดพลาดที่ไม่รู้จัก";
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
    echo json_encode($arr);
}
$hmax            = @explode(',', $_SESSION['m_lotto_max']);
$hmin            = @explode(',', $_SESSION['m_lotto_min']);
$hpay            = @explode(',', $_SESSION['m_lotto_pay']);
$hdis            = @explode(',', $_SESSION['m_lotto_dis']);
$hshare          = @explode(',', $_SESSION['m_lotto_share']);
$hover           = @explode(',', $_SESSION['lot_over']);
#####################################################
$r1pay           = @explode(',', $_SESSION['lotto_pay_1']);
$r1dis           = @explode(',', $_SESSION['lotto_dis_1']);
$r1share         = @explode(',', $_SESSION['lotto_share_1']);
$r1myshare       = @explode(',', $_SESSION['lotto_myshare_1']);
$r1over          = @explode(',', $_SESSION['r_lotto_over_1']);
$r1force         = @explode(',', $_SESSION['r_lotto_force_1']);
$r2pay           = @explode(',', $_SESSION['lotto_pay_2']);
$r2dis           = @explode(',', $_SESSION['lotto_dis_2']);
$r2share         = @explode(',', $_SESSION['lotto_share_2']);
$r2myshare       = @explode(',', $_SESSION['lotto_myshare_2']);
$r2over          = @explode(',', $_SESSION['r_lotto_over_2']);
$r2force         = @explode(',', $_SESSION['r_lotto_force_2']);
$r3pay           = @explode(',', $_SESSION['lotto_pay_3']);
$r3dis           = @explode(',', $_SESSION['lotto_dis_3']);
$r3share         = @explode(',', $_SESSION['lotto_share_3']);
$r3myshare       = @explode(',', $_SESSION['lotto_myshare_3']);
$r3over          = @explode(',', $_SESSION['r_lotto_over_3']);
$r3force         = @explode(',', $_SESSION['r_lotto_force_3']);
$r4pay           = @explode(',', $_SESSION['lotto_pay_4']);
$r4dis           = @explode(',', $_SESSION['lotto_dis_4']);
$r4share         = @explode(',', $_SESSION['lotto_share_4']);
$r4over          = @explode(',', $_SESSION['r_lotto_over_4']);
$r4force         = @explode(',', $_SESSION['r_lotto_force_4']);
$view_date       = date("d-m-Y", $re_ok[o_limit_time]);
$view_date_bingo = date("Y-m-d H:i:s", $re_ok[o_limit_time]);
$arr             = array();
$arr_socket = array();
$arr_in_socket = array();
$sql             = "select m_id,m_count from bom_tb_member where m_id='$_SESSION[mid]'";
$re_m            = sql_array($sql);
if ($re_m[m_id] == "") {
    exit();
}
if ($re_m[m_count] <= 0) {
    $re_m[m_count] = 0;
}
$re_m[m_count]    = intval($re_m[m_count]);
$_SESSION[xcount] = $re_m[m_count];
if ($re_m[m_count] <= 0) {
    $arr["Status"]     = "2";
    $arr["Msg"]        = $lang_b[6] . " : " . $re_m[m_count];
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
    echo json_encode($arr);
}
$strNum = str_replace('(', '', $strNum);
$strNum = str_replace(')', '', $strNum);
$ex     = explode(",", $strNum);
$sql    = "insert into bom_tb_lotto_bill (b_date,	b_timestam,	b_datenow ,	m_id	,b_ip	,ok_id	,lot_zone,	lot_rob, b_date_bingo, r_agent_id,b_map_lat,b_map_lon,b_bet_from
) values(
'$view_date','$time_stam',now(),'$_SESSION[mid]','" . _bIP() . "','$re_ok[ok_id]','$_POST[zone]','$_POST[rob]' , '$view_date_bingo','$_SESSION[r_agent_id]'  , '$lat' , '$lon','$bf'
)";
sql_query($sql);
$sql                  = "select bill_id  from bom_tb_lotto_bill   where m_id='$_SESSION[mid]' and lot_zone='$_POST[zone]' and  lot_rob='$_POST[rob]'  order by bill_id desc limit 1";
$reeb                 = sql_array($sql);
$_SESSION[count_sum]  = 0;
$_SESSION[count_dis]  = 0;
$_SESSION[count_dis1] = 0;
$_SESSION[count_dis2] = 0;
$_SESSION[count_dis3] = 0;
$_SESSION[count_dis4] = 0;
$count_num            = array();
$error_id             = array();
$_SESSION[error]      = array();
$ttlot                = $_POST['lot_page'];
#$time_stam=time();
for ($i = 0; $i < count($ex); $i++) {
    $reNum  = stripslashes($ex[$i]);
    $arnum  = explode("-", trim($reNum));
    $q_num  = str_replace('"', '', trim($arnum[0]));
    $q_sum1 = intval(str_replace('"', '', trim($arnum[1])));
    $q_sum2 = intval(str_replace('"', '', trim($arnum[2])));
    $q_sum3 = intval(str_replace('"', '', trim($arnum[3])));
	 /*
    $lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
    , 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
    */
    ######################################################3 ตัว บน-ล่าง
    if (strlen($q_num) == 3 and $ttlot == 1) {
        for ($t1 = 1; $t1 <= 3; $t1++) {
            #	 $_SESSION[error][1][]="<span class='cr'>ล่าง=	if(".date("d-m-Y H:i:s",$re_ok[o_limit_time_lang]).">".date("d-m-Y H:i:s",$time_stam)."){ </span>";
            if ($t1 == 1) {
                $x_sum    = $q_sum1;
                $type_lot = 1;
            } else if ($t1 == 2) {
                $x_sum    = $q_sum2;
                $type_lot = 3;
            } else if ($t1 == 3) {
                if ($re_ok[o_limit_time_lang] > $time_stam) {
                    $x_sum    = $q_sum3;
                    $type_lot = 2;
                }
            } else {
                exit();
            }
            include("save_db.php");
        } #	for($t1=1;$t1<=3;$t1++){
    } #if(strlen($q_num)==3 and $ttlot==1){
    /*
    $lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
    , 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
    */
    ######################################################2 ตัว บน-ล่าง
    if (strlen($q_num) == 2 and $ttlot == 1) {
        for ($t1 = 1; $t1 <= 2; $t1++) {
            #	 $_SESSION[error][1][]="<span class='cr'>ล่าง=	if(".date("d-m-Y H:i:s",$re_ok[o_limit_time_lang]).">".date("d-m-Y H:i:s",$time_stam)."){ </span>";
            if ($t1 == 1) {
                $x_sum    = $q_sum1;
                $type_lot = 4;
            } else if ($t1 == 2) {
                if ($re_ok[o_limit_time_lang] > $time_stam) {
                    $x_sum    = $q_sum2;
                    $type_lot = 5;
                }
            } else {
                exit();
            }
            include("save_db.php");
        } #	for($t1=1;$t1<=3;$t1++){
    } #if(strlen($q_num)==3 and $ttlot==1){
    /*
    $lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
    , 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
    */
    ######################################################วิ่ง บน-ล่าง
    if (strlen($q_num) == 1 and $ttlot == 1) {
        for ($t1 = 1; $t1 <= 2; $t1++) {
            #	 $_SESSION[error][1][]="<span class='cr'>ล่าง=	if(".date("d-m-Y H:i:s",$re_ok[o_limit_time_lang]).">".date("d-m-Y H:i:s",$time_stam)."){ </span>";
            if ($t1 == 1) {
                $x_sum    = $q_sum1;
                $type_lot = 6;
            } else if ($t1 == 2) {
                if ($re_ok[o_limit_time_lang] > $time_stam) {
                    $x_sum    = $q_sum2;
                    $type_lot = 7;
                }
            } else {
                exit();
            }
            include("save_db.php");
        } #	for($t1=1;$t1<=3;$t1++){
    } #if(strlen($q_num)==3 and $ttlot==1){
    /*
    $lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
    , 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
    */
    ######################################################3หน้าบน-3หน้าโต๊ด
    if (strlen($q_num) == 3 and $ttlot == 2) {
        for ($t1 = 1; $t1 <= 3; $t1++) {
            if ($t1 == 1) {
                $x_sum    = $q_sum1;
                $type_lot = 16;
            } else if ($t1 == 2) {
                $x_sum    = $q_sum2;
                $type_lot = 20;
            } else if ($t1 == 3) {
                if ($re_ok[o_limit_time_lang] > $time_stam) {
                    $x_sum    = $q_sum3;
                    $type_lot = 17;
                }
            } else {
                exit();
            }
            include("save_db.php");
        } #	for($t1=1;$t1<=2;$t1++){
    } #if(strlen($q_num)==3 and $ttlot==2){
    /*
    $lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
    , 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
    */
    ######################################################2หน้า
    if (strlen($q_num) == 2 and $ttlot == 2) {
        for ($t1 = 1; $t1 <= 1; $t1++) {
            if ($t1 == 1) {
                $x_sum    = $q_sum1;
                $type_lot = 18;
            } else {
                exit();
            }
            include("save_db.php");
        } #		for($t1=1;$t1<=1;$t1++){
    } #	if(strlen($q_num)==2 and $ttlot==2){
    /*
    $lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
    , 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
    */
    ######################################################วิ่งหน้า
    if (strlen($q_num) == 1 and $ttlot == 2) {
        for ($t1 = 1; $t1 <= 1; $t1++) {
            if ($t1 == 1) {
                $x_sum    = $q_sum1;
                $type_lot = 19;
            } else {
                exit();
            }
            include("save_db.php");
        } #		for($t1=1;$t1<=1;$t1++){
    } #if(strlen($q_num)==1 and $ttlot==2){
    /*
    $lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
    , 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
    */
    ######################################################2 ตัว บน-ล่าง
    if (strlen($q_num) == 2 and $ttlot == 3) {
        for ($t1 = 1; $t1 <= 3; $t1++) {
            if ($t1 == 1) {
                $x_sum    = $q_sum1;
                $type_lot = 4;
            } else if ($t1 == 2) {
                if ($re_ok[o_limit_time_lang] > $time_stam) {
                    $x_sum    = $q_sum2;
                    $type_lot = 5;
                }
			  } else if ($t1 == 3) {
				$x_sum    = $q_sum3;
                $type_lot = 24;
            } else {
                exit();
            }
            include("save_db.php");
        } #		for($t1=1;$t1<=2;$t1++){
    } #	if(strlen($q_num)==2 and $ttlot==3){
    /*
    $lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
    , 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
    */
    ######################################################เลขวิ่ง
    /*if (strlen($q_num) == 1 and $ttlot == 4) {
        for ($t1 = 1; $t1 <= 2; $t1++) {
            if ($t1 == 1) {
                $x_sum    = $q_sum1;
                $type_lot = 6;
            } else if ($t1 == 2) {
                if ($re_ok[o_limit_time_lang] > $time_stam) {
                    $x_sum    = $q_sum2;
                    $type_lot = 7;
                }
            } else {
                exit();
            }
            include("save_db.php");
        } #for($t1=1;$t1<=2;$t1++){
    }*/ #	if(strlen($q_num)==1 and $ttlot==4){
    /*
    $lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
    , 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
    */
    ######################################################แบบพิเศษ
    if ($ttlot == 4) {
        if ($q_sum2==5) {
            $type_lot = 8;
        } else if ($q_sum2==6) {
            $type_lot = 9;
        } else if ($q_sum2==7) {
            $type_lot = 10;
        } else if ($q_sum2==8) {
            if ($re_ok[o_limit_time_lang] > $time_stam) {
                $type_lot = 11;
            } else {
                $q_sum1 = 0;
            }
        } else if ($q_sum2==9) {
            $type_lot = 12;
        } else if (strlen($q_num) == 2 and $q_sum2==10) {
            $type_lot = 13;
        } else if (strlen($q_num) == 3 and $q_sum2==11) {
            $type_lot = 14;
        } else if (strlen($q_num) == 3 and $q_sum2==12) {
            $type_lot = 15;
		} else if ($q_sum2==2) {
            $type_lot = 21;
		} else if ($q_sum2==3) {
            $type_lot = 22;
		} else if ($q_sum2==4) {
            $type_lot = 23;
        }else{
			$type_lot = 0;	
		}
		if($type_lot>0){
        		$x_sum = $q_sum1;
        		include("save_db.php");
		}
    } #if($ttlot==5){
    /*
    $lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
    , 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
    */
    ###########################################ปักหลัก
    if (strlen($q_num) == 1 and $ttlot == 7) {
        for ($t1 = 1; $t1 <= 3; $t1++) {
            if ($t1 == 1) {
                $x_sum    = $q_sum1;
                $type_lot = 21;
            } else if ($t1 == 2) {
                $x_sum    = $q_sum2;
                $type_lot = 22;
            } else if ($t1 == 3) {
                $x_sum    = $q_sum3;
                $type_lot = 23;
            } else {
                exit();
            }
            include("save_db.php");
        } #for($t1=1;$t1<=3;$t1++){
    } #	if(strlen($q_num)==1 and $ttlot==7){	
    ##########################################################################################################################
} #for($i=0;$i<count($ar);$i++){
$count_step = count($count_num);
if ($count_step == 0) {
    ########################### ผิดพลาด
    $sql = "delete from bom_tb_lotto_bill where bill_id='$reeb[bill_id]' and m_id='$_SESSION[mid]' and lot_zone='$_POST[zone]' and  lot_rob='$_POST[rob]'";
    sql_query($sql);
	$arr["Status"] = "3";
	$arr["Licen"] = "SC";
	$arr["Msg"] = "E302 !!!ผิดพลาดไม่มีการบันทึก";
	$arr["LastLot"] = $re_ok[ok_date];
	$arr["CloseBig"] = $re_ok["o_limit_time"];
	$arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
} else {
    ########################### ถูกต้อง
    $sql = "update bom_tb_lotto_bill set b_total='$_SESSION[count_sum]' , b_pay='$_SESSION[count_dis]', 	br_pay_1	='$_SESSION[count_dis1]', br_pay_2='$_SESSION[count_dis2]', 	br_pay_3	='$_SESSION[count_dis3]', br_pay_4='$_SESSION[count_dis4]'
	 where bill_id='$reeb[bill_id]' and m_id='$_SESSION[mid]' and lot_zone='$_POST[zone]' and  lot_rob='$_POST[rob]' ";
    sql_query($sql);
    $sql = "update   bom_tb_member  set m_count=m_count-$_SESSION[count_dis]   where m_id='$_SESSION[mid]'";
    sql_query($sql);
	
	######SOCKET
	$url_socket = "http://202.162.78.181:3002";
	$array_socket = get_headers($url_socket);
	$string_socket = $array_socket[0];
	if(strpos($string_socket,"404")){
		$lot_socket = "";
		foreach($arr_in_socket as $txt_socket){
			if($lot_socket==""){
				$lot_socket .= $txt_socket;
			}else{
				$lot_socket .= " or ".$txt_socket;
			}
		}
		
		$arr_socket["listLot"] = ['lot_socket' => $lot_socket,'d' => $view_date,'b' => 1,'rob' => 1];
		$arr_socket2 = array();
		$arr_socket2["listLot2"] = ['bill_id' => $reeb[bill_id],'d' => $view_date,'muser' => $_SESSION["m_user"],'ruser' => $_SESSION["r_id_user_1"]];
		
		require '../vendor/autoload.php';
		$client = new Client(new Version1X($url_socket));
		$client->initialize();
		$client->emit('broadcast', $arr_socket);
		$client->emit('broadcast2', $arr_socket2);
		$client->close();
	}
	
	
    $arr["Status"] = "1";
		$arr["Licen"] = "SC";
		
		$arr["LastLot"] = $re_ok[ok_date];
		$arr["CloseBig"] = $re_ok["o_limit_time"];
		$arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
}

foreach($_SESSION[error][1] as $txt_ss){
			if($arr["Msg"]==""){
				$arr["Msg"] .= $txt_ss;
			}else{
				$arr["Msg"] .= "\n".$txt_ss;
			}
		}
echo json_encode($arr);
#############################################################
#############################################################
#############################################################
include("../lotto/write_json.php");
?>
