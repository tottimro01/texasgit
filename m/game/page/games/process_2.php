<?
$zone=2;


shuffle($ex_pai);
shuffle($ex_pai);
shuffle($ex_pai);
shuffle($ex_pai);

$ok1a=$ex_pai[1];
$ok2a=$ex_pai[2];



$sql="select * from bom_tb_games_config where con_id=1 ";
$rec=sql_array($sql);

if($rec["con_dragon_ok"]>0){
	######################โกงบังคับ
	if($rec["con_dragon_ok"]==1){
$ex_pai12 = array("a6","a7","a8","a9","b6","b7","b8","b9","c6","c7","c8","c9","d6","d7","d8","d9");
$ex_pai22 = array("a1","a2","a3","a4","a5","a10","a11","a12","a13","b1","b2","b3","b4","b5","b10","b11","b12","b13","c1","c2","c3","c4","c5","c10","c11","c12","c13","d1","d2","d3","d4","d5","d10","d11","d12","d13");
shuffle($ex_pai12);
shuffle($ex_pai12);
shuffle($ex_pai22);
shuffle($ex_pai22);

$ok1a=$ex_pai12[1];
$ok2a=$ex_pai22[2];

	}elseif($rec["con_dragon_ok"]==2){
		
$ex_pai22 = array("a6","a7","a8","a9","b6","b7","b8","b9","c6","c7","c8","c9","d6","d7","d8","d9");
$ex_pai12 = array("a1","a2","a3","a4","a5","a10","a11","a12","a13","b1","b2","b3","b4","b5","b10","b11","b12","b13","c1","c2","c3","c4","c5","c10","c11","c12","c13","d1","d2","d3","d4","d5","d10","d11","d12","d13");
shuffle($ex_pai12);
shuffle($ex_pai12);
shuffle($ex_pai22);
shuffle($ex_pai22);

$ok1a=$ex_pai12[1];
$ok2a=$ex_pai22[2];
		
		}elseif($rec["con_dragon_ok"]==3){
$ex_pai33 = array("a10","a11","a12","a13","b10","b11","b12","b13","c10","c11","c12","c13","d10","d11","d12","d13");
shuffle($ex_pai33);
shuffle($ex_pai33);
shuffle($ex_pai33);
shuffle($ex_pai33);

$ok1a=$ex_pai33[1];
$ok2a=$ex_pai33[2];
			}
			

	$sql_rec="update bom_tb_games_config set  con_dragon_ok=0 where con_id=1 ";
	sql_query($sql_rec);	
	
}else{
	
	
if($rec["con_dragon_win"]<3){
	##############################โกง
	$rh = sql_array("select * from bom_tb_games_bet_live where bet_id = '$bet_id'  and game_zone='$zone' ");
	
	$xd1=$rh["bet_count_1"]*$arr_dragon_pay[1];
	$xd2=$rh["bet_count_2"]*$arr_dragon_pay[2];
	$xd3=$rh["bet_count_3"]*$arr_dragon_pay[3];
	
if($xd1>=$xd2 and $xd1>=$xd3){
	
$ex_pai22 = array("a6","a7","a8","a9","b6","b7","b8","b9","c6","c7","c8","c9","d6","d7","d8","d9");
$ex_pai12 = array("a1","a2","a3","a4","a5","a10","a11","a12","a13","b1","b2","b3","b4","b5","b10","b11","b12","b13","c1","c2","c3","c4","c5","c10","c11","c12","c13","d1","d2","d3","d4","d5","d10","d11","d12","d13");
shuffle($ex_pai12);
shuffle($ex_pai12);
shuffle($ex_pai22);
shuffle($ex_pai22);

$ok1a=$ex_pai12[1];
$ok2a=$ex_pai22[2];

}elseif($xd2>=$xd1 and $xd2>=$xd3){

$ex_pai12 = array("a6","a7","a8","a9","b6","b7","b8","b9","c6","c7","c8","c9","d6","d7","d8","d9");
$ex_pai22 = array("a1","a2","a3","a4","a5","a10","a11","a12","a13","b1","b2","b3","b4","b5","b10","b11","b12","b13","c1","c2","c3","c4","c5","c10","c11","c12","c13","d1","d2","d3","d4","d5","d10","d11","d12","d13");
shuffle($ex_pai12);
shuffle($ex_pai12);
shuffle($ex_pai22);
shuffle($ex_pai22);

$ok1a=$ex_pai12[1];
$ok2a=$ex_pai22[2];

	
	}else{
		
$ex_pai12 = array("a6","a7","a8","a9","b6","b7","b8","b9","c6","c7","c8","c9","d6","d7","d8","d9");
$ex_pai22 = array("a1","a2","a3","a4","a5","a10","b1","b2","b3","b4","b5","b11","c1","c2","c3","c4","c5","c12","d1","d2","d3","d4","d5","d13");
shuffle($ex_pai12);
shuffle($ex_pai12);
shuffle($ex_pai22);
shuffle($ex_pai22);

$ok1a=$ex_pai12[1];
$ok2a=$ex_pai22[2];

		}
		


	$sql_rec="update bom_tb_games_config set  con_dragon_win=con_dragon_win+1 where con_id=1 ";
	sql_query($sql_rec);	
		
	}else{
	
	#########################ปกติ
	$sql_rec="update bom_tb_games_config set  con_dragon_win=0 where con_id=1 ";
	sql_query($sql_rec);
	
	
	}
	
	
	
}



$cc1=($ex_sc[$ok1a])%10;
$cc2=($ex_sc[$ok2a])%10;
############################################บันทึก
$x_win="win,$ok1a,$ok2a";
$sc_win="sc,$cc1,$cc2";
$sql="update bom_tb_games_bet_live set  bet_win='$x_win',bet_win_score='$sc_win'    where bet_id='$bet_id'  and game_zone='$zone'  and bet_win=''";
sql_query($sql);
$sql="update bom_tb_games_bill_play_live set  bet_win='$x_win'    where bet_id='$bet_id'   and game_zone='$zone'  and bet_win=''";
sql_query($sql);


$url_filed="dragon/json/win.txt";
$js1=array();
$js1[]=array("1"=>"$ok1a","2"=>"$ok2a");
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