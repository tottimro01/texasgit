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

  if(isset($_POST['run_score_full'])) // Update RUN SCORE FULL
  {
    $val = $_POST['run_score_full'];
	
	if($re['b_score_half']=="*"){
         $sp=4;
         }elseif($val==""){
		$sp=0;
		}elseif($val=="*"){
		$sp=3;	
		}elseif($val!=""){
		$sp=1;	
		}
		
		
    $sql=sql_query_sp("update bom_tb_ball_list set b_score_full = '$val'  , b_score_status = '$sp'   where b_id = '$b_id'");
	 $sql=sql_query_sp("update bom_tb_ball_list_score set b_score_full = '$val'  , b_score_status = '$sp'   where b_id = '$b_id'");

  }
  else if(isset($_POST['run_score_half'])) // Update RUN SCORE HALF
  {
    $val = $_POST['run_score_half'];
	
	  if($re['b_score_full']=="*"){
         $sp=5;
         }elseif($val==""){
		$sp=0;
		}elseif($val=="*"){
		$sp=3;	
		}elseif($val!=""){
		$sp=1;	
		}
	
    $sql=sql_query_sp("update bom_tb_ball_list set b_score_half = '$val' , b_score_status = '$sp'  where b_id = '$b_id'");
	 $sql=sql_query_sp("update bom_tb_ball_list_score set b_score_half = '$val' , b_score_status = '$sp'  where b_id = '$b_id'");
  }
  else if(isset($_POST['id_th_score'])) // Update ID TH SCORE
  {
    // $val = trim($_POST['id_th_score'])=="" ? null : intval($_POST['id_th_score']);
    $val = trim($_POST['id_th_score']);
    if($val!="")
        $sql=sql_query_sp("update bom_tb_ball_list set id_thscore = $val where b_id = '$b_id'");
    else
        $sql=sql_query_sp("update bom_tb_ball_list set id_thscore = null where b_id = '$b_id'");
  }
  else if(isset($_POST['update_date_check'])) // Update B DATE CHECK
  {
    $val = (isset($_POST['chk_date']) && $_POST['chk_date']==1) ? 1 : 0;
    $sql=sql_query_sp("update bom_tb_ball_list set b_date_check = '$val' where b_id = '$b_id'");
  }
  else if(isset($_POST['update_score_check'])) // Update B SCORE CHECK
  {
    $val = (isset($_POST['chk_score']) && $_POST['chk_score']==1) ? 1 : 0;
    $sql=sql_query_sp("update bom_tb_ball_list set b_score_check = '$val' where b_id = '$b_id'");
  }
  else{
    $res = array('status' => 0);
  }
  
  if($res['status'] == 1){
    $res['result'] = $val;
    $res['res'] = $sql;
    $res['match'] = $b_id;
  }
  echo json_encode($res)
?>