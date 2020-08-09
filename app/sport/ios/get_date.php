<?
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);

require ("../inc/conn.php");
require ("../inc/function.php");


   $arrData = array();	
	$sql="select * from  bom_tb_football_bill  where    m_id='$_GET[mid]' and b_accept=1  group by b_date order by  	b_timestam desc limit 30 ";
	$re=sql_query($sql);
	while($rs=sql_fetch($re)){
		$arrData[]["sDate"]= "$rs[b_date]";		
	}						
	
	
	echo json_encode($arrData);
?>