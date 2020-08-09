<?
	session_start();
	header("Content-type: application/json");

	require_once '../inc/lang.php';

	$zone = $_POST['zone_send'];
	$rob = $_POST['rob_send'];
	$rob_name = $_POST['name_send'];

	if($zone != "" && $rob != "" && $rob_name != ""){
		$_SESSION["zone_hun"] = $zone;
		$_SESSION["rob_hun"] = $rob;
		$_SESSION["name_hun"] = $rob_name;
		$res = array('status' => 1,);
	}else{
		$res = array('status' => 0, 'msg' => $lang_member[66]);
	}
	echo json_encode($res);
	

?>