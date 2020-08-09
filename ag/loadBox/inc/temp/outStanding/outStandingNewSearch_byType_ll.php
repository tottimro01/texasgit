<?php 
################################# หวยชุด


$sql="select 
 sum( 
(ROUND(  b_total ,10))	
   ) as t1 ,
sum(
   	ROUND( 	( - b_total )*(( $mem_share )/100) ,10)
   ) as m2 ,  
  sum(
   	ROUND( 	(   b_total - br_pay_".$r_level.")*(( $mem_share )/100) ,10)
   ) as m3  , 
sum(
   	ROUND( 	( b_total )*((b_myshare_".$ag_level.")/100) ,10)
   ) as r2 ,  
sum(
   	ROUND( 	-(   b_total - br_pay_".$r_level." )*((b_myshare_".$ag_level.")/100) ,10)
   ) as r3  ,
sum(
   	ROUND( ( br_pay_".$r_level." - br_pay_".$ag_level.")	* (( $keep_share )/100) ,10)
   ) as r33   
 from bom_tb_lotto_bill_play_live where r_agent_id like '%*".$_SESSION['r_id']."*%'  and b_accept=1  and play_status=7 and lot_zone!=1  and lot_type=31 ";
$rs1=sql_array($sql);


$psum1=$rs1[t1];
$psum2=$rs1[m2];
$psum3=$rs1[m3];
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

$list .= "<tr>
		        <td align=\"\">
		        	<span onclick=\"loadData('$key','".$_SESSION['r_id']."','".$_SESSION['r_level']."');\">
		        		<a class=\"cur\"> {$value} </a>
		        	</span>
		        </td>
		        <td align=\"right\"> ".number_format($psum1,2)."</td>
		        <td align=\"right\">  ".number_format($psum2,2)."</td>
		        <td align=\"right\">  ".number_format($psum3,2)."</td>
		        <td align=\"right\">  ".number_format($psum4,2)."</td>
		        <td align=\"right\">  ".number_format($psum5,2)."</td>
		        <td align=\"right\">  ".number_format($psum6,2)."</td>
		        <td align=\"right\">  ".number_format($psum7,2)."</td>
		        <td align=\"right\">  ".number_format($psum8,2)."</td>
		</tr>";

 ?>