<?
require('../inc/conn.php');
require('../inc/function.php');
if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}

  header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header ("Pragma: no-cache"); // HTTP/1.0
  header("content-type: application/x-javascript; charset=utf-8");
  

	  
  
  $url_file="json/bacarat_close.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_close=$date2_bet[0][con_bacara_close];

if($bet_close==0){
	echo'ปิดพนัน';
	exit();
	}
	

$url_file="json/bacarat_time.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_time=$date2_bet[0][timex];
$new_time=(90)-(time()-$bet_time);




if($new_time<=0){
	echo'หมดเวลา';
	}else{
	echo $new_time;	
}

?>