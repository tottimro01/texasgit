<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

	require('../conn.php');
	require('../function.php');
	require('../../lang/th.php');
	require('../../lang/function_th.php');

	$b_id = $_GET['b_id'];


  $sql = "SELECT * FROM bom_tb_ball_list_livescore WHERE b_id = '$b_id' ORDER BY auto_id ASC";
  $re = sql_query_sp($sql);
  // $data = array();
  // while($rs = sql_fetch($re)){
  //   $data[] = array(
  //       'score' => $rs['b_score'],
  //       'date' => $rs['b_date'],
  //       'time' => $rs['b_time'],
  //   );
  // }

  $sql = "SELECT * FROM bom_tb_ball_list WHERE b_id = '$b_id'";
  $info_data = sql_array_sp($sql);
  // $info = array(
  //   'match_id' => $info_data['b_id'],
  //   'team_1_name' => $info_data['b_name_1_th']!="" ? $info_data['b_name_1_th'] : $info_data['b_name_1_en'],
  //   'team_2_name' => $info_data['b_name_2_th']!="" ? $info_data['b_name_2_th'] : $info_data['b_name_2_en'],
  //   'live' => $info_data['b_live'],
  //   'score_full' => $info_data['b_score_full'],
  //   'score_half' => $info_data['b_score_half'],
  //   'live_text'  => $info_data['b_live_showtime'],
  // );
?>
<? if($info_data['b_id']!=""){ 

$_name_1 = $info_data['b_name_1_th']!=""?$info_data['b_name_1_th']:$info_data['b_name_1_en'];
$_name_2 = $info_data['b_name_2_th']!=""?$info_data['b_name_2_th']:$info_data['b_name_2_en'];

$_1h = $info_data['b_score_half']!=""?$info_data['b_score_half']:"?-?";
$_ft = $info_data['b_score_full']!=""?$info_data['b_score_full']:$_1h;;
$_ds = $_name_1 . " " . $_ft . " " . $_name_2 ;
$_lvt =  $info_data['live_text']!=""?$info_data['live_text']."'":"";

?>
	<table class="table tb-livescore">
		<tr>
			<td style="text-align: right;"><b><?=$_name_1;?></b></td>
			<td class="sc-cell"><?=$_ft;?></td>
			<td><b><?=$_name_2;?></b></td>
		</tr>
		<tr>
			<td style="text-align: right;">ครึ่งเวลา:</td>
			<td class="sc-cell"><?=$_1h;?></td>
			<td></td>
		</tr>
	</table>
	<div class="bg-gray" style="padding: 6px;">
		ผลคะแนน
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
<?}?>