<?
  include "inc_head_bySession.php";
  
$zone=1;
$rob=1;
$date=$_GET['d'];
if($date!=""){
$dd=" and ok_date='$date'";
}
$sql="select * from bom_tb_lotto_ok where lot_zone='$zone' and lot_rob='$rob' $dd  order by ok_id desc limit 1";
$re_ok=sql_array($sql);

$ok_id=$re_ok['ok_id'];
$o_active=$re_ok['o_active'];
if($o_active==0){
	$tb="bom_tb_lotto_bill_play_live";
	}else{
	$tb="bom_tb_lotto_bill_play";	
   }	


if($_GET["z"]==""){
?>
<table class="table table-bordered table-hover">

<tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=1;	
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3(2โต๊ด)", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย";
*/
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number='".$_GET["num"]."' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].']  <b class="cbu">'.$_GET["num"]."</b> = ".number_format($sum10a)."</span>";
	}

?>
 </td></tr>   
 
 
 <tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=3;	
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3(2โต๊ด)", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย";
*/
	
$run_up=array(substr($_GET["num"], -3,1), substr($_GET["num"], -2,1),  substr($_GET["num"], -1,1));
############################################################
$tod_3=array();
$tod_3[]=$run_up[0].$run_up[1].$run_up[2];
$tod_3[]=$run_up[0].$run_up[2].$run_up[1];
$tod_3[]=$run_up[1].$run_up[0].$run_up[2];
$tod_3[]=$run_up[1].$run_up[2].$run_up[0];
$tod_3[]=$run_up[2].$run_up[0].$run_up[1];
$tod_3[]=$run_up[2].$run_up[1].$run_up[0];
$tod_3 = array_unique( $tod_3 );		
############################################################
	foreach($tod_3 as $num_new){
		
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number like '".$num_new."' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].']  <b class="cbu">'.$num_new."</b> = ".number_format($sum10a)."</span>";
	}
	}
?>
 </td></tr> 
 
 <tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=4;	
$num2_up=substr($_GET["num"], -2);
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3(2โต๊ด)", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย";
*/
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number='".$num2_up."' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].']  <b class="cbu">'.$num2_up."</b> = ".number_format($sum10a)."</span>";
	}

?>
 </td></tr>   
 
 <tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=6;	
$run_up=array(substr($_GET["num"], -3,1), substr($_GET["num"], -2,1),  substr($_GET["num"], -1,1));

	foreach($run_up as $num_new){
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3(2โต๊ด)", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย";
*/
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number like '".$num_new."' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].']  <b class="cbu">'.$num_new."</b> = ".number_format($sum10a)."</span>";
	}
	}
?>
 </td></tr>   
 
 
 <tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=8;	

	$pug_1=substr($_GET["num"], -1,1);
				if($pug_1>4){
					#สูง
		$num_txt="H";
				}else{
		$num_txt="L";
					}
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3(2โต๊ด)", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย";
*/
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number like '".$num_txt."' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].']  <b class="cbu">'.$num_txt."</b> = ".number_format($sum10a)."</span>";
	}

?>
 </td></tr>   
 
 
 <tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=9;	

	$pug_1=substr($_GET["num"], -2);
				if($pug_1>49){
					#สูง
		$num_txt="H";
				}else{
		$num_txt="L";
					}
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3(2โต๊ด)", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย";
*/
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number like '".$num_txt."' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].']  <b class="cbu">'.$num_txt."</b> = ".number_format($sum10a)."</span>";
	}

?>
 </td></tr>   
 
 <tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=10;	

	$pug_1=$_GET["num"];
				if($pug_1>499){
					#สูง
		$num_txt="H";
				}else{
		$num_txt="L";
					}
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3(2โต๊ด)", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย";
*/
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number like '".$num_txt."' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].']  <b class="cbu">'.$num_txt."</b> = ".number_format($sum10a)."</span>";
	}

?>
 </td></tr>  
 
  <tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=12;	

	$pug_1=substr($_GET["num"], -1,1);
			if($pug_1%2==1){
				# คี่
		$num_txt="E";
				}else{
				# คู่
		$num_txt="K";
					}
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3(2โต๊ด)", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย";
*/
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number like '".$num_txt."' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].']  <b class="cbu">'.$num_txt."</b> = ".number_format($sum10a)."</span>";
	}

?>
 </td></tr>   
 
 
  <tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=13;	


$tod_2in3=array();
$tod_2in3[]=substr($_GET["num"], -1,1).substr($_GET["num"], -2,1);
$tod_2in3[]=substr($_GET["num"], -1,1).substr($_GET["num"], -3,1);
$tod_2in3[]=substr($_GET["num"], -2,1).substr($_GET["num"], -1,1);
$tod_2in3[]=substr($_GET["num"], -2,1).substr($_GET["num"], -3,1);
$tod_2in3[]=substr($_GET["num"], -3,1).substr($_GET["num"], -1,1);
$tod_2in3[]=substr($_GET["num"], -3,1).substr($_GET["num"], -2,1);
$tod_2in3 = array_unique( $tod_2in3 );	

	foreach($tod_2in3 as $num_new){
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3(2โต๊ด)", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย";
*/
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number like '".$num_new."' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].']  <b class="cbu">'.$num_new."</b> = ".number_format($sum10a)."</span>";
	}
	}
?>
 </td></tr>   
 
  <tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=14;	


$run_up=array(substr($_GET["num"], -3,1), substr($_GET["num"], -2,1),  substr($_GET["num"], -1,1));
############################################################
$tod_3=array();
$tod_3[]=$run_up[0].$run_up[1].$run_up[2];
$tod_3[]=$run_up[0].$run_up[2].$run_up[1];
$tod_3[]=$run_up[1].$run_up[0].$run_up[2];
$tod_3[]=$run_up[1].$run_up[2].$run_up[0];
$tod_3[]=$run_up[2].$run_up[0].$run_up[1];
$tod_3[]=$run_up[2].$run_up[1].$run_up[0];
$tod_3 = array_unique( $tod_3 );		
############################################################
	foreach($tod_3 as $num_new){
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3(2โต๊ด)", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย";
*/
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number like '".$num_new."' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].']  <b class="cbu">'.$num_new."</b> = ".number_format($sum10a)."</span>";
	}
	}
?>
 </td></tr>   
 
 
  <tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=15;	


$run_up=array(substr($_GET["num"], -3,1), substr($_GET["num"], -2,1),  substr($_GET["num"], -1,1));
############################################################
$tod_3=array();
$tod_3[]=$run_up[0].$run_up[1].$run_up[2];
$tod_3[]=$run_up[0].$run_up[2].$run_up[1];
$tod_3[]=$run_up[1].$run_up[0].$run_up[2];
$tod_3[]=$run_up[1].$run_up[2].$run_up[0];
$tod_3[]=$run_up[2].$run_up[0].$run_up[1];
$tod_3[]=$run_up[2].$run_up[1].$run_up[0];
$tod_3 = array_unique( $tod_3 );		
############################################################
	foreach($tod_3 as $num_new){
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3(2โต๊ด)", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย";
*/
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number like '".$num_new."' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].']  <b class="cbu">'.$num_new."</b> = ".number_format($sum10a)."</span>";
	}
	}
?>
 </td></tr>   
 
 
 	<tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=21;	
$pug_1=substr($_GET["num"], -1,1);


/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3(2โต๊ด)", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย";
*/
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number='".$pug_1."' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].']  <b class="cbu">'.$pug_1."</b> = ".number_format($sum10a)."</span>";
	}
?>
 </td></tr>  
	
	
	<tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=22;	
$pug_10=substr($_GET["num"], -2,1);


/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3(2โต๊ด)", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย";
*/
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number='".$pug_10."' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].']  <b class="cbu">'.$pug_10."</b> = ".number_format($sum10a)."</span>";
	}
?>
 </td></tr> 
	
	<tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=23;	
$pug_100=substr($_GET["num"], -3,1);


/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3(2โต๊ด)", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย";
*/
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number='".$pug_100."' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].']  <b class="cbu">'.$pug_100."</b> = ".number_format($sum10a)."</span>";
	}
?>
 </td></tr> 
 
 
 
</table>
 <? } ?>
 
 
 
 
 
 <? if($_GET["z"]==1){?>
<table class="table table-bordered table-hover">


<tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=16;	
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3(2โต๊ด)", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย";
*/
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number='".$_GET["num"]."' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].']  <b class="cbu">'.$_GET["num"]."</b> = ".number_format($sum10a)."</span>";
	}

?>
 </td></tr>   

<tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=18;	
$num2_up=substr($_GET["num"], -2);
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3(2โต๊ด)", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย";
*/
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number='".$num2_up."' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].']  <b class="cbu">'.$num2_up."</b> = ".number_format($sum10a)."</span>";
	}

?>
 </td></tr>   
 
 
 <tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=19;	
$run_up=array(substr($_GET["num"], -3,1), substr($_GET["num"], -2,1),  substr($_GET["num"], -1,1));

	foreach($run_up as $num_new){
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3(2โต๊ด)", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย";
*/
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number like '".$num_new."' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].']  <b class="cbu">'.$num_new."</b> = ".number_format($sum10a)."</span>";
	}
	}
?>
 </td></tr>   
 
 <tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=20;	
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3(2โต๊ด)", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย";
*/
	
$run_up=array(substr($_GET["num"], -3,1), substr($_GET["num"], -2,1),  substr($_GET["num"], -1,1));
############################################################
$tod_3=array();
$tod_3[]=$run_up[0].$run_up[1].$run_up[2];
$tod_3[]=$run_up[0].$run_up[2].$run_up[1];
$tod_3[]=$run_up[1].$run_up[0].$run_up[2];
$tod_3[]=$run_up[1].$run_up[2].$run_up[0];
$tod_3[]=$run_up[2].$run_up[0].$run_up[1];
$tod_3[]=$run_up[2].$run_up[1].$run_up[0];
$tod_3 = array_unique( $tod_3 );		
############################################################
	foreach($tod_3 as $num_new){
		
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number like '".$num_new."' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].']  <b class="cbu">'.$num_new."</b> = ".number_format($sum10a)."</span>";
	}
	}
?>
 </td></tr> 


</table>
 <? } ?>
 
 
 
  <? if($_GET["z"]==2){?>
<table class="table table-bordered table-hover">

<tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=5;	
$num2_up=substr($_GET["num"], -2);
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3(2โต๊ด)", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย";
*/
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number='".$num2_up."' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].']  <b class="cbu">'.$num2_up."</b> = ".number_format($sum10a)."</span>";
	}

?>
 </td></tr>   

</table>
 <? } ?>
 
 
   <? if($_GET["z"]==3){?>
<table class="table table-bordered table-hover">

<tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=2;	
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3(2โต๊ด)", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย";
*/
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number='".$_GET["num"]."' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].']  <b class="cbu">'.$_GET["num"]."</b> = ".number_format($sum10a)."</span>";
	}

?>
 </td></tr>   
 
 <tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=17;	
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3(2โต๊ด)", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย";
*/
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number='".$_GET["num"]."' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].']  <b class="cbu">'.$_GET["num"]."</b> = ".number_format($sum10a)."</span>";
	}

?>
 </td></tr>   
 
</table>
 <? } ?>









