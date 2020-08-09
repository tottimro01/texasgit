<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>

<?php 
  include "../inc/function.php";

	$postdata = http_build_query(
    array(
      'user' => $_GET[user],
      'id' => $_GET[id],
      'futype' => $_GET[futype],
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
	$temp = file_get_contents($main_url.'/inc/temp/memberUserList/viewLogUser_temp.php', false, $context);

	$data = array(
		'temp' => $temp,
	);
	echo json_encode($data);
	
?>
