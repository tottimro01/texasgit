<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>

<?php 

if($_SESSION["AGlang"]==""){
	$_SESSION["AGlang"]="th";
}
require('../inc/conn.php');
require('../inc/function.php');
require('../inc/ag_function.php');
require('../lang/ag_'.$_SESSION["AGlang"].'.php');

if($_POST['futype'] == "A")
{
	$edType = $_POST["edType"];
	// Agent ลบ
	if($edType == "r")
	{
		$new_credit = $_POST["credit"];
		$cradit_val = floatval(removeComma($_POST["cradit_val"]));
		$id = $_POST["id"];
		
		// ยอดเครดิตทีเปิดให้ member 
		$d_incre = strtotime("-7 day");
		$sql = "select sum(b_total) as btotal from bom_tb_football_bill where  m_agent_id like '%*".$_POST["id"]."*%'  and r_cut_bet_4=0";
		$reb1 = sql_array($sql);
		$sql = "select sum(b_total) as btotal from bom_tb_lotto_bill_live where  m_agent_id like '%*".$_POST["id"]."*%' and b_status=5";
		$reb2 = sql_array($sql);
		$sql = "select sum(b_total) as btotal from bom_tb_lotto_hun_bill where  m_agent_id like '%*".$_POST["id"]."*%' and play_timestam >= $d_incre";
		$reb3 = sql_array($sql);
		$sql = "select sum(b_total) as btotal from bom_tb_games_bill_play where  m_agent_id like '%*".$_POST["id"]."*%' and play_timestam >= $d_incre";
		$reb4 = sql_array($sql);
		$sum_kank2 = $reb1["btotal"] + $reb2["btotal"] + $reb3["btotal"] + $reb4["btotal"];
	
		$sql = "select r_count as xtotal , r_type from bom_tb_agent where r_id=".$_POST["id"];
		$re4 = sql_array($sql);
	
		$rtype = "m_count";
		$sql = "select sum($rtype) as xtotal from bom_tb_member where  m_agent_id like '%*".$_POST["id"]."*%'";
		$re5 = sql_array($sql);
	
		// ยอดรวมเครดิตที่โอนให้ member
		$x_count_member = ($re5["xtotal"] + $sum_kank2);

		// ยอดเครดิตทีเปิดให้ agent 
		$lv = intval($_SESSION["r_level"])+2;
		$sql="select sum(r_count) as xtotal from bom_tb_agent where   r_agent_id like '%*".$_POST["id"]."*%' and r_level=$lv  ";
		$re3=sql_array($sql);

		$sql = "select * from bom_tb_agent where  r_agent_id like '%*".$_SESSION["r_id"]."*%'  and   r_id='".$_POST["id"]."' ";
		$rex = sql_array($sql);
	
		$x_count=$rex["r_count"]-($x_count_member+$re3["xtotal"]);

		if($cradit_val > floatval($x_count))  // ถ้ายอดเงินที่ต้องการลบ มากกว่ายอดเงินที่สามารถลบได้ (ยอดเงินที่มี - ยอดเงินที่เปิดให้สมาชิกและเอเย่นต์)
		{
			$data = array(
				'msg' => $lang_message[15],
				'status' => "error"
			);
			echo json_encode($data);
			exit();
		}
		else
		{
			$sql = "select * from bom_tb_agent where r_id='{$id}'";
			$rem = sql_array($sql);
			$from = $rem[r_count];	
			// $have=$rem[m_count_de];

			$edType = $_POST[edType];
			$a['from'] = $from;
			// $a['have'] = $have;
			$a['edType'] = $_POST[edType];
			$a['r_count'] = $rem[r_count];
	
			if($edType == "i") // เพิ่ม
			{
				$p_comment = "ฝาก";
				$ptype = 1;
				$pay=$_POST[credit]-$from;
			}
			else if($edType == "r") // ลบ
			{
				if($cradit_val > floatval($rem[r_count]))
				{
					$data = array(
						'msg' => $lang_message[15],
						'status' => "error"
					);
					echo json_encode($data);
					exit();
				}
				$p_comment = "ถอน";
				$ptype = 2;	
				$pay=$_POST[credit]-$from;
			}
	
			$bet = 0;
			$bank = $_POST[tbank];
	
			if($_SESSION["uu_use"] == 0)
			{
				$u_id = 'NULL';
				// $r_id = $_SESSION["r_id"];
				$by = $_SESSION["r_user"];
				// $a['99999'] = "9999";
			}
			else
			{
				$u_id = $_SESSION["uu_id"];
				// $r_id = $_SESSION["r_id"];
				$sql = "select * from bom_tb_agent where r_id='".$_SESSION["r_id"]."'";
				$rex = sql_array($sql);
				$by = $rex["r_user"];
				// $a['sql999'] = $sql;
			}
			$sql="INSERT IGNORE INTO bom_tb_payment (p_date, p_from, p_bet, p_pay, p_type, r_id, r_level, r_agent_id, p_by, p_comment, p_datename, u_id) values(now(),'$from', '$bet', '$pay','$ptype','$rem[r_id]','$rem[r_level]','$rem[r_agent_id]','$by' ,'$p_comment'  ,'".date("D")."',$u_id) ";
			sql_query($sql);
			// $a['sql_payment'] = $sql;
		}
	}

	// Agent เพิ่ม
	else
	{
		$new_credit = $_POST['credit'];
		$cradit_val = floatval(removeComma($_POST["cradit_val"]));

		$id = $_POST['id'];
		$lv = intval($_SESSION['r_level'])+1;
		
		$sql="select r_count as xtotal from bom_tb_agent where   r_id= {$_SESSION['r_id']} ";
		$re4=sql_array($sql);
					
		$sql="select sum(r_count) as xtotal from bom_tb_agent where   r_agent_id like '%*{$_SESSION['r_id']}*%' and r_level=$lv ";
		$re5=sql_array($sql);
		$x_count2=$re4['xtotal']-$re5['xtotal'];
				
		$sql="select * from bom_tb_agent where  r_agent_id like '%*{$_SESSION['r_id']}*%'  and   r_id='{$id}' ";
		$rex=sql_array($sql);
		
		$x_count3=$x_count2+$rex['r_count']-$sum_kank2;

		if($cradit_val > floatval($x_count3)) // ถ้ายอดเงินที่ต้องการเพิ่ม มากกว่ายอดเงินที่เหลือ
		{
			$data = array(
				'msg' => $lang_message[15],
				'status' => "error"
			);
			echo json_encode($data);
			exit();
		}
		else
		{
			$sql = "select * from bom_tb_agent where r_id='{$id}'";
			$rem = sql_array($sql);
			$from = $rem[r_count];	
			// $have=$rem[m_count_de];

			$edType = $_POST[edType];
			$a['from'] = $from;
			// $a['have'] = $have;
			$a['edType'] = $_POST[edType];
			$a['r_count'] = $rem[r_count];
	
			if($edType == "i") // เพิ่ม
			{
				$p_comment = "ฝาก";
				$ptype = 1;
				$pay=$_POST[credit]-$from;
			}
			else if($edType == "r") // ลบ
			{
				if($cradit_val > floatval($rem[r_count]))
				{
					$data = array(
						'msg' => $lang_message[15],
						'status' => "error"
					);
					echo json_encode($data);
					exit();
				}
				$p_comment = "ถอน";
				$ptype = 2;	
				$pay=$_POST[credit]-$from;
			}
	
			$bet = 0;
			$bank = $_POST[tbank];
	
			if($_SESSION["uu_use"] == 0)
			{
				$u_id = 'NULL';
				$by = $_SESSION["r_user"];
			}
			else
			{
				$u_id = $_SESSION["uu_id"];
				$sql = "select * from bom_tb_agent where r_id='".$_SESSION["r_id"]."'";
				$rex = sql_array($sql);
				$by = $rex["r_user"];
			}
			$sql="INSERT IGNORE INTO bom_tb_payment (p_date, p_from, p_bet, p_pay, p_type, r_id, r_level, r_agent_id, p_by, p_comment, p_datename, u_id) values(now(),'$from', '$bet', '$pay','$ptype','$rem[r_id]','$rem[r_level]','$rem[r_agent_id]','$by' ,'$p_comment'  ,'".date("D")."',$u_id) ";
			sql_query($sql);
		}
	}

	$sql = "UPDATE `bom_tb_agent` SET `r_count` = '{$new_credit}' where r_agent_id like '%*$_SESSION[rid]*%'  and  r_id = {$id}";
	$re=sql_query($sql);

	if($re)
	{
		$data = array(
		'msg' => $lang_message[5],
		'status' => "success"
		);
	}
	else
	{
		$data = array(
			'msg' => $lang_message[4],
			'status' => "error"
		);
	}

	// $data = array(
	// 	'msg' => "บันทึกเสร็จสมบูรณ์",
	// 	'status' => "success"
	// 	);

}
else if($_POST['futype'] == "M")
{
	$new_credit = $_POST[credit];
	$cradit_val = floatval(removeComma($_POST["cradit_val"]));
	$id = $_POST[id];
	$lv = intval($_SESSION[r_level])+1;

	$d_incre = strtotime("-7 day");
	$sql="select sum(b_total) as btotal from bom_tb_football_bill where  m_agent_id like '%*{$_SESSION[r_id]}*%'  and r_cut_bet_4=0";
	$reb1=sql_array($sql);
	$sql="select sum(b_total) as btotal from bom_tb_lotto_bill_live where  m_agent_id like '%*{$_SESSION[r_id]}*%' and b_status=5";
	$reb2=sql_array($sql);
	$sql="select sum(b_total) as btotal from bom_tb_lotto_hun_bill where  m_agent_id like '%*{$_SESSION[r_id]}*%' and play_timestam >= $d_incre";
	$reb3=sql_array($sql);
	$sql="select sum(b_total) as btotal from bom_tb_games_bill_play where  m_agent_id like '%*{$_SESSION[r_id]}*%' and play_timestam >= $d_incre";
	$reb4=sql_array($sql);
	$sum_kank2=$reb1[btotal]+$reb2[btotal]+$reb3[btotal]+$reb4[btotal];
			 
	$sql="select r_count as xtotal , r_type  from bom_tb_agent where  r_id={$_SESSION[r_id]} ";
	$re4=sql_array($sql);
	
	$rtype="m_count";
	$sql="select sum($rtype) as xtotal from bom_tb_member where  m_agent_id like '%*{$_SESSION[r_id]}*%'";
	$re5=sql_array($sql);
	
	$x_count3=$re4[xtotal]-($re5[xtotal]+$sum_kank2);

	if($cradit_val > $x_count3)
	{
		$data = array(
			'msg' => $lang_message[15],
			'status' => "error"
		);
	}
	else
	{
		$sql="select * from bom_tb_member   where  m_agent_id like '%*{$_SESSION[r_id]}*%'  and   m_id='{$id}' ";
		$rem=sql_array($sql);
		$from=$rem[m_count];	
		$have=$rem[m_count_de];	

		$edType = $_POST[edType];

		$a['from'] = $from;
		$a['have'] = $have;
		$a['edType'] = $_POST[edType];
		$a['m_count'] = $rem[m_count];

		if($edType == "i") // เพิ่ม
		{
			$p_comment= "ฝาก";
			$ptype=1;
			$pay=$_POST[credit]-$from;

		}
		else if($edType == "r") // ลบ
		{
			if($cradit_val > floatval($rem[m_count]))
			{
				$data = array(
					'msg' => $lang_message[15],
					'status' => "error"
				);
				echo json_encode($data);
				exit();
			}

			$p_comment="ถอน";
			$ptype=2;	
			$pay=$_POST[credit]-$from;
		}

		$bet=0;
		$bank=$_POST[tbank];

		if($_SESSION["uu_use"]==0)
		{
			$u_id = 'NULL';
			// $r_id = $_SESSION["r_id"];
			$by=$_SESSION["r_user"];
			$a['99999'] = "9999";
		}
		else
		{
			$u_id = $_SESSION["uu_id"];
			// $r_id = $_SESSION["r_id"];
			$sql="select * from bom_tb_agent where r_id='".$_SESSION["r_id"]."'";
			$rex=sql_array($sql);
			$by=$rex["r_user"];
			$a['sql999'] = $sql;
		}

		// $sql="INSERT IGNORE INTO bom_tb_payment (p_date, p_from,	p_bet	,p_pay	,p_type,	m_id,	r_level,	r_agent_id, p_by, p_comment , p_datename,r_id,u_id) values(now(),'$from', '$bet', '$pay','$ptype','$rem[m_id]','$rem[m_level]','$rem[m_agent_id]','$by' ,'$p_comment'  ,'".date("D")."',$r_id,$u_id) ";
		// sql cut r_id
		$sql="INSERT IGNORE INTO bom_tb_payment (p_date, p_from,	p_bet	,p_pay	,p_type,	m_id,	r_level,	r_agent_id, p_by, p_comment , p_datename,u_id) values(now(),'$from', '$bet', '$pay','$ptype','$rem[m_id]','$rem[m_level]','$rem[m_agent_id]','$by' ,'$p_comment'  ,'".date("D")."',$u_id) ";
		sql_query($sql);
		$a['sql_payment'] = $sql;

		if($edType == "i")
		{

			// if($_POST[mt]==6){
			// 	$log_sum=$pay;
			// }else{
			// 	$log_sum=$from+$pay;
			// }

			$log_sum = $pay+$from;
			$in = $pay;

			// old insert table bom_tb_databet
			$sql="INSERT IGNORE INTO bom_tb_databet_live (d_date,	m_id	,d_count,	d_in	,d_sum	,d_by ) values(now() ,'{$id}','$from','$in','$log_sum', 1)";
			sql_query($sql);
			$a['sql_databet'] = $sql;

		}
		else if($edType == "r")
		{
			// if($_POST[mt]==6){
			// 	$log_sum=$pay;
			// }else{
			// 	$log_sum=$from+$pay;
			// }

			$log_sum = $from-($pay*-1);
			$out = $pay;

			// old insert table bom_tb_databet
			$sql="INSERT IGNORE INTO bom_tb_databet_live (d_date,	m_id	,d_count,	d_out	,d_sum	,d_by ) values(now() ,'{$id}','$from','$out','$log_sum', 1)";
			sql_query($sql);
			$a['sql_databet'] = $sql;
		}

		$sql = "UPDATE `bom_tb_member` SET `m_count` = '{$new_credit}'  where  m_agent_id like '%*{$_SESSION[r_id]}*%'  and   m_id='{$id}' ";
		$re=sql_query($sql);

		if($re)
		{
			$data = array(
			'msg' => $lang_message[5],
			'a' => $a,
			'status' => "success"
			);
		}
		else
		{
			$data = array(
				'msg' => $lang_message[4],
				'status' => "error"
			);
		}
	}
}

echo json_encode($data);
?>