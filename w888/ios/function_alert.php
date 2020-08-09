<?
function noti($uid,$msg,$bgd,$stype){
	// Put your device token here (without spaces):
	$deviceToken = $uid;
	// Put your private key's passphrase here:
	//$passphrase = 'lotto112233';
	$passphrase = 'oho112233';
	// Put your alert message here:
	$message = $msg;
	////////////////////////////////////////////////////////////////////////////////
	$ctx = stream_context_create();
	//stream_context_set_option($ctx, 'ssl', 'local_cert', 'lotto.pem');
	stream_context_set_option($ctx, 'ssl', 'local_cert', 'oho.pem');
	stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
	// Open a connection to the APNS server
	$fp = stream_socket_client('ssl://gateway.push.apple.com:2195', $err,$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
	if (!$fp)
	exit("Failed to connect: $err $errstr" . PHP_EOL);
	//echo 'Connected to APNS' . PHP_EOL;
	// Create the payload body
	$body['aps'] = array(
		'alert' => $message,
		//เสียงเตือน
		'sound' => 'default',
		'badge' => intval($bgd),
		'ntype' => $stype
	);
	// Encode the payload as JSON
	$payload = json_encode($body);
	// Build the binary notification
	
	$arr1 = array();
	$arr2 = array();
	foreach($deviceToken as $token){
		$msg = chr(0) . pack("n",32) . pack('H*', str_replace(' ', '', $token)) . pack        ("n",strlen($payload)) . $payload;
		$result = fwrite($fp, $msg, strlen($msg));
		if (!$result)
			$arr2[] = 1;
		else
			$arr1[] = 1;
			
	}
	
	
	/*$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
	// Send it to the server
	$result = fwrite($fp, $msg, strlen($msg));
	if (!$result)
		$res = 1;
	else
		$res = 0;*/
	// Close the connection to the server
	fclose($fp);
	//return $res;
	return "แจ้งเตือนทั้งหมด ".number_format(count($arr1)+count($arr2))." เครื่อง<br>สำเร็จ ".number_format(count($arr1))." เครื่อง<br>ไม่สำเร็จ ".number_format(count($arr2))." เครื่อง";
}


function sm($registration_ids,$msg  ,$bgd , $stype){
		$message = array("txt" => $msg , "bgd" => $bgd , "ntype" => $stype);
		$url = 'https://android.googleapis.com/gcm/send';
		$fields = array(
			'registration_ids' => $registration_ids,
			'data' => $message,
		);
		//define('GOOGLE_API_KEY', 'AIzaSyBHPA-h-gKKQU-USNOksT71IJlMnduwcT4');
		define('GOOGLE_API_KEY', 'AIzaSyAgKhZ7uqY1wsaKEnZxou3AsNp9JAfu9Ls');
	
		$headers = array(
			'Authorization:key=' . GOOGLE_API_KEY,
			'Content-Type: application/json'
		);
		//echo json_encode($fields);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
	
		$result = curl_exec($ch);
		if($result === false)
			die('Curl failed ' . curl_error());
	
		curl_close($ch);
		return "แจ้งเตือนทั้งหมด ".number_format(count($result))." เครื่อง";
	}
?>