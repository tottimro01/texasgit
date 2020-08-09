<?
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);
	require('../inc/conn.php');

if($_GET["zone"]==""){
	$_GET["zone"] = 1;
}
if($_GET["rob"]==""){
	$_GET["rob"] = 1;
}
	
	$arr = array();
	$i=0;
	$sql=sql_query("select * from bom_tb_lotto_ok where lot_zone = '".$_GET["zone"]."' and lot_rob = '".$_GET["rob"]."' group by ok_date order by o_limit_time desc");
	while($rs=sql_fetch($sql)){
		$arr[$i]["strDate"] = $rs["ok_date"];
		$i++;
	}

	
	echo json_encode($arr);
	exit();
?>