<?
/*
$url_file9="https://json.ohobet.com/lotto/result.json";		
$d_bet=file_get_contents2($url_file9);
$k_bet = json_decode2($d_bet, true);
*/


?>
<table width="100%" border="0" cellpadding="0" cellspacing="1" class="txt_back11n bg_table">
  <tbody>
    <tr align="center" class="tb_title_lotto">
      <td width="23%"><?=$lang_member[146];?></td>
      <td width="23%" height="25"><?=$lang_member[448];?></td>
      <td width="14%"><?=$lang_member[450];?></td>
      <td width="20%"><?=$lang_member[461];?></td>
      <td width="20%"><?=$lang_member[451];?></td>
    </tr>
    <? 
$zone=1;
$rob=1;
$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 16";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
		$ed=@explode(',',$rs['o_number']);
	?>
    <tr class="tr_lot">
      <td height="18" align="center" class="subtitle2" style="padding:5px;"><b><?=$rs['ok_date']?></b></td>
      <td align="center" class="subtitle2"><?=$ed[0]?></td>
      <td align="center" class="subtitle2"><?=$ed[1]?></td>
      <td align="center" class="subtitle2"><?=$ed[2]?> , <?=$ed[3]?></td>
      <td align="center" class="subtitle2"><?=$ed[4]?> , <?=$ed[5]?></td>
    </tr>
    <? } ?>
  </tbody>
</table>
<script>
  // console.log(<?=json_encode($k_bet);?>)
</script>