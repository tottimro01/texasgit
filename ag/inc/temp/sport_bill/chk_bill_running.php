<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
		
	require('../../conn.php');
	require('../../function.php');


	$ary_list = array();

	$sql = "select bill_id , b_accept , b_running , b_running_step , b_status from bom_tb_football_bill_live where bill_id IN (".implode(',',$_POST[array_bill]).")";

	$re=sql_query($sql);
	while($rs=sql_fetch($re)){
		$ary_list[$rs[bill_id]][b_running] =   $rs[b_running];
		$ary_list[$rs[bill_id]][b_running_step] =   $rs[b_running_step];
		$ary_list[$rs[bill_id]][bill_id] =   $rs[bill_id];
		$ary_list[$rs[bill_id]][b_accept] =   $rs[b_accept];
		// $ary_list[$rs[bill_id]][status] =   $rs[b_status];
		$ary_list[$rs[bill_id]][status] =   $f_status[$rs[b_status]];
	}


	$sql = "select bill_id , b_accept , b_running , b_running_step , b_status from bom_tb_football_bill where bill_id IN (".implode(',',$_POST[array_bill]).")";

	$re=sql_query($sql);
	while($rs=sql_fetch($re)){
		$ary_list[$rs[bill_id]][b_running] =   $rs[b_running];
		$ary_list[$rs[bill_id]][b_running_step] =   $rs[b_running_step];
		$ary_list[$rs[bill_id]][bill_id] =   $rs[bill_id];
		$ary_list[$rs[bill_id]][b_accept] =   $rs[b_accept];
		// $ary_list[$rs[bill_id]][status] =   $rs[b_status];
		$ary_list[$rs[bill_id]][status] =   $f_status[$rs[b_status]];
	}

	
	// $ary_list[sql] = $sql;

	echo json_encode($ary_list);


?>