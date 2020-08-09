<?php
$url_file1 = "../../json/lotto/ok/ok_".$_POST[zone]."_".$_POST[rob].".json";
$date_js   = file_get_contents2($url_file1);
$date_bet  = json_decode2($date_js, true);
$re_ok     = $date_bet[0];

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

################OPEN BET maintenance 
$url_file="../../json/maintenance.json";	
$mm_js=file_get_contents2($url_file);
$jsmm = json_decode2($mm_js, true);
if($jsmm["open"]==0){

    $arr["Status"]     = "4";
    $arr["Msg"]        =  $lang_g['Msg'][1];   /*"กำลังอยู่ในการ ซ่อมบำรุง ประมาน 45 นาที";*/
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time"];
    echo json_encode($arr);
    exit();
	}
	
################OPEN BET LOTTO 
$url_file="../json/lotto_hun.json";	
$op_js=file_get_contents2($url_file);
$jsop = json_decode2($op_js, true);
if($jsop["open"]==0){
	
    $arr["Status"]     = "2";
    $arr["Msg"]        = $lang_g['Msg'][2]; /*"ปิดรับพนัน";*/
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time"];
    echo json_encode($arr);
     exit();
	}

$url_file="../../json/lotto_hun_new.json";	
$op_js=file_get_contents2($url_file);
$jsop = json_decode2($op_js, true);
$ex_jsop = explode("," , $jsop["open"]);
if($ex_jsop[$_POST[zone]]==0){
	$arr["Status"]     = "2";
    $arr["Msg"]        = $lang_g['Msg'][2]; /*"ปิดรับพนัน";*/
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time"];
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
    //$arr["Msg"]        = $lang_g['Msg'][5]; /*"ปิดรับพนัน\nกลางเดือน เปิดรับวันที่ 10-16\nปลายเดือน เปิดรับวันที่ 25-01\nเวลาปิดรับ 15:20";*/
	$arr["Msg"]        = $lang_g['Msg'][2];
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time"];
    echo json_encode($arr);
    exit();
}



if ($re_ok[o_limit_time] < $time_stam) {
    $arr["Status"]     = "2";
    $arr["Msg"]        = $lang_lot[19];
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time"];
    echo json_encode($arr);
	 exit();
}
if ($_SESSION['mid'] == "") {
    $arr["Status"]     = "2";
    $arr["Msg"]        = $lang_g['Msg'][4]." 1"; /*"เกิดข้อผิดพลาดที่ไม่รู้จัก 1";*/
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time"];
    echo json_encode($arr);
	 exit();
}
if ($uuid_mem != $uuid and $bf!="m") {
    $arr["Status"]     = "2";
    $arr["Msg"]        = $lang_g['Msg'][4]." 2"; /*"เกิดข้อผิดพลาดที่ไม่รู้จัก 2";*/
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time"];
    echo json_encode($arr);
	 exit();
}



################Config Admin
$url_file="../../json/config/admin/Lotto_hunMaxReceive_".$_POST[zone]."_".$_POST[rob].".json";	
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

    $arr["Status"]     = "2";
    $arr["Msg"]        =  $lang_g['Msg'][6]; //"E55-ติดต่อผู้ดูแล";
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time"];
    echo json_encode($arr);
	 exit();
 }
 if(intval($lot_r4[r_active_bet])==0){ 
    $arr["Status"]     = "2";
    $arr["Msg"]        = $lang_g['Msg'][7]; //"E54-ติดต่อผู้ดูแล";
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time"];
    echo json_encode($arr);
	 exit();
 }
  if(intval($lot_r3[r_active_bet])==0){ 
    $arr["Status"]     = "2";
    $arr["Msg"]        = $lang_g['Msg'][8]; //"E53-ติดต่อผู้ดูแล";
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time"];
    echo json_encode($arr);
	 exit();
 }
  if(intval($lot_r2[r_active_bet])==0){ 
    $arr["Status"]     = "2";
    $arr["Msg"]        = $lang_g['Msg'][9]; //"E52-ติดต่อผู้ดูแล";
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time"];
    echo json_encode($arr);
	 exit();
 }
  if(intval($lot_r1[r_active_bet])==0){ 
    $arr["Status"]     = "2";
    $arr["Msg"]        = $lang_g['Msg'][10]; //"E51-ติดต่อผู้ดูแล";
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time"];
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
    $arr["CloseSmall"] = $re_ok["o_limit_time"];
    echo json_encode($arr);
	 exit();
}

$strNum = str_replace('(', '', $strNum);
$strNum = str_replace(')', '', $strNum);
$ex     = explode(",", $strNum);

$sql    = "INSERT IGNORE INTO bom_tb_lotto_hun_bill_live (b_date,	b_timestam,	b_datenow ,	m_id	,b_ip	,ok_id	,lot_zone,	lot_rob, b_date_bingo, r_agent_id,b_map_lat,b_map_lon,b_bet_from,b_name,b_no
) values(
'$view_date','$time_stam',now(),'$_SESSION[mid]','" . _bIP() . "','$re_ok[ok_id]','$_POST[zone]','$_POST[rob]' , '$view_date_bingo','$_SESSION[r_agent_id]'  , '$lat' , '$lon','$bf', '$bill_cus_name', '$bill_no'
)";
sql_query($sql);
$sql                  = "select bill_id  from bom_tb_lotto_hun_bill_live   where m_id='$_SESSION[mid]' and lot_zone='$_POST[zone]' and  lot_rob='$_POST[rob]'  order by bill_id desc limit 1";
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
				
$num_up=array(substr($q_num, -3,1), substr($q_num, -2,1),  substr($q_num, -1,1));
sort($num_up);
$q_num3=$num_up[0].$num_up[1].$num_up[2];
				
            } else if ($t1 == 3) {
                if ($re_ok[o_limit_time_lang] > $time_stam) {
                   # $x_sum    = $q_sum3/2;
					 $x_sum    = $q_sum3;
                    $type_lot = 2;
                }else{
					$type_lot=0;
				}
            } else {
				#exit();	
				$type_lot=0;
            }
			if($type_lot>0){
            include("save_db_hun.php");
			}
			
############################3ล่างหน้า
if($type_lot==2){
				$x_sum    = $q_sum3/2;
				$type_lot=17;
if($type_lot>0){			
#include("save_db_hun.php");
}
}
############################3ล่างหน้า	
			
        } #	for($t1=1;$t1<=3;$t1++){
    } #if(strlen($q_num)==3 and $ttlot==1){
    /*
    $lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
    , 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
    */
	######################################################4 ตัว บน-โต๊ด
    if (strlen($q_num) == 4 and $ttlot == 1) {
        for ($t1 = 1; $t1 <= 3; $t1++) {
            #	 $_SESSION[error][1][]="<span class='cr'>ล่าง=	if(".date("d-m-Y H:i:s",$re_ok[o_limit_time_lang]).">".date("d-m-Y H:i:s",$time_stam)."){ </span>";
            if ($t1 == 1) {
                $x_sum    = $q_sum1;
                $type_lot = 25;
            } else if ($t1 == 2) {
                $x_sum    = $q_sum2;
                $type_lot = 26;
				
$num_up=array(substr($q_num, -4,1),substr($q_num, -3,1), substr($q_num, -2,1),  substr($q_num, -1,1));
sort($num_up);
$q_num3=$num_up[0].$num_up[1].$num_up[2].$num_up[3];
				
            } else if ($t1 == 3) {
				$type_lot=0;
            } else {
				#exit();	
				$type_lot=0;
            }
			if($type_lot>0){
            	include("save_db_hun.php");
			}
        } #	for($t1=1;$t1<=3;$t1++){
    } #if(strlen($q_num)==3 and $ttlot==1){
    /*
    $lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
    , 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
    */
    ######################################################2 ตัว บน-ล่าง
    if (strlen($q_num) == 2 and $ttlot == 1) {
        $num_root = $q_num;

        for ($t1 = 1; $t1 <= 3; $t1++) {
            #	 $_SESSION[error][1][]="<span class='cr'>ล่าง=	if(".date("d-m-Y H:i:s",$re_ok[o_limit_time_lang]).">".date("d-m-Y H:i:s",$time_stam)."){ </span>";
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
            include("save_db_hun.php");
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
            include("save_db_hun.php");
			}
                }
            }else if($t1==2){
                $q_num = $num_root;
                    if (strpos($q_num, '*') !== false) {
                        $ar_root = str_split($q_num);
                        if($ar_root[0]!="*" and $ar_root[1]=="*"){
                                for($ri=0;$ri<10;$ri++){
                                    $q_num = $ar_root[0].$ri;
                                    $x_sum=$q_sum2;
                                $type_lot=13;
                                include("save_db_hun.php");
                                }
                        }else{
                            $type_lot=0;
                        }
                    }else{
                        $x_sum=$q_sum2;
                        $type_lot=13;
			if($type_lot>0){
            include("save_db_hun.php");
			}
                    }
              } else if ($t1 == 3 and $_POST[zone]!=19) {
                $q_num = $num_root;
                    if (strpos($q_num, '*') !== false) {
                        $ar_root = str_split($q_num);
                        if($ar_root[0]!="*" and $ar_root[1]=="*"){
                                for($ri=0;$ri<10;$ri++){
                                    $q_num = $ar_root[0].$ri;
                                    $x_sum=$q_sum3;
                                    $type_lot=5;
			if($type_lot>0){
            include("save_db_hun.php");
			}
                                }
                        }else{
				#exit();	
				$type_lot=0;
                        }
                    }else{
                        $x_sum=$q_sum3;
                        $type_lot=5;
			if($type_lot>0){
            include("save_db_hun.php");
			}
                    }
               
            }else{
				#exit();	
				$type_lot=0;
            }






            /*if ($t1 == 1) {
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
                exit();
            }
            include("save_db_hun.php");*/
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
            } else if ($t1 == 2 and $_POST[zone]!=19) {
                    $x_sum    = $q_sum3;
                    $type_lot = 7;
       
            } else {
				#exit();	
				$type_lot=0;
            }
			if($type_lot>0){
            include("save_db_hun.php");
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
				
$num_up=array(substr($q_num, -3,1), substr($q_num, -2,1),  substr($q_num, -1,1));
sort($num_up);
$q_num3=$num_up[0].$num_up[1].$num_up[2];
				
				
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
            include("save_db_hun.php");
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
            include("save_db_hun.php");
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
            include("save_db_hun.php");
			}
        } #		for($t1=1;$t1<=1;$t1++){
    } #if(strlen($q_num)==1 and $ttlot==2){
    /*
    $lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
    , 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
    */
    ######################################################2 ตัว บน-ล่าง-โต๊ด
    if (strlen($q_num) == 2 and $ttlot == 3) {
        for ($t1 = 1; $t1 <= 3; $t1++) {
            if ($t1 == 1) {
                $x_sum    = $q_sum1;
                $type_lot = 4;
            } else if ($t1 == 2 and $_POST[zone]!=19) {
                    $x_sum    = $q_sum2;
                    $type_lot = 5;
			} else if ($t1 == 3) {
				$x_sum    = $q_sum3;
                $type_lot = 24;
				
$num_up=array( substr($q_num, -2,1),  substr($q_num, -1,1));
sort($num_up);
$q_num3=$num_up[0].$num_up[1];	
				
            } else {
				#exit();	
				$type_lot=0;
            }
			if($type_lot>0){
            include("save_db_hun.php");
			}
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
            include("save_db_hun.php");
        } #for($t1=1;$t1<=2;$t1++){
    }*/ #	if(strlen($q_num)==1 and $ttlot==4){
    /*
    $lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
    , 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
    */
    ######################################################แบบพิเศษ
    if ($ttlot == 4) {
		if ($q_sum2<13) {
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
			} else if (strlen($q_num) == 4 and $q_sum2==11) {
				$type_lot = 14;
			} else if (strlen($q_num) == 5 and $q_sum2==12) {
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
			if($type_lot>0){
            include("save_db_hun.php");
			}
			}
		}else{
			$q_sum4 = intval(str_replace('"', '', trim($arnum[4])));
			$q_sum5 = intval(str_replace('"', '', trim($arnum[5])));
			if (strlen($q_num) == 1 and $q_sum2==13) {
				$arr_li = array();
				for($li=0;$li<10;$li++){
					$arr_li[] = $li."".$q_num.",".$q_sum3.",".$q_sum4;
					$arr_li[] = $q_num."".$li.",".$q_sum3.",".$q_sum4;
				}
				$arr_li = array_unique($arr_li);
				foreach ($arr_li as &$value) {
					$ex_li = explode("," , $value);
					$q_num=trim($ex_li[0]);	
					$q_sum1=intval(str_replace(",","",trim($ex_li[1])));
					$q_sum2=intval(str_replace(",","",trim($ex_li[2])));
					if(strlen($q_num)==2){
						for($t1=1;$t1<=2;$t1++){
							if($t1==1){
								$x_sum=$q_sum1;
								$type_lot=4;
							}else if($t1==2 and $_POST[zone]!=19){
									$x_sum=$q_sum2;
									$type_lot=5;
							} else{
				#exit();	
				$type_lot=0;
							}
			if($type_lot>0){
            include("save_db_hun.php");
			}
						}
					}
				}
			}else if(strlen($q_num) == 3 and $q_sum2==14){
				$output = array();
				$ele_amnt = factorial($q_num);
				foreach ($ele_amnt as &$value) {
					$output[] = $value.",".$q_sum3.",".$q_sum4.",".$q_sum5;
				}
				
				foreach ($output as &$value) {
					$ex_li = explode("," , $value);
					$q_num=trim($ex_li[0]);	
					$q_sum1=intval(str_replace(",","",trim($ex_li[1])));
					$q_sum2=intval(str_replace(",","",trim($ex_li[2])));
					$q_sum3=intval(str_replace(",","",trim($ex_li[3])));
					if(strlen($q_num)==3){
						for($t1=1;$t1<=3;$t1++){
							if($t1==1){
								$x_sum=$q_sum1;
								$type_lot=1;
							}else if($t1==2){
								if($re_ok[o_limit_time_lang]>$time_stam){ 
									$x_sum=$q_sum2;
									$type_lot=2;
								}else{
									$type_lot=0;
								}
							}else if($t1==3){
								$x_sum=$q_sum3;
								$type_lot=16;
							} else{
				#exit();	
				$type_lot=0;
							}
			if($type_lot>0){
            include("save_db_hun.php");
			}
						}
					}
				}
			}else if($q_sum2==15){
				$ni1 = 0;
				$ni2 = 1;
				for($ip2=1;$ip2<=10;$ip2++){
					if($ni2>9){
						$ni2 = 0;	
					}
					$x_sum=$q_sum3;
					$type_lot=4;
					$q_num = $ni1."".$ni2;
			if($type_lot>0){
            include("save_db_hun.php");
			}
					$x_sum=$q_sum3;
					$type_lot=4;
					$q_num = $ni2."".$ni1;
			if($type_lot>0){
            include("save_db_hun.php");
			}
					
					$ni1++;
					$ni2++;
				}
			}else if($q_sum2==16 and $_POST[zone]!=19){
					$ni1 = 0;
					$ni2 = 1;
					for($ip2=1;$ip2<=10;$ip2++){
						if($ni2>9){
							$ni2 = 0;	
						}
						$x_sum=$q_sum3;
						$type_lot=5;
						$q_num = $ni1."".$ni2;
			if($type_lot>0){
            include("save_db_hun.php");
			}
						$x_sum=$q_sum3;
						$type_lot=5;
						$q_num = $ni2."".$ni1;
			if($type_lot>0){
            include("save_db_hun.php");
			}
						
						$ni1++;
						$ni2++;
					}
				
			}else if($q_sum2==17){
				for($ip2 = 0;$ip2<10;$ip2++){
					$x_sum=$q_sum3;
					$type_lot=4;
					$q_num = $ip2."".$ip2;
			if($type_lot>0){
            include("save_db_hun.php");
			}
				}
			}else if($q_sum2==18 and $_POST[zone]!=19){
				for($ip2 = 0;$ip2<10;$ip2++){
					$x_sum=$q_sum3;
					$type_lot=5;
					$q_num = $ip2."".$ip2;
			if($type_lot>0){
            include("save_db_hun.php");
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
            include("save_db_hun.php");
			}
        } #for($t1=1;$t1<=3;$t1++){
    } #	if(strlen($q_num)==1 and $ttlot==7){	
	
	###########################################เลขชุด
    if (strlen($q_num) == 4 and $ttlot == 5) {
        
            $x_sum    = $price_laoset; //ราคาชุดละ
            $type_lot = 27;
		
		$r1pay[$type_lot] = 1;
		$r2pay[$type_lot] = 1;
		$r3pay[$type_lot] = 1;
		$r4pay[$type_lot] = 1;
		$hpay[$type_lot] = 1;
		
		$r1dis[$type_lot] = 0; 
		$r2dis[$type_lot] = 0; 
		$r3dis[$type_lot] = 0; 
		$r4dis[$type_lot] = 0; 
		$hdis[$type_lot] = 0; 
		
		
		//$dddd = $x_sum."ssss".$type_lot;
            
			if($type_lot>0){
            include("save_db_hun.php");
			}
       #for($t1=1;$t1<=3;$t1++){
    } #	if(strlen($q_num)==1 and $ttlot==7){	
	
	
	
    ##########################################################################################################################
} #for($i=0;$i<count($ar);$i++){
$count_step = count($count_num);


if ($count_step == 0) {
    ########################### ผิดพลาด
    $sql = "delete from bom_tb_lotto_hun_bill_live where bill_id='$reeb[bill_id]' and m_id='$_SESSION[mid]' and lot_zone='$_POST[zone]' and  lot_rob='$_POST[rob]'";
    sql_query($sql);
	$arr["Status"] = "3";
	$arr["Licen"] = "SC";
	$arr["Msg"] = $lang_g['Msg'][11]; //"E302 !!!ผิดพลาดไม่มีการบันทึก";
	$arr["LastLot"] = $re_ok[ok_date];
	$arr["CloseBig"] = $re_ok["o_limit_time"];
	$arr["CloseSmall"] = $re_ok["o_limit_time"];
	
	
	
} else {
    ########################### ถูกต้อง
    $sql = "update bom_tb_lotto_hun_bill_live set b_total='$_SESSION[count_sum]' , b_pay='$_SESSION[count_dis]', 	br_pay_1	='$_SESSION[count_dis1]', br_pay_2='$_SESSION[count_dis2]', 	br_pay_3	='$_SESSION[count_dis3]', br_pay_4='$_SESSION[count_dis4]'
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
		$arr["CloseSmall"] = $re_ok["o_limit_time"];
	
	
	if($_POST["zone"]==18){
		$name_bill = $lang_g['lotZone'][$_POST["zone"]]." ".$lang_g['_rob']." ".$_POST["rob"];
	}else if($_POST["zone"]==19){
		$name_bill = $lang_g['lotZone'][$_POST["zone"]]." ".$lang_m[40]." ".$lot_robmun[$_POST["rob"]];
	}else{
		if($lot_zone_bet[$_POST["zone"]]>1){
			$name_bill = $lang_g['lotZone'][$_POST["zone"]].$lot_rob[$_POST["rob"]];
		}else{
			$name_bill = $lang_g['lotZone'][$_POST["zone"]];
		}
	}
	
	$arr["txtBillId"] = $name_bill." ".$lang_m[39]." ".$reeb[bill_id];
	$arr["txtLastLot"] = $lang_lot[119]." "._cvf($re_ok[o_limit_time] , 3 , $lang_post);
	$arr["txtDateTime"] = $lang_m[23]." "._cvf(time() , 3 , $lang_post)." ".$lang_m[9]." ".date("H.i");
	$arr["txtBranch"] = $lang_lot[120]." : ".$re_g["r_name"]."[".$re_g["r_user"]."]";
	$arr["txtUser"] = $lang_lot[121]." : ".$re_m["m_name"]."[".$re_m["m_user"]."]";
	if($_POST[zone]==3 and $ttlot==5){
		$arr["txtTotal"] = $lang_lot[113]." ".number_format($_SESSION[count_sum3t])." ".$lang_g["text"]["count"];
	}else{
		$arr["txtTotal"] = $lang_lot[71]." ".number_format($_SESSION[count_sum3t])." ".$lang_lot[72];
	}
	$arr["txtName"] = $lang_lot[122]." : ".$bill_cus_name;
	$arr["txtNo"] = $lang_lot[123]." : ".$bill_no;
	
	
	
	//$arr["logs"] = $logxxpp;
	
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

?>
