

<script>

$(document).ready(function() {

 	$("#token").load('token.php');
   var refreshId = setInterval(function() {
 	$("#token").load('token.php');
   }, 10000);
   $.ajaxSetup({ cache: false });
     });  	

</script>

<?php 


$token = md5(uniqid(rand(),1));
$_SESSION[bettoken]=$token;
$fo="../json/games/session_".$_SESSION[mid].".php";
@unlink($fo);
$fp = @fopen($fo, 'w');
@fwrite($fp, '<? $bettoken="'.$token.'"; ?>');
@fclose($fp);




 ?>