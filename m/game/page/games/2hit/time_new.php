<?
require('../inc/conn.php');
require('../inc/function.php');
if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}

  header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header ("Pragma: no-cache"); // HTTP/1.0
  header("content-type: application/x-javascript; charset=utf-8");
  

	#  $url_file="http://www.555king.com/hilo/json/bacarat_close.txt";
$url_file="/home/lotto/domains/555king.com/public_html/fish/json/bacarat_close.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_close=$date2_bet[0][con_bacara_close];

if($bet_close==0){
	exit();
	}

$url_file="/home/lotto/domains/555king.com/public_html/fish/json/bacarat_time.txt";
#$url_file="http://www.555king.com/hilo/json/bacarat_time.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_time=$date2_bet[0][timex];
$new_time=(90)-(time()-$bet_time);



//echo $new_time;
if($new_time<=0 and $new_time>-5){
	echo'<script>$( "#list_bet3" ).html("");$( "#cion_bet3" ).html("");</script>';
	}
	
if($new_time==-12){
echo'<script>_vvxx3();</script>';
}

if($new_time==85){
echo'<script>_vvxx3();</script>';
}
if($new_time==90){
echo'<script>_vvxx3();</script>';
}
if($new_time==80){
echo'<script>_vvxx3();</script>';
}

?>