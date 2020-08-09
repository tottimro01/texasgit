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
	$arr["txt"] = "ERROR BET!!!";
	echo json_encode($arr);
	 exit();
}
@require_once($foh);
$hijack=md5($_SERVER['REMOTE_ADDR']);
if($hijack!=$m_hijack){ exit();}

#################################hijack
*/


require('../../../inc/conn.php');
require('../../../inc/function.php');
require('../inc/data.php');

$fo="../../../json/ip/$_SESSION[mid].php";
require($fo);
$token_ip = md5(_bIP());
if($token_ip!=$m_ip){ 
@session_start(); 
@session_destroy();
echo"<script>top.document.location='http://m.".$check_url."/lothun/';</script>";
exit(); 
}
/*

if($_SESSION['mid'] ==42){
	
$url_file1="http://alert.btstep.com/send_alert_get.php?uid=1&msg=แทงหวยหุ้น";	
file_get_contents2($url_file1);

$ar = $_REQUEST['lotto'];     
$ttlot = $_POST['tlot']; 
$logtxt='';
for($i=0;$i<count($ar);$i++){
	$ex = explode("," , $ar[$i]);
	$q_num=trim($ex[0]);	
	$q_sum1=intval(str_replace(",","",trim($ex[1])));
	$q_sum2=intval(str_replace(",","",trim($ex[2])));
	$q_sum3=intval(str_replace(",","",trim($ex[3])));
#########$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$


	
if(strlen($q_num)==2){
	for($t1=1;$t1<=3;$t1++){
			
		#	 $_SESSION[error][1][]="<span class='cr'>ล่าง=	if(".date("d-m-Y H:i:s",$re_ok[o_limit_time_lang]).">".date("d-m-Y H:i:s",$time_stam)."){ </span>";
			 
			 
			if($t1==1){
				$x_sum=$q_sum1;
				$type_lot=4;
			}else if($t1==2){
				$x_sum=$q_sum2;
				$type_lot=5;
			}else if($t1==3){
				$x_sum=$q_sum3;
				$type_lot=0;
			}else{
				$type_lot=0;
			}
			

if($type_lot>0){			
	  	$logtxt='T='.$type_lot.' , N='.$q_num.' , S='.$x_sum.'
		 ';
		 $file='log_hun.txt';
		file_put_contents($file,$logtxt, FILE_APPEND | LOCK_EX);	
}

}
}




		
}

}





*/



if ($_SESSION['mid'] == "") {
	
@session_start(); 
@session_destroy();
echo"<script>top.document.location='http://m.".$check_url."/lothun/';</script>";
    exit();
}
if (!strstr($_SERVER['HTTP_REFERER'], $check_url)) {
@session_start(); 
@session_destroy();
echo"<script>top.document.location='http://m.".$check_url."/lothun/';</script>";
    exit();
}
$fo = "../../../json/login/token_bet/$_SESSION[mid].php";
if(!file_exists($fo)){
@session_start(); 
@session_destroy();
echo"<script>top.document.location='http://m.".$check_url."/lothun/';</script>";
	 exit();
}
@require_once($fo);
if ($_SESSION['bettoken'] != $bet_token) {
@session_start(); 
@session_destroy();
echo"<script>top.document.location='http://m.".$check_url."/lothun/';</script>";
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
	
	
	$check_bet=_checkbet_hun();
	
################OPEN BET LOTTO 
$url_file="../../../json/lotto_hun.json";	
$op_js=file_get_contents2($url_file);
$jsop = json_decode2($op_js, true);

if($jsop["open"]==0  or $check_bet==0){
	
	$_SESSION[error][1][0] = '<div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label label-danger">'.$lang_member[1124].'</span></div>';
      $arr["txt"] .= $_SESSION[error][1][0] . "<br>";
    echo json_encode($arr);
    exit();
 
	}

################Config Admin
$url_file="../../../json/config/admin/Lotto_hunMaxReceive.json";	
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







$hmax=@explode(',',$lot_m['m_lotto_hun_max']); 
$hmin=@explode(',',$lot_m['m_lotto_hun_min']); 
$hnummax=@explode(',',$lot_m['m_lotto_hun_nummax']); 

$hpay=@explode(',',$lot_m['m_lotto_hun_pay_member']); 
$hdis=@explode(',',$lot_m['m_lotto_hun_dis_member']); 
$hshare=@explode(',',$lot_m['m_lotto_hun_myshare_agent']); 

$r2myshare=@explode(',',$lot_m['m_lotto_hun_myshare_super']); 
$r3myshare=@explode(',',$lot_m['m_lotto_hun_myshare_senior']); 
$r4myshare=@explode(',',$lot_m['m_lotto_hun_myshare_master']); 

$r1force=@explode(',',$lot_m['m_lotto_hun_force_super']); 
$r2force=@explode(',',$lot_m['m_lotto_hun_force_senior']); 
$r3force=@explode(',',$lot_m['m_lotto_hun_force_master']); 
$r4force=@explode(',',$lot_m['m_lotto_hun_force_agent']); 

$r1pay=@explode(',',$lot_m['m_lotto_hun_pay_super']); 
$r2pay=@explode(',',$lot_m['m_lotto_hun_pay_senior']); 
$r3pay=@explode(',',$lot_m['m_lotto_hun_pay_master']); 
$r4pay=@explode(',',$lot_m['m_lotto_hun_pay_agent']); 

$r1dis=@explode(',',$lot_m['m_lotto_hun_dis_super']); 
$r2dis=@explode(',',$lot_m['m_lotto_hun_dis_senior']); 
$r3dis=@explode(',',$lot_m['m_lotto_hun_dis_master']); 
$r4dis=@explode(',',$lot_m['m_lotto_hun_dis_agent']); 


#####################################################

$r1over=@explode(',',$lot_r1['r_lotto_hun_over']); 
$r2over=@explode(',',$lot_r2['r_lotto_hun_over']); 
$r3over=@explode(',',$lot_r3['r_lotto_hun_over']); 
$r4over=@explode(',',$lot_r4['r_lotto_hun_over']); 


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

$_POST[zone]=$_SESSION["zone_hun"];
$_POST[rob]=_rob_hun();


if($_POST[zone]==2){
	$_SESSION[error][1][0] = '<div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label label-danger">'.$lang_member[2358].' Money Channel</span></div>';
     $arr["txt"] .= $_SESSION[error][1][0] . "<br>";
    echo json_encode($arr);
	exit();
	}


$url_file1   = "../../../json/lotto_hun/ok.json";
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
$arr             = array();
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
	$_SESSION[error][1][0] = '<div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label" style="background-color:#FFFFFF; border:1px solid #CCCCCC; color:#CCCCCC">n/a</span></div><div class="col-xs-4" align="center"><span class="label label-danger">'.$lang_b[6]." : ".number_format($re_m[m_count]).'</span></div>';
        $arr["txt"] .= $_SESSION[error][1][0] . "<br>";
    echo json_encode($arr);
    exit();
}
$sql = "INSERT IGNORE INTO bom_tb_lotto_hun_bill (b_date,	b_timestam,	b_datenow ,	m_id	,b_ip	,ok_id	,lot_zone,	lot_rob, b_date_bingo, r_agent_id,b_bet_from
) values(
'$view_date','$time_stam',now(),'$_SESSION[mid]','" . _bIP() . "','$re_ok[ok_id]','$_POST[zone]','$_POST[rob]' , '$view_date_bingo','$_SESSION[r_agent_id]' ,'m'
)";
sql_query($sql);
$sql                  = "select bill_id  from bom_tb_lotto_hun_bill   where m_id='$_SESSION[mid]' and lot_zone='$_POST[zone]' and  lot_rob='$_POST[rob]'  order by bill_id desc limit 1";
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
$ar                   = $_REQUEST['lotto'];
$ttlot                = $_POST['tlot'];
$arr_socket = array();
$arr_in_socket = array();
#$time_stam=time();
for ($i = 0; $i < count($ar); $i++) {
    $ex     = explode(",", $ar[$i]);
    $q_num  = trim($ex[0]);
    $q_sum1 = intval(str_replace(",", "", trim($ex[1])));
    $q_sum2 = intval(str_replace(",", "", trim($ex[2])));
    $q_sum3 = intval(str_replace(",", "", trim($ex[3])));
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
				#exit();	
				$type_lot=0;
            }
			if($type_lot>0){	
            include("save_db.php");
			}
        } #	for($t1=1;$t1<=3;$t1++){
    } #if(strlen($q_num)==3 and $ttlot==1){
    /*
    $lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
    , 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
    */
    ######################################################2 ตัว บน-ล่าง
    if (strlen($q_num) == 2 and $ttlot == 1) {
        for ($t1 = 1; $t1 <= 3; $t1++) {
            #	 $_SESSION[error][1][]="<span class='cr'>ล่าง=	if(".date("d-m-Y H:i:s",$re_ok[o_limit_time_lang]).">".date("d-m-Y H:i:s",$time_stam)."){ </span>";
			if ($t1 == 1) {
                $x_sum    = $q_sum1;
                $type_lot = 4;
            } else if ($t1 == 2) {
                    $x_sum    = $q_sum2;
                    $type_lot = 24;
			 } else if ($t1 == 3) {
				 if ($re_ok[o_limit_time_lang] > $time_stam) {
                    $x_sum    = $q_sum3;
                    $type_lot = 5;
                }
            } else {
				#exit();	
				$type_lot=0;
            }
			if($type_lot>0){	
            include("save_db.php");
			}
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
				#exit();	
				$type_lot=0;
            }
			if($type_lot>0){	
            include("save_db.php");
			}
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
				#exit();	
				$type_lot=0;
            }
			if($type_lot>0){	
            include("save_db.php");
			}
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
				#exit();	
				$type_lot=0;
            }
			if($type_lot>0){	
            include("save_db.php");
			}
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
				#exit();	
				$type_lot=0;
            }
			if($type_lot>0){	
            include("save_db.php");
			}
        } #		for($t1=1;$t1<=1;$t1++){
    } #if(strlen($q_num)==1 and $ttlot==2){
    /*
    $lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
    , 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
    */
    ######################################################2 ตัว บน-ล่าง
    if (strlen($q_num) == 2 and $ttlot == 3) {
        $num_root = $q_num;
        for ($t1 = 1; $t1 <= 3; $t1++) {
            if($t1==1){
                $q_num = $num_root;
                if (strpos($q_num, '*') !== false) {
                    $ar_root = str_split($q_num);
                    if($ar_root[0]!="*" and $ar_root[1]=="*"){
                            for($ri=0;$ri<10;$ri++){
                                $q_num = $ar_root[0].$ri;
                                $x_sum=$q_sum1;
                            $type_lot=4;
			if($type_lot>0){	
            include("save_db.php");
			}
                            }
                        }else if($ar_root[0]=="*" and $ar_root[1]!="*"){
                            for($ri=0;$ri<10;$ri++){
                                $q_num = $ri.$ar_root[1];
                                $x_sum=$q_sum1;
                            $type_lot=4;
                            if($type_lot>0){            
                                include("save_db.php");
                            }
                            }
                    }else{
				#exit();	
				$type_lot=0;
                    }
                }else{
                    $x_sum=$q_sum1;
                    $type_lot=4;
			if($type_lot>0){	
            include("save_db.php");
			}
                }
            }else if($t1==2){
                $q_num = $num_root;
                if($re_ok[o_limit_time_lang]>$time_stam){ 
                    if (strpos($q_num, '*') !== false) {
                        $ar_root = str_split($q_num);
                        if($ar_root[0]!="*" and $ar_root[1]=="*"){
                                for($ri=0;$ri<10;$ri++){
                                    $q_num = $ar_root[0].$ri;
                                    $x_sum=$q_sum2;
                                $type_lot=5;
			if($type_lot>0){	
            include("save_db.php");
			}
                                }
                        }else if($ar_root[0]=="*" and $ar_root[1]!="*"){
                                for($ri=0;$ri<10;$ri++){
                                    $q_num = $ri.$ar_root[1];
                                    $x_sum=$q_sum2;
                                $type_lot=5;
                                if($type_lot>0){            
                                    include("save_db.php");
                                }
                                }
                        }else{
				#exit();	
				$type_lot=0;
                        }
                    }else{
                        $x_sum=$q_sum2;
                        $type_lot=5;
			if($type_lot>0){	
            include("save_db.php");
			}
                    }
                }
              } else if ($t1 == 3) {
                $q_num = $num_root;
                $x_sum    = $q_sum3;
                            $type_lot = 24;
			if($type_lot>0){	
            include("save_db.php");
			}
            }else{
				#exit();	
				$type_lot=0;
            }
        } #		for($t1=1;$t1<=2;$t1++){
    } #	if(strlen($q_num)==2 and $ttlot==3){
    /*
    $lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
    , 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
    */
    ######################################################เลขวิ่ง
    if (strlen($q_num) == 1 and $ttlot == 4) {
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
				#exit();	
				$type_lot=0;
            }
			if($type_lot>0){	
            include("save_db.php");
			}
        } #for($t1=1;$t1<=2;$t1++){
    } #	if(strlen($q_num)==1 and $ttlot==4){
    /*
    $lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
    , 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
    */
    ######################################################แบบพิเศษ
    if ($ttlot == 5) {
        if ($i == 0) {
            $type_lot = 8;
			$x_sum = $q_sum1;
			if($type_lot>0){	
            include("save_db.php");
			}
        } else if ($i == 1) {
            $type_lot = 9;
			$x_sum = $q_sum1;
			if($type_lot>0){	
            include("save_db.php");
			}
        } else if ($i == 2) {
            $type_lot = 10;
			$x_sum = $q_sum1;
			if($type_lot>0){	
            include("save_db.php");
			}
        } else if ($i == 3) {
            if ($re_ok[o_limit_time_lang] > $time_stam) {
                $type_lot = 11;
            } else {
                $q_sum1 = 0;
            }
			$x_sum = $q_sum1;
			if($type_lot>0){	
            include("save_db.php");
			}
        } else if ($i == 4) {
            $type_lot = 12;
			$x_sum = $q_sum1;
			if($type_lot>0){	
            include("save_db.php");
			}
        } else if ($i == 5) {
            $type_lot = 13;
			$x_sum = $q_sum1;
			if($type_lot>0){	
            include("save_db.php");
			}
        } else if ($i == 6) {
            $type_lot = 14;
			$x_sum = $q_sum1;
			if($type_lot>0){	
            include("save_db.php");
			}
        } else if ($i == 7) {
            $type_lot = 15;
			$x_sum = $q_sum1;
			if($type_lot>0){	
            include("save_db.php");
			}
		} else if ($i == 8) {
            $type_lot = 21;
			$x_sum = $q_sum1;
			if($type_lot>0){	
            include("save_db.php");
			}
		} else if ($i == 9) {
            $type_lot = 22;
			$x_sum = $q_sum1;
			if($type_lot>0){	
            include("save_db.php");
			}
		} else if ($i == 10) {
            $type_lot = 23;
			$x_sum = $q_sum1;
			if($type_lot>0){	
            include("save_db.php");
			}
        }else{
			if(strlen($q_num)==2){
				for($t1=1;$t1<=2;$t1++){
					if($t1==1){
						$x_sum=$q_sum1;
						$type_lot=4;
					}else if($t1==2){
							if($re_ok[o_limit_time_lang]>$time_stam){ 
						$x_sum=$q_sum2;
						$type_lot=5;
							}
					  }
			if($type_lot>0){	
            include("save_db.php");
			}
				}
			}else if(strlen($q_num)==3){
				for($t1=1;$t1<=3;$t1++){
							if($t1==1){
								$x_sum=$q_sum1;
								$type_lot=1;
							}else if($t1==2){
								if($re_ok[o_limit_time_lang]>$time_stam){ 
								$x_sum=$q_sum2;
								$type_lot=2;
									}
							}else if($t1==3){
									$x_sum=$q_sum3;
								$type_lot=16;
							}
							
				
			if($type_lot>0){	
            include("save_db.php");
			}
				
				}
			}
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
				#exit();	
				$type_lot=0;
            }
			if($type_lot>0){	
            include("save_db.php");
			}
        } #for($t1=1;$t1<=3;$t1++){
    } #	if(strlen($q_num)==1 and $ttlot==7){	
    ##########################################################################################################################
} #for($i=0;$i<count($ar);$i++){
$count_step = count($count_num);
if ($count_step == 0) {
    ########################### ผิดพลาด
    $sql = "delete from bom_tb_lotto_hun_bill where bill_id='$reeb[bill_id]' and m_id='$_SESSION[mid]' and lot_zone='$_POST[zone]' and  lot_rob='$_POST[rob]'";
    sql_query($sql);
    $arr["res"] = 0;
} else {
    ########################### ถูกต้อง
  $sql = "update bom_tb_lotto_hun_bill set b_total='$_SESSION[count_sum]' , b_pay='$_SESSION[count_dis]', 	br_pay_1	='$_SESSION[count_dis1]', br_pay_2='$_SESSION[count_dis2]', 	br_pay_3	='$_SESSION[count_dis3]', br_pay_4='$_SESSION[count_dis4]'
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
