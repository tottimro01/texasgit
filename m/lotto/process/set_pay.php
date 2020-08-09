<?
	session_start();
	header("Content-type: application/json");

	require_once '../inc/lang.php';
    require_once '../inc/rsc.php';
    require_once '../inc/function.php';
    require_once '../inc/conn.php';

    require_once '../inc/function_array.php';
    require_once '../inc/variable_lang.php';

	$mid  = $_SESSION["m_id"];
	$zone = $_SESSION['zone_hun'];
	$rob  = $_SESSION['rob_hun'];
	$val  = $_POST['pay_type'];

	$arr = array();

	if($zone==1){
		$sql="update bom_tb_member set m_lotto_setbet='$val' where m_id = '$mid'";
	}else{
		$sql="update bom_tb_member set m_lotto_hun_setbet='$val' where m_id = '$mid'";
	}
	$re=sql_array($sql);
	
	$arr["status"] = "1";
	$arr["license"] = "SC";

	echo json_encode($arr);
?>