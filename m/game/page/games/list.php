<br><form action="" method="get">
<input name="tlot" type="hidden" value="<?=$_GET[tlot];?>" />
<input name="vvw" type="hidden" value="<?=$_GET[vvw];?>" />
<input name="p" type="hidden" value="<?=$_GET[p];?>" />
<input name="q" class="txtq2" id="q" value="<?=$_GET[q];?>"  type="text" >
<input type="submit" value="ค้นหา" class="bt">
</form>
<table width="100%" border="0" cellspacing="1" cellpadding="5" class="bg_table">
<tbody>
<tr class="tb_title_lotto">
  <td width="19%" align="center" height="25">วันที่-เวลา</td>
    <td width="13%" align="center" >Bet ID</td>
    <td width="13%" align="center" >Play ID</td>
    <td width="15%" align="center" >เกมส์</td>
    <td width="18%" align="center" >เลือก</td>
    <td width="12%" align="center">เดิมพัน</td>
    <td width="10%" align="center">สถานะ</td>
  </tr>
 <?
   if($_GET[q]!=""){
	  $qq=" and bet_id like '%$_GET[q]%' ";
	  }
	  
$re=sql_page(" bom_tb_games_bill_play where  m_id='$_SESSION[mid]' $qq   ","play_id","desc",50);
while($rs=sql_fetch($re[re])){
  ?>
 <? if($rs[game_zone]==1){?>
<tr class="tr_lot">
  <td align="center"><?=$rs[play_datenow];?></td>
    <td align="center"><?=$rs[bet_id];?></td>
      <td align="center"><?=$rs[play_id];?></td>
        <td align="center"><?=$game_zone[$rs[game_zone]];?></td>
        
    <td align="center"><img src="img/2hit/<?=$rs["play_bet"]?>.png" height="22"></td>
    <td align="center"><?=number_format($rs[b_total]);?></td>
    <td align="center"><?=$games_type[$rs[play_status]];?></td>
  </tr>
  
  <? }elseif($rs[game_zone]==2){?>
  
<tr class="tr_lot">
  <td align="center"><?=$rs[play_datenow];?></td>
    <td align="center"><?=$rs[bet_id];?></td>
      <td align="center"><?=$rs[play_id];?></td>
        <td align="center"><?=$game_zone[$rs[game_zone]];?></td>
        
    <td align="center">
      <img src="img/dragon/<?=$rs["play_bet"]?>.png?v=1" height="22">
</td>
    <td align="center"><?=number_format($rs[b_total]);?></td>
    <td align="center"><?=$games_type[$rs[play_status]];?></td>
  </tr>
  
    <? }elseif($rs[game_zone]==3){?>  
    <tr class="tr_lot">
      <td align="center"><?=$rs[play_datenow];?></td>
    <td align="center"><?=$rs[bet_id];?></td>
      <td align="center"><?=$rs[play_id];?></td>
        <td align="center"><?=$game_zone[$rs[game_zone]];?></td>
        
    <td align="center" ><img src="img/bacarat/b<?=$rs[play_bet]?>.png" height="22"></td>
    <td align="center"><?=number_format($rs[b_total]);?></td>
    <td align="center"><?=$games_type[$rs[play_status]];?></td>
  </tr>
      <? }elseif($rs[game_zone]==4){
	$ex=explode("," , $rs["play_bet"]);
		  ?>
<tr class="tr_lot">
  <td align="center"><?=$rs[play_datenow];?></td>
    <td align="center"><?=$rs[bet_id];?></td>
      <td align="center"><?=$rs[play_id];?></td>
        <td align="center"><?=$game_zone[$rs[game_zone]];?></td>
        
    <td align="center"><? foreach ($ex as &$value) { ?><img src="img/hilo/hilo<?=$value?>.png" height="22"><? } ?></td>
    <td align="center"><?=number_format($rs[b_total]);?></td>
    <td align="center"><?=$games_type[$rs[play_status]];?></td>
  </tr>
        <? }elseif($rs[game_zone]==5){
			 $ex=explode("," , $rs["play_bet"]);
			?>
<tr class="tr_lot">
  <td align="center"><?=$rs[play_datenow];?></td>
    <td align="center"><?=$rs[bet_id];?></td>
      <td align="center"><?=$rs[play_id];?></td>
        <td align="center"><?=$game_zone[$rs[game_zone]];?></td>
        
    <td align="center"><? foreach ($ex as &$value) { ?><img src="img/fish/<?=$value?>.png" height="22"><? } ?></td>
    <td align="center"><?=number_format($rs[b_total]);?></td>
    <td align="center"><?=$games_type[$rs[play_status]];?></td>
  </tr>
  <? }?>
  <? }?>
  
  </tbody></table>
   <p>   <?=_page("$_GET[tlot]&tlot=$_GET[tlot]&vvw=$_GET[vvw]",$re[page]);?></p>