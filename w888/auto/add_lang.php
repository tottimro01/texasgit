<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<meta charset="UTF-8">
<?php
require('../inc/conn.php');
require('../inc/function.php');



#######################CHAINA
file_get_contents2("http://www.atom168.com/vvip2541/lang.php?lang=ZH-CN");
$data1_cn=file_get_contents2("http://www.atom168.com/vvip2541/Soccer_hdp.php");
$data3_cn=file_get_contents2("http://www.atom168.com/vvip2541/Basketball.php");
$data4_cn=file_get_contents2("http://www.atom168.com/vvip2541/USAFootball.php");
$data5_cn=file_get_contents2("http://www.atom168.com/vvip2541/Baseball.php");
$data6_cn=file_get_contents2("http://www.atom168.com/vvip2541/Hockey.php");
$data7_cn=file_get_contents2("http://www.atom168.com/vvip2541/Tennis.php");
$data8_cn=file_get_contents2("http://www.atom168.com/vvip2541/Volleyball.php");
$data9_cn=file_get_contents2("http://www.atom168.com/vvip2541/Badminton.php");
$data10_cn=file_get_contents2("http://www.atom168.com/vvip2541/Snooker.php");
#######################ภาษาไทย
file_get_contents2("http://www.atom168.com/vvip2541/lang.php?lang=EN-GB");
$data1_th=file_get_contents2("http://www.atom168.com/vvip2541/Soccer_hdp.php");
$data3_th=file_get_contents2("http://www.atom168.com/vvip2541/Basketball.php");
$data4_th=file_get_contents2("http://www.atom168.com/vvip2541/USAFootball.php");
$data5_th=file_get_contents2("http://www.atom168.com/vvip2541/Baseball.php");
$data6_th=file_get_contents2("http://www.atom168.com/vvip2541/Hockey.php");
$data7_th=file_get_contents2("http://www.atom168.com/vvip2541/Tennis.php");
$data8_th=file_get_contents2("http://www.atom168.com/vvip2541/Volleyball.php");
$data9_th=file_get_contents2("http://www.atom168.com/vvip2541/Badminton.php");
$data10_th=file_get_contents2("http://www.atom168.com/vvip2541/Snooker.php");
#######################เวียดนาม
file_get_contents2("http://www.atom168.com/vvip2541/lang.php?lang=EN-IE");
$data1_vn=file_get_contents2("http://www.atom168.com/vvip2541/Soccer_hdp.php");
$data3_vn=file_get_contents2("http://www.atom168.com/vvip2541/Basketball.php");
$data4_vn=file_get_contents2("http://www.atom168.com/vvip2541/USAFootball.php");
$data5_vn=file_get_contents2("http://www.atom168.com/vvip2541/Baseball.php");
$data6_vn=file_get_contents2("http://www.atom168.com/vvip2541/Hockey.php");
$data7_vn=file_get_contents2("http://www.atom168.com/vvip2541/Tennis.php");
$data8_vn=file_get_contents2("http://www.atom168.com/vvip2541/Volleyball.php");
$data9_vn=file_get_contents2("http://www.atom168.com/vvip2541/Badminton.php");
$data10_vn=file_get_contents2("http://www.atom168.com/vvip2541/Snooker.php");
#######################INDONESIAN
file_get_contents2("http://www.atom168.com/vvip2541/lang.php?lang=EN-AU");
$data1_id=file_get_contents2("http://www.atom168.com/vvip2541/Soccer_hdp.php");
$data3_id=file_get_contents2("http://www.atom168.com/vvip2541/Basketball.php");
$data4_id=file_get_contents2("http://www.atom168.com/vvip2541/USAFootball.php");
$data5_id=file_get_contents2("http://www.atom168.com/vvip2541/Baseball.php");
$data6_id=file_get_contents2("http://www.atom168.com/vvip2541/Hockey.php");
$data7_id=file_get_contents2("http://www.atom168.com/vvip2541/Tennis.php");
$data8_id=file_get_contents2("http://www.atom168.com/vvip2541/Volleyball.php");
$data9_id=file_get_contents2("http://www.atom168.com/vvip2541/Badminton.php");
$data10_id=file_get_contents2("http://www.atom168.com/vvip2541/Snooker.php");
#######################JAPAN
file_get_contents2("http://www.atom168.com/vvip2541/lang.php?lang=JA-JP");
$data1_jp=file_get_contents2("http://www.atom168.com/vvip2541/Soccer_hdp.php");
$data3_jp=file_get_contents2("http://www.atom168.com/vvip2541/Basketball.php");
$data4_jp=file_get_contents2("http://www.atom168.com/vvip2541/USAFootball.php");
$data5_jp=file_get_contents2("http://www.atom168.com/vvip2541/Baseball.php");
$data6_jp=file_get_contents2("http://www.atom168.com/vvip2541/Hockey.php");
$data7_jp=file_get_contents2("http://www.atom168.com/vvip2541/Tennis.php");
$data8_jp=file_get_contents2("http://www.atom168.com/vvip2541/Volleyball.php");
$data9_jp=file_get_contents2("http://www.atom168.com/vvip2541/Badminton.php");
$data10_jp=file_get_contents2("http://www.atom168.com/vvip2541/Snooker.php");
#######################KOREAN
file_get_contents2("http://www.atom168.com/vvip2541/lang.php?lang=EN-TT");
$data1_ko=file_get_contents2("http://www.atom168.com/vvip2541/Soccer_hdp.php");
$data3_ko=file_get_contents2("http://www.atom168.com/vvip2541/Basketball.php");
$data4_ko=file_get_contents2("http://www.atom168.com/vvip2541/USAFootball.php");
$data5_ko=file_get_contents2("http://www.atom168.com/vvip2541/Baseball.php");
$data6_ko=file_get_contents2("http://www.atom168.com/vvip2541/Hockey.php");
$data7_ko=file_get_contents2("http://www.atom168.com/vvip2541/Tennis.php");
$data8_ko=file_get_contents2("http://www.atom168.com/vvip2541/Volleyball.php");
$data9_ko=file_get_contents2("http://www.atom168.com/vvip2541/Badminton.php");
$data10_ko=file_get_contents2("http://www.atom168.com/vvip2541/Snooker.php");



#######################ENGLISH
file_get_contents2("http://www.atom168.com/vvip2541/lang.php?lang=EN-US");
$data1_en=file_get_contents2("http://www.atom168.com/vvip2541/Soccer_hdp.php");
$data3_en=file_get_contents2("http://www.atom168.com/vvip2541/Basketball.php");
$data4_en=file_get_contents2("http://www.atom168.com/vvip2541/USAFootball.php");
$data5_en=file_get_contents2("http://www.atom168.com/vvip2541/Baseball.php");
$data6_en=file_get_contents2("http://www.atom168.com/vvip2541/Hockey.php");
$data7_en=file_get_contents2("http://www.atom168.com/vvip2541/Tennis.php");
$data8_en=file_get_contents2("http://www.atom168.com/vvip2541/Volleyball.php");
$data9_en=file_get_contents2("http://www.atom168.com/vvip2541/Badminton.php");
$data10_en=file_get_contents2("http://www.atom168.com/vvip2541/Snooker.php");


$sport1_en = json_decode2($data1_en, true);
$sport1_cn = json_decode2($data1_cn, true);
$sport1_th = json_decode2($data1_th, true);
$sport1_vn = json_decode2($data1_vn, true);
$sport1_id = json_decode2($data1_id, true);
$sport1_jp = json_decode2($data1_jp, true);
$sport1_ko = json_decode2($data1_ko, true);

$sport3_en = json_decode2($data3_en, true);
$sport3_cn = json_decode2($data3_cn, true);
$sport3_th = json_decode2($data3_th, true);
$sport3_vn = json_decode2($data3_vn, true);
$sport3_id = json_decode2($data3_id, true);
$sport3_jp = json_decode2($data3_jp, true);
$sport3_ko = json_decode2($data3_ko, true);

$sport4_en = json_decode2($data4_en, true);
$sport4_cn = json_decode2($data4_cn, true);
$sport4_th = json_decode2($data4_th, true);
$sport4_vn = json_decode2($data4_vn, true);
$sport4_id = json_decode2($data4_id, true);
$sport4_jp = json_decode2($data4_jp, true);
$sport4_ko = json_decode2($data4_ko, true);

$sport5_en = json_decode2($data5_en, true);
$sport5_cn = json_decode2($data5_cn, true);
$sport5_th = json_decode2($data5_th, true);
$sport5_vn = json_decode2($data5_vn, true);
$sport5_id = json_decode2($data5_id, true);
$sport5_jp = json_decode2($data5_jp, true);
$sport5_ko = json_decode2($data5_ko, true);

$sport6_en = json_decode2($data6_en, true);
$sport6_cn = json_decode2($data6_cn, true);
$sport6_th = json_decode2($data6_th, true);
$sport6_vn = json_decode2($data6_vn, true);
$sport6_id = json_decode2($data6_id, true);
$sport6_jp = json_decode2($data6_jp, true);
$sport6_ko = json_decode2($data6_ko, true);

$sport7_en = json_decode2($data7_en, true);
$sport7_cn = json_decode2($data7_cn, true);
$sport7_th = json_decode2($data7_th, true);
$sport7_vn = json_decode2($data7_vn, true);
$sport7_id = json_decode2($data7_id, true);
$sport7_jp = json_decode2($data7_jp, true);
$sport7_ko = json_decode2($data7_ko, true);

$sport8_en = json_decode2($data8_en, true);
$sport8_cn = json_decode2($data8_cn, true);
$sport8_th = json_decode2($data8_th, true);
$sport8_vn = json_decode2($data8_vn, true);
$sport8_id = json_decode2($data8_id, true);
$sport8_jp = json_decode2($data8_jp, true);
$sport8_ko = json_decode2($data8_ko, true);

$sport9_en = json_decode2($data9_en, true);
$sport9_cn = json_decode2($data9_cn, true);
$sport9_th = json_decode2($data9_th, true);
$sport9_vn = json_decode2($data9_vn, true);
$sport9_id = json_decode2($data9_id, true);
$sport9_jp = json_decode2($data9_jp, true);
$sport9_ko = json_decode2($data9_ko, true);

$sport10_en = json_decode2($data10_en, true);
$sport10_cn = json_decode2($data10_cn, true);
$sport10_th = json_decode2($data10_th, true);
$sport10_vn = json_decode2($data10_vn, true);
$sport10_id = json_decode2($data10_id, true);
$sport10_jp = json_decode2($data10_jp, true);
$sport10_ko = json_decode2($data10_ko, true);


echo"<hr>111111111111111111111111111111111111111<hr>";
$zone_sport=1;
require('../inc/ok_block_1.php');
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
  ###################### Live Center
  /*
$Live_center = _html($sport1_ko[JSOdds][$y][61]);
  if($Live_center>0){
$sql="update bom_tb_data_football_single set b_livecenter='$Live_center' where b_date='"._bdate()."' and b_zone='$leage_en' and  b_name_1='$team_1_en' ;";
sql_query($sql);
$sql="update bom_tb_data_football_single set b_livecenter='$Live_center' where b_date='"._bdate()."' and b_zone='$leage_en' and  b_name_2='$team_2_en' ;";
sql_query($sql);

$sql="update bom_tb_data_football_single set b_livecenter='$Live_center' where b_date='"._bdate()."'  and  b_name_1='$team_1_en'  and b_livecenter=0;";
sql_query($sql);
$sql="update bom_tb_data_football_single set b_livecenter='$Live_center' where b_date='"._bdate()."'  and  b_name_2='$team_2_en'  and b_livecenter=0;";
sql_query($sql);
	  }
	 */ 
	
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
		sql_query($sql);

####################################################

			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_team(en,th,ch,cs,jp,ko,vn,id  , lang_sport) value('$team_1_en' ,'$team_1_th','$team_1_cn','$team_1_cn','$team_1_jp','$team_1_ko','$team_1_vn','$team_1_id' , '$zone_sport');";
		sql_query($sql);
			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_team(en,th,ch,cs,jp,ko,vn,id  , lang_sport) value('$team_2_en' ,'$team_2_th','$team_2_cn','$team_2_cn','$team_2_jp','$team_2_ko','$team_2_vn','$team_2_id' , '$zone_sport');";
		sql_query($sql);

					}
				}
			}
	}
#####################################111111111111111111111111111111111111111




echo"<hr>333333333333333333333333333333333<hr>";
$zone_sport=3;
require('../inc/ok_block_'.$zone_sport.'.php');
#####################################333333333333333333333333333333333
if(count($sport3_en[JSOdds])>0){
	

for($y=0;$y<count($sport3_en[JSOdds]);$y++){ 
			
					$team_1_en = _html($sport3_en[JSOdds][$y][5]);
					$team_2_en = _html($sport3_en[JSOdds][$y][6]);
					
					$team_1_cn = _html($sport3_cn[JSOdds][$y][5]);
					$team_2_cn = _html($sport3_cn[JSOdds][$y][6]);
					
					$team_1_th = _html($sport3_th[JSOdds][$y][5]);
					$team_2_th = _html($sport3_th[JSOdds][$y][6]);
					
					$team_1_vn = _html($sport3_vn[JSOdds][$y][5]);
					$team_2_vn = _html($sport3_vn[JSOdds][$y][6]);
					
					$team_1_id = _html($sport3_id[JSOdds][$y][5]);
					$team_2_id = _html($sport3_id[JSOdds][$y][6]);
					
					$team_1_jp = _html($sport3_jp[JSOdds][$y][5]);
					$team_2_jp = _html($sport3_jp[JSOdds][$y][6]);
					
					$team_1_ko = _html($sport3_ko[JSOdds][$y][5]);
					$team_2_ko = _html($sport3_ko[JSOdds][$y][6]);
			
if($team_1_en!=""){
	

$leage_en = _html($sport3_en[JSOdds][$y][2]);	
$leage_cn = _html($sport3_cn[JSOdds][$y][2]);	
$leage_th = _html($sport3_th[JSOdds][$y][2]);	
$leage_vn = _html($sport3_vn[JSOdds][$y][2]);	
$leage_id = _html($sport3_id[JSOdds][$y][2]);	
$leage_jp = _html($sport3_jp[JSOdds][$y][2]);	
$leage_ko = _html($sport3_ko[JSOdds][$y][2]);	

if (_in_ar($leage_en , $leage_c)==1)
  {	
	
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
		sql_query($sql);

####################################################

			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_team(en,th,ch,cs,jp,ko,vn,id  , lang_sport) value('$team_1_en' ,'$team_1_th','$team_1_cn','$team_1_cn','$team_1_jp','$team_1_ko','$team_1_vn','$team_1_id' , '$zone_sport');";
		sql_query($sql);
			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_team(en,th,ch,cs,jp,ko,vn,id  , lang_sport) value('$team_2_en' ,'$team_2_th','$team_2_cn','$team_2_cn','$team_2_jp','$team_2_ko','$team_2_vn','$team_2_id' , '$zone_sport');";
		sql_query($sql);

					}
				}
			}
	}
#####################################333333333333333333333333333333333


echo"<hr>444444444444444444444444444444444444444<hr>";
$zone_sport=4;
require('../inc/ok_block_'.$zone_sport.'.php');
#####################################444444444444444444444444444444444444444
if(count($sport4_en[JSOdds])>0){
	

for($y=0;$y<count($sport4_en[JSOdds]);$y++){ 
			
					$team_1_en = _html($sport4_en[JSOdds][$y][5]);
					$team_2_en = _html($sport4_en[JSOdds][$y][6]);
					
					$team_1_cn = _html($sport4_cn[JSOdds][$y][5]);
					$team_2_cn = _html($sport4_cn[JSOdds][$y][6]);
					
					$team_1_th = _html($sport4_th[JSOdds][$y][5]);
					$team_2_th = _html($sport4_th[JSOdds][$y][6]);
					
					$team_1_vn = _html($sport4_vn[JSOdds][$y][5]);
					$team_2_vn = _html($sport4_vn[JSOdds][$y][6]);
					
					$team_1_id = _html($sport4_id[JSOdds][$y][5]);
					$team_2_id = _html($sport4_id[JSOdds][$y][6]);
					
					$team_1_jp = _html($sport4_jp[JSOdds][$y][5]);
					$team_2_jp = _html($sport4_jp[JSOdds][$y][6]);
					
					$team_1_ko = _html($sport4_ko[JSOdds][$y][5]);
					$team_2_ko = _html($sport4_ko[JSOdds][$y][6]);
			
if($team_1_en!=""){
	

$leage_en = _html($sport4_en[JSOdds][$y][2]);	
$leage_cn = _html($sport4_cn[JSOdds][$y][2]);	
$leage_th = _html($sport4_th[JSOdds][$y][2]);	
$leage_vn = _html($sport4_vn[JSOdds][$y][2]);	
$leage_id = _html($sport4_id[JSOdds][$y][2]);	
$leage_jp = _html($sport4_jp[JSOdds][$y][2]);	
$leage_ko = _html($sport4_ko[JSOdds][$y][2]);	

if (_in_ar($leage_en , $leage_c)==1)
  {	

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
		sql_query($sql);
	
####################################################

			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_team(en,th,ch,cs,jp,ko,vn,id  , lang_sport) value('$team_1_en' ,'$team_1_th','$team_1_cn','$team_1_cn','$team_1_jp','$team_1_ko','$team_1_vn','$team_1_id' , '$zone_sport');";
		sql_query($sql);
			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_team(en,th,ch,cs,jp,ko,vn,id  , lang_sport) value('$team_2_en' ,'$team_2_th','$team_2_cn','$team_2_cn','$team_2_jp','$team_2_ko','$team_2_vn','$team_2_id' , '$zone_sport');";
		sql_query($sql);

					}
				}
			}
	}
#####################################444444444444444444444444444444444444444



echo"<hr>55555555555555555555555555555555555<hr>";

$zone_sport=5;
require('../inc/ok_block_'.$zone_sport.'.php');
#####################################55555555555555555555555555555555555
if(count($sport5_en[JSOdds])>0){
	

for($y=0;$y<count($sport5_en[JSOdds]);$y++){ 
			
					$team_1_en = _html($sport5_en[JSOdds][$y][5]);
					$team_2_en = _html($sport5_en[JSOdds][$y][6]);
					
					$team_1_cn = _html($sport5_cn[JSOdds][$y][5]);
					$team_2_cn = _html($sport5_cn[JSOdds][$y][6]);
					
					$team_1_th = _html($sport5_th[JSOdds][$y][5]);
					$team_2_th = _html($sport5_th[JSOdds][$y][6]);
					
					$team_1_vn = _html($sport5_vn[JSOdds][$y][5]);
					$team_2_vn = _html($sport5_vn[JSOdds][$y][6]);
					
					$team_1_id = _html($sport5_id[JSOdds][$y][5]);
					$team_2_id = _html($sport5_id[JSOdds][$y][6]);
					
					$team_1_jp = _html($sport5_jp[JSOdds][$y][5]);
					$team_2_jp = _html($sport5_jp[JSOdds][$y][6]);
					
					$team_1_ko = _html($sport5_ko[JSOdds][$y][5]);
					$team_2_ko = _html($sport5_ko[JSOdds][$y][6]);
			
if($team_1_en!=""){
	

$leage_en = _html($sport5_en[JSOdds][$y][2]);	
$leage_cn = _html($sport5_cn[JSOdds][$y][2]);	
$leage_th = _html($sport5_th[JSOdds][$y][2]);	
$leage_vn = _html($sport5_vn[JSOdds][$y][2]);	
$leage_id = _html($sport5_id[JSOdds][$y][2]);	
$leage_jp = _html($sport5_jp[JSOdds][$y][2]);	
$leage_ko = _html($sport5_ko[JSOdds][$y][2]);	

if (_in_ar($leage_en , $leage_c)==1)
  {	

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
		sql_query($sql);
	
####################################################

			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_team(en,th,ch,cs,jp,ko,vn,id  , lang_sport) value('$team_1_en' ,'$team_1_th','$team_1_cn','$team_1_cn','$team_1_jp','$team_1_ko','$team_1_vn','$team_1_id' , '$zone_sport');";
		sql_query($sql);
			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_team(en,th,ch,cs,jp,ko,vn,id  , lang_sport) value('$team_2_en' ,'$team_2_th','$team_2_cn','$team_2_cn','$team_2_jp','$team_2_ko','$team_2_vn','$team_2_id' , '$zone_sport');";
		sql_query($sql);

					}
				}
			}
	}
#####################################55555555555555555555555555555555555





echo"<hr>666666666666666666666666666666<hr>";



$zone_sport=6;
require('../inc/ok_block_'.$zone_sport.'.php');
#####################################666666666666666666666666666666
if(count($sport6_en[JSOdds])>0){
	

for($y=0;$y<count($sport6_en[JSOdds]);$y++){ 
			
					$team_1_en = _html($sport6_en[JSOdds][$y][4]);
					$team_2_en = _html($sport6_en[JSOdds][$y][5]);
					
					$team_1_cn = _html($sport6_cn[JSOdds][$y][4]);
					$team_2_cn = _html($sport6_cn[JSOdds][$y][5]);
					
					$team_1_th = _html($sport6_th[JSOdds][$y][4]);
					$team_2_th = _html($sport6_th[JSOdds][$y][5]);
					
					$team_1_vn = _html($sport6_vn[JSOdds][$y][4]);
					$team_2_vn = _html($sport6_vn[JSOdds][$y][5]);
					
					$team_1_id = _html($sport6_id[JSOdds][$y][4]);
					$team_2_id = _html($sport6_id[JSOdds][$y][5]);
					
					$team_1_jp = _html($sport6_jp[JSOdds][$y][4]);
					$team_2_jp = _html($sport6_jp[JSOdds][$y][5]);
					
					$team_1_ko = _html($sport6_ko[JSOdds][$y][4]);
					$team_2_ko = _html($sport6_ko[JSOdds][$y][5]);
			
if($team_1_en!=""){
	

$leage_en = _html($sport6_en[JSOdds][$y][1]);	
$leage_cn = _html($sport6_cn[JSOdds][$y][1]);	
$leage_th = _html($sport6_th[JSOdds][$y][1]);	
$leage_vn = _html($sport6_vn[JSOdds][$y][1]);	
$leage_id = _html($sport6_id[JSOdds][$y][1]);	
$leage_jp = _html($sport6_jp[JSOdds][$y][1]);	
$leage_ko = _html($sport6_ko[JSOdds][$y][1]);	

if (_in_ar($leage_en , $leage_c)==1)
  {	
	
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
		sql_query($sql);

####################################################

			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_team(en,th,ch,cs,jp,ko,vn,id  , lang_sport) value('$team_1_en' ,'$team_1_th','$team_1_cn','$team_1_cn','$team_1_jp','$team_1_ko','$team_1_vn','$team_1_id' , '$zone_sport');";
		sql_query($sql);
			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_team(en,th,ch,cs,jp,ko,vn,id  , lang_sport) value('$team_2_en' ,'$team_2_th','$team_2_cn','$team_2_cn','$team_2_jp','$team_2_ko','$team_2_vn','$team_2_id' , '$zone_sport');";
		sql_query($sql);

					}
				}
			}
	}
#####################################666666666666666666666666666666


echo"<hr>77777777777777777777777777777<hr>";

$zone_sport=7;
require('../inc/ok_block_'.$zone_sport.'.php');
#####################################77777777777777777777777777777
if(count($sport7_en[JSOdds])>0){
	

for($y=0;$y<count($sport7_en[JSOdds]);$y++){ 
			
					$team_1_en = _html($sport7_en[JSOdds][$y][4]);
					$team_2_en = _html($sport7_en[JSOdds][$y][5]);
					
					$team_1_cn = _html($sport7_cn[JSOdds][$y][4]);
					$team_2_cn = _html($sport7_cn[JSOdds][$y][5]);
					
					$team_1_th = _html($sport7_th[JSOdds][$y][4]);
					$team_2_th = _html($sport7_th[JSOdds][$y][5]);
					
					$team_1_vn = _html($sport7_vn[JSOdds][$y][4]);
					$team_2_vn = _html($sport7_vn[JSOdds][$y][5]);
					
					$team_1_id = _html($sport7_id[JSOdds][$y][4]);
					$team_2_id = _html($sport7_id[JSOdds][$y][5]);
					
					$team_1_jp = _html($sport7_jp[JSOdds][$y][4]);
					$team_2_jp = _html($sport7_jp[JSOdds][$y][5]);
					
					$team_1_ko = _html($sport7_ko[JSOdds][$y][4]);
					$team_2_ko = _html($sport7_ko[JSOdds][$y][5]);
			
if($team_1_en!=""){
	

$leage_en = _html($sport7_en[JSOdds][$y][1]);	
$leage_cn = _html($sport7_cn[JSOdds][$y][1]);	
$leage_th = _html($sport7_th[JSOdds][$y][1]);	
$leage_vn = _html($sport7_vn[JSOdds][$y][1]);	
$leage_id = _html($sport7_id[JSOdds][$y][1]);	
$leage_jp = _html($sport7_jp[JSOdds][$y][1]);	
$leage_ko = _html($sport7_ko[JSOdds][$y][1]);	

if (_in_ar($leage_en , $leage_c)==1)
  {	
	
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
		sql_query($sql);

####################################################

			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_team(en,th,ch,cs,jp,ko,vn,id  , lang_sport) value('$team_1_en' ,'$team_1_th','$team_1_cn','$team_1_cn','$team_1_jp','$team_1_ko','$team_1_vn','$team_1_id' , '$zone_sport');";
		sql_query($sql);
			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_team(en,th,ch,cs,jp,ko,vn,id  , lang_sport) value('$team_2_en' ,'$team_2_th','$team_2_cn','$team_2_cn','$team_2_jp','$team_2_ko','$team_2_vn','$team_2_id' , '$zone_sport');";
		sql_query($sql);

					}
				}
			}
	}
#####################################77777777777777777777777777777

echo"<hr>88888888888888888888888888888888<hr>";

$zone_sport=8;
require('../inc/ok_block_'.$zone_sport.'.php');
#####################################88888888888888888888888888888888
if(count($sport8_en[JSOdds])>0){
	

for($y=0;$y<count($sport8_en[JSOdds]);$y++){ 
			
					$team_1_en = _html($sport8_en[JSOdds][$y][4]);
					$team_2_en = _html($sport8_en[JSOdds][$y][5]);
					
					$team_1_cn = _html($sport8_cn[JSOdds][$y][4]);
					$team_2_cn = _html($sport8_cn[JSOdds][$y][5]);
					
					$team_1_th = _html($sport8_th[JSOdds][$y][4]);
					$team_2_th = _html($sport8_th[JSOdds][$y][5]);
					
					$team_1_vn = _html($sport8_vn[JSOdds][$y][4]);
					$team_2_vn = _html($sport8_vn[JSOdds][$y][5]);
					
					$team_1_id = _html($sport8_id[JSOdds][$y][4]);
					$team_2_id = _html($sport8_id[JSOdds][$y][5]);
					
					$team_1_jp = _html($sport8_jp[JSOdds][$y][4]);
					$team_2_jp = _html($sport8_jp[JSOdds][$y][5]);
					
					$team_1_ko = _html($sport8_ko[JSOdds][$y][4]);
					$team_2_ko = _html($sport8_ko[JSOdds][$y][5]);
			
if($team_1_en!=""){
	

$leage_en = _html($sport8_en[JSOdds][$y][1]);	
$leage_cn = _html($sport8_cn[JSOdds][$y][1]);	
$leage_th = _html($sport8_th[JSOdds][$y][1]);	
$leage_vn = _html($sport8_vn[JSOdds][$y][1]);	
$leage_id = _html($sport8_id[JSOdds][$y][1]);	
$leage_jp = _html($sport8_jp[JSOdds][$y][1]);	
$leage_ko = _html($sport8_ko[JSOdds][$y][1]);	

if (_in_ar($leage_en , $leage_c)==1)
  {	
	
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
		sql_query($sql);

####################################################

			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_team(en,th,ch,cs,jp,ko,vn,id  , lang_sport) value('$team_1_en' ,'$team_1_th','$team_1_cn','$team_1_cn','$team_1_jp','$team_1_ko','$team_1_vn','$team_1_id' , '$zone_sport');";
		sql_query($sql);
			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_team(en,th,ch,cs,jp,ko,vn,id  , lang_sport) value('$team_2_en' ,'$team_2_th','$team_2_cn','$team_2_cn','$team_2_jp','$team_2_ko','$team_2_vn','$team_2_id' , '$zone_sport');";
		sql_query($sql);

					}
				}
			}
	}
#####################################88888888888888888888888888888888


echo"<hr>99999999999999999999999999999999999<hr>";

$zone_sport=9;
require('../inc/ok_block_'.$zone_sport.'.php');
#####################################99999999999999999999999999999999999
if(count($sport9_en[JSOdds])>0){
	

for($y=0;$y<count($sport9_en[JSOdds]);$y++){ 
			
					$team_1_en = _html($sport9_en[JSOdds][$y][4]);
					$team_2_en = _html($sport9_en[JSOdds][$y][5]);
					
					$team_1_cn = _html($sport9_cn[JSOdds][$y][4]);
					$team_2_cn = _html($sport9_cn[JSOdds][$y][5]);
					
					$team_1_th = _html($sport9_th[JSOdds][$y][4]);
					$team_2_th = _html($sport9_th[JSOdds][$y][5]);
					
					$team_1_vn = _html($sport9_vn[JSOdds][$y][4]);
					$team_2_vn = _html($sport9_vn[JSOdds][$y][5]);
					
					$team_1_id = _html($sport9_id[JSOdds][$y][4]);
					$team_2_id = _html($sport9_id[JSOdds][$y][5]);
					
					$team_1_jp = _html($sport9_jp[JSOdds][$y][4]);
					$team_2_jp = _html($sport9_jp[JSOdds][$y][5]);
					
					$team_1_ko = _html($sport9_ko[JSOdds][$y][4]);
					$team_2_ko = _html($sport9_ko[JSOdds][$y][5]);
			
if($team_1_en!=""){
	

$leage_en = _html($sport9_en[JSOdds][$y][1]);	
$leage_cn = _html($sport9_cn[JSOdds][$y][1]);	
$leage_th = _html($sport9_th[JSOdds][$y][1]);	
$leage_vn = _html($sport9_vn[JSOdds][$y][1]);	
$leage_id = _html($sport9_id[JSOdds][$y][1]);	
$leage_jp = _html($sport9_jp[JSOdds][$y][1]);	
$leage_ko = _html($sport9_ko[JSOdds][$y][1]);	

if (_in_ar($leage_en , $leage_c)==1)
  {	
	
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
		sql_query($sql);

####################################################

			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_team(en,th,ch,cs,jp,ko,vn,id  , lang_sport) value('$team_1_en' ,'$team_1_th','$team_1_cn','$team_1_cn','$team_1_jp','$team_1_ko','$team_1_vn','$team_1_id' , '$zone_sport');";
		sql_query($sql);
			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_team(en,th,ch,cs,jp,ko,vn,id  , lang_sport) value('$team_2_en' ,'$team_2_th','$team_2_cn','$team_2_cn','$team_2_jp','$team_2_ko','$team_2_vn','$team_2_id' , '$zone_sport');";
		sql_query($sql);

					}
				}
			}
	}
#####################################99999999999999999999999999999999999


echo"<hr>101010101010101010101010101010101010101010101010<hr>";

$zone_sport=10;
require('../inc/ok_block_'.$zone_sport.'.php');
#####################################101010101010101010101010101010101010101010101010
if(count($sport10_en[JSOdds])>0){
	

for($y=0;$y<count($sport10_en[JSOdds]);$y++){ 
			
					$team_1_en = _html($sport10_en[JSOdds][$y][4]);
					$team_2_en = _html($sport10_en[JSOdds][$y][5]);
					
					$team_1_cn = _html($sport10_cn[JSOdds][$y][4]);
					$team_2_cn = _html($sport10_cn[JSOdds][$y][5]);
					
					$team_1_th = _html($sport10_th[JSOdds][$y][4]);
					$team_2_th = _html($sport10_th[JSOdds][$y][5]);
					
					$team_1_vn = _html($sport10_vn[JSOdds][$y][4]);
					$team_2_vn = _html($sport10_vn[JSOdds][$y][5]);
					
					$team_1_id = _html($sport10_id[JSOdds][$y][4]);
					$team_2_id = _html($sport10_id[JSOdds][$y][5]);
					
					$team_1_jp = _html($sport10_jp[JSOdds][$y][4]);
					$team_2_jp = _html($sport10_jp[JSOdds][$y][5]);
					
					$team_1_ko = _html($sport10_ko[JSOdds][$y][4]);
					$team_2_ko = _html($sport10_ko[JSOdds][$y][5]);
			
if($team_1_en!=""){
	

$leage_en = _html($sport10_en[JSOdds][$y][1]);	
$leage_cn = _html($sport10_cn[JSOdds][$y][1]);	
$leage_th = _html($sport10_th[JSOdds][$y][1]);	
$leage_vn = _html($sport10_vn[JSOdds][$y][1]);	
$leage_id = _html($sport10_id[JSOdds][$y][1]);	
$leage_jp = _html($sport10_jp[JSOdds][$y][1]);	
$leage_ko = _html($sport10_ko[JSOdds][$y][1]);	

if (_in_ar($leage_en , $leage_c)==1)
  {	
	
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
		sql_query($sql);

####################################################

			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_team(en,th,ch,cs,jp,ko,vn,id  , lang_sport) value('$team_1_en' ,'$team_1_th','$team_1_cn','$team_1_cn','$team_1_jp','$team_1_ko','$team_1_vn','$team_1_id' , '$zone_sport');";
		sql_query($sql);
			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_team(en,th,ch,cs,jp,ko,vn,id  , lang_sport) value('$team_2_en' ,'$team_2_th','$team_2_cn','$team_2_cn','$team_2_jp','$team_2_ko','$team_2_vn','$team_2_id' , '$zone_sport');";
		sql_query($sql);

					}
				}
			}
	}
#####################################101010101010101010101010101010101010101010101010
?>