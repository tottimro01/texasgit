<?
  ob_start(); if (!isset($_SESSION)) { session_start(); }
  if($_SESSION["AGlang"]=="")
  {
    $_SESSION["AGlang"]="th";
  }
  require('conn.php');
  require('function.php');
  require('ag_function.php');
  require('../lang/sa_lang.php');
  require('../../lang/function_array.php');

  $con_service = $_POST['con_service'];
  $con_open_sport = $_POST['con_open_sport'];
  $con_live = $_POST['con_live'];
  $c_number = $_POST['c_number'];
  $con_muay_hide = $_POST['con_muay_hide'];
  $con_acept_confirm = $_POST['con_acept_confirm'];
  $con_acept_running1 = $_POST['con_acept_running1'];
  $con_acept_running2 = $_POST['con_acept_running2'];
  $con_acept_running3 = $_POST['con_acept_running3'];
  $con_soccer_close1h = $_POST['con_soccer_close1h'];
  $con_soccer_close2h = $_POST['con_soccer_close2h'];
  $con_step_close = $_POST['con_step_close'];
  $con_step_hide = $_POST['con_step_hide'];
  $con_basket_closeq = $_POST['con_basket_closeq'];
  $con_basket_hide = $_POST['con_basket_hide'];

  $sql = "UPDATE `bom_tb_config` SET 
  `con_service`= '".$con_service."', 
  `con_open_sport`= '".$con_open_sport."',
  `con_live`= '".$con_live."',
  `c_number`= '".$c_number."',
  `con_muay_hide`= '".$con_muay_hide."',
  `con_acept_confirm`= '".$con_acept_confirm."',
  `con_acept_running1`= '".$con_acept_running1."',
  `con_acept_running2`= '".$con_acept_running2."',
  `con_acept_running3`= '".$con_acept_running3."',
  `con_soccer_close1h`= '".$con_soccer_close1h."',
  `con_soccer_close2h`= '".$con_soccer_close2h."',
  `con_step_close`= '".$con_step_close."',
  `con_step_hide`= '".$con_step_hide."',
  `con_basket_closeq`= '".$con_basket_closeq."',
  `con_basket_hide`= '".$con_basket_hide."' WHERE `con_id` = 1";

  $rs = sql_query_sp($sql);
  if($rs)
  {
    $data = array(
      'msg'     =>  "สำเร็จ",
      'status'  =>  true,
    );
  }
  else
  {
    $data = array(
      'msg'     =>  "ผิดพลาด",
      'status'  =>  false
    );
  }
  echo json_encode($data);

?>