<?
  session_start();
  header("Content-type: text/html");
  require_once '../inc/conn.php';
  require_once '../inc/function.php';

  $b_id = $_GET['match_id'];
  $b_add = $_GET['match_add'];
  $q_type = $_GET['q_type'];
  $q_half = $_GET['half'];
  $p_type = $_GET['p_type'];

  if($_SESSION['aid'] == ""){
    echo "";
    die();
  }
  
  if($q_type == 'bet'){
    if($q_half == '1h')
      $p_type = '1'.$p_type;
    $sql = "SELECT * FROM bom_tb_football_bill_play_live WHERE b_id = '$b_id' AND b_add = '$b_add' AND play_type = '$p_type' ORDER BY play_datenow DESC";
  }else if($q_type == 'total'){
    if($p_type == 1)
      $arr_p_type = array(1, 2);  
    else if($p_type == 2)
      $arr_p_type = array(3, 4);
    else if($p_type == 3)
      $arr_p_type = array(7, 8, 9);
    else if($p_type == 4)
      $arr_p_type = array(5, 6);
    else
      $arr_p_type = array();

    if($q_half == '1h'){
      for($i = 0; $i < count($arr_p_type); $i++)
        $arr_p_type[$i] = '1'.$arr_p_type[$i];
    }

    $sql = "SELECT * FROM bom_tb_football_bill_play_live WHERE b_id = '$b_id' AND b_add = '$b_add' AND play_type IN (".implode(',',$arr_p_type).") ORDER BY play_datenow DESC";
  }
  $data = sql_query($sql);
?>
<div>
  <table class="sport-match-header match-sum-table fixed-table">
    <thead class="text-center">
      <tr>
        <th class="bd-m-1 text-white bg-m-1">Agent</th>
        <th class="bd-m-1 text-white bg-m-1">User</th>
        <th class="bd-m-1 text-white bg-m-1">เลือก</th>
        <th class="bd-m-1 text-white bg-m-1">บอล</th>
        <th class="bd-m-1 text-white bg-m-1">ราคา</th>
        <th class="bd-m-1 text-white bg-m-1">Code</th>
        <th class="bd-m-1 text-white bg-m-1">ยอด</th>
        <th class="bd-m-1 text-white bg-m-1">เวลา</th>
        <th class="bd-m-1 text-white bg-m-1">สเต็ป</th>
        <th class="bd-m-1 text-white bg-m-1">Bet ID</th>
        <th class="bd-m-1 text-white bg-m-1"></th>
      </tr>
    </thead>
  </table>
</div>
<div style="max-height: 300px; overflow-y: overlay;">
  <table class="match-sum-table fixed-table">
    <tbody class="text-center">
      <? 
      $select_string = array();
      $ag_data = array();
      $mb_data = array();
      while($v = sql_fetch($data)){
        $selectClass = "";                  
        // ดึงข้อมูล ag แล้วเก็บเข้า Array ถ้ามีแล้วไม่ต้องดึงใหม่
        if(!isset($ag_data[$v['r_id']])){
          $sql = "SELECT r_name FROM bom_tb_agent WHERE r_id = '{$v['r_id']}'";
          $ag = sql_array($sql);
          $ag_data[$v['r_id']] = array('name' => $ag['r_name']);
        }

        // ดึงข้อมูล member แล้วเก็บเข้า Array ถ้ามีแล้วไม่ต้องดึงใหม่
        if(!isset($mb_data[$v['m_id']])){
          $sql = "SELECT m_name, m_user FROM bom_tb_member WHERE m_id = '{$v['m_id']}'";
          $mb = sql_array($sql);
          $mb_data[$v['m_id']] = array('name' => $mb['m_name'], 'username' => $mb['m_user']);
        }

        // ดึงข้อมูล ทีมเลือก แล้วเก็บเข้า Array ถ้ามีแล้วไม่ต้องดึงใหม่
        $selectStringKey = $v['b_id'] . "_" . $v['b_add'] . "_" . $v['play_type'];
        if(!isset($select_string[$selectStringKey])){
          if(in_array($v['play_type'], array(1, 11, 3, 13))){
            $sql = "SELECT b_name_1_th, b_name_1_en, b_name_1_cn FROM bom_tb_ball_list WHERE b_id = '$b_id'";
            $tData = sql_array_sp($sql);
            $big_t = ($tData['b_name_1_th']!="") ? $tData['b_name_1_th'] : $tData['b_name_1_en'];
            if($v['b_big']==1){
              $selectString = "ต่อ " . $big_t;
            //   $selectClass = "txt-red"; 
            }else{
              $selectString = "รอง " . $big_t;
            //   $selectClass = "txt-blue"; 
            }
            
          }else if(in_array($v['play_type'], array(2, 12, 4, 14))){
            $sql = "SELECT b_name_2_th, b_name_2_en, b_name_2_cn FROM bom_tb_ball_list WHERE b_id = '$b_id'";
            $tData = sql_array_sp($sql);
            $big_t = ($tData['b_name_2_th']!="") ? $tData['b_name_2_th'] : $tData['b_name_2_en'];
            if($v['b_big']==2){
              $selectString = "ต่อ " . $big_t;
            //   $selectClass = "txt-red"; 
            }else{                                
              $selectString = "รอง " . $big_t;
            //   $selectClass = "txt-blue"; 
            }
          }else if(in_array($v['play_type'], array(5, 15))){
            $selectString = "คี่";    
          }else if(in_array($v['play_type'], array(6, 16))){
            $selectString = "คู่";  
          }else if(in_array($v['play_type'], array(7, 17))){
            $selectString = "เจ้าบ้านชนะ";  
          }else if(in_array($v['play_type'], array(8, 18))){
            $selectString = "เสมอ";  
          }else if(in_array($v['play_type'], array(9, 19))){
            $selectString = "ทีมเยือนชนะ";  
          }else{
            $selectString = "-";
          }
          $select_string[$selectStringKey] = $selectString;
        }
        if(in_array($v['play_type'], array(1, 11, 3, 13))){
            if($v['b_big']==1)
                $selectClass = "txt-red"; 
              else
                $selectClass = "txt-blue"; 
        }else if(in_array($v['play_type'], array(2, 12, 4, 14))){
            if($v['b_big']==2)
                $selectClass = "txt-red"; 
              else                            
                $selectClass = "txt-blue"; 
        }
      ?>
      <tr>
        <td><?=$ag_data[$v['r_id']]['name'];?></td>
        <td><?=$mb_data[$v['m_id']]['username'];?></td>
        <td class="<?=$selectClass;?> b"><?=$select_string[$selectStringKey];?></td>
        <td><?=$v['play_bet'];?></td>
        <td class="<?if($v['play_pay']<=0){?> txt-red <?}?>"><?=$v['play_pay'];?></td>
        <td></td>
        <td class="text-left"><span>THB</span><span class="txt-blue b" style="float: right;"><?=$v['b_total'];?></span></td>
        <td><?=date('H:i', $v['play_timestam']);?></td>
        <td><?=$v['play_numstep'];?></td>
        <td><?=$v['play_id'];?></td>
        <td></td>
      </tr>
      <? 
      } 
      ?>
    </tbody>
  </table>
</div>