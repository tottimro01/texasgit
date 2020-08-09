<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
require "../../inc/conn.php";
require('../../inc/function.php');


#######################ENGLISH

#$data1_en=file_get_contents2("xxx.html");
$data1_en=file_get_contents2("http://www.atom168.com/vvip2541/Soccer_hdp.php");


$sport1_en = json_decode2($data1_en, true);


echo"<hr>111111111111111111111111111111111111111<hr>";
$zone_sport=1;
require('../../inc/ok_block_1.php');
#####################################111111111111111111111111111111111111111
if(count($sport1_en[JSOdds])>0){
	

for($y=0;$y<count($sport1_en[JSOdds]);$y++){ 


			
					$team_1_en = _html($sport1_en[JSOdds][$y][18]);
					$team_2_en = _html($sport1_en[JSOdds][$y][20]);
					
					$team_1_cn = _html($sport1_cn[JSOdds][$y][18]);
					$team_2_cn = _html($sport1_cn[JSOdds][$y][20]);
					
					$team_1_th = _html($sport1_th[JSOdds][$y][18]);
					$team_2_th = _html($sport1_th[JSOdds][$y][20]);
					
					$team_1_vn = _html($sport1_vn[JSOdds][$y][18]);
					$team_2_vn = _html($sport1_vn[JSOdds][$y][20]);
					
					$team_1_id = _html($sport1_id[JSOdds][$y][18]);
					$team_2_id = _html($sport1_id[JSOdds][$y][20]);
					
					$team_1_jp = _html($sport1_jp[JSOdds][$y][18]);
					$team_2_jp = _html($sport1_jp[JSOdds][$y][20]);
					
					$team_1_ko = _html($sport1_ko[JSOdds][$y][18]);
					$team_2_ko = _html($sport1_ko[JSOdds][$y][20]);
			
if($team_1_en!=""){
	

$leage_en = _html($sport1_en[JSOdds][$y][3]);	
$leage_cn = _html($sport1_cn[JSOdds][$y][3]);	
$leage_th = _html($sport1_th[JSOdds][$y][3]);	
$leage_vn = _html($sport1_vn[JSOdds][$y][3]);	
$leage_id = _html($sport1_id[JSOdds][$y][3]);	
$leage_jp = _html($sport1_jp[JSOdds][$y][3]);	
$leage_ko = _html($sport1_ko[JSOdds][$y][3]);	

if (_in_ar($leage_en , $leage_c)==1)
  {	
  
  print_r($sport1_en[JSOdds][$y]);
echo'<hr>';

$xdata=	explode("|",_html($sport[JSOdds][$y][62]));
	$zone_id = $xdata[0];
	$idball = $xdata[1];
	
/*
				
					  echo"<br>EN=$leage_en , $team_1_en  , '$team_2_en ";
					  echo" CN=$leage_cn , $team_1_cn  , '$team_2_cn ";
					  echo" TH=$leage_th , $team_1_th  , '$team_2_th ";
					  echo" VN=$leage_vn , $team_1_vn  , '$team_2_vn ";
					  echo" ID=$leage_id , $team_1_id  , '$team_2_id ";
					    echo" JP=$leage_jp , $team_1_jp  , '$team_2_jp ";
						  echo" KO=$leage_ko , $team_1_ko  , '$team_2_ko ";

*/
####################################################

			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_zone(en,th,ch,cs,jp,ko,vn,id , lang_sport) value('$leage_en' ,'$leage_th','$leage_cn','$leage_cn','$leage_jp','$leage_ko','$leage_vn','$leage_id', '$zone_sport');";
	#	sql_query($sql);

####################################################

			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_team(en,th,ch,cs,jp,ko,vn,id  , lang_sport) value('$team_1_en' ,'$team_1_th','$team_1_cn','$team_1_cn','$team_1_jp','$team_1_ko','$team_1_vn','$team_1_id' , '$zone_sport');";
	#	sql_query($sql);
			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_team(en,th,ch,cs,jp,ko,vn,id  , lang_sport) value('$team_2_en' ,'$team_2_th','$team_2_cn','$team_2_cn','$team_2_jp','$team_2_ko','$team_2_vn','$team_2_id' , '$zone_sport');";
	#	sql_query($sql);

					}
				}
			}
	}
#####################################111111111111111111111111111111111111111



?>