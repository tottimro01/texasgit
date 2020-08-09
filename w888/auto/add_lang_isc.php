<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<meta charset="UTF-8">
<?
//Step & YODAY
require "../inc/conn.php";
require "function_isc.php";
require('../inc/ok_block_1.php');





$view_date = date("d-m-Y", $time_stam);


$data=file_get_contents2("http://www.atom168.com/soccer/isc_lang.php");
$ex1=explode('<hr>',$data);

foreach($ex1 as $nt1){
	
$nt=explode(',',$nt1);

$zone_en = trim($nt[2]);
$zone_th = trim($nt[6]);
$zone_ch = trim($nt[10]);
$zone_cs = trim($nt[14]);
$zone_jp = trim($nt[18]);
$zone_ko = trim($nt[22]);
$zone_vn = trim($nt[26]);
$zone_id = trim($nt[30]);


if (_in_ar($zone_en , $leage_c)==1)
  {	
 # print_r($nt);
	
               	$idball =trim($nt[34]);
				
					$name_1_en =trim($nt[3]);
					$name_2_en = trim($nt[4]);
					
					$name_1_th =trim($nt[7]);
					$name_2_th = trim($nt[8]);
					
					$name_1_ch =trim($nt[11]);
					$name_2_ch = trim($nt[12]);
					
					$name_1_cs =trim($nt[15]);
					$name_2_cs = trim($nt[16]);
					
					$name_1_jp =trim($nt[19]);
					$name_2_jp = trim($nt[20]);
					
					$name_1_ko =trim($nt[23]);
					$name_2_ko = trim($nt[24]);
					
					$name_1_vn =trim($nt[27]);
					$name_2_vn = trim($nt[28]);
					
					$name_1_id =trim($nt[31]);
					$name_2_id = trim($nt[32]);
					

if($idball>0){

####################################################
echo'<br>'.$sql="update bom_tb_lang_zone set  ch='$zone_ch'   where en='$zone_en' and ch=''; ";
sql_query($sql);
echo'<br>'.$sql="update bom_tb_lang_zone set  cs='$zone_cs'   where en='$zone_en' and cs=''; ";
sql_query($sql);
echo'<br>'.$sql="update bom_tb_lang_zone set  jp='$zone_jp'   where en='$zone_en' and jp=''; ";
sql_query($sql);
echo'<br>'.$sql="update bom_tb_lang_zone set  ko='$zone_ko'   where en='$zone_en' and ko=''; ";
sql_query($sql);
echo'<br>'.$sql="update bom_tb_lang_zone set  vn='$zone_vn'   where en='$zone_en' and vn=''; ";
sql_query($sql);
echo'<br>'.$sql="update bom_tb_lang_zone set  id='$zone_id'   where en='$zone_en' and id=''; ";
sql_query($sql);
####################################################
echo'<br>'.$sql="update bom_tb_lang_zone set  th='$zone_th'   where en='$zone_en' and th=''; ";
$ret=sql_query($sql);


		#	if(!$ret){
			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_zone(en,th,ch,cs,jp,ko,vn,id) value('$zone_en' ,'$zone_th','$zone_ch','$zone_cs','$zone_jp','$zone_ko','$zone_vn','$zone_id');";
			sql_query($sql);
		#	}
			
			
			
####################################################
echo'<br>'.$sql="update bom_tb_lang_team set  ch='$name_1_ch'   where en='$name_1_en' and ch=''; ";
sql_query($sql);
echo'<br>'.$sql="update bom_tb_lang_team set  cs='$name_1_cs'   where en='$name_1_en' and cs=''; ";
sql_query($sql);
echo'<br>'.$sql="update bom_tb_lang_team set  jp='$name_1_jp'   where en='$name_1_en' and jp=''; ";
sql_query($sql);
echo'<br>'.$sql="update bom_tb_lang_team set  ko='$name_1_ko'   where en='$name_1_en' and ko=''; ";
sql_query($sql);
echo'<br>'.$sql="update bom_tb_lang_team set  vn='$name_1_vn'   where en='$name_1_en' and vn=''; ";
sql_query($sql);
echo'<br>'.$sql="update bom_tb_lang_team set  id='$name_1_id'   where en='$name_1_en' and id=''; ";
sql_query($sql);
####################################################
echo'<br>'.$sql="update bom_tb_lang_team set  th='$name_1_th'    where en='$name_1_en' and th=''; ";
$ret=sql_query($sql);


		#	if(!$ret){
			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_team(en,th,ch,cs,jp,ko,vn,id) value('$name_1_en' ,'$name_1_th','$name_1_ch','$name_1_cs','$name_1_jp','$name_1_ko','$name_1_vn','$name_1_id');";
			sql_query($sql);
		#	}
			
			
			
####################################################
echo'<br>'.$sql="update bom_tb_lang_team set  ch='$name_2_ch'   where en='$name_2_en' and ch=''; ";
sql_query($sql);
echo'<br>'.$sql="update bom_tb_lang_team set  cs='$name_2_cs'   where en='$name_2_en' and cs=''; ";
sql_query($sql);
echo'<br>'.$sql="update bom_tb_lang_team set  jp='$name_2_jp'   where en='$name_2_en' and jp=''; ";
sql_query($sql);
echo'<br>'.$sql="update bom_tb_lang_team set  ko='$name_2_ko'   where en='$name_2_en' and ko=''; ";
sql_query($sql);
echo'<br>'.$sql="update bom_tb_lang_team set  vn='$name_2_vn'   where en='$name_2_en' and vn=''; ";
sql_query($sql);
echo'<br>'.$sql="update bom_tb_lang_team set  id='$name_2_id'   where en='$name_2_en' and id=''; ";
sql_query($sql);
####################################################
echo'<br>'.$sql="update bom_tb_lang_team set  th='$name_2_th'    where en='$name_2_en' and th=''; ";
$ret=sql_query($sql);
		#	if(!$ret){
			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_team(en,th,ch,cs,jp,ko,vn,id) value('$name_2_en' ,'$name_2_th','$name_2_ch','$name_2_cs','$name_2_jp','$name_2_ko','$name_2_vn','$name_2_id');";
			sql_query($sql);
			echo'<hr>';	
		#	}
}

}
}



?>