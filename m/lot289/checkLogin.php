<?
	session_start();
	header('Content-type: application/json');
	if(isset($_POST["Username"]) && isset($_POST["Password"]) && isset($_POST["Device"]) ) {
		include 'checkLang.php';
		require('../../../inc/conn.php');
		require '../../../inc/function.php'; 
		include 'function.php'; 

		/*$postdata = 
		http_build_query(
    		array(
        		'sUsername' => $_POST["Username"],
        		'sPassword' => $_POST["Password"],
        		'device' => $_POST["Device"],
        		'uid' => $_POST["UID"],
        		'uuid' => $_POST["UUID"],
    		)
		);

		$opts = array('http' =>
		    array(
		        'method'  => 'POST',
		        'header'  => 'Content-type: application/x-www-form-urlencoded',
		        'content' => $postdata
		    )
		);

		$context  = stream_context_create($opts);
		$result = file_get_contents($_SESSION["url"].'checkLogin.php', false, $context);*/
		
		
		
		
		$strUsername = strtolower(trim($_POST["Username"]));
		$strPassword = md5(trim($_POST["Password"]));
		$strdevice = trim($_POST["Device"]);
		$uid = trim($_POST["UID"]);

		$strUsername5 = (trim($_POST["Username"]));
		$strPassword5 = (trim($_POST["Password"]));
		$_POST["uuid"] = $_POST["UUID"];
		
		$arr = array();


		################OPEN BET maintenance 
		$url_file="../../../json/maintenance.json";	
		$mm_js=file_get_contents2($url_file);
		$jsmm = json_decode($mm_js, true);
		if($jsmm["open"]==0){
			$arr["Status"] = "2";	
			echo json_encode($arr);
			exit();
		}
		
		
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
			$arr["r_agent_id"] = $re[r_agent_id];

			$sql="select sum(b_total) as btotal from bom_tb_football_bill where m_id='$re[m_id]'  and b_status=5";
			$reb1=sql_array($sql);
			$sql="select sum(b_total) as btotal from bom_tb_lotto_bill_live where m_id='$re[m_id]'  and b_status=5";
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


			 $sql="update  bom_tb_member set m_login=now(),m_ip='$ip',m_country='$location' where m_id='$re[m_id]'";
		   sql_query($sql);

			if($strdevice=="ios"){

		 $sql="INSERT IGNORE INTO bom_tb_login (h_date,	h_ip	,h_data, h_location	,m_id,r_level, r_agent_id) values(now(),'$ip','App iOS','$location','$re[m_id]','5' ,'$re[r_agent_id]')";
		 sql_query($sql);

			}else if($strdevice=="android"){

		 $sql="INSERT IGNORE INTO bom_tb_login (h_date,	h_ip	,h_data, h_location	,m_id,r_level, r_agent_id) values(now(),'$ip','App Android','$location','$re[m_id]','5' ,'$re[r_agent_id]')";
		 sql_query($sql);
			}

		$url_file1="../../../json/lotto/ok/ok_1_1.json";	
		$date_js=file_get_contents2($url_file1);
		$date_bet = json_decode($date_js, true);
		$rs_date=$date_bet[0];

			$arr["LastLot"] = $rs_date[ok_date];

			$arr["CloseBig"] = $rs_date["o_limit_time"];
			$arr["CloseSmall"] = $rs_date["o_limit_time_lang"];
			$arr["Zone"] = 1;
			$arr["Rob"] = 1;
			$arr["Zname"] = $arr_zone[1];

			//$arr["Streaming"] = "http://lottoios.mine.nu:1999/live/lotto98.stream/playlist.m3u8";

			//$arr["Streaming"] = "http://61.91.12.34:1935/live/smil:tv5adaptive.smil/playlist.m3u8";
			//$arr["StreamingWeb"] = "https://bitdash-a.akamaihd.net/content/MI201109210084_1/m3u8s/f08e80da-bf1d-4e3d-8899-f0f6155f6efa.m3u8";

			$arr["Streaming"] = "http://202.162.78.181:81/live/myd/index.m3u8";
			$arr["StreamingWeb"] = "http://202.162.78.181:81/live/myd/index.m3u8";

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

############### NEW ARRAY
$_SESSION['m1'] = $re;


			$abig=explode("*",$re[r_agent_id]);



          $sql="select * from bom_tb_agent where r_id='".$abig[1]."'";
	 $re1=sql_array($sql);
	      $sql="select * from bom_tb_agent where r_id='".$abig[2]."'";
	 $re2=sql_array($sql);
	      $sql="select * from bom_tb_agent where r_id='".$abig[3]."'";
	 $re3=sql_array($sql);
	      $sql="select * from bom_tb_agent where r_id='".$abig[4]."'";
	 $re4=sql_array($sql);
	 
############### NEW ARRAY
$_SESSION['r1'] = $re1;
$_SESSION['r2'] = $re2;
$_SESSION['r3'] = $re3;
$_SESSION['r4'] = $re4;




			################Config Member
			$url_file="../../../json/config/member/LottoConfig_".$re[m_id].".json";	
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
			}
		}else{
			$arr["Status"] = "2";	
			##### เข้าระบบไม่ได้ ผิดพลาด
		}
		
		
		$datax = json_encode($arr);
		
		
		$data = json_decode($result, true);

		if($data['Status'] == '1') {
			$_SESSION["login"] = $data["Status"]; 
			$_SESSION["mid"] = $data["MemberID"]; 
			$_SESSION["crid"] = $data["CRID"]; 
			$_SESSION["mname"] = $data["Name"]; 
			$_SESSION["mcredit"] = $data["MemberCradit"];
			$_SESSION["mcredit_acp"] = $data["MemberCraditAcp"]; 
			$_SESSION["mcredit_old"] = $data["MemberCraditOld"]; 
			$_SESSION["mmax"] = $data["MemberMax"]; 
			$_SESSION["mmin"] = $data["MemberMin"]; 
			$_SESSION["p"] = hpwd($_POST["Password"]);
			$_SESSION["streaming"] = $data["Streaming"];
	
			$_SESSION["close_big"] = $data["CloseBig"];
			$_SESSION["close_small"] = $data["CloseSmall"];
	
			$_SESSION["lot_pay_num1"] = explode(",", $data["lot_pay_big1"]);
			$_SESSION["lot_pay_num2"] = explode(",", $data["lot_pay_big2"]);
			$_SESSION["lot_pay_num3"] = explode(",", $data["lot_pay_big3"]);
			$_SESSION["lot_pay_num4"] = explode(",", $data["lot_pay_big4"]);
			$_SESSION["lot_pay_num5"] = explode(",", $data["lot_pay_big5"]);
		
			$arr_months = array($lang_data["months_s1"], $lang_data["months_s2"], $lang_data["months_s3"], $lang_data["months_s4"], $lang_data["months_s5"], $lang_data["months_s6"], $lang_data["months_s7"], $lang_data["months_s8"], $lang_data["months_s9"], $lang_data["months_s10"], $lang_data["months_s11"], $lang_data["months_s12"],);
			$day = date('d', $data["CloseBig"]);
			// $month = $arr_months[intval(date('m', $data["CloseBig"])-1)];
			$month = date('m', $data["CloseBig"]);
	
			$year = intval(date('Y', $data["CloseBig"])) + 543;
	
			$hours = date('H', $data["CloseBig"]);
			$mins = date('i', $data["CloseBig"]);
	
			// $_SESSION["closeBig_date"] = $day." ".$month." ".$year;
			// $_SESSION["closeBig_time"] = $hours.":".$mins;
	
			$_SESSION["closeBig_date"] = array($day,$month,$year);
			$_SESSION["closeBig_time"] = array( $hours,$mins);
	
			include 'lotto_function.php';
			$_alertVal = -1;
			$_SESSION["alert"] = -1;
			if(intval($_SESSION["lot_pay_num5"][2]) > 0.0){
				$_alertVal = intval($_SESSION["lot_pay_num5"][2]);
				$_SESSION["alert"] = round($_alertVal/2);
			}else {
				if(intval($_SESSION["lot_pay_num5"][17]) > 0.0) {
					$_alertVal = intval($_SESSION["lot_pay_num5"][17]);
					$_SESSION["alert"] = 1;
					$_SESSION["alert"] = round($_alertVal/2);
				}
			}
		}
		// $_rid = explode("*", $data["r_agent_id"]);
		// $_rid = array_filter($_rid);  
		// $_rid = array_values($_rid);
		// // $data["rid"] = $_rid;
		// $data["rid1"] = $_rid[0];

		// if($_rid[0]!=="1") {
		// 	$data["Status"] == 0;	
		// }

		echo json_encode($data);
	}
?>