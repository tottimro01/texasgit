<?
	$dir = dirname(__file__);
	if (!isset($_COOKIE["lang"])) {
		setcookie("lang","th", time() + (86400 * 365), "/");
		$lang_url = $_SESSION["url"]."lang_app/th.php";
	} else {
		$lang_url = $_SESSION["url"]."lang_app/".$_COOKIE["lang"].".php";
	}

	$file = file_get_contents($lang_url);
	$lang_data = json_decode($file, true);

	// ----------------------
	// $dir = dirname(__file__);
	// if (!isset($_COOKIE["lang"])) {
	// 	setcookie("lang","th", time() + (86400 * 365), "/");
	// 	$lang_url = $_SESSION["url"]."lang_app/th.php";
	// 	$cache_file = $dir."/cache/th.php";
	// } else {
	// 	$cache_file = $dir."/cache/".$_COOKIE["lang"].".php";
	// }

	// if (file_exists($cache_file) && (filemtime($cache_file) > (time() - ((60 * 60)*24) )) && filesize($cache_file) > 0) {
	//    	$file = file_get_contents($cache_file);
	// } else {
	// 	$lang_url = $_SESSION["url"]."lang_app/".$_COOKIE["lang"].".php";
	//    	$file = file_get_contents($lang_url);
	//    	file_put_contents($cache_file, $file, LOCK_EX);
	// }
	// $lang_data = json_decode($file, true);

	// ----------------------
	// $dir = dirname(__file__);
	// if (!isset($_COOKIE["lang"])) {
	// 	setcookie("lang","th", time() + (86400 * 365), "/");
	// 	$lang_url = $dir."lang/th.php";
	// } else {
	// 	// $lang_url = $_SESSION["url"]."lang_app/".$_COOKIE["lang"].".php";
	// 	$lang_url = $dir."lang/".$_COOKIE["lang"].".php";
	// }
	
	// $lang_data = file_get_contents($lang_url);
	// $lang_data = json_decode($lang_data, true);
	// $lang_data = json_encode($lang_data);
?>
