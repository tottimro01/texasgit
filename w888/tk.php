<?
require('inc/conn.php');
require('inc/function.php');


$arr = array();
$i=0;
$sql_tk = sql_query_sp("select * from bom_tb_ball_tk order by tk_id asc");
while($rs_tk=sql_fetch($sql_tk)){
	$arr[$i]["bet"] = $rs_tk["tk_ar_bet"];
	$arr[$i]["tk"] = $rs_tk["tk_ar_tk"];
	$arr[$i]["ID"] = $rs_tk["tk_ar_ID"];
	$arr[$i]["Name"] = $rs_tk["tk_ar_Name"];
	$arr[$i]["Nick"] = $rs_tk["tk_ar_Nick"];
	$arr[$i]["Ags"] = $rs_tk["tk_ar_Ags"];
	$arr[$i]["SysT"] = $rs_tk["tk_ar_SysT"];
	$i++;
}

/*$arr[0]["bet"] = "HDP/OU/1X2";
$arr[0]["tk"] = "cfc3cff9-e7e3-4307-9dec-9ab7683346b2";
$arr[0]["ID"] = "28493381";
$arr[0]["Name"] = "KhmerGTB01605";
$arr[0]["Nick"] = "KhmerG$2sfullmoon";
$arr[0]["Ags"] = "21203946";
$arr[0]["SysT"] = "637006605826062445";

$arr[1]["bet"] = "OE";
$arr[1]["tk"] = "ee06779a-1654-4b61-a29c-3c22430dd3de";
$arr[1]["ID"] = "27552831";
$arr[1]["Name"] = "KhmerGTB01421";
$arr[1]["Nick"] = "KhmerG$2sbomload";
$arr[1]["Ags"] = "21203946";
$arr[1]["SysT"] = "637005812990960454";

$arr[2]["bet"] = "Muay Thai";
$arr[2]["tk"] = "0e671e04-d767-47b0-a3ac-77cbac9730dd";
$arr[2]["ID"] = "25878368";
$arr[2]["Name"] = "KhmerGTB01187";
$arr[2]["Nick"] = "KhmerG$2sperani";
$arr[2]["Ags"] = "21203946";
$arr[2]["SysT"] = "637006602626297618";*/

echo json_encode($arr);
?>