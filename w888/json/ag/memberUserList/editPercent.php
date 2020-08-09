<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
	include "../inc/function.php";
  if($_SESSION["AGlang"]==""){
    $_SESSION["AGlang"]="th";
  }
  require('../lang/ag_'.$_SESSION["AGlang"].'.php');
	$postdata = http_build_query(
    array(
      'r_id' => $_GET["rid"],
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
	$temp = file_get_contents($main_url.'/inc/temp/memberUserList/editPercent_temp.php', false, $context);

	$data = array(
		'sub_title' => "รายชื่อสมาชิก",
		'title' =>"สมาชิกและการตั้งค่า",
		'temp' => $temp,
	);
	echo json_encode($data);
	
?>
