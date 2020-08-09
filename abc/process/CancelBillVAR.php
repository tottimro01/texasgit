<?
  session_start();
  header("Content-Type: application/json");
  require_once '../inc/conn.php';
  require_once '../inc/function.php';

  if($_SESSION['aid'] == ""){
    $res = array('status' => 0, 'msg' => 'ERROR 403');
    echo json_encode($res);
    die();
  }

  $bill_id = $_POST['bill_id'];
  $play_id = $_POST['play_id'];
  
  if($bill_id == "" || $play_id == ""){
    $res = array('status' => 0, 'msg' => 'ERROR 500');
    echo json_encode($res);
    die();
  }

  $res = array('status' => 1, 'result' => array('bill_id' => $bill_id));
  echo json_encode($res);
?>