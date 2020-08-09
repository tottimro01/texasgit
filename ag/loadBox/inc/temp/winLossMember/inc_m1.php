<?php 
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
   	ROUND( 	(b_sum)*((b_myshare_".$ag_level.")/100) ,10)
   ) as r1 ,
sum(
   	ROUND( 	( br_bonus_".$r_level." - b_sum )*(( $mem_share )/100) ,10)
   ) as m2 ,  
  sum(
   	ROUND( 	(  br_pay_".$r_level.")*(( $mem_share )/100) ,10)
   ) as m3  , 
sum(
   	ROUND( 	( b_sum - br_bonus_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as r2 ,  
sum(
  ROUND( ( br_bonus_".$ag_level." - br_bonus_".$r_level.")	* (( $keep_share )/100) ,10)
   ) as r22 ,  
sum(
   	ROUND( 	-(  br_pay_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as r3  ,
sum(
    	ROUND( ( br_pay_".$ag_level." - br_pay_".$r_level.")	* (( $keep_share )/100) ,10)
   ) as r33     ,
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
    WHEN bonus_m_id > 0 and b_numstep>1 THEN ((-b_sum * com_af)/100 ) * (( $afr )/100)
	 WHEN bonus_m_id > 0 and b_numstep=1 and b_status=1 THEN ((-b_sum * com_af)/100 ) * (( $afr )/100)
	  WHEN bonus_m_id > 0 and b_numstep=1 and b_status=3 THEN ((-b_sum * com_af)/100 ) * (( $afr )/100)
    ELSE 0
END
	  ,10)
   ) as afr   ,
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
 from bom_tb_football_bill where r_agent_id like '%*".$rs['r_id']."*%'  and b_accept=1  and b_status!=5 and b_numstep=1 and  b_zone=6   and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
$rs1=sql_array($sql);
if($sc!=""){
$s1a=$rs1['t1'];
$r1a=$rs1['r1'];

$mm2a=$rs1['m2'];
$mm3a=$rs1['m3'];
$mm5a=$mm2a+$mm3a;

$m1a=$rs1['r2']+$rs1['r22'];
$m2a=$rs1['r3']+$rs1['r33'];
$m3a=$m1a+$m2a;
}

################################# กีฬา


$sql="select 
 sum( 
(ROUND(  b_sum ,10))	
   ) as t1 ,
sum(
   	ROUND( 	(b_sum)*((b_myshare_".$ag_level.")/100) ,10)
   ) as r1 ,
sum(
   	ROUND( 	( br_bonus_".$r_level." - b_sum )*(( $mem_share )/100) ,10)
   ) as m2 ,  
  sum(
   	ROUND( 	(  br_pay_".$r_level.")*(( $mem_share )/100) ,10)
   ) as m3  , 
sum(
   	ROUND( 	( b_sum - br_bonus_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as r2 ,  
sum(
  ROUND( ( br_bonus_".$ag_level." - br_bonus_".$r_level.")	* (( $keep_share )/100) ,10)
   ) as r22 ,  
sum(
   	ROUND( 	-(  br_pay_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as r3  ,
sum(
     	ROUND( ( br_pay_".$ag_level." - br_pay_".$r_level.")	* (( $keep_share )/100) ,10)
   ) as r33     ,
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
    WHEN bonus_m_id > 0 and b_numstep>1 THEN ((-b_sum * com_af)/100 ) * (( $afr )/100)
	 WHEN bonus_m_id > 0 and b_numstep=1 and b_status=1 THEN ((-b_sum * com_af)/100 ) * (( $afr )/100)
	  WHEN bonus_m_id > 0 and b_numstep=1 and b_status=3 THEN ((-b_sum * com_af)/100 ) * (( $afr )/100)
    ELSE 0
END
	  ,10)
   ) as afr   ,
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
 from bom_tb_football_bill where r_agent_id like '%*".$rs['r_id']."*%'  and b_accept=1  and b_status!=5 and b_numstep=1 and  b_zone!=6 and  b_zone!=1  and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
$rs11=sql_array($sql);
if($sp!=""){
$s1a1=$rs11['t1'];
$r1a1=$rs11['r1'];

$mm2a1=$rs11['m2'];
$mm3a1=$rs11['m3'];
$mm5a1=$mm2a1+$mm3a1;

$m1a1=$rs11['r2']+$rs11['r22'];
$m2a1=$rs11['r3']+$rs11['r33'];
$m3a1=$m1a1+$m2a1;
}




################################# มวย


$sql="select 
 sum( 
(ROUND(  b_sum ,10))	
   ) as t1 ,
sum(
   	ROUND( 	(b_sum)*((b_myshare_".$ag_level.")/100) ,10)
   ) as r1 ,
sum(
   	ROUND( 	( br_bonus_".$r_level." - b_sum )*(( $mem_share )/100) ,10)
   ) as m2 ,  
  sum(
   	ROUND( 	(  br_pay_".$r_level.")*(( $mem_share )/100) ,10)
   ) as m3  , 
sum(
   	ROUND( 	( b_sum - br_bonus_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as r2 ,  
sum(
  ROUND( ( br_bonus_".$ag_level." - br_bonus_".$r_level.")	* (( $keep_share )/100) ,10)
   ) as r22 ,  
sum(
   	ROUND( 	-(  br_pay_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as r3  ,
sum(
     	ROUND( ( br_pay_".$ag_level." - br_pay_".$r_level.")	* (( $keep_share )/100) ,10)
   ) as r33     ,
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
    WHEN bonus_m_id > 0 and b_numstep>1 THEN ((-b_sum * com_af)/100 ) * (( $afr )/100)
	 WHEN bonus_m_id > 0 and b_numstep=1 and b_status=1 THEN ((-b_sum * com_af)/100 ) * (( $afr )/100)
	  WHEN bonus_m_id > 0 and b_numstep=1 and b_status=3 THEN ((-b_sum * com_af)/100 ) * (( $afr )/100)
    ELSE 0
END
	  ,10)
   ) as afr   ,
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
 from bom_tb_football_bill where r_agent_id like '%*".$rs['r_id']."*%'  and b_accept=1  and b_status!=5 and b_numstep=1  and  b_zone=1   and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
$rs12=sql_array($sql);
if($bx!=""){
$s1a2=$rs12['t1'];
$r1a2=$rs12['r1'];

$mm2a2=$rs12['m2'];
$mm3a2=$rs12['m3'];
$mm5a2=$mm2a2+$mm3a2;

$m1a2=$rs12['r2']+$rs12['r22'];
$m2a2=$rs12['r3']+$rs12['r33'];
$m3a2=$m1a2+$m2a2;
}



################################# สเต็ป


$sql="select 
 sum( 
(ROUND(  b_sum ,10))	
   ) as t1 ,
sum(
   	ROUND( 	(b_sum)*((b_myshare_".$ag_level.")/100) ,10)
   ) as r1 ,
sum(
   	ROUND( 	( br_bonus_".$r_level." - b_sum )*(( $mem_share )/100) ,10)
   ) as m2 ,  
  sum(
   	ROUND( 	(  br_pay_".$r_level.")*(( $mem_share )/100) ,10)
   ) as m3  , 
sum(
   	ROUND( 	( b_sum - br_bonus_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as r2 ,  
sum(
  ROUND( ( br_bonus_".$ag_level." - br_bonus_".$r_level.")	* (( $keep_share )/100) ,10)
   ) as r22 ,  
sum(
   	ROUND( 	-(  br_pay_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as r3  ,
sum(
   	ROUND( ( br_pay_".$ag_level." - br_pay_".$r_level.")	* (( $keep_share )/100) ,10)
   ) as r33     ,
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
    WHEN bonus_m_id > 0 and b_numstep>1 THEN ((-b_sum * com_af)/100 ) * (( $afr )/100)
	 WHEN bonus_m_id > 0 and b_numstep=1 and b_status=1 THEN ((-b_sum * com_af)/100 ) * (( $afr )/100)
	  WHEN bonus_m_id > 0 and b_numstep=1 and b_status=3 THEN ((-b_sum * com_af)/100 ) * (( $afr )/100)
    ELSE 0
END
	  ,10)
   ) as afr   ,
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
 from bom_tb_football_bill where r_agent_id like '%*".$rs['r_id']."*%'  and b_accept=1  and b_status!=5 and b_numstep>1  and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
$rs13=sql_array($sql);
if($st!=""){
$s1a3=$rs13['t1'];
$r1a3=$rs13['r1'];

$mm2a3=$rs13['m2'];
$mm3a3=$rs13['m3'];
$mm5a3=$mm2a3+$mm3a3;

$m1a3=$rs13['r2']+$rs13['r22'];
$m2a3=$rs13['r3']+$rs13['r33'];
$m3a3=$m1a3+$m2a3;
}



################################# หวย

$sql="select 
 sum( 
(ROUND( 	b_total  ,10))
   ) as t1 ,
sum(
   	ROUND( 	(b_total)*((b_myshare_".$ag_level.")/100) ,10)
   ) as r1 ,
sum(
   	ROUND( 	( br_bonus_".$r_level." - b_total )*(( $mem_share )/100) ,10)
   ) as m2 ,  
  sum(
   	ROUND( 	( b_total - br_pay_".$r_level.")*(( $mem_share )/100) ,10)
   ) as m3  , 
sum(
   	ROUND( 	( b_total - br_bonus_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as r2 ,  
sum(
  ROUND( ( br_bonus_".$ag_level." - br_bonus_".$r_level.")	* (( $keep_share )/100) ,10)
   ) as r22 ,  
sum(
   	ROUND( 	-( b_total - br_pay_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as r3  ,
sum(
   	ROUND( ( br_pay_".$r_level." - br_pay_".$ag_level.")	* (( $keep_share )/100) ,10)
   ) as r33    ,
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
    WHEN bonus_m_id > 0 THEN ((-b_total * com_af)/100 ) * (( $afr )/100)
    ELSE 0
END
	  ,10)
   ) as afr   ,
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

if($lg!=""){
$s1b=$rs2['t1'];
$r1b=$rs2['r1'];

$mm2b=$rs2['m2'];
$mm3b=$rs2['m3'];
$mm5b=$mm2b+$mm3b;

$m1b=$rs2['r2']+$rs2['r22'];
$m2b=$rs2['r3']+$rs2['r33'];
$m3b=$m1b+$m2b;
}

################################# หวยหุ้น
$sql="select 
 sum( 
(ROUND( 	b_total  ,10))
   ) as t1 ,
sum(
   	ROUND( 	(b_total)*((b_myshare_".$ag_level.")/100) ,10)
   ) as r1 ,
sum(
   	ROUND( 	( br_bonus_".$r_level." - b_total )*(( $mem_share )/100) ,10)
   ) as m2 ,  
  sum(
   	ROUND( 	( b_total - br_pay_".$r_level.")*(( $mem_share )/100) ,10)
   ) as m3  , 
sum(
   	ROUND( 	( b_total - br_bonus_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as r2 ,  
sum(
  ROUND( ( br_bonus_".$ag_level." - br_bonus_".$r_level.")	* (( $keep_share )/100) ,10)
   ) as r22 ,  
sum(
   	ROUND( 	-( b_total - br_pay_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as r3  ,
sum(
   	ROUND( ( br_pay_".$r_level." - br_pay_".$ag_level.")	* (( $keep_share )/100) ,10)
   ) as r33  ,
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
    WHEN bonus_m_id > 0 THEN ((-b_total * com_af)/100 ) * (( $afr )/100)
    ELSE 0
END
	  ,10)
   ) as afr   ,
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
if($ls!=""){
$s1c=$rs3['t1'];
$r1c=$rs3['r1'];

$mm2c=$rs3['m2'];
$mm3c=$rs3['m3'];
$mm5c=$mm2c+$mm3c;

$m1c=$rs3['r2']+$rs3['r22'];
$m2c=$rs3['r3']+$rs3['r33'];
$m3c=$m1c+$m2c;
}


################################# หวยชุด
$sql="select 
 sum( 
(ROUND( 	b_total  ,10))
   ) as t1 ,
sum(
   	ROUND( 	(b_total)*((b_myshare_".$ag_level.")/100) ,10)
   ) as r1 ,
sum(
   	ROUND( 	( br_bonus_".$r_level." - b_total )*(( $mem_share )/100) ,10)
   ) as m2 ,  
  sum(
   	ROUND( 	( b_total - br_pay_".$r_level.")*(( $mem_share )/100) ,10)
   ) as m3  , 
sum(
   	ROUND( 	( b_total - br_bonus_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as r2 ,  
sum(
  ROUND( ( br_bonus_".$ag_level." - br_bonus_".$r_level.")	* (( $keep_share )/100) ,10)
   ) as r22 ,  
sum(
   	ROUND( 	-( b_total - br_pay_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as r3  ,
sum(
   	ROUND( ( br_pay_".$r_level." - br_pay_".$ag_level.")	* (( $keep_share )/100) ,10)
   ) as r33  ,
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
    WHEN bonus_m_id > 0 THEN ((-b_total * com_af)/100 ) * (( $afr )/100)
    ELSE 0
END
	  ,10)
   ) as afr   ,
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
if($ll!=""){
$s1c1=$rs31['t1'];
$r1c1=$rs31['r1'];

$mm2c1=$rs31['m2'];
$mm3c1=$rs31['m3'];
$mm5c1=$mm2c1+$mm3c1;

$m1c1=$rs31['r2']+$rs31['r22'];
$m2c1=$rs31['r3']+$rs31['r33'];
$m3c1=$m1c1+$m2c1;
}

################################# เกมส์
$sql="select 
 sum( 
(ROUND( 	b_total  ,10))
   ) as t1 ,
sum(
   	ROUND( 	(b_total)*((b_myshare_".$ag_level.")/100) ,10)
   ) as r1 ,
sum(
   	ROUND( 	( br_bonus_".$r_level." - b_total )*(( $mem_share )/100) ,10)
   ) as m2 ,  
  sum(
   	ROUND( 	( b_total - br_pay_".$r_level.")*(( $mem_share )/100) ,10)
   ) as m3  , 
sum(
   	ROUND( 	( b_total - br_bonus_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as r2 ,  
sum(
  ROUND( ( br_bonus_".$ag_level." - br_bonus_".$r_level.")	* (( $keep_share )/100) ,10)
   ) as r22 ,  
sum(
   	ROUND( 	-( b_total - br_pay_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as r3  ,
sum(
   	ROUND( ( br_pay_".$r_level." - br_pay_".$ag_level.")	* (( $keep_share )/100) ,10)
   ) as r33  
 from bom_tb_games_bill_play where r_agent_id like '%*".$rs['r_id']."*%'  and b_accept=1    and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate'  ";
$rs4=sql_array($sql);
if($gm!=""){
$s1d=$rs4['t1'];
$r1d=$rs4['r1'];

$mm2d=$rs4['m2'];
$mm3d=$rs4['m3'];
$mm5d=$mm2d+$mm3d;

$m1d=$rs4['r2']+$rs4['r22'];
$m2d=$rs4['r3']+$rs4['r33'];
$m3d=$m1d+$m2d;
}

################################# คาสิโน
$sql="select 
 sum( 
(ROUND( 	b_total  ,10))
   ) as t1 ,
sum(
   	ROUND( 	(b_total)*((b_myshare_".$ag_level.")/100) ,10)
   ) as r1 ,
sum(
   	ROUND( 	( br_bonus_".$r_level." - b_total )*(( $mem_share )/100) ,10)
   ) as m2 ,  
  sum(
   	ROUND( 	( b_total - br_pay_".$r_level.")*(( $mem_share )/100) ,10)
   ) as m3  , 
sum(
   	ROUND( 	( b_total - br_bonus_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as r2 ,  
sum(
  ROUND( ( br_bonus_".$ag_level." - br_bonus_".$r_level.")	* (( $keep_share )/100) ,10)
   ) as r22 ,  
sum(
   	ROUND( 	-( b_total - br_pay_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as r3  ,
sum(
   	ROUND( ( br_pay_".$r_level." - br_pay_".$ag_level.")	* (( $keep_share )/100) ,10)
   ) as r33    ,
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
    WHEN bonus_m_id > 0 THEN ((-b_total * com_af)/100 ) * (( $afr )/100)
    ELSE 0
END
	  ,10)
   ) as afr   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0 THEN ((-b_total * com_af)/100 ) * (( $afsa )/100)
    ELSE 0
END
	  ,10)
   ) as afsa
 from bom_tb_casino_bill_play where r_agent_id like '%*".$rs['r_id']."*%'  and b_accept=1     and  play_datenow BETWEEN '$edate' and '$ddate'";
$rs5=sql_array($sql);
if($cn!=""){
$s1e=$rs5['t1'];
$r1e=$rs5['r1'];

$mm2e=$rs5['m2'];
$mm3e=$rs5['m3'];
$mm5e=$mm2e+$mm3e;

$m1e=$rs5['r2']+$rs5['r22'];
$m2e=$rs5['r3']+$rs5['r33'];
$m3e=$m1e+$m2e;
}

##############AF#######
if($af!=""){
$sumafm=($rs1['afm']+$rs11['afm']+$rs12['afm']+$rs13['afm'])+($rs2['afm']+$rs3['afm']+$rs31['afm'])+$rs4['afm']+$rs5['afm'];
$sumafr=($rs1['afr']+$rs11['afr']+$rs12['afr']+$rs13['afr'])+($rs2['afr']+$rs3['afr']+$rs31['afr'])+$rs4['afr']+$rs5['afr'];
$sunafsa=($rs1['afsa']+$rs11['afsa']+$rs12['afsa']+$rs13['afsa'])+($rs2['afsa']+$rs3['afsa']+$rs31['afsa'])+$rs4['afsa']+$rs5['afsa'];
}

#####################################
$sum1=($s1a+$s1a1+$s1a2+$s1a3)+($s1b+$s1c+$s1c1)+$s1d+$s1e;
$sum2=($r1a+$r1a1+$r1a2+$r1a3)+($r1b+$r1c+$r1c1)+$r1d+$r1e;

$sum3=($mm2a+$mm2a1+$mm2a2+$mm2a3)+($mm2b+$mm2c+$mm2c1)+$mm2d+$mm2e;
$sum4=($mm3a+$mm3a1+$mm3a2+$mm3a3)+($mm3b+$mm3c+$mm3c1)+$mm3d+$mm3e+$sumafm;
$sum5=($mm5a+$mm5a1+$mm5a2+$mm5a3)+($mm5b+$mm5c+$mm5c1)+$mm5d+$mm5e;

$sum6=($m1a+$m1a1+$m1a2+$m1a3)+($m1b+$m1c+$m1c1)+$m1d+$m1e;
$sum7=($m2a+$m2a1+$m2a2+$m2a3)+($m2b+$m2c+$m2c1)+$m2d+$m2e+$sumafr;
$sum8=($m3a+$m3a1+$m3a2+$m3a3)+($m3b+$m3c+$m3c1)+$m3d+$m3e;

$sum9=-($sum4+$sum7+$sunafsa);
$sum10=-($sum5+$sum8);


?>


