<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>AUTO</title>
<style>

</style>
<script src="../js/jquery-1.9.1.min.js?v=2019"></script>
<script type="text/javascript" >

	
 $(document).ready(function() {

 	$("#live_1").load('today/football_live.php');
	$("#live_2").load('today/muaythai_live.php');
	$("#live_3").load('today/basketball_live.php');
	$("#live_4").load('today/usa_ball_live.php');
	$("#live_5").load('today/baseball_live.php');
	$("#live_6").load('today/hocky_live.php');
	$("#live_7").load('today/tennis_live.php');
	$("#live_8").load('today/volleyball_live.php');
	$("#live_9").load('today/badminton_live.php');
	$("#live_10").load('today/snooker_live.php');
	
	
 	$("#today_1").load('today/football_today.php');
	$("#today_2").load('today/muaythai_today.php');
	$("#today_3").load('today/basketball_today.php');
	$("#today_4").load('today/usa_ball_today.php');
	$("#today_5").load('today/baseball_today.php');
	$("#today_6").load('today/hocky_today.php');
	$("#today_7").load('today/tennis_today.php');
	$("#today_8").load('today/volleyball_today.php');
	$("#today_9").load('today/badminton_today.php');
	$("#today_10").load('today/snooker_today.php');
	
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////
   var refreshId = setInterval(function() {
	   
 	$("#live_1").load('today/football_live.php');
	$("#live_2").load('today/muaythai_live.php');
	$("#live_3").load('today/basketball_live.php');
	$("#live_4").load('today/usa_ball_live.php');
	$("#live_5").load('today/baseball_live.php');
	$("#live_6").load('today/hocky_live.php');
	$("#live_7").load('today/tennis_live.php');
	$("#live_8").load('today/volleyball_live.php');
	$("#live_9").load('today/badminton_live.php');
	$("#live_10").load('today/snooker_live.php');
	$("#not_session").load('del_session.php');
   }, 30000);
   $.ajaxSetup({ cache: false });
   
   
	///////////////////////////////////////////////////////////////////////////////////////////////////////
   var refreshId = setInterval(function() {
	   
 	$("#today_1").load('today/football_today.php');
	$("#today_2").load('today/muaythai_today.php');
	$("#today_3").load('today/basketball_today.php');
	$("#today_4").load('today/usa_ball_today.php');
	$("#today_5").load('today/baseball_today.php');
	$("#today_6").load('today/hocky_today.php');
	$("#today_7").load('today/tennis_today.php');
	$("#today_8").load('today/volleyball_today.php');
	$("#today_9").load('today/badminton_today.php');
	$("#today_10").load('today/snooker_today.php');
	
	
   }, 90000);
   $.ajaxSetup({ cache: false });
   
   
    });  	 



</script>

</head>
<body>
<? for($x=1;$x<=10;$x++){?>
<span id="live_<?=$x;?>"></span>
<? }?>
<? for($x=1;$x<=10;$x++){?>
<span id="today_<?=$x;?>"></span>
<? }?>
<span id="not_session"></span>
</body>
</html>