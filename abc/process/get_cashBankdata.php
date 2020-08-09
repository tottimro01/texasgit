<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
require('../inc/conn.php');
require('../inc/function.php');



	$sql = "SELECT * FROM `bom_tb_agent` WHERE 1 ORDER BY r_id DESC";
	$re=sql_query($sql);
	$ag_list = array();

	$sch_id = array();
	while($rs=sql_fetch_as($re)){
 		$ag_list[$rs["r_id"]]['r_user'] = $rs["r_user"];
 		$ag_list[$rs["r_id"]]['r_name'] = $rs["r_name"];
 		$ag_list[$rs["r_id"]]['r_agent_id'] = $rs["r_agent_id"];
	}



	$data['sql'] =$sql;
	$sql = "SELECT * FROM `bom_tb_bank` WHERE 1  ORDER BY bank_id DESC";
	$re=sql_query($sql);

	$data = array();
	$bank_id_array = array();
	while($rs=sql_fetch_as($re)){

		$user = ($ag_list[$rs["r_id"]]['r_user'] === null) ? "ไม่ระบุ" : $ag_list[$rs["r_id"]]['r_user'];
 		$data["list"][$rs["bank_id"]] = array(
 			'bank_id' => $rs["bank_id"], 
 			'bank_name_id' => $rs["bank_name"],
 			'bank_name' => $ab_bank[$rs["bank_name"]],  
 			'bank_cname' => trim($rs["bank_cname"]), 
 			'bank_code' => $rs["bank_code"], 
 			'bank_province' => $rs["bank_province"], 
 			'bank_province_name' => $arr_province[$rs["bank_province"]],
 			'bank_note' => $rs["bank_note"], 
 			'agent_user' => $user,
 			'bank_auto' => $rs["bank_auto"] ,
 		);

 		$bank_id_array[] = $rs["bank_id"];
	}

	$sql="select m_id , bank_id from bom_tb_member   where   bank_id IN (".implode(',',$bank_id_array).")";  
	$re=sql_query($sql);

	$count_bank = array();

    while($rs=sql_fetch_as($re)){
 		$count_bank[$rs['bank_id']][] = $rs['m_id'];
	}

	$data["count_bank"] = $count_bank;
	// $data["sch_id"] = $sch_id;

	echo json_encode($data);


 ?>