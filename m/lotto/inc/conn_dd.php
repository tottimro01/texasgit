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


$hostserver="http://abc.wan1991.com/";

######################################

$hostname_conn = "localhost";		
$username_conn = "db_root";
$password_conn = "eCNfz4FW4-6svCHQ";
$database_conn = "ohoking_db";

################################
$hostname_conn2 = "localhost";		
$username_conn2 = "db_root";
$password_conn2 = "eCNfz4FW4-6svCHQ";
$database_conn2 = "ohoking_sp";
#################################


################################
$hostname_conn3 = "localhost";		
$username_conn3 = "db_root";
$password_conn3 = "eCNfz4FW4-6svCHQ";
$database_conn3 = "ohoking_lot";
#################################

##############Store Mount###################
$hostname_conn10 = "61.19.21.220";		
$username_conn10 = "db_root";
$password_conn10 = "eCNfz4FW4-6svCHQ";
$database_conn10 = "ohoking_db10";

$hostname_conn11 = "61.19.21.220";		
$username_conn11 = "db_root";
$password_conn11 = "eCNfz4FW4-6svCHQ";
$database_conn11 = "ohoking_db11";
#################################



		
$check_url="wan1991.com";	



}

$nodejs_ip = "45.76.155.244:9899";

$process_lotto = "http://".$_SERVER['SERVER_ADDR']."/~ohoking/lotto/";
$process_sc = "http://".$_SERVER['SERVER_ADDR']."/~ohoking/";


?>