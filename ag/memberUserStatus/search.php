<?php
	ob_start(); if (!isset($_SESSION)) { session_start(); }

	require('../inc/conn.php');
	require('../inc/function.php');

	$head = "
		<tr>
			<th rowspan='3' class='center'>ลำดับ </th>
			<th rowspan='3' class='center'>แก้ไข </th>
			<th rowspan='3'> ชื่อผู้ใช้ </th>
			<th colspan='12'><center>สถานะ</center></th>
		</tr>
		<tr>
			<th>
				<span class='lbl'> สเต็ป </span>
			</th>
			<th>
				<span class='lbl'> บอลวันนี้ </span>
			</th>
			<th>
				<span class='lbl'> บอลสด </span>
			</th>
			<th>
				<span class='lbl'> กีฬาวันนี้ </span>
			</th>
			<th>
				<span class='lbl'> กีฬาสด </span>
			</th>
			<th>
				<span class='lbl'> เกมส์ </span>
			</th>
			<th>
				<span class='lbl'> คาสิโน </span>
			</th>
			<th>
				<span class='lbl'> หวย </span>
			</th>
			<th>
				<span class='lbl'> หวยหุ้น </span>
			</th>
			<th>
				<span class='lbl'> หวยชุด </span>
			</th>
			<th>
				<span class='lbl'> โอนเงิน </span>
			</th> 
		</tr>
	";

	if($_POST[futype] == "M")
	{
		$optionPage[listCount] = 4;
		$optionPage[page] = "1";
		$list_sort = $_POST[list_sort];
		$query_fuser = "";

    if($_POST[fuser] != "")
    {
      $search_fuser = $_POST[fuser];
      $query_fuser = "and (m_user like '%$search_fuser%' or m_name like '%$search_fuser%')";
		}
		
		if($list_sort == 1)
		{
			$sort = " order by `m_regis` desc";
		}
		else if($list_sort == 2)
		{
			$sort = " order by `m_regis` asc";
		}
		else if($list_sort == 3)
		{
			$sort = " order by `m_name` desc";
		}
		else if($list_sort == 4)
		{
			$sort = " order by `m_name` asc";
		}

		if($_POST[fuactive] == "")
		{
			$query_fuactive = "";
		}
		else if($_POST[fuactive] == 1)
		{
			$query_fuactive = " and (m_active = 1)";
		}
		else if($_POST[fuactive] == 0)
		{
			$query_fuactive = " and (m_active = 0)";
		}

		$r_agent_id = $_SESSION[r_agent_id].$_SESSION[r_id]."*";
		
		$query = "select m_id from bom_tb_member where m_agent_id = '$r_agent_id' $query_fuser $query_fuactive";
		$num_row = sql_num($query);

		$rowPerPage = $_POST[rowPerPage];
		$page       = $_POST[thisPage];
		$start      = ($page-1)*$rowPerPage;
		$pagi_data[numrow] =  $num_row;
		$pagi_data[rowPerPage] =  $rowPerPage;
		$pagi_data[total_page] = ceil($num_row/$rowPerPage);
		$pagi_data[active_page] = intval($page);
		$pagi_data[start_page]  = $start;

		$sql_limit = "select * from bom_tb_member where m_agent_id = '$r_agent_id' $query_fuser $query_fuactive $sort LIMIT {$start} , {$rowPerPage}";
		$results = sql_query($sql_limit);

		$no = $rowPerPage*($page-1);
		$up_lv = $lv+1;
		while($result = sql_fetch($results))
		{
			if($result[m_active]  == 1)
			{
				$active1 = "selected";
				$active2 = "";
			}
			else{
				$active1 = "";
				$active2 = "selected";
			}

			$r_agent_id = $_SESSION[r_agent_id].$_SESSION[r_id]."*";
			$sql = "select sum(r_count) as xtotal from bom_tb_agent where m_agent_id like '%$r_agent_id%' and r_level=$up_lv  ";
			$re3 = sql_array($sql);
			$x_count = $result[r_count]-$re3[xtotal];
			$no ++;

			$list.= "
				<tr>
					<td align='center' style='vertical-align:middle;'>{$no}</td>
					<td>
						<div class='ace-settings-item center'>
							<input type='checkbox' class='ace ace-checkbox-2' onchange=\"ckEdit('{$result[m_user]}');\" id='{$result[m_user]}'>
							<label class='lbl' for='ace-settings-navbar'></label>
						</div>
					</td>
					<td align='left' style='vertical-align:middle;'><strong>{$result[m_user]}</strong> ({$result[m_name]})</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[m_user]}' id='{$result[m_user]}_step_active' name='step_active' onchange=\"setSl('step_active','{$result[m_user]}'\" disabled='disabled'>
							<option value='N'> ไม่ </option>
							<option value='Y' selected=''> ใช่ </option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[m_user]}' id='{$result[m_user]}_soccer_today_active' name='soccer_today_active' onchange=\"setSl('soccer_today_active','{$result[m_user]}'\" disabled='disabled'>
							<option value='N'> ไม่ </option>
							<option value='Y' selected=''> ใช่ </option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[m_user]}' id='{$result[m_user]}_soccer_live_active' name='soccer_live_active' onchange=\"setSl('soccer_live_active','{$result[m_user]}'\" disabled='disabled'>
							<option value='N'> ไม่ </option>
							<option value='Y' selected=''> ใช่ </option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[m_user]}' id='{$result[m_user]}_sport_today_active' name='sport_today_active' onchange=\"setSl('sport_today_active','{$result[m_user]}'\" disabled='disabled'>
							<option value='N'> ไม่ </option>
							<option value='Y' selected=''> ใช่ </option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[m_user]}' id='{$result[m_user]}_sport_live_active' name='sport_live_active' onchange=\"setSl('sport_live_active','{$result[m_user]}'\" disabled='disabled'>
							<option value='N'> ไม่ </option>
							<option value='Y' selected=''> ใช่ </option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[m_user]}' id='{$result[m_user]}_game_active' name='{$result[m_user]}_game_active' onchange=\"setSl('game_active','{$result[m_user]}'\" disabled='disabled'>
							<option value='N'> ไม่ </option>
							<option value='Y' selected=''> ใช่ </option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[m_user]}' id='{$result[m_user]}_casino_active' name='casino_active' onchange=\"setSl('casino_active','{$result[m_user]}'\" disabled='disabled'>
							<option value='N'> ไม่ </option>
							<option value='Y' selected=''> ใช่ </option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[m_user]}' id='{$result[m_user]}_lotto_active' name='lotto_active' onchange=\"setSl('lotto_active','{$result[m_user]}'\" disabled='disabled'>
							<option value='N'> ไม่ </option>
							<option value='Y' selected=''> ใช่ </option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[m_user]}' id='{$result[m_user]}_lotto_share_active' name='lotto_share_active' onchange=\"setSl('lotto_share_active','{$result[m_user]}'\" disabled='disabled'>
							<option value='N'> ไม่ </option>
							<option value='Y' selected=''> ใช่ </option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[m_user]}' id='{$result[m_user]}_lotto_lao_active' name='lotto_lao_active' onchange=\"setSl('lotto_lao_active','{$result[m_user]}'\" disabled='disabled'>
							<option value='N'> ไม่ </option>
							<option value='Y' selected=''> ใช่ </option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[m_user]}' id='{$result[m_user]}_transfer_money' name='transfer_money' onchange=\"setSl('transfer_money','{$result[m_user]}'\" disabled='disabled'>
							<option value='N'> ไม่ </option>
							<option value='Y' selected=''> ใช่ </option>
						</select>
					</td>
				</tr>
			";
		}

		if($list == "")
		{
			$list = "
				<tr>
					<td align='center' class='text-danger' colspan='100%'> ไม่พบข้อมูล </td>
				</tr>
			";
		}
		
		$data = array(
			"head" 				=>	$head,
			"optionPage"	=> 	$optionPage, 
			"status"			=> 	true, 
			"list" 				=> 	$list,
			"pagi_data" 	=> 	$pagi_data
		);

		// $data = array(
		// 	'rows' => "4",
		// 	'status' => true,
		// );
		// $member[name] = ["ตึ๋ง","ดรีม","บอม","บอม"];	
		// $member[username] = ["oho04","oho03","oho02","oho01"];
		// foreach ($member[name] as $key => $value) {

		// 	$data[result][]  = array(
		// 		"casino_active"=> "Y",
		// 		"game_active"=> "Y",
		// 		"lottery_active"=> "Y",
		// 		"lotto_active"=> "Y",
		// 		"lotto_lao_active"=> "Y",
		// 		"lotto_share_active"=> "Y",
		// 		"soccer_live_active"=> "Y",
		// 		"soccer_today_active"=> "Y",
		// 		"sport_live_active"=> "Y",
		// 		"sport_today_active"=> "Y",
		// 		"step_active"=> "Y",
		// 		"transfer_money"=> "Y",
		// 		"u_active"=> "Y",
		// 		"u_name"=> $value,
		// 		"u_type"=> "M",
		// 		"u_username"=> $member[username][$key],
		// 	);
		// }
		
		/*?>
				{"status":true,"result":[{"u_username":"oho04","u_name":"\u0e15\u0e36\u0e4b\u0e07","u_type":"M","u_active":"Y","step_active":"Y","soccer_today_active":"Y","soccer_live_active":"Y","sport_today_active":"Y","sport_live_active":"Y","game_active":"Y","casino_active":"Y","lottery_active":"Y","lotto_active":"Y","lotto_share_active":"Y","lotto_lao_active":"Y","transfer_money":"Y"},{"u_username":"oho03","u_name":"\u0e14\u0e23\u0e35\u0e21","u_type":"M","u_active":"Y","step_active":"Y","soccer_today_active":"Y","soccer_live_active":"Y","sport_today_active":"Y","sport_live_active":"Y","game_active":"Y","casino_active":"Y","lottery_active":"Y","lotto_active":"Y","lotto_share_active":"Y","lotto_lao_active":"Y","transfer_money":"Y"},{"u_username":"oho02","u_name":"\u0e1a\u0e2d\u0e21","u_type":"M","u_active":"Y","step_active":"Y","soccer_today_active":"Y","soccer_live_active":"Y","sport_today_active":"Y","sport_live_active":"Y","game_active":"Y","casino_active":"Y","lottery_active":"Y","lotto_active":"Y","lotto_share_active":"Y","lotto_lao_active":"Y","transfer_money":"Y"},{"u_username":"oho01","u_name":"\u0e1a\u0e2d\u0e21","u_type":"M","u_active":"Y","step_active":"Y","soccer_today_active":"Y","soccer_live_active":"Y","sport_today_active":"Y","sport_live_active":"Y","game_active":"Y","casino_active":"Y","lottery_active":"Y","lotto_active":"Y","lotto_share_active":"Y","lotto_lao_active":"Y","transfer_money":"Y"}],"rows":"4"}
		<?*/
	}
	else if($_POST[futype] == "A")
	{
		$optionPage[listCount] = 4;
		$optionPage[page] = "1";
		$lv = intval($_SESSION[r_level])+1;
		$list_sort = $_POST[list_sort];
		$query_fuser = "";
    if($_POST[fuser] != "")
    {
      $search_fuser = $_POST[fuser];
      $query_fuser = "and (r_user like '%$search_fuser%' or r_user like '%$search_fuser%')";
		}
		
		if($list_sort == 1)
		{
			$sort = " order by `r_regis` desc";
		}
		else if($list_sort == 2)
		{
			$sort = " order by `r_regis` asc";
		}
		else if($list_sort == 3)
		{
			$sort = " order by `r_name` desc";
		}
		else if($list_sort == 4)
		{
			$sort = " order by `r_name` asc";
		}

		if($_POST[fuactive] == "")
		{
			$query_fuactive = "";
		}
		else if($_POST[fuactive] == 1)
		{
			$query_fuactive = " and (r_active = 1)";
		}
		else if($_POST[fuactive] == 0)
		{
			$query_fuactive = " and (r_active = 0)";
		}

		$r_agent_id = $_SESSION[r_agent_id].$_SESSION[r_id]."*";
		$query = "select r_id from bom_tb_agent where r_agent_id like '%$r_agent_id%' and r_level=$lv $query_fuser $query_fuactive";
		$num_row = sql_num($query);

		$rowPerPage = $_POST[rowPerPage];
		$page       = $_POST[thisPage];
		$start      = ($page-1)*$rowPerPage;
		$pagi_data[numrow] =  $num_row;
		$pagi_data[rowPerPage] =  $rowPerPage;
		$pagi_data[total_page] = ceil($num_row/$rowPerPage);
		$pagi_data[active_page] = intval($page);
		$pagi_data[start_page]  = $start;

		$sql_limit = "select * from bom_tb_agent where r_agent_id like '%$r_agent_id%' $query_fuser $query_fuactive and r_level=$lv $sort LIMIT {$start} , {$rowPerPage}";
		$results = sql_query($sql_limit);

		$no = $rowPerPage*($page-1);
		$up_lv = $lv+1;
		while($result = sql_fetch($results))
		{
			if($result[r_active]  == 1)
			{
				$active1 = "selected";
				$active2 = "";
			}
			else{
				$active1 = "";
				$active2 = "selected";
			}

			$sql = "select sum(r_count) as xtotal from bom_tb_agent where r_agent_id like '%*$result[r_id]*%' and r_level=$up_lv  ";
			$re3 = sql_array($sql);
			$x_count = $result[r_count]-$re3[xtotal];
			$no ++;

			$list.= "
				<tr>
					<td align='center' style='vertical-align:middle;'>{$no}</td>
					<td>
						<div class='ace-settings-item'>
							<input type='checkbox' class='ace ace-checkbox-2' onchange=\"ckEdit(&quot;'+ val.u_username +' & quot;);\" id=''+ val.u_username +''/>
							<label class='lbl' for='ace-settings-navbar'></label>
						</div>
					</td>
					<td align='left' style='vertical-align:middle;'><strong>{$result[r_user]}</strong> ({$result[r_name]})</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[r_user]}' id=\"{$result[r_user]}_step_active\" name=\"step_active\" disabled=\"disabled\" onchange=\"setSl(\'step_active\',&quot;{$result[m_user]}&quot;);\">
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_' name='step_active' disabled='disabled'</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_' name='soccer_today_active' disabled='disabled'</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_' name='soccer_live_active' disabled='disabled'</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_' name='sport_today_active' disabled='disabled'</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_' name='sport_live_active' disabled='disabled'</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_' name='game_active' disabled='disabled'</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_' name='casino_active' disabled='disabled'</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_' name='lottery_active' disabled='disabled'</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_' name='lotto_active' disabled='disabled'</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_' name='step_active' disabled='disabled'</select>
					</td>
				</tr>
			";
		}

		if($list == "")
		{
			$list = "
				<tr>
					<td align='center' class='text-danger' colspan='100%'> ไม่พบข้อมูล </td>
				</tr>
			";
		}
		
		$data = array(
			"head" 				=>	$head,
			"optionPage"	=> 	$optionPage, 
			"status"			=> 	true, 
			"list" 				=> 	$list,
			"pagi_data" 	=> 	$pagi_data
		);

		// $data = array(
		// 	'rows' => "4",
		// 	'status' => true,
		// );

		// $member[name] = ["กะถิน","หน่อง","Man","Joy"];	
		// $member[username] = ["ohoc","ohon","ohom","ohoj"];
		// foreach ($member[name] as $key => $value)
		// {
		// 	$data[result][]  = array(
		// 		"casino_active"=> "Y",
		// 		"game_active"=> "Y",
		// 		"lottery_active"=> "N",
		// 		"lotto_active"=> "N",
		// 		"lotto_lao_active"=> "Y",
		// 		"lotto_share_active"=> "N",
		// 		"soccer_live_active"=> "Y",
		// 		"soccer_today_active"=> "Y",
		// 		"sport_live_active"=> "Y",
		// 		"sport_today_active"=> "Y",
		// 		"step_active"=> "Y",
		// 		"transfer_money"=> "Y",
		// 		"u_active"=> "Y",
		// 		"u_name"=> $value,
		// 		"u_type"=> "A",
		// 		"u_username"=> $member[username][$key],
		// 	);
		// }

		/*
			?>
				{"status":true,"result":[{"u_username":"ohoc","u_name":"\u0e01\u0e30\u0e16\u0e34\u0e19","u_type":"A","u_active":"Y","step_active":"Y","soccer_today_active":"Y","soccer_live_active":"Y","sport_today_active":"Y","sport_live_active":"Y","game_active":"Y","casino_active":"Y","lottery_active":"N","lotto_active":"N","lotto_share_active":"N","lotto_lao_active":"Y","transfer_money":"Y"},{"u_username":"ohon","u_name":"\u0e2b\u0e19\u0e48\u0e2d\u0e07","u_type":"A","u_active":"Y","step_active":"Y","soccer_today_active":"Y","soccer_live_active":"Y","sport_today_active":"Y","sport_live_active":"Y","game_active":"Y","casino_active":"N","lottery_active":"N","lotto_active":"N","lotto_share_active":"N","lotto_lao_active":"Y","transfer_money":"Y"},{"u_username":"ohom","u_name":"Man","u_type":"A","u_active":"Y","step_active":"Y","soccer_today_active":"Y","soccer_live_active":"Y","sport_today_active":"Y","sport_live_active":"Y","game_active":"Y","casino_active":"Y","lottery_active":"N","lotto_active":"N","lotto_share_active":"N","lotto_lao_active":"Y","transfer_money":"Y"},{"u_username":"ohoj","u_name":"Joy","u_type":"A","u_active":"Y","step_active":"Y","soccer_today_active":"Y","soccer_live_active":"Y","sport_today_active":"Y","sport_live_active":"Y","game_active":"Y","casino_active":"N","lottery_active":"N","lotto_active":"N","lotto_share_active":"N","lotto_lao_active":"Y","transfer_money":"Y"}],"rows":"4"}
			<?
		*/
	}
	echo json_encode($data);
?>