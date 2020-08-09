<?
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);
	require('../inc/conn.php');
require('../inc/function.php');

$lang_post           = trim($_GET["lang"]);
if($lang_post==""){
	$lang_post = "th";
}
$_SESSION['lang'] = $lang_post;
// require("../../lang/member_lang.php");
require("../lang/variable_lang.php");
require("../lang/function_array.php");

	$zone = $_GET["zone"];
	$rob = $_GET["rob"];
	$arr = array();

	$nz = $lot_zone_bet[$zone];

	$i=0;
	$sql=sql_query("select * from bom_tb_lotto_ok where lot_zone = '$zone' and lot_rob = '$rob' order by ok_id desc limit 20");
	while($rs=sql_fetch($sql)){
		$ex = explode("," , $rs["o_number"]);
		if($zone==18){
			$arr[$i]["name"] = $lang_g['lotZone'][$zone]." รอบที่ ".$rob;
		}else if($zone==19){
			$arr[$i]["name"] = $lang_g['lotZone'][$zone]." รอบ ".$lot_robmun[$rob];
		}else{
			if($nz<=1){
				$arr[$i]["name"] = $lang_g['lotZone'][$zone];
			}else{
				$arr[$i]["name"] = $lang_g['lotZone'][$zone].$lot_rob[$rob];
			}
		}
		
		$arr[$i]["date"] = _cvf($rs["o_limit_time"] , 3 ,$lang_post);
		
		$arr[$i]["zone"] = $zone;
		$arr[$i]["rob"] = $rob;
		
		if($zone==1){
			$arr[$i]["num1"] = ($ex[0] == "") ? "รอผล" : $ex[0];
			$arr[$i]["num2"] = ($ex[1] == "") ? "รอผล" : $ex[1];
			$arr[$i]["num3_1"] = ($ex[2] == "") ? "รอผล" : $ex[2];
			$arr[$i]["num3_2"] = ($ex[3] == "") ? "รอผล" : $ex[3];
			$arr[$i]["num3_3"] = ($ex[4] == "") ? "รอผล" : $ex[4];
			$arr[$i]["num3_4"] = ($ex[5] == "") ? "รอผล" : $ex[5];
		}else{
			$arr[$i]["num3"] = ($ex[0] == "") ? "รอผล" : $ex[0];
			$arr[$i]["num2"] = ($ex[1] == "") ? "รอผล" : $ex[1];
		}
		
		$i++;
	}
	
	/*$arr["N1"] = ($ex[0] == "") ? "" : $ex[0];
	$arr["N2"] = ($ex[1] == "") ? "" : $ex[1];
	$arr["N3_1"] = ($ex[2] == "") ? "" : $ex[2];
	$arr["N3_2"] = ($ex[3] == "") ? "" : $ex[3];
	$arr["N3_3"] = ($ex[4] == "") ? "" : $ex[4];
	$arr["N3_4"] = ($ex[5] == "") ? "" : $ex[5];*/
	
	echo json_encode($arr);
	exit();
?>