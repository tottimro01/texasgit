<?
	$langCookieKey = "txb_m_lang";
	$lang = $_COOKIE[$langCookieKey];
	if($lang == ""){
		$lang = "th";
		setcookie($langCookieKey, $lang, time() + (86400 * 30), "/");
	}
	require __DIR__ . "/../../../admin_lang/export/lang_member_$lang.php";
?>