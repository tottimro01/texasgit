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

  $limitPlayTime = strtotime('-5 minutes');

  $sql_bp = "SELECT * FROM bom_tb_football_bill_play        WHERE b_accept = 1 AND b_time_play != '' AND b_score_live != b_score_var AND play_timestam < '$limitPlayTime' AND b_score_live != '' AND b_score_live != '0-0' ORDER BY play_timestam DESC";
  $re_bp = sql_query($sql_bp);

  $sql_bpl = "SELECT * FROM bom_tb_football_bill_play_live  WHERE b_accept = 1 AND b_time_play != '' AND b_score_live != b_score_var AND play_timestam < '$limitPlayTime' AND b_score_live != '' AND b_score_live != '0-0' ORDER BY play_timestam DESC";
  $re_bpl = sql_query($sql_bpl);

  $total = 0;
  $tbData = array($re_bp, $re_bpl );

  foreach($tbData as $key => $value){
    //   $total[] =($value);
    while($rs = sql_fetch($value)){
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

        $total++;
    }
  }

  $res = array('status' => 1, 'result' => array('total_bill' => $total));
//   $res = array('status' => 1, 'result' => array('total_bill' => 1)); // for test
  echo json_encode($res);
?>

