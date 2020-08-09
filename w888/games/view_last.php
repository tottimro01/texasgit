<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
  header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header ("Pragma: no-cache"); // HTTP/1.0
  


if($_SESSION['m_id']==""){exit();}
require('../inc/conn.php');
require('../inc/function.php');


 // if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}
  
// require("../lang/member_lang.php");
require('../lang/variable_lang.php');
require("../lang/function_array.php");
// require("/home/ohoking/domains/ohoking.com/public_html/admin_lang/export/lang_member_".$_SESSION['lang'].".php");

require('function.php');
#echo "555";
$sql="select * from bom_tb_config where con_id=1";
$rec=sql_array($sql);

$bet_id=$rec['con_id_games'];

?>

<link rel="stylesheet" type="text/css" href="css/style.css?v=<?=$cache_css;?>">
<link rel="stylesheet" type="text/css" href="css/style3.css?v=<?=$cache_css;?>">
<style type="text/css">
  /*
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

.tr_lot:nth-child(even) {
  background: #fff7d9;
}
.tr_lot:nth-child(odd) {
  background: white;
}*/
</style>
<div id="div2">
<table width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>
    <td height="25" align="center" colspan="3" class="bg_table" style="border: 0!important;"><span id="s_type"><strong class="cw">Bet ID : <?=$bet_id;?></strong></span></td>  
  </tr>
<tr class="tb_title_lotto cw">
    <td width="41%" align="center" ><?=$lang_member[299];?></td>
    <td width="35%" align="center"><?=$lang_member[300];?></td>
    <td width="24%" align="center"><?=$lang_member[301];?></td>
  </tr>
<?
$sql="select * from bom_tb_games_bill_play_live where m_id='$_SESSION[m_id]' and bet_id='$bet_id'  order by play_id desc limit 100";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
	
	
?>

<? if($rs['game_zone']==1){?>
<tr class="tr_lot">
    <td align="center"><img src="img/2hit/30/<?=$rs["play_bet"]?>.png" height="22"></td>
    <td align="center"><?=number_format($rs['b_total']);?></td>
    <td align="center"><?=$games_type[$rs['play_status']];?></td>
  </tr>
  
  <? }elseif($rs['game_zone']==2){?>
  
<tr class="tr_lot">
    <td align="center">
      <img src="img/dragon/22/<?=$rs["play_bet"]?>.png?v=1" height="22">
</td>
    <td align="center"><?=number_format($rs['b_total']);?></td>
    <td align="center"><?=$games_type[$rs['play_status']];?></td>
  </tr>
  
    <? }elseif($rs['game_zone']==3){?>  
    <tr class="tr_lot">
    <td align="center" ><img src="img/bacarat/b<?=$rs['play_bet'];?>.png" height="22"></td>
    <td align="center"><?=number_format($rs['b_total']);?></td>
    <td align="center"><?=$games_type[$rs['play_status']];?></td>
  </tr>
      <? }elseif($rs['game_zone']==4){
	$ex=explode("," , $rs["play_bet"]);
		  ?>
<tr class="tr_lot">
    <td align="center"><? foreach ($ex as &$value) { ?><img src="img/hilo/25/hilo<?=$value?>.png" height="22"><? } ?></td>
    <td align="center"><?=number_format($rs['b_total']);?></td>
    <td align="center"><?=$games_type[$rs['play_status']];?></td>
  </tr>
        <? }elseif($rs['game_zone']==5){
			 $ex=explode("," , $rs["play_bet"]);
			?>
<tr class="tr_lot">
    <td align="center"><? foreach ($ex as &$value) { ?><img src="img/fish/25/<?=$value?>.png" height="22"><? } ?></td>
    <td align="center"><?=number_format($rs['b_total']);?></td>
    <td align="center"><?=$games_type[$rs['play_status']];?></td>
  </tr>
  <? }?>
  
  
  <? }?>
</table>
</div>
