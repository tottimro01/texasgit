<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../../inc/conn.php');
require('../../inc/function.php');

if($_SESSION['admin_viewer'] == "av"){
?>

<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="./css/style.css" type="text/css" >

</head>
<body>
<?php
	include('./inc/view_search.php');
	include('./inc/view_show.php');
?>
            
</body>
</html>
<?php

	}
	else{
		echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=./index.php'>";
	}
?>