<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"> -->
<link href="jsui/jquery-ui.min.css" rel="stylesheet">
<link href="jsui/jquery-ui-custom.css" rel="stylesheet">

<? if(isset($_POST['date'])) {
	$d = explode("/",$_POST['date']);
	// $res_date = $d[2]."-".$d[1]."-".$d[0];
	// $_GET['d'] = $d[0]."-".$d[1]."-".$d[2];
	$_GET['d'] = $_POST['date'];
	list($dd,$mm,$yy) = explode("-", $_GET['d']);
    $res_date = $yy."-".$mm."-".$dd;
}else { 
	// $res_date = date("Y")."-".date("m")."-".date("d");
    $res_date = date("Y-m-d", time());
	$_GET['d'] = date("d")."-".date("m")."-".date("Y");
} 

$arr_ok = array();
$sql_arr=sql_query("select * from bom_tb_lotto_ok  where lot_zone!=1  and ok_date='$_GET[d]'");
while($rs_arr=sql_fetch($sql_arr)){
	$arr_ok[$rs_arr['lot_zone']][$rs_arr['lot_rob']] = $rs_arr;
}

//print_r($arr_ok);

?>
<form action="main_lothun.php?tlot=result&zone_send=<?=$_SESSION[zone_hun];?>&rob_send=<?=$_SESSION[rob_hun];?>&name_send=<?=$_SESSION[name_hun];?>" method="post" class="res_date_form">
	<button class="calendar" onclick="$('#datepicker').focus(); return false;">
		<span><img src="img/calendar.png" alt=""></span>
	</button>
	<input type="text" id="datepicker" name="date" style="height: 26px;">
	<input type="submit" value="<?=$lang_member[321];?>">
</form>

<div class="hun-container">
	<div class="result-col">
		
		<table cellspacing="0" cellpadding="0" class="hun_res_tb oho_tb">
			<colgroup>
				<col><col><col>
			</colgroup>
			
			<tr>
				<th colspan="3"><?=$lang_member[679];?></th>
			</tr>
			<? $zone_i = 2;  if(count($arr_ok[$zone_i])>0){ ?>
			<tr class="tb_title_lotto">
				<th><?=$lang_member[643];?></th>
				<th><?=$lang_member[385];?></th>
				<th><?=$lang_member[393];?></th>
			</tr>
			<? 
			for($rob_i=1;$rob_i<=$lot_zone_bet[$zone_i];$rob_i++){ 
				$rs =  $arr_ok[$zone_i][$rob_i]; 
				$enum=explode(',',$rs[o_number]);
			?>
			<tr>
				<td><?=$lang_g['lotrob'][$rob_i];?></td>
				<td><?=($enum[0] != '') ? $enum[0] : $lang_member[682];?></td>
				<td><?=($enum[1] != '') ? $enum[1] : $lang_member[682];?></td>
			</tr>
			<? } ?>
			<? } ?>
		</table>
		
		
		<!-- <table cellspacing="0" cellpadding="0" class="hun_res_tb oho_tb">
			<colgroup>
				<col><col><col>
			</colgroup>
			<tr>
				<th colspan="3"><?=$lang_member[683];?></th>
			</tr>
			<? $zone_i = 19;  if(count($arr_ok[$zone_i])>0){ ?>
			<tr class="tb_title_lotto">
				<th><?=$lang_member[643];?></th>
				<th><?=$lang_member[385];?></th>
				<th><?=$lang_member[390];?></th>
			</tr>
			<? 
			for($rob_i=1;$rob_i<=$lot_zone_bet[$zone_i];$rob_i++){ 
				$rs =  $arr_ok[$zone_i][$rob_i]; 
				$enum=explode(',',$rs[o_number]);
			?>
			<tr>
				<td><?=$lot_robmun[$rob_i];?></td>
				<td><?=($enum[0] != '') ? $enum[0] : $lang_member[682];?></td>
				<td><?=($enum[1] != '') ? $enum[1] : $lang_member[682];?></td>
			</tr>
			<? } ?>
			<? } ?>
		</table> -->
		
	</div>

	<div class="result-col">
		<table cellspacing="0" cellpadding="0" class="hun_res_tb oho_tb">
			<colgroup>
				<col><col><col>
			</colgroup>
			<tr>
				<th colspan="3"><?=$lang_member[684];?></th>
			</tr>
			<tr class="tb_title_lotto">
				<th><?=$lang_member[643];?></th>
				<th><?=$lang_member[385];?></th>
				<th><?=$lang_member[393];?></th>
			</tr>
			<? 
			for($zone_i=3;$zone_i<=17;$zone_i++){  
				$nz = $lot_zone_bet[$zone_i];
				if($nz<=1){
					$rob_i = 1;
					$rs =  $arr_ok[$zone_i][$rob_i]; 
					$enum=explode(',',$rs[o_number]);
			?>
			<tr>
				<td><?=$lang_g['lotZone'][$zone_i]?></td>
				<td><?=($enum[0] != '') ? $enum[0] : $lang_member[682];?></td>
				<td><?=($enum[1] != '') ? $enum[1] : $lang_member[682];?></td>
			</tr>
			<? }else{ 
				for($zr=1;$zr<=$nz;$zr++){
					$rs =  $arr_ok[$zone_i][$zr]; 
					$enum=explode(',',$rs[o_number]);
			?>
			<tr>
				<td><?=$lang_g['lotZone'][$zone_i].$lang_g['lotrob'][$zr]?></td>
				<td><?=($enum[0] != '') ? $enum[0] : $lang_member[682];?></td>
				<td><?=($enum[1] != '') ? $enum[1] : $lang_member[682];?></td>
			</tr>
			<? } }} ?>
		</table>
	</div>

	<div class="result-col">
		<table cellspacing="0" cellpadding="0" class="hun_res_tb oho_tb">
			<colgroup>
				<col><col><col>
			</colgroup>
			<tr>
				<th colspan="3"><?=$lang_member[686];?></th>
			</tr>
			<? $zone_i = 18;  if(count($arr_ok[$zone_i])>0){ ?>
			<tr class="tb_title_lotto">
				<th><?=$lang_member[643];?></th>
				<th><?=$lang_member[385];?></th>
				<th><?=$lang_member[393];?></th>
			</tr>
			<? 
			for($rob_i=1;$rob_i<=$lot_zone_bet[$zone_i];$rob_i++){ 
				$rs =  $arr_ok[$zone_i][$rob_i]; 
				$enum=explode(',',$rs[o_number]);
			?>
			<tr>
				<td><?=$lang_member[688];?> <?=$rob_i?></td>
				<td><?=($enum[0] != '') ? $enum[0] : $lang_member[682];?></td>
				<td><?=($enum[1] != '') ? $enum[1] : $lang_member[682];?></td>
			</tr>
			<? } } ?>
		</table>
	</div>

</div>
<script>
	const lang = '<?=$_SESSION['lang'];?>';
	// console.log(lang)
</script>
<script src="jsui/jquery-ui.min.js"></script>
<!-- <script src="js/datepicker_lang/datepicker_th.js"></script> -->
<? if(file_exists('js/datepicker_lang/datepicker_'.$_SESSION['lang'].'.js')) {?>
<script src="<?='js/datepicker_lang/datepicker_'.$_SESSION['lang'].'.js';?>">
	// console.log('yel')
</script>

<? }else{ ?>
<script >
	// console.log('nol')
</script>
<? } ?>
<script>
	$(function(){
      $( "#datepicker" ).datepicker({
        maxDate : new Date(),
        defaultDate : new Date(),
        buttonImage: "img/calendar.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        dateFormat:"dd-mm-yy",
      });
      $("#datepicker").datepicker('setDate', new Date('<?=$res_date;?>')); 
  	});

	// $( function() {
 //   		$("#datepicker").datepicker({maxDate: new Date()});
 //   		$("#datepicker").datepicker('setDate', new Date('<?=$res_date;?>')); 
 //  	});
</script>