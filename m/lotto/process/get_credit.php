<?php 

  session_start();
  header("Content-type: text/html");
  $cmd = $_GET['cmd'];

    require_once '../inc/lang.php';
    require_once '../inc/rsc.php';
    require_once '../inc/function.php';
    require_once '../inc/conn.php';

    require_once '../inc/function_array.php';
    require_once '../inc/variable_lang.php';


    $mid = $_SESSION['m_id'];

    $sql="select m_count , m_bet_date from bom_tb_member where m_id='".$_SESSION['m_id']."'";
    $re_m=sql_array($sql);

    if($re_m['m_count']<=0){$re_m['m_count']=0;}
    $_SESSION['m_count'] = $re_m['m_count'];
    
    $sql="select sum(b_sum) as btotal from bom_tb_football_bill_live where m_id='".$_SESSION['m_id']."'  and b_status=5 and b_accept=1  ";
    $reb1=sql_array($sql);
    $sql="select sum(b_total) as btotal from bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."'  and play_status=7 and b_accept=1  ";
    $reb2=sql_array($sql);
    $sql="select sum(b_total) as btotal from bom_tb_games_bill_play_live where m_id='".$_SESSION['m_id']."'  and play_status=7";
    $reb3=sql_array($sql);
    $sql="select sum(b_total) as btotal from bom_tb_casino_bill_play_live where m_id='".$_SESSION['m_id']."'  and play_status=7";
    #$reb4=sql_array($sql);
    $mnot=$reb1['btotal']+$reb2['btotal']+$reb3['btotal']+$reb4['btotal'];
    $_SESSION['mnot']=$mnot;
    
    
  
    $txt = array();
    $txt["betcre"] = number_format($re_m['m_count'],2);
    $txt["cre"] = number_format($_SESSION['m_count_de'],2);
    $txt["wincre"] = number_format(($re_m['m_count']-$_SESSION['m_count_de'])+$mnot,2);
    // $txt["incre"] = _cbp(-($_SESSION['mnot']),2);
    $txt["betdate"] = $re_m['m_bet_date'];
    $txt["lastlogindate"] = $_SESSION['m_login'];
    $txt["currency"] = $_SESSION['m_currency'];

    echo json_encode($txt); 
  


 ?>