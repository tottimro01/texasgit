<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

require('inc/conn.php');
require('inc/function.php');

	// ดึง agent 

	$sql= "select r_id , r_agent_id , r_user ,r_level from bom_tb_agent where r_user = '".$_GET["username"]."'";
	$re_agent=sql_array($sql);
	$r_agent_id = $re_agent["r_agent_id"].$re_agent["r_id"]."*";
	$lv = intval($re_agent["r_level"])+1;	
		
	$sql= "select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_level=".$lv."";
	$re=sql_query($sql);

	$data = [];
	while($rs=sql_fetch($re)){

		$data[$rs["r_user"]]["text"] =  "<span class='fa-stack fa-lg'>
										<i class='ace-icon glyphicon glyphicon-user fa-stack-1x text-danger' style='font-size:15px;'></i>
										<i class='ace-icon glyphicon glyphicon-user fa-fw' style='color:black;font-size:15px;'></i>
									</span> 
									<font size='2' color='black'><strong>".$rs["r_user"]."</strong></font>  
									<strong>( <font color='black'>".number_format($rs["r_count"])."</font> )</strong>
									<font color='black' class='fshow'> (step= 60.00) </font>
									<font color='black' class='fshow'> (today= 50.00) </font>
									<font color='black' class='fshow'> (live= 50.00) </font>
									<font color='black' class='fshow'> (sporttoday= 50.00) </font>
									<font color='black' class='fshow'> (sportlive= 50.00) </font>";

		$data[$rs["r_user"]]["type"] =  "folder";
		$data[$rs["r_user"]]["user"] =  $rs["r_user"];

	}

	// ดึง member
	$sql= "select * from bom_tb_member where  m_agent_id like '%$r_agent_id%' and m_level=".$lv."";
	$re=sql_query($sql);

	while($rs=sql_fetch($re)){

			$data[$rs["m_user"]]["text"] =  "&nbsp;&nbsp;&nbsp;&nbsp;<i class='ace-icon glyphicon glyphicon-user' ></i>  
								<font color='black'> ".$rs["m_user"]."</font> 
								<strong>( <font color='black'>".number_format($rs["m_count"])."</font> )</strong>";
			$data[$rs["m_user"]]["type"] =  "item";

	}

	$data["data"] = $data;
	echo json_encode($data);

 ?>

