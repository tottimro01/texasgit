<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
/*
use ElephantIO\Client,
    ElephantIO\Engine\SocketIO\Version1X;
*/
header("Content-type:text/html; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);

/*
#################################hijack
$foh="../../../json/login/hjm_".$_SESSION[mid].".php";
if(!file_exists($foh)){
	
@session_start(); 
@session_destroy();
echo"<script>top.document.location='http://m.".$check_url."/lot/';</script>";

	 	$_SESSION[error][1][0] = '<div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label label-danger">EM60-ERROR BET!!!</span></div>';
        $arr["txt"] = $_SESSION[error][1][0] . "<br>";
        echo json_encode($arr);
        exit();
}
@require_once($foh);
$hijack=md5($_SESSION[mid].$_SERVER['REMOTE_ADDR']);
if($hijack!=$m_hijack){ 

@session_start(); 
@session_destroy();
echo"<script>top.document.location='http://m.".$check_url."/lot/';</script>";

	 	$_SESSION[error][1][0] = '<div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label label-danger">EM61-Hijack!!!</span></div>';
        $arr["txt"] = $_SESSION[error][1][0] . "<br>";
        echo json_encode($arr);
        exit();
		
}

#################################hijack
*/

if($_COOKIE['Language']==""){
  
      setcookie( "Language", 'th', time()+31104000, "/");
}
require('../lang/'.$_COOKIE['Language'].'.php');
require('../../../lang/'.$_COOKIE['Language'].'.php');
// require("../../../lang/th.php");
require('../../../inc/conn.php');
require('../../../inc/function.php');


$fo="../../../json/ip/$_SESSION[mid].php";
require($fo);
$token_ip = md5($_SERVER['SERVER_ADDR']);
if($token_ip!=$m_ip){ 
@session_start(); 
@session_destroy();
echo"<script>top.document.location='http://m.".$check_url."/lot/';</script>";
exit(); 
}

$arr             = array();


if(count($_POST["chk_list"])<=0){
	$arr["res"] = 99;
	$arr["msg"] = $lang_member[556]; //กรุณาเลือกรายการ
	echo json_encode($arr);
	 exit();
}

if ($_SESSION['mid'] == "") {
	
@session_start(); 
@session_destroy();
echo"<script>top.document.location='http://m.".$check_url."/lot/';</script>";

    exit();
}
if (!strstr($_SERVER['HTTP_REFERER'], $check_url)) {
@session_start(); 
@session_destroy();
echo"<script>top.document.location='http://m.".$check_url."/lot/';</script>";
	
    exit();
}
$fo = "../../../json/login/token_bet/$_SESSION[mid].php";
if(!file_exists($fo)){
	
@session_start(); 
@session_destroy();
echo"<script>top.document.location='http://m.".$check_url."/lot/';</script>";
	 exit();
}
@require_once($fo);
if ($_SESSION['bettoken'] != $bet_token) {
	
@session_start(); 
@session_destroy();
echo"<script>top.document.location='http://m.".$check_url."/lot/';</script>";
    exit();
}

$_SESSION[error]=array();


################OPEN BET maintenance 
$url_file="../../../json/maintenance.json";	
$mm_js=file_get_contents2($url_file);
$jsmm = json_decode2($mm_js, true);

if($jsmm["open"]==0){


	$_SESSION[error][1][0] = '<div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label label-danger">Maintenance</span></div>';
        $arr["txt"] .= $_SESSION[error][1][0] . "<br>";
    	echo json_encode($arr);
    	exit();
 
 
	}
	
################OPEN BET LOTTO 
$url_file="../../../json/lotto.json";	
$op_js=file_get_contents2($url_file);
$jsop = json_decode2($op_js, true);

if($jsop["open"]==0){
	
	$_SESSION[error][1][0] = '<div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label label-danger">'.$lang_member[1124].'</span></div>';
   $arr["txt"] .= $_SESSION[error][1][0] . "<br>";
    echo json_encode($arr);
    exit();
 
	}

################Config Admin
$url_file="../../../json/config/admin/LottoMaxReceive.json";	
$lot_js=file_get_contents2($url_file);
$hover = json_decode2($lot_js, true);


################Config Member
$url_file="../../../json/config/member/LottoConfig_".$_SESSION[mid].".json";	
$lot6_js=file_get_contents2($url_file);
$lot_m = json_decode2($lot6_js, true);


################Config Super
$url_file="../../../json/config/agent/LottoConfig_".$_SESSION['crid1'].".json";	
$lot1_js=file_get_contents2($url_file);
$lot_r1 = json_decode2($lot1_js, true);


################Config Senior
$url_file="../../../json/config/agent/LottoConfig_".$_SESSION['crid2'].".json";	
$lot2_js=file_get_contents2($url_file);
$lot_r2 = json_decode2($lot2_js, true);


################Config Master
$url_file="../../../json/config/agent/LottoConfig_".$_SESSION['crid3'].".json";	
$lot3_js=file_get_contents2($url_file);
$lot_r3 = json_decode2($lot3_js, true);


################Config Agent
$url_file="../../../json/config/agent/LottoConfig_".$_SESSION['crid4'].".json";	
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
	$_SESSION[error][1][0] = '<div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label label-danger">'.$lang_member[1128].'</span></div>';
    $arr["txt"] .= $_SESSION[error][1][0] . "<br>";
    echo json_encode($arr);
    exit();
 }
 if(intval($lot_r4[r_active_bet])==0){ 
	$_SESSION[error][1][0] = '<div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label label-danger">'.$lang_member[1129].'</span></div>';
  $arr["txt"] .= $_SESSION[error][1][0] . "<br>";
    echo json_encode($arr);
    exit();
 }
  if(intval($lot_r3[r_active_bet])==0){ 
	$_SESSION[error][1][0] = '<div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label label-danger">'.$lang_member[1130].'</span></div>';
        $arr["txt"] .= $_SESSION[error][1][0] . "<br>";
    echo json_encode($arr);
    exit();
 }
  if(intval($lot_r2[r_active_bet])==0){ 
	$_SESSION[error][1][0] = '<div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label label-danger">'.$lang_member[1131].'</span></div>';
        $arr["txt"] .= $_SESSION[error][1][0] . "<br>";
    echo json_encode($arr);
    exit();
 }
  if(intval($lot_r1[r_active_bet])==0){ 
	$_SESSION[error][1][0] = '<div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label label-danger">'.$lang_member[1132].'</span></div>';
     $arr["txt"] .= $_SESSION[error][1][0] . "<br>";
    echo json_encode($arr);
    exit();
 }
 
 
 ########################################เคียร์เงิน

$_POST[zone] = 1;
$_POST[rob]  = 1;
$url_file1   = "../../../json/lotto/ok/ok_1_1.json";
$date_js     = file_get_contents2($url_file1);
$date_bet    = json_decode2($date_js, true);

$re_ok       = $date_bet[0];
#print_r($re_ok);
#echo json_encode($re_ok);
# exit();
$_SESSION[error][1]=array();


#if($re_ok[o_limit_time_lang]<$time_stam){ 
if ($re_ok[o_limit_time] < $time_stam) {
    //echo"ปิดรับแทงแล้ว";
  #  $_SESSION[error][1][] = "<b class='cr'>$lang_lot[19]</b>";
	$_SESSION[error][1][0] = '<div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label label-danger">'.$lang_lot[19].'</span></div>';
        $arr["txt"] .= $_SESSION[error][1][0] . "<br>";
    echo json_encode($arr);
    exit();
}
$view_date       = date("d-m-Y", $re_ok[o_limit_time]);
$view_date_bingo = date("Y-m-d H:i:s", $re_ok[o_limit_time]);

$bill_cus_name = trim($_POST['bill_cus_name']);
$bill_no = trim($_POST['bill_no']);



$sql             = "select m_id,m_count,bonus_m_id from bom_tb_member where m_id='$_SESSION[mid]'";
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
	$_SESSION[error][1][0] = '<div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label label-danger">'.$lang_b[6]." : ".number_format($re_m[m_count]).'</span></div>';
    $arr["txt"] .= $_SESSION[error][1][0] . "<br>";
    echo json_encode($arr);
    exit();
}
$sql = "INSERT IGNORE INTO bom_tb_lotto_bill_live (b_date,	b_timestam,	b_datenow ,	m_id	,b_ip	,ok_id	,lot_zone,	lot_rob, b_date_bingo, r_agent_id,b_bet_from
) values(
'$view_date','$time_stam',now(),'$_SESSION[mid]','" . _bIP() . "','$re_ok[ok_id]','$_POST[zone]','$_POST[rob]' , '$view_date_bingo','$_SESSION[r_agent_id]' ,'m'
)";
sql_query($sql);
$sql                  = "select bill_id  from bom_tb_lotto_bill_live   where m_id='$_SESSION[mid]' and lot_zone='$_POST[zone]' and  lot_rob='$_POST[rob]'  order by bill_id desc limit 1";
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
//$ar                   = $_REQUEST['lotto'];
//$ttlot                = $_POST['tlot'];
$arr_socket = array();
$arr_in_socket = array();
#$time_stam=time();

foreach($_POST["chk_list"] as &$ar){
	$rs_list_max = sql_array("select * from bom_tb_lotto_topmax where m_id = '$_SESSION[mid]' and tp_id = '$ar'");
	$q_num=$rs_list_max["play_number"];	
	$x_sum=$rs_list_max["b_total"];	
	$type_lot=$rs_list_max["lot_type"];	
	$tp_win=$rs_list_max["tp_win"];	
	
	if($type_lot>0){
		include("save_db_false.php");
	}
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
*/
}
$count_step = count($count_num);
if ($count_step == 0) {
    ########################### ผิดพลาด
    $sql = "delete from bom_tb_lotto_bill_live where bill_id='$reeb[bill_id]' and m_id='$_SESSION[mid]' and lot_zone='$_POST[zone]' and  lot_rob='$_POST[rob]'";
    sql_query($sql);
    $arr["res"] = 0;
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
		
		require '../../../vendor/autoload.php';
		$client = new Client(new Version1X($url_socket));
		$client->initialize();
		$client->emit('broadcast', $arr_socket);
		$client->emit('broadcast2', $arr_socket2);
		$client->close();
	}
	*/
	
    $arr["res"] = 1;
}
for ($e = 0; $e < count($_SESSION[error][1]); $e++) {
    $arr["txt"] .= $_SESSION[error][1][$e] . "<br>";
}
echo json_encode($arr);
#############################################################
#############################################################
#############################################################
include("write_json.php");
?>
