<?php
  require('inc_head.php');

  for ($i=0; $i <= 20; $i++)
  { 
    $data["val"][] = array(
      "number" => "123 : [".$lotHun_typeArry[$_POST["lottype"]]."]",
      "user" => "aaaa03",
      "r1" => "50.00",
      "r2" => "-17.50",
      "sum" => "32.50",
      "r3" => "0.00",
      "total" => _cbn(32.50,2),
    ); 
  }
  $data["lottype"] = $lotHun_typeArry[$_POST["lottype"]];

  echo json_encode($data);
?>