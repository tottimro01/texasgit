<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
$_SESSION["show_pop"][$_POST["ke"]] = 2;
?>