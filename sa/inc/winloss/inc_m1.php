<?php 
$sum0=0;

$sum1=0;
$sum2=0;
$sum3=0;
$sum4=0;

$sum5=0;
$sum6=0;
$sum7=0;
$sum8=0;



$sumafm=0;
$sumafr=0;
$sunafsa=0;

################################# บอล


$sql="select 
 sum( 
(ROUND(  b_sum ,10))	
   ) as t1 ,

sum(
   	ROUND( 	( b_sum )*(( $keep_share )/100) ,10)
   ) as w1 ,  
sum(
   	ROUND( 	( -br_bonus_".$r_level."  )*(( $keep_share )/100) ,10)
   ) as w3 ,  
  sum(
   	ROUND( 	(-  br_pay_".$r_level.")*(( $keep_share )/100) ,10)
   ) as w2  , 
   sum(
   	ROUND( 	(b_sum)*(($mem_share)/100) ,10)
   ) as r1 ,
   sum(
   	ROUND( 	-(  br_pay_".$r_level.")*(($mem_share)/100) ,10)
   ) as r2  ,
sum(
    	ROUND( ( br_pay_".$ag_level." - br_pay_".$r_level.")	* (( $keep_share )/100) ,10)
   ) as r22     ,
sum(
   	ROUND( 	(  - br_bonus_".$r_level.")*(($mem_share)/100) ,10)
   ) as r3 ,  
sum(
  ROUND( ( br_bonus_".$ag_level." - br_bonus_".$r_level.")	* (( $keep_share )/100) ,10)
   ) as r33 ,  

sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0 and b_numstep>1 THEN ((b_sum * com_af)/100 ) * (( $afm )/100)
	 WHEN bonus_m_id > 0 and b_numstep=1 and b_status=1 THEN ((b_sum * com_af)/100 ) * (( $afm )/100)
	  WHEN bonus_m_id > 0 and b_numstep=1 and b_status=3 THEN ((b_sum * com_af)/100 ) * (( $afm )/100)
    ELSE 0
END
	  ,10)
   ) as afm   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0 and b_numstep>1 THEN ((-b_sum * com_af)/100 ) * (( $afsa )/100)
	 WHEN bonus_m_id > 0 and b_numstep=1 and b_status=1 THEN ((-b_sum * com_af)/100 ) * (( $afsa )/100)
	  WHEN bonus_m_id > 0 and b_numstep=1 and b_status=3 THEN ((-b_sum * com_af)/100 ) * (( $afsa )/100)
    ELSE 0
END
	  ,10)
   ) as afsa
 from bom_tb_football_bill where r_agent_id like '%*".$rs['r_id']."*%' and b_confirm != 1  and b_accept=1  and b_status!=5 and b_numstep=1 and  b_zone=6   and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
$rs1=sql_array($sql);
if($cb_sc!=""){
$a0=$rs1['t1'];

$a1=$rs1['r1'];
$a2=$rs1['r2']+$rs1['r22'];
$a3=$rs1['r3']+$rs1['r33'];
$a4=$a1+$a2+$a3;

$a5=$rs1['w1'];
$a6=$rs1['w2'];
$a7=$rs1['w3'];
$a8=$a5+$a6+$a7;

}

################################# กีฬา


$sql="select 
 sum( 
(ROUND(  b_sum ,10))	
   ) as t1 ,

sum(
   	ROUND( 	( b_sum )*(( $keep_share )/100) ,10)
   ) as w1 ,  
sum(
   	ROUND( 	( -br_bonus_".$r_level."  )*(( $keep_share )/100) ,10)
   ) as w3 ,  
  sum(
   	ROUND( 	(-  br_pay_".$r_level.")*(( $keep_share )/100) ,10)
   ) as w2  , 
   
    sum(
   	ROUND( 	(b_sum)*(($mem_share)/100) ,10)
   ) as r1 ,
   sum(
   	ROUND( 	-(  br_pay_".$r_level.")*(($mem_share)/100) ,10)
   ) as r2  ,
sum(
     	ROUND( ( br_pay_".$ag_level." - br_pay_".$r_level.")	* (( $keep_share )/100) ,10)
   ) as r22     ,
sum(
   	ROUND( 	(  - br_bonus_".$r_level.")*(($mem_share)/100) ,10)
   ) as r3 ,  
sum(
  ROUND( ( br_bonus_".$ag_level." - br_bonus_".$r_level.")	* (( $keep_share )/100) ,10)
   ) as r33 ,  

sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0 and b_numstep>1 THEN ((b_sum * com_af)/100 ) * (( $afm )/100)
	 WHEN bonus_m_id > 0 and b_numstep=1 and b_status=1 THEN ((b_sum * com_af)/100 ) * (( $afm )/100)
	  WHEN bonus_m_id > 0 and b_numstep=1 and b_status=3 THEN ((b_sum * com_af)/100 ) * (( $afm )/100)
    ELSE 0
END
	  ,10)
   ) as afm   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0 and b_numstep>1 THEN ((-b_sum * com_af)/100 ) * (( $afsa )/100)
	 WHEN bonus_m_id > 0 and b_numstep=1 and b_status=1 THEN ((-b_sum * com_af)/100 ) * (( $afsa )/100)
	  WHEN bonus_m_id > 0 and b_numstep=1 and b_status=3 THEN ((-b_sum * com_af)/100 ) * (( $afsa )/100)
    ELSE 0
END
	  ,10)
   ) as afsa
 from bom_tb_football_bill where r_agent_id like '%*".$rs['r_id']."*%' and b_confirm != 1  and b_accept=1  and b_status!=5 and b_numstep=1 and  b_zone!=6 and  b_zone!=1  and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
$rs11=sql_array($sql);
if($cb_sp!=""){
$b0=$rs11['t1'];



$b1=$rs11['r1'];
$b2=$rs11['r2']+$rs11['r22'];
$b3=$rs11['r3']+$rs11['r33'];
$b4=$b1+$b2+$b3;

$b5=$rs11['w1'];
$b6=$rs11['w2'];
$b7=$rs11['w3'];
$b8=$b5+$b6+$b7;

}




################################# มวย


$sql="select 
 sum( 
(ROUND(  b_sum ,10))	
   ) as t1 ,

sum(
   	ROUND( 	( b_sum )*(( $keep_share )/100) ,10)
   ) as w1 ,  
sum(
   	ROUND( 	( -br_bonus_".$r_level."  )*(( $keep_share )/100) ,10)
   ) as w3 ,  
  sum(
   	ROUND( 	(-  br_pay_".$r_level.")*(( $keep_share )/100) ,10)
   ) as w2  , 
   sum(
   	ROUND( 	(b_sum)*(($mem_share)/100) ,10)
   ) as r1 ,
sum(
   	ROUND( 	-(  br_pay_".$r_level.")*(($mem_share)/100) ,10)
   ) as r2  ,
sum(
     	ROUND( ( br_pay_".$ag_level." - br_pay_".$r_level.")	* (( $keep_share )/100) ,10)
   ) as r22     ,
   sum(
   	ROUND( 	(  - br_bonus_".$r_level.")*(($mem_share)/100) ,10)
   ) as r3 ,  
sum(
  ROUND( ( br_bonus_".$ag_level." - br_bonus_".$r_level.")	* (( $keep_share )/100) ,10)
   ) as r33 ,  

sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0 and b_numstep>1 THEN ((b_sum * com_af)/100 ) * (( $afm )/100)
	 WHEN bonus_m_id > 0 and b_numstep=1 and b_status=1 THEN ((b_sum * com_af)/100 ) * (( $afm )/100)
	  WHEN bonus_m_id > 0 and b_numstep=1 and b_status=3 THEN ((b_sum * com_af)/100 ) * (( $afm )/100)
    ELSE 0
END
	  ,10)
   ) as afm   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0 and b_numstep>1 THEN ((-b_sum * com_af)/100 ) * (( $afsa )/100)
	 WHEN bonus_m_id > 0 and b_numstep=1 and b_status=1 THEN ((-b_sum * com_af)/100 ) * (( $afsa )/100)
	  WHEN bonus_m_id > 0 and b_numstep=1 and b_status=3 THEN ((-b_sum * com_af)/100 ) * (( $afsa )/100)
    ELSE 0
END
	  ,10)
   ) as afsa
 from bom_tb_football_bill where r_agent_id like '%*".$rs['r_id']."*%' and b_confirm != 1  and b_accept=1  and b_status!=5 and b_numstep=1  and  b_zone=1   and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
$rs12=sql_array($sql);
if($cb_bx!=""){
$c0=$rs12['t1'];

$c1=$rs12['r1'];
$c2=$rs12['r2']+$rs12['r22'];
$c3=$rs12['r3']+$rs12['r33'];
$c4=$c1+$c2+$c3;

$c5=$rs12['w1'];
$c6=$rs12['w2'];
$c7=$rs12['w3'];
$c8=$c5+$c6+$c7;
}



################################# สเต็ป


$sql="select 
 sum( 
(ROUND(  b_sum ,10))	
   ) as t1 ,

sum(
   	ROUND( 	( b_sum )*(( $keep_share )/100) ,10)
   ) as w1 ,  
sum(
   	ROUND( 	( -br_bonus_".$r_level."  )*(( $keep_share )/100) ,10)
   ) as w3 ,  
  sum(
   	ROUND( 	(-  br_pay_".$r_level.")*(( $keep_share )/100) ,10)
   ) as w2  , 
   sum(
   	ROUND( 	(b_sum)*(($mem_share)/100) ,10)
   ) as r1 ,
   sum(
   	ROUND( 	-(  br_pay_".$r_level.")*(($mem_share)/100) ,10)
   ) as r2  ,
sum(
   	ROUND( ( br_pay_".$ag_level." - br_pay_".$r_level.")	* (( $keep_share )/100) ,10)
   ) as r22     ,
sum(
   	ROUND( 	(  - br_bonus_".$r_level.")*(($mem_share)/100) ,10)
   ) as r3 ,  
sum(
  ROUND( ( br_bonus_".$ag_level." - br_bonus_".$r_level.")	* (( $keep_share )/100) ,10)
   ) as r33 ,  

sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0 and b_numstep>1 THEN ((b_sum * com_af)/100 ) * (( $afm )/100)
	 WHEN bonus_m_id > 0 and b_numstep=1 and b_status=1 THEN ((b_sum * com_af)/100 ) * (( $afm )/100)
	  WHEN bonus_m_id > 0 and b_numstep=1 and b_status=3 THEN ((b_sum * com_af)/100 ) * (( $afm )/100)
    ELSE 0
END
	  ,10)
   ) as afm   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0 and b_numstep>1 THEN ((-b_sum * com_af)/100 ) * (( $afsa )/100)
	 WHEN bonus_m_id > 0 and b_numstep=1 and b_status=1 THEN ((-b_sum * com_af)/100 ) * (( $afsa )/100)
	  WHEN bonus_m_id > 0 and b_numstep=1 and b_status=3 THEN ((-b_sum * com_af)/100 ) * (( $afsa )/100)
    ELSE 0
END
	  ,10)
   ) as afsa
 from bom_tb_football_bill where r_agent_id like '%*".$rs['r_id']."*%' and b_confirm != 1  and b_accept=1  and b_status!=5 and b_numstep>1  and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
$rs13=sql_array($sql);
if($cb_st!=""){
$d0=$rs13['t1'];


$d1=$rs13['r1'];
$d2=$rs13['r2']+$rs13['r22'];
$d3=$rs13['r3']+$rs13['r33'];
$d4=$d1+$d2+$d3;

$d5=$rs13['w1'];
$d6=$rs13['w2'];
$d7=$rs13['w3'];
$d8=$d5+$d6+$d7;
}



################################# หวย

 $sql="select 
 sum( 
(ROUND( 	b_total  ,10))
   ) as t1 ,

sum(
   	ROUND( 	(b_total )*(( $keep_share )/100) ,10)
   ) as w1 ,  
sum(
   	ROUND( 	( - br_bonus_".$r_level."  )*(( $keep_share )/100) ,10)
   ) as w3 ,  
  sum(
   	ROUND( 	(  br_pay_".$r_level."- b_total)*(( $keep_share )/100) ,10)
   ) as w2  ,
    sum(
   	ROUND( 	(b_total)*(($mem_share)/100) ,10)
   ) as r1 ,
sum(
   	ROUND( 	-( b_total - br_pay_".$r_level.")*(($mem_share)/100) ,10)
   ) as r2  ,
sum(
   	ROUND( ( br_pay_".$r_level." - br_pay_".$ag_level.")	* (( $keep_share )/100) ,10)
   ) as r22    ,
   sum(
   	ROUND( 	(  - br_bonus_".$r_level.")*(($mem_share)/100) ,10)
   ) as r3,  
sum(
  ROUND( ( br_bonus_".$ag_level." - br_bonus_".$r_level.")	* (( $keep_share )/100) ,10)
   ) as r33 ,  

sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0 THEN ((b_total * com_af)/100 ) * (( $afm )/100)
    ELSE 0
END
	  ,10)
   ) as afm   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0 THEN ((-b_total * com_af)/100 ) * (( $afsa )/100)
    ELSE 0
END
	  ,10)
   ) as afsa
 from bom_tb_lotto_bill_play where r_agent_id like '%*".$rs['r_id']."*%'  and b_accept=1 and lot_zone=1     and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
$rs2=sql_array($sql);

if($cb_lg!=""){
$e0=$rs2['t1'];

$e1=$rs2['r1'];
$e2=$rs2['r2']+$rs2['r22'];
$e3=$rs2['r3']+$rs2['r33'];
$e4=$e1+$e2+$e3;

$e5=$rs2['w1'];
$e6=$rs2['w2'];
$e7=$rs2['w3'];
$e8=$e5+$e6+$e7;

}

################################# หวยหุ้น
$sql="select 
 sum( 
(ROUND( 	b_total  ,10))
   ) as t1 ,

sum(
   	ROUND( 	(b_total )*(( $keep_share )/100) ,10)
   ) as w1 ,  
sum(
   	ROUND( 	( - br_bonus_".$r_level."  )*(( $keep_share )/100) ,10)
   ) as w3 ,  
  sum(
   	ROUND( 	(  br_pay_".$r_level."- b_total)*(( $keep_share )/100) ,10)
   ) as w2  ,
    sum(
   	ROUND( 	(b_total)*(($mem_share)/100) ,10)
   ) as r1 ,
sum(
   	ROUND( 	-( b_total - br_pay_".$r_level.")*(($mem_share)/100) ,10)
   ) as r2  ,
sum(
   	ROUND( ( br_pay_".$r_level." - br_pay_".$ag_level.")	* (( $keep_share )/100) ,10)
   ) as r22    ,
   sum(
   	ROUND( 	(  - br_bonus_".$r_level.")*(($mem_share)/100) ,10)
   ) as r3,  
sum(
  ROUND( ( br_bonus_".$ag_level." - br_bonus_".$r_level.")	* (( $keep_share )/100) ,10)
   ) as r33 ,  
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0 THEN ((b_total * com_af)/100 ) * (( $afm )/100)
    ELSE 0
END
	  ,10)
   ) as afm   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0 THEN ((-b_total * com_af)/100 ) * (( $afsa )/100)
    ELSE 0
END
	  ,10)
   ) as afsa
 from bom_tb_lotto_bill_play where r_agent_id like '%*".$rs['r_id']."*%'  and b_accept=1 and lot_zone!=1    and lot_type!=31   and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
$rs3=sql_array($sql);
if($cb_ls!=""){
$f0=$rs3['t1'];

$f1=$rs3['r1'];
$f2=$rs3['r2']+$rs3['r22'];
$f3=$rs3['r3']+$rs3['r33'];
$f4=$f1+$f2+$f3;

$f5=$rs3['w1'];
$f6=$rs3['w2'];
$f7=$rs3['w3'];
$f8=$f5+$f6+$f7;
}


################################# หวยชุด
$sql="select 
 sum( 
(ROUND( 	b_total  ,10))
   ) as t1 ,

sum(
   	ROUND( 	(b_total )*(( $keep_share )/100) ,10)
   ) as w1 ,  
sum(
   	ROUND( 	( - br_bonus_".$r_level."  )*(( $keep_share )/100) ,10)
   ) as w3 ,  
  sum(
   	ROUND( 	(  br_pay_".$r_level."- b_total)*(( $keep_share )/100) ,10)
   ) as w2  ,
    sum(
   	ROUND( 	(b_total)*(($mem_share)/100) ,10)
   ) as r1 ,
sum(
   	ROUND( 	-( b_total - br_pay_".$r_level.")*(($mem_share)/100) ,10)
   ) as r2  ,
sum(
   	ROUND( ( br_pay_".$r_level." - br_pay_".$ag_level.")	* (( $keep_share )/100) ,10)
   ) as r22    ,
   sum(
   	ROUND( 	(  - br_bonus_".$r_level.")*(($mem_share)/100) ,10)
   ) as r3,  
sum(
  ROUND( ( br_bonus_".$ag_level." - br_bonus_".$r_level.")	* (( $keep_share )/100) ,10)
   ) as r33 ,  
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0 THEN ((b_total * com_af)/100 ) * (( $afm )/100)
    ELSE 0
END
	  ,10)
   ) as afm   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0 THEN ((-b_total * com_af)/100 ) * (( $afsa )/100)
    ELSE 0
END
	  ,10)
   ) as afsa
 from bom_tb_lotto_bill_play where r_agent_id like '%*".$rs['r_id']."*%'  and b_accept=1 and lot_zone!=1   and lot_type=31    and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
$rs31=sql_array($sql);
if($cb_ll!=""){
$g0=$rs31['t1'];


$g1=$rs31['r1'];
$g2=$rs31['r2']+$rs31['r22'];
$g3=$rs31['r3']+$rs31['r33'];
$g4=$g1+$g2+$g3;

$g5=$rs31['w1'];
$g6=$rs31['w2'];
$g7=$rs31['w3'];
$g8=$g5+$g6+$g7;
}

################################# เกมส์
$sql="select 
 sum( 
(ROUND( 	b_total  ,10))
   ) as t1 ,

sum(
   	ROUND( 	(b_total )*(( $keep_share )/100) ,10)
   ) as w1 ,  
sum(
   	ROUND( 	( - br_bonus_".$r_level."  )*(( $keep_share )/100) ,10)
   ) as w3 ,  
  sum(
   	ROUND( 	(  br_pay_".$r_level."- b_total)*(( $keep_share )/100) ,10)
   ) as w2  ,
    sum(
   	ROUND( 	(b_total)*(($mem_share)/100) ,10)
   ) as r1 ,
sum(
   	ROUND( 	-( b_total - br_pay_".$r_level.")*(($mem_share)/100) ,10)
   ) as r2  ,
sum(
   	ROUND( ( br_pay_".$r_level." - br_pay_".$ag_level.")	* (( $keep_share )/100) ,10)
   ) as r22    ,
   sum(
   	ROUND( 	(  - br_bonus_".$r_level.")*(($mem_share)/100) ,10)
   ) as r3,  
sum(
  ROUND( ( br_bonus_".$ag_level." - br_bonus_".$r_level.")	* (( $keep_share )/100) ,10)
   ) as r33 ,  
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0 THEN ((b_total * com_af)/100 ) * (( $afm )/100)
    ELSE 0
END
	  ,10)
   ) as afm   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0 THEN ((-b_total * com_af)/100 ) * (( $afsa )/100)
    ELSE 0
END
	  ,10)
   ) as afsa
 from bom_tb_games_bill_play where r_agent_id like '%*".$rs['r_id']."*%'  and b_accept=1     and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate'  ";
$rs4=sql_array($sql);#and play_id=688
if($cb_gm!=""){
$h0=$rs4['t1'];


$h1=$rs4['r1'];
$h2=$rs4['r2']+$rs4['r22'];
$h3=$rs4['r3']+$rs4['r33'];
$h4=$h1+$h2+$h3;

$h5=$rs4['w1'];
$h6=$rs4['w2'];
$h7=$rs4['w3'];
$h8=$h5+$h6+$h7;
}

################################# คาสิโน
$sql="select 
 sum( 
(ROUND( 	b_total  ,10))
   ) as t1 ,

sum(
   	ROUND( 	(b_total )*(( $keep_share )/100) ,10)
   ) as w1 ,  
sum(
   	ROUND( 	( - br_bonus_".$r_level."  )*(( $keep_share )/100) ,10)
   ) as w3 ,  
  sum(
   	ROUND( 	(  br_pay_".$r_level."- b_total)*(( $keep_share )/100) ,10)
   ) as w2  ,
   
    sum(
   	ROUND( 	(b_total)*(($mem_share)/100) ,10)
   ) as r1 ,
sum(
   	ROUND( 	-( b_total - br_pay_".$r_level.")*(($mem_share)/100) ,10)
   ) as r2  ,
sum(
   	ROUND( ( br_pay_".$r_level." - br_pay_".$ag_level.")	* (( $keep_share )/100) ,10)
   ) as r22    ,
   sum(
   	ROUND( 	(  - br_bonus_".$r_level.")*(($mem_share)/100) ,10)
   ) as r3,  
sum(
  ROUND( ( br_bonus_".$ag_level." - br_bonus_".$r_level.")	* (( $keep_share )/100) ,10)
   ) as r33 ,  
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0 THEN ((b_total * com_af)/100 ) * (( $afm )/100)
    ELSE 0
END
	  ,10)
   ) as afm   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0 THEN ((-b_total * com_af)/100 ) * (( $afsa )/100)
    ELSE 0
END
	  ,10)
   ) as afsa
 from bom_tb_casino_bill_play where r_agent_id like '%*".$rs['r_id']."*%'  and b_accept=1     and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate'  ";
$rs5=sql_array($sql);
if($cb_cn!=""){
$i0=$rs5['t1'];


$i1=$rs5['r1'];
$i2=$rs5['r2']+$rs5['r22'];
$i3=$rs5['r3']+$rs5['r33'];
$i4=$i1+$i2+$i3;

$i5=$rs5['w1'];
$i6=$rs5['w2'];
$i7=$rs5['w3'];
$i8=$i5+$i6+$i7;
}

##############AF#######
if($cb_suggest!=""){
$sumafm=($rs1['afm']+$rs11['afm']+$rs12['afm']+$rs13['afm'])+($rs2['afm']+$rs3['afm']+$rs31['afm'])+$rs4['afm']+$rs5['afm'];
$sumafr=($rs1['afr']+$rs11['afr']+$rs12['afr']+$rs13['afr'])+($rs2['afr']+$rs3['afr']+$rs31['afr'])+$rs4['afr']+$rs5['afr'];
$sunafsa=($rs1['afsa']+$rs11['afsa']+$rs12['afsa']+$rs13['afsa'])+($rs2['afsa']+$rs3['afsa']+$rs31['afsa'])+$rs4['afsa']+$rs5['afsa'];
}

// ##################################### *100
// $sum0=(($a0+$b0+$c0+$d0)+($e0+$f0+$g0)+$h0+$i0)*100;

// $sum1=(($a1+$b1+$c1+$d1)+($e1+$f1+$g1)+$h1+$i1)*100;
// $sum2=(($a2+$b2+$c2+$d2)+($e2+$f2+$g2)+$h2+$i2+$sumafr+$sumafm)*100;
// $sum3=(($a3+$b3+$c3+$d3)+($e3+$f3+$g3)+$h3+$i3)*100;
// $sum4=(($a4+$b4+$c4+$d4)+($e4+$f4+$g4)+$h4+$i4)*100;

// $sum5=(($a5+$b5+$c5+$d5)+($e5+$f5+$g5)+$h5+$i5)*100;
// $sum6=(($a6+$b6+$c6+$d6)+($e6+$f6+$g6)+$h6+$i6+$sunafsa)*100;
// $sum7=(($a7+$b7+$c7+$d7)+($e7+$f7+$g7)+$h7+$i7)*100;
// $sum8=(($a8+$b8+$c8+$d8)+($e8+$f8+$g8)+$h8+$i8)*100;

#####################################
$sum0=(($a0+$b0+$c0+$d0)+($e0+$f0+$g0)+$h0+$i0);

$sum1=(($a1+$b1+$c1+$d1)+($e1+$f1+$g1)+$h1+$i1);
$sum2=(($a2+$b2+$c2+$d2)+($e2+$f2+$g2)+$h2+$i2+$sumafr+$sumafm);
$sum3=(($a3+$b3+$c3+$d3)+($e3+$f3+$g3)+$h3+$i3);
$sum4=(($a4+$b4+$c4+$d4)+($e4+$f4+$g4)+$h4+$i4);

$sum5=(($a5+$b5+$c5+$d5)+($e5+$f5+$g5)+$h5+$i5);
$sum6=(($a6+$b6+$c6+$d6)+($e6+$f6+$g6)+$h6+$i6+$sunafsa);
$sum7=(($a7+$b7+$c7+$d7)+($e7+$f7+$g7)+$h7+$i7);
$sum8=(($a8+$b8+$c8+$d8)+($e8+$f8+$g8)+$h8+$i8);


/*$sum0=($a0+$b0+$c0+$d0)+($e0+$f0+$g0)+$h0+$i0;

$sum1=($a1+$b1+$c1+$d1)+($e1+$f1+$g1)+$h1+$i1;
$sum2=($a2+$b2+$c2+$d2)+($e2+$f2+$g2)+$h2+$i2+$sumafr+$sumafm;
$sum3=($a3+$b3+$c3+$d3)+($e3+$f3+$g3)+$h3+$i3;
$sum4=($a4+$b4+$c4+$d4)+($e4+$f4+$g4)+$h4+$i4;

$sum5=($a5+$b5+$c5+$d5)+($e5+$f5+$g5)+$h5+$i5;
$sum6=($a6+$b6+$c6+$d6)+($e6+$f6+$g6)+$h6+$i6+$sunafsa;
$sum7=($a7+$b7+$c7+$d7)+($e7+$f7+$g7)+$h7+$i7;
$sum8=($a8+$b8+$c8+$d8)+($e8+$f8+$g8)+$h8+$i8;*/

#$sum3=($mm2a+$mm2a1+$mm2a2+$mm2a3)+($mm2b+$mm2c+$mm2c1)+$mm2d+$mm2e;
#$sum4=($mm3a+$mm3a1+$mm3a2+$mm3a3)+($mm3b+$mm3c+$mm3c1)+$mm3d+$mm3e;
#$sum33=($mm1a+$mm1a1+$mm1a2+$mm1a3)+($mm1b+$mm1c+$mm1c1)+$mm1d+$mm1e;
#$sum5=($mm5a+$mm5a1+$mm5a2+$mm5a3)+($mm5b+$mm5c+$mm5c1)+$mm5d+$mm5e;

#$sum66=($m1a+$m1a1+$m1a2+$m1a3)+($m1b+$m1c+$m1c1)+$m1d+$m1e;
#$sum6=($m1a+$m1a1+$m1a2+$m1a3)+($m1b+$m1c+$m1c1)+$m1d+$m1e;
#$sum7=($m2a+$m2a1+$m2a2+$m2a3)+($m2b+$m2c+$m2c1)+$m2d+$m2e;
#$sum8=($m3a+$m3a1+$m3a2+$m3a3)+($m3b+$m3c+$m3c1)+$m3d+$m3e;

#$sum9=-($sum4+$sum7+$sunafsa);
#$sum10=-($sum5+$sum8);


?>


