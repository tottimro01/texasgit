<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<meta charset="UTF-8">
<?php
require('../inc/conn.php');
require('../inc/function.php');
require('../inc/ok_block_1.php');


if($_GET[rob]!=""){
	$rob=$_GET[rob];
}else{
	$rob=_rob();
	}

$view_date = _bdate();







$data=file_get_contents2("http://www.atom168.com/soccer/isc_max.php?ac=".$_GET[ac]."");
#$data=file_get_contents2("data.html");
$ex1=explode('<hr>',$data);



foreach($ex1 as $nt1){
	
$nt=explode(',',$nt1);

$leage_en = trim($nt[17]);
$zone_th = trim($nt[13]);


if (_in_ar($leage_en , $leage_c)==1)
  {	
	
					$idball =trim($nt[1]);

					$name_1_th =trim($nt[14]);
					$name_2_th = trim($nt[15]);
					
					$leage2=$leage_en;
					$team_1 =trim($nt[18]);
					$team_2 = trim($nt[19]);

					$time_date = trim($nt[7]);
					
					$asc =  trim($nt[5]);
					$big = trim($nt[11]);
	            	$add = trim($nt[3]);
					
					
					$hdc = trim($nt[21]);
					$hdc1 =trim($nt[25]);
					$hdc2 =trim($nt[26]);
					$bet1[hdc1] =trim($nt[22]);
					$bet1[hdc2] = trim($nt[23]);

					$gold = trim($nt[28]);
					$gold1 =trim($nt[32]);
					$gold2 =trim($nt[33]);
					$bet2[hdc1] = trim($nt[29]);
					$bet2[hdc2] = trim($nt[30]);
					/*
if($add==3){
					$gold = '';
					$gold1 =0;
					$gold2 =0;
					$bet2[hdc1] = 0;
					$bet2[hdc2] =0;
	}
	*/	
					$hdc_h =trim($nt[39]);
					$hdc_h_1 =trim($nt[43]);
					$hdc_h_2 =trim($nt[44]);
					$bet3[hdc1] = trim($nt[40]);
					$bet3[hdc2] = trim($nt[41]);

					$gold_h = trim($nt[46]);
					$gold_h_1 =trim($nt[50]);
					$gold_h_2 =trim($nt[51]);					
					$bet4[hdc1] = trim($nt[47]);
					$bet4[hdc2] = trim($nt[48]);
					/*
if($add==3){
					$gold_h = '';
					$gold_h_1 =0;
					$gold_h_2 =0;
					$bet4[hdc1] = 0;
					$bet4[hdc2] =0;
	}
*/
					
$payy1= trim($nt[35]);
$payy2= trim($nt[37]);
$payy3= trim($nt[53]);
$payy4= trim($nt[55]);


					
					
			if($hdc!=""){	    $bet1=_hdcb($hdc1,$hdc2,$big);   }else{  $bet1=array("hdc1"=>"","hdc2"=>"");}
			if($gold!=""){		$bet2=_hdcb($gold1,$gold2,$big);   }else{  $bet2=array("hdc1"=>"","hdc2"=>"");}
			if($hdc_h!=""){		$bet3=_hdcb($hdc_h_1,$hdc_h_2,$big);   }else{  $bet3=array("hdc1"=>"","hdc2"=>"");}
			if($gold_h!=""){		$bet4=_hdcb($gold_h_1,$gold_h_2,$big);   }else{  $bet4=array("hdc1"=>"","hdc2"=>"");}
					
					
					
			if($idball>0){
				
				
$xrob_1=mktime(8,0,0,date("m",$time_stam),date("d",$time_stam),date("Y",$time_stam));
$xrob_2=mktime(10,0,0,date("m",$time_stam),date("d",$time_stam),date("Y",$time_stam));
$xrob_3=mktime(12,0,0,date("m",$time_stam),date("d",$time_stam),date("Y",$time_stam));
$xrob_4=mktime(14,0,0,date("m",$time_stam),date("d",$time_stam),date("Y",$time_stam));
$xrob_5=mktime(16,0,0,date("m",$time_stam),date("d",$time_stam),date("Y",$time_stam));
$xrob_6=mktime(18,0,0,date("m",$time_stam),date("d",$time_stam),date("Y",$time_stam));
$xrob_7=mktime(20,0,0,date("m",$time_stam),date("d",$time_stam),date("Y",$time_stam));
$xrob_8=mktime(22,0,0,date("m",$time_stam),date("d",$time_stam),date("Y",$time_stam));
$xrob_9=mktime(0,0,0,date("m",$time_stam),date("d",$time_stam),date("Y",$time_stam));
$xrob_10=mktime(2,0,0,date("m",$time_stam),date("d",$time_stam),date("Y",$time_stam));
$xrob_11=mktime(4,0,0,date("m",$time_stam),date("d",$time_stam),date("Y",$time_stam));
$xrob_12=mktime(6,0,0,date("m",$time_stam),date("d",$time_stam),date("Y",$time_stam));


					$active = 1;
					$step = 1;
					$b_x=1;
					$b_w=1;
					$b_b=1;
					$b_a=1;
					$b_h_percent=20;
					$b_h_live=0;
					$b_sport=1;


					for($xrob=$rob; $xrob<=12;$xrob++){

###############################เต็ม
					echo '<br>'.$sql = "INSERT IGNORE INTO bom_tb_data_football_step
					 (b_id,	b_add,b_rob	 ,b_x  ,	b_w,	b_b	,b_a	,	b_zone_id,	b_zone	,b_name_1	,b_name_2,	b_date_play,	b_date,	b_big	 ,b_h_percent	,	b_h_hdc	,b_h_live	,b_h_price , b_1h_percent	,	b_1h_hdc	,b_1h_live	,b_1h_price  ,b_g_percent	,b_g_hdc	,b_g_live,	b_g_price , b_1g_percent	,b_1g_hdc	,b_1g_live,	b_1g_price  ,	b_sport) 
		              value('".$idball."' , '".$add."', '".$xrob."' , '".$b_x."', '".$b_w."', '".$b_b."' , '".$b_a."', '".$asc."' , '".$leage2."' , '".$team_1."' , '".$team_2."' , '".$time_date."' , '".$view_date."', '".$big."'   , '".$b_h_percent."'   , '".$hdc."'   , '".$b_h_live."' , '".$bet1[hdc1]."'   , '".$b_h_percent."'   , '".$hdc_h."'   , '".$b_h_live."' , '".$bet3[hdc1]."'   , '".$b_h_percent."'   , '".$gold."'   , '".$b_h_live."' , '".$bet2[hdc1]."'  	 ,  '".$b_h_percent."'   , '".$gold_h."'   , '".$b_h_live."' , '".$bet4[hdc1]."'     , '".$b_sport."'   )";
				 sql_query($sql);


						

					}	
			}
	}
}



?>