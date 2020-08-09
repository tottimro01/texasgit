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
$a3=$date2_bet[0][3];
$a4=$date2_bet[0][4];
$a5=$date2_bet[0][5];
$a6=$date2_bet[0][6];
$a7=$date2_bet[0][7];
$a8=$date2_bet[0][8];
$a9=$date2_bet[0][9];

$b1=$date3_bet[0][1];
$b2=$date3_bet[0][2];
$b3=$date3_bet[0][3];
$b4=$date3_bet[0][4];
$b5=$date3_bet[0][5];
$b6=$date3_bet[0][6];
$b7=$date3_bet[0][7];
$b8=$date3_bet[0][8];
$b9=$date3_bet[0][9];

echo ' <table width="100%" border="0" cellspacing="3" cellpadding="0" style="border-collapse:separate; border-spacing:3px;">
<tr>
  <td width="25%" align="right"></td>
  <td width="50%" align="right" colspan="2">'.number_format($a9+$b9).'</td>
  <td width="25%" align="right"></td>
</tr>
<tr>
  <td width="25%" align="right">'.number_format($a1+$b1).'</td>
  <td width="25%" align="right">'.number_format($a7+$b7).'</td>
  <td width="25%" align="right">'.number_format($a8+$b8).'</td>
  <td width="25%" align="right">'.number_format($a6+$b6).'</td>
</tr>
<tr>
  <td width="25%" align="right">'.number_format($a2+$b2).'</td>
  <td width="25%" align="right">'.number_format($a3+$b3).'</td>
  <td width="25%" align="right">'.number_format($a4+$b4).'</td>
  <td width="25%" align="right">'.number_format($a5+$b5).'</td>
</tr>
</table>';

?>