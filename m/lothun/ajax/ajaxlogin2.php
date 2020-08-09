<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require("../../../inc/conn.php");
require('../../../inc/function.php');
require('../../../inc/function2.php');

if($_COOKIE['Language']==""){
    setcookie( "Language", 'th', time()+31104000, "/");
}

require('../../../w1/admin_lang/export/lang_member_'.$_COOKIE['Language'].'.php');

if($_SESSION[bocklogin]>=5){
   echo "<span style='color:#FFF'/><b><i class='fa fa-times-circle'></i></b> ".$lang_member[2354]."</span>";
     exit();
}

	$strAccount = trim($_POST["tAccount"]);
	$strUsername = strtolower(trim(str_replace(array('@zx','@ZX'),array('',''),$_POST["tUser"])));
	$strPassword = trim($_POST["tPsw"]);
	$strLogin = $_POST["tLogin"];
		
	if(trim($strUsername) == "")
	{
		echo "<span style='color:#FFF'/><b><i class='fa fa-times-circle'></i></b> ".$lang_member[1904]."</span>";
		exit();
	}
	
	if(trim($strPassword) == "")
	{
		echo "<span style='color:#FFF'/><b><i class='fa fa-times-circle'></i></b> ".$lang_member[2179]."</span>";
		exit();
	}
	
	
################OPEN BET maintenance 
$url_file="../../../json/maintenance.json";	
$mm_js=file_get_contents2($url_file);
$jsmm = json_decode2($mm_js, true);

if($jsmm["open"]==0){

		echo "<span style='color:#FFF'/><b><i class='fa fa-times-circle'></i></b> ".$lang_member[1123]."</span>";
		exit();

	}


     // $sql="select * from bom_tb_member where (m_user='$strUsername' and m_pass='".md5($strPassword)."')";
	$sql="select * from bom_tb_member where (m_user='$strUsername' and m_pass='".md5($strPassword)."'   or (m_phone='$strUsername' and m_pass='".md5($strPassword)."'))";
	$re=sql_array($sql);
	
	###################ห้ามเข้าซ้อน
$url_file="../../../json/online/m/".$re[m_id].".json";
$log_js=file_get_contents2($url_file);
$log_bet = json_decode2($log_js, true);

$c_log=$log_bet[0][o_time];
if($c_log>0){
echo "<span style='color:#FFF'/><b><i class='fa fa-times-circle'></i></b> ".$lang_member[2355]."</span>";
exit();
	}
	###################ห้ามเข้าซ้อน	
	

if($re[m_id]!=""){
	
if($re[m_active]!=1){
		echo "<span style='color:#FFF'/><b><i class='fa fa-times-circle'></i></b> ".$lang_member[1125]."</span>";
		exit();
}else{
	
		$exp=@explode(',',$re[m_lotto_hun_pay_member]);
	if(intval($exp[4])<=0 and intval($exp[5])<=0){
		
echo "<span style='color:#FFF'/><b><i class='fa fa-times-circle'></i></b> ".$lang_member[2250]."</span>";	
$_SESSION[bocklogin]=$_SESSION[bocklogin]+1;

	}else{
	
	
############################################
@session_start();

$_SESSION['mid'] = $re[m_id];
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


if($re[m_count]<=0){$re[m_count]=0;}
$_SESSION['mcount'] = $re[m_count];
$_SESSION['mcredit'] = $re[m_count_de];
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

$_SESSION['m_lotto_share'] = $re[m_lotto_hun_myshare_agent];
$_SESSION['m_lotto_pay'] = $re[m_lotto_hun_pay_member];
$_SESSION['m_lotto_dis'] = $re[m_lotto_hun_dis_member];


$_SESSION['m_bet_tou'] = $re[m_bet_tou];
$_SESSION['m_del'] = $re[m_del];
$_SESSION['m_print_slip'] = $re[m_print_slip];
$_SESSION['m_lotto_convert'] = $re[m_lotto_convert];
$_SESSION['m_lotto_convert_pay'] = $re[m_lotto_convert_pay];
$_SESSION['m_lotto_hun_pay_member'] = $re[m_lotto_hun_pay_member];


		
		



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
$sql="select sum(b_total) as btotal from bom_tb_lotto_bill where m_id='$_SESSION[mid]'  and b_status=5";
$reb2=sql_array($sql);
$sql="select sum(b_total) as btotal from bom_tb_lotto_hun_bill where m_id='$_SESSION[mid]'  and b_status=5";
$reb3=sql_array($sql);
$_SESSION['mnot']=$reb1[btotal]+$reb2[btotal]+$reb3[btotal];

######################LOG##################
   include("../../../geoiploc.php"); // Must include this
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
 $sql="INSERT IGNORE INTO bom_tb_login (h_date,	h_ip	,h_data, h_location	,m_id,r_level, r_agent_id) values(now(),'$ip','M $yourbrowser','$location','$_SESSION[mid]','5' ,'$_SESSION[r_agent_id]')";
 sql_query($sql);
 
$hijack=md5($_SERVER['REMOTE_ADDR']);
$fo="../../../json/login/hjm_".$_SESSION[mid].".php";
write($fo,'<? $m_hijack="'.$hijack.'"; ?>',"w+"); 

$token = md5(uniqid(rand(),1));
$_SESSION['mtoken']=$token;
$fo="../../../json/login/".$_SESSION[mid].".php";
@unlink($fo);
write($fo,'<? $m_token="'.$token.'"; ?>',"w+"); 


###########IP
$token_ip = md5(_bIP());
$fo="../../../json/ip/$_SESSION[mid].php";
@unlink($fo);
write($fo,'<? $m_ip="'.$token_ip.'"; ?>',"w+"); 

	
############################################	
echo "Y";
exit();

	}#	if(intval($exp[4])<=0 and intval($exp[5])<=0){

	}
	
	
}else{
echo "<span style='color:#FFF'/><b><i class='fa fa-times-circle'></i></b> ".$lang_member[2250]."</span>";	
$_SESSION[bocklogin]=$_SESSION[bocklogin]+1;
}
	


?>


