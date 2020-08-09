<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
require('inc_head_bySession.php');



//$lot_show


$array_item = array();
if(isset($_POST["type"]))
{
      $sql = "SELECT * FROM `bom_tb_nothit` WHERE 1 and `lot_zone`  = 1 ORDER BY `nothit_num` ASC ";
      $re = sql_query($sql);
      $c =0;
      while ($rs = sql_fetch_as($re)) {
        $s_status = "";
        if($rs["s_sum"] == 0)
          
          $array_item["list"][] = array(
            'nothit_num' => _dt($rs["nothit_num"]) , 
            '_nothit_num' => $rs["nothit_num"] , 
            'lot_type' => $lot_typeArry[$rs["lot_type"]], 
            '_lot_type' => $rs["lot_type"], 
          );
      }

}



if(count($array_item["list"]) == 0)
{
  $array_item["list"] = "";
}

$array_item["lot_show"] = $lot_show;
$array_item["lot_typeArry"] = $lot_typeArry;
$array_item["another_key"] = $another_key;
$array_item["sql"] = $sql;

echo json_encode($array_item);


 ?>