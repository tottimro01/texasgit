<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
  header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header ("Pragma: no-cache"); // HTTP/1.0
  


if($_SESSION[mid]==""){exit();}
require('../inc/conn.php');
require('../game/function.php');

  //if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}
  
$url_file="json/bacarat_id.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_id=$date2_bet[0][id];

?>
    <?
    $sql="select * from bom_tb_dt_bill_play where m_id='$_SESSION[mid]' and bill_id='$bet_id'  order by play_id desc limit 100";
	$num=sql_num($sql);
	if($num>0){
	?>
    <link rel="stylesheet" type="text/css" href="css/style.css?v=0003">
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

.tr_lot:nth-child(even) {
  background: #fff7d9;
}
.tr_lot:nth-child(odd) {
  background: white;
}
</style>
<div id="div22" style="width: 185px; margin: auto;">
<table width="185" border="0" cellspacing="1" cellpadding="3" class="bg_table" >
<tr>
<td height="25" align="center" colspan="3" class="txt_white12btitle"><span id="s_type"><strong class="cw">ดราก้อน-ไทเกอร์</strong></span></td>  
  </tr>
<tr class="tb_title_lotto">
    <td width="41%" align="center">เลือก</td>
    <td width="35%" align="center">เดิมพัน</td>
    <td width="24%" align="center">สถานะ</td>
  </tr>
<?
$re=sql_query($sql);
while($rs=sql_fetch($re)){
  ?>
<tr class="tr_lot">
    <td align="center">
<? if($rs["play_bet"]!=3){ ?>
            <img src="img/dt/<?=$rs["play_bet"]?>.png" height="22">
            <? }else{ echo "เสมอ"; } ?></td>
    <td align="center"><?=number_format($rs[b_total]);?></td>
    <td align="center"><?=$ball_type2[$rs[play_status]];?></td>
  </tr>
  <? } ?>
</table>
</div>
  <? }?>  