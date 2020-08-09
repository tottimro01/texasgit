<?php
	if($_COOKIE['Language']==""){
    	setcookie( "Language", 'th', time()+31104000, "/");
	}
	$lang = $_COOKIE['Language'];
	require(__DIR__.'/../../../w1/admin_lang/export/lang_member_'.$lang.'.php');
?>