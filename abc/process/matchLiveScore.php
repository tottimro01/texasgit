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

  $b_id = $_GET['match_id'];
  $b_add = $_GET['match_add'];

  $sql = "SELECT * FROM bom_tb_ball_list_livescore WHERE b_id = '$b_id' ORDER BY auto_id ASC";
  $re = sql_query_sp($sql);
  $data = array();
  while($rs = sql_fetch($re)){
    $data[] = array(
        'score' => $rs['b_score'],
        'date' => $rs['b_date'],
        'time' => $rs['b_time'],
    );
  }

  $sql = "SELECT * FROM bom_tb_ball_list WHERE b_id = '$b_id'";
  $info_data = sql_array_sp($sql);
  $info = array(
    'match_id' => $info_data['b_id'],
    'team_1_name' => $info_data['b_name_1_th']!="" ? $info_data['b_name_1_th'] : $info_data['b_name_1_en'],
    'team_2_name' => $info_data['b_name_2_th']!="" ? $info_data['b_name_2_th'] : $info_data['b_name_2_en'],
    'live' => $info_data['b_live'],
    'score_full' => $info_data['b_score_full'],
    'score_half' => $info_data['b_score_half'],
    'live_text'  => $info_data['b_live_showtime'],
  );

  $res = array('status' => 1, 'result' => array('info' => $info, 'score' => $data));
  echo json_encode($res);
?>