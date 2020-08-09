<?
  session_start();
  header("Content-Type: application/json");
  require_once '../inc/conn.php';
  require_once '../inc/function.php';

  $sdate = $_POST['date'];
  $szone = $_POST['sport'];
  

?>