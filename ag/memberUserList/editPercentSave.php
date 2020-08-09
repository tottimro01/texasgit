<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
if($_SESSION["AGlang"]==""){
	$_SESSION["AGlang"]="th";
}

require('../inc/conn.php');
require('../inc/function.php');
require('../lang/ag_lang.php');

// เอเย่นต์บังคับสู้
$sql="select * from bom_tb_agent where  r_id='".$_SESSION["r_id"]."' ";
$rs=sql_array($sql);

$agent_share = [];
$ex_r_sport_share = explode(",", $rs["r_sport_share"]);
$ex_r_sport_share_live = explode(",", $rs["r_sport_share_live"]);
$ex_r_lotto_share = explode(",", $rs["r_lotto_share"]);
$ex_r_lotto_hun_share = explode(",", $rs["r_lotto_hun_share"]);
$ex_r_lotto_hun_set_share = explode(",", $rs["r_lotto_hun_set_share"]);
$ex_r_games_share = explode(",", $rs["r_games_share"]);
$ex_r_casino_share = explode(",", $rs["r_casino_share"]);

$agent_share[1] = $ex_r_sport_share[1];
$agent_share[2] = $ex_r_sport_share_live[1];
$agent_share[3] = $ex_r_sport_share[2];
$agent_share[4] = $ex_r_sport_share_live[2];
$agent_share[5] = $ex_r_sport_share[3];
$agent_share[6] = $ex_r_sport_share_live[3];
$agent_share[7] = $ex_r_sport_share[4];
$agent_share[8] = $ex_r_lotto_share[1];
$agent_share[9] = $ex_r_lotto_hun_share[1];
$agent_share[10] = $ex_r_lotto_hun_set_share[1];
$agent_share[11] = $ex_r_games_share[1];

foreach ($ex_r_casino_share as $key => $value) {
   if($key > 0){ $agent_share[]=$value; }
}

$id  = sql_escape_str($_POST['id']);
$sql="select * from bom_tb_agent where  r_agent_id like '%*".$_SESSION["r_id"]."*%'  and   r_id='".$id."' ";
$rex=sql_array($sql);

// get min Data
$r_agent_id = $rex['r_agent_id'];
$r_level_under= intval($rex['r_level'])+1;
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

$min_share[1] = (max($check_r_sport_share_max[1])===null) ? 0 : max($check_r_sport_share_max[1]);
$min_share[2] = (max($check_r_sport_share_live_max[1])===null) ? 0 : max($check_r_sport_share_live_max[1]);
$min_share[3] = (max($check_r_sport_share_max[2])===null) ? 0 : max($check_r_sport_share_max[2]);
$min_share[4] = (max($check_r_sport_share_live_max[2])===null) ? 0 : max($check_r_sport_share_live_max[2]);
$min_share[5] = (max($check_r_sport_share_max[3])===null) ? 0 : max($check_r_sport_share_max[3]);
$min_share[6] = (max($check_r_sport_share_live_max[3])===null) ? 0 : max($check_r_sport_share_live_max[3]);
$min_share[7] = (max($check_r_sport_share_max[4])===null) ? 0 : max($check_r_sport_share_max[4]);
$min_share[8] = (max($check_r_lotto_share[1])===null) ? 0 : max($check_r_lotto_share[1]);
$min_share[9] = (max($check_r_lotto_hun_share[1])===null) ? 0 : max($check_r_lotto_hun_share[1]);
$min_share[10] = (max($check_r_lotto_hun_set_share[1])===null) ? 0 : max($check_r_lotto_hun_set_share[1]);
$min_share[11] = (max($check_r_games_share[1])===null) ? 0 : max($check_r_games_share[1]);

foreach ($check_r_casino_share as $key => $value) {
  $min_share[] = (max($value)===null) ? 0 : max($value);
}

// ดึงข้อมูล

$list_share = [];
$list_myshare = [];
$list_force = [];

$chk_minVal = true;

foreach ($lang_g["list_share"] as $key => $value) {
	$share = sql_escape_str($_POST['setup'.$key.'_share']);
	$list_share[$key]  	= $share;
	$list_force[$key]  	= sql_escape_str($_POST['setup'.$key.'_fshare']);
	$list_myshare[$key] = intval($agent_share[$key])-intval($share);

	if(intval($share)< intval($min_share[$key]))
	{
		$chk_minVal = false;
	}
}

if($chk_minVal)
{
	$ex_a_r_sport_share =@explode(",",$rex['r_sport_share']);
	$ex_a_r_sport_share_live =@explode(",",$rex['r_sport_share_live']);	
	$ex_a_r_lotto_share =@explode(",",$rex['r_lotto_share']);	
	$ex_a_r_lotto_hun_share =@explode(",",$rex['r_lotto_hun_share']);	
	$ex_a_r_lotto_hun_set_share =@explode(",",$rs['r_lotto_hun_set_share']);	
	$ex_a_r_games_share =@explode(",",$rex['r_games_share']);	
	$ex_a_r_casino_share =@explode(",",$rex['r_casino_share']);

	// r_sport_share  1 3 5 7
	// r_sport_share_live 2 4 6
	// r_lotto_share 8
	// r_lotto_hun_share 9
	// r_lotto_hun_set_share 10
	// r_games_share 11
	// r_casino_share 12 13 14 15

	$r_sport_share 						= "share,$list_share[1],$list_share[3],$list_share[5],$list_share[7]";
	$r_sport_share_live 			= "share,$list_share[2],$list_share[4],$list_share[6]";
	$r_lotto_share 						= "share,$list_share[8]";
	$r_lotto_hun_share 				= "share,$list_share[9]";
	$r_lotto_hun_set_share 		= "share,$list_share[10]";
	$r_games_share 						= "share,$list_share[11]";
	$r_casino_share 					= "share,$list_share[12],$list_share[13],$list_share[14],$list_share[15]";

	$r_sport_myshare 					= "myshare,$list_myshare[1],$list_myshare[3],$list_myshare[5],$list_myshare[7]";
	$r_sport_myshare_live 		= "myshare,$list_myshare[2],$list_myshare[4],$list_myshare[6]";
	$r_lotto_myshare 					= "myshare,$list_myshare[8]";
	$r_lotto_hun_myshare 			= "myshare,$list_myshare[9]";
	$r_lotto_hun_set_myshare 	= "myshare,$list_myshare[10]";
	$r_games_myshare 					= "myshare,$list_myshare[11]";
	$r_casino_myshare 				= "myshare,$list_myshare[12],$list_myshare[13],$list_myshare[14],$list_myshare[15]";

	$r_sport_force 				    = "force,$list_force[1],$list_force[3],$list_force[5],$list_force[7]";
	$r_sport_force_live 	    = "force,$list_force[2],$list_force[4],$list_force[6]";
	$r_lotto_force 				    = "force,$list_force[8]";
	$r_lotto_hun_force 		    = "force,$list_force[9]";
	$r_lotto_hun_set_force    = "force,$list_force[10]";
	$r_games_force 				    = "force,$list_force[11]";
	$r_casino_force 			    = "force,$list_force[12],$list_force[13],$list_force[14],$list_force[15]";

		$sql = "update IGNORE `bom_tb_agent` SET `r_sport_share`= '$r_sport_share',`r_sport_myshare`= '$r_sport_myshare',`r_sport_force`= '$r_sport_force',`r_sport_share_live`= '$r_sport_share_live',`r_sport_myshare_live`= '$r_sport_myshare_live',`r_sport_force_live`= '$r_sport_force_live',`r_lotto_share`= '$r_lotto_share',`r_lotto_myshare`= '$r_lotto_myshare',`r_lotto_force`= '$r_lotto_force',`r_lotto_hun_share`= '$r_lotto_hun_share',`r_lotto_hun_myshare`= '$r_lotto_hun_myshare' ,`r_lotto_hun_force`= '$r_lotto_hun_force',`r_lotto_hun_set_share`= '$r_lotto_hun_set_share' ,`r_lotto_hun_set_myshare`= '$r_lotto_hun_set_myshare' ,`r_lotto_hun_set_force`= '$r_lotto_hun_set_force',`r_games_share`= '$r_games_share' ,`r_games_myshare`= '$r_games_myshare',`r_games_force`= '$r_games_force',`r_casino_share`= '$r_casino_share',`r_casino_myshare`= '$r_casino_myshare' ,`r_casino_force`= '$r_casino_force' WHERE r_id = $id";

	$query = sql_query($sql);
	if($query)
	{
		$data  = array(
			'msg'     =>  $lang_ag[5],
			'status'  =>  true,
		);
	}else{
		$data  = array(
			'msg' => $lang_ag[4],
			'status' => false,
		);
	}

}else{
	$data = $data = array(
			'msg' => $lang_ag[7],
			'status' => false,
	);
}

echo json_encode($data);
?>
