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

  $b_zone = $_GET['sport'];
  $limitPlayTime = strtotime('-5 minutes');

  // $sql_bp = "SELECT * FROM bom_tb_football_bill_play        WHERE b_zone = '$b_zone' AND b_accept = 1 AND b_time_play != '' AND b_score_live != b_score_var AND play_timestam < '$limitPlayTime' ORDER BY play_timestam DESC";
  // $re_bp = sql_query($sql_bp);

  // $sql_bpl = "SELECT * FROM bom_tb_football_bill_play_live  WHERE b_zone = '$b_zone' AND b_accept = 1 AND b_time_play != '' AND b_score_live != b_score_var AND play_timestam < '$limitPlayTime' ORDER BY play_timestam DESC";
  // $re_bpl = sql_query($sql_bpl);

  $tmpMatchData = array();
  $sql_bp = "SELECT * FROM bom_tb_football_bill_play        WHERE b_accept = 1 AND b_time_play != '' AND b_score_live != b_score_var AND play_timestam < '$limitPlayTime' AND b_score_live != '' AND b_score_live != '0-0' ORDER BY play_timestam DESC";
  $re_bp = sql_query($sql_bp);

  $sql_bpl = "SELECT * FROM bom_tb_football_bill_play_live  WHERE b_accept = 1 AND b_time_play != '' AND b_score_live != b_score_var AND play_timestam < '$limitPlayTime' AND b_score_live != '' AND b_score_live != '0-0' ORDER BY play_timestam DESC";
  $re_bpl = sql_query($sql_bpl);

  $tbData = array($re_bp, $re_bpl );

  $data = array();
  foreach($tbData as $key => $value){
    while($rs = sql_fetch($value)){
        $x = $rs['b_id'];
        if(!isset($tmpMatchData[$rs['b_id']])){
            $tmpMatchData[$x] = sql_array_sp("SELECT * FROM bom_tb_ball_list WHERE b_id = $x");
        }

        // check score
        $s1_sum = 0;        
        $s2_sum = 0;
        $s1 = array_map("intval", explode("-", $rs['b_score_live']));
        $s2 = array_map("intval", explode("-", $rs['b_score_var']));
        for($i=0; $i < count($s1); $i++){ 
            $s1_sum += $s1[$i]; 
        }
        for($j=0; $j < count($s2); $j++){ 
            $s2_sum += $s2[$j]; 
        }

        if($s1_sum <= $s2_sum)
            continue;

        $data[] = array(
            'b_id' => $x,
            'team_1' => $tmpMatchData[$x]['b_name_1_th']!=""?$tmpMatchData[$x]['b_name_1_th']:$tmpMatchData[$x]['b_name_1_en'],
            'team_2' => $tmpMatchData[$x]['b_name_2_th']!=""?$tmpMatchData[$x]['b_name_2_th']:$tmpMatchData[$x]['b_name_2_en'],
            'bill_id' => $rs['bill_id'],
            'play_id' => $rs['play_id'],
            'score_live' => $rs['b_score_live'],
            'score_var' => $rs['b_score_var'],
            'play_datetime' => $rs['play_datenow'],
            'play_timestamp' => $rs['play_timestam'],
            'play_datetime_format' => date("d/m/Y H:i:s", $rs['play_timestam']),
            'sport_name' => $arr_sp_zone[$rs['b_zone']],
        );
    }
  }

  foreach ($data as $key => $row) {
    $_b_id[$key]            = $row['b_id'];
    $_play_timestamp[$key]  = $row['play_timestamp'];
  }

// Sort the data with volume descending, edition ascending
array_multisort($_b_id, SORT_ASC, $_play_timestamp, SORT_DESC, $data);
//   while($rs = sql_fetch($re_bp)){
//     $data[] = array(
//         'bill_id' => $rs['bill_id'],
//         'play_id' => $rs['play_id'],
//         'score_live' => $rs['b_score_live'],
//         'score_var' => $rs['b_score_var'],
//         'play_datetime' => $rs['play_datenow'],
//         'play_timestamp' => $rs['play_timestam'],
//         'play_datetime_format' => date("d/m/Y H:i:s", $rs['play_timestam']),
//         'sport_name' => $arr_sp_zone[$rs['b_zone']],
//     );
//   }

//   while($rs = sql_fetch($re_bpl)){
//     $data[] = array(
//         'bill_id' => $rs['bill_id'],
//         'play_id' => $rs['play_id'],
//         'score_live' => $rs['b_score_live'],
//         'score_var' => $rs['b_score_var'],
//         'play_datetime' => $rs['play_datenow'],
//         'play_timestamp' => $rs['play_timestam'],
//         'play_datetime_format' => date("d/m/Y H:i:s", $rs['play_timestam']),
//         'sport_name' => $arr_sp_zone[$rs['b_zone']],
//     );
//   }

  $res = array('status' => 1, 'result' => $data);
  echo json_encode($res);
?>

