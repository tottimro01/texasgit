<?php 

ob_start(); if (!isset($_SESSION)) { session_start(); }
  
if($_SESSION["AGlang"]==""){
  $_SESSION["AGlang"]="th";
}

require('../lang/ag_lang.php');
require('../inc/conn.php');
require('../inc/function.php');

$r_agent_id = $_SESSION["r_agent_id"];
$sql="select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_id = ".$_SESSION["rid"]." and r_level=".intval($_SESSION["r_level"])."";
$rs_agent = sql_array($sql);  

$ex_r_sport_share=@explode(",",$rs_agent['r_sport_share']);
$ex_r_sport_share_live=@explode(",",$rs_agent['r_sport_share_live']);
$ex_r_lotto_share=@explode(",",$rs_agent['r_lotto_share']);
$ex_r_lotto_hun_share=@explode(",",$rs_agent['r_lotto_hun_share']);
$ex_r_lotto_hun_set_share=@explode(",",$rs_agent['r_lotto_hun_set_share']);
$ex_r_games_share=@explode(",",$rs_agent['r_games_share']);
$ex_r_casino_share=@explode(",",$rs_agent['r_casino_share']);

$agent_list = [];

 #ดึงค่าสูงสุด
$_max_share = [];
$_max_share[0] = "";
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

#################################

$id				 	= sql_escape_str($_POST['id']);
$username 	= sql_escape_str($_POST['username']);
$ctype 			= sql_escape_str($_POST['ctype']);
$cvalue 		= sql_escape_str($_POST['cvalue']);

$ex_ctype=@explode("_",$ctype );
$r_agent_id = $_SESSION["r_agent_id"].$_SESSION["r_id"]."*";
$lv = intval($_SESSION["r_level"])+1;

$sql= "select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_level=$lv";
$re=sql_query($sql);

while($rs=mysqli_fetch_array($re)){

	// $agent_list[$rs["r_id"]]["r_id"] =  $rs["r_id"];
 //  $agent_list[$rs["r_id"]]["r_user"] =  $rs["r_user"];
	// $agent_list[$rs["r_id"]]["r_agent_id"] =  $rs["r_agent_id"].$rs["r_id"]."*";
	// $agent_list[$rs["r_id"]]["r_level"] =  $rs["r_level"];


	$ulevel = intval($rs["r_level"])+1;
	$ag_r_agent_id = $rs["r_agent_id"].$rs["r_id"]."*";

	$sql="select * from bom_tb_agent where r_agent_id like '%".$ag_r_agent_id."%' and r_level='$ulevel'";
  $reA=sql_query($sql);

    // ฟุตบอบ กีฬา
    $check_r_sport_share_max = array(); 
    $check_r_sport_share_live_max = array(); 
    $check_r_lotto_share = array(); 
    $check_r_lotto_hun_share = array(); 
    $check_r_lotto_hun_set_share = array(); 
    $check_r_games_share = array(); 
    $check_r_casino_share = array(); 

      // ดึงข้อมูล agent ภายใต้
     while($rss=sql_fetch($reA)){      
     	// $agent_list[$rs["r_id"]]["r_up_id"][] = $rss["r_id"];

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

        $today_share_max = (max($check_r_sport_share_max[1]) == "") ? 0 : max($check_r_sport_share_max[1]);
   			$sporttoday_share_max = (max($check_r_sport_share_max[2])=="") ? 0 : max($check_r_sport_share_max[2]);
   			$boxingtoday_share_max = (max($check_r_sport_share_max[3])=="") ? 0 : max($check_r_sport_share_max[3]);
   			$step_share_max = (max($check_r_sport_share_max[4]) == "") ? 0 : max($check_r_sport_share_max[4]);

   			$live_share_max = (max($check_r_sport_share_live_max[1]) == "") ? 0 : max($check_r_sport_share_live_max[1]);
    		$sportlive_share_max = (max($check_r_sport_share_live_max[2]) == "") ? 0 : max($check_r_sport_share_live_max[2]);
    		$boxinglive_share_max = (max($check_r_sport_share_live_max[3]) == "") ? 0 : max($check_r_sport_share_live_max[3]);

    		$lotto_share_max = (max($check_r_lotto_share[1]) == "") ? 0 : max($check_r_lotto_share[1]);
    		$lotto_hun_share_max = (max($check_r_lotto_hun_share[1]) == "") ? 0 : max($check_r_lotto_hun_share[1]);
    		$lotto_hun_set_share_max = (max($check_r_lotto_hun_set_share[1]) == "") ? 0 : max($check_r_lotto_hun_set_share[1]);

    		$game_share_max = (max($check_r_games_share[1]) == "") ? 0 : max($check_r_games_share[1]);

        $_min_share[0] = "";  
        $_min_share[1]  = intval($today_share_max);
        $_min_share[2]  = intval($live_share_max);
        $_min_share[3]  = intval($sporttoday_share_max);
        $_min_share[4]  = intval($sportlive_share_max);
        $_min_share[5]  = intval($boxingtoday_share_max);
        $_min_share[6]  = intval($boxinglive_share_max);
        $_min_share[7]  = intval($step_share_max);
        $_min_share[8]  = intval($lotto_share_max);
        $_min_share[9]  = intval($lotto_hun_share_max);
        $_min_share[10] = intval($lotto_hun_set_share_max);
        $_min_share[11] = intval($game_share_max);

          $c_index = 12;
    		foreach ($lang_g["casino_share"]  as $key => $value) {
   					$check_r_casino_share_max =  (max($check_r_casino_share[$key]) == "") ? 0 : max($check_r_casino_share[$key]); 
            $_min_share[$c_index] = intval($check_r_casino_share_max);
            $c_index++;
              
				}

        // $agent_list[$rs["r_id"]]["min"] = $_min_share;
        // $agent_list[$rs["r_id"]]["type"] = $ex_ctype;
        // $agent_list[$rs["r_id"]]["val"] = $cvalue;   

        $_set_share = [];  
        if($cvalue == "min") {
          $_set_share = $_min_share;
        }else{
          $_set_share = $_max_share;
        }

        // $agent_list[$rs["r_id"]]["set_share"] =   $_set_share;
        // ข้อมูลของ agent ที่จะแก้ไข

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
              $ex_a_r_sport_share[1] = $_set_share[1];
              $ex_a_r_sport_myshare[1] = $ex_r_sport_share[1] - $_set_share[1];
            break;
          case '2':
              $ex_a_r_sport_share_live[1] = $_set_share[2];
              $ex_a_r_sport_myshare_live[1] = $ex_r_sport_share_live[1] - $_set_share[2];
            break;  
          case '3':
              $ex_a_r_sport_share[2] = $_set_share[3];
              $ex_a_r_sport_myshare[2] = $ex_r_sport_share[2] - $_set_share[3];
            break;
          case '4':
              $ex_a_r_sport_share_live[2] = $_set_share[4];
              $ex_a_r_sport_myshare_live[2] = $ex_r_sport_share_live[2] - $_set_share[4];
            break;  
          case '5':
              $ex_a_r_sport_share[3] = $_set_share[5];
               $ex_a_r_sport_myshare[3] = $ex_r_sport_share[3] - $_set_share[5];
            break;
          case '6':
              $ex_a_r_sport_share_live[3] = $_set_share[6];
              $ex_a_r_sport_myshare_live[3] = $ex_r_sport_share_live[3] - $_set_share[6];
            break;  
          case '7':
              $ex_a_r_sport_share[4] = $_set_share[7];
              $ex_a_r_sport_myshare[4] = $ex_r_sport_share[4] - $_set_share[7];
            break;
          case '8':  // หวย
              foreach ($ex_a_r_lotto_share as $key => $value) {
                if($key > 0)
                {
                  $ex_a_r_lotto_share[$key] = $_set_share[8];
                  $ex_a_r_lotto_myshare[$key] = $ex_r_lotto_share[$key] - $_set_share[8];
                }
              }
            break;
          case '9': // หวยหุ้น
              foreach ($ex_a_r_lotto_hun_share as $key => $value) {
                if($key > 0)
                {
                  $ex_a_r_lotto_hun_share[$key] = $_set_share[9];
                  $ex_a_r_lotto_hun_myshare[$key] = $ex_r_lotto_hun_share[$key] - $_set_share[9];
                }
              }
            break;  
          case '10': // หวยหุ้น
              foreach ($ex_a_r_lotto_hun_set_share as $key => $value) {
                if($key > 0)
                {
                  $ex_a_r_lotto_hun_set_share[$key] = $_set_share[10];
                  $ex_a_r_lotto_hun_set_myshare[$key] = $ex_r_lotto_hun_set_share[$key] - $_set_share[10];
                }
              }
            break;            
          case '11':
              $ex_a_r_games_share[1] = $_set_share[11];
              $ex_a_r_games_myshare[1] = $ex_r_games_share[1] - $_set_share[11];
            break;
          case '12':
              $ex_a_r_casino_share[1] = $_set_share[12];
              $ex_a_r_casino_myshare[1] = $ex_r_casino_share[1] - $_set_share[12];
            break;
          case '13':
              $ex_a_r_casino_share[2] = $_set_share[13];
              $ex_a_r_casino_myshare[2] = $ex_r_casino_share[2] - $_set_share[13];
            break;
          case '14':
              $ex_a_r_casino_share[3] = $_set_share[14];
              $ex_a_r_casino_myshare[3] = $ex_r_casino_share[3] - $_set_share[14];
            break;
          case '15':
              $ex_a_r_casino_share[4] = $_set_share[15];
              $ex_a_r_casino_myshare[4] = $ex_r_casino_share[4] - $_set_share[15];
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

        // $sql = "update IGNORE `bom_tb_agent` SET `r_sport_share`= '$im_a_r_sport_share',`r_sport_myshare`= '$im_a_r_sport_myshare',`r_sport_share_live`= '$im_a_r_sport_share_live',`r_sport_myshare_live`= '$im_a_r_sport_myshare_live',`r_lotto_share`= '$im_a_r_lotto_share',`r_lotto_myshare`= '$im_a_r_lotto_myshare',`r_lotto_hun_share`= '$im_a_r_lotto_hun_share',`r_lotto_hun_myshare`= '$im_a_r_lotto_hun_myshare' ,`r_lotto_hun_set_share`= '$im_a_r_lotto_hun_set_share' ,`r_lotto_hun_set_myshare`= '$im_a_r_lotto_hun_set_myshare' ,`r_games_share`= '$im_a_r_games_share' ,`r_games_myshare`= '$im_a_r_games_myshare',`r_casino_share`= '$im_a_r_casino_share',`r_casino_myshare`= '$im_a_r_casino_myshare' r_id = '".$rs['r_id']."' ";

        // $update_sql = "update IGNORE `bom_tb_agent` SET `r_sport_share`= '$im_a_r_sport_share',`r_sport_share_live`= '$im_a_r_sport_share_live',`r_lotto_share`= '$im_a_r_lotto_share',`r_lotto_hun_share`= '$im_a_r_lotto_hun_share' ,`r_lotto_hun_set_share`= '$im_a_r_lotto_hun_set_share' ,`r_games_share`= '$im_a_r_games_share' ,`r_casino_share`= '$im_a_r_casino_share' WHERE r_id = '".$rs['r_id']."' "; 


        $update_sql = "update IGNORE `bom_tb_agent` SET `r_sport_share`= '$im_a_r_sport_share',`r_sport_myshare`= '$im_a_r_sport_myshare',`r_sport_share_live`= '$im_a_r_sport_share_live',`r_sport_myshare_live`= '$im_a_r_sport_myshare_live',`r_lotto_share`= '$im_a_r_lotto_share',`r_lotto_myshare`= '$im_a_r_lotto_myshare',`r_lotto_hun_share`= '$im_a_r_lotto_hun_share',`r_lotto_hun_myshare`= '$im_a_r_lotto_hun_myshare' ,`r_lotto_hun_set_share`= '$im_a_r_lotto_hun_set_share' ,`r_lotto_hun_set_myshare`= '$im_a_r_lotto_hun_set_myshare' ,`r_games_share`= '$im_a_r_games_share' ,`r_games_myshare`= '$im_a_r_games_myshare',`r_casino_share`= '$im_a_r_casino_share',`r_casino_myshare`= '$im_a_r_casino_myshare' WHERE r_id = '".$rs['r_id']."'";

 
        $query = sql_query($update_sql);
}


$data = array(
	'msg' => $lang_ag[5],
	'status' => true,
	'agent_list' => $agent_list,
  'im_a_r_sport_myshare_live' => $im_a_r_sport_myshare_live,

);

echo json_encode($data); 

?>

