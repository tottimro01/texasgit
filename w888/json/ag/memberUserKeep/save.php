<?php 
 ob_start(); if (!isset($_SESSION)) { session_start(); }
  
if($_SESSION["AGlang"]==""){
  $_SESSION["AGlang"]="th";
}

require('../lang/ag_'.$_SESSION["AGlang"].'.php');
require('../inc/conn.php');
require('../inc/function.php');

// $sql1="select * from bom_tb_agent where  r_id='".$_SESSION[["r_id"]."' ";
// $rs_a=sql_array($sql);


$r_id = $_SESSION['r_id'];
$sql1 ="select * from bom_tb_agent where r_id = '".$r_id."'";
$rs_a=sql_array($sql1);


$ex_main_r_sport_share =@explode(",",$rs_a['r_sport_share']);
$ex_main_r_sport_share_live =@explode(",",$rs_a['r_sport_share_live']);	
$ex_main_r_lotto_share =@explode(",",$rs_a['r_lotto_share']);	
$ex_main_r_lotto_hun_share =@explode(",",$rs_a['r_lotto_hun_share']);	
$ex_main_r_lotto_hun_set_share =@explode(",",$rs_a['r_lotto_hun_set_share']);	
$ex_main_r_games_share =@explode(",",$rs_a['r_games_share']);	
$ex_main_r_casino_share =@explode(",",$rs_a['r_casino_share']);




$id				 	= sql_escape_str($_POST['id']);
$username 	= sql_escape_str($_POST['username']);
$ctype 			= sql_escape_str($_POST['ctype']);
$cvalue 		= sql_escape_str($_POST['cvalue']);

$ex_ctype=@explode("_",$ctype );

$sql="select * from bom_tb_agent where r_id = $id";
$rs = sql_array($sql);

$x1as = $sql;

$r_agent_id = $rs['r_agent_id'];
$r_level_under= intval($rs['r_level'])+1;
$r_agent_id_under = $r_agent_id.$id."*";

$sql="select * from bom_tb_agent where r_agent_id like '%".$r_agent_id_under."%' and r_level='$r_level_under'";
$reA=sql_query($sql);

$check_r_sport_share_max = array(); 
$check_r_sport_share_live_max = array(); 
$check_r_lotto_share = array(); 
$check_r_lotto_hun_share = array();
$check_r_lotto_hun_set_share = array(); 
$check_r_games_share = array();
$check_r_casino_share = array(); 

while($rss=sql_fetch($reA)){
  $exd=@explode(",",$rss['r_sport_share']);
  foreach ($exd as $key => $value) {
     if($key > 0){    
          $check_r_sport_share_max[$key][] = $value;
     }
  }

  $exd=@explode(",",$rss['r_sport_share_live']);
  foreach ($exd as $key => $value) {
     if($key > 0){    
          $check_r_sport_share_live_max[$key][] = $value;
     }
  }

  $exd=@explode(",",$rss['r_lotto_share']);
  foreach ($exd as $key => $value) {
     if($key > 0){    
          $check_r_lotto_share[$key][] = $value;
     }
  }

  $exd=@explode(",",$rss['r_lotto_hun_share']);
  foreach ($exd as $key => $value) {
     if($key > 0){    
          $check_r_lotto_hun_share[$key][] = $value;
     }
  }
        
  $exd=@explode(",",$rss['r_lotto_hun_set_share']);
  foreach ($exd as $key => $value) {
     if($key > 0){    
          $check_r_lotto_hun_set_share[$key][] = $value;
     }
  }
        
  $exd=@explode(",",$rss['r_games_share']);
  foreach ($exd as $key => $value) {
     if($key > 0){    
          $check_r_games_share[$key][] = $value;
     }
  }
        
  $exd=@explode(",",$rss['r_casino_share']);
  foreach ($exd as $key => $value) {
     if($key > 0){    
          $check_r_casino_share[$key][] = $value;
     }
  }                        
}

$check_r_casino_share = (empty($check_r_casino_share)) ?  array(0,0,0,0) : $check_r_casino_share;

$res['min_share'][1] = (max($check_r_sport_share_max[1])===null) ? 0 : max($check_r_sport_share_max[1]);
$res['min_share'][2] = (max($check_r_sport_share_live_max[1])===null) ? 0 : max($check_r_sport_share_live_max[1]);
$res['min_share'][3] = (max($check_r_sport_share_max[2])===null) ? 0 : max($check_r_sport_share_max[2]);
$res['min_share'][4] = (max($check_r_sport_share_live_max[2])===null) ? 0 : max($check_r_sport_share_live_max[2]);
$res['min_share'][5] = (max($check_r_sport_share_max[3])===null) ? 0 : max($check_r_sport_share_max[3]);
$res['min_share'][6] = (max($check_r_sport_share_live_max[3])===null) ? 0 : max($check_r_sport_share_live_max[3]);
$res['min_share'][7] = (max($check_r_sport_share_max[4])===null) ? 0 : max($check_r_sport_share_max[4]);
$res['min_share'][8] = (max($check_r_lotto_share[1])===null) ? 0 : max($check_r_lotto_share[1]);
$res['min_share'][9] = (max($check_r_lotto_hun_share[1])===null) ? 0 : max($check_r_lotto_hun_share[1]);
$res['min_share'][10] = (max($check_r_lotto_hun_set_share[1])===null) ? 0 : max($check_r_lotto_hun_set_share[1]);
$res['min_share'][11] = (max($check_r_games_share[1])===null) ? 0 : max($check_r_games_share[1]);

foreach ($check_r_casino_share as $key => $value) {
  $res['min_share'][] = (max($value)===null) ? 0 : max($value);
}


if($cvalue >= $res['min_share'][$ex_ctype[1]] && $cvalue <= 100)
{

	$ex_a_r_sport_share =@explode(",",$rs['r_sport_share']);
	$ex_a_r_sport_share_live =@explode(",",$rs['r_sport_share_live']);	
	$ex_a_r_lotto_share =@explode(",",$rs['r_lotto_share']);	
	$ex_a_r_lotto_hun_share =@explode(",",$rs['r_lotto_hun_share']);	
	$ex_a_r_lotto_hun_set_share =@explode(",",$rs['r_lotto_hun_set_share']);	
	$ex_a_r_games_share =@explode(",",$rs['r_games_share']);	
	$ex_a_r_casino_share =@explode(",",$rs['r_casino_share']);

	$ex_a_r_sport_myshare =@explode(",",$rs['r_sport_myshare']);
	$ex_a_r_sport_myshare_live =@explode(",",$rs['r_sport_myshare_live']);
	$ex_a_r_lotto_myshare =@explode(",",$rs['r_lotto_myshare']);
	$ex_a_r_lotto_hun_myshare =@explode(",",$rs['r_lotto_hun_myshare']);
	$ex_a_r_lotto_hun_set_myshare =@explode(",",$rs['r_lotto_hun_set_myshare']);
	$ex_a_r_games_myshare =@explode(",",$rs['r_games_myshare']);
	$ex_a_r_casino_myshare =@explode(",",$rs['r_casino_myshare']);

	switch ($ex_ctype[1]) {
		case '1':  
				$ex_a_r_sport_share[1] = $cvalue;
				$ex_a_r_sport_myshare[1] = $ex_main_r_sport_share[1] - $cvalue;
			break;
		case '2':
				$ex_a_r_sport_share_live[1] = $cvalue;
				$ex_a_r_sport_myshare_live[1] = $ex_main_r_sport_share_live[1] - $cvalue;
			break;	
		case '3':
				$ex_a_r_sport_share[2] = $cvalue;
				$ex_a_r_sport_myshare[2] = $ex_main_r_sport_share[2] - $cvalue;
			break;
		case '4':
				$ex_a_r_sport_share_live[2] = $cvalue;
				$ex_a_r_sport_myshare_live[3] = $ex_main_r_sport_share_live[3] - $cvalue;
			break;	
		case '5':
				$ex_a_r_sport_share[3] = $cvalue;
				$ex_a_r_sport_myshare[3] = $ex_main_r_sport_share[3] - $cvalue;
			break;
		case '6':
				$ex_a_r_sport_share_live[3] = $cvalue;
				$ex_a_r_sport_myshare_live[3] = $ex_main_r_sport_share_live[3] - $cvalue;
			break;	
		case '7':
				$ex_a_r_sport_share[4] = $cvalue;
				$ex_a_r_sport_myshare[4] = $ex_main_r_sport_share[4] - $cvalue;
			break;
		case '8':  // หวย
				foreach ($ex_a_r_lotto_share as $key => $value) {
					if($key > 0)
					{
						$ex_a_r_lotto_share[$key] = $cvalue;
						$ex_a_r_lotto_myshare[$key] = $ex_main_r_lotto_share[$key] - $cvalue;
					}
				}
			break;
		case '9': // หวยหุ้น
				foreach ($ex_a_r_lotto_hun_share as $key => $value) {
					if($key > 0)
					{
						$ex_a_r_lotto_hun_share[$key] = $cvalue;
						$ex_a_r_lotto_hun_myshare[$key] = $ex_main_r_lotto_hun_share[$key] - $cvalue;
					}
				}
			break;	
		case '10': // หวยหุ้น
				foreach ($ex_a_r_lotto_hun_set_share as $key => $value) {
					if($key > 0)
					{
						$ex_a_r_lotto_hun_set_share[$key] = $cvalue;
						$ex_a_r_lotto_hun_set_myshare[$key] = $ex_main_r_lotto_hun_set_share[$key] - $cvalue;
					}
				}
			break;						
		case '11':// เกมส์
				$ex_a_r_games_share[1] = $cvalue;
				$ex_a_r_games_myshare[1] = $ex_main_r_games_share[1] - $cvalue;
			break;
		case '12':
				$ex_a_r_casino_share[1] = $cvalue;
				$ex_a_r_casino_myshare[1] = $ex_a_r_casino_myshare[1] - $cvalue;
			break;
		case '13':
				$ex_a_r_casino_share[2] = $cvalue;
				$ex_a_r_casino_myshare[2] = $ex_a_r_casino_myshare[2] - $cvalue;
			break;
		case '14':
				$ex_a_r_casino_share[3] = $cvalue;
				$ex_a_r_casino_myshare[3] = $ex_a_r_casino_myshare[3] - $cvalue;
			break;
		case '15':
				$ex_a_r_casino_share[4] = $cvalue;
				$ex_a_r_casino_myshare[4] = $ex_a_r_casino_myshare[4] - $cvalue;
			break;				
		default:
			# code...
			break;
	}

	$im_a_r_sport_share = implode(",",$ex_a_r_sport_share);
	$im_a_r_sport_share_live = implode(",",$ex_a_r_sport_share_live);
	$im_a_r_lotto_share = implode(",",$ex_a_r_lotto_share);
	$im_a_r_lotto_hun_share = implode(",",$ex_a_r_lotto_hun_share);
	$im_a_r_lotto_hun_set_share = implode(",",$ex_a_r_lotto_hun_set_share);
	$im_a_r_games_share = implode(",",$ex_a_r_games_share);
	$im_a_r_casino_share = implode(",",$ex_a_r_casino_share);

	$im_a_r_sport_myshare = implode(",",$ex_a_r_sport_myshare);
	$im_a_r_sport_myshare_live = implode(",",$ex_a_r_sport_myshare_live);
	$im_a_r_lotto_myshare = implode(",",$ex_a_r_lotto_myshare);
	$im_a_r_lotto_hun_myshare = implode(",",$ex_a_r_lotto_hun_myshare);
	$im_a_r_lotto_hun_set_myshare = implode(",",$ex_a_r_lotto_hun_set_myshare);
	$im_a_r_games_myshare = implode(",",$ex_a_r_games_myshare);
	$im_a_r_casino_myshare = implode(",",$ex_a_r_casino_myshare);




	$sql = "UPDATE `bom_tb_agent` SET `r_sport_share`= '$im_a_r_sport_share',`r_sport_myshare`= '$im_a_r_sport_myshare',`r_sport_share_live`= '$im_a_r_sport_share_live',`r_sport_myshare_live`= '$im_a_r_sport_myshare_live',`r_lotto_share`= '$im_a_r_lotto_share',`r_lotto_myshare`= '$im_a_r_lotto_myshare',`r_lotto_hun_share`= '$im_a_r_lotto_hun_share',`r_lotto_hun_myshare`= '$im_a_r_lotto_hun_myshare' ,`r_lotto_hun_set_share`= '$im_a_r_lotto_hun_set_share' ,`r_lotto_hun_set_myshare`= '$im_a_r_lotto_hun_set_myshare' ,`r_games_share`= '$im_a_r_games_share' ,`r_games_myshare`= '$im_a_r_games_myshare',`r_casino_share`= '$im_a_r_casino_share',`r_casino_myshare`= '$im_a_r_casino_myshare' WHERE r_id = $id";

	$query = sql_query($sql);
	if($query)
	{
		$data  = array(
			'msg'     =>  $lang_message[5],
			'status'  =>  true,
			// 'im_a_r_sport_share' =>$im_a_r_sport_share,
			// 'im_a_r_sport_share_live' =>$im_a_r_sport_share_live,
			// 'im_a_r_lotto_share' =>$im_a_r_lotto_share,
			// 'im_a_r_lotto_hun_share' =>$im_a_r_lotto_hun_share,
			// 'im_a_r_lotto_hun_set_share' =>$im_a_r_lotto_hun_set_share,
			// 'im_a_r_games_share' =>$im_a_r_games_share,
			// 'im_a_r_casino_share' =>$im_a_r_casino_share,
			// 'sql' =>$sql,
		);
	}else{
		$data  = array(
			'msg' => $lang_message[4],
			'status' => false,
		);
	}


	// $data  = array(
	// 		'msg'     =>  $lang_message[5],
	// 		'status'  =>  true,
	// 		'sql1' => $sql1,
	// 		'im_a_r_sport_myshare' => $im_a_r_sport_myshare,
	// 		'im_a_r_sport_myshare_live' => $im_a_r_sport_myshare_live,
	// 		'im_a_r_lotto_myshare' => $im_a_r_lotto_myshare,
	// 		'im_a_r_lotto_hun_myshare' => $im_a_r_lotto_hun_myshare,
	// 		'im_a_r_lotto_hun_set_myshare' => $im_a_r_lotto_hun_set_myshare,
	// 		'im_a_r_games_myshare' => $im_a_r_games_myshare,
	// 		'im_a_r_casino_myshare' => $im_a_r_casino_myshare,
	// 		'sql' => $sql
	// 	);




}else{  // ข้อมูลไม่ถูกต้อง 
	$data = array(
		'msg' => $lang_message[7],
		'status' => false,
	);
}


echo json_encode($data);
 ?>