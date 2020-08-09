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

$url_file=$server_js."txt/json/member.json";	
$d_js=file_get_contents2($url_file);
$jam = json_decode($d_js, true);

print_r($jam[516]);
exit();
$re_m=$jam[$_GET[id]];

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
							
							echo $re_m[m_level]."######"; echo $rss[b_hdc_1]."#####"; echo $rss[b_big]."#####"; echo $se[nam];
							exit();
						$arrData[$iPsition]["Hdc"]= "$rss[b_hdc]";
						$arrData[$iPsition]["Hdc1"]= ""._mtr( $re_m[m_level] ,$rss[b_hdc_1],1,$rss[b_big],$se[nam])."";
						$arrData[$iPsition]["Hdc2"]= ""._mtr( $re_m[m_level] ,$rss[b_hdc_2],2,$rss[b_big],$se[nam])."";
						
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
						$arrData[$iPsition]["Goal1"]=  ""._mtr( $re_m[m_level] ,$rss[b_goal_1],1,$rss[b_big],$se[nam])."";
						$arrData[$iPsition]["Goal2"]=  ""._mtr( $re_m[m_level] ,$rss[b_goal_2],1,$rss[b_big],$se[nam])."";
						
						$arrData[$iPsition]["No3"]= "$ftcode[2]";
						$arrData[$iPsition]["No4"]= "$ftcode[3]";
						}else{
						$arrData[$iPsition]["Goal"]= "";
						$arrData[$iPsition]["Goal1"]= "";
						$arrData[$iPsition]["Goal2"]= "";
						
						$arrData[$iPsition]["No3"]= "";
						$arrData[$iPsition]["No4"]= "";
						}
						

						
						if($rss[b_1x2_1]!=0  and $re_m[m_1x2]==1){
						$arrData[$iPsition]["X1"]= ""._mtr( $re_m[m_level] ,$rss[b_1x2_1],1,1,$se[nam])."";
						$arrData[$iPsition]["XX"]= ""._mtr( $re_m[m_level] ,$rss[b_1x2_x],1,1,$se[nam])."";
						$arrData[$iPsition]["X2"]= ""._mtr( $re_m[m_level] ,$rss[b_1x2_2],1,1,$se[nam])."";
						
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
						
						
							if($rss[b_odd]!=0  and $re_m[m_1x2]==1){
						$arrData[$iPsition]["Odd"]= ""._mtr( $re_m[m_level] ,$rss[b_odd],1,1,$se[nam])."";
						$arrData[$iPsition]["Even"]=""._mtr( $re_m[m_level] ,$rss[b_even],1,1,$se[nam])."";
						
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
		
						$exr=@explode(",",$rss[card_r]);
		
						$arrData[$iPsition]["Red1"]= intval($exr[0]);
						$arrData[$iPsition]["Red2"]= intval($exr[1]);

	$iPsition++;
			
	}#foreach($arr_zone as $rs){
	}#foreach($arr_id[md5($rs[b_zone])] as $rss){				

echo json_encode($arrData);
#	print_r($arrData);	
	

						


		
		

?>