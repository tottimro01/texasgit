<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

  if($_SESSION["AGlang"]==""){
      $_SESSION["AGlang"]="th";
  }

  require('lang/ag_lang.php');
  include "inc/conn.php";
  include "inc/function.php";

  $thead = [$lang_ag[789],$lang_ag[726],$lang_ag[794],$lang_ag[796]];
  $status = true;
  $res = array();

  $sdate = $_POST['sdate'];
  $szone = $_POST['sport'];
  $sleague = $_POST['league'];
  if($sleague != ""){
  	$sql="select * from bom_tb_ball_list where b_add=1 and b_date='".$sdate."' and  b_zone='$szone'  and b_score_half!='' and b_zone_en = '".$sleague."' group by  b_zone_en order by  b_asc asc";
  }else{
  	$sql="select * from bom_tb_ball_list where b_add=1 and b_date='".$sdate."' and  b_zone='$szone'  and b_score_half!='' group by  b_zone_en order by  b_asc asc";
  }
  $re=sql_query_sp($sql);
  while($rs=sql_fetch($re)){
  	$res[$rs["b_zone_en"]] = array();
    $sql="select * from bom_tb_ball_list where b_add=1 and b_date='".$sdate."' and  b_zone='$szone'   and   md5(b_zone_en)='".md5($rs['b_zone_en'])."' and b_score_half!=''  order by  b_date_play asc";
    $re2=sql_query_sp($sql);
    while($rs2=sql_fetch($re2)){
      $res[$rs["b_zone_en"]][] = array(
      	"kickoff_time" 	=> date("d/m/Y H:i",$rs2["b_date_play"]),
	  	"re_league"	 	=> ($rs["b_zone_th"]!="") ? $rs["b_zone_th"] : $rs["b_zone_en"],
	  	"team_home"	 	=> ($rs2["b_name_1_th"]!="") ? $rs2["b_name_1_th"] : $rs2["b_name_1_en"],
	  	"team_away"	 	=> ($rs2["b_name_2_th"]!="") ? $rs2["b_name_2_th"] : $rs2["b_name_2_en"],
	  	"fh_score"	 	=> $rs2["b_score_half"],
	  	"fn_score"	 	=> $rs2["b_score_full"],
	  	"re_status"	 	=> ($rs2['b_score_full']=="can" or $rs2['b_process']==2) ? "Cancel" : "Completed",
	  	"re_date"		=> date("Y-m-d",$rs2["b_date_play"]),
	  	"re_sport"	 	=> $sport_type[$szone],
      );         
    }
  }

  $data = array(
    'status' => $status,
    'result' => $res,
    'thead' => $thead,
  );

  echo json_encode($data);
?>