<?
$zone=4;

$hack = array();
$rs_hack = sql_array("select * from bom_tb_games_bet_live where bet_id = '$bet_id'  and game_zone='$zone' ");

$hack = array("1" => $rs_hack["bet_count_1"], "2" => $rs_hack["bet_count_2"], "3" => $rs_hack["bet_count_3"], "4" => $rs_hack["bet_count_4"], "5" => $rs_hack["bet_count_5"], "6" => $rs_hack["bet_count_6"], "7" => $rs_hack["bet_count_7"], "8" => $rs_hack["bet_count_8"], "9" => $rs_hack["bet_count_9"]);

$sql="select * from bom_tb_games_config where con_id=1 ";
$rec=sql_array($sql);

if($rec["con_hilo_win"]>=0 and $rec["con_hilo_win"]<3){
	include "_process_hack_hilo.php";
	$sql_rec="update IGNORE bom_tb_games_config set  con_hilo_win=con_hilo_win+1 where con_id=1 ";
	sql_query($sql_rec);
}else{
	$ex_sc1 = array("1"=>1,"2"=>2,"3"=>3,"4"=>4,"5"=>5,"6"=>6);
	$ex_sc2 = array("2"=>2,"4"=>4,"6"=>6,"5"=>5,"3"=>3,"1"=>1);
	$ex_sc3 = array("6"=>6,"5"=>5,"4"=>4,"3"=>3,"2"=>2,"1"=>1);
	$sql_rec="update IGNORE bom_tb_games_config set  con_hilo_win=0 where con_id=1 ";
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







	

		


if($rec['con_hilo_bingo_1']>0){
	$ok1a=$rec['con_hilo_bingo_1'];
	}else{
$ok1a=$ex_sc1[1];		
		}
		
if($rec['con_hilo_bingo_2']>0){
	$ok2a=$rec['con_hilo_bingo_2'];
	}else{
$ok2a=$ex_sc2[1];		
		}
		
if($rec['con_hilo_bingo_3']>0){
	$ok3a=$rec['con_hilo_bingo_3'];
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
$sql="update IGNORE bom_tb_games_bet_live set  bet_win='$x_win',bet_win_score='$sc_win'    where bet_id='$bet_id'  and game_zone='$zone'  and bet_win=''";
sql_query($sql);
$sql="update IGNORE bom_tb_games_bill_play_live set  bet_win='$x_win'  where bet_id='$bet_id'  and game_zone='$zone'  and bet_win=''";
sql_query($sql);

$url_filed="hilo/json/win.json";
$js1=array();
$js1[]=array("1"=>"$ok1a","2"=>"$ok2a","3"=>"$ok3a");
$txt11=json_encode($js1);
write($url_filed ,$txt11,"w+"); 


######################เบิ้ล3
if(($ok1a==$ok2a) and ($ok1a==$ok3a)){
$sql="update IGNORE bom_tb_games_bill_play_live set  play_pay=play_pay*3
, play_br_pay_1=play_br_pay_1*3, play_br_pay_2=play_br_pay_2*3, play_br_pay_3=play_br_pay_3*3, play_br_pay_4=play_br_pay_4*3
, play_br_pay_5=play_br_pay_5*3, play_br_pay_6=play_br_pay_6*3, play_br_pay_7=play_br_pay_7*3, play_br_pay_8=play_br_pay_8*3 
 ,play_status=1   where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet='$ok1a'; ";
sql_query($sql);	
}

######################เบิ้ล2
if($ok1a==$ok2a){
$sql="update IGNORE bom_tb_games_bill_play_live set  play_pay=play_pay*2
, play_br_pay_1=play_br_pay_1*2, play_br_pay_2=play_br_pay_2*2, play_br_pay_3=play_br_pay_3*2, play_br_pay_4=play_br_pay_4*2 
, play_br_pay_5=play_br_pay_5*2, play_br_pay_6=play_br_pay_6*2, play_br_pay_7=play_br_pay_7*2, play_br_pay_8=play_br_pay_8*2 
 ,play_status=1   where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet='$ok1a'; ";
sql_query($sql);	
}
if($ok1a==$ok3a){
$sql="update IGNORE bom_tb_games_bill_play_live set  play_pay=play_pay*2
, play_br_pay_1=play_br_pay_1*2, play_br_pay_2=play_br_pay_2*2, play_br_pay_3=play_br_pay_3*2, play_br_pay_4=play_br_pay_4*2 
, play_br_pay_5=play_br_pay_5*2, play_br_pay_6=play_br_pay_6*2, play_br_pay_7=play_br_pay_7*2, play_br_pay_8=play_br_pay_8*2 
 ,play_status=1  where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet='$ok1a'; ";
sql_query($sql);	
}
if($ok2a==$ok3a){
$sql="update IGNORE bom_tb_games_bill_play_live set  play_pay=play_pay*2
, play_br_pay_1=play_br_pay_1*2, play_br_pay_2=play_br_pay_2*2, play_br_pay_3=play_br_pay_3*2, play_br_pay_4=play_br_pay_4*2 
, play_br_pay_5=play_br_pay_5*2, play_br_pay_6=play_br_pay_6*2, play_br_pay_7=play_br_pay_7*2, play_br_pay_8=play_br_pay_8*2 
 ,play_status=1  where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet='$ok2a'; ";
sql_query($sql);	
}




####################เช็คชนะ

	
$sql="update IGNORE bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet='$ok1a'; ";
sql_query($sql);
$sql="update IGNORE bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet='$ok2a'; ";
sql_query($sql);
$sql="update IGNORE bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet='$ok3a'; ";
sql_query($sql);

########################สูง-ต่ำ 11ไฮโล
if($cc1<11){
$sql="update IGNORE bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet='L'; ";
sql_query($sql);
$HL='L';
	}elseif($cc1==11){
$sql="update IGNORE bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet='11'; ";
sql_query($sql);
$HL='';
	}elseif($cc1>11){
$sql="update IGNORE bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet='H'; ";
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
$sql="update IGNORE bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet='$num_new'; ";
sql_query($sql);
}

	
##############2โต๊ด
foreach($tod_2 as $num_new){
			#######################################################อัพเดทแบบอาเรย์
$sql="update IGNORE bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet='$num_new'; ";
sql_query($sql);
}


##############3โต๊ด
foreach($tod_3 as $num_new){
			#######################################################อัพเดทแบบอาเรย์
$sql="update IGNORE bom_tb_games_bill_play_live set  play_status=1    where bet_id='$bet_id'   and game_zone='$zone' and play_status=7 and play_bet='$num_new'; ";
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
	'$rec[m_count]' ,'$sumbet','$log_sum','รางวัลเกมส์ ไฮโล',
	'$rs[play_id]' , 4 , '$zone' , '$bet_id' ,
	'BPB',3,'99991') ";
	sql_query($sql);	
	######################LOG ใหม่ 


$sql="update IGNORE bom_tb_member set m_count=m_count+$sumbet  where m_id='$rs[m_id]' ";
sql_query($sql);	
$sql="update IGNORE bom_tb_games_bill_play_live set r_pay_ok=1, b_bonus=$sumbet
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
$sql=sql_query("select * from bom_tb_games_bet where game_zone = 4 and b_date='$dnow ' order by bet_id desc limit 10");
while($rs=sql_fetch($sql)){
	$arr_db[] = $rs;
}

$arr_reverse = array_reverse($arr_db);

$arr_data = array();
$i=0;
foreach($arr_reverse as &$value){
	$exv = explode("," , $value["bet_win"]);
	$exvx = explode("," , $value["bet_win_score"]);
	
	$arr_data[$i]["b1"] = $exv[1];
	$arr_data[$i]["b2"] = $exv[2];
	$arr_data[$i]["b3"] = $exv[3];
	
	$arr_data[$i]["win"] = $exvx[1];
	$arr_data[$i]["id"] = $value["bet_id"];
	$i++;
}

$url_file="json/hilo_stats.json";
$txt=json_encode($arr_data);
write($url_file ,$txt,"w+"); */
#######################################################STATS

	
?>