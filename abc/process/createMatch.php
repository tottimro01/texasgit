<?
    session_start();
    header("Content-Type: application/json");
    require_once '../inc/conn.php';
    require_once '../inc/function.php';

    $b_id = $_POST['match_id'];
    $b_zone_id = $_POST['league_zone_id'];
    $b_zone = $_POST['sport_type'];
    $b_big = $_POST['team_big'];
    $b_date = $_POST['date'];
    $b_time = $_POST['time'];
    $b_league_th = $_POST['league_th'];
    $b_league_en = $_POST['league_en'];
    $b_league_cn = $_POST['league_cn'];
    $b_name_1_th = $_POST['team_1_th'];
    $b_name_1_en = $_POST['team_1_en'];
    $b_name_1_cn = $_POST['team_1_cn'];
    $b_name_2_th = $_POST['team_2_th'];
    $b_name_2_en = $_POST['team_2_en'];
    $b_name_2_cn = $_POST['team_2_cn'];
    $b_match_max = $_POST['match_max'];
    $b_hf = ($_POST['match_half']=='1h') ? 1 : 2;

    $b_tv = $_POST['tv'];

    if($_SESSION['aid'] == ""){
        $res = array('status' => 0, 'msg' => 'ERROR 403');
        echo json_encode($res);
        die();
    }

    if($b_zone_id != "" && $b_time != "" && $b_date != "" && $b_league_en !="" && 
    $b_name_1_en != "" && $b_name_2_en != ""){

        // เช็ค  b_id ว่าซ้ำมักับคู่อื่นมั้ย
        $sql = "SELECT * FROM bom_tb_ball_list WHERE b_id = $b_id ORDER BY b_add DESC";
        $checkAdd = sql_array_sp($sql);
        if($checkAdd !== null){
            $b_add = intval($checkAdd['b_add'])+1;
        }
        else{
            $b_add = 1;
        }

        if($b_zone_id != '-1'){ // อัพเดทลีกให้ชื่อตรงกัน
            $isNewLeague = false;
            $sql = 
            "UPDATE bom_tb_ball_list SET
            b_zone_id = $b_zone_id, b_zone_th = '$b_league_th', b_zone_en = '$b_league_en', b_zone_cn = '$b_league_cn' 
            WHERE b_zone_id = $b_zone_id";
            $qz = sql_query_sp($sql);
        }else{
            $isNewLeague = true;
            $zoneId_begin = "99";
            $sql = "SELECT b_zone_id FROM bom_tb_ball_list WHERE b_zone_id LIKE '$zoneId_begin%' ORDER BY b_zone_id DESC";
            $lastAddedZone = sql_array_sp($sql);
            //$newZoneId = ($lastAddedZone === null) ? intval($zoneId_begin . "001") : intval($lastAddedZone['b_zone_id'])+1;
            if($lastAddedZone === null || strlen($lastAddedZone['b_zone_id']) < 5){
                $newZoneId = intval($zoneId_begin . "001");
            }else{
                $newZoneId = intval($lastAddedZone['b_zone_id'])+1;
            }
            $b_zone_id = $newZoneId;
        }

        list($dd, $mm, $yy) = explode("-", $b_date);
        $newDatePlay = $yy."-".$mm."-".$dd." ".$b_time.":00";
        $newDatePlayStamp = strtotime($newDatePlay);
        $sql = 
        "INSERT INTO bom_tb_ball_list (b_id, b_add, b_big, b_hf, b_date, b_date_play, b_zone, 
        b_zone_id, b_zone_th, b_zone_en, b_zone_cn,
        b_name_1_th, b_name_1_en, b_name_1_cn, 
        b_name_2_th, b_name_2_en, b_name_2_cn) 
        VALUES ($b_id, $b_add, $b_big, $b_hf, '$b_date', $newDatePlayStamp, $b_zone, 
        $b_zone_id, '$b_league_th', '$b_league_en', '$b_league_cn', 
        '$b_name_1_th', '$b_name_1_en', '$b_name_1_cn',
        '$b_name_2_th', '$b_name_2_en', '$b_name_2_cn')";
        
        $q1 = sql_query_sp($sql);
        if($q1 === true){
            $newLeague = null;
            if($isNewLeague){
                $newLeague = array(
                    'b_zone_id' => $b_zone_id,
                    'b_zone_th' => $b_league_th, 
                    'b_zone_en' => $b_league_en, 
                    'b_zone_cn' => $b_league_cn,
                );
            }
            $res = array('status' => 1, 'result' => array('new_league' => $newLeague));
        }else{
            $res = array('status' => 0, 'msg' => "เกิดข้อผิดพลาดกรุณาลองใหม่อีกครั้ง",);
        }
    }else{
        $res = array('status' => 0, 'msg' => 'กรุณากรอกข้อมูลให้ครบ');
    }

    echo json_encode($res)
?>