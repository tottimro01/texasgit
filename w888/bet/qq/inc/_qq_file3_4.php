<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?


$txt_qq = trim($_POST["txt_qq"]);
$txt_qq = str_replace("<script type='text/javascript'>" , "" , $txt_qq);
$txt_qq = str_replace("</script>" , "" , $txt_qq);
$ex_qq = @explode("]=['" , $txt_qq);
/*print_r($ex_qq);
exit();*/
$l_now = "";
$d_now = "";
for($i=1;$i<count($ex_qq);$i++){
	$value = $ex_qq[$i];
	$ex_value = @explode("'];" , $value);
	$ex_value2 = @explode("','" , $ex_value[0]);
	$value_new = $ex_value2;
	
	
	/*print_r($value_new);
	exit();*/
	$id = strip_tags($value_new[0]);
	echo "ID = ".$id."<br>";
	$add = strip_tags($value_new[3]);
	echo "ADD = ".$add."<br>";
	/*$zone_id = strip_tags($value_new[2]);
	echo "ลีก ID = ".$zone_id."<br>";
	$zone_ex = @explode("&nbsp;" , $value_new[5]);
	$flag_ex1 = @explode("images/flag/" , $zone_ex[0]);
	$flag_ex2 = @explode(".gif" , $flag_ex1[1]);
	$flag = $flag_ex2[0];
	echo "ธง = ".$flag."<br>";*/
	$zone_name = strip_tags($value_new[5]);
	if($zone_name==""){
		echo "ลีก = ".$l_now."<br>";
	}else{
		$l_now = $zone_name;
		echo "ลีก = ".$l_now."<br>";
	}
	$team_1 = strip_tags($value_new[6]);
	echo "เจ้าบ้าน = ".$team_1."<br>";
	$team_2 = strip_tags($value_new[7]);
	echo "ทีมเยือน = ".$team_2."<br>";
	$d_y = substr(strip_tags($value_new[8]),0,4);
	$dnc = @explode(" " , strip_tags($value_new[12]));
	if($dnc[0]=="LIVE"){
		$d_m = substr(strip_tags($value_new[8]),4,2);
		$d_d = substr(strip_tags($value_new[8]),6,2);
	}else{
		$dncs = @explode("/" , $dnc[0]);
		$d_m = $dncs[0];
		$d_d = $dncs[1];
	}
	$dd_hi = substr(strip_tags($value_new[12]),-7,7);
	$dd_tm = substr($dd_hi,-2,2);
	$dd_ti = substr($dd_hi,-4,2);
	$dd_th = substr($dd_hi,-7,2);
	if($dd_tm=="PM"){
		$dd_th = $dd_th+12;
	}
	$dd_th = $dd_th-1;
	$d_h = $dd_th.":".$dd_ti;
	$datePlay = strtotime($d_y."-".$d_m."-".$d_d." ".$d_h);
	if($datePlay==""){
		echo "วันเวลาที่แข่ง = ".$d_now." | ".date("d/m/Y H:i" , $d_now)."<br>";
	}else{
		$d_now = $datePlay;
		echo "วันเวลาที่แข่ง = ".$d_now." | ".date("d/m/Y H:i" , $d_now)."<br>";
	}
	/*$pic_ex1 = @explode('<img src="images/' , $value_new[10]);
	$pic_ex2 = @explode('">' , $pic_ex1[1]);
	$pic = $pic_ex2[0];
	echo "รูป = ".$pic."<br>";*/
	
	/*$big = strip_tags($value_new[32]);
	echo "ทีมต่อ = ".$big."<br>";*/
	
	/*$hdc = strip_tags($value_new[29]);
	echo "เต็มเวลา HDC = ".$hdc."<br>";
	$hdc_1 = strip_tags($value_new[30]);
	echo "เต็มเวลา HDC1 = ".$hdc_1."<br>";
	$hdc_2 = strip_tags($value_new[31]);
	echo "เต็มเวลา HDC2 = ".$hdc_2."<br>";
	
	$goal = strip_tags($value_new[34]);
	echo "เต็มเวลา GOAL = ".$goal."<br>";
	$goal_1 = strip_tags($value_new[35]);
	echo "เต็มเวลา GOAL1 = ".$goal_1."<br>";
	$goal_2 = strip_tags($value_new[36]);
	echo "เต็มเวลา GOAL2 = ".$goal_2."<br>";
	
	$hdc_1h = strip_tags($value_new[42]);
	echo "ครึ่งแรก HDC = ".$hdc_1h."<br>";
	$hdc_1h_1 = strip_tags($value_new[43]);
	echo "ครึ่งแรก HDC1 = ".$hdc_1h_1."<br>";
	$hdc_1h_2 = strip_tags($value_new[44]);
	echo "ครึ่งแรก HDC2 = ".$hdc_1h_2."<br>";
	
	$goal_1h = strip_tags($value_new[47]);
	echo "ครึ่งแรก GOAL = ".$goal_1h."<br>";
	$goal_1h_1 = strip_tags($value_new[48]);
	echo "ครึ่งแรก GOAL1 = ".$goal_1h_1."<br>";
	$goal_1h_2 = strip_tags($value_new[49]);
	echo "ครึ่งแรก GOAL2 = ".$goal_1h_2."<br>";*/
	
	/*$x_1 = strip_tags($value_new[25]);
	echo "เต็มเวลา 1x2 เจ้าบ้าน = ".$x_1."<br>";
	$x_x = strip_tags($value_new[26]);
	echo "เต็มเวลา 1x2 เสมอ = ".$x_x."<br>";
	$x_2 = strip_tags($value_new[27]);
	echo "เต็มเวลา 1x2 ทีมเยือน = ".$x_2."<br>";
	
	$x_1h_1 = strip_tags($value_new[29]);
	echo "ครึ่งแรก 1x2 เจ้าบ้าน = ".$x_1h_1."<br>";
	$x_1h_x = strip_tags($value_new[30]);
	echo "ครึ่งแรก 1x2 เจ้าบ้าน = ".$x_1h_x."<br>";
	$x_1h_2 = strip_tags($value_new[31]);
	echo "ครึ่งแรก 1x2 เจ้าบ้าน = ".$x_1h_2."<br>";*/
	
    $ood = strip_tags($value_new[25]);
	echo "เต็มเวลา คี่ = ".$ood."<br>";
	$even = strip_tags($value_new[26]);
	echo "เต็มเวลา คู่ = ".$even."<br>";
	
	$ood_1h = strip_tags($value_new[28]);
	echo "ครึ่งแรก คี่ = ".$ood_1h."<br>";
	$even_1h = strip_tags($value_new[29]);
	echo "ครึ่งแรก คู่ = ".$even_1h."<br>";
	
	/*foreach ($ex_value3 as &$value_new) {
		echo strip_tags($value_new);
		echo " ### ";
	}*/
	echo "<br>";
	echo "<br>";
}

?>