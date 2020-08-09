<?php 
		
	function connect(){
		global $connect;
		$connect = mysql_connect("localhost","aemcup_kengeng","17093436") or die("***Error Connect Database***");
	$objDB = mysql_select_db("aemcup_kengeng");
	mysql_query("SET NAMES UTF8");
		}
		
	function disconnect(){
		global $connect;
		mysql_close($connect) or die("***Error Disconnect Database***");		
		}
		
?>