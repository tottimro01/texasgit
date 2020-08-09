<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>

<?php 
	include "../inc/function.php";

	$postdata = http_build_query(
 		array(
      'id' => $_GET[id],
 		  'futype' => $_GET[futype],
 		  'edType' => $_GET[edType],
 		  'oldCredit' => $_GET[oldCredit],
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

  if($_GET[futype] == "A")
  {
  	$temp = file_get_contents($main_url.'/inc/temp/memberUserList/editCredit_A_temp.php', false, $context);
  }else if($_GET[futype] == "M"){
  	$temp = file_get_contents($main_url.'/inc/temp/memberUserList/editCredit_M_temp.php', false, $context);
  }else{
    $temp = "";
  }
	

	$data = array(
		'temp' => $temp,
	);
	echo json_encode($data);
	
?>
