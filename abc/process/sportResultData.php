<?
  session_start();
  header("Content-Type: application/json");
  require_once '../inc/conn.php';
  require_once '../inc/function.php';

  $sdate = $_GET['date'];
  $szone = $_GET['sport'];
  $swid = $_GET['sport_waiting'];

  if($_SESSION['aid'] == ""){
    $res = array('status' => 0, 'msg' => 'ERROR 403');
    echo json_encode($res);
    die();
  }

  if($sdate == "" || $szone == ""){
    $res = array('status' => 0, 'msg' => 'ERROR 500');
    echo json_encode($res);
    die();
  }

  $data = array();
  if($swid != ""){
    $sql = "select * from bom_tb_ball_list where b_id=$swid and b_add=1 and  b_zone='$szone' order by b_date_play asc";
  }else{    
    $sql = "select * from bom_tb_ball_list where b_add=1 and b_date='$sdate' and  b_zone='$szone' order by b_date_play asc";
  }
  $re = sql_query_sp($sql);
  while($rs = sql_fetch($re)){
    if(!isset($data[$rs['b_zone_id']])){
      $data[$rs['b_zone_id']] = array(
        'zone_name' => ($rs['b_zone_th']!="" ? $rs['b_zone_th'] : $rs['b_zone_en']), 
        'matches' => array()
      );
    }

    $isScoreEmpty = false;
    if($rs['b_live'] >= 1 && $rs['b_live'] <= 3){
        if($rs['b_run_score_full'] == ""){
            $isScoreEmpty = true;
        }
    }else if($rs['b_live'] == 4){
        if($rs['b_score_full'] == "" || $rs['b_score_half'] == ""){
            $isScoreEmpty = true;
        }
    }

    $data[$rs['b_zone_id']]['matches'][] = array(
      'match_id'          => $rs['b_id'],
      'match_id_thscore'  => $rs['id_thscore'],
      'play_date'         => date("d/m/Y H:i", $rs['b_date_play']),
      'match_add'         => $rs['b_add'],
      'team_home'         => ($rs['b_name_1_th']!="") ? $rs['b_name_1_th'] : $rs['b_name_1_en'],
      'team_away'         => ($rs['b_name_2_th']!="") ? $rs['b_name_2_th'] : $rs['b_name_2_en'],
      'score_full'        => $rs['b_score_full'],
      'score_half'        => $rs['b_score_half'],
      'run_score_full'    => $rs['b_run_score_full'],
      'run_score_half'    => $rs['b_run_score_half'],
      'th_score_full'     => $rs['b_th_score_full'],
      'th_score_half'     => $rs['b_th_score_half'],
      'match_end'         => ($rs['b_live']>=4) ? true : false,
      'live_text'         => $rs['b_live_showtime'],
      'date_check'         => $rs['b_date_check'],
      'score_check'       => $rs['b_score_check'],
      'match_status'      => ($rs['b_score_full']=='can' or $rs['b_process']==2) ? "Cancel" : "Completed",
      'is_score_empty'    => $isScoreEmpty,
      'live_id'           => $rs['b_live'],
    );
  }

    function createWaitingLink($b_id, $zone){
        global $arr_sp;
        global $sdate;
        // return '<a href="#" data-wid="'.$b_id.'" class="selectWaiting">' . $b_id . '</a>';
        return '<a href="?sport='.$arr_sp[$zone]['sp_key'].'&sport_id='.$zone.'&date='.$sdate.'&wid='.$b_id.'" class="selectWaiting" data-wid="'.$b_id.'">' . $b_id . '</a>';
    }

    $str = "";
    $sc=array(1=>"มวยไทย" , 2=>"ไก่ชน " , 3=>"วัวชน" , 4=>"วิ่งวัว" , 5=>"แข่งเรือ" , 6=>"บอล" , 7=>"บาสเก็ตบอล" , 8=>"ฮ๊อกกี้น้ำแข็ง" , 9=>"เทนนิส" , 10=>"แบตมินตัน" , 11=>"มวย" , 12=>"แฮนด์บอล" , 13=>"โปโลน้ำ" , 14=>"วอลเลย์บอล" ,  15=>" รถแข่ง" ,  16=>"ฟุตซอล" ,  17=>"เบสบอล" ,  18=>"ปิงปอง" , 19=>"สนุ๊กเกอร์" , 20=>"กอล์ฟ" );

    $arr_wait=array();
    $sql="select * from bom_tb_football_bill_play_live where b_date = '".$_GET['date']."' and play_status=7 group by b_id order by b_numstep asc limit 100; ";
    $re=sql_query($sql);
    $tmpzone = array();
    while($rs=sql_fetch($re)){
        $bzone2 = $rs['b_zone'];
        if($rs['b_numstep']>1){
            $rs['b_zone']=0;
	    }
        $arr_wait[$rs['b_zone']][]=$rs['b_id'];
        $tmpzone[$rs['b_id']] = $bzone2;
	}

    for($xx=1;$xx<=20;$xx++){
        $sql="select * from bom_tb_football_bill_live where b_date = '".$_GET['date']."' and b_zone='$xx' limit 10; ";
        $resc = sql_num($sql);
        if($resc>9){
            $str .= " [<span style='color:#F00;'>".$sc[$xx]." รอคำนวน : 9+ </span>] , ";
            foreach($arr_wait[$xx] as $b_id){
                $str .= createWaitingLink($b_id, $xx) . " , ";
	        }	
        }elseif($resc>0){
            $str .= " [<span style='color:#F00;'>".$sc[$xx]." รอคำนวน : $resc </span>] , ";
            foreach($arr_wait[$xx] as $b_id){
                $str .= createWaitingLink($b_id, $xx) . " , ";
	        }
        }else{
            #echo $sc[$xx]." : [สำเร็จ] , ";		
        }
	}
	
	$sql="select * from bom_tb_football_bill_live where b_date = '".$_GET['date']."' and b_zone='0' limit 10; ";
    $resc = sql_num($sql);
    if($resc>9){
        $str .= " [<span style='color:#F00;'>สเต็ป รอคำนวน : 9+ </span>] , ";   
        foreach($arr_wait[0] as $b_id){
            $str .= createWaitingLink($b_id, $tmpzone[$b_id]) . " , ";
    	}
    }elseif($resc>0){
        $str .= " [<span style='color:#F00;'>สเต็ป รอคำนวน : $resc </span>] , ";    
        foreach($arr_wait[0] as $b_id){
            $str .= createWaitingLink($b_id, $tmpzone[$b_id]) . " , ";
    	}
    }else{
        #echo "สเต็ป : [สำเร็จ] , ";		
    }   

  

    $res = array('status' => 1, 'result' => array('sport_result' => $data, 'waiting' => $str,));
    echo json_encode($res);
?>