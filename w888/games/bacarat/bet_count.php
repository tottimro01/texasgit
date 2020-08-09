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

$b1=$date3_bet[0][1];
$b2=$date3_bet[0][2];
$b3=$date3_bet[0][3];
$b4=$date3_bet[0][4];
$b5=$date3_bet[0][5];
$b6=$date3_bet[0][6];
$b7=$date3_bet[0][7];

echo '<table width="565" height="123" border="0" cellspacing="0" cellpadding="0" style="margin-left: 0px;border-radius: 100px;overflow: hidden;">
        <tbody><tr>
          <td width="24%" rowspan="2"><div style="width: 100%; height: 123px; text-align: center; line-height: 175px;">'.number_format($a1+$b1).'</div></td>
          <td width="17%"><div style="width: 100%; text-align: center; position: relative;top: 20px;">'.number_format($a6+$b6).'</div></td>
          <td colspan="2"><div style="width: 100%; text-align: center; position: relative;top: 20px;">'.number_format($a3+$b3).'</div></td>
          <td width="17%"><div style="width: 100%; text-align: center; position: relative;top: 20px;">'.number_format($a7+$b7).'</div></td>
          <td width="24%" rowspan="2" ><div style="width: 100%; height: 123px; text-align: center; line-height: 175px;">'.number_format($a2+$b2).'</div></td>
        </tr>
        <tr>
          <td colspan="2"><div style="width: 100%; text-align: center; position: relative;top: 20px;">'.number_format($a4+$b4).'</div></td>
          <td colspan="2"><div style="width: 100%; text-align: center; position: relative;top: 20px;">'.number_format($a5+$b5).'</div></td>
        </tr>
      </tbody></table>';

?>