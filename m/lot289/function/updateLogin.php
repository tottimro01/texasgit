<?
	session_start();
	header("Content-type: application/json");

	if(!isset($_SESSION["login"]) || $_SESSION["login"] != '1'){
		$response = array('Status' => 0,);
	}else {
		$response = array('Status' => 1,);
	}

	echo json_encode($response);
?>