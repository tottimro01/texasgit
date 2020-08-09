<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
unset($_SESSION["ttt"]);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<TITLE>::: OHOKING :::</TITLE>
<link rel="stylesheet" type="text/css" href="css/style.css?v=<?=$time_stam;?>">
<? if($_SESSION['lang']=="my"){?><link rel="stylesheet" type="text/css" href="css/style_my.css?v=<?=$time_stam;?>"><? }?>
<link href="jsui/jquery-ui.css?v=<?=$time_stam;?>" rel="stylesheet">
<script src="jsui/external/jquery/jquery.js?v=<?=$time_stam;?>"></script>
<script src="jsui/jquery-ui.js?v=<?=$time_stam;?>"></script>

</head>

<body>
</body>
</html>