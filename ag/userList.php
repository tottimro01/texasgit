<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>

<?php 

  if($_SESSION["AGlang"]==""){
      $_SESSION["AGlang"]="th";
  }


  require('lang/ag_lang.php');

  include "inc/function.php";

  $page = ($_GET["page"] == "") ? 1 : $_GET["page"];

  $postdata = http_build_query(
        array(
          'session' => $_SESSION,
          'fuser' => $_GET[fuser],
          'page' => $page,
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

$temp = file_get_contents($main_url.'/inc/temp/userList_temp.php', false, $context);


$data = array();
$data = array(
    'title' => $lang_ag[72],//"สมาชิกและการตั้งค่า",
    'sub_title' =>  $lang_ag[82],//"รายชื่อสมาชิก",
    'temp' => $temp,
    '_SESSION' => $_SESSION,
);


echo json_encode($data);


 ?>