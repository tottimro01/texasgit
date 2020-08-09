<?
			 #################### Re L6
			 if($open_6==1 and  $rmyshare[6][1]>0){
				if($type_lot==3 or $type_lot==20  or $type_lot==24){			
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_sum=s_sum + $sumlimit6  where   play_number='$q_num3' and  lot_type='$type_lot'  and r_id='$rid6'  ");	
				}else{
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_sum=s_sum + $sumlimit6  where   play_number='$q_num' and  lot_type='$type_lot'  and r_id='$rid6'  ");	
					}
				 }
?>