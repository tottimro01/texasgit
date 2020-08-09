<?
  session_start();
  header("Content-Type: application/json");
  require_once '../inc/conn.php';
  require_once '../inc/function.php';

  $currentView = explode(",", $_POST['curentView']);
  $date = $_POST['date'];

  if($_SESSION['aid'] == ""){
    $res = array('status' => 0, 'msg' => 'ERROR 403');
    echo json_encode($res);
    die();
  }

  if($date == date("d-m-Y")){
    $vdate = date("Y-m-d");
    $dtFull = date("Y-m-d H:i:s");
    $dtStamp = strtotime('now');
  }else{
    list($dd,$mm,$yy) = explode("-", $date);
    $vdate = $yy."-".$mm."-".$dd;
    $dtFull = $yy."-".$mm."-".$dd." 00:00:00";
    $dtStamp = strtotime($dtFull);
  }

  $sql = "SELECT * FROM bom_tb_view_league WHERE DATE(vl_date_time) = '$vdate'";
  $resView = sql_query_sp($sql);
  $resViewToday = array();
  while($rv = sql_fetch($resView)){
    $resViewToday[] = $rv['vl_zone_id'];
  }

  if(count(currentView) > 0){
    for($i=0; $i < count($currentView); $i++){ 
      if(!in_array($currentView[$i], $resViewToday)){
        $n = ($currentView[$i]);
        $sql = "INSERT INTO bom_tb_view_league (vl_zone_id, vl_date_time, vl_date_timestam) VALUES ('$n', '$dtFull', '$dtStamp')";
        $x = sql_query_sp($sql);
      }
    }
  }

  $res = array('status' => 1, );
  echo json_encode($res)
?>