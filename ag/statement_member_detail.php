<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

  if($_SESSION["AGlang"]==""){
      $_SESSION["AGlang"]="th";
  }

require('lang/ag_lang.php');
include "inc/function.php";

$postdata = http_build_query(
        array(
          'session' => $_SESSION,
          'id' => $_GET["id"],
          'sdate' => $_GET["sdate"],
          'edate' => $_GET["edate"],
        )
  );

$opts = array('http'  =>
    array(
        'method'  =>  'POST',
        'header'  =>  'Content-type: application/x-www-form-urlencoded',
        'content' =>  $postdata,
    ),
);

$context = stream_context_create($opts);
$temp = file_get_contents($main_url.'/inc/temp/statement_member_detail_temp.php', false, $context);
$data = array(
    'title'       =>    $lang_ag[108],//"รายงาน",
    'sub_title'   =>    $lang_ag[115],//"เคลื่อนไหวเครดิตรายวัน",
    'temp'        =>    $temp
);

echo json_encode($data);
?>