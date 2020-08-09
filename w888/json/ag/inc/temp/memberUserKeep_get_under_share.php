<?php 
require('inc_head_bySession.php');

if($_SESSION["AGlang"]=="")
  {
    $_SESSION["AGlang"]="th";
  }


$r_agent_id = $_SESSION["r_agent_id"];
$sql="select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_id = ".$_SESSION["rid"]." and r_level=".intval($_SESSION["r_level"])."";
$rs_agent = sql_array($sql);  


$res['max_share'][0] = "";

$ex_r_sport_share=@explode(",",$rs_agent['r_sport_share']);
$ex_r_sport_share_live=@explode(",",$rs_agent['r_sport_share_live']);
$ex_r_lotto_share=@explode(",",$rs_agent['r_lotto_share']);
$ex_r_lotto_hun_share=@explode(",",$rs_agent['r_lotto_hun_share']);
$ex_r_lotto_hun_set_share=@explode(",",$rs_agent['r_lotto_hun_set_share']);
$ex_r_games_share=@explode(",",$rs_agent['r_games_share']);
$ex_r_casino_share=@explode(",",$rs_agent['r_casino_share']);


$_max_share[1]  =   ($ex_r_sport_share[1] == "") ? 100 :  intval($ex_r_sport_share[1]);
$_max_share[2]  =   ($ex_r_sport_share_live[1] == "") ? 100 :  intval($ex_r_sport_share_live[1]);
$_max_share[3]  =   ($ex_r_sport_share[2] == "") ? 100 :  intval($ex_r_sport_share[2]);
$_max_share[4]  =   ($ex_r_sport_share_live[2] == "") ? 100 :  intval($ex_r_sport_share_live[2]);
$_max_share[5]  =   ($ex_r_sport_share[3] == "") ? 100 :  intval($ex_r_sport_share[3]);
$_max_share[6]  =   ($ex_r_sport_share_live[3] == "") ? 100 :  intval($ex_r_sport_share_live[3]);
$_max_share[7]  =   ($ex_r_sport_share[4] == "") ? 100 :  intval($ex_r_sport_share[4]);
$_max_share[8]  =   ($ex_r_lotto_share[1] == "") ? 100 :  intval($ex_r_lotto_share[1]);
$_max_share[9]  =   ($ex_r_lotto_hun_share[1] == "") ? 100 :  intval($ex_r_lotto_hun_share[1]);
$_max_share[10] =   ($ex_r_lotto_hun_set_share[1] == "") ? 100 :  intval($ex_r_lotto_hun_set_share[1]);
$_max_share[11] =   ($ex_r_games_share[1] == "") ? 100 :  intval($ex_r_games_share[1]);

foreach ($ex_r_casino_share as $key => $value) {
  if($key > 0){  
    $_max_share[] =   ($value == "") ? 100 :  intval($value);
  }
}

$res['max_share'] =  $_max_share;


##########################################################################

$id = sql_escape_str($_POST['id']);
$sql="select r_agent_id , r_level from bom_tb_agent where r_id = $id";
$rs = sql_array($sql);

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

echo json_encode($res);


?>