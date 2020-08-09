<?php
################################Member
$amsum=array();
$sql="select 
(
		ROUND( 	( b_sum - b_bonus)*((b_share_m)/100) ,10)
  ) as r2 ,  
(
   	ROUND( 	-(  b_pay)*((b_share_m)/100) ,10)
   ) as r3
 from bom_tb_football_bill where  m_id = '".$m_id."' and b_accept=1 and r_cut_bet_m=0   ";
$re1a=sql_query($sql);	
while($rsc1=sql_fetch($re1a)){
$amsum[2][]=$rsc1['r2'];
$amsum[3][]=$rsc1['r3'];
}


$sql="select 
(
    		ROUND( 	( b_total - b_bonus)*((b_share_m)/100) ,10)
  ) as r2  , 
  (
   	ROUND( 	-( b_total - b_pay)*((b_share_m)/100) ,10)
   ) as r3  
 from bom_tb_lotto_bill_play where m_id = '".$m_id."'  and b_accept=1  and r_cut_bet_m=0    ";
$re1a=sql_query($sql);	
while($rsc1=sql_fetch($re1a)){
$amsum[2][]=$rsc1['r2'];
$amsum[3][]=$rsc1['r3'];
}

$sql="select 
(
    		ROUND( 	( b_total - b_bonus)*((b_share_m)/100) ,10)
  ) as r2  , 
  (
   	ROUND( 	-( b_total - b_pay)*((b_share_m)/100) ,10)
   ) as r3  
 from bom_tb_games_bill_play where m_id = '".$m_id."'   and b_accept=1   and r_cut_bet_m=0    ";
$re1a=sql_query($sql);	
while($rsc1=sql_fetch($re1a)){
$amsum[2][]=$rsc1['r2'];
$amsum[3][]=$rsc1['r3'];
}


$sql="select 
(
   	ROUND( 	( b_total - b_bonus)*((b_share_m)/100) ,10)
  ) as r2 , 
  (
   	ROUND( 	-( b_total - b_pay)*((b_share_m)/100) ,10)
   ) as r3  
 from bom_tb_casino_bill_play where r_id = m_id = '".$m_id."'  and b_accept=1   and r_cut_bet_m=0     ";
$re1a=sql_query($sql);	
while($rsc1=sql_fetch($re1a)){
$amsum[2][]=$rsc1['r2'];
$amsum[3][]=$rsc1['r3'];
}


$sum_m_winloss=(@array_sum($amsum[2]))+(@array_sum($amsum[3]));
/*
$sql="select 
sum(
		ROUND( 	( b_sum - b_bonus)*((b_share_m)/100) ,10)
  ) as r2 ,  
sum(
   	ROUND( 	-(  b_pay)*((b_share_m)/100) ,10)
   ) as r3
 from bom_tb_football_bill where  m_id = '".$m_id."' and b_accept=1 and r_cut_bet_m=0   ";
$re1m=sql_array($sql);

$sql="select 
sum(
    		ROUND( 	( b_total - b_bonus)*((b_share_m)/100) ,10)
  ) as r2  , 
  sum(
   	ROUND( 	-( b_total - b_pay)*((b_share_m)/100) ,10)
   ) as r3  
 from bom_tb_lotto_bill_play where m_id = '".$m_id."'  and b_accept=1  and r_cut_bet_m=0    ";
$re2m=sql_array($sql);

$sql="select 
sum(
    		ROUND( 	( b_total - b_bonus)*((b_share_m)/100) ,10)
  ) as r2  , 
  sum(
   	ROUND( 	-( b_total - b_pay)*((b_share_m)/100) ,10)
   ) as r3  
 from bom_tb_games_bill_play where m_id = '".$m_id."'   and b_accept=1   and r_cut_bet_m=0    ";
$re3m=sql_array($sql);

$sql="select 
sum(
   	ROUND( 	( b_total - b_bonus)*((b_share_m)/100) ,10)
  ) as r2 , 
  sum(
   	ROUND( 	-( b_total - b_pay)*((b_share_m)/100) ,10)
   ) as r3  
 from bom_tb_casino_bill_play where r_id = m_id = '".$m_id."'  and b_accept=1   and r_cut_bet_m=0     ";
$re4m=sql_array($sql);

$sum_m_winloss=($re1m["r2"]+$re2m["r2"]+$re3m["r2"]+$re4m["r2"])+($re1m["r3"]+$re2m["r3"]+$re3m["r3"]+$re4m["r3"]);
*/
?>