<?
	session_start();
	header("Content-type: text/html");

	require('../../../inc/conn.php');
	require('../../../inc/function.php');

	require 'compress_page.php';
	require 'checkLang.php';

	$_POST["param"] = explode(",", $_POST["param"]);
	/*$url = $_SESSION["url"]."getBingoType.php?zone=".$_POST["param"][0]."&rob=".$_POST["param"][1]."&lang=".$_COOKIE["lang"];
	$data = file_get_contents($url);
	$data = json_decode($data, true);*/



	$lang_post           = trim($_COOKIE["lang"]);
	if($lang_post==""){
		$lang_post = "th";
	}
	require("../../../lang/".$lang_post.".php");

		$zone = $_POST["param"][0];
		$rob = $_POST["param"][1];
		$arr = array();

		$nz = $lot_zone_bet[$zone];

		$i=0;
		$sql=sql_query("select * from bom_tb_lotto_ok where lot_zone = '$zone' and lot_rob = '$rob' order by ok_id desc limit 20");
		while($rs=sql_fetch($sql)){
			$ex = explode("," , $rs["o_number"]);
			if($zone==18){
				$arr[$i]["name"] = $lang_g['lotZone'][$zone]." รอบที่ ".$rob;
			}else if($zone==19){
				$arr[$i]["name"] = $lang_g['lotZone'][$zone]." รอบ ".$lot_robmun[$rob];
			}else{
				if($nz<=1){
					$arr[$i]["name"] = $lang_g['lotZone'][$zone];
				}else{
					$arr[$i]["name"] = $lang_g['lotZone'][$zone].$lot_rob[$rob];
				}
			}

			$arr[$i]["date"] = _cvf($rs["o_limit_time"] , 3 ,$lang_post);

			$arr[$i]["zone"] = $zone;
			$arr[$i]["rob"] = $rob;

			if($zone==1){
				$arr[$i]["num1"] = ($ex[0] == "") ? "รอผล" : $ex[0];
				$arr[$i]["num2"] = ($ex[1] == "") ? "รอผล" : $ex[1];
				$arr[$i]["num3_1"] = ($ex[2] == "") ? "รอผล" : $ex[2];
				$arr[$i]["num3_2"] = ($ex[3] == "") ? "รอผล" : $ex[3];
				$arr[$i]["num3_3"] = ($ex[4] == "") ? "รอผล" : $ex[4];
				$arr[$i]["num3_4"] = ($ex[5] == "") ? "รอผล" : $ex[5];
			}else{
				$arr[$i]["num3"] = ($ex[0] == "") ? "รอผล" : $ex[0];
				$arr[$i]["num2"] = ($ex[1] == "") ? "รอผล" : $ex[1];
			}

			$i++;
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
					<tr>
						<!-- <td class="red"><?=$v["num1"];?></td>
						<td class="blue"><?=$v["num2"];?></td>
						<td class="green"><?=$v["num3_1"]." ".$v["num3_2"];?></td>
						<td class="green"><?=$v["num3_3"]." ".$v["num3_4"];?></td> -->
						<td>
							<span <?if(is_numeric($v["num1"])){?>class="red"<?}?>><?=$v["num1"];?></span>
						</td>
						<td>
							<span <?if(is_numeric($v["num2"])){?>class="blue"<?}?>><?=$v["num2"];?></span>
						</td>
						<td>
							<span <?if(is_numeric($v["num3_1"])){?>class="green"<?}?>><?=$v["num3_1"];?></span>
							<span <?if(is_numeric($v["num3_2"])){?>class="green"<?}?>><?=$v["num3_2"];?></span>
						</td>
						<td>
							<span <?if(is_numeric($v["num3_1"])){?>class="green"<?}?>><?=$v["num3_1"];?></span>
							<span <?if(is_numeric($v["num3_3"])){?>class="green"<?}?>><?=$v["num3_4"];?></span>
						</td>
					</tr>
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
					<tr>
						<td ><? if($v["zone"]!=1){echo $v["name"];}else{echo $v["rob"];}?></td>
						<td <?if(!is_numeric($v["num3"])){?> class="gray" <?}?>><?=$v["num3"];?></td>
						<td <?if(!is_numeric($v["num2"])){?> class="gray" <?}?>><?=$v["num2"];?></td>
					</tr>
				</table>
			</div>

		<? }
	}
?>
