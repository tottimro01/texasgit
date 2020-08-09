<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
if(strstr($_SERVER['HTTP_REFERER'],$check_url.'/block_login.html')){
@session_start(); 
@session_destroy();
@header('Location: login.html');exit();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<TITLE>::: OHOKING :::</TITLE>
</head>
<body>
</body>
</html>