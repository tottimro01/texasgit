<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

if($_SESSION["AGlang"]=="")
{
	$_SESSION["AGlang"]="th";
}

require('../lang/sa_lang.php');
require('conn.php');
require('function.php');
require('ag_function.php');
require('../../lang/function_array.php');



if($_POST['futype'] == "A")
{

	$edType = $_POST["edType"];
	$new_credit = $_POST["credit"];
	$cradit_val = floatval(removeComma($_POST["cradit_val"]));
    $id = $_POST["id"];	
    $lv = 1;
    $sql = "SELECT * FROM `bom_tb_agent` WHERE 1 and r_level = $lv and  r_id = $id";
    $rs = sql_array($sql);
	// Agent ลบ
	if($edType == "r")
	{
		

		$up_lv = intval($_SESSION["r_level"])+2;

		 // ยอดเครดิตทีเปิดให้ member 
		 $d_incre = strtotime("-7 day");
		 $sql = "select sum(b_total) as btotal from bom_tb_football_bill where  m_agent_id like '%*".$id."*%'  and r_cut_bet_4=0";
		 $reb1 = sql_array($sql);
		 $sql = "select sum(b_total) as btotal from bom_tb_lotto_bill_live where  m_agent_id like '%*".$id."*%' and b_status=5";
		 $reb2 = sql_array($sql);
		 $sql = "select sum(b_total) as btotal from bom_tb_lotto_hun_bill where  m_agent_id like '%*".$id."*%' and play_timestam >= $d_incre";
		 $reb3 = sql_array($sql);
		 $sql = "select sum(b_total) as btotal from bom_tb_games_bill_play where  m_agent_id like '%*".$id."*%' and play_timestam >= $d_incre";
		 $reb4 = sql_array($sql);
		 $sum_kank2 = $reb1["btotal"] + $reb2["btotal"] + $reb3["btotal"] + $reb4["btotal"];
				 $sql = "select r_count as xtotal , r_type from bom_tb_agent where r_id=".$id;
		 $re4 = sql_array($sql);
				 $rtype = "m_count";
		 $sql = "select sum($rtype) as xtotal from bom_tb_member where  m_agent_id like '%*".$id."*%' and m_level=$up_lv";
		 $re5 = sql_array($sql);
				 // ยอดรวมเครดิตที่โอนให้ member
		 $x_count_member = ($re5["xtotal"] + $sum_kank2);
				// ยอดเครดิตทีเปิดให้ agent 
		 
		 $sql="select sum(r_count) as xtotal from bom_tb_agent where   r_agent_id like '%*".$id."*%' and r_level=$up_lv  ";
		 $re3=sql_array($sql);
		 $x_count=$rs["r_count"]-($x_count_member+$re3["xtotal"]);


		 // echo $x_count;

		 if($cradit_val > floatval($x_count))  // ถ้ายอดเงินที่ต้องการลบ มากกว่ายอดเงินที่สามารถลบได้ (ยอดเงินที่มี - ยอดเงินที่เปิดให้สมาชิกและเอเย่นต์)
		 {
		 	$data = array(
				'msg' => "กรอกข้อมูลไม่ถูกต้อง",
				'status' => false,
				'error_type' => 1,
			);
			echo json_encode($data);
			exit();
		 }



	}else if($edType == "i")
	{
		if($new_credit < $rs["r_count"])
		{
			$data = array(
				'msg' => "กรอกข้อมูลไม่ถูกต้อง",
				'status' => false,
				'error_type' => 1,
			);
			echo json_encode($data);
			exit();
		}	

	}


	if($new_credit != "")
	{
		$sql = "UPDATE `bom_tb_agent` SET `r_count` = '{$new_credit}' WHERE 1 and r_level = $lv and  r_id = $id";
		$re=sql_query($sql);
		if($re)
		{
			$data = array(
			'msg' => "สำเร็จ",
			'status' => true,
			'error_type' => 0,
			);
		}
		else
		{
			$data = array(
				'msg' => "ผิดพลาด",
				'status' => true,
				'error_type' => 2,
			);
		}

		// $data = array(
		// 	'msg' => "ผิดพลาด",
		// 	// 'sql' => $sql,
		// 	'cradit_val' => $cradit_val.">".floatval($x_count),
			
		// 	'status' => true,
		// 	'error_type' => 2,
		// );


	}else{
		$data = array(
			'msg' => "ผิดพลาด",
			'status' => true,
			'error_type' => 2,
		);
	}
	

	

	
	

	echo json_encode($data);
	exit();

}	

 ?>