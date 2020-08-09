<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
require("../lang/th.php");
require('../inc/function.php');


###########################
$m_xid=array();
	$re=sql_query("select * from bom_tb_member order by m_user asc");
	while($rs=sql_fetch($re)){
$m_xid[md5($rs[m_user])]=$rs[m_id];
	}
###########################

$mid = $_POST["m_id"];
$txt = $_POST["txt"];
$_POST["zone"] = 1;
$_POST["rob"]  = 1;

$bf            = "";
$lat           = "";
$lon           = "";
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

$sql    = "INSERT IGNORE INTO bom_tb_lotto_bill (b_date,	b_timestam,	b_datenow ,	m_id	,b_ip	,ok_id	,lot_zone,	lot_rob, b_date_bingo, r_agent_id,b_map_lat,b_map_lon,b_bet_from
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

$txt_arr = explode("\n" , $txt);

for($i=0;$i<count($txt_arr);$i++){
	$data_txt = str_replace("	" , "#+#" , str_replace(" " , "-" , $txt_arr[$i]));
	$data_arr = explode("#+#" , $data_txt);
	//echo $data_arr[1]." ".$data_arr[2]." ".$data_arr[3]." ".$data_arr[4]."<br>";
	#$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
#, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหน้าบน", 17 =>"3ล่างหน้า", 18 =>"2ตัวหน้าบน", 19 =>"วิ่งหน้าบน", 20 =>"3 โต๊ดหน้าบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย");
	$d_arr = explode("-",$data_arr[1]);
	$date_txt = explode("/" , $d_arr[0]);
	$date_time = ($date_txt[2]-543)."-".$date_txt[1]."-".$date_txt[0]." ".$d_arr[1];
	$date_timestam = strtotime($date_time);
	$q_num = _dtr($data_arr[3]);
	$x_sum = str_replace("," , "" ,$data_arr[4]);
	$mem_user=strtolower($data_arr[0]);
	if($data_arr[2]=="3ตัวบน"){
		$type_lot = 1;	
	}else if($data_arr[2]=="3ตัวล่าง"){
		if ($re_ok[o_limit_time_lang] > $time_stam) {
			$type_lot = 2;
		}else{
			$type_lot = 0;	
		}
	}else if($data_arr[2]=="3ตัวโต๊ด"){
		$type_lot = 3;	
	}else if($data_arr[2]=="3ตัวหน้าล่าง"){
		if ($re_ok[o_limit_time_lang] > $time_stam) {
			$type_lot = 17;
		}else{
			$type_lot = 0;	
		}
	}else if($data_arr[2]=="2ตัวบน"){
		$type_lot = 4;	
	}else if($data_arr[2]=="2ตัวล่าง"){
		if ($re_ok[o_limit_time_lang] > $time_stam) {
			$type_lot = 5;
		}else{
			$type_lot = 0;	
		}
	}else if($data_arr[2]=="2ตัวหน้าบน"){
		$type_lot = 18;	
	}else if($data_arr[2]=="2ตัวโต๊ด"){
		$type_lot = 24;	
	}else if($data_arr[2]=="1ตัวบน"){
		$type_lot = 6;	
	}else if($data_arr[2]=="1ตัวล่าง"){
		if ($re_ok[o_limit_time_lang] > $time_stam) {
			$type_lot = 7;
		}else{
			$type_lot = 0;	
		}
	}else if($data_arr[2]=="1ตัวปักหลัก1"){
		$type_lot = 21;	
	}else if($data_arr[2]=="1ตัวปักหลัก2"){
		$type_lot = 22;	
	}else if($data_arr[2]=="1ตัวปักหลัก3"){
		$type_lot = 23;	
	}else if($data_arr[2]=="3ตัวบนสูง/ต่ำ"){
		$type_lot = 10;	
	}else if($data_arr[2]=="2ตัวบนสูง/ต่ำ"){
		$type_lot = 9;	
	}else if($data_arr[2]=="2ตัวล่างสูง/ต่ำ"){
		if ($re_ok[o_limit_time_lang] > $time_stam) {
			$type_lot = 11;
		}else{
			$type_lot = 0;	
		}
	}else{
		$type_lot = 0;	
	}
	if($type_lot>0){
		include("save_db.php");
	}
}
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
  #  sql_query($sql);
	
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
				$arr["Msg"] .= "<br>".$txt_ss;
			}
		}
echo json_encode($arr);
#############################################################
#############################################################
#############################################################
include("../lotto/write_json.php");
?>