<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');

// require("lang/member_lang.php");
  require("lang/variable_lang.php");

$arr = array();

$mid = $_SESSION["m_id"];
$fix_m = 0.1;

#$addDate = date("Y-m-d H:i:s");
$rs_mem = sql_array("select * from bom_tb_member where m_id = '$mid'");

if($rs_mem["ref_total"]>=$fix_m){
$d_sum=$rs_mem['m_count']+$rs_mem['ref_total'];
$d_txt='AF tranfer';
                  sql_query("insert into bom_tb_databet_live(d_date,d_count,d_in, d_sum,m_id,r_agent_id, d_by, d_txt , d_ip) values(now() ,'".$rs_mem['m_count']."','".$rs_mem['ref_total']."','$d_sum','".$rs_mem['m_id']."','".$rs_mem['r_agent_id']."' , '5' , '$d_txt' , '"._bIP()."')");
		           sql_query("insert into bom_tb_bonus_ref(bf_datenow,m_count,bf_bonus,m_id,r_agent_id) values(now() ,'".$rs_mem['m_count']."','".$rs_mem['ref_total']."','".$rs_mem['m_id']."','".$rs_mem['r_agent_id']."')");
		           sql_query("update bom_tb_member set m_count =m_count+ ref_total  where m_id = '$rs_mem[m_id]'");
		          sql_query("update bom_tb_member set ref_total =0, ref_sport =0, ref_lot =0, ref_hun =0, ref_games =0, ref_casino =0  where m_id = '$rs_mem[m_id]'");

			$arr["msg"] = $lang_member[2372];
			$arr["status"] = 1;


}else{
	$arr["status"] = 2;
	$arr["msg"] = $lang_member[982]." 0.1 ".$_SESSION['m1']['m_currency'];
}

echo json_encode($arr);
?>