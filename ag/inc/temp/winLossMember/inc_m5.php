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

if($value=="sc"){

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
   	ROUND( 	-( b_pay)*((b_share_m)/100) ,10)
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
   	ROUND( 	(  - br_pay_".$ag_level." )*(( $keep_share )/100) ,10)
   ) as w2  ,    
sum(
   	ROUND( 	(  b_sum - br_bonus_".$ag_level."  )*(( $keep_share )/100) ,10)
   ) as w3 ,    
   
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0  and b_numstep>1  THEN ((b_sum * com_af)/100 )
	 WHEN bonus_m_id > 0 and b_numstep=1 and b_status=1 THEN  ((b_sum * com_af)/100 )
	  WHEN bonus_m_id > 0 and b_numstep=1 and b_status=3 THEN  ((b_sum * com_af)/100 )
    ELSE 0
END
	  ,10)
   ) as afm   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0   and b_numstep>1   THEN ((-b_sum * com_af)/100 ) * ((b_share_m)/100)
	 WHEN bonus_m_id > 0 and b_numstep=1 and b_status=1 THEN  ((-b_sum * com_af)/100 ) * ((b_share_m)/100)
	  WHEN bonus_m_id > 0 and b_numstep=1 and b_status=3 THEN  ((-b_sum * com_af)/100 ) * ((b_share_m)/100)
    ELSE 0
END
	  ,10)
   ) as afr   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0   and b_numstep>1   THEN ((-b_sum * com_af)/100 ) * (( 100 - ( b_share_m ))/100)
	 WHEN bonus_m_id > 0 and b_numstep=1 and b_status=1 THEN  ((-b_sum * com_af)/100 ) * (( 100 - ( b_share_m ))/100)
	  WHEN bonus_m_id > 0 and b_numstep=1 and b_status=3 THEN  ((-b_sum * com_af)/100 ) * (( 100 - ( b_share_m ))/100)
    ELSE 0
END
	  ,10)
   ) as afsa 
 from bom_tb_football_bill where m_id = '".$rs_m['m_id']."'  and b_accept=1  and b_status!=5    and b_zone=6    and b_numstep=1   and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
$rs0=sql_array($sql);

if($af!=""){
$sumafm=$rs0['afm'];
$sumafr=$rs0['afr'];
$sunafsa=$rs0['afsa'];
}


$a0=$rs0['t1'];

$a1=$rs0['m2'];
$a2=$rs0['m2'];
$a3=$rs0['m3'];

$a5=$rs0['r1'];
$a6=$rs0['r2'];
$a66=$rs0['r22'];
$a7=$rs0['r3'];
$a77=$rs0['r33'];

$a9=$rs0['w2'];
$a10=$rs0['w3'];

	
$sum0=$a0;
$sum0af=$sumafm+$sumafr+$sunafsa;

$sum1=$a1;
$sum2=$a2+$sumafm;
$sum3=$a3;
$sum4=$sum1+$sum2+$sum3;

$sum5=$a5;
$sum6=$a6+$a66+$sumafr;
$sum7=$a7+$a77;
$sum8=$sum5+$sum6+$sum7;

$sum9=$a9+$sunafsa;
$sum10=$a10+$sum9;


}


if($value=="sp"){

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
   	ROUND( 	-( b_pay)*((b_share_m)/100) ,10)
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
   	ROUND( 	(  - br_pay_".$ag_level." )*(( $keep_share )/100) ,10)
   ) as w2  ,    
sum(
   	ROUND( 	(  b_sum - br_bonus_".$ag_level."  )*(( $keep_share )/100) ,10)
   ) as w3 ,    
   
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0  and b_numstep>1  THEN ((b_sum * com_af)/100 )
	 WHEN bonus_m_id > 0 and b_numstep=1 and b_status=1 THEN  ((b_sum * com_af)/100 )
	  WHEN bonus_m_id > 0 and b_numstep=1 and b_status=3 THEN  ((b_sum * com_af)/100 )
    ELSE 0
END
	  ,10)
   ) as afm   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0   and b_numstep>1   THEN ((-b_sum * com_af)/100 ) * ((b_share_m)/100)
	 WHEN bonus_m_id > 0 and b_numstep=1 and b_status=1 THEN  ((-b_sum * com_af)/100 ) * ((b_share_m)/100)
	  WHEN bonus_m_id > 0 and b_numstep=1 and b_status=3 THEN  ((-b_sum * com_af)/100 ) * ((b_share_m)/100)
    ELSE 0
END
	  ,10)
   ) as afr   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0   and b_numstep>1   THEN ((-b_sum * com_af)/100 ) * (( 100 - ( b_share_m ))/100)
	 WHEN bonus_m_id > 0 and b_numstep=1 and b_status=1 THEN  ((-b_sum * com_af)/100 ) * (( 100 - ( b_share_m ))/100)
	  WHEN bonus_m_id > 0 and b_numstep=1 and b_status=3 THEN  ((-b_sum * com_af)/100 ) * (( 100 - ( b_share_m ))/100)
    ELSE 0
END
	  ,10)
   ) as afsa 
 from bom_tb_football_bill where m_id = '".$rs_m['m_id']."'  and b_accept=1  and b_status!=5    and b_zone!=1   and b_zone!=6    and b_numstep=1  and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
$rs1=sql_array($sql);

if($af!=""){
$sumafm=$rs1['afm'];
$sumafr=$rs1['afr'];
$sunafsa=$rs1['afsa'];
	}


$a0=$rs1['t1'];

$a1=$rs1['m1'];
$a2=$rs1['m2'];
$a3=$rs1['m3'];

$a5=$rs1['r1'];
$a6=$rs1['r2'];
$a66=$rs1['r22'];
$a7=$rs1['r3'];
$a77=$rs1['r33'];

$a9=$rs1['w2'];
$a10=$rs1['w3'];

	
$sum0=$a0;
$sum0af=$sumafm+$sumafr+$sunafsa;

$sum1=$a1;
$sum2=$a2+$sumafm;
$sum3=$a3;
$sum4=$sum1+$sum2+$sum3;

$sum5=$a5;
$sum6=$a6+$a66+$sumafr;
$sum7=$a7+$a77;
$sum8=$sum5+$sum6+$sum7;

$sum9=$a9+$sunafsa;
$sum10=$a10+$sum9;


}



if($value=="bx"){
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
   	ROUND( 	-( b_pay)*((b_share_m)/100) ,10)
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
   	ROUND( 	(  - br_pay_".$ag_level." )*(( $keep_share )/100) ,10)
   ) as w2  ,    
sum(
   	ROUND( 	(  b_sum - br_bonus_".$ag_level."  )*(( $keep_share )/100) ,10)
   ) as w3 ,    
   
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0  and b_numstep>1  THEN ((b_sum * com_af)/100 )
	 WHEN bonus_m_id > 0 and b_numstep=1 and b_status=1 THEN  ((b_sum * com_af)/100 )
	  WHEN bonus_m_id > 0 and b_numstep=1 and b_status=3 THEN  ((b_sum * com_af)/100 )
    ELSE 0
END
	  ,10)
   ) as afm   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0   and b_numstep>1   THEN ((-b_sum * com_af)/100 ) * ((b_share_m)/100)
	 WHEN bonus_m_id > 0 and b_numstep=1 and b_status=1 THEN  ((-b_sum * com_af)/100 ) * ((b_share_m)/100)
	  WHEN bonus_m_id > 0 and b_numstep=1 and b_status=3 THEN  ((-b_sum * com_af)/100 ) * ((b_share_m)/100)
    ELSE 0
END
	  ,10)
   ) as afr   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0   and b_numstep>1   THEN ((-b_sum * com_af)/100 ) * (( 100 - ( b_share_m ))/100)
	 WHEN bonus_m_id > 0 and b_numstep=1 and b_status=1 THEN  ((-b_sum * com_af)/100 ) * (( 100 - ( b_share_m ))/100)
	  WHEN bonus_m_id > 0 and b_numstep=1 and b_status=3 THEN  ((-b_sum * com_af)/100 ) * (( 100 - ( b_share_m ))/100)
    ELSE 0
END
	  ,10)
   ) as afsa 
 from bom_tb_football_bill where m_id = '".$rs_m['m_id']."'  and b_accept=1  and b_status!=5  and b_zone=1   and b_numstep=1     and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
$rs2=sql_array($sql);

if($af!=""){
$sumafm=$rs2['afm'];
$sumafr=$rs2['afr'];
$sunafsa=$rs2['afsa'];
	}


$a0=$rs2['t1'];

$a1=$rs2['m1'];
$a2=$rs2['m2'];
$a3=$rs2['m3'];

$a5=$rs2['r1'];
$a6=$rs2['r2'];
$a66=$rs2['r22'];
$a7=$rs2['r3'];
$a77=$rs2['r33'];

$a9=$rs2['w2'];
$a10=$rs2['w3'];

	
$sum0=$a0;
$sum0af=$sumafm+$sumafr+$sunafsa;

$sum1=$a1;
$sum2=$a2+$sumafm;
$sum3=$a3;
$sum4=$sum1+$sum2+$sum3;

$sum5=$a5;
$sum6=$a6+$a66+$sumafr;
$sum7=$a7+$a77;
$sum8=$sum5+$sum6+$sum7;

$sum9=$a9+$sunafsa;
$sum10=$a10+$sum9;

}



if($value=="st"){
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
   	ROUND( 	-( b_pay)*((b_share_m)/100) ,10)
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
   	ROUND( 	(  - br_pay_".$ag_level." )*(( $keep_share )/100) ,10)
   ) as w2  ,    
sum(
   	ROUND( 	(  b_sum - br_bonus_".$ag_level."  )*(( $keep_share )/100) ,10)
   ) as w3 ,    
   
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0  and b_numstep>1  THEN ((b_sum * com_af)/100 )
	 WHEN bonus_m_id > 0 and b_numstep=1 and b_status=1 THEN  ((b_sum * com_af)/100 )
	  WHEN bonus_m_id > 0 and b_numstep=1 and b_status=3 THEN  ((b_sum * com_af)/100 )
    ELSE 0
END
	  ,10)
   ) as afm   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0   and b_numstep>1   THEN ((-b_sum * com_af)/100 ) * ((b_share_m)/100)
	 WHEN bonus_m_id > 0 and b_numstep=1 and b_status=1 THEN  ((-b_sum * com_af)/100 ) * ((b_share_m)/100)
	  WHEN bonus_m_id > 0 and b_numstep=1 and b_status=3 THEN  ((-b_sum * com_af)/100 ) * ((b_share_m)/100)
    ELSE 0
END
	  ,10)
   ) as afr   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0   and b_numstep>1   THEN ((-b_sum * com_af)/100 ) * (( 100 - ( b_share_m ))/100)
	 WHEN bonus_m_id > 0 and b_numstep=1 and b_status=1 THEN  ((-b_sum * com_af)/100 ) * (( 100 - ( b_share_m ))/100)
	  WHEN bonus_m_id > 0 and b_numstep=1 and b_status=3 THEN  ((-b_sum * com_af)/100 ) * (( 100 - ( b_share_m ))/100)
    ELSE 0
END
	  ,10)
   ) as afsa 
 from bom_tb_football_bill where m_id = '".$rs_m['m_id']."'  and b_accept=1  and b_status!=5  and b_numstep>1  and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
$rs3=sql_array($sql);

if($af!=""){
$sumafm=$rs3['afm'];
$sumafr=$rs3['afr'];
$sunafsa=$rs3['afsa'];
	}


$a0=$rs3['t1'];

$a1=$rs3['m1'];
$a2=$rs3['m2'];
$a3=$rs3['m3'];

$a5=$rs3['r1'];
$a6=$rs3['r2'];
$a66=$rs3['r22'];
$a7=$rs3['r3'];
$a77=$rs3['r33'];

$a9=$rs3['w2'];
$a10=$rs3['w3'];

	
$sum0=$a0;
$sum0af=$sumafm+$sumafr+$sunafsa;

$sum1=$a1;
$sum2=$a2+$sumafm;
$sum3=$a3;
$sum4=$sum1+$sum2+$sum3;

$sum5=$a5;
$sum6=$a6+$a66+$sumafr;
$sum7=$a7+$a77;
$sum8=$sum5+$sum6+$sum7;

$sum9=$a9+$sunafsa;
$sum10=$a10+$sum9;

}


################################# หวย
if($value=="lg" or $af!=""){
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
   ) as w3 ,  
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0  THEN ((b_total * com_af)/100 )
    ELSE 0
END
	  ,10)
   ) as afm   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0    THEN ((-b_total * com_af)/100 ) * ((b_share_m)/100)
    ELSE 0
END
	  ,10)
   ) as afr   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0    THEN ((-b_total * com_af)/100 ) * (( 100 - ( b_share_m ))/100)
    ELSE 0
END
	  ,10)
   ) as afsa 
 from bom_tb_lotto_bill_play where m_id = '".$rs_m['m_id']."'  and b_accept=1 and lot_zone=1     and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
$rs4=sql_array($sql);

if($af!=""){
$sumafm=$rs4['afm'];
$sumafr=$rs4['afr'];
$sunafsa=$rs4['afsa'];
	}

if($value=="lg"){
	
$a0=$rs4['t1'];

$a1=$rs4['m1'];
$a2=$rs4['m2'];
$a3=$rs4['m3'];

$a5=$rs4['r1'];
$a6=$rs4['r2'];
$a66=$rs4['r22'];
$a7=$rs4['r3'];
$a77=$rs4['r33'];

$a9=$rs4['w2'];
$a10=$rs4['w3'];
}

$sum0=$a0;
$sum0af=$sumafm+$sumafr+$sunafsa;

$sum1=$a1;
$sum2=$a2+$sumafm;
$sum3=$a3;
$sum4=$sum1+$sum2+$sum3;

$sum5=$a5;
$sum6=$a6+$a66+$sumafr;
$sum7=$a7+$a77;
$sum8=$sum5+$sum6+$sum7;

$sum9=$a9+$sunafsa;
$sum10=$a10+$sum9;
}


if($value=="ls"){
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
   ) as w3 ,  
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0  THEN ((b_total * com_af)/100 )
    ELSE 0
END
	  ,10)
   ) as afm   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0    THEN ((-b_total * com_af)/100 ) * ((b_share_m)/100)
    ELSE 0
END
	  ,10)
   ) as afr   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0    THEN ((-b_total * com_af)/100 ) * (( 100 - ( b_share_m ))/100)
    ELSE 0
END
	  ,10)
   ) as afsa 
 from bom_tb_lotto_bill_play where m_id = '".$rs_m['m_id']."'  and b_accept=1 and lot_zone!=1   and lot_type!=31       and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
$rs5=sql_array($sql);

if($af!=""){
$sumafm=$rs5['afm'];
$sumafr=$rs5['afr'];
$sunafsa=$rs5['afsa'];
	}


$a0=$rs5['t1'];

$a1=$rs5['m1'];
$a2=$rs5['m2'];
$a3=$rs5['m3'];

$a5=$rs5['r1'];
$a6=$rs5['r2'];
$a66=$rs5['r22'];
$a7=$rs5['r3'];
$a77=$rs5['r33'];

$a9=$rs5['w2'];
$a10=$rs5['w3'];

	
$sum0=$a0;
$sum0af=$sumafm+$sumafr+$sunafsa;

$sum1=$a1;
$sum2=$a2+$sumafm;
$sum3=$a3;
$sum4=$sum1+$sum2+$sum3;

$sum5=$a5;
$sum6=$a6+$a66+$sumafr;
$sum7=$a7+$a77;
$sum8=$sum5+$sum6+$sum7;

$sum9=$a9+$sunafsa;
$sum10=$a10+$sum9;
}


if($value=="ll"){
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
   ) as w3 ,  
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0  THEN ((b_total * com_af)/100 )
    ELSE 0
END
	  ,10)
   ) as afm   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0    THEN ((-b_total * com_af)/100 ) * ((b_share_m)/100)
    ELSE 0
END
	  ,10)
   ) as afr   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0    THEN ((-b_total * com_af)/100 ) * (( 100 - ( b_share_m ))/100)
    ELSE 0
END
	  ,10)
   ) as afsa 
 from bom_tb_lotto_bill_play where m_id = '".$rs_m['m_id']."'  and b_accept=1 and lot_zone!=1   and lot_type=31    and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
$rs6=sql_array($sql);

if($af!=""){
$sumafm=$rs6['afm'];
$sumafr=$rs6['afr'];
$sunafsa=$rs6['afsa'];
	}


$a0=$rs6['t1'];


$a1=$rs6['m1'];
$a2=$rs6['m2'];
$a3=$rs6['m3'];

$a5=$rs6['r1'];
$a6=$rs6['r2'];
$a66=$rs6['r22'];
$a7=$rs6['r3'];
$a77=$rs6['r33'];

$a9=$rs6['w2'];
$a10=$rs6['w3'];

	
$sum0=$a0;
$sum0af=$sumafm+$sumafr+$sunafsa;

$sum1=$a1;
$sum2=$a2+$sumafm;
$sum3=$a3;
$sum4=$sum1+$sum2+$sum3;

$sum5=$a5;
$sum6=$a6+$a66+$sumafr;
$sum7=$a7+$a77;
$sum8=$sum5+$sum6+$sum7;

$sum9=$a9+$sunafsa;
$sum10=$a10+$sum9;

}

if($value=="gm"){
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
   ) as w3 ,  
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0  THEN ((b_total * com_af)/100 )
    ELSE 0
END
	  ,10)
   ) as afm   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0    THEN ((-b_total * com_af)/100 ) * ((b_share_m)/100)
    ELSE 0
END
	  ,10)
   ) as afr   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0    THEN ((-b_total * com_af)/100 ) * (( 100 - ( b_share_m ))/100)
    ELSE 0
END
	  ,10)
   ) as afsa 
 from bom_tb_games_bill_play where m_id = '".$rs_m['m_id']."'  and b_accept=1     and  STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate'";
$rs7=sql_array($sql);

if($af!=""){
$sumafm=$rs7['afm'];
$sumafr=$rs7['afr'];
$sunafsa=$rs7['afsa'];
	}


$a0=$rs7['t1'];

$a1=$rs7['m1'];
$a2=$rs7['m2'];
$a3=$rs7['m3'];

$a5=$rs7['r1'];
$a6=$rs7['r2'];
$a66=$rs7['r22'];
$a7=$rs7['r3'];
$a77=$rs7['r33'];

$a9=$rs7['w2'];
$a10=$rs7['w3'];

	
$sum0=$a0;
$sum0af=$sumafm+$sumafr+$sunafsa;

$sum1=$a1;
$sum2=$a2+$sumafm;
$sum3=$a3;
$sum4=$sum1+$sum2+$sum3;

$sum5=$a5;
$sum6=$a6+$a66+$sumafr;
$sum7=$a7+$a77;
$sum8=$sum5+$sum6+$sum7;

$sum9=$a9+$sunafsa;
$sum10=$a10+$sum9;

}


if($value=="cn"){
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
   ) as w3 ,  
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0  THEN ((b_total * com_af)/100 )
    ELSE 0
END
	  ,10)
   ) as afm   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0    THEN ((-b_total * com_af)/100 ) * ((b_share_m)/100)
    ELSE 0
END
	  ,10)
   ) as afr   ,
sum(
   	ROUND(
CASE
    WHEN bonus_m_id > 0    THEN ((-b_total * com_af)/100 ) * (( 100 - ( b_share_m ))/100)
    ELSE 0
END
	  ,10)
   ) as afsa 
 from bom_tb_casino_bill_play where m_id = '".$rs_m['m_id']."'  and b_accept=1     and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate'   ";
$rs8=sql_array($sql);

if($af!=""){
$sumafm=$rs8['afm'];
$sumafr=$rs8['afr'];
$sunafsa=$rs8['afsa'];
	}


$a0=$rs8['t1'];

$a1=$rs8['m1'];
$a2=$rs8['m2'];
$a3=$rs8['m3'];

$a5=$rs8['r1'];
$a6=$rs8['r2'];
$a66=$rs8['r22'];
$a7=$rs8['r3'];
$a77=$rs8['r33'];

$a9=$rs8['w2'];
$a10=$rs8['w3'];

	
$sum0=$a0;
$sum0af=$sumafm+$sumafr+$sunafsa;

$sum1=$a1;
$sum2=$a2+$sumafm;
$sum3=$a3;
$sum4=$sum1+$sum2+$sum3;

$sum5=$a5;
$sum6=$a6+$a66+$sumafr;
$sum7=$a7+$a77;
$sum8=$sum5+$sum6+$sum7;

$sum9=$a9+$sunafsa;
$sum10=$a10+$sum9;

}




?>


