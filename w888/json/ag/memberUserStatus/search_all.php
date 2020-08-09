<?php
	ob_start(); if (!isset($_SESSION)) { session_start(); }
	
if($_SESSION["AGlang"]=="")
{
	$_SESSION["AGlang"]="th";
}

require('../lang/ag_'.$_SESSION["AGlang"].'.php');
require('../inc/conn.php');
require('../inc/function.php');

  $data = [];

  $agent_ico = "[<i class=\"ace-icon fa fa-users bigger-140 bg-icon\"></i>] ";
  $member_ico = "[<i class=\"ace-icon fa fa-user bigger-140 bg-icon\"></i>] ";
	$head = "
		<tr>
			<th rowspan='3' class='center'> {$lang_memberUserStatus[14]} </th>
			<th rowspan='3' class='center'> {$lang_memberUserStatus[15]} </th>
			<th rowspan='3'> {$lang_memberUserStatus[16]} </th>
			<th colspan='12'><center> {$lang_memberUserStatus[17]} </center></th>
		</tr>
		<tr>";

		foreach ($lang_g["list_open"] as $key => $value) {
			$head .= "<th>
									<span class='lbl'> {$value} </span>
								</th>";
		}

	$head .= "</tr>
	";


	$list_sort = $_POST["list_sort"];                                     
	$qq = "";
	if($_POST["fuser"] != "")
	{
		$serch_text = $_POST["fuser"];
		$qq     = "and (m_user like '%$serch_text%' or m_name like '%$serch_text%')";
		$qq_ag  = "and (r_user like '%$serch_text%' or r_name like '%$serch_text%')";
	}                                  
																		
	$sort = "";
	if($list_sort == 1) // เรียงตามวันที่สร้าง มาก-น้อย
	{
			$sort     = " order by `m_regis` desc";
			$sort_ag  = " order by `r_regis` desc";
	}else  if($list_sort == 2) //เรียงตามวันที่สร้าง น้อย - มาก
	{
			$sort     = " order by `m_regis` asc";
			$sort_ag  = " order by `r_regis` asc";
	}else  if($list_sort == 3) // เรียงตามชื่อ มาก - น้อย
	{
			$sort     = " order by `m_name` desc";
			$sort_ag  = " order by `r_name` desc";
	} else  if($list_sort == 4) // เรียงตามชื่อ น้อย - มาก
	{
			$sort     = " order by `m_name` asc";
			$sort_ag  = " order by `r_name` asc";
	} 

	if($_POST["fuactive"] == '')
	{
				$qq1 = "";
				$qq1_ag = "";
	}else if($_POST["fuactive"] == 1) // เปิดใช้งาน
	{
				$qq1     = "and (m_active = 1)";
				$qq1_ag  = "and (r_active = 1)";
	}else if($_POST["fuactive"] == 0) // ระงับ
	{
				$qq1      = "and (m_active = 0)";
				$qq1_ag   = "and (r_active = 0)";
	}  

	$r_agent_id = $_SESSION["r_agent_id"].$_SESSION["r_id"]."*";
	$lv = intval($_SESSION["r_level"])+1;

	$sql="select count(r_id) as num from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_level=$lv $qq_ag $qq1_ag";
    $ag_num = sql_array($sql);
    $ag_num_row =   intval($ag_num['num']);

    $sql="select count(m_id) as num from bom_tb_member   where  m_agent_id = '$r_agent_id' $qq $qq1";   
    $mem_num = sql_array($sql); 
    $mem_num_row =   intval($mem_num['num']);

    $pagi_data["chknum"]["ag_num_row"]  =   intval($ag_num['num']);
    $pagi_data["chknum"]["mem_num_row"]  = intval($mem_num['num']);


	$rowPerPage = intval($_POST["rowPerPage"]);
	$page       = intval($_POST["thisPage"]);
	$start      = ($page-1)*$rowPerPage;

	$num_row = $ag_num_row + $mem_num_row;

	$pagi_data["numrow"] =  $num_row;
	$pagi_data["rowPerPage"] =  $rowPerPage;
	$pagi_data["total_page"] = ceil($num_row/$rowPerPage); 
	$pagi_data["active_page"] = $page;
	$pagi_data["start_page"]  = $start;


      if(($start+$rowPerPage) <= $ag_num_row)   // ถ้าหน้าที่เลือกเป็น agent ทั้งหมด ########################################################
      {
      		$pagi_data["load"]  = "ag"; 
       		$futype = "A";

       		$sql_limit= "select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' $qq_ag $qq1_ag and r_level=$lv $sort_ag LIMIT {$start} , {$rowPerPage}";
       		$re=sql_query($sql_limit);

       		$list="";
       		$no = $rowPerPage*($page-1);
       		$up_lv = $lv+1;

       		while($rs=sql_fetch($re)){
						 $no ++;	
						 $rs["r_name"] = ($rs["r_name"] != "") ? $rs["r_name"] : $lang_memberUserStatus[31];

						 $ex_r_open =  explode(",", $rs["r_open"]);

						 $list.= "<tr>
													<td align='center' style='vertical-align:middle;'>{$no}</td>
													<td>
														<div class='ace-settings-item center'>
															<input type='checkbox' class='ace ace-checkbox-2' onchange=\"ckEdit('{$rs['r_user']}');\" id='{$rs['r_user']}' />
															<label class='lbl' for='ace-settings-navbar'></label>
														</div>
													</td>
													<td align='left' style='vertical-align:middle;'> {$agent_ico} <strong>{$rs['r_user']}</strong> ({$rs['r_name']})</td>";

							foreach ($lang_g["list_open"] as $key => $value) {
									$active = $ex_r_open[$key];
									$x_active = "";
									$y_active = "";
									if($active == 0) { $x_active = "selected=''"; } else { $y_active = "selected=''"; }

							$list.= "<td> ".$ss."
													<select class='form-control col-xs-12 col-sm-4 input-sm select_{$rs['r_user']}' id=\"{$rs['r_user']}_{$key}_active\" name='{$key}_active' disabled='disabled' onchange=\"setSl('{$key}','{$rs['r_user']}','{$rs['r_id']}','ag',this)\">
														<option value='N' {$x_active} > {$lang_memberUserStatus[29]} </option>
														<option value='Y' {$y_active} > {$lang_memberUserStatus[30]} </option>
													</select>
											</td>";	
							}
							$list.= "</tr>";
       		}

      }else{  // กรณีที่ มีทั้ง member และ agent  หรือ มีเฉพาะ member อย่างเดียว

      	$row_mPerPage = ($start+$rowPerPage)-$ag_num_row;  // หาแถวที่เป้นแถวของ member
        $row_agPerPage = $rowPerPage-$row_mPerPage; // หาแถวที่เป้นแถวของ agent

        // ถ้าหน้าที่เลือก มีทั้ง agent และ member รวมกัน  ##############################################################################
        if($row_agPerPage > 0)    
        { 
        	###################  load agent ################
            $futype = "A";
            $sql_limit= "select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' $qq_ag $qq1_ag and r_level=$lv $sort_ag LIMIT {$start} , {$row_agPerPage}";

            $re=sql_query($sql_limit);
    		$pagi_data["load"]  = "mix"; 

            $list="";
            $no = $rowPerPage*($page-1);
            $up_lv = $lv+1;

            while($rs=sql_fetch($re)){
							$no ++;
							$rs["r_name"] = ($rs["r_name"] != "") ? $rs["r_name"] : $lang_memberUserStatus[31];

							$ex_r_open =  explode(",", $rs["r_open"]);


							$list.= "<tr>
													<td align='center' style='vertical-align:middle;'>{$no}</td>
													<td>
														<div class='ace-settings-item center'>
															<input type='checkbox' class='ace ace-checkbox-2' onchange=\"ckEdit('{$rs['r_user']}');\" id='{$rs['r_user']}' />
															<label class='lbl' for='ace-settings-navbar'></label>
														</div>
													</td>
													<td align='left' style='vertical-align:middle;'> {$agent_ico} <strong>{$rs['r_user']}</strong> ({$rs['r_name']})</td>";

							foreach ($lang_g["list_open"] as $key => $value) {
								  $active = $ex_r_open[$key];
									$x_active = "";
									$y_active = "";
									if($active == 0) { $x_active = "selected=''"; } else { $y_active = "selected=''"; }

							$list.= "<td>
													<select class='form-control col-xs-12 col-sm-4 input-sm select_{$rs['r_user']}' id=\"{$rs['r_user']}_{$key}_active\" name='{$key}_active' disabled='disabled' onchange=\"setSl('{$key}','{$rs['r_user']}','{$rs['r_id']}','ag',this)\">
														<option value='N' {$x_active} > {$lang_memberUserStatus[29]} </option>
														<option value='Y' {$y_active} > {$lang_memberUserStatus[30]} </option>
													</select>
											</td>";	
							}
							$list.= "</tr>";
            }

            ###################  load member ################

            $start_member = 0; // กำหนดแถวแรกของ member ให้เป็นแถวที่ 0
            $futype = "M";
            $pagi_data["load"]  = "mix"; 
            $sql_limit= "select * from bom_tb_member   where  m_agent_id = '$r_agent_id' $qq $qq1 $sort LIMIT {$start_member} , {$row_mPerPage}";+
            $re=sql_query($sql_limit);

            while($rs=sql_fetch($re)){
							$no ++;
							$rs["m_name"] = ($rs["m_name"] != "") ? $rs["m_name"] : $lang_memberUserStatus[31];

							$ex_m_open =  explode(",", $rs["m_open"]);

							$list.= "<tr>
													<td align='center' style='vertical-align:middle;'>{$no}</td>
													<td>
														<div class='ace-settings-item center'>
															<input type='checkbox' class='ace ace-checkbox-2' onchange=\"ckEdit('{$rs['m_user']}');\" id='{$rs['m_user']}'>
															<label class='lbl' for='ace-settings-navbar'></label>
														</div>
													</td>
													<td align='left' style='vertical-align:middle;'>{$member_ico} <strong>{$rs['m_user']}</strong> ({$rs['m_name']})</td>";

							foreach ($lang_g["list_open"] as $key => $value) {

								  $active = $ex_m_open[$key];
									$x_active = "";
									$y_active = "";
									if($active == 0) { $x_active = "selected=''"; } else { $y_active = "selected=''"; }


							$list.= "<td>
													<select class='form-control col-xs-12 col-sm-4 input-sm select_{$rs['m_user']}' id='{$rs['m_user']}_{$key}_active' name='{$key}_active' onchange=\"setSl('{$key}','{$rs['m_user']}','{$rs['m_id']}','m',this)\" disabled='disabled'>
														<option value='N' {$x_active} > {$lang_memberUserStatus[29]} </option>
														<option value='Y' {$y_active} > {$lang_memberUserStatus[30]} </option>
													</select>
											</td>";	
							}
							$list.= "</tr>";
            }


        }else{ // ถ้าหน้าที่เลือกมีเฉพาะ member 
        	$row_mPerPage = ($start+$rowPerPage)-$ag_num_row;  // หาแถวที่เป้นแถวของ member
            $start = $row_mPerPage- $rowPerPage;

            $futype = "M";
            $sql_limit= "select * from bom_tb_member   where  m_agent_id = '$r_agent_id' $qq $qq1 $sort LIMIT {$start} , {$rowPerPage}";
            $re=sql_query($sql_limit);
            // $list="";
             $pagi_data["load"]  = 'Member'; 
            $no = $rowPerPage*($page-1);
            while($rs=sql_fetch($re)){
							$no ++;
							$rs["m_name"] = ($rs["m_name"] != "") ? $rs["m_name"] : $lang_memberUserStatus[31];
							$ex_m_open =  explode(",", $rs["m_open"]);

							$list.= "<tr>
													<td align='center' style='vertical-align:middle;'>{$no}</td>
													<td>
														<div class='ace-settings-item center'>
															<input type='checkbox' class='ace ace-checkbox-2' onchange=\"ckEdit('{$rs['m_user']}');\" id='{$rs['m_user']}'>
															<label class='lbl' for='ace-settings-navbar'></label>
														</div>
													</td>
													<td align='left' style='vertical-align:middle;'>{$member_ico} <strong>{$rs['m_user']}</strong> ({$rs['m_name']})</td>";

							foreach ($lang_g["list_open"] as $key => $value) {

							$active = $ex_m_open[$key];
							$x_active = "";
							$y_active = "";
							if($active == 0) { $x_active = "selected=''"; } else { $y_active = "selected=''"; }

							$list.= "<td>
													<select class='form-control col-xs-12 col-sm-4 input-sm select_{$rs['m_user']}' id='{$rs['m_user']}_{$key}_active' name='{$key}_active' onchange=\"setSl('{$key}','{$rs['m_user']}','{$rs['m_id']}','m',this)\" disabled='disabled'>
														<option value='N' {$x_active} > {$lang_memberUserStatus[29]} </option>
														<option value='Y' {$y_active} > {$lang_memberUserStatus[30]} </option>
													</select>
											</td>";	
							}
							$list.= "</tr>";
          	}
        }

      }

    if($list == "")
		{
			$list = "
				<tr>
					<td align='center' class='text-danger' colspan='100%'> {$lang_message[1]} </td>
				</tr>
			";
		}

      $data = array(
			"head" 				=>	$head,
			"status"			=> 	true, 
			"list" 				=> 	$list,
			"pagi_data" 	=> 	$pagi_data
		);


	echo json_encode($data);
?>