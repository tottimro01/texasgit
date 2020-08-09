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

$b1=$date3_bet[0][1];
$b2=$date3_bet[0][2];
$b3=$date3_bet[0][3];
$b4=$date3_bet[0][4];
$b5=$date3_bet[0][5];
$b6=$date3_bet[0][6];
$b7=$date3_bet[0][7];

echo '<table width="100%" height="80" border="0" cellspacing="0" cellpadding="0">
        <tbody><tr>
          <td width="24%" rowspan="2"><div style="width: 100%; height: 80px; text-align: center; line-height: 125px;">'.number_format($a1+$b1).'</div></td>
          <td width="17%"><div style="width: 100%; text-align: center;height: 40px; line-height: 65px;">'.number_format($a6+$b6).'</div></td>
          <td colspan="2"><div style="width: 100%; text-align: center; height: 40px; line-height: 65px;">'.number_format($a3+$b3).'</div></td>
          <td width="17%"><div style="width: 100%; text-align: center; height: 40px; line-height: 65px;">'.number_format($a7+$b7).'</div></td>
          <td width="24%" rowspan="2" ><div style="width: 100%; height: 80px; text-align: center; line-height: 125px;">'.number_format($a2+$b2).'</div></td>
        </tr>
        <tr>
          <td colspan="2"><div style="width: 100%; text-align: center; height: 40px; line-height: 65px;">'.number_format($a4+$b4).'</div></td>
          <td colspan="2"><div style="width: 100%; text-align: center; height: 40px; line-height: 65px;">'.number_format($a5+$b5).'</div></td>
        </tr>
      </tbody></table>';

?>