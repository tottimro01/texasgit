<?php 	

include "save_lotto_checkStatus.php";

$bf            = trim($_POST["bf"]);   /* android */
$lat           = trim($_POST["lat"]);  ##
$lon           = trim($_POST["lon"]); ##
$lat = trim($_POST["lat"]);  ##
$lon = trim($_POST["lon"]); ##

$strNum = trim($_POST["txt"]);
$mid           = trim($_POST["mid"]);
$_POST["zone"] = trim($_POST["zone"]);
$_POST["rob"]  = trim($_POST["rob"]);
$bill_cus_name = mysql_escape_mimic(trim($_POST['mname']));
$bill_no = trim($_POST['poy_num']);


$strNum = str_replace('(', '', $strNum);
$strNum = str_replace(')', '', $strNum);
$ex     = explode(",", $strNum);


$test[ex] = $ex;

for ($i = 0; $i < count($ex); $i++) {   ######## for ($i = 0; $i < count($ex); $i++) { 

	$reNum  = stripslashes($ex[$i]);
  $arnum  = explode("-", trim($reNum));
  $q_num  = str_replace('"', '', trim($arnum[0]));
  $q_sum1 = intval(str_replace('"', '', trim($arnum[1])));
  $q_sum2 = intval(str_replace('"', '', trim($arnum[2])));
  $q_sum3 = intval(str_replace('"', '', trim($arnum[3])));

  if ($ttlot == "extra") {
  	$test[q_sum2][] = $q_sum2;
  	$test[q_num][] = $q_num;

  	if ($q_sum2<13) { // หน้าพิเศษ
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
							if(strlen($q_num)==2)
							{
								for($t1=1;$t1<=2;$t1++)
								{
									if($t1==1){
										$x_sum=$q_sum1;
										$type_lot=4;
									}else if($t1==2){
										if($re_ok[o_limit_time_lang]>$time_stam){ 
											$x_sum=$q_sum2;
											$type_lot=5;
										}
									}else{
										#exit();	
										$type_lot=0;
									}
									if(
										$type_lot>0){
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


		 }  // หน้าพิเศษ อื่นๆ   
  }
} ######## for ($i = 0; $i < count($ex); $i++) { 	



$count_step=@count($count_num);
if($count_step==0){
  ########################### ผิดพลาด
  $sql="delete from bom_tb_lotto_bill_live where bill_id='$reeb[bill_id]' and m_id='".$_SESSION['m_id']."' and lot_zone='$zone' and  lot_rob='$rob'";
  sql_query($sql);
  $arr["res"]=0;
  // $_SESSION['error'][1][] = "<br><b style=\" float:right; color: #000;\">".$lang_member[503]." <span class=\"cr\"> 0</span> ".$_SESSION['m1']['m_currency']."</b>";

  $arr["txt"] =  $arr["txt"] = "<br><b style=\" float:right; color: #000;\">".$lang_member[68]."</b><br>";
  $total = 0;
  $status = 0;
}else{
  ########################### ถูกต้อง
  $sql="update IGNORE  bom_tb_lotto_bill_live set b_total='$_SESSION[count_sum]' , b_pay='$_SESSION[count_dis]'
,   br_pay_1  ='$_SESSION[count_dis1]', br_pay_2='$_SESSION[count_dis2]',   br_pay_3  ='$_SESSION[count_dis3]', br_pay_4='$_SESSION[count_dis4]'
,   br_pay_5  ='$_SESSION[count_dis5]', br_pay_6='$_SESSION[count_dis6]',   br_pay_7  ='$_SESSION[count_dis7]', br_pay_8='$_SESSION[count_dis8]'
   where bill_id='$reeb[bill_id]'  and m_id='".$_SESSION['m_id']."' and lot_zone='$zone' and  lot_rob='$rob'";
  sql_query($sql);



  $rs_ag = sql_array("select r_agent_id from bom_tb_agent where r_id = '$re_m[r_id]'");

  $log_sum = $re_m[m_count]-$_SESSION[count_dis];
  ######################LOG ใหม่
  $sql="INSERT IGNORE INTO bom_tb_all_payment (
  bap_date, bap_ip, bap_type  ,m_id ,r_id,  m_agent_id, r_agent_id, 
  bap_before, bap_out ,bap_after,bap_comment,
  bill_id,bap_play_type,bap_zone,bap_rob,
  bap_code,bap_by_type,bap_by_id) values(
  now(),'"._bIP()."', '3', '$re_m[m_id]','$re_m[r_id]','$re_m[m_agent_id]','$rs_ag[r_agent_id]',
  '$re_m[m_count]' ,'-$_SESSION[count_dis]','$log_sum','สมาชิกพนันหวย',
  '$reeb[bill_id]' , 2 , $zone , $rob ,
  'MPB',1,'$_SESSION[m_id]') ";
  sql_query($sql);  
  ######################LOG ใหม่ 


  
  $sql="update IGNORE    bom_tb_member  set m_count=m_count-$_SESSION[count_dis]   where m_id='".$_SESSION['m_id']."'";
  sql_query($sql);


  $arr["res"]=1;

  // $_SESSION['error'][1][] = "<br><b style=\" float:right; color: #000;\">".$lang_member[503]." <span class=\"cr\"> ".number_format($_SESSION['count_sum3t'])."</span> ".$_SESSION['m1']['m_currency']."</b>";
  $total = number_format($_SESSION['count_sum3t']);
   $status = 1;
  if($re_m['m_sport_print']==1){
    //$_SESSION['error'][1][] .= "<br /><div><a href=\"javascript:void(0)\" style=\"color: #333;float: right;font-weight: bold;text-decoration: none;\" onclick=\"parent.leftx.billPrintPopup($zone);\"><img src=\"img/printer.png\" style=\"width: 15px;margin-right: 4px;vertical-align: middle;\">$lang_member[512]</a></div>";

    // $_SESSION['error'][1][] .= "<br /><div><a href=\"javascript:void(0)\" style=\"color: #333;float: right;font-weight: bold;text-decoration: none;\" onclick=\"MM_openBrWindow('print_bill_lotto.php?id=".$reeb['bill_id']."' , '' , 'scrollbars=yes,resizable=yes,width=350,height=450');\"><img src=\"img/printer.png\" style=\"width: 15px;margin-right: 4px;vertical-align: middle;\">$lang_member[512]</a></div>";
  }
}

/*if($_SESSION['m_print_slip']==1){
 $_SESSION['error'][1][]='<br><b class="cbu cu" style="float:right;" onclick=MM_openBrWindow("print_bill_lotto.php?id='.$reeb['bill_id'].'","","scrollbars=yes,resizable=yes,width=350,height=450"); ><img src="img/icon2.png" > '.$lang_member[512].'</b>';
}*/

for($e=0;$e<count($_SESSION['error'][1]);$e++){
  $arr["txt"] .= $_SESSION['error'][1][$e]."<br>";
}

$result = array(
       'message' =>  $arr["txt"], 
       'bill_cus_name' => $bill_cus_name, 
       'bill_no' => $bill_no, 
       'bill_id' => $reeb['bill_id'], 
       'lesson' => $_POST['lesson'], 
       'close_time' => $_POST['close_time'], 
       'branch' => $_SESSION['r1']['r_user'], 
       'saler' => $_SESSION['m_user'], 
       'total' => $total, 
       'time' => date("H:i",time()), 
       'date' => _cvf(time(), 3 , $lang), 
       'currency' => $_SESSION['m1']['m_currency'], 
       'test' => $test, 
);
echo json_encode(array('status' => $status, 'result' => $result));