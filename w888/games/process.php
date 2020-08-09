<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Process</title>
<script src="../js/jquery-1.9.1.min.js?v=2019"></script>
<script type="application/javascript">

 $(document).ready(function() {
	 $("#bet_time").load('time_process.php');
   var refreshId = setInterval(function() {
	  $("#bet_time").load('time_process.php');
	    $("#fake_run").load('fake_run.php');
   }, 1000);
   $.ajaxSetup({ cache: false });
});

</script>
</head>

<body>
<div id="bet_time"></div>
<div id="fake_run"></div>
</body>
</html>