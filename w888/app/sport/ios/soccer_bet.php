<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
require ("../inc/conn.php");
require ("../inc/function.php");
$mid = $_GET["mid"];
$typebet = $_GET["tbet"];

if($_GET["d"]!=""){
		$date = $_GET["d"];	
	}else{
		$date = _bdate();	
	}
	
	
$arr = array();
$i = 0;
$sql=sql_query("select * from bom_tb_football_bill where b_date='$date' and  m_id='$mid'  order by bill_id desc");
	
while($rs=mysql_fetch_array($sql)){
	$arr[$i]["Nid"] = $rs["bill_id"];
	$arr[$i]["Ndate"] = _cvf($rs["b_timestam"] , 7);
	$arr[$i]["Ntime"] = date("H:i" , $rs["b_timestam"]);
	$arr[$i]["Nood"] = "ออดซ์ : ".number_format($rs["b_sum_pay"],3)." (E)";
	$arr[$i]["Ntb"] = number_format($rs["b_pay"],2);
	$arr[$i]["Ntype"] = $rs["b_type_bet"];
	$arr[$i]["Nstatus"] = $rs["b_status"];
	$arr[$i]["Ncode"] = $rs["b_code"];
	
	
	$i++;
}

echo json_encode($arr);
?>