<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?

function _tor($val){
	if($val=="a"){
		return "2";	
	}else{
		return "1";	
	}
}

$txt_qq = trim($_POST["txt_qq"]);
$txt_qq = str_replace("<script type='text/javascript'>" , "" , $txt_qq);
$txt_qq = str_replace("</script>" , "" , $txt_qq);
$ex_qq = @explode("]],[[" , $txt_qq);
//print_r($ex_qq);
//echo $ex_qq[2];
$ex_1 = @explode("[[[" , $ex_qq[0]);
$ex_1_1 = @explode("],[" , $ex_1[1]);
//print_r($ex_1_1);
$arr_league = array();
foreach ($ex_1_1 as &$value) {
    $values = @explode("," , $value);
	$arr_league[$values[0]] = $values[1];	
}
//print_r($arr_league);
$ex_2 = @explode("],[" , $ex_qq[1]);
$arr_team = array();
foreach ($ex_2 as &$value) {
    $values = @explode("," , $value);
	$values[] = "League";
	$values[] = $arr_league[$values[2]];
	$arr_team[$values[0]] = $values;	
}
//print_r($arr_team);
$ex3 = @explode(",[[" , $ex_qq[2]);
//echo $ex3[1];
$ex3_1 = @explode("],[" , $ex3[0]);
$arr_main = array();
foreach ($ex3_1 as &$value) {
    $values = @explode("," , $value);
	$result = array_merge($values, $arr_team[$values[1]]);
	$arr_main[$values[0]] = $result;	
	
	/*print_r($values);
	echo "<br>";
	print_r($arr_team[$values[1]]);
	echo "<br>";
	//print_r($arr_team[$values[1]]);
	break;*/
}


$ex3_2 = @explode("]],[" , $ex3[1]);
$iadd = 0;
$id_now = "";
$add_now = 0;
foreach ($ex3_2 as &$value) {
	$value = str_replace("]" , "" , $value);
	$value = str_replace("[" , "" , $value);
	$values = @explode("," , $value);
	if($add_now!=$values[2] and $id_now!=$values[1]){
		$idata=0;
		$iadd = 1;
		$id_now = $values[1];
		$add_now = $values[2];
	}else if($id_now==$values[1] and $add_now!=$values[2]){
		$iadd = 1;
		$add_now = $values[2];
	}else if($id_now==$values[1] and $add_now==$values[2]){
		$iadd = $iadd+1;
	}
	
	if($idata<$iadd){
		$arr_main[$values[1]][1] = $iadd;
		$idata++;
	}
	
	if($values[2]==1){
		$arr_main[$values[1]][] = "HDP FT ".$iadd;
	}else if($values[2]==3){
		$arr_main[$values[1]][] = "GOAL FT ".$iadd;
	}else if($values[2]==7){
		$arr_main[$values[1]][] = "HDP HT ".$iadd;
	}else if($values[2]==9){
		$arr_main[$values[1]][] = "GOAL HT ".$iadd;
	}
	
	$arr_main[$values[1]][] = $values[5];
	$arr_main[$values[1]][] = $values[6];
	$arr_main[$values[1]][] = $values[7];
	
}
foreach ($arr_main as &$value) {
	//print_r($value);
	for($ida=1;$ida<=$value[1];$ida++){
		$id = $value[6];
		echo "ID = ".$id."<br>";
		$add = $ida;
		echo "ADD = ".$add."<br>";
		$zone_id = $value[8];
		echo "ลีก ID = ".$zone_id."<br>";
		$key_league = array_search('League', $value);
		$zone_name = substr($value[$key_league+1],1,-1);
		echo "ลีก = ".$zone_name."<br>";
		$team_1 = substr($value[9],1,-1);
		echo "เจ้าบ้าน = ".$team_1."<br>";
		$team_2 = substr($value[10],1,-1);
		echo "ทีมเยือน = ".$team_2."<br>";
		$dnt = @explode(" " , str_replace("'" , "" ,$value[13]));
		$dnc = @explode("/" , $dnt[0]);
		$d_y = $dnc[2];
		$d_m = $dnc[0];
		$d_d = $dnc[1];
		$d_h = $dnt[1];
		$datePlay = strtotime($d_y."-".$d_m."-".$d_d." ".$d_h);
		$d_now = $datePlay-3600;
		echo "วันเวลาที่แข่ง = ".$d_now." | ".date("d/m/Y H:i" , $d_now)."<br>";
		
		$key_hdc = array_search('HDP FT '.$ida, $value);
		$hdc = $value[$key_hdc+1];
		echo "เต็มเวลา HDC = ".$hdc."<br>";
		$hdc_1 = $value[$key_hdc+2];
		echo "เต็มเวลา HDC1 = ".$hdc_1."<br>";
		$hdc_2 = $value[$key_hdc+3];
		echo "เต็มเวลา HDC2 = ".$hdc_2."<br>";
		
		$key_goal = array_search('GOAL FT '.$ida, $value);
		$goal = $value[$key_goal+1];
		echo "เต็มเวลา GOAL = ".$goal."<br>";
		$goal_1 = $value[$key_goal+2];
		echo "เต็มเวลา GOAL1 = ".$goal_1."<br>";
		$goal_2 = $value[$key_goal+3];
		echo "เต็มเวลา GOAL2 = ".$goal_2."<br>";
		$hdc_1h = strip_tags($value_new[41]);
		
		$key_hdc_1h = array_search('HDP HT '.$ida, $value);
		$hdc_1h = $value[$key_hdc_1h+1];
		echo "ครึ่งแรก HDC = ".$hdc_1h."<br>";
		$hdc_1h_1 = $value[$key_hdc_1h+2];
		echo "ครึ่งแรก HDC1 = ".$hdc_1h_1."<br>";
		$hdc_1h_2 = $value[$key_hdc_1h+3];
		echo "ครึ่งแรก HDC2 = ".$hdc_1h_2."<br>";
	
		$key_goal_1h = array_search('GOAL HT '.$ida, $value);
		$goal_1h = $value[$key_goal_1h+1];
		echo "ครึ่งแรก GOAL = ".$goal_1h."<br>";
		$goal_1h_1 = $value[$key_goal_1h+2];
		echo "ครึ่งแรก GOAL1 = ".$goal_1h_1."<br>";
		$goal_1h_2 = $value[$key_goal_1h+3];
		echo "ครึ่งแรก GOAL2 = ".$goal_1h_2."<br>";
		echo "<br>";
		echo "<br>";
	}
}
?>