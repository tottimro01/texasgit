<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
	
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

     //get temp html  	
	$temp = file_get_contents($main_url.'/inc/temp/lotto/lottoBlockNumber_temp.php', false, $context);

	$data = [];
	$data  = array(
		'title' => $lang_lot[2],//"หวย"
		'sub_title' => $lang_lot[8], //"ปิดรับเลข"
		'temp' => $temp,
		'type' => $array_type,
	);


echo json_encode($data);


 ?>