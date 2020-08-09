<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
require ("../inc/conn.php");
require ("../inc/function.php");

	$date = _bdate();	
	$sql="select * from  bom_tb_football_bill  where   b_date='$date'   and m_id='$_GET[mid]'  order by  b_bonus desc, b_status asc,bill_id desc limit 500";
	$re=sql_query($sql);
	
	$js = "[";

	
	while($rs=sql_fetch($re)){

	if($rs[bill_out]>0){    $bill_id=$rs[bill_out]; }
	else{   $bill_id=$rs[bill_id]; }
	
	
	
		$js .=	'{ "BallID":"'.$bill_id.'", "Bdate":"'.date("d-m-Y-H-i-s",$rs[b_timestam]).'"  , "Btotal":"'.$rs[b_total].'"   , "Bnumstep":"'.$rs[b_numstep].'"   , "Bcode":"'.$rs[b_code].'"  , "Bss":"'.$rs[b_status].'"    , "Bstatus":"'.$f_status[$rs[b_status]].'"   , "Bbonus":"'.$rs[b_bonus].'"     },';

	}
	$js .= "]";
	
	echo $js;
?>