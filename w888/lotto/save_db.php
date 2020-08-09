<?
##############ซื้อแบบตัว
 if($_SESSION['m1']['m_lotto_convert']==1){
	if($type_lot==4 or $type_lot==5 or $type_lot==18){
$x_sum=round(1000/$mpay[$type_lot],2)*$x_sum;
	}
}
##############ซื้อแบบตัว

if($mpay[$type_lot]>0.00 ){
if($x_sum>0){
	
	
			if($_SESSION['xcount']<$x_sum){
				$_SESSION['error'][1][]="<b class='cr'>$lang_member[633] : $re_m[m_count] </b>";
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

#######################Share
$my_m=$mshare[1];
$my_r1=$rmyshare[1][1];
$my_r2=$rmyshare[2][1];
$my_r3=$rmyshare[3][1];
$my_r4=$rmyshare[4][1];
$my_r5=$rmyshare[5][1];
$my_r6=$rmyshare[6][1];
$my_r7=$rmyshare[7][1];


if($type_lot==3 or $type_lot==20  or $type_lot==24){			
include("in_a.php");
	}else{			
include("in_b.php");		
	}

include("in_c.php");		


if($open_0==0){		

			include("inc_re_8.php");	
			include("inc_re_7.php");	
			include("inc_re_6.php");	
			include("inc_re_5.php");	
			include("inc_re_4.php");	
			include("inc_re_3.php");	
			include("inc_re_2.php");	
			include("inc_re_1.php");	

}

					
//echo $open_0."###".$open_1."###".$open_2."###".$open_3."###".$open_4."###".$open_5."###".$open_6."###".$open_7."###".$open_8;		
#echo $mshare[1].' ,'.$rmyshare[1][1].' ,'.$rmyshare[2][1].' ,'.$rmyshare[3][1].' ,'.$rmyshare[4][1].' ,'.$rmyshare[5][1].' ,'.$rmyshare[6][1].' ,'.$rmyshare[7][1] ;
						
if($open_0==1 ){			
						

								$adis=_dislot( $x_sum , $mdis[$type_lot] , $_SESSION['m_id'] );
								$ar1dis=_dislot( $x_sum , $rdis[0][$type_lot] , $rag[0]);
								$ar2dis=_dislot( $x_sum , $rdis[1][$type_lot]  , $rag[1]);
								$ar3dis=_dislot( $x_sum , $rdis[2][$type_lot]  , $rag[2]);
								$ar4dis=_dislot( $x_sum , $rdis[3][$type_lot]  , $rag[3]);
								$ar5dis=_dislot( $x_sum , $rdis[4][$type_lot] , $rag[4] );
								$ar6dis=_dislot( $x_sum , $rdis[5][$type_lot]  , $rag[5]);
								$ar7dis=_dislot( $x_sum , $rdis[6][$type_lot] , $rag[6] );
								$ar8dis=_dislot( $x_sum , $rdis[7][$type_lot] , $rag[7] );


 #########################AF
if($re_m['bonus_m_id']>0){
	   $comaf=$af_lotto;
	}else{
		$comaf=0;
	}
	

						$b_dis_arr="$mdis[$type_lot],".$rdis[0][$type_lot].','.$rdis[1][$type_lot].','.$rdis[2][$type_lot].','.$rdis[3][$type_lot].','.$rdis[4][$type_lot].','.$rdis[5][$type_lot].','.$rdis[6][$type_lot].','.$rdis[7][$type_lot];		
								#,play_dis	,play_br_dis_1	,play_br_dis_2	,play_br_dis_3,	play_br_dis_4,	play_br_dis_5,	play_br_dis_6,	play_br_dis_7,	play_br_dis_8
								# ,'$mdis[$type_lot]' ,'".$rdis[0][$type_lot]."'  ,'".$rdis[1][$type_lot]."' ,'".$rdis[2][$type_lot]."' ,'".$rdis[3][$type_lot]."' ,'".$rdis[4][$type_lot]."' ,'".$rdis[5][$type_lot]."' ,'".$rdis[6][$type_lot]."' ,'".$rdis[7][$type_lot]."'
								
###########################SAVE####################################
	                     $sql="INSERT IGNORE INTO bom_tb_lotto_bill_play_live ( play_timestam,	play_datenow,	play_number,	ok_id 
					   , lot_zone	,lot_rob,	lot_type,b_total,	b_pay	,	bill_id,	m_id	,b_date
							,	r_agent_id, bonus_m_id
							,b_share_m	  ,b_myshare_1 ,b_myshare_2 ,b_myshare_3 ,b_myshare_4 ,b_myshare_5 ,b_myshare_6 ,b_myshare_7 
							,	play_pay ,play_br_pay_1	,play_br_pay_2,	play_br_pay_3	,play_br_pay_4,play_br_pay_5,play_br_pay_6,play_br_pay_7,play_br_pay_8
							,br_pay_1,	br_pay_2,	br_pay_3,	br_pay_4,	br_pay_5,	br_pay_6,	br_pay_7,	br_pay_8
							,b_web_from,b_name,b_no , b_dis_arr, r_id , com_af, b_setbet
							 ) 
	                    values ('$time_stam',now(),'$q_num','$re_ok[ok_id]','$zone','$rob' ,'$type_lot' ,'$x_sum', '$adis' 
						 ,'$reeb[bill_id]' ,'".$_SESSION['m_id']."','$view_date' 
							,'$_SESSION[r_agent_id]' ,'$re_m[bonus_m_id]'
							,'$my_m' ,'".$my_r1."' 	,'".$my_r2."' 	,'".$my_r3."' 	,'".$my_r4."' 	,'".$my_r5."' 	,'".$my_r6."' 	,'".$my_r7."' 
							  ,'$mpay[$type_lot]' ,'".$rpay[0][$type_lot]."' ,'".$rpay[1][$type_lot]."' ,'".$rpay[2][$type_lot]."' ,'".$rpay[3][$type_lot]."' ,'".$rpay[4][$type_lot]."' ,'".$rpay[5][$type_lot]."' ,'".$rpay[6][$type_lot]."' ,'".$rpay[7][$type_lot]."'
							  ,'$ar1dis'  ,'$ar2dis'  ,'$ar3dis'  ,'$ar4dis' ,'$ar5dis' ,'$ar6dis' ,'$ar7dis' ,'$ar8dis'
							  ,'$b_web_from', '$bill_cus_name', '$bill_no' ,'$b_dis_arr', '".$_SESSION['cr_id']."' ,'$comaf','$setbet'
								);";
								sql_query($sql);	

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


								 if($_SESSION['m1']['m_lotto_convert']==1  and ($type_lot==4 or $type_lot==5)){
								$x_sum9=round(1000/$mpay[$type_lot],2);
								$_SESSION['error'][1][]='<span class="cb">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." <b>[ "._dt($q_num)." ]</b> = ".number_format($x_sum/$x_sum9)." $lang_member[548] : $lang_member[629] </span>";
								$_SESSION['count_sum3t']=$_SESSION['count_sum3t']+(($x_sum/$x_sum9)*12);
									}else{
								$_SESSION['error'][1][]='<span class="cb">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." <b>[ "._dt($q_num)." ]</b> = ".number_format($x_sum)." $lang_member[629] </span>";
								$_SESSION['count_sum3t']=$_SESSION['count_sum3t']+$x_sum;
										}
			
			

				
				
				
}#if($open_0==1 and $open_1==1 and $open_2==1 and $open_3==1 and $open_4==1 and $open_5==1 and $open_6==1 and $open_7==1 and $open_8==1){			
				
				
				
						}else{#	if($x_sum<=$emax[1] ){	 ###### ตรวจเงินสูงสุด
							$_SESSION[error][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = $lang_member[632] ".number_format($emax[1]).' </span>';	
						}
						
					}else{#	if($x_sum>=$emin[1]  ){	 ###### ตรวจเงินต่ำสุด
						$_SESSION[error][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][$zone][$type_lot]." [ "._dt($q_num)." ] = $lang_member[631] ".number_format($emin[1]).' </span>';	
					}	
				
				
			}#if($_SESSION['xcount']<$x_sum){
#######################################################LOG
}#if($x_sum>0){		
}#	if($mpay[$type_lot]>0.00 ){
?>