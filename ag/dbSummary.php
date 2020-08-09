<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

  if($_SESSION["AGlang"]==""){
      $_SESSION["AGlang"]="th";
  }

  require('lang/ag_lang.php');
  include "inc/function.php";

  $arr_return = array();
  $arr_gId = array("18693357" , "18693358" , "18693359" , "18693364" , null , "18693361" , "18693362" , "18693360" , "18693363" , null);
  $arr_time = array(date("Y-m-d H:i:s") , date("Y-m-d H:i:s") , date("Y-m-d H:i:s") , date("Y-m-d H:i:s") , null , date("Y-m-d H:i:s") , date("Y-m-d H:i:s") , date("Y-m-d H:i:s") , date("Y-m-d H:i:s") , null);
  $arr_st = array(rand(1,4) , rand(1,4) , rand(1,4) , rand(1,4) , null , rand(1,4) , rand(1,4) , rand(1,4) , rand(1,4) , null); //1=รอเดิมพัน 2=เสร็จเรียบร้อยแล้ว 3=เกมยังไม่จบ 4=เกมถูกยกเลิก null=Closed
  

  // $arr_p = array(rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , "0.00" , rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , "0.00"); //ผู่เล่น
  // $arr_b = array(rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , "0.00" , rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , "0.00"); //เจ้ามือ
  // $arr_t = array(rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , "0.00" , rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , "0.00"); //เสมอ
  // $arr_pp = array(rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , "0.00" , rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , "0.00"); //ผู้เล่นไพ่คู่
  // $arr_bp = array(rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , "0.00" , rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , rand(0.00,1000.00) , "0.00"); //เจ้ามือไพ่คู่

  $arr_p = array("0.00" , "0.00" , "0.00" , "0.00" , "0.00" , "0.00" , "0.00" , "0.00" , "0.00" , "0.00"); //ผู่เล่น
  $arr_b = array("0.00" , "0.00" , "0.00" , "0.00" , "0.00" , "0.00" , "0.00" , "0.00" , "0.00" , "0.00"); //เจ้ามือ
  $arr_t = array("0.00" , "0.00" , "0.00" , "0.00" , "0.00" , "0.00" , "0.00" , "0.00" , "0.00" , "0.00"); //เสมอ
  $arr_pp = array("0.00" , "0.00" , "0.00" , "0.00" , "0.00" , "0.00" , "0.00" , "0.00" , "0.00" , "0.00"); //ผู้เล่นไพ่คู่
  $arr_bp = array("0.00" , "0.00" , "0.00" , "0.00" , "0.00" , "0.00" , "0.00" , "0.00" , "0.00" , "0.00"); //เจ้ามือไพ่คู่


  $arr_return["gId"] = $arr_gId;
  $arr_return["time"] = $arr_time;
  $arr_return["st"] = $arr_st;
  $arr_return["p"] = $arr_p;
  $arr_return["b"] = $arr_b;
  $arr_return["t"] = $arr_t;
  $arr_return["pp"] = $arr_pp;
  $arr_return["bp"] = $arr_bp;

  echo json_encode($arr_return);
  ?>