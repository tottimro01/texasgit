<?
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
 header("Pragma-directive: no-cache");
    header("Cache-directive: no-cache");
    header("Cache-control: no-cache");
    header("Pragma: no-cache");
    header("Expires: 0");
	

  
require('../../inc/conn.php');
require('../../inc/function.php');
if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}

$sql="select * from bom_tb_config where con_id=1";
$rec=sql_array($sql);

if($rec['con_open_games']==0){
//echo'<div id="hl1"></div><div id="hl2"></div><div id="hl3"></div>';
	exit();
	}
	
#  header("content-type: application/x-javascript; charset=utf-8");

$url_file="json/win.json";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
#$bet_id=$date2_bet[0][id];
//print_r($date2_bet);
if($date2_bet[0][1]!="hilo" and $date2_bet[0][2]!="hilo" and $date2_bet[0][3]!="hilo"){
	echo'<div id="hl1"><img src="img/hilo/hilo'.$date2_bet[0][1].'.png" width="50" height="49" /></div><div id="hl2"><img src="img/hilo/hilo'.$date2_bet[0][2].'.png" width="50" height="49" /></div><div id="hl3"><img src="img/hilo/hilo'.$date2_bet[0][3].'.png" width="50" height="49" /></div>';
	echo'<script>$("#bet_time2").hide();</script>';
}else{
	echo'<script>$("#bet_time2").show();</script>';
	//echo '<div id="hl1"></div><div id="hl2"></div><div id="hl3"></div>';
}
?>