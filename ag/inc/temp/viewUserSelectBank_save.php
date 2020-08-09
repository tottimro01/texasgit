<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<? 

if($_POST["session"]["AGlang"]=="")
{
  $_POST["session"]["AGlang"]="th";
}

  
  require('../conn.php');
  require('../function.php');

  require('../../lang/ag_lang.php');
  require('../../lang/function_array.php');

  $bank_id 	= sql_escape_str($_POST['bank_id']);
  $m_id 	= sql_escape_str($_POST['id']); 
  $active 	= sql_escape_str($_POST['active']);

 if($active == "N"){
  	$bank_id = 0;
 }


  $sql = "SELECT * FROM `bom_tb_member` where m_id='".$m_id."'";
  $rem = sql_array($sql);
  $m_b_bank = $rem['m_b_bank'];

  $sql = "SELECT * FROM bom_tb_bank WHERE bank_id = ".$bank_id." ORDER BY bank_id DESC";
  $reb=sql_array($sql);

  if(($m_b_bank == 1 and $reb['bank_name'] == 1) or ($m_b_bank == 2 and $reb['bank_name'] == 1) or ($m_b_bank == 1 and $reb['bank_name'] == 2))  
  { 
    if($reb['bank_auto']==1)
    {
      $m_b_type = 2;
    }else{
      $m_b_type = 1;
    }
  }else{
     $m_b_type = 1;
  }

  if($bank_id == 0)  // ถ้าไม่ผูก
  {
    $m_b_type = 0;
  }



 $update_sql = "update IGNORE `bom_tb_member` SET `bank_id`= '{$bank_id}' ,  `m_b_type`= '{$m_b_type}' WHERE m_id = $m_id";
 $query = sql_query($update_sql);
if($query)
{
	$data  = array(
		'msg'     =>  $lang_ag[5],
    'm_b_type'     =>  $m_b_type,
    'bank_name'     =>  $bank_id,
    'm_b_bank'     =>  $m_b_bank,
    // 'sql'     =>  $sql,
		'status'  =>  true,
	);
}else{
	$data  = array(
		'msg' => $lang_ag[4],
		'status' => false,
	);
}	

echo json_encode($data);

?>