<?
$zone=1;




shuffle($ex_2hit);
shuffle($ex_2hit);
shuffle($ex_2hit);
shuffle($ex_2hit);


$win_ok=$ex_2hit[1];

$sql="select * from bom_tb_games_config where con_id=1 ";
$rec=sql_array($sql);

if($rec["con_2hit_ok"]>0){
	######################โกงบังคับ
	$win_ok=$rec["con_2hit_ok"];	
	$sql_rec="update bom_tb_games_config set  con_2hit_ok=0 where con_id=1 ";
	sql_query($sql_rec);	
	
}else{

if($rec["con_2hit_win"]<3){
	##############################โกง
$rh = sql_array("select * from bom_tb_games_bet_live where bet_id = '$bet_id'  and game_zone='$zone' ");
if($rh["bet_count_1"]>=$rh["bet_count_2"]){
$win_ok=2;	
	}else{
$win_ok=1;	
		}

	$sql_rec="update bom_tb_games_config set  con_2hit_win=con_2hit_win+1 where con_id=1 ";
	sql_query($sql_rec);	
}else{
	
	#########################ปกติ
	$sql_rec="update bom_tb_games_config set  con_2hit_win=0 where con_id=1 ";
	sql_query($sql_rec);
	

	}
	
}
	
$ok1a=$win_ok;	




############################################บันทึก
$x_win="win,$ok1a";

$sql="update bom_tb_games_bet_live set  bet_win='$x_win'   where bet_id='$bet_id'  and game_zone='$zone'  and bet_win=''";
sql_query($sql);
$sql="update bom_tb_games_bill_play_live set  bet_win='$x_win'    where bet_id='$bet_id'   and game_zone='$zone'  and bet_win=''";
sql_query($sql);


$url_filed="2hit/json/win.txt";
$js1=array();
$js1[]=array("1"=>"$ok1a");
$txt11=json_encode($js1);
write($url_filed ,$txt11,"w+"); 




####################เช็คชนะ
$sql="update bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone'   and play_status=7 and play_bet='$ok1a'";
sql_query($sql);
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