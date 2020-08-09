<?
require('../inc/conn.php');

	$strUsername = $_POST["sUsername"];
	$strPassword = md5($_POST["sPassword"]);
$arr = array();


        $sql="select * from bom_tb_member where m_user='$strUsername' and md5(m_pass)='$strPassword'";
		$re=sql_array($sql);
	
if($re[m_id]!="" and $re[m_active]==1){
	

	$arr["MemberID"] = $re[m_id];
	$arr["Name"] = $re[m_name];
	$arr["MemberCradit"] = $re[m_count];
	$arr["MemberCraditAll"] = $re[m_count_de];
	$arr["MemberCraditOld"] = $re[m_count_de];
	$arr["MemberCraditAcp"] = $re[m_count_de];
	$arr["MemberPic"] = $re[m_pic];
	
	$arr["Status"] = "1";
	$arr["Licen"] = "SC";
		
}else{
$arr["Status"] = "2";	
##### เข้าระบบไม่ได้ ผิดพลาด
	}

	
	echo json_encode($arr);
	exit();
?>