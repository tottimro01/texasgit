<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
  if($_SESSION["AGlang"]==""){
      $_SESSION["AGlang"]="th";
  }
  require('inc/conn.php');
  require('inc/function.php');
  require('lang/ag_lang.php');

$r_open_transfer = ($_POST["show_member"]=="Y" ? 1:0);
$r_m_deposit_open = ($_POST["deposit_open"]=="Y" ? 1:0);
$r_m_deposit_min = str_replace("," , "" , $_POST["deposit_min"]);
$r_m_deposit_max = str_replace("," , "" , $_POST["deposit_max"]);
$r_m_withdraw_open = ($_POST["withdrawal_open"]=="Y" ? 1:0);
$r_m_withdraw_num = str_replace("," , "" , $_POST["withdrawal_count"]);
$r_m_withdraw_min = str_replace("," , "" , $_POST["withdrawal_min"]);
$r_m_withdraw_max = str_replace("," , "" , $_POST["withdrawal_max"]);


$sql_update = sql_query("update IGNORE bom_tb_agent set r_open_transfer = '$r_open_transfer' , r_m_deposit_open = '$r_m_deposit_open' , r_m_deposit_min = '$r_m_deposit_min' , r_m_deposit_max = '$r_m_deposit_max' , r_m_withdraw_open = '$r_m_withdraw_open' , r_m_withdraw_num = '$r_m_withdraw_num' , r_m_withdraw_min = '$r_m_withdraw_min' , r_m_withdraw_max = '$r_m_withdraw_max' where r_id='".$_SESSION['r_id']."'");


	$data = array(
		"msg"  => $lang_ag[3] ,
		"status"  => true 
	);


	echo json_encode($data);
 ?>