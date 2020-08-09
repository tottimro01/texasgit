<?
  session_start();
  header("Content-Type: application/json");
  require_once '../inc/conn.php';
  require_once '../inc/function.php';

  $league_id = $_POST['league_id'];
  $league_num = $_POST['league_num'];

  if($_SESSION['aid'] == ""){
    $res = array('status' => 0, 'msg' => 'ERROR 403');
    echo json_encode($res);
    die();
  }

  if($league_id == "" || $league_num == ""){
    $res = array('status' => 0, 'msg' => 'ERROR 500');
    echo json_encode($res);
    die();
  }

  if($league_num==0){
  	$league_num = 60;
  }

  $sql=sql_query_sp("update bom_tb_ball_list set b_top = '$league_num' where b_zone_id = '$league_id'");

  $res['status'] = 1;
//   $res['logs'] = "update bom_tb_ball_list set b_top = '$league_num' where b_zone_id = '$league_id'";

  echo json_encode($res)
?>