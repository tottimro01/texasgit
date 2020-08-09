<?          

$open_1=0;
			######################################Agent L1
		if($re1['s_lock']==1 and $rid1>0  and $rmyshare[1][1]>0){
			# $_SESSION['error'][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = <b>! $lang_member[414]</b>.</span>";
			
			$my_r1=0;
			}elseif($sumck1<10  and $rid1>0 and $rmyshare[1][1]>0 ){
			# $_SESSION['error'][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = <b>$lang_member[414]</b>.</span>";
			 ################# Lock 1
				if($type_lot==3 or $type_lot==20  or $type_lot==24){			
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_lock=1  where   play_number='$q_num3' and  lot_type='$type_lot'  and r_id='$rid1'   and s_lock=0  ");	
				}else{
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_lock=1  where   play_number='$q_num' and  lot_type='$type_lot'   and r_id='$rid1'  and s_lock=0  ");	
					}
					
			$my_r1=0;
			}elseif($sumck1<$x_sum  and $rid1>0 and $rmyshare[1][1]>0){
			# $txt_q="$lang_member[445]: ".number_format($sumck1);
			 #$_SESSION['error'][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = <b>$lang_member[414]</b> $txt_q</span>";	
			
			$my_r1=0;
			}elseif($rid1>0  and $rmyshare[1][1]==0){
			###############ไม่หุ้น
			$my_r1=0;
			}else{
				
				if($rid1>0){
					
					if($last_rid==$rid1){
				    $sumlimit1=$x_sum*( $mshare[1] /100);	
					}else{
					$sumlimit1=$x_sum*( $rmyshare[1][1] /100);
					}

					
				if($type_lot==3 or $type_lot==20  or $type_lot==24){			
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_sum=s_sum - $sumlimit1  where   play_number='$q_num3' and  lot_type='$type_lot'  and r_id='$rid1'  ");	
				}else{
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_sum=s_sum - $sumlimit1  where   play_number='$q_num' and  lot_type='$type_lot'  and r_id='$rid1'  ");	
					}
					
					
				}
				
			$open_1=1;
          }#	if($re1['s_lock']==1 and $rid1>0){
			######################################Agent L1	        	
			
			
			
$open_2=0;
			######################################Agent L2
		   if($re2['s_lock']==1 and $rid2>0 and $rmyshare[2][1]>0){
			# $_SESSION['error'][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = <b>! $lang_member[414]</b>.</span>";
			 $my_r2=0;
			}elseif($sumck2<10  and $rid2>0  and $rmyshare[2][1]>0 ){
			# $_SESSION['error'][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = <b>$lang_member[414]</b>.</span>";
			 ################# Lock 1
				if($type_lot==3 or $type_lot==20  or $type_lot==24){			
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_lock=1  where   play_number='$q_num3' and  lot_type='$type_lot'  and r_id='$rid2'  and s_lock=0   ");	
				}else{
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_lock=1  where   play_number='$q_num' and  lot_type='$type_lot'   and r_id='$rid2'  and s_lock=0  ");	
					}
					
			 $my_r2=0;
			}elseif($sumck2<$x_sum  and $rid2>0  and $rmyshare[2][1]>0){
			# $txt_q="$lang_member[445]: ".number_format($sumck2);
			# $_SESSION['error'][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = <b>$lang_member[414]</b> $txt_q</span>";	
			 $my_r2=0;
			}elseif($rid2>0  and $rmyshare[2][1]==0){
			###############ไม่หุ้น
			 $my_r2=0;
			}else{
				
				if($rid2>0){
					if($last_rid==$rid2){
				$sumlimit2=$x_sum*( $mshare[1] /100);	
					}else{
					$sumlimit2=$x_sum*( $rmyshare[2][1] /100);
					}
			
					
				if($type_lot==3 or $type_lot==20  or $type_lot==24){			
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_sum=s_sum - $sumlimit2  where   play_number='$q_num3' and  lot_type='$type_lot'  and r_id='$rid2'  ");	
				}else{
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_sum=s_sum - $sumlimit2  where   play_number='$q_num' and  lot_type='$type_lot'  and r_id='$rid2'  ");	
					}
				}
			$open_2=1;	
          }#	if($re2['s_lock']==1 and $rid2>0){
			######################################Agent L2						
								

			
$open_3=0;
			######################################Agent L3
		if($re3['s_lock']==1 and $rid3>0  and $rmyshare[3][1]>0){
			# $_SESSION['error'][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = <b>! $lang_member[414]</b>.</span>";
			  $my_r3=0;
			}elseif($sumck3<10  and $rid3>0   and $rmyshare[3][1]>0 ){
			# $_SESSION['error'][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = <b>$lang_member[414]</b>.</span>";
			 ################# Lock 1
				if($type_lot==3 or $type_lot==20  or $type_lot==24){			
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_lock=1  where   play_number='$q_num3' and  lot_type='$type_lot'  and r_id='$rid3'   and s_lock=0  ");	
				}else{
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_lock=1  where   play_number='$q_num' and  lot_type='$type_lot'   and r_id='$rid3'   and s_lock=0 ");	
					}
			  $my_r3=0;
			
			}elseif($sumck3<$x_sum  and $rid3>0   and $rmyshare[3][1]>0){
			# $txt_q="$lang_member[445]: ".number_format($sumck3);
			# $_SESSION['error'][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = <b>$lang_member[414]</b> $txt_q</span>";	
			  $my_r3=0;
			}elseif($rid3>0  and $rmyshare[3][1]==0){
			###############ไม่หุ้น
			  $my_r3=0;
			}else{
				
				if($rid3>0){
					if($last_rid==$rid3){
				$sumlimit3=$x_sum*( $mshare[1] /100);	
					}else{
				$sumlimit3=$x_sum*( $rmyshare[3][1] /100);
					}
	
					
				if($type_lot==3 or $type_lot==20  or $type_lot==24){			
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_sum=s_sum - $sumlimit3  where   play_number='$q_num3' and  lot_type='$type_lot'  and r_id='$rid3'  ");	
				}else{
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_sum=s_sum - $sumlimit3  where   play_number='$q_num' and  lot_type='$type_lot'  and r_id='$rid3'  ");	
					}
				}
		$open_3=1;
          }#	if($re3['s_lock']==1 and $rid3>0){
			######################################Agent L3 	
			
$open_4=0;
			######################################Agent L4
	      if($re4['s_lock']==1 and $rid4>0   and $rmyshare[4][1]>0){
			# $_SESSION['error'][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = <b>! $lang_member[414]</b>.</span>";
			   $my_r4=0;
			}elseif($sumck4<10  and $rid4>0    and $rmyshare[4][1]>0){
			# $_SESSION['error'][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = <b>$lang_member[414]</b>.</span>";
			 ################# Lock 1
				if($type_lot==3 or $type_lot==20  or $type_lot==24){			
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_lock=1  where   play_number='$q_num3' and  lot_type='$type_lot'  and r_id='$rid4'   and s_lock=0  ");	
				}else{
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_lock=1  where   play_number='$q_num' and  lot_type='$type_lot'   and r_id='$rid4'  and s_lock=0  ");	
					}
		        $my_r4=0;
			
			
			}elseif($sumck4<$x_sum  and $rid4>0   and $rmyshare[4][1]>0){
			# $txt_q="$lang_member[445]: ".number_format($sumck4);
			 #$_SESSION['error'][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = <b>$lang_member[414]</b> $txt_q</span>";	
			  $my_r4=0;
			}elseif($rid4>0  and $rmyshare[4][1]==0){
			###############ไม่หุ้น
			  $my_r4=0;
			}else{
				
				if($rid4>0){
				
					if($last_rid==$rid4){
				$sumlimit4=$x_sum*( $mshare[1] /100);	
					}else{
				$sumlimit4=$x_sum*( $rmyshare[4][1] /100);
					}
					
				if($type_lot==3 or $type_lot==20  or $type_lot==24){			
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_sum=s_sum - $sumlimit4  where   play_number='$q_num3' and  lot_type='$type_lot'  and r_id='$rid4'  ");	
				}else{
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_sum=s_sum - $sumlimit4  where   play_number='$q_num' and  lot_type='$type_lot'  and r_id='$rid4'  ");	
					}
				}
		$open_4=1;
          }#	if($re4['s_lock']==1 and $rid4>0){
			######################################Agent L4			

			
$open_5=0;
			######################################Agent L5
		  if($re5['s_lock']==1 and $rid5>0   and $rmyshare[5][1]>0){
			# $_SESSION['error'][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = <b>! $lang_member[414]</b>.</span>";
			  $my_r5=0;
			}elseif($sumck5<10  and $rid5>0   and $rmyshare[5][1]>0 ){
			# $_SESSION['error'][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = <b>$lang_member[414]</b>.</span>";
			 ################# Lock 1
				if($type_lot==3 or $type_lot==20  or $type_lot==24){			
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_lock=1  where   play_number='$q_num3' and  lot_type='$type_lot'  and r_id='$rid5'   and s_lock=0  ");	
				}else{
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_lock=1  where   play_number='$q_num' and  lot_type='$type_lot'   and r_id='$rid5'  and s_lock=0  ");	
					}
		    $my_r5=0;
			
			
			}elseif($sumck5<$x_sum  and $rid5>0   and $rmyshare[5][1]>0){
			# $txt_q="$lang_member[445]: ".number_format($sumck5);
			# $_SESSION['error'][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = <b>$lang_member[414]</b> $txt_q</span>";	
			 $my_r5=0;
			}elseif($rid5>0  and $rmyshare[5][1]==0){
			###############ไม่หุ้น
			 $my_r5=0;
			}else{
				
				if($rid5>0){
					if($last_rid==$rid5){
				$sumlimit5=$x_sum*( $mshare[1] /100);	
					}else{
				$sumlimit5=$x_sum*( $rmyshare[5][1] /100);
					}
				
					
				if($type_lot==3 or $type_lot==20  or $type_lot==24){			
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_sum=s_sum - $sumlimit5  where   play_number='$q_num3' and  lot_type='$type_lot'  and r_id='$rid5'  ");	
				}else{
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_sum=s_sum - $sumlimit5  where   play_number='$q_num' and  lot_type='$type_lot'  and r_id='$rid5'  ");	
					}
				}
		$open_5=1;
          }#	if($re5['s_lock']==1 and $rid5>0){
			######################################Agent L5		
			
			
	
			
$open_6=0;
			######################################Agent L6
		if($re6['s_lock']==1 and $rid6>0   and $rmyshare[6][1]>0){
			# $_SESSION['error'][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = <b>! $lang_member[414]</b>.</span>";
			 $my_r6=0;
			}elseif($sumck6<10  and $rid6>0   and $rmyshare[6][1]>0 ){
			# $_SESSION['error'][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = <b>$lang_member[414]</b>.</span>";
			 ################# Lock 1
				if($type_lot==3 or $type_lot==20  or $type_lot==24){			
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_lock=1  where   play_number='$q_num3' and  lot_type='$type_lot'  and r_id='$rid6'  and s_lock=0   ");	
				}else{
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_lock=1  where   play_number='$q_num' and  lot_type='$type_lot'   and r_id='$rid6'   and s_lock=0 ");	
					}
		 $my_r6=0;
			
			
			}elseif($sumck6<$x_sum  and $rid6>0   and $rmyshare[6][1]>0){
			# $txt_q="$lang_member[445]: ".number_format($sumck6);
			# $_SESSION['error'][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = <b>$lang_member[414]</b> $txt_q</span>";	
			 $my_r6=0;
			}elseif($rid6>0  and $rmyshare[6][1]==0){
			###############ไม่หุ้น
			 $my_r6=0;
			}else{
				
				if($rid6>0){
					if($last_rid==$rid6){
				$sumlimit6=$x_sum*( $mshare[1] /100);	
					}else{
				$sumlimit6=$x_sum*( $rmyshare[6][1] /100);
					}
				
					
				if($type_lot==3 or $type_lot==20  or $type_lot==24){			
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_sum=s_sum - $sumlimit6  where   play_number='$q_num3' and  lot_type='$type_lot'  and r_id='$rid6'  ");	
				}else{
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_sum=s_sum - $sumlimit6  where   play_number='$q_num' and  lot_type='$type_lot'  and r_id='$rid6'  ");	
					}
				}
			$open_6=1;
          }#	if($re6['s_lock']==1 and $rid6>0){
			######################################Agent L6	
			
			
			
$open_7=0;
			######################################Agent L7
		 if($re7['s_lock']==1 and $rid7>0   and $rmyshare[7][1]>0){
			# $_SESSION['error'][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = <b>! $lang_member[414]</b>.</span>";
			 $my_r7=0;
			}elseif($sumck7<10  and $rid7>0    and $rmyshare[7][1]>0){
			# $_SESSION['error'][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = <b>$lang_member[414]</b>.</span>";
			 ################# Lock 1
				if($type_lot==3 or $type_lot==20  or $type_lot==24){			
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_lock=1  where   play_number='$q_num3' and  lot_type='$type_lot'  and r_id='$rid7'   and s_lock=0  ");	
				}else{
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_lock=1  where   play_number='$q_num' and  lot_type='$type_lot'   and r_id='$rid7'  and s_lock=0  ");	
					}
		 $my_r7=0;

			}elseif($sumck7<$x_sum  and $rid7>0    and $rmyshare[7][1]>0){
		   #	 $txt_q="$lang_member[445]: ".number_format($sumck7);
			# $_SESSION['error'][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = <b>$lang_member[414]</b> $txt_q</span>";	
			 $my_r7=0;
			}elseif($rid7>0  and $rmyshare[7][1]==0){
			###############ไม่หุ้น
			 $my_r7=0;
			}else{
				
				if($rid7>0){
				if($last_rid==$rid7){
				$sumlimit7=$x_sum*( $mshare[1] /100);	
					}else{
				$sumlimit7=$x_sum*( $rmyshare[7][1] /100);
					}
					
				if($type_lot==3 or $type_lot==20  or $type_lot==24){			
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_sum=s_sum - $sumlimit7  where   play_number='$q_num3' and  lot_type='$type_lot'  and r_id='$rid7'  ");	
				}else{
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_sum=s_sum - $sumlimit7  where   play_number='$q_num' and  lot_type='$type_lot'  and r_id='$rid7'  ");	
					}
				}
		$open_7=1;	
          }#	if($re7['s_lock']==1 and $rid7>0){
			######################################Agent L7		
			
			
$open_8=0;
			######################################Agent L8
			if($re8['s_lock']==1 and $rid8>0    and $rmyshare[8][1]>0){
			# $_SESSION['error'][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = <b>! $lang_member[414]</b>.</span>";
			 $my_m=0;
			}elseif($sumck8<10  and $rid8>0   and $rmyshare[8][1]>0){
			# $_SESSION['error'][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = <b>$lang_member[414]</b>.</span>";
			 ################# Lock 1
				if($type_lot==3 or $type_lot==20  or $type_lot==24){			
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_lock=1  where   play_number='$q_num3' and  lot_type='$type_lot'  and r_id='$rid8' and s_lock=0 ");	
				}else{
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_lock=1  where   play_number='$q_num' and  lot_type='$type_lot'   and r_id='$rid8'  and s_lock=0  ");	
					}
			 $my_m=0;
			}elseif($sumck8<$x_sum  and $rid8>0  and $rmyshare[8][1]>0){
			# $txt_q="$lang_member[445]: ".number_format($sumck8);
			# $_SESSION['error'][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = <b>$lang_member[414]</b> $txt_q</span>";	
			 $my_m=0;
			}elseif($rid8>0  and $rmyshare[8][1]==0){
			###############ไม่หุ้น
			 $my_m=0;
			}else{
				
				if($rid8>0){
				$sumlimit8=$x_sum*( $mshare[1] /100);
					
				if($type_lot==3 or $type_lot==20  or $type_lot==24){			
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_sum=s_sum - $sumlimit8  where   play_number='$q_num3' and  lot_type='$type_lot'  and r_id='$rid8'  ");	
				}else{
				sql_query_lot("update IGNORE bom_tb_1_ag set  s_sum=s_sum - $sumlimit8  where   play_number='$q_num' and  lot_type='$type_lot'  and r_id='$rid8'  ");	
					}
				}
		$open_8=1;
          }#	if($re8['s_lock']==1 and $rid8>0){
			######################################Agent L8
			
			
$open_0=0;
			######################################SA
		 if($re0['s_lock']==1){
			 $_SESSION['error'][1][]=$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = ! $lang_member[414].";
			 $_SESSION[error][2][] = 2;	
			$open_0=0;
			}elseif($sumck0<10 ){
			 $_SESSION['error'][1][]=$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = $lang_member[414].";
			 $_SESSION[error][2][] = 2;	
			 ################# Lock 1
				if($type_lot==3 or $type_lot==20  or $type_lot==24){			
				sql_query_lot("update IGNORE bom_tb_1_sa set  s_lock=1  where   play_number='$q_num3' and  lot_type='$type_lot'  and s_lock=0  ");	
				}else{
				sql_query_lot("update IGNORE bom_tb_1_sa set  s_lock=1  where   play_number='$q_num' and  lot_type='$type_lot'  and s_lock=0  ");	
					}
			$open_0=0;
			}elseif($sumck0<$x_sum){
			 $txt_q="$lang_member[445]: ".number_format($sumck0);
			 $_SESSION['error'][1][]=$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = $lang_member[414] $txt_q";	
			 $_SESSION[error][2][] = 2;	
			$open_0=0;
			}else{
				
				$sumlimit0=$x_sum*( (100- ($my_m + $my_r1 + $my_r2 + $my_r3 + $my_r4 + $my_r5 + $my_r6 + $my_r7 )) /100);
				#$sumlimit0=$x_sum*( (100- ($mshare[1]+$rmyshare[1][1]+$rmyshare[2][1]+$rmyshare[3][1]+$rmyshare[4][1]+$rmyshare[5][1]+$rmyshare[6][1]+$rmyshare[7][1])) /100);
					
				if($type_lot==3 or $type_lot==20  or $type_lot==24){			
				sql_query_lot("update IGNORE bom_tb_1_sa set  s_sum=s_sum - $sumlimit0  where   play_number='$q_num3' and  lot_type='$type_lot' ");	
				}else{
				sql_query_lot("update IGNORE bom_tb_1_sa set  s_sum=s_sum - $sumlimit0  where   play_number='$q_num' and  lot_type='$type_lot' ");	
					}
			$open_0=1;
			}#if($re0['s_lock']==1){
			######################################SA	            
						

?>