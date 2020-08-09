<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
$zoneX=1;

require('../../inc/conn.php');
require('../../inc/function.php');

require('server.php');
require('func_x.php');

	

$view_date = _bdate();





$data=file_get_contents2($server_data."sport_".$zoneX.".html");
$date_bet = json_decode2($data, true);

foreach($date_bet as $nt){
	


$zone_th = trim($nt[b_zoneth]);
$zone_en = trim($nt[b_zoneen]);
$zone_th=(str_replace("*","",$zone_th));
 $zone_en=(str_replace("*","",$zone_en));
 

$idbet =trim($nt[b_id]);

					$name_1_th =trim($nt[b_name_1th]);
					$name_2_th = trim($nt[b_name_2th]);
					
					$name_1_en =trim($nt[b_name_1en]);
					$name_2_en = trim($nt[b_name_2en]);

                    $b_date_play =trim($nt[b_date_play]);
					
                    $asc =  trim($nt[b_asc]);
					$big = trim($nt[b_big]);
	            	$add = trim($nt[b_add]);
					
					
                    $hdc = trim($nt[b_hdc_ft]);
					$bet_1_1=(trim($nt[b_hdc_1ft]));
					$bet_1_2=(trim($nt[b_hdc_2ft]));
					
	                $gold = trim($nt[b_goal_ft]);
					$bet_2_1=(trim($nt[b_goal_1ft]));
					$bet_2_2=(trim($nt[b_goal_2ft]));
					
                    $hdc_h =trim($nt[b_hdc_ht]);
					$bet_3_1=(trim($nt[b_hdc_1ht]));
					$bet_3_2=(trim($nt[b_hdc_2ht]));
					
					$gold_h = trim($nt[b_goal_ht]);
					$bet_4_1=(trim($nt[b_goal_1ht]));
					$bet_4_2=(trim($nt[b_goal_2ht]));
					
					
					$bet6_1 = trim($nt[FT1]);
					$bet6_x = trim($nt[FTX]);
					$bet6_2 = trim($nt[FT2]);
					

					$bet66_1 = trim($nt[FH1]);
					$bet66_x = trim($nt[FHX]);
					$bet66_2 = trim($nt[FH2]);


$per1=hapereu(peu($bet_1_1) , peu($bet_1_2) );
$per2=hapereu(peu($bet_2_1) , peu($bet_2_2) );
$per3=hapereu(peu($bet_3_1) , peu($bet_3_2) );
$per4=hapereu(peu($bet_4_1) , peu($bet_4_2) );
###############################เต็ม

$view=1;
$accept=1;
$bet=1;
			
include('insert.php');


					}#foreach($date_bet as $nt){




?>