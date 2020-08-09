<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
header('Content-Type: application/json');
require('function.php');
$ary='';


if($_POST['act'] == 1)  //get_bacarat_pay
{
	$ary = $arr_bacarat_pay;
}
if($_POST['act'] == 2) //get_hilo_pay
{
	$ary = $arr_hilo_pay;
}
if($_POST['act'] == 3) //get_fish_pay
{
	$ary = $arr_fish_pay;
}
if($_POST['act'] == 4) //get_color_pay
{
	$ary = $arr_color_pay;
}

if($_POST['act'] == 5) // get_dragon_pay
{
	$ary = $arr_dragon_pay;
}

// $url_file="../../json/config/member/LottoConfig_".$_SESSION[mid].".json";	
// $lot6_js=file_get_contents2($url_file);
// $lot_m = json_decode($lot6_js, true);

// $hdis=@explode(',',$lot_m['m_games_dis_member']); 
// $type_games=1;
// $paywinh=$arr_color_pay[$_POST["ok"]]+($hdis[$_POST['act']]/100); 

$hdis = 0;
$ary['hdis'] = $hdis;


echo json_encode($ary);

 ?>