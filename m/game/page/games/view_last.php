<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
  header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header ("Pragma: no-cache"); // HTTP/1.0
  


if($_SESSION[mid]==""){exit();}
require('../../../../inc/conn.php');
require('../../../../inc/function.php');
require('function.php');

 // if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}
  
$url_file="json/bet_id.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_id=$date2_bet[0][id];

?>

<style type="text/css">
  
  .tb_title_lotto {
  background-image: linear-gradient(top, #d9a52e,  #8b691c);
  background-image: -moz-linear-gradient(top, #d9a52e, #8b691c);
  background-image: -webkit-linear-gradient(top, #d9a52e, #8b691c);
  background-image: -o-linear-gradient(top, #d9a52e, #8b691c);
  background-image: -ms-linear-gradient(top, #d9a52e, #8b691c);
  font-size: 12px;
    color: #fff;
    font-weight: bold;
    text-shadow: 1px 1px 1px #000;
}
.cw {
  color: #fff;
}
.tr_lot:nth-child(even) {
  background: #fff7d9;
}
.tr_lot:nth-child(odd) {
  background: white;
}
.bg_table {
    background: #8b691c;
     border-collapse:separate; border-spacing:1px;
     margin: auto;
}
.txt_back12n{
    font-size: 10px;
  }
  .bg_td {
    background: #f7e1af;
}
</style>
<table width="90%" border="0" cellspacing="1" cellpadding="3" class="bg_table">
<tr>
    <td height="25" align="center" colspan="3" class="txt_white12btitle"><span id="s_type"><strong class="cw">Bet ID : <?=$bet_id;?></strong></span></td>  
  </tr>
<tr class="tb_title_lotto">
    <td width="41%" align="center" >เลือก</td>
    <td width="35%" align="center">เดิมพัน</td>
    <td width="24%" align="center">สถานะ</td>
  </tr>
<?
$sql="select * from bom_tb_games_bill_play_live where m_id='$_SESSION[mid]' and bet_id='$bet_id'  order by play_id desc limit 100";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
	
	
?>

<? if($rs[game_zone]==1){?>
<tr class="tr_lot">
    <td align="center"><img src="img/2hit/<?=$rs["play_bet"]?>.png" height="22"></td>
    <td align="center"><?=number_format($rs[b_total]);?></td>
    <td align="center"><?=$games_type[$rs[play_status]];?></td>
  </tr>
  
  <? }elseif($rs[game_zone]==2){?>
  
<tr class="tr_lot">
    <td align="center">
      <img src="img/dragon/<?=$rs["play_bet"]?>.png?v=1" height="22">
</td>
    <td align="center"><?=number_format($rs[b_total]);?></td>
    <td align="center"><?=$games_type[$rs[play_status]];?></td>
  </tr>
  
    <? }elseif($rs[game_zone]==3){?>  
    <tr class="tr_lot">
    <td align="center" ><img src="img/bacarat/b<?=$rs[play_bet]?>.png" height="22"></td>
    <td align="center"><?=number_format($rs[b_total]);?></td>
    <td align="center"><?=$games_type[$rs[play_status]];?></td>
  </tr>
      <? }elseif($rs[game_zone]==4){
	$ex=explode("," , $rs["play_bet"]);
		  ?>
<tr class="tr_lot">
    <td align="center"><? foreach ($ex as &$value) { ?><img src="img/hilo/hilo<?=$value?>.png" height="22"><? } ?></td>
    <td align="center"><?=number_format($rs[b_total]);?></td>
    <td align="center"><?=$games_type[$rs[play_status]];?></td>
  </tr>
        <? }elseif($rs[game_zone]==5){
			 $ex=explode("," , $rs["play_bet"]);
			?>
<tr class="tr_lot">
    <td align="center"><? foreach ($ex as &$value) { ?><img src="img/fish/<?=$value?>.png" height="22"><? } ?></td>
    <td align="center"><?=number_format($rs[b_total]);?></td>
    <td align="center"><?=$games_type[$rs[play_status]];?></td>
  </tr>
  <? }?>
  
  
  <? }?>
</table>
