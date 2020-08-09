<?
    session_start();
    header("Content-Type: application/json");
    require_once '../inc/conn.php';
    require_once '../inc/function.php';

    $league_order = $_POST['league_order'];
    $zone = $_POST['zone'];
    $date = _bdate();

    if($_SESSION['aid'] == ""){
        $res = array('status' => 0, 'msg' => 'ERROR 403');
        echo json_encode($res);
        die();
    }

    if(count($league_order) == 0){
        $res = array('status' => 0, 'msg' => 'ERROR 500');
        echo json_encode($res);
        die();
    }

    // $isValid = true;
    $cc = 0;
    $ee = array();
    $_order = array();
    for($i=0; $i < count($league_order); $i++){ 
        list($v, $k) = explode("_", $league_order[$i]);
        $_order[$k] = $v;
        $sql = "UPDATE bom_tb_ball_list SET b_top = $k WHERE b_zone_id = $v AND b_date = '$date'";
        $u = sql_query_sp($sql);
        if($u !== false){
            $cc++;
            $ee[] = $sql;
        }
    }

    // $chkOrder = array();
    // $sql = "SELECT b_zone, b_zone_id, b_top FROM bom_tb_ball_list WHERE b_zone = $zone AND b_date = '$date' GROUP BY b_zone_id";
    // $re = sql_query_sp($sql);
    // while($rs = sql_fetch($re)){
    //     $chkOrder[$rs['b_zone_id']] = array(
    //         'zone_id' => $rs['b_zone_id'],
    //         'zone_top' => intval($rs['b_top']),
    //     );
    // }

    // $sql=sql_query_sp("update bom_tb_ball_list set b_top = '$league_num' where b_zone_id = '$league_id'");

    $res['status'] = 1;
    $res['log'] = array($cc, $ee, $_order);

    echo json_encode($res)
?>