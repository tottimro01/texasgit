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
 	       'd' => $_GET["d"],
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
	$temp = file_get_contents($main_url.'/inc/temp/lotto_lao/lottoLaoSummaryByType_temp.php', false, $context);


	$result = array(); 

	foreach ($array_type as $key => $value) {
		$type[$key] =  array('lotto_code' =>  $lotto_code[$key],
							'lotto_desc' =>  $value,
						);
	}


	$data = array();
	$data  = array(
		'title' => $lang_ag[161],//"หวยชุด",
		'sub_title' => $lang_ag[148],//"ยอดซื้อตามประเภท",
		'temp' => $temp,
	
	);


echo json_encode($data);


 ?>