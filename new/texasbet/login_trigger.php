<?php   
session_start();
header("Content-type: application/json");

require 'inc/lang.php';
require 'inc/conn.php';
require 'inc/function.php';
require 'inc/function2.php';
$uname = $_GET['uname']=="" ? "aaaa09" : $_GET['uname'];
$upass = $_GET['upass']=="" ? "1111" : $_GET['upass'];

$l_user=trim($uname);
$l_pass=md5($upass );

$sql="SELECT * FROM bom_tb_member WHERE (m_user='$l_user' and m_pass='$l_pass') OR (m_user_set='$l_user' and m_pass='$l_pass')  OR (m_phone='$l_user' and m_pass='$l_pass')";
$re=sql_array($sql);
		


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

		// if($detect->isMobile()) {
		// 	$_SESSION['m_login_from'] = 2; //1=Web , 2=Mobile
		// }else{
		// 	$_SESSION['m_login_from'] = 1; //1=Web , 2=Mobile
		// }

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

		$result = array('status' => 1, 'msg' => 'Login successfully');
		echo json_encode($result);
		exit();
	}
}else{
	$result = array('status' => 0, 'msg' => $lang_member[2250]); #ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง
}
echo json_encode($result);
?>
