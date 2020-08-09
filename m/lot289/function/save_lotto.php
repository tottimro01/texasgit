<?
	session_start();
	header("Content-type: application/json");

	if(isset($_POST["txt"]) && isset($_POST["lat"]) && isset($_POST["lon"]) && isset($_POST["bf"]) && isset($_POST["lot_page"]) && isset($_POST["uuid"]) && isset($_POST["pid"]) && isset($_POST["pname"]) && isset($_SESSION["mid"])) {

		$url = $_SESSION["url"].'save_lot.php';

		$postdata = 
		http_build_query(
    		array(
        		'mid' => $_SESSION["mid"],
				'txt' => $_POST["txt"],
				'lat' => $_POST["lat"],
				'lon' => $_POST["lon"],
				'zone' => $_SESSION["zone"],
				'bf' => $_POST["bf"],
				'lot_page' => $_POST["lot_page"],
				'uuid' => $_POST["uuid"],
				'pname' => $_POST["pname"],
				'pid' => $_POST["pid"],
				'lang' => $_COOKIE["lang"],
				'rob' => $_SESSION["rob"],
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

	$response = array('Status' => 0, 'Msg' => 'Error');
	echo json_encode($response);
	die();
?>
