<?php 
	header('Content-type: application/json');
	require('inc_head_bySession.php');

	$sql = "SELECT * FROM `bom_tb_bank` WHERE `r_id` = ".$_SESSION["r_id"]." ORDER BY bank_id DESC";
	$re=sql_query($sql);

	$data = [];
	while($rs=sql_fetch_as($re)){
 		$data[] = array(
 			'bank_id' => $rs["bank_id"], 
 			'bank_name_id' => $rs["bank_name"],
 			'bank_name' => $arr_bank[$rs["bank_name"]],  
 			'bank_cname' => trim($rs["bank_cname"]), 
 			'bank_code' => $rs["bank_code"], 
 			'bank_province' => $rs["bank_province"], 
 			'bank_province_name' => $arr_province[$rs["bank_province"]],
 			'bank_note' => $rs["bank_note"], 
 		);

	}

	echo json_encode($data);



?>