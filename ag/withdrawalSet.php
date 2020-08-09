<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

  if($_SESSION["AGlang"]==""){
      $_SESSION["AGlang"]="th";
  }
  require('inc/conn.php');
  require('inc/function.php');
  require('lang/ag_lang.php');

  if($_SESSION['uu_use'] == 1)
	{
		$bap_by_type = 5;
		$bap_by_id = $_SESSION['u_id'];
	}else{
		$bap_by_type = 2;
		$bap_by_id = $_SESSION['rid'];
	}


  if($_GET[ac]=="ok" and $_GET[acp]==0){

	$sql="update IGNORE bom_tb_trans set t_status=1 , t_date_accept=now(), t_active=1 where t_id='$_GET[id]'  and t_status=3";
	sql_query($sql);

	######################รายการเคลื่อนไหว
	/*$by=$_SESSION[r_user];
	$p_comment='ถอน';
	$ptype=2;
	$sql="select * from bom_tb_member   where m_agent_id like '%*$_SESSION[rid]*%'  and    m_id='$_GET[mid]' ";
	$rem=sql_array($sql);
	$from=$rem[m_count];	
	$bet=0;
	$pay=-$_GET[tcount];
	$bank=$_GET[bank];
	$sql="INSERT IGNORE INTO bom_tb_payment (p_date, p_from,	p_bet	,p_pay	,p_type,	r_id,	r_level,	r_agent_id, p_by, p_comment,p_bank) values(now(),'$from', '$bet', '$pay','$ptype','$rem[m_id]',5,'$rem[r_agent_id]','$by' ,'$p_comment','$bank') ";
	sql_query($sql);*/
	######################รายการเคลื่อนไหว
	#######################################################LOG	
	     /*$log_sum=$from+$pay;
		 $sql="INSERT IGNORE INTO bom_tb_databet (d_date,	m_id ,d_count 	,	d_out	,d_sum	,d_by ) values(now() ,'$rem[m_id]','$from','$pay','$log_sum', 2)";
	     sql_query($sql);*/
	#######################################################LOG		 

	//$log_sum=$from-$_GET[tcount];
	######################LOG ใหม่

	     $sql="update bom_tb_all_payment set bap_by_type = $bap_by_type , bap_by_id = '$bap_by_id' where trans_id = '$_GET[id]'";
	     sql_query($sql);
	/*$sql="INSERT IGNORE INTO bom_tb_all_payment (
	bap_date, bap_ip,	bap_type	,m_id	,r_id,	m_agent_id,	r_agent_id,	
	bap_before, bap_out ,bap_after,bap_comment,
	bap_code,trans_id,bap_by_type,bap_by_id) values(
	now(),'"._bIP()."', '2', '$rem[m_id]','$rem[r_id]','$rem[m_agent_id]','$_SESSION[r_agent_id]',
	'$from' ,'$pay','$log_sum','สมาชิกถอนผ่านหน้าเว็บไซต์',
	'MOT','$_GET[id]',2,'$_SESSION[rid]') ";
	sql_query($sql);	*/
	######################LOG ใหม่ 




	/*$sql="update IGNORE bom_tb_member set m_count=m_count-$_GET[tcount]  where  m_id='$_GET[mid]' and  m_agent_id like '%*$_SESSION[rid]*%'";
	sql_query($sql);*/

	$data["msg"] = $lang_ag[2124];
	
}



   if($_GET[ac]=="can"){

   	$sql="select * from bom_tb_member   where m_agent_id like '%*$_SESSION[rid]*%'  and    m_id='$_GET[mid]' ";
	$rem=sql_array($sql);

	$sql="update IGNORE bom_tb_trans set t_status=2 , t_date_accept=now(), t_active=1 where t_id='$_GET[id]'  and t_status=3";
	sql_query($sql);

	$mem_update = "UPDATE `bom_tb_member` SET `m_count`= m_count+$_GET[tcount] where m_id = '".$_GET[mid]."'"; 
	sql_query($mem_update);

	$log_sum=$rem[m_count]+$_GET[tcount];


	######################LOG ใหม่
	$sql="INSERT IGNORE INTO bom_tb_all_payment (
	bap_date, bap_ip,	bap_type	,m_id	,r_id,	m_agent_id,	r_agent_id,	
	bap_before, bap_in ,bap_after,bap_comment,
	bap_code,trans_id,bap_by_type,bap_by_id) values(
	now(),'"._bIP()."', '1', '$rem[m_id]','$rem[r_id]','$rem[m_agent_id]','$_SESSION[r_agent_id]',
	'$rem[m_count]' ,'$_GET[tcount]','$log_sum','ยกเลิกรายการแจ้งถอนผ่านหน้าเว็บไซต์',
	'MIN','$_GET[id]',$bap_by_type,'$bap_by_id') ";
	sql_query($sql);	
	######################LOG ใหม่ 
	$sql="update bom_tb_all_payment set bap_by_type = $bap_by_type , bap_by_id = '$bap_by_id' where trans_id = '$_GET[id]'";
	sql_query($sql);

	$data["msg"] = $lang_ag[2124];
	
	}

	echo json_encode($data);

 ?>	