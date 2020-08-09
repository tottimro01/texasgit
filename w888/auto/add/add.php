<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
//Step & YODAY
require "conn.php";
require('../func_x.php');



httpGet2("http://www.lion1234.com/vegus168_bom/index.php");
httpGet2("http://www.lion1234.com/vegus168_bom/th.php");
sleep(1);
httpGet2("http://www.lion1234.com/vegus168_bom/isc.php");

$view_date = _bdate();

$sql="SELECT * FROM bom_tb_config where con_id=1 ";
$res=sql_array($sql);
$arr_nam=array("set_hdc"=>$res[set_hdc] , "set_goal"=>$res[set_goal] , "set_1x2"=>$res[set_1x2] , "set_oe"=>$res[set_oe] );

                #   file_get_contents2("http://www.lion1234.com/vegus168_bom/isc.php");
$data=file_get_contents2("http://www.lion1234.com/vegus168_bom/txt/bask_max.json");
$date_bet = json_decode($data, true);



foreach($date_bet as $nt){
	


$zone_th = trim($nt[b_zoneth]);
$leage2 = trim($nt[b_zoneen]);

$idball =trim($nt[b_id]);

					$name_1_th =trim($nt[b_name_1th]);
					$name_2_th = trim($nt[b_name_2th]);
					
					$team_1 =trim($nt[b_name_1en]);
					$team_2 = trim($nt[b_name_2en]);

					$xtime =  @explode(':',trim($nt[x_time]));
					$xdate = @explode('-',trim($nt[x_date]));
					$time_date = mktime($xtime[0],$xtime[1],0,$xdate[1],$xdate[0],$xdate[2]);
					
					
					
			       $asc =  trim($nt[b_asc]);
					$big = trim($nt[b_big]);
	            	$add = trim($nt[b_add]);
					
					$h_p1=($arr_nam[set_hdc])/100;
					$hdc = trim($nt[b_hdc_ft]);
					$bet_1_1=peu(trim($nt[b_hdc_1ft]))-$h_p1;
					$bet_1_2=peu(trim($nt[b_hdc_2ft]))-$h_p1;
					$bet1[hdc1] =nam(peu(trim($nt[b_hdc_1ft])),$arr_nam ,1 );
					$bet1[hdc2] = nam(peu(trim($nt[b_hdc_2ft])),$arr_nam ,1  );
					
					$h_p2=($arr_nam[set_goal])/100;
					$gold = trim($nt[b_goal_ft]);
					$bet_2_1=peu(trim($nt[b_goal_1ft]))-$h_p2;
					$bet_2_2=peu(trim($nt[b_goal_2ft]))-$h_p2;
					$bet2[hdc1] = nam(peu(trim($nt[b_goal_1ft])),$arr_nam ,2 );
					$bet2[hdc2] =nam( peu(trim($nt[b_goal_2ft])),$arr_nam ,2);
					
		
					$hdc_h =trim($nt[b_hdc_ht]);
					$bet_3_1=peu(trim($nt[b_hdc_1ht]))-$h_p1;
					$bet_3_2=peu(trim($nt[b_hdc_2ht]))-$h_p1;
					$bet3[hdc1] =nam( peu(trim($nt[b_hdc_1ht])),$arr_nam ,1  );
					$bet3[hdc2] = nam(peu(trim($nt[b_hdc_2ht])),$arr_nam ,1  );

					$gold_h = trim($nt[b_goal_ht]);
					$bet_4_1=peu(trim($nt[b_goal_1ht]))-$h_p2;
					$bet_4_2=peu(trim($nt[b_goal_2ht]))-$h_p2;
					$bet4[hdc1] = nam(peu(trim($nt[b_goal_1ht])),$arr_nam ,2 );
					$bet4[hdc2] = nam(peu(trim($nt[b_goal_2ht])),$arr_nam ,2 );
					
					if($res[con_1x2]==1){
					$bet6[x121] =nam( trim($nt[FT1]),$arr_nam ,3 );
					$bet6[x12x] =nam( trim($nt[FTX]),$arr_nam ,3  );
					$bet6[x122] =nam( trim($nt[FT2]),$arr_nam  ,3 );
					

					$bet5[x121] =nam( trim($nt[FH1]),$arr_nam ,3  );
					$bet5[x12x] =nam( trim($nt[FHX]),$arr_nam ,3  );
					$bet5[x122] =nam( trim($nt[FH2]),$arr_nam ,3  );
						
					}#	if($res[con_1x2]==1){
						/*
							if($add==1){
					$bet7[odd] =trim($nt[FTOdd]);
					#$bet7[even] =nam( trim($nt[FTEven]),$arr_nam,4  );
					
					$bet8[odd] =trim($nt[FHOdd]);
					#$bet8[even] =nam( trim($nt[FHEven]),$arr_nam ,4 );
							}else{
					$bet7[odd] =0;
					#$bet7[even] =nam( trim($nt[FTEven]),$arr_nam,4  );
					
					$bet8[odd] =0;
					#$bet8[even] =nam( trim($nt[FHEven]),$arr_nam ,4 );
								}
					*/
					
					
					$okcode[ft] = trim($nt[codeFT]);
					$okcode[ht] = trim($nt[codeHT]);
					
					
					$okcode[ft] = '';
					$okcode[ht] = '';
					
					
	$type_zone = trim($nt[bType]);				
					
$per1=hapereu($bet_1_1,$bet_1_2 );
$per2=hapereu($bet_2_1,$bet_2_2 );
$per3=hapereu($bet_3_1,$bet_3_2 );
$per4=hapereu($bet_4_1,$bet_4_2 );

/*
if($bet7[odd]!=0.00){
$per5=$res[set_oe];
$per6=0;
$bet7[even]=pereu($bet7[odd] ,$per5 );
}else{
$bet7[even]=0;
	}
*/
					
$payy1= 0;
$payy2= 0;

$active=1;	

						



include("inc_x.php");
}


include("inc_x_num.php");



$url=$hostserver."process/zone.php";
httpGet2($url);
$url=$hostserver."process/write.php";
httpGet2($url);
########################################################################
if($_SERVER['HTTP_REFERER']!=""){echo'<meta http-equiv="refresh" content="0;URL='.$_SERVER['HTTP_REFERER'].'" />';}

?>