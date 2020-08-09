<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
require('../inc/function.php');

//require("../lang/member_lang.php");

$arr = array();
$rid = trim($_REQUEST['rid']);    
$fby = trim($_REQUEST['fby']);    


$rs_af = sql_array("select * from bom_tb_member where m_id = '$fby'");
		if($rs_af["m_id"]!=""){
			$ex_rid=explode('*',$rs_af[r_agent_id]);
			$rs_ag = sql_array("select * from bom_tb_agent where r_id = '$ex_rid[4]'");
			$ex_rida=explode('*',$rs_ag[r_agent_id]);
			if($ex_rida[1]==1 || $ex_rid[2]==297){
				$sql1="select m_id from  bom_tb_member where r_agent_id like '%*$rs_ag[r_id]*%' ";
				$num2=sql_num($sql1);
				$user = $rs_ag[r_user]."-".($num2+1);
				$arr["user"] = $user;
				$arr["status"] = 1;
			}else{
				$arr["status"] = 3;
			}
		}else{
			$arr["status"] = 2;
		}

echo json_encode($arr);
?>