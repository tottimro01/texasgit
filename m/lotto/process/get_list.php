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

	$type = $_GET['list_type'];
	$bill_cus_name = $_GET['mname'];
	$bill_no = $_GET['poy_num'];
	$date = $_GET['date'];

	$arr = array();

	if($bill_cus_name!=""){
		$qqname=" and  b_name='$bill_cus_name'";
	}
	if($bill_no!=""){
		$qqno=" and  b_no='$bill_no'";
	}

	if($type == 'bill'){

		$i = 0;

		$ball_type3= array(1 =>"ได้","ได้ครึ่ง","คืนทุน", "เสีย", "เสียครึ่ง", "ยกเลิก", "รอ"); 

		$sql="select * from bom_tb_lotto_bill_live where b_date='$date' and  m_id='$mid' and b_total > 0 and  lot_zone = '$zone' and  lot_rob = '$rob' and b_accept=1 $qqname $qqno  order by bill_id desc";
		$num=sql_num($sql);
 		
 		if($num==0){
		 	$sql="select * from bom_tb_lotto_bill where b_date='$date' and  m_id='$mid' and b_total > 0  and  lot_zone = '$zone' and  lot_rob = '$rob' and b_accept=1 $qqname $qqno  order by bill_id desc";
 		}

		$re=sql_query($sql);
		$x=1;
		$sum1=array();
		$sum2=array();
		$sum3=array();
		$sum4=array();

 		while($rs_bill=sql_fetch($re)){
	 
			$sum1[]=-$rs_bill["b_total"];
			$sum2[]=$rs_bill["b_total"]-$rs_bill["b_pay"];
			$sum3[]=$rs_bill["b_bonus"];
			$sum4[]=(-$rs_bill["b_pay"])+$rs_bill["b_bonus"];
	 
			$arr[$i]["Nid"] = $rs_bill["bill_id"];
	 		if($num==0){
				$arr[$i]["Ndate"] = date("d/m/Y" , $rs_bill["b_timestam"]);
				$arr[$i]["Ntime"] = date("H:i" , $rs_bill["b_timestam"]);
	 		}else{
				$arr[$i]["Ndate"] = date("d/m/Y" , $rs_bill["b_timestam"]);
				$arr[$i]["Ntime"] = date("H:i" , $rs_bill["b_timestam"]);
	 		}
			
			$arr[$i]["No"] = $i+1;
			$arr[$i]["Ntb"] = number_format(-$rs_bill["b_total"]);
			$arr[$i]["Ndis"] = number_format($rs_bill["b_total"]-$rs_bill["b_pay"]);
			$arr[$i]["Nbonus"] = number_format($rs_bill[b_bonus]);
			$arr[$i]["Ntotal"] = number_format((-$rs_bill["b_pay"])+$rs_bill["b_bonus"]);
			$arr[$i]["Nstatus"] = $rs_bill["b_status"];	
			$arr[$i]["Nno"] = $rs_bill["b_no"] ?: $rs_bill["b_no"]="";	
			$arr[$i]["Nname"] = $rs_bill["b_name"] ?: $rs_bill["b_name"]="";	
			$i++;
		}

		$arr[$i]["Nid"] = "";
		$arr[$i]["Ndate"] = "";
		$arr[$i]["Ntime"] = "";
		$arr[$i]["Ntb"] = number_format(@array_sum($sum1));
		$arr[$i]["Ndis"] = number_format(@array_sum($sum2));
		$arr[$i]["Nbonus"] = number_format(@array_sum($sum3));
		$arr[$i]["Ntotal"] = number_format(@array_sum($sum4));
		$arr[$i]["Nstatus"] = "";
		$arr[$i]["Nno"] = "";


	} // end type == date
	else if($type == 'all')
	{


		$i = 0;

		$ball_type3= array(1 =>"ได้","ได้ครึ่ง","คืนทุน", "เสีย", "เสียครึ่ง", "ยกเลิก", "รอ"); 
		$sql="select * from bom_tb_lotto_bill_play_live where b_date='$date' and  m_id='$mid'  and  lot_zone = '$zone' and  lot_rob = '$rob' and b_accept=1 $qqname $qqno  order by play_id desc";

 		$num=sql_num($sql);
 		if($num==0){
			$sql="select * from bom_tb_lotto_bill_play where b_date='$date' and  m_id='$mid' and  lot_zone = '$zone' and  lot_rob = '$rob'  and b_accept=1 $qqname $qqno  order by play_id desc"; 
	 	}
 
		$re=sql_query($sql);
		$x=1;
		$sum1=array();
		$sum2=array();
		$sum3=array();
 
 		while($rs_bill=sql_fetch($re)){
			$sum1[]=-$rs_bill["b_total"];
			$sum2[]=$rs_bill["b_total"]-$rs_bill["b_pay"];
			$sum3[]=(-$rs_bill["b_pay"])+$rs_bill["b_bonus"];
	 
			$arr[$i]["No"] = $i+1;
			$arr[$i]["Nid"] = $rs_bill["bill_id"];
			$arr[$i]["Ndate"] = date("d/m/Y" , $rs_bill["play_timestam"]);
			$arr[$i]["Ntime"] = date("H:i" , $rs_bill["play_timestam"]);
			$arr[$i]["Ntype"] = $lot_type[$lang_post][$rs_bill["lot_zone"]][$rs_bill[lot_type]];
			$arr[$i]["Nnum"] = _dt($rs_bill[play_number]);
			$arr[$i]["Ntb"] = number_format(-$rs_bill["b_total"]);
			$arr[$i]["Ndis"] = number_format($rs_bill["b_total"]-$rs_bill["b_pay"]);
			$arr[$i]["Ntotal"] = number_format((-$rs_bill["b_pay"])+$rs_bill["b_bonus"]);
	 		$arr[$i]["Nno"] = $rs_bill["b_no"] ?: $rs_bill["b_no"]="";	
	
			$i++;
		}

		$arr[$i]["Nid"] = "";
		$arr[$i]["Ndate"] = "";
		$arr[$i]["Ntime"] = "";
		$arr[$i]["Ntype"] = "";
		$arr[$i]["Nnum"] = "";
		$arr[$i]["Ntb"] = number_format(@array_sum($sum1));
		$arr[$i]["Ndis"] = number_format(@array_sum($sum2));
		$arr[$i]["Ntotal"] = number_format(@array_sum($sum3));
		$arr[$i]["Nno"] = "";

	} // end type == all

	
	echo json_encode($arr);
?>