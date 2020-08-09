<?
	session_start();
	// $url = $_SESSION["base_url"];
	session_destroy();
	header("Location: ../login.php"); /* Redirect to login */
?>