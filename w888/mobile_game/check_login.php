<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
require('../inc/function.php');
require('../inc/function2.php');


if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}
if($_SESSION[bocklogin]>=5){
      echo"<script language='JavaScript'> top.document.location='block_login.html';</script>";
     exit();
}


################OPEN BET maintenance 
$url_file="../json/maintenance.json";	
$mm_js=file_get_contents2($url_file);
$jsmm = json_decode2($mm_js, true);
if($jsmm["open"]==0){

      echo"<script language='JavaScript'>
         top.document.location='maintenance.html';
      </script>";
	 	exit(); 

	}
	

$ar_user = $_REQUEST['cuser'];    
$ar_pass = $_REQUEST['cpass'];    
$_POST[l_user]=trim(strtolower($ar_user));
$_POST[l_pass]=md5(trim($ar_pass));

     $sql="select * from bom_tb_member where (m_user='$_POST[l_user]' and m_pass='$_POST[l_pass]')  or (m_phone='$_POST[l_user]' and m_pass='$_POST[l_pass]')";
	$re=sql_array($sql);
		

	###################ห้ามเข้าซ้อน
	
$url_file="../json/online/m/".$re[m_id].".json";
$log_js=file_get_contents2($url_file);
$log_bet = json_decode2($log_js, true);
#print_r($log_bet);
#exit();
$c_log=$log_bet[0][o_time];
if($c_log>0){
echo"<script language='JavaScript'>alert('มีผู้ใช้งานอยู่ในระบบ ลองใหม่ภายหลัง');</script>";
exit();
	}
	###################ห้ามเข้าซ้อน	
		
if($re[m_id]!=""){
	
if($re[m_active]!=1){
	     $alert='<span class="cr">E1-คุณถูกระงับการใช้งานกรุณาติดต่อผู้ดูแล</span>';
		$_SESSION[bocklogin]=$_SESSION[bocklogin]+1;	
}else{
##################################

@session_start();



$_SESSION['m_id'] = $re[m_id];
$_SESSION['m_user'] = $re[m_user];
$_SESSION['m_name'] = $re[m_name];


$exopen = @explode(",",$re[m_open]);
$_SESSION['open_sc'] = $exopen[1];#Soccer
$_SESSION['open_mu'] = $exopen[2];#Muay
$_SESSION['open_st'] = $exopen[3];#Step
$_SESSION['open_sp'] = $exopen[4];#Sport
$_SESSION['open_lo'] = $exopen[5];#lotto
$_SESSION['open_ga'] = $exopen[6];#Games
$_SESSION['open_ca'] = $exopen[7];#Casino
$_SESSION['open_tf'] = $exopen[8];#Tranfer
$_SESSION['open_hun'] = $exopen[9];#Hun


if($re[m_count]<=0){$re[m_count]=0;}
$_SESSION['m_count'] = $re[m_count];
$_SESSION['m_count_de'] = $re[m_count_de];
$_SESSION['m_currency'] = $re[m_currency];
###############BANK
$_SESSION['m_b_pass'] = $re[m_b_pass];
$_SESSION['m_b_bank'] = $re[m_b_bank];
$_SESSION['m_b_code'] = $re[m_b_code];
$_SESSION['m_b_name'] = $re[m_b_name];

$_SESSION['bonus_m_id'] = $re[bonus_m_id];

###################BALL######################
$_SESSION['m_max'] = $re[m_max];
$_SESSION['m_min'] = $re[m_min];
$_SESSION['m_max_match'] = $re[m_max_match];
$_SESSION['m_com'] = $re[m_com];
$_SESSION['m_share'] = $re[m_share];
$_SESSION['m_share_live'] = $re[m_share_live];
$_SESSION['m_step_dis'] = $re[m_step_dis];
$_SESSION['m_step2'] = $re[m_step2];
$_SESSION['m_type'] = $re[m_type];
$_SESSION['m_nam_tor'] = $re[m_nam_tor];
$_SESSION['m_nam_rong'] = $re[m_nam_rong];
$_SESSION['m_nam_tor_live'] = $re[m_nam_tor_live];
$_SESSION['m_nam_rong_live'] = $re[m_nam_rong_live];

######################LOTTO

$_SESSION['m_lotto_max'] = $re[m_lotto_max];
$_SESSION['m_lotto_min'] = $re[m_lotto_min];

$_SESSION['m_lotto_share'] = $re[m_lotto_myshare_agent];
$_SESSION['m_lotto_pay'] = $re[m_lotto_pay_member];
$_SESSION['m_lotto_dis'] = $re[m_lotto_dis_member];

$_SESSION['m_bet_tou'] = $re[m_bet_tou];
$_SESSION['m_del'] = $re[m_del];
$_SESSION['m_print_slip'] = $re[m_print_slip];
$_SESSION['m_lotto_convert'] = $re[m_lotto_convert];
$_SESSION['m_lotto_convert_pay'] = $re[m_lotto_convert_pay];
$_SESSION['m_lotto_hun_pay_member'] = $re[m_lotto_hun_pay_member];

/*
$sql="select lot_over from bom_tb_config where con_id=1";
$rec=sql_array($sql);
$_SESSION['lot_over'] = $rec[lot_over];
*/
#####################SET
#$_SESSION['lang']=$arr_lang[$re[m_lang]];
$_SESSION['lang']=$_REQUEST['clang'];
$_SESSION['m_price'] = $m_price[$re[m_price]];
$_SESSION['m_row'] = $re[m_row];


$ex_rid=explode('*',$re[r_agent_id]);
$_SESSION[r_agent_id] = $re[r_agent_id];
$_SESSION['crid1'] = $ex_rid[1];
$_SESSION['crid2'] = $ex_rid[2];
$_SESSION['crid3'] = $ex_rid[3];
$_SESSION['crid4'] = $ex_rid[4];
$_SESSION['crid'] = $ex_rid[4];









$sql="select sum(b_total) as btotal from bom_tb_football_bill where m_id='$_SESSION[mid]'  and b_status=5";
$reb1=sql_array($sql);
$sql="select sum(b_total) as btotal from bom_tb_lotto_bill_live where m_id='$_SESSION[mid]'  and b_status=5";
$reb2=sql_array($sql);
$sql="select sum(b_total) as btotal from bom_tb_lotto_hun_bill where m_id='$_SESSION[mid]'  and b_status=5";
$reb3=sql_array($sql);
$_SESSION['mnot']=$reb1[btotal]+$reb2[btotal]+$reb3[btotal];





######################LOG##################
   include("../geoiploc.php"); // Must include this
 $ip = _bIP();
 $ipe = @explode(",",_bIP());
 $ipc=$ipe[0];
 if($ipe[0]==$ipe[1]){
	 $ip =$ipe[0]; 
	 }elseif($ipe[1]!=""){
	$ip =$ipe[1];  
	 }elseif($ipe[0]!=""){
	$ip =$ipe[0];  	 
		 }
 $location=getCountryFromIP($ipc, " NamE ");
  
   $sql="update  bom_tb_member set m_login=now(),m_ip='$ip',m_country='$location' where m_id='$_SESSION[mid]'";
   sql_query($sql);

$ua=getBrowser();
$yourbrowser= $ua['name'] . "#" . $ua['version'] . "#" .$ua['platform2'];
 $sql="INSERT IGNORE INTO bom_tb_login (h_date,	h_ip	,h_data, h_location	,m_id,r_level, r_agent_id) values(now(),'$ip','$yourbrowser','$location','$_SESSION[mid]','5' ,'$_SESSION[r_agent_id]')";
 sql_query($sql);
 
 
$hijack=md5($_SESSION[mid].$_SERVER['REMOTE_ADDR']);
$fo="../json/login/hjm_".$_SESSION[mid].".php";
write($fo,'<? $m_hijack="'.$hijack.'"; ?>',"w+"); 


$token = md5(uniqid(rand(),1));
$_SESSION['mtoken']=$token;
$fo="../json/login/$_SESSION[mid].php";
@unlink($fo);
write($fo,'<? $m_token="'.$token.'"; ?>',"w+"); 


###########IP
$token_ip = md5($_SERVER['SERVER_ADDR']);
$fo="../json/ip/$_SESSION[mid].php";
@unlink($fo);
write($fo,'<? $m_ip="'.$token_ip.'"; ?>',"w+"); 


echo"<script language='JavaScript'> top.document.location='index.php';</script>";
/*
echo"<script language='JavaScript'> window.location.href='rules.html';</script>";
echo"<script language='JavaScript'> window.location.href='channel.html';</script>";
*/
exit();

	
}
}else{
	// $alert='<span class="cr">E1-USERNAME OR PASSWORD INCORRECT</span>';
	$alert="<script language='JavaScript'> alert('E1-USERNAME OR PASSWORD INCORRECT')</script>";
	 $_SESSION[bocklogin]=$_SESSION[bocklogin]+1;
}
echo "$alert";
?>