<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

  if($_SESSION["AGlang"]==""){
      $_SESSION["AGlang"]="th";
  }

  require('lang/ag_lang.php');
  include "inc/function.php";

  $arr_return = array();
  $arr_gId = array("18693357" , "18693358" , "18693359" , "18693364" , null);
  $arr_time = array(date("Y-m-d H:i:s") , date("Y-m-d H:i:s") , date("Y-m-d H:i:s") , date("Y-m-d H:i:s") , null);
  $arr_st = array(rand(1,4) , rand(1,4) , rand(1,4) , rand(1,4) , null); //1=รอเดิมพัน 2=เสร็จเรียบร้อยแล้ว 3=เกมยังไม่จบ 4=เกมถูกยกเลิก null=Closed
  
  // for($i=0;$i<=36;$i++){
  //   $arr_s[$i] = array(rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , "0.00"); 
  // }

  // for($i=1;$i<=3;$i++){
  //   $arr_s21[$i] = array(rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , "0.00"); 
  // }

  // $arr_s1st = array(rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , "0.00"); 
  // $arr_s2nd = array(rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , "0.00"); 
  // $arr_s3rd = array(rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , "0.00"); 
  // $arr_s118 = array(rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , "0.00"); 
  // $arr_seven = array(rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , "0.00"); 
  // $arr_sred = array(rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , "0.00"); 
  // $arr_sblack = array(rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , "0.00"); 
  // $arr_sodd = array(rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , "0.00"); 
  // $arr_s1936 = array(rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , "0.00"); 


  for($i=0;$i<=36;$i++){
    $arr_s[$i] = array("0.00" , "0.00" , "0.00" , "0.00" , "0.00"); 
  }

  for($i=1;$i<=3;$i++){
    $arr_s21[$i] = array("0.00" , "0.00" , "0.00" , "0.00" , "0.00"); 
  }

  $arr_s1st = array("0.00" , "0.00" , "0.00" , "0.00" , "0.00"); 
  $arr_s2nd = array("0.00" , "0.00" , "0.00" , "0.00" , "0.00"); 
  $arr_s3rd = array("0.00" , "0.00" , "0.00" , "0.00" , "0.00"); 
  $arr_s118 = array("0.00" , "0.00" , "0.00" , "0.00" , "0.00"); 
  $arr_seven = array("0.00" , "0.00" , "0.00" , "0.00" , "0.00"); 
  $arr_sred = array("0.00" , "0.00" , "0.00" , "0.00" , "0.00"); 
  $arr_sblack = array("0.00" , "0.00" , "0.00" , "0.00" , "0.00"); 
  $arr_sodd = array("0.00" , "0.00" , "0.00" , "0.00" , "0.00"); 
  $arr_s1936 = array("0.00" , "0.00" , "0.00" , "0.00" , "0.00"); 
  


  $arr_return["gId"] = $arr_gId;
  $arr_return["time"] = $arr_time;
  $arr_return["st"] = $arr_st;

  for($i=0;$i<=36;$i++){
    $arr_return["s".$i] = $arr_s[$i];
  }
  for($i=1;$i<=3;$i++){
    $arr_return["s21".$i] = $arr_s21[$i];
  }

  $arr_return["s1st"] = $arr_s1st;
  $arr_return["s2nd"] = $arr_s2nd;
  $arr_return["s3rd"] = $arr_s3rd;
  $arr_return["s118"] = $arr_s118;
  $arr_return["seven"] = $arr_seven;
  $arr_return["sred"] = $arr_sred;
  $arr_return["sblack"] = $arr_sblack;
  $arr_return["sodd"] = $arr_sodd;
  $arr_return["s1936"] = $arr_s1936;


  echo json_encode($arr_return);
  ?>