<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');

require("lang/variable_lang.php");

	  #Sexy
	  $url=$x_process.'api/sexy/login_games.php?user='.$_SESSION['m_user'].'&lang='.$_SESSION['lang'];
	 $data=file_get_contents2($url);
	 # $data2 = json_encode($data);
     $data = json_decode($data);
	  # echo $data['status'];
	echo $data->status;
	  #echo $data2->status;
	  #echo ($data2['status']);
	#  print_r($data);




?>
