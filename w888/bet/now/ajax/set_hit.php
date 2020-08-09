<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
//Step & YODAY
require('../../inc/conn.php');
require('../../inc/function.php');

if($_SESSION[admin]!=1){exit();}

$id = $_POST["id"];
$add = $_POST["add"];
$val = $_POST["val"];

if($_SESSION[hit][$id][$add]==1){
	unset($_SESSION[hit][$id][$add]);
}else{
	$_SESSION[hit][$id][$add]=$val;
}

?>
