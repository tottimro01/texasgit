<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../../../inc/conn.php');
require('../../../inc/function.php');

$_SESSION["idleCount"] = $_SESSION["idleCount"]+1;

$domainType = $_POST["domainType"];
$tableID = $_POST["tableID"];
$gameShoe = $_POST["gameShoe"];
$gameRound = $_POST["gameRound"];

//echo $date2_js=file_get_contents2($server_casino2."sexy/queryTransactions.php?domainType=".$domainType."&tableID=".$tableID."&gameShoe=".$gameShoe."&gameRound=".$gameRound);


//ตัวเตะออกไม่เล่น 5 ครั้ง

?>
{"bacTxns":[],"longHuTxns":[],"idleCount":1}