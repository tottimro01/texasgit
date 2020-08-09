<? 
session_cache_limiter('private, must-revalidate');
session_cache_expire(60);
ob_start(); if (!isset($_SESSION)) { session_start(); } ?>

<?php 
    header("Content-type:application/json");
    $url = 'http://ioshun.lotzx.com/ok.php';
    $zone = $_POST['zone'];

	$postdata = http_build_query(
    	array(
        	'zone' => $zone,
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
  // if($status == 1)
  // {
  //   $_SESSION["LoginStatus"] = 1;
  //   $_SESSION["Name"]=$json['Name'];
  //   $_SESSION["MemberCradit"]=$json['MemberCradit'];
  //   $_SESSION["MemberCraditOld"]=$json['MemberCraditOld'];
  //   $_SESSION["MemberCraditAcp"]=$json['MemberCraditAcp'];
  //   $_SESSION["mid"]=$json['MemberID'];
  // }else{
  //   $_SESSION["LoginStatus"] = 0;
  // }
 
  echo $result;
?>




