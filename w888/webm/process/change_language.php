<?php 

	session_start();
  	header("Content-type: text/html");
  	$cmd = $_GET['cmd'];

    require_once '../inc/lang.php';

	$_SESSION['lang'] =  $_POST["lang"];
	setcookie($langCookieKey, $_POST["lang"], time() + (86400 * 30), "/");
	$array_list = array(
		'msg' => $lang_member[629], 
		'status' => 1,	
	);

	echo json_encode($array_list);
 ?>