<?
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);

require('../../../inc/conn.php');

	$mid = $_POST["mid"];
$arr = array();


        $sql="select * from bom_tb_member where m_id='$mid'";
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