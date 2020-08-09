<?php 


################################# คาสิโน
$zone= $key;

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
 from bom_tb_casino_bill_play where m_id = '".$rs_m['m_id']."'  and b_accept=1     and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate'  and casino_zone = $zone ";
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



 ?>