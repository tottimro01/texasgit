<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <? for($i=0;$i<10;$i++){ ?>
  <tr>
    <td width="1%" align="center" class="tdle">O</td>
    <td width="1%" align="center" class="tdle">X</td>
    <td width="1%" align="center" class="tdle">O</td>
    <td width="1%" align="center" class="tdle">X</td>
    <td width="1%" align="center" class="tdle">O</td>
    <td width="1%" align="center" class="tdle">X</td>
    <td class="tdle">&nbsp;</td>
    <td colspan="2" align="center" class="tdle"><strong>มวยไทย (ราชดำเนิน)</strong></td>
    <td colspan="18" class="tdle td_bd_right">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <? for($y=0;$y<10;$y++){ 
  	$id = $i."_".$y;
  ?>
  <tr class="tr_data">
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white"><span class="gray hand_hover" onClick="set_X(this,'<?=$id?>');" id="X_<?=$id?>">O</span></td>
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white"><span class="red hand_hover" onClick="set_W(this,'<?=$id?>');" id="W_<?=$id?>">X</span></td>
    <td width="2%" colspan="2" align="center" class="td_bd_right td_bd_bottom td_bg_white"><span class="red hand_hover" onClick="set_B(this,'<?=$id?>');" id="B_<?=$id?>">X</span></td>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom td_bg_white"><span class="gray hand_hover" onClick="set_key(this,'<?=$id?>');" id="key_<?=$id?>">O</span></td>
    <td width="8%" align="center" class="td_bd_right td_bd_bottom red hand_hover lk_hover" onClick="parent.leftx.location.href='drop_list.php?id=<?=$id?>&ty=5';"><strong>แสนดี</strong></td>
    <td width="8%" align="center" class="td_bd_right td_bd_bottom blue hand_hover lk_hover" onClick="parent.leftx.location.href='drop_list.php?id=<?=$id?>&ty=6';"><strong>กล้าศึก</strong></td>
    <td width="3%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none acenter" onClick="c_percen=1;" onKeyDown="return numberonly(event,this,'%','3','<?=$id?>')" id="percen3_<?=$id?>" value="20"></td>
    <td width="5%" align="left" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none" onClick="c_ball=1;" onKeyDown="return numberonly(event,this,'ball','3','<?=$id?>')" id="ball3_<?=$id?>" value="0+0.5"></td>
    <td width="2%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none acenter" maxlength="1" onClick="c_L=1;" onKeyDown="return numberonly(event,this,'L','3','<?=$id?>')" id="L3_<?=$id?>" value="0"></td>
    <td width="5%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none aright" onClick="c_price=1;" onKeyDown="return numberonly(event,this,'price','3','<?=$id?>')" id="price3_<?=$id?>" value="55"></td>
    <td width="8%" align="center" class="td_bd_right td_bd_bottom td_bg_yellow hand_hover lk_hover" onClick="parent.rightx.location.href='box_right2.php?id=<?=$id?>&ty=3';">0.0 - 0.0</td>
    <td width="6%" align="right" class="td_bd_right td_bd_bottom td_bg_white hand_hover lk_hover" onClick="open_1('<?=$id?>' , '3');">2,000</td>
    <td width="3%" align="center" class="td_bd_right td_bd_bottom red hand_hover lk_hover" onClick="parent.leftx.location.href='drop_list.php?id=<?=$id?>&ty=7';"><strong>สูง</strong></td>
    <td width="3%" align="center" class="td_bd_right td_bd_bottom blue hand_hover lk_hover" onClick="parent.leftx.location.href='drop_list.php?id=<?=$id?>&ty=8';"><strong>ต่ำ</strong></td>
    <td width="3%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none acenter" onClick="c_percen=1;" onKeyDown="return numberonly(event,this,'%','4','<?=$id?>')" id="percen4_<?=$id?>" value="20"></td>
    <td width="5%" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none" onClick="c_ball=1;" onKeyDown="return numberonly(event,this,'ball','4','<?=$id?>')" id="ball4_<?=$id?>" value="2+2.5"></td>
    <td width="2%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none acenter" maxlength="1" onClick="c_L=1;" onKeyDown="return numberonly(event,this,'L','4','<?=$id?>')" id="L4_<?=$id?>" value="0"></td>
    <td width="5%" align="right" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none aright red" onClick="c_price=1;" onKeyDown="return numberonly(event,this,'price','4','<?=$id?>')" id="price4_<?=$id?>" value="-75"></td>
    <td width="8%" align="center" class="td_bd_right td_bd_bottom td_bg_yellow hand_hover lk_hover" onClick="parent.rightx.location.href='box_right2.php?id=<?=$id?>&ty=4';">0.0 - 0.0</td>
    <td width="6%" align="right" class="td_bd_right td_bd_bottom td_bg_white red hand_hover lk_hover" onClick="open_1('<?=$id?>' , '4');">-300</td>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none acenter" onClick="c_score=1;" onKeyDown="return numberonly(event,this,'score','1','<?=$id?>')" id="score1_<?=$id?>" value="0"></td>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom"><input type="text" class="txt_none acenter" onClick="c_score=1;" onKeyDown="return numberonly(event,this,'score','2','<?=$id?>')" id="score2_<?=$id?>" value="0"></td>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom td_bg_white">1-0</td>
    <td width="2%" align="center" class="td_bd_right td_bd_bottom td_bg_white">2-0</td>
    <td width="4%" class="td_bg_white">&nbsp;</td>
  </tr>
  <? } ?>
  <? } ?>
</table>
