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
 	        'zone' => $_GET["zone"],
 	        'rob' => $_GET["rob"],
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
	$temp = file_get_contents($main_url.'/inc/temp/lotto_hun/lottoSetSummaryByType_temp.php', false, $context);



	$data = array();
	$data = array(
		'title' => $lang_ag[159], //"หวยหุ้น"
		'sub_title' => $lang_ag[148],//"ยอดซื้อตามประเภท"
		'temp' => $temp,	
	);


echo json_encode($data);


 ?>