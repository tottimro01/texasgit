<?
require('../../../../../inc/conn.php');
require('../../../../../inc/function.php');
if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}



	  
	  
  header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header ("Pragma: no-cache"); // HTTP/1.0
#  header("content-type: application/x-javascript; charset=utf-8");



  $url_file="../json/bet_close.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_close=$date2_bet[0][con_bacara_close];

if($bet_close==0){
	exit();
	}
	
	
$url_file2="../json/bet_time.txt";
$date2_js2=file_get_contents2($url_file2);
$date2_bet2 = json_decode($date2_js2, true);
$bet_time2=$date2_bet2[0][timex];
$new_time2=(90)-(time()-$bet_time2);

if($new_time2>0){
$url_file="json/count_bet.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);

$url_file="json/count_fake.txt";
$date3_js=file_get_contents2($url_file);
$date3_bet = json_decode($date3_js, true);
}



$a1=$date2_bet[0][1];
$a2=$date2_bet[0][2];

$b1=$date3_bet[0][1];
$b2=$date3_bet[0][2];

echo ' <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td align="center" width="50%">'.number_format($a1+$b1).'</td>
      <td align="center" width="50%">'.number_format($a2+$b2).'</td>
    </tr>
  </tbody>
</table>';
?>