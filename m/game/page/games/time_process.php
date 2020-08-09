<?
  header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
 header("Pragma-directive: no-cache");
    header("Cache-directive: no-cache");
    header("Cache-control: no-cache");
    header("Pragma: no-cache");
    header("Expires: 0");
	
	
require('../inc/conn.php');
require('../inc/function.php');
require('function.php');

if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}


  

	  
  
$url_file="json/bet_close.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_close=$date2_bet[0][con_bacara_close];

if($bet_close==0){
	echo'ปิดพนัน';
	exit();
}
	

$url_file="json/bet_time.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_time=$date2_bet[0][timex];
$new_time=(90)-(time()-$bet_time);



if($new_time<=0){
	
	if($new_time<=0 and $new_time>=(-2) ){
	echo'หมดเวลา';
	}else{
		echo'ออกผล';	
	}
	

	
	if($new_time==(-1)){
$url_file="json/bet_id.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_id=$date2_bet[0][id];
		
	include("process_1.php");
	include("process_2.php");
	include("process_3.php");
	include("process_4.php");
	include("process_5.php");
	}
	
	
		if($new_time<(-20)){
	include("ok_new.php");
		}
	
	}else{
	echo $new_time;	
	
	
$url_file="json/bet_close_fake.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_close=$date2_bet[0][con_fake_close];
if($bet_close==1){
	if(($new_time%2)==0){
include("fake_auto.php");
	}
}

}

?>