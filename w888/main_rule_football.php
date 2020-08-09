<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');

require("lang/variable_lang.php");
// require("lang/member_lang.php");
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CONFIG</title>
<link rel="stylesheet" type="text/css" href="css/style.css?v=2019">
<? if($_SESSION['lang']=="mm"){?><link rel="stylesheet" type="text/css" href="css/style_mm.css?v=2019"><? }?>
<link href="css/table_w.css" rel="stylesheet" type="text/css">
<link href="css/infocss.css" rel="stylesheet" type="text/css">
<link href="css/button.css" rel="stylesheet" type="text/css">
<link href="jsui/jquery-ui.css?v=0001" rel="stylesheet">
<script src="jsui/external/jquery/jquery.js?v=2019"></script>
<script src="jsui/jquery-ui.js?v=2019"></script>
<script>
$(function() {
    $( ".datepicker" ).datepicker({
      showOn: "button",
      buttonImage: "img/calendar.png",
      buttonImageOnly: true,
      buttonText: "Select date",
	  dateFormat:"dd/mm/yy"
    });
  });

  try{
    parent.leftx.unselectSportMenu();
  }catch(e){
    console.log(e);
  }
  </script>
<script>
var fw;
$(document).ready(function() {
	 to_width(<?=$_GET["vvw"]?>);
});
function to_width(ty){
	if(ty==1){
		$("#main_left").width(975);
		fw = 1;
	}else{
		$("#main_left").width(770);
		fw = 0;
	}
}
</script>
</head>

<body>
<? 
    include 'mname_tmpl.php'; 
    include 'mtimezone_tmpl.php';
?>
<? include 'lang/rule/'.$_SESSION['lang'].'_football.php'; ?>
</body>
</html>