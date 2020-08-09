<?
  session_start();
  header("Content-Type: application/json");
  require_once '../inc/conn.php';
  require_once '../inc/function.php';

  $b_id = $_POST['match_id'];
  $b_add = $_POST['match_add'];

  if($_SESSION['aid'] == ""){
    $res = array('status' => 0, 'msg' => 'ERROR 403');
    echo json_encode($res);
    die();
  }

  if($b_id == "" || $b_add == ""){
    $res = array('status' => 0, 'msg' => 'ERROR 500');
    echo json_encode($res);
    die();
  }

  $res = array('status' => 1);

  $sql="select * from bom_tb_ball_list  where b_id = '$b_id' and b_add = '$b_add'";
  $re=sql_array_sp($sql);

  if($re['b_date_play'] < $time_stam and $re['b_live']=0){ 
    $res['status'] = 2;
    echo json_encode($res);
    exit();
  }

  if(isset($_POST['hdc'])) // Update HDC
  {
    $val = $_POST['hdc'];
    $isStep = ($_POST['step'] == 1);
    if($isStep !== true)
        $sql=sql_query_sp("update bom_tb_ball_list set b_hdc = '$val' where b_id = '$b_id' and b_add = '$b_add'");
    else
        $sql=sql_query_sp("update bom_tb_ball_list set b_hdc_step = '$val' where b_id = '$b_id' and b_add = '$b_add'");
  }
  else if(isset($_POST['1h_hdc'])) // Update HDC 1H
  {
    $val = $_POST['1h_hdc'];
    $isStep = ($_POST['step'] == 1);
    if($isStep !== true)
        $sql=sql_query_sp("update bom_tb_ball_list set b_1h_hdc = '$val' where b_id = '$b_id' and b_add = '$b_add'");
    else
        $sql=sql_query_sp("update bom_tb_ball_list set b_1h_hdc_step = '$val' where b_id = '$b_id' and b_add = '$b_add'");

  }
  else if(isset($_POST['hdc_1'])) // Update HDC 1
  {
    $val = $_POST['hdc_1'];
    $isStep = ($_POST['step'] == 1);

    $per=$re[b_percent_1];
    $pay2= permy($val,$per);
  
    if($val==0){
      $pay2=0;
    }

    if($isStep !== true)
        $sql=sql_query_sp("update bom_tb_ball_list set b_hdc_1 = '$val', b_hdc_2 = '$pay2' where b_id = '$b_id' and b_add = '$b_add'");
    else
        $sql=sql_query_sp("update bom_tb_ball_list set b_hdc_step1 = '$val', b_hdc_2 = '$pay2' where b_id = '$b_id' and b_add = '$b_add'");

    if($val=="" or $val=="0"){
        if($isStep !== true)
            $sql=sql_query_sp("update bom_tb_ball_list set b_hdc_1 = '0', b_hdc_2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");
        else 
            $sql=sql_query_sp("update bom_tb_ball_list set b_hdc_step1 = '0', b_hdc_2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");
    }
  }
  else if(isset($_POST['1h_hdc_1'])) // Update HDC 1 1H
  {
    $val = $_POST['1h_hdc_1'];
    $isStep = ($_POST['step'] == 1);

    $per=$re[b_1h_percent_1];
    $pay2= permy($val,$per);
  
    if($val==0){
      $pay2=0;
    }

    if($isStep !== true)
        $sql=sql_query_sp("update bom_tb_ball_list set b_1h_hdc_1 = '$val' , b_1h_hdc_2 = '$pay2' where b_id = '$b_id' and b_add = '$b_add'");
    else
        $sql=sql_query_sp("update bom_tb_ball_list set b_1h_hdc_step1 = '$val' , b_1h_hdc_step2 = '$pay2' where b_id = '$b_id' and b_add = '$b_add'");
    
    if($val=="" or $val=="0"){
        if($isStep !== true)
            $sql=sql_query_sp("update bom_tb_ball_list set b_1h_hdc_1 = '0', b_1h_hdc_2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");
        else
            $sql=sql_query_sp("update bom_tb_ball_list set b_1h_hdc_step1 = '0', b_1h_hdc_step2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");
    }
  }
  else if(isset($_POST['hdc_2'])) // Update HDC 2
  {
    $val = $_POST['hdc_2'];
    $isStep = ($_POST['step'] == 1);

    if($isStep !== true)
        $sql=sql_query_sp("update bom_tb_ball_list set b_hdc_2 = '$val' where b_id = '$b_id' and b_add = '$b_add'");
    else
        $sql=sql_query_sp("update bom_tb_ball_list set b_hdc_step2 = '$val' where b_id = '$b_id' and b_add = '$b_add'");
  
    if($val=="" or $val=="0"){
        if($isStep !== true)
            $sql=sql_query_sp("update bom_tb_ball_list set b_hdc_1 = '0', b_hdc_2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");
        else
            $sql=sql_query_sp("update bom_tb_ball_list set b_hdc_step1 = '0', b_hdc_step2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");
    }
  }
  else if(isset($_POST['1h_hdc_2'])) // Update HDC 2 1H
  {
    $val = $_POST['1h_hdc_2'];
    $isStep = ($_POST['step'] == 1);

    if($isStep !== true)
        $sql=sql_query_sp("update bom_tb_ball_list set b_1h_hdc_2 = '$val' where b_id = '$b_id' and b_add = '$b_add'");
    else
        $sql=sql_query_sp("update bom_tb_ball_list set b_1h_hdc_step2 = '$val' where b_id = '$b_id' and b_add = '$b_add'");

    if($val=="" or $val=="0"){
        if($isStep !== true)
            $sql=sql_query_sp("update bom_tb_ball_list set b_1h_hdc_1 = '0', b_1h_hdc_2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");
        else
            $sql=sql_query_sp("update bom_tb_ball_list set b_1h_hdc_step1 = '0', b_1h_hdc_step2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");

    }
  }
  else if(isset($_POST['goal'])) // Update Goal
  {
    $val = $_POST['goal'];
    $isStep = ($_POST['step'] == 1);

    if($isStep !== true)
        $sql=sql_query_sp("update bom_tb_ball_list set b_goal = '$val' where b_id = '$b_id' and b_add = '$b_add'");
    else
        $sql=sql_query_sp("update bom_tb_ball_list set b_goal_step = '$val' where b_id = '$b_id' and b_add = '$b_add'");
  }
  else if(isset($_POST['1h_goal'])) // Update Goal 1H
  {
    $val = $_POST['1h_goal'];
    $isStep = ($_POST['step'] == 1);

    if($isStep !== true)
        $sql=sql_query_sp("update bom_tb_ball_list set b_1h_goal = '$val' where b_id = '$b_id' and b_add = '$b_add'");
    else
        $sql=sql_query_sp("update bom_tb_ball_list set b_1h_goal_step = '$val' where b_id = '$b_id' and b_add = '$b_add'");
  }
  else if(isset($_POST['goal_1'])) // Update GOAL 1
  {
    $val = $_POST['goal_1'];
    $isStep = ($_POST['step'] == 1);

    $per=$re[b_percent_2];
    $pay2= permy($val,$per);
  
    if($val==0){
      $pay2=0;
    }

    if($isStep !== true)
        $sql=sql_query_sp("update bom_tb_ball_list set b_goal_1 = '$val' , b_goal_2 = '$pay2' where b_id = '$b_id' and b_add = '$b_add'");
    else
        $sql=sql_query_sp("update bom_tb_ball_list set b_goal_step1 = '$val' , b_goal_step2 = '$pay2' where b_id = '$b_id' and b_add = '$b_add'");

    if($val=="" or $val=="0"){
        if($isStep !== true)
            $sql=sql_query_sp("update bom_tb_ball_list set b_goal_1 = '0', b_goal_2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");
        else
            $sql=sql_query_sp("update bom_tb_ball_list set b_goal_step1 = '0', b_goal_step2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");
    }
  }
  else if(isset($_POST['1h_goal_1'])) // Update GOAL 1 1H
  {
    $val = $_POST['1h_goal_1'];
    $isStep = ($_POST['step'] == 1);

    $per=$re[b_1h_percent_2];
    $pay2= permy($val,$per);
  
    if($val==0){
      $pay2=0;
    }

    if($isStep !== true)
        $sql=sql_query_sp("update bom_tb_ball_list set b_1h_goal_1 = '$val' , b_1h_goal_2 = '$pay2' where b_id = '$b_id' and b_add = '$b_add'");
    else
        $sql=sql_query_sp("update bom_tb_ball_list set b_1h_goal_step1 = '$val' , b_1h_goal_step2 = '$pay2' where b_id = '$b_id' and b_add = '$b_add'");

  
    if($val=="" or $val=="0"){
        if($isStep !== true)
            $sql=sql_query_sp("update bom_tb_ball_list set b_1h_goal_1 = '0', b_1h_goal_2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");
        else
            $sql=sql_query_sp("update bom_tb_ball_list set b_1h_goal_step1 = '0', b_1h_goal_step2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");
    }
  }
  else if(isset($_POST['goal_2'])) // Update GOAL 2
  {
    $val = $_POST['goal_2'];
    $isStep = ($_POST['step'] == 1);

    if($isStep !== true)
        $sql=sql_query_sp("update bom_tb_ball_list set b_goal_2 = '$val' where b_id = '$b_id' and b_add = '$b_add'");
    else
        $sql=sql_query_sp("update bom_tb_ball_list set b_goal_step2 = '$val' where b_id = '$b_id' and b_add = '$b_add'");
  
    if($val=="" or $val=="0"){
        if($isStep !== true)
            $sql=sql_query_sp("update bom_tb_ball_list set b_goal_1 = '0', b_goal_2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");
        else
            $sql=sql_query_sp("update bom_tb_ball_list set b_goal_step1 = '0', b_goal_step2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");
    }
  }
  else if(isset($_POST['1h_goal_2'])) // Update GOAL 2 1H
  {
    $val = $_POST['1h_goal_2'];
    $isStep = ($_POST['step'] == 1);

    if($isStep !== true)
        $sql=sql_query_sp("update bom_tb_ball_list set b_1h_goal_2 = '$val' where b_id = '$b_id' and b_add = '$b_add'");
    else
        $sql=sql_query_sp("update bom_tb_ball_list set b_1h_goal_step2 = '$val' where b_id = '$b_id' and b_add = '$b_add'");

    if($val=="" or $val=="0"){
        if($isStep !== true)
            $sql=sql_query_sp("update bom_tb_ball_list set b_1h_goal_1 = '0', b_1h_goal_2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");
        else
            $sql=sql_query_sp("update bom_tb_ball_list set b_1h_goal_step1 = '0', b_1h_goal_step2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");
    }
  }
  else if(isset($_POST['1x2_1'])) // Update 1X2 1
  {
    $val = $_POST['1x2_1'];
    $isStep = ($_POST['step'] == 1);

    if($isStep !== true)
        $sql=sql_query_sp("update bom_tb_ball_list set b_1x2_1 = '$val' where b_id = '$b_id' and b_add = '$b_add'");
    else
        $sql=sql_query_sp("update bom_tb_ball_list set b_1x2_step1 = '$val' where b_id = '$b_id' and b_add = '$b_add'");

    if($val=="" or $val=="0"){
        if($isStep !== true)
            $sql=sql_query_sp("update bom_tb_ball_list set b_1x2_1 = '0', b_1x2_x = '0', b_1x2_2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");
        else
            $sql=sql_query_sp("update bom_tb_ball_list set b_1x2_step1 = '0', b_1x2_stepx = '0', b_1x2_step2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");
    }
  }
  else if(isset($_POST['1h_1x2_1'])) // Update 1X2 1 1H
  {
    $val = $_POST['1h_1x2_1'];
    $isStep = ($_POST['step'] == 1);

    if($isStep !== true)
        $sql=sql_query_sp("update bom_tb_ball_list set b_1h_1x2_1 = '$val' where b_id = '$b_id' and b_add = '$b_add'");
    else
        $sql=sql_query_sp("update bom_tb_ball_list set b_1h_1x2_step1 = '$val' where b_id = '$b_id' and b_add = '$b_add'");

    if($val=="" or $val=="0"){
        if($isStep !== true)
            $sql=sql_query_sp("update bom_tb_ball_list set b_1h_1x2_1 = '0', b_1h_1x2_x = '0', b_1h_1x2_2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");
        else
            $sql=sql_query_sp("update bom_tb_ball_list set b_1h_1x2_step1 = '0', b_1h_1x2_stepx = '0', b_1h_1x2_step2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");

    }
  }
  else if(isset($_POST['1x2_x'])) // Update 1X2 x
  {
    $val = $_POST['1x2_x'];
    $isStep = ($_POST['step'] == 1);

    if($isStep !== true)
        $sql=sql_query_sp("update bom_tb_ball_list set b_1x2_x = '$val' where b_id = '$b_id' and b_add = '$b_add'");
    else
        $sql=sql_query_sp("update bom_tb_ball_list set b_1x2_stepx = '$val' where b_id = '$b_id' and b_add = '$b_add'");
  
    if($val=="" or $val=="0"){
        if($isStep !== true)
            $sql=sql_query_sp("update bom_tb_ball_list set b_1x2_1 = '0', b_1x2_x = '0', b_1x2_2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");
        else
            $sql=sql_query_sp("update bom_tb_ball_list set b_1x2_step1 = '0', b_1x2_stepx = '0', b_1x2_step2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");
    }
  }
  else if(isset($_POST['1h_1x2_x'])) // Update 1X2 x 1H
  {
    $val = $_POST['1h_1x2_x'];
    $isStep = ($_POST['step'] == 1);

    if($isStep !== true)
        $sql=sql_query_sp("update bom_tb_ball_list set b_1h_1x2_x = '$val' where b_id = '$b_id' and b_add = '$b_add'");
    else
        $sql=sql_query_sp("update bom_tb_ball_list set b_1h_1x2_stepx = '$val' where b_id = '$b_id' and b_add = '$b_add'");

    if($val=="" or $val=="0"){
        if($isStep !== true)
            $sql=sql_query_sp("update bom_tb_ball_list set b_1h_1x2_1 = '0', b_1h_1x2_x = '0', b_1h_1x2_2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");
        else
            $sql=sql_query_sp("update bom_tb_ball_list set b_1h_1x2_step1 = '0', b_1h_1x2_stepx = '0', b_1h_1x2_step2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");

    }
  }
  else if(isset($_POST['1x2_2'])) // Update 1X2 2
  {
    $val = $_POST['1x2_2'];
    $isStep = ($_POST['step'] == 1);

    if($isStep !== true)
        $sql=sql_query_sp("update bom_tb_ball_list set b_1x2_2 = '$val' where b_id = '$b_id' and b_add = '$b_add'");
    else
        $sql=sql_query_sp("update bom_tb_ball_list set b_1x2_step2 = '$val' where b_id = '$b_id' and b_add = '$b_add'");
  
    if($val=="" or $val=="0"){
        if($isStep !== true)
            $sql=sql_query_sp("update bom_tb_ball_list set b_1x2_1 = '0', b_1x2_x = '0', b_1x2_2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");
        else
            $sql=sql_query_sp("update bom_tb_ball_list set b_1x2_step1 = '0', b_1x2_stepx = '0', b_1x2_step2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");
    }
  }
  else if(isset($_POST['1h_1x2_2'])) // Update 1X2 2 1H
  {
    $val = $_POST['1h_1x2_2'];
    $isStep = ($_POST['step'] == 1);

    if($isStep !== true)
        $sql=sql_query_sp("update bom_tb_ball_list set b_1h_1x2_2 = '$val' where b_id = '$b_id' and b_add = '$b_add'");
    else
        $sql=sql_query_sp("update bom_tb_ball_list set b_1h_1x2_step2 = '$val' where b_id = '$b_id' and b_add = '$b_add'");
  
    if($val=="" or $val=="0"){
        if($isStep !== true)
            $sql=sql_query_sp("update bom_tb_ball_list set b_1h_1x2_1 = '0', b_1h_1x2_x = '0', b_1h_1x2_2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");
        else
            $sql=sql_query_sp("update bom_tb_ball_list set b_1h_1x2_step1 = '0', b_1h_1x2_stepx = '0', b_1h_1x2_step2 = '0'    where b_id = '$b_id' and b_add = '$b_add'");
    }
  }
  else if(isset($_POST['even'])) // Update EVEN
  {
    $val = $_POST['even'];

    $sql=sql_query_sp("update bom_tb_ball_list set b_even = '$val' where b_id = '$b_id' and b_add = '$b_add'");
  
    if($val=="" or $val=="0"){
      $sql=sql_query_sp("update bom_tb_ball_list set b_odd = '0', b_even = '0'  where b_id = '$b_id' and b_add = '$b_add'");
    }
  }
  else if(isset($_POST['1h_even'])) // Update EVEN 1H
  {
    $val = $_POST['1h_even'];

    $sql=sql_query_sp("update bom_tb_ball_list set b_1h_even = '$val' where b_id = '$b_id' and b_add = '$b_add'");
  
    if($val=="" or $val=="0"){
      $sql=sql_query_sp("update bom_tb_ball_list set b_1h_odd = '0', b_1h_even = '0'  where b_id = '$b_id' and b_add = '$b_add'");
    }
  }
  else if(isset($_POST['odd'])) // Update ODD
  {
    $val = $_POST['odd'];

    $per=$re[b_percent_3];
    $pay2= permy($val,$per);
  
    if($val==0){
      $pay2=0;
    }

    $sql=sql_query_sp("update bom_tb_ball_list set b_odd = '$val', b_even = '$pay2' where b_id = '$b_id' and b_add = '$b_add'");
  
    if($val=="" or $val=="0"){
      $sql=sql_query_sp("update bom_tb_ball_list set b_odd = '0', b_even = '0'  where b_id = '$b_id' and b_add = '$b_add'");
    }
  }
  else if(isset($_POST['1h_odd'])) // Update ODD 1H
  {
    $val = $_POST['1h_odd'];

    $per=$re[b_1h_percent_3];
    $pay2= permy($val,$per);
  
    if($val==0){
      $pay2=0;
    }

    $sql=sql_query_sp("update bom_tb_ball_list set b_1h_odd = '$val', b_1h_even = '$pay2' where b_id = '$b_id' and b_add = '$b_add'");
  
    if($val=="" or $val=="0"){
      $sql=sql_query_sp("update bom_tb_ball_list set b_1h_odd = '0', b_1h_even = '0'  where b_id = '$b_id' and b_add = '$b_add'");
    }
  }
  else if(isset($_POST['percent_1'])) // Update PERCENT 1
  {
    $val = $_POST['percent_1'];
    $sql=sql_query_sp("update bom_tb_ball_list set b_percent_1 = '$val' where b_id = '$b_id' and b_add = '$b_add'");
  }
  else if(isset($_POST['1h_percent_1'])) // Update PERCENT 1 1H
  {
    $val = $_POST['1h_percent_1'];
    $sql=sql_query_sp("update bom_tb_ball_list set b_1h_percent_1 = '$val' where b_id = '$b_id' and b_add = '$b_add'");
  }
  else if(isset($_POST['percent_2'])) // Update PERCENT 2
  {
    $val = $_POST['percent_2'];
    $sql=sql_query_sp("update bom_tb_ball_list set b_percent_2 = '$val' where b_id = '$b_id' and b_add = '$b_add'");
  }
  else if(isset($_POST['1h_percent_2'])) // Update PERCENT 2 1H
  {
    $val = $_POST['1h_percent_2'];
    $sql=sql_query_sp("update bom_tb_ball_list set b_1h_percent_2 = '$val' where b_id = '$b_id' and b_add = '$b_add'");
  }
  else if(isset($_POST['percent_3'])) // Update PERCENT 3
  {
    $val = $_POST['percent_3'];
    $sql=sql_query_sp("update bom_tb_ball_list set b_percent_3 = '$val' where b_id = '$b_id' and b_add = '$b_add'");
  }
  else if(isset($_POST['1h_percent_3'])) // Update PERCENT 3 1H
  {
    $val = $_POST['1h_percent_3'];
    $sql=sql_query_sp("update bom_tb_ball_list set b_1h_percent_3 = '$val' where b_id = '$b_id' and b_add = '$b_add'");
  }
  else if(isset($_POST['run_score_full'])) // Update RUN SCORE FULL
  {
    $val = $_POST['run_score_full'];
    $sql=sql_query_sp("update bom_tb_ball_list set b_run_score_full = '$val' where b_id = '$b_id'");
  }
  else if(isset($_POST['run_score_half'])) // Update RUN SCORE HALF
  {
    $val = $_POST['run_score_half'];
    $sql=sql_query_sp("update bom_tb_ball_list set b_run_score_half = '$val' where b_id = '$b_id'");
  }
  else if(isset($_POST['update_manual'])) // Update B MANUAL
  {
    $val = (isset($_POST['chk_manual']) && $_POST['chk_manual']==1) ? 1 : 0;
    $sql=sql_query_sp("update bom_tb_ball_list set b_manual = '$val' where b_id = '$b_id' and b_add = '$b_add'");
  }
  else if(isset($_POST['update_no_bet'])) // Update NO. BET
  {
    $val = (isset($_POST['chk_no_bet']) && $_POST['chk_no_bet']==0) ? 0 : 1;
    $sql=sql_query_sp("update bom_tb_ball_list set no_bet = '$val' where b_id = '$b_id' and b_add = '$b_add'");
  }
  else if(isset($_POST['update_b_step'])) // Update B STEP
  {
    $val = (isset($_POST['chk_b_step']) && $_POST['chk_b_step']==2) ? 2 : 1;
    $sql=sql_query_sp("update bom_tb_ball_list set b_step = '$val' where b_id = '$b_id' and b_add = '$b_add'");
  }
  else if(isset($_POST['update_active'])) // Update B ACTIVE
  {
    $val = (isset($_POST['chk_atv']) && $_POST['chk_atv']==1) ? 1 : 0;
    $sql=sql_query_sp("update bom_tb_ball_list set b_active = '$val' where b_id = '$b_id' and b_add = '$b_add'");
  }
  else{
    $res = array('status' => 0, 'msg' => 'error');
  }
  
  if($res['status'] == 1){
    $res['result'] = $val;
  }
  echo json_encode($res)
?>