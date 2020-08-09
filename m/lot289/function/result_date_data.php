<?
	session_start();
	header("Content-type: application/json");
	if(isset($_GET["date"])) {
		$date = $_GET["date"];
		$url = $_SESSION["url"].'getBingo.php?d='.$date.'&lang='.$_COOKIE["lang"]."&zone=".$_SESSION["zone"]."&rob=".$_SESSION["rob"];
		$res_date = file_get_contents($url);
		$result = array('Status' => true, 'Date' => json_decode($res_date,true), );
	}else{
		$result = array('Status' => false, );
	}
	echo json_encode($result);
?>