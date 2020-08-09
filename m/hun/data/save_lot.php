<? 
session_cache_limiter('private, must-revalidate');
session_cache_expire(60);
ob_start(); if (!isset($_SESSION)) { session_start(); } ?>

<?php 
    header("Content-type:application/json");
    $url  = 'http://ioshun.lotzx.com/save_lot.php';
    // $url  = 'http://m.lotzx.com/hun/testData/save_lot.php';
    $mid  = $_POST['mid'];
    $txt  = $_POST['txt'];
    $lat  = $_POST['lat'];
    $lon  = $_POST['lon'];
    $bf   = $_POST['bf'];
    $lot_page   = $_POST['lot_page'];
    $uuid = $_POST['uuid'];
    $set  = $_POST['set'];
    $zone = $_POST['zone'];

	$postdata = http_build_query(
    	array(
        	'mid' => $mid,
            'txt' => $txt,
            'lat' => $lat,
            'lon' => $lon,
            'bf' => $bf,
            'lot_page' => $lot_page,
            'uuid' => '',
            'set' => $set,
            'zone' => $zone
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




