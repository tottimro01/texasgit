<?php 

$optionPage[page] = "1";
$optionPage[listCount] = 0;

$data = [];
$data = array(
    'list' => " ",
    'status' => true,
    'optionPage' => $optionPage
);


echo json_encode($data);


 ?>