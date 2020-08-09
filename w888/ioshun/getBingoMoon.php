<?
	require('../inc/conn.php');
	require('../inc/function.php');
	$date = $_GET["d"];
	$arr = array();
	$i=0;

	$sql="select * from bom_tb_lotto_hun_ok where lot_zone = 3 and ok_date = '$date' order by ok_id asc";
	$red=sql_query($sql);
while($rs=sql_fetch($red)){
	$arr[$i]["Time"] = $lot_robmun[$rs["lot_rob"]];
	
	if($rs["o_number"]!=""){
		$arr[$i]["Win3"] = $rs["o_number"];
		$arr[$i]["Win2"] = substr($rs["o_number"], -2);
	}else{
		$arr[$i]["Win3"] = "";
		$arr[$i]["Win2"] = "";
	}
	
	$i++;
}	
	echo json_encode($arr);
	exit();
?>