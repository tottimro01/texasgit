<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
include "../../../inc/conn.php";
require("../../../lang/th.php");
require('../../../inc/function.php');

$bid = $_GET["bid"];
?>
{
  "data": [
  <? 
  $sql=sql_query("select * from bom_tb_lotto_bill_play where bill_id='$bid' and  m_id='$_SESSION[mid]' order by lot_type asc, play_number asc");
  $n = sql_num("select * from bom_tb_lotto_bill_play where bill_id='$bid' and  m_id='$_SESSION[mid]'");
  $i=1;
  while($rs_bill=sql_fetch($sql)){ 
  ?>
    [
       "<?=$lot_type["th"][$rs_bill[lot_type]]?>",
       "<?=_dt($rs_bill[play_number])?>",
       "<?=number_format(-$rs_bill[b_total])?>"
    ]<? if($i<$n){ ?>,<? } ?>
    <? $i++; } ?>
  ]
}