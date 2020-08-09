<?

################OPEN BET LOTTO 
$sql="select * from bom_tb_config where con_id=1";
$rec=sql_array($sql);
if($rec["con_open_lotto"]==0){
echo "<center><br><h3 class='cr'>$lang_member[317]</h3></center>";
 exit();
	}
	
	
$zone=1;
$rob=1;
$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
$re_ok=sql_array($sql);

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
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
<div  class="countdown" style="margin: 10px 0px 0px 10px; float: right;"> 
<script type="application/javascript">
var myCountdown1 = new Countdown({
								 	time: 10 , // 86400 seconds = 1 day
									//time: 86400,
									width:50, 
									height:40,  
									rangeHi:"seconds",
									onComplete: newload ,
									style:"flip"	// <- no comma on last item!
									});
function newload(){
	window.location.href = "main_lotto.php?tlot=lottofalse&vvw=0";
}

</script>
</div> 
<div style="clear: both;"></div>
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
<table width="378" border="0" cellspacing="1" cellpadding="5" style="margin: auto; box-shadow: #000 0px 0px 1px; float: left; margin-left: 5px; margin-top: 5px;" bgcolor="#6b4f11">
	<tbody>
		<tr>
			<td class="bg_table" style="cursor:pointer; color: #FFF;" colspan="6"><strong><?=$lang_member[607]?> : <?=$bill_id[0]?></strong>
			<span style="float: right;">
			<strong><?=$lang_member[495]?></strong> : <?=$arr_bill_list["bill_cus_name"][$bill_id[0]]?>
			<strong><?=$lang_member[496]?></strong> : <?=$arr_bill_list["bill_no"][$bill_id[0]]?>
				</span>
			</td>
		</tr>
		<tr>
			<td align="center" class="bg_table" style="cursor:pointer; color: #FFF;" colspan="6"><strong><?=$lang_member[303];?> : <?=date("d/m/Y H:i:s" , $arr_bill_list["bill_date"][$bill_id[0]]);?></strong>
			</td>
		</tr>
	</tbody>
	<tbody>
		<tr style="font-size:11px; color: #FFF;">
			<td align="center" valign="top" class="bg_table"><strong><?=$lang_member[381];?></strong></td>
			<td align="center" valign="top" class="bg_table"><strong><?=$lang_member[160];?></strong></td>
			<td align="center" valign="top" class="bg_table"><strong><?=$lang_member[300];?></strong></td>
			<td align="center" valign="top" class="bg_table"><strong><?=$lang_member[162];?></strong></td>
			<td align="center" valign="top" class="bg_table"><strong><?=$lang_member[514];?></strong></td>
			<td align="center" valign="top" class="bg_table">&nbsp;</td>
		</tr>
		<? 
		$ac_all = 1; 
		$sum_win = 0;
		foreach($value as &$rs){ 
			if($rs["tp_status"]==0){ $ac_all = 0; } 
			if($rs["tp_status"]==0){ $sum_win = $sum_win+$rs["tp_win"]; } 
			
		?>
		<tr class=" tr_lot">
			<td align="center" valign="top"><?=_dt($rs["play_number"])?></td>
			<td align="center" valign="top"><?=$lot_type[$_SESSION['lang']][1][$rs["lot_type"]]?></td>
			<td align="right" valign="top"><?=number_format($rs["b_total"] , 2)?></td>
			<td align="right" valign="top"><?=number_format($rs["tp_win"] , 2)?></td>
			<td align="right" valign="top"><?=number_format($rs["b_total"]*$rs["tp_win"] , 2)?><!-- <i class="fa fa-close" aria-hidden="true" style="color: red;"></i>--></td>
			<td align="center" valign="top">
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
		<? } ?>
		<? if($ac_all==0 and $sum_win>0){ ?>
		<tr>
			<td align="center" class="bg_table" style="cursor:pointer; color: #FFF;" colspan="6"><input type="submit" id="btn<?=$bill_id[0]?>" class="btn_le" value="<?=$lang_member[515]?>"  style="width:110px;height:20px;cursor:pointer; margin-top:2px; margin-bottom:2px; line-height:10px; background:#f7c63c;"></td>
		</tr>
		<? } ?>
	</tbody>
</table>
</form>
<? 
	$ir++; 
	if($cr==2){
		echo "<div style=\"clear: both;\"></div>";
		$cr = 1;
	}else{
		$cr++;
	}
} 
?>
<div style="clear: both;"></div>
<br>
<script>
function save_data(e , btn){
	$("#"+btn).hide();
	set_process(e, "lotto/save_lotto_false.php", function(data) {
		if (data.res == 1) {
			parent.leftx.get_credit();
			parent.leftx.result_save(data.txt);
			window.location.href = "main_lotto.php?tlot=lottofalse&vvw=0";
		}else if(data.res == 99){
			alert(data.msg);
			$("#"+btn).show();
		}else{
			parent.leftx.result_save(data.txt);
			$("#"+btn).show();
		}
	});
	return false; 
}
function set_process(set_data , set_url , callback){
  $.ajax({
        type: "POST",
        url: set_url,
        data: new FormData( set_data ),
        processData: false,
        contentType: false,
        dataType:"json",
        cache: false, // Clear cache IE
        beforeSend: function(){
          $(".loader").show();
        },
        success: function(data){
          $(".loader").hide();
          callback(data);
        }
      });
}
</script>