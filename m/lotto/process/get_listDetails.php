<?
	session_start();
	header("Content-type: application/json");

	require_once '../inc/lang.php';
    require_once '../inc/rsc.php';
    require_once '../inc/function.php';
    require_once '../inc/conn.php';

    require_once '../inc/function_array.php';
    require_once '../inc/variable_lang.php';

	$mid = $_SESSION["m_id"];
	$zone=$_SESSION['zone_hun'];
	$rob=$_SESSION['rob_hun'];

	$bid = $_GET['bid'];


	$arr = array();
	$i = 0;

	$ball_type3= array(1 =>"ได้","ได้ครึ่ง","คืนทุน", "เสีย", "เสียครึ่ง", "ยกเลิก", "รอ"); 

	$sql="select * from bom_tb_lotto_bill_play_live where bill_id='$bid' and  m_id='$mid'   and b_accept=1  order by lot_type asc, play_number asc";
	 $num=sql_num($sql);
	 if($num==0){
	$sql="select * from bom_tb_lotto_bill_play where bill_id='$bid' and  m_id='$mid'   and b_accept=1  order by lot_type asc, play_number asc";
	 }
	$re=sql_query($sql);
	$x=1;
	$sum1=array();
	while($rs_bill=sql_fetch($re)){
		$sum1[]=-$rs_bill["b_total"];
		 
		$arr[$i]["Nid"] = $rs_bill["bill_id"];
		$arr[$i]["Ndate"] = date("d/m/Y" , $rs_bill["play_timestam"]);
		$arr[$i]["Ntime"] = date("H:i" , $rs_bill["play_timestam"]);
		$arr[$i]["Ntype"] = $lot_type[$lang_post][$rs_bill[lot_zone]][$rs_bill[lot_type]];
		$arr[$i]["Nnum"] = _dt($rs_bill[play_number]);
		$arr[$i]["Ntb"] = number_format(-$rs_bill[b_total]);
		$i++;
	}

	$arr[$i]["Nid"] = "";
	$arr[$i]["Ndate"] = "";
	$arr[$i]["Ntime"] = "";
	$arr[$i]["Ntype"] = "";
	$arr[$i]["Nnum"] = "";
	$arr[$i]["Ntb"] = number_format(@array_sum($sum1));

	
	echo json_encode($arr);
?>