<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
$zoneX=10;

require('../../inc/conn.php');
require('../../inc/function.php');

require('server.php');
require('func_x.php');

	

$view_date = _bdate();





$data=file_get_contents2($server_maxbet_data."sport_".$zoneX.".html");
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



###################Write JSON Lang
$js_lang=array();
$sql="select * from bom_tb_lang_team where xupdate='$view_date' order by lang_sport asc, en asc   ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
$js_lang[t][md5($rs[en])][en]=$rs[en];

if($rs[th]==""){$rs[th]=$rs[en];}
$js_lang[t][md5($rs[en])][th]=$rs[th];

if($rs[jp]==""){$rs[jp]=$rs[en];}
$js_lang[t][md5($rs[en])][jp]=$rs[jp];

if($rs[ko]==""){$rs[ko]=$rs[en];}
$js_lang[t][md5($rs[en])][ko]=$rs[ko];

if($rs[ch]==""){$rs[ch]=$rs[en];}
$js_lang[t][md5($rs[en])][ch]=$rs[ch];

if($rs[vn]==""){$rs[vn]=$rs[en];}
$js_lang[t][md5($rs[en])][vn]=$rs[vn];

if($rs[cs]==""){$rs[cs]=$rs[en];}
$js_lang[t][md5($rs[en])][cs]=$rs[cs];

if($rs[id]==""){$rs[id]=$rs[en];}
$js_lang[t][md5($rs[en])][id]=$rs[id];

if($rs[mm]==""){$rs[mm]=$rs[en];}
$js_lang[t][md5($rs[en])][mm]=$rs[mm];

if($rs[km]==""){$rs[km]=$rs[en];}
$js_lang[t][md5($rs[en])][km]=$rs[km];

if($rs[la]==""){$rs[la]=$rs[en];}
$js_lang[t][md5($rs[en])][la]=$rs[la];
	}
	
$sql="select * from bom_tb_lang_zone where xupdate='$view_date' order by lang_sport asc, en asc   ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
$js_lang[z][md5($rs[en])][en]=$rs[en];
	
if($rs[th]==""){$rs[th]=$rs[en];}
$js_lang[z][md5($rs[en])][th]=$rs[th];

if($rs[jp]==""){$rs[jp]=$rs[en];}
$js_lang[z][md5($rs[en])][jp]=$rs[jp];

if($rs[ko]==""){$rs[ko]=$rs[en];}
$js_lang[z][md5($rs[en])][ko]=$rs[ko];

if($rs[ch]==""){$rs[ch]=$rs[en];}
$js_lang[z][md5($rs[en])][ch]=$rs[ch];

if($rs[vn]==""){$rs[vn]=$rs[en];}
$js_lang[z][md5($rs[en])][vn]=$rs[vn];

if($rs[cs]==""){$rs[cs]=$rs[en];}
$js_lang[z][md5($rs[en])][cs]=$rs[cs];

if($rs[id]==""){$rs[id]=$rs[en];}
$js_lang[z][md5($rs[en])][id]=$rs[id];

if($rs[mm]==""){$rs[mm]=$rs[en];}
$js_lang[z][md5($rs[en])][mm]=$rs[mm];

if($rs[km]==""){$rs[km]=$rs[en];}
$js_lang[z][md5($rs[en])][km]=$rs[km];

if($rs[la]==""){$rs[la]=$rs[en];}
$js_lang[z][md5($rs[en])][la]=$rs[la];
	}
$fo="../../json/sport/lang/".$view_date.".json";
$txt_json=json_encode($js_lang);
write($fo ,$txt_json,"w+"); 
?>