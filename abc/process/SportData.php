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

    $date = $_GET['date'];
    $zone = $_GET['zone'];

    if($date != ""){
        //   $sql="select * from bom_tb_ball_list where (b_date ='$date' or b_live=1 or b_live=2 or b_live=3) and b_active=1";
        $sql="SELECT * FROM bom_tb_ball_list WHERE b_date ='$date' AND b_zone = '$zone'";
        $q = sql_query_sp($sql);
        $data = array();
        while($rs = sql_fetch($q)){
            $data[] = $rs;
        }
        $res = array('status' => 1, 'msg' => '', 'result' => array('data' => $data));

    }else{
          $res = array('status' => 0, 'msg' => 'เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง');
    }
    echo json_encode($res);
?>