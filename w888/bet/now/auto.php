<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>SAVE</title>
<style>

</style>
<script src="../js/jquery-1.9.1.js"></script>
<script type="text/javascript" >

	
 $(document).ready(function() {

 	$("#live_1").load('now_save.php');
	$("#now_1").load('now.php');
	$("#x_del").load('del.php');	
	///////////////////////////////////////////////////////////////////////////////////////////////////////

   var refreshId = setInterval(function() {
 	$("#live_1").load('now_save.php');	
	$("#now_1").load('now.php');
   }, 1000*15);

   var refreshId = setInterval(function() {
 	$("#x_del").load('del.php');	
   }, 1000*600);
  /* 
   var refreshId = setInterval(function() {
 	$("#live_data").load('../data/read_live.php');	
   }, 1000*60*30);
   */
   $.ajaxSetup({ cache: false });
   
   

   
   
    });  	 



</script>

</head>
<body>
<span id="live_1"></span>
<span id="now_1"></span>
<span id="x_del"></span>
<hr>
<div id="live_data"></div>
</body>
</html>