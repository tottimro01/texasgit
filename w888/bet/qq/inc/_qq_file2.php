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
$txt_qq = str_replace("<script>" , "" , $txt_qq);
$txt_qq = str_replace("</script>" , "" , $txt_qq);
$ex_qq = @explode(']=["' , $txt_qq);
/*print_r($ex_qq);
exit();*/
for($i=1;$i<count($ex_qq);$i++){
	$value = $ex_qq[$i];
	$ex_value = @explode('"];' , $value);
	$ex_value2 = @explode('","' , $ex_value[0]);
	$value_new = $ex_value2;
	
	
	/*print_r($value_new);
	exit();*/
	$id = strip_tags($value_new[0]);
	echo "ID = ".$id."<br>";
	$add = strip_tags($value_new[1]);
	echo "ADD = ".$add."<br>";
	/*$zone_id = strip_tags($value_new[2]);
	echo "ลีก ID = ".$zone_id."<br>";
	$zone_ex = @explode("&nbsp;" , $value_new[5]);
	$flag_ex1 = @explode("images/flag/" , $zone_ex[0]);
	$flag_ex2 = @explode(".gif" , $flag_ex1[1]);
	$flag = $flag_ex2[0];
	echo "ธง = ".$flag."<br>";*/
	$zone_name = strip_tags($value_new[4]);
	echo "ลีก = ".$zone_name."<br>";
	$team_1 = strip_tags($value_new[5]);
	echo "เจ้าบ้าน = ".$team_1."<br>";
	$team_2 = strip_tags($value_new[6]);
	echo "ทีมเยือน = ".$team_2."<br>";
	$d_y = substr(strip_tags($value_new[7]),0,4);
	$d_m = substr(strip_tags($value_new[7]),4,2);
	$d_d = substr(strip_tags($value_new[7]),6,2);
	$d_h = substr(strip_tags($value_new[7]),8,2);
	$d_i = substr(strip_tags($value_new[7]),10,2);
	$datePlay = strtotime($d_y."-".$d_m."-".$d_d." ".$d_h.":".$d_i);
	echo "วันเวลาที่แข่ง = ".$datePlay."<br>";
	/*$pic_ex1 = @explode('<img src="images/' , $value_new[10]);
	$pic_ex2 = @explode('">' , $pic_ex1[1]);
	$pic = $pic_ex2[0];
	echo "รูป = ".$pic."<br>";*/
	
	$big = strip_tags($value_new[18]);
	echo "ทีมต่อ = "._tor($big)."<br>";
	
	$hdc = strip_tags($value_new[15]);
	echo "เต็มเวลา HDC = ".$hdc."<br>";
	$hdc_1 = strip_tags($value_new[16]);
	echo "เต็มเวลา HDC1 = ".$hdc_1."<br>";
	$hdc_2 = strip_tags($value_new[17]);
	echo "เต็มเวลา HDC2 = ".$hdc_2."<br>";
	
	$goal = strip_tags($value_new[20]);
	echo "เต็มเวลา GOAL = ".$goal."<br>";
	$goal_1 = strip_tags($value_new[21]);
	echo "เต็มเวลา GOAL1 = ".$goal_1."<br>";
	$goal_2 = strip_tags($value_new[22]);
	echo "เต็มเวลา GOAL2 = ".$goal_2."<br>";
	
	$hdc_1h = strip_tags($value_new[28]);
	echo "ครึ่งแรก HDC = ".$hdc_1h."<br>";
	$hdc_1h_1 = strip_tags($value_new[29]);
	echo "ครึ่งแรก HDC1 = ".$hdc_1h_1."<br>";
	$hdc_1h_2 = strip_tags($value_new[30]);
	echo "ครึ่งแรก HDC2 = ".$hdc_1h_2."<br>";
	
	$goal_1h = strip_tags($value_new[33]);
	echo "ครึ่งแรก GOAL = ".$goal_1h."<br>";
	$goal_1h_1 = strip_tags($value_new[34]);
	echo "ครึ่งแรก GOAL1 = ".$goal_1h_1."<br>";
	$goal_1h_2 = strip_tags($value_new[35]);
	echo "ครึ่งแรก GOAL2 = ".$goal_1h_2."<br>";
	
	$x_1 = strip_tags($value_new[24]);
	echo "เต็มเวลา 1x2 เจ้าบ้าน = ".$x_1."<br>";
	$x_x = strip_tags($value_new[25]);
	echo "เต็มเวลา 1x2 เสมอ = ".$x_x."<br>";
	$x_2 = strip_tags($value_new[26]);
	echo "เต็มเวลา 1x2 ทีมเยือน = ".$x_2."<br>";
	
	$x_1h_1 = strip_tags($value_new[37]);
	echo "ครึ่งแรก 1x2 เจ้าบ้าน = ".$x_1h_1."<br>";
	$x_1h_x = strip_tags($value_new[38]);
	echo "ครึ่งแรก 1x2 เจ้าบ้าน = ".$x_1h_x."<br>";
	$x_1h_2 = strip_tags($value_new[39]);
	echo "ครึ่งแรก 1x2 เจ้าบ้าน = ".$x_1h_2."<br>";
	
/*	$ood = strip_tags($value_new[42]);
	echo "คี่ = ".$ood."<br>";
	$even = strip_tags($value_new[43]);
	echo "คู่ = ".$even."<br>";*/
	
	/*foreach ($ex_value3 as &$value_new) {
		echo strip_tags($value_new);
		echo " ### ";
	}*/
	echo "<br>";
	echo "<br>";
}

?>