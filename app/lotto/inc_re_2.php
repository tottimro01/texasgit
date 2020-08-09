<?
			 #################### Re L2
			 if($open_2==1 and  $rmyshare[2][1]>0){
				if($type_lot==3 or $type_lot==20  or $type_lot==24){			
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_sum=s_sum + $sumlimit2  where   play_number='$q_num3' and  lot_type='$type_lot'  and r_id='$rid2'  ");	
				}else{
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_sum=s_sum + $sumlimit2  where   play_number='$q_num' and  lot_type='$type_lot'  and r_id='$rid2'  ");	
					}
				 }
?>