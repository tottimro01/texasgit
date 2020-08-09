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
  
  
if($ag_level==1){
$keep_share="  ( b_myshare_1 + b_myshare_2 + b_myshare_3 + b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m  ) ";
}elseif($ag_level==2){
$keep_share="  ( b_myshare_2 + b_myshare_3 + b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m  ) ";
}elseif($ag_level==3){
$keep_share="  ( b_myshare_3 + b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m  ) ";
}elseif($ag_level==4){
$keep_share="  ( b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m  ) ";
}elseif($ag_level==5){
$keep_share="  ( b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m  ) ";
}elseif($ag_level==6){
$keep_share="  ( b_myshare_6 + b_myshare_7 + b_share_m  ) ";
}elseif($ag_level==7){
$keep_share="  ( b_myshare_7 + b_share_m  ) ";
}elseif($ag_level==8){
$keep_share="  (  b_share_m ) ";
		}
  
  ##########################Date
if(date("D")=="Mon"){
$start_date =date("Y-m-d", strtotime('tuesday last week'));		
}else{
$start_date =date("Y-m-d", strtotime('tuesday this week'));		
	}
$end_date =date("Y-m-d");			
 // ยอดเล่นค้าง
######################## บอล
$asum1=array();
$asum2=array();
$sql="select 
r_id , ( 
ROUND( 	(b_sum)*(( $keep_share )/100) ,10)
) as r1 ,
( 
ROUND( 	(b_bonus + b_pay)*(( $keep_share )/100) ,10)
) as r2 ,
( 
ROUND( 	(b_sum) ,10)
) as m1 ,
( 
ROUND( 	(b_bonus + b_pay) ,10)
) as m2 
 from bom_tb_football_bill where r_agent_id like '%*".$r_id."*%'  and b_accept=1   and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$start_date' and '$end_date' ";
$re1a=sql_query($sql);	
while($rsc1=sql_fetch($re1a)){
	if($r_id==$rsc1['r_id']){
		######################Member
$asum1[1][]=$rsc1['m1'];
$asum1[2][]=$rsc1['m2'];
	}else{
		######################## Agent
$asum2[1][]=$rsc1['r1'];
$asum2[2][]=$rsc1['r2'];
	}
	}
	
	
######################## หวย
$sql="select 
r_id , ( 
ROUND( 	(b_total)*(( $keep_share )/100) ,10)
) as r1 ,
( 
ROUND( 	(b_bonus + (b_total-b_pay))*(( $keep_share )/100) ,10)
) as r2 ,
( 
ROUND( 	(b_total) ,10)
) as m1 ,
( 
ROUND( 	(b_bonus + (b_total-b_pay)) ,10)
) as m2 
 from bom_tb_lotto_bill_play where r_agent_id like '%*".$r_id."*%'  and b_accept=1   and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$start_date' and '$end_date' ";
$re1a=sql_query($sql);	
while($rsc1=sql_fetch($re1a)){
	if($r_id==$rsc1['r_id']){
		######################Member
$asum1[1][]=$rsc1['m1'];
$asum1[2][]=$rsc1['m2'];
	}else{
		######################## Agent
$asum2[1][]=$rsc1['r1'];
$asum2[2][]=$rsc1['r2'];
	}
	}
	
######################## เกมส์
$sql="select 
r_id , ( 
ROUND( 	(b_total)*(( $keep_share )/100) ,10)
) as r1 ,
( 
ROUND( 	(b_bonus + (b_total-b_pay))*(( $keep_share )/100) ,10)
) as r2 ,
( 
ROUND( 	(b_total) ,10)
) as m1 ,
( 
ROUND( 	(b_bonus + (b_total-b_pay)) ,10)
) as m2 
 from bom_tb_games_bill_play where r_agent_id like '%*".$r_id."*%'  and b_accept=1   and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$start_date' and '$end_date' ";
$re1a=sql_query($sql);	
while($rsc1=sql_fetch($re1a)){
	if($r_id==$rsc1['r_id']){
		######################Member
$asum1[1][]=$rsc1['m1'];
$asum1[2][]=$rsc1['m2'];
	}else{
		######################## Agent
$asum2[1][]=$rsc1['r1'];
$asum2[2][]=$rsc1['r2'];
	}
	}
	
######################## คาสิโน
$sql="select 
r_id , ( 
ROUND( 	(b_total)*(( $keep_share )/100) ,10)
) as r1 ,
( 
ROUND( 	(b_bonus + (b_total-b_pay))*(( $keep_share )/100) ,10)
) as r2 ,
( 
ROUND( 	(b_total) ,10)
) as m1 ,
( 
ROUND( 	(b_bonus + (b_total-b_pay)) ,10)
) as m2 
 from bom_tb_casino_bill_play where r_agent_id like '%*".$r_id."*%'  and b_accept=1   and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$start_date' and '$end_date' ";
$re1a=sql_query($sql);	
while($rsc1=sql_fetch($re1a)){
	if($r_id==$rsc1['r_id']){
		######################Member
$asum1[1][]=$rsc1['m1'];
$asum1[2][]=$rsc1['m2'];
	}else{
		######################## Agent
$asum2[1][]=$rsc1['r1'];
$asum2[2][]=$rsc1['r2'];
	}
	}
	

$sum_winloss = (@array_sum($asum1[1])-@array_sum($asum1[2])) + (@array_sum($asum2[1])-@array_sum($asum2[2]));

  $sql="select r_count   from bom_tb_agent where  r_id= '".$r_id."'";
  $re4=sql_array($sql);  
  $r_count = $re4["r_count"];  // ยอดเครดิต ทั้งหมดที่ agent เครดิตที่ได้


  $sql="select sum(m_count) as xtotal from bom_tb_member where  m_agent_id like '%*".$r_id."*%' and m_level=$up_level";
  $re5=sql_array($sql);
  $x_count_member =($re5["xtotal"]); // ยอดรวมเครดิตที่โอนให้ member

  // // ยอดเครดิตทีเปิดให้ agent 
  $sql="select sum(r_count) as xtotal from bom_tb_agent where   r_agent_id like '%*".$r_id."*%' and r_level=$up_level ";
  $re6=sql_array($sql);
  $x_count_agent = $re6["xtotal"]; // ยอดรวมเครดิตที่โอนให้ agent

$x_count3 = ($r_count) - ($x_count_member + $x_count_agent + $sum_winloss) ;

#  $x_count_total = ($x_count_agent+$x_count_member); //เครดิตที่เปิด (รวม)
#  $x_count3 = ($r_count) - $x_count_total; // เครดิตทั้งหมดที่มี ลบกับ  เครดิตที่ให้ member และ agent


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