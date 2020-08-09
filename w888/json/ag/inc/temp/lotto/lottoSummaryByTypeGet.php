<?php
  require('inc_head_bySession.php');

  $data["val"] = [];
  for ($i=0; $i <= 20; $i++)
  { 
    $data["val"][] = array(
      "number" => "123 : [".$lot_typeArry[$_POST["type"]]."]",
      "user" => "aaaa02",
      "r1" => "50.00",
      "r2" => "-17.50",
      "sum" => "32.50",
      "r3" => "0.00",
      "total" => _cbn(32.50,2),
    ); 
  }
  $data["type"] = $lot_typeArry[$_POST["type"]];

  echo json_encode($data);
?>