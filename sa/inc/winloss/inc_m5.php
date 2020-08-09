<?php 
$sum1=0;
$sum2=0;
$sum33=0;
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
   	ROUND( 	(b_sum)*((b_share_m)/100) ,10)
   ) as r1 , 
sum(
   	ROUND( 	( b_bonus - b_sum ) ,10)
   ) as m2   ,
sum(
   	ROUND( 	(  b_pay) ,10)
   ) as m3   , 
sum(
   	ROUND( 	( b_sum - b_bonus)*((b_share_m)/100) ,10)
   ) as r2   ,
sum(
   	ROUND( ( br_bonus_".$ag_level." - b_bonus)	* (( $keep_share )/100) ,10)
   ) as r22 ,  
sum(
   	ROUND( 	-(  b_pay)*((b_share_m)/100) ,10)
   ) as r3   ,
sum(
  	ROUND( (   br_pay_".$ag_level." - b_pay)	* (( $keep_share )/100) ,10)
   ) as r33     ,
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
 from bom_tb_football_bill where m_id = '".$rs_m['m_id']."' and b_confirm != 1  and b_accept=1  and b_status!=5    and b_zone=6    and b_numstep=1   and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
$rs0=sql_array($sql);

if($af!=""){
$sumafm=$rs0['afm'];
$sumafr=$rs0['afr'];
$sunafsa=$rs0['afsa'];
	}


$t1_a=$rs0['t1'];
$r1_a=$rs0['r1'];

$m2_a=$rs0['m2'];
$m3_a=$rs0['m3'];

$r2_a=$rs0['r2'];
$r22_a=$rs0['r22'];
$r3_a=$rs0['r3'];
$r33_a=$rs0['r33'];

	

$sum1=$t1_a;
$sum2=$r1_a;

$sum3=$m2_a;
$sum4=$m3_a+$sumafm;
$sum5=$sum3+$sum4;

$sum6=$r2_a+$r22_a;
$sum7=$r3_a+$r33_a+$sumafr;
$sum8=$sum6+$sum7;

$sum9=-($sum4+$sum7+$sunafsa);
$sum10=-($sum5+$sum8);

 }


if($value=="sp"){


$sql="select 
 sum( 
(ROUND(  b_sum ,10))	
   ) as t1 ,
sum(
   	ROUND( 	(b_sum)*((b_share_m)/100) ,10)
   ) as r1 , 
sum(
   	ROUND( 	( b_bonus - b_sum ) ,10)
   ) as m2   ,
sum(
   	ROUND( 	(  b_pay) ,10)
   ) as m3   , 
sum(
   	ROUND( 	( b_sum - b_bonus)*((b_share_m)/100) ,10)
   ) as r2   ,
sum(
   	ROUND( ( br_bonus_".$ag_level." - b_bonus)	* (( $keep_share )/100) ,10)
   ) as r22 ,  
sum(
   	ROUND( 	-(  b_pay)*((b_share_m)/100) ,10)
   ) as r3   ,
sum(
  	ROUND( (   br_pay_".$ag_level." - b_pay)	* (( $keep_share )/100) ,10)
   ) as r33     ,
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
 from bom_tb_football_bill where m_id = '".$rs_m['m_id']."' and b_confirm != 1  and b_accept=1  and b_status!=5    and b_zone!=1   and b_zone!=6    and b_numstep=1  and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
$rs1=sql_array($sql);

if($af!=""){
$sumafm=$rs1['afm'];
$sumafr=$rs1['afr'];
$sunafsa=$rs1['afsa'];
	}


$t1_a=$rs1['t1'];
$r1_a=$rs1['r1'];

$m2_a=$rs1['m2'];
$m3_a=$rs1['m3'];

$r2_a=$rs1['r2'];
$r22_a=$rs1['r22'];
$r3_a=$rs1['r3'];
$r33_a=$rs1['r33'];

	

$sum1=$t1_a;
$sum2=$r1_a;

$sum3=$m2_a;
$sum4=$m3_a+$sumafm;
$sum5=$sum3+$sum4;

$sum6=$r2_a+$r22_a;
$sum7=$r3_a+$r33_a+$sumafr;
$sum8=$sum6+$sum7;

$sum9=-($sum4+$sum7+$sunafsa);
$sum10=-($sum5+$sum8);

 }


if($value=="bx"){


$sql="select 
 sum( 
(ROUND(  b_sum ,10))	
   ) as t1 ,
sum(
   	ROUND( 	(b_sum)*((b_share_m)/100) ,10)
   ) as r1 , 
sum(
   	ROUND( 	( b_bonus - b_sum ) ,10)
   ) as m2   ,
sum(
   	ROUND( 	(  b_pay) ,10)
   ) as m3   , 
sum(
   	ROUND( 	( b_sum - b_bonus)*((b_share_m)/100) ,10)
   ) as r2   ,
sum(
   	ROUND( ( br_bonus_".$ag_level." - b_bonus)	* (( $keep_share )/100) ,10)
   ) as r22 ,  
sum(
   	ROUND( 	-(  b_pay)*((b_share_m)/100) ,10)
   ) as r3   ,
sum(
  	ROUND( (   br_pay_".$ag_level." - b_pay)	* (( $keep_share )/100) ,10)
   ) as r33     ,
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
 from bom_tb_football_bill where m_id = '".$rs_m['m_id']."' and b_confirm != 1  and b_accept=1  and b_status!=5  and b_zone=1   and b_numstep=1     and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
$rs2=sql_array($sql);

if($af!=""){
$sumafm=$rs2['afm'];
$sumafr=$rs2['afr'];
$sunafsa=$rs2['afsa'];
	}


$t1_a=$rs2['t1'];
$r1_a=$rs2['r1'];

$m2_a=$rs2['m2'];
$m3_a=$rs2['m3'];

$r2_a=$rs2['r2'];
$r22_a=$rs2['r22'];
$r3_a=$rs2['r3'];
$r33_a=$rs2['r33'];

	

$sum1=$t1_a;
$sum2=$r1_a;

$sum3=$m2_a;
$sum4=$m3_a+$sumafm;
$sum5=$sum3+$sum4;

$sum6=$r2_a+$r22_a;
$sum7=$r3_a+$r33_a+$sumafr;
$sum8=$sum6+$sum7;

$sum9=-($sum4+$sum7+$sunafsa);
$sum10=-($sum5+$sum8);

 }

if($value=="st"){


$sql="select 
 sum( 
(ROUND(  b_sum ,10))	
   ) as t1 ,
sum(
   	ROUND( 	(b_sum)*((b_share_m)/100) ,10)
   ) as r1 , 
sum(
   	ROUND( 	( b_bonus - b_sum ) ,10)
   ) as m2   ,
sum(
   	ROUND( 	(  b_pay) ,10)
   ) as m3   , 
sum(
   	ROUND( 	( b_sum - b_bonus)*((b_share_m)/100) ,10)
   ) as r2   ,
sum(
   	ROUND( ( br_bonus_".$ag_level." - b_bonus)	* (( $keep_share )/100) ,10)
   ) as r22 ,  
sum(
   	ROUND( 	-(  b_pay)*((b_share_m)/100) ,10)
   ) as r3   ,
sum(
  	ROUND( (   br_pay_".$ag_level." - b_pay)	* (( $keep_share )/100) ,10)
   ) as r33     ,
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
 from bom_tb_football_bill where m_id = '".$rs_m['m_id']."' and b_confirm != 1  and b_accept=1  and b_status!=5  and b_numstep>1  and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
$rs3=sql_array($sql);

if($af!=""){
$sumafm=$rs3['afm'];
$sumafr=$rs3['afr'];
$sunafsa=$rs3['afsa'];
	}


$t1_a=$rs3['t1'];
$r1_a=$rs3['r1'];

$m2_a=$rs3['m2'];
$m3_a=$rs3['m3'];

$r2_a=$rs3['r2'];
$r22_a=$rs3['r22'];
$r3_a=$rs3['r3'];
$r33_a=$rs3['r33'];

	

$sum1=$t1_a;
$sum2=$r1_a;

$sum3=$m2_a;
$sum4=$m3_a+$sumafm;
$sum5=$sum3+$sum4;

$sum6=$r2_a+$r22_a;
$sum7=$r3_a+$r33_a+$sumafr;
$sum8=$sum6+$sum7;

$sum9=-($sum4+$sum7+$sunafsa);
$sum10=-($sum5+$sum8);

 }

if($value=="lg"){
################################# หวย

 $sql="select 
 sum( 
(ROUND( 	b_total  ,10))
   ) as t1 ,
sum(
   	ROUND( 	(b_total)*((b_share_m)/100) ,10)
   ) as r1 , 
sum(
   	ROUND( 	( b_bonus - b_total ) ,10)
   ) as m2   ,
sum(
   	ROUND( 	( b_total - b_pay) ,10)
   ) as m3   , 
sum(
   	ROUND( 	( b_total - b_bonus)*((b_share_m)/100) ,10)
   ) as r2   ,
sum(
   	ROUND( ( br_bonus_".$ag_level." - b_bonus)	* (( $keep_share )/100) ,10)
   ) as r22 ,  
sum(
   	ROUND( 	-( b_total - b_pay)*((b_share_m)/100) ,10)
   ) as r3   ,
sum(
   	ROUND( ( b_pay - br_pay_".$ag_level.")	* (( $keep_share )/100) ,10)
   ) as r33     ,
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


$t1_a=$rs4['t1'];
$r1_a=$rs4['r1'];

$m2_a=$rs4['m2'];
$m3_a=$rs4['m3'];

$r2_a=$rs4['r2'];
$r22_a=$rs4['r22'];
$r3_a=$rs4['r3'];
$r33_a=$rs4['r33'];

	

$sum1=$t1_a;
$sum2=$r1_a;

$sum3=$m2_a;
$sum4=$m3_a+$sumafm;
$sum5=$sum3+$sum4;

$sum6=$r2_a+$r22_a;
$sum7=$r3_a+$r33_a+$sumafr;
$sum8=$sum6+$sum7;

$sum9=-($sum4+$sum7+$sunafsa);
$sum10=-($sum5+$sum8);

}

if($value=="ls"){
################################# หวยหุ้น
$sql="select 
 sum( 
(ROUND( 	b_total  ,10))
   ) as t1 ,
sum(
   	ROUND( 	(b_total)*((b_share_m)/100) ,10)
   ) as r1 , 
sum(
   	ROUND( 	( b_bonus - b_total ) ,10)
   ) as m2   ,
sum(
   	ROUND( 	( b_total - b_pay) ,10)
   ) as m3   , 
sum(
   	ROUND( 	( b_total - b_bonus)*((b_share_m)/100) ,10)
   ) as r2   ,
sum(
   	ROUND( ( br_bonus_".$ag_level." - b_bonus)	* (( $keep_share )/100) ,10)
   ) as r22 ,  
sum(
   	ROUND( 	-( b_total - b_pay)*((b_share_m)/100) ,10)
   ) as r3   ,
sum(
   	ROUND( ( b_pay - br_pay_".$ag_level.")	* (( $keep_share )/100) ,10)
   ) as r33     ,
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
 from bom_tb_lotto_bill_play where m_id = '".$rs_m['m_id']."'  and b_accept=1 and lot_zone!=1   and lot_type!=31    and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
$rs5=sql_array($sql);

if($af!=""){
$sumafm=$rs5['afm'];
$sumafr=$rs5['afr'];
$sunafsa=$rs5['afsa'];
	}


$t1_a=$rs5['t1'];
$r1_a=$rs5['r1'];

$m2_a=$rs5['m2'];
$m3_a=$rs5['m3'];

$r2_a=$rs5['r2'];
$r22_a=$rs5['r22'];
$r3_a=$rs5['r3'];
$r33_a=$rs5['r33'];

	

$sum1=$t1_a;
$sum2=$r1_a;

$sum3=$m2_a;
$sum4=$m3_a+$sumafm;
$sum5=$sum3+$sum4;

$sum6=$r2_a+$r22_a;
$sum7=$r3_a+$r33_a+$sumafr;
$sum8=$sum6+$sum7;

$sum9=-($sum4+$sum7+$sunafsa);
$sum10=-($sum5+$sum8);

}

if($value=="ll"){
################################# หวยชุด
$sql="select 
 sum( 
(ROUND( 	b_total  ,10))
   ) as t1 ,
sum(
   	ROUND( 	(b_total)*((b_share_m)/100) ,10)
   ) as r1 , 
sum(
   	ROUND( 	( b_bonus - b_total ) ,10)
   ) as m2   ,
sum(
   	ROUND( 	( b_total - b_pay) ,10)
   ) as m3   , 
sum(
   	ROUND( 	( b_total - b_bonus)*((b_share_m)/100) ,10)
   ) as r2   ,
sum(
   	ROUND( ( br_bonus_".$ag_level." - b_bonus)	* (( $keep_share )/100) ,10)
   ) as r22 ,  
sum(
   	ROUND( 	-( b_total - b_pay)*((b_share_m)/100) ,10)
   ) as r3   ,
sum(
   	ROUND( ( b_pay - br_pay_".$ag_level.")	* (( $keep_share )/100) ,10)
   ) as r33     ,
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


$t1_a=$rs6['t1'];
$r1_a=$rs6['r1'];

$m2_a=$rs6['m2'];
$m3_a=$rs6['m3'];

$r2_a=$rs6['r2'];
$r22_a=$rs6['r22'];
$r3_a=$rs6['r3'];
$r33_a=$rs6['r33'];

	

$sum1=$t1_a;
$sum2=$r1_a;

$sum3=$m2_a;
$sum4=$m3_a+$sumafm;
$sum5=$sum3+$sum4;

$sum6=$r2_a+$r22_a;
$sum7=$r3_a+$r33_a+$sumafr;
$sum8=$sum6+$sum7;

$sum9=-($sum4+$sum7+$sunafsa);
$sum10=-($sum5+$sum8);

}

if($value=="gm"){
################################# เกมส์
$sql="select 
 sum( 
(ROUND( 	b_total  ,10))
   ) as t1 ,
sum(
   	ROUND( 	(b_total)*((b_share_m)/100) ,10)
   ) as r1 , 
sum(
   	ROUND( 	( b_bonus - b_total ) ,10)
   ) as m2   ,
sum(
   	ROUND( 	( b_total - b_pay) ,10)
   ) as m3   , 
sum(
   	ROUND( 	( b_total - b_bonus)*((b_share_m)/100) ,10)
   ) as r2   ,
sum(
   	ROUND( ( br_bonus_".$ag_level." - b_bonus)	* (( $keep_share )/100) ,10)
   ) as r22 ,  
sum(
   	ROUND( 	-( b_total - b_pay)*((b_share_m)/100) ,10)
   ) as r3   ,
sum(
   	ROUND( ( b_pay - br_pay_".$ag_level.")	* (( $keep_share )/100) ,10)
   ) as r33     ,
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


$t1_a=$rs7['t1'];
$r1_a=$rs7['r1'];

$m2_a=$rs7['m2'];
$m3_a=$rs7['m3'];

$r2_a=$rs7['r2'];
$r22_a=$rs7['r22'];
$r3_a=$rs7['r3'];
$r33_a=$rs7['r33'];

	

$sum1=$t1_a;
$sum2=$r1_a;

$sum3=$m2_a;
$sum4=$m3_a+$sumafm;
$sum5=$sum3+$sum4;

$sum6=$r2_a+$r22_a;
$sum7=$r3_a+$r33_a+$sumafr;
$sum8=$sum6+$sum7;

$sum9=-($sum4+$sum7+$sunafsa);
$sum10=-($sum5+$sum8);

}

if($value=="cn"){
################################# คาสิโน
$sql="select 
 sum( 
(ROUND( 	b_total  ,10))
   ) as t1 ,
sum(
   	ROUND( 	(b_total)*((b_share_m)/100) ,10)
   ) as r1 , 
sum(
   	ROUND( 	( b_bonus - b_total ) ,10)
   ) as m2   ,
sum(
   	ROUND( 	( b_total - b_pay) ,10)
   ) as m3   , 
sum(
   	ROUND( 	( b_total - b_bonus)*((b_share_m)/100) ,10)
   ) as r2   ,
   sum(
   	ROUND( ( br_bonus_".$ag_level." - b_bonus)	* (( $keep_share )/100) ,10)
   ) as r22 ,  
sum(
   	ROUND( 	-( b_total - b_pay)*((b_share_m)/100) ,10)
   ) as r3   ,
sum(
   	ROUND( ( b_pay - br_pay_".$ag_level.")	* (( $keep_share )/100) ,10)
   ) as r33     ,
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
 from bom_tb_casino_bill_play where m_id = '".$rs_m['m_id']."'  and b_accept=1     and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate'  ";
$rs8=sql_array($sql);

if($af!=""){
$sumafm=$rs8['afm'];
$sumafr=$rs8['afr'];
$sunafsa=$rs8['afsa'];
	}


$t1_a=$rs8['t1'];
$r1_a=$rs8['r1'];

$m2_a=$rs8['m2'];
$m3_a=$rs8['m3'];

$r2_a=$rs8['r2'];
$r22_a=$rs8['r22'];
$r3_a=$rs8['r3'];
$r33_a=$rs8['r33'];

	
############################### *100
// $sum1=($t1_a)*100;
// $sum2=($r1_a)*100;

// $sum3=($m2_a)*100;
// $sum4=($m3_a+$sumafm)*100;
// $sum5=($sum3+$sum4)*100;

// $sum6=($r2_a+$r22_a)*100;
// $sum7=($r3_a+$r33_a+$sumafr)*100;
// $sum8=($sum6+$sum7)*100;

// $sum9=-(($sum4+$sum7+$sunafsa))*100;
// $sum10=-(($sum5+$sum8))*100;



  
############################### 
$sum1=($t1_a);
$sum2=($r1_a);

$sum3=($m2_a);
$sum4=($m3_a+$sumafm);
$sum5=($sum3+$sum4);

$sum6=($r2_a+$r22_a);
$sum7=($r3_a+$r33_a+$sumafr);
$sum8=($sum6+$sum7);

$sum9=-(($sum4+$sum7+$sunafsa));
$sum10=-(($sum5+$sum8));

}



?>


