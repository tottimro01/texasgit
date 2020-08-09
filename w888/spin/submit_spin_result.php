<?
header("Content-type: application/json");
	$reward = $_POST['reward'];

	if(intval($reward) > 0){
		$res = array('status' => 1, 'reward' => $reward);
	}else{
		$res = array('status' => 0, 'reward' => $reward);
	}
	echo json_encode($res);
?>