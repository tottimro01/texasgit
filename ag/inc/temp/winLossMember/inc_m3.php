<?php 
$sum0=0;
$sum0af=0;

$sum1=0;
$sum2=0;
$sum3=0;
$sum4=0;

$sum5=0;
$sum6=0;
$sum7=0;
$sum8=0;

$sum9=0;
$sum10=0;

$sumafm=0;
$sumafr=0;
$sunafsa=0;

################################# บอล


$sql="select 
 sum( 
(ROUND(  b_sum ,10))	
   ) as t1 ,
 
sum(
   	ROUND( 	(  - b_sum ) ,10)
   ) as m1   , 
   sum(
   	ROUND( 	(  b_pay) ,10)
   ) as m2   , 
sum(
   	ROUND( 	( b_bonus ) ,10)
   ) as m3   ,

  sum(
   	ROUND( 	(b_sum)*((b_share_m)/100) ,10)
   ) as r1 ,  
   sum(
   	ROUND( 	-(  b_pay)*((b_share_m)/100) ,10)
   ) as r2   ,
sum(
   	ROUND( (   br_pay_".$ag_level." - b_pay)	* (( $keep_share )/100) ,10)
   ) as r22   ,
sum(
   	ROUND( 	(  - b_bonus)*((b_share_m)/100) ,10)
   ) as r3   ,
sum(
   	ROUND( ( br_bonus_".$ag_level." - b_bonus)	* (( $keep_share )/100) ,10)
   ) as r33 ,  
   
     sum(
   	ROUND( 	(  - br_pay_".$ag_level." )*(( $keep_share )/100) ,10)
   ) as w2  ,    
sum(
   	ROUND( 	(  b_sum- br_bonus_".$ag_level."   )*(( $keep_share )/100) ,10)
   ) as w3 
 from bom_tb_football_bill where m_id = '".$rs['m_id']."'  and b_accept=1  and b_status!=5   and b_numstep=1 and  b_zone=6   and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate'";
if($sc!=""){ 
$rs1=sql_array($sql);

$a0=$rs1['t1'];

$a1=$rs1['m1'];
$a2=$rs1['m2'];
$a3=$rs1['m3'];
$a4=$a1+$a2+$a3;

$a5=$rs1['r1'];
$a6=$rs1['r2']+$rs1['r22'];
$a7=$rs1['r3']+$rs1['r33'];
$a8=$a5+$a6+$a7;

$a9=$rs1['w2'];
$a10=$rs1['w3'];
}



################################# กีฬา


$sql="select 
 sum( 
(ROUND(  b_sum ,10))	
   ) as t1 ,
 
sum(
   	ROUND( 	(  - b_sum ) ,10)
   ) as m1   , 
   sum(
   	ROUND( 	(  b_pay) ,10)
   ) as m2   , 
sum(
   	ROUND( 	( b_bonus ) ,10)
   ) as m3   ,

  sum(
   	ROUND( 	(b_sum)*((b_share_m)/100) ,10)
   ) as r1 ,  
   sum(
   	ROUND( 	-(  b_pay)*((b_share_m)/100) ,10)
   ) as r2   ,
sum(
   	ROUND( (   br_pay_".$ag_level." - b_pay)	* (( $keep_share )/100) ,10)
   ) as r22   ,
sum(
   	ROUND( 	(  - b_bonus)*((b_share_m)/100) ,10)
   ) as r3   ,
sum(
   	ROUND( ( br_bonus_".$ag_level." - b_bonus)	* (( $keep_share )/100) ,10)
   ) as r33 ,  
   
     sum(
   	ROUND( 	(  - br_pay_".$ag_level." )*(( $keep_share )/100) ,10)
   ) as w2  ,    
sum(
   	ROUND( 	(  b_sum- br_bonus_".$ag_level."   )*(( $keep_share )/100) ,10)
   ) as w3 
 from bom_tb_football_bill where m_id = '".$rs['m_id']."'  and b_accept=1  and b_status!=5   and b_numstep=1 and  b_zone!=1   and  b_zone!=6  and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate'";
if($sp!=""){ 
$rs11=sql_array($sql);

$b0=$rs11['t1'];

$b1=$rs11['m1'];
$b2=$rs11['m2'];
$b3=$rs11['m3'];
$b4=$b1+$b2+$b3;

$b5=$rs11['r1'];
$b6=$rs11['r2']+$rs11['r22'];
$b7=$rs11['r3']+$rs11['r33'];
$b8=$b5+$b6+$b7;

$b9=$rs11['w2'];
$b10=$rs11['w3'];
}


################################# มวย


 $sql="select 
 sum( 
(ROUND(  b_sum ,10))	
   ) as t1 ,

 
sum(
   	ROUND( 	(  - b_sum ) ,10)
   ) as m1   , 
   sum(
   	ROUND( 	(  b_pay) ,10)
   ) as m2   , 
sum(
   	ROUND( 	( b_bonus ) ,10)
   ) as m3   ,

  sum(
   	ROUND( 	(b_sum)*((b_share_m)/100) ,10)
   ) as r1 ,  
   sum(
   	ROUND( 	-(  b_pay)*((b_share_m)/100) ,10)
   ) as r2   ,
sum(
   	ROUND( (   br_pay_".$ag_level." - b_pay)	* (( $keep_share )/100) ,10)
   ) as r22   ,
sum(
   	ROUND( 	(  - b_bonus)*((b_share_m)/100) ,10)
   ) as r3   ,
sum(
   	ROUND( ( br_bonus_".$ag_level." - b_bonus)	* (( $keep_share )/100) ,10)
   ) as r33 ,  
   
     sum(
   	ROUND( 	(  - br_pay_".$ag_level." )*(( $keep_share )/100) ,10)
   ) as w2  ,    
sum(
   	ROUND( 	(  b_sum- br_bonus_".$ag_level."   )*(( $keep_share )/100) ,10)
   ) as w3 
 from bom_tb_football_bill where m_id = '".$rs['m_id']."'  and b_accept=1  and b_status!=5   and b_numstep=1 and  b_zone=1       and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate'";
 if($bx!=""){
$rs12=sql_array($sql);

$c0=$rs12['t1'];

$c1=$rs12['m1'];
$c2=$rs12['m2'];
$c3=$rs12['m3'];
$c4=$c1+$c2+$c3;

$c5=$rs12['r1'];
$c6=$rs12['r2']+$rs12['r22'];
$c7=$rs12['r3']+$rs12['r33'];
$c8=$c5+$c6+$c7;

$c9=$rs12['w2'];
$c10=$rs12['w3'];
}


################################# สเต็ป


$sql="select 
 sum( 
(ROUND(  b_sum ,10))	
   ) as t1 ,

   
sum(
   	ROUND( 	(  - b_sum ) ,10)
   ) as m1   , 
   sum(
   	ROUND( 	(  b_pay) ,10)
   ) as m2   , 
sum(
   	ROUND( 	( b_bonus ) ,10)
   ) as m3   ,

  sum(
   	ROUND( 	(b_sum)*((b_share_m)/100) ,10)
   ) as r1 ,  
   sum(
   	ROUND( 	-(  b_pay)*((b_share_m)/100) ,10)
   ) as r2   ,
sum(
   	ROUND( (   br_pay_".$ag_level." - b_pay)	* (( $keep_share )/100) ,10)
   ) as r22   ,
sum(
   	ROUND( 	(  - b_bonus)*((b_share_m)/100) ,10)
   ) as r3   ,
sum(
   	ROUND( ( br_bonus_".$ag_level." - b_bonus)	* (( $keep_share )/100) ,10)
   ) as r33 ,  
   
     sum(
   	ROUND( 	(  - br_pay_".$ag_level." )*(( $keep_share )/100) ,10)
   ) as w2  ,    
sum(
   	ROUND( 	(  b_sum- br_bonus_".$ag_level."   )*(( $keep_share )/100) ,10)
   ) as w3 
 from bom_tb_football_bill where m_id = '".$rs['m_id']."'  and b_accept=1  and b_status!=5   and b_numstep>1     and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
 if($st!=""){
$rs13=sql_array($sql);

$d0=$rs13['t1'];

$d1=$rs13['m1'];
$d2=$rs13['m2'];
$d3=$rs13['m3'];
$d4=$d1+$d2+$d3;

$d5=$rs13['r1'];
$d6=$rs13['r2']+$rs13['r22'];
$d7=$rs13['r3']+$rs13['r33'];
$d8=$d5+$d6+$d7;

$d9=$rs13['w2'];
$d10=$rs13['w3'];
}


################################# หวย

$sql="select 
 sum( 
(ROUND( 	b_total  ,10))
   ) as t1 ,

sum(
   	ROUND( 	(  - b_total ) ,10)
   ) as m1   , 
   sum(
   	ROUND( 	( b_total - b_pay) ,10)
   ) as m2   , 
sum(
   	ROUND( 	( b_bonus ) ,10)
   ) as m3   ,

  sum(
   	ROUND( 	(b_total)*((b_share_m)/100) ,10)
   ) as r1 ,  
   sum(
   	ROUND( 	-( b_total - b_pay)*((b_share_m)/100) ,10)
   ) as r2   ,
sum(
   	ROUND( ( b_pay - br_pay_".$ag_level.")	* (( $keep_share )/100) ,10)
   ) as r22   ,
sum(
   	ROUND( 	(  - b_bonus)*((b_share_m)/100) ,10)
   ) as r3   ,
sum(
   	ROUND( ( br_bonus_".$ag_level." - b_bonus)	* (( $keep_share )/100) ,10)
   ) as r33 ,  
   
     sum(
   	ROUND( 	(   br_pay_".$ag_level." - b_total)*(( $keep_share )/100) ,10)
   ) as w2  ,    
sum(
   	ROUND( 	(  b_total- br_bonus_".$ag_level."  )*(( $keep_share )/100) ,10)
   ) as w3
 from bom_tb_lotto_bill_play where m_id = '".$rs['m_id']."'  and b_accept=1 and lot_zone=1      and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
 if($lg!=""){
$rs2=sql_array($sql);

$e0=$rs2['t1'];

$e1=$rs2['m1'];
$e2=$rs2['m2'];
$e3=$rs2['m3'];
$e4=$e1+$e2+$e3;

$e5=$rs2['r1'];
$e6=$rs2['r2']+$rs2['r22'];
$e7=$rs2['r3']+$rs2['r33'];
$e8=$e5+$e6+$e7;

$e9=$rs2['w2'];
$e10=$rs2['w3'];
}

################################# หวยหุ้น
$sql="select 
 sum( 
(ROUND( 	b_total  ,10))
   ) as t1 ,
sum(
   	ROUND( 	(  - b_total ) ,10)
   ) as m1   , 
   sum(
   	ROUND( 	( b_total - b_pay) ,10)
   ) as m2   , 
sum(
   	ROUND( 	( b_bonus ) ,10)
   ) as m3   ,

  sum(
   	ROUND( 	(b_total)*((b_share_m)/100) ,10)
   ) as r1 ,  
   sum(
   	ROUND( 	-( b_total - b_pay)*((b_share_m)/100) ,10)
   ) as r2   ,
sum(
   	ROUND( ( b_pay - br_pay_".$ag_level.")	* (( $keep_share )/100) ,10)
   ) as r22   ,
sum(
   	ROUND( 	(  - b_bonus)*((b_share_m)/100) ,10)
   ) as r3   ,
sum(
   	ROUND( ( br_bonus_".$ag_level." - b_bonus)	* (( $keep_share )/100) ,10)
   ) as r33 ,  
   
     sum(
   	ROUND( 	(   br_pay_".$ag_level." - b_total)*(( $keep_share )/100) ,10)
   ) as w2  ,    
sum(
   	ROUND( 	(  b_total- br_bonus_".$ag_level."  )*(( $keep_share )/100) ,10)
   ) as w3 
 from bom_tb_lotto_bill_play where m_id = '".$rs['m_id']."'  and b_accept=1 and lot_zone!=1  and lot_type!=31          and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
if($ls!=""){ 
$rs3=sql_array($sql);# and play_id=58957

$f0=$rs3['t1'];

$f1=$rs3['m1'];
$f2=$rs3['m2'];
$f3=$rs3['m3'];
$f4=$f1+$f2+$f3;

$f5=$rs3['r1'];
$f6=$rs3['r2']+$rs3['r22'];
$f7=$rs3['r3']+$rs3['r33'];
$f8=$f5+$f6+$f7;

$f9=$rs3['w2'];
$f10=$rs3['w3'];
}


################################# หวยชุด
$sql="select 
 sum( 
(ROUND( 	b_total  ,10))
   ) as t1 ,
sum(
   	ROUND( 	(  - b_total ) ,10)
   ) as m1   , 
   sum(
   	ROUND( 	( b_total - b_pay) ,10)
   ) as m2   , 
sum(
   	ROUND( 	( b_bonus ) ,10)
   ) as m3   ,

  sum(
   	ROUND( 	(b_total)*((b_share_m)/100) ,10)
   ) as r1 ,  
   sum(
   	ROUND( 	-( b_total - b_pay)*((b_share_m)/100) ,10)
   ) as r2   ,
sum(
   	ROUND( ( b_pay - br_pay_".$ag_level.")	* (( $keep_share )/100) ,10)
   ) as r22   ,
sum(
   	ROUND( 	(  - b_bonus)*((b_share_m)/100) ,10)
   ) as r3   ,
sum(
   	ROUND( ( br_bonus_".$ag_level." - b_bonus)	* (( $keep_share )/100) ,10)
   ) as r33 ,  
   
     sum(
   	ROUND( 	(   br_pay_".$ag_level." - b_total)*(( $keep_share )/100) ,10)
   ) as w2  ,    
sum(
   	ROUND( 	(  b_total- br_bonus_".$ag_level."  )*(( $keep_share )/100) ,10)
   ) as w3 
 from bom_tb_lotto_bill_play where m_id = '".$rs['m_id']."'  and b_accept=1 and lot_zone!=1  and lot_type=31     and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
 if($ll!=""){
$rs31=sql_array($sql);

$g0=$rs31['t1'];

$g1=$rs31['m1'];
$g2=$rs31['m2'];
$g3=$rs31['m3'];
$g4=$g1+$g2+$g3;

$g5=$rs31['r1'];
$g6=$rs31['r2']+$rs31['r22'];
$g7=$rs31['r3']+$rs31['r33'];
$g8=$g5+$g6+$g7;

$g9=$rs31['w2'];
$g10=$rs31['w3'];
}



################################# เกมส์
 $sql="select 
 sum( 
(ROUND( 	b_total  ,10))
   ) as t1 ,
sum(
   	ROUND( 	(  - b_total ) ,10)
   ) as m1   , 
   sum(
   	ROUND( 	( b_total - b_pay) ,10)
   ) as m2   , 
sum(
   	ROUND( 	( b_bonus ) ,10)
   ) as m3   ,

  sum(
   	ROUND( 	(b_total)*((b_share_m)/100) ,10)
   ) as r1 ,  
   sum(
   	ROUND( 	-( b_total - b_pay)*((b_share_m)/100) ,10)
   ) as r2   ,
sum(
   	ROUND( ( b_pay - br_pay_".$ag_level.")	* (( $keep_share )/100) ,10)
   ) as r22   ,
sum(
   	ROUND( 	(  - b_bonus)*((b_share_m)/100) ,10)
   ) as r3   ,
sum(
   	ROUND( ( br_bonus_".$ag_level." - b_bonus)	* (( $keep_share )/100) ,10)
   ) as r33 ,  
   
     sum(
   	ROUND( 	(   br_pay_".$ag_level." - b_total)*(( $keep_share )/100) ,10)
   ) as w2  ,    
sum(
   	ROUND( 	(  b_total- br_bonus_".$ag_level."  )*(( $keep_share )/100) ,10)
   ) as w3 
 from bom_tb_games_bill_play where m_id = '".$rs['m_id']."'  and b_accept=1         and  STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate'   ";
 if($gm!=""){
$rs4=sql_array($sql);#  and play_id=667   

$h0=$rs4['t1'];

$h1=$rs4['m1'];
$h2=$rs4['m2'];
$h3=$rs4['m3'];
$h4=$h1+$h2+$h3;

$h5=$rs4['r1'];
$h6=$rs4['r2']+$rs4['r22'];
$h7=$rs4['r3']+$rs4['r33'];
$h8=$h5+$h6+$h7;

$h9=$rs4['w2'];
$h10=$rs4['w3'];
}
################################# คาสิโน
$sql="select 
 sum( 
(ROUND( 	b_total  ,10))
   ) as t1 ,
sum(
   	ROUND( 	(  - b_total ) ,10)
   ) as m1   , 
   sum(
   	ROUND( 	( b_total - b_pay) ,10)
   ) as m2   , 
sum(
   	ROUND( 	( b_bonus ) ,10)
   ) as m3   ,

  sum(
   	ROUND( 	(b_total)*((b_share_m)/100) ,10)
   ) as r1 ,  
   sum(
   	ROUND( 	-( b_total - b_pay)*((b_share_m)/100) ,10)
   ) as r2   ,
sum(
   	ROUND( ( b_pay - br_pay_".$ag_level.")	* (( $keep_share )/100) ,10)
   ) as r22   ,
sum(
   	ROUND( 	(  - b_bonus)*((b_share_m)/100) ,10)
   ) as r3   ,
sum(
   	ROUND( ( br_bonus_".$ag_level." - b_bonus)	* (( $keep_share )/100) ,10)
   ) as r33 ,  
   
     sum(
   	ROUND( 	(   br_pay_".$ag_level." - b_total)*(( $keep_share )/100) ,10)
   ) as w2  ,    
sum(
   	ROUND( 	(  b_total- br_bonus_".$ag_level."  )*(( $keep_share )/100) ,10)
   ) as w3 
 from bom_tb_casino_bill_play where m_id = '".$rs['m_id']."'  and b_accept=1     and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate'   ";
 if($cn!=""){
$rs5=sql_array($sql);

$i0=$rs5['t1'];

$i1=$rs5['m1'];
$i2=$rs5['m2'];
$i3=$rs5['m3'];
$i4=$i1+$i2+$i3;

$i5=$rs5['r1'];
$i6=$rs5['r2']+$rs5['r22'];
$i7=$rs5['r3']+$rs5['r33'];
$i8=$i5+$i6+$i7;

$i9=$rs5['w2'];
$i10=$rs5['w3'];
}

##############AF#######
##############AF#######
if($af!=""){
#include("inc_m3_af.php");
$sumafm=($rs1['afm']+$rs11['afm']+$rs12['afm']+$rs13['afm'])+($rs2['afm']+$rs3['afm']+$rs31['afm'])+$rs4['afm']+$rs5['afm'];
$sumafr=($rs1['afr']+$rs11['afr']+$rs12['afr']+$rs13['afr'])+($rs2['afr']+$rs3['afr']+$rs31['afr'])+$rs4['afr']+$rs5['afr'];
$sunafsa=($rs1['afsa']+$rs11['afsa']+$rs12['afsa']+$rs13['afsa'])+($rs2['afsa']+$rs3['afsa']+$rs31['afsa'])+$rs4['afsa']+$rs5['afsa'];
}

#####################################
$sum0=($a0+$b0+$c0+$d0)+($e0+$f0+$g0)+$h0+$i0;
$sum0af=$sumafm+$sumafr+$sunafsa;

$sum1=($a1+$b1+$c1+$d1)+($e1+$f1+$g1)+$h1+$i1;
$sum2=($a2+$b2+$c2+$d2)+($e2+$f2+$g2)+$h2+$i2+$sumafm;
$sum3=($a3+$b3+$c3+$d3)+($e3+$f3+$g3)+$h3+$i3;
$sum4=$sum1+$sum2+$sum3;


$sum5=($a5+$b5+$c5+$d5)+($e5+$f5+$g5)+$h5+$i5;
$sum6=($a6+$b6+$c6+$d6)+($e6+$f6+$g6)+$h6+$i6+$sumafr;
$sum7=($a7+$b7+$c7+$d7)+($e7+$f7+$g7)+$h7+$i7;
$sum8=$sum5+$sum6+$sum7;

$sum9=($a9+$b9+$c9+$d9)+($e9+$f9+$g9)+$h9+$i9+($sunafsa);
$sum10=(($a10+$b10+$c10+$d10)+($e10+$f10+$g10)+$h10+$i10)+$sum9;

?>


