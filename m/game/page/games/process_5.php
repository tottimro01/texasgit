<?
$zone=5;

$hack = array();
$rs_hack = sql_array("select * from bom_tb_games_bet_live where bet_id = '$bet_id'  and game_zone='$zone' ");

$hack = array("1" => $rs_hack["bet_count_1"], "2" => $rs_hack["bet_count_2"], "3" => $rs_hack["bet_count_3"], "4" => $rs_hack["bet_count_4"], "5" => $rs_hack["bet_count_5"], "6" => $rs_hack["bet_count_6"]);

$sql="select * from bom_tb_games_config where con_id=1 ";
$rec=sql_array($sql);

if($rec["con_fish_win"]>=0 and $rec["con_fish_win"]<3){
	include "_process_hack_fish.php";
	$sql_rec="update bom_tb_games_config set  con_fish_win=con_fish_win+1 where con_id=1 ";
	sql_query($sql_rec);
}else{
	$ex_sc1 = array("1"=>1,"2"=>2,"3"=>3,"4"=>4,"5"=>5,"6"=>6);
	$ex_sc2 = array("2"=>2,"4"=>4,"6"=>6,"5"=>5,"3"=>3,"1"=>1);
	$ex_sc3 = array("6"=>6,"5"=>5,"4"=>4,"3"=>3,"2"=>2,"1"=>1);
	$sql_rec="update bom_tb_games_config set  con_fish_win=0 where con_id=1 ";
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







	

		


if($rec[con_fish_bingo_1]>0){
	$ok1a=$rec[con_fish_bingo_1];
	}else{
$ok1a=$ex_sc1[1];		
		}
		
if($rec[con_fish_bingo_2]>0){
	$ok2a=$rec[con_fish_bingo_2];
	}else{
$ok2a=$ex_sc2[1];		
		}
		
if($rec[con_fish_bingo_3]>0){
	$ok3a=$rec[con_fish_bingo_3];
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
$sql="update bom_tb_games_bet_live set  bet_win='$x_win',bet_win_score='$sc_win'    where bet_id='$bet_id'   and game_zone='$zone'  and bet_win=''";
sql_query($sql);
$sql="update bom_tb_games_bill_play_live set  bet_win='$x_win'  where bet_id='$bet_id'  and game_zone='$zone'  and bet_win=''";
sql_query($sql);

$url_filed="fish/json/win.txt";
$js1=array();
$js1[]=array("1"=>"$ok1a","2"=>"$ok2a","3"=>"$ok3a");
$txt11=json_encode($js1);
write($url_filed ,$txt11,"w+"); 


######################เบิ้ล3
if(($ok1a==$ok2a) and ($ok1a==$ok3a)){
$sql="update bom_tb_games_bill_play_live set  play_pay=play_pay*3, play_br_pay_1=play_br_pay_1*3, play_br_pay_2=play_br_pay_2*3, play_br_pay_3=play_br_pay_3*3, play_br_pay_4=play_br_pay_4*3 ,play_status=1   where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet='$ok1a'; ";
sql_query($sql);	
}

######################เบิ้ล2
if($ok1a==$ok2a){
$sql="update bom_tb_games_bill_play_live set  play_pay=play_pay*2, play_br_pay_1=play_br_pay_1*2, play_br_pay_2=play_br_pay_2*2, play_br_pay_3=play_br_pay_3*2, play_br_pay_4=play_br_pay_4*2 ,play_status=1   where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet='$ok1a'; ";
sql_query($sql);	
}
if($ok1a==$ok3a){
$sql="update bom_tb_games_bill_play_live set  play_pay=play_pay*2, play_br_pay_1=play_br_pay_1*2, play_br_pay_2=play_br_pay_2*2, play_br_pay_3=play_br_pay_3*2, play_br_pay_4=play_br_pay_4*2  ,play_status=1  where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet='$ok1a'; ";
sql_query($sql);	
}
if($ok2a==$ok3a){
$sql="update bom_tb_games_bill_play_live set  play_pay=play_pay*2, play_br_pay_1=play_br_pay_1*2, play_br_pay_2=play_br_pay_2*2, play_br_pay_3=play_br_pay_3*2, play_br_pay_4=play_br_pay_4*2  ,play_status=1  where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet='$ok2a'; ";
sql_query($sql);	
}




####################เช็คชนะ

	
$sql="update bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet='$ok1a'; ";
sql_query($sql);
$sql="update bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet='$ok2a'; ";
sql_query($sql);
$sql="update bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet='$ok3a'; ";
sql_query($sql);


	

##############2โต๊ด
foreach($tod_2 as $num_new){
			#######################################################อัพเดทแบบอาเรย์
$sql="update bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet='$num_new'; ";
sql_query($sql);
}


##############3โต๊ด
foreach($tod_3 as $num_new){
			#######################################################อัพเดทแบบอาเรย์
$sql="update bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet='$num_new'; ";
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