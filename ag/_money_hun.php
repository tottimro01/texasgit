<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
  if($_SESSION["AGlang"]==""){
		$_SESSION["AGlang"]="th";
}

require('lang/ag_lang.php');
include "inc/function.php";

$postdata = http_build_query(
 	      array(
          'session' => $_SESSION,
          'post_val' => $_GET,
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

	$temp = file_get_contents($main_url.'/inc/temp/lotto_hun/_money_temp.php', false, $context);

$data = array();


	$data  = array(
		'title' => $lang_ag[159],
		'sub_title' => $lang_ag[150],
		'temp' => $temp,
	);


echo json_encode($data);


 ?>