<?
  session_start();
  header("Content-Type: application/json");
  require_once '../inc/conn.php';
  require_once '../inc/function.php';

  $sdate = $_GET['date'];
  $szone = $_GET['sport'];

  if($_SESSION['aid'] == ""){
    $res = array('status' => 0, 'msg' => 'ERROR 403');
    echo json_encode($res);
    die();
  }

  if($sdate == "" || $szone == ""){
    $res = array('status' => 0, 'msg' => 'ERROR 500');
    echo json_encode($res);
    die();
  }

  $res = array('status' => 1,);
  echo json_encode($res);
?>