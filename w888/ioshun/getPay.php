<?
session_start();
require('../inc/conn.php');
require('../inc/function.php');
//include("../process/num_limit.php");  
$mid = $_GET["mid"];
$arr = array();
$i=0;

$sql             = "select * from bom_tb_member where m_id='$mid'";
$re_m            = sql_array($sql);

$url_file="../json/config/member/LottoConfig_".$mid.".json";	
$lot6_js=file_get_contents2($url_file);
$lot_m = json_decode2($lot6_js, true);

$empay=@explode(',',$lot_m['m_lotto_hun_pay_member']); 
 $emdis=@explode(',',$lot_m['m_lotto_hun_dis_member']); 

  for($x=1;$x<=count($lot_type["th"]);$x++){?>
  <? 
	  if($empay[$x]>0){
  	$arr[$i]["lotType"] = $lot_type["th"][$x];
  	$arr[$i]["lotPay"] = $empay[$x];
  	$arr[$i]["lotDis"] = $emdis[$x];

  	 $i++; } }


echo json_encode($arr);
?>