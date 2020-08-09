<?
	session_start();
	header("Content-type: application/json");

	if(isset($_POST["chklist"]) && isset($_POST["pid"]) && isset($_POST["pname"]) && isset($_SESSION["mid"])) {

		$url = $_SESSION["url"].'save_lot_false.php';

		$postdata = 
		http_build_query(
    		array(
        		'mid' => $_SESSION["mid"],
				'chk_list' => $_POST["chklist"],
				'lat' => "0",
				'lon' => "0",
				'bf' => "m",
				'uuid' => "",
				'pname' => $_POST["pname"],
				'pid' => $_POST["pid"],
				'lang' => $_COOKIE["lang"],
    		)
		);

		$opts = array('http' =>
		    array(
		        'method'  => 'POST',
		        'header'  => 'Content-type: application/x-www-form-urlencoded',
		        'content' => $postdata
		    )
		);

		$context  = stream_context_create($opts);
		$result = file_get_contents($url, false, $context);
		echo $result;
		die();
	}

	$err_data[] = array('status' => 0, 'txt' => 'error', );
	$response = array('Status' => 0, 'Msg' => 'Error', 'data' => $err_data);
	echo json_encode($response);
	die();
?>
