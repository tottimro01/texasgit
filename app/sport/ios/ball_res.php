<?
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);


require('../inc/conn.php');
require('../inc/function.php');
require('../config.php');/*
 if($ren[con_service]==0){ 
 $arr = array();	
 echo json_encode($arr);
 exit();
 }*/

$lang_post           = trim($_GET["lang"]);
if($lang_post==""){
	$lang_post = "th";
}

//$ex=@explode('-',$view_date);
$_GET[d] = str_replace("/" , "-" , $_GET[d]);
$view_date2=$_GET[d];
$url_file=$server_js."txt/json/ball/".$view_date2.".json";	
$d_js=file_get_contents($url_file);
$d_bet = json_decode($d_js, true);
$arr_z=array();
foreach($d_bet as $rss){
	$arr_z[]=$rss[b_zone_.$lang_post];
#print_r($rss);
#echo'<hr>';
}

$arr_z = array_unique($arr_z);
$iPsition = 0;
foreach($arr_z as $zone){ 
	foreach($d_bet as $rss){
		if($rss[b_zone_.$lang_post]==$zone){	
			$arrData[$iPsition]["League"]= $zone;
			$arrData[$iPsition]["Team1"]= $rss[b_name_1_.$lang_post];
			$arrData[$iPsition]["Team2"]= $rss[b_name_2_.$lang_post];
			$arrData[$iPsition]["Play_Date"]= date("d-m-Y",$rss[b_date_play]);	
			$arrData[$iPsition]["Play_Time"]= date("H:i",$rss[b_date_play]);	
			
			if($rss[b_score_full]==""){
				$arrData[$iPsition]["Msg"]= "รอ";	
				$arrData[$iPsition]["Status"]= "2";	
              }elseif($rss[b_score_full]=="can"){
				$arrData[$iPsition]["Msg"]= "ยกเลิก";	
				$arrData[$iPsition]["Status"]= "3";	
			}elseif($rss[b_score_full]!=""){
				$arrData[$iPsition]["Msg"]= "จบ";	
				$arrData[$iPsition]["Status"]= "1";	
			}
			
			$arrData[$iPsition]["Score_HT"]= $rss[b_score_half];
			$arrData[$iPsition]["Score_FT"]= $rss[b_score_full];	
			
			$iPsition += 1;
		}
		
	}
}


	/*$iPsition = 0;
	
	$arrData = array();	
	for ($x = 0; $x <= 3; $x++) {	
		for ($i = 0; $i <= 5; $i++) {	
			$arrData[$iPsition]["League"]= "สเปน พรีเมียร์ ลาลีก้า ".$x;
			$arrData[$iPsition]["Team1"]= "มาลาก้า ".$i;
			$arrData[$iPsition]["Team2"]= "อิบาร์ ".$i;
			$arrData[$iPsition]["Play_Time"]= "00.30";	
			if($i == 0){
				$arrData[$iPsition]["Msg"]= "เลื่อน";	
				$arrData[$iPsition]["Status"]= "3";	
			$arrData[$iPsition]["Score_HT"]= "-";
			$arrData[$iPsition]["Score_FT"]= "-";				
			}else if($i == 1){
				$arrData[$iPsition]["Msg"]= "รอ";	
				$arrData[$iPsition]["Status"]= "2";	
				$arrData[$iPsition]["Score_HT"]= "0-0";
				$arrData[$iPsition]["Score_FT"]= "-";				
			}else{
				$arrData[$iPsition]["Msg"]= "จบ";	
				$arrData[$iPsition]["Status"]= "1";	
			$arrData[$iPsition]["Score_HT"]= "0-0";
			$arrData[$iPsition]["Score_FT"]= "5-5";				
			}
			
			$iPsition += 1;
		}
	}*/
						
	echo json_encode($arrData);
?>