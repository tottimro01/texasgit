<?php 
ob_start(); if (!isset($_SESSION)) { session_start(); } 

	@session_start(); 
	@session_destroy();
	// @header('Location: index.php');
	// exit();

 ?>