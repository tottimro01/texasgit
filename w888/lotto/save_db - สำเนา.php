<?
##############ซื้อแบบตัว
 if($_SESSION['m_bet_tou']==1){
	if($type_lot==4 or $type_lot==5 or $type_lot==18){
$x_sum=round(1000/$hpay[$type_lot],2)*$x_sum;
	}
}
##############ซื้อแบบตัว



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
						
						
		
	if($last_num==$q_num[$type_lot]){
	#	sleep(2);
		}	
		
						
	#########################JSON STOP#######################################		
	#########################JSON STOP#######################################							
$url_file_s="../json/lotto/stop/1/".$type_lot."_".$q_num.".json";							
if(file_exists($url_file_s)){
	
		################STOP
$url_file_sx="../json/lotto/stop/mid/1/".$_SESSION[mid]."_".$type_lot."_".$q_num.".json";	
if(!file_exists($url_file_sx)){
	
###########################สร้างใหม่
$mm_js=file_get_contents3($url_file_s);
$jstop = json_decode($mm_js, true);	
$jxstop=$jstop[0];	
$jxstop[xnext]=$time_stam-(60*$jxstop[ttime]);
$jxstop[bnew]="addnew";


}else{
	
$mm_js=file_get_contents3($url_file_sx);
$jstop = json_decode($mm_js, true);	
$jxstop=$jstop[0];	

if($time_stam>$jxstop[xnext]){
		###########################ล้าง
jstoplot_new($url_file_sx , $jxstop[type] , $jxstop[number]  ,$jxstop[desum] , $jxstop[ttime] );
# $_SESSION[error][1][]='<span class="cr">ล้าง</span>';	
$jxstop[xnext]=$time_stam+(60*$jxstop[ttime]);
$jxstop[sum]=$jxstop[desum];

}
	
	
	}
	



}else{
	
$jxstop=array();	
$jxstop[number]="";
}
		

# $_SESSION[error][1][]='<span class="cr">'.date("H:i:s",$jxstop[xnext]).'</span>';	
 
 if($time_stam>$jxstop[xnext] and $x_sum>$jxstop[sum] and $jxstop[number]!=""  ){
	 
	 ##########ซื้อแบบตัว
	 if($_SESSION['m_bet_tou']==1){
	$_SESSION[error][1][]='<span class="cr">'.$lang_member[473].' '.$q_num.' :  '. round($jxstop[sum]/14.29).$lang_member[548].'/'.$lang_member[552].'</span>';		 	 
		 }else{
	$_SESSION[error][1][]='<span class="cr">'.$lang_member[473].' '.$q_num.' :  '. $jxstop[sum].' '.$lang_member[325].'/'.$lang_member[552].'</span>';		 
		 }
		 
  ########################ประวัติเลขเต็ม
 include("save_topmax.php");
  ########################ประวัติเลขเต็ม		 


	 
 }elseif($time_stam<$jxstop[xtime]  and $jxstop[number]!="" and $time_stam<$jxstop[xnext]  ){	

 #$_SESSION[error][1][]='<span class="cr">'.$lang_member[473].' '.$q_num.' : ชั่วคราวรอ '. $jxstop[ttime].'นาที</span>';	
 $_SESSION[error][1][]='<span class="cr">'.$lang_member[473].' '.$q_num.' : '.$lang_member[352].' '. _fbt($jxstop[xnext]-$time_stam).''.$lang_member[554].'</span>';	
 
   ########################ประวัติเลขเต็ม
 include("save_topmax.php");
  ########################ประวัติเลขเต็ม

}elseif($time_stam>$jxstop[xtime] and $x_sum>$jxstop[sum] and $jxstop[number]!="" and $time_stam<$jxstop[xnext] ){	

 $_SESSION[error][1][]='<span class="cr">'.$q_num.' '.$lang_member[551].'  : '.number_format($jxstop[sum]).'</span>';	
 
  ########################ประวัติเลขเต็ม
 include("save_topmax.php");
  ########################ประวัติเลขเต็ม


}elseif( ($time_stam>$jxstop[xtime] and $x_sum<=$jxstop[sum])  or  ($jxstop[number]=="" ) or ($time_stam>$jxstop[xnext] and $x_sum<=$jxstop[sum] and $jxstop[number]!=""  )){
	
	

	
	
	
	
	######################################
	$step_sum=$jxstop[sum]-$x_sum;
		

     if($step_sum<=0 and $jxstop[number]!="" ){
		###########################สร้างใหม่
jstoplot($url_file_sx , $jxstop[type] , $jxstop[number]  ,$jxstop[desum] , $jxstop[ttime] );
# $_SESSION[error][1][]='<span class="cr">สร้างใหม่</span>';		
		}elseif( $jxstop[number]!=""  ){
		##############################อัพเดท	
		if($jxstop[bnew]=="addnew"){
$jxstop[xnext]=$time_stam+(60*$jxstop[ttime]);
			}
jstoplotup($url_file_sx , $jxstop[type] , $jxstop[number]  , $step_sum , $jxstop[ttime]  , $jxstop[xtime]  ,$jxstop[desum] , $jxstop[xnext] );
# $_SESSION[error][1][]='<span class="cr">อัพเดท</span>';		
			}
	#########################JSON STOP#######################################		
	#########################JSON STOP#######################################			
						

	
	if($type_lot==3 or $type_lot==20  or $type_lot==24){
/*		
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
	*/
			$sql="select * from bom_tb_1_sa where play_number='".$q_num3."' and lot_type='".$type_lot."'";
			$re0=sql_array2($sql);
			$sumck0=$re0[s_sum];
			$sql="select * from bom_tb_1_ag where play_number='".$q_num3."' and lot_type='".$type_lot."' and r_id='".$_SESSION['crid1']."'";
			$re1=sql_array2($sql);
			$sumck1=$re1[s_sum];
			$sql="select * from bom_tb_1_ag where play_number='".$q_num3."' and lot_type='".$type_lot."' and r_id='".$_SESSION['crid2']."'";
			$re2=sql_array2($sql);
			$sumck2=$re2[s_sum];
			$sql="select * from bom_tb_1_ag where play_number='".$q_num3."' and lot_type='".$type_lot."' and r_id='".$_SESSION['crid3']."'";
			$re3=sql_array2($sql);
			$sumck3=$re3[s_sum];
			$sql="select * from bom_tb_1_ag where play_number='".$q_num3."' and lot_type='".$type_lot."' and r_id='".$_SESSION['crid4']."'";
			$re4=sql_array2($sql);
			$sumck4=$re4[s_sum];
		
$num_sql=$q_num3;		
		
		
	}else{
	/*	
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
	*/
			$sql="select * from bom_tb_1_sa where play_number='".$q_num."' and lot_type='".$type_lot."'";
			$re0=sql_array2($sql);
			$sumck0=$re0[s_sum];
			$sql="select * from bom_tb_1_ag where play_number='".$q_num."' and lot_type='".$type_lot."' and r_id='".$_SESSION['crid1']."'";
			$re1=sql_array2($sql);
			$sumck1=$re1[s_sum];
			$sql="select * from bom_tb_1_ag where play_number='".$q_num."' and lot_type='".$type_lot."' and r_id='".$_SESSION['crid2']."'";
			$re2=sql_array2($sql);
			$sumck2=$re2[s_sum];
			$sql="select * from bom_tb_1_ag where play_number='".$q_num."' and lot_type='".$type_lot."' and r_id='".$_SESSION['crid3']."'";
			$re3=sql_array2($sql);
			$sumck3=$re3[s_sum];
			$sql="select * from bom_tb_1_ag where play_number='".$q_num."' and lot_type='".$type_lot."' and r_id='".$_SESSION['crid4']."'";
			$re4=sql_array2($sql);
			$sumck4=$re4[s_sum];		
			
$num_sql=$q_num;				
		
		}
			

###########################ยังไม่มี
/*
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
*/
if($sumck0==""){
$sql="insert into bom_tb_1_sa (play_number ,  lot_type , s_sum ) values ('$num_sql' , '$type_lot', '$hover[$type_lot]' );";
sql_query2($sql);
$sumck0=($hover[$type_lot]);
	}
if($sumck1==""){
$sql="insert into bom_tb_1_ag (play_number ,  lot_type , s_sum , r_id ) values ('$num_sql' , '$type_lot', '$r1over[$type_lot]' , '".$_SESSION['crid1']."');";
sql_query2($sql);
$sumck1=($r1over[$type_lot]);
	}
if($sumck2==""){
$sql="insert into bom_tb_1_ag (play_number ,  lot_type , s_sum , r_id ) values ('$num_sql' , '$type_lot', '$r2over[$type_lot]' , '".$_SESSION['crid2']."');";
sql_query2($sql);
$sumck2=($r2over[$type_lot]);
	}
if($sumck3==""){
$sql="insert into bom_tb_1_ag (play_number ,  lot_type , s_sum , r_id ) values ('$num_sql' , '$type_lot', '$r3over[$type_lot]' , '".$_SESSION['crid3']."');";
sql_query2($sql);
$sumck3=($r3over[$type_lot]);
	}
if($sumck4==""){
$sql="insert into bom_tb_1_ag (play_number ,  lot_type , s_sum , r_id ) values ('$num_sql' , '$type_lot', '$r4over[$type_lot]' , '".$_SESSION['crid4']."');";
sql_query2($sql);
$sumck4=($r4over[$type_lot]);
	}
###########################ยังไม่มี

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
	
	
			

if($sumck0<=0 and $sumck0!=""){
 $_SESSION[error][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][1][$type_lot]." [ "._dt($q_num)." ] = <b>$lang_member[414]</b>.</span>";
 
 $sql="delete from bom_tb_lotto_lock_1 where  h_num='$q_num' and lot_type='$type_lot' and h_sum>0 ";
sql_query($sql);

$sql="INSERT IGNORE INTO bom_tb_lotto_lock_1 (h_num,	lot_type,h_datetime  ) values('$q_num','$type_lot', now())";
sql_query($sql);

  ########################ประวัติเลขเต็ม
 include("save_topmax.php");
  ########################ประวัติเลขเต็ม

}elseif($sumck0<$x_sum  and $sumck0!=""){
$txt_q="$lang_member[445]: ".number_format($sumck0);
 $_SESSION[error][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][1][$type_lot]." [ "._dt($q_num)." ] = <b>$lang_member[414]</b> $txt_q</span>";	
 
  ########################ประวัติเลขเต็ม
 include("save_topmax.php");
  ########################ประวัติเลขเต็ม
  
	}else{



if($type_lot==3 or $type_lot==20  or $type_lot==24){
			
			########################จำกัดต่อ 1 เลข
			/*
			$url_file_5a="../json/lotto/number/m_".$type_lot."_".$q_num3."_".$_SESSION['m_id'].".json";
			$sumck5a=jrlot($url_file_5a);
			*/
			$sql="select * from bom_tb_1_mem where play_number='".$q_num3."' and lot_type='".$type_lot."' and m_id='".$_SESSION['m_id']."'";
			$re5=sql_array2($sql);
			$sumck5a=$re5[s_sum];
			########################จำกัดต่อ 1 เลข
			
			$num_sql=$q_num3;
			
		}else{
			
			########################จำกัดต่อ 1 เลข
			/*
			$url_file_5a="../json/lotto/number/m_".$type_lot."_".$q_num."_".$_SESSION['m_id'].".json";
			$sumck5a=jrlot($url_file_5a);
			*/
			$sql="select * from bom_tb_1_mem where play_number='".$q_num."' and lot_type='".$type_lot."' and m_id='".$_SESSION['m_id']."'";
			$re5=sql_array2($sql);
			$sumck5a=$re5[s_sum];
			########################จำกัดต่อ 1 เลข			
			
			$num_sql=$q_num;
			}


###########################ยังไม่มี
/*
			if(!file_exists($url_file_5a) or $sumck5a==""){
			jwlot($url_file_5a,($hnummax[$type_lot]));	
			$sumck5a=($hnummax[$type_lot])-$x_sum;
				}
*/
if( $sumck5a==""){
$sql="insert into bom_tb_1_mem (play_number ,  lot_type , s_sum , m_id ) values ('$num_sql' , '$type_lot', '$hnummax[$type_lot]' , '".$_SESSION['m_id']."');";
sql_query2($sql);
$sumck5a=($hnummax[$type_lot]);
}
###########################ยังไม่มี
	
		
##########################################Member		
if(($sumck5a<=0 and $sumck5a!="") or ($sumck5a<$x_sum and file_exists($url_file_5a))){
 $_SESSION[error][1][]='<span class="cr">'.$lot_type[$_SESSION['lang']][1][$type_lot]." [ "._dt($q_num)." ] = <b>$lang_member[473]</b>.$x_level[5]</span>";
	}else{
		
		
		
		
		
#############คิดนอกบอม
if($_SESSION['crid2']==38 or $_SESSION['crid2']==425){
$r1force[$type_lot]=0;	
$r2myshare[$type_lot]=0;
	}
	
#############คิดนอก mc
if($_SESSION['crid2']==0){
	
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
########################จำกัดต่อ 1 เลข	
#################ตัดโควต้าลดเลข
$sumlimit1=$x_sum*($r2myshare[$type_lot]/100);
$sumlimit2=$x_sum*($r3myshare[$type_lot]/100);
$sumlimit3=$x_sum*($r4myshare[$type_lot]/100);
$sumlimit4=$x_sum*($hshare[$type_lot]/100);
$sumlimit0=$x_sum*( (100- ($r2myshare[$type_lot]+$r3myshare[$type_lot]+$r4myshare[$type_lot]+$hshare[$type_lot])) /100);
#################ตัดโควต้าลดเลข
			
		
								$adis=_dislot( $x_sum , $hdis[$type_lot] , $type_lot);
								$ar1dis=_dislot( $x_sum , $r1dis[$type_lot] , $type_lot);
								$ar2dis=_dislot( $x_sum , $r2dis[$type_lot] , $type_lot);
								$ar3dis=_dislot( $x_sum , $r3dis[$type_lot] , $type_lot);
								$ar4dis=_dislot( $x_sum , $r4dis[$type_lot] , $type_lot);
								
								
	##################โควต้า
	/*
$cc_sum0=($sumck0-$x_sum);	
$cc_sum1=($sumck1-$x_sum);	
$cc_sum2=($sumck2-$x_sum);	
$cc_sum3=($sumck3-$x_sum);	
$cc_sum4=($sumck4-$x_sum);	
*/
$cc_sum0=($sumck0-$sumlimit0);	
$cc_sum1=($sumck1-$sumlimit1);	
$cc_sum2=($sumck2-$sumlimit2);	
$cc_sum3=($sumck3-$sumlimit3);	
$cc_sum4=($sumck4-$sumlimit4);	

if($cc_sum0<=0){$cc_sum0=0;}		
if($cc_sum1<=0){$cc_sum1=0;}				
if($cc_sum2<=0){$cc_sum2=0;}	
if($cc_sum3<=0){$cc_sum3=0;}	
if($cc_sum4<=0){$cc_sum4=0;}	
/*
jwlot($url_file_0,($cc_sum0));	
jwlot($url_file_1,($cc_sum1));	
jwlot($url_file_2,($cc_sum2));	
jwlot($url_file_3,($cc_sum3));	
jwlot($url_file_4,($cc_sum4));	
*/
$sql="update bom_tb_1_sa set  s_sum=$cc_sum0 where play_number ='$num_sql' and  lot_type= '$type_lot'  ;";
sql_query2($sql);
$sql="update bom_tb_1_ag set  s_sum=$cc_sum1 where play_number ='$num_sql' and  lot_type= '$type_lot'  and  r_id='".$_SESSION['crid1']."' ;";
sql_query2($sql);
$sql="update bom_tb_1_ag set  s_sum=$cc_sum2 where play_number ='$num_sql' and  lot_type= '$type_lot'  and  r_id='".$_SESSION['crid2']."' ;";
sql_query2($sql);
$sql="update bom_tb_1_ag set  s_sum=$cc_sum3 where play_number ='$num_sql' and  lot_type= '$type_lot'  and  r_id='".$_SESSION['crid3']."' ;";
sql_query2($sql);
$sql="update bom_tb_1_ag set  s_sum=$cc_sum4 where play_number ='$num_sql' and  lot_type= '$type_lot'  and  r_id='".$_SESSION['crid4']."' ;";
sql_query2($sql);
##################โควต้า
	
	
$cc_sum5a=($sumck5a-$x_sum);	

if($cc_sum5a<=0){$cc_sum5a=0;}									
########################จำกัดต่อ 1 เลข			
/*
jwlot($url_file_5a,($cc_sum5a));	
*/
$sql="update bom_tb_1_mem set  s_sum=$cc_sum5a where play_number ='$num_sql' and  lot_type= '$type_lot'  and  m_id='".$_SESSION['m_id']."' ;";
sql_query2($sql);
########################จำกัดต่อ 1 เลข		


								
								
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
	 $sql="INSERT IGNORE INTO bom_tb_databet_live (d_date,	play_id,	m_id	,d_count, d_out,	d_in	,d_sum	,d_by ) values(now(),'$rex[play_id]','$_SESSION[mid]','$_SESSION[xcount]','$tosum','$tosum2' ,'$log_sum',3)";
     sql_query($sql);
	#######################################################LOG
								
								$arr_in_socket[] = '(lot_type="'.$type_lot.'" and play_number="'.$q_num.'")';
								/*
								$_SESSION[error][1][]='<span class="cb">'.$lot_type[$_SESSION['lang']][1][$type_lot]." <b>[ "._dt($q_num)." ]</b> = ".number_format($x_sum)." $lang_member[629] </span>";
								$_SESSION[count_sum]=$_SESSION[count_sum]+$x_sum;
								*/
								 if($_SESSION['m_bet_tou']==1  and ($type_lot==4 or $type_lot==5)){
								$x_sum9=round(1000/$hpay[$type_lot],2);
								$_SESSION[error][1][]='<span class="cb">'.$lot_type[$_SESSION['lang']][1][$type_lot]." <b>[ "._dt($q_num)." ]</b> = ".number_format($x_sum/$x_sum9)." $lang_member[548] : $lang_member[629] </span>";
								$_SESSION[count_sum]=$_SESSION[count_sum]+$x_sum;
								$_SESSION[count_sum3t]=$_SESSION[count_sum3t]+(($x_sum/$x_sum9)*12);
									}else{
								$_SESSION[error][1][]='<span class="cb">'.$lot_type[$_SESSION['lang']][1][$type_lot]." <b>[ "._dt($q_num)." ]</b> = ".number_format($x_sum)." $lang_member[629] </span>";
								$_SESSION[count_sum]=$_SESSION[count_sum]+$x_sum;
								$_SESSION[count_sum3t]=$_SESSION[count_sum3t]+$x_sum;
										}
								
								
								$_SESSION[count_dis]=$_SESSION[count_dis]+$adis;
								$_SESSION[count_dis1]=$_SESSION[count_dis1]+$ar1dis;
								$_SESSION[count_dis2]=$_SESSION[count_dis2]+$ar2dis;
								$_SESSION[count_dis3]=$_SESSION[count_dis3]+$ar3dis;
								$_SESSION[count_dis4]=$_SESSION[count_dis4]+$ar4dis;
								
								$_SESSION[xcount]=$_SESSION[xcount]-$x_sum;
								$count_num[]=1;
								$last_num=$q_num[$type_lot];
								

								
								
								

}#if($sumck5a<=0 and $sumck5a!=""){

}#if($sumck0<=0 and $sumck0!=""){

			
			}#if($time_stam>$jxstop[xtime] and $x_sum>$jxstop[sum] and $jxstop[number]!="" ){	
			
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