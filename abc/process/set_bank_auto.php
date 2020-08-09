<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
require('../inc/conn.php');
require('../inc/function.php');

	$bank_auto = $_POST['bank_auto'];
	$bank_id = $_POST['bank_id'];



	$sql ="UPDATE `bom_tb_bank` SET `bank_auto`=$bank_auto WHERE bank_id = $bank_id";
	$is_update=sql_query($sql); 

	$list  = array();
	if($is_update)
	{
		$list  = array(
			'msg' => "สำเร็จ", 
			'status' => 1, 
		);
	}else{
		$list  = array(
			'msg' => "ผิดพลาด", 
			'status' => 0, 
		);
	}


	echo json_encode($list);
?>