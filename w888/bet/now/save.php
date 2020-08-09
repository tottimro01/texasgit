<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
//Step & YODAY
require('../inc/conn.php');
require('../inc/function.php');

//$in_put=0;


function write($path, $content, $mode="w+"){
    if (file_exists($path) && !is_writeable($path)){ return false; }
    if ($fp = fopen($path, $mode)){
        fwrite($fp, $content);
        fclose($fp);
    }
    else { return false; }
    return true;
}

###############################################################Live

$vd=_bdate();



$nn='
';

$txt1='<script language="JavaScript" type="text/javascript">
var Nt =[];';

$txt5='<? 
';

$txt2='<? 
$c_data1=array();
';

$step;
$sql="select * from pha_tb_ball_list_live where    	b_active='1' and b_step='1' and b_date='$vd'   and b_numcode!=''   order by  b_active desc,b_top asc,b_asc asc, b_top_team asc, b_date_play asc, 	b_id asc, b_add asc";	
$ree=sql_query($sql);


$x=0; while($rss=sql_fetch($ree)){
	$step++;
	if($rss[b_big]==1){$hh='h';}
	else{$hh='a';}
	
	
$code=$rss[b_numcode];

$exc=@explode("+",$code);
$vc1=$exc[0];	
$vc2=$exc[1];	
$vc3=$exc[2];	
$vc4=$exc[3];	

	$mt1=mktime(date("H",$rss[b_date_play]),date("i",$rss[b_date_play])-1,date("s",$rss[b_date_play]),date("m",$rss[b_date_play]),date("d",$rss[b_date_play]),date("Y",$rss[b_date_play]));
	$mt2=mktime(date("H",$rss[b_date_play])+1,date("i",$rss[b_date_play]),date("s",$rss[b_date_play]),date("m",$rss[b_date_play]),date("d",$rss[b_date_play]),date("Y",$rss[b_date_play]));

	$dtime=date("YmdHi",$mt1);
	$live="LIVE ".date("h:iA",$mt2);

$txt1.='	Nt['.$x.']=["'.$rss[b_id].'","'.$rss[b_add].'","","'.$rss[b_asc].'","'.$rss[b_zone].'","'.$rss[b_name_1].'","'.$rss[b_name_2].'","'.$dtime.'","'.$live.'","False","0","0","0","0","11","'.$rss[b_hdc].'","'.$rss[b_hdc_1].'","'.$rss[b_hdc_2].'","'.$hh.'","22","'.$rss[b_goal].'","'.$rss[b_goal_1].'","'.$rss[b_goal_2].'","","","","","33","'.$rss[b_h_hdc].'","'.$rss[b_h_hdc_1].'","'.$rss[b_h_hdc_2].'","'.$hh.'","44","'.$rss[b_h_goal].'","'.$rss[b_h_goal_1].'","'.$rss[b_h_goal_2].'","","","","","55","'.$rss[b_koo].'","'.$rss[b_kee].'","'.$code.'","'.$rss[b_percent].'","'.$rss[b_percent_goal].'","'.$rss[b_limit_1].'","'.$rss[b_limit_2].'","'.$rss[b_limit_3].'","'.$rss[b_limit_4].'","'.$rss[set_max].'","'.$rss[set_002].'","'.$rss[set_new].'"];
';

$txt5.='	$St['.$rss[b_id].']['.$rss[b_add].']=array("'.$rss[b_id].'","'.$rss[b_add].'","","'.$rss[b_asc].'","'.$rss[b_zone].'","'.$rss[b_name_1].'","'.$rss[b_name_2].'","'.$dtime.'","'.$live.'","False","0","0","0","0","11","'.$rss[b_hdc].'","'.$rss[b_hdc_1].'","'.$rss[b_hdc_2].'","'.$hh.'","22","'.$rss[b_goal].'","'.$rss[b_goal_1].'","'.$rss[b_goal_2].'","","","","","33","'.$rss[b_h_hdc].'","'.$rss[b_h_hdc_1].'","'.$rss[b_h_hdc_2].'","'.$hh.'","44","'.$rss[b_h_goal].'","'.$rss[b_h_goal_1].'","'.$rss[b_h_goal_2].'","","","","","55","'.$rss[b_koo].'","'.$rss[b_kee].'","'.$code.'","'.$rss[b_limit_1].'","'.$rss[b_limit_2].'","'.$rss[b_limit_3].'","'.$rss[b_limit_4].'","'.$rss[set_max].'","'.$rss[set_002].'","'.$rss[set_new].'");
';
#	echo "<hr>";

########################################################################################################
########################################################################################################
$cv5=_hdc($rss[b_hdc_1] , $rss[b_hdc_2] , $rss[b_big], 5);
$cv10=_hdc($rss[b_hdc_1] , $rss[b_hdc_2] , $rss[b_big], 10);
$cv20=_hdc($rss[b_hdc_1] , $rss[b_hdc_2] , $rss[b_big], 20);
$cv30=_hdc($rss[b_hdc_1] , $rss[b_hdc_2] , $rss[b_big], 30);

$cn5=_hdc($rss[b_goal_1] , $rss[b_goal_2] , $rss[b_big], 5);
$cn10=_hdc($rss[b_goal_1] , $rss[b_goal_2] , $rss[b_big], 10);
$cn20=_hdc($rss[b_goal_1] , $rss[b_goal_2] , $rss[b_big], 20);
$cn30=_hdc($rss[b_goal_1] , $rss[b_goal_2] , $rss[b_big], 30);

				$hdp1_1a = price_ball($rss[b_hdc_1] , 3);
				$hdp1_2a = price_ball($rss[b_hdc_2] , 3);
				
				$hdp2_1a = price_ball($rss[b_goal_1] , 3);
				$hdp2_2a = price_ball($rss[b_goal_2] , 3);


if($vc1!=""){$txt2.='$c_data1['.$vc1.']=array("1","'.$rss[b_hdc_1].'","'.$rss[b_hdc].'","'.$rss[b_id].'","1","'.$rss[b_add].'","'.$rss[b_big].'","'.$rss[b_zone].'","'.$rss[b_name_1].'","'.$rss[b_name_2].'","'.$rss[b_date_play].'" ,"h5"=>"'.$cv5[hdc1].'","h10"=>"'.$cv10[hdc1].'","h20"=>"'.$hdp1_1a.'","h30"=>"'.$cv30[hdc1].'");
';}
if($vc2!=""){$txt2.='$c_data1['.$vc2.']=array("2","'.$rss[b_hdc_2].'","'.$rss[b_hdc].'","'.$rss[b_id].'","1","'.$rss[b_add].'","'.$rss[b_big].'","'.$rss[b_zone].'","'.$rss[b_name_1].'","'.$rss[b_name_2].'","'.$rss[b_date_play].'"  ,"h5"=>"'.$cv5[hdc2].'","h10"=>"'.$cv10[hdc2].'","h20"=>"'.$hdp1_2a.'","h30"=>"'.$cv30[hdc2].'");
';}
if($vc3!=""){$txt2.='$c_data1['.$vc3.']=array("3","'.$rss[b_goal_1].'","'.$rss[b_goal].'","'.$rss[b_id].'","1","'.$rss[b_add].'","'.$rss[b_big].'","'.$rss[b_zone].'","'.$rss[b_name_1].'","'.$rss[b_name_2].'","'.$rss[b_date_play].'"  ,"h5"=>"'.$cn5[hdc1].'","h10"=>"'.$cn10[hdc1].'","h20"=>"'.$hdp2_1a.'","h30"=>"'.$cn30[hdc1].'");
';}
if($vc4!=""){$txt2.='$c_data1['.$vc4.']=array("4","'.$rss[b_goal_2].'","'.$rss[b_goal].'","'.$rss[b_id].'","1","'.$rss[b_add].'","'.$rss[b_big].'","'.$rss[b_zone].'","'.$rss[b_name_1].'","'.$rss[b_name_2].'","'.$rss[b_date_play].'"  ,"h5"=>"'.$cn5[hdc2].'","h10"=>"'.$cn10[hdc2].'","h20"=>"'.$hdp2_2a.'","h30"=>"'.$cn30[hdc2].'");
';}




$x++;}



	
$txt1.='	parent.ShowBetListStep(Nt);
</script>';
$txt5.='
	?>';
$txt2.='
?>';


#@unlink("last/".$vd."_".$new_rob.".php");
#@unlink("php/data_".$vd."_".$new_rob.".php");

#echo $txt2;
write("../data/soccer_datastep_live.php",$txt1,"w+"); 
write("../data/last/".$vd."_live.php",$txt1,"w+"); 
write("../data/soccer_datastep2_live.php",$txt5,"w+"); 
write("../data/php/data_".$vd."_live.php",$txt2,"w+"); 




?>