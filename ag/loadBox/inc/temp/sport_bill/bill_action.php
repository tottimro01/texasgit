<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
		
require('../../conn.php');
require('../../function.php');

if($_SESSION["AGlang"]=="")
{
	$_SESSION["AGlang"]="th";
}

require('../../../lang/ag_lang.php');
require('../../../lang/function_array.php');

//เช็คหัว ว่าผิดรับบิลมั้ย
$r_agent_id_level = explode("*", $_SESSION['r_agent_id'].$_SESSION['rid']."*");
$sql = "select r_id, r_sport_delete_bill from bom_tb_agent where r_id in (".implode(",",array_filter($r_agent_id_level)).")";
$re_delete_bin = sql_query($sql);
$is_delete_bin = true;
while($rs = sql_fetch($re_delete_bin)){
	if($rs['r_sport_delete_bill'] == 0){
		$is_delete_bin = false;
	}
}

if($_GET[ac]=="ac_last"){
	$sql="update IGNORE bom_tb_football_bill_play_live set b_accept=1, b_status=5  where b_accept=3 and bill_id='$_GET[id]'  and play_status!=6  ";
	sql_query($sql);

	$sql="update IGNORE bom_tb_football_bill_live set b_accept=1 where b_accept=3  and bill_id='$_GET[id]'";
	sql_query($sql);

	$array_item['update']  = array(
		'msg'			=>	$lang_sportBill[40], //สำเร็จ
		'status'	=>	true, 
	);
}

if($_GET[ac]=="not"){
	if($is_delete_bin){
		$id=$_GET[id];	
		$sql="update IGNORE bom_tb_football_bill_play_live set b_accept=2 where b_accept=3 and bill_id='$id'  ";
		sql_query($sql);

		#############STEP2
		$sql="select * from bom_tb_football_bill_live where  bill_id='$id' ";
		$re=sql_query($sql);
		
		while($rs=sql_fetch($re)){
			$sql="select * from  bom_tb_football_bill_live   where  bill_id='$rs[bill_id]' ";
			$lock=sql_array($sql);
					
			if($lock[b_accept]!=2){
				############## UPDATE
				$sql="update IGNORE bom_tb_football_bill_live set b_accept=2 where b_accept=3 and bill_id='$rs[bill_id]' ";
				sql_query($sql);
				
				$sql="update IGNORE bom_tb_member set m_count=m_count+ $rs[b_total]  where  m_id='$rs[m_id]' ";
				sql_query($sql);
						
				############################บัญชี
				$sql="select * from bom_tb_member where m_id='$rs[m_id]' ";
				$rec=sql_array($sql);
				
				$rec[r_id]=99998;
				$mtxt="AGคืนบิล";
				$q_count=$rs[b_total];
				$sum_count=$rec[m_count];
				$typeby=1;#ฝาก
				#$typeby=2;#ถอน
				$bill=$rs[bill_id];
				$sql="insert into bom_tb_databet_live (d_date	,bill_id	,m_id	,d_in	,d_sum, d_by,d_txt,r_agent_id) values (now(),'$bill','$rec[m_id]','$q_count','$sum_count','$typeby','$mtxt','$rec[m_agent_id]');";
				sql_query($sql);
				############################บัญชี
					
			}
		}

		$array_item['update'] = array(
			'msg'			=>	$lang_sportBill[40], //สำเร็จ
			'status' 	=> 	true, 
		);
		 
	}
	else{
		$array_item['update'] = array(
			'msg'			=>	$lang_sportBill[41].' '.$lang_sportBill[42], //คุณไม่ได้รับสิทธิในการยกเลิกบิล กรุณาติดต่อตัวแทน
			// 'sql' 		=> 	$sql, 
			'status'	=> 	false, 
		);
	}
}

if($_GET[ac]=="del"){
	if($is_delete_bin){
		$not=0;	
		$time_stopxxx=20000;
		$sql="select * from bom_tb_football_bill_play_live where bill_id='$_GET[id]' and r_agent_id like '%*$_SESSION[rid]*%' ";
		$re=sql_query($sql);
		while($rs=sql_fetch($re)){
			$sql="select * from bom_tb_ball_list where b_id='$rs[b_id]'   ";
			$re2=sql_array_sp($sql);	
			$time_stop=$re2[b_date_play]+(60*$time_stopxxx);

			// echo $sql;
			if($time_stop<$time_stam)
			{
				$not=1;
			}
		}

		if($not==0){
			########################Update
			#$sql="delete from bom_tb_football_bill  where bill_id='$_GET[id]'  ";
			$sql="update IGNORE bom_tb_football_bill_live set b_accept=2  , b_can_date=now() , b_can_rid='$_SESSION[rid]'   where  bill_id='$_GET[id]' ";
			sql_query($sql);
			#$sql="delete from bom_tb_football_bill_play  where bill_id='$_GET[id]'  ";
			$sql="update IGNORE bom_tb_football_bill_play_live set b_accept=2  , b_can_date=now() , b_can_rid='$_SESSION[rid]'   where  bill_id='$_GET[id]' ";
			sql_query($sql);
			$sql="update IGNORE bom_tb_member set m_count=m_count+$_GET[cc]  where  m_id='$_GET[xmid]'  ";

			sql_query($sql);
			############################บัญชี
			$sql="select * from bom_tb_member where m_id='$_GET[xmid]' ";
			$rec=sql_array($sql);

			$mtxt="AGคืนบิล";
			$q_count=$_GET[cc];
			$sum_count=$rec[m_count];
			$typeby=1;#ฝาก
			#$typeby=2;#ถอน
			$bill=$_GET[id];
			$sql="insert into bom_tb_databet_live (d_date	,bill_id	,m_id	,d_in	,d_sum, d_by,d_txt,r_agent_id) values (now(),'$bill','$rec[m_id]','$q_count','$sum_count','$typeby','$mtxt','$rec[m_agent_id]');";

			// echo $sql;
			sql_query($sql);
			############################บัญชี
		}

		$array_item['update'] = array(
			'msg'			=>	$lang_sportBill[40], //สำเร็จ
			'status' 	=> 	true, 
		);
		 
	}
	else{
		$array_item['update'] = array(
			'msg'			=>	$lang_sportBill[41].' '.$lang_sportBill[42], //คุณไม่ได้รับสิทธิในการยกเลิกบิล กรุณาติดต่อตัวแทน
			// 'sql' 		=> 	$sql,
			'status'	=> 	false, 
		);
	}
}

if($_GET[ac]=="pay"){
	if($_GET[ss]==0){$ss=1;}else{$ss=0;}
	$sql="update IGNORE bom_tb_football_bill_live  set b_admin='$ss' where bill_id='$_GET[id]'  and r_agent_id like '%*$_SESSION[rid]*%' ";
	$rs = sql_query($sql);
	if($rs){
		$array_item['update']  = array(
			'msg'			=>	$lang_sportBill[40], //สำเร็จ
			'status' 	=> 	true, 
		);
	}
	else{
		$array_item['update']  = array(
			'msg'			=>	$lang_sportBill[43], //ผิดพลาด
			// 'sql' 		=> 	$sql,
			'status' 	=> 	false,
		);
	}
}

if($_GET[ac]=="accept"){
	$ss=$_GET[act];
	$sql="update IGNORE bom_tb_football_bill_live set b_accept=$ss  where  bill_id='$_GET[id]'";
	#sql_query($sql);
	$sql="update IGNORE bom_tb_football_bill_play_live set b_accept=$ss  where  bill_id='$_GET[id]'";
	#sql_query($sql);
	$array_item['update']  = array(
		'mag'			=>	$lang_sportBill[44], //กรุณาทำรายการจากหน้า บิลรอยืนยัน
		'status' 	=> 	true, 
	);
}

$array_item['get']["orderby"] = $_GET["orderby"];
$array_item['get']["mid"] = $_GET["mid"];
$array_item['get']["b"] = $_GET["b"];
$array_item['get']["q"] = $_GET["q"];
$array_item['get']["d"] = $_GET["d"];
$array_item['get']["ac"] = $_GET["ac"];
$array_item['get']["perpapge"] = $_GET["perpapge"];

echo json_encode($array_item);

?>