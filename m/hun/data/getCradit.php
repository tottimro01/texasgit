<? 
session_cache_limiter('private, must-revalidate');
session_cache_expire(60);
ob_start(); if (!isset($_SESSION)) { session_start(); } ?>

<?php 
    header("Content-type:application/json");
    $url = 'http://ioshun.lotzx.com/getCredit.php';
    $mid = $_POST['mid'];

	$postdata = http_build_query(
    	array(
        	'mid' => $mid
    	)
	);

	$opts = array('http' =>
    	array
    	(
        	'method'  => 'POST',
        	'header'  => 'Content-type: application/x-www-form-urlencoded',
        	'content' => $postdata
    	)
	);

	$context  = stream_context_create($opts);
	$result = file_get_contents($url, false, $context);

  $json = json_decode($result, true);
 
  echo $result;
?>




