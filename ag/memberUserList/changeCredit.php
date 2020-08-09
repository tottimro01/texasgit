<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>

<?php 

if($_SESSION["AGlang"]==""){
  $_SESSION["AGlang"]="th";
}
require('../inc/conn.php');
require('../inc/function.php');
require('../inc/ag_function.php');
require('../lang/ag_lang.php');


$d_user=$_SESSION['r_user'];

if($_SESSION['uu_use'] == 1)
{
  $bap_by_type = 5;
  $bap_by_id = $_SESSION['u_id'];
}else{
  $bap_by_type = 2;
  $bap_by_id = $_SESSION['rid'];
}


if($_POST['futype'] == "A")
{
  $edType = $_POST["edType"];
  // Agent ลบ
  if($edType == "r")
  {
    $new_credit = $_POST["credit"];
    $cradit_val = floatval(removeComma($_POST["cradit_val"]));
    $id = $_POST["id"];

    // $lv = intval($_SESSION["r_level"])+2;
    // ยอดเครดิตทีเปิดให้ member 

    // $sql = "select r_count as xtotal , r_type from bom_tb_agent where r_id=".$_POST["id"];
    // $re4 = sql_array($sql);
  
    // $rtype = "m_count_de";
    // $sql = "select sum($rtype) as xtotal from bom_tb_member where  m_agent_id like '%*".$_SESSION["r_id"]."*".$_POST["id"]."*%' and m_level=$lv";
    // $re5 = sql_array($sql);
  
    // // ยอดรวมเครดิตที่โอนให้ member
    // $x_count_member = ($re5["xtotal"] + $sum_kank2);

    // // ยอดเครดิตทีเปิดให้ agent 
    
    // $sql="select sum(r_count) as xtotal from bom_tb_agent where   r_agent_id like '%*".$_POST["id"]."*%' and r_level=$lv  ";
    // $re3=sql_array($sql);

    // $sql = "select * from bom_tb_agent where  r_agent_id like '%*".$_SESSION["r_id"]."*%'  and   r_id='".$_POST["id"]."' ";
    // $rex = sql_array($sql);
  
    // $x_count=$rex["r_count"]-($x_count_member+$re3["xtotal"]);

    // $xx["r_count"] = $rex["r_count"];
    // $xx["x_count_member"] = $x_count_member;
    // $xx["xtotal"] = $re3["xtotal"];


    
     $load_session = $_SESSION;
     $r_id = $_POST["id"];
     include "../get_balance.php";

    if($cradit_val > floatval($x_count3))  // ถ้ายอดเงินที่ต้องการลบ มากกว่ายอดเงินที่สามารถลบได้ (ยอดเงินที่มี - ยอดเงินที่เปิดให้สมาชิกและเอเย่นต์)
    {
      $data = array(
        'msg' => $lang_ag[15],
        // 'xx' => $x_count_member,
        'status' => "error"
      );
      echo json_encode($data);
      exit();
    }
    else
    {
      $sql = "select * from bom_tb_agent where r_id='{$id}'";
      $rem = sql_array($sql);
      $from = $rem[r_count];  
      // $have=$rem[m_count_de];

      $edType = $_POST[edType];
      $a['from'] = $from;
      // $a['have'] = $have;
      $a['edType'] = $_POST[edType];
      $a['r_count'] = $rem[r_count];
  
      if($edType == "i") // เพิ่ม
      {
        $p_comment = "ฝาก";
        $ptype = 1;
        $pay=$_POST[credit]-$from;
      }
      else if($edType == "r") // ลบ
      {
        if($cradit_val > floatval($rem[r_count]))
        {
          $data = array(
            'msg' => $lang_ag[15],
            'status' => "error"
          );
          echo json_encode($data);
          exit();
        }
        $p_comment = "ถอน";
        $ptype = 2; 
        $pay=$_POST[credit]-$from;
      }
  
      $bet = 0;
      $bank = $_POST[tbank];
  
      if($_SESSION["uu_use"] == 0)
      {
        $u_id = 'NULL';
        $by = $_SESSION["r_user"];
      
      }
      else
      {
        $u_id = $_SESSION["uu_id"];
        $sql = "select * from bom_tb_agent where r_id='".$_SESSION["r_id"]."'";
        $rex = sql_array($sql);
        $by = $rex["r_user"];
      }
      $sql="INSERT IGNORE INTO bom_tb_payment (p_date, p_from, p_bet, p_pay, p_type, r_id, r_level, r_agent_id, p_by, p_comment, p_datename, u_id) values(now(),'$from', '$bet', '$pay','$ptype','$rem[r_id]','$rem[r_level]','$rem[r_agent_id]','$by' ,'$p_comment'  ,'".date("D")."',$u_id) ";
      sql_query($sql);
     
    }
  }

  // Agent เพิ่ม
  else
  {
    $new_credit = $_POST['credit'];
    $cradit_val = floatval(removeComma($_POST["cradit_val"]));

    $id = $_POST['id'];

    // $lv = intval($_SESSION['r_level'])+1;
    // $d_incre = strtotime("-7 day");
    // $sql="select sum(b_total) as btotal , sum( 
    // (ROUND(  b_sum ,10))    
    //    ) as t1 from bom_tb_football_bill_live where  r_id = '".$_SESSION["r_id"]."' and b_accept!=2 and b_status=5 and r_cut_bet_4=0";
    
    // $reb1=sql_array($sql);
    // $sql="select sum(b_total) as btotal , sum( 
    // (ROUND(  b_pay ,10))  
    //    ) as t1 from bom_tb_lotto_bill_live where  r_id = '".$_SESSION["r_id"]."' and b_accept!=0 and b_status=5";
    // $reb2=sql_array($sql);
    
    // $sql="select sum(b_total) as btotal , sum( 
    // (ROUND(  b_pay ,10))  
    //    ) as t1 from bom_tb_games_bill_play_live where  r_id = '".$_SESSION["r_id"]."' and b_accept!=2 and and play_status=7  and play_timestam >= $d_incre";
    // $reb4=sql_array($sql);
    
    // $sum_kank2=$reb1["t1"]+$reb2["t1"]+$reb3["t1"]+$reb4["t1"];

             
    // $sql="select r_count as xtotal , r_type  from bom_tb_agent where  r_id=".$_SESSION[r_id];
    // $re4=sql_array($sql);

    // $rtype="m_count_de";
    // $sql="select sum($rtype) as xtotal from bom_tb_member where  m_agent_id like '%*{$_SESSION[r_id]}*%' and m_level=$lv";
    // $re5=sql_array($sql);

    // // ยอดรวมเครดิตที่โอนให้ member
    // $x_count_member = ($re5["xtotal"]);

    // // ยอดเครดิตทีเปิดให้ agent 
    // $lv = intval($_SESSION["r_level"])+1;
    // $sql = "select sum(r_count) as xtotal from bom_tb_agent where r_agent_id like '%*".$_SESSION[r_id]."*%' and r_level=$lv ";
    // $re5 = sql_array($sql);

    // // ยอดรวมเครดิตที่โอนให้ agent
    // $x_count2 = $re4["xtotal"] - $re5["xtotal"];
    // $sql = "select * from bom_tb_agent where  r_agent_id like '%*".$_SESSION[r_id]."*%'  and   r_id='".$_SESSION[r_id]."' ";
    // $rex = sql_array($sql);

    // $x_count_agent = $re5["xtotal"];
    // $x_count3 =  ($re4["xtotal"]-$sum_kank2) - ($x_count_agent + $x_count_member);

    // if($x_count3 <=0 )
    // {
    //     $x_count3=0;
    // }

     $load_session = $_SESSION;
     include "../get_balance.php";

  

    if($cradit_val > floatval($x_count3)) // ถ้ายอดเงินที่ต้องการเพิ่ม มากกว่ายอดเงินที่เหลือ
    {
      $data = array(
        'msg' => $lang_ag[15],
        'status' => "error"
      );
      echo json_encode($data);
      exit();
    }
    else
    {
      $sql = "select * from bom_tb_agent where r_id='{$id}'";
      $rem = sql_array($sql);
      $from = $rem[r_count];  

      $edType = $_POST[edType];
      $a['from'] = $from;
      $a['edType'] = $_POST[edType];
      $a['r_count'] = $rem[r_count];
  
      if($edType == "i") // เพิ่ม
      {
        $p_comment = "ฝาก";
        $ptype = 1;
        $pay=$_POST[credit]-$from;
      }
      else if($edType == "r") // ลบ
      {
        if($cradit_val > floatval($rem[r_count]))
        {
          $data = array(
            'msg' => $lang_ag[15],
            'status' => "error"
          );
          echo json_encode($data);
          exit();
        }
        $p_comment = "ถอน";
        $ptype = 2; 
        $pay=$_POST[credit]-$from;
      }
  
      $bet = 0;
      $bank = $_POST[tbank];
  
      if($_SESSION["uu_use"] == 0)
      {
        $u_id = 'NULL';
        $by = $_SESSION["r_user"];
      }
      else
      {
        $u_id = $_SESSION["uu_id"];
        $sql = "select * from bom_tb_agent where r_id='".$_SESSION["r_id"]."'";
        $rex = sql_array($sql);
        $by = $rex["r_user"];
      }
      $sql="INSERT IGNORE INTO bom_tb_payment (p_date, p_from, p_bet, p_pay, p_type, r_id, r_level, r_agent_id, p_by, p_comment, p_datename, u_id) values(now(),'$from', '$bet', '$pay','$ptype','$rem[r_id]','$rem[r_level]','$rem[r_agent_id]','$by' ,'$p_comment'  ,'".date("D")."',$u_id) ";
      sql_query($sql);
    }
  }

  $sql = "update IGNORE `bom_tb_agent` SET `r_count` = '{$new_credit}' where r_agent_id like '%*$_SESSION[rid]*%'  and  r_id = {$id}";
  $re=sql_query($sql);

  if($re)
  {
    $data = array(
    'msg' => $lang_ag[5],
    'status' => "success"
    );
  }
  else
  {
    $data = array(
      'msg' => $lang_ag[4],
      'status' => "error"
    );
  }

}
else if($_POST['futype'] == "M")
{

  $edType = $_POST[edType];
  $new_credit = $_POST[credit];
  $cradit_val = floatval(removeComma($_POST["cradit_val"]));
  $id = $_POST[id];
  $lv = intval($_SESSION[r_level])+1;


  if($edType == "i") // เพิ่ม   
  {


   //  $d_incre = strtotime("-7 day");
   //  $sql="select sum(b_total) as btotal , sum( 
   //  (ROUND(  b_sum ,10))    
   //     ) as t1 from bom_tb_football_bill_live where  r_id = '".$_SESSION["r_id"]."' and b_accept!=2 and b_status=5 and r_cut_bet_4=0";
    
   //  $reb1=sql_array($sql);
   //  $sql="select sum(b_total) as btotal , sum( 
   //  (ROUND(  b_pay ,10))  
   //     ) as t1 from bom_tb_lotto_bill_live where  r_id = '".$_SESSION["r_id"]."' and b_accept!=0 and b_status=5";
   //  $reb2=sql_array($sql);
    
   //  $sql="select sum(b_total) as btotal , sum( 
   //  (ROUND(  b_pay ,10))  
   //     ) as t1 from bom_tb_games_bill_play_live where  r_id = '".$_SESSION["r_id"]."' and b_accept!=2 and and play_status=7  and play_timestam >= $d_incre";
   //  $reb4=sql_array($sql);
    
   //   $sum_kank2=$reb1["t1"]+$reb2["t1"]+$reb3["t1"]+$reb4["t1"];
            
   // $sql="select r_count as xtotal , r_type  from bom_tb_agent where  r_id=".$_SESSION[r_id];
   // $re4=sql_array($sql);

   // $rtype="m_count_de";
   // $sql="select sum($rtype) as xtotal from bom_tb_member where  m_agent_id like '%*{$_SESSION[r_id]}*%'  and m_level=$lv";
   // $re5=sql_array($sql);

   // // ยอดรวมเครดิตที่โอนให้ member
   // $x_count_member = ($re5["xtotal"]);

   // // ยอดเครดิตทีเปิดให้ agent 
   // $lv = intval($_SESSION["r_level"])+1;
   // $sql = "select sum(r_count) as xtotal from bom_tb_agent where r_agent_id like '%*".$_SESSION[r_id]."*%' and r_level=$lv ";
   // $re5 = sql_array($sql);

   // // ยอดรวมเครดิตที่โอนให้ agent
   // $x_count2 = $re4["xtotal"] - $re5["xtotal"];
   // $sql = "select * from bom_tb_agent where  r_agent_id like '%*".$_SESSION[r_id]."*%'  and   r_id='".$_SESSION[r_id]."' ";
   // $rex = sql_array($sql);

   // $x_count_agent = $re5["xtotal"];
   // $x_count3 = ($re4["xtotal"]-$sum_kank2) - ($x_count_agent + $x_count_member);

   // if($x_count3 <=0 )
   // {
   //     $x_count3=0;
   // }

     $load_session = $_SESSION;
     include "../get_balance.php";


  }else if($edType == "r") // ลบ
  {
    $sql = "select * from bom_tb_member where m_agent_id like '%*".$_SESSION[r_id]."*%' and m_id='$id' ";
    $rex = sql_array($sql);
    $rex["m_name"] = ($rex["m_name"] != "") ? $rex["m_name"] : $lang_ag[273];
    $x_count3 = floatval($rex["m_count"]);

  }



  if($cradit_val > $x_count3)
  {
    $data = array(
      'msg' => $lang_ag[15],
      'status' => "error"
    );
  }
  else
  {
    $sql="select * from bom_tb_member   where  m_agent_id like '%*{$_SESSION[r_id]}*%'  and   m_id='{$id}' ";
    $rem=sql_array($sql);
    $from=$rem[m_count];  
    $have=$rem[m_count_de]; 

    

    $a['from'] = $from;
    $a['have'] = $have;
    $a['edType'] = $_POST[edType];
    $a['m_count'] = $rem[m_count];

    if($edType == "i") // เพิ่ม
    {
      $p_comment= "ฝาก";
      $ptype=1;
      $pay=$_POST[credit]-$from;

    }
    else if($edType == "r") // ลบ
    {
      if($cradit_val > floatval($rem[m_count]))
      {
        $data = array(
          'msg' => $lang_ag[15],
          'status' => "error"
        );
        echo json_encode($data);
        exit();
      }

      $p_comment="ถอน";
      $ptype=2; 
      $pay=$_POST[credit]-$from;
    }

    $bet=0;
    $bank=$_POST[tbank];

    if($_SESSION["uu_use"]==0)
    {
      $u_id = 'NULL';
      $by=$_SESSION["r_user"];
    }
    else
    {
      $u_id = $_SESSION["uu_id"];
      $sql="select * from bom_tb_agent where r_id='".$_SESSION["r_id"]."'";
      $rex=sql_array($sql);
      $by=$rex["r_user"];
    }

  
    $sql="INSERT IGNORE INTO bom_tb_payment (p_date, p_from,  p_bet ,p_pay  ,p_type,  m_id, r_level,  r_agent_id, p_by, p_comment , p_datename,u_id) values(now(),'$from', '$bet', '$pay','$ptype','$rem[m_id]','$rem[m_level]','$rem[m_agent_id]','$by' ,'$p_comment'  ,'".date("D")."',$u_id) ";
    sql_query($sql);
    $a['sql_payment'] = $sql;

    if($edType == "i")
    {

      $log_sum = $pay+$from;
      $in = $pay;

      ######################LOG ใหม่
      $sql="INSERT IGNORE INTO bom_tb_all_payment (
      bap_date, bap_ip, bap_type  ,m_id ,r_id,  m_agent_id, r_agent_id, 
      bap_before, bap_in ,bap_after,bap_comment,
      bap_code,bap_by_type,bap_by_id) values(
      now(),'"._bIP()."', '5', '$rem[m_id]','$rem[r_id]','$rem[m_agent_id]','$_SESSION[r_agent_id]',
      '$from' ,'$in','$log_sum','เอเยนต์เพิ่มเครดิตสมาชิก',
      'EIN',$bap_by_type,'$bap_by_id') ";
      sql_query($sql);  
      ######################LOG ใหม่ 

        $sql = "SELECT * FROM `bom_tb_member` where m_id='".$id."'";
        $rem = sql_array($sql);



        $_m_count_de = $cradit_val + $rem["m_count_de"];
        // $up_c = "";
        // $up_c = ", m_count_de = '".$_m_count_de."'";

    }
    else if($edType == "r")
    {

      $log_sum = $from-($pay*-1);
      $out = $pay;

      ######################LOG ใหม่
      $sql="INSERT IGNORE INTO bom_tb_all_payment (
      bap_date, bap_ip, bap_type  ,m_id ,r_id,  m_agent_id, r_agent_id, 
      bap_before, bap_out ,bap_after,bap_comment,
      bap_code,bap_by_type,bap_by_id) values(
      now(),'"._bIP()."', '6', '$rem[m_id]','$rem[r_id]','$rem[m_agent_id]','$_SESSION[r_agent_id]',
      '$from' ,'$out','$log_sum','เอเยนต์ลดเครดิตสมาชิก',
      'EOT',$bap_by_type,'$bap_by_id') ";
      sql_query($sql);  
      ######################LOG ใหม่ 

    }

    $sql = "update IGNORE `bom_tb_member` SET `m_count` = '{$new_credit}' $up_c where  m_agent_id like '%*{$_SESSION[r_id]}*%'  and   m_id='{$id}' ";
    $re=sql_query($sql);

    if($re)
    {
      $data = array(
      'msg' => $lang_ag[5],
      'status' => "success"
      );
    }
    else
    {
      $data = array(
        'msg' => $lang_ag[4],
        'status' => "error"
      );
    }
  }
}

echo json_encode($data);
?>