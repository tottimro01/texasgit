<?
require('../inc/conn.php');
require('../inc/function.php');
if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}


  $ok_hh=date("H");
  if($ok_hh<=6){
	  exit();
	  }
	  
	  
  header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header ("Pragma: no-cache"); // HTTP/1.0
#  header("content-type: application/x-javascript; charset=utf-8");

  $url_file="json/bacarat_close.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_close=$date2_bet[0][con_bacara_close];

if($bet_close==0){
	exit();
	}
	
	
$url_file="json/bacarat_count.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
#$bet_id=$date2_bet[0][id];

$a1=$date2_bet[0][1];
$a2=$date2_bet[0][2];
$a3=$date2_bet[0][3];
$a4=$date2_bet[0][4];
$a5=$date2_bet[0][5];
$a6=$date2_bet[0][6];
$a7=$date2_bet[0][7];


echo'<table width="204" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20%" height="20">&nbsp;</td>
            <td width="20%">&nbsp;</td>
            <td width="20%">&nbsp;</td>
            <td width="20%">&nbsp;</td>
            <td width="20%">&nbsp;</td>
          </tr>
          <tr>
            <td align="center">'.number_format($a1).'</td>
            <td align="center">'.number_format($a3).'</td>
            <td align="center">'.number_format($a4).'</td>
            <td align="center">'.number_format($a5).'</td>
            <td align="center">'.number_format($a2).'</td>
          </tr>
        </table>';
?>