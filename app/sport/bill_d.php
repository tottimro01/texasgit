<?php
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);
	
	
require ("../inc/conn.php");
require ("../inc/function.php");





	//JSON รายการเล่น
	if($_GET[d]!=""){
		$date =$_GET[d];	
		}else{
	   $date = _bdate();	
		}

/*	
$url_file=$server_js."txt/json/ball/".$date."_.json";	
$d_js=file_get_contents2($url_file);
$d_bet = json_decode($d_js, true);
	*/
$last_id=0;
$arrIdTeam = array();//array เก็บข้อมูลรายละเอียดคู่บอล
#	for ($x = 0; $x < 3; $x++) {//จำลองแต่ละบิลมี 3 คู่
 $sql="select * from bom_tb_football_bill_play  where  b_date='$date'   and m_id='$_GET[mid]' and b_accept=1  order by bill_id asc , play_id asc";
 $re2=sql_query($sql);
 while($rs2=sql_fetch($re2)){
	
if($rs2[bill_id]!=$last_id){
$xx=0; 	
$last_id=$rs2[bill_id];
	}
	
#$reb=$d_bet[$rs2[b_id]]; 
$url_file=$server_js."txt/json/score/".$rs2[b_id].".json";	
$d_js=file_get_contents2($url_file);
$reb = json_decode($d_js, true);


$k3=_type_ball($rs2[play_type],$rs2[play_bet],$reb[b_score_full],$reb[b_score_half]);

		$arrIdTeam[$rs2[bill_id]][$xx]["Code"] = "$rs2[play_code]";//รหัสทีม
		$arrIdTeam[$rs2[bill_id]][$xx]["Team1"] = "$reb[b_name_1]";//ชื่อทีม1
		$arrIdTeam[$rs2[bill_id]][$xx]["Team2"] = "$reb[b_name_2]";//ชื่อทีม2
		$arrIdTeam[$rs2[bill_id]][$xx]["Big"] = "$rs2[b_big]";//ทีมเจ้าบ้านต่อ
		
		if($rs2[play_type]>10){
		$arrIdTeam[$rs2[bill_id]][$xx]["HF"] = "1";//ครึ่ง
			}else{
		$arrIdTeam[$rs2[bill_id]][$xx]["HF"] = "2";//เต็มเวลา
				}
		/*
		if(($x % 2) == 0){
			$arrIdTeam[$x]["HF"] = "1";//ครึ่งเวลา
			$arrIdTeam[$x]["Play"] = "รอง บาร์เซโลน่า";//แทง
		}else{
			$arrIdTeam[$x]["HF"] = "2";//เต็มเวลา
			$arrIdTeam[$x]["Play"] = "รอง เรอัลมาดริค";//แทง
		}
		*/
		
   $w1='';


					    if($rs2[b_big]==1 and $rs2[play_type]==1){
			$w1='ต่อ ';
							$arrIdTeam[$rs2[bill_id]][$xx]["PlayType"] = 1;
			}elseif($rs2[b_big]==2 and $rs2[play_type]==2){
			$w1='ต่อ ';
							$arrIdTeam[$rs2[bill_id]][$xx]["PlayType"] = 1;
			}elseif($rs2[b_big]==2 and $rs2[play_type]==1){
			$w1='รอง ';
							$arrIdTeam[$rs2[bill_id]][$xx]["PlayType"] = 0;
			}elseif($rs2[b_big]==1 and $rs2[play_type]==2){
			$w1='รอง ';
							$arrIdTeam[$rs2[bill_id]][$xx]["PlayType"] = 0;
			}elseif($rs2[b_big]==1 and $rs2[play_type]==11){
			$w1='ต่อ 1H ';
							$arrIdTeam[$rs2[bill_id]][$xx]["PlayType"] = 1;
			}elseif($rs2[b_big]==2 and $rs2[play_type]==12){
			$w1='ต่อ 1H ';
							$arrIdTeam[$rs2[bill_id]][$xx]["PlayType"] = 1;
			}elseif($rs2[b_big]==2 and $rs2[play_type]==11){
			$w1='รอง 1H ';
							$arrIdTeam[$rs2[bill_id]][$xx]["PlayType"] = 0;
			}elseif($rs2[b_big]==1 and $rs2[play_type]==12){
			$w1='รอง 1H ';
							$arrIdTeam[$rs2[bill_id]][$xx]["PlayType"] = 0;
			}else{
			$w1='รอง ';
							$arrIdTeam[$rs2[bill_id]][$xx]["PlayType"] = 0;
				}	
			
			 
			if($rs2[play_type]==1){$tn="$w1$reb[b_name_1]";}
			elseif($rs2[play_type]==2){$tn="$w1$reb[b_name_2]";} 
			elseif($rs2[play_type]==3){$tn="[ สูง ]  $reb[b_name_1]";}
			elseif($rs2[play_type]==4){$tn="[ ต่ำ ]   $reb[b_name_1]";} 
			
			elseif($rs2[play_type]==5){$tn="[ เจ้าบ้านชนะ ]   $reb[b_name_1]";} 
			elseif($rs2[play_type]==6){$tn="[ เสมอ ]   $reb[b_name_1]";} 
			elseif($rs2[play_type]==7){$tn="[ เยือนชนะ ]   $reb[b_name_2]";} 
			
			elseif($rs2[play_type]==8){$tn="[ คี่ ]   $reb[b_name_1]";} 
			elseif($rs2[play_type]==9){$tn="[ คู่ ]   $reb[b_name_1]";} 
			
			
			elseif($rs2[play_type]==11){$tn="$w1$reb[b_name_1]$w2";}
			elseif($rs2[play_type]==12){$tn="$w1$reb[b_name_2]$w2";} 
			elseif($rs2[play_type]==13){$tn="[ สูง 1H ]  $reb[b_name_1]";}
			elseif($rs2[play_type]==14){$tn="[ ต่ำ1H ]   $reb[b_name_1]";} 
			
			elseif($rs2[play_type]==15){$tn="[ เจ้าบ้านชนะ 1H ]   $reb[b_name_1]";} 
			elseif($rs2[play_type]==16){$tn="[ เสมอ 1H ]   $reb[b_name_1]";} 
			elseif($rs2[play_type]==17){$tn="[ เยือนชนะ 1H ]   $reb[b_name_2]";} 
			
			elseif($rs2[play_type]==18){$tn="[ คี่ 1H ]   $reb[b_name_1]";} 
			elseif($rs2[play_type]==19){$tn="[ คู่ 1H ]   $reb[b_name_1]";} 
			
		$arrIdTeam[$rs2[bill_id]][$xx]["Play"] = "$tn";//แทง
		
		
		
		$arrIdTeam[$rs2[bill_id]][$xx]["PlayScore"]= ""._cg3($rs2[play_bet])."";//จำนวนสกอร์ต่อให้
		$arrIdTeam[$rs2[bill_id]][$xx]["Price"] = "".number_format($rs2[play_pay],2)."";//ราคาบอล
		$arrIdTeam[$rs2[bill_id]][$xx]["PlayTime"] = "".date("d-m-Y , H:i",$reb[b_date_play])."" ;//วันเวลาเตะ
		$arrIdTeam[$rs2[bill_id]][$xx]["StatusMatch"] = "".$ball_type3[$rs2[play_status]]."";//สถานะสกอร์
	 	$arrIdTeam[$rs2[bill_id]][$xx]["StatusMatchx"] = $rs2[play_status];//สถานะสกอร์
		if($reb[b_score_full]==""){
			$reb[b_score_half]='?-?';
			$reb[b_score_full]='?-?';
			}
		$arrIdTeam[$rs2[bill_id]][$xx]["ScoreMatch1H"] = "$reb[b_score_half]";//สกอร์ 1H
		$arrIdTeam[$rs2[bill_id]][$xx]["ScoreMatchFT"] = "$reb[b_score_full]";//สกอร์ FT
$xx++;	} 

	//#####################################
	
	$arrData = array();	
#	for ($y = 0; $y < 5; $y++) {//จำลองรายการเล่นมี 5 บิล
	$sql="select * from  bom_tb_football_bill  where   b_date='$date'   and m_id='$_GET[mid]'   and b_accept=1   order by  b_bonus desc, b_status asc,bill_id desc limit 500";
	$re=sql_query($sql);
$y=0;	while($rs=sql_fetch($re)){
	
		
	    $arrData[$y]["BiId"]= $rs[bill_id];//รหัสบิล
		$arrData[$y]["BiTime"]= "".date("H:i",$rs[b_timestam])."";//เวลาแทงบิล
		$arrData[$y]["BiStatus"]= "".$f_status[$rs[b_status]]."";//สถานะบิล
		$arrData[$y]["BiStatusx"]= $rs[b_status];//สถานะบิล
		$arrData[$y]["BiTotal"]= "".number_format($rs[b_total])."";//ราคา
		$arrData[$y]["BiBonus"]= "".number_format($rs[b_bonus])."";//ราคาจ่าย
		$arrData[$y]["BiData"]= $arrIdTeam[$rs[bill_id]];//array ข้อมูลรายละเอียดคู่บอลที่เก็บไว้ก่อนหน้า
$y++;	}						
	
	
	echo json_encode($arrData);
?>