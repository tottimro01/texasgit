<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../../../inc/conn.php');
require('../../../inc/function.php');


$domainType = $_POST["domainType"];
$tableID = $_POST["tableID"];
$gameShoe = $_POST["gameShoe"];
$gameRound = $_POST["gameRound"];

//echo $date2_js=file_get_contents2($server_casino2."sexy/queryTableCurrentBet.php?domainType=".$domainType."&tableID=".$tableID."&gameShoe=".$gameShoe."&gameRound=".$gameRound);

if($tableID==51){
?>
{"tableID":51,"currentBet":{"AnyTripleCurrentBet":0.3076923077,"OddCurrentBet":67.6923076924,"EvenCurrentBet":9.5384615385,"SmallCurrentBet":140.6153846155,"BigCurrentBet":69.8461538464,"Pt4CurrentBet":3.6923076923,"Pt5CurrentBet":1.8461538462,"Pt6CurrentBet":0.9230769231,"Pt7CurrentBet":2.4615384616,"Pt8CurrentBet":1.8461538462,"Pt9CurrentBet":1.5384615385,"Pt10CurrentBet":3.1073303168,"Pt11CurrentBet":1.556561086,"Pt12CurrentBet":6.7692307693,"Pt13CurrentBet":1.5384615385,"Pt14CurrentBet":2.7692307693,"Pt15CurrentBet":2.1538461539,"Pt16CurrentBet":0.9230769231,"Pt17CurrentBet":0.3076923077,"T111CurrentBet":0.0,"T222CurrentBet":0.3076923077,"T333CurrentBet":0.0,"T444CurrentBet":0.3076923077,"T555CurrentBet":0.0,"T666CurrentBet":0.0,"D11CurrentBet":0.3076923077,"D22CurrentBet":0.0,"D33CurrentBet":0.3076923077,"D44CurrentBet":0.0,"D55CurrentBet":0.6153846154,"D66CurrentBet":0.0,"Td12CurrentBet":1.5384615385,"Td13CurrentBet":0.0,"Td14CurrentBet":1.5384615385,"Td15CurrentBet":0.0,"Td16CurrentBet":0.0,"Td23CurrentBet":0.0,"Td24CurrentBet":0.6153846154,"Td25CurrentBet":0.0,"Td26CurrentBet":0.0,"Td34CurrentBet":0.6153846154,"Td35CurrentBet":0.6153846154,"Td36CurrentBet":0.0,"Td45CurrentBet":0.6153846154,"Td46CurrentBet":0.3076923077,"Td56CurrentBet":0.9230769231,"S1CurrentBet":8.3076923079,"S2CurrentBet":7.2453441297,"S3CurrentBet":17.5676113361,"S4CurrentBet":12.6153846154,"S5CurrentBet":6.4615384616,"S6CurrentBet":8.3076923077,"totalCurrentBet":388.553769947}}

<? }else{ ?>

{"tableID":<?=$tableID?>,"currentBet":{"bankerCurrentBet":2884.995037223,"playerCurrentBet":4452.9154622103,"tieCurrentBet":48.1538461543,"bankerPairCurrentBet":40.5264777334,"playerPairCurrentBet":47.6034008104,"bankerBonusCurrentBet":10.7815384618,"playerBonusCurrentBet":77.3846153852,"bigCurrentBet":0.0,"smallCurrentBet":0.0,"phoenixCurrentBet":0.0,"turtleCurrentBet":0.0,"bankerInsurance1CurrentBet":0.0,"bankerInsurance2CurrentBet":0.0,"playerInsurance1CurrentBet":0.0,"playerInsurance2CurrentBet":0.0,"tigerCurrentBet":0.0,"dragonCurrentBet":0.0,"dtTieCurrentBet":0.0,"totalCurrentBet":7562.3603779784},"maxBetRound":{"bigMaxBetRound":38,"smallMaxBetRound":38,"phoenixMaxBetRound":38,"turtleMaxBetRound":38}}
<? } ?>