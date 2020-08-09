<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

  include "inc/function.php";
  
  if($_SESSION["AGlang"]==""){
    $_SESSION["AGlang"]="th";
  }
  require('lang/ag_lang.php');

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
	$temp = file_get_contents($main_url.'/inc/temp/balance_temp.php', false, $context);
	$result = array(); 
  $data = array();
	$data = array(
		'result' => $result,
		'title' => $lang_ag[26],
		'sub_title' => "",
		'temp' => $temp,
	);

  echo json_encode($data);
?>