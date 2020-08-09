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




############1#############
$url_file=$server_js."txt/json/member/".$_GET[id].".json";	
$d_js = file_get_contents2($url_file);
$re_m = json_decode($d_js, true);
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

$exr=@explode("*",$re_m[r_agent_id]);
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




	$iPsition = 0;
    $arrData=array();
	
	$price_type=_price_type( $re_m[m_price_type] );

	if($re_m[m_live]==1){
$url_file=$server_js."txt/json/zone_31.json";	
$d_js=file_get_contents2($url_file);
$arr_zone = json_decode($d_js, true);
	
	
$url_file=$server_js."txt/json/data_live_1_".$price_type.".json";	
$ds_js=file_get_contents2($url_file);
$arr_id = json_decode($ds_js, true);

	}



$arrData2 = array();

foreach($arr_zone as $rs){
	$keep_league = 0;
	foreach($arr_id[md5($rs[b_zone])] as $rss){
		//print_r($rss);
		//$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]] = $rss;
		$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["League"]= "Live $rss[b_zone]";
		$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["ADD"]= "$rss[b_add]";
		$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["BallID"]= "$rss[b_id]";
		$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Team1"]= "$rss[b_name_1]";
		$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Team2"]= "$rss[b_name_2]";
		$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Play_Time"]= "".$rss[b_live_showtime]."";
		$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Play_Score"]= "".$rss[b_t_score_full]."";
			
		$exr=@explode(",",$rss[card_r]);
			
		$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Red1"]= intval($exr[0]);
		$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Red2"]= intval($exr[1]);
		
		$ftcode=@explode(",", $rss[b_numcode]);
		
		if($rss[b_hdc]!="" and $rss[b_hf]==2){
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Big_FT"]= "$rss[b_big]";
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc_FT"]= "$rss[b_hdc]";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc1_FT"]= ""._mtr( $re_m[m_level] ,$rss[b_hdc_1],1,$rss[b_big],$se[nam])."";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc2_FT"]= ""._mtr( $re_m[m_level] ,$rss[b_hdc_2],2,$rss[b_big],$se[nam])."";
						
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No1_FT"]= "$ftcode[0]";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No2_FT"]= "$ftcode[1]";
				
				if($arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc_HT"]==""){
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Big_HT"]= "";
					
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc_HT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc1_HT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc2_HT"]= "";

					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No1_HT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No2_HT"]= "";
				}
			}else if($rss[b_hdc]=="" and $rss[b_hf]==2){
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Big_FT"]= "";
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc_FT"]= "";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc1_FT"]= "";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc2_FT"]= "";
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No1_FT"]= "";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No2_FT"]= "";
				
				if($arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc_HT"]==""){
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Big_HT"]= "";
					
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc_HT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc1_HT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc2_HT"]= "";

					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No1_HT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No2_HT"]= "";
				}
			}
			
			if($rss[b_hdc]!="" and $rss[b_hf]==1){
				
				if($arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc_FT"]==""){
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Big_FT"]= "";
					
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc_FT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc1_FT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc2_FT"]= "";

					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No1_FT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No2_FT"]= "";
				}
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Big_HT"]= "$rss[b_big]";
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc_HT"]= "$rss[b_hdc]";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc1_HT"]= ""._mtr( $re_m[m_level] ,$rss[b_hdc_1],1,$rss[b_big],$se[nam])."";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc2_HT"]= ""._mtr( $re_m[m_level] ,$rss[b_hdc_2],2,$rss[b_big],$se[nam])."";
						
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No1_HT"]= "$ftcode[0]";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No2_HT"]= "$ftcode[1]";
				
			}else if($rss[b_hdc]=="" and $rss[b_hf]==1){
				if($arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc_FT"]==""){
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Big_FT"]= "";
					
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc_FT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc1_FT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc2_FT"]= "";

					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No1_FT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No2_FT"]= "";
				}
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Big_HT"]= "";
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc_HT"]= "";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc1_HT"]= "";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc2_HT"]= "";
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No1_HT"]= "";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No2_HT"]= "";
			}
			
			if($rss[b_goal]!="" and $rss[b_hf]==2){
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal_FT"]= "$rss[b_goal]";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal1_FT"]=  ""._mtr( $re_m[m_level] ,$rss[b_goal_1],1,$rss[b_big],$se[nam])."";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal2_FT"]=  ""._mtr( $re_m[m_level] ,$rss[b_goal_2],1,$rss[b_big],$se[nam])."";
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No3_FT"]= "$ftcode[2]";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No4_FT"]= "$ftcode[3]";
				
				if($arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal_HT"]==""){
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal_HT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal1_HT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal2_HT"]= "";

					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No3_HT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No4_HT"]= "";
				}
				
			}else if($rss[b_goal]=="" and $rss[b_hf]==2){
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal_FT"]= "";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal1_FT"]= "";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal2_FT"]= "";
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No3_FT"]= "";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No4_FT"]= "";
				
				if($arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal_HT"]==""){
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal_HT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal1_HT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal2_HT"]= "";

					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No3_HT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No4_HT"]= "";
				}
			}
			
			if($rss[b_goal]!="" and $rss[b_hf]==1){
				
				if($arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal_FT"]==""){
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal_FT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal1_FT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal2_FT"]= "";

					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No3_FT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No4_FT"]= "";
				}
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal_HT"]= "$rss[b_goal]";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal1_HT"]=  ""._mtr( $re_m[m_level] ,$rss[b_goal_1],1,$rss[b_big],$se[nam])."";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal2_HT"]=  ""._mtr( $re_m[m_level] ,$rss[b_goal_2],1,$rss[b_big],$se[nam])."";
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No3_HT"]= "$ftcode[2]";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No4_HT"]= "$ftcode[3]";
				
			}else if($rss[b_goal]=="" and $rss[b_hf]==1){
				
				if($arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal_FT"]==""){
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal_FT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal1_FT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal2_FT"]= "";

					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No3_FT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No4_FT"]= "";
				}
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal_HT"]= "";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal1_HT"]= "";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal2_HT"]= "";
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No3_HT"]= "";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No4_HT"]= "";
			}
			
			if($rss[b_1x2_1]!=0  and $re_m[m_1x2]==1 and $rss[b_hf]==2){
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["X1_FT"]= ""._mtr( $re_m[m_level] ,$rss[b_1x2_1],1,1,$se[nam])."";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["XX_FT"]= ""._mtr( $re_m[m_level] ,$rss[b_1x2_x],1,1,$se[nam])."";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["X2_FT"]= ""._mtr( $re_m[m_level] ,$rss[b_1x2_2],1,1,$se[nam])."";
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No5_FT"]= "$ftcode[4]";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No6_FT"]= "$ftcode[5]";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No7_FT"]= "$ftcode[6]";
				
				if($arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["X1_HT"]==""){
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["X1_HT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["XX_HT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["X2_HT"]= "";

					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No5_HT"]= "";	
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No6_HT"]= "";	
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No7_HT"]= "";	
				}
			}else if($rss[b_1x2_1]==0 and $rss[b_hf]==2){
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["X1_FT"]= "";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["XX_FT"]= "";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["X2_FT"]= "";
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No5_FT"]= "";	
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No6_FT"]= "";	
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No7_FT"]= "";	
				
				if($arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["X1_HT"]==""){
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["X1_HT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["XX_HT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["X2_HT"]= "";

					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No5_HT"]= "";	
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No6_HT"]= "";	
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No7_HT"]= "";	
				}
			}
			
			if($rss[b_1x2_1]!=0  and $re_m[m_1x2]==1 and $rss[b_hf]==1){
				
				if($arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["X1_FT"]==""){
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["X1_FT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["XX_FT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["X2_FT"]= "";

					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No5_FT"]= "";	
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No6_FT"]= "";	
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No7_FT"]= "";	
				}
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["X1_HT"]= ""._mtr( $re_m[m_level] ,$rss[b_1x2_1],1,1,$se[nam])."";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["XX_HT"]= ""._mtr( $re_m[m_level] ,$rss[b_1x2_x],1,1,$se[nam])."";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["X2_HT"]= ""._mtr( $re_m[m_level] ,$rss[b_1x2_2],1,1,$se[nam])."";
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No5_HT"]= "$ftcode[4]";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No6_HT"]= "$ftcode[5]";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No7_HT"]= "$ftcode[6]";
				
				
			}else if($rss[b_1x2_1]==0 and $rss[b_hf]==1){
				
				if($arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["X1_FT"]==""){
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["X1_FT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["XX_FT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["X2_FT"]= "";

					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No5_FT"]= "";	
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No6_FT"]= "";	
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No7_FT"]= "";	
				}
				
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["X1_HT"]= "";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["XX_HT"]= "";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["X2_HT"]= "";
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No5_HT"]= "";	
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No6_HT"]= "";	
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No7_HT"]= "";	
			}
			
			
			
			if($rss[b_odd]!=0  and $re_m[m_1x2]==1 and $rss[b_hf]==2){
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Odd_FT"]= ""._mtr( $re_m[m_level] ,$rss[b_odd],1,1,$se[nam])."";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Even_FT"]=""._mtr( $re_m[m_level] ,$rss[b_even],1,1,$se[nam])."";
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No8_FT"]= "$ftcode[7]";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No9_FT"]= "$ftcode[8]";
				
				if($arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Odd_HT"]==""){
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Odd_HT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Even_HT"]= "";	
				
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No8_HT"]= "";	
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No9_HT"]= "";
				}
				
			}else if($rss[b_odd]==0 and $rss[b_hf]==2){
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Odd_FT"]= "";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Even_FT"]= "";	
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No8_FT"]= "";	
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No9_FT"]= "";
				
				if($arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Odd_HT"]==""){
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Odd_HT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Even_HT"]= "";	
				
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No8_HT"]= "";	
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No9_HT"]= "";
				}
			}
			
			if($rss[b_odd]!=0  and $re_m[m_1x2]==1 and $rss[b_hf]==1){
				
				if($arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Odd_FT"]==""){
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Odd_FT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Even_FT"]= "";	
				
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No8_FT"]= "";	
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No9_FT"]= "";
				}
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Odd_HT"]= ""._mtr( $re_m[m_level] ,$rss[b_odd],1,1,$se[nam])."";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Even_HT"]=""._mtr( $re_m[m_level] ,$rss[b_even],1,1,$se[nam])."";
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No8_HT"]= "$ftcode[7]";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No9_HT"]= "$ftcode[8]";
			}else if($rss[b_odd]==0 and $rss[b_hf]==1){
				
				if($arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Odd_FT"]==""){
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Odd_FT"]= "";
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Even_FT"]= "";	
				
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No8_FT"]= "";	
					$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No9_FT"]= "";
				}
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Odd_HT"]= "";
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Even_HT"]= "";	
				
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No8_HT"]= "";	
				$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No9_HT"]= "";
			}
			
			
			
			$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No10_FT"]= "";	
			$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No11_FT"]= "";	
			$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No12_FT"]= "";	
			$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No13_FT"]= "";
			
			$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No10_HT"]= "";	
			$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No11_HT"]= "";	
			$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No12_HT"]= "";	
			$arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["No13_HT"]= "";

		if(($arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc_FT"]!="" && $arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc1_FT"]!="" && $arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc2_FT"]!="") || ($arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc_HT"]!="" && $arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc1_HT"]!="" && $arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Hdc2_HT"]!="") || ($arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal_FT"]!="" && $arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal1_FT"]!="" && $arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal2_FT"]!="") || ($arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal_HT"]!="" && $arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal1_HT"]!="" && $arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Goal2_HT"]!="") || ($arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["X1_FT"]!="" && $arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["XX_FT"]!="" && $arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["X2_FT"]!="") || ($arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["X1_HT"]!="" && $arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["XX_HT"]!="" && $arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["X2_HT"]!="") || ($arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Odd_FT"]!="" && $arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Even_FT"]!="") || ($arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Odd_HT"]!="" && $arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]["Even_HT"]!="")){
		$keep_league = 1;
		}else{
		unset($arrData2["Live ".$rss[b_zone]][$rss[b_id]][$rss[b_add]]);
	}
			
}#foreach($arr_zone as $rs){
	if($keep_league==0){
		unset($arrData2["Live ".$rs[b_zone]]);
	}
}#foreach($arr_id[md5($rs[b_zone])] as $rss){		
echo json_encode($arrData2);
	

						


		
		

?>