<?
			 #################### Re L1
			 if($open_1==1 and  $rmyshare[1][1]>0){
				if($type_lot==3 or $type_lot==20  or $type_lot==24){			
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_sum=s_sum + $sumlimit1  where   play_number='$q_num3' and  lot_type='$type_lot'  and r_id='$rid1'  ");	
				}else{
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_sum=s_sum + $sumlimit1  where   play_number='$q_num' and  lot_type='$type_lot'  and r_id='$rid1'  ");	
					}
				 }
?>