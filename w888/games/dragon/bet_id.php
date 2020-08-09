<?php
require('../../inc/conn.php');
require('../../inc/function.php');
if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}

  header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header ("Pragma: no-cache"); // HTTP/1.0
  header("content-type: application/x-javascript; charset=utf-8");

$sql="select * from bom_tb_config where con_id=1";
$rec=sql_array($sql);
$bet_id=$rec['con_id_games'];
echo $bet_id;
?>