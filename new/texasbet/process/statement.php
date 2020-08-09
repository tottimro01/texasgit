<?php
	session_start();

	if(($_SESSION['m_id'] == '') || (!isset($_SESSION['m_id']))){
		exit();
	}

    function _cbn2($sum ,$xx=null){
	if($sum==(-0)){$sum=0;}
		if($sum<0){ return '<span class="">'.number_format($sum,$xx).'</span>';}
		elseif($sum==0){ return '<span class="">'.number_format($sum).'</span>';}
	    else{  return '<span class="">'.number_format($sum,$xx).'</span>';}
	}

    $js3=array();
	$js4=array();
	$js5=array();

	if($jt["isThisWeek"] == 0){
		$week=date("W", strtotime('+1 tuesday last week'));   
		$date=date("d-m-Y", strtotime('+1 tuesday last week'));   
		$date_x=date("D", strtotime('+1 tuesday last week'));   
		$end_date =date("d-m-Y", strtotime('+1 monday this week'));	
	}else if($jt["isThisWeek"] == 1){
		$week=date("W", strtotime('+2 tuesday last week'));   
		$date=date("d-m-Y", strtotime('+2 tuesday last week'));   
		$date_x=date("D", strtotime('+2 tuesday last week'));   
		$end_date =date("d-m-Y", strtotime('+2 monday this week'));	
	
	}

	$week_6=date("W", strtotime('-5 tuesday last week'));   		
	$week_5=date("W", strtotime('-4 tuesday last week'));   
	$week_4=date("W", strtotime('-3 tuesday last week'));   
	$week_3=date("W", strtotime('-2 tuesday last week'));   		
	$week_2=date("W", strtotime('-1 tuesday last week'));   
	$week_1=date("W", strtotime('+1 tuesday last week'));   
	$week_0=date("W", strtotime('+2 tuesday last week')); 

	$sum1=array();	 
	$sum2=array();	 
	$sum3=array();	 
	$sum4=array();	 
	$sum5=array();	 

	$date3 = str_replace('-','/',$date);
	$end_date3 = str_replace('-','/',$end_date);
  
	$date4 =$date;
	$end_date4 = $end_date;

$data = array();
while (strtotime($date) <= strtotime($end_date)) {

	$edd=@explode("-",$date); 
	$ndate=$edd[2].'-'.$edd[1].'-'.$edd[0]; 

  	$date2 = str_replace('-','/',$date);
  	$end_date2 = str_replace('-','/',$end_date);



################################# บอล

$sql="select 
 sum( 
(ROUND(  -b_sum ,2))	
   ) as t1 ,
  sum(
(ROUND( 	 b_pay  ,2))
   ) as t2 ,
  sum(
 ( ROUND( 	b_bonus  ,2))
   ) as t3 
 from bom_tb_football_bill where m_id='".$_SESSION['m_id']."'  and b_accept=1  and b_status!=5   and b_date like '$date'";
$rs1=sql_array($sql);

$s1=($rs1[t1])+($rs1[t2]+$rs1[t3]);
$sum1[]=$s1;	 

################################# หวย

$sql="select 
 sum( 
(ROUND( 	-b_total  ,2))
   ) as t1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,2))
   ) as t2 ,
  sum(
 ( ROUND( 	b_bonus  ,2))
   ) as t3 
 from bom_tb_lotto_bill_play where m_id='".$_SESSION['m_id']."'  and b_accept=1 and lot_zone=1   and play_datenow like '$ndate%'";
$rs2=sql_array($sql);
$s2=($rs2[t1])+($rs2[t2]+$rs2[t3]);
$sum2[]=$s2;	 

################################# หวยหุ้น
$sql="select 
 sum( 
(ROUND( 	-b_total  ,2))
   ) as t1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,2))
   ) as t2 ,
  sum(
 ( ROUND( 	b_bonus  ,2))
   ) as t3 
 from bom_tb_lotto_bill_play where m_id='".$_SESSION['m_id']."'  and b_accept=1 and lot_zone!=1   and play_datenow like '$ndate%'";
$rs3=sql_array($sql);
$s3=($rs3[t1])+($rs3[t2]+$rs3[t3]);
$sum3[]=$s3;	 
################################# เกมส์
$sql="select 
 sum( 
(ROUND( 	-b_total  ,2))
   ) as t1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,2))
   ) as t2 ,
  sum(
 ( ROUND( 	b_bonus  ,2))
   ) as t3 
 from bom_tb_games_bill_play where m_id='".$_SESSION['m_id']."'  and b_accept=1   and play_datenow like '$ndate%'";
$rs4=sql_array($sql);
$s4=($rs4[t1])+($rs4[t2]+$rs4[t3]);
$sum4[]=$s4;	 
################################# คาสิโน
$sql="select 
 sum( 
(ROUND( 	-b_total  ,2))
   ) as t1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,2))
   ) as t2 ,
  sum(
 ( ROUND( 	b_bonus  ,2))
   ) as t3 
 from bom_tb_casino_bill_play where m_id='".$_SESSION['m_id']."'  and b_accept=1     and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$ndate' and '$ndate'  ";
$rs5=sql_array($sql);
$s5=($rs5[t1])+($rs5[t2]+$rs5[t3]);
$sum5[]=$s5;	

$data[] = array(
	"False",
	$date." (".$n_date[$date_x].")",
	_cbn2($s1,2),
	_cbn2($s2,2),
	_cbn2($s3,2),
	_cbn2($s4,2),
	_cbn2($s5,2),
	_cbn2($s1+$s2+$s3+$s4+$s5,2),
);

	$date_x = date ("D", strtotime("+1 day", strtotime($date)));
 	$date = date ("d-m-Y", strtotime("+1 day", strtotime($date)));
} 

// $data[] = array(
// 	"False",
// 	$lang_member[611],
// 	_cbn2(@array_sum($sum1),2),
// 	_cbn2(@array_sum($sum2),2),
// 	_cbn2(@array_sum($sum3),2),
// 	_cbn2(@array_sum($sum4),2),
// 	_cbn2(@array_sum($sum5),2),
// 	_cbn2(@array_sum($sum1)+@array_sum($sum2)+@array_sum($sum3)+@array_sum($sum4)+@array_sum($sum5),2),
// );


	$data = json_encode($data);
	echo json_encode($data);
?>