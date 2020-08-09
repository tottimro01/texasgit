<?
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);
require('../../inc/conn.php');
require('../../inc/function.php');

$lang_post           = trim($_GET["lang"]);
if($lang_post==""){
	$lang_post = "th";
}
$_SESSION['lang'] = $lang_post;
// require("../../lang/member_lang.php");
require("../../lang/variable_lang.php");
require("../../lang/function_array.php");
	//$rs_date=sql_array("select * from bom_tb_lotto_ok where lot_zone = 1 group by ok_date order by o_limit_time desc limit 1");
	
	$arr["ListLot"] = array();
	$zi = 0;
	foreach($arr_zone as $zkey => $zvalue){
		$nz = $lot_zone_bet[$zkey];
		if($nz<=1){
			$arr["ListLot"][$zi]["z_name"] = $lang_g['lotZone'][$zkey];
			$arr["ListLot"][$zi]["z_zone"] = $zkey;
			$arr["ListLot"][$zi]["z_rob"] = 1;
			$zi++;
		}else{
			for($zr=1;$zr<=$nz;$zr++){
				if($zkey==18){
					$arr["ListLot"][$zi]["z_name"] = $lang_g['lotZone'][$zkey]." ".$lang_member[688]." ".$zr;
				}else if($zkey==19){
					$arr["ListLot"][$zi]["z_name"] = $lang_g['lotZone'][$zkey]." ".$lang_member[643]." ".$lot_robmun[$zr];
				}else{
					$arr["ListLot"][$zi]["z_name"] = $lang_g['lotZone'][$zkey].$lot_rob[$zr];
				}
				$arr["ListLot"][$zi]["z_zone"] = $zkey;
				$arr["ListLot"][$zi]["z_rob"] = $zr;
				$zi++;
			}
		}
	}
	
	$arr["Status"] = "1";
	$arr["Licen"] = "SC";
	

	echo json_encode($arr);
	exit();
?>