<?php ob_start(); if (!isset($_SESSION)) { session_start(); }
if($_SESSION['lang']==""){$_GET['lang']='th';}
else{$_GET['lang']=$_SESSION['lang'];}
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Statistic Info</title>
</head>

<frameset rows="*" cols="*" frameborder="no" border="0" framespacing="0" scrolling="yes">
    <frame src="https://s5.sir.sportradar.com/mi002/<?=$_GET['lang'];?>/match/m<?=$_GET['MatchId'];?>" scrolling="Yes" noresize="noresize" lang=UTF-8 />
</frameset>

</html>
