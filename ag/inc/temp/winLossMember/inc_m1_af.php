<?php 

$sumafm=0;
$sumafr=0;
$sunafsa=0;

################################# บอล


$sql="select 
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


################################# กีฬา


$sql="select 

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




################################# มวย


$sql="select 

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



################################# สเต็ป


$sql="select 

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



################################# หวย

$sql="select 
   
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
 from bom_tb_lotto_bill_play where r_agent_id like '%*".$rs['r_id']."*%'  and b_accept=1 and lot_zone=1  and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
$rs2=sql_array($sql);

################################# หวยหุ้น
$sql="select 
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
 from bom_tb_lotto_bill_play where r_agent_id like '%*".$rs['r_id']."*%'  and b_accept=1 and lot_zone!=1    and lot_type!=31      and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate' ";
$rs3=sql_array($sql);#and play_id=58957  



################################# หวยชุด
$sql="select 

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

################################# เกมส์
$sql="select 

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
 from bom_tb_games_bill_play where r_agent_id like '%*".$rs['r_id']."*%'  and b_accept=1     and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate'  ";
$rs4=sql_array($sql);#and play_id=688


################################# คาสิโน
$sql="select 

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
 from bom_tb_casino_bill_play where r_agent_id like '%*".$rs['r_id']."*%'  and b_accept=1   and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$edate' and '$ddate'   ";
$rs5=sql_array($sql);


##############AF#######
if($af!=""){
$sumafm=($rs1['afm']+$rs11['afm']+$rs12['afm']+$rs13['afm'])+($rs2['afm']+$rs3['afm']+$rs31['afm'])+$rs4['afm']+$rs5['afm'];
$sumafr=($rs1['afr']+$rs11['afr']+$rs12['afr']+$rs13['afr'])+($rs2['afr']+$rs3['afr']+$rs31['afr'])+$rs4['afr']+$rs5['afr'];
$sunafsa=($rs1['afsa']+$rs11['afsa']+$rs12['afsa']+$rs13['afsa'])+($rs2['afsa']+$rs3['afsa']+$rs31['afsa'])+$rs4['afsa']+$rs5['afsa'];
}

?>


