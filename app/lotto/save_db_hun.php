<?

if($mpay[$type_lot]>0.00 ){

if($x_sum>0){
	
			if($_SESSION['xcount']<$x_sum){
				$_SESSION[error][1][] = "$lang_member[633] : $re_m[m_count]";
				$_SESSION[error][2][] = 99;
			}else{
				
				
				if($x_sum>=$emin[1]  ){	 ###### ตรวจเงินต่ำสุด
						if($x_sum<=$emax[1] ){	 ###### ตรวจเงินสูงสุด
						
						
$rid1=$_SESSION['arid'][0];
$rid2=$_SESSION['arid'][1];
$rid3=$_SESSION['arid'][2];
$rid4=$_SESSION['arid'][3];
$rid5=$_SESSION['arid'][4];
$rid6=$_SESSION['arid'][5];
$rid7=$_SESSION['arid'][6];
$rid8=$_SESSION['arid'][7];			


if($type_lot==31){

############ Share
								$mshare[1]=$mshare_set[1];
								$rmyshare[1][1]=$rmyshare_set[1][1];
								$rmyshare[2][1]=$rmyshare_set[2][1];
								$rmyshare[3][1]=$rmyshare_set[3][1];
								$rmyshare[4][1]=$rmyshare_set[4][1];
								$rmyshare[5][1]=$rmyshare_set[5][1];
								$rmyshare[6][1]=$rmyshare_set[6][1];
								$rmyshare[7][1]=$rmyshare_set[7][1];			
}


	
	
#######################Share
$my_m=$mshare[1];
$my_r1=$rmyshare[1][1];
$my_r2=$rmyshare[2][1];
$my_r3=$rmyshare[3][1];
$my_r4=$rmyshare[4][1];
$my_r5=$rmyshare[5][1];
$my_r6=$rmyshare[6][1];
$my_r7=$rmyshare[7][1];
	
						
if($type_lot==3  or $type_lot==26){			
include("in_a_hun.php");
	}else{		
include("in_b_hun.php");		
	}	
						
include("in_c_hun.php");			


if($open_0==0){		

			include("inc_re_8_hun.php");	
			include("inc_re_7_hun.php");	
			include("inc_re_6_hun.php");	
			include("inc_re_5_hun.php");	
			include("inc_re_4_hun.php");	
			include("inc_re_3_hun.php");	
			include("inc_re_2_hun.php");	
			include("inc_re_1_hun.php");	
}					
						
//echo $open_0."###".$open_1."###".$open_2."###".$open_3."###".$open_4."###".$open_5."###".$open_6."###".$open_7."###".$open_8;

if($open_0==1 ){		


								$adis=_dislot( $x_sum , $mdis[$type_lot] , $_SESSION['mid'] );
								$ar1dis=_dislot( $x_sum , $rdis[0][$type_lot] , $rag[0]);
								$ar2dis=_dislot( $x_sum , $rdis[1][$type_lot]  , $rag[1]);
								$ar3dis=_dislot( $x_sum , $rdis[2][$type_lot]  , $rag[2]);
								$ar4dis=_dislot( $x_sum , $rdis[3][$type_lot]  , $rag[3]);
								$ar5dis=_dislot( $x_sum , $rdis[4][$type_lot] , $rag[4] );
								$ar6dis=_dislot( $x_sum , $rdis[5][$type_lot]  , $rag[5]);
								$ar7dis=_dislot( $x_sum , $rdis[6][$type_lot] , $rag[6] );
								$ar8dis=_dislot( $x_sum , $rdis[7][$type_lot] , $rag[7] );


						
						$b_dis_arr="$mdis[$type_lot],".$rdis[0][$type_lot].','.$rdis[1][$type_lot].','.$rdis[2][$type_lot].','.$rdis[3][$type_lot].','.$rdis[4][$type_lot].','.$rdis[5][$type_lot].','.$rdis[6][$type_lot].','.$rdis[7][$type_lot];		
								#,play_dis	,play_br_dis_1	,play_br_dis_2	,play_br_dis_3,	play_br_dis_4,	play_br_dis_5,	play_br_dis_6,	play_br_dis_7,	play_br_dis_8
								# ,'$mdis[$type_lot]' ,'".$rdis[0][$type_lot]."'  ,'".$rdis[1][$type_lot]."' ,'".$rdis[2][$type_lot]."' ,'".$rdis[3][$type_lot]."' ,'".$rdis[4][$type_lot]."' ,'".$rdis[5][$type_lot]."' ,'".$rdis[6][$type_lot]."' ,'".$rdis[7][$type_lot]."'
/*								
############ Lotto SET
$rmyshare_set[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_hun_set_myshare']); 
$rpay_set[]=$_SESSION['ardata'][$rid]['r_lotto_hun_set_pay']; 
$rprice_set[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_hun_set_price']); 
$mshare_set=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_hun_set_share']); 

############ Lotto SET
$setprice=@explode(',',$_SESSION['m1']['m_lotto_hun_set_price']); 
$setpay=$_SESSION['m1']['m_lotto_hun_set_pay']; 	
*/	
############ Lotto SET
$play_set_pay;

if($type_lot==31){


	
                               $b_dis_arr="0,0,0,0,0,0,0,0,0";		

############## Price
								$adis=$setprice[1];
								$ar1dis=$rprice_set[0][1];
								$ar2dis=$rprice_set[1][1];
								$ar3dis=$rprice_set[2][1];
								$ar4dis=$rprice_set[3][1];
								$ar5dis=$rprice_set[4][1];
								$ar6dis=$rprice_set[5][1];
								$ar7dis=$rprice_set[6][1];
								$ar8dis=$rprice_set[7][1];
								
############### Pay
$mpay[$type_lot]=0;
$rpay[0][$type_lot]=0;
$rpay[1][$type_lot]=0;
$rpay[2][$type_lot]=0;
$rpay[3][$type_lot]=0;
$rpay[4][$type_lot]=0;
$rpay[5][$type_lot]=0;
$rpay[6][$type_lot]=0;
$rpay[7][$type_lot]=0;
$js_set=array("m"=>$setpay , "r1"=>$rpay_set[0], "r2"=>$rpay_set[1], "r3"=>$rpay_set[2], "r4"=>$rpay_set[3], "r5"=>$rpay_set[4], "r6"=>$rpay_set[5], "r7"=>$rpay_set[6], "r8"=>$rpay_set[7]);
$txt_set=json_encode($js_set);
$play_set_pay=$txt_set;

#$lot_type[$_SESSION['lang']][$zone][$type_lot]="เลขชุด";
	}		
	
	
					
 #########################AF
if($re_m['bonus_m_id']>0){
	   $comaf=$af_lothun;
	}else{
		$comaf=0;
	}								
								
###########################SAVE####################################
	       $sql="INSERT IGNORE INTO bom_tb_lotto_bill_play_live ( play_timestam,	play_datenow,	play_number,	ok_id 
					   , lot_zone	,lot_rob,	lot_type ,b_total	,	bill_id,	m_id	,b_date
							,	r_agent_id , bonus_m_id
							,b_share_m	  ,b_myshare_1 ,b_myshare_2 ,b_myshare_3 ,b_myshare_4 ,b_myshare_5 ,b_myshare_6 ,b_myshare_7 
							,	play_pay,play_br_pay_1	,play_br_pay_2,	play_br_pay_3	,play_br_pay_4,play_br_pay_5,play_br_pay_6,play_br_pay_7,play_br_pay_8
							,play_set_pay
							,	b_pay,br_pay_1,	br_pay_2,	br_pay_3,	br_pay_4,	br_pay_5,	br_pay_6,	br_pay_7,	br_pay_8
							,b_web_from,b_name,b_no, b_dis_arr, r_id, com_af, b_setbet
							 ) 
	                    values ('$time_stam',now(),'$q_num','$re_ok[ok_id]'
						,'$zone','$rob' ,'$type_lot'  ,'$x_sum' ,'$reeb[bill_id]' ,'".$_SESSION['mid']."','$view_date' 
							,'$re_m[m_agent_id]' ,'$re_m[bonus_m_id]'
						,'$my_m' ,'".$my_r1."' 	,'".$my_r2."' 	,'".$my_r3."' 	,'".$my_r4."' 	,'".$my_r5."' 	,'".$my_r6."' 	,'".$my_r7."' 
							  ,'$mpay[$type_lot]','".$rpay[0][$type_lot]."' ,'".$rpay[1][$type_lot]."' ,'".$rpay[2][$type_lot]."' ,'".$rpay[3][$type_lot]."' ,'".$rpay[4][$type_lot]."' ,'".$rpay[5][$type_lot]."' ,'".$rpay[6][$type_lot]."' ,'".$rpay[7][$type_lot]."'
							  , '$play_set_pay'
							 , '$adis'  ,'$ar1dis'  ,'$ar2dis'  ,'$ar3dis'  ,'$ar4dis' ,'$ar5dis' ,'$ar6dis' ,'$ar7dis' ,'$ar8dis'
							  ,'$b_web_from', '$bill_cus_name', '$bill_no' ,'$b_dis_arr', '".$_SESSION['cr_id']."' ,'$comaf','$setbet'
								);";
								sql_query($sql);	


								if($_POST[zone]==3 and $type_lot==31 and $ttlot==5){
									$_SESSION[error][1][]  = $lot_type[$lang_post][$_POST[zone]][$type_lot] . " [ $q_num ] =" . number_format(1) . " " . $lang_member[629];
                                    //$_SESSION[count_sum]   = $_SESSION[count_sum] + 1;
                                    $_SESSION[count_sum3t] = $_SESSION[count_sum3t] + 1;
								}else{
									$_SESSION[error][1][]  = $lot_type[$lang_post][$_POST[zone]][$type_lot] . " [ $q_num ] =" . number_format($x_sum) . " " . $lang_member[629];
                                    //$_SESSION[count_sum]   = $_SESSION[count_sum] + $x_sum;
                                    $_SESSION[count_sum3t] = $_SESSION[count_sum3t] + $x_sum;
								}



								$_SESSION[error][2][] = 1;
								//$_SESSION[error][1][]=$lot_type[$lang_post][$_POST[zone]][$type_lot]." [ $q_num ] =".number_format($x_sum)." ".$lang_member[629];


								//$_SESSION[count_sum3t]=$_SESSION[count_sum3t]+$x_sum;	
	
$count_num[]=1;						
$_SESSION['count_sum']=$_SESSION['count_sum']+$x_sum;
$_SESSION['count_dis']=$_SESSION['count_dis']+$adis;

$_SESSION['count_dis1']=$_SESSION['count_dis1']+$ar1dis;
$_SESSION['count_dis2']=$_SESSION['count_dis2']+$ar2dis;
$_SESSION['count_dis3']=$_SESSION['count_dis3']+$ar3dis;
$_SESSION['count_dis4']=$_SESSION['count_dis4']+$ar4dis;
$_SESSION['count_dis5']=$_SESSION['count_dis5']+$ar5dis;
$_SESSION['count_dis6']=$_SESSION['count_dis6']+$ar6dis;
$_SESSION['count_dis7']=$_SESSION['count_dis7']+$ar7dis;
$_SESSION['count_dis8']=$_SESSION['count_dis8']+$ar8dis;

$_SESSION['xcount']=$_SESSION['xcount']-$x_sum;

							
								

}#if($open_0==1 and $open_1==1 and $open_2==1 and $open_3==1 and $open_4==1 and $open_5==1 and $open_6==1 and $open_7==1 and $open_8==1){			
								
						}else{#	if($x_sum<=$emax[1] ){	 ###### ตรวจเงินสูงสุด
							$_SESSION[error][1][] = $lot_type[$lang_post][$_POST[zone]][$type_lot] . " [ " . _dt($q_num) . " ] = $lang_member[632] " . number_format($emax[1]);
							$_SESSION[error][2][] = 22;	
						}
						
					}else{#	if($x_sum>=$emin[1]  ){	 ###### ตรวจเงินต่ำสุด
						$_SESSION[error][1][] = $lot_type[$lang_post][$_POST[zone]][$type_lot] . " [ " . _dt($q_num) . " ] = $lang_member[631] " . number_format($emin[1]);
						$_SESSION[error][2][] = 11;
					}	
				
				
						
			}#if($_SESSION['xcount']<$x_sum){							
#######################################################LOG

}#if($x_sum>0){		
}#	if($mpay[$type_lot]>0.00 ){
?>