<?php
################################Member
$amsum=array();
  $sql="select  ( 
  (ROUND(  b_sum ,10))    
     ) as t1 from bom_tb_football_bill_live where  m_id = '".$m_id."' and b_accept=1 and b_status=5 ";
$re1a=sql_query($sql);	
while($rsc1=sql_fetch($re1a)){
$amsum[2][]=$rsc1['t1'];
}

  $sql="select  ( 
  (ROUND(  b_total ,10))  
     ) as t1 from bom_tb_lotto_bill_play_live where  m_id = '".$m_id."' and b_accept=1 and b_status=5";
$re1a=sql_query($sql);	
while($rsc1=sql_fetch($re1a)){
$amsum[2][]=$rsc1['t1'];
}
$sum_m_outStanding=(@array_sum($amsum[2]));
/*
$sql="select (
   	 	ROUND( 	b_total ,10)
  ) as r2 
 from bom_tb_games_bill_play_live where r_agent_id like '%*".$r_id."*%'   and b_accept=1  and play_status=7 ";
$re1a=sql_query($sql);	
while($rsc1=sql_fetch($re1a)){
$amsum[2][]=$rsc1['r2'];
}


$sql="select (
   	ROUND( 	b_total ,10)
  ) as r2 
 from bom_tb_casino_bill_play_live where r_id = r_agent_id like '%*".$r_id."*%'  and b_accept=1  and play_status=7   ";
$re1a=sql_query($sql);	
while($rsc1=sql_fetch($re1a)){
$amsum[2][]=$rsc1['r2'];
}
$sum_m_outStanding=(@array_sum($amsum[2]));
*/
// $sql="select sum(
//    	ROUND( 	b_sum ,10)
//   ) as r2 
//  from bom_tb_football_bill_live where  m_id = '".$m_id."' and b_accept=1  and b_status=5  ";
// $re1m=sql_array($sql);

// $sql="select sum(
//     	ROUND( 	b_total ,10)
//   ) as r2 
//  from bom_tb_lotto_bill_play_live where m_id = '".$m_id."'  and b_accept=1  and play_status=7 ";
// $re2m=sql_array($sql);

// $sql="select sum(
//    	 	ROUND( 	b_total ,10)
//   ) as r2 
//  from bom_tb_games_bill_play_live where m_id = '".$m_id."'   and b_accept=1  and play_status=7 ";
// $re3m=sql_array($sql);

// $sql="select sum(
//    	ROUND( 	b_total ,10)
//   ) as r2 
//  from bom_tb_casino_bill_play_live where r_id = m_id = '".$m_id."'  and b_accept=1  and play_status=7   ";
// $re4m=sql_array($sql);

// $sum_m_outStanding=$re1m["r2"]+$re2m["r2"]+$re3m["r2"]+$re4m["r2"];


/*
 $d_incre = strtotime("-7 day");
  $sql="select sum(b_total) as btotal , sum( 
  (ROUND(  b_sum ,10))    
     ) as t1 from bom_tb_football_bill_live where  m_id = '".$m_id."' and b_accept!=2 and b_status=5 and r_cut_bet_4=0";
  
  $reb1=sql_array($sql);
  $sql="select sum(b_total) as btotal , sum( 
  (ROUND(  b_pay ,10))  
     ) as t1 from bom_tb_lotto_bill_live where  m_id = '".$m_id."' and b_accept!=0 and b_status=5";
  $reb2=sql_array($sql);
  
  $sql="select sum(b_total) as btotal , sum( 
  (ROUND(  b_pay ,10))  
     ) as t1 from bom_tb_games_bill_play_live where  m_id = '".$m_id."' and b_accept!=2 and and play_status=7  and play_timestam >= $d_incre";
  $reb4=sql_array($sql);
  
  $sum_m_outStanding=$reb1["t1"]+$reb2["t1"]+$reb3["t1"]+$reb4["t1"];
*/
?>