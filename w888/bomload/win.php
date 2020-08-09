<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<meta charset="utf-8">
<?php
require('../inc/conn.php');
require('../inc/function.php');


$rid2=38;
?>


<script type='text/javascript' >
function _w(url){
	window.location=url;
	}
</script>

 งวดวันที่ :
              <select  class="txt_back11n" onchange="_w('?d='+this.value);">
               <option value=''  <? if($_GET[d]==""){echo'selected';}?>>เลือกวัน</option>

  <?
$re=sql_query("select * from bom_tb_lotto_ok  where 	lot_zone=1 and lot_rob=1   order by  ok_id desc limit 48 ");
while($rs=sql_fetch($re)){
  ?>    
  <option value='<?=$rs["ok_date"]?>'  <? if($_GET[d]==$rs["ok_date"]){echo'selected';}?>><?=$rs["ok_date"]?></option>
                <? } ?>
</select>
<br>---------------<br>
ยอดเบิก สาย mb <?=$_GET[d];?><br>


   <?
$sum14=array();	

$re=sql_page("bom_tb_agent  where     r_level=3 and  r_agent_id like '%*$rid2*%'    $qq ","r_user","asc",1000);
while($rs=sql_fetch($re[re])){
	
$timew=" and (b_date = '$_GET[d]') and b_accept=1  $ccpp"; #   and play_id=1  and play_status!=7
$sql="select   

    sum(ROUND( 	b_total  ,2)) as m1 ,
   
 sum( 
   	     ROUND( 		  ( -b_total)*( (	100-( b_share_m+b_myshare_3  ))/100)  ,2)
   ) as t1 ,
 sum( 
   	      ROUND( 		  ( b_total-br_pay_3)*( (	100-( b_share_m+b_myshare_3  ))/100)  ,10)
   ) as t2 ,
    sum( 
   	       ROUND( 		  ( br_bonus_3)*( (	100-( b_share_m+b_myshare_3  ))/100)  ,2)
   ) as t3 ,

   
     sum(
   		  ROUND( 				(b_total)*(( b_myshare_2)/100)  ,2)
   ) as r1 ,
   sum(
		  	ROUND( 		(  (br_pay_2-b_total)* (( b_myshare_2)/100)  ) +   (br_pay_3-br_pay_2) - ( (br_pay_3-br_pay_2)*(b_myshare_3/100) )   ,10)
   ) as r2 ,
   sum(
    ROUND( 	 	(  (-br_bonus_3)* (( b_myshare_2)/100)  ) +      (br_bonus_2-br_bonus_3)-  ( (br_bonus_2-br_bonus_3)*((b_myshare_3)/100) )   ,2)		         
   ) as r3 
   
   

   
   
 from bom_tb_lotto_bill_play_live where   r_agent_id like '%*$rs[r_id]*%'     $timew ";
$num=sql_array($sql);
 if(($num[m1])==0){
$sql="select   

    sum(ROUND( 	b_total  ,2)) as m1 ,
   
 sum( 
   	     ROUND( 		  ( -b_total)*( (	100-( b_share_m+b_myshare_3  ))/100)  ,2)
   ) as t1 ,
 sum( 
   	      ROUND( 		  ( b_total-br_pay_3)*( (	100-( b_share_m+b_myshare_3  ))/100)  ,10)
   ) as t2 ,
    sum( 
   	       ROUND( 		  ( br_bonus_3)*( (	100-( b_share_m+b_myshare_3  ))/100)  ,2)
   ) as t3 ,

   
     sum(
   		  ROUND( 				(b_total)*(( b_myshare_2)/100)  ,2)
   ) as r1 ,
   sum(
		  	ROUND( 		(  (br_pay_2-b_total)* (( b_myshare_2)/100)  ) +   (br_pay_3-br_pay_2) - ( (br_pay_3-br_pay_2)*(b_myshare_3/100) )   ,10)
   ) as r2 ,
   sum(
    ROUND( 	 	(  (-br_bonus_3)* (( b_myshare_2)/100)  ) +      (br_bonus_2-br_bonus_3)-  ( (br_bonus_2-br_bonus_3)*((b_myshare_3)/100) )   ,2)		         
   ) as r3 
   
   

   
   
 from bom_tb_lotto_bill_play where   r_agent_id like '%*$rs[r_id]*%'     $timew ";
 }
$rslot=sql_array($sql);


$xm_sum1=($rslot[t1])+(($rslot[t3])+($rslot[t2]));

$xm_sum2=($rslot[r1])+(($rslot[r3])+($rslot[r2]));


$sum10a=-(($rslot[t1])+($rslot[r1]));


$sum11a=-(($rslot[t2])+($rslot[r2]));	


$sum12a=-(($rslot[t3])+($rslot[r3]));	


$xm_sum3=$sum10a+($sum12a+$sum11a);

$sum14a=-(($xm_sum1)+($xm_sum2));	


if($sum14a<0){###############

$sum14[]=$sum14a;	
 ?>     
<?=$rs[r_user];?>= <?=_cbn( $sum14a ,2);?><br> 
  <? }  }?>
---------------<br>
รวมเบิก  = <?=_cbn(@array_sum($sum14),2);?><br>
---------------<br>
<br><br><br><br><br>
<hr>
<br><br><br><br><br>

<br>---------------<br>
ยอดเงินส่ง Lotzx <?=$_GET[d];?><br>
mp เปา = 0<br>
mj [โจ้]  = 0<br>
mk [โคม]  = 0<br>

<?
$sql="select   

    sum(ROUND( 	b_total  ,2)) as m1 

 from bom_tb_lotto_bill_play where   r_agent_id like '%*150*%'  and b_bonus>0 and lot_type=3    $timew ";
$rslot2=sql_array($sql);

?>
คิดนอก mbbb [M พี่ต๋อม เลย] , <?=number_format($rslot2[m1]);?> x 5 = <?=number_format($rslot2[m1]*5);?><br>
---------------<br><br>
   <?
$sum15=array();	

$re=sql_page("bom_tb_agent  where     r_level=3 and  r_agent_id like '%*$rid2*%'    $qq ","r_user","asc",1000);
while($rs=sql_fetch($re[re])){
	
$timew=" and (b_date = '$_GET[d]') and b_accept=1  $ccpp"; #   and play_id=1  and play_status!=7
$sql="select   

    sum(ROUND( 	b_total  ,2)) as m1 ,
   
 sum( 
   	     ROUND( 		  ( -b_total)*( (	100-( b_share_m+b_myshare_3  ))/100)  ,2)
   ) as t1 ,
 sum( 
   	      ROUND( 		  ( b_total-br_pay_3)*( (	100-( b_share_m+b_myshare_3  ))/100)  ,10)
   ) as t2 ,
    sum( 
   	       ROUND( 		  ( br_bonus_3)*( (	100-( b_share_m+b_myshare_3  ))/100)  ,2)
   ) as t3 ,

   
     sum(
   		  ROUND( 				(b_total)*(( b_myshare_2)/100)  ,2)
   ) as r1 ,
   sum(
		  	ROUND( 		(  (br_pay_2-b_total)* (( b_myshare_2)/100)  ) +   (br_pay_3-br_pay_2) - ( (br_pay_3-br_pay_2)*(b_myshare_3/100) )   ,10)
   ) as r2 ,
   sum(
    ROUND( 	 	(  (-br_bonus_3)* (( b_myshare_2)/100)  ) +      (br_bonus_2-br_bonus_3)-  ( (br_bonus_2-br_bonus_3)*((b_myshare_3)/100) )   ,2)		         
   ) as r3 
   
   

   
   
 from bom_tb_lotto_bill_play_live where   r_agent_id like '%*$rs[r_id]*%'     $timew ";
$num=sql_array($sql);
 if(($num[m1])==0){
$sql="select   

    sum(ROUND( 	b_total  ,2)) as m1 ,
   
 sum( 
   	     ROUND( 		  ( -b_total)*( (	100-( b_share_m+b_myshare_3  ))/100)  ,2)
   ) as t1 ,
 sum( 
   	      ROUND( 		  ( b_total-br_pay_3)*( (	100-( b_share_m+b_myshare_3  ))/100)  ,10)
   ) as t2 ,
    sum( 
   	       ROUND( 		  ( br_bonus_3)*( (	100-( b_share_m+b_myshare_3  ))/100)  ,2)
   ) as t3 ,

   
     sum(
   		  ROUND( 				(b_total)*(( b_myshare_2)/100)  ,2)
   ) as r1 ,
   sum(
		  	ROUND( 		(  (br_pay_2-b_total)* (( b_myshare_2)/100)  ) +   (br_pay_3-br_pay_2) - ( (br_pay_3-br_pay_2)*(b_myshare_3/100) )   ,10)
   ) as r2 ,
   sum(
    ROUND( 	 	(  (-br_bonus_3)* (( b_myshare_2)/100)  ) +      (br_bonus_2-br_bonus_3)-  ( (br_bonus_2-br_bonus_3)*((b_myshare_3)/100) )   ,2)		         
   ) as r3 
   
   

   
   
 from bom_tb_lotto_bill_play where   r_agent_id like '%*$rs[r_id]*%'     $timew ";
 }
$rslot=sql_array($sql);


$xm_sum1=($rslot[t1])+(($rslot[t3])+($rslot[t2]));

$xm_sum2=($rslot[r1])+(($rslot[r3])+($rslot[r2]));


$sum10a=-(($rslot[t1])+($rslot[r1]));


$sum11a=-(($rslot[t2])+($rslot[r2]));	


$sum12a=-(($rslot[t3])+($rslot[r3]));	


$xm_sum3=$sum10a+($sum12a+$sum11a);

$sum14a=-(($xm_sum1)+($xm_sum2));	


if($sum14a>0){###############

$sum15[]=$sum14a;	
 ?>     
<?=$rs[r_user];?>= <?=_cbn( $sum14a ,2);?><br> 
  <? }  }?>
---------------<br>
รวมส่งคืน  = <?=_cbn(@array_sum($sum15),2);?><br>
---------------<br>