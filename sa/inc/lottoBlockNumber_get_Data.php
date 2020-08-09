<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
require('inc_head_bySession.php');



//$lot_show


$array_item = array();
if(isset($_POST["type"]))
{
  if($_POST["type"]!= "another")
  {
      $q_type = "and `lot_type` = $_POST[type]";
  }else{

    $another_key = array();

    foreach ($lot_typeArry as $key => $value) {
      if (!in_array($key, $lot_show)) {
        $another_key[] = $key;
      }
    }    

    $q_type = "and `lot_type` IN ( '" . implode( "', '" , $another_key ) . "' )"; 
       

  }
  
      $sql = "SELECT * FROM `bom_tb_1_sa` WHERE 1 $q_type ORDER BY `s_sum` ASC , `play_number` ASC ";
      $re = sql_query_lot($sql);
      $c =0;
      while ($rs = sql_fetch_as($re)) {
        $s_status = "";
        if($rs["s_sum"] == 0)
          {
            $s_status = "<span class=\"label label-danger\"> ปิดรับ </span>";
          } 
          $array_item["list"][] = array(
            'play_number' => _dt($rs["play_number"]) , 
            '_play_number' => $rs["play_number"] , 
            'lot_type' => $lot_typeArry[$rs["lot_type"]], 
            '_lot_type' => $rs["lot_type"], 
            's_sum' =>  number_format( $rs["s_sum"]) , 
            's_status' => $s_status , 
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