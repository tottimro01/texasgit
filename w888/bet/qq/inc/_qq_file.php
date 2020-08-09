<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?



$txt_qq = trim($_POST["txt_qq"]);
$txt_qq = str_replace("<script>" , "" , $txt_qq);
$txt_qq = str_replace("</script>" , "" , $txt_qq);
$ex_qq = @explode("]=['" , $txt_qq);
$id_add = "";
for($i=1;$i<count($ex_qq);$i++){
	$value = $ex_qq[$i];
	$ex_value = @explode("'];" , $value);
	$ex_value2 = @explode("','" , $ex_value[0]);
	$value_new = $ex_value2;
	
	
	//print_r($value_new);
	
	$id = strip_tags($value_new[1]);
	echo "ID = ".$id."<br>";
	if($id_add=="" || $id_add!=$id){
		$id_add = $id;
		$add = 1;
	}else{
		$add = $add+1;
	}
	echo "ADD = ".$add."<br>";
	$zone_id = strip_tags($value_new[2]);
	echo "ลีก ID = ".$zone_id."<br>";
	$zone_ex = @explode("&nbsp;" , $value_new[5]);
	$flag_ex1 = @explode("images/flag/" , $zone_ex[0]);
	$flag_ex2 = @explode(".gif" , $flag_ex1[1]);
	$flag = $flag_ex2[0];
	echo "ธง = ".$flag."<br>";
	if($flag==""){
		$zone_name = $value_new[5];
	}else{
		$zone_name = $zone_ex[1];
	}
	echo "ลีก = ".$zone_name."<br>";
	$team_1 = strip_tags($value_new[6]);
	echo "เจ้าบ้าน = ".$team_1."<br>";
	$team_2 = strip_tags($value_new[7]);
	echo "ทีมเยือน = ".$team_2."<br>";
	$datePlay = strtotime(strip_tags($value_new[8])." ".strip_tags($value_new[9]));
	echo "วันเวลาที่แข่ง = ".$datePlay."<br>";
	$pic_ex1 = @explode('<img src="images/' , $value_new[10]);
	$pic_ex2 = @explode('">' , $pic_ex1[1]);
	$pic = $pic_ex2[0];
	echo "รูป = ".$pic."<br>";
	
	$big = strip_tags($value_new[14]);
	echo "ทีมต่อ = ".$big."<br>";
	
	$hdc = strip_tags($value_new[18]);
	echo "เต็มเวลา HDC = ".$hdc."<br>";
	$hdc_1 = strip_tags($value_new[19]);
	echo "เต็มเวลา HDC1 = ".$hdc_1."<br>";
	$hdc_2 = strip_tags($value_new[20]);
	echo "เต็มเวลา HDC2 = ".$hdc_2."<br>";
	
	$goal = strip_tags($value_new[22]);
	echo "เต็มเวลา GOAL = ".$goal."<br>";
	$goal_1 = strip_tags($value_new[23]);
	echo "เต็มเวลา GOAL1 = ".$goal_1."<br>";
	$goal_2 = strip_tags($value_new[24]);
	echo "เต็มเวลา GOAL2 = ".$goal_2."<br>";
	
	$hdc_1h = strip_tags($value_new[26]);
	echo "ครึ่งแรก HDC = ".$hdc_1h."<br>";
	$hdc_1h_1 = strip_tags($value_new[27]);
	echo "ครึ่งแรก HDC1 = ".$hdc_1h_1."<br>";
	$hdc_1h_2 = strip_tags($value_new[28]);
	echo "ครึ่งแรก HDC2 = ".$hdc_1h_2."<br>";
	
	$goal_1h = strip_tags($value_new[30]);
	echo "ครึ่งแรก GOAL = ".$goal_1h."<br>";
	$goal_1h_1 = strip_tags($value_new[31]);
	echo "ครึ่งแรก GOAL1 = ".$goal_1h_1."<br>";
	$goal_1h_2 = strip_tags($value_new[32]);
	echo "ครึ่งแรก GOAL2 = ".$goal_1h_2."<br>";
	
	$x_1 = strip_tags($value_new[34]);
	echo "เต็มเวลา 1x2 เจ้าบ้าน = ".$x_1."<br>";
	$x_x = strip_tags($value_new[35]);
	echo "เต็มเวลา 1x2 เสมอ = ".$x_x."<br>";
	$x_2 = strip_tags($value_new[36]);
	echo "เต็มเวลา 1x2 ทีมเยือน = ".$x_2."<br>";
	
	$x_1h_1 = strip_tags($value_new[38]);
	echo "ครึ่งแรก 1x2 เจ้าบ้าน = ".$x_1h_1."<br>";
	$x_1h_x = strip_tags($value_new[39]);
	echo "ครึ่งแรก 1x2 เจ้าบ้าน = ".$x_1h_x."<br>";
	$x_1h_2 = strip_tags($value_new[40]);
	echo "ครึ่งแรก 1x2 เจ้าบ้าน = ".$x_1h_2."<br>";
	
	$ood = strip_tags($value_new[42]);
	echo "คี่ = ".$ood."<br>";
	$even = strip_tags($value_new[43]);
	echo "คู่ = ".$even."<br>";
	
	/*foreach ($ex_value3 as &$value_new) {
		echo strip_tags($value_new);
		echo " ### ";
	}*/
	echo "<br>";
	echo "<br>";
}
/*foreach ($ex_qq as &$value) {
	if($value!=""){
		echo $value;
		echo "<br>";
		echo "<br>";
		$ex_val = @explode("=" , $value);
		if($arr_tname[$ex_val[1]]!=""){
			echo $txt_sql_yod = "insert into bom_tb_yod(yod_date,yod_fdate,yod_price,yod_addDate,tname_id,yod_accept) values('$yod_date','$yod_fdate','$yod_price',now(),'$tname_id',0)";
			//$sql1=sql_query($txt_sql_yod);
			echo "<br>";
		}
	}
}*/

?>