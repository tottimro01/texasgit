<?php 

$optionPage[page] = "1";
$optionPage[listCount] = 0;

$data = array();
$data = array(
    'list' => " ",
    'status' => true,
    'optionPage' => $optionPage
);


echo json_encode($data);


 ?>