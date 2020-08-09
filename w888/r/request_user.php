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
			//$ex_rid=explode('*',$rs_af[m_agent_id]);
			$rs_ag = sql_array("select * from bom_tb_agent where r_id = '$rs_af[r_id]'");
			#$ex_rida=explode('*',$rs_ag['r_agent_id']);
			###################Z
			$sql11="select m_id from  bom_tb_member where r_id = '$rs_af[r_id]' and m_user like '%".$rs_ag['r_user']."z%'";
			$num2=sql_num($sql11);
			$user = $rs_ag['r_user']."z".sprintf("%04d",($num2+1));
			
			if($num2>9998){
			$sql12="select m_id from  bom_tb_member where r_id = '$rs_af[r_id]' and m_user like '%".$rs_ag['r_user']."x%'";
			$num3=sql_num($sql12);
			$user = $rs_ag['r_user']."x".sprintf("%04d",($num3+1));
			
				}
			if($num3>9998){
			$sql13="select m_id from  bom_tb_member where r_id = '$rs_af[r_id]' and m_user like '%".$rs_ag['r_user']."c%'";
			$num4=sql_num($sql13);
			$user = $rs_ag['r_user']."c".sprintf("%04d",($num4+1));
			
				}
				
			if($num4>9998){
			$sql14="select m_id from  bom_tb_member where r_id = '$rs_af[r_id]' and m_user like '%".$rs_ag['r_user']."v%'";
			$num5=sql_num($sql14);
			$user = $rs_ag['r_user']."v".sprintf("%04d",($num5+1));
			
				}
			
			$arr["user"] = $user;
			$arr["status"] = 1;
		}else{
			$arr["status"] = 2;
		}

echo json_encode($arr);
?>