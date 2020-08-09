<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

require("lang/variable_lang.php");

require('inc/conn.php');
require('inc/function.php');

	$b_id = $_GET['b_id'];


  $sql = "SELECT * FROM bom_tb_ball_list_livescore WHERE b_id = '$b_id' ORDER BY auto_id ASC";
  $re = sql_query_sp($sql);

  $sql = "SELECT * FROM bom_tb_ball_list WHERE b_id = '$b_id'";
  $info_data = sql_array_sp($sql);

?>
<? if($info_data['b_id']!=""){ 

$_name_1 = $info_data['b_name_1_th']!=""?$info_data['b_name_1_th']:$info_data['b_name_1_en'];
$_name_2 = $info_data['b_name_2_th']!=""?$info_data['b_name_2_th']:$info_data['b_name_2_en'];

$_1h = $info_data['b_score_half']!=""?$info_data['b_score_half']:"?-?";
$_ft = $info_data['b_score_full']!=""?$info_data['b_score_full']:$_1h;;
$_ds = $_name_1 . " " . $_ft . " " . $_name_2 ;
$_lvt =  $info_data['live_text']!=""?$info_data['live_text']."'":"";

?>
	<table class="table tb-livescore head">
		<tr>
			<td style="text-align: right;"><b><?=$_name_1;?></b></td>
			<td class="sc-cell"><?=$_ft;?></td>
			<td><b><?=$_name_2;?></b></td>
		</tr>
		<tr>
			<td style="text-align: right;"><?=$lang_member[2336];?>:</td>
			<td class="sc-cell"><?=$_1h;?></td>
			<td></td>
		</tr>
	</table>
	<div class="bg_td" style="padding: 6px;">
		<?=$lang_member[907];?>
	</div>
	<table class="table tb-livescore">
		<? while($rs = sql_fetch($re)){ 
			if($rs['b_time']=="")
				continue;
		?>
		<tr>
			<td><?=$rs['b_time'];?>'</td>
			<td class="sc-cell"><?=$rs['b_score'];?></td>
			<td></td>
		</tr>
  		<? } ?>
	</table>
<?}else{?>
	<div style="text-align: center;"><b><?=$lang_member[2269];?></b></div>
<?}?>