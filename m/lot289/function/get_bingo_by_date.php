<?
	session_start();
	header("Content-type: text/html");
	
	require('../../../inc/conn.php');
	require('../../../inc/function.php');

	require 'compress_page.php';
	require 'checkLang.php';

	/*$url = $_SESSION["url"]."getBingoDay.php?d=".$_POST["param"]."&lang=".$_COOKIE["lang"];
	$data = file_get_contents($url);
	$data = json_decode($data, true);*/




	$lang_post           = trim($_COOKIE["lang"]);
	if($lang_post==""){
		$lang_post = "th";
	}
	require("../../../lang/".$lang_post.".php");



	$date = $_POST["param"];

	$arr_ok = array();
	$sql_arr=sql_query("select * from bom_tb_lotto_ok  where lot_zone<>1 and ok_date='$date'");
	while($rs_arr=sql_fetch($sql_arr)){
		$arr_ok[$rs_arr[lot_zone]][$rs_arr[lot_rob]] = $rs_arr;
	}

	$arr = array();


	$rs=sql_array("select * from bom_tb_lotto_ok where ok_date = '$date' and lot_zone = 1 order by ok_id desc limit 1");
	if($rs["ok_id"]==""){
		$rs=sql_array("select * from bom_tb_lotto_ok where lot_zone = 1 order by ok_id desc limit 1");
	}


	$i=0;
	$y=0;
	$zone_i = 1;
	$arr[$i]["name"] = $lang_g['lotZone'][$zone_i];
	$arr[$i]["zone"] = 1;
	$arr[$i]["date"] = _cvf($rs["o_limit_time"] , 3 ,$lang_post);
	$enum=explode(',',$rs[o_number]);
	$arr[$i]["data"][$y]["num1"] = ($enum[0] == "") ? $ball_billb[5] : $enum[0];
	$arr[$i]["data"][$y]["num2"] = ($enum[1] == "") ? $ball_billb[5] : $enum[1];
	$arr[$i]["data"][$y]["num3_1"] = ($enum[2] == "") ? $ball_billb[5] : $enum[2];
	$arr[$i]["data"][$y]["num3_2"] = ($enum[3] == "") ? $ball_billb[5] : $enum[3];
	$arr[$i]["data"][$y]["num3_3"] = ($enum[4] == "") ? $ball_billb[5] : $enum[4];
	$arr[$i]["data"][$y]["num3_4"] = ($enum[5] == "") ? $ball_billb[5] : $enum[5];

	$i=1;
	$zone_i = 2;
	$arr[$i]["name"] = $lang_g['lotZone'][$zone_i];
	$arr[$i]["zone"] = 2;
	$arr[$i]["date"] = _cvf(strtotime($date) , 3 ,$lang_post);
	$y=0;
	for($rob_i=1;$rob_i<=$lot_zone_bet[$zone_i];$rob_i++){ 
		$rs =  $arr_ok[$zone_i][$rob_i]; 
		$enum=explode(',',$rs[o_number]);

		$arr[$i]["data"][$y]["rob"] = $lang_g['lotZone'][$zone_i].$lot_rob[$rob_i];
		$arr[$i]["data"][$y]["num3"] = ($enum[0] == "") ? $ball_billb[5] : $enum[0];
		$arr[$i]["data"][$y]["num2"] = ($enum[1] == "") ? $ball_billb[5] : $enum[1];
		$y++;
	}


	$i=2;

	$arr[$i]["name"] = $lang_g['_lotZone'][3];
	$arr[$i]["zone"] = 3;
	$arr[$i]["date"] = _cvf(strtotime($date) , 3 ,$lang_post);
	$y=0;
	for($zone_i=3;$zone_i<=17;$zone_i++){  
		if($lot_zone_bet[$zone_i]<=1){
			$rob_i=1;
			$rs =  $arr_ok[$zone_i][$rob_i]; 
			$enum=explode(',',$rs[o_number]);

			$arr[$i]["data"][$y]["rob"] = $lang_g['lotZone'][$zone_i];
			$arr[$i]["data"][$y]["num3"] = ($enum[0] == "") ? $ball_billb[5] : $enum[0];
			$arr[$i]["data"][$y]["num2"] = ($enum[1] == "") ? $ball_billb[5] : $enum[1];

			$y++;
		}else{
			for($rob_i=1;$rob_i<=$lot_zone_bet[$zone_i];$rob_i++){ 
				$rs =  $arr_ok[$zone_i][$rob_i]; 
				$enum=explode(',',$rs[o_number]);

				$arr[$i]["data"][$y]["rob"] = $lang_g['lotZone'][$zone_i].$lot_rob[$rob_i];
				$arr[$i]["data"][$y]["num3"] = ($enum[0] == "") ? $ball_billb[5] : $enum[0];
				$arr[$i]["data"][$y]["num2"] = ($enum[1] == "") ? $ball_billb[5] : $enum[1];
				$y++;
			}
		}
	}


	$i=3;
	$zone_i = 19;
	$arr[$i]["name"] = $lang_g['lotZone'][$zone_i];
	$arr[$i]["zone"] = 19;
	$arr[$i]["date"] = _cvf(strtotime($date) , 3 ,$lang_post);
	$y=0;
	for($rob_i=1;$rob_i<=$lot_zone_bet[$zone_i];$rob_i++){ 
		$rs =  $arr_ok[$zone_i][$rob_i]; 
		$enum=explode(',',$rs[o_number]);

		$arr[$i]["data"][$y]["rob"] = $lang_g['lotZone'][$zone_i]." ".$lang_m[40]." ".$lot_robmun[$rob_i];
		$arr[$i]["data"][$y]["num3"] = ($enum[0] == "") ? $ball_billb[5] : $enum[0];
		$arr[$i]["data"][$y]["num2"] = ($enum[1] == "") ? $ball_billb[5] : $enum[1];
		$y++;
	}


	$i=4;
	$zone_i = 18;
	$arr[$i]["name"] = $lang_g['lotZone'][$zone_i];
	$arr[$i]["zone"] = 18;
	$arr[$i]["date"] = _cvf(strtotime($date) , 3 ,$lang_post);
	$y=0;
	for($rob_i=1;$rob_i<=$lot_zone_bet[$zone_i];$rob_i++){ 
		$rs =  $arr_ok[$zone_i][$rob_i]; 
		$enum=explode(',',$rs[o_number]);

		$arr[$i]["data"][$y]["rob"] = $lang_g['lotZone'][$zone_i]." ".$lang_g['_rob']." ".$rob_i;
		$arr[$i]["data"][$y]["num3"] = ($enum[0] == "") ? $ball_billb[5] : $enum[0];
		$arr[$i]["data"][$y]["num2"] = ($enum[1] == "") ? $ball_billb[5] : $enum[1];
		$y++;
	}

	
	$datax = json_encode($arr);
	$data = json_decode($datax, true);

	foreach ($data as $k => $v) {
		if($v["zone"]==1) {
		?>
			<div class="result-table">
				<hr>
				<h4 class="title"><?=$v["name"]." - ".$v["date"];?></h4>
				<table class="">
					<tr>
						<th><?=$lang_data["win1"];?></th>
						<th><?=$lang_data["win2"];?></th>
						<th><?=$lang_data["win3_down_first"];?></th>
						<th><?=$lang_data["win3_down"];?></th>
					</tr>
				<? foreach ($v["data"] as $k2 => $v2) { ?>
					<tr>
						<!-- <td class="red"><?=$v2["num1"];?></td>
						<td class="blue"><?=$v2["num2"];?></td>
						<td class="green"><?=$v2["num3_1"]." ".$v2["num3_2"];?></td>
						<td class="green"><?=$v2["num3_3"]." ".$v2["num3_4"];?></td> -->
						<td>
							<span <?if(is_numeric($v2["num1"])){?>class="red"<?}?>><?=$v2["num1"];?></span>
						</td>
						<td>
							<span <?if(is_numeric($v2["num2"])){?>class="blue"<?}?>><?=$v2["num2"];?></span>
						</td>
						<td>
							<span <?if(is_numeric($v2["num3_1"])){?>class="green"<?}?>><?=$v2["num3_1"];?></span>
							<span <?if(is_numeric($v2["num3_2"])){?>class="green"<?}?>><?=$v2["num3_2"];?></span>
						</td>
						<td>
							<span <?if(is_numeric($v2["num3_1"])){?>class="green"<?}?>><?=$v2["num3_1"];?></span>
							<span <?if(is_numeric($v2["num3_3"])){?>class="green"<?}?>><?=$v2["num3_4"];?></span>
						</td>
					</tr>
				<? } ?>
				</table>
			</div>
		<?
		} else { ?>
			<div class="result-table">
				<hr>
				<h4 class="title"><?=$v["name"]." - ".$v["date"];?></h4>
				<table class="">
					<colgroup>
						<col>
						<col>
						<col>
					</colgroup>
					<tr>
						<th><?=$lang_data["rob"];?></th>
						<th><?=$lang_data["lot3on"];?></th>
						<th><? if($v["zone"]!=19){echo $lang_data["lot2down"];}else{echo str_replace("3", "2", $lang_data["lot3on"]);}; ?></th>
					</tr>
				<? foreach ($v["data"] as $k2 => $v2) { ?>
					<tr>
						<td ><?=$v2["rob"];?></td>
						<td <?if(!is_numeric($v2["num3"])){?> class="gray" <?}?>><?=$v2["num3"];?></td>
						<td <?if(!is_numeric($v2["num2"])){?> class="gray" <?}?>><?=$v2["num2"];?></td>
					</tr>
				<? } ?>
				</table>
			</div>

		<? }
	}
?>
