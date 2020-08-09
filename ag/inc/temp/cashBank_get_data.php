<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
	header('Content-type: application/json');
	require('inc_head_bySession.php');

	$sql = "SELECT * FROM `bom_tb_bank` WHERE `r_id` = ".$_SESSION["r_id"]." ORDER BY bank_id DESC";
	$re=sql_query($sql);

	$data = array();

	$bank_id_array = array();
	while($rs=sql_fetch_as($re)){
 		$data["list"][$rs["bank_id"]] = array(
 			'bank_id' => $rs["bank_id"], 
 			'bank_name_id' => $rs["bank_name"],
 			'bank_name' => $arr_bank[$rs["bank_name"]],  
 			'bank_cname' => trim($rs["bank_cname"]), 
 			'bank_code' => $rs["bank_code"], 
 			'bank_province' => $rs["bank_province"], 
 			'bank_province_name' => $arr_province[$rs["bank_province"]],
 			'bank_note' => $rs["bank_note"], 
 			'bank_auto' => $rs["bank_auto"], 
 		);

 		$bank_id_array[] = $rs["bank_id"];
	}

	$r_agent_id = $_SESSION["r_agent_id"].$_SESSION["r_id"]."*";
    $lv = intval($_SESSION["r_level"])+1;

    $sql="select m_id , bank_id from bom_tb_member   where  m_agent_id = '$r_agent_id' and bank_id IN (".implode(',',$bank_id_array).")";  
    // $data['sql'] = $sql;
	$re=sql_query($sql);

	$count_bank = array();

    while($rs=sql_fetch_as($re)){
 		$count_bank[$rs['bank_id']][] = $rs['m_id'];
	}

	$data["count_bank"] = $count_bank;

	echo json_encode($data);



?>