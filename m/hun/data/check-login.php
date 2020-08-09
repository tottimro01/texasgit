<? 
session_cache_limiter('private, must-revalidate');
session_cache_expire(60);
ob_start(); if (!isset($_SESSION)) { session_start(); } ?>

<?php 
    header("Content-type:application/json");
    $url = 'http://ioshun.lotzx.com/checkLogin.php';
    $uname = $_POST['uname'];
    $pword = $_POST['pword'];

	$postdata = http_build_query(
    	array(
        	'sUsername' => $uname,
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
  if($status == 1)
  {
    $_SESSION["LoginStatus"] = 1;
    $_SESSION["password"] = $_POST['pword'];
    $_SESSION["Name"]=$json['Name'];
    $_SESSION["MemberCradit"]=$json['MemberCradit'];
    $_SESSION["MemberCraditOld"]=$json['MemberCraditOld'];
    $_SESSION["MemberCraditAcp"]=$json['MemberCraditAcp'];
    $_SESSION["mid"]=$json['MemberID'];
  }else{
    $_SESSION["LoginStatus"] = 0;
  }
  // 	$_SESSION["LoginStatus"] = 1;

  // 	$_SESSION['crid'] =  $json['crid'];
  // 	$_SESSION['userid'] =  $json['mid'];
  // 	$_SESSION['username'] =  $json['mname'];
  // 	$_SESSION['credit'] =  $json['mcount'];
  // 	$_SESSION['current_date'] =  $json['mdate'];
  // 	$_SESSION['checkload_time'] =  $json['refresh'];
  // 	$_SESSION['checkload_live_time'] =  $json['refresh_live'];
  // 	$_SESSION['yod_max_step'] =  $json['yodmax'];
  // 	$_SESSION['yod_max_fav'] =  $json['yodmax1'];
  // 	$_SESSION['yod_min_step'] =  $json['yodmin'];
  // 	$_SESSION['yod_min_fav'] =  $json['yodmin1'];
  //  	$_SESSION['step_max_min'] =  $json['stepmaxmin'];
  //   $_SESSION['auto_save_time'] = $json['auto_save'];
  // }else
  // {
  // 	$_SESSION["LoginStatus"] = 0;
  // }
  echo $result;
?>




