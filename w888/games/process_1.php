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
	$sql_rec="update IGNORE bom_tb_games_config set  con_2hit_ok=0 where con_id=1 ";
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

	$sql_rec="update IGNORE bom_tb_games_config set  con_2hit_win=con_2hit_win+1 where con_id=1 ";
	sql_query($sql_rec);	
}else{
	
	#########################ปกติ
	$sql_rec="update IGNORE bom_tb_games_config set  con_2hit_win=0 where con_id=1 ";
	sql_query($sql_rec);
	

	}
	
}
	
$ok1a=$win_ok;	




############################################บันทึก
$x_win="win,$ok1a";

$sql="update IGNORE bom_tb_games_bet_live set  bet_win='$x_win'   where bet_id='$bet_id'  and game_zone='$zone'  and bet_win=''";
sql_query($sql);
$sql="update IGNORE bom_tb_games_bill_play_live set  bet_win='$x_win'    where bet_id='$bet_id'   and game_zone='$zone'  and bet_win=''";
sql_query($sql);


$url_filed="2hit/json/win.json";
$js1=array();
$js1[]=array("1"=>"$ok1a");
$txt11=json_encode($js1);
write($url_filed ,$txt11,"w+"); 




####################เช็คชนะ
$sql="update IGNORE bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone'   and play_status=7 and play_bet='$ok1a'";
sql_query($sql);
######################เสีย
$sql="update IGNORE bom_tb_games_bill_play_live set  play_status=4    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 ";
sql_query($sql);	


######################AF
$sql="select * from bom_tb_games_bill_play_live where  bet_id='$bet_id'   and game_zone='$zone'  and play_status!=7 and bonus_m_id>0   order by play_id desc";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
	if($rs['bonus_m_id']>0){
	#########################AF###################################
	$sum_af=$rs['b_total']*($rs['com_af']/100);
	#######################################################อัพเดทเงินสมาชิก
	$sql="update IGNORE bom_tb_member set ref_total=ref_total + $sum_af ,  ref_games=ref_games + $sum_af  where m_id='$rs[bonus_m_id]' ";
	sql_query($sql);
	#########################AF###################################
	}#	if($rs['bonus_m_id']>0){
}

#############################&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
#############################&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

	###########################คืนเงิน
$sql="select * from bom_tb_games_bill_play_live where play_status='1' and bet_id='$bet_id'   and game_zone='$zone' and r_pay_ok=0  order by play_id desc";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
$sumbet=$rs['b_total']*$rs['play_pay'];


	$sql="select m_id,m_count,m_agent_id,r_id from bom_tb_member where m_id='$rs[m_id]' ";
	$rec=sql_array($sql);
	$rs_ag = sql_array("select r_agent_id from bom_tb_agent where r_id = '$rec[r_id]'");
	$log_sum=$rec[m_count]+$sumbet;
	######################LOG ใหม่"._bIP()."
	$sql="INSERT IGNORE INTO bom_tb_all_payment (
	bap_date, bap_ip,	bap_type	,m_id	,r_id,	m_agent_id,	r_agent_id,	
	bap_before, bap_in ,bap_after,bap_comment,
	bill_id,bap_play_type,bap_zone,bap_rob,
	bap_code,bap_by_type,bap_by_id) values(
	now(),'', '9', '$rec[m_id]','$rec[r_id]','$rec[m_agent_id]','$rs_ag[r_agent_id]',
	'$rec[m_count]' ,'$sumbet','$log_sum','รางวัลเกมส์ 2ฮิต',
	'$rs[play_id]' , 4 , '$zone' , '$bet_id' ,
	'BPB',3,'99991') ";
	sql_query($sql);	
	######################LOG ใหม่ 



$sql="update IGNORE bom_tb_member set m_count=m_count+$sumbet  where m_id='$rs[m_id]' ";
sql_query($sql);	
$sql="update IGNORE bom_tb_games_bill_play_live set r_pay_ok=1
, b_bonus=$sumbet,  br_bonus_1=$sumbet,  br_bonus_2=$sumbet,  br_bonus_3=$sumbet,  br_bonus_4=$sumbet  
,  br_bonus_5=$sumbet,  br_bonus_6=$sumbet,  br_bonus_7=$sumbet,  br_bonus_8=$sumbet  
where play_id='$rs[play_id]'  ";
sql_query($sql);



#######################################################LOG
	 /*$sql="select play_id from  bom_tb_games_bill_play_live  where m_id='$rs[m_id]'  order by  play_id desc limit 1  ";
	 $rex=sql_array($sql);
	 $sql="select m_count from  bom_tb_member  where m_id='$rs[m_id]'  ";
	 $rexm=sql_array($sql);
	 $tosum=0;
	 $tosum2=$sumbet;
     $xcountm=$rexm['m_count']-$sumbet;
	  $log_sum=$rexm['m_count'];
	 $sql="INSERT IGNORE INTO bom_tb_databet_live (d_date,	play_id,	m_id	,d_count, d_out,	d_in	,d_sum	,d_by ) values(now(),'$rex[play_id]','$rs[m_id]','$xcountm','$tosum','$tosum2' ,'$log_sum',24)";
     sql_query($sql);*/
	#######################################################LOG

}

#######################################################STATS
/*$dnow = date("d-m-Y");
  
$arr_db = array();
$sql=sql_query("select * from bom_tb_games_bet where game_zone = 1 and b_date='$dnow ' order by bet_id desc limit 60");
while($rs=sql_fetch($sql)){
	$arr_db[] = $rs;
}

$arr_reverse = array_reverse($arr_db);

$arr_data = array();
$i=0;
foreach($arr_reverse as &$value){
	$exv = explode("," , $value["bet_win"]);
	$arr_data[$i]["win"] = $exv[1];
	$arr_data[$i]["id"] = $value["bet_id"];
	$i++;
}

$url_file="json/2hit_stats.json";
$txt=json_encode($arr_data);
write($url_file ,$txt,"w+"); */
#######################################################STATS
?>