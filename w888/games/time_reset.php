<?php
require('../inc/conn.php');
require('../inc/function.php');


  header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header ("Pragma: no-cache"); // HTTP/1.0
  header("content-type: application/x-javascript; charset=utf-8");
  
$sql="update bom_tb_config set con_time_games='$time_stam' where con_id=1";
sql_query($sql);

?>