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
			

	$sql_rec="update IGNORE bom_tb_games_config set  con_dragon_ok=0 where con_id=1 ";
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
		


	$sql_rec="update IGNORE bom_tb_games_config set  con_dragon_win=con_dragon_win+1 where con_id=1 ";
	sql_query($sql_rec);	
		
	}else{
	
	#########################ปกติ
	$sql_rec="update IGNORE bom_tb_games_config set  con_dragon_win=0 where con_id=1 ";
	sql_query($sql_rec);
	
	
	}
	
	
	
}



#$cc1=($ex_sc[$ok1a])%10;
#$cc2=($ex_sc[$ok2a])%10;
$cc1=($ex_yai_dragon[$ok1a]);
$cc2=($ex_yai_dragon[$ok2a]);
############################################บันทึก
$x_win="win,$ok1a,$ok2a";
$sc_win="sc,$cc1,$cc2";
$sql="update IGNORE bom_tb_games_bet_live set  bet_win='$x_win',bet_win_score='$sc_win'    where bet_id='$bet_id'  and game_zone='$zone'  and bet_win=''";
sql_query($sql);
$sql="update IGNORE bom_tb_games_bill_play_live set  bet_win='$x_win'    where bet_id='$bet_id'   and game_zone='$zone'  and bet_win=''";
sql_query($sql);


$url_filed="dragon/json/win.json";
$js1=array();
$js1[]=array("1"=>"$ok1a","2"=>"$ok2a");
$txt11=json_encode($js1);
write($url_filed ,$txt11,"w+"); 




####################เช็คชนะ
if($cc1>$cc2){
	
$sql="update IGNORE bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone'   and play_status=7 and play_bet=1";
sql_query($sql);
	
}elseif($cc1<$cc2){
$sql="update IGNORE bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet=2";
sql_query($sql);
	
}elseif($cc1==$cc2){
	
$sql="update IGNORE bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet=3";
sql_query($sql);

}



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
	'$rec[m_count]' ,'$sumbet','$log_sum','รางวัลเกมส์ ดราก้อน-ไทเกอร์',
	'$rs[play_id]' , 4 , '$zone' , '$bet_id' ,
	'BPB',3,'99991') ";
	sql_query($sql);	
	######################LOG ใหม่ 


$sql="update  IGNORE bom_tb_member set m_count=m_count+$sumbet  where m_id='$rs[m_id]' ";
sql_query($sql);	
$sql="update  IGNORE bom_tb_games_bill_play_live set r_pay_ok=1, b_bonus=$sumbet
,  br_bonus_1=$sumbet,  br_bonus_2=$sumbet,  br_bonus_3=$sumbet,  br_bonus_4=$sumbet 
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
$sql=sql_query("select * from bom_tb_games_bet where game_zone = 2 and b_date='$dnow ' order by bet_id desc limit 60");
while($rs=sql_fetch($sql)){
	$arr_db[] = $rs;
}

$arr_reverse = array_reverse($arr_db);

$arr_data = array();
$i=0;
foreach($arr_reverse as &$value){
	$exv = explode("," , $value["bet_win_score"]);
	if($exv[1]==$exv[2]){
		$arr_data[$i]["win"] = 3;
	}else if($exv[1]>$exv[2]){
		$arr_data[$i]["win"] = 1;
	}else if($exv[1]<$exv[2]){
		$arr_data[$i]["win"] = 2;
	}
	$arr_data[$i]["id"] = $value["bet_id"];
	$i++;
}

$url_file="json/dragon_stats.json";
$txt=json_encode($arr_data);
write($url_file ,$txt,"w+"); */
#######################################################STATS
?>