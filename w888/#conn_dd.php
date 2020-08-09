<?php 
$conn;
$hostname_conn = "localhost";


if($_SERVER['REMOTE_ADDR']=="127.0.0.1" or $_SERVER['REMOTE_ADDR']=="::1"){
$hostserver="http://localhost:81/2016/cmdstep.com/";
$database_conn = "c1_cmdstep";
$username_conn = "root";
$password_conn = "1234";
$check_url="cmdstep.com";


}else{


$hostserver="http://abc.ohoking.com/";

######################################

$hostname_conn = "localhost";		
$username_conn = "ohoking_root";
$password_conn = "963214785";
$database_conn = "ohoking_db";

################################
$hostname_conn2 = "localhost";		
$username_conn2 = "ohoking_root";
$password_conn2 = "963214785";
$database_conn2 = "ohoking_sp";
#################################


################################
$hostname_conn3 = "localhost";		
$username_conn3 = "ohoking_root";
$password_conn3 = "963214785";
$database_conn3 = "ohoking_lot";
#################################

##############Store Mount###################
$hostname_conn10 = "localhost";		
$username_conn10 = "ohoking_root";
$password_conn10 = "963214785";
$database_conn10 = "ohoking_db10";

$hostname_conn11 = "localhost";		
$username_conn11 = "ohoking_root";
$password_conn11 = "963214785";
$database_conn11 = "ohoking_db11";
#################################



		
$check_url="ohoking.com";	



}

$nodejs_ip = "27.254.65.237:9899";


?>