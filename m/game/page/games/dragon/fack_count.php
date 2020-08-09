<?
require('../inc/conn.php');
require('../inc/function.php');

  header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header ("Pragma: no-cache"); // HTTP/1.0
  

  
  $url_file="/home/lotto/domains/555king.com/public_html/fish/json/bacarat_close.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_close=$date2_bet[0][con_bacara_close];

if($bet_close==0){
	exit();
	}
 
 $url_file="/home/lotto/domains/555king.com/public_html/fish/json/bacarat_time.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_time=$date2_bet[0][timex];
$new_time=(90)-(time()-$bet_time);


if($new_time>0 and $new_time<80){
 
$url_file="/home/lotto/domains/555king.com/public_html/fish/json/bacarat_count.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);


$a1=intval($date2_bet[0][1])+rand(0,1);
$a2=intval($date2_bet[0][2])+rand(0,1);
$a3=intval($date2_bet[0][3])+rand(0,0);
$a4=intval($date2_bet[0][4])+rand(0,0);
$a5=intval($date2_bet[0][5])+rand(0,0);
$a6=intval($date2_bet[0][6])+rand(0,0);
$a7=intval($date2_bet[0][7])+rand(0,0);
$a8=intval($date2_bet[0][8])+rand(0,0);
$a9=intval($date2_bet[0][9])+rand(0,0);

		
$js1=array();
$js1[]=array("1"=>"$a1","2"=>"$a2","3"=>"$a3","4"=>"$a4","5"=>"$a5","6"=>"$a6","7"=>"$a7","8"=>"$a8","9"=>"$a9");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 
print_r($js1);
}
?>