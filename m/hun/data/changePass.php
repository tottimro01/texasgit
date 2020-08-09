<? 
session_cache_limiter('private, must-revalidate');
session_cache_expire(60);
ob_start(); if (!isset($_SESSION)) { session_start(); } ?>

<?php 
    header("Content-type:application/json");
    $url = 'http://ioshun.lotzx.com/changePass.php';
    $mid = $_POST['mid'];
    $pword = $_POST['sPassword'];

	$postdata = http_build_query(
    	array(
        	'mid' => $mid,
        	'sPassword' => $pword
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
  $status = $json['Status'];

 
  echo $result;
?>




