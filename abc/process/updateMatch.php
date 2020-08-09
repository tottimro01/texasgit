<?
    session_start();
    header("Content-Type: application/json");
    require_once '../inc/conn.php';
    require_once '../inc/function.php';

    $b_original_id = $_POST['match_index'];
    $b_id = $_POST['match_id'];
    $b_zone_id = $_POST['league_zone_id'];
    $b_add = $_POST['match_add'];
    $b_big = $_POST['team_big'];
    $b_date = $_POST['date'];
    $b_time = $_POST['time'];
    $b_thscore = $_POST['match_id_thscore'];
    $b_settime = $_POST['set_time'];
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
    $b_match_time = $_POST['match_time']; #FT / 1H
    $b_tv = $_POST['tv'];

    if($_SESSION['aid'] == ""){
        $res = array('status' => 0, 'msg' => 'ERROR 403');
        echo json_encode($res);
        die();
    }

    if($b_original_id != "" && $b_add != "" && $b_zone_id != "" && $b_time != "" && $b_date != "" && $b_league_en !="" &&
    $b_name_1_en != "" && $b_name_2_en != ""){

        if($b_original_id != $b_id){ // ถ้ามีการแก้ไข b_id ให้เช็คว่าซ้ำมักับคู่อื่นมั้ย
            $sql = "SELECT * FROM bom_tb_ball_list WHERE b_id = $b_id";
            $checkDuplicateId = sql_array_sp($sql);
            if($checkDuplicateId !== null){
                $res = array('status' => 0, 'msg' => 'ID Duplicate!');
                echo json_encode($res);
                die();
            }
        }
        
        $sql = "SELECT * FROM bom_tb_ball_list WHERE b_id = $b_original_id AND b_add = $b_add";
        $tmpMatchData = sql_array_sp($sql);
        if($tmpMatchData !== null){
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

            $b_thscore = ($b_thscore=="") ? 'NULL' : $b_thscore;
            // list($d, $m, $y) = explode("-", $b_date);
            // $newPlayDate = $y."-".$m."-".$d." ".$b_time.":00";
            // $newPlayDateStamp = strtotime($newPlayDate);
            
            $newPlayDate = date("Y-m-d", $tmpMatchData['b_date_play'])." ".$b_time;
            $newPlayDateStamp = strtotime($newPlayDate);

            $sql = 
                "UPDATE bom_tb_ball_list SET b_big = '$b_big'
                WHERE b_id = $b_original_id AND b_add = $b_add";
            $q2 = sql_query_sp($sql);

            $sql = 
                "UPDATE bom_tb_ball_list SET b_id = '$b_id', b_date = '$b_date', b_date_play = '$newPlayDateStamp', 
                b_zone_id = $b_zone_id, b_zone_th = '$b_league_th', b_zone_en = '$b_league_en', b_zone_cn = '$b_league_cn', 
                b_name_1_th = '$b_name_1_th', b_name_1_en = '$b_name_1_en', b_name_1_cn = '$b_name_1_cn', 
                b_name_2_th = '$b_name_2_th', b_name_2_en = '$b_name_2_en', b_name_2_cn = '$b_name_2_cn', 
                id_thscore = $b_thscore, b_tv = '$b_tv'
                WHERE b_id = $b_original_id";
            $q1 = sql_query_sp($sql);

            
            //$Hi =  date('H:i', $newPlayDateStamp);
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
                $res = array('status' => 1, 'result' => array('b_id' => $b_id, 'new_league' => $newLeague));
            }else{
                $res = array('status' => 0, 'msg' => 'ERROR 500',);
            }

        }else{
            $res = array('status' => 0, 'msg' => 'ERROR 500');
            echo json_encode($res);
            die();
        }
    }else{
        $res = array('status' => 0, 'msg' => 'ERROR 500');
        echo json_encode($res);
        die();
    }

    echo json_encode($res)
?>