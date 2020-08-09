<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

if($_SESSION["AGlang"]==""){
  $_SESSION["AGlang"]="th";
}

require('inc/conn.php');
require('inc/function.php');
require('lang/ag_lang.php');

$_lv=$_SESSION["r_level"];

  
  if($_POST["acType"] == "byCHK") // จาก check box  หลายรายการ
  {
      $ttype = $_POST["ttype"];  // Y = เมื่อวาน  , T = วันนี้
      $id_list_A = $_POST["id_list_A"];   // อาเรย์ ของ id ที่เป็น agent
      $id_list_M = $_POST["id_list_M"];   // อาเรย์ ของ id ที่เป็น Member
	  
$yes=date("d-m-Y",strtotime("-1 day"));
$yes2=date("Y-m-d",strtotime("-1 day"));
if($ttype=="Y"){
	
foreach($id_list_A as $r_id){
$sql="update IGNORE bom_tb_football_bill set  r_cut_bet_".$_lv."=1 where  r_agent_id like '%*".$_SESSION["r_id"]."*%' and  r_agent_id like '%*".$r_id."*%'   and r_cut_bet_".$_lv."=0  and b_date='$yes'  ";
sql_query($sql);	
$sql="update IGNORE bom_tb_lotto_bill_play set  r_cut_bet_".$_lv."=1 where  r_agent_id like '%*".$_SESSION["r_id"]."*%' and  r_agent_id like '%*".$r_id."*%'   and r_cut_bet_".$_lv."=0  and b_date='$yes'  ";
sql_query($sql);	
$sql="update IGNORE bom_tb_games_bill_play set  r_cut_bet_".$_lv."=1 where  r_agent_id like '%*".$_SESSION["r_id"]."*%' and  r_agent_id like '%*".$r_id."*%'   and r_cut_bet_".$_lv."=0  and b_date='$yes'  ";
sql_query($sql);	
$sql="update IGNORE bom_tb_casino_bill_play set  r_cut_bet_".$_lv."=1 where  r_agent_id like '%*".$_SESSION["r_id"]."*%' and  r_agent_id like '%*".$r_id."*%'   and r_cut_bet_".$_lv."=0  and  play_datenow like  '$yes2%'    ";
sql_query($sql);	
	}
	
foreach($id_list_M as $m_id){
$sql="update IGNORE bom_tb_football_bill set  r_cut_bet_m=1 where  r_agent_id like '%*".$_SESSION["r_id"]."*%' and  m_id = '".$m_id."'   and r_cut_bet_m=0  and b_date='$yes'    ";
sql_query($sql);	
$sql="update IGNORE bom_tb_lotto_bill_play set  r_cut_bet_m=1 where  r_agent_id like '%*".$_SESSION["r_id"]."*%' and  m_id = '".$m_id."'   and r_cut_bet_m=0  and b_date='$yes'    ";
sql_query($sql);	
$sql="update IGNORE bom_tb_games_bill_play set  r_cut_bet_m=1 where  r_agent_id like '%*".$_SESSION["r_id"]."*%' and  m_id = '".$m_id."'   and r_cut_bet_m=0  and b_date='$yes'    ";
sql_query($sql);	
$sql="update IGNORE bom_tb_casino_bill_play set  r_cut_bet_m=1 where  r_agent_id like '%*".$_SESSION["r_id"]."*%' and  m_id = '".$m_id."'   and r_cut_bet_m=0    and  play_datenow like  '$yes2%'    ";
sql_query($sql);	
	}
	
	}#if($ttype=="Y"){
	
$today=date("d-m-Y");
$today2=date("Y-m-d");
if($ttype=="T"){
	
foreach($id_list_A as $r_id){
$sql="update IGNORE bom_tb_football_bill set  r_cut_bet_".$_lv."=1 where  r_agent_id like '%*".$_SESSION["r_id"]."*%' and  r_agent_id like '%*".$r_id."*%'   and r_cut_bet_".$_lv."=0  and b_date='$today'  ";
sql_query($sql);	
$sql="update IGNORE bom_tb_lotto_bill_play set  r_cut_bet_".$_lv."=1 where  r_agent_id like '%*".$_SESSION["r_id"]."*%' and  r_agent_id like '%*".$r_id."*%'   and r_cut_bet_".$_lv."=0  and b_date='$today'  ";
sql_query($sql);	
$sql="update IGNORE bom_tb_games_bill_play set  r_cut_bet_".$_lv."=1 where  r_agent_id like '%*".$_SESSION["r_id"]."*%' and  r_agent_id like '%*".$r_id."*%'   and r_cut_bet_".$_lv."=0  and b_date='$today'  ";
sql_query($sql);	
$sql="update IGNORE bom_tb_casino_bill_play set  r_cut_bet_".$_lv."=1 where  r_agent_id like '%*".$_SESSION["r_id"]."*%' and  r_agent_id like '%*".$r_id."*%'   and r_cut_bet_".$_lv."=0  and  play_datenow like  '$today2%'    ";
sql_query($sql);	
	}
	
foreach($id_list_M as $m_id){
$sql="update IGNORE bom_tb_football_bill set  r_cut_bet_m=1 where  r_agent_id like '%*".$_SESSION["r_id"]."*%' and  m_id = '".$m_id."'   and r_cut_bet_m=0  and b_date='$today'    ";
sql_query($sql);	
$sql="update IGNORE bom_tb_lotto_bill_play set  r_cut_bet_m=1 where  r_agent_id like '%*".$_SESSION["r_id"]."*%' and  m_id = '".$m_id."'   and r_cut_bet_m=0  and b_date='$today'    ";
sql_query($sql);	
$sql="update IGNORE bom_tb_games_bill_play set  r_cut_bet_m=1 where  r_agent_id like '%*".$_SESSION["r_id"]."*%' and  m_id = '".$m_id."'   and r_cut_bet_m=0  and b_date='$today'    ";
sql_query($sql);	
$sql="update IGNORE bom_tb_casino_bill_play set  r_cut_bet_m=1 where  r_agent_id like '%*".$_SESSION["r_id"]."*%' and  m_id = '".$m_id."'   and r_cut_bet_m=0    and  play_datenow like  '$today2%'    ";
sql_query($sql);	
	}
	
	
	}#if($ttype=="T"){



#print_r($id_list_M);




  }else if($_POST["acType"] == "byUser")  // กดโอนเงิน ตามสมาชิก
  {
        $id = $_POST["id"];
        $u_type = $_POST["u_type"];  // A = agent , M = member
	
		if($u_type=="A"){
			
$sql="update IGNORE bom_tb_football_bill set  r_cut_bet_".$_lv."=1 where  r_agent_id like '%*".$_SESSION["r_id"]."*%' and  r_agent_id like '%*".$id."*%'   and r_cut_bet_".$_lv."=0   ";
sql_query($sql);	
$sql="update IGNORE bom_tb_lotto_bill_play set  r_cut_bet_".$_lv."=1 where  r_agent_id like '%*".$_SESSION["r_id"]."*%' and  r_agent_id like '%*".$id."*%'   and r_cut_bet_".$_lv."=0   ";
sql_query($sql);	
$sql="update IGNORE bom_tb_games_bill_play set  r_cut_bet_".$_lv."=1 where  r_agent_id like '%*".$_SESSION["r_id"]."*%' and  r_agent_id like '%*".$id."*%'   and r_cut_bet_".$_lv."=0   ";
sql_query($sql);	
$sql="update IGNORE bom_tb_casino_bill_play set  r_cut_bet_".$_lv."=1 where  r_agent_id like '%*".$_SESSION["r_id"]."*%' and  r_agent_id like '%*".$id."*%'   and r_cut_bet_".$_lv."=0   ";
sql_query($sql);	
			}
			
		if($u_type=="M"){

	

			
$sql="update IGNORE bom_tb_football_bill set  r_cut_bet_m=1 where  r_agent_id like '%*".$_SESSION["r_id"]."*%' and  m_id = '".$id."'   and r_cut_bet_m=0   ";
sql_query($sql);	
$sql="update IGNORE bom_tb_lotto_bill_play set  r_cut_bet_m=1 where  r_agent_id like '%*".$_SESSION["r_id"]."*%' and  m_id = '".$id."'   and r_cut_bet_m=0   ";
sql_query($sql);	
$sql="update IGNORE bom_tb_games_bill_play set  r_cut_bet_m=1 where  r_agent_id like '%*".$_SESSION["r_id"]."*%' and  m_id = '".$id."'   and r_cut_bet_m=0   ";
sql_query($sql);	
$sql="update IGNORE bom_tb_casino_bill_play set  r_cut_bet_m=1 where  r_agent_id like '%*".$_SESSION["r_id"]."*%' and  m_id = '".$id."'   and r_cut_bet_m=0   ";
sql_query($sql);	

$sql="select * from bom_tb_member   where m_agent_id like '%*$_SESSION[r_id]*%'  and    m_id='$id' ";
$rem=sql_array($sql);

$from = $rem["m_count"];
$sum_c = $rem["m_count"]-$rem["m_count_de"];
$log_sum = $rem["m_count_de"];
if($sum_c>0){
	$pay = $rem["m_count_de"]-$rem["m_count"];
	######################LOG ใหม่
	$sql="INSERT IGNORE INTO bom_tb_all_payment (
	bap_date, bap_ip,	bap_type	,m_id	,r_id,	m_agent_id,	r_agent_id,	
	bap_before, bap_out ,bap_after,bap_comment,
	bap_code,bap_by_type,bap_by_id) values(
	now(),'"._bIP()."', '8', '$rem[m_id]','$rem[r_id]','$rem[m_agent_id]','$_SESSION[r_agent_id]',
	'$from' ,'$pay','$log_sum','เอเย่นต์ถอนเงินจากการโอนเงินให้สมาชิก',
	'TOT',2,'$_SESSION[r_id]') ";
	sql_query($sql);	
	######################LOG ใหม่ 
}else if($sum_c<0){
	$pay = $rem["m_count_de"]-$rem["m_count"];
	######################LOG ใหม่
	$sql="INSERT IGNORE INTO bom_tb_all_payment (
	bap_date, bap_ip,	bap_type	,m_id	,r_id,	m_agent_id,	r_agent_id,	
	bap_before, bap_in ,bap_after,bap_comment,
	bap_code,bap_by_type,bap_by_id) values(
	now(),'"._bIP()."', '7', '$rem[m_id]','$rem[r_id]','$rem[m_agent_id]','$_SESSION[r_agent_id]',
	'$from' ,'$pay','$log_sum','เอเย่นต์ฝากเงินจากการโอนเงินให้สมาชิก',
	'TIN',2,'$_SESSION[r_id]') ";
	sql_query($sql);	
	######################LOG ใหม่ 

}

$sql_upm = sql_query("update bom_tb_member set m_count = m_count_de where m_agent_id like '%*$_SESSION[r_id]*%'  and    m_id='$id'");


			}
		
		
		
  }

  $rs = true;
  if($rs)
  {
    $data = array(
      'msg'     =>  $lang_ag[5],
      'status'  =>  "success"
    );
  }
  else
  {
    $data = array(
      'msg'     =>  $lang_ag[4],
      'status'  =>  "error"
    );
  } 


echo json_encode($data);
 ?>