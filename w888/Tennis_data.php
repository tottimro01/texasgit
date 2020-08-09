<?
session_start();
require('inc/function.php');
require('inc/conn_dd.php');
//มวยไทย
if($_GET['Market']=='l' && $_GET['Sport']=='44' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['MainLeague']=='0' && $_GET['key']=='lodds'){
	echo file_get_contents2($server_soccer."Muay_data_L_44.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']."&CT=".$_GET['CT']);
}else if($_GET['Market']=='t' && $_GET['Sport']=='44' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['key']=='dodds' && $_GET['MainLeague']=='0'){
	echo file_get_contents2($server_soccer."Muay_data_T_44.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']."&CT=".$_GET['CT']);
}else if($_GET['Market']=='e' && $_GET['Sport']=='44' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['key']=='dodds' && $_GET['MainLeague']=='0'){
	echo file_get_contents2($server_soccer."Muay_data_E_44.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']."&DT=".$_GET['DT']."&CT=".$_GET['CT']);
// new ------------------------------------------------------------------------------------------
}elseif($_GET['Market']=='l' && $_GET['Sport']=='44' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['MainLeague']=='0' && $_GET['key']=='lodds'){
	echo file_get_contents2($server_soccer."Muay_data_LR_44.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}elseif($_GET['Market']=='t' && $_GET['Sport']=='44' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['key']=='dodds'){
	echo file_get_contents2($server_soccer."Muay_data_TR_44.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}elseif($_GET['Market']=='e' && $_GET['Sport']=='44' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['key']=='dodds'){
	echo file_get_contents2($server_soccer."Muay_data_ER_44.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']."&DT=".$_GET['DT']);
	
//เทนนิส
}else if($_GET['Market']=='l' && $_GET['Sport']=='5' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['MainLeague']=='0' && $_GET['key']=='lodds'){
	echo file_get_contents2($server_soccer."Tennis_data_L_5.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}else if($_GET['Market']=='t' && $_GET['Sport']=='5' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['key']=='dodds' && $_GET['MainLeague']=='0'){
	echo file_get_contents2($server_soccer."Tennis_data_T_5.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}else if($_GET['Market']=='e' && $_GET['Sport']=='5' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['key']=='dodds' && $_GET['MainLeague']=='0'){
	echo file_get_contents2($server_soccer."Tennis_data_E_5.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']."&DT=".$_GET['DT']);
// new ------------------------------------------------------------------------------------------
}elseif($_GET['Market']=='l' && $_GET['Sport']=='5' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['MainLeague']=='0' && $_GET['key']=='lodds'){
	echo file_get_contents2($server_soccer."Tennis_data_LR_5.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}elseif($_GET['Market']=='t' && $_GET['Sport']=='5' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['key']=='dodds'){
	echo file_get_contents2($server_soccer."Tennis_data_TR_5.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}elseif($_GET['Market']=='e' && $_GET['Sport']=='5' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['key']=='dodds'){
	echo file_get_contents2($server_soccer."Tennis_data_ER_5.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']."&DT=".$_GET['DT']);
	
//แบทมินตั้น
}else if($_GET['Market']=='l' && $_GET['Sport']=='9' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['MainLeague']=='0' && $_GET['key']=='lodds'){
	echo file_get_contents2($server_soccer."Badminton_data_L_9.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}else if($_GET['Market']=='t' && $_GET['Sport']=='9' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['key']=='dodds' && $_GET['MainLeague']=='0'){
	echo file_get_contents2($server_soccer."Badminton_data_T_9.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}else if($_GET['Market']=='e' && $_GET['Sport']=='9' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['key']=='dodds' && $_GET['MainLeague']=='0'){
	echo file_get_contents2($server_soccer."Badminton_data_E_9.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']."&DT=".$_GET['DT']);
// new ------------------------------------------------------------------------------------------
}elseif($_GET['Market']=='l' && $_GET['Sport']=='9' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['MainLeague']=='0' && $_GET['key']=='lodds'){
	echo file_get_contents2($server_soccer."Badminton_data_LR_9.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}elseif($_GET['Market']=='t' && $_GET['Sport']=='9' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['key']=='dodds'){
	echo file_get_contents2($server_soccer."Badminton_data_TR_9.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}elseif($_GET['Market']=='e' && $_GET['Sport']=='9' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['key']=='dodds'){
	echo file_get_contents2($server_soccer."Badminton_data_ER_9.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']."&DT=".$_GET['DT']);
	
//วอลเลย์บอล
}else if($_GET['Market']=='l' && $_GET['Sport']=='6' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['MainLeague']=='0' && $_GET['key']=='lodds'){
	echo file_get_contents2($server_soccer."Volleyball_data_L_6.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}else if($_GET['Market']=='t' && $_GET['Sport']=='6' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['key']=='dodds' && $_GET['MainLeague']=='0'){
	echo file_get_contents2($server_soccer."Volleyball_data_T_6.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}else if($_GET['Market']=='e' && $_GET['Sport']=='6' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['key']=='dodds' && $_GET['MainLeague']=='0'){
	echo file_get_contents2($server_soccer."Volleyball_data_E_6.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']."&DT=".$_GET['DT']);
// new ------------------------------------------------------------------------------------------
}elseif($_GET['Market']=='l' && $_GET['Sport']=='6' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['MainLeague']=='0' && $_GET['key']=='lodds'){
	echo file_get_contents2($server_soccer."Volleyball_data_LR_6.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}elseif($_GET['Market']=='t' && $_GET['Sport']=='6' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['key']=='dodds'){
	echo file_get_contents2($server_soccer."Volleyball_data_TR_6.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}elseif($_GET['Market']=='e' && $_GET['Sport']=='6' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['key']=='dodds'){
	echo file_get_contents2($server_soccer."Volleyball_data_ER_6.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']."&DT=".$_GET['DT']);
	
//แฮนด์บอล
}else if($_GET['Market']=='l' && $_GET['Sport']=='24' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['MainLeague']=='0' && $_GET['key']=='lodds'){
	echo file_get_contents2($server_soccer."Handball_data_L_24.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}else if($_GET['Market']=='t' && $_GET['Sport']=='24' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['key']=='dodds' && $_GET['MainLeague']=='0'){
	echo file_get_contents2($server_soccer."Handball_data_T_24.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}else if($_GET['Market']=='e' && $_GET['Sport']=='24' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['key']=='dodds' && $_GET['MainLeague']=='0'){
	echo file_get_contents2($server_soccer."Handball_data_E_24.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']."&DT=".$_GET['DT']);
// new ------------------------------------------------------------------------------------------
}elseif($_GET['Market']=='l' && $_GET['Sport']=='24' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['MainLeague']=='0' && $_GET['key']=='lodds'){
	echo file_get_contents2($server_soccer."Handball_data_LR_24.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}elseif($_GET['Market']=='t' && $_GET['Sport']=='24' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['key']=='dodds'){
	echo file_get_contents2($server_soccer."Handball_data_TR_24.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}elseif($_GET['Market']=='e' && $_GET['Sport']=='24' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['key']=='dodds'){
	echo file_get_contents2($server_soccer."Handball_data_ER_24.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']."&DT=".$_GET['DT']);
	
//ฮ๊อกกี้น้ำแข็ง
}else if($_GET['Market']=='l' && $_GET['Sport']=='4' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['MainLeague']=='0' && $_GET['key']=='lodds'){
	echo file_get_contents2($server_soccer."Hockey_data_L_4.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}else if($_GET['Market']=='t' && $_GET['Sport']=='4' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['key']=='dodds' && $_GET['MainLeague']=='0'){
	echo file_get_contents2($server_soccer."Hockey_data_T_4.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}else if($_GET['Market']=='e' && $_GET['Sport']=='4' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['key']=='dodds' && $_GET['MainLeague']=='0'){
	echo file_get_contents2($server_soccer."Hockey_data_E_4.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']."&DT=".$_GET['DT']);
// new ------------------------------------------------------------------------------------------
}elseif($_GET['Market']=='l' && $_GET['Sport']=='4' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['MainLeague']=='0' && $_GET['key']=='lodds'){
	echo file_get_contents2($server_soccer."Hockey_data_LR_4.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}elseif($_GET['Market']=='t' && $_GET['Sport']=='4' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['key']=='dodds'){
	echo file_get_contents2($server_soccer."Hockey_data_TR_4.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}elseif($_GET['Market']=='e' && $_GET['Sport']=='4' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['key']=='dodds'){
	echo file_get_contents2($server_soccer."Hockey_data_ER_4.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']."&DT=".$_GET['DT']);
	
//โปโล
}else if($_GET['Market']=='l' && $_GET['Sport']=='14' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['MainLeague']=='0' && $_GET['key']=='lodds'){
	echo file_get_contents2($server_soccer."Polo_data_L_14.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}else if($_GET['Market']=='t' && $_GET['Sport']=='14' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['key']=='dodds' && $_GET['MainLeague']=='0'){
	echo file_get_contents2($server_soccer."Polo_data_T_14.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}else if($_GET['Market']=='e' && $_GET['Sport']=='14' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['key']=='dodds' && $_GET['MainLeague']=='0'){
	echo file_get_contents2($server_soccer."Polo_data_E_14.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']."&DT=".$_GET['DT']);
// new ------------------------------------------------------------------------------------------
}elseif($_GET['Market']=='l' && $_GET['Sport']=='14' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['MainLeague']=='0' && $_GET['key']=='lodds'){
	echo file_get_contents2($server_soccer."Polo_data_LR_14.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}elseif($_GET['Market']=='t' && $_GET['Sport']=='14' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['key']=='dodds'){
	echo file_get_contents2($server_soccer."Polo_data_TR_14.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}elseif($_GET['Market']=='e' && $_GET['Sport']=='14' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['key']=='dodds'){
	echo file_get_contents2($server_soccer."Polo_data_ER_14.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']."&DT=".$_GET['DT']);
	
//มวย
}else if($_GET['Market']=='l' && $_GET['Sport']=='16' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['MainLeague']=='0' && $_GET['key']=='lodds'){
	echo file_get_contents2($server_soccer."Boxing_data_L_16.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}else if($_GET['Market']=='t' && $_GET['Sport']=='16' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['key']=='dodds' && $_GET['MainLeague']=='0'){
	echo file_get_contents2($server_soccer."Boxing_data_T_16.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}else if($_GET['Market']=='e' && $_GET['Sport']=='16' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['key']=='dodds' && $_GET['MainLeague']=='0'){
	echo file_get_contents2($server_soccer."Boxing_data_E_16.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']."&DT=".$_GET['DT']);
// new ------------------------------------------------------------------------------------------
}elseif($_GET['Market']=='l' && $_GET['Sport']=='16' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['MainLeague']=='0' && $_GET['key']=='lodds'){
	echo file_get_contents2($server_soccer."Boxing_data_LR_16.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}elseif($_GET['Market']=='t' && $_GET['Sport']=='16' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['key']=='dodds'){
	echo file_get_contents2($server_soccer."Boxing_data_TR_16.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']);
}elseif($_GET['Market']=='e' && $_GET['Sport']=='16' && $_GET['RT']=='U' && $_GET['Game']==0 && $_GET['key']=='dodds'){
	echo file_get_contents2($server_soccer."Boxing_data_ER_16.php?OddsType=".$_GET['OddsType']."&OrderBy=".$_GET['OrderBy']."&DT=".$_GET['DT']);
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