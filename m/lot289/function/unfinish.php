<?
	header("Content-type: text/html");

	require('../../../inc/conn.php');
	require('../../../inc/function.php');

	include 'site-data.php';
	include 'checkLang.php';
	//$url = $_SESSION["url"]."getLottoFalse.php?mid=".$_SESSION["mid"];
	// $url = "https://ios.lotzx.com/getLottoFalse.php?mid=1";

	//$data = file_get_contents($url);
	//$data = json_decode($data,true);



	$lang_post           = trim($_COOKIE["lang"]);
	if($lang_post==""){
		$lang_post = "th";
	}
	require("../../../lang/".$lang_post.".php");

	$mid = $_SESSION["mid"];


	$url_file1="../../../json/lotto/ok/ok_1_1.json";	
	$date_js=file_get_contents2($url_file1);
	$date_bet = json_decode2($date_js, true);
	$ok_date=$date_bet[0];
	#print_r($date_bet);

	$view_date=$ok_date[ok_date];


	$arr_bill = array();

	$arr_bill_list = array();
	$ir = 0;
	$sql_bill=sql_query("select * from bom_tb_lotto_topmax where m_id='$mid' order by play_timestam desc");
	while($rs_bill=sql_fetch($sql_bill)){
		$arr_bill_list["bill_data"][$rs_bill["bill_id"]][$ir] = $rs_bill;
		$arr_bill_list["bill_date"][$rs_bill["bill_id"]] = $rs_bill["play_timestam"];
		$arr_bill_list["bill_cus_name"][$rs_bill["bill_id"]] = $rs_bill["b_name"];
		$arr_bill_list["bill_no"][$rs_bill["bill_id"]] = $rs_bill["b_no"];
		$ir++;
	}




	$arr = array();
	$ir = 0; 
	foreach($arr_bill_list["bill_data"] as &$value){ 
		$bill_id = array_keys($arr_bill_list["bill_data"],$value); 

		$arr[$ir]["bill_id"] = $bill_id[0];
		$arr[$ir]["bill_cus_name"] = $arr_bill_list["bill_cus_name"][$bill_id[0]];
		$arr[$ir]["bill_no"] = $arr_bill_list["bill_no"][$bill_id[0]];
		$arr[$ir]["bill_time"] = date("d/m/Y H:i:s" , $arr_bill_list["bill_date"][$bill_id[0]]);

		$ac_all = 1; 
		$sum_win = 0;
		$ird = 0;
		foreach($value as &$rs){ 
			if($rs["tp_status"]==0){ $ac_all = 0; } 
			if($rs["tp_status"]==0){ $sum_win = $sum_win+$rs["tp_win"]; } 


			$arr[$ir]["bill_data"][$ird]["num"] = _dt($rs["play_number"]);
			$arr[$ir]["bill_data"][$ird]["type"] = $lot_type["th"][$rs["lot_type"]];
			$arr[$ir]["bill_data"][$ird]["sum"] = number_format($rs["b_total"] , 2);
			$arr[$ir]["bill_data"][$ird]["pay"] = number_format($rs["tp_win"] , 2);
			$arr[$ir]["bill_data"][$ird]["bingo"] = number_format($rs["b_total"]*$rs["tp_win"] , 2);

			if($rs["tp_win"]<=0){
				$arr[$ir]["bill_data"][$ird]["status"] = 0;
				$arr[$ir]["bill_data"][$ird]["id"] = 0;
			}else{
				if($rs["tp_status"]==1){
					$arr[$ir]["bill_data"][$ird]["status"] = 1;
					$arr[$ir]["bill_data"][$ird]["id"] = 0;
				}else{
					$arr[$ir]["bill_data"][$ird]["status"] = 2;
					$arr[$ir]["bill_data"][$ird]["id"] = $rs["tp_id"];
				}
			}
			if($ac_all==0 and $sum_win>0){
				$arr[$ir]["bill_button"] = 1;
			}else{
				$arr[$ir]["bill_button"] = 0;
			}

			$ird++;
		}
		$ir++; 
	}


$datax = json_encode($arr);
		$data = json_decode($datax, true);


	$c = count($data);
?>
	<? foreach ($data as $key => $value) { ?>
	<div style="display: flex; flex-direction: column; margin-bottom: 20px;">
	<table data-billid='<?=$value["bill_id"];?>' data-pname='<?=$value["bill_cus_name"];?>' data-pid='<?=$value["bill_no"];?>'>
		<tr>
			<th class="unfinish-table-title" colspan="4"><?=$lang_data["bill"]." ".$value["bill_id"];?></th>
			<th class="unfinish-table-title" style="width: 100px;"><?=$lang_data["name"]." ".$value["bill_cus_name"];?></th>
			<th class="unfinish-table-title" style="width: 100px;"><?=$lang_data["poy"]." ".$value["bill_no"];?></th>
		</tr>
		<tr >
			<th colspan="6">
				<?=$lang_data["time"]." ".$value["bill_time"];?>
			</th>
		</tr>
	</table>
	<table>
		<tr>
			<th class="unfinish-column" style="border-top: 0;width: 36px;"><?=$lang_data["num"];?></th>
			<th class="unfinish-column" style="border-top: 0;width: 60px;"><?=$lang_data["type"];?></th>
			<th class="unfinish-column" style="border-top: 0;border-top: 0;"><?=$lang_data["yod_bet"];?></th>
			<th class="unfinish-column" style="border-top: 0;width: 60px;"><?=$lang_data["pay"];?></th>
			<th class="unfinish-column" style="border-top: 0;"><?=$lang_data["win"];?></th>
			<th class="unfinish-column" style="border-top: 0;width: 30px;">
				<? if($value["bill_button"] == 1) { ?>
				<label class="unfinish-checkall-container">
  					<input type="checkbox" name="check-all-unfinish" data-billid=<?=$value["bill_id"];?>>
  					<span class="unfinish-checkall-checkmark"></span>
				</label>
				<?}?>
			</th>
		</tr>
		<?
		foreach ($value["bill_data"] as $k => $val) {
		?>
			<tr>
				<td><?=$val["num"];?></td>
				<td><?=$val["type"];?></td>
				<td><?=$val["sum"];?></td>
				<td><?=$val["pay"];?></td>
				<td><?=$val["bingo"];?></td>
				<td>
					<? if($val["status"] == 0) { ?>
						<div class="unfinish-check-fail"></div>
					<? }else if($val["status"] == 1) { ?>
						<div class="unfinish-check-success"></div>
					<? }else if($val["status"] == 2) { ?>
						<label class="unfinish-check-container">
  							<input type="checkbox" name="check-unfinish" data-bid=<?=$value["bill_id"];?> data-cid=<?=$val["id"];?>>
  							<span class="unfinish-check-checkmark"></span>
						</label>
					<? } ?>
				</td>
			</tr>
	<? } ?>
	</table>
	<? if($value["bill_button"] == 1) { ?>
	<button class="accept-pay-btn" data-bid=<?=$value["bill_id"];?>><?=$lang_data["accept_pay"];?></button>
	<? }?>
	</div>
<? } ?>
