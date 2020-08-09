<?
/*
$url_file9=$json_file_main."json/lotto_hun/result_moon.json";		
//$url_file9="http://json.lotto17.us/lotto_hun/result.json";		
$d_bet=file_get_contents2($url_file9);
$k_bet = json_decode2($d_bet, true);
#print_r($k_bet);
*/

?>

<table width="50%" border="0" cellpadding="0" cellspacing="1" class="txt_back11n bg_table">
  <tbody>
  <tr align="center" class="tb_title_lotto">
    <td width="32%"><?=$lang_member[146];?></td>
    <td width="28%"><?=$lang_member[643];?></td>
      <td height="25" colspan="2"><?=$lang_member[683];?></td>
    </tr>
    <tr align="center" class="tb_title_lotto">
      <td width="32%">&nbsp;</td>
      <td width="28%">&nbsp;</td>
      <td width="20%"><?=$lang_member[385];?></td>
      <td width="20%" height="25"><?=$lang_member[390];?></td>
    </tr>

    
    <? 
	foreach($k_bet  as $bingo){
		$ed=@explode(',',$bingo['lot_i']);
	?>
  <tr class="tr_lot">
    <td height="10" align="center" style="padding:5px;" rowspan="<?=count($lot_robmun)+1;?>" bgcolor="#ffffff"><b><?=$bingo['ok_date']?></b></td>
  </tr>
  <? $ipt = 0; 
    for($io=1;$io<=count($lot_robmun);$io++){ ?>
    <tr class="tr_lot tr_lotx">
    <td align="center" class="subtitle2"><b class="cbu"><?=$lot_robmun[$io]?></b></td>
      <td align="center" class="subtitle2"><?=$bingo['num_r'.($ipt+1)]?></td>
      <td align="center" class="subtitle2" bgcolor="#ccc"><?=substr($bingo['num_r'.($ipt+1)], -2);?></td>

    </tr>
    <? $ipt++;  } ?>
    <? } ?>
  </tbody>
</table>
