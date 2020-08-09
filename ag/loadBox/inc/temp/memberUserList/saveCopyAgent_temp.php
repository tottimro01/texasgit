<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
  
if($_SESSION["AGlang"]=="")
{
  $_SESSION["AGlang"]="th";
}
require('../../conn.php');
require('../../function.php');
require('../../ag_function.php');
require('../../../lang/ag_lang.php');
require('../../../lang/function_array.php');

if($_POST["newuser"] != "" && $_POST["pass"] != "" && $_POST["name"] != "" && $_POST["olduser_id"] != "")
{
  //ถ้า เข้าสู่ระบบด้วย เอเย่นสำรอง
  if($_SESSION["uu_use"]!=0)
  {
    $r_agent_id = $_SESSION["r_agent_id"];
    $sql="select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_level=".intval($_SESSION["r_level"])."";
    $rs = sql_array($sql);
  
    $user = $rs["r_user"].$_POST["newuser"];
  }
  else
  {
    $user = $_SESSION["r_user"].$_POST["newuser"];
  }

  // ตรวจสอบ user มีในระบบแล้วหรือยัง
  $sql="select r_user from bom_tb_agent where (r_user='$user')";
  $num_user =sql_num($sql);

  if($num_user == 0)
  {
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $phone = $_POST["telephone"];  
    $_count = floatval(removeComma($_POST["credit"]));

    //ดึง credit 
    //$re4["xtotal"] คือ ยอดเครดิตทั้งหมด
    //$x_count_agent คือ ยอดเครดิตที่เปิดให้ agent
    //$x_count_member คือ ยอดเครดิตที่เปิดให้ member
    //$x_count3  คือ ยอดเครดิตคงเหลือ (ยอดเครดิตทั้งหมด หักลบ เครดิตที่เปิดให้ agent และ member)

    $d_incre = strtotime("-7 day");
    $sql = "select sum(b_total) as btotal from bom_tb_football_bill where  m_agent_id like '%*".$_SESSION["r_id"]."*%'  and r_cut_bet_4=0";
    $reb1 = sql_array($sql);
    $sql = "select sum(b_total) as btotal from bom_tb_lotto_bill_live where  m_agent_id like '%*".$_SESSION["r_id"]."*%' and b_status=5";
    $reb2 = sql_array($sql);
    $sql = "select sum(b_total) as btotal from bom_tb_lotto_hun_bill where  m_agent_id like '%*".$_SESSION["r_id"]."*%' and play_timestam >= $d_incre";
    $reb3 = sql_array($sql);
    $sql = "select sum(b_total) as btotal from bom_tb_games_bill_play where  m_agent_id like '%*".$_SESSION["r_id"]."*%' and play_timestam >= $d_incre";
    $reb4 = sql_array($sql);
    $sum_kank2 = $reb1["btotal"] + $reb2["btotal"] + $reb3["btotal"] + $reb4["btotal"];
    
    $sql = "select r_count as xtotal , r_type from bom_tb_agent where r_id=".$_SESSION["r_id"];
    $re4 = sql_array($sql);
    
    $rtype = "m_count";
    $sql = "select sum($rtype) as xtotal from bom_tb_member where  m_agent_id like '%*".$_SESSION["r_id"]."*%'";
    $re5 = sql_array($sql);
    
    // ยอดรวมเครดิตที่โอนให้ member
    $x_count_member = ($re5["xtotal"] + $sum_kank2);
    
    // ยอดเครดิตทีเปิดให้ agent 
    $lv = intval($_SESSION["r_level"])+1;
    $sql = "select sum(r_count) as xtotal from bom_tb_agent where r_agent_id like '%*".$_SESSION["r_id"]."*%' and r_level=$lv ";
    $re5 = sql_array($sql);
    // ยอดรวมเครดิตที่โอนให้ agent
    $x_count2 = $re4["xtotal"] - $re5["xtotal"];
    
    $sql = "select * from bom_tb_agent where  r_agent_id like '%*".$_SESSION["r_id"]."*%'  and   r_id='".$_POST["id"]."' ";
    $rex = sql_array($sql);
    
    $x_count_agent = $re5["xtotal"];
    // เครดิตทั้งหมดที่มี ลบกับ  เครดิตที่ให้ member และ agent
    $x_count3 = $re4["xtotal"] - ($x_count_agent + $x_count_member);
    
    if($x_count3 <=0 )
    {
      $x_count3=0;
    }

    //ตรวจสอบ credit ว่าเกินจากที่มีหรือไม่
      if($_count <= floatval(removeComma($x_count3)))
      {
      $olduser_id = $_POST["olduser_id"]; // id ของ user ที่จะ copy เอาไว้ดึงข้อมูล
      $r_agent_id =   $_SESSION["r_agent_id"].$_SESSION["r_id"].'*';
      $r_level    =   intval($_SESSION["r_level"])+1;

      $sql="select * from bom_tb_agent where r_id='$olduser_id'";
      $re=sql_query($sql);

      $olduser_data   = sql_fetch_as($re);
     
      $copy_insert = array(); 
      $copy_value = array();

      foreach ($olduser_data as $key => $value) {
        if($key != "r_id")
        {
          $copy_insert[] = $key;        
        }
      }


      $sql="INSERT IGNORE INTO  bom_tb_agent (`".implode('`, `', $copy_insert)."`) select  `".implode('`, `', $copy_insert)."` from  bom_tb_agent where r_id='$olduser_id'";    
      $rs = sql_query_return_id($sql);

      if($rs['rs'])
      {

        $last_id = $rs['last'];
        $sql2 = "update IGNORE `bom_tb_agent` SET `r_name`='$name',`r_phone`= '$phone' ,`r_user`= '$user' ,`r_pass`= '$pass',`r_regis`= now(),`r_count`= '$_count' WHERE r_id = $last_id";
        sql_query($sql2);

        $data = array(
          'msg'     =>  $lang_ag[5],
          'status'  =>  true
        );
      }
      else
      {
        $data = array(
          'msg'     =>  $lang_ag[4],
          'status'  =>  false
        );
      }

    }
    else
    { 
      //ถ้า credit เกินจากที่มีหรือไม่
      $data = array(
        'msg'     =>  $lang_ag[18],
        'status'  =>  false
      );
    } 
  }
  else
  {
    $data = array(
      'msg'     =>  $lang_ag[19],
      'status'  =>  false,
    );
  }
}
else
{
  $data = array(
    'msg'     =>  $lang_ag[20],
    'status'  =>  false
  );
}

echo json_encode($data);

?>