<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../../inc/conn.php');
require('../../inc/function.php');
require('../../lang/variable_lang.php');
// require("../../lang/member_lang.php");
require("../../lang/function_array.php");
// require("/home/ohoking/domains/ohoking.com/public_html/admin_lang/export/lang_member_".$_SESSION['lang'].".php");

if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}

  header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header ("Pragma: no-cache"); // HTTP/1.0
  header("content-type: application/x-javascript; charset=utf-8");
  

	  
$sql="select * from bom_tb_config where con_id=1";
$rec=sql_array($sql);
$bet_close=$rec['con_open_games'];

if($bet_close==0){
	echo $lang_game[62];
	exit();
	}
	

$bet_time=$rec['con_time_games'];
$new_time=(90)-($time_stam-$bet_time);



//echo $new_time;
if($new_time<=0){
	echo $lang_game[63];
	}else{
	echo $new_time;	
}

?>