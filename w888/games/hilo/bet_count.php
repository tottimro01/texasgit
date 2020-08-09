<?php
require('../../inc/conn.php');
require('../../inc/function.php');
if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}


	  
	  
  header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header ("Pragma: no-cache"); // HTTP/1.0
#  header("content-type: application/x-javascript; charset=utf-8");

$sql="select * from bom_tb_config where con_id=1";
$rec=sql_array($sql);

if($rec['con_open_games']==0){
	exit();
	}
	
$bet_time=$rec['con_time_games'];
$new_time=(90)-($time_stam-$bet_time);

if($new_time>0){
$url_file="json/count_bet.json";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);

$url_file="json/count_fake.json";
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

echo ' <table width="120" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td align="left" width="30"><img src="img/hilo/25/hilo1.png" width="25"></td>
      <td align="left" width="30">'.number_format($a1+$b1).'</td>

      <td align="left" width="30"><img src="img/hilo/25/hiloL.png" width="25"></td>
      <td align="left" width="30">'.number_format($a7+$b7).'</td>
    </tr>
    <tr>
      <td align="left"><img src="img/hilo/25/hilo2.png" width="25"></td>
      <td align="left">'.number_format($a2+$b2).'</td>

      <td align="left"><img src="img/hilo/25/hiloL.png" width="25"></td>
      <td align="left">'.number_format($a7+$b7).'</td>
    </tr>
    <tr>
      <td align="left"><img src="img/hilo/25/hilo3.png" width="25"></td>
      <td align="left">'.number_format($a3+$b3).'</td>

      <td align="left"><img src="img/hilo/25/hilo11.png" width="25"></td>
      <td align="left">'.number_format($a9+$b9).'</td>
    </tr>
    <tr>
      <td align="left"><img src="img/hilo/25/hilo4.png" width="25"></td>
      <td align="left">'.number_format($a4+$b4).'</td>
      <td></td><td></td>
    </tr>
    <tr>
      <td align="left"><img src="img/hilo/25/hilo5.png" width="25"></td>
      <td align="left">'.number_format($a5+$b5).'</td>
      <td></td><td></td>
    </tr>
    <tr>
      <td align="left"><img src="img/hilo/25/hilo6.png" width="25"></td>
      <td align="left">'.number_format($a6+$b6).'</td>
      <td></td><td></td>
    </tr>
	  <!--  <tr>
      <td align="left"><img src="img/hilo/25/hiloL.png" width="25"></td>
      <td align="left">'.number_format($a7+$b7).'</td>
    </tr>
    <tr>
      <td align="left"><img src="img/hilo/25/hiloH.png" width="25"></td>
      <td align="left">'.number_format($a8+$b8).'</td>
    </tr>

    <tr>
      <td align="left"><img src="img/hilo/25/hilo11.png" width="25"></td>
      <td align="left">'.number_format($a9+$b9).'</td>
    </tr>-->
  </tbody>
</table>';

?>