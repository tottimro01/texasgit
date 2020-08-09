<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
if(strstr($_SERVER['HTTP_REFERER'],$check_url.'/block_login.html')){
@session_start(); 
@session_destroy();
@header('Location: index.php');exit();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<TITLE>::: OHOBET :::</TITLE>
</head>
<body>
</body>
</html>