<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
if($_GET["lang"]==""){
    if($_SESSION["AGlang"] == "")
    {
        $_SESSION["AGlang"]="th";
    }

}else{
    $_SESSION["AGlang"]=$_GET["lang"];
}   

require('lang/ag_lang.php');
require('inc/conn.php');
require('inc/function.php');

  // ดึง agent 

  $sql= "select r_id , r_agent_id , r_user ,r_level from bom_tb_agent where r_user = '".$_GET["username"]."'";
  $re_agent=sql_array($sql);
  $r_agent_id = $re_agent["r_agent_id"].$re_agent["r_id"]."*";
  $lv = intval($re_agent["r_level"])+1; 
    
  $sql= "select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_level=".$lv."";
  $re=sql_query($sql);

  $data = array();
  while($rs=sql_fetch($re)){

    $r_sport_share            = explode(",", $rs["r_sport_share"]);
    $r_sport_share_live       = explode(",", $rs["r_sport_share_live"]);
    $r_lotto_share            = explode(",", $rs["r_lotto_share"]);
    $r_lotto_hun_share        = explode(",", $rs["r_lotto_hun_share"]);
    $r_lotto_hun_set_share    = explode(",", $rs["r_lotto_hun_set_share"]);
    $r_games_share            = explode(",", $rs["r_games_share"]);
    $r_casino_share           = explode(",", $rs["r_casino_share"]);

    $data[$rs["r_user"]."_A"]["r_sport_share"] = $r_sport_share;
    $data[$rs["r_user"]."_A"]["r_sport_share_live"] = $r_sport_share_live;



    $share_text = "";
    $share_text.= "<div class='tree_overflow_w' data-simplebar onselectstart=\"return false;\">
                    <font color='black' class='fshow'> (".$lang_ag[2167]." = ".number_format($r_sport_share[1],0).") </font>
                    <font color='black' class='fshow'> (".$lang_ag[2168]." = ".number_format($r_sport_share_live[1],0).") </font>
                    <font color='black' class='fshow'> (".$lang_ag[877]." = ".number_format($r_sport_share[2],0).") </font>
                    <font color='black' class='fshow'> (".$lang_ag[880]." = ".number_format($r_sport_share_live[2],0).") </font>
                    <font color='black' class='fshow'> (".$lang_ag[1091]." = ".number_format($r_sport_share[3],0).") </font>
                    <font color='black' class='fshow'> (".$lang_ag[1092]." = ".number_format($r_sport_share_live[3],0).") </font>
                    <font color='black' class='fshow'> (".$lang_ag[2169]." = ".number_format($r_sport_share[4],0).") </font>
                    <font color='black' class='fshow'> (".$lang_ag[2170]." = ".number_format($r_lotto_share[1],0).") </font>
                    <font color='black' class='fshow'> (".$lang_ag[2171]." = ".number_format($r_lotto_hun_share[1],0).") </font>
                    <font color='black' class='fshow'> (".$lang_ag[2172]." = ".number_format($r_lotto_hun_set_share[1],0).") </font>
                    <font color='black' class='fshow'> (".$lang_ag[2173]." = ".number_format($r_games_share[1],0).") </font>
                    <font color='black' class='fshow'> (".$lang_ag[2174]." = ".number_format($r_casino_share[1],0).") </font>
                    <font color='black' class='fshow'> (".$lang_ag[2175]." = ".number_format($r_casino_share[2],0).") </font>
                    <font color='black' class='fshow'> (".$lang_ag[2176]." = ".number_format($r_casino_share[3],0).") </font>
                    <font color='black' class='fshow'> (".$lang_ag[2177]." = ".number_format($r_casino_share[4],0).") </font>
                   </div> 
                  ";



    $data[$rs["r_user"]."_A"]["text"] =  "<span class='fa-stack fa-lg'> $log
                    <i class='ace-icon glyphicon glyphicon-user fa-stack-1x text-danger' style='font-size:15px;'></i>
                    <i class='ace-icon glyphicon glyphicon-user fa-fw' style='color:black;font-size:15px;'></i>
                  </span> 
                  <font size='2' color='black'><strong>".$rs["r_user"]."</strong></font>  
                  <strong>( <font color='black'>".number_format($rs["r_count"])."</font> )</strong>
                  $share_text";

                  // <font color='black' class='fshow'> (step= 60.00) </font>
                  // <font color='black' class='fshow'> (today= 50.00) </font>
                  // <font color='black' class='fshow'> (live= 50.00) </font>
                  // <font color='black' class='fshow'> (sporttoday= 50.00) </font>
                  // <font color='black' class='fshow'> (sportlive= 50.00) </font>";

    $data[$rs["r_user"]."_A"]["type"] =  "folder";
    $data[$rs["r_user"]."_A"]["user"] =  $rs["r_user"];

  }

  // ดึง member
  $sql= "select * from bom_tb_member where  m_agent_id like '%$r_agent_id%' and m_level=".$lv."";
  $re=sql_query($sql);

  while($rs=sql_fetch($re)){

      $data[$rs["m_user"]."_M"]["text"] =  "&nbsp;&nbsp;&nbsp;&nbsp;<i class='ace-icon glyphicon glyphicon-user' ></i>  
                <font color='black'> ".$rs["m_user"]."</font> 
                <strong>( <font color='black'>".number_format($rs["m_count"])."</font> )</strong>";
      $data[$rs["m_user"]."_M"]["type"] =  "item";

  }

  $data["data"] = $data;
  echo json_encode($data);

 ?>

