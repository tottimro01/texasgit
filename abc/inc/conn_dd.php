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


$hostserver="http://abc.texasbetx.com/";

######################################

/*
$hostname_conn = "localhost";		
$username_conn = "db_root";
$password_conn = "eCNfz4FW4-6svCHQ";
$database_conn = "ohoking_db";
*/
$hostname_conn = "103.146.67.30:3380";		
$username_conn = "db_root";
$password_conn = "eCNfz4FW4-6svCHQ";
$database_conn = "c1_texasdb";

################################
$hostname_conn2 = "45.76.153.196";		
$username_conn2 = "da_admin";
$password_conn2 = "ACFwfj5xNw";
$database_conn2 = "ohoking_sp";
#################################

################################
$hostname_conn4 = "localhost";		
$username_conn4 = "db_root";
$password_conn4 = "eCNfz4FW4-6svCHQ";
$database_conn4 = "ohoking_sp";
#################################


################################
$hostname_conn3 = "localhost";		
$username_conn3 = "db_root";
$password_conn3 = "eCNfz4FW4-6svCHQ";
$database_conn3 = "ohoking_lot";
#################################





		
$check_url="texasbetx.com";	



}

$nodejs_ip = "103.146.67.29:9899";

$process_lotto = "http://".$_SERVER['SERVER_ADDR']."/~ohoking/lotto/";
$process_sc = "http://".$_SERVER['SERVER_ADDR']."/~ohoking/";


?>