<?
header("Access-Control-Allow-Origin: *");


require('../inc/conn.php');
require('../inc/function.php');

$arr_return = array();

$arr_return["match"] = $_POST["match"];
$arr_return["price"] = $_POST["price"];
$arr_return["league"] = $_POST["league"];


$sql="update bom_tb_ball_list set b_hdc_1 = 55 where b_id = 31580893";
sql_query_sp($sql);

//echo json_encode($arr_return);
?>