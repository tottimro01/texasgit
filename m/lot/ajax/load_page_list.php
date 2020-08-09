<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php

// require("../../../lang/th.php");
require('../../../inc/conn.php');
require('../../../inc/function.php');
if($_COOKIE['Language']==""){
    setcookie( "Language", 'th', time()+31104000, "/");
}
require('../../../w1/admin_lang/export/lang_member_'.$_COOKIE['Language'].'.php');
//  if($_COOKIE['Language']==""){
  
//       setcookie( "Language", 'th', time()+31104000, "/");
// }

// require('../lang/'.$_COOKIE['Language'].'.php');

$url_file1="json/lotto/ok/ok_1_1.json";	
$date_js=file_get_contents2($url_file1);
$date_bet = json_decode2($date_js, true);
$ok_date=$date_bet[0];
#print_r($date_bet);

if($_GET[d]!=""){
$view_date=$_GET[d];
}elseif($_POST[period]==""){
$view_date=$ok_date[ok_date];
}else{
$view_date=$_POST[period];
	}


$arr_bill = array();

$arr_bill_list = array();
$ir = 0;
$sql_bill=sql_query("select * from bom_tb_lotto_topmax where m_id='$_SESSION[mid]' order by play_timestam desc");
while($rs_bill=sql_fetch($sql_bill)){
	$arr_bill_list["bill_data"][$rs_bill["bill_id"]][$ir] = $rs_bill;
	$arr_bill_list["bill_date"][$rs_bill["bill_id"]] = $rs_bill["play_timestam"];
	$arr_bill_list["bill_cus_name"][$rs_bill["bill_id"]] = $rs_bill["b_name"];
	$arr_bill_list["bill_no"][$rs_bill["bill_id"]] = $rs_bill["b_no"];
	$ir++;
}
//print_r($arr_bill_list);
?>
<div class="countdown">10</div>
<? 
$ir = 0; 
$cr = 1;
foreach($arr_bill_list["bill_data"] as &$value){ 
	$bill_id = array_keys($arr_bill_list["bill_data"],$value); 
?>
<form onSubmit="return save_data(this , 'btn<?=$bill_id[0]?>');" enctype="multipart/form-data" method="post"  id="form-save" name="form-save">
<input type="hidden" name="zone" value="1">
<input type="hidden" name="rob" value="1">
<input type="hidden" name="bill_cus_name" value="<?=$arr_bill_list["bill_cus_name"][$bill_id[0]]?>">
<input type="hidden" name="bill_no" value="<?=$arr_bill_list["bill_no"][$bill_id[0]]?>">
<div class="table-template thaisan" data-minHeight="0" data-maxHeight="0">
	<table>
		<tbody>
			<tr>
				<th colspan="6" style="border-bottom: 1px solid #daa520;">
					<span class="ttitle" style="float: left;"><!-- บิล --><?=$lang_member[2252];?> : <?=$bill_id[0]?></span>
					<span class="ttitle"><!-- ชื่อ --><?=$lang_member[118];?> : <?=$arr_bill_list["bill_cus_name"][$bill_id[0]]?></span>
					<span class="ttitle"><!-- ใบโพย --><?=$lang_member[496];?> : <?=$arr_bill_list["bill_no"][$bill_id[0]]?></span>
					<div class="arrow">&#8743;</div>
				</th>
			</tr>
			<tr class="sub-th">
				<th colspan="6">
					<!-- เวลา --><?=$lang_member[303];?> : <?=date("d/m/Y H:i:s" , $arr_bill_list["bill_date"][$bill_id[0]]);?>
				</th>
			</tr>
			<tr class="sub-th">
				<th><!-- เลข --><?=$lang_member[381];?></th>
				<th><!-- ประเภท --><?=$lang_member[160];?></th>
				<th><!-- ยอดแทง --><?=$lang_member[2253];?></th>
				<th><!-- จ่าย --><?=$lang_member[162];?></th>
				<th><!-- รางวัล --><?=$lang_member[514];?></th>
				<th></th>
			</tr>

			<? 
		$ac_all = 1; 
		$sum_win = 0;
		foreach($value as &$rs){ 
			if($rs["tp_status"]==0){ $ac_all = 0; } 
			if($rs["tp_status"]==0){ $sum_win = $sum_win+$rs["tp_win"]; } 
			
		?>
			<tr>
				<td><?=_dt($rs["play_number"])?></td>
				<td><?=$lot_type["th"][$rs["lot_type"]]?></td>
				<td><?=number_format($rs["b_total"] , 2)?></td>
				<td><?=number_format($rs["tp_win"] , 2)?></td>
				<td><?=number_format($rs["b_total"]*$rs["tp_win"] , 2)?></td>
				<td>
					<? if($rs["tp_win"]<=0){ ?>
				<i class="fa fa-close" aria-hidden="true" style="color: red;"></i>
			<? }else{ ?>
				<? if($rs["tp_status"]==1){ ?>
					<i class="fa fa-check" aria-hidden="true" style="color: green;"></i>
				<? }else{ ?>
					<input type="checkbox" checked name="chk_list[]" value="<?=$rs["tp_id"]?>">
				<? } ?>
			<? } ?>
				</td>
			</tr>
			<?
				}
			?>
		</tbody>
		<? if($ac_all==0 and $sum_win>0){ ?>
		<tfoot>
			<tr>
				<td colspan="6">
					<form action="">
						<input type="submit" id="accept-btn" name="accept-btn" value="<?=$lang_member[515];?>">
					</form>
				</td>
			</tr>
		</tfoot>
		<? } ?>
	</table>
</div>
</form>
<? 
	$ir++; 
} 
?>
