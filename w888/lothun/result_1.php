<?
/*
$url_file9=$json_file_main."json/lotto_hun/result.json";		
//$url_file9="http://json.lotto17.us/lotto_hun/result.json";		
$d_bet=file_get_contents2($url_file9);
$k_bet = json_decode2($d_bet, true);
#print_r($k_bet);
*/

?>

<table width="100%" border="0" cellpadding="0" cellspacing="1" class="txt_back11n bg_table">
  <tbody>
  <tr align="center" class="tb_title_lotto">
    <td width="15%" rowspan="4"><?=$lang_member[146];?></td>
    <td width="5%" rowspan="4">SET</td>
  </tr>
  <tr align="center" class="tb_title_lotto">
      <td width="40%" height="25" colspan="8"><?=$lang_member[696];?></td>
    </tr>
    <tr align="center" class="tb_title_lotto">
      <td width="10%" colspan="2"><?=$lang_member[689];?></td>
      <td width="10%" height="25" colspan="2"><?=$lang_member[691];?></td>
      <td width="10%" colspan="2"><?=$lang_member[692];?></td>
      <td width="10%" colspan="2"><?=$lang_member[694];?></td>
    </tr>
    <tr align="center" class="tb_title_lotto">
      <td width="5%"><?=$lang_member[390];?></td>
      <td width="5%" height="25"><?=$lang_member[393];?></td>
      <td width="5%"><?=$lang_member[390];?></td>
      <td width="5%" height="25"><?=$lang_member[393];?></td>
      <td width="5%"><?=$lang_member[390];?></td>
      <td width="5%" height="25"><?=$lang_member[393];?></td>
      <td width="5%"><?=$lang_member[390];?></td>
      <td width="5%" height="25"><?=$lang_member[393];?></td>
    </tr>

    
    <? 
	foreach($k_bet  as $bingo){
		$ed=@explode(',',$bingo['lot_i']);
	?>
  <tr class="tr_lot">
    <td height="18" align="center" style="padding:5px;" rowspan="<?=$lothun_set+1;?>" bgcolor="#ffffff"><b><?=$bingo['lot_date']?></b></td>
  </tr>
  <? $ipt = 0; 
    for($io=1;$io<=$lothun_set;$io++){ ?>
    <tr class="tr_lot tr_lotx">
    <td align="center" class="subtitle2"><b class="cbu">i<?=$io?></b></td>
      <td align="center" class="subtitle2"><?=$bingo['z1_r1_t2u'.$io.'i']?></td>
      <td align="center" class="subtitle2" bgcolor="#ccc"><?=$bingo['z1_r1_t2d'.$io.'i']?></td>
       <td align="center" class="subtitle2"><?=$bingo['z1_r2_t2u'.$io.'i']?></td>
      <td align="center" class="subtitle2" bgcolor="#ccc"><?=$bingo['z1_r2_t2d'.$io.'i']?></td>
       <td align="center" class="subtitle2"><?=$bingo['z1_r3_t2u'.$io.'i']?></td>
      <td align="center" class="subtitle2" bgcolor="#ccc"><?=$bingo['z1_r3_t2d'.$io.'i']?></td>
       <td align="center" class="subtitle2"><?=$bingo['z1_r4_t2u'.$io.'i']?></td>
      <td align="center" class="subtitle2" bgcolor="#ccc"><?=$bingo['z1_r4_t2d'.$io.'i']?></td>

    </tr>
    <? $ipt++;  } ?>
    <? } ?>
  </tbody>
</table>
