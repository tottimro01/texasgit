<?

require('../inc/conn.php');
require('../inc/function.php');


$lang_post           = trim($_POST["lang"]);
if($lang_post==""){
	$lang_post = "th";
}
$_SESSION['lang'] = $lang_post;
// require("../../lang/member_lang.php");
require("../lang/variable_lang.php");
require("../lang/function_array.php");



/*$config = getMaintenance();
if($config['con_service'] != 1){
  	//echo"<script language='JavaScript'> top.document.location='maintenance.php';</script>";
  	$arr_re["Status"] = "3";	
  	$arr_re["Data"] = $config;
	echo json_encode($arr_re);

	exit();
}*/



#require('../inc/function2.php');
#mb_strtolower("mĄkA",'UTF-8')
	$strUsername = strtolower(trim($_POST["sUsername"]));
	$strPassword = md5(trim($_POST["sPassword"]));
	$strdevice = trim($_POST["device"]);
	$uid = trim($_POST["uid"]);
	
	$strUsername5 = (trim($_POST["sUsername"]));
	$strPassword5 = (trim($_POST["sPassword"]));
	
	#$strUsername = $_GET["sUsername"];
	#$strPassword = md5($_GET["sPassword"]);
	#$strdevice = $_GET["device"];
#	$uid = $_GET["uid"];
	
$arr = array();


################OPEN BET maintenance 
/*$url_file="../../json/maintenance.json";	
$mm_js=file_get_contents2($url_file);
$jsmm = json_decode($mm_js, true);
if($jsmm["open"]==0){

$arr["Status"] = "2";	
echo json_encode($arr);
exit();

	}*/


        $sql="select * from bom_tb_member where (md5(m_user)='$strUsername5' and md5(m_pass)='$strPassword5') or (m_user='$strUsername' and m_pass='$strPassword') or (m_phone='$strUsername' and m_phone!='' and m_pass='$strPassword')";
		$re=sql_array($sql);
	
if($re[m_id]!="" and $re[m_active]==1){
	
	
	if($strdevice=="ios"){
		$uuid = base64_decode($_POST["uuid"]);
		                 sql_query("update bom_tb_member set m_uid_android = '' , m_uuid_android = '', m_uid_ios = '' , m_uuid_ios = '' where m_uuid_ios = '$uuid' ");
		$sql_uid = sql_query("update bom_tb_member set m_uid_ios = '$uid' , m_uuid_ios = '$uuid' , m_uid_android = '' , m_uuid_android = '' where m_id = '$re[m_id]'");
	}else if($strdevice=="android"){
		$uuid = $_POST["uuid"];
		                 sql_query("update bom_tb_member set m_uid_android = '' , m_uuid_android = '', m_uid_ios = '' , m_uuid_ios = ''  where m_uuid_android = '$uuid' ");
		$sql_uid = sql_query("update bom_tb_member set m_uid_android = '$uid' , m_uuid_android = '$uuid' , m_uid_ios = '' , m_uuid_ios = '' where m_id = '$re[m_id]'");
	}
	

	$arr["MemberID"] = $re[m_id];
	$arr["CRID"]=$re[r_agent_id];
	$arr["Name"] = $re[m_user];
	$arr["r_agent_id"] = $re[m_agent_id];
	

	$sql="select sum(b_total) as btotal from bom_tb_lotto_bill_live where m_id='$re[m_id]'  and b_status=5";
	$reb2=sql_array($sql);

	
	$arr["MemberCradit"] = $re['m_count'];
	$arr["MemberCraditOld"] = $reb1['btotal']+$reb2['btotal']+$reb3['btotal'];
	$arr["MemberCraditAcp"] = $re['m_count_de'];
	$arr["MemberPic"] = $re["m_pic"];
	$arr["MemberMax"] = $re['m_lotto_max'];
	$arr["MemberMin"] = $re['m_lotto_min'];
	
	
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

 $sql="INSERT IGNORE INTO bom_tb_login (h_date,	h_ip	,h_data, h_location	,m_id,r_level, r_agent_id) values(now(),'$ip','App iOS','$location','$re[m_id]','5' ,'$re[m_agent_id]')";
 sql_query($sql);
 
	}else if($strdevice=="android"){

 $sql="INSERT IGNORE INTO bom_tb_login (h_date,	h_ip	,h_data, h_location	,m_id,r_level, r_agent_id) values(now(),'$ip','App Android','$location','$re[m_id]','5' ,'$re[m_agent_id]')";
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
 
$rs_date=sql_array("select * from bom_tb_lotto_ok where lot_zone = 1 group by ok_date order by o_limit_time desc limit 1");
/*$url_file1="../../json/lotto/ok/ok_1_1.json";	
$date_js=file_get_contents2($url_file1);
$date_bet = json_decode($date_js, true);
$rs_date=$date_bet[0];*/

	$arr["LastLot"] = $rs_date['ok_date'];
	
	$arr["CloseBig"] = $rs_date["o_limit_time"];
	$arr["CloseSmall"] = $rs_date["o_limit_time_lang"];
	$arr["Zone"] = 1;
	$arr["Rob"] = 1;
	$arr["Zname"] = $lang_g['lotZone'][1];
	
	//$arr["Streaming"] = "http://lottoios.mine.nu:1999/live/lotto98.stream/playlist.m3u8";
	
	//$arr["Streaming"] = "http://61.91.12.34:1935/live/smil:tv5adaptive.smil/playlist.m3u8";
	//$arr["StreamingWeb"] = "https://bitdash-a.akamaihd.net/content/MI201109210084_1/m3u8s/f08e80da-bf1d-4e3d-8899-f0f6155f6efa.m3u8";
	
	$arr["Streaming"] = "http://61.19.21.220:81/live/myd/index.m3u8";
	$arr["StreamingWeb"] = "http://61.19.21.220:81/live/myd/index.m3u8";
	
	$arr["ListLot"] = array();
	$zi = 0;
	foreach($arr_zone as $zkey => $zvalue){
		$nz = $lot_zone_bet[$zkey];
		if($nz<=1){
			$arr["ListLot"][$zi]["z_name"] = $zvalue;
			$arr["ListLot"][$zi]["z_zone"] = $zkey;
			$arr["ListLot"][$zi]["z_rob"] = 1;
			$zi++;
		}else{
			for($zr=1;$zr<=$nz;$zr++){
				if($zkey==18){
					$arr["ListLot"][$zi]["z_name"] = $zvalue." รอบที่ ".$zr;
				}else if($zkey==19){
					$arr["ListLot"][$zi]["z_name"] = $zvalue." รอบ ".$lot_robmun[$zr];
				}else{
					$arr["ListLot"][$zi]["z_name"] = $zvalue.$lot_rob[$zr];
				}
				$arr["ListLot"][$zi]["z_zone"] = $zkey;
				$arr["ListLot"][$zi]["z_rob"] = $zr;
				$zi++;
			}
		}
	}
	
	
	
	$arr["Status"] = "1";
	$arr["Licen"] = "SC";
	$arr["Barcode"] = "1";


	$re0y=array("m_pass"=>"?");
	$re1m = @array_merge( $re , $re0y);	
	$arr['m1'] = $re1m;
	
	$rs_bank = sql_array("select * from bom_tb_bank where bank_id = '$re[bank_id]'");
	
	//$abig=explode("*",$re[r_agent_id]);

	$arr['bank_list'] = $ab_bank;
	$arr['bank_use'] = $rs_bank;
	
	
	$rs_ag = sql_array("select * from bom_tb_agent where r_id = '$re[r_id]'");
	$arr['r_m_deposit_min'] = $rs_ag["r_m_deposit_min"];
	$arr['r_m_deposit_max'] = $rs_ag["r_m_deposit_max"];
	$arr['r_m_withdraw_min'] = $rs_ag["r_m_withdraw_min"];
	$arr['r_m_withdraw_max'] = $rs_ag["r_m_withdraw_max"];

	$arr['r_open_transfer'] = $rs_ag["r_open_transfer"];
	$arr['r_m_deposit_open'] = $rs_ag["r_m_deposit_open"];
	$arr['r_m_withdraw_open'] = $rs_ag["r_m_withdraw_open"];
	


################Config Member

    if($arr['m1']['m_lotto_setbet']==1){
$arr["lot_pay_big5"]=@explode(',',$arr['m1']['m_lotto_pay1']); 	
	}elseif($arr['m1']['m_lotto_setbet']==2){
$arr["lot_pay_big5"]=@explode(',',$arr['m1']['m_lotto_pay2']); 	
	}else{
$arr["lot_pay_big5"]=@explode(',',$arr['m1']['m_lotto_pay3']); 	
	}
//$arr["lot_pay_big5"] = str_replace(',,',',0,',$arr["lot_pay_big5"]);


/*$url_file="../../json/config/member/LottoConfig_".$re[m_id].".json";	
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
	
	$exn1 = explode("," , $arr["lot_pay_big1"]);
	$n1 = count($exn1);
	$exn2 = explode("," , $arr["lot_pay_big2"]);
	$n2 = count($exn2);
	$exn3 = explode("," , $arr["lot_pay_big3"]);
	$n3 = count($exn3);
	$exn4 = explode("," , $arr["lot_pay_big4"]);
	$n4 = count($exn4);
	$exn5 = explode("," , $arr["lot_pay_big5"]);
	$n5 = count($exn5);
	if($n1<26){
		$arr["lot_pay_big1"] = $arr["lot_pay_big1"].",0";	
	}
	if($n2<26){
		$arr["lot_pay_big2"] = $arr["lot_pay_big2"].",0";	
	}
	if($n3<26){
		$arr["lot_pay_big3"] = $arr["lot_pay_big3"].",0";	
	}
	if($n4<26){
		$arr["lot_pay_big4"] = $arr["lot_pay_big4"].",0";	
	}
	if($n5<26){
		$arr["lot_pay_big5"] = $arr["lot_pay_big5"].",0";	
	}*/
	
		
}else{
$arr["Status"] = "2";	
##### เข้าระบบไม่ได้ ผิดพลาด
	}

	
	echo json_encode($arr);
	exit();
?>