<?
			 #################### Re L3
			 if($open_3==1  and  $rmyshare[3][1]>0){
				if($type_lot==3 or $type_lot==26){			
				sql_query_lot("update IGNORE bom_tb_".$zone."_ag set  s_sum=s_sum + $sumlimit3  where   play_number='$q_num3' and  lot_type='$type_lot'   and  lot_rob='$rob'  and r_id='$rid3'  ");	
				}else{
				sql_query_lot("update IGNORE bom_tb_".$zone."_ag set  s_sum=s_sum + $sumlimit3  where   play_number='$q_num' and  lot_type='$type_lot'   and  lot_rob='$rob'  and r_id='$rid3'  ");	
					}
				 }   
?>