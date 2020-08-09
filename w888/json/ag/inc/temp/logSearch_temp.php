<?php 
require('inc_head_bySession.php');

if($_POST["typeLog"] == "loginLog")
{

	$r_agent_id = $_SESSION["r_agent_id"];

	$sql="SELECT h_id FROM `bom_tb_login_ag` where r_agent_id = '$r_agent_id' and r_use IS NULL";   
    $num_row = sql_num($sql); 

      //// pageination //

      $rowPerPage = $_POST["rowPerPage"];
      $page       = $_POST["thisPage"];
      $start      = ($page-1)*$rowPerPage;

      $pagi_data["numrow"] =  $num_row;
      $pagi_data["rowPerPage"] =  $rowPerPage;
      $pagi_data["total_page"] = ceil($num_row/$rowPerPage); 
      $pagi_data["active_page"] = intval($page);
      $pagi_data["start_page"]  = $start; 

     //// pageination //

     $sql_limit="SELECT * FROM `bom_tb_login_ag` where r_agent_id = '$r_agent_id' and r_use IS NULL ORDER BY `h_id` DESC LIMIT {$start} , {$rowPerPage}"; 
	 $re=sql_query($sql_limit); 

	 $no = $rowPerPage*($page-1);
	 $templates= [];
	 while($rs=sql_fetch_as($re)){

	 	$no ++;
	 	$templates[] = "<tr>
					<td align='center'> $no </td>
					<td align='center'>". $rs["h_date"] ."</td>
					<td align='center'>". $rs["h_ip"] ."</td>
					<td align='center'>". $rs["h_location"] ."</td>
					<td align='center'>". $rs["h_data"] ."</td>
				</tr>";	
	 		 	
	 }

	 if(count($templates) == 0)
	 {
	 	$templates[] = "<tr>
					<td align='center' colspan='100%'> {$lang_message[1]} </td>
				</tr>";	
	 }

		$data = array(
			"list"		=>	$templates,
			"status"	=>	true,
			"typeLog"	=>	"loginLog",
			"pagi_data" => $pagi_data
		);

		echo json_encode($data);

}else if($_POST["typeLog"] == "subUserLog")
{
	$r_agent_id = $_SESSION["r_agent_id"];
	// ดึงข้อมูล ผู้ช่วย 
	$sql="SELECT u_id,u_name , u_user FROM `bom_tb_agent_use` where r_id = '".$_SESSION["r_id"]."'";  
	$re=sql_query($sql); 
	$subAgentData = []; 
	while($rs=sql_fetch_as($re)){
		$subAgentData[$rs["u_id"]] = $rs;
	}

	$sql="SELECT h_id FROM `bom_tb_login_ag` where r_agent_id = '$r_agent_id' and r_use IS NOT NULL";   
    $num_row = sql_num($sql); 

      //// pageination //

      $rowPerPage = $_POST["rowPerPage"];
      $page       = $_POST["thisPage"];
      $start      = ($page-1)*$rowPerPage;

      $pagi_data["numrow"] =  $num_row;
      $pagi_data["rowPerPage"] =  $rowPerPage;
      $pagi_data["total_page"] = ceil($num_row/$rowPerPage); 
      $pagi_data["active_page"] = intval($page);
      $pagi_data["start_page"]  = $start; 
   
     //// pageination //

     $sql_limit="SELECT * FROM `bom_tb_login_ag` where r_agent_id = '$r_agent_id' and r_use IS NOT NULL ORDER BY `h_id` DESC LIMIT {$start} , {$rowPerPage}"; 
	 $re=sql_query($sql_limit); 

	  $no = $rowPerPage*($page-1);
	 $templates= [];
	 
	 while($rs=sql_fetch_as($re)){
		$subAgentData[$rs["r_use"]]["u_name"] = ($subAgentData[$rs["r_use"]]["u_name"] != "") ? $subAgentData[$rs["r_use"]]["u_name"] : $lang_log[16];
	 	$no ++;
	 	$templates[] = "<tr>
					<td align='center'>". $no ."</td>
					<td align='center'> ".$subAgentData[$rs["r_use"]]["u_user"]." </td>
					<td align='center'> ".$subAgentData[$rs["r_use"]]["u_name"]." </td>
					<td align='center'>". $rs["h_date"] ."</td>
					<td align='center'>". $rs["h_ip"] ."</td>
					<td align='center'>". $rs["h_location"] ."</td>
					<td align='center'>". $rs["h_data"]." </td>
				</tr>";	
	 		 	
	 }

	 	if(count($templates) == 0)
	 	{
	 		$templates[] = "<tr>
					<td align='center' colspan='100%'> {$lang_message[1]} </td>
				</tr>";	
	 	}

		$data = array(
			"list"		=>	$templates,
			"status"	=>	true,
			"typeLog"	=>	"subUserLog",
			"pagi_data" => $pagi_data
		);

		echo json_encode($data);
}else if($_POST["typeLog"] == "agentLog")
{

	$r_agent_id = $_SESSION["r_agent_id"].$_SESSION["r_id"].'*';

	// ดึงข้อมูล เอเยนต์
	$sql="SELECT r_id,r_name , r_user FROM `bom_tb_agent` where r_agent_id = '$r_agent_id'";  
	$re=sql_query($sql); 
	$agentData = []; 
	while($rs=sql_fetch_as($re)){
		$agentData[$rs["r_id"]] = $rs;
	}

	
	$sql="SELECT h_id FROM `bom_tb_login_ag` where r_agent_id = '$r_agent_id' and r_use IS NULL";   
    $num_row = sql_num($sql); 

      //// pageination //

    $rowPerPage = $_POST["rowPerPage"];
    $page       = $_POST["thisPage"];
    $start      = ($page-1)*$rowPerPage;

    $pagi_data["numrow"] =  $num_row;
    $pagi_data["rowPerPage"] =  $rowPerPage;
    $pagi_data["total_page"] = ceil($num_row/$rowPerPage); 
    $pagi_data["active_page"] = intval($page);
    $pagi_data["start_page"]  = $start; 
   
     //// pageination //


     $sql_limit="SELECT * FROM `bom_tb_login_ag` where r_agent_id = '$r_agent_id' and r_use IS NULL ORDER BY `h_id` DESC LIMIT {$start} , {$rowPerPage}"; 
	 $re=sql_query($sql_limit); 

	 $no = $rowPerPage*($page-1);
	 $templates= [];
	 while($rs=sql_fetch_as($re)){
		$agentData[$rs["r_id"]]["r_name"] = ($agentData[$rs["r_id"]]["r_name"] != "") ? $agentData[$rs["r_id"]]["r_name"] : $lang_log[16];

	 	$no ++;
	 
		$templates[] = "<tr>
					<td align='center'>". $no ."</td>
					<td align='center'> ".$agentData[$rs["r_id"]]["r_user"]." </td>
					<td align='center'> ".$agentData[$rs["r_id"]]["r_name"]." </td>
					<td align='center'>". $rs["h_date"] ."</td>
					<td align='center'>". $rs["h_ip"] ."</td>
					<td align='center'>". $rs["h_location"] ."</td>
					<td align='center'>". $rs["h_data"]." </td>
				</tr>";				
	 		 	
	 }

	 if(count($templates) == 0)
	 {
	 	$templates[] = "<tr>
					<td align='center' colspan='100%'> {$lang_message[1]} </td>
				</tr>";	
	 }

	$data = array(
			"list"		=>	$templates,
			"status"	=>	true,
			"typeLog"	=>	"agentLog",
			"pagi_data" => $pagi_data
		);

	echo json_encode($data);

}else if($_POST["typeLog"] == "memberLog")
{


	$r_agent_id = $_SESSION["r_agent_id"].$_SESSION["r_id"].'*';

	// ดึงข้อมูล สมาชิก
	$sql="SELECT m_id,m_name , m_user FROM `bom_tb_member` where m_agent_id = '$r_agent_id'";  
	$re=sql_query($sql); 
	$memberData = []; 
	while($rs=sql_fetch_as($re)){
		$memberData[$rs["m_id"]] = $rs;
	}

	$sql="SELECT h_id FROM `bom_tb_login_mem` where r_agent_id = '$r_agent_id'";   
    $num_row = sql_num($sql); 

      //// pageination //

    $rowPerPage = $_POST["rowPerPage"];
    $page       = $_POST["thisPage"];
    $start      = ($page-1)*$rowPerPage;

    $pagi_data["numrow"] =  $num_row;
    $pagi_data["rowPerPage"] =  $rowPerPage;
    $pagi_data["total_page"] = ceil($num_row/$rowPerPage); 
    $pagi_data["active_page"] = intval($page);
    $pagi_data["start_page"]  = $start; 
 
     //// pageination //

     $sql_limit="SELECT * FROM `bom_tb_login_mem` where r_agent_id = '$r_agent_id'  ORDER BY `h_id` DESC LIMIT {$start} , {$rowPerPage}"; 
	 $re=sql_query($sql_limit); 

	 $no = $rowPerPage*($page-1);
	 $templates= [];
	 while($rs=sql_fetch_as($re)){
		$memberData[$rs["m_id"]]["m_name"] = ($memberData[$rs["m_id"]]["m_name"] != "") ? $memberData[$rs["m_id"]]["m_name"] : $lang_log[16];

	 	$no ++;
	 	
		$templates[] = "<tr>
					<td align='center'>". $no ."</td>
					<td align='center'>".$memberData[$rs["m_id"]]["m_user"]."</td>
					<td align='center'>".$memberData[$rs["m_id"]]["m_name"]."</td>
					<td align='center'>". $rs["h_date"] ."</td>
					<td align='center'>". $rs["h_ip"] ."</td>
					<td align='center'>". $rs["h_location"] ."</td>
					<td align='center'>". $rs["h_data"] ."</td>
				</tr>";				
	 		 	
	 }

	 if(count($templates) == 0)
	 {
	 	$templates[] = "<tr>
					<td align='center' colspan='100%'> {$lang_message[1]} </td>
				</tr>";	
	 }

	$data = array(
			"list"		=>	$templates,
			"status"	=>	true,
			"typeLog"	=>	"memberLog",
			"pagi_data" => $pagi_data
		);

	echo json_encode($data);

}


?>