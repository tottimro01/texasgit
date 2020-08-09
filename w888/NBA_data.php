<?
session_start();
require('inc/function.php');
require('inc/conn_dd.php');
if($_GET['Market']=='l' && $_GET['Sport']=='2' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['MainLeague']=='0' && $_GET['key']=='lodds'){
	echo file_get_contents2($server_soccer."NBA_data_L_2.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}else if($_GET['Market']=='t' && $_GET['Sport']=='2' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['key']=='dodds' && $_GET['MainLeague']=='0'){
	echo file_get_contents2($server_soccer."NBA_data_T_2.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}else if($_GET['Market']=='e' && $_GET['Sport']=='2' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['key']=='dodds' && $_GET['MainLeague']=='0'){
	echo file_get_contents2($server_soccer."NBA_data_E_2.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']."&DT=".$_GET['DT']);
// new ------------------------------------------------------------------------------------------
}elseif($_GET['Market']=='l' && $_GET['Sport']=='2' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['MainLeague']=='0' && $_GET['key']=='lodds'){
	echo file_get_contents2($server_soccer."NBA_data_LR_2.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}elseif($_GET['Market']=='t' && $_GET['Sport']=='2' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['key']=='dodds'){
	echo file_get_contents2($server_soccer."NBA_data_TR_2.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}elseif($_GET['Market']=='e' && $_GET['Sport']=='2' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['key']=='dodds'){
	echo file_get_contents2($server_soccer."NBA_data_ER_2.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']."&DT=".$_GET['DT']);
}

$pagename = strtolower(basename(__FILE__));
$sportId = $_GET['Sport'];
$market =  $_GET['Market'];
$savedSelectLeagueArray = (isset($_SESSION['selectleague'][$sportId][$pagename][$market]) && $_SESSION['selectleague'][$sportId][$pagename][$market]!="") ? explode(",",  $_SESSION['selectleague'][$sportId][$pagename][$market]) : array();

if($_GET['SelectLeague']=='0'){
	if(count($savedSelectLeagueArray)>0){
		$arr_League = array();
	}else{
		$arr_League = array('0');
	}
}else{
	$arr_League = explode(",", $_GET['SelectLeague']);
}
foreach ($savedSelectLeagueArray as $kl => $vl){
	if(!in_array($vl, $arr_League)){
		 $arr_League[] = $vl;
	}	
}
?>

<script>parent.arr_League=<? echo json_encode($arr_League); ?>;</script>