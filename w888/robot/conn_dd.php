<?php 
$conn;
$hostname_conn = "localhost";


if($_SERVER['REMOTE_ADDR']=="127.0.0.1")
{
$hostserver="http://localhost/2014/168step.com/";
$database_conn = "c1_cmdstep";
$username_conn = "root";
$password_conn = "1234";
$check_url="168step.com";
}
else
{
	#	$hostname_conn = "202.162.78.180";
		$username_conn = "admin_root";
		$password_conn = "963214785";
		

		$database_conn = "admin_lotzx";
}


?>