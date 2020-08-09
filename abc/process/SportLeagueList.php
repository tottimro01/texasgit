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

  $data = array();
//   $sql = "SELECT DISTINCT b_zone_id FROM bom_tb_ball_list";
  $sql = "SELECT b_zone, b_zone_id, b_zone_th, b_zone_en, b_zone_cn, MAX(b_date_play) FROM bom_tb_ball_list GROUP BY b_zone_id, b_date_play";
  $re = sql_query_sp($sql);
  while($rs = sql_fetch($re)){
    if(!isset($data[$rs['b_zone']])){
      $data[$rs['b_zone']] = array();
    }
    
    $data[$rs['b_zone']][$rs['b_zone_id']] = array(
      'zone_id' => $rs['b_zone_id'],
      'zone_name' => $rs['b_zone_th']!="" ? $rs['b_zone_th'] : $rs['b_zone_en'],
      'zone_name_th' => $rs['b_zone_th'],
      'zone_name_en' => $rs['b_zone_en'],
      'zone_name_cn' => $rs['b_zone_cn'],
    );
  }

  $res = array('status' => 1, 'result' => $data);
  echo json_encode($res);
?>