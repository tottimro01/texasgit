<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 	

require('inc_head_bySession.php');

	$zone = $_POST["zone"];
	$d 	  = $_POST["d"];
	$rob  = $_POST["rob"];
   $mid  = $_POST["mid"];
  $view  = $_POST["view"];
  $ag_level=$_SESSION["r_level"];
  $r_level=$_SESSION["r_level"]+1;

$sql="select * from bom_tb_lotto_ok  where lot_zone=1 and  lot_rob=1 and ok_date='$d'   order by ok_id desc limit 1";
$re_ok=sql_array($sql);

$ok_id=$re_ok['ok_id'];

$r_id=$_SESSION["r_id"];

$data = array();
$data["val"] = array();


if(strpos($mid,"rid")!== false){
	
   $sql="select * from bom_tb_agent   where  r_id = '".str_replace('rid','',$mid)."' ";   
   $rer = sql_array($sql);
   
  $user=$rer["r_user"];
  $id='rid'.$rer["r_id"];
  
  if($view=="a"){
	$aa=" and br_bonus_".$r_level." >0 ";
	}
  
  $sql="select 
     *,
  (
   	ROUND( 	(b_total)*((b_myshare_".$ag_level.")/100) ,10)
   ) as r1 ,  
    (
   	ROUND( 	-( b_total - br_pay_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as r2 ,  
    (
   	ROUND( 	b_total  ,10)
   ) as c3  ,  
    (
   	ROUND( 	-( br_bonus_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as c4 
   
  from bom_tb_lotto_bill_play_live where    ok_id='$ok_id'  and r_agent_id like '%*$rer[r_id]*%'    and b_accept=1  $aa order by lot_type asc , play_number asc  limit 20000   ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
	
  $data["val"][] = array(
         "mid" => $rer["r_id"],
         "muser" => $rer["r_user"],
         "number" => "".$rs["play_number"]." : [".$lot_typeArry[$rs["lot_type"]]."]",
         "user" => $rer["r_user"],
         "r1" => number_format($rs['r1'],2),
         "r2" => number_format($rs['r2'],2),
         "sum" => number_format($rs['b_total'],2),
         "r3" => number_format($rs['b_bonus'],2),
         "total" => _cbn($rs['r1'] + ($rs['r2']+$rs['b_bonus']) ,2),
        ); 
}
	
	
}else{
	
  $sql="select * from bom_tb_member   where   m_agent_id like '%*$r_id*%'  and m_id = ".$mid."";   
  $rem = sql_array($sql);
  
  $user=$rem["m_user"];
  $id=$rem["m_id"];

  
if($view=="a"){
	$aa=" and b_bonus>0 ";
	}

$sql="select 
   *,
   (
   	ROUND( 	(b_total)*((b_share_m)/100) ,10)
   ) as r1 ,  
    (
   	ROUND( 	-( b_total - b_pay)*((b_share_m)/100) ,10)
   ) as r2 
  from bom_tb_lotto_bill_play_live where    ok_id='$ok_id'  and m_id = '$mid'    and b_accept=1  $aa order by lot_type asc , play_number asc  limit 20000   ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
	
  $data["val"][] = array(
         "mid" => $rem["m_id"],
         "muser" => $rem["m_user"],
         "number" => "".$rs["play_number"]." : [".$lot_typeArry[$rs["lot_type"]]."]",
         "user" => $rem["m_user"],
         "r1" => number_format($rs['r1'],2),
         "r2" => number_format($rs['r2'],2),
         "sum" => number_format($rs['b_total'],2),
         "r3" => number_format($rs['b_bonus'],2),
         "total" => _cbn($rs['r1'] + ($rs['r2']+$rs['b_bonus']) ,2),
        ); 
}



}



$data["muser"] = $user; 
$data["mid"] =   $id; 

echo json_encode($data);



 ?>


