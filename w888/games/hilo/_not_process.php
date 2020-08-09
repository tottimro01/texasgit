<?php
require('../../inc/conn.php');
require('../../inc/function.php');

  
  header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
 header("Pragma-directive: no-cache");
    header("Cache-directive: no-cache");
    header("Cache-control: no-cache");
    header("Pragma: no-cache");
    header("Expires: 0");
  

 

  $url_filec="/home/lotto/domains/555king.com/public_html/bacarat/json/bacarat_close.txt";
$date2_jsc=file_get_contents2($url_filec);
$date2_betc = json_decode($date2_jsc, true);
$bet_close=$date2_betc[0][con_bacara_close];

if($bet_close==0){
	exit();
	}
	
	_not_process_bacarat();
	
	function _not_process_bacarat(){
	
$url_filei="/home/lotto/domains/555king.com/public_html/bacarat/json/bacarat_id.txt";
$date2_jsi=file_get_contents2($url_filei);
$date2_beti = json_decode($date2_jsi, true);
$bet_id=$date2_beti[0][id];

	###########################คืนเงิน
$sql="select * from pha_tb_casino_bill_play where play_status='7' and  bill_id!='$bet_id'   and lock_pay=0  order by play_id desc";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
$sumbet=$rs[b_total];
echo'<br>'.$sql="update pha_tb_member set m_count=m_count+$sumbet  where m_id='$rs[m_id]' ";
sql_query($sql);	
echo'<br>'.$sql="update pha_tb_casino_bill_play set lock_pay=1, play_status=3 , b_bonus=$sumbet,  br_bonus=$sumbet  where play_id='$rs[play_id]'  ";
sql_query($sql);

}

}


?>