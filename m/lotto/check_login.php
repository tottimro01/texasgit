<?php   
session_start();
header("Content-type: application/json");

require 'inc/lang.php';
require 'inc/conn.php';
require 'inc/function.php';
require 'inc/function2.php';
require 'assets/lib/Mobile-Detect/Mobile_Detect.php';
require 'assets/lib/geoip/geoiploc.php';

$detect = new Mobile_Detect;  

if(!strstr($_SERVER['HTTP_REFERER'], $check_url)){
	$result = array('status' => 0, 'msg' => $lang_member[2356]); #คุณไม่สามารถเข้าใช้งานระบบได้
	echo json_encode($result);
	exit();
}

################OPEN BET maintenance 
$jsmm = getMaintenance();
if($jsmm['open']==0){
	$result = array('status' => 0, 'msg' => $lang_member[1123]); #กำลังอยู่ในการ ซ่อมบำรุง ประมาน 45 นาที
	echo json_encode($result);
	exit();
}
	

$l_user=trim(strtolower($_GET['l_user']));
$l_pass=md5(trim($_GET['l_pass']));

$sql="SELECT * FROM bom_tb_member WHERE (m_user='$l_user' and m_pass='$l_pass') OR (m_user_set='$l_user' and m_pass='$l_pass')  OR (m_phone='$l_user' and m_pass='$l_pass')";
$re=sql_array($sql);
		

###################ห้ามเข้าซ้อน
$url_file=$json_dir."online/m/".$re['m_id'].".json";
$log_js=file_get_contents2($url_file);
$log_bet = json_decode2($log_js, true);

$c_log=$log_bet[0]['o_time'];
if($c_log>0){
	$result = array('status' => 0, 'msg' => $lang_member[2369]); # มีผู้ใช้งานอยู่ กรุณารอ 2 นาที
	echo json_encode($result);
	exit();
}
###################ห้ามเข้าซ้อน	
	

if($re['m_id']!=""){
	
	if($re['m_active']==3){
		$_SESSION['bocklogin']=$_SESSION['bocklogin']+1;	
		$result = array('status' => 0, 'msg' => $lang_member[1125]); #E1-คุณถูกระงับการใช้งานกรุณาติดต่อตัวแทน
	}else{

	################################## Login success

		if($re['m_count']<=0){
			$re['m_count']=0;
		}
		$_SESSION['m_id'] = $re['m_id'];
		$_SESSION['cr_id'] = $re['r_id'];
		$_SESSION['m_user'] = $re['m_user'];
		$_SESSION['bonus_m_id'] = $re['bonus_m_id'];
		$_SESSION['m_user_set'] = $re['m_user_set'];
		$_SESSION['m_name'] = $_SESSION['m_user_set'];
		$_SESSION['m_level'] = $re['m_level'];

		$_SESSION['m_open'] = $re['m_open'];
		$_SESSION['m_sport_step2'] = $re['m_sport_step2'];

		$_SESSION['m_count'] = $re['m_count'];
		$_SESSION['m_count_de'] = $re['m_count_de'];
		$_SESSION['m_currency'] = $re['m_currency'];
		$_SESSION['m_timezone'] = is_null($re['m_timezone']) ? 'GMT+07:00' : $re['m_timezone'];

		#####################SET
		// $_SESSION['lang']=$_REQUEST['clang'];

		$_SESSION['m_login'] = $re['m_login'];
		$m_token = md5($re['m_id'].$re['m_user'].date("Y-m-d H:i:s"));
		$_SESSION['m_token'] = $m_token;

		############### NEW ARRAY

		if($detect->isMobile()) {
			$_SESSION['m_login_from'] = 2; //1=Web , 2=Mobile
		}else{
			$_SESSION['m_login_from'] = 1; //1=Web , 2=Mobile
		}

		########################Member
		$re0y=array("m_pass"=>"?");
		$re1m = @array_merge( $re , $re0y);	
		$_SESSION['m1'] = $re1m;

		$arr_rid=array();
		$arr_data=array();
		########################Agent
		$ex_rid=explode('*',$re['m_agent_id']);
		$_SESSION['r_agent_id']= $re['m_agent_id'];

		############### ค่าน้ำ ###############
		$_SESSION['ar_nam'][] = "nam";
		foreach ($ex_rid as $key => $value) {
			if($value!=""){
				$sql_nam="select r_nam from bom_tb_agent where r_id='".$value."'";
				$re_nam=sql_array($sql_nam);
				$m_nam[] = $re_nam["r_nam"];
				$_SESSION['ar_nam'][] = $re_nam["r_nam"];
			}
		}

		$m_nam[] = $re1m["m_nam"];
		$_SESSION['ar_nam'][] = $re1m["m_nam"]; //Array ค่าน้ำแต่ละชั้น
		$_SESSION['m_nam'] = @array_sum($m_nam); //รวมค่าน้ำ
		##############################

		if($ex_rid[1]>0){
		   	$sql="select * from bom_tb_agent where r_id='".$ex_rid[1]."'";
		   	$re1=sql_array($sql);
			$re1y=array("r_pass"=>"?","r_token"=>"?","r_phone"=>"?","r_count"=>"?","r_ip"=>"?","r_regis"=>"?","r_login"=>"?");
			$re1x = @array_merge( $re1 , $re1y);	
			$_SESSION['crid1'] = $ex_rid[1];
			$_SESSION['r1'] = $re1x;
			$arr_rid[]=$ex_rid[1];
			$arr_data[$ex_rid[1]]=$re1x;
		}

		if($ex_rid[2]>0){
		   	$sql="select * from bom_tb_agent where r_id='".$ex_rid[2]."'";
		   	$re2=sql_array($sql);
			$re2y=array("r_pass"=>"?","r_token"=>"?","r_phone"=>"?","r_count"=>"?","r_ip"=>"?","r_regis"=>"?","r_login"=>"?");
			$re2x = @array_merge( $re2 , $re2y);	
			$_SESSION['crid2'] = $ex_rid[2];
			$_SESSION['r2'] = $re2x;
			$arr_rid[]=$ex_rid[2];
			$arr_data[$ex_rid[2]]=$re2x;
		}

		if($ex_rid[3]>0){
		   	$sql="select * from bom_tb_agent where r_id='".$ex_rid[3]."'";
		   	$re3=sql_array($sql);
			$re3y=array("r_pass"=>"?","r_token"=>"?","r_phone"=>"?","r_count"=>"?","r_ip"=>"?","r_regis"=>"?","r_login"=>"?");
			$re3x = @array_merge( $re3 , $re3y);	
			$_SESSION['crid3'] = $ex_rid[3];
			$_SESSION['r3'] = $re3x;
			$arr_rid[]=$ex_rid[3];
			$arr_data[$ex_rid[3]]=$re3x;
		}

		if($ex_rid[4]>0){
		   	$sql="select * from bom_tb_agent where r_id='".$ex_rid[4]."'";
		   	$re4=sql_array($sql);
			$re4y=array("r_pass"=>"?","r_token"=>"?","r_phone"=>"?","r_count"=>"?","r_ip"=>"?","r_regis"=>"?","r_login"=>"?");
			$re4x = @array_merge( $re4 , $re4y);	
			$_SESSION['crid4'] = $ex_rid[4];
			$_SESSION['r4'] = $re4x;
			$arr_rid[]=$ex_rid[4];
			$arr_data[$ex_rid[4]]=$re4x;
		}

		if($ex_rid[5]>0){
		   	$sql="select * from bom_tb_agent where r_id='".$ex_rid[5]."'";
		   	$re5=sql_array($sql);
			$re5y=array("r_pass"=>"?","r_token"=>"?","r_phone"=>"?","r_count"=>"?","r_ip"=>"?","r_regis"=>"?","r_login"=>"?");
			$re5x = @array_merge( $re5 , $re5y);	
			$_SESSION['crid5'] = $ex_rid[5];
			$_SESSION['r5'] = $re5x;
			$arr_rid[]=$ex_rid[5];
			$arr_data[$ex_rid[5]]=$re5x;
		}	

		if($ex_rid[6]>0){
		   	$sql="select * from bom_tb_agent where r_id='".$ex_rid[6]."'";
		   	$re6=sql_array($sql);
			$re6y=array("r_pass"=>"?","r_token"=>"?","r_phone"=>"?","r_count"=>"?","r_ip"=>"?","r_regis"=>"?","r_login"=>"?");
			$re6x = @array_merge( $re6 , $re6y);	
			$_SESSION['crid6'] = $ex_rid[6];
			$_SESSION['r6'] = $re6x;
			$arr_rid[]=$ex_rid[6];
			$arr_data[$ex_rid[6]]=$re6x;
		}

		if($ex_rid[7]>0){
		   	$sql="select * from bom_tb_agent where r_id='".$ex_rid[7]."'";
		   	$re7=sql_array($sql);
			$re7y=array("r_pass"=>"?","r_token"=>"?","r_phone"=>"?","r_count"=>"?","r_ip"=>"?","r_regis"=>"?","r_login"=>"?");
			$re7x = @array_merge( $re7 , $re7y);	
			$_SESSION['crid7'] = $ex_rid[7];
			$_SESSION['r7'] = $re7x;
			$arr_rid[]=$ex_rid[7];
			$arr_data[$ex_rid[7]]=$re7x;
		}

		if($ex_rid[8]>0){
		  	$sql="select * from bom_tb_agent where r_id='".$ex_rid[8]."'";
		  	$re8=sql_array($sql);
			$re8y=array("r_pass"=>"?","r_token"=>"?","r_phone"=>"?","r_count"=>"?","r_ip"=>"?","r_regis"=>"?","r_login"=>"?");
			$re8x = @array_merge( $re8 , $re8y);	
			$_SESSION['crid8'] = $ex_rid[8];
			$_SESSION['r8'] = $re8x;
			$arr_rid[]=$ex_rid[8];
			$arr_data[$ex_rid[8]]=$re8x;
		}

		$_SESSION['arid'] = $arr_rid;
		$_SESSION['ardata'] = $arr_data;

		######################ระงับ Member
  		if(intval($_SESSION['m1']['m_active'])==3){ 
			@session_start(); 
			@session_destroy();
 			$_SESSION['bocklogin']=$_SESSION['bocklogin']+1;
			$result = array('status' => 0, 'msg' => $lang_member[2370]); #E2-คุณถูกระงับการใช้งานกรุณาติดต่อตัวแทน
			echo json_encode($result);
			exit();
		}
 
 		########################ระงับ Agent
		foreach($_SESSION['arid'] as $rid){
		######################ระงับ
			if(intval($_SESSION['ardata'][$rid]['r_active'])==3){ 
				@session_start(); 
				@session_destroy();
				$_SESSION['bocklogin']=$_SESSION['bocklogin']+1;
				$result = array('status' => 0, 'msg' => 'E3-AGENT LOCK');
				echo json_encode($result);
				exit();			
			}			 
		}

		######################LOG##################
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
  
   		$sql="UPDATE bom_tb_member SET m_login=now(),m_ip='$ip',m_country='$location', m_token='$m_token' WHERE m_id='".$_SESSION['m_id']."'";
   		sql_query($sql);

		$ua=getBrowser();
		$yourbrowser= $ua['name'] . "#" . $ua['version'] . "#" .$ua['platform2'];
 		$sql="INSERT IGNORE INTO bom_tb_login (h_date,	h_ip	,h_data, h_location	,m_id,r_level, r_agent_id) VALUES(now(),'$ip','$yourbrowser','$#location','".$_SESSION['m_id']."','5' ,'".$_SESSION['r_agent_id']."')";
 		sql_query($sql);

		$sql="INSERT IGNORE INTO bom_tb_login_mem (h_date,	h_ip	,h_data, h_location	,m_id,r_level, r_agent_id) VALUES(now(),'$ip','$yourbrowser','$#location','".$_SESSION['m_id']."','".$re['m_level']."' ,'".$re['m_agent_id']."')";
 		sql_query($sql);
 
		$hijack=md5($_SESSION['m_id'].$_SERVER['REMOTE_ADDR']);
		$fo=$json_dir."login/hjm_".$_SESSION['m_id'].".php";
		write($fo,'<? $m_hijack="'.$hijack.'"; ?>',"w+"); 

		$token = md5(uniqid(rand(),1));
		$_SESSION['mtoken']=$token;
		$fo=$json_dir."login/".$_SESSION['m_id'].".php";
		@unlink($fo);
		write($fo,'<? $m_token="'.$token.'"; ?>',"w+"); 

		###########IP
		$token_ip = md5($_SERVER['SERVER_ADDR']);
		$fo=$json_dir."ip/".$_SESSION['m_id'].".php";
		@unlink($fo);
		write($fo,'<? $m_ip="'.$token_ip.'"; ?>',"w+"); 

		$result = array('status' => 1, 'msg' => 'Login successfully');
		echo json_encode($result);
		exit();
	}
}else{
	$sql="SELECT * FROM bom_tb_member WHERE (m_user='$l_user') OR (m_user_set='$l_user') OR (m_phone='$l_user')";
	$re=sql_array($sql);
	if($re!== null){
		######################LOG##################
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
		$yourbrowser= "มีผู้อื่นกำลังพยายามเข้าสู่ระบบ";

		$sql="INSERT IGNORE INTO bom_tb_login_mem (h_date,	h_ip	,h_data, h_location	,m_id,r_level, r_agent_id) VALUES(now(),'$ip','$yourbrowser','$location','".$re['m_id']."','".$re['m_level']."' ,'".$re['m_agent_id']."')";
		sql_query($sql);
	}

	$_SESSION['bocklogin']=$_SESSION['bocklogin']+1;
	$result = array('status' => 0, 'msg' => $lang_member[2250]); #ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง
}
echo json_encode($result);
?>
