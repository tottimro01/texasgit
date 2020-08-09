<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
require('../inc/function.php');

$lot_pay=explode(",",'pay,550,250,110,70,70,3,4,1.95,1.95,1.95,1.95,1.95,10,20,10,550,250,70,3,110,8,8,8,10');
$lot_dis=explode(",",'dis,30,30,30,25,25,12,12,2,2,2,2,2,20,20,20,30,30,25,12,30,10,10,10,20');
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table width="0%" border="1" cellspacing="0" cellpadding="3">
  <tr>
    <td align="center">ประเภท</td>
    <td align="center">จ่าย</td>
    <td align="center">ลด</td>
  </tr>
  <? for($x=1;$x<=count($lot_type["th"]);$x++){?>
  <tr>
    <td align="center"><?=$lot_type["th"][$x];?></td>
    <td align="center"><?=$lot_pay[$x];?></td>
    <td align="center"><?=$lot_dis[$x];?></td>
  </tr>
  <? }?>
</table>
