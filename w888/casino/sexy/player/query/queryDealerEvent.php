<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../../../inc/conn.php');
require('../../../inc/function.php');


$domainType = $_POST["domainType"];
$queryTableID = $_POST["queryTableID"];
$dealerEventStampTime = $_POST["dealerEventStampTime"];

//echo $date2_js=file_get_contents2($server_casino2."sexy/queryDealerEventV2.php?domainType=".$domainType."&queryTableID=".$queryTableID."&dealerEventStampTime=".$dealerEventStampTime);
?>
<?
$num_c = intval($_SESSION["time_sexy"]);
$gameRound = $_SESSION["gameRound"];
$gameShoe = $_SESSION["gameShoe"];

$tableID = $_POST["queryTableID"];
?>
<? if($num_c==60){ ?>
{"message":"{}","timestamp":"1555997197601","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==59){ ?>
{"message":"{}","timestamp":"1555997197601","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==58){ ?>
{"status":"200","timestamp":"1557203714165","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203710896,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==57){ ?>
{"status":"200","timestamp":"1557203715180","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203710896,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==56){ ?>
{"status":"200","timestamp":"1557203716190","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203710896,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==55){ ?>
{"status":"200","timestamp":"1557203717195","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203710896,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==54){ ?>
{"status":"200","timestamp":"1557203718206","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203710896,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==53){ ?>
{"status":"200","timestamp":"1557203719214","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203710896,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==52){ ?>
{"status":"200","timestamp":"1557203720217","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203710896,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==51){ ?>
{"status":"200","timestamp":"1557203721225","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203710896,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==50){ ?>
{"status":"200","timestamp":"1557203723255","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203710896,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==49){ ?>
{"status":"200","timestamp":"1557203724259","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203710896,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==48){ ?>
{"status":"200","timestamp":"1557203725268","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203710896,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==47){ ?>
{"status":"200","timestamp":"1557203726269","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203710896,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==46){ ?>
{"status":"200","timestamp":"1557203727284","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203710896,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==45){ ?>
{"status":"200","timestamp":"1557203728285","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203710896,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==44){ ?>
{"status":"200","timestamp":"1557203729297","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203710896,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==43){ ?>
{"status":"200","timestamp":"1557203730300","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203710896,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==42){ ?>
{"status":"200","timestamp":"1557203731315","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203710896,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==41){ ?>
{"status":"200","timestamp":"1557203733364","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203710896,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==40){ ?>
{"status":"200","timestamp":"1557203734376","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203710896,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==39){ ?>
{"status":"200","timestamp":"1557203735388","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203710896,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==38){ ?>
{"status":"200","timestamp":"1557203736393","message":"{}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==37){ ?>
{"status":"200","timestamp":"1557203737398","message":"{}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==36){ ?>
{"status":"200","timestamp":"1557203738404","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203735713,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_CHANGE_STATE\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==35){ ?>
{"status":"200","timestamp":"1557203739429","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203735713,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_CHANGE_STATE\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==34){ ?>
{"status":"200","timestamp":"1557203740424","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203735713,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_CHANGE_STATE\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==33){ ?>
{"status":"200","timestamp":"1557203741444","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203735713,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_CHANGE_STATE\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==32){ ?>
{"status":"200","timestamp":"1557203742444","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203735713,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_CHANGE_STATE\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==31){ ?>
{"status":"200","timestamp":"1557203743454","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203735713,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_CHANGE_STATE\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==30){ ?>
{"status":"200","timestamp":"1557203744456","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203735713,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_CHANGE_STATE\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==29){ ?>
{"status":"200","timestamp":"1557203745465","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203735713,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_CHANGE_STATE\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==28){ ?>
{"status":"200","timestamp":"1557203746486","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203735713,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_CHANGE_STATE\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==27){ ?>
{"status":"200","timestamp":"1557203747490","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203735713,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_CHANGE_STATE\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==26){ ?>
{"status":"200","timestamp":"1557203748490","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203735713,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_CHANGE_STATE\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==25){ ?>
{"status":"200","timestamp":"1557203749503","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203735713,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_CHANGE_STATE\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==24){ ?>
{"status":"200","timestamp":"1557203750506","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203735713,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_CHANGE_STATE\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==23){ ?>
{"status":"200","timestamp":"1557203751522","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203735713,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_CHANGE_STATE\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==22){ ?>
{"message":"{}","timestamp":"1555997237255","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==21){ ?>
{"status":"200","timestamp":"1557203752523","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203735713,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_CHANGE_STATE\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==20){ ?>
{"status":"200","timestamp":"1557203753539","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203735713,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_CHANGE_STATE\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==19){ ?>
{"status":"200","timestamp":"1557203754540","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203735713,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_CHANGE_STATE\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==18){ ?>
{"status":"200","timestamp":"1557203755552","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203735713,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_CHANGE_STATE\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==17){ ?>
{"status":"200","timestamp":"1557203756557","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203735713,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_CHANGE_STATE\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==16){ ?>
{"status":"200","timestamp":"1557203757566","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203735713,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_CHANGE_STATE\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==15){ ?>
{"status":"200","timestamp":"1557203758569","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203735713,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_CHANGE_STATE\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==14){ ?>
{"status":"200","timestamp":"1557203759633","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203735713,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_CHANGE_STATE\",\"roundEndTime\":-1,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==13){ ?>
{"status":"200","timestamp":"1557203760639","message":"{}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==12){ ?>
{"status":"200","timestamp":"1557203761645","message":"{}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==11){ ?>
{"status":"200","timestamp":"1557203762661","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203759860,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":4,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_WINNER\",\"roundEndTime\":1557203759860,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":9,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[1,2,6,255,255,255],\"tableCardStampTimes\":[1557203759859,1557203759859,1557203759860,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==10){ ?>
{"status":"200","timestamp":"1557203763678","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203759860,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":4,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_WINNER\",\"roundEndTime\":1557203759860,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":9,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[1,2,6,255,255,255],\"tableCardStampTimes\":[1557203759859,1557203759859,1557203759860,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==9){ ?>
{"status":"200","timestamp":"1557203764676","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203759860,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":4,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_WINNER\",\"roundEndTime\":1557203759860,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":9,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[1,2,6,255,255,255],\"tableCardStampTimes\":[1557203759859,1557203759859,1557203759860,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==8){ ?>
{"status":"200","timestamp":"1557203765697","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203759860,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":4,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_WINNER\",\"roundEndTime\":1557203759860,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":9,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[1,2,6,255,255,255],\"tableCardStampTimes\":[1557203759859,1557203759859,1557203759860,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==7){ ?>
{"status":"200","timestamp":"1557203766715","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203759860,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":4,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_WINNER\",\"roundEndTime\":1557203759860,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":9,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[1,2,6,255,255,255],\"tableCardStampTimes\":[1557203759859,1557203759859,1557203759860,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==6){ ?>
{"status":"200","timestamp":"1557203767740","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203759860,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":4,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_WINNER\",\"roundEndTime\":1557203759860,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":9,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[1,2,6,255,255,255],\"tableCardStampTimes\":[1557203759859,1557203759859,1557203759860,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==5){ ?>
{"status":"200","timestamp":"1557203768738","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203759860,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":4,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_WINNER\",\"roundEndTime\":1557203759860,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":9,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[1,2,6,255,255,255],\"tableCardStampTimes\":[1557203759859,1557203759859,1557203759860,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==4){ ?>
{"status":"200","timestamp":"1557203769752","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203759860,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":4,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_WINNER\",\"roundEndTime\":1557203759860,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":9,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[1,2,6,255,255,255],\"tableCardStampTimes\":[1557203759859,1557203759859,1557203759860,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==3){ ?>
{"status":"200","timestamp":"1557203770754","message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1557203759860,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":4,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":0,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Laura/Mexico\",\"managerId\":\"\",\"eventType\":\"GP_WINNER\",\"roundEndTime\":1557203759860,\"roundStartTime\":1557203710896,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":9,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[1,2,6,255,255,255],\"tableCardStampTimes\":[1557203759859,1557203759859,1557203759860,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==2){ ?>
{"status":"200","timestamp":"1557203771862","message":"{}"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==1){ ?>
{"message":"{}","timestamp":"1555997259022","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==0){ ?>
{"message":"{}","timestamp":"1555997260037","status":"200"}
<? $num_c = 60; $_SESSION["time_sexy"] = $num_c; 

$_SESSION["gameRound"] = $_SESSION["gameRound"]+1;
$_SESSION["gameShoe"] = $_SESSION["gameShoe"]+1;

exit(); } ?>

