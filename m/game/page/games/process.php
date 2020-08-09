<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
require('../inc/conn.php');
require('../inc/function.php');
require('function.php');
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Process</title>
<script src="../js/jquery-1.9.1.min.js?v=0001"></script>
<script type="application/javascript">

 $(document).ready(function() {
	 $("#bet_time").load('time_process.php');
   var refreshId = setInterval(function() {
	  $("#bet_time").load('time_process.php');
   }, 1000);
   $.ajaxSetup({ cache: false });
});

</script>
</head>

<body>
<div id="bet_time"></div>
</body>
</html>