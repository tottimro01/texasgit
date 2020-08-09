<?
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);

require('../inc/conn.php');
require('../inc/function.php');


$lang_post = trim($_POST["lang"]);
if($lang_post==""){
	$lang_post = "th";
}
$_SESSION['lang'] = $lang_post;
require("../lang/variable_lang.php");
require("../lang/function_array.php");

$config = getMaintenance();
if($config['con_service'] != 1){
  	//echo"<script language='JavaScript'> top.document.location='maintenance.php';</script>";
  	$arr_re["Status"] = "3";	
  	$arr_re["Data"] = $config;
  	$arr_re["url_maintenance"] = "http://w1.wan1991.com/maintenance.php?f=app";
	echo json_encode($arr_re);

	exit();
}
	
$_POST["l_user"]=trim(strtolower($_POST["sUsername"]));
$password=trim($_POST["sPassword"]);

$ex_user = explode("@", $_POST["l_user"]);

$username = $ex_user[0];
$server = $ex_user[1];

$strdevice = trim($_POST["device"]);
$uid = trim($_POST["uid"]);
$uuid = $_POST["uuid"];

$arr = array();

if($server=="wan" or $server=="7"){
	$sql="select * from bom_tb_member where (m_user='$username' and m_pass='$password') or (m_phone='$username' and m_phone!='' and m_pass='$password')";
	$re=sql_array($sql);

	if($re["m_id"]!=""){
		if($re["m_active"]==1){

			if($strdevice=="ios"){
				sql_query("update bom_tb_member set m_uid_android = '' , m_uuid_android = '', m_uid_ios = '' , m_uuid_ios = '' where m_uuid_ios = '$uuid' ");
				$sql_uid = sql_query("update bom_tb_member set m_uid_ios = '$uid' , m_uuid_ios = '$uuid' , m_uid_android = '' , m_uuid_android = '' where m_id = '".$re["m_id"]."'");
			}else if($strdevice=="android"){
				sql_query("update bom_tb_member set m_uid_android = '' , m_uuid_android = '', m_uid_ios = '' , m_uuid_ios = ''  where m_uuid_android = '$uuid' ");
				$sql_uid = sql_query("update bom_tb_member set m_uid_android = '$uid' , m_uuid_android = '$uuid' , m_uid_ios = '' , m_uuid_ios = '' where m_id = '".$re["m_id"]."'");
			}

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

			$sql="update  bom_tb_member set m_login=now(),m_ip='$ip',m_country='$location' where m_id='".$re["m_id"]."'";
			sql_query($sql);

			if($strdevice=="ios"){
				$sql="INSERT IGNORE INTO bom_tb_login (h_date,	h_ip	,h_data, h_location	,m_id,r_level, r_agent_id) values(now(),'$ip','App iOS','$location','".$re["m_id"]."','5' ,'".$re["m_agent_id"]."')";
				sql_query($sql);
			}else if($strdevice=="android"){
				$sql="INSERT IGNORE INTO bom_tb_login (h_date,	h_ip	,h_data, h_location	,m_id,r_level, r_agent_id) values(now(),'$ip','App Android','$location','".$re["m_id"]."','5' ,'".$re["m_agent_id"]."')";
				sql_query($sql);
			}

			$sql="select sum(b_sum) as btotal from bom_tb_football_bill_live where m_id='".$re['m_id']."'  and b_status=5 and b_accept=1  ";
			$reb1=sql_array($sql);
			$sql="select sum(b_total) as btotal from bom_tb_lotto_bill_play_live where m_id='".$re['m_id']."'  and play_status=7 and b_accept=1  ";
			$reb2=sql_array($sql);
			$sql="select sum(b_total) as btotal from bom_tb_games_bill_play_live where m_id='".$re['m_id']."'  and play_status=7";
			$reb3=sql_array($sql);
			$sql="select sum(b_total) as btotal from bom_tb_casino_bill_play_live where m_id='".$re['m_id']."'  and play_status=7";
			#$reb4=sql_array($sql);

			$mnot=$reb1['btotal']+$reb2['btotal']+$reb3['btotal']+$reb4['btotal'];


			$re0y=array("m_pass"=>"?");
			$re1m = @array_merge( $re , $re0y);	
			$re1m["b_code_enc"] = _bankok($re1m['m_b_code']);
			$re1m["b_code_4digi"] = '***'.substr($re1m['m_b_pass'] , -1);
			$re1m["m_count_acp"] = $mnot;
			$arr['m1'] = $re1m;

			$rs_bank = sql_array("select * from bom_tb_bank where bank_id = '".$re[bank_id]."'");

			$rs_bank["b_code_enc"] = _bankok($rs_bank['bank_code']);
			$rs_bank["b_code_4digi"] = substr($rs_bank['bank_code'] , 6 , 4);
			$arr['bank_list'] = $ab_bank;
			$arr['bank_use'] = $rs_bank;

			$rs_ag = sql_array("select * from bom_tb_agent where r_id = '".$re[r_id]."'");
			$arr['r_m_deposit_min'] = $rs_ag["r_m_deposit_min"];
			$arr['r_m_deposit_max'] = $rs_ag["r_m_deposit_max"];
			$arr['r_m_withdraw_min'] = $rs_ag["r_m_withdraw_min"];
			$arr['r_m_withdraw_max'] = $rs_ag["r_m_withdraw_max"];

			$arr['r_open_transfer'] = $rs_ag["r_open_transfer"];
			$arr['r_m_deposit_open'] = $rs_ag["r_m_deposit_open"];
			$arr['r_m_withdraw_open'] = $rs_ag["r_m_withdraw_open"];

			$arr["Status"] = "1";
			$arr["Licen"] = "SC";
			$arr["url_maintenance"] = "http://w1.wan1991.com/maintenance.php?f=app";
			$arr["node_ip"] = $nodejs_ip;


			


		}else{
			$arr["Status"] = "0";
			$arr["msg"] = $lang_member[59];
		}
	}else{
		$arr["Status"] = "0";
		$arr["msg"] = $lang_member[2250];
	}
}else{
	$arr["Status"] = "0";
	$arr["msg"] = $lang_member[2263];
}


echo json_encode($arr);

?>