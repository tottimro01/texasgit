<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ISC</title>
<meta http-equiv="Cache-Control" content="no-store">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="-1">    
<script type="text/javascript" src="../js/jquery-latest.js"></script>

<script type="text/javascript" >

 $(document).ready(function() {

$("#isc888").load('isc_get.php'); 
   var refreshId = setInterval(function() {
$("#isc888").load('isc_get.php'); 

   }, 6000);
   $.ajaxSetup({ cache: false });

});


</script>


</head>

<body>

<div id="isc888"></div>

</body>
</html>
