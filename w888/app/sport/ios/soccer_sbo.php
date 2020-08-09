<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
require ("../inc/conn.php");
require ("../inc/function.php");

$league = $_POST["league"];
	
	if($league!="" and $league!="(null)"){
		$exl = explode("," , $league);
		$le = "";
		for($lei=0;$lei<count($exl);$lei++){
			if($le==""){
				$le = "and (b_zone = '$exl[$lei]'";	
			}else{
				$le .= " or b_zone = '$exl[$lei]'"	;
			}
		}
		$le .= ") ";
	}
	
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
	$sql=sql_query("select * from bom_tb_ball_list where   b_date='$date' $le  and b_step='2' and  	b_rob='"._rob()."' and b_active='1'  and r_id='$rid'  order by b_active desc ,  b_top asc, b_top_team asc, b_asc asc, b_date_play asc , 	b_id asc  , b_add asc");
	
	while($rs=mysql_fetch_array($sql)){

		$js .=	'{ "BallID":"'.$rs[b_id].$rs[b_add].'", "League":"'.$rs[b_zone].'", "Team1":"'.$rs[b_name_1].'", "Team2":"'.$rs[b_name_2].'", "Play_Time":"'.date("H.i" , $rs[b_date_play]).'", "Play_Date":"'.date("d-m-Y" , $rs[b_date_play]).'", "Big":"'.$rs[b_big].'","HDP_1":"'.$rs[b_hdc].'","H_1":"'.$rs[b_hdc_1].'","A_1":"'.$rs[b_hdc_2].'","HDP_2":"'.$rs[b_hdc].'","H_2":"'.$rs[b_hdc_1].'","A_2":"'.$rs[b_hdc_2].'","HDP_3":"'.$rs[b_hdc].'","H_3":"'.$rs[b_hdc_1].'","A_3":"'.$rs[b_hdc_2].'","OU_1":"'.$rs[b_goal].'","O_1":"'.$rs[b_goal_1].'","U_1":"'.$rs[b_goal_2].'","OU_2":"'.$rs[b_goal].'","O_2":"'.$rs[b_goal_1].'","U_2":"'.$rs[b_goal_2].'","OU_3":"'.$rs[b_goal].'","O_3":"'.$rs[b_goal_1].'","U_3":"'.$rs[b_goal_2].'" },';
	}
	$js .= "]";
	
	echo $js;
?>