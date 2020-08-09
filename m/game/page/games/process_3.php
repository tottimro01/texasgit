<?
$zone=3;

/*
require('../inc/conn.php');
require('../inc/function.php');
require('function.php');
*/

shuffle($ex_pai);
shuffle($ex_pai);
shuffle($ex_pai);
shuffle($ex_pai);

$ok1a=$ex_pai[1];
$ok2a=$ex_pai[2];
$ok3a=$ex_pai[3];
$ok4a=$ex_pai[4];

	
$cc1a=($ex_sc[$ok1a]+$ex_sc[$ok2a])%10;
$cc2a=($ex_sc[$ok3a]+$ex_sc[$ok4a])%10;


	if($cc1a>=$cc2a){
$ok1b=$ok1a;
$ok2b=$ok2a;
$ok3b=$ok3a;
$ok4b=$ok4a;
	}else{
$ok1b=$ok4a;
$ok2b=$ok3a;
$ok3b=$ok2a;
$ok4b=$ok1a;
		}
		

		
$sql="select * from bom_tb_games_config where con_id=1 ";
$rec=sql_array($sql);


if($rec[con_bacara_ok]>0){
	
	######################โกงบังคับ	



	if($rec[con_ba_bingo_1]!=""){
$ok1=$rec[con_ba_bingo_1];
	}else{
$ok1=$ok1a;
		}	
		
	if($rec[con_ba_bingo_2]!=""){
$ok2=$rec[con_ba_bingo_2];
	}else{
$ok2=$ok2a;
		}
		
	if($rec[con_ba_bingo_3]!=""){
$ok3=$rec[con_ba_bingo_3];
	}else{
$ok3=$ok3a;
		}
		
	if($rec[con_ba_bingo_4]!=""){
$ok4=$rec[con_ba_bingo_4];
	}else{
$ok4=$ok4a;
		}
		
		
		
	$sql_rec="update bom_tb_games_config set  con_bacara_ok=0,con_ba_bingo_1='',	con_ba_bingo_2='',	con_ba_bingo_3='',	con_ba_bingo_4='' where con_id=1 ";
	sql_query($sql_rec);	
	
}else{
	
if($rec["con_bacara_win"]<3){
	##############################โกง
$sql="select * from bom_tb_games_bet_live where bet_id='$bet_id'  and game_zone='$zone'";
$rew=sql_array($sql);

if($rew[bet_count_2]>=$rew[bet_count_1]){
$new1=$rew[bet_count_2]-$rew[bet_count_1];
}else{
$new1=$rew[bet_count_1]-$rew[bet_count_2];
	}

if($rew[bet_count_4]>=$rew[bet_count_5]){
$new2=$rew[bet_count_4]-$rew[bet_count_5];
}else{
$new2=$rew[bet_count_5]-$rew[bet_count_4];
	}
	
	
	

		
	####################โกง Big Small
if($new2>$new1 and $rec["con_bacara_win_big"]<3){
	
$ex_paibb1 = array("a10","a11","a12","a13","b10","b11","b12","b13","c10","c11","c12","c13","d10","d11","d12","d13");
$ex_paibb2 = array("a5","a6","a7","a8","a9","b5","b6","b7","b8","b9","c5","c6","c7","c8","c9","d5","d6","d7","d8","d9");
$ex_paibb3 = array("a1","a2","a3","a4","b1","b2","b3","b4","c1","c2","c3","c4","d1","d2","d3","d4");

shuffle($ex_paibb1);
shuffle($ex_paibb1);

shuffle($ex_paibb2);
shuffle($ex_paibb2);

shuffle($ex_paibb3);
shuffle($ex_paibb3);


	if($rew[bet_count_4]>=$rew[bet_count_5]){
		########เจ้ามือมากกว่า
$ok1=$ex_paibb2[1];
$ok2=$ex_paibb3[1];
$ok3=$ex_paibb1[1];
$ok4=$ex_paibb3[2];
	}else{
$ok1=$ex_paibb2[1];
$ok2=$ex_paibb3[1];
$ok3=$ex_paibb2[2];
$ok4=$ex_paibb1[1];
}


	$sql_rec="update bom_tb_games_config set  con_bacara_win_big=con_bacara_win_big+1 where con_id=1 ";
	sql_query($sql_rec);	
	
	}else{ #####################โกง Big Small
	
	$sql_rec="update bom_tb_games_config set  con_bacara_win_big=0 where con_id=1 ";
	sql_query($sql_rec);
	

if($rew[bet_count_2]>=$rew[bet_count_1]){
$ok1=$ok1b;
$ok2=$ok2b;
$ok3=$ok3b;
$ok4=$ok4b;
	}else{
$ok1=$ok4b;
$ok2=$ok3b;
$ok3=$ok2b;
$ok4=$ok1b;
}
		

	
	}
		
		
		
		
		
		
		
	$sql_rec="update bom_tb_games_config set  con_bacara_win=con_bacara_win+1 where con_id=1 ";
	sql_query($sql_rec);	
	
	
}else{
	#########################ปกติ
	$sql_rec="update bom_tb_games_config set  con_bacara_win=0 where con_id=1 ";
	sql_query($sql_rec);
$ok1=$ok1a;
$ok2=$ok2a;
$ok3=$ok3a;
$ok4=$ok4a;
	
	}#if($rec["con_bacara_win"]<3){
	
	}
	
	
#echo"<br>$ok1,$ok2,$ok3,$ok4<br>";
#exit();		



$cc1=($ex_sc[$ok1]+$ex_sc[$ok2])%10;
$cc2=($ex_sc[$ok3]+$ex_sc[$ok4])%10;
############################################บันทึก
$x_win="win,$ok1,$ok2,$ok3,$ok4";
$sc_win="sc,$cc1,$cc2";
$sql="update bom_tb_games_bet_live set  bet_win='$x_win',bet_win_score='$sc_win'    where bet_id='$bet_id'  and game_zone='$zone'  and bet_win=''";
sql_query($sql);
$sql="update bom_tb_games_bill_play_live set  bet_win='$x_win'    where bet_id='$bet_id'   and game_zone='$zone'  and bet_win=''";
sql_query($sql);

$url_filed="bacarat/json/win.txt";
$js1=array();
$js1[]=array("1"=>"$ok1","2"=>"$ok2","3"=>"$ok3","4"=>"$ok4");
$txt11=json_encode($js1);
write($url_filed ,$txt11,"w+"); 




####################เช็คชนะ
if($cc1>$cc2){
	
$sql="update bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone'   and play_status=7 and play_bet=1";
sql_query($sql);
	
}elseif($cc1<$cc2){
$sql="update bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet=2";
sql_query($sql);
	
}elseif($cc1==$cc2){
	
$sql="update bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet=3";
sql_query($sql);




$cc11=$ex_big[$ok1];
$cc22=$ex_big[$ok2];
$cc33=$ex_big[$ok3];
$cc44=$ex_big[$ok4];




if(($cc11>$cc33 and $cc11>$cc44) or ($cc22>$cc33 and $cc22>$cc44)){
$sql="update bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet=1";
sql_query($sql);
}elseif(($cc33>$cc11 and $cc33>$cc22) or ($cc44>$cc11 and $cc44>$cc22)){
$sql="update bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet=2";
sql_query($sql);
}else{
$cc11y=($ex_yai[$ok1]+$ex_yai[$ok2])%10;
$cc22y=($ex_yai[$ok3]+$ex_yai[$ok4])%10;
if($cc11y>$cc22y){
$sql="update bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet=1";
sql_query($sql);	
}else{
$sql="update bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet=2";
sql_query($sql);
	}


	}
		
}

#############################&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
#############################&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
#####################สูง
if($cc2>=6){
$sql="update bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet=4";
sql_query($sql);
	}else{
################ต่ำ
$sql="update bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet=5";
sql_query($sql);
}

################
if($ex_sc[$ok1]==$ex_sc[$ok2]){
#####################################ผู้เล่นแต้มเสมอ
$sql="update bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet=6";
sql_query($sql);
	}
if($ex_sc[$ok3]==$ex_sc[$ok4]){
#####################################เจ้ามือแต้มเสมอ
$sql="update bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet=7";
sql_query($sql);
	}
	
######################เสีย
$sql="update bom_tb_games_bill_play_live set  play_status=4    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 ";
sql_query($sql);	
#############################&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
#############################&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

	###########################คืนเงิน
$sql="select * from bom_tb_games_bill_play_live where play_status='1' and bet_id='$bet_id'   and game_zone='$zone' and r_pay_ok=0  order by play_id desc";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
$sumbet=$rs[b_total]*$rs[play_pay];
$sql="update bom_tb_member set m_count=m_count+$sumbet  where m_id='$rs[m_id]' ";
sql_query($sql);	
$sql="update bom_tb_games_bill_play_live set r_pay_ok=1, b_bonus=$sumbet,  br_bonus_1=$sumbet,  br_bonus_2=$sumbet,  br_bonus_3=$sumbet,  br_bonus_4=$sumbet  where play_id='$rs[play_id]'  ";
sql_query($sql);

}



	
?>