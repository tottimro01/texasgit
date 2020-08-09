<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php   

  require('inc_head_bySession.php');
  
  $d = $_POST["d"];
$zone = $_POST["zone"];
$rob = $_POST["rob"];

$ag_level=$_SESSION["r_level"];
$r_level=$_SESSION["r_level"]+1;
$r_id=$_SESSION["r_id"];


$sql="select * from bom_tb_lotto_ok  where lot_zone=$zone and  lot_rob=$rob and ok_date='$d'   order by ok_id desc limit 1";
$re_ok=sql_array($sql);

$ok_id=$re_ok['ok_id'];

$data["val"] = array();
  foreach ($lotHun_typeArry as $key => $value)
  {
    if($key != 31)
      {
		  
		  
$sql="select 
sum(
   	ROUND( 	(b_total)*((b_myshare_".$ag_level.")/100) ,10)
   ) as r1 ,  
sum(
   	ROUND( 	-( b_total - br_pay_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as r2  ,  
    sum(
   	ROUND( 	b_total  ,10)
   ) as c3  ,  
    sum(
   	ROUND( 	-( br_bonus_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as c4 
  from bom_tb_lotto_bill_play_live where    ok_id='$ok_id'  and r_agent_id like '%*$r_id*%'   and lot_type='$key'  and b_accept=1  ";
$re1=sql_array($sql);

$sql="select 
   sum(
   	ROUND( 	(b_total)*((b_share_m)/100) ,10)
   ) as r1 ,  
  sum(
   	ROUND( 	-( b_total - b_pay)*((b_share_m)/100) ,10)
   ) as r2   ,  
    sum(
   	ROUND( 	b_total  ,10)
   ) as c3  ,  
    sum(
   	ROUND( 	-( b_bonus )*((b_share_m)/100) ,10)
   ) as c4 
  from bom_tb_lotto_bill_play_live where    ok_id='$ok_id'  and r_id = '$r_id'   and lot_type='$key'     and b_accept=1   ";
  $re2=sql_array($sql);
  
  $sum1=$re1['r1']+$re2['r1'];
  $sum2=$re1['r2']+$re2['r2'];
  $sum3=$re1['c3']+$re2['c3'];
   $sum4=$re1['c4']+$re2['c4'];
  $sum5=$sum1+$sum2+$sum4; 
		  
         $data["val"][] = array(
            "lottype" => $value,
            "key" => $key,
			"all_r1" => number_format($sum1,2),
			"all_r2" => number_format($sum2,2),
			"all_sum" => number_format($sum3,2),
			"all_r3" =>number_format($sum4,2),
			"all_total" => _cbn($sum5,2),
         ); 
      }
  }

  echo json_encode($data);
?>