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
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997196999,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997199820","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==58){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997196999,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997200764","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==57){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997196999,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997201764","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==56){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997196999,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997202784","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==55){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997196999,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997203780","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==54){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997196999,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997204789","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==53){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997196999,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997205791","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==52){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997196999,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997206793","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==51){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997196999,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997207989","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==50){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997196999,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997209018","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==49){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997196999,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997209999","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==48){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997196999,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997211046","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==47){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997196999,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997212006","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==46){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997196999,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997213024","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==45){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997196999,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997214027","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==44){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997196999,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997215036","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==43){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997196999,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997216046","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==42){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997196999,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997217079","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==41){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997196999,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997218063","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==40){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997196999,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997219076","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==39){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997196999,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997220085","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==38){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997196999,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997221098","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==37){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997196999,\"sqezzeCard\":-1,\"ucTarget\":0,\"gameState\":2,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEW_GAME_START\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[0,0,0,0,0],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997222115","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==36){ ?>
{"message":"{}","timestamp":"1555997223121","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==35){ ?>
{"message":"{}","timestamp":"1555997224123","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==34){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997222034,\"sqezzeCard\":-1,\"ucTarget\":1,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEXT_TARGET\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[38,68,55,51,55],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,8.0,11.0,11.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997225136","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==33){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997222034,\"sqezzeCard\":-1,\"ucTarget\":1,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEXT_TARGET\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[38,68,55,51,55],\"tableCards\":[255,255,255,255,255,255],\"tableCardStampTimes\":[0,0,0,0,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,8.0,11.0,11.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997226135","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==32){ ?>
{"message":"{}","timestamp":"1555997227153","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==31){ ?>
{"message":"{}","timestamp":"1555997228151","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==30){ ?>
{"message":"{}","timestamp":"1555997229157","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==29){ ?>
{"message":"{}","timestamp":"1555997230166","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==28){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997228043,\"sqezzeCard\":2,\"ucTarget\":2,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":0,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEXT_TARGET\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[38,68,55,51,55],\"tableCards\":[10,255,255,12,255,255],\"tableCardStampTimes\":[1555997226197,0,0,1555997227219,0,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,8.0,11.0,11.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997231171","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==27){ ?>
{"message":"{}","timestamp":"1555997232178","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==26){ ?>
{"message":"{}","timestamp":"1555997233231","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==25){ ?>
{"message":"{}","timestamp":"1555997234226","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==24){ ?>
{"message":"{}","timestamp":"1555997235255","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==23){ ?>
{"message":"{}","timestamp":"1555997236241","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==22){ ?>
{"message":"{}","timestamp":"1555997237255","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==21){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997235040,\"sqezzeCard\":2,\"ucTarget\":3,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":3,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEXT_TARGET\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":1,\"randomPayWeights\":[38,68,55,51,55],\"tableCards\":[10,39,255,12,41,255],\"tableCardStampTimes\":[1555997226197,1555997231073,0,1555997227219,1555997234219,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,8.0,11.0,11.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997238589","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==20){ ?>
{"message":"{}","timestamp":"1555997239606","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==19){ ?>
{"message":"{}","timestamp":"1555997240619","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==18){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997238357,\"sqezzeCard\":2,\"ucTarget\":6,\"gameState\":3,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":3,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_NEXT_TARGET\",\"roundEndTime\":-1,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":-1,\"playerHandValue\":0,\"randomPayWeights\":[38,68,55,51,55],\"tableCards\":[10,39,8,12,41,255],\"tableCardStampTimes\":[1555997226197,1555997231073,1555997238314,1555997227219,1555997234219,0],\"winner\":-1,\"winnerHandValue\":0,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,8.0,11.0,11.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997241621","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==17){ ?>
{"message":"{}","timestamp":"1555997242638","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==16){ ?>
{"message":"{}","timestamp":"1555997243651","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==15){ ?>
{"message":"{}","timestamp":"1555997244646","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==14){ ?>
{"message":"{}","timestamp":"1555997245661","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==13){ ?>
{"message":"{}","timestamp":"1555997246656","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==12){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997244256,\"sqezzeCard\":2,\"ucTarget\":6,\"gameState\":4,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":4,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_WINNER\",\"roundEndTime\":1555997244256,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":0,\"playerHandValue\":0,\"randomPayWeights\":[38,68,55,51,55],\"tableCards\":[10,39,8,12,41,26],\"tableCardStampTimes\":[1555997226197,1555997231073,1555997238314,1555997227219,1555997234219,1555997241635],\"winner\":1,\"winnerHandValue\":4,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,8.0,11.0,11.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997247701","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==11){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997244256,\"sqezzeCard\":2,\"ucTarget\":6,\"gameState\":4,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":4,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_WINNER\",\"roundEndTime\":1555997244256,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":0,\"playerHandValue\":0,\"randomPayWeights\":[38,68,55,51,55],\"tableCards\":[10,39,8,12,41,26],\"tableCardStampTimes\":[1555997226197,1555997231073,1555997238314,1555997227219,1555997234219,1555997241635],\"winner\":1,\"winnerHandValue\":4,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,8.0,11.0,11.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997248674","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==10){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997244256,\"sqezzeCard\":2,\"ucTarget\":6,\"gameState\":4,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":4,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_WINNER\",\"roundEndTime\":1555997244256,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":0,\"playerHandValue\":0,\"randomPayWeights\":[38,68,55,51,55],\"tableCards\":[10,39,8,12,41,26],\"tableCardStampTimes\":[1555997226197,1555997231073,1555997238314,1555997227219,1555997234219,1555997241635],\"winner\":1,\"winnerHandValue\":4,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,8.0,11.0,11.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997249687","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==9){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997244256,\"sqezzeCard\":2,\"ucTarget\":6,\"gameState\":4,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":4,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_WINNER\",\"roundEndTime\":1555997244256,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":0,\"playerHandValue\":0,\"randomPayWeights\":[38,68,55,51,55],\"tableCards\":[10,39,8,12,41,26],\"tableCardStampTimes\":[1555997226197,1555997231073,1555997238314,1555997227219,1555997234219,1555997241635],\"winner\":1,\"winnerHandValue\":4,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,8.0,11.0,11.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997250696","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==8){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997244256,\"sqezzeCard\":2,\"ucTarget\":6,\"gameState\":4,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":4,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_WINNER\",\"roundEndTime\":1555997244256,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":0,\"playerHandValue\":0,\"randomPayWeights\":[38,68,55,51,55],\"tableCards\":[10,39,8,12,41,26],\"tableCardStampTimes\":[1555997226197,1555997231073,1555997238314,1555997227219,1555997234219,1555997241635],\"winner\":1,\"winnerHandValue\":4,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,8.0,11.0,11.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997251697","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==7){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997244256,\"sqezzeCard\":2,\"ucTarget\":6,\"gameState\":4,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":4,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_WINNER\",\"roundEndTime\":1555997244256,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":0,\"playerHandValue\":0,\"randomPayWeights\":[38,68,55,51,55],\"tableCards\":[10,39,8,12,41,26],\"tableCardStampTimes\":[1555997226197,1555997231073,1555997238314,1555997227219,1555997234219,1555997241635],\"winner\":1,\"winnerHandValue\":4,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,8.0,11.0,11.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997252717","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==6){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997244256,\"sqezzeCard\":2,\"ucTarget\":6,\"gameState\":4,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":4,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_WINNER\",\"roundEndTime\":1555997244256,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":0,\"playerHandValue\":0,\"randomPayWeights\":[38,68,55,51,55],\"tableCards\":[10,39,8,12,41,26],\"tableCardStampTimes\":[1555997226197,1555997231073,1555997238314,1555997227219,1555997234219,1555997241635],\"winner\":1,\"winnerHandValue\":4,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,8.0,11.0,11.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997253732","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==5){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997244256,\"sqezzeCard\":2,\"ucTarget\":6,\"gameState\":4,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":4,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_WINNER\",\"roundEndTime\":1555997244256,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":0,\"playerHandValue\":0,\"randomPayWeights\":[38,68,55,51,55],\"tableCards\":[10,39,8,12,41,26],\"tableCardStampTimes\":[1555997226197,1555997231073,1555997238314,1555997227219,1555997234219,1555997241635],\"winner\":1,\"winnerHandValue\":4,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,8.0,11.0,11.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997254751","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==4){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997244256,\"sqezzeCard\":2,\"ucTarget\":6,\"gameState\":4,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":4,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_WINNER\",\"roundEndTime\":1555997244256,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":0,\"playerHandValue\":0,\"randomPayWeights\":[38,68,55,51,55],\"tableCards\":[10,39,8,12,41,26],\"tableCardStampTimes\":[1555997226197,1555997231073,1555997238314,1555997227219,1555997234219,1555997241635],\"winner\":1,\"winnerHandValue\":4,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,8.0,11.0,11.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997255774","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==3){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997244256,\"sqezzeCard\":2,\"ucTarget\":6,\"gameState\":4,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":4,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_WINNER\",\"roundEndTime\":1555997244256,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":0,\"playerHandValue\":0,\"randomPayWeights\":[38,68,55,51,55],\"tableCards\":[10,39,8,12,41,26],\"tableCardStampTimes\":[1555997226197,1555997231073,1555997238314,1555997227219,1555997234219,1555997241635],\"winner\":1,\"winnerHandValue\":4,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,8.0,11.0,11.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997256788","status":"200"}
<? $num_c = $num_c-1; $_SESSION["time_sexy"] = $num_c; exit(); } ?>

<? if($num_c==2){ ?>
{"message":"{\"tableID\":<?=$tableID?>,\"deliverTime\":1555997244256,\"sqezzeCard\":2,\"ucTarget\":6,\"gameState\":4,\"lockReason\":0,\"iTime\":24,\"insuranceBetTime\":16,\"gameRound\":<?=$gameRound?>,\"gameShoe\":<?=$gameShoe?>,\"bankerHandValue\":4,\"dealerId\":\"Mar/Venezuela\",\"managerId\":\"\",\"eventType\":\"GP_WINNER\",\"roundEndTime\":1555997244256,\"roundStartTime\":1555997196999,\"insuranceStartTime1st\":-1,\"insuranceStartTime2nd\":-1,\"natural\":false,\"pairState\":0,\"playerHandValue\":0,\"randomPayWeights\":[38,68,55,51,55],\"tableCards\":[10,39,8,12,41,26],\"tableCardStampTimes\":[1555997226197,1555997231073,1555997238314,1555997227219,1555997234219,1555997241635],\"winner\":1,\"winnerHandValue\":4,\"shuffle\":0,\"randomPayOdds\":[0.0,0.0,8.0,11.0,11.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0]}","delayTime":9000,"timestamp":"1555997257797","status":"200"}
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

