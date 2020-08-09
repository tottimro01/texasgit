<meta charset="utf-8">
<?
require('../inc/conn.php');
require('../inc/function.php');


?>


<script type='text/javascript' >
function _w(url){
	window.location=url;
	}
</script>
<title>LOTTO</title>


 งวดวันที่ :
              <select   onchange="_w('?d='+this.value);">
               <option value=''  <? if($_GET[d]==""){echo'selected';}?>>เลือกวัน</option>

  <?
$re=sql_query("select * from bom_tb_lotto_ok where 	lot_zone=1 and lot_rob=1  order by  ok_id desc limit 12 ");
while($rs=sql_fetch($re)){
  ?>    
  <option value='<?=$rs["ok_date"]?>'  <? if($_GET[d]==$rs["ok_date"]){echo'selected';}?>><?=$rs["ok_date"]?></option>
                <? } ?>
</select>
<br>---------------<br>
<?  if($_GET[d]!=""){?>




 <?
  ########เบียร์ สด
  $mid=0;
$re=sql_query("select * from bom_tb_member where m_id=$mid order by  m_user asc");
while($rs=sql_fetch($re)){
	
	
$timew=" and (b_date = '$_GET[d]') and b_accept=1 "; 
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=4 or lot_type=5)   $timew ";
$rslot1=sql_array($sql);

##############3ตัว
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=1 or lot_type=3)   $timew ";
$rslot2=sql_array($sql);


##############วิ่ง
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=6 or lot_type=7)   $timew ";
$rslot3=sql_array($sql);
	
$bet_new= round((1000/70),2);
$totaltua=( $rslot1[m1] / $bet_new);

$bonus=( $rslot1[m3] +$rslot2[m3] +$rslot3[m3]);
$bet=((($totaltua*10.71)) + ($rslot2[m1]) + ($rslot3[m1]) );
$total_x=$bet - ($rslot2[m2] +$rslot3[m2] ) ;

  ?>    
<textarea name="tmid_<?=$rs[m_id];?>" cols="50" rows="14">ยอดหวย วันที่ <?=$_GET[d];?>  <?=$rs[m_user];?> :  [ <?=$rs[m_name];?> ]
ยอดซื้อ2ตัว 10.71 x <?=number_format($totaltua ,0);?> ตัว= <?=number_format(-($totaltua*10.71) ,2);?>

ยอดซื้อ3ตัว = <?=number_format(-$rslot2[m1] ,2);?>

ส่วนลด 25%= <?=number_format($rslot2[m2] ,2);?>

ยอดซื้อเลขวิ่ง=  <?=number_format(-$rslot3[m1] ,2);?>

ส่วนลด 10%=  <?=number_format($rslot3[m2] ,2);?>

------------
รวม=<?=number_format( - $total_x   ,0);?>

------------
ยอดถูก =  <?=number_format($bonus ,0);?>

------------
ยอดเคลียร์=<?=number_format($bonus - $total_x   ,0);?>

</textarea>
<br><br>
<? } ?>




<?
  ########เบียร์ ตัว
  $mid=696;
$re=sql_query("select * from bom_tb_member where m_id=$mid order by  m_user asc");
while($rs=sql_fetch($re)){
	
	
$timew=" and (b_date = '$_GET[d]') and b_accept=1 "; 
 $sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=4 or lot_type=5)   $timew ";
$rslot1=sql_array($sql);

##############3ตัว
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=1 or lot_type=3)   $timew ";
$rslot2=sql_array($sql);


##############วิ่ง
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=6 or lot_type=7)   $timew ";
$rslot3=sql_array($sql);
	
$bet_new= round((1000/70),2);
$totaltua=( $rslot1[m1] / $bet_new);

$bonus=( $rslot1[m3] +$rslot2[m3] +$rslot3[m3]);
$bet=((($totaltua*10.71)) + ($rslot2[m1]) + ($rslot3[m1]) );
$total_x=$bet - ($rslot2[m2] +$rslot3[m2] ) ;

$sum1=$bonus - $total_x;

  ?>    
<textarea name="tmid_<?=$rs[m_id];?>" cols="50" rows="14">ยอดหวย วันที่ <?=$_GET[d];?>  <?=$rs[m_user];?> :  [ <?=$rs[m_name];?> ]
ยอดซื้อ2ตัว 10.71 x <?=number_format($totaltua ,0);?> ตัว= <?=number_format(-($totaltua*10.71) ,2);?>

ยอดซื้อ3ตัว = <?=number_format(-$rslot2[m1] ,2);?>

ส่วนลด 25%= <?=number_format($rslot2[m2] ,2);?>

ยอดซื้อเลขวิ่ง=  <?=number_format(-$rslot3[m1] ,2);?>

ส่วนลด 10%=  <?=number_format($rslot3[m2] ,2);?>

------------
รวม=<?=number_format( - $total_x   ,0);?>

------------
ยอดถูก =  <?=number_format($bonus ,0);?>

------------
ยอดเคลียร์=<?=number_format($bonus - $total_x   ,0);?>

</textarea>
<br><br>
<? } ?>


<?
  ########เบียร์ บาท
  $mid=504;
$re=sql_query("select * from bom_tb_member where m_id=$mid order by  m_user asc");
while($rs=sql_fetch($re)){
	
	
$timew=" and (b_date = '$_GET[d]') and b_accept=1 "; 
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
     sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=4 or lot_type=5)   $timew ";
$rslot1=sql_array($sql);

##############3ตัว ตรง
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=1 )   $timew ";
$rslot2=sql_array($sql);


##############3ตัว โต๊ด
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  ( lot_type=3)   $timew ";
$rslot2a=sql_array($sql);


##############วิ่ง
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=6 or lot_type=7)   $timew ";
$rslot3=sql_array($sql);
	

$total_x = ($rslot1[m1]+$rslot2[m1]+$rslot2a[m1]+$rslot3[m1]) - ($rslot1[m2]+$rslot2[m2]+$rslot2a[m2]+$rslot3[m2]);
$bonus=( $rslot1[m3] +$rslot2[m3] +$rslot2a[m3] +$rslot3[m3]);
#$bet=((($totaltua*10.71)) + ($rslot2[m1]) + ($rslot3[m1]) );
#$total_x=$bet - ($rslot2[m2] +$rslot3[m2] ) ;

$sum2=$bonus - $total_x;

  ?>    
<textarea name="tmid_<?=$rs[m_id];?>" cols="50" rows="20">ยอดหวย วันที่ <?=$_GET[d];?>  <?=$rs[m_user];?> :  [ <?=$rs[m_name];?> ]
ยอดซื้อ2ตัว  =<?=number_format(-$rslot1[m1] ,2);?>

ยอดส่วนลด 25%= <?=number_format($rslot1[m2] ,2);?>


ยอดซื้อ3ตัว ตรง = <?=number_format(-$rslot2[m1] ,2);?>

ส่วนลด 25%= <?=number_format($rslot2[m2] ,2);?>


ยอดซื้อ3โต๊ด ตรง = <?=number_format(-$rslot2a[m1] ,2);?>

ส่วนลด 22%= <?=number_format($rslot2a[m2] ,2);?>


ยอดซื้อเลขวิ่ง=  <?=number_format(-$rslot3[m1] ,2);?>

ส่วนลด 10%=  <?=number_format($rslot3[m2] ,2);?>

------------
รวม=<?=number_format( - $total_x   ,0);?>

------------
ยอดถูก =  <?=number_format($bonus ,0);?>

------------
ยอดเคลียร์=<?=number_format($bonus - $total_x   ,0);?>

</textarea>
<br><br>
<? } ?>



<?
  ########เบียร์ บาท2
  $mid=0;
$re=sql_query("select * from bom_tb_member where m_id=$mid order by  m_user asc");
while($rs=sql_fetch($re)){
	
	
$timew=" and (b_date = '$_GET[d]') and b_accept=1 "; 
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
     sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=4 or lot_type=5)   $timew ";
$rslot1=sql_array($sql);

##############3ตัว ตรง
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=1 )   $timew ";
$rslot2=sql_array($sql);


##############3ตัว โต๊ด
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  ( lot_type=3)   $timew ";
$rslot2a=sql_array($sql);


##############วิ่ง
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=6 or lot_type=7)   $timew ";
$rslot3=sql_array($sql);
	

$total_x = ($rslot1[m1]+$rslot2[m1]+$rslot2a[m1]+$rslot3[m1]) - ($rslot1[m2]+$rslot2[m2]+$rslot2a[m2]+$rslot3[m2]);
$bonus=( $rslot1[m3] +$rslot2[m3] +$rslot2a[m3] +$rslot3[m3]);
#$bet=((($totaltua*10.71)) + ($rslot2[m1]) + ($rslot3[m1]) );
#$total_x=$bet - ($rslot2[m2] +$rslot3[m2] ) ;

$sum3=$bonus - $total_x;

  ?>    
<textarea name="tmid_<?=$rs[m_id];?>" cols="50" rows="20">ยอดหวย วันที่ <?=$_GET[d];?>  <?=$rs[m_user];?> :  [ <?=$rs[m_name];?> ]
ยอดซื้อ2ตัว  =<?=number_format(-$rslot1[m1] ,2);?>

ยอดส่วนลด 25%= <?=number_format($rslot1[m2] ,2);?>


ยอดซื้อ3ตัว ตรง = <?=number_format(-$rslot2[m1] ,2);?>

ส่วนลด 25%= <?=number_format($rslot2[m2] ,2);?>


ยอดซื้อ3โต๊ด ตรง = <?=number_format(-$rslot2a[m1] ,2);?>

ส่วนลด 22%= <?=number_format($rslot2a[m2] ,2);?>


ยอดซื้อเลขวิ่ง=  <?=number_format(-$rslot3[m1] ,2);?>

ส่วนลด 10%=  <?=number_format($rslot3[m2] ,2);?>

------------
รวม=<?=number_format( - $total_x   ,0);?>

------------
ยอดถูก =  <?=number_format($bonus ,0);?>

------------
ยอดเคลียร์=<?=number_format($bonus - $total_x   ,0);?>

</textarea>
<br><br>
<? } ?>



<textarea name="tmid_x<?=$mid;?>" cols="50" rows="3">
รวม แบบบาท + แบบตัว = <?=number_format($sum1+$sum2+$sum3 ,2);?>
</textarea>

<br><br>



<?
  ########ฟ้า
  $mid=0;
$re=sql_query("select * from bom_tb_member where m_id=$mid order by  m_user asc");
while($rs=sql_fetch($re)){
	
	
$timew=" and (b_date = '$_GET[d]') and b_accept=1 "; 
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=4 or lot_type=5)   $timew ";
$rslot1=sql_array($sql);

##############3ตัว
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=1 or lot_type=3)   $timew ";
$rslot2=sql_array($sql);


##############วิ่ง
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=6 or lot_type=7)   $timew ";
$rslot3=sql_array($sql);
	
$bet_new= round((1000/70),2);
$totaltua=( $rslot1[m1] / $bet_new);

$bonus=( $rslot1[m3] +$rslot2[m3] +$rslot3[m3]);
$bet=((($totaltua*10.71)) + ($rslot2[m1]) + ($rslot3[m1]) );
$total_x=$bet - ($rslot2[m2] +$rslot3[m2] ) ;

$sum1=$bonus - $total_x;

  ?>    
<textarea name="tmid_<?=$rs[m_id];?>" cols="50" rows="14">ยอดหวย วันที่ <?=$_GET[d];?>  <?=$rs[m_user];?> :  [ <?=$rs[m_name];?> ]
ยอดซื้อ2ตัว 10.71 x <?=number_format($totaltua ,0);?> ตัว= <?=number_format(-($totaltua*10.71) ,2);?>

ยอดซื้อ3ตัว = <?=number_format(-$rslot2[m1] ,2);?>

ส่วนลด 25%= <?=number_format($rslot2[m2] ,2);?>

ยอดซื้อเลขวิ่ง=  <?=number_format(-$rslot3[m1] ,2);?>

ส่วนลด 10%=  <?=number_format($rslot3[m2] ,2);?>

------------
รวม=<?=number_format( - $total_x   ,0);?>

------------
ยอดถูก =  <?=number_format($bonus ,0);?>

------------
ยอดเคลียร์=<?=number_format( - $total_x   ,0);?>

</textarea>
<br><br>
<? } ?>









<?
  ########นุ่น
  $mid=0;
$re=sql_query("select * from bom_tb_member where m_id=$mid order by  m_user asc");
while($rs=sql_fetch($re)){
	
	
$timew=" and (b_date = '$_GET[d]') and b_accept=1 "; 
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=4 or lot_type=5)   $timew ";
$rslot1=sql_array($sql);

##############3ตัว
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=1 or lot_type=3)   $timew ";
$rslot2=sql_array($sql);


##############วิ่ง
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=6 or lot_type=7)   $timew ";
$rslot3=sql_array($sql);
	
$bet_new= round((1000/70),2);
$totaltua=( $rslot1[m1] / $bet_new);

$bonus=( $rslot1[m3] +$rslot2[m3] +$rslot3[m3]);
$bet=((($totaltua*10.86)) + ($rslot2[m1]) + ($rslot3[m1]) );
$total_x=$bet - ($rslot2[m2] +$rslot3[m2] ) ;

$sum1=$bonus - $total_x;

  ?>    
<textarea name="tmid_<?=$rs[m_id];?>" cols="50" rows="14">ยอดหวย วันที่ <?=$_GET[d];?>  <?=$rs[m_user];?> :  [ <?=$rs[m_name];?> ]
ยอดซื้อ2ตัว 10.86 x <?=number_format($totaltua ,0);?> ตัว= <?=number_format(-($totaltua*10.86) ,2);?>

ยอดซื้อ3ตัว = <?=number_format(-$rslot2[m1] ,2);?>

ส่วนลด 28%= <?=number_format($rslot2[m2] ,2);?>

ยอดซื้อเลขวิ่ง=  <?=number_format(-$rslot3[m1] ,2);?>

ส่วนลด 10%=  <?=number_format($rslot3[m2] ,2);?>

------------
รวม=<?=number_format( - $total_x   ,0);?>

------------
ยอดถูก =  <?=number_format($bonus ,0);?>

------------
ยอดเคลียร์=<?=number_format( - $total_x   ,0);?>

</textarea>
<br><br>
<? } ?>



<?
  ########นุ่น สด
  $mid=1494;
$re=sql_query("select * from bom_tb_member where m_id=$mid order by  m_user asc");
while($rs=sql_fetch($re)){
	
	
$timew=" and (b_date = '$_GET[d]') and b_accept=1 "; 
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=4 or lot_type=5)   $timew ";
$rslot1=sql_array($sql);

##############3ตัว
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=1 or lot_type=3)   $timew ";
$rslot2=sql_array($sql);


##############วิ่ง
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=6 or lot_type=7)   $timew ";
$rslot3=sql_array($sql);
	
$bet_new= round((1000/70),2);
$totaltua=( $rslot1[m1] / $bet_new);

$bonus=( $rslot1[m3] +$rslot2[m3] +$rslot3[m3]);
$bet=((($totaltua*10.86)) + ($rslot2[m1]) + ($rslot3[m1]) );
$total_x=$bet - ($rslot2[m2] +$rslot3[m2] ) ;

$sum1=$bonus - $total_x;

  ?>    
<textarea name="tmid_<?=$rs[m_id];?>" cols="50" rows="14">ยอดหวย วันที่ <?=$_GET[d];?>  <?=$rs[m_user];?> :  [ <?=$rs[m_name];?> ]
ยอดซื้อ2ตัว 10.86 x <?=number_format($totaltua ,0);?> ตัว= <?=number_format(-($totaltua*10.86) ,2);?>

ยอดซื้อ3ตัว = <?=number_format(-$rslot2[m1] ,2);?>

ส่วนลด 28%= <?=number_format($rslot2[m2] ,2);?>

ยอดซื้อเลขวิ่ง=  <?=number_format(-$rslot3[m1] ,2);?>

ส่วนลด 10%=  <?=number_format($rslot3[m2] ,2);?>

------------
รวม=<?=number_format( - $total_x   ,0);?>

------------
ยอดถูก =  <?=number_format($bonus ,0);?>

------------
ยอดเคลียร์ สด=<?=number_format( $bonus - $total_x   ,0);?>

</textarea>
<br><br>
<? } ?>




<?
  #######โรจน์
  $mid=508;
$re=sql_query("select * from bom_tb_member where m_id=$mid order by  m_user asc");
while($rs=sql_fetch($re)){
	
	
$timew=" and (b_date = '$_GET[d]') and b_accept=1 "; 
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=4 or lot_type=5)   $timew ";
$rslot1=sql_array($sql);

##############3ตัว
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=1 or lot_type=3)   $timew ";
$rslot2=sql_array($sql);


##############วิ่ง
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=6 or lot_type=7)   $timew ";
$rslot3=sql_array($sql);
	
$bet_new= round((1000/70),2);
$totaltua=( $rslot1[m1] / $bet_new);

$bonus=( $rslot1[m3] +$rslot2[m3] +$rslot3[m3]);
$bet=((($totaltua*10.86)) + ($rslot2[m1]) + ($rslot3[m1]) );
$total_x=$bet - ($rslot2[m2] +$rslot3[m2] ) ;

$sum1=$bonus - $total_x;

  ?>    
<textarea name="tmid_<?=$rs[m_id];?>" cols="50" rows="14">ยอดหวย วันที่ <?=$_GET[d];?>  <?=$rs[m_user];?> :  [ <?=$rs[m_name];?> ]
ยอดซื้อ2ตัว 10.86 x <?=number_format($totaltua ,0);?> ตัว= <?=number_format(-($totaltua*10.86) ,2);?>

ยอดซื้อ3ตัว = <?=number_format(-$rslot2[m1] ,2);?>

ส่วนลด 28%= <?=number_format($rslot2[m2] ,2);?>

ยอดซื้อเลขวิ่ง=  <?=number_format(-$rslot3[m1] ,2);?>

ส่วนลด 10%=  <?=number_format($rslot3[m2] ,2);?>

------------
รวม=<?=number_format( - $total_x   ,0);?>

------------
ยอดถูก =  <?=number_format($bonus ,0);?>

------------
ยอดเคลียร์=<?=number_format( - $total_x   ,0);?>

</textarea>
<br><br>
<? } ?>





<?
  #######ฟ้า
  $mid=510;
$re=sql_query("select * from bom_tb_member where m_id=$mid order by  m_user asc");
while($rs=sql_fetch($re)){
	
	
$timew=" and (b_date = '$_GET[d]') and b_accept=1 "; 
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=4 or lot_type=5)   $timew ";
$rslot1=sql_array($sql);

##############3ตัว
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=1 or lot_type=3)   $timew ";
$rslot2=sql_array($sql);


##############วิ่ง
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=6 or lot_type=7)   $timew ";
$rslot3=sql_array($sql);
	
$bet_new= round((1000/70),2);
$totaltua=( $rslot1[m1] / $bet_new);

$bonus=( $rslot1[m3] +$rslot2[m3] +$rslot3[m3]);
$bet=((($totaltua*10.86)) + ($rslot2[m1]) + ($rslot3[m1]) );
$total_x=$bet - ($rslot2[m2] +$rslot3[m2] ) ;

$sum1=$bonus - $total_x;

  ?>    
<textarea name="tmid_<?=$rs[m_id];?>" cols="50" rows="14">ยอดหวย วันที่ <?=$_GET[d];?>  <?=$rs[m_user];?> :  [ <?=$rs[m_name];?> ]
ยอดซื้อ2ตัว 10.86 x <?=number_format($totaltua ,0);?> ตัว= <?=number_format(-($totaltua*10.86) ,2);?>

ยอดซื้อ3ตัว = <?=number_format(-$rslot2[m1] ,2);?>

ส่วนลด 28%= <?=number_format($rslot2[m2] ,2);?>

ยอดซื้อเลขวิ่ง=  <?=number_format(-$rslot3[m1] ,2);?>

ส่วนลด 10%=  <?=number_format($rslot3[m2] ,2);?>

------------
รวม=<?=number_format( - $total_x   ,0);?>

------------
ยอดถูก =  <?=number_format($bonus ,0);?>

------------
ยอดเคลียร์=<?=number_format( - $total_x   ,0);?>

</textarea>
<br><br>
<? } ?>








<?
  ########แหนม บาท1
  $mid=399;
$re=sql_query("select * from bom_tb_member where m_id=$mid order by  m_user asc");
while($rs=sql_fetch($re)){
	
	
$timew=" and (b_date = '$_GET[d]') and b_accept=1 "; 
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
     sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=4 or lot_type=5)   $timew ";
$rslot1=sql_array($sql);

##############3ตัว ตรง
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=1 )   $timew ";
$rslot2=sql_array($sql);


##############3ตัว โต๊ด
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  ( lot_type=3)   $timew ";
$rslot2a=sql_array($sql);


##############วิ่ง
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=6 or lot_type=7)   $timew ";
$rslot3=sql_array($sql);
	

$total_x = ($rslot1[m1]+$rslot2[m1]+$rslot2a[m1]+$rslot3[m1]) - ($rslot1[m2]+$rslot2[m2]+$rslot2a[m2]+$rslot3[m2]);
$bonus=( $rslot1[m3] +$rslot2[m3] +$rslot2a[m3] +$rslot3[m3]);
#$bet=((($totaltua*10.71)) + ($rslot2[m1]) + ($rslot3[m1]) );
#$total_x=$bet - ($rslot2[m2] +$rslot3[m2] ) ;

$sum1a=$bonus ;
$sum2a= $total_x;

  ?>    
<textarea name="tmid_<?=$rs[m_id];?>" cols="50" rows="20">ยอดหวย วันที่ <?=$_GET[d];?>  <?=$rs[m_user];?> :  [ <?=$rs[m_name];?> ]
ยอดซื้อ2ตัว  =<?=number_format(-$rslot1[m1] ,2);?>

ยอดส่วนลด 28%= <?=number_format($rslot1[m2] ,2);?>


ยอดซื้อ3ตัว ตรง = <?=number_format(-$rslot2[m1] ,2);?>

ส่วนลด 33%= <?=number_format($rslot2[m2] ,2);?>


ยอดซื้อ3โต๊ด = <?=number_format(-$rslot2a[m1] ,2);?>

ส่วนลด 33%= <?=number_format($rslot2a[m2] ,2);?>


ยอดซื้อเลขวิ่ง=  <?=number_format(-$rslot3[m1] ,2);?>

ส่วนลด 12%=  <?=number_format($rslot3[m2] ,2);?>

------------
รวม=<?=number_format( - $total_x   ,0);?>

------------
ยอดถูก =  <?=number_format($bonus ,0);?>

</textarea>
<br><br>
<? } ?>




<?
  ########แหนม บาท2
  $mid=1564;
$re=sql_query("select * from bom_tb_member where m_id=$mid order by  m_user asc");
while($rs=sql_fetch($re)){
	
	
$timew=" and (b_date = '$_GET[d]') and b_accept=1 "; 
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
     sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=4 or lot_type=5)   $timew ";
$rslot1=sql_array($sql);

##############3ตัว ตรง
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=1 )   $timew ";
$rslot2=sql_array($sql);


##############3ตัว โต๊ด
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  ( lot_type=3)   $timew ";
$rslot2a=sql_array($sql);


##############วิ่ง
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=6 or lot_type=7)   $timew ";
$rslot3=sql_array($sql);
	

$total_x = ($rslot1[m1]+$rslot2[m1]+$rslot2a[m1]+$rslot3[m1]) - ($rslot1[m2]+$rslot2[m2]+$rslot2a[m2]+$rslot3[m2]);
$bonus=( $rslot1[m3] +$rslot2[m3] +$rslot2a[m3] +$rslot3[m3]);
#$bet=((($totaltua*10.71)) + ($rslot2[m1]) + ($rslot3[m1]) );
#$total_x=$bet - ($rslot2[m2] +$rslot3[m2] ) ;

$sum1b=$bonus ;
$sum2b= $total_x;

  ?>    
<textarea name="tmid_<?=$rs[m_id];?>" cols="50" rows="20">ยอดหวย วันที่ <?=$_GET[d];?>  <?=$rs[m_user];?> :  [ <?=$rs[m_name];?> ]
ยอดซื้อ2ตัว  =<?=number_format(-$rslot1[m1] ,2);?>

ยอดส่วนลด 28%= <?=number_format($rslot1[m2] ,2);?>


ยอดซื้อ3ตัว ตรง = <?=number_format(-$rslot2[m1] ,2);?>

ส่วนลด 33%= <?=number_format($rslot2[m2] ,2);?>


ยอดซื้อ3โต๊ด = <?=number_format(-$rslot2a[m1] ,2);?>

ส่วนลด 33%= <?=number_format($rslot2a[m2] ,2);?>


ยอดซื้อเลขวิ่ง=  <?=number_format(-$rslot3[m1] ,2);?>

ส่วนลด 12%=  <?=number_format($rslot3[m2] ,2);?>

------------
รวม=<?=number_format( - $total_x   ,0);?>

------------
ยอดถูก =  <?=number_format($bonus ,0);?>

</textarea>
<br><br>
<? } ?>




<?
  ########แหนม ต้อย
  $mid=1102;
$re=sql_query("select * from bom_tb_member where m_id=$mid order by  m_user asc");
while($rs=sql_fetch($re)){
	
	
$timew=" and (b_date = '$_GET[d]') and b_accept=1 "; 
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
     sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=4 or lot_type=5)   $timew ";
$rslot1=sql_array($sql);

##############3ตัว ตรง
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=1 )   $timew ";
$rslot2=sql_array($sql);


##############3ตัว โต๊ด
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  ( lot_type=3)   $timew ";
$rslot2a=sql_array($sql);


##############วิ่ง
$sql="select   

   sum(ROUND( 	b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as m2 ,
     sum(
 ( ROUND( 	b_bonus  ,10))
   ) as m3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]' and  (lot_type=6 or lot_type=7)   $timew ";
$rslot3=sql_array($sql);
	

$total_x = ($rslot1[m1]+$rslot2[m1]+$rslot2a[m1]+$rslot3[m1]) - ($rslot1[m2]+$rslot2[m2]+$rslot2a[m2]+$rslot3[m2]);
$bonus=( $rslot1[m3] +$rslot2[m3] +$rslot2a[m3] +$rslot3[m3]);
#$bet=((($totaltua*10.71)) + ($rslot2[m1]) + ($rslot3[m1]) );
#$total_x=$bet - ($rslot2[m2] +$rslot3[m2] ) ;

$sum2=$bonus - $total_x;

  ?>    
<textarea name="tmid_<?=$rs[m_id];?>" cols="50" rows="20">ยอดหวย วันที่ <?=$_GET[d];?>  <?=$rs[m_user];?> :  [ <?=$rs[m_name];?> ]
ยอดซื้อ2ตัว  =<?=number_format(-$rslot1[m1] ,2);?>

ยอดส่วนลด 25%= <?=number_format($rslot1[m2] ,2);?>


ยอดซื้อ3ตัว ตรง = <?=number_format(-$rslot2[m1] ,2);?>

ส่วนลด 30%= <?=number_format($rslot2[m2] ,2);?>


ยอดซื้อ3โต๊ด ตรง = <?=number_format(-$rslot2a[m1] ,2);?>

ส่วนลด 30%= <?=number_format($rslot2a[m2] ,2);?>


ยอดซื้อเลขวิ่ง=  <?=number_format(-$rslot3[m1] ,2);?>

ส่วนลด 10%=  <?=number_format($rslot3[m2] ,2);?>

------------
รวม=<?=number_format( - $total_x   ,0);?>

------------
ยอดถูก =  <?=number_format($bonus ,0);?>

------------
ยอดเคลียร์=<?=number_format($bonus - $total_x   ,0);?>

</textarea>
<br><br>
<? } ?>




<textarea name="tmid_x<?=$mid;?>" cols="50" rows="3">
รวม ถูก  = <?=number_format($sum1a+$sum1b ,2);?>

รวม ส่งคืน  = <?=number_format($sum2a+$sum2b ,2);?>
</textarea>

<br><br>


 <? }# if($_GET[d]!=""){ ?>
 

