<?
  session_start();
  header("Content-Type: application/json");
  require_once '../inc/conn.php';
  require_once '../inc/function.php';

  $val = $_POST['val'];
  $arr_return = array();
  
  if($val==1){
    $arr_return["msg"] = "เปิด Node แล้ว";
  }else if($val==0){
    $arr_return["msg"] = "ปิด Node แล้ว";
  }

  echo json_encode($arr_return);
?>