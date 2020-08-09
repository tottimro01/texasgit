<?php
$conn;
$hostname_conn = "localhost";

if($_SERVER['REMOTE_ADDR']=="127.0.0.1" or $_SERVER['REMOTE_ADDR']=="::1")
{
$hostserver="http://localhost:81/2016/lotzx.com/";
$database_conn = "lotto_lotzx";
$username_conn = "root";
$password_conn = "1234";

 $check_url="localhost";
}else{
	
	    $hostserver="http://w888.texasbetx.com/";
		



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
$username_conn3 = "ohoking_root";
$password_conn3 = "963214785";
$database_conn3 = "ohoking_lot";
#################################




		
		 $check_url="texasbetx.com";


		 $x_process="http://".$_SERVER['SERVER_ADDR']."/~ohoking/";
	     $json_data="/home/ohoking/domains/proking.com/public_html/";
		 $json_path="/home/ohoking/domains/proking.com/public_html/";
}


$streaming="rtmp://fms.105.net/live/rmc1";

$site_agent=array("ag.texasbetx.com");
$site_member=array("www.texasbetx.com");
$site_abc=array("abc.texasbetx.com");

$site_url = "http://www.texasbetx.com/";

$json_file_main = "http://www.texasbetx.com/";

$nodejs_ip = "103.146.67.29:9899";
$nodejs_ip_test = "103.146.67.29:9799";

$af_sport=0.5;
$af_lotto=4;
$af_lothun=4;
$af_games=0.5;
$af_casino=0.1;
	
?>