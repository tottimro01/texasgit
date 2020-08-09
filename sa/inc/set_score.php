<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

if($_SESSION["AGlang"]=="")
{
	$_SESSION["AGlang"]="th";
}

require('ag_function.php');
require('conn.php');
require('function.php');
require('../lang/sa_lang.php');
require('../../lang/function_array.php');


$type = sql_escape_str($_POST["type"]);
$id = sql_escape_str($_POST["id"]);
$val =  sql_escape_str($_POST["val"]);


if($type == 1)
{
	$set = "b_score_half = '$val'";
}else if($type == 2)
{
	$set = "b_score_full = '$val'";
}else{
	$array_item = array(
		'msg' => "ผิดพลาด", 
		'status' => false, 
		'error_type' => 2, 
	);

	echo json_encode($array_item);
	exit();
}

$sql = "update bom_tb_ball_list set $set  where b_id = '$id' ";

$rs = sql_query_sp($sql);

if($rs)
{
	$array_item = array(
		'msg' => "สำเร็จ", 
		'status' => true, 
		'error_type' => 1, 
	);
}else{
	$array_item = array(
		'msg' => "ผิดพลาด", 
		'status' => false, 
		'error_type' => 2, 
	);
}
echo json_encode($array_item);

?>