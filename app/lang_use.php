<?php
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);
$_GET['lang'] = ($_GET['lang']=="" ? "th" : $_GET['lang']);
require("/home/ohoking/domains/wan1991.com/public_html/app/admin_lang/export/lang_member_".$_GET['lang'].".php");
echo json_encode($lang_member);
?>
