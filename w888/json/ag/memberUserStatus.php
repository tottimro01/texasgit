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

$temp = file_get_contents($main_url.'/inc/temp/memberUserStatus_temp.php', false, $context);

	$data = [];
	$data = $arrayName = array(
		'title' => $lang_memberUserStatus[1],//"สมาชิกและการตั้งค่า",
		'sub_title' => $lang_memberUserStatus[2],//"สถานะสมาชิก",
		'temp' => $temp,
	);



echo json_encode($data);


 ?>