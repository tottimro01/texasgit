<?
	require('../inc/conn.php');
	
	$arr = array();
	$i=0;
	$sql=sql_query("select * from bom_tb_lotto_hun_ok where lot_zone = 1 group by ok_date order by o_limit_time desc");
	while($rs=sql_fetch($sql)){
		$arr[$i]["strDate"] = $rs["ok_date"];
		$i++;
	}

	
	echo json_encode($arr);
	exit();
?>