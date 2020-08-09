<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>

<?php
require('../inc/conn.php');
require('../inc/function.php');

require("../lang/th.php");
?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<TITLE>::: OHOBET :::</TITLE>
</head>

<body>

<?

$week=date("W", strtotime('last week'));   
$date=date("d-m-Y", strtotime('monday last week'));   
$date_x=date("D", strtotime('monday last week'));   
$end_date =date("d-m-Y", strtotime('sunday last week'));		

		
?>
  
</body>
</html>