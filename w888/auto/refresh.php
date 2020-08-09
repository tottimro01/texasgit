<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>REFRESH</title>
<style>

</style>
<script src="../js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" >

	
 $(document).ready(function() {

 	$("#live_1").load('refresh/football_live_refresh.php');
	$("#live_2").load('refresh/muaythai_live_refresh.php');
	$("#live_3").load('refresh/basketball_live_refresh.php');
	$("#live_4").load('refresh/usa_ball_live_refresh.php');
	$("#live_5").load('refresh/baseball_live_refresh.php');
	$("#live_6").load('refresh/hocky_live_refresh.php');
	$("#live_7").load('refresh/tennis_live_refresh.php');
	$("#live_8").load('refresh/volleyball_live_refresh.php');
	$("#live_9").load('refresh/badminton_live_refresh.php');
	$("#live_10").load('refresh/snooker_live_refresh.php');
	
	
 	$("#today_1").load('refresh/football_today_refresh.php');
	$("#today_2").load('refresh/muaythai_today_refresh.php');
	$("#today_3").load('refresh/basketball_today_refresh.php');
	$("#today_4").load('refresh/usa_ball_today_refresh.php');
	$("#today_5").load('refresh/baseball_today_refresh.php');
	$("#today_6").load('refresh/hocky_today_refresh.php');
	$("#today_7").load('refresh/tennis_today_refresh.php');
	$("#today_8").load('refresh/volleyball_today_refresh.php');
	$("#today_9").load('refresh/badminton_today_refresh.php');
	$("#today_10").load('refresh/snooker_today_refresh.php');
	
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////
   var refreshId = setInterval(function() {
	   
 	$("#live_1").load('refresh/football_live_refresh.php');
	$("#live_2").load('refresh/muaythai_live_refresh.php');
	$("#live_3").load('refresh/basketball_live_refresh.php');
	$("#live_4").load('refresh/usa_ball_live_refresh.php');
	$("#live_5").load('refresh/baseball_live_refresh.php');
	$("#live_6").load('refresh/hocky_live_refresh.php');
	$("#live_7").load('refresh/tennis_live_refresh.php');
	$("#live_8").load('refresh/volleyball_live_refresh.php');
	$("#live_9").load('refresh/badminton_live_refresh.php');
	$("#live_10").load('refresh/snooker_live_refresh.php');
	
	
	
 	$("#today_1").load('refresh/football_today_refresh.php');
	$("#today_2").load('refresh/muaythai_today_refresh.php');
	$("#today_3").load('refresh/basketball_today_refresh.php');
	$("#today_4").load('refresh/usa_ball_today_refresh.php');
	$("#today_5").load('refresh/baseball_today_refresh.php');
	$("#today_6").load('refresh/hocky_today_refresh.php');
	$("#today_7").load('refresh/tennis_today_refresh.php');
	$("#today_8").load('refresh/volleyball_today_refresh.php');
	$("#today_9").load('refresh/badminton_today_refresh.php');
	$("#today_10").load('refresh/snooker_today_refresh.php');
	$("#x_del").load('refresh/del.php');
	
   }, 10000);
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
<span id="x_del"></span>
</body>
</html>