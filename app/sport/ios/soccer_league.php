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
	$sql=sql_query("select * from bom_tb_ball_list where   b_date='$date'  and b_step='2' and  	b_rob='"._rob()."' and b_active='1'  and r_id='$rid' group by b_zone  order by b_active desc ,  b_top asc, b_top_team asc, b_asc asc, b_date_play asc , 	b_id asc  , b_add asc");
	
	while($rs=mysql_fetch_array($sql)){

		$js .=	'{ "League":"'.$rs[b_zone].'" },';
	}
	$js .= "]";
	
	echo $js;
?>