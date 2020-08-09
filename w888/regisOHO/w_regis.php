<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
require('../inc/function.php');


foreach($arr_zone as $key => $val){
	if($key!=1){
		###################สร้างวัน
		$js2=array();
		$sql_ok=sql_query("select * from bom_tb_lotto_ok where lot_zone = $key group by ok_date order by ok_id desc limit 48");
		while($rs_ok=sql_fetch($sql_ok)){
		$js2[]="$rs_ok[ok_date]";
		}
		##########
		$url_file2="../json/lotto/date/date_".$key.".json";		
		$txt2=json_encode($js2);
		write($url_file2 ,$txt2,"w+"); 
	}
}

##################JSON Lotto Config
//$sql=sql_query("select * from  bom_tb_member");
//while($rem=sql_fetch($sql)){
	
	//$url_file="../json/config/member/LottoConfig_".$rem[m_id].".json";
	//$arrj = json_read($url_file);
	//print_r($arrj);
	/*echo $arrj[m_lotto_pay_super];
	$up1 = "$arrj[m_lotto_pay_super]";
			sql_query("update bom_tb_member set m_lotto_pay_super = '$up1' where m_id = $rem[m_id]");
			echo "update bom_tb_member set m_lotto_pay_super = '$up1' where m_id = $rem[m_id]";
			echo "<br>";
	$up2 = "$arrj[m_lotto_pay_senior]";
			sql_query("update bom_tb_member set m_lotto_pay_senior = '$up2' where m_id = $rem[m_id]");
			echo "update bom_tb_member set m_lotto_pay_senior = '$up2' where m_id = $rem[m_id]";
			echo "<br>";
	$up3 = "$arrj[m_lotto_pay_master]";
			sql_query("update bom_tb_member set m_lotto_pay_master = '$up3' where m_id = $rem[m_id]");
			echo "update bom_tb_member set m_lotto_pay_master = '$up3' where m_id = $rem[m_id]";
			echo "<br>";
	$up4 = "$arrj[m_lotto_pay_agent]";
			sql_query("update bom_tb_member set m_lotto_pay_agent = '$up4' where m_id = $rem[m_id]");
			echo "update bom_tb_member set m_lotto_pay_agent = '$up4' where m_id = $rem[m_id]";
			echo "<br>";
	$up5 = "$arrj[m_lotto_pay_member]";
			sql_query("update bom_tb_member set m_lotto_pay_member = '$up5' where m_id = $rem[m_id]");
			echo "update bom_tb_member set m_lotto_pay_member = '$up5' where m_id = $rem[m_id]";
			echo "<br>";*/
	//exit();
/*$m_lotto_pay_super= "$rem[m_lotto_dis_super]";
$m_lotto_pay_senior= "$rem[m_lotto_dis_senior]";
$m_lotto_pay_master= "$rem[m_lotto_dis_master]";
$m_lotto_pay_agent= "$rem[m_lotto_dis_agent]";
$m_lotto_pay_member= "$rem[m_lotto_dis_member]";
$ex1 = explode("," , $m_lotto_pay_super);
$n1 = count($ex1)-1;
$ex2 = explode("," , $m_lotto_pay_senior);
$n2 = count($ex2)-1;
$ex3 = explode("," , $m_lotto_pay_master);
$n3 = count($ex3)-1;
$ex4 = explode("," , $m_lotto_pay_agent);
$n4 = count($ex4)-1;
$ex5 = explode("," , $m_lotto_pay_member);
$n5 = count($ex5)-1;
	if($ex1[4]<$ex3[4]){
		echo $rem[m_id]." ".$rem[m_user]."<br>";
	}
	if($n1<25 || $n2<25 || $n3<25 || $n4<25 || $n5<25){
		//echo $rem[m_id]."###";
		if($n1<25){
			//$up1 = "$rem[m_lotto_pay_super]".",";
			//sql_query("update bom_tb_member set m_lotto_pay_super = '$up1' where m_id = $rem[m_id]");
			//echo "update bom_tb_member set m_lotto_pay_super = '$up1' where m_id = $rem[m_id]";
			//echo "<br>";
		}
		/*if($n2<25){
			$up2 = "$rem[m_lotto_pay_senior]".",";
			//sql_query("update bom_tb_member set m_lotto_pay_senior = '$up2' where m_id = $rem[m_id]");
			echo "update bom_tb_member set m_lotto_pay_senior = '$up2' where m_id = $rem[m_id]";
			echo "<br>";
		}
		if($n3<25){
			$up3 = "$rem[m_lotto_pay_master]".",";
			//sql_query("update bom_tb_member set m_lotto_pay_master = '$up3' where m_id = $rem[m_id]");
			echo "update bom_tb_member set m_lotto_pay_master = '$up3' where m_id = $rem[m_id]";
			echo "<br>";
		}
		if($n4<25){
			$up4 = "$rem[m_lotto_pay_agent]".",";
			//sql_query("update bom_tb_member set m_lotto_pay_agent = '$up4' where m_id = $rem[m_id]");
			echo "update bom_tb_member set m_lotto_pay_agent = '$up4' where m_id = $rem[m_id]";
			echo "<br>";
		}
		if($n5<25){
			$up5 = "$rem[m_lotto_pay_member]".",";
			//sql_query("update bom_tb_member set m_lotto_pay_member = '$up5' where m_id = $rem[m_id]");
			echo "update bom_tb_member set m_lotto_pay_member = '$up5' where m_id = $rem[m_id]";
			echo "<br>";
		}*/
//	}*/
/*$sql=sql_query("select * from  bom_tb_member");
while($rem=sql_fetch($sql)){
	$ex1 = explode("," , $rem[m_lotto_hun_myshare_super]);
	$ex2 = explode("," , $rem[m_lotto_hun_myshare_senior]);
	$ex3 = explode("," , $rem[m_lotto_hun_myshare_master]);
	$ex4 = explode("," , $rem[m_lotto_hun_myshare_agent]);
	
	$arr_sum = array();
	foreach($lot_type["th"] as $key  => $value){
		$arr_sum[$key] = $ex1[$key]+$ex2[$key]+$ex3[$key]+$ex4[$key];
	}
	$have_over = "";
	foreach($arr_sum as $value){
		//echo $value."###";
		if($value>100){
			$have_over .= $value."##";
		}
	}
	if($have_over != ""){
		echo $have_over;
		echo $rem[m_id];
		echo "<br>";
	}
}*/

/*$sql=sql_query("select * from  bom_tb_agent");
while($rem=sql_fetch($sql)){
	$ex1 = explode("," , $rem[r_lotto_hun_myshare_super]);
	$ex2 = explode("," , $rem[r_lotto_hun_myshare_senior]);
	$ex3 = explode("," , $rem[r_lotto_hun_myshare_master]);
	$ex4 = explode("," , $rem[r_lotto_hun_share]);
	
	$arr_sum = array();
	foreach($lot_type["th"] as $key  => $value){
		$arr_sum[$key] = $ex1[$key]+$ex2[$key]+$ex3[$key]+$ex4[$key];
	}
	$have_over = "";
	foreach($arr_sum as $value){
		//echo $value."###";
		if($value>100){
			$have_over .= $value."##";
		}
	}
	if($have_over != ""){
		echo $have_over;
		echo $rem[r_id];
		echo "<br>";
	}
}*/
//print_r($arr_sum);
/*$js1=array();
/*$js1["m_lotto_nummax"]="$rem[m_lotto_nummax]";
$js1["m_lotto_max"]="$rem[m_lotto_max]";
$js1["m_lotto_min"]="$rem[m_lotto_min]";*/

/*$js1["m_lotto_hun_nummax"]="$rem[m_lotto_hun_nummax]";
$js1["m_lotto_hun_max"]="$rem[m_lotto_hun_max]";
$js1["m_lotto_hun_min"]="$rem[m_lotto_hun_min]";

###########################หวย
$js1["m_lotto_myshare_super"]="$rem[m_lotto_myshare_super]";
$js1["m_lotto_myshare_senior"]="$rem[m_lotto_myshare_senior]";
$js1["m_lotto_myshare_master"]="$rem[m_lotto_myshare_master]";
$js1["m_lotto_myshare_agent"]="$rem[m_lotto_myshare_agent]";

$js1["m_lotto_force_super"]="$rem[m_lotto_force_super]";
$js1["m_lotto_force_senior"]="$rem[m_lotto_force_senior]";
$js1["m_lotto_force_master"]="$rem[m_lotto_force_master]";
$js1["m_lotto_force_agent"]="$rem[m_lotto_force_agent]";


$js1["m_lotto_pay_super"]="$rem[m_lotto_pay_super]";
$js1["m_lotto_pay_senior"]="$rem[m_lotto_pay_senior]";
$js1["m_lotto_pay_master"]="$rem[m_lotto_pay_master]";
$js1["m_lotto_pay_agent"]="$rem[m_lotto_pay_agent]";
$js1["m_lotto_pay_member"]="$rem[m_lotto_pay_member]";

$js1["m_lotto_dis_super"]="$rem[m_lotto_dis_super]";
$js1["m_lotto_dis_senior"]="$rem[m_lotto_dis_senior]";
$js1["m_lotto_dis_master"]="$rem[m_lotto_dis_master]";
$js1["m_lotto_dis_agent"]="$rem[m_lotto_dis_agent]";
$js1["m_lotto_dis_member"]="$rem[m_lotto_dis_member]";



###########################หุ้น
$js1["m_lotto_hun_myshare_super"]="$rem[m_lotto_hun_myshare_super]";
$js1["m_lotto_hun_myshare_senior"]="$rem[m_lotto_hun_myshare_senior]";
$js1["m_lotto_hun_myshare_master"]="$rem[m_lotto_hun_myshare_master]";
$js1["m_lotto_hun_myshare_agent"]="$rem[m_lotto_hun_myshare_agent]";

$js1["m_lotto_hun_force_super"]="$rem[m_lotto_hun_force_super]";
$js1["m_lotto_hun_force_senior"]="$rem[m_lotto_hun_force_senior]";
$js1["m_lotto_hun_force_master"]="$rem[m_lotto_hun_force_master]";
$js1["m_lotto_hun_force_agent"]="$rem[m_lotto_hun_force_agent]";


$js1["m_lotto_hun_pay_super"]="$rem[m_lotto_hun_pay_super]";
$js1["m_lotto_hun_pay_senior"]="$rem[m_lotto_hun_pay_senior]";
$js1["m_lotto_hun_pay_master"]="$rem[m_lotto_hun_pay_master]";
$js1["m_lotto_hun_pay_agent"]="$rem[m_lotto_hun_pay_agent]";
$js1["m_lotto_hun_pay_member"]="$rem[m_lotto_hun_pay_member]";

$js1["m_lotto_hun_dis_super"]="$rem[m_lotto_hun_dis_super]";
$js1["m_lotto_hun_dis_senior"]="$rem[m_lotto_hun_dis_senior]";
$js1["m_lotto_hun_dis_master"]="$rem[m_lotto_hun_dis_master]";
$js1["m_lotto_hun_dis_agent"]="$rem[m_lotto_hun_dis_agent]";
$js1["m_lotto_hun_dis_member"]="$rem[m_lotto_hun_dis_member]";
		
		
###########################เกมส์
$js1["m_min"]="$rem[m_min]";
$js1["m_max"]="$rem[m_max]";
$js1["m_max_match"]="$rem[m_max_match]";
		
$js1["m_myshare_super"]="$rem[m_myshare_super]";
$js1["m_myshare_senior"]="$rem[m_myshare_senior]";
$js1["m_myshare_master"]="$rem[m_myshare_master]";
$js1["m_myshare_agent"]="$rem[m_myshare_agent]";

$js1["m_force_super"]="$rem[m_force_super]";
$js1["m_force_senior"]="$rem[m_force_senior]";
$js1["m_force_master"]="$rem[m_force_master]";
$js1["m_force_agent"]="$rem[m_force_agent]";
$js1["m_myshare_games"]="$rem[m_myshare_games]";

$js1["m_force_games"]="$rem[m_force_games]";
$js1["m_dis_games"]="$rem[m_dis_games]";
$js1["m_max_games"]="$rem[m_max_games]";
$js1["m_min_games"]="$rem[m_min_games]";


$js1["m_active_bet"]="$rem[m_active_bet]";
$txt=json_encode($js1);
$url_file="../json/config/member/LottoConfig_".$rem[m_id].".json";	
write($url_file ,$txt,"w+"); 
##################JSON LottoMaxReceive
}*/

?>