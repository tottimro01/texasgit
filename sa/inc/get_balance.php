<? 

ob_start(); if (!isset($_SESSION)) { session_start(); } 
// require('inc/conn.php');
// require('inc/function.php');
?>

<?php 
  //** ตัวแปลที่ต้องใช้ **
  // $load_session = $_POST["session"]  // ประกาศตัวแปรก่อน include ไฟล์ เพื่อใช้ session กรณี ที่ session มาจาก POST
  // $r_id = $rs[r_id];  //  ประกาศตัวแปรก่อน incude ใน loop query ของหน้า รายการสมาชิก
  // $ag_level = $rs[r_level];  //  ประกาศตัวแปรก่อน incude ใน loop query ของหน้า รายการสมาชิก
 

   // load_session ใช้ เซ้ตตัวแปลก่อน include ไไฟล์ เนื่องจาก session  มีทั้งดึงจาก session ตรงๆ และดึงจาก $_POST[session] ในบางไฟล์
  $load_session =  (!isset($load_session)) ? $_SESSION : $load_session; 
   //  r_id มี 2 ประเภท คือ ดึงจาก session(หน้าสรุปยอด) และ ใช้ loop ตอน query ข้อมูลสมาชิก(หน้ารายเการสมาชิก)
  $r_id = (!isset($r_id)) ? $load_session["r_id"] : $r_id; 
  //  ag_level มี 2 ประเภท คือ ดึงจาก session(หน้าสรุปยอด) และ ใช้ loop ตอน query ข้อมูลสมาชิก(หน้ารายเการสมาชิก)
  $ag_level = (!isset($ag_level)) ?  intval($load_session["r_level"]) : $ag_level; 
  $up_level = intval($ag_level)+1;

  // ยอดเล่นค้าง
  $d_incre = strtotime("-7 day");
  $sql="select sum(b_total) as btotal , sum( 
  (ROUND(  b_sum ,10))    
     ) as t1 from bom_tb_football_bill_live where  r_id = '".$r_id."' and b_accept!=2 and b_status=5 and r_cut_bet_4=0";
  $reb1=sql_array($sql);
  $sql="select sum(b_total) as btotal , sum( 
  (ROUND(  b_pay ,10))  
     ) as t1 from bom_tb_lotto_bill_live where  r_id = '".$r_id."' and b_accept!=0 and b_status=5";
  $reb2=sql_array($sql);
  $sql="select sum(b_total) as btotal , sum( 
  (ROUND(  b_pay ,10))  
     ) as t1 from bom_tb_games_bill_play_live where  r_id = '".$r_id."' and b_accept!=2 and and play_status=7  and play_timestam >= $d_incre";
  $reb4=sql_array($sql);
  $sum_kank2=$reb1["t1"]+$reb2["t1"]+$reb3["t1"]+$reb4["t1"];


  $sql="select r_count as xtotal , r_type  from bom_tb_agent where  r_id= '".$r_id."'";
  $re4=sql_array($sql);  
  $count_ag = $re4["xtotal"];  // ยอดเครดิต ทั้งหมดที่ agent เครดิตที่ได้

  $rtype="m_count";
  $sql="select sum($rtype) as xtotal from bom_tb_member where  m_agent_id like '%*".$r_id."*%' and m_level=$up_level";
  $re5=sql_array($sql);
  $x_count_member =($re5["xtotal"]+$sum_kank2); // ยอดรวมเครดิตที่โอนให้ member

  // // ยอดเครดิตทีเปิดให้ agent 
  $sql="select sum(r_count) as xtotal from bom_tb_agent where   r_agent_id like '%*".$r_id."*%' and r_level=$up_level ";
  $re6=sql_array($sql);
  $x_count_agent = $re6["xtotal"]; // ยอดรวมเครดิตที่โอนให้ agent

  $x_count_total = ($x_count_agent+$x_count_member); //เครดิตที่เปิด (รวม)
  $x_count3 = ($count_ag)-$x_count_total; // เครดิตทั้งหมดที่มี ลบกับ  เครดิตที่ให้ member และ agent


  if($x_count3 <= 0)
  {
    $x_count3 = 0;
  }
  
  // echo "เครดิตที่ได้ :".$count_ag."<br>";
  // echo "ยอดรวมเครดิตที่โอนให้ member :".$x_count_member."<br>";
  // echo "ยอดรวมเครดิตที่โอนให้ agent :".$x_count_agent."<br>";
  // echo "เครดิตที่เปิด (รวม)  :".$x_count_total."<br>";
  // echo "ยอดเล่นค้าง :".$sum_kank2."<br>";
  // echo "เครดิตคงเหลือ :".$x_count3."<br>";

 ?>