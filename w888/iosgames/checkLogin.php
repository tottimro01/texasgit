<?
require('../inc/conn.php');
require('../inc/function.php');
#require('../inc/function2.php');
#mb_strtolower("mĄkA",'UTF-8')
	$strUsername = strtolower(trim($_POST["sUsername"]));
	$strPassword = md5(trim($_POST["sPassword"]));
	$strdevice = trim($_POST["device"]);
	$uid = trim($_POST["uid"]);
	#$strUsername = $_GET["sUsername"];
	#$strPassword = md5($_GET["sPassword"]);
	#$strdevice = $_GET["device"];
#	$uid = $_GET["uid"];
	
$arr = array();


################OPEN BET maintenance 
$url_file="../json/maintenance.json";	
$mm_js=file_get_contents2($url_file);
$jsmm = json_decode($mm_js, true);
if($jsmm["open"]==0){

$arr["Status"] = "2";	
echo json_encode($arr);
exit();

	}


        $sql="select * from bom_tb_member where (m_user='$strUsername' and m_pass='$strPassword') or (m_phone='$strUsername' and m_phone!='' and m_pass='$strPassword')";
		$re=sql_array($sql);
	
if($re[m_id]!="" and $re[m_active]==1){
	
	
	if($strdevice=="ios"){
		$uuid = base64_decode($_POST["uuid"]);
		$sql_uid = sql_query("update bom_tb_member set m_uid_ios = '$uid' , m_uuid_ios = '$uuid' where m_id = '$re[m_id]'");
	}else if($strdevice=="android"){
		$uuid = $_POST["uuid"];
		$sql_uid = sql_query("update bom_tb_member set m_uid_android = '$uid' , m_uuid_android = '$uuid' where m_id = '$re[m_id]'");
	}
	

	$arr["MemberID"] = $re[m_id];
	$arr["CRID"]=$re[r_agent_id];
	$arr["Name"] = $re[m_user];
	$arr["r_agent_id"] = $re[r_agent_id];
	
	$sql="select sum(b_total) as btotal from bom_tb_football_bill where m_id='$re[m_id]'  and b_status=5";
	$reb1=sql_array($sql);
	$sql="select sum(b_total) as btotal from bom_tb_lotto_bill where m_id='$re[m_id]'  and b_status=5";
	$reb2=sql_array($sql);
	$sql="select sum(b_total) as btotal from bom_tb_lotto_hun_bill where m_id='$re[m_id]'  and b_status=5";
	$reb3=sql_array($sql);
	
	$arr["MemberCradit"] = $re[m_count];
	$arr["MemberCraditOld"] = $reb1[btotal]+$reb2[btotal]+$reb3[btotal];
	$arr["MemberCraditAcp"] = $re[m_count_de];
	$arr["MemberPic"] = $re["m_pic"];
	$arr["MemberMax"] = $re[m_lotto_max];
	$arr["MemberMin"] = $re[m_lotto_min];
	
	
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
  
  
     $sql="update  bom_tb_member set m_login=now(),m_ip='$ip',m_country='$location' where m_id='$re[m_id]'";
   sql_query($sql);
   
  	if($strdevice=="ios"){

 $sql="INSERT IGNORE INTO bom_tb_login (h_date,	h_ip	,h_data, h_location	,m_id,r_level, r_agent_id) values(now(),'$ip','App iOS','$location','$re[m_id]','5' ,'$re[r_agent_id]')";
 sql_query($sql);
 
	}else if($strdevice=="android"){

 $sql="INSERT IGNORE INTO bom_tb_login (h_date,	h_ip	,h_data, h_location	,m_id,r_level, r_agent_id) values(now(),'$ip','App Android','$location','$re[m_id]','5' ,'$re[r_agent_id]')";
 sql_query($sql);
	}
	
#   $sql="update  bom_tb_member set m_login=now(),m_ip='$ip',m_country='$location' where m_id='$re[m_id]'";
  # sql_query($sql);

#$ua=getBrowser();
#$yourbrowser= $ua['name'] . "#" . $ua['version'] . "#" .$ua['platform2'];


 /*
$hijack=md5($_SERVER['REMOTE_ADDR']);
$fo="../json/login/hjmios_".$re[m_id].".php";
write($fo,'<? $m_hijack="'.$hijack.'"; ?>',"w+");  
 */
 
#	$rs_date=sql_array("select * from bom_tb_lotto_ok where lot_zone = 1 group by ok_date order by o_limit_time desc limit 1");
$url_file1="../json/lotto/ok/ok_1_1.json";	
$date_js=file_get_contents2($url_file1);
$date_bet = json_decode($date_js, true);
$rs_date=$date_bet[0];

	$arr["LastLot"] = $rs_date[ok_date];
	
	$arr["CloseBig"] = $rs_date["o_limit_time"];
	$arr["CloseSmall"] = $rs_date["o_limit_time_lang"];
	
	$arr["Status"] = "1";
	$arr["Licen"] = "SC";
	$arr["Barcode"] = "1";
	
	
	
	$abig=explode("*",$re[r_agent_id]);
	
	
	
	
	


################Config Member
$url_file="../json/config/member/LottoConfig_".$re[m_id].".json";	
$lot6_js=file_get_contents2($url_file);
$lot_m = json_decode($lot6_js, true);
$arr["log"] = $url_file;




	$arr["lot_pay_big1"] = str_replace(',,',',0,',$lot_m["m_lotto_pay_super"]);
	$arr["lot_pay_big2"] = str_replace(',,',',0,',$lot_m["m_lotto_pay_senior"]);
	$arr["lot_pay_big3"] = str_replace(',,',',0,',$lot_m["m_lotto_pay_master"]);
	$arr["lot_pay_big4"] = str_replace(',,',',0,',$lot_m["m_lotto_pay_agent"]);
	$arr["lot_pay_big5"] = str_replace(',,',',0,',$lot_m["m_lotto_pay_member"]);
	
	$arr["lot_pay_big1"] =str_replace(',,',',0,', $arr["lot_pay_big1"]);
	$arr["lot_pay_big2"] = str_replace(',,',',0,',$arr["lot_pay_big2"]);
	$arr["lot_pay_big3"] = str_replace(',,',',0,',$arr["lot_pay_big3"]);
	$arr["lot_pay_big4"] = str_replace(',,',',0,',$arr["lot_pay_big4"]);
	$arr["lot_pay_big5"] = str_replace(',,',',0,',$arr["lot_pay_big5"]);
		
}else{
$arr["Status"] = "2";	
##### เข้าระบบไม่ได้ ผิดพลาด
	}

	
	echo json_encode($arr);
	exit();
?>