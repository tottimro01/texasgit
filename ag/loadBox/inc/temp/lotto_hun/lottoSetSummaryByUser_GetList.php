<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 	

	require('inc_head_bySession.php');

    $zone = $_POST["zone"];
	$rob  = $_POST["rob"];
	if($rob==""){$rob=1;}
	$d 	  = $_POST["d"];
	
$r_id=$_SESSION["r_id"];
$r_level=$_SESSION["r_level"]+1;
$ag_level=$_SESSION["r_level"];

$sql="select * from bom_tb_lotto_ok  where lot_zone=$zone and  lot_rob=$rob and ok_date='$d'   order by ok_id desc limit 1";
$re_ok=sql_array($sql);

$ok_id=$re_ok['ok_id'];





 $data = array();
 $data["val"] = array();

    $sql="select * from bom_tb_agent   where  r_agent_id like '%*$r_id*%' and  r_level='$r_level'";   
    $re=sql_query($sql);
    while($rs=sql_fetch($re)){
		
		

$sql="select 
  sum(
   	ROUND( 	(b_total)*((b_myshare_".$ag_level.")/100) ,10)
   ) as r1 ,  
    sum(
   	ROUND( 	-( b_total - br_pay_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as r2 ,  
    sum(
   	ROUND( 	b_total  ,10)
   ) as c3  ,  
    sum(
   	ROUND( 	-( br_bonus_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as c4 
   
  from bom_tb_lotto_bill_play_live where    ok_id='$ok_id'  and r_agent_id like '%*$rs[r_id]*%'    and b_accept=1   and lot_type!=31   ";
  $re1=sql_array($sql);

if($re1['c3']>0){
    		$data["val"][] = array(
    			"mid" => 'rid'.$rs["r_id"],
    			"muser" => $rs["r_user"],
    			"all_r1" =>number_format($re1['r1'],2),
          		"all_r2" =>number_format($re1['r2'],2),
          		"all_sum" => number_format($re1['c3'],2),
          		"all_r3" => number_format($re1['c4'],2),
          		"all_total" => _cbn($re1['r1'] + ($re1['r2']+$re1['c4']),2),
    		 );	
    }
	}
	
	
	
	
	
$s2_a=array();
$sql="select 
   *,
   (
   	ROUND( 	(b_total)*((b_share_m)/100) ,10)
   ) as r1 ,  
    (
   	ROUND( 	-( b_total - b_pay)*((b_share_m)/100) ,10)
   ) as r2 
  from bom_tb_lotto_bill_play_live where    ok_id='$ok_id'  and r_id = '$r_id'    and b_accept=1   and lot_type!=31  order by lot_type asc , play_number asc  ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
$s2_a[$rs["m_id"]][]=$rs['r1'];
$s2_b[$rs["m_id"]][]=$rs['r2'];
$s2_c[$rs["m_id"]][]=$rs['b_total'];
$s2_d[$rs["m_id"]][]=$rs['b_bonus'];
$s2_e[$rs["m_id"]][]=$rs['r1'] + ($rs['r2']+$rs['b_bonus']);
}	



    $sql="select * from bom_tb_member   where  r_id = '$r_id'";   
    $re=sql_query($sql);
    while($rs=sql_fetch($re)){
		
if(@array_sum($s2_c[$rs["m_id"]])>0){
    		$data["val"][] = array(
    			"mid" => $rs["m_id"],
    			"muser" => $rs["m_user"],
    			"all_r1" =>number_format(@array_sum($s2_a[$rs["m_id"]]),2),
          		"all_r2" => number_format(@array_sum($s2_b[$rs["m_id"]]),2),
          		"all_sum" => number_format(@array_sum($s2_c[$rs["m_id"]]),2),
          		"all_r3" => number_format(@array_sum($s2_d[$rs["m_id"]]),2),
          		"all_total" => _cbn(@array_sum($s2_e[$rs["m_id"]]),2),
    		 );	
    }
	}

    echo json_encode($data);




 ?>


