<?
######################################SA
$re0 = sql_array_lot("select * from bom_tb_1_sa where   play_number='$q_num' and  lot_type='$type_lot' ");	
$sumck0=$re0['s_sum'];
if($re0['s_sum']=="" and $re0['s_lock']==""){	
$sumck0=$quota_lot[$type_lot];
sql_query_lot(" INSERT IGNORE INTO bom_tb_1_sa ( play_number,	lot_type,	s_sum  )  values ('$q_num' , '$type_lot' , '$sumck0' ); ");				
}
######################################SA
######################################Agent L1
if($rid1>0  and $rmyshare[1][1]>0){
$re1 = sql_array_lot("select * from bom_tb_1_ag where   play_number='$q_num' and  lot_type='$type_lot'  and r_id='$rid1' ");
$sumck1=$re1['s_sum'];
if($re1['s_sum']=="" and $re1['s_lock']==""){	
			$ex1=@explode(",",$_SESSION['ardata'][$rid1]['r_lotto_over']);
			$sumck1=$ex1[$type_lot];
sql_query_lot(" INSERT IGNORE INTO bom_tb_1_ag ( play_number,	lot_type,	s_sum , r_id  )  values ('$q_num' , '$type_lot' , '$sumck1', '$rid1' ); ");				
}
}
######################################Agent L1


######################################Agent L2
if($rid2>0  and $rmyshare[2][1]>0){
$re2 = sql_array_lot("select * from bom_tb_1_ag where   play_number='$q_num' and  lot_type='$type_lot'  and r_id='$rid2' ");
$sumck2=$re2['s_sum'];
if($re2['s_sum']=="" and $re2['s_lock']==""){	
			$ex2=@explode(",",$_SESSION['ardata'][$rid2]['r_lotto_over']);
			$sumck2=$ex2[$type_lot];
sql_query_lot(" INSERT IGNORE INTO bom_tb_1_ag ( play_number,	lot_type,	s_sum , r_id  )  values ('$q_num' , '$type_lot' , '$sumck2', '$rid2' ); ");				
}
}
######################################Agent L2

######################################Agent L3
if($rid3>0  and $rmyshare[3][1]>0){
$re3 = sql_array_lot("select * from bom_tb_1_ag where   play_number='$q_num' and  lot_type='$type_lot'  and r_id='$rid3' ");
$sumck3=$re3['s_sum'];
if($re3['s_sum']=="" and $re3['s_lock']==""){	
			$ex3=@explode(",",$_SESSION['ardata'][$rid3]['r_lotto_over']);
			$sumck3=$ex3[$type_lot];
sql_query_lot(" INSERT IGNORE INTO bom_tb_1_ag ( play_number,	lot_type,	s_sum , r_id  )  values ('$q_num' , '$type_lot' , '$sumck3', '$rid3' ); ");				
}
}
######################################Agent L3


######################################Agent L4
if($rid4>0  and $rmyshare[4][1]>0){
$re4 = sql_array_lot("select * from bom_tb_1_ag where   play_number='$q_num' and  lot_type='$type_lot'  and r_id='$rid4' ");
$sumck4=$re4['s_sum'];
if($re4['s_sum']=="" and $re4['s_lock']==""){	
			$ex4=@explode(",",$_SESSION['ardata'][$rid4]['r_lotto_over']);
			$sumck4=$ex4[$type_lot];
sql_query_lot(" INSERT IGNORE INTO bom_tb_1_ag ( play_number,	lot_type,	s_sum , r_id  )  values ('$q_num' , '$type_lot' , '$sumck4', '$rid4' ); ");				
}
}
######################################Agent L4


######################################Agent L5
if($rid5>0  and $rmyshare[5][1]>0){
$re5 = sql_array_lot("select * from bom_tb_1_ag where   play_number='$q_num' and  lot_type='$type_lot'  and r_id='$rid5' ");
$sumck5=$re5['s_sum'];
if($re5['s_sum']=="" and $re5['s_lock']==""){	
			$ex5=@explode(",",$_SESSION['ardata'][$rid5]['r_lotto_over']);
			$sumck5=$ex5[$type_lot];
sql_query_lot(" INSERT IGNORE INTO bom_tb_1_ag ( play_number,	lot_type,	s_sum , r_id  )  values ('$q_num' , '$type_lot' , '$sumck5', '$rid5' ); ");				
}
}
######################################Agent L5


######################################Agent L6
if($rid6>0  and $rmyshare[6][1]>0){
$re6 = sql_array_lot("select * from bom_tb_1_ag where   play_number='$q_num' and  lot_type='$type_lot'  and r_id='$rid6' ");
$sumck6=$re6['s_sum'];
if($re6['s_sum']=="" and $re6['s_lock']==""){	
			$ex6=@explode(",",$_SESSION['ardata'][$rid6]['r_lotto_over']);
			$sumck6=$ex6[$type_lot];
sql_query_lot(" INSERT IGNORE INTO bom_tb_1_ag ( play_number,	lot_type,	s_sum , r_id  )  values ('$q_num' , '$type_lot' , '$sumck6', '$rid6' ); ");				
}
}
######################################Agent L6


######################################Agent L7
if($rid7>0  and $rmyshare[7][1]>0){
$re7 = sql_array_lot("select * from bom_tb_1_ag where   play_number='$q_num' and  lot_type='$type_lot'  and r_id='$rid7' ");
$sumck7=$re7['s_sum'];
if($re7['s_sum']=="" and $re7['s_lock']==""){	
			$ex7=@explode(",",$_SESSION['ardata'][$rid7]['r_lotto_over']);
			$sumck7=$ex7[$type_lot];
sql_query_lot(" INSERT IGNORE INTO bom_tb_1_ag ( play_number,	lot_type,	s_sum , r_id  )  values ('$q_num' , '$type_lot' , '$sumck7', '$rid7' ); ");				
}
}
######################################Agent L7


######################################Agent L8
if($rid8>0  and $rmyshare[8][1]>0){
$re8 = sql_array_lot("select * from bom_tb_1_ag where   play_number='$q_num' and  lot_type='$type_lot'  and r_id='$rid8' ");
$sumck8=$re8['s_sum'];
if($re8['s_sum']=="" and $re8['s_lock']==""){	
			$ex8=@explode(",",$_SESSION['ardata'][$rid8]['r_lotto_over']);
			$sumck8=$ex8[$type_lot];
sql_query_lot(" INSERT IGNORE INTO bom_tb_1_ag ( play_number,	lot_type,	s_sum , r_id  )  values ('$q_num' , '$type_lot' , '$sumck8', '$rid8' ); ");				
}
}
######################################Agent L8
?>