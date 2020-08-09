<?php 
	ob_start(); if (!isset($_SESSION)) { session_start(); }

	require('../inc/conn.php');
	require('../inc/function.php');

	// $_POST[fuactive]  คือ ค้นหาตามสถานะ (ปกติ ล็อค ปิดเบ็ต)
	// $_POST[fuser]     คือ  ค้นหาข้อมูลตามผู้ใช้กรอก
	// $_POST[futype]    คือ ประเภท (สมาชิก หรือ เอเย่น)
	// $_POST[list_sort] คือ ประเภทการเรียงข้อมูล

	$head = "
		<tr>
			<th rowspan='3' class='center'>ลำดับ </th>
			<th rowspan='3' class='center'>แก้ไข </th>
			<th rowspan='3'>ชื่อผู้ใช้</th>
			<th colspan='13'><center>เปอร์เซ็นต์เก็บ</center></th>
		</tr>
		<tr>      
			<th>
				<div class='checkbox'>
					<label> 
						<input class='ace ace-checkbox-2' type='checkbox' onchange=\"ckGames('step_setup');\" id='cka_step_setup'>  
						<span class='lbl'> สเต็ป </span>
					</label> 
				</div>
			</th> 
			<th>
				<div class='checkbox'>
					<label>  
						<input class='ace ace-checkbox-2' type='checkbox' onchange=\"ckGames('today_setup');\" id='cka_today_setup'> 
						<span class='lbl'> บอลวันนี้ </span>
					</label> 
				</div>
			</th> 
			<th>
				<div class='checkbox'>
					<label>
						<input class='ace ace-checkbox-2' type='checkbox' onchange=\"ckGames('live_setup');\" id='cka_live_setup'> 
						<span class='lbl'> บอลสด </span>
					</label> 
				</div>
			</th>
			<th>
				<div class='checkbox'>
					<label> 
						<input class='ace ace-checkbox-2' type='checkbox' onchange=\"ckGames('sporttoday_setup');\" id='cka_sporttoday_setup'> 
						<span class='lbl'> กีฬาวันนี้ </span>
					</label> 
				</div>
			</th>
			<th>
				<div class='checkbox'>
					<label>
						<input class='ace ace-checkbox-2' type='checkbox' onchange=\"ckGames('sportlive_setup');\" id='cka_sportlive_setup'>
						<span class='lbl'> กีฬาสด </span>
					</label> 
				</div>
			</th>
			<th>
				<div class='checkbox'>
					<label>
						<input class='ace ace-checkbox-2' type='checkbox' onchange=\"ckGames('game_setup');\" id='cka_game_setup'> 
						<span class='lbl'> เกมส์ </span>
					</label> 
				</div>
			</th> 
			<th>
				<div class='checkbox'>
					<label>
						<input class='ace ace-checkbox-2' type='checkbox' onchange=\"ckGames('casino_setup');\" id='cka_casino_setup'>
						<span class='lbl'> SAGaming </span>
					</label> 
				</div>
			</th> 
			<th>
				<div class='checkbox'>
					<label> 
						<input class='ace ace-checkbox-2' type='checkbox' onchange=\"ckGames('party_setup');\" id='cka_party_setup'>   
						<span class='lbl'> ปาร์ตี้&amp;โจ๊กเกอร์&amp;สล๊อตซิตี้ </span>
					</label> 
				</div>
			</th>
			<th>
				<div class='checkbox'>
					<label> 
						<input class='ace ace-checkbox-2' type='checkbox' onchange=\"ckGames('vivo_setup');\" id='cka_vivo_setup'> 
						<span class='lbl'> วีโว่ </span>
					</label> 
				</div>
			</th>
			<th>
				<div class='checkbox'>
					<label>
						<input class='ace ace-checkbox-2' type='checkbox' onchange=\"ckGames('allbet_setup');\" id='cka_allbet_setup'>
						<span class='lbl'> ไก่ชน </span>
					</label> 
				</div>
			</th>
			<th>
				<div class='checkbox'>
					<label>
						<input class='ace ace-checkbox-2' type='checkbox' onchange=\"ckGames('tgp_setup');\" id='cka_tgp_setup'> 
						<span class='lbl'> TGP </span>
					</label> 
				</div>
			</th>
			<th>
				<div class='checkbox'>
					<label>
						<input class='ace ace-checkbox-2' type='checkbox' onchange=\"ckGames('fg_setup');\" id='cka_fg_setup'>
						<span class='lbl'> FG </span>
					</label> 
				</div>
			</th>
			<th>
				<div class='checkbox'>
					<label>
						<input class='ace ace-checkbox-2' type='checkbox' onchange=\"ckGames('rcb_setup');\" id='cka_rcb_setup'> 
						<span class='lbl'> ม้า </span>
					</label> 
				</div>
			</th>
		</tr>
		<tr>
			<th>
				<table width='100%'>
					<thead>
						<tr>
							<th></th>
							<td>
								<button type='button' class='btn btn-light btn-success btn-block btn-xs ck_step_setup' onclick=\"setAllSl('step_setup','min');\" disabled='disabled'>ไม่รับ</button>
							</td>
							<td>
								<button type='button' class='btn btn-light btn-success btn-block btn-xs ck_step_setup' onclick=\"setAllSl('step_setup','max');\" disabled='disabled'>ปกติ</button>
							</td>
						</tr>
					</thead>
				</table>
			</th>
			<th>
				<table width='100%'>
					<thead>
						<tr>
							<th></th>
							<td>
								<button type='button' class='btn btn-light btn-success btn-block btn-xs ck_today_setup' onclick=\"setAllSl('today_setup','min');\" disabled='disabled'>ไม่รับ</button>
							</td>
							<td>
								<button type='button' class='btn btn-light btn-success btn-block btn-xs ck_today_setup' onclick=\"setAllSl('today_setup','max');\" disabled='disabled'>ปกติ</button>
							</td>
						</tr>
					</thead>
				</table>
			</th>
			<th>
				<table width='100%'>
					<thead>
						<tr>
							<th></th>
							<td>
								<button type='button' class='btn btn-light btn-success btn-block btn-xs ck_live_setup' onclick=\"setAllSl('live_setup','min');\" disabled='disabled'>ไม่รับ</button>
							</td>
							<td>
								<button type='button' class='btn btn-light btn-success btn-block btn-xs ck_live_setup' onclick=\"setAllSl('live_setup','max');\" disabled='disabled'>ปกติ</button>
							</td>
						</tr>
					</thead>
				</table>
			</th>
			<th>
				<table width='100%'>
					<thead>
						<tr>
							<th></th>
							<td>
								<button type='button' class='btn btn-light btn-success btn-block btn-xs ck_sporttoday_setup' onclick=\"setAllSl('sporttoday_setup','min');\" disabled='disabled'>ไม่รับ</button>
							</td>
							<td>
								<button type='button' class='btn btn-light btn-success btn-block btn-xs ck_sporttoday_setup' onclick=\"setAllSl('sporttoday_setup','max');\" disabled='disabled'>ปกติ</button>
							</td>
						</tr>
					</thead>
				</table>
			</th>
			<th>
				<table width='100%'>
					<thead>
						<tr>
							<th></th>
							<td>
								<button type='button' class='btn btn-light btn-success btn-block btn-xs ck_sportlive_setup' onclick=\"setAllSl('sportlive_setup','min');\" disabled='disabled'>ไม่รับ</button>
							</td>
							<td>
								<button type='button' class='btn btn-light btn-success btn-block btn-xs ck_sportlive_setup' onclick=\"setAllSl('sportlive_setup','max');\" disabled='disabled'>ปกติ</button>
							</td>
						</tr>
					</thead>
				</table>
			</th>
			<th>
				<table width='100%'>
					<thead>
						<tr>
							<th></th>
							<td>
								<button type='button' class='btn btn-light btn-success btn-block btn-xs ck_game_setup' onclick=\"setAllSl('game_setup','min');\" disabled='disabled'>ไม่รับ</button>
							</td>
							<td>
								<button type='button' class='btn btn-light btn-success btn-block btn-xs ck_game_setup' onclick=\"setAllSl('game_setup','max');\" disabled='disabled'>ปกติ</button>
							</td>
						</tr>
					</thead>
				</table>
			</th>
			<th>
				<table width='100%'>
					<thead>
						<tr>
							<th></th>
							<td>
								<button type='button' class='btn btn-light btn-success btn-block btn-xs ck_casino_setup' onclick=\"setAllSl('casino_setup','min');\" disabled='disabled'>ไม่รับ</button>
							</td>
							<td>
								<button type='button' class='btn btn-light btn-success btn-block btn-xs ck_casino_setup' onclick=\"setAllSl('casino_setup','max');\" disabled='disabled'>ปกติ</button>
							</td>
						</tr>
					</thead>
				</table>
			</th>
			<th>
				<table width='100%'>
					<thead>
						<tr>
							<th></th>
							<td>
								<button type='button' class='btn btn-light btn-success btn-block btn-xs ck_party_setup' onclick=\"setAllSl('party_setup','min');\" disabled='disabled'>ไม่รับ</button>
							</td>
							<td>
								<button type='button' class='btn btn-light btn-success btn-block btn-xs ck_party_setup' onclick=\"setAllSl('party_setup','max');\" disabled='disabled'>ปกติ</button>
							</td>
						</tr>
					</thead>
				</table>
			</th>
			<th>
				<table width='100%'>
					<thead>
						<tr>
							<th></th>
							<td>
								<button type='button' class='btn btn-light btn-success btn-block btn-xs ck_vivo_setup' onclick=\"setAllSl('vivo_setup','min');\" disabled='disabled'>ไม่รับ</button>
							</td>
							<td>
								<button type='button' class='btn btn-light btn-success btn-block btn-xs ck_vivo_setup' onclick=\"setAllSl('vivo_setup','max');\" disabled='disabled'>ปกติ</button>
							</td>
						</tr>
					</thead>
				</table>
			</th>
			<th>
				<table width='100%'>
					<thead>
						<tr>
							<th></th>
							<td>
								<button type='button' class='btn btn-light btn-success btn-block btn-xs ck_allbet_setup' onclick=\"setAllSl('allbet_setup','min');\" disabled='disabled'>ไม่รับ</button>
							</td>
							<td>
								<button type='button' class='btn btn-light btn-success btn-block btn-xs ck_allbet_setup' onclick=\"setAllSl('allbet_setup','max');\" disabled='disabled'>ปกติ</button>
							</td>
						</tr>
					</thead>
				</table>
			</th>
			<th>
				<table width='100%'>
					<thead>
						<tr>
							<th></th>
							<td>
								<button type='button' class='btn btn-light btn-success btn-block btn-xs ck_tgp_setup' onclick=\"setAllSl('tgp_setup','min');\" disabled='disabled'>ไม่รับ</button>
							</td>
							<td>
								<button type='button' class='btn btn-light btn-success btn-block btn-xs ck_tgp_setup' onclick=\"setAllSl('tgp_setup','max');\" disabled='disabled'>ปกติ</button>
							</td>
						</tr>
					</thead>
				</table>
			</th>
			<th>
				<table width='100%'>
					<thead>
						<tr>
							<th></th>
							<td>
								<button type='button' class='btn btn-light btn-success btn-block btn-xs ck_fg_setup' onclick=\"setAllSl('fg_setup','min');\" disabled='disabled'>ไม่รับ</button>
							</td>
							<td>
								<button type='button' class='btn btn-light btn-success btn-block btn-xs ck_fg_setup' onclick=\"setAllSl('fg_setup','max');\" disabled='disabled'>ปกติ</button>
							</td>
						</tr>
					</thead>
				</table>
			</th>
			<th>
				<table width='100%'>
					<thead>
						<tr>
							<th></th>
							<td>
								<button type='button' class='btn btn-light btn-success btn-block btn-xs ck_rcb_setup' onclick=\"setAllSl('rcb_setup','min');\" disabled='disabled'>ไม่รับ</button>
							</td>
							<td>
								<button type='button' class='btn btn-light btn-success btn-block btn-xs ck_rcb_setup' onclick=\"setAllSl('rcb_setup','max');\" disabled='disabled'>ปกติ</button>
							</td>
						</tr>
					</thead>
				</table>
			</th>
		</tr>
	";

	if($_POST["futype"] == "M")
	{
		$optionPage["listCount"] = 4;
		$optionPage["page"] = "1";
		$list_sort = $_POST["list_sort"];
		$query_fuser = "";
		
    if($_POST["fuser"] != "")
    {
      $search_fuser = $_POST["fuser"];
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

		if($_POST["fuactive"] == "")
		{
			$query_fuactive = "";
		}
		else if($_POST["fuactive"] == 1)
		{
			$query_fuactive = " and (m_active = 1)";
		}
		else if($_POST["fuactive"] == 0)
		{
			$query_fuactive = " and (m_active = 0)";
		}

		$r_agent_id = $_SESSION["r_agent_id"].$_SESSION["r_id"]."*";

		$query = "select m_id from bom_tb_member where m_agent_id = '$r_agent_id' $query_fuser $query_fuactive";
		$num_row = sql_num($query);

		$rowPerPage = $_POST["rowPerPage"];
		$page       = $_POST["thisPage"];
		$start      = ($page-1)*$rowPerPage;
		$pagi_data["numrow"] =  $num_row;
		$pagi_data["rowPerPage"] =  $rowPerPage;
		$pagi_data["total_page"] = ceil($num_row/$rowPerPage);
		$pagi_data["active_page"] = intval($page);
		$pagi_data["start_page"]  = $start;

		$query_limit = "select * from bom_tb_member where m_agent_id = '$r_agent_id' $query_fuser $query_fuactive $sort LIMIT {$start} , {$rowPerPage}";
		$result_limit = sql_query($query_limit);

		$no = $rowPerPage*($page-1);
		$up_lv = $lv+1;
		while($result = sql_fetch($result_limit))
		{
			if($result["m_active"]  == 1)
			{
				$active1 = "selected";
				$active2 = "";
			}
			else{
				$active1 = "";
				$active2 = "selected";
			}

			$r_agent_id = $_SESSION["r_agent_id"].$_SESSION["r_id"]."*";
			$query_sum = "select sum(r_count) as xtotal from bom_tb_agent where m_agent_id like '%$r_agent_id%' and r_level=$up_lv  ";
			$result_sum = sql_array($query_sum);
			$x_count = $result["r_count"]-$result_sum["xtotal"];
			$no++;

			$list.= "
				<tr>
					<td align='center' style='vertical-align:middle;'>{$no}</td>
					<td>
						<div class='ace-settings-item center'>
							<input type='checkbox' class='ace ace-checkbox-2' onchange=\"ckEdit('{$result[m_user]}');\" id='{$result[m_user]}'>
							<label class='lbl' for='ace-settings-navbar'></label>
						</div>
					</td>
					<td class='text-left'><strong>{$result[m_user]}</strong>({$result[m_name]})</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[m_user]}' id='{$result[m_user]}_step_setup' name='step_setup' disabled='disabled' onchange=\"setSl('step_setup',{$result[m_user]});\" onclick=\"genSL(80.00,0.00,80.00,this);\">
							<option value='80' selected='selected'>80</option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[m_user]}' id='{$result[m_user]}_today_setup' name='today_setup' disabled='disabled' onchange=\"setSl('today_setup',{$result[m_user]});\" onclick=\"genSL(87.00,0.00,87.00,this);\">
							<option value='87' selected='selected'>87</option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[m_user]}' id='{$result[m_user]}_live_setup' name='live_setup' disabled='disabled' onchange=\"setSl('live_setup',{$result[m_user]});\" onclick=\"genSL(87.00,0.00,87.00,this);\">
							<option value='87' selected='selected'>87</option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[m_user]}' id='{$result[m_user]}_sporttoday_setup' name='sporttoday_setup' disabled='disabled' onchange=\"setSl('sporttoday_setup',{$result[m_user]});\" onclick=\"genSL(70.00,0.00,70.00,this);\">
							<option value='70' selected='selected'>70</option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[m_user]}' id='{$result[m_user]}_sportlive_setup' name='sportlive_setup' disabled='disabled' onchange=\"setSl('sportlive_setup',{$result[m_user]});\" onclick=\"genSL(70.00,0.00,70.00,this);\">
							<option value='70' selected='selected'>70</option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[m_user]}' id='{$result[m_user]}_game_setup' name='game_setup' disabled='disabled' onchange=\"setSl('game_setup',{$result[m_user]});\" onclick=\"genSL(60.00,0.00,60.00,this);\">
							<option value='60' selected='selected'>60</option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[m_user]}' id='{$result[m_user]}_casino_setup' name='casino_setup' disabled='disabled' onchange=\"setSl('casino_setup',{$result[m_user]});\" onclick=\"genSL(60.00,0.00,60.00,this);\">
							<option value='60' selected='selected'>60</option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[m_user]}' id='{$result[m_user]}_party_setup' name='party_setup' disabled='disabled' onchange=\"setSl('party_setup',{$result[m_user]});\" onclick=\"genSL(60.00,0.00,60.00,this);\">
							<option value='60' selected='selected'>60</option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[m_user]}' id='{$result[m_user]}_vivo_setup' name='vivo_setup' disabled='disabled' onchange=\"setSl('vivo_setup',{$result[m_user]});\" onclick=\"genSL(60.00,0.00,60.00,this);\">
							<option value='60' selected='selected'>60</option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[m_user]}' id='{$result[m_user]}_allbet_setup' name='allbet_setup' disabled='disabled' onchange=\"setSl('allbet_setup',{$result[m_user]});\" onclick=\"genSL(0.00,0.00,0.00,this);\">
							<option value='0' selected='selected'>0</option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[m_user]}' id='{$result[m_user]}_tgp_setup' name='tgp_setup' disabled='disabled' onchange=\"setSl('tgp_setup',{$result[m_user]});\" onclick=\"genSL(60.00,0.00,60.00,this);\">
							<option value='60' selected='selected'>60</option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[m_user]}' id='{$result[m_user]}_fg_setup' name='fg_setup' disabled='disabled' onchange=\"setSl('fg_setup',{$result[m_user]});\" onclick=\"genSL(55.00,0.00,55.00,this);\">
							<option value='55' selected='selected'>55</option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[m_user]}' id='{$result[m_user]}_rcb_setup' name='rcb_setup' disabled='disabled' onchange=\"setSl('rcb_setup',{$result[m_user]});\" onclick=\"genSL(0.00,0.00,0.00,this);\">
							<option value='0' selected='selected'>0</option>
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

		/*
		$data = array();
		$data = array(
			"rows" => 4, 
			"show_only" => "N", 
			"status" => true, 
		);

		$data[games_status]  = array(
			"betcasinos"  	=> "N",
			"betcasinos_a"	=> "N",
			"betcasinos_f"	=> "N",
			"betcasinos_p"	=> "N",
			"betcasinos_r"	=> "N",
			"betcasinos_t"	=> "N",
			"betcasinos_v"	=> "N",
			"betgames"		=> "N",
		);

		$data[share_value] = array(
			"allbet_share"=> "0.00",
			"casino_share"=> "60.00",
			"fg_share"=> "55.00",
			"game_share"=> "60.00",
			"live_share"=> "87.00",
			"party_share"=> "60.00",
			"rcb_share"=> "0.00",
			"sportlive_share"=> "70.00",
			"sporttoday_share"=> "70.00",
			"step_share"=> "80.00",
			"tgp_share"=> "60.00",
			"today_share"=> "87.00",
			"vivo_share"=> "60.00",
		);

		$member[name] = ["ตึ๋ง","ดรีม","บอม","บอม"];	
		$member[username] = ["oho04","oho03","oho02","oho01"];
		foreach ($member[name] as $key => $value) {

		$data[result][]  = array(
			"allbet_setup"=> "0.00",
			"allbet_share"=> "0.00",
			"casino_setup"=> "60.00",
			"casino_share"=> "0.00",
			"fg_setup"=> "55.00",
			"fg_share"=> "0.00",
			"game_setup"=> "60.00",
			"game_share"=> "0.00",
			"live_setup"=> "87.00",
			"live_share"=> "0.00",
			"party_setup"=> "60.00",
			"party_share"=> "0.00",
			"rcb_setup"=> "0.00",
			"rcb_share"=> "0.00",
			"sportlive_setup"=> "70.00",
			"sportlive_share"=> "0.00",
			"sporttoday_setup"=> "70.00",
			"sporttoday_share"=> "0.00",
			"step_setup"=> "80.00",
			"step_share"=> "0.00",
			"tgp_setup"=> "60.00",
			"tgp_share"=> "0.00",
			"today_setup"=> "87.00",
			"today_share"=> "0.00",
			"u_active"=> "Y",
			"u_name"=> $value,
			"u_type"=> "M",
			"u_username"=> $member[username][$key],
			"vivo_setup"=> "60.00",
			"vivo_share"=> "0.00",
		);
		*/
	}
	/*
		?>
			{"status":true,"result":[{"u_username":"oho04","u_name":"\u0e15\u0e36\u0e4b\u0e07","u_type":"M","u_active":"Y","step_share":"0.00","step_setup":"80.00","today_share":"0.00","today_setup":"87.00","live_share":"0.00","live_setup":"87.00","sporttoday_setup":"70.00","sportlive_setup":"70.00","sporttoday_share":"0.00","sportlive_share":"0.00","game_setup":"60.00","game_share":"0.00","casino_setup":"60.00","casino_share":"0.00","party_setup":"60.00","party_share":"0.00","vivo_setup":"60.00","vivo_share":"0.00","allbet_setup":"0.00","allbet_share":"0.00","tgp_setup":"60.00","tgp_share":"0.00","fg_setup":"55.00","fg_share":"0.00","rcb_setup":"0.00","rcb_share":"0.00"},{"u_username":"oho03","u_name":"\u0e14\u0e23\u0e35\u0e21","u_type":"M","u_active":"Y","step_share":"0.00","step_setup":"80.00","today_share":"0.00","today_setup":"87.00","live_share":"0.00","live_setup":"87.00","sporttoday_setup":"70.00","sportlive_setup":"70.00","sporttoday_share":"0.00","sportlive_share":"0.00","game_setup":"60.00","game_share":"0.00","casino_setup":"60.00","casino_share":"0.00","party_setup":"60.00","party_share":"0.00","vivo_setup":"60.00","vivo_share":"0.00","allbet_setup":"0.00","allbet_share":"0.00","tgp_setup":"60.00","tgp_share":"0.00","fg_setup":"55.00","fg_share":"0.00","rcb_setup":"0.00","rcb_share":"0.00"},{"u_username":"oho02","u_name":"\u0e1a\u0e2d\u0e21","u_type":"M","u_active":"Y","step_share":"0.00","step_setup":"80.00","today_share":"0.00","today_setup":"87.00","live_share":"0.00","live_setup":"87.00","sporttoday_setup":"70.00","sportlive_setup":"70.00","sporttoday_share":"0.00","sportlive_share":"0.00","game_setup":"60.00","game_share":"0.00","casino_setup":"60.00","casino_share":"0.00","party_setup":"60.00","party_share":"0.00","vivo_setup":"60.00","vivo_share":"0.00","allbet_setup":"0.00","allbet_share":"0.00","tgp_setup":"60.00","tgp_share":"0.00","fg_setup":"55.00","fg_share":"0.00","rcb_setup":"0.00","rcb_share":"0.00"},{"u_username":"oho01","u_name":"\u0e1a\u0e2d\u0e21","u_type":"M","u_active":"Y","step_share":"0.00","step_setup":"80.00","today_share":"0.00","today_setup":"87.00","live_share":"0.00","live_setup":"87.00","sporttoday_setup":"70.00","sportlive_setup":"70.00","sporttoday_share":"0.00","sportlive_share":"0.00","game_setup":"60.00","game_share":"0.00","casino_setup":"60.00","casino_share":"0.00","party_setup":"60.00","party_share":"0.00","vivo_setup":"60.00","vivo_share":"0.00","allbet_setup":"0.00","allbet_share":"0.00","tgp_setup":"60.00","tgp_share":"0.00","fg_setup":"55.00","fg_share":"0.00","rcb_setup":"0.00","rcb_share":"0.00"}],"games_status":{"betgames":"N","betcasinos":"N","betcasinos_p":"N","betcasinos_v":"N","betcasinos_a":"N","betcasinos_t":"N","betcasinos_f":"N","betcasinos_r":"N"},"share_value":{"step_share":"80.00","today_share":"87.00","live_share":"87.00","sporttoday_share":"70.00","sportlive_share":"70.00","game_share":"60.00","casino_share":"60.00","party_share":"60.00","vivo_share":"60.00","allbet_share":"0.00","tgp_share":"60.00","fg_share":"55.00","rcb_share":"0.00"},"rows":"4","show_only":"N"}
		<?
	*/
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

		$query_limit = "select * from bom_tb_agent where r_agent_id like '%$r_agent_id%' $query_fuser $query_fuactive and r_level=$lv $sort LIMIT {$start} , {$rowPerPage}";
		$result_limit = sql_query($query_limit);

		$no = $rowPerPage*($page-1);
		$up_lv = $lv+1;
		while($result = sql_fetch($result_limit))
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

			// $r_agent_id = $_SESSION[r_agent_id].$_SESSION[r_id]."*";
			$query_sum = "select sum(r_count) as xtotal from bom_tb_agent where r_agent_id like '%*$result[r_id]*%' and r_level=$up_lv  ";
			$result_sum = sql_array($query_sum);
			$x_count = $result[r_count]-$result_sum[xtotal];
			$no++;

			$list.= "
				<tr>
					<td align='center' style='vertical-align:middle;'>{$no}</td>
					<td>
						<div class='ace-settings-item center'>
							<input type='checkbox' class='ace ace-checkbox-2' onchange=\"ckEdit('{$result[r_user]}');\" id='{$result[r_user]}'>
							<label class='lbl' for='ace-settings-navbar'></label>
						</div>
					</td>
					<td class='text-left'><strong>{$result[r_user]}</strong>({$result[r_name]})</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[r_user]}' id='{$result[r_user]}_step_setup' name='step_setup' disabled='disabled' onchange=\"setSl('step_setup',{$result[r_user]});\" onclick=\"genSL(80.00,0.00,80.00,this);\">
							<option value='80' selected='selected'>80</option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[r_user]}' id='{$result[r_user]}_today_setup' name='today_setup' disabled='disabled' onchange=\"setSl('today_setup',{$result[r_user]});\" onclick=\"genSL(87.00,0.00,87.00,this);\">
							<option value='87' selected='selected'>87</option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[r_user]}' id='{$result[r_user]}_live_setup' name='live_setup' disabled='disabled' onchange=\"setSl('live_setup',{$result[r_user]});\" onclick=\"genSL(87.00,0.00,87.00,this);\">
							<option value='87' selected='selected'>87</option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[r_user]}' id='{$result[r_user]}_sporttoday_setup' name='sporttoday_setup' disabled='disabled' onchange=\"setSl('sporttoday_setup',{$result[r_user]});\" onclick=\"genSL(70.00,0.00,70.00,this);\">
							<option value='70' selected='selected'>70</option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[r_user]}' id='{$result[r_user]}_sportlive_setup' name='sportlive_setup' disabled='disabled' onchange=\"setSl('sportlive_setup',{$result[r_user]});\" onclick=\"genSL(70.00,0.00,70.00,this);\">
							<option value='70' selected='selected'>70</option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[r_user]}' id='{$result[r_user]}_game_setup' name='game_setup' disabled='disabled' onchange=\"setSl('game_setup',{$result[r_user]});\" onclick=\"genSL(60.00,0.00,60.00,this);\">
							<option value='60' selected='selected'>60</option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[r_user]}' id='{$result[r_user]}_casino_setup' name='casino_setup' disabled='disabled' onchange=\"setSl('casino_setup',{$result[r_user]});\" onclick=\"genSL(60.00,0.00,60.00,this);\">
							<option value='60' selected='selected'>60</option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[r_user]}' id='{$result[r_user]}_party_setup' name='party_setup' disabled='disabled' onchange=\"setSl('party_setup',{$result[r_user]});\" onclick=\"genSL(60.00,0.00,60.00,this);\">
							<option value='60' selected='selected'>60</option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[r_user]}' id='{$result[r_user]}_vivo_setup' name='vivo_setup' disabled='disabled' onchange=\"setSl('vivo_setup',{$result[r_user]});\" onclick=\"genSL(60.00,0.00,60.00,this);\">
							<option value='60' selected='selected'>60</option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[r_user]}' id='{$result[r_user]}_allbet_setup' name='allbet_setup' disabled='disabled' onchange=\"setSl('allbet_setup',{$result[r_user]});\" onclick=\"genSL(0.00,0.00,0.00,this);\">
							<option value='0' selected='selected'>0</option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[r_user]}' id='{$result[r_user]}_tgp_setup' name='tgp_setup' disabled='disabled' onchange=\"setSl('tgp_setup',{$result[r_user]});\" onclick=\"genSL(60.00,0.00,60.00,this);\">
							<option value='60' selected='selected'>60</option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[r_user]}' id='{$result[r_user]}_fg_setup' name='fg_setup' disabled='disabled' onchange=\"setSl('fg_setup',{$result[r_user]});\" onclick=\"genSL(55.00,0.00,55.00,this);\">
							<option value='55' selected='selected'>55</option>
						</select>
					</td>
					<td>
						<select class='form-control col-xs-12 col-sm-4 input-sm sl_{$result[r_user]}' id='{$result[r_user]}_rcb_setup' name='rcb_setup' disabled='disabled' onchange=\"setSl('rcb_setup',{$result[r_user]});\" onclick=\"genSL(0.00,0.00,0.00,this);\">
							<option value='0' selected='selected'>0</option>
						</select>
					</td>
				</tr>
			";

		// $data = array();
		// $data = array(
		// 	"rows" => 4, 
		// 	"show_only" => "N", 
		// 	"status" => true, 
		// );

		// $data[games_status]  = array(
		// 		"betcasinos"  	=> "N",
		// 		"betcasinos_a"	=> "N",
		// 		"betcasinos_f"	=> "N",
		// 		"betcasinos_p"	=> "N",
		// 		"betcasinos_r"	=> "N",
		// 		"betcasinos_t"	=> "N",
		// 		"betcasinos_v"	=> "N",
		// 		"betgames"		=> "N",
		// );

		// $data[share_value] = array(
		// 	"allbet_share"=> "0.00",
		// 	"casino_share"=> "60.00",
		// 	"fg_share"=> "55.00",
		// 	"game_share"=> "60.00",
		// 	"live_share"=> "87.00",
		// 	"party_share"=> "60.00",
		// 	"rcb_share"=> "0.00",
		// 	"sportlive_share"=> "70.00",
		// 	"sporttoday_share"=> "70.00",
		// 	"step_share"=> "80.00",
		// 	"tgp_share"=> "60.00",
		// 	"today_share"=> "87.00",
		// 	"vivo_share"=> "60.00",
		// );

		// $member[name] = ["กะถิน","หน่อง","Man","Joy"];	
		// $member[username] = ["ohoc","ohon","ohom","ohoj"];
		// foreach ($member[name] as $key => $value) {

		// 	$data[result][]  = array(
		// 		"allbet_setup"=> "0.00",
		// 		"allbet_share"=> "0.00",
		// 		"casino_setup"=> "0.00",
		// 		"casino_share"=> "60.00",
		// 		"fg_setup"=> "0.00",
		// 		"fg_share"=> "55.00",
		// 		"game_setup"=> "60.00",
		// 		"game_share"=> "0.00",
		// 		"live_setup"=> "87.00",
		// 		"live_share"=> "0.00",
		// 		"party_setup"=> "0.00",
		// 		"party_share"=> "60.00",
		// 		"rcb_setup"=> "0.00",
		// 		"rcb_share"=> "0.00",
		// 		"sportlive_setup"=> "70.00",
		// 		"sportlive_share"=> "0.00",
		// 		"sporttoday_setup"=> "70.00",
		// 		"sporttoday_share"=> "0.00",
		// 		"step_setup"=> "80.00",
		// 		"step_share"=> "0.00",
		// 		"tgp_setup"=> "0.00",
		// 		"tgp_share"=> "60.00",
		// 		"today_setup"=> "87.00",
		// 		"today_share"=> "0.00",
		// 		"u_active"=> "Y",
		// 		"u_name"=> $value,
		// 		"u_type"=> "A",
		// 		"u_username"=> $member[username][$key],
		// 		"vivo_setup"=> "0.00",
		// 		"vivo_share"=> "60.00",
		// 	);
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
	/*
		?>
			{"status":true,"result":[{"u_username":"ohoc","u_name":"\u0e01\u0e30\u0e16\u0e34\u0e19","u_type":"A","u_active":"Y","step_share":"60.00","step_setup":"20.00","today_share":"50.00","today_setup":"37.00","live_share":"50.00","live_setup":"37.00","sporttoday_setup":"20.00","sportlive_setup":"20.00","sporttoday_share":"50.00","sportlive_share":"50.00","game_setup":"10.00","game_share":"50.00","casino_setup":"10.00","casino_share":"50.00","party_setup":"10.00","party_share":"50.00","vivo_setup":"10.00","vivo_share":"50.00","allbet_setup":"0.00","allbet_share":"0.00","tgp_setup":"10.00","tgp_share":"50.00","fg_setup":"5.00","fg_share":"50.00","rcb_setup":"0.00","rcb_share":"0.00"},{"u_username":"ohon","u_name":"\u0e2b\u0e19\u0e48\u0e2d\u0e07","u_type":"A","u_active":"Y","step_share":"0.00","step_setup":"80.00","today_share":"0.00","today_setup":"87.00","live_share":"0.00","live_setup":"87.00","sporttoday_setup":"70.00","sportlive_setup":"70.00","sporttoday_share":"0.00","sportlive_share":"0.00","game_setup":"60.00","game_share":"0.00","casino_setup":"60.00","casino_share":"0.00","party_setup":"60.00","party_share":"0.00","vivo_setup":"60.00","vivo_share":"0.00","allbet_setup":"0.00","allbet_share":"0.00","tgp_setup":"60.00","tgp_share":"0.00","fg_setup":"55.00","fg_share":"0.00","rcb_setup":"0.00","rcb_share":"0.00"},{"u_username":"ohom","u_name":"Man","u_type":"A","u_active":"Y","step_share":"70.00","step_setup":"10.00","today_share":"70.00","today_setup":"17.00","live_share":"70.00","live_setup":"17.00","sporttoday_setup":"10.00","sportlive_setup":"10.00","sporttoday_share":"60.00","sportlive_share":"60.00","game_setup":"10.00","game_share":"50.00","casino_setup":"10.00","casino_share":"50.00","party_setup":"10.00","party_share":"50.00","vivo_setup":"10.00","vivo_share":"50.00","allbet_setup":"0.00","allbet_share":"0.00","tgp_setup":"10.00","tgp_share":"50.00","fg_setup":"10.00","fg_share":"45.00","rcb_setup":"0.00","rcb_share":"0.00"},{"u_username":"ohoj","u_name":"Joy","u_type":"A","u_active":"Y","step_share":"0.00","step_setup":"80.00","today_share":"0.00","today_setup":"87.00","live_share":"0.00","live_setup":"87.00","sporttoday_setup":"70.00","sportlive_setup":"70.00","sporttoday_share":"0.00","sportlive_share":"0.00","game_setup":"60.00","game_share":"0.00","casino_setup":"0.00","casino_share":"60.00","party_setup":"0.00","party_share":"60.00","vivo_setup":"0.00","vivo_share":"60.00","allbet_setup":"0.00","allbet_share":"0.00","tgp_setup":"0.00","tgp_share":"60.00","fg_setup":"0.00","fg_share":"55.00","rcb_setup":"0.00","rcb_share":"0.00"}],"games_status":{"betgames":"N","betcasinos":"N","betcasinos_p":"N","betcasinos_v":"N","betcasinos_a":"N","betcasinos_t":"N","betcasinos_f":"N","betcasinos_r":"N"},"share_value":{"step_share":"80.00","today_share":"87.00","live_share":"87.00","sporttoday_share":"70.00","sportlive_share":"70.00","game_share":"60.00","casino_share":"60.00","party_share":"60.00","vivo_share":"60.00","allbet_share":"0.00","tgp_share":"60.00","fg_share":"55.00","rcb_share":"0.00"},"rows":"4","show_only":"N"}
		<?
	*/
	}

	echo json_encode($data);

?>