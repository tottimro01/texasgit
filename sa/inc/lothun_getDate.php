<?php 
include "inc_head_bySession.php";

if($_GET[zone]!=""){ $kzone="  and lot_zone='$_GET[zone]' ";}else{ $kzone="  and lot_zone='2' "; }
if($_GET[rob]!=""){ $krob="  and lot_rob='$_GET[rob]' ";}else{ $krob="  and lot_rob='1' "; }

$re=sql_query("select * from bom_tb_lotto_ok where 1  $kzone  $krob  order by  ok_id desc limit 12 ");
while($rs=sql_fetch($re)){
	?>
		<option value='<?=$rs["ok_date"]?>'  <? if($_GET[d]==$rs["ok_date"]){echo'selected';}?>><?=$rs["ok_date"]?></option>
	<?
   
   
} 

?>