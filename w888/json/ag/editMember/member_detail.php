<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
include "../inc/function.php";

if($_SESSION["AGlang"]==""){
    $_SESSION["AGlang"]="th";
}

require('../lang/ag_'.$_SESSION["AGlang"].'.php');

$postdata = http_build_query(
        array(
        'id' => $_GET[id],
        'futype' => $_GET[futype],
        'session' => $_SESSION,
        'page' => $_GET[page],
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

if($_GET[futype] == 'M')
{
  $sub_title = $lang_memberMember[53];//"แก้ไขสมาชิก";
  $temp = file_get_contents($main_url.'/inc/temp/member_detail_temp.php', false, $context);
}else{
  $sub_title = $lang_memberAgent[61];//"แก้ไขเอเย่น";
  $temp = file_get_contents($main_url.'/inc/temp/agent_detail_temp.php', false, $context);
}



$data = [];
$data = array(
    'title' => $lang_memberMember[1],//"สมาชิกและการตั้งค่า",
    'sub_title' =>  $sub_title,
    'temp' => $temp,
);


echo json_encode($data);


 ?>