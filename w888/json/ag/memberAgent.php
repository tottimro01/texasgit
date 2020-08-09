
<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
	if($_SESSION["r_level"] >= 8){
		exit();
	}
	
  	if($_SESSION["AGlang"]==""){
  	    $_SESSION["AGlang"]="th";
  	}

    require('lang/ag_'.$_SESSION["AGlang"].'.php');
	include "inc/function.php";

	$postdata = http_build_query(
    array(
    	 'session' => $_SESSION,
    )
 	);
  $opts = array('http' =>
    array(
      'method'  => 'POST',
      'header'  => 'Content-type: application/x-www-form-urlencoded',
      'content' => $postdata,
    ),
  );
  $context  = stream_context_create($opts);
	$temp = file_get_contents($main_url.'/inc/temp/memberAgent/addAgent_temp.php', false, $context);
	$data = array(
		'title' => $lang_memberAgent[1],//"สมาชิกและการตั้งค่า",
		'sub_title' => $lang_memberAgent[2],//"สร้างเอเย่นต์",
		'temp' => $temp
	);
	echo json_encode($data);
	
	##### Old Code #####
	// $temp = file_get_contents('http://ag.ohoking.com/memberAgent/addAgent.php');
	// 	$data = $arrayName = array(
	// 		'title' => "สมาชิกและการตั้งค่า",
	// 		'sub_title' => "สร้างเอเย่นต์",
	// 		'temp' => $temp,
	// 	);
	// echo json_encode($data);
?>