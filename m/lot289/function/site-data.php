<?
	session_start();
	if(!isset($_SESSION["url"]) || !isset($_SESSION["base_url"])) {
		$postdata = 
		http_build_query(array('server' => 'toe',));

		$opts = array('http' =>
		    array(
		        'method'  => 'POST',
		        'header'  => 'Content-type: application/x-www-form-urlencoded',
		        'content' => $postdata
		    )
		);

		$context  = stream_context_create($opts);
		$result = file_get_contents('http://www.atom168.com/openbet2.php', false, $context);
		$result = json_decode($result,true);
		$url = $result['url'];
		$_SESSION["url"] = $url;
		$_SESSION["logo_img"] = $url.$result['logo99'];
		$_SESSION["logo_home_img"] = $url.$result['logo_home99'];
		$_SESSION["base_url"] = '/lot99/';
	}	
?>