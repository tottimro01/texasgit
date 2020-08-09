<?php 

include "inc/function.php";

$postdata = http_build_query(
 	      array(
 	        'testData' => "9999",
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

$data = [];


	$data  = array(
		'title' => "หวยหุ้น",
		'sub_title' => "สรุปรวม",
		'temp' => $temp,
	);


echo json_encode($data);


 ?>