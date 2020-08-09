<?
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);

require('../../../inc/conn.php');
require('../../../inc/function.php');
/*require('../config.php');
 if($ren[con_service]==0){ 
 $arr = array();	
 echo json_encode($arr);
 exit();
 }

############1#############
$url_file=$server_js."txt/json/member/".$_GET[id].".json";	
$d_js = file_get_contents2($url_file);
$re_m = json_decode($d_js, true);*/
############1#############	

/*
$url_file=$server_js."txt/json/member.json";	
$d_js=file_get_contents2($url_file);
$jam = json_decode($d_js, true);

$re_m=$jam[$_GET[id]];
*/

#$re_m[r_agent_id]='*1*';
#$re_m[m_nam]='5,5';
#$re_m[m_level]=2;

/*$exr=@explode("*",$re_m[r_agent_id]);
############1#############
$url_file=$server_js."txt/json/agent/".$exr[1].".json";	
$d_js = file_get_contents2($url_file);
$jag1 = json_decode($d_js, true);
############1#############	
############1#############
$url_file=$server_js."txt/json/agent/".$exr[2].".json";	
$d_js = file_get_contents2($url_file);
$jag2 = json_decode($d_js, true);
############1#############	
############1#############
$url_file=$server_js."txt/json/agent/".$exr[3].".json";	
$d_js = file_get_contents2($url_file);
$jag3 = json_decode($d_js, true);
############1#############	
############1#############
$url_file=$server_js."txt/json/agent/".$exr[4].".json";	
$d_js = file_get_contents2($url_file);
$jag4 = json_decode($d_js, true);
############1#############	
############1#############
$url_file=$server_js."txt/json/agent/".$exr[5].".json";	
$d_js = file_get_contents2($url_file);
$jag5 = json_decode($d_js, true);
############1#############	
############1#############
$url_file=$server_js."txt/json/agent/".$exr[6].".json";	
$d_js = file_get_contents2($url_file);
$jag6 = json_decode($d_js, true);
############1#############	
############1#############
$url_file=$server_js."txt/json/agent/".$exr[7].".json";	
$d_js = file_get_contents2($url_file);
$jag7 = json_decode($d_js, true);
############1#############	
############1#############
$url_file=$server_js."txt/json/agent/".$exr[8].".json";	
$d_js = file_get_contents2($url_file);
$jag8 = json_decode($d_js, true);
############1#############	
############1#############
$url_file=$server_js."txt/json/agent/".$exr[9].".json";	
$d_js = file_get_contents2($url_file);
$jag8 = json_decode($d_js, true);
############1#############	

#############น้ำ
$arnam1=$jag2[r_nam];
$arnam2=$jag3[r_nam];
$arnam3=$jag4[r_nam];
$arnam4=$jag5[r_nam];
$arnam5=$jag6[r_nam];
$arnam6=$jag7[r_nam];
$arnam7=$jag8[r_nam];
$arnam8=$jag9[r_nam];

$se[nam]=array($arnam1,$arnam2,$arnam3,$arnam4,$arnam5,$arnam6,$arnam7,$re_m[m_nam]);


*/

$server_js = "http://207.180.243.69/~step2/data_livezx/";
	$iPsition = 0;
    $arrData=array();
	
	$price_type="d3h1";


$url_file=$server_js."txt/json/zone_16.json";	
$d_js=file_get_contents2($url_file);
$arr_zone = json_decode($d_js, true);

	
$url_file=$server_js."txt/json/data_6.json";	
$ds_js=file_get_contents2($url_file);
$arr_id = json_decode($ds_js, true);

$arrData2 = array();
$zone_index = 0;
foreach($arr_zone as $rs){
	$keep_league = 0;
	foreach($arr_id[md5($rs[b_zone])] as $rss){
		//print_r($rss);
		//$arrData2[$zone_index][$rss[b_id]][$rss[b_add]] = $rss;
		$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["League"]= "$rss[b_zone]";
		$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["ADD"]= "$rss[b_add]";
		$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["BallID"]= "$rss[b_id]";
		$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Team1"]= "$rss[b_name_1]";
		$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Team2"]= "$rss[b_name_2]";
		$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Play_Time"]= "".date("H.i",$rss[b_date_play])."";
		$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Play_Score"]= "LIVE";
			
		$exr=@explode(",",$rss[card_r]);
			
		$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Red1"]= intval($exr[0]);
		$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Red2"]= intval($exr[1]);
		
		$ftcode=@explode(",", $rss[b_numcode]);
		
		if($rss[b_hdc]!="" and $rss[b_hf]==2){
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Big_FT"]= "$rss[b_big]";
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc_FT"]= "$rss[b_hdc]";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc1_FT"]= "".$rss[b_hdc_1]."";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc2_FT"]= "".$rss[b_hdc_2]."";
						
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No1_FT"]= "$ftcode[0]";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No2_FT"]= "$ftcode[1]";
				
				if($arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc_HT"]==""){
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Big_HT"]= "";
					
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc_HT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc1_HT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc2_HT"]= "";

					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No1_HT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No2_HT"]= "";
				}
			}else if($rss[b_hdc]=="" and $rss[b_hf]==2){
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Big_FT"]= "";
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc_FT"]= "";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc1_FT"]= "";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc2_FT"]= "";
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No1_FT"]= "";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No2_FT"]= "";
				
				if($arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc_HT"]==""){
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Big_HT"]= "";
					
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc_HT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc1_HT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc2_HT"]= "";

					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No1_HT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No2_HT"]= "";
				}
			}
			
			if($rss[b_hdc]!="" and $rss[b_hf]==1){
				
				if($arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc_FT"]==""){
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Big_FT"]= "";
					
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc_FT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc1_FT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc2_FT"]= "";

					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No1_FT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No2_FT"]= "";
				}
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Big_HT"]= "$rss[b_big]";
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc_HT"]= "$rss[b_hdc]";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc1_HT"]= "".$rss[b_hdc_1]."";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc2_HT"]= "".$rss[b_hdc_2]."";
						
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No1_HT"]= "$ftcode[0]";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No2_HT"]= "$ftcode[1]";
				
			}else if($rss[b_hdc]=="" and $rss[b_hf]==1){
				if($arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc_FT"]==""){
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Big_FT"]= "";
					
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc_FT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc1_FT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc2_FT"]= "";

					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No1_FT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No2_FT"]= "";
				}
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Big_HT"]= "";
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc_HT"]= "";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc1_HT"]= "";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc2_HT"]= "";
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No1_HT"]= "";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No2_HT"]= "";
			}
			
			if($rss[b_goal]!="" and $rss[b_hf]==2){
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal_FT"]= "$rss[b_goal]";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal1_FT"]=  "".$rss[b_goal_1]."";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal2_FT"]=  "".$rss[b_goal_2]."";
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No3_FT"]= "$ftcode[2]";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No4_FT"]= "$ftcode[3]";
				
				if($arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal_HT"]==""){
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal_HT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal1_HT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal2_HT"]= "";

					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No3_HT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No4_HT"]= "";
				}
				
			}else if($rss[b_goal]=="" and $rss[b_hf]==2){
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal_FT"]= "";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal1_FT"]= "";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal2_FT"]= "";
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No3_FT"]= "";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No4_FT"]= "";
				
				if($arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal_HT"]==""){
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal_HT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal1_HT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal2_HT"]= "";

					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No3_HT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No4_HT"]= "";
				}
			}
			
			if($rss[b_goal]!="" and $rss[b_hf]==1){
				
				if($arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal_FT"]==""){
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal_FT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal1_FT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal2_FT"]= "";

					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No3_FT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No4_FT"]= "";
				}
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal_HT"]= "$rss[b_goal]";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal1_HT"]=  "".$rss[b_goal_1]."";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal2_HT"]=  "".$rss[b_goal_2]."";
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No3_HT"]= "$ftcode[2]";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No4_HT"]= "$ftcode[3]";
				
			}else if($rss[b_goal]=="" and $rss[b_hf]==1){
				
				if($arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal_FT"]==""){
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal_FT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal1_FT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal2_FT"]= "";

					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No3_FT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No4_FT"]= "";
				}
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal_HT"]= "";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal1_HT"]= "";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal2_HT"]= "";
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No3_HT"]= "";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No4_HT"]= "";
			}
			
			if($rss[b_1x2_1]!=0  and $re_m[m_1x2]==1 and $rss[b_hf]==2){
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["X1_FT"]= "".$rss[b_1x2_1]."";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["XX_FT"]= "".$rss[b_1x2_x]."";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["X2_FT"]= "".$rss[b_1x2_2]."";
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No5_FT"]= "$ftcode[4]";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No6_FT"]= "$ftcode[5]";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No7_FT"]= "$ftcode[6]";
				
				if($arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["X1_HT"]==""){
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["X1_HT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["XX_HT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["X2_HT"]= "";

					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No5_HT"]= "";	
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No6_HT"]= "";	
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No7_HT"]= "";	
				}
			}else if($rss[b_1x2_1]==0 and $rss[b_hf]==2){
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["X1_FT"]= "";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["XX_FT"]= "";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["X2_FT"]= "";
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No5_FT"]= "";	
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No6_FT"]= "";	
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No7_FT"]= "";	
				
				if($arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["X1_HT"]==""){
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["X1_HT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["XX_HT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["X2_HT"]= "";

					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No5_HT"]= "";	
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No6_HT"]= "";	
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No7_HT"]= "";	
				}
			}
			
			if($rss[b_1x2_1]!=0  and $re_m[m_1x2]==1 and $rss[b_hf]==1){
				
				if($arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["X1_FT"]==""){
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["X1_FT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["XX_FT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["X2_FT"]= "";

					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No5_FT"]= "";	
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No6_FT"]= "";	
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No7_FT"]= "";	
				}
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["X1_HT"]= "".$rss[b_1x2_1]."";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["XX_HT"]= "".$rss[b_1x2_x]."";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["X2_HT"]= "".$rss[b_1x2_2]."";
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No5_HT"]= "$ftcode[4]";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No6_HT"]= "$ftcode[5]";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No7_HT"]= "$ftcode[6]";
				
				
			}else if($rss[b_1x2_1]==0 and $rss[b_hf]==1){
				
				if($arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["X1_FT"]==""){
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["X1_FT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["XX_FT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["X2_FT"]= "";

					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No5_FT"]= "";	
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No6_FT"]= "";	
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No7_FT"]= "";	
				}
				
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["X1_HT"]= "";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["XX_HT"]= "";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["X2_HT"]= "";
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No5_HT"]= "";	
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No6_HT"]= "";	
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No7_HT"]= "";	
			}
			
			
			
			if($rss[b_odd]!=0  and $re_m[m_1x2]==1 and $rss[b_hf]==2){
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Odd_FT"]= "".$rss[b_odd]."";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Even_FT"]="".$rss[b_even]."";
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No8_FT"]= "$ftcode[7]";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No9_FT"]= "$ftcode[8]";
				
				if($arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Odd_HT"]==""){
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Odd_HT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Even_HT"]= "";	
				
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No8_HT"]= "";	
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No9_HT"]= "";
				}
				
			}else if($rss[b_odd]==0 and $rss[b_hf]==2){
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Odd_FT"]= "";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Even_FT"]= "";	
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No8_FT"]= "";	
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No9_FT"]= "";
				
				if($arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Odd_HT"]==""){
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Odd_HT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Even_HT"]= "";	
				
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No8_HT"]= "";	
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No9_HT"]= "";
				}
			}
			
			if($rss[b_odd]!=0  and $re_m[m_1x2]==1 and $rss[b_hf]==1){
				
				if($arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Odd_FT"]==""){
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Odd_FT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Even_FT"]= "";	
				
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No8_FT"]= "";	
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No9_FT"]= "";
				}
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Odd_HT"]= "".$rss[b_odd]."";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Even_HT"]="".$rss[b_even]."";
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No8_HT"]= "$ftcode[7]";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No9_HT"]= "$ftcode[8]";
			}else if($rss[b_odd]==0 and $rss[b_hf]==1){
				
				if($arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Odd_FT"]==""){
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Odd_FT"]= "";
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Even_FT"]= "";	
				
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No8_FT"]= "";	
					$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No9_FT"]= "";
				}
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Odd_HT"]= "";
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Even_HT"]= "";	
				
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No8_HT"]= "";	
				$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No9_HT"]= "";
			}
			
			
			
			$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No10_FT"]= "";	
			$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No11_FT"]= "";	
			$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No12_FT"]= "";	
			$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No13_FT"]= "";
			
			$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No10_HT"]= "";	
			$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No11_HT"]= "";	
			$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No12_HT"]= "";	
			$arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["No13_HT"]= "";

	/*if(($arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc_FT"]!="" && $arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc1_FT"]!="" && $arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc2_FT"]!="") || ($arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc_HT"]!="" && $arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc1_HT"]!="" && $arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Hdc2_HT"]!="") || ($arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal_FT"]!="" && $arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal1_FT"]!="" && $arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal2_FT"]!="") || ($arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal_HT"]!="" && $arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal1_HT"]!="" && $arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Goal2_HT"]!="") || ($arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["X1_FT"]!="" && $arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["XX_FT"]!="" && $arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["X2_FT"]!="") || ($arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["X1_HT"]!="" && $arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["XX_HT"]!="" && $arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["X2_HT"]!="") || ($arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Odd_FT"]!="" && $arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Even_FT"]!="") || ($arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Odd_HT"]!="" && $arrData2[$zone_index][$rss[b_id]][$rss[b_add]]["Even_HT"]!="")){
		$keep_league = 1;
		}else{
		unset($arrData2[$zone_index][$rss[b_id]]);
	}*/
			
}#foreach($arr_zone as $rs){
	/*if($keep_league==0){
		unset($arrData2[$zone_index]);
	}else{*/
		$zone_index++;
	//}
}	
$i1=0;
foreach($arrData2 as $rs){
	$i2=0;
	foreach($rs as $rss){
		$i3=0;
		foreach($rss as $rsss){
			if(($rsss["Hdc_FT"]!="" && $rsss["Hdc1_FT"]!="" && $rsss["Hdc2_FT"]!="") || ($rsss["Hdc_HT"]!="" && $rsss["Hdc1_HT"]!="" && $rsss["Hdc2_HT"]!="") || ($rsss["Goal_FT"]!="" && $rsss["Goal1_FT"]!="" && $rsss["Goal2_FT"]!="") || ($rsss["Goal_HT"]!="" && $rsss["Goal1_HT"]!="" && $rsss["Goal2_HT"]!="") || ($rsss["X1_FT"]!="" && $rsss["XX_FT"]!="" && $rsss["X2_FT"]!="") || ($rsss["X1_HT"]!="" && $rsss["XX_HT"]!="" && $rsss["X2_HT"]!="") || ($rsss["Odd_FT"]!="" && $rsss["Even_FT"]!="") || ($rsss["Odd_HT"]!="" && $rsss["Even_HT"]!="")){
				$arrData[$i1][$i2][$i3] = $rsss;
				$i3++;
			}
		}
		if(count($arrData[$i1][$i2])>0){
			$i2++;
		}else{
			unset($arrData[$i1][$i2]);
		}
	}
	if(count($arrData[$i1])>0){
		$i1++;
	}else{
		unset($arrData[$i1]);
	}
}
//print_r($arrData);
echo json_encode($arrData);
?>