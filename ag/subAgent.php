<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
if($_SESSION["uu_id"]==1 ){@header('Location: main.php?p=logout');exit();}

if($_SESSION["AGlang"]==""){
      $_SESSION["AGlang"]="th";
  }
require('lang/ag_lang.php');  
include "inc/function.php";

$postdata = http_build_query(
      array(
        'session' => $_SESSION,
        'thisPage' => $_GET[page],    
      )
);

  $opts = array('http' =>
    array(
      'method'  => 'POST',
      'header'  => 'Content-type: application/x-www-form-urlencoded',
      'content' => $postdata,
    ),
  );

  $context  = stream_context_create($opts);

$temp = file_get_contents($main_url.'/inc/temp/subAgent_temp.php', false, $context);


$data = array();
$data = array(
    'title' => $lang_ag[72],//"สมาชิกและการตั้งค่า",
    'sub_title' => $lang_ag[101],//เอเย่นต์สำรอง
    'temp' => $temp,
);


echo json_encode($data);


 ?>