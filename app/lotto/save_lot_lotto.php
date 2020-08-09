<?php
$_POST['rob']=1;
$_POST['zone']=1;

$zone=1;
$rob=1;
$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
$re_ok=sql_array($sql);

$sql="select * from bom_tb_config where con_id=1";
$rec=sql_array($sql);
################OPEN BET maintenance 
/*$url_file="../../json/maintenance.json";	
$mm_js=file_get_contents2($url_file);
$jsmm = json_decode2($mm_js, true);*/
if($rec["con_service"]==0){

    $arr["Status"]     = "4";
    $arr["Msg"]        = $lang_member[1123]; //"กำลังอยู่ในการ ซ่อมบำรุง ประมาน 45 นาที";
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
    echo json_encode($arr);
    exit();
	}
	
################OPEN BET LOTTO 
/*$url_file="../../json/lotto.json";	
$op_js=file_get_contents2($url_file);
$jsop = json_decode2($op_js, true);*/
if($rec["con_open_lotto"]==0){
	
    $arr["Status"]     = "2";
    $arr["Msg"]        = $lang_member[1124]; //"ปิดรับพนัน";
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
    echo json_encode($arr);
     exit();
	}


##################### รับสูงสุด
$quota_lot=@explode(',',$rec['lot_over']);



require('get_mem.php');



################OPEN BET LOTTO ALL
if ($re_ok['o_limit_time'] < $time_stam) {
    $arr["Status"]     = "2";
    $arr["Msg"]        = $lang_member[317];
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok['ok_date'];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
    echo json_encode($arr);
	 exit();
}
if ($_SESSION['mid'] == "") {
    $arr["Status"]     = "2";
    $arr["Msg"]        = $lang_member[1126]." 1"; //"เกิดข้อผิดพลาดที่ไม่รู้จัก 1";
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
    echo json_encode($arr);
	 exit();
}
/*if ($uuid_mem != $uuid and $bf!="m") {
    $arr["Status"]     = "2";
    $arr["Msg"]        = $lang_member[1126]." 2"; //"เกิดข้อผิดพลาดที่ไม่รู้จัก 2";
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok[ok_date];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
    echo json_encode($arr);
	 exit();
}*/

$view_date=date("d-m-Y",$re_ok['o_limit_time']);
$view_date_bingo=date("Y-m-d H:i:s",$re_ok['o_limit_time']);

$bill_cus_name = mysql_escape_mimic(trim($_POST['pname']));
$bill_no = trim($_POST['pid']);

$arr             = array();
$arr_socket = array();
$arr_in_socket = array();

$sql="select * from bom_tb_member where m_id='".$_SESSION['mid']."'";
$re_m=sql_array($sql);
if($re_m['m_id']==""){  exit();}
if($re_m['m_count']<=0){$re_m['m_count']=0;}
$re_m['m_count']=intval($re_m['m_count']);

$setbet=$re_m['m_lotto_setbet'];

$_SESSION['xcount'] = $re_m['m_count'];
if ($re_m[m_count] <= 0) {
    $arr["Status"]     = "2";
    $arr["Msg"]        = $lang_member[633] . " : " . $re_m['m_count'];
    $arr["Licen"]      = "SC";
    $arr["LastLot"]    = $re_ok['ok_date'];
    $arr["CloseBig"]   = $re_ok["o_limit_time"];
    $arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
    echo json_encode($arr);
	 exit();
}

$strNum = str_replace('(', '', $strNum);
$strNum = str_replace(')', '', $strNum);
$ex     = explode(",", $strNum);

$sql="INSERT IGNORE INTO bom_tb_lotto_bill_live (
b_date,    b_timestam, b_datenow , m_id    ,b_ip   ,ok_id  ,lot_zone,  lot_rob, b_date_bingo, r_agent_id,b_map_lat,b_map_lon, b_web_from,b_name,b_no , bonus_m_id, r_id, com_af , b_setbet
) values(
'$view_date','$time_stam',now(),'".$_SESSION['mid']."','"._bIP()."','$re_ok[ok_id]','$zone','$rob' , '$view_date_bingo','$re_m[m_agent_id]' , '$lat' , '$lon' ,'$b_web_from', '$bill_cus_name', '$bill_no','$re_m[bonus_m_id]' , '".$_SESSION['cr_id']."' ,'$af_lotto','$setbet'
); ";
sql_query($sql);
$sql="select bill_id  from bom_tb_lotto_bill_live   where m_id='".$_SESSION['mid']."' and lot_zone='$zone' and  lot_rob='$rob'  order by bill_id desc limit 1";
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
$emax=@explode(',',$_SESSION['m1']['m_lotto_max']); 
$emin=@explode(',',$_SESSION['m1']['m_lotto_min']); 

for ($i = 0; $i < count($ex); $i++) {
    $reNum  = stripslashes($ex[$i]);
    $arnum  = explode("-", trim($reNum));
    $q_num  = str_replace('"', '', trim($arnum[0]));
    $q_sum1 = intval(str_replace('"', '', trim($arnum[1])));
    $q_sum2 = intval(str_replace('"', '', trim($arnum[2])));
    $q_sum3 = intval(str_replace('"', '', trim($arnum[3])));

    ######################################################3 ตัว บน-ล่าง
    if (strlen($q_num) == 3 and $ttlot == 1) {
        for ($t1 = 1; $t1 <= 3; $t1++) {
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
					$x_sum    = $q_sum3;
                    $type_lot = 2;
                }
            } else {	
				$type_lot=0;
            }
			if($type_lot>0){
                include("save_db.php");
			}
        } 
    } 

    ######################################################2 ตัว บน-ล่าง
    if (strlen($q_num) == 2 and $ttlot == 1) {
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
                    if (strpos($q_num, '*') !== false) {
                        $ar_root = str_split($q_num);
                        if($ar_root[0]!="*" and $ar_root[1]=="*"){
                                for($ri=0;$ri<10;$ri++){
                                    $q_num = $ar_root[0].$ri;
                                    $x_sum=$q_sum2;
                                $type_lot=13;
                                include("save_db.php");
                                }
                        }else{
                            $type_lot=0;
                        }
                    }else{
                        $x_sum=$q_sum2;
                        $type_lot=13;
			if($type_lot>0){
            include("save_db.php");
			}
                    }
              } else if ($t1 == 3) {
                $q_num = $num_root;
                if($re_ok[o_limit_time_lang]>$time_stam){ 
                    if (strpos($q_num, '*') !== false) {
                        $ar_root = str_split($q_num);
                        if($ar_root[0]!="*" and $ar_root[1]=="*"){
                                for($ri=0;$ri<10;$ri++){
                                    $q_num = $ar_root[0].$ri;
                                    $x_sum=$q_sum3;
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
                        $x_sum=$q_sum3;
                        $type_lot=5;
			if($type_lot>0){
            include("save_db.php");
			}
                    }
                }
            }else{
				$type_lot=0;
            }
        } 
    } 
    
    ######################################################วิ่ง บน-ล่าง
    if (strlen($q_num) == 1 and $ttlot == 1) {
        for ($t1 = 1; $t1 <= 2; $t1++) {
            if ($t1 == 1) {
                $x_sum    = $q_sum1;
                $type_lot = 6;
            } else if ($t1 == 2) {
                if ($re_ok[o_limit_time_lang] > $time_stam) {
                    $x_sum    = $q_sum3;
                    $type_lot = 7;
                }
            } else {
				#exit();	
				$type_lot=0;
            }
			if($type_lot>0){
            include("save_db.php");
			}
        } 
    } 
    
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
            include("save_db.php");
			}
        } 
    } 
    
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
        } 
    } 
    
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
        } 
    } 
    
    ######################################################2 ตัว บน-ล่าง-โต๊ด
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
				
$num_up=array( substr($q_num, -2,1),  substr($q_num, -1,1));
sort($num_up);
$q_num3=$num_up[0].$num_up[1];	
				
            } else {	
				$type_lot=0;
            }
			if($type_lot>0){
            include("save_db.php");
			}
        } 
    } 

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
				############ตรวจสอบเลขซ้ำของ 3ใน4
				$arr_num_check = str_split($q_num);
				$cnt_array = array_count_values($arr_num_check);
				$sduplicate = 0;
				$res = array();
				foreach($cnt_array as $keyc=>$valc){
					if($valc>1){
						$sduplicate = 1;
						break;
					}
				}
				if($sduplicate==0){
					$type_lot = 14;
				}else{
					$type_lot = 0;
				}
			} else if (strlen($q_num) == 5 and $q_sum2==12) {
				############ตรวจสอบเลขซ้ำของ 3ใน5
				$arr_num_check = str_split($q_num);
				$cnt_array = array_count_values($arr_num_check);
				$sduplicate = 0;
				$res = array();
				foreach($cnt_array as $keyc=>$valc){
					if($valc>1){
						$sduplicate = 1;
						break;
					}
				}
				if($sduplicate==0){
					$type_lot = 15;
				}else{
					$type_lot = 0;
				}
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
            include("save_db.php");
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
							}else if($t1==2){
								if($re_ok[o_limit_time_lang]>$time_stam){ 
									$x_sum=$q_sum2;
									$type_lot=5;
								}
							} else{
				#exit();	
				$type_lot=0;
							}
			if($type_lot>0){
            include("save_db.php");
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
								}
							}else if($t1==3){
								$x_sum=$q_sum3;
								$type_lot=16;
							} else{
				#exit();	
				$type_lot=0;
							}
			if($type_lot>0){
            include("save_db.php");
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
            include("save_db.php");
			}
					$x_sum=$q_sum3;
					$type_lot=4;
					$q_num = $ni2."".$ni1;
			if($type_lot>0){
            include("save_db.php");
			}
					
					$ni1++;
					$ni2++;
				}
			}else if($q_sum2==16){
				if($re_ok[o_limit_time_lang]>$time_stam){ 
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
            include("save_db.php");
			}
						$x_sum=$q_sum3;
						$type_lot=5;
						$q_num = $ni2."".$ni1;
			if($type_lot>0){
            include("save_db.php");
			}
						
						$ni1++;
						$ni2++;
					}
				}
			}else if($q_sum2==17){
				for($ip2 = 0;$ip2<10;$ip2++){
					$x_sum=$q_sum3;
					$type_lot=4;
					$q_num = $ip2."".$ip2;
			if($type_lot>0){
            include("save_db.php");
			}
				}
			}else if($q_sum2==18){
				for($ip2 = 0;$ip2<10;$ip2++){
					$x_sum=$q_sum3;
					$type_lot=5;
					$q_num = $ip2."".$ip2;
			if($type_lot>0){
            include("save_db.php");
			}
				}
			}
		}
    } 

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
        } 
    } 
    ##########################################################################################################################
} 
$count_step = count($count_num);


if ($count_step == 0) {
    ########################### ผิดพลาด
    $sql = "delete from bom_tb_lotto_bill_live where bill_id='$reeb[bill_id]' and m_id='$_SESSION[mid]' and lot_zone='$_POST[zone]' and  lot_rob='$_POST[rob]'";
    sql_query($sql);
	$arr["Status"] = "3";
	$arr["Licen"] = "SC";
	$arr["Msg"] = $lang_member[68]; //"E302 !!!ผิดพลาดไม่มีการบันทึก";
	$arr["LastLot"] = $re_ok[ok_date];
	$arr["CloseBig"] = $re_ok["o_limit_time"];
	$arr["CloseSmall"] = $re_ok["o_limit_time_lang"];
	
} else {
    ########################### ถูกต้อง
    $sql = "update bom_tb_lotto_bill_live set b_total='$_SESSION[count_sum]' , b_pay='$_SESSION[count_dis]', 	br_pay_1	='$_SESSION[count_dis1]', br_pay_2='$_SESSION[count_dis2]', 	br_pay_3	='$_SESSION[count_dis3]', br_pay_4='$_SESSION[count_dis4]'
	 where bill_id='$reeb[bill_id]' and m_id='$_SESSION[mid]' and lot_zone='$_POST[zone]' and  lot_rob='$_POST[rob]' ";
    sql_query($sql);


    $rs_ag = sql_array("select r_agent_id , r_user from bom_tb_agent where r_id = '$re_m[r_id]'");

    $log_sum = $re_m[m_count]-$_SESSION[count_dis];
    ######################LOG ใหม่
    $sql="INSERT IGNORE INTO bom_tb_all_payment (
    bap_date, bap_ip,   bap_type    ,m_id   ,r_id,  m_agent_id, r_agent_id, 
    bap_before, bap_out ,bap_after,bap_comment,
    bill_id,bap_play_type,bap_zone,bap_rob,
    bap_code,bap_by_type,bap_by_id) values(
    now(),'"._bIP()."', '3', '$re_m[m_id]','$re_m[r_id]','$re_m[m_agent_id]','$rs_ag[r_agent_id]',
    '$re_m[m_count]' ,'-$_SESSION[count_dis]','$log_sum','สมาชิกพนันหวย',
    '$reeb[bill_id]' , 2 , $zone , $rob ,
    'MPB',1,'$_SESSION[m_id]') ";
    sql_query($sql);    
    ######################LOG ใหม่ 


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
	
	$arr["txtBillId"] = $lang_member[568]." ".$lang_member[706]." ".$reeb[bill_id];
	$arr["txtLastLot"] = $lang_member[569]." "._cvf($re_ok[o_limit_time] , 3 , $lang_post);
	$arr["txtDateTime"] = $lang_member[106]." "._cvf(time() , 3 , $lang_post)." ".$lang_member[303]." ".date("H.i");
	$arr["txtBranch"] = $lang_member[571]." : [".$rs_ag["r_user"]."]";
	$arr["txtUser"] = $lang_member[573]." : [".$re_m["m_user"]."]";
	$arr["txtTotal"] = $lang_member[503]." ".number_format($_SESSION[count_sum3t])." ".$re_m['m_currency'];
	$arr["txtName"] = $lang_member[118]." : ".$bill_cus_name;
	$arr["txtNo"] = $lang_member[574]." : ".$bill_no;
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
