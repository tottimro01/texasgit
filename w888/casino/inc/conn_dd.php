<?php
$conn;
$hostname_conn = "localhost";

if($_SERVER['REMOTE_ADDR']=="127.0.0.1" or $_SERVER['REMOTE_ADDR']=="::1"){
$hostserver="http://localhost:81/2016/lotzx.com/";
$database_conn = "lotto_lotzx";
$username_conn = "root";
$password_conn = "1234";

 $check_url="localhost";
}else{
	
	    $hostserver="http://www.ohoking.com/";
		
$hostname_conn = "localhost";		
$username_conn = "lotzx_root";

################################



$hostname_conn = "61.19.21.220";		
$username_conn = "db_root";
$password_conn = "eCNfz4FW4-6svCHQ";
$database_conn = "ohoking_db";

################################
$hostname_conn2 = "61.19.21.220";		
$username_conn2 = "db_root";
$password_conn2 = "eCNfz4FW4-6svCHQ";
$database_conn2 = "ohoking_sp";
#################################


################################
$hostname_conn3 = "61.19.21.220";		
$username_conn3 = "db_root";
$password_conn3 = "eCNfz4FW4-6svCHQ";
$database_conn3 = "ohoking_lot";
#################################



		
		 $check_url="ohoking.com";


		 $x_process="http://61.19.21.220/~ohoking/";
		 //$json_sport="/home/ohoking/domains/ohoking.com/public_html/";
	    #$json_sport="/home/ohobet/domains/ohobet.com/public_html/";
	     $json_data="/home/ohoking/domains/proking.com/public_html/";
}

$server_casino="/home/ohoking/domains/proking.com/public_html/casino/";
$server_casino2="http://61.19.21.221/~ohoking/casino/";

$streaming="rtmp://tv2.ohoking.com:1935/live/xxx";

$site_agent=array("ag.ohoking.com");
$site_member=array("www.ohoking.com");

$site_url = "http://www.ohoking.com/";

$json_file_main = "http://www.ohoking.com/";


$af_sport=0.5;
$af_lotto=0.5;
$af_lothun=0.5;
$af_games=0.5;
$af_casino=0.5;
	
?>