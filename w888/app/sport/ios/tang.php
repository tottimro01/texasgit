<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
require ("../inc/conn.php");
require ("../inc/function.php");

$date = _bdate();	
if($_GET[id]!=""){
	$rid=$_GET[id];
	}else{
	
		}
	$rid=1;
	$js = "[";	

$new_rob=_rob();
require('../process/data/data_'.$new_rob.'.php');
require('../process/data/rid_'.$rid.'_'.$new_rob.'.php');


			foreach($x_data[x][z][2] as $rsx){
foreach($x_data[x][t][2][_rob()][$rsx[b_asc]] as $rs){
	
		if($rs[b_date_play]> $time_stam ){
		$ex_code = explode("," , $rs["b_numcode"]);
		$js .=	'{ "BallID":"'.$rs[b_id].'", "Team1":"'.$rs[b_name_1].'", "Team2":"'.$rs[b_name_2].'", "Score":"'.$rs[b_score_half].'", "Score2":"'.$rs[b_score_full].'", "Play_Time":"'.date("H.i" , $rs[b_date_play]).'", "Play_Date":"'.date("d-m-Y" , $rs[b_date_play]).'","League":"'.$rs[b_zone].'","Hdc":"'.$rs[b_hdc].'","Hdc1":"'.$rs[b_hdc_1].'","Hdc2":"'.$rs[b_hdc_2].'","Goal":"'.$rs[b_goal].'","Goal1":"'.$rs[b_goal_1].'","Goal2":"'.$rs[b_goal_2].'","Big":"'.$rs[b_big].'"  ,"HF":"0" ,"No1":"'.$ex_code[0].'","No2":"'.$ex_code[1].'","No3":"'.$ex_code[2].'","No4":"'.$ex_code[3].'" },';
		}
	}
	}
	
	
	$js .= "]";
	
	echo $js;
?>