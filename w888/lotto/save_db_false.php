<?
$hshare=@explode(',',$lot_m['m_lotto_myshare_agent']); 
$r2myshare=@explode(',',$lot_m['m_lotto_myshare_super']); 
$r3myshare=@explode(',',$lot_m['m_lotto_myshare_senior']); 
$r4myshare=@explode(',',$lot_m['m_lotto_myshare_master']); 

$r2myshare_be[$type_lot]=$r2myshare[$type_lot];
$r3myshare_be[$type_lot]=$r3myshare[$type_lot];
$r4myshare_be[$type_lot]=$r4myshare[$type_lot];
$hshare_be[$type_lot]=$hshare[$type_lot];

$over_s4=0;
$over_s3=0;
$over_s2=0;



$ms=_myshare( $r1force[$type_lot], $r2force[$type_lot] , $r3force[$type_lot] , $r4force[$type_lot]  ,$r2myshare[$type_lot] ,$r3myshare[$type_lot] ,$r4myshare[$type_lot] ,$hshare[$type_lot] );
$r2myshare[$type_lot]=$ms[my1];
$r3myshare[$type_lot]=$ms[my2];
$r4myshare[$type_lot]=$ms[my3];
$hshare[$type_lot]=$ms[my4];

if($hpay[$type_lot]>0.00 and $r1pay[$type_lot]>0.00 and $r2pay[$type_lot]>0.00 and $r3pay[$type_lot]>0.00 and $r4pay[$type_lot]>0.00){
if($x_sum>0){
	

	
			if($_SESSION[xcount]<$x_sum){
				$_SESSION[error][1][]="<b class='cr'>$lang_member[633] : $re_m[m_count] </b>";
			}else{
	
	
					$cmax=$hmax[$type_lot];
					$cmin=$hmin[$type_lot];
					if($x_sum>=$cmin  ){	 ###### ตรวจเงินต่ำสุด
						if($x_sum<=$cmax ){	 ###### ตรวจเงินสูงสุด
						
						
		

	
	if($type_lot==3 or $type_lot==20  or $type_lot==24){
		
			$url_file_0="../json/lotto/lock/".$type_lot."_".$q_num3."_.json";
			$sumck0=jrlot($url_file_0);
			$url_file_1="../json/lotto/lock/".$type_lot."_".$q_num3."_".$_SESSION['crid1'].".json";
			$sumck1=jrlot($url_file_1);
			$url_file_2="../json/lotto/lock/".$type_lot."_".$q_num3."_".$_SESSION['crid2'].".json";
			$sumck2=jrlot($url_file_2);
			$url_file_3="../json/lotto/lock/".$type_lot."_".$q_num3."_".$_SESSION['crid3'].".json";
			$sumck3=jrlot($url_file_3);
			$url_file_4="../json/lotto/lock/".$type_lot."_".$q_num3."_".$_SESSION['crid4'].".json";
			$sumck4=jrlot($url_file_4);
			
		
		
	}else{
		
			$url_file_0="../json/lotto/lock/".$type_lot."_".$q_num."_.json";
			$sumck0=jrlot($url_file_0);
			$url_file_1="../json/lotto/lock/".$type_lot."_".$q_num."_".$_SESSION['crid1'].".json";
			$sumck1=jrlot($url_file_1);
			$url_file_2="../json/lotto/lock/".$type_lot."_".$q_num."_".$_SESSION['crid2'].".json";
			$sumck2=jrlot($url_file_2);
			$url_file_3="../json/lotto/lock/".$type_lot."_".$q_num."_".$_SESSION['crid3'].".json";
			$sumck3=jrlot($url_file_3);
			$url_file_4="../json/lotto/lock/".$type_lot."_".$q_num."_".$_SESSION['crid4'].".json";
			$sumck4=jrlot($url_file_4);
					
		
		}
		
		
		
##########################################Agent
if($sumck4<=0 and $sumck4!=""){

$hshare[$type_lot]=0;
$over_s4=$hshare[$type_lot];
$over_s3=0;
$over_s2=0;


$sql="delete from bom_tb_lotto_lock_rid where  h_num='$q_num' and lot_type='$type_lot' and h_sum>0 and r_id='".$_SESSION['crid4']."' ";
$re_limit4=sql_query($sql);
if($re_limit4){
$sql="INSERT IGNORE INTO bom_tb_lotto_lock_rid (h_num,	lot_type,h_datetime,r_id  ) values('$q_num','$type_lot', now(),'".$_SESSION['crid4']."')";
sql_query($sql);
}

}elseif($sumck4<$x_sum  and $sumck4!=""){
	
$ms_4=($sumck4/$x_sum)*100;
if($ms_4<=$hshare[$type_lot] and $hshare_be[$type_lot]>0){
	$hshare[$type_lot]=$ms_4;
$over_s4=$hshare[$type_lot]-$ms_4;
$over_s3=0;
$over_s2=0;


}elseif($hshare_be[$type_lot]==0){
	$hshare[$type_lot]=0;
$over_s4=$hshare[$type_lot];
$over_s3=0;
$over_s2=0;


	}
 
	}
		
##########################################Master




if($sumck3<=0 and $sumck3!=""){

$r4myshare[$type_lot]=0;
$over_s3=$r4myshare[$type_lot];
$over_s2=0;


$sql="delete from bom_tb_lotto_lock_rid where  h_num='$q_num' and lot_type='$type_lot' and h_sum>0 and r_id='".$_SESSION['crid3']."' ";
$re_limit3=sql_query($sql);
if($re_limit3){
$sql="INSERT IGNORE INTO bom_tb_lotto_lock_rid (h_num,	lot_type,h_datetime,r_id  ) values('$q_num','$type_lot', now(),'".$_SESSION['crid3']."')";
sql_query($sql);
}

}elseif($sumck3<$x_sum  and $sumck3!=""){
$ms_3=($sumck3/$x_sum)*100;
if($ms_3<=$r4myshare[$type_lot] and $r4myshare_be[$type_lot]>0){
$r4myshare[$type_lot]=$ms_3;
$over_s3=$r4myshare[$type_lot]-$ms_3;
$over_s2=0;


}elseif($r4myshare_be[$type_lot]==0){
	$r4myshare[$type_lot]=0;
$over_s3=$r4myshare[$type_lot];
$over_s2=0;


	}

 
	}else{
##############เก็บที่เหลือ
#$r4myshare[$type_lot]=$r4myshare[$type_lot]+$over_s4;

		}
		
##########################################Senior



if($sumck2<=0 and $sumck2!=""){

$r3myshare[$type_lot]=0;

$over_s2=$r3myshare[$type_lot];


$sql="delete from bom_tb_lotto_lock_rid where  h_num='$q_num' and lot_type='$type_lot' and h_sum>0 and r_id='".$_SESSION['crid2']."' ";
$re_limit2=sql_query($sql);
if($re_limit2){
$sql="INSERT IGNORE INTO bom_tb_lotto_lock_rid (h_num,	lot_type,h_datetime,r_id  ) values('$q_num','$type_lot', now(),'".$_SESSION['crid2']."')";
sql_query($sql);
}


}elseif($sumck2<$x_sum  and $sumck2!=""){

$ms_2=($sumck2/$x_sum)*100;
if($ms_2<=$r3myshare[$type_lot]  and $r3myshare_be[$type_lot]>0){
	$r3myshare[$type_lot]=$ms_2;
    $over_s2=$r3myshare[$type_lot]-$ms_2;

}elseif($r3myshare_be[$type_lot]==0){
	$r3myshare[$type_lot]=0;
$over_s2=$r3myshare[$type_lot];


	}
 
	}else{
##############เก็บที่เหลือ
#$r3myshare[$type_lot]=$r3myshare[$type_lot]+$over_s3;
		}
		
##########################################Super




if($sumck1<=0 and $sumck1!=""){

 $r2myshare[$type_lot]=0;

 
 $sql="delete from bom_tb_lotto_lock_rid where  h_num='$q_num' and lot_type='$type_lot' and h_sum>0 and r_id='".$_SESSION['crid1']."' ";
$re_limit1=sql_query($sql);
if($re_limit1){
$sql="INSERT IGNORE INTO bom_tb_lotto_lock_rid (h_num,	lot_type,h_datetime,r_id  ) values('$q_num','$type_lot', now(),'".$_SESSION['crid1']."')";
sql_query($sql);
}
 
}elseif($sumck1<$x_sum  and $sumck1!=""){

 $r2myshare[$type_lot]=($sumck1/$x_sum)*100;
 $ms_1=($sumck1/$x_sum)*100;
if($ms_1<=$r2myshare[$type_lot]   and $r2myshare_be[$type_lot]>0){
	$r2myshare[$type_lot]=$ms_1;

}elseif($r2myshare_be[$type_lot]==0){
	$r2myshare[$type_lot]=0;

	}

	}else{
##############เก็บที่เหลือ
#$r2myshare[$type_lot]=$r2myshare[$type_lot]+$over_s2;
		}
		
		
								$adis=_dislot( $x_sum , $hdis[$type_lot] , $type_lot);
								$ar1dis=_dislot( $x_sum , $r1dis[$type_lot] , $type_lot);
								$ar2dis=_dislot( $x_sum , $r2dis[$type_lot] , $type_lot);
								$ar3dis=_dislot( $x_sum , $r3dis[$type_lot] , $type_lot);
								$ar4dis=_dislot( $x_sum , $r4dis[$type_lot] , $type_lot);
								
								
	##################โควต้า
$cc_sum0=($sumck0-$x_sum);	
$cc_sum1=($sumck1-$x_sum);	
$cc_sum2=($sumck2-$x_sum);	
$cc_sum3=($sumck3-$x_sum);	
$cc_sum4=($sumck4-$x_sum);	

if($cc_sum0<=0){$cc_sum0=0;}		
if($cc_sum1<=0){$cc_sum1=0;}				
if($cc_sum2<=0){$cc_sum2=0;}	
if($cc_sum3<=0){$cc_sum3=0;}	
if($cc_sum4<=0){$cc_sum4=0;}	

jwlot($url_file_0,($cc_sum0));	
jwlot($url_file_1,($cc_sum1));	
jwlot($url_file_2,($cc_sum2));	
jwlot($url_file_3,($cc_sum3));	
jwlot($url_file_4,($cc_sum4));	
##################โควต้า
	
	
$cc_sum5a=($sumck5a-$x_sum);	

if($cc_sum5a<=0){$cc_sum5a=0;}									
########################จำกัดต่อ 1 เลข			
jwlot($url_file_5a,($cc_sum5a));	
########################จำกัดต่อ 1 เลข		
	
	
			
$hpay[$type_lot] = $tp_win;
$r1pay[$type_lot] = $tp_win;
$r2pay[$type_lot] = $tp_win;
$r3pay[$type_lot] = $tp_win;
$r4pay[$type_lot] = $tp_win;
							
#############คิดนอกบอม
if($_SESSION['crid2']==38){
$r1force[$type_lot]=0;	
$r2myshare[$type_lot]=0;
	}
#############คิดนอก mc
if($_SESSION['crid2']==297){
	
$r1force[$type_lot]=0;	
$r2force[$type_lot]=0;	
$r3force[$type_lot]=0;	
$r4force[$type_lot]=0;	

$r2myshare[$type_lot]=0;
$r3myshare[$type_lot]=0;
$r4myshare[$type_lot]=0;
$hshare[$type_lot]=0;
	}
	
#############คิดนอก aa
if($_SESSION['crid2']==2){
	
$r1force[$type_lot]=0;	
$r2force[$type_lot]=0;	
$r3force[$type_lot]=0;	
$r4force[$type_lot]=0;	

$r2myshare[$type_lot]=0;
$r3myshare[$type_lot]=0;
$r4myshare[$type_lot]=0;
$hshare[$type_lot]=0;
	}
								
								
###########################SAVE####################################
	                       $sql="INSERT IGNORE INTO bom_tb_lotto_bill_play_live ( play_timestam,	play_datenow,	play_number,	ok_id , lot_zone	,lot_rob,	lot_type,	play_pay,play_dis ,b_total,	b_pay	,	bill_id,	m_id	,b_date
							,	r_agent_id,b_share_m	 , b_share_force_1  , b_share_force_2  , b_share_force_3  , b_share_force_4
							 ,b_myshare_1 ,b_myshare_2 ,b_myshare_3
							,play_br_pay_1	,play_br_pay_2,	play_br_pay_3	,play_br_pay_4
							,play_br_dis_1	,play_br_dis_2	,play_br_dis_3,	play_br_dis_4
							,br_pay_1,	br_pay_2,	br_pay_3,	br_pay_4
							,b_bet_from,b_name,b_no,bonus_m_id
							 ) 
								values ('$time_stam',now(),'$q_num','$re_ok[ok_id]','$_POST[zone]','$_POST[rob]' ,'$type_lot' ,'$hpay[$type_lot]','$hdis[$type_lot]' ,'$x_sum', '$adis'  ,'$reeb[bill_id]' ,'$_SESSION[mid]','$view_date' 
								,'$_SESSION[r_agent_id]' ,'$hshare[$type_lot]'  ,'$r1force[$type_lot]' ,'$r2force[$type_lot]' ,'$r3force[$type_lot]' ,'$r4force[$type_lot]' 
									,'$r2myshare[$type_lot]' 	,'$r3myshare[$type_lot]' 	,'$r4myshare[$type_lot]' 
							 ,'$r1pay[$type_lot]' ,'$r2pay[$type_lot]' ,'$r3pay[$type_lot]' ,'$r4pay[$type_lot]' 
							  ,'$r1dis[$type_lot]' ,'$r2dis[$type_lot]' ,'$r3dis[$type_lot]' ,'$r4dis[$type_lot]' 
							  ,'$ar1dis'  ,'$ar2dis'  ,'$ar3dis'  ,'$ar4dis'
							  ,'w', '$bill_cus_name', '$bill_no','".$re_m[bonus_m_id]."'
								)";
								sql_query($sql);	
								
								
#######################################################LOG
	 $sql="select play_id from  bom_tb_lotto_bill_play_live  where m_id='$_SESSION[mid]' and  play_number='$q_num' and  ok_id='$re_ok[ok_id]' and  lot_type='$type_lot' and b_total='$x_sum' order by  play_id desc limit 1  ";
	 $rex=sql_array($sql);
	 $tosum=-$x_sum;
	 $tosum2=$x_sum-$adis;
     $log_sum=$_SESSION[xcount]-$adis;
	 $sql="INSERT IGNORE INTO bom_tb_databet (d_date,	play_id,	m_id	,d_count, d_out,	d_in	,d_sum	,d_by ) values(now(),'$rex[play_id]','$_SESSION[mid]','$_SESSION[xcount]','$tosum','$tosum2' ,'$log_sum',3)";
     sql_query($sql);
	#######################################################LOG
								
								$arr_in_socket[] = '(lot_type="'.$type_lot.'" and play_number="'.$q_num.'")';
								$_SESSION[error][1][]='<span class="cb">'.$lot_type[$_SESSION['lang']][1][$type_lot]." <b>[ "._dt($q_num)." ]</b> = ".number_format($x_sum)." $lang_member[629] </span>";
								$_SESSION[count_sum]=$_SESSION[count_sum]+$x_sum;
								$_SESSION[count_dis]=$_SESSION[count_dis]+$adis;
								$_SESSION[count_dis1]=$_SESSION[count_dis1]+$ar1dis;
								$_SESSION[count_dis2]=$_SESSION[count_dis2]+$ar2dis;
								$_SESSION[count_dis3]=$_SESSION[count_dis3]+$ar3dis;
								$_SESSION[count_dis4]=$_SESSION[count_dis4]+$ar4dis;
								
								$_SESSION[xcount]=$_SESSION[xcount]-$x_sum;
								$count_num[]=1;
								$last_num=$q_num[$type_lot];
								

								$sql_list_max = sql_query("update bom_tb_lotto_topmax set bill_id_new = '$reeb[bill_id]' , tp_status = 1 where m_id = '$_SESSION[mid]' and tp_id = '$ar'");
								
								
			
						}else{
							$_SESSION[error][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][1][$type_lot]." [ "._dt($q_num)." ] = $lang_member[632] ".number_format($cmax).' </span>';	
						}
					}else{
						$_SESSION[error][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][1][$type_lot]." [ "._dt($q_num)." ] = $lang_member[631] ".number_format($cmin).' </span>';	
					}		
	}#	if($_SESSION[xcount]<$x_sum){
			
}#if($x_sum>0){
}#if($hpay[$type_lot]>0.00){
?>