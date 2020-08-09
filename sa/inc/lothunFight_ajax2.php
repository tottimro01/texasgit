<?
  include "inc_head_bySession.php";

if($_GET["num"]!=""){
	
if($_GET['rob']==""){
	$_GET['rob']=1;
	}
$zone=$_GET['zone'];
$rob=$_GET['rob'];
$date=$_GET['d'];
 $sql="select * from bom_tb_lotto_ok where lot_zone='$zone' and lot_rob='$rob' and ok_date='$date' order by ok_id desc limit 1";
$re_ok=sql_array($sql);

$ok_id=$re_ok['ok_id'];
$o_active=$re_ok['o_active'];
if($o_active==0){
	$tb="bom_tb_lotto_bill_play_live";
	}else{
	$tb="bom_tb_lotto_bill_play";	
   }	
	
if($_GET["z"]==""){




#print_r($lotHun_typeArry);
?>

<table class="table table-bordered table-hover">

	
	<tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=1;	
	/*
$lot_type["th"][3]= array(1 =>"3บน", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย"
,25 =>"4ตัว", 26 =>"4โต๊ด", 31 =>"หวยชุด"
);
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
$lot_type["th"][3]= array(1 =>"3บน", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย"
,25 =>"4ตัว", 26 =>"4โต๊ด", 31 =>"หวยชุด"
);
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
$lot_type["th"][3]= array(1 =>"3บน", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย"
,25 =>"4ตัว", 26 =>"4โต๊ด", 31 =>"หวยชุด"
);
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
$lot_type["th"][3]= array(1 =>"3บน", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย"
,25 =>"4ตัว", 26 =>"4โต๊ด", 31 =>"หวยชุด"
);
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
$lot_type["th"][3]= array(1 =>"3บน", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย"
,25 =>"4ตัว", 26 =>"4โต๊ด", 31 =>"หวยชุด"
);
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
$lot_type["th"][3]= array(1 =>"3บน", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย"
,25 =>"4ตัว", 26 =>"4โต๊ด", 31 =>"หวยชุด"
);
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
$lot_type["th"][3]= array(1 =>"3บน", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย"
,25 =>"4ตัว", 26 =>"4โต๊ด", 31 =>"หวยชุด"
);
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
<? }  ?>


<? if($_GET["z"]==1){?>
<table class="table table-bordered table-hover">

	
	<tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=25;	
	/*
$lot_type["th"][3]= array(1 =>"3บน", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย"
,25 =>"4ตัว", 26 =>"4โต๊ด", 31 =>"หวยชุด"
);
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
$lottypex=26;	
	/*
$lot_type["th"][3]= array(1 =>"3บน", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย"
,25 =>"4ตัว", 26 =>"4โต๊ด", 31 =>"หวยชุด"
);
*/
					 
        $num_ok=array();
		$num_up=array(substr($_GET["num"], -4,1), substr($_GET["num"], -3,1), substr($_GET["num"], -2,1),  substr($_GET["num"], -1,1));
		$num_ok[]=$num_up[0].$num_up[1].$num_up[2].$num_up[3];
		$num_ok[]=$num_up[0].$num_up[1].$num_up[3].$num_up[2];
		$num_ok[]=$num_up[0].$num_up[2].$num_up[1].$num_up[3];
		$num_ok[]=$num_up[0].$num_up[2].$num_up[3].$num_up[1];
		$num_ok[]=$num_up[0].$num_up[3].$num_up[2].$num_up[1];
		$num_ok[]=$num_up[0].$num_up[3].$num_up[1].$num_up[2];
		
		$num_ok[]=$num_up[1].$num_up[0].$num_up[2].$num_up[3];
		$num_ok[]=$num_up[1].$num_up[0].$num_up[3].$num_up[2];
		$num_ok[]=$num_up[1].$num_up[2].$num_up[0].$num_up[3];
		$num_ok[]=$num_up[1].$num_up[2].$num_up[3].$num_up[0];
		$num_ok[]=$num_up[1].$num_up[3].$num_up[2].$num_up[0];
		$num_ok[]=$num_up[1].$num_up[3].$num_up[0].$num_up[2];
		
		$num_ok[]=$num_up[2].$num_up[0].$num_up[1].$num_up[3];
		$num_ok[]=$num_up[2].$num_up[0].$num_up[3].$num_up[1];
		$num_ok[]=$num_up[2].$num_up[1].$num_up[0].$num_up[3];
		$num_ok[]=$num_up[2].$num_up[1].$num_up[3].$num_up[0];
		$num_ok[]=$num_up[2].$num_up[3].$num_up[1].$num_up[0];
		$num_ok[]=$num_up[2].$num_up[3].$num_up[0].$num_up[1];
		
		$num_ok[]=$num_up[3].$num_up[0].$num_up[1].$num_up[2];
		$num_ok[]=$num_up[3].$num_up[0].$num_up[2].$num_up[1];
		$num_ok[]=$num_up[3].$num_up[1].$num_up[0].$num_up[2];
		$num_ok[]=$num_up[3].$num_up[1].$num_up[2].$num_up[0];
		$num_ok[]=$num_up[3].$num_up[2].$num_up[1].$num_up[0];
		$num_ok[]=$num_up[3].$num_up[2].$num_up[0].$num_up[1];
		
		$num_ok = array_unique( $num_ok );
	#	print_r($num_ok);
		foreach($num_ok as $num_new){					 
					 
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
<? }  ?>




<? if($_GET["z"]==2){?>
<table class="table table-bordered table-hover">

		<tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=31;	
	/*
$lot_type["th"][3]= array(1 =>"3บน", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย"
,25 =>"4ตัว", 26 =>"4โต๊ด", 31 =>"หวยชุด"
);
*/
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number='".$_GET["num"]."' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].']['.$lot_type["th"][$zone][25].']  <b class="cbu">'.$_GET["num"]."</b> = ".number_format($sum10a)."</span>";
	}

?>
 </td></tr>   
	
	
	
	<tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=31;	
	/*
$lot_type["th"][3]= array(1 =>"3บน", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย"
,25 =>"4ตัว", 26 =>"4โต๊ด", 31 =>"หวยชุด"
);
*/
	
       $num_ok=array();
		$num_up=array(substr($_GET["num"], -4,1), substr($_GET["num"], -3,1), substr($_GET["num"], -2,1),  substr($_GET["num"], -1,1));
		#$num_ok[]=$num_up[0].$num_up[1].$num_up[2].$num_up[3];
		$num_ok[]=$num_up[0].$num_up[1].$num_up[3].$num_up[2];
		$num_ok[]=$num_up[0].$num_up[2].$num_up[1].$num_up[3];
		$num_ok[]=$num_up[0].$num_up[2].$num_up[3].$num_up[1];
		$num_ok[]=$num_up[0].$num_up[3].$num_up[2].$num_up[1];
		$num_ok[]=$num_up[0].$num_up[3].$num_up[1].$num_up[2];
		
		$num_ok[]=$num_up[1].$num_up[0].$num_up[2].$num_up[3];
		$num_ok[]=$num_up[1].$num_up[0].$num_up[3].$num_up[2];
		$num_ok[]=$num_up[1].$num_up[2].$num_up[0].$num_up[3];
		$num_ok[]=$num_up[1].$num_up[2].$num_up[3].$num_up[0];
		$num_ok[]=$num_up[1].$num_up[3].$num_up[2].$num_up[0];
		$num_ok[]=$num_up[1].$num_up[3].$num_up[0].$num_up[2];
		
		$num_ok[]=$num_up[2].$num_up[0].$num_up[1].$num_up[3];
		$num_ok[]=$num_up[2].$num_up[0].$num_up[3].$num_up[1];
		$num_ok[]=$num_up[2].$num_up[1].$num_up[0].$num_up[3];
		$num_ok[]=$num_up[2].$num_up[1].$num_up[3].$num_up[0];
		$num_ok[]=$num_up[2].$num_up[3].$num_up[1].$num_up[0];
		$num_ok[]=$num_up[2].$num_up[3].$num_up[0].$num_up[1];
		
		$num_ok[]=$num_up[3].$num_up[0].$num_up[1].$num_up[2];
		$num_ok[]=$num_up[3].$num_up[0].$num_up[2].$num_up[1];
		$num_ok[]=$num_up[3].$num_up[1].$num_up[0].$num_up[2];
		$num_ok[]=$num_up[3].$num_up[1].$num_up[2].$num_up[0];
		$num_ok[]=$num_up[3].$num_up[2].$num_up[1].$num_up[0];
		$num_ok[]=$num_up[3].$num_up[2].$num_up[0].$num_up[1];
		
		$num_ok = array_unique( $num_ok );
	#	print_r($num_ok);
		foreach($num_ok as $num_new){	
	
	
	
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number like '".$num_new."' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].']['.$lot_type["th"][$zone][26].']  <b class="cbu">'.$num_new."</b> = ".number_format($sum10a)."</span>";
	}
		}
?>
 </td></tr>   
	
	
	
	<tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=31;	
	/*
$lot_type["th"][3]= array(1 =>"3บน", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย"
,25 =>"4ตัว", 26 =>"4โต๊ด", 31 =>"หวยชุด"
);
*/
	
$num_ok=array();
$num_up=array(substr($_GET["num"], -4,1), substr($_GET["num"], -3,1), substr($_GET["num"], -2,1),  substr($_GET["num"], -1,1));
$num_ok[]=$num_up[1].$num_up[2].$num_up[3];
$num_ok = array_unique( $num_ok );
	
foreach($num_ok as $num_new){	
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number like '%".$num_new."' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].']['.$lot_type["th"][$zone][1].']  <b class="cbu">'.$num_new."</b> = ".number_format($sum10a)."</span>";
	}
	}
?>
 </td></tr>   
	
	
	
	<tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=31;	
	/*
$lot_type["th"][3]= array(1 =>"3บน", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย"
,25 =>"4ตัว", 26 =>"4โต๊ด", 31 =>"หวยชุด"
);
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
    from $tb where    ok_id='$ok_id'   and play_number like '%".$num_new."' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].']['.$lot_type["th"][$zone][3].']  <b class="cbu">'.$num_new."</b> = ".number_format($sum10a)."</span>";
	}
	}
?>
 </td></tr> 


	<tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=31;	
	/*
$lot_type["th"][3]= array(1 =>"3บน", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย"
,25 =>"4ตัว", 26 =>"4โต๊ด", 31 =>"หวยชุด"
);
*/
	
$num_ok=array();
$num_up=array(substr($_GET["num"], -4,1), substr($_GET["num"], -3,1), substr($_GET["num"], -2,1),  substr($_GET["num"], -1,1));
$num_ok[]=$num_up[0].$num_up[1].$num_up[2];
$num_ok = array_unique( $num_ok );
	
foreach($num_ok as $num_new){	

	
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number like '".$num_new."%' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].'][3หน้า]  <b class="cbu">'.$num_new."</b> = ".number_format($sum10a)."</span>";
	}
}
?>
 </td></tr>   
	
	
	<tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=31;	
	/*
$lot_type["th"][3]= array(1 =>"3บน", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย"
,25 =>"4ตัว", 26 =>"4โต๊ด", 31 =>"หวยชุด"
);
*/
	
$num_ok=array();
$num_up=array(substr($_GET["num"], -4,1), substr($_GET["num"], -3,1), substr($_GET["num"], -2,1),  substr($_GET["num"], -1,1));
$num_ok[]=$num_up[0].$num_up[1];
$num_ok = array_unique( $num_ok );
	
foreach($num_ok as $num_new){	

	
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number like '".$num_new."%' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].'][2หน้า]  <b class="cbu">'.$num_new."</b> = ".number_format($sum10a)."</span>";
	}
}
?>
 </td></tr>   
	
	
	
	<tr><td colspan="100%" style="border: 1px solid #bcbcbc;">
	<?
$lottypex=31;	
	/*
$lot_type["th"][3]= array(1 =>"3บน", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย"
,25 =>"4ตัว", 26 =>"4โต๊ด", 31 =>"หวยชุด"
);
*/
	
$num_ok=array();
$num_up=array(substr($_GET["num"], -4,1), substr($_GET["num"], -3,1), substr($_GET["num"], -2,1),  substr($_GET["num"], -1,1));
$num_ok[]=$num_up[2].$num_up[3];
$num_ok = array_unique( $num_ok );
	
foreach($num_ok as $num_new){	

	
$sql="select 
   sum(
   ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
    from $tb where    ok_id='$ok_id'   and play_number like '%".$num_new."' and lot_type=$lottypex and b_accept=1    order by lot_type asc , play_number asc ";
	$re=sql_array($sql);
	$sum10a=($re[r1]);
	if($sum10a>0){
   echo '<span class="ff_ss cu" style="background: #FFCBA2;">['.$lot_type["th"][$zone][$lottypex].']['.$lot_type["th"][$zone][4].']  <b class="cbu">'.$num_new."</b> = ".number_format($sum10a)."</span>";
	}
}
?>
 </td></tr>   
	
	</table>
<? }  ?>



<? }  ?>


