<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 


	echo json_encode($_SESSION);

 ?>