<?
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);
	require('../../inc/conn.php');
	$date = $_GET["d"];
	$arr = array();
	$i=0;
	$rs=sql_array("select * from bom_tb_lotto_ok where ok_date = '$date' and lot_zone = 1 order by ok_id desc limit 1");
	$ex = explode("," , $rs["o_number"]);
	$arr["N1"] = ($ex[0] == "") ? "" : $ex[0];
	$arr["N2"] = ($ex[1] == "") ? "" : $ex[1];
	$arr["N3_1"] = ($ex[2] == "") ? "" : $ex[2];
	$arr["N3_2"] = ($ex[3] == "") ? "" : $ex[3];
	$arr["N3_3"] = ($ex[4] == "") ? "" : $ex[4];
	$arr["N3_4"] = ($ex[5] == "") ? "" : $ex[5];
	
	echo json_encode($arr);
	exit();
?>