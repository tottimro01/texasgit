<?
	session_start();
	header("Content-type: application/json");

	require_once '../inc/lang.php';
    require_once '../inc/rsc.php';
    require_once '../inc/function.php';
    require_once '../inc/conn.php';

    require_once '../inc/function_array.php';
    require_once '../inc/variable_lang.php';

	$mid = $_SESSION["m_id"];
	// $zone=$_SESSION['zone_hun'];
	// $rob=$_SESSION['rob_hun'];
	$type = $_GET['result_type'];

	if($type == 'date'){

		$date = $_GET['date'];

		$arr_ok = array();
		$sql_arr=sql_query("select * from bom_tb_lotto_ok  where lot_zone<>1 and ok_date='$date'");
		while($rs_arr=sql_fetch($sql_arr)){
			$arr_ok[$rs_arr[lot_zone]][$rs_arr[lot_rob]] = $rs_arr;
		}
		
		$arr = array();
		
		$rs=sql_array("select * from bom_tb_lotto_ok where ok_date = '$date' and lot_zone = 1 order by ok_id desc limit 1");
		if($rs["ok_id"]==""){
			$rs=sql_array("select * from bom_tb_lotto_ok where lot_zone = 1 order by ok_id desc limit 1");
		}
		
		$i=0;
		$y=0;
		$zone_i = 1;
		$arr[$i]["name"] = $lang_g['lotZone'][$zone_i];
		$arr[$i]["zone"] = 1;
		$arr[$i]["date"] = _cvf($rs["o_limit_time"] , 3 ,$lang_post);
		$enum=explode(',',$rs[o_number]);
		$arr[$i]["data"][$y]["num1"] = ($enum[0] == "") ? $ball_billb[5] : $enum[0];
		$arr[$i]["data"][$y]["num2"] = ($enum[1] == "") ? $ball_billb[5] : $enum[1];
		$arr[$i]["data"][$y]["num3_1"] = ($enum[2] == "") ? $ball_billb[5] : $enum[2];
		$arr[$i]["data"][$y]["num3_2"] = ($enum[3] == "") ? $ball_billb[5] : $enum[3];
		$arr[$i]["data"][$y]["num3_3"] = ($enum[4] == "") ? $ball_billb[5] : $enum[4];
		$arr[$i]["data"][$y]["num3_4"] = ($enum[5] == "") ? $ball_billb[5] : $enum[5];
		$arr[$i]["data"][$y]["wait"] = ($enum[0] == "") ? true : false;
		
		$i=1;
		$zone_i = 2;
		$arr[$i]["name"] = $lang_g['lotZone'][$zone_i];
		$arr[$i]["zone"] = 2;
		$arr[$i]["date"] = _cvf(strtotime($date) , 3 ,$lang_post);
		$y=0;
		for($rob_i=1;$rob_i<=$lot_zone_bet[$zone_i];$rob_i++){ 
			$rs =  $arr_ok[$zone_i][$rob_i]; 
			$enum=explode(',',$rs[o_number]);
			
			$arr[$i]["data"][$y]["rob"] = $lang_g['lotZone'][$zone_i].$lot_rob[$rob_i];
			$arr[$i]["data"][$y]["num3"] = ($enum[0] == "") ? $ball_billb[5] : $enum[0];
			$arr[$i]["data"][$y]["num2"] = ($enum[1] == "") ? $ball_billb[5] : $enum[1];
			$arr[$i]["data"][$y]["wait"] = ($enum[0] == "") ? true : false;
			$y++;
		}
		
		
		$i=2;
		
		$arr[$i]["name"] = $lang_g['_lotZone'][3];
		$arr[$i]["zone"] = 3;
		$arr[$i]["date"] = _cvf(strtotime($date) , 3 ,$lang_post);
		$y=0;
		for($zone_i=3;$zone_i<=17;$zone_i++){  
			if($lot_zone_bet[$zone_i]<=1){
				$rob_i=1;
				$rs =  $arr_ok[$zone_i][$rob_i]; 
				$enum=explode(',',$rs[o_number]);
				
				$arr[$i]["data"][$y]["rob"] = $lang_g['lotZone'][$zone_i];
				$arr[$i]["data"][$y]["num3"] = ($enum[0] == "") ? $ball_billb[5] : $enum[0];
				$arr[$i]["data"][$y]["num2"] = ($enum[1] == "") ? $ball_billb[5] : $enum[1];
				$arr[$i]["data"][$y]["wait"] = ($enum[0] == "") ? true : false;
				$y++;
			}else{
				for($rob_i=1;$rob_i<=$lot_zone_bet[$zone_i];$rob_i++){ 
					$rs =  $arr_ok[$zone_i][$rob_i]; 
					$enum=explode(',',$rs[o_number]);
		
					$arr[$i]["data"][$y]["rob"] = $lang_g['lotZone'][$zone_i].$lot_rob[$rob_i];
					$arr[$i]["data"][$y]["num3"] = ($enum[0] == "") ? $ball_billb[5] : $enum[0];
					$arr[$i]["data"][$y]["num2"] = ($enum[1] == "") ? $ball_billb[5] : $enum[1];
					$arr[$i]["data"][$y]["wait"] = ($enum[0] == "") ? true : false;
					$y++;
				}
			}
		}
		
		
		$i=3;
		$zone_i = 19;
		$arr[$i]["name"] = $lang_g['lotZone'][$zone_i];
		$arr[$i]["zone"] = 19;
		$arr[$i]["date"] = _cvf(strtotime($date) , 3 ,$lang_post);
		$y=0;
		for($rob_i=1;$rob_i<=$lot_zone_bet[$zone_i];$rob_i++){ 
			$rs =  $arr_ok[$zone_i][$rob_i]; 
			$enum=explode(',',$rs[o_number]);
			
			$arr[$i]["data"][$y]["rob"] = $lang_g['lotZone'][$zone_i]." ".$lang_m[40]." ".$lot_robmun[$rob_i];
			$arr[$i]["data"][$y]["num3"] = ($enum[0] == "") ? $ball_billb[5] : $enum[0];
			$arr[$i]["data"][$y]["num2"] = ($enum[1] == "") ? $ball_billb[5] : $enum[1];
			$arr[$i]["data"][$y]["wait"] = ($enum[0] == "") ? true : false;
			$y++;
		}
		
		
		$i=4;
		$zone_i = 18;
		$arr[$i]["name"] = $lang_g['lotZone'][$zone_i];
		$arr[$i]["zone"] = 18;
		$arr[$i]["date"] = _cvf(strtotime($date) , 3 ,$lang_post);
		$y=0;
		for($rob_i=1;$rob_i<=$lot_zone_bet[$zone_i];$rob_i++){ 
			$rs =  $arr_ok[$zone_i][$rob_i]; 
			$enum=explode(',',$rs[o_number]);
			
			$arr[$i]["data"][$y]["rob"] = $lang_g['lotZone'][$zone_i]." ".$lang_g['_rob']." ".$rob_i;
			$arr[$i]["data"][$y]["num3"] = ($enum[0] == "") ? $ball_billb[5] : $enum[0];
			$arr[$i]["data"][$y]["num2"] = ($enum[1] == "") ? $ball_billb[5] : $enum[1];
			$arr[$i]["data"][$y]["wait"] = ($enum[0] == "") ? true : false;
			$y++;
		}

	
		echo json_encode($arr);
		exit();

	}else{
$arr = array();
		$zr = $_GET['zone'];
		list($zone, $rob) = explode("_", $zr);
		
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
				$arr[$i]["num1"] = ($ex[0] == "") ? $ball_billb[5] : $ex[0];
				$arr[$i]["num2"] = ($ex[1] == "") ? $ball_billb[5] : $ex[1];
				$arr[$i]["num3_1"] = ($ex[2] == "") ? $ball_billb[5] : $ex[2];
				$arr[$i]["num3_2"] = ($ex[3] == "") ? $ball_billb[5] : $ex[3];
				$arr[$i]["num3_3"] = ($ex[4] == "") ? $ball_billb[5] : $ex[4];
				$arr[$i]["num3_4"] = ($ex[5] == "") ? $ball_billb[5] : $ex[5];
				$arr[$i]["wait"] = ($ex[0] == "") ? true : false;
			}else{
				$arr[$i]["num3"] = ($ex[0] == "") ? $ball_billb[5] : $ex[0];
				$arr[$i]["num2"] = ($ex[1] == "") ? $ball_billb[5] : $ex[1];
				$arr[$i]["wait"] = ($ex[0] == "") ? true : false;
			}
			
			$i++;
		}
		
		echo json_encode($arr);
		exit();

	}
	
?>