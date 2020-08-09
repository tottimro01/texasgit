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

  $b_zone = $_POST['zone'];

  
  if($b_zone != ""){
    if($b_zone == "88"){
        $sql="update bom_tb_ball_list  set  b_live=4 where (b_live=1 or b_live=2 or b_live=3);";
    }else{
        $sql="update bom_tb_ball_list  set  b_live=4 where b_zone=$b_zone and (b_live=1 or b_live=2 or b_live=3);";
    }
    $s = sql_query_sp($sql);
    if($s === true){ // อัพเดตสำเร็จ
        $res = array('status' => 1, 'result' => $data);
    }else{
        $res = array('status' => 0, 'msg' => 'เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง');
    }
  }else{
        $res = array('status' => 0, 'msg' => 'เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง');
  }
  echo json_encode($res);
?>