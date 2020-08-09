<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../../inc/conn.php');	
require('../function.php');	
include "../refresh_page/txt_alert.php";
$arr_league = array();
$arr_list = array();
$sql=sql_query("select * from bom_tb_data_sport_today order by b_asc asc , b_date_play asc");
while($rs=sql_fetch($sql)){
	$arr_league[] = $rs["b_zone_id"]."*-*".$rs["b_zone"];
	$arr_list[$rs["b_zone_id"]][] = $rs;
}
$arr_league = array_unique($arr_league);
//print_r($arr_list[1]);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <? /*for($i=0;$i<10;$i++){*/ foreach ($arr_league as &$value_league) { $ex_league = explode("*-*" , $value_league); 
  if($_POST["fev"]==1){
	 // print_r( $_SESSION["fev_ball"]);
	 // echo in_array($ex_league[0], $_SESSION["fev_ball"]);
	  if (in_array($ex_league[0], $_SESSION["fev_ball"])) {
		  //echo "sssss";
	  }else{
		  continue;
		 }
	}
  ?>
  <tr class="fev_id_<?=$ex_league[0]?>">
    <td width="1%" align="center" class="tdle">O</td>
    <td width="1%" align="center" class="tdle">X</td>
    <td width="1%" align="center" class="tdle">O</td>
    <td width="1%" align="center" class="tdle">X</td>
    <td width="1%" align="center" class="tdle">O</td>
    <td width="1%" align="center" class="tdle">X</td>
    <td class="tdle">&nbsp;</td>
    <td colspan="2" align="center" class="tdle"><strong><?=$ex_league[1]?></strong></td>
    <td colspan="9" class="tdle td_bd_right" align="right"><img src="../img/star<? if (in_array($ex_league[0], $_SESSION["fev_ball"])) { echo "2"; }else{ echo "1"; } ?>.png" style="vertical-align: middle; cursor:pointer;" onClick="save_fev(this , '<?=$ex_league[0]?>');">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <? /*for($y=0;$y<10;$y++){ */ foreach ($arr_list[$ex_league[0]] as &$value_list) {
  	$id = $value_list["b_id"]."_".$value_list["b_add"];
  ?>
  <tr class="tr_data fev_id_<?=$ex_league[0]?>">
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white"><span class="<? if($value_list["b_close"]==1){ echo "gray"; }else{ echo "red"; } ?> hand_hover" onClick="set_X(this,'<?=$id?>');" id="X_<?=$id?>"><? if($value_list["b_close"]==1){ echo "O"; }else{ echo "X"; } ?></span></td>
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white"><span class="<? if($value_list["b_oe_view"]==1){ echo "gray"; }else{ echo "red"; } ?> hand_hover" onClick="set_W(this,'<?=$id?>');" id="W_<?=$id?>"><? if($value_list["b_oe_view"]==1){ echo "O"; }else{ echo "X"; } ?></span></td>
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white"><span class="<? if($value_list["b_oe_bet"]==1){ echo "gray"; }else{ echo "red"; } ?> hand_hover" onClick="set_B(this,'<?=$id?>');" id="B_<?=$id?>"><? if($value_list["b_oe_bet"]==1){ echo "O"; }else{ echo "X"; } ?></span></td>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom td_bg_white"><span class="<? if($value_list["b_oe_accept"]==1){ echo "gray"; }else{ echo "red"; } ?> hand_hover" onClick="set_key(this,'<?=$id?>');" id="key_<?=$id?>"><? if($value_list["b_oe_accept"]==1){ echo "O"; }else{ echo "X"; } ?></span></td>
    <td width="8%" align="center" class="td_bd_right td_bd_bottom <?=($value_list['b_big'] == 1) ? 'red' : 'blue'?> hand_hover lk_hover" onClick="parent.leftx.location.href='drop_list.php?id=<?=$id?>&ty=12';"><strong><?=$value_list["b_name_1"]?></strong></td>
    <td width="8%" align="center" class="td_bd_right td_bd_bottom <?=($value_list['b_big'] == 2) ? 'red' : 'blue'?> hand_hover lk_hover" onClick="parent.leftx.location.href='drop_list.php?id=<?=$id?>&ty=13';"><strong><?=$value_list["b_name_2"]?></strong></td>
    <td width="3%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none acenter" onClick="c_percen=1;" onKeyDown="return numberonly(event,this,'%','7','<?=$id?>')" id="percen7_<?=$id?>" value="<?=$value_list["b_percent_oe"]?>"></td>
    <td width="2%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none acenter" maxlength="1" onClick="c_L=1;" onKeyDown="return numberonly(event,this,'L','7','<?=$id?>')" id="L7_<?=$id?>" value="<?=$value_list["b_auto_oe"]?>"></td>
    <td width="5%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none aright<? if($value_list["b_odd"]<0){ echo " red"; } ?>" onClick="c_price=1;" onKeyDown="return numberonly(event,this,'price','7','<?=$id?>')" id="price7_<?=$id?>" value="<?=$value_list["b_odd"]?>"></td>
    <td width="8%" align="center" class="td_bd_right td_bd_bottom td_bg_yellow hand_hover lk_hover" onClick="parent.rightx.location.href='box_right2.php?id=<?=$id?>&ty=7';"><?=_harn($value_list["b_count_8"])?> - <?=_harn($value_list["b_count_9"])?></td>
    <td width="8%" align="right" class="td_bd_right td_bd_bottom td_bg_white<? if(($value_list["b_count_8"]-$value_list["b_count_9"])<0){ echo " red"; } ?> hand_hover lk_hover" onClick="open_1('<?=$id?>' , '7');"><?=_harn($value_list["b_count_8"]-$value_list["b_count_9"])?></td>
    <?
    $ex_score = explode("-",$value_list["b_score_live"]);
	?>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none acenter" onClick="c_score=1;" onKeyDown="return numberonly(event,this,'score','1','<?=$id?>')" id="score1_<?=$id?>" value="<?=$ex_score[0]?>"></td>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none acenter" onClick="c_score=1;" onKeyDown="return numberonly(event,this,'score','2','<?=$id?>')" id="score2_<?=$id?>" value="<?=$ex_score[1]?>"></td>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom td_bg_white"><input type="text" class="txt_none acenter" onClick="c_score_1h=1;" onKeyDown="return numberonly(event,this,'score_1h','1','<?=$id?>')" id="score_1h_<?=$id?>" value="<?=$value_list["b_score_1h"]?>"></td>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom td_bg_white"><input type="text" class="txt_none acenter" onClick="c_score_ft=1;" onKeyDown="return numberonly(event,this,'score_ft','1','<?=$id?>')" id="score_ft_<?=$id?>" value="<?=$value_list["b_score_ft"]?>"></td>
    <td width="42%" class="td_bg_white">&nbsp;</td>
  </tr>
  <? } ?>
  <? } ?>
</table>
