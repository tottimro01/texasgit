<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
require ("../inc/conn.php");
require ("../inc/function.php");

echo file_get_contents2("../json/news/games.json");
?>