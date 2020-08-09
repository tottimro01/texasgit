<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
require ("../inc/conn.php");
require ("../inc/function.php");

	
	if($_GET["d"]!=""){
		$date = $_GET["d"];	
	}else{
		$date = _bdate();	
	}
	
	if($_GET["id"]!=""){
		$rid = $_GET["id"];	
	}else{
	
	}
	$rid =1;		
	

	
	$js = "[";
	$sql=sql_query("select * from bom_tb_ball_list where   b_date='$date'  and b_step='2' and  	b_rob='"._rob()."' and b_active='1'  and r_id='$rid'  order by b_active desc ,  b_top asc, b_top_team asc, b_asc asc, b_date_play asc , 	b_id asc  , b_add asc");
	
	while($rs=mysql_fetch_array($sql)){

		$js .=	'{ "BallID":"'.$rs[b_id].'", "Team1":"'.$rs[b_name_1].'", "Team2":"'.$rs[b_name_2].'", "Score":"'.$rs[b_score_half].'", "Score2":"'.$rs[b_score_full].'", "Play_Time":"'.date("H.i" , $rs[b_date_play]).'", "Play_Date":"'.date("d-m-Y" , $rs[b_date_play]).'","League":"'.$rs[b_zone].'","Hdc":"'.$rs[b_hdc].'","Hdc1":"'.$rs[b_hdc_1].'","Hdc2":"'.$rs[b_hdc_2].'","Goal":"'.$rs[b_goal].'","Goal1":"'.$rs[b_goal_1].'","Goal2":"'.$rs[b_goal_2].'","Big":"'.$rs[b_big].'" },';
	}
	$js .= "]";
	
	echo $js;
?>