<?php
  $data = array(
    "list"        =>  "<script type='text/javascript'>    $('.digits').digits();</script>",
    "status"      =>  true,
    "optionPage"  =>  $option = array("page" => "1", "listCount" => "0")
  );
  echo json_encode($data);