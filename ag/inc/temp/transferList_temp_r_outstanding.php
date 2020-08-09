<?php
################################Agent

$arsum=array();
$sql="select (
   	ROUND( 	b_sum ,10)
  ) as r2 
 from bom_tb_football_bill_live where  r_agent_id like '%*".$r_id."*%' and b_accept=1  and b_status=5  ";
$re1a=sql_query($sql);	
while($rsc1=sql_fetch($re1a)){
$arsum[2][]=$rsc1['r2'];
}

$sql="select (
    	ROUND( 	b_total ,10)
  ) as r2 
 from bom_tb_lotto_bill_play_live where r_agent_id like '%*".$r_id."*%'  and b_accept=1  and play_status=7 ";
$re1a=sql_query($sql);	
while($rsc1=sql_fetch($re1a)){
$arsum[2][]=$rsc1['r2'];
}
/*
$sql="select (
   	 	ROUND( 	b_total ,10)
  ) as r2 
 from bom_tb_games_bill_play_live where r_agent_id like '%*".$r_id."*%'   and b_accept=1  and play_status=7 ";
$re1a=sql_query($sql);	
while($rsc1=sql_fetch($re1a)){
$arsum[2][]=$rsc1['r2'];
}


$sql="select (
   	ROUND( 	b_total ,10)
  ) as r2 
 from bom_tb_casino_bill_play_live where r_id = r_agent_id like '%*".$r_id."*%'  and b_accept=1  and play_status=7   ";
$re1a=sql_query($sql);	
while($rsc1=sql_fetch($re1a)){
$arsum[2][]=$rsc1['r2'];
}
*/
$sum_r_outStanding=(@array_sum($arsum[2]));

/*
$sql="select sum(
   	ROUND( 	b_sum ,10)
  ) as r2 
 from bom_tb_football_bill_live where  r_agent_id like '%*".$r_id."*%' and b_accept=1  and b_status=5  ";
$re1m=sql_array($sql);

$sql="select sum(
    	ROUND( 	b_total ,10)
  ) as r2 
 from bom_tb_lotto_bill_play_live where r_agent_id like '%*".$r_id."*%'  and b_accept=1  and play_status=7 ";
$re2m=sql_array($sql);

$sql="select sum(
   	 	ROUND( 	b_total ,10)
  ) as r2 
 from bom_tb_games_bill_play_live where r_agent_id like '%*".$r_id."*%'   and b_accept=1  and play_status=7 ";
$re3m=sql_array($sql);

$sql="select sum(
   	ROUND( 	b_total ,10)
  ) as r2 
 from bom_tb_casino_bill_play_live where r_id = r_agent_id like '%*".$r_id."*%'  and b_accept=1  and play_status=7   ";
$re4m=sql_array($sql);

$sum_r_outStanding=$re1m["r2"]+$re2m["r2"]+$re3m["r2"]+$re4m["r2"];
*/
?>