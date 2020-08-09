<?
$hshare=@explode(',',$lot_m['m_lotto_hun_myshare_agent']); 
$r2myshare=@explode(',',$lot_m['m_lotto_hun_myshare_super']); 
$r3myshare=@explode(',',$lot_m['m_lotto_hun_myshare_senior']); 
$r4myshare=@explode(',',$lot_m['m_lotto_hun_myshare_master']); 

$r2myshare_be[$type_lot]=$r2myshare[$type_lot];
$r3myshare_be[$type_lot]=$r3myshare[$type_lot];
$r4myshare_be[$type_lot]=$r4myshare[$type_lot];
$hshare_be[$type_lot]=$hshare[$type_lot];


$ms=_myshare( $r1force[$type_lot], $r2force[$type_lot] , $r3force[$type_lot] , $r4force[$type_lot]  ,$r2myshare[$type_lot] ,$r3myshare[$type_lot] ,$r4myshare[$type_lot] ,$hshare[$type_lot] );
$r2myshare[$type_lot]=$ms[my1];
$r3myshare[$type_lot]=$ms[my2];
$r4myshare[$type_lot]=$ms[my3];
$hshare[$type_lot]=$ms[my4];

if($hpay[$type_lot]>0.00){
	
if ($x_sum > 0) {
    if ($_SESSION[xcount] < $x_sum) {
        $_SESSION[error][1][] = "$lang_b[6] : $re_m[m_count]";
    } else {
        $cmax = $hmax[$type_lot];
        $cmin = $hmin[$type_lot];
        if ($x_sum >= $cmin) { ###### ตรวจเงินต่ำสุด
            if ($x_sum <= $cmax) { ###### ตรวจเงินสูงสุด

				
			$url_file_0="../json/lotto_hun/".$_POST[zone]."/lock/".$type_lot."_".$q_num."_.json";
			$sumck0=jrlot($url_file_0);
			$url_file_1="../json/lotto_hun/".$_POST[zone]."/lock/".$type_lot."_".$q_num."_".$_SESSION['crid1'].".json";
			$sumck1=jrlot($url_file_1);
			$url_file_2="../json/lotto_hun/".$_POST[zone]."/lock/".$type_lot."_".$q_num."_".$_SESSION['crid2'].".json";
			$sumck2=jrlot($url_file_2);
			$url_file_3="../json/lotto_hun/".$_POST[zone]."/lock/".$type_lot."_".$q_num."_".$_SESSION['crid3'].".json";
			$sumck3=jrlot($url_file_3);
			$url_file_4="../json/lotto_hun/".$_POST[zone]."/lock/".$type_lot."_".$q_num."_".$_SESSION['crid4'].".json";
			$sumck4=jrlot($url_file_4);
				
			
###########################ยังไม่มี
if(!file_exists($url_file_4)){
			jwlot($url_file_4,($r4over[$type_lot]));		
			$sumck4=($r4over[$type_lot]);
				}	
if(!file_exists($url_file_3)){
			jwlot($url_file_3,($r3over[$type_lot]));		
			$sumck3=($r3over[$type_lot]);
				}
if(!file_exists($url_file_2)){
			jwlot($url_file_2,($r2over[$type_lot]));		
			$sumck2=($r2over[$type_lot]);
				}
if(!file_exists($url_file_1)){
			jwlot($url_file_1,($r1over[$type_lot]));		
			$sumck1=($r1over[$type_lot]);
				}		
if(!file_exists($url_file_0)){
			jwlot($url_file_0,($hover[$type_lot]));		
			$sumck0=($hover[$type_lot]);
				}
###########################ยังไม่มี


##########################################Agent
if($sumck4<=0 and $sumck4!=""){

$hshare[$type_lot]=0;

$sql="delete from bom_tb_lotto_hun_lock_rid where  h_num='$q_num' and lot_type='$type_lot' and h_sum>0 and r_id='".$_SESSION['crid4']."' ";
$re_limit4=sql_query($sql);
if($re_limit4){
$sql="INSERT IGNORE INTO bom_tb_lotto_hun_lock_rid (h_num,	lot_type,h_datetime,r_id  ) values('$q_num','$type_lot', now(),'".$_SESSION['crid4']."')";
sql_query($sql);
}

}elseif($sumck4<$x_sum  and $sumck4!=""){

$hshare[$type_lot]=($sumck4/$x_sum)*100;	
$ms_4=($sumck4/$x_sum)*100;
if($ms_4<=$hshare[$type_lot] and $hshare_be[$type_lot]>0){
	$hshare[$type_lot]=$ms_4;
}elseif($hshare_be[$type_lot]==0){
	$hshare[$type_lot]=0;
	}
 
	}
		
##########################################Master
if($sumck3<=0 and $sumck3!=""){

$r4myshare[$type_lot]=0;

$sql="delete from bom_tb_lotto_hun_lock_rid where  h_num='$q_num' and lot_type='$type_lot' and h_sum>0 and r_id='".$_SESSION['crid3']."' ";
$re_limit3=sql_query($sql);
if($re_limit3){
$sql="INSERT IGNORE INTO bom_tb_lotto_hun_lock_rid (h_num,	lot_type,h_datetime,r_id  ) values('$q_num','$type_lot', now(),'".$_SESSION['crid3']."')";
sql_query($sql);
}

}elseif($sumck3<$x_sum  and $sumck3!=""){

$r4myshare[$type_lot]=($sumck3/$x_sum)*100;
$ms_3=($sumck3/$x_sum)*100;
if($ms_3<=$r4myshare[$type_lot] and $r4myshare_be[$type_lot]>0){
	$r4myshare[$type_lot]=$ms_3;
}elseif($r4myshare_be[$type_lot]==0){
	$r4myshare[$type_lot]=0;
	}

 
	}
		
##########################################Senior
if($sumck2<=0 and $sumck2!=""){

$r3myshare[$type_lot]=0;

$sql="delete from bom_tb_lotto_hun_lock_rid where  h_num='$q_num' and lot_type='$type_lot' and h_sum>0 and r_id='".$_SESSION['crid2']."' ";
$re_limit2=sql_query($sql);
if($re_limit2){
$sql="INSERT IGNORE INTO bom_tb_lotto_hun_lock_rid (h_num,	lot_type,h_datetime,r_id  ) values('$q_num','$type_lot', now(),'".$_SESSION['crid2']."')";
sql_query($sql);
}

}elseif($sumck2<$x_sum  and $sumck2!=""){

$r3myshare[$type_lot]=($sumck2/$x_sum)*100;
$ms_2=($sumck2/$x_sum)*100;
if($ms_2<=$r3myshare[$type_lot]  and $r3myshare_be[$type_lot]>0){
	$r3myshare[$type_lot]=$ms_2;
}elseif($r3myshare_be[$type_lot]==0){
	$r3myshare[$type_lot]=0;
	}
 
	}
		
##########################################Super
if($sumck1<=0 and $sumck1!=""){

 $r2myshare[$type_lot]=0;
 
    $sql="delete from bom_tb_lotto_hun_lock_rid where  h_num='$q_num' and lot_type='$type_lot' and h_sum>0 and r_id='".$_SESSION['crid1']."' ";
$re_limit1=sql_query($sql);
if($re_limit1){
$sql="INSERT IGNORE INTO bom_tb_lotto_hun_lock_rid (h_num,	lot_type,h_datetime,r_id  ) values('$q_num','$type_lot', now(),'".$_SESSION['crid1']."')";
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

	}
	
	
			
				
                if ($sumck0 <= 0 and $sumck0 != "") {
                    $_SESSION[error][1][] = $lot_type["th"][$type_lot] . " [ " . _dt($q_num) . " ] = $lang_lot[40]";
 $sql="delete from bom_tb_lotto_hun_lock_1 where  h_num='$q_num' and lot_type='$type_lot' and h_sum>0 ";
sql_query($sql);
                    $sql                  = "INSERT IGNORE INTO bom_tb_lotto_hun_lock_1 (h_num,	lot_type,h_datetime  ) values('$q_num','$type_lot', now())";
                    sql_query($sql);
                } elseif ($sumck0 < $x_sum and $sumck0 != "") {
                    $txt_q                = "$lang_lot[41]: " . number_format($sumck0);
                    $_SESSION[error][1][] = $lot_type["th"][$type_lot] . " [ " . _dt($q_num) . " ] = $lang_lot[40] $txt_q";
                } else {
                
						
						
						
									
			########################จำกัดต่อ 1 เลข
			$url_file_5a="../json/lotto_hun/".$_POST[zone]."/number/m_".$type_lot."_".$q_num."_".$_SESSION['m_id'].".json";
			$sumck5a=jrlot($url_file_5a);
			########################จำกัดต่อ 1 เลข
			
###########################ยังไม่มี
			if(!file_exists($url_file_5a)){
			jwlot($url_file_5a,($hnummax[$type_lot]));	
			$sumck5a=($hnummax[$type_lot]);
			}
###########################ยังไม่มี
		
##########################################Member		
if($sumck5a<=0 and $sumck5a!=""){
 $_SESSION[error][1][] = $lot_type["th"][$type_lot] . " [ " . _dt($q_num) . " ] = $lang_lot[54] $x_level[5]";
	}else{
				
			
									
									
                                    $adis   = _dislot($x_sum, $hdis[$type_lot], $type_lot);
                                    $ar1dis = _dislot($x_sum, $r1dis[$type_lot], $type_lot);
                                    $ar2dis = _dislot($x_sum, $r2dis[$type_lot], $type_lot);
                                    $ar3dis = _dislot($x_sum, $r3dis[$type_lot], $type_lot);
                                    $ar4dis = _dislot($x_sum, $r4dis[$type_lot], $type_lot);
	
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
	

			

##################JSON Write
	
/*
$ex_i = explode("," , $_POST[set]);
$lot_i_count = count($ex_i);
$lotset = $_POST[set].",";
*/

$lotset=_cut_iset($_POST[rob], rtrim($_POST[set],','));
$lotsety =rtrim($lotset ,',');
$ex_i= explode( "," , $lotsety);
$lot_i_count = count($ex_i);

if($lotset!=""){
                                    ###########################SAVE####################################
                                    $sql    = "INSERT IGNORE INTO bom_tb_lotto_hun_bill_play ( play_timestam,	play_datenow,	play_number,	ok_id , lot_zone	,lot_rob,lot_i,lot_i_count,	lot_type,	play_pay,play_dis ,b_total,	b_pay	,	bill_id,	m_id	,b_date
							,	r_agent_id,b_share_m , b_share_force_1  , b_share_force_2  , b_share_force_3  , b_share_force_4
							 ,b_myshare_1 ,b_myshare_2 ,b_myshare_3
							,play_br_pay_1	,play_br_pay_2,	play_br_pay_3	,play_br_pay_4
							,play_br_dis_1	,play_br_dis_2	,play_br_dis_3,	play_br_dis_4
							,br_pay_1,	br_pay_2,	br_pay_3,	br_pay_4
							,b_bet_from
							 ) 
								values ('$time_stam',now(),'$q_num','$re_ok[ok_id]','$_POST[zone]','$_POST[rob]','$lotset','$lot_i_count' ,'$type_lot' ,'$hpay[$type_lot]','$hdis[$type_lot]' ,'$x_sum', '$adis'  ,'$reeb[bill_id]' ,'$_SESSION[mid]','$view_date' 
								,'$_SESSION[r_agent_id]' ,'$hshare[$type_lot]'  ,'$r1force[$type_lot]' ,'$r2force[$type_lot]' ,'$r3force[$type_lot]' ,'$r4force[$type_lot]' 
								,'$r2myshare[$type_lot]' 	,'$r3myshare[$type_lot]' 	,'$r4myshare[$type_lot]' 
							 ,'$r1pay[$type_lot]' ,'$r2pay[$type_lot]' ,'$r3pay[$type_lot]' ,'$r4pay[$type_lot]' 
							  ,'$r1dis[$type_lot]' ,'$r2dis[$type_lot]' ,'$r3dis[$type_lot]' ,'$r4dis[$type_lot]' 
							  ,'$ar1dis'  ,'$ar2dis'  ,'$ar3dis'  ,'$ar4dis'
							  ,'a'
								)";
                                    sql_query($sql);
									
									
									
#######################################################LOG
	 $sql="select play_id , lot_i_count from  bom_tb_lotto_hun_bill_play  where m_id='$_SESSION[mid]' and  play_number='$q_num' and  ok_id='$re_ok[ok_id]' and  lot_type='$type_lot' and b_total='$x_sum' order by  play_id desc limit 1  ";
	 $rex=sql_array($sql);
	 $tosum=-$x_sum*$rex["lot_i_count"];
	 $tosum2=($x_sum*$rex["lot_i_count"])-$adis;
     $log_sum=$_SESSION[xcount]-$adis;
	 $sql="INSERT IGNORE INTO bom_tb_databet (d_date,	play_id,	m_id	,d_count, d_out,	d_in	,d_sum	,d_by ) values(now(),'$rex[play_id]','$_SESSION[mid]','$_SESSION[xcount]','$tosum','$tosum2' ,'$log_sum',3)";
     sql_query($sql);
	#######################################################LOG	
									
									
									
								   $arr_in_socket[] = '(lot_type="'.$type_lot.'" and play_number="'.$q_num.'")';
								   $_SESSION[error][1][]=$lot_type["th"][$type_lot]." [ $q_num ] =".number_format($x_sum)." ".$lang_m[21];
                                    $_SESSION[count_sum]  = $_SESSION[count_sum] + ($x_sum*$lot_i_count );
                                    $_SESSION[count_dis]  = $_SESSION[count_dis] + ($adis*$lot_i_count );
                                    $_SESSION[count_dis1] = $_SESSION[count_dis1] + ($ar1dis*$lot_i_count );
                                    $_SESSION[count_dis2] = $_SESSION[count_dis2] + ($ar2dis*$lot_i_count );
                                    $_SESSION[count_dis3] = $_SESSION[count_dis3] + ($ar3dis*$lot_i_count );
                                    $_SESSION[count_dis4] = $_SESSION[count_dis4] + ($ar4dis*$lot_i_count );
                                    $_SESSION[xcount]     = $_SESSION[xcount] - ($x_sum*$lot_i_count );
                                    $count_num[]          = 1;
                                    ################################################################
									
									
	}
}#if($sumck5a<=0 and $sumck5a!=""){
  } #if($sumck0<=0 and $sumck0!=""){
	  
	  
            } else {
                $_SESSION[error][1][] = $lot_type["th"][$type_lot] . " [ " . _dt($q_num) . " ] = $lang_b[5] " . number_format($cmax);
            }
        } else {
            $_SESSION[error][1][] = $lot_type["th"][$type_lot] . " [ " . _dt($q_num) . " ] = $lang_b[4] " . number_format($cmin);
        }
    } #	if($_SESSION[xcount]<$x_sum){
} #if($x_sum>0){
}#if($hpay[$type_lot]>0.00){
?>