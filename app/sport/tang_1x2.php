<?
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);

require('../inc/conn.php');
require('../inc/function.php');
require('../config.php');
 if($ren[con_service]==0){ 
 $arr = array();	
 echo json_encode($arr);
 exit();
 }









	$iPsition = 0;
    $arrData=array();
	
	
$url_file=$server_js."txt/json/zone_31.json";	
$d_js=file_get_contents2($url_file);
$arr_zone = json_decode($d_js, true);
	
	
$url_file=$server_js."txt/json/data_live_1_".$price_type.".json";	
$ds_js=file_get_contents2($url_file);
$arr_id = json_decode($ds_js, true);



foreach($arr_zone as $rs){
	foreach($arr_id[md5($rs[b_zone])] as $rss){
		
	
				    $ftcode=@explode(",", $rss[b_numcode]);
					
					
	
						$arrData[$iPsition]["League"]= "$rss[b_zone]";
						$arrData[$iPsition]["HF"]= "$rss[b_hf]";
						$arrData[$iPsition]["ADD"]= "$rss[b_add]";
						$arrData[$iPsition]["BallID"]= "$rss[b_id]";
						$arrData[$iPsition]["Team1"]= "$rss[b_name_1]";
						$arrData[$iPsition]["Team2"]= "$rss[b_name_2]";
						#$arrData[$iPsition]["Play_Time"]= "".date("H.i",$rss[b_date_play])."";
						$arrData[$iPsition]["Play_Time"]= "".$rss[b_live_showtime]."";
						$arrData[$iPsition]["Play_Score"]= "".$rss[b_t_score_full]."";
						$arrData[$iPsition]["Big"]= "$rss[b_big]";
						
						
						if($rss[b_hdc]!=""){
						$arrData[$iPsition]["Hdc"]= "$rss[b_hdc]";
						$arrData[$iPsition]["Hdc1"]= "$rss[b_hdc_1]";
						$arrData[$iPsition]["Hdc2"]= "$rss[b_hdc_2]";
						
				        $arrData[$iPsition]["No1"]= "$ftcode[0]";
						$arrData[$iPsition]["No2"]= "$ftcode[1]";
						
						}else{
						$arrData[$iPsition]["Hdc"]= "";
						$arrData[$iPsition]["Hdc1"]= "";
						$arrData[$iPsition]["Hdc2"]= "";
						
				        $arrData[$iPsition]["No1"]= "";
						$arrData[$iPsition]["No2"]= "";
							}
						
						if($rss[b_goal]!=""){
						$arrData[$iPsition]["Goal"]= "$rss[b_goal]";
						$arrData[$iPsition]["Goal1"]= "$rss[b_goal_1]";
						$arrData[$iPsition]["Goal2"]= "$rss[b_goal_2]";
						
						$arrData[$iPsition]["No3"]= "$ftcode[2]";
						$arrData[$iPsition]["No4"]= "$ftcode[3]";
						}else{
						$arrData[$iPsition]["Goal"]= "";
						$arrData[$iPsition]["Goal1"]= "";
						$arrData[$iPsition]["Goal2"]= "";
						
						$arrData[$iPsition]["No3"]= "";
						$arrData[$iPsition]["No4"]= "";
						}
						

						
						if($rss[b_1x2_1]!=0){
						$arrData[$iPsition]["X1"]= "$rss[b_1x2_1]";
						$arrData[$iPsition]["XX"]= "$rss[b_1x2_x]";
						$arrData[$iPsition]["X2"]= "$rss[b_1x2_2]";
						
						$arrData[$iPsition]["No5"]= "$ftcode[4]";
						$arrData[$iPsition]["No6"]= "$ftcode[5]";
						$arrData[$iPsition]["No7"]= "$ftcode[6]";
						}else{
						$arrData[$iPsition]["X1"]= "";
						$arrData[$iPsition]["XX"]= "";
						$arrData[$iPsition]["X2"]= "";
						
						$arrData[$iPsition]["No5"]= "";	
						$arrData[$iPsition]["No6"]= "";	
						$arrData[$iPsition]["No7"]= "";	
						}
						
						
							if($rss[b_odd]!=0){
						$arrData[$iPsition]["Odd"]= "$rss[b_odd]";
						$arrData[$iPsition]["Even"]= "$rss[b_even]";			
						
						$arrData[$iPsition]["No8"]= "$ftcode[7]";
						$arrData[$iPsition]["No9"]= "$ftcode[8]";
						}else{
						$arrData[$iPsition]["Odd"]= "";
						$arrData[$iPsition]["Even"]= "";			
						
						$arrData[$iPsition]["No8"]= "";	
						$arrData[$iPsition]["No9"]= "";
							}

						$arrData[$iPsition]["No10"]= "";	
						$arrData[$iPsition]["No11"]= "";	
						$arrData[$iPsition]["No12"]= "";	
						$arrData[$iPsition]["No13"]= "";

	$iPsition++;
			
	}#foreach($arr_zone as $rs){
	}#foreach($arr_id[md5($rs[b_zone])] as $rss){			
	
	
	
	
$url_file=$server_js."txt/json/zone_11.json";	
$d_js=file_get_contents2($url_file);
$arr_zone = json_decode($d_js, true);
	
	
$url_file=$server_js."txt/json/data_1_".$price_type.".json";	
$ds_js=file_get_contents2($url_file);
$arr_id = json_decode($ds_js, true);



foreach($arr_zone as $rs){
	foreach($arr_id[md5($rs[b_zone])] as $rss){
		
	
				    $ftcode=@explode(",", $rss[b_numcode]);
					
					
	
						$arrData[$iPsition]["League"]= "$rss[b_zone]";
						$arrData[$iPsition]["HF"]= "$rss[b_hf]";
						$arrData[$iPsition]["ADD"]= "$rss[b_add]";
						$arrData[$iPsition]["BallID"]= "$rss[b_id]";
						$arrData[$iPsition]["Team1"]= "$rss[b_name_1]";
						$arrData[$iPsition]["Team2"]= "$rss[b_name_2]";
						$arrData[$iPsition]["Play_Time"]= "".date("H.i",$rss[b_date_play])."";
						$arrData[$iPsition]["Play_Score"]= "LIVE";
						$arrData[$iPsition]["Big"]= "$rss[b_big]";
						
						
						if($rss[b_hdc]!=""){
						$arrData[$iPsition]["Hdc"]= "$rss[b_hdc]";
						$arrData[$iPsition]["Hdc1"]= "$rss[b_hdc_1]";
						$arrData[$iPsition]["Hdc2"]= "$rss[b_hdc_2]";
						
				        $arrData[$iPsition]["No1"]= "$ftcode[0]";
						$arrData[$iPsition]["No2"]= "$ftcode[1]";
						
						}else{
						$arrData[$iPsition]["Hdc"]= "";
						$arrData[$iPsition]["Hdc1"]= "";
						$arrData[$iPsition]["Hdc2"]= "";
						
				        $arrData[$iPsition]["No1"]= "";
						$arrData[$iPsition]["No2"]= "";
							}
						
						if($rss[b_goal]!=""){
						$arrData[$iPsition]["Goal"]= "$rss[b_goal]";
						$arrData[$iPsition]["Goal1"]= "$rss[b_goal_1]";
						$arrData[$iPsition]["Goal2"]= "$rss[b_goal_2]";
						
						$arrData[$iPsition]["No3"]= "$ftcode[2]";
						$arrData[$iPsition]["No4"]= "$ftcode[3]";
						}else{
						$arrData[$iPsition]["Goal"]= "";
						$arrData[$iPsition]["Goal1"]= "";
						$arrData[$iPsition]["Goal2"]= "";
						
						$arrData[$iPsition]["No3"]= "";
						$arrData[$iPsition]["No4"]= "";
						}
						

						
						if($rss[b_1x2_1]!=0){
						$arrData[$iPsition]["X1"]= "$rss[b_1x2_1]";
						$arrData[$iPsition]["XX"]= "$rss[b_1x2_x]";
						$arrData[$iPsition]["X2"]= "$rss[b_1x2_2]";
						
						$arrData[$iPsition]["No5"]= "$ftcode[4]";
						$arrData[$iPsition]["No6"]= "$ftcode[5]";
						$arrData[$iPsition]["No7"]= "$ftcode[6]";
						}else{
						$arrData[$iPsition]["X1"]= "";
						$arrData[$iPsition]["XX"]= "";
						$arrData[$iPsition]["X2"]= "";
						
						$arrData[$iPsition]["No5"]= "";	
						$arrData[$iPsition]["No6"]= "";	
						$arrData[$iPsition]["No7"]= "";	
						}
						
						
							if($rss[b_odd]!=0){
						$arrData[$iPsition]["Odd"]= "$rss[b_odd]";
						$arrData[$iPsition]["Even"]= "$rss[b_even]";			
						
						$arrData[$iPsition]["No8"]= "$ftcode[7]";
						$arrData[$iPsition]["No9"]= "$ftcode[8]";
						}else{
						$arrData[$iPsition]["Odd"]= "";
						$arrData[$iPsition]["Even"]= "";			
						
						$arrData[$iPsition]["No8"]= "";	
						$arrData[$iPsition]["No9"]= "";
							}

						$arrData[$iPsition]["No10"]= "";	
						$arrData[$iPsition]["No11"]= "";	
						$arrData[$iPsition]["No12"]= "";	
						$arrData[$iPsition]["No13"]= "";

	$iPsition++;
			
	}#foreach($arr_zone as $rs){
	}#foreach($arr_id[md5($rs[b_zone])] as $rss){				
	
	
	


$url_file=$server_js."txt/json/zone_36.json";	
$d_js=file_get_contents2($url_file);
$arr_zone = json_decode($d_js, true);
	
	
$url_file=$server_js."txt/json/data_live_6_".$price_type.".json";	
$ds_js=file_get_contents2($url_file);
$arr_id = json_decode($ds_js, true);



foreach($arr_zone as $rs){
	foreach($arr_id[md5($rs[b_zone])] as $rss){
		
	
				    $ftcode=@explode(",", $rss[b_numcode]);
					
					
	
						$arrData[$iPsition]["League"]= "$rss[b_zone]";
						$arrData[$iPsition]["HF"]= "$rss[b_hf]";
						$arrData[$iPsition]["ADD"]= "$rss[b_add]";
						$arrData[$iPsition]["BallID"]= "$rss[b_id]";
						$arrData[$iPsition]["Team1"]= "$rss[b_name_1]";
						$arrData[$iPsition]["Team2"]= "$rss[b_name_2]";
						#$arrData[$iPsition]["Play_Time"]= "".date("H.i",$rss[b_date_play])."";
						$arrData[$iPsition]["Play_Time"]= "".$rss[b_live_showtime]."";
						$arrData[$iPsition]["Play_Score"]= "".$rss[b_t_score_full]."";
						$arrData[$iPsition]["Big"]= "$rss[b_big]";
						
						
						if($rss[b_hdc]!=""){
						$arrData[$iPsition]["Hdc"]= "$rss[b_hdc]";
						$arrData[$iPsition]["Hdc1"]= "$rss[b_hdc_1]";
						$arrData[$iPsition]["Hdc2"]= "$rss[b_hdc_2]";
						
				        $arrData[$iPsition]["No1"]= "$ftcode[0]";
						$arrData[$iPsition]["No2"]= "$ftcode[1]";
						
						}else{
						$arrData[$iPsition]["Hdc"]= "";
						$arrData[$iPsition]["Hdc1"]= "";
						$arrData[$iPsition]["Hdc2"]= "";
						
				        $arrData[$iPsition]["No1"]= "";
						$arrData[$iPsition]["No2"]= "";
							}
						
						if($rss[b_goal]!=""){
						$arrData[$iPsition]["Goal"]= "$rss[b_goal]";
						$arrData[$iPsition]["Goal1"]= "$rss[b_goal_1]";
						$arrData[$iPsition]["Goal2"]= "$rss[b_goal_2]";
						
						$arrData[$iPsition]["No3"]= "$ftcode[2]";
						$arrData[$iPsition]["No4"]= "$ftcode[3]";
						}else{
						$arrData[$iPsition]["Goal"]= "";
						$arrData[$iPsition]["Goal1"]= "";
						$arrData[$iPsition]["Goal2"]= "";
						
						$arrData[$iPsition]["No3"]= "";
						$arrData[$iPsition]["No4"]= "";
						}
						

						
						if($rss[b_1x2_1]!=0){
						$arrData[$iPsition]["X1"]= "$rss[b_1x2_1]";
						$arrData[$iPsition]["XX"]= "$rss[b_1x2_x]";
						$arrData[$iPsition]["X2"]= "$rss[b_1x2_2]";
						
						$arrData[$iPsition]["No5"]= "$ftcode[4]";
						$arrData[$iPsition]["No6"]= "$ftcode[5]";
						$arrData[$iPsition]["No7"]= "$ftcode[6]";
						}else{
						$arrData[$iPsition]["X1"]= "";
						$arrData[$iPsition]["XX"]= "";
						$arrData[$iPsition]["X2"]= "";
						
						$arrData[$iPsition]["No5"]= "";	
						$arrData[$iPsition]["No6"]= "";	
						$arrData[$iPsition]["No7"]= "";	
						}
						
						
							if($rss[b_odd]!=0){
						$arrData[$iPsition]["Odd"]= "$rss[b_odd]";
						$arrData[$iPsition]["Even"]= "$rss[b_even]";			
						
						$arrData[$iPsition]["No8"]= "$ftcode[7]";
						$arrData[$iPsition]["No9"]= "$ftcode[8]";
						}else{
						$arrData[$iPsition]["Odd"]= "";
						$arrData[$iPsition]["Even"]= "";			
						
						$arrData[$iPsition]["No8"]= "";	
						$arrData[$iPsition]["No9"]= "";
							}

						$arrData[$iPsition]["No10"]= "";	
						$arrData[$iPsition]["No11"]= "";	
						$arrData[$iPsition]["No12"]= "";	
						$arrData[$iPsition]["No13"]= "";

	$iPsition++;
			
	}#foreach($arr_zone as $rs){
	}#foreach($arr_id[md5($rs[b_zone])] as $rss){			
	

$url_file=$server_js."txt/json/zone_16.json";	
$d_js=file_get_contents2($url_file);
$arr_zone = json_decode($d_js, true);
	
	
$url_file=$server_js."txt/json/data_6_".$price_type.".json";	
$ds_js=file_get_contents2($url_file);
$arr_id = json_decode($ds_js, true);



foreach($arr_zone as $rs){
	foreach($arr_id[md5($rs[b_zone])] as $rss){
		
	
				    $ftcode=@explode(",", $rss[b_numcode]);
					
					
	
						$arrData[$iPsition]["League"]= "$rss[b_zone]";
						$arrData[$iPsition]["HF"]= "$rss[b_hf]";
						$arrData[$iPsition]["ADD"]= "$rss[b_add]";
						$arrData[$iPsition]["BallID"]= "$rss[b_id]";
						$arrData[$iPsition]["Team1"]= "$rss[b_name_1]";
						$arrData[$iPsition]["Team2"]= "$rss[b_name_2]";
						$arrData[$iPsition]["Play_Time"]= "".date("H.i",$rss[b_date_play])."";
						$arrData[$iPsition]["Play_Score"]= "LIVE";
						$arrData[$iPsition]["Big"]= "$rss[b_big]";
						
						
						if($rss[b_hdc]!=""){
						$arrData[$iPsition]["Hdc"]= "$rss[b_hdc]";
						$arrData[$iPsition]["Hdc1"]= "$rss[b_hdc_1]";
						$arrData[$iPsition]["Hdc2"]= "$rss[b_hdc_2]";
						
				        $arrData[$iPsition]["No1"]= "$ftcode[0]";
						$arrData[$iPsition]["No2"]= "$ftcode[1]";
						
						}else{
						$arrData[$iPsition]["Hdc"]= "";
						$arrData[$iPsition]["Hdc1"]= "";
						$arrData[$iPsition]["Hdc2"]= "";
						
				        $arrData[$iPsition]["No1"]= "";
						$arrData[$iPsition]["No2"]= "";
							}
						
						if($rss[b_goal]!=""){
						$arrData[$iPsition]["Goal"]= "$rss[b_goal]";
						$arrData[$iPsition]["Goal1"]= "$rss[b_goal_1]";
						$arrData[$iPsition]["Goal2"]= "$rss[b_goal_2]";
						
						$arrData[$iPsition]["No3"]= "$ftcode[2]";
						$arrData[$iPsition]["No4"]= "$ftcode[3]";
						}else{
						$arrData[$iPsition]["Goal"]= "";
						$arrData[$iPsition]["Goal1"]= "";
						$arrData[$iPsition]["Goal2"]= "";
						
						$arrData[$iPsition]["No3"]= "";
						$arrData[$iPsition]["No4"]= "";
						}
						

						
						if($rss[b_1x2_1]!=0){
						$arrData[$iPsition]["X1"]= "$rss[b_1x2_1]";
						$arrData[$iPsition]["XX"]= "$rss[b_1x2_x]";
						$arrData[$iPsition]["X2"]= "$rss[b_1x2_2]";
						
						$arrData[$iPsition]["No5"]= "$ftcode[4]";
						$arrData[$iPsition]["No6"]= "$ftcode[5]";
						$arrData[$iPsition]["No7"]= "$ftcode[6]";
						}else{
						$arrData[$iPsition]["X1"]= "";
						$arrData[$iPsition]["XX"]= "";
						$arrData[$iPsition]["X2"]= "";
						
						$arrData[$iPsition]["No5"]= "";	
						$arrData[$iPsition]["No6"]= "";	
						$arrData[$iPsition]["No7"]= "";	
						}
						
						
							if($rss[b_odd]!=0){
						$arrData[$iPsition]["Odd"]= "$rss[b_odd]";
						$arrData[$iPsition]["Even"]= "$rss[b_even]";			
						
						$arrData[$iPsition]["No8"]= "$ftcode[7]";
						$arrData[$iPsition]["No9"]= "$ftcode[8]";
						}else{
						$arrData[$iPsition]["Odd"]= "";
						$arrData[$iPsition]["Even"]= "";			
						
						$arrData[$iPsition]["No8"]= "";	
						$arrData[$iPsition]["No9"]= "";
							}

						$arrData[$iPsition]["No10"]= "";	
						$arrData[$iPsition]["No11"]= "";	
						$arrData[$iPsition]["No12"]= "";	
						$arrData[$iPsition]["No13"]= "";

	$iPsition++;
			
	}#foreach($arr_zone as $rs){
	}#foreach($arr_id[md5($rs[b_zone])] as $rss){				

echo json_encode($arrData);
#	print_r($arrData);	
	

						


		
		

?>