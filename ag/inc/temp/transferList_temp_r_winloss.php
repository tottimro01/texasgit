<?php
################################Agent
$arsum=array();
$sql="select (
	  ROUND( ( b_sum - br_bonus_".$_lv." )	* (( $keep_share )/100) ,10)
  ) as r2 ,  
(
   	ROUND( 	-(  br_pay_".$_lv.")*(( $keep_share )/100) ,10)
   ) as r3  
 from bom_tb_football_bill where  r_agent_id like '%*".$r_id."*%' and b_accept=1    and r_cut_bet_".$_lv."=0   ";
$re1a=sql_query($sql);	
while($rsc1=sql_fetch($re1a)){
$arsum[2][]=$rsc1['r2'];
$arsum[3][]=$rsc1['r3'];
}

$sql="select (
    	  ROUND( ( b_total - br_bonus_".$_lv." )	* (( $keep_share )/100) ,10)
  ) as r2  ,  
(
   	ROUND( 	-( b_total - br_pay_".$_lv.")*(($keep_share)/100) ,10)
   ) as r3  
 from bom_tb_lotto_bill_play where r_agent_id like '%*".$r_id."*%'  and b_accept=1   and r_cut_bet_".$_lv."=0   ";
$re1a=sql_query($sql);	
while($rsc1=sql_fetch($re1a)){
$arsum[2][]=$rsc1['r2'];
$arsum[3][]=$rsc1['r3'];
}

$sql="select (
   	   ROUND( ( b_total - br_bonus_".$_lv." )	* (( $keep_share )/100) ,10)
  ) as r2  ,  
(
   	ROUND( 	-( b_total - br_pay_".$_lv.")*(($keep_share)/100) ,10)
   ) as r3  
 from bom_tb_games_bill_play where r_agent_id like '%*".$r_id."*%'   and b_accept=1   and r_cut_bet_".$_lv."=0    ";
$re1a=sql_query($sql);	
while($rsc1=sql_fetch($re1a)){
$arsum[2][]=$rsc1['r2'];
$arsum[3][]=$rsc1['r3'];
}


$sql="select (
     ROUND( ( b_total - br_bonus_".$_lv." )	* (( $keep_share )/100) ,10)
  ) as r2  ,  
(
   	ROUND( 	-( b_total - br_pay_".$_lv.")*(($keep_share)/100) ,10)
   ) as r3  
 from bom_tb_casino_bill_play where r_id = r_agent_id like '%*".$r_id."*%'  and b_accept=1  and r_cut_bet_".$_lv."=0   ";
$re1a=sql_query($sql);	
while($rsc1=sql_fetch($re1a)){
$arsum[2][]=$rsc1['r2'];
$arsum[3][]=$rsc1['r3'];
}
$sum_r_winloss=(@array_sum($arsum[2]))+(@array_sum($arsum[3]));
/*
$sql="select sum(
	  ROUND( ( b_sum - br_bonus_".$_lv." )	* (( $keep_share )/100) ,10)
  ) as r2 ,  
sum(
   	ROUND( 	-(  br_pay_".$_lv.")*(( $keep_share )/100) ,10)
   ) as r3  
 from bom_tb_football_bill where  r_agent_id like '%*".$r_id."*%' and b_accept=1    and r_cut_bet_".$_lv."=0   ";
$re1m=sql_array($sql);

$sql="select sum(
    	  ROUND( ( b_total - br_bonus_".$_lv." )	* (( $keep_share )/100) ,10)
  ) as r2  ,  
sum(
   	ROUND( 	-( b_total - br_pay_".$_lv.")*(($keep_share)/100) ,10)
   ) as r3  
 from bom_tb_lotto_bill_play where r_agent_id like '%*".$r_id."*%'  and b_accept=1   and r_cut_bet_".$_lv."=0   ";
$re2m=sql_array($sql);

$sql="select sum(
   	   ROUND( ( b_total - br_bonus_".$_lv." )	* (( $keep_share )/100) ,10)
  ) as r2  ,  
sum(
   	ROUND( 	-( b_total - br_pay_".$_lv.")*(($keep_share)/100) ,10)
   ) as r3  
 from bom_tb_games_bill_play where r_agent_id like '%*".$r_id."*%'   and b_accept=1   and r_cut_bet_".$_lv."=0    ";
$re3m=sql_array($sql);

$sql="select sum(
     ROUND( ( b_total - br_bonus_".$_lv." )	* (( $keep_share )/100) ,10)
  ) as r2  ,  
sum(
   	ROUND( 	-( b_total - br_pay_".$_lv.")*(($keep_share)/100) ,10)
   ) as r3  
 from bom_tb_casino_bill_play where r_id = r_agent_id like '%*".$r_id."*%'  and b_accept=1  and r_cut_bet_".$_lv."=0   ";
$re4m=sql_array($sql);
$sum_r_winloss=($re1m["r2"]+$re2m["r2"]+$re3m["r2"]+$re4m["r2"])+($re1m["r3"]+$re2m["r3"]+$re3m["r3"]+$re4m["r3"]);
*/


?>