<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
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
  



  $url_filec="/home/lotto/domains/lover2lotto.com/public_html/hilo/json/bacarat_close.txt";
$date2_jsc=file_get_contents2($url_filec);
$date2_betc = json_decode($date2_jsc, true);
$bet_close=$date2_betc[0][con_bacara_close];

if($bet_close==0){
	exit();
	}
	
	
	

	_process_hilo();
	

	
	function _process_hilo(){
		
$url_filei="/home/lotto/domains/lover2lotto.com/public_html/hilo/json/bacarat_id.txt";
$date2_jsi=file_get_contents2($url_filei);
$date2_beti = json_decode($date2_jsi, true);
$bet_id=$date2_beti[0][id];

$hack = array();
$rs_hack = sql_array("select * from pha_tb_hilo_bet where bet_id = '$bet_id'");

$hack = array("1" => $rs_hack["bet_count_1"], "2" => $rs_hack["bet_count_2"], "3" => $rs_hack["bet_count_3"], "4" => $rs_hack["bet_count_4"], "5" => $rs_hack["bet_count_5"], "6" => $rs_hack["bet_count_6"], "7" => $rs_hack["bet_count_7"], "8" => $rs_hack["bet_count_8"], "9" => $rs_hack["bet_count_9"]);

$sql="select * from pha_tb_config where con_id=1 ";
$rec=sql_array($sql);

if($rec["con_hilo_win"]>=0 and $rec["con_hilo_win"]<3){
	include "_process_hack.php";
	$sql_rec="update pha_tb_config set  con_hilo_win=con_hilo_win+1 where con_id=1 ";
	sql_query($sql_rec);
}else{
	$ex_sc1 = array("1"=>1,"2"=>2,"3"=>3,"4"=>4,"5"=>5,"6"=>6);
	$ex_sc2 = array("2"=>2,"4"=>4,"6"=>6,"5"=>5,"3"=>3,"1"=>1);
	$ex_sc3 = array("6"=>6,"5"=>5,"4"=>4,"3"=>3,"2"=>2,"1"=>1);
	$sql_rec="update pha_tb_config set  con_hilo_win=0 where con_id=1 ";
	sql_query($sql_rec);
}

shuffle($ex_sc1);
shuffle($ex_sc1);
shuffle($ex_sc1);

shuffle($ex_sc2);
shuffle($ex_sc2);
shuffle($ex_sc2);

shuffle($ex_sc3);
shuffle($ex_sc3);
shuffle($ex_sc3);







	

		


if($rec[con_hilo_bingo_1]>0){
	$ok1a=$rec[con_hilo_bingo_1];
	}else{
$ok1a=$ex_sc1[1];		
		}
		
if($rec[con_hilo_bingo_2]>0){
	$ok2a=$rec[con_hilo_bingo_2];
	}else{
$ok2a=$ex_sc2[1];		
		}
		
if($rec[con_hilo_bingo_3]>0){
	$ok3a=$rec[con_hilo_bingo_3];
	}else{
$ok3a=$ex_sc3[1];		
		}




$cc1=$ok1a+$ok2a+$ok3a;

############################################################
$tod_2=array();
$tod_2[]=$ok1a.','.$ok2a;
$tod_2[]=$ok1a.','.$ok3a;
$tod_2[]=$ok2a.','.$ok1a;
$tod_2[]=$ok2a.','.$ok3a;
$tod_2[]=$ok3a.','.$ok1a;
$tod_2[]=$ok3a.','.$ok2a;
$tod_2 = array_unique( $tod_2 );		

############################################################
$tod_3=array();
$tod_3[]=$ok1a.','.$ok2a.','.$ok3a;
$tod_3[]=$ok1a.','.$ok3a.','.$ok2a;
$tod_3[]=$ok2a.','.$ok1a.','.$ok3a;
$tod_3[]=$ok2a.','.$ok3a.','.$ok1a;
$tod_3[]=$ok3a.','.$ok1a.','.$ok2a;
$tod_3[]=$ok3a.','.$ok2a.','.$ok1a;
$tod_3 = array_unique( $tod_3 );		


############################################บันทึก
$x_win="win,$ok1a,$ok2a,$ok3a";
$sc_win="sc,$cc1";
$sql="update pha_tb_hilo_bet set  bet_win='$x_win',bet_win_score='$sc_win'    where bet_id='$bet_id' and bet_win=''";
sql_query($sql);
$sql="update pha_tb_hilo_bill_play set  bet_win='$x_win'  where bill_id='$bet_id' and bet_win='0,0,0'";
sql_query($sql);

$url_filed="/home/lotto/domains/lover2lotto.com/public_html/hilo/json/bacarat_win.txt";
$js1=array();
$js1[]=array("1"=>"$ok1a","2"=>"$ok2a","3"=>"$ok3a");
$txt11=json_encode($js1);
write($url_filed ,$txt11,"w+"); 


######################เบิ้ล3
if(($ok1a==$ok2a) and ($ok1a==$ok3a)){
$sql="update pha_tb_hilo_bill_play set  play_pay=play_pay*3, play_br_pay=play_br_pay*3 ,play_status=1   where bill_id='$bet_id' and play_status=7 and play_bet='$ok1a'; ";
sql_query($sql);	
}

######################เบิ้ล2
if($ok1a==$ok2a){
$sql="update pha_tb_hilo_bill_play set  play_pay=play_pay*2, play_br_pay=play_br_pay*2 ,play_status=1   where bill_id='$bet_id' and play_status=7 and play_bet='$ok1a'; ";
sql_query($sql);	
}
if($ok1a==$ok3a){
$sql="update pha_tb_hilo_bill_play set  play_pay=play_pay*2, play_br_pay=play_br_pay*2  ,play_status=1  where bill_id='$bet_id' and play_status=7 and play_bet='$ok1a'; ";
sql_query($sql);	
}
if($ok2a==$ok3a){
$sql="update pha_tb_hilo_bill_play set  play_pay=play_pay*2, play_br_pay=play_br_pay*2  ,play_status=1  where bill_id='$bet_id' and play_status=7 and play_bet='$ok2a'; ";
sql_query($sql);	
}




####################เช็คชนะ

	
$sql="update pha_tb_hilo_bill_play set  play_status=1    where bill_id='$bet_id' and play_status=7 and play_bet='$ok1a'; ";
sql_query($sql);
$sql="update pha_tb_hilo_bill_play set  play_status=1    where bill_id='$bet_id' and play_status=7 and play_bet='$ok2a'; ";
sql_query($sql);
$sql="update pha_tb_hilo_bill_play set  play_status=1    where bill_id='$bet_id' and play_status=7 and play_bet='$ok3a'; ";
sql_query($sql);

########################สูง-ต่ำ 11ไฮโล
if($cc1<11){
$sql="update pha_tb_hilo_bill_play set  play_status=1    where bill_id='$bet_id' and play_status=7 and play_bet='L'; ";
sql_query($sql);
$HL='L';
	}elseif($cc1==11){
$sql="update pha_tb_hilo_bill_play set  play_status=1    where bill_id='$bet_id' and play_status=7 and play_bet='11'; ";
sql_query($sql);
$HL='';
	}elseif($cc1>11){
$sql="update pha_tb_hilo_bill_play set  play_status=1    where bill_id='$bet_id' and play_status=7 and play_bet='H'; ";
sql_query($sql);
$HL='H';
	}
	
	
############################################################
$tod_2HL=array();
$tod_2HL[]=$HL.','.$ok1a;
$tod_2HL[]=$HL.','.$ok2a;
$tod_2HL[]=$HL.','.$ok3a;
$tod_2HL[]=$ok1a.','.$HL;
$tod_2HL[]=$ok2a.','.$HL;
$tod_2HL[]=$ok3a.','.$HL;
$tod_2HL = array_unique( $tod_2HL );			
	
	
##############2โต๊ด HL
foreach($tod_2HL as $num_new){
			#######################################################อัพเดทแบบอาเรย์
$sql="update pha_tb_hilo_bill_play set  play_status=1    where bill_id='$bet_id' and play_status=7 and play_bet='$num_new'; ";
sql_query($sql);
}

	
##############2โต๊ด
foreach($tod_2 as $num_new){
			#######################################################อัพเดทแบบอาเรย์
$sql="update pha_tb_hilo_bill_play set  play_status=1    where bill_id='$bet_id' and play_status=7 and play_bet='$num_new'; ";
sql_query($sql);
}


##############3โต๊ด
foreach($tod_3 as $num_new){
			#######################################################อัพเดทแบบอาเรย์
$sql="update pha_tb_hilo_bill_play set  play_status=1    where bill_id='$bet_id' and play_status=7 and play_bet='$num_new'; ";
sql_query($sql);
}




	
######################เสีย
$sql="update pha_tb_hilo_bill_play set  play_status=4    where bill_id='$bet_id' and play_status=7 ";
sql_query($sql);	
#############################&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
#############################&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

	###########################คืนเงิน
$sql="select * from pha_tb_hilo_bill_play where play_status='1' and bill_id='$bet_id' and lock_pay=0  order by play_id desc";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
$sumbet=$rs[b_total]*$rs[play_pay];
$sql="update pha_tb_member set m_count=m_count+$sumbet  where m_id='$rs[m_id]' ";
sql_query($sql);	
$sql="update pha_tb_hilo_bill_play set lock_pay=1, b_bonus=$sumbet,  br_bonus=$sumbet  where play_id='$rs[play_id]'  ";
sql_query($sql);

}

}





?>