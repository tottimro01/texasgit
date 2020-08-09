<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
/*
use ElephantIO\Client,
    ElephantIO\Engine\SocketIO\Version1X;
*/

header("Content-type:text/html; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);


$lang_post           = trim($_POST["lang"]);
if($lang_post==""){
	$lang_post = "th";
}

require('../inc/conn.php');
require('../inc/function.php');
$_SESSION['lang'] = $lang_post;
// require("../../lang/member_lang.php");
require("../lang/variable_lang.php");
require("../lang/function_array.php");






$mid           = trim($_POST["mid"]);
$bf            = trim($_POST["bf"]);
$lat           = trim($_POST["lat"]);
$lon           = trim($_POST["lon"]);
$chk_list        = trim($_POST["chk_list"]);
if($chk_list!=""){
	$ex_chk_list = explode("," , $chk_list);
}
$_POST["zone"] = 1;
$_POST["rob"]  = 1;
$bill_cus_name = mysql_escape_mimic(trim($_POST['pname']));
$bill_no = trim($_POST['pid']);
//echo "chk_list = ".$_POST["chk_list"]."######";
//print_r($ex_chk_list);
//echo count($ex_chk_list);
//exit();

$url_file1 = "../../json/lotto/ok/ok_1_1.json";
$date_js   = file_get_contents2($url_file1);
$date_bet  = json_decode2($date_js, true);
$re_ok     = $date_bet[0];
/*print_r();
exit();*/
/*
#################################hijack
$foh="../json/login/hjmios_".$mid.".php";
if(!file_exists($foh)){
    $arr["Status"]     = "4";
    $arr["Msg"]        = "ERROR BET!!!";
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
    echo json_encode($arr);
     exit();
}
@require_once($foh);
$hijack=md5($_SERVER['REMOTE_ADDR']);
if($hijack!=$m_hijack){ 
    $arr["Status"]     = "4";
    $arr["Msg"]        = "Hijacking bet!!!";
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
    echo json_encode($arr);
     exit();
}

#################################hijack
*/

if(count($ex_chk_list)<=0){
	$arr["Status"]     = "99";
    $arr["Msg"]        = $lang_lot[111];//"กรุณาเลือกรายการ";
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
    echo json_encode($arr);
    exit();
}

################OPEN BET maintenance 
$url_file="../../json/maintenance.json";	
$mm_js=file_get_contents2($url_file);
$jsmm = json_decode2($mm_js, true);
if($jsmm["open"]==0){

    $arr["Status"]     = "4";
    $arr["Msg"]        = $lang_g['Msg'][1];//"กำลังอยู่ในการ ซ่อมบำรุง ประมาน 45 นาที";
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
    echo json_encode($arr);
    exit();
	}
	
################OPEN BET LOTTO 
$url_file="../../json/lotto.json";	
$op_js=file_get_contents2($url_file);
$jsop = json_decode2($op_js, true);
if($jsop["open"]==0){
	
    $arr["Status"]     = "2";
    $arr["Msg"]        = $lang_g['Msg'][2];//"ปิดรับพนัน";
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
    echo json_encode($arr);
     exit();
	}






require('get_mem.php');



################OPEN BET LOTTO ALL
$url_opt="../../json/lotto_open_all.json";	
$opt_js=file_get_contents2($url_opt);
$jsopt = json_decode($opt_js, true);
if($jsopt["open"]==0 and $_SESSION["crid1"]!=1){
    $arr["Status"]     = "2";
    $arr["Msg"]        = $lang_g['Msg'][5];//"ปิดรับพนัน\nกลางเดือน เปิดรับวันที่ 10-16\nปลายเดือน เปิดรับวันที่ 25-01\nเวลาปิดรับ 15:20";
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
    echo json_encode($arr);
    exit();
}



if ($re_ok[o_limit_time] < $time_stam) {
    $arr["Status"]     = "2";
    $arr["Msg"]        = $lang_lot[19];
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
    echo json_encode($arr);
	 exit();
}
if ($_SESSION['mid'] == "") {
    $arr["Status"]     = "2";
    $arr["Msg"]        = $lang_g['Msg'][4]." 1";//"เกิดข้อผิดพลาดที่ไม่รู้จัก 1";
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
    echo json_encode($arr);
	 exit();
}
if ($uuid_mem != $uuid and $bf!="m") {
    $arr["Status"]     = "2";
    $arr["Msg"]        = $lang_g['Msg'][4]." 2";//"เกิดข้อผิดพลาดที่ไม่รู้จัก 2";
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
    echo json_encode($arr);
	 exit();
}



################Config Admin
$url_file="../../json/config/admin/LottoMaxReceive.json";	
$lot_js=file_get_contents2($url_file);
$hover = json_decode2($lot_js, true);

################Config Member
$url_file="../../json/config/member/LottoConfig_".$_SESSION[mid].".json";	
$lot6_js=file_get_contents2($url_file);
$lot_m = json_decode2($lot6_js, true);

################Config Super
$url_file="../../json/config/agent/LottoConfig_".$_SESSION['crid1'].".json";	
$lot1_js=file_get_contents2($url_file);
$lot_r1 = json_decode2($lot1_js, true);
################Config Senior
$url_file="../../json/config/agent/LottoConfig_".$_SESSION['crid2'].".json";	
$lot2_js=file_get_contents2($url_file);
$lot_r2 = json_decode2($lot2_js, true);
################Config Master
$url_file="../../json/config/agent/LottoConfig_".$_SESSION['crid3'].".json";	
$lot3_js=file_get_contents2($url_file);
$lot_r3 = json_decode2($lot3_js, true);
################Config Agent
$url_file="../../json/config/agent/LottoConfig_".$_SESSION['crid4'].".json";	
$lot4_js=file_get_contents2($url_file);
$lot_r4 = json_decode2($lot4_js, true);

$hconpay=@explode(',',$_SESSION['m_lotto_convert_pay']); 

$hmax=@explode(',',$lot_m['m_lotto_max']); 
$hmin=@explode(',',$lot_m['m_lotto_min']); 
$hnummax=@explode(',',$lot_m['m_lotto_nummax']); 

$hpay=@explode(',',$lot_m['m_lotto_pay_member']); 
$hdis=@explode(',',$lot_m['m_lotto_dis_member']); 
$hshare=@explode(',',$lot_m['m_lotto_myshare_agent']); 

$r2myshare=@explode(',',$lot_m['m_lotto_myshare_super']); 
$r3myshare=@explode(',',$lot_m['m_lotto_myshare_senior']); 
$r4myshare=@explode(',',$lot_m['m_lotto_myshare_master']); 

$r1force=@explode(',',$lot_m['m_lotto_force_super']); 
$r2force=@explode(',',$lot_m['m_lotto_force_senior']); 
$r3force=@explode(',',$lot_m['m_lotto_force_master']); 
$r4force=@explode(',',$lot_m['m_lotto_force_agent']); 

$r1pay=@explode(',',$lot_m['m_lotto_pay_super']); 
$r2pay=@explode(',',$lot_m['m_lotto_pay_senior']); 
$r3pay=@explode(',',$lot_m['m_lotto_pay_master']); 
$r4pay=@explode(',',$lot_m['m_lotto_pay_agent']); 

$r1dis=@explode(',',$lot_m['m_lotto_dis_super']); 
$r2dis=@explode(',',$lot_m['m_lotto_dis_senior']); 
$r3dis=@explode(',',$lot_m['m_lotto_dis_master']); 
$r4dis=@explode(',',$lot_m['m_lotto_dis_agent']); 


#####################################################

$r1over=@explode(',',$lot_r1['r_lotto_over']); 
$r2over=@explode(',',$lot_r2['r_lotto_over']); 
$r3over=@explode(',',$lot_r3['r_lotto_over']); 
$r4over=@explode(',',$lot_r4['r_lotto_over']); 


########################################เคียร์เงิน
if(intval($lot_m[m_active_bet])==0){ 

    $arr["Status"]     = "2";
    $arr["Msg"]        = $lang_g['Msg'][6];//"E55-ติดต่อผู้ดูแล";
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
    echo json_encode($arr);
	 exit();
 }
 if(intval($lot_r4[r_active_bet])==0){ 
    $arr["Status"]     = "2";
    $arr["Msg"]        = $lang_g['Msg'][7];//"E54-ติดต่อผู้ดูแล";
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
    echo json_encode($arr);
	 exit();
 }
  if(intval($lot_r3[r_active_bet])==0){ 
    $arr["Status"]     = "2";
    $arr["Msg"]        = $lang_g['Msg'][8];//"E53-ติดต่อผู้ดูแล";
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
    echo json_encode($arr);
	 exit();
 }
  if(intval($lot_r2[r_active_bet])==0){ 
    $arr["Status"]     = "2";
    $arr["Msg"]        = $lang_g['Msg'][9];//"E52-ติดต่อผู้ดูแล";
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
    echo json_encode($arr);
	 exit();
 }
  if(intval($lot_r1[r_active_bet])==0){ 
    $arr["Status"]     = "2";
    $arr["Msg"]        = $lang_g['Msg'][10];//"E51-ติดต่อผู้ดูแล";
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
    echo json_encode($arr);
	 exit();
 }
 
 
 ########################################เคียร์เงิน

$view_date       = date("d-m-Y", $re_ok[o_limit_time]);
$view_date_bingo = date("Y-m-d H:i:s", $re_ok[o_limit_time]);
$arr             = array();
$arr_socket = array();
$arr_in_socket = array();
$sql             = "select * from bom_tb_member where m_id='$_SESSION[mid]'";
$re_m            = sql_array($sql);
$sql_ag             = "select * from bom_tb_agent where r_id='$_SESSION[crid]'";
$re_g            = sql_array($sql_ag);
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
	 exit();
}
$strNum = str_replace('(', '', $strNum);
$strNum = str_replace(')', '', $strNum);
$ex     = explode(",", $strNum);
$sql    = "INSERT IGNORE INTO bom_tb_lotto_bill_live (b_date,	b_timestam,	b_datenow ,	m_id	,b_ip	,ok_id	,lot_zone,	lot_rob, b_date_bingo, r_agent_id,b_map_lat,b_map_lon,b_bet_from,b_name,b_no
) values(
'$view_date','$time_stam',now(),'$_SESSION[mid]','" . _bIP() . "','$re_ok[ok_id]','$_POST[zone]','$_POST[rob]' , '$view_date_bingo','$_SESSION[r_agent_id]'  , '$lat' , '$lon','$bf', '$bill_cus_name', '$bill_no'
)";
sql_query($sql);
$sql                  = "select bill_id  from bom_tb_lotto_bill_live   where m_id='$_SESSION[mid]' and lot_zone='$_POST[zone]' and  lot_rob='$_POST[rob]'  order by bill_id desc limit 1";
$reeb                 = sql_array($sql);
$_SESSION[count_sum3t]  = 0;
$_SESSION[count_sum]  = 0;
$_SESSION[count_dis]  = 0;
$_SESSION[count_dis1] = 0;
$_SESSION[count_dis2] = 0;
$_SESSION[count_dis3] = 0;
$_SESSION[count_dis4] = 0;
$count_num            = array();
$error_id             = array();
$_SESSION[error]      = array();
#$time_stam=time();
foreach($ex_chk_list as &$ar){
	$rs_list_max = sql_array("select * from bom_tb_lotto_topmax where m_id = '$_SESSION[mid]' and tp_id = '$ar'");
	$q_num=$rs_list_max["play_number"];	
	$x_sum=$rs_list_max["b_total"];	
	$type_lot=$rs_list_max["lot_type"];	
	$tp_win=$rs_list_max["tp_win"];	
	
	if($type_lot>0){
		include("save_db_false.php");
	}
}
$count_step = count($count_num);
if ($count_step == 0) {
    ########################### ผิดพลาด
    $sql = "delete from bom_tb_lotto_bill_live where bill_id='$reeb[bill_id]' and m_id='$_SESSION[mid]' and lot_zone='$_POST[zone]' and  lot_rob='$_POST[rob]'";
    sql_query($sql);
	$arr["Status"] = "3";
	$arr["Licen"] = "SC";
	$arr["Msg"] = $lang_g['Msg'][11];//"E302 !!!ผิดพลาดไม่มีการบันทึก";
	$arr["LastLot"] = $re_ok[ok_date];
	$arr["CloseBig"] = $re_ok["o_limit_time"];
	$arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
} else {
    ########################### ถูกต้อง
    $sql = "update bom_tb_lotto_bill_live set b_total='$_SESSION[count_sum]' , b_pay='$_SESSION[count_dis]', 	br_pay_1	='$_SESSION[count_dis1]', br_pay_2='$_SESSION[count_dis2]', 	br_pay_3	='$_SESSION[count_dis3]', br_pay_4='$_SESSION[count_dis4]'
	 where bill_id='$reeb[bill_id]' and m_id='$_SESSION[mid]' and lot_zone='$_POST[zone]' and  lot_rob='$_POST[rob]' ";
    sql_query($sql);
    $sql = "update   bom_tb_member  set m_count=m_count-$_SESSION[count_dis]   where m_id='$_SESSION[mid]'";
    sql_query($sql);
	/*
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
	*/
	
        $arr["Status"] = "1";
		$arr["Licen"] = "SC";
		$arr["BillID"] = "$reeb[bill_id]";
		$arr["LastLot"] = $re_ok[ok_date];
		$arr["CloseBig"] = $re_ok["o_limit_time"];
		$arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
	
	$arr["txtBillId"] = $lang_lot[118]." ".$lang_m[39]." ".$reeb[bill_id];
	$arr["txtLastLot"] = $lang_lot[119]." "._cvf($re_ok[o_limit_time] , 3 , $lang_post);
	$arr["txtDateTime"] = $lang_m[23]." "._cvf(time() , 3 , $lang_post)." ".$lang_m[9]." ".date("H.i");
	$arr["txtBranch"] = $lang_lot[120]." : ".$re_g["r_name"]."[".$re_g["r_user"]."]";
	$arr["txtUser"] = $lang_lot[121]." : ".$re_m["m_name"]."[".$re_m["m_user"]."]";
	$arr["txtTotal"] = $lang_lot[71]." ".number_format($_SESSION[count_sum3t])." ".$lang_lot[72];
	$arr["txtName"] = $lang_lot[122]." : ".$bill_cus_name;
	$arr["txtNo"] = $lang_lot[123]." : ".$bill_no;
}
$idata = 0;
foreach($_SESSION[error][1] as $txt_ss){
	$arr["data"][$idata]["txt"] = $txt_ss;
	$arr["data"][$idata]["status"] = $_SESSION[error][2][$idata];
			if($arr["Msg"]==""){
				$arr["Msg"] .= $txt_ss;
			}else{
				$arr["Msg"] .= "\n".$txt_ss;
			}
	$idata++;
		}

echo json_encode($arr);
#############################################################
#############################################################
#############################################################
include("../../lotto/write_json.php");

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
