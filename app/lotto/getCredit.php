<?
require('../inc/conn.php');

	$mid = $_POST["mid"];
$arr = array();


        $sql="select * from bom_tb_member where m_id='$mid'";
		$re=sql_array($sql);
	
if($re[m_id]!="" and $re[m_active]==1){
	
	$sql="select sum(b_total) as btotal from bom_tb_football_bill where m_id='$mid'  and b_status=5";
	$reb1=sql_array($sql);
	$sql="select sum(b_total) as btotal from bom_tb_lotto_bill_live where m_id='$mid'  and b_status=5";
	$reb2=sql_array($sql);
	$sql="select sum(b_total) as btotal from bom_tb_lotto_hun_bill where m_id='$mid'  and b_status=5";
	$reb3=sql_array($sql);
	
	$arr["MemberID"] = $re[m_id];
	$arr["Name"] = $re[m_user];
	$arr["MemberCradit"] = $re[m_count];
	$arr["MemberCraditOld"] = $reb1[btotal]+$reb2[btotal]+$reb3[btotal];
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