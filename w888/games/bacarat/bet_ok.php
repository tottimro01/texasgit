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
echo'<img src="img/bacarat/card/baca.jpg" width="66" class="ccm" /><img src="img/bacarat/card/baca.jpg" width="66" class="ccm"  />';
	exit();
	}
	
#  header("content-type: application/x-javascript; charset=utf-8");

$url_file="json/win.json";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
#$bet_id=$date2_bet[0][id];
if($_POST['type']=="p"){
$a1=$date2_bet[0][1];
$a2=$date2_bet[0][2];
}
if($_POST['type']=="b"){
$a1=$date2_bet[1][3];
$a2=$date2_bet[1][4];
}
echo'<img src="img/bacarat/card/'.$a1.'.jpg" width="66" class="ccm" /><img src="img/bacarat/card/'.$a2.'.jpg" width="66" class="ccm"  />';
?>