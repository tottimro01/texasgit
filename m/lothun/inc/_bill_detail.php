<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
include "../../../inc/conn.php";
// require("../../../lang/th.php");
require('../../../inc/function.php');
$arr["data"] = array();
$bid = $_GET["bid"];


  $sql=sql_query("select * from bom_tb_lotto_hun_bill_play where bill_id='$bid' and  m_id='$_SESSION[mid]' order by lot_type asc, play_number asc");
  $i=1;
  while($rs_bill=sql_fetch($sql)){
     $ex_loti = explode("," , $rs_bill["lot_i"]);
    foreach ($ex_loti as &$value) {
      $value = substr($value , 1);
      if($value==""){
        continue;
      }
    $arr["data"][] = array("i".$value,$lot_type["th"][$rs_bill[lot_type]],_dt($rs_bill[play_number]),number_format(-$rs_bill[b_total]));
    $i++;
  }
}
  echo json_encode($arr);


?>