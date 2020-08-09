<?php
  require('inc_head_bySession.php');

  $arr["list"][0] = array(
    "number"        =>  1,
    "time"          =>  "2019-04-30 10:51:50",
    "user"          =>  "OHO",
    "category"      =>  "credit",
    "credit_before" =>  "0.00",
    "lose_before"   =>  "0.00",
    "stale_before"  =>  "0.00",
    "credit_after"  =>  "40000.00",
    "lose_after"    =>  "0.00",
    "stale_after"   =>  "0.00",
    "change"        =>  "40000.00",
    "by"            =>  "OHO",
    "total"         =>  number_format(40000,2),
  );

  $arr["list"][1] = array(
    "number"        =>  1,
    "time"          =>  "2019-04-30 10:51:50",
    "user"          =>  "OHO2",
    "category"      =>  "credit",
    "credit_before" =>  "0.00",
    "lose_before"   =>  "0.00",
    "stale_before"  =>  "0.00",
    "credit_after"  =>  "40000.00",
    "lose_after"    =>  "0.00",
    "stale_after"   =>  "0.00",
    "change"        =>  "40000.00",
    "by"            =>  "OHO",
    "total"         =>  number_format(40000,2),
  ); 

  $sdate = $_POST["sdate"];
  $edate = $_POST["edate"];
  $num_row = 2;  //จำนวนแถวทั้งหมดที่มี query  ใน database 
  $rowPerPage = intval($_POST["rowPerPage"]);
  $page       = intval($_POST["this_page"]);
  $start      = ($page-1)*$rowPerPage;

  $pagi_data["numrow"] =  $num_row;
  $pagi_data["rowPerPage"] =  $rowPerPage;
  $pagi_data["total_page"] = ceil($num_row/$rowPerPage); 
  $pagi_data["active_page"] = $page;
  $pagi_data["start_page"]  = $start; 

  $data = [];
  $data["head"]= $lang_credit_history[6]." {$_POST['sdate']} - {$_POST['edate']}";
  $data["list"][]=$arr["list"][$start];  // query ใน database โดยให้ LIMIT {$start} , {$rowPerPage}

  $data["footers"] = array(
    // 'f_quantity' => 2,
    'change' => number_format(40000,2),
  );

  $data["pagi_data"]=$pagi_data;
  $data["sdate"] = $sdate;
  $data["edate"] = $edate;

  echo json_encode($data);

?>