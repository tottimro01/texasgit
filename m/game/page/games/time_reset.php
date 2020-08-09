<?
require('../inc/conn.php');
require('../inc/function.php');
#if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}

  header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header ("Pragma: no-cache"); // HTTP/1.0
  header("content-type: application/x-javascript; charset=utf-8");
  
$url_filet="json/bet_time.txt";
$bet_time=time();
$js1=array();
$js1[]=array("timex"=>"$bet_time");
$txt11=json_encode($js1);
write($url_filet ,$txt11,"w+"); 

?>