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
		'msg'			=>	$lang_ag[3], //สำเร็จ
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
			'msg'			=>	$lang_ag[3], //สำเร็จ
			'status' 	=> 	true, 
		);
		 
	}
	else{
		$array_item['update'] = array(
			'msg'			=>	$lang_ag[1901].' '.$lang_ag[1666], //คุณไม่ได้รับสิทธิในการยกเลิกบิล กรุณาติดต่อตัวแทน
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
			$sql="select * from bom_tb_ball_list_score where b_id='$rs[b_id]'   ";
			$re2=sql_array_sp($sql);	
	if($re2['b_id']==""){
			$sql="select * from bom_tb_ball_list where b_id='$rs[b_id]'   ";
			$re2=sql_array_sp($sql);	
	}
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


			$sql="select b_zone,m_id from bom_tb_football_bill_live where bill_id='$_GET[id]' ";
	        $reb=sql_array($sql);

	        $sql="select m_id,m_count,m_agent_id,r_id from bom_tb_member where m_id='$reb[m_id]' ";
	        $rec=sql_array($sql);
	        $rs_ag = sql_array("select r_agent_id from bom_tb_agent where r_id = '$rec[r_id]'");
	        $log_sum=$rec[m_count]+$_GET[cc];
	        ######################LOG ใหม่
	        $sql="INSERT IGNORE INTO bom_tb_all_payment (
	        bap_date, bap_ip, bap_type  ,m_id ,r_id,  m_agent_id, r_agent_id, 
	        bap_before, bap_in ,bap_after,bap_comment,
	        bill_id,bap_play_type,bap_zone,
	        bap_code,bap_by_type,bap_by_id) values(
	        now(),'"._bIP()."', '11', '$rec[m_id]','$rec[r_id]','$rec[m_agent_id]','$rs_ag[r_agent_id]',
	        '$rec[m_count]' ,'$_GET[cc]','$log_sum','ปฏิเสธพนันกีฬา',
	        '$_GET[id]' , 1 , $reb[b_zone] ,
	        'CPB',2,'$_SESSION[rid]') ";
	        sql_query($sql);  
	        ######################LOG ใหม่


			$sql="update IGNORE bom_tb_member set m_count=m_count+$_GET[cc]  where  m_id='$_GET[xmid]'  ";
			sql_query($sql);
			############################บัญชี
			/*$sql="select * from bom_tb_member where m_id='$_GET[xmid]' ";
			$rec=sql_array($sql);

			$mtxt="AGคืนบิล";
			$q_count=$_GET[cc];
			$sum_count=$rec[m_count];
			$typeby=1;#ฝาก
			#$typeby=2;#ถอน
			$bill=$_GET[id];
			$sql="insert into bom_tb_databet_live (d_date	,bill_id	,m_id	,d_in	,d_sum, d_by,d_txt,r_agent_id) values (now(),'$bill','$rec[m_id]','$q_count','$sum_count','$typeby','$mtxt','$rec[m_agent_id]');";

			// echo $sql;
			sql_query($sql);*/
			############################บัญชี
		}

		$array_item['update'] = array(
			'msg'			=>	$lang_ag[3], //สำเร็จ
			'status' 	=> 	true, 
		);
		 
	}
	else{
		$array_item['update'] = array(
			'msg'			=>	$lang_ag[1901].' '.$lang_ag[1666], //คุณไม่ได้รับสิทธิในการยกเลิกบิล กรุณาติดต่อตัวแทน
			// 'sql' 		=> 	$sql,
			'status'	=> 	false, 
		);
	}
}

if($_GET[ac]=="pay"){
	if($_GET[ss]==0){$ss=1;}else{$ss=0;}
	$sql="update IGNORE bom_tb_football_bill set b_admin='$ss' where bill_id='$_GET[id]'  and r_agent_id like '%*$_SESSION[rid]*%' ";
	$rs = sql_query($sql);
	if($rs){
		$array_item['update']  = array(
			'msg'			=>	$lang_ag[3], //สำเร็จ
			'status' 	=> 	true, 
		);
	}
	else{
		$array_item['update']  = array(
			'msg'			=>	$lang_ag[4], //ผิดพลาด
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
		'mag'			=>	$lang_ag[1902], //กรุณาทำรายการจากหน้า บิลรอยืนยัน
		'status' 	=> 	true, 
	);
}

$array_item['get']["orderby"] = $_GET["orderby"];
$array_item['get']["mid"] = $_GET["mid"];
$array_item['get']["b"] = $_GET["b"];
$array_item['get']["q"] = $_GET["q"];
$array_item['get']["d"] = $_GET["d"];
$array_item['get']["ac"] = $_GET["ac"];
$array_item['get']["page"] = $_GET["page"];
$array_item['get']["perpapge"] = $_GET["perpapge"];

echo json_encode($array_item);

?>