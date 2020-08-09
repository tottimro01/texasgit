<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
require('../inc/conn.php');
require('../inc/function.php');

  
  header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
 header("Pragma-directive: no-cache");
    header("Cache-directive: no-cache");
    header("Cache-control: no-cache");
    header("Pragma: no-cache");
    header("Expires: 0");
  



  $url_filec="/home/lotto/domains/555king.com/public_html/fish/json/bacarat_close.txt";
$date2_jsc=file_get_contents2($url_filec);
$date2_betc = json_decode($date2_jsc, true);
$bet_close=$date2_betc[0][con_bacara_close];

if($bet_close==0){
	exit();
	}
	
	
	

	_process_hilo();
	

	
	function _process_hilo(){
	

$url_filei="/home/lotto/domains/555king.com/public_html/fish/json/bacarat_id.txt";
$date2_jsi=file_get_contents2($url_filei);
$date2_beti = json_decode($date2_jsi, true);
$bet_id=$date2_beti[0][id];


	

		
$ok1a=rand(1,6);
$ok2a=rand(1,6);
$ok3a=rand(1,6);


$cc1=$ok1a+$ok2a+$ok3a;
	


$sql="select * from pha_tb_config where con_id=1 ";
$rec=sql_array($sql);




############################################บันทึก
$x_win="win,$ok1a,$ok2a,$ok3a";
$sc_win="sc,$cc1";
$sql="update pha_tb_fish_bet set  bet_win='$x_win',bet_win_score='$sc_win'    where bet_id='$bet_id' and bet_win=''";
sql_query($sql);
$sql="update pha_tb_fish_bill_play set  bet_win='$x_win'    where bill_id='$bet_id' and bet_win=''";
sql_query($sql);

$url_filed="/home/lotto/domains/555king.com/public_html/fish/json/bacarat_win.txt";
$js1=array();
$js1[]=array("1"=>"$ok1a","2"=>"$ok2a","3"=>"$ok3a");
$txt11=json_encode($js1);
write($url_filed ,$txt11,"w+"); 




####################เช็คชนะ

	
$sql="update pha_tb_fish_bill_play set  play_status=1    where bill_id='$bet_id' and play_status=7 and play_bet=1 and play_bet='$ok1a,0,0'; ";
sql_query($sql);
$sql="update pha_tb_fish_bill_play set  play_status=1    where bill_id='$bet_id' and play_status=7 and play_bet=1 and play_bet='$ok2a,0,0'; ";
sql_query($sql);
$sql="update pha_tb_fish_bill_play set  play_status=1    where bill_id='$bet_id' and play_status=7 and play_bet=1 and play_bet='$ok3a,0,0'; ";
sql_query($sql);
	
##############ไปตรวจสอบพวกแทงโต๊ดให้ด้วย


	
######################เสีย
$sql="update pha_tb_fish_bill_play set  play_status=4    where bill_id='$bet_id' and play_status=7 ";
sql_query($sql);	
#############################&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
#############################&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

	###########################คืนเงิน
$sql="select * from pha_tb_fish_bill_play where play_status='1' and bill_id='$bet_id' and lock_pay=0  order by play_id desc";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
$sumbet=$rs[b_total]*$rs[play_pay];
$sql="update pha_tb_member set m_count=m_count+$sumbet  where m_id='$rs[m_id]' ";
sql_query($sql);	
$sql="update pha_tb_fish_bill_play set lock_pay=1, b_bonus=$sumbet,  br_bonus=$sumbet  where play_id='$rs[play_id]'  ";
sql_query($sql);

}

}





?>