<?php 
if( $gametype=="sc"){
	$total="b_sum";
	$dis1="  b_pay ";
	$where="bom_tb_football_bill_live where m_id='".$rs['m_id']."' and b_confirm != 1  and b_accept=1  and b_status=5 and b_numstep=1 and  b_zone=6";
	$r33=" br_pay_".$ag_level." - b_pay ";	
}elseif( $gametype=="sp"){
	$total="b_sum";
	$dis1="  b_pay ";
	$where="bom_tb_football_bill_live where m_id='".$rs['m_id']."' and b_confirm != 1  and b_accept=1  and b_status=5 and b_numstep=1 and  b_zone!=1 and  b_zone!=6";
	$r33=" br_pay_".$ag_level." - b_pay ";		
}elseif( $gametype=="bx"){
	$total="b_sum";
	$dis1="  b_pay ";
	$where="bom_tb_football_bill_live where m_id='".$rs['m_id']."' and b_confirm != 1  and b_accept=1  and b_status=5 and b_numstep=1 and  b_zone=1 ";
	$r33=" br_pay_".$ag_level." - b_pay ";			
}elseif( $gametype=="st"){
	$total="b_sum";
	$dis1="  b_pay ";
	$where="bom_tb_football_bill_live where m_id='".$rs['m_id']."' and b_confirm != 1  and b_accept=1  and b_status=5 and b_numstep>1  ";
	$r33=" br_pay_".$ag_level." - b_pay ";			
}elseif( $gametype=="lg"){
	$total="b_total";
	$dis1="  b_total - b_pay ";
	$where="bom_tb_lotto_bill_play_live where m_id='".$rs['m_id']."'  and b_accept=1  and play_status=7 and lot_zone=1  ";
	$r33=" b_pay - br_pay_".$ag_level." ";			
}elseif( $gametype=="ls"){
	$total="b_total";
	$dis1="  b_total - b_pay ";
	$where="bom_tb_lotto_bill_play_live where m_id='".$rs['m_id']."'  and b_accept=1  and play_status=7 and lot_zone!=1  and lot_type!=31  ";
	$r33=" b_pay - br_pay_".$ag_level." ";				
}elseif( $gametype=="ll"){
	$total="b_total";
	$dis1="  b_total - b_pay ";
	$where="bom_tb_lotto_bill_play_live where m_id='".$rs['m_id']."'  and b_accept=1  and play_status=7 and lot_zone!=1  and lot_type=31  ";
    $r33=" b_pay - br_pay_".$ag_level." ";			
}elseif( $gametype=="gm"){
	$total="b_total";
	$dis1="  b_total - b_pay ";
	$where="bom_tb_games_bill_play_live where m_id='".$rs['m_id']."'  and b_accept=1  and play_status=7  ";
	$r33=" b_pay - br_pay_".$ag_level." ";				
}elseif( $gametype=="cn"){
	$total="b_total";
	$dis1="  b_total - b_pay ";
	$where="bom_tb_casino_bill_play_live where m_id='".$rs['m_id']."'  and b_accept=1  and play_status=7  ";
	$r33=" b_pay - br_pay_".$ag_level." ";			
}	


$sql="select 
 sum( 
(ROUND(   $total ,10))	
   ) as t1 ,
sum(
   	ROUND( 	(  $total ) ,10)
   ) as w2   ,
sum(
   	ROUND( 	( - $dis1 ) ,10)
   ) as w3   , 
sum(
   	ROUND( 	-( $total )*((b_share_m)/100) ,10)
   ) as r2   ,
sum(
   	ROUND( 	(  $dis1 )*((b_share_m)/100) ,10)
   ) as r3   ,
sum(
   	ROUND( -( $r33 )	* (( $keep_share )/100) ,10)
   ) as r33  
 from $where ";
$rs1=sql_array($sql);			


$psum1=$rs1[t1];
$psum2=$rs1[w2];
$psum3=$rs1[w3];
$psum4=$psum2+$psum3;
$psum5=$rs1[r2];
$psum6=$rs1[r3]+$rs1[r33];
$psum7=$psum5+$psum6;
$psum8=-($psum4+$psum7);		


$xsum1[]=$psum1;
$xsum2[]=$psum2;
$xsum3[]=$psum3;
$xsum4[]=$psum4;
$xsum5[]=$psum5;
$xsum6[]=$psum6;
$xsum7[]=$psum7;
$xsum8[]=$psum8;

 ?>