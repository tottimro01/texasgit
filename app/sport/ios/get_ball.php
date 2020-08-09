<?
require ("../inc/conn.php");
require ("../inc/function.php");
$arr_new = array();

/*
$sql=sql_query("select * from bom_tb_ball_list where b_date = '"._bdate()."' order by 	b_id asc  , b_add asc  , b_hf desc");
while($rs=sql_fetch($sql)){
	$arr_new[$rs["b_id"]][] = $rs;
}
*/
$url_file="../txt/json/live.json";	
$ds_js=file_get_contents2($url_file);
$arr_id = json_decode($ds_js, true);


$url_file="../txt/json/zone_1.json";	
$d_js=file_get_contents2($url_file);
$arr_zone = json_decode($d_js, true);

foreach($arr_zone as $rs){
	foreach($arr_id[md5($rs[b_zone])] as $rss){
		$arr_new[$rss["b_id"]][] = $rss;
	}#foreach($arr_id[md5($rs[b_zone])] as $rss){
}#foreach($arr_zone as $rs){


$arrData = array();	
$iPsition = 0;
foreach ($arr_new as &$value) {
	//print_r($value);
	$arrData[$iPsition]["League"]= $value[0]["b_zone"];
	$arrData[$iPsition]["BallID"]= $value[0]["b_id"];
	$arrData[$iPsition]["Team1"]= $value[0]["b_name_1"];
	$arrData[$iPsition]["Team2"]= $value[0]["b_name_2"];
	
	$arrData[$iPsition]["Play_Time"]= date("H:i" , $value[0]["b_date_play"]);
	$arrData[$iPsition]["Play_Date"]= $value[0]["b_date"];
	$arrData[$iPsition]["Big"]= $value[0]["b_big"];
	
	$iNoH = 1;
	$iNoFT = 1;
	
	
	foreach ($value as &$values) {
		if($values["b_hf"]==1){
			
			if($iNoH==1){
				$arrData[$iPsition]["X11H"]= $values["b_1x2_1"];
				$arrData[$iPsition]["XX1H"]= $values["b_1x2_x"];
				$arrData[$iPsition]["X21H"]= $values["b_1x2_2"];
	
				$arrData[$iPsition]["Odd1H"]= $values["b_odd"];
				$arrData[$iPsition]["Even1H"]= $values["b_even"];
			}
			
			$arrData[$iPsition]["Hdc1H".$iNoH]= $values["b_hdc"];
			$arrData[$iPsition]["Hdc1HH".$iNoH]= $values["b_hdc_1"];
			$arrData[$iPsition]["Hdc1HA".$iNoH]= $values["b_hdc_2"];
		
			$arrData[$iPsition]["Goal1H".$iNoH]= $values["b_goal"];
			$arrData[$iPsition]["Goal1HHi".$iNoH]= $values["b_goal_1"];
			$arrData[$iPsition]["Goal1HL".$iNoH]= $values["b_goal_2"];
			$iNoH++;
		}else{
			
			if($iNoFT==1){
				$arrData[$iPsition]["X1FT"]= $values["b_1x2_1"];
				$arrData[$iPsition]["XXFT"]= $values["b_1x2_x"];
				$arrData[$iPsition]["X2FT"]= $values["b_1x2_2"];
	
				$arrData[$iPsition]["OddFT"]= $values["b_odd"];
				$arrData[$iPsition]["EvenFT"]= $values["b_even"];
			}
			
			$arrData[$iPsition]["HdcFT".$iNoFT]= $values["b_hdc"];
			$arrData[$iPsition]["HdcFTH".$iNoFT]= $values["b_hdc_1"];
			$arrData[$iPsition]["HdcFTA".$iNoFT]= $values["b_hdc_2"];
		
			$arrData[$iPsition]["GoalFT".$iNoFT]= $values["b_goal"];
			$arrData[$iPsition]["GoalFTHi".$iNoFT]= $values["b_goal_1"];
			$arrData[$iPsition]["GoalFTL".$iNoFT]= $values["b_goal_2"];
			$iNoFT++;
		}
	}
	
	$nft = $iNoFT;
	$nh = $iNoH;
	
	for($ins=4;$ins>$nft;$ins--){
		$arrData[$iPsition]["HdcFT".$iNoFT]= "";
		$arrData[$iPsition]["HdcFTH".$iNoFT]= "";
		$arrData[$iPsition]["HdcFTA".$iNoFT]= "";
		
		$arrData[$iPsition]["GoalFT".$iNoFT]= "";
		$arrData[$iPsition]["GoalFTHi".$iNoFT]= "";
		$arrData[$iPsition]["GoalFTL".$iNoFT]= "";
		
		if($iNoFT==1){
			$arrData[$iPsition]["X1FT"]= "";
			$arrData[$iPsition]["XXFT"]= "";
			$arrData[$iPsition]["X2FT"]= "";
	
			$arrData[$iPsition]["OddFT"]= "";
			$arrData[$iPsition]["EvenFT"]= "";
		}
		
		
		$iNoFT++;
	}
	
	for($ins=4;$ins>$nh;$ins--){
		$arrData[$iPsition]["Hdc1H".$iNoH]= "";
		$arrData[$iPsition]["Hdc1HH".$iNoH]= "";
		$arrData[$iPsition]["Hdc1HA".$iNoH]= "";
		
		$arrData[$iPsition]["Goal1H".$iNoH]= "";
		$arrData[$iPsition]["Goal1HHi".$iNoH]= "";
		$arrData[$iPsition]["Goal1HL".$iNoH]= "";
		
		if($iNoH==1){
			$arrData[$iPsition]["X11H"]= "";
			$arrData[$iPsition]["XX1H"]= "";
			$arrData[$iPsition]["X21H"]= "";
	
			$arrData[$iPsition]["Odd1H"]= "";
			$arrData[$iPsition]["Even1H"]= "";
		}
		
		$iNoH++;
	}
	/*echo $iNoFT;
	echo "<br>";
	echo $iNoH;
	echo "<br>";
	echo "<br>";*/
	$iPsition++;
}

//print_r($arrData);
echo json_encode($arrData);
?>